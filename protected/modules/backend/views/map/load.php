<!DOCTYPE html>
<html>
<head>
	<title>Редактирование карты ТРЦ</title>
	<link href="/mapfiles/main.css" type="text/css" rel="stylesheet" />
	<meta charset="UTF-8" />
	<!--
		Summer html image map creator
		http://github.com/summerstyle/summer
		
		Copyright 2013 Vera Lobacheva (summerstyle.ru)
		Released under the GPL3 (GPL3.txt)
		
		Thu May 15 2013 15:15:27 GMT+0400
	-->
</head>
<body>
<noscript>
	<div id="noscript">
		Please, enable javascript in your browser
	</div>
</noscript>
  
<div id="wrapper">
	<header id="header">
		<h1 id="logo">
			<a href="/backend/map/">
				Назад
			</a>									
		</h1>
		<nav id="nav" class="clearfix">
			<ul>
				<li id="rect"><a href="#">прямоугольник</a></li>
				<li id="circle"><a href="#">круг</a></li>
				<li id="polygon"><a href="#">многоугольник</a></li>
				<li id="edit"><a href="#">редактировать</a></li>
				<li id="to_html"><a href="#">сохранить</a></li>
				<li id="preview"><a href="#">просмотр</a></li>
				<li id="clear"><a href="#">очистить</a></li>
				<li id="new_image"><a href="#">новый</a></li>
				<li id="show_help"><a href="#">?</a></li>
			</ul>
		</nav>
		<div id="coords"></div>
		<div id="debug"></div>
	</header>	
	<div id="image_wrapper">
		<div id="image">
			<img src="" alt="#" id="img" />
			<svg xmlns="http://www.w3.org/2000/svg" version="1.2" baseProfile="tiny" id="svg"></svg>
		</div>
	</div>
</div>

<!-- For html image map code -->
<div id="code">
	<span class="close_button" title="close"></span>
	<div id="code_content"></div>
</div>

<!-- Edit details block -->
<form id="edit_details">
	<h5>Attrubutes</h5>
	<span class="close_button" title="close"></span>
	<p style="display:none;">
		<label for="href_attr">href</label>
		<input type="text" id="href_attr" />
	</p>
	<p style="display:none;">
		<label for="alt_attr">alt</label>
		<input type="text" id="alt_attr" />
	</p>
	<p>
		<label for="title_attr">title</label>
		<input type="text" id="title_attr" />
	</p>
	<p>
  		<select id="item_select_box">
  			<option value=""> -- Магазины -- </option>
  			<?php foreach ($shop_cat as $cat) { ?>
  				<?php if ($cat && $cat->shops) {
  					foreach ($cat->shops as $item) {
  				?>
  				<option value="/shopping/shop/id/<?php echo $item->item_id; ?>" xname="<?php echo $item->title_ru; ?>"><?php echo $item->title_ru; ?></option>
  			<?php }}} ?>
  			<option> -- Рестораны -- </option>
  			<?php foreach ($restaurants as $item) { ?>
  				<option value="/restaurants/show/id/<?php echo $item->item_id; ?>" xname="<?php echo $item->title_ru; ?>"><?php echo $item->title_ru; ?></option>
  			<?php } ?>
  		</select>
	</p>
	<button id="save">Сохранить</button>
</form>
  
<!-- Get image form -->
<div id="get_image_wrapper">
	<div id="get_image">
		<div id="logo_get_image">
			<a href="/backend/map">
				Назад
			</a>
		</div>
		<div id="loading">Загрузка</div>
		<div id="file_reader_support" style="display:none;">
			<label>Перетащите сюда картинку</label>
			<div id="dropzone">
				<span class="clear_button" title="clear">x</span> 
				<img src="" alt="preview" id="sm_img" />
			</div>
			<!-- <b>or</b> -->
		</div>


		<?php 
		if (!$trcmap || $trcmap->image_path == '')
		{
			/* For image uploader */ $prependName = 'photos/logos/' . uniqid();
			$this->widget('MUploadify',array(
			  'name'=>'new_image_2', // Syka!!!!
			  'script'=>array('/backend/files/uploadify','prependName'=>$prependName),
			  'fileExt'=>'*.jpg;*.jpeg;*.gif;*.png;',
			  'uploadButton'=>null,
			  'buttonText'=>'Ekvator map',
			  'auto'=>true,
			  'onComplete'=> 'js:function(file, data, response) {$("#url").val(uploadedFileRand+response.name); $("#button").click();}',
			)); 
		} else { Yii::app()->clientScript->registerCoreScript('jquery'); }
		?>

		<div style="display:none;">
			<label for="url">Путь до карты</label>
			<span id="url_wrapper">
				<span class="clear_button" title="clear">x</span>
				<input type="text" id="url" />
			</span>
		</div>
		<button id="button">OK</button>
	</div>
