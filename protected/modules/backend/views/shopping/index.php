<?php if ($city_id <= 0) {?>

<h1>Магазины</h1>

Выберите город из списка справа или добавьте новый.

<?php } else if (!$show_shops) { 
/*$this->menu[] = array('label'=>'------------');
$this->menu[] = array('label'=>'Добавить магазин', 
	'url'=>'/backend/restaurants/new/city_id/' . $city_id);*/
$city_name = ''; foreach ($cities as $c) {if($c->city_id == $city_id) {$city_name = $c->city_ru; } }
?>

<h1>Разделы - <?php echo $city_name; ?></h1>

<?php
foreach ($categories as $item) {
	echo '<a href="/backend/shopping/editcategory/cat_id/'.$item->cat_id.'/city_id/'.$city_id.'"><b>' . $item->title . '</b></a> - ';
	echo '<a href="/backend/shopping/index/cat_id/'.$item->cat_id.'/city_id/'.$city_id.'">показать магазины</a>';
	//echo '<b>' . $item->title . '</b>';
	/*foreach ($langs as $l) {
		$url = '/backend/pages/edit/lang_id/'.$l->lang_code.'/page/'.$p_name.'/city_id/'.$city_id;
		echo ' <a href="'.$url.'">' . $l->lang_name . '</a> ';
	}*/
	echo '</br>';
}
?>

<?php } else { ?>
<?php 
$city_name = ''; foreach ($cities as $c) {if($c->city_id == $city_id) {$city_name = $c->city_ru; } }

echo '<h1>Магазины</h1>'; // - ' . $city_name . '

foreach ($shops as $item) {
	//echo '<b>' . $item->title . '</b>';
	echo '<a href="/backend/shopping/edit/cat_id/'.$item->cat_id.'/city_id/'.$city_id.'/item_id/'.$item->item_id.'"><img src="'.$item->image_path.'"></img></a>';
	//echo '<b>' . $item->title . '</b>';
	/*foreach ($langs as $l) {
		$url = '/backend/pages/edit/lang_id/'.$l->lang_code.'/page/'.$p_name.'/city_id/'.$city_id;
		echo ' <a href="'.$url.'">' . $l->lang_name . '</a> ';
	}*/
	echo '</br>';
}

?>
<?php } ?>