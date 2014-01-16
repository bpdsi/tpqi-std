<?php
	header("Cache-Control: no-cache, must-revalidate");
?>
<script type="text/javascript">
function listFunction(){
	dataListPerformance($('#element').val());
	dataListRange($('#element').val());
}
function dataListPerformance(element_id){
	$.post('performanceDIV.php',{
		element: element_id
	},function(data){
		$('#performanceDIV').html(data);
		}
	)
}
function dataListRange(element_id){
	$.post('rangeDIV.php',{
		element: element_id
	},function(data){
		$('#rangeDIV').html(data);
		}
	)
}
</script>
<?
	$unitcompentence=$_POST["unitcompentence"];
	include "common.php";

	echo"<table  border='1' class='noSpacing' style='margin-left:auto;margin-right: auto;margin-top: 5px;width:1000px'>
		<tr>
			<td width='180'>สมรรถนะย่อย <br>(Element) :</td>";
		$sqlUnit="select term, detail, ident from ontology where parent='".trim($unitcompentence)."'";
		//echo $sqlUnit;
		$rUnit=mysql_query($sqlUnit)or die(mysql_error()."<br>".$sqlUnit);
		echo"<td>
			<select name=\"element\" id=\"element\" onchange=\"listFunction();\">
				<option value=''>เลือก Units</option>";
				while($rowUnit=mysql_fetch_array($rUnit)):
					echo"<option value='".$rowUnit["ident"]."'>".$rowUnit["term"]." ".$rowUnit["detail"]."</option>";
				endwhile;
				echo"</select>";
		echo"</td>
		</tr>
	</table>";