<?php
/* @var $this EntertainmentBannerController */
/* @var $model EntertainmentBanner */

$this->breadcrumbs=array(
	'Entertainment Banners'=>array('index'),
	$model->enb_id,
);

$this->menu=array(
	array('label'=>'List EntertainmentBanner', 'url'=>array('index')),
	array('label'=>'Create EntertainmentBanner', 'url'=>array('create')),
	array('label'=>'Update EntertainmentBanner', 'url'=>array('update', 'id'=>$model->enb_id)),
	array('label'=>'Delete EntertainmentBanner', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->enb_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EntertainmentBanner', 'url'=>array('admin')),
);
?>

<h1>View EntertainmentBanner #<?php echo $model->enb_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'enb_id',
		'en_id',
		'enb_banner',
	),
)); ?>
