<?php
ini_set("max_execution_time",2400);
include_once("common.php");

/*
//this is to add 7 days supporter to all teams who were given some kind of benefit to play in FPC
update `users`, ekipe set `supporter`=1, expire='2014-01-28 01:00:00' where supporter=0 and competition=3 and ekipa=club
*/

/*
//FOR DOUBLED TEAMS IN COMPETITION TABLE (POTENTIAL BUG)
//v prihodnje odstranjejem tudi po skupnem fatigue!
$quer = mysql_query("SELECT DISTINCT club as club FROM users") or die(mysql_error());
while ($p=mysql_fetch_array($quer)) {
$get_team = $p[club];
$check = mysql_query("SELECT ekipa from ekipe where ekipa=$get_team") or die(mysql_error());
if (mysql_num_rows($check)>1) {echo "_BUG:".$get_team;} elseif (mysql_num_rows($check)==1) {$dsd=44;}
}
die("SMENT!");
*/

/*
//ADDING HISTORY AFTER GROUP ROUND
$piksl = mysql_query("SELECT teamid, teamname, country, userid, `GROUP` as fpg FROM fpgroups, arena WHERE fpgroups.ekipa = teamid AND `season` = '$default_season' ORDER BY `position` ASC , fpgroups.won DESC , `difference` DESC , `scored` DESC , `against` ASC LIMIT 512 , 1260") or die(mysql_error());
while ($p = mysql_fetch_array($piksl)) {
$teamid = $p['teamid'];
$teamname = $p['teamname'];
$country = $p['country'];
$userid = $p['userid'];
$fpg = $p['fpg'];
$kda = mysql_query("SELECT * FROM users WHERE userid=$userid");
if (mysql_num_rows($kda)) {mysql_query("INSERT INTO history VALUES ('', $userid, $teamid, '$teamname', 5, 1, 0, $default_season, '$country', 0, '$fpg', 0);") or die(mysql_error());}
else {mysql_query("INSERT INTO history VALUES ('', 0, $teamid, '', 5, 1, 0, $default_season, '$country', 0, '$fpg', 0);") or die(mysql_error());}
}
die("zgodo juhu");
*/

/*
//ALSO TO BE USED AFTER COMPLETED GROUP ROUND - ALWAYS ADJUST THE DATE BELOW TO NEXT THURSDAY!!! (leave hour at 21:00)
$day = '2015-05-28 21:00:00';
$aquery = mysql_query("SELECT teamid, country, arenaid FROM fpgroups, arena, ekipe WHERE fpgroups.ekipa=teamid AND ekipe.ekipa = arena.teamid AND `season` ='$default_season' ORDER BY `position` ASC , fpgroups.won DESC , `difference` DESC , `scored` DESC , `against` ASC LIMIT 512");
$n=0;
$m=511;
while ($n < 256) {
$teamid1=mysql_result($aquery,$n,"teamid");
$teamid2=mysql_result($aquery,$m,"teamid");
$arenaid = mysql_result($aquery,$n,"arenaid");
$drzava = mysql_result($aquery,$n,"country");
echo $teamid1," VERSUS ",$teamid2," IN ",$arenaid,"<br/>";
$result = mysql_query("INSERT INTO matches VALUES ('', $teamid1, '', $teamid2, '', $arenaid, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day', 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$drzava', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, $default_season, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)") or die(mysql_error());
$m=$m-1;
$n++;
}
$query = mysql_query("SELECT `matchid` , `time` FROM `matches` WHERE `type`=5 AND season = '$default_season' AND `lid_round` =2");
$pik = mysql_num_rows($query);
$p=0;
while ($p < ($pik/2)) {
$tekmica = mysql_result($query,$p,"matchid");
$urica = mysql_result($query,$p,"time");
$splitdatetime = explode(" ", $urica); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$novaurica = date("Y-m-d H:i:s", mktime($dbhour,$dbmi-150,$dbsec,$dbmonth,$dbday,$dbyear));
mysql_query("UPDATE matches SET time = '$novaurica' WHERE matchid=$tekmica LIMIT 1");
$p++;
}
die("zhreb");
*/

