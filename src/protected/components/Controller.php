<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	public $themeBaseUrl = '';
	
	public function isThemeUsed() {
		return !is_null(Yii::app()->theme);
	}
	
	public function init()
	{
		parent::init();
		if ($this->isThemeUsed()) {
			$this->themeBaseUrl = Yii::app()->theme->baseUrl . DIRECTORY_SEPARATOR;
		}
		Yii::app()->clientScript->registerCoreScript('jquery');
	}
	
	public function registerPackage($js = array(), $css = array())
	{
		$depends = array('common');
		
		if ($this->isThemeUsed()) {
			$depends []= Yii::app()->theme->name;
		}
		
		Yii::app()->clientScript->packages[Yii::app()->name] = array(
			'baseUrl' => '',
			'js' => $js,
			'css' => $css,
			'depends' => $depends,
		);
		Yii::app()->clientScript->registerPackage(Yii::app()->name);
	}
	
	public function putJson($valueAry)
	{
		header('Content-type: application/json');
		echo CJSON::encode($valueAry);
	}
	
	public function renderPartials($partials)
	{
		foreach ($partials as $partial => $params) {
			$this->renderPartial($partial, $params);
		}
	}
}