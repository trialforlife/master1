<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: value=Origin, X-Requested-With, Content-Type, Accept');

$link = mysql_connect("localhost","now-yakutsk","E327D28999");
mysql_set_charset('utf8' ,  $link);

mysql_select_db("now-yakutsk", $link);

$result = array("cat"=>array());

$f_count = $_GET["f_count"];


$query = 'select * from category where cat_id > 3  order by cat_id';
$dbresult = mysql_query($query);

if (mysql_affected_rows() > 0) {
	while($row = mysql_fetch_array($dbresult))
	{   if($row["cat_id"]== 9){
            if($f_count == 0){
                $cc = '<img style="margin-right: -14px;" src="http://now-yakutsk.stairwaysoft.net/mobile/img/clock-ico.png">';
                $d_style = 'color: rgba(255,255,255,0.3) !important; text-shadow: none !important;';
            }
            else{
                $cc = $row["f_count"];
                $d_style= '';
                }
            }
        if($row["cat_id"]> 9){
            $cc = '';
            $d_style= '';
        }
        elseif(($row["cat_count"])!= 0 )
        {
            $cc = $row["cat_count"];
            $d_style= '';
        }

        else{

            $d_style = 'color: rgba(255,255,255,0.3) !important; text-shadow: none !important;';
            $cc = '<img style="margin-right: -14px;" src="http://now-yakutsk.stairwaysoft.net/mobile/img/clock-ico.png">';
        }
		array_push($result["cat"],array(
			"id"=>$row["cat_id"],
            "c_count"=>addslashes((string)$row["cat_count"]),
            "name"=>addslashes((string)$row["cat_title"]),
			"title"=>'<div class="nav-element"><span style="'.$d_style.'" class="txt">'.addslashes((string)$row["cat_title"]).'</span><span class="calc">'.$cc.'</span></div>',
			"code"=>addslashes((string)$row["cat_code"]
			)));
			
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