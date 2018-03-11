<?php
$casek='2014-04-04 19:00:00';
$gamew=8; //in first week i have to update query down here on competitionid!!!
$coexpand=14;

$matchid=$_GET['matchid'];
if (!is_numeric($matchid)){die(include 'index.php');}

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT club, lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)) {
$trueclub = mysql_result($compare,0,"club");
$lang = mysql_result($compare,0,"lang");
}
else {die(include 'basketsim.php');}

$action=$_GET["action"];
if ($action=='multiview') {
$already = mysql_query("SELECT bookmarkid FROM bookmarks WHERE b_type =9 AND multiview =1 AND team ='$trueclub' AND b_link ='$matchid'") or die(mysql_error());
if (!mysql_num_rows($already)) {mysql_query("INSERT INTO bookmarks VALUES ('', $trueclub, '', $matchid, 9, 1);") or die(mysql_error());}
header("Location: nt_multiview.php");
break;
}

$zdaj = date("Y-m-d H:i:s");
$vzivo = mysql_query("SELECT event_id FROM nt_matchevents WHERE event_time > '$zdaj' AND match_id ='$matchid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($vzivo) > 0) {$refresh=1798;}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
include_once("inc/action.php");
include_once("inc/rater.php");
$member=$userid;
$member_id=$userid;

$pru=mysql_query("SELECT `report`, `end`, `last` FROM `ntmatchreports` WHERE `lang` ='$lang' AND `match` ='$matchid' LIMIT 1") or die(mysql_error());
$tdatetime = explode(" ",$zdaj); $ffdate = $tdatetime[0]; $fftime = $tdatetime[1];
$tdate = explode("-", $ffdate); $ffyear = $tdate[0]; $ffmonth = $tdate[1]; $ffday = $tdate[2];
$ttime = explode(":", $fftime); $ffhour = $ttime[0]; $ffmin = $ttime[1]; $ffsec = $ttime[2];
$date30 = date("Y-m-d H:i:s", mktime($ffhour,$ffmin,$ffsec-20,$ffmonth,$ffday,$ffyear));
if (mysql_num_rows($pru)==1 AND $refresh==1798 AND $date30 < mysql_result($pru,0,"last")) {echo stripslashes(mysql_result($pru,0,"report")); die();}
ob_start();
?>

<div id="main">
<h2><?=$langmark324?></h2>
<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="72%">
<?php

$result = mysql_query("SELECT * FROM nt_matchevents WHERE event_time < '$zdaj' AND match_id ='$matchid' ORDER BY event_id DESC LIMIT 4");
$num=mysql_num_rows($result);
if ($num==0){$tekmabo = mysql_query("SELECT home_id, away_id, time FROM nt_matches WHERE matchid ='$matchid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($tekmabo) < 1) {die ("$langmark325.<br/><a href=\"javascript: history.go(-1)\">$langmark059</a></td></tr></table>");}
else {
$team1=mysql_result($tekmabo,0,"home_id");
$team2=mysql_result($tekmabo,0,"away_id");
$timeof=mysql_result($tekmabo,0,"time");
$splitdt1 = explode(" ", $timeof); $bdate1 = $splitdt1[0]; $btime1 = $splitdt1[1];
$splitd1 = explode("-", $bdate1); $byear1 = $splitd1[0]; $bmonth1 = $splitd1[1]; $bday1 = $splitd1[2];
$splitt1 = explode(":", $btime1); $bhour1 = $splitt1[0]; $bmin1 = $splitt1[1]; $bsec1 = $splitt1[2];
$timdisp = date("d.m.Y H:i", mktime($bhour1,$bmin1,$bsec1,$bmonth1,$bday1,$byear1));
$gledalci = mysql_query("SELECT home_id, home_name, away_id, away_name, arena_id, type FROM nt_matches WHERE matchid ='$matchid' LIMIT 1");
$home_id=mysql_result($gledalci,0,"home_id");
$away_id=mysql_result($gledalci,0,"away_id");
$temname=mysql_result($gledalci,0,"home_name");
$temname2=mysql_result($gledalci,0,"away_name");
$predogle=mysql_result($gledalci,0,"arena_id");
$tipec=mysql_result($gledalci,0,"type");
$aaa = mysql_query("SELECT arenaname FROM arena WHERE teamid ='$predogle'");
?>
<table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="left">
<?php
if ($temname=='Bosnia and Herzegovina') {$temname='BiH';} elseif ($temname2=='Bosnia and Herzegovina') {$temname2='BiH';}
if ($tipec <10) {?><b><?=$temname?> - <?=$temname2?></b><?php } else {?><b><?=$temname," U19"?> - <?=$temname2," U19"?></b><?php }?><i>
<?php
SWITCH ($tipec){
CASE 1: echo "(qualifying match)"; break;
CASE 2: echo "(friendly match)"; break;
CASE 3: echo "(world cup match)"; break;
CASE 4: echo "(world cup match)"; break;
CASE 11: echo "(qualifying match)"; break;
CASE 12: echo "(friendly match)"; break;
CASE 13: echo "(world cup match)"; break;
CASE 14: echo "(world cup match)"; break;
}
?></i>&nbsp;<a href="nt_prikaz.php?matchid=<?=$matchid?>&action=multiview"><img src="img/live.jpg" border="0" alt="<?=$langmark332?>" title="<?=$langmark332?>"></a>
</td><td align="right">
<b><?=$langmark647?>:</b> <?=$matchid?>
</td></tr></table><br/><?=$langmark688," ",$timdisp,"<br/>",$langmark689?>
<br/><br/><?=$langmark476?>: <b><a href="cheerleaders.php?squad=<?=$predogle?>"><?=stripslashes(mysql_result($aaa,0))?></a></b>
<br/><br/><a href="nt_prikaz.php?action=past&matchid=<?=$matchid?>"><?=$langmark1464?></a>&nbsp;<a href="javascript: history.go(-1)"><?=$langmark132?></a></td>
<td class="border" width="45%"><h2><?=$langmark335?>&nbsp;</h2><br/>
<?php if ($tipec <10) {?><a href="nationalteams.php?country=<?=$temname?>"><?=$temname?></a><br/><a href="nationalteams.php?country=<?=$temname2?>"><?=$temname2?></a>
<?php } else {?><a href="u18teams.php?country=<?=$temname?>"><?=$temname," U19"?></a><br/><a href="u18teams.php?country=<?=$temname2?>"><?=$temname2," U19"?></a><?php }?>
</td></tr>
<?php
if ($action=='past') {
if ($tipec < 10) {$exnt_matches = mysql_query("SELECT matchid, home_name, away_name, home_score, away_score, time, type, season FROM nt_matches WHERE type < 10 AND home_score >0 AND home_id ='$team1' AND away_id ='$team2' UNION SELECT matchid, home_name, away_name, home_score, away_score, time, type, season FROM nt_matches WHERE type < 10 AND home_score >0 AND away_id ='$team1' AND home_id ='$team2' ORDER BY `time` DESC");}
else {$exnt_matches = mysql_query("SELECT matchid, home_name, away_name, home_score, away_score, time, type, season FROM nt_matches WHERE type > 10 AND home_score > 0 AND home_id ='$team1' AND away_id ='$team2' UNION SELECT matchid, home_name, away_name, home_score, away_score, time, type, season FROM nt_matches WHERE type > 10 AND home_score > 0 AND away_id ='$team1' AND home_id ='$team2' ORDER BY `time` DESC");}
echo "<tr valign=\"top\" bgcolor=\"#ffffff\"><td class=\"border\" width=\"50%\"><b>",$langmark1465,"</b><br/><br/><table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\">";
while ($m = mysql_fetch_array($exnt_matches)) {
$matchid=$m["matchid"];
$home_name=$m["home_name"];
$away_name=$m["away_name"];
$home_score=$m["home_score"];
$away_score=$m["away_score"];
$time=$m["time"];
$typee=$m["type"];
$seeeee=$m["season"];
if ($typee > 10 AND $seeeee > 15) {$home_name = $home_name." U19"; $away_name = $away_name." U19";}
elseif ($typee > 10 AND $seeeee < 16) {$home_name = $home_name." U18"; $away_name = $away_name." U18";}
$tdatetime = explode(" ",$time); $ffdate = $tdatetime[0]; $fftime = $tdatetime[1];
$tdate = explode("-", $ffdate); $ffyear = $tdate[0]; $ffmonth = $tdate[1]; $ffday = $tdate[2];
$ttime = explode(":", $fftime); $ffhour = $ttime[0]; $ffmin = $ttime[1]; $ffsec = $ttime[2];
$time = date("d.m.Y", mktime($ffhour,$ffmin,$ffsec,$ffmonth,$ffday,$ffyear));
echo "<tr><td>",$time,"&nbsp;&nbsp;";
if ($home_score > $away_score) {echo "<font color=\"green\">",$home_name,"</font>";} else {echo $home_name;}
echo " - ";
if ($home_score < $away_score) {echo "<font color=\"green\">",$away_name,"</font>";} else {echo $away_name;}
echo "</td><td align=\"center\">";
SWITCH ($typee){
CASE 1: $tip="World Cup"; break;
CASE 2: $tip=$langmark320; break;
CASE 3: $tip="World Cup"; break;
CASE 4: $tip="World Cup"; break;
CASE 11: $tip="World Cup"; break;
CASE 12: $tip=$langmark320; break;
CASE 13: $tip="World Cup"; break;
CASE 14: $tip="World Cup"; break;
}
echo "&nbsp;(",$tip,")&nbsp;</td><td align=\"right\"><a href=\"nt_prikaz.php?matchid=",$matchid,"\">",$home_score," : ",$away_score,"</a></tr>";
}
if (mysql_num_rows($exnt_matches)==0) {echo "<i>",$langmark1466,"</i>";}
}
echo "</table></td></tr></table>";}
die();
}

