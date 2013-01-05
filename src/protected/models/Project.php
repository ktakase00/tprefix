<?php

class Project extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
 
	public function tableName()
	{
		return 'project.t_project';
	}
	
	public function primaryKey()
	{
		return 'project_id';
	}
	
	public function rules()
	{
		return array(
			array(
				'project_nm',
				'safe',
				'on' => 'save',
			),
			array(
				'project_id',
				'safe',
				'on' => 'delete',
			),
		);
	}
	
	public function setTimestamp()
	{
		$now = date("Y-m-d H:i:s");
		switch ($this->scenario) {
			case 'save':
				$this->upd_ts = $now;
				break;
				
			case 'delete':
				$this->delete_ts = $now;
				break;
		}
	}
	
	public static function prepare($params, $scenario = 'save')
	{
		$newModel = new Project($scenario);
		$primaryKey = $newModel->primaryKey();
		
		if (isset($params[$primaryKey])) {
			$model = Project::model()->findByPk($params[$primaryKey]);
			
			if (is_null($model)) {
				throw new NotFoundException;
			}
			$model->setScenario($scenario);
			$model->setTimestamp();
		}
		else {
			$model = $newModel;
		}
		
		$model->attributes = $params;
		return $model;
	}
	
	public function save($runValidation = true, $attributes = NULL)
	{
		$connection=Yii::app()->db;
		$transaction=$connection->beginTransaction();
		$isNew = $this->isNewRecord;
		
		$res = parent::save($runValidation, $attributes);
		if (!$res) {
			$transaction->rollback();
			return false;
		}
		
		if ($isNew) {
			$pr = new ProjectRevision('save');
			$pr->attributes = array(
				'project_id' => $this->project_id,
				'revision_id'=> 1,
			);
			$res = $pr->save();
			if (!$res) {
				$transaction->rollback();
				return false;
			}
		}
		$transaction->commit();
		return true;
	}
	
	public function delete()
	{
		$connection=Yii::app()->db;
		$transaction=$connection->beginTransaction();
		
		ProjectRevision::model()->updateAll(array(
				'delete_ts' => new CDbExpression('NOW()'),
			),
			'project_id = :project_id AND delete_ts IS NULL',
			array(
				$this->project_id,
		));
		
		$res = parent::save();
		if (!$res) {
			$transaction->rollback();
			return false;
		}
		
		$transaction->commit();
		return true;
	}
}
