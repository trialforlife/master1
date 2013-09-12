<?php
/* @var $this FilmsController */
/* @var $model Films */

$this->breadcrumbs=array(
	'Films'=>array('index'),
	$model->f_id,
);

$this->menu=array(
	array('label'=>'Список фильмов', 'url'=>array('index')),
	array('label'=>'Добавить фильм', 'url'=>array('create')),
	array('label'=>'Редактировать фильм', 'url'=>array('update', 'id'=>$model->f_id)),
	array('label'=>'Удалить фильм', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->f_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление фильмами', 'url'=>array('admin')),
);
?>

<h1>Просмотр фильма #<?php echo $model->f_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'f_id',
		'c_id',
		'f_name',
		'f_time',
		'f_price',
		'f_content',
		'f_image',
		'f_published',
	),
)); ?>