</div>

<!-- Help block -->
<div id="overlay"></div>
<div id="help">
	<span class="close_button"></span>
	<div class="txt">
		<section>
			<h2>Loading an image</h2>
			<p><span class="key">F5</span> &mdash; reload the page and display the form for loading image again</p>
		</section>
		<section>
			<h2>Drawing mode (rectangle / circle / polygon)</h2>
			<p><span class="key">ENTER</span> &mdash; stop polygon drawing (or click on first helper)</p>
			<p><span class="key">ESC</span> &mdash; cancel drawing of a new area</p>
			<p><span class="key">SHIFT</span> &mdash; square drawing in case of a rectangle and right angle drawing in case of a polygon</p>
		</section>
		<section>
		<h2>Editing mode</h2>
			<p><span class="key">DELETE</span> &mdash; remove a selected area</p>
			<p><span class="key">ESC</span> &mdash; cancel editing of a selected area</p>
			<p><span class="key">SHIFT</span> &mdash; edit and save proportions for rectangle</p>
			<p><span class="key">i</span> &mdash; edit attributes of a selected area (or dblclick on an area)</p>
			<p><span class="key">&uarr;</span> &mdash; move a selected area up</p>
			<p><span class="key">&darr;</span> &mdash; move a selected area down</p>
			<p><span class="key">&larr;</span> &mdash; move a selected area to the left</p>
			<p><span class="key">&rarr;</span> &mdash; move a selected area to the right</p>
		</section>
	</div>
	<footer>&nbsp;</footer>
</div>
<script type="text/javascript" src="http://yandex.st/json2/2011-10-19/json2.js"></script>

<script type="text/javascript" src="/mapfiles/scripts.js"></script>
<!-- <script type="text/javascript" src="/js/jquery.js"></script> -->


<!-- <script type="text/javascript" src="/mapfiles/hack.js"></script> -->


 		<script type="text/javascript">
 			<?php if (!$trcmap || $trcmap->image_path == '') { ?>
				var uploadedFileRand = "/<?php echo $prependName;?>";
			<?php } else { ?>
/*
 -------------------------------------------
 MAP EXISTS
 -------------------------------------------
 */
$(function(){
setTimeout(function(){
	// loader
	
	var c_map_html = '<?php echo $trcmap->image_map; ?>';

	var c_map_image = '<?php echo $trcmap->image_path; ?>';

	var $temp = $("<div/>").html(c_map_html);

	$("#url").val(c_map_image);

	$("#button").click();

	$temp.find('area').each(function(n, item){
		//
		// recoverPolygon
		//
		if ($(item).attr('shape') == 'poly')
		{
			var params = JSON.parse('['+$(item).attr('coords')+']');
			var opts = {
				href: $(item).attr('href'), 
				title: $(item).attr('title'), 
				alt: $(item).attr('alt')
			};
			proxy.recoverPolygon(params, opts);
		}
		//
		// recoverCircle
		//
		if ($(item).attr('shape') == 'circle')
		{
			var _params = JSON.parse('['+$(item).attr('coords')+']');
			var params = {cx: _params[0], cy: _params[1], radius: _params[2]};
			var opts = {
				href: $(item).attr('href'), 
				title: $(item).attr('title'), 
				alt: $(item).attr('alt')
			};
			proxy.recoverCircle(params, opts);
		}
		//
		// recoverRect
		//
		if ($(item).attr('shape') == 'rect')
		{
			var _params = JSON.parse('['+$(item).attr('coords')+']');
			var params = {x: _params[0], y: _params[1], width: _params[2], height: _params[3]};
			var opts = {
				href: $(item).attr('href'), 
				title: $(item).attr('title'), 
				alt: $(item).attr('alt')
			};
			proxy.recoverRect(params, opts);
		}
	});

});
}, 3000);
			<?php } ?>
			var city_id = <?php echo $city_id; ?>;
		</script>

<script type="text/javascript">
	$('#item_select_box').live('change', function (val, inst) {
		console.log($(this).val());
		$("#href_attr").val($(this).val());
		$("#alt_attr").val($(this).find(":selected").text());
		$("#title_attr").val($(this).find(":selected").text());
		$('#item_select_box').val( '' );
	});
</script>

</body>
</html>