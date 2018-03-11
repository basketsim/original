<?php
ini_set("max_execution_time",2100);
require_once("cron2conect.php");
$izbor = mysql_query("SELECT DISTINCT country FROM regions");
while ($i = mysql_fetch_array($izbor)){
$drzava = $i['country'];
mysql_query("DELETE FROM youthcamp WHERE country = '$drzava'");
$podizbor = mysql_query("SELECT id, name, surname, age, ntplayer, EV FROM players, transfers WHERE id=playerid AND playerclub='Youth camp' AND timeofsale > '2014-08-27 00:35:00' AND players.country = '$drzava' ORDER BY EV DESC LIMIT 50") or die(mysql_error());
while ($r = mysql_fetch_array($podizbor)) {
$id = $r['id'];
$name = $r['name'];
$surname = $r['surname'];
$age = $r['age'];
$ntp = $r['ntplayer'];
$wage = $r['EV'];
mysql_query("INSERT INTO youthcamp VALUES ('$id', '$name', '$surname', '$age', '$drzava', '$ntp', '$wage');") or die(mysql_error());
}
}
echo "update of camps_";

$d = mysql_query("SELECT `leagueid`, `strength` FROM `leagues`") or die(mysql_error());
while ($f=mysql_fetch_array($d)) {
$leagueid = $f["leagueid"];
$str = $f["strength"];
$tstre = mysql_query("SELECT SUM(wage)/COUNT(*) AS vredd FROM competition, players WHERE club = teamid AND coach<>9 AND season =$default_season AND leagueid ='$leagueid'") or die(mysql_error());
list($vred1) = mysql_fetch_row($tstre);
$strvred = round($vred1/100);
$change=$strvred-$str;
mysql_query("UPDATE `leagues` SET `change`=$change, `strength`=$strvred WHERE `leagueid`=$leagueid") or die(mysql_error());
}
echo "_update of leaguestrengths";

//warning
$troday = date("l");
if ($troday=='Thursday') {echo "__PLAYER DAYS!!!!!";}
?>