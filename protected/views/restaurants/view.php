<?php
/* @var $this RestaurantsController */
/* @var $model Restaurants */

$this->breadcrumbs=array(
	'Restaurants'=>array('index'),
	$model->r_id,
);

$this->menu=array(
	array('label'=>'List Restaurants', 'url'=>array('index')),
	array('label'=>'Create Restaurants', 'url'=>array('create')),
	array('label'=>'Update Restaurants', 'url'=>array('update', 'id'=>$model->r_id)),
	array('label'=>'Delete Restaurants', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->r_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Restaurants', 'url'=>array('admin')),
);
?>

<h1>View Restaurants #<?php echo $model->r_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'r_id',
		'r_name',
		'r_image',
		'r_published',
	),
)); ?>
