<?php
	header("Cache-Control: no-cache, must-revalidate");
	$keyrole=$_POST["keyrole"];
	//include "common.php";

	echo"<table border='1' class='noSpacing' style='margin-left:auto;margin-right: auto;margin-top: 5px;width:1000px'>
		<tr>
			<td width='180'>หน้าที่หลัก <br>(Key Functions) :</td>";
		$sqlUnit="select term, detail, ident from ontology where parent='".trim($keyrole)."'";
		//echo $sqlUnit;
		$rUnit=mysql_query($sqlUnit)or die(mysql_error()."<br>".$sqlUnit);
		echo"<td>";
		?>
				<select name="keyfunction" id="keyfunction" 
				onchange="
					$.post('unitDIV.php',{
						keyfunction: $('#keyfunction').val()
						},function(data){
							$('#unitDIV').html(data);
						}
					)
				">
	
		<?
				echo"<option value=''>เลือก Key Functions</option>";
				while($rowUnit=mysql_fetch_array($rUnit)):
					//$chkicon=countParent($ar['parent']);
					//if($chkicon==4){
						echo"<option value='".$rowUnit["ident"]."'>".$rowUnit["term"]." ".$rowUnit["detail"]."</option>";
					//}
				endwhile;
				echo"</select>";
		echo"</td>
		</tr>
	</table>";