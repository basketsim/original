<?php
ini_set("max_execution_time", 2500);
require_once("cron2conect.php");

mysql_query("UPDATE players, teams SET motiv=motiv-1 WHERE club = teamid AND coach =9 AND `status`=1 AND motiv >0") or die(mysql_error());

$drava = mysql_query("SELECT id, charac, height, handling, speed, passing, vision, rebounds, position, freethrow, shooting, defense, workrate, price FROM players, teams WHERE club = teamid AND coach =9 AND `status`=1 AND price > 0 AND motiv=0 ORDER BY id ASC") or die(mysql_error());
while ($mc = mysql_fetch_array($drava)) {
$id = $mc[id];
$charac = $mc[charac];
$height = $mc[height];
$handling = $mc[handling];
$speed = $mc[speed];
$passing = $mc[passing];
$vision = $mc[vision];
$rebounds = $mc[rebounds];
$position = $mc[position];
$freethrow = $mc[freethrow];
$shooting = $mc[shooting];
$defense = $mc[defense];
$workrate = $mc[workrate];
$price = $mc[price];

$randon = rand(74,108);
$randon = $randon/101;
$odbitek = ($handling+$speed+$passing+$vision+$rebounds+$position+$freethrow+$shooting+$defense)/24;
$VREDNOST = ($workrate * $randon) - $odbitek;
if ($price==1 OR $price==2 OR $price==4) {$VREDNOST=$VREDNOST-3+(182-$height)/2;} elseif ($price==5) {$VREDNOST=$VREDNOST-3+($height-187)/2;}
SWITCH (TRUE) {
CASE ($charac < 4): $spec='stable'; break;
CASE ($charac > 3 && $charac < 7): $spec='entertaining'; break;
CASE ($charac > 6 && $charac < 11): $spec='calm'; break;
CASE ($charac > 10 && $charac < 14): $spec='aggressive'; break;
CASE ($charac > 13 && $charac < 17): $spec='controversial'; break;
CASE ($charac > 16): $spec='selfish'; break;
}
if ($spec=='calm' AND $price==2) {$VREDNOST=$VREDNOST-10;}
elseif ($spec=='calm' AND $price==7) {$VREDNOST=$VREDNOST+rand(6,7);}
elseif ($spec=='aggressive' AND $price==5) {$VREDNOST=$VREDNOST+rand(8,9);}
elseif ($spec=='stable' AND $price==1) {$VREDNOST=$VREDNOST+rand(8,9);}
elseif ($spec=='stable' AND $price==8) {$VREDNOST=$VREDNOST+rand(8,9);}
elseif ($spec=='entertaining' AND $price==4) {$VREDNOST=$VREDNOST+rand(8,9);}
elseif ($spec=='controversial' AND $price==6) {$VREDNOST=$VREDNOST-12;}
elseif ($spec=='selfish' AND $price==4) {$VREDNOST=$VREDNOST+rand(8,9);}
elseif ($spec=='selfish' AND $price==7) {$VREDNOST=$VREDNOST+rand(5,8);}
elseif ($spec=='selfish' AND $price==3) {$VREDNOST=$VREDNOST-11;}
elseif ($spec=='selfish' AND $price==9) {$VREDNOST=$VREDNOST-11;}
if ($VREDNOST < 19) {$VREDNOST=rand(6,31);}
if ($VREDNOST < 40) {$VREDNOST=$VREDNOST+2;}
if ($VREDNOST > 81) {$VREDNOST=$VREDNOST*0.91;}
if ($VREDNOST > 90) {$VREDNOST=90;}

SWITCH ($price) {
CASE 1: mysql_query("UPDATE players SET handling=$VREDNOST-quality/30, workrate=0, price=0 WHERE coach=9 AND id=$id LIMIT 1") or die(mysql_error()); break;
CASE 2: mysql_query("UPDATE players SET speed=$VREDNOST-quality/30, workrate=0, price=0 WHERE coach=9 AND id=$id LIMIT 1") or die(mysql_error()); break;
CASE 3: mysql_query("UPDATE players SET passing=$VREDNOST-quality/30, workrate=0, price=0 WHERE coach=9 AND id=$id LIMIT 1") or die(mysql_error()); break;
CASE 4: mysql_query("UPDATE players SET vision=$VREDNOST-quality/30, workrate=0, price=0 WHERE coach=9 AND id=$id LIMIT 1") or die(mysql_error()); break;
CASE 5: mysql_query("UPDATE players SET rebounds=$VREDNOST-quality/30, workrate=0, price=0 WHERE coach=9 AND id=$id LIMIT 1") or die(mysql_error()); break;
CASE 6: mysql_query("UPDATE players SET position=$VREDNOST-quality/30, workrate=0, price=0 WHERE coach=9 AND id=$id LIMIT 1") or die(mysql_error()); break;
CASE 7: mysql_query("UPDATE players SET shooting=$VREDNOST-quality/30, workrate=0, price=0 WHERE coach=9 AND id=$id LIMIT 1") or die(mysql_error()); break;
CASE 8: mysql_query("UPDATE players SET freethrow=$VREDNOST-quality/30, workrate=0, price=0 WHERE coach=9 AND id=$id LIMIT 1") or die(mysql_error()); break;
CASE 9: mysql_query("UPDATE players SET defense=$VREDNOST-quality/30, workrate=0, price=0 WHERE coach=9 AND id=$id LIMIT 1") or die(mysql_error()); break;
}
}
echo "_ALL_GOOD";

