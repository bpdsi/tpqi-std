<script type="text/javascript">
<!--
	$('document').ready(function(){
		//$('.animate').css('height','25px');
		$('.animate').mouseover(function(){
			$(this).stop();
			$(this).animate({height: 200,bottom: 0,margin: 0},'fast');
		}).mouseout(function(){
			$(this).stop();
			$(this).animate({height: 100,bottom: 0,margin: 0},'fast');
		});
	});
//-->
</script>
<script type="text/javascript">
	$(document).ready(function($){
		slide=setTimeout('nextSlide()',5000);
	});
	function nextSlide(){
		var current=$('#current').val();
		if(parseInt(current)==5){
			var last=current;
			current=1;
			$('#slideTD'+current).click();
		}else{
			var last=current;
			current++;
			$('#slideTD'+current).click();
		}
		setTimeout('nextSlide()',5000);
	}
</script>
<style>
<!--
	.animate{
		cursor: pointer;
		padding: 20px;
		z-index: 800;
	}
-->
</style>
<table style="width: 100%;">
	<tr>
		<td colspan="2" style="padding-bottom: 5px;">
			<table style="width: 100%;background: #fff;height: 250px;border-radius: 5px;">
				<tr>
					<td style="text-align: center;padding: 0px;border-radius: 5px;">
						<input type="hidden" id="current">
						<div style="position: relative;width: 998px;height: 250px;">
							<?php
								for($i=1;$i<=5;$i++){
									?>
										<div id="<?php echo $i?>"
											style="
												background-image: url('images/slideShow/slide0<?php echo $i;?>.png');
												width: 998px;
												height: 250px;
												border-radius: 5px;
												cursor: pointer; 
												position: absolute; 
												background-color: rgb(255, 255, 255); 
												z-index: 780; 
												overflow: hidden;
												<?php
													if($i!=1){
														echo "display: none;";
													} 
												?> 
											"
										></div>
									<?php
								} 
							?>
							<div id="controlDIV" style="
								position: relative;
								z-index: 801;
								top: 225px;
								height: 15px;
								float: right;
							">
								<table style="height: 20px;margin: 0px;padding: 0px;border: none;">
									<tr>
										<td align="right" valign="bottom" style="margin: 0px;padding: 0px;border: none;">
											<?php
												for($i=1;$i<=5;$i++){
													?>
														<div id="slideTD<?php echo $i;?>" style="border: 1px solid rgb(0, 0, 0); height: 10px; width: 10px; z-index: 799; padding: 0px; margin: 5px; float: left; background-color: rgb(255, 255, 255); cursor: pointer; background-position: initial initial; background-repeat: initial initial;" 
															onclick="
																var last=$('#current').val();
																if(current!=<?php echo $i?>){
																	current=<?php echo $i?>;
																	$('#current').val(current);
		
																	$('#'+current).css('z-index','790');
																	$('#slideTD'+current).css('background-color','#6e0505');
																	$('#'+last).css('z-index','780');
																	$('#slideTD'+last).css('background-color','#fff');
																	$('#'+current).fadeIn(2500,function(){
																		$('#'+last).hide();
																	});
																}
															" onmouseover="this.style.cursor='pointer'"></div>
													<?php
												} 
											?>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td style="padding-right: 5px;width: 250px;vertical-align: top;">
			<table class="table_01" style="width: 100%;">
				<tr>
					<td class="table_header table_topRadius">Professional Standard</td>
				</tr>
				<tr>
					<td>
						<table style="width: 100%;">
							<?php
								$query="
									select		*
									from		ontology
									where		parent='-1'
									order by	term
								";
								$result=mysql_query($query);
								$numrows=mysql_num_rows($result);
								$i=0;
								while($i<$numrows){
									$row=mysql_fetch_array($result);
									?>
										<tr>
											<td class="mouseOver pointer" style="padding-left: 5px;">
												<?php echo $row[term];?>
											</td>
										</tr>
									<?php
									$i++;
								}
							?>
						</table>
					</td>
				</tr>
				<tr>
					<td class="table_footer"></td>
				</tr>
			</table>
		</td>
		<td style="vertical-align: top;">
			<table class="table_01" style="width: 100%;">
				<tr>
					<td class="table_header table_topRadius">Main Function</td>
				</tr>
				<tr>
					<td>
						<table style="width: 100%;">
							<tr>
								<td style="width: 446px;">
									<?php $imgHeight=50;?>
									<table>
										<tr>
											<td style="padding-left: 10px;padding-right: 10px;">
												<img src="images/tree.png" height="<?php echo $imgHeight;?>"
													onmouseover="$('#menuTitle').html('สืบค้นมาตรฐานอาชีพ')"
													onmouseout="$('#menuTitle').html('')"
													onclick="window.open('?page=search.php','_self');"
													style="cursor: pointer;"
												>
											</td>
											<td style="padding-left: 10px;padding-right: 10px;">
												<img src="images/new.png" height="<?php echo $imgHeight;?>"
													onmouseover="$('#menuTitle').html('สร้างมาตรฐานอาชีพ')"
													onmouseout="$('#menuTitle').html('')"
													onclick="window.open('?page=tree.php','_self')"
													style="cursor: pointer;"
												>
											</td>
											<td style="padding-left: 10px;padding-right: 10px;">
												<img src="images/compareGraph.png" height="<?php echo $imgHeight;?>"
													onmouseover="$('#menuTitle').html('กำหนดระดับมาตรฐานอาชีพ')"
													onmouseout="$('#menuTitle').html('')"
													onclick="window.open('?page=assessor.php','_self')"
													style="cursor: pointer;"
												>
											</td>
											<td style="padding-left: 10px;padding-right: 10px;">
												<img src="images/document.png" height="<?php echo $imgHeight;?>"
													onmouseover="$('#menuTitle').html('สร้างเอกสารมาตรฐานอาชีพ')"
													onmouseout="$('#menuTitle').html('')"
													onclick="window.open('?page=functional_map.php','_self')"
													style="cursor: pointer;"
												>
											</td>
											<td style="padding-left: 10px;padding-right: 10px;">
												<img src="images/setting.png" height="<?php echo $imgHeight;?>"
													onmouseover="$('#menuTitle').html('ระดับมาตรฐานอาชีพ')"
													onmouseout="$('#menuTitle').html('')"
													onclick="window.open('?page=levelconf.php','_self')"
													style="cursor: pointer;"
												>
											</td>
											<td style="padding-left: 10px;padding-right: 10px;">
												<img src="images/selfAssessor.png" height="<?php echo $imgHeight;?>"
													onmouseover="$('#menuTitle').html('ตรวจสอบสมรรถนะ')"
													onmouseout="$('#menuTitle').html('')"
													onclick="window.open('?page=self_assessor.php','_self')"
													style="cursor: pointer;"
												>
											</td>
										</tr>
									</table>
									<div id="menuTitle" 
										style="
											margin-left: auto;
											margin-right: auto;
											width: 100%;
											height: 25px;
											text-align: center;
										"
									></div>
								</td>
								<td style="vertical-align: top">
									<table
										style="
											width: 100%;
											border: 1px solid #bbb;
										"
									>
										<tr>
											<td>
												<table style="width: 100%;">
													<tr>
														<td class="mouseOver pointer" style="padding-left: 5px;"><img src="images/systemIcon.png" style="margin-right: 5px;">ระบบสืบค้นมาตรฐานอาชีพ</td>
													</tr>
													<tr>
														<td class="mouseOver pointer" style="padding-left: 5px;"><img src="images/systemIcon.png" style="margin-right: 5px;">สืบค้นองค์กรรับรอง</td>
													</tr>
													<tr>
														<td class="mouseOver pointer" style="padding-left: 5px;"><img src="images/systemIcon.png" style="margin-right: 5px;">ลงทะเบียนขอรับการประเมิน เป็นองค์กรรับรอง</td>
													</tr>
													<tr>
														<td class="mouseOver pointer" style="padding-left: 5px;"><img src="images/systemIcon.png" style="margin-right: 5px;">ระบบประเมินตนเอง</td>
													</tr>
													<tr>
														<td class="mouseOver pointer" style="padding-left: 5px;"><img src="images/systemIcon.png" style="margin-right: 5px;">ขออุทธรณ์องค์กรรับรอง</td>
													</tr>
													<tr>
														<td class="mouseOver pointer" style="padding-left: 5px;"><img src="images/systemIcon.png" style="margin-right: 5px;">ร้องเรียน (องค์กรรับรองไม่ได้มาตรฐาน)</td>
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
				<tr>
					<td class="table_footer"></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<table style="width:100%;height:100%;display: none;" id="menuTable">
	<tr>
		<td align="center" style="height: 100%;vertical-align: middle">
			<table style="width: 100%;">
				<tr>
					<td style="height: 250px;" valign="middle">
						<table style="margin-left: auto;margin-right: auto;">
							<tr>
								<td id="td_tree" style="height: 240px;">
									<img class="animate" src="images/tree.png" height="100"
										onmouseover="$('#menuTitle').html('สืบค้นมาตรฐานอาชีพ')"
										onmouseout="$('#menuTitle').html('')"
										onclick="
											var height=$('#td_tree').height();
											var width=$('#td_tree').width();

											$('#td_tree').css('height',height);
											$('#td_tree').css('width',width);
											
											var left=$(this).position().left;
											var top=$(this).position().top;

											/*$(this).css('position','fixed').css('top',top).css('left',left).toggle('puff','fast',function(){
												$('#menuTable').fadeOut(function(){
													window.open('?page=search.php','_self');
												})
											});*/

											$(this).css('position','fixed').css('top',top).css('left',left).animate({
													opacity: 0,
													width: 1000,
													height: 1000,
													top: -200,
													left: $('#menuTable').position().left
												},'fast',function(){
													$('#menuTable').fadeOut(function(){
														window.open('?page=search.php','_self');
													})
												}
											)
										"
									>
								</td>
								<td id="td_new" style="height: 240px;">
									<img class="animate" src="images/new.png" height="100"
										onmouseover="$('#menuTitle').html('สร้างมาตรฐานอาชีพ')"
										onmouseout="$('#menuTitle').html('')"
										onclick="
											var height=$('#td_new').height();
											var width=$('#td_new').width();
	
											$('#td_new').css('height',height);
											$('#td_new').css('width',width);
											
											var left=$(this).position().left;
											var top=$(this).position().top;

											/*$(this).css('position','fixed').css('top',top).css('left',left).toggle('puff','fast',function(){
												$('#menuTable').fadeOut(function(){
													window.open('?page=tree.php','_self')
												})
											});*/
											
											$(this).css('position','fixed').css('top',top).css('left',left).animate({
													opacity: 0,
													width: 1000,
													height: 1000,
													top: -200,
													left: $('#menuTable').position().left
												},'fast',function(){
													$('#menuTable').fadeOut(function(){
														window.open('?page=tree.php','_self')
													})
												}
											)
										"
									>
								</td>
								<td id="td_compareGraph" style="height: 240px;">
									<img class="animate" src="images/compareGraph.png" height="100"
										onmouseover="$('#menuTitle').html('กำหนดระดับมาตรฐานอาชีพ')"
										onmouseout="$('#menuTitle').html('')"
										onclick="
											var height=$('#td_compareGraph').height();
											var width=$('#td_compareGraph').width();
	
											$('#td_compareGraph').css('height',height);
											$('#td_compareGraph').css('width',width);
											
											var left=$(this).position().left;
											var top=$(this).position().top;

											/*$(this).css('position','fixed').css('top',top).css('left',left).toggle('puff','fast',function(){
												$('#menuTable').fadeOut(function(){
													window.open('?page=assessor.php','_self')
												})
											});*/
											
											$(this).css('position','fixed').css('top',top).css('left',left).animate({
													opacity: 0,
													width: 1000,
													height: 1000,
													top: -200,
													left: $('#menuTable').position().left
												},'fast',function(){
													$('#menuTable').fadeOut(function(){
														window.open('?page=assessor.php','_self')
													})
												}
											)
										"
									>
								</td>
								<td id="td_document" style="height: 240px;">
									<img class="animate" src="images/document.png" height="100"
										onmouseover="$('#menuTitle').html('สร้างเอกสารมาตรฐานอาชีพ')"
										onmouseout="$('#menuTitle').html('')"
										onclick="
											var height=$('#td_document').height();
											var width=$('#td_document').width();
	
											$('#td_document').css('height',height);
											$('#td_document').css('width',width);
											
											var left=$(this).position().left;
											var top=$(this).position().top;

											/*$(this).css('position','fixed').css('top',top).css('left',left).toggle('puff','fast',function(){
												$('#menuTable').fadeOut(function(){
													window.open('?page=functional_map.php','_self')
												})
											});*/

											
											$(this).css('position','fixed').css('top',top).css('left',left).animate({
													opacity: 0,
													width: 1000,
													height: 1000,
													top: -200,
													left: $('#menuTable').position().left
												},'fast',function(){
													$('#menuTable').fadeOut(function(){
														window.open('?page=functional_map.php','_self')
													})
												}
											)
										"
									>
								</td>
								<td id="td_setting" style="height: 240px;">
									<img class="animate" src="images/setting.png" height="100"
										onmouseover="$('#menuTitle').html('ระดับมาตรฐานอาชีพ')"
										onmouseout="$('#menuTitle').html('')"
										onclick="
											var height=$('#td_setting').height();
											var width=$('#td_setting').width();
	
											$('#td_setting').css('height',height);
											$('#td_setting').css('width',width);
											
											var left=$(this).position().left;
											var top=$(this).position().top;

											/*$(this).css('position','fixed').css('top',top).css('left',left).toggle('puff','fast',function(){
												$('#menuTable').fadeOut(function(){
													window.open('?page=levelconf.php','_self')
												})
											});*/
											
											$(this).css('position','fixed').css('top',top).css('left',left).animate({
													opacity: 0,
													width: 1000,
													height: 1000,
													top: -200,
													left: $('#menuTable').position().left
												},'fast',function(){
													$('#menuTable').fadeOut(function(){
														window.open('?page=levelconf.php','_self')
													})
												}
											)
										"
									>
								</td>
								<td id="td_selfAssessor" style="height: 240px;">
									<img class="animate" src="images/selfAssessor.png" height="100"
										onmouseover="$('#menuTitle').html('ตรวจสอบสมรรถนะ')"
										onmouseout="$('#menuTitle').html('')"
										onclick="
											var height=$('#td_selfAssessor').height();
											var width=$('#td_selfAssessor').width();
	
											$('#td_selfAssessor').css('height',height);
											$('#td_selfAssessor').css('width',width);
											
											var left=$(this).position().left;
											var top=$(this).position().top;

											/*$(this).css('position','fixed').css('top',top).css('left',left).toggle('puff','fast',function(){
												$('#menuTable').fadeOut(function(){
													window.open('?page=self_assessor.php','_self')
												})
											});*/
											
											$(this).css('position','fixed').css('top',top).css('left',left).animate({
													opacity: 0,
													width: 1000,
													height: 1000,
													top: -200,
													left: $('#menuTable').position().left
												},'fast',function(){
													$('#menuTable').fadeOut(function(){
														window.open('?page=self_assessor.php','_self')
													})
												}
											)
										"
									>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td align="center" style="height: 70px;"><h1 id="menuTitle"></h1></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<script type="text/javascript">
	$('#slideTD1').click();
</script>