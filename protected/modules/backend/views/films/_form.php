<?php
/* @var $this FilmsController */
/* @var $model Films */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'films-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'c_id'); ?>
        <?php $list = CHtml::listData(Cinema::model()->findAll(), 'c_id', 'c_name');
        echo $form->dropDownList($model,'c_id',$list); ?>
        <?php echo $form->error($model,'c_id'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'f_name'); ?>
		<?php echo $form->textField($model,'f_name',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'f_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'f_time'); ?>
		<?php echo $form->textField($model,'f_time',array('size'=>60,'maxlength'=>10000)); ?>
		<?php echo $form->error($model,'f_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'f_price'); ?>
		<?php echo $form->textField($model,'f_price',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'f_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'f_content'); ?>
		<?php echo $form->textArea($model,'f_content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'f_content'); ?>
	</div>

    <div class="row">
        <?php /*echo $form->labelEx($model,'image_path');*/ ?>
        <div id="imageHolder">
            <?php
            // If image path not / - show image
            if ($model->f_image)
            {
                echo '<img src="'.$model->f_image.'" width="217"></img>';
            }
            ?>
        </div>
        <?php echo $form->hiddenField($model,'f_image'); ?>
        <?php echo $form->error($model,'f_image'); ?>
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
                $("#Films_f_image").val(uploadedFileRand+localName);
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
        <?php echo $form->labelEx($model,'f_published'); ?>
        <?php echo CHtml::dropDownList('Films[f_published]', $model->f_published ,array(0=>"Нет",1=>"Да")); ?>
        <?php echo $form->error($model,'f_published'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->