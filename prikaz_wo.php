<?php
$matchid=$_GET['matchid'];
if (!is_numeric($matchid)){die(include 'index.php');}

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$luna = mysql_query("SELECT `statid` FROM `statistics` WHERE `match` ='$matchid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($luna)==1 && $action <>'bookmark' && $action <>'multiview') {
$dodlink=mysql_result($luna,0);
if ($dodlink < 37337462) {header("Location:prikaz-test.php?matchid=$matchid");} else {header("Location:prikaz1.php?matchid=$matchid");}
die();}

$comparepasss = mysql_query("SELECT club, supporter, lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($comparepasss)==1) {
$trueclub = mysql_result ($comparepasss,0,"club");
$is_supporter = mysql_result ($comparepasss,0,"supporter");
$lang = mysql_result ($comparepasss,0,"lang");
}
else {die(include 'basketsim.php');}

$action=$_GET["action"];
SWITCH ($action) {
CASE 'bookmark':
if ($is_supporter==1) {
$already = mysql_query("SELECT bookmarkid FROM bookmarks WHERE b_type =3 && multiview =0 && team ='$trueclub' && b_link ='$matchid' LIMIT 1") or die(mysql_error());
if (!mysql_num_rows($already)) {mysql_query("INSERT INTO bookmarks VALUES ('', $trueclub, '', $matchid, 3, 0);") or die(mysql_error());}
header ("Location: bookmarks.php");
} break;
CASE 'multiview':
$already = mysql_query("SELECT bookmarkid FROM bookmarks WHERE b_type =3 && multiview =1 && team ='$trueclub'") or die(mysql_error());
if (mysql_num_rows($already)>5 && $is_supporter==1) {header("Location:multiview.php?act=7"); die();}
if (mysql_num_rows($already)>2 && $is_supporter==0) {header("Location:multiview.php?act=7"); die();}
$already = mysql_query("SELECT bookmarkid FROM bookmarks WHERE b_type =3 && multiview =1 AND team ='$trueclub' AND b_link ='$matchid'") or die(mysql_error());
if (!mysql_num_rows($already)) {mysql_query("INSERT INTO bookmarks VALUES ('', $trueclub, '', $matchid, 3, 1);") or die(mysql_error());}
header("Location: multiview.php");
break;
}

$zdaj = date("Y-m-d H:i:s");
$vzivo = mysql_query("SELECT event_id FROM matchevents1 WHERE event_time > '$zdaj' && match_id ='$matchid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($vzivo)==1) {$refresh=1798;}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');

die("<table border=\"0\" cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr valign=\"top\" bgcolor=\"#ffffff\"><td class=\"border\" width=\"100%\"><b>Some walkover matches from the past currently cannot be displayed, this will be corrected in the future, so at least display of players involved in that match will be possible!</b><br/><br/><a href=\"javascript: history.go(-1)\">back</a></td></tr></table>");

$pru=mysql_query("SELECT `report`, `end`, `last` FROM `matchreports` WHERE `lang` ='$lang' AND `match` ='$matchid' LIMIT 1") or die(mysql_error());
$tdatetime = explode(" ",$zdaj); $ffdate = $tdatetime[0]; $fftime = $tdatetime[1];
$tdate = explode("-", $ffdate); $ffyear = $tdate[0]; $ffmonth = $tdate[1]; $ffday = $tdate[2];
$ttime = explode(":", $fftime); $ffhour = $ttime[0]; $ffmin = $ttime[1]; $ffsec = $ttime[2];
$date30 = date("Y-m-d H:i:s", mktime($ffhour,$ffmin,$ffsec-40,$ffmonth,$ffday,$ffyear));
if (mysql_num_rows($pru)==1 AND $refresh<>1798 AND mysql_result($pru,0,"end") < mysql_result($pru,0,"last")) {echo stripslashes(mysql_result($pru,0,"report")); die();}
if (mysql_num_rows($pru)==1 AND $refresh==1798 AND $date30 < mysql_result($pru,0,"last")) {echo stripslashes(mysql_result($pru,0,"report")); die();}

ob_start();
?>

<div id="main">
<h2><?=$langmark324?></h2>

<table border="0" cellspacing="10" cellpadding="10" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="73%">
<?php
$result = mysql_query("SELECT * FROM matchevents WHERE event_time < '$zdaj' AND match_id ='$matchid' ORDER BY event_id DESC LIMIT 4");
$num=mysql_num_rows($result);
if ($num == 0){$tekmabo = mysql_query("SELECT home_id, away_id, time FROM matches WHERE matchid ='$matchid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($tekmabo) < 1) {die ("$langmark325.<br/><a href=\"matches.php\">$langmark059</a></td></tr></table><img src=\"img/bbs.jpg\" alt=\"\">");}
else {
//the match is scheduled for the future
$team1=mysql_result($tekmabo,0,"home_id");
$team2=mysql_result($tekmabo,0,"away_id");
$timeof=mysql_result($tekmabo,0,"time");

$tp1 = mysql_query("SELECT name, status FROM teams WHERE teamid ='$team1' LIMIT 1") or die(mysql_error());
$temname=mysql_result($tp1,0,"name"); $temname=stripslashes($temname); $statusje=mysql_result($tp1,0,"status");
$tp2 = mysql_query("SELECT name, status FROM teams WHERE teamid ='$team2' LIMIT 1") or die(mysql_error());
$temname2=mysql_result($tp2,0,"name"); $temname2=stripslashes($temname2); $statusjeb=mysql_result($tp2,0,"status");

$splitdt1 = explode(" ", $timeof); $bdate1 = $splitdt1[0]; $btime1 = $splitdt1[1];
$splitd1 = explode("-", $bdate1); $byear1 = $splitd1[0]; $bmonth1 = $splitd1[1]; $bday1 = $splitd1[2];
$splitt1 = explode(":", $btime1); $bhour1 = $splitt1[0]; $bmin1 = $splitt1[1]; $bsec1 = $splitt1[2];
$timdisp = date("d.m.Y H:i", mktime($bhour1,$bmin1,$bsec1,$bmonth1,$bday1,$byear1));

$result18 = mysql_query("SELECT userid FROM users WHERE club ='$team1' LIMIT 1"); while ($cln = mysql_fetch_array($result18, MYSQL_ASSOC)) {foreach ($cln as $clink) {$clink;} } ;
$result18b = mysql_query("SELECT userid FROM users WHERE club ='$team2' LIMIT 1"); while ($bln = mysql_fetch_array($result18b, MYSQL_ASSOC)) {foreach ($bln as $blink) {$blink;} } ;

if ($statusje<>3) {$dpovezava = "<a href=club.php?clubid=".$clink.">";} else {$dpovezava = "<a href=\"team.php?clubid=".$team1."\">";}
if ($statusjeb<>3) {$gpovezava= "<a href=club.php?clubid=".$blink.">";} else {$gpovezava = "<a href=\"team.php?clubid=".$team2."\">";}

if($is_supporter==1){$prikaz_book="&nbsp;<a href=\"prikaz.php?matchid=$matchid&action=bookmark\"><img src=\"img/bookmark.jpg\" border=0 title=\"".$langmark331."\"></a>&nbsp;";}
if($is_supporter<>1){$prikaz_book="&nbsp;";}
?>
<table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="left">
<b><?=$temname?> - <?=$temname2?></b><?=$prikaz_book?>
<a href="prikaz.php?matchid=<?=$matchid?>&action=multiview"><img src="img/live.jpg" border="0" alt="<?=$langmark332?>" title="<?=$langmark332?>"></a>
</td><td align="right">
<b><?=$langmark647?>:</b> <?=$matchid?>
</td></tr></table><br/><?=$langmark688," ",$timdisp,"<br/>",$langmark689?><br/>
<br/><a href="prikaz.php?action=past&matchid=<?=$matchid?>"><?=$langmark1464?></a>&nbsp;<a href="javascript: history.go(-1)"><?=$langmark132?></a></td>
<td class="border" width="45%"><h2><?=$langmark335?></h2><br/><?=$dpovezava,"",$temname,"</a><br/>",$gpovezava,"",$temname2?></a></td></tr>
<?php
if ($action=='past') {
$exmatches = mysql_query("SELECT matchid, home_name, away_name, home_score, away_score, time, type FROM matches WHERE home_score >0 AND home_id ='$team1' AND away_id ='$team2' UNION SELECT matchid, home_name, away_name, home_score, away_score, time, type FROM matches WHERE home_score >0 AND away_id ='$team1' AND home_id ='$team2' ORDER BY `time` DESC");
echo "<tr valign=\"top\" bgcolor=\"#ffffff\"><td class=\"border\" width=\"50%\"><b>",$langmark1465,"</b><br/><br/><table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\">";
while ($m = mysql_fetch_array($exmatches)) {
$matchid=$m["matchid"];
$home_name=$m["home_name"];
$away_name=$m["away_name"];
$home_score=$m["home_score"];
$away_score=$m["away_score"];
$time=$m["time"];
$typee=$m["type"];
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
CASE 1: $tip=$langmark479; break;
CASE 2: $tip=$langmark320; break;
CASE 3: $tip=$langmark321; break;
CASE 4: $tip=$langmark322; break;
CASE 5: $tip=$langmark1274; break;
CASE 6: $tip=$langmark1274; break;
CASE 7: $tip=$langmark1274; break;
}
echo "&nbsp;(",$tip,")&nbsp;</td><td align=\"right\"><a href=\"prikaz.php?matchid=",$matchid,"\">",$home_score," : ",$away_score,"</a></tr>";
}
if (mysql_num_rows($exmatches)==0) {echo "<i>",$langmark1466,"</i>";}
}
echo "</table></td></tr></table><img src=\"img/bbs.jpg\" alt=\"\">";}
die();
}

