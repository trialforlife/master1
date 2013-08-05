<?php
/* @var $this RestaurantsBannerController */
/* @var $model RestaurantsBanner */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'rb_id'); ?>
		<?php echo $form->textField($model,'rb_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'r_id'); ?>
		<?php echo $form->textField($model,'r_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rb_banner'); ?>
		<?php echo $form->textArea($model,'rb_banner',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rb_published'); ?>
		<?php echo $form->textField($model,'rb_published'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->