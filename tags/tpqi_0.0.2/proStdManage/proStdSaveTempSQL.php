<?php
	include "../function/functionPHP.php";
	host();
	noCache();
	
	$lineCount=$_POST["lineCount"];
	$indID=$_POST["indID"];
	$keyPurpose=$_POST["keyPurpose"];
	$keyRole=$_POST["keyRole"];
	$keyFunction=$_POST["keyFunction"];
?>
<table>
	<tr>
		<td colspan="2" style="border-bottom: 1px solid #000;font-weight: bold;"><?php echo $indID?> : <?php echo $keyPurpose?></td>
	</tr>
	<?php
		for($i=0;$i<=$lineCount-1;$i++){
			if($keyPurpose!="" || $keyRole[$i]!="" || $keyFunction[$i]!=""){
				
				$keyPurpose=trim($keyPurpose);
				$keyRole[$i]=trim($keyRole[$i]);
				$keyFunction[$i]=trim($keyFunction[$i]);
				
				if($keyRole[$i]==""){
					$keyRole[$i]=$keyRole[$i-1];
				}
				
				$lastRole=$keyRole[$i];
				
				if($keyPurpose=="" && $lastRole=="" && $keyFunction[$i]!=""){
					echo "Saving Error<br>Empty purpose, Empty Role";
					//break;
				}
				if($keyPurpose=="" && $keyRole[$i]!=""){
					echo "Saving Error<br>Empty purpose";
					//break;
				}
				if($keyPurpose=="" && $lastRole!="" && $keyFunction[$i]!=""){
					echo "Saving Error<br>Empty purpose";
					//break;
				}
				
				$role[]=$keyRole[$i];
				$function[]=$keyFunction[$i];
			}
		}
		
		$roleCount=1;
		$functionCount=1;
		for($i=0;$i<=$lineCount-1;$i++){
			$purposeID="ICT";
			$roleID=$purposeID.$roleCount."0";
			$functionID=$roleID.$functionCount;
			if($role[$i]!=$role[$i+1] && $role[$i+1]!=""){
				$roleCount++;
				$functionCount=1;
			}
			?>
				<tr>
					<td style="padding-right: 20px;"><?php echo $roleID." : ".$role[$i]?></td>
					<td><?php echo $functionID." : ".$function[$i]?></td>
				</tr>
			<?php
			if($function[$i]!=""){
				$functionCount++;
			}
			
			/*$query="
				select	*
				from	ontology_temp
				where	term='$indID'
			";
			$result=mysql_query($query);
			if(mysql_num_rows($result)==0){
				$query="
					insert into	ontology_temp
						(
							gui,
							parent,
							term,
							detail,
							ontoType,
							indID
						) values (
							'999',
							'-1',
							'',
							detail,
							ontoType,
							indID
						)
				";
			}*/
		} 
	?>
</table>