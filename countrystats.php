<?php
/*
add country mvp race and automate it?
*/

$country44 = $_POST["country"];
if (!$country44){$country44 = $_GET["country"];}
$country44=stripslashes($country44);
$stat=$_GET['stat'];
if (!$stat) {$stat='rat';}

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT club, supporter, lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)) {
$trueclub = mysql_result ($compare,0,"club");
$is_supporter = mysql_result ($compare,0,"supporter");
$lang = mysql_result ($compare,0,"lang");
}
else {die(include 'basketsim.php');}

if (!$country44) {$nadomest = mysql_query("SELECT country FROM teams WHERE teamid='$trueclub' LIMIT 1"); $country44=mysql_result($nadomest,0);}
$pl = mysql_query("SELECT competition.played AS played FROM competition, leagues WHERE competition.leagueid = leagues.leagueid AND competition.season ='$default_season' AND leagues.country ='$country44'");
$played = mysql_result($pl,0);
$omejitev = $played * 0.33;

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2><?=$langmark1519?></h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="67%">

<?php
echo "<h3>",$langmark1520," ",$country44,"</h3><hr/>";
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
echo "<br/>";

SWITCH ($stat) {
CASE 'pts':
$nekaj = mysql_query("SELECT player, scoring/played AS average, teams.name AS ekipa, players.name AS ime, surname, teamid FROM totalstats, players, teams WHERE season=$default_season AND team = teams.teamid AND id=player AND players.club !=0 AND gametime > 40 * $omejitev AND totalstats.country='$country44' ORDER BY scoring/played DESC LIMIT 50") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum == 0) {echo $langmark301;} else {
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
$nekaj = mysql_query("SELECT player, two_scored/two_total AS average, teams.name AS ekipa, players.name AS ime, surname, teamid FROM totalstats, players, teams WHERE season=$default_season AND team = teams.teamid AND id=player AND club<>0 AND gametime > 40 * $omejitev AND totalstats.country='$country44' ORDER BY two_scored/two_total DESC LIMIT 50") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum == 0) {echo $langmark301;} else {
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
$nekaj = mysql_query("SELECT player, one_scored/one_total AS average, teams.name AS ekipa, players.name AS ime, surname, teamid FROM totalstats, players, teams WHERE season=$default_season AND team = teams.teamid AND id=player AND club<>0 AND gametime > 40 * $omejitev AND totalstats.country='$country44' ORDER BY one_scored/one_total DESC LIMIT 50") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum == 0) {echo $langmark301;} else {
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
$nekaj = mysql_query("SELECT player, three_scored/three_total AS average, teams.name AS ekipa, players.name AS ime, surname, teamid FROM totalstats, players, teams WHERE season=$default_season AND team = teams.teamid AND id=player AND club<>0 AND gametime > 40 * $omejitev AND three_total > $played AND totalstats.country='$country44' ORDER BY three_scored/three_total DESC LIMIT 50") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum == 0) {echo $langmark301;} else {
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
$nekaj = mysql_query("SELECT player, (off_rebounds+def_rebounds)/played AS average, teams.name AS ekipa, players.name AS ime, surname, teamid FROM totalstats, players, teams WHERE season=$default_season AND team = teams.teamid AND id=player AND club<>0 AND gametime > 40 * $omejitev AND totalstats.country='$country44' ORDER BY (off_rebounds+def_rebounds)/played DESC LIMIT 50") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum == 0) {echo $langmark301;} else {
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
$nekaj = mysql_query("SELECT player, off_rebounds/played AS average, teams.name AS ekipa, players.name AS ime, surname, teamid FROM totalstats, players, teams WHERE season=$default_season AND team = teams.teamid AND id=player AND club<>0 AND gametime > 40 * $omejitev AND totalstats.country='$country44' ORDER BY off_rebounds/played DESC LIMIT 50") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum == 0) {echo $langmark301;} else {
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
$nekaj = mysql_query("SELECT player, def_rebounds/played AS average, teams.name AS ekipa, players.name AS ime, surname, teamid FROM totalstats, players, teams WHERE season=$default_season AND team = teams.teamid AND id=player AND club<>0 AND gametime > 40 * $omejitev AND totalstats.country='$country44' ORDER BY def_rebounds/played DESC LIMIT 50") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum == 0) {echo $langmark301;} else {
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
$nekaj = mysql_query("SELECT player, blocks/played AS average, teams.name AS ekipa, players.name AS ime, surname, teamid FROM totalstats, players, teams WHERE season=$default_season AND team = teams.teamid AND id=player AND club<>0 AND gametime > 40 * $omejitev AND totalstats.country='$country44' ORDER BY blocks/played DESC LIMIT 50") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum == 0) {echo $langmark301;} else {
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
$nekaj = mysql_query("SELECT player, assists/played AS average, teams.name AS ekipa, players.name AS ime, surname, teamid FROM totalstats, players, teams WHERE season=$default_season AND team = teams.teamid AND id=player AND club<>0 AND gametime > 40 * $omejitev AND totalstats.country='$country44' ORDER BY assists/played DESC LIMIT 50") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum == 0) {echo $langmark301;} else {
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
$nekaj = mysql_query("SELECT player, steals/played AS average, teams.name AS ekipa, players.name AS ime, surname, teamid FROM totalstats, players, teams WHERE season=$default_season AND team = teams.teamid AND id=player AND club<>0 AND gametime > 40 * $omejitev AND totalstats.country='$country44' ORDER BY steals/played DESC LIMIT 50") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum == 0) {echo $langmark301;} else {
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
$nekaj = mysql_query("SELECT player, fouls/played AS average, teams.name AS ekipa, players.name AS ime, surname, teamid FROM totalstats, players, teams WHERE season=$default_season AND team = teams.teamid AND id=player AND club<>0 AND gametime > 40 * $omejitev AND totalstats.country='$country44' ORDER BY fouls/played DESC LIMIT 50") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum == 0) {echo $langmark301;} else {
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
$nekaj = mysql_query("SELECT player, turnovers/played AS average, teams.name AS ekipa, players.name AS ime, surname, teamid FROM totalstats, players, teams WHERE season=$default_season AND team = teams.teamid AND id=player AND club<>0 AND gametime > 40 * $omejitev AND totalstats.country='$country44' ORDER BY turnovers/played DESC LIMIT 50") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum == 0) {echo $langmark301;} else {
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
$nekaj = mysql_query("SELECT player, (scoring - two_total + two_scored - one_total + one_scored - three_total + three_scored + def_rebounds + off_rebounds + blocks + assists + steals - turnovers)/played AS average, teams.name AS ekipa, players.name AS ime, surname, teamid FROM totalstats, players, teams WHERE (scoring - two_total + two_scored - one_total + one_scored - three_total + three_scored + def_rebounds + off_rebounds + blocks + assists + steals - turnovers) < 150000 AND season=$default_season AND team = teams.teamid AND id=player AND players.club<>0 AND played >$omejitev AND totalstats.country ='$country44' ORDER BY (scoring - two_total + two_scored - one_total + one_scored - three_total + three_scored + def_rebounds + off_rebounds + blocks + assists + steals - turnovers)/played DESC LIMIT 50") or die(mysql_error());
$bum = mysql_num_rows($nekaj);
if ($bum == 0) {echo $langmark301;} else {
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
}
?>
</td>
<td class="border" width="33%">
<h2><?=$langmark596?></h2><br/>
<form method="post" action="<?=$PHP_SELF?>" style="margin: 0" name="tijuk">
<select name="country"  OnChange="location.href='countrystats.php?country='+tijuk.country.options[selectedIndex].value" class="inputreg">
<option name="Albania" value="Albania" <?php if ($country44=='Albania'){echo "selected";}?>>Albania</option>
<option name="Argentina" value="Argentina" <?php if ($country44=='Argentina'){echo "selected";}?>>Argentina</option>
<option name="Australia" value="Australia" <?php if ($country44=='Australia'){echo "selected";}?>>Australia</option>
<option name="Austria" value="Austria" <?php if ($country44=='Austria'){echo "selected";}?>>Austria</option>
<option name="Belarus" value="Belarus" <?php if ($country44=='Belarus'){echo "selected";}?>>Belarus</option>
<option name="Belgium" value="Belgium" <?php if ($country44=='Belgium'){echo "selected";}?>>Belgium</option>
<option name="Bosnia" value="Bosnia" <?php if ($country44=='Bosnia'){echo "selected";}?>>Bosna and Herzegovina</option>
<option name="Brazil" value="Brazil" <?php if ($country44=='Brazil'){echo "selected";}?>>Brazil</option>
<option name="Bulgaria" value="Bulgaria" <?php if ($country44=='Bulgaria'){echo "selected";}?>>Bulgaria</option>
<option name="Canada" value="Canada" <?php if ($country44=='Canada'){echo "selected";}?>>Canada</option>
<option name="Chile" value="Chile" <?php if ($country44=='Chile'){echo "selected";}?>>Chile</option>
<option name="China" value="China" <?php if ($country44=='China'){echo "selected";}?>>China</option>
<option name="Colombia" value="Colombia" <?php if ($country44=='Colombia'){echo "selected";}?>>Colombia</option>
<option name="Croatia" value="Croatia" <?php if ($country44=='Croatia'){echo "selected";}?>>Croatia</option>
<option name="Cyprus" value="Cyprus" <?php if ($country44=='Cyprus'){echo "selected";}?>>Cyprus</option>
<option name="Czech Republic" value="Czech Republic" <?php if ($country44=='Czech Republic'){echo "selected";}?>>Czech Republic</option>
<option name="Denmark" value="Denmark" <?php if ($country44=='Denmark'){echo "selected";}?>>Danmark</option>
<option name="Egypt" value="Egypt" <?php if ($country44=='Egypt'){echo "selected";}?>>Egypt</option>
<option name="Estonia" value="Estonia" <?php if ($country44=='Estonia'){echo "selected";}?>>Estonia</option>
<option name="Finland" value="Finland" <?php if ($country44=='Finland'){echo "selected";}?>>Finland</option>
<option name="France" value="France" <?php if ($country44=='France'){echo "selected";}?>>France</option>
<option name="FYR Macedonia" value="FYR Macedonia" <?php if ($country44=='FYR Macedonia'){echo "selected";}?>>FYR Macedonia</option>
<option name="Georgia" value="Georgia" <?php if ($country44=='Georgia'){echo "selected";}?>>Georgia</option>
<option name="Germany" value="Germany" <?php if ($country44=='Germany'){echo "selected";}?>>Germany</option>
<option name="Greece" value="Greece" <?php if ($country44=='Greece'){echo "selected";}?>>Greece</option>
<option name="Hong Kong" value="Hong Kong" <?php if ($country44=='Hong Kong'){echo "selected";}?>>Hong Kong</option>
<option name="Hungary" value="Hungary" <?php if ($country44=='Hungary'){echo "selected";}?>>Hungary</option>
<option name="India" value="India" <?php if ($country44=='India'){echo "selected";}?>>India</option>
<option name="Indonesia" value="Indonesia" <?php if ($country44=='Indonesia'){echo "selected";}?>>Indonesia</option>
<option name="Ireland" value="Ireland" <?php if ($country44=='Ireland'){echo "selected";}?>>Ireland</option>
<option name="Israel" value="Israel" <?php if ($country44=='Israel'){echo "selected";}?>>Israel</option>
<option name="Italy" value="Italy" <?php if ($country44=='Italy'){echo "selected";}?>>Italia</option>
<option name="Japan" value="Japan" <?php if ($country44=='Japan'){echo "selected";}?>>Japan</option>
<option name="Latvia" value="Latvia" <?php if ($country44=='Latvia'){echo "selected";}?>>Latvija</option>
<option name="Lithuania" value="Lithuania" <?php if ($country44=='Lithuania'){echo "selected";}?>>Lithuania</option>
<option name="Malaysia" value="Malaysia" <?php if ($country44=='Malaysia'){echo "selected";}?>>Malaysia</option>
<option name="Malta" value="Malta" <?php if ($country44=='Malta'){echo "selected";}?>>Malta</option>
<option name="Mexico" value="Mexico" <?php if ($country44=='Mexico'){echo "selected";}?>>Mexico</option>
<option name="Montenegro" value="Montenegro" <?php if ($country44=='Montenegro'){echo "selected";}?>>Montenegro</option>
<option name="Netherlands" value="Netherlands" <?php if ($country44=='Netherlands'){echo "selected";}?>>Netherlands</option>
<option name="New Zealand" value="New Zealand" <?php if ($country44=='New Zealand'){echo "selected";}?>>New Zealand</option>
<option name="Norway" value="Norway" <?php if ($country44=='Norway'){echo "selected";}?>>Norway</option>
<option name="Peru" value="Peru" <?php if ($country44=='Peru'){echo "selected";}?>>Peru</option>
<option name="Philippines" value="Philippines" <?php if ($country44=='Philippines'){echo "selected";}?>>Philippines</option>
<option name="Poland" value="Poland" <?php if ($country44=='Poland'){echo "selected";}?>>Poland</option>
<option name="Portugal" value="Portugal" <?php if ($country44=='Portugal'){echo "selected";}?>>Portugal</option>
<option name="Puerto Rico" value="Puerto Rico" <?php if ($country44=='Puerto Rico'){echo "selected";}?>>Puerto Rico</option>
<option name="Romania" value="Romania" <?php if ($country44=='Romania'){echo "selected";}?>>Romania</option>
<option name="Russia" value="Russia" <?php if ($country44=='Russia'){echo "selected";}?>>Russia</option>
<option name="Serbia" value="Serbia" <?php if ($country44=='Serbia'){echo "selected";}?>>Serbia</option>
<option name="Slovakia" value="Slovakia" <?php if ($country44=='Slovakia'){echo "selected";}?>>Slovakia</option>
<option name="Slovenia" value="Slovenia" <?php if ($country44=='Slovenia'){echo "selected";}?>>Slovenia</option>
<option name="South Korea" value="South Korea" <?php if ($country44=='South Korea'){echo "selected";}?>>South Korea</option>
<option name="Spain" value="Spain" <?php if ($country44=='Spain'){echo "selected";}?>>Spain</option>
<option name="Sweden" value="Sweden" <?php if ($country44=='Sweden'){echo "selected";}?>>Sweden</option>
<option name="Switzerland" value="Switzerland" <?php if ($country44=='Switzerland'){echo "selected";}?>>Switzerland</option>
<option name="Thailand" value="Thailand" <?php if ($country44=='Thailand'){echo "selected";}?>>Thailand</option>
<option name="Tunisia" value="Tunisia" <?php if ($country44=='Tunisia'){echo "selected";}?>>Tunisia</option>
<option name="Turkey" value="Turkey" <?php if ($country44=='Turkey'){echo "selected";}?>>Turkey</option>
<option name="Ukraine" value="Ukraine" <?php if ($country44=='Ukraine'){echo "selected";}?>>Ukraine</option>
<option name="United Kingdom" value="United Kingdom" <?php if ($country44=='United Kingdom'){echo "selected";}?>>United Kingdom</option>
<option name="Uruguay" value="Uruguay" <?php if ($country44=='Uruguay'){echo "selected";}?>>Uruguay</option>
<option name="USA" value="USA" <?php if ($country44=='USA'){echo "selected";}?>>USA</option>
<option name="Venezuela" value="Venezuela" <?php if ($country44=='Venezuela'){echo "selected";}?>>Venezuela</option>
</select>
<input type="submit" value="&nbsp;&raquo;" name="submit" class="buttonreg">
</form>

<br/><h2><?=$langmark303?></h2><br/>
<?php if($stat=='pts'){?><b><?=$langmark304?></b><?php }else{?><a href="countrystats.php?country=<?=$country44?>&stat=pts"><?=$langmark304?></a><?php }?><br/>
<?php if($stat=='2pt'){?><b><?=$langmark305?></b><?php }else{?><a href="countrystats.php?country=<?=$country44?>&stat=2pt"><?=$langmark305?></a><?php }?><br/>
<?php if($stat=='1pt'){?><b><?=$langmark306?></b><?php }else{?><a href="countrystats.php?country=<?=$country44?>&stat=1pt"><?=$langmark306?></a><?php }?><br/>
<?php if($stat=='3pt'){?><b><?=$langmark307?></b><?php }else{?><a href="countrystats.php?country=<?=$country44?>&stat=3pt"><?=$langmark307?></a><?php }?><br/>
<?php if($stat=='tot'){?><b><?=$langmark308?></b><?php }else{?><a href="countrystats.php?country=<?=$country44?>&stat=tot"><?=$langmark308?></a><?php }?><br/>
<?php if($stat=='off'){?><b><?=$langmark309?></b><?php }else{?><a href="countrystats.php?country=<?=$country44?>&stat=off"><?=$langmark309?></a><?php }?><br/>
<?php if($stat=='def'){?><b><?=$langmark310?></b><?php }else{?><a href="countrystats.php?country=<?=$country44?>&stat=def"><?=$langmark310?></a><?php }?><br/>
<?php if($stat=='bpg'){?><b><?=$langmark311?></b><?php }else{?><a href="countrystats.php?country=<?=$country44?>&stat=bpg"><?=$langmark311?></a><?php }?><br/>
<?php if($stat=='apg'){?><b><?=$langmark312?></b><?php }else{?><a href="countrystats.php?country=<?=$country44?>&stat=apg"><?=$langmark312?></a><?php }?><br/>
<?php if($stat=='spg'){?><b><?=$langmark313?></b><?php }else{?><a href="countrystats.php?country=<?=$country44?>&stat=spg"><?=$langmark313?></a><?php }?><br/>
<?php if($stat=='fpg'){?><b><?=$langmark314?></b><?php }else{?><a href="countrystats.php?country=<?=$country44?>&stat=fpg"><?=$langmark314?></a><?php }?><br/>
<?php if($stat=='tpg'){?><b><?=$langmark315?></b><?php }else{?><a href="countrystats.php?country=<?=$country44?>&stat=tpg"><?=$langmark315?></a><?php }?><br/>
<?php if($stat=='rat'){?><b><?=$langmark1371?></b><?php }else{?><a href="countrystats.php?country=<?=$country44?>&stat=rat"><?=$langmark1371?></a><?php }?>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>