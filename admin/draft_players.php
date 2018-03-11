<?php
ini_set("max_execution_time", 3500);
include_once("common.php");

OFF

//list of countries based on number of users should be updated below
//with this script it's best to create 6000 or more players and then delete in the db players of insufficient quality with below lines:
//DELETE FROM `players` WHERE club =99999 AND wage <16000
//DELETE FROM `players` WHERE club =99999 AND wage <17000 and workrate < 97
//DELETE FROM `players` WHERE club =99999 AND wage <18000 and workrate < 89
//DELETE FROM `players` WHERE club =99999 AND wage <19000 and workrate < 81
//DELETE FROM `players` WHERE club =99999 AND wage <21000 and workrate < 73
//DELETE FROM `players` WHERE club =99999 AND wage <23000 and workrate < 65
//DELETE FROM `players` WHERE club =99999 AND wage <25000 and workrate < 49
//DELETE FROM `players` WHERE club =99999 AND wage <28000 and workrate < 33
//UPDATE `players` SET age=19 WHERE club =99999 AND wage <29999
//UPDATE `players` SET age=19 WHERE club =99999 AND wage <39999 and workrate < 49
//UPDATE `players` SET age=20 WHERE club =99999 AND wage >39999 and workrate > 64
//UPDATE `players` SET age=20 WHERE club =99999 AND wage >34999 and workrate > 80
//UPDATE `players` SET age=20 WHERE club =99999 AND wage >29999 and workrate > 96
//UPDATE `players` SET age=20 WHERE club =99999 AND wage >24999 and workrate > 120
//UPDATE `players` SET age=20 WHERE club =99999 AND wage >44999
//also too good players should be removed

/*
$ena = mysql_query("SELECT country, count( * ) as muca FROM teams, users WHERE teams.teamid = users.club AND teams.status =1 GROUP BY country ORDER BY count( * ) DESC limit 100");
while ($a = mysql_fetch_array($ena)){
$country = $a["country"];
$muca = $a["muca"];
echo $country," - ",round($muca/10),"<br/>";
}
die("dsds");
*/

//this is the number of players that will be added with one run of this script
$stevilo=999;

