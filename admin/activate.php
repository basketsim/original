<?php
include("common.php");
$teamid=$_GET['teamid'];

$result = mysql_query("SELECT `country`, `status`, `userid`, `email` FROM `teams`, `users` WHERE club=teamid AND `teamid`='$teamid' LIMIT 1") or die(mysql_error());
$create_country = mysql_result($result,0,"country");
$whatisstatus = mysql_result($result,0,"status");
if ($whatisstatus==1) {die("This club was already activated!<br><br/><a href=index.php>back</a>");}
if ($whatisstatus==3) {die("This club was already refused!<br><br/><a href=index.php>back</a>");}
$email_to = mysql_result($result,0,"email");
$userjevid = mysql_result($result,0,"userid");

/* zacetek loopa, ki bo ustvaril 12 igralcev) */

echo "<font color=red><b>DO NOT REFRESH THIS PAGE!</font><br/>Scroll down, check if everything is OK and use \"go back\" link.</b><br/><br/>";

$numbofplay=0;
while ($numbofplay < 12) {

$create_age = rand(17,29);
if ($create_age > 20) {$create_age = rand(16,24);}
if ($create_age > 22) {$create_age = rand(16,28);}
$create_char = rand(1,19);
$height_chance = rand(0,9);
if ($height_chance < 3) {$create_height = rand(169,198);} elseif ($height_chance > 2 AND $height_chance < 8) {$create_height = rand(191,211);} else {$create_height = rand(199,216);}
$create_weight = $create_height - rand(85,116);
$create_handling = rand(5,74);
$create_speed = rand(6,76);
$create_pass = rand(5,78);
$create_vision = rand(5,78);
$create_rebound = rand(5,78);
$create_position = rand(5,78);
$create_throws = rand(10,79);
$create_shoot = rand(5,78);
$create_def = rand(6,78);
$create_workrate = rand(10,109);
if ($create_workrate < 40 OR $create_workrate > 105) {$create_workrate = rand(16,112);}
if ($create_age < 18) {$create_experience = rand(5,40) * $create_age/85;} else {$create_experience = rand(50,99) * $create_age/49;}
if ($create_height > 200) {$create_handling=$create_handling-4; $create_speed=$create_speed-4; $create_pass=$create_pass-4; $create_rebound=$create_rebound+11; $create_throws=$create_throws-4; $create_vision=$create_vision-5; $create_shoot=$create_shoot-3;} else {$create_handling=$create_handling+12; $create_pass=$create_pass+12; $create_vision=$create_vision+12; $create_shoot=$create_shoot+5;}

//placa
$value5 = (($create_handling * (((-tanh((($create_height-190)/6)-2.5))/4)+0.75)) + ($create_speed * (((-tanh((($create_height-190)/6)-2.5))/10)+0.9)) + ($create_pass * (((-tanh((($create_height-190)/6)-2.5))/6.5)+0.75)) + ($create_vision * ((((tanh((($create_height-180)/3)-2.5))/20)+0.85)+(((-tanh((($create_height-200)/3)-2.5))/10)+0.8)-0.9)) + ($create_rebound * (((tanh((($create_height-185)/6)-2.5))/2.5)+0.6)) + ($create_position * ((((-tanh((($create_height-180)/3)-2.5))/6.6)+0.55)+(((tanh((($create_height-200)/3)-2.5))/3.33)+0.8)-0.5)) + ($create_throws) + ($create_shoot * ((((tanh((($create_height-180)/3)-2.5))/6.6)+0.85)+(((-tanh((($create_height-200)/3)-2.5))/6.6)+0.85)-1)) + ($create_experience * 0.5) + ($create_def)) *4;
$create_wage = (($value5 * $value5 * $value5) / 225000) - 7500;
if ($create_wage < 200) {$create_wage=200;}

//izločim predobre
if (($create_age==16 AND $create_wage < 7389 AND $create_wage > 3890) OR ($create_age==17 AND $create_wage < 9997 AND $create_wage > 6997) OR ($create_age==18 AND $create_wage < 19878 AND $create_wage > 12406) OR ($create_age > 18 AND $create_wage < 22999 AND $create_wage > 12920)) {

//barva koze
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

echo "<b>".$randomnameV." \n";
echo $randomsurnameV."</b><br>\n";
echo $create_age." years old\n";
echo " from ".$create_country."<br>\n";
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

$create_player_request = "INSERT INTO `players` (`name`, `surname`, age, club, `country`, charac, height, weight, handling, speed, passing, vision, rebounds, position, freethrow, shooting, defense, workrate, experience, fatigue, isonsale, wage, coach, orient, quality, price, motiv, has_played, last_position, `face`, `ears`, `mouth`, `eyes`, `nose`, `mustage`, `hair`, star_qual, star_posit, last_training, injury) VALUES ('$randomnameV', '$randomsurnameV', $create_age, $teamid, '$create_country', $create_char, $create_height, $create_weight, $create_handling, $create_speed, $create_pass, $create_vision, $create_rebound, $create_position, $create_throws, $create_shoot, $create_def, $create_workrate, $create_experience, 0, 0, $create_wage, 0, 0, 0, 0, 0, 0, 1, '$kepalacak', '$telingacak', '$mulutacak', '$matacak', '$hidungacak', '$kumisacak', '$rambutacak', 0, 0, 0, 0);";
$result = mysql_query($create_player_request) or die(mysql_error());
if($result){echo "SUCCESS! Player was inserted into database.<p/>";} else {echo "Failed";}

$numbofplay++;

}

}

