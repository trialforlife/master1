<?php
/* @var $this CinemaController */
/* @var $model Cinema */

$this->breadcrumbs=array(
	'Кинотеатры'=>array('index'),
	$model->c_id,
);

$this->menu=array(
	array('label'=>'Список кинотеатров', 'url'=>array('index')),
	array('label'=>'Добавить кинотеатр', 'url'=>array('create')),
	array('label'=>'Редактировать кинотеатр', 'url'=>array('update', 'id'=>$model->c_id)),
	array('label'=>'Удалить кинотеатр', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->c_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление кинотеатрами', 'url'=>array('admin')),
    array('label'=>'------------------------'),
    array('label'=>'Добавить баннер', 'url'=>array('./cinemabanner/create','id_c'=>$model->c_id)),
    array('label'=>'Список баннеров', 'url'=>array('./cinemabanner/index','id_c'=>$model->c_id)),
    array('label'=>'Управление баннерами', 'url'=>array('./cinemabanner/admin','id_c'=>$model->c_id)),
    array('label'=>'------------------------'),
    array('label'=>'Добавить фильм', 'url'=>array('./films/create','id_c'=>$model->c_id)),
    array('label'=>'Список фильмов', 'url'=>array('./films/index','id_c'=>$model->c_id)),
    array('label'=>'Управление фильмами', 'url'=>array('./films/admin','id_c'=>$model->c_id)),
);
?>

<h1>Просмотр кинотеатра #<?php echo $model->c_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'c_id',
		'c_name',
		'c_adress',
        'c_phone',
        'c_site',
		'c_published',
	),
)); ?>
