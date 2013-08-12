<?php
/* @var $this ShipmentSpecialController */
/* @var $model ShipmentSpecial */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'shipment-special-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'s_id'); ?>
		<?php echo $form->textField($model,'s_id'); ?>
		<?php echo $form->error($model,'s_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ss_name'); ?>
		<?php echo $form->textField($model,'ss_name',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'ss_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ss_image'); ?>
		<?php echo $form->textField($model,'ss_image',array('size'=>60,'maxlength'=>10000)); ?>
		<?php echo $form->error($model,'ss_image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ss_content'); ?>
		<?php echo $form->textArea($model,'ss_content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'ss_content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ss_price'); ?>
		<?php echo $form->textField($model,'ss_price',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'ss_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ss_published'); ?>
		<?php echo $form->textField($model,'ss_published'); ?>
		<?php echo $form->error($model,'ss_published'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->