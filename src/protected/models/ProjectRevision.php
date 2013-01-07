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
	
	public function createNewRevision($projectId)
	{
		$this->attributes = array(
			'project_id' => $projectId,
			'revision_id'=> 1,
		);
		return $this->save();
	}
	
	public static function findLatest($projectId)
	{
		$model = new ProjectRevision;
		$tableName = $model->tableName();
		$whereContent = <<<EOS
			delete_ts IS NULL
			AND project_id = :project_id
			AND revision_id = (
			  SELECT
			    MAX(revision_id)
			  FROM
			    {$tableName}
			  WHERE
			    delete_ts IS NULL
			    AND project_id = :sub_project_id
			)
EOS;
		return self::model()->find($whereContent, array(
			$projectId,
			$projectId,
		));
	}
}