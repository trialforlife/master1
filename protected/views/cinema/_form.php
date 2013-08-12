<?php
/* @var $this CinemaController */
/* @var $model Cinema */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cinema-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'c_name'); ?>
		<?php echo $form->textField($model,'c_name',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'c_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_adress'); ?>
		<?php echo $form->textArea($model,'c_adress',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'c_adress'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_published'); ?>
		<?php echo $form->textField($model,'c_published'); ?>
		<?php echo $form->error($model,'c_published'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->