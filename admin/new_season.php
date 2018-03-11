<?php
//INTRODUCTION
//league awards in separate script should be run before this (leagueends.php)
//make a fresh login and then close the page by disabling access to anyone who's not your userid
//you do this from inc/config.php
//downtime is perhaps not even needed by default, but the way updates were done before it was needed
//in case of downtime active transfers must be moved forward!!!
//make a very important note that league reports (admin/ligica.php) will have to be eventually moved back to 2x per week

ini_set("max_execution_time", 6500);
include_once("common.php");

/*
//WITH THIS YOU AGE PLAYERS AND REMOVE SPEED FOR OLD PLAYERS
//RUN EVERY LINE SEPARATELY AND EACH JUST ONCE!!!
mysql_query("UPDATE players SET age=age+1, fatigue=fatigue/2") or die("Ne updata igralcev.");
mysql_query("UPDATE players SET speed = speed - 15 where coach=0 and age > 38") or die("Ne updata igralcev.");
mysql_query("UPDATE players SET speed = speed - 12 where coach=0 and age=38") or die("Ne updata igralcev.");
mysql_query("UPDATE players SET speed = speed - 9 where coach=0 and age=37") or die("Ne updata igralcev.");
mysql_query("UPDATE players SET speed = speed - 6 where coach=0 and age=36") or die("Ne updata igralcev.");
die("lab");
*/

