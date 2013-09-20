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
		<?php echo $form->labelEx($model,'r_name'); ?>
		<?php echo $form->textField($model,'r_name',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'r_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'r_adress'); ?>
		<?php echo $form->textArea($model,'r_adress',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'r_adress'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'r_published'); ?>
		<?php echo CHtml::dropDownList('Restaurants[r_published]', $model->r_published ,array(0=>"Нет",1=>"Да")); ?>
		<?php echo $form->error($model,'r_published'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'r_phone'); ?>
        <?php echo $form->textField($model,'r_phone'); ?>
        <?php echo $form->error($model,'r_phone'); ?>
    </div>

    <div class="row">
        <?php /*echo $form->labelEx($model,'image_path');*/ ?>
        <div id="imageHolder">
            <?php
            // If image path not / - show image
            if ($model->r_image)
            {
                echo '<img src="'.$model->r_image.'" width="217"></img>';
            }
            ?>
        </div>
        <?php echo $form->hiddenField($model,'r_image'); ?>
        <?php echo $form->error($model,'r_image'); ?>
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
                $("#Restaurants_r_image").val(uploadedFileRand+localName);
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
        <?php echo $form->labelEx($model,'r_site'); ?>
        <?php echo $form->textField($model,'r_site'); ?>
        <?php echo $form->error($model,'r_site'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->