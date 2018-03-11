<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$comparep = mysql_query("SELECT club, supporter, lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($comparep)){
$trueclub = mysql_result($comparep,0,"club");
$is_supporter = mysql_result($comparep,0,"supporter");
$lang = mysql_result ($comparep,0,"lang");
}
else {die(include 'basketsim.php');}

$clubclub=$_GET['clubid'];
if (!is_numeric($clubclub)) {$clubclub = $userid;}
if ($clubclub==0) {$clubclub = $userid;}

$result = mysql_query("SELECT club, supporter, level FROM users WHERE userid ='$clubclub' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($result)) {
$get_team = mysql_result($result,0,"club");
$huhsupporter = mysql_result($result,0,"supporter");
$gmlev = mysql_result($result,0,"level");
}
else {die (include 'index.php');}

$result = mysql_query("SELECT teamid, name, status, shirt FROM teams WHERE teamid ='$get_team' LIMIT 1") or die(mysql_error());
$teamid=mysql_result($result,0,"teamid");
$name=mysql_result($result,0,"name");
$status=mysql_result($result,0,"status");
$shirt=mysql_result($result,0,"shirt");
if ($huhsupporter==0 AND $gmlev < 2) {$shirt='white';}

$zaheader = stripslashes($name);

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2><?=stripslashes($name)?> >> <?=$langmark1228?></h2>

<?php
$action = $_GET["action"];
//bookmark
if ($action == bookmark) {
$already = mysql_query("SELECT * FROM bookmarks WHERE b_type =2 AND team=$trueclub AND b_link ='$clubclub' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($already) >0) {echo "<table cellpadding=\"10\" cellspacing=\"10\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">",$langmark473," ",$langmark094," <a href=\"bookmarks.php\">",$langmark095,"</a>.</td></tr></table>";
}
else
{
mysql_query("INSERT INTO bookmarks VALUES ('', $trueclub, '$name', $clubclub, 2, 1);") or die(mysql_error());
echo "<table cellpadding=\"10\" cellspacing=\"10\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">",$langmark474," ",$langmark094," <a href=\"bookmarks.php\">",$langmark095,"</a>.</td></tr></table>";
}
}
?>

<table border="0" cellpadding="10" cellspacing="10" width="100%">
<tr bgcolor="#ffffff">
<td class="border">

<table><tr><td width="45">
<img src="img/shirts/<?=$shirt?>.gif" alt="" border="0" height="52" width="42"></td>
<td><h3><?=stripslashes($name)?>
<?php if($is_supporter==1){echo "&nbsp;<a href=\"clubhistory.php?clubid=",$clubclub,"&action=bookmark\"><img src=\"img/bookmark.jpg\" border=\"0\" alt=\"",$langmark477."\" title=\"".$langmark477,"\"></a>";}?>
</h3></td></tr></table>

<br/><h2><?=$langmark1228?></h2><br/>

