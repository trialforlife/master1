<?php
/* @var $this CityController */
/* @var $model City */

$this->breadcrumbs=array(
	'Cities'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Список городов', 'url'=>array('index')),
	array('label'=>'Управление городами', 'url'=>array('admin')),
);
?>

<h1>Create City</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>