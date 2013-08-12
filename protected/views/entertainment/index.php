<?php
/* @var $this EntertainmentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Entertainments',
);

$this->menu=array(
	array('label'=>'Create Entertainment', 'url'=>array('create')),
	array('label'=>'Manage Entertainment', 'url'=>array('admin')),
);
?>

<h1>Entertainments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
