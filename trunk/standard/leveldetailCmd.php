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
if($_POST["unit_competence"]!=""){
	$unit_competence=$_POST["unit_competence"];
}else{
	$unit_competence=$_GET["unit_competence"];
}
if($_POST["level"]!=""){
	$level=$_POST["level"];
}else{
	$level=$_GET["level"];
}

if($_POST["act"]!=""){
	$act=$_POST["act"];
}else{
	$act=$_GET["act"];
}
if($leveldetailid=="")$act="add";
if($leveldetailid!="")$act="edit";

if($act=="add"){
	$sqlcmd="insert into level_competence(key_func_code, unit_competence, level)values('".trim($key_func_code)."', '".trim($unit_competence)."', ".$level.")";
}elseif($act=="edit"){
	$sqlcmd="update level_competence set unit_competence='".trim($unit_competence)."', level=".$level." where leveldetailid=".$leveldetailid;
}
mysql_query($sqlcmd)or die(mysql_error()."<br>Manage level competence<br>".$sqlcmd);