<?php
$expandmenu1=99;

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$comparepasss = mysql_query("SELECT lang, country FROM users, teams WHERE club=teamid AND password='$koda' AND userid='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($comparepasss)) {$lang = mysql_result ($comparepasss,0,"lang"); $myc = mysql_result ($comparepasss,0,"country");} else {die(include 'basketsim.php');}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2><?=$langmark1504?></h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="54%">

<h2><?=$langmark1505?></h2><br/>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
<tr><td width="25" align="right"><b><?=$langmark1506?></b></td><td>&nbsp;<b><?=$langmark114?></b></td><td align="right"><b><span title="Country ranking"><?=$langmark1507?></span></b></td><td align="right"><b><span title="Amount of CS/CWS places">CS/CWS</span></b></td></tr>
<?php
$d=1;
$countries = mysql_query("SELECT `country` , `INTRANK` FROM `countries` WHERE `countryid` <999 ORDER BY `INTRANK` DESC");
while ($c = mysql_fetch_array($countries)) {
$country1 = $c["country"];
$rating1 = $c["INTRANK"];
if ($country1==$myc) {$col='#FFCC66';} else {$col='white';}
?>
<tr bgcolor="<?=$col?>"><td width="25" align="right" bgcolor="<?=$col?>"><?=$d?>.</td><td bgcolor="<?=$col?>">&nbsp;<a href="league.php?country=<?=$country1?>"><?=$country1?></a></td><td align="right" bgcolor="<?=$col?>"><?=$rating1?></td><td align="right" bgcolor="<?=$col?>"><?php if($d<9){echo "3 teams";}elseif($d > 56){echo "1 team";}else{echo "2 teams";}?></td></tr>
<?php
if ($d==8) {echo "<tr><td colspan=\"5\" height=\"0\"><hr/></td></tr>";}
if ($d==56) {echo "<tr><td colspan=\"5\" height=\"0\"><hr/></td></tr>";}
$d++;
}
?>
</table>

</td><td class="border" width="46%">
<h2><?=$langmark1508?></h2><br/>
Ranking is based on success in international club competitions over the last three seasons. Each CS/CWS game won brings 3 ranking points to the country and each FPC/YCWC game won additional 0.1 points.<br/>
<br/>Top 8 countries get 3 spots for each competition, bottom 8 get 1 and other countries 2 places for each, CS and CWS. Countries ranked 9th, 10th, 11th and so on stand a very good chance of getting third spot as well, especially in CWS. This is because any original spots occupied by inactive teams are lost and passed to best ranked countries below the top 8 line.<br/><br/>Team eligible to play in both CS and CWS will always play in CS. For example, cup winners who are also top division runners-up will always play in CS and their CWS spot will be given to the national cup semifinalist.<br/>
<br/>FPC winner gets a WildCard to play in CS. This can sometimes cost 56th ranked country to lose their spot.<br/>
<br/><?=$langmark1516?>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>