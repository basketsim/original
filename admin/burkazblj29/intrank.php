<?php
ini_set("max_execution_time",2000);
require_once("cron2conect.php");

mysql_query("UPDATE `countries` SET `INTRANK`=0");
$omejitev = $sezonus-3;
$vsete = mysql_query("SELECT away_id, home_score, away_score, type, country FROM `matches` WHERE `home_score` >0 AND ((`type` >4 AND `type` < 9) OR `type`=19) AND season > '$omejitev'");
while ($f=mysql_fetch_array($vsete)) {
$away_id = $f["away_id"];
$dodano = mysql_query("SELECT country FROM teams WHERE teamid=$away_id");
$home_score = $f["home_score"];
$away_score = $f["away_score"];
$type = $f["type"];
$home_country = $f["country"];
$away_country = mysql_result($dodano,0,"country");
if ($home_country=='Bosnia') {$home_country='Bosnia and Herzegovina';}
if ($away_country=='Bosnia') {$away_country='Bosnia and Herzegovina';}
if (($home_score > $away_score) && ($type==5 OR $type==19)) {
mysql_query("UPDATE countries SET INTRANK = INTRANK + 0.1 WHERE country LIKE '$home_country'");
}
if (($home_score < $away_score) && ($type==5 OR $type==19)) {
mysql_query("UPDATE countries SET INTRANK = INTRANK + 0.1 WHERE country LIKE '$away_country'");
}
if (($home_score > $away_score) && ($type>5 AND $type<9)) {
mysql_query("UPDATE countries SET INTRANK = INTRANK + 3 WHERE country LIKE '$home_country'");
}
if (($home_score < $away_score) && ($type>5 AND $type<9)) {
mysql_query("UPDATE countries SET INTRANK = INTRANK + 3 WHERE country LIKE '$away_country'");
}
}


$q0 = mysql_query("SELECT DISTINCT club AS teami, userid, `signed`, supporter, name, country FROM users, teams, history WHERE teamid = club AND (h_type =5 OR h_type =6 OR h_type =7 OR h_type =19) AND h_userid = userid") or die(mysql_error());
while ($q = mysql_fetch_array($q0)) {
$teami = $q['teami'];
$userid = $q['userid'];
$siggo = $q['signed'];
$suppo = $q['supporter'];
$tname = $q['name'];
$cuntry = $q['country'];
$per = mysql_query("SELECT * FROM intrank WHERE teamid=$teami LIMIT 1") or die(mysql_error());
if (mysql_num_rows($per)) {mysql_query("UPDATE intrank SET suppo='$suppo', signed='$siggo', tname='$tname', rank5=0, rank6=0, rank7=0, rank19=0, rank=0 WHERE teamid='$teami' LIMIT 1") or die(mysql_error());}
else {mysql_query("INSERT INTO intrank VALUES ('$teami', '$userid', '$suppo', '$siggo', '$tname', '$cuntry', '0', '0', '0', '0', '0', '0', '0');") or die(mysql_error());}
}

$q1 = mysql_query("SELECT home_id, away_id, home_score, away_score, `time`, season/13.5 * lid_round/3.5 as `value` FROM matches WHERE home_score > 0 AND season > $sezonus-10 AND `type`=6");
while ($q = mysql_fetch_array($q1)) {
$home_id = $q[home_id];
$away_id = $q[away_id];
$home_score = $q[home_score];
$away_score = $q[away_score];
$tajm = $q['time'];
$value = $q[value];
if ($home_score > $away_score) {
mysql_query("UPDATE intrank SET rank6=rank6+(5.5*$value + ($home_score-$away_score)/50), rank=rank+(5.5*$value + ($home_score-$away_score)/50) WHERE `signed` < '$tajm' AND teamid=$home_id LIMIT 1");
mysql_query("UPDATE intrank SET rank6=rank6+(1.8*$value + ($away_score-$home_score)/50), rank=rank+(1.8*$value + ($away_score-$home_score)/50) WHERE `signed` < '$tajm' AND teamid=$away_id LIMIT 1");
}
else {
mysql_query("UPDATE intrank SET rank6=rank6+(1.8*$value + ($home_score-$away_score)/50), rank=rank+(1.8*$value + ($home_score-$away_score)/50) WHERE `signed` < '$tajm' AND teamid=$home_id LIMIT 1");
mysql_query("UPDATE intrank SET rank6=rank6+(5.5*$value + ($away_score-$home_score)/50), rank=rank+(5.5*$value + ($away_score-$home_score)/50) WHERE `signed` < '$tajm' AND teamid=$away_id LIMIT 1");
}
}

