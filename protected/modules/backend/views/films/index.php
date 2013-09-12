<?php
/* @var $this FilmsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Films',
);

$this->menu=array(
	array('label'=>'Добавить фильм', 'url'=>array('create')),
	array('label'=>'Управление фильмами', 'url'=>array('admin')),
);
?>

<h1>Фильмы</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