$gledalci = mysql_query("SELECT * FROM matches WHERE matchid ='$matchid' LIMIT 1");
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
$time_tekme=$o["time"];
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
$ar1 = mysql_query("SELECT arenaname FROM arena WHERE arenaid ='$arena' LIMIT 1");
$imearene=mysql_result($ar1,0);
$imearene=stripslashes($imearene);

$splitdt1 = explode(" ", $time_tekme); $bdate1 = $splitdt1[0]; $btime1 = $splitdt1[1];
$splitd1 = explode("-", $bdate1); $byear1 = $splitd1[0]; $bmonth1 = $splitd1[1]; $bday1 = $splitd1[2];
$splitt1 = explode(":", $btime1); $bhour1 = $splitt1[0]; $bmin1 = $splitt1[1]; $bsec1 = $splitt1[2];
$timdisp = date("d.m.Y H:i", mktime($bhour1,$bmin1,$bsec1,$bmonth1,$bday1,$byear1));

echo "<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td>";
echo "<b>",$timdisp,"</b>";
if ($is_supporter==1){echo "&nbsp;<a href=\"prikaz.php?matchid=",$matchid,"&action=bookmark\"><img src=\"img/bookmark.jpg\" border=\"0\" alt=\"",$langmark331,"\" title=\"",$langmark331,"\"></a>";}
if ($refresh==1798) {echo "&nbsp;<a href=\"prikaz.php?matchid=",$matchid,"&action=multiview\"><img src=\"img/live.jpg\" border=\"0\" alt=\"",$langmark332,"\" title=\"",$langmark332,"\"></a>";}
echo "</td><td align=\"right\"><b>",$langmark647,":</b> ",$matchid,"</td></tr></table><hr/>";

$home_id=$prvaekipa;
$away_id=$drugaekipa;

//klubid1
$result18 = mysql_query("SELECT userid FROM users WHERE club ='$home_id' LIMIT 1");
while ($cln = mysql_fetch_array($result18, MYSQL_ASSOC))
   {   foreach ($cln as $clink)
   {$clink; }     } ;
//klubid2
$result18b = mysql_query("SELECT userid FROM users WHERE club ='$away_id' LIMIT 1");
while ($bln = mysql_fetch_array($result18b, MYSQL_ASSOC))
   {   foreach ($bln as $blink)
   {$blink; }     } ;
//status
$result19 = mysql_query("SELECT status FROM teams WHERE teamid ='$home_id' LIMIT 1");
while ($stat = mysql_fetch_array($result19, MYSQL_ASSOC))
   {   foreach ($stat as $statusje)
   {$statusje; }     } ;
//status2
$result19b = mysql_query("SELECT status FROM teams WHERE teamid ='$away_id' LIMIT 1");
while ($statb = mysql_fetch_array($result19b, MYSQL_ASSOC))
   {   foreach ($statb as $statusjeb)
   {$statusjeb; }     } ;
?>
<table width="100%" cellspacing="2" cellpadding="1">
<tr>
<td class="border">
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

$tp1 = mysql_query("SELECT name FROM teams WHERE teamid ='$team1id' LIMIT 1");
$jam = mysql_num_rows($tp1);
if ($jam > 0){$temname=mysql_result($tp1,0);}
$tp2 = mysql_query("SELECT name FROM teams WHERE teamid ='$team2id' LIMIT 1");
$lum = mysql_num_rows($tp2);
if ($lum > 0){$temname2=mysql_result($tp2,0);}

$resultp1 = mysql_query("SELECT name,surname FROM players WHERE id =$player1id LIMIT 1");
$drum = mysql_num_rows($resultp1);
if ($drum > 0){
$name1=mysql_result($resultp1,0,"name");
$surname1=mysql_result($resultp1,0,"surname");
}