$q2 = mysql_query("SELECT home_id, away_id, home_score, away_score, `time`, season/14.5 * lid_round/3.5 as `value` FROM matches WHERE home_score > 0 AND season > $sezonus-10 AND `type`=7");
while ($q = mysql_fetch_array($q2)) {
$home_id = $q[home_id];
$away_id = $q[away_id];
$home_score = $q[home_score];
$away_score = $q[away_score];
$tajm = $q['time'];
$value = $q[value];
if ($home_score > $away_score) {
mysql_query("UPDATE intrank SET rank7=rank7+(4.8*$value + ($home_score-$away_score)/50), rank=rank+(4.8*$value + ($home_score-$away_score)/50) WHERE `signed` < '$tajm' AND teamid=$home_id LIMIT 1");
mysql_query("UPDATE intrank SET rank7=rank7+(1.6*$value + ($away_score-$home_score)/50), rank=rank+(1.6*$value + ($away_score-$home_score)/50) WHERE `signed` < '$tajm' AND teamid=$away_id LIMIT 1");
}
else {
mysql_query("UPDATE intrank SET rank7=rank7+(1.6*$value + ($home_score-$away_score)/50), rank=rank+(1.6*$value + ($home_score-$away_score)/50) WHERE `signed` < '$tajm' AND teamid=$home_id LIMIT 1");
mysql_query("UPDATE intrank SET rank7=rank7+(4.8*$value + ($away_score-$home_score)/50), rank=rank+(4.8*$value + ($away_score-$home_score)/50) WHERE `signed` < '$tajm' AND teamid=$away_id LIMIT 1");
}
}

$q3 = mysql_query("SELECT home_id, away_id, home_score, away_score, `time`, season/12.8 * lid_round/4.3 as `value` FROM matches WHERE home_score > 0 AND season > $sezonus-5 AND `type`=5");
while ($q = mysql_fetch_array($q3)) {
$home_id = $q[home_id];
$away_id = $q[away_id];
$home_score = $q[home_score];
$away_score = $q[away_score];
$tajm = $q['time'];
$value = $q[value];
if ($home_score > $away_score) {
mysql_query("UPDATE intrank SET rank5=rank5+(2.1*$value + ($home_score-$away_score)/100), rank=rank+(2.1*$value + ($home_score-$away_score)/100) WHERE `signed` < '$tajm' AND teamid=$home_id LIMIT 1");
mysql_query("UPDATE intrank SET rank5=rank5+(0.9*$value + ($away_score-$home_score)/100), rank=rank+(1*$value + ($away_score-$home_score)/100) WHERE `signed` < '$tajm' AND teamid=$away_id LIMIT 1");
}
else {
mysql_query("UPDATE intrank SET rank5=rank5+(2.1*$value + ($home_score-$away_score)/100), rank=rank+(2.1*$value + ($home_score-$away_score)/100) WHERE `signed` < '$tajm' AND teamid=$home_id LIMIT 1");
mysql_query("UPDATE intrank SET rank5=rank5+(0.9*$value + ($away_score-$home_score)/100), rank=rank+(1*$value + ($away_score-$home_score)/100) WHERE `signed` < '$tajm' AND teamid=$away_id LIMIT 1");
}
}

