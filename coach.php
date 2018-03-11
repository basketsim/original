<?php
/*
replace/swap coach ("already hired")
*/

$coachid=$_GET['coachid'];
if (!is_numeric($coachid)) {die(include 'index.php');}

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT club, supporter, lang, curmoney FROM users, teams WHERE club=teamid AND password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)) {
$get_team = mysql_result($compare,0,"club");
$is_supporter = mysql_result($compare,0,"supporter");
$lang = mysql_result ($compare,0,"lang");
$madenar = mysql_result ($compare,0,"curmoney");
}
else {die(include 'basketsim.php');}

$result = mysql_query("SELECT name, surname, age, club, country, charac, height, weight, handling, speed, passing, vision, rebounds, position, freethrow, shooting, defense, workrate, experience, wage, quality, price, motiv FROM players WHERE coach =1 AND id ='$coachid' LIMIT 1");
if (mysql_num_rows($result)<>1) {die(include 'basketsim.php');}
while($r=mysql_fetch_array($result))
{	
$name=$r["name"];
$surname=$r["surname"];
$age=$r["age"];
$club=$r["club"];
$country=$r["country"];
$charac=$r["charac"];
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
$wage=$r["wage"];
$hskill=$r["quality"];
$price=$r["price"];
$motiv=$r["motiv"];
}
if ($motiv > 100) {$motiv=100;}
$motiv = ceil($motiv);

if ($action=='bookmark') {
$ime = $name." ".$surname;
$zapis = mysql_query("INSERT INTO bookmarks VALUES ('', $get_team, '$ime', $coachid, 5, 0);") or die(mysql_error());
header("Location: bookmarks.php"); die();
}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2><?=$langmark138?></h2>

<?php
$action=$_GET['action'];

if ($action=='hire' AND $age < 61 AND $experience < 122) {

//je kovc zares prost?
if ($club<>0) {die("<table width=\"100%\" cellpadding=\"9\" cellspacing=\"9\"><tr bgcolor=\"#ffffff\"><td class=\"border\" bgcolor=\"#ffffff\">".$langmark079.".<br/><a href=\"coaches.php\">".$langmark059."</a></td></tr></table>");}

//ima uporabnik denar?
$mindenarja = $price*75/100;
if ($madenar < $mindenarja) {die("<table width=\"100%\" cellpadding=\"9\" cellspacing=\"9\"><tr bgcolor=\"#ffffff\"><td class=\"border\">".$langmark080.".<br/><a href=\"coaches.php\">".$langmark059."</a></td></tr></table>");}

//je klub zares brez?
$klubbrez = mysql_query("SELECT id FROM players WHERE coach =1 && club ='$get_team'") or die(mysql_error());
if (mysql_num_rows($klubbrez)) {die("<table width=\"100%\" cellpadding=\"9\" cellspacing=\"9\"><tr bgcolor=\"#ffffff\"><td class=\"border\" bgcolor=\"#ffffff\">".$langmark081."<br/>".$langmark082." <a href=\"training.php\">".$langmark083."</a> ".$langmark084.".</td></tr></table>");}

mysql_query("UPDATE players SET club='$get_team', motiv=105 WHERE id='$coachid' LIMIT 1") or die(mysql_error());
mysql_query("UPDATE teams SET curmoney=curmoney-$price WHERE teamid='$get_team' LIMIT 1") or die(mysql_error());
$coachmdispl = number_format($price, 0, ',', '.');
mysql_query("INSERT INTO events VALUES ('', $get_team, NOW(), '<a href=coach.php?coachid=$coachid>$langmark085</a> $langmark086. $coachmdispl &euro; $langmark087.', 1, -$price);");
die ("<table cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">".$langmark088."<br/><a href=\"training.php\">".$langmark059."</a></td></tr></table>");
}

