<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: value=Origin, X-Requested-With, Content-Type, Accept');

$link = mysql_connect("localhost","now-yakutsk","E327D28999");
mysql_set_charset('utf8' ,  $link);

mysql_select_db("now-yakutsk", $link);

$f_cid = $_GET["f_cid"];
$cc = 1;
$result = array("films"=>array());

$query = "select en_id,en_name,en_time,en_image,en_content from entertainment where entertainment.en_id = '$f_cid' ";
$dbresult = mysql_query($query);

if (mysql_affected_rows() > 0) {
	while($row = mysql_fetch_array($dbresult))
	{
		array_push($result["films"],array(
			"id"=>$row["en_id"],
			"name"=>addslashes((string)$row["en_name"]),
			//"image"=>addslashes((string)$row["en_image"]),
			"time"=>addslashes((string)$row["en_time"]),
            "filmpage"=>'<div style="float: left;width: 97%;padding-left: 1.5%; padding-right: 0.5%;"><span class="h2">'.$row["en_name"]."</span><span class='time'>".$row["en_time"]."</span><div class='f_con'><img style=\"width:282px; float:right ; height:400px;\" src=http://now-yakutsk.stairwaysoft.net/mobile/img/".$row["en_image"]."><pf>".$row["en_content"]."</pf></div></div>",


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