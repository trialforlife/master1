<?php
/* @var $this FilmsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Films',
);

$this->menu=array(
	array('label'=>'Create Films', 'url'=>array('create')),
	array('label'=>'Manage Films', 'url'=>array('admin')),
);
?>

<h1>Films</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