/*
//ALSO AFTER GROUP ROUND - REMOVAL OF THE TEAMS FROM TABLE EKIPE
$d=0;
$aqq = mysql_query("SELECT `ekipa`, `userid` FROM `fpgroups` WHERE `season` ='$default_season' ORDER BY `position` ASC , `won` DESC , `difference` DESC , `scored` DESC , `against` ASC") or die(mysql_error());
while ($p=mysql_fetch_array($aqq)) {
$ekip = $p[ekipa];
$user = $p[userid];
if ($d < 512) {mysql_query("INSERT INTO `messages` VALUES ('', $user, 0, 0, NOW(), '<b>Fair Play Cup notice</b>', 'Congratulations on making it to the elimination stage of the <a href=\"fairplaycup.php\">Fair Play Cup</a> this season! Competition will continue next week, so you have time to check your opponent and prepare well enough! Just let me remind you that your players gain no tiredness when playing in FPC matches, so you can use any tactical approach that you like - best recommendation is to avoid normal/normal, as it can significantly decrease your chances of success.<br/><br/>Best of luck and have fun!<br/>admin')") or die(mysql_error());}
elseif ($d > 511) {mysql_query("DELETE FROM ekipe WHERE ekipa = '$ekip'") or die(mysql_error());}
$d++;
}
die("kokl");
*/

/*
//IF THERE ARE MORE THAN 512 TEAMS IN TABLE EKIPE AFTER GROUP ROUND (POTENTIAL BUG) I FIND THEM WITH THIS SCRIPT
$piksl = mysql_query("SELECT ekipa FROM ekipe WHERE competition=3") or die(mysql_error());
while ($p = mysql_fetch_array($piksl)) {
$gra = $p[ekipa];
$ena = mysql_query("SELECT * FROM matches WHERE away_id=$gra AND crowd1 =0 AND `type` =5") or die(mysql_error());
$dva = mysql_query("SELECT * FROM matches WHERE home_id=$gra AND crowd1 =0 AND `type` =5") or die(mysql_error());
if (!mysql_num_rows($ena) AND !mysql_num_rows($dva)) {echo $gra;}
}
die("dff");
*/

/*
//***THIS IS WHERE IT STARTS WHEN CREATING FPC FOR THE NEW SEASON***
//******************************************************************
//below we will determine teams based on different factors, we will send messages and draw groups
//******************************************************************
//FPC TEAMS - FIRST ALL SUPPORTERS
$klup = mysql_query("SELECT teamid FROM teams, users WHERE teams.teamid=users.club AND (supporter=1 OR users.level>1 OR langadm>0)") or die(mysql_error());
while ($f = mysql_fetch_array($klup)) {
$team = $f["teamid"];
$du = mysql_query("SELECT ekipa FROM ekipe WHERE ekipa=$team") or die(mysql_error());
if (mysql_num_rows($du)>0) {$ee=14;} else {mysql_query("INSERT INTO ekipe VALUES ('',$team,3,0,0,0);") or die(mysql_error());}
}
die("check table and potentially delete: SELECT * FROM users WHERE expire LIKE '%01:00:00' AND supporter =1 ORDER BY last_active DESC");
*/

/*
//OBVESTILA ZA FP CUP
$klup = mysql_query("SELECT ekipa AS ekipa, userid AS user FROM ekipe, users WHERE ekipe.ekipa = users.club AND ekipe.competition = 3 AND users.supporter=1") or die(mysql_error());
while ($f = mysql_fetch_array($klup)) {
$team = $f["ekipa"];
$user = $f["user"];
echo $team,"<br/>";
mysql_query("INSERT INTO messages VALUES ('', $user, 0, 0, NOW(), '<b>Fair Play Cup</b>', 'Basketsim proudly presents 21st edition of the prestigious <a href=\"fairplaycup.php\">Fair Play Cup</a> and as a Basketsim supporter you will take part in it! Thank you for supporting the game and all the best in the competition! Fair Play Cup matches won\'t bring any tiredness to your players and your players won\'t suffer from injures, so you can easily play them against the international competitors, chase some flags and enjoy the event, regardless the outcome. For additional information, please check the <a href=\"gamerules.php?action=international\">gamerules section</a>. Fair Play Cup groups for season 22 will be announced late in the evening.<br/><br/>All the best!<br/>admin')") or die(mysql_error());
}
$klup = mysql_query("SELECT ekipa AS ekipa, userid AS user FROM ekipe, users WHERE ekipe.ekipa = users.club AND ekipe.competition = 3 AND users.supporter=0") or die(mysql_error());
while ($f = mysql_fetch_array($klup)) {
$team = $f["ekipa"];
$user = $f["user"];
echo $team,"<br/>";
mysql_query("INSERT INTO messages VALUES ('', $user, 0, 0, NOW(), '<b>Fair Play Cup</b>', 'Basketsim proudly presents 21st edition of the prestigious <a href=\"fairplaycup.php\">Fair Play Cup</a> and as a Basketsim helper you will take part in it! Thank you for helping the game and all the best in the competition! Fair Play Cup matches won\'t bring any tiredness to your players and your players won\'t suffer from injures, so you can easily play them against the international competitors and enjoy the event, regardless the outcome. For additional information, please check the <a href=\"gamerules.php?action=international\">gamerules section</a>. Fair Play Cup groups for season 22 will be announced late in the evening.<br/><br/>All the best!<br/>admin')") or die(mysql_error());
}
die("obvestila out, zdaj dodam ekipe");
*/

