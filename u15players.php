<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT club, lang, supporter FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(include 'basketsim.php');
if (mysql_num_rows($compare)) {
$trueclub = mysql_result($compare,0,"club");
$lang = mysql_result ($compare,0,"lang");
$zsupp = mysql_result ($compare,0,"supporter");
}
else {die(include 'basketsim.php');}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2>LIST OF U15 NATIONAL TEAMS AND PLAYERS</h2>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="100%" colspan="2">
<?php 
$dow=$_GET['do'];
if ($dow=='rulesplay') {$dowd='play';}
if ($dow=='rules' OR $dow=='rulesplay') {?><b>Rules</b><?php } elseif ($dow<>'rules' AND $dow<>'rulesplay' AND $dow=='play'){?><a href="u15players.php?do=rulesplay">Rules</a><?php } else {?><a href="u15players.php?do=rules">Rules</a><?php }
if ($zsupp>0 AND $dow<>'play' AND $dow<>'rulesplay'){?> | <a href="u15players.php?do=play">Order teams by EV | Show best players by EV</a><?php }
if ($zsupp>0 AND ($dow=='play' OR $dow=='rulesplay')){?> | <a href="u15players.php">Go back to U15 players list</a><?php }?>
</td></tr>
<?php
if ($dow=='rules' OR $dow=='rulesplay') {?>
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="100%" colspan="2">
[<a href="u15players.php?do=<?=$dowd?>" title="Remove rules">-</a>] U15 teams are currently operated automatically and don't play matches yet. The true value of U15 teams, fun and pride aside, is recognition of the best youngsters in generation, something that can help current and future U18 coaches in their quest to build the strongest possible national team. Value of players is based on skills they already have, but also on a skill they develop. Youth training occurs every Thursday at 12:30 (server time) - at same time, U15 teams are updated.<br/><br/>All users can browse the list of U15 players, but there are some additional features available to Basketsim supporters: sorting countries based on total team value, as well as ordered list of most valuable U15 players from all countries.
</td>
</tr>
<?php }?>
</table>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff" width="100%">
<td class="border" width="50%">
<?php
if ($do<>'play' AND $do<>'rulesplay') {
$jada=9;
$order = mysql_query("SELECT * FROM u15players") or die(mysql_error());
while ($v = mysql_fetch_array($order)) {
$u15id = $v[id];
$u15name = $v[f_name];
$novaC = $u15country;
$u15country = $v[countr];
if ($u15country=='Bosnia') {$u15country='Bosnia and Herzegovina';}
$YTvalue = $v[YTvalue];
if ($gmah % 2) {$coloric = 'white';} else {$coloric = '#FFFAFA';}
if (($snvl==32) AND $novaC<>$u15country) {echo "</td><td class=\"border\" width=\"50%\">"; $jada=9;}
if ($novaC<>$u15country) {
if ($jada<>9) {echo "<br/>";}
echo "<a name=\"",$u15country,"\"></a>";
echo "<img src=\"img/Flags/",$u15country,".png\" border=\"0\" title=\"",$u15country,"\">&nbsp;<b>",$u15country,"</b><hr/>"; $snvl=$snvl+1; $gmah=0;}
echo "<span class=\"alignleft\" style=\"background-color: ",$coloric,";\"><a href=\"player.php?playerid=",$u15id,"\">".$u15name."</a></span><span class=\"alignright\" style=\"background-color: ",$coloric,";\">".number_format($YTvalue, 0, ',', '.')."</span><br/>";
$jada=0; $gmah=$gmah+1; 
}
}
elseif ($zsupp > 0 AND ($do=='play' OR $do=='rulesplay')) {
echo "<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"1\">";
$order = mysql_query("SELECT `countr` , sum(`YTvalue`) AS `totalYT` FROM `u15players` GROUP BY `countr` ORDER BY `totalYT` DESC LIMIT 64") or die(mysql_error());
while ($ui = mysql_fetch_array($order)) {
$u15country = $ui[countr];
if ($u15country=='Bosnia') {$u15country='Bosnia and Herzegovina';}
$totalYT = $ui[totalYT];
echo "<tr width=\"100%\"><td align=\"left\"><img src=\"img/Flags/",$u15country,".png\" border=\"0\" title=\"",$u15country,"\">&nbsp;",$u15country,"<td align=\"right\">".number_format($totalYT, 0, ',', '.')."</td></tr>";
}
?>
</table></td><td class="border" width="50%"><table border="0" width="100%" cellspacing="0" cellpadding="1">
<?php
$order = mysql_query("SELECT id, f_name, countr, YTvalue FROM `u15players` ORDER BY `YTvalue` DESC LIMIT 64") or die(mysql_error());
while ($uk = mysql_fetch_array($order)) {
$u15id = $uk[id];
$u15name = $uk[f_name];
$u15country = $uk[countr];
$YTvalue = $uk[YTvalue];
echo "<tr width=\"100%\"><td align=\"left\"><img src=\"img/Flags/",$u15country,".png\" border=\"0\" title=\"",$u15country,"\">&nbsp;<a href=\"player.php?playerid=",$u15id,"\">".$u15name."</a><td align=\"right\">".number_format($YTvalue, 0, ',', '.')."</td></tr>";
}
echo "</table>";
}
?>
</td>
</tr>
</table>
</div>
</div>
</body>
</html>