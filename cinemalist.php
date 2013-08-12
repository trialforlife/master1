<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: value=Origin, X-Requested-With, Content-Type, Accept');

$link = mysql_connect("now","rot","rot");

mysql_select_db("now", $link);

$result = array("cinema"=>array());

$query = "select * from cinema";
$dbresult = mysql_query($query);

if (mysql_affected_rows() > 0) {
	while($row = mysql_fetch_array($dbresult))
	{
		array_push($result["cinema"],array(
			"id"=>$row["c_id"],
			"name"=>addslashes((string)$row["c_name"]),
			"image"=>addslashes((string)$row["c_image"]),
			"adress"=>addslashes((string)$row["c_adress"]),
			"published"=>addslashes((string)$row["c_published"]),
			"list"=>addslashes((string)$row["c_name"]).'</br>'.addslashes((string)$row["c_adress"])


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