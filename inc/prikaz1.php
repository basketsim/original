<?php
$matchid=$_GET["matchid"];
if (!is_numeric($matchid)){die(include 'index.php');}

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$comparepasss = mysql_query("SELECT club, supporter, level, lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($comparepasss)==1) {
$trueclub = mysql_result ($comparepasss,0,"club");
$is_supporter = mysql_result ($comparepasss,0,"supporter");
$lvl = mysql_result ($comparepasss,0,"level");
$lang = mysql_result ($comparepasss,0,"lang");
}
else {die(include 'basketsim.php');}
if ($lvl>1) {$is_supporter=1;}

$action=$_GET["action"];
SWITCH ($action) {
CASE 'bookmark':
if ($is_supporter==1) {
$already = mysql_query("SELECT * FROM bookmarks WHERE b_type =3 && multiview =0 && team ='$trueclub' && b_link ='$matchid' LIMIT 1") or die(mysql_error());
if (!mysql_num_rows($already)) {mysql_query("INSERT INTO bookmarks VALUES ('', $trueclub, '', $matchid, 3, 0);") or die(mysql_error());}
header ("Location: bookmarks.php");
} break;
CASE 'multiview':
$already = mysql_query("SELECT * FROM bookmarks WHERE b_type = 3 && multiview =1 && team ='$trueclub' && b_link ='$matchid' LIMIT 1") or die(mysql_error());
if (!mysql_num_rows($already)) {mysql_query("INSERT INTO bookmarks VALUES ('', $trueclub, '', $matchid, 3, 1);") or die(mysql_error());}
header("Location: multiview.php");
break;
}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');

include_once("inc/action.php");
include_once("inc/rater.php");
$member=$userid;
$member_id=$userid;

?>

<div id="main">
<h2><?=$langmark324?></h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="72%">

<?php
$result99 = mysql_query("SELECT `statid` FROM `statistics` WHERE `match` ='$matchid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($result99)>0) {$tin=2;}
$result = mysql_query("SELECT * FROM matchevents1 WHERE match_id ='$matchid' AND event_time < '$zdaj' ORDER BY event_time DESC, event_id DESC LIMIT 4");
$num=mysql_num_rows($result);
if ($num==0 && $tin!=2){$tekmabo = mysql_query("SELECT home_id, away_id, time FROM matches WHERE matchid ='$matchid'") or die(mysql_error());
if (mysql_num_rows($tekmabo) < 1) {die ("$langmark325.<br/><a href=\"matches.php\">$langmark059</a></td></tr></table>");}
else {
$team1=mysql_result($tekmabo,0,"home_id");
$team2=mysql_result($tekmabo,0,"away_id");
$timeof=mysql_result($tekmabo,0,"time");
$tp1 = mysql_query("SELECT name FROM teams WHERE teamid=$team1 LIMIT 1") or die(mysql_error());
$jam = mysql_num_rows($tp1); if ($jam > 0){$temname=mysql_result($tp1,0); $temname=stripslashes($temname);}
$tp2 = mysql_query("SELECT name FROM teams WHERE teamid=$team2 LIMIT 1") or die(mysql_error());
$lum = mysql_num_rows($tp2); if ($lum > 0){$temname2=mysql_result($tp2,0); $temname2=stripslashes($temname2);}
$splitdt1 = explode(" ", $timeof); $bdate1 = $splitdt1[0]; $btime1 = $splitdt1[1];
$splitd1 = explode("-", $bdate1); $byear1 = $splitd1[0]; $bmonth1 = $splitd1[1]; $bday1 = $splitd1[2];
$splitt1 = explode(":", $btime1); $bhour1 = $splitt1[0]; $bmin1 = $splitt1[1]; $bsec1 = $splitt1[2];
$timdisp = date("d.m.Y H:i", mktime($bhour1,$bmin1,$bsec1,$bmonth1,$bday1,$byear1));
$gledalci = mysql_query("SELECT home_id, away_id FROM matches WHERE matchid=$matchid LIMIT 1");
$home_id=mysql_result($gledalci,0,"home_id");
$away_id=mysql_result($gledalci,0,"away_id");
$dpovezava = "<a href=redirect.php?teamid=".$home_id.">";
$gpovezava= "<a href=redirect.php?teamid=".$away_id.">";

if($is_supporter==1){$prikaz_book="&nbsp;<a href=\"prikaz.php?matchid=$matchid&action=bookmark\"><img src=\"img/bookmark.jpg\" border=0 alt=\"".$langmark331."\" title=\"".$langmark331."\"></a>&nbsp;";}
if($is_supporter<>1){$prikaz_book="&nbsp;";}

die("<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td align=\"left\"><b>".$temname." - ".$temname2."</b>".$prikaz_book."<a href=\"prikaz.php?matchid=".$matchid."&action=multiview\"><img src=\"img/live.jpg\" border=\"0\" alt=\"$langmark332\" title=\"$langmark332\"></a></td><td align=\"right\">$langmark647: ".$matchid."</td></tr></table>
<p>".$langmark688." ".$timdisp.".<br/>".$langmark689."</p>
<a href=\"javascript: history.go(-1)\">".$langmark132."</a></td>
<td class=\"border\" width=\"45%\"><h2>".$langmark335."</h2><br/>".$dpovezava."".$temname."</a><br/>".$gpovezava."".$temname2."</a></td></tr></table>");}
}

$gledalci = mysql_query("SELECT * FROM matches WHERE matchid ='$matchid' LIMIT 1");
$matque = mysql_fetch_array($gledalci);
$prvaekipa=$matque['home_id'];
$home_name=$matque['home_name'];
$drugaekipa=$matque['away_id'];
$away_name=$matque['away_name'];
$arena=$matque['arena_id'];
$gl1=$matque['crowd1'];
$gl2=$matque['crowd2'];
$gl3=$matque['crowd3'];
$gl4=$matque['crowd4'];
$hsc=$matque['home_score'];
$asc=$matque['away_score'];
$HQ1=$matque['HQ1'];
$AQ1=$matque['AQ1'];
$HQ2=$matque['HQ2'];
$AQ2=$matque['AQ2'];
$HQ3=$matque['HQ3'];
$AQ3=$matque['AQ3'];
$time_tekme=$matque['time'];
$tip=$matque['type'];
$home_def=$matque['home_def'];
$away_def=$matque['away_def'];
$home_off=$matque['home_off'];
$away_off=$matque['away_off'];
$home_pg1=$matque['home_pg1'];
$home_sg1=$matque['home_sg1'];
$home_sf1=$matque['home_sf1'];
$home_pf1=$matque['home_pf1'];
$home_c1=$matque['home_c1'];
$away_pg1=$matque['away_pg1'];
$away_sg1=$matque['away_sg1'];
$away_sf1=$matque['away_sf1'];
$away_pf1=$matque['away_pf1'];
$away_c1=$matque['away_c1'];
$home_pg2=$matque['home_pg2'];
$home_sg2=$matque['home_sg2'];
$home_sf2=$matque['home_sf2'];
$home_pf2=$matque['home_pf2'];
$home_c2=$matque['home_c2'];
$away_pg2=$matque['away_pg2'];
$away_sg2=$matque['away_sg2'];
$away_sf2=$matque['away_sf2'];
$away_pf2=$matque['away_pf2'];
$away_c2=$matque['away_c2'];
$country=$matque['country'];
$hpgstarat=$matque['hpg_rating'];
$hsgstarat=$matque['hsg_rating'];
$hsfstarat=$matque['hsf_rating'];
$hpfstarat=$matque['hpf_rating'];
$hcstarat=$matque['hc_rating'];
$apgstarat=$matque['apg_rating'];
$asgstarat=$matque['asg_rating'];
$asfstarat=$matque['asf_rating'];
$apfstarat=$matque['apf_rating'];
$acstarat=$matque['ac_rating'];
$sss=$matque['season'];
$h2p=$matque['h2p'];
$a2p=$matque['a2p'];
$h3p=$matque['h3p'];
$a3p=$matque['a3p'];
$hreb=$matque['hreb'];
$areb=$matque['areb'];
$hto=$matque['hto'];
$ato=$matque['ato'];
$htir=$matque['htir'];
$atir=$matque['atir'];

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
elseif ($hto > 520) {$hto_dspl = $langmark110;}
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
elseif ($ato > 520) {$ato_dspl = $langmark110;}
}

