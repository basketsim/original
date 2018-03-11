<?php
$leagueid=$_GET['leagueid'];
if (!is_numeric($leagueid)) {die(include 'index.php');}

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT club, supporter, lang, level FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)) {
$trueclub = mysql_result ($compare,0,"club");
$is_supporter = mysql_result ($compare,0,"supporter");
$lang = mysql_result ($compare,0,"lang");
$lewel = mysql_result ($compare,0,"level");
}
else {die(include 'basketsim.php');}

//podatki o ligi
$liga = mysql_query("SELECT name, country, played FROM leagues, competition WHERE leagues.leagueid = competition.leagueid AND season ='$default_season' AND leagues.leagueid ='$leagueid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($liga)<>1) {die(include 'index.php');}
while($r=mysql_fetch_array($liga)) {
$name=$r[name];
$country=$r[country];
$played=$r[played];
}
$omejitev = $played * 0.33;

$stat=$_GET['stat'];
if ($stat=='mvp' AND $is_supporter==0 AND $lewel < 2) {header("Location: supporter.php");die ();}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2><?=$langmark263?></h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="67%">

<?php
echo "<h3>",$langmark264," ",$name," <small>(",$country,")</small></h3><hr/>";
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
if($stat=='mvp'){echo "Race for league MVP of the season:";}

if(!$stat){echo "<br/><i>",$langmark1528,"</i><br/><br/>",$langmark316," <a href=\"supporter.php\">",$langmark317,"</a>.";}

SWITCH ($stat) {
CASE 'pts':
$nekaj = mysql_query("SELECT player, scoring/played AS average, players.name AS ime, surname, teams.name AS ekipa, teamid FROM totalstats, players, teams WHERE season=$default_season AND player=id AND club=teamid AND team=teamid AND club<>0 AND gametime > 40 * $omejitev AND league ='$leagueid' ORDER BY scoring/played DESC LIMIT 50") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum==0) {echo "<br/><br/>",$langmark301;} else {
echo "<table cellspacing=\"0\" cellpadding=\"1\" width=\"100%\" border=\"0\">";
$b=0;
while ($b < $bum) {
$player = mysql_result($nekaj,$b,"player");
$ime = mysql_result($nekaj,$b,"ime");
$priimek = mysql_result($nekaj,$b,"surname");
$klub = mysql_result($nekaj,$b,"ekipa");
$klub1 = mysql_result($nekaj,$b,"teamid");
$scoring = mysql_result($nekaj,$b,"average");
$no=$b+1;
if ($klub1==$trueclub AND $is_supporter>0) {$cgc='#FFCC66';} else {$cgc='white';}
echo "<tr bgcolor=\"",$cgc,"\"><td>",$no,". <a href=\"player.php?playerid=",$player,"\" class=\"greenhilite\"><b>",$ime," ",$priimek,"</b></a> (<a href=\"redirect.php?teamid=",$klub1,"\" class=\"greenhilite\">",stripslashes($klub),"</a>)</td><td align=\"right\">",number_format($scoring,1),"&nbsp;</td></tr>";
$b++;
}
echo "</table>";
if ($b > 0 AND $b < 10) {echo "<br/><i>",$langmark278,"</i>";}
}
break;

CASE '2pt':
$nekaj = mysql_query("SELECT player, two_scored/two_total AS average, players.name AS ime, surname, teams.name AS ekipa, teamid FROM totalstats, players, teams WHERE season=$default_season AND player=id AND club=teamid AND team=teamid AND club<>0 AND gametime > 40 * $omejitev AND league=$leagueid ORDER BY two_scored/two_total DESC LIMIT 50") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum==0) {echo "<br/><br/>",$langmark301;} else {
echo "<table cellspacing=\"0\" cellpadding=\"1\" width=\"100%\" border=\"0\">";
$b=0;
while ($b < $bum) {
$player = mysql_result($nekaj,$b,"player");
$ime = mysql_result($nekaj,$b,"ime");
$priimek = mysql_result($nekaj,$b,"surname");
$klub = mysql_result($nekaj,$b,"ekipa");
$klub1 = mysql_result($nekaj,$b,"teamid");
$scoring = mysql_result($nekaj,$b,"average");
$no=$b+1;
if ($klub1==$trueclub AND $is_supporter>0) {$cgc='#FFCC66';} else {$cgc='white';}
echo "<tr bgcolor=\"",$cgc,"\"><td>",$no,". <a href=\"player.php?playerid=",$player,"\" class=\"greenhilite\"><b>",$ime," ",$priimek,"</b></a> (<a href=\"redirect.php?teamid=",$klub1,"\" class=\"greenhilite\">",stripslashes($klub),"</a>)</td><td align=\"right\">",number_format(100*$scoring,1),"%&nbsp;</td></tr>";
$b++;
}
echo "</table>";
if ($b > 0 AND $b < 10) {echo "<br/><i>",$langmark279,"</i>";}
}
break;

