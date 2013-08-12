<?php
/* @var $this RestaurantsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Restaurants',
);

$this->menu=array(
	array('label'=>'Create Restaurants', 'url'=>array('create')),
	array('label'=>'Manage Restaurants', 'url'=>array('admin')),
);
?>

<h1>Restaurants</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
