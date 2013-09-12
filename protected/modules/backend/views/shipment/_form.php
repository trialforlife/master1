<?php
/* @var $this ShipmentController */
/* @var $model Shipment */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'shipment-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'s_name'); ?>
		<?php echo $form->textField($model,'s_name',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'s_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'s_content'); ?>
		<?php echo $form->textArea($model,'s_content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'s_content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'s_phone'); ?>
		<?php echo $form->textField($model,'s_phone',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'s_phone'); ?>
	</div>

    <div class="row">
        <?php /*echo $form->labelEx($model,'image_path');*/ ?>
        <div id="imageHolder">
            <?php
            // If image path not / - show image
            if ($model->s_image)
            {
                echo '<img src="'.$model->s_image.'" width="217"></img>';
            }
            ?>
        </div>
        <?php echo $form->hiddenField($model,'s_image'); ?>
        <?php echo $form->error($model,'s_image'); ?>
        <script type="text/javascript">
            var uploadedFileRand = "/images/<?php echo $prependName;?>";
            var uploadedFileShow = function(localName)
            {

                $('#imageHolder').empty().append(
                    $("<img/>", {
                            src:uploadedFileRand+localName,
                            width:217
                            //height:150
                        }
                    ));
                $("#Shipment_s_image").val(uploadedFileRand+localName);
            }
        </script>
        <?php $this->widget('MUploadify',array(
            'name'=>'new_image',
            'script'=>array('/backend/files/uploadify','prependName'=>$prependName),
            'fileExt'=>'*.jpg;*.jpeg;*.gif;*.png;',
            'uploadButton'=>null,
            'buttonText'=>'Upload',
            'auto'=>true,
            'onComplete'=> "js:function(file, data, response) {uploadedFileShow(response.name);}",
        )); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'s_type'); ?>
		<?php echo $form->textField($model,'s_type',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'s_type'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'s_published'); ?>
        <?php echo CHtml::dropDownList('Shipment[s_published]', $model->s_published ,array(0=>"Нет",1=>"Да")); ?>
        <?php echo $form->error($model,'s_published'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'s_site'); ?>
		<?php echo $form->textArea($model,'s_site',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'s_site'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'s_adress'); ?>
		<?php echo $form->textArea($model,'s_adress',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'s_adress'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'s_special'); ?>
		<?php echo $form->textArea($model,'s_special',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'s_special'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->