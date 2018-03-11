<?php
//TOKENS ARE DISABLED WHEN VALUE IS NOT 454
$KRNEKI=4554;

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$comparep = mysql_query("SELECT club, lang, name, curmoney, status, `draft`, campinvest, youthcamp, schoolinvest, seats1+seats2+seats3+seats4 AS sedezi FROM users, teams, arena WHERE users.club = teams.teamid AND teams.teamid = arena.teamid AND password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($comparep)){
$trueclub = mysql_result($comparep,0,"club");
$lang = mysql_result ($comparep,0,"lang");
$ime_kluba = mysql_result ($comparep,0,"name");
$madenar = mysql_result ($comparep,0,"curmoney");
$statuskluba = mysql_result ($comparep,0,"status");
$draft_je = mysql_result ($comparep,0,"draft");
$defcivn2 = mysql_result ($comparep,0,"campinvest");
$kiks = mysql_result ($comparep,0,"schoolinvest");
$campwas = mysql_result ($comparep,0,"youthcamp");
$sedezi = mysql_result ($comparep,0,"sedezi");
}
else {die(include 'basketsim.php');}

require("inc/lang/".$lang.".php");

$action=$_GET['action'];
$dul=0;
$laba = mysql_query("SELECT * FROM drafters WHERE team='$trueclub'");
$dul = mysql_num_rows($laba);
if ($action=='signup' && $draft_je<>1 && $dul <1) {
//dodatni queriji
$prvidod = mysql_query("SELECT current_level FROM medical_center WHERE id_team = '$trueclub'") or die(mysql_error());
if (mysql_num_rows($prvidod)==1) {$centerm = mysql_result($prvidod,0,"current_level");} else {$centerm = 0;}
//za zapis v bazo
$cwealth = 100 + round(95 - $madenar/300000 - $sedezi/800 - 6*$centerm);
if ($cwealth > 200) {$cwealth=200;} elseif ($cwealth < 0) {$cwealth = 0;}
$anoqu = mysql_query("SELECT position, level FROM leagues, competition WHERE leagues.leagueid = competition.leagueid AND competition.season ='$default_season' AND competition.teamid ='$trueclub'") or die(mysql_error());
$plzaj = mysql_result($anoqu,0,"position");
$hura = mysql_result($anoqu,0,"level");
$yyy = ($plzaj+1)*($hura+2)-5;
$salaries = mysql_query("SELECT SUM(wage) FROM `players` WHERE `club` ='$trueclub' LIMIT 1") or die(mysql_error());
list($sum) = mysql_fetch_row($salaries);
$xxx = round(201 - ($sum/5000));
if ($xxx > 200) {$xxx=200;} elseif ($xxx < 0) {$xxx=0;}
mysql_query("INSERT INTO drafters VALUES ('$trueclub', '$yyy', '$xxx', '$cwealth', 0, 0);") or die(mysql_error());
mysql_query("UPDATE teams SET draft=1, curmoney=curmoney-190000 WHERE teamid ='$trueclub' LIMIT 1") or die(mysql_error());
mysql_query("INSERT INTO events VALUES ('', $trueclub, NOW(), 'Paid 190.000 &euro; for the draft signup.', 1, -190000);");
mysql_query("INSERT INTO events VALUES ('', $trueclub, NOW(), 'You signed up for the draft.', 0, 0);");
header ( 'Location: youth.php' );
}

//sprememba vlozka
if (isset($_POST['submit2'])) {
$cinvest = $_POST["cinvest"];
if ($cinvest==0 OR $cinvest==25000 OR $cinvest==50000) {$preverjanje1='ok';}
if ($preverjanje1 <> 'ok') {die(include_once 'youth.php');}
mysql_query("UPDATE teams SET campinvest=$cinvest WHERE teamid ='$trueclub' LIMIT 1");
header ( 'Location: youth.php' );
}

