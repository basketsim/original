<?php
$coexpand=14;
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}
$compare = mysql_query("SELECT club, lang, natcoach FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)) {
$trueclub = mysql_result ($compare,0,"club");
$lang = mysql_result ($compare,0,"lang");
$natcoach = mysql_result ($compare,0,"natcoach");
}
else {die(include 'basketsim.php');}

$country44=$_POST['country'];
if (!$country44) {$country44=$_GET['country'];}
if (!$country44) {$country44='21-3';}
$country40=stripslashes($country44);
$defin = explode("-", $country40);
$queryseason = $defin[0];
$querytype = $defin[1];

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2>National team player stats</h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="66%">

<?php
echo "<h3>",$langmark264," ",$name," ";

if ($country44=='21-3'){echo "10th World Cup";}
elseif ($country44=='21-11'){echo "10th Jr. WC Qualifying";}
elseif ($country44=='20-1'){echo "10th WC Qualifying";}
elseif ($country44=='20-13'){echo "9th Jr. World Cup";}
elseif ($country44=='19-3'){echo "9th World Cup";}
elseif ($country44=='19-11'){echo "9th Jr. WC Qualifying";}
elseif ($country44=='18-1'){echo "9th WC Qualifying";}
elseif ($country44=='18-13'){echo "8th Jr. World Cup";}
elseif ($country44=='17-3'){echo "8th World Cup";}
elseif ($country44=='17-11'){echo "8th Jr. WC Qualifying";}
elseif ($country44=='16-1'){echo "8th WC Qualifying";}
elseif ($country44=='16-13'){echo "7th Jr. World Cup";}
elseif ($country44=='15-3'){echo "7th World Cup";}
elseif ($country44=='15-11'){echo "7th Jr. WC Qualifying";}
elseif ($country44=='14-1'){echo "7th WC Qualifying";}
elseif ($country44=='14-13'){echo "6th Jr. World Cup";}
elseif ($country44=='13-3'){echo "6th World Cup";}
elseif ($country44=='13-11'){echo "6th Jr. WC Qualifying";}
elseif ($country44=='12-1'){echo "6th WC Qualifying";}
elseif ($country44=='12-13'){echo "5th Jr. World Cup";}
elseif ($country44=='11-3'){echo "5th World Cup";}
elseif ($country44=='11-11'){echo "5th Jr. WC Qualifying";}
elseif ($country44=='10-1'){echo "5th WC Qualifying";}
elseif ($country44=='10-13'){echo "4th Jr. World Cup";}
elseif ($country44=='9-3'){echo "4th World Cup";}
elseif ($country44=='9-11'){echo "4th Jr. WC Qualifying";}
elseif ($country44=='8-1'){echo "4th WC Qualifying";}
elseif ($country44=='8-13'){echo "3rd Jr. World Cup";}
elseif ($country44=='7-3'){echo "3rd World Cup";}
elseif ($country44=='7-11'){echo "3rd Jr. WC Qualifying";}
elseif ($country44=='6-1'){echo "3rd WC Qualifying";}
elseif ($country44=='6-13'){echo "2nd Jr. World Cup";}
elseif ($country44=='5-3'){echo "2nd World Cup";}
elseif ($country44=='5-11'){echo "2nd Jr. WC Qualifying";}
elseif ($country44=='4-1'){echo "2nd WC Qualifying";}
elseif ($country44=='4-13'){echo "1st Jr. World Cup";}
elseif ($country44=='3-3'){echo "1st World Cup";}
elseif ($country44=='3-11'){echo "1st Jr. WC Qualifying";}
elseif ($country44=='2-1'){echo "1st WC Qualifying";}
echo "</h3><hr/>";
$stat=$_GET['stat'];
if($stat=='pts'){echo $langmark265,":";}
if($stat=='2pt'){echo $langmark266,":";}
if($stat=='1pt'){echo $langmark267,":";}
if($stat=='3pt'){echo $langmark268,":";}
if($stat=='tot'){echo $langmark269,":";}
if($stat=='off'){echo $langmark270,":";}
if($stat=='def'){echo $langmark271,":";}
if($stat=='bpg'){echo $langmark272,":";}
if($stat=='apg'){echo $langmark273,":";}
if($stat=='spg'){echo $langmark274,":";}
if($stat=='fpg'){echo $langmark275,":";}
if($stat=='tpg'){echo $langmark276,":";}
if($stat=='rat'){echo $langmark1370,":";}
if(!$stat){echo "<br/>Players with 100 minutes or more played are eligible for listing.";}
SWITCH ($stat) {
CASE 'pts':
$nekaj = mysql_query("SELECT player, nt_totalstats.scoring/played AS average, name, surname, country FROM nt_totalstats, players WHERE season=$queryseason AND player=id AND gametime > 99 AND type=$querytype ORDER BY nt_totalstats.scoring/played DESC LIMIT 30") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum == 0) {echo "<br/><br/>",$langmark301;} else {
echo "<table cellspacing=\"0\" cellpadding=\"1\" width=\"99%\" border=\"0\">";
$b=0;
while ($b < $bum) {
$player = mysql_result($nekaj,$b,"player");
$ime = mysql_result($nekaj,$b,"name");
$priimek = mysql_result($nekaj,$b,"surname");
$scoring = mysql_result($nekaj,$b,"average");
$countr = mysql_result($nekaj,$b,"country");
if ($countr=='Bosnia') {$countr='BiH';}
if ($querytype <10) {$countri = "<a class=\"greenhilite\" href=\"nationalteams.php?country=".$countr."\">".$countr."</a>";} else {$countri = "<a class=\"greenhilite\" href=\"u18teams.php?country=".$countr."\">".$countr."</a>";}
$no=$b+1;
echo "<tr><td>",$no,". <a href=\"player.php?playerid=",$player,"\">",$ime," ",$priimek,"</a> (",$countri,")</td><td align=\"right\">",number_format($scoring,1),"</td></tr>";
$b++;
}
echo "</table>";
if ($b > 0 AND $b < 10) {echo "<br/><i>",$langmark278,"</i>";}
}
break;

