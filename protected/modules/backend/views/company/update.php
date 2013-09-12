<?php
/* @var $this CompanyController */
/* @var $model Company */

$this->breadcrumbs=array(
	'Companies'=>array('index'),
	$model->com_id=>array('view','id'=>$model->com_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Просмотр', 'url'=>array('view', 'id'=>$model->com_id)),
);
?>

<h1>Редактирование "О нас" <?php echo $model->com_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>