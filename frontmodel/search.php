<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: value=Origin, X-Requested-With, Content-Type, Accept');

$link = mysql_connect("localhost","now-yakutsk","E327D28999");
mysql_set_charset('utf8' ,  $link);

mysql_select_db("now-yakutsk", $link);

$search = $_GET["value"];


$result = array("films"=>array());

$query = "SELECT * FROM films where f_name LIKE '%" . $search . "%' ";
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
$query1 = "SELECT * FROM play where p_name LIKE '%" . $search . "%'  ";
$dbresult1 = mysql_query($query1);

if (mysql_affected_rows() > 0) {
	while($row = mysql_fetch_array($dbresult1))
	{
		array_push($result["films"],array(
			"id"=>$row["p_id"],
			"name"=>addslashes((string)$row["p_name"]),
			"image"=>addslashes((string)$row["p_image"]),
			"time"=>addslashes((string)$row["p_time"]),
			"filmpage"=>
			//"<img style=\"width:500px; float:left ; height:50px;\" src=http://now/".$row["cb_banner"]."> <br><br>". 
			$row["p_name"]."<img style=\"width:100px; float:right ; height:50px;\" src=http://now/".$row["p_image"]."><br>".$row["p_time"]."</br><small>".$row["p_content"]."</small></br>",
			));
			
	}

}
$query2 = "SELECT * FROM entertainment where en_name LIKE '%" . $search . "%' ";
$dbresult2 = mysql_query($query2);

if (mysql_affected_rows() > 0) {
	while($row = mysql_fetch_array($dbresult2))
	{
		array_push($result["films"],array(
			"id"=>$row["en_id"],
			"name"=>addslashes((string)$row["en_name"]),
			"image"=>addslashes((string)$row["en_image"]),
			"time"=>addslashes((string)$row["en_time"]),
			"filmpage"=>
			//"<img style=\"width:500px; float:left ; height:50px;\" src=http://now/".$row["cb_banner"]."> <br><br>". 
			$row["en_name"]."<img style=\"width:100px; float:right ; height:50px;\" src=http://now/".$row["en_image"]."><br>".$row["en_time"]."</br><small>".$row["en_content"]."</small></br>",
			));
			
	}

}
$query3 = "SELECT * FROM events where ev_name LIKE '%" . $search . "%' ";
$dbresult3 = mysql_query($query3);

if (mysql_affected_rows() > 0) {
	while($row = mysql_fetch_array($dbresult3))
	{
		array_push($result["films"],array(
			"id"=>$row["ev_id"],
			"name"=>addslashes((string)$row["ev_name"]),
			"image"=>addslashes((string)$row["ev_image"]),
			"time"=>addslashes((string)$row["ev_time"]),
			"filmpage"=>
			//"<img style=\"width:500px; float:left ; height:50px;\" src=http://now/".$row["cb_banner"]."> <br><br>". 
			$row["ev_name"]."<img style=\"width:100px; float:right ; height:50px;\" src=http://now/".$row["ev_image"]."><br>".$row["ev_time"]."</br><small>".$row["ev_content"]."</small></br>",
			));
			
	}

}
$query4 = "SELECT * FROM nightlife where n_name LIKE '%" . $search . "%'  ";
$dbresult4 = mysql_query($query4);

if (mysql_affected_rows() > 0) {
	while($row = mysql_fetch_array($dbresult4))
	{
		array_push($result["films"],array(
			"id"=>$row["n_id"],
			"name"=>addslashes((string)$row["n_name"]),
			"image"=>addslashes((string)$row["n_image"]),
			"time"=>addslashes((string)$row["n_time"]),
			"filmpage"=>
			//"<img style=\"width:500px; float:left ; height:50px;\" src=http://now/".$row["cb_banner"]."> <br><br>". 
			$row["n_name"]."<img style=\"width:100px; float:right ; height:50px;\" src=http://now/".$row["n_image"]."><br>".$row["n_time"]."</br><small>".$row["n_content"]."</small></br>",
			));
			
	}

}
$query5 = "SELECT * FROM shipment where s_name LIKE '%" . $search . "%'  ";
$dbresult5 = mysql_query($query5);

if (mysql_affected_rows() > 0) {
	while($row = mysql_fetch_array($dbresult5))
	{
		array_push($result["films"],array(
			"id"=>$row["s_id"],
			"name"=>addslashes((string)$row["s_name"]),
			"image"=>addslashes((string)$row["s_image"]),
			"time"=>addslashes((string)$row["s_time"]),
			"filmpage"=>
			//"<img style=\"width:500px; float:left ; height:50px;\" src=http://now/".$row["cb_banner"]."> <br><br>". 
			$row["s_name"]."<img style=\"width:100px; float:right ; height:50px;\" src=http://now/".$row["s_image"]."><br>".$row["S_time"]."</br><small>".$row["s_content"]."</small></br>",
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