<?php
	include "../function/functionPHP.php";
	$user=$_POST[user];
	$ofID=$_POST[ofID];
	host();
	noCache();
	
	if($ofID!=""){
		$query="
			select	*
			from	officer
			where	user='$user' and
					ofID<>'$ofID'
		";
	}else{
		$query="
			select	*
			from	officer
			where	user='$user'
		";
	}
	$result=mysql_query($query);
	echo mysql_num_rows($result);