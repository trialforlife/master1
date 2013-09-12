<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'page-edit',
    //'enableAjaxValidation'=>true,
    //'enableClientValidation'=>true,
    //'focus'=>array($model,'page_html'),
)); ?>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->hiddenField($model,'page_id'); ?>
<?php echo $form->hiddenField($model,'page_name'); ?>
<?php echo $form->hiddenField($model,'city_id'); ?>
<?php echo $form->hiddenField($model,'lang_id'); ?>
<?php echo $form->hiddenField($model,'page_json'); ?>

<div class="row">
    <?php /*echo $form->labelEx($model,'page_html'); ?>
    <?php echo $form->textField($model,'page_html'); ?>
    <?php echo $form->error($model,'page_html');*/ ?>

<?php

if ($model->page_name == 'road')
{
	// We need address, nothin' more
	echo $form->textField($model,'page_html');
}
else
{
	$attribute='content';
	$this->widget('ext.redactor.ERedactorWidget',array(
	    'model'=>$model,
	    'attribute'=>'page_html',
	    'options'=>array(
	        //'lang'=>'ru',
                        'buttons'=>array(
                            'formatting', '|', 'bold', 'italic', 'deleted', '|',
                            'fontcolor', 'backcolor', '|',
                            'unorderedlist', 'orderedlist', 'outdent', 'indent', '|',
                            'image', 'video', 'link', '|', 'html',
                        ),
	        'fileUpload'=>Yii::app()->createUrl('/backend/files/fileUpload',array(
	            'attr'=>$attribute
	        )),
	        'fileUploadErrorCallback'=>new CJavaScriptExpression(
	            'function(obj,json) { alert(json.error); }'
	        ),
	        'imageUpload'=>Yii::app()->createUrl('/backend/files/imageUpload',array(
	            'attr'=>$attribute
	        )),
	        'imageGetJson'=>Yii::app()->createUrl('/backend/files/imageList',array(
	            'attr'=>$attribute
	        )),
	        'imageUploadErrorCallback'=>new CJavaScriptExpression(
	            'function(obj,json) { alert(json.error); }'
	        ),
	    ),
	)); 
}
?>
</div>

<div class="row buttons">
	<?php echo CHtml::submitButton('Сохранить'); ?>
</div>

<?php $this->endWidget(); ?>