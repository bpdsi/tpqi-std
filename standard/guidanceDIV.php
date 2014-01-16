<?php
//	header("Cache-Control: no-cache, must-revalidate");
?>
<script type="text/javascript">
$(document).ready(function(){
	var ID;
	$(".edit_guidance_asm").click(function(){
		ID=$(this).attr('id');
		$("#guidance_asm_name_"+ID).hide();
		$("#guidance_asm_name_input_"+ID).show();
	})

	// Edit input box click action
	$(".editbox").mouseup(function(){
		var performance_detail_id=$("#guidance_asm_detail_id_"+ID).val();
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
function dataManageGuidance(ID){
	var guidance_asm_detail_id=$("#guidance_asm_detail_id_"+ID).val();
	var element_id=$("#element_id_"+ID).val();
	var guidance_asm_name=$("#guidance_asm_name_input_"+ID).val();
	var dataString = 'guidance_asm_detail_id='+guidance_asm_detail_id+'&element_id='+element_id+'&guidance_asm_name='+guidance_asm_name;
	if($("#guidance_asm_name_input_"+ID).val().length>0){
		//alert(dataString);
		$.ajax({
			type: "POST",
			url: "standard/guidanceCmd.php",
			data: dataString,
			cache: false,
							
			success: function(html){
				$("#guidance_asm_name_"+ID).html(guidance_asm_name);
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
<?
	//$element=$_GET["element"];
	//include "common.php";

	echo"<table  border='1' class='noSpacing' style='margin-left:auto;margin-right: auto;margin-top: 5px;width:1000px'>
		<tr>
			<td colspan='4'><h3>แนวทางการประเมินสำหรับผู้ประเมินสมรรถนะย่อยนี้ (Guidance to Assessors of Element)</h3></td>
		</tr>";
		$sqlguidance_asm="select guidance_asm_detail_id, guidance_asm_name, element_id 
					from guidance_detail 
					where element_id='".trim($element)."'";
		$rguidance_asm=mysql_query($sqlguidance_asm)or die(mysql_error()."<br>".$sqlguidance_asm);
		$i=1;
		while($rowguidance_asm=mysql_fetch_array($rguidance_asm)):
			echo "<tr id=".$i." class=\"edit_guidance_asm\" valign='top'>
			<td width='10%'>&nbsp;</td>
			<td width='5%'>".$i."</td>
			<td class=\"edit_td\" width='70%'>
				<input type='hidden' id='guidance_asm_detail_id_".$i."' name='guidance_asm_detail_id_".$i."' value='".$rowguidance_asm["guidance_asm_detail_id"]."'>
				<input type='hidden' id='element_id_".$i."' name='element_id_".$i."' value='".$rowguidance_asm["element_id"]."'>
				<span id=\"guidance_asm_name_".$i."\" class=\"text\">".$rowguidance_asm["guidance_asm_name"]."</span>
				<textarea class=\"editbox\" id=\"guidance_asm_name_input_".$i."\" rows='3' cols='110'>".$rowguidance_asm["guidance_asm_name"]."</textarea>
			</td>
			<td width='15%'><input type=\"button\" id=\"CmdBtn_".$i."\" value=\"บันทึก\" onClick=\"dataManageGuidance(".$i.");\" ></td>
		</tr>";
		$i++;
		endwhile;
		echo "<tr id=".$i." class=\"edit_guidance_asm\" valign='top'>
			<td width='10%'>&nbsp;</td>
			<td width='5%'>".$i."</td>
			<td class=\"edit_td\" width='70%'>
				<input type='hidden' id='guidance_asm_detail_id_".$i."' name='guidance_asm_detail_id_".$i."' value='".$rowguidance_asm["guidance_asm_detail_id"]."'>
				<input type='hidden' id='element_id_".$i."' name='element_id_".$i."' value='".$element."'>
				<span id=\"guidance_asm_name_".$i."\" class=\"text\">".$rowguidance_asm["guidance_asm_name"]."</span>
				<textarea class=\"editbox\" id=\"guidance_asm_name_input_".$i."\" rows='3' cols='110'>".$rowguidance_asm["guidance_asm_name"]."</textarea>
			</td>
			<td width='15%'><input type=\"button\" id=\"CmdBtn_".$i."\" value=\"บันทึก\" onClick=\"dataManageGuidance(".$i.");\" ></td>
		</tr>";	
	echo"</table>";