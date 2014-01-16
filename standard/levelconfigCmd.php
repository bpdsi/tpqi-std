<?
include "../function/functionPHP.php";

if($_POST["leveldetailid"]!=""){
	$leveldetailid=$_POST["leveldetailid"];
}else{
	$leveldetailid=$_GET["leveldetailid"];
}
if($_POST["key_func_code"]!=""){
	$key_func_code=$_POST["key_func_code"];
}else{
	$key_func_code=$_GET["key_func_code"];
}
if($_POST["levelname"]!=""){
	$levelname=$_POST["levelname"];
}else{
	$levelname=$_GET["levelname"];
}
if($_POST["levelid"]!=""){
	$levelid=$_POST["levelid"];
}else{
	$levelid=$_GET["levelid"];
}

if($_POST["act"]!=""){
	$act=$_POST["act"];
}else{
	$act=$_GET["act"];
}
if($leveldetailid=="")$act="add";
if($leveldetailid!="")$act="edit";

if($act=="add"){
	$sqlcmd="insert into level_name(key_func_code, levelname, levelid)values('".trim($key_func_code)."', '".trim($levelname)."', ".$levelid.")";
}elseif($act=="edit"){
	$sqlcmd="update level_name set levelname='".trim($levelname)."', levelid=".$levelid." where leveldetailid=".$leveldetailid;
}
mysql_query($sqlcmd)or die(mysql_error()."<br>Manage level name<br>".$sqlcmd);