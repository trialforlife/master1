<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: value=Origin, X-Requested-With, Content-Type, Accept');

$link = mysql_connect("localhost","now-yakutsk","E327D28999");
mysql_set_charset('utf8' ,  $link);

mysql_select_db("now-yakutsk", $link);

$f_cid = $_GET["f_cid"];
$cc = 1;
$result = array("films"=>array());

$query = "select * from beautyandhealth_special where beautyandhealth_special.bh_id = '$f_cid' ";
$dbresult = mysql_query($query);

if (mysql_affected_rows() > 0) {
	while($row = mysql_fetch_array($dbresult))
	{
		array_push($result["films"],array(
			"id"=>$row["bhs_id"],
			"name"=>addslashes((string)$row["bhs_name"]),
			"image"=>addslashes((string)$row["bhs_image"]),
			"time"=>addslashes((string)$row["bhs_time"]),
			"filmpage"=>
			//"<img style=\"width:500px; float:left ; height:50px;\" src=http://now/".$row["cb_banner"]."> <br><br>". 
			$row["bhs_title"]."<br><img style=\"width:100px; float:left ; height:50px;\" src=http://now/".$row["bhs_image"].">".$row["bhs_name"]."<br>".$row["bhs_time"]."</br><small>".$row["bhs_content"]."</small></br>".$row["bhs_price"],
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