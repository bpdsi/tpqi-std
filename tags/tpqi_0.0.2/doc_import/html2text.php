<!--<meta http-equiv="Content-Type"content="text/html; charset=utf-8" />-->
<?
$db_host="localhost";
$db_user="root";
$db_pwd="1q2w3e4r";
$db="tpqi_std";
$conDB=mysql_connect($db_host,$db_user,$db_pwd) or die ("Something is going wrong");
$objDB=mysql_select_db($db);
mysql_query("SET character_set_connection = UTF8")or die(mysql_error());
mysql_query("SET character_set_client = UTF8")or die(mysql_error());
mysql_query("SET character_set_results = UTF8")or die(mysql_error());
mysql_query("SET NAMES UTF8")or die(mysql_error());

	$datax = file_get_contents("ANtemplate.htm");
	$datay=str_replace("<o:p>","",$datax);
	$data=str_replace("</o:p>","",$datay);
	$data=str_replace("&nbsp;","",$data);
	$data=str_replace("<![if !supportMisalignedColumns]>","",$data);
	$data=str_replace("<![endif]>","",$data);
	$data=str_replace("<![if !vml]>","",$data);
	$data=str_replace("<![if !mso]>","",$data);
	$data=str_replace("<![if !mso & !vml]>","",$data);
	$data=str_replace("<![if !supportLists]","",$data);
	$data=preg_replace("/<![if !supportLists](.*?)>(.*?)<![endif]>/is","",$data);
	$data=preg_replace("/<o:wrapblock(.*?)>/is","",$data);
	$data=preg_replace("/<v:group(.*?)>/is","",$data);
	$data=preg_replace("/<v:rect(.*?)>/is","",$data);
	$data=preg_replace("/<v:textbox(.*?)>/is","",$data);
	$data=preg_replace("/<v:shapetype(.*?)>/is","",$data);
	$data=preg_replace("/<v:path(.*?)>/is","",$data);
	$data=preg_replace("/<v:stroke(.*?)>/is","",$data);
	$data=preg_replace("/<v:shape(.*?)>/is","",$data);
	$data=preg_replace("/<v:imagedata(.*?)>/is","",$data);
	$data=preg_replace("/<\/v:textbox>/is","",$data);
	$data=preg_replace("/<\/v:rect>/is","",$data);
	$data=preg_replace("/<\/v:group>/is","",$data);
	$data=preg_replace("/<\/v:shapetype>/is","",$data);
	$data=preg_replace("/<\/v:shape>/is","",$data);
	$data=preg_replace("/<\/v:path>/is","",$data);
	$data=preg_replace("/<\/v:stroke>/is","",$data);
	$data=preg_replace("/<\/v:stroke>/is","",$data);
	$data=preg_replace("/<\/v:stroke>/is","",$data);
	$data=preg_replace("/<\/o:wrapblock>/is","",$data);
	$data=preg_replace("/<p(.*?)>/is","",$data);
	$data=preg_replace("/<div(.*?)>/is","",$data);
	$data=preg_replace("/<\/p>/is","",$data);
	$data=preg_replace("/<\/div>/is","",$data);
	
	
  // new dom object
  
  $fp = fopen('data.htm', 'w');
  fwrite($fp, $data);
  fclose($fp);
  $contentshowx = file_get_contents('data.htm');

  //$contentshowx = iconv("utf-8","utf-8",$contentshowx);
  //$contentshowx = iconv("utf-8","ISO-8859-1",$contentshowx);
  //$contentshow=$contentshowx;
  $contentshow = painttext($contentshowx);
 echo "<hr><hr>".$contentshow;
$sqlConfig="select listID, listSubject from list_subject order by listID";
$rConfig=mysql_query($sqlConfig)or die(mysql_error()."<br>".$sqlConfig);
while($rowConfig=mysql_fetch_Array($rConfig)):
	//$config[$rowConfig["listID"]]=iconv("utf-8","tis-620",$rowConfig["listSubject"]);
	$config[$rowConfig["listID"]]=$rowConfig["listSubject"];
endwhile;

for($i=1;$i<=count($config);$i++){
$begin=$i;
$end=$i+1;

	//********** Start Subject ******************
	$pages=$config[$begin];
	$pageln=strlen($pages);
	//********** End Subject ******************
	$endpages=$config[$end];
	$endpageln=strlen( $endpages);
	//echo "<br>".$pages."<br>".$endpages."<hr>";
	$contents=substr(trim($contentshow),strpos(trim($contentshow),$pages),strrpos(trim($contentshow),$endpages)-strpos(trim($contentshow),$pages)+$endpageln);
	//echo"<hr>".$i.":".$contents;
	echo"<br>endpages<br>".$endpages."<hr>";
	$contentshow=substr(trim($contentshow),strpos(trim($contentshow),$endpages),strrpos(trim($contentshow),trim("</html>")));
	echo "<hr>".$contentshow."<br>";
	if($i==3){
		exit;
	}	
}
function painttext($data) {
$data=iconv("tis-620","tis-620",$data);
echo $data;
	//echo $Document;
$Rules = array ('@<script[^>]*?>.*?</script>@si', // Strip out javascript
                '@<[\/\!]*?[^<>]*?>@si',          // Strip out HTML tags
                '@([\r\n])[\s]+@',                // Strip out white space
                '@&(quot|#34);@i',                // Replace HTML entities
                '@&(amp|#38);@i',                 //   Ampersand &
                '@&(lt|#60);@i',                  //   Less Than <
                '@&(gt|#62);@i',                  //   Greater Than >
                '@&(nbsp|#160);@i',               //   Non Breaking Space
                '@&(iexcl|#161);@i',              //   Inverted Exclamation point
                '@&(cent|#162);@i',               //   Cent 
                '@&(pound|#163);@i',              //   Pound
                '@&(copy|#169);@i',               //   Copyright
                '@&(reg|#174);@i',                //   Registered
                '@&#(d+);@e');                   // Evaluate as php
$Replace = array ('',
                  '',
                  '',
                  '"',
                  '&',
                  '<',
                  '>',
                  ' ',
                  chr(161),
                  chr(162),
                  chr(163),
                  chr(169),
                  chr(174),
                  'chr()');
	$newData=preg_replace($Rules, $Replace, $data);
	echo $newData;
  return $newData;
} 
function parseTable($html){
//print_r($html);
	$xx="";
	for($i=0;$i<count($html);$i++){
		$xx.="<td>".painttext($html[$i])."</td>";
	}
return $xx;
}
?>