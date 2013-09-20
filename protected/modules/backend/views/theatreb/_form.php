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
		<?php echo $form->labelEx($model,'t_id'); ?>
        <?php $list = CHtml::listData(Theatre::model()->findAll(), 't_id', 't_name');
        echo $form->dropDownList($model,'t_id',$list); ?>
        <?php echo $form->error($model,'t_id'); ?>
	</div>

    <div class="row">
        <?php /*echo $form->labelEx($model,'image_path');*/ ?>
        <div id="imageHolder">
            <?php
            // If image path not / - show image
            if ($model->tb_banner)
            {
                echo '<img src="'.$model->tb_banner.'" width="217"></img>';
            }
            ?>
        </div>
        <?php echo $form->hiddenField($model,'tb_banner'); ?>
        <?php echo $form->error($model,'tb_banner'); ?>
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
                $("#TheatreBanner_tb_banner").val(uploadedFileRand+localName);
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
        <?php echo $form->labelEx($model,'tb_published'); ?>
        <?php echo CHtml::dropDownList('TheatreBanner[tb_published]', $model->tb_published ,array(0=>"Нет",1=>"Да")); ?>
        <?php echo $form->error($model,'tb_published'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->