//MINUTE
$zacetek1 = mysql_query("SELECT min(event_time) FROM nt_matchevents WHERE match_id=$matchid AND quater=1");
$zacetek2 = mysql_query("SELECT min(event_time) FROM nt_matchevents WHERE match_id=$matchid AND quater=2");
$zacetek3 = mysql_query("SELECT min(event_time) FROM nt_matchevents WHERE match_id=$matchid AND quater=3");
$zacetek4 = mysql_query("SELECT min(event_time) FROM nt_matchevents WHERE match_id=$matchid AND quater=4");
$konec1 = mysql_query("SELECT max(event_time) FROM nt_matchevents WHERE match_id=$matchid AND quater=1");
$konec2 = mysql_query("SELECT max(event_time) FROM nt_matchevents WHERE match_id=$matchid AND quater=2");
$konec3 = mysql_query("SELECT max(event_time) FROM nt_matchevents WHERE match_id=$matchid AND quater=3");
$konec4 = mysql_query("SELECT max(event_time) FROM nt_matchevents WHERE match_id=$matchid AND quater=4");
if (mysql_num_rows($zacetek1)) {$zacetek_1 = mysql_result($zacetek1,0);}
if (mysql_num_rows($zacetek2)) {$zacetek_2 = mysql_result($zacetek2,0);}
if (mysql_num_rows($zacetek3)) {$zacetek_3 = mysql_result($zacetek3,0);}
if (mysql_num_rows($zacetek4)) {$zacetek_4 = mysql_result($zacetek4,0);}
if (mysql_num_rows($konec1)) {$konec_1 = mysql_result($konec1,0);}
if (mysql_num_rows($konec2)) {$konec_2 = mysql_result($konec2,0);}
if (mysql_num_rows($konec3)) {$konec_3 = mysql_result($konec3,0);}
if (mysql_num_rows($konec4)) {$konec_4 = mysql_result($konec4,0);}
$z1 = explode(" ", $zacetek_1); $z1d = $z1[0]; $z1t = $z1[1];
$sz1d = explode("-", $z1d); $z1ye = $sz1d[0]; $z1mo = $sz1d[1]; $z1da = $sz1d[2];
$sz1t = explode(":", $z1t); $z1ho = $sz1t[0]; $z1mi = $sz1t[1]; $z1se = $sz1t[2];
$k1 = explode(" ", $konec_1); $k1d = $k1[0]; $k1t = $k1[1];
$sk1d = explode("-", $k1d); $k1ye = $sk1d[0]; $k1mo = $sk1d[1]; $k1da = $sk1d[2];
$sk1t = explode(":", $k1t); $k1ho = $sk1t[0]; $k1mi = $sk1t[1]; $k1se = $sk1t[2];
$dolzina1 = date("i:s", mktime($k1ho-z1ho,$k1mi-$z1mi,$k1se-$z1se,$k1mo-$z1mo,$k1da-$z1da,$k1ye-z1ye));
$z2 = explode(" ", $zacetek_2); $z2d = $z2[0]; $z2t = $z2[1];
$sz2d = explode("-", $z2d); $z2ye = $sz2d[0]; $z2mo = $sz2d[1]; $z2da = $sz2d[2];
$sz2t = explode(":", $z2t); $z2ho = $sz2t[0]; $z2mi = $sz2t[1]; $z2se = $sz2t[2];
$k2 = explode(" ", $konec_2); $k2d = $k2[0]; $k2t = $k2[1];
$sk2d = explode("-", $k2d); $k2ye = $sk2d[0]; $k2mo = $sk2d[1]; $k2da = $sk2d[2];
$sk2t = explode(":", $k2t); $k2ho = $sk2t[0]; $k2mi = $sk2t[1]; $k2se = $sk2t[2];
$dolzina2 = date("i:s", mktime($k2ho-z2ho,$k2mi-$z2mi,$k2se-$z2se,$k2mo-$z2mo,$k2da-$z2da,$k2ye-z2ye));
$z3 = explode(" ", $zacetek_3); $z3d = $z3[0]; $z3t = $z3[1];
$sz3d = explode("-", $z3d); $z3ye = $sz3d[0]; $z3mo = $sz3d[1]; $z3da = $sz3d[2];
$sz3t = explode(":", $z3t); $z3ho = $sz3t[0]; $z3mi = $sz3t[1]; $z3se = $sz3t[2];
$k3 = explode(" ", $konec_3); $k3d = $k3[0]; $k3t = $k3[1];
$sk3d = explode("-", $k3d); $k3ye = $sk3d[0]; $k3mo = $sk3d[1]; $k3da = $sk3d[2];
$sk3t = explode(":", $k3t); $k3ho = $sk3t[0]; $k3mi = $sk3t[1]; $k3se = $sk3t[2];
$dolzina3 = date("i:s", mktime($k3ho-z3ho,$k3mi-$z3mi,$k3se-$z3se,$k3mo-$z3mo,$k3da-$z3da,$k3ye-z3ye));
$z4 = explode(" ", $zacetek_4); $z4d = $z4[0]; $z4t = $z4[1];
$sz4d = explode("-", $z4d); $z4ye = $sz4d[0]; $z4mo = $sz4d[1]; $z4da = $sz4d[2];
$sz4t = explode(":", $z4t); $z4ho = $sz4t[0]; $z4mi = $sz4t[1]; $z4se = $sz4t[2];
$k4 = explode(" ", $konec_4); $k4d = $k4[0]; $k4t = $k4[1];
$sk4d = explode("-", $k4d); $k4ye = $sk4d[0]; $k4mo = $sk4d[1]; $k4da = $sk4d[2];
$sk4t = explode(":", $k4t); $k4ho = $sk4t[0]; $k4mi = $sk4t[1]; $k4se = $sk4t[2];
$dolzina4 = date("i:s", mktime($k4ho-z4ho,$k4mi-$z4mi,$k4se-$z4se,$k4mo-$z4mo,$k4da-$z4da,$k4ye-z4ye));
$sek1 = explode(":", $dolzina1); $sekunde1 = 60 * $sek1[0] + $sek1[1]; if($sekunde1 < 800){$sekunde1=900;}
$sek2 = explode(":", $dolzina2); $sekunde2 = 60 * $sek2[0] + $sek2[1]; if($sekunde2 < 800){$sekunde2=900;}
$sek3 = explode(":", $dolzina3); $sekunde3 = 60 * $sek3[0] + $sek3[1]; if($sekunde3 < 800){$sekunde3=900;}
$sek4 = explode(":", $dolzina4); $sekunde4 = 60 * $sek4[0] + $sek4[1]; if($sekunde4 < 800){$sekunde4=900;}
//KONEC MINUT

$gledalci = mysql_query("SELECT * FROM nt_matches WHERE matchid ='$matchid' LIMIT 1");
while ($o = mysql_fetch_array($gledalci)) {
$prvaekipa=$o["home_id"];
$home_name=$o["home_name"];
$drugaekipa=$o["away_id"];
$away_name=$o["away_name"];
$arena=$o["arena_id"];
$gl1=$o["crowd1"];
$gl2=$o["crowd2"];
$gl3=$o["crowd3"];
$gl4=$o["crowd4"];
$hscoreN=$o["home_score"];
$ascoreN=$o["away_score"];
$HQ1=$o['HQ1'];
$AQ1=$o['AQ1'];
$HQ2=$o['HQ2'];
$AQ2=$o['AQ2'];
$HQ3=$o['HQ3'];
$AQ3=$o['AQ3'];
$time_tekme=$o["time"];
$type=$o["type"];
$home_def=$o["home_def"];
$away_def=$o["away_def"];
$home_off=$o["home_off"];
$away_off=$o["away_off"];
$home_pg1=$o["home_pg1"];
$home_sg1=$o["home_sg1"];
$home_sf1=$o["home_sf1"];
$home_pf1=$o["home_pf1"];
$home_c1=$o["home_c1"];
$away_pg1=$o["away_pg1"];
$away_sg1=$o["away_sg1"];
$away_sf1=$o["away_sf1"];
$away_pf1=$o["away_pf1"];
$away_c1=$o["away_c1"];
$home_pg2=$o["home_pg2"];
$home_sg2=$o["home_sg2"];
$home_sf2=$o["home_sf2"];
$home_pf2=$o["home_pf2"];
$home_c2=$o["home_c2"];
$away_pg2=$o["away_pg2"];
$away_sg2=$o["away_sg2"];
$away_sf2=$o["away_sf2"];
$away_pf2=$o["away_pf2"];
$away_c2=$o["away_c2"];
$country=$o["country"];
$hpgstarat=$o["hpg_rating"];
$hsgstarat=$o["hsg_rating"];
$hsfstarat=$o["hsf_rating"];
$hpfstarat=$o["hpf_rating"];
$hcstarat=$o["hc_rating"];
$apgstarat=$o["apg_rating"];
$asgstarat=$o["asg_rating"];
$asfstarat=$o["asf_rating"];
$apfstarat=$o["apf_rating"];
$acstarat=$o["ac_rating"];
$home_atti=$o["attitude_hom"];
$away_atti=$o["attitude_awa"];
$h2p=$o["h2p"];
$a2p=$o["a2p"];
$h3p=$o["h3p"];
$a3p=$o["a3p"];
$hreb=$o["hreb"];
$areb=$o["areb"];
$hto=$o["hto"];
$ato=$o["ato"];
$htir=$o["htir"];
$atir=$o["atir"];
}

if ($time_tekme < '2009-06-30 02:00:00') {
if ($hto < 110) {$hto_dspl = $langmark096;}
elseif ($hto > 109 AND $hto < 150) {$hto_dspl = $langmark097;}
elseif ($hto > 149 AND $hto < 190) {$hto_dspl = $langmark098;}
elseif ($hto > 189 AND $hto < 230) {$hto_dspl = $langmark100;}
elseif ($hto > 229 AND $hto < 270) {$hto_dspl = $langmark102;}
elseif ($hto > 269 AND $hto < 310) {$hto_dspl = $langmark103;}
elseif ($hto > 309 AND $hto < 350) {$hto_dspl = $langmark104;}
elseif ($hto > 349) {$hto_dspl = $langmark106;}
if ($ato < 110) {$ato_dspl = $langmark096;}
elseif ($ato > 109 AND $ato < 150) {$ato_dspl = $langmark097;}
elseif ($ato > 149 AND $ato < 190) {$ato_dspl = $langmark098;}
elseif ($ato > 189 AND $ato < 230) {$ato_dspl = $langmark100;}
elseif ($ato > 229 AND $ato < 270) {$ato_dspl = $langmark102;}
elseif ($ato > 269 AND $ato < 310) {$ato_dspl = $langmark103;}
elseif ($ato > 309 AND $ato < 350) {$ato_dspl = $langmark104;}
elseif ($ato > 349) {$ato_dspl = $langmark106;}
}
else {
if ($hto < 1) {$hto_dspl = $langmark096;}
elseif ($hto > 0 AND $hto < 51) {$hto_dspl = $langmark097;}
elseif ($hto > 50 AND $hto < 101) {$hto_dspl = $langmark098;}
elseif ($hto > 100 AND $hto < 151) {$hto_dspl = $langmark099;}
elseif ($hto > 150 AND $hto < 201) {$hto_dspl = $langmark100;}
elseif ($hto > 200 AND $hto < 261) {$hto_dspl = $langmark101;}
elseif ($hto > 260 AND $hto < 321) {$hto_dspl = $langmark102;}
elseif ($hto > 320 AND $hto < 381) {$hto_dspl = $langmark103;}
elseif ($hto > 380 AND $hto < 451) {$hto_dspl = $langmark104;}
elseif ($hto > 450 AND $hto < 521) {$hto_dspl = $langmark106;}
elseif ($hto > 520) {$hto_dspl = $langmark1585;}
if ($ato < 1) {$ato_dspl = $langmark096;}
elseif ($ato > 0 AND $ato < 51) {$ato_dspl = $langmark097;}
elseif ($ato > 50 AND $ato < 101) {$ato_dspl = $langmark098;}
elseif ($ato > 100 AND $ato < 151) {$ato_dspl = $langmark099;}
elseif ($ato > 150 AND $ato < 201) {$ato_dspl = $langmark100;}
elseif ($ato > 200 AND $ato < 261) {$ato_dspl = $langmark101;}
elseif ($ato > 260 AND $ato < 321) {$ato_dspl = $langmark102;}
elseif ($ato > 320 AND $ato < 381) {$ato_dspl = $langmark103;}
elseif ($ato > 380 AND $ato < 451) {$ato_dspl = $langmark104;}
elseif ($ato > 450 AND $ato < 521) {$ato_dspl = $langmark106;}
elseif ($ato > 520) {$ato_dspl = $langmark1585;}
}

if ($hreb < 401) {$hreb_dspl = $langmark111;}
elseif ($hreb > 400 AND $hreb < 801) {$hreb_dspl = $langmark096;}
elseif ($hreb > 800 AND $hreb < 1101) {$hreb_dspl = $langmark097;}
elseif ($hreb > 1100 AND $hreb < 1301) {$hreb_dspl = $langmark098;}
elseif ($hreb > 1300 AND $hreb < 1501) {$hreb_dspl = $langmark099;}
elseif ($hreb > 1500 AND $hreb < 1701) {$hreb_dspl = $langmark100;}
elseif ($hreb > 1700 AND $hreb < 1901) {$hreb_dspl = $langmark101;}
elseif ($hreb > 1900 AND $hreb < 2101) {$hreb_dspl = $langmark102;}
elseif ($hreb > 2100 AND $hreb < 2301) {$hreb_dspl = $langmark103;}
elseif ($hreb > 2300 AND $hreb < 2501) {$hreb_dspl = $langmark104;}
elseif ($hreb > 2500 AND $hreb < 2701) {$hreb_dspl = $langmark105;}
elseif ($hreb > 2700 AND $hreb < 2901) {$hreb_dspl = $langmark106;}
elseif ($hreb > 2900 AND $hreb < 3101) {$hreb_dspl = $langmark107;}
elseif ($hreb > 3100 AND $hreb < 3301) {$hreb_dspl = $langmark108;}
elseif ($hreb > 3300 AND $hreb < 3501) {$hreb_dspl = $langmark1584;}
elseif ($hreb > 3500 AND $hreb < 3701) {$hreb_dspl = $langmark1585;}
elseif ($hreb > 3700 AND $hreb < 3901) {$hreb_dspl = $langmark1586;}
elseif ($hreb > 3900 AND $hreb < 4101) {$hreb_dspl = $langmark1587;}
elseif ($hreb > 4100 AND $hreb < 4301) {$hreb_dspl = $langmark1588;}
elseif ($hreb > 4300 AND $hreb < 4501) {$hreb_dspl = $langmark109;}
elseif ($hreb > 4500) {$hreb_dspl = $langmark110;}

if ($areb < 401) {$areb_dspl = $langmark111;}
elseif ($areb > 400 AND $areb < 801) {$areb_dspl = $langmark096;}
elseif ($areb > 800 AND $areb < 1101) {$areb_dspl = $langmark097;}
elseif ($areb > 1100 AND $areb < 1301) {$areb_dspl = $langmark098;}
elseif ($areb > 1300 AND $areb < 1501) {$areb_dspl = $langmark099;}
elseif ($areb > 1500 AND $areb < 1701) {$areb_dspl = $langmark100;}
elseif ($areb > 1700 AND $areb < 1901) {$areb_dspl = $langmark101;}
elseif ($areb > 1900 AND $areb < 2101) {$areb_dspl = $langmark102;}
elseif ($areb > 2100 AND $areb < 2301) {$areb_dspl = $langmark103;}
elseif ($areb > 2300 AND $areb < 2501) {$areb_dspl = $langmark104;}
elseif ($areb > 2500 AND $areb < 2701) {$areb_dspl = $langmark105;}
elseif ($areb > 2700 AND $areb < 2901) {$areb_dspl = $langmark106;}
elseif ($areb > 2900 AND $areb < 3101) {$areb_dspl = $langmark107;}
elseif ($areb > 3100 AND $areb < 3301) {$areb_dspl = $langmark108;}
elseif ($areb > 3300 AND $areb < 3501) {$areb_dspl = $langmark1584;}
elseif ($areb > 3500 AND $areb < 3701) {$areb_dspl = $langmark1585;}
elseif ($areb > 3700 AND $areb < 3901) {$areb_dspl = $langmark1586;}
elseif ($areb > 3900 AND $areb < 4101) {$areb_dspl = $langmark1587;}
elseif ($areb > 4100 AND $areb < 4301) {$areb_dspl = $langmark1588;}
elseif ($areb > 4300 AND $areb < 4501) {$areb_dspl = $langmark109;}
elseif ($areb > 4500) {$areb_dspl = $langmark110;}