CASE '2pt':
$nekaj = mysql_query("SELECT player, nt_totalstats.two_scored/nt_totalstats.two_total AS average, name, surname, country FROM nt_totalstats, players WHERE season=$queryseason AND player=id AND gametime > 99 AND type=$querytype ORDER BY nt_totalstats.two_scored/nt_totalstats.two_total DESC LIMIT 30") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum == 0) {echo "<br/><br/>",$langmark301;} else {
echo "<table cellspacing=\"0\" cellpadding=\"1\" width=\"99%\" border=\"0\">";
$b=0;
while ($b < $bum) {
$player = mysql_result($nekaj,$b,"player");
$ime = mysql_result($nekaj,$b,"name");
$priimek = mysql_result($nekaj,$b,"surname");
$scoring = mysql_result($nekaj,$b,"average");
$countr = mysql_result($nekaj,$b,"country");
if ($countr=='Bosnia') {$countr='BiH';}
if ($querytype <10) {$countri = "<a class=\"greenhilite\" href=\"nationalteams.php?country=".$countr."\">".$countr."</a>";} else {$countri = "<a class=\"greenhilite\" href=\"u18teams.php?country=".$countr."\">".$countr."</a>";}
$no=$b+1;
echo "<tr><td>",$no,". <a href=\"player.php?playerid=",$player,"\">",$ime," ",$priimek,"</a> (",$countri,")</td><td align=\"right\">",number_format(100*$scoring,1),"%</td></tr>";
$b++;
}
echo "</table>";
if ($b > 0 AND $b < 10) {echo "<br/><i>",$langmark279,"</i>";}
}
break;

