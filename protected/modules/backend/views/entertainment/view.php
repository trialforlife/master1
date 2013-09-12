<?php
/* @var $this EntertainmentController */
/* @var $model Entertainment */

$this->breadcrumbs=array(
	'Entertainments'=>array('index'),
	$model->en_id,
);

$this->menu=array(
	array('label'=>'Список развлечений', 'url'=>array('index')),
	array('label'=>'Добавить', 'url'=>array('create')),
	array('label'=>'Редактировать', 'url'=>array('update', 'id'=>$model->en_id)),
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->en_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Просмотр развлечений #<?php echo $model->en_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'en_id',
		'en_name',
		'en_content',
		'en_image',
		'en_type',
		'en_time',
		'en_price',
		'en_content_add',
		'en_published',
	),
)); ?>