/*
//WITH THIS 18YEAR OLD YOUTH PLAYERS WILL JOIN THEIR TEAMS
//DELETE ANY REMAINING 18YO FROM BUY YOUTH
//SELECT * FROM `players` WHERE `age` =18 AND `club` >0 AND `wage` =16000 AND `coach` =9 AND `motiv` =1 ORDER BY `handling` + `speed` + `passing` + `vision` + `rebounds` + `position` + `freethrow` + `shooting` + `defense` + `workrate` + `experience` DESC LIMIT 400
//below lines can be applied for players who were just 1 week away from promoting skill
//UPDATE players SET handling=41 WHERE age =18 AND coach =9 AND wage =16000 AND motiv =1 AND price =1 AND handling =0
//UPDATE players SET speed=41 WHERE age =18 AND coach =9 AND wage =16000 AND motiv =1 AND price =2 AND speed =0
//UPDATE players SET passing=41 WHERE age =18 AND coach =9 AND wage =16000 AND motiv =1 AND price =3 AND passing =0
//UPDATE players SET vision=41 WHERE age =18 AND coach =9 AND wage =16000 AND motiv =1 AND price =4 AND vision =0
//UPDATE players SET rebounds=49 WHERE age =18 AND coach =9 AND wage =16000 AND motiv =1 AND price =5 AND rebounds =0
//UPDATE players SET position=41 WHERE age =18 AND coach =9 AND wage =16000 AND motiv =1 AND price =6 AND position =0
//UPDATE players SET shooting=41 WHERE age =18 AND coach =9 AND wage =16000 AND motiv =1 AND price =7 AND shooting =0
//UPDATE players SET freethrow=41 WHERE age =18 AND coach =9 AND wage =16000 AND motiv =1 AND price =8 AND freethrow =0
//UPDATE players SET defense=41 WHERE age =18 AND coach =9 AND wage =16000 AND motiv =1 AND price =9 AND defense =0
$result = mysql_query("SELECT userid, id, users.club as club, teams.country as country, teams.name as name, height, handling, speed, passing, vision, rebounds, position, freethrow, shooting, defense, workrate, experience, quality FROM players, users, teams WHERE users.club=players.club AND teams.teamid=users.club AND age=18 and coach=9") or die (mysql_error());
while($r=mysql_fetch_array($result)) {
$uzzer=$r["userid"];
$playerid=$r["id"];
$clubname=$r["name"];
$club=$r["club"];
$country=$r["country"];
$height=$r["height"];
$handling=$r["handling"];
$speed=$r["speed"];
$passing=$r["passing"];
$vision=$r["vision"];
$rebounds=$r["rebounds"];
$position=$r["position"];
$freethrow=$r["freethrow"];
$shooting=$r["shooting"];
$defense=$r["defense"];
$workrate=$r["workrate"];
$experience=$r["experience"];
$hawr=$r["quality"];
$izhod1 = $handling+$speed+$passing+$vision+$rebounds+$position+$freethrow+$shooting+$defense;
if ($izhod1 < 180 AND $hawr < 51) {$spod=19; $zgor=58;}
elseif ($izhod1 > 179 AND $izhod1 < 301 AND $hawr < 51) {$spod=18; $zgor=55;}
elseif ($izhod1 > 179 AND $izhod1 < 301 AND $hawr > 81) {$spod=8; $zgor=48;}
elseif ($izhod1 < 180 AND $hawr > 50 AND $hawr < 82) {$spod=17; $zgor=55;}
elseif ($izhod1 > 300 AND $hawr > 81) {$spod=9; $zgor=41;}
else {$spod=14; $zgor=49;}
if ($izhod1 > 477) {$zgor=$zgor-11;}
if ($handling==0) {$new_handling=rand($spod,$zgor);} else {$new_handling=$handling;}
if ($speed==0) {$new_speed=rand($spod,$zgor);} else {$new_speed=$speed;}
if ($passing==0) {$new_passing=rand($spod,$zgor);} else {$new_passing=$passing;}
if ($vision==0) {$new_vision=rand($spod,$zgor);} else {$new_vision=$vision;}
if ($rebounds==0) {$new_rebounds=rand($spod,$zgor);} else {$new_rebounds=$rebounds;}
if ($position==0) {$new_position=rand($spod,$zgor);} else {$new_position=$position;}
if ($freethrow==0) {$new_freethrow=rand($spod,$zgor);} else {$new_freethrow=$freethrow;}
if ($shooting==0) {$new_shooting=rand($spod,$zgor);} else {$new_shooting=$shooting;}
if ($defense==0) {$new_defense=rand($spod,$zgor);} else {$new_defense=$defense;}
$value5 = ($height * 2) + $new_handling + ($new_speed * 4) + ($new_passing * 2) + ($new_vision * 2) + ($new_rebounds * 3) + ($new_position * 4) + ($new_freethrow * 3) + ($new_shooting * 4) + ($experience * 2) + ($new_defense * 3);
$value5 = (($value5 * $value5 * $value5) / 225000) - 7500;
if ($value5 < 200) {$value5=200;}
$value = ((($value5/9)*($value5/9))/15)*(($value5/240000+(1/(exp(pow(((18-16)/10),4.1)))))*(((($hawr/8)+1)/19)+1))*((sqrt($value5/180000))/((((tanh(((18/2)-10))/2)+0.5)*0.71)+0.29));
if ($value < 1000) {$value=1000;}
//update igralca
$resultYC = mysql_query("UPDATE players SET handling=$new_handling, speed=$new_speed, passing=$new_passing, vision=$new_vision, rebounds=$new_rebounds, position=$new_position, freethrow=$new_freethrow, shooting=$new_shooting, defense=$new_defense, workrate=$hawr, wage = $value5, coach=0, quality=0, price=0, motiv=0, shirt=NULL WHERE id=$playerid LIMIT 1") or die (mysql_error());
if($resultYC){
$cenaza = round(0.15*$value);
$cenapr = number_format($cenaza, 0, ',', '.');
$cenane = 0-$cenaza;
mysql_query("UPDATE teams SET curmoney=curmoney-$cenaza WHERE teamid=$club LIMIT 1") or die(mysql_error());
mysql_query("INSERT INTO events VALUES ('', $club, NOW(), 'After reaching 18 years of age, <a href=player.php?playerid=$playerid>player</a> was promoted from youth to senior team at a cost of $cenapr &euro;.', 1, $cenane);");
$pos=rand(1,5); $ftime = time(); $fyear=date('Y', $ftime); $fmonth=date('m', $ftime); $fday=date('d', $ftime); $fhour=date('H', $ftime); $fmin=date('i', $ftime); $fsec=date('s', $ftime);
mysql_query("INSERT INTO transfers VALUES ('', $playerid, 'Youth camp', 0, '$country', 0, $pos, '$fyear=$fmonth=$fday $fhour+$fmin+$fsec', 1, $uzzer, '$clubname', 0, $value);");
}
}
die("18 year olds to seniors done! comment back");
*/

