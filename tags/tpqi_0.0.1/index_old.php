<?php
	session_start();
	$page=$_GET[page];
	include "function/functionPHP.php";
	if(!authenticated()){
		header("location:authen/index.php");
		exit();
	}
	if($page==""){
		$page="home.php";
	}
	include "header.php";
	if($permission[access]==true){
		if(is_file($page)){
			include $page;
		}else{
			include "underConstruction.php";
		}
	}else{
		?>
			<script type="text/javascript">
			<!--
				alert("Permission Denied!");
			//-->
			</script>
		<?php
	}
	include "footer.php";
?>