<?php
/* @var $this PlayController */
/* @var $model Play */

$this->breadcrumbs=array(
	'Plays'=>array('index'),
	$model->p_id=>array('view','id'=>$model->p_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Добавить', 'url'=>array('create')),
	array('label'=>'Просмотр', 'url'=>array('view', 'id'=>$model->p_id)),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Редактирование спектакля <?php echo $model->p_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>