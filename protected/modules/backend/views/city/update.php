<?php
/* @var $this CityController */
/* @var $model City */

$this->breadcrumbs=array(
	'Cities'=>array('index'),
	$model->city_id=>array('view','id'=>$model->city_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Список городов', 'url'=>array('index')),
	array('label'=>'Добавить город', 'url'=>array('create')),
	array('label'=>'Просмотр города', 'url'=>array('view', 'id'=>$model->city_id)),
	array('label'=>'Управление городами', 'url'=>array('admin')),
);
?>

<h1>Update City <?php echo $model->city_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>