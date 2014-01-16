<?
function genMenu($groupid) {
	$qs="select * from menu_detail 
		where parent=0  
			order by menu_order";
	//echo "<br>".$qs."<br>";
        $rc=mysql_query($qs);
        $num=mysql_numrows($rc) or die("Error<br>".$qs."<br>".mysql_error());
    $i=0;
  
    $menu = "<ul>";
    while($ar = mysql_fetch_array($rc)){
		$menu.="<li><a href=\"".$ar["menu_pages"]."\">".$ar["menu_name"]."</a>";
        $detail="select count(*) as child from menu_detail where parent=".$ar["menu_id"]." 
			order by menu_order";
		$rdetail=mysql_query($detail);
		$rowdetail = mysql_fetch_array($rdetail);
         if ( $rowdetail["child"]>0 ) {
			$menu.="<ul>";
            $menu=genMenu2($groupid,$ar["menu_id"],$menu);
			$menu.="</ul></li>";
         }else{
			$menu.="</li>";
        }
         $i++;
    }
	$menu.="</ul>";
return $menu;
}
function genMenu2($groupid,$parent,$menu) {
	$qs="select * from menu_detail 
		where parent=".$parent." 
			order by menu_order";
        $rc=mysql_query($qs);
        $num=mysql_numrows($rc);
         
    $i=0;
    while($ar = mysql_fetch_array($rc)){
		$menu.="<li><a href=\"".$ar["menu_pages"]."\">".$ar["menu_name"]."</a>";
        $detail="select count(*) as child from menu_detail where parent=".$ar["menu_id"]." 
			order by menu_order";
		$rdetail=mysql_query($detail);
		$rowdetail = mysql_fetch_array($rdetail);
		if ( $rowdetail["child"]>0 ) { 
            $menu.="<ul>";
            $menu=genMenu2($groupid,$ar["menu_id"],$menu);
			$menu.="</ul></li>";
        }else{
			$menu.="</li>";
        }
         
        
         $i++;
    }
return $menu;
}
function convertDateToStr($strdate){
	$tmpa=split(" ",$strdate);
	$tmp=split("-",$tmpa[0]);
	if($tmp[0]>2500)$tmp[0]=$tmp[0]-543;
	if($tmp[0]<2500)$tmp[0]=$tmp[0]+543;
	$dstrDate=$tmp[2]."/".$tmp[1]."/".$tmp[0];
return $dstrDate;
}
function getOrder($id){
	$sqlmax="select max(StructureOrder) from t_structuremea where ParentStructure=".$id;
	$rmax=mysql_query($sqlmax);
	$rowmax=mysql_fetch_array($rmax);
	$order=0;
	if($rowmax[0]!=""){
		$order=$rowmax[0]+1;
	}
return $order;
}
function getMaxID($table,$Field){
	$sqlmax="select max(".$Field.") from ".$table;
	$rmax=mysql_query($sqlmax);
	$rowmax=mysql_fetch_array($rmax);
	$MaxID=0;
	if($rowmax[0]!=""){
		$MaxID=$rowmax[0]+1;
	}
return $MaxID;
}

//===07-09-2556==============
require_once('TreeMenu.php');
$table = "ontology";        /* database table working on */
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



require_once("php_tree.class");
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
include "common.php";
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
			return;
		}elseif($chkicon==5){
			$icon="E-icon.jpg";
		}else{
			$icon="folder.gif";
		}
		global $std;
		$std=0;
		$span=$chkicon;
       if($i==0  ) {
			$spanstr="";
			for($s=0;$s<$span;$s++){
				$spanstr.="&nbsp;";
			}
			if($chkicon==1){
				echo "<tr><td>".$spanstr.$ar['term']." : ".$ar['detail']."</td>";
			}elseif($chkicon==2){
				echo "<tr><td></td><td>".$spanstr.$ar['term']." : ".$ar['detail']."</td>";
			}elseif($chkicon==3){
				echo "<tr><td></td><td></td><td>".$spanstr.$ar['term']." : ".$ar['detail']."</td>";
			}
        }else{
             if ( $ar['haschild']=="1" ) {
				//echo"<td>";
                gentree2("node",$ar['ident']);
				//echo"</table></td>";
             }else{
				$link="?page=menu.php&qterm=".$ar['term']." : ".$ar['detail'].":".$ar['detail'];
				$spanstr="";
				for($s=0;$s<$span;$s++){
					$spanstr.="&nbsp;";
				}
				if($chkicon==1){
					echo "<tr><td>".$spanstr.$ar['term']." : ".$ar['detail']."</td>";
				}elseif($chkicon==2){
					echo "<tr><td></td><td>".$spanstr.$ar['term']." : ".$ar['detail']."</td>";
				}elseif($chkicon==3){
					echo "<tr><td></td><td></td><td>".$spanstr.$ar['term']." : ".$ar['detail']."</td>";
				}
             }
        }
         
        
         $i++;
    }