$resultp2 = mysql_query("SELECT name,surname FROM players WHERE id =$player2id LIMIT 1");
$bum = mysql_num_rows($resultp2);
if ($bum > 0){
$name2=mysql_result($resultp2,0,"name");
$surname2=mysql_result($resultp2,0,"surname");
}

$query = mysql_query("SELECT description FROM descriptions WHERE descid =$desc_id LIMIT 1");
while ($users_team = mysql_fetch_array($query, MYSQL_ASSOC))
   {   foreach ($users_team as $get_team)
   {$get_team; }     } ;

if ($team1id==$prvaekipa){
$get_team=str_replace('$team1id',"<font color=green><b>$temname</b></font>",$get_team);
$get_team=str_replace('$team2id',"<font color=red><b>$temname2</b></font>",$get_team);
}
if ($team1id==$drugaekipa){
$get_team=str_replace('$team1id',"<font color=red><b>$temname</b></font>",$get_team);
$get_team=str_replace('$team2id',"<font color=green><b>$temname2</b></font>",$get_team);
}

if ($player1id == $home_pg1 OR $player1id == $home_sg1 OR $player1id == $home_sf1 OR $player1id == $home_pf1 OR $player1id == $home_c1 OR $player1id == $home_pg2 OR $player1id == $home_sg2 OR $player1id == $home_sf2 OR $player1id == $home_pf2 OR $player1id == $home_c2){
$get_team=str_replace('$player1id',"<font color=green><b>$surname1</b></font>",$get_team);} else { $get_team=str_replace('$player1id',"<font color=red><b>$surname1</b></font>",$get_team);}
if ($player2id == $home_pg1 OR $player2id == $home_sg1 OR $player2id == $home_sf1 OR $player2id == $home_pf1 OR $player2id == $home_c1 OR $player2id == $home_pg2 OR $player2id == $home_sg2 OR $player2id == $home_sf2 OR $player2id == $home_pf2 OR $player2id == $home_c2){
$get_team=str_replace('$player2id',"<font color=green><b>$surname2</b></font>",$get_team);} else { $get_team=str_replace('$player2id',"<font color=red><b>$surname2</b></font>",$get_team);}

$get_team=str_replace('$home_sc',"$home_sc",$get_team);
$get_team=str_replace('$away_sc.',"$away_sc",$get_team);

if ($refresh ==1798) {echo stripslashes($get_team)."<br/>";}

$i++;
}
if ($refresh !=1798) {echo $langmark690,". <a href=\"matchreport.php?matchid=",$matchid,"\">",$langmark1273,"</a>";}
?>
</td></tr></table>

<table border="1" cellspacing="0" cellpadding="1" width="100%">
<tr>
<td align="center" width="40%">
<?php
if ($statusje<>3) {echo "<a href=\"club.php?clubid=",$clink,"\">";}
else {echo "<a href=\"team.php?clubid=",$home_id,"\">";}
?>
<img src="img/link.jpg" border="0" alt="<?=$langmark691?>" title="<?=$langmark691?>"></a><br/><b><font color="green"><?=$home_name?></font></b>
</td>
<td align="center" width="21%">
</td>
<td align="center" width="40%">
<?php
if ($statusjeb<>3) {echo "<a href=\"club.php?clubid=",$blink,"\">";}
else {echo "<a href=\"team.php?clubid=",$away_id,"\">";}
?>
<img src="img/link.jpg" border="0" alt="<?=$langmark691?>" title="<?=$langmark691?>"></a><br/><b><font color="red"><?=$away_name?></font></b>
</td></tr>
<tr>
<td bgcolor="#98FB98" align="center">
<b><?php $testhome_sc=mysql_result($result,0,"home_sc");
echo $testhome_sc; ?></b>
</td>
<td align="center"><b><?=$langmark692?></b></td>
<td bgcolor="#E9967A" align="center">
<b><?php $testaway_sc=mysql_result($result,0,"away_sc");
echo $testaway_sc; ?></b>
</td></tr>
<td bgcolor="#98FB98" align="center">
<?php
//TIMSKI STATSI