if ($hreb < 901) {$hreb_dspl = $langmark111;}
elseif ($hreb > 900 AND $hreb < 1101) {$hreb_dspl = $langmark096;}
elseif ($hreb > 1100 AND $hreb < 1301) {$hreb_dspl = $langmark097;}
elseif ($hreb > 1300 AND $hreb < 1501) {$hreb_dspl = $langmark098;}
elseif ($hreb > 1500 AND $hreb < 1701) {$hreb_dspl = $langmark099;}
elseif ($hreb > 1700 AND $hreb < 1901) {$hreb_dspl = $langmark100;}
elseif ($hreb > 1900 AND $hreb < 2101) {$hreb_dspl = $langmark101;}
elseif ($hreb > 2100 AND $hreb < 2301) {$hreb_dspl = $langmark102;}
elseif ($hreb > 2300 AND $hreb < 2501) {$hreb_dspl = $langmark103;}
elseif ($hreb > 2500 AND $hreb < 2701) {$hreb_dspl = $langmark104;}
elseif ($hreb > 2700 AND $hreb < 2901) {$hreb_dspl = $langmark105;}
elseif ($hreb > 2900 AND $hreb < 3101) {$hreb_dspl = $langmark106;}
elseif ($hreb > 3100 AND $hreb < 3301) {$hreb_dspl = $langmark107;}
elseif ($hreb > 3300 AND $hreb < 3501) {$hreb_dspl = $langmark108;}
elseif ($hreb > 3500 AND $hreb < 3701) {$hreb_dspl = $langmark109;}
elseif ($hreb > 3700) {$hreb_dspl = $langmark110;}

if ($areb < 901) {$areb_dspl = $langmark111;}
elseif ($areb > 900 AND $areb < 1101) {$areb_dspl = $langmark096;}
elseif ($areb > 1100 AND $areb < 1301) {$areb_dspl = $langmark097;}
elseif ($areb > 1300 AND $areb < 1501) {$areb_dspl = $langmark098;}
elseif ($areb > 1500 AND $areb < 1701) {$areb_dspl = $langmark099;}
elseif ($areb > 1700 AND $areb < 1901) {$areb_dspl = $langmark100;}
elseif ($areb > 1900 AND $areb < 2101) {$areb_dspl = $langmark101;}
elseif ($areb > 2100 AND $areb < 2301) {$areb_dspl = $langmark102;}
elseif ($areb > 2300 AND $areb < 2501) {$areb_dspl = $langmark103;}
elseif ($areb > 2500 AND $areb < 2701) {$areb_dspl = $langmark104;}
elseif ($areb > 2700 AND $areb < 2901) {$areb_dspl = $langmark105;}
elseif ($areb > 2900 AND $areb < 3101) {$areb_dspl = $langmark106;}
elseif ($areb > 3100 AND $areb < 3301) {$areb_dspl = $langmark107;}
elseif ($areb > 3300 AND $areb < 3501) {$areb_dspl = $langmark108;}
elseif ($areb > 3500 AND $areb < 3701) {$areb_dspl = $langmark109;}
elseif ($areb > 3700) {$areb_dspl = $langmark110;}

if ($h3p > 165) {$h3p_dspl = $langmark111;}
elseif ($h3p > 156 AND $h3p < 166) {$h3p_dspl = $langmark096;}
elseif ($h3p > 147 AND $h3p < 157) {$h3p_dspl = $langmark097;}
elseif ($h3p > 138 AND $h3p < 148) {$h3p_dspl = $langmark098;}
elseif ($h3p > 129 AND $h3p < 139) {$h3p_dspl = $langmark099;}
elseif ($h3p > 120 AND $h3p < 130) {$h3p_dspl = $langmark100;}
elseif ($h3p > 111 AND $h3p < 121) {$h3p_dspl = $langmark101;}
elseif ($h3p > 102 AND $h3p < 112) {$h3p_dspl = $langmark102;}
elseif ($h3p > 93 AND $h3p < 103) {$h3p_dspl = $langmark103;}
elseif ($h3p > 84 AND $h3p < 94) {$h3p_dspl = $langmark104;}
elseif ($h3p > 75 AND $h3p < 85) {$h3p_dspl = $langmark105;}
elseif ($h3p > 66 AND $h3p < 76) {$h3p_dspl = $langmark106;}
elseif ($h3p > 57 AND $h3p < 67) {$h3p_dspl = $langmark107;}
elseif ($h3p > 48 AND $h3p < 58) {$h3p_dspl = $langmark108;}
elseif ($h3p > 39 AND $h3p < 49) {$h3p_dspl = $langmark109;}
elseif ($h3p < 40) {$h3p_dspl = $langmark110;}

if ($a3p > 165) {$a3p_dspl = $langmark111;}
elseif ($a3p > 156 AND $a3p < 166) {$a3p_dspl = $langmark096;}
elseif ($a3p > 147 AND $a3p < 157) {$a3p_dspl = $langmark097;}
elseif ($a3p > 138 AND $a3p < 148) {$a3p_dspl = $langmark098;}
elseif ($a3p > 129 AND $a3p < 139) {$a3p_dspl = $langmark099;}
elseif ($a3p > 120 AND $a3p < 130) {$a3p_dspl = $langmark100;}
elseif ($a3p > 111 AND $a3p < 121) {$a3p_dspl = $langmark101;}
elseif ($a3p > 102 AND $a3p < 112) {$a3p_dspl = $langmark102;}
elseif ($a3p > 93 AND $a3p < 103) {$a3p_dspl = $langmark103;}
elseif ($a3p > 84 AND $a3p < 94) {$a3p_dspl = $langmark104;}
elseif ($a3p > 75 AND $a3p < 85) {$a3p_dspl = $langmark105;}
elseif ($a3p > 66 AND $a3p < 76) {$a3p_dspl = $langmark106;}
elseif ($a3p > 57 AND $a3p < 67) {$a3p_dspl = $langmark107;}
elseif ($a3p > 48 AND $a3p < 58) {$a3p_dspl = $langmark108;}
elseif ($a3p > 39 AND $a3p < 49) {$a3p_dspl = $langmark109;}
elseif ($a3p < 40) {$a3p_dspl = $langmark110;}

if ($h2p > 460) {$h2p_dspl = $langmark111;}
elseif ($h2p > 448 AND $h2p < 461) {$h2p_dspl = $langmark096;}
elseif ($h2p > 436 AND $h2p < 449) {$h2p_dspl = $langmark097;}
elseif ($h2p > 424 AND $h2p < 437) {$h2p_dspl = $langmark098;}
elseif ($h2p > 412 AND $h2p < 425) {$h2p_dspl = $langmark099;}
elseif ($h2p > 400 AND $h2p < 413) {$h2p_dspl = $langmark100;}
elseif ($h2p > 388 AND $h2p < 401) {$h2p_dspl = $langmark101;}
elseif ($h2p > 376 AND $h2p < 389) {$h2p_dspl = $langmark102;}
elseif ($h2p > 364 AND $h2p < 377) {$h2p_dspl = $langmark103;}
elseif ($h2p > 352 AND $h2p < 365) {$h2p_dspl = $langmark104;}
elseif ($h2p > 340 AND $h2p < 353) {$h2p_dspl = $langmark105;}
elseif ($h2p > 328 AND $h2p < 341) {$h2p_dspl = $langmark106;}
elseif ($h2p > 316 AND $h2p < 329) {$h2p_dspl = $langmark107;}
elseif ($h2p > 304 AND $h2p < 317) {$h2p_dspl = $langmark108;}
elseif ($h2p > 292 AND $h2p < 305) {$h2p_dspl = $langmark109;}
elseif ($h2p < 293) {$h2p_dspl = $langmark110;}

