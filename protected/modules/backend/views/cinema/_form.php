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
		<?php echo $form->labelEx($model,'c_name'); ?>
		<?php echo $form->textField($model,'c_name',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'c_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_adress'); ?>
		<?php echo $form->textArea($model,'c_adress',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'c_adress'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_published'); ?>
		<?php echo CHtml::dropDownList('Cinema[c_published]', $model->c_published ,array(0=>"Нет",1=>"Да")); ?>
		<?php echo $form->error($model,'c_published'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'c_phone'); ?>
        <?php echo $form->textField($model,'c_phone'); ?>
        <?php echo $form->error($model,'c_phone'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'c_site'); ?>
        <?php echo $form->textField($model,'c_site'); ?>
        <?php echo $form->error($model,'c_site'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->