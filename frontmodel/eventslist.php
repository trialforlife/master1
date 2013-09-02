<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: value=Origin, X-Requested-With, Content-Type, Accept');

$link = mysql_connect("localhost","now-yakutsk","E327D28999");
mysql_set_charset('utf8' ,  $link);

mysql_select_db("now-yakutsk", $link);

$result = array("cinema"=>array());

$query = 'select * from events
';//left join `cinema_banner` on (cinema.c_id=cinema_banner.c_id)';
$dbresult = mysql_query($query);

if (mysql_affected_rows() > 0) {
	while($row = mysql_fetch_array($dbresult))
	{
		array_push($result["cinema"],array(
			"cid"=>$row["ev_id"],
			"name"=>addslashes((string)$row["ev_name"]),
			"image"=>addslashes((string)$row["ev_image"]),
			"adress"=>addslashes((string)$row["ev_adress"]),
			"published"=>addslashes((string)$row["ev_published"]),
			//"list"=>"<div>".addslashes((string)$row["ev_name"])."<img style=\"width:50px; float:right ; height:20px;\" src=http://now/".$row["ev_image"]."><br></div>",
			"img_full"=> "<img src=http://now/".addslashes((string)$row["ev_image"]).">",
            "list"=>'<div class="nav-element1"><span class="txt">'.addslashes((string)$row["ev_name"]).'</span><span class="r_arrow"></span><span class="location">'.addslashes((string)$row["ev_adress"]).'</span><span class="img_box"><img style=\"width:200px; float:right ; height:138px;\" src=http://now/'.$row["ev_image"].'></span></div>',
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