if ($action=='fire') {
if ($get_team<>$club) die("<table width=\"100%\" cellpadding=\"9\" cellspacing=\"9\"><tr bgcolor=\"#ffffff\"><td class=\"border\">".$langmark089."</td></tr></table>");
mysql_query("UPDATE players SET club=0, wage = (experience*(100*quality - 4000))/2, motiv=105 WHERE id='$coachid' LIMIT 1");
mysql_query("INSERT INTO events VALUES ('', $get_team, NOW(), '<a href=coach.php?coachid=$coachid>$langmark085</a> $langmark090.', 0, 0);");
die ("<table cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">".$langmark091."<br/><a href=\"coaches.php\">".$langmark092."</a></td></tr></table>");
}

if ($handling < 9) {$handling_dspl = $langmark111." (0)"; }
elseif ($handling > 8 AND $handling < 17) {$handling_dspl = $langmark096." (1)"; }
elseif ($handling > 16 AND $handling < 25) {$handling_dspl = $langmark097." (2)"; }
elseif ($handling > 24 AND $handling < 33) {$handling_dspl = $langmark098." (3)"; }
elseif ($handling > 32 AND $handling < 41) {$handling_dspl = $langmark099." (4)"; }
elseif ($handling > 40 AND $handling < 49) {$handling_dspl = $langmark100." (5)"; }
elseif ($handling > 48 AND $handling < 57) {$handling_dspl = $langmark101." (6)"; }
elseif ($handling > 56 AND $handling < 65) {$handling_dspl = $langmark102." (7)"; }
elseif ($handling > 64 AND $handling < 73) {$handling_dspl = $langmark103." (8)"; }
elseif ($handling > 72 AND $handling < 81) {$handling_dspl = $langmark104." (9)"; }
elseif ($handling > 80 AND $handling < 89) {$handling_dspl = $langmark105." (10)"; }
elseif ($handling > 88 AND $handling < 97) {$handling_dspl = $langmark106." (11)"; }
elseif ($handling > 96 AND $handling < 105) {$handling_dspl = $langmark107." (12)"; }
elseif ($handling > 104 AND $handling < 113) {$handling_dspl = $langmark108." (13)"; }
elseif ($handling > 112 AND $handling < 121) {$handling_dspl = $langmark109." (14)"; }
else $handling_dspl = $langmark110." (15)";

if ($speed < 9) {$speed_dspl = $langmark111." (0)"; }
elseif ($speed > 8 AND $speed < 17) {$speed_dspl = $langmark096." (1)"; }
elseif ($speed > 16 AND $speed < 25) {$speed_dspl = $langmark097." (2)"; }
elseif ($speed > 24 AND $speed < 33) {$speed_dspl = $langmark098." (3)"; }
elseif ($speed > 32 AND $speed < 41) {$speed_dspl = $langmark099." (4)"; }
elseif ($speed > 40 AND $speed < 49) {$speed_dspl = $langmark100." (5)"; }
elseif ($speed > 48 AND $speed < 57) {$speed_dspl = $langmark101." (6)"; }
elseif ($speed > 56 AND $speed < 65) {$speed_dspl = $langmark102." (7)"; }
elseif ($speed > 64 AND $speed < 73) {$speed_dspl = $langmark103." (8)"; }
elseif ($speed > 72 AND $speed < 81) {$speed_dspl = $langmark104." (9)"; }
elseif ($speed > 80 AND $speed < 89) {$speed_dspl = $langmark105." (10)"; }
elseif ($speed > 88 AND $speed < 97) {$speed_dspl = $langmark106." (11)"; }
elseif ($speed > 96 AND $speed < 105) {$speed_dspl = $langmark107." (12)"; }
elseif ($speed > 104 AND $speed < 113) {$speed_dspl = $langmark108." (13)"; }
elseif ($speed > 112 AND $speed < 121) {$speed_dspl = $langmark109." (14)"; }
else $speed_dspl = $langmark110." (15)";

