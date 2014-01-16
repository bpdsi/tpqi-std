<?php
	$countcheck=$_POST["countcheck"];
	//echo $countcheck;
	for($i=1;$i<=$countcheck;$i++){
		$level=$_POST["level_input_".$i];
		$key_func_code=$_POST["key_func_code_".$i];
		//echo "<br>".$i.":=".$key_func_code;
		$unit_competence=$_POST["unit_competence_".$i];
		$check[$level][]= $key_func_code.",".$unit_competence;
		
	}
	
	/*print_r($check[1]);
	print_r($check[2]);
	print_r($check[3]);
	print_r($check[4]);
	print_r($check[5]);
	print_r($check[6]);
	print_r($check[7]);
	print_r($check[8]);*/
	
		$sql="select detail from level_competence, ontology 
					where level_competence.key_func_code=ontology.term";
		$r=mysql_query($sql)or die(mysql_error()."<br>".$sql);
		$row=mysql_fetch_array($r);
?>
<table style="width: 100%;">
	<tr>
		<td valign="top" align="center" style="width: 400px;">
			<div style="position: fixed;">
				<img src="images/selfAssessor.png"><br>
				<h2>ผลการตรวจสอบสมรรถนะ</h2>
				<h3>ตาม Unit Competence ของ<br><?php echo $row[0]?></h3>
			</div>
		</td>
		<td>
			<table class="noSpacing table_01" style="margin-left: auto;margin-right: auto;margin-top: 5px;">
				<tr>
					<td class="right_solid bottom_solid table_header" align="center"
						style="border-top-left-radius: 10px;"
					>ตำแหน่ง</td>
					<td class="right_solid bottom_solid table_header" align="center">ผลการตรวจสอบ</td>
					<td class=" bottom_solid table_header" align="center"
						style="border-top-right-radius: 10px;"
					>สิ่งที่ต้องเพิ่ม</td>
				</tr>
				<?php
					//==========level 1======
					if(count($check[1])>0){
						$level1="";
						for($i=0;$i<count($check[1]);$i++){
							if($level1=="")
								$level1="'".$check[1][$i]."'";
							else
								$level1.=",'".$check[1][$i]."'";
						}
						$sqlLevel1="select detail
									from level_competence, ontology 
									where level_competence.unit_competence=ontology.term  
									and key_func_code='๑๐๑' and level=1
									and concat(key_func_code,',',unit_competence)  not in(".$level1.")";
						$rlevel1=mysql_query($sqlLevel1)or die(mysql_error()."<br>".$sqlLevel1);
						$level1_competence="";
						$level1_count=0;
						$r=1;
						while($rowlevel1=mysql_fetch_array($rlevel1)):
							$level1_count++;
							if($level1_competence==""){
								$level1_competence.="  <b>$r)</b> ".$rowlevel1["detail"]."<br>";
							}else{
								//$level1_competence.=" และ".$rowlevel1["detail"];
								$level1_competence.="  <b>$r)</b> ".$rowlevel1["detail"]."<br>";
							}
							$r++;
						endwhile;
						?>
							<tr>
								<td class="bottom_dashed right_solid" style="padding: 10px;"><?php echo getlevelName(1)?></td>
								<td class="bottom_dashed right_solid" style="padding: 10px;">ยังต้องเพิ่มสมรรถนะอีก <?php echo $level1_count?></td>
								<td class="bottom_dashed right_solid" style="padding: 10px;"><?php echo $level1_competence?></td>
							</tr>
						<?php
						//echo "<br>ตำแหน่ง ".getlevelName(1)." ยังต้องเพิ่มสมรรถนะอีก ".$level1_count." คือ  <font color='red'>".$level1_competence."</font>";
					}
					//==========level 2======
					if(count($check[2])>0){
						$level2="";
						for($i=0;$i<count($check[2]);$i++){
							if($level2=="")
								$level2="'".$check[2][$i]."'";
							else
								$level2.=",'".$check[2][$i]."'";
						}
						$sqlLevel2="select detail
									from level_competence, ontology 
									where level_competence.unit_competence=ontology.term  
									and key_func_code='๑๐๑' and level=2
									and concat(key_func_code,',',unit_competence)  not in(".$level2.")";
						$rlevel2=mysql_query($sqlLevel2)or die(mysql_error()."<br>".$sqlLevel2);
						$level2_competence="";
						$level2_count=0;
						$r=1;
						while($rowlevel2=mysql_fetch_array($rlevel2)):
							$level2_count++;
							/*if($level2_competence=="")
								$level2_competence.=" ".$rowlevel2["detail"];
							else
								$level2_competence.=" และ".$rowlevel2["detail"];*/
							$level2_competence.="  <b>$r)</b> ".$rowlevel2["detail"]."<br>";	
							$r++;
						endwhile;
						?>
							<tr>
								<td class="bottom_dashed right_solid" style="padding: 10px;"><?php echo getlevelName(2)?></td>
								<td class="bottom_dashed right_solid" style="padding: 10px;">ยังต้องเพิ่มสมรรถนะอีก <?php echo $level2_count?></td>
								<td class="bottom_dashed right_solid" style="padding: 10px;"><?php echo $level2_competence?></td>
							</tr>
						<?php
						//echo "<br>ตำแหน่ง ".getlevelName(2)." ยังต้องเพิ่มสมรรถนะอีก ".$level2_count." คือ <font color='red'>".$level2_competence."</font>";
					}
					//==========level 3======
					if(count($check[3])>0){
						$level3="";
						for($i=0;$i<count($check[3]);$i++){
							if($level3=="")
								$level3="'".$check[3][$i]."'";
							else
								$level3.=",'".$check[3][$i]."'";
						}
						$sqlLevel3="select detail
									from level_competence, ontology 
									where level_competence.unit_competence=ontology.term  
									and key_func_code='๑๐๑' and level=3
									and concat(key_func_code,',',unit_competence)  not in(".$level3.")";
						$rlevel3=mysql_query($sqlLevel3)or die(mysql_error()."<br>".$sqlLevel3);
						$level3_competence="";
						$level3_count=0;
						$r=1;
						while($rowlevel3=mysql_fetch_array($rlevel3)):
							$level3_count++;
							/*if($level3_competence=="")
								$level3_competence.=" ".$rowlevel3["detail"];
							else
								$level3_competence.=" และ".$rowlevel3["detail"];*/
							$level3_competence.="  <b>$r)</b> ".$rowlevel3["detail"]."<br>";	
							$r++;
						endwhile;
						?>
							<tr>
								<td class="bottom_dashed right_solid" style="padding: 10px;"><?php echo getlevelName(3)?></td>
								<td class="bottom_dashed right_solid" style="padding: 10px;">ยังต้องเพิ่มสมรรถนะอีก <?php echo $level3_count?></td>
								<td class="bottom_dashed right_solid" style="padding: 10px;"><?php echo $level3_competence?></td>
							</tr>
						<?php
						//echo "<br>ตำแหน่ง ".getlevelName(3)." ยังต้องเพิ่มสมรรถนะอีก ".$level3_count." คือ  <font color='red'>".$level3_competence."</font>";
					}
					//==========level 4======
					if(count($check[4])>0){
						$level4="";
						for($i=0;$i<count($check[4]);$i++){
							if($level4=="")
								$level4="'".$check[4][$i]."'";
							else
								$level4.=",'".$check[4][$i]."'";
						}
						$sqlLevel4="select detail
									from level_competence, ontology 
									where level_competence.unit_competence=ontology.term  
									and key_func_code='๑๐๑' and level=4
									and concat(key_func_code,',',unit_competence)  not in(".$level4.")";
						$rlevel4=mysql_query($sqlLevel4)or die(mysql_error()."<br>".$sqlLevel4);
						$level4_competence="";
						$level4_count=0;
						$r=1;
						while($rowlevel4=mysql_fetch_array($rlevel4)):
							$level4_count++;
							/*if($level4_competence=="")
								$level4_competence.=" ".$rowlevel4["detail"];
							else
								$level4_competence.=" และ".$rowlevel4["detail"];*/
							$level4_competence.="  <b>$r)</b> ".$rowlevel4["detail"]."<br>";	
							$r++;
						endwhile;
						?>
							<tr>
								<td class="right_solid" style="padding: 10px;"><?php echo getlevelName(4)?></td>
								<td class="right_solid" style="padding: 10px;">ยังต้องเพิ่มสมรรถนะอีก <?php echo $level4_count?></td>
								<td class="right_solid" style="padding: 10px;"><?php echo $level4_competence?></td>
							</tr>
						<?php
						//echo "<br>ตำแหน่ง ".getlevelName(4)." ยังต้องเพิ่มสมรรถนะอีก ".$level4_count." คือ <font color='red'>".$level4_competence."</font>";
					}
					//==========level 5======
					if(count($check[5])>0){
						$level5="";
						for($i=0;$i<count($check[5]);$i++){
							if($level5=="")
								$level5="'".$check[5][$i]."'";
							else
								$level5.=",'".$check[5][$i]."'";
						}
						$sqlLevel5="select detail
									from level_competence, ontology 
									where level_competence.unit_competence=ontology.term  
									and key_func_code='๑๐๑' and level=5
									and concat(key_func_code,',',unit_competence)  not in(".$level5.")";
						$rlevel5=mysql_query($sqlLevel5)or die(mysql_error()."<br>".$sqlLevel5);
						$level5_competence="";
						$level5_count=0;
						$r=1;
						while($rowlevel5=mysql_fetch_array($rlevel5)):
							$level5_count++;
							/*if($level5_competence=="")
								$level5_competence.=" ".$rowlevel5["detail"];
							else
								$level5_competence.=" และ".$rowlevel5["detail"];*/
							$level5_competence.="  <b>$r)</b> ".$rowlevel5["detail"];	
							$r++;	
						endwhile;
						echo "<br>ตำแหน่ง ".getlevelName(5)." ยังต้องเพิ่มสมรรถนะอีก ".$level5_count." คือ  <font color='red'>".$level5_competence."</font>";
					}
					//==========level 6======
					if(count($check[6])>0){
						$level6="";
						for($i=0;$i<count($check[6]);$i++){
							if($level6=="")
								$level6="'".$check[6][$i]."'";
							else
								$level6.=",'".$check[6][$i]."'";
						}
						$sqllevel6="select detail
									from level_competence, ontology 
									where level_competence.unit_competence=ontology.term  
									and key_func_code='๑๐๑' and level=6
									and concat(key_func_code,',',unit_competence)  not in(".$level6.")";
						$rlevel6=mysql_query($sqllevel6)or die(mysql_error()."<br>".$sqllevel6);
						$level6_competence="";
						$level6_count=0;
						$r=1;
						while($rowlevel6=mysql_fetch_array($rlevel6)):
							$level6_count++;
							/*if($level6_competence=="")
								$level6_competence.=" ".$rowlevel6["detail"];
							else
								$level6_competence.=" และ".$rowlevel6["detail"];*/
							$level6_competence.="  <b>$r)</b> ".$rowlevel6["detail"];	
							$r++;
						endwhile;
						echo "<br>ตำแหน่ง ".getlevelName(6)." ยังต้องเพิ่มสมรรถนะอีก ".$level6_count." คือ <font color='red'>".$level6_competence."</font>";
					}//==========level 1======
					if(count($check[7])>0){
						$level7="";
						for($i=0;$i<count($check[7]);$i++){
							if($level7=="")
								$level7="'".$check[7][$i]."'";
							else
								$level7.=",'".$check[7][$i]."'";
						}
						$sqllevel7="select detail
									from level_competence, ontology 
									where level_competence.unit_competence=ontology.term  
									and key_func_code='๑๐๑' and level=7
									and concat(key_func_code,',',unit_competence)  not in(".$level7.")";
						$rlevel7=mysql_query($sqllevel7)or die(mysql_error()."<br>".$sqllevel7);
						$level7_competence="";
						$level7_count=0;
						$r=1;
						while($rowlevel7=mysql_fetch_array($rlevel7)):
							$level7_count++;
							/*if($level7_competence=="")
								$level7_competence.=" ".$rowlevel7["detail"];
							else
								$level7_competence.=" และ".$rowlevel7["detail"];*/
							$level7_competence.="  <b>$r)</b> ".$rowlevel7["detail"];	
							$r++;
						endwhile;
						echo "<br>ตำแหน่ง ".getlevelName(7)." ยังต้องเพิ่มสมรรถนะอีก ".$level7_count." คือ <font color='red'>".$level7_competence."</font>";
					}//==========level 8======
					if(count($check[8])>0){
						$level8="";
						for($i=0;$i<count($check[8]);$i++){
							if($level8=="")
								$level8="'".$check[8][$i]."'";
							else
								$level8.=",'".$check[8][$i]."'";
						}
						$sqllevel8="select detail
									from level_competence, ontology 
									where level_competence.unit_competence=ontology.term  
									and key_func_code='๑๐๑' and level=8
									and concat(key_func_code,',',unit_competence)  not in(".$level8.")";
						$rlevel8=mysql_query($sqllevel8)or die(mysql_error()."<br>".$sqllevel8);
						$level8_competence="";
						$level8_count=0;
						$r=1;
						while($rowlevel8=mysql_fetch_array($rlevel8)):
							$level8_count++;
							/*if($level8_competence=="")
								$level8_competence.=" ".$rowlevel8["detail"];
							else
								$level8_competence.=" และ".$rowlevel8["detail"];*/
							$level8_competence.="  <b>$r)</b> ".$rowlevel8["detail"];	
							$r++;
						endwhile;
						echo "<br>ตำแหน่ง ".getlevelName(8)." ยังต้องเพิ่มสมรรถนะอีก ".$level8_count." คือ <font color='red'>".$level8_competence."</font>";
					}//==========level 9======
					if(count($check[9])>0){
						$level9="";
						for($i=0;$i<count($check[9]);$i++){
							if($level9=="")
								$level9="'".$check[9][$i]."'";
							else
								$level9.=",'".$check[9][$i]."'";
						}
						$sqllevel9="select detail
									from level_competence, ontology 
									where level_competence.unit_competence=ontology.term  
									and key_func_code='๑๐๑' and level=9
									and concat(key_func_code,',',unit_competence)  not in(".$level9.")";
						$rlevel9=mysql_query($sqllevel9)or die(mysql_error()."<br>".$sqllevel9);
						$level9_competence="";
						$level9_count=0;
						$r=1;
						while($rowlevel9=mysql_fetch_array($rlevel9)):
							$level9_count++;
							/*if($level9_competence=="")
								$level9_competence.=" ".$rowlevel9["detail"];
							else
								$level9_competence.=" และ".$rowlevel9["detail"];*/
							$level9_competence.="  <b>$r)</b> ".$rowlevel9["detail"];	
							$r++;
						endwhile;
						echo "<br>ตำแหน่ง ".getlevelName(9)." ยังต้องเพิ่มสมรรถนะอีก ".$level9_count." คือ <font color='red'>".$level9_competence."</font>";
					}
					
					function getlevelName($levelid){
						$sql="select levelname from level_name where levelid=".$levelid;
						$r=mysql_query($sql)or die(mysql_error()."<br>".$sql);
						$row=mysql_fetch_array($r);
						return "<u><b>".$row[0]."</b></u>"; 
					}
				?>
				<tr>
					<td colspan="3" class="table_footer"></td>
				</tr>
			</table>
		</td>
	</tr>
</table>