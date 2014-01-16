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


<div style='margin-left:auto;margin-right: auto;margin-top: 5px;width:1000px'>สำหรับผู้ประเมินร่วมกับผู้รับการประเมิน</center>
<table border='1' class='noSpacing' style='margin-left:auto;margin-right: auto;margin-top: 5px;width:1000px'>
		<tr>
			<td align='center'><h4>กลุ่มอาชีพ</h4></td>
			<td align='center'><h2>แผนการประเมิน</h2></td>
			<td align='center'>หมายเลข</td>
		<tr>
</table>
<table border='1' class='noSpacing' style='margin-left:auto;margin-right: auto;margin-top: 5px;width:1000px'>
		<tr>
			<td><h2>ผู้รับการประเมิน</h2></td>
			<td><input name="asm_name" id="asm_name" size="45"></td>
			<td><h2>คุณวุฒิวิชาชีพ</h2></td>
			<td><input name="tvq_name" id="tvq_name" size="45"></td>
		<tr>
</table>
<table border='1' class='noSpacing' style='margin-left:auto;margin-right: auto;margin-top: 5px;width:1000px'>
		<tr>
			<td><h2>หมายเลข/ชื่อ หน่วยสมรรถนะ(Unit):</h2></td>
			<td><input name="unitComID" id="unitComID" size="95"></td>
		<tr>
</table>
<table border='1' class='noSpacing' style='margin-left:auto;margin-right: auto;margin-top: 5px;width:1000px'>
		<tr>
			<td colspan='8' align='center' class='table_header'>หมายเลขสมรรถนะย่อย</td>
			<td rowspan='2' align='center'class='table_header'>วิธีการตรวจสอบหลักฐาน</td>
			<td rowspan='2' align='center'class='table_header'>วัน/เดือน/ปี</td>
			<td rowspan='2' align='center' class='table_header'>เวลา</td>
		</tr>
		<tr>
			<?
			for($i=1;$i<=8;$i++){
				echo "<td align='center' class='table_header'>".$i."</td>";
			}
			?>
		</tr>
		<?
			$method_asm=array('ปฏิบัติงานปกติ','จำลองการปฏิบัติงาน','ผลสำเสร็จจากงานปกติ','ผลงานที่ได้รับมอบหมาย','เอกสารรายงานการปฏิบัติงาน','เอกสารแสดงผลงาน','เอกสารรับรองโดยหน่วยงาน','เอกสารรับรองโดยบุคคล','ตอบคำถามปากเปล่า','เขียนข้อความตอบคำถาม','แบบทดสอบ','อื่นๆ....');
			for($a=0;$a<count($method_asm);$a++){
			?>
				<tr>
					<?
					for($i=1;$i<=8;$i++){
						echo "<td align='center' class='table_header'><input type='checkbox' name='chk".$a.$i."' id='chk".$a.$i."'></td>";
					}
						echo "<td>".$method_asm[$a]."</td><td></td><td></td>";
					?>	
				</tr>
			<?}
		?>
<table>
<table border='1' class='noSpacing' style='margin-left:auto;margin-right: auto;margin-top: 5px;width:1000px'>
		<tr>
			<td width="150">สถานที่ทำการประเมิน</td>
			<td><textarea name="location" id="location" rows="3" cols="100"></textarea></td>
		</tr>
</table>
<table border='1' class='noSpacing' style='margin-left:auto;margin-right: auto;margin-top: 5px;width:1000px'>
		<tr>
			<td width="150">วิธีการรายงานผลการประเมิน</td>
			<td>
				<table width="100%">
					<tr valign="top">
						<td><input type='checkbox' name="method1" id="method1">เอกสาร</td>
						<td><input type='checkbox' name="method1" id="method1">ประชุมร่วม</td>
						<td><input type='checkbox' name="method1" id="method1">Web-Site</td>
						<td rowspan='2'>วันรายงานผล</td>
					</tr>
					<tr>
						<td><input type='checkbox' name="method1" id="method1">สื่อคอมพิวเตอร์</td>
						<td><input type='checkbox' name="method1" id="method1">ไปรษณีย์</td>
						<td><input type='checkbox' name="method1" id="method1">อื่นๆ..</td>
					</tr>
				</table>
			</td>
		</tr>
</table>
<table border='1' class='noSpacing' style='margin-left:auto;margin-right: auto;margin-top: 5px;width:1000px'>
		<tr>
			<td width="150">รายชื่อผู้ประเมิน</td>
			<td><textarea name="location" id="location" rows="3" cols="100"></textarea></td>
		</tr>
</table>
<table border='1' class='noSpacing' style='margin-left:auto;margin-right: auto;margin-top: 5px;width:1000px'>
		<tr>
			<td align="right">ลงชื่อผู้รับการประเมิน</td>
			<td ><input name="name_asm" id="name_asm"></td>
			<td align="right">ผู้ประเมิน</td>
			<td><input name="name_asm" id="name_asm"></td>
		</tr>
		<tr>
			<td align="right">วันที่</td>
			<td><input name="name_asm" id="name_asm"></td>
			<td align="right">วันที่</td>
			<td><input name="name_asm" id="name_asm"></td>
		</tr>
</table>