/*
//basic creation of college players - TURN OFF BAM if it's working
//this creation requires significant amount of adjustment later on to get the best results for clubs

$mladinci = mysql_query("SELECT teamid, country, schoolinvest FROM teams WHERE status=1 AND schoolinvest > 1") or die(mysql_error());
$stekip = mysql_num_rows($mladinci);
$se=0;
while ($se < $stekip){
$teamid = mysql_result($mladinci,$se,"teamid");
$country = mysql_result($mladinci,$se,"country");
$schoolinvest = mysql_result($mladinci,$se,"schoolinvest");
$create_age = rand(20,21); if ($create_age==21) {$create_age = rand(20,21);}
$create_char = rand(1,19); $height_chance = rand(0,9);
if ($height_chance < 2) {$create_height = rand(176,208);} elseif ($height_chance > 1 AND $height_chance < 7) {$create_height = rand(186,212);} else {$create_height = rand(200,219);}
$create_weight = $create_height - rand(85,118);
SWITCH ($schoolinvest) {
CASE 250000:
$create_handling = rand(33,83);
$create_speed = rand(35,83);
$create_pass = rand(34,83);
$create_vision = rand(30,83);
$create_rebound = rand(29,84);
$create_position = rand(35,83);
$create_throws = rand(35,86);
$create_shoot = rand(33,84);
$create_def = rand(33,84);
if ($create_height > 199) {$create_rebound=$create_rebound+13; $create_handling=$create_handling-13; $create_speed=$create_speed-8;}
elseif ($create_height < 200) {$create_handling=$create_handling+10; $create_vision=$create_vision+10; $create_pass=$create_pass+10; $create_rebound=$create_rebound-12;}
$dlaka1 = $create_handling+$create_speed+$create_pass+$create_vision+$create_rebound+$create_position+$create_throws+$create_shoot+$create_def;
if ($dlaka1 < 500) {$create_workrate=rand(76,111); $create_experience = rand(21,32);}
elseif ($dlaka1 > 600) {$create_workrate=rand(46,75); $create_experience = rand(16,24);}
else {$create_workrate=rand(62,96); $create_experience = rand(15,30);}
break;
CASE 750000:
$create_handling = rand(38,93);
$create_speed = rand(37,94);
$create_pass = rand(34,96);
$create_vision = rand(29,90);
$create_rebound = rand(32,93);
$create_position = rand(37,90);
$create_throws = rand(40,95);
$create_shoot = rand(39,96);
$create_def = rand(37,93);
if ($create_height > 199) {$create_rebound=$create_rebound+16; $create_handling=$create_handling-12; $create_speed=$create_speed-8;}
elseif ($create_height < 200) {$create_handling=$create_handling+12; $create_vision=$create_vision+12; $create_pass=$create_pass+12; $create_rebound=$create_rebound-12;}
$dlaka1 = $create_handling+$create_speed+$create_pass+$create_vision+$create_rebound+$create_position+$create_throws+$create_shoot+$create_def;
if ($dlaka1 < 539) {$create_workrate=rand(86,120); $create_experience = rand(26,40);}
elseif ($dlaka1 > 631) {$create_workrate=rand(55,85); $create_experience = rand(19,36);}
else {$create_workrate=rand(72,106); $create_experience = rand(23,40);}
break;
}
$randcol=rand(0,300);
if ($country=='Brazil' OR $country=='USA' OR $country=='Colombia'){
if ($randcol < 120) {$skincolor = 0;}
elseif ($randcol > 119 AND $randcol < 180) {$skincolor = 1;}
else {$skincolor = 2;}
}
if ($country=='United Kingdom' OR $country=='France' OR $country=='Netherlands' OR $country=='Canada'){
if ($randcol < 210) {$skincolor = 0;}
elseif ($randcol > 209 AND $randcol < 240) {$skincolor = 1;}
else {$skincolor = 2;}
}
if ($country=='Puerto Rico' OR $country=='India' OR $country=='Indonesia' OR $country=='Mexico' OR $country=='Philippines' OR $country=='Thailand'){
if ($randcol < 50) {$skincolor = 0;}
elseif ($randcol > 49 AND $randcol < 285) {$skincolor = 1;}
else {$skincolor = 2;}
}
if ($country=='Malaysia' OR $country=='Venezuela' OR $country=='Uruguay' OR $country=='Tunisia' OR $country=='Egypt' OR $country=='Turkey' OR $country=='Chile' OR $country=='Montenegro' OR $country=='Peru' OR $country=='Argentina' OR $country=='Portugal' OR $country=='Israel' OR $country=='Romania' OR $country=='Bulgaria' OR $country=='Greece' OR $country=='Bosnia' OR $country=='Albania' OR $country=='Germany' OR $country=='Belgium' OR $country=='Serbia' OR $country=='Spain' OR $country=='Italy'){
if ($randcol < 270) {$skincolor = 0;}
elseif ($randcol > 269 AND $randcol < 297) {$skincolor = 1;}
else {$skincolor = 2;}
}
if ($country=='Belarus' OR $country=='Japan' OR $country=='Georgia' OR $country=='New Zealand' OR $country=='Austria' OR $country=='Ireland' OR $country=='Hong Kong' OR $country=='South Korea' OR $country=='Phillipines' OR $country=='Norway' OR $country=='China' OR $country=='Malta' OR $country=='Croatia' OR $country=='Russia' OR $country=='Switzerland' OR $country=='Cyprus' OR $country=='Denmark' OR $country=='Slovakia' OR $country=='Sweden' OR $country=='FYR Macedonia' OR $country=='Australia' OR $country=='Czech Republic' OR $country=='Hungary' OR $country=='Finland' OR $country=='Estonia' OR $country=='Ukraine' OR $country=='Slovenia' OR $country=='Poland' OR $country=='Latvia' OR $country=='Lithuania') {
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
$result = mysql_query("SELECT name FROM names WHERE country='$country' ORDER BY RAND() LIMIT 1") or die(mysql_error());
while ($random_name = mysql_fetch_array($result, MYSQL_ASSOC))
   {   foreach ($random_name as $random_name_value)
   {$random_name_value; }     } ;
$result = mysql_query("SELECT surname FROM surnames WHERE country='$country' ORDER BY RAND() LIMIT 1") or die(mysql_query());
while ($random_surname = mysql_fetch_array($result, MYSQL_ASSOC))
   {   foreach ($random_surname as $random_surname_value)
   {$random_surname_value; }     } ;
$value5 = ($create_height * 2) + $create_handling + ($create_speed * 4) + ($create_pass * 2) + ($create_vision * 2) + ($create_rebound * 3) + ($create_position * 4) + ($create_throws * 3) + ($create_shoot * 4) + ($create_experience * 2) + ($create_def * 3);
$create_wage = (($value5 * $value5 * $value5) / 225000) - 7500; if ($create_wage < 200) {$create_wage=200;}
mysql_query("LOCK TABLES players WRITE");
$create_player = "INSERT INTO players (name, surname, age, club, country, charac, height, weight, handling, speed, passing, vision, rebounds, position, freethrow, shooting, defense, workrate, experience, fatigue, isonsale, wage, coach, orient, quality, price, motiv, has_played, last_position, face, ears, mouth, eyes, nose, mustage, hair, star_qual, star_posit, last_training, injury) VALUES ('$random_name_value', '$random_surname_value', $create_age, $teamid, '$country', $create_char, $create_height, $create_weight, $create_handling, $create_speed, $create_pass, $create_vision, $create_rebound, $create_position, $create_throws, $create_shoot, $create_def, $create_workrate, $create_experience, 0, 0, $create_wage, 0, 0, 0, 0, 0, 0, 1, '$kepalacak', '$telingacak', '$mulutacak', '$matacak', '$hidungacak', '$kumisacak', '$rambutacak', 0, 0, 0, 0);";
$result = mysql_query($create_player) or die(mysql_error());
$newplayer = mysql_insert_id();
mysql_query("UNLOCK TABLES");
mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), '<a href=player.php?playerid=$newplayer>Player</a> was sent to you from the nearby college.', 0, 0);");
$namesee = mysql_query("SELECT name FROM teams WHERE teamid=$teamid") or die (mysql_error()); $namesee2 = mysql_result($namesee,0);
$query2 = mysql_query("SELECT userid FROM users WHERE club=$teamid") or die (mysql_error()); $linkkluba = mysql_result($query2,0);
$ranpos=rand(1,5); $ftime = time(); $fyear=date('Y', $ftime); $fmonth=date('m', $ftime); $fday=date('d', $ftime); $fhour=date('H', $ftime); $fmin=date('i', $ftime); $fsec=date('s', $ftime);
$freetransf = "INSERT INTO transfers VALUES ('', $newplayer, 'College Team', 0, '$country', 0, $ranpos, '$fyear=$fmonth=$fday $fhour+$fmin+$fsec', 1, $linkkluba, '$namesee2', 0, 0);";
mysql_query($freetransf);
$se++;
}
die("COLLEGE PLAYERS CREATED - NOW TO ADJUSTMENTS");
//SELECT * FROM `players` , teams WHERE `id` >XXX AND coach =0 AND club = teamid AND schoolinvest =250000 ORDER BY wage DESC LIMIT 600 
//line below can be tweaked for removing skills for players that are too good and adding for too weak
//this is a bit demanding task, it's very difficult to explain how it's sufficiently done
//UPDATE players,teams SET position=position-4, passing=passing-1, workrate=workrate-1  WHERE id >3717259 AND coach=0 AND club=teamid AND schoolinvest=800000 AND wage > 66000
//SELECT * , ((((((((`height`*2) + `handling` + (`speed`*4) + (`passing`*2) + (`vision`*2) + (`rebounds`*3) + (`position`*4) + (`freethrow`*3) + (`shooting`*4) + (`experience`*2) + (`defense`*3)) * ((`height`*2) + `handling` + (`speed`*4) + (`passing`*2) + (`vision`*2) + (`rebounds`*3) + (`position`*4) + (`freethrow`*3) + (`shooting`*4) + (`experience`*2) + (`defense`*3)) * ((`height`*2) + `handling` + (`speed`*4) + (`passing`*2) + (`vision`*2) + (`rebounds`*3) + (`position`*4) + (`freethrow`*3) + (`shooting`*4 ) + (`experience`*2 ) + (`defense`*3 ))) /225000) -7500) /9) * ((((((`height`*2) + `handling` + (`speed`*4) + (`passing`*2) + (`vision`*2) + (`rebounds`*3) + (`position`*4 ) + (`freethrow`*3 ) + (`shooting`*4) + (`experience`*2) + (`defense`*3 )) * ((`height`*2) + `handling` + (`speed`*4 ) + (`passing`*2 ) + (`vision`*2) + (`rebounds`*3 ) + (`position`*4) + (`freethrow`*3 ) + (`shooting`*4 ) + (`experience`*2 ) + (`defense`*3 )) * ((`height`*2) + `handling` + (`speed`*4) + (`passing`*2) + (`vision`*2) + (`rebounds`*3) + (`position`*4) + (`freethrow`*3) + (`shooting`*4) + (`experience`*2) + (`defense`*3))) /225000) -7500) /9)) /15) * ( 1 + ((`workrate` /9) /16)) * (( 210 / `age`) /13) AS ev FROM `players` , teams WHERE `id` >3964379 AND coach =0 AND club = teamid AND schoolinvest =750000 ORDER BY ((((((((`height`*2) + `handling` + (`speed`*4) + (`passing`*2 ) + (`vision`*2) + (`rebounds`*3) + (`position`*4) + (`freethrow` *3) + (`shooting`*4 ) + (`experience`*2 ) + (`defense`*3 )) * ((`height`*2) + `handling` + (`speed`*4 ) + (`passing`*2 ) + (`vision`*2) + (`rebounds`*3 ) + (`position`*4 ) + (`freethrow`*3 ) + (`shooting` *4 ) + (`experience`*2 ) + (`defense`*3 )) * ((`height`*2) + `handling` + (`speed`*4 ) + (`passing`*2 ) + (`vision`*2 ) + (`rebounds`*3) + (`position`*4 ) + (`freethrow`*3 ) + (`shooting`*4 ) + (`experience`*2 ) + (`defense`*3 ))) /225000) -7500) /9) * ((((((`height`*2) + `handling` + (`speed`*4 ) + (`passing`*2 ) + (`vision`*2) + (`rebounds`*3) + (`position`*4) + (`freethrow`*3) + (`shooting`*4) + (`experience`*2 ) + (`defense`*3 )) * ((`height`*2) + `handling` + (`speed`*4 ) + (`passing`*2 ) + (`vision`*2) + (`rebounds`*3) + (`position`*4) + (`freethrow`*3 ) + (`shooting`*4 ) + (`experience`*2) + (`defense`*3)) * ((`height`*2) + `handling` + (`speed`*4) + (`passing`*2) + (`vision`*2) + (`rebounds`*3) + (`position`*4) + (`freethrow`*3) + (`shooting`*4) + (`experience`*2) + (`defense`*3))) /225000) -7500) /9)) /15) * ( 1 + ((`workrate` /9) /16)) * (( 210 / `age`) /13) DESC LIMIT 3000
//this is also tweaking line, all the proper conditions should be taken into account
//UPDATE players,teams SET position=position+2, workrate=workrate+2, shooting=shooting+3, passing=passing+3, speed=speed+3 WHERE id >4568030 AND coach =0 AND club = teamid AND schoolinvest =750000 AND `handling` + `speed` + `passing` + `vision` + `rebounds` + `position` + `freethrow` + `shooting` + `defense` + `workrate` + `experience` <705
*/

