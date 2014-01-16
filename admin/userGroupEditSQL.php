<?php
	include "../function/functionPHP.php";
	noCache();
	headerEncode();
	host();
	$perID=$_POST["perID"];
	$perName=$_POST["perName"];
	$detail=$_POST["detail"];
	$query="
		select	*
		from	permission
		where	perName='$perName' and
				perID<>'$perID'
	";
	$result=mysql_query($query);
	$numrows=mysql_num_rows($result);
	if($numrows>0){
		echo "duplicated";
	}else{
		$query="
			update	permission
			set		perName='$perName',
					detail='$detail'
			where	perID='$perID'
		";
		$result=mysql_query($query);
		echo "complete";
	}