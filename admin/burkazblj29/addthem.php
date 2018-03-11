<?php
ini_set("max_execution_time", 2500);
require_once("cron2conect.php");

$dok_arene = mysql_query("SELECT arena.arenaid, arena.teamid AS teamck, arena.fans FROM arena, teams WHERE arena.teamid = teams.teamid AND teams.status=1") or die(mysql_error());
while($j=mysql_fetch_array($dok_arene)) {
$arenaid=$j["arenaid"];
$teamid=$j["teamck"];
$fans=$j["fans"];
$lasthomeres = mysql_query("SELECT home_id, away_id, home_score, away_score, time FROM `matches` WHERE (`type` =1 OR `type` =3 OR `type` =4 OR `type` =6 OR `type` =7) AND `home_id` =$teamid AND crowd1 <>0 UNION SELECT home_id, away_id, home_score, away_score, time FROM `matches` WHERE (`type` =1 OR `type` =3 OR `type` =4 OR `type` =6 OR `type` =7) AND `away_id` =$teamid AND crowd1 <>0 ORDER BY `time` DESC LIMIT 1") or die(mysql_error());
if (mysql_num_rows($lasthomeres)){
$prviID=mysql_result($lasthomeres,0,home_id);
$drugID=mysql_result($lasthomeres,0,away_id);
$lasthome=mysql_result($lasthomeres,0,home_score);
$lastopp=mysql_result($lasthomeres,0,away_score);
}
$navijaci=1;
if ($lasthome > $lastopp AND $teamid==$prviID) {$navijaci=2;}
if ($lasthome < $lastopp AND $teamid==$drugID) {$navijaci=2;}
$newfans = round($navijaci*((4099-$fans)/500));
if ($fans > 1249) {
$newfans = round(1663156 / pow(($fans + 745.968)/100, 4));
if ($lasthome < $lastopp AND $teamid==$prviID) {$newfans = $newfans - 5;}
if ($lasthome > $lastopp AND $teamid==$drugID) {$newfans = $newfans - 5;}
}
$money = $newfans*40;

if ($newfans > 1) {
mysql_query("UPDATE arena SET fans=fans+$newfans WHERE arenaid=$arenaid LIMIT 1") or die(mysql_error());
mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), '$newfans new fans have joined the fanclub.', 0, 0);");
mysql_query("UPDATE teams SET curmoney=curmoney+$money WHERE teamid=$teamid LIMIT 1") or die(mysql_error());
mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'New fans have contributed $money &euro;.', 1, $money);");
}
elseif ($newfans==1) {
mysql_query("UPDATE arena SET fans=fans+1 WHERE arenaid=$arenaid LIMIT 1") or die(mysql_error());
mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), '1 new fan has joined the fanclub.', 0, 0);");
mysql_query("UPDATE teams SET curmoney=curmoney+$money WHERE teamid=$teamid LIMIT 1") or die(mysql_error());
mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'New fan has contributed $money &euro;.', 1, $money);");
}
elseif ($newfans < -1) {
mysql_query("UPDATE arena SET fans=fans+$newfans WHERE arenaid=$arenaid LIMIT 1") or die(mysql_error());
$newf = abs($newfans);
mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), '$newf fans have left the fanclub.', 0, 0);");
}
elseif ($newfans == -1) {
mysql_query("UPDATE arena SET fans=fans-1 WHERE arenaid=$arenaid LIMIT 1") or die(mysql_error());
mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), '1 fan has left the fanclub.', 0, 0);");
}
else {mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'No fans have either joined or left the fanclub.', 0, 0);");}
}
echo "Fans OK";


//odds
$troday = date("l");
if ($troday=='Monday') {
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
echo "_ODDSupdated";
}
?>