<?php
	if($_GET["unit_competence"]!="")$unit_competence=$_GET["unit_competence"];
	$sqlunit="SELECT term, detail FROM   ontology where ident=".$unit_competence;
	$runit=mysql_query($sqlunit)or die(mysql_error()."<br>".$sqlunit);
	$rowunit=mysql_fetch_array($runit);
	echo "<table class='table_01'  id=\"tblElement\" style='margin-left:auto;margin-right: auto;margin-top: 5px;width:1000px'>";
	echo"<tr><td colspan='3'><a name='".$rowunit["term"]."'/>";
	echo"<table class='noSpacing' style='margin-left:auto;margin-right: auto;margin-top: 5px;width:1000px'>";
		echo"<tr>
				<td colspan='3'><h3>".$unitNo.") ".$rowunit["term"]."&nbsp;&nbsp;".$rowunit["detail"]."</h3></td>
			</tr>";
		echo "<tr>
				<td colspan='2'>เนื้อหา (Content)</td><td>&nbsp;</td>
			</tr>";
		//echo"<tr><td>";
					//genSearchUnit($node,"",$rowunit["term"]);
				$sqlElement="SELECT term, detail FROM   ontology where parent=".$unit_competence;
				$rElement=mysql_query($sqlElement);
				while($rowElement=mysql_fetch_array($rElement)):
				echo "<tr><td>&nbsp;&nbsp;&nbsp;</td><td>สมรรถนะย่อย(Element of Competence): &nbsp;".$rowElement["term"]."&nbsp;&nbsp;".$rowElement["detail"]."</td><td>&nbsp;</td></tr>";
				endwhile;
		echo"
		</table>";
	echo"</td></tr>";
	echo"<tr><td width='30%'></td><td colspan='2' width='70%'>";	
	$sqlElement="SELECT ident FROM   ontology where parent=".$unit_competence;
	$rElement=mysql_query($sqlElement);
	$e=1;
	while($rowElement=mysql_fetch_array($rElement)):
		$element=$rowElement[0];
		echo "<table class='noSpacing'  id=\"tblElement\">";
		echo"<tr><td colspan='3'>&nbsp;</td></tr>";
		$sqlelement="select term,detail from ontology where ident=".$element;
		$r=mysql_query($sqlelement);
		$row=mysql_fetch_array($r);
		echo "<tr><td width='15%'>&nbsp;&nbsp;&nbsp;</td><td colspan='2' width='85%'><h3>".$unitNo.".".$e." สมรรถนะย่อย(Element of Competence)".$row["term"]."&nbsp;&nbsp;".$row["detail"]."</h3></td></tr>";
		echo"<tr><td >&nbsp;</td><td colspan='2'>";
		include"performanceShow.php";
		echo"</td></tr>";
		echo"<tr><td >&nbsp;&nbsp;&nbsp;</td><td colspan='2'>";
		include"rangeShow.php";
		echo"</td></tr>";
		echo"<tr><td >&nbsp;</td><td colspan='2'>";
		include"evidenceShow.php";
		echo"</td></tr>";
		echo"<tr><td >&nbsp;</td><td colspan='2'>";
		include"guidanceShow.php";
		echo"</td></tr>";
		echo"<tr><td colspan='3' align='right'>[<a href='#top'>Top</a>]&nbsp;&nbsp;&nbsp;</td></tr>";
		echo"</table>";
		$e++;
	endwhile;
	echo"</td></tr>
	</table>";
?>