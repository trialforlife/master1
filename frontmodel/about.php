<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: value=Origin, X-Requested-With, Content-Type, Accept');

$link = mysql_connect("localhost","now-yakutsk","E327D28999");
mysql_set_charset('utf8' ,  $link);

mysql_select_db("now-yakutsk", $link);

$result = array("cat"=>array());

$query = 'select * from company';
$dbresult = mysql_query($query);

if (mysql_affected_rows() > 0) {
	while($row = mysql_fetch_array($dbresult))
	{
		array_push($result["cat"],array(
			"id" =>addslashes((int)$row["com_id"]),
			"quote"=>$row["com_quote"],
			"logo"=>addslashes((string)$row["com_logo"]),
			"description"=>addslashes((string)$row["com_description"]),
			"phone"=>addslashes((string)$row["com_phone"]),
			"site"=>addslashes((string)$row["com_site"]),
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