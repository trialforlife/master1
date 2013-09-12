<?php
/* @var $this EntertainmentController */
/* @var $model Entertainment */

$this->breadcrumbs=array(
	'Entertainments'=>array('index'),
	$model->en_id=>array('view','id'=>$model->en_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Добавить', 'url'=>array('create')),
	array('label'=>'Просмотр', 'url'=>array('view', 'id'=>$model->en_id)),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Редактирование развлечений <?php echo $model->en_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>