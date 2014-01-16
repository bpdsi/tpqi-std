<?php
	function showSub($parent,$oldParent){
		?>
			<div class="subMenu <?php echo $parent?> <?php echo $oldParent;?> table_bottomRadius <?php if($oldParent!="0"){echo "table_topRadius";}?>" id="subMenu_<?php echo $parent?>">
				<table class="noSpacing">
					<?php
						if($oldParent!=0){
							?>
								<tr>
									<td class="table_header table_topRadius" style="height: 3px;" colspan="2"></td>
								</tr>
							<?php
						} 
					?>
					<tr>
						<?php
							if($oldParent!=0){
								?>
									<td style="vertical-align: top;padding: 10px;">
										<?php
											$query="
												select	*
												from	menu_detail
												where	menu_id='$parent'
											";
											$result=mysql_query($query);
											$row=mysql_fetch_array($result);
										?>
										<img src="images/menuIcon/<?php echo $row[icon]?>" width="100" height="100">
									</td>
								<?php
							} 
						?>
						<td style="padding: 0px;vertical-align: top;">
							<table class="table_menu <?php if($oldParent!="0"){echo "table_topRadius";}?>">
								<?php
									$querySub="
										select	*
										from	menu_detail
										where	parent=$parent
										order by menu_order
									";
									$resultSub=mysql_query($querySub);
									$subCount=mysql_num_rows($resultSub);
									$iSub=0;
									while($iSub<$subCount){
										$rowSub=mysql_fetch_array($resultSub);
										
										$menuPermission=permission($rowSub[menu_id], $_SESSION[authen][ofID]);
										if($menuPermission[access]){
										
											$queryChildCount="
												select	count(*) as 'childCount'
												from	menu_detail
												where	parent=$rowSub[menu_id]
											";
											$resultChildCount=mysql_query($queryChildCount);
											$rowChildCount=mysql_fetch_array($resultChildCount);
											$childCount=$rowChildCount[childCount];
											?>
												<tr>
													<td class="subMenuDetail" menu_id="<?php echo $rowSub[menu_id]?>" parent="<?php echo $parent;?>"
														<?php
															if($childCount>0){
																?>
																	style="
																		background-image: url('images/rightArrow.png');
																		background-repeat: no-repeat;
																		background-position: right center;
																	"
																<?php
															} 
														?>
													>
														<div style="float: left"
															<?php
																if($rowSub[menu_pages]!=""){
																	?>onclick="window.open('?page=<?php echo $rowSub[menu_pages]?>','_self')"<?php
																} 
															?>
														><?php echo $rowSub[menu_name];?></div>
														<?php 
															if($childCount>0){
																showSub($rowSub[menu_id],"$parent $oldParent");
															}
														?>
													</td>
												</tr>
											<?php
										}
										$iSub++;
									}
								?>
							</table>
						</td>
					</tr>
					<?php
						if($subCount>0){
							?>
								<tr>
									<td class="table_footer" style="height: 3px;" colspan="2"></td>
								</tr>
							<?php
						} 
					?>
				</table>
			</div>
		<?php
	}
?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#menu_home').click(function(){
			window.open('index.php','_self');
		});
		$('.mainMenu').mouseover(function(){
			$('.divSubMenu').hide();
			$('#div_'+$(this).attr("menu_id")).show();
			$('#subMenu_'+$(this).attr("menu_id")).show();
			$('#subMenu_'+$(this).attr("menu_id")).css('left',$(this).position().left);
			$('#subMenu_'+$(this).attr("menu_id")).css('top',$(this).position().top+$(this).height()+10);
		});

		$('.subMenuDetail').mouseover(function(){
			var left=$(this).position().left+$(this).width()+40;
			var top=$(this).position().top;
			$(this).children('.subMenu').css('left',left);
			$(this).children('.subMenu').css('top',top);
			$(this).children('.subMenu').show();
		}).mousemove(function(){
			var left=$(this).position().left+$(this).width()+40;
			var top=$(this).position().top;
			$(this).children('.subMenu').css('left',left);
			$(this).children('.subMenu').css('top',top);
		}).mouseleave(function(){
			$(this).children('.subMenu').hide();
		});

		$('.subMenu').mouseleave(function(){
			$(this).hide();
		});
	});
