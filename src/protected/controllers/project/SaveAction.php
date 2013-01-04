<?php

class SaveAction extends CAction
{
	protected $controller;
	
	public function run()
	{
		$this->controller = $this->getController();
		
		$model = Project::prepare($_POST);
		$res = $model->save();
		
		$res = array(
			'res' => $res,
		);
		$this->controller->putJson($res);
	}
}
