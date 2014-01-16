<?php
	include "../function/functionPHP.php";
	noCache();
	
	$ofID=$_POST[ofID];
	
	$query="
		delete from	officer
		where		ofID='$ofID'
	";
	$result=mysql_query($query);
	
	echo "complete";