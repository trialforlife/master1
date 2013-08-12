<?php
/* @var $this EntertainmentBannerController */
/* @var $model EntertainmentBanner */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'enb_id'); ?>
		<?php echo $form->textField($model,'enb_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'en_id'); ?>
		<?php echo $form->textField($model,'en_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'enb_banner'); ?>
		<?php echo $form->textArea($model,'enb_banner',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->