<?php
/* @var $this FilmsController */
/* @var $model Films */

$this->breadcrumbs=array(
	'Films'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Список фильмов', 'url'=>array('index')),
	array('label'=>'Добавить фильм', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#films-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление фильмами</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'films-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'f_id',
		'c_id',
		'f_name',
		'f_time',
		'f_price',
		'f_content',
		/*
		'f_image',
		'f_published',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