if ($h3p > 171) {$h3p_dspl = $langmark111;}
elseif ($h3p > 162 AND $h3p < 172) {$h3p_dspl = $langmark096;}
elseif ($h3p > 153 AND $h3p < 163) {$h3p_dspl = $langmark097;}
elseif ($h3p > 144 AND $h3p < 154) {$h3p_dspl = $langmark098;}
elseif ($h3p > 135 AND $h3p < 145) {$h3p_dspl = $langmark099;}
elseif ($h3p > 126 AND $h3p < 136) {$h3p_dspl = $langmark100;}
elseif ($h3p > 117 AND $h3p < 127) {$h3p_dspl = $langmark101;}
elseif ($h3p > 108 AND $h3p < 118) {$h3p_dspl = $langmark102;}
elseif ($h3p > 99 AND $h3p < 109) {$h3p_dspl = $langmark103;}
elseif ($h3p > 90 AND $h3p < 100) {$h3p_dspl = $langmark104;}
elseif ($h3p > 81 AND $h3p < 91) {$h3p_dspl = $langmark105;}
elseif ($h3p > 72 AND $h3p < 82) {$h3p_dspl = $langmark106;}
elseif ($h3p > 63 AND $h3p < 73) {$h3p_dspl = $langmark107;}
elseif ($h3p > 54 AND $h3p < 64) {$h3p_dspl = $langmark108;}
elseif ($h3p > 47 AND $h3p < 55) {$h3p_dspl = $langmark1584;}
elseif ($h3p > 42 AND $h3p < 48) {$h3p_dspl = $langmark1585;}
elseif ($h3p > 39 AND $h3p < 43) {$h3p_dspl = $langmark1586;}
elseif ($h3p < 40) {$h3p_dspl = $langmark1587;}

if ($a3p > 171) {$a3p_dspl = $langmark111;}
elseif ($a3p > 162 AND $a3p < 172) {$a3p_dspl = $langmark096;}
elseif ($a3p > 153 AND $a3p < 163) {$a3p_dspl = $langmark097;}
elseif ($a3p > 144 AND $a3p < 154) {$a3p_dspl = $langmark098;}
elseif ($a3p > 135 AND $a3p < 145) {$a3p_dspl = $langmark099;}
elseif ($a3p > 126 AND $a3p < 136) {$a3p_dspl = $langmark100;}
elseif ($a3p > 117 AND $a3p < 127) {$a3p_dspl = $langmark101;}
elseif ($a3p > 108 AND $a3p < 118) {$a3p_dspl = $langmark102;}
elseif ($a3p > 99 AND $a3p < 109) {$a3p_dspl = $langmark103;}
elseif ($a3p > 90 AND $a3p < 100) {$a3p_dspl = $langmark104;}
elseif ($a3p > 81 AND $a3p < 91) {$a3p_dspl = $langmark105;}
elseif ($a3p > 72 AND $a3p < 82) {$a3p_dspl = $langmark106;}
elseif ($a3p > 63 AND $a3p < 73) {$a3p_dspl = $langmark107;}
elseif ($a3p > 54 AND $a3p < 64) {$a3p_dspl = $langmark108;}
elseif ($a3p > 47 AND $a3p < 55) {$a3p_dspl = $langmark1584;}
elseif ($a3p > 42 AND $a3p < 48) {$a3p_dspl = $langmark1585;}
elseif ($a3p > 39 AND $a3p < 43) {$a3p_dspl = $langmark1586;}
elseif ($a3p < 40) {$a3p_dspl = $langmark1587;}

if ($h2p > 472) {$h2p_dspl = $langmark111;}
elseif ($h2p > 460 AND $h2p < 473) {$h2p_dspl = $langmark096;}
elseif ($h2p > 448 AND $h2p < 461) {$h2p_dspl = $langmark097;}
elseif ($h2p > 436 AND $h2p < 449) {$h2p_dspl = $langmark098;}
elseif ($h2p > 424 AND $h2p < 437) {$h2p_dspl = $langmark099;}
elseif ($h2p > 412 AND $h2p < 425) {$h2p_dspl = $langmark100;}
elseif ($h2p > 400 AND $h2p < 413) {$h2p_dspl = $langmark101;}
elseif ($h2p > 388 AND $h2p < 401) {$h2p_dspl = $langmark102;}
elseif ($h2p > 376 AND $h2p < 389) {$h2p_dspl = $langmark103;}
elseif ($h2p > 364 AND $h2p < 377) {$h2p_dspl = $langmark104;}
elseif ($h2p > 352 AND $h2p < 365) {$h2p_dspl = $langmark105;}
elseif ($h2p > 340 AND $h2p < 353) {$h2p_dspl = $langmark106;}
elseif ($h2p > 328 AND $h2p < 341) {$h2p_dspl = $langmark107;}
elseif ($h2p > 316 AND $h2p < 329) {$h2p_dspl = $langmark108;}
elseif ($h2p > 304 AND $h2p < 317) {$h2p_dspl = $langmark1584;}
elseif ($h2p > 292 AND $h2p < 305) {$h2p_dspl = $langmark1585;}
elseif ($h2p > 280 AND $h2p < 293) {$h2p_dspl = $langmark1586;}
elseif ($h2p > 268 AND $h2p < 281) {$h2p_dspl = $langmark1587;}
elseif ($h2p < 269) {$h2p_dspl = $langmark1588;}

if ($a2p > 472) {$a2p_dspl = $langmark111;}
elseif ($a2p > 460 AND $a2p < 473) {$a2p_dspl = $langmark096;}
elseif ($a2p > 448 AND $a2p < 461) {$a2p_dspl = $langmark097;}
elseif ($a2p > 436 AND $a2p < 449) {$a2p_dspl = $langmark098;}
elseif ($a2p > 424 AND $a2p < 437) {$a2p_dspl = $langmark099;}
elseif ($a2p > 412 AND $a2p < 425) {$a2p_dspl = $langmark100;}
elseif ($a2p > 400 AND $a2p < 413) {$a2p_dspl = $langmark101;}
elseif ($a2p > 388 AND $a2p < 401) {$a2p_dspl = $langmark102;}
elseif ($a2p > 376 AND $a2p < 389) {$a2p_dspl = $langmark103;}
elseif ($a2p > 364 AND $a2p < 377) {$a2p_dspl = $langmark104;}
elseif ($a2p > 352 AND $a2p < 365) {$a2p_dspl = $langmark105;}
elseif ($a2p > 340 AND $a2p < 353) {$a2p_dspl = $langmark106;}
elseif ($a2p > 328 AND $a2p < 341) {$a2p_dspl = $langmark107;}
elseif ($a2p > 316 AND $a2p < 329) {$a2p_dspl = $langmark108;}
elseif ($a2p > 304 AND $a2p < 317) {$a2p_dspl = $langmark1584;}
elseif ($a2p > 292 AND $a2p < 305) {$a2p_dspl = $langmark1585;}
elseif ($a2p > 280 AND $a2p < 293) {$a2p_dspl = $langmark1586;}
elseif ($a2p > 268 AND $a2p < 281) {$a2p_dspl = $langmark1587;}
elseif ($a2p < 269) {$a2p_dspl = $langmark1588;}

SWITCH ($home_atti) {
CASE 0: $home_atti=$langmark1540; break;
CASE 1: $home_atti=$langmark1541; break;
CASE 2: $home_atti=$langmark1542; break;
CASE 3: $home_atti=$langmark1543; break;
CASE 4: $home_atti=$langmark1544; break;
}
SWITCH ($away_atti) {
CASE 0: $away_atti=$langmark1540; break;
CASE 1: $away_atti=$langmark1541; break;
CASE 2: $away_atti=$langmark1542; break;
CASE 3: $away_atti=$langmark1543; break;
CASE 4: $away_atti=$langmark1544; break;
}

$homepg_name = @mysql_query("SELECT name, surname FROM players WHERE id =$home_pg1 LIMIT 1");
$hpg_name=@mysql_result($homepg_name,0,"name");
$hpg1name=@mysql_result($homepg_name,0,"surname");
$homesg_name = @mysql_query("SELECT name, surname FROM players WHERE id =$home_sg1 LIMIT 1");
$hsg_name=@mysql_result($homesg_name,0,"name");
$hsg1name=@mysql_result($homesg_name,0,"surname");
$homesf_name = @mysql_query("SELECT name, surname FROM players WHERE id =$home_sf1 LIMIT 1");
$hsf_name=@mysql_result($homesf_name,0,"name");
$hsf1name=@mysql_result($homesf_name,0,"surname");
$homepf_name = @mysql_query("SELECT name, surname FROM players WHERE id =$home_pf1 LIMIT 1");
$hpf_name=@mysql_result($homepf_name,0,"name");
$hpf1name=@mysql_result($homepf_name,0,"surname");
$homec_name = @mysql_query("SELECT name, surname FROM players WHERE id =$home_c1 LIMIT 1");
$hc_name=@mysql_result($homec_name,0,"name");
$hc1name=@mysql_result($homec_name,0,"surname");
$awaypg_name = @mysql_query("SELECT name, surname FROM players WHERE id =$away_pg1 LIMIT 1");
$apg_name=@mysql_result($awaypg_name,0,"name");
$apg1name=@mysql_result($awaypg_name,0,"surname");
$awaysg_name = @mysql_query("SELECT name, surname FROM players WHERE id =$away_sg1 LIMIT 1");
$asg_name=@mysql_result($awaysg_name,0,"name");
$asg1name=@mysql_result($awaysg_name,0,"surname");
$awaysf_name = @mysql_query("SELECT name, surname FROM players WHERE id =$away_sf1 LIMIT 1");
$asf_name=@mysql_result($awaysf_name,0,"name");
$asf1name=@mysql_result($awaysf_name,0,"surname");
$awaypf_name = @mysql_query("SELECT name, surname FROM players WHERE id =$away_pf1 LIMIT 1");
$apf_name=@mysql_result($awaypf_name,0,"name");
$apf1name=@mysql_result($awaypf_name,0,"surname");
$awayc_name = @mysql_query("SELECT name, surname FROM players WHERE id =$away_c1 LIMIT 1");
$ac_name=@mysql_result($awayc_name,0,"name");
$ac1name=@mysql_result($awayc_name,0,"surname");

$gled = $gl1 + $gl2 + $gl3 + $gl4;
$ar1 = mysql_query("SELECT arenaname FROM arena WHERE teamid ='$arena' LIMIT 1");
$imearene=mysql_result($ar1,0);
$imearene=stripslashes($imearene);

$splitdt1 = explode(" ", $time_tekme); $bdate1 = $splitdt1[0]; $btime1 = $splitdt1[1];
$splitd1 = explode("-", $bdate1); $byear1 = $splitd1[0]; $bmonth1 = $splitd1[1]; $bday1 = $splitd1[2];
$splitt1 = explode(":", $btime1); $bhour1 = $splitt1[0]; $bmin1 = $splitt1[1]; $bsec1 = $splitt1[2];
$timdisp = date("d.m.Y H:i", mktime($bhour1,$bmin1,$bsec1,$bmonth1,$bday1,$byear1));

if ($HQ1+$AQ1 >0) {
echo "<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td width=\"35%\" align=\"left\">",$timdisp,"</td><td align=\"center\" width=\"30%\">";
rate($matchid,$member);
echo "</td><td align=\"right\" width=\"35%\">",$langmark647,": ",$matchid,"</td></tr></table>";
} else {
echo "<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td>",$timdisp," <a href=\"nt_prikaz.php?matchid=",$matchid,"&action=multiview\"><img src=\"img/live.jpg\" border=\"0\" alt=\"",$langmark332,"\" title=\"",$langmark332,"\"></a></td><td align=\"right\">",$langmark647,": ",$matchid,"</td></tr></table>";
}

