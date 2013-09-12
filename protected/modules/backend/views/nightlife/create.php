<?php
/* @var $this NightlifeController */
/* @var $model Nightlife */

$this->breadcrumbs=array(
	'Nightlives'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Добавить клуб</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>