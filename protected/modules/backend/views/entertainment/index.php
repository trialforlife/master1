<?php
/* @var $this EntertainmentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Entertainments',
);

$this->menu=array(
	array('label'=>'Добавить', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Развлечения</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