<?php
$kubra = mysql_query("SELECT * FROM history WHERE h_userid ='$clubclub' ORDER BY h_season DESC, history_id DESC");
$kup=0;
while ($kup < mysql_num_rows($kubra)) {
$h_teamname = mysql_result($kubra,$kup,"h_teamname");
$h_type = mysql_result($kubra,$kup,"h_type");
$achivement = mysql_result($kubra,$kup,"achivement");
$won = mysql_result($kubra,$kup,"won");
$h_season = mysql_result($kubra,$kup,"h_season");
$h_country = mysql_result($kubra,$kup,"h_country");
$h_lname = mysql_result($kubra,$kup,"h_lname");
$h_lid = mysql_result($kubra,$kup,"h_lid");
$p_season = @mysql_result($kubra,$kup+1,"h_season");

if ($h_type==1 AND $won<>1) {echo $langmark1229," ",$h_season," ",stripslashes($h_teamname)," ",$langmark1230," ",$achivement,". ",$langmark1231," <a href=\"leagues.php?leagueid=",$h_lid,"&season=",$h_season,"\">",stripslashes($h_lname),"</a>.<br/>";}
if ($h_type==1 AND $won==1) {echo $langmark1229," ",$h_season," ",stripslashes($h_teamname)," ",$langmark1232," <a href=\"leagues.php?leagueid=",$h_lid,"&season=",$h_season,"\">",stripslashes($h_lname),"</a>.<br/>";}
if ($h_type==3 AND $won<>1) {echo $langmark1229," ",$h_season," ",stripslashes($h_teamname)," ",$langmark1233," ",$achivement,". ",$langmark1234," <a href=\"showmatches.php?clubid=",$clubclub,"&show=arch&cuse=",$h_season,"\">",$langmark1235,"</a>.<br/>";}
if ($h_type==3 AND $won==1) {echo $langmark1229," ",$h_season," ",stripslashes($h_teamname)," ",$langmark1236," <a href=\"showmatches.php?clubid=",$clubclub,"&show=arch&cuse=",$h_season,"\">",$langmark1237," ",$h_country,"</a>.<br/>";}
if ($h_type==5 AND $won==1 AND $h_season==2) {echo $langmark1229," ",$h_season," ",stripslashes($h_teamname)," ",$langmark1495," <a href=\"fairplaycup.php?season=",$h_season,"&round=9\">International Fair Play Cup</a>.<br/>";}
if ($h_type==5 AND $h_season==2 AND $won==0 AND $achivement==9) {echo $langmark1229," ",$h_season," ",stripslashes($h_teamname)," ",$langmark1496," <a href=\"fairplaycup.php?season=",$h_season,"&round=9\">International Fair Play Cup</a>.<br/>";}
if ($h_type==5 AND $won==1 AND $h_season>2) {echo $langmark1229," ",$h_season," ",stripslashes($h_teamname)," ",$langmark1495," <a href=\"fairplaycup.php?season=",$h_season,"&round=10\">International Fair Play Cup</a>.<br/>";}
if ($h_type==5 AND $won==0 AND $h_season >2 AND $achivement==10) {echo $langmark1229," ",$h_season," ",stripslashes($h_teamname)," ",$langmark1496," <a href=\"fairplaycup.php?season=",$h_season,"&round=10\">International Fair Play Cup</a>.<br/>";}
if ($h_type==5 AND $won==0 AND $h_season > 2 AND $achivement < 10) {echo $langmark1229," ",$h_season," ",stripslashes($h_teamname)," ",$langmark1233," ",$achivement,". ",$langmark1234," <a href=\"fairplaycup.php?kgr=",$h_lname,"&season=",$h_season,"&round=",$achivement,"\">International Fair Play Cup</a>.<br/>";}
if ($h_type==5 AND $won==0 AND $h_season==2 AND $achivement < 9) {echo $langmark1229," ",$h_season," ",stripslashes($h_teamname)," ",$langmark1233," ",$achivement,". ",$langmark1234," <a href=\"fairplaycup.php?season=",$h_season,"&round=",$achivement,"\">International Fair Play Cup</a>.<br/>";}
if ($h_type==6 AND $won<>1) {echo $langmark1229," ",$h_season," ",stripslashes($h_teamname)," ",$langmark1233," ",$achivement,". ",$langmark1234," <a href=\"cs.php?season=",$h_season,"&round=",$achivement,"\">Championship Series</a>.<br/>";}
if ($h_type==6 AND $won==1) {echo $langmark1229," ",$h_season," ",stripslashes($h_teamname)," ",$langmark1236," <a href=\"cs.php?season=",$h_season,"&round=",$achivement,"\">Championship Series</a>.<br/>";}
if ($h_type==7 AND $won<>1) {echo $langmark1229," ",$h_season," ",stripslashes($h_teamname)," ",$langmark1233," ",$achivement,". ",$langmark1234," <a href=\"cws.php?season=",$h_season,"&round=",$achivement,"\">Cup Winners Series</a>.<br/>";}
if ($h_type==7 AND $won==1) {echo $langmark1229," ",$h_season," ",stripslashes($h_teamname)," ",$langmark1236," <a href=\"cws.php?season=",$h_season,"&round=",$achivement,"\">Cup Winners Series</a>.<br/>";}
if ($h_type==19 AND $won<>1) {echo $langmark1229," ",$h_season," ",stripslashes($h_teamname)," ",$langmark1233," ",$achivement,". ",$langmark1234," <a href=\"ycwc.php?season=",$h_season,"&round=",$achivement,"\">Youth Club World Cup</a>.<br/>";}
if ($h_type==19 AND $won==1) {echo $langmark1229," ",$h_season," ",stripslashes($h_teamname)," ",$langmark1236," <a href=\"ycwc.php?season=",$h_season,"&round=",$achivement,"\">Youth Club World Cup</a>.<br/>";}
if ($h_type==10) {echo "Team has reached the landmark 10th Fair Play Cup appearance.<br/>";}
if ($h_type==55) {echo "Team has reached the landmark 5 years in Basketsim!<br/>";}
if ($h_type==99) {echo $langmark1442," ",$h_teamname,", ",$h_country," ",$langmark1443,"<br/>";}
if ($h_type==125) {echo "Team was renamed to ",stripslashes($h_teamname),".<br/>";}
if ($h_type==199 AND $h_season < 16) {echo $langmark1442," ",$h_teamname,", ",$h_country," U18 ",$langmark1443,"<br/>";}
if ($h_type==199 AND $h_season > 15) {echo $langmark1442," ",$h_teamname,", ",$h_country," U19 ",$langmark1443,"<br/>";}
if ($h_season <> $p_season) {echo "<hr/>";}
$kup++;
}

