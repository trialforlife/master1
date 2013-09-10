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
            "cid"=>$row["c_id"],
			"id"=>$row["f_id"],
			"name"=>addslashes((string)$row["f_name"]),
			"image"=>addslashes((string)$row["f_image"]),
			"time"=>addslashes((string)$row["f_time"]),
			"filmpage"=>'<div class="nav-element-s"><span class="txt">'.addslashes((string)$row["f_name"]).'</span><span class="s_arrow"></span><span class="location">'.addslashes((string)$row["f_adress"]).'</span><span class="img_box"><img style="width:4em; float:right ; padding-top:0.2em; height:2.8em;" src=http://now-yakutsk.stairwaysoft.net/mobile/img/'.$row["f_image"].'></span></div>',
          ));
			
	}

}
$query1 = "SELECT * FROM play where p_name LIKE '%" . $search . "%'  ";
$dbresult1 = mysql_query($query1);

if (mysql_affected_rows() > 0) {
	while($row = mysql_fetch_array($dbresult1))
	{
		array_push($result["films"],array(
            "scat"=>"theatre",
            "id"=>$row["p_id"],
            "cid"=>$row["p_id"],
            "cid"=>$row["t_id"],
            "name"=>addslashes((string)$row["p_name"]),
			"image"=>addslashes((string)$row["p_image"]),
			"time"=>addslashes((string)$row["p_time"]),
			"filmpage"=>'<div class="nav-element-s"><span class="txt">'.addslashes((string)$row["p_name"]).'</span><span class="s_arrow"></span><span class="location">'.addslashes((string)$row["p_adress"]).'</span><span class="img_box"><img style="width:4em; float:right ; padding-top:0.2em; height:2.8em;" src=http://now-yakutsk.stairwaysoft.net/mobile/img/'.$row["p_image"].'></span></div>',
			));
			
	}

}
$query2 = "SELECT * FROM entertainment where en_name LIKE '%" . $search . "%' ";
$dbresult2 = mysql_query($query2);

if (mysql_affected_rows() > 0) {
	while($row = mysql_fetch_array($dbresult2))
	{
		array_push($result["films"],array(
            "scat"=>"entertainment",
            "id"=>$row["en_id"],
            "site"=>$row["en_site"],
            "phone"=>$row["en_phone"],
            "adress"=>$row["en_adress"],
            "banner"=>$row["en_banner"],
            "name"=>addslashes((string)$row["en_name"]),
			"image"=>addslashes((string)$row["en_image"]),
			"time"=>addslashes((string)$row["en_time"]),
            "filmpage"=>'<div class="nav-element-s"><span class="txt">'.addslashes((string)$row["en_name"]).'</span><span class="s_arrow"></span><span class="location">'.addslashes((string)$row["en_adress"]).'</span><span class="img_box"><img style="width:4em; float:right ; padding-top:0.2em; height:2.8em;" src=http://now-yakutsk.stairwaysoft.net/mobile/img/'.$row["en_image"].'></span></div>',
			//"<img style=\"width:500px; float:left ; height:50px;\" src=http://now/".$row["cb_banner"]."> <br><br>". 
			//$row["en_name"]."<img style=\"width:100px; float:right ; height:50px;\" src=http://now/".$row["en_image"]."><br>".$row["en_time"]."</br><small>".$row["en_content"]."</small></br>",
			));
			
	}

}
$query3 = "SELECT * FROM events where ev_name LIKE '%" . $search . "%' ";
$dbresult3 = mysql_query($query3);

if (mysql_affected_rows() > 0) {
	while($row = mysql_fetch_array($dbresult3))
	{
		array_push($result["films"],array(
            "scat"=>"events",
            "id"=>$row["ev_id"],
            "cid"=>$row["ev_id"],
            "name"=>addslashes((string)$row["ev_name"]),
			"image"=>addslashes((string)$row["ev_image"]),
			"time"=>addslashes((string)$row["ev_time"]),
            "filmpage"=>'<div class="nav-element-s"><span class="txt">'.addslashes((string)$row["ev_name"]).'</span><span class="s_arrow"></span><span class="location">'.addslashes((string)$row["ev_adress"]).'</span><span class="img_box"><img style="width:4em; float:right ; padding-top:0.2em; height:2.8em;" src=http://now-yakutsk.stairwaysoft.net/mobile/img/'.$row["ev_image"].'></span></div>'			));
	}

}
$query4 = "SELECT * FROM nightlife where n_name LIKE '%" . $search . "%'  ";
$dbresult4 = mysql_query($query4);

