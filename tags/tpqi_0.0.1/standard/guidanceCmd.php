<?
include "../function/functionPHP.php";

if($_POST["guidance_asm_detail_id"]!=""){
	$guidance_asm_detail_id=$_POST["guidance_asm_detail_id"];
}else{
	$guidance_asm_detail_id=$_GET["guidance_asm_detail_id"];
}
if($_POST["element_id"]!=""){
	$element_id=$_POST["element_id"];
}else{
	$element_id=$_GET["element_id"];
}
if($_POST["guidance_asm_name"]!=""){
	$guidance_asm_name=$_POST["guidance_asm_name"];
}else{
	$guidance_asm_name=$_GET["guidance_asm_name"];
}


if($_POST["act"]!=""){
	$act=$_POST["act"];
}else{
	$act=$_GET["act"];
}
if($guidance_asm_detail_id=="")$act="add";
if($guidance_asm_detail_id!="")$act="edit";
if($act=="add"){
	$sqlcmd="insert into guidance_detail(element_id, guidance_asm_name)
			values(".$element_id.", '".$guidance_asm_name."')";
}elseif($act=="edit"){
	$sqlcmd="update guidance_detail set  guidance_asm_name='".$guidance_asm_name."' 
			where guidance_asm_detail_id=".$guidance_asm_detail_id;
}
mysql_query($sqlcmd)or die(mysql_error()."<br>Manage guidance_asm<br>".$sqlcmd);