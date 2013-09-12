<?php
// For image uploader
$prependName = 'photos/logos/' . uniqid();
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'event-_event-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<!-- <div class="row"> -->
		<?php echo $form->hiddenField($model,'type_id'); 
		if ($cat_id > 0)
		{
			echo $form->hiddenField($model,'type_id',array('value'=>$cat_id)); 
		}
		else
		{
			echo $form->hiddenField($model,'type_id'); 
		}
		?>
	<!-- </div> -->
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
		<?php /*echo $form->labelEx($model,'image_path');*/ ?>
		<div id="imageHolder">
			<?php 
			// If image path not / - show image
			if ($model->image_path)
			{
				echo '<img src="'.$model->image_path.'" width="217"></img>';
			}
			?>
		</div>
		<?php echo $form->hiddenField($model,'image_path'); ?>
		<?php echo $form->error($model,'image_path'); ?>
		<script type="text/javascript">
			var uploadedFileRand = "/<?php echo $prependName;?>";
			var uploadedFileShow = function(localName)
			{
			    
			    $('#imageHolder').empty().append(
			        $("<img/>", {
			            src:uploadedFileRand+localName, 
			            width:217
			            //height:150
			        }
			    ));
			    $("#Event_image_path").val(uploadedFileRand+localName);
			}
		</script>
		<?php $this->widget('MUploadify',array(
		  'name'=>'new_image',
		  'script'=>array('/backend/files/uploadify','prependName'=>$prependName),
		  'fileExt'=>'*.jpg;*.jpeg;*.gif;*.png;',
		  'uploadButton'=>null,
		  'buttonText'=>'Image',
		  'auto'=>true,
		  'onComplete'=> "js:function(file, data, response) {uploadedFileShow(response.name);}",
		)); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'event_date'); ?>
		<?php /*echo $form->textField($model,'event_date');*/ ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
		    'model' => $model,
		    'attribute' => 'event_date',
		    //'name'=>'publishDate',
		    // additional javascript options for the date picker plugin
		    'options'=>array(
		        'showAnim'=>'fold',
		        'dateFormat'=>'yy-mm-dd',
		    ),
		    'htmlOptions'=>array(
		        'style'=>'height:20px;'
		    ),
		)); ?>
		<?php echo $form->error($model,'event_date'); ?>
	</div>

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
		<?php echo $form->labelEx($model,'descr_ru'); ?>
		<?php /*echo $form->textField($model,'descr_ru');*/ ?>
		<?php
		$attribute='content';
		$this->widget('ext.redactor.ERedactorWidget',array(
		    'model'=>$model,
		    'attribute'=>'descr_ru',
		    'options'=>array('buttons'=>array('formatting', '|', 'bold', 'italic', 'deleted', '|', 'fontcolor', 'backcolor', '|', 'unorderedlist', 'orderedlist', 'outdent', 'indent', '|', 'image', 'video', 'link', '|', 'html', ), 'fileUpload'=>Yii::app()->createUrl('/backend/files/fileUpload',array('attr'=>$attribute )), 'fileUploadErrorCallback'=>new CJavaScriptExpression('function(obj,json) { alert(json.error); }'), 'imageUpload'=>Yii::app()->createUrl('/backend/files/imageUpload',array('attr'=>$attribute )), 'imageGetJson'=>Yii::app()->createUrl('/backend/files/imageList',array('attr'=>$attribute )), 'imageUploadErrorCallback'=>new CJavaScriptExpression('function(obj,json) { alert(json.error); }'), ),
		)); ?>
		<?php echo $form->error($model,'descr_ru'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descr_ua'); ?>
		<?php /*echo $form->textField($model,'descr_ua');*/ ?>
		<?php
		$this->widget('ext.redactor.ERedactorWidget',array(
		    'model'=>$model,
		    'attribute'=>'descr_ua',
		    'options'=>array('buttons'=>array('formatting', '|', 'bold', 'italic', 'deleted', '|', 'fontcolor', 'backcolor', '|', 'unorderedlist', 'orderedlist', 'outdent', 'indent', '|', 'image', 'video', 'link', '|', 'html', ), 'fileUpload'=>Yii::app()->createUrl('/backend/files/fileUpload',array('attr'=>$attribute )), 'fileUploadErrorCallback'=>new CJavaScriptExpression('function(obj,json) { alert(json.error); }'), 'imageUpload'=>Yii::app()->createUrl('/backend/files/imageUpload',array('attr'=>$attribute )), 'imageGetJson'=>Yii::app()->createUrl('/backend/files/imageList',array('attr'=>$attribute )), 'imageUploadErrorCallback'=>new CJavaScriptExpression('function(obj,json) { alert(json.error); }'), ),
		)); ?>
		<?php echo $form->error($model,'descr_ua'); ?>
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

	<div class="row">
		<?php /*echo $form->labelEx($model,'more_json');*/ ?>
		<?php $default = array(); if (!$model->more_json) $default = array('value'=>'{}'); ?>
		<?php echo $form->hiddenField($model,'more_json',$default); ?>
		<?php echo $form->error($model,'more_json'); ?>
	</div>

	<div class="row">
		<?php 
			$gals = Gallery::model()->findAll(array('order' => 'gal_id DESC'));
			$list = CHtml::listData($gals, 'gal_id', 'gal_name');
			$list['0'] = 'Выберите галлерею';
			$json = json_decode($model->more_json);
            if($json) $selected = (property_exists($json, 'gallery')) ? $json->gallery : 0;
            else $selected = 0;
			echo CHtml::dropDownList('gallery', $selected, $list);
		?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->