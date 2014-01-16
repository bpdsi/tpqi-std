<?php
	echo"<table class='noSpacing' style='margin-left:auto;margin-right: auto;margin-top: 5px;width:1000px'>
		<tr>
			<td colspan='3'><h3>หลักฐานที่ต้องการ (Evidence Requirements)</h3></td>
		</tr>";
		$sqlevidence_type1="SELECT evidence_type, evidence_type_name FROM   evidence_type where evidence_type=1";
		$revidence_type1=mysql_query($sqlevidence_type1);
		$rowevidence_type1=mysql_fetch_array($revidence_type1);
		echo"<tr>
				<td colspan='3'><h3><u>".$rowevidence_type1["evidence_type_name"]."</u></h3></td>
			</tr>";
		$sqlevidence="select evidence_detail_id, evidence_group_id, evidence_name, element_id, 
					evidence_detail.evidence_type, evidence_type_name 
					from evidence_detail ,evidence_type 
					where evidence_detail.evidence_type=evidence_type.evidence_type and element_id='".trim($element)."'
					and evidence_detail.evidence_type=1";
		$revidence=mysql_query($sqlevidence)or die(mysql_error()."<br>".$sqlevidence);
		$i=1;
		while($rowevidence=mysql_fetch_array($revidence)):
			echo "<tr id=".$i." class=\"edit_evidence\" valign='top'>
			<td width='10%'>&nbsp;</td>
			<td width='5%'>".$i."</td>
			<td class=\"edit_td\">
				<span id=\"evidence_name_".$i."\" class=\"text\"><pre>".$rowevidence["evidence_name"]."</pre></span>
			</td>
		</tr>";
		$i++;
		endwhile;
		$i++;
		$sqlevidence_type2="SELECT evidence_type, evidence_type_name FROM   evidence_type where evidence_type=2";
		$revidence_type2=mysql_query($sqlevidence_type2);
		$rowevidence_type2=mysql_fetch_array($revidence_type2);
		echo"<tr>
				<td colspan='3'><h3><u>".$rowevidence_type2["evidence_type_name"]."</u></h3></td>
			</tr>";
		$sqlevidence="select evidence_detail_id, evidence_group_id, evidence_name, element_id, 
					evidence_detail.evidence_type, evidence_type_name 
					from evidence_detail ,evidence_type 
					where evidence_detail.evidence_type=evidence_type.evidence_type and element_id='".trim($element)."'
					and evidence_detail.evidence_type=2";
		$revidence=mysql_query($sqlevidence)or die(mysql_error()."<br>".$sqlevidence);
		$no=1;
		while($rowevidence=mysql_fetch_array($revidence)):
			echo "<tr id=".$i." class=\"edit_evidence\" valign='top'>
			<td width='10%'>&nbsp;</td>
			<td width='5%'>".$no."</td>
			<td class=\"edit_td\">
				<span id=\"evidence_name_".$i."\" class=\"text\"><pre>".$rowevidence["evidence_name"]."</pre></span>
			</td>
		</tr>";
		$i++;
		$no++;
		endwhile;
	echo"</table>";