<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT club, supporter, lang, country FROM users, teams WHERE club=teamid AND password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)) {
$get_team = mysql_result($compare,0,"club");
$is_supporter = mysql_result($compare,0,"supporter");
$lang = mysql_result ($compare,0,"lang");
$merika = mysql_result ($compare,0,"country");
}
else {die(include 'basketsim.php');}

if (isset($_POST['submit40'])){
$nofp = $_POST['nofp'];
$ko=0;
while ($ko < $nofp) {
$shirtck = "shirtnum_".$ko;
$playerck = "playernum_".$ko;
$numigraca = $_POST["$shirtck"];
$idigraca = $_POST["$playerck"];
$preveter = mysql_query("SELECT id FROM players WHERE shirt >0 AND shirt ='$numigraca' AND coach=9 AND club ='$get_team'") or die(mysql_error());
if (!(mysql_num_rows($preveter)>0)) {mysql_query("UPDATE players SET shirt ='$numigraca' WHERE coach=9 AND id ='$idigraca' LIMIT 1") or die(mysql_error());}
$ko++;
}
header("Location: yteam.php?changenow=numbers");
}

$sort = $_POST['sort'];
if (strlen($sort)>8) {$sort=NULL;}
if (!$sort || $sort=='shirt') {$result = mysql_query("SELECT *, IF (shirt IS NULL || shirt ='' || shirt=0, 1, 0) AS isnull FROM players WHERE club ='$get_team' AND coach=9 ORDER BY isnull ASC, shirt ASC, wage DESC");}
elseif ($sort=='age') {$result = mysql_query("SELECT * FROM players WHERE coach=9 AND club=$get_team ORDER BY age ASC") or die(mysql_error());}
elseif ($sort=='height' OR $sort=='weight' OR $sort=='workrate') {$result = mysql_query("SELECT * FROM players WHERE coach=9 AND club=$get_team ORDER BY $sort DESC") or die(mysql_error());}
elseif ($sort=='training') {$result = mysql_query("SELECT * FROM players WHERE coach=9 AND club=$get_team ORDER BY motiv ASC") or die(mysql_error());}
elseif ($sort=='skillsum') {$result = mysql_query("SELECT * FROM players WHERE coach=9 AND club=$get_team ORDER BY `handling` + `speed` + `passing` + `vision` + `rebounds` + `position` + `freethrow` + `shooting` + `defense` DESC") or die(mysql_error());}
$num=mysql_num_rows($result);

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2>YOUTH TEAM</h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="63%">