/*
//UPDATE OF SALARIES - QUERY SPLIT TO SEGMENTS DUE TO DB RESTRICTIONS
//$groza = mysql_query("SELECT `id`, `height`, `handling`, `speed`, `passing`, `vision`, `rebounds`, `position`, `freethrow`, `shooting`, `defense`, `experience` FROM `players` WHERE `coach`=0 and id < 1000000");
//$groza = mysql_query("SELECT `id`, `height`, `handling`, `speed`, `passing`, `vision`, `rebounds`, `position`, `freethrow`, `shooting`, `defense`, `experience` FROM `players` WHERE `coach`=0 and id > 999999 AND id < 2000000");
//$groza = mysql_query("SELECT `id`, `height`, `handling`, `speed`, `passing`, `vision`, `rebounds`, `position`, `freethrow`, `shooting`, `defense`, `experience` FROM `players` WHERE `coach`=0 and id > 1999999 AND id < 3000000");
//$groza = mysql_query("SELECT `id`, `height`, `handling`, `speed`, `passing`, `vision`, `rebounds`, `position`, `freethrow`, `shooting`, `defense`, `experience` FROM `players` WHERE `coach`=0 and id > 2999999 AND id < 4000000");
$groza = mysql_query("SELECT `id`, `height`, `handling`, `speed`, `passing`, `vision`, `rebounds`, `position`, `freethrow`, `shooting`, `defense`, `experience` FROM `players` WHERE `coach`=0 and id > 3999999");
while($r=mysql_fetch_array($groza)) {
$id=$r["id"];
$height=$r["height"];
$handling=$r["handling"];
$speed=$r["speed"];
$passing=$r["passing"];
$vision=$r["vision"];
$rebounds=$r["rebounds"];
$position=$r["position"];
$freethrow=$r["freethrow"];
$shooting=$r["shooting"];
$defense=$r["defense"];
$experience=$r["experience"];
$w = (($handling * (((-tanh((($height-190)/6)-2.5))/4)+0.75)) + ($speed * (((-tanh((($height-190)/6)-2.5))/10)+0.9)) + ($passing * (((-tanh((($height-190)/6)-2.5))/6.5)+0.75)) + ($vision * ((((tanh((($height-180)/3)-2.5))/20)+0.85)+(((-tanh((($height-200)/3)-2.5))/10)+0.8)-0.9)) + ($rebounds * (((tanh((($height-185)/6)-2.5))/2.5)+0.6)) + ($position * ((((-tanh((($height-180)/3)-2.5))/6.6)+0.55)+(((tanh((($height-200)/3)-2.5))/3.33)+0.8)-0.5)) + ($freethrow) + ($shooting * ((((tanh((($height-180)/3)-2.5))/6.6)+0.85)+(((-tanh((($height-200)/3)-2.5))/6.6)+0.85)-1)) + ($experience * 0.5) + ($defense)) *4;
$w = (($w*$w*$w)/225000)-7500;
mysql_query("UPDATE `players` SET `wage`='$w' WHERE `coach`=0 AND `id`=$id LIMIT 1") or die("No wage update!");
}
die("wages for type 0 updated - 5 STEPS!!!");
//UPDATE `players` SET `wage`=(experience*(100*quality - 4000))/2 WHERE coach =1 AND wage+1 < (experience*(100*quality - 4000))/2
//UPDATE `players` SET `wage`=200 WHERE `wage`<200
//below is needed because 201 wage players are needed for specific processes in the game
//UPDATE `players` set `wage`=201 WHERE `wage`=200 and club=0 and coach=0 and age < 39
//UPDATE `players` SET `wage`=1000 WHERE age=15 and coach=9
//UPDATE `players` SET `wage`=4000 WHERE age=16 and coach=9
//UPDATE `players` SET `wage`=16000 WHERE age=17 and coach=9
*/

