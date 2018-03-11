<?php
ini_set("max_execution_time", 2700);
require_once("cron2conect.php");

$igralci_za_rast = mysql_query("SELECT id, players.name AS name, surname, club, age, height FROM teams, players WHERE teamid=club AND status=1 AND height < 232 AND age < 19 ORDER BY RAND()") or die(mysql_error());
$num=mysql_num_rows($igralci_za_rast);
$j=0;
while ($j < ($num/12)) {
$yplayers=mysql_result($igralci_za_rast,$j,"id");
$yname=mysql_result($igralci_za_rast,$j,"name");
$ysurname=mysql_result($igralci_za_rast,$j,"surname");
$yclub=mysql_result($igralci_za_rast,$j,"club");
$yage=mysql_result($igralci_za_rast,$j,"age");
$yheight=mysql_result($igralci_za_rast,$j,"height");

if ($yage==14 && $yheight < 165) {$newcenti = 6;}
elseif ($yage < 16 && $yheight < 186) {$newcenti = rand(0,1);}
elseif ($yage < 16 && $yheight > 185) {$newcenti = rand(1,5);}
elseif ($yage==16 && $yheight < 197) {$newcenti = rand(1,3);}
elseif ($yage==16 && $yheight > 196) {$newcenti = rand(3,5);}
elseif ($yage==17 && $yheight < 207) {$newcenti = rand(0,5);}
elseif ($yage==17 && $yheight > 206) {$newcenti = rand(3,5);}
elseif ($yage==18 && $yheight < 218) {$newcenti = rand(4,5);}
else {$newcenti = 5;}

SWITCH ($newcenti) {
CASE 0: $add = rand(1,3); $add1 = rand(1,2); break;
CASE 1: $add = rand(1,3); $add1 = rand(1,2); break;
CASE 2: $add = rand(1,2); $add1 = rand(1,2); break;
CASE 3: $add = rand(1,2); $add1 = rand(1,2); break;
CASE 4: $add = 1; $add1 = 1; break;
CASE 5: $add = 1; $add1 = rand(1,2); break;
CASE 6: $add = rand(1,3); $add1 = rand(1,2); break;
}

mysql_query("UPDATE players SET height=height+$add, weight=weight+$add1 WHERE id=$yplayers LIMIT 1") or die(mysql_error());

$tstatus = mysql_query("SELECT teams.status FROM teams, users WHERE users.club = teams.teamid AND users.supporter = 1 AND teams.teamid = $yclub") or die(mysql_error());
if (mysql_numrows($tstatus)){$ystatus = mysql_result($tstatus,0);} else {$ystatus=0;}

if ($ystatus==1){mysql_query("INSERT INTO events VALUES ('', $yclub, NOW(), '<a href=player.php?playerid=$yplayers>$yname $ysurname</a> has grown $add cm. He has also gained $add1 kg.', 0, 0);");}

$j++;
}
echo "Growth ok";


//end of growth related things



$quer = mysql_query("SELECT DISTINCT club as club, userid FROM users WHERE `friendly`=1") or die(mysql_error());
while ($p=mysql_fetch_array($quer)) {
$get_team = $p[club];
$userid = $p[userid];
$check = mysql_query("SELECT `matchid` FROM `matches` WHERE `home_id`=$get_team AND (`type`=2 OR `type`=3) AND `crowd1`=0 UNION SELECT `matchid` FROM `matches` WHERE `away_id`=$get_team AND (`type`=2 OR `type`=3) AND `crowd1`=0") or die(mysql_error());
if (mysql_num_rows($check)>1) {echo "_BUG:".$get_team;} elseif (mysql_num_rows($check)==1) {$dsd=44;} else {mysql_query("UPDATE `users` SET `friendly`=0 WHERE `userid`=$userid LIMIT 1");}
}
echo "_first run check for friendly bugs, check friendly update and then remove this comment!";
?>