if ($a2p > 460) {$a2p_dspl = $langmark111;}
elseif ($a2p > 448 AND $a2p < 461) {$a2p_dspl = $langmark096;}
elseif ($a2p > 436 AND $a2p < 449) {$a2p_dspl = $langmark097;}
elseif ($a2p > 424 AND $a2p < 437) {$a2p_dspl = $langmark098;}
elseif ($a2p > 412 AND $a2p < 425) {$a2p_dspl = $langmark099;}
elseif ($a2p > 400 AND $a2p < 413) {$a2p_dspl = $langmark100;}
elseif ($a2p > 388 AND $a2p < 401) {$a2p_dspl = $langmark101;}
elseif ($a2p > 376 AND $a2p < 389) {$a2p_dspl = $langmark102;}
elseif ($a2p > 364 AND $a2p < 377) {$a2p_dspl = $langmark103;}
elseif ($a2p > 352 AND $a2p < 365) {$a2p_dspl = $langmark104;}
elseif ($a2p > 340 AND $a2p < 353) {$a2p_dspl = $langmark105;}
elseif ($a2p > 328 AND $a2p < 341) {$a2p_dspl = $langmark106;}
elseif ($a2p > 316 AND $a2p < 329) {$a2p_dspl = $langmark107;}
elseif ($a2p > 304 AND $a2p < 317) {$a2p_dspl = $langmark108;}
elseif ($a2p > 292 AND $a2p < 305) {$a2p_dspl = $langmark109;}
elseif ($a2p < 293) {$a2p_dspl = $langmark110;}

$homepg_name = @mysql_query("SELECT name, surname FROM players WHERE id=$home_pg1 LIMIT 1");
$hpg_name=@mysql_result($homepg_name,0,"name");
$hpg1name=@mysql_result($homepg_name,0,"surname");
$homesg_name = @mysql_query("SELECT name, surname FROM players WHERE id=$home_sg1 LIMIT 1");
$hsg_name=@mysql_result($homesg_name,0,"name");
$hsg1name=@mysql_result($homesg_name,0,"surname");
$homesf_name = @mysql_query("SELECT name, surname FROM players WHERE id=$home_sf1 LIMIT 1");
$hsf_name=@mysql_result($homesf_name,0,"name");
$hsf1name=@mysql_result($homesf_name,0,"surname");
$homepf_name = @mysql_query("SELECT name, surname FROM players WHERE id=$home_pf1 LIMIT 1");
$hpf_name=@mysql_result($homepf_name,0,"name");
$hpf1name=@mysql_result($homepf_name,0,"surname");
$homec_name = @mysql_query("SELECT name, surname FROM players WHERE id=$home_c1 LIMIT 1");
$hc_name=@mysql_result($homec_name,0,"name");
$hc1name=@mysql_result($homec_name,0,"surname");
$awaypg_name = @mysql_query("SELECT name, surname FROM players WHERE id=$away_pg1 LIMIT 1");
$apg_name=@mysql_result($awaypg_name,0,"name");
$apg1name=@mysql_result($awaypg_name,0,"surname");
$awaysg_name = @mysql_query("SELECT name, surname FROM players WHERE id=$away_sg1 LIMIT 1");
$asg_name=@mysql_result($awaysg_name,0,"name");
$asg1name=@mysql_result($awaysg_name,0,"surname");
$awaysf_name = @mysql_query("SELECT name, surname FROM players WHERE id=$away_sf1 LIMIT 1");
$asf_name=@mysql_result($awaysf_name,0,"name");
$asf1name=@mysql_result($awaysf_name,0,"surname");
$awaypf_name = @mysql_query("SELECT name, surname FROM players WHERE id=$away_pf1 LIMIT 1");
$apf_name=@mysql_result($awaypf_name,0,"name");
$apf1name=@mysql_result($awaypf_name,0,"surname");
$awayc_name = @mysql_query("SELECT name, surname FROM players WHERE id=$away_c1 LIMIT 1");
$ac_name=@mysql_result($awayc_name,0,"name");
$ac1name=@mysql_result($awayc_name,0,"surname");

//injuries
$ipl1=0; $ipl2=0; $ipl3=0; $ipl4=0; $ipl5=0;
$inju = mysql_query("SELECT playerid FROM injuries WHERE matchid=$matchid");
while ($in < mysql_num_rows($inju)) {
$ipl1 = @mysql_result($inju,0,"playerid");
$ipl2 = @mysql_result($inju,1,"playerid");
$ipl3 = @mysql_result($inju,2,"playerid");
$ipl4 = @mysql_result($inju,3,"playerid");
$ipl5 = @mysql_result($inju,4,"playerid");
$in++;
}

$gled = $gl1 + $gl2 + $gl3 + $gl4;
$ar1 = mysql_query("SELECT arenaname, seats1+seats2+seats3+seats4 as tseats FROM arena WHERE arenaid ='$arena' LIMIT 1");
$imearene=mysql_result($ar1,0,"arenaname");
$tseats=mysql_result($ar1,0,"tseats");
$imearene=stripslashes($imearene);
if ($imearene=='hkslovangelnica.webgarden.cz') {$imearene='hkslovangelnica';}
if ($imearene=='murkooooooooooooooooooooooo') {$imearene='murko';}

$splitdt1 = explode(" ", $time_tekme); $bdate1 = $splitdt1[0]; $btime1 = $splitdt1[1];
$splitd1 = explode("-", $bdate1); $byear1 = $splitd1[0]; $bmonth1 = $splitd1[1]; $bday1 = $splitd1[2];
$splitt1 = explode(":", $btime1); $bhour1 = $splitt1[0]; $bmin1 = $splitt1[1]; $bsec1 = $splitt1[2];
$timdisp = date("d.m.Y H:i", mktime($bhour1,$bmin1,$bsec1,$bmonth1,$bday1,$byear1));

echo "<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td width=\"35%\" align=\"left\">",$timdisp;
if ($is_supporter==1){echo " <a href=\"prikaz.php?matchid=",$matchid,"&action=bookmark\"><img src=\"img/bookmark.jpg\" border=\"0\" alt=\"",$langmark331,"\" title=\"",$langmark331,"\"></a>";}
echo "</td><td align=\"center\" width=\"30%\">";
rate($matchid,$member);
echo "</td><td align=\"right\" width=\"35%\">",$langmark647,": ",$matchid,"</td></tr></table>";
$home_id=$prvaekipa;
$away_id=$drugaekipa;
//ni reportov
if ($sss>2) {
?>
<table width="100%" cellspacing="1" cellpadding="4">
<tr><td class="gborder"><?php echo $langmark690,". <a href=\"matchreport1.php?matchid=",$matchid,"\">",$langmark1273,"</a>";?></td></tr></table>
<?php }?>

