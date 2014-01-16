<?
$response=file_get_contents("Elements.htm");
//echo $response."<hr>";
$pages="<div class=WordSection1>";
$pageln=strlen($pages);
$endpages="</div>";
$endpageln=strlen($endpages);
$contentshow=substr(trim($response),strpos(trim($response),$pages),strpos(trim($response),$endpages)-strpos(trim($response),$pages)+$endpageln);
//echo "<hr>".$contentshow."<hr>";
$contents=split("<tr",$contentshow);
//print_r($units);
echo"<table border=1 cellpadding=0 cellpadding=0>";
for($i=0;$i<count($contents);$i++){
	echo"<tr>";
	$colcontent=preg_split("/<td/",$contents[$i]);
	for($c=0;$c<count($colcontent);$c++){
		//$billing_year[$c]=trim(painttext("<td".$colcontent[$c]));
		//$postag=strpos($colcontent[$c],":Symbol")
		$newcol=split("<o:p></o:p>",$colcontent[$c]);
		//echo "||".count($newcol)."||";
		if(count($newcol)>2){
			echo"<td>";
			//print_r($newcol);
			for($d=0;$d<count($newcol);$d++){
				if($d==0) $newcol[$d]="<td ".$newcol[$d];
				$contentCols=str_replace("</span></p>","",$newcol[$d]);
				//$contentCols=str_replace("</span></p>",$contentCols);
				//echo $contentCols."<hr>";
				echo trim(painttext($contentCols."</span></p>"))."<br>";
			}
			echo"</td>";
		}else{
			echo "<td><pre>".trim(painttext("<td".$colcontent[$c]))."</pre></td>";
		}
	}
	echo"</tr>";	
 }
echo"</table>";

function painttext($data) {
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
  return preg_replace($Rules, $Replace, $data);
} 
/*
สายอาชีพไปสายวุฒิการศึกษา
ต้องเอากรรมการทั้งสายอาชีพ และสายศึกษา
นำสมรรถนะมาเทียบกับหน่วยกิตเพื่อดูว่าจำเป็นต้องเรียน อีกกี่หน่วย
ในภาคอุตสาหกรรม
เปรียบโอนประสบบการณ์ เอาความสามารถมาเทียบกับสมรรถนะที่กำหนด ต่างสายงาน

common core 
-core competence ที่พึ่งมีในแต่ละสายอาชีพ แบ่งเป็นควรมีกับต้องมี 
-key function

*/
?>