/* konec loopa, 12 igralcev je narejenih */
$plaqer = mysql_query("SELECT id FROM players WHERE club=$teamid");
$pum=mysql_num_rows($plaqer) or die(mysql_error());
$p=0;
while ($p < $pum) {
$id=mysql_result($plaqer,$p);
$array_playerid[$p] = $id;
$p++;
}
mysql_query("INSERT INTO `tactics` VALUES ($teamid, $array_playerid[0], $array_playerid[1], $array_playerid[2], $array_playerid[3], $array_playerid[4], $array_playerid[5], $array_playerid[6], $array_playerid[7], $array_playerid[8], $array_playerid[9], $array_playerid[10], $array_playerid[11]);") or die(mysql_error());

mysql_query("UPDATE teams SET curmoney = curmoney + 3200000 WHERE teamid=$teamid LIMIT 1") or die(mysql_error());
$imekipe = mysql_query("SELECT name FROM teams WHERE teamid=$teamid LIMIT 1") or die(mysql_error());
while ($ime_ek = mysql_fetch_array($imekipe, MYSQL_ASSOC))
   {   foreach ($ime_ek as $ekipa_ime)
   {$ekipa_ime; }     } ;
mysql_query("UPDATE competition SET curname='$ekipa_ime' WHERE season=$suzona AND teamid=$teamid LIMIT 1") or die(mysql_error());
mysql_query("UPDATE teams SET status = 1 WHERE teamid=$teamid LIMIT 1") or die(mysql_error());
mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'Team was activated, 12 players have joined the club and starting money was received.', 0, 3200000);");
mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'Sponsors have provided the starting money in total of 3.200.000 &euro;.', 1, 0);");

//mailout
function send_mail($to, $body, $subject, $fromaddress, $fromname)
{
  $eol="\n";
  $headers .= "From: ".$fromname."<".$fromaddress.">".$eol;
  $headers .= "Reply-To: ".$fromname."<".$fromaddress.">".$eol;
  $headers .= "Return-Path: ".$fromname."<".$fromaddress.">".$eol;
  $headers .= "Message-ID: <".time()."-".$fromaddress.">".$eol;
  $headers .= "X-Mailer: PHP v".phpversion().$eol;          // These two to help avoid spam-filters
  $headers .= 'MIME-Version: 1.0'.$eol.$eol;
  $msg .= $body.$eol.$eol;
  ini_set(sendmail_from,$fromaddress);  // the INI lines are to force the From Address to be used !
  $mail_sent = mail($to, $subject, $msg, $headers);
  ini_restore(sendmail_from);
  return $mail_sent;
}
$message1 = "12 local players have signed contracts to play for your team. Sponsors have provided 3.200.000 as a club's starting money - they seem confident that you are the right person to bring success to the club! You can login to www.basketsim.com at any time to give your players instructions what to train and how to play. Don't forget to read the game rules and for any additional info, visit the in-game forums.";
$message2 = "Have fun!";
$message3 = "www.basketsim.com";
send_mail("$email_to", "Hello coach!\n\n$message1\n\n$message2\n$message3", "Basketsim team ready", "basketsim@basketsim.com", "Basketsim");

if ($create_country=='Bosnia') {mysql_query("INSERT INTO `conf_user_folder` (user_id, folder_id, join_date) VALUES ($userjevid, 'Bosnia and Herzegovina', NOW( ));");}
else {mysql_query("INSERT INTO `conf_user_folder` (user_id, folder_id, join_date) VALUES ($userjevid, '$create_country', NOW( ));");}

//sponsorship offer
$newspon=rand(1,15);
$zdaj = date("Y-m-d H:i:s");
$splitdatetime = explode(" ", $zdaj); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$zdajB = date("Y-m-d H:i:s", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday+6,$dbyear));
$uha = rand(155,195);
$stobrok=rand(8,10);
$uha = $uha * 0.8;
$enobrok = 100*$uha/10;
SWITCH ($stobrok) {
CASE 8: $konc = $enobrok * 800; break;
CASE 9: $konc = $enobrok * 900; break;
CASE 10: $konc = $enobrok * 1000; break;
}
$kdni=$stobrok*7;
mysql_query("INSERT INTO sponsors VALUES ('', '$newspon', '$userjevid', '$konc', '$stobrok', '$kdni', '$zdajB', '0')") or die(mysql_error());
//Allow conference access
mysql_query("UPDATE users SET level = 1 WHERE userid = $userjevid LIMIT 1") or die(mysql_error());
echo "<b>Team succesfully activated!</b><hr/>";
echo "<br/><b><a href=\"../redirect.php?teamid=",$teamid,"\">Visit team now!</a></b>";
?><br/><a href="manage.php">Back to list of teams waiting for activation</a>