<table border="1" cellspacing="0" cellpadding="1" width="100%" style="border-spacing: 0px; border-collapse: separate; border-style: hidden;">
<tr><td align="center" width="39%" class="gborder"><?php echo "<a href=\"redirect.php?teamid=",$home_id,"\" class=\"greenhilite\">";?><b><font color="#56704B"><?=$home_name?></font></b></a></td>
<td align="center" width="22%" class="gborder">
<?php
if ($AQ1+$HQ1>0) {
?>
<table cellspacing="0" cellpadding="0" width="100%">
<tr><td align="center" title="1st quarter result" border="0"><b><?=$HQ1?></b></td><td align="center" title="2nd quarter result" border="0"><b><?=($HQ2-$HQ1)?></b></td><td align="center" title="3rd quarter result" border="0"><b><?=($HQ3-$HQ2)?></b></td><td align="center" title="4th quarter result" border="0"><b><?=($hsc-$HQ3)?></b></td></tr>
<tr><td align="center" title="1st quarter result" border="0"><b><?=$AQ1?></b></td><td align="center" title="2nd quarter result" border="0"><b><?=($AQ2-$AQ1)?></b></td><td align="center" title="3rd quarter result" border="0"><b><?=($AQ3-$AQ2)?></b></td><td align="center" title="4th quarter result" border="0"><b><?=($asc-$AQ3)?></b></td></tr>
</table>
<?php
}
?>
</td><td align="center" width="39%" class="gborder"><?php echo "<a href=\"redirect.php?teamid=",$away_id,"\" class=\"greenhilite\">";?><b><font color="#A30006"><?=$away_name?></font></b></a></td></tr>
<tr><td bgcolor="#B3D7A9" align="center" class="gborder">
<b><?php if ($tin==2) {echo $hsc;} else {mysql_result($result,0,"home_sc");}?></b>
</td>
<td align="center" class="gborder"><b><?=$langmark692?></b></td>
<td bgcolor="#E9967A" align="center" class="gborder">
<b><?php if ($tin==2) {echo $asc;} else {mysql_result($result,0,"away_sc");}?></b>
</td></tr>
<td bgcolor="#B3D7A9" align="center" class="gborder">
<?php
//------------------
//TIMSKI STATSI
//------------------
$zadeti2_home = mysql_query("SELECT SUM( `two_scored` ) FROM `statistics` WHERE `team` = $prvaekipa AND `match` = $matchid") or die(mysql_query());
list($zadeti2_home) = mysql_fetch_row($zadeti2_home);
$skupaj2_home = mysql_query("SELECT SUM( `two_total` ) FROM `statistics` WHERE `team` = $prvaekipa AND `match` = $matchid") or die(mysql_query());
list($skupaj2_home) = mysql_fetch_row($skupaj2_home);
$zadeti1_home = mysql_query("SELECT SUM( `one_scored` ) FROM `statistics` WHERE `team` = $prvaekipa AND `match` = $matchid") or die(mysql_query());
list($zadeti1_home) = mysql_fetch_row($zadeti1_home);
$skupaj1_home = mysql_query("SELECT SUM( `one_total` ) FROM `statistics` WHERE `team` = $prvaekipa AND `match` = $matchid") or die(mysql_query());
list($skupaj1_home) = mysql_fetch_row($skupaj1_home);
$zadeti3_home = mysql_query("SELECT SUM( `three_scored` ) FROM `statistics` WHERE `team` = $prvaekipa AND `match` = $matchid") or die(mysql_query());
list($zadeti3_home) = mysql_fetch_row($zadeti3_home);
$skupaj3_home = mysql_query("SELECT SUM( `three_total` ) FROM `statistics` WHERE `team` = $prvaekipa AND `match` = $matchid") or die(mysql_query());
list($skupaj3_home) = mysql_fetch_row($skupaj3_home);
$skokidef_home = mysql_query("SELECT SUM( `def_rebounds` ) FROM `statistics` WHERE `team` = $prvaekipa AND `match` = $matchid") or die(mysql_query());
list($skokidef_home) = mysql_fetch_row($skokidef_home);
$skokioff_home = mysql_query("SELECT SUM( `off_rebounds` ) FROM `statistics` WHERE `team` = $prvaekipa AND `match` = $matchid") or die(mysql_query());
list($skokioff_home) = mysql_fetch_row($skokioff_home);
$blokade_home = mysql_query("SELECT SUM( `blocks` ) FROM `statistics` WHERE `team` = $prvaekipa AND `match` = $matchid") or die(mysql_query());
list($blokade_home) = mysql_fetch_row($blokade_home);
$asists_home = mysql_query("SELECT SUM( `assists` ) FROM `statistics` WHERE `team` = $prvaekipa AND `match` = $matchid") or die(mysql_query());
list($asists_home) = mysql_fetch_row($asists_home);
$kraje_home = mysql_query("SELECT SUM( `steals` ) FROM `statistics` WHERE `team` = $prvaekipa AND `match` = $matchid") or die(mysql_query());
list($kraje_home) = mysql_fetch_row($kraje_home);
$favli_home = mysql_query("SELECT SUM( `fouls` ) FROM `statistics` WHERE `team` = $prvaekipa AND `match` = $matchid") or die(mysql_query());
list($favli_home) = mysql_fetch_row($favli_home);
$napake_home = mysql_query("SELECT SUM( `turnovers` ) FROM `statistics` WHERE `team` = $prvaekipa AND `match` = $matchid") or die(mysql_query());
list($napake_home) = mysql_fetch_row($napake_home);

$zadeti2_away = mysql_query("SELECT SUM( `two_scored` ) FROM `statistics` WHERE `team` = $drugaekipa AND `match` = $matchid") or die(mysql_query());
list($zadeti2_away) = mysql_fetch_row($zadeti2_away);
$skupaj2_away = mysql_query("SELECT SUM( `two_total` ) FROM `statistics` WHERE `team` = $drugaekipa AND `match` = $matchid") or die(mysql_query());
list($skupaj2_away) = mysql_fetch_row($skupaj2_away);
$zadeti1_away = mysql_query("SELECT SUM( `one_scored` ) FROM `statistics` WHERE `team` = $drugaekipa AND `match` = $matchid") or die(mysql_query());
list($zadeti1_away) = mysql_fetch_row($zadeti1_away);
$skupaj1_away = mysql_query("SELECT SUM( `one_total` ) FROM `statistics` WHERE `team` = $drugaekipa AND `match` = $matchid") or die(mysql_query());
list($skupaj1_away) = mysql_fetch_row($skupaj1_away);
$zadeti3_away = mysql_query("SELECT SUM( `three_scored` ) FROM `statistics` WHERE `team` = $drugaekipa AND `match` = $matchid") or die(mysql_query());
list($zadeti3_away) = mysql_fetch_row($zadeti3_away);
$skupaj3_away = mysql_query("SELECT SUM( `three_total` ) FROM `statistics` WHERE `team` = $drugaekipa AND `match` = $matchid") or die(mysql_query());
list($skupaj3_away) = mysql_fetch_row($skupaj3_away);
$skokidef_away = mysql_query("SELECT SUM( `def_rebounds` ) FROM `statistics` WHERE `team` = $drugaekipa AND `match` = $matchid") or die(mysql_query());
list($skokidef_away) = mysql_fetch_row($skokidef_away);
$skokioff_away = mysql_query("SELECT SUM( `off_rebounds` ) FROM `statistics` WHERE `team` = $drugaekipa AND `match` = $matchid") or die(mysql_query());
list($skokioff_away) = mysql_fetch_row($skokioff_away);
$blokade_away = mysql_query("SELECT SUM( `blocks` ) FROM `statistics` WHERE `team` = $drugaekipa AND `match` = $matchid") or die(mysql_query());
list($blokade_away) = mysql_fetch_row($blokade_away);
$asists_away = mysql_query("SELECT SUM( `assists` ) FROM `statistics` WHERE `team` = $drugaekipa AND `match` = $matchid") or die(mysql_query());
list($asists_away) = mysql_fetch_row($asists_away);
$kraje_away = mysql_query("SELECT SUM( `steals` ) FROM `statistics` WHERE `team` = $drugaekipa AND `match` = $matchid") or die(mysql_query());
list($kraje_away) = mysql_fetch_row($kraje_away);
$favli_away = mysql_query("SELECT SUM( `fouls` ) FROM `statistics` WHERE `team` = $drugaekipa AND `match` = $matchid") or die(mysql_query());
list($favli_away) = mysql_fetch_row($favli_away);
$napake_away = mysql_query("SELECT SUM( `turnovers` ) FROM `statistics` WHERE `team` = $drugaekipa AND `match` = $matchid") or die(mysql_query());
list($napake_away) = mysql_fetch_row($napake_away);

