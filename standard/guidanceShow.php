<?php
echo"<table class='noSpacing' style='margin-left:auto;margin-right: auto;margin-top: 5px;width:1000px'>
		<tr>
			<td colspan='3'><h3><u>แนวทางการประเมินสำหรับผู้ประเมินสมรรถนะย่อยนี้ (Guidance to Assessors of Element)</u></h3></td>
		</tr>";
		$sqlguidance_asm="select guidance_asm_detail_id, guidance_asm_name, element_id 
					from guidance_detail 
					where element_id='".trim($element)."'";
		$rguidance_asm=mysql_query($sqlguidance_asm)or die(mysql_error()."<br>".$sqlguidance_asm);
		$i=1;
		while($rowguidance_asm=mysql_fetch_array($rguidance_asm)):
		echo "<tr id=".$i." class=\"edit_guidance_asm\" valign='top'>
			<td width='10%'>&nbsp;</td>
			<td width='5%'>".$i."</td>
			<td><div style='width:750px'>".$rowguidance_asm["guidance_asm_name"]."</div></td>
		</tr>";
		$i++;
		endwhile;
	echo"</table>";