//twopoints - domaci
$sql_faljeni2 = "SELECT COUNT(*) AS faljeni2 FROM matchevents WHERE team1id=$prvaekipa AND event_time < '$zdaj' AND (event_type=3 OR event_type=4 OR event_type=28 OR event_type=29 OR event_type=31) AND match_id ='$matchid'";
$query_faljeni2 = mysql_query($sql_faljeni2);
$row1 = mysql_fetch_array($query_faljeni2, MYSQL_ASSOC);
$sql_zadeti2 = "SELECT COUNT(*) AS zadeti2 FROM matchevents WHERE team1id=$prvaekipa AND event_time < '$zdaj' AND (event_type=1 OR event_type=2 OR event_type=27 OR event_type=23 OR event_type=12) AND match_id ='$matchid'";
$query_zadeti2 = mysql_query($sql_zadeti2);
$row2 = mysql_fetch_array($query_zadeti2, MYSQL_ASSOC);
$faljeni2 = $row1['faljeni2'];
$zadeti2 = $row2['zadeti2'];
$skupaj2 = $faljeni2 + $zadeti2;
if ($skupaj2 != 0) {$kolicnik2 = round(100*$zadeti2/$skupaj2);}
echo $zadeti2."/".$skupaj2." (";
if ($skupaj2 != 0) {echo $kolicnik2."%)<br/>";} else {echo " - )<br/>";}
?>
</td>
<td align="center"><?=$langmark693?></td>
<td bgcolor="#E9967A" align="center">
<?php
//gostje
$sql_faljeni2 = "SELECT COUNT(*) AS faljeni2 FROM matchevents WHERE team1id=$drugaekipa AND event_time < '$zdaj' AND (event_type=3 OR event_type=4 OR event_type=28 OR event_type=29 OR event_type=31) AND match_id ='$matchid'";
$query_faljeni2 = mysql_query($sql_faljeni2);
$row1 = mysql_fetch_array($query_faljeni2, MYSQL_ASSOC);
$sql_zadeti2 = "SELECT COUNT(*) AS zadeti2 FROM matchevents WHERE team1id=$drugaekipa AND event_time < '$zdaj' AND (event_type=1 OR event_type=2 OR event_type=27 OR event_type=23 OR event_type=12) AND match_id ='$matchid'";
$query_zadeti2 = mysql_query($sql_zadeti2);
$row2 = mysql_fetch_array($query_zadeti2, MYSQL_ASSOC);
$faljeni2 = $row1['faljeni2'];
$zadeti2 = $row2['zadeti2'];
$skupaj2 = $faljeni2 + $zadeti2;
if ($skupaj2 != 0) {$kolicnik2 = round(100*$zadeti2/$skupaj2);}
echo $zadeti2,"/",$skupaj2,"&nbsp;(";
if ($skupaj2 != 0) {echo $kolicnik2,"%)<br/>";} else {echo " - )<br/>";}
?>
</td></tr>
<tr><td bgcolor="#98FB98" align="center">
<?php
//trojke - domaci
$sql_faljeni3 = "SELECT COUNT(*) AS faljeni3 FROM matchevents WHERE team1id=$prvaekipa AND event_time < '$zdaj' AND (event_type=8 OR event_type=9) AND match_id ='$matchid'";
$query_faljeni3 = mysql_query($sql_faljeni3);
$row1 = mysql_fetch_array($query_faljeni3, MYSQL_ASSOC);
$sql_zadeti3 = "SELECT COUNT(*) AS zadeti3 FROM matchevents WHERE team1id=$prvaekipa AND event_time < '$zdaj' AND (event_type=7 OR event_type=13 OR event_type=24) AND match_id ='$matchid'";
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
<td align="center"><?=$langmark694?></td>
<td bgcolor="#E9967A" align="center">
<?php
//gostje
$sql_faljeni3 = "SELECT COUNT(*) AS faljeni3 FROM matchevents WHERE team1id =$drugaekipa AND event_time < '$zdaj' AND (event_type=8 OR event_type=9) AND match_id ='$matchid'";
$query_faljeni3 = mysql_query($sql_faljeni3);
$row1 = mysql_fetch_array($query_faljeni3, MYSQL_ASSOC);
$sql_zadeti3 = "SELECT COUNT(*) AS zadeti3 FROM matchevents WHERE team1id =$drugaekipa AND event_time < '$zdaj' AND (event_type=7 OR event_type=13 OR event_type=24) AND match_id ='$matchid'";
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
<tr><td bgcolor="#98FB98" align="center">
<?php
//prosti meti - domaci
//vrzeni
$sqlp2meta = "SELECT COUNT(*) AS p2meta FROM matchevents WHERE team1id =$prvaekipa AND event_time < '$zdaj' AND (event_type=14 OR event_type=15 OR event_type=16) AND match_id ='$matchid'";
$queryp2meta = mysql_query($sqlp2meta);
$rowp2meta = mysql_fetch_array($queryp2meta, MYSQL_ASSOC);
$sqlp3meti = "SELECT COUNT(*) AS p3meti FROM matchevents WHERE team1id =$prvaekipa AND event_time < '$zdaj' AND (event_type=17 OR event_type=18 OR event_type=19 OR event_type=20) AND match_id ='$matchid'";
$queryp3meti = mysql_query($sqlp3meti);
$rowp3meti = mysql_fetch_array($queryp3meti, MYSQL_ASSOC);
$sqlp1met = "SELECT COUNT(*) AS p1met FROM matchevents WHERE team1id =$prvaekipa AND event_time < '$zdaj' AND (event_type=21 OR event_type=22) AND match_id ='$matchid'";
$queryp1met = mysql_query($sqlp1met);
$rowp1met = mysql_fetch_array($queryp1met, MYSQL_ASSOC);
$p2meta = $rowp2meta['p2meta'];
$p3meti = $rowp3meti['p3meti'];
$p1met = $rowp1met['p1met'];
//zadeti
$sqlp2meta_z = "SELECT COUNT(*) AS p2meta_z FROM matchevents WHERE team1id =$prvaekipa AND event_time < '$zdaj' AND (event_type=14 OR event_type=18) AND match_id ='$matchid'";
$queryp2meta_z = mysql_query($sqlp2meta_z);
$rowp2meta_z = mysql_fetch_array($queryp2meta_z, MYSQL_ASSOC);
$sqlp3meti_z = "SELECT COUNT(*) AS p3meti_z FROM matchevents WHERE team1id =$prvaekipa AND event_time < '$zdaj' AND event_type=17 AND match_id ='$matchid'";
$queryp3meti_z = mysql_query($sqlp3meti_z);
$rowp3meti_z = mysql_fetch_array($queryp3meti_z, MYSQL_ASSOC);
$sqlp1met_z = "SELECT COUNT(*) AS p1met_z FROM matchevents WHERE team1id =$prvaekipa AND event_time < '$zdaj' AND (event_type=15 OR event_type=19 OR event_type=21) AND match_id ='$matchid'";
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
<td align="center"><?=$langmark712?></td>
<td bgcolor="#E9967A" align="center">
<?php
//gostje
//vrzeni
$sqlp2meta = "SELECT COUNT(*) AS p2meta FROM matchevents WHERE team1id=$drugaekipa AND event_time < '$zdaj' AND (event_type=14 OR event_type=15 OR event_type=16) AND match_id ='$matchid'";
$queryp2meta = mysql_query($sqlp2meta);
$rowp2meta = mysql_fetch_array($queryp2meta, MYSQL_ASSOC);
$sqlp3meti = "SELECT COUNT(*) AS p3meti FROM matchevents WHERE team1id=$drugaekipa AND event_time < '$zdaj' AND (event_type=17 OR event_type=18 OR event_type=19 OR event_type=20) AND match_id ='$matchid'";
$queryp3meti = mysql_query($sqlp3meti);
$rowp3meti = mysql_fetch_array($queryp3meti, MYSQL_ASSOC);
$sqlp1met = "SELECT COUNT(*) AS p1met FROM matchevents WHERE team1id=$drugaekipa AND event_time < '$zdaj' AND (event_type=21 OR event_type=22) AND match_id ='$matchid'";
$queryp1met = mysql_query($sqlp1met);
$rowp1met = mysql_fetch_array($queryp1met, MYSQL_ASSOC);
$p2meta = $rowp2meta['p2meta'];
$p3meti = $rowp3meti['p3meti'];
$p1met = $rowp1met['p1met'];
//zadeti
$sqlp2meta_z = "SELECT COUNT(*) AS p2meta_z FROM matchevents WHERE team1id=$drugaekipa AND event_time < '$zdaj' AND (event_type=14 OR event_type=18) AND match_id ='$matchid'";
$queryp2meta_z = mysql_query($sqlp2meta_z);
$rowp2meta_z = mysql_fetch_array($queryp2meta_z, MYSQL_ASSOC);
$sqlp3meti_z = "SELECT COUNT(*) AS p3meti_z FROM matchevents WHERE team1id=$drugaekipa AND event_time < '$zdaj' AND event_type=17 AND match_id ='$matchid'";
$queryp3meti_z = mysql_query($sqlp3meti_z);
$rowp3meti_z = mysql_fetch_array($queryp3meti_z, MYSQL_ASSOC);
$sqlp1met_z = "SELECT COUNT(*) AS p1met_z FROM matchevents WHERE team1id=$drugaekipa AND event_time < '$zdaj' AND (event_type=15 OR event_type=19 OR event_type=21) AND match_id ='$matchid'";
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
<tr><td bgcolor="#98FB98" align="center">
<?php
//skoki - domaci
$sql_defen = "SELECT COUNT(*) AS defen FROM matchevents WHERE team2id=$prvaekipa AND event_time < '$zdaj' AND (event_type=4 OR event_type=9 OR event_type=28) AND match_id ='$matchid'";
$query_defen = mysql_query($sql_defen);
$row1 = mysql_fetch_array($query_defen, MYSQL_ASSOC);
$sql_ofen = "SELECT COUNT(*) AS ofen FROM matchevents WHERE team2id=$prvaekipa AND event_time < '$zdaj' AND (event_type=3 OR event_type=8 OR event_type=29) AND match_id ='$matchid'";
$query_ofen = mysql_query($sql_ofen);
$row2 = mysql_fetch_array($query_ofen, MYSQL_ASSOC);
$defen = $row1['defen'];
$ofen = $row2['ofen'];
$skokov = $defen + $ofen;
echo $skokov,"&nbsp;(",$defen," + ",$ofen,")<br/>";
?>
</td>
<td align="center"><?=$langmark124?></td>
<td bgcolor="#E9967A" align="center">
<?php
//gostje
$sql_defen = "SELECT COUNT(*) AS defen FROM matchevents WHERE team2id=$drugaekipa AND event_time < '$zdaj' AND (event_type=4 OR event_type=9 OR event_type=28) AND match_id ='$matchid'";
$query_defen = mysql_query($sql_defen);
$row1 = mysql_fetch_array($query_defen, MYSQL_ASSOC);
$sql_ofen = "SELECT COUNT(*) AS ofen FROM matchevents WHERE team2id=$drugaekipa AND event_time < '$zdaj' AND (event_type=3 OR event_type=8 OR event_type=29) AND match_id ='$matchid'";
$query_ofen = mysql_query($sql_ofen);
$row2 = mysql_fetch_array($query_ofen, MYSQL_ASSOC);
$defen = $row1['defen'];
$ofen = $row2['ofen'];
$skokov = $defen + $ofen;
echo $skokov,"&nbsp;(",$defen," + ",$ofen,")<br/>";
?>
</td></tr>
<tr><td bgcolor="#98FB98" align="center">
<?php
//podaje - domaci
$sql_podaj = "SELECT COUNT(*) AS podaj FROM matchevents WHERE team2id=$prvaekipa AND event_time < '$zdaj' AND event_type=1 AND match_id ='$matchid'";
$query_podaj = mysql_query($sql_podaj);
$row1 = mysql_fetch_array($query_podaj, MYSQL_ASSOC);
$podaj = $row1['podaj'];
echo $podaj,"<br/>";
?>
</td>
<td align="center"><?=$langmark695?></td>
<td bgcolor="#E9967A" align="center">
<?php
//gostje
$sql_podaj = "SELECT COUNT(*) AS podaj FROM matchevents WHERE team2id=$drugaekipa AND event_time < '$zdaj' AND event_type=1 AND match_id ='$matchid'";
$query_podaj = mysql_query($sql_podaj);
$row1 = mysql_fetch_array($query_podaj, MYSQL_ASSOC);
$podaj = $row1['podaj'];
echo $podaj,"<br/>";
?>
</td></tr>
<tr><td bgcolor="#98FB98" align="center">
<?php
//osebne - domaci
$sql_osebne = "SELECT COUNT(*) AS osebne FROM matchevents WHERE event_time < '$zdaj' AND team2id=$prvaekipa AND (event_type=10 OR event_type=11 OR event_type=12 OR event_type=13 OR event_type=30 OR event_type=32) AND match_id ='$matchid'";
$query_osebne = mysql_query($sql_osebne);
$row1 = mysql_fetch_array($query_osebne, MYSQL_ASSOC);
$osebne = $row1['osebne'];
echo $osebne,"<br/>";
?>
</td>
<td align="center"><?=$langmark696?></td>
<td bgcolor="#E9967A" align="center">
<?php
//gostje
$sql_osebne = "SELECT COUNT(*) AS osebne FROM matchevents WHERE event_time < '$zdaj' AND team2id=$drugaekipa AND (event_type=10 OR event_type=11 OR event_type=12 OR event_type=13 OR event_type=30 OR event_type=32) AND match_id ='$matchid'";
$query_osebne = mysql_query($sql_osebne);
$row1 = mysql_fetch_array($query_osebne, MYSQL_ASSOC);
$osebne = $row1['osebne'];
echo $osebne,"<br/>";
?>
</td></tr>
<tr><td bgcolor="#98FB98" align="center">
<?php
//ukradene - domaci
$sql_ukrad = "SELECT COUNT(*) AS ukrad FROM matchevents WHERE event_time < '$zdaj' AND team2id=$prvaekipa AND event_type=6 AND match_id ='$matchid'";
$query_ukrad = mysql_query($sql_ukrad);
$row1 = mysql_fetch_array($query_ukrad, MYSQL_ASSOC);
$ukrad = $row1['ukrad'];
echo $ukrad,"<br/>";
?>
</td>
<td align="center"><?=$langmark697?></td>
<td bgcolor="#E9967A" align="center">
<?php
//gostje
$sql_ukrad = "SELECT COUNT(*) AS ukrad FROM matchevents WHERE event_time < '$zdaj' AND team2id=$drugaekipa AND event_type=6 AND match_id ='$matchid'";
$query_ukrad = mysql_query($sql_ukrad);
$row1 = mysql_fetch_array($query_ukrad, MYSQL_ASSOC);
$ukrad = $row1['ukrad'];
echo $ukrad,"<br/>";
?>
</td></tr>
<tr><td bgcolor="#98FB98" align="center">
<?php
//napake - domaci
$sql_napak = "SELECT COUNT(*) AS napak FROM matchevents WHERE event_time < '$zdaj' AND team1id=$prvaekipa AND (event_type=5 OR event_type=6 OR event_type=26) AND match_id ='$matchid'";
$query_napak = mysql_query($sql_napak);
$row1 = mysql_fetch_array($query_napak, MYSQL_ASSOC);
$napak = $row1['napak'];
echo $napak,"<br/>";
?>
</td>
<td align="center"><?=$langmark698?></td>
<td bgcolor="#E9967A" align="center">
<?php
//gostje
$sql_napak = "SELECT COUNT(*) AS napak FROM matchevents WHERE event_time < '$zdaj' AND team1id=$drugaekipa AND (event_type=5 OR event_type=6 OR event_type=26) AND match_id ='$matchid'";
$query_napak = mysql_query($sql_napak);
$row1 = mysql_fetch_array($query_napak, MYSQL_ASSOC);
$napak = $row1['napak'];
echo $napak,"<br/>";
?>
</td></tr>
<tr><td bgcolor="#98FB98" align="center">
<?php
//blokade - domaci
$sql_banan = "SELECT COUNT(*) AS banan FROM matchevents WHERE team2id=$prvaekipa AND event_time < '$zdaj' AND event_type=31 AND match_id ='$matchid'";
$query_banan = mysql_query($sql_banan);
$row1 = mysql_fetch_array($query_banan, MYSQL_ASSOC);
$banan = $row1['banan'];
echo $banan,"<br/>";
?>
</td>
<td align="center"><?=$langmark699?></td>
<td bgcolor="#E9967A" align="center">
<?php
//gostje
$sql_banan = "SELECT COUNT(*) AS banan FROM matchevents WHERE team2id=$drugaekipa AND event_time < '$zdaj' AND event_type=31 AND match_id ='$matchid'";
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

