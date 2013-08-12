<?php
/* @var $this EntertainmentBannerController */
/* @var $model EntertainmentBanner */

$this->breadcrumbs=array(
	'Entertainment Banners'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EntertainmentBanner', 'url'=>array('index')),
	array('label'=>'Manage EntertainmentBanner', 'url'=>array('admin')),
);
?>

<h1>Create EntertainmentBanner</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>