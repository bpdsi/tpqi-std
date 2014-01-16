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
<style>
<!--
	.animate{
		cursor: pointer;
		padding: 20px;
		z-index: 1000;
	}
-->
</style>
<table style="width: 100%;">
	<tr>
		<td colspan="2" style="padding-bottom: 5px;">
			<table style="width: 100%;background: #fff;height: 250px;border-radius: 5px;">
				<tr>
					<td style="text-align: center;">Slide Show Zone</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td style="padding-right: 5px;width: 250px;vertical-align: top;">
			<table class="table_01" style="width: 100%;">
				<tr>
					<td class="table_header table_topRadius">Last Professional Standard</td>
				</tr>
				<tr>
					<td>Content</td>
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
					<td>Content</td>
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