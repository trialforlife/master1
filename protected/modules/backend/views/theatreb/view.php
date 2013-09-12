<?php
/* @var $this CinemaBannerController */
/* @var $model CinemaBanner */

$this->breadcrumbs=array(
	'Баннера театров'=>array('index'),
	$model->tb_id,
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Добавить', 'url'=>array('create')),
	array('label'=>'Редактировать', 'url'=>array('update', 'id'=>$model->tb_id)),
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->tb_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Просмотр баннера #<?php echo $model->tb_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tb_id',
		't_id',
		'tb_banner',
		'tb_published',
	),
)); ?>
