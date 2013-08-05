<?php
/* @var $this EntertainmentBannerController */
/* @var $model EntertainmentBanner */

$this->breadcrumbs=array(
	'Entertainment Banners'=>array('index'),
	$model->enb_id=>array('view','id'=>$model->enb_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EntertainmentBanner', 'url'=>array('index')),
	array('label'=>'Create EntertainmentBanner', 'url'=>array('create')),
	array('label'=>'View EntertainmentBanner', 'url'=>array('view', 'id'=>$model->enb_id)),
	array('label'=>'Manage EntertainmentBanner', 'url'=>array('admin')),
);
?>

<h1>Update EntertainmentBanner <?php echo $model->enb_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>