//ycwc
$q5 = mysql_query("SELECT home_id, away_id, home_score, away_score, `time`, season/12.8 * lid_round/3.5 as `value` FROM matches WHERE home_score > 0 AND season > $sezonus-5 AND `type`=19");
while ($q = mysql_fetch_array($q5)) {
$home_id = $q[home_id];
$away_id = $q[away_id];
$home_score = $q[home_score];
$away_score = $q[away_score];
$tajm = $q['time'];
$value = $q[value];
if ($home_score > $away_score) {
mysql_query("UPDATE intrank SET rank19=rank19+(1.8*$value + ($home_score-$away_score)/100), rank=rank+(1.8*$value + ($home_score-$away_score)/100) WHERE `signed` < '$tajm' AND teamid=$home_id LIMIT 1");
mysql_query("UPDATE intrank SET rank19=rank19+(0.8*$value + ($away_score-$home_score)/100), rank=rank+(0.8*$value + ($away_score-$home_score)/100) WHERE `signed` < '$tajm' AND teamid=$away_id LIMIT 1");
}
else {
mysql_query("UPDATE intrank SET rank19=rank19+(1.8*$value + ($home_score-$away_score)/100), rank=rank+(1.8*$value + ($home_score-$away_score)/100) WHERE `signed` < '$tajm' AND teamid=$home_id LIMIT 1");
mysql_query("UPDATE intrank SET rank19=rank19+(0.8*$value + ($away_score-$home_score)/100), rank=rank+(0.8*$value + ($away_score-$home_score)/100) WHERE `signed` < '$tajm' AND teamid=$away_id LIMIT 1");
}
}

mysql_query("DELETE FROM intrank WHERE rank <=0") or die(mysql_error());

$q4 = mysql_query("SELECT teamid, userid FROM intrank ORDER BY rank DESC") or die(mysql_error());
while ($q = mysql_fetch_array($q4)) {
$teamid = $q['teamid'];
$uzerid = $q['userid'];
$noche = mysql_query("SELECT `signed` FROM users WHERE userid='$uzerid' LIMIT 1");
$mumz = mysql_num_rows($noche);
if (!$mumz OR $mumz==0) {mysql_query("DELETE FROM intrank WHERE userid=$uzerid LIMIT 1");}
else {
$expire = mysql_result($noche,0);
$splitdatetime = explode(" ", $expire); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$dayz = (int)((mktime (0,0,0,$dbmonth,$dbday,$dbyear) + time(void))/86400);
if ($dayz<15) {mysql_query("DELETE FROM intrank WHERE userid=$uzerid LIMIT 1");}
if ($dayz>14) {$i=$i+1; mysql_query("UPDATE intrank SET lpos=pos, pos=$i WHERE teamid='$teamid' LIMIT 1") or die(mysql_error());}
}
}
mysql_query("ALTER TABLE `intrank` ORDER BY `pos` ASC") or die(mysql_error());



