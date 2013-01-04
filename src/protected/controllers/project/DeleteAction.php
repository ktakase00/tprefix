<?php

class DeleteAction extends CAction
{
	public function run()
	{
		$controller = $this->getController();
		$model = Project::prepare($_POST, 'delete');
		$res = $model->save();
		
		$res = array(
			'res' => $res,
		);
		$controller->putJson($res);
	}
}
