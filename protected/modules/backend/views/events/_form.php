<?php
/* @var $this EventsController */
/* @var $model Events */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'events-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ev_name'); ?>
		<?php echo $form->textField($model,'ev_name',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'ev_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ev_time'); ?>
		<?php echo $form->textField($model,'ev_time',array('size'=>60,'maxlength'=>10000)); ?>
		<?php echo $form->error($model,'ev_time'); ?>
	</div>

    <div class="row">
        <?php /*echo $form->labelEx($model,'image_path');*/ ?>
        <div id="imageHolder">
            <?php
            // If image path not / - show image
            if ($model->ev_image)
            {
                echo '<img src="'.$model->ev_image.'" width="217"></img>';
            }
            ?>
        </div>
        <?php echo $form->hiddenField($model,'ev_image'); ?>
        <?php echo $form->error($model,'ev_image'); ?>
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
                $("#Events_ev_image").val(uploadedFileRand+localName);
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
		<?php echo $form->labelEx($model,'ev_content'); ?>
		<?php echo $form->textArea($model,'ev_content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'ev_content'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'ev_published'); ?>
        <?php echo CHtml::dropDownList('Events[ev_published]', $model->ev_published ,array(0=>"Нет",1=>"Да")); ?>
        <?php echo $form->error($model,'ev_published'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->