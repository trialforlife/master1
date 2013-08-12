<?php
/* @var $this EntertainmentController */
/* @var $model Entertainment */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'entertainment-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'en_name'); ?>
		<?php echo $form->textField($model,'en_name',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'en_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'en_content'); ?>
		<?php echo $form->textArea($model,'en_content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'en_content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'en_image'); ?>
		<?php echo $form->textArea($model,'en_image',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'en_image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'en_type'); ?>
		<?php echo $form->textField($model,'en_type',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'en_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'en_time'); ?>
		<?php echo $form->textField($model,'en_time',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'en_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'en_price'); ?>
		<?php echo $form->textField($model,'en_price',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'en_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'en_content_add'); ?>
		<?php echo $form->textField($model,'en_content_add',array('size'=>60,'maxlength'=>10000)); ?>
		<?php echo $form->error($model,'en_content_add'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'en_published'); ?>
		<?php echo $form->textField($model,'en_published'); ?>
		<?php echo $form->error($model,'en_published'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->