<?php
/* @var $this CinemaBannerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Баннера кинотеатров',
);

$this->menu=array(
	array('label'=>'Добавить', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Баннера кинотеатров</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
