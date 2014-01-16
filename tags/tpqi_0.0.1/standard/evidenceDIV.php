<?php
//	header("Cache-Control: no-cache, must-revalidate");
?>
<script type="text/javascript">
$(document).ready(function(){
	var ID;
	$(".edit_evidence").click(function(){
		ID=$(this).attr('id');
		$("#evidence_name_"+ID).hide();
		$("#evidence_type_"+ID).hide();
		$("#evidence_name_input_"+ID).show();
	})

	// Edit input box click action
	$(".editbox").mouseup(function(){
		var performance_detail_id=$("#evidence_detail_id_"+ID).val();
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
function dataManageEvidence(ID){
	var evidence_detail_id=$("#evidence_detail_id_"+ID).val();
	var evidence_group_id=$("#evidence_group_id_"+ID).val();
	var element_id=$("#element_id_"+ID).val();
	var evidence_type=$("#evidence_type_"+ID).val();
	var evidence_name=$("#evidence_name_input_"+ID).val();
	var dataString = 'evidence_detail_id='+evidence_detail_id+'&evidence_group_id='+evidence_group_id+'&element_id='+element_id+'&evidence_name='+evidence_name+'&evidence_type='+evidence_type;
	if($("#evidence_name_input_"+ID).val().length>0){
		//alert(dataString);
		$.ajax({
			type: "POST",
			url: "standard/evidenceCmd.php",
			data: dataString,
			cache: false,
							
			success: function(html){
				$("#evidence_name_"+ID).html(evidence_name);
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
			<td colspan='5'><h3>หลักฐานที่ต้องการ (Evidence Requirements)</h3></td>
		</tr>";
		$sqlevidence_type1="SELECT evidence_type, evidence_type_name FROM   evidence_type where evidence_type=1";
		$revidence_type1=mysql_query($sqlevidence_type1);
		$rowevidence_type1=mysql_fetch_array($revidence_type1);
		echo"<tr>
				<td colspan='4'><h3>".$rowevidence_type1["evidence_type_name"]."</h3></td>
			</tr>";
		$sqlevidence="select evidence_detail_id, evidence_group_id, evidence_name, element_id, 
					evidence_detail.evidence_type, evidence_type_name 
					from evidence_detail ,evidence_type 
					where evidence_detail.evidence_type=evidence_type.evidence_type and element_id='".trim($element)."'
					and evidence_detail.evidence_type=1";
		$revidence=mysql_query($sqlevidence)or die(mysql_error()."<br>".$sqlevidence);
		$i=1;
		while($rowevidence=mysql_fetch_array($revidence)):
			echo "<tr id=".$i." class=\"edit_evidence\" valign='top'>
			<td width='10%'>&nbsp;</td>
			<td width='5%'>".$i."</td>
			<td class=\"edit_td\">
				<input type='hidden' id='evidence_detail_id_".$i."' name='evidence_detail_id_".$i."' value='".$rowevidence["evidence_detail_id"]."'>
				<input type='hidden' id='evidence_group_id_".$i."' name='evidence_group_id_".$i."' value='".$rowevidence["evidence_group_id"]."'>
				<input type='hidden' id='element_id_".$i."' name='element_id_".$i."' value='".$rowevidence["element_id"]."'>
				<input type='hidden' id='evidence_type_".$i."' name='evidence_type_".$i."' value='".$rowevidence_type1["evidence_type"]."'>
				<span id=\"evidence_name_".$i."\" class=\"text\"><pre>".$rowevidence["evidence_name"]."</pre></span>
				<!--<input type=\"text\" value=\"".$rowevidence["evidence_name"]."\" class=\"editbox\" id=\"evidence_name_input_".$i."\">-->
				<textarea cols='110' rows='2' class=\"editbox\" id=\"evidence_name_input_".$i."\">".$rowevidence["evidence_name"]."</textarea>
			</td>
			<td width='15%'><input type=\"button\" id=\"CmdBtn_".$i."\" value=\"บันทึก\" onClick=\"dataManageEvidence(".$i.");\" ></td>
		</tr>";
		$i++;
		endwhile;
		echo "<tr id=".$i." class=\"edit_evidence\" valign='top'>
			<td width='10%'>&nbsp;</td>
			<td width='5%'>".$i."</td>
			<td class=\"edit_td\" width='300'>
				<input type='hidden' id='evidence_detail_id_".$i."' name='evidence_detail_id_".$i."' value='".$rowevidence["evidence_detail_id"]."'>
				<input type='hidden' id='evidence_group_id_".$i."' name='evidence_group_id_".$i."' value='".$rowevidence["evidence_group_id"]."'>
				<input type='hidden' id='element_id_".$i."' name='element_id_".$i."' value='".$element."'>
				<input type='hidden' id='evidence_type_".$i."' name='evidence_type_".$i."' value='".$rowevidence_type1["evidence_type"]."'>
				<span id=\"evidence_name_".$i."\" class=\"text\"><pre>".$rowevidence["evidence_name"]."</pre></span>
				<!--<input type=\"text\" value=\"".$rowevidence["evidence_name"]."\" class=\"editbox\" id=\"evidence_name_input_".$i."\">-->
				<textarea cols='110' rows='2' class=\"editbox\" id=\"evidence_name_input_".$i."\">".$rowevidence["evidence_name"]."</textarea>
			</td>
			<td width='15%'><input type=\"button\" id=\"CmdBtn_".$i."\" value=\"บันทึก\" onClick=\"dataManageEvidence(".$i.");\" ></td>
		</tr>";	
		
		$i++;
		$sqlevidence_type2="SELECT evidence_type, evidence_type_name FROM   evidence_type where evidence_type=2";
		$revidence_type2=mysql_query($sqlevidence_type2);
		$rowevidence_type2=mysql_fetch_array($revidence_type2);
		echo"<tr>
				<td colspan='4'><h3>".$rowevidence_type2["evidence_type_name"]."</h3></td>
			</tr>";
		$sqlevidence="select evidence_detail_id, evidence_group_id, evidence_name, element_id, 
					evidence_detail.evidence_type, evidence_type_name 
					from evidence_detail ,evidence_type 
					where evidence_detail.evidence_type=evidence_type.evidence_type and element_id='".trim($element)."'
					and evidence_detail.evidence_type=2";
		$revidence=mysql_query($sqlevidence)or die(mysql_error()."<br>".$sqlevidence);
		$no=1;
		while($rowevidence=mysql_fetch_array($revidence)):
			echo "<tr id=".$i." class=\"edit_evidence\" valign='top'>
			<td width='10%'>&nbsp;</td>
			<td width='5%'>".$no."</td>
			<td class=\"edit_td\">
				<input type='hidden' id='evidence_detail_id_".$i."' name='evidence_detail_id_".$i."' value='".$rowevidence["evidence_detail_id"]."'>
				<input type='hidden' id='evidence_group_id_".$i."' name='evidence_group_id_".$i."' value='".$rowevidence["evidence_group_id"]."'>
				<input type='hidden' id='element_id_".$i."' name='element_id_".$i."' value='".$rowevidence["element_id"]."'>
				<input type='hidden' id='evidence_type_".$i."' name='evidence_type_".$i."' value='".$rowevidence_type2["evidence_type"]."'>
				<span id=\"evidence_name_".$i."\" class=\"text\"><pre>".$rowevidence["evidence_name"]."</pre></span>
				<!--<input type=\"text\" value=\"".$rowevidence["evidence_name"]."\" class=\"editbox\" id=\"evidence_name_input_".$i."\">-->
				<textarea cols='110' rows='2' class=\"editbox\" id=\"evidence_name_input_".$i."\">".$rowevidence["evidence_name"]."</textarea>
			</td>
			<td width='15%'><input type=\"button\" id=\"CmdBtn_".$i."\" value=\"บันทึก\" onClick=\"dataManageEvidence(".$i.");\" ></td>
		</tr>";
		$i++;
		$no++;
		endwhile;
		echo "<tr id=".$i." class=\"edit_evidence\" valign='top'>
			<td width='10%'>&nbsp;</td>
			<td width='5%'>".$no."</td>
			<td class=\"edit_td\" width='300'>
				<input type='hidden' id='evidence_detail_id_".$i."' name='evidence_detail_id_".$i."' value='".$rowevidence["evidence_detail_id"]."'>
				<input type='hidden' id='evidence_group_id_".$i."' name='evidence_group_id_".$i."' value='".$rowevidence["evidence_group_id"]."'>
				<input type='hidden' id='element_id_".$i."' name='element_id_".$i."' value='".$element."'>
				<input type='hidden' id='evidence_type_".$i."' name='evidence_type_".$i."' value='".$rowevidence_type2["evidence_type"]."'>
				<span id=\"evidence_name_".$i."\" class=\"text\"><pre>".$rowevidence["evidence_name"]."</pre></span>
				<!--<input type=\"text\" value=\"".$rowevidence["evidence_name"]."\" class=\"editbox\" id=\"evidence_name_input_".$i."\">-->
				<textarea cols='110' rows='2' class=\"editbox\" id=\"evidence_name_input_".$i."\">".$rowevidence["evidence_name"]."</textarea>
			</td>
			<td width='15%'><input type=\"button\" id=\"CmdBtn_".$i."\" value=\"บันทึก\" onClick=\"dataManageEvidence(".$i.");\" ></td>
		</tr>";	
	echo"</table>";