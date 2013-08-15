<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: value=Origin, X-Requested-With, Content-Type, Accept');

$link = mysql_connect("now","now-yakutsk","E327D28999");

mysql_select_db("now-yakutsk", $link);

$result = array("cat"=>array());

$query = 'select * from category where cat_id < 4 ';
$dbresult = mysql_query($query);

if (mysql_affected_rows() > 0) {
	while($row = mysql_fetch_array($dbresult))
	{
		array_push($result["cat"],array(
			"id"=>$row["cat_id"],
			"title"=>addslashes((string)$row["cat_title"]),
			"code"=>addslashes((string)$row["cat_code"]),
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