<?php
/* @var $this FilmsController */
/* @var $model Films */

$this->breadcrumbs=array(
	'Films'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Управление фйильмами', 'url'=>array('admin')),
);
?>

<h1>Добавить фильм</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>