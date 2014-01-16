<?php
	include "../function/functionPHP.php";
	noCache();
	host();
	headerEncode();
?>
<table class="border_solid" style="margin-left: auto;margin-right: auto;margin-top: 30px;margin-bottom: 30px;">
	<tr>
		<td class="" style="padding: 10px;font-weight: bold;">
			<img src="images/userGroup.png">
		</td>
		<td style="padding: 10px;" style="vertical-align: middle;">
			<table>
				<tr>
					<td class="form_field">ชื่อกลุ่มผู้ใช้ระบบ</td>
					<td class="form_input"><input type="text" id="perName" name="perName" style="width: 200px;"></td>
				</tr>
				<tr>
					<td class="form_field">คำอธิบาย</td>
					<td class="form_input">
						<textarea id="detail" style="width: 400px;height: 50px;"></textarea>
					</td>
				</tr>
				<tr>
					<td colspan="2" id="aa">
						<input type="button" value="บันทึก" style="float: right;"
							onclick="
								var perName=$('#perName').val();
								var detail=$('#detail').val();
								if(perName==''){
									alert('กรุณากรอก ชื่อกลุ่มผู้ใช้ระบบ');
									$('#perName').focus();
								}else{
									$.post('admin/userGroupRegistSQL.php',{
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
		</td>
	</tr>
</table>