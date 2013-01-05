<?php

class ProjectRevision extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
 
	public function tableName()
	{
		return 'project.t_project_revision';
	}
	
	public function primaryKey()
	{
		return 'project_revision_id';
	}
	
	public function rules()
	{
		return array(
			array(
				'project_id, revision_id, content',
				'safe',
				'on' => 'save',
			),
			array(
				'project_revision_id',
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
}