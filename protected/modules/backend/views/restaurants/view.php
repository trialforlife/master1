<?php
/* @var $this CinemaController */
/* @var $model Cinema */

$this->breadcrumbs=array(
	'Рестораны'=>array('index'),
	$model->r_id,
);

$this->menu=array(
	array('label'=>'Список ресторанов', 'url'=>array('index')),
	array('label'=>'Добавить ресторан', 'url'=>array('create')),
	array('label'=>'Редактировать ресторан', 'url'=>array('update', 'id'=>$model->r_id)),
	array('label'=>'Удалить ресторан', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->r_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление ресторанами', 'url'=>array('admin')),
    array('label'=>'------------------------'),
    array('label'=>'Добавить баннер', 'url'=>array('./restaurantsbanner/create','id_r'=>$model->r_id)),
    array('label'=>'Список баннеров', 'url'=>array('./restaurantsbanner/index','id_r'=>$model->r_id)),
    array('label'=>'Управление баннерами', 'url'=>array('./restaurantsbanner/admin','id_r'=>$model->r_id)),
);
?>

<h1>Просмотр кинотеатра #<?php echo $model->r_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'r_id',
		'r_name',
		'r_adress',
        'r_phone',
        'r_site',
		'r_published',
	),
)); ?>
