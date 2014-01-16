<style>
	.form_field{
		text-align: right;
	}
</style>
<div id="registDIV"
	style="
		display: none;
		position: absolute;
	"
>
	<table style="width: 100%;height: 100%;">
		<tr>
			<td style="text-align: center;vertical-align: middle">
				<div class="form" style="width: 700px;margin-left: auto;margin-right: auto;margin-top: 10px;">
					<table class="table_01" style="width: 100%;background-color: #fff;box-shadow: 1px 1px 8px #000">
						<tr>
							<td class="table_header table_topRadius" colspan="2">
								<div class="form_title" style="float: left;padding-left: 5px;">ระบบลงทะเบียนเจ้าหน้าที่</div>
								<img src="images/deleteIconSmall.png" style="float: right;margin-top: 3px;cursor: pointer;"
									onclick="$('#registDIV').fadeOut();"
								>
							</td>
						</tr>
						<tr>
							<td class="table_detail" align="center">
								<table style="width: 100%;">
									<tr>
										<td class="right_dashed" valign="top" align="center"
											style="width: 200px;vertical-align: middle;"
										>
											<img src="images/user.png"><br>
											<b>TPQI</b> Member
										</td>
										<td style="padding: 40px;">
											<form id="registForm" method="post" action="registerSQL.php">
												<table style="width: 100%;">
													<tr>
														<td class="form_field">ชื่อผู้ใช้</td>
														<td class="form_input">
															<input class="focus" type="text" name="user" id="user">
														</td>
													</tr>
													<tr>
														<td class="form_field">รหัสผ่าน</td>
														<td class="form_input"><input type="password" name="pass" id="pass"></td>
													</tr>
													<tr>
														<td class="form_field">ยืนยันรหัสผ่าน</td>
														<td class="form_input"><input type="password" name="passC" id="passC"></td>
													</tr>
													<tr>
														<td class="form_field">สิทธิการเข้าใช้ระบบ</td>
														<td class="form_input">
															<select name="perID" id="perID">
																<?php
																	$queryPer="
																		select	*
																		from	permission
																	";
																	$resultPer=mysql_query($queryPer);
																	$numrowsPer=mysql_num_rows($resultPer);
																	$iPer=0;
																	while($iPer<$numrowsPer){
																		$rowPer=mysql_fetch_array($resultPer);
																		?>
																			<option value="<?php echo $rowPer[perID]?>"><?php echo $rowPer[perName]?></option>
																		<?php
																		$iPer++;
																	}
																?>
															</select>
														</td>
													</tr>
													<tr>
														<td colspan="2" class="bottom_dashed" style="height: 10px;"></td>
													</tr>
													<tr>
														<td class="form_field" style="padding-top: 10px;">ชื่อ</td>
														<td class="form_input" style="padding-top: 10px;">
															<input class="focus" type="text" name="name" id="name">
														</td>
													</tr>
													<tr>
														<td class="form_field">นามสกุล</td>
														<td class="form_input">
															<input type="text" name="familyName" id="familyName">
														</td>
													</tr>
													<tr>
														<td class="form_field">ที่อยู่</td>
														<td class="form_input">
															<textarea id="address" name="address" style="width: 200px;height: 50px;"></textarea>
														</td>
													</tr>
													<tr>
														<td class="form_field">หมายเลขโทรศัพท์</td>
														<td class="form_input"><input type="text" name="telephone" id="telephone"></td>
													</tr>
													<tr>
														<td class="form_field">อีเมล์</td>
														<td class="form_input"><input type="text" name="email" id="email"></td>
													</tr>
												</table>
											</form>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="table_footer">
								<input class="nprButton" type='reset' value="   ยกเลิก   " style="float: left;"
									onclick="$('#registForm')[0].reset();"
								>
								<input id="submitButton" class="nprButton" type='submit' value="   บันทึก   " style="float: right"
									onclick="
										var	user=$('#user').val();
										var	pass=$('#pass').val();
										var	passC=$('#passC').val();
										var	name=$('#name').val();
										var	familyName=$('#familyName').val();
										var	address=$('#address').val();
										var	telephone=$('#telephone').val();
										var	email=$('#email').val();

										$.post('admin/checkUser.php',{
												user: user
											},function(data){
												if(parseInt(data)>0){
													alert(user+' มีผู้ใช้งานแล้ว');
													$('#user').focus();
												}else{
													if(user==''){
														alert('กรุณากรอก ชื่อผู้ใช้');
														$('#user').focus();
													}else if(pass==''){
														alert('กรุณากรอก รหัสผ่าน');
														$('#pass').focus();
													}else if(pass!=passC){
														alert('ยืนยันรหัสผ่านไม่ถูกค้อง');
														$('#passC').focus();
													}else if(name==''){
														alert('กรุณากรอก ชื่อ');
														$('#name').focus();
													}else if(familyName==''){
														alert('กรุณากรอก นามสกุล');
														$('#familyName').focus();
													}else if(address==''){
														alert('กรุณากรอก ที่อยู่');
														$('#address').focus();
													}else if(telephone==''){
														alert('กรุณากรอก หมายเลขโทรศัพท์');
														$('#telephone').focus();
													}else if(email==''){
														alert('กรุณากรอก อีเมล์');
														$('#email').focus();
													}else{
														$.post('admin/checkEmail.php',{
																email: email
															},function(data){
																if(data>0){
																	alert('อีเมล์ ซ้ำ');
																	$('#email').focus();
																}else{
																	$.post('admin/registerSQL.php',{
																			user: $('#user').val(),
																			pass: $('#pass').val(),
																			name: $('#name').val(),
																			familyName: $('#familyName').val(),
																			address: $('#address').val(),
																			telephone: $('#telephone').val(),
																			email: $('#email').val(),
																			perID: $('#perID').val()
																		},function(data){
																			alert(data);
																			if(data=='complete'){
																				$.post('admin/userList.php',{
																					},function(data){
																						$('#td_userList').html(data);
																					}
																				);
																				$('#user').val('');
																				$('#pass').val('');
																				$('#passC').val('');
																				$('#name').val('');
																				$('#familyName').val('');
																				$('#address').val('');
																				$('#telephone').val('');
																				$('#email').val('');
																				$('#registDIV').fadeOut(function(){
																					alert('Registration Complete');
																				});
																			}else{
																				alert('DB Connection Error');
																			}
																		}
																	);
																}
															}
														);
													}
												}
											}
										);
									"
								>
							</td>
						</tr>
					</table>
				</div>
			</td>
		</tr>
	</table>
