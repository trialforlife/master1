<?php
/* @var $this CinemaBannerController */
/* @var $model CinemaBanner */

$this->breadcrumbs=array(
	'Cinema Banners'=>array('index'),
	$model->cb_id=>array('view','id'=>$model->cb_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CinemaBanner', 'url'=>array('index')),
	array('label'=>'Create CinemaBanner', 'url'=>array('create')),
	array('label'=>'View CinemaBanner', 'url'=>array('view', 'id'=>$model->cb_id)),
	array('label'=>'Manage CinemaBanner', 'url'=>array('admin')),
);
?>

<h1>Update CinemaBanner <?php echo $model->cb_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>