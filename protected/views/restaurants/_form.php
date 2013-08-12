<?php
/* @var $this RestaurantsController */
/* @var $model Restaurants */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'restaurants-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'r_name'); ?>
		<?php echo $form->textField($model,'r_name',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'r_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'r_image'); ?>
		<?php echo $form->textArea($model,'r_image',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'r_image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'r_published'); ?>
		<?php echo $form->textField($model,'r_published'); ?>
		<?php echo $form->error($model,'r_published'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->