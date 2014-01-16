<?php
	$startMon=$_GET[startMon];
	$startYear=$_GET[startYear];
	$startDate=$_GET[startDate];
	$endDate=$_GET[endDate];
	if($startMon==""){
		$startMon=date("m");
	}
	if($startYear==""){
		$startYear=date("Y");
	}
	
	$startMon=numConvert($startMon, 2);
	$startYear=numConvert($startYear, 2);
	dayNameThaSet();
	$dateWidth=68;

	$job["20140104"][]="บริษัท A";
	$complete["20140104"][]=1;
	
	$job["20140104"][]="บริษัท B";
	$complete["20140104"][]=1;
	
	$job["20140109"][]="บริษัท C";
	$complete["20140109"][]=2;
	
	$job["20140120"][]="บริษัท D";
	$complete["20140120"][]=2;
	
	$job["20140125"][]="บริษัท E";
	$complete["20140125"][]=1;
	
	$job["20140205"][]="บริษัท F";
	$complete["20140205"][]=3;
	
	$job["20140207"][]="บริษัท G";
	$complete["20140207"][]=1;
	
	$job["20140224"][]="บริษัท H";
	$complete["20140224"][]=2;
	
	$job["20140220"][]="บริษัท I";
	$complete["20140220"][]=1;
?>
<script type="text/javascript">
	function setDragDrop(){
		$( ".draggable" ).draggable();
		$( ".draggableBack" ).draggable();
		
		$( ".droppable" ).droppable({
			drop: function( event, ui ) {
				var id=$(ui.draggable).attr('id');
				alert(id);
				
			}
		});
	}
	$('document').ready(function(){
		setDragDrop();
	});
</script>
<style>
	.draggable_div{
		border: dashed 1px rgba(0,0,0,0.2);
		padding: 5px;
		background: rgba(255,255,255,0.5);
		margin: 5px;
		font-weight: bold;
		display: inline-block;
		float: left;
	}
	.draggable{
		cursor: pointer;
	}
	.draggable:hover{
		box-shadow: 0px 0px 5px rgba(0,0,0,0.3);
	}
	.droppable{
		border: solid 1px rgba(0,0,0,0.2);
		background: rgba(255,255,255,0.9);
		padding: 10px;
		margin: 10px;
	}
</style>
<div id="cb_detailPreview"
	style="
		display: none;
		position: absolute;
		z-index: 1000;
		width: 400px;
	"
>
	<table class="table_01">
		<tr>
			<td class="table_header table_topRadius" id="cb_detailPreview_cbName">555</td>
		</tr>
		<tr>
			<td id="cb_detailPreview_cbDetail">
				<table>
					<tr>
						<td style="font-weight: bold">ที่อยู่</td>
					</tr>
					<tr>
						<td>aaa aaaaaaa aaaaaaaaaa aaaaaaaa aaaaaaa aaaaaaaaaa aaa aaaaaaa aaaaaaaaaa aaaaaaaa aaaaaaa aaaaaaaaaa</td>
					</tr>
					<tr>
						<td style="font-weight: bold">รายละเอียด</td>
					</tr>
					<tr>
						<td>xxxxxxx xxxxxx xxxxxxxxxxxx xxxxxxxx xxxxx xxxxxxxxxx xxxxxxx xxxxxx xxxxxxxxxxxx xxxxxxxx xxxxx xxxxxxxxxx xxxxxxx xxxxxx xxxxxxxxxxxx xxxxxxxx xxxxx xxxxxxxxxx xxxxxxx xxxxxx xxxxxxxxxxxx xxxxxxxx xxxxx xxxxxxxxxx</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td class="table_footer"></td>
		</tr>
	</table>
