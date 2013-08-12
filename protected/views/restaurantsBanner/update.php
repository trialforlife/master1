<?php
/* @var $this RestaurantsBannerController */
/* @var $model RestaurantsBanner */

$this->breadcrumbs=array(
	'Restaurants Banners'=>array('index'),
	$model->rb_id=>array('view','id'=>$model->rb_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RestaurantsBanner', 'url'=>array('index')),
	array('label'=>'Create RestaurantsBanner', 'url'=>array('create')),
	array('label'=>'View RestaurantsBanner', 'url'=>array('view', 'id'=>$model->rb_id)),
	array('label'=>'Manage RestaurantsBanner', 'url'=>array('admin')),
);
?>

<h1>Update RestaurantsBanner <?php echo $model->rb_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>