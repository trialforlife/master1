<?php
/* @var $this RestaurantSpecialController */
/* @var $model RestaurantSpecial */

$this->breadcrumbs=array(
	'Restaurant Specials'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RestaurantSpecial', 'url'=>array('index')),
	array('label'=>'Manage RestaurantSpecial', 'url'=>array('admin')),
);
?>

<h1>Create RestaurantSpecial</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>