<meta http-equiv="Content-Type"content="text/html; charset=utf-8" />
<?php

/** PHPExcel */
require_once 'Classes/PHPExcel.php';

/** PHPExcel_IOFactory - Reader */
include 'Classes/PHPExcel/IOFactory.php';


$inputFileName = "myData.xls";  
$inputFileName = "project_56.xls";  
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

$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
$highestRow = $objWorksheet->getHighestRow();
$highestColumn = $objWorksheet->getHighestColumn();
echo "<hr>".$highestColumn."<hr>";

$headingsArray = $objWorksheet->rangeToArray('A7:'.$highestColumn.'7',null, true, true, true);
$headingsArray = $headingsArray[1];

$r = -1;
$namedDataArray = array();
for ($row = 7; $row <= $highestRow; ++$row) {
    $dataRow = $objWorksheet->rangeToArray('A'.$row.':'.$highestColumn.$row,null, true, true, true);
    if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > '')) {
        ++$r;
        foreach($headingsArray as $columnKey => $columnHeading) {
            $namedDataArray[$r][$columnHeading] = $dataRow[$row][$columnKey];
        }
    }
}

/*echo '<pre>';
var_dump($namedDataArray);
echo '</pre><hr />';
exit;*/
?>
<table width="500" border="1">
<tr>
<?
 foreach($headingsArray as $columnKey ) {
    //echo"<td>".iconv("tis-620","tis-620",$columnKey)."</td>";
    echo"<td>".iconv("utf-8","utf-8",$columnKey)."</td>";
 }
?>
</tr>
</table>
<?
exit;
?>



















  <tr>
    <td>CustomerID</td>
    <td>Name</td>
    <td>Email</td>
    <td>CountryCode</td>
    <td>Budget</td>
    <td>Used</td>
  </tr>
<?
foreach ($namedDataArray as $result) {
?>
	  <tr>
		<td><?=$result["CustomerID"];?></td>
		<td><?=$result["Name"];?></td>
		<td><?=$result["Email"];?></td>
		<td><?=$result["CountryCode"];?></td>
		<td><?=$result["Budget"];?></td>
		<td><?=$result["Used"];?></td>
	  </tr>
<?
}
?>
</table>