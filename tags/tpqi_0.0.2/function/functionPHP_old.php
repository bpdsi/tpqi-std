<?php
	host();
	$query="
		select	menu_id
		from	menu_detail
		where	menu_pages='$page'
	";
	$result=mysql_query($query);
	$row=mysql_fetch_array($result);
	$menu_id=$row[menu_id];
	$permission=permission($menu_id, $_SESSION[authen][ofID]);
	function headMeta(){
		global $path;
		?>
			<!-- Disable Cache [Use while developing] CSS-->
				<meta http-equiv="cache-control" content="no-cache" />
				
			<script type="text/javascript" src="<?=$path?>js/jquery-2.0.3.js"></script>
			<script type="text/javascript" src="<?=$path?>js/jquery-ui.js"></script>
			
			<link href="<?=$path?>images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon">
			
			<!-- Set Encoding -->
				<meta http-equiv="Content-Type"content="text/html; charset=utf-8" />
				<link type="text/css" rel="stylesheet" href="<?=$path?>css/style3.css"/>
			
			<!-- required plugins -->
				<script type="text/javascript" src="<?=$path?>js/date.js"></script>
			<!-- jquery.datePicker.js -->
				<script type="text/javascript" src="<?=$path?>js/jquery.datePicker.js"></script>
			<!-- datePicker required styles -->
				<link rel="stylesheet" type="text/css" media="screen" href="<?=$path?>css/datePicker.css">  		
			
			<link rel="stylesheet" type="text/css" href="<?=$path?>css/default.css">
			<link rel="stylesheet" type="text/css" href="<?=$path?>css/colorbox.css">
			<script type="text/javascript" src="<?=$path?>js/jquery.colorbox.js"></script>
			<link rel="stylesheet" type="text/css" href="<?=$path?>css/tpqi.css">
		<?php
	}
	
	function host(){
		global $host_db;
		global $user_db;
		global $password_db;
		global $database_name;
		global $conDB;
		global $objDB;
		$host_db="localhost";
		$user_db="tpqi";
		$password_db="1234";
		$dbName="tpqi_std";
		$conDB=mysql_connect($host_db,$user_db,$password_db) or die ("Something is going wrong");
		
		mysql_query("SET character_set_connection = UTF8")or die(mysql_error());
		mysql_query("SET character_set_client = UTF8")or die(mysql_error());
		mysql_query("SET character_set_results = UTF8")or die(mysql_error());
		mysql_query("SET NAMES UTF8")or die(mysql_error());
		$objDB=mysql_select_db($dbName);
	}
	
	function get_cfgValue($cfgName){
		host("npr");
		$query="
			select	cfgValue
			from	config
			where	cfgName='$cfgName'
		";
		$result=mysql_query($query);
		$row=mysql_fetch_array($result);
		return $row[cfgValue];
	}
	
	function monNameENG($monNum){
		switch ($monNum){
			case "01": return "Jan";
			case "02": return "Feb";
			case "03": return "Much";
			case "04": return "Apr";
			case "05": return "May";
			case "06": return "Jun";
			case "07": return "Jul";
			case "08": return "Aug";
			case "09": return "Sep";
			case "10": return "Oct";
			case "11": return "Nov";
			case "12": return "Dec";
		}
	}
	
	function dateEncode($date){
		$temp=explode(" ", $date);
		$date=$temp[0];
		$time=$temp[1];
		
		$temp=explode("-", $date);
		$yearNum=$temp[0];
		$monNum=$temp[1];
		$dayNum=$temp[2];
		
		return $dayNum." ".monNameENG($monNum)." ".$yearNum." ".$time;
	}
	
	function authenticated(){
		host();
		$query="
			select	*
			from	officer
			where	user='".$_SESSION[authen][user]."' and
					pass='".$_SESSION[authen][pass]."'
		";
		$result=mysql_query($query);
		if(mysql_num_rows($result)>0){
			return true;
		}else{
			return false;
		}
	}
	
	function perName($perID){
		host();
		$query="
			select	*
			from	permission
			where	perID='$perID'
		";
		$result=mysql_query($query);
		$row=mysql_fetch_array($result);
		return $row[perName];
	}
	
	function noCache(){
		header("Cache-Control: no-cache, must-revalidate");
	}
	
	function headerEncode(){
		header('Content-Type: text/html; charset=utf-8');
	}
	
	function permission($menu_id,$ofID){
		host();
		
		$query="
			select	*
			from	officer
			where	OfID='$ofID'
		";
		$result=mysql_query($query);
		$row=mysql_fetch_array($result);
		$perID=$row[perID];
		
		$query="
			select	*
			from	menu_permission
			where	menu_id='$menu_id' and
					perID='$perID'
		";
		$result=mysql_query($query);
		$row=mysql_fetch_array($result);
		
		if(mysql_num_rows($result)>0){
			$permission[access]=true;
			
			if($row[ins]=='1'){
				$permission[ins]=true;
			}else{
				$permission[ins]=false;
			}
			
			if($row[upd]=='1'){
				$permission[upd]=true;
			}else{
				$permission[upd]=false;
			}
			
			if($row[del]=='1'){
				$permission[del]=true;
			}else{
				$permission[del]=false;
			}
			
			if($row[prt]=='1'){
				$permission[prt]=true;
			}else{
				$permission[prt]=false;
			}
		}else{
			$permission[access]=false;
		}
		
		return $permission;
	}