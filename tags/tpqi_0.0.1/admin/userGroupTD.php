<?php
	include "../function/functionPHP.php";
	noCache();
	host();
	headerEncode();
?>
<div id="registDIV"
	style="
		position: absolute;
		display: none;
	"
>
	<table class="table_01">
		<tr>
			<td colspan="2" class="table_header table_header_leftRadius table_header_rightRadius">
				แกไขกลุ่มผู้ใช้ระบบ
				<img src="images/deleteIconSmall.png" style="float: right;padding-top: 3px;cursor: pointer"
					onclick="$('#registDIV').fadeOut();"
				>
			</td>
		</tr>
		<tr>
			<td style="padding: 10px;">
				<table>
					<tr>
						<td class="form_field">ชื่อกลุ่มผู้ใช้ระบบ</td>
						<td class="form_input">
							<input type="hidden" id="perID" name="perID">
							<input type="text" id="perName" name="perName" style="width: 200px;">
						</td>
					</tr>
					<tr>
						<td class="form_field">คำอธิบาย</td>
						<td class="form_input">
							<textarea id="detail" style="width: 400px;height: 50px;"></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>		
		<tr>
			<td colspan="2" class="table_footer">
				<input type="button" value="บันทึก" style="float: right;"
					onclick="
						var perID=$('#perID').val();
						var perName=$('#perName').val();
						var detail=$('#detail').val();
						if(perName==''){
							alert('กรุณากรอก ชื่อกลุ่มผู้ใช้ระบบ');
							$('#perName').focus();
						}else{
							$.post('admin/userGroupEditSQL.php',{
									perID: perID,
									perName: perName,
									detail: detail
								},function(data){
									if(data=='complete'){
										alert('เพิ่มกลุ่มผู้ใช้ระบบเรียบร้อย');
										$.post('admin/userGroupTD.php',{
											},function(data){
												$('#userTitleTD').html('กลุ่มผู้ใช้ระบบทั้งหมด');
												$('#userGroupTD').html(data);
											}
										);
									}else if(data=='duplicated'){
										alert('ชื่อกลุ่มผู้ใช้ระบบซ้ำ');
									}else{
										alert('ไม่สามารถเพิ่มกลุ่มผู้ใช้ระบบได้');
									}
								}
							);
						}
					"
				>
			</td>
		</tr>
	</table>
</div>
<table style="width: 100%;">
	<?php
		 $query="
			select		*
			from		permission
			order by	perName
		";
		$result=mysql_query($query);
		$numrows=mysql_num_rows($result);
		$i=0;
		while($i<$numrows){
			$row=mysql_fetch_array($result);
			
			$queryCount="
				select	count(*) as 'userCount'
				from	officer
				where	perID='$row[perID]'
			";
			$resultCount=mysql_query($queryCount);
			$rowCount=mysql_fetch_array($resultCount);
			$userCount=$rowCount[userCount];
			?>
				<tr id="<?php echo $row[perID]?>">
					<td class="bottom_dashed" style="padding: 10px;"><img src="images/userGroup.png"></td>
					<td class="bottom_dashed" style="padding: 10px;" style="vertical-align: middle;">
						<table class="noSpacing" style="width: 100%;">
							<tr>
								<td>
									<div style="float: left;font-weight: bold;"><?php echo $row[perName]?></div>
									<div style="float: right">
										<?php
											if($userCount==0){
												?>
													<img src="images/deleteIconSmall.png"
														style="cursor: pointer;"
														onclick="
															if(confirm('ต้องการลบกลุ่มผู้ใช้นี้')){
																$.post('admin/userGroupDelete.php',{
																		perID: '<?php echo $row[perID]?>'
																	},function(data){
																		if(data=='complete'){
																			$('#<?php echo $row[perID]?>').fadeOut();
																		}
																	}
																);
															}
														"
													>
												<?php
											} 
										?>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div id="detail<?php echo $row[perID]?>"
										style="
											height: 50px;
											overflow:auto;
											border: 1px solid #bbb;
											width: 624px;
										"
									><?php echo $row[detail]?></div>
									<input type="button" value="Edit" style="float: right;"
										onclick="
											$('#perID').val('<?php echo $row[perID]?>');
											$('#perName').val('<?php echo $row[perName]?>');
											$('#detail').val($('#detail<?php echo $row[perID]?>').html());
											$('#registDIV').fadeIn();
											$('#registDIV').css('left',$(this).position().left-500);
											$('#registDIV').css('top',$(this).position().top);
										"
									>
								</td>
							</tr>
						</table>						
					</td>
				</tr>
			<?php 
			$i++;
		} 
	?>
</table>