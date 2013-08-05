<?php
/* @var $this EventsController */
/* @var $model Events */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'events-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ev_name'); ?>
		<?php echo $form->textField($model,'ev_name',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'ev_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ev_time'); ?>
		<?php echo $form->textField($model,'ev_time',array('size'=>60,'maxlength'=>10000)); ?>
		<?php echo $form->error($model,'ev_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ev_image'); ?>
		<?php echo $form->textArea($model,'ev_image',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'ev_image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ev_content'); ?>
		<?php echo $form->textArea($model,'ev_content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'ev_content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ev_published'); ?>
		<?php echo $form->textField($model,'ev_published'); ?>
		<?php echo $form->error($model,'ev_published'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->