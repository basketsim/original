<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('jpgraph/jpgraph.php');
require_once('jpgraph/jpgraph_line.php');
 
// Some data
$ydata = array(11,3,8,12,5,1,9,13,5,7);
 
// Create the graph. These two calls are always required
$graph = new Graph(350,250);
$graph->SetScale('textlin');
 
// Create the linear plot
$lineplot=new LinePlot($ydata);
$lineplot->SetColor('blue');
 
// Add the plot to the graph
$graph->Add($lineplot);
 
// Display the graph
$graph->Stroke();







die();
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {include_once('inc/basic.php'); require("inc/lang/en.php");}
else {
include_once('inc/config.php');
include_once('inc/header.php');
include_once('inc/osnova.php');
$compare = mysql_query("SELECT lang FROM users WHERE password ='$koda' AND userid ='$userid'") or die(mysql_error());
if (mysql_num_rows($compare)==1) {$lang = mysql_result($compare,0);} else {$lang='en';}
require("inc/lang/".$lang.".php");
}
?>

<div id="main">
<h2>BasketFox</h2>

<table border="0" cellspacing="10" cellpadding="10" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="100%">

<b>BasketFox</b> is a tool for Basketsim which can be used in <a href="http://www.mozilla.org" target="_new">Mozilla Firefox</a> browser.<br/>It was developed by Basketsim users and can be downloaded <a href="http://basketfox.googlepages.com/basketfox" target="_blank">here</a>.<br/><br/>

There are two possible ways <i>how to make BasketFox work in Firefox 3.5 and newer browser versions</i>.<br/><br/>
- Install <a href="http://www.oxymoronical.com/web/firefox/nightly" target="_new">nightly tester tools extension</a> and restart Firefox.<br/>
- If BasketFox is already instaled, but doesn't work go to Tools > Addons > "Override all compatibility" and restart Firefox.<br/>
- If BasketFox isn't yet installed, go to BasketFox site, install it, click on "Force install" and restart Firefox.<br/>
<i>Solution contributed by <a href="http://www.basketsim.com/club.php?clubid=818">spektrum</a></i>.<br/><br/>
Or you can download and use <a href="http://www.mediafire.com/?sharekey=828012a36bae36775bf1f12f1ff3f30ab5c303f50d8bcba8c95965eaa7bc68bc" target="_new">BasketFox patched for Firefox 3.5</a>
<br/><i>Solution contributed by <a href="http://www.basketsim.com/club.php?clubid=18787">Jack</a></i>.

<br/><br/><b>UPDATE:</b> for FF versions after 3.5 above solutions might not work, in that case download <a href="http://www.mediafire.com/?w2qzdummoxt" target="_new">new version of BasketFox</a>.
</td>
</tr>
</table>
<img src="img/bbs.jpg" alt="" border="0" border="0">
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>