$home_id=$prvaekipa;
$away_id=$drugaekipa;
?>
<table width="100%" cellspacing="2" cellpadding="1">
<tr>
<td class="gborder">
<?php
$i=0;
while ($i < $num) {
$event_id=mysql_result($result,$i,"event_id");
$player1id=mysql_result($result,$i,"player1id");
$team1id=mysql_result($result,$i,"team1id");
$player2id=mysql_result($result,$i,"player2id");
$team2id=mysql_result($result,$i,"team2id");
$event_type=mysql_result($result,$i,"event_type");
$desc_id=mysql_result($result,$i,"desc_id");
$event_time=mysql_result($result,$i,"event_time");
$quater=mysql_result($result,$i,"quater");
$home_sc=mysql_result($result,$i,"home_sc");
$away_sc=mysql_result($result,$i,"away_sc");

//minute
$event = explode(" ", $event_time); $eventd = $event[0]; $eventt = $event[1];
$seventd = explode("-", $eventd); $eventye = $seventd[0]; $eventmo = $seventd[1]; $eventda = $seventd[2];
$seventt = explode(":", $eventt); $eventho = $seventt[0]; $eventmi = $seventt[1]; $eventse = $seventt[2];

SWITCH ($quater) {
CASE 1:
$curmin = date("i", mktime($eventho-z1ho,$eventmi-$z1mi,$eventse-$z1se,$eventmo-$z1mo,$eventda-$z1da,$eventye-z1ye));
$cursec = date("s", mktime($eventho-z1ho,$eventmi-$z1mi,$eventse-$z1se,$eventmo-$z1mo,$eventda-$z1da,$eventye-z1ye));
$cur_time = 60 * $curmin + $cursec;
$dejansko = round(600*$cur_time/$sekunde1);
$dej_min = round($dejansko/60);
break;
CASE 2:
$curmin = date("i", mktime($eventho-z2ho,$eventmi-$z2mi,$eventse-$z2se,$eventmo-$z2mo,$eventda-$z2da,$eventye-z2ye));
$cursec = date("s", mktime($eventho-z2ho,$eventmi-$z2mi,$eventse-$z2se,$eventmo-$z2mo,$eventda-$z2da,$eventye-z2ye));
$cur_time = 60 * $curmin + $cursec;
$dejansko = round(600*$cur_time/$sekunde2);
$dej_min = round($dejansko/60)+10;
break;
CASE 3:
$curmin = date("i", mktime($eventho-z3ho,$eventmi-$z3mi,$eventse-$z3se,$eventmo-$z3mo,$eventda-$z3da,$eventye-z3ye));
$cursec = date("s", mktime($eventho-z3ho,$eventmi-$z3mi,$eventse-$z3se,$eventmo-$z3mo,$eventda-$z3da,$eventye-z3ye));
$cur_time = 60 * $curmin + $cursec;
$dejansko = round(600*$cur_time/$sekunde3);
$dej_min = round($dejansko/60)+20;
break;
CASE 4:
$curmin = date("i", mktime($eventho-z4ho,$eventmi-$z4mi,$eventse-$z4se,$eventmo-$z4mo,$eventda-$z4da,$eventye-z4ye));
$cursec = date("s", mktime($eventho-z4ho,$eventmi-$z4mi,$eventse-$z4se,$eventmo-$z4mo,$eventda-$z4da,$eventye-z4ye));
$cur_time = 60 * $curmin + $cursec;
$dejansko = round(600*$cur_time/$sekunde4);
$dej_min = round($dejansko/60)+30;
break;
}
//konec minut

$tp1 = mysql_query("SELECT country FROM countries WHERE countryid=$team1id LIMIT 1");
$jam = mysql_num_rows($tp1);
if ($jam > 0){$temname=mysql_result($tp1,0);}
if ($type > 10) {$temname = $temname." U19";}
$tp2 = mysql_query("SELECT country FROM countries WHERE countryid=$team2id LIMIT 1");
$lum = mysql_num_rows($tp2);
if ($lum > 0){$temname2=mysql_result($tp2,0);}
if ($type > 10) {$temname2 = $temname2." U19";}
$resultp1 = mysql_query("SELECT name,surname FROM players WHERE id=$player1id LIMIT 1");
$drum = mysql_num_rows($resultp1);
if ($drum > 0){
$name1=mysql_result($resultp1,0,"name");
$surname1=mysql_result($resultp1,0,"surname");
}
$resultp2 = mysql_query("SELECT name,surname FROM players WHERE id=$player2id LIMIT 1");
$bum = mysql_num_rows($resultp2);
if ($bum > 0){
$name2=mysql_result($resultp2,0,"name");
$surname2=mysql_result($resultp2,0,"surname");
}
$query = mysql_query("SELECT description FROM descriptions WHERE descid=$desc_id LIMIT 1");
while ($users_team = mysql_fetch_array($query, MYSQL_ASSOC))
   {   foreach ($users_team as $get_team)
   {$get_team; }     } ;

if ($team1id==$prvaekipa){
$get_team=str_replace('$team1id',"<font color=#56704B><b>$temname</b></font>",$get_team);
$get_team=str_replace('$team2id',"<font color=#A30006><b>$temname2</b></font>",$get_team);
}
if ($team1id==$drugaekipa){
$get_team=str_replace('$team1id',"<font color=#A30006><b>$temname</b></font>",$get_team);
$get_team=str_replace('$team2id',"<font color=#56704B><b>$temname2</b></font>",$get_team);
}

if ($player1id == $home_pg1 OR $player1id == $home_sg1 OR $player1id == $home_sf1 OR $player1id == $home_pf1 OR $player1id == $home_c1 OR $player1id == $home_pg2 OR $player1id == $home_sg2 OR $player1id == $home_sf2 OR $player1id == $home_pf2 OR $player1id == $home_c2){
$get_team=str_replace('$player1id',"<font color=#56704B><b>$surname1</b></font>",$get_team);} else { $get_team=str_replace('$player1id',"<font color=#A30006><b>$surname1</b></font>",$get_team);}
if ($player2id == $home_pg1 OR $player2id == $home_sg1 OR $player2id == $home_sf1 OR $player2id == $home_pf1 OR $player2id == $home_c1 OR $player2id == $home_pg2 OR $player2id == $home_sg2 OR $player2id == $home_sf2 OR $player2id == $home_pf2 OR $player2id == $home_c2){
$get_team=str_replace('$player2id',"<font color=#56704B><b>$surname2</b></font>",$get_team);} else { $get_team=str_replace('$player2id',"<font color=#A30006><b>$surname2</b></font>",$get_team);}

$get_team=str_replace('$home_sc',"$home_sc",$get_team);
$get_team=str_replace('$away_sc.',"$away_sc",$get_team);

if ($refresh==1798) {echo "<u>",$dej_min,"min</u>: ",stripslashes($get_team),"<br/>";}

$i++;
}
if ($refresh <>1798) {echo $langmark690,". <a href=\"nt_matchreport.php?matchid=",$matchid,"\">",$langmark1273,"</a>";}
?>
</td></tr></table>

<table border="1" cellspacing="0" cellpadding="1" width="100%" style="border-spacing: 0px; border-collapse: separate; border-style: hidden;">
<tr><td align="center" width="39%" class="gborder"><img src="img/Flags/<?=$home_name?>.png" border="1" alt=""><br/><?php if($type>10){?><a href="u18teams.php?country=<?=$home_name?>" class="greenhilite"><?php } else {?><a href="nationalteams.php?country=<?=$home_name?>" class="greenhilite"><?php }?>
<b><font color="#56704B"><?php if ($type > 10) {echo $home_name." U19";} else {echo $home_name;}?></font></b></a></td>
<td align="center" width="22%" class="gborder">
<?php
$testhome_sc=mysql_result($result,0,"home_sc");
$testaway_sc=mysql_result($result,0,"away_sc");
if ($AQ1>0 OR $HQ1>0) {?>
<table cellspacing="0" cellpadding="0" width="100%"><tr>
<td align="center" border="0" title="1st quarter result"><b><?=$HQ1?></b></td>
<td align="center" border="0" title="2nd quarter result"><b><?=($HQ2-$HQ1)?></b></td>
<td align="center" border="0" title="3rd quarter result"><b><?=($HQ3-$HQ2)?></b></td>
<td align="center" border="0" title="4th quarter result"><b><?=($hscoreN-$HQ3)?></b></td>
</tr><tr>
<td align="center" border="0" title="1st quarter result"><b><?=$AQ1?></b></td>
<td align="center" border="0" title="2nd quarter result"><b><?=($AQ2-$AQ1)?></b></td>
<td align="center" border="0" title="3rd quarter result"><b><?=($AQ3-$AQ2)?></b></td>
<td align="center" border="0" title="4th quarter result"><b><?=($ascoreN-$AQ3)?></b></td>
</tr></table><?php } else {echo "&nbsp;<br/>&nbsp;";}?>
</td><td align="center" width="39%" class="gborder"><img src="img/Flags/<?=$away_name?>.png" border="1" alt=""><br/><?php if($type>10){?><a href="u18teams.php?country=<?=$away_name?>" class="greenhilite"><?php } else {?><a href="nationalteams.php?country=<?=$away_name?>" class="greenhilite"><?php }?>
<b><font color="#A30006"><?php if ($type > 10) {echo $away_name." U19";} else {echo $away_name;}?></font></b></a></td></tr>
<tr>
<td bgcolor="#B6DEAE" align="center" class="gborder"><b><?php if ($refresh==1798 OR $hscoreN==0) {echo $testhome_sc;} else {echo $hscoreN;}?></b></td>
<td align="center" class="gborder"><b><?=$langmark692?></b></td>
<td bgcolor="#E9967A" align="center" class="gborder"><b><?php if ($refresh==1798 OR $ascoreN==0) {echo $testaway_sc;} else {echo $ascoreN;}?></b></td>
</tr>
<td bgcolor="#B6DEAE" align="center" class="gborder">
<?php
//TIMSKI STATSI