for ($numbofplay = 1; $numbofplay <= $stevilo; $numbofplay++) {

//nakljucna drzava
$countryarray = array('Greece', 'Greece', 'Greece', 'Greece', 'Greece', 'Greece', 'Slovenia', 'USA', 'Italy', 'Latvia', 'Poland', 'Spain', 'Bosnia', 'Serbia', 'Estonia', 'Lithuania', 'Slovenia', 'USA', 'Italy', 'Latvia', 'Poland', 'Spain', 'Bosnia', 'Serbia', 'Estonia', 'Lithuania', 'Slovenia', 'USA', 'Italy', 'Latvia', 'Poland', 'Spain', 'Bosnia', 'Serbia', 'Estonia', 'Lithuania', 'Slovenia', 'USA', 'Italy', 'Latvia', 'Poland', 'Spain', 'Bosnia', 'Serbia', 'Estonia', 'Lithuania', 'Slovenia', 'USA', 'Italy', 'Latvia', 'Poland', 'Spain', 'Bosnia', 'Serbia', 'Estonia', 'Lithuania', 'France', 'Turkey', 'Croatia', 'Philippines', 'Romania', 'Belgium', 'Germany', 'Israel', 'Portugal', 'Argentina', 'Bulgaria', 'Indonesia', 'Finland', 'FYR Macedonia', 'United Kingdom', 'Czech Republic', 'Australia', 'France', 'Turkey', 'Croatia', 'Philippines', 'Romania', 'Belgium', 'Germany', 'Israel', 'Portugal', 'Argentina', 'Bulgaria', 'Indonesia', 'Finland', 'FYR Macedonia', 'United Kingdom', 'Czech Republic', 'Australia', 'France', 'Turkey', 'Croatia', 'Philippines', 'Romania', 'Belgium', 'Germany', 'Israel', 'Portugal', 'Argentina', 'Bulgaria', 'Indonesia', 'Finland', 'FYR Macedonia', 'United Kingdom', 'Czech Republic', 'Australia', 'France', 'Turkey', 'Croatia', 'Philippines', 'Romania', 'Belgium', 'Germany', 'Israel', 'Portugal', 'Argentina', 'Bulgaria', 'Indonesia', 'Finland', 'FYR Macedonia', 'United Kingdom', 'Czech Republic', 'Australia', 'Uruguay', 'Canada', 'Hungary', 'Switzerland', 'Netherlands', 'China', 'Russia', 'Slovakia', 'Cyprus', 'Brazil', 'Chile', 'Sweden', 'Albania', 'Venezuela', 'Ukraine', 'Montenegro', 'Denmark', 'Norway', 'Ireland', 'South Korea', 'Malaysia', 'Austria', 'Malta', 'Japan', 'New Zealand', 'Belarus', 'Peru', 'Thailand', 'Mexico', 'Colombia', 'Hong Kong', 'Puerto Rico', 'Tunisia', 'India', 'Georgia', 'Egypt', 'Uruguay', 'Canada', 'Hungary', 'Switzerland', 'Netherlands', 'China', 'Russia', 'Slovakia', 'Cyprus', 'Brazil', 'Chile', 'Sweden', 'Albania', 'Venezuela', 'Ukraine', 'Montenegro', 'Denmark', 'Norway', 'Ireland', 'South Korea', 'Malaysia', 'Austria', 'Malta', 'Japan', 'New Zealand', 'Belarus', 'Peru', 'Thailand', 'Mexico', 'Colombia', 'Hong Kong', 'Puerto Rico', 'Tunisia', 'India', 'Georgia', 'Egypt', 'Uruguay', 'Canada', 'Hungary', 'Switzerland', 'Netherlands', 'China', 'Russia', 'Slovakia', 'Cyprus', 'Brazil', 'Chile', 'Sweden', 'Albania', 'Venezuela', 'Ukraine', 'Montenegro', 'Denmark', 'Norway', 'Ireland', 'South Korea', 'Malaysia', 'Austria', 'Malta', 'Japan', 'New Zealand', 'Belarus', 'Peru', 'Thailand', 'Mexico', 'Colombia', 'Hong Kong', 'Puerto Rico', 'Tunisia', 'India', 'Georgia', 'Egypt');
shuffle($countryarray);
$create_country = $countryarray[0];

//ustvarim igralca

$create_age = rand(19,20);
if ($create_age==20) {$create_age = rand(19,20);}
if ($create_age==20) {$create_age = rand(19,20);}
$create_char = rand(1,43);
$height_chance = rand(0,9); if ($height_chance < 2) {$create_height = rand(171,200);} elseif ($height_chance > 1 AND $height_chance < 7) {$create_height = rand(188,207);} else {$create_height = rand(190,219);}
$create_weight = $create_height - rand(88,113);

$create_handling = rand(9,99);
$create_speed = rand(14,100);
$create_pass = rand(14,95);
$create_vision = rand(9,96);
$create_rebound = rand(13,94);
$create_position = rand(14,90);
$create_throws = rand(19,99);
$create_shoot = rand(14,98);
$create_def = rand(14,99);
$znizanwr = rand(0,4);
if ($znizanwr < 2){$create_workrate = rand(26,120) * rand(70,101) /100;} else {$create_workrate = rand(27,118) * rand(20,105) /97;}

if ($create_age<>20) {$create_experience = rand(40,101) * ($create_age/79);}
if ($create_age==20) {$create_experience = rand(50,112) * ($create_age/70);}

if ($create_height > 199) {$create_rebound=$create_rebound+13; $create_handling=$create_handling-9; $create_vision=$create_vision-8; $create_shoot=$create_shoot-2; $create_position=$create_position+10; $create_def=$create_def+5;}
if ($create_height < 200) {$create_rebound=$create_rebound-14; $create_handling=$create_handling+12; $create_pass=$create_pass+11; $create_vision=$create_vision+9; $create_def=$create_def-6;}

//nova placa
$waw = (($create_handling * (((-tanh((($create_height-190)/6)-2.5))/4)+0.75)) + ($create_speed * (((-tanh((($create_height-190)/6)-2.5))/10)+0.9)) + ($create_pass * (((-tanh((($create_height-190)/6)-2.5))/6.5)+0.75)) + ($create_vision * ((((tanh((($create_height-180)/3)-2.5))/20)+0.85)+(((-tanh((($create_height-200)/3)-2.5))/10)+0.8)-0.9)) + ($create_rebound * (((tanh((($create_height-185)/6)-2.5))/2.5)+0.6)) + ($create_position * ((((-tanh((($create_height-180)/3)-2.5))/6.6)+0.55)+(((tanh((($create_height-200)/3)-2.5))/3.33)+0.8)-0.5)) + ($create_throws) + ($create_shoot * ((((tanh((($create_height-180)/3)-2.5))/6.6)+0.85)+(((-tanh((($create_height-200)/3)-2.5))/6.6)+0.85)-1)) + ($create_experience * 0.5) + ($create_def)) *4;
$create_wage = (($waw*$waw*$waw)/225000)-7500;
if ($create_wage < 200) {$create_wage=200;}

//barva koze
$randcol=mt_rand(0,300);
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
$def_temp = mt_rand(0,7);
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
$def_temp = mt_rand(0,5);
if ($def_temp == 0){require('../obrazi/kreate/create_br1.php');}
if ($def_temp == 1){require('../obrazi/kreate/create_br2.php');}
if ($def_temp == 2){require('../obrazi/kreate/create_br4.php');}
if ($def_temp == 3){require('../obrazi/kreate/create_br5.php');}
if ($def_temp == 4){require('../obrazi/kreate/create_br6.php');}
if ($def_temp == 5){require('../obrazi/kreate/create_br7.php');}
break;
CASE 2:
$def_temp = mt_rand(0,6);
if ($def_temp == 0){require('../obrazi/kreate/create_bl1.php');}
if ($def_temp == 1){require('../obrazi/kreate/create_bl2.php');}
if ($def_temp == 2){require('../obrazi/kreate/create_bl3.php');}
if ($def_temp == 3){require('../obrazi/kreate/create_bl4.php');}
if ($def_temp == 4){require('../obrazi/kreate/create_bl5.php');}
if ($def_temp == 5){require('../obrazi/kreate/create_bl6.php');}
if ($def_temp == 6){require('../obrazi/kreate/create_bl8.php');}
break;
}
$result = mysql_query("SELECT name FROM names WHERE country='$create_country' ORDER BY RAND() LIMIT 1") or die(mysql_error());
while ($random_name = mysql_fetch_array($result, MYSQL_ASSOC))
   {   foreach ($random_name as $random_name_value)
   {$random_name_value; }     } ;