CASE '1pt':
$nekaj = mysql_query("SELECT player, one_scored/one_total AS average, players.name AS ime, surname, teams.name AS ekipa, teamid FROM totalstats, players, teams WHERE season=$default_season AND player=id AND club=teamid AND team=teamid AND club<>0 AND gametime > 40 * $omejitev AND league=$leagueid ORDER BY one_scored/one_total DESC LIMIT 50") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum==0) {echo "<br/><br/>",$langmark301;} else {
echo "<table cellspacing=\"0\" cellpadding=\"1\" width=\"100%\" border=\"0\">";
$b=0;
while ($b < $bum) {
$player = mysql_result($nekaj,$b,"player");
$ime = mysql_result($nekaj,$b,"ime");
$priimek = mysql_result($nekaj,$b,"surname");
$klub = mysql_result($nekaj,$b,"ekipa");
$klub1 = mysql_result($nekaj,$b,"teamid");
$scoring = mysql_result($nekaj,$b,"average");
$no=$b+1;
if ($klub1==$trueclub AND $is_supporter>0) {$cgc='#FFCC66';} else {$cgc='white';}
echo "<tr bgcolor=\"",$cgc,"\"><td>",$no,". <a href=\"player.php?playerid=",$player,"\" class=\"greenhilite\"><b>",$ime," ",$priimek,"</b></a> (<a href=\"redirect.php?teamid=",$klub1,"\" class=\"greenhilite\">",stripslashes($klub),"</a>)</td><td align=\"right\">",number_format(100*$scoring,1),"%&nbsp;</td></tr>";
$b++;
}
echo "</table>";
if ($b > 0 AND $b < 10) {echo "<br/><i>",$langmark280,"</i>";}
}
break;

CASE '3pt':
$nekaj = mysql_query("SELECT player, three_scored/three_total AS average, players.name AS ime, surname, teams.name AS ekipa, teamid FROM totalstats, players, teams WHERE season=$default_season AND player=id AND club=teamid AND team=teamid AND club<>0 AND gametime > 40 * $omejitev AND three_total > $played AND league=$leagueid ORDER BY three_scored/three_total DESC LIMIT 50") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum==0) {echo "<br/><br/>",$langmark301;} else {
echo "<table cellspacing=\"0\" cellpadding=\"1\" width=\"100%\" border=\"0\">";
$b=0;
while ($b < $bum) {
$player = mysql_result($nekaj,$b,"player");
$ime = mysql_result($nekaj,$b,"ime");
$priimek = mysql_result($nekaj,$b,"surname");
$klub = mysql_result($nekaj,$b,"ekipa");
$klub1 = mysql_result($nekaj,$b,"teamid");
$scoring = mysql_result($nekaj,$b,"average");
$no=$b+1;
if ($klub1==$trueclub AND $is_supporter>0) {$cgc='#FFCC66';} else {$cgc='white';}
echo "<tr bgcolor=\"",$cgc,"\"><td>",$no,". <a href=\"player.php?playerid=",$player,"\" class=\"greenhilite\"><b>",$ime," ",$priimek,"</b></a> (<a href=\"redirect.php?teamid=",$klub1,"\" class=\"greenhilite\">",stripslashes($klub),"</a>)</td><td align=\"right\">",number_format(100*$scoring,1),"%&nbsp;</td></tr>";
$b++;
}
echo "</table>";
if ($b > 0 AND $b < 10) {echo "<br/><i>",$langmark281,"</i>";}
}
break;

