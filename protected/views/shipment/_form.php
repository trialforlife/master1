<?php
/* @var $this ShipmentController */
/* @var $model Shipment */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'shipment-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'s_name'); ?>
		<?php echo $form->textField($model,'s_name',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'s_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'s_content'); ?>
		<?php echo $form->textArea($model,'s_content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'s_content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'s_image'); ?>
		<?php echo $form->textArea($model,'s_image',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'s_image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'s_published'); ?>
		<?php echo $form->textField($model,'s_published'); ?>
		<?php echo $form->error($model,'s_published'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->