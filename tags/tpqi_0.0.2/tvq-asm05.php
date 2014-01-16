<?php
//ผลการประเมิน 110
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
			<td align='center'>กลุ่มอาชีพ</td>
			<td align='center'>แบบบันทึกการตอบคำถามทดสอบความรู้</td>
			<td align='center'>หมายเลข</td>
		<tr>
</table>
<table border='1' class='noSpacing' style='margin-left:auto;margin-right: auto;margin-top: 2px;width:1000px'>
		<tr>
			<td><h4>ผู้รับการประเมิน</h4></td>
			<td><input name="asm_name" id="asm_name" size="45"></td>
			<td rowspan="2" valign="top"><h4>คุณวุฒิวิชาชีพ</h4></td>
			<td rowspan="2" valign="top"><input name="tvq_name" id="tvq_name" size="45"></td>
		</tr>
		<tr>	
			<td><h4>หมายเลข/ชื่อ หน่วยสมรรถนะ (Unit):</h4></td>
			<td><input name="element_id" id="element_id" size="45"></td>
		<tr>
</table>
<table border='1' class='noSpacing' style='margin-left:auto;margin-right: auto;margin-top: 2px;width:1000px'>
		<tr>
			<td colspan="2"><h4>ตรวจสอบจาก</h4></td>
		</tr>
		<tr>
			<td width="10%">&nbsp;</td>
			<td>
				<table>
					<tr>
						<td><input type="radio" name="asessment_type" id="asessment_type" value="1">ตอบคำถามปากเปล่า</td>
						<td><input type="radio" name="asessment_type" id="asessment_type" value="2">เขียนข้อความตอบคำถาม</td>
						<td><input type="radio" name="asessment_type" id="asessment_type" value="3">แบบทดสอบ</td>
					</tr>
				</table>
			</td>
		</tr>
</table>
<table border='1' class='noSpacing' style='margin-left:auto;margin-right: auto;margin-top: 2px;width:1000px'>
		<tr>
			<td align='center' class='table_header'>หมายเลขหน่วยสมรรถนะย่อย หรือเกณฑ์การปฏิบัติงาน</td>
			<td align='center'class='table_header'>บันทึกการทดสอบ</td>
			<td align='center' class='table_header'>ผล</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		
<table>
<table border='1' class='noSpacing' style='margin-left:auto;margin-right: auto;margin-top: 2px;width:1000px'>
		<tr>
			<td width="150">ลงชื่อผู้ประเมิน</td>
			<td><input type="text" name="asessment_name" id="asessment_name" size="70"></td>
			<td align="right">วันที่</td>
			<td><input name="date_asm" id="date_asm"></td>
		</tr>
</table>