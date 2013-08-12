<?php
/* @var $this TheatreController */
/* @var $model Theatre */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'theatre-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'t_name'); ?>
		<?php echo $form->textField($model,'t_name',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'t_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'t_image'); ?>
		<?php echo $form->textField($model,'t_image',array('size'=>60,'maxlength'=>10000)); ?>
		<?php echo $form->error($model,'t_image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'t_published'); ?>
		<?php echo $form->textField($model,'t_published'); ?>
		<?php echo $form->error($model,'t_published'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->