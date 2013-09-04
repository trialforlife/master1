<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: value=Origin, X-Requested-With, Content-Type, Accept');

$link = mysql_connect("localhost","now-yakutsk","E327D28999");
mysql_set_charset('utf8' ,  $link);

mysql_select_db("now-yakutsk", $link);

$f_cid = $_GET["f_cid"];
$cc = 1;
$result = array("films"=>array());

$query = "select * from nightlife where nightlife.n_id = '$f_cid' ";
$dbresult = mysql_query($query);

if (mysql_affected_rows() > 0) {
	while($row = mysql_fetch_array($dbresult))
	{
		array_push($result["films"],array(
			"id"=>$row["n_id"],
			"name"=>addslashes((string)$row["n_name"]),
			"image"=>addslashes((string)$row["n_image"]),
			"time"=>addslashes((string)$row["n_time"]),
//            $row["n_name"]."<img style=\"width:100px; float:right ; height:50px;\" src=http://now/".$row["n_image"]."><br>".$row["n_time"]."</br><small>".$row["n_content"]."</small></br>",

            "filmpage"=>'<span class="h2">'.$row["n_name"]."</span><span class='time'>".$row["n_time"]."</span><div class='f_con'><img style=\"width:282px; float:right ; height:400px;\" src=http://now-yakutsk.stairwaysoft.net/mobile/img/".$row["n_image"]."><pf>".$row["n_content"]."</pf></div>",

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