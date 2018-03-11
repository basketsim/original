<?php
ini_set("max_execution_time",1000);
include("cron2conect.php");
$sn=4;
while ($sn==4) {
$create_age = rand(30,60);
$create_char = rand(1,19);
$create_height = rand(169,211);
$create_weight = $create_height - rand(87,108);
$create_handling = rand(6,37);
$create_speed = rand(1,23);
$create_pass = rand(7,39);
$create_vision = rand(1,31);
$create_rebound = rand(2,21);
$create_position = rand(5,44);
$create_throws = rand(8,48);
$create_shoot = rand(6,48);
$create_def = rand(6,33);
$create_workrate = rand(3,121);
if ($create_workrate > 117) {$create_workrate = rand(3,121);}
$create_experience = rand(13,161) * ($create_age /75);
if ($create_experience < 3) {$create_experience=3;}
if ($create_experience > 121) {$create_experience=121;}
if ($create_experience < 41) {$create_quality = rand(42,48);} else {$create_quality = rand(42,55);}
$lucky3 = rand(1,200);
if ($lucky3 >197) {$create_quality=$create_quality+3;}
if ($create_quality >54 AND $create_experience >88) {$create_experience=$create_experience-18;}
if ($create_quality >54 AND $create_experience <67) {$create_experience=67;}
$create_price = $create_quality * $create_workrate * $create_experience * 6;
$cwage = $create_workrate * $create_experience * $create_quality /15;
$youthab = (100 * ($create_workrate/10 + $create_experience/6 + 2*($create_quality-40)) / 68);
if ($cwage < 3100 AND ($create_workrate < 90 OR $create_workrate > 114) AND $youthab < 74) {$sn=4;}
elseif ($cwage > 3099 AND $cwage < 4000 AND ($create_workrate < 96 OR $create_workrate > 120) AND $youthab < 75) {$sn=4;}
elseif ($cwage > 3999 AND $cwage < 5700 AND $create_workrate <102 AND $youthab < 75) {$sn=4;}
elseif ($cwage > 5699 AND $cwage < 7300 AND $create_workrate <108 AND $youthab < 76) {$sn=4;}
elseif ($cwage > 7299 AND $cwage < 12000 AND ($youthab < 78 OR $create_workrate < 45)) {$sn=4;}
elseif ($cwage > 11999 AND $cwage < 18000 AND ($youthab < 79 OR $create_workrate < 60)) {$sn=4;}
elseif ($cwage > 17999 AND $cwage < 25000 AND ($youthab < 80 OR $create_workrate < 65)) {$sn=4;}
elseif ($cwage > 24999 AND $cwage < 30000 AND ($youthab < 81 OR $create_workrate < 75)) {$sn=4;}
elseif ($cwage > 29999 AND $cwage < 36000 AND ($youthab < 82 OR $create_workrate < 85)) {$sn=4;}
elseif ($cwage > 35999 AND ($youthab < 82 OR $create_workrate < 90)) {$sn=4;}
else {$sn=6;}
if (($create_quality + $create_experience + $create_workrate) > 275) {$sn=4;}
if (($create_quality + $create_quality + $create_experience + $create_workrate) > 329) {$sn=4;}
if (($create_quality + $create_experience) > 175) {$sn=4;}
if ($cwage < 250) {$sn=4;}
if ($youthab < 78 AND $sn==6) {$sn=4; $rarewr=rand(1,25); if($rarewr==13){$sn=6;}
}
}
$drzavljan = mysql_query("SELECT DISTINCT `country` FROM `regions` ORDER BY RAND( ) LIMIT 1");
$create_country = mysql_result($drzavljan,0,"country");
$namez = mysql_query("SELECT `name` FROM `names` WHERE `country` LIKE '$create_country'") or die(mysql_error());
while ($n = mysql_fetch_array($namez)) {
$arrName[] = $n[0];
}
shuffle($arrName);
$random_name_value = $arrName[0];
$surnamez = mysql_query("SELECT `surname` FROM `surnames` WHERE `country` LIKE '$create_country'") or die(mysql_error());
while ($s = mysql_fetch_array($surnamez)) {
$arrSur[] = $s[0];
}
shuffle($arrSur);
$random_surname_value = $arrSur[0];

$cfwage = ($create_experience * (100*$create_quality - 4000))/2;

$create_player_request = "INSERT INTO players (name, surname, age, club, country, charac, height, weight, handling, speed, passing, vision, rebounds, position, freethrow, shooting, defense, workrate, experience, fatigue, wage, coach, orient, quality, price, motiv, has_played, last_position) VALUES ('$random_name_value', '$random_surname_value', $create_age, 0, '$create_country', $create_char, $create_height, $create_weight, $create_handling, $create_speed, $create_pass, $create_vision, $create_rebound, $create_position, $create_throws, $create_shoot, $create_def, $create_workrate, $create_experience, 0, $cfwage, 1, 0, $create_quality, $create_price, 105, 0, 1);";
$result = mysql_query($create_player_request);
if(!$result){echo "Coach creation failed!";}

//odstranitev preslabih trenerjev
$konja = mysql_query("SELECT `id` FROM `players` WHERE `age` <61 AND `club`=0 AND `coach`=1 AND `price`>999999 AND (100 * (`workrate`/10 + `experience`/6 +2 * (`quality`-40)) /68) <75 LIMIT 50") or die(mysql_error());
while ($mc = mysql_fetch_array($konja)) {
$pyid = $mc['id'];
mysql_query("UPDATE players SET age=61 WHERE club=0 AND coach=1 AND id='$pyid' LIMIT 1") or die(mysql_error());
}
?>