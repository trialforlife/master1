<?php
/* @var $this RestaurantsController */
/* @var $model Restaurants */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'r_id'); ?>
		<?php echo $form->textField($model,'r_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'r_name'); ?>
		<?php echo $form->textField($model,'r_name',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'r_image'); ?>
		<?php echo $form->textArea($model,'r_image',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'r_published'); ?>
		<?php echo $form->textField($model,'r_published'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->