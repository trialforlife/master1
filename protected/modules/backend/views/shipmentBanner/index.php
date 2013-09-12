<?php
/* @var $this ShipmentBannerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Shipment Banners',
);

$this->menu=array(
	array('label'=>'Create ShipmentBanner', 'url'=>array('create')),
	array('label'=>'Manage ShipmentBanner', 'url'=>array('admin')),
);
?>

<h1>Shipment Banners</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
