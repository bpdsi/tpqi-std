<?
//�š�û����Թ 110
include"menu3.php";
?>
<script type="text/javascript" src="./js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	var ID;
	$(".edit_tr").click(function(){
		ID=$(this).attr('id');
		alert("eee");
		$("#key_func_code_"+ID).hide();
		$("#level_"+ID).hide();
		$("#levelname_"+ID).hide();
		$("#level_input_"+ID).show();
		$("#levelname_input_"+ID).show();
		$("#key_func_code_input_"+ID).show();
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
	var key_func_code=$("#key_func_code_input_"+ID).val();
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
				$("#key_func_code_"+ID).html(key_func_code);
				$("#level_"+ID).html(level);
				$("#levelname_"+ID).html(levelname);
				//alert("�ѹ�֡���º����");
				location.reload(true);
			},
			error: function(request,error){
				alert ( " Can't do because: " + error );
			}
		});
	}else{
		alert('��سҡ�͡���������ú��ǹ');
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
		<tr><td colspan='4'>��˹��дѺ�س�ز��ԪҪվ</td><tr>
		<tr>
			<td rowspan='1'>˹�ҷ����ѡ��Ъ���˹������ö��<br>(Key Functions and Title)</td>
			<td rowspan='1'>�дѺ�س�ز��ԪҪվ</td>
			<td colspan='1'>�س�ز��ԪҪվ</td>
			<td colspan='1'>&nbsp;</td>
		</tr>";
$i=1;		
while($row=mysql_fetch_array($r)):
	$level=	$row["levelid"];
	if(trim($level)==""){	
		$level="&nbsp;";
	}else{
		$level=	"�дѺ ".$row["levelid"];
	}
	echo "<tr id=".$i." class=\"edit_tr\">";
			$qs="SELECT * FROM   ontology  where LENGTH(term) = 3 ORDER BY term";
			$rc=mysql_query($qs);
			echo"<td class=\"edit_td\">
				<span id=\"key_func_code_".$i."\" class=\"text\">".$row["detail"]."</span>
				<select class=\"editbox\" id=\"key_func_code_input_".$i."\">";
					echo"<option value=\"\">-���͡ Key Function-</option>";
					while($ar = mysql_fetch_array($rc)){
						$selected="";
						if($row["key_func_code"]==$ar["term"])$selected="selected";
						echo"<option value=\"".$ar["term"]."\" ".$selected.">".$ar["detail"]."</option>";
					}
					echo"</select>
				</td>";
		
			echo"<td class=\"edit_td\">
				<input type='hidden' id='levedetailid_".$i."' name='levedetailid_".$i."' value='".$row["levedetailid"]."'>
				<span id=\"level_".$i."\" class=\"text\">".$level."</span>
				<select class=\"editbox\" id=\"level_input_".$i."\">";
					echo"<option value=\"\">-���͡�дѺ-</option>";
					for($l=1;$l<=9;$l++){
						$selected="";
						if($l==$row["level"])$selected="selected";
						echo"<option value=\"".$l."\" ".$selected.">�дѺ ".$l."</option>";
					}
					echo"</select>
			</td>
			<td class=\"edit_td\">
				<span id=\"levelname_".$i."\" class=\"text\">".$row["levelname"]."</span>
				<input type=\"text\" value=\"\" class=\"editbox\" id=\"levelname_input_".$i."\" size='30' maxlength='30' value=\"".$row["levelname"]."\">
			</td>
			<td><input type=\"button\" id=\"CmdBtn_".$i."\" value=\"�ѹ�֡\" onClick=\"dataManage(".$i.");\" ></td>
		</tr>";
		$i++;
endwhile;
	echo "<tr id=".$i." class=\"edit_tr\">";
			$qs="SELECT * FROM   ontology  where LENGTH(term) = 3 ORDER BY term";
			$rc=mysql_query($qs);
			echo"<td class=\"edit_td\">
				<span id=\"key_func_code_".$i."\" class=\"text\">".$row["detail"]."</span>
				<select class=\"editbox\" id=\"key_func_code_input_".$i."\">";
					echo"<option value=\"\">-���͡ Key Function-</option>";
					while($ar = mysql_fetch_array($rc)){
						$selected="";
						if($row["key_func_code"]==$ar["term"])$selected="selected";
						echo"<option value=\"".$ar["term"]."\" ".$selected.">".$ar["detail"]."</option>";
					}
					echo"</select>
				</td>";
		
			echo"<td class=\"edit_td\">
				<input type='hidden' id='levedetailid_".$i."' name='levedetailid_".$i."' value='".$row["leveldetailid"]."'>
				<span id=\"level_".$i."\" class=\"text\">".$level."</span>
				<select class=\"editbox\" id=\"level_input_".$i."\">";
					echo"<option value=\"\">-���͡�дѺ-</option>";
					for($l=1;$l<=9;$l++){
						$selected="";
						if($l==$row["level"])$selected="selected";
						echo"<option value=\"".$l."\" ".$selected.">�дѺ ".$l."</option>";
					}
					echo"</select>
			</td>
			<td class=\"edit_td\">
				<span id=\"levelname_".$i."\" class=\"text\">".$row["levelname"]."</span>
				<input type=\"text\" value=\"\" class=\"editbox\" id=\"levelname_input_".$i."\" size='30' maxlength='30' value=\"".$row["levelname"]."\">
			</td>
			<td><input type=\"button\" id=\"CmdBtn_".$i."\" value=\"�ѹ�֡\" onClick=\"dataManage(".$i.");\" ></td>
		</tr>";
echo"<table>";
?>