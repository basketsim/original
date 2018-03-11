<?php
ini_set("max_execution_time", 4600);
require_once("cron2conect.php");

mysql_query("UPDATE `players` SET `last_position`=0") or die(mysql_error());

$ekipe = mysql_query("SELECT `teamid` , `intensity` , `intensity2` , `guards_t` , `bigmen_t` FROM `teams` , `users` WHERE `teamid`=`club` AND `status`=1") or die("Ne izbere ekip.");
while ($r=mysql_fetch_array($ekipe)) {
$ekipa = $r[teamid];
$intense1 = $r[intensity];
$intense2 = $r[intensity2];
$beki = $r[guards_t];
$fori = $r[bigmen_t];
SWITCH ($intense1) {
CASE 0: $utrujenost1 = -6; break;
CASE 1: $utrujenost1 = 0; break;
CASE 2: $utrujenost1 = 6; break;
CASE 3: $utrujenost1 = 12; break;
}
SWITCH ($intense2) {
CASE 0: $utrujenost2 = -6; break;
CASE 1: $utrujenost2 = 0; break;
CASE 2: $utrujenost2 = 6; break;
CASE 3: $utrujenost2 = 12; break;
}

$kovcq = mysql_query("SELECT `workrate`, `motiv` FROM `players` WHERE coach=1 AND `club`= '$ekipa' LIMIT 1");
if (mysql_num_rows($kovcq)==1) {$coachwrr = mysql_result($kovcq,0,"workrate"); $coachmot = mysql_result($kovcq,0,"motiv");} else {$coachwrr = 0; $coachmot = 0;}
if ($coachwrr > 121) {$coachwrr=121;}
$coachmot = ceil($coachmot);
if ($coachmot > 100) {$coachmot=100;}

$query = mysql_query("SELECT `id`, `age`, `charac`, `workrate`, `fatigue`, `has_played`, `star_posit` FROM `players` WHERE `injury` < 1 AND `club`='$ekipa'");
while ($i = mysql_fetch_array($query)) {
$id = $i[id];
$age = $i[age];
$charac = $i[charac];
$workrate = $i[workrate];
$tiredinj = $i[fatigue];
$has_played = $i[has_played];
$star_posit = $i[star_posit];
if ($age > 44) {$age = 44 + ($age - 44)/7;}
$totaltrain = 3*tan((27-$age+3*$workrate/126)*M_PI/50)+($coachmot+100)*sqrt($age-14)*($coachwrr+360)/194000-1.4302;

if ($star_posit >2 AND $utrujenost2==12) {$koef = 5/4;}
elseif ($star_posit <3 AND $utrujenost1==12) {$koef = 5/4;}
elseif ($star_posit >2 AND $utrujenost2==6) {$koef = 1;}
elseif ($star_posit <3 AND $utrujenost1==6) {$koef = 1;}
elseif ($star_posit >2 AND $utrujenost2==0) {$koef = 11/16;}
elseif ($star_posit <3 AND $utrujenost1==0) {$koef = 11/16;}
elseif ($star_posit >2 AND $utrujenost2==-6) {$koef = 5/16;}
elseif ($star_posit <3 AND $utrujenost1==-6) {$koef = 5/16;}

if ($totaltrain < 0) {$totaltrain = round((-($totaltrain*$totaltrain)+$totaltrain)/$koef,2);} else {$totaltrain = round($koef*$totaltrain,2);}
if ($totaltrain > 4) {$totaltrain=0;}
if ($totaltrain < -8) {$totaltrain=-8;}

//character influence
if (($charac > 21 AND $charac < 26) AND $totaltrain > 0.02 AND $has_played==1 AND (($star_posit <3 AND ($beki==1 OR $beki==3 OR $beki==4)) OR ($star_posit >2 AND ($fori==1 OR $fori==3 OR $fori==4)))) {$totaltrain=round(0.92*$totaltrain,2);} //clumsy
if (($charac > 25 AND $charac < 30) AND $totaltrain > 0 AND $has_played==1 AND (($star_posit <3 AND $beki==2) OR ($star_posit >2 AND $fori==2))) {$totaltrain=round(1.08*$totaltrain,2);} //explosive
if ($charac > 40 AND $totaltrain > 0.02 AND $has_played==1 AND (($star_posit <3 AND $beki==9) OR ($star_posit >2 AND $fori==9))) {$totaltrain=round(0.92*$totaltrain,2);} //lazy

$randy = rand(500,666);
if ($randy==666 AND $tiredinj >4) {
$grdo = $tiredinj/10;
@mysql_query("UPDATE players SET injury=injury+$grdo WHERE id=$id LIMIT 1");
echo "POSKODBA:".$id."__";
if ($grdo < 2.00) {@mysql_query("INSERT INTO `events` VALUES ('', $ekipa, NOW(), 'During the training session one of the players picked up a minor injury.', 0, 0);");}
if ($grdo > 1.99) {@mysql_query("INSERT INTO `events` VALUES ('', $ekipa, NOW(), 'During the training session one of the players picked up a nasty injury.', 0, 0);");}
}

if ($has_played==1 AND $star_posit <3 AND $beki >0) {
SWITCH ($beki) {
CASE 1: mysql_query("UPDATE players SET handling=handling+$totaltrain, fatigue=greatest(fatigue+$utrujenost1,0), last_position=1, last_training=$totaltrain, has_played=0 WHERE id=$id LIMIT 1"); break;
CASE 2: mysql_query("UPDATE players SET speed=speed+$totaltrain, fatigue=greatest(fatigue+$utrujenost1,0), last_position=2, last_training=$totaltrain, has_played=0 WHERE id=$id LIMIT 1"); break;
CASE 3: mysql_query("UPDATE players SET passing=passing+$totaltrain, fatigue=greatest(fatigue+$utrujenost1,0), last_position=3, last_training=$totaltrain, has_played=0 WHERE id=$id LIMIT 1"); break;
CASE 4: mysql_query("UPDATE players SET vision=vision+$totaltrain, fatigue=greatest(fatigue+$utrujenost1,0), last_position=4, last_training=$totaltrain, has_played=0 WHERE id=$id LIMIT 1"); break;
CASE 5: mysql_query("UPDATE players SET rebounds=rebounds+$totaltrain, fatigue=greatest(fatigue+$utrujenost1,0), last_position=5, last_training=$totaltrain, has_played=0 WHERE id=$id LIMIT 1"); break;
CASE 6: mysql_query("UPDATE players SET position=position+$totaltrain, fatigue=greatest(fatigue+$utrujenost1,0), last_position=6, last_training=$totaltrain, has_played=0 WHERE id=$id LIMIT 1"); break;
CASE 7: mysql_query("UPDATE players SET shooting=shooting+$totaltrain, fatigue=greatest(fatigue+$utrujenost1,0), last_position=7, last_training=$totaltrain, has_played=0 WHERE id=$id LIMIT 1"); break;
CASE 8: mysql_query("UPDATE players SET freethrow=freethrow+$totaltrain, fatigue=greatest(fatigue+$utrujenost1,0), last_position=8, last_training=$totaltrain, has_played=0 WHERE id=$id LIMIT 1"); break;
CASE 9: mysql_query("UPDATE players SET defense=defense+$totaltrain, fatigue=greatest(fatigue+$utrujenost1,0), last_position=9, last_training=$totaltrain, has_played=0 WHERE id=$id LIMIT 1"); break;
}
}
if ($has_played==1 AND $star_posit >2 AND $fori >0) {
SWITCH ($fori) {
CASE 1: mysql_query("UPDATE players SET handling=handling+$totaltrain, fatigue=greatest(fatigue+$utrujenost2,0), last_position=1, last_training=$totaltrain, has_played=0 WHERE id=$id LIMIT 1"); break;
CASE 2: mysql_query("UPDATE players SET speed=speed+$totaltrain, fatigue=greatest(fatigue+$utrujenost2,0), last_position=2, last_training=$totaltrain, has_played=0 WHERE id=$id LIMIT 1"); break;
CASE 3: mysql_query("UPDATE players SET passing=passing+$totaltrain, fatigue=greatest(fatigue+$utrujenost2,0), last_position=3, last_training=$totaltrain, has_played=0 WHERE id=$id LIMIT 1"); break;
CASE 4: mysql_query("UPDATE players SET vision=vision+$totaltrain, fatigue=greatest(fatigue+$utrujenost2,0), last_position=4, last_training=$totaltrain, has_played=0 WHERE id=$id LIMIT 1"); break;
CASE 5: mysql_query("UPDATE players SET rebounds=rebounds+$totaltrain, fatigue=greatest(fatigue+$utrujenost2,0), last_position=5, last_training=$totaltrain, has_played=0 WHERE id=$id LIMIT 1"); break;
CASE 6: mysql_query("UPDATE players SET position=position+$totaltrain, fatigue=greatest(fatigue+$utrujenost2,0), last_position=6, last_training=$totaltrain, has_played=0 WHERE id=$id LIMIT 1"); break;
CASE 7: mysql_query("UPDATE players SET shooting=shooting+$totaltrain, fatigue=greatest(fatigue+$utrujenost2,0), last_position=7, last_training=$totaltrain, has_played=0 WHERE id=$id LIMIT 1"); break;
CASE 8: mysql_query("UPDATE players SET freethrow=freethrow+$totaltrain, fatigue=greatest(fatigue+$utrujenost2,0), last_position=8, last_training=$totaltrain, has_played=0 WHERE id=$id LIMIT 1"); break;
CASE 9: mysql_query("UPDATE players SET defense=defense+$totaltrain, fatigue=greatest(fatigue+$utrujenost2,0), last_position=9, last_training=$totaltrain, has_played=0 WHERE id=$id LIMIT 1"); break;
}
}
if ($has_played==0 AND $age >=30) {
$drop = 0 - (rand(15,250)/100);
$skilarray = array('handling', 'speed', 'passing', 'vision', 'rebounds', 'position', 'shooting', 'freethrow', 'defense');
$last = rand(1,9);
$skil = $skilarray[$last-1];
$update = "UPDATE players SET ".$skil."=".$skil."+".$drop.", last_position=".$last.", last_training=".$drop." WHERE id=".$id." LIMIT 1";
mysql_query($update);
}
}
mysql_query("INSERT INTO `events` VALUES ('', $ekipa, NOW(), 'Weekly training took place.', 0, 0);");
}
echo "_allGOOD";
?>