//twopoints - domaci
$sql_faljeni2 = "SELECT COUNT(*) AS faljeni2 FROM nt_matchevents WHERE team1id=$prvaekipa AND event_time < '$zdaj' AND (event_type=3 OR event_type=4 OR event_type=28 OR event_type=29 OR event_type=31) AND match_id ='$matchid'";
$query_faljeni2 = mysql_query($sql_faljeni2);
$row1 = mysql_fetch_array($query_faljeni2, MYSQL_ASSOC);
$sql_zadeti2 = "SELECT COUNT(*) AS zadeti2 FROM nt_matchevents WHERE team1id=$prvaekipa AND event_time < '$zdaj' AND (event_type=1 OR event_type=2 OR event_type=27 OR event_type=23 OR event_type=12) AND match_id ='$matchid'";
$query_zadeti2 = mysql_query($sql_zadeti2);
$row2 = mysql_fetch_array($query_zadeti2, MYSQL_ASSOC);
$faljeni2 = $row1['faljeni2'];
$zadeti2 = $row2['zadeti2'];
$skupaj2 = $faljeni2 + $zadeti2;
if ($skupaj2 <>0) {$kolicnik2 = round(100*$zadeti2/$skupaj2);}
echo $zadeti2,"/",$skupaj2,"&nbsp;(";
if ($skupaj2 <>0) {echo $kolicnik2,"%)<br/>";} else {echo " - )<br/>";}
?>
</td>
<td align="center" class="gborder"><?=$langmark693?></td>
<td bgcolor="#E9967A" align="center" class="gborder">
<?php
//gostje
$sql_faljeni2 = "SELECT COUNT(*) AS faljeni2 FROM nt_matchevents WHERE team1id=$drugaekipa AND event_time < '$zdaj' AND (event_type=3 OR event_type=4 OR event_type=28 OR event_type=29 OR event_type=31) AND match_id ='$matchid'";
$query_faljeni2 = mysql_query($sql_faljeni2);
$row1 = mysql_fetch_array($query_faljeni2, MYSQL_ASSOC);
$sql_zadeti2 = "SELECT COUNT(*) AS zadeti2 FROM nt_matchevents WHERE team1id=$drugaekipa AND event_time < '$zdaj' AND (event_type=1 OR event_type=2 OR event_type=27 OR event_type=23 OR event_type=12) AND match_id ='$matchid'";
$query_zadeti2 = mysql_query($sql_zadeti2);
$row2 = mysql_fetch_array($query_zadeti2, MYSQL_ASSOC);
$faljeni2 = $row1['faljeni2'];
$zadeti2 = $row2['zadeti2'];
$skupaj2 = $faljeni2 + $zadeti2;
if ($skupaj2 <>0) {$kolicnik2 = round(100*$zadeti2/$skupaj2);}
echo $zadeti2,"/",$skupaj2,"&nbsp;(";
if ($skupaj2 <>0) {echo $kolicnik2,"%)<br/>";} else {echo " - )<br/>";}
?>
</td></tr>
<tr><td bgcolor="#B6DEAE" align="center" class="gborder">
<?php
//trojke - domaci
$sql_faljeni3 = "SELECT COUNT(*) AS faljeni3 FROM nt_matchevents WHERE team1id=$prvaekipa AND event_time < '$zdaj' AND (event_type=8 OR event_type=9) AND match_id ='$matchid'";
$query_faljeni3 = mysql_query($sql_faljeni3);
$row1 = mysql_fetch_array($query_faljeni3, MYSQL_ASSOC);
$sql_zadeti3 = "SELECT COUNT(*) AS zadeti3 FROM nt_matchevents WHERE team1id=$prvaekipa AND event_time < '$zdaj' AND (event_type=7 OR event_type=13 OR event_type=24) AND match_id ='$matchid'";
$query_zadeti3 = mysql_query($sql_zadeti3);
$row2 = mysql_fetch_array($query_zadeti3, MYSQL_ASSOC);
$faljeni3 = $row1['faljeni3'];
$zadeti3 = $row2['zadeti3'];
$skupaj3 = $faljeni3 + $zadeti3;
if ($skupaj3 <>0) {$kolicnik3 = round(100*$zadeti3/$skupaj3);}
echo $zadeti3,"/",$skupaj3,"&nbsp;(";
if ($skupaj3 <>0) {echo $kolicnik3,"%)<br/>";} else {echo " - )<br/>";}
?>
</td>
<td align="center" class="gborder"><?=$langmark694?></td>
<td bgcolor="#E9967A" align="center" class="gborder">
<?php
//gostje
$sql_faljeni3 = "SELECT COUNT(*) AS faljeni3 FROM nt_matchevents WHERE team1id =$drugaekipa AND event_time < '$zdaj' AND (event_type=8 OR event_type=9) AND match_id ='$matchid'";
$query_faljeni3 = mysql_query($sql_faljeni3);
$row1 = mysql_fetch_array($query_faljeni3, MYSQL_ASSOC);
$sql_zadeti3 = "SELECT COUNT(*) AS zadeti3 FROM nt_matchevents WHERE team1id =$drugaekipa AND event_time < '$zdaj' AND (event_type=7 OR event_type=13 OR event_type=24) AND match_id ='$matchid'";
$query_zadeti3 = mysql_query($sql_zadeti3);
$row2 = mysql_fetch_array($query_zadeti3, MYSQL_ASSOC);
$faljeni3 = $row1['faljeni3'];
$zadeti3 = $row2['zadeti3'];
$skupaj3 = $faljeni3 + $zadeti3;
if ($skupaj3 != 0) {$kolicnik3 = round(100*$zadeti3/$skupaj3);}
echo $zadeti3,"/",$skupaj3,"&nbsp;(";
if ($skupaj3 != 0) {echo $kolicnik3,"%)<br/>";} else {echo " - )<br/>";}
?>
</td></tr>
<tr><td bgcolor="#B6DEAE" align="center" class="gborder">
<?php
//prosti meti - domaci
//vrzeni
$sqlp2meta = "SELECT COUNT(*) AS p2meta FROM nt_matchevents WHERE team1id =$prvaekipa AND event_time < '$zdaj' AND (event_type=14 OR event_type=15 OR event_type=16) AND match_id ='$matchid'";
$queryp2meta = mysql_query($sqlp2meta);
$rowp2meta = mysql_fetch_array($queryp2meta, MYSQL_ASSOC);
$sqlp3meti = "SELECT COUNT(*) AS p3meti FROM nt_matchevents nt_matchevents WHERE team1id =$prvaekipa AND event_time < '$zdaj' AND (event_type=17 OR event_type=18 OR event_type=19 OR event_type=20) AND match_id ='$matchid'";
$queryp3meti = mysql_query($sqlp3meti);
$rowp3meti = mysql_fetch_array($queryp3meti, MYSQL_ASSOC);
$sqlp1met = "SELECT COUNT(*) AS p1met FROM nt_matchevents WHERE team1id =$prvaekipa AND event_time < '$zdaj' AND (event_type=21 OR event_type=22) AND match_id ='$matchid'";
$queryp1met = mysql_query($sqlp1met);
$rowp1met = mysql_fetch_array($queryp1met, MYSQL_ASSOC);
$p2meta = $rowp2meta['p2meta'];
$p3meti = $rowp3meti['p3meti'];
$p1met = $rowp1met['p1met'];
//zadeti
$sqlp2meta_z = "SELECT COUNT(*) AS p2meta_z FROM nt_matchevents WHERE team1id =$prvaekipa AND event_time < '$zdaj' AND (event_type=14 OR event_type=18) AND match_id ='$matchid'";
$queryp2meta_z = mysql_query($sqlp2meta_z);
$rowp2meta_z = mysql_fetch_array($queryp2meta_z, MYSQL_ASSOC);
$sqlp3meti_z = "SELECT COUNT(*) AS p3meti_z FROM nt_matchevents WHERE team1id =$prvaekipa AND event_time < '$zdaj' AND event_type=17 AND match_id ='$matchid'";
$queryp3meti_z = mysql_query($sqlp3meti_z);
$rowp3meti_z = mysql_fetch_array($queryp3meti_z, MYSQL_ASSOC);
$sqlp1met_z = "SELECT COUNT(*) AS p1met_z FROM nt_matchevents WHERE team1id =$prvaekipa AND event_time < '$zdaj' AND (event_type=15 OR event_type=19 OR event_type=21) AND match_id ='$matchid'";
$queryp1met_z = mysql_query($sqlp1met_z);
$rowp1met_z = mysql_fetch_array($queryp1met_z, MYSQL_ASSOC);
$p2meta_z = $rowp2meta_z['p2meta_z'];
$p3meti_z = $rowp3meti_z['p3meti_z'];
$p1met_z = $rowp1met_z['p1met_z'];
$vrzeni1 = 2*$p2meta + 3*$p3meti + $p1met;
$zadeti1 = 2*$p2meta_z + 3*$p3meti_z + $p1met_z;
if ($vrzeni1 != 0) {$kolicnik1 = round(100*$zadeti1/$vrzeni1);}
echo $zadeti1,"/",$vrzeni1,"&nbsp;(";
if ($vrzeni1 != 0) {echo $kolicnik1,"%)<br/>";} else {echo " - )<br/>";}
?>
</td>
<td align="center" class="gborder"><?=$langmark712?></td>
<td bgcolor="#E9967A" align="center" class="gborder">
<?php
//gostje
//vrzeni
$sqlp2meta = "SELECT COUNT(*) AS p2meta FROM nt_matchevents WHERE team1id=$drugaekipa AND event_time < '$zdaj' AND (event_type=14 OR event_type=15 OR event_type=16) AND match_id ='$matchid'";
$queryp2meta = mysql_query($sqlp2meta);
$rowp2meta = mysql_fetch_array($queryp2meta, MYSQL_ASSOC);
$sqlp3meti = "SELECT COUNT(*) AS p3meti FROM nt_matchevents WHERE team1id=$drugaekipa AND event_time < '$zdaj' AND (event_type=17 OR event_type=18 OR event_type=19 OR event_type=20) AND match_id ='$matchid'";
$queryp3meti = mysql_query($sqlp3meti);
$rowp3meti = mysql_fetch_array($queryp3meti, MYSQL_ASSOC);
$sqlp1met = "SELECT COUNT(*) AS p1met FROM nt_matchevents WHERE team1id=$drugaekipa AND event_time < '$zdaj' AND (event_type=21 OR event_type=22) AND match_id ='$matchid'";
$queryp1met = mysql_query($sqlp1met);
$rowp1met = mysql_fetch_array($queryp1met, MYSQL_ASSOC);
$p2meta = $rowp2meta['p2meta'];
$p3meti = $rowp3meti['p3meti'];
$p1met = $rowp1met['p1met'];
//zadeti
$sqlp2meta_z = "SELECT COUNT(*) AS p2meta_z FROM nt_matchevents WHERE team1id=$drugaekipa AND event_time < '$zdaj' AND (event_type=14 OR event_type=18) AND match_id ='$matchid'";
$queryp2meta_z = mysql_query($sqlp2meta_z);
$rowp2meta_z = mysql_fetch_array($queryp2meta_z, MYSQL_ASSOC);
$sqlp3meti_z = "SELECT COUNT(*) AS p3meti_z FROM nt_matchevents WHERE team1id=$drugaekipa AND event_time < '$zdaj' AND event_type=17 AND match_id ='$matchid'";
$queryp3meti_z = mysql_query($sqlp3meti_z);
$rowp3meti_z = mysql_fetch_array($queryp3meti_z, MYSQL_ASSOC);
$sqlp1met_z = "SELECT COUNT(*) AS p1met_z FROM nt_matchevents WHERE team1id=$drugaekipa AND event_time < '$zdaj' AND (event_type=15 OR event_type=19 OR event_type=21) AND match_id ='$matchid'";
$queryp1met_z = mysql_query($sqlp1met_z);
$rowp1met_z = mysql_fetch_array($queryp1met_z, MYSQL_ASSOC);
$p2meta_z = $rowp2meta_z['p2meta_z'];
$p3meti_z = $rowp3meti_z['p3meti_z'];
$p1met_z = $rowp1met_z['p1met_z'];
$vrzeni1 = 2*$p2meta + 3*$p3meti + $p1met;
$zadeti1 = 2*$p2meta_z + 3*$p3meti_z + $p1met_z;
if ($vrzeni1 != 0) {$kolicnik1 = round(100*$zadeti1/$vrzeni1);}
echo $zadeti1,"/",$vrzeni1,"&nbsp;(";
if ($vrzeni1 != 0) {echo $kolicnik1,"%)<br/>";} else {echo " - )<br/>";}
?>
</td></tr>
<tr><td bgcolor="#B6DEAE" align="center" class="gborder">
<?php
//skoki - domaci
$sql_defen = "SELECT COUNT(*) AS defen FROM nt_matchevents WHERE team2id=$prvaekipa AND event_time < '$zdaj' AND (event_type=4 OR event_type=9 OR event_type=28) AND match_id ='$matchid'";
$query_defen = mysql_query($sql_defen);
$row1 = mysql_fetch_array($query_defen, MYSQL_ASSOC);
$sql_ofen = "SELECT COUNT(*) AS ofen FROM nt_matchevents WHERE team2id=$prvaekipa AND event_time < '$zdaj' AND (event_type=3 OR event_type=8 OR event_type=29) AND match_id ='$matchid'";
$query_ofen = mysql_query($sql_ofen);
$row2 = mysql_fetch_array($query_ofen, MYSQL_ASSOC);
$defen = $row1['defen'];
$ofen = $row2['ofen'];
$skokov = $defen + $ofen;
echo $skokov,"&nbsp;(",$defen," + ",$ofen,")<br/>";
?>
</td>
<td align="center" class="gborder"><?=$langmark124?></td>
<td bgcolor="#E9967A" align="center" class="gborder">
<?php
//gostje
$sql_defen = "SELECT COUNT(*) AS defen FROM nt_matchevents WHERE team2id=$drugaekipa AND event_time < '$zdaj' AND (event_type=4 OR event_type=9 OR event_type=28) AND match_id ='$matchid'";
$query_defen = mysql_query($sql_defen);
$row1 = mysql_fetch_array($query_defen, MYSQL_ASSOC);
$sql_ofen = "SELECT COUNT(*) AS ofen FROM nt_matchevents WHERE team2id=$drugaekipa AND event_time < '$zdaj' AND (event_type=3 OR event_type=8 OR event_type=29) AND match_id ='$matchid'";
$query_ofen = mysql_query($sql_ofen);
$row2 = mysql_fetch_array($query_ofen, MYSQL_ASSOC);
$defen = $row1['defen'];
$ofen = $row2['ofen'];
$skokov = $defen + $ofen;
echo $skokov,"&nbsp;(",$defen," + ",$ofen,")<br/>";
?>
</td></tr>
<tr><td bgcolor="#B6DEAE" align="center" class="gborder">
<?php
//podaje - domaci
$sql_podaj = "SELECT COUNT(*) AS podaj FROM nt_matchevents WHERE team2id=$prvaekipa AND event_time < '$zdaj' AND event_type=1 AND match_id ='$matchid'";
$query_podaj = mysql_query($sql_podaj);
$row1 = mysql_fetch_array($query_podaj, MYSQL_ASSOC);
$podaj = $row1['podaj'];
echo $podaj,"<br/>";
?>
</td>
<td align="center" class="gborder"><?=$langmark695?></td>
<td bgcolor="#E9967A" align="center" class="gborder">
<?php
//gostje
$sql_podaj = "SELECT COUNT(*) AS podaj FROM nt_matchevents WHERE team2id=$drugaekipa AND event_time < '$zdaj' AND event_type=1 AND match_id ='$matchid'";
$query_podaj = mysql_query($sql_podaj);
$row1 = mysql_fetch_array($query_podaj, MYSQL_ASSOC);
$podaj = $row1['podaj'];
echo $podaj,"<br/>";
?>
</td></tr>
<tr><td bgcolor="#B6DEAE" align="center" class="gborder">
<?php
//osebne - domaci
$sql_osebne = "SELECT COUNT(*) AS osebne FROM nt_matchevents WHERE event_time < '$zdaj' AND team2id=$prvaekipa AND (event_type=10 OR event_type=11 OR event_type=12 OR event_type=13 OR event_type=30 OR event_type=32) AND match_id ='$matchid'";
$query_osebne = mysql_query($sql_osebne);
$row1 = mysql_fetch_array($query_osebne, MYSQL_ASSOC);
$osebne = $row1['osebne'];
echo $osebne,"<br/>";
?>
</td>
<td align="center" class="gborder"><?=$langmark696?></td>
<td bgcolor="#E9967A" align="center" class="gborder">
<?php
//gostje
$sql_osebne = "SELECT COUNT(*) AS osebne FROM nt_matchevents WHERE event_time < '$zdaj' AND team2id=$drugaekipa AND (event_type=10 OR event_type=11 OR event_type=12 OR event_type=13 OR event_type=30 OR event_type=32) AND match_id ='$matchid'";
$query_osebne = mysql_query($sql_osebne);
$row1 = mysql_fetch_array($query_osebne, MYSQL_ASSOC);
$osebne = $row1['osebne'];
echo $osebne,"<br/>";
?>
</td></tr>
<tr><td bgcolor="#B6DEAE" align="center" class="gborder">
<?php
//ukradene - domaci
$sql_ukrad = "SELECT COUNT(*) AS ukrad FROM nt_matchevents WHERE event_time < '$zdaj' AND team2id=$prvaekipa AND event_type=6 AND match_id ='$matchid'";
$query_ukrad = mysql_query($sql_ukrad);
$row1 = mysql_fetch_array($query_ukrad, MYSQL_ASSOC);
$ukrad = $row1['ukrad'];
echo $ukrad,"<br/>";
?>
</td>
<td align="center" class="gborder"><?=$langmark697?></td>
<td bgcolor="#E9967A" align="center" class="gborder">
<?php
//gostje
$sql_ukrad = "SELECT COUNT(*) AS ukrad FROM nt_matchevents WHERE event_time < '$zdaj' AND team2id=$drugaekipa AND event_type=6 AND match_id ='$matchid'";
$query_ukrad = mysql_query($sql_ukrad);
$row1 = mysql_fetch_array($query_ukrad, MYSQL_ASSOC);
$ukrad = $row1['ukrad'];
echo $ukrad,"<br/>";
?>
</td></tr>
<tr><td bgcolor="#B6DEAE" align="center" class="gborder">
<?php
//napake - domaci
$sql_napak = "SELECT COUNT(*) AS napak FROM nt_matchevents WHERE event_time < '$zdaj' AND team1id=$prvaekipa AND (event_type=5 OR event_type=6 OR event_type=26) AND match_id ='$matchid'";
$query_napak = mysql_query($sql_napak);
$row1 = mysql_fetch_array($query_napak, MYSQL_ASSOC);
$napak = $row1['napak'];
echo $napak,"<br/>";
?>
</td>
<td align="center" class="gborder"><?=$langmark698?></td>
<td bgcolor="#E9967A" align="center" class="gborder">
<?php
//gostje
$sql_napak = "SELECT COUNT(*) AS napak FROM nt_matchevents WHERE event_time < '$zdaj' AND team1id=$drugaekipa AND (event_type=5 OR event_type=6 OR event_type=26) AND match_id ='$matchid'";
$query_napak = mysql_query($sql_napak);
$row1 = mysql_fetch_array($query_napak, MYSQL_ASSOC);
$napak = $row1['napak'];
echo $napak,"<br/>";
?>
</td></tr>
<tr><td bgcolor="#B6DEAE" align="center" class="gborder">
<?php
//blokade - domaci
$sql_banan = "SELECT COUNT(*) AS banan FROM nt_matchevents WHERE team2id=$prvaekipa AND event_time < '$zdaj' AND event_type=31 AND match_id ='$matchid'";
$query_banan = mysql_query($sql_banan);
$row1 = mysql_fetch_array($query_banan, MYSQL_ASSOC);
$banan = $row1['banan'];
echo $banan,"<br/>";
?>
</td>
<td align="center" class="gborder"><?=$langmark699?></td>
<td bgcolor="#E9967A" align="center" class="gborder">
<?php
//gostje
$sql_banan = "SELECT COUNT(*) AS banan FROM nt_matchevents WHERE team2id=$drugaekipa AND event_time < '$zdaj' AND event_type=31 AND match_id ='$matchid'";
$query_banan = mysql_query($sql_banan);
$row1 = mysql_fetch_array($query_banan, MYSQL_ASSOC);
$banan = $row1['banan'];
echo $banan,"<br/>";
?>
</td></tr>
</table>
<?php
//KONEC TEAMSTATSOV
?>

