<?php
/* @var $this EventsBannerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Events Banners',
);

$this->menu=array(
	array('label'=>'Create EventsBanner', 'url'=>array('create')),
	array('label'=>'Manage EventsBanner', 'url'=>array('admin')),
);
?>

<h1>Events Banners</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
