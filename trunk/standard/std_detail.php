<?php
	$std_id=$_GET["std_id"];
	$levelid=$_GET["levelid"];
	/*$sqlStd="SELECT term, detail,levelid,levelname FROM ontology,level_name 
			where  ontology.ident=level_name.std_id 
					and ident=".$std_id."
					and levelid=".$levelid;
	$rStd=mysql_query($sqlStd);
	$rowStd=mysql_fetch_array($rStd);
	echo"<h3>".$rowStd["term"].":".$rowStd["detail"]."</h3>";
	echo"<h3>คุณวุฒิวิชาชีพระดับ ".$rowStd["levelid"]."  ".$rowStd["levelname"]."</h3><a name='top'/>";
	echo "<table class='table_01'  id=\"tblElement\" style='margin-left:auto;margin-right: auto;margin-top: 5px;width:1000px'>
			<tr><td><h4>Modification History</h4></td></tr>
			<tr><td>------</td></tr>
			<tr><td><h4>Description</h4></td></tr>
			<tr><td>------</td></tr>
			<tr><td>Occupational titles for these workers may include:</td><tr>
			<tr><td>------</td></tr>
			<tr><td><h4>Packaging Rules</h4></td></tr>";*/
	echo "<table class='table_01'  id=\"tblElement\" style='margin-left:auto;margin-right: auto;margin-top: 5px;width:1000px'>
	<tr><td width='10%'><a name='top'/>&nbsp;</td><td>";
	levelTable($std_id, $levelid);
	echo"</td></tr>";	
	/*$sqlLVCount="SELECT * FROM level_competence where std_id=".$std_id."
					and level=".$levelid;
	$rLVCount=mysql_query($sqlLVCount)or die(mysql_error()."<br>".$sqlLVCount);
	$unitCount=0;
	$unitName="";
	while($rowLVCount=mysql_fetch_array($rLVCount)):
		$unitCount++;
		$sqlUname="SELECT term, detail FROM ontology where ident=".$rowLVCount["unit_competence"];
		$rUname=mysql_query($sqlUname)or die(mysql_error()."<br>".$sqlUname);
		$rowUname=mysql_fetch_array($rUname);
		if($unitName!="")$unitName.="<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$unitCount.") <a href='#".$rowUname["term"]."'>".$rowUname["term"].":".$rowUname["detail"]."</a>";
		else $unitName.="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$unitCount.") <a href='#".$rowUname["term"]."'>".$rowUname["term"].":".$rowUname["detail"]."</a>";
	endwhile;
			echo "<tr><td>".$unitCount." Units</td></tr>
			<tr><td>".$unitName."</td></tr>
	</table>";*/
	$sqlLVList="SELECT * FROM level_competence where std_id=".$std_id."
					and level=".$levelid;
	$rLVList=mysql_query($sqlLVList);
	$unitNo=0;
	while($rowLVList=mysql_fetch_array($rLVList)):
		$unitNo++;
		$unit_competence=$rowLVList["unit_competence"];
		include"unit_detail.php";
	endwhile;
	
	
function levelTable($std_id, $levelid){
	$sqlStd="SELECT term, detail,levelid,levelname FROM ontology,level_name 
			where  ontology.ident=level_name.std_id 
					and ident=".$std_id."
					and levelid=".$levelid;
	$rStd=mysql_query($sqlStd);
	$rowStd=mysql_fetch_array($rStd);
	echo "<table border=1>";
	echo'<tr><td colspan="2"><h3>รายละเอียดของคุณวุฒิ</h3></td></tr>
			<tr><td>ชื่อคุณวุฒิ</td><td>คุณวุฒิวิชาชีพระดับ '.$rowStd["levelid"].'  '.$rowStd["levelname"].'</td></tr>
			<tr><td>หน่วยรับรองคุณวุฒิ</td><td>สถาบันคุณวุฒิวิชาชีพ </td></tr>
			<tr><td>วันเริ่มต้นการรับรอง</td><td>00-00-0000</td></tr>
			<tr><td>วันสิ้นสุดการรับรอง</td><td>00-00-0000</td></tr>
			<tr><td>ประเภทของภาคอาชีพ/สาขาวิชา</td><td>&nbsp;</td></tr>
			<tr><td>ประเภทของภาคย่อยอาชีพ/สาขาวิชา</td><td>&nbsp;</td></tr>
			<tr><td>โครงสร้าง</td><td>ผู้สมัครเข้ารับคุณวุฒิจะต้องได้รับการประเมินผ่านจำนวน ';
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
		
		$unitName.="<tr><td align='right'>".$rowUname["term"]."</td><td><a href='#".$rowUname["term"]."'>".$rowUname["detail"]."</a></td></tr>";
	endwhile;
		echo $unitCount." หน่วย</td></tr>
		<tr><td>ส่วนประกอบของโครงร่าง</td><td>ประกอบด้วยหน่วยดังนี้</td></tr>
			".$unitName."
	</table>";
}	
?>