if ($passing < 9) {$passing_dspl = $langmark111." (0)"; }
elseif ($passing > 8 AND $passing < 17) {$passing_dspl = $langmark096." (1)"; }
elseif ($passing > 16 AND $passing < 25) {$passing_dspl = $langmark097." (2)"; }
elseif ($passing > 24 AND $passing < 33) {$passing_dspl = $langmark098." (3)"; }
elseif ($passing > 32 AND $passing < 41) {$passing_dspl = $langmark099." (4)"; }
elseif ($passing > 40 AND $passing < 49) {$passing_dspl = $langmark100." (5)"; }
elseif ($passing > 48 AND $passing < 57) {$passing_dspl = $langmark101." (6)"; }
elseif ($passing > 56 AND $passing < 65) {$passing_dspl = $langmark102." (7)"; }
elseif ($passing > 64 AND $passing < 73) {$passing_dspl = $langmark103." (8)"; }
elseif ($passing > 72 AND $passing < 81) {$passing_dspl = $langmark104." (9)"; }
elseif ($passing > 80 AND $passing < 89) {$passing_dspl = $langmark105." (10)"; }
elseif ($passing > 88 AND $passing < 97) {$passing_dspl = $langmark106." (11)"; }
elseif ($passing > 96 AND $passing < 105) {$passing_dspl = $langmark107." (12)"; }
elseif ($passing > 104 AND $passing < 113) {$passing_dspl = $langmark108." (13)"; }
elseif ($passing > 112 AND $passing < 121) {$passing_dspl = $langmark109." (14)"; }
else $passing_dspl = $langmark110." (15)";

if ($vision < 9) {$vision_dspl = $langmark111." (0)"; }
elseif ($vision > 8 AND $vision < 17) {$vision_dspl = $langmark096." (1)"; }
elseif ($vision > 16 AND $vision < 25) {$vision_dspl = $langmark097." (2)"; }
elseif ($vision > 24 AND $vision < 33) {$vision_dspl = $langmark098." (3)"; }
elseif ($vision > 32 AND $vision < 41) {$vision_dspl = $langmark099." (4)"; }
elseif ($vision > 40 AND $vision < 49) {$vision_dspl = $langmark100." (5)"; }
elseif ($vision > 48 AND $vision < 57) {$vision_dspl = $langmark101." (6)"; }
elseif ($vision > 56 AND $vision < 65) {$vision_dspl = $langmark102." (7)"; }
elseif ($vision > 64 AND $vision < 73) {$vision_dspl = $langmark103." (8)"; }
elseif ($vision > 72 AND $vision < 81) {$vision_dspl = $langmark104." (9)"; }
elseif ($vision > 80 AND $vision < 89) {$vision_dspl = $langmark105." (10)"; }
elseif ($vision > 88 AND $vision < 97) {$vision_dspl = $langmark106." (11)"; }
elseif ($vision > 96 AND $vision < 105) {$vision_dspl = $langmark107." (12)"; }
elseif ($vision > 104 AND $vision < 113) {$vision_dspl = $langmark108." (13)"; }
elseif ($vision > 112 AND $vision < 121) {$vision_dspl = $langmark109." (14)"; }
else $vision_dspl = $langmark110." (15)";

if ($rebounds < 9) {$rebounds_dspl = $langmark111." (0)"; }
elseif ($rebounds > 8 AND $rebounds < 17) {$rebounds_dspl = $langmark096." (1)"; }
elseif ($rebounds > 16 AND $rebounds < 25) {$rebounds_dspl = $langmark097." (2)"; }
elseif ($rebounds > 24 AND $rebounds < 33) {$rebounds_dspl = $langmark098." (3)"; }
elseif ($rebounds > 32 AND $rebounds < 41) {$rebounds_dspl = $langmark099." (4)"; }
elseif ($rebounds > 40 AND $rebounds < 49) {$rebounds_dspl = $langmark100." (5)"; }
elseif ($rebounds > 48 AND $rebounds < 57) {$rebounds_dspl = $langmark101." (6)"; }
elseif ($rebounds > 56 AND $rebounds < 65) {$rebounds_dspl = $langmark102." (7)"; }
elseif ($rebounds > 64 AND $rebounds < 73) {$rebounds_dspl = $langmark103." (8)"; }
elseif ($rebounds > 72 AND $rebounds < 81) {$rebounds_dspl = $langmark104." (9)"; }
elseif ($rebounds > 80 AND $rebounds < 89) {$rebounds_dspl = $langmark105." (10)"; }
elseif ($rebounds > 88 AND $rebounds < 97) {$rebounds_dspl = $langmark106." (11)"; }
elseif ($rebounds > 96 AND $rebounds < 105) {$rebounds_dspl = $langmark107." (12)"; }
elseif ($rebounds > 104 AND $rebounds < 113) {$rebounds_dspl = $langmark108." (13)"; }
elseif ($rebounds > 112 AND $rebounds < 121) {$rebounds_dspl = $langmark109." (14)"; }
else $rebounds_dspl = $langmark110." (15)";

