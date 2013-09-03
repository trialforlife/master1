<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: value=Origin, X-Requested-With, Content-Type, Accept');

$link = mysql_connect("localhost","now-yakutsk","E327D28999");
mysql_set_charset('utf8' ,  $link);

mysql_select_db("now-yakutsk", $link);

$result = array("cinema"=>array());

$query = 'select * from `restaurant` ';//left join `cinema_banner` on (cinema.c_id=cinema_banner.c_id)';
$dbresult = mysql_query($query);

if (mysql_affected_rows() > 0) {
	while($row = mysql_fetch_array($dbresult))
	{
		array_push($result["cinema"],array(
			"cid"=>$row["r_id"],
			"name"=>addslashes((string)$row["r_name"]),
			"image"=>addslashes((string)$row["r_image"]),
			"adress"=>addslashes((string)$row["r_adress"]),
            "site"=>addslashes((string)$row["r_site"]),
            "adress"=>addslashes((string)$row["r_adress"]),
            "phone"=>addslashes((string)$row["r_phone"]),
//			"list"=>"<div>".addslashes((string)$row["r_name"])."<img style=\"width:50px; float:right ; height:20px;\" src=http://now/".$row["r_image"]."><br><div>",
			"img_full"=> "<img src=http://now/".addslashes((string)$row["r_image"]).">",

            "list"=>'<div class="nav-element1"><span class="txt">'.addslashes((string)$row["r_name"]).'</span><span class="r_arrow"></span><span class="location">'.addslashes((string)$row["r_adress"]).'</span><span class="img_box"><img style="width:200px; float:right ; height:138px;" src=http://now-yakutsk.stairwaysoft.net/mobile/img/'.$row["r_image"].'></span></div>',

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