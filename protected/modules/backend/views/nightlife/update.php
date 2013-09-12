<?php
/* @var $this NightlifeController */
/* @var $model Nightlife */

$this->breadcrumbs=array(
	'Nightlives'=>array('index'),
	$model->n_id=>array('view','id'=>$model->n_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Добавить', 'url'=>array('create')),
	array('label'=>'Просмотор', 'url'=>array('view', 'id'=>$model->n_id)),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Редактирование клуба <?php echo $model->n_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>