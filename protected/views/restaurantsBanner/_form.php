<?php
/* @var $this RestaurantsBannerController */
/* @var $model RestaurantsBanner */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'restaurants-banner-form',
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
		<?php echo $form->labelEx($model,'rb_banner'); ?>
		<?php echo $form->textArea($model,'rb_banner',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'rb_banner'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rb_published'); ?>
		<?php echo $form->textField($model,'rb_published'); ?>
		<?php echo $form->error($model,'rb_published'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->