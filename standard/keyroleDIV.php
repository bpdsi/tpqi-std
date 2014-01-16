<?php
	header("Cache-Control: no-cache, must-revalidate");
	$keypurpose=$_POST["keypurpose"];
	//include "common.php";

	echo"<table border='1' class='noSpacing' style='margin-left:auto;margin-right: auto;margin-top: 5px;width:1000px'>
		<tr>
			<td width='180'>บทบาทหลัก<br>(Key Roles) :</td>";
		$sqlUnit="select term, detail, ident from ontology where parent='".trim($keypurpose)."'";
		//echo $sqlUnit;
		$rUnit=mysql_query($sqlUnit)or die(mysql_error()."<br>".$sqlUnit);
		echo"<td>";
		?>
				<select name="keyrole" id="keyrole" 
				onchange="
					$.post('keyfuncDIV.php',{
						keyrole: $('#keyrole').val()
						},function(data){
							$('#keyfuncDIV').html(data);
						}
					)
				">
	
		<?
				echo"<option value=''>เลือก Key Roles</option>";
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