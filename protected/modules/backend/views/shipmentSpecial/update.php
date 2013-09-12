<?php
/* @var $this ShipmentSpecialController */
/* @var $model ShipmentSpecial */

$this->breadcrumbs=array(
	'Shipment Specials'=>array('index'),
	$model->ss_id=>array('view','id'=>$model->ss_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ShipmentSpecial', 'url'=>array('index')),
	array('label'=>'Create ShipmentSpecial', 'url'=>array('create')),
	array('label'=>'View ShipmentSpecial', 'url'=>array('view', 'id'=>$model->ss_id)),
	array('label'=>'Manage ShipmentSpecial', 'url'=>array('admin')),
);
?>

<h1>Update ShipmentSpecial <?php echo $model->ss_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>