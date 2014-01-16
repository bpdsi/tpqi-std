<?php
if ($handle = opendir('.')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            echo "<a href='".iconv("utf-8","tis-620",$entry)."'>".iconv("utf-8","tis-620",$entry)."</a><br>";
        }
    }
    closedir($handle);
}
?>