<?
//ผลการประเมิน 110
?>
<script type="text/javascript" src="./js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	var ID;
	$(".edit_tr").click(function(){
		ID=$(this).attr('id');
		$("#key_func_code_"+ID).hide();
		$("#level_"+ID).hide();
		$("#levelname_"+ID).hide();
		$("#level_input_"+ID).show();
		$("#levelname_input_"+ID).show();
		$("#key_func_code_input_"+ID).show();
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
	var key_func_code=$("#key_func_code_input_"+ID).val();
	var level=$("#level_input_"+ID).val();
	var levelname=$("#levelname_input_"+ID).val();
	var dataString = 'leveldetailid='+leveldetailid+'&key_func_code='+key_func_code+'&levelname='+levelname+'&levelid='+level;
	if($("#level_input_"+ID).val().length>0 && $("#levelname_input_"+ID).val().length>0){
		alert(dataString);
		$.ajax({
			type: "POST",
			url: "levelconfigCmd.php",
			data: dataString,
			cache: false,
							
			success: function(html){
				$("#key_func_code_"+ID).html(key_func_code);
				$("#level_"+ID).html(level);
				$("#levelname_"+ID).html(levelname);
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
	.editbox{
		display:none
	}
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

<table style="width: 100%;">
	<tr>
		<td valign="top" align="center" style="width: 250px;">
			<img src="images/setting.png" width="200"><br>
			<h2>ระดับมาตรฐานอาชีพ</h2>
		</td>
		<td>
			<?

				$sql="select level_name.*, detail 
					from level_name,ontology 
					where level_name.key_func_code=ontology.term
					and level_name.key_func_code='๑๐๑' and parent=2
					order by key_func_code, levelid";
				$r=mysql_query($sql)or die(mysql_error()."<br>".$sql);
				echo"<table class='noSpacing table_01' style='margin-left: auto;margin-right: auto;margin-top: 5px;'>
						<tr><td colspan='4' align='center' class='table_header table_topRadius'><h3>กำหนดระดับคุณวุฒิวิชาชีพ ของ <u>การผลิตเครื่องประดับและอัญมณี</u></h3></td><tr>
						<tr>
							<td rowspan='1' class='table_subHeader'>หน้าที่หลักและชื่อหน่วยสมรรถนะ<br>(Key Functions and Title)</td>
							<td rowspan='1' class='table_subHeader'>ระดับคุณวุฒิวิชาชีพ</td>
							<td colspan='1' class='table_subHeader'>คุณวุฒิวิชาชีพ</td>
							<td colspan='1' class='table_subHeader'>&nbsp;</td>
						</tr>";
				$i=1;		
				while($row=mysql_fetch_array($r)):
					$level=	$row["levelid"];
					if(trim($level)==""){	
						$level="&nbsp;";
					}else{
						$level=	"ระดับ ".$row["levelid"];
					}
					echo "<tr id=".$i." class=\"edit_tr\">";
							$qs="SELECT * FROM   ontology  where CHARACTER_LENGTH(term) = 3 and parent=2 ORDER BY term";
							$rc=mysql_query($qs);
							echo"<td class='edit_td right_dashed bottom_solid'>
								<span id=\"key_func_code_".$i."\" class=\"text\">".$row["detail"]."</span>
								<select class=\"editbox\" id=\"key_func_code_input_".$i."\">";
									echo"<option value=\"\">-เลือก Key Function-</option>";
									while($ar = mysql_fetch_array($rc)){
										$selected="";
										if($ar["term"]==$row["key_func_code"])$selected="selected";
										echo"<option value=\"".$ar["term"]."\" ".$selected.">".$ar["detail"]."</option>";
									}
									echo"</select>
								</td>";
						
							echo"<td class='edit_td right_dashed bottom_solid'>
								<input type='hidden' id='leveldetailid_".$i."' name='leveldetailid_".$i."' value='".$row["leveldetailid"]."'>
								<span id=\"level_".$i."\" class=\"text\">".$level."</span>
								<select class=\"editbox\" id=\"level_input_".$i."\">";
									echo"<option value=\"\">-เลือกระดับ-</option>";
									for($l=1;$l<=9;$l++){
										$selected="";
										if($l==$row["levelid"])$selected="selected";
										echo"<option value=\"".$l."\" ".$selected.">ระดับ ".$l."</option>";
									}
									echo"</select>
							</td>
							<td class='edit_td bottom_solid right_dashed'>
								<span id=\"levelname_".$i."\" class=\"text\">".$row["levelname"]."</span>
								<input type=\"text\" class=\"editbox\" id=\"levelname_input_".$i."\" size='30' maxlength='30' value=\"".$row["levelname"]."\">
							</td>
							<td class='bottom_solid'><input type=\"button\" id=\"CmdBtn_".$i."\" value=\"บันทึก\" onClick=\"dataManage(".$i.");\" ></td>
						</tr>";
						$i++;
				endwhile;
					echo "<tr id=".$i." class=\"edit_tr\">";
							$qs="SELECT * FROM   ontology  where CHARACTER_LENGTH(term) = 3 and parent=2 ORDER BY term";
							$rc=mysql_query($qs);
							echo"<td class=\"edit_td\">
								<span id=\"key_func_code_".$i."\" class=\"text\">".$row["detail"]."</span>
								<select class=\"editbox\" id=\"key_func_code_input_".$i."\">";
									echo"<option value=\"\">-เลือก Key Function-</option>";
									while($ar = mysql_fetch_array($rc)){
										$selected="";
										if($ar["term"]==$row["key_func_code"])$selected="selected";
										echo"<option value=\"".$ar["term"]."\" ".$selected.">".$ar["detail"]."</option>";
									}
									echo"</select>
								</td>";
						
							echo"<td class=\"edit_td\">
								<input type='hidden' id='leveldetailid_".$i."' name='leveldetailid_".$i."' value='".$row["leveldetailid"]."'>
								<span id=\"level_".$i."\" class=\"text\">".$level."</span>
								<select class=\"editbox\" id=\"level_input_".$i."\">";
									echo"<option value=\"\">-เลือกระดับ-</option>";
									for($l=1;$l<=9;$l++){
										$selected="";
										if($l==$row["level"])$selected="selected";
										echo"<option value=\"".$l."\" ".$selected.">ระดับ ".$l."</option>";
									}
									echo"</select>
							</td>
							<td class=\"edit_td\">
								<span id=\"levelname_".$i."\" class=\"text\">".$row["levelname"]."</span>
								<input type=\"text\" class=\"editbox\" id=\"levelname_input_".$i."\" size='30' maxlength='30' value=\"".$row["levelname"]."\">
							</td>
							<td><input type=\"button\" id=\"CmdBtn_".$i."\" value=\"บันทึก\" onClick=\"dataManage(".$i.");\" ></td>
						</tr>";
				echo "<tr><td class='table_footer' colspan='4'></td></tr>";
				echo"</table>";
				?>
		</td>
	</tr>
</table>