</div>
<table style="width: 100%;">
	<tr>
		<td style="width: 320px;text-align: center;">
			<img src="images/cb.png"><br>
			<h2>ระบบบริหารจัดการสำนักรับรอง</h2>
		</td>
		<td>
			<table class="table_01" style="width: 100%;margin-bottom: 10px;">
				<tr>
					<td class="table_header table_topRadius">เลือกทีมผู้ประเมิน</td>
				</tr>
				<tr>
					<td style="padding: 10px;">
						<table>
							<tr>
								<td class="right_solid"
									style="padding-right: 20px;vertical-align: top"
								>
									<table>
										<tr>
											<td>เลือกสาขาอาชีพ</td>
											<td>
												<select>
													<option>ICT</option>
													<option>ปิโตรเลียม</option>
													<option>อัญมณี</option>
												</select>
											</td>
										</tr>
										<tr>
											<td>เลือกทีมผู้ประเมิน</td>
											<td>
												<select>
													<option>นายวสุเทพ ขุนทอง</option>
													<option>นายธนภัทร ขันติยาภรณ์</option>
													<option>นายอำไพพรรณ มั่นศิลป์</option>
												</select>
											</td>
										</tr>
									</table>
								</td>
								<td style="vertical-align: top;padding-left: 20px;">
									<table>
										<tr>
											<td style="text-align: right;">หัวหน้าทีมผู้ประเมิน</td>
											<td style="font-weight: bold;padding-left: 10px;">นายวสุเทพ ขุนทอง</td>
										</tr>
										<tr>
											<td style="text-align: right;">สาขาอาชีพ</td>
											<td style="font-weight: bold;padding-left: 10px;">ICT</td>
										</tr>
										<tr>
											<td style="text-align: right;">รายละเอียด</td>
											<td style="font-weight: bold;padding-left: 10px;word-wrap: break-word;">Programmer, Software, Animation</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<table class="table_01" style="width: 100%;margin-bottom: 10px;">
	<tr>
		<td class="table_header table_topRadius" colspan="2">ปฏิทินงาน</td>
	</tr>
	<tr>
		<td style="vertical-align: top;">
			<table cellspacing="0" cellpadding="0" border="0" style="margin-right: auto;">
				<tr>
					<td>
						<form method="get" action="index.php">
							<input type="hidden" name="page" value="assessor/assignJob.php">
							<table cellspacing="0" cellpadding="0" style="width: 100%;" border="0">
								<tr>
									<td>
										<table cellspacing="0" cellpadding="0" style="width: 100%;">
											<tr>
												<td align="right" style="font-weight: bold;">
													ตั้งแต่เดือน
													<select id="startMon" name="startMon" onchange="form.submit()">
														<?php
															for($i=1;$i<=12;$i++){
																?>
																	<option value="<?php echo $i;?>"
																		<?php
																			if($i==$startMon){
																				echo "selected";
																			} 
																		?>
																	><?php echo monName($i)?></option>
																<?php
															} 
														?>
													</select><select id="startYear" name="startYear" onchange="form.submit()">
														<?php
															for($i=date("Y");$i<=date("Y")+5;$i++){
																?>
																	<option value="<?php echo $i?>"
																		<?php
																			if($i==$startYear){
																				echo "selected";
																			} 
																		?>
																	><?php echo $i+543?></option>
																<?php
															} 
														?>
													</select>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</form>
					</td>
				</tr>
				<tr>
					<td valign="top" style="height: 100%;">
						<table align="center" cellspacing="0" cellpadding="0" style="height:100%;background: rgba(255,255,255,1);" border="0">
							<tr>
								<?php
									for($i=0;$dayNameThas[$i]!=null;$i++){
										?>
											<td align="center"
												style="
													background-color: #d6d6d6;
													color: #414141;
													font-size: 15px;
													height: 20px;
													width: <?php echo $dateWidth?>px;
													border: 1px solid #aaa;
												"
											>
												<?php echo $dayNameThas[$i];?>
											</td>
										<?php 
									} 
								?>
							</tr>
							<tr>
								<?php
									if(dayNum($startYear,$startMon,1)>0){
										?>
											<td colspan="<?php echo dayNum($startYear,$startMon,1);?>"
												style="
													border-left:solid;
													border-bottom:solid;
													border-width:1px;
													border-color:#d6d6d6;
												"
											>&nbsp;</td>	
										<?php 
									} 
									for($i=1;$i<=maxDate($startYear, $startMon);$i++){
										$dayNum=numConvert($i, 2);
										?>
											<td align="right" valign="top"
												onmouseover="
													this.bgColor='<?php echo $color[mouseOver]?>';
													this.style.cursor='pointer'
													this.style.boxShadow='inset 1px 1px 10px #888888';
												"
												onmouseout="
													this.bgColor=''
													this.style.boxShadow='';
												"
												style="
													width:20px;
													border-left:solid;
													border-bottom:solid;
													<?php
														if(dayNum($startYear, $startMon, $i+1)==0){
															echo "border-right:solid;";
														} 
													?>
													border-width:1px;
													border-color:#d6d6d6;
													font-weight: bold;
													color: #979797;
													<?php
														if(
															$startYear.$startMon.numConvert($dayNum, 2)==$startDate ||
															(
																$startYear.$startMon.numConvert($dayNum, 2)>=$startDate &&
																$startYear.$startMon.numConvert($dayNum, 2)<=$endDate
															)
														){
															echo "background-color: rgb(197, 220, 255)";
														}else{
															$dayColor="#cddfcd";
														}
													?>
												"
												onclick="
													
												"
											>
												<table cellspacing="0" cellpadding="3" 
													style="
														width: 100%;
														height: 100%;
														<?php
															if($startYear.$startMon.$dayNum==date("Ymd")){
																?>
																	background-image: url('images/calendarPin.png');
																	background-position: top left;
																	background-repeat: no-repeat;
																<?php
															} 
														?>
													"
												>
													<tr>
														<?php
															if(dayNum($startYear,$startMon,1)==0 && maxDate($startYear, $startMon)<29){
																$cellHeight="54px";
															}else{
																if(dayNum($startYear,$startMon,1)>=5){
																	if(maxDate($startYear, $startMon)<=30){
																		$cellHeight="38px";
																	}else{
																		$cellHeight="25px";
																	}
																}else{
																	$cellHeight="38px";
																}
															}
														?>
														<td align="right" 
															style="
																font-weight: bold;
																height: <?php echo $cellHeight;?>;
															"
															valign="top"
														>&nbsp;<?php echo $i;?></td>
													</tr>
													<tr>
														<td align="right" valign="bottom"
															style="
																background: rgba(255,255,255,0.5);
																font-size: 13px;
																height: 25px;
															"
														>
															<?php
																$dayNumTemp=numConvert($i, 2);;
																$jobCount=count($job["$startYear$startMon$dayNumTemp"]);
																if($jobCount>0){
																	for($iTemp=0;$iTemp<$jobCount;$iTemp++){
																		if($complete["$startYear$startMon$dayNumTemp"][$iTemp]==1){
																			$file="images/cb-red.png";																			
																		}else if($complete["$startYear$startMon$dayNumTemp"][$iTemp]==2){
																			$file="images/cb-yellow.png";
																		}else if($complete["$startYear$startMon$dayNumTemp"][$iTemp]==3){
																			$file="images/cb-green.png";
																		}
																		?>
																			<img src="<?php echo $file?>" height="25"
																				onmouseover="
																					$('#cb_detailPreview').show();
																					$('#cb_detailPreview_cbName').html('<?php echo $job["$startYear$startMon$dayNumTemp"][$iTemp]?>');
																					$('#cb_detailPreview').css('left',$(this).position().left+20);
																					$('#cb_detailPreview').css('top',$(this).position().top);
																				"
																				onmouseout="
																					$('#cb_detailPreview').hide();
																				"
																			>
																		<?php
																	}
																}
															?>
														</td>
													</tr>
												</table>
											</td>
										<?php 
										if(dayNum($startYear, $startMon, $i+1)==0){
											if($i==maxDate($startYear, $startMon)){
												echo "</tr>";
											}else{
												echo "</tr><tr height=\"50\">";
											}
										}
									}
									$endColSpan=6-dayNum($startYear, $startMon, $i-1);
									if($endColSpan>0){
										echo "
											<td colspan=\"$endColSpan\"
												style=\"
													border-left: solid;
													border-right: solid;
													border-bottom: solid;
													border-color: #d6d6d6;
													border-width: 1px;
												\"
											>&nbsp;</td>
										";
									} 
								?>

						</table>
					</td>
				</tr>
			</table>
		</td>
		<?php
			$startMonOld=$startMon;
			$startYearOld=$startYear;
			$startMon++;
			if($startMon==13){
				$startMon=1;
				$startYear++;
			}
			$startMon=numConvert($startMon, 2);
		?>
		<td style="vertical-align: top;">
			<table cellspacing="0" cellpadding="0" border="0" style="margin-left: auto;">
				<tr>
					<td align="center">
						<form method="post" action="orderListCalendar.php">
							<table cellspacing="0" cellpadding="0" style="width: 100%;" border="0">
								<tr>
									<td>
										<table cellspacing="0" cellpadding="0" style="width: 100%;">
											<tr>
												<td align="right" style="font-weight: bold;">
													จนถึง <?php echo monName($startMon)." ".($startYear+543);?>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</form>
					</td>
				</tr>
				<tr>
					<td valign="top" style="height: 100%;">
						<table align="center" cellspacing="0" cellpadding="0" style="height:100%;background: rgba(255,255,255,1);" border="0">
							<tr>
								<?php
									for($i=0;$dayNameThas[$i]!=null;$i++){
										?>
											<td align="center"
												style="
													background-color: #d6d6d6;
													color: #414141;
													font-size: 15px;
													height: 20px;
													width: <?php echo $dateWidth?>px;
													border: 1px solid #aaa;
												"
											>
												<?php echo $dayNameThas[$i];?>
											</td>
										<?php 
									} 
								?>
							</tr>
							<tr>
								<?php
									if(dayNum($startYear,$startMon,1)>0){
										?>
											<td colspan="<?php echo dayNum($startYear,$startMon,1);?>"
												style="
													border-left:solid;
													border-bottom:solid;
													border-width:1px;
													border-color:#d6d6d6;
												"
											>&nbsp;</td>	
										<?php 
									} 
									for($i=1;$i<=maxDate($startYear, $startMon);$i++){
										$dayNum=numConvert($i, 2);
										?>
											<td align="right" valign="top"
												onmouseover="
													this.bgColor='<?php echo $color[mouseOver]?>';
													this.style.cursor='pointer'
													this.style.boxShadow='inset 1px 1px 10px #888888';
												"
												onmouseout="
													this.bgColor=''
													this.style.boxShadow='';
												"
												style="
													width:20px;
													border-left:solid;
													border-bottom:solid;
													<?php
														if(dayNum($startYear, $startMon, $i+1)==0){
															echo "border-right:solid;";
														} 
													?>
													border-width:1px;
													border-color:#d6d6d6;
													font-weight: bold;
													color: #979797;
													<?php
														if(
															$startYear.$startMon.numConvert($dayNum, 2)==$endDate ||
															(
																$startYear.$startMon.numConvert($dayNum, 2)>=$startDate &&
																$startYear.$startMon.numConvert($dayNum, 2)<=$endDate
															)
														){
															echo "background-color: rgb(197, 220, 255)";
														}else{
															$dayColor="#cddfcd";
														}
													?>
												"
												onclick="
													
												"
											>
												<table cellspacing="0" cellpadding="3" 
													style="
														width: 100%;
														height: 100%;
														<?php
															if($startYear.$startMon.$dayNum==date("Ymd")){
																?>
																	background-image: url('images/calendarPin.png');
																	background-position: top left;
																	background-repeat: no-repeat;
																<?php
															} 
														?>
													"
												>
													<tr>
														<?php
															if(dayNum($startYear,$startMon,1)==0 && maxDate($startYear, $startMon)<29){
																$cellHeight="54px";
															}else{
																if(dayNum($startYear,$startMon,1)>=5){
																	if(maxDate($startYear, $startMon)<=30){
																		$cellHeight="38px";
																	}else{
																		$cellHeight="25px";
																	}
																}else{
																	$cellHeight="38px";
																}
															}
														?>
														<td align="right" 
															style="
																font-weight: bold;
																height: <?php echo $cellHeight;?>;
															"
															valign="top"
														>&nbsp;<?php echo $i;?></td>
													</tr>
													<tr>
														<td align="right" valign="bottom"
															style="
																background: rgba(255,255,255,0.5);
																font-size: 13px;
																height: 25px;
															"
														>
															<?php
																$dayNumTemp=numConvert($i, 2);;
																$jobCount=count($job["$startYear$startMon$dayNumTemp"]);
																if($jobCount>0){
																	for($iTemp=0;$iTemp<$jobCount;$iTemp++){
																		if($complete["$startYear$startMon$dayNumTemp"][$iTemp]==1){
																			$file="images/cb-red.png";																			
																		}else if($complete["$startYear$startMon$dayNumTemp"][$iTemp]==2){
																			$file="images/cb-yellow.png";
																		}else if($complete["$startYear$startMon$dayNumTemp"][$iTemp]==3){
																			$file="images/cb-green.png";
																		}
																		?>
																			<img src="<?php echo $file?>" height="25"
																				onmouseover="
																					$('#cb_detailPreview').show();
																					$('#cb_detailPreview_cbName').html('<?php echo $job["$startYear$startMon$dayNumTemp"][$iTemp]?>');
																					$('#cb_detailPreview').css('left',$(this).position().left+20);
																					$('#cb_detailPreview').css('top',$(this).position().top);
																				"
																				onmouseout="
																					$('#cb_detailPreview').hide();
																				"
																			>
																		<?php
																	}
																}
															?>
														</td>
													</tr>
												</table>
											</td>
										<?php 
										if(dayNum($startYear, $startMon, $i+1)==0){
											if($i==maxDate($startYear, $startMon)){
												echo "</tr>";
											}else{
												echo "</tr><tr height=\"50\">";
											}
										}
									}
									$endColSpan=6-dayNum($startYear, $startMon, $i-1);
									if($endColSpan>0){
										echo "
											<td colspan=\"$endColSpan\"
												style=\"
													border-left: solid;
													border-right: solid;
													border-bottom: solid;
													border-color: #d6d6d6;
													border-width: 1px;
												\"
											>&nbsp;</td>
										";
									} 
								?>

						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td class="table_footer" colspan="2"></td>
	</tr>
