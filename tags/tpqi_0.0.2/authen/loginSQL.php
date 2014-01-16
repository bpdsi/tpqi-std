<?php
	session_start();
	include "../function/functionPHP.php";
	host();
	
	$user=$_POST["user"];
	$pass=$_POST["pass"];
	
	$query="
		select	*
		from	officer
		where	user='$user' and
				pass=md5('$pass')
	";
	$result=mysql_query($query);
	if(mysql_num_rows($result)){
		$_SESSION[authen]=mysql_fetch_array($result);
		header("location:../index.php");
	}else{
		?>
			<script type="text/javascript">
			<!--
				alert("ไม่สามารถเข้าสู่ระบบได้");
				window.open('index.php','_self');
			//-->
			</script>
		<?php
	}