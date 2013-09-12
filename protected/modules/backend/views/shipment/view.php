<?php
/* @var $this ShipmentController */
/* @var $model Shipment */

$this->breadcrumbs=array(
	'Shipments'=>array('index'),
	$model->s_id,
);

$this->menu=array(
	array('label'=>'Список доставок', 'url'=>array('index')),
	array('label'=>'Добавить доставку', 'url'=>array('create')),
	array('label'=>'Редактирование доставки', 'url'=>array('update', 'id'=>$model->s_id)),
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->s_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Просмотр Доставки #<?php echo $model->s_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		's_id',
		's_name',
		's_content',
		's_phone',
		's_image',
		's_type',
		's_published',
		's_site',
		's_adress',
		's_special',
	),
)); ?>
