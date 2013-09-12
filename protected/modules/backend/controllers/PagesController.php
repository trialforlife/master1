<?php

class PagesController extends BController
{
	public $defaultAction = 'index';
	public $layout='//layouts/column2';

	public function actionIndex($city_id=0)
	{

		$this->render('index',array(
		));
	}

	public function actionEdit()
	{
		if(isset($_POST['Page']))
		{
			$model = Page::model()->findByPk((int)$_POST['Page']['page_id']);
			$model->attributes=$_POST['Page'];
			//
			//// Save blocker
			//
			//$this->redirect('/backend/pages/index/city_id/'.$_GET['city_id']);
			//
			////
			//
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->update())
			{
				//$this->redirect(Yii::app()->user->returnUrl);
			}
			else
			{
				CVarDumper::dump($model);die();
			}
		}
		else
		{
			$model = Page::model()->findForEditor(
				$_GET['page'], 
				$_GET['lang_id'], 
				$_GET['city_id']
			);
		}
		
		$this->menu=array(array('label'=>'Назад', 'url'=>'/backend/pages/index/city_id/'));

		$this->render('edit', array('model'=>$model));
	}

}