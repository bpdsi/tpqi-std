﻿<?php
//ผลการประเมิน 110
//	include "header.php";
//	include "menu4.php";
?>
<script type="text/javascript" src="./js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	var ID;
	$(".edit_tr").click(function(){
		ID=$(this).attr('id');
		$("#level_"+ID).hide();
		$("#level_input_"+ID).show();
	})

	// Edit input box click action
	$(".editbox").mouseup(function(){
		var leveldetailid=$("#leveldetailid_"+ID).val();
		//alert(ID);
		if(leveldetailid.length>0){
			return false
		}else{
			return true;
		}
	});
	
	// Outside click action
	$(document).mouseup(function(){
		$(".editbox").hide();
		$(".text").show();
	});
	
});
function dataManage(ID){
	var leveldetailid=$("#leveldetailid_"+ID).val();
	var key_func_code=$("#key_func_code_"+ID).val();
	var unit_competence=$("#unit_competence_"+ID).val();
	var level=$("#level_input_"+ID).val();
	var dataString = 'leveldetailid='+leveldetailid+'&key_func_code='+key_func_code+'&unit_competence='+unit_competence+'&level='+level;
	if($("#level_input_"+ID).val().length>0){
		//alert(dataString);
		$.ajax({
			type: "POST",
			url: "leveldetailCmd.php",
			data: dataString,
			cache: false,
							
			success: function(html){
				$("#level_"+ID).html(level);
				//alert("บันทึกเรียบร้อย");
				location.reload(true);
			},
			error: function(request,error){
				alert ( " Can't do because: " + error );
			}
		});
	}else{
		alert('กรุณากรอกข้อมูลให้ครบถ้วน');
	}
}
</script>
<style type='text/css'>
	body{
		/*font-family:Arial, Helvetica, sans-serif;
		font-size:14px;*/
	}
	.editbox{
		display:none
	}
	/*td{
		padding:3px;
		border:solid 1px #000;
	}*/
	.editbox{
		font-size:14px;
		<!--width:270px;-->
		background-color:#ffffcc;
		border:solid 1px #000;
		padding:2px;
	}
	.edit_tr:hover{
		background:url(edit.png) right no-repeat #80C8E5;
		cursor:pointer;
	}
</style>


<div style='margin-left:auto;margin-right: auto;margin-top: 2px;width:1000px'>สำหรับผู้ประเมินร่วมกับผู้รับการประเมิน</center>
<table border='1' class='noSpacing' style='margin-left:auto;margin-right: auto;margin-top: 2px;width:1000px'>
		<tr>
			<td align='center'><h4>กลุ่มอาชีพ</h4></td>
			<td align='center'><h4>แผนปฏิบัติการสำหรับผู้ประเมิน</h4></td>
			<td align='center'>หมายเลข</td>
		<tr>
</table>
<table border='1' class='noSpacing' style='margin-left:auto;margin-right: auto;margin-top: 2px;width:1000px'>
		<tr>
			<td><h4>ผู้รับการประเมิน</h4></td>
			<td><input name="asm_name" id="asm_name" size="45"></td>
			<td rowspan="2" valign="top"><h4>หมายเลข/ชื่อ หน่วยสมรรถนะ(Unit):</h4></td>
			<td rowspan="2" valign="top"><input name="unit_competence" id="unit_competence" size="45"></td>
		</tr>
		<tr>	
			<td><h4>หมายเลขสมรรถนะย่อย</h4></td>
			<td><input name="element_id" id="element_id" size="45"></td>
		<tr>
</table>
<table border='1' class='noSpacing' style='margin-left:auto;margin-right: auto;margin-top: 2px;width:1000px'>
		<tr>
			<td align='center' class='table_header'>วิธีการประเมิน</td>
			<td align='center'class='table_header'>ขั้นตอนการปฏิบัติงานในแต่ละวิธีการประเมิน</td>
			<td align='center'class='table_header'>วัน/เดือน/ปี</td>
			<td align='center' class='table_header'>เวลา</td>
			<td align='center' class='table_header'>ผู้ปฏิบัติงาน</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		
<table>
<table border='1' class='noSpacing' style='margin-left:auto;margin-right: auto;margin-top: 2px;width:1000px'>
		<tr>
			<td width="150">หมายเหตุ/ข้อมูลเพิ่มเติม</td>
			<td><textarea name="remark" id="remark" rows="3" cols="100"></textarea></td>
		</tr>
</table>
<table border='1' class='noSpacing' style='margin-left:auto;margin-right: auto;margin-top: 2px;width:1000px'>
		<tr>
			<td width="150">ลงชื่อผู้ประเมิน</td>
			<td><input type="text" name="asessment_name" id="asessment_name" size="70"></td>
			<td align="right">วันที่</td>
			<td><input name="date_asm" id="date_asm"></td>
		</tr>
</table>