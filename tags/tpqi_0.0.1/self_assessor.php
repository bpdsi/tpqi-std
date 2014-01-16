<script type="text/javascript" src="./js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	var ID;
	$(".edit_trx").click(function(){
		ID=$(this).attr('id');
		$("#level_"+ID).hide();
		$("#level_input_"+ID).show();
	})

	// Edit input box click action
	$(".editbox").mouseup(function(){
		var leveldetailid=$("#leveldetailid_"+ID).val();
		//alert(ID);
		if(leveldetailid.length>0){
			return false
		}else{
			return true;
		}
	});
	
	// Outside click action
	$(document).mouseup(function(){
		$(".editbox").hide();
		$(".text").show();
	});
	
});
function dataManage(ID){
	var leveldetailid=$("#leveldetailid_"+ID).val();
	var key_func_code=$("#key_func_code_"+ID).val();
	var unit_competence=$("#unit_competence_"+ID).val();
	var level=$("#level_input_"+ID).val();
	var dataString = 'leveldetailid='+leveldetailid+'&key_func_code='+key_func_code+'&unit_competence='+unit_competence+'&level='+level;
	if($("#level_input_"+ID).val().length>0){
		//alert(dataString);
		$.ajax({
			type: "POST",
			url: "leveldetailCmd.php",
			data: dataString,
			cache: false,
							
			success: function(html){
				$("#level_"+ID).html(level);
				//alert("บันทึกเรียบร้อย");
				location.reload(true);
			},
			error: function(request,error){
				alert ( " Can't do because: " + error );
			}
		});
	}else{
		alert('กรุณากรอกข้อมูลให้ครบถ้วน');
	}
}
</script>
<style type='text/css'>
	.editbox{
		display:none
	}
	.editbox{
		font-size:14px;
		<!--width:270px;-->
		background-color:#ffffcc;
		border:solid 1px #000;
		padding:2px;
	}
	.edit_tr:hover{
		background:url(edit.png) right no-repeat #80C8E5;
		cursor:pointer;
	}
	.edit_td{
		text-align: center;
	}
</style>

<?php
	$keyFnc="๑๐๑";//$_GET["keyFnc"];
	/*$sqlcheck="select count(*) from level_competence where key_func_code='".trim($keyFnc)."'";
	$rcheck=mysql_query($sqlcheck)or die(mysql_error()."<br>".$sqlcheck);
	$rowcheck=mysql_fetch_array($rcheck);
	if($rowcheck[0]<1){
		$sqldata="select term from ontology where parent in(select ident from ontology where term='".$keyFnc."')";
		$rdata=mysql_query($sqldata)or die(mysql_error()."<br>Ready data<br>".$sqldata);
		while($rowdata=mysql_fetch_array($rdata)):
			$sqlinsert="insert into level_competence(key_func_code, unit_competence)values('".trim($keyFnc)."', '".$rowdata["term"]."')";
			$rinsert=mysql_query($sqlinsert)or die(mysql_error()."<br>Ready insert database<br>".$sqlinsert);
		endwhile;
		
	}*/
	$sql="select level_competence.*, detail from level_competence,ontology where level_competence.unit_competence=ontology.term";
	$r=mysql_query($sql)or die(mysql_error()."<br>".$sql);
?>
<table style="width: 100%;">
	<tr>
		<td valign="top" align="center" style="width: 400px;">
			<img src="images/selfAssessor.png"><br>
			<h2>ตรวจสอบสมรรถนะ</h2>
		</td>
		<td>
			<table style="margin-left: auto;margin-right: auto;">
				<tr>
					<td>
						<form action='?page=self_assessorCmd.php' method='POST'>
							<table class="noSpacing table_01" style="margin: 5px;">
								<tr>
									<td class="table_header bottom_solid right_solid" colspan="2" rowspan='1'
										style="border-top-left-radius: 10px;"
									>หน้าที่หลักและชื่อหน่วยสมรรถนะ<br>(Key Functions and Title)</td>
									<td class="table_header bottom_solid right_solid" rowspan='1'
										style="padding: 0px 10px 0px 10px;"
									>เลขที่หน่วย<br>(Unit No)</td>
									<td class="table_header bottom_solid" colspan='1'
										style="border-top-right-radius: 10px;"
									>สมรรถนะที่มี</td>
								</tr>
								<?php
									$i=0;
									$sqlfunc="
										select	key_func_code,
												detail,
												level 
										from	level_competence,
												ontology 
										where	level_competence.key_func_code=ontology.term
									";
									$rfunc=mysql_query($sqlfunc)or die(mysql_error()."<br>".$sqlfunc);
									$rowfunc=mysql_fetch_array($rfunc);
								?>
								<tr>
									<td colspan='4' class="bottom_solid"><h3><?php echo $rowfunc["key_func_code"]." ".$rowfunc["detail"]?></h3></td>
								</tr>
								<?php			
									while($row=mysql_fetch_array($r)):
										$i++;
										$level=	$row["level"];
										?>
											<tr id="<?php echo $i;?>" class="edit_tr">
												<td class="bottom_dashed" style="padding: 5px 0px 5px 30px;width: 10px;"><?php echo $i.".";?></td>
												<td class="bottom_dashed right_solid"><?php echo $row[detail];?></td>
												<td class="bottom_dashed right_solid" style="text-align: center;"><?php echo $row[unit_competence];?></td>
												<td class="edit_td bottom_dashed">
													<input type='hidden' id='key_func_code_<?php echo $i;?>' name='key_func_code_<?php echo $i;?>' value='<?php echo $keyFnc?>'>
													<input type='hidden' id='unit_competence_<?php echo $i;?>' name='unit_competence_<?php echo $i;?>' value='<?php echo $row[unit_competence]?>'>
													<input type='hidden' id='countcheck' name='countcheck' value='<?php echo $i;?>'>
													<input type='checkbox'  id="level_input_<?php echo $i;?>" name='level_input_<?php echo $i;?>' value='<?php echo $row[level]?>'>
												</td>
											</tr>
										<?php
									endwhile;
								?>
								<tr>
									<td colspan="4" class="top_solid form_footer table_footer"><input type='submit' value='สมรรถนะที่ได้'></td>
								</tr>
							</table>
						</form>
					</td>
					<td id="td_reault" valign="top"></td>
				</tr>
			</table>
		</td>
	</tr>
</table>