<table width="100%" border="1" cellpadding="0" cellspacing="0" style="border-spacing: 0px; border-collapse: separate; border-style: hidden;">
<tr>
<td class="gborder" onmouseover="this.style.backgroundColor='orange';" onmouseout="this.style.backgroundColor='white';"><b><?=$langmark404?></b></td>
<td align="center" class="gborder" onmouseover="this.style.backgroundColor='orange';" onmouseout="this.style.backgroundColor='white';"><b><?=$langmark700?></b></td>
<td align="center" class="gborder" onmouseover="this.style.backgroundColor='orange';" onmouseout="this.style.backgroundColor='white';"><b><?=$langmark701?></b></td>
<td align="center" class="gborder" onmouseover="this.style.backgroundColor='orange';" onmouseout="this.style.backgroundColor='white';"><b><?=$langmark702?></b></td>
<td align="center" class="gborder" onmouseover="this.style.backgroundColor='orange';" onmouseout="this.style.backgroundColor='white';"><b><?=$langmark703?></b></td>
<td align="center" class="gborder" onmouseover="this.style.backgroundColor='orange';" onmouseout="this.style.backgroundColor='white';"><b><?=$langmark704?></b></td>
<td align="center" class="gborder" onmouseover="this.style.backgroundColor='orange';" onmouseout="this.style.backgroundColor='white';"><b><?=$langmark705?></b></td>
<td align="center" class="gborder" onmouseover="this.style.backgroundColor='orange';" onmouseout="this.style.backgroundColor='white';"><b><?=$langmark706?></b></td>
<td align="center" class="gborder" onmouseover="this.style.backgroundColor='orange';" onmouseout="this.style.backgroundColor='white';"><b><?=$langmark707?></b></td>
<td align="center" class="gborder" onmouseover="this.style.backgroundColor='orange';" onmouseout="this.style.backgroundColor='white';"><b><?=$langmark708?></b></td>
<td align="center" class="gborder" onmouseover="this.style.backgroundColor='orange';" onmouseout="this.style.backgroundColor='white';"><b><?=$langmark709?></b></td>
<td align="center" class="gborder" onmouseover="this.style.backgroundColor='orange';" onmouseout="this.style.backgroundColor='white';"><b><?=$langmark710?></b></td>
</tr>

