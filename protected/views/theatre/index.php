<?php
/* @var $this TheatreController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Theatres',
);

$this->menu=array(
	array('label'=>'Create Theatre', 'url'=>array('create')),
	array('label'=>'Manage Theatre', 'url'=>array('admin')),
);
?>

<h1>Theatres</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
