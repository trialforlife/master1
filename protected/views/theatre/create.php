<?php
/* @var $this TheatreController */
/* @var $model Theatre */

$this->breadcrumbs=array(
	'Theatres'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Theatre', 'url'=>array('index')),
	array('label'=>'Manage Theatre', 'url'=>array('admin')),
);
?>

<h1>Create Theatre</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>