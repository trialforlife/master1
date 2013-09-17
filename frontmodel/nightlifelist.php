<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: value=Origin, X-Requested-With, Content-Type, Accept');

$link = mysql_connect("localhost","now-yakutsk","E327D28999");
mysql_set_charset('utf8' ,  $link);

mysql_select_db("now-yakutsk", $link);

$result = array("cinema"=>array());

$query = 'select * from nightlife ';//left join `cinema_banner` on (cinema.c_id=cinema_banner.c_id)';
$dbresult = mysql_query($query);

if (mysql_affected_rows() > 0) {
	while($row = mysql_fetch_array($dbresult))
	{
		array_push($result["cinema"],array(
			"cid"=>$row["n_id"],
			"name"=>addslashes((string)$row["n_name"]),
			"image"=>addslashes((string)$row["n_image"]),
			"adress"=>addslashes((string)$row["n_adress"]),
            "banner"=>addslashes((string)$row["n_banner"]),
            "phone"=>addslashes((string)$row["n_phone"]),
            "site"=>addslashes((string)$row["n_site"]),
			"published"=>addslashes((string)$row["n_published"]),
            "list"=>'<div class="nav-element1"><span class="txt">'.addslashes((string)$row["n_name"]).'</span><span class="r_arrow"></span><span class="location">'.addslashes((string)$row["n_adress"]).'</span><span class="img_box"><img style="width:5em; margin-top:0em; float:right ; height:3.0em;" src=http://now-yakutsk.stairwaysoft.net/mobile/img/'.$row["n_image"].'></span></div>',
            "img_full"=> "<img src=http://now/".addslashes((string)$row["n_image"]).">",
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