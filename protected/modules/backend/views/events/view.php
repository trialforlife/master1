<?php
/* @var $this EventsController */
/* @var $model Events */

$this->breadcrumbs=array(
	'Events'=>array('index'),
	$model->ev_id,
);

$this->menu=array(
	array('label'=>'Список событий', 'url'=>array('index')),
	array('label'=>'Добавить событие', 'url'=>array('create')),
	array('label'=>'Редактирование событий', 'url'=>array('update', 'id'=>$model->ev_id)),
	array('label'=>'Удалить событие', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ev_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление событиями', 'url'=>array('admin')),
);
?>

<h1>Просмотр события #<?php echo $model->ev_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ev_id',
		'ev_name',
		'ev_time',
		'ev_image',
		'ev_content',
		'ev_published',
	),
)); ?>
