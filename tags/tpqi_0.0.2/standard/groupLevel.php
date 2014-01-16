<?
include "../function/functionPHP.php";
$std_id=$_POST["std_id"];
$levelid=$_POST["levelid"];

	$sqlStd="SELECT term, detail,levelid,levelname FROM ontology,level_name 
			where  ontology.ident=level_name.std_id 
					and ident=".$std_id."
					and levelid=".$levelid;
	$rStd=mysql_query($sqlStd);
	$rowStd=mysql_fetch_array($rStd);
	echo "<table  class='table_01' border=1>";
	echo'<tr><td colspan="2"><h3>รายละเอียดของคุณวุฒิ</h3></td></tr>
			<tr><th align="left">ชื่อคุณวุฒิ</th><td>คุณวุฒิวิชาชีพระดับ '.$rowStd["levelid"].'  '.$rowStd["levelname"].'</td></tr>
			<tr><th align="left">หน่วยรับรองคุณวุฒิ</th><td>สถาบันคุณวุฒิวิชาชีพ </td></tr>
			<tr><th align="left">วันเริ่มต้นการรับรอง</th><td>00-00-0000</td></tr>
			<tr><th align="left">วันสิ้นสุดการรับรอง</th><td>00-00-0000</td></tr>
			<tr><th align="left">ประเภทของภาคอาชีพ/สาขาวิชา</th><td>&nbsp;</td></tr>
			<tr><th align="left">ประเภทของภาคย่อยอาชีพ/สาขาวิชา</th><td>&nbsp;</td></tr>
			<tr><th align="left">โครงสร้าง</th><td>ผู้สมัครเข้ารับคุณวุฒิจะต้องได้รับการประเมินผ่านจำนวน ';
	$sqlLVCount="SELECT * FROM level_competence where std_id=".$std_id."
					and level=".$levelid;
	$rLVCount=mysql_query($sqlLVCount)or die(mysql_error()."<br>".$sqlLVCount);
	$unitCount=0;
	$unitName="";
	while($rowLVCount=mysql_fetch_array($rLVCount)):
		$unitCount++;
		$sqlUname="SELECT term, detail FROM ontology where ident=".$rowLVCount["unit_competence"];
		$rUname=mysql_query($sqlUname)or die(mysql_error()."<br>".$sqlUname);
		$rowUname=mysql_fetch_array($rUname);
		
		$unitName.="<tr><td  align='right'>".$rowUname["term"]."</td><td>".$rowUname["detail"]."</td></tr>";
	endwhile;
		echo $unitCount." หน่วย</td></tr>
		<tr><th align='left'>ส่วนประกอบของโครงร่าง</th><td>ประกอบด้วยหน่วยดังนี้</td></tr>
			".$unitName."
	</table>";

?>