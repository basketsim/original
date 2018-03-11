<?php
$get_team=$_GET['clubid'];
$action=$_GET["action"];
if (!is_numeric($get_team)) {die(include 'index.php');}

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

//verification
$queryuni = mysql_query("SELECT userid FROM users WHERE club ='$get_team' LIMIT 1") or die(mysql_error());
$verify = mysql_fetch_row($queryuni);
if ($verify){die (include 'index.php');}

$comparepasss = mysql_query("SELECT lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($comparepasss)==1) {$lang = mysql_result ($comparepasss,0);} else {die(include 'basketsim.php');}

$result = mysql_query("SELECT teams.name AS name, teams.city AS city, teams.country AS country, arena.arenaname AS arenam, arena.fans AS nofans FROM teams, arena WHERE teams.teamid = arena.teamid AND teams.teamid ='$get_team'") or die(mysql_error());
if (mysql_num_rows($result) == 0){die (include 'index.php');}
$name=mysql_result($result,0,"name");
$city=mysql_result($result,0,"city");
$country=mysql_result($result,0,"country");
$arenam=mysql_result($result,0,"arenam");
$nofans=mysql_result($result,0,"nofans");

$result12 = mysql_query("SELECT leagues.leagueid AS leagueid, leagues.name AS name1, competition.position AS position FROM competition, leagues WHERE competition.leagueid = leagues.leagueid AND competition.season ='$default_season' AND competition.teamid ='$get_team' AND leagues.active=1 LIMIT 1") or die(mysql_error());
if (mysql_num_rows($result12)>0){
$whleague = mysql_result($result12,0,"leagueid");
$uvrscen = mysql_result($result12,0,"position");
$leaguenam = mysql_result($result12,0,"name1");
} else {die (include 'index.php');}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');

SWITCH ($country) {
CASE 'Argentina': $localname='Argentina'; break;
CASE 'Australia': $localname='Australia'; break;
CASE 'Belgium': $localname='Belgium'; break;
CASE 'Bosnia': $localname='Bosna i Hercegovina'; break;
CASE 'Brazil': $localname='Brasil'; break;
CASE 'Bulgaria': $localname='Bulgaria'; break;
CASE 'Canada': $localname='Canada'; break;
CASE 'Chile': $localname='Chile'; break;
CASE 'China': $localname='China'; break;
CASE 'Colombia': $localname='Colombia'; break;
CASE 'Montenegro': $localname='Crna Gora'; break;
CASE 'Cyprus': $localname='Cyprus'; break;
CASE 'Czech Republic': $localname='&#268;esk&aacute; republika'; break;
CASE 'Denmark': $localname='Danmark'; break;
CASE 'Germany': $localname='Deutschland'; break;
CASE 'Estonia': $localname='Eesti'; break;
CASE 'Egypt': $localname='Egypt'; break;
CASE 'Spain': $localname='Espa&#241;a'; break;
CASE 'France': $localname='France'; break;
CASE 'Greece': $localname='Hellas'; break;
CASE 'Hong Kong': $localname='Hong Kong'; break;
CASE 'Croatia': $localname='Hrvatska'; break;
CASE 'Indonesia': $localname='Indonesia'; break;
CASE 'India': $localname='India'; break;
CASE 'Ireland': $localname='Ireland'; break;
CASE 'Israel': $localname='Israel'; break;
CASE 'Italy': $localname='Italia'; break;
CASE 'Latvia': $localname='Latvija'; break;
CASE 'Lithuania': $localname='Lietuva'; break;
CASE 'Hungary': $localname='Magyarorsz&aacute;g'; break;
CASE 'FYR Macedonia': $localname='Makedonija'; break;
CASE 'Malaysia': $localname='Malaysia'; break;
CASE 'Malta': $localname='Malta'; break;
CASE 'Mexico': $localname='M&eacute;xico'; break;
CASE 'Austria': $localname='&Ouml;sterreich'; break;
CASE 'Netherlands': $localname='Nederland'; break;
CASE 'New Zealand': $localname='New Zealand'; break;
CASE 'Norway': $localname='Norge'; break;
CASE 'Peru': $localname='Per&uacute;'; break;
CASE 'Philippines': $localname='Pilipinas'; break;
CASE 'Poland': $localname='Polska'; break;
CASE 'Portugal': $localname='Portugal'; break;
CASE 'Thailand': $localname='Prathet Thai'; break;
CASE 'Romania': $localname='Rom&#226;nia'; break;
CASE 'Russia': $localname='Rossiya'; break;
CASE 'Switzerland': $localname='Schweiz'; break;
CASE 'Albania': $localname='Shqiperia'; break;
CASE 'Slovenia': $localname='Slovenija'; break;
CASE 'Slovakia': $localname='Slovensko'; break;
CASE 'South Korea': $localname='South Korea'; break;
CASE 'Serbia': $localname='Srbija'; break;
CASE 'Finland': $localname='Suomi'; break;
CASE 'Sweden': $localname='Sverige'; break;
CASE 'Tunisia': $localname='T&#363;nis'; break;
CASE 'Turkey': $localname='T&uuml;rkiye'; break;
CASE 'Ukraine': $localname='Ukrayina'; break;
CASE 'United Kingdom': $localname='United Kingdom'; break;
CASE 'Uruguay': $localname='Uruguay'; break;
CASE 'USA': $localname='USA'; break;
CASE 'Venezuela': $localname='Venezuela'; break;
CASE 'Japan': $localname='Nippon'; break;
CASE 'Georgia': $localname='Sakartvelo'; break;
CASE 'Belarus': $localname='Belarus'; break;
CASE 'Puerto Rico': $localname='Puerto Rico'; break;
}
?>

<div id="main">
<h2>Basketsim >> <?=stripslashes($name)?></h2>

<!-- OBMOCJE TABEL -->

<table border="0" cellpading="0" cellspacing="10" width="100%">
<tr>
<td class="border" width="60%" valign="top" bgcolor="#ffffff">

<!-- majica in ime kluba -->

<table border="0" cellpadding="4" cellspacing="4" width="100%">
<tr><td valign="top">

<!-- majica in ime kluba -->

<table>
<tr><td width="45">
<img src="img/shirts/white.gif" alt="" border="0"></td>
<td><h3><?=stripslashes($name)?></h3></td></tr>
</table>

<!-- konec majice in imena kluba -->

<table border="0" cellpadding="5" cellspacing="0">
<tr><td valign="top">

<!-- podatki o klubu -->

<br/><table border="0" cellpadding="1" cellspacing="0" width="100%">
<tr valign="top"><td width="50"><?=$langmark637?> </td><td><b><?=$get_team?></b></td></tr>
<tr valign="top"><td><?=$langmark476?> </td><td><b><a href="cheerleaders.php?squad=<?=$get_team?>"><?=stripslashes($arenam)?></a></b></td></tr>
<tr valign="top"><td><?=$langmark1275?> </td><td><b><a href="region.php?region=<?=$city?>"><?=$city?></a></b></td></tr>
<tr valign="top"><td><?=$langmark478?> </td><td><a href="league.php?country=<?=$country?>"><b><?=$localname?></b></a></td></tr>
<tr valign="top"><td><?=$langmark479?> </td><td># <?=$uvrscen?> in <b><a href="leagues.php?leagueid=<?=$whleague?>"><?=$leaguenam?></a></b></td></tr>	
<tr valign="top"><td><?=$langmark480?> </td><td><b><?=$nofans?></b></td></tr>
</table>

<!-- konec podatkov o klubu -->

</td></tr></table>

<!-- konec zgornjih tabel -->

<br/><i><?=$langmark1038?></i><br/>

<table cellspacing="0" cellpadding="0" border="0">

<tr><td colspan="2"><?php if ($action=='more') {echo "<b>",$langmark687,"</b>: (<a href=\"team.php?clubid=",$get_team,"\">",$langmark230,"</a>)";} else {echo "<b>",$langmark1039,"</b>: (<a href=\"team.php?clubid=",$get_team,"&action=more\">",$langmark231,"</a>)";}?></b>

<?php
$fix = mysql_query("SELECT matchid, crowd1 FROM matches WHERE home_id=$get_team AND home_score=0 UNION SELECT matchid, crowd1 FROM matches WHERE away_id=$get_team AND away_score =0 ORDER BY matchid ASC LIMIT 1") or die(mysql_error());
while ($p = mysql_fetch_array($fix)) {
$matchid1 = $p[matchid];
$czz = $p[crowd1];
if ($czz==0) {echo "(<a href=\"prikaz.php?matchid=",$matchid1,"\">preview next</a>)";} else {echo "(<a href=\"prikaz.php?matchid=",$matchid1,"\">LIVE</a>)";}
}
?>
</td></tr>
<?php
$endatum = date("Y-m-d H:i:s");
$tdatetime = explode(" ",$endatum); $ffdate = $tdatetime[0]; $fftime = $tdatetime[1];
$tdate = explode("-", $ffdate); $ffyear = $tdate[0]; $ffmonth = $tdate[1]; $ffday = $tdate[2];
$ttime = explode(":", $fftime); $ffhour = $ttime[0]; $ffmin = $ttime[1]; $ffsec = $ttime[2];
$ffdate = date("Y-m-d H:i:s", mktime($ffhour,$ffmin,$ffsec,$ffmonth,$ffday-40,$ffyear));
$kver = "SELECT matchid, home_id, away_id, home_name, away_name, home_score, away_score, time FROM matches WHERE home_id=$get_team AND time > '$ffdate' AND time < '$endatum' AND home_score > 0 UNION SELECT matchid, home_id, away_id, home_name, away_name, home_score, away_score, time FROM matches WHERE away_id=$get_team AND time > '$ffdate' AND time < '$endatum' AND home_score > 0 ORDER BY time DESC LIMIT 10";
$zadnja = mysql_query($kver) or die(mysql_error());
if (!mysql_num_rows($zadnja)) {echo "<i><?=$langmark1040?></i>";}
elseif ($action != 'more') {
$matchid=mysql_result($zadnja,0,"matchid");
$home_id=mysql_result($zadnja,0,"home_id");
$away_id=mysql_result($zadnja,0,"away_id");
$home_name=mysql_result($zadnja,0,"home_name");
$away_name=mysql_result($zadnja,0,"away_name");
$home_score=mysql_result($zadnja,0,"home_score");
$away_score=mysql_result($zadnja,0,"away_score");
$casko=mysql_result($zadnja,0,"time");
$trscore=$home_score."&nbsp;:&nbsp;".$away_score;
echo "<tr><td>",$home_name," - ",$away_name;?>&nbsp;</td>&nbsp;<td align="right">&nbsp;
<?php if ($home_score+$away_score==21 && $casko < '2009-01-11 22:30:01') {?><a href="prikaz_wo.php?matchid=<?=$matchid?>"><?php } else {?><a href="prikaz.php?matchid=<?=$matchid?>"><?php }?>
<?php
echo $trscore,"</a>&nbsp;";
if ($home_score >= $away_score AND $home_score > 0 AND $home_id == $get_team) {echo "</td><td><font color=\"green\"><b>",$langmark735,"</b>";}
if ($home_score < $away_score AND $home_id == $get_team) {echo "</td><td><font color=\"red\"><b>",$langmark736,"</b>";}
if ($home_score > $away_score AND $away_id == $get_team) {echo "</td><td><font color=\"red\"><b>",$langmark736,"</b>";}
if ($home_score <= $away_score AND $home_score > 0 AND $away_id == $get_team) {echo "</td><td><font color=\"green\"><b>",$langmark735,"</b>";}
echo "</td></tr>";
} else {
$te=0;
while ($te < mysql_num_rows($zadnja)) {
$matchid=mysql_result($zadnja,$te,"matchid");
$home_id=mysql_result($zadnja,$te,"home_id");
$away_id=mysql_result($zadnja,$te,"away_id");
$home_name=mysql_result($zadnja,$te,"home_name");
$away_name=mysql_result($zadnja,$te,"away_name");
$home_score=mysql_result($zadnja,$te,"home_score");
$away_score=mysql_result($zadnja,$te,"away_score");
$casko=mysql_result($zadnja,$te,"time");
if ($home_score==0) {$trscore='LIVE';} else {$trscore=$home_score."&nbsp;:&nbsp;".$away_score;}
echo "<tr><td>",$home_name," - ",$away_name;?>&nbsp;</td>&nbsp;<td align="right">&nbsp;
<?php if ($home_score+$away_score==21 && $casko < '2009-01-11 22:30:01') {?><a href="prikaz_wo.php?matchid=<?=$matchid?>"><?php } else {?><a href="prikaz.php?matchid=<?=$matchid?>"><?php }?>
<?php echo $trscore,"</a>&nbsp;";
if ($home_score >= $away_score AND $home_score > 0 AND $home_id == $get_team) {echo "</td><td><font color=\"green\"><b>&nbsp;",$langmark735,"</b>";}
if ($home_score < $away_score AND $home_id == $get_team) {echo "</td><td><font color=\"red\"><b>&nbsp;",$langmark736,"</b>";}
if ($home_score > $away_score AND $away_id == $get_team) {echo "</td><td><font color=\"red\"><b>&nbsp;",$langmark736,"</b>";}
if ($home_score <= $away_score AND $home_score > 0 AND $away_id == $get_team) {echo "</td><td><font color=\"green\"><b>&nbsp;",$langmark735,"</b>";}
echo "</td></tr>";
$te++;
}
}
?>
</table>
</td>
</tr>
</table>

<!-- konec celotnega levega okvirja na strani kluba -->

</td>

<td class="border" width="40%" valign="top" bgcolor="#ffffff">

<h2><?=$langmark034?></h2><br/>

<?php
$result44 = mysql_query("SELECT id, name, surname, country, isonsale, injury, ntplayer FROM players WHERE club ='$get_team' ORDER BY wage DESC") or die(mysql_error());
$m=0;
while ($m < mysql_num_rows($result44)) {
$id=mysql_result($result44,$m,"id");
$name=mysql_result($result44,$m,"name");
$surname=mysql_result($result44,$m,"surname");
$pcountry=mysql_result($result44,$m,"country");
$isonsale=mysql_result($result44,$m,"isonsale");
$injury_time=mysql_result($result44,$m,"injury");
$ntplayer=mysql_result($result44,$m,"ntplayer");
//poskodbe
switch (TRUE) {
CASE ($injury_time ==0):
$prikaz_poskodbe = '&nbsp;';
break;
CASE ($injury_time >0 AND $injury_time < 1): $prikaz_poskodbe = '&nbsp;<font color=green><b>+1</b></font>'; break;
CASE ($injury_time >=1 AND $injury_time < 2): $prikaz_poskodbe = '&nbsp;<font color=red><b>+1</b></font>'; break;
CASE ($injury_time >=2 AND $injury_time < 3): $prikaz_poskodbe = '&nbsp;<font color=red><b>+2</b></font>'; break;
CASE ($injury_time >=3 AND $injury_time < 4): $prikaz_poskodbe = '&nbsp;<font color=red><b>+3</b></font>'; break;
CASE ($injury_time >=4 AND $injury_time < 5): $prikaz_poskodbe = '&nbsp;<font color=red><b>+4</b></font>'; break;
CASE ($injury_time >=5 AND $injury_time < 6): $prikaz_poskodbe = '&nbsp;<font color=red><b>+5</b></font>'; break;
CASE ($injury_time >=6 AND $injury_time < 7): $prikaz_poskodbe = '&nbsp;<font color=red><b>+6</b></font>'; break;
CASE ($injury_time >=7 AND $injury_time < 8): $prikaz_poskodbe = '&nbsp;<font color=red><b>+7</b></font>'; break;
CASE ($injury_time >=8 AND $injury_time < 9): $prikaz_poskodbe = '&nbsp;<font color=red><b>+8</b></font>'; break;
CASE ($injury_time >=9): $prikaz_poskodbe = '&nbsp;<font color=red><b>+9</b></font>'; break;
}

echo "<b><a href=\"player.php?playerid=",$id,"\">",$name," ",$surname,"</a></b>";
if ($ntplayer>0) {echo "&nbsp;<img src=\"img/Flags/",$pcountry,".png\" border=\"0\" width=\"16\" height=\"11\" alt=\"",$langmark378," ",$pcountry,"\" title=\"",$langmark378," ",$pcountry,"\">";}
echo "<b>",$prikaz_poskodbe,"</b>";
if ($isonsale == 1) {echo "&nbsp;<img src=\"img/for_sale.jpg\" alt=\"",$langmark936,"\" title=\"",$langmark936,"\">";}
echo "<br/>";
$m++;
}
if ($m == 1) {echo "<br/>",$langmark1041;}
elseif ($m == 2) {echo "<br/>",$langmark1042;}
else {echo "<br/>",$m," ",$langmark1043;}
?>
</td>
</tr>
</table>
</div>
</div>
</body>
</html>