<?php
$snl=0;
while ($i = mysql_fetch_array($result)) {
$id=$i[id];
$name=$i[name];
$surname=$i[surname];
$age=$i[age];
$club=$i[club];
$country=$i[country];
$charac=$i[charac];
$height=$i[height];
$weight=$i[weight];
$handling=$i[handling];
$speed=$i[speed];
$passing=$i[passing];
$vision=$i[vision];
$rebounds=$i[rebounds];
$position=$i[position];
$freethrow=$i[freethrow];
$shooting=$i[shooting];
$defense=$i[defense];
$workrate=$i[workrate];
$experience=$i[experience];
$fatigue=$i[fatigue];
$wage=$i[wage];
$remaining=$i[motiv];
$injury_time=$i[injury];
$hulahup=$i[shirt];
if ($id >0) {$snl = $snl+1;}
if ($country=='Bosnia') {$country='Bosnia and Herzegovina';}

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

if ($handling < 9 AND $lang != 'isr') {$handling_dspl = $langmark111." (0)"; }
elseif ($handling > 8 AND $handling < 17 AND $lang != 'isr') {$handling_dspl = $langmark096." (1)";}
elseif ($handling > 16 AND $handling < 25 AND $lang != 'isr') {$handling_dspl = $langmark097." (2)";}
elseif ($handling > 24 AND $handling < 33 AND $lang != 'isr') {$handling_dspl = $langmark098." (3)";}
elseif ($handling > 32 AND $handling < 41 AND $lang != 'isr') {$handling_dspl = $langmark099." (4)";}
elseif ($handling > 40 AND $handling < 49 AND $lang != 'isr') {$handling_dspl = $langmark100." (5)";}
elseif ($handling > 48 AND $handling < 57 AND $lang != 'isr') {$handling_dspl = $langmark101." (6)";}
elseif ($handling > 56 AND $handling < 65 AND $lang != 'isr') {$handling_dspl = $langmark102." (7)";}
elseif ($handling > 64 AND $handling < 73 AND $lang != 'isr') {$handling_dspl = $langmark103." (8)";}
elseif ($handling > 72 AND $handling < 81 AND $lang != 'isr') {$handling_dspl = $langmark104." (9)";}
elseif ($handling > 80 AND $handling < 89 AND $lang != 'isr') {$handling_dspl = $langmark105." (10)";}
elseif ($handling > 88 AND $handling < 97 AND $lang != 'isr') {$handling_dspl = $langmark106." (11)";}
elseif ($handling > 96 AND $handling < 105 AND $lang != 'isr') {$handling_dspl = $langmark107." (12)";}
elseif ($handling > 104 AND $handling < 113 AND $lang != 'isr') {$handling_dspl = $langmark108." (13)";}
elseif ($handling > 112 AND $handling < 121 AND $lang != 'isr') {$handling_dspl = $langmark109." (14)";}
elseif ($handling >= 121 AND $lang != 'isr') {$handling_dspl = $langmark110." (15)";}

if ($speed < 9 AND $lang != 'isr') {$speed_dspl = $langmark111." (0)"; }
elseif ($speed > 8 AND $speed < 17 AND $lang != 'isr') {$speed_dspl = $langmark096." (1)";}
elseif ($speed > 16 AND $speed < 25 AND $lang != 'isr') {$speed_dspl = $langmark097." (2)";}
elseif ($speed > 24 AND $speed < 33 AND $lang != 'isr') {$speed_dspl = $langmark098." (3)";}
elseif ($speed > 32 AND $speed < 41 AND $lang != 'isr') {$speed_dspl = $langmark099." (4)";}
elseif ($speed > 40 AND $speed < 49 AND $lang != 'isr') {$speed_dspl = $langmark100." (5)";}
elseif ($speed > 48 AND $speed < 57 AND $lang != 'isr') {$speed_dspl = $langmark101." (6)";}
elseif ($speed > 56 AND $speed < 65 AND $lang != 'isr') {$speed_dspl = $langmark102." (7)";}
elseif ($speed > 64 AND $speed < 73 AND $lang != 'isr') {$speed_dspl = $langmark103." (8)";}
elseif ($speed > 72 AND $speed < 81 AND $lang != 'isr') {$speed_dspl = $langmark104." (9)";}
elseif ($speed > 80 AND $speed < 89 AND $lang != 'isr') {$speed_dspl = $langmark105." (10)";}
elseif ($speed > 88 AND $speed < 97 AND $lang != 'isr') {$speed_dspl = $langmark106." (11)";}
elseif ($speed > 96 AND $speed < 105 AND $lang != 'isr') {$speed_dspl = $langmark107." (12)";}
elseif ($speed > 104 AND $speed < 113 AND $lang != 'isr') {$speed_dspl = $langmark108." (13)";}
elseif ($speed > 112 AND $speed < 121 AND $lang != 'isr') {$speed_dspl = $langmark109." (14)";}
elseif ($speed >= 121 AND $lang != 'isr') {$speed_dspl = $langmark110." (15)";}

if ($passing < 9 AND $lang != 'isr') {$passing_dspl = $langmark111." (0)"; }
elseif ($passing > 8 AND $passing < 17 AND $lang != 'isr') {$passing_dspl = $langmark096." (1)";}
elseif ($passing > 16 AND $passing < 25 AND $lang != 'isr') {$passing_dspl = $langmark097." (2)";}
elseif ($passing > 24 AND $passing < 33 AND $lang != 'isr') {$passing_dspl = $langmark098." (3)";}
elseif ($passing > 32 AND $passing < 41 AND $lang != 'isr') {$passing_dspl = $langmark099." (4)";}
elseif ($passing > 40 AND $passing < 49 AND $lang != 'isr') {$passing_dspl = $langmark100." (5)";}
elseif ($passing > 48 AND $passing < 57 AND $lang != 'isr') {$passing_dspl = $langmark101." (6)";}
elseif ($passing > 56 AND $passing < 65 AND $lang != 'isr') {$passing_dspl = $langmark102." (7)";}
elseif ($passing > 64 AND $passing < 73 AND $lang != 'isr') {$passing_dspl = $langmark103." (8)";}
elseif ($passing > 72 AND $passing < 81 AND $lang != 'isr') {$passing_dspl = $langmark104." (9)";}
elseif ($passing > 80 AND $passing < 89 AND $lang != 'isr') {$passing_dspl = $langmark105." (10)";}
elseif ($passing > 88 AND $passing < 97 AND $lang != 'isr') {$passing_dspl = $langmark106." (11)";}
elseif ($passing > 96 AND $passing < 105 AND $lang != 'isr') {$passing_dspl = $langmark107." (12)";}
elseif ($passing > 104 AND $passing < 113 AND $lang != 'isr') {$passing_dspl = $langmark108." (13)";}
elseif ($passing > 112 AND $passing < 121 AND $lang != 'isr') {$passing_dspl = $langmark109." (14)";}
elseif ($passing >= 121 AND $lang != 'isr') {$passing_dspl = $langmark110." (15)";}

if ($vision < 9 AND $lang != 'isr') {$vision_dspl = $langmark111." (0)"; }
elseif ($vision > 8 AND $vision < 17 AND $lang != 'isr') {$vision_dspl = $langmark096." (1)";}
elseif ($vision > 16 AND $vision < 25 AND $lang != 'isr') {$vision_dspl = $langmark097." (2)";}
elseif ($vision > 24 AND $vision < 33 AND $lang != 'isr') {$vision_dspl = $langmark098." (3)";}
elseif ($vision > 32 AND $vision < 41 AND $lang != 'isr') {$vision_dspl = $langmark099." (4)";}
elseif ($vision > 40 AND $vision < 49 AND $lang != 'isr') {$vision_dspl = $langmark100." (5)";}
elseif ($vision > 48 AND $vision < 57 AND $lang != 'isr') {$vision_dspl = $langmark101." (6)";}
elseif ($vision > 56 AND $vision < 65 AND $lang != 'isr') {$vision_dspl = $langmark102." (7)";}
elseif ($vision > 64 AND $vision < 73 AND $lang != 'isr') {$vision_dspl = $langmark103." (8)";}
elseif ($vision > 72 AND $vision < 81 AND $lang != 'isr') {$vision_dspl = $langmark104." (9)";}
elseif ($vision > 80 AND $vision < 89 AND $lang != 'isr') {$vision_dspl = $langmark105." (10)";}
elseif ($vision > 88 AND $vision < 97 AND $lang != 'isr') {$vision_dspl = $langmark106." (11)";}
elseif ($vision > 96 AND $vision < 105 AND $lang != 'isr') {$vision_dspl = $langmark107." (12)";}
elseif ($vision > 104 AND $vision < 113 AND $lang != 'isr') {$vision_dspl = $langmark108." (13)";}
elseif ($vision > 112 AND $vision < 121 AND $lang != 'isr') {$vision_dspl = $langmark109." (14)";}
elseif ($vision >= 121 AND $lang != 'isr') {$vision_dspl = $langmark110." (15)";}

if ($rebounds < 9 AND $lang != 'isr') {$rebounds_dspl = $langmark111." (0)"; }
elseif ($rebounds > 8 AND $rebounds < 17 AND $lang != 'isr') {$rebounds_dspl = $langmark096." (1)";}
elseif ($rebounds > 16 AND $rebounds < 25 AND $lang != 'isr') {$rebounds_dspl = $langmark097." (2)";}
elseif ($rebounds > 24 AND $rebounds < 33 AND $lang != 'isr') {$rebounds_dspl = $langmark098." (3)";}
elseif ($rebounds > 32 AND $rebounds < 41 AND $lang != 'isr') {$rebounds_dspl = $langmark099." (4)";}
elseif ($rebounds > 40 AND $rebounds < 49 AND $lang != 'isr') {$rebounds_dspl = $langmark100." (5)";}
elseif ($rebounds > 48 AND $rebounds < 57 AND $lang != 'isr') {$rebounds_dspl = $langmark101." (6)";}
elseif ($rebounds > 56 AND $rebounds < 65 AND $lang != 'isr') {$rebounds_dspl = $langmark102." (7)";}
elseif ($rebounds > 64 AND $rebounds < 73 AND $lang != 'isr') {$rebounds_dspl = $langmark103." (8)";}
elseif ($rebounds > 72 AND $rebounds < 81 AND $lang != 'isr') {$rebounds_dspl = $langmark104." (9)";}
elseif ($rebounds > 80 AND $rebounds < 89 AND $lang != 'isr') {$rebounds_dspl = $langmark105." (10)";}
elseif ($rebounds > 88 AND $rebounds < 97 AND $lang != 'isr') {$rebounds_dspl = $langmark106." (11)";}
elseif ($rebounds > 96 AND $rebounds < 105 AND $lang != 'isr') {$rebounds_dspl = $langmark107." (12)";}
elseif ($rebounds > 104 AND $rebounds < 113 AND $lang != 'isr') {$rebounds_dspl = $langmark108." (13)";}
elseif ($rebounds > 112 AND $rebounds < 121 AND $lang != 'isr') {$rebounds_dspl = $langmark109." (14)";}
elseif ($rebounds >= 121 AND $lang != 'isr') {$rebounds_dspl = $langmark110." (15)";}

if ($position < 9 AND $lang != 'isr') {$position_dspl = $langmark111." (0)"; }
elseif ($position > 8 AND $position < 17 AND $lang != 'isr') {$position_dspl = $langmark096." (1)";}
elseif ($position > 16 AND $position < 25 AND $lang != 'isr') {$position_dspl = $langmark097." (2)";}
elseif ($position > 24 AND $position < 33 AND $lang != 'isr') {$position_dspl = $langmark098." (3)";}
elseif ($position > 32 AND $position < 41 AND $lang != 'isr') {$position_dspl = $langmark099." (4)";}
elseif ($position > 40 AND $position < 49 AND $lang != 'isr') {$position_dspl = $langmark100." (5)";}
elseif ($position > 48 AND $position < 57 AND $lang != 'isr') {$position_dspl = $langmark101." (6)";}
elseif ($position > 56 AND $position < 65 AND $lang != 'isr') {$position_dspl = $langmark102." (7)";}
elseif ($position > 64 AND $position < 73 AND $lang != 'isr') {$position_dspl = $langmark103." (8)";}
elseif ($position > 72 AND $position < 81 AND $lang != 'isr') {$position_dspl = $langmark104." (9)";}
elseif ($position > 80 AND $position < 89 AND $lang != 'isr') {$position_dspl = $langmark105." (10)";}
elseif ($position > 88 AND $position < 97 AND $lang != 'isr') {$position_dspl = $langmark106." (11)";}
elseif ($position > 96 AND $position < 105 AND $lang != 'isr') {$position_dspl = $langmark107." (12)";}
elseif ($position > 104 AND $position < 113 AND $lang != 'isr') {$position_dspl = $langmark108." (13)";}
elseif ($position > 112 AND $position < 121 AND $lang != 'isr') {$position_dspl = $langmark109." (14)";}
elseif ($position >= 121 AND $lang != 'isr') {$position_dspl = $langmark110." (15)";}

if ($shooting < 9 AND $lang != 'isr') {$shooting_dspl = $langmark111." (0)"; }
elseif ($shooting > 8 AND $shooting < 17 AND $lang != 'isr') {$shooting_dspl = $langmark096." (1)";}
elseif ($shooting > 16 AND $shooting < 25 AND $lang != 'isr') {$shooting_dspl = $langmark097." (2)";}
elseif ($shooting > 24 AND $shooting < 33 AND $lang != 'isr') {$shooting_dspl = $langmark098." (3)";}
elseif ($shooting > 32 AND $shooting < 41 AND $lang != 'isr') {$shooting_dspl = $langmark099." (4)";}
elseif ($shooting > 40 AND $shooting < 49 AND $lang != 'isr') {$shooting_dspl = $langmark100." (5)";}
elseif ($shooting > 48 AND $shooting < 57 AND $lang != 'isr') {$shooting_dspl = $langmark101." (6)";}
elseif ($shooting > 56 AND $shooting < 65 AND $lang != 'isr') {$shooting_dspl = $langmark102." (7)";}
elseif ($shooting > 64 AND $shooting < 73 AND $lang != 'isr') {$shooting_dspl = $langmark103." (8)";}
elseif ($shooting > 72 AND $shooting < 81 AND $lang != 'isr') {$shooting_dspl = $langmark104." (9)";}
elseif ($shooting > 80 AND $shooting < 89 AND $lang != 'isr') {$shooting_dspl = $langmark105." (10)";}
elseif ($shooting > 88 AND $shooting < 97 AND $lang != 'isr') {$shooting_dspl = $langmark106." (11)";}
elseif ($shooting > 96 AND $shooting < 105 AND $lang != 'isr') {$shooting_dspl = $langmark107." (12)";}
elseif ($shooting > 104 AND $shooting < 113 AND $lang != 'isr') {$shooting_dspl = $langmark108." (13)";}
elseif ($shooting > 112 AND $shooting < 121 AND $lang != 'isr') {$shooting_dspl = $langmark109." (14)";}
elseif ($shooting >= 121 AND $lang != 'isr') {$shooting_dspl = $langmark110." (15)";}

if ($freethrow < 9 AND $lang != 'isr') {$freethrow_dspl = $langmark111." (0)"; }
elseif ($freethrow > 8 AND $freethrow < 17 AND $lang != 'isr') {$freethrow_dspl = $langmark096." (1)";}
elseif ($freethrow > 16 AND $freethrow < 25 AND $lang != 'isr') {$freethrow_dspl = $langmark097." (2)";}
elseif ($freethrow > 24 AND $freethrow < 33 AND $lang != 'isr') {$freethrow_dspl = $langmark098." (3)";}
elseif ($freethrow > 32 AND $freethrow < 41 AND $lang != 'isr') {$freethrow_dspl = $langmark099." (4)";}
elseif ($freethrow > 40 AND $freethrow < 49 AND $lang != 'isr') {$freethrow_dspl = $langmark100." (5)";}
elseif ($freethrow > 48 AND $freethrow < 57 AND $lang != 'isr') {$freethrow_dspl = $langmark101." (6)";}
elseif ($freethrow > 56 AND $freethrow < 65 AND $lang != 'isr') {$freethrow_dspl = $langmark102." (7)";}
elseif ($freethrow > 64 AND $freethrow < 73 AND $lang != 'isr') {$freethrow_dspl = $langmark103." (8)";}
elseif ($freethrow > 72 AND $freethrow < 81 AND $lang != 'isr') {$freethrow_dspl = $langmark104." (9)";}
elseif ($freethrow > 80 AND $freethrow < 89 AND $lang != 'isr') {$freethrow_dspl = $langmark105." (10)";}
elseif ($freethrow > 88 AND $freethrow < 97 AND $lang != 'isr') {$freethrow_dspl = $langmark106." (11)";}
elseif ($freethrow > 96 AND $freethrow < 105 AND $lang != 'isr') {$freethrow_dspl = $langmark107." (12)";}
elseif ($freethrow > 104 AND $freethrow < 113 AND $lang != 'isr') {$freethrow_dspl = $langmark108." (13)";}
elseif ($freethrow > 112 AND $freethrow < 121 AND $lang != 'isr') {$freethrow_dspl = $langmark109." (14)";}
elseif ($freethrow >= 121 AND $lang != 'isr') {$freethrow_dspl = $langmark110." (15)";}

if ($defense < 9 AND $lang != 'isr') {$defense_dspl = $langmark111." (0)"; }
elseif ($defense > 8 AND $defense < 17 AND $lang != 'isr') {$defense_dspl = $langmark096." (1)";}
elseif ($defense > 16 AND $defense < 25 AND $lang != 'isr') {$defense_dspl = $langmark097." (2)";}
elseif ($defense > 24 AND $defense < 33 AND $lang != 'isr') {$defense_dspl = $langmark098." (3)";}
elseif ($defense > 32 AND $defense < 41 AND $lang != 'isr') {$defense_dspl = $langmark099." (4)";}
elseif ($defense > 40 AND $defense < 49 AND $lang != 'isr') {$defense_dspl = $langmark100." (5)";}
elseif ($defense > 48 AND $defense < 57 AND $lang != 'isr') {$defense_dspl = $langmark101." (6)";}
elseif ($defense > 56 AND $defense < 65 AND $lang != 'isr') {$defense_dspl = $langmark102." (7)";}
elseif ($defense > 64 AND $defense < 73 AND $lang != 'isr') {$defense_dspl = $langmark103." (8)";}
elseif ($defense > 72 AND $defense < 81 AND $lang != 'isr') {$defense_dspl = $langmark104." (9)";}
elseif ($defense > 80 AND $defense < 89 AND $lang != 'isr') {$defense_dspl = $langmark105." (10)";}
elseif ($defense > 88 AND $defense < 97 AND $lang != 'isr') {$defense_dspl = $langmark106." (11)";}
elseif ($defense > 96 AND $defense < 105 AND $lang != 'isr') {$defense_dspl = $langmark107." (12)";}
elseif ($defense > 104 AND $defense < 113 AND $lang != 'isr') {$defense_dspl = $langmark108." (13)";}
elseif ($defense > 112 AND $defense < 121 AND $lang != 'isr') {$defense_dspl = $langmark109." (14)";}
elseif ($defense >= 121 AND $lang != 'isr') {$defense_dspl = $langmark110." (15)";}

if ($workrate < 9 AND $lang != 'isr') {$workrate_dspl = $langmark111." (0)"; }
elseif ($workrate > 8 AND $workrate < 17 AND $lang != 'isr') {$workrate_dspl = $langmark096." (1)";}
elseif ($workrate > 16 AND $workrate < 25 AND $lang != 'isr') {$workrate_dspl = $langmark097." (2)";}
elseif ($workrate > 24 AND $workrate < 33 AND $lang != 'isr') {$workrate_dspl = $langmark098." (3)";}
elseif ($workrate > 32 AND $workrate < 41 AND $lang != 'isr') {$workrate_dspl = $langmark099." (4)";}
elseif ($workrate > 40 AND $workrate < 49 AND $lang != 'isr') {$workrate_dspl = $langmark100." (5)";}
elseif ($workrate > 48 AND $workrate < 57 AND $lang != 'isr') {$workrate_dspl = $langmark101." (6)";}
elseif ($workrate > 56 AND $workrate < 65 AND $lang != 'isr') {$workrate_dspl = $langmark102." (7)";}
elseif ($workrate > 64 AND $workrate < 73 AND $lang != 'isr') {$workrate_dspl = $langmark103." (8)";}
elseif ($workrate > 72 AND $workrate < 81 AND $lang != 'isr') {$workrate_dspl = $langmark104." (9)";}
elseif ($workrate > 80 AND $workrate < 89 AND $lang != 'isr') {$workrate_dspl = $langmark105." (10)";}
elseif ($workrate > 88 AND $workrate < 97 AND $lang != 'isr') {$workrate_dspl = $langmark106." (11)";}
elseif ($workrate > 96 AND $workrate < 105 AND $lang != 'isr') {$workrate_dspl = $langmark107." (12)";}
elseif ($workrate > 104 AND $workrate < 113 AND $lang != 'isr') {$workrate_dspl = $langmark108." (13)";}
elseif ($workrate > 112 AND $workrate < 121 AND $lang != 'isr') {$workrate_dspl = $langmark109." (14)";}
elseif ($workrate >= 121 AND $lang != 'isr') {$workrate_dspl = $langmark110." (15)";}

if ($experience < 9 AND $lang != 'isr') {$experience_dspl = $langmark111." (0)";}
elseif ($experience > 8 AND $experience < 17 AND $lang != 'isr') {$experience_dspl = $langmark096." (1)";}
elseif ($experience > 16 AND $experience < 25 AND $lang != 'isr') {$experience_dspl = $langmark097." (2)";}
elseif ($experience > 24 AND $experience < 33 AND $lang != 'isr') {$experience_dspl = $langmark098." (3)";}
elseif ($experience > 32 AND $experience < 41 AND $lang != 'isr') {$experience_dspl = $langmark099." (4)";}
elseif ($experience > 40 AND $experience < 49 AND $lang != 'isr') {$experience_dspl = $langmark100." (5)";}
elseif ($experience > 48 AND $experience < 57 AND $lang != 'isr') {$experience_dspl = $langmark101." (6)";}
elseif ($experience > 56 AND $experience < 65 AND $lang != 'isr') {$experience_dspl = $langmark102." (7)";}
elseif ($experience > 64 AND $experience < 73 AND $lang != 'isr') {$experience_dspl = $langmark103." (8)";}
elseif ($experience > 72 AND $experience < 81 AND $lang != 'isr') {$experience_dspl = $langmark104." (9)";}
elseif ($experience > 80 AND $experience < 89 AND $lang != 'isr') {$experience_dspl = $langmark105." (10)";}
elseif ($experience > 88 AND $experience < 97 AND $lang != 'isr') {$experience_dspl = $langmark106." (11)";}
elseif ($experience > 96 AND $experience < 105 AND $lang != 'isr') {$experience_dspl = $langmark107." (12)";}
elseif ($experience > 104 AND $experience < 113 AND $lang != 'isr') {$experience_dspl = $langmark108." (13)";}
elseif ($experience > 112 AND $experience < 121 AND $lang != 'isr') {$experience_dspl = $langmark109." (14)";}
elseif ($experience >= 121 AND $lang != 'isr') {$experience_dspl = $langmark110." (".round(($experience-1)/8).")";}

if ($handling < 9 AND $lang == 'isr') {$handling_dspl = "(0) ".$langmark111;}
elseif ($handling > 8 AND $handling < 17 AND $lang == 'isr') {$handling_dspl = "(1) ".$langmark096;}
elseif ($handling > 16 AND $handling < 25 AND $lang == 'isr') {$handling_dspl = "(2) ".$langmark097;}
elseif ($handling > 24 AND $handling < 33 AND $lang == 'isr') {$handling_dspl = "(3) ".$langmark098;}
elseif ($handling > 32 AND $handling < 41 AND $lang == 'isr') {$handling_dspl = "(4) ".$langmark099;}
elseif ($handling > 40 AND $handling < 49 AND $lang == 'isr') {$handling_dspl = "(5) ".$langmark100;}
elseif ($handling > 48 AND $handling < 57 AND $lang == 'isr') {$handling_dspl = "(6) ".$langmark101;}
elseif ($handling > 56 AND $handling < 65 AND $lang == 'isr') {$handling_dspl = "(7) ".$langmark102;}
elseif ($handling > 64 AND $handling < 73 AND $lang == 'isr') {$handling_dspl = "(8) ".$langmark103;}
elseif ($handling > 72 AND $handling < 81 AND $lang == 'isr') {$handling_dspl = "(9) ".$langmark104;}
elseif ($handling > 80 AND $handling < 89 AND $lang == 'isr') {$handling_dspl = "(10) ".$langmark105;}
elseif ($handling > 88 AND $handling < 97 AND $lang == 'isr') {$handling_dspl = "(11) ".$langmark106;}
elseif ($handling > 96 AND $handling < 105 AND $lang == 'isr') {$handling_dspl = "(12) ".$langmark107;}
elseif ($handling > 104 AND $handling < 113 AND $lang == 'isr') {$handling_dspl = "(13) ".$langmark108;}
elseif ($handling > 112 AND $handling < 121 AND $lang == 'isr') {$handling_dspl = "(14) ".$langmark109;}
elseif ($handling >= 121 AND $lang == 'isr') {$handling_dspl = "(15) ".$langmark110;}

if ($speed < 9 AND $lang == 'isr') {$speed_dspl = "(0) ".$langmark111;}
elseif ($speed > 8 AND $speed < 17 AND $lang == 'isr') {$speed_dspl = "(1) ".$langmark096;}
elseif ($speed > 16 AND $speed < 25 AND $lang == 'isr') {$speed_dspl = "(2) ".$langmark097;}
elseif ($speed > 24 AND $speed < 33 AND $lang == 'isr') {$speed_dspl = "(3) ".$langmark098;}
elseif ($speed > 32 AND $speed < 41 AND $lang == 'isr') {$speed_dspl = "(4) ".$langmark099;}
elseif ($speed > 40 AND $speed < 49 AND $lang == 'isr') {$speed_dspl = "(5) ".$langmark100;}
elseif ($speed > 48 AND $speed < 57 AND $lang == 'isr') {$speed_dspl = "(6) ".$langmark101;}
elseif ($speed > 56 AND $speed < 65 AND $lang == 'isr') {$speed_dspl = "(7) ".$langmark102;}
elseif ($speed > 64 AND $speed < 73 AND $lang == 'isr') {$speed_dspl = "(8) ".$langmark103;}
elseif ($speed > 72 AND $speed < 81 AND $lang == 'isr') {$speed_dspl = "(9) ".$langmark104;}
elseif ($speed > 80 AND $speed < 89 AND $lang == 'isr') {$speed_dspl = "(10) ".$langmark105;}
elseif ($speed > 88 AND $speed < 97 AND $lang == 'isr') {$speed_dspl = "(11) ".$langmark106;}
elseif ($speed > 96 AND $speed < 105 AND $lang == 'isr') {$speed_dspl = "(12) ".$langmark107;}
elseif ($speed > 104 AND $speed < 113 AND $lang == 'isr') {$speed_dspl = "(13) ".$langmark108;}
elseif ($speed > 112 AND $speed < 121 AND $lang == 'isr') {$speed_dspl = "(14) ".$langmark109;}
elseif ($speed >= 121 AND $lang == 'isr') {$speed_dspl = "(15) ".$langmark110;}

if ($passing < 9 AND $lang == 'isr') {$passing_dspl = "(0) ".$langmark111;}
elseif ($passing > 8 AND $passing < 17 AND $lang == 'isr') {$passing_dspl = "(1) ".$langmark096;}
elseif ($passing > 16 AND $passing < 25 AND $lang == 'isr') {$passing_dspl = "(2) ".$langmark097;}
elseif ($passing > 24 AND $passing < 33 AND $lang == 'isr') {$passing_dspl = "(3) ".$langmark098;}
elseif ($passing > 32 AND $passing < 41 AND $lang == 'isr') {$passing_dspl = "(4) ".$langmark099;}
elseif ($passing > 40 AND $passing < 49 AND $lang == 'isr') {$passing_dspl = "(5) ".$langmark100;}
elseif ($passing > 48 AND $passing < 57 AND $lang == 'isr') {$passing_dspl = "(6) ".$langmark101;}
elseif ($passing > 56 AND $passing < 65 AND $lang == 'isr') {$passing_dspl = "(7) ".$langmark102;}
elseif ($passing > 64 AND $passing < 73 AND $lang == 'isr') {$passing_dspl = "(8) ".$langmark103;}
elseif ($passing > 72 AND $passing < 81 AND $lang == 'isr') {$passing_dspl = "(9) ".$langmark104;}
elseif ($passing > 80 AND $passing < 89 AND $lang == 'isr') {$passing_dspl = "(10) ".$langmark105;}
elseif ($passing > 88 AND $passing < 97 AND $lang == 'isr') {$passing_dspl = "(11) ".$langmark106;}
elseif ($passing > 96 AND $passing < 105 AND $lang == 'isr') {$passing_dspl = "(12) ".$langmark107;}
elseif ($passing > 104 AND $passing < 113 AND $lang == 'isr') {$passing_dspl = "(13) ".$langmark108;}
elseif ($passing > 112 AND $passing < 121 AND $lang == 'isr') {$passing_dspl = "(14) ".$langmark109;}
elseif ($passing >= 121 AND $lang == 'isr') {$passing_dspl = "(15) ".$langmark110;}

if ($vision < 9 AND $lang == 'isr') {$vision_dspl = "(0) ".$langmark111;}
elseif ($vision > 8 AND $vision < 17 AND $lang == 'isr') {$vision_dspl = "(1) ".$langmark096;}
elseif ($vision > 16 AND $vision < 25 AND $lang == 'isr') {$vision_dspl = "(2) ".$langmark097;}
elseif ($vision > 24 AND $vision < 33 AND $lang == 'isr') {$vision_dspl = "(3) ".$langmark098;}
elseif ($vision > 32 AND $vision < 41 AND $lang == 'isr') {$vision_dspl = "(4) ".$langmark099;}
elseif ($vision > 40 AND $vision < 49 AND $lang == 'isr') {$vision_dspl = "(5) ".$langmark100;}
elseif ($vision > 48 AND $vision < 57 AND $lang == 'isr') {$vision_dspl = "(6) ".$langmark101;}
elseif ($vision > 56 AND $vision < 65 AND $lang == 'isr') {$vision_dspl = "(7) ".$langmark102;}
elseif ($vision > 64 AND $vision < 73 AND $lang == 'isr') {$vision_dspl = "(8) ".$langmark103;}
elseif ($vision > 72 AND $vision < 81 AND $lang == 'isr') {$vision_dspl = "(9) ".$langmark104;}
elseif ($vision > 80 AND $vision < 89 AND $lang == 'isr') {$vision_dspl = "(10) ".$langmark105;}
elseif ($vision > 88 AND $vision < 97 AND $lang == 'isr') {$vision_dspl = "(11) ".$langmark106;}
elseif ($vision > 96 AND $vision < 105 AND $lang == 'isr') {$vision_dspl = "(12) ".$langmark107;}
elseif ($vision > 104 AND $vision < 113 AND $lang == 'isr') {$vision_dspl = "(13) ".$langmark108;}
elseif ($vision > 112 AND $vision < 121 AND $lang == 'isr') {$vision_dspl = "(14) ".$langmark109;}
elseif ($vision >= 121 AND $lang == 'isr') {$vision_dspl = "(15) ".$langmark110;}

if ($rebounds < 9 AND $lang == 'isr') {$rebounds_dspl = "(0) ".$langmark111;}
elseif ($rebounds > 8 AND $rebounds < 17 AND $lang == 'isr') {$rebounds_dspl = "(1) ".$langmark096;}
elseif ($rebounds > 16 AND $rebounds < 25 AND $lang == 'isr') {$rebounds_dspl = "(2) ".$langmark097;}
elseif ($rebounds > 24 AND $rebounds < 33 AND $lang == 'isr') {$rebounds_dspl = "(3) ".$langmark098;}
elseif ($rebounds > 32 AND $rebounds < 41 AND $lang == 'isr') {$rebounds_dspl = "(4) ".$langmark099;}
elseif ($rebounds > 40 AND $rebounds < 49 AND $lang == 'isr') {$rebounds_dspl = "(5) ".$langmark100;}
elseif ($rebounds > 48 AND $rebounds < 57 AND $lang == 'isr') {$rebounds_dspl = "(6) ".$langmark101;}
elseif ($rebounds > 56 AND $rebounds < 65 AND $lang == 'isr') {$rebounds_dspl = "(7) ".$langmark102;}
elseif ($rebounds > 64 AND $rebounds < 73 AND $lang == 'isr') {$rebounds_dspl = "(8) ".$langmark103;}
elseif ($rebounds > 72 AND $rebounds < 81 AND $lang == 'isr') {$rebounds_dspl = "(9) ".$langmark104;}
elseif ($rebounds > 80 AND $rebounds < 89 AND $lang == 'isr') {$rebounds_dspl = "(10) ".$langmark105;}
elseif ($rebounds > 88 AND $rebounds < 97 AND $lang == 'isr') {$rebounds_dspl = "(11) ".$langmark106;}
elseif ($rebounds > 96 AND $rebounds < 105 AND $lang == 'isr') {$rebounds_dspl = "(12) ".$langmark107;}
elseif ($rebounds > 104 AND $rebounds < 113 AND $lang == 'isr') {$rebounds_dspl = "(13) ".$langmark108;}
elseif ($rebounds > 112 AND $rebounds < 121 AND $lang == 'isr') {$rebounds_dspl = "(14) ".$langmark109;}
elseif ($rebounds >= 121 AND $lang == 'isr') {$rebounds_dspl = "(15) ".$langmark110;}

if ($position < 9 AND $lang == 'isr') {$position_dspl = "(0) ".$langmark111;}
elseif ($position > 8 AND $position < 17 AND $lang == 'isr') {$position_dspl = "(1) ".$langmark096;}
elseif ($position > 16 AND $position < 25 AND $lang == 'isr') {$position_dspl = "(2) ".$langmark097;}
elseif ($position > 24 AND $position < 33 AND $lang == 'isr') {$position_dspl = "(3) ".$langmark098;}
elseif ($position > 32 AND $position < 41 AND $lang == 'isr') {$position_dspl = "(4) ".$langmark099;}
elseif ($position > 40 AND $position < 49 AND $lang == 'isr') {$position_dspl = "(5) ".$langmark100;}
elseif ($position > 48 AND $position < 57 AND $lang == 'isr') {$position_dspl = "(6) ".$langmark101;}
elseif ($position > 56 AND $position < 65 AND $lang == 'isr') {$position_dspl = "(7) ".$langmark102;}
elseif ($position > 64 AND $position < 73 AND $lang == 'isr') {$position_dspl = "(8) ".$langmark103;}
elseif ($position > 72 AND $position < 81 AND $lang == 'isr') {$position_dspl = "(9) ".$langmark104;}
elseif ($position > 80 AND $position < 89 AND $lang == 'isr') {$position_dspl = "(10) ".$langmark105;}
elseif ($position > 88 AND $position < 97 AND $lang == 'isr') {$position_dspl = "(11) ".$langmark106;}
elseif ($position > 96 AND $position < 105 AND $lang == 'isr') {$position_dspl = "(12) ".$langmark107;}
elseif ($position > 104 AND $position < 113 AND $lang == 'isr') {$position_dspl = "(13) ".$langmark108;}
elseif ($position > 112 AND $position < 121 AND $lang == 'isr') {$position_dspl = "(14) ".$langmark109;}
elseif ($position >= 121 AND $lang == 'isr') {$position_dspl = "(15) ".$langmark110;}

if ($shooting < 9 AND $lang == 'isr') {$shooting_dspl = "(0) ".$langmark111;}
elseif ($shooting > 8 AND $shooting < 17 AND $lang == 'isr') {$shooting_dspl = "(1) ".$langmark096;}
elseif ($shooting > 16 AND $shooting < 25 AND $lang == 'isr') {$shooting_dspl = "(2) ".$langmark097;}
elseif ($shooting > 24 AND $shooting < 33 AND $lang == 'isr') {$shooting_dspl = "(3) ".$langmark098;}
elseif ($shooting > 32 AND $shooting < 41 AND $lang == 'isr') {$shooting_dspl = "(4) ".$langmark099;}
elseif ($shooting > 40 AND $shooting < 49 AND $lang == 'isr') {$shooting_dspl = "(5) ".$langmark100;}
elseif ($shooting > 48 AND $shooting < 57 AND $lang == 'isr') {$shooting_dspl = "(6) ".$langmark101;}
elseif ($shooting > 56 AND $shooting < 65 AND $lang == 'isr') {$shooting_dspl = "(7) ".$langmark102;}
elseif ($shooting > 64 AND $shooting < 73 AND $lang == 'isr') {$shooting_dspl = "(8) ".$langmark103;}
elseif ($shooting > 72 AND $shooting < 81 AND $lang == 'isr') {$shooting_dspl = "(9) ".$langmark104;}
elseif ($shooting > 80 AND $shooting < 89 AND $lang == 'isr') {$shooting_dspl = "(10) ".$langmark105;}
elseif ($shooting > 88 AND $shooting < 97 AND $lang == 'isr') {$shooting_dspl = "(11) ".$langmark106;}
elseif ($shooting > 96 AND $shooting < 105 AND $lang == 'isr') {$shooting_dspl = "(12) ".$langmark107;}
elseif ($shooting > 104 AND $shooting < 113 AND $lang == 'isr') {$shooting_dspl = "(13) ".$langmark108;}
elseif ($shooting > 112 AND $shooting < 121 AND $lang == 'isr') {$shooting_dspl = "(14) ".$langmark109;}
elseif ($shooting >= 121 AND $lang == 'isr') {$shooting_dspl = "(15) ".$langmark110;}

if ($freethrow < 9 AND $lang == 'isr') {$freethrow_dspl = "(0) ".$langmark111;}
elseif ($freethrow > 8 AND $freethrow < 17 AND $lang == 'isr') {$freethrow_dspl = "(1) ".$langmark096;}
elseif ($freethrow > 16 AND $freethrow < 25 AND $lang == 'isr') {$freethrow_dspl = "(2) ".$langmark097;}
elseif ($freethrow > 24 AND $freethrow < 33 AND $lang == 'isr') {$freethrow_dspl = "(3) ".$langmark098;}
elseif ($freethrow > 32 AND $freethrow < 41 AND $lang == 'isr') {$freethrow_dspl = "(4) ".$langmark099;}
elseif ($freethrow > 40 AND $freethrow < 49 AND $lang == 'isr') {$freethrow_dspl = "(5) ".$langmark100;}
elseif ($freethrow > 48 AND $freethrow < 57 AND $lang == 'isr') {$freethrow_dspl = "(6) ".$langmark101;}
elseif ($freethrow > 56 AND $freethrow < 65 AND $lang == 'isr') {$freethrow_dspl = "(7) ".$langmark102;}
elseif ($freethrow > 64 AND $freethrow < 73 AND $lang == 'isr') {$freethrow_dspl = "(8) ".$langmark103;}
elseif ($freethrow > 72 AND $freethrow < 81 AND $lang == 'isr') {$freethrow_dspl = "(9) ".$langmark104;}
elseif ($freethrow > 80 AND $freethrow < 89 AND $lang == 'isr') {$freethrow_dspl = "(10) ".$langmark105;}
elseif ($freethrow > 88 AND $freethrow < 97 AND $lang == 'isr') {$freethrow_dspl = "(11) ".$langmark106;}
elseif ($freethrow > 96 AND $freethrow < 105 AND $lang == 'isr') {$freethrow_dspl = "(12) ".$langmark107;}
elseif ($freethrow > 104 AND $freethrow < 113 AND $lang == 'isr') {$freethrow_dspl = "(13) ".$langmark108;}
elseif ($freethrow > 112 AND $freethrow < 121 AND $lang == 'isr') {$freethrow_dspl = "(14) ".$langmark109;}
elseif ($freethrow >= 121 AND $lang == 'isr') {$freethrow_dspl = "(15) ".$langmark110;}

if ($defense < 9 AND $lang == 'isr') {$defense_dspl = "(0) ".$langmark111;}
elseif ($defense > 8 AND $defense < 17 AND $lang == 'isr') {$defense_dspl = "(1) ".$langmark096;}
elseif ($defense > 16 AND $defense < 25 AND $lang == 'isr') {$defense_dspl = "(2) ".$langmark097;}
elseif ($defense > 24 AND $defense < 33 AND $lang == 'isr') {$defense_dspl = "(3) ".$langmark098;}
elseif ($defense > 32 AND $defense < 41 AND $lang == 'isr') {$defense_dspl = "(4) ".$langmark099;}
elseif ($defense > 40 AND $defense < 49 AND $lang == 'isr') {$defense_dspl = "(5) ".$langmark100;}
elseif ($defense > 48 AND $defense < 57 AND $lang == 'isr') {$defense_dspl = "(6) ".$langmark101;}
elseif ($defense > 56 AND $defense < 65 AND $lang == 'isr') {$defense_dspl = "(7) ".$langmark102;}
elseif ($defense > 64 AND $defense < 73 AND $lang == 'isr') {$defense_dspl = "(8) ".$langmark103;}
elseif ($defense > 72 AND $defense < 81 AND $lang == 'isr') {$defense_dspl = "(9) ".$langmark104;}
elseif ($defense > 80 AND $defense < 89 AND $lang == 'isr') {$defense_dspl = "(10) ".$langmark105;}
elseif ($defense > 88 AND $defense < 97 AND $lang == 'isr') {$defense_dspl = "(11) ".$langmark106;}
elseif ($defense > 96 AND $defense < 105 AND $lang == 'isr') {$defense_dspl = "(12) ".$langmark107;}
elseif ($defense > 104 AND $defense < 113 AND $lang == 'isr') {$defense_dspl = "(13) ".$langmark108;}
elseif ($defense > 112 AND $defense < 121 AND $lang == 'isr') {$defense_dspl = "(14) ".$langmark109;}
elseif ($defense >= 121 AND $lang == 'isr') {$defense_dspl = "(15) ".$langmark110;}

if ($experience < 9 AND $lang == 'isr') {$experience_dspl = "(0) ".$langmark111;}
elseif ($experience > 8 AND $experience < 17 AND $lang == 'isr') {$experience_dspl = "(1) ".$langmark096;}
elseif ($experience > 16 AND $experience < 25 AND $lang == 'isr') {$experience_dspl = "(2) ".$langmark097;}
elseif ($experience > 24 AND $experience < 33 AND $lang == 'isr') {$experience_dspl = "(3) ".$langmark098;}
elseif ($experience > 32 AND $experience < 41 AND $lang == 'isr') {$experience_dspl = "(4) ".$langmark099;}
elseif ($experience > 40 AND $experience < 49 AND $lang == 'isr') {$experience_dspl = "(5) ".$langmark100;}
elseif ($experience > 48 AND $experience < 57 AND $lang == 'isr') {$experience_dspl = "(6) ".$langmark101;}
elseif ($experience > 56 AND $experience < 65 AND $lang == 'isr') {$experience_dspl = "(7) ".$langmark102;}
elseif ($experience > 64 AND $experience < 73 AND $lang == 'isr') {$experience_dspl = "(8) ".$langmark103;}
elseif ($experience > 72 AND $experience < 81 AND $lang == 'isr') {$experience_dspl = "(9) ".$langmark104;}
elseif ($experience > 80 AND $experience < 89 AND $lang == 'isr') {$experience_dspl = "(10) ".$langmark105;}
elseif ($experience > 88 AND $experience < 97 AND $lang == 'isr') {$experience_dspl = "(11) ".$langmark106;}
elseif ($experience > 96 AND $experience < 105 AND $lang == 'isr') {$experience_dspl = "(12) ".$langmark107;}
elseif ($experience > 104 AND $experience < 113 AND $lang == 'isr') {$experience_dspl = "(13) ".$langmark108;}
elseif ($experience > 112 AND $experience < 121 AND $lang == 'isr') {$experience_dspl = "(14) ".$langmark109;}
elseif ($experience >= 121 AND $lang == 'isr') {$experience_dspl = "(".round(($experience-1)/8).") ".$langmark110;}

if ($handling==0) {$handling_dspl = "<i>unknown</i>";}
if ($speed==0) {$speed_dspl = "<i>unknown</i>";}
if ($passing==0) {$passing_dspl = "<i>unknown</i>";}
if ($vision==0) {$vision_dspl = "<i>unknown</i>";}
if ($rebounds==0) {$rebounds_dspl = "<i>unknown</i>";}
if ($position==0) {$position_dspl = "<i>unknown</i>";}
if ($shooting==0) {$shooting_dspl = "<i>unknown</i>";}
if ($freethrow==0) {$freethrow_dspl = "<i>unknown</i>";}
if ($defense==0) {$defense_dspl = "<i>unknown</i>";}
if ($workrate==0) {$workrate_dspl = "<i>unknown</i>";}

//poskodbe
switch (TRUE) {
CASE ($injury_time ==0): $prikaz_poskodbe = '&nbsp;'; break;
CASE ($injury_time >0 AND $injury_time < 1): $prikaz_poskodbe = '&nbsp;<img src=/img/poskodbe/+1ok.gif border=0 title=Slightly&nbsp;injured,&nbsp;can&nbsp;play>&nbsp;'; break;
CASE ($injury_time >=1 AND $injury_time < 2): $prikaz_poskodbe = '&nbsp;<img src=/img/poskodbe/+1.gif border=0 title=Injured&nbsp;for&nbsp;1&nbsp;week>&nbsp;'; break;
CASE ($injury_time >=2 AND $injury_time < 3): $prikaz_poskodbe = '&nbsp;<img src=/img/poskodbe/+2.gif border=0 title=Injured&nbsp;for&nbsp;2&nbsp;weeks>&nbsp;'; break;
CASE ($injury_time >=3 AND $injury_time < 4): $prikaz_poskodbe = '&nbsp;<img src=/img/poskodbe/+3.gif border=0 title=Injured&nbsp;for&nbsp;3&nbsp;weeks>&nbsp;'; break;
CASE ($injury_time >=4 AND $injury_time < 5): $prikaz_poskodbe = '&nbsp;<img src=/img/poskodbe/+4.gif border=0 title=Injured&nbsp;for&nbsp;4&nbsp;weeks>&nbsp;'; break;
CASE ($injury_time >=5 AND $injury_time < 6): $prikaz_poskodbe = '&nbsp;<img src=/img/poskodbe/+5.gif border=0 title=Injured&nbsp;for&nbsp;5&nbsp;weeks>&nbsp;'; break;
CASE ($injury_time >=6 AND $injury_time < 7): $prikaz_poskodbe = '&nbsp;<img src=/img/poskodbe/+6.gif border=0 title=Injured&nbsp;for&nbsp;6&nbsp;weeks>&nbsp;'; break;
CASE ($injury_time >=7 AND $injury_time < 8): $prikaz_poskodbe = '&nbsp;<img src=/img/poskodbe/+7.gif border=0 title=Injured&nbsp;for&nbsp;7&nbsp;weeks>&nbsp;'; break;
CASE ($injury_time >=8 AND $injury_time < 9): $prikaz_poskodbe = '&nbsp;<img src=/img/poskodbe/+8.gif border=0 title=Injured&nbsp;for&nbsp;8&nbsp;weeks>&nbsp;'; break;
CASE ($injury_time >=9): $prikaz_poskodbe = '&nbsp;<img src=/img/poskodbe/+9.gif border=0 title=Injured&nbsp;for&nbsp;9&nbsp;weeks>&nbsp;'; break;
}

//ameriska visina
if ($merika=='USA'){
$feetheight = floor((100*$height)/3048);
$tempheight = $height - ($feetheight*3048/100);
$inchheight = round((100*$tempheight)/254);
if ($inchheight==12) {$feetheight=$feetheight+1; $inchheight=''; $height = $feetheight."'0 ft, ";} else {$height = $feetheight."'".$inchheight." ft, ";}
$weight = round($weight * 22046 / 10000);
$weight = $weight." lb.";
}
else {$height = $height." cm, "; $weight = round($weight)." kg.";}
if ($hulahup==0) {$hulahup='';} else {$hulahup=$hulahup." ";}

if ($snl > 1) {echo "<br/>";}
echo "<b>",$hulahup,"<a href=\"player.php?playerid=",$id,"\">",$name," ",$surname,"</a></b>";
$dodnt15 = @mysql_query("SELECT id FROM u15players WHERE id=$id LIMIT 1");
if (@mysql_num_rows($dodnt15)) {echo "&nbsp;<img src=\"img/Flags/",$country,".png\" border=\"0\" alt=\"",$langmark378," ",$country,"\" title=\"",$langmark378," ",$country,"\">";}
echo $prikaz_poskodbe,"<br/>";
echo $age," ",$langmark379," <a class=\"greenhilite\" href=\"league.php?country=",$country,"\">",$country,"</a>. ",$height.$weight,"<br/>",$langmark380," ".$spec_txt.". ",$langmark381," ".$wage." &euro; / ",$langmark382,".<br/>";
if ($remaining > 0 AND $is_supporter==1) {echo "<b><font color=\"green\">Weeks to next skill: ",round($remaining),"</font></b>";} elseif ($remaining==0) {echo "<b><font color=\"red\">Training currently unassigned</font></b>";}
?>
<br/>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr><td width="68"><b><?=$langmark120?>:</b></td><td width="117">
<?php
echo $handling_dspl,"</font></td>";
echo "<td width=70><b>",$langmark121,":</b></td><td width=115> ";
echo $speed_dspl,"</font></td>";
echo "<tr><td><b>",$langmark122,":</b></td><td> ";
echo $passing_dspl,"</font></td>";
echo "<td><b>",$langmark123,":</b></td><td> ";
echo $vision_dspl,"</font></td>";
echo "<tr><td><b>",$langmark124,":</b></td><td> ";
echo $rebounds_dspl,"</font></td>";
echo "<td><b>",$langmark125,":</b></td><td> ";
echo $position_dspl,"</font></td>";
echo "<tr><td><b>",$langmark126,":</b></td><td> ";
echo $shooting_dspl,"</font></td>";
echo "<td><b>",$langmark127,":</b></td><td> ";
echo $freethrow_dspl,"</font></td>";
echo "<tr><td><b>",$langmark128,":</b></td><td> ";
echo $defense_dspl,"</font></td>";
?>
<td><b><?=$langmark129?>:</b></td><td> <?=$workrate_dspl?></td></tr>
<!--<tr><td><b><?=$langmark130?>:</b></td><td> <?=$experience_dspl?></td>
<td><b><?=$langmark383?>:</b></td><td> <?=$fatigue?>%</td></tr>-->
</table>

<?php
}
if ($snl==0) {echo "There's nothing yet in here!<br/><br/>Every Friday you can add a 14-15 year old player to your Youth team and then develop youngsters individually with skill, patience and some assistance from your coach.";}

