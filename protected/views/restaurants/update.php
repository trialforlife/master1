<?php
/* @var $this RestaurantsController */
/* @var $model Restaurants */

$this->breadcrumbs=array(
	'Restaurants'=>array('index'),
	$model->r_id=>array('view','id'=>$model->r_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Restaurants', 'url'=>array('index')),
	array('label'=>'Create Restaurants', 'url'=>array('create')),
	array('label'=>'View Restaurants', 'url'=>array('view', 'id'=>$model->r_id)),
	array('label'=>'Manage Restaurants', 'url'=>array('admin')),
);
?>

<h1>Update Restaurants <?php echo $model->r_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>