<?php
/* @var $this RestaurantsBannerController */
/* @var $model RestaurantsBanner */

$this->breadcrumbs=array(
	'Restaurants Banners'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RestaurantsBanner', 'url'=>array('index')),
	array('label'=>'Manage RestaurantsBanner', 'url'=>array('admin')),
);
?>

<h1>Create RestaurantsBanner</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>