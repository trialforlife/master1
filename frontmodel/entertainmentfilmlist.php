<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: value=Origin, X-Requested-With, Content-Type, Accept');

$link = mysql_connect("localhost","now-yakutsk","E327D28999");
mysql_set_charset('utf8' ,  $link);

mysql_select_db("now-yakutsk", $link);

$f_cid = $_GET["f_cid"];
$cc = 1;
$result = array("films"=>array());

$query = "select * from entertainment where entertainment.en_id = '$f_cid' ";
$dbresult = mysql_query($query);

if (mysql_affected_rows() > 0) {
	while($row = mysql_fetch_array($dbresult))
	{
		array_push($result["films"],array(
			"id"=>$row["en_id"],
			"name"=>addslashes((string)$row["en_name"]),
			"image"=>addslashes((string)$row["en_image"]),
			"time"=>addslashes((string)$row["en_time"]),
//			"filmpage"=>"<img style=\"width:100px; float:left ; height:50px;\" src=http://now/".$row["en_image"].">".$row["en_name"]."<br>".$row["en_content"]."</br><small>".$row["en_time"]."<br>".$row["en_content_add"]."</small></br>",

            "filmpage"=>'<span class="h2">'.$row["en_name"]."</span><span class='time'>".$row["en_time"]."</span><div class='f_con'><img style=\"width:200px; float:right ; height:140px;\" src=http://now-yakutsk.stairwaysoft.net/mobile/img/".$row["en_image"]."><pf>".$row["en_content"]."</pf></div>",


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