</div>
<div id="editDIV"
	style="
		display: none;
		position: absolute;
		z-index: 1000;
	"
>
	<table style="width: 100%;height: 100%;">
		<tr>
			<td style="text-align: center;vertical-align: middle">
				<div class="form" style="width: 700px;margin-left: auto;margin-right: auto;margin-top: 10px;">
					<table class="table_01" style="width: 100%;">
						<tr>
							<td class="table_header table_topRadius" colspan="2">
								<div class="form_title" style="float: left;padding-left: 5px;">ระบบแก้ไขข้อมูลเจ้าหน้าที่</div>
								<img src="images/deleteIconSmall.png" style="float: right;margin-top: 3px;cursor: pointer;"
									onclick="$('#editDIV').fadeOut();"
								>
							</td>
						</tr>
						<tr>
							<td class="table_detail" align="center">
								<table style="width: 100%;">
									<tr>
										<td class="right_dashed" valign="top" align="center"
											style="width: 200px;vertical-align: middle;"
										>
											<img src="images/user.png"><br>
											<b>TPQI</b> Officer
										</td>
										<td style="padding: 40px;">
											<form id="editForm" method="post" action="registerSQL.php">
												<table style="width: 100%;">
													<tr>
														<td class="form_field">ชื่อผู้ใช้</td>
														<td class="form_input">
															<input type="hidden" name="ofID" id="ofID_e">
															<input class="focus" type="text" name="user_e" id="user_e">
														</td>
													</tr>
													<tr>
														<td class="form_field">รหัสผ่าน</td>
														<td class="form_input"><input type="password" name="pass_e" id="pass_e"></td>
													</tr>
													<tr>
														<td class="form_field">ยืนยันรหัสผ่าน</td>
														<td class="form_input"><input type="password" name="passC_e" id="passC_e"></td>
													</tr>
													<tr>
														<td class="form_field">สิทธิการเข้าใช้ระบบ</td>
														<td class="form_input">
															<select name="perID" id="perID_e">
																<?php
																	$queryPer="
																		select	*
																		from	permission
																	";
																	$resultPer=mysql_query($queryPer);
																	$numrowsPer=mysql_num_rows($resultPer);
																	$iPer=0;
																	while($iPer<$numrowsPer){
																		$rowPer=mysql_fetch_array($resultPer);
																		?>
																			<option value="<?php echo $rowPer[perID]?>"><?php echo $rowPer[perName]?></option>
																		<?php
																		$iPer++;
																	}
																?>
															</select>
														</td>
													</tr>
													<tr>
														<td colspan="2" class="bottom_dashed" style="height: 10px;"></td>
													</tr>
													<tr>
														<td class="form_field" style="padding-top: 10px;">ชื่อ</td>
														<td class="form_input" style="padding-top: 10px;">
															<input class="focus" type="text" name="name_e" id="name_e">
														</td>
													</tr>
													<tr>
														<td class="form_field">นามสกุล</td>
														<td class="form_input">
															<input type="text" name="familyName_e" id="familyName_e">
														</td>
													</tr>
													<tr>
														<td class="form_field">ที่อยู่</td>
														<td class="form_input">
															<textarea id="address_e" name="address_e" style="width: 200px;height: 50px;"></textarea>
														</td>
													</tr>
													<tr>
														<td class="form_field">หมายเลขโทรศัพท์</td>
														<td class="form_input"><input type="text" name="telephone_e" id="telephone_e"></td>
													</tr>
													<tr>
														<td class="form_field">อีเมล์</td>
														<td class="form_input"><input type="text" name="email_e" id="email_e"></td>
													</tr>
												</table>
											</form>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="table_footer">
								<input class="nprButton" type='reset' value="   ยกเลิก   " style="float: left;"
									onclick="$('#editForm')[0].reset();"
								>
								<input id="submitButton" class="nprButton" type='submit' value="   บันทึก   " style="float: right"
									onclick="
										var	ofID_e=$('#ofID_e').val();
										var	user_e=$('#user_e').val();
										var	pass_e=$('#pass_e').val();
										var	passC_e=$('#passC_e').val();
										var	name_e=$('#name_e').val();
										var	familyName_e=$('#familyName_e').val();
										var	address_e=$('#address_e').val();
										var	telephone_e=$('#telephone_e').val();
										var	email_e=$('#email_e').val();

										$.post('admin/checkUser.php',{
												User: user_e,
												ofID: ofID_e
											},function(data){
												if(parseInt(data)>0){
													alert(user_e+' มีผู้ใช้งานแล้ว');
													$('#user_e').focus();
												}else{
													if(user_e==''){
														alert('กรุณากรอก ชื่อผู้ใช้');
														$('#user_e').focus();
													}else if(pass_e!=passC_e){
														alert('ยืนยันรหัสผ่านไม่ถูกค้อง');
														$('#passC_e').focus();
													}else if(name_e==''){
														alert('กรุณากรอก ชื่อ');
														$('#name_e').focus();
													}else if(familyName_e==''){
														alert('กรุณากรอก นามสกุล');
														$('#familyName_e').focus();
													}else if(address_e==''){
														alert('กรุณากรอก ที่อยู่');
														$('#address_e').focus();
													}else if(telephone_e==''){
														alert('กรุณากรอก หมายเลขโทรศัพท์');
														$('#telephone_e').focus();
													}else if(email_e==''){
														alert('กรุณากรอก อีเมล์');
														$('#email_e').focus();
													}else{
														$.post('admin/checkEmail.php',{
																Email: email_e,
																ofID: ofID_e
															},function(data){
																if(data>0){
																	alert('อีเมล์ ซ้ำ');
																	$('#email_e').focus();
																}else{
																	$.post('admin/editSQL.php',{
																			ofID: $('#ofID_e').val(),
																			user: $('#user_e').val(),
																			pass: $('#pass_e').val(),
																			name: $('#name_e').val(),
																			familyName: $('#familyName_e').val(),
																			address: $('#address_e').val(),
																			telephone: $('#telephone_e').val(),
																			email: $('#email_e').val(),
																			perID: $('#perID_e').val()
																		},function(data){
																			if(data=='complete'){
																				$.post('admin/userList.php',{
																					},function(data){
																						$('#td_userList').html(data);
																					}
																				);
																				$('#ofID_e').val('');
																				$('#user_e').val('');
																				$('#pass_e').val('');
																				$('#passC_e').val('');
																				$('#name_e').val('');
																				$('#familyName_e').val('');
																				$('#address_e').val('');
																				$('#telephone_e').val('');
																				$('#email_e').val('');
																				$('#editDIV').fadeOut(function(){
																					alert('Edit Complete');
																				});
																			}else{
																				alert('DB Connection Error');
																			}
																		}
																	);
																}
															}
														);
													}
												}
											}
										);
									"
								>
							</td>
						</tr>
					</table>
				</div>
			</td>
		</tr>
	</table>