if ($position < 9) {$position_dspl = $langmark111." (0)"; }
elseif ($position > 8 AND $position < 17) {$position_dspl = $langmark096." (1)"; }
elseif ($position > 16 AND $position < 25) {$position_dspl = $langmark097." (2)"; }
elseif ($position > 24 AND $position < 33) {$position_dspl = $langmark098." (3)"; }
elseif ($position > 32 AND $position < 41) {$position_dspl = $langmark099." (4)"; }
elseif ($position > 40 AND $position < 49) {$position_dspl = $langmark100." (5)"; }
elseif ($position > 48 AND $position < 57) {$position_dspl = $langmark101." (6)"; }
elseif ($position > 56 AND $position < 65) {$position_dspl = $langmark102." (7)"; }
elseif ($position > 64 AND $position < 73) {$position_dspl = $langmark103." (8)"; }
elseif ($position > 72 AND $position < 81) {$position_dspl = $langmark104." (9)"; }
elseif ($position > 80 AND $position < 89) {$position_dspl = $langmark105." (10)"; }
elseif ($position > 88 AND $position < 97) {$position_dspl = $langmark106." (11)"; }
elseif ($position > 96 AND $position < 105) {$position_dspl = $langmark107." (12)"; }
elseif ($position > 104 AND $position < 113) {$position_dspl = $langmark108." (13)"; }
elseif ($position > 112 AND $position < 121) {$position_dspl = $langmark109." (14)"; }
else $position_dspl = $langmark110." (15)";

if ($shooting < 9) {$shooting_dspl = $langmark111." (0)"; }
elseif ($shooting > 8 AND $shooting < 17) {$shooting_dspl = $langmark096." (1)"; }
elseif ($shooting > 16 AND $shooting < 25) {$shooting_dspl = $langmark097." (2)"; }
elseif ($shooting > 24 AND $shooting < 33) {$shooting_dspl = $langmark098." (3)"; }
elseif ($shooting > 32 AND $shooting < 41) {$shooting_dspl = $langmark099." (4)"; }
elseif ($shooting > 40 AND $shooting < 49) {$shooting_dspl = $langmark100." (5)"; }
elseif ($shooting > 48 AND $shooting < 57) {$shooting_dspl = $langmark101." (6)"; }
elseif ($shooting > 56 AND $shooting < 65) {$shooting_dspl = $langmark102." (7)"; }
elseif ($shooting > 64 AND $shooting < 73) {$shooting_dspl = $langmark103." (8)"; }
elseif ($shooting > 72 AND $shooting < 81) {$shooting_dspl = $langmark104." (9)"; }
elseif ($shooting > 80 AND $shooting < 89) {$shooting_dspl = $langmark105." (10)"; }
elseif ($shooting > 88 AND $shooting < 97) {$shooting_dspl = $langmark106." (11)"; }
elseif ($shooting > 96 AND $shooting < 105) {$shooting_dspl = $langmark107." (12)"; }
elseif ($shooting > 104 AND $shooting < 113) {$shooting_dspl = $langmark108." (13)"; }
elseif ($shooting > 112 AND $shooting < 121) {$shooting_dspl = $langmark109." (14)"; }
else $shooting_dspl = $langmark110." (15)";

