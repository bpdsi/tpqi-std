<meta http-equiv="Content-Type"content="text/html; charset=utf-8" />
<?
//*** Connect to MySQL Database ***//
include "../config/config.php";

$sqlSetColumn="SHOW columns FROM project_education";
$rSetColumn=mysql_query($sqlSetColumn) or die(mysql_error());
$columname="";
while($rowSetColumn = mysql_fetch_array($rSetColumn)):
	if($rowSetColumn[0]!="id" and $rowSetColumn[0]!="check_reform"){
		if($columname=="")$columname=$rowSetColumn[0];
		else $columname=$columname.",".$rowSetColumn[0];
	}
endwhile;

$sqlreform="select * from project_education_tmp where check_reform is null";
$rReform=mysql_query($sqlreform) or die(mysql_error());
$rec=0;
while($rowReform = mysql_fetch_array($rReform)):
	$strSQL = "";
	$strSQL .= "INSERT INTO project_education ";
	$strSQL .= "(".$columname.") ";
	$strSQL .= "VALUES (";
	//===========================Check reform=============================
	$sqlSetColumn="SELECT `COLUMN_NAME` ,DATA_TYPE
					FROM `INFORMATION_SCHEMA`.`COLUMNS` 
					WHERE `TABLE_SCHEMA`='sme' 
						AND `TABLE_NAME`='project_education_tmp'";
	$rSetColumn=mysql_query($sqlSetColumn) or die(mysql_error());
	$cols=0;
	
	$sqlMax="SELECT max(project_id)
					FROM project_education ";
	$rMax=mysql_query($sqlMax) or die(mysql_error());
	$rowMax = mysql_fetch_array($rMax);
	if($rowMax[0]=="")$maxProject = 1;
	else $maxProject = $rowMax[0]+1;
	while($rowSetColumn = mysql_fetch_array($rSetColumn)):
		
		if($rowSetColumn[0]!="id" and $rowSetColumn[0]!="check_reform"){
			if($cols==1)$strSQL .= $maxProject.",";
			else $strSQL .= ",";
			if($rowSetColumn[0]=="enddate_project"){
				$strSQL .= convertDate($rowReform[$rowSetColumn[0]]);
			}elseif(substr($rowSetColumn[0],-4)=="cost" or $rowSetColumn[0]=="total_income" or $rowSetColumn[0]=="inkind" ){
				$strSQL .= preg_replace("/[^0-9]/u","",iconv("utf-8","utf-8",$rowReform[$rowSetColumn[0]]));
			}elseif($rowSetColumn[0]=="staff"){
				$response_name=preg_split("/\n/",$rowReform[$rowSetColumn[0]]);
				$strSQL .= "''";
			}elseif($rowSetColumn[0]=="staff_status"){
				$response_type=preg_split("/\n/",$rowReform[$rowSetColumn[0]]);
				$strSQL .= "''";
			}elseif($rowSetColumn[0]=="staff_ratio"){
				$response_radio=preg_split("/\n/",$rowReform[$rowSetColumn[0]]);
				$strSQL .= "''";
			}elseif($rowSetColumn[0]=="staff_hour"){
				$response_hrs=preg_split("/\n/",$rowReform[$rowSetColumn[0]]);
				$strSQL .= "''";
			}elseif($rowSetColumn[0]=="foundation_name"){
				$foundation_name=preg_split("/\n/",$rowReform[$rowSetColumn[0]]);
				$strSQL .= "''";
			}else{
				$strSQL .= "'".$rowReform[$rowSetColumn[0]]."'";
			}
			
		}
		$cols++;
	endwhile;
	//====================================================================
	$strSQL .= ")";
	//echo $strSQL;
	//exit;
	$rec++;
	mysql_query($strSQL) or die(mysql_error()."<br>".$strSQL);
	//*******************Insert response *********************************
	for($s=0;$s<count($response_name);$s++){
		if(trim($response_name[$s])!=""){
			$response_types=$response_type[$s];
			if($response_types=="" and $s>0)$response_types=2;
			$sqlResponse="insert into response_detail(project_id, response_name, response_type, response_hrs, response_radio)
				values(".$maxProject.",'".$response_name[$s]."','".$response_types."','".$response_hrs[$s]."','".$response_radio[$s]."');";
			//echo "<br>".$sqlResponse;
			mysql_query($sqlResponse) or die(mysql_error()."<br>".$sqlResponse);
		}
	}
	//********************************************************************
	//*******************Insert foundation_detail *********************************
	$foundation_address="";
	for($s=1;$s<count($foundation_name);$s++){
		if(trim($foundation_name[$s])!=""){
			$foundation_address.=" ".$foundation_name[$s];
		}
	}
	$sqlFoundation="insert into foundation_detail(project_id, foundation_name, foundation_address)
				values(".$maxProject.",'".trim($foundation_name[0])."','".trim($foundation_address)."');";
	echo "<br>".$sqlResponse;
	mysql_query($sqlFoundation) or die(mysql_error()."<br>".$sqlFoundation);
	//********************************************************************
	echo "Row ($rec) Inserted...<br>";
endwhile;
mysql_close($objConnect);

function convertDate($stringDate){
	$th_month_short = array("ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
	$dateA=split("-",$stringDate);
	
	$startdateA=split(" ",trim($dateA[0]));
	$startDay=$startdateA[0];
	if(count($startdateA)<3 or trim($startdateA[2])==""){
		$startMonth= preg_replace("/[^ก-๙||\.]/u","",$startdateA[1]);
		$startYear= (preg_replace("/".$startMonth."/","",$startdateA[1])+2500)-543;
		$startMonth=array_search($startMonth, $th_month_short)+1;
		if($startMonth<10)$startMonth="0".$startMonth;
	}
	$startdate=trim($startYear)."-".trim($startMonth)."-".trim($startDay);
	//echo $startdate;
	
	$enddateA=split(" ",trim($dateA[1]));
	$endDay=$enddateA[0];
	if(count($enddateA)<3 or trim($enddateA[2])==""){
		$endMonth= preg_replace("/[^ก-๙||\.]/u","",$enddateA[1]);
		$endYear= (preg_replace("/".$endMonth."/","",$enddateA[1])+2500)-543;
		$endMonth=array_search($endMonth, $th_month_short)+1;
		if($endMonth<10)$endMonth="0".$endMonth;
	}
	$enddate=trim($endYear)."-".trim($endMonth)."-".trim($endDay);
	//echo $enddate;
	$stringValue="'".$startdate."','".$enddate."'";
return $stringValue;
}

?>
</table>