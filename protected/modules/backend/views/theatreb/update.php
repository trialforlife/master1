<?php
/* @var $this CinemaBannerController */
/* @var $model CinemaBanner */

$this->breadcrumbs=array(
	'Баннера театров'=>array('index'),
	$model->tb_id=>array('view','id'=>$model->tb_id),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Добавить', 'url'=>array('create')),
	array('label'=>'Просмотр', 'url'=>array('view', 'id'=>$model->tb_id)),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Редактирование баннера театра <?php echo $model->tb_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>