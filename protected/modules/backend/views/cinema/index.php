<?php
/* @var $this CinemaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Кинотеатры',
);

$this->menu=array(
	array('label'=>'Добавить кинотеатр', 'url'=>array('create')),
	array('label'=>'Управление кинотеатрами', 'url'=>array('admin')),
);
?>

<h1>Кинотеатры</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