if ($freethrow < 9) {$freethrow_dspl = $langmark111." (0)"; }
elseif ($freethrow > 8 AND $freethrow < 17) {$freethrow_dspl = $langmark096." (1)"; }
elseif ($freethrow > 16 AND $freethrow < 25) {$freethrow_dspl = $langmark097." (2)"; }
elseif ($freethrow > 24 AND $freethrow < 33) {$freethrow_dspl = $langmark098." (3)"; }
elseif ($freethrow > 32 AND $freethrow < 41) {$freethrow_dspl = $langmark099." (4)"; }
elseif ($freethrow > 40 AND $freethrow < 49) {$freethrow_dspl = $langmark100." (5)"; }
elseif ($freethrow > 48 AND $freethrow < 57) {$freethrow_dspl = $langmark101." (6)"; }
elseif ($freethrow > 56 AND $freethrow < 65) {$freethrow_dspl = $langmark102." (7)"; }
elseif ($freethrow > 64 AND $freethrow < 73) {$freethrow_dspl = $langmark103." (8)"; }
elseif ($freethrow > 72 AND $freethrow < 81) {$freethrow_dspl = $langmark104." (9)"; }
elseif ($freethrow > 80 AND $freethrow < 89) {$freethrow_dspl = $langmark105." (10)"; }
elseif ($freethrow > 88 AND $freethrow < 97) {$freethrow_dspl = $langmark106." (11)"; }
elseif ($freethrow > 96 AND $freethrow < 105) {$freethrow_dspl = $langmark107." (12)"; }
elseif ($freethrow > 104 AND $freethrow < 113) {$freethrow_dspl = $langmark108." (13)"; }
elseif ($freethrow > 112 AND $freethrow < 121) {$freethrow_dspl = $langmark109." (14)"; }
else $freethrow_dspl = $langmark110." (15)";

if ($defense < 9) {$defense_dspl = $langmark111." (0)"; }
elseif ($defense > 8 AND $defense < 17) {$defense_dspl = $langmark096." (1)"; }
elseif ($defense > 16 AND $defense < 25) {$defense_dspl = $langmark097." (2)"; }
elseif ($defense > 24 AND $defense < 33) {$defense_dspl = $langmark098." (3)"; }
elseif ($defense > 32 AND $defense < 41) {$defense_dspl = $langmark099." (4)"; }
elseif ($defense > 40 AND $defense < 49) {$defense_dspl = $langmark100." (5)"; }
elseif ($defense > 48 AND $defense < 57) {$defense_dspl = $langmark101." (6)"; }
elseif ($defense > 56 AND $defense < 65) {$defense_dspl = $langmark102." (7)"; }
elseif ($defense > 64 AND $defense < 73) {$defense_dspl = $langmark103." (8)"; }
elseif ($defense > 72 AND $defense < 81) {$defense_dspl = $langmark104." (9)"; }
elseif ($defense > 80 AND $defense < 89) {$defense_dspl = $langmark105." (10)"; }
elseif ($defense > 88 AND $defense < 97) {$defense_dspl = $langmark106." (11)"; }
elseif ($defense > 96 AND $defense < 105) {$defense_dspl = $langmark107." (12)"; }
elseif ($defense > 104 AND $defense < 113) {$defense_dspl = $langmark108." (13)"; }
elseif ($defense > 112 AND $defense < 121) {$defense_dspl = $langmark109." (14)"; }
else $defense_dspl = $langmark110." (15)";