/*
//ADDING TEAMS BASED ON THEIR FORUM ACTIVITY, ADJUST DATE IN QUERY BELOW AND $COUNT > 59 FOR # OF COMMENTS IN THAT TIME
$pisuka = mysql_query("SELECT `user_id`, COUNT(*) AS stevilo FROM `conf_comments` WHERE `date_comment` > '2014-06-01 00:00:00' AND `deleted_by` =0 GROUP BY `user_id`");
$f=0;
while ($f < mysql_num_rows($pisuka)) {
$userc = mysql_result($pisuka,$f,"user_id");
$count = mysql_result($pisuka,$f,"stevilo");
$dim = mysql_query("SELECT club FROM users WHERE bad_login < 99 AND userid = $userc LIMIT 1");
if (mysql_num_rows($dim) > 0 && $count > 59) {
$club = mysql_result($dim,0,"club");
$lala = mysql_query("SELECT ekipa FROM ekipe WHERE ekipa = $club");
if (mysql_num_rows($lala)>0) {$fe=4;} else {
mysql_query("INSERT INTO ekipe VALUES ('',$club,3,0,0,0);") or die(mysql_error());
mysql_query("INSERT INTO messages VALUES ('', $userc, 0, 0, NOW(), '<b>Fair Play Cup</b>', 'As one of the users who contribute to Basketsim forums a lot, you have been given a WildCard to play in the 21st edition of the prestigious <a href=\"fairplaycup.php\">Fair Play Cup</a>. Thank you for your contribution towards game community and all the best in the competition! Fair Play Cup groups for season 22 will be announced shortly.<br/><br/>All the best!<br/>admin')") or die(mysql_error());
echo $club,"<br/>";
}
}
$f++;
}
die("ADDED|FORUM");
*/

/*
//ADD MORE TEAMS - RECENTLY EXPIRED SUPPORTERS
//usual formula
//$pisuka = mysql_query("SELECT userid, club FROM `users` WHERE bad_login < 99 AND `supporter` =0 AND `expire` > '2013-12-28 23:59:59' AND `purchase` <> '0000-00-00 00:00:00'");
//formula for adding past paying memebers used in specific season 22
//$pisuka = mysql_query("SELECT userid, club FROM `users` WHERE bad_login <99 AND `purchase` < '2014-11-16 23:59:59' AND `purchase` <> '0000-00-00 00:00:00'");
//UNCOMMENT ONE ABOVE BEFORE EXECUTING!!!
$f=0;
while ($f < mysql_num_rows($pisuka)) {
$user = mysql_result($pisuka,$f,"userid");
$club = mysql_result($pisuka,$f,"club");
$lala = mysql_query("SELECT ekipa FROM ekipe WHERE ekipa = $club");
if (mysql_num_rows($lala)>0) {$fe=4;} else {
mysql_query("INSERT INTO ekipe VALUES ('',$club,3,0,0,0);") or die(mysql_error());
//message for formula 1 above
//mysql_query("INSERT INTO messages VALUES ('', $user, 0, 0, NOW(), '<b>Fair Play Cup</b>', 'As someone who has supported the game in the past, you were given a WildCard to play in the 21st edition of the prestigious <a href=\"fairplaycup.php\">Fair Play Cup</a>. Thank you for supporting the game and best of luck in the competition! Fair Play Cup groups for season 22 will be announced soon.<br/><br/>All the best!<br/>admin')") or die(mysql_error());
//mesage for formula 2 above
//mysql_query("INSERT INTO messages VALUES ('', $user, 0, 0, NOW(), '<b>Fair Play Cup</b>', 'As one of traditional supporters of Basketsim, you were given a WildCard to play in the 21st edition of the prestigious <a href=\"fairplaycup.php\">Fair Play Cup</a>. Thank you for your past support and best of luck in the competition! Fair Play Cup groups for season 22 will be announced soon.<br/><br/>All the best!<br/>admin')") or die(mysql_error());
//UNCOMMENT ONE ABOVE
echo $club,"<br/>";
}
$f++;
}
die("ADDED|EX");
*/

