<?
include "header.php";
include "menu4.php";
include "corelib.php";
$term=$_GET["term"];


 
	
?>


<script language="JavaScript" type="text/javascript">
<!--
    a = new Date();
    a = a.getTime();
//-->
</script>
<table style="margin: 10px;">
	<tr>
		<td valign="top">
			<form name="termsearch" action="menu.php" method="GET">
				<table border=1 cellspacing="0" cellpadding="0">
					<tr>
						<td colspan="2"><h3>ตัวอย่างแบบฟอร์มการลงทะเบียน มาตรฐานอาชีพ</h3></td>
					</tr>
					<tr>
					    <td><font color=blue>key word</font></td>
					    <td><input type="text" name="qterm" value="<?echo $qterm;?>" ></td>
					</tr>
					<tr>
					    <td>
							<input type="submit" value="Search"></td>
					    <td><input type="reset" value="cancel"></td>
					</tr>
					<tr><td><a href='./tree.php' target='_blank'>เพิ่มมาตรฐานอาชีพ</a></td></tr>
				</table>
			</form>
		</td>
		<td>
			<table bgcolor="#fff" cellpadding="0" cellspacing=0 style="border:1px solid black;margin-left: auto;margin-right: auto;">
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

<br>
<!-- <font size=2 color=red> -->
<?//$treeMenu->printMenu()?><br /><br />
<?//$listBox->printMenu()?>
<?
	echo"<table border='1' style='margin-left: auto;margin-right: auto;'>";
	gentree($node,$branches,$termmesh);
	echo"</table>";
	echo"<br><br><table border='1'>";
	gentreeL2($node,$branches,$termmesh);
	echo"</table>";
?>
<!-- </font> -->