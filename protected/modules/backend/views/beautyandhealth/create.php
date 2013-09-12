<?php
/* @var $this BeautyandhealthController */
/* @var $model Beautyandhealth */

$this->breadcrumbs=array(
	'Beautyandhealths'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Добавление элемсента в Здоровье и красота</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>