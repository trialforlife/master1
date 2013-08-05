<?php
/* @var $this ShipmentController */
/* @var $model Shipment */

$this->breadcrumbs=array(
	'Shipments'=>array('index'),
	$model->s_id,
);

$this->menu=array(
	array('label'=>'List Shipment', 'url'=>array('index')),
	array('label'=>'Create Shipment', 'url'=>array('create')),
	array('label'=>'Update Shipment', 'url'=>array('update', 'id'=>$model->s_id)),
	array('label'=>'Delete Shipment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->s_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Shipment', 'url'=>array('admin')),
);
?>

<h1>View Shipment #<?php echo $model->s_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		's_id',
		's_name',
		's_content',
		's_image',
		's_published',
	),
)); ?>
