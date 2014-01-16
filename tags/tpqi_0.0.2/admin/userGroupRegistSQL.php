<?php
	include "../function/functionPHP.php";
	noCache();
	headerEncode();
	host();
	$perName=$_POST["perName"];
	$detail=$_POST["detail"];
	$query="
		select	*
		from	permission
		where	perName='$perName'
	";
	$result=mysql_query($query);
	$numrows=mysql_num_rows($result);
	if($numrows>0){
		echo "duplicated";
	}else{
		$query="
			insert into	permission
				(
					perName,
					detail
				) values (
					'$perName',
					'$detail'
				)
		";
		$result=mysql_query($query);
		echo "complete";
	}