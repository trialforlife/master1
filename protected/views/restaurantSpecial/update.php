<?php
/* @var $this RestaurantSpecialController */
/* @var $model RestaurantSpecial */

$this->breadcrumbs=array(
	'Restaurant Specials'=>array('index'),
	$model->rs_id=>array('view','id'=>$model->rs_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RestaurantSpecial', 'url'=>array('index')),
	array('label'=>'Create RestaurantSpecial', 'url'=>array('create')),
	array('label'=>'View RestaurantSpecial', 'url'=>array('view', 'id'=>$model->rs_id)),
	array('label'=>'Manage RestaurantSpecial', 'url'=>array('admin')),
);
?>

<h1>Update RestaurantSpecial <?php echo $model->rs_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>