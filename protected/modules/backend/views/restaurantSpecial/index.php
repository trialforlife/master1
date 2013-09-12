<?php
/* @var $this RestaurantSpecialController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Restaurant Specials',
);

$this->menu=array(
	array('label'=>'Create RestaurantSpecial', 'url'=>array('create')),
	array('label'=>'Manage RestaurantSpecial', 'url'=>array('admin')),
);
?>

<h1>Restaurant Specials</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
