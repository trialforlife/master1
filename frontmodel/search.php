<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: value=Origin, X-Requested-With, Content-Type, Accept');

$link = mysql_connect("localhost","now-yakutsk","E327D28999");
mysql_set_charset('utf8' ,  $link);

mysql_select_db("now-yakutsk", $link);

$search = $_GET["value"];


$result = array("films"=>array());

$query = "SELECT * FROM films f_name LIKE '%" . $search . "%' LIMIT  0, 30 ";
$dbresult = mysql_query($query);

if (mysql_affected_rows() > 0) {
	while($row = mysql_fetch_array($dbresult))
	{
		array_push($result["films"],array(
			"id"=>$row["f_id"],
			"name"=>addslashes((string)$row["f_name"]),
			"image"=>addslashes((string)$row["f_image"]),
			"time"=>addslashes((string)$row["f_time"]),
			"filmpage"=>
			//"<img style=\"width:500px; float:left ; height:50px;\" src=http://now/".$row["cb_banner"]."> <br><br>". 
			$row["f_name"]."<img style=\"width:100px; float:right ; height:50px;\" src=http://now/".$row["f_image"]."><br>".$row["f_time"]."</br><small>".$row["f_content"]."</small></br>",
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