<?php
/* @var $this RestaurantSpecialController */
/* @var $model RestaurantSpecial */

$this->breadcrumbs=array(
	'Restaurant Specials'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List RestaurantSpecial', 'url'=>array('index')),
	array('label'=>'Create RestaurantSpecial', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#restaurant-special-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Restaurant Specials</h1>

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
	'id'=>'restaurant-special-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'rs_id',
		'r_id',
		'rs_name',
		'rs_image',
		'rs_content',
		'rs_price',
		/*
		'rs_published',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
