<?php

class BackendModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'backend.models.*',
			'backend.components.*',
		));
		Yii::app()->language='ru';
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			if (Yii::app()->user->isGuest && ($controller->id != 'auth' && $action->id != 'login'))
				Yii::app()->user->loginRequired();
			else
				return true;
		}
		else
			return false;
	}
}
