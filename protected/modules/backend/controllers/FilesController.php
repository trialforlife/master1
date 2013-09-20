<?php

class FilesController extends BController
{

    public function init()
    {
        // Uploadify shits
        if(isset($_POST['SESSION_ID']))
        {
            $session=Yii::app()->getSession();
            $session->close();
            $session->sessionID = $_POST['SESSION_ID'];
            $session->open();
        }
    }

    public function actionUploadify()
    {
        // Some more uploadify shit

        $img_field = '';
        if (isset($_POST['new_image'])) $img_field = 'new_image';
        if (isset($_POST['new_image_2'])) $img_field = 'new_image_2';
        if (isset($_POST['new_image_3'])) $img_field = 'new_image_3';
        if($img_field)
        {
            $localName = 'unknown.img';
            if (isset($_POST['Filename']))
            {
                // keep original file name
                $localName = $_POST['Filename'];
            }
            if (isset($_GET['prependName']))
            {
                // prepend file path and unique hash
                $localName = $_GET['prependName'] . $localName;
            }
            $localName=$_SERVER['DOCUMENT_ROOT'].'/images/'.$localName;
            // So, let's do it
            $newImage = EUploadedImage::getInstanceByName($img_field);

            $newImage->maxWidth=(int)$_GET['width'];
            $newImage->maxHeight=(int)$_GET['height'];

            var_dump($newImage);
            if(!$newImage->saveAs($localName))
            {
                //var_dump($newImage);die();
                throw new CHttpException(500);
            }
            echo 1;
            Yii::app()->end();
            //var_dump($_POST); echo "\r\n\r\n</br>\r\n\r\n"; var_dump($myPicture);
        }
    }

    public function actions()
    {
        return array(
            /*'fileUpload'=>array(
                'class'=>'ext.redactor.actions.FileUpload',
                'uploadPath'=>Yii::app()->params['uploadPath'],
                'uploadUrl'=>Yii::app()->params['uploadUrl'],
                'uploadCreate'=>false,
                'permissions'=>0664,
            ),*/
            'imageUpload'=>array(
                'class'=>'ext.redactor.actions.ImageUpload',
                'uploadPath'=>Yii::app()->params['uploadPath'],
                'uploadUrl'=>Yii::app()->params['uploadUrl'],
                'uploadCreate'=>true,
                'permissions'=>0777,
            ),
            'imageList'=>array(
                'class'=>'ext.redactor.actions.ImageList',
                'uploadPath'=>Yii::app()->params['uploadPath'],
                'uploadUrl'=>Yii::app()->params['uploadUrl'],
            ),
        );
    }
}