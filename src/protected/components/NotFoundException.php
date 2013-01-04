<?php

class NotFoundException extends CHttpException
{
	public function __construct($status = 404, $message = null, $code = 0)
	{
		$res = array(
			'res' => false,
			'message' => is_null($message) ? 'not found exception' : $message,
		);
		
		if(Yii::app()->request->isAjaxRequest) {
			$privateMessage = CJSON::encode($res);
		}
		else {
			$privateMessage = $res['message'];
		}
		
		parent::__construct($status, $privateMessage, $code);
	}
}
