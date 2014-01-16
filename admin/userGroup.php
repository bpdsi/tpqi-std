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
		<td class="table_header table_header_leftRadius">กลุ่มผู้ใช้ระบบ</td>
		<td id="userTitleTD" class="table_header table_header_rightRadius"></td>
	</tr>
	<tr>
		<td class="right_dashed" valign="top" style="width:210px;">
			<table style="width: 100%;">
				<tr>
					<td class="menuManage_perList mouseOver"
						style="
							background-image: url('images/userSetting.png');
							background-repeat: no-repeat;
							background-position: 5px center;
							padding-left: 35px;
							height: 30px;
						"
						onclick="
							$('.menuManage_perList').css('background-color','');
							this.style.backgroundColor='#ffcaca';
							$.post('admin/userGroupTD.php',{
								},function(data){
									$('#userTitleTD').html('กลุ่มผู้ใช้ระบบทั้งหมด');
									$('#userGroupTD').html(data);
								}
							);
						"
					>กลุ่มผู้ใช้ระบบทั้งหมด</td>
				</tr>
				<tr>
					<td class="menuManage_perList mouseOver"
						style="
							background-image: url('images/userSetting.png');
							background-repeat: no-repeat;
							background-position: 5px center;
							padding-left: 35px;
							height: 30px;
						"
						onclick="
							$('.menuManage_perList').css('background-color','');
							this.style.backgroundColor='#ffcaca';
							$.post('admin/userGroupRegist.php',{
								},function(data){
									$('#userTitleTD').html('เพิ่มกลุ่มผู้ใช้ระบบ');
									$('#userGroupTD').html(data);
								}
							);
						"
					>เพิ่มกลุ่มผู้ใช้ระบบ</td>
				</tr>
			</table>
		</td>
		<td id="userGroupTD" style="padding: 10px;vertical-align: top;"></td>
	</tr>
	<tr>
		<td colspan="2" class="table_footer"></td>
	</tr>
</table>