CASE '1pt':
$nekaj = mysql_query("SELECT player, nt_totalstats.one_scored/nt_totalstats.one_total AS average, name, surname, country FROM nt_totalstats, players WHERE season=$queryseason AND player=id AND gametime > 99 AND type=$querytype ORDER BY nt_totalstats.one_scored/nt_totalstats.one_total DESC LIMIT 30") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum == 0) {echo "<br/><br/>",$langmark301;} else {
echo "<table cellspacing=\"0\" cellpadding=\"1\" width=\"99%\" border=\"0\">";
$b=0;
while ($b < $bum) {
$player = mysql_result($nekaj,$b,"player");
$ime = mysql_result($nekaj,$b,"name");
$priimek = mysql_result($nekaj,$b,"surname");
$scoring = mysql_result($nekaj,$b,"average");
$countr = mysql_result($nekaj,$b,"country");
if ($countr=='Bosnia') {$countr='BiH';}
if ($querytype <10) {$countri = "<a class=\"greenhilite\" href=\"nationalteams.php?country=".$countr."\">".$countr."</a>";} else {$countri = "<a class=\"greenhilite\" href=\"u18teams.php?country=".$countr."\">".$countr."</a>";}
$no=$b+1;
echo "<tr><td>",$no,". <a href=\"player.php?playerid=",$player,"\">",$ime," ",$priimek,"</a> (",$countri,")</td><td align=\"right\">",number_format(100*$scoring,1),"%</td></tr>";
$b++;
}
echo "</table>";
if ($b > 0 AND $b < 10) {echo "<br/><i>",$langmark280,"</i>";}
}
break;

CASE '3pt':
$nekaj = mysql_query("SELECT player, nt_totalstats.three_scored/nt_totalstats.three_total AS average, name, surname, country FROM nt_totalstats, players WHERE season=$queryseason AND player=id AND gametime > 99 AND three_total > played AND type=$querytype ORDER BY nt_totalstats.three_scored/nt_totalstats.three_total DESC LIMIT 30") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum == 0) {echo "<br/><br/>",$langmark301;} else {
echo "<table cellspacing=\"0\" cellpadding=\"1\" width=\"99%\" border=\"0\">";
$b=0;
while ($b < $bum) {
$player = mysql_result($nekaj,$b,"player");
$ime = mysql_result($nekaj,$b,"name");
$priimek = mysql_result($nekaj,$b,"surname");
$scoring = mysql_result($nekaj,$b,"average");
$countr = mysql_result($nekaj,$b,"country");
if ($countr=='Bosnia') {$countr='BiH';}
if ($querytype <10) {$countri = "<a class=\"greenhilite\" href=\"nationalteams.php?country=".$countr."\">".$countr."</a>";} else {$countri = "<a class=\"greenhilite\" href=\"u18teams.php?country=".$countr."\">".$countr."</a>";}
$no=$b+1;
echo "<tr><td>",$no,". <a href=\"player.php?playerid=",$player,"\">",$ime," ",$priimek,"</a> (",$countri,")</td><td align=\"right\">",number_format(100*$scoring,1),"%</td></tr>";
$b++;
}
echo "</table>";
if ($b > 0 AND $b < 10) {echo "<br/><i>",$langmark281,"</i>";}
}
break;

CASE 'tot':
$nekaj = mysql_query("SELECT player, (nt_totalstats.off_rebounds+nt_totalstats.def_rebounds)/played AS average, name, surname, country FROM nt_totalstats, players WHERE season=$queryseason AND player=id AND gametime > 99 AND type=$querytype ORDER BY (off_rebounds+def_rebounds)/played DESC LIMIT 30") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum == 0) {echo "<br/><br/>",$langmark301;} else {
echo "<table cellspacing=\"0\" cellpadding=\"1\" width=\"99%\" border=\"0\">";
$b=0;
while ($b < $bum) {
$player = mysql_result($nekaj,$b,"player");
$ime = mysql_result($nekaj,$b,"name");
$priimek = mysql_result($nekaj,$b,"surname");
$scoring = mysql_result($nekaj,$b,"average");
$countr = mysql_result($nekaj,$b,"country");
if ($countr=='Bosnia') {$countr='BiH';}
if ($querytype <10) {$countri = "<a class=\"greenhilite\" href=\"nationalteams.php?country=".$countr."\">".$countr."</a>";} else {$countri = "<a class=\"greenhilite\" href=\"u18teams.php?country=".$countr."\">".$countr."</a>";}
$no=$b+1;
echo "<tr><td>",$no,". <a href=\"player.php?playerid=",$player,"\">",$ime," ",$priimek,"</a> (",$countri,")</td><td align=\"right\">",number_format($scoring,1),"</td></tr>";
$b++;
}
echo "</table>";
if ($b > 0 AND $b < 10) {echo "<br/><i>",$langmark283,"</i>";}
}
break;

