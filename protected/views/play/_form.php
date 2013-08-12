<?php
/* @var $this PlayController */
/* @var $model Play */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'play-form',
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
		<?php echo $form->labelEx($model,'f_name'); ?>
		<?php echo $form->textField($model,'f_name',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'f_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'f_time'); ?>
		<?php echo $form->textField($model,'f_time',array('size'=>60,'maxlength'=>10000)); ?>
		<?php echo $form->error($model,'f_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'f_price'); ?>
		<?php echo $form->textField($model,'f_price',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'f_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'f_content'); ?>
		<?php echo $form->textArea($model,'f_content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'f_content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'f_image'); ?>
		<?php echo $form->textArea($model,'f_image',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'f_image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'f_published'); ?>
		<?php echo $form->textField($model,'f_published'); ?>
		<?php echo $form->error($model,'f_published'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->