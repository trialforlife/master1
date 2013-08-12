<?php
/* @var $this EventsBannerController */
/* @var $model EventsBanner */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'events-banner-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ev_id'); ?>
		<?php echo $form->textField($model,'ev_id'); ?>
		<?php echo $form->error($model,'ev_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'evb_banner'); ?>
		<?php echo $form->textArea($model,'evb_banner',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'evb_banner'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'evb_published'); ?>
		<?php echo $form->textField($model,'evb_published'); ?>
		<?php echo $form->error($model,'evb_published'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->