<?php
/* @var $this NightlifeController */
/* @var $model Nightlife */

$this->breadcrumbs=array(
	'Nightlives'=>array('index'),
	$model->n_id,
);

$this->menu=array(
	array('label'=>'Список клубов', 'url'=>array('index')),
	array('label'=>'Добавить клуб', 'url'=>array('create')),
	array('label'=>'Редактировать клуб', 'url'=>array('update', 'id'=>$model->n_id)),
	array('label'=>'Удалить клуб', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->n_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Просмотр Клуба #<?php echo $model->n_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'n_id',
		'n_name',
		'n_image',
		'n_adress',
		'n_time',
		'n_date',
		'n_banner',
		'n_site',
		'n_phone',
		'n_content',
		'n_published',
	),
)); ?>
