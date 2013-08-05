<?php
/* @var $this ShipmentController */
/* @var $model Shipment */

$this->breadcrumbs=array(
	'Shipments'=>array('index'),
	$model->s_id=>array('view','id'=>$model->s_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Shipment', 'url'=>array('index')),
	array('label'=>'Create Shipment', 'url'=>array('create')),
	array('label'=>'View Shipment', 'url'=>array('view', 'id'=>$model->s_id)),
	array('label'=>'Manage Shipment', 'url'=>array('admin')),
);
?>

<h1>Update Shipment <?php echo $model->s_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>