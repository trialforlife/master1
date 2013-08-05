<?php
/* @var $this ShipmentBannerController */
/* @var $model ShipmentBanner */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'shipment-banner-form',
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
		<?php echo $form->labelEx($model,'sb_banner'); ?>
		<?php echo $form->textArea($model,'sb_banner',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'sb_banner'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->