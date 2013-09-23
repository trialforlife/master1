<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: value=Origin, X-Requested-With, Content-Type, Accept');

$link = mysql_connect("localhost","now-yakutsk","E327D28999");
mysql_set_charset('utf8' ,  $link);

mysql_select_db("now-yakutsk", $link);

$f_cid = $_GET["f_cid"];
$cc = 1;
$result = array("films"=>array());

$query = "select enb_id,enb_banner from entertainment_banner where entertainment_banner.en_id = '$f_cid' and enb_published = '1'";
$dbresult = mysql_query($query);

if (mysql_affected_rows() > 0) {
    while($row = mysql_fetch_array($dbresult))
    {
        array_push($result["films"],array(
            "id"=>$row["enb_id"],
            "c_banner"=>$row["enb_banner"],
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