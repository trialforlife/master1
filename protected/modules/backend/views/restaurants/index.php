<?php
/* @var $this CinemaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Театры',
);

$this->menu=array(
	array('label'=>'Добавить ресторан', 'url'=>array('create')),
	array('label'=>'Управление ресторан', 'url'=>array('admin')),
);
?>

<h1>Театры</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
