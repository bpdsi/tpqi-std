<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="./TreeMenu.js" language="JavaScript" type="text/javascript"></script>
<style>
.link{
  font-family:tahoma;
  /*font-size:11px;*/
  font-weight:bold;

  color:white;
  text-decoration:none;
}
a span {
font-size: 20px;
}
 .treeMenuDefault {
            font-style: italic;
        }
        
        .treeMenuBold {
            font-style: italic;
            font-weight: bold;
        }
</style>
<?php

// +-----------------------------------------------------------------------+
// | Copyright (c) 2002-2005, Richard Heyes, Harald Radi                   |
// | All rights reserved.                                                  |
// |                                                                       |
// | Redistribution and use in source and binary forms, with or without    |
// | modification, are permitted provided that the following conditions    |
// | are met:                                                              |
// |                                                                       |
// | o Redistributions of source code must retain the above copyright      |
// |   notice, this list of conditions and the following disclaimer.       |
// | o Redistributions in binary form must reproduce the above copyright   |
// |   notice, this list of conditions and the following disclaimer in the |
// |   documentation and/or other materials provided with the distribution.| 
// | o The names of the authors may not be used to endorse or promote      |
// |   products derived from this software without specific prior written  |
// |   permission.                                                         |
// |                                                                       |
// | THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS   |
// | "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT     |
// | LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR |
// | A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT  |
// | OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, |
// | SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT      |
// | LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, |
// | DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY |
// | THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT   |
// | (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE |
// | OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.  |
// |                                                                       |
// +-----------------------------------------------------------------------+
// | Author: Richard Heyes <http://www.phpguru.org/>                       |
// |         Harald Radi <harald.radi@nme.at>                              |
// +-----------------------------------------------------------------------+
//
// $Id: example.php,v 1.14 2005/03/02 02:16:51 richard Exp $
//error_reporting(E_ALL | E_STRICT);
//require_once('HTML/TreeMenu.php');

if($_GET['query1']!="")
    $qterm=$_GET['query1'];
else
    $qterm=$_GET['qterm'];
	
require_once('TreeMenu.php');

function fehler() {
/* *************************** */
global $HTTP_SERVER_VARS, $db_mailto_error, $qs;

    if (mysql_errno()>0) {
            $error1=mysql_errno();
            $error2=mysql_error();
            echo "<font size=+2 color=red><b>Database Error!</b> $error1: $error2 - $qs<BR>";
            $err_msg = "WARNING: Check log file if suspected recurrent error!\n\n";
            $err_msg .= "PHPTREE\n";
            $err_msg .= "Error Occured @:\n";
            $err_msg .= date ("D M j, Y h:i:s A") . "\n\n";
            $err_msg .= "MySQL ErrNo: $error1\n";
            $err_msg .= "MySQL ErrMsg: $error2\n\n";
            $err_msg .= "Website: ".$HTTP_SERVER_VARS['HTTP_HOST']."\n";
            $err_msg .= "Query-String: ".$HTTP_SERVER_VARS['REQUEST_URI']."\n";
            $err_msg .= "Remote IP Access from: ".$HTTP_SERVER_VARS['REMOTE_ADDR']."\n";

            mail($db_mailto_error,"[mySQL] Error on ".$HTTP_SERVER_VARS['HTTP_HOST']." /phptree ",$err_msg);

            exit; break; stop;
    };

} /* end of function fehler() */



/* ---------------------------------- */
/* Change the following settings !    */
/* ---------------------------------- */
$table = "ontology";        /* database table working on */



require_once("php_tree.class");


mysql_connect($db_host,$db_user,$db_pwd);
mysql_select_db($db);
$charset = "SET character_set_results=utf8";
mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
$charset = "SET character_set_client=utf8"; 
mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
$charset = "SET character_set_connection=utf8"; 
mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
$charset = "SET collation_connection =  utf8_general_ci   ";  
mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
 
    $icon         = 'folder.gif';
    $expandedIcon = 'folder-expanded.gif';
 


$menu  = new HTML_TreeMenu();
global $mytree;
$mytree = new php_tree();
	$show_db_identifier="1";

	// show sql-statements, 1=true, 0=false
	$debug="0";


	// define client / mandant
	$gui=$_GET['gui'];
	if($gui=="") $gui=$_POST['gui'];
	if (!isset($gui)) { $gui = "999"; }
	$mode = "3";
	$mytree->set_parameters($gui,$mode,$db,$table,$show_db_identifier,$debug);

