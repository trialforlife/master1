<?php
// For image uploader
$prependName = 'photos/logos/' . uniqid();
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'banner-_banner-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<!-- <div class="row"> -->
		<?php echo $form->hiddenField($model,'city_id'); 
		if ($city_id > 0)
		{
			echo $form->hiddenField($model,'city_id',array('value'=>$city_id)); 
		}
		else
		{
			echo $form->hiddenField($model,'city_id'); 
		}
		?>
	<!-- </div> -->

	<div class="row">
		<div id="imageHolder_banner_back">
			<?php if ($model->banner_back) 
			{ echo '<img src="'.$model->banner_back.'"></img>'; } ?>
		</div>
		<?php echo $form->hiddenField($model,'banner_back'); ?>
		<?php echo $form->error($model,'banner_back'); ?>
		<?php $this->widget('MUploadify',array(
		  'name'=>'new_image', 'script'=>array('/backend/files/uploadify','prependName'=>$prependName), 'fileExt'=>'*.jpg;*.jpeg;*.gif;*.png;', 'uploadButton'=>null, 'buttonText'=>'Back image', 'auto'=>true,
		  'onComplete'=> "js:function(file, data, response) {uploadedFileShow(response.name, '#imageHolder_banner_back', '#Banner_banner_back');}",
		)); ?>
	</div>

	<div class="row">
		<div id="imageHolder_banner_middle">
			<?php if ($model->banner_middle) 
			{ echo '<img src="'.$model->banner_middle.'"></img>'; } ?>
		</div>
		<?php echo $form->hiddenField($model,'banner_middle'); ?>
		<?php echo $form->error($model,'banner_middle'); ?>
		<?php $this->widget('MUploadify',array(
		  'name'=>'new_image_2', 'script'=>array('/backend/files/uploadify','prependName'=>$prependName), 'fileExt'=>'*.jpg;*.jpeg;*.gif;*.png;', 'uploadButton'=>null, 'buttonText'=>'Middle image', 'auto'=>true,
		  'onComplete'=> "js:function(file, data, response) {uploadedFileShow(response.name, '#imageHolder_banner_middle', '#Banner_banner_middle');}",
		)); ?>
	</div>

	<div class="row">
		<div id="imageHolder_banner_front">
			<?php if ($model->banner_front) 
			{ echo '<img src="'.$model->banner_front.'"></img>'; } ?>
		</div>
		<?php echo $form->hiddenField($model,'banner_front'); ?>
		<?php echo $form->error($model,'banner_front'); ?>
		<?php $this->widget('MUploadify',array(
		  'name'=>'new_image_3', 'script'=>array('/backend/files/uploadify','prependName'=>$prependName), 'fileExt'=>'*.jpg;*.jpeg;*.gif;*.png;', 'uploadButton'=>null, 'buttonText'=>'Front image', 'auto'=>true,
		  'onComplete'=> "js:function(file, data, response) {uploadedFileShow(response.name, '#imageHolder_banner_front', '#Banner_banner_front');}",
		)); ?>
	</div>

		<script type="text/javascript">
			var uploadedFileRand = "/<?php echo $prependName;?>";
			var uploadedFileShow = function(localName, idImage, idField)
			{
			    $(idImage).empty().append( //'#imageHolder'
			        $("<img/>", { src:uploadedFileRand+localName }
			    ));
			    $(idField).val(uploadedFileRand+localName);//"#Restaurant_image_path"
			}
		</script>

	<div class="row">
		<?php echo $form->labelEx($model,'banner_title'); ?>
		<?php echo $form->textField($model,'banner_title'); ?>
		<?php echo $form->error($model,'banner_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'banner_href'); ?>
		<?php echo $form->textField($model,'banner_href'); ?>
		<?php echo $form->error($model,'banner_href'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->