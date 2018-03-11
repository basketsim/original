<?php
$squad=$_GET['squad'];
if (!is_numeric($squad)) {die(include 'index.php');}

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$comparep = mysql_query("SELECT lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($comparep)) {$lang = mysql_result ($comparep,0);} else {die(include 'basketsim.php');}

require("inc/lang/".$lang.".php");

$result = mysql_query("SELECT arenaid, arenaname, seats1, seats2, seats3, seats4, in_use, cheer_logo, name, status FROM arena, teams WHERE arena.teamid = teams.teamid AND arena.teamid ='$squad' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($result)) {
$arenaid=mysql_result($result,0,"arenaid");
$arenaname=mysql_result($result,0,"arenaname");
$seats1=mysql_result($result,0,"seats1");
$seats2=mysql_result($result,0,"seats2");
$seats3=mysql_result($result,0,"seats3");
$seats4=mysql_result($result,0,"seats4");
$in_use=mysql_result($result,0,"in_use");
$cheer_logo=mysql_result($result,0,"cheer_logo");
$steamnm=mysql_result($result,0,"name");
$statusje=mysql_result($result,0,"status");
}
else {die(include 'index.php');}
if ($statusje<2){
$result_club = mysql_query("SELECT userid FROM users WHERE club ='$squad'") or die(mysql_error());
while ($club_w = mysql_fetch_array($result_club, MYSQL_ASSOC))
   {   foreach ($club_w as $usertea)
   {$usertea; }     } ;
}
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2><?=$langmark075?></h2>
<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff"><td class="border" width="45%">

<table>
<tr>
<b><big><?=stripslashes($arenaname)," (",$arenaid?>)</big></b>
<hr/>
</tr><tr><td align="right" style='width:124;text-wrap:hard-wrap'><b><?=$langmark047?>:</b></td><td width="76" align="right"><?=$seats1?></td>
</tr><tr><td align="right" style='width:124;text-wrap:hard-wrap'><b><?=$langmark048?>:</b></td><td width="76" align="right"><?=$seats2?></td>
</tr><tr><td align="right" style='width:124;text-wrap:hard-wrap'><b><?=$langmark049?>:</b></td><td width="76" align="right"><?=$seats3?></td>
</tr><tr><td align="right" style='width:124;text-wrap:hard-wrap'><b><?=$langmark050?>:</b></td><td width="76" align="right"><?=$seats4?></td>
</tr><tr align="right"><td align="right" style='width:124;text-wrap:hard-wrap'><hr><b><?=$langmark051?>:</b></td><td width="76" align="right"><hr><?=($seats1+$seats2+$seats3+$seats4)?></td>
</tr>
</table>
<?php if ($in_use <100) {echo "<br/><i>",$langmark052,"&nbsp;",$in_use,"%.</i>";}?>
<hr/>
<?php
if ($statusje<>3) {echo $langmark076," <a href=\"club.php?clubid=",$usertea,"\"><b>",stripslashes($steamnm),"</b></a>.";}
else {echo $langmark076," <a href=\"team.php?clubid=",$squad,"\"><b>",stripslashes($steamnm),"</b></a>.";}

$exnt_matches = mysql_query("SELECT `matchid`, `home_name`, `away_name`, `home_score`, `away_score`, `time`, `type`, `season` FROM nt_matches, arena WHERE home_id<>999 AND away_id<>999 AND arena_id=teamid AND teamid=$squad ORDER BY `time` ASC");
echo "<table width=\"100%\" height=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\">";
//FPC,CS,CWS
if ($arenaid==9133) {echo "<tr><td colspan=\"2\"><br/><h2>This arena had hosted the <a href=\"fairplaycup.php?season=12&round=10\"><font color=\"white\">FPC Final</font></a>!</h2></td></tr>";}
elseif ($arenaid==7889) {echo "<tr><td colspan=\"2\"><br/><h2>This arena had hosted the <a href=\"fairplaycup.php?season=13&round=9\"><font color=\"white\">FPC Final Four</font></a>!</h2></td></tr>";}
elseif ($arenaid==22097) {echo "<tr><td colspan=\"2\"><br/><h2>This arena had hosted the <a href=\"fairplaycup.php?season=14&round=9\"><font color=\"white\">FPC Final Four</font></a>!</h2></td></tr>";}
elseif ($arenaid==11695) {echo "<tr><td colspan=\"2\"><br/><h2>This arena had hosted the <a href=\"fairplaycup.php?season=15&round=9\"><font color=\"white\">FPC Final Four</font></a>!</h2></td></tr>";}
elseif ($arenaid==26170) {echo "<tr><td colspan=\"2\"><br/><h2>This arena had hosted the <a href=\"fairplaycup.php?season=16&round=9\"><font color=\"white\">FPC Final Four</font></a>!</h2></td></tr>";}
elseif ($arenaid==21396) {echo "<tr><td colspan=\"2\"><br/><h2>This arena had hosted the <a href=\"fairplaycup.php?season=17&round=9\"><font color=\"white\">FPC Final Four</font></a>!</h2></td></tr>";}
elseif ($arenaid==14534) {echo "<tr><td colspan=\"2\"><br/><h2>This arena had hosted the <a href=\"fairplaycup.php?season=18&round=9\"><font color=\"white\">FPC Final Four</font></a>!</h2></td></tr>";}
elseif ($arenaid==602) {echo "<tr><td colspan=\"2\"><br/><h2>This arena had hosted the <a href=\"cs.php?season=13&round=7\"><font color=\"white\">CS final</font></a>!</h2></td></tr>";}
elseif ($arenaid==18196) {echo "<tr><td colspan=\"2\"><br/><h2>This arena had hosted the <a href=\"cs.php?season=14&round=7\"><font color=\"white\">CS final</font></a>!</h2></td></tr>";}
elseif ($arenaid==6171) {echo "<tr><td colspan=\"2\"><br/><h2>This arena had hosted the <a href=\"cs.php?season=15&round=7\"><font color=\"white\">CS final</font></a>!</h2></td></tr>";}
elseif ($arenaid==30715) {echo "<tr><td colspan=\"2\"><br/><h2>This arena had hosted the <a href=\"cs.php?season=16&round=7\"><font color=\"white\">CS final</font></a>!</h2></td></tr>";}
elseif ($arenaid==20502) {echo "<tr><td colspan=\"2\"><br/><h2>This arena had hosted the <a href=\"cs.php?season=17&round=7\"><font color=\"white\">CS final</font></a>!</h2></td></tr>";}
elseif ($arenaid==19310) {echo "<tr><td colspan=\"2\"><br/><h2>This arena had hosted the <a href=\"cs.php?season=18&round=7\"><font color=\"white\">CS final</font></a>!</h2></td></tr>";}
elseif ($arenaid==2880) {echo "<tr><td colspan=\"2\"><br/><h2>This arena had hosted the <a href=\"cws.php?season=13&round=7\"><font color=\"white\">CWS final</font></a>!</h2></td></tr>";}
elseif ($arenaid==24931) {echo "<tr><td colspan=\"2\"><br/><h2>This arena had hosted the <a href=\"cws.php?season=14&round=7\"><font color=\"white\">CWS final</font></a>!</h2></td></tr>";}
elseif ($arenaid==28478) {echo "<tr><td colspan=\"2\"><br/><h2>This arena had hosted the <a href=\"cws.php?season=15&round=7\"><font color=\"white\">CWS final</font></a>!</h2></td></tr>";}
elseif ($arenaid==4566) {echo "<tr><td colspan=\"2\"><br/><h2>This arena had hosted the <a href=\"cws.php?season=16&round=7\"><font color=\"white\">CWS final</font></a>!</h2></td></tr>";}
elseif ($arenaid==10242) {echo "<tr><td colspan=\"2\"><br/><h2>This arena had hosted the <a href=\"cws.php?season=17&round=7\"><font color=\"white\">CWS final</font></a>!</h2></td></tr>";}
elseif ($arenaid==29683) {echo "<tr><td colspan=\"2\"><br/><h2>This arena had hosted the <a href=\"cws.php?season=18&round=7\"><font color=\"white\">CWS final</font></a>!</h2></td></tr>";}

