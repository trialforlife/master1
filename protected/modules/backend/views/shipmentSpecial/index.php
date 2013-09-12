<?php
/* @var $this ShipmentSpecialController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Shipment Specials',
);

$this->menu=array(
	array('label'=>'Create ShipmentSpecial', 'url'=>array('create')),
	array('label'=>'Manage ShipmentSpecial', 'url'=>array('admin')),
);
?>

<h1>Shipment Specials</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
