<?php
/* @var $this CinemaBannerController */
/* @var $model CinemaBanner */

$this->breadcrumbs=array(
	'Cinema Banners'=>array('index'),
	$model->cb_id,
);

$this->menu=array(
	array('label'=>'List CinemaBanner', 'url'=>array('index')),
	array('label'=>'Create CinemaBanner', 'url'=>array('create')),
	array('label'=>'Update CinemaBanner', 'url'=>array('update', 'id'=>$model->cb_id)),
	array('label'=>'Delete CinemaBanner', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cb_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CinemaBanner', 'url'=>array('admin')),
);
?>

<h1>View CinemaBanner #<?php echo $model->cb_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cb_id',
		'c_id',
		'cb_banner',
		'cb_published',
	),
)); ?>