/*
//ADDING ALL FORMER 3P-CONTEST SPONSORS WHO ARE NOW NOT SUPPORTERS
$pisuka = mysql_query("SELECT DISTINCT `sponsor` as sponsor, club FROM `threepoints`, users WHERE userid = sponsor");
$f=0;
while ($f < mysql_num_rows($pisuka)) {
$user = mysql_result($pisuka,$f,"sponsor");
$club = mysql_result($pisuka,$f,"club");
$lala = mysql_query("SELECT ekipa FROM ekipe WHERE ekipa = $club");
if (mysql_num_rows($lala)>0) {$fe=4;} else {
mysql_query("INSERT INTO ekipe VALUES ('',$club,3,0,0,0);") or die(mysql_error());
mysql_query("INSERT INTO messages VALUES ('', $user, 0, 0, NOW(), '<b>Fair Play Cup</b>', 'As someone who has supported 3-point contest in the past, you were given a WildCard to play in the 21st edition of the prestigious <a href=\"fairplaycup.php\">Fair Play Cup</a>. Thank you for your past support and best of luck in the competition! Fair Play Cup groups for season 22 will be announced soon.<br/><br/>All the best!<br/>admin')") or die(mysql_error());
echo $club,"<br/>";
}
$f++;
}
die("3P3P3P");
*/

/*
//MORE TEAMS - MOST STATEMENTS; ADJUST TIME AND LIMIT IN QUERY (OR JUST REMOVE THIS)
$pisuka = mysql_query("SELECT count(*) AS laba, club, userid FROM `statements`, users WHERE user = userid AND bad_login < 99 AND time > '2014-04-30 00:00:00' GROUP BY user ORDER BY laba DESC LIMIT 20");
$f=0;
while ($f < mysql_num_rows($pisuka)) {
$club = mysql_result($pisuka,$f,"club");
$userc = mysql_result($pisuka,$f,"userid");
$lala = mysql_query("SELECT ekipa FROM ekipe WHERE ekipa = $club");
if (mysql_num_rows($lala)>0) {$fe=4;} else {
mysql_query("INSERT INTO ekipe VALUES ('',$club,3,0,0,0);") or die(mysql_error());
mysql_query("INSERT INTO messages VALUES ('', $userc, 0, 0, NOW(), '<b>Fair Play Cup</b>', 'The fact that you post a lot of club statements shows your dedication for the game and also makes it interesting for others who have the priviledge to compete against you. For that reason, you have been given a WildCard to compete in the 21st edition of the prestigious <a href=\"fairplaycup.php\">Fair Play Cup</a>. Thank you for your contribution to the game and best of luck in the competition! Fair Play Cup groups for season 22 will be announced soon.<br/><br/>All the best!<br/>admin')") or die(mysql_error());
echo $club,"<br/>";
}
$f++;
}
die("ADDED");
*/

/*
********************
TEAMS ADDED
PROCEED TO WILDCARDS
********************
*/

/*
//MIRRORING FOR TABLE EKIPE TO FPGROUPS
$d = mysql_query("SELECT `ekipa`, name, country, userid FROM `ekipe` , teams, users WHERE ekipa = teamid AND club = teamid AND competition =3") or die(mysql_error());
while ($pig = mysql_fetch_array($d)) {
$aekipa = $pig['ekipa'];
$aname = $pig['name'];
$acountry = $pig['country'];
$auserid = $pig['userid'];
$aname = addslashes($aname);
mysql_query("INSERT INTO fpgroups VALUES ('', '$aekipa', '$aname', '$acountry', '$auserid', 0, 0, 0, 0, 0, 0, '', $suzona);") or die(mysql_error());
}
die("ALL GOOD");
*/

