<?php
/* @var $this PlayController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Plays',
);

$this->menu=array(
	array('label'=>'Create Play', 'url'=>array('create')),
	array('label'=>'Manage Play', 'url'=>array('admin')),
);
?>

<h1>Спектакли</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
