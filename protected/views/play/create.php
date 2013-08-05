<?php
/* @var $this PlayController */
/* @var $model Play */

$this->breadcrumbs=array(
	'Plays'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Play', 'url'=>array('index')),
	array('label'=>'Manage Play', 'url'=>array('admin')),
);
?>

<h1>Create Play</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>