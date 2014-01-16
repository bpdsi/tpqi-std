<?php
//ผลการประเมิน 110
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
function getElement(){
	$.post('keyroleDIV.php',{
		keypurpose: $('#keypurpose').val()
		},function(data){
			$('#keyroleDIV').html(data);
			
		}
	)
}
</script>
<style type='text/css'>
.link{
  font-family:tahoma;
  /*font-size:11px;*/
  font-weight:bold;

  color:white;
  text-decoration:none;
}
a span {
	font-size: 20px;
}
 .treeMenuDefault {
	font-style: italic;
}
.treeMenuBold {
	font-style: italic;
    font-weight: bold;
}

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
<?
if($_GET['query1']!="")
    $qterm=$_GET['query1'];
else
    $qterm=$_GET['qterm'];

if($_GET['element']!="")
    $element=$_GET['element'];
else
    $element=$_POST['element'];
	
?>

<table style="width: 100%;">
	<tr>
		<td style="padding-left: 50px;">
			<table style="margin: 10px; width: 100%;">
				<tr>
					<td valign="top" align="center" style="width: 200px;">
						<img src="images/tree.png" width="200" id="a"><br>
						<h2>สืบค้นมาตรฐานอาชีพ (สมรรถนะย่อย)</h2>
					</td>
					<td valign="top">
						<table class="table_01" style="margin-left: auto;width: 600px;">
							<tr>
								<td class="table_header table_topRadius" colspan="2"><h3>มาตรฐานอาชีพ</h3></td>
							</tr>
							<tr>
								<td class="right_solid" style="padding: 10px;">
									<form name="termsearch" action="" method="GET">
										<table cellspacing="0" cellpadding="0" style="width: 100%;">
											<tr>
											    <td>Key word</td>
											    <td style="width: 200px;"><input type="text" name="qterm" value="<?echo $qterm;?>" style="width: 200px;"></td>
											</tr>
											<tr>
											    <td colspan="2">
													<input type="hidden" name="page" value="standard/element_group.php">
													<input type="submit" value="Search" style="float: right;">
											    	<input type="reset" value="Cancel" style="float: left;">
											    </td>
											</tr>
										</table>
									</form>
								</td>
								<td style="padding: 10px;">
									<table bgcolor="#fff" cellpadding="0" cellspacing=0 style="margin-left: auto;margin-right: auto;">
										<tr >
											<td style="padding: 5px 5px 0px 5px;"><img src="./images/P-icon.jpg"></td>
											<td><font color="#000">ความมุ่งหมายหลัก(Key Purpose)</font></td>
										</tr>
										<tr>
											<td style="padding: 5px 5px 0px 5px;"><img src="./images/R-icon.jpg"></td>
											<td><font color="#000">บทบาทหลัก(Key Roles)</font></td>
										</tr>
										<tr>
											<td style="padding: 5px 5px 0px 5px;"><img src="./images/F-icon.jpg"></td>
											<td ><font color="#000">หน้าที่หลัก(Key Functions)</font></td>
										</tr>
										<tr>
											<td style="padding: 5px 5px 0px 5px;"><img src="./images/U-icon.jpg"></td>
											<td><font color="#000">หน่วยสมรรถนะ(Units of Competence)</font></td>
										</tr>
										<tr>
											<td style="padding: 5px 5px 0px 5px;"><img src="./images/E-icon.jpg"></td>
											<td><font color="#000">สมรรถนะย่อย(Element of Competence)</font></td>	
										</tr>	
									</table>
								</td>
							</tr>
							
						</table>
					</td>
				</tr>
			</table>
			<br>
			<!--<font size=2 color=red>-->
			<table class='noSpacingx table_01' style='margin-left:auto;margin-right: auto;margin-top: 5px;width: 100%;'>
				<tr>
					<td class="table_header table_topRadius" colspan="2"><h3>Result</h3></td>
				</tr>
				<tr valign="top">
					<td style="padding: 10px;">
					<?
						//=========Result Seaarch group by Function Map ===============
						if(trim($qterm)!=""){
							echo "Result ";
							echo"<div id=\"Element\" >
								<table id=\"tblElement\" border='1'>";
							echo "<tr><td colspan='2'><h3>สมรรถนะย่อย(Element of Competence)</h3></td></tr>";
							echo "<tr><td class='table_header'>Code</td><td class='table_header'>สมรรถนะย่อย(Element of Competence)</td></tr>";
							genSearchElementList($node,"",$qterm);
							echo"</table>
							</div>";
						}if($element!=""){
							echo"<div id=\"Element\" >
								<table id=\"tblElement\" border='1'>";
							echo "<tr><td colspan='2'><h3>สมรรถนะย่อย(Element of Competence)</h3></td></tr>";
							echo "<tr><td class='table_header'>Code</td><td class='table_header'>สมรรถนะย่อย(Element of Competence)</td></tr>";
							$sqlelement="select term,detail from ontology where ident=".$element;
							$r=mysql_query($sqlelement);
							$row=mysql_fetch_array($r);
							echo "<tr><td>".$row["term"]."</td><td>".$row["detail"]."</td></tr>";
							echo"</table>
							</div>";
							include"performanceDIVcmd.php";
							include"rangeDIVCmd.php";
							include"evidenceDIV.php";
							include"guidanceDIV.php";
							?>
							<!--<div id="performanceDIV"></div>
							<div id="rangeDIV"></div>-->
							<?
						}
					?>
					</td>
				</tr>
				<tr>
					<td colspan="2" class="table_footer"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
</table>