<?php
/* @var $this FilmsController */
/* @var $model Films */

$this->breadcrumbs=array(
	'Films'=>array('index'),
	$model->f_id=>array('view','id'=>$model->f_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Список фильмов', 'url'=>array('index')),
	array('label'=>'Добавить фильм', 'url'=>array('create')),
	array('label'=>'Просмотр фильма', 'url'=>array('view', 'id'=>$model->f_id)),
	array('label'=>'Управление фильмами', 'url'=>array('admin')),
);
?>

<h1>Редактирование фильма <?php echo $model->f_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>