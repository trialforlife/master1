<?php
// For image uploader
$prependName = 'photos/logos/' . uniqid();

		$attribute='content';
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'entrpopup-_entrpopup-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<!-- <div class="row"> -->
		<?php echo $form->hiddenField($model,'item_id'); 
		if ($page_id > 0)
		{
			echo $form->hiddenField($model,'item_id',array('value'=>$page_id)); 
		}
		else
		{
			echo $form->hiddenField($model,'item_id'); 
		}
		?>
	<!-- </div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'title_ru'); ?>
		<?php echo $form->textField($model,'title_ru'); ?>
		<?php echo $form->error($model,'title_ru'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title_ua'); ?>
		<?php echo $form->textField($model,'title_ua'); ?>
		<?php echo $form->error($model,'title_ua'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'body_ru'); ?>
		<?php /*echo $form->textField($model,'body_ru');*/ ?>
		<?php
		$this->widget('ext.redactor.ERedactorWidget',array(
		    'model'=>$model,
		    'attribute'=>'body_ru',
		    'options'=>array('buttons'=>array('formatting', '|', 'bold', 'italic', 'deleted', '|', 'fontcolor', 'backcolor', '|', 'unorderedlist', 'orderedlist', 'outdent', 'indent', '|', 'image', 'video', 'link', '|', 'html', ), 'fileUpload'=>Yii::app()->createUrl('/backend/files/fileUpload',array('attr'=>$attribute )), 'fileUploadErrorCallback'=>new CJavaScriptExpression('function(obj,json) { alert(json.error); }'), 'imageUpload'=>Yii::app()->createUrl('/backend/files/imageUpload',array('attr'=>$attribute )), 'imageGetJson'=>Yii::app()->createUrl('/backend/files/imageList',array('attr'=>$attribute )), 'imageUploadErrorCallback'=>new CJavaScriptExpression('function(obj,json) { alert(json.error); }'), ),
		)); ?>
		<?php echo $form->error($model,'body_ru'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'body_ua'); ?>
		<?php /*echo $form->textField($model,'body_ua');*/ ?>
		<?php
		$this->widget('ext.redactor.ERedactorWidget',array(
		    'model'=>$model,
		    'attribute'=>'body_ua',
		    'options'=>array('buttons'=>array('formatting', '|', 'bold', 'italic', 'deleted', '|', 'fontcolor', 'backcolor', '|', 'unorderedlist', 'orderedlist', 'outdent', 'indent', '|', 'image', 'video', 'link', '|', 'html', ), 'fileUpload'=>Yii::app()->createUrl('/backend/files/fileUpload',array('attr'=>$attribute )), 'fileUploadErrorCallback'=>new CJavaScriptExpression('function(obj,json) { alert(json.error); }'), 'imageUpload'=>Yii::app()->createUrl('/backend/files/imageUpload',array('attr'=>$attribute )), 'imageGetJson'=>Yii::app()->createUrl('/backend/files/imageList',array('attr'=>$attribute )), 'imageUploadErrorCallback'=>new CJavaScriptExpression('function(obj,json) { alert(json.error); }'), ),
		)); ?>
		<?php echo $form->error($model,'body_ua'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->