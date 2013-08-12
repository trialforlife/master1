<?php
/* @var $this EventsController */
/* @var $model Events */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ev_id'); ?>
		<?php echo $form->textField($model,'ev_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ev_name'); ?>
		<?php echo $form->textField($model,'ev_name',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ev_time'); ?>
		<?php echo $form->textField($model,'ev_time',array('size'=>60,'maxlength'=>10000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ev_image'); ?>
		<?php echo $form->textArea($model,'ev_image',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ev_content'); ?>
		<?php echo $form->textArea($model,'ev_content',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ev_published'); ?>
		<?php echo $form->textField($model,'ev_published'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->