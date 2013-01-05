<?php

class DeleteAction extends CAction
{
	public function run()
	{
		$controller = $this->getController();
		$model = Project::prepare($_POST, 'delete');
		$res = $model->delete();
		
		$res = array(
			'res' => $res,
		);
		$controller->putJson($res);
	}
}
