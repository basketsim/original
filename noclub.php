<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT lang, s_time FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)) {
$lang = mysql_result ($compare,0,"lang");
$s_time = mysql_result ($compare,0,"s_time");
}
else {die(include 'basketsim.php');}
require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>
<div id="main">
<h2><table cellpadding="0" cellspacing="0" width="100%" border="0"><tr><td>NO SUCH CLUB</td><td align="right">
</td></tr></table></h2>
<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="100%">

<b>Club you were searching for doesn't exist anymore!</b>
<br/><br/>
<a href="javascript: history.go(-1)">Click here</a> to go back to the previous page.<br/>
<a href="search.php">Click here</a> to go to search.<br/>
<a href="index.php">Click here</a> to return to the Basketsim home page.<br/>

<br/><img src="img/teamgone.jpg" border="1" alt="Team gone!" title "Team gone!" />

</td>
</tr>
</table>
</div>
</div>
</body>
</html>