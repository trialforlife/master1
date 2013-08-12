<?php
/* @var $this TheatreController */
/* @var $model Theatre */

$this->breadcrumbs=array(
	'Theatres'=>array('index'),
	$model->t_id,
);

$this->menu=array(
	array('label'=>'List Theatre', 'url'=>array('index')),
	array('label'=>'Create Theatre', 'url'=>array('create')),
	array('label'=>'Update Theatre', 'url'=>array('update', 'id'=>$model->t_id)),
	array('label'=>'Delete Theatre', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->t_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Theatre', 'url'=>array('admin')),
);
?>

<h1>View Theatre #<?php echo $model->t_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		't_id',
		't_name',
		't_image',
		't_published',
	),
)); ?>
