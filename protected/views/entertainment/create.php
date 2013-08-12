<?php
/* @var $this EntertainmentController */
/* @var $model Entertainment */

$this->breadcrumbs=array(
	'Entertainments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Entertainment', 'url'=>array('index')),
	array('label'=>'Manage Entertainment', 'url'=>array('admin')),
);
?>

<h1>Create Entertainment</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>