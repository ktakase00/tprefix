<?php

class IndexAction extends CAction
{
	public function run()
	{
		$controller = $this->getController();
		
		$controller->registerPackage(array(
				'js/models/m_project.js',
				'js/collections/c_project.js',
				'js/views/v_project_item.js',
				'js/views/v_project_list.js',
				'js/views/v_float_window.js',
				'js/startup/s_project.js',
			),
			array(
				'css/float_window.css',
		));
		
		$controller->render('index');
	}
}
