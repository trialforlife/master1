<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: value=Origin, X-Requested-With, Content-Type, Accept');

$link = mysql_connect("localhost","now-yakutsk","E327D28999");
mysql_set_charset('utf8' ,  $link);

mysql_select_db("now-yakutsk", $link);

$result = array("cinema"=>array());

$query = 'select * from beautyandhealth ';//left join `cinema_banner` on (cinema.c_id=cinema_banner.c_id)';
$dbresult = mysql_query($query);

if (mysql_affected_rows() > 0) {
	while($row = mysql_fetch_array($dbresult))
	{
		array_push($result["cinema"],array(
			"cid"=>$row["bh_id"],
			"name"=>addslashes((string)$row["bh_name"]),
			"image"=>addslashes((string)$row["bh_image"]),
            "adress"=>addslashes((string)$row["bh_adress"]),
            "site"=>addslashes((string)$row["bh_site"]),
            "banner"=>addslashes((string)$row["bh_banner"]),
            "phone"=>addslashes((string)$row["bh_phone"]),
			"published"=>addslashes((string)$row["bh_published"]),
            "list"=>'<div class="nav-element1"><span class="txt">'.addslashes((string)$row["bh_name"]).'</span><span class="r_arrow"></span><span class="location">'.addslashes((string)$row["bh_adress"]).'</span><span class="img_box"><img style="width:200px; float:right ; height:138px;" src=http://now-yakutsk.stairwaysoft.net/mobile/img/'.$row["bh_image"].'></span></div>',
			"img_full"=> "<img src=http://now/".addslashes((string)$row["s_image"]).">",
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