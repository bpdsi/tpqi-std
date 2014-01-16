<?
	$db_host="localhost";// "naist.cpe.ku.ac.th";
 	$db_user= "tpqi";//"naist";
	$db_pwd= "1234";//"@naist";
	$db="tpqi_std";
	
	mysql_connect($db_host,$db_user,$db_pwd);
	mysql_select_db($db);
	$charset = "SET character_set_results=utf8";
	mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	$charset = "SET character_set_client=utf8"; 
	mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	$charset = "SET character_set_connection=utf8"; 
	mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	$charset = "SET collation_connection =  utf8_general_ci   ";  
	mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
?>