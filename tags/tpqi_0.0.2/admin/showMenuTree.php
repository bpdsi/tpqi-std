<?php
	include "../function/functionPHP.php";
	host();
	noCache();
	headerEncode();
	$perID=$_POST["perID"];
	$paddingStep=30;
	function showSubMenu($parent){
		global $perID;
		global $padding;
		global $paddingStep;

		$query="
			select	*
			from	menu_detail
			where	parent='$parent'
		";
		$result=mysql_query($query);
		$numrows=mysql_num_rows($result);
		$i=0;
		while($i<$numrows){
			$row=mysql_fetch_array($result);
			$queryPer="
				select	*
				from	menu_permission
				where	menu_id='$row[menu_id]' and
						perID='$perID'
			";
			$resultPer=mysql_query($queryPer);
			$rowPer=mysql_fetch_array($resultPer);
			?>
				<tr>
					<td style="padding-left: <?php echo $padding?>px;">
						<div style="float:left;">&nbsp;<?php echo "$row[menu_name]";?></div>
					</td>
					<td style="text-align: center">
						<input type="checkbox" id="<?php echo $row[menu_id]?>" name="menu_id" value="<?php echo $row[menu_id]?>" 
							<?php
								if(mysql_num_rows($resultPer)>0){
									echo "checked";
								} 
							?>
							onclick="
								if(document.getElementById('<?php echo $row[menu_id]?>').checked==false){
									$('.<?php echo $row[menu_id]?>').removeAttr('checked');
								}
								$.post('admin/setPermission.php',{
										perID: '<?php echo $perID?>',
										menu_id: '<?php echo $row[menu_id]?>',
										checked: document.getElementById('<?php echo $row[menu_id]?>').checked
									},function(data){
										
									}
								);
							"
						>
					</td>
					<td style="text-align: center">
						<input class="<?php echo $row[menu_id]?>" type="checkbox"
							<?php
								if($rowPer[ins]=='1'){
									echo "checked";
								} 
							?>
							onclick="
								if(this.checked==true){
									if(document.getElementById('<?php echo $row[menu_id]?>').checked==false){
										$('#<?php echo $row[menu_id]?>').click();
									}
								}
								$.post('admin/setPermission.php',{
										perID: '<?php echo $perID?>',
										menu_id: '<?php echo $row[menu_id]?>',
										perType: 'ins',
										checked: this.checked
									},function(data){
									}
								);
							"
						>
					</td>
					<td style="text-align: center">
						<input class="<?php echo $row[menu_id]?>" type="checkbox"
							<?php
								if($rowPer[upd]=='1'){
									echo "checked";
								} 
							?>
							onclick="
								if(this.checked==true){
									if(document.getElementById('<?php echo $row[menu_id]?>').checked==false){
										$('#<?php echo $row[menu_id]?>').click();
									}
								}
								$.post('admin/setPermission.php',{
										perID: '<?php echo $perID?>',
										menu_id: '<?php echo $row[menu_id]?>',
										perType: 'upd',
										checked: this.checked
									},function(data){
										
									}
								);
							"
						>
					</td>
					<td style="text-align: center">
						<input class="<?php echo $row[menu_id]?>" type="checkbox"
							<?php
								if($rowPer[del]=='1'){
									echo "checked";
								} 
							?>
							onclick="
								if(this.checked==true){
									if(document.getElementById('<?php echo $row[menu_id]?>').checked==false){
										$('#<?php echo $row[menu_id]?>').click();
									}
								}
								$.post('admin/setPermission.php',{
										perID: '<?php echo $perID?>',
										menu_id: '<?php echo $row[menu_id]?>',
										perType: 'del',
										checked: this.checked
									},function(data){
										
									}
								);
							"
						>
					</td>
					<td style="text-align: center">
						<input class="<?php echo $row[menu_id]?>" type="checkbox"
							<?php
								if($rowPer[prt]=='1'){
									echo "checked";
								} 
							?>
							onclick="
								if(this.checked==true){
									if(document.getElementById('<?php echo $row[menu_id]?>').checked==false){
										$('#<?php echo $row[menu_id]?>').click();
									}
								}
								$.post('admin/setPermission.php',{
										perID: '<?php echo $perID?>',
										menu_id: '<?php echo $row[menu_id]?>',
										perType: 'prt',
										checked: this.checked
									},function(data){
										
									}
								);
							"
						>
					</td>
				</tr>
				<?php
					$padding+=$paddingStep;
					showSubMenu($row[menu_id]);
					$padding-=$paddingStep;
				?>
			<?php
			$i++;
		} 
	}

	$query="
		select	*
		from	permission
		where	perID='$perID'
	";
	$result=mysql_query($query);
	$row=mysql_fetch_array($result);
