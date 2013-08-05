<?php
/* @var $this EntertainmentController */
/* @var $model Entertainment */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'en_id'); ?>
		<?php echo $form->textField($model,'en_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'en_name'); ?>
		<?php echo $form->textField($model,'en_name',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'en_content'); ?>
		<?php echo $form->textArea($model,'en_content',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'en_image'); ?>
		<?php echo $form->textArea($model,'en_image',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'en_type'); ?>
		<?php echo $form->textField($model,'en_type',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'en_time'); ?>
		<?php echo $form->textField($model,'en_time',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'en_price'); ?>
		<?php echo $form->textField($model,'en_price',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'en_content_add'); ?>
		<?php echo $form->textField($model,'en_content_add',array('size'=>60,'maxlength'=>10000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'en_published'); ?>
		<?php echo $form->textField($model,'en_published'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->