function ceilFive($number) {
$div = floor($number / 5);
$mod = $number % 5;
if ($mod > 0) {$add = 5;} else {$add = 0;}
return $div * 5 + $add;
}
$piksl = mysql_query("SELECT ekipa FROM ekipe WHERE competition=1") or die(mysql_error());
$galava=mysql_num_rows($piksl);
while ($p = mysql_fetch_array($piksl)) {
$pwag0 = 0; $pwag1 = 0; $pwag2 = 0; $pwag3 = 0; $pwag4 = 0; $pwag5 = 0; $pwag6 = 0; $pwag7 = 0;
$grwa = $p[ekipa];
$slava = mysql_query("SELECT wage FROM players WHERE coach=0 AND club=$grwa ORDER BY wage DESC") or die(mysql_error());
$pwag0 = @mysql_result($slava,0,"wage");
$pwag1 = @mysql_result($slava,1,"wage");
$pwag2 = @mysql_result($slava,2,"wage");
$pwag3 = @mysql_result($slava,3,"wage");
$pwag4 = @mysql_result($slava,4,"wage");
$pwag5 = @mysql_result($slava,5,"wage");
$pwag6 = @mysql_result($slava,6,"wage");
$pwag7 = @mysql_result($slava,7,"wage");
$knona=($pwag0+$pwag1+$pwag2+$pwag3+$pwag4/1.1+$pwag5/1.9+$pwag6/2+$pwag7/2.1)*($pwag0+$pwag1+$pwag2+$pwag3+$pwag4/1.1+$pwag5/1.9+$pwag6/2+$pwag7/2.1);
$knona=$knona/500000;
$odds=12800/($knona/100) * (sqrt($galava)/3 + 4.5);
mysql_query("UPDATE ekipe SET odds=$odds WHERE competition=1 AND ekipa='$grwa' LIMIT 1") or die(mysql_error());
}
$piksl = mysql_query("SELECT ekipa FROM ekipe WHERE competition=2") or die(mysql_error());
$galava=mysql_num_rows($piksl);
while ($p = mysql_fetch_array($piksl)) {
$pwag0 = 0; $pwag1 = 0; $pwag2 = 0; $pwag3 = 0; $pwag4 = 0; $pwag5 = 0; $pwag6 = 0; $pwag7 = 0;
$grwa = $p[ekipa];
$slava = mysql_query("SELECT wage FROM players WHERE coach=0 AND club=$grwa ORDER BY wage DESC") or die(mysql_error());
$pwag0 = @mysql_result($slava,0,"wage");
$pwag1 = @mysql_result($slava,1,"wage");
$pwag2 = @mysql_result($slava,2,"wage");
$pwag3 = @mysql_result($slava,3,"wage");
$pwag4 = @mysql_result($slava,4,"wage");
$pwag5 = @mysql_result($slava,5,"wage");
$pwag6 = @mysql_result($slava,6,"wage");
$pwag7 = @mysql_result($slava,7,"wage");
$knona=($pwag0+$pwag1+$pwag2+$pwag3+$pwag4/1.1+$pwag5/1.9+$pwag6/2+$pwag7/2.1)*($pwag0+$pwag1+$pwag2+$pwag3+$pwag4/1.1+$pwag5/1.9+$pwag6/2+$pwag7/2.1);
$knona=$knona/500000;
$odds=12800/($knona/100) * (sqrt($galava)/3 + 4.5);
mysql_query("UPDATE ekipe SET odds=$odds WHERE competition=2 AND ekipa='$grwa' LIMIT 1") or die(mysql_error());
}
$piksl = mysql_query("SELECT ekipa FROM ekipe WHERE competition=3") or die(mysql_error());
$galava=mysql_num_rows($piksl);
while ($p = mysql_fetch_array($piksl)) {
$pwag0 = 0; $pwag1 = 0; $pwag2 = 0; $pwag3 = 0; $pwag4 = 0; $pwag5 = 0; $pwag6 = 0; $pwag7 = 0;
$grwa = $p[ekipa];
$slava = mysql_query("SELECT wage FROM players WHERE coach=0 AND club=$grwa ORDER BY wage DESC") or die(mysql_error());
$pwag0 = @mysql_result($slava,0,"wage");
$pwag1 = @mysql_result($slava,1,"wage");
$pwag2 = @mysql_result($slava,2,"wage");
$pwag3 = @mysql_result($slava,3,"wage");
$pwag4 = @mysql_result($slava,4,"wage");
$pwag5 = @mysql_result($slava,5,"wage");
$pwag6 = @mysql_result($slava,6,"wage");
$pwag7 = @mysql_result($slava,7,"wage");
$knona=($pwag0+$pwag1+$pwag2+$pwag3+$pwag4/1.1+$pwag5/1.9+$pwag6/2+$pwag7/2.1)*($pwag0+$pwag1+$pwag2+$pwag3+$pwag4/1.1+$pwag5/1.9+$pwag6/2+$pwag7/2.1);
$knona=$knona/500000;
$odds=12800/($knona/100) * (sqrt($galava)/3 + 4.5);
mysql_query("UPDATE ekipe SET odds=$odds WHERE competition=3 AND ekipa='$grwa' LIMIT 1") or die(mysql_error());
}
mysql_query("ALTER TABLE `ekipe` ORDER BY `odds` ASC") or die(mysql_error());

?>