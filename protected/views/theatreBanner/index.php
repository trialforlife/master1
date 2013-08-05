<?php
/* @var $this TheatreBannerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Theatre Banners',
);

$this->menu=array(
	array('label'=>'Create TheatreBanner', 'url'=>array('create')),
	array('label'=>'Manage TheatreBanner', 'url'=>array('admin')),
);
?>

<h1>Theatre Banners</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
