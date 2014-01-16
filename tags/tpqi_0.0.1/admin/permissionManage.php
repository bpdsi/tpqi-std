<style>
<!--
	.menuManage_perList{
		cursor: pointer;
		padding-left: 10px;
		padding-right: 50px;
	}
	.menuManage_perList:hover{
		background-color: #fff;
	}
-->
</style>
<table class="table_01 table_topRadius" style="height: 100%;width: 100%;">
	<tr style="height: 25px;">
		<td class="table_header table_header_leftRadius">สิทธิ์การเข้าใช้ระบบ</td>
		<td id="permissionFor" class="table_header table_header_rightRadius"></td>
	</tr>
	<tr>
		<td class="right_dashed" valign="top" style="width:200px;">
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
						?>
							<tr>
								<td class="menuManage_perList mouseOver"
									style="
										background-image: url('images/userGroupIcon.png');
										background-repeat: no-repeat;
										background-position: 5px center;
										padding-left: 35px;
										height: 30px;
									"
									onclick="
										$('.menuManage_perList').css('background-color','');
										this.style.backgroundColor='#ffcaca';
										$.post('admin/showMenuTree.php',{
												perID: '<?php echo $row[perID]?>'
											},function(data){
												$('#permissionFor').html('สิทธิ์การเข้าใช้สำหรับ <b><?php echo $row[perName]?></b>');
												$('#menuTree').html(data);
											}
										);
									"
								><?php echo $row[perName]?></td>
							</tr>
						<?php
						$i++;
					}
				?>
			</table>
		</td>
		<td id="menuTree" style="padding: 10px;vertical-align: top;"></td>
	</tr>
	<tr>
		<td colspan="2" class="table_footer"></td>
	</tr>
</table>