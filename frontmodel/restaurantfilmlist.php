<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: value=Origin, X-Requested-With, Content-Type, Accept');

$link = mysql_connect("localhost","now-yakutsk","E327D28999");
mysql_set_charset('utf8' ,  $link);

mysql_select_db("now-yakutsk", $link);

$f_cid = $_GET["f_cid"];
$cc = 1;
$result = array("films"=>array());

$query = "select * from restaurant_special where restaurant_special.r_id = '$f_cid' ";
$dbresult = mysql_query($query);

if (mysql_affected_rows() > 0) {
	while($row = mysql_fetch_array($dbresult))
	{
		array_push($result["films"],array(
			"id"=>$row["rs_id"],
			"name"=>addslashes((string)$row["rs_name"]),
			"image"=>addslashes((string)$row["rs_image"]),
            "time"=>addslashes((string)$row["rs_time"]),


            "filmpage"=>
			//"<img style=\"width:500px; float:left ; height:50px;\" src=http://now/".$row["cb_banner"]."> <br><br>". 
			'<div class="restaurant"><span class="h2">'.$row["rs_name"]."</span><span class='image_mask'><img style=\"width:200px; float:rirght ; height:140px;\" src=http://now-yakutsk.stairwaysoft.net/mobile/img/".$row["rs_image"]."></span>".$row["rs_time"].$row["rs_content"]."<span class='price'>".$row["rs_price"]."</span></div>",
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