mysql_query("TRUNCATE TABLE `u15players`") or die(mysql_error());
$drava = mysql_query("SELECT DISTINCT country FROM regions") or die(mysql_error());
while ($mc = mysql_fetch_array($drava)) {
$country = $mc['country'];
$c=0;
$cen = mysql_query("SELECT * FROM `players` WHERE country = '$country' AND coach =9 AND (wage =500 OR wage =1000) ORDER BY (handling + speed + passing + vision + rebounds + position + freethrow + shooting + defense + workrate) * (handling + speed + passing + vision + rebounds + position + freethrow + shooting + defense + workrate) * quality/60 DESC LIMIT 10") or die(mysql_error());
while ($c < mysql_num_rows($cen)) {
$cid=mysql_result($cen,$c,"id");
$fwn=mysql_result($cen,$c,"name");
$lwn=mysql_result($cen,$c,"surname");
$handli=mysql_result($cen,$c,"handling");
$spe=mysql_result($cen,$c,"speed");
$passi=mysql_result($cen,$c,"passing");
$visi=mysql_result($cen,$c,"vision");
$reboun=mysql_result($cen,$c,"rebounds");
$positi=mysql_result($cen,$c,"position");
$freethr=mysql_result($cen,$c,"freethrow");
$shooti=mysql_result($cen,$c,"shooting");
$defen=mysql_result($cen,$c,"defense");
$workra=mysql_result($cen,$c,"workrate");
$haw=mysql_result($cen,$c,"quality");
$najm = $fwn." ".$lwn;
$siYT = 25000 + (($handli + $spe + $passi + $visi + $reboun + $positi + $freethr + $shooti + $defen + $workra) * ($handli + $spe + $passi + $visi + $reboun + $positi + $freethr + $shooti + $defen + $workra) * 10);
if ($haw==0) {$siYT = round((1/60) * $siYT);} else {$siYT = round(($haw/60) * $siYT);}
if ($cid > 0) {mysql_query("INSERT INTO u15players VALUES ('$cid', '$najm', '$country', '$siYT');") or die(mysql_error());}
$c++;
}
}
mysql_query("ALTER TABLE `u15players` ORDER BY `countr` ASC, `YTvalue` DESC") or die(mysql_error());
@mysql_query("DELETE FROM `bookmarks` WHERE `b_type` =9 AND `multiview` =1");
?>