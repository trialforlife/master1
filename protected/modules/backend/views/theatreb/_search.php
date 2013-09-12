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
		<?php echo $form->label($model,'tb_id'); ?>
		<?php echo $form->textField($model,'tb_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'t_id'); ?>
		<?php echo $form->textField($model,'t_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tb_banner'); ?>
		<?php echo $form->textField($model,'tb_banner',array('size'=>60,'maxlength'=>10000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tb_published'); ?>
		<?php echo $form->textField($model,'tb_published'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->