/*
//update of transfer value of college players once their skills were finalized
$d = mysql_query("SELECT * FROM players WHERE id >4631128 AND coach =0 AND age >19 AND age <22") or die(mysql_error());
while ($r=mysql_fetch_array($d)) {
$id = $r["id"];
$age=$r["age"];
$height=$r["height"];
$weight=$r["weight"];
$handling=$r["handling"];
$speed=$r["speed"];
$passing=$r["passing"];
$vision=$r["vision"];
$rebounds=$r["rebounds"];
$position=$r["position"];
$freethrow=$r["freethrow"];
$shooting=$r["shooting"];
$defense=$r["defense"];
$workrate=$r["workrate"];
$experience=$r["experience"];
$fatigue=$r["fatigue"];
$wage=$r["wage"];
$value5 = ($height * 2) + $handling + ($speed * 4) + ($passing * 2) + ($vision * 2) + ($rebounds * 3) + ($position * 4) + ($freethrow * 3) + ($shooting * 4) + ($experience * 2) + ($defense * 3);
$value5 = (($value5 * $value5 * $value5) / 225000) - 7500;
if ($value5 < 200) {$value5=200;}
$value = ((($value5/9)*($value5/9))/15)*(($value5/240000+(1/(exp(pow((($age-16)/10),4.1)))))*(((($workrate/8)+1)/19)+1))*((sqrt($value5/180000))/((((tanh((($age/2)-10))/2)+0.5)*0.71)+0.29));
if ($value < 1000) {$value=1000;}
mysql_query("UPDATE transfers SET EV = '$value' WHERE playerid = '$id'") or die(mysql_error());
}
die("yeah");
*/

