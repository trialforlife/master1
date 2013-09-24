<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: value=Origin, X-Requested-With, Content-Type, Accept');

$link = mysql_connect("localhost","now-yakutsk","E327D28999");
mysql_set_charset('utf8' ,  $link);

mysql_select_db("now-yakutsk", $link);

$f_cid = $_GET["f_cid"];
$cc = 1;
$result = array("films"=>array());

$query = "select bhs_id,bhs_name,bhs_image,bhs_time,bhs_content from beautyandhealth_special where beautyandhealth_special.bh_id = '$f_cid' ";
$dbresult = mysql_query($query);

if (mysql_affected_rows() > 0) {
	while($row = mysql_fetch_array($dbresult))
	{
		array_push($result["films"],array(
			"id"=>$row["bhs_id"],
			"name"=>addslashes((string)$row["bhs_name"]),
			//"image"=>addslashes((string)$row["bhs_image"]),
			"time"=>addslashes((string)$row["bhs_time"]),
            "filmpage"=>'<div style="float: left;width: 97%;padding-left: 1.5%; padding-right: 0.5%;"><span class="h2">'.$row["bhs_name"]."</span><span class='time'>".$row["bhs_time"]."</span><div class='f_con'><img style=\"width:200px; float:right ; height:140px; margin-right:-1.5%;\" src=http://now-yakutsk.stairwaysoft.net/mobile/img/".$row["bhs_image"]."><pf>".$row["bhs_content"]."</pf></div></div>",

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