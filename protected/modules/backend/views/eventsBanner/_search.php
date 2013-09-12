<?php
/* @var $this EventsBannerController */
/* @var $model EventsBanner */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'evb_id'); ?>
		<?php echo $form->textField($model,'evb_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ev_id'); ?>
		<?php echo $form->textField($model,'ev_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'evb_banner'); ?>
		<?php echo $form->textArea($model,'evb_banner',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'evb_published'); ?>
		<?php echo $form->textField($model,'evb_published'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->