if ($skupaj2_home<>0) {$kolicnik2_home = round(100*$zadeti2_home/$skupaj2_home);}
echo $zadeti2_home,"/",$skupaj2_home,"&nbsp;(";
if ($skupaj2_home<>0) {echo $kolicnik2_home."%)<br/>";} else {echo " - )<br/>";}
?>
</td><td align="center" class="gborder"><?=$langmark693?></td><td bgcolor="#E9967A" align="center" class="gborder">
<?php
if ($skupaj2_away<>0) {$kolicnik2_away = round(100*$zadeti2_away/$skupaj2_away);}
echo $zadeti2_away,"/",$skupaj2_away,"&nbsp;(";
if ($skupaj2_away<>0) {echo $kolicnik2_away."%)<br/>";} else {echo " - )<br/>";}
?>
</td></tr><tr><td bgcolor="#B3D7A9" align="center" class="gborder">
<?php
if ($skupaj3_home<>0) {$kolicnik3_home = round(100*$zadeti3_home/$skupaj3_home);}
echo $zadeti3_home,"/",$skupaj3_home,"&nbsp;(";
if ($skupaj3_home<>0) {echo $kolicnik3_home."%)<br/>";} else {echo " - )<br/>";}
?>
</td><td align="center" class="gborder"><?=$langmark694?></td><td bgcolor="#E9967A" align="center" class="gborder">
<?php
if ($skupaj3_away<>0) {$kolicnik3_away = round(100*$zadeti3_away/$skupaj3_away);}
echo $zadeti3_away,"/",$skupaj3_away,"&nbsp;(";
if ($skupaj3_away<>0) {echo $kolicnik3_away."%)<br/>";} else {echo " - )<br/>";}
?>
</td></tr><tr><td bgcolor="#B3D7A9" align="center" class="gborder">
<?php
if ($skupaj1_home<>0) {$kolicnik1_home = round(100*$zadeti1_home/$skupaj1_home);}
echo $zadeti1_home,"/",$skupaj1_home,"&nbsp;(";
if ($skupaj1_home<>0) {echo $kolicnik1_home."%)<br/>";} else {echo " - )<br/>";}
?>
</td><td align="center" class="gborder"><?=$langmark712?></td><td bgcolor="#E9967A" align="center" class="gborder">
<?php
if ($skupaj1_away<>0) {$kolicnik1_away = round(100*$zadeti1_away/$skupaj1_away);}
echo $zadeti1_away,"/",$skupaj1_away,"&nbsp;(";
if ($skupaj1_away<>0) {echo $kolicnik1_away."%)<br/>";} else {echo " - )<br/>";}
?>
</td></tr><tr><td bgcolor="#B3D7A9" align="center" class="gborder">
<?=($skokidef_home+$skokioff_home),"&nbsp;(",$skokidef_home," + ",$skokioff_home,")<br/>"?>
</td><td align="center" class="gborder"><?=$langmark124?></td><td bgcolor="#E9967A" align="center" class="gborder">
<?=($skokidef_away+$skokioff_away),"&nbsp;(",$skokidef_away," + ",$skokioff_away,")<br/>"?>
</td></tr><tr><td bgcolor="#B3D7A9" align="center" class="gborder">
<?=$asists_home,"<br/>"?>
</td><td align="center" class="gborder"><?=$langmark695?></td><td bgcolor="#E9967A" align="center" class="gborder">
<?=$asists_away,"<br/>"?>
</td></tr><tr><td bgcolor="#B3D7A9" align="center" class="gborder">
<?=$favli_home,"<br/>"?>
</td>
<td align="center" class="gborder"><?=$langmark696?></td>
<td bgcolor="#E9967A" align="center" class="gborder">
<?=$favli_away,"<br/>"?>
</td></tr>
<tr><td bgcolor="#B3D7A9" align="center" class="gborder">
<?php echo $kraje_home,"<br/>";?>
</td>
<td align="center" class="gborder"><?=$langmark697?></td>
<td bgcolor="#E9967A" align="center" class="gborder">
<?php echo $kraje_away,"<br/>";?>
</td></tr>
<tr><td bgcolor="#B3D7A9" align="center" class="gborder">
<?php echo $napake_home,"<br/>";?>
</td>
<td align="center" class="gborder"><?=$langmark698?></td>
<td bgcolor="#E9967A" align="center" class="gborder">
<?php echo $napake_away,"<br/>";?>
</td></tr>
<tr><td bgcolor="#B3D7A9" align="center" class="gborder">
<?php echo $blokade_home,"<br/>";?>
</td>
<td align="center" class="gborder"><?=$langmark699?></td>
<td bgcolor="#E9967A" align="center" class="gborder">
<?php echo $blokade_away,"<br/>";
//---------------------------
//KONEC TEAMSTATSOV
//---------------------------
?>
</td></tr></table>

<table width="100%" border="1" cellpadding="0" cellspacing="0" style="border-spacing: 0px; border-collapse: separate; border-style: hidden;">
<tr><td class="gborder"><b><?=$langmark404?></b></td><td align="center" class="gborder"><b><?=$langmark700?></b></td><td align="center" class="gborder"><b><?=$langmark701?></b></td><td align="center" class="gborder"><b><?=$langmark702?></b></td><td align="center" class="gborder"><b><?=$langmark703?></b></td><td align="center" class="gborder"><b><?=$langmark704?></b></td><td align="center" class="gborder"><b><?=$langmark705?></b></td><td align="center" class="gborder"><b><?=$langmark706?></b></td><td align="center" class="gborder"><b><?=$langmark707?></b></td><td align="center" class="gborder"><b><?=$langmark708?></b></td><td align="center" class="gborder"><b><?=$langmark709?></b></td><td align="center" class="gborder"><b><?=$langmark710?></b></td></tr>

<?php
$zanka1 = mysql_query("SELECT * FROM `statistics` WHERE `team` ='$prvaekipa' AND `match` ='$matchid' ORDER BY `statid` ASC") or die(mysql_error());
$cifra1 = mysql_num_rows($zanka1);
$f=0;
while ($f < $cifra1) {
$playerA = mysql_result($zanka1,$f,"player");
$gametimeA = mysql_result($zanka1,$f,"gametime");
$two_scoredA = mysql_result($zanka1,$f,"two_scored");
$two_totalA = mysql_result($zanka1,$f,"two_total");
$one_scoredA = mysql_result($zanka1,$f,"one_scored");
$one_totalA = mysql_result($zanka1,$f,"one_total");
$three_scoredA = mysql_result($zanka1,$f,"three_scored");
$three_totalA = mysql_result($zanka1,$f,"three_total");
$def_reboundsA = mysql_result($zanka1,$f,"def_rebounds");
$off_reboundsA = mysql_result($zanka1,$f,"off_rebounds");
$blocksA = mysql_result($zanka1,$f,"blocks");
$assistsA = mysql_result($zanka1,$f,"assists");
$stealsA = mysql_result($zanka1,$f,"steals");
$foulsA = mysql_result($zanka1,$f,"fouls");
$turnoversA = mysql_result($zanka1,$f,"turnovers");

$sur = @mysql_query("SELECT id, surname, country FROM players WHERE id=$playerA");
$sur1 = @mysql_result($sur,0,"surname");
$sur2 = @mysql_result($sur,0,"id");
$cou12 = @mysql_result($sur,0,"country");
if ($cou12=='Greece' AND strlen($sur1) > 12) {$sur1 = substr($sur1,0,12); $sur1 = $sur1.".";}
//upokojen
if (empty($sur1)) {$sur1="<i>".$langmark759."</i>";} else {$sur1="<a class=\"greenhilite\" href=\"player.php?playerid=".$sur2."\">".$sur1."</a>";}
?>
<tr><td bgcolor="#B3D7A9" class="gborder"><?php if ($ipl1==$sur2 || $ipl2==$sur2 || $ipl3==$sur2 || $ipl4==$sur2 || $ipl5==$sur2) {echo "<img src=\"img/inj.gif\" border=\"0\" height=\"11\" Title=\"Injury\">";}?><?=$sur1?></td>
<td bgcolor="#B3D7A9" align="center" class="gborder"><?=(2*$two_scoredA+$one_scoredA+$three_scoredA*3)?></td>
<?php if ($two_totalA <> 0) {$kolicnik2 = round(100*$two_scoredA/$two_totalA);}?>
<td bgcolor="#B3D7A9" align="center" class="gborder"><?=$two_scoredA,"/",$two_totalA,"&nbsp;("?>
<?php if ($two_totalA <> 0) {echo $kolicnik2,"%)</td>";} else {echo " - )</td>";}
if ($three_totalA <> 0) {$kolicnik3 = round(100*$three_scoredA/$three_totalA);}?>
<td bgcolor="#B3D7A9" align="center" class="gborder"><?=$three_scoredA,"/",$three_totalA,"&nbsp;("?>
<?php if ($three_totalA <> 0) {echo $kolicnik3,"%)</td>";} else {echo " - )</td>";}
if ($one_totalA <> 0) {$kolicnik1 = round(100*$one_scoredA/$one_totalA);}?>
<td bgcolor="#B3D7A9" align="center" class="gborder"><?=$one_scoredA,"/",$one_totalA,"&nbsp;("?>
<?php if ($one_totalA <> 0) {echo $kolicnik1,"%)</td>";} else {echo " - )</td>";}?>
<td bgcolor="#B3D7A9" align="center" class="gborder"><?=$def_reboundsA,"+",$off_reboundsA?></td>
<td bgcolor="#B3D7A9" align="center" class="gborder"><?=$assistsA?></td>
<td bgcolor="#B3D7A9" align="center" class="gborder"><?=$foulsA?></td>
<td bgcolor="#B3D7A9" align="center" class="gborder"><?=$stealsA?></td>
<td bgcolor="#B3D7A9" align="center" class="gborder"><?=$turnoversA?></td>
<td bgcolor="#B3D7A9" align="center" class="gborder"><?=$blocksA?></td>
<?php $ratingigralca = (2*$two_scoredA+$one_scoredA+$three_scoredA*3) + $def_reboundsA + $off_reboundsA + $assistsA + $stealsA + $blocksA - $turnoversA - ($two_totalA - $two_scoredA) - ($three_totalA - $three_scoredA) - ($one_totalA - $one_scoredA);?>
<td bgcolor="#B3D7A9" align="center" class="gborder"><b><?=$ratingigralca?></b></td></tr>

<?php
//zvezdice
if ($playerA==$home_pg1) {$rating_hpg1=$ratingigralca;}
if ($playerA==$home_sg1) {$rating_hsg1=$ratingigralca;}
if ($playerA==$home_sf1) {$rating_hsf1=$ratingigralca;}
if ($playerA==$home_pf1) {$rating_hpf1=$ratingigralca;}
if ($playerA==$home_c1) {$rating_hc1=$ratingigralca;}
if ($playerA==$home_pg2) {$rating_hpg2=$ratingigralca;}
if ($playerA==$home_sg2) {$rating_hsg2=$ratingigralca;}
if ($playerA==$home_sf2) {$rating_hsf2=$ratingigralca;}
if ($playerA==$home_pf2) {$rating_hpf2=$ratingigralca;}
if ($playerA==$home_c2) {$rating_hc2=$ratingigralca;}

$f++;
}