<table width="100%" border="1" cellpadding="0" cellspacing="0">
<tr><td><b><?=$langmark404?></b></td><td align="center"><b><?=$langmark700?></b></td><td align="center"><b><?=$langmark701?></b></td><td align="center"><b><?=$langmark702?></b></td><td align="center"><b><?=$langmark703?></b></td><td align="center"><b><?=$langmark704?></b></td><td align="center"><b><?=$langmark705?></b></td><td align="center"><b><?=$langmark706?></b></td><td align="center"><b><?=$langmark707?></b></td><td align="center"><b><?=$langmark708?></b></td><td align="center"><b><?=$langmark709?></b></td><td align="center"><b><?=$langmark710?></b></td></tr>

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
if (empty($sur1)) {$sur1="<i>".$langmark759."</i>";} else {$sur1="<a href=\"player.php?playerid=".$sur2."\">".$sur1."</a>";}

if ($f < 5 OR ($f >9 AND $f < 15)) {$bgcolor='#98FB98';} else {$bgcolor='#E9967A';}

$sql_ena = "SELECT COUNT(*) AS za_ena FROM matchevents WHERE event_time < '$zdaj' AND player1id=$String[$f] AND (event_type=15 OR event_type=19 OR event_type=21) AND match_id ='$matchid'";
$query_ena = mysql_query($sql_ena);
$row1 = mysql_fetch_array($query_ena, MYSQL_ASSOC);
$sql_dve = "SELECT COUNT(*) AS za_dve FROM matchevents WHERE event_time < '$zdaj' AND player1id=$String[$f] AND (event_type=1 OR event_type=2 OR event_type=14 OR event_type=18 OR event_type=27 OR event_type=23 OR event_type=12) AND match_id ='$matchid'";
$query_dve = mysql_query($sql_dve);
$row2 = mysql_fetch_array($query_dve, MYSQL_ASSOC);
$sql_tri = "SELECT COUNT(*) AS za_tri FROM matchevents WHERE event_time < '$zdaj' AND player1id=$String[$f] AND (event_type=7 OR event_type=17 OR event_type=24 OR event_type=13) AND match_id ='$matchid'";
$query_tri = mysql_query($sql_tri);
$row3 = mysql_fetch_array($query_tri, MYSQL_ASSOC);
$enke = $row1['za_ena'];
$dvojke = $row2['za_dve'];
$trojke = $row3['za_tri'];
$pl1score = $enke + $dvojke * 2 + $trojke * 3;
echo "<tr><td bgcolor=\"",$bgcolor,"\">",$sur1,"</td><td bgcolor=\"",$bgcolor,"\" align=\"center\">",$pl1score,"</td>";

