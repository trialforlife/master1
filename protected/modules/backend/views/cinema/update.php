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
    array('label'=>'Добавить баннер', 'url'=>array('./cinemabanner/index','id_c'=>$model->c_id)),
    array('label'=>'Управление баннерами', 'url'=>array('./cinemabanner/admin','id_c'=>$model->c_id)),
);
?>

<h1>Редактирование кинотеатра <?php echo $model->c_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>