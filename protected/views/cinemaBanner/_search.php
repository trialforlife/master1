<?php
/* @var $this CinemaBannerController */
/* @var $model CinemaBanner */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'cb_id'); ?>
		<?php echo $form->textField($model,'cb_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c_id'); ?>
		<?php echo $form->textField($model,'c_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cb_banner'); ?>
		<?php echo $form->textField($model,'cb_banner',array('size'=>60,'maxlength'=>10000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cb_published'); ?>
		<?php echo $form->textField($model,'cb_published'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->