<?php
/* @var $this EntertainmentBannerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Entertainment Banners',
);

$this->menu=array(
	array('label'=>'Create EntertainmentBanner', 'url'=>array('create')),
	array('label'=>'Manage EntertainmentBanner', 'url'=>array('admin')),
);
?>

<h1>Entertainment Banners</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
