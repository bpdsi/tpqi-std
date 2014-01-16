<?php
	echo"<table class='noSpacing' style='margin-left:auto;margin-right: auto;margin-top: 5px;width:1000px'>
		<tr>
			<td colspan='4'><h3><u>ขอบเขต (Range Statement)</u></h3></td></tr>";
		$sqlrange="select range_detail_id, range_group_id, range_name, element_id from range_detail where element_id='".trim($element)."'";
		$rrange=mysql_query($sqlrange)or die(mysql_error()."<br>".$sqlrange);
		$i=1;
		while($rowrange=mysql_fetch_array($rrange)):
			echo "<tr id=".$i." class=\"edit_range\"valign='top'>
			<td width='10%'>&nbsp;</td>
			<td width='5%'>".$i."</td>
			<td class=\"edit_td\">
				<span id=\"range_name_".$i."\" class=\"text\"><pre>".$rowrange["range_name"]."</pre></span>
			</td>
		</tr>";
		$i++;
		endwhile;
	echo"</table>";