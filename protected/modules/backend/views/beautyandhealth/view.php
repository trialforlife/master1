<?php
/* @var $this BeautyandhealthController */
/* @var $model Beautyandhealth */

$this->breadcrumbs=array(
	'Beautyandhealths'=>array('index'),
	$model->bh_id,
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Добавить', 'url'=>array('create')),
	array('label'=>'Редактировать', 'url'=>array('update', 'id'=>$model->bh_id)),
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->bh_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Просмотр элемента Здоровье и красота #<?php echo $model->bh_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'bh_id',
		'bh_name',
		'bh_image',
		'bh_published',
		'bh_adress',
		'bh_phone',
		'bh_banner',
	),
)); ?>
