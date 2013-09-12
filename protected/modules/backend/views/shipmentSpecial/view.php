<?php
/* @var $this ShipmentSpecialController */
/* @var $model ShipmentSpecial */

$this->breadcrumbs=array(
	'Shipment Specials'=>array('index'),
	$model->ss_id,
);

$this->menu=array(
	array('label'=>'List ShipmentSpecial', 'url'=>array('index')),
	array('label'=>'Create ShipmentSpecial', 'url'=>array('create')),
	array('label'=>'Update ShipmentSpecial', 'url'=>array('update', 'id'=>$model->ss_id)),
	array('label'=>'Delete ShipmentSpecial', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ss_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ShipmentSpecial', 'url'=>array('admin')),
);
?>

<h1>View ShipmentSpecial #<?php echo $model->ss_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ss_id',
		's_id',
		'ss_name',
		'ss_image',
		'ss_content',
		'ss_price',
		'ss_published',
	),
)); ?>
