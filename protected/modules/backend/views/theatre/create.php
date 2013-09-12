<?php
/* @var $this CinemaController */
/* @var $model Cinema */

$this->breadcrumbs=array(
	'Cinemas'=>array('index'),
	'Добавить',
);

$this->menu=array(
	array('label'=>'Список театров', 'url'=>array('index')),
	array('label'=>'Управление театрами', 'url'=>array('admin')),
);
?>

<h1>Добавить театр</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>