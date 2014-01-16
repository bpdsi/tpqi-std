<?php
	include "../function/functionPHP.php";
	host();
	
	$ofID=$_POST[ofID];
	
	$user=$_POST[user];
	$pass=$_POST[pass];
	$name=$_POST[name];
	$familyName=$_POST[familyName];
	$address=$_POST[address];
	$telephone=$_POST[telephone];
	$email=$_POST[email];
	$perID=$_POST[perID];
	
	if($pass==""){
		$query="
			update 	officer
			set		user='$user',
					name='$name',
					familyName='$familyName',
					address='$address',
					telephone='$telephone',
					email='$email',
					perID='$perID'
			where	ofID='$ofID'
		";
	}else{
		$query="
			update 	officer
			set		user='$user',
					pass='".md5($pass)."',
					name='$name',
					familyName='$familyName',
					address='$address',
					telephone='$telephone',
					email='$email',
					perID='$perID'
			where	ofID='$ofID'
		";
	}
	$result=mysql_query($query) or die("<pre>$query ".mysql_error()."</pre>");
	echo "complete";