//IE prikaz borderja
if ($i == 0) {echo "&nbsp;";}
?>

</td><td class="border" width="37%">

<h2><?=$langmark384?></h2>

<b><?=$langmark385?></b>
<img src="img/posit.jpg" width="151" height="119" border="0" usemap="#map" />

<map name="map">
<!-- #$-:Image Map file created by GIMP Imagemap Plugin -->
<!-- #$-:GIMP Imagemap Plugin by Maurits Rijk -->
<!-- #$-:Please do not edit lines starting with "#$" -->
<!-- #$VERSION:2.0 -->
<!-- #$AUTHOR:Tomaz Kranjc -->
<area shape="rect" coords="63,69,87,87" alt="<?=$langmark386?>" title="<?=$langmark386?>" href="yteam.php?desc=PG" />
<area shape="rect" coords="107,58,132,75" alt="<?=$langmark387?>" title="<?=$langmark387?>" href="yteam.php?desc=SG" />
<area shape="rect" coords="27,6,49,21" alt="<?=$langmark388?>" title="<?=$langmark388?>" href="yteam.php?desc=SF" />
<area shape="rect" coords="90,14,113,32" alt="<?=$langmark389?>" title="<?=$langmark389?>" href="yteam.php?desc=PF" />
<area shape="rect" coords="42,27,60,46" alt="<?=$langmark390?>" title="<?=$langmark390?>" href="yteam.php?desc=C" />
</map><br/>
<?php
if ($desc == PG) {echo "<b><font color=\"darkred\">",$langmark386,"</font></b><br/>",$langmark391,"<br/><b>",$langmark396,":</b><br/>",strtolower($langmark120),",",strtolower($langmark122),",",strtolower($langmark128),",",strtolower($langmark121),".<br/><br/>";}
if ($desc == SG) {echo "<b><font color=\"darkred\">",$langmark387,"</font></b><br/>",$langmark392,"<br/><b>",$langmark396,":</b><br/>",strtolower($langmark126),",",strtolower($langmark123),",",strtolower($langmark128),",",strtolower($langmark121),".<br/><br/>";}
if ($desc == SF) {echo "<b><font color=\"darkred\">",$langmark388,"</font></b><br/>",$langmark393,"<br/><b>",$langmark396,":</b><br/>",strtolower($langmark126),",",strtolower($langmark125),",",strtolower($langmark128),",",strtolower($langmark122),".<br/><br/>";}
if ($desc == PF) {echo "<b><font color=\"darkred\">",$langmark389,"</font></b><br/>",$langmark394,"<br/><b>",$langmark396,":</b><br/>",strtolower($langmark125),",",strtolower($langmark124),",",strtolower($langmark128),",",strtolower($langmark122),".<br/><br/>";}
if ($desc == C) {echo "<b><font color=\"darkred\">",$langmark390,"</font></b><br/>",$langmark395,"<br/><b>",$langmark396,":</b><br/>",strtolower($langmark124),",",strtolower($langmark125),",",strtolower($langmark121),",",strtolower($langmark128),".<br/><br/>";}
?>

