</title>
<!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />-->
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<style type="text/css"> 
	@import url(css/intranet.css);
</style>
<script language="JavaScript" type="text/javascript">
<!-- Hide from old browsers
function Help() {
	newin=window.open("/cgi-bin/koha/help.pl","Koha Help",'width=600,height=600,toolbar=false,scrollbars=yes');
}

function openWindow(targeturl, windowname) {
	newwin =
	window.open(targeturl,windowname,"height=480,width=640,scrollbars,resizable")
}
 
 	var newwin;
	
	// Open the popup window if it doesn't already exist and give it focus.
	function PopWin(targeturl, windowname) {
	
		if (!newwin || newwin.closed) newwin = window.open(targeturl,windowname, "height=300,width=400,scrollbars=yes,resizable=yes");
	  newwin.focus();
	}
	
  // Set the value of the form field to the passed value and optionally shift
	// focus and close the popup.
	function FillForm(val,formname,formfield) {
	
		document.forms[formname].elements[formfield].value = val;

		// Uncomment below to shift focus after clicking link in popup.
		document.forms[formname].elements[formfield].focus();
		
		// Uncomment below to close popup after clicking link.
		newwin.close();
	}
	
	function CheckAll() {
		count = document.mainform.elements.length;
	    for (i=0; i < count; i++) {
		    if(document.mainform.elements[i].checked == 1){
				document.mainform.elements[i].checked = 0;
			} else {
				document.mainform.elements[i].checked = 1;
			}
		}
	}
 function MyHighlight()
{
    //alert(document.getElementById("keyword").value);
    <? echo "var xx = '".trim(urldecode($keyword)." " .urldecode($title)." ".urldecode($author)." ".urldecode($subject)." ".urldecode($isbn)." ".urldecode($subcode)." ".urldecode($subcodex))."';";?>
        //alert(xx);
        if(xx!=""){
         highlightSearchTerms(xx);   
        }
    /*if(document.getElementById("keyword").value){
        alert(a);
        highlightSearchTerms(a);
     }*/
}
/*
 * This is the function that actually highlights a text string by
 * adding HTML tags before and after all occurrences of the search
 * term. You can pass your own tags if you'd like, or if the
 * highlightStartTag or highlightEndTag parameters are omitted or
 * are empty strings then the default <font> tags will be used.
 */
function doHighlight(bodyText, searchTerm, highlightStartTag, highlightEndTag) 
{
  // the highlightStartTag and highlightEndTag parameters are optional
  if ((!highlightStartTag) || (!highlightEndTag)) {
    highlightStartTag = "<font style='color:#FF0033;background-color:#E6FF80';>";
    highlightEndTag = "</font>";
  }
  
  // find all occurences of the search term in the given text,
  // and add some "highlight" tags to them (we're not using a
  // regular expression search, because we want to filter out
  // matches that occur within HTML tags and script blocks, so
  // we have to do a little extra validation)
  var newText = "";
  var i = -1;
  var lcSearchTerm = searchTerm.toLowerCase();
  var lcBodyText = bodyText.toLowerCase();
    
  while (bodyText.length > 0) {
    i = lcBodyText.indexOf(lcSearchTerm, i+1);
    if (i < 0) {
      newText += bodyText;
      bodyText = "";
    } else {
      // skip anything inside an HTML tag
      if (bodyText.lastIndexOf(">", i) >= bodyText.lastIndexOf("<", i)) {
        // skip anything inside a <script> block
        if (lcBodyText.lastIndexOf("/script>", i) >= lcBodyText.lastIndexOf("<script", i)) {
          newText += bodyText.substring(0, i) + highlightStartTag + bodyText.substr(i, searchTerm.length) + highlightEndTag;
          bodyText = bodyText.substr(i + searchTerm.length);
          lcBodyText = bodyText.toLowerCase();
          i = -1;
        }
      }
    }
  }
  
  return newText;
}


/*
 * This is sort of a wrapper function to the doHighlight function.
 * It takes the searchText that you pass, optionally splits it into
 * separate words, and transforms the text on the current web page.
 * Only the "searchText" parameter is required; all other parameters
 * are optional and can be omitted.
 */
function highlightSearchTerms(searchText, treatAsPhrase, warnOnFailure, highlightStartTag, highlightEndTag)
{
  // if the treatAsPhrase parameter is true, then we should search for 
  // the entire phrase that was entered; otherwise, we will split the
  // search string so that each word is searched for and highlighted
  // individually
  
  if (treatAsPhrase) {
    searchArray = [searchText];
    //alert("xxx"+searchText + "xx");
  } else {
    searchArray = searchText.split(" ");
    //alert("xxx2"+searchText + "xx2");
  }
  
  if (!document.body || typeof(document.body.innerHTML) == "undefined") {
    if (warnOnFailure) {
      alert("Sorry, for some reason the text of this page is unavailable. Searching will not work.");
    }
    return false;
  }
  
  var bodyText = document.body.innerHTML;
  for (var i = 0; i < searchArray.length; i++) {
    //alert(searchArray[i]);
    bodyText = doHighlight(bodyText, searchArray[i], highlightStartTag, highlightEndTag);
  }
  
  document.body.innerHTML = bodyText;
  return true;
}
// end hiding -->
</script>
</head>

<body onload="MyHighlight();">