/*
//GENERAL, RESETING CHEERLEADERS VALUES ETC.
mysql_query("UPDATE teams SET youthcamp=0, schoolinvest=0, draft=0") or die("Ne updata ekip.");
$enaaa = rand(990,1509);
mysql_query("UPDATE arena SET week_ideal = seats1 * 1.8 + seats2 * 1.4 + seats3 * 0.7 + seats4 * 0.2 + $enaaa, cheer_season=0, season_ideal=0") or die("Ne updata arene.");
mysql_query("UPDATE arena, teams SET seats1=1000, seats2=500, seats3=0, seats4=0, in_use=100, `upgrading`='0000-00-00', `cheer_name`='', `cheer_logo`='' WHERE arena.teamid = teams.teamid AND teams.`status`=3") or die(mysql_error());
die("THATSIT");
*/

/*
//--------------------------------
//MOVING THE TEAMS BETWEEN LEAGUES
//--------------------------------
//v playoffs tabelo naselim zmagovalce VS direktno izpadle
$izbor = mysql_query("SELECT DISTINCT country FROM teams");
$k=0;
while ($k < mysql_num_rows($izbor)) {
$country = mysql_result($izbor,$k);
//izberem prvouvrscene
$prvouvrsceni = mysql_query("SELECT competition.teamid AS ekipa, competition.curname AS ime FROM competition, teams, leagues WHERE teams.teamid = competition.teamid AND competition.leagueid = leagues.leagueid AND teams.country = '$country' AND competition.position =1 AND competition.season =$suzona ORDER BY LEVEL ASC , `position` ASC , `win` DESC , `difference` DESC , `for_` DESC") or die(mysql_error());
$num = mysql_num_rows($prvouvrsceni);
$i=1; //prva liga odpade
while ($i < $num){
$ekipa = mysql_result($prvouvrsceni,$i,"ekipa");
$ime = mysql_result($prvouvrsceni,$i,"ime");
$ime = addslashes($ime);
//zapis
$insertq = "INSERT INTO playoffs VALUES ('', $ekipa, '$ime', 0, '', '$country', 20, 0, 0, 0, 0);";
mysql_query($insertq) or die(mysql_error());
$i++;
}
//dodam izpadle
$obstanek = mysql_query("SELECT competition.teamid AS ekipa2, competition.curname AS ime2 FROM competition, teams, leagues WHERE teams.teamid = competition.teamid AND competition.leagueid = leagues.leagueid AND teams.country = '$country' AND competition.position > 11 AND competition.season =$suzona ORDER BY LEVEL ASC , `position` DESC , `win` ASC , `difference` ASC , `for_` ASC") or die(mysql_error());
$num = mysql_num_rows($obstanek);
$i=0;
while ($i < $num){
$ekipa2 = mysql_result($obstanek,$i,"ekipa2");
$ime2 = mysql_result($obstanek,$i,"ime2");
$ime2 = addslashes($ime2);
//zapis
mysql_query("UPDATE playoffs SET team2 = $ekipa2, name2 = '$ime2' WHERE team2 = 0 ORDER BY id ASC LIMIT 1");
$i++;
}
$k++;
}
die("SHOULD BE ALL GOOD");
*/

