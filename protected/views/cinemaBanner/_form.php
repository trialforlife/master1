<?php
/* @var $this CinemaBannerController */
/* @var $model CinemaBanner */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cinema-banner-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'c_id'); ?>
		<?php echo $form->textField($model,'c_id'); ?>
		<?php echo $form->error($model,'c_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cb_banner'); ?>
		<?php echo $form->textField($model,'cb_banner',array('size'=>60,'maxlength'=>10000)); ?>
		<?php echo $form->error($model,'cb_banner'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cb_published'); ?>
		<?php echo $form->textField($model,'cb_published'); ?>
		<?php echo $form->error($model,'cb_published'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->