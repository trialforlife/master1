<?php
/* @var $this CinemaController */
/* @var $model Cinema */

$this->breadcrumbs=array(
	'Театры'=>array('index'),
	$model->t_id=>array('view','id'=>$model->t_id),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'Список театров', 'url'=>array('index')),
	array('label'=>'Добавить театр', 'url'=>array('create')),
	array('label'=>'Просмотр театра', 'url'=>array('view', 'id'=>$model->t_id)),
	array('label'=>'Управление театрами', 'url'=>array('admin')),
    array('label'=>'------------------------'),
    array('label'=>'Добавить баннер', 'url'=>array('./theatrebanner/index','id_t'=>$model->t_id)),
    array('label'=>'Управление баннерами', 'url'=>array('./theatrebanner/admin','id_t'=>$model->t_id)),
);
?>

<h1>Редактирование театра <?php echo $model->t_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>