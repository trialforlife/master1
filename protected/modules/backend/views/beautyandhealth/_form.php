<?php
/* @var $this BeautyandhealthController */
/* @var $model Beautyandhealth */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'beautyandhealth-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'bh_name'); ?>
		<?php echo $form->textField($model,'bh_name',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'bh_name'); ?>
	</div>

    <div class="row">
        <?php /*echo $form->labelEx($model,'image_path');*/ ?>
        <div id="imageHolder">
            <?php
            // If image path not / - show image
            if ($model->bh_image)
            {
                echo '<img src="'.$model->bh_image.'" width="217"></img>';
            }
            ?>
        </div>
        <?php echo $form->hiddenField($model,'bh_image'); ?>
        <?php echo $form->error($model,'bh_image'); ?>
        <script type="text/javascript">
            var uploadedFileRand = "/images/";
            var uploadedFileShow = function(localName)
            {

                $('#imageHolder').empty().append(
                    $("<img/>", {
                            src:uploadedFileRand+localName,
                            width:217
                            //height:150
                        }
                    ));
                $("#Beautyandhealth_bh_image").val(uploadedFileRand+localName);
            }
        </script>
        <?php $this->widget('MUploadify',array(
            'name'=>'new_image',
            'script'=>array('/backend/files/uploadify'),
            'fileExt'=>'*.jpg;*.jpeg;*.gif;*.png;',
            'uploadButton'=>null,
            'buttonText'=>'Upload',
            'auto'=>true,
            'onComplete'=> "js:function(file, data, response) {uploadedFileShow(response.name);}",
        )); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'bh_published'); ?>
        <?php echo CHtml::dropDownList('Beautyandhealth[bh_published]', $model->bh_published ,array(0=>"Нет",1=>"Да")); ?>
        <?php echo $form->error($model,'bh_published'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'bh_adress'); ?>
		<?php echo $form->textArea($model,'bh_adress',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'bh_adress'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bh_phone'); ?>
		<?php echo $form->textField($model,'bh_phone',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'bh_phone'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->