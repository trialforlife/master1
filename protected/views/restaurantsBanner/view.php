<?php
/* @var $this RestaurantsBannerController */
/* @var $model RestaurantsBanner */

$this->breadcrumbs=array(
	'Restaurants Banners'=>array('index'),
	$model->rb_id,
);

$this->menu=array(
	array('label'=>'List RestaurantsBanner', 'url'=>array('index')),
	array('label'=>'Create RestaurantsBanner', 'url'=>array('create')),
	array('label'=>'Update RestaurantsBanner', 'url'=>array('update', 'id'=>$model->rb_id)),
	array('label'=>'Delete RestaurantsBanner', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->rb_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RestaurantsBanner', 'url'=>array('admin')),
);
?>

<h1>View RestaurantsBanner #<?php echo $model->rb_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'rb_id',
		'r_id',
		'rb_banner',
		'rb_published',
	),
)); ?>
