<?php
/* @var $this FilmsController */
/* @var $model Films */

$this->breadcrumbs=array(
	'Films'=>array('index'),
	$model->f_id,
);

$this->menu=array(
	array('label'=>'List Films', 'url'=>array('index')),
	array('label'=>'Create Films', 'url'=>array('create')),
	array('label'=>'Update Films', 'url'=>array('update', 'id'=>$model->f_id)),
	array('label'=>'Delete Films', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->f_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Films', 'url'=>array('admin')),
);
?>

<h1>View Films #<?php echo $model->f_id; ?></h1>

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