</div>
<table class="table_01" style="width: 100%;height: 100%;">
	<tr>
		<td class="right_solid table_header table_header_leftRadius" 
			style="
				height: 25px;
				padding-left: 5px;
			"
		>
			จัดการผู้ใช้ระบบ
			<input type="button" value="เพิ่มผู้ใช้ระบบ" style="float: right;"
				onclick="
					$('#registDIV').fadeIn();
					$('#registDIV').css('top',$(this).position().top+23);
					$('#registDIV').css('left',$(this).position().left-530);
				"
			>
		</td>
		<td class="table_header table_header_rightRadius" 
			style="
				height: 25px;
				padding-left: 5px;
			"
		>ข้อมูลผู้ใช้ระบบ</td>
	</tr>
	<tr>
		<td class="right_solid" style="vertical-align: top;">
			<table style="width: 100%;">
				<tr>
					<td style="text-align: right;">
						คำค้น 
						<input type="text" name="keyword" id="keyword"
							onkeyup="
								$.post('admin/userList.php',{
										keyword: $(this).val()
									},function(data){
										$('#td_userList').html(data);
									}
								);
							"
						>
					</td>
				</tr>
				<tr>
					<td id="td_userList" style="padding: 10px;"></td>
				</tr>
			</table>
		</td>
		<td id="td_preview" style="width: 300px;vertical-align: top"></td>
	</tr>
	<tr>
		<td colspan="2" class="table_footer"></td>
	</tr>
</table>
<script type="text/javascript">
	$(document).ready(function(){
		$.post('admin/userList.php',{
			},function(data){
				$('#td_userList').html(data);
			}
		);
	});
</script>