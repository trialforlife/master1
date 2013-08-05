<?php
/* @var $this TheatreBannerController */
/* @var $model TheatreBanner */

$this->breadcrumbs=array(
	'Theatre Banners'=>array('index'),
	$model->tb_id,
);

$this->menu=array(
	array('label'=>'List TheatreBanner', 'url'=>array('index')),
	array('label'=>'Create TheatreBanner', 'url'=>array('create')),
	array('label'=>'Update TheatreBanner', 'url'=>array('update', 'id'=>$model->tb_id)),
	array('label'=>'Delete TheatreBanner', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->tb_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TheatreBanner', 'url'=>array('admin')),
);
?>

<h1>View TheatreBanner #<?php echo $model->tb_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tb_id',
		't_id',
		'tb_banner',
		'tb_published',
	),
)); ?>
