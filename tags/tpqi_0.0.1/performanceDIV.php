<?php
	header("Cache-Control: no-cache, must-revalidate");
?>
<script type="text/javascript">
$(document).ready(function(){
	var ID;
	$(".edit_tr").click(function(){
		ID=$(this).attr('id');
		$("#performance_criteria_"+ID).hide();
		$("#performance_criteria_input_"+ID).show();
	})

	// Edit input box click action
	$(".editbox").mouseup(function(){
		var performance_detail_id=$("#performance_detail_id_"+ID).val();
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
function dataManagePerformance(ID){
	var performance_detail_id=$("#performance_detail_id_"+ID).val();
	var performance_group_id=$("#performance_group_id_"+ID).val();
	var element_id=$("#element_id_"+ID).val();
	var performance_criteria=$("#performance_criteria_input_"+ID).val();
	var dataString = 'performance_detail_id='+performance_detail_id+'&performance_group_id='+performance_group_id+'&element_id='+element_id+'&performance_criteria='+performance_criteria;
	if($("#performance_criteria_input_"+ID).val().length>0){
		alert(dataString);
		$.ajax({
			type: "POST",
			url: "performanceCmd.php",
			data: dataString,
			cache: false,
							
			success: function(html){
				$("#performance_criteria_"+ID).html(performance_criteria);
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
	include "common.php";

	echo"<table  border='1' class='noSpacing' style='margin-left:auto;margin-right: auto;margin-top: 5px;width:1000px'>
		<tr>
			<td colspan='4'><h3>เกณฑ์การปฏิบัติงาน (Performance Criteria,PC)</h3></td></tr>";
		$sql="select performance_detail_id, performance_group_id, performance_criteria, element_id from performance_detail where element_id='".trim($element)."'";
		$r=mysql_query($sql)or die(mysql_error()."<br>".$sql);
		$i=1;
		while($row=mysql_fetch_array($r)):
			echo "<tr id=".$i." class=\"edit_tr\">
			<td width='80'>&nbsp;</td>
			<td width='20'>".$i."</td>
			<td class=\"edit_td\">
				<input type='hidden' id='performance_detail_id_".$i."' name='performance_detail_id_".$i."' value='".$row["performance_detail_id"]."'>
				<input type='hidden' id='performance_group_id_".$i."' name='performance_group_id_".$i."' value='".$row["performance_group_id"]."'>
				<input type='hidden' id='element_id_".$i."' name='element_id_".$i."' value='".$row["element_id"]."'>
				<span id=\"performance_criteria_".$i."\" class=\"text\">".$row["performance_criteria"]."</span>
				<input type=\"text\" value=\"".$row["performance_criteria"]."\" class=\"editbox\" id=\"performance_criteria_input_".$i."\">
			</td>
			<td><input type=\"button\" id=\"CmdBtn_".$i."\" value=\"บันทึก\" onClick=\"dataManagePerformance(".$i.");\" ></td>
		</tr>";
		$i++;
		endwhile;
		echo "<tr id=".$i." class=\"edit_tr\">
			<td width='80'>&nbsp;</td>
			<td width='20'>".$i."</td>
			<td class=\"edit_td\" width='300'>
				<input type='hidden' id='performance_detail_id_".$i."' name='performance_detail_id_".$i."' value='".$row["performance_detail_id"]."'>
				<input type='hidden' id='performance_group_id_".$i."' name='performance_group_id_".$i."' value='".$row["performance_group_id"]."'>
				<input type='hidden' id='element_id_".$i."' name='element_id_".$i."' value='".$element."'>
				<span id=\"performance_criteria_".$i."\" class=\"text\">".$row["performance_criteria"]."</span>
				<input type=\"text\" value=\"".$row["performance_criteria"]."\" class=\"editbox\" id=\"performance_criteria_input_".$i."\">
			</td>
			<td><input type=\"button\" id=\"CmdBtn_".$i."\" value=\"บันทึก\" onClick=\"dataManagePerformance(".$i.");\" ></td>
		</tr>";	
	echo"</table>";