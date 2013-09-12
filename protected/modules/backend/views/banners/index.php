<?php if ($city_id <= 0) {?>

<h1>Баннеры</h1>

Выберите город из списка справа или добавьте новый.

<?php } else { 
$this->menu[] = array('label'=>'------------');
$this->menu[] = array('label'=>'Добавить баннер', 
	'url'=>'/backend/banners/new/city_id/' . $city_id);
$city_name = '';
foreach ($cities as $c) {if($c->city_id == $city_id) {$city_name = $c->city_ru; } }
?>

<h1>Баннеры - <?php echo $city_name; ?></h1>

<?php
foreach ($banners as $item) {
	//echo '<b>' . $item->title . '</b>';
	echo '<a href="/backend/banners/edit/city_id/' . $city_id . '/banner_id/'.$item->banner_id.'">'.CHtml::encode($item->banner_title).'</a>';
	echo ' - <a href="/backend/banners/delete/city_id/'.$city_id.'/banner_id/'.$item->banner_id.'">Удалить баннер</a>';
	//echo '<b>' . $item->title . '</b>';
	/*foreach ($langs as $l) {
		$url = '/backend/pages/edit/lang_id/'.$l->lang_code.'/page/'.$p_name.'/city_id/'.$city_id;
		echo ' <a href="'.$url.'">' . $l->lang_name . '</a> ';
	}*/
	echo '</br>';
}
?>

<?php } ?>