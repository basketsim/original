<?php
$zacetek = '2014-08-25 20:00:00'; //starting date of current season

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}
$country44 = $_POST["country"];
if (!$country44) {$country44 = $_GET["country"];}
$agea = $_POST["agea"];
if (!$agea) {$agea = $_GET["agea"];}
if (strlen($agea)>1 AND !is_numeric($agea)) {$agea=NULL;}

$compare = mysql_query("SELECT club, supporter, signed, lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)==1) {
$trueclub = mysql_result ($compare,0,"club");
$is_supporter = mysql_result ($compare,0,"supporter");
$signed = mysql_result ($compare,0,"signed");
$lang = mysql_result ($compare,0,"lang");
}
else {die(include 'basketsim.php');}
if ($is_supporter <>1) {die(include 'supporter.php');}

require("inc/lang/".$lang.".php");
include('inc/header.php');
include('inc/osnova.php');
?>

<div id="main">
<h2><?=$langmark774?></h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="64%">

<?php
$stat = $_GET['stat'];
if (($stat=='players' || $stat=='cstar' || $stat=='matches' || $stat=='tcrowd') && $country<>'') {$stat='teams';}
if ($stat=='players' OR $stat=='matches' OR $stat=='cstar' OR $stat=='most' OR $stat=='tcrowd' OR $stat=='ev' OR $stat=='bpi' OR $stat=='scout') {$country=NULL; $country44=NULL; $defpick=44;}

