<?php
/* @var $this NightlifeController */
/* @var $model Nightlife */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'nightlife-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'n_name'); ?>
		<?php echo $form->textField($model,'n_name',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'n_name'); ?>
	</div>

    <div class="row">
        <?php /*echo $form->labelEx($model,'image_path');*/ ?>
        <div id="imageHolder">
            <?php
            // If image path not / - show image
            if ($model->n_image)
            {
                echo '<img src="'.$model->n_image.'" width="217"></img>';
            }
            ?>
        </div>
        <?php echo $form->hiddenField($model,'n_image'); ?>
        <?php echo $form->error($model,'n_image'); ?>
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
                $("#Nightlife_n_image").val(uploadedFileRand+localName);
            }
        </script>
        <?php $this->widget('MUploadify',array(
            'name'=>'new_image',
            'script'=>array('/backend/files/uploadify/width/200/height/140'),
            'fileExt'=>'*.jpg;*.jpeg;*.gif;*.png;',
            'uploadButton'=>null,
            'buttonText'=>'Upload',
            'auto'=>true,
            'onComplete'=> "js:function(file, data, response) {uploadedFileShow(response.name);}",
        )); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'n_adress'); ?>
		<?php echo $form->textArea($model,'n_adress',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'n_adress'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'n_time'); ?>
		<?php echo $form->textArea($model,'n_time',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'n_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'n_date'); ?>
		<?php echo $form->textField($model,'n_date'); ?>
		<?php echo $form->error($model,'n_date'); ?>
	</div>

    <div class="row">
        <?php /*echo $form->labelEx($model,'image_path');*/ ?>
        <div id="imageHolderBanner">
            <?php
            // If image path not / - show image
            if ($model->n_banner)
            {
                echo '<img src="'.$model->n_banner.'" width="217"></img>';
            }
            ?>
        </div>
        <?php echo $form->hiddenField($model,'n_banner'); ?>
        <?php echo $form->error($model,'n_banner'); ?>
        <script type="text/javascript">
            var uploadedFileRand1 = "/images/";
            var uploadedFileShow1 = function(localName)
            {

                $('#imageHolderBanner').empty().append(
                    $("<img/>", {
                            src:uploadedFileRand1+localName,
                            width:217
                            //height:150
                        }
                    ));
                $("#Nightlife_n_banner").val(uploadedFileRand1+localName);
            }
        </script>
        <?php $this->widget('MUploadify',array(
            'name'=>'new_image_2',
            'script'=>array('/backend/files/uploadify/width/200/height/140'),
            'fileExt'=>'*.jpg;*.jpeg;*.gif;*.png;',
            'uploadButton'=>null,
            'buttonText'=>'Upload',
            'auto'=>true,
            'onComplete'=> "js:function(file, data, response) {uploadedFileShow1(response.name);}",
        )); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'n_site'); ?>
		<?php echo $form->textArea($model,'n_site',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'n_site'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'n_phone'); ?>
		<?php echo $form->textField($model,'n_phone',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'n_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'n_content'); ?>
		<?php echo $form->textArea($model,'n_content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'n_content'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'n_published'); ?>
        <?php echo CHtml::dropDownList('Nightlife[n_published]', $model->n_published ,array(0=>"Нет",1=>"Да")); ?>
        <?php echo $form->error($model,'n_published'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->