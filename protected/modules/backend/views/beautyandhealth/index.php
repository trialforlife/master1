<?php
/* @var $this CinemaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    'Кинотеатры',
);

$this->menu=array(
    array('label'=>'Добавить ', 'url'=>array('create')),
    array('label'=>'Управление', 'url'=>array('admin')),
);
?>

    <h1>Здоровье и красота</h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
)); ?>