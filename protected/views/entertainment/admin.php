<?php
/* @var $this EntertainmentController */
/* @var $model Entertainment */

$this->breadcrumbs=array(
	'Entertainments'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Entertainment', 'url'=>array('index')),
	array('label'=>'Create Entertainment', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#entertainment-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Entertainments</h1>

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
	'id'=>'entertainment-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'en_id',
		'en_name',
		'en_content',
		'en_image',
		'en_type',
		'en_time',
		/*
		'en_price',
		'en_content_add',
		'en_published',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
