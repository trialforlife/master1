<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: value=Origin, X-Requested-With, Content-Type, Accept');

$link = mysql_connect("localhost","now-yakutsk","E327D28999");
mysql_set_charset('utf8' ,  $link);

mysql_select_db("now-yakutsk", $link);

$f_cid = $_GET["f_cid"];
$cc = 1;
$result = array("films"=>array());

$query = "select cb_id,cb_banner from cinema_banner where cinema_banner.c_id = '$f_cid' and cb_published = '1' ";
$dbresult = mysql_query($query);

if (mysql_affected_rows() > 0) {
    while($row = mysql_fetch_array($dbresult))
    {
        array_push($result["films"],array(
            "id"=>$row["cb_id"],
            "c_banner"=>$row["cb_banner"],
       //   "filmpage"=>'<div style="float: left;width: 97%;padding-left: 1.5%; padding-right: 0.5%;"><span class="h2">'.$row["f_name"]."</span><span class='time'>".$row["f_time"]."</span><div class='f_con'><img style=\"width:200px; float:right ; height:140px;\" src=http://now-yakutsk.stairwaysoft.net/mobile/img/".$row["f_image"]."><pf>".$row["f_content"]."</pf></div></div>",

            //"<img style=\"width:500px; float:left ; height:50px;\" src=http://now/".$row["cb_banner"]."> <br><br>".
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