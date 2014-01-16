<?
$term=$_GET["term"];
//require_once('TreeMenu.php');
$table = "ontology";        /* database table working on */

$icon         = 'folder.gif';
$expandedIcon = 'folder-expanded.gif';
 


	$menu  = new HTML_TreeMenu();
	global $mytree;
	$mytree = new php_tree();
	$show_db_identifier="1";

	// show sql-statements, 1=true, 0=false
	$debug="0";


	// define client / mandant
	$gui=$_GET['gui'];
	if($gui=="") $gui=$_POST['gui'];
	if (!isset($gui)) { $gui = "999"; }
	$mode = "3";
	$mytree->set_parameters($gui,$mode,$db,$table,$show_db_identifier,$debug);


 
	
?>


<script language="JavaScript" type="text/javascript">
<!--
    a = new Date();
    a = a.getTime();
//-->
</script>
<table style="margin: 10px;width: 100%;">
	<tr>
		<td align="center" style="width: 400px;">
			<img src="images/document.png" width="200"><br>
			<h3>สร้างเอกสารมาตรฐานอาชีพ</h3>
		</td>
		<td align="right">
			<form name="termsearch" action="index.php" method="GET">
				<table class="table_01">
					<tr>
						<td class="table_header table_topRadius"><h3>สืบค้นมาตรฐานอาชีพ</h3></td>
					</tr>
					<tr>
						<td style="padding: 10px;">
							<input type="hidden" name="page" value="menu.php">
							<table cellspacing="0" cellpadding="0" style="margin-left: auto;">
								<tr>
								    <td>Keyword &nbsp;</td>
								    <td>
								    	<input type="text" name="qterm" value="<?echo $qterm;?>" >
								    	
								    </td>
								</tr>
								<tr>
								    <td></td>
								    <td>
								    	
								    	<a href='?page=tree.php' target='_self' style="float: right;">เพิ่มมาตรฐานอาชีพ</a>
								    </td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td class="table_footer">
							<input type="reset" value="Cancel" style="float: left;">
							<input type="submit" value="Search" style="float: right;">
						</td>
					</tr>
				</table>
			</form>
			<table bgcolor="#fff" cellpadding="0" cellspacing=0 style="border:1px solid black;margin-left: auto;margin-right: auto;display: none;">
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
	echo"<table class='table_01' style='margin-left: auto;margin-right: auto;width: 100%'>";
	gentree($node,$branches,$termmesh);
	echo "<tr><td class='table_footer' colspan='3'></td></tr>";
	echo"</table>";
	echo"<br><br><table class='table_01'>";
	gentreeL2($node,$branches,$termmesh);
	echo "<tr><td class='table_footer' colspan='3'></td></tr>";
	echo"</table>";
?>
<!-- </font> -->