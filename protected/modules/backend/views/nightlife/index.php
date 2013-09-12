<?php
/* @var $this NightlifeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Nightlives',
);

$this->menu=array(
	array('label'=>'Добавить', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Клубы</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
