<?php
	/*header("Cache-Control: no-cache, must-revalidate");
	include "common.php";*/

	echo"<table border='1' class='noSpacing' style='margin-left:auto;margin-right: auto;margin-top: 5px;width:1000px'>
		<tr>
			<td width='180'>ความมุ่งหมายหลัก <br>(Key Purpose) :</td>";
		$sqlUnit="select term, detail, ident from ontology where parent=-1";
		//echo $sqlUnit;
		$rUnit=mysql_query($sqlUnit)or die(mysql_error()."<br>".$sqlUnit);
		echo"<td>";
		?>
				<select name="keypurpose" id="keypurpose" 
				onchange="
					$.post('keyroleDIV.php',{
						keypurpose: $('#keypurpose').val()
						},function(data){
							$('#keyroleDIV').html(data);
						}
					)
				">
	
		<?
				echo"<option value=''>เลือก Key Purpose</option>";
				while($rowUnit=mysql_fetch_array($rUnit)):
						echo"<option value='".$rowUnit["ident"]."'>".$rowUnit["term"]." ".$rowUnit["detail"]."</option>";
				endwhile;
				echo"</select>";
		echo"</td>
		</tr>
	</table>";