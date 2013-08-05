<?php
/* @var $this ShipmentSpecialController */
/* @var $model ShipmentSpecial */

$this->breadcrumbs=array(
	'Shipment Specials'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ShipmentSpecial', 'url'=>array('index')),
	array('label'=>'Manage ShipmentSpecial', 'url'=>array('admin')),
);
?>

<h1>Create ShipmentSpecial</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>