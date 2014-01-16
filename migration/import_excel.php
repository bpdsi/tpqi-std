<meta http-equiv="Content-Type"content="text/html; charset=utf-8" />
<?php

/** PHPExcel */
require_once 'Classes/PHPExcel.php';

/** PHPExcel_IOFactory - Reader */
include 'Classes/PHPExcel/IOFactory.php';


if(trim($inputFileName)=="")$inputFileName="functionmap.xls";// exit;
/*$inputFileName = "myData.xls";  
$inputFileName = "project_56.xls";  */  
$inputFileType = PHPExcel_IOFactory::identify($inputFileName);  
$objReader = PHPExcel_IOFactory::createReader($inputFileType);  
$objReader->setReadDataOnly(true);  
$objPHPExcel = $objReader->load($inputFileName);  

/*
// for No header
$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
$highestRow = $objWorksheet->getHighestRow();
$highestColumn = $objWorksheet->getHighestColumn();

$r = -1;
$namedDataArray = array();
for ($row = 1; $row <= $highestRow; ++$row) {
    $dataRow = $objWorksheet->rangeToArray('A'.$row.':'.$highestColumn.$row,null, true, true, true);
    if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > '')) {
        ++$r;
        $namedDataArray[$r] = $dataRow[$row];
    }
}
*/
echo "Count:=".$objPHPExcel->getSheetCount();
for($i=0;$i<$objPHPExcel->getSheetCount();$i++){
$objWorksheet = $objPHPExcel->setActiveSheetIndex($i);
$highestRow = $objWorksheet->getHighestRow();
$highestColumn = $objWorksheet->getHighestColumn();
//echo "<hr>".$highestColumn."<hr>";


$r = -1;
$namedDataArray = array();
$KeyPurpose="";
	$KeyRoles="";
	$KeyFunction="";
for ($row = 2; $row <= $highestRow; ++$row) {
    $dataRow = $objWorksheet->rangeToArray('A'.$row.':'.$highestColumn.$row,null, true, true, true);
	foreach($dataRow[$row] as $key=>$value){
		++$r;
		if ($key=="A"){
			if($KeyPurpose!=$value and $value!=""){
				$KeyPurpose=$value;
			}
		}elseif ($key=="B"){
			if($KeyRoles!=$value and $value!=""){
				$KeyRoles=$value;
			}
		}else{
			$KeyFunction=$value;
		}
       //$namedDataArray[$r] = $value;
	   
	}
	$namedDataArray[$row]["KeyPurpose"]=$KeyPurpose;
	$namedDataArray[$row]["KeyRoles"]=$KeyRoles;
	$namedDataArray[$row]["KeyFunction"]=$KeyFunction;
	//echo "KeyPurpose:=".$KeyPurpose."<br>KeyRoles:=".$KeyRoles."<br>KeyFunction:=".$KeyFunction."<hr>";
	
}

echo '<pre>';
var_dump($namedDataArray);
echo '</pre><hr />';
}
/*echo"<hr>";
print_r($namedDataArray[0]);
echo"<hr>";*/

exit;
?>
<table width="500" border="1">
<tr>
	<th>ลำดับที่</th>
	<th>ชื่อกิจกรรม/โครงการ</th>
	<th>ชื่อผู้รับผิดชอบ/ผู้ทำโครงการ</th>
	<th>สถานะผู้รับผิดชอบ</th>
	<th>สัดส่วนภาระงาน (%)</th>
	<th>ช.ม. ปฏิบัติงานจริง</th>
	<th>ว/ด/ป (เริ่มต้น-สิ้นสุด)</th>
	<th>ลักษณะการบริการวิชาการ</th>
	<th>ชื่อหน่วยงานภายนอกที่ร่วม</th>
	<th>ชื่อแหล่งทุนของกิจกรรม/โครงการ</th>
	<th>รายรับจริงทั้งหมด (บาท)</th>
	<th>ค่าใช้จ่ายในการดำเนินงาน(ค่าวัสดุ/ค่าใช้สอย/ค่าใช้จ่ายอื่น ๆ)</th>
	<th>ค่าตอบ แทน ผู้ดำเนินโครงการ</th>
	<th>ค่าอำนวย การมก.</th>
	<th>ค่าอำนวย การสถาบันฯ(เบิกไม่ได้)</th>
	<th>ค่าสาธารณูปโภค     (เบิกไม่ได้)</th>
	<th>ค่าเครื่องมือ/อุปกรณ์/สถานที่(เบิกไม่ได้)</th>
	<th>มูลค่า(in-kind) (บาท)</th>
	<th>ชื่อ/กลุ่มเป้าหมาย</th>
	<th>จำนวนผู้รับบริการ (ราย)</th>
	<th>ลักษณะที่นำไปใช้ประโยชน์</th>
	<th>ผลการประเมินความพึงพอใจ</th>
	<th>1</th><th>2</th><th>3</th><th>4</th>
	<th>1</th><th>2</th><th>3</th><th>4</th><th>5</th>
</tr>
<?
for ($rec = 0; $rec <= $r; ++$rec) {
	echo"<tr>";
		//print_r($namedDataArray[$rec]);
		$data=$namedDataArray[$rec];
		/*for($c=0;$c<count($data);$c++){
			echo "<td>".iconv("utf-8","utf-8",$data[$c])."</td>";
		}*/
		foreach($data as $columnKey) {
            echo "<td>".iconv("utf-8","utf-8",$columnKey)."</td>";
        }
	echo"</tr>";
}
//*** Connect to MySQL Database ***//
include "../config/config.php";
$i = 0;
$cleardata=" Truncate table project_education_tmp";
mysql_query($cleardata) or die(mysql_error());

$sqlSetColumn="SHOW columns FROM project_education_tmp";
$rSetColumn=mysql_query($sqlSetColumn) or die(mysql_error());
$columname="";
while($rowSetColumn = mysql_fetch_array($rSetColumn)):
	if($rowSetColumn[0]!="id" and $rowSetColumn[0]!="check_reform"){
		if($columname=="")$columname=$rowSetColumn[0];
		else $columname=$columname.",".$rowSetColumn[0];
	}
endwhile;
for ($rec = 0; $rec <= $r; ++$rec) {
	$data=$namedDataArray[$rec];
	$strSQL = "";
	$strSQL .= "INSERT INTO project_education_tmp ";
	$strSQL .= "(".$columname.") ";
	$strSQL .= "VALUES (";
	$col=0;
	foreach($data as $columnKey) {
		if($col>0){
			if($col==1) $strSQL .="";
			else  $strSQL .=",";
			
			$strSQL .="'".iconv("utf-8","utf-8",$columnKey)."'";
		}
		$col++; 
    }
	$strSQL .= ")";
	mysql_query($strSQL) or die(mysql_error()."<br>".$strSQL);
	echo "Row $rec Inserted...<br>";
}
mysql_close($objConnect);

?>
</table>