</table>

<table class="table_01" style="width: 100%;" class="table_radius">
	<tr>
		<td class="bottom_solid table_header table_topRadius"style="width: 50%;">
			<strong>ผู้ขอรับการประเมิน</strong>
			<strong style="float: right">สาขาอาชีพ : ICT</strong>
		</td>
	</tr>
	<tr>
		<td style="vertical-align: top;background-color: #F0DFDF">
			<table style="width: 100%;">
				<tr>
					<td style="width: 60%;vertical-align: top;">
						<div class="draggable_div"
							onmouseover="
								$('#cbCBR').html('CBR201300198');
								$('#cbName').html('บริษัท SVOA');
								$('#cbAddress').html('aaaaa aaaaa aaaaaaaaaaa aaaaaaaaaaaaaa aaaaa aaaaaaaaaaa aaaaaaaaaaaaaa aaaaa aaaaaaaaaaa aaaaaaaaa');
								$('#cbDetail').html('xxx xxx xxxxxxxxx xxxxxxxx xxxxxxxxxxxx xxx xxxxxxxxx xxxxxxxx xxxxxxxxxxxx xxx xxxxxxxxx xxxxxxxx xxxxxxxxxxxx xxx xxxxxxxxx xxxxxxxx xxxxxxxxxxxx xxx xxxxxxxxx xxxxxxxx xxxxxxxxxxxx xxx xxxxxxxxx xxxxxxxx xxxxxxxxxxxx xxx xxxxxxxxx xxxxxxxx xxxxxxxxx');
								$('#cbDownload').html('<input type=\'button\' value=\'Download ข้อมูลประกอบใบคำขอ\'>');
							"
						>
							<table>
								<tr>
									<td><img src="images/cb.png" height="35" class="draggable" id="01"></td>
									<td>บริษัท SVOA</td>
								</tr>
							</table>
						</div>
						<div class="draggable_div" id="01"
							onmouseover="
								$('#cbCBR').html('CBR201300199');
								$('#cbName').html('มหาวิทยาลัยเกษตรศาสตร์');
								$('#cbAddress').html('aaaaa aaaaa aaaaaaaaaaa aaaaaaaaaaaaaa aaaaa aaaaaaaaaaa aaaaaaaaaaaaaa aaaaa aaaaaaaaaaa aaaaaaaaa');
								$('#cbDetail').html('xxx xxx xxxxxxxxx xxxxxxxx xxxxxxxxxxxx xxx xxxxxxxxx xxxxxxxx xxxxxxxxxxxx xxx xxxxxxxxx xxxxxxxx xxxxxxxxxxxx xxx xxxxxxxxx xxxxxxxx xxxxxxxxxxxx xxx xxxxxxxxx xxxxxxxx xxxxxxxxxxxx xxx xxxxxxxxx xxxxxxxx xxxxxxxxxxxx xxx xxxxxxxxx xxxxxxxx xxxxxxxxx');
								$('#cbDownload').html('<input type=\'button\' value=\'Download ข้อมูลประกอบใบคำขอ\'>');
							"
						>
							<table>
								<tr>
									<td><img src="images/cb.png" height="35" class="draggable" id="02"></td>
									<td>มหาวิทยาลัยเกษตรศาสตร์</td>
								</tr>
							</table>
						</div>
						<div class="draggable_div" id="01"
							onmouseover="
								$('#cbCBR').html('CBR201300200');
								$('#cbName').html('บริษัทโตโยต้า นวนคร');
								$('#cbAddress').html('aaaaa aaaaa aaaaaaaaaaa aaaaaaaaaaaaaa aaaaa aaaaaaaaaaa aaaaaaaaaaaaaa aaaaa aaaaaaaaaaa aaaaaaaaa');
								$('#cbDetail').html('xxx xxx xxxxxxxxx xxxxxxxx xxxxxxxxxxxx xxx xxxxxxxxx xxxxxxxx xxxxxxxxxxxx xxx xxxxxxxxx xxxxxxxx xxxxxxxxxxxx xxx xxxxxxxxx xxxxxxxx xxxxxxxxxxxx xxx xxxxxxxxx xxxxxxxx xxxxxxxxxxxx xxx xxxxxxxxx xxxxxxxx xxxxxxxxxxxx xxx xxxxxxxxx xxxxxxxx xxxxxxxxx');
								$('#cbDownload').html('<input type=\'button\' value=\'Download ข้อมูลประกอบใบคำขอ\'>');
							"
						>
							<table>
								<tr>
									<td><img src="images/cb.png" height="35" class="draggable" id="03"></td>
									<td>บริษัทโตโยต้า นวนคร</td>
								</tr>
							</table>
						</div>
					</td>
					<td style="background-color: #fff;padding: 10px;">
						<table>
							<tr>
								<td id="cbCBR" colspan="2"
									style="font-weight: bold;text-align: right;font-size: 20px;"
								></td>
							</tr>
							<tr>
								<td id="cbName" colspan="2"
									style="font-weight: bold;text-align: center;font-size: 30px;"
								></td>
							</tr>
							<tr>
								<td style="font-weight: bold">ที่อยู่</td>
							</tr>
							<tr>
								<td id="cbAddress"></td>
							</tr>
							<tr>
								<td style="font-weight: bold">รายละเอียด</td>
							</tr>
							<tr>
								<td id="cbDetail"></td>
							</tr>
							<tr>
								<td id="cbDownload"></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td class="table_footer"></td>
	</tr>
</table>