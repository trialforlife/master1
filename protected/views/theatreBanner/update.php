<?php
/* @var $this TheatreBannerController */
/* @var $model TheatreBanner */

$this->breadcrumbs=array(
	'Theatre Banners'=>array('index'),
	$model->tb_id=>array('view','id'=>$model->tb_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TheatreBanner', 'url'=>array('index')),
	array('label'=>'Create TheatreBanner', 'url'=>array('create')),
	array('label'=>'View TheatreBanner', 'url'=>array('view', 'id'=>$model->tb_id)),
	array('label'=>'Manage TheatreBanner', 'url'=>array('admin')),
);
?>

<h1>Update TheatreBanner <?php echo $model->tb_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>