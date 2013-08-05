<?php
/* @var $this EntertainmentController */
/* @var $model Entertainment */

$this->breadcrumbs=array(
	'Entertainments'=>array('index'),
	$model->en_id=>array('view','id'=>$model->en_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Entertainment', 'url'=>array('index')),
	array('label'=>'Create Entertainment', 'url'=>array('create')),
	array('label'=>'View Entertainment', 'url'=>array('view', 'id'=>$model->en_id)),
	array('label'=>'Manage Entertainment', 'url'=>array('admin')),
);
?>

<h1>Update Entertainment <?php echo $model->en_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>