<?
include"common.php";

if($_POST["range_detail_id"]!=""){
	$range_detail_id=$_POST["range_detail_id"];
}else{
	$range_detail_id=$_GET["range_detail_id"];
}
if($_POST["range_group_id"]!=""){
	$range_group_id=$_POST["range_group_id"];
}else{
	$range_group_id=$_GET["range_group_id"];
}
if($_POST["element_id"]!=""){
	$element_id=$_POST["element_id"];
}else{
	$element_id=$_GET["element_id"];
}
if($_POST["range_name"]!=""){
	$range_name=$_POST["range_name"];
}else{
	$range_name=$_GET["range_name"];
}

if($_POST["act"]!=""){
	$act=$_POST["act"];
}else{
	$act=$_GET["act"];
}
if($range_detail_id=="")$act="add";
if($range_detail_id!="")$act="edit";
if($range_group_id=="")$range_group_id=$element_id;
if($act=="add"){
	$sqlcmd="insert into range_detail(range_group_id, element_id, range_name)values(".$range_group_id.", ".$element_id.", '".$range_name."')";
}elseif($act=="edit"){
	$sqlcmd="update range_detail set  range_name='".$range_name."' where range_detail_id=".$range_detail_id;
}
mysql_query($sqlcmd)or die(mysql_error()."<br>Manage Performance<br>".$sqlcmd);