if (mysql_affected_rows() > 0) {
	while($row = mysql_fetch_array($dbresult4))
	{
		array_push($result["films"],array(
            "scat"=>"nightlife",
            "id"=>$row["n_id"],
            "site"=>$row["n_site"],
            "phone"=>$row["n_phone"],
            "adress"=>$row["n_adress"],
            "banner"=>$row["n_banner"],
            "name"=>addslashes((string)$row["n_name"]),
			"image"=>addslashes((string)$row["n_image"]),
			"time"=>addslashes((string)$row["n_time"]),
            "filmpage"=>'<div class="nav-element-s"><span class="txt">'.addslashes((string)$row["n_name"]).'</span><span class="s_arrow"></span><span class="location">'.addslashes((string)$row["n_adress"]).'</span><span class="img_box"><img style="width:4em; float:right ; padding-top:0.2em; height:2.8em;" src=http://now-yakutsk.stairwaysoft.net/mobile/img/'.$row["n_image"].'></span></div>',
			//"<img style=\"width:500px; float:left ; height:50px;\" src=http://now/".$row["cb_banner"]."> <br><br>". 
			//$row["n_name"]."<img style=\"width:100px; float:right ; height:50px;\" src=http://now/".$row["n_image"]."><br>".$row["n_time"]."</br><small>".$row["n_content"]."</small></br>",
			));
			
	}

}
$query5 = "SELECT * FROM shipment where s_name LIKE '%" . $search . "%'  ";
$dbresult5 = mysql_query($query5);

if (mysql_affected_rows() > 0) {
	while($row = mysql_fetch_array($dbresult5))
	{
		array_push($result["films"],array(
            "scat"=>"shipment",
            "id"=>$row["s_id"],
            "site"=>$row["s_site"],
            "phone"=>$row["s_phone"],
            "adress"=>$row["s_adress"],
            "banner"=>$row["s_banner"],
            "name"=>addslashes((string)$row["s_name"]),
			"image"=>addslashes((string)$row["s_image"]),
			"time"=>addslashes((string)$row["s_time"]),
            "filmpage"=>'<div class="nav-element-s"><span class="txt">'.addslashes((string)$row["s_name"]).'</span><span class="s_arrow"></span><span class="location">'.addslashes((string)$row["s_adress"]).'</span><span class="img_box"><img style="width:4em; float:right ; padding-top:0.2em; height:2.8em;" src=http://now-yakutsk.stairwaysoft.net/mobile/img/'.$row["s_image"].'></span></div>',
			));
			
	}

}
$query6 = "SELECT * FROM restaurant where r_name LIKE '%" . $search . "%'  ";
$dbresult6 = mysql_query($query6);

if (mysql_affected_rows() > 0) {
    while($row = mysql_fetch_array($dbresult6))
    {
        array_push($result["films"],array(
            "scat"=>"restaurants",
            "id"=>$row["r_id"],
            "site"=>$row["r_site"],
            "phone"=>$row["r_phone"],
            "adress"=>$row["r_adress"],
            "banner"=>$row["r_banner"],
            "name"=>addslashes((string)$row["r_name"]),
            "image"=>addslashes((string)$row["r_image"]),
            "time"=>addslashes((string)$row["r_time"]),
            "filmpage"=>'<div class="nav-element-s"><span class="txt">'.addslashes((string)$row["r_name"]).'</span><span class="s_arrow"></span><span class="location">'.addslashes((string)$row["r_adress"]).'</span><span class="img_box"><img style="width:4em; float:right ; padding-top:0.2em; height:2.8em;" src=http://now-yakutsk.stairwaysoft.net/mobile/img/'.$row["r_image"].'></span></div>', 

        ));

    }

}
$query7 = "SELECT * FROM beautyandhealth where bh_name LIKE '%" . $search . "%'  ";
$dbresult7 = mysql_query($query7);

if (mysql_affected_rows() > 0) {
    while($row = mysql_fetch_array($dbresult7))
    {
        array_push($result["films"],array(
            "scat"=>"beautyandhealh",
            "id"=>$row["bh_id"],
            "site"=>$row["bh_site"],
            "phone"=>$row["bh_phone"],
            "adress"=>$row["bh_adress"],
            "banner"=>$row["bh_banner"],
            "name"=>addslashes((string)$row["bh_name"]),
            "image"=>addslashes((string)$row["bh_image"]),
            "time"=>addslashes((string)$row["bh_time"]),
            "filmpage"=>'<div class="nav-element-s"><span class="txt">'.addslashes((string)$row["bh_name"]).'</span><span class="s_arrow"></span><span class="location">'.addslashes((string)$row["bh_adress"]).'</span><span class="img_box"><img style="width:4em; float:right ; padding-top:0.2em; height:2.8em;" src=http://now-yakutsk.stairwaysoft.net/mobile/img/'.$row["bh_image"].'></span></div>',
            //"<img style=\"width:500px; float:left ; height:50px;\" src=http://now/".$row["cb_banner"]."> <br><br>".
            //$row["s_name"]."<img style=\"width:100px; float:right ; height:50px;\" src=http://now/".$row["s_image"]."><br>".$row["S_time"]."</br><small>".$row["s_content"]."</small></br>",
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