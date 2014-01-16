<?php
	include "../function/functionPHP.php";
	noCache();
	host();
	
	$checked=$_POST["checked"];
	$menu_id=$_POST["menu_id"];
	$perID=$_POST["perID"];
	$perType=$_POST["perType"];
	
	if($perType==""){
		if($checked=="false"){
			$query="
				delete from	menu_permission
				where		menu_id='$menu_id' and
							perID='$perID'
			";
			$result=mysql_query($query);
		}else if($checked=="true"){
			$query="
				insert into	menu_permission
					(
						menu_id,
						perID
					) values (
						'$menu_id',
						'$perID'
					)
			";
			$result=mysql_query($query);
		}
	}else{
		if($checked=="false"){
			$query="
				update	menu_permission
				set		$perType='0'
				where	menu_id='$menu_id' and
						perID='$perID'
			";
			$result=mysql_query($query);
		}else if($checked=="true"){
			$query="
				update	menu_permission
				set		$perType='1'
				where	menu_id='$menu_id' and
						perID='$perID'
			";
			$result=mysql_query($query);
		}
	}
	echo $query;
	
	//echo $checked;