SWITCH ($stat) {
CASE 'teams':
if (!$country) {$ligasi = mysql_query("SELECT curname, win, lose, country, userid FROM competition, teams, users WHERE competition.teamid=teams.teamid AND teams.teamid=club AND season='$default_season' ORDER BY win DESC, played ASC, difference DESC, for_ DESC LIMIT 100") or die(mysql_error());} else {$ligasi = mysql_query("SELECT curname, win, lose, country, userid FROM competition, teams, users WHERE competition.teamid=teams.teamid AND teams.teamid=club AND season='$default_season' AND country = '$country' ORDER BY win DESC, difference DESC, for_ DESC LIMIT 30") or die(mysql_error());}
echo "<h2>",$langmark1521,"</h2><br/><table width=\"100%\" cellspacing=\"0\" cellpadding=\"1\">";
while($i=mysql_fetch_array($ligasi)) {
$curname=$i[curname];
$wins=$i[win];
$lost=$i[lose];
$country=$i[country];
$clink=$i[userid];
$no=$no+1;
if ($clink==$userid) {$barv='#FFCC66';} else {$barv='white';}
echo  "<tr bgcolor=\"",$barv,"\"><td align=\"left\" bgcolor=\"",$barv,"\"><img src=\"img/Flags/",$country,".png\" border=\"0\" alt=\"",$country,"\" title=\"",$country,"\"> ",$no,". <a href=\"club.php?clubid=",$clink,"\">",stripslashes($curname),"</a></td> <td align=\"right\" bgcolor=\"",$barv,"\">",$wins,"-",$lost,"</td></tr>";
}
echo "</table>";
break;

CASE 'oldest':
if (!$country) {$query = mysql_query("SELECT userid, name, country, signed FROM users, teams WHERE teamid = club ORDER BY userid ASC LIMIT 100") or die(mysql_error());}else {$query = mysql_query("SELECT userid, name, country, signed FROM users, teams WHERE teamid = club AND country = '$country' ORDER BY userid ASC LIMIT 30") or die(mysql_error());}
echo "<h2>Clubs with longest existance</h2><br/><table width=\"100%\" cellspacing=\"0\" cellpadding=\"1\">";
while($i=mysql_fetch_array($query)) {
$arenaid = $i[userid];
$arenaname = $i[name];
$country = $i[country];
$capacity = $i[signed];
$splitdatetime = explode(" ", $capacity); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$days = (int)((mktime (0,0,0,$dbmonth,$dbday,$dbyear) - time(void))/86400);
$capacity = abs($days+1);
$no=$no+1;
if ($arenaid==$userid) {$barv='#FFCC66';} else {$barv='white';}
echo "<tr bgcolor=\"",$barv,"\"><td align=\"left\" bgcolor=\"",$barv,"\"><img src=\"img/Flags/",$country,".png\" border=\"0\" alt=\"",$country,"\" title=\"",$country,"\"> ",$no,". <a href=\"club.php?clubid=",$arenaid,"\">",stripslashes($arenaname),"</a></td><td align=\"right\" bgcolor=\"",$barv,"\">",$capacity," days</td></tr>";
}
echo "</table>";
break;

CASE 'cwins':
if (!$country) {$query = mysql_query("SELECT name, country, conwins, userid FROM teams, users WHERE teamid=club ORDER BY conwins DESC, cupstatus DESC LIMIT 100") or die(mysql_error());} else {$query = mysql_query("SELECT name, country, conwins, userid FROM users, teams WHERE users.club=teams.teamid AND conwins >0 AND country = '$country' ORDER BY conwins DESC, cupstatus DESC LIMIT 30") or die(mysql_error());}
echo "<h2>Clubs with most consecutive wins</h2><br/><table width=\"100%\" cellspacing=\"0\" cellpadding=\"1\">";
while($i=mysql_fetch_array($query)) {
$arenaname = $i[name];
$country = $i[country];
$capacity = $i[conwins];
$arenaid = $i[userid];
$no=$no+1;
if ($arenaid==$userid) {$barv='#FFCC66';} else {$barv='white';}
echo "<tr bgcolor=\"",$barv,"\"><td align=\"left\" bgcolor=\"",$barv,"\"><img src=\"img/Flags/",$country,".png\" border=\"0\" alt=\"",$country,"\" title=\"",$country,"\"> ",$no,". <a href=\"club.php?clubid=",$arenaid,"\">",stripslashes($arenaname),"</a></td><td align=\"right\" bgcolor=\"",$barv,"\">",number_format($capacity),"</td></tr>";
}
echo "</table>";
break;

CASE 'money':
if (!$country) {$query = mysql_query("SELECT userid, name, country, curmoney FROM users, teams WHERE teamid=club ORDER BY curmoney DESC LIMIT 100") or die(mysql_error());}else {$query = mysql_query("SELECT userid, name, country, curmoney FROM users, teams WHERE teamid=club AND country = '$country' ORDER BY teams.curmoney DESC LIMIT 30") or die(mysql_error());}
echo "<h2>",$langmark786,"</h2><br/><table width=\"100%\" cellspacing=\"0\" cellpadding=\"1\">";
while($i=mysql_fetch_array($query)) {
$arenaid = $i[userid];
$arenaname = $i[name];
$country = $i[country];
$capacity = $i[curmoney];
$no=$no+1;
if ($arenaid==$userid) {$barv='#FFCC66';} else {$barv='white';}
echo "<tr bgcolor=\"",$barv,"\"><td align=\"left\" bgcolor=\"",$barv,"\"><img src=\"img/Flags/",$country,".png\" border=\"0\" alt=\"",$country,"\" title=\"",$country,"\"> ",$no,". <a href=\"club.php?clubid=",$arenaid,"\">",stripslashes($arenaname),"</a></td><td align=\"right\" bgcolor=\"",$barv,"\">",number_format($capacity)," &euro;</td></tr>";
}
echo "</table>";
break;

CASE 'bti':
if (!$country) {$query = mysql_query("SELECT b_link, name, country, count(bookmarkid) AS rder FROM bookmarks, users, teams WHERE b_link=userid AND club=teamid AND b_type=2 GROUP BY b_link ORDER BY rder DESC LIMIT 100") or die(mysql_error());}else {$query = mysql_query("SELECT b_link, name, country, count(bookmarkid) AS rder FROM bookmarks, users, teams WHERE b_link=userid AND club=teamid AND country='$country' AND b_type=2 GROUP BY b_link ORDER BY rder DESC LIMIT 30") or die(mysql_error());}
echo "<h2>Most bookmarked teams</h2><br/><table width=\"100%\" cellspacing=\"0\" cellpadding=\"1\">";
while($i=mysql_fetch_array($query)) {
$arenaid = $i[b_link];
$arenaname = $i[name];
$country = $i[country];
$capacity = $i[rder];
$no=$no+1;
if ($arenaid==$userid) {$barv='#FFCC66';} else {$barv='white';}
echo "<tr bgcolor=\"",$barv,"\"><td align=\"left\" bgcolor=\"",$barv,"\"><img src=\"img/Flags/",$country,".png\" border=\"0\" alt=\"",$country,"\" title=\"",$country,"\"> ",$no,". <a href=\"club.php?clubid=",$arenaid,"\">",stripslashes($arenaname),"</a></td><td align=\"right\" bgcolor=\"",$barv,"\">",$capacity,"</td></tr>";
}
echo "</table>";
break;

CASE 'arena':
if (!$country) {$query = mysql_query("SELECT arenaname, arena.teamid AS teamid, seats1+seats2+seats3+seats4 AS capacity, country FROM arena, teams WHERE arena.teamid=teams.teamid AND in_use=100 AND status=1 ORDER BY capacity DESC LIMIT 100") or die(mysql_error());} else {$query = mysql_query("SELECT arenaname, arena.teamid AS teamid, seats1+seats2+seats3+seats4 AS capacity, country FROM arena, teams WHERE arena.teamid=teams.teamid AND in_use=100 AND status=1 AND country = '$country' ORDER BY capacity DESC LIMIT 30") or die(mysql_error());}
echo "<h2>",$langmark775,"</h2><br/><table width=\"100%\" cellspacing=\"0\" cellpadding=\"1\">";
while($i=mysql_fetch_array($query)) {
$arenaname = $i[arenaname];
$arenaid = $i[teamid];
$capacity = $i[capacity];
$country = $i[country];
$no=$no+1;
if ($arenaid==$trueclub) {$barv='#FFCC66';} else {$barv='white';}
echo "<tr bgcolor=\"",$barv,"\"><td align=\"left\" bgcolor=\"",$barv,"\"><img src=\"img/Flags/",$country,".png\" border=\"0\" alt=\"",$country,"\" title=\"",$country,"\"> ",$no,". <a href=\"cheerleaders.php?squad=",$arenaid,"\">",stripslashes($arenaname),"</a></td><td align=\"right\" bgcolor=\"",$barv,"\">",$capacity,"</td></tr>";
}
echo "</table>";
break;

CASE 'fans':
if (!$country) {$query = mysql_query("SELECT fans, name, country, userid FROM arena, teams, users WHERE arena.teamid=teams.teamid AND teams.teamid=club ORDER BY fans DESC LIMIT 100") or die(mysql_error());} else {$query = mysql_query("SELECT fans, name, country, userid FROM arena, teams, users WHERE arena.teamid=teams.teamid AND teams.teamid=club AND country ='$country' ORDER BY fans DESC LIMIT 30") or die(mysql_error());}
echo "<h2>",$langmark776,"</h2><br/><table width=\"100%\" cellspacing=\"0\" cellpadding=\"1\">";
while($i=mysql_fetch_array($query)) {
$capacity = $i[fans];
$arenaname = $i[name];
$country = $i[country];
$arenaid = $i[userid];
$no=$no+1;
if ($arenaid==$userid) {$barv='#FFCC66';} else {$barv='white';}
echo "<tr bgcolor=\"",$barv,"\"><td align=\"left\" bgcolor=\"",$barv,"\"><img src=\"img/Flags/",$country,".png\" border=\"0\" alt=\"",$country,"\" title=\"",$country,"\"> ",$no,". <a href=\"club.php?clubid=",$arenaid,"\">",stripslashes($arenaname),"</a></td><td align=\"right\" bgcolor=\"",$barv,"\">",$capacity,"</td></tr>";
}
echo "</table>";
break;

CASE 'cheer':
if (!$country) {$advorder = mysql_query("SELECT arena.teamid AS teamid, name, country, cheer_season, season_ideal FROM arena, teams WHERE arena.teamid = teams.teamid AND status =1 AND season_ideal >0 ORDER BY 100-((abs(cheer_season-season_ideal))*100/(season_ideal+0.01)) DESC LIMIT 100") or die(mysql_error());} else {$advorder = mysql_query("SELECT arena.teamid AS teamid, name, country, cheer_season, season_ideal FROM arena, teams WHERE arena.teamid = teams.teamid AND status =1 AND season_ideal >0 AND country = '$country' ORDER BY 100-((abs(cheer_season-season_ideal))*100/(season_ideal+0.01)) DESC LIMIT 30") or die(mysql_error());}
echo "<h2>",$langmark1286,"</h2><br/><table width=\"100%\" cellspacing=\"0\" cellpadding=\"1\">";
while($i=mysql_fetch_array($advorder)) {
$teamid=$i[teamid];
$tteamnm=$i[name];
$country=$i[country];
$cheer_season=$i[cheer_season];
$season_ideal=$i[season_ideal];
if ($cheer_season == $season_ideal AND $season_ideal <> 0) {$rratio = 100;}
elseif ($cheer_season == $season_ideal AND $season_ideal == 0) {$rratio = 60;}
else {$rratio = 100-((abs($cheer_season-$season_ideal))*100/($season_ideal+0.01));}
if ($rratio < 29) {$rratiodspl = $langmark023; }
elseif ($rratio > 28 AND $rratio < 45) {$rratiodspl = $langmark024; }
elseif ($rratio > 44 AND $rratio < 59) {$rratiodspl = $langmark025; }
elseif ($rratio > 58 AND $rratio < 71) {$rratiodspl = $langmark026; }
elseif ($rratio > 70 AND $rratio < 81) {$rratiodspl = $langmark027; }
elseif ($rratio > 80 AND $rratio < 89) {$rratiodspl = $langmark028; }
elseif ($rratio > 88 AND $rratio < 95) {$rratiodspl = $langmark029; }
else $rratiodspl = $langmark030;
$no=$no+1;
if ($teamid==$trueclub) {$barv='#FFCC66';} else {$barv='white';}
echo "<tr bgcolor=\"",$barv,"\"><td align=\"left\" bgcolor=\"",$barv,"\"><img src=\"img/Flags/",$country,".png\" border=\"0\" alt=\"",$country,"\" title=\"",$country,"\"> ",$no,". <a href=\"cheerleaders.php?squad=",$teamid,"\">",stripslashes($tteamnm),"</a></td><td align=\"right\" bgcolor=\"",$barv,"\">",$rratiodspl,"</td></tr>";
}
echo "</table>";
break;

CASE 'camp':
if (!$country) {$query = mysql_query("SELECT id, name, surname, age, country, nt, EV FROM youthcamp ORDER BY EV DESC LIMIT 100") or die(mysql_error());} else {$query = mysql_query("SELECT id, name, surname, age, country, nt, EV FROM youthcamp WHERE country = '$country' ORDER BY EV DESC LIMIT 100") or die(mysql_error());}
echo "<h2>",$langmark779," (",$langmark1287,")</h2><br/><table width=\"100%\" cellspacing=\"0\" cellpadding=\"1\">";
while($i=mysql_fetch_array($query)) {
$id = $i[id];
$name = $i[name];
$surname = $i[surname];
$ageage = $i[age];
$country = $i[country];
$ntp = $i[nt];
$wage = $i[EV];
$no=$no+1;
echo "<tr><td align=\"left\"><img src=\"img/Flags/",$country,".png\" border=\"0\" alt=\"",$country,"\" title=\"",$country,"\"> ",$no,". ";
if ($ntp>0) {echo "<font color=\"darkgreen\"><b>(NT)</b></font> ";}
echo "<a href=\"player.php?playerid=",$id,"\">",$name," ",$surname,"</a> (",$ageage,")</td><td align=\"right\">",number_format($wage)," &euro;</td></tr>";
}
echo "</table>";
break;

CASE 'scout':
if (!$country) {$query = mysql_query("SELECT playerid, EV, name, surname, age, players.country as country, bidingteam FROM transfers, players WHERE timeofsale > '$zacetek' AND playerclub='Free Agent' AND playerid = id ORDER BY EV DESC LIMIT 100") or die(mysql_error());} else {$query = mysql_query("SELECT playerid, EV, name, surname, age, players.country as country, bidingteam FROM transfers, players WHERE timeofsale > '$zacetek' AND players.country ='$country' AND playerclub = 'Free Agent' AND playerid = id ORDER BY EV DESC LIMIT 30") or die(mysql_error());}
echo "<h2>",$langmark780," (",$langmark1287,")</h2><br/><table width=\"100%\" cellspacing=\"0\" cellpadding=\"1\">";
while($i=mysql_fetch_array($query)) {
$id = $i[playerid];
$hage = $i[age];
$wage = $i[EV];
$name = $i[name];
$surname = $i[surname];
$hage = $i[age];
$country = $i[country];
$btprim = $i[bidingteam];
$no=$no+1;
if ($btprim==$userid) {$barv='#FFCC66';} else {$barv='white';}
echo "<tr bgcolor=\"",$barv,"\"><td align=\"left\" bgcolor=\"",$barv,"\"><img src=\"img/Flags/",$country,".png\" border=\"0\" alt=\"",$country,"\" title=\"",$country,"\"> ",$no,". <a href=\"player.php?playerid=",$id,"\">",$name," ",$surname,"</a> (",$hage,")</td><td align=\"right\" bgcolor=\"",$barv,"\">",number_format($wage)," &euro;</td></tr>";
}
echo "</table>";
break;

CASE 'train':
echo "These stats are updated every Monday morning";
if (!$country AND !$agea) {$query = mysql_query("SELECT playerid AS id, name, age, club, country, last_train AS last_training, nt FROM supstats WHERE last_pos<>0 ORDER BY last_train DESC LIMIT 100") or die(mysql_error());}
elseif (!$agea) {$query = mysql_query("SELECT playerid AS id, name, age, club, country, last_train AS last_training, nt FROM supstats WHERE last_pos<>0 AND country='$country' ORDER BY last_train DESC LIMIT 50") or die(mysql_error());}
elseif (!$country AND $agea < 30) {$query = mysql_query("SELECT playerid AS id, name, age, club, country, last_train AS last_training, nt FROM supstats WHERE last_pos<>0 AND age='$agea' ORDER BY last_train DESC LIMIT 100") or die(mysql_error());}
elseif (!$country AND $agea==30) {$query = mysql_query("SELECT playerid AS id, name, age, club, country, last_train AS last_training, nt FROM supstats WHERE last_pos<>0 AND age>29 ORDER BY last_train DESC LIMIT 100") or die(mysql_error());}
elseif ($agea==30) {$query = mysql_query("SELECT playerid AS id, name, age, club, country, last_train AS last_training, nt FROM supstats WHERE last_pos<>0 AND age>29 AND country='$country' ORDER BY last_train DESC LIMIT 50") or die(mysql_error());}
else {$query = mysql_query("SELECT playerid AS id, name, age, club, country, last_train AS last_training, nt FROM supstats WHERE last_pos<>0 AND age='$agea' AND country='$country' ORDER BY last_train DESC LIMIT 50") or die(mysql_error());}
echo "<h2>",$langmark785,"</h2><br/><table width=\"100%\" cellspacing=\"0\" cellpadding=\"1\">";
while($i=mysql_fetch_array($query)) {
$id = $i[id];
$name = $i[name];
$sage = $i[age];
$slata = $i[club];
$country = $i[country];
$last_training = $i[last_training];
$ntp = $i[nt];
$no=$no+1;
if ($slata==$trueclub) {$barv='#FFCC66';} else {$barv='white';}
echo "<tr bgcolor=\"",$barv,"\"><td align=\"left\" bgcolor=\"",$barv,"\"><img src=\"img/Flags/",$country,".png\" border=\"0\" alt=\"",$country,"\" title=\"",$country,"\"> ",$no,". ";
if ($ntp>0) {echo "<font color=\"darkgreen\"><b>(NT)</b></font> ";}
if ($last_training > 0) {echo "<a href=\"player.php?playerid=",$id,"\">",$name,"</a> (",$sage,")</td><td align=\"right\" bgcolor=\"",$barv,"\">+",$last_training,"</td></tr>";} else {echo "<a href=\"player.php?playerid=",$id,"\">",$name,"</a> (",$sage,")</td><td align=\"right\" bgcolor=\"",$barv,"\">",$last_training,"</td></tr>";}
}
echo "</table>";
break;

CASE 'wage':
echo "These stats are updated every Monday morning";
if (!$country AND !$agea) {$query = mysql_query("SELECT playerid, name, age, club, country, wage, nt FROM supstats LIMIT 100") or die(mysql_error());}
elseif (!$agea) {$query = mysql_query("SELECT playerid, name, age, club, country, wage, nt FROM supstats WHERE country = '$country' LIMIT 50") or die(mysql_error());}
elseif (!$country AND $agea < 30) {$query = mysql_query("SELECT playerid, name, age, club, country, wage, nt FROM supstats WHERE age='$agea' LIMIT 100") or die(mysql_error());}
elseif (!$country AND $agea==30) {$query = mysql_query("SELECT playerid, name, age, club, country, wage, nt FROM supstats WHERE age>29 LIMIT 100") or die(mysql_error());}
elseif ($agea==30) {$query = mysql_query("SELECT playerid, name, age, club, country, wage, nt FROM supstats WHERE country = '$country' AND age>29 LIMIT 50") or die(mysql_error());}
else {$query = mysql_query("SELECT playerid, name, age, club, country, wage, nt FROM supstats WHERE country = '$country' AND age='$agea' LIMIT 50") or die(mysql_error());}
echo "<h2>",$langmark790,"</h2><br/><table width=\"100%\" cellspacing=\"0\" cellpadding=\"1\">";
while($i=mysql_fetch_array($query)) {
$id = $i[playerid];
$name = $i[name];
$sage = $i[age];
$slata = $i[club];
$country = $i[country];
$height = $i[wage];
$ntp = $i[nt];
$no=$no+1;
if ($slata==$trueclub) {$barv='#FFCC66';} else {$barv='white';}
echo "<tr bgcolor=\"",$barv,"\"><td align=\"left\" bgcolor=\"",$barv,"\"><img src=\"img/Flags/",$country,".png\" border=\"0\" alt=\"",$country,"\" title=\"",$country,"\"> ",$no,". ";
if ($ntp>0) {echo "<font color=\"darkgreen\"><b>(NT)</b></font> ";}
echo "<a href=\"player.php?playerid=",$id,"\">",$name,"</a> (",$sage,")</td><td align=\"right\" bgcolor=\"",$barv,"\">",number_format($height)," &euro;</td></tr>";
}
echo "</table>";
break;

CASE 'starat':
echo "These stats are updated every Monday morning";
if (!$country AND !$agea) {$query = mysql_query("SELECT playerid AS id, name, age, club, country, star_qual, nt FROM supstats WHERE last_pos<>0 ORDER BY star_qual DESC LIMIT 100") or die(mysql_error());}
elseif (!$agea) {$query = mysql_query("SELECT playerid AS id, name, age, club, country, star_qual, nt FROM supstats WHERE last_pos<>0 AND country='$country' ORDER BY star_qual DESC LIMIT 50") or die(mysql_error());}
elseif (!$country AND $agea < 30) {$query = mysql_query("SELECT playerid AS id, name, age, club, country, star_qual, nt FROM supstats WHERE last_pos<>0 AND age='$agea' ORDER BY star_qual DESC LIMIT 100") or die(mysql_error());}
elseif (!$country AND $agea==30) {$query = mysql_query("SELECT playerid AS id, name, age, club, country, star_qual, nt FROM supstats WHERE last_pos<>0 AND age>29 ORDER BY star_qual DESC LIMIT 100") or die(mysql_error());}
elseif ($agea==30) {$query = mysql_query("SELECT playerid AS id, name, age, club, country, star_qual, nt FROM supstats WHERE last_pos<>0 AND age>29 AND country='$country' ORDER BY star_qual DESC LIMIT 50") or die(mysql_error());}
else {$query = mysql_query("SELECT playerid AS id, name, age, club, country, star_qual, nt FROM supstats WHERE last_pos<>0 AND age='$agea' AND country='$country' ORDER BY star_qual DESC LIMIT 50") or die(mysql_error());}
echo "<h2>Best star ratings</h2><br/><table width=\"100%\" cellspacing=\"0\" cellpadding=\"1\">";
while($i=mysql_fetch_array($query)) {
$id = $i[id];
$name = $i[name];
$sage = $i[age];
$slata = $i[club];
$country = $i[country];
$star_qual = $i[star_qual];
$ntp = $i[nt];
$slika = '<img src=ocena.jpeg border=0 alt=*>';
if ($star_qual > 69 AND $star_qual < 92) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena1.jpeg border=0 alt=°>';}
elseif ($star_qual > 91 AND $star_qual < 114) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
elseif ($star_qual > 113 AND $star_qual < 136) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena1.jpeg border=0 alt=°>';}
elseif ($star_qual > 135 AND $star_qual < 158) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
elseif ($star_qual > 157 AND $star_qual < 180) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena1.jpeg border=0 alt=°>';}
elseif ($star_qual > 179 AND $star_qual < 202) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
elseif ($star_qual > 201 AND $star_qual < 224) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena1.jpeg border=0 alt=°>';}
elseif ($star_qual > 223 AND $star_qual < 247) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
elseif ($star_qual > 246 AND $star_qual < 279) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena1.jpeg border=0 alt=°>';}
elseif ($star_qual > 268 AND $star_qual < 291) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
elseif ($star_qual > 290 AND $star_qual < 313) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena1.jpeg border=0 alt=°>';}
elseif ($star_qual > 312 AND $star_qual < 335) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
elseif ($star_qual > 334 AND $star_qual < 357) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena1.jpeg border=0 alt=°>';}
elseif ($star_qual > 356 AND $star_qual < 379) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
elseif ($star_qual > 378 AND $star_qual < 401) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena1.jpeg border=0 alt=°>';}
elseif ($star_qual > 400) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
$no=$no+1;
if ($slata==$trueclub) {$barv='#FFCC66';} else {$barv='white';}
echo "<tr bgcolor=\"",$barv,"\"><td align=\"left\" bgcolor=\"",$barv,"\"><img src=\"img/Flags/",$country,".png\" border=\"0\" alt=\"",$country,"\" title=\"",$country,"\"> ",$no,". ";
if ($ntp>0) {echo "<font color=\"darkgreen\"><b>(NT)</b></font> ";}
echo "<a href=\"player.php?playerid=",$id,"\">",$name,"</a> (",$sage,")</td><td align=\"right\" bgcolor=\"",$barv,"\">",$slika,"</td></tr>";
}
echo "</table>";
break;

CASE 'bpi':
if (!$country) {$query = mysql_query("SELECT count(bookmarkid) AS rder, b_link, name, surname, club, country FROM bookmarks, players WHERE id = b_link AND b_type =1 GROUP BY b_link ORDER BY rder DESC LIMIT 100") or die(mysql_error());} else {$query = mysql_query("SELECT count(bookmarkid) AS rder, b_link, name, surname, club, country FROM bookmarks, players WHERE id = b_link AND country ='$country' AND b_type =1 GROUP BY b_link ORDER BY rder DESC LIMIT 30") or die(mysql_error());}
echo "<h2>Most bookmarked players</h2><br/><table width=\"100%\" cellspacing=\"0\" cellpadding=\"1\">";
while($i=mysql_fetch_array($query)) {
$id = $i[b_link];
$name = $i[name];
$surname = $i[surname];
$slata = $i[club];
$country = $i[country];
$last_training = $i[rder];
$no=$no+1;
if ($slata==$trueclub) {$barv='#FFCC66';} else {$barv='white';}
echo "<tr bgcolor=\"",$barv,"\"><td align=\"left\" bgcolor=\"",$barv,"\"><img src=\"img/Flags/",$country,".png\" border=\"0\" alt=\"",$country,"\" title=\"",$country,"\"> ",$no,". <a href=\"player.php?playerid=",$id,"\">",$name," ",$surname,"</a></td><td align=\"right\" bgcolor=\"",$barv,"\">",$last_training,"</td></tr>";
}
echo "</table>";
break;

CASE 'height':
if (!$country) {$query = mysql_query("SELECT id, name, surname, club, country, height FROM players WHERE height > 221 AND club<>0 ORDER BY height DESC LIMIT 100") or die(mysql_error());} else {$query = mysql_query("SELECT id, players.name AS name, surname, club, players.country AS country, height FROM players, teams WHERE height >211 AND club = teamid AND players.country = '$country' ORDER BY height DESC LIMIT 50") or die(mysql_error());}
echo "<h2>",$langmark789,"</h2><br/><table width=\"100%\" cellspacing=\"0\" cellpadding=\"1\">";
while($i=mysql_fetch_array($query)) {
$id = $i["id"];
$name = $i["name"];
$surname = $i["surname"];
$slata = $i[club];
$country = $i["country"];
$height = $i["height"];
$no=$no+1;
$feetheight = floor((100*$height)/3048);
$tempheight = $height - ($feetheight*3048/100);
$inchheight = round((100*$tempheight)/254);
if ($inchheight==12) {
$feetheight=$feetheight+1; $inchheight='';
$usheight = $feetheight."'0";}
else {$usheight = $feetheight."'".$inchheight;}
if ($slata==$trueclub) {$barv='#FFCC66';} else {$barv='white';}
echo "<tr bgcolor=\"",$barv,"\"><td align=\"left\" bgcolor=\"",$barv,"\"><img src=\"img/Flags/",$country,".png\" border=\"0\" alt=\"",$country,"\" title=\"",$country,"\"> ",$no,". <a href=\"player.php?playerid=",$id,"\">",$name," ",$surname,"</a></td><td align=\"right\" bgcolor=\"",$barv,"\">",$height," cm (",$usheight," ft)</td></tr>";
}
if ($no < 50) {echo "<tr><td colspan=\"2\"><br/><i>Players who are 212 cm or taller are eligible for a display!</i></td></tr>";}
echo "</table>";
break;

CASE 'ev':
if (!$country) {$query = mysql_query("SELECT id AS id, name AS ime, surname AS priimek, age, club, country, ((((((((`height` *2) + `handling` + ( `speed` *4 ) + ( `passing` *2 ) + ( `vision` *2 ) + ( `rebounds` *3 ) + ( `position` *4 ) + ( `freethrow` *3 ) + ( `shooting` *4 ) + ( `experience` *2 ) + ( `defense` *3 )) * ( (`height` *2) + `handling` + ( `speed` *4 ) + ( `passing` *2 ) + ( `vision` *2 ) + ( `rebounds` *3 ) + ( `position` *4 ) + ( `freethrow` *3 ) + ( `shooting` *4 ) + ( `experience` *2 ) + ( `defense` *3 ) ) * ( (`height` *2) + `handling` + ( `speed` *4 ) + ( `passing` *2 ) + ( `vision` *2 ) + ( `rebounds` *3 ) + ( `position` *4 ) + ( `freethrow` *3 ) + ( `shooting` *4 ) + ( `experience` *2 ) + ( `defense` *3 ) )) /225000) -7500) /9) * ( (((((`height` *2) + `handling` + ( `speed` *4 ) + ( `passing` *2 ) + ( `vision` *2 ) + ( `rebounds` *3 ) + ( `position` *4 ) + ( `freethrow` *3 ) + ( `shooting` *4 ) + ( `experience` *2 ) + ( `defense` *3 ) ) * ( (`height` *2) + `handling` + ( `speed` *4 ) + ( `passing` *2 ) + ( `vision` *2 ) + ( `rebounds` *3 ) + ( `position` *4 ) + ( `freethrow` *3 ) + ( `shooting` *4 ) + ( `experience` *2 ) + ( `defense` *3 ) ) * ( (`height` *2) + `handling` + ( `speed` *4 ) + ( `passing` *2 ) + ( `vision` *2 ) + ( `rebounds` *3 ) + ( `position` *4 ) + ( `freethrow` *3 ) + ( `shooting` *4 ) + ( `experience` *2 ) + ( `defense` *3 ) )) /225000) -7500) /9)) /15) * ( 1 + ( (`workrate` /9) /16 ) ) * ( ( 210 / `age` ) /13 ) AS last_training FROM players WHERE `wage` >88999 AND coach =0 ORDER BY ((((((((`height` *2) + `handling` + ( `speed` *4 ) + ( `passing` *2 ) + ( `vision` *2 ) + ( `rebounds` *3 ) + ( `position` *4 ) + ( `freethrow` *3 ) + ( `shooting` *4 ) + ( `experience` *2 ) + ( `defense` *3 )) * ( (`height` *2) + `handling` + ( `speed` *4 ) + ( `passing` *2 ) + ( `vision` *2 ) + ( `rebounds` *3 ) + ( `position` *4 ) + ( `freethrow` *3 ) + ( `shooting` *4 ) + ( `experience` *2 ) + ( `defense` *3 ) ) * ( (`height` *2) + `handling` + ( `speed` *4 ) + ( `passing` *2 ) + ( `vision` *2 ) + ( `rebounds` *3 ) + ( `position` *4 ) + ( `freethrow` *3 ) + ( `shooting` *4 ) + ( `experience` *2 ) + ( `defense` *3 ) )) /225000) -7500) /9) * ( (((((`height` *2) + `handling` + ( `speed` *4 ) + ( `passing` *2 ) + ( `vision` *2 ) + ( `rebounds` *3 ) + ( `position` *4 ) + ( `freethrow` *3 ) + ( `shooting` *4 ) + ( `experience` *2 ) + ( `defense` *3 ) ) * ( (`height` *2) + `handling` + ( `speed` *4 ) + ( `passing` *2 ) + ( `vision` *2 ) + ( `rebounds` *3 ) + ( `position` *4 ) + ( `freethrow` *3 ) + ( `shooting` *4 ) + ( `experience` *2 ) + ( `defense` *3 ) ) * ( (`height` *2) + `handling` + ( `speed` *4 ) + ( `passing` *2 ) + ( `vision` *2 ) + ( `rebounds` *3 ) + ( `position` *4 ) + ( `freethrow` *3 ) + ( `shooting` *4 ) + ( `experience` *2 ) + ( `defense` *3 ) )) /225000) -7500) /9)) /15) * ( 1 + ( (`workrate` /9) /16 ) ) * ( ( 210 / `age` ) /13 ) DESC LIMIT 100") or die(mysql_error());} else {$query = mysql_query("SELECT id AS id, name AS ime, surname AS priimek, age, club, country, ((((((((`height` *2) + `handling` + ( `speed` *4 ) + ( `passing` *2 ) + ( `vision` *2 ) + ( `rebounds` *3 ) + ( `position` *4 ) + ( `freethrow` *3 ) + ( `shooting` *4 ) + ( `experience` *2 ) + ( `defense` *3 )) * ( (`height` *2) + `handling` + ( `speed` *4 ) + ( `passing` *2 ) + ( `vision` *2 ) + ( `rebounds` *3 ) + ( `position` *4 ) + ( `freethrow` *3 ) + ( `shooting` *4 ) + ( `experience` *2 ) + ( `defense` *3 ) ) * ( (`height` *2) + `handling` + ( `speed` *4 ) + ( `passing` *2 ) + ( `vision` *2 ) + ( `rebounds` *3 ) + ( `position` *4 ) + ( `freethrow` *3 ) + ( `shooting` *4 ) + ( `experience` *2 ) + ( `defense` *3 ) )) /225000) -7500) /9) * ( (((((`height` *2) + `handling` + ( `speed` *4 ) + ( `passing` *2 ) + ( `vision` *2 ) + ( `rebounds` *3 ) + ( `position` *4 ) + ( `freethrow` *3 ) + ( `shooting` *4 ) + ( `experience` *2 ) + ( `defense` *3 ) ) * ( (`height` *2) + `handling` + ( `speed` *4 ) + ( `passing` *2 ) + ( `vision` *2 ) + ( `rebounds` *3 ) + ( `position` *4 ) + ( `freethrow` *3 ) + ( `shooting` *4 ) + ( `experience` *2 ) + ( `defense` *3 ) ) * ( (`height` *2) + `handling` + ( `speed` *4 ) + ( `passing` *2 ) + ( `vision` *2 ) + ( `rebounds` *3 ) + ( `position` *4 ) + ( `freethrow` *3 ) + ( `shooting` *4 ) + ( `experience` *2 ) + ( `defense` *3 ) )) /225000) -7500) /9)) /15) * ( 1 + ( (`workrate` /9) /16 ) ) * ( ( 210 / `age` ) /13 ) AS last_training FROM players WHERE `wage` >15000 AND coach =0 AND country = '$country' ORDER BY ((((((((`height` *2) + `handling` + ( `speed` *4 ) + ( `passing` *2 ) + ( `vision` *2 ) + ( `rebounds` *3 ) + ( `position` *4 ) + ( `freethrow` *3 ) + ( `shooting` *4 ) + ( `experience` *2 ) + ( `defense` *3 )) * ( (`height` *2) + `handling` + ( `speed` *4 ) + ( `passing` *2 ) + ( `vision` *2 ) + ( `rebounds` *3 ) + ( `position` *4 ) + ( `freethrow` *3 ) + ( `shooting` *4 ) + ( `experience` *2 ) + ( `defense` *3 ) ) * ( (`height` *2) + `handling` + ( `speed` *4 ) + ( `passing` *2 ) + ( `vision` *2 ) + ( `rebounds` *3 ) + ( `position` *4 ) + ( `freethrow` *3 ) + ( `shooting` *4 ) + ( `experience` *2 ) + ( `defense` *3 ) )) /225000) -7500) /9) * ( (((((`height` *2) + `handling` + ( `speed` *4 ) + ( `passing` *2 ) + ( `vision` *2 ) + ( `rebounds` *3 ) + ( `position` *4 ) + ( `freethrow` *3 ) + ( `shooting` *4 ) + ( `experience` *2 ) + ( `defense` *3 ) ) * ( (`height` *2) + `handling` + ( `speed` *4 ) + ( `passing` *2 ) + ( `vision` *2 ) + ( `rebounds` *3 ) + ( `position` *4 ) + ( `freethrow` *3 ) + ( `shooting` *4 ) + ( `experience` *2 ) + ( `defense` *3 ) ) * ( (`height` *2) + `handling` + ( `speed` *4 ) + ( `passing` *2 ) + ( `vision` *2 ) + ( `rebounds` *3 ) + ( `position` *4 ) + ( `freethrow` *3 ) + ( `shooting` *4 ) + ( `experience` *2 ) + ( `defense` *3 ) )) /225000) -7500) /9)) /15) * ( 1 + ( (`workrate` /9) /16 ) ) * ( ( 210 / `age` ) /13 ) DESC LIMIT 30") or die(mysql_error());}
echo "<h2>",$langmark1288,"</h2><i>New values will be applied here very soon!</i><br/><table width=\"100%\" cellspacing=\"0\" cellpadding=\"1\">";
while($i=mysql_fetch_array($query)) {
$id = $i["id"];
$name = $i["ime"];
$surname = $i["priimek"];
$sage = $i["age"];
$slata = $i[club];
$country = $i["country"];
$height = $i["last_training"];
$no=$no+1;
if ($slata==$trueclub) {$barv='#FFCC66';} else {$barv='white';}
echo "<tr bgcolor=\"",$barv,"\"><td align=\"left\" bgcolor=\"",$barv,"\"><img src=\"img/Flags/",$country,".png\" border=\"0\" alt=\"",$country,"\" title=\"",$country,"\"> ",$no,". <a href=\"player.php?playerid=",$id,"\">",$name," ",$surname,"</a> (",$sage,")</td><td align=\"right\" bgcolor=\"",$barv,"\">",number_format($height)," &euro;</td></tr>";
}
echo "</table>";
break;

CASE 'tpc':
if (!$country) {echo "<h2>Top paid coaches</h2>"; $query = mysql_query("SELECT id, players.name AS ime, surname, age, club, country, wage last_training FROM players WHERE `wage` >88999 AND coach =1 ORDER BY wage DESC LIMIT 100") or die(mysql_error());}
else {echo "<h2>Top paid coaches in ".$country."</h2>"; $query = mysql_query("SELECT id, players.name AS ime, surname, age, club, players.country AS country, wage last_training FROM players, teams WHERE teamid=club and teams.country='$country' AND coach =1 ORDER BY wage DESC LIMIT 30") or die(mysql_error());}
echo "<br/><table width=\"100%\" cellspacing=\"0\" cellpadding=\"1\">";
while($i=mysql_fetch_array($query)) {
$id = $i["id"];
$name = $i["ime"];
$surname = $i["surname"];
$sage = $i["age"];
$slata = $i[club];
$country = $i["country"];
$height = $i["last_training"];
$no=$no+1;
if ($slata==$trueclub) {$barv='#FFCC66';} else {$barv='white';}
echo "<tr bgcolor=\"",$barv,"\"><td align=\"left\" bgcolor=\"",$barv,"\"><img src=\"img/Flags/",$country,".png\" border=\"0\" alt=\"",$country,"\" title=\"",$country,"\"> ",$no,". ";
echo "<a href=\"coach.php?coachid=",$id,"\">",$name," ",$surname,"</a> (",$sage,")</td><td align=\"right\" bgcolor=\"",$barv,"\">",number_format($height)," &euro;</td></tr>";
}
echo "</table>";
break;

CASE 'gpop':
if (!$country){
$query1 = mysql_query("SELECT teamid FROM teams WHERE guards_t=1") or die(mysql_error()); $resw1=mysql_num_rows($query1);
$query2 = mysql_query("SELECT teamid FROM teams WHERE guards_t=2") or die(mysql_error()); $resw2=mysql_num_rows($query2);
$query3 = mysql_query("SELECT teamid FROM teams WHERE guards_t=3") or die(mysql_error()); $resw3=mysql_num_rows($query3);
$query4 = mysql_query("SELECT teamid FROM teams WHERE guards_t=4") or die(mysql_error()); $resw4=mysql_num_rows($query4);
$query5 = mysql_query("SELECT teamid FROM teams WHERE guards_t=5") or die(mysql_error()); $resw5=mysql_num_rows($query5);
$query6 = mysql_query("SELECT teamid FROM teams WHERE guards_t=6") or die(mysql_error()); $resw6=mysql_num_rows($query6);
$query7 = mysql_query("SELECT teamid FROM teams WHERE guards_t=7") or die(mysql_error()); $resw7=mysql_num_rows($query7);
$query8 = mysql_query("SELECT teamid FROM teams WHERE guards_t=8") or die(mysql_error()); $resw8=mysql_num_rows($query8);
$query9 = mysql_query("SELECT teamid FROM teams WHERE guards_t=9") or die(mysql_error()); $resw9=mysql_num_rows($query9);
} else {
$query1 = mysql_query("SELECT teamid FROM teams WHERE country = '$country' AND guards_t=1") or die(mysql_error()); $resw1=mysql_num_rows($query1);
$query2 = mysql_query("SELECT teamid FROM teams WHERE country = '$country' AND guards_t=2") or die(mysql_error()); $resw2=mysql_num_rows($query2);
$query3 = mysql_query("SELECT teamid FROM teams WHERE country = '$country' AND guards_t=3") or die(mysql_error()); $resw3=mysql_num_rows($query3);
$query4 = mysql_query("SELECT teamid FROM teams WHERE country = '$country' AND guards_t=4") or die(mysql_error()); $resw4=mysql_num_rows($query4);
$query5 = mysql_query("SELECT teamid FROM teams WHERE country = '$country' AND guards_t=5") or die(mysql_error()); $resw5=mysql_num_rows($query5);
$query6 = mysql_query("SELECT teamid FROM teams WHERE country = '$country' AND guards_t=6") or die(mysql_error()); $resw6=mysql_num_rows($query6);
$query7 = mysql_query("SELECT teamid FROM teams WHERE country = '$country' AND guards_t=7") or die(mysql_error()); $resw7=mysql_num_rows($query7);
$query8 = mysql_query("SELECT teamid FROM teams WHERE country = '$country' AND guards_t=8") or die(mysql_error()); $resw8=mysql_num_rows($query8);
$query9 = mysql_query("SELECT teamid FROM teams WHERE country = '$country' AND guards_t=9") or die(mysql_error()); $resw9=mysql_num_rows($query9);
}
$TOTALres=$resw1+$resw2+$resw3+$resw4+$resw5+$resw6+$resw7+$resw8+$resw9;
?>
<h2><?=$langmark791?></h2><br/><!--<table width="100%" cellspacing="0" cellpadding="1">
<tr><td align="left"><?=$langmark120?></td><td align="right"><b><?=round(100*$resw1/$TOTALres,2)?>%</b> (<?=$resw1," ",$langmark792?>)</td></tr>
<tr><td align="left"><?=$langmark121?></td><td align="right"><b><?=round(100*$resw2/$TOTALres,2)?>%</b> (<?=$resw2," ",$langmark792?>)</td></tr>
<tr><td align="left"><?=$langmark122?></td><td align="right"><b><?=round(100*$resw3/$TOTALres,2)?>%</b> (<?=$resw3," ",$langmark792?>)</td></tr>
<tr><td align="left"><?=$langmark123?></td><td align="right"><b><?=round(100*$resw4/$TOTALres,2)?>%</b> (<?=$resw4," ",$langmark792?>)</td></tr>
<tr><td align="left"><?=$langmark124?></td><td align="right"><b><?=round(100*$resw5/$TOTALres,2)?>%</b> (<?=$resw5," ",$langmark792?>)</td></tr>
<tr><td align="left"><?=$langmark125?></td><td align="right"><b><?=round(100*$resw6/$TOTALres,2)?>%</b> (<?=$resw6," ",$langmark792?>)</td></tr>
<tr><td align="left"><?=$langmark126?></td><td align="right"><b><?=round(100*$resw7/$TOTALres,2)?>%</b> (<?=$resw7," ",$langmark792?>)</td></tr>
<tr><td align="left"><?=$langmark127?></td><td align="right"><b><?=round(100*$resw8/$TOTALres,2)?>%</b> (<?=$resw8," ",$langmark792?>)</td></tr>
<tr><td align="left"><?=$langmark128?></td><td align="right"><b><?=round(100*$resw9/$TOTALres,2)?>%</b> (<?=$resw9," ",$langmark792?>)</td></tr>
</table>
<script type="text/javascript" src="inc/wz_jsgraphics.js"></script>
<script type="text/javascript" src="inc/pie.js">
</script>
<div id="pieCanvas" style="position:relative; margin:0px;"></div>
<script type="text/javascript">
var p = new pie();
p.add("<?=$langmark120?>",<?=$resw1?>);
p.add("<?=$langmark121?>",<?=$resw2?>);
p.add("<?=$langmark122?>",<?=$resw3?>);
p.add("<?=$langmark123?>",<?=$resw4?>);
p.add("<?=$langmark124?>",<?=$resw5?>);
p.add("<?=$langmark125?>",<?=$resw6?>);
p.add("<?=$langmark126?>",<?=$resw7?>);
p.add("<?=$langmark127?>",<?=$resw8?>);
p.add("<?=$langmark128?>",<?=$resw9?>);
p.render("pieCanvas", "Pie Graph")
</script>
-->
<?php
include('graphs.inc.php');
$graph = new BAR_GRAPH("hBar");
$graph->values = "$resw1,$resw2,$resw3,$resw4,$resw5,$resw6,$resw7,$resw8,$resw9";
$graph->labels = "$langmark120,$langmark121,$langmark122,$langmark123,$langmark124,$langmark125,$langmark126,$langmark127,$langmark128";
$graph->showValues = 1;
$graph->barWidth = 20;
$graph->barLength = 1.0;
$graph->labelSize = 12;
$graph->absValuesSize = 12;
$graph->percValuesSize = 12;
$graph->graphPadding = 0;
$graph->graphBGColor = "#FFFFFF";
$graph->graphBorder = "0px solid #FFFFFF";
$graph->barColors = "#CC3300";
$graph->barBGColor = "#FFFFFF";
$graph->barBorder = "2px outset white";
$graph->labelColor = "#000000";
$graph->labelBGColor = "#FFFFFF";
$graph->labelBorder = "2px groove 663333";
$graph->absValuesColor = "#000000";
$graph->absValuesBGColor = "#FFFFFF";
$graph->absValuesBorder = "2px groove white";
echo $graph->create();
?>
<br/><i><?=$langmark795?></i>
<?php
break;

CASE 'bmpop':
if (!$country){
$query1 = mysql_query("SELECT teamid FROM teams WHERE bigmen_t=1") or die(mysql_error()); $resw1=mysql_num_rows($query1);
$query2 = mysql_query("SELECT teamid FROM teams WHERE bigmen_t=2") or die(mysql_error()); $resw2=mysql_num_rows($query2);
$query3 = mysql_query("SELECT teamid FROM teams WHERE bigmen_t=3") or die(mysql_error()); $resw3=mysql_num_rows($query3);
$query4 = mysql_query("SELECT teamid FROM teams WHERE bigmen_t=4") or die(mysql_error()); $resw4=mysql_num_rows($query4);
$query5 = mysql_query("SELECT teamid FROM teams WHERE bigmen_t=5") or die(mysql_error()); $resw5=mysql_num_rows($query5);
$query6 = mysql_query("SELECT teamid FROM teams WHERE bigmen_t=6") or die(mysql_error()); $resw6=mysql_num_rows($query6);
$query7 = mysql_query("SELECT teamid FROM teams WHERE bigmen_t=7") or die(mysql_error()); $resw7=mysql_num_rows($query7);
$query8 = mysql_query("SELECT teamid FROM teams WHERE bigmen_t=8") or die(mysql_error()); $resw8=mysql_num_rows($query8);
$query9 = mysql_query("SELECT teamid FROM teams WHERE bigmen_t=9") or die(mysql_error()); $resw9=mysql_num_rows($query9);
} else {
$query1 = mysql_query("SELECT teamid FROM teams WHERE country = '$country' AND bigmen_t=1") or die(mysql_error()); $resw1=mysql_num_rows($query1);
$query2 = mysql_query("SELECT teamid FROM teams WHERE country = '$country' AND bigmen_t=2") or die(mysql_error()); $resw2=mysql_num_rows($query2);
$query3 = mysql_query("SELECT teamid FROM teams WHERE country = '$country' AND bigmen_t=3") or die(mysql_error()); $resw3=mysql_num_rows($query3);
$query4 = mysql_query("SELECT teamid FROM teams WHERE country = '$country' AND bigmen_t=4") or die(mysql_error()); $resw4=mysql_num_rows($query4);
$query5 = mysql_query("SELECT teamid FROM teams WHERE country = '$country' AND bigmen_t=5") or die(mysql_error()); $resw5=mysql_num_rows($query5);
$query6 = mysql_query("SELECT teamid FROM teams WHERE country = '$country' AND bigmen_t=6") or die(mysql_error()); $resw6=mysql_num_rows($query6);
$query7 = mysql_query("SELECT teamid FROM teams WHERE country = '$country' AND bigmen_t=7") or die(mysql_error()); $resw7=mysql_num_rows($query7);
$query8 = mysql_query("SELECT teamid FROM teams WHERE country = '$country' AND bigmen_t=8") or die(mysql_error()); $resw8=mysql_num_rows($query8);
$query9 = mysql_query("SELECT teamid FROM teams WHERE country = '$country' AND bigmen_t=9") or die(mysql_error()); $resw9=mysql_num_rows($query9);
}
$TOTALres=$resw1+$resw2+$resw3+$resw4+$resw5+$resw6+$resw7+$resw8+$resw9;
?>
<h2><?=$langmark796?></h2><br/><!--<table width="100%" cellspacing="0" cellpadding="1">
<tr><td align="left"><?=$langmark120?></td><td align="right"><b><?=round(100*$resw1/$TOTALres,2)?>%</b> (<?=$resw1," ",$langmark792?>)</td></tr>
<tr><td align="left"><?=$langmark121?></td><td align="right"><b><?=round(100*$resw2/$TOTALres,2)?>%</b> (<?=$resw2," ",$langmark792?>)</td></tr>
<tr><td align="left"><?=$langmark122?></td><td align="right"><b><?=round(100*$resw3/$TOTALres,2)?>%</b> (<?=$resw3," ",$langmark792?>)</td></tr>
<tr><td align="left"><?=$langmark123?></td><td align="right"><b><?=round(100*$resw4/$TOTALres,2)?>%</b> (<?=$resw4," ",$langmark792?>)</td></tr>
<tr><td align="left"><?=$langmark124?></td><td align="right"><b><?=round(100*$resw5/$TOTALres,2)?>%</b> (<?=$resw5," ",$langmark792?>)</td></tr>
<tr><td align="left"><?=$langmark125?></td><td align="right"><b><?=round(100*$resw6/$TOTALres,2)?>%</b> (<?=$resw6," ",$langmark792?>)</td></tr>
<tr><td align="left"><?=$langmark126?></td><td align="right"><b><?=round(100*$resw7/$TOTALres,2)?>%</b> (<?=$resw7," ",$langmark792?>)</td></tr>
<tr><td align="left"><?=$langmark127?></td><td align="right"><b><?=round(100*$resw8/$TOTALres,2)?>%</b> (<?=$resw8," ",$langmark792?>)</td></tr>
<tr><td align="left"><?=$langmark128?></td><td align="right"><b><?=round(100*$resw9/$TOTALres,2)?>%</b> (<?=$resw9," ",$langmark792?>)</td></tr>
</table>-->
<?php
include('graphs.inc.php');
$graph = new BAR_GRAPH("hBar");
$graph->values = "$resw1,$resw2,$resw3,$resw4,$resw5,$resw6,$resw7,$resw8,$resw9";
$graph->labels = "$langmark120,$langmark121,$langmark122,$langmark123,$langmark124,$langmark125,$langmark126,$langmark127,$langmark128";
$graph->showValues = 1;
$graph->barWidth = 20;
$graph->barLength = 1.0;
$graph->labelSize = 12;
$graph->absValuesSize = 12;
$graph->percValuesSize = 12;
$graph->graphPadding = 0;
$graph->graphBGColor = "#FFFFFF";
$graph->graphBorder = "0px solid #FFFFFF";
$graph->barColors = "#CC3300";
$graph->barBGColor = "#FFFFFF";
$graph->barBorder = "2px outset white";
$graph->labelColor = "#000000";
$graph->labelBGColor = "#FFFFFF";
$graph->labelBorder = "2px groove 663333";
$graph->absValuesColor = "#000000";
$graph->absValuesBGColor = "#FFFFFF";
$graph->absValuesBorder = "2px groove white";
echo $graph->create();
?>
<br/><i><?=$langmark795?></i>
<?php
break;

CASE 'players':
$query = mysql_query("SELECT avg(age) AS age, avg(height) AS height, avg(weight) AS weight, avg(wage) AS wage, avg(experience) AS xp, avg(workrate) AS wr, avg(fatigue) as fatigue, avg(last_training) AS last_training FROM players WHERE coach=0 AND club=$trueclub") or die(mysql_error());
$query1 = mysql_query("SELECT avg(star_qual) AS starqual FROM players WHERE star_qual > 0 AND coach=0 AND club=$trueclub") or die(mysql_error());
$result1 = mysql_result ($query,0,"age");
$height = mysql_result ($query,0,"height");
$weight = mysql_result ($query,0,"weight");
$result4 = mysql_result ($query,0,"wage");
$result5 = mysql_result ($query,0,"fatigue");
$experience = mysql_result ($query,0,"xp");
$workrate = mysql_result ($query,0,"wr");
$star_qual = mysql_result ($query1,0,"starqual");
$result17 = mysql_result ($query,0,"last_training");
$result17 = round($result17,2);
if ($result17 > 0) {$result17="+".$result17;}
   $feetheight = floor((100*$height)/3048);
   $tempheight = $height - ($feetheight*3048/100);
   $inchheight = round((100*$tempheight)/254);
   if ($inchheight==12) {
   $feetheight=$feetheight+1; $inchheight='';
   $usheight = $feetheight."'0";}
   else {$usheight = $feetheight."'".$inchheight;}
   $usweight = round ($weight * 22046 / 10000);
if ($workrate < 9 AND $lang != 'isr') {$workrate_dspl = $langmark111." (0)"; }
elseif ($workrate > 8 AND $workrate < 17 AND $lang != 'isr') {$workrate_dspl = $langmark096." (1)";}
elseif ($workrate > 16 AND $workrate < 25 AND $lang != 'isr') {$workrate_dspl = $langmark097." (2)";}
elseif ($workrate > 24 AND $workrate < 33 AND $lang != 'isr') {$workrate_dspl = $langmark098." (3)";}
elseif ($workrate > 32 AND $workrate < 41 AND $lang != 'isr') {$workrate_dspl = $langmark099." (4)";}
elseif ($workrate > 40 AND $workrate < 49 AND $lang != 'isr') {$workrate_dspl = $langmark100." (5)";}
elseif ($workrate > 48 AND $workrate < 57 AND $lang != 'isr') {$workrate_dspl = $langmark101." (6)";}
elseif ($workrate > 56 AND $workrate < 65 AND $lang != 'isr') {$workrate_dspl = $langmark102." (7)";}
elseif ($workrate > 64 AND $workrate < 73 AND $lang != 'isr') {$workrate_dspl = $langmark103." (8)";}
elseif ($workrate > 72 AND $workrate < 81 AND $lang != 'isr') {$workrate_dspl = $langmark104." (9)";}
elseif ($workrate > 80 AND $workrate < 89 AND $lang != 'isr') {$workrate_dspl = $langmark105." (10)";}
elseif ($workrate > 88 AND $workrate < 97 AND $lang != 'isr') {$workrate_dspl = $langmark106." (11)";}
elseif ($workrate > 96 AND $workrate < 105 AND $lang != 'isr') {$workrate_dspl = $langmark107." (12)";}
elseif ($workrate > 104 AND $workrate < 113 AND $lang != 'isr') {$workrate_dspl = $langmark108." (13)";}
elseif ($workrate > 112 AND $workrate < 121 AND $lang != 'isr') {$workrate_dspl = $langmark109." (14)";}
elseif ($workrate >= 121 AND $lang != 'isr') {$workrate_dspl = $langmark110." (15)";}
if ($experience < 9 AND $lang != 'isr') {$experience_dspl = $langmark111." (0)";}
elseif ($experience > 8 AND $experience < 17 AND $lang != 'isr') {$experience_dspl = $langmark096." (1)";}
elseif ($experience > 16 AND $experience < 25 AND $lang != 'isr') {$experience_dspl = $langmark097." (2)";}
elseif ($experience > 24 AND $experience < 33 AND $lang != 'isr') {$experience_dspl = $langmark098." (3)";}
elseif ($experience > 32 AND $experience < 41 AND $lang != 'isr') {$experience_dspl = $langmark099." (4)";}
elseif ($experience > 40 AND $experience < 49 AND $lang != 'isr') {$experience_dspl = $langmark100." (5)";}
elseif ($experience > 48 AND $experience < 57 AND $lang != 'isr') {$experience_dspl = $langmark101." (6)";}
elseif ($experience > 56 AND $experience < 65 AND $lang != 'isr') {$experience_dspl = $langmark102." (7)";}
elseif ($experience > 64 AND $experience < 73 AND $lang != 'isr') {$experience_dspl = $langmark103." (8)";}
elseif ($experience > 72 AND $experience < 81 AND $lang != 'isr') {$experience_dspl = $langmark104." (9)";}
elseif ($experience > 80 AND $experience < 89 AND $lang != 'isr') {$experience_dspl = $langmark105." (10)";}
elseif ($experience > 88 AND $experience < 97 AND $lang != 'isr') {$experience_dspl = $langmark106." (11)";}
elseif ($experience > 96 AND $experience < 105 AND $lang != 'isr') {$experience_dspl = $langmark107." (12)";}
elseif ($experience > 104 AND $experience < 113 AND $lang != 'isr') {$experience_dspl = $langmark108." (13)";}
elseif ($experience > 112 AND $experience < 121 AND $lang != 'isr') {$experience_dspl = $langmark109." (14)";}
elseif ($experience >= 121 AND $lang != 'isr') {$experience_dspl = $langmark110." (15)";}
if ($workrate < 9 AND $lang == 'isr') {$workrate_dspl = "(0) ".$langmark111;}
elseif ($workrate > 8 AND $workrate < 17 AND $lang == 'isr') {$workrate_dspl = "(1) ".$langmark096;}
elseif ($workrate > 16 AND $workrate < 25 AND $lang == 'isr') {$workrate_dspl = "(2) ".$langmark097;}
elseif ($workrate > 24 AND $workrate < 33 AND $lang == 'isr') {$workrate_dspl = "(3) ".$langmark098;}
elseif ($workrate > 32 AND $workrate < 41 AND $lang == 'isr') {$workrate_dspl = "(4) ".$langmark099;}
elseif ($workrate > 40 AND $workrate < 49 AND $lang == 'isr') {$workrate_dspl = "(5) ".$langmark100;}
elseif ($workrate > 48 AND $workrate < 57 AND $lang == 'isr') {$workrate_dspl = "(6) ".$langmark101;}
elseif ($workrate > 56 AND $workrate < 65 AND $lang == 'isr') {$workrate_dspl = "(7) ".$langmark102;}
elseif ($workrate > 64 AND $workrate < 73 AND $lang == 'isr') {$workrate_dspl = "(8) ".$langmark103;}
elseif ($workrate > 72 AND $workrate < 81 AND $lang == 'isr') {$workrate_dspl = "(9) ".$langmark104;}
elseif ($workrate > 80 AND $workrate < 89 AND $lang == 'isr') {$workrate_dspl = "(10) ".$langmark105;}
elseif ($workrate > 88 AND $workrate < 97 AND $lang == 'isr') {$workrate_dspl = "(11) ".$langmark106;}
elseif ($workrate > 96 AND $workrate < 105 AND $lang == 'isr') {$workrate_dspl = "(12) ".$langmark107;}
elseif ($workrate > 104 AND $workrate < 113 AND $lang == 'isr') {$workrate_dspl = "(13) ".$langmark108;}
elseif ($workrate > 112 AND $workrate < 121 AND $lang == 'isr') {$workrate_dspl = "(14) ".$langmark109;}
elseif ($workrate >= 121 AND $lang == 'isr') {$workrate_dspl = "(15) ".$langmark110;}
if ($experience < 9 AND $lang == 'isr') {$experience_dspl = "(0) ".$langmark111;}
elseif ($experience > 8 AND $experience < 17 AND $lang == 'isr') {$experience_dspl = "(1) ".$langmark096;}
elseif ($experience > 16 AND $experience < 25 AND $lang == 'isr') {$experience_dspl = "(2) ".$langmark097;}
elseif ($experience > 24 AND $experience < 33 AND $lang == 'isr') {$experience_dspl = "(3) ".$langmark098;}
elseif ($experience > 32 AND $experience < 41 AND $lang == 'isr') {$experience_dspl = "(4) ".$langmark099;}
elseif ($experience > 40 AND $experience < 49 AND $lang == 'isr') {$experience_dspl = "(5) ".$langmark100;}
elseif ($experience > 48 AND $experience < 57 AND $lang == 'isr') {$experience_dspl = "(6) ".$langmark101;}
elseif ($experience > 56 AND $experience < 65 AND $lang == 'isr') {$experience_dspl = "(7) ".$langmark102;}
elseif ($experience > 64 AND $experience < 73 AND $lang == 'isr') {$experience_dspl = "(8) ".$langmark103;}
elseif ($experience > 72 AND $experience < 81 AND $lang == 'isr') {$experience_dspl = "(9) ".$langmark104;}
elseif ($experience > 80 AND $experience < 89 AND $lang == 'isr') {$experience_dspl = "(10) ".$langmark105;}
elseif ($experience > 88 AND $experience < 97 AND $lang == 'isr') {$experience_dspl = "(11) ".$langmark106;}
elseif ($experience > 96 AND $experience < 105 AND $lang == 'isr') {$experience_dspl = "(12) ".$langmark107;}
elseif ($experience > 104 AND $experience < 113 AND $lang == 'isr') {$experience_dspl = "(13) ".$langmark108;}
elseif ($experience > 112 AND $experience < 121 AND $lang == 'isr') {$experience_dspl = "(14) ".$langmark109;}
elseif ($experience >= 121 AND $lang == 'isr') {$experience_dspl = "(15) ".$langmark110;}
$slika = '<img src=ocena.jpeg border=0 alt=*>';
if ($star_qual > 69 AND $star_qual < 92) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena1.jpeg border=0 alt=°>';}
elseif ($star_qual > 91 AND $star_qual < 114) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
elseif ($star_qual > 113 AND $star_qual < 136) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena1.jpeg border=0 alt=°>';}
elseif ($star_qual > 135 AND $star_qual < 158) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
elseif ($star_qual > 157 AND $star_qual < 180) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena1.jpeg border=0 alt=°>';}
elseif ($star_qual > 179 AND $star_qual < 202) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
elseif ($star_qual > 201 AND $star_qual < 224) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena1.jpeg border=0 alt=°>';}
elseif ($star_qual > 223 AND $star_qual < 247) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
elseif ($star_qual > 246 AND $star_qual < 279) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena1.jpeg border=0 alt=°>';}
elseif ($star_qual > 268 AND $star_qual < 291) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
elseif ($star_qual > 290 AND $star_qual < 313) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena1.jpeg border=0 alt=°>';}
elseif ($star_qual > 312 AND $star_qual < 335) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
elseif ($star_qual > 334 AND $star_qual < 357) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena1.jpeg border=0 alt=°>';}
elseif ($star_qual > 356 AND $star_qual < 379) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
elseif ($star_qual > 378 AND $star_qual < 401) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena1.jpeg border=0 alt=°>';}
elseif ($star_qual > 400) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
//dosezki
$tiptop = mysql_query("SELECT statistics.match AS matchid, statistics.player AS player, 2*statistics.two_scored+statistics.one_scored+statistics.three_scored*3 AS scored, players.name AS name, players.surname AS surname FROM statistics, matches, players WHERE statistics.player=players.id AND statistics.match = matches.matchid AND matches.time > '$signed' AND statistics.team=$trueclub ORDER BY 2*statistics.two_scored+statistics.one_scored+statistics.three_scored*3 DESC, gametime ASC LIMIT 1") or die(mysql_error());
if (mysql_num_rows($tiptop) > 0) {
$topscores = mysql_result($tiptop,0,"scored");
$topscorer = mysql_result($tiptop,0,"player");
$name = mysql_result($tiptop,0,"name");
$surname = mysql_result($tiptop,0,"surname");
$topscored = mysql_result($tiptop,0,"matchid");
}
$tiptop1 = mysql_query("SELECT statistics.match AS matchid, statistics.player AS player, def_rebounds+off_rebounds AS scored, players.name AS name, players.surname AS surname FROM statistics, matches, players WHERE statistics.player=players.id AND statistics.match = matches.matchid AND matches.time > '$signed' AND statistics.team=$trueclub ORDER BY def_rebounds+off_rebounds DESC, gametime ASC LIMIT 1") or die(mysql_error());
if (mysql_num_rows($tiptop1) > 0) {
$topscores1 = mysql_result($tiptop1,0,"scored");
$topscorer1 = mysql_result($tiptop1,0,"player");
$name1 = mysql_result($tiptop1,0,"name");
$surname1 = mysql_result($tiptop1,0,"surname");
$topscored1 = mysql_result($tiptop1,0,"matchid");
}
$tiptop2 = mysql_query("SELECT statistics.match AS matchid, statistics.player AS player, assists AS scored, players.name AS name, players.surname AS surname FROM statistics, matches, players WHERE statistics.player=players.id AND statistics.match = matches.matchid AND matches.time > '$signed' AND statistics.team=$trueclub ORDER BY assists DESC, gametime ASC LIMIT 1") or die(mysql_error());
if (mysql_num_rows($tiptop2) > 0) {
$topscores2 = mysql_result($tiptop2,0,"scored");
$topscorer2 = mysql_result($tiptop2,0,"player");
$name2 = mysql_result($tiptop2,0,"name");
$surname2 = mysql_result($tiptop2,0,"surname");
$topscored2 = mysql_result($tiptop2,0,"matchid");
}
$tiptop3 = mysql_query("SELECT statistics.match AS matchid, statistics.player AS player, statistics.steals AS scored, players.name AS name, players.surname AS surname FROM statistics, matches, players WHERE statistics.player=players.id AND statistics.match = matches.matchid AND matches.time > '$signed' AND statistics.team=$trueclub ORDER BY steals DESC, gametime ASC LIMIT 1") or die(mysql_error());
if (mysql_num_rows($tiptop3) > 0) {
$topscores3 = mysql_result($tiptop3,0,"scored");
$topscorer3 = mysql_result($tiptop3,0,"player");
$name3 = mysql_result($tiptop3,0,"name");
$surname3 = mysql_result($tiptop3,0,"surname");
$topscored3 = mysql_result($tiptop3,0,"matchid");
}
$tiptop4 = mysql_query("SELECT statistics.match AS matchid, statistics.player AS player, blocks AS scored, players.name AS name, players.surname AS surname FROM statistics, matches, players WHERE statistics.player=players.id AND statistics.match = matches.matchid AND matches.time > '$signed' AND statistics.team=$trueclub ORDER BY blocks DESC, gametime ASC LIMIT 1") or die(mysql_error());
if (mysql_num_rows($tiptop4) > 0) {
$topscores4 = mysql_result($tiptop4,0,"scored");
$topscorer4 = mysql_result($tiptop4,0,"player");
$name4 = mysql_result($tiptop4,0,"name");
$surname4 = mysql_result($tiptop4,0,"surname");
$topscored4 = mysql_result($tiptop4,0,"matchid");
}
$tiptop5 = mysql_query("SELECT statistics.match AS matchid, statistics.player AS player, turnovers AS scored, players.name AS name, players.surname AS surname FROM statistics, matches, players WHERE statistics.player=players.id AND statistics.match = matches.matchid AND matches.time > '$signed' AND statistics.team=$trueclub ORDER BY turnovers DESC, gametime ASC LIMIT 1") or die(mysql_error());
if (mysql_num_rows($tiptop5) > 0) {
$topscores5 = mysql_result($tiptop5,0,"scored");
$topscorer5 = mysql_result($tiptop5,0,"player");
$name5 = mysql_result($tiptop5,0,"name");
$surname5 = mysql_result($tiptop5,0,"surname");
$topscored5 = mysql_result($tiptop5,0,"matchid");
}
$tiptop6 = mysql_query("SELECT statistics.match AS matchid, statistics.player AS player, three_scored AS scored, players.name AS name, players.surname AS surname FROM statistics, matches, players WHERE statistics.player=players.id AND statistics.match = matches.matchid AND matches.time > '$signed' AND statistics.team=$trueclub ORDER BY three_scored DESC, three_total ASC, gametime ASC LIMIT 1") or die(mysql_error());
if (mysql_num_rows($tiptop6) > 0) {
$topscores6 = mysql_result($tiptop6,0,"scored");
$topscorer6 = mysql_result($tiptop6,0,"player");
$name6 = mysql_result($tiptop6,0,"name");
$surname6 = mysql_result($tiptop6,0,"surname");
$topscored6 = mysql_result($tiptop6,0,"matchid");
}
$tiptop7 = mysql_query("SELECT statistics.match AS matchid, statistics.player AS player, ((2 * `two_scored` + `one_scored` + `three_scored` * 3) - (`two_total`-`two_scored`) - (`one_total`-`one_scored`) - (`three_total`-`three_scored`) + `def_rebounds` + `off_rebounds` + `blocks` + `steals` + `assists` - `turnovers`) AS scored, players.name AS name, players.surname AS surname FROM statistics, matches, players WHERE statistics.player = players.id AND statistics.match = matches.matchid AND matches.time > '$signed' AND statistics.team =$trueclub AND ((2 * `two_scored` + `one_scored` + `three_scored` * 3) - (`two_total`-`two_scored`) - (`one_total`-`one_scored`) - (`three_total`-`three_scored`) + `def_rebounds` + `off_rebounds` + `blocks` + `steals` + `assists` - `turnovers`) < 1000 ORDER BY ((2 * `two_scored` + `one_scored` + `three_scored` * 3) - (`two_total`-`two_scored`) - (`one_total`-`one_scored`) - (`three_total`-`three_scored`) + `def_rebounds` + `off_rebounds` + `blocks` + `steals` + `assists` - `turnovers`) DESC, gametime ASC LIMIT 1") or die(mysql_error());
if (mysql_num_rows($tiptop7) > 0) {
$topscores7 = mysql_result($tiptop7,0,"scored");
$topscorer7 = mysql_result($tiptop7,0,"player");
$name7 = mysql_result($tiptop7,0,"name");
$surname7 = mysql_result($tiptop7,0,"surname");
$topscored7 = mysql_result($tiptop7,0,"matchid");
}
?>
<h2><?=$langmark797?></h2><br/><table width="100%" cellspacing="0" cellpadding="1">
<tr><td><b><?=$langmark798?>:</b><hr/></td></tr>
<tr><td align="left"><?=$langmark840?>:</td><td align="right"><?=round($result1,1)?></td></tr>
<tr><td align="left"><?=$langmark841?>:</td><td align="right"><?=round($height,1)?> cm (<?=$usheight?> ft)</td></tr>
<tr><td align="left"><?=$langmark799?>:</td><td align="right"><?=round($weight,1)?> kg (<?=$usweight?> lb)</td></tr>
<tr><td align="left"><?=$langmark800?>:</td><td align="right"><?=number_format($result4)?> &euro;</td></tr>
<tr><td align="left"><?=$langmark801?>:</td><td align="right"><?=$result17?></td></tr>
<tr><td align="left"><?=$langmark802?>:</td><td align="right"><?=round($result5)?>%</td></tr>
<tr><td align="left"><?=$langmark803?>:</td><td align="right"><?=$experience_dspl?></td></tr>
<tr><td align="left"><?=$langmark804?>:</td><td align="right"><?=$workrate_dspl?></td></tr>
<tr><td align="left"><?=$langmark805?>:</td><td align="right"><?=$slika?></td></tr>
<tr><td><br/><b><?=$langmark806?>:</b><hr></td></tr>
<tr><td align="left"><?=$langmark807?> <a href="prikaz.php?matchid=<?=$topscored?>"><?=$langmark814?></a>:</td><td align="right"><a href="player.php?playerid=<?=$topscorer?>"><?=$name," ",$surname?></a> - <?=$topscores?></td></tr>
<tr><td align="left"><?=$langmark808?> <a href="prikaz.php?matchid=<?=$topscored6?>"><?=$langmark814?></a>:</td><td align="right"><a href="player.php?playerid=<?=$topscorer6?>"><?=$name6," ",$surname6?></a> - <?=$topscores6?></td></tr>
<tr><td align="left"><?=$langmark809?> <a href="prikaz.php?matchid=<?=$topscored1?>"><?=$langmark814?></a>:</td><td align="right"><a href="player.php?playerid=<?=$topscorer1?>"><?=$name1," ",$surname1?></a> - <?=$topscores1?></td></tr>
<tr><td align="left"><?=$langmark810?> <a href="prikaz.php?matchid=<?=$topscored2?>"><?=$langmark814?></a>:</td><td align="right"><a href="player.php?playerid=<?=$topscorer2?>"><?=$name2," ",$surname2?></a> - <?=$topscores2?></td></tr>
<tr><td align="left"><?=$langmark811?> <a href="prikaz.php?matchid=<?=$topscored3?>"><?=$langmark814?></a>:</td><td align="right"><a href="player.php?playerid=<?=$topscorer3?>"><?=$name3," ",$surname3?></a> - <?=$topscores3?></td></tr>
<tr><td align="left"><?=$langmark812?> <a href="prikaz.php?matchid=<?=$topscored4?>"><?=$langmark814?></a>:</td><td align="right"><a href="player.php?playerid=<?=$topscorer4?>"><?=$name4," ",$surname4?></a> - <?=$topscores4?></td></tr>
<tr><td align="left"><?=$langmark813?> <a href="prikaz.php?matchid=<?=$topscored5?>"><?=$langmark814?></a>:</td><td align="right"><a href="player.php?playerid=<?=$topscorer5?>"><?=$name5," ",$surname5?></a> - <?=$topscores5?></td></tr>
<tr><td align="left"><?=$langmark1289?> <a href="prikaz.php?matchid=<?=$topscored7?>"><?=$langmark814?></a>:</td><td align="right"><a href="player.php?playerid=<?=$topscorer7?>"><?=$name7," ",$surname7?></a> - <?=$topscores7?></td></tr>
</table>
<?php
break;

CASE 'cstar':
$query = mysql_query("SELECT players.id AS id, players.name AS ime, players.surname AS priimek, players.age AS age, transfers.EV AS wage FROM players, transfers WHERE players.id=transfers.playerid AND transfers.playerclub LIKE 'Youth camp' AND transfers.bidingteam=$userid AND ev > 0 ORDER BY transfers.ev DESC LIMIT 30") or die(mysql_error());
$num = mysql_num_rows($query);
echo "<h2>Youth Camp stars by EV</h2><br/><table width=\"100%\" cellspacing=\"0\" cellpadding=\"1\">";
$i=0;
while ($i < $num) {
$id = mysql_result($query,$i,"id");
$name = mysql_result($query,$i,"ime");
$surname = mysql_result($query,$i,"priimek");
$age = mysql_result($query,$i,"age");
$wage = mysql_result($query,$i,"wage");
echo "<tr><td align=\"left\">",($i+1),". <a href=\"player.php?playerid=",$id,"\">",$name," ",$surname,"</a> (",$age,")</td><td align=\"right\">",number_format($wage)," &euro;</td></tr>";
$i++;
}
echo "</table>";
break;

CASE 'most':
$query = mysql_query("SELECT player, name, surname, players.club, COUNT( statid ) AS tekem FROM statistics, players, users, matches WHERE player = id AND users.club = team AND statistics.match = matchid AND matches.time > users.signed AND team =$trueclub GROUP BY `player` ORDER BY tekem DESC LIMIT 500") or die(mysql_error());
$num = mysql_num_rows($query);
echo "<h2>Players with most matches for your team</h2><br/><table width=\"100%\" cellspacing=\"0\" cellpadding=\"1\">";
$i=0;
while ($i < $num) {
$player = mysql_result($query,$i,"player");
$name = mysql_result($query,$i,"name");
$surname = mysql_result($query,$i,"surname");
$czablu = mysql_result($query,$i,"players.club");
$tekem = mysql_result($query,$i,"tekem");
if ($czablu==$trueclub) {$barv='#FFCC66';} else {$barv='white';}
echo "<tr bgcolor=\"",$barv,"\"><td align=\"left\" bgcolor=\"",$barv,"\">",($i+1),". <a href=\"player.php?playerid=",$player,"\">",$name," ",$surname,"</a>&nbsp;</td><td align=\"right\" bgcolor=\"",$barv,"\">",$tekem,"</td></tr>";
$i++;
}
echo "</table>";
break;

CASE 'matches':
echo "<h2>Best club matches</h2><br/><table width=\"100%\" cellspacing=\"0\" cellpadding=\"1\">";
/*
$query = mysql_query("SELECT matchid, home_name, away_name, `hreb` /5 + `hto` + ( 1000 - `h2p` -3 * `h3p` ) AS rating FROM matches WHERE hreb>0 AND time > '$signed' AND home_score >0 AND away_score >0 AND home_id = $trueclub UNION SELECT matchid, home_name, away_name, `areb` /5 + `ato` + ( 1000 - `a2p` -3 * `a3p` ) AS rating FROM matches WHERE hreb>0 AND time > '$signed' AND home_score >0 AND away_score >0 AND away_id =$trueclub ORDER BY rating DESC LIMIT 12") or die(mysql_error());
$num = mysql_num_rows($query);
?>
<tr><td><b>Best team ratings:</b><hr></td></tr>
<?php
$i=0;
while ($i < $num) {
$matchid = mysql_result($query,$i,"matchid");
$home_name = mysql_result($query,$i,"home_name");
$away_name = mysql_result($query,$i,"away_name");
$default = mysql_result($query,0,"rating");
$rating = mysql_result($query,$i,"rating");
$hehe = round(100*$rating/$default);
echo "<tr><td align=\"left\">",($i+1),". <a href=\"prikaz.php?matchid=",$matchid,"&action=team\">",$home_name," - ",$away_name,"</a></td><td align=\"right\">",$hehe,"%</td></tr>";
$i++;
}
*/
$query = mysql_query("SELECT matchid, home_name, away_name, hpg_rating+hsg_rating+hsf_rating+hpf_rating+hc_rating AS rating FROM matches WHERE time > '$signed' AND home_score > 0 AND away_score > 0 AND home_id=$trueclub UNION SELECT matchid, home_name, away_name,apg_rating+asg_rating+asf_rating+apf_rating+ac_rating AS rating FROM matches WHERE time > '$signed' AND home_score > 0 AND away_score > 0 AND away_id=$trueclub ORDER BY rating DESC LIMIT 30") or die(mysql_error());
$num = mysql_num_rows($query);
?>
<!--<tr><td colspan="3">&nbsp;</td></tr>
<tr><td><b>Best star ratings:</b><hr/></td></tr>-->
<?php
$i=0;
while ($i < $num) {
$matchid = mysql_result($query,$i,"matchid");
$home_name = mysql_result($query,$i,"home_name");
$away_name = mysql_result($query,$i,"away_name");
$default = mysql_result($query,0,"rating");
$rating = mysql_result($query,$i,"rating");
$hehe = round(100*$rating/$default);
echo "<tr><td align=\"left\">",($i+1),". <a href=\"prikaz.php?matchid=",$matchid,"\">",$home_name," - ",$away_name,"</a></td><td align=\"right\">",$hehe,"%</td></tr>";
$i++;
}
echo "</table>";
break;

CASE 'tcrowd':
$query = mysql_query("SELECT matchid, home_name, away_name, crowd1+crowd2+crowd3+crowd4 AS crowd FROM matches WHERE time > '$signed' AND type <5 AND crowd1 > 0 AND home_id=$trueclub ORDER BY crowd1+crowd2+crowd3+crowd4 DESC LIMIT 30") or die(mysql_error());
$num = mysql_num_rows($query);
echo "<h2>",$langmark817,"</h2><br/><table width=\"100%\" cellspacing=\"0\" cellpadding=\"1\">";
$i=0;
while ($i < $num) {
$matchid = mysql_result($query,$i,"matchid");
$home_name = mysql_result($query,$i,"home_name");
$away_name = mysql_result($query,$i,"away_name");
$crowd = mysql_result($query,$i,"crowd");
echo "<tr><td align=\"left\">",($i+1),". <a href=\"prikaz.php?matchid=",$matchid,"\">",$home_name," - ",$away_name,"</a></td><td align=\"right\">",$crowd,"</td></tr>";
$i++;
}
echo "<tr><td colspan=\"3\"><br/><i>Matches from international club competitions are excluded from the list.</i></td></tr></table>";
break;

CASE 'aguestb':
if (!$country) {$query = mysql_query("SELECT greceiver, name, country, count(gid) AS stevec FROM guestbook, users, teams WHERE greceiver=userid AND teamid=club AND supporter=1 GROUP BY greceiver ORDER BY stevec DESC LIMIT 30") or die(mysql_error());} else {$query = mysql_query("SELECT greceiver, name, country, count(gid) AS stevec FROM guestbook, users, teams WHERE greceiver=userid AND teamid=club AND supporter=1 AND country = '$country' GROUP BY greceiver ORDER BY stevec DESC LIMIT 30") or die(mysql_error());}
$num = mysql_num_rows($query);
echo "<h2>Most active guestbooks</h2><br/><table width=\"100%\" cellspacing=\"0\" cellpadding=\"1\">";
$i=0;
while ($i < $num) {
$greceiver = mysql_result($query,$i,"greceiver");
$name = mysql_result($query,$i,"name");
$country = mysql_result($query,$i,"country");
$stevec = mysql_result($query,$i,"stevec");
if ($greceiver==$userid) {$barv='#FFCC66';} else {$barv='white';}
echo "<tr bgcolor=\"",$barv,"\"><td align=\"left\" bgcolor=\"",$barv,"\"><img src=\"img/Flags/",$country,".png\" border=\"0\" alt=\"",$country,"\" title=\"",$country,"\"> ",($i+1),". <a href=\"club.php?clubid=",$greceiver,"\">",stripslashes($name),"</a></td><td align=\"right\" bgcolor=\"",$barv,"\">",$stevec,"</td></tr>";
$i++;
}
echo "</table>";
break;

CASE 'aguestbp':
if (!$country) {$query = mysql_query("SELECT gauthor, username, country, count(gid) AS stevec FROM guestbook, users, teams WHERE gauthor=userid AND teamid=club GROUP BY gauthor ORDER BY stevec DESC LIMIT 30") or die(mysql_error());} else {$query = mysql_query("SELECT gauthor, username, country, count(gid) AS stevec FROM guestbook, users, teams WHERE gauthor=userid AND teamid=club AND country = '$country' GROUP BY gauthor ORDER BY stevec DESC LIMIT 30") or die(mysql_error());}
$num = mysql_num_rows($query);
echo "<h2>Top guestbook posters</h2><br/><table width=\"100%\" cellspacing=\"0\" cellpadding=\"1\">";
$i=0;
while ($i < $num) {
$greceiver = mysql_result($query,$i,"gauthor");
$username = mysql_result($query,$i,"username");
$country = mysql_result($query,$i,"country");
$stevec = mysql_result($query,$i,"stevec");
if ($greceiver==$userid) {$barv='#FFCC66';} else {$barv='white';}
echo "<tr bgcolor=\"",$barv,"\"><td align=\"left\" bgcolor=\"",$barv,"\"><img src=\"img/Flags/",$country,".png\" border=\"0\" alt=\"",$country,"\" title=\"",$country,"\"> ",($i+1),". <a href=\"club.php?clubid=",$greceiver,"\">",stripslashes($username),"</a></td><td align=\"right\" bgcolor=\"",$barv,"\">",$stevec,"</td></tr>";
$i++;
}
echo "</table>";
break;

CASE 'albs':
if (!$country) {$query = mysql_query("SELECT league, name, country, count( id ) AS stevec FROM lb_comments, leagues WHERE active=1 AND league=leagueid GROUP BY league ORDER BY stevec DESC LIMIT 30") or die(mysql_error());} else {$query = mysql_query("SELECT league, name, country, count( id ) AS stevec FROM lb_comments, leagues WHERE active=1 AND league=leagueid AND country = '$country' GROUP BY league ORDER BY stevec DESC LIMIT 30") or die(mysql_error());}
$num = mysql_num_rows($query);
echo "<h2>Most active leagueboards</h2><br/><table width=\"100%\" cellspacing=\"0\" cellpadding=\"1\">";
$i=0;
while ($i < $num) {
$league = mysql_result($query,$i,"league");
$name = mysql_result($query,$i,"name");
$country = mysql_result($query,$i,"country");
$stevec = mysql_result($query,$i,"stevec");
echo "<tr><td align=\"left\"> ",($i+1),". <a href=\"leagues.php?leagueid=",$league,"\">",stripslashes($name),"</a>, <img src=\"img/Flags/",$country,".png\" border=\"0\" alt=\"",$country,"\" title=\"",$country,"\"></td><td align=\"right\">",$stevec,"</td></tr>";
$i++;
}
echo "</table>";
break;

CASE 'lbcomm':
if (!$country) {$query = mysql_query("SELECT author, users.username, country, count( id ) AS stevec FROM lb_comments, users, teams WHERE author = userid AND teamid = club GROUP BY author ORDER BY stevec DESC LIMIT 30") or die(mysql_error());} else {$query = mysql_query("SELECT author, users.username, country, count( id ) AS stevec FROM lb_comments, users, teams WHERE author = userid AND teamid = club AND country = '$country' GROUP BY author ORDER BY stevec DESC LIMIT 30") or die(mysql_error());}
$num = mysql_num_rows($query);
echo "<h2>Top leagueboard posters</h2><br/><table width=\"100%\" cellspacing=\"0\" cellpadding=\"1\">";
$i=0;
while ($i < $num) {
$greceiver = mysql_result($query,$i,"author");
$username = mysql_result($query,$i,"users.username");
$country = mysql_result($query,$i,"country");
$stevec = mysql_result($query,$i,"stevec");
if ($greceiver==$userid) {$barv='#FFCC66';} else {$barv='white';}
echo "<tr bgcolor=\"",$barv,"\"><td align=\"left\" bgcolor=\"",$barv,"\"><img src=\"img/Flags/",$country,".png\" border=\"0\" alt=\"",$country,"\" title=\"",$country,"\"> ",($i+1),". <a href=\"club.php?clubid=",$greceiver,"\">",stripslashes($username),"</a></td><td align=\"right\" bgcolor=\"",$barv,"\">",$stevec,"</td></tr>";
$i++;
}
echo "</table>";
break;
}
?>
</td>
<td class="border" width="36%">
<form method="post" action="statistics.php?stat=<?=$stat?>" style="margin: 0" name="tijuk">
<select name="country" class="inputreg" OnChange="location.href='statistics.php?stat=<?=$stat?>&country='+tijuk.country.options[selectedIndex].value" <?php if($defpick==44){?>disabled="disabled"<?php }?>>
<?php if($defpick==44){?><option value="">Global stats only</option><?php } else {?><option value="">Global stats</option><?php }?>
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
<input type="submit" value="&nbsp;&raquo;" name="" class="buttonreg">
<?php
if ($stat=='train' OR $stat=='starat' OR $stat=='wage'){
?>
<select name="agea" class="inputreg">
<option value="">all ages</option>
<option name="16" value="16" <?php if($agea==16){echo "selected";}?>>age 16</option>
<option name="17" value="17" <?php if($agea==17){echo "selected";}?>>age 17</option>
<option name="18" value="18" <?php if($agea==18){echo "selected";}?>>age 18</option>
<option name="19" value="19" <?php if($agea==19){echo "selected";}?>>age 19</option>
<option name="20" value="20" <?php if($agea==20){echo "selected";}?>>age 20</option>
<option name="21" value="21" <?php if($agea==21){echo "selected";}?>>age 21</option>
<option name="22" value="22" <?php if($agea==22){echo "selected";}?>>age 22</option>
<option name="23" value="23" <?php if($agea==23){echo "selected";}?>>age 23</option>
<option name="24" value="24" <?php if($agea==24){echo "selected";}?>>age 24</option>
<option name="25" value="25" <?php if($agea==25){echo "selected";}?>>age 25</option>
<option name="26" value="26" <?php if($agea==26){echo "selected";}?>>age 26</option>
<option name="27" value="27" <?php if($agea==27){echo "selected";}?>>age 27</option>
<option name="28" value="28" <?php if($agea==28){echo "selected";}?>>age 28</option>
<option name="29" value="29" <?php if($agea==29){echo "selected";}?>>age 29</option>
<option name="30" value="30" <?php if($agea==30){echo "selected";}?>>age 30+</option>
</select>
<input type="submit" value="&nbsp;&raquo;" name="" class="buttonreg">
<?php }?>
</form>

