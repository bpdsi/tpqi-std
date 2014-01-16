<?
//ผลการประเมิน 110
include"menu3.php";
?>
<script type="text/javascript" src="./js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	var ID;
	$(".edit_tr").click(function(){
		ID=$(this).attr('id');
		$("#level_"+ID).hide();
		$("#levelname_"+ID).hide();
		$("#level_input_"+ID).show();
		$("#levelname_input_"+ID).show();
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
	var level=$("#level_input_"+ID).val();
	var levelname=$("#levelname_input_"+ID).val();
	var dataString = 'leveldetailid='+leveldetailid+'&key_func_code='+key_func_code+'&levelname='+levelname+'&levelid='+level;
	if($("#level_input_"+ID).val().length>0 && "#levelname_input_"+ID).val().length>0){
		//alert(dataString);
		$.ajax({
			type: "POST",
			url: "levelconfigCmd.php",
			data: dataString,
			cache: false,
							
			success: function(html){
				$("#level_"+ID).html(level);
				$("#levelname_"+ID).html(levelname);
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
	body{
		font-family:Arial, Helvetica, sans-serif;
		font-size:14px;
	}
	.editbox{
		display:none
	}
	td{
		padding:3px;
		border:solid 1px #000;
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
</style>

<?



$sql="select level_name.*, detail 
	from level_name,ontology 
	where level_name.key_func_code=ontology.term
	order by key_func_code, levelid";
$r=mysql_query($sql)or die(mysql_error()."<br>".$sql);
echo"<table border='1' cellpadding='0' cellspacing='0'>
		<tr><td colspan='4'>กำหนดระดับคุณวุฒิวิชาชีพ</td><tr>
		<tr>
			<td rowspan='1'>หน้าที่หลักและชื่อหน่วยสมรรถนะ<br>(Key Functions and Title)</td>
			<td rowspan='1'>ระดับคุณวุฒิวิชาชีพ</td>
			<td colspan='1'>คุณวุฒิวิชาชีพ</td>
			<td colspan='1'>&nbsp;</td>
		</tr>";
$i=1;		
while($row=mysql_fetch_array($r)):
	$level=	$row["levelid"];
	if(trim($level)==""){	
		$level="&nbsp;";
	}else{
		$level=	"ระดับ ".$row["levelid"];
	}
	echo "<tr id=".$i." class=\"edit_tr\">
			<td>".$i.".".$row["detail"]."</td>
			
			<td class=\"edit_td\">
				<input type='hidden' id='leveldetailid_".$i."' name='leveldetailid_".$i."' value='".$row["leveldetailid"]."'>
				<input type='hidden' id='key_func_code_".$i."' name='key_func_code_".$i."' value='".$keyFnc."'>
				<span id=\"level_".$i."\" class=\"text\">".$level."</span>
				<select class=\"editbox\" id=\"level_input_".$i."\">";
					echo"<option value=\"\">-เลือกระดับ-</option>";
					for($l=1;$l<=9;$l++){
						$selected="";
						if($l==$row["level"])$selected="selected";
						echo"<option value=\"".$l."\" ".$selected.">ระดับ ".$l."</option>";
					}
					echo"</select>
			</td>
			<td class=\"edit_td\">
				<span id=\"levelname_".$i."\" class=\"text\">".$row["levelname"]."</span>
				<input type=\"text\" value=\"\" class=\"editbox\" id=\"levelname_input_".$i."\" size='30' maxlength='30' value=\"".$row["levelname"]."\">
			</td>
			<td><input type=\"button\" id=\"CmdBtn_".$i."\" value=\"บันทึก\" onClick=\"dataManage(".$i.");\" ></td>
		</tr>";
		$i++;
endwhile;
echo "<tr id=".$i." class=\"edit_tr\">
			<td>".$i.".".$row["detail"]."</td>
			
			<td class=\"edit_td\">
				<input type='hidden' id='leveldetailid_".$i."' name='leveldetailid_".$i."' value='".$row["leveldetailid"]."'>
				<input type='hidden' id='key_func_code_".$i."' name='key_func_code_".$i."' value='".$keyFnc."'>
				<span id=\"level_".$i."\" class=\"text\">".$level."</span>
				<select class=\"editbox\" id=\"level_input_".$i."\">";
					echo"<option value=\"\">-เลือกระดับ-</option>";
					for($l=1;$l<=9;$l++){
						$selected="";
						if($l==$row["level"])$selected="selected";
						echo"<option value=\"".$l."\" ".$selected.">ระดับ ".$l."</option>";
					}
					echo"</select>
			</td>
			<td class=\"edit_td\">
				<span id=\"levelname_".$i."\" class=\"text\">&nbsp;</span>
				<input type=\"text\" value=\"\" class=\"editbox\" id=\"levelname_input_".$i."\" size='30' maxlength='30' value=\"".$row["levelname"]."\">
			</td>
			<td><input type=\"button\" id=\"CmdBtn_".$i."\" value=\"เพิ่ม\" onClick=\"dataManage(".$i.");\" ></td>
		</tr>";
echo"<table>";
?>