<?php
/* @var $this PlayController */
/* @var $model Play */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'play-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'t_id'); ?>
        <?php $list = CHtml::listData(Theatre::model()->findAll(), 't_id', 't_name');
        echo $form->dropDownList($model,'t_id',$list); ?>
        <?php echo $form->error($model,'t_id'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_name'); ?>
		<?php echo $form->textField($model,'p_name',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'p_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_time'); ?>
		<?php echo $form->textArea($model,'p_time',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'p_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_content'); ?>
		<?php echo $form->textArea($model,'p_content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'p_content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_price'); ?>
		<?php echo $form->textField($model,'p_price',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'p_price'); ?>
	</div>

    <div class="row">
        <?php /*echo $form->labelEx($model,'image_path');*/ ?>
        <div id="imageHolder">
            <?php
            // If image path not / - show image
            if ($model->p_image)
            {
                echo '<img src="'.$model->p_image.'" width="217"></img>';
            }
            ?>
        </div>
        <?php echo $form->hiddenField($model,'p_image'); ?>
        <?php echo $form->error($model,'p_image'); ?>
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
                $("#Play_p_image").val(uploadedFileRand+localName);
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
        <?php echo $form->labelEx($model,'p_published'); ?>
        <?php echo CHtml::dropDownList('Play[p_published]', $model->p_published ,array(0=>"Нет",1=>"Да")); ?>
        <?php echo $form->error($model,'p_published'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->