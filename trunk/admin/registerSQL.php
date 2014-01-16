<?php
	include "../function/functionPHP.php";
	host();
	
	$user=$_POST[user];
	$pass=$_POST[pass];
	$name=$_POST[name];
	$familyName=$_POST[familyName];
	$address=$_POST[address];
	$telephone=$_POST[telephone];
	$email=$_POST[email];
	$perID=$_POST[perID];
	
	$query="
		insert into	officer
			(
				User,
				Pass,
				Name,
				FamilyName,
				Address,
				Telephone,
				Email,
				perID
			) values (
				'$user',
				'".md5($pass)."',
				'$name',
				'$familyName',
				'".mysql_escape_string($address)."',
				'$telephone',
				'$email',
				'$perID'
			)
	";
	$result=mysql_query($query) or die("<pre>$query ".mysql_error()."</pre>");
	echo "complete";