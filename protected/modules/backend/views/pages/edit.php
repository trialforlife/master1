<?php 

$form = $this->beginWidget('CActiveForm', array(
    'id'=>'page-edit',
    'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
    //'focus'=>array($model,'page_html'),
)); 

$submitBtnOpts = array();

$m_json = json_decode($model->page_json);

?>

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
	if ($model->page_name == 'about')
	{
		$blocks = array('A', 'B', 'C', 'D', 'E', 'F', 'G');
	}
	else if ($model->page_name == 'actions' || $model->page_name == 'events')
	{
		$blocks = array('Left', 'Central');
	}
	else
	{
		$blocks = array('A', 'B', 'C', 'D', 'E');
	}
	echo 'Для удобства редактирования страница разделена на блоки. Блоки не могут быть пустыми. <br/>';
	$submitBtnOpts['onclick'] = 'formPrePost();';
	echo $form->hiddenField($model,'page_html');
	$attribute='content';

	foreach ($blocks as $block) {
		echo '<br/>';
		echo "<h2>Блок " .$block . '</h2>';
		$this->widget('ext.redactor.ERedactorWidget',array(
		    'name'=>'block_'.$block, 
		    'value'=>(is_object($m_json)&&property_exists($m_json, $block))?$m_json->$block:'Block '.$block,
		    //'model'=>$model, 'attribute'=>'page_html',
		    'options'=>array(
		        'buttons'=>array('formatting', '|', 'bold', 'italic', 'deleted', '|', 'fontcolor', 'backcolor', '|', 'unorderedlist', 'orderedlist', 'outdent', 'indent', '|', 'image', 'video', 'link', '|', 'html', ),
		        'fileUpload'=>Yii::app()->createUrl('/backend/files/fileUpload',array('attr'=>$attribute )),
		        'fileUploadErrorCallback'=>new CJavaScriptExpression('function(obj,json) { alert(json.error); }'),
		        'imageUpload'=>Yii::app()->createUrl('/backend/files/imageUpload',array('attr'=>$attribute )),
		        'imageGetJson'=>Yii::app()->createUrl('/backend/files/imageList',array('attr'=>$attribute )),
		        'imageUploadErrorCallback'=>new CJavaScriptExpression('function(obj,json) { alert(json.error); }'),
		    ),
		)); 
	}
}
?>
</div>
<script type="text/javascript" src="http://yandex.st/json2/2011-10-19/json2.js"></script>
<script type="text/javascript">
	/* generate page json if any */
	var formPrePost = function(){
		var page_json = {};
		<?php 
		foreach ($blocks as $block) {
			echo 'page_json["'.$block.'"] = $("#block_'.$block.'").val();';
		}
		?>
		var pjson = JSON.stringify(page_json);
		$("#Page_page_json").val(pjson);
		$("#Page_page_html").val("&nbsp");
		console.log(pjson);
	}
</script>
<div class="row buttons">
	<?php echo CHtml::submitButton('Сохранить', $submitBtnOpts); ?>
</div>

<?php $this->endWidget(); ?>