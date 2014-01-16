<?php
	header("Cache-Control: no-cache, must-revalidate");
?>
<script type="text/javascript">
$(document).ready(function(){
	var ID;
	$(".edit_tr").click(function(){
		ID=$(this).attr('id');
		$("#range_name_"+ID).hide();
		$("#range_name_input_"+ID).show();
	})

	// Edit input box click action
	$(".editbox").mouseup(function(){
		var performance_detail_id=$("#range_detail_id_"+ID).val();
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
function dataManageRange(ID){
	var range_detail_id=$("#range_detail_id_"+ID).val();
	var range_group_id=$("#range_group_id_"+ID).val();
	var element_id=$("#element_id_"+ID).val();
	var range_name=$("#range_name_input_"+ID).val();
	var dataString = 'range_detail_id='+range_detail_id+'&range_group_id='+range_group_id+'&element_id='+element_id+'&range_name='+range_name;
	if($("#range_name_input_"+ID).val().length>0){
		alert(dataString);
		$.ajax({
			type: "POST",
			url: "rangeCmd.php",
			data: dataString,
			cache: false,
							
			success: function(html){
				$("#range_name_"+ID).html(range_name);
				//alert("บันทึกเรียบร้อย");
				//location.reload(true);
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
	$element=$_POST["element"];
	//include "common.php";

	echo"<table  border='1' class='noSpacing' style='margin-left:auto;margin-right: auto;margin-top: 5px;width:1000px'>
		<tr>
			<td colspan='4'><h3>ขอบเขต (Range Statement)</h3></td></tr>";
		$sqlrange="select range_detail_id, range_group_id, range_name, element_id from range_detail where element_id='".trim($element)."'";
		$rrange=mysql_query($sqlrange)or die(mysql_error()."<br>".$sqlrange);
		$i=1;
		while($rowrange=mysql_fetch_array($rrange)):
			echo "<tr id=".$i." class=\"edit_tr\">
			<td width='80'>&nbsp;</td>
			<td width='20'>".$i."</td>
			<td class=\"edit_td\">
				<input type='hidden' id='range_detail_id_".$i."' name='range_detail_id_".$i."' value='".$rowrange["range_detail_id"]."'>
				<input type='hidden' id='range_group_id_".$i."' name='range_group_id_".$i."' value='".$rowrange["range_group_id"]."'>
				<input type='hidden' id='element_id_".$i."' name='element_id_".$i."' value='".$rowrange["element_id"]."'>
				<span id=\"range_name_".$i."\" class=\"text\">".$rowrange["range_name"]."</span>
				<input type=\"text\" value=\"".$rowrange["range_name"]."\" class=\"editbox\" id=\"range_name_input_".$i."\">
			</td>
			<td><input type=\"button\" id=\"CmdBtn_".$i."\" value=\"บันทึก\" onClick=\"dataManageRange(".$i.");\" ></td>
		</tr>";
		$i++;
		endwhile;
		echo "<tr id=".$i." class=\"edit_tr\">
			<td width='80'>&nbsp;</td>
			<td width='20'>".$i."</td>
			<td class=\"edit_td\" width='300'>
				<input type='hidden' id='range_detail_id_".$i."' name='range_detail_id_".$i."' value='".$rowrange["range_detail_id"]."'>
				<input type='hidden' id='range_group_id_".$i."' name='range_group_id_".$i."' value='".$rowrange["range_group_id"]."'>
				<input type='hidden' id='element_id_".$i."' name='element_id_".$i."' value='".$element."'>
				<span id=\"range_name_".$i."\" class=\"text\">".$rowrange["range_name"]."</span>
				<input type=\"text\" value=\"".$rowrange["range_name"]."\" class=\"editbox\" id=\"range_name_input_".$i."\">
			</td>
			<td><input type=\"button\" id=\"CmdBtn_".$i."\" value=\"บันทึก\" onClick=\"dataManageRange(".$i.");\" ></td>
		</tr>";	
	echo"</table>";