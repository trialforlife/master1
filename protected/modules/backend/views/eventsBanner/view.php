<?php
/* @var $this EventsBannerController */
/* @var $model EventsBanner */

$this->breadcrumbs=array(
	'Events Banners'=>array('index'),
	$model->evb_id,
);

$this->menu=array(
	array('label'=>'List EventsBanner', 'url'=>array('index')),
	array('label'=>'Create EventsBanner', 'url'=>array('create')),
	array('label'=>'Update EventsBanner', 'url'=>array('update', 'id'=>$model->evb_id)),
	array('label'=>'Delete EventsBanner', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->evb_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EventsBanner', 'url'=>array('admin')),
);
?>

<h1>View EventsBanner #<?php echo $model->evb_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'evb_id',
		'ev_id',
		'evb_banner',
		'evb_published',
	),
)); ?>
