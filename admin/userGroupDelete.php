<?php
	include "../function/functionPHP.php";
	host();
	$perID=$_POST["perID"];
	$query="
		delete from	permission
		where		perID='$perID'
	";
	$result=mysql_query($query);
	echo "complete";