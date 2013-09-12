<?php
/* @var $this CinemaBannerController */
/* @var $model CinemaBanner */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cinema-banner-form',
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
        <?php /*echo $form->labelEx($model,'image_path');*/ ?>
        <div id="imageHolder">
            <?php
            // If image path not / - show image
            if ($model->cb_banner)
            {
                echo '<img src="'.$model->cb_banner.'" width="217"></img>';
            }
            ?>
        </div>
        <?php echo $form->hiddenField($model,'cb_banner'); ?>
        <?php echo $form->error($model,'cb_banner'); ?>
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
                $("#CinemaBanner_cb_banner").val(uploadedFileRand+localName);
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
        <?php echo $form->labelEx($model,'cb_published'); ?>
        <?php echo CHtml::dropDownList('CinemaBanner[cb_published]', $model->cb_published ,array(0=>"Нет",1=>"Да")); ?>
        <?php echo $form->error($model,'cb_published'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->