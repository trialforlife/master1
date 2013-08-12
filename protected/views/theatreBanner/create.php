<?php
/* @var $this TheatreBannerController */
/* @var $model TheatreBanner */

$this->breadcrumbs=array(
	'Theatre Banners'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TheatreBanner', 'url'=>array('index')),
	array('label'=>'Manage TheatreBanner', 'url'=>array('admin')),
);
?>

<h1>Create TheatreBanner</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>