//GOSTJE

$zanka2 = mysql_query("SELECT * FROM `statistics` WHERE `team` ='$drugaekipa' AND `match` ='$matchid' ORDER BY `statid` ASC") or die(mysql_error());
$cifra2 = mysql_num_rows($zanka2);
$g=0;
while ($g < $cifra2) {
$playerB = mysql_result($zanka2,$g,"player");
$gametimeB = mysql_result($zanka2,$g,"gametime");
$two_scoredB = mysql_result($zanka2,$g,"two_scored");
$two_totalB = mysql_result($zanka2,$g,"two_total");
$one_scoredB = mysql_result($zanka2,$g,"one_scored");
$one_totalB = mysql_result($zanka2,$g,"one_total");
$three_scoredB = mysql_result($zanka2,$g,"three_scored");
$three_totalB = mysql_result($zanka2,$g,"three_total");
$def_reboundsB = mysql_result($zanka2,$g,"def_rebounds");
$off_reboundsB = mysql_result($zanka2,$g,"off_rebounds");
$blocksB = mysql_result($zanka2,$g,"blocks");
$assistsB = mysql_result($zanka2,$g,"assists");
$stealsB = mysql_result($zanka2,$g,"steals");
$foulsB = mysql_result($zanka2,$g,"fouls");
$turnoversB = mysql_result($zanka2,$g,"turnovers");

$sur = @mysql_query("SELECT id, surname, country FROM players WHERE id=$playerB");
$sur1 = @mysql_result($sur,0,"surname");
$sur2 = @mysql_result($sur,0,"id");
$cou12 = @mysql_result($sur,0,"country");
if ($cou12=='Greece' AND strlen($sur1) > 12) {$sur1 = substr($sur1,0,12); $sur1 = $sur1.".";}
//upokojen
if (empty($sur1)) {$sur1="<i>".$langmark759."</i>";} else {$sur1="<a class=\"greenhilite\" href=\"player.php?playerid=".$sur2."\">".$sur1."</a>";}
?>
<tr><td bgcolor="#E9967A" class="gborder"><?php if ($ipl1==$sur2 || $ipl2==$sur2 || $ipl3==$sur2 || $ipl4==$sur2 || $ipl5==$sur2) {echo "<img src=\"img/inj.gif\" border=\"0\" height=\"11\" Title=\"Injury\">";}?><?=$sur1?></td>
<td bgcolor="#E9967A" align="center" class="gborder"><?=(2*$two_scoredB+$one_scoredB+$three_scoredB*3)?></td>
<?php if ($two_totalB <> 0) {$kolicnik2 = round(100*$two_scoredB/$two_totalB);}?>
<td bgcolor="#E9967A" align="center" class="gborder"><?=$two_scoredB,"/",$two_totalB,"&nbsp;("?>
<?php if ($two_totalB <> 0) {echo $kolicnik2,"%)</td>";} else {echo " - )</td>";}
if ($three_totalB <> 0) {$kolicnik3 = round(100*$three_scoredB/$three_totalB);}?>
<td bgcolor="#E9967A" align="center" class="gborder"><?=$three_scoredB,"/",$three_totalB,"&nbsp;("?>
<?php if ($three_totalB <> 0) {echo $kolicnik3,"%)</td>";} else {echo " - )</td>";}
if ($one_totalB <> 0) {$kolicnik1 = round(100*$one_scoredB/$one_totalB);}?>
<td bgcolor="#E9967A" align="center" class="gborder"><?=$one_scoredB,"/",$one_totalB,"&nbsp;("?>
<?php if ($one_totalB <> 0) {echo $kolicnik1,"%)</td>";} else {echo " - )</td>";}?>
<td bgcolor="#E9967A" align="center" class="gborder"><?=$def_reboundsB,"+",$off_reboundsB?></td>
<td bgcolor="#E9967A" align="center" class="gborder"><?=$assistsB?></td>
<td bgcolor="#E9967A" align="center" class="gborder"><?=$foulsB?></td>
<td bgcolor="#E9967A" align="center" class="gborder"><?=$stealsB?></td>
<td bgcolor="#E9967A" align="center" class="gborder"><?=$turnoversB?></td>
<td bgcolor="#E9967A" align="center" class="gborder"><?=$blocksB?></td>
<?php $ratingigralca = (2*$two_scoredB+$one_scoredB+$three_scoredB*3) + $def_reboundsB + $off_reboundsB + $assistsB + $stealsB + $blocksB - $turnoversB - ($two_totalB - $two_scoredB) - ($three_totalB - $three_scoredB) - ($one_totalB - $one_scoredB);?>
<td bgcolor="#E9967A" align="center" class="gborder"><b><?=$ratingigralca?></b></td></tr>

<?php
//zvezdice
if ($playerB==$away_pg1) {$rating_apg1=$ratingigralca;}
if ($playerB==$away_sg1) {$rating_asg1=$ratingigralca;}
if ($playerB==$away_sf1) {$rating_asf1=$ratingigralca;}
if ($playerB==$away_pf1) {$rating_apf1=$ratingigralca;}
if ($playerB==$away_c1) {$rating_ac1=$ratingigralca;}
if ($playerB==$away_pg2) {$rating_apg2=$ratingigralca;}
if ($playerB==$away_sg2) {$rating_asg2=$ratingigralca;}
if ($playerB==$away_sf2) {$rating_asf2=$ratingigralca;}
if ($playerB==$away_pf2) {$rating_apf2=$ratingigralca;}
if ($playerB==$away_c2) {$rating_ac2=$ratingigralca;}

$g++;
}
?>
</table>
<br/>
<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tr  valign="top">
<td width="55%">
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
</td>
<td width="45%" class="gborder">
<?php
if ($refresh <>1798 AND $event_type <>37 AND $action != 'team') {
$manofthematch = max($rating_hpg1,$rating_hsg1,$rating_hsf1,$rating_hpf1,$rating_hc1,$rating_apg1,$rating_asg1,$rating_asf1,$rating_apf1,$rating_ac1,$rating_hpg2,$rating_hsg2,$rating_hsf2,$rating_hpf2,$rating_hc2,$rating_apg2,$rating_asg2,$rating_asf2,$rating_apf2,$rating_ac2);
SWITCH ($manofthematch) {
CASE $rating_hc2:
$homec2_name = @mysql_query("SELECT surname FROM players WHERE id=$home_c2"); $hc2name=@mysql_result($homec2_name,0);
echo "<b>MVP:</b>&nbsp;",$hc2name,"<br/>"; break;
CASE $rating_hpg2:
$homepg2_name = @mysql_query("SELECT surname FROM players WHERE id=$home_pg2"); $hpg2name=@mysql_result($homepg2_name,0);
echo "<b>MVP:</b>&nbsp;",$hpg2name,"<br/>"; break;
CASE $rating_hpf2:
$homepf2_name = @mysql_query("SELECT surname FROM players WHERE id=$home_pf2"); $hpf2name=@mysql_result($homepf2_name,0);
echo "<b>MVP:</b>&nbsp;",$hpf2name,"<br/>"; break;
CASE $rating_hsg2:
$homesg2_name = @mysql_query("SELECT surname FROM players WHERE id=$home_sg2"); $hsg2name=@mysql_result($homesg2_name,0);
echo "<b>MVP:</b>&nbsp;",$hsg2name,"<br/>"; break;
CASE $rating_hsf2:
$homesf2_name = @mysql_query("SELECT surname FROM players WHERE id=$home_sf2"); $hsf2name=@mysql_result($homesf2_name,0);
echo "<b>MVP:</b>&nbsp;",$hsf2name,"<br/>"; break;
CASE $rating_ac2:
$awayc2_name = @mysql_query("SELECT surname FROM players WHERE id=$away_c2"); $ac2name=@mysql_result($awayc2_name,0);
echo "<b>MVP:</b>&nbsp;",$ac2name,"<br/>"; break;
CASE $rating_apg2:
$awaypg2_name = @mysql_query("SELECT surname FROM players WHERE id=$away_pg2"); $apg2name=@mysql_result($awaypg2_name,0);
echo "<b>MVP:</b>&nbsp;",$apg2name,"<br/>"; break;
CASE $rating_apf2:
$awaypf2_name = @mysql_query("SELECT surname FROM players WHERE id=$away_pf2"); $apf2name=@mysql_result($awaypf2_name,0);
echo "<b>MVP:</b>&nbsp;",$apf2name,"<br/>"; break;
CASE $rating_asg2:
$awaysg2_name = @mysql_query("SELECT surname FROM players WHERE id=$away_sg2"); $asg2name=@mysql_result($awaysg2_name,0);
echo "<b>MVP:</b>&nbsp;",$asg2name,"<br/>"; break;
CASE $rating_asf2:
$awaysf2_name = @mysql_query("SELECT surname FROM players WHERE id=$away_sf2"); $asf2name=@mysql_result($awaysf2_name,0);
echo "<b>MVP:</b>",$asf2name,"<br/>"; break;
CASE $rating_hc1: echo "<b>MVP:</b> ",$hc_name," ",$hc1name,"<br/>"; break;
CASE $rating_hpg1: echo "<b>MVP:</b> ",$hpg_name," ",$hpg1name,"<br/>"; break;
CASE $rating_hpf1: echo "<b>MVP:</b> ",$hpf_name," ",$hpf1name,"<br/>"; break;
CASE $rating_hsg1: echo "<b>MVP:</b> ",$hsg_name," ",$hsg1name,"<br/>"; break;
CASE $rating_hsf1: echo "<b>MVP:</b> ",$hsf_name," ",$hsf1name,"<br/>"; break;
CASE $rating_ac1: echo "<b>MVP:</b> ",$ac_name," ",$ac1name,"<br/>"; break;
CASE $rating_apg1: echo "<b>MVP:</b> ",$apg_name," ",$apg1name,"<br/>"; break;
CASE $rating_apf1: echo "<b>MVP:</b> ",$apf_name," ",$apf1name,"<br/>"; break;
CASE $rating_asg1: echo "<b>MVP:</b> ",$asg_name," ",$asg1name,"<br/>"; break;
CASE $rating_asf1: echo "<b>MVP:</b> ",$asf_name," ",$asf1name,"<br/>"; break;
}
}
elseif ($refresh <>1798 AND $event_type==37) {echo "<b>MVP:</b>&nbsp;-<br/>";}
if ($action=='team') {
?>
Match type:
<?php
SWITCH ($tip){
CASE 1: echo $langmark479; break;
CASE 2: echo $langmark320; break;
CASE 3: echo $langmark321; break;
CASE 4: echo $langmark322; break;
CASE 5: echo $langmark1274; break;
CASE 6: echo $langmark1274; break;
CASE 7: echo $langmark1274; break;
}
echo "<br/>";
}
?>
<br/><a href="cheerleaders.php?squad=<?=$home_id?>"><?=$imearene?></a><hr/>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td align="left"><?=$langmark062?>: </td><td align="right"><?=$gl1?></td></tr>
<tr><td align="left"><?=$langmark063?>: </td><td align="right"><?=$gl2?></td></tr>
<tr><td align="left"><?=$langmark716?>: </td><td align="right"><?=$gl3?></td></tr>
<tr><td align="left"><?=$langmark717?>: </td><td align="right"><?=$gl4?></td></tr>
<tr><td colspan="2"><hr/></td></tr>
<tr><td align="left"><b><?=$langmark718?>:</b> </td><td align="right"><b><?=$gled?></b></td></tr>
<tr><td align="right" colspan="2"><?php echo "<i>(",round(100*$gled/$tseats),"% of the full capacity)<i>";?></td></tr>
</table>

