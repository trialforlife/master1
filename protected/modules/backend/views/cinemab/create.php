<?php
/* @var $this CinemaBannerController */
/* @var $model CinemaBanner */

$this->breadcrumbs=array(
	'Баннера кинотеатров'=>array('index'),
	'Добавить',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Добавление баннера кинотеатра</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>