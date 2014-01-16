<?php
	header("Cache-Control: no-cache, must-revalidate");
	$keyfunction=$_POST["keyfunction"];
	include "common.php";

	echo"<table border='1' class='noSpacing' style='margin-left:auto;margin-right: auto;margin-top: 5px;width:1000px'>
		<tr>
			<td width='180'>หน่วยสมรรถนะ<br> (Element) :</td>";
		$sqlUnit="select term, detail, ident from ontology where parent='".trim($keyfunction)."'";
		//echo $sqlUnit;
		$rUnit=mysql_query($sqlUnit)or die(mysql_error()."<br>".$sqlUnit);
		echo"<td>";
		?>
				<select name="unitcompentence" id="unitcompentence" 
				onchange="
					$.post('elementDIV.php',{
						unitcompentence: $('#unitcompentence').val()
						},function(data){
							$('#elementDIV').html(data);
						}
					)
				">
	
		<?
				echo"<option value=''>เลือก Units</option>";
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