CASE 'off':
$nekaj = mysql_query("SELECT player, nt_totalstats.off_rebounds/played AS average, name, surname, country FROM nt_totalstats, players WHERE season=$queryseason AND player=id AND gametime > 99 AND type=$querytype ORDER BY nt_totalstats.off_rebounds/played DESC LIMIT 30") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum == 0) {echo "<br/><br/>",$langmark301;} else {
echo "<table cellspacing=\"0\" cellpadding=\"1\" width=\"99%\" border=\"0\">";
$b=0;
while ($b < $bum) {
$player = mysql_result($nekaj,$b,"player");
$ime = mysql_result($nekaj,$b,"name");
$priimek = mysql_result($nekaj,$b,"surname");
$scoring = mysql_result($nekaj,$b,"average");
$countr = mysql_result($nekaj,$b,"country");
if ($countr=='Bosnia') {$countr='BiH';}
if ($querytype <10) {$countri = "<a class=\"greenhilite\" href=\"nationalteams.php?country=".$countr."\">".$countr."</a>";} else {$countri = "<a class=\"greenhilite\" href=\"u18teams.php?country=".$countr."\">".$countr."</a>";}
$no=$b+1;
echo "<tr><td>",$no,". <a href=\"player.php?playerid=",$player,"\">",$ime," ",$priimek,"</a> (",$countri,")</td><td align=\"right\">",number_format($scoring,1),"</td></tr>";
$b++;
}
echo "</table>";
if ($b > 0 AND $b < 10) {echo "<br/><i>",$langmark284,"</i>";}
}
break;

CASE 'def':
$nekaj = mysql_query("SELECT player, nt_totalstats.def_rebounds/played AS average, name, surname, country FROM nt_totalstats, players WHERE season=$queryseason AND player=id AND gametime > 99 AND type=$querytype ORDER BY nt_totalstats.def_rebounds/played DESC LIMIT 30") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum == 0) {echo "<br/><br/>",$langmark301;} else {
echo "<table cellspacing=\"0\" cellpadding=\"1\" width=\"99%\" border=\"0\">";
$b=0;
while ($b < $bum) {
$player = mysql_result($nekaj,$b,"player");
$ime = mysql_result($nekaj,$b,"name");
$priimek = mysql_result($nekaj,$b,"surname");
$scoring = mysql_result($nekaj,$b,"average");
$countr = mysql_result($nekaj,$b,"country");
if ($countr=='Bosnia') {$countr='BiH';}
if ($querytype <10) {$countri = "<a class=\"greenhilite\" href=\"nationalteams.php?country=".$countr."\">".$countr."</a>";} else {$countri = "<a class=\"greenhilite\" href=\"u18teams.php?country=".$countr."\">".$countr."</a>";}
$no=$b+1;
echo "<tr><td>",$no,". <a href=\"player.php?playerid=",$player,"\">",$ime," ",$priimek,"</a> (",$countri,")</td><td align=\"right\">",number_format($scoring,1),"</td></tr>";
$b++;
}
echo "</table>";
if ($b > 0 AND $b < 10) {echo "<br/><i>",$langmark285,"</i>";}
}
break;