<h2><?=$langmark397?></h2>

<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="margin: 0">
<select name="sort" class="inputreg">
<option value="shirt" <?php if ($sort=='shirt'){echo "selected";}?>><?=$langmark1263?></option>
<option value="age" <?php if ($sort=='age'){echo "selected";}?>><?=$langmark113?></option>
<option value="height" <?php if ($sort=='height'){echo "selected";}?>><?=$langmark116?></option>
<option value="weight" <?php if ($sort=='weight'){echo "selected";}?>><?=$langmark117?></option>
<option value="workrate" <?php if ($sort=='workrate'){echo "selected";}?>><?=$langmark129?></option>
<?php if ($is_supporter==1){?><option value="training" <?php if ($sort=='training'){echo "selected";}?>><?=$langmark257?></option><?php }?>
<?php if ($is_supporter==1){?><option value="skillsum" <?php if ($sort=='skillsum'){echo "selected";}?>>Skill sum</option><?php }?>
</select>
<input type="submit" value="&nbsp;&raquo;" name="submit" class="buttonreg">
</form>

<a href="yteam.php?changenow=numbers"><?=$langmark1265?></a> | <a href="gamerules.php?action=youth">Youth info</a> | <a href="players.php">Senior team</a>
<h2><?=$langmark400," ",$num," ",$langmark401?></h2>
<table cellspacing="1" cellpadding="0" border="0" width="100%">
<?php
$i=0;
while ($i < $num) {
$id=mysql_result($result,$i,"id");
$name=mysql_result($result,$i,"name");
$surname=mysql_result($result,$i,"surname");
$shirtnum=mysql_result($result,$i,"shirt");
if ($shirtnum==0) {$shirtnu='';} else {$shirtnu=$shirtnum;}
echo "<tr><td align=\"center\" width=\"5\"><b>",$shirtnu,"&nbsp;</b></td><td align=\"left\"><b><a href=\"player.php?playerid=",$id,"\">".$name." ".$surname."</a></b></td></tr>";
$i++;
}
echo "</table>";
//menjava stevilk
$changenow = $_GET["changenow"];
if ($changenow=='numbers') {
?>
<br/><h2>Shirt numbers</h2><br/>
<form method="post" action="<?=$PHP_SELF?>" style="margin: 0">
<?php
$nm=0;
while ($nm < $num) {
$shirtn = mysql_result($result,$nm,"shirt");
?>
<select name="<?="shirtnum_",$nm?>" class="inputreg">
<option value="0" <?php if($shirtn==0){echo "selected";}?>>-</option>
<?php
$st=1;
if ($is_supporter==0) {$dot=56;} else {$dot=100;}
while ($st < $dot) {
?>
<option value="<?=$st?>" <?php if($shirtn==$st){echo "selected";}?>><?=$st?></option>
<?php
$st++;
}
?>
</select>
<input type="hidden" name="<?="playernum_",$nm?>" value="<?=mysql_result($result,$nm,"id")?>">
<?php
echo mysql_result($result,$nm,"surname"),"<br/>";
$nm++;
}
?>
<input type="hidden" name="nofp" value="<?=$nm?>">
<input type="submit" value="<?=$langmark1266?>" name="submit40" class="buttonreg">
</form>
<?php
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