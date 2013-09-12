<?php
/* @var $this CompanyController */
/* @var $model Company */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'company-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'com_quote'); ?>
		<?php echo $form->textArea($model,'com_quote',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'com_quote'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'com_logo'); ?>
		<?php echo $form->textArea($model,'com_logo',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'com_logo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'com_description'); ?>
		<?php echo $form->textArea($model,'com_description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'com_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'com_phone'); ?>
		<?php echo $form->textField($model,'com_phone',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'com_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'com_site'); ?>
		<?php echo $form->textArea($model,'com_site',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'com_site'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'com_published'); ?>
		<?php echo $form->textField($model,'com_published'); ?>
		<?php echo $form->error($model,'com_published'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->