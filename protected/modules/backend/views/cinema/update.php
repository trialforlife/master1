<?php
/* @var $this CinemaController */
/* @var $model Cinema */

$this->breadcrumbs=array(
	'Кинотеатры'=>array('index'),
	$model->c_id=>array('view','id'=>$model->c_id),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'Список кинотеатров', 'url'=>array('index')),
	array('label'=>'Добавить кинотеатр', 'url'=>array('create')),
	array('label'=>'Просмотр кинотеатра', 'url'=>array('view', 'id'=>$model->c_id)),
	array('label'=>'Управление кинотеатрами', 'url'=>array('admin')),
    array('label'=>'------------------------'),
    array('label'=>'Добавить баннер', 'url'=>array('./cinemab/index','id_c'=>$model->c_id)),
    array('label'=>'Управление баннерами', 'url'=>array('./cinemab/admin','id_c'=>$model->c_id)),
    array('label'=>'------------------------'),
    array('label'=>'Добавить фильм', 'url'=>array('./films/create','id_c'=>$model->c_id)),
    array('label'=>'Список фильмов', 'url'=>array('./films/index','id_c'=>$model->c_id)),
    array('label'=>'Управление фильмами', 'url'=>array('./films/admin','id_c'=>$model->c_id)),
);
?>

<h1>Редактирование кинотеатра <?php echo $model->c_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>