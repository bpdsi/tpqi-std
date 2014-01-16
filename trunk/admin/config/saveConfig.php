<?php
	include "../../function/functionPHP.php";
	noCache();
	host();
	
	$cfgName=$_POST["cfgName"];
	$cfgValue=$_POST["cfgValue"];
	$dateTime=$_POST["dateTime"];
	
	$query="
		select	*
		from	config
		where	cfgName='$cfgName'
	";
	$result=mysql_query($query);
	if(mysql_num_rows($result)>0){
		$query="
			update	config
			set		cfgValue='$cfgValue',
					dateTime='$dateTime'
			where	cfgName='$cfgName'
		";
		$result=mysql_query($query);
	}else{
		$query="
			insert into	config
				(
					cfgName,
					cfgValue,
					dateTime
				) values (
					'$cfgName',
					'$cfgValue',
					'$dateTime'
				)
		";
		$result=mysql_query($query);
	}
	
	echo "complete";