<?php
$String=array ("$home_pg1","$home_sg1","$home_sf1","$home_pf1","$home_c1","$away_pg1","$away_sg1","$away_sf1","$away_pf1","$away_c1","$home_pg2","$home_sg2","$home_sf2","$home_pf2","$home_c2", "$away_pg2","$away_sg2","$away_sf2","$away_pf2","$away_c2");
$f=0;
while ($f < 20)
     {

if ($String[$f])
{

$sur = @mysql_query("SELECT id, surname, country FROM players WHERE id=$String[$f]");
$sur1 = @mysql_result($sur,0,"surname");
$cou12 = @mysql_result($sur,0,"country");
if ($cou12=='Greece' AND strlen($sur1) > 12) {$sur1 = substr($sur1,0,12); $sur1 = $sur1.".";}
$sur2 = @mysql_result($sur,0,"id");
//upokojen
if (empty($sur1)) {$sur1="<i>".$langmark759."</i>";} else {$sur1="<a class=\"greenhilite\" href=\"player.php?playerid=".$sur2."\">".$sur1."</a>";}

if ($f < 5 OR ($f >9 AND $f < 15)) {$bgcolor='#B6DEAE';} else {$bgcolor='#E9967A';}

$sql_ena = "SELECT COUNT(*) AS za_ena FROM nt_matchevents WHERE event_time < '$zdaj' AND player1id=$String[$f] AND (event_type=15 OR event_type=19 OR event_type=21) AND match_id ='$matchid'";
$query_ena = mysql_query($sql_ena);
$row1 = mysql_fetch_array($query_ena, MYSQL_ASSOC);
$sql_dve = "SELECT COUNT(*) AS za_dve FROM nt_matchevents WHERE event_time < '$zdaj' AND player1id=$String[$f] AND (event_type=1 OR event_type=2 OR event_type=14 OR event_type=18 OR event_type=27 OR event_type=23 OR event_type=12) AND match_id ='$matchid'";
$query_dve = mysql_query($sql_dve);
$row2 = mysql_fetch_array($query_dve, MYSQL_ASSOC);
$sql_tri = "SELECT COUNT(*) AS za_tri FROM nt_matchevents WHERE event_time < '$zdaj' AND player1id=$String[$f] AND (event_type=7 OR event_type=17 OR event_type=24 OR event_type=13) AND match_id ='$matchid'";
$query_tri = mysql_query($sql_tri);
$row3 = mysql_fetch_array($query_tri, MYSQL_ASSOC);
$enke = $row1['za_ena'];
$dvojke = $row2['za_dve'];
$trojke = $row3['za_tri'];
$pl1score = $enke + $dvojke * 2 + $trojke * 3;
echo "<tr><td bgcolor=\"",$bgcolor,"\" class=\"gborder\">",$sur1,"</td><td bgcolor=\"",$bgcolor,"\" align=\"center\" class=\"gborder\">",$pl1score,"</td>";

$sql_faljeni2 = "SELECT COUNT(*) AS faljeni2 FROM nt_matchevents WHERE event_time < '$zdaj' AND player1id=$String[$f] AND (event_type=3 OR event_type=4 OR event_type=28 OR event_type=29 OR event_type=31) AND match_id ='$matchid'";
$query_faljeni2 = mysql_query($sql_faljeni2);
$row1 = mysql_fetch_array($query_faljeni2, MYSQL_ASSOC);
$sql_zadeti2 = "SELECT COUNT(*) AS zadeti2 FROM nt_matchevents WHERE event_time < '$zdaj' AND player1id=$String[$f] AND (event_type=1 OR event_type=2 OR event_type=27 OR event_type=23 OR event_type=12) AND match_id ='$matchid'";
$query_zadeti2 = mysql_query($sql_zadeti2);
$row2 = mysql_fetch_array($query_zadeti2, MYSQL_ASSOC);
$faljeni2 = $row1['faljeni2'];
$zadeti2 = $row2['zadeti2'];
$skupaj2 = $faljeni2 + $zadeti2;
if ($skupaj2 <>0) {$kolicnik2 = round(100*$zadeti2/$skupaj2);}
echo "<td bgcolor=\"",$bgcolor,"\" align=\"center\" class=\"gborder\">",$zadeti2."/".$skupaj2."&nbsp;(";
if ($skupaj2 <>0) {echo $kolicnik2,"%)</td>";} else {echo " - )</td>";}

$sql_faljeni3 = "SELECT COUNT(*) AS faljeni3 FROM nt_matchevents WHERE event_time < '$zdaj' AND player1id=$String[$f] AND (event_type=8 OR event_type=9) AND match_id ='$matchid'";
$query_faljeni3 = mysql_query($sql_faljeni3);
$row1 = mysql_fetch_array($query_faljeni3, MYSQL_ASSOC);
$sql_zadeti3 = "SELECT COUNT(*) AS zadeti3 FROM nt_matchevents WHERE event_time < '$zdaj' AND player1id=$String[$f] AND (event_type=7 OR event_type=13 OR event_type=24) AND match_id ='$matchid'";
$query_zadeti3 = mysql_query($sql_zadeti3);
$row2 = mysql_fetch_array($query_zadeti3, MYSQL_ASSOC);
$faljeni3 = $row1['faljeni3'];
$zadeti3 = $row2['zadeti3'];
$skupaj3 = $faljeni3 + $zadeti3;
if ($skupaj3 != 0) {$kolicnik3 = round(100*$zadeti3/$skupaj3);}
echo "<td bgcolor=\"",$bgcolor,"\" align=\"center\" class=\"gborder\">",$zadeti3,"/",$skupaj3,"&nbsp;(";
if ($skupaj3 != 0) {echo $kolicnik3,"%)</td>";} else {echo " - )</td>";}

$sqlp2meta = "SELECT COUNT(*) AS p2meta FROM nt_matchevents WHERE event_time < '$zdaj' AND player1id=$String[$f] AND (event_type=14 OR event_type=15 OR event_type=16) AND match_id ='$matchid'";
$queryp2meta = mysql_query($sqlp2meta);
$rowp2meta = mysql_fetch_array($queryp2meta, MYSQL_ASSOC);
$sqlp3meti = "SELECT COUNT(*) AS p3meti FROM nt_matchevents WHERE event_time < '$zdaj' AND player1id=$String[$f] AND (event_type=17 OR event_type=18 OR event_type=19 OR event_type=20) AND match_id ='$matchid'";
$queryp3meti = mysql_query($sqlp3meti);
$rowp3meti = mysql_fetch_array($queryp3meti, MYSQL_ASSOC);
$sqlp1met = "SELECT COUNT(*) AS p1met FROM nt_matchevents WHERE event_time < '$zdaj' AND player1id=$String[$f] AND (event_type=21 OR event_type=22) AND match_id ='$matchid'";
$queryp1met = mysql_query($sqlp1met);
$rowp1met = mysql_fetch_array($queryp1met, MYSQL_ASSOC);
$p2meta = $rowp2meta['p2meta'];
$p3meti = $rowp3meti['p3meti'];
$p1met = $rowp1met['p1met'];
//zadeti
$sqlp2meta_z = "SELECT COUNT(*) AS p2meta_z FROM nt_matchevents WHERE event_time < '$zdaj' AND player1id=$String[$f] AND (event_type=14 OR event_type=18) AND match_id ='$matchid'";
$queryp2meta_z = mysql_query($sqlp2meta_z);
$rowp2meta_z = mysql_fetch_array($queryp2meta_z, MYSQL_ASSOC);
$sqlp3meti_z = "SELECT COUNT(*) AS p3meti_z FROM nt_matchevents WHERE event_time < '$zdaj' AND player1id=$String[$f] AND event_type=17 AND match_id ='$matchid'";
$queryp3meti_z = mysql_query($sqlp3meti_z);
$rowp3meti_z = mysql_fetch_array($queryp3meti_z, MYSQL_ASSOC);
$sqlp1met_z = "SELECT COUNT(*) AS p1met_z FROM nt_matchevents WHERE event_time < '$zdaj' AND player1id=$String[$f] AND (event_type=15 OR event_type=19 OR event_type=21) AND match_id ='$matchid'";
$queryp1met_z = mysql_query($sqlp1met_z);
$rowp1met_z = mysql_fetch_array($queryp1met_z, MYSQL_ASSOC);
$p2meta_z = $rowp2meta_z['p2meta_z'];
$p3meti_z = $rowp3meti_z['p3meti_z'];
$p1met_z = $rowp1met_z['p1met_z'];
$vrzeni1 = 2*$p2meta + 3*$p3meti + $p1met;
$zadeti1 = 2*$p2meta_z + 3*$p3meti_z + $p1met_z;
if ($vrzeni1 != 0) {$kolicnik1 = round(100*$zadeti1/$vrzeni1);}
echo "<td bgcolor=\"",$bgcolor,"\" align=\"center\" class=\"gborder\">",$zadeti1,"/",$vrzeni1,"&nbsp;(";
if ($vrzeni1 != 0) {echo $kolicnik1,"%)</td>";} else {echo " - )</td>";}

$sql_defen = "SELECT COUNT(*) AS defen FROM nt_matchevents WHERE event_time < '$zdaj' AND player2id=$String[$f] AND (event_type=4 OR event_type=9 OR event_type=28) AND match_id ='$matchid'";
$query_defen = mysql_query($sql_defen);
$row1 = mysql_fetch_array($query_defen, MYSQL_ASSOC);
$sql_ofen = "SELECT COUNT(*) AS ofen FROM nt_matchevents WHERE event_time < '$zdaj' AND player2id=$String[$f] AND (event_type=3 OR event_type=8 OR event_type=29) AND match_id ='$matchid'";
$query_ofen = mysql_query($sql_ofen);
$row2 = mysql_fetch_array($query_ofen, MYSQL_ASSOC);
$defen = $row1['defen'];
$ofen = $row2['ofen'];
echo "<td bgcolor=\"",$bgcolor,"\" align=\"center\" class=\"gborder\">",$defen,"+",$ofen,"</td>";

$sql_podaj = "SELECT COUNT(*) AS podaj FROM nt_matchevents WHERE event_time < '$zdaj' AND player2id=$String[$f] AND event_type=1 AND match_id ='$matchid'";
$query_podaj = mysql_query($sql_podaj);
$row1 = mysql_fetch_array($query_podaj, MYSQL_ASSOC);
$podaj = $row1['podaj'];
echo "<td bgcolor=\"",$bgcolor,"\" align=\"center\" class=\"gborder\">",$podaj,"</td>";

$sql_osebne = "SELECT COUNT(*) AS osebne FROM nt_matchevents WHERE event_time < '$zdaj' AND player2id=$String[$f] AND (event_type=10 OR event_type=11 OR event_type=12 OR event_type=13 OR event_type=30 OR event_type=32) AND match_id ='$matchid'";
$query_osebne = mysql_query($sql_osebne);
$row1 = mysql_fetch_array($query_osebne, MYSQL_ASSOC);
$osebne = $row1['osebne'];
echo "<td bgcolor=\"",$bgcolor,"\" align=\"center\" class=\"gborder\">",$osebne,"</td>";

$sql_ukrad = "SELECT COUNT(*) AS ukrad FROM nt_matchevents WHERE event_time < '$zdaj' AND player2id=$String[$f] AND event_type=6 AND match_id ='$matchid'";
$query_ukrad = mysql_query($sql_ukrad);
$row1 = mysql_fetch_array($query_ukrad, MYSQL_ASSOC);
$ukrad = $row1['ukrad'];
echo "<td bgcolor=\"",$bgcolor,"\" align=\"center\" class=\"gborder\">",$ukrad,"</td>";

$sql_napak = "SELECT COUNT(*) AS napak FROM nt_matchevents WHERE event_time < '$zdaj' AND player1id=$String[$f] AND (event_type=5 OR event_type=6 OR event_type=26) AND match_id ='$matchid'";
$query_napak = mysql_query($sql_napak);
$row1 = mysql_fetch_array($query_napak, MYSQL_ASSOC);
$napak = $row1['napak'];
echo "<td bgcolor=\"",$bgcolor,"\" align=\"center\" class=\"gborder\">",$napak,"</td>";

$sql_banan = "SELECT COUNT(*) AS banan FROM nt_matchevents WHERE event_time < '$zdaj' AND player2id=$String[$f] AND event_type=31 AND match_id ='$matchid'";
$query_banan = mysql_query($sql_banan);
$row1 = mysql_fetch_array($query_banan, MYSQL_ASSOC);
$banan = $row1['banan'];
echo "<td bgcolor=\"",$bgcolor,"\" align=\"center\" class=\"gborder\">",$banan,"</td>";

//rating
$ratingigralca = $pl1score + $defen + $ofen + $podaj + $ukrad + $banan - $napak - ($skupaj2 - $zadeti2) - ($skupaj3 - $zadeti3) - ($vrzeni1 - $zadeti1);

$olaj=rand(3,3);
if ($time_tekme==$casek AND $olaj==3 AND $userid < 99999) {
@mysql_query("UPDATE fantasy SET pg1score=$ratingigralca WHERE compet=10 AND week=$gamew AND pg1id=$sur2");
@mysql_query("UPDATE fantasy SET sg1score=$ratingigralca WHERE compet=10 AND week=$gamew AND sg1id=$sur2");
@mysql_query("UPDATE fantasy SET sf1score=$ratingigralca WHERE compet=10 AND week=$gamew AND sf1id=$sur2");
@mysql_query("UPDATE fantasy SET pf1score=$ratingigralca WHERE compet=10 AND week=$gamew AND pf1id=$sur2");
@mysql_query("UPDATE fantasy SET c1score=$ratingigralca WHERE compet=10 AND week=$gamew AND c1id=$sur2");
@mysql_query("UPDATE fantasy SET pg2score=$ratingigralca WHERE compet=10 AND week=$gamew AND pg2id=$sur2");
@mysql_query("UPDATE fantasy SET sg2score=$ratingigralca WHERE compet=10 AND week=$gamew AND sg2id=$sur2");
@mysql_query("UPDATE fantasy SET sf2score=$ratingigralca WHERE compet=10 AND week=$gamew AND sf2id=$sur2");
@mysql_query("UPDATE fantasy SET pf2score=$ratingigralca WHERE compet=10 AND week=$gamew AND pf2id=$sur2");
@mysql_query("UPDATE fantasy SET c2score=$ratingigralca WHERE compet=10 AND week=$gamew AND c2id=$sur2");
}

echo "<td bgcolor=\"",$bgcolor,"\" align=\"center\" class=\"gborder\"><b>",$ratingigralca,"</b></td></tr>";

//zvezdice
if ($String[$f]==$home_pg1) {$rating_hpg1=$ratingigralca;}
if ($String[$f]==$home_sg1) {$rating_hsg1=$ratingigralca;}
if ($String[$f]==$home_sf1) {$rating_hsf1=$ratingigralca;}
if ($String[$f]==$home_pf1) {$rating_hpf1=$ratingigralca;}
if ($String[$f]==$home_c1) {$rating_hc1=$ratingigralca;}
if ($String[$f]==$away_pg1) {$rating_apg1=$ratingigralca;}
if ($String[$f]==$away_sg1) {$rating_asg1=$ratingigralca;}
if ($String[$f]==$away_sf1) {$rating_asf1=$ratingigralca;}
if ($String[$f]==$away_pf1) {$rating_apf1=$ratingigralca;}
if ($String[$f]==$away_c1) {$rating_ac1=$ratingigralca;}
if ($String[$f]==$home_pg2) {$rating_hpg2=$ratingigralca;}
if ($String[$f]==$home_sg2) {$rating_hsg2=$ratingigralca;}
if ($String[$f]==$home_sf2) {$rating_hsf2=$ratingigralca;}
if ($String[$f]==$home_pf2) {$rating_hpf2=$ratingigralca;}
if ($String[$f]==$home_c2) {$rating_hc2=$ratingigralca;}
if ($String[$f]==$away_pg2) {$rating_apg2=$ratingigralca;}
if ($String[$f]==$away_sg2) {$rating_asg2=$ratingigralca;}
if ($String[$f]==$away_sf2) {$rating_asf2=$ratingigralca;}
if ($String[$f]==$away_pf2) {$rating_apf2=$ratingigralca;}
if ($String[$f]==$away_c2) {$rating_ac2=$ratingigralca;}
}
$f++;
}
?>
</table>
<br/>
<b><?=$langmark700,"</b> - ",$langmark711?><br/>
<b><?=$langmark701,"</b> - ",$langmark693?><br/>
<b><?=$langmark702,"</b> - ",$langmark694?><br/>
<b><?=$langmark703,"</b> - ",$langmark712?><br/>
<b><?php echo $langmark704,"</b> - ",$langmark124," <i>(",strtolower($langmark713)," + ",strtolower($langmark714),")</i><br/>";?>
<b><?=$langmark705,"</b> - ",$langmark695?><br/>
<b><?=$langmark706,"</b> - ",$langmark696?><br/>
<b><?=$langmark707,"</b> - ",$langmark697?><br/>
<b><?=$langmark708,"</b> - ",$langmark698?><br/>
<b><?=$langmark709,"</b> - ",$langmark699?><br/>
<b><?=$langmark710,"</b> - ",$langmark715?><br/>

</td><td class="border" width="28%">

<h2><?=$imearene?></h2><br/>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td align="left"><?=$langmark062?>: </td><td align="right"><?=$gl1?></td></tr>
<tr><td align="left"><?=$langmark063?>: </td><td align="right"><?=$gl2?></td></tr>
<tr><td align="left"><?=$langmark716?>: </td><td align="right"><?=$gl3?></td></tr>
<tr><td align="left"><?=$langmark717?>: </td><td align="right"><?=$gl4?></td></tr>
<tr><td align="left"><b><?=$langmark718?>:</b> </td><td align="right"><b><?=$gled?></b></td></tr>
</table>

<?php
if ($refresh <> '1798' && $action <> 'team' AND $hreb > 0) {echo "<br/><h2>",$langmark719,"</h2><a href=\"nt_prikaz.php?matchid=",$matchid,"&action=team\">Team ratings</a><br/><br/>";} elseif ($refresh <> '1798' && $action <> 'team' AND $hreb==0) {echo "<br/><h2>",$langmark719,"</h2><br/>";} elseif ($refresh <> '1798' && $action == 'team') {echo "<br/><h2>Team ratings</h2><a href=\"nt_prikaz.php?matchid=",$matchid,"\">Player ratings</a><br/><br/>";} else {echo "<br/><h2>",$langmark720,"</h2>";}

