<?php
	include "../function/functionPHP.php";
	$email=$_POST[email];
	$ofID=$_POST[ofID];
	host();
	noCache();
	
	if($ofID!=""){
		$query="
			select	*
			from	officer
			where	email='$email' and
					ofID<>'$ofID'			
		";
	}else{
		$query="
			select	*
			from	officer
			where	email='$email'
		";
	}
	$result=mysql_query($query);
	echo mysql_num_rows($result);