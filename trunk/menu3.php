<?php
	include "common.php";
	include "corelib.php"
?>
<script language="JavaScript" type="text/javascript">	
	$(document).ready(function(){
	//Examples of how to assign the ColorBox event to elements
	$(".example7").colorbox({width:"80%", height:"80%", iframe:true});
	$(".exImg").colorbox({width:"50%", height:"60%", iframe:true});
	$(".rptPrint").colorbox({width:"80%", height:"100%", iframe:true});
	 
		//Example of preserving a JavaScript event for inline calls.
		$("#click").click(function(){ 
			//$("#click").css({"background-color":"#FFF", "color":"#F00", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
			return false;
		});
	});
</script>
<nav>
	<?php echo genMenu(1);?>
</nav>