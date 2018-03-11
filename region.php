<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$comparepasss = mysql_query("SELECT lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($comparepasss)==1) {$lang = mysql_result ($comparepasss,0,"lang");} else {die(include 'basketsim.php');}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2><?=$langmark1497?></h2>

<table border="0" cellspacing="10" cellpadding="10" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="55%">
<?php
$region = $_GET["region"];
$last_active = date("Y-m-d H:i:s");
$splitdatetime = explode(" ", $last_active); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$expireminus = date("Y-m-d H:i:s", mktime($dbhour,$dbmin-30,$dbsec,$dbmonth,$dbday,$dbyear));
$userson = mysql_query("SELECT users.userid AS uporabniki, users.username AS imena, users.supporter AS suporterji FROM users, teams WHERE users.club = teams.teamid AND users.is_online=1 AND users.last_active > '$expireminus' AND teams.city LIKE '$region'") or die(mysql_error());
$num=mysql_num_rows($userson);
if ($show=='online') {
if ($num > 0) {echo "<h2>",$langmark1422,"</h2>";}
$n=0;
while ($n < $num) {
$userjid = mysql_result($userson,$n,"uporabniki");
$username = mysql_result($userson,$n,"imena");
$suport = mysql_result($userson,$n,"suporterji");
echo "&nbsp;<div style= \"border: 0px solid #fff; padding: 0px; margin: 0px; height: 4px\"><a href=\"club.php?clubid=",$userjid,"\">",$username,"</a>";
if ($suport==1) {echo "&nbsp;<a href=\"supporter.php\"><img src=\"img/bsupn.png\" border=\"0\" alt=\"",$langmark317,"\" title=\"",$langmark317,"\" style= \"border: 0px solid #fff; padding: 0px; margin: 0px; height: 11px; width: 11px;\"></a>&nbsp;";}
echo "</div>";
$n++;
}
echo "<br/>";
}

if ($show<>'online') {echo "<h2>",$langmark1423,"</h2><br/>";}
echo "<table border=\"0\" width=\"100%\" cellspacing=\"1\" cellpadding=\"0\" border=\"0\">";
$disp = mysql_query("SELECT teams.teamid AS teamid, teams.name AS name, teams.status AS status, competition.position AS position, leagues.leagueid AS leagueid, leagues.name AS lname, teams.country AS country FROM teams, leagues, competition WHERE teams.teamid=competition.teamid AND competition.leagueid=leagues.leagueid AND teams.city LIKE '$region' AND competition.season='$default_season' ORDER BY leagues.level ASC, competition.position ASC, competition.win DESC, competition.difference DESC, competition.for_") or die(mysql_error());
while ($d=mysql_fetch_array($disp)){
$e=$e+1;
$status=$d["status"];
$name=$d['name'];
$teamid=$d["teamid"];
$leagueid=$d["leagueid"];
$position=$d["position"];
$lname=$d['lname'];
$country=$d['country'];
if ($e==1) {$discountry=$country;}
if ($status<3) {
$club=mysql_query("SELECT `userid`, `supporter` FROM `users` WHERE `club`='$teamid'") or die(mysql_error()); $clubid=mysql_result($club,0,"userid"); $vv=$vv+1;
if (mysql_result($club,0,"supporter")==1) {$sup=$sup+1;}
}
SWITCH (TRUE) {
CASE ($status<2 && $e<11 && $show<>'online'): echo "<tr><td>",$e,". <a href=\"club.php?clubid=",$clubid,"\">",stripslashes($name),"</a></td><td align=\"right\"> # ",$position," in <a href=\"leagues.php?leagueid=",$leagueid,"\">",$lname,"</a></td></tr>"; break;
CASE ($status==3 && $e<11 && $show<>'online'): echo "<tr><td>",$e,". <a href=\"team.php?clubid=",$teamid,"\">",stripslashes($name),"</a></td><td align=\"right\"> # ",$position," in <a href=\"leagues.php?leagueid=",$leagueid,"\">",$lname,"</a></td></tr>"; break;
}
}
?>
</table>

</td>
<td class="border" width="45%">
<?php
if (empty($e)) {die("$langmark1424</td></tr></table><img src=\"img/bbs.jpg\" alt=\"\" border=\"0\">");}
?>
<h2><?=$region?></h2><br/>
<table border="0" width="100%" cellspacing="1" cellpadding="0" border="0">
<tr><td><b><?=$langmark478?>:</b></td><td align="right"><a href="league.php?country=<?=$discountry?>"><?=$discountry?></a></td></tr>
<tr><td><b><?=$langmark1425?>:</b></td><td align="right"><?=mysql_num_rows($disp)?></td></tr>
<tr><td><b><?=$langmark1426?>:</b></td><td align="right"><?=$vv?></td></tr>
<?php
if ((100*$sup/($vv+0.001)) < 0.5) {$att=$langmark100; $lvl=2; $gg=0.5;}
if ((100*$sup/($vv+0.001)) == 0) {$att=$langmark1427; $lvl=1;}
if ((100*$sup/($vv+0.001)) > 0.5) {$att=$langmark101; $lvl=3; $gg=0.5;}
if ((100*$sup/($vv+0.001)) > 1) {$att=$langmark102; $lvl=4; $gg=1;}
if ((100*$sup/($vv+0.001)) > 2) {$att=$langmark103; $lvl=5; $gg=2;}
if ((100*$sup/($vv+0.001)) > 3) {$att=$langmark104; $lvl=6; $gg=3;}
if ((100*$sup/($vv+0.001)) > 5) {$att=$langmark105; $lvl=7; $gg=5;}
if ((100*$sup/($vv+0.001)) > 10) {$att=$langmark106; $lvl=8; $gg=10;}
if ((100*$sup/($vv+0.001)) > 15) {$att=$langmark107; $lvl=9; $gg=15;}
if ((100*$sup/($vv+0.001)) > 20) {$att=$langmark108; $lvl=10; $gg=20;}
if ((100*$sup/($vv+0.001)) > 25) {$att=$langmark109; $lvl=11; $gg=25;}
if ((100*$sup/($vv+0.001)) > 30) {$att=$langmark110; $lvl=12; $gg=30;}
?>
<tr><td><b><?=$langmark031?>:</b></td><td align="right"><a href="region.php?region=<?=$region?>&show=attitude"><?=$att?></a></td></tr>
</table>
<?php if ($show<>'online' && $num>0 && $show<>'attitude') {echo "<br/><a href=\"region.php?region=",$region,"&show=online\">",$langmark1428," (",$num,")</a>";}
elseif ($show=='online') {echo "<br/><a href=\"region.php?region=",$region,"\">",$langmark1429,"</a>";}?>

<?php if($show=='attitude' && $lvl>2){?><br/> [<a class="greenhilite" href="region.php?region=<?=$region?>">-</a>] <i><?=$region," ",$langmark1430," ",$lvl," ",$langmark1431," ",$langmark1432," ",$gg?>% <?=$langmark1434?></i><?php }?>
<?php if($show=='attitude' && $lvl==2){?><br/> [<a class="greenhilite" href="region.php?region=<?=$region?>">-</a>] <i><?=$region," ",$langmark1430," ",$lvl," ",$langmark1431," ",$langmark1433," ",$gg?>% <?=$langmark1434?></i><?php }?>
<?php if($show=='attitude' && $lvl==1){?><br/> [<a class="greenhilite" href="region.php?region=<?=$region?>">-</a>] <i><?=$region," ",$langmark1430," ",$lvl," ",$langmark1431?> <?=$langmark1435?></i><?php
}

/*
if ($region=='Thessalia' OR $region=='Peloponnisos') {
echo "<br/><br/><hr/><i><a href=\"http://en.wikipedia.org/wiki/",$region,"\" target=\"_new\">",$region,"</a> is hosting the current <a href=\"nationalteams.php\">World Cup</a></i><hr/>";
}
if ($region=='Kriti') {
echo "<br/><br/><hr/><i><a href=\"http://en.wikipedia.org/wiki/Crete\" target=\"_new\">Kriti</a> is hosting the current <a href=\"nationalteams.php\">World Cup</a></i><hr/>";
}
if ($region=='Ipeiros') {
echo "<br/><br/><hr/><i><a href=\"http://en.wikipedia.org/wiki/Epirus_(region)\" target=\"_new\">Ipeiros</a> is hosting the current <a href=\"nationalteams.php\">World Cup</a></i><hr/>";
}
if ($region=='Attiki') {
echo "<br/><br/><hr/><i><a href=\"http://en.wikipedia.org/wiki/Attica_(region)\" target=\"_new\">Attiki</a> is hosting the current <a href=\"nationalteams.php\">World Cup</a></i><hr/>";
}
if ($region=='Sterea Ellas') {
echo "<br/><br/><hr/><i><a href=\"http://en.wikipedia.org/wiki/Central_Greece\" target=\"_new\">Sterea Ellas</a> is hosting the current <a href=\"nationalteams.php\">World Cup</a></i><hr/>";
}
if ($region=='Aigaio') {
echo "<br/><br/><hr/><i><a href=\"http://en.wikipedia.org/wiki/Aegean_Islands\" target=\"_new\">Aigaio</a> is hosting the current <a href=\"nationalteams.php\">U19 World Cup</a></i><hr/>";
}
if ($region=='Makedonia') {
echo "<br/><br/><hr/><i><a href=\"http://en.wikipedia.org/wiki/Macedonia_(Greece)\" target=\"_new\">Makedonia</a> is hosting the current <a href=\"nationalteams.php\">World Cup</a></i><hr/>";
}
*/
?>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>