CASE 'bpg':
$nekaj = mysql_query("SELECT player, nt_totalstats.blocks/played AS average, name, surname, country FROM nt_totalstats, players WHERE season=$queryseason AND player=id AND gametime > 99 AND type=$querytype ORDER BY nt_totalstats.blocks/played DESC LIMIT 30") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum == 0) {echo "<br/><br/>",$langmark301;} else {
echo "<table cellspacing=\"0\" cellpadding=\"1\" width=\"99%\" border=\"0\">";
$b=0;
while ($b < $bum) {
$player = mysql_result($nekaj,$b,"player");
$ime = mysql_result($nekaj,$b,"name");
$priimek = mysql_result($nekaj,$b,"surname");
$scoring = mysql_result($nekaj,$b,"average");
$countr = mysql_result($nekaj,$b,"country");
if ($countr=='Bosnia') {$countr='BiH';}
if ($querytype <10) {$countri = "<a class=\"greenhilite\" href=\"nationalteams.php?country=".$countr."\">".$countr."</a>";} else {$countri = "<a class=\"greenhilite\" href=\"u18teams.php?country=".$countr."\">".$countr."</a>";}
$no=$b+1;
echo "<tr><td>",$no,". <a href=\"player.php?playerid=",$player,"\">",$ime," ",$priimek,"</a> (",$countri,")</td><td align=\"right\">",number_format($scoring,1),"</td></tr>";
$b++;
}
echo "</table>";
if ($b > 0 AND $b < 10) {echo "<br/><i>",$langmark287,"</i>";}
}
break;

CASE 'apg':
$nekaj = mysql_query("SELECT player, nt_totalstats.assists/played AS average, name, surname, country FROM nt_totalstats, players WHERE season=$queryseason AND player=id AND gametime > 99 AND type=$querytype ORDER BY nt_totalstats.assists/played DESC LIMIT 30") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum == 0) {echo "<br/><br/>",$langmark301;} else {
echo "<table cellspacing=\"0\" cellpadding=\"1\" width=\"99%\" border=\"0\">";
$b=0;
while ($b < $bum) {
$player = mysql_result($nekaj,$b,"player");
$ime = mysql_result($nekaj,$b,"name");
$priimek = mysql_result($nekaj,$b,"surname");
$scoring = mysql_result($nekaj,$b,"average");
$countr = mysql_result($nekaj,$b,"country");
if ($countr=='Bosnia') {$countr='BiH';}
if ($querytype <10) {$countri = "<a class=\"greenhilite\" href=\"nationalteams.php?country=".$countr."\">".$countr."</a>";} else {$countri = "<a class=\"greenhilite\" href=\"u18teams.php?country=".$countr."\">".$countr."</a>";}
$no=$b+1;
echo "<tr><td>",$no,". <a href=\"player.php?playerid=",$player,"\">",$ime," ",$priimek,"</a> (",$countri,")</td><td align=\"right\">",number_format($scoring,1),"</td></tr>";
$b++;
}
echo "</table>";
if ($b > 0 AND $b < 10) {echo "<br/><i>",$langmark288,"</i>";}
}
break;

CASE 'spg':
$nekaj = mysql_query("SELECT player, nt_totalstats.steals/played AS average, name, surname, country FROM nt_totalstats, players WHERE season=$queryseason AND player=id AND gametime > 99 AND type=$querytype ORDER BY nt_totalstats.steals/played DESC LIMIT 30") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum == 0) {echo "<br/><br/>",$langmark301;} else {
echo "<table cellspacing=\"0\" cellpadding=\"1\" width=\"99%\" border=\"0\">";
$b=0;
while ($b < $bum) {
$player = mysql_result($nekaj,$b,"player");
$ime = mysql_result($nekaj,$b,"name");
$priimek = mysql_result($nekaj,$b,"surname");
$scoring = mysql_result($nekaj,$b,"average");
$countr = mysql_result($nekaj,$b,"country");
if ($querytype <10) {$countri = "<a class=\"greenhilite\" href=\"nationalteams.php?country=".$countr."\">".$countr."</a>";} else {$countri = "<a class=\"greenhilite\" href=\"u18teams.php?country=".$countr."\">".$countr."</a>";}
$no=$b+1;
echo "<tr><td>",$no,". <a href=\"player.php?playerid=",$player,"\">",$ime," ",$priimek,"</a> (",$countri,")</td><td align=\"right\">",number_format($scoring,1),"</td></tr>";
$b++;
}
echo "</table>";
if ($b > 0 AND $b < 10) {echo "<br/><i>",$langmark289,"</i>";}
}
break;

