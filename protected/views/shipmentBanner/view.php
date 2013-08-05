<?php
/* @var $this ShipmentBannerController */
/* @var $model ShipmentBanner */

$this->breadcrumbs=array(
	'Shipment Banners'=>array('index'),
	$model->sb_id,
);

$this->menu=array(
	array('label'=>'List ShipmentBanner', 'url'=>array('index')),
	array('label'=>'Create ShipmentBanner', 'url'=>array('create')),
	array('label'=>'Update ShipmentBanner', 'url'=>array('update', 'id'=>$model->sb_id)),
	array('label'=>'Delete ShipmentBanner', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->sb_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ShipmentBanner', 'url'=>array('admin')),
);
?>

<h1>View ShipmentBanner #<?php echo $model->sb_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'sb_id',
		's_id',
		'sb_banner',
	),
)); ?>