if ($refresh != 1798 AND $event_type != 37 AND $action != 'team') {
$manofthematch = max($rating_hpg1,$rating_hsg1,$rating_hsf1,$rating_hpf1,$rating_hc1,$rating_apg1,$rating_asg1,$rating_asf1,$rating_apf1,$rating_ac1,$rating_hpg2,$rating_hsg2,$rating_hsf2,$rating_hpf2,$rating_hc2,$rating_apg2,$rating_asg2,$rating_asf2,$rating_apf2,$rating_ac2);

SWITCH ($manofthematch) {
CASE $rating_hpg1: echo "<b>MVP:&nbsp;</b>",$hpg1name,"<br/>"; break;
CASE $rating_hsg1: echo "<b>MVP:&nbsp;</b>",$hsg1name,"<br/>"; break;
CASE $rating_hsf1: echo "<b>MVP:&nbsp;</b>",$hsf1name,"<br/>"; break;
CASE $rating_hpf1: echo "<b>MVP:&nbsp;</b>",$hpf1name,"<br/>"; break;
CASE $rating_hc1: echo "<b>MVP:&nbsp;</b>",$hc1name,"<br/>"; break;
CASE $rating_apg1: echo "<b>MVP:&nbsp;</b>",$apg1name,"<br/>"; break;
CASE $rating_asg1: echo "<b>MVP:&nbsp;</b>",$asg1name,"<br/>"; break;
CASE $rating_asf1: echo "<b>MVP:&nbsp;</b>",$asf1name,"<br/>"; break;
CASE $rating_apf1: echo "<b>MVP:&nbsp;</b>",$apf1name,"<br/>"; break;
CASE $rating_ac1: echo "<b>MVP:&nbsp;</b>",$ac1name,"<br/>"; break;
CASE $rating_hpg2:
$homepg2_name = @mysql_query("SELECT surname FROM players WHERE id=$home_pg2"); $hpg2name=@mysql_result($homepg2_name,0);
echo "<b>MVP:&nbsp;</b>",$hpg2name,"<br/>"; break;
CASE $rating_hsg2:
$homesg2_name = @mysql_query("SELECT surname FROM players WHERE id=$home_sg2"); $hsg2name=@mysql_result($homesg2_name,0);
echo "<b>MVP:&nbsp;</b>",$hsg2name,"<br/>"; break;
CASE $rating_hsf2:
$homesf2_name = @mysql_query("SELECT surname FROM players WHERE id=$home_sf2"); $hsf2name=@mysql_result($homesf2_name,0);
echo "<b>MVP:&nbsp;</b>",$hsf2name,"<br/>"; break;
CASE $rating_hpf2:
$homepf2_name = @mysql_query("SELECT surname FROM players WHERE id=$home_pf2"); $hpf2name=@mysql_result($homepf2_name,0);
echo "<b>MVP:&nbsp;</b>",$hpf2name,"<br/>"; break;
CASE $rating_hc2:
$homec2_name = @mysql_query("SELECT surname FROM players WHERE id=$home_c2"); $hc2name=@mysql_result($homec2_name,0);
echo "<b>MVP:&nbsp;</b>",$hc2name,"<br/>"; break;
CASE $rating_apg2:
$awaypg2_name = @mysql_query("SELECT surname FROM players WHERE id=$away_pg2"); $apg2name=@mysql_result($awaypg2_name,0);
echo "<b>MVP:&nbsp;</b>",$apg2name,"<br/>"; break;
CASE $rating_asg2:
$awaysg2_name = @mysql_query("SELECT surname FROM players WHERE id=$away_sg2"); $asg2name=@mysql_result($awaysg2_name,0);
echo "<b>MVP:&nbsp;</b>",$asg2name,"<br/>"; break;
CASE $rating_asf2:
$awaysf2_name = @mysql_query("SELECT surname FROM players WHERE id=$away_sf2"); $asf2name=@mysql_result($awaysf2_name,0);
echo "<b>MVP:&nbsp;</b>",$asf2name,"<br/>"; break;
CASE $rating_apf2:
$awaypf2_name = @mysql_query("SELECT surname FROM players WHERE id=$away_pf2"); $apf2name=@mysql_result($awaypf2_name,0);
echo "<b>MVP:&nbsp;</b>",$apf2name,"<br/>"; break;
CASE $rating_ac2:
$awayc2_name = @mysql_query("SELECT surname FROM players WHERE id=$away_c2"); $ac2name=@mysql_result($awayc2_name,0);
echo "<b>MVP:&nbsp;</b>",$ac2name,"<br/>"; break;
}
echo "<br/>";
}
elseif ($refresh <>1798 AND $event_type ==37) {echo "<b>MVP:&nbsp;</b>-<br/>";}
?>
<?php
if($home_def==0){$home_def=$langmark722;}
if($home_def==1){$home_def=$langmark723;}
if($home_def==2){$home_def=$langmark724;}
if($home_def==3){$home_def=$langmark725;}
if($home_def==4){$home_def=$langmark726;}
if($home_def==5){$home_def=$langmark727;}
if($home_def==6){$home_def="half court trap";}

if($away_def==0){$away_def=$langmark722;}
if($away_def==1){$away_def=$langmark723;}
if($away_def==2){$away_def=$langmark724;}
if($away_def==3){$away_def=$langmark725;}
if($away_def==4){$away_def=$langmark726;}
if($away_def==5){$away_def=$langmark727;}
if($away_def==6){$away_def="half court trap";}

if($home_off==0){$home_off=$langmark722;}
if($home_off==1){$home_off=$langmark728;}
if($home_off==2){$home_off=$langmark729;}
if($home_off==3){$home_off=$langmark730;}
if($home_off==4){$home_off=$langmark731;}
if($home_off==5){$home_off=$langmark732;}
if($home_off==6){$home_off="inside shooting";}

if($away_off==0){$away_off=$langmark722;}
if($away_off==1){$away_off=$langmark728;}
if($away_off==2){$away_off=$langmark729;}
if($away_off==3){$away_off=$langmark730;}
if($away_off==4){$away_off=$langmark731;}
if($away_off==5){$away_off=$langmark732;}
if($away_off==6){$away_off="inside shooting";}
?>

<b><?=$langmark761?></b><br/><br/>
<?php if ($action <>'team') {?>
<b>D:</b> <?=$home_def?><br/>
<b>O:</b> <?=$home_off?><br/>
<b>A:</b> <?=$home_atti?><br/><br/>
<?php
if ($refresh <> 1798) {

if ($home_pg1 > 0) {

if (empty($hpg_name) && empty($hpg1name)){echo "<b>PG:</b> <i>",$langmark759,"</i><br/>";}
else {echo "<b>PG:</b> <a href=\"player.php?playerid=",$home_pg1,"\">",$hpg_name," ",$hpg1name,"</a><br/>";}
$star_qual=$hpgstarat;

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

echo $slika,"<br/>";

}
if ($home_sg1 > 0) {

if (empty($hsg_name) && empty($hsg1name)){echo "<b>SG:</b> <i>",$langmark759,"</i><br/>";}
else {echo "<b>SG:</b> <a href=\"player.php?playerid=",$home_sg1,"\">",$hsg_name," ",$hsg1name,"</a><br/>";}
$star_qual=$hsgstarat;

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

echo $slika,"<br/>";

}
if ($home_sf1 > 0) {

if (empty($hsf_name) && empty($hsf1name)){echo "<b>SF:</b> <i>",$langmark759,"</i><br/>";}
else {echo "<b>SF:</b> <a href=\"player.php?playerid=",$home_sf1,"\">",$hsf_name," ",$hsf1name,"</a><br/>";}
$star_qual=$hsfstarat;

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

echo $slika,"<br/>";

}
if ($home_pf1 > 0) {

if (empty($hpf_name) && empty($hpf1name)){echo "<b>PF:</b> <i>",$langmark759,"</i><br/>";}
else {echo "<b>PF:</b> <a href=\"player.php?playerid=",$home_pf1,"\">",$hpf_name," ",$hpf1name,"</a><br/>";}
$star_qual=$hpfstarat;

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

echo $slika,"<br/>";

}
if ($home_c1 > 0) {

if (empty($hc_name) && empty($hc1name)){echo "<b>C:</b> <i>",$langmark759,"</i><br/>";}
else {echo "<b>C:</b> <a href=\"player.php?playerid=",$home_c1,"\">",$hc_name," ",$hc1name,"</a><br/>";}
$star_qual=$hcstarat;

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

echo $slika,"<br/><br/>";
}
}

}
elseif ($action=='team' AND $hreb > 0) {
//TIMSKI RATINGI
echo "2p shooting: ",$h2p_dspl,"<br/>";
echo "3p shooting: ",$h3p_dspl,"<br/>";
echo "Rebounding: ",$hreb_dspl,"<br/>";
echo "Turnovers: ",$hto_dspl,"<br/>";
echo "Tiredness: ",$htir,"%<br/><br/>";
}
?>

<b><?=$langmark762?></b><br/><br/>
<?php if ($action <>'team') {?>
<b>D:</b> <?=$away_def?><br/>
<b>O:</b> <?=$away_off?><br/>
<b>A:</b> <?=$away_atti?><br/>
<br/>
<?php
if ($refresh <>1798) {

if ($away_pg1 > 0) {

if (empty($apg_name) && empty($apg1name)){echo "<b>PG:</b> <i>",$langmark759,"</i><br/>";}
else {echo "<b>PG:</b> <a href=\"player.php?playerid=",$away_pg1,"\">",$apg_name," ",$apg1name,"</a><br/>";}
$star_qual=$apgstarat;

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

echo $slika,"<br/>";

}
if ($away_sg1 > 0) {

if (empty($asg_name) && empty($asg1name)){echo "<b>SG:</b> <i>",$langmark759,"</i><br/>";}
else {echo "<b>SG:</b> <a href=\"player.php?playerid=",$away_sg1,"\">",$asg_name," ",$asg1name,"</a><br/>";}
$star_qual=$asgstarat;

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

echo $slika,"<br/>";

}
if ($away_sf1 > 0) {

if (empty($asf_name) && empty($asf1name)){echo "<b>SF:</b> <i>",$langmark759,"</i><br/>";}
else {echo "<b>SF:</b> <a href=\"player.php?playerid=",$away_sf1,"\">",$asf_name," ",$asf1name,"</a><br/>";}
$star_qual=$asfstarat;

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

echo $slika,"<br/>";

}
if ($away_pf1 > 0) {

if (empty($apf_name) && empty($apf1name)){echo "<b>PF:</b> <i>",$langmark759,"</i><br/>";}
else {echo "<b>PF:</b> <a href=\"player.php?playerid=",$away_pf1,"\">",$apf_name," ",$apf1name,"</a><br/>";}
$star_qual=$apfstarat;

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

echo $slika,"<br/>";

}
if ($away_c1 > 0) {

if (empty($ac_name) && empty($ac1name)){echo "<b>C:</b> <i>",$langmark759,"</i><br/>";}
else {echo "<b>C:</b> <a href=\"player.php?playerid=",$away_c1,"\">",$ac_name," ",$ac1name,"</a><br/>";}
$star_qual=$acstarat;

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

echo $slika,"<br/>";
}
}

}
elseif ($action=='team' AND $areb >0) {
//TIMSKI RATINGI
echo "2p shooting: ",$a2p_dspl,"<br/>";
echo "3p shooting: ",$a3p_dspl,"<br/>";
echo "Rebounding: ",$areb_dspl,"<br/>";
echo "Turnovers: ",$ato_dspl,"<br/>";
echo "Tiredness: ",$atir,"%<br/><br/>";

echo "<hr/>Ratings show potential team strenght based on starting five. They don't provide ultimative values, only better feedback to understand what your team is capable of. Important influences are excluded, like tactics, substitutions, individual quality and daily form.<hr/>";

}

if ($refresh ==1798) {echo"<a href=\"nt_matchreport.php?matchid=",$matchid,"\">",$langmark733,"</a>";}

//zapis
$out2 = ob_get_contents();
$out2 =addslashes($out2);
if (mysql_num_rows($pru)==0 OR mysql_num_rows($pru)=='' OR !mysql_num_rows($pru)) {$rump = mysql_query("SELECT max(event_time) FROM `nt_matchevents` WHERE `match_id` ='$matchid'"); $beat = mysql_result($rump,0); mysql_query("INSERT INTO `ntmatchreports` VALUES ('', '$matchid', '$out2', '$beat', '$zdaj', '$lang');") or die(mysql_error());}
if (mysql_num_rows($pru)==1) {mysql_query("UPDATE ntmatchreports SET `report`='$out2', `last`='$zdaj' WHERE `lang`='$lang' AND `match`='$matchid' LIMIT 1") or die(mysql_error());}
?>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>