$sql_faljeni2 = "SELECT COUNT(*) AS faljeni2 FROM matchevents WHERE event_time < '$zdaj' AND player1id=$String[$f] AND (event_type=3 OR event_type=4 OR event_type=28 OR event_type=29 OR event_type=31) AND match_id ='$matchid'";
$query_faljeni2 = mysql_query($sql_faljeni2);
$row1 = mysql_fetch_array($query_faljeni2, MYSQL_ASSOC);
$sql_zadeti2 = "SELECT COUNT(*) AS zadeti2 FROM matchevents WHERE event_time < '$zdaj' AND player1id=$String[$f] AND (event_type=1 OR event_type=2 OR event_type=27 OR event_type=23 OR event_type=12) AND match_id ='$matchid'";
$query_zadeti2 = mysql_query($sql_zadeti2);
$row2 = mysql_fetch_array($query_zadeti2, MYSQL_ASSOC);
$faljeni2 = $row1['faljeni2'];
$zadeti2 = $row2['zadeti2'];
$skupaj2 = $faljeni2 + $zadeti2;
if ($skupaj2 != 0) {$kolicnik2 = round(100*$zadeti2/$skupaj2);}
echo "<td bgcolor=\"",$bgcolor,"\" align=\"center\">",$zadeti2."/".$skupaj2." (";
if ($skupaj2 != 0) {echo $kolicnik2."%)</td>";} else {echo " - )</td>";}

$sql_faljeni3 = "SELECT COUNT(*) AS faljeni3 FROM matchevents WHERE event_time < '$zdaj' AND player1id=$String[$f] AND (event_type=8 OR event_type=9) AND match_id ='$matchid'";
$query_faljeni3 = mysql_query($sql_faljeni3);
$row1 = mysql_fetch_array($query_faljeni3, MYSQL_ASSOC);
$sql_zadeti3 = "SELECT COUNT(*) AS zadeti3 FROM matchevents WHERE event_time < '$zdaj' AND player1id=$String[$f] AND (event_type=7 OR event_type=13 OR event_type=24) AND match_id ='$matchid'";
$query_zadeti3 = mysql_query($sql_zadeti3);
$row2 = mysql_fetch_array($query_zadeti3, MYSQL_ASSOC);
$faljeni3 = $row1['faljeni3'];
$zadeti3 = $row2['zadeti3'];
$skupaj3 = $faljeni3 + $zadeti3;
if ($skupaj3 != 0) {$kolicnik3 = round(100*$zadeti3/$skupaj3);}
echo "<td bgcolor=\"",$bgcolor,"\" align=\"center\">",$zadeti3,"/",$skupaj3,"&nbsp;(";
if ($skupaj3 != 0) {echo $kolicnik3,"%)</td>";} else {echo " - )</td>";}

