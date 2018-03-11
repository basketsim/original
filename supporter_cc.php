<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$comparepasss = mysql_query("SELECT lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($comparepasss)==1) {$lang = mysql_result ($comparepasss,0);} else {die(include 'basketsim.php');}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2><?=$langmark887?></h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="100%">

<h2><?=$langmark880?></h2><br/>
<big><?=$langmark890?></big><br/><br/>
<b><?=$langmark888?></b> <?=$langmark889?><br/><br/>
<b><?=$langmark891?>:</b> <?=$langmark892?><br/><br/>

<a href="javascript:history.go(-1)"><?=$langmark893?></a><br/>
<hr/><br/>
<big><?=$langmark894?></big><br/><br/>
<font color="darkgreen"><b><?=$langmark895?></b></font><br/><br/>

<a href="https://euro.swreg.org/soft_shop/81436/shopscr4.shtml" target="_blank">Basketsim supportership by credit card - 3 <?=$langmark878?> (6.50 &euro;)</a><br/>
<a href="https://euro.swreg.org/soft_shop/81436/shopscr5.shtml" target="_blank">Basketsim supportership by credit card - 6 <?=$langmark878?> (11.90 &euro;)</a><br/>
<a href="https://euro.swreg.org/soft_shop/81436/shopscr6.shtml" target="_blank">Basketsim supportership by credit card - 1 <?=$langmark879?> (20.90 &euro;)</a><br/>
<br/><b><?=$langmark896?></b>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>