CASE 'fpg':
$nekaj = mysql_query("SELECT player, nt_totalstats.fouls/played AS average, name, surname, country FROM nt_totalstats, players WHERE season=$queryseason AND player=id AND gametime > 99 AND type=$querytype ORDER BY nt_totalstats.fouls/played DESC LIMIT 30") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum == 0) {echo "<br/><br/>",$langmark301;} else {
echo "<table cellspacing=\"0\" cellpadding=\"1\" width=\"99%\" border=\"0\">";
$b=0;
while ($b < $bum) {
$player = mysql_result($nekaj,$b,"player");
$ime = mysql_result($nekaj,$b,"name");
$priimek = mysql_result($nekaj,$b,"surname");
$scoring = mysql_result($nekaj,$b,"average");
$countr = mysql_result($nekaj,$b,"country");
if ($countr=='Bosnia') {$countr='BiH';}
if ($querytype <10) {$countri = "<a class=\"greenhilite\" href=\"nationalteams.php?country=".$countr."\">".$countr."</a>";} else {$countri = "<a class=\"greenhilite\" href=\"u18teams.php?country=".$countr."\">".$countr."</a>";}
$no=$b+1;
echo "<tr><td>",$no,". <a href=\"player.php?playerid=",$player,"\">",$ime," ",$priimek,"</a> (",$countri,")</td><td align=\"right\">",number_format($scoring,1),"</td></tr>";
$b++;
}
echo "</table>";
if ($b > 0 AND $b < 10) {echo "<br/><i>",$langmark290,"</i>";}
}
break;

CASE 'tpg':
$nekaj = mysql_query("SELECT player, turnovers/played AS average, name, surname, country FROM nt_totalstats, players WHERE season=$queryseason AND player=id AND gametime > 99 AND type=$querytype ORDER BY turnovers/played DESC LIMIT 30") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum == 0) {echo "<br/><br/>",$langmark301;} else {
echo "<table cellspacing=\"0\" cellpadding=\"1\" width=\"99%\" border=\"0\">";
$b=0;
while ($b < $bum) {
$player = mysql_result($nekaj,$b,"player");
$ime = mysql_result($nekaj,$b,"name");
$priimek = mysql_result($nekaj,$b,"surname");
$scoring = mysql_result($nekaj,$b,"average");
$countr = mysql_result($nekaj,$b,"country");
if ($countr=='Bosnia') {$countr='BiH';}
if ($querytype <10) {$countri = "<a class=\"greenhilite\" href=\"nationalteams.php?country=".$countr."\">".$countr."</a>";} else {$countri = "<a class=\"greenhilite\" href=\"u18teams.php?country=".$countr."\">".$countr."</a>";}
$no=$b+1;
echo "<tr><td>",$no,". <a href=\"player.php?playerid=",$player,"\">",$ime," ",$priimek,"</a> (",$countri,")</td><td align=\"right\">",number_format($scoring,1),"</td></tr>";
$b++;
}
echo "</table>";
if ($b > 0 AND $b < 10) {echo "<br/><i>",$langmark291,"</i>";}
}
break;

