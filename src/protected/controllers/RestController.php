<?php

class RestController extends ERestController {
	/**
	 * Controls access to restfull requests
	 */ 
	public function filterRestAccessRules( $c )
	{
		Yii::app()->clientScript->reset(); //Remove any scripts registered by Controller Class
		Yii::app()->onException = array($this, 'onException'); //Register Custom Exception
		//For requests from JS check that a user is loged in and call validateUser
		//validateUser can/should be overridden in your controller.
		if(!Yii::app()->user->isGuest && $this->validateAjaxUser($this->action->id)) 
			$c->run(); 
		else 
		{
			Yii::app()->errorHandler->errorAction = '/' . $this->uniqueid . '/error';
/*
			if(!(isset($_SERVER['HTTP_X_'.self::APPLICATION_ID.'_USERNAME']) and isset($_SERVER['HTTP_X_'.self::APPLICATION_ID.'_PASSWORD']))) {
				// Error: Unauthorized
				throw new CHttpException(401, 'You are not authorized to preform this action.');
			}
			$username = $_SERVER['HTTP_X_'.self::APPLICATION_ID.'_USERNAME'];
			$password = $_SERVER['HTTP_X_'.self::APPLICATION_ID.'_PASSWORD'];
			// Find the user
			if($username != Yii::app()->params['RESTusername'])
			{
				// Error: Unauthorized
				throw new CHttpException(401, 'Error: User Name is invalid');
			} 
			else if($password != Yii::app()->params['RESTpassword']) 
			{
				// Error: Unauthorized
				throw new CHttpException(401, 'Error: User Password is invalid');
			} 
*/
			// This tells the filter chain $c to keep processing.
			$c->run(); 
		}
	}	
}