$sqlp2meta = "SELECT COUNT(*) AS p2meta FROM matchevents WHERE event_time < '$zdaj' AND player1id=$String[$f] AND (event_type=14 OR event_type=15 OR event_type=16) AND match_id ='$matchid'";
$queryp2meta = mysql_query($sqlp2meta);
$rowp2meta = mysql_fetch_array($queryp2meta, MYSQL_ASSOC);
$sqlp3meti = "SELECT COUNT(*) AS p3meti FROM matchevents WHERE event_time < '$zdaj' AND player1id=$String[$f] AND (event_type=17 OR event_type=18 OR event_type=19 OR event_type=20) AND match_id ='$matchid'";
$queryp3meti = mysql_query($sqlp3meti);
$rowp3meti = mysql_fetch_array($queryp3meti, MYSQL_ASSOC);
$sqlp1met = "SELECT COUNT(*) AS p1met FROM matchevents WHERE event_time < '$zdaj' AND player1id=$String[$f] AND (event_type=21 OR event_type=22) AND match_id ='$matchid'";
$queryp1met = mysql_query($sqlp1met);
$rowp1met = mysql_fetch_array($queryp1met, MYSQL_ASSOC);
$p2meta = $rowp2meta['p2meta'];
$p3meti = $rowp3meti['p3meti'];
$p1met = $rowp1met['p1met'];
//zadeti
$sqlp2meta_z = "SELECT COUNT(*) AS p2meta_z FROM matchevents WHERE event_time < '$zdaj' AND player1id=$String[$f] AND (event_type=14 OR event_type=18) AND match_id ='$matchid'";
$queryp2meta_z = mysql_query($sqlp2meta_z);
$rowp2meta_z = mysql_fetch_array($queryp2meta_z, MYSQL_ASSOC);
$sqlp3meti_z = "SELECT COUNT(*) AS p3meti_z FROM matchevents WHERE event_time < '$zdaj' AND player1id=$String[$f] AND event_type=17 AND match_id ='$matchid'";
$queryp3meti_z = mysql_query($sqlp3meti_z);
$rowp3meti_z = mysql_fetch_array($queryp3meti_z, MYSQL_ASSOC);
$sqlp1met_z = "SELECT COUNT(*) AS p1met_z FROM matchevents WHERE event_time < '$zdaj' AND player1id=$String[$f] AND (event_type=15 OR event_type=19 OR event_type=21) AND match_id ='$matchid'";
$queryp1met_z = mysql_query($sqlp1met_z);
$rowp1met_z = mysql_fetch_array($queryp1met_z, MYSQL_ASSOC);
$p2meta_z = $rowp2meta_z['p2meta_z'];
$p3meti_z = $rowp3meti_z['p3meti_z'];
$p1met_z = $rowp1met_z['p1met_z'];
$vrzeni1 = 2*$p2meta + 3*$p3meti + $p1met;
$zadeti1 = 2*$p2meta_z + 3*$p3meti_z + $p1met_z;
if ($vrzeni1 != 0) {$kolicnik1 = round(100*$zadeti1/$vrzeni1);}
echo "<td bgcolor=\"",$bgcolor,"\" align=\"center\">",$zadeti1,"/",$vrzeni1,"&nbsp;(";
if ($vrzeni1 != 0) {echo $kolicnik1,"%)</td>";} else {echo " - )</td>";}

$sql_defen = "SELECT COUNT(*) AS defen FROM matchevents WHERE event_time < '$zdaj' AND player2id=$String[$f] AND (event_type=4 OR event_type=9 OR event_type=28) AND match_id ='$matchid'";
$query_defen = mysql_query($sql_defen);
$row1 = mysql_fetch_array($query_defen, MYSQL_ASSOC);
$sql_ofen = "SELECT COUNT(*) AS ofen FROM matchevents WHERE event_time < '$zdaj' AND player2id=$String[$f] AND (event_type=3 OR event_type=8 OR event_type=29) AND match_id ='$matchid'";
$query_ofen = mysql_query($sql_ofen);
$row2 = mysql_fetch_array($query_ofen, MYSQL_ASSOC);
$defen = $row1['defen'];
$ofen = $row2['ofen'];
echo "<td bgcolor=\"",$bgcolor,"\" align=\"center\">",$defen,"+",$ofen,"</td>";

$sql_podaj = "SELECT COUNT(*) AS podaj FROM matchevents WHERE event_time < '$zdaj' AND player2id=$String[$f] AND event_type=1 AND match_id ='$matchid'";
$query_podaj = mysql_query($sql_podaj);
$row1 = mysql_fetch_array($query_podaj, MYSQL_ASSOC);
$podaj = $row1['podaj'];
echo "<td bgcolor=\"",$bgcolor,"\" align=\"center\">",$podaj,"</td>";

$sql_osebne = "SELECT COUNT(*) AS osebne FROM matchevents WHERE event_time < '$zdaj' AND player2id=$String[$f] AND (event_type=10 OR event_type=11 OR event_type=12 OR event_type=13 OR event_type=30 OR event_type=32) AND match_id ='$matchid'";
$query_osebne = mysql_query($sql_osebne);
$row1 = mysql_fetch_array($query_osebne, MYSQL_ASSOC);
$osebne = $row1['osebne'];
echo "<td bgcolor=\"",$bgcolor,"\" align=\"center\">",$osebne,"</td>";

$sql_ukrad = "SELECT COUNT(*) AS ukrad FROM matchevents WHERE event_time < '$zdaj' AND player2id=$String[$f] AND event_type=6 AND match_id ='$matchid'";
$query_ukrad = mysql_query($sql_ukrad);
$row1 = mysql_fetch_array($query_ukrad, MYSQL_ASSOC);
$ukrad = $row1['ukrad'];
echo "<td bgcolor=\"",$bgcolor,"\" align=\"center\">",$ukrad,"</td>";

$sql_napak = "SELECT COUNT(*) AS napak FROM matchevents WHERE event_time < '$zdaj' AND player1id=$String[$f] AND (event_type=5 OR event_type=6 OR event_type=26) AND match_id ='$matchid'";
$query_napak = mysql_query($sql_napak);
$row1 = mysql_fetch_array($query_napak, MYSQL_ASSOC);
$napak = $row1['napak'];
echo "<td bgcolor=\"",$bgcolor,"\" align=\"center\">",$napak,"</td>";

$sql_banan = "SELECT COUNT(*) AS banan FROM matchevents WHERE event_time < '$zdaj' AND player2id=$String[$f] AND event_type=31 AND match_id ='$matchid'";
$query_banan = mysql_query($sql_banan);
$row1 = mysql_fetch_array($query_banan, MYSQL_ASSOC);
$banan = $row1['banan'];
echo "<td bgcolor=\"",$bgcolor,"\" align=\"center\">",$banan,"</td>";

//rating
$ratingigralca = $pl1score + $defen + $ofen + $podaj + $ukrad + $banan - $napak - ($skupaj2 - $zadeti2) - ($skupaj3 - $zadeti3) - ($vrzeni1 - $zadeti1);
echo "<td bgcolor=\"",$bgcolor,"\" align=\"center\"><b>",$ratingigralca,"</b></td></tr>";

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

</td><td class="border" width="27%">

