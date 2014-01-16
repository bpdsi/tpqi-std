<?php
	$unit_competence=$_GET["unit_competence"];
	$sqlunit="SELECT term, detail FROM   ontology where ident=".$unit_competence;
	$runit=mysql_query($sqlunit);
	$rowunit=mysql_fetch_array($runit);
	echo"<table class='table_01' style='margin-left:auto;margin-right: auto;margin-top: 5px;width:1000px'>
		<tr>
			<td colspan='2' class='table_header table_topRadius'><h3>ข้อสรุปหน่วย (Unit Summary)</h3></td>
		</tr>";
		echo"<tr>
				<td><h3>หน่วยสมรรถนะ (Unit)</h3></td>
				<td><h3>".$rowunit["term"]."&nbsp;&nbsp;".$rowunit["detail"]."</h3></td>
			</tr>";
		echo "<tr>
				<td colspan='2'>เนื้อหา (Content)</td>
			</tr>";
		//echo"<tr><td>";
					//genSearchUnit($node,"",$rowunit["term"]);
				$sqlElement="SELECT term, detail FROM   ontology where parent=".$unit_competence;
				$rElement=mysql_query($sqlElement);
				while($rowElement=mysql_fetch_array($rElement)):
				echo "<tr><td>&nbsp;&nbsp;&nbsp;</td><td>สมรรถนะย่อย(Element of Competence): &nbsp;".$rowElement["term"]."&nbsp;&nbsp;".$rowElement["detail"]."</td></tr>";
				endwhile;
		echo"
		</table><br>";
		
	$sqlElement="SELECT ident FROM   ontology where parent=".$unit_competence;
	$rElement=mysql_query($sqlElement);
	$e=1;
	while($rowElement=mysql_fetch_array($rElement)):
		$element=$rowElement[0];
		echo "<table class='table_01'  id=\"tblElement\" >";
		echo"<tr><td >&nbsp;</td></tr>";
		$sqlelement="select term,detail from ontology where ident=".$element;
		$r=mysql_query($sqlelement);
		$row=mysql_fetch_array($r);
		echo "<tr><td colspan='2'><h3>".$e.". สมรรถนะย่อย(Element of Competence)".$row["term"]."&nbsp;&nbsp;".$row["detail"]."</h3></td></tr>";
		echo"<tr><td colspan='2'>";
		include"performanceShow.php";
		echo"</td></tr>";
		echo"<tr><td colspan='2'>";
		include"rangeShow.php";
		echo"</td></tr>";
		echo"<tr><td colspan='2'>";
		include"evidenceShow.php";
		echo"</td></tr>";
		echo"<tr><td colspan='2'>";
		include"guidanceShow.php";
		echo"</td></tr>";
		echo"</table>";
		echo"<table>";
		echo"<tr><td colspan='2'>&nbsp;</td></tr>";
		echo"</table>";
		$e++;
	endwhile;
?>