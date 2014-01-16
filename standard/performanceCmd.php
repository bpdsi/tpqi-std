<?
include "../function/functionPHP.php";
if($_POST["performance_detail_id"]!=""){
	$performance_detail_id=$_POST["performance_detail_id"];
}else{
	$performance_detail_id=$_GET["performance_detail_id"];
}
if($_POST["performance_group_id"]!=""){
	$performance_group_id=$_POST["performance_group_id"];
}else{
	$performance_group_id=$_GET["performance_group_id"];
}
if($_POST["element_id"]!=""){
	$element_id=$_POST["element_id"];
}else{
	$element_id=$_GET["element_id"];
}
if($_POST["performance_criteria"]!=""){
	$performance_criteria=$_POST["performance_criteria"];
}else{
	$performance_criteria=$_GET["performance_criteria"];
}

if($_POST["act"]!=""){
	$act=$_POST["act"];
}else{
	$act=$_GET["act"];
}
if($performance_detail_id=="")$act="add";
if($performance_detail_id!="")$act="edit";
if($performance_group_id=="")$performance_group_id=$element_id;
if($act=="add"){
	$sqlcmd="insert into performance_detail(performance_group_id, element_id, performance_criteria)values(".$performance_group_id.", ".$element_id.", '".$performance_criteria."')";
}elseif($act=="edit"){
	$sqlcmd="update performance_detail set  performance_criteria='".$performance_criteria."' where performance_detail_id=".$performance_detail_id;
}
//echo "<br>".$sqlcmd;
mysql_query($sqlcmd)or die(mysql_error()."<br>Manage Performance<br>".$sqlcmd);