$kobo = mysql_query("SELECT users.signed AS pridruzen, teams.city AS regija FROM users, teams WHERE users.club = teams.teamid AND users.userid ='$clubclub' LIMIT 1");
$pridruzen = mysql_result($kobo,0,"pridruzen");
$regija = mysql_result($kobo,0,"regija");
$splitdatetime = explode(" ", $pridruzen); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$disdate = date("d.m.Y", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));

echo $langmark1238," ",$disdate," ",$langmark1239," ",$regija,".<br/>";
?>
<br/><h2><?=$langmark1240?></h2><br/>
<?php
$transfi2 = mysql_query("SELECT playerid, timeofsale, currentbid FROM transfers WHERE currentbid > 1000 AND trstatus =0 AND sellingid <> bidingteam AND bidingteam ='$clubclub' ORDER BY currentbid DESC LIMIT 1");
if (mysql_num_rows($transfi2)>0) {
$playerid = mysql_result($transfi2,0,"playerid");
$timeofsale = mysql_result($transfi2,0,"timeofsale");
$currentbid = mysql_result($transfi2,0,"currentbid");
$splitdatetime = explode(" ", $timeofsale); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$disdate = date("d.m.Y", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));
echo $langmark1238," ",$disdate," ",$langmark1242," <a href=\"player.php?playerid=",$playerid,"\">",$langmark445,"</a> ",$langmark1244," ",number_format($currentbid, 0, ',', '.')," &euro;.<br/>";
}
else {$sib=4;}

$transfi = mysql_query("SELECT playerid, timeofsale, currentbid FROM transfers WHERE currentbid > 1000 AND trstatus =0 AND sellingid <> bidingteam AND sellingid ='$clubclub' ORDER BY currentbid DESC LIMIT 1");
if (mysql_num_rows($transfi)>0) {
$playerid = mysql_result($transfi,0,"playerid");
$timeofsale = mysql_result($transfi,0,"timeofsale");
$currentbid = mysql_result($transfi,0,"currentbid");
$splitdatetime = explode(" ", $timeofsale); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$disdate = date("d.m.Y", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));
echo $langmark1238," ",$disdate," ",$langmark1241," <a href=\"player.php?playerid=",$playerid,"\">",$langmark445,"</a> ",$langmark1244," ",number_format($currentbid, 0, ',', '.')," &euro;.<br/>";
}
else {$sik=3;}