if ($workrate < 9) {$workrate_dspl = $langmark111." (0)"; }
elseif ($workrate > 8 AND $workrate < 17) {$workrate_dspl = $langmark096." (1)"; }
elseif ($workrate > 16 AND $workrate < 25) {$workrate_dspl = $langmark097." (2)"; }
elseif ($workrate > 24 AND $workrate < 33) {$workrate_dspl = $langmark098." (3)"; }
elseif ($workrate > 32 AND $workrate < 41) {$workrate_dspl = $langmark099." (4)"; }
elseif ($workrate > 40 AND $workrate < 49) {$workrate_dspl = $langmark100." (5)"; }
elseif ($workrate > 48 AND $workrate < 57) {$workrate_dspl = $langmark101." (6)"; }
elseif ($workrate > 56 AND $workrate < 65) {$workrate_dspl = $langmark102." (7)"; }
elseif ($workrate > 64 AND $workrate < 73) {$workrate_dspl = $langmark103." (8)"; }
elseif ($workrate > 72 AND $workrate < 81) {$workrate_dspl = $langmark104." (9)"; }
elseif ($workrate > 80 AND $workrate < 89) {$workrate_dspl = $langmark105." (10)"; }
elseif ($workrate > 88 AND $workrate < 97) {$workrate_dspl = $langmark106." (11)"; }
elseif ($workrate > 96 AND $workrate < 105) {$workrate_dspl = $langmark107." (12)"; }
elseif ($workrate > 104 AND $workrate < 113) {$workrate_dspl = $langmark108." (13)"; }
elseif ($workrate > 112 AND $workrate < 121) {$workrate_dspl = $langmark109." (14)"; }
else $workrate_dspl = $langmark110." (15)";

if ($experience < 9) {$experience_dspl = $langmark111." (0)"; }
elseif ($experience > 8 AND $experience < 17) {$experience_dspl = $langmark096." (1)"; }
elseif ($experience > 16 AND $experience < 25) {$experience_dspl = $langmark097." (2)"; }
elseif ($experience > 24 AND $experience < 33) {$experience_dspl = $langmark098." (3)"; }
elseif ($experience > 32 AND $experience < 41) {$experience_dspl = $langmark099." (4)"; }
elseif ($experience > 40 AND $experience < 49) {$experience_dspl = $langmark100." (5)"; }
elseif ($experience > 48 AND $experience < 57) {$experience_dspl = $langmark101." (6)"; }
elseif ($experience > 56 AND $experience < 65) {$experience_dspl = $langmark102." (7)"; }
elseif ($experience > 64 AND $experience < 73) {$experience_dspl = $langmark103." (8)"; }
elseif ($experience > 72 AND $experience < 81) {$experience_dspl = $langmark104." (9)"; }
elseif ($experience > 80 AND $experience < 89) {$experience_dspl = $langmark105." (10)"; }
elseif ($experience > 88 AND $experience < 97) {$experience_dspl = $langmark106." (11)"; }
elseif ($experience > 96 AND $experience < 105) {$experience_dspl = $langmark107." (12)"; }
elseif ($experience > 104 AND $experience < 113) {$experience_dspl = $langmark108." (13)"; }
elseif ($experience > 112 AND $experience < 121) {$experience_dspl = $langmark109." (14)"; }
else $experience_dspl = $langmark110." (15)";

SWITCH (TRUE) {
CASE ($charac < 4): $spec_txt=$langmark763; break;
CASE ($charac > 3 && $charac < 7): $spec_txt=$langmark764; break;
CASE ($charac > 6 && $charac < 11): $spec_txt=$langmark765; break;
CASE ($charac > 10 && $charac < 14): $spec_txt=$langmark766; break;
CASE ($charac > 13 && $charac < 17): $spec_txt=$langmark767; break;
CASE ($charac > 16 && $charac < 20): $spec_txt=$langmark768; break;
CASE ($charac > 19 && $charac < 23): $spec_txt='dirty'; break;
CASE ($charac > 22 && $charac < 26): $spec_txt='clumsy'; break;
CASE ($charac > 25 && $charac < 30): $spec_txt='explosive'; break;
CASE ($charac > 29 && $charac < 33): $spec_txt='loyal'; break;
CASE ($charac > 32 && $charac < 35): $spec_txt='wise'; break;
CASE ($charac > 34 && $charac < 39): $spec_txt='fragile'; break;
CASE ($charac > 38 && $charac < 41): $spec_txt='tough'; break;
CASE ($charac > 40 && $charac < 44): $spec_txt='lazy'; break;
}

