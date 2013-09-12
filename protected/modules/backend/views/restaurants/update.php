<?php
/* @var $this CinemaController */
/* @var $model Cinema */

$this->breadcrumbs=array(
	'Ресторан'=>array('index'),
	$model->r_id=>array('view','id'=>$model->r_id),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'Список театров', 'url'=>array('index')),
	array('label'=>'Добавить театр', 'url'=>array('create')),
	array('label'=>'Просмотр театра', 'url'=>array('view', 'id'=>$model->r_id)),
	array('label'=>'Управление театрами', 'url'=>array('admin')),
    array('label'=>'------------------------'),
    array('label'=>'Добавить баннер', 'url'=>array('./restaurantsbanner/index','id_r'=>$model->r_id)),
    array('label'=>'Управление баннерами', 'url'=>array('./restaurantsbanner/admin','id_r'=>$model->r_id)),
);
?>

<h1>Редактирование ресторана <?php echo $model->r_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>