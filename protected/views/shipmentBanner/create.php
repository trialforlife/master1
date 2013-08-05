<?php
/* @var $this ShipmentBannerController */
/* @var $model ShipmentBanner */

$this->breadcrumbs=array(
	'Shipment Banners'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ShipmentBanner', 'url'=>array('index')),
	array('label'=>'Manage ShipmentBanner', 'url'=>array('admin')),
);
?>

<h1>Create ShipmentBanner</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>