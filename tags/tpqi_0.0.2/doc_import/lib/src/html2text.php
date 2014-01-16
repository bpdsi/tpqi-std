<meta http-equiv="Content-Type"content="text/html; charset=utf-8" />
<?
    // Example: html2text
    // Converts HTML to formatted ASCII text.
    // Run with: php < ex_html2text.php

    include ("html2text.inc");

    $htmlText = file_get_contents('AN_templatex.htm');
	$htmlText=str_replace("<o:p>","",$htmlText);
	$htmlText=str_replace("</o:p>","",$htmlText);
	$htmlText=str_replace("&nbsp;","",$htmlText);
	$htmlText=str_replace("<![if !supportMisalignedColumns]>","",$htmlText);
	$htmlText=str_replace("<![endif]>","",$htmlText);
	$htmlText=str_replace("<![if !vml]>","",$htmlText);
	$htmlText=str_replace("<![if !mso]>","",$htmlText);
	$htmlText=str_replace("<![if !mso & !vml]>","",$htmlText);

    $htmlToText = new Html2Text ($htmlText, 15);
    $text = $htmlToText->convert();
    echo "Conversion follows:\r\n";
    echo "-------------------\r\n";
    echo $text;

?>