<h2><?=$langmark818?></h2>
<br/><b><?=$langmark822?></b><br/>
<?php if ($stat=='players') {echo "<b>",$langmark034,"</b>";} else {?><a href="statistics.php?stat=players"><?=$langmark034?></a><?php }?><br/>
<?php if ($stat=='most') {echo "<b>Most matches</b>";} else {?><a href="statistics.php?stat=most">Most matches</a><?php }?><br/>
<?php if ($stat=='cstar') {echo "<b>",$langmark838," </b>";} else {?><a href="statistics.php?stat=cstar"><?=$langmark838?></a><?php }?><br/>
<?php if ($stat=='tcrowd') {echo "<b>",$langmark839,"</b>";} else {?><a href="statistics.php?stat=tcrowd"><?=$langmark839?></a><?php }?><br/>
<?php if ($stat=='matches') {echo "<b>",$langmark043,"</b>";} else {?><a href="statistics.php?stat=matches"><?=$langmark043?></a><?php }?><br/>
<br/><b><?=$langmark819;?></b><br/>
<?php if ($stat=='teams') {echo "<b>",$langmark823,"</b>";} else {?><a href="statistics.php?stat=teams&country=<?=$country44?>"><?=$langmark823?></a><?php } ?><br/>
<?php if ($stat=='cwins') {echo "<b>Wins in a row</b>";} else {?><a href="statistics.php?stat=cwins&country=<?=$country44?>">Wins in a row</a><?php } ?><br/>
<?php if ($stat=='oldest') {echo "<b>Oldest</b>";} else {?><a href="statistics.php?stat=oldest&country=<?=$country44?>">Oldest</a><?php } ?><br/>
<?php if ($stat=='bti') {echo "<b>",$langmark868,"</b>";} else {?><a href="statistics.php?stat=bti&country=<?=$country44?>"><?=$langmark868?></a><?php } ?><br/>
<?php if ($stat=='money') {echo "<b>",$langmark824,"</b>";} else {?><a href="statistics.php?stat=money&country=<?=$country44?>"><?=$langmark824?></a><?php } ?><br/>
<?php if ($stat=='fans') {echo "<b>",$langmark826,"</b>";} else {?><a href="statistics.php?stat=fans&country=<?=$country44?>"><?=$langmark826?></a><?php } ?><br/>
<?php if ($stat=='arena') {echo "<b>",$langmark825,"</b>";} else {?><a href="statistics.php?stat=arena&country=<?=$country44?>"><?=$langmark825?></a><?php } ?><br/>
<?php if ($stat=='cheer') {echo "<b>",$langmark158,"</b>";} else {?><a href="statistics.php?stat=cheer&country=<?=$country44?>"><?=$langmark158?></a><?php } ?><br/>
<br/><b><?=$langmark820?></b><br/>
<?php  if ($stat=='starat') {echo "<b>Star ratings</b>";} else {?><a href="statistics.php?stat=starat&country=<?=$country44?>">Star ratings</a><?php }?><br/>
<?php if ($stat=='train') {echo "<b>",$langmark833,"</b>";} else {?><a href="statistics.php?stat=train&country=<?=$country44?>"><?=$langmark833?></a><?php }?><br/>
<?php  if ($stat=='wage') {echo "<b>",$langmark118,"</b>";} else {?><a href="statistics.php?stat=wage&country=<?=$country44?>"><?=$langmark118?></a><?php }?><br/>
<?php if ($stat=='height') {echo "<b>",$langmark116,"</b>";} else {?><a href="statistics.php?stat=height&country=<?=$country44?>"><?=$langmark116?></a><?php } ?><br/>
<?php if ($stat=='camp') {echo "<b>",$langmark1522,"</b>";} else {?><a href="statistics.php?stat=camp&country=<?=$country44?>"><?=$langmark1522?></a><?php } ?><br/>
<?php if ($stat=='scout') {echo "<b>",$langmark1523,"</b>";} else {?><a href="statistics.php?stat=scout&country=<?=$country44?>"><?=$langmark1523?></a><?php } ?><br/>
<?php if ($stat=='bpi') {echo "<b>",$langmark868,"</b>";} else {?><a href="statistics.php?stat=bpi&country=<?=$country44?>"><?=$langmark868?></a><?php } ?><br/>
<!--
<?php  if ($stat=='ev') {echo "<b>",$langmark411,"</b>";} else {?><a href="statistics.php?stat=ev&country=<?=$country44?>"><?=$langmark411?></a><?php } ?><br/>
-->
<br/><b><?=strtoupper($langmark257)?></b><br/>
<?php if ($stat=='gpop') {echo "<b>",$langmark836,"</b>";} else {?><a href="statistics.php?stat=gpop&country=<?=$country44?>"><?=$langmark836?></a><?php } ?><br/>
<?php if ($stat=='bmpop') {echo "<b>",$langmark837,"</b>";} else {?><a href="statistics.php?stat=bmpop&country=<?=$country44?>"><?=$langmark837?></a><?php } ?><br/>
<?php if ($stat=='tpc') {echo "<b>Top paid coaches</b>";} else {?><a href="statistics.php?stat=tpc&country=<?=$country44?>">Top paid coaches</a><?php }?><br/>
<br/><b><?=strtoupper($langmark1218)?></b><br/>
<?php if ($stat=='aguestb') {echo "<b>".$langmark869,"</b>";} else {?><a href="statistics.php?stat=aguestb&country=<?=$country44?>"><?=$langmark869?></a><?php }?><br/>
<?php if ($stat=='aguestbp') {echo "<b>Guestbook posters</b>";} else {?><a href="statistics.php?stat=aguestbp&country=<?=$country44?>">Guestbook posters</a><?php }?><br/>
<?php if ($stat=='albs') {echo "<b>Leagueboards</b>";} else {?><a href="statistics.php?stat=albs&country=<?=$country44?>">Leagueboards</a><?php }?><br/>
<?php if ($stat=='lbcomm') {echo "<b>Leagueboard posters</b>";} else {?><a href="statistics.php?stat=lbcomm&country=<?=$country44?>">Leagueboard posters</a><?php }?><br/>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>