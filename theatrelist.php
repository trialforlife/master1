<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: value=Origin, X-Requested-With, Content-Type, Accept');

$link = mysql_connect("localhost","now-yakutsk","E327D28999");
mysql_set_charset('utf8' ,  $link);

mysql_select_db("now-yakutsk", $link);

$result = array("cinema"=>array());

$query = 'select * from `theatre` ';//left join `cinema_banner` on (cinema.c_id=cinema_banner.c_id)';
$dbresult = mysql_query($query);

if (mysql_affected_rows() > 0) {
	while($row = mysql_fetch_array($dbresult))
	{
		array_push($result["cinema"],array(
			"cid"=>$row["t_id"],
			"name"=>addslashes((string)$row["t_name"]),
			"image"=>addslashes((string)$row["t_image"]),
			"adress"=>addslashes((string)$row["t_adress"]),
			"published"=>addslashes((string)$row["t_published"]),
			"list"=>addslashes((string)$row["t_name"]).'<br>'.addslashes((string)$row["t_adress"]),

			"img_full"=> "<img src=http://now/".addslashes((string)$row["t_image"]).">",
			"banner"=>"<img src=http://now/".addslashes((string)$row["tb_banner"]).">",

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