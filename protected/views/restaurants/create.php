<?php
/* @var $this RestaurantsController */
/* @var $model Restaurants */

$this->breadcrumbs=array(
	'Restaurants'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Restaurants', 'url'=>array('index')),
	array('label'=>'Manage Restaurants', 'url'=>array('admin')),
);
?>

<h1>Create Restaurants</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>