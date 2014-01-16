<style>
	.draggable_div{
		border: dashed 1px rgba(0,0,0,0.2);
		padding: 5px;
		<!--background: rgba(255,255,255,0.5);-->
		margin: 5px;
		font-weight: bold;
		<!--display: inline-block;-->
		float: left;
	}
</style>
<?php
	$ident=$_GET["ident"];
	if($ident!=""){
		$sqlStd="SELECT term, detail FROM   ontology where ident=".$ident;
		$rStd=mysql_query($sqlStd);
		$rowStd=mysql_fetch_array($rStd);
		echo "<table class='table_01' style='width:1000px'>
						<tr><td class='table_header table_topRadius' colspan='2'><h3>".$rowStd["term"].":".$rowStd["detail"]."</h3></td><tr>
						<tr><td colspan='2'>ระดับคุณวุฒิวิชาชีพ</td><tr>";
				$sqlLevel="select * from level_name where std_id=".$ident;
				$rLevel=mysql_query($sqlLevel);
					echo"<tr valign='top'>
						<td width='50%'>
						<table>";
						while($rowLevel=mysql_fetch_array($rLevel)):
							echo"<tr valign='top'>
								<td>
									<div class=\"draggable_div\" onmouseover=\"
									var dataString = 'std_id=".$rowLevel["std_id"]."&levelid=".$rowLevel["levelid"]."';
										//alert(dataString);
										$.post('standard/groupLevel.php',{
												std_id: '".$rowLevel["std_id"]."',
												levelid: '".$rowLevel["levelid"]."'
											},function(data){
												//alert(data);
												$('#Content').html(data);
											}
										);
										
										\">&nbsp;&nbsp;&nbsp;<a href='?page=standard/std_detail.php&std_id=".$rowLevel["std_id"]."&levelid=".$rowLevel["levelid"]."'>คุณวุฒิวิชาชีพระดับ ".$rowLevel["levelid"]." ".$rowLevel["levelname"]."</a></div>
								</td>
								</tr>";
						endwhile;
				echo"</table>";
				echo"</td>";
				echo"<td  width='50%'>";
					echo"<div id='Content'></div>";
				echo"</td>
		</tr>
		<tr><td class='table_footer' colspan='2'></td></tr>
		</table>";
	}else{
		$sqlStd="SELECT term, detail,ident FROM   ontology where parent=-1";
		$rStd=mysql_query($sqlStd);
		echo "<table class='table_01' style='width:1000px'>";	
		echo"<tr><td colspan='4' class='table_header table_topRadius'>มาตรฐานวิชาชีพ</td></tr>";
		$i=0;
		while($rowStd=mysql_fetch_array($rStd)):
			$i++;
			echo"<tr><td>&nbsp;</td><td>".$i.".</td><td><a href='?page=standard/std_summary.php&ident=".$rowStd["ident"]."'>".$rowStd["term"]."</a></td><td>".$rowStd["detail"]."</td></tr>";
		endwhile;
		echo "<tr><td class='table_footer' colspan='4'></td></tr>";
		echo"</table>";
	}
?>