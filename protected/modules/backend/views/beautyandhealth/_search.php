<?php
/* @var $this BeautyandhealthController */
/* @var $model Beautyandhealth */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'bh_id'); ?>
		<?php echo $form->textField($model,'bh_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bh_name'); ?>
		<?php echo $form->textArea($model,'bh_name',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bh_image'); ?>
		<?php echo $form->textArea($model,'bh_image',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bh_published'); ?>
		<?php echo $form->textField($model,'bh_published'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bh_adress'); ?>
		<?php echo $form->textArea($model,'bh_adress',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bh_phone'); ?>
		<?php echo $form->textField($model,'bh_phone',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bh_banner'); ?>
		<?php echo $form->textArea($model,'bh_banner',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->