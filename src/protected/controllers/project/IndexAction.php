<?php

class IndexAction extends CAction
{
	public function run()
	{
		$controller = $this->getController();
		
		$controller->registerPackage(array(
				'js/models/m_Project.js',
				'js/collections/c_Project.js',
				'js/views/project/v_ProjectItem.js',
				'js/views/project/v_ProjectAddNew.js',
				'js/views/project/v_ProjectList.js',
				'js/views/common/v_FrameWindow.js',
				'js/views/project/v_ProjectEditDialog.js',
				'js/views/project/v_ProjectDeleteDialog.js',
				'js/views/project/v_ProjectMenu.js',
				'js/startup/s_project.js',
			),
			array(
				'css/app/frame_window.css',
				'css/app/project.css',
		));
		
		$partials = array(
			'/common/_frame_window' => array(),
			'_project_edit_dialog' => array(),
			'_project_delete_dialog' => array(),
			'_project_menu' => array(),
		);
		
		$controller->render('index', array(
			'partials' => $partials
		));
	}
}
