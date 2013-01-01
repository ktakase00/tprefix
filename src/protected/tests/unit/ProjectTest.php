<?php

class ProjectTest extends CTestCase
{
	public function testSave()
	{
		Project::model()->deleteAll();
		
		$model = new Project();
		$model->project_nm = 'new project';
		$res = $model->save();
		
		$this->assertTrue($res);
	}
}