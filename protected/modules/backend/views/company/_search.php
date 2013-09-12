<?php
/* @var $this CompanyController */
/* @var $model Company */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'com_id'); ?>
		<?php echo $form->textField($model,'com_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'com_quote'); ?>
		<?php echo $form->textArea($model,'com_quote',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'com_logo'); ?>
		<?php echo $form->textArea($model,'com_logo',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'com_description'); ?>
		<?php echo $form->textArea($model,'com_description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'com_phone'); ?>
		<?php echo $form->textField($model,'com_phone',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'com_site'); ?>
		<?php echo $form->textArea($model,'com_site',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'com_published'); ?>
		<?php echo $form->textField($model,'com_published'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->