</script>
<style type="text/css">
	html{
		margin: 0px;
	}
	body{
		margin: 0px;
	}
	table{
		border-spacing:0;
		border-collapse:collapse;
	}
	
	#menu_home{
		padding: 0px 20px 0px 0px;
		font-weight: bold;
		font-size: 25px;
		cursor: pointer
	}
	
	.mainMenu{
		float: left;
		color: #fff;
	}
	.menu{
		padding: 5px 20px 5px 20px;
	}
	.menu:hover{
		background-image: url('images/header/leftMenuBG.png'), url('images/header/rightMenuBG.png');
		background-position: left,right;
		background-repeat: no-repeat, no-repeat;
		background-color: #700000;
		cursor: pointer;
	}
	.subMenu{
		display: none;
		position: absolute;
		left: 100px;
		top: 100px;
		background-color: #fff;
		box-shadow: 0px 0px 5px #888;
	}
	.subMenuDetail{
		white-space: nowrap;
		padding-left: 20px;
		padding-right: 20px;
		color: #082441;
	}
	.subMenuDetail:hover{
		background-color: #ffcaca;
		color: #000;
	}
</style>

<div
	style="
		position: fixed;
		bottom: 0px;
		width: 100%;
		background-color: #132743;
		text-align: center;
		color: #fff;
		z-index: 999;
	"
>
	 Thailand Professional Qualification Institute (Public Organization).  
</div>

<img src="images/header/tpqiDecoration.png"
	style="
		position: fixed;
		right: 0px;
		bottom: 10px;
		cursor: pointer;
		z-index: 1000;
	"
	onclick="window.open('http://www.tpqi.go.th/','_self')"
>

<div 
	style="
		top: 0px;
		left: 0px;
		width: 100%;
		height: 118px;
		z-index: 1000;
	"
>
	<table class="noSpacing" style="width: 100%;height: 118px;background: none;border: none;">
		<tr>
			<td
				style="
					background-image: url('images/header/headerLeft.png');
					background-position: top right;
					background-repeat: no-repeat;
					width: auto;
				"
			></td>
			<td
				style="
					background-image: url('images/header/headerBG.jpg');
					background-repeat: repeat-x;
					width: 1000px;
				"
			>
				<div style="position: relative">
					<img src="images/header/db.png" 
						style="
							position: absolute;
							right: 10px;
							top: 30px;
						"
					>
				</div>
				<table class="noSpacing" style="height: 118px;width: 100%;background: none;border: none;">
					<tr>
						<td style="padding-left: 20px;padding-top: 20px;height: 62px;">
							<img id="menu_home" src="images/header/title.png" style="margin-top: -10px;">
							<div style="float: right;padding-right: 120px;text-align: right;">
								Welcome <b><?php echo $_SESSION[authen][name]." ".$_SESSION[authen][familyName]?></b><br>
								<div style="font-weight: bold;font-size: 17px;"><?php echo perName($_SESSION[authen][perID])?><input type="button" value="ออกจากระบบ" onclick="window.open('authen/logout.php','_self')"></div>
							</div>
						</td>
					</tr>
					<tr>
						<td style="vertical-align: bottom;">
							<div class="version" style="float: right;margin-right: 120px;">
								TPQD<br>
								Last Updated 2013.14.9
							</div>
							<table style="border: none;background: none;float: left;">
								<tr>
									<?php
										$queryMain="
											select	*
											from	menu_detail
											where	parent=0
											order by menu_order
										";
										$resultMain=mysql_query($queryMain);
										$numrowsMain=mysql_num_rows($resultMain);
										$iMain=0;
										while($iMain<$numrowsMain){
											$rowMain=mysql_fetch_array($resultMain);
											$menuPermission=permission($rowMain[menu_id], $_SESSION[authen][ofID]);
											if($menuPermission[access]){
												$parent=$rowMain[menu_id];
												?>
													<td class="menu mainMenu" menu_id="<?php echo $rowMain[menu_id]?>">
														<div
															<?php
																if($rowMain[menu_pages]!=''){
																	?>onclick="window.open('?page=<?php echo $rowMain[menu_pages]?>','_self')"<?php
																} 
															?> 
														><?php echo $rowMain[menu_name];?></div>
														<div id="div_<?php echo $rowMain[menu_id]?>" class="divSubMenu"><?php showSub($parent,"0");?></div>
													</td>
												<?php
											}
											$iMain++;
										} 
									?>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
			<td
				style="
					background-image: url('images/header/headerBG.jpg');
					background-repeat: repeat-x;
					width: auto;
				"
			></td>
		</tr>
	</table>
</div>