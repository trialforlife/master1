<?php
/* @var $this TheatreController */
/* @var $model Theatre */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'t_id'); ?>
		<?php echo $form->textField($model,'t_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'t_name'); ?>
		<?php echo $form->textField($model,'t_name',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'t_image'); ?>
		<?php echo $form->textField($model,'t_image',array('size'=>60,'maxlength'=>10000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'t_published'); ?>
		<?php echo $form->textField($model,'t_published'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->