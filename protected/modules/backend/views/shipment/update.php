<?php
/* @var $this ShipmentController */
/* @var $model Shipment */

$this->breadcrumbs=array(
	'Shipments'=>array('index'),
	$model->s_id=>array('view','id'=>$model->s_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Добавить', 'url'=>array('create')),
	array('label'=>'Просмотр', 'url'=>array('view', 'id'=>$model->s_id)),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Редактирование доставки <?php echo $model->s_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>