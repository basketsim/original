<?php
ini_set("max_execution_time", 2500);
include("common.php");
d
$create_country = $_POST['league_country'];
$stevilo_klubov = $_POST["stevilo_klubov"];

$botomigralce = mysql_query("SELECT teamid, name FROM teams WHERE status=2 AND country='$create_country' LIMIT 599") or die(mysql_error());
while ($b = mysql_fetch_array($botomigralce)) {
$teamid = $b['teamid'];
$ekipa_ime = $b['name'];

/* start of the loop which will create 12 players */

for ($numbofplay = 1; $numbofplay <= 12; $numbofplay++) {

/* create player */

$create_age = rand(19,34);
$height_chance = rand(0,9);
if ($height_chance < 2) {$create_height = rand(169,198);} elseif ($height_chance > 3 AND $height_chance < 8) {$create_height = rand(184,207);} else {$create_height = rand(193,214);}
$create_weight = $create_height - rand(86,117);

//skin color
$randcol=rand(0,300);
if ($create_country=='Brazil' OR $create_country=='USA' OR $create_country=='Colombia'){
if ($randcol < 120) {$skincolor = 0;}
elseif ($randcol > 119 AND $randcol < 180) {$skincolor = 1;}
else {$skincolor = 2;}
}
if ($create_country=='United Kingdom' OR $create_country=='France' OR $create_country=='Netherlands' OR $create_country=='Canada'){
if ($randcol < 210) {$skincolor = 0;}
elseif ($randcol > 209 AND $randcol < 240) {$skincolor = 1;}
else {$skincolor = 2;}
}
if ($create_country=='Puerto Rico' OR $create_country=='India' OR $create_country=='Indonesia' OR $create_country=='Mexico' OR $create_country=='Philippines' OR $create_country=='Thailand'){
if ($randcol < 50) {$skincolor = 0;}
elseif ($randcol > 49 AND $randcol < 285) {$skincolor = 1;}
else {$skincolor = 2;}
}
if ($create_country=='Malaysia' OR $create_country=='Venezuela' OR $create_country=='Uruguay' OR $create_country=='Tunisia' OR $create_country=='Egypt' OR $create_country=='Turkey' OR $create_country=='Chile' OR $create_country=='Montenegro' OR $create_country=='Peru' OR $create_country=='Argentina' OR $create_country=='Portugal' OR $create_country=='Israel' OR $create_country=='Romania' OR $create_country=='Bulgaria' OR $create_country=='Greece' OR $create_country=='Bosnia' OR $create_country=='Albania' OR $create_country=='Germany' OR $create_country=='Belgium' OR $create_country=='Serbia' OR $create_country=='Spain' OR $create_country=='Italy'){
if ($randcol < 270) {$skincolor = 0;}
elseif ($randcol > 269 AND $randcol < 297) {$skincolor = 1;}
else {$skincolor = 2;}
}
if ($create_country=='Belarus' OR $create_country=='Japan' OR $create_country=='Georgia' OR $create_country=='New Zealand' OR $create_country=='Austria' OR $create_country=='Ireland' OR $create_country=='Hong Kong' OR $create_country=='South Korea' OR $create_country=='Phillipines' OR $create_country=='Norway' OR $create_country=='China' OR $create_country=='Malta' OR $create_country=='Croatia' OR $create_country=='Russia' OR $create_country=='Switzerland' OR $create_country=='Cyprus' OR $create_country=='Denmark' OR $create_country=='Slovakia' OR $create_country=='Sweden' OR $create_country=='FYR Macedonia' OR $create_country=='Australia' OR $create_country=='Czech Republic' OR $create_country=='Hungary' OR $create_country=='Finland' OR $create_country=='Estonia' OR $create_country=='Ukraine' OR $create_country=='Slovenia' OR $create_country=='Poland' OR $create_country=='Latvia' OR $create_country=='Lithuania') {
if ($randcol < 300) {$skincolor = 0;}
else {$skincolor = 1;}
}

SWITCH ($skincolor) {
CASE 0:
$def_temp = rand(0,7);
if ($def_temp == 0){require('../obrazi/kreate/create_wh1.php');}
if ($def_temp == 1){require('../obrazi/kreate/create_wh2.php');}
if ($def_temp == 2){require('../obrazi/kreate/create_wh3.php');}
if ($def_temp == 3){require('../obrazi/kreate/create_wh4.php');}
if ($def_temp == 4){require('../obrazi/kreate/create_wh5.php');}
if ($def_temp == 5){require('../obrazi/kreate/create_wh6.php');}
if ($def_temp == 6){require('../obrazi/kreate/create_wh7.php');}
if ($def_temp == 7){require('../obrazi/kreate/create_wh8.php');}
break;
CASE 1:
$def_temp = rand(0,5);
if ($def_temp == 0){require('../obrazi/kreate/create_br1.php');}
if ($def_temp == 1){require('../obrazi/kreate/create_br2.php');}
if ($def_temp == 2){require('../obrazi/kreate/create_br4.php');}
if ($def_temp == 3){require('../obrazi/kreate/create_br5.php');}
if ($def_temp == 4){require('../obrazi/kreate/create_br6.php');}
if ($def_temp == 5){require('../obrazi/kreate/create_br7.php');}
break;
CASE 2:
$def_temp = rand(0,6);
if ($def_temp == 0){require('../obrazi/kreate/create_bl1.php');}
if ($def_temp == 1){require('../obrazi/kreate/create_bl2.php');}
if ($def_temp == 2){require('../obrazi/kreate/create_bl3.php');}
if ($def_temp == 3){require('../obrazi/kreate/create_bl4.php');}
if ($def_temp == 4){require('../obrazi/kreate/create_bl5.php');}
if ($def_temp == 5){require('../obrazi/kreate/create_bl6.php');}
if ($def_temp == 6){require('../obrazi/kreate/create_bl8.php');}
break;
}

$create_handling = rand(1,65);
$create_speed = rand(1,65);
$create_pass = rand(1,61);
$create_vision = rand(1,62);
$create_rebound = rand(1,62);
$create_position = rand(1,62);
$create_throws = rand(1,51);
$create_shoot = rand(1,62);
$create_def = rand(1,61);
$create_workrate = rand(6,72);
$create_experience = rand(1,60) * ($create_age /100);
$create_tired = 0;

//placa
$value5 = (($create_handling * (((-tanh((($create_height-190)/6)-2.5))/4)+0.75)) + ($create_speed * (((-tanh((($create_height-190)/6)-2.5))/10)+0.9)) + ($create_pass * (((-tanh((($create_height-190)/6)-2.5))/6.5)+0.75)) + ($create_vision * ((((tanh((($create_height-180)/3)-2.5))/20)+0.85)+(((-tanh((($create_height-200)/3)-2.5))/10)+0.8)-0.9)) + ($create_rebound * (((tanh((($create_height-185)/6)-2.5))/2.5)+0.6)) + ($create_position * ((((-tanh((($create_height-180)/3)-2.5))/6.6)+0.55)+(((tanh((($create_height-200)/3)-2.5))/3.33)+0.8)-0.5)) + ($create_throws) + ($create_shoot * ((((tanh((($create_height-180)/3)-2.5))/6.6)+0.85)+(((-tanh((($create_height-200)/3)-2.5))/6.6)+0.85)-1)) + ($create_experience * 0.5) + ($create_def)) *4;
$create_wage = (($value5 * $value5 * $value5) / 225000) - 7500;
if ($create_wage < 200) {$create_wage=200;}

$namez = mysql_query("SELECT `name` FROM `names` WHERE `country` LIKE '$create_country'") or die(mysql_error());
while ($n = mysql_fetch_array($namez)) {
$arrName[] = $n[0];
}
shuffle($arrName);
$randomnameV = $arrName[0];
$surnamez = mysql_query("SELECT `surname` FROM `surnames` WHERE `country` LIKE '$create_country'") or die(mysql_error());
while ($s = mysql_fetch_array($surnamez)) {
$arrSur[] = $s[0];
}
shuffle($arrSur);
$randomsurnameV = $arrSur[0];

$random_char = rand(1,19);

$create_player_request = "INSERT INTO players (name, surname, age, club, country, charac, height, weight, handling, speed, passing, vision, rebounds, position, freethrow, shooting, defense, workrate, experience, fatigue, isonsale, wage, coach, orient, quality, price, motiv, has_played, last_position, face, ears, mouth, eyes, nose, mustage, hair) VALUES ('$randomnameV', '$randomsurnameV', $create_age, $teamid, '$create_country', $random_char, $create_height, $create_weight, $create_handling, $create_speed, $create_pass, $create_vision, $create_rebound, $create_position, $create_throws, $create_shoot, $create_def, $create_workrate, $create_experience, $create_tired, 0, $create_wage, 0, 0, 0, 0, 0, 0, 1, '$kepalacak', '$telingacak', '$mulutacak', '$matacak', '$hidungacak', '$kumisacak', '$rambutacak');";

mysql_query($create_player_request);

echo "Player created<br/>";

}

/* konec loopa, 12 igralcev je narejenih */

$plaqer = mysql_query("SELECT id FROM players WHERE club=$teamid");
$pum=mysql_num_rows($plaqer);
$p=0;
while ($p < $pum) {
$id=mysql_result($plaqer,$p,"id");
$array_playerid[$p] = $id;
$p++;
}

mysql_query("INSERT INTO tactics VALUES ($teamid, $array_playerid[0], $array_playerid[1], $array_playerid[2], $array_playerid[3], $array_playerid[4], $array_playerid[5], $array_playerid[6], $array_playerid[7], $array_playerid[8], $array_playerid[9], $array_playerid[10], $array_playerid[11]);");

//arena
$adarena = "INSERT INTO arena VALUES ('', 'Bot team court', $teamid, 1000, 500, 0, 0, 100, '', 250, '', '', 0, 0, 0, 0);";
mysql_query($adarena);
mysql_query("UPDATE competition SET curname='$ekipa_ime' WHERE teamid=$teamid LIMIT 1") or die(mysql_error());
mysql_query("UPDATE teams SET status=3 WHERE teamid=$teamid LIMIT 1") or die(mysql_error());

echo "<p><b>Bot team activated!</b></p>";
}
?>
<p><a href="confirm_bots.php">Back</a></p>