//tokens purchase
if (isset($_POST['submit100']) AND $KRNEKI==454) {$kljukica100 = $_POST['checkbox100'];
$blaka = mysql_query("SELECT tokens, totokens FROM drafters WHERE team ='$trueclub' LIMIT 1");
if (($kljukica100=='YES') AND (mysql_result($blaka,0,"tokens") < 500) AND (mysql_result($blaka,0,"totokens") < 1401)) {
mysql_query("UPDATE drafters SET tokens=tokens+100, totokens=totokens+100 WHERE team ='$trueclub' LIMIT 1");
mysql_query("UPDATE teams SET curmoney=curmoney-100000 WHERE teamid ='$trueclub' LIMIT 1") or die(mysql_error());
mysql_query("INSERT INTO events VALUES ('', $trueclub, NOW(), '100 draft tokens were purchased for 100.000 &euro;.', 1, -100000);");
header ( 'Location: youth.php' );
}
}
if (isset($_POST['submit200']) AND $KRNEKI==454) {$kljukica200 = $_POST['checkbox200'];
$blaka = mysql_query("SELECT tokens, totokens FROM drafters WHERE team ='$trueclub' LIMIT 1");
if (($kljukica200=='YES') AND (mysql_result($blaka,0,"tokens") < 500) AND (mysql_result($blaka,0,"totokens") < 1301)) {
mysql_query("UPDATE drafters SET tokens=tokens+200, totokens=totokens+200 WHERE team ='$trueclub' LIMIT 1");
mysql_query("UPDATE teams SET curmoney=curmoney-160000 WHERE teamid ='$trueclub' LIMIT 1") or die(mysql_error());
mysql_query("INSERT INTO events VALUES ('', $trueclub, NOW(), '200 draft tokens were purchased for 160.000 &euro;.', 1, -160000);");
header ( 'Location: youth.php' );
}
}
if (isset($_POST['submit300']) AND $KRNEKI==454) {$kljukica300 = $_POST['checkbox300'];
$blaka = mysql_query("SELECT tokens, totokens FROM drafters WHERE team ='$trueclub' LIMIT 1");
if (($kljukica300=='YES') AND (mysql_result($blaka,0,"tokens") < 500) AND (mysql_result($blaka,0,"totokens") < 1201)) {
mysql_query("UPDATE drafters SET tokens=tokens+300, totokens=totokens+300 WHERE team ='$trueclub' LIMIT 1");
mysql_query("UPDATE teams SET curmoney=curmoney-220000 WHERE teamid ='$trueclub' LIMIT 1") or die(mysql_error());
mysql_query("INSERT INTO events VALUES ('', $trueclub, NOW(), '300 draft tokens were purchased for 220.000 &euro;.', 1, -220000);");
header ( 'Location: youth.php' );
}
}
if (isset($_POST['submit400']) AND $KRNEKI==454) {$kljukica400 = $_POST['checkbox400'];
$blaka = mysql_query("SELECT tokens, totokens FROM drafters WHERE team ='$trueclub' LIMIT 1");
if (($kljukica400=='YES') AND (mysql_result($blaka,0,"tokens") < 500) AND (mysql_result($blaka,0,"totokens") < 1101)) {
mysql_query("UPDATE drafters SET tokens=tokens+400, totokens=totokens+400 WHERE team ='$trueclub' LIMIT 1");
mysql_query("UPDATE teams SET curmoney=curmoney-280000 WHERE teamid ='$trueclub' LIMIT 1") or die(mysql_error());
mysql_query("INSERT INTO events VALUES ('', $trueclub, NOW(), '400 draft tokens were purchased for 280.000 &euro;.', 1, -280000);");
header ( 'Location: youth.php' );
}
}
if (isset($_POST['submit500']) AND $KRNEKI==454) {$kljukica500 = $_POST['checkbox500'];
$blaka = mysql_query("SELECT tokens, totokens FROM drafters WHERE team ='$trueclub' LIMIT 1");
if (($kljukica500=='YES') AND (mysql_result($blaka,0,"tokens") < 500) AND (mysql_result($blaka,0,"totokens") < 1001)) {
mysql_query("UPDATE drafters SET tokens=tokens+500, totokens=totokens+500 WHERE team ='$trueclub' LIMIT 1");
mysql_query("UPDATE teams SET curmoney=curmoney-340000 WHERE teamid ='$trueclub' LIMIT 1") or die(mysql_error());
mysql_query("INSERT INTO events VALUES ('', $trueclub, NOW(), '500 draft tokens were purchased for 340.000 &euro;.', 1, -340000);");
header ( 'Location: youth.php' );
}
}

include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2><?=$langmark1080?></h2>

<table border="0" cellspacing="10" cellpadding="10" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="55%">

<?php
//sola - vlozek
if (isset($_POST['submit'])) {
$sinvest = $_POST["sinvest"];
if ($sinvest==250000 OR $sinvest==750000) {$preverjanje='ok';}
if ($preverjanje <> 'ok') {die("<b>$langmark1083</b><br/><br/><a href=\"youth.php\">$langmark059</a></p></td></tr></table>");}

//ima uporabnik denar?
$mindenarja = $sinvest*90/100;
if ($madenar < $mindenarja) {die("<b>$langmark1084</b><br/><br/><a href=\"youth.php\">$langmark059</a></p></td></tr></table>");}
if ($kiks != 0) {die("<b>$langmark1347</b><br/><br/><a href=\"youth.php\">$langmark059</a></p></td></tr></table>");}

//vse ok
$sinvestdspl = number_format($sinvest, 0, ',', '.');
mysql_query("UPDATE teams SET schoolinvest=$sinvest WHERE teamid ='$trueclub'") or die(mysql_error());
mysql_query("UPDATE teams SET curmoney=curmoney-$sinvest WHERE teamid ='$trueclub' LIMIT 1") or die(mysql_error());
mysql_query("INSERT INTO events VALUES ('', $trueclub, NOW(), '$sinvestdspl &euro; was given to college.', 1, -$sinvest);");
die("<p>$langmark1086<br /><a href=\"youth.php\">$langmark491</a></p></td></tr></table>");
}
?>

<!-- OBRAZEC ZA VLOZEK V KAMP -->

<?php
ob_start();
?>

<form method="post" action="<?=$PHP_SELF?>" style="margin: 0">
<table width="98%" border="0" cellspacing="1" cellpadding="1">
<tr><td colspan="2"><?=$langmark1087?><br/><hr/></td></tr>
<tr><td colspan="2"><b><?=$langmark1088?></b><br/>

<?php
//prava opcija v meniju
switch ($defcivn2){
case 0:
?>
<select name="cinvest" class="inputreg">
<option value="0">0 &euro;</option>
<option value="25000">25.000 &euro;</option>
<option value="50000">50.000 &euro;</option>
</select>
<?php
break;
case 25000:
?>
<select name="cinvest" class="inputreg">
<option value="0">0 &euro;</option>
<option selected value="25000">25.000 &euro;</option>
<option value="50000">50.000 &euro;</option>
</select>
<?php
break;
case 50000:
?>
<select name="cinvest" class="inputreg">
<option value="0">0 &euro;</option>
<option value="25000">25.000 &euro;</option>
<option selected value="50000">50.000 &euro;</option>
</select>
<?php
break;
}
?>
<input type="submit" value="<?=$langmark012?>" name="submit2" class="buttonreg"></form></td></tr>

<!-- KONEC OBRAZCA ZA KAMP -->

<?php
//je vlozek ze bil?
switch ($kiks) {
case 250000: echo "<tr><td colspan=\"2\"><br/><br/><i>",$langmark1090,"</i></td></tr>"; break;
case 750000: echo "<tr><td colspan=\"2\"><br/><br/><i>",$langmark1092,"</i></td></tr>"; break;
case 0:

//VLOZEK
?>

<tr><td colspan="2"><br/><br/><?=$langmark1093?><br/><hr/></td></tr>
<tr><td colspan="2"><b><?=$langmark1094?></b><br/>
<form method="post" action="<?=$PHP_SELF?>" onSubmit="return verify()">
<select name="sinvest" class="inputreg">
<option value="250000">250.000 &euro;</option>
<option value="750000">750.000 &euro;</option>
</select>
<input type="submit" value="<?=$langmark1095?>" name="submit" class="buttonreg"></form></td></tr>
<tr><td colspan="2"><i>(Investment can be made until the end of the season)</i></td></tr>
<?php
//KONEC OBRAZCA ZA SOLO
break;
}
?>
</table>