CASE 'rat':
$nekaj = mysql_query("SELECT player, (scoring - ( two_total - two_scored ) - ( one_total - one_scored ) - ( three_total - three_scored ) + def_rebounds + off_rebounds + blocks + assists + steals - turnovers) / played AS average, name, surname, country FROM nt_totalstats, players WHERE (scoring - two_total + two_scored - one_total + one_scored - three_total + three_scored + def_rebounds + off_rebounds + blocks + assists + steals - turnovers) < 150000 AND player=id AND season =$queryseason AND gametime >99 AND type=$querytype ORDER BY average DESC LIMIT 30") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum == 0) {echo "<br/><br/>",$langmark301;} else {
echo "<table cellspacing=\"0\" cellpadding=\"1\" width=\"99%\" border=\"0\">";
$b=0;
while ($b < $bum) {
$player = mysql_result($nekaj,$b,"player");
$ime = mysql_result($nekaj,$b,"name");
$priimek = mysql_result($nekaj,$b,"surname");
$scoring = mysql_result($nekaj,$b,"average");
$countr = mysql_result($nekaj,$b,"country");
if ($countr=='Bosnia') {$countr='BiH';}
if ($querytype <10) {$countri = "<a class=\"greenhilite\" href=\"nationalteams.php?country=".$countr."\">".$countr."</a>";} else {$countri = "<a class=\"greenhilite\" href=\"u18teams.php?country=".$countr."\">".$countr."</a>";}
$no=$b+1;
echo "<tr><td>",$no,". <a href=\"player.php?playerid=",$player,"\">",$ime," ",$priimek,"</a> (",$countri,")</td><td align=\"right\">",number_format($scoring,1),"</td></tr>";
$b++;
}
echo "</table>";
if ($b > 0 AND $b < 10) {echo "<br/><i>",$langmark291,"</i>";}
}
break;
}
?>
</td>
<td class="border" width="34%">
<h2>Choose competition</h2><br/>
<form method="post" action="ntstats.php" style="margin: 0">
<select name="country" class="inputreg">
<option value="21-3" <?php if ($country44=='21-3'){echo "selected";}?>>10th World Cup</option>
<option value="21-11" <?php if ($country44=='21-11'){echo "selected";}?>>10th Jr. WC Qual.</option>
<option value="20-1" <?php if ($country44=='20-1'){echo "selected";}?>>10th WC Qual.</option>
<option value="20-13" <?php if ($country44=='20-13'){echo "selected";}?>>9th Jr. World Cup</option>
<option value="19-3" <?php if ($country44=='19-3'){echo "selected";}?>>9th World Cup</option>
<option value="19-11" <?php if ($country44=='19-11'){echo "selected";}?>>9th Jr. WC Qual.</option>
<option value="18-1" <?php if ($country44=='18-1'){echo "selected";}?>>9th WC Qual.</option>
<option value="18-13" <?php if ($country44=='18-13'){echo "selected";}?>>8th Jr. World Cup</option>
<option value="17-3" <?php if ($country44=='17-3'){echo "selected";}?>>8th World Cup</option>
<option value="17-11" <?php if ($country44=='17-11'){echo "selected";}?>>8th Jr. WC Qual.</option>
<option value="16-1" <?php if ($country44=='16-1'){echo "selected";}?>>8th WC Qual.</option>
<option value="16-13" <?php if ($country44=='16-13'){echo "selected";}?>>7th Jr. World Cup</option>
<option value="15-3" <?php if ($country44=='15-3'){echo "selected";}?>>7th World Cup</option>
<option value="15-11" <?php if ($country44=='15-11'){echo "selected";}?>>7th Jr. WC Qual.</option>
<option value="14-1" <?php if ($country44=='14-1'){echo "selected";}?>>7th WC Qual.</option>
<option value="14-13" <?php if ($country44=='14-13'){echo "selected";}?>>6th Jr. World Cup</option>
<option value="13-3" <?php if ($country44=='13-3'){echo "selected";}?>>6th World Cup</option>
<option value="13-11" <?php if ($country44=='13-11'){echo "selected";}?>>6th Jr. WC Qual.</option>
<option value="12-1" <?php if ($country44=='12-1'){echo "selected";}?>>6th WC Qual.</option>
<option value="12-13" <?php if ($country44=='12-13'){echo "selected";}?>>5th Jr. World Cup</option>
<option value="11-3" <?php if ($country44=='11-3'){echo "selected";}?>>5th World Cup</option>
<option value="11-11" <?php if ($country44=='11-11'){echo "selected";}?>>5th Jr. WC Qual.</option>
<option value="10-1" <?php if ($country44=='10-1'){echo "selected";}?>>5th WC Qual.</option>
<option value="10-13" <?php if ($country44=='10-13'){echo "selected";}?>>4th Jr. World Cup</option>
<option value="9-3" <?php if ($country44=='9-3'){echo "selected";}?>>4th World Cup</option>
<option value="9-11" <?php if ($country44=='9-11'){echo "selected";}?>>4th Jr. WC Qual.</option>
<option value="8-1" <?php if ($country44=='8-1'){echo "selected";}?>>4th WC Qual.</option>
<option value="8-13" <?php if ($country44=='8-13'){echo "selected";}?>>3rd Jr. World Cup</option>
<option value="7-3" <?php if ($country44=='7-3'){echo "selected";}?>>3rd World Cup</option>
<option value="7-11" <?php if ($country44=='7-11'){echo "selected";}?>>3rd Jr. WC Qual.</option>
<option value="6-1" <?php if ($country44=='6-1'){echo "selected";}?>>3rd WC Qual.</option>
<option value="6-13" <?php if ($country44=='6-13'){echo "selected";}?>>2nd Jr. World Cup</option>
<option value="5-3" <?php if ($country44=='5-3'){echo "selected";}?>>2nd World Cup</option>
<option value="5-11" <?php if ($country44=='5-11'){echo "selected";}?>>2nd Jr. WC Qual.</option>
<option value="4-1" <?php if ($country44=='4-1'){echo "selected";}?>>2nd WC Qual.</option>
<option value="4-13" <?php if ($country44=='4-13'){echo "selected";}?>>1st Jr. World Cup</option>
<option value="3-3" <?php if ($country44=='3-3'){echo "selected";}?>>1st World Cup</option>
<option value="3-11" <?php if ($country44=='3-11'){echo "selected";}?>>1st Jr. WC Qual.</option>
<option value="2-1" <?php if ($country44=='2-1'){echo "selected";}?>>1st WC Qual.</option>
</select>
<input type="submit" value="&nbsp;&raquo;" name="submit" class="buttonreg">
</form>
<br/>
<h2><?=$langmark303?></h2><br/>
<?php if($stat=='pts'){?><b><?=$langmark304?></b><?php }else{?><a href="ntstats.php?country=<?=$country44?>&stat=pts"><?=$langmark304?></a><?php }?><br/>
<?php if($stat=='2pt'){?><b><?=$langmark305?></b><?php }else{?><a href="ntstats.php?country=<?=$country44?>&stat=2pt"><?=$langmark305?></a><?php }?><br/>
<?php if($stat=='1pt'){?><b><?=$langmark306?></b><?php }else{?><a href="ntstats.php?country=<?=$country44?>&stat=1pt"><?=$langmark306?></a><?php }?><br/>
<?php if($stat=='3pt'){?><b><?=$langmark307?></b><?php }else{?><a href="ntstats.php?country=<?=$country44?>&stat=3pt"><?=$langmark307?></a><?php }?><br/>
<?php if($stat=='tot'){?><b><?=$langmark308?></b><?php }else{?><a href="ntstats.php?country=<?=$country44?>&stat=tot"><?=$langmark308?></a><?php }?><br/>
<?php if($stat=='off'){?><b><?=$langmark309?></b><?php }else{?><a href="ntstats.php?country=<?=$country44?>&stat=off"><?=$langmark309?></a><?php }?><br/>
<?php if($stat=='def'){?><b><?=$langmark310?></b><?php }else{?><a href="ntstats.php?country=<?=$country44?>&stat=def"><?=$langmark310?></a><?php }?><br/>
<?php if($stat=='bpg'){?><b><?=$langmark311?></b><?php }else{?><a href="ntstats.php?country=<?=$country44?>&stat=bpg"><?=$langmark311?></a><?php }?><br/>
<?php if($stat=='apg'){?><b><?=$langmark312?></b><?php }else{?><a href="ntstats.php?country=<?=$country44?>&stat=apg"><?=$langmark312?></a><?php }?><br/>
<?php if($stat=='spg'){?><b><?=$langmark313?></b><?php }else{?><a href="ntstats.php?country=<?=$country44?>&stat=spg"><?=$langmark313?></a><?php }?><br/>
<?php if($stat=='fpg'){?><b><?=$langmark314?></b><?php }else{?><a href="ntstats.php?country=<?=$country44?>&stat=fpg"><?=$langmark314?></a><?php }?><br/>
<?php if($stat=='tpg'){?><b><?=$langmark315?></b><?php }else{?><a href="ntstats.php?country=<?=$country44?>&stat=tpg"><?=$langmark315?></a><?php }?><br/>
<?php if($stat=='rat'){?><b><?=$langmark1371?></b><?php }else{?><a href="ntstats.php?country=<?=$country44?>&stat=rat"><?=$langmark1371?></a><?php }?>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>