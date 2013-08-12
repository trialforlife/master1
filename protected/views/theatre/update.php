<?php
/* @var $this TheatreController */
/* @var $model Theatre */

$this->breadcrumbs=array(
	'Theatres'=>array('index'),
	$model->t_id=>array('view','id'=>$model->t_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Theatre', 'url'=>array('index')),
	array('label'=>'Create Theatre', 'url'=>array('create')),
	array('label'=>'View Theatre', 'url'=>array('view', 'id'=>$model->t_id)),
	array('label'=>'Manage Theatre', 'url'=>array('admin')),
);
?>

<h1>Update Theatre <?php echo $model->t_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>