$result = mysql_query("SELECT surname FROM surnames WHERE country='$create_country' ORDER BY RAND() LIMIT 1") or die(mysql_query());
while ($random_surname = mysql_fetch_array($result, MYSQL_ASSOC))
   {   foreach ($random_surname as $random_surname_value)
   {$random_surname_value; }     } ;

/*
echo "<b>".$random_name_value." \n";
echo $random_surname_value."</b><br>\n";
echo $create_age." years old\n";
echo " from ".$create_country."<br>\n";
echo "This player is ".$random_char_value.".<br>\n";
echo "Height: ".$create_height." cm |\n";
echo "Weight: ".$create_weight." kg\n";
echo "<p/><table>";
echo "<tr><td width=125>Ballhandling: ".$create_handling."</td>";
echo "<td>Quickness: ".$create_speed."</td></tr>";
echo "<tr><td>Passing: ".$create_pass."</td>";
echo "<td>Dribbling: ".$create_vision."</td></tr>";
echo "<tr><td>Rebounding: ".$create_rebound."</td>";
echo "<td>Positioning: ".$create_position."</td></tr>";
echo "<tr><td>Free throws: ".$create_throws."</td>";
echo "<td>Shooting: ".$create_shoot."</td></tr>";
echo "<tr><td>Defense: ".$create_def."</td>";
echo "<td>Work rate: ".$create_workrate."</td></tr>";
echo "<tr><td>Experience: ".$create_experience."</td>";
echo "<td>Tiredness: 0%</td></tr>";
echo "</table><p>";
echo "Weekly salary: ".$create_wage." euro\n</p>";
*/
$create_player_request = "INSERT INTO players (name, surname, age, club, country, charac, height, weight, handling, speed, passing, vision, rebounds, position, freethrow, shooting, defense, workrate, experience, fatigue, isonsale, wage, coach, orient, quality, price, motiv, has_played, last_position, face, ears, mouth, eyes, nose, mustage, hair, star_qual, star_posit, last_training, injury)

VALUES (

'$random_name_value', '$random_surname_value', $create_age, 99999, '$create_country', $create_char, $create_height, $create_weight, $create_handling, $create_speed, $create_pass, $create_vision, $create_rebound, $create_position, $create_throws, $create_shoot, $create_def, $create_workrate, $create_experience, 0, 0, $create_wage, 0, 0, 0, 0, 0, 0, 1, '$kepalacak', '$telingacak', '$mulutacak', '$matacak', '$hidungacak', '$kumisacak', '$rambutacak', 0, 0, 0, 0);";

$result = mysql_query($create_player_request) or die(mysql_error());
if($result){echo "SUCCESS! Player was inserted into database.<p/>";} else {echo "Failed";}

}
?>