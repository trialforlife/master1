<?php
/* @var $this RestaurantSpecialController */
/* @var $model RestaurantSpecial */

$this->breadcrumbs=array(
	'Restaurant Specials'=>array('index'),
	$model->rs_id,
);

$this->menu=array(
	array('label'=>'List RestaurantSpecial', 'url'=>array('index')),
	array('label'=>'Create RestaurantSpecial', 'url'=>array('create')),
	array('label'=>'Update RestaurantSpecial', 'url'=>array('update', 'id'=>$model->rs_id)),
	array('label'=>'Delete RestaurantSpecial', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->rs_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RestaurantSpecial', 'url'=>array('admin')),
);
?>

<h1>View RestaurantSpecial #<?php echo $model->rs_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'rs_id',
		'r_id',
		'rs_name',
		'rs_image',
		'rs_content',
		'rs_price',
		'rs_published',
	),
)); ?>
