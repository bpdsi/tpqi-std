<?php
	include "../function/functionPHP.php";
	host();
	noCache();
	$ofID=$_POST["ofID"];
	$query="
		select	*
		from	officer
		where	ofID='$ofID'
	";
	$result=mysql_query($query);
	$row=mysql_fetch_array($result);
	
	$queryPer="
		select	*
		from	permission
		where	perID='$row[perID]'
	";
	$resultPer=mysql_query($queryPer);
	$rowPer=mysql_fetch_array($resultPer);
?>
<table style="width: 100%;">
	<tr>
		<td style="text-align: center;padding: 20px;">
			<img src="images/user.png"><br>
			<?php echo $rowPer[perName]?>
		</td>
	</tr>
	<tr>
		<td style="text-align: left;padding: 0px 20px 20px 20px;">
			<table>
				<tr>
					<td style="text-align: right;font-weight: bold;">ชื่อข้าใช้ระบบ</td>
					<td style="text-align: left;padding-left: 5px;"><?php echo $row[user]?></td>
				</tr>
				<tr>
					<td style="text-align: right;font-weight: bold;">ชื่อ</td>
					<td style="text-align: left;padding-left: 5px;"><?php echo $row[name]?></td>
				</tr>
				<tr>
					<td style="text-align: right;font-weight: bold;">นามสกุล</td>
					<td style="text-align: left;padding-left: 5px;"><?php echo $row[familyName]?></td>
				</tr>
				<tr>
					<td style="text-align: right;font-weight: bold;">ที่อยู่</td>
					<td style="text-align: left;padding-left: 5px;"><?php echo $row[address]?></td>
				</tr>
				<tr>
					<td style="text-align: right;font-weight: bold;">หมายเลขโทรศัพท์</td>
					<td style="text-align: left;padding-left: 5px;"><?php echo $row[telephone]?></td>
				</tr>
				<tr>
					<td style="text-align: right;font-weight: bold;">อิเมล์</td>
					<td style="text-align: left;padding-left: 5px;"><?php echo $row[email]?></td>
				</tr>
			</table>		
		</td>
	</tr>
</table>