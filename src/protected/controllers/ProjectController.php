<?php

class ProjectController extends RestController
{
	public function doRestList() {
		$res = [
			[
				'project_id' => 1,
				'project_nm' => 'test1',
			],
			[
				'project_id' => 2,
				'project_nm' => 'test2',
			],
		];
		$this->renderJson($res);
	}
	
	public function doRestView($id) {
		$res = [
			[
				'project_id' => 1,
				'project_nm' => 'test1',
			],
			[
				'project_id' => 2,
				'project_nm' => 'test2',
			],
		];
		$this->renderJson($res[$id-1]);
	}
}