if (mysql_num_rows($exnt_matches)) {echo "<tr><td colspan=\"2\"><br/><h2>NT matches hosted in this arena (",mysql_num_rows($exnt_matches),"):</h2></td></tr>";}
while ($m = mysql_fetch_array($exnt_matches)) {
$matchid=$m["matchid"];
$home_name=$m["home_name"];
$away_name=$m["away_name"];
$home_score=$m["home_score"];
$away_score=$m["away_score"];
$time=$m["time"];
$typee=$m["type"];
$seeee=$m["season"];
if ($home_name=='Bosnia and Herzegovina') {$home_name='BiH';}
if ($away_name=='Bosnia and Herzegovina') {$away_name='BiH';}
if ($typee==3 OR $typee==4) {$kloda=$kloda+1;}
if ($typee==13 OR $typee==14) {$vloda=$vloda+1;}
if ($typee > 10 AND $seeee < 16) {$home_name = $home_name." U18"; $away_name = $away_name." U18";}
if ($typee > 10 AND $seeee > 15) {$home_name = $home_name." U19"; $away_name = $away_name." U19";}
$tdatetime = explode(" ",$time); $ffdate = $tdatetime[0]; $fftime = $tdatetime[1];
$tdate = explode("-", $ffdate); $ffyear = $tdate[0]; $ffmonth = $tdate[1]; $ffday = $tdate[2];
$ttime = explode(":", $fftime); $ffhour = $ttime[0]; $ffmin = $ttime[1]; $ffsec = $ttime[2];
$time = date("d.m.Y", mktime($ffhour,$ffmin,$ffsec,$ffmonth,$ffday,$ffyear));
echo "<tr><td>";
if ($home_score > $away_score) {echo "<font color=\"green\">",$home_name,"</font>";} else {echo $home_name;}
echo " - ";
if ($home_score < $away_score) {echo "<font color=\"green\">",$away_name,"</font>";} else {echo $away_name;}
echo "</td><td align=\"right\"><a href=\"nt_prikaz.php?matchid=",$matchid,"\">",$home_score,"&nbsp;:&nbsp;",$away_score,"</a></tr>";
}
if ($kloda>0) {echo "<tr><td colspan=\"2\"><h2>This arena had hosted the World Cup!</h2></td></tr>";}
if ($vloda>0 AND $seeee < 16) {echo "<tr><td colspan=\"2\"><h2>This arena had hosted the U18 World Cup!</h2></td></tr>";}
if ($vloda>0 AND $seeee > 15) {echo "<tr><td colspan=\"2\"><h2>This arena had hosted the U19 World Cup!</h2></td></tr>";}
echo "</table>";
?>
</td>
<td class="border" width="55%" align="center">
<?php
if ($cheer_logo=='' AND $usertea<>$userid) {echo $langmark1368;}
elseif ($cheer_logo=='' AND $usertea == $userid) {echo $langmark078;}
else {?><img src="<?=$cheer_logo?>" alt="<?=$langmark1369," ",stripslashes($steamnm)?>" title="<?=$langmark1369," ",stripslashes($steamnm)?>" border="0" width="290"><?php }?>
</td>
</tr>
</table>