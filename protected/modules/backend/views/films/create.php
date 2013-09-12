<?php
/* @var $this FilmsController */
/* @var $model Films */

$this->breadcrumbs=array(
	'Films'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Films', 'url'=>array('index')),
	array('label'=>'Manage Films', 'url'=>array('admin')),
);
?>

<h1>Create Films</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>