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
            "scat"=>"cinema",
			"id"=>$row["f_id"],
			"name"=>addslashes((string)$row["f_name"]),
			"image"=>addslashes((string)$row["f_image"]),
			"time"=>addslashes((string)$row["f_time"]),
			"filmpage"=>'<div class="nav-element-s"><span class="txt">'.addslashes((string)$row["f_name"]).'</span><span class="s_arrow"></span><span class="location">'.addslashes((string)$row["f_adress"]).'</span><span class="img_box"><img style="width:4em; float:right ; padding-top:0.2em; height:2.8em;" src=http://now-yakutsk.stairwaysoft.net/mobile/img/'.$row["f_image"].'></span></div>',
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