<?php
/* @var $this CinemaController */
/* @var $model Cinema */

$this->breadcrumbs=array(
	'Cinemas'=>array('index'),
	$model->c_id,
);

$this->menu=array(
	array('label'=>'List Cinema', 'url'=>array('index')),
	array('label'=>'Create Cinema', 'url'=>array('create')),
	array('label'=>'Update Cinema', 'url'=>array('update', 'id'=>$model->c_id)),
	array('label'=>'Delete Cinema', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->c_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cinema', 'url'=>array('admin')),
);
?>

<h1>View Cinema #<?php echo $model->c_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'c_id',
		'c_name',
		'c_adress',
		'c_published',
	),
)); ?>