return $node1;
}
function gentree2L2($node,$branches) {
	
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
			$chkicon=$chkicon+1;
		}else{
			$chkicon=1;
		}
		if($chkicon<3){
			return;
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
		global $std;
		$std=0;
		$span=$chkicon;
       if($i==0  ) {
			$spanstr="";
			for($s=0;$s<$span;$s++){
				$spanstr.="&nbsp;";
			}
			if($chkicon==3){
				echo "<tr><td>".$spanstr.$ar['term']." : ".$ar['detail']."</td>";
			}elseif($chkicon==4){
				echo "<tr><td></td><td>".$spanstr.$ar['term']." : ".$ar['detail']."</td>";
			}elseif($chkicon==5){
				echo "<tr><td></td><td></td><td>".$spanstr.$ar['term']." : ".$ar['detail']."</td>";
			}
        }else{
             if ( $ar['haschild']=="1" ) {
				//echo"<td>";
                gentree2L2("node",$ar['ident']);
				//echo"</table></td>";
             }else{
				$link="?page=menu.php&qterm=".$ar['term']." : ".$ar['detail'].":".$ar['detail'];
				$spanstr="";
				for($s=0;$s<$span;$s++){
					$spanstr.="&nbsp;";
				}
				if($chkicon==3){
					echo "<tr><td>".$spanstr.$ar['term']." : ".$ar['detail']."</td>";
				}elseif($chkicon==4){
					echo "<tr><td></td><td>".$spanstr.$ar['term']." : ".$ar['detail']."</td>";
				}elseif($chkicon==5){
					echo "<tr><td></td><td></td><td>".$spanstr.$ar['term']." : ".$ar['detail']."</td>";
				}
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
	echo "<tr><td colspan='3'><h3>แผนภาพแสดงหน้าที่ (Function Map)</h3></td></tr>";
	echo "<tr><td class='table_header'>แสดงความมุ่งหมายหลัก<br>(Key Purpose)</td><td class='table_header'>บทบาทหลัก<br>(Key Roles)</td><td class='table_header'>หน้าที่หลัก<br>(Key Functions)</td><tr>";
	
    while($ar = mysql_fetch_array($rc)){
		if($ar['parent']!="-1"){
			$chkicon=countParent($ar['parent']);
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
		$span=$chkicon;	
         if ( $ar['haschild']=="1" ) {             
            gentree2("node",$ar['ident']);
         }else{
			$link="?page=menu.php&qterm=".$ar['term']." : ".$ar['detail'].":".$ar['detail'];
			$spanstr="";
			for($s=0;$s<$span;$s++){
				$spanstr.="&nbsp;";
			}
			echo "<tr><td>".$spanstr.$ar['term']." : ".$ar['detail']."</td></tr>";
        }
         $i++;
    }
return $node1;
}
function gentreeL2($node,$branches,$termmesh) {

if ($branches!=""){
    if($termmesh!="")
        $qs="SELECT * FROM    ontology  WHERE     parent=".$branches." and concat(term,':',detail) like '%".$termmesh."%' ORDER BY ident";
     else
        $qs="SELECT * FROM    ontology  WHERE     parent=".$branches." ORDER BY ident";
}else{
    if($termmesh!="")
        $qs="SELECT * FROM   ontology  WHERE   lower(concat(term,':',detail)) like '%".strtolower($termmesh)."%'  ORDER BY ident";
    else
        $qs="SELECT * FROM   ontology  ORDER BY ident";
}
//echo "<br>".$qs."<br>";
        $rc=mysql_query($qs);
        $num=mysql_numrows($rc) or die(mysql_error());
    $i=0;
    $node1   = new HTML_TreeNode(array('text' => "<h3>มาตราฐานวิชาชีพ</h3>", 'link' => "?page=menu.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon, 'expanded' => true), "");
	
	
    while($ar = mysql_fetch_array($rc)){
		if($i==0){
			echo "<tr><td colspan='3'><h3>มาตรฐานอาชีพสาขา".$ar['detail']."</h3></td></tr>";
			echo "<tr><td>หน้าที่หลัก<br>(Key Functions)</td><td>หน่วยสมรรถนะ<br>(Units Of Competence)</td><td>สมรรถนะย่อย<br>(Elements Of Competence)</td><tr>";
		}
		if($ar['parent']!="-1"){
			$chkicon=countParent($ar['parent']);
			$chkicon=$chkicon+1;
		}else{
			$chkicon=1;
		}
		//echo "<br>".$ar['term']." : ".$ar['detail'];
		
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
		$span=$chkicon;	
         if ( $ar['haschild']=="1" ) {             
            gentree2L2("node",$ar['ident']);
         }else{
			$link="?page=menu.php&qterm=".$ar['term']." : ".$ar['detail'].":".$ar['detail'];
			$spanstr="";
			for($s=0;$s<$span;$s++){
				$spanstr.="&nbsp;";
			}
			echo "<tr><td>".$spanstr.$ar['term']." : ".$ar['detail']."</td></tr>";
        }
         $i++;
    }
return $node1;
}
function genSubnode($node,$branches) {
	
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
			//echo "<br>genSubnode=node:".$ar['ident'].":=".$ar['term'].":".$ar['detail'].":->".$chkicon;
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
		 $node1   = new HTML_TreeNode(array('text' => $ar['term'].":".$ar['detail'], 'link' => "?page=search.php&qterm=".$ar['term'].":".$ar['detail'], 'icon' => $icon, 'expandedIcon' => $expandedIcon, 'expanded' => $expanded), array('onclick' => "alert('foo'); return false", 'onexpand' => "alert('Expanded')"));
        }else{
             if ( $ar['haschild']=="1" ) {
                $node1->addItem(genSubnode("node",$ar['ident']));
             }else{
				$link="?page=search.php&qterm=".$ar['term'].":".$ar['detail'];
				if($chkicon==5)$link="?page=assessor.php&id=".$ar['ident'];
				$node1->addItem(new HTML_TreeNode(array('text' => $ar['term'].":".$ar['detail'], 'link' => $link, 'icon' => $icon, 'expandedIcon' => $expandedIcon)));
             }
        }
         
        
         $i++;
    }
return $node1;
}
function genNode($node,$branches,$termmesh) {

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
    $node1   = new HTML_TreeNode(array('text' => "<h3>มาตราฐานวิชาชีพ</h3>", 'link' => "?page=search.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon, 'expanded' => true), "");
	
    while($ar = mysql_fetch_array($rc)){
		//echo "<hr>g1".countParent($ar['parent'])."<hr>";
		if($ar['parent']!="-1"){
			$chkicon=countParent($ar['parent']);
			//echo "<br>genSubnode=node:".$ar['ident'].":=".$ar['term'].":".$ar['detail'].":->".$chkicon;
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
            $node1->addItem(genSubnode("node",$ar['ident']));
         }else{
				$link="?page=search.php&qterm=".$ar['term'].":".$ar['detail'];
				if($chkicon==5)$link="?page=assessor.php&id=".$ar['ident'];
				$node1->addItem(new HTML_TreeNode(array('text' => $ar['term'].":".$ar['detail'], 'link' => $link, 'icon' => $icon, 'expandedIcon' => $expandedIcon)));
        }
         $i++;
    }
return $node1;
}
//==================For Result Search =========================
function genSearchPurpos($node,$branches,$termmesh) {

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
	//echo $num."<br><br>";
	if($num>0){	
		$i=0;
		$node1   = new HTML_TreeNode(array('text' => "<h3>มาตราฐานวิชาชีพ</h3>", 'link' => "?page=menu.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon, 'expanded' => true), "");
		while($ar = mysql_fetch_array($rc)){
			if($ar['parent']!="-1"){
				$chkicon=countParent($ar['parent']);
				$chkicon=$chkicon+1;
			}else{
				$chkicon=1;
			}
			if($chkicon==1){
				$icon="P-icon.jpg";
			if($i==0){
				echo "<tr>
						<td colspan='2'><h3>แสดงความมุ่งหมายหลัก (Key Purpose)</h3></td>
					</tr>";
				echo "<tr>
						<td class='table_header'>Code</td>
						<td class='table_header'>ชื่อ(Title)</td>
					<tr>";
			}
			
				$link="?page=menu.php&qterm=".$ar['term']." : ".$ar['detail'].":".$ar['detail'];
				echo "<tr>
						<td>".$ar['term']."</td>
						<td>".$ar['detail']."</td>
					</tr>";
			
			 $i++;
			}
		}
	}
return $node1;
}
function genSearchRole($node,$branches,$termmesh) {

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
	//echo $num."<br><br>";
	if($num>0){	
		$i=0;
		$node1   = new HTML_TreeNode(array('text' => "<h3>มาตราฐานวิชาชีพ</h3>", 'link' => "?page=menu.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon, 'expanded' => true), "");
		while($ar = mysql_fetch_array($rc)){
			if($ar['parent']!="-1"){
				$chkicon=countParent($ar['parent']);
				$chkicon=$chkicon+1;
			}else{
				$chkicon=1;
			}
			if($chkicon==2){
				$icon="R-icon.jpg";
			
			$span=$chkicon;	
			 if ( $ar['haschild']=="1" ) {             
				genSearchRoleFunc("node",$ar['ident']);
			 }else{
				$link="?page=menu.php&qterm=".$ar['term']." : ".$ar['detail'].":".$ar['detail'];
				echo "<tr>
						<td>".$spanstr.$ar['term']." : ".$ar['detail']."</td>
					</tr>";
			}
			 $i++;
			}
		}
	}
return $node1;
}
function genSearchRoleFunc($node,$branches) {
	
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
			$chkicon=$chkicon+1;
		}else{
			$chkicon=1;
		}
		if($chkicon==2){
			$icon="R-icon.jpg";
		}elseif($chkicon==3){
			$icon="F-icon.jpg";
		}
		global $std;
		$std=0;
		$span=$chkicon;
       if($i==0  ) {
			$spanstr="";
			for($s=0;$s<$span;$s++){
				$spanstr.="&nbsp;";
			}
			if($chkicon==2){
				echo "<tr><td>".$spanstr.$ar['term']." : ".$ar['detail']."</td>";
			}elseif($chkicon==3){
				echo "<tr><td></td><td>".$spanstr.$ar['term']." : ".$ar['detail']."</td>";
			}
        }else{
				$link="?page=menu.php&qterm=".$ar['term']." : ".$ar['detail'].":".$ar['detail'];
				$spanstr="";
				for($s=0;$s<$span;$s++){
					$spanstr.="&nbsp;";
				}
				
				if($chkicon==2){
					echo "<tr><td>".$spanstr.$ar['term']." : ".$ar['detail']."</td>";
				}elseif($chkicon==3){
					if($i==1) {
						echo "<td>".$spanstr.$ar['term']." : ".$ar['detail']."</td>";
					}else{
						echo "<tr><td></td><td>".$spanstr.$ar['term']." : ".$ar['detail']."</td>";
					}
				}
             
        }
         
        
         $i++;
    }
return $node1;
}
function genSearchFunc($node,$branches,$termmesh) {

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
	//echo $num."<br><br>";
	if($num>0){	
		$i=0;
		$node1   = new HTML_TreeNode(array('text' => "<h3>มาตราฐานวิชาชีพ</h3>", 'link' => "?page=menu.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon, 'expanded' => true), "");
		while($ar = mysql_fetch_array($rc)){
			if($ar['parent']!="-1"){
				$chkicon=countParent($ar['parent']);
				$chkicon=$chkicon+1;
			}else{
				$chkicon=1;
			}
			if($chkicon==3){
				$icon="F-icon.jpg";
			
			$span=$chkicon;	
			 if ( $ar['haschild']=="1" ) {             
				genSearchFuncUnit("node",$ar['ident']);
			 }else{
				$link="?page=menu.php&qterm=".$ar['term']." : ".$ar['detail'].":".$ar['detail'];
				echo "<tr>
						<td>".$spanstr.$ar['term']." : ".$ar['detail']."</td>
					</tr>";
			}
			 $i++;
			}
		}
	}
return $node1;
}
function genSearchFuncUnit($node,$branches) {
	
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
			$chkicon=$chkicon+1;
		}else{
			$chkicon=1;
		}
		if($chkicon==3){
			$icon="F-icon.jpg";
		}elseif($chkicon==4){
			$icon="U-icon.jpg";
		}
		global $std;
		$std=0;
		$span=$chkicon;
       if($i==0  ) {
			$spanstr="";
			for($s=0;$s<$span;$s++){
				$spanstr.="&nbsp;";
			}
			if($chkicon==3){
				echo "<tr><td>".$spanstr.$ar['term']." : ".$ar['detail']."</td>";
			}elseif($chkicon==4){
				echo "<tr><td></td><td>".$spanstr.$ar['term']." : ".$ar['detail']."</td>";
			}
        }else{
				$link="?page=menu.php&qterm=".$ar['term']." : ".$ar['detail'].":".$ar['detail'];
				$spanstr="";
				for($s=0;$s<$span;$s++){
					$spanstr.="&nbsp;";
				}
				
				if($chkicon==3){
					echo "<tr><td>".$spanstr.$ar['term']." : ".$ar['detail']."</td>";
				}elseif($chkicon==4){
					if($i==1) {
						echo "<td>".$spanstr.$ar['term']." : ".$ar['detail']."</td>";
					}else{
						echo "<tr><td></td><td>".$spanstr.$ar['term']." : ".$ar['detail']."</td>";
					}
				}
             
        }
         
        
         $i++;
    }
return $node1;
}
function genSearchUnit($node,$branches,$termmesh) {
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
        $rc=mysql_query($qs);
        $num=mysql_numrows($rc) or die(mysql_error());
	if($num>0){	
		$i=0;
		$node1   = new HTML_TreeNode(array('text' => "<h3>มาตราฐานวิชาชีพ</h3>", 'link' => "?page=menu.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon, 'expanded' => true), "");
		while($ar = mysql_fetch_array($rc)){
			if($ar['parent']!="-1"){
				$chkicon=countParent($ar['parent']);
				$chkicon=$chkicon+1;
			}else{
				$chkicon=1;
			}
			if($chkicon==4){
				$icon="U-icon.jpg";
			
			$span=$chkicon;	
			 if ( $ar['haschild']=="1" ) {             
				genSearchUnitElement("node",$ar['ident']);
			 }else{
				//$link="?page=menu.php&qterm=".$ar['term']." : ".$ar['detail'].":".$ar['detail'];
				$link="?page=unit_summary.php&unit_competence=".$ar['ident'];
				echo "<tr>
						<td><a href='".$link."'>".$spanstr.$ar['term']." : ".$ar['detail']."</a></td>
					</tr>";
			}
			 $i++;
			}
		}
	}
return $node1;
}
function genSearchElement($node,$branches,$termmesh) {
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
        $rc=mysql_query($qs);
        $num=mysql_numrows($rc);
         
   if($num>0){	
		$i=0;
		$node1   = new HTML_TreeNode(array('text' => "<h3>มาตราฐานวิชาชีพ</h3>", 'link' => "?page=menu.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon, 'expanded' => true), "");
		while($ar = mysql_fetch_array($rc)){
			if($ar['parent']!="-1"){
				$chkicon=countParent($ar['parent']);
				$chkicon=$chkicon+1;
			}else{
				$chkicon=1;
			}
			if($chkicon==5){
				$icon="E-icon.jpg";
			
			$span=$chkicon;	
			 if ( $ar['haschild']=="1" ) {             
				genSearchElement("node",$ar['ident'],"");
			 }else{
				$link="?page=element_group.php&element=".$ar['ident'];
				echo "<tr>
						<td><a href='".$link."'>".$spanstr.$ar['term']."</a></td><td><a href='".$link."'>".$ar['detail']."</a></td>
					</tr>";
			}
			 $i++;
			}
		}
	}
return $node1;
}
function genSearchElementList($node,$branches,$termmesh) {
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
        $rc=mysql_query($qs);
        $num=mysql_numrows($rc);
         
   if($num>0){	
		$i=0;
		$node1   = new HTML_TreeNode(array('text' => "<h3>มาตราฐานวิชาชีพ</h3>", 'link' => "?page=menu.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon, 'expanded' => true), "");
		while($ar = mysql_fetch_array($rc)){
			if($ar['parent']!="-1"){
				$chkicon=countParent($ar['parent']);
				$chkicon=$chkicon+1;
			}else{
				$chkicon=1;
			}
			if($chkicon==5){
				$icon="E-icon.jpg";
			
			$span=$chkicon;	
			 if ( $ar['haschild']=="1" ) {             
				genSearchElement("node",$ar['ident'],"");
			 }else{
				$link="?page=element_group.php&element=".$ar['ident'];
				echo "<tr>
						<td>".$spanstr.$ar['term']."</td><td><a href='".$link."'>".$ar['detail']."</a></td>
					</tr>";
			}
			 $i++;
			}
		}
	}
return $node1;
}
function genSearchUnitElement($node,$branches) {
	
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
			$chkicon=$chkicon+1;
		}else{
			$chkicon=1;
		}
		if($chkicon==4){
			$icon="U-icon.jpg";
		}elseif($chkicon==5){
			$icon="E-icon.jpg";
		}
		global $std;
		$std=0;
		$span=$chkicon;
       if($i==0  ) {
			if($chkicon==4){
				$link="?page=unit_summary.php&unit_competence=".$ar['ident'];
				echo "<tr>
						<td><a href='".$link."'>".$spanstr.$ar['term']." : ".$ar['detail']."</a></td>";
				//echo "<tr><td>".$ar['term']." : ".$ar['detail']."</td>";
			}elseif($chkicon==5){
				$link="?page=element_group.php&element=".$ar['ident'];
				echo "<tr><td></td><td><a href='".$link."'>".$ar['term']." : ".$ar['detail']."</a></td>";
			}
        }else{
				$link="?page=menu.php&qterm=".$ar['term']." : ".$ar['detail'].":".$ar['detail'];
				
				if($chkicon==4){
					echo "<tr><td>".$ar['term']." : ".$ar['detail']."</td>";
				}elseif($chkicon==5){
					$link="?page=element_group.php&element=".$ar['ident'];
					if($i==1) {
						echo "<td><a href='".$link."'>".$ar['term']." : ".$ar['detail']."</a></td>";
					}else{
						echo "<tr><td></td><td><a href='".$link."'>".$ar['term']." : ".$ar['detail']."</a></td>";
					}
				}
             
        }
         
        
         $i++;
    }
return $node1;
}
function genSearch2($node,$branches) {
	
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
			return;
		}elseif($chkicon==5){
			$icon="E-icon.jpg";
		}else{
			$icon="folder.gif";
		}
		global $std;
		$std=0;
		$span=$chkicon;
       if($i==0  ) {
			$spanstr="";
			for($s=0;$s<$span;$s++){
				$spanstr.="&nbsp;";
			}
			if($chkicon==1){
				echo "<tr><td>".$spanstr.$ar['term']." : ".$ar['detail']."</td>";
			}elseif($chkicon==2){
				echo "<tr><td></td><td>".$spanstr.$ar['term']." : ".$ar['detail']."</td>";
			}elseif($chkicon==3){
				echo "<tr><td></td><td></td><td>".$spanstr.$ar['term']." : ".$ar['detail']."</td>";
			}
        }else{
             if ( $ar['haschild']=="1" ) {
				//echo"<td>";
                genSearch2("node",$ar['ident']);
				//echo"</table></td>";
             }else{
				$link="?page=menu.php&qterm=".$ar['term']." : ".$ar['detail'].":".$ar['detail'];
				$spanstr="";
				for($s=0;$s<$span;$s++){
					$spanstr.="&nbsp;";
				}
				if($chkicon==1){
					echo "<tr><td>".$spanstr.$ar['term']." : ".$ar['detail']."</td>";
				}elseif($chkicon==2){
					echo "<tr><td></td><td>".$spanstr.$ar['term']." : ".$ar['detail']."</td>";
				}elseif($chkicon==3){
					echo "<tr><td></td><td></td><td>".$spanstr.$ar['term']." : ".$ar['detail']."</td>";
				}
             }
        }
         
        
         $i++;
    }
return $node1;
}
function genSearchL2($node,$branches,$termmesh) {

if ($branches!=""){
    if($termmesh!="")
        $qs="SELECT * FROM    ontology  WHERE     parent=".$branches." and concat(term,':',detail) like '%".$termmesh."%' ORDER BY ident";
     else
        $qs="SELECT * FROM    ontology  WHERE     parent=".$branches." ORDER BY ident";
}else{
    if($termmesh!="")
        $qs="SELECT * FROM   ontology  WHERE   lower(concat(term,':',detail)) like '%".strtolower($termmesh)."%'  ORDER BY ident";
    else
        $qs="SELECT * FROM   ontology  ORDER BY ident";
}
//echo "<br>".$qs."<br>";
        $rc=mysql_query($qs);
        $num=mysql_numrows($rc) or die(mysql_error());
    $i=0;
    $node1   = new HTML_TreeNode(array('text' => "<h3>มาตราฐานวิชาชีพ</h3>", 'link' => "?page=menu.php", 'icon' => $icon, 'expandedIcon' => $expandedIcon, 'expanded' => true), "");
	
	
    while($ar = mysql_fetch_array($rc)){
		if($i==0){
			echo "<tr><td colspan='3'><h3>มาตรฐานอาชีพสาขา".$ar['detail']."</h3></td></tr>";
			echo "<tr><td>หน้าที่หลัก<br>(Key Functions)</td><td>หน่วยสมรรถนะ<br>(Units Of Competence)</td><td>สมรรถนะย่อย<br>(Elements Of Competence)</td><tr>";
		}
		if($ar['parent']!="-1"){
			$chkicon=countParent($ar['parent']);
			$chkicon=$chkicon+1;
		}else{
			$chkicon=1;
		}
		//echo "<br>".$ar['term']." : ".$ar['detail'];
		
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
		$span=$chkicon;	
         if ( $ar['haschild']=="1" ) {             
            genSearch2L2("node",$ar['ident']);
         }else{
			$link="?page=menu.php&qterm=".$ar['term']." : ".$ar['detail'].":".$ar['detail'];
			$spanstr="";
			for($s=0;$s<$span;$s++){
				$spanstr.="&nbsp;";
			}
			echo "<tr><td>".$spanstr.$ar['term']." : ".$ar['detail']."</td></tr>";
        }
         $i++;
    }
return $node1;
}
function genSearch2L2($node,$branches) {
	
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
			$chkicon=$chkicon+1;
		}else{
			$chkicon=1;
		}
		if($chkicon<3){
			return;
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
		global $std;
		$std=0;
		$span=$chkicon;
       if($i==0  ) {
			$spanstr="";
			for($s=0;$s<$span;$s++){
				$spanstr.="&nbsp;";
			}
			if($chkicon==3){
				echo "<tr><td>".$spanstr.$ar['term']." : ".$ar['detail']."</td>";
			}elseif($chkicon==4){
				echo "<tr><td></td><td>".$spanstr.$ar['term']." : ".$ar['detail']."</td>";
			}elseif($chkicon==5){
				echo "<tr><td></td><td></td><td>".$spanstr.$ar['term']." : ".$ar['detail']."</td>";
			}
        }else{
             if ( $ar['haschild']=="1" ) {
				//echo"<td>";
                genSearch2L2("node",$ar['ident']);
				//echo"</table></td>";
             }else{
				$link="?page=menu.php&qterm=".$ar['term']." : ".$ar['detail'].":".$ar['detail'];
				$spanstr="";
				for($s=0;$s<$span;$s++){
					$spanstr.="&nbsp;";
				}
				if($chkicon==3){
					echo "<tr><td>".$spanstr.$ar['term']." : ".$ar['detail']."</td>";
				}elseif($chkicon==4){
					echo "<tr><td></td><td>".$spanstr.$ar['term']." : ".$ar['detail']."</td>";
				}elseif($chkicon==5){
					echo "<tr><td></td><td></td><td>".$spanstr.$ar['term']." : ".$ar['detail']."</td>";
				}
             }
        }
         
        
         $i++;
    }
return $node1;
}
?>