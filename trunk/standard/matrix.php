<style type="text/css">
	th { 
		padding: .3em; border: 1px #ccc solid; 
		font-family: "TH SarabunPSK","sans-serif"; 
		font-size: 14pt;
		color:white;
	}
	/*TD{
		padding: .3em; border: 1px #ccc solid; 
		font-family: "TH SarabunPSK","sans-serif"; font-size: 12pt;
	}*/
</style>
<?
//include "menu4.php";
$color=array("#009900","#FF3300","#993399","#6600FF","#996633","#990033","#333300","#00CC66","#3399FF");

?>
	<table class='table_01'>
		<tr>
			<td class="table_header table_topRadius"><h3>Unit Compentence Matrix : Key Functions[สร้างแม่พิมพ์และประกอบรูปพรรณโลหะ]</h3></td>
		</tr>
		<tr>
			<td style="padding: 10px;">
				<?php
					$sqlHeader="select * from level_name where key_func_code='๑๐๑'  order by levelid";
					$rHeader=mysql_query($sqlHeader) or die(mysql_error()."<br>".$sqlHeader);
					echo"<table border='1' cellspacing='0' cellpadding='0' style='margin-left: auto;margin-right: auto;'>";
					//echo"<tr><th style='color:black;width: 150px;'>Job Category</th>";
					echo"<tr><th style='color:black;width: 150px;'>กรอบคุณวุฒิวิชาชีพ</th>";
					while($rowHeader=mysql_fetch_array($rHeader)):
						$sqlsubHeader="select count(*) as amount from level_competence where key_func_code='๑๐๑'  and level=".$rowHeader["levelid"]." order by key_func_code";
						$rsubHeader=mysql_query($sqlsubHeader) or die(mysql_error()."<br>".$sqlsubHeader);
						$rowsubHeader=mysql_fetch_array($rsubHeader);
						if($rowsubHeader["amount"]>0)
						echo"<th colspan=\"".$rowsubHeader["amount"]."\" bgcolor='".$color[$rowHeader["levelid"]]."'>".$rowHeader["levelname"]."</th>";
					endwhile;
					echo "</tr>";
					
					$sqlHeader="select * from level_name where key_func_code='๑๐๑'  order by levelid";
					$rHeader=mysql_query($sqlHeader) or die(mysql_error()."<br>".$sqlHeader);
					echo"<tr><th style='color:black'>Unit Compentence</th>";
					while($rowHeader=mysql_fetch_array($rHeader)):
						$sqlsubHeader="select detail from level_competence,ontology 
										where level_competence.unit_competence=ontology.term 
											and  key_func_code='๑๐๑'  and level=".$rowHeader["levelid"]." 
										order by key_func_code";
						$rsubHeader=mysql_query($sqlsubHeader) or die(mysql_error()."<br>".$sqlsubHeader);
						while($rowsubHeader=mysql_fetch_array($rsubHeader)):
							?>
								<th class="title" style='color:black;height: 250px;'>
									<div>
										<div><?php echo $rowsubHeader["detail"]; ?></div>
									</div>
								</th>
							<?php
						endwhile;
					endwhile;
					echo "</tr>";
					
					
					/*$sqlHeader="select * from level_name where key_func_code='๑๐๑'  order by levelid";
					$rHeader=mysql_query($sqlHeader) or die(mysql_error()."<br>".$sqlHeader);
					
					while($rowHeader=mysql_fetch_array($rHeader)):
						echo"<tr>
								<td>xLevel ".$rowHeader["levelid"]."</td>
								".getColor($rowHeader["key_func_code"],$rowHeader["levelid"])."
							</tr>";
					endwhile;*/
					echo "</table>";?>
			</td>
		</tr>
		<tr>
			<td class='table_footer'></td>
		</tr>
	</table>
<?php 
function getColor($key_func_code,$levelid){
	$color=array("#009900","#FF3300","#993399","#6600FF","#996633","#990033","#333300","#00CC66","#3399FF");
	$str="";
	$sqlsubHeader="select count(*) as amount 
					from level_competence 
					where key_func_code='".$key_func_code."'  and level <".$levelid." 
					order by key_func_code";
	
	$rsubHeader=mysql_query($sqlsubHeader) or die(mysql_error()."<br>".$sqlsubHeader);
	$rowsubHeader=mysql_fetch_array($rsubHeader);
	for($i=0;$i<$rowsubHeader[0];$i++){
		$str.="<td>&nbsp;</td>";
	}
	$sqlsubHeader="select * from level_competence 
					where key_func_code='".$key_func_code."'  and level =".$levelid." 
					order by key_func_code";
	//echo "<br>".$sqlsubHeader."<br>";
	$rsubHeader=mysql_query($sqlsubHeader) or die(mysql_error()."<br>".$sqlsubHeader);
	while($rowsubHeader=mysql_fetch_array($rsubHeader)){
		$str.="<td bgcolor='".$color[$levelid]."'>&nbsp;</td>";
	}
	$sqlsubHeader="select count(*) as amount 
					from level_competence 
					where key_func_code='".$key_func_code."'  and level >".$levelid." 
					order by key_func_code";
	$rsubHeader=mysql_query($sqlsubHeader) or die(mysql_error()."<br>".$sqlsubHeader);
	$rowsubHeader=mysql_fetch_array($rsubHeader);
	for($i=0;$i<$rowsubHeader[0];$i++){
		$str.="<td>&nbsp;</td>";
	}
return $str;	
}