/*
$seasonicca = 22; //PUT NEW SEASON, SO LAST ONE + 1 !!!!!  +  TEMPORARY INDEX ON season IN table COMPETITION helps a bit with the speed of this slow query
$tekmovanja = mysql_query("SELECT leagueid, teamid, curname FROM competition WHERE season=$suzona") or die(mysql_error());
while ($t = mysql_fetch_array($tekmovanja)) {
$leagueid = $t['leagueid'];
$teamid = $t['teamid'];
$curname = $t['curname'];
$curname = addslashes($curname);
//first
//update playoffs with leagueids
mysql_query("UPDATE playoffs SET topleague=$leagueid WHERE team1=$teamid") or die("pp");
mysql_query("UPDATE playoffs SET bottomleague=$leagueid WHERE team2=$teamid") or die("ff");
//following
//ENTRIES FOR NEW SEASON
$sql = "INSERT INTO competition VALUES ($leagueid, $teamid, '$curname', $seasonicca, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
mysql_query($sql) or die(mysql_error());
}
$premiki = mysql_query("SELECT team1, team2, homescore, awayscore, topleague, bottomleague FROM playoffs") or die("Ne bere iz playoffov.");
$ste = mysql_num_rows($premiki);
$p=0;
while ($p < $ste){
$team1 = mysql_result($premiki,$p,"team1");
$team2 = mysql_result($premiki,$p,"team2");
$homescore = mysql_result($premiki,$p,"homescore");
$awayscore = mysql_result($premiki,$p,"awayscore");
$topleague = mysql_result($premiki,$p,"topleague");
$bottomleague = mysql_result($premiki,$p,"bottomleague");
//end of movements
if ($homescore > $awayscore){
//BE CAREFUL - TOP & BOTTOM LEAGUE ARE NAMED WRONGLY IN MYSQL, BUT NO WORRIES, THIS MUST JUST BE RUN AS IT IS
//update
mysql_query("UPDATE competition SET leagueid = $bottomleague WHERE season=$seasonicca AND teamid=$team1");
mysql_query("UPDATE competition SET leagueid = $topleague WHERE season=$seasonicca AND teamid=$team2");
}
$p++;
}
$ena = mysql_query("SELECT DISTINCT country AS country FROM regions");
while ($a = mysql_fetch_array($ena)){
$country = $a["country"];
$lige = mysql_query("SELECT DISTINCT leagues.leagueid AS leid FROM leagues, competition WHERE leagues.country='$country' AND leagues.leagueid = competition.leagueid AND competition.season=$seasonicca") or die(mysql_error());
while ($r=mysql_fetch_array($lige)) {
$leagueid = $r["leid"];
$ekipevligi = mysql_query("SELECT teamid FROM competition WHERE season=$seasonicca AND leagueid='$leagueid' ORDER BY win DESC, difference DESC, for_ DESC") or die("Ne bere ekip v neki ligi.");
$p=0;
while ($p < 14){
$teamid=mysql_result($ekipevligi,$p,"teamid");
$position=$p+1;
mysql_query("UPDATE competition SET position='$position' WHERE season=$seasonicca AND teamid='$teamid' LIMIT 1") or die("Ne updata mest ekip.");
$p++;
}
}
}
die("UNCOMMENT DRAFT IN DAILY UPDATE + DISABLE FPC CRONS + MAKE URGENT NOTE FOR CUP CRONS!!!");
*/
?>