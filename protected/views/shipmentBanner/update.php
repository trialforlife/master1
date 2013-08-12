<?php
/* @var $this ShipmentBannerController */
/* @var $model ShipmentBanner */

$this->breadcrumbs=array(
	'Shipment Banners'=>array('index'),
	$model->sb_id=>array('view','id'=>$model->sb_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ShipmentBanner', 'url'=>array('index')),
	array('label'=>'Create ShipmentBanner', 'url'=>array('create')),
	array('label'=>'View ShipmentBanner', 'url'=>array('view', 'id'=>$model->sb_id)),
	array('label'=>'Manage ShipmentBanner', 'url'=>array('admin')),
);
?>

<h1>Update ShipmentBanner <?php echo $model->sb_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>