<?
include "../function/functionPHP.php";

if($_POST["evidence_detail_id"]!=""){
	$evidence_detail_id=$_POST["evidence_detail_id"];
}else{
	$evidence_detail_id=$_GET["evidence_detail_id"];
}
if($_POST["evidence_group_id"]!=""){
	$evidence_group_id=$_POST["evidence_group_id"];
}else{
	$evidence_group_id=$_GET["evidence_group_id"];
}
if($_POST["element_id"]!=""){
	$element_id=$_POST["element_id"];
}else{
	$element_id=$_GET["element_id"];
}
if($_POST["evidence_name"]!=""){
	$evidence_name=$_POST["evidence_name"];
}else{
	$evidence_name=$_GET["evidence_name"];
}
if($_POST["evidence_type"]!=""){
	$evidence_type=$_POST["evidence_type"];
}else{
	$evidence_type=$_GET["evidence_type"];
}

if($_POST["act"]!=""){
	$act=$_POST["act"];
}else{
	$act=$_GET["act"];
}
if($evidence_detail_id=="")$act="add";
if($evidence_detail_id!="")$act="edit";
if($evidence_group_id=="")$evidence_group_id=$element_id;
if($act=="add"){
	$sqlcmd="insert into evidence_detail(evidence_group_id, element_id, evidence_name,evidence_type)
			values(".$evidence_group_id.", ".$element_id.", '".$evidence_name."',".$evidence_type.")";
}elseif($act=="edit"){
	$sqlcmd="update evidence_detail set  evidence_name='".$evidence_name."', evidence_type=".$evidence_type." 
			where evidence_detail_id=".$evidence_detail_id;
}
mysql_query($sqlcmd)or die(mysql_error()."<br>Manage Evidence<br>".$sqlcmd);