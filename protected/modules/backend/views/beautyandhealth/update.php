<?php
/* @var $this BeautyandhealthController */
/* @var $model Beautyandhealth */

$this->breadcrumbs=array(
	'Beautyandhealths'=>array('index'),
	$model->bh_id=>array('view','id'=>$model->bh_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Добавить', 'url'=>array('create')),
	array('label'=>'Просмотр', 'url'=>array('view', 'id'=>$model->bh_id)),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Редактирование элемента Здоровье и красота <?php echo $model->bh_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>