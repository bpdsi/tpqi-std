<style>
	.cb_formHeader{
		font-size: 30px;
		font-weight: bold;
	}
	.cb_bold{
		font-weight: bold;
	}
	.cb_tr1, .cb_tr2, .cb_tr3, .cb_tr4, .cb_tr5{
		display: none;
	}
	.cb_formEntryHeader{
		padding-top: 20px;
	}
	.cb_formEntryHeader:hover{
		background-color: #ffcaca;
		cursor: pointer;
	}
	.tabet{
		cursor: pointer;
		padding-left: 5px;
		padding-right: 5px;
		text-align: center;
		background-color: #dddddd;
		border-bottom: 1px solid #aaa;
		border-top: 1px solid #aaa;
		border-left: 1px solid #aaa;
		border-right: 1px solid #aaa;
	}
</style>
<table class="table_01" style="margin-left: auto;margin-right: auto;">
	<tr>
		<th>แบบฟอร์มลงทะเบียนขอรับการประเมิน</td>
	</tr>
	<tr>
		<td style="padding: 10px 40px 10px 40px;">
			<input type="button" value="Download PDF" style="float: right;"><br>
			<table>
				<tr>
					<td style="text-align: center">
						<img src="images/tpqiLogo.png"><br>
						<div class="cb_formHeader">สถาบันคุณวัฒิวิชาชีพ (องค์กรมหาชน)</div>
						<div class="cb_formHeader">คำขอรับเป็นองค์กรที่มีหน้าที่รับรองสมรรถนะของบุคคลตามมาตรฐานอาชีพ (CB)</div>
					</td>
				</tr>
				<tr>
					<td style="padding-top: 20px;">
						<table style="width: 800px;">
							<tr>
								<td class="tabet"
									onclick="
										$('.tabet_content').hide();
										$('.tabet').css('background-color','#dddddd');
										$('.tabet').css('border-bottom','1px solid #aaa');
										$(this).css('background-color','#ffffff');
										$(this).css('border-bottom','1px solid #fff');
										$('#tab01').show();
									"
									style="
										background-color: #ffffff;
										border-bottom: 1px solid #fff;
									"
								>ข้อมูลองค์กร</td>
								<td class="tabet"
									onclick="
										$('.tabet_content').hide();
										$('.tabet').css('background-color','#dddddd');
										$('.tabet').css('border-bottom','1px solid #aaa');
										$(this).css('background-color','#ffffff');
										$(this).css('border-bottom','1px solid #fff');
										$('#tab02').show();
									"
								>ผู้แทนองค์กร</td>
								<td class="tabet"
									onclick="
										$('.tabet_content').hide();
										$('.tabet').css('background-color','#dddddd');
										$('.tabet').css('border-bottom','1px solid #aaa');
										$(this).css('background-color','#ffffff');
										$(this).css('border-bottom','1px solid #fff');
										$('#tab03').show();
									"
								>ประเภทองค์กรที่ยื่นคำขอ</td>
								<td class="tabet"
									onclick="
										$('.tabet_content').hide();
										$('.tabet').css('background-color','#dddddd');
										$('.tabet').css('border-bottom','1px solid #aaa');
										$(this).css('background-color','#ffffff');
										$(this).css('border-bottom','1px solid #fff');
										$('#tab04').show();
									"
								>ขอบข่าย</td>
								<td class="tabet"
									onclick="
										$('.tabet_content').hide();
										$('.tabet').css('background-color','#dddddd');
										$('.tabet').css('border-bottom','1px solid #aaa');
										$(this).css('background-color','#ffffff');
										$(this).css('border-bottom','1px solid #fff');
										$('#tab05').show();
									"
								>เอกสารประกอบการสมัคร</td>
								<td class="tabet"
									onclick="
										$('.tabet_content').hide();
										$('.tabet').css('background-color','#dddddd');
										$('.tabet').css('border-bottom','1px solid #aaa');
										$(this).css('background-color','#ffffff');
										$(this).css('border-bottom','1px solid #fff');
										$('#tab06').show();
									"
								>ข้อมูลทั่วไปเกี่ยวกับการดำเนินงาน</td>
							</tr>
							<tr>
								<td colspan="6" 
									style="
										padding: 15px;
										border-left: 1px solid #aaa;
										border-bottom: 1px solid #aaa;
										border-right: 1px solid #aaa;
									"
								>
									<table id="tab01" class="tabet_content" style="margin-left: auto;margin-right: auto;width: 750px;">
										<tr>
											<td><div style="float: left;margin-right: 5px;">ชื่อองค์กรที่ยื่นคำขอ</div> <input type="text" style="width: 600px;float: right"></td>
										</tr>
										<tr>
											<td><div style="float: left;margin-right: 5px;">หมายเลขทะเบียนนิติบุคคล</div> <input type="text" style="width: 560px;float: right"></td>
										</tr>
										<tr>
											<td style="font-weight: bold">ที่ตั้งสำนักงานใหญ่</td>
										</tr>
										<tr>
											<td>
												<div style="float: left;margin-right: 5px;">
													เลขที่ <input type="text" style="width: 80px;margin-right: 10px;">
													หมู่ที่ <input type="text" style="width: 80px;margin-right: 10px;">
													ตรอก/ซอย
												</div>
												<input type="text" style="width: 385px;float:right">
											</td>
										</tr>
										<tr>
											<td>
												<div style="float: left;margin-right: 5px;">
													ถนน <input type="text" style="width: 109px;margin-right: 10px;">
													ตำบล/แขวง <input type="text" style="width: 125px;margin-right: 10px;">
													อำเภอ/เขต
												</div>
												<input type="text" style="width: 280px;float:right">
											</td>
										</tr>
										<tr>
											<td>
												<div style="float: left;margin-right: 5px;">
													จังหวัด <input type="text" style="width: 109px;margin-right: 10px;">
													รหัสไปีษณีย์ <input type="text" style="width: 84px;margin-right: 10px;">
													โทรศัพท์ <input type="text" style="width: 130px;margin-right: 10px;">
													โทรสาร
												</div>
												<input type="text" style="width: 130px;float:right">
											</td>
										</tr>
										<tr>
											<td><div style="float: left;margin-right: 5px;">เว็บไซด์</div> <input type="text" style="width: 663px;float: right"></td>
										</tr>
										<tr>
											<td>
												<div style="float: left;margin-right: 5px;">
													เวลาทำการ ตั้งแต่วัน <input type="text" style="width: 153px;margin-right: 10px;">
													ถึง <input type="text" style="width: 153px;margin-right: 10px;">
													เวลา
													<select>
														<?php
															for($i=1;$i<=24;$i++){
																?><option><?php echo str_pad($i, 2,'0',STR_PAD_LEFT);?></option><?php 
															}
														?>
													</select>:<select>
														<?php
															for($i=0;$i<=59;$i++){
																?><option><?php echo str_pad($i, 2,'0',STR_PAD_LEFT);?></option><?php 
															}
														?>
													</select>
													ถึง
												</div>
												<select>
													<?php
														for($i=1;$i<=24;$i++){
															?><option><?php echo str_pad($i, 2,'0',STR_PAD_LEFT);?></option><?php 
														}
													?>
												</select>:<select>
													<?php
														for($i=0;$i<=59;$i++){
															?><option><?php echo str_pad($i, 2,'0',STR_PAD_LEFT);?></option><?php 
														}
													?>
												</select>
											</td>
										</tr>
									</table>
									<table id="tab02" class="tabet_content" style="margin-left: auto;margin-right: auto;display: none;width: 750px;">
										<tr>
											<td>
												<div style="float: left;margin-right: 5px;">
													ชื่อ <input type="text" style="width: 246px;margin-right: 10px;">
													ตำแหน่ง 
												</div>
												<input type="text" style="width: 376px;float:right">
											</td>
										</tr>
										<tr>
											<td>
												<div style="float: left;margin-right: 5px;">
													โทรศัพท์ <input type="text" style="width: 165px;margin-right: 10px;">
													โทรสาร <input type="text" style="width: 165px;margin-right: 10px;">
													โทรศัพท์มือถือ
												</div>
												<input type="text" style="width: 162px;float:right">
											</td>
										</tr>
										<tr>
											<td>
												<div style="float: left;margin-right: 5px;">
													อี-เมล์ <input type="text" style="width: 290px;margin-right: 10px;">
													อี-เมล์สำรอง 
												</div>
												<input type="text" style="width: 290px;float:right">
											</td>
										</tr>
									</table>
									<table id="tab03" class="tabet_content" style="margin-left: auto;margin-right: auto;display: none;width: 750px;">
										<tr>
											<td>
												<table style="width: 750px;">
													<tr>
														<td style="padding-right: 10px;width: 20px;"><input type="checkbox"></td>
														<td>หน่วยงานภาครัฐ</td>
													</tr>
													<tr>
														<td style="padding-right: 10px;"><input type="checkbox"></td>
														<td>หน่วยงานเอกชน</td>
													</tr>
													<tr>
														<td style="padding-right: 10px;"><input type="checkbox"></td>
														<td>สถาบันศึกษา สังกัด <input type="text" style="width: 600px;float: right"></td>
													</tr>
													<tr>
														<td style="padding-right: 10px;"><input type="checkbox"></td>
														<td>อื่นๆ ระบุ <input type="text" style="width: 650px;float: right"></td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
									<table id="tab04" class="tabet_content" style="margin-left: auto;margin-right: auto;display: none;width: 750px;">
										<tr>
											<td style="padding-left: 20px;">(ระบุได้มากกว่า ๑ มาตรฐานอาชีพ)</td>
										</tr>
										<tr>
											<td>
												<table style="width: 750px;">
													<tr>
														<td style="width: 25px;vertical-align: top;">๔.๑</td>
														<td>
															<div style="float: left;margin-right: 5px;">
																มาตรฐานอาชีพ <input type="text" style="width: 246px;margin-right: 10px;">
																สาขา 
															</div>
															<input type="text" style="width: 280px;float:right"><br>
															<div style="float: left;margin-right: 5px;">
																สายงาน <input type="text" style="width: 246px;margin-right: 10px;">
																ระดับที่  <input type="text" style="width: 150px;">
															</div>
														</td>
													</tr>
													<tr>
														<td style="width: 25px;vertical-align: top;">๔.๒</td>
														<td>
															<div style="float: left;margin-right: 5px;">
																มาตรฐานอาชีพ <input type="text" style="width: 246px;margin-right: 10px;">
																สาขา 
															</div>
															<input type="text" style="width: 280px;float:right"><br>
															<div style="float: left;margin-right: 5px;">
																สายงาน <input type="text" style="width: 246px;margin-right: 10px;">
																ระดับที่  <input type="text" style="width: 150px;">
															</div>
														</td>
													</tr>
													<tr>
														<td style="width: 25px;vertical-align: top;">๔.๓</td>
														<td>
															<div style="float: left;margin-right: 5px;">
																มาตรฐานอาชีพ <input type="text" style="width: 246px;margin-right: 10px;">
																สาขา 
															</div>
															<input type="text" style="width: 280px;float:right"><br>
															<div style="float: left;margin-right: 5px;">
																สายงาน <input type="text" style="width: 246px;margin-right: 10px;">
																ระดับที่  <input type="text" style="width: 150px;">
															</div>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
									<table id="tab05" class="tabet_content" style="margin-left: auto;margin-right: auto;display: none;width: 750px;">
										<tr>
											<td>
												<table style="width: 750px;">
													<tr>
														<td style="width: 25px;vertical-align: top;">๕.๑</td>
														<td style="vertical-align: top;">
															สำเนาหนังสือรับรองระบบงานหน่วยงานรับรองบุคลากรภายใต้พระราชบัญญัติการมาตรฐานแห่งชาติ (คณะกรรมการมาตรฐานแห่งชาติ)
														</td>
														<td><input type="button" value="BROWSE"></td>
													</tr>
													<tr>
														<td style="width: 25px;vertical-align: top;">๕.๒</td>
														<td style="vertical-align: top;">
															สำเนาหนังสือรับรองการจดทะเบียนนิติบุคคล
														</td>
														<td><input type="button" value="BROWSE"></td>
													</tr>
													<tr>
														<td style="width: 25px;vertical-align: top;">๕.๓</td>
														<td style="vertical-align: top;">
															สำเนาทะเบียนบ้าน และสำเนาบัตรประจำตัวประชาชนของผู้มีอำนาจลงนามผูกพันนิติบุคคล
														</td>
														<td><input type="button" value="BROWSE"></td>
													</tr>
													<tr>
														<td style="width: 25px;vertical-align: top;">๕.๔</td>
														<td style="vertical-align: top;">
															หนังสือมอบอำนาจ พร้อมสำเนาบัตรประชาชนของผู้มอบอำนาจ (ในกรณีที่มีการมอบอำนาจ)
														</td>
														<td><input type="button" value="BROWSE"></td>
													</tr>
													<tr>
														<td style="width: 25px;vertical-align: top;">๕.๕</td>
														<td style="vertical-align: top;">
															ตัวอย่างคู่มือคุณภาพ
														</td>
														<td><input type="button" value="BROWSE"></td>
													</tr>
													<tr>
														<td style="width: 25px;vertical-align: top;">๕.๖</td>
														<td style="vertical-align: top;">
															ตัวอย่างขั้นตอนการดำเนินงาน
														</td>
														<td><input type="button" value="BROWSE"></td>
													</tr>
													<tr>
														<td style="width: 25px;vertical-align: top;">๕.๗</td>
														<td style="vertical-align: top;">
															ข้อมูลทั่วไปเกี่ยวกับขอบข่ายที่ขอรับรอง
														</td>
														<td><input type="button" value="BROWSE"></td>
													</tr>
													<tr>
														<td style="width: 25px;vertical-align: top;">๕.๘</td>
														<td style="vertical-align: top;">
															รายชื่อผู้ขอรับรองสมาถนะของบุคคลตามมาตรฐานอาชีพ
														</td>
														<td><input type="button" value="BROWSE"></td>
													</tr>
													<tr>
														<td style="width: 25px;vertical-align: top;">๕.๙</td>
														<td style="vertical-align: top;">
															รายชื่อเจ้าหน้าที่สอบ
														</td>
														<td><input type="button" value="BROWSE"></td>
													</tr>
													<tr>
														<td style="width: 25px;vertical-align: top;">๕.๑๐</td>
														<td style="vertical-align: top;">
															แผนที่ระบุที่ตั้งสำนักงานใหญ่ และสาขา (ถ้ามี)
														</td>
														<td><input type="button" value="BROWSE"></td>
													</tr>
													<tr>
														<td style="width: 25px;vertical-align: top;">๕.๑๑</td>
														<td style="vertical-align: top;">
															เอกสารแนบประกอบคำขออื่นๆ (ถ้ามี)
														</td>
														<td><input type="button" value="BROWSE"></td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
									<table id="tab06" class="tabet_content" style="margin-left: auto;margin-right: auto;display: none;width: 750px;">
										<tr>
											<td class="cb_tr6">
												<table style="width: 750px;">
													<tr>
														<td style="font-weight: bold;">โปรดกรอกข้อมูลให้ละเอียดตามความเป็นจริง ข้อมูลใดไม่เกี่ยวข้องให้ละทิ้งไว้</td>
													</tr>
													<tr>
														<td>
															<table style="width: 100%;">
																<tr>
																	<td style="width: 25px;">๖.๑</td>
																	<td><div style="float: left;margin-right: 5px;">ชื่อองค์กร</div> <input type="text" style="width: 600px;float: right"></td>
																</tr>
																<tr>
																	<td style="width: 25px;">๖.๒</td>
																	<td><div style="float: left;margin-right: 5px;">ขอบข่ายการดำเนินธุรกิจของทั้งองค์กร</div></td>
																</tr>
																<tr>
																	<td style="width: 25px;" colspan="2">
																		<textarea style="width: 682px;height: 50px"></textarea>
																	</td>
																</tr>
																<tr>
																	<td style="width: 25px;">๖.๓</td>
																	<td><div style="float: left;margin-right: 5px;">การบริหารและบุคลากร</div></td>
																</tr>
																<tr>
																	<td></td>
																	<td>
																		<table>
																			<tr>
																				<td>๖.๓.๑</td>
																				<td>โครงสร้างการบริหารองค์กร</td>
																			</tr>
																			<tr>
																				<td></td>
																				<td>- แผนภูมิแสดงสายการบริหาร อำนาจเจ้าหน้าที่ของแต่ละหน่วยงาน และจำนวนบุคลากรในแต่ละหน่วยงาน</td>
																				<td><input type="button" value="BROWSE"></td>
																			</tr>
																			<tr>
																				<td></td>
																				<td>- รายละเอียดความสัมพันธ์ระหว่างองค์กรกับหน่วยงานต่างๆ ที่เกี่ยวข้อง (Related body)</td>
																				<td><input type="button" value="BROWSE"></td>
																			</tr>
																			<tr>
																				<td>๖.๓.๒</td>
																				<td>บุคลากรด้านการตรวจประเมินในขอบข่ายที่ขอรับการรับรอง</td>
																			</tr>
																			<tr>
																				<td></td>
																				<td colspan="2">
																					<table>
																						<tr>
																							<td>บุคลากรภายในหน่วยรับรอง</td>
																							<td><input type="text" style="width: 30px;"></td>
																							<td>คน</td>
																						</tr>
																						<tr>
																							<td style="padding-left: 20px;">หัวหน้าเจ้าหน้าที่สอบ</td>
																							<td><input type="text" style="width: 30px;"></td>
																							<td>คน</td>
																						</tr>
																						<tr>
																							<td style="padding-left: 20px;">เจ้าหน้าที่สอบ (Examiner)</td>
																							<td><input type="text" style="width: 30px;"></td>
																							<td>คน</td>
																						</tr>
																						<tr>
																							<td style="padding-left: 20px;">ผู้เชี่ยวชาญสาขาอาชีพ</td>
																							<td><input type="text" style="width: 30px;"></td>
																							<td>คน</td>
																						</tr>
																						<tr><td style="height: 10px;"></td></tr>
																						<tr>
																							<td>บุคลากรภายนอกหน่วยรับรอง</td>
																							<td><input type="text" style="width: 30px;"></td>
																							<td>คน</td>
																						</tr>
																						<tr>
																							<td style="padding-left: 20px;">หัวหน้าเจ้าหน้าที่สอบ</td>
																							<td><input type="text" style="width: 30px;"></td>
																							<td>คน</td>
																						</tr>
																						<tr>
																							<td style="padding-left: 20px;">เจ้าหน้าที่สอบ (Examiner)</td>
																							<td><input type="text" style="width: 30px;"></td>
																							<td>คน</td>
																						</tr>
																						<tr>
																							<td style="padding-left: 20px;">ผู้เชี่ยวชาญสาขาอาชีพ</td>
																							<td><input type="text" style="width: 30px;"></td>
																							<td>คน</td>
																						</tr>
																					</table>
																				</td>
																			</tr>
																		</table>
																	</td>
																</tr>
																<tr>
																	<td style="width: 25px;vertical-align: top;">๖.๔</td>
																	<td>
																		<div style="float: left;margin-right: 5px;">
																			การได้รับการรับรองจากองค์กรอื่น<br>
																			(ถ้ามี โปรดระบุหน่วยรับบรองระบบงาน และขอบข่ายที่ได้รับรองระบบงาน)
																		</div>
																	</td>
																</tr>
																<tr>
																	<td colspan="2">
																		<textarea style="width: 682px;height: 50px"></textarea>
																	</td>
																</tr>
																<tr>
																	<td style="width: 25px;vertical-align: top;">๖.๕</td>
																	<td>
																		<div style="float: left;margin-right: 5px;">การได้รับการรับรองจากองค์กรอื่น</div>
																	</td>
																</tr>
																<tr>
																	<td colspan="2">
																		<textarea style="width: 682px;height: 50px"></textarea>
																	</td>
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
					</td>
				</tr>						
			</table>
		</td>
	</tr>
	<tr>
		<th><input type="button" value="ส่งใบสมัคร" style="float: right"></th>
	</tr>
</table>
