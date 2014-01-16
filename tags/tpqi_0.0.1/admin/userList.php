<?php
	include "../function/functionPHP.php";
	noCache();
	host();
	
	$keyword=$_POST[keyword];
	
	$query="
		select		*
		from		officer
		where		user like '%$keyword%' or
					name like '%$keyword%' or
					familyName like '%$keyword%' or
					address like '%$keyword%' or
					email like '%$keyword%' or
					telephone like '%$keyword%'
		order by	name, familyName
	";
	$result=mysql_query($query);
	$numrows=mysql_num_rows($result);
	$i=0;
	while($i<$numrows){
		$row=mysql_fetch_array($result);
		
		$queryPer="
			select	*
			from	permission
			where	perID='$row[perID]'
		";
		$resultPer=mysql_query($queryPer);
		$rowPer=mysql_fetch_array($resultPer);
		?>
			<div id="Of<?php echo $row[ofID]?>" class="top_dashed left_dashed right_dashed bottom_dashed" 
				style="
					text-align: center;
					float: left;
					padding: 10px;
					width: 180px;
					margin: 10px;
					cursor: pointer;
				"
				onmouseover="
					this.style.background='#ffcaca';
					this.style.boxShadow='2px 2px 8px #888';
					$.post('admin/getUserInfo.php',{
							ofID: '<?php echo $row[ofID]?>'
						},function(data){
							$('#td_preview').html(data);
						}
					);
				"
				onmouseout="
					this.style.background='';
					this.style.boxShadow='';
				"
			>
				<img src="images/deleteIconSmall.png" style="float: right;cursor: pointer;"
					onclick="
						if(confirm('ต้องการลบผู้ใช้ระบบนี้')){
							$.post('admin/userDeleteSQL.php',{
									ofID: '<?php echo $row[ofID]?>'
								},function(data){
									if(data=='complete'){
										$('#Of<?php echo $row[ofID]?>').fadeOut();
									}else{
										alert('ไม่สามารถลบผู้ใช้ระบบนี้ได้');
									}
								}
							);
						}
					"
				><br>
				<img src="images/user.png"><br>
				<?php echo $row[user]?><br>
				<?php echo $row[name]." ".$row[familyName]?><br>
				<div style="float: left;">[<?php echo $rowPer[perName]?>]</div>
				<input type="button" value="Edit" style="float: right"
					onclick="
						$('#ofID_e').val('<?php echo $row[ofID]?>');
						$('#user_e').val('<?php echo $row[user]?>');
						$('#name_e').val('<?php echo $row[name]?>');
						$('#familyName_e').val('<?php echo $row[familyName]?>');
						$('#address_e').val('<?php echo $row[address]?>');
						$('#perID_e').val('<?php echo $row[perID]?>');
						$('#telephone_e').val('<?php echo $row[telephone]?>');
						$('#email_e').val('<?php echo $row[email]?>');
						
						$('#editDIV').fadeIn();
						$('#editDIV').css('left',$(this).position().left+40);
						$('#editDIV').css('top',$(this).position().top-10);
					"
				>
			</div>
		<?php
		$i++;
	}
?>