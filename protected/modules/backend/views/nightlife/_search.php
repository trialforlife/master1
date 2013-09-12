<?php
/* @var $this NightlifeController */
/* @var $model Nightlife */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'n_id'); ?>
		<?php echo $form->textField($model,'n_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'n_name'); ?>
		<?php echo $form->textField($model,'n_name',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'n_image'); ?>
		<?php echo $form->textArea($model,'n_image',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'n_adress'); ?>
		<?php echo $form->textArea($model,'n_adress',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'n_time'); ?>
		<?php echo $form->textArea($model,'n_time',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'n_date'); ?>
		<?php echo $form->textField($model,'n_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'n_banner'); ?>
		<?php echo $form->textArea($model,'n_banner',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'n_site'); ?>
		<?php echo $form->textArea($model,'n_site',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'n_phone'); ?>
		<?php echo $form->textField($model,'n_phone',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'n_content'); ?>
		<?php echo $form->textArea($model,'n_content',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'n_published'); ?>
		<?php echo $form->textField($model,'n_published'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->