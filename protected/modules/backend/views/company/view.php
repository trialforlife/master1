<?php
/* @var $this CompanyController */
/* @var $model Company */

$this->breadcrumbs=array(
	'Companies'=>array('index'),
	$model->com_id,
);

$this->menu=array(
	array('label'=>'Просмотр', 'url'=>array('index')),
	array('label'=>'Редактировать', 'url'=>array('update', 'id'=>$model->com_id)),
);
?>

<h1>View Company #<?php echo $model->com_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'com_id',
		'com_quote',
		'com_logo',
		'com_description',
		'com_phone',
		'com_site',
		'com_published',
	),
)); ?>