$feetheight = floor((100*$height)/3048);
$tempheight = $height - ($feetheight*3048/100);
$inchheight = round((100*$tempheight)/254);
if ($inchheight==12) {
$feetheight=$feetheight+1; $inchheight='';
$usheight = $feetheight."'0";}
else {$usheight = $feetheight.".".$inchheight;}
$usweight = round ($weight * 22046 / 10000);
$diswage = number_format($wage, 0, ',', '.');
$disprice = number_format($price, 0, ',', '.');
?>
<table border="0" cellspacing="10" cellpadding="10" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="65%">

<?php
echo "<b>".$name." ".$surname." (".$coachid.")</b>";
if ($is_supporter==1) {echo "&nbsp;<a href=\"coach.php?coachid=",$coachid,"&action=bookmark\"><img src=\"img/bookmark.jpg\" border=\"0\" alt=\"",$langmark112,"\" title=\"",$langmark112,"\"></a>";}
echo "<br/><br/>";

//bari
$YTBAR = 100 * ($workrate/10 + $experience/6 + 2*($hskill-40)) / 68;
if ($YTBAR > 100) {$YTBAR=100;}
if ($workrate > 121) {$tempwr = 121;} else {$tempwr=$workrate;}
if ($motiv > 99.99) {$STBAR = 100 * $tempwr / 121;} else {$STBAR = (100 * $tempwr * $motiv/100) / 121;}
$FTBAR = 100 * $experience / 121; if ($FTBAR > 100) {$FTBAR = 100;}

echo "<b>",round($STBAR),"/100</b> - ability to develop senior team players<br/>";
$colR = round(200-$STBAR-$STBAR);
$colG = round(2*$STBAR);
?>
<div style="height:7px; width:200px;background-color:#ffffff;position:relative; overflow:hidden; border: 1px solid #000000;">
<div style="position:absolute;top:0px;left:0px;background-color:rgb(<?=$colR?>,<?=$colG?>,73); width:<?=$colG?>px;height:7px"></div>
<div style="position:absolute;top:0px;left:<?=$colG?>px;background-color:rgb(255,255,255); width:<?=$colR?>px;height:7px;border-right: 1px solid #000000;"></div></div>
<?php
echo "<b>",round($YTBAR),"/100</b> - ability to develop youth team players<br/>";
$colR = round(200-$YTBAR-$YTBAR);
$colG = round(2*$YTBAR);
?>
<div style="height:7px; width:200px;background-color:#ffffff;position:relative; overflow:hidden; border: 1px solid #000000;">
<div style="position:absolute;top:0px;left:0px;background-color:rgb(<?=$colR?>,<?=$colG?>,73); width:<?=$colG?>px;height:7px"></div>
<div style="position:absolute;top:0px;left:<?=$colG?>px;background-color:rgb(255,255,255); width:<?=$colR?>px;height:7px;border-right: 1px solid #000000;"></div></div>
<?php
/*
echo "<b>",round($FTBAR),"/100</b> - ability to influence players on court<br/>";
?>
<div style="height:7px; width:200px;background-color:#ffffff;position:relative; overflow:hidden; border: 1px solid #000000;">
<div style="position:absolute;top:0px;left:0px;background-color:rgb(51,168,45); width:<?=($FTBAR*2)?>px;height:7px"></div>
<div style="position:absolute;top:0px;left:<?=($FTBAR*2)?>px;background-color:rgb(255,255,255); width:<?=(200-$FTBAR-$FTBAR)?>px;height:7px;border-right: 1px solid #000000;"></div></div>
<?php
*/
?>