CASE 'tot':
$nekaj = mysql_query("SELECT player, (off_rebounds+def_rebounds)/played AS average, players.name AS ime, surname, teams.name AS ekipa, teamid FROM totalstats, players, teams WHERE season=$default_season AND player=id AND club=teamid AND team=teamid AND club<>0 AND gametime > 40 * $omejitev AND league=$leagueid ORDER BY (off_rebounds+def_rebounds)/played DESC LIMIT 50") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum==0) {echo "<br/><br/>",$langmark301;} else {
echo "<table cellspacing=\"0\" cellpadding=\"1\" width=\"100%\" border=\"0\">";
$b=0;
while ($b < $bum) {
$player = mysql_result($nekaj,$b,"player");
$ime = mysql_result($nekaj,$b,"ime");
$priimek = mysql_result($nekaj,$b,"surname");
$klub = mysql_result($nekaj,$b,"ekipa");
$klub1 = mysql_result($nekaj,$b,"teamid");
$scoring = mysql_result($nekaj,$b,"average");
$no=$b+1;
if ($klub1==$trueclub AND $is_supporter>0) {$cgc='#FFCC66';} else {$cgc='white';}
echo "<tr bgcolor=\"",$cgc,"\"><td>",$no,". <a href=\"player.php?playerid=",$player,"\" class=\"greenhilite\"><b>",$ime," ",$priimek,"</b></a> (<a href=\"redirect.php?teamid=",$klub1,"\" class=\"greenhilite\">",stripslashes($klub),"</a>)</td><td align=\"right\">",number_format($scoring,1),"&nbsp;</td></tr>";
$b++;
}
echo "</table>";
if ($b > 0 AND $b < 10) {echo "<br/><i>",$langmark283,"</i>";}
}
break;

CASE 'off':
$nekaj = mysql_query("SELECT player, off_rebounds/played AS average, players.name AS ime, surname, teams.name AS ekipa, teamid FROM totalstats, players, teams WHERE season=$default_season AND player=id AND club=teamid AND team=teamid AND club<>0 AND gametime > 40 * $omejitev AND league=$leagueid ORDER BY off_rebounds/played DESC LIMIT 50") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum==0) {echo "<br/><br/>",$langmark301;} else {
echo "<table cellspacing=\"0\" cellpadding=\"1\" width=\"100%\" border=\"0\">";
$b=0;
while ($b < $bum) {
$player = mysql_result($nekaj,$b,"player");
$ime = mysql_result($nekaj,$b,"ime");
$priimek = mysql_result($nekaj,$b,"surname");
$klub = mysql_result($nekaj,$b,"ekipa");
$klub1 = mysql_result($nekaj,$b,"teamid");
$scoring = mysql_result($nekaj,$b,"average");
$no=$b+1;
if ($klub1==$trueclub AND $is_supporter>0) {$cgc='#FFCC66';} else {$cgc='white';}
echo "<tr bgcolor=\"",$cgc,"\"><td>",$no,". <a href=\"player.php?playerid=",$player,"\" class=\"greenhilite\"><b>",$ime," ",$priimek,"</b></a> (<a href=\"redirect.php?teamid=",$klub1,"\" class=\"greenhilite\">",stripslashes($klub),"</a>)</td><td align=\"right\">",number_format($scoring,1),"&nbsp;</td></tr>";
$b++;
}
echo "</table>";
if ($b > 0 AND $b < 10) {echo "<br/><i>",$langmark284,"</i>";}
}
break;

CASE 'def':
$nekaj = mysql_query("SELECT player, def_rebounds/played AS average, players.name AS ime, surname, teams.name AS ekipa, teamid FROM totalstats, players, teams WHERE season=$default_season AND player=id AND club=teamid AND team=teamid AND club<>0 AND gametime > 40 * $omejitev AND league=$leagueid ORDER BY def_rebounds/played DESC LIMIT 50") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum==0) {echo "<br/><br/>",$langmark301;} else {
echo "<table cellspacing=\"0\" cellpadding=\"1\" width=\"100%\" border=\"0\">";
$b=0;
while ($b < $bum) {
$player = mysql_result($nekaj,$b,"player");
$ime = mysql_result($nekaj,$b,"ime");
$priimek = mysql_result($nekaj,$b,"surname");
$klub = mysql_result($nekaj,$b,"ekipa");
$klub1 = mysql_result($nekaj,$b,"teamid");
$scoring = mysql_result($nekaj,$b,"average");
$no=$b+1;
if ($klub1==$trueclub AND $is_supporter>0) {$cgc='#FFCC66';} else {$cgc='white';}
echo "<tr bgcolor=\"",$cgc,"\"><td>",$no,". <a href=\"player.php?playerid=",$player,"\" class=\"greenhilite\"><b>",$ime," ",$priimek,"</b></a> (<a href=\"redirect.php?teamid=",$klub1,"\" class=\"greenhilite\">",stripslashes($klub),"</a>)</td><td align=\"right\">",number_format($scoring,1),"&nbsp;</td></tr>";
$b++;
}
echo "</table>";
if ($b > 0 AND $b < 10) {echo "<br/><i>",$langmark285,"</i>";}
}
break;

