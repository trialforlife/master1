Welcome!

<?php 
$prependName = 'photos/logos/' . uniqid();

$this->widget('MUploadify',array(
  'name'=>'new_image',
  'script'=>array('/backend/files/uploadify','prependName'=>$prependName),
  'fileExt'=>'*.jpg;*.jpeg;*.gif;*.png;',
  'uploadButton'=>null,
  'auto'=>true,
  'onComplete'=> "js:function(file, data, response) {uploadedFileShow(response.name);}",
));
 ?>

<div id="imageHolder"></div>
<input type="hidden" id="filePath" name='filePath' value="">

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
    $("#filePath").val(uploadedFileRand+localName);
    console.log( $("#filePath") );
}
</script>

<?php
$attribute='content';
$this->widget('ext.redactor.ERedactorWidget',array(
    'model'=>$model,
    'attribute'=>'body',
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
)); ?>