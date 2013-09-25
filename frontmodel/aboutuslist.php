<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: value=Origin, X-Requested-With, Content-Type, Accept');

$link = mysql_connect("localhost","now-yakutsk","E327D28999");
mysql_set_charset('utf8' ,  $link);

mysql_select_db("now-yakutsk", $link);

$result = array("cinema"=>array());

$query = 'select * from company
';//left join `cinema_banner` on (cinema.c_id=cinema_banner.c_id)';
$dbresult = mysql_query($query);

if (mysql_affected_rows() > 0) {
	while($row = mysql_fetch_array($dbresult))
	{
		array_push($result["cinema"],array(
			"cid"=>$row["com_id"],
			"quote"=>addslashes((string)$row["com_quote"]),
			"logo"=>addslashes((string)$row["com_logo"]),
			"site"=>addslashes((string)$row["com_site"]),
			"description"=>addslashes((string)$row["com_decription"]),
			"list"=>'<div class="container about"><span class="h2">'.addslashes((string)$row["com_quote"]).'</span><p>'.addslashes((string)$row["com_description"]).'</p><div class="ab-navigtaion"><a href="tel:123456" class="button">'.$row["com_phone"].'</a><span class="button">'.$row["com_site"].'</span><span class="button no_shadow">Отправить сообщение</span></div></div>',

			"img_full"=> "<img src=http://now/".addslashes((string)$row["com_logo"]).">",

			));
			
	}
}

mysql_close();

if (isset($_REQUEST["callback"])) {
	header("Content-Type: text/javascript");
	echo $_REQUEST["callback"]. "(" .json_encode($result). ");";
}
else {
	header("Content-Type: application/x-json");
	echo json_encode($result);
}
?>