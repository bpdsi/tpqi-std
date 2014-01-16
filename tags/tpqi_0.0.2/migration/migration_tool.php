<?
$step=$_POST["step"];
    $form1="";
    $form2="disabled";
    $form3="disabled";
if($step==1 ){
    $form1="disabled";
    $form2="";
}
elseif($step==2){
    $form1="disabled";
    $form2="disabled";
    $form3="";
  
 }   
elseif($step==3){
    $form1="disabled";
    $form2="disabled";
    $form3="disabled";
}


?>
<center>
<br>
<h3>ระบบนำเข้าข้อมูลโครงการพัฒนาวิชาการที่ได้รับอนุมัติ</h3>
<table border='1' cellspacing='0' cellpadding='0' width="98%">
<tr>
	<td><h3>Step 1</h3></td>
</tr>
<tr>
    <td>
        <?
			if($step==2)
                echo "<!--";
        ?>        
        <form name="form1" enctype="multipart/form-data" method="POST" > 
        <table>
			<tr>
				<td><b>อัพโหลดไฟล์สำหรับ Migration</b></td>
			</tr>
			<tr>
				<td>
                    <?
					//$a="tmpsql.xls";//$_FILES["file"]["name"] ;
					$a=$_FILES["file"]["name"] ;
					if ($_FILES["file"]["error"] > 0) {
						echo "Error: " . $_FILES["file"]["error"] . "<br />";
					}else{
						echo "&nbsp;&nbsp;&nbsp;&nbsp;Upload: " . $_FILES["file"]["name"] . "<br />";
                        echo "&nbsp;&nbsp;&nbsp;&nbsp;Type: " . $_FILES["file"]["type"] . "<br />";
                        echo "&nbsp;&nbsp;&nbsp;&nbsp;Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
                        //echo "Stored in: " . $_FILES["file"]["tmp_name"];
                        //echo "Stored in: " . $_FILES["file"][$a];
                        copy($_FILES["file"]["tmp_name"],$a);
                        //include"simplecsvimport.php";
					}
                    ?>
				</td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;&nbsp;</td>
			</tr>
			<tr>
				<td>
					<input type="hidden" name="step" value="1">
                    <input type="file" name="file">
                    <input type="Hidden" value="up" name="job">
                    <input type="submit" value="Upload File(xls)"  <?=$form1?>>
				</td>
			</tr>
		</table>        
        </form>
	</td>
</tr>
	<?
    if($step==2)
		echo "-->";
	?>
<tr>
	<td>&nbsp;</td>
</tr>
<tr>
	<td><h3>Step 2</h3></td>
</tr>

<tr>    
	<td>
        <?
            if($step==3)
                echo "<!--";
        ?>
        <form name ="form2" method="POST">
        <table>
			<tr>
				<td><b>Migration File XLS to Project' s Database</b></td>
			</tr>
			<tr>
				<td>&nbsp;&nbsp;</td>
			</tr>
            <tr>
				<td><input type="hidden" name="step" value="2"><input type="submit" value="Import"  <?=$form2?>></td>
			</tr>
			<tr>
				<td>
					<?
						/*if($step==2){
							//include"updatetype_u.php";
							include"import.php";
						}*/
					?>
				</td>
			</tr>
		</table>        
		</form>
    </td>
</tr>
<tr>
	<td>&nbsp;</td>
</tr>
</table>
<?
	if($step==2){
		include"import.php";
	}
?>
</center>