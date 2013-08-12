<?php
/* @var $this EntertainmentBannerController */
/* @var $model EntertainmentBanner */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'entertainment-banner-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'en_id'); ?>
		<?php echo $form->textField($model,'en_id'); ?>
		<?php echo $form->error($model,'en_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'enb_banner'); ?>
		<?php echo $form->textArea($model,'enb_banner',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'enb_banner'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->