?>
<table style="width: 100%;">
	<tr>
		<td class="bottom_dashed" style="text-align: left;font-weight: bold;">Menu</td>
		<td class="bottom_dashed" style="text-align: center;font-weight: bold;">Access</td>
		<td class="bottom_dashed" style="text-align: center;font-weight: bold;">Insert</td>
		<td class="bottom_dashed" style="text-align: center;font-weight: bold;">Update</td>
		<td class="bottom_dashed" style="text-align: center;font-weight: bold;">Delete</td>
		<td class="bottom_dashed" style="text-align: center;font-weight: bold;">Print</td>
	</tr>
	<?php
		$query="
			select		*
			from		menu_detail
			where		parent='0'
			order by	menu_id
		";
		$result=mysql_query($query);
		$numrows=mysql_num_rows($result);
		$i=0;
		$padding=0;
		while($i<$numrows){
			$row=mysql_fetch_array($result);
			$queryPer="
				select	*
				from	menu_permission
				where	menu_id='$row[menu_id]' and
						perID='$perID'
			";
			$resultPer=mysql_query($queryPer);
			$rowPer=mysql_fetch_array($resultPer);
			?>
				<tr>
					<td style="width: 300px;">
						<div style="float:left;">&nbsp;<?php echo "$row[menu_name]";?></div>
					</td>
					<td style="text-align: center">
						<input type="checkbox" id="<?php echo $row[menu_id]?>" name="menu_id" value="<?php echo $row[menu_id]?>" 
							<?php
								if(mysql_num_rows($resultPer)>0){
									echo "checked";
								} 
							?>
							onclick="
								if(document.getElementById('<?php echo $row[menu_id]?>').checked==false){
									$('.<?php echo $row[menu_id]?>').removeAttr('checked');
								}
								$.post('admin/setPermission.php',{
										perID: '<?php echo $perID?>',
										menu_id: '<?php echo $row[menu_id]?>',
										checked: document.getElementById('<?php echo $row[menu_id]?>').checked
									},function(data){
										
									}
								);
							"
						>
					</td>
					<td style="text-align: center">
						<input class="<?php echo $row[menu_id]?>" type="checkbox"
							<?php
								if($rowPer[ins]=='1'){
									echo "checked";
								} 
							?>
							onclick="
								if(this.checked==true){
									if(document.getElementById('<?php echo $row[menu_id]?>').checked==false){
										$('#<?php echo $row[menu_id]?>').click();
									}
								}
								$.post('admin/setPermission.php',{
										perID: '<?php echo $perID?>',
										menu_id: '<?php echo $row[menu_id]?>',
										perType: 'ins',
										checked: this.checked
									},function(data){
									}
								);
							"
						>
					</td>
					<td style="text-align: center">
						<input class="<?php echo $row[menu_id]?>" type="checkbox"
							<?php
								if($rowPer[upd]=='1'){
									echo "checked";
								} 
							?>
							onclick="
								if(this.checked==true){
									if(document.getElementById('<?php echo $row[menu_id]?>').checked==false){
										$('#<?php echo $row[menu_id]?>').click();
									}
								}
								$.post('admin/setPermission.php',{
										perID: '<?php echo $perID?>',
										menu_id: '<?php echo $row[menu_id]?>',
										perType: 'upd',
										checked: this.checked
									},function(data){
										
									}
								);
							"
						>
					</td>
					<td style="text-align: center">
						<input class="<?php echo $row[menu_id]?>" type="checkbox"
							<?php
								if($rowPer[del]=='1'){
									echo "checked";
								} 
							?>
							onclick="
								if(this.checked==true){
									if(document.getElementById('<?php echo $row[menu_id]?>').checked==false){
										$('#<?php echo $row[menu_id]?>').click();
									}
								}
								$.post('admin/setPermission.php',{
										perID: '<?php echo $perID?>',
										menu_id: '<?php echo $row[menu_id]?>',
										perType: 'del',
										checked: this.checked
									},function(data){
										
									}
								);
							"
						>
					</td>
					<td style="text-align: center">
						<input class="<?php echo $row[menu_id]?>" type="checkbox"
							<?php
								if($rowPer[prt]=='1'){
									echo "checked";
								} 
							?>
							onclick="
								if(this.checked==true){
									if(document.getElementById('<?php echo $row[menu_id]?>').checked==false){
										$('#<?php echo $row[menu_id]?>').click();
									}
								}
								$.post('admin/setPermission.php',{
										perID: '<?php echo $perID?>',
										menu_id: '<?php echo $row[menu_id]?>',
										perType: 'prt',
										checked: this.checked
									},function(data){
										
									}
								);
							"
						>
					</td>
				</tr>
				<?php
					$padding+=$paddingStep;
					showSubMenu($row[menu_id]);
					$padding-=$paddingStep
				?>
			<?php
			$i++;
		}
	?>
</table>