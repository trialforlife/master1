<?php
/* @var $this ShipmentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Shipments',
);

$this->menu=array(
	array('label'=>'Добавить', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Доставка</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
