<?php
/* @var $this EventsBannerController */
/* @var $model EventsBanner */

$this->breadcrumbs=array(
	'Events Banners'=>array('index'),
	$model->evb_id=>array('view','id'=>$model->evb_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EventsBanner', 'url'=>array('index')),
	array('label'=>'Create EventsBanner', 'url'=>array('create')),
	array('label'=>'View EventsBanner', 'url'=>array('view', 'id'=>$model->evb_id)),
	array('label'=>'Manage EventsBanner', 'url'=>array('admin')),
);
?>

<h1>Update EventsBanner <?php echo $model->evb_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>