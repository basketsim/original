<?php
if (!$_COOKIE['userid']){require("inc/lang/en.php"); include_once('inc/basic.php');}
else {
include_once('inc/config.php');
$query = mysql_query("SELECT lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1");
if (mysql_num_rows($query)==1) {$lang = mysql_result($query,0);} else {$lang='en';}
require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
}
?>
<div id="main">
<h2><?=strtoupper($langmark985)?></h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="99%">
<b><?=$langmark985?></b><br/>

<br/>Here are some of the actions that can result in a fine, temporary or permanent club closure or other adjustments made to your account:<br/>
1. Controling more than one account or opening account in another country when your own country is available.<br/>
2. Doing fraud attempts in the game, like cheating on the transfer market, buying/selling players at unreasonable price.<br/>
3. Abusing, threathing or attacking the game, administrator, BS helpers or any other user.<br/>

<br/><?=$langmark990?><br/>
<?=$langmark991?><br/>
<?=$langmark992?><br/>
<?=$langmark993?><br/>
This website is meant to be used in a normal and reasonable way, so by accepting terms you agree to play the game as it is. Attempts to harm the system in any way, to hack the website, to hack any of the ingame accounts or to exploit potential programming holes will result in instant and potentially permanent removal from the website. Users will also be removed if they are found to play the game in a way that focuses on spoiling the enjoyment of othes.<br/>
<?=$langmark994?><br/>
<?=$langmark995?><br/>

<br/><?=$langmark996?><br/>

<br/><a href="javascript: history.go(-1)"><?=$langmark132?></a>

</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>