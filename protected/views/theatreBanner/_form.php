<?php
/* @var $this TheatreBannerController */
/* @var $model TheatreBanner */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'theatre-banner-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'t_id'); ?>
		<?php echo $form->textField($model,'t_id'); ?>
		<?php echo $form->error($model,'t_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tb_banner'); ?>
		<?php echo $form->textField($model,'tb_banner',array('size'=>60,'maxlength'=>10000)); ?>
		<?php echo $form->error($model,'tb_banner'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tb_published'); ?>
		<?php echo $form->textField($model,'tb_published'); ?>
		<?php echo $form->error($model,'tb_published'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->