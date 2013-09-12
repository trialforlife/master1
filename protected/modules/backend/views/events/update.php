<?php
/* @var $this EventsController */
/* @var $model Events */

$this->breadcrumbs=array(
	'Events'=>array('index'),
	$model->ev_id=>array('view','id'=>$model->ev_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Список событий', 'url'=>array('index')),
	array('label'=>'Добавить событие', 'url'=>array('create')),
	array('label'=>'Просмотр события', 'url'=>array('view', 'id'=>$model->ev_id)),
	array('label'=>'Управление событиями', 'url'=>array('admin')),
);
?>

<h1>Редактирование события <?php echo $model->ev_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>