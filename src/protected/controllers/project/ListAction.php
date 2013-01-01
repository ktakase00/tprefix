<?php

class ListAction extends CAction
{
	public function run()
	{
		$controller = $this->getController();
		
		$res = Project::model()->findAll('delete_ts IS NULL');
		$controller->putJson($res);
	}
}
