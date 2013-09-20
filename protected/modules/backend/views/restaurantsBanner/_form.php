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
		<?php echo $form->labelEx($model,'r_id'); ?>
        <?php $list = CHtml::listData(Restaurants::model()->findAll(), 'r_id', 'r_name');
        echo $form->dropDownList($model,'r_id',$list); ?>
        <?php echo $form->error($model,'r_id'); ?>
	</div>

    <div class="row">
        <?php /*echo $form->labelEx($model,'image_path');*/ ?>
        <div id="imageHolder">
            <?php
            // If image path not / - show image
            if ($model->rb_banner)
            {
                echo '<img src="'.$model->rb_banner.'" width="217"></img>';
            }
            ?>
        </div>
        <?php echo $form->hiddenField($model,'rb_banner'); ?>
        <?php echo $form->error($model,'rb_banner'); ?>
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
                $("#RestaurantsBanner_rb_banner").val(uploadedFileRand+localName);
            }
        </script>
        <?php $this->widget('MUploadify',array(
            'name'=>'new_image',
            'script'=>array('/backend/files/uploadify/width/200/height/140','prependName'=>$prependName),
            'fileExt'=>'*.jpg;*.jpeg;*.gif;*.png;',
            'uploadButton'=>null,
            'buttonText'=>'Upload',
            'auto'=>true,
            'onComplete'=> "js:function(file, data, response) {uploadedFileShow(response.name);}",
        )); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'rb_published'); ?>
        <?php echo CHtml::dropDownList('RestaurantsBanner[rb_published]', $model->rb_published ,array(0=>"Нет",1=>"Да")); ?>
        <?php echo $form->error($model,'rb_published'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->