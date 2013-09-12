<?php
/* @var $this PlayController */
/* @var $model Play */

$this->breadcrumbs=array(
	'Plays'=>array('index'),
	$model->f_id=>array('view','id'=>$model->f_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Play', 'url'=>array('index')),
	array('label'=>'Create Play', 'url'=>array('create')),
	array('label'=>'View Play', 'url'=>array('view', 'id'=>$model->f_id)),
	array('label'=>'Manage Play', 'url'=>array('admin')),
);
?>

<h1>Update Play <?php echo $model->f_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>