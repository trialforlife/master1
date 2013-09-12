<form action="/backend/gallery/addg" method="post">
    Название галлереи (используется только в админ панели): <br />
    <input name="gal_name" type="text" size="25" /> <br />
	<input type="submit" value="Создать новую галлерею" /> <br />
</form>
 <br /> <br />
<h2>Галлереи:</h2>
<?php foreach ($galleries as $gal) {?>
<?php echo $gal->gal_name; ?> - 
<a href="/backend/gallery/edit/gal_id/<?php echo $gal->gal_id; ?>">Редактировать</a> - 
<a href="/backend/gallery/remg/gal_id/<?php echo $gal->gal_id; ?>">Удалить</a><br/>

<?php } ?>