<?php include "corelib.php";?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="./TreeMenu.js" language="JavaScript" type="text/javascript"></script>
<style>
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
</style>
<script>
$(document).ready(function(){
  $("#btnKeyPurpose").click(function(){
    $("#KeyPurpose").toggle(1000);
  });
  $("#btnKeyRoles").click(function(){
    $("#KeyRoles").toggle(1000);
  });
  $("#btnKeyFunc").click(function(){
    $("#KeyFunc").toggle(1000);
  });
  $("#btnUnit").click(function(){
    $("#Unit").toggle(1000);
  });
  $("#btnElement").click(function(){
    $("#Element").toggle(1000);
  });
});
</script>
<?php

if($_GET['query1']!="")
    $qterm=$_GET['query1'];
else
    $qterm=$_GET['qterm'];
	
 
	$menu->addItem(genNode("node","",$qterm) );
    
    
    // Create the presentation class
   $treeMenu = &new HTML_TreeMenu_DHTML($menu, array('images' => './images', 'defaultClass' => 'treeMenuDefault'));
?>
<script language="JavaScript" type="text/javascript">
<!--
    a = new Date();
    a = a.getTime();
//-->
</script>
<table style="width: 100%;">
	<tr>
		<td style="padding-left: 50px;">
			<table style="margin: 10px; width: 100%;">
				<tr>
					<td valign="top" align="center" style="width: 200px;">
						<img src="images/tree.png" width="200" id="a"><br>
						<h2>สืบค้นมาตรฐานอาชีพ</h2>
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
													<input type="hidden" name="page" value="search.php">
													<input type="submit" value="Search" style="float: right;">
											    	<input type="reset" value="Cancel" style="float: left;">
											    </td>
											</tr>
											<tr>
												<td colspan="2" align="right"><a href='?page=tree.php' target='_blank'>เพิ่มมาตรฐานอาชีพ</a></td>
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
							<tr>
								<td colspan="2" class="table_footer"></td>
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
					<td width="40%" class="right_solid">
					<?
						//========navigator tree tpqi standard========
						$treeMenu->printMenu()?>
					<!--</font>-->
					</td>
					<td style="padding: 10px;">
					<?
						//=========Result Seaarch group by Function Map ===============
						if(trim($qterm)!=""){
							echo "<h3>Result<h3>";
							//echo"<table id=\"tblKeyPurpose\" border='1' style='margin-left: auto;margin-right: auto;'>";
							echo "<button id=\"btnKeyPurpose\" style=\"width:500px;\"><h3>แสดงความมุ่งหมายหลัก (Key Purpose)</h3></button>";
							echo"<div id=\"KeyPurpose\" >
								<table id=\"tblKeyPurpose\" border='1'>";
							echo "<tr><td colspan='2'><h3>แสดงความมุ่งหมายหลัก (Key Purpose)</h3></td></tr>";
							echo "<tr><td class='table_header'>Code</td><td class='table_header'>ชื่อ(Title)</td></tr>";
							genSearchPurpos($node,"",$qterm);
							echo"</table>
							</div>";
							
							echo "<button id=\"btnKeyRoles\" style=\"width:500px;\"><h3>บทบาทหลัก (Key Roles)</h3></button>";
							echo"<div id=\"KeyRoles\" >
								<table id=\"tblKeyRoles\" border='1'>";
							echo "<tr><td colspan='2'><h3>บทบาทหลัก (Key Roles)</h3></td></tr>";
							echo "<tr><td class='table_header'>บทบาทหลัก (Key Roles)</td><td class='table_header'>หน้าที่หลัก(Key Functions)</td></tr>";
							genSearchRole($node,"",$qterm);
							echo"</table>
							</div>";
							echo "<button id=\"btnKeyFunc\" style=\"width:500px;\"><h3>หน้าที่หลัก (Key Functions)</h3></button>";
							echo"<div id=\"KeyFunc\" >
								<table id=\"tblKeyFunc\" border='1'>";
							echo "<tr><td colspan='2'><h3>หน้าที่หลัก (Key Functions)</h3></td></tr>";
							echo "<tr><td class='table_header'>หน้าที่หลัก (Key Functions)</td><td class='table_header'>หน่วยสมรรถนะ (Units of Competence)</td></tr>";
							genSearchFunc($node,"",$qterm);
							echo"</table>
							</div>";
							
							echo "<button id=\"btnUnit\"  style=\"width:500px;\"><h3>หน่วยสมรรถนะ (Units of Competence)</h3></button>";
							echo"<div id=\"Unit\" >
								<table id=\"tblUnit\" border='1'>";
							echo "<tr><td colspan='2'><h3>หน่วยสมรรถนะ (Units of Competence)</h3></td></tr>";
							echo "<tr><td class='table_header'>หน่วยสมรรถนะ (Units of Competence)</td><td class='table_header'>สมรรถนะย่อย(Element of Competence)</td></tr>";
							genSearchUnit($node,"",$qterm);
							echo"</table>
							</div>";
							
							echo "<button id=\"btnElement\"  style=\"width:500px;\"><h3>สมรรถนะย่อย(Element of Competence)</h3></button>";
							echo"<div id=\"Element\" >
								<table id=\"tblElement\" border='1'>";
							echo "<tr><td colspan='2'><h3>สมรรถนะย่อย(Element of Competence)</h3></td></tr>";
							echo "<tr><td class='table_header'>Code</td><td class='table_header'>สมรรถนะย่อย(Element of Competence)</td></tr>";
							genSearchElement($node,"",$qterm);
							echo"</table>
							</div>";
						}
					?>
					</td>
				</tr>
				<tr>
					<td colspan="2" class="table_footer"></td>
				</tr>
			</table>
						
			<br>
		</td>
	</tr>
</table>


<script language="JavaScript" type="text/javascript">
<!--
    b = new Date();
    b = b.getTime();
	var rowCountPurpose = $('#tblKeyPurpose tr').length-2;
	var rowCountRole = $('#tblKeyRoles tr').length-2;
	var rowCountFuc = $('#tblKeyFunc tr').length-2;
	var rowCountUnit = $('#tblUnit tr').length-2;
	var rowCountElement = $('#tblElement tr').length-2;
	//alert("Role:="+rowCountRole +" Func:="+ rowCountFuc+" Unit:="+ rowCountUnit);
	$("#btnKeyPurpose h3").text("แสดงความมุ่งหมายหลัก (Key Purpose) haved :" + rowCountPurpose);
	$("#btnKeyRoles h3").text("บทบาทหลัก (Key Roles) haved :" + rowCountRole);
	$("#btnKeyFunc h3").text("หน้าที่หลัก (Key Functions) haved :" + rowCountFuc);
	$("#btnUnit h3").text("หน่วยสมรรถนะ (Units of Competence) haved :" + rowCountUnit);
	$("#btnElement h3").text("สมรรถนะย่อย(Element of Competence) haved :" + rowCountElement);
	$("#KeyPurpose").toggle();
	$("#KeyRoles").toggle();
    $("#KeyFunc").toggle();
    $("#Unit").toggle();
    $("#Element").toggle();
   // document.write("Time to render tree: " + ((b - a) / 1000) + "s");
//-->
</script>