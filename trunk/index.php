<?php
	session_start();
	global $table;
	
	include "function/functionPHP.php";
	
	$currentTheme=getCfgValue("defaultTheme");
	$template=$currentTheme[cfgValue];
	$page=$_GET[page];
	
	/*if(!authenticated()){
		header("location:authen/index.php");
		exit();
	}*/
	if($page==""){
		$page="home/index.php";
	}
	include "header.php";
	$table="ontology";
	include "corelib.php";
	/*if($permission[access]==true){*/
		if(is_file($page)){
			include $page;
		}else{
			include "underConstruction.php";
		}
	/*}else{
		?>
			<script type="text/javascript">
			<!--
				alert("Permission Denied!");
			//-->
			</script>
		<?php
	}*/
	include "footer.php";
?>