</td><td class="border" width="45%">

<h2><?=$langmark1096?></h2><br/>

<!--<font color="darkred"><b>Promotions are disabled until Monday when new season starts!</b></font><br/><br/>-->

<!-- OBRAZEC ZA ZVEZDNIKA KAMPA -->

<?php
switch (TRUE) {
case ($campwas==1): echo "<i>",$langmark1097,"</i><br/>"; break;
case ($statuskluba<>1): echo "<i>",$langmark1097,"</i><br/>"; break;
case ($defcivn2==0): echo "<i>You need to increase investment, before you can promote a youngster!</i><br/>"; break;
case ($campwas==0 && $defcivn2<>0):
//kamp
if (!isset($_POST['submit1']) AND !isset($_POST['submitX']) AND $campwas==0) {
?>
<form method="post" action="<?=$PHP_SELF?>" style="margin: 0">
<b><?=$langmark1098?></b>
<br/><input type="submit" value="Sign 16-17yo player" name="submit1" class="buttonreg">
<?php
$dlog = mysql_query("SELECT 100 * (workrate/10 + experience/6 + 2*(quality-40)) / 68 AS kokdobr FROM players WHERE coach=1 AND club=$trueclub LIMIT 1");
$dlakoc = @mysql_result($dlog,0,"kokdobr");
if (round($dlakoc) > 74) {?>
<br/><b>OR</b><br/><input type="submit" value="Add 14-15yo player to your youth team!" name="submitX" class="buttonreg">
<?php
}
//else {echo "<br/><br/><i>75+ YT ability coach is needed to add players to youth team.</i><br/>";}
?>
<br/><a href="gamerules.php?action=youth">Read more about youth teams</a>
</form>

<?php
} elseif (isset($_POST['submit1']) AND $campwas==0) {

//USTVARIM IGRALCA
$create_age = rand(16,17);
if ($create_age==17) {$create_age = rand(16,17);}
if ($create_age==17) {$create_age = rand(16,17);}
$create_char = rand(1,43);
$height_chance=rand(1,6);
if ($height_chance < 3 && $create_age==16){$create_height = rand(167,185);}
elseif ($height_chance > 2 && $height_chance <> 6 && $create_age==16){$create_height = rand(182,196);}
elseif ($height_chance==6 && $create_age==16){$create_height = rand(190,209);}
elseif ($height_chance < 3 && $create_age==17){$create_height = rand(173,193);}
elseif ($height_chance > 2 && $height_chance <> 6 && $create_age==17){$create_height = rand(186,203);}
else {$create_height = rand(189,212);}
$create_weight = $create_height - rand(95,120);
$sel_country = mysql_query("SELECT country FROM teams WHERE teamid ='$trueclub' LIMIT 1") or die(mysql_error());
while ($def_country = mysql_fetch_array($sel_country, MYSQL_ASSOC))
   {   foreach ($def_country as $create_country)
   {$create_country; }     } ;

//barva koze
$randcol=rand(0,300);
if ($create_country=='Brazil' OR $create_country=='USA' OR $create_country=='Colombia'){
if ($randcol < 120) {$skincolor = 0;} elseif ($randcol > 119 AND $randcol < 180) {$skincolor = 1;} else {$skincolor = 2;}
}
if ($create_country=='United Kingdom' OR $create_country=='France' OR $create_country=='Netherlands' OR $create_country=='Canada'){
if ($randcol < 210) {$skincolor = 0;} elseif ($randcol > 209 AND $randcol < 240) {$skincolor = 1;} else {$skincolor = 2;}
}
if ($create_country=='Puerto Rico' OR $create_country=='India' OR $create_country=='Indonesia' OR $create_country=='Mexico' OR $create_country=='Philippines' OR $create_country=='Thailand'){
if ($randcol < 50) {$skincolor = 0;} elseif ($randcol > 49 AND $randcol < 285) {$skincolor = 1;} else {$skincolor = 2;}
}
if ($create_country=='Malaysia' OR $create_country=='Venezuela' OR $create_country=='Uruguay' OR $create_country=='Tunisia' OR $create_country=='Egypt' OR $create_country=='Turkey' OR $create_country=='Chile' OR $create_country=='Montenegro' OR $create_country=='Peru' OR $create_country=='Argentina' OR $create_country=='Portugal' OR $create_country=='Israel' OR $create_country=='Romania' OR $create_country=='Bulgaria' OR $create_country=='Greece' OR $create_country=='Bosnia' OR $create_country=='Albania' OR $create_country=='Germany' OR $create_country=='Belgium' OR $create_country=='Serbia' OR $create_country=='Spain' OR $create_country=='Italy'){
if ($randcol < 270) {$skincolor = 0;} elseif ($randcol > 269 AND $randcol < 297) {$skincolor = 1;} else {$skincolor = 2;}
}
if ($create_country=='Belarus' OR $create_country=='Japan' OR $create_country=='Georgia' OR $create_country=='New Zealand' OR $create_country=='Austria' OR $create_country=='Ireland' OR $create_country=='Hong Kong' OR $create_country=='South Korea' OR $create_country=='Phillipines' OR $create_country=='Norway' OR $create_country=='China' OR $create_country=='Malta' OR $create_country=='Croatia' OR $create_country=='Russia' OR $create_country=='Switzerland' OR $create_country=='Cyprus' OR $create_country=='Denmark' OR $create_country=='Slovakia' OR $create_country=='Sweden' OR $create_country=='FYR Macedonia' OR $create_country=='Australia' OR $create_country=='Czech Republic' OR $create_country=='Hungary' OR $create_country=='Finland' OR $create_country=='Estonia' OR $create_country=='Ukraine' OR $create_country=='Slovenia' OR $create_country=='Poland' OR $create_country=='Latvia' OR $create_country=='Lithuania') {
if ($randcol < 300) {$skincolor = 0;} else {$skincolor = 1;}
}

SWITCH ($skincolor) {
CASE 0:
$def_temp = rand(0,7);
if ($def_temp == 0){require_once('obrazi/kreate/create_wh1.php');}
if ($def_temp == 1){require_once('obrazi/kreate/create_wh2.php');}
if ($def_temp == 2){require_once('obrazi/kreate/create_wh3.php');}
if ($def_temp == 3){require_once('obrazi/kreate/create_wh4.php');}
if ($def_temp == 4){require_once('obrazi/kreate/create_wh5.php');}
if ($def_temp == 5){require_once('obrazi/kreate/create_wh6.php');}
if ($def_temp == 6){require_once('obrazi/kreate/create_wh7.php');}
if ($def_temp == 7){require_once('obrazi/kreate/create_wh8.php');}
break;
CASE 1:
$def_temp = rand(0,5);
if ($def_temp == 0){require_once('obrazi/kreate/create_br1.php');}
if ($def_temp == 1){require_once('obrazi/kreate/create_br2.php');}
if ($def_temp == 2){require_once('obrazi/kreate/create_br4.php');}
if ($def_temp == 3){require_once('obrazi/kreate/create_br5.php');}
if ($def_temp == 4){require_once('obrazi/kreate/create_br6.php');}
if ($def_temp == 5){require_once('obrazi/kreate/create_br7.php');}
break;
CASE 2:
$def_temp = rand(0,6);
if ($def_temp == 0){require_once('obrazi/kreate/create_bl1.php');}
if ($def_temp == 1){require_once('obrazi/kreate/create_bl2.php');}
if ($def_temp == 2){require_once('obrazi/kreate/create_bl3.php');}
if ($def_temp == 3){require_once('obrazi/kreate/create_bl4.php');}
if ($def_temp == 4){require_once('obrazi/kreate/create_bl5.php');}
if ($def_temp == 5){require_once('obrazi/kreate/create_bl6.php');}
if ($def_temp == 6){require_once('obrazi/kreate/create_bl8.php');}
break;
}

$randomvalue = sqrt($defcivn2+31225);
$newrandomvalue = ($randomvalue / 19) + rand(13,23);
$newrandomvalue1 = ($randomvalue / 19) + rand(13,23);
$newrandomvalue2 = ($randomvalue / 19) + rand(13,23);
$newrandomvalue3 = ($randomvalue / 19) + rand(13,23);
$newrandomvalue4 = ($randomvalue / 19) + rand(13,23);
$newrandomvalue5 = ($randomvalue / 19) + rand(13,23);
$newrandomvalue6 = ($randomvalue / 19) + rand(13,23);
$newrandomvalue7 = ($randomvalue / 19) + rand(13,23);
$newrandomvalue8 = ($randomvalue / 19) + rand(13,23);

$create_handling = round(rand(49,223) * $newrandomvalue/100, 2);
$create_speed = round(rand(49,223) * $newrandomvalue1/100, 2);
$create_pass = round(rand(49,223) * $newrandomvalue2/100, 2);
$create_vision = round(rand(49,223) * $newrandomvalue3/100, 2);
$create_rebound = round(rand(49,223) * $newrandomvalue4/100, 2);
$create_position = round(rand(49,223) * $newrandomvalue5/100, 2);
$create_throws = round(rand(49,223) * $newrandomvalue6/100, 2);
$create_shoot = round(rand(49,223) * $newrandomvalue7/100, 2);
$create_def = round(rand(49,223) * $newrandomvalue8/100, 2);

$malena = mysql_query("SELECT * FROM teams WHERE status=1 AND country LIKE '$create_country'");
if (mysql_num_rows($malena) < 109) {$znizanwr = rand(0,2);} else {$znizanwr = rand(0,3);}
if ($znizanwr < 2){$create_workrate = round(rand(1,124) * rand(59,100) /100);} else {$create_workrate = round(rand(1,113) * rand(1,99) /100);}

//character
if ($create_char > 19 AND $create_char < 23) {$create_def = $create_def+15;}
elseif ($create_char > 22 AND $create_char < 26) {$create_rebound = $create_rebound+10; $create_handling=rand(8,9); $create_height=rand(198,214);}
elseif ($create_char > 25 AND $create_char < 30) {$create_speed = $create_speed+19;}
elseif ($create_char > 29 AND $create_char < 33) {$create_workrate = $create_workrate+11;}
elseif ($create_char > 32 AND $create_char < 35) {$create_experience = $create_experience+5;}
elseif ($create_char > 34 AND $create_char < 39) {$create_age=16; $create_passing = $create_passing+13;}
elseif ($create_char > 38 AND $create_char < 41) {$create_def = $create_def+6; $create_rebound = $create_rebound+6;}

//plača
$value5 = ($create_height * 2) + $create_handling + ($create_speed * 4) + ($create_pass * 2) + ($create_vision * 2) + ($create_rebound * 3) + ($create_position * 4) + ($create_throws * 3) + ($create_shoot * 4) + 5.85 + ($create_def * 3);
$value5 = (($value5*$value5*$value5)/225000) - 7500;
if ($value5 < 200) {$value5=200;}

//quality adjustments
if ($create_age==16 AND $value5 > 16000 AND $create_workrate > 57) {$create_age=17;}
if ($create_age==16 AND $value5 > 14000 AND $create_workrate > 74) {$create_age=17;}
if ($create_age==16 AND $create_workrate > 88 AND $value5 > 12600) {$create_workrate=$create_workrate-10;}
if ($create_age==16 AND $create_workrate < 57 AND $value5 < 10500) {$create_workrate=$create_workrate+15;}
if ($create_age==17 AND $value5 < 10900 AND $create_workrate < 105) {$create_age=16;}
if ($create_age==17 AND $value5 < 12900 AND $create_workrate < 81) {$create_workrate=$create_workrate+15;}
if ($create_age==17 AND $value5 < 6900) {$create_age=16;}
if ($create_age==17 AND $value5 < 12900 AND $create_workrate < 57) {$create_workrate=$create_workrate+22;}

//xp and wage
$create_experience = round(rand(3,33) * ($create_age/100), 2);
$value55 = (($create_handling * (((-tanh((($create_height-190)/6)-2.5))/4)+0.75)) + ($create_speed * (((-tanh((($create_height-190)/6)-2.5))/10)+0.9)) + ($create_pass * (((-tanh((($create_height-190)/6)-2.5))/6.5)+0.75)) + ($create_vision * ((((tanh((($create_height-180)/3)-2.5))/20)+0.85)+(((-tanh((($create_height-200)/3)-2.5))/10)+0.8)-0.9)) + ($create_rebound * (((tanh((($create_height-185)/6)-2.5))/2.5)+0.6)) + ($create_position * ((((-tanh((($create_height-180)/3)-2.5))/6.6)+0.55)+(((tanh((($create_height-200)/3)-2.5))/3.33)+0.8)-0.5)) + ($create_throws) + ($create_shoot * ((((tanh((($create_height-180)/3)-2.5))/6.6)+0.85)+(((-tanh((($create_height-200)/3)-2.5))/6.6)+0.85)-1)) + ($create_experience * 0.5) + ($create_def)) *4;
$value55 = (($value55 * $value55 * $value55) / 225000) - 7500;
if ($value55 < 200) {$value55=200;}

SWITCH ($create_workrate) {
CASE 7: $create_workrate=9; break;
CASE 8: $create_workrate=17; break;
CASE 15: $create_workrate=17; break;
CASE 16: $create_workrate=17; break;
CASE 23: $create_workrate=25; break;
CASE 24: $create_workrate=25; break;
CASE 31: $create_workrate=33; break;
CASE 32: $create_workrate=33; break;
CASE 39: $create_workrate=41; break;
CASE 40: $create_workrate=41; break;
CASE 47: $create_workrate=49; break;
CASE 48: $create_workrate=49; break;
CASE 55: $create_workrate=57; break;
CASE 56: $create_workrate=57; break;
CASE 64: $create_workrate=65; break;
}

$jagab = mysql_query("SELECT playerid FROM transfers WHERE playerclub = 'Youth Camp' AND bidingteam =$userid");
$raa=mysql_num_rows($jagab);
$skupv=0; $topv=0;
while ($lu=mysql_fetch_array($jagab)) {
$soldYC=$lu[playerid];
$dod = mysql_query("SELECT currentbid FROM transfers WHERE sellingid<>bidingteam AND currentbid >999 AND sellingid=$userid AND playerid=$soldYC ORDER BY transferid ASC LIMIT 1");
$dod122=$topv; $dod123=0;
$dod123 = @mysql_result($dod,0);
if (!$dod123) {$dod123=0;}
if ($dod123 > $dod122) {$topv=$dod123; $Rplayer=$soldYC;}
$skupv = $skupv + $dod123;
}
if ($raa > 0) {$hmelja = round($skupv/$raa);} else {$hmelja=100;}
if ($hmelja < 200000) {$create_workrate=$create_workrate+8;}
if ($hmelja < 100000) {$create_workrate=$create_workrate+4;}

$value5 = ($create_height * 2) + $create_handling + ($create_speed * 4) + ($create_pass * 2) + ($create_vision * 2) + ($create_rebound * 3) + ($create_position * 4) + ($create_throws * 3) + ($create_shoot * 4) + ($create_experience * 2) + ($create_def * 3);
$value5 = (($value5*$value5*$value5)/225000) - 7500;
if ($value5 < 200) {$value5=200;}
$value = ((($value5/9)*($value5/9))/15)*(($value5/240000+(1/(exp(pow((($create_age-16)/10),4.1)))))*(((($create_workrate/8)+1)/19)+1))*((sqrt($value5/180000))/((((tanh((($create_age/2)-10))/2)+0.5)*0.71)+0.29));
if ($value < 1000) {$value=1000;}

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

$glava = @mysql_query("SELECT * FROM teams where teamid=$trueclub AND youthcamp=1 LIMIT 1");
if (@mysql_num_rows($glava)==1) {die("Player was already promoted");}
mysql_query("UPDATE teams SET youthcamp=1 WHERE teamid ='$trueclub' LIMIT 1") or die(mysql_error());

$create_player_request = "INSERT INTO players (id, name, surname, age, club, country, charac, height, weight, handling, speed, passing, vision, rebounds, position, freethrow, shooting, defense, workrate, experience, fatigue, isonsale, wage, coach, orient, quality, price, motiv, has_played, last_position, face, ears, mouth, eyes, nose, mustage, hair) VALUES ('', '$random_name_value', '$random_surname_value', $create_age, $trueclub, '$create_country', $create_char, $create_height, $create_weight, $create_handling, $create_speed, $create_pass, $create_vision, $create_rebound, $create_position, $create_throws, $create_shoot, $create_def, $create_workrate, $create_experience, 0, 0, $value55, 0, 0, 0, 0, 0, 0, 1, '$kepalacak', '$telingacak', '$mulutacak', '$matacak', '$hidungacak', '$kumisacak', '$rambutacak');";
$resulty = mysql_query($create_player_request);
$newypid = mysql_insert_id();

if($resulty){
ob_end_clean();
mysql_query("UPDATE teams SET curmoney=curmoney-$defcivn2 WHERE teamid ='$trueclub' LIMIT 1") or die(mysql_error());
mysql_query("INSERT INTO events VALUES ('', $trueclub, NOW(), '<a href=player.php?playerid=$newypid>Young player</a> was picked from camp.', 0, -$defcivn2);");

//"transfer"
$ftime = time(); $fyear=date('Y', $ftime); $fmonth=date('m', $ftime); $fday=date('d', $ftime); $fhour=date('H', $ftime); $fmin=date('i', $ftime); $fsec=date('s', $ftime); $pos=rand(1,5);
mysql_query("INSERT INTO transfers VALUES ('', $newypid, 'Youth camp', 0, '$create_country', 0, $pos, '$fyear=$fmonth=$fday $fhour+$fmin+$fsec', 1, $userid, '$ime_kluba', 0, $value);");
die($create_age."".$langmark1102." ".$random_name_value." ".$random_surname_value." ".$langmark1103."<br/><a href=\"player.php?playerid=".$newypid."\">".$langmark1104."</a></td></tr></table>");
}

//konec stvaritve igralca
}

//MLADINEC

elseif (isset($_POST['submitX']) AND $campwas==0) {

//USTVARIM IGRALCA
$create_age = rand(14,15);
if ($create_age==14) {$create_age = rand(14,15);}

$jagab = mysql_query("SELECT playerid FROM transfers WHERE playerclub = 'Youth Camp' AND bidingteam =$userid");
$raa=mysql_num_rows($jagab);
$skupv=0; $topv=0;
while ($lu=mysql_fetch_array($jagab)) {
$soldYC=$lu[playerid];
$dod = mysql_query("SELECT currentbid FROM transfers WHERE sellingid<>bidingteam AND currentbid >999 AND sellingid=$userid AND playerid=$soldYC ORDER BY transferid ASC LIMIT 1");
$dod122=$topv; $dod123=0;
$dod123 = @mysql_result($dod,0);
if (!$dod123) {$dod123=0;}
if ($dod123 > $dod122) {$topv=$dod123; $Rplayer=$soldYC;}
$skupv = $skupv + $dod123;
}
if ($raa > 0) {$hmelja = round($skupv/$raa);} else {$hmelja=100;}
if ($hmelja < 200000 AND $create_age==15) {$create_age = rand(14,16);}
if ($create_age==16) {$create_age=15;}
if ($hmelja > 700000 AND $create_age==14) {$create_age = rand(14,15);}

$height_chance=rand(1,6);
if ($height_chance < 3 && $create_age==14){$create_height = rand(162,176);}
elseif ($height_chance > 2 && $height_chance < 6 && $create_age==14){$create_height = rand(169,187);}
elseif ($height_chance==6 && $create_age==14){$create_height = rand(176,194);}
elseif ($height_chance < 3 && $create_age==15){$create_height = rand(168,182);}
elseif ($height_chance > 2 && $height_chance < 6 && $create_age==15){$create_height = rand(174,190);}
else {$create_height = rand(180,206);}

if ($create_height > 199 AND $create_age==14) {$create_age = rand(14,15);}

$create_weight = $create_height - rand(97,118);
$sel_country = mysql_query("SELECT country FROM teams WHERE teamid ='$trueclub' LIMIT 1") or die(mysql_error());
while ($def_country = mysql_fetch_array($sel_country, MYSQL_ASSOC))
   {   foreach ($def_country as $create_country)
   {$create_country; }     } ;

//barva koze
$randcol=rand(0,300);
if ($create_country == 'Brazil' OR $create_country == 'USA'){
if ($randcol < 120) {$skincolor = 0;}
elseif ($randcol > 119 AND $randcol < 180)  {$skincolor = 1;}
else {$skincolor = 2;}
}
if ($create_country == 'United Kingdom' OR $create_country == 'France' OR $create_country == 'Netherlands' OR $create_country == 'Canada'){
if ($randcol < 210) {$skincolor = 0;}
elseif ($randcol > 209 AND $randcol < 240)  {$skincolor = 1;}
else {$skincolor = 2;}
}
if ($create_country == 'India' OR $create_country == 'Indonesia'){
if ($randcol < 50) {$skincolor = 0;}
elseif ($randcol > 49 AND $randcol < 285)  {$skincolor = 1;}
else {$skincolor = 2;}
}
if ($create_country == 'Malaysia' OR $create_country == 'Uruguay' OR $create_country == 'Tunisia' OR $create_country == 'Egypt' OR $create_country == 'Phillipines' OR $create_country == 'Bosnia' OR $create_country == 'Turkey' OR $create_country == 'Chile' OR $create_country == 'Croatia' OR $create_country == 'Argentina' OR $create_country == 'Portugal' OR $create_country == 'Israel' OR $create_country == 'Greece' OR $create_country=='FYR Macedonia' OR $create_country == 'Germany' OR $create_country == 'Belgium' OR $create_country == 'Spain' OR $create_country == 'Italy'){
if ($randcol < 270) {$skincolor = 0;}
elseif ($randcol > 269 AND $randcol < 295)  {$skincolor = 1;}
else {$skincolor = 2;}
}
if ($create_country == 'Ireland' OR $create_country == 'Peru' OR $create_country == 'Montenegro' OR $create_country == 'Hong Kong' OR $create_country == 'South Korea' OR $create_country == 'Norway' OR $create_country == 'China' OR $create_country == 'Malta' OR $create_country == 'Russia' OR $create_country == 'Switzerland' OR $create_country == 'Cyprus' OR $create_country == 'Denmark' OR $create_country == 'Slovakia' OR $create_country == 'Sweden' OR $create_country == 'Bulgaria' OR $create_country == 'Australia' OR $create_country == 'Czech Republic' OR $create_country == 'Hungary' OR $create_country == 'Finland' OR $create_country == 'Estonia' OR $create_country == 'Ukraine' OR $create_country == 'Slovenia' OR $create_country == 'Poland' OR $create_country == 'Latvia' OR  $create_country == 'Lithuania' OR $create_country == 'Romania' OR $create_country == 'Serbia') {
if ($randcol < 300) {$skincolor = 0;}
else {$skincolor = 1;}
}

SWITCH ($skincolor) {
CASE 0:
$def_temp = rand(0,7);
if ($def_temp == 0){require_once('obrazi/kreate/create_wh1.php');}
if ($def_temp == 1){require_once('obrazi/kreate/create_wh2.php');}
if ($def_temp == 2){require_once('obrazi/kreate/create_wh3.php');}
if ($def_temp == 3){require_once('obrazi/kreate/create_wh4.php');}
if ($def_temp == 4){require_once('obrazi/kreate/create_wh5.php');}
if ($def_temp == 5){require_once('obrazi/kreate/create_wh6.php');}
if ($def_temp == 6){require_once('obrazi/kreate/create_wh7.php');}
if ($def_temp == 7){require_once('obrazi/kreate/create_wh8.php');}
break;
CASE 1:
$def_temp = rand(0,5);
if ($def_temp == 0){require_once('obrazi/kreate/create_br1.php');}
if ($def_temp == 1){require_once('obrazi/kreate/create_br2.php');}
if ($def_temp == 2){require_once('obrazi/kreate/create_br4.php');}
if ($def_temp == 3){require_once('obrazi/kreate/create_br5.php');}
if ($def_temp == 4){require_once('obrazi/kreate/create_br6.php');}
if ($def_temp == 5){require_once('obrazi/kreate/create_br7.php');}
break;
CASE 2:
$def_temp = rand(0,6);
if ($def_temp == 0){require_once('obrazi/kreate/create_bl1.php');}
if ($def_temp == 1){require_once('obrazi/kreate/create_bl2.php');}
if ($def_temp == 2){require_once('obrazi/kreate/create_bl3.php');}
if ($def_temp == 3){require_once('obrazi/kreate/create_bl4.php');}
if ($def_temp == 4){require_once('obrazi/kreate/create_bl5.php');}
if ($def_temp == 5){require_once('obrazi/kreate/create_bl6.php');}
if ($def_temp == 6){require_once('obrazi/kreate/create_bl8.php');}
break;
}

$preveriT = mysql_query("SELECT id FROM players WHERE coach=9 AND club=$trueclub");
if (mysql_num_rows($preveriT) > 11) {ob_end_clean();
die("You have 12 players in your Youth team, you must first fire one player, before you can bring in another one.<br/><a href=\"javascript: history.go(-1)\">".$langmark059."</a></td></tr></table>");}

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

$malena = mysql_query("SELECT * FROM teams WHERE status=1 AND country LIKE '$create_country'");
if (mysql_num_rows($malena) < 50) {$znizanwr = rand(0,2);} elseif (mysql_num_rows($malena) < 100) {$znizanwr = rand(0,3);} else {$znizanwr = rand(0,4);}
if ($znizanwr < 2){$create_workrate = round(rand(1,125) * rand(59,101) /100);} else {$create_workrate = round(rand(1,112) * rand(1,99) /100);}
if ($create_age==14 AND $create_workrate > 55) {$create_workrate=$create_workrate-7;}
if ($create_age==14 AND $create_workrate > 79) {$create_workrate=$create_workrate-13;}
if ($create_age==14 AND $create_workrate > 98) {$create_workrate=$create_workrate-26;}

//character
$create_char = rand(1,43);
if ($create_char < 20) {$create_char = rand(1,17);}
elseif ($create_age==15 AND $create_workrate > 100 AND $create_char < 20) {$create_char = rand(2,19);}
elseif ($create_age==14 AND $create_workrate > 60 AND $create_char < 20) {$create_char = rand(3,19);}
elseif ($create_age==14 AND $create_height > 189 AND $create_char < 20) {$create_char = rand(1,19);}
elseif ($create_char > 22 AND $create_char < 26 AND $create_age==15) {$create_height=rand(180,206);}
elseif ($create_char > 32 AND $create_char < 35 AND $create_age==14 AND $create_workrate > 8) {$create_age=15;}
elseif ($create_char > 38 AND $create_char < 41 AND $create_age==14 AND $create_workrate > 17) {$create_age=15;}
elseif ($create_char > 35 AND $create_char < 38 AND $create_age==15 AND $create_workrate < 73) {$create_age=14;}

$glava = @mysql_query("SELECT * FROM teams where teamid=$trueclub AND youthcamp=1 LIMIT 1");
if (@mysql_num_rows($glava)==1) {die("Player was already promoted");}

$dlogoh = mysql_query("SELECT 100 * (workrate/10 + experience/6 + 2*(quality-40)) / 68 AS kokdobr FROM players WHERE coach=1 AND club=$trueclub LIMIT 1");
$dlakoj = @mysql_result($dlogoh,0,"kokdobr");
if ($dlakoj > 86 AND $create_workrate > 41) {$create_workrate = $create_workrate-1;}
if ($dlakoj > 87 AND $create_workrate > 65) {$create_workrate = $create_workrate-3;}
if ($dlakoj > 87 AND $create_workrate > 81) {$create_workrate = $create_workrate-9;}

if ($hmelja > 1100000 AND $create_workrate > 81) {$create_workrate = $create_workrate-10;}
if ($create_age==14) {$value5=500;} else {$value5=1000;}
mysql_query("UPDATE teams SET youthcamp=1 WHERE teamid ='$trueclub' LIMIT 1") or die(mysql_error());

$create_player_request = "INSERT INTO players (id, name, surname, age, club, country, charac, height, weight, handling, speed, passing, vision, rebounds, position, freethrow, shooting, defense, workrate, experience, fatigue, isonsale, wage, coach, orient, quality, price, motiv, has_played, last_position, face, ears, mouth, eyes, nose, mustage, hair) VALUES ('', '$random_name_value', '$random_surname_value', $create_age, $trueclub, '$create_country', $create_char, $create_height, $create_weight, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $value5, 9, 0, $create_workrate, 0, 0, 0, 1, '$kepalacak', '$telingacak', '$mulutacak', '$matacak', '$hidungacak', '$kumisacak', '$rambutacak');";
$resulty = mysql_query($create_player_request);
$newypid = mysql_insert_id();

if($resulty){
ob_end_clean();
mysql_query("UPDATE teams SET curmoney=curmoney-25000 WHERE teamid ='$trueclub' LIMIT 1") or die(mysql_error());
mysql_query("INSERT INTO events VALUES ('', $trueclub, NOW(), '<a href=player.php?playerid=$newypid>Young player</a> was added to the youth team.', 0, -25000);");

die($create_age."".$langmark1102." ".$random_name_value." ".$random_surname_value." ".$langmark1103."<br/><a href=\"player.php?playerid=".$newypid."\">".$langmark1104."</a></td></tr></table>");
}

//konec stvaritve MLADINCA
}

//konec switcha
break;
}
?>