CASE 'bpg':
$nekaj = mysql_query("SELECT player, blocks/played AS average, players.name AS ime, surname, teams.name AS ekipa, teamid FROM totalstats, players, teams WHERE season=$default_season AND player=id AND club=teamid AND team=teamid AND club<>0 AND gametime > 40 * $omejitev AND league=$leagueid ORDER BY blocks/played DESC LIMIT 50") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum==0) {echo "<br/><br/>",$langmark301;} else {
echo "<table cellspacing=\"0\" cellpadding=\"1\" width=\"100%\" border=\"0\">";
$b=0;
while ($b < $bum) {
$player = mysql_result($nekaj,$b,"player");
$ime = mysql_result($nekaj,$b,"ime");
$priimek = mysql_result($nekaj,$b,"surname");
$klub = mysql_result($nekaj,$b,"ekipa");
$klub1 = mysql_result($nekaj,$b,"teamid");
$scoring = mysql_result($nekaj,$b,"average");
$no=$b+1;
if ($klub1==$trueclub AND $is_supporter>0) {$cgc='#FFCC66';} else {$cgc='white';}
echo "<tr bgcolor=\"",$cgc,"\"><td>",$no,". <a href=\"player.php?playerid=",$player,"\" class=\"greenhilite\"><b>",$ime," ",$priimek,"</b></a> (<a href=\"redirect.php?teamid=",$klub1,"\" class=\"greenhilite\">",stripslashes($klub),"</a>)</td><td align=\"right\">",number_format($scoring,1),"&nbsp;</td></tr>";
$b++;
}
echo "</table>";
if ($b > 0 AND $b < 10) {echo "<br/><i>",$langmark287,"</i>";}
}
break;

CASE 'apg':
$nekaj = mysql_query("SELECT player, assists/played AS average, players.name AS ime, surname, teams.name AS ekipa, teamid FROM totalstats, players, teams WHERE season=$default_season AND player=id AND club=teamid AND team=teamid AND club<>0 AND gametime > 40 * $omejitev AND league=$leagueid ORDER BY assists/played DESC LIMIT 50") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum==0) {echo "<br/><br/>",$langmark301;} else {
echo "<table cellspacing=\"0\" cellpadding=\"1\" width=\"100%\" border=\"0\">";
$b=0;
while ($b < $bum) {
$player = mysql_result($nekaj,$b,"player");
$ime = mysql_result($nekaj,$b,"ime");
$priimek = mysql_result($nekaj,$b,"surname");
$klub = mysql_result($nekaj,$b,"ekipa");
$klub1 = mysql_result($nekaj,$b,"teamid");
$scoring = mysql_result($nekaj,$b,"average");
$no=$b+1;
if ($klub1==$trueclub AND $is_supporter>0) {$cgc='#FFCC66';} else {$cgc='white';}
echo "<tr bgcolor=\"",$cgc,"\"><td>",$no,". <a href=\"player.php?playerid=",$player,"\" class=\"greenhilite\"><b>",$ime," ",$priimek,"</b></a> (<a href=\"redirect.php?teamid=",$klub1,"\" class=\"greenhilite\">",stripslashes($klub),"</a>)</td><td align=\"right\">",number_format($scoring,1),"&nbsp;</td></tr>";
$b++;
}
echo "</table>";
if ($b > 0 AND $b < 10) {echo "<br/><i>",$langmark288,"</i>";}
}
break;

