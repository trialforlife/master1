<?php
/* @var $this PlayController */
/* @var $model Play */

$this->breadcrumbs=array(
	'Plays'=>array('index'),
	$model->f_id,
);

$this->menu=array(
	array('label'=>'List Play', 'url'=>array('index')),
	array('label'=>'Create Play', 'url'=>array('create')),
	array('label'=>'Update Play', 'url'=>array('update', 'id'=>$model->f_id)),
	array('label'=>'Delete Play', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->f_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Play', 'url'=>array('admin')),
);
?>

<h1>View Play #<?php echo $model->f_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'f_id',
		'c_id',
		'f_name',
		'f_time',
		'f_price',
		'f_content',
		'f_image',
		'f_published',
	),
)); ?>