<br/><h2><?=$langmark1105?></h2><br/> <!-- basketsim draft -->

<?php
/*
?>
<b><?=$langmark1109?></b><br/> <!-- Draft sign-up has expired. -->
<a href="transfermarket.php?action=topdraft"><?=$langmark1110?> 16th of June 2014</a><br/> <!-- Draft will occur on -->
<br/><?php if ($dul > 0) {
$etokens = mysql_result($laba,0,"tokens");
$TOTOK = mysql_result($laba,0,"totokens");
echo "Your team will participate in draft this season.";
if ($TOTOK < 1401) {
echo "<br/><br/><h2>Buy draft tokens</h2><br/>";
?>
<form method="post" action="<?=$PHP_SELF?>" style="margin: 0">
<?php if ($etokens < 500) {?>
<input type="submit" value="100 tokens for 100.000 &euro;" name="submit100" class="buttonreg">&nbsp;<input style="margin:0; padding:0;" type='checkbox' name='checkbox100' value='YES' /><br/>
<?php } if ($etokens < 400) {?>
<input type="submit" value="200 tokens for 160.000 &euro;" name="submit200" class="buttonreg">&nbsp;<input style="margin:0; padding:0;" type='checkbox' name='checkbox200' value='YES' /><br/>
<?php } if ($etokens < 300) {?>
<input type="submit" value="300 tokens for 220.000 &euro;" name="submit300" class="buttonreg">&nbsp;<input style="margin:0; padding:0;" type='checkbox' name='checkbox300' value='YES' /><br/>
<?php } if ($etokens < 200) {?>
<input type="submit" value="400 tokens for 280.000 &euro;" name="submit400" class="buttonreg">&nbsp;<input style="margin:0; padding:0;" type='checkbox' name='checkbox400' value='YES' /><br/>
<?php } if ($etokens < 100) {?>
<input type="submit" value="500 tokens for 340.000 &euro;" name="submit500" class="buttonreg">&nbsp;<input style="margin:0; padding:0;" type='checkbox' name='checkbox500' value='YES' /><br/>
<?php } if ($etokens > 499) {echo "<i>You have 500 or more tokens, so you are not able to buy more right now.</i>"; $zum=34;}?>
</form>
<?php
}
if ($zum<>34) {
$jahu = mysql_query("SELECT tokens, totokens FROM drafters WHERE team=$trueclub LIMIT 1");
echo "<br/><b>You have ".@mysql_result($jahu,0,"tokens")." tokens to use.</b>";
echo "<br/><b>You have purchased ".@mysql_result($jahu,0,"totokens")." out of maximum possible 1500 tokens.</b>";
//echo "<br/><i>Tokens are not available to buy anymore.</i>";
//echo "<br/><i>Tokens are not available to buy yet!</i>";
}
}
else
{
echo "Your team won't participate in draft this season.<br/>",$langmark1108;}?> <!-- You will be able to sign up again next season. -->
<?php
*/
?>