<br/><table><tr><td>
<b><?=$langmark113?>:</b> <?=$age?><br/>
<b><?=$langmark114?>:</b> <?=$country?><br/>
<b><?=$langmark115?>:</b> <?=$spec_txt?><br/>
<b><?=$langmark116?>:</b> <?=$height?> cm (<?=$usheight?> ft)<br/>
<b><?=$langmark117?>:</b> <?=round($weight)?> kg (<?=$usweight?> lb)<br/>
<b><?=$langmark118?>:</b> <?=$diswage," &euro; / ",$langmark382?><br/>
<b><?=$langmark119?>:</b> <?=$disprice?> &euro;<br/>
<?php
echo "<b>Working with youth:</b>&nbsp;";
SWITCH (TRUE) {
CASE ($hskill < 43): echo $langmark096; break;
CASE ($hskill > 42 && $hskill < 46): echo $langmark098; break;
CASE ($hskill > 45 && $hskill < 49): echo $langmark100; break;
CASE ($hskill > 48 && $hskill < 52): echo $langmark102; break;
CASE ($hskill > 51 && $hskill < 55): echo $langmark104; break;
CASE ($hskill > 54 && $hskill < 58): echo $langmark106; break;
CASE ($hskill > 57): echo $langmark108; break;
}
?>
</td></tr></table>

<br/><table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr><td width="74"><b><?=$langmark120?>:</b></td><td width="130"> <?=$handling_dspl?></td>
<td width="76"><b><?=$langmark121?>:</b></td><td width="118"> <?=$speed_dspl?></td></tr>
<tr><td><b><?=$langmark122?>:</b></td><td> <?=$passing_dspl?></td>
<td><b><?=$langmark123?>:</b></td><td> <?=$vision_dspl?></td></tr>
<tr><td><b><?=$langmark124?>:</b></td><td> <?=$rebounds_dspl?></td>
<td><b><?=$langmark125?>:</b></td><td> <?=$position_dspl?></td></tr>
<tr><td><b><?=$langmark126?>:</b></td><td> <?=$shooting_dspl?></td>
<td><b><?=$langmark127?>:</b></td><td> <?=$freethrow_dspl?></td></tr>
<tr><td><b><?=$langmark128?>:</b></td><td> <?=$defense_dspl?></td>
<td><b><?=$langmark129?>:</b></td><td> <?=$workrate_dspl?></td></tr>
<tr><td><b><?=$langmark130?>:</b></td><td> <?=$experience_dspl?></td>
<td><b><?=$langmark131?>:</b></td><td> <?=$motiv?>%</td></tr></table>
<br/>
<a href="javascript: history.go(-1)"><?=$langmark132?></a>
</td>
<td class="border" width="35%">
<h2><?=$langmark133?></h2><br/>
<?php
if ($club==0 AND ($age > 60 OR $experience >= 122)) {echo "<b>This is a retired coach, so there is no way to sign him.</b>";}
else {
$result15 = mysql_query("SELECT id FROM players WHERE coach =1 && club ='$get_team'");
if (!mysql_num_rows($result15)) {

if (!$action) {$action='normal';}
SWITCH ($action) {
CASE 'normal': echo "<a href=\"gamerules.php?action=all&#35;coachez\">Read rules about coaches</a><br/><a href=\"coach.php?coachid=",$coachid,"&action=thire\">",$langmark135,"</a>"; break;
CASE 'thire': echo "<a href=\"gamerules.php?action=all&#35;coachez\">Read rules about coaches</a><br/><br/><b>",$langmark135,"</b><br/><a href=\"coach.php?coachid=",$coachid,"&action=hire\">Confirm</a><br/><a href=\"coach.php?coachid=",$coachid,"\">Cancel</a>"; break;
}

}
else {
if ($club==0) {echo $langmark136;}
if ($club>0) {
$jaka = @mysql_query("SELECT name FROM teams WHERE teamid=$club LIMIT 1");
$idak = @mysql_result($jaka,0,"name");
echo "This coach is under valid contract with <a href=\"redirect.php?teamid=",$club,"\">",stripslashes($idak),"</a>, so you can't sign him!";
}
}
}
?>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>