</td>
</tr>
</table>

</td><td class="border" width="28%">
<?php
if ($refresh <> '1798' && $action <> 'team' AND ($hreb > 0 || $areb >0)) {echo "<h2>",$langmark719,"</h2><a href=\"prikaz1.php?matchid=",$matchid,"&action=team\">Team ratings</a><br/>";}
elseif ($refresh <> '1798' && $action <> 'team' AND ($hreb==0 && $areb==0)) {echo "<h2>",$langmark719,"</h2><br/>";}
elseif ($refresh <> '1798' && $action == 'team') {echo "<h2>Team ratings</h2><a href=\"prikaz1.php?matchid=",$matchid,"\">Player ratings</a><br/>";}
else {echo "<h2>",$langmark720,"</h2>";}
?>
<br/>
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
<b><?=$langmark713?>:</b>&nbsp;<?=$home_def?><br/>
<b><?=$langmark714?>:</b>&nbsp;<?=$home_off?><br/><br/>
<?php
if ($refresh <>1798) {

if ($home_pg1 > 0) {

if (empty($hpg_name) && empty($hpg1name)){echo "<b>PG:</b> <i>",$langmark759,"</i><br/>";}
else {echo "<b>PG:</b> <a href=\"player.php?playerid=",$home_pg1,"\">",$hpg_name," ",$hpg1name,"</a><br/>";}
$star_qual=$hpgstarat;

if ($star_qual < 70) {$slika = '<img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 69 AND $star_qual < 92) {$slika = '<img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 91 AND $star_qual < 114) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 113 AND $star_qual < 136) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 135 AND $star_qual < 158) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 157 AND $star_qual < 180) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 179 AND $star_qual < 202) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 201 AND $star_qual < 224) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 223 AND $star_qual < 247) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 246 AND $star_qual < 279) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 268 AND $star_qual < 291) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 290 AND $star_qual < 313) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 312 AND $star_qual < 335) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 334 AND $star_qual < 357) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 356 AND $star_qual < 379) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 378) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}

echo $slika,"<br/>";

}
if ($home_sg1 > 0) {

if (empty($hsg_name) && empty($hsg1name)){echo "<b>SG:</b> <i>",$langmark759,"</i><br/>";}
else {echo "<b>SG:</b> <a href=\"player.php?playerid=",$home_sg1,"\">",$hsg_name," ",$hsg1name,"</a><br/>";}
$star_qual=$hsgstarat;

if ($star_qual < 70) {$slika = '<img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 69 AND $star_qual < 92) {$slika = '<img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 91 AND $star_qual < 114) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 113 AND $star_qual < 136) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 135 AND $star_qual < 158) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 157 AND $star_qual < 180) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 179 AND $star_qual < 202) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 201 AND $star_qual < 224) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 223 AND $star_qual < 247) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 246 AND $star_qual < 279) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 268 AND $star_qual < 291) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 290 AND $star_qual < 313) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 312 AND $star_qual < 335) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 334 AND $star_qual < 357) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 356 AND $star_qual < 379) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 378) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}