<?php

if ($dul > 0) {
$etokens = mysql_result($laba,0,"tokens");
echo $langmark1112,"<br/><br/> Draft has been cancelled. All teams will get a refund at the start of the new season.<br/><br/>",$langmark1111," <a href=\"transfermarket.php?action=topdraft\">",$langmark630,"</a>.";
echo "<br/><br/><h2>Buy draft tokens</h2><br/>";
?>
<form method="post" action="<?=$PHP_SELF?>" style="margin: 0">
<?php if ($etokens < 500) {?>
<input type="submit" value="100 tokens for 100.000 &euro;" name="submit100" class="buttonreg">&nbsp;<input style="margin:0; padding:0;" type='checkbox' name='checkbox100' value='YES' /><br/>
<?php } if ($etokens < 400) {?>
<input type="submit" value="200 tokens for 160.000 &euro;" name="submit200" class="buttonreg">&nbsp;<input style="margin:0; padding:0;" type='checkbox' name='checkbox200' value='YES' /><br/>
<?php } if ($etokens < 300) {?>
<input type="submit" value="300 tokens for 220.000 &euro;" name="submit300" class="buttonreg">&nbsp;<input style="margin:0; padding:0;" type='checkbox' name='checkbox300' value='YES' /><br/>
<?php } if ($etokens < 200) {?>
<input type="submit" value="400 tokens for 280.000 &euro;" name="submit400" class="buttonreg">&nbsp;<input style="margin:0; padding:0;" type='checkbox' name='checkbox400' value='YES' /><br/>
<?php } if ($etokens < 100) {?>
<input type="submit" value="500 tokens for 340.000 &euro;" name="submit500" class="buttonreg">&nbsp;<input style="margin:0; padding:0;" type='checkbox' name='checkbox500' value='YES' /><br/>
<?php } if ($etokens > 499) {echo "<i>You have already purchased a maximum allowed amount of draft tokens.</i>"; $zum=34;}?>
</form>
<?php
if ($zum<>34) {
//echo "<br/><i>Check your current balance on the draft page!</i>";
echo "<br/><i>Tokens are not available to buy yet!</i>";
}
}
elseif ($dul==0 && $draft_je==1) {echo "<font color=\"green\"><i>Due to 3 or more walkovers this season, your team was removed from the draft.</i></font>";}
else {?>
<?=$langmark1113?><br/><br/><a href="youth.php?action=checksignup"><?=$langmark1114?></a> (190.000 &euro;)
<?php if ($action=='checksignup') {echo "<br/><b>Are you sure?</b> <a href=\"youth.php?action=signup\">Yes</a> | <a href=\"youth.php\">No</a>";}?>
<br/><br/><b><?=$langmark1348?> 8th of May.</b> <!-- Signup expires on -->
<br/><a href="transfermarket.php?action=topdraft">Check the draft ranking table</a>
<?php
}

?>

<?php
/*
?>
<b><?=$langmark1106?></b><br/> <!-- Signup period has expired. -->
<a href="transfermarket.php?action=topdraft"><?=$langmark1107?> 16th of June 2014</a><br/><br/> <!-- Draft occured on -->
<?=$langmark1108?> <!-- You will be able to signup again next season. -->
<?php
*/
?>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>