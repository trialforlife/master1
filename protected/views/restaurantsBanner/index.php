<?php
/* @var $this RestaurantsBannerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Restaurants Banners',
);

$this->menu=array(
	array('label'=>'Create RestaurantsBanner', 'url'=>array('create')),
	array('label'=>'Manage RestaurantsBanner', 'url'=>array('admin')),
);
?>

<h1>Restaurants Banners</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
