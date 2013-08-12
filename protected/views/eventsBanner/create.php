<?php
/* @var $this EventsBannerController */
/* @var $model EventsBanner */

$this->breadcrumbs=array(
	'Events Banners'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EventsBanner', 'url'=>array('index')),
	array('label'=>'Manage EventsBanner', 'url'=>array('admin')),
);
?>

<h1>Create EventsBanner</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>