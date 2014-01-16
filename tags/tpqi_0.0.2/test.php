<!--<style type="text/css">
.rotatexx {
  /* rotate -90 deg, not sure if a negative number is supported so I used 270 */
  -moz-transform: rotate(270deg);
  -moz-transform-origin: 50% 50%;
  -webkit-transform: rotate(270deg);
  -webkit-transform-origin: 50% 50%;
  /* IE support should  be added with BasicImage and scripting I think*/
}
</style>
<table border=1>
<tr><td STYLE="position:absolute; left:270px;">
    Test
</td></tr>
</table>-->

<!doctype html>
<style>
* { line-height: 1.3 }
table { border-collapse: collapse }
td, th
{
    border: 1px solid black;
    white-space: nowrap;
}
#title th
{
    width: 15px;
    height: 100px;
    vertical-align: bottom;
    font-weight: normal;
}
#title th > div {
   position: relative; 
}
#title th > div > div {
   position: absolute; 
   bottom: 0;
   -webkit-transform: rotate(-90deg);
   -ms-transform: rotate(-90deg);
   transform: rotate(-90deg);
   -webkit-transform-origin: 0 100%;
   -ms-transform-origin: 0 100%;
   transform-origin: 0 100%;
   left: 1.1em;
}
</style>
<table>
    <tr id="title">
        <th>&nbsp;</th>
        <th><div><div>Column 1</div></div></th>
        <th><div><div>Column 2</div></div></th>
        <th><div><div>Column 3</div></div></th>
    </tr>
    <tr>
        <td>Row 1</td>
        <td>...</td>
        <td>...</td>
        <td>...</td>
    </tr>
     <tr>
        <td>Row 2</td>
        <td>...</td>
        <td>...</td>
        <td>...</td>
    </tr>
    <tr>
        <td>Row 3</td>
        <td>...</td>
        <td>...</td>
        <td>...</td>
    </tr>
</table>