/*
//THIS WE DO 6 TIMES
$stevgrup=210;
$duer = mysql_query("SELECT id FROM fpgroups WHERE season='$suzona' AND `GROUP`=0 ORDER BY RAND() LIMIT $stevgrup");
while ($r = mysql_fetch_array($duer)) {
$id = $r[id];
$t=$t+1;
mysql_query("UPDATE fpgroups SET `GROUP`=$t WHERE season=$suzona AND id=$id");
echo $ekipa,"<br/>";
}
die("6-TIMES");
*/

/*
//DRAW
$sezona=22;
$day11 = '2015-04-23 18:30:00';
$day12 = '2015-04-23 21:00:00';
$day21 = '2015-04-30 18:30:00';
$day22 = '2015-04-30 21:00:00';
$day31 = '2015-05-07 18:30:00';
$day32 = '2015-05-07 21:00:00';
$day41 = '2015-05-14 18:30:00';
$day42 = '2015-05-14 21:00:00';
$day51 = '2015-05-21 18:30:00';
$day52 = '2015-05-21 21:00:00';
for ( $counter = 1; $counter <= 210; $counter += 1) {
$dong = mysql_query("SELECT ekipa, arenaid, teams.country FROM fpgroups, teams, arena WHERE fpgroups.ekipa = teams.teamid AND arena.teamid = teams.teamid AND season=$suzona AND `GROUP` =$counter");
$num = mysql_num_rows($dong);
$pin=0;
while ($pin < $num) {
$ekipa = mysql_result($dong,$pin,"ekipa");
$arenaid = mysql_result($dong,$pin,"arenaid");
$country = mysql_result($dong,$pin,"country");
$array_teamid[$pin] = $ekipa;
$array_arena[$pin] = $arenaid;
$array_country[$pin] = $country;
$pin++;
}
// ROUND 1
mysql_query("INSERT INTO matches VALUES ('', $array_teamid[1], '', $array_teamid[3], '', $array_arena[1], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day11', 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_country[1]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO matches VALUES ('', $array_teamid[4], '', $array_teamid[0], '', $array_arena[4], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day12', 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_country[4]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO matches VALUES ('', $array_teamid[5], '', $array_teamid[2], '', $array_arena[5], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day12', 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_country[5]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
// ROUND 2
mysql_query("INSERT INTO matches VALUES ('', $array_teamid[4], '', $array_teamid[1], '', $array_arena[4], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day21', 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_country[4]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO matches VALUES ('', $array_teamid[3], '', $array_teamid[5], '', $array_arena[3], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day21', 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_country[3]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO matches VALUES ('', $array_teamid[0], '', $array_teamid[2], '', $array_arena[0], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day22', 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_country[0]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
// ROUND 3
mysql_query("INSERT INTO matches VALUES ('', $array_teamid[3], '', $array_teamid[0], '', $array_arena[3], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day31', 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_country[3]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO matches VALUES ('', $array_teamid[5], '', $array_teamid[1], '', $array_arena[5], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day32', 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_country[5]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO matches VALUES ('', $array_teamid[2], '', $array_teamid[4], '', $array_arena[2], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day32', 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_country[2]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
// ROUND 4
mysql_query("INSERT INTO matches VALUES ('', $array_teamid[0], '', $array_teamid[5], '', $array_arena[0], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day41', 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_country[0]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO matches VALUES ('', $array_teamid[1], '', $array_teamid[2], '', $array_arena[1], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day41', 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_country[1]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO matches VALUES ('', $array_teamid[3], '', $array_teamid[4], '', $array_arena[3], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day42', 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_country[3]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
// ROUND 5
mysql_query("INSERT INTO matches VALUES ('', $array_teamid[1], '', $array_teamid[0], '', $array_arena[1], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day51', 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_country[1]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO matches VALUES ('', $array_teamid[2], '', $array_teamid[3], '', $array_arena[2], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day52', 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_country[2]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO matches VALUES ('', $array_teamid[4], '', $array_teamid[5], '', $array_arena[4], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day52', 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_country[4]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
}
die("CHANGE DATES - RUN BELOW DRAW IN SCRIPT!!!");
*/

