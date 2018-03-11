<?php
/*
wins in a row records
*/

$leagueid=$_GET['leagueid'];
if (!is_numeric($leagueid)) {die(include 'index.php');}

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT club, supporter, lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)) {
$club = mysql_result ($compare,0,"club");
$is_supporter = mysql_result ($compare,0,"supporter");
$lang = mysql_result ($compare,0,"lang");
}
else {die(include 'basketsim.php');}
if ($is_supporter<>1) {die(include 'index.php');}

$liga = mysql_query("SELECT name, country FROM leagues WHERE leagueid ='$leagueid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($liga)<>1) {die(include 'index.php');}
while($r=mysql_fetch_array($liga)) {$name=$r['name']; $country=$r['country'];}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2>League History</h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="66%">

<h2><?=stripslashes($name)," ",($country)?> - All time stats</h2><br/>

<table width="100%" border="0" cellspacing="0" cellpadding="1">
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td align="center"><b><span title="Won - Lost"><?=$langmark171?></span></b></td>
<td align="center"><b><span title="Points scored by a team">+</span></b></td>
<td align="center"><b><span title="Points scored against a team">-</span></b></td>
<td align="center"><b><span title="Point difference">+/-</span></b></td>
<td align="center"><b><span title="Win percentage">%</span></b></td>
</tr>
<?php
$query1 = mysql_query("SELECT `teamid` , SUM( `played` ) AS `totplay` , SUM( `win` ) AS `totwin` , SUM( `lose` ) AS `totlos` , SUM( `for_` ) AS `totfor` , SUM( `against` ) AS `totaga` , SUM( `difference` ) AS `totdif` FROM `competition` WHERE `leagueid` ='$leagueid' GROUP BY competition.`teamid` ORDER BY `totwin` DESC , `totlos` ASC , `totdif` DESC , `totfor` DESC");
while ($a = mysql_fetch_array($query1)) {
$teamid = $a['teamid'];
$totplay = $a['totplay'];
$totwin = $a['totwin'];
$totlos = $a['totlos'];
$totfor = $a['totfor'];
$totaga = $a['totaga'];
$totdif = $a['totdif'];
$doq = mysql_query("SELECT teamid, curname FROM competition WHERE teamid= '$teamid' AND leagueid=$leagueid ORDER BY season DESC LIMIT 1");
$krbu = mysql_result($doq,0,"teamid");
$curname = mysql_result($doq,0,"curname");
$n=$n+1;
if ($teamid==$club) {?><tr bgcolor="#FFCC66"><?php }else{?><tr><?php }?>
<td><?=$n?></td>
<td><?php echo "<a href=\"redirect.php?teamid=",$krbu,"\">",stripslashes($curname),"</a></td>";?>
<td align="center"><span title="Won - Lost"><?=$totwin,"-",$totlos?></span></td>
<td align="center"><span title="Points scored by a team"><?=$totfor?></span></td>
<td align="center"><span title="Points scored against a team"><?=$totaga?></span></td>
<td align="center"><span title="Point difference"><?=$totdif?></span></td>
<td align="center"><span title="Win percentage"><?=number_format(100*$totwin/($totplay+0.00001),1),"%"?></span></td>
</tr>
<?php }?>
</table>

</td>
<td class="border" width="34%">

<h2>History</h2><br/>
<?php
$query2 = mysql_query("SELECT h_userid, h_teamname, h_season FROM `history` WHERE h_season <'$default_season' AND h_type=1 AND h_lid='$leagueid' AND `won`=1 ORDER BY h_season DESC, history_id DESC");
while ($b = mysql_fetch_array($query2)) {
$user = $b['h_userid'];
$tname = $b['h_teamname'];
$sezona = $b['h_season'];

$query3 = mysql_query("SELECT `player`, `name`, `surname` FROM `top_players`, `players` WHERE `top_players`.`player`=`players`.`id` && `season` ='$sezona' &&  `league` ='$leagueid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($query3)>0) {$player_l = mysql_result($query3,0,'player'); $player_n = mysql_result($query3,0,'name'); $player_s = mysql_result($query3,0,'surname'); $igralec = "<a href=player.php?playerid=".$player_l.">".$player_n." ".$player_s."</a>";} else {$igralec='<i>retired player</i>';}

$query4 = mysql_query("SELECT userid FROM users WHERE userid = $user");
if (mysql_num_rows($query4)>0) {echo "<a href=\"leagues.php?leagueid=",$leagueid,"&season=",$sezona,"\"><b>",strtoupper($langmark502)," ",$sezona,"</b></a><br/><b>Winner:</b> <a href=\"club.php?clubid=",$user,"\">",stripslashes($tname),"</a><br/><b>MVP:</b> ",$igralec,"<br/><br/>";}
else {echo "<a href=\"leagues.php?leagueid=",$leagueid,"&season=",$sezona,"\"><b>",strtoupper($langmark502)," ",$sezona,"</b></a><br/><b>Winner:</b> ",stripslashes($tname),"<br/><b>MVP:</b> ",$igralec,"<br/><br/>";}
$k=$k+1;
}
if ($k==0) {echo "<i>No history has yet been recorded for this league.</i><br/>";}


//dosezki
$tiptop = mysql_query("SELECT `match` , `player`, 2*two_scored+one_scored+three_scored*3 AS scored FROM statistics, matches WHERE `match` = `matchid` AND matches.type=1 AND matches.lid_round=$leagueid ORDER BY 2*statistics.two_scored+statistics.one_scored+statistics.three_scored*3 DESC, gametime ASC LIMIT 1") or die(mysql_error());
if (mysql_num_rows($tiptop) > 0) {
$topscores = mysql_result($tiptop,0,"scored");
$topscorer = mysql_result($tiptop,0,"player");
$topscored = mysql_result($tiptop,0,"match");
$dodat = mysql_query("SELECT name, surname FROM players WHERE id ='$topscorer' LIMIT 1");
$d = mysql_fetch_array($dodat);
$name = $d['name'];
$surname = $d['surname'];
if (strlen($surname)<1) {$surname = '<i>retired player</i>';}
}
$tiptop1 = mysql_query("SELECT `match` , `player`, def_rebounds+off_rebounds AS scored FROM statistics, matches WHERE `match` = `matchid` AND matches.type=1 AND matches.lid_round=$leagueid ORDER BY def_rebounds+off_rebounds DESC, gametime ASC LIMIT 1") or die(mysql_error());
if (mysql_num_rows($tiptop1) > 0) {
$topscores1 = mysql_result($tiptop1,0,"scored");
$topscorer1 = mysql_result($tiptop1,0,"player");
$topscored1 = mysql_result($tiptop1,0,"match");
$dodat = mysql_query("SELECT name, surname FROM players WHERE id ='$topscorer1' LIMIT 1");
$d = mysql_fetch_array($dodat);
$name1 = $d['name'];
$surname1 = $d['surname'];
if (strlen($surname1)<1) {$surname1 = '<i>retired player</i>';}
}
$tiptop2 = mysql_query("SELECT `match` , `player`, assists AS scored FROM statistics, matches WHERE `match` = `matchid` AND matches.type=1 AND matches.lid_round=$leagueid ORDER BY assists DESC, gametime ASC LIMIT 1") or die(mysql_error());
if (mysql_num_rows($tiptop2) > 0) {
$topscores2 = mysql_result($tiptop2,0,"scored");
$topscorer2 = mysql_result($tiptop2,0,"player");
$topscored2 = mysql_result($tiptop2,0,"match");
$dodat = mysql_query("SELECT name, surname FROM players WHERE id ='$topscorer2' LIMIT 1");
$d = mysql_fetch_array($dodat);
$name2 = $d['name'];
$surname2 = $d['surname'];
if (strlen($surname2)<1) {$surname2 = '<i>retired player</i>';}
}
$tiptop3 = mysql_query("SELECT `match` , `player`, steals AS scored FROM statistics, matches WHERE `match` = `matchid` AND matches.type=1 AND matches.lid_round=$leagueid ORDER BY steals DESC, gametime ASC LIMIT 1") or die(mysql_error());
if (mysql_num_rows($tiptop3) > 0) {
$topscores3 = mysql_result($tiptop3,0,"scored");
$topscorer3 = mysql_result($tiptop3,0,"player");
$topscored3 = mysql_result($tiptop3,0,"match");
$dodat = mysql_query("SELECT name, surname FROM players WHERE id ='$topscorer3' LIMIT 1");
$d = mysql_fetch_array($dodat);
$name3 = $d['name'];
$surname3 = $d['surname'];
if (strlen($surname3)<1) {$surname3 = '<i>retired player</i>';}
}
$tiptop4 = mysql_query("SELECT `match` , `player`, blocks AS scored FROM statistics, matches WHERE `match` = `matchid` AND matches.type=1 AND matches.lid_round=$leagueid ORDER BY blocks DESC, gametime ASC LIMIT 1") or die(mysql_error());
if (mysql_num_rows($tiptop4) > 0) {
$topscores4 = mysql_result($tiptop4,0,"scored");
$topscorer4 = mysql_result($tiptop4,0,"player");
$topscored4 = mysql_result($tiptop4,0,"match");
$dodat = mysql_query("SELECT name, surname FROM players WHERE id ='$topscorer4' LIMIT 1");
$d = mysql_fetch_array($dodat);
$name4 = $d['name'];
$surname4 = $d['surname'];
if (strlen($surname4)<1) {$surname4 = '<i>retired player</i>';}
}
$tiptop5 = mysql_query("SELECT `match` , `player`, turnovers AS scored FROM statistics, matches WHERE `match` = `matchid` AND matches.type=1 AND matches.lid_round=$leagueid ORDER BY turnovers DESC, gametime ASC LIMIT 1") or die(mysql_error());
if (mysql_num_rows($tiptop5) > 0) {
$topscores5 = mysql_result($tiptop5,0,"scored");
$topscorer5 = mysql_result($tiptop5,0,"player");
$topscored5 = mysql_result($tiptop5,0,"match");
$dodat = mysql_query("SELECT name, surname FROM players WHERE id ='$topscorer5' LIMIT 1");
$d = mysql_fetch_array($dodat);
$name5 = $d['name'];
$surname5 = $d['surname'];
if (strlen($surname5)<1) {$surname5 = '<i>retired player</i>';}
}
$tiptop6 = mysql_query("SELECT `match` , `player`, three_scored AS scored FROM statistics, matches WHERE `match` = `matchid` AND matches.type=1 AND matches.lid_round=$leagueid ORDER BY three_scored DESC, three_total ASC, gametime ASC LIMIT 1") or die(mysql_error());
if (mysql_num_rows($tiptop6) > 0) {
$topscores6 = mysql_result($tiptop6,0,"scored");
$topscorer6 = mysql_result($tiptop6,0,"player");
$topscored6 = mysql_result($tiptop6,0,"match");
$dodat = mysql_query("SELECT name, surname FROM players WHERE id ='$topscorer6' LIMIT 1");
$d = mysql_fetch_array($dodat);
$name6 = $d['name'];
$surname6 = $d['surname'];
if (strlen($surname6)<1) {$surname6 = '<i>retired player</i>';}
}
$tiptop7 = mysql_query("SELECT `match`, `player`, ((2 * `two_scored` + `one_scored` + `three_scored` * 3) - (`two_total`-`two_scored`) - (`one_total`-`one_scored`) - (`three_total`-`three_scored`) + `def_rebounds` + `off_rebounds` + `blocks` + `steals` + `assists` - `turnovers`) AS scored FROM statistics, matches WHERE `match` = `matchid` AND matches.type=1 AND matches.lid_round=$leagueid AND ((2 * `two_scored` + `one_scored` + `three_scored` * 3) - (`two_total`-`two_scored`) - (`one_total`-`one_scored`) - (`three_total`-`three_scored`) + `def_rebounds` + `off_rebounds` + `blocks` + `steals` + `assists` - `turnovers`) < 1000 ORDER BY ((2 * `two_scored` + `one_scored` + `three_scored` * 3) - (`two_total`-`two_scored`) - (`one_total`-`one_scored`) - (`three_total`-`three_scored`) + `def_rebounds` + `off_rebounds` + `blocks` + `steals` + `assists` - `turnovers`) DESC, gametime ASC LIMIT 1") or die(mysql_error());
if (mysql_num_rows($tiptop7) > 0) {
$topscores7 = mysql_result($tiptop7,0,"scored");
$topscorer7 = mysql_result($tiptop7,0,"player");
$topscored7 = mysql_result($tiptop7,0,"match");
$dodat = mysql_query("SELECT name, surname FROM players WHERE id ='$topscorer7' LIMIT 1");
$d = mysql_fetch_array($dodat);
$name7 = $d['name'];
$surname7 = $d['surname'];
if (strlen($surname7)<1) {$surname7 = '<i>retired player</i>';}
}
?>
<h2><?=$langmark806?></h2><br/>
<b><?=$langmark807?> <a href="prikaz.php?matchid=<?=$topscored?>"><?=$langmark814?></a></b>:<br/>>&nbsp;<a href="player.php?playerid=<?=$topscorer?>"><?=$name," ",$surname?></a>&nbsp;-&nbsp;<?=$topscores?><br/>
<b><?=$langmark808?> <a href="prikaz.php?matchid=<?=$topscored6?>"><?=$langmark814?></a></b>:<br/>>&nbsp;<a href="player.php?playerid=<?=$topscorer6?>"><?=$name6," ",$surname6?></a>&nbsp;-&nbsp;<?=$topscores6?><br/>
<b><?=$langmark809?> <a href="prikaz.php?matchid=<?=$topscored1?>"><?=$langmark814?></a></b>:<br/>>&nbsp;<a href="player.php?playerid=<?=$topscorer1?>"><?=$name1," ",$surname1?></a>&nbsp;-&nbsp;<?=$topscores1?><br/>
<b><?=$langmark810?> <a href="prikaz.php?matchid=<?=$topscored2?>"><?=$langmark814?></a></b>:<br/>>&nbsp;<a href="player.php?playerid=<?=$topscorer2?>"><?=$name2," ",$surname2?></a>&nbsp;-&nbsp;<?=$topscores2?><br/>
<b><?=$langmark811?> <a href="prikaz.php?matchid=<?=$topscored3?>"><?=$langmark814?></a></b>:<br/>>&nbsp;<a href="player.php?playerid=<?=$topscorer3?>"><?=$name3," ",$surname3?></a>&nbsp;-&nbsp;<?=$topscores3?><br/>
<b><?=$langmark812?> <a href="prikaz.php?matchid=<?=$topscored4?>"><?=$langmark814?></a></b>:<br/>>&nbsp;<a href="player.php?playerid=<?=$topscorer4?>"><?=$name4," ",$surname4?></a>&nbsp;-&nbsp;<?=$topscores4?><br/>
<b><?=$langmark813?> <a href="prikaz.php?matchid=<?=$topscored5?>"><?=$langmark814?></a></b>:<br/>>&nbsp;<a href="player.php?playerid=<?=$topscorer5?>"><?=$name5," ",$surname5?></a>&nbsp;-&nbsp;<?=$topscores5?><br/>
<b><?=$langmark1289?> <a href="prikaz.php?matchid=<?=$topscored7?>"><?=$langmark814?></a></b>:<br/>>&nbsp;<a href="player.php?playerid=<?=$topscorer7?>"><?=$name7," ",$surname7?></a>&nbsp;-&nbsp;<?=$topscores7?><br/>

</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>