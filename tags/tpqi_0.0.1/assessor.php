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
		background:url(edit.png) right no-repeat #ccc;
		cursor:pointer;
	}
</style>

<?php
	$keyFnc=$_GET["keyFnc"];
	$sqlcheck="select count(*) from level_competence where key_func_code='".trim($keyFnc)."'";
	$rcheck=mysql_query($sqlcheck)or die(mysql_error()."<br>".$sqlcheck);
	$rowcheck=mysql_fetch_array($rcheck);
	if($rowcheck[0]<1){
		$sqldata="select term from ontology where parent in(select ident from ontology where term='".$keyFnc."')";
		$rdata=mysql_query($sqldata)or die(mysql_error()."<br>Ready data<br>".$sqldata);
		while($rowdata=mysql_fetch_array($rdata)):
			$sqlinsert="insert into level_competence(key_func_code, unit_competence)values('".trim($keyFnc)."', '".$rowdata["term"]."')";
			$rinsert=mysql_query($sqlinsert)or die(mysql_error()."<br>Ready insert database<br>".$sqlinsert);
		endwhile;
		
	}
	$sql="select level_competence.*, detail from level_competence,ontology where level_competence.unit_competence=ontology.term";
	$r=mysql_query($sql)or die(mysql_error()."<br>".$sql);
?>
<table style="width: 100%;">
	<tr>
		<td valign="top" align="center" style="width: 400px;">
			<img src="images/compareGraph.png" width="350"><br>
			<h2>กำหนดระดับมาตรฐานอาชีพ</h2>
		</td>
		<td>
			<?php
				echo"<table class='noSpacing table_01' style='margin-left:auto;margin-right: auto;margin-top: 5px;border-color: #bbb;background-color: #fff;'>
						<tr>
							<td class='table_header' rowspan='1' style='border-top-left-radius: 5px;padding-left: 10px;'>หน้าที่หลักและชื่อหน่วยสมรรถนะ<br>(Key Functions and Title)</td>
							<td class='table_header' rowspan='1'>เลขที่หน่วย<br>(Unit No)</td>
							<td class='table_header' colspan='1'>หน่วยที่ต้องผ่าน<br>(Unit No)</td>
							<td class='table_header' colspan='1' style='border-top-right-radius: 5px;'>&nbsp;</td>
						</tr>
						<!--<tr>
							<td>ช่างแต่งประกอบ</td>
							<td>ขึ้นรูปเบื้องต้น</td>
						</tr>
						<tr>
							<td>ระดับ 1</td>
							<td>ระดับ 2</td>
						</tr>-->";
				$i=0;
				$sqlfunc="select key_func_code,detail from level_competence,ontology where level_competence.key_func_code=ontology.term";
				$rfunc=mysql_query($sqlfunc)or die(mysql_error()."<br>".$sqlfunc);
				$rowfunc=mysql_fetch_array($rfunc);
				echo "<tr>
						<td class='table_keyFunction' colspan='4'><h3>".$rowfunc["key_func_code"]." ".$rowfunc["detail"]."</h3></td>
					</tr>";
							
				while($row=mysql_fetch_array($r)):
				$i++;
					$level=	$row["level"];
					if(trim($level)==""){	
						$level="&nbsp;";
					}else{
						$level=	"ระดับ ".$row["level"];
					}
					echo "<tr id=".$i." class=\"edit_tr\">
							<td style='padding-left: 20px;' class='right_dashed'><div style='float: left;width: 25px;'>$i.</div><div style='float: left;'>$row[detail]</div></td>
							<td class='right_dashed' align='center'>".$row["unit_competence"]."</td>
							<td class='edit_td right_dashed' align='center'>
								<input type='hidden' id='leveldetailid_".$i."' name='leveldetailid_".$i."' value='".$row["leveldetailid"]."'>
								<input type='hidden' id='key_func_code_".$i."' name='key_func_code_".$i."' value='".$keyFnc."'>
								<input type='hidden' id='unit_competence_".$i."' name='unit_competence_".$i."' value='".$row["unit_competence"]."'>
								<span id=\"level_".$i."\" class=\"text\">".$level."</span>
								<!--<input type=\"text\" value=\"".$row["level"]."\" class=\"editbox\" id=\"level_input_".$i."\">-->
								<select class=\"editbox\" id=\"level_input_".$i."\">";
									echo"<option value=\"\">-เลือกระดับ-</option>";
									for($l=1;$l<=9;$l++){
										$selected="";
										if($l==$row["level"])$selected="selected";
										echo"<option value=\"".$l."\" ".$selected.">ระดับ ".$l."</option>";
									}
									echo"</select>
							</td>
							<td><input type=\"button\" id=\"CmdBtn_".$i."\" value=\"บันทึก\" onClick=\"dataManage(".$i.");\" ></td>
							<!--<td>ระดับ 2</td>-->
						</tr>";
				endwhile;
				echo "<tr><td colspan='4' class='table_footer'></td></tr>";
				echo"</table>"; 
			?>
		</td>
	</tr>
</table>