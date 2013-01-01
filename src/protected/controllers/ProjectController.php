<?php

class ProjectController extends Controller
{
	public function actions()
	{
		return array(
			'index' => 'application.controllers.project.IndexAction',
			'list' => 'application.controllers.project.ListAction',
		);
	}
}
