<script type="text/javascript">
	function countLine(text){
		var lines = text.split(/\r|\r\n|\n/);
		var count = lines.length;
		return count;
	}
	$('document').ready(function(){
		$('.input_textarea').keyup(function(){
			$(this).css('height',(countLine($(this).val()))*16);
		}).keypress(function(){
			if(event.keyCode==34 || event.keyCode==39){
				alert('ไม่สามารถใส่เครื่องหมายคำพูดลงในกลอ่งข้อความได้');
				return false;
			}
		});
	});
</script>
<style>
	.input_textarea{
		height: 16px;
		line-height: 16px;
		margin: 0px;
		outline: none;
		-webkit-appearance: none;
		border: none;
		width: 460px;
	}
	.td_textarea{
		vertical-align: top;
		padding: 0px;
		height: 20px;
		border-spacing: 0px;
		border: 1px solid #aaa;
		width: 460px;
	}
	.td_addButton, .td_delButton{
		width: 20px;
		vertical-align: middle;
		text-align: center;
		border: 1px solid #aaa;
		height: 16px;
		cursor: pointer;
	}
	.td_addButton:hover, .td_delButton:hover{
		background: #ddd;
	}
</style>
<table class="table_01" style="width: 100%;">
	<tr>
		<td class="table_header table_topRadius">ระบบจัดการมาตรฐานอาชีพ</td>
	</tr>
	<tr>
		<td>
			<form method="post" action="proStdManage/proStdSaveTempSQL.php" target="_blank">
				<input type="hidden" id="lineCount" name="lineCount" value="1">
				<div style="float: right">
					เลือกความมุ่งหมายหลัก (Key Purpose)
					<select name="indID">
						<?php
							$query="
								select		*
								from		industry_group
								order by	indID
							";
							$result=mysql_query($query);
							$numrows=mysql_num_rows($result);
							$i=0;
							while($i<$numrows){
								$row=mysql_fetch_array($result);
								?>
									<option value="<?php echo $row[indID]?>"><?php echo $row[indID]?> : <?php echo $row[indName]?></option>
								<?php
								$i++;							
							}
						?>
					</select><br>
					Key Purpose <input type="text" name="keyPurpose" style="width: 300px;">
				</div>
				<table class="noSpacing" id="table_dataEntry" style="width: 99%;margin-left: auto;margin-right: auto;">
					<tr>
						<td>Key Role</td>
						<td>Key Function</td>
					</tr>
					<tr class="tr_dataEntry">
						<td class="td_textarea">
							<textarea class="input_textarea" name="keyRole[]"></textarea>
						</td>
						<td class="td_textarea">
							<textarea class="input_textarea" name="keyFunction[]"></textarea>
						</td>
						<td class="td_addButton">
							<input type="button" value="+" style="background: #fff;border: none;"
								onclick="
									$(this).closest('.tr_dataEntry').clone().insertAfter($(this).parents('tr').eq(0));
									$('#lineCount').val(parseInt($('#lineCount').val())+1);
								"
							>
						</td>
						<td class="td_delButton">
							<input type="button" value="-" style="background: #fff;border: none;"
								onclick="$(this).closest('.tr_dataEntry').remove();"
							>
						</td>
					</tr>
				</table>
				<input type="button" value="Save" style="float: right;" onclick="form.submit();">
			</form>
		</td>
	</tr>
	<tr>
		<td class="table_footer"></td>
	</tr>
</table>