function countParent($node){
include"common.php";
$mytree = new php_tree();
$table = "ontology"; 
$show_db_identifier="1";

// show sql-statements, 1=true, 0=false
$debug="0";

// define client / mandant
$gui=$_GET['gui'];
if($gui=="") $gui=$_POST['gui'];
if (!isset($gui)) { $gui = "999"; }
$mode = "3";
$mytree->set_parameters($gui,$mode,$db,$table,$show_db_identifier,$debug);

	$sql="SELECT ident, parent, term, detail
			FROM ontology
			WHERE ident='$node'";
	//echo "<br>sql1:".$sql."<br>";
	$r=mysql_query($sql)or die(mysql_error()."<br>".$sql);
	$std=1;
	while($row=mysql_fetch_array($r)):
		if ( $row['parent']!="-1"){
			$std+=$mytree->display_path($row['parent'],$mytree->reverse_path,0);
				
		};
	endwhile;
	//echo "<br>node:|".$node.":".$row['parent']."->".$std."|<br>";
	return $std;
}
function gentree2($node,$branches) {
	
if ($branches!="")
    $qs="SELECT * FROM    ontology  WHERE     parent=".$branches." or ident=".$branches." ORDER BY ident";
else
    $qs="SELECT * FROM   ontology  WHERE     parent='-1' ORDER BY ident";

        $rc=mysql_query($qs);
        $num=mysql_numrows($rc);
         
    $i=0;
    while($ar = mysql_fetch_array($rc)){
		if($ar['parent']!="-1"){
			$chkicon=countParent($ar['parent']);
			//echo "<br>Gentree2=node:".$ar['ident'].":=".$ar['term'].":".$ar['detail'].":->".$chkicon;
			$chkicon=$chkicon+1;
		}else{
			$chkicon=1;
		}
		$expanded=true;
		if($chkicon==1){
			$icon="P-icon.jpg";
		}elseif($chkicon==2){
			$icon="R-icon.jpg";
		}elseif($chkicon==3){
			$icon="F-icon.jpg";
			$expanded=false;
		}elseif($chkicon==4){
			$icon="U-icon.jpg";
			$expanded=false;
		}elseif($chkicon==5){
			$icon="E-icon.jpg";
			$expanded=false;
		}else{
			$icon="folder.gif";
		}
		global $std;
		$std=0;
		
       if($i==0  ) {
		 $node1   = new HTML_TreeNode(array('text' => $ar['term'].":".$ar['detail'], 'link' => "?page=menu.php&qterm=".$ar['term'].":".$ar['detail'], 'icon' => $icon, 'expandedIcon' => $expandedIcon, 'expanded' => $expanded), array('onclick' => "alert('foo'); return false", 'onexpand' => "alert('Expanded')"));
        }else{
             if ( $ar['haschild']=="1" ) {
                $node1->addItem(gentree2("node",$ar['ident']));
             }else{
				$link="?page=menu.php&qterm=".$ar['term'].":".$ar['detail'];
				if($chkicon==5)$link="?page=assessor.php&id=".$ar['ident'];
				$node1->addItem(new HTML_TreeNode(array('text' => $ar['term'].":".$ar['detail'], 'link' => $link, 'icon' => $icon, 'expandedIcon' => $expandedIcon)));
             }
        }
         
        
         $i++;
    }
return $node1;
}
function gentree($node,$branches,$termmesh) {

if ($branches!=""){
    if($termmesh!="")
        $qs="SELECT * FROM    ontology  WHERE     parent=".$branches." and concat(term,':',detail) like '%".$termmesh."%' ORDER BY ident";
     else
        $qs="SELECT * FROM    ontology  WHERE     parent=".$branches." ORDER BY ident";
}else{
    if($termmesh!="")
        $qs="SELECT * FROM   ontology  WHERE   lower(concat(term,':',detail)) like '%".strtolower($termmesh)."%'  ORDER BY ident";
    else
        $qs="SELECT * FROM   ontology  WHERE     parent='-1' ORDER BY ident";
}
//echo "<br>".$qs."<br>";
        $rc=mysql_query($qs);
        $num=mysql_numrows($rc) or die(mysql_error());
    $i=0;
    $node1   = new HTML_TreeNode(array('text' => "<h3>มาตราฐานวิชาชีพ</h3>", 'link' => "?page=menu.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon, 'expanded' => true), "");
	
    while($ar = mysql_fetch_array($rc)){
		//echo "<hr>g1".countParent($ar['parent'])."<hr>";
		if($ar['parent']!="-1"){
			$chkicon=countParent($ar['parent']);
			//echo "<br>Gentree2=node:".$ar['ident'].":=".$ar['term'].":".$ar['detail'].":->".$chkicon;
			$chkicon=$chkicon+1;
		}else{
			$chkicon=1;
		}
		if($chkicon==1){
			$icon="P-icon.jpg";
		}elseif($chkicon==2){
			$icon="R-icon.jpg";
		}elseif($chkicon==3){
			$icon="F-icon.jpg";
		}elseif($chkicon==4){
			$icon="U-icon.jpg";
		}elseif($chkicon==5){
			$icon="E-icon.jpg";
		}else{
			$icon="folder.gif";
		}
         if ( $ar['haschild']=="1" ) {             
            $node1->addItem(gentree2("node",$ar['ident']));
         }else{
				$link="?page=menu.php&qterm=".$ar['term'].":".$ar['detail'];
				if($chkicon==5)$link="?page=assessor.php&id=".$ar['ident'];
				$node1->addItem(new HTML_TreeNode(array('text' => $ar['term'].":".$ar['detail'], 'link' => $link, 'icon' => $icon, 'expandedIcon' => $expandedIcon)));
        }
         $i++;
    }
return $node1;
}
 
	$menu->addItem(gentree("node","",$qterm) );
    
    
    // Create the presentation class
   $treeMenu = &new HTML_TreeMenu_DHTML($menu, array('images' => './images', 'defaultClass' => 'treeMenuDefault'));
   //$listBox  = &new HTML_TreeMenu_Listbox($menu, array('linkTarget' => '_self'));
    //$treeMenuStatic = &new HTML_TreeMenu_staticHTML($menu, array('images' => '../images', 'defaultClass' => 'treeMenuDefault', 'noTopLevelImages' => true));
?>


<script language="JavaScript" type="text/javascript">
<!--
    a = new Date();
    a = a.getTime();
//-->
</script>
<table style="width: 100%;">
	<tr>
		<td valign="top" align="center" style="width: 200px;">
			<div style="position: fixed;">
				<img src="images/tree.png" width="200"><br>
				<h2>สืบค้นมาตรฐานอาชีพ</h2>
			</div>
		</td>
		<td style="padding-left: 50px;">
			<table class="table_01" style="margin: 10px;margin-left: auto;margin-right: auto;width: 100%">
				<tr>
					<td colspan="2" class="table_header table_topRadius"><h3>ตัวอย่างแบบฟอร์มการลงทะเบียน มาตรฐานอาชีพ</h3></td>
				</tr>
				<tr>
					<td valign="top" style="padding: 10px;" class="right_solid bottom_solid" valign="middle">
						<form name="termsearch" action="?page=menu.php" method="GET">
							<table cellspacing="0" cellpadding="0" style="margin-left: auto;margin-right: auto">
								<tr>
									<td colspan="2">Keyword</td>
								</tr>
								<tr>
								    <td><input type="text" name="qterm" value="<?echo $qterm;?>" style="width: 250px;"></td>
								</tr>
								<tr>
								    <td>
										<input type="submit" value="Search" style="float: right;">
								    	<input type="reset" value="cancel" style="float: left;">
								    </td>
								</tr>
								<tr>
									<td align="right"><a href='?page=tree.php' target='_blank'>เพิ่มมาตรฐานอาชีพ</a></td>
								</tr>   
							</table>
						</form>
					</td>
					<td style="padding: 10px;" class="bottom_solid">
						<table cellpadding="0" cellspacing=0 style="margin-left: auto;margin-right: auto;">
							<tr >
								<td style="padding: 5px 5px 0px 5px;"><img src="./images/P-icon.jpg"></td>
								<td><font color="#000">ความมุ่งหมายหลัก(Key Purpose)</font></td>
							</tr>
							<tr>
								<td style="padding: 5px 5px 0px 5px;"><img src="./images/R-icon.jpg"></td>
								<td><font color="#000">บทบาทหลัก(Key Roles)</font></td>
							</tr>
							<tr>
								<td style="padding: 5px 5px 0px 5px;"><img src="./images/F-icon.jpg"></td>
								<td ><font color="#000">หน้าที่หลัก(Key Functions)</font></td>
							</tr>
							<tr>
								<td style="padding: 5px 5px 0px 5px;"><img src="./images/U-icon.jpg"></td>
								<td><font color="#000">หน่วยสมรรถนะ(Units of Competence)</font></td>
							</tr>
							<tr>
								<td style="padding: 5px 5px 0px 5px;"><img src="./images/E-icon.jpg"></td>
								<td><font color="#000">สมรรถนะย่อย(Element of Competence)</font></td>	
							</tr>	
						</table>
					</td>
				</tr>
				<tr>
					<td colspan="2" style="padding: 10px;">
						<font size=2 color=red>
						<?$treeMenu->printMenu()?><br /><br />
						<?//$listBox->printMenu()?>
						</font>
						
						<script language="JavaScript" type="text/javascript">
						<!--
						    b = new Date();
						    b = b.getTime();
						   
						   // document.write("Time to render tree: " + ((b - a) / 1000) + "s");
						//-->
						</script>
					</td>
				</tr>
				<tr>
					<td colspan="2" class="table_footer"></td>
				</tr>
			</table>
			<br>
		</td>
	</tr>
</table>