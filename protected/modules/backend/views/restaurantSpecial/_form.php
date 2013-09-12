<?php
/* @var $this RestaurantSpecialController */
/* @var $model RestaurantSpecial */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'restaurant-special-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'r_id'); ?>
		<?php echo $form->textField($model,'r_id'); ?>
		<?php echo $form->error($model,'r_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rs_name'); ?>
		<?php echo $form->textField($model,'rs_name',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'rs_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rs_image'); ?>
		<?php echo $form->textArea($model,'rs_image',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'rs_image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rs_content'); ?>
		<?php echo $form->textArea($model,'rs_content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'rs_content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rs_price'); ?>
		<?php echo $form->textField($model,'rs_price',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'rs_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rs_published'); ?>
		<?php echo $form->textField($model,'rs_published'); ?>
		<?php echo $form->error($model,'rs_published'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->