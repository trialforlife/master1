<?php
/* @var $this ShipmentController */
/* @var $model Shipment */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'s_id'); ?>
		<?php echo $form->textField($model,'s_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'s_name'); ?>
		<?php echo $form->textField($model,'s_name',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'s_content'); ?>
		<?php echo $form->textArea($model,'s_content',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'s_phone'); ?>
		<?php echo $form->textField($model,'s_phone',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'s_image'); ?>
		<?php echo $form->textArea($model,'s_image',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'s_type'); ?>
		<?php echo $form->textField($model,'s_type',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'s_published'); ?>
		<?php echo $form->textField($model,'s_published'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'s_site'); ?>
		<?php echo $form->textArea($model,'s_site',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'s_banner'); ?>
		<?php echo $form->textArea($model,'s_banner',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'s_adress'); ?>
		<?php echo $form->textArea($model,'s_adress',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'s_special'); ?>
		<?php echo $form->textArea($model,'s_special',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->