<h2><?=$imearene?></h2><br/>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td align="left"><?=$langmark062?>: </td><td align="right"><?=$gl1?></td></tr>
<tr><td align="left"><?=$langmark063?>: </td><td align="right"><?=$gl2?></td></tr>
<tr><td align="left"><?=$langmark716?>: </td><td align="right"><?=$gl3?></td></tr>
<tr><td align="left"><?=$langmark717?>: </td><td align="right"><?=$gl4?></td></tr>
<tr><td align="left"><b><?=$langmark718?>:</b> </td><td align="right"><b><?=$gled?></b></td></tr>
</table>

<?php
if ($refresh <> '1798') {echo "<br/><h2>",$langmark719,"</h2><br/>";} else {echo "<br/><h2>",$langmark720,"</h2>";}
if ($time_tekme > '2006-12-09 08:00:00' AND $time_tekme < '2006-12-12 11:15:00') {die("$langmark721");}

if ($refresh <>1798 AND $event_type <>37) {
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
CASE $rating_hpg2: $homepg2_name = @mysql_query("SELECT surname FROM players WHERE id=$home_pg2"); $hpg2name=@mysql_result($homepg2_name,0); echo "<b>MVP:&nbsp;</b>",$hpg2name,"<br/>"; break;
CASE $rating_hsg2: $homesg2_name = @mysql_query("SELECT surname FROM players WHERE id=$home_sg2"); $hsg2name=@mysql_result($homesg2_name,0); echo "<b>MVP:&nbsp;</b>",$hsg2name,"<br/>"; break;
CASE $rating_hsf2: $homesf2_name = @mysql_query("SELECT surname FROM players WHERE id=$home_sf2"); $hsf2name=@mysql_result($homesf2_name,0); echo "<b>MVP:&nbsp;</b>",$hsf2name,"<br/>"; break;
CASE $rating_hpf2: $homepf2_name = @mysql_query("SELECT surname FROM players WHERE id=$home_pf2"); $hpf2name=@mysql_result($homepf2_name,0); echo "<b>MVP:&nbsp;</b>",$hpf2name,"<br/>"; break;
CASE $rating_hc2: $homec2_name = @mysql_query("SELECT surname FROM players WHERE id=$home_c2"); $hc2name=@mysql_result($homec2_name,0); echo "<b>MVP:&nbsp;</b>",$hc2name,"<br/>"; break;
CASE $rating_apg2: $awaypg2_name = @mysql_query("SELECT surname FROM players WHERE id=$away_pg2"); $apg2name=@mysql_result($awaypg2_name,0); echo "<b>MVP:&nbsp;</b>",$apg2name,"<br/>"; break;
CASE $rating_asg2: $awaysg2_name = @mysql_query("SELECT surname FROM players WHERE id=$away_sg2"); $asg2name=@mysql_result($awaysg2_name,0); echo "<b>MVP:&nbsp;</b>",$asg2name,"<br/>"; break;
CASE $rating_asf2: $awaysf2_name = @mysql_query("SELECT surname FROM players WHERE id=$away_sf2"); $asf2name=@mysql_result($awaysf2_name,0); echo "<b>MVP:&nbsp;</b>",$asf2name,"<br/>"; break;
CASE $rating_apf2: $awaypf2_name = @mysql_query("SELECT surname FROM players WHERE id=$away_pf2"); $apf2name=@mysql_result($awaypf2_name,0); echo "<b>MVP:&nbsp;</b>",$apf2name,"<br/>"; break;
CASE $rating_ac2: $awayc2_name = @mysql_query("SELECT surname FROM players WHERE id=$away_c2"); $ac2name=@mysql_result($awayc2_name,0); echo "<b>MVP:&nbsp;</b>",$ac2name,"<br/>"; break;
}
}
elseif ($refresh <>1798 AND $event_type ==37) {echo "<b>MVP:&nbsp;</b>-<br/>";}
?>
<br/>
<?php
if($home_def==0){$home_def=$langmark722;}
if($home_def==1){$home_def=$langmark723;}
if($home_def==2){$home_def=$langmark724;}
if($home_def==3){$home_def=$langmark725;}
if($home_def==4){$home_def=$langmark726;}
if($home_def==5){$home_def=$langmark727;}

if($away_def==0){$away_def=$langmark722;}
if($away_def==1){$away_def=$langmark723;}
if($away_def==2){$away_def=$langmark724;}
if($away_def==3){$away_def=$langmark725;}
if($away_def==4){$away_def=$langmark726;}
if($away_def==5){$away_def=$langmark727;}

if($home_off==0){$home_off=$langmark722;}
if($home_off==1){$home_off=$langmark728;}
if($home_off==2){$home_off=$langmark729;}
if($home_off==3){$home_off=$langmark730;}
if($home_off==4){$home_off=$langmark731;}
if($home_off==5){$home_off=$langmark732;}

if($away_off==0){$away_off=$langmark722;}
if($away_off==1){$away_off=$langmark728;}
if($away_off==2){$away_off=$langmark729;}
if($away_off==3){$away_off=$langmark730;}
if($away_off==4){$away_off=$langmark731;}
if($away_off==5){$away_off=$langmark732;}
?>

<b><?=$langmark761?></b><br/><br/>
<b><?=$langmark713?>:</b>&nbsp;<?=$home_def?><br/>
<b><?=$langmark714?>:</b>&nbsp;<?=$home_off?><br/><br/>
<?php
if ($refresh <>1798) {

if ($home_pg1 >0) {

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
?>

<b><?=$langmark762?></b><br/><br/>
<b><?=$langmark713?>:</b>&nbsp;<?=$away_def?><br/>
<b><?=$langmark714?>:</b>&nbsp;<?=$away_off?><br/><br/>
<?php
if ($refresh != 1798) {

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
if ($refresh ==1798) {echo"<a href=\"matchreport.php?matchid=",$matchid,"\">",$langmark733,"</a>";}

//zapis
$out2 = ob_get_contents();
$out2 =addslashes($out2);
if (mysql_num_rows($pru)==0 OR mysql_num_rows($pru)=='' OR !mysql_num_rows($pru)) {$rump = mysql_query("SELECT `event_time` FROM `matchevents` WHERE `match_id` ='$matchid' ORDER BY `event_time` DESC LIMIT 1"); $beat = mysql_result($rump,0,"event_time"); mysql_query("INSERT INTO `matchreports` VALUES ('', '$matchid', '$out2', '$beat', '$zdaj', '$lang');") or die(mysql_error());}
if (mysql_num_rows($pru)==1) {mysql_query("UPDATE matchreports SET `report`='$out2', `last`='$zdaj' WHERE `lang`='$lang' AND `match`='$matchid' LIMIT 1") or die(mysql_error());}
?>
</td>
</tr>
</table>
<img src="img/bbs.jpg" alt="" border="0">
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>