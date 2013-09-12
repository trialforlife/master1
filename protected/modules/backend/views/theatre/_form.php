<?php
/* @var $this CinemaController */
/* @var $model Cinema */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cinema-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля отмеченые <span class="required">*</span> обязательны.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'t_name'); ?>
		<?php echo $form->textField($model,'t_name',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'t_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'t_adress'); ?>
		<?php echo $form->textArea($model,'t_adress',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'t_adress'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'t_published'); ?>
		<?php echo CHtml::dropDownList('Theatre[t_published]', $model->t_published ,array(0=>"Нет",1=>"Да")); ?>
		<?php echo $form->error($model,'t_published'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'t_phone'); ?>
        <?php echo $form->textField($model,'t_phone'); ?>
        <?php echo $form->error($model,'t_phone'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'t_site'); ?>
        <?php echo $form->textField($model,'t_site'); ?>
        <?php echo $form->error($model,'t_site'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->