<?php
	echo"<table class='noSpacing'  style='margin-left:auto;margin-right: auto;margin-top: 5px;width:1000px'>
		<tr>
			<td colspan='4'><h3><u>เกณฑ์การปฏิบัติงาน (Performance Criteria,PC)</u></h3></td></tr>";
		$sql="select performance_detail_id, performance_group_id, performance_criteria, element_id from performance_detail where element_id='".trim($element)."'";
		$r=mysql_query($sql)or die(mysql_error()."<br>".$sql);
		$i=1;
		while($row=mysql_fetch_array($r)):
			echo "<tr id=".$i." class=\"edit_perform\" valign='top'>
			<td width='10%'>&nbsp;</td>
			<td width='5%'>".$i."</td>
			<td class=\"edit_td\">
				<span id=\"performance_criteria_".$i."\" class=\"text\"><pre>".$row["performance_criteria"]."</pre></span>
			</td>
		</tr>";
		$i++;
		endwhile;
	echo"</table>";