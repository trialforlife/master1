<?php
/* @var $this PlayController */
/* @var $model Play */

$this->breadcrumbs=array(
	'Plays'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Добавить спектакль</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>