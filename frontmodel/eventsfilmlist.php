<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: value=Origin, X-Requested-With, Content-Type, Accept');

$link = mysql_connect("localhost","now-yakutsk","E327D28999");
mysql_set_charset('utf8' ,  $link);

mysql_select_db("now-yakutsk", $link);

$f_cid = $_GET["f_cid"];
$cc = 1;
$result = array("films"=>array());

$query = "select * from events where events.ev_id = '$f_cid'  ";
$dbresult = mysql_query($query);

if (mysql_affected_rows() > 0) {
	while($row = mysql_fetch_array($dbresult))
	{
		array_push($result["films"],array(
			"id"=>$row["ev_id"],
			"name"=>addslashes((string)$row["ev_name"]),
			"image"=>addslashes((string)$row["ev_image"]),
			"time"=>addslashes((string)$row["ev_time"]),
			"filmpage"=>
			//"<img style=\"width:500px; float:left ; height:50px;\" src=http://now/".$row["cb_banner"]."> <br><br>". 
			$row["ev_name"]."<img style=\"width:100px; float:right ; height:50px;\" src=http://now/".$row["ev_image"]."><br>".$row["ev_time"]."</br><small>".$row["ev_content"]."</small></br>",
            "filmpage"=>'<span class="h2">'.$row["ev_name"]."</span><span class='time'>".$row["ev_time"]."</span><div class='f_con'><img style=\"width:200px; float:right ; height:140px;\" src=http://now-yakutsk.stairwaysoft.net/mobile/img/".$row["ev_image"]."><pf>".$row["ev_content"]."</pf></div>",

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