<?php
// For image uploader
$fileFolder = 'photos/gallery/';
$fileSalt = uniqid();
$prependName = $fileFolder . $fileSalt;

$gal_id = $gallery->gal_id;
?>

<?php $this->widget('MUploadify',array(
		'multi'=>true,
		  'name'=>'new_image', 
		  'script'=>array('/backend/files/uploadify','prependName'=>$prependName), 
		  'fileExt'=>'*.jpg;*.jpeg;*.gif;*.png;', 
		  'uploadButton'=>null, 
		  'buttonText'=>'Upload images', 
		  'auto'=>true,
		  'onComplete'=> "js:function(file, data, response) {uploadedFileShow(response.name, '#addedImages', '#Banner_banner_back');}",
)); ?>

<br/>
<h2>Загруженные</h2>
<div id="addedImages">
	<?php foreach ($gallery->images as $img) { ?>
		<img src="<?php echo $img->img_thumb; ?>">
		<a href="/backend/gallery/remi/img_id/<?php echo $img->img_id; ?>">Удалить</a>
		<br />
	<?php } ?>
</div>

<script type="text/javascript">
	var uploadedFileRand = "/<?php echo $prependName;?>";
	var uploadedFileShow = function(localName, idImage, idField)
	{
		$.ajax({
			type: "POST",
			url: "/backend/gallery/addi",
			data: {
				gal_id: <?php echo $gal_id;?>,
				file_salt: '<?php echo $fileSalt;?>',
				file_name: localName
			},
			success: function(data, textStatus, jqXHR){
				console.log(data);
				if (data.saved)
				{
				    $("#addedImages").append( //'#imageHolder'
				        $("<img/>", { src:data.img_thumb }
				    )).append($("<a/>",{
				    	href:'/backend/gallery/remi/img_id/'+data.img_id
				    }).text('Удалить'))
				    .append($("<br/>"));
				}
				else
				{
					alert("Error: не удалось сохранить изображение");
				}
			},
			dataType: 'json'
		});
	}
</script>