/*
//CHANGE DATES - IMMEDIATELY AFTER DRAW
$datf1 = '2015-04-23 21:00:00'; $datfp11 = '2015-04-23 18:30:00';
$datf2 = '2015-04-30 18:30:00'; $datfp22 = '2015-04-30 21:00:00';
$datf3 = '2015-05-07 21:00:00'; $datfp33 = '2015-05-07 18:30:00';
$datf4 = '2015-05-14 18:30:00'; $datfp44 = '2015-05-14 21:00:00';
$datf5 = '2015-05-21 21:00:00'; $datfp55 = '2015-05-21 18:30:00';
//CHANGE MATCH TIMES
//in first 105 groups one game to 18:30
$g=1;
while ($g < 106) {
$dong = mysql_query("SELECT matchid FROM `matches`, fpgroups WHERE `time`='$datf1' AND `type`=5 AND ekipa = home_id AND `GROUP`=$g AND fpgroups.season=$suzona ORDER BY matchid ASC LIMIT 1") or die(mysql_error());
$matchus = mysql_result($dong,0) or die(mysql_error());
mysql_query("UPDATE matches SET `time`='$datfp11' WHERE `time`='$datf1' AND `type`=5 AND matchid='$matchus' LIMIT 1");
$g++;
}
//in remaining 105 groups one game to 21:00
$g=106;
while ($g < 211) {
$dong = mysql_query("SELECT matchid FROM `matches`, fpgroups WHERE `time`='$datf2' AND `type`=5 AND ekipa = home_id AND `GROUP`=$g AND fpgroups.season=$suzona ORDER BY matchid DESC LIMIT 1") or die(mysql_error());
$matchus = mysql_result($dong,0) or die(mysql_error());
mysql_query("UPDATE matches SET `time`='$datfp22' WHERE `time`='$datf2' AND `type`=5 AND matchid='$matchus' LIMIT 1");
$g++;
}
//in first 105 groups one game to 18:30
$g=1;
while ($g < 106) {
$dong = mysql_query("SELECT matchid FROM `matches`, fpgroups WHERE `time`='$datf3' AND `type`=5 AND ekipa = home_id AND `GROUP`=$g AND fpgroups.season=$suzona ORDER BY matchid ASC LIMIT 1") or die(mysql_error());
$matchus = mysql_result($dong,0) or die(mysql_error());
mysql_query("UPDATE matches SET `time`='$datfp33' WHERE `time`='$datf3' AND `type`=5 AND matchid='$matchus' LIMIT 1");
$g++;
}
//in remaining 105 groups one game to 21:00
$g=106;
while ($g < 211) {
$dong = mysql_query("SELECT matchid FROM `matches`, fpgroups WHERE `time`='$datf4' AND `type`=5 AND ekipa = home_id AND `GROUP`=$g AND fpgroups.season=$suzona ORDER BY matchid DESC LIMIT 1") or die(mysql_error());
$matchus = mysql_result($dong,0) or die(mysql_error());
mysql_query("UPDATE matches SET `time`='$datfp44' WHERE `time`='$datf4' AND `type`=5 AND matchid='$matchus' LIMIT 1");
$g++;
}
//in first 105 groups one game to 18:30
$g=1;
while ($g < 106) {
$dong = mysql_query("SELECT matchid FROM `matches`, fpgroups WHERE `time`='$datf5' AND `type`=5 AND ekipa = home_id AND `GROUP`=$g AND fpgroups.season=$suzona ORDER BY matchid ASC LIMIT 1") or die(mysql_error());
$matchus = mysql_result($dong,0) or die(mysql_error());
mysql_query("UPDATE matches SET `time`='$datfp55' WHERE `time`='$datf5' AND `type`=5 AND matchid='$matchus' LIMIT 1");
$g++;
}
die("DATES ADJUSTED");
*/

/*
//MAILOUT!!!
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
$result = mysql_query("SELECT username, email FROM `ekipe` , `users` WHERE competition =3 AND ekipa = club AND last_active < '2014-06-05 03:35:00'") or die(mysql_error());
$hu=0;
while ($hu < mysql_num_rows($result)) {
$u_name = mysql_result($result,$hu,"username");
$email_to = mysql_result($result,$hu,"email");
$message1 = "19th Fair Play Cup starts in less than 20 hours and your team is taking part! So make sure to login to Basketsim and enjoy the competition with almost 7 years of tradition, where 1260 teams from 64 countries compete in 210 qualifying groups!";
$message2 = "See you soon!";
$message3 = "www.basketsim.com";
send_mail("$email_to", "Hello $u_name!\n\n$message1\n\n$message2\n$message3", "Basketsim Fair Play Cup", "basketsim@basketsim.com", "Basketsim");
$hu++;
}
die("kgkg");
*/
?>