<?php
/* @var $this CinemaBannerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cinema Banners',
);

$this->menu=array(
	array('label'=>'Create CinemaBanner', 'url'=>array('create')),
	array('label'=>'Manage CinemaBanner', 'url'=>array('admin')),
);
?>

<h1>Cinema Banners</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
