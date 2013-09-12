<?php
/* @var $this CinemaController */
/* @var $model Cinema */

$this->breadcrumbs=array(
	'Cinemas'=>array('index'),
	'Добавить',
);

$this->menu=array(
	array('label'=>'Список кинотеатров', 'url'=>array('index')),
	array('label'=>'Управление кинотеатрами', 'url'=>array('admin')),
);
?>

<h1>Добавить кинотеатр</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>