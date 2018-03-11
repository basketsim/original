<?php
sd
/*
DELETE FROM `events` WHERE `description`='Training occured.' AND `when` LIKE '2010-03-11%'
SELECT id, age, workrate, has_played, star_posit, club FROM players, teams WHERE club = teamid AND coach<>9 AND has_played=1 AND injury<1 AND club >0 AND STATUS=1 AND guards_t >0 ORDER BY club DESC
*/

ini_set("max_execution_time", 2500);
require_once("cron2conect.php");

$ekipe = mysql_query("SELECT `teamid` , `intensity` , `guards_t` , `bigmen_t` FROM `teams` , `users` WHERE `teamid`=`club` AND `status`='1' AND teamid > 12857 AND teamid < 12954 ORDER BY teamid ASC") or die("Ne izbere ekip.");
while ($r=mysql_fetch_array($ekipe)) {
$ekipa = $r[teamid];
$intense = $r[intensity];
$beki = $r[guards_t];
$fori = $r[bigmen_t];
SWITCH ($intense) {
CASE 0: $koef = 5/16; $utrujenost = -6; break;
CASE 1: $koef = 11/16; $utrujenost = 0; break;
CASE 2: $koef = 1; $utrujenost = 6; break;
CASE 3: $koef = 5/4; $utrujenost = 12; break;
}

$kovcq = mysql_query("SELECT `workrate` , `motiv` FROM `players` WHERE coach='1' AND `club`= '$ekipa' LIMIT 1");
if (mysql_num_rows($kovcq)==1) {$coachwrr = mysql_result($kovcq,0,"workrate"); $coachmot = mysql_result($kovcq,0,"motiv");} 
else {$coachwrr = 0; $coachmot = 0;}
$coachmot = ceil($coachmot);

$query = mysql_query("SELECT `id` , `age` , `workrate` , `has_played` , `star_posit` FROM `players` WHERE `has_played`=1 AND `injury` < 1 AND `club`='$ekipa'");
while ($i = mysql_fetch_array($query)) {
$id = $i[id];
$age = $i[age];
$workrate = $i[workrate];
$has_played = $i[has_played];
$star_posit = $i[star_posit];
if ($age > 44) {$age = 44 + ($age - 44)/7;}
$totaltrain = 3*tan((27-$age+3*$workrate/126)*M_PI/50)+($coachmot+100)*sqrt($age-14)*($coachwrr+360)/194000-1.4302;
if ($totaltrain < 0) {$totaltrain = round((-($totaltrain*$totaltrain)+$totaltrain)/$koef,2);} else {$totaltrain = round($koef*$totaltrain,2);}
if ($totaltrain > 4) {$totaltrain=0;}
if ($totaltrain < -8) {$totaltrain=-8;}

/*
echo "IGRALEC: ",$id," - EKIPA: ",$ekipa," - TRENING: ",$totaltrain,"<br/>";
}
}
die("_");
*/

if ($has_played==1 AND $star_posit <3 AND $beki >0) {
SWITCH ($beki) {
CASE 1: mysql_query("UPDATE players SET handling=handling+$totaltrain, fatigue=fatigue+$utrujenost, last_position=1, last_training=$totaltrain, has_played=0 WHERE id=$id LIMIT 1"); break;
CASE 2: mysql_query("UPDATE players SET speed=speed+$totaltrain, fatigue=fatigue+$utrujenost, last_position=2, last_training=$totaltrain, has_played=0 WHERE id=$id LIMIT 1"); break;
CASE 3: mysql_query("UPDATE players SET passing=passing+$totaltrain, fatigue=fatigue+$utrujenost, last_position=3, last_training=$totaltrain, has_played=0 WHERE id=$id LIMIT 1"); break;
CASE 4: mysql_query("UPDATE players SET vision=vision+$totaltrain, fatigue=fatigue+$utrujenost, last_position=4, last_training=$totaltrain, has_played=0 WHERE id=$id LIMIT 1"); break;
CASE 5: mysql_query("UPDATE players SET rebounds=rebounds+$totaltrain, fatigue=fatigue+$utrujenost, last_position=5, last_training=$totaltrain, has_played=0 WHERE id=$id LIMIT 1"); break;
CASE 6: mysql_query("UPDATE players SET position=position+$totaltrain, fatigue=fatigue+$utrujenost, last_position=6, last_training=$totaltrain, has_played=0 WHERE id=$id LIMIT 1"); break;
CASE 7: mysql_query("UPDATE players SET shooting=shooting+$totaltrain, fatigue=fatigue+$utrujenost, last_position=7, last_training=$totaltrain, has_played=0 WHERE id=$id LIMIT 1"); break;
CASE 8: mysql_query("UPDATE players SET freethrow=freethrow+$totaltrain, fatigue=fatigue+$utrujenost, last_position=8, last_training=$totaltrain, has_played=0 WHERE id=$id LIMIT 1"); break;
CASE 9: mysql_query("UPDATE players SET defense=defense+$totaltrain, fatigue=fatigue+$utrujenost, last_position=9, last_training=$totaltrain, has_played=0 WHERE id=$id LIMIT 1"); break;
}
}
if ($has_played==1 AND $star_posit >2 AND $fori >0) {
SWITCH ($fori) {
CASE 1: mysql_query("UPDATE players SET handling=handling+$totaltrain, fatigue=fatigue+$utrujenost, last_position=1, last_training=$totaltrain, has_played=0 WHERE id=$id LIMIT 1"); break;
CASE 2: mysql_query("UPDATE players SET speed=speed+$totaltrain, fatigue=fatigue+$utrujenost, last_position=2, last_training=$totaltrain, has_played=0 WHERE id=$id LIMIT 1"); break;
CASE 3: mysql_query("UPDATE players SET passing=passing+$totaltrain, fatigue=fatigue+$utrujenost, last_position=3, last_training=$totaltrain, has_played=0 WHERE id=$id LIMIT 1"); break;
CASE 4: mysql_query("UPDATE players SET vision=vision+$totaltrain, fatigue=fatigue+$utrujenost, last_position=4, last_training=$totaltrain, has_played=0 WHERE id=$id LIMIT 1"); break;
CASE 5: mysql_query("UPDATE players SET rebounds=rebounds+$totaltrain, fatigue=fatigue+$utrujenost, last_position=5, last_training=$totaltrain, has_played=0 WHERE id=$id LIMIT 1"); break;
CASE 6: mysql_query("UPDATE players SET position=position+$totaltrain, fatigue=fatigue+$utrujenost, last_position=6, last_training=$totaltrain, has_played=0 WHERE id=$id LIMIT 1"); break;
CASE 7: mysql_query("UPDATE players SET shooting=shooting+$totaltrain, fatigue=fatigue+$utrujenost, last_position=7, last_training=$totaltrain, has_played=0 WHERE id=$id LIMIT 1"); break;
CASE 8: mysql_query("UPDATE players SET freethrow=freethrow+$totaltrain, fatigue=fatigue+$utrujenost, last_position=8, last_training=$totaltrain, has_played=0 WHERE id=$id LIMIT 1"); break;
CASE 9: mysql_query("UPDATE players SET defense=defense+$totaltrain, fatigue=fatigue+$utrujenost, last_position=9, last_training=$totaltrain, has_played=0 WHERE id=$id LIMIT 1"); break;
}
}
}
mysql_query("INSERT INTO `events` VALUES ('', $ekipa, NOW(), 'Training occured.', 0, 0);");
}
echo "Dodaten trening OK";

?>