if ($sik==3 && $sib==4) {echo $langmark1243,"<br/>";}

$cho = $_GET['cho'];
if ($cho==1) {$typeF='type > 0';} elseif ($cho==2) {$typeF='type=1';} else {$typeF='type<>2 AND type<>5 AND type < 17';}

//največ danih doma
$a = mysql_query("SELECT matchid, home_score, away_name, `type` FROM matches, users WHERE club=home_id AND signed < time AND ".$typeF." AND home_id=$get_team AND away_score>1 ORDER BY home_score DESC, time ASC LIMIT 1");
$a1 = mysql_fetch_array($a); $a1matchid = $a1['matchid']; $najDD = $a1['home_score']; $a1name = $a1['away_name']; $a1type = $a1['type'];
//največ danih zunaj
$b = mysql_query("SELECT matchid, away_score, home_name, `type` FROM matches, users WHERE club=away_id AND signed < time AND ".$typeF." AND away_id=$get_team AND home_score>1 ORDER BY away_score DESC, time ASC LIMIT 1");
$b1 = mysql_fetch_array($b); $b1matchid = $b1['matchid']; $najDZ = $b1['away_score']; $b1name = $b1['home_name']; $b1type = $b1['type'];
//najmanj danih doma
$c = mysql_query("SELECT matchid, home_score, away_name, `type` FROM matches, users WHERE club=home_id AND signed < time AND ".$typeF." AND home_id=$get_team AND home_score>1 AND away_score >1 ORDER BY home_score ASC, time ASC LIMIT 1");
$c1 = mysql_fetch_array($c); $c1matchid = $c1['matchid']; $minDD = $c1['home_score']; $c1name = $c1['away_name']; $c1type = $c1['type'];
if (!$c1type) {$minDD=999;}
//najmanj danih zunaj
$d = mysql_query("SELECT matchid, away_score, home_name, `type` FROM matches, users WHERE club=away_id AND signed < time AND ".$typeF." AND away_id=$get_team AND home_score>1 AND away_score >1 ORDER BY away_score ASC, time ASC LIMIT 1");
$d1 = mysql_fetch_array($d); $d1matchid = $d1['matchid']; $minDZ = $d1['away_score']; $d1name = $d1['home_name']; $d1type = $d1['type'];
if (!$d1type) {$minDZ=999;}
//največ dobljenih doma
$e = mysql_query("SELECT matchid, away_score, away_name, `type` FROM matches, users WHERE club=home_id AND signed < time AND ".$typeF." AND home_id=$get_team AND home_score>1 AND away_score >1 ORDER BY away_score DESC, time ASC LIMIT 1");
$e1 = mysql_fetch_array($e); $e1matchid = $e1['matchid']; $maxDD = $e1['away_score']; $e1name = $e1['away_name']; $e1type = $e1['type'];
//največ dobljenih zunaj
$f = mysql_query("SELECT matchid, home_score, home_name, `type` FROM matches, users WHERE club=away_id AND signed < time AND ".$typeF." AND away_id=$get_team AND home_score>1 AND away_score >1 ORDER BY home_score DESC, time ASC LIMIT 1");
$f1 = mysql_fetch_array($f); $f1matchid = $f1['matchid']; $maxDZ = $f1['home_score']; $f1name = $f1['home_name']; $f1type = $f1['type'];
//najmanj dobljenih doma
$g = mysql_query("SELECT matchid, away_score, away_name, `type` FROM matches, users WHERE club=home_id AND signed < time AND ".$typeF." AND home_id=$get_team AND home_score>1 AND away_score >1 ORDER BY away_score ASC, time ASC LIMIT 1");
$g1 = mysql_fetch_array($g); $g1matchid = $g1['matchid']; $lowDD = $g1['away_score']; $g1name = $g1['away_name']; $g1type = $g1['type'];
if (!$g1type) {$lowDD=999;}
//najmanj dobljenih zunaj
$h = mysql_query("SELECT matchid, home_score, home_name, `type` FROM matches, users WHERE club=away_id AND signed < time AND ".$typeF." AND away_id=$get_team AND home_score>1 AND away_score >1 ORDER BY home_score ASC, time ASC LIMIT 1");
$h1 = mysql_fetch_array($h); $h1matchid = $h1['matchid']; $lowDZ = $h1['home_score']; $h1name = $h1['home_name']; $h1type = $h1['type'];
if (!$h1type) {$lowDZ=999;}
//najvišja zmaga doma
$i = mysql_query("SELECT matchid, home_score, away_score, away_name, `type` FROM matches, users WHERE club=home_id AND signed < time AND ".$typeF." AND home_id=$get_team AND home_score>1 AND away_score >1 AND home_score > away_score ORDER BY home_score - away_score DESC, time ASC LIMIT 1");
$i1 = mysql_fetch_array($i); $i1matchid = $i1['matchid']; $winDD = $i1['home_score']; $winDG = $i1['away_score']; $i1name = $i1['away_name']; $i1type = $i1['type'];
//najvišja zmaga zunaj
$j = mysql_query("SELECT matchid, home_score, away_score, home_name, `type` FROM matches, users WHERE club=away_id AND signed < time AND ".$typeF." AND away_id=$get_team AND home_score>1 AND away_score >1 AND away_score > home_score ORDER BY away_score - home_score DESC, time ASC LIMIT 1");
$j1 = mysql_fetch_array($j); $j1matchid = $j1['matchid']; $winZG = $j1['away_score']; $winZD = $j1['home_score']; $j1name = $j1['home_name']; $j1type = $j1['type'];
//najvišji poraz doma
$k = mysql_query("SELECT matchid, home_score, away_score, away_name, `type` FROM matches, users WHERE club=home_id AND signed < time AND ".$typeF." AND `home_id` ='$get_team' AND home_score >1 AND away_score >1 AND home_score < away_score ORDER BY away_score - home_score DESC, time ASC LIMIT 1");
$k1 = mysql_fetch_array($k); $k1matchid = $k1['matchid']; $lossDD = $k1['away_score']; $lossDG = $k1['home_score']; $k1name = $k1['away_name']; $k1type = $k1['type'];
//najvišji poraz zunaj
$l = mysql_query("SELECT matchid, home_score, away_score, home_name, `type` FROM matches, users WHERE club=away_id AND signed < time AND ".$typeF." AND `away_id` ='$get_team' AND home_score >1 AND away_score >1 AND away_score < home_score ORDER BY home_score - away_score DESC, time ASC LIMIT 1");
$l1 = mysql_fetch_array($l); $l1matchid = $l1['matchid']; $lossZG = $l1['away_score']; $lossZD = $l1['home_score']; $l1name = $l1['home_name']; $l1type = $l1['type'];
//največ točk na tekmi skupno doma
$m = mysql_query("SELECT matchid, home_score, away_score, away_name, `type` FROM matches, users WHERE club=home_id AND signed < time AND ".$typeF." AND `home_id` ='$get_team' AND home_score >1 AND away_score >1 ORDER BY home_score + away_score DESC, time ASC LIMIT 1");
$m1 = mysql_fetch_array($m); $m1matchid = $m1['matchid']; $lossAHH = $m1['away_score']; $lossHHH = $m1['home_score']; $total11=$lossAHH+$lossHHH; $m1name = $m1['away_name']; $m1type = $m1['type'];
//največ točk na tekmi skupno v gosteh
$n = mysql_query("SELECT matchid, home_score, away_score, home_name, `type` FROM matches, users WHERE club=away_id AND signed < time AND ".$typeF." AND `away_id` ='$get_team' AND home_score >1 AND away_score >1 ORDER BY home_score + away_score DESC, time ASC LIMIT 1");
$n1 = mysql_fetch_array($n); $n1matchid = $n1['matchid']; $lossAHA = $n1['away_score']; $lossHHA = $n1['home_score']; $total22=$lossAHA+$lossHHA; $n1name = $n1['home_name']; $n1type = $n1['type'];
//najmanj točk na tekmi skupno doma
$o = mysql_query("SELECT matchid, home_score, away_score, away_name, `type` FROM matches, users WHERE club=home_id AND signed < time AND ".$typeF." AND `home_id` ='$get_team' AND home_score >1 AND away_score >1 ORDER BY home_score + away_score ASC, time ASC LIMIT 1");
$o1 = mysql_fetch_array($o); $o1matchid = $o1['matchid']; $lossALH = $o1['away_score']; $lossHLH = $o1['home_score']; $otal11=$lossALH+$lossHLH; $o1name = $o1['away_name']; $o1type = $o1['type'];
if (!$otal11 OR $otal11==0) {$otal11=999;}
//najmanj točk na tekmi skupno zunaj
$p = mysql_query("SELECT matchid, home_score, away_score, home_name, `type` FROM matches, users WHERE club=away_id AND signed < time AND ".$typeF." AND `away_id` ='$get_team' AND home_score >1 AND away_score >1 ORDER BY home_score + away_score ASC, time ASC LIMIT 1");
$p1 = mysql_fetch_array($p); $p1matchid = $p1['matchid']; $lossALA = $p1['away_score']; $lossHLA = $p1['home_score']; $otal22=$lossALA+$lossHLA; $p1name = $p1['home_name']; $p1type = $p1['type'];
if (!$otal22 OR $otal22==0) {$otal22=999;}
?>
<br/><h2>Notable matches</h2>
<?php if ($cho==1) {?>
[<a href="clubhistory.php?clubid=<?=$clubclub?>&#35;bot"><?=$langmark1131?></a>] [<?=$langmark686?>]
<?php } else {?>
[<?=$langmark1131?>] [<a href="clubhistory.php?clubid=<?=$clubclub?>&cho=1&#35;bot"><?=$langmark686?></a>]
<?php }?>
<br/><br/>
<table cellspacing="0" cellpadding="0" border="0">
<tr><td width="150">Biggest win</td><td align="right" width="60"><?php if (!$i1type AND !$j1type) {echo "</td><td><i>no such match yet</i>";}
elseif (($winDD - $winDG) > ($winZG - $winZD)) {echo "<a href=\"prikaz.php?matchid=",$i1matchid,"\">",$winDD," - ",$winDG," </a></td><td>&nbsp;v ",stripslashes($i1name);
if ($i1type==2) {echo "&nbsp;<i>(friendly match)</i>";}
if ($i1type==5) {echo "&nbsp;<i>(Fair Play Cup match)</i>";}
if ($i1type>17) {echo "&nbsp;<i>(youth match)</i>";}
} else {echo "<a href=\"prikaz.php?matchid=",$j1matchid,"\">",$winZG," - ",$winZD," </a></td><td>&nbsp;v ",stripslashes($j1name);
if ($j1type==2) {echo "&nbsp;<i>(friendly match)</i>";}
if ($j1type==5) {echo "&nbsp;<i>(Fair Play Cup match)</i>";}
if ($j1type>17) {echo "&nbsp;<i>(youth match)</i>";}
}?></td></tr>
<tr><td width="150">Most points scored</td><td align="right" width="60"><?php if (!$a1type AND !$b1type) {echo "</td><td><i>no such match yet</i>";}
elseif ($najDD > $najDZ) {echo "<a href=\"prikaz.php?matchid=",$a1matchid,"\">",$najDD," </a></td><td>&nbsp;v ",stripslashes($a1name);
if ($a1type==2) {echo "&nbsp;<i>(friendly match)</i>";}
if ($a1type==5) {echo "&nbsp;<i>(Fair Play Cup match)</i>";}
if ($a1type>17) {echo "&nbsp;<i>(youth match)</i>";}
} else {echo "<a href=\"prikaz.php?matchid=",$b1matchid,"\">",$najDZ," </a></td><td>&nbsp;v ",stripslashes($b1name);
if ($b1type==2) {echo "&nbsp;<i>(friendly match)</i>";}
if ($b1type==5) {echo "&nbsp;<i>(Fair Play Cup match)</i>";}
if ($b1type>17) {echo "&nbsp;<i>(youth match)</i>";}
}?></td></tr>
<tr><td width="150">Least points received</td><td align="right" width="60"><?php if (!$g1type AND !$h1type) {echo "</td><td><i>no such match yet</i>";}
elseif ($lowDD <= $lowDZ AND $g1type >0) {echo "<a href=\"prikaz.php?matchid=",$g1matchid,"\">",$lowDD," </a></td><td>&nbsp;v ",stripslashes($g1name);
if ($g1type==2) {echo "&nbsp;<i>(friendly match)</i>";}
if ($g1type==5) {echo "&nbsp;<i>(Fair Play Cup match)</i>";}
if ($g1type>17) {echo "&nbsp;<i>(youth match)</i>";}
} else {echo "<a href=\"prikaz.php?matchid=",$h1matchid,"\">",$lowDZ," </a></td><td>&nbsp;v ",stripslashes($h1name);
if ($h1type==2) {echo "&nbsp;<i>(friendly match)</i>";}
if ($h1type==5) {echo "&nbsp;<i>(Fair Play Cup match)</i>";}
if ($h1type>17) {echo "&nbsp;<i>(youth match)</i>";}
}?></td></tr>
<tr><td width="150">Worst loss</td><td align="right" width="60"><?php if (!$k1type AND !$l1type) {echo "</td><td><i>no such match yet</i>";}
elseif (($lossDG - $lossDD) <= ($lossZG - $lossZD) AND $k1type >0) {echo "<a href=\"prikaz.php?matchid=",$k1matchid,"\">",$lossDG," - ",$lossDD," </a></td><td>&nbsp;v ",stripslashes($k1name);
if ($k1type==2) {echo "&nbsp;<i>(friendly match)</i>";}
if ($k1type==5) {echo "&nbsp;<i>(Fair Play Cup match)</i>";}
if ($k1type>17) {echo "&nbsp;<i>(youth match)</i>";}
} else {echo "<a href=\"prikaz.php?matchid=",$l1matchid,"\">",$lossZG," - ",$lossZD," </a></td><td>&nbsp;v ",stripslashes($l1name);
if ($l1type==2) {echo "&nbsp;<i>(friendly match)</i>";}
if ($l1type==5) {echo "&nbsp;<i>(Fair Play Cup match)</i>";}
if ($l1type>17) {echo "&nbsp;<i>(youth match)</i>";}
}?></td></tr>
<tr><td width="150">Least points scored</td><td align="right" width="60"><?php if (!$c1type AND !$d1type) {echo "</td><td><i>no such match yet</i>";}
elseif ($minDD <= $minDZ AND $c1type >0) {echo "<a href=\"prikaz.php?matchid=",$c1matchid,"\">",$minDD," </a></td><td>&nbsp;v ",stripslashes($c1name);
if ($c1type==2) {echo "&nbsp;<i>(friendly match)</i>";}
if ($c1type==5) {echo "&nbsp;<i>(Fair Play Cup match)</i>";}
if ($c1type>17) {echo "&nbsp;<i>(youth match)</i>";}
} else {echo "<a href=\"prikaz.php?matchid=",$d1matchid,"\">",$minDZ," </a></td><td>&nbsp;v ",stripslashes($d1name);
if ($d1type==2) {echo "&nbsp;<i>(friendly match)</i>";}
if ($d1type==5) {echo "&nbsp;<i>(Fair Play Cup match)</i>";}
if ($d1type>17) {echo "&nbsp;<i>(youth match)</i>";}
}?></td></tr>
<tr><td width="150">Most points received</td><td align="right" width="60"><?php if (!$e1type AND !$f1type) {echo "</td><td><i>no such match yet</i>";}
elseif ($maxDD >= $maxDZ AND $e1type >0) {echo "<a href=\"prikaz.php?matchid=",$e1matchid,"\">",$maxDD," </a></td><td>&nbsp;v ",stripslashes($e1name);
if ($e1type==2) {echo "&nbsp;<i>(friendly match)</i>";}
if ($e1type==5) {echo "&nbsp;<i>(Fair Play Cup match)</i>";}
if ($e1type>17) {echo "&nbsp;<i>(youth match)</i>";}
} else {echo "<a href=\"prikaz.php?matchid=",$f1matchid,"\">",$maxDZ," </a></td><td>&nbsp;v ",stripslashes($f1name);
if ($f1type==2) {echo "&nbsp;<i>(friendly match)</i>";}
if ($f1type==5) {echo "&nbsp;<i>(Fair Play Cup match)</i>";}
if ($f1type>17) {echo "&nbsp;<i>(youth match)</i>";}
}?></td></tr>
<tr><td width="150">Highest scoring match</td><td align="right" width="60"><?php if (!$m1type AND !$n1type) {echo "</td><td><i>no such match yet</i>";}
elseif ($total11 > $total22) {echo "<a href=\"prikaz.php?matchid=",$m1matchid,"\">",$lossHHH," - ",$lossAHH," </a></td><td>&nbsp;v ",stripslashes($m1name);
if ($m1type==2) {echo "&nbsp;<i>(friendly match)</i>";}
if ($m1type==5) {echo "&nbsp;<i>(Fair Play Cup match)</i>";}
if ($m1type>17) {echo "&nbsp;<i>(youth match)</i>";}
} else {echo "<a href=\"prikaz.php?matchid=",$n1matchid,"\">",$lossAHA," - ",$lossHHA,"</a></td><td>&nbsp;v ",stripslashes($n1name);
if ($n1type==2) {echo "&nbsp;<i>(friendly match)</i>";}
if ($n1type==5) {echo "&nbsp;<i>(Fair Play Cup match)</i>";}
if ($n1type>17) {echo "&nbsp;<i>(youth match)</i>";}
}?></td></tr>
<tr><td width="150">Lowest scoring match</td><td align="right" width="60"><?php if (!$o1type AND !$p1type) {echo "</td><td><i>no such match yet</i>";}
elseif ($otal11 < $otal22) {echo "<a href=\"prikaz.php?matchid=",$o1matchid,"\">",$lossHLH," - ",$lossALH," </a></td><td>&nbsp;v ",stripslashes($o1name);
if ($o1type==2) {echo "&nbsp;<i>(friendly match)</i>";}
if ($o1type==5) {echo "&nbsp;<i>(Fair Play Cup match)</i>";}
if ($o1type>17) {echo "&nbsp;<i>(youth match)</i>";}
} else {echo "<a href=\"prikaz.php?matchid=",$p1matchid,"\">",$lossALA," - ",$lossHLA,"</a></td><td>&nbsp;v ",stripslashes($p1name);
if ($p1type==2) {echo "&nbsp;<i>(friendly match)</i>";}
if ($p1type==5) {echo "&nbsp;<i>(Fair Play Cup match)</i>";}
if ($p1type>17) {echo "&nbsp;<i>(youth match)</i>";}
}?></td></tr>
</table><br/>
[<a href="club.php?clubid=<?=$clubclub?>"><?=$langmark491?></a>]
<a name="bot"></a>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>