CASE 'spg':
$nekaj = mysql_query("SELECT player, steals/played AS average, players.name AS ime, surname, teams.name AS ekipa, teamid FROM totalstats, players, teams WHERE season=$default_season AND player=id AND club=teamid AND team=teamid AND club<>0 AND gametime > 40 * $omejitev AND league=$leagueid ORDER BY steals/played DESC LIMIT 50") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum==0) {echo "<br/><br/>",$langmark301;} else {
echo "<table cellspacing=\"0\" cellpadding=\"1\" width=\"100%\" border=\"0\">";
$b=0;
while ($b < $bum) {
$player = mysql_result($nekaj,$b,"player");
$ime = mysql_result($nekaj,$b,"ime");
$priimek = mysql_result($nekaj,$b,"surname");
$klub = mysql_result($nekaj,$b,"ekipa");
$klub1 = mysql_result($nekaj,$b,"teamid");
$scoring = mysql_result($nekaj,$b,"average");
$no=$b+1;
if ($klub1==$trueclub AND $is_supporter>0) {$cgc='#FFCC66';} else {$cgc='white';}
echo "<tr bgcolor=\"",$cgc,"\"><td>",$no,". <a href=\"player.php?playerid=",$player,"\" class=\"greenhilite\"><b>",$ime," ",$priimek,"</b></a> (<a href=\"redirect.php?teamid=",$klub1,"\" class=\"greenhilite\">",stripslashes($klub),"</a>)</td><td align=\"right\">",number_format($scoring,1),"&nbsp;</td></tr>";
$b++;
}
echo "</table>";
if ($b > 0 AND $b < 10) {echo "<br/><i>",$langmark289,"</i>";}
}
break;

CASE 'fpg':
$nekaj = mysql_query("SELECT player, fouls/played AS average, players.name AS ime, surname, teams.name AS ekipa, teamid FROM totalstats, players, teams WHERE season=$default_season AND player=id AND club=teamid AND team=teamid AND club<>0 AND gametime > 40 * $omejitev AND league=$leagueid ORDER BY fouls/played DESC LIMIT 50") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum==0) {echo "<br/><br/>",$langmark301;} else {
echo "<table cellspacing=\"0\" cellpadding=\"1\" width=\"100%\" border=\"0\">";
$b=0;
while ($b < $bum) {
$player = mysql_result($nekaj,$b,"player");
$ime = mysql_result($nekaj,$b,"ime");
$priimek = mysql_result($nekaj,$b,"surname");
$klub = mysql_result($nekaj,$b,"ekipa");
$klub1 = mysql_result($nekaj,$b,"teamid");
$scoring = mysql_result($nekaj,$b,"average");
$no=$b+1;
if ($klub1==$trueclub AND $is_supporter>0) {$cgc='#FFCC66';} else {$cgc='white';}
echo "<tr bgcolor=\"",$cgc,"\"><td>",$no,". <a href=\"player.php?playerid=",$player,"\" class=\"greenhilite\"><b>",$ime," ",$priimek,"</b></a> (<a href=\"redirect.php?teamid=",$klub1,"\" class=\"greenhilite\">",stripslashes($klub),"</a>)</td><td align=\"right\">",number_format($scoring,1),"&nbsp;</td></tr>";
$b++;
}
echo "</table>";
if ($b > 0 AND $b < 10) {echo "<br/><i>",$langmark290,"</i>";}
}
break;

CASE 'tpg':
$nekaj = mysql_query("SELECT player, turnovers/played AS average, players.name AS ime, surname, teams.name AS ekipa, teamid FROM totalstats, players, teams WHERE season=$default_season AND player=id AND club=teamid AND team=teamid AND club<>0 AND gametime > 40 * $omejitev AND league=$leagueid ORDER BY turnovers/played DESC LIMIT 50") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum==0) {echo "<br/><br/>",$langmark301;} else {
echo "<table cellspacing=\"0\" cellpadding=\"1\" width=\"100%\" border=\"0\">";
$b=0;
while ($b < $bum) {
$player = mysql_result($nekaj,$b,"player");
$ime = mysql_result($nekaj,$b,"ime");
$priimek = mysql_result($nekaj,$b,"surname");
$klub = mysql_result($nekaj,$b,"ekipa");
$klub1 = mysql_result($nekaj,$b,"teamid");
$scoring = mysql_result($nekaj,$b,"average");
$no=$b+1;
if ($klub1==$trueclub AND $is_supporter>0) {$cgc='#FFCC66';} else {$cgc='white';}
echo "<tr bgcolor=\"",$cgc,"\"><td>",$no,". <a href=\"player.php?playerid=",$player,"\" class=\"greenhilite\"><b>",$ime," ",$priimek,"</b></a> (<a href=\"redirect.php?teamid=",$klub1,"\" class=\"greenhilite\">",stripslashes($klub),"</a>)</td><td align=\"right\">",number_format($scoring,1),"&nbsp;</td></tr>";
$b++;
}
echo "</table>";
if ($b > 0 AND $b < 10) {echo "<br/><i>",$langmark291,"</i>";}
}
break;

CASE 'rat':
$nekaj = mysql_query("SELECT player, (scoring - two_total + two_scored - one_total + one_scored - three_total + three_scored + def_rebounds + off_rebounds + blocks + assists + steals - turnovers)/played AS average, players.name AS ime, surname, teams.name AS ekipa, teamid FROM totalstats, players, teams WHERE (scoring - two_total + two_scored - one_total + one_scored - three_total + three_scored + def_rebounds + off_rebounds + blocks + assists + steals - turnovers) < 150000 AND season=$default_season AND player=id AND club=teamid AND team = teamid AND club<>0 AND gametime > 40 * $omejitev AND league=$leagueid ORDER BY (scoring - two_total + two_scored - one_total + one_scored - three_total + three_scored + def_rebounds + off_rebounds + blocks + assists + steals - turnovers)/played DESC LIMIT 50") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum==0) {echo "<br/><br/>",$langmark301;} else {
echo "<table cellspacing=\"0\" cellpadding=\"1\" width=\"100%\" border=\"0\">";
$b=0;
while ($b < $bum) {
$player = mysql_result($nekaj,$b,"player");
$ime = mysql_result($nekaj,$b,"ime");
$priimek = mysql_result($nekaj,$b,"surname");
$klub = mysql_result($nekaj,$b,"ekipa");
$klub1 = mysql_result($nekaj,$b,"teamid");
$scoring = mysql_result($nekaj,$b,"average");
$no=$b+1;
if ($klub1==$trueclub AND $is_supporter>0) {$cgc='#FFCC66';} else {$cgc='white';}
echo "<tr bgcolor=\"",$cgc,"\"><td>",$no,". <a href=\"player.php?playerid=",$player,"\" class=\"greenhilite\"><b>",$ime," ",$priimek,"</b></a> (<a href=\"redirect.php?teamid=",$klub1,"\" class=\"greenhilite\">",stripslashes($klub),"</a>)</td><td align=\"right\">",number_format($scoring,1),"&nbsp;</td></tr>";
$b++;
}
echo "</table>";
if ($b > 0 AND $b < 10) {echo "<br/><i>",$langmark291,"</i>";}
}
break;

CASE 'mvp':
$nekaj = mysql_query("SELECT player, (scoring - two_total + two_scored - one_total + one_scored - three_total + three_scored + def_rebounds + off_rebounds + blocks + assists + steals - turnovers)/gametime AS average, players.name AS ime, surname, teams.name AS ekipa, teamid FROM totalstats, players, teams WHERE (scoring - two_total + two_scored - one_total + one_scored - three_total + three_scored + def_rebounds + off_rebounds + blocks + assists + steals - turnovers) < 150000 AND season=$default_season AND player=id AND club=teamid AND team = teamid AND club<>0 AND gametime > 19.2 * $played AND league=$leagueid ORDER BY (scoring - two_total + two_scored - one_total + one_scored - three_total + three_scored + def_rebounds + off_rebounds + blocks + assists + steals - turnovers)/gametime DESC LIMIT 50") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum==0) {echo "<br/><br/>",$langmark301;} else {
echo "<table cellspacing=\"0\" cellpadding=\"1\" width=\"100%\" border=\"0\">";
$b=0;
while ($b < $bum) {
$player = mysql_result($nekaj,$b,"player");
$ime = mysql_result($nekaj,$b,"ime");
$priimek = mysql_result($nekaj,$b,"surname");
$klub = mysql_result($nekaj,$b,"ekipa");
$klub1 = mysql_result($nekaj,$b,"teamid");
$scoring = mysql_result($nekaj,$b,"average");
$no=$b+1;
if ($klub1==$trueclub AND $is_supporter>0) {$cgc='#FFCC66';} else {$cgc='white';}
echo "<tr bgcolor=\"",$cgc,"\"><td>",$no,". <a href=\"player.php?playerid=",$player,"\" class=\"greenhilite\"><b>",$ime," ",$priimek,"</b></a> (<a href=\"redirect.php?teamid=",$klub1,"\" class=\"greenhilite\">",stripslashes($klub),"</a>)</td><td align=\"right\">",number_format(40*$scoring,1),"&nbsp;</td></tr>";
$b++;
}
echo "</table>";
if ($b > 0 AND $b < 10) {echo "<br/><i>",$langmark291,"</i>";}
}
break;
}
?>
</td>
<td class="border" width="33%">
<table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td>[<a href="leaguestats.php?leagueid=<?=$leagueid?>"><?=$langmark232?></a>] [<a href="leagues.php?leagueid=<?=$leagueid?>"><?=$langmark175?></a>]</td></tr></table><br/>
<h2><?=$langmark303?></h2><br/>
<?php if($stat=='pts'){?><b><?=$langmark304?></b><?php }else{?><a href="leaguestats.php?leagueid=<?=$leagueid?>&stat=pts"><?=$langmark304?></a><?php }?><br/>
<?php if($stat=='2pt'){?><b><?=$langmark305?></b><?php }else{?><a href="leaguestats.php?leagueid=<?=$leagueid?>&stat=2pt"><?=$langmark305?></a><?php }?><br/>
<?php if($stat=='1pt'){?><b><?=$langmark306?></b><?php }else{?><a href="leaguestats.php?leagueid=<?=$leagueid?>&stat=1pt"><?=$langmark306?></a><?php }?><br/>
<?php if($stat=='3pt'){?><b><?=$langmark307?></b><?php }else{?><a href="leaguestats.php?leagueid=<?=$leagueid?>&stat=3pt"><?=$langmark307?></a><?php }?><br/>
<?php if($stat=='tot'){?><b><?=$langmark308?></b><?php }else{?><a href="leaguestats.php?leagueid=<?=$leagueid?>&stat=tot"><?=$langmark308?></a><?php }?><br/>
<?php if($stat=='off'){?><b><?=$langmark309?></b><?php }else{?><a href="leaguestats.php?leagueid=<?=$leagueid?>&stat=off"><?=$langmark309?></a><?php }?><br/>
<?php if($stat=='def'){?><b><?=$langmark310?></b><?php }else{?><a href="leaguestats.php?leagueid=<?=$leagueid?>&stat=def"><?=$langmark310?></a><?php }?><br/>
<?php if($stat=='bpg'){?><b><?=$langmark311?></b><?php }else{?><a href="leaguestats.php?leagueid=<?=$leagueid?>&stat=bpg"><?=$langmark311?></a><?php }?><br/>
<?php if($stat=='apg'){?><b><?=$langmark312?></b><?php }else{?><a href="leaguestats.php?leagueid=<?=$leagueid?>&stat=apg"><?=$langmark312?></a><?php }?><br/>
<?php if($stat=='spg'){?><b><?=$langmark313?></b><?php }else{?><a href="leaguestats.php?leagueid=<?=$leagueid?>&stat=spg"><?=$langmark313?></a><?php }?><br/>
<?php if($stat=='fpg'){?><b><?=$langmark314?></b><?php }else{?><a href="leaguestats.php?leagueid=<?=$leagueid?>&stat=fpg"><?=$langmark314?></a><?php }?><br/>
<?php if($stat=='tpg'){?><b><?=$langmark315?></b><?php }else{?><a href="leaguestats.php?leagueid=<?=$leagueid?>&stat=tpg"><?=$langmark315?></a><?php }?><br/>
<?php if($stat=='rat'){?><b><?=$langmark1371?></b><?php }else{?><a href="leaguestats.php?leagueid=<?=$leagueid?>&stat=rat"><?=$langmark1371?></a><?php }?>
<?php if($stat=='mvp'){?><br/><b>MVP Race</b><?php } elseif ($is_supporter>0 OR $lewel>1) {?><br/><a href="leaguestats.php?leagueid=<?=$leagueid?>&stat=mvp">MVP Race</a><?php }?>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>