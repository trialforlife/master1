<?php
/* @var $this CinemaController */
/* @var $model Cinema */

$this->breadcrumbs=array(
	'Tеатры'=>array('index'),
	$model->t_id,
);

$this->menu=array(
	array('label'=>'Список театров', 'url'=>array('index')),
	array('label'=>'Добавить театр', 'url'=>array('create')),
	array('label'=>'Редактировать театр', 'url'=>array('update', 'id'=>$model->t_id)),
	array('label'=>'Удалить театр', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->t_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление театрами', 'url'=>array('admin')),
    array('label'=>'------------------------'),
    array('label'=>'Добавить баннер', 'url'=>array('./theatreb/create','id_t'=>$model->t_id)),
    array('label'=>'Список баннеров', 'url'=>array('./theatreb/index','id_t'=>$model->t_id)),
    array('label'=>'Управление баннерами', 'url'=>array('./theatreb/admin','id_t'=>$model->t_id)),
    array('label'=>'------------------------'),
    array('label'=>'Добавить спектакль', 'url'=>array('./play/create','id_t'=>$model->t_id)),
    array('label'=>'Список спектаклей', 'url'=>array('./play/index','id_t'=>$model->t_id)),
    array('label'=>'Управление спектаклями', 'url'=>array('./play/admin','id_t'=>$model->t_id)),
);
?>

<h1>Просмотр театра #<?php echo $model->t_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		't_id',
		't_name',
		't_adress',
        't_phone',
        't_site',
		't_published',
	),
)); ?>