echo $slika,"<br/>";

}
if ($home_sf1 >0) {

if (empty($hsf_name) && empty($hsf1name)){echo "<b>SF:</b> <i>",$langmark759,"</i><br/>";}
else {echo "<b>SF:</b> <a href=\"player.php?playerid=",$home_sf1,"\">",$hsf_name," ",$hsf1name,"</a><br/>";}
$star_qual=$hsfstarat;

if ($star_qual < 70) {$slika = '<img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 69 AND $star_qual < 92) {$slika = '<img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 91 AND $star_qual < 114) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 113 AND $star_qual < 136) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 135 AND $star_qual < 158) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 157 AND $star_qual < 180) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 179 AND $star_qual < 202) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 201 AND $star_qual < 224) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 223 AND $star_qual < 247) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 246 AND $star_qual < 279) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 268 AND $star_qual < 291) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 290 AND $star_qual < 313) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 312 AND $star_qual < 335) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 334 AND $star_qual < 357) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 356 AND $star_qual < 379) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 378) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}

echo $slika,"<br/>";

}
if ($home_pf1 >0) {

if (empty($hpf_name) && empty($hpf1name)){echo "<b>PF:</b> <i>",$langmark759,"</i><br/>";}
else {echo "<b>PF:</b> <a href=\"player.php?playerid=",$home_pf1,"\">",$hpf_name," ",$hpf1name,"</a><br/>";}
$star_qual=$hpfstarat;

if ($star_qual < 70) {$slika = '<img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 69 AND $star_qual < 92) {$slika = '<img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 91 AND $star_qual < 114) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 113 AND $star_qual < 136) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 135 AND $star_qual < 158) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 157 AND $star_qual < 180) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 179 AND $star_qual < 202) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 201 AND $star_qual < 224) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 223 AND $star_qual < 247) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 246 AND $star_qual < 279) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 268 AND $star_qual < 291) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 290 AND $star_qual < 313) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 312 AND $star_qual < 335) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 334 AND $star_qual < 357) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 356 AND $star_qual < 379) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 378) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}

echo $slika,"<br/>";

}
if ($home_c1 >0) {

if (empty($hc_name) && empty($hc1name)){echo "<b>C:</b> <i>",$langmark759,"</i><br/>";}
else {echo "<b>C:</b> <a href=\"player.php?playerid=",$home_c1,"\">",$hc_name," ",$hc1name,"</a><br/>";}
$star_qual=$hcstarat;

if ($star_qual < 70) {$slika = '<img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 69 AND $star_qual < 92) {$slika = '<img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 91 AND $star_qual < 114) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 113 AND $star_qual < 136) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 135 AND $star_qual < 158) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 157 AND $star_qual < 180) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 179 AND $star_qual < 202) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 201 AND $star_qual < 224) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 223 AND $star_qual < 247) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 246 AND $star_qual < 279) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 268 AND $star_qual < 291) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 290 AND $star_qual < 313) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 312 AND $star_qual < 335) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 334 AND $star_qual < 357) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 356 AND $star_qual < 379) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 378) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}

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
<b><?=$langmark713?>:</b>&nbsp;<?=$away_def?><br/>
<b><?=$langmark714?>:</b>&nbsp;<?=$away_off?><br/><br/>
<?php
if ($refresh <>1798) {

if ($away_pg1 >0) {

if (empty($apg_name) && empty($apg1name)){echo "<b>PG:</b> <i>",$langmark759,"</i><br/>";}
else {echo "<b>PG:</b> <a href=\"player.php?playerid=",$away_pg1,"\">",$apg_name," ",$apg1name,"</a><br/>";}
$star_qual=$apgstarat;

if ($star_qual < 70) {$slika = '<img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 69 AND $star_qual < 92) {$slika = '<img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 91 AND $star_qual < 114) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 113 AND $star_qual < 136) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 135 AND $star_qual < 158) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 157 AND $star_qual < 180) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 179 AND $star_qual < 202) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 201 AND $star_qual < 224) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 223 AND $star_qual < 247) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 246 AND $star_qual < 279) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 268 AND $star_qual < 291) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 290 AND $star_qual < 313) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 312 AND $star_qual < 335) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 334 AND $star_qual < 357) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 356 AND $star_qual < 379) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 378) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}

echo $slika,"<br/>";

}
if ($away_sg1 >0) {

if (empty($asg_name) && empty($asg1name)){echo "<b>SG:</b> <i>",$langmark759,"</i><br/>";}
else {echo "<b>SG:</b> <a href=\"player.php?playerid=",$away_sg1,"\">",$asg_name," ",$asg1name,"</a><br/>";}
$star_qual=$asgstarat;

if ($star_qual < 70) {$slika = '<img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 69 AND $star_qual < 92) {$slika = '<img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 91 AND $star_qual < 114) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 113 AND $star_qual < 136) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 135 AND $star_qual < 158) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 157 AND $star_qual < 180) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 179 AND $star_qual < 202) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 201 AND $star_qual < 224) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 223 AND $star_qual < 247) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 246 AND $star_qual < 279) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 268 AND $star_qual < 291) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 290 AND $star_qual < 313) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 312 AND $star_qual < 335) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 334 AND $star_qual < 357) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 356 AND $star_qual < 379) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 378) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}

echo $slika,"<br/>";

}
if ($away_sf1 >0) {

if (empty($asf_name) && empty($asf1name)){echo "<b>SF:</b> <i>",$langmark759,"</i><br/>";}
else {echo "<b>SF:</b> <a href=\"player.php?playerid=",$away_sf1,"\">",$asf_name," ",$asf1name,"</a><br/>";}
$star_qual=$asfstarat;

if ($star_qual < 70) {$slika = '<img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 69 AND $star_qual < 92) {$slika = '<img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 91 AND $star_qual < 114) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 113 AND $star_qual < 136) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 135 AND $star_qual < 158) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 157 AND $star_qual < 180) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 179 AND $star_qual < 202) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 201 AND $star_qual < 224) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 223 AND $star_qual < 247) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 246 AND $star_qual < 279) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 268 AND $star_qual < 291) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 290 AND $star_qual < 313) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 312 AND $star_qual < 335) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 334 AND $star_qual < 357) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 356 AND $star_qual < 379) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 378) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}

echo $slika,"<br/>";

}
if ($away_pf1 >0) {

if (empty($apf_name) && empty($apf1name)){echo "<b>PF:</b> <i>",$langmark759,"</i><br/>";}
else {echo "<b>PF:</b> <a href=\"player.php?playerid=",$away_pf1,"\">",$apf_name," ",$apf1name,"</a><br/>";}
$star_qual=$apfstarat;

if ($star_qual < 70) {$slika = '<img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 69 AND $star_qual < 92) {$slika = '<img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 91 AND $star_qual < 114) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 113 AND $star_qual < 136) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 135 AND $star_qual < 158) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 157 AND $star_qual < 180) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 179 AND $star_qual < 202) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 201 AND $star_qual < 224) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 223 AND $star_qual < 247) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 246 AND $star_qual < 279) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 268 AND $star_qual < 291) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 290 AND $star_qual < 313) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 312 AND $star_qual < 335) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 334 AND $star_qual < 357) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 356 AND $star_qual < 379) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 378) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}

echo $slika,"<br/>";

}
if ($away_c1 >0) {

if (empty($ac_name) && empty($ac1name)){echo "<b>C:</b> <i>",$langmark759,"</i><br/>";}
else {echo "<b>C:</b> <a href=\"player.php?playerid=",$away_c1,"\">",$ac_name," ",$ac1name,"</a><br/>";}
$star_qual=$acstarat;

if ($star_qual < 70) {$slika = '<img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 69 AND $star_qual < 92) {$slika = '<img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 91 AND $star_qual < 114) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 113 AND $star_qual < 136) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 135 AND $star_qual < 158) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 157 AND $star_qual < 180) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 179 AND $star_qual < 202) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 201 AND $star_qual < 224) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 223 AND $star_qual < 247) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 246 AND $star_qual < 279) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 268 AND $star_qual < 291) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 290 AND $star_qual < 313) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 312 AND $star_qual < 335) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 334 AND $star_qual < 357) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}
if ($star_qual > 356 AND $star_qual < 379) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
if ($star_qual > 378) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><b><font size=2 color=lightblue>&#189;</font></b>';}

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
echo "<hr/><i>Ratings show what your starting five is capable of. That gives you a general idea, but actual performances can be evaluated from statistics only. Ratings also exclude important influences: tactics, subs, individual quality, contribution based on playing positions and daily form.</i><hr/>";
}
if ($refresh==1798) { echo"<a href=\"matchreport1.php?matchid=",$matchid,"\">",$langmark733,"</a>";}
?>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>