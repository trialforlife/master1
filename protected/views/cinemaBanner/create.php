<?php
/* @var $this CinemaBannerController */
/* @var $model CinemaBanner */

$this->breadcrumbs=array(
	'Cinema Banners'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CinemaBanner', 'url'=>array('index')),
	array('label'=>'Manage CinemaBanner', 'url'=>array('admin')),
);
?>

<h1>Create CinemaBanner</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>