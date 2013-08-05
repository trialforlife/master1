<?php
/* @var $this FilmsController */
/* @var $model Films */

$this->breadcrumbs=array(
	'Films'=>array('index'),
	$model->f_id=>array('view','id'=>$model->f_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Films', 'url'=>array('index')),
	array('label'=>'Create Films', 'url'=>array('create')),
	array('label'=>'View Films', 'url'=>array('view', 'id'=>$model->f_id)),
	array('label'=>'Manage Films', 'url'=>array('admin')),
);
?>

<h1>Update Films <?php echo $model->f_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>