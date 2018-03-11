<?php
ini_set("max_execution_time",4800);
include_once("common.php");

/*
//with this you update flags stats

mysql_query("TRUNCATE TABLE `flags`") or die(mysql_error());
$queryF = mysql_query("SELECT club, userid, username, signed, name, country FROM users, teams WHERE club=teamid AND supporter=1") or die(mysql_error());
while ($i = mysql_fetch_array($queryF)) {
$club = $i["club"];
$user = $i["userid"];
$unam = $i["username"];
$sign = $i["signed"];
$name = $i["name"]; $name=addslashes($name);
$cunt = $i["country"];
$drzave1 = mysql_query("SELECT DISTINCT teams.country AS country FROM teams, matches WHERE teams.teamid = matches.away_id AND crowd1 > 0 AND time > '$sign' AND matches.home_id=$club") or die(mysql_error());
$drzave2 = mysql_query("SELECT DISTINCT `country` FROM `matches` WHERE crowd1 > 0 AND time > '$sign' AND away_id=$club") or die(mysql_error());
$drzave3 = mysql_query("SELECT DISTINCT teams.country AS country FROM teams, matches WHERE teams.teamid = matches.away_id AND crowd1 > 0 AND time > '$sign' AND type=2 AND matches.home_id=$club") or die(mysql_error());
$drzave4 = mysql_query("SELECT DISTINCT `country` FROM `matches` WHERE crowd1 > 0 AND time > '$sign' AND type=2 AND away_id=$club") or die(mysql_error());
$ena = mysql_num_rows($drzave1); if(!$ena){$ena=0;}
$dve = mysql_num_rows($drzave2); if(!$dve){$dve=0;}
$tri = mysql_num_rows($drzave3); if(!$tri){$tri=0;}
$sti = mysql_num_rows($drzave4); if(!$sti){$sti=0;}
$drzave5 = mysql_query("SELECT DISTINCT country FROM teams, users, guestbook WHERE teamid = club AND userid = gauthor AND greceiver=$user") or die(mysql_error());
$drzave6 = mysql_query("SELECT DISTINCT country FROM teams, users, guestbook WHERE teamid = club AND userid = greceiver AND gauthor=$user") or die(mysql_error());
$pet = mysql_num_rows($drzave5); if(!$pet){$pet=0;}
$ses = mysql_num_rows($drzave6); if(!$ses){$ses=0;}
$drzave7 = mysql_query("SELECT DISTINCT players.country AS country FROM statistics, players, users, matches WHERE player=id AND users.club=team AND statistics.match=matchid AND matches.time > users.signed AND team =$club GROUP BY `player`") or die(mysql_error());
$sed = mysql_num_rows($drzave7); if(!$sed){$sed=0;}
$ikver = "INSERT INTO flags VALUES ($user, '$unam', '$cunt', '$name', $ena, $dve, $tri, $sti, $pet, $ses, $sed, $tri+$sti, $ena+$dve, $pet+$ses);";
mysql_query($ikver) or die(mysql_error());
}
die("FAFAFA");
*/


/*
//with this you assign mvp cups to best players of FPC, CS, CWS and YCWC

for ( $season = 21; $season < 22; $season += 1) {
//$drav = mysql_query("SELECT player, team, AVG( ( 2 * two_scored + one_scored +3 * three_scored + def_rebounds + off_rebounds + assists + steals + blocks - turnovers - two_total + two_scored - three_total + three_scored - one_total + one_scored ) ) AS rating FROM statistics, matches WHERE `match` = matchid AND ( 2 * two_scored + one_scored +3 * three_scored + def_rebounds + off_rebounds + assists + steals + blocks - turnovers - two_total + two_scored - three_total + three_scored - one_total + one_scored ) <10000 AND matches.season =$season AND matches.type=6 GROUP BY player HAVING count( statid ) >11 ORDER BY `rating` DESC LIMIT 1") or die(mysql_error());
$drav = mysql_query("SELECT player, team, SUM( ( 2 * two_scored + one_scored +3 * three_scored + def_rebounds + off_rebounds + assists + steals + blocks - turnovers - two_total + two_scored - three_total + three_scored - one_total + one_scored ) ) AS rating FROM statistics, matches WHERE `match` = matchid AND ( 2 * two_scored + one_scored +3 * three_scored + def_rebounds + off_rebounds + assists + steals + blocks - turnovers - two_total + two_scored - three_total + three_scored - one_total + one_scored ) <10000 AND matches.season =$season AND matches.type=19 GROUP BY player ORDER BY `rating` DESC LIMIT 1") or die(mysql_error());
while ($aba=mysql_fetch_array($drav)) {
$playerID=0;
$playerID=$aba['player'];
$teamC=$aba['team'];
$ratingC=$aba['rating'];
if (is_numeric($playerID) AND $playerID >0 AND $ratingC > 0) {
$dodq = mysql_query("SELECT `name` FROM teams WHERE teamid=$teamC LIMIT 1") or die(mysql_error());
$imee = @mysql_result($dodq,0,'name');
$imee = addslashes($imee);
mysql_query("INSERT INTO top_players VALUES ('', $playerID, $ratingC, 0, '$imee', 0, 0, 0, '', 0, $season, 19);") or die(mysql_error());
echo $season,": <a href=\"player.php?playerid=",$playerID,"\">",$playerID,"</a> (",$imee,") - ",$ratingC,"<br/>";
}
}
}
die("DONE!");
*/


/*
//ANNOUNCING AND SETTING UP NEW COACHES - CHANGE CODE ON 4 PLACES BELOW!!!

//UPDATE `users` SET `natcoach` =0,`nt_country` = '' WHERE `natcoach`=1 <--!!!2 for juniors
//UPDATE `countries` SET `mood`=(`mood`+119)/2 <--!!!change table to u18countries if it's being done for juniors!!!

$izbor = mysql_query("SELECT DISTINCT ALTCOUNTRY FROM countries WHERE natarena<>0");
$k=0;
while ($k < mysql_num_rows($izbor)) {
$gcountry = mysql_result($izbor,$k);
$plok = mysql_query("SELECT users.userid FROM elections, users WHERE elections.userid = users.userid AND elections.country='$gcountry' AND reject=0 AND natcoach<>2 ORDER BY elections.votes DESC, users.signed ASC LIMIT 1") or die(mysql_error());
$fink = mysql_result($plok,0);
if ($gcountry=='Bosnia') {$gcountry='Bosnia and Herzegovina';}
echo $gcountry," - ",$fink,"<br/>";
mysql_query("UPDATE users SET natcoach=1, nt_country = '$gcountry' WHERE userid=$fink LIMIT 1");
mysql_query("INSERT INTO messages VALUES ('', $fink, 0, 0, NOW(), '<b>Senior national coach</b>', 'Congratulations on your election to the post of the senior national team coach! You are now in charge of senior national selection. Under World Cup (in the left menu) you will notice links <i>\"national team\"</i> and <i>\"change arena\"</i> which are only available to you. Most important features are available after you enter the \"national team\" section.<br/><br/>Being a national coach, it\'s good to be familiar with the national teams rules - they are available in the game rules, so go there and read them thoroughly. Countries play matches every Friday at 19:00 (server time). When your team is not involved in the World Cup fixture you can arrange a friendly game against any available country.<br/><br/>National coaches are elected for 2 seasons and cannot be replaced during that time, so make sure to do your best regardless the results, selection is essential for the future, not just for the present, next generation will benefit if you get selection right!<br/><br/>If this is your first time election, don\'t forget to join the national coaches forum - you can find it at the bottom of the forums list.<br/><br>I wish you and your nation all the best!<br/>admin')") or die(mysql_error());
//mysql_query("INSERT INTO messages VALUES ('', $fink, 0, 0, NOW(), '<b>Junior national coach</b>', 'Congratulations on your election to the post of the junior national team coach! You are now in charge of U19 national selection. Under World Cup (in the left menu) you will notice links <i>\"national team\"</i> and <i>\"change arena\"</i> which are only available to you. Most important features are available after you enter the \"national team\" section.<br/><br/>Being a national coach, it\'s good to be familiar with the national teams rules - they are available in the game rules, so go there and read them thoroughly. Countries play matches every Friday at 19:00 (server time). When your team is not involved in the World Cup fixture you can arrange a friendly game against any available country.<br/><br/>National coaches are elected for 2 seasons and cannot be replaced during that time, so make sure to do your best regardless the results, selection is essential for the future, not just for the present, next generation will benefit if you get selection right!<br/><br/>If this is your first time election, don\'t forget to join the national coaches forum - you can find it at the bottom of the forums list.<br/><br>I wish you and your nation all the best!<br/>admin')") or die(mysql_error());
$k++;
}
die("cvrc");
*/


/*
//setting up national team arenas, change code on 2 places below

$izbor = mysql_query("SELECT DISTINCT country FROM regions");
$k=0;
while ($k < mysql_num_rows($izbor)) {
$drzava = mysql_result($izbor,$k);
$prima = mysql_query("SELECT arena.teamid as ar FROM teams, arena WHERE arena.teamid = teams.teamid AND teams.country = '$drzava' AND in_use =100 AND status=1 ORDER BY seats1+seats2+seats3+seats4 DESC LIMIT 2") or die(mysql_error());
$flika = mysql_result($prima,0,"ar"); //1 za mlade!!!
if ($drzava == 'Bosnia') {$drzava = 'Bosnia and Herzegovina';}

//u18countries for juniors, countries for seniors
mysql_query("UPDATE countries SET natarena = '$flika' WHERE country = '$drzava' LIMIT 1") or die(mysql_error());
$k++;
}
die("NT!");
*/


/*
//UPDATE NT RATINGS - adjust below whether it's for seniors or juniors

mysql_query("UPDATE countries SET `totalwin`=0, `totallose`=0, `totaldifference`=0") or die(mysql_error());
$drava = mysql_query("SELECT `home_name` , `away_name` , `home_score` , `away_score` FROM `nt_matches` WHERE season > 17 AND type<>2 AND type < 9") or die(mysql_error());
while ($mc = mysql_fetch_array($drava)) {
$home_name = $mc[home_name];
$away_name = $mc[away_name];
$domaci = $mc[home_score];
$gostje = $mc[away_score];
if ($domaci < $gostje) {$domacazmaga=0; $domaciporaz=1; $gostujocazmaga=1; $gostujociporaz=0;} else {$domacazmaga=1; $domaciporaz=0; $gostujocazmaga=0; $gostujociporaz=1;}
mysql_query("UPDATE `countries` SET totalwin=totalwin+$domacazmaga, totallose=totallose+$domaciporaz, totaldifference=totaldifference+$domaci-$gostje WHERE `country`='$home_name' LIMIT 1") or die(mysql_error());
mysql_query("UPDATE `countries` SET totalwin=totalwin+$gostujocazmaga, totallose=totallose+$gostujociporaz, totaldifference=totaldifference+$gostje-$domaci WHERE `country`='$away_name' LIMIT 1") or die(mysql_error());
}
die("ALL GOOD. ADD BONUSES!");
*/


/*
//add medals to players, make sure that all other things in this file are commented
//add medals also to nt managers and teams

$idfinalne=18097; //id of final match
$idtretjem=18098; //id of 3rd place match
$prvenstvo=9; //which world cup was it

$drava = mysql_query("SELECT type, `home_score` , `away_score` , `home_pg1` , `home_sg1` , `home_sf1` , `home_pf1` , `home_c1` , `away_pg1` , `away_sg1` , `away_sf1` , `away_pf1` , `away_c1` , `home_pg2` , `home_sg2` , `home_sf2` , `home_pf2` , `home_c2` , `away_pg2` , `away_sg2` , `away_sf2` , `away_pf2` , `away_c2` FROM nt_matches WHERE matchid=$idfinalne") or die(mysql_error());
while ($mc = mysql_fetch_array($drava)) {
$type = $mc[type];
$home_score = $mc[home_score];
$away_score = $mc[away_score];
$home_pg1 = $mc[home_pg1];
$home_sg1 = $mc[home_sg1];
$home_sf1 = $mc[home_sf1];
$home_pf1 = $mc[home_pf1];
$home_c1 = $mc[home_c1];
$away_pg1 = $mc[away_pg1];
$away_sg1 = $mc[away_sg1];
$away_sf1 = $mc[away_sf1];
$away_pf1 = $mc[away_pf1];
$away_c1 = $mc[away_c1];
$home_pg2 = $mc[home_pg2];
$home_sg2 = $mc[home_sg2];
$home_sf2 = $mc[home_sf2];
$home_pf2 = $mc[home_pf2];
$home_c2 = $mc[home_c2];
$away_pg2 = $mc[away_pg2];
$away_sg2 = $mc[away_sg2];
$away_sf2 = $mc[away_sf2];
$away_pf2 = $mc[away_pf2];
$away_c2 = $mc[away_c2];
if ($home_score > $away_score) {
if ($home_pg1 > 0) {mysql_query("INSERT INTO medals VALUES ('', $home_pg1, 1, $prvenstvo, $type)") or die(mysql_error());}
if ($home_sg1 > 0) {mysql_query("INSERT INTO medals VALUES ('', $home_sg1, 1, $prvenstvo, $type)") or die(mysql_error());}
if ($home_sf1 > 0) {mysql_query("INSERT INTO medals VALUES ('', $home_sf1, 1, $prvenstvo, $type)") or die(mysql_error());}
if ($home_pf1 > 0) {mysql_query("INSERT INTO medals VALUES ('', $home_pf1, 1, $prvenstvo, $type)") or die(mysql_error());}
if ($home_c1 > 0) {mysql_query("INSERT INTO medals VALUES ('', $home_c1, 1, $prvenstvo, $type)") or die(mysql_error());}
if ($home_pg2 > 0) {mysql_query("INSERT INTO medals VALUES ('', $home_pg2, 1, $prvenstvo, $type)") or die(mysql_error());}
if ($home_sg2 > 0) {mysql_query("INSERT INTO medals VALUES ('', $home_sg2, 1, $prvenstvo, $type)") or die(mysql_error());}
if ($home_sf2 > 0) {mysql_query("INSERT INTO medals VALUES ('', $home_sf2, 1, $prvenstvo, $type)") or die(mysql_error());}
if ($home_pf2 > 0) {mysql_query("INSERT INTO medals VALUES ('', $home_pf2, 1, $prvenstvo, $type)") or die(mysql_error());}
if ($home_c2 > 0) {mysql_query("INSERT INTO medals VALUES ('', $home_c2, 1, $prvenstvo, $type)") or die(mysql_error());}
if ($away_pg1 > 0) {mysql_query("INSERT INTO medals VALUES ('', $away_pg1, 2, $prvenstvo, $type)") or die(mysql_error());}
if ($away_sg1 > 0) {mysql_query("INSERT INTO medals VALUES ('', $away_sg1, 2, $prvenstvo, $type)") or die(mysql_error());}
if ($away_sf1 > 0) {mysql_query("INSERT INTO medals VALUES ('', $away_sf1, 2, $prvenstvo, $type)") or die(mysql_error());}
if ($away_pf1 > 0) {mysql_query("INSERT INTO medals VALUES ('', $away_pf1, 2, $prvenstvo, $type)") or die(mysql_error());}
if ($away_c1 > 0) {mysql_query("INSERT INTO medals VALUES ('', $away_c1, 2, $prvenstvo, $type)") or die(mysql_error());}
if ($away_pg2 > 0) {mysql_query("INSERT INTO medals VALUES ('', $away_pg2, 2, $prvenstvo, $type)") or die(mysql_error());}
if ($away_sg2 > 0) {mysql_query("INSERT INTO medals VALUES ('', $away_sg2, 2, $prvenstvo, $type)") or die(mysql_error());}
if ($away_sf2 > 0) {mysql_query("INSERT INTO medals VALUES ('', $away_sf2, 2, $prvenstvo, $type)") or die(mysql_error());}
if ($away_pf2 > 0) {mysql_query("INSERT INTO medals VALUES ('', $away_pf2, 2, $prvenstvo, $type)") or die(mysql_error());}
if ($away_c2 > 0) {mysql_query("INSERT INTO medals VALUES ('', $away_c2, 2, $prvenstvo, $type)") or die(mysql_error());}
}
else {
if ($home_pg1 > 0) {mysql_query("INSERT INTO medals VALUES ('', $home_pg1, 2, $prvenstvo, $type)") or die(mysql_error());}
if ($home_sg1 > 0) {mysql_query("INSERT INTO medals VALUES ('', $home_sg1, 2, $prvenstvo, $type)") or die(mysql_error());}
if ($home_sf1 > 0) {mysql_query("INSERT INTO medals VALUES ('', $home_sf1, 2, $prvenstvo, $type)") or die(mysql_error());}
if ($home_pf1 > 0) {mysql_query("INSERT INTO medals VALUES ('', $home_pf1, 2, $prvenstvo, $type)") or die(mysql_error());}
if ($home_c1 > 0) {mysql_query("INSERT INTO medals VALUES ('', $home_c1, 2, $prvenstvo, $type)") or die(mysql_error());}
if ($home_pg2 > 0) {mysql_query("INSERT INTO medals VALUES ('', $home_pg2, 2, $prvenstvo, $type)") or die(mysql_error());}
if ($home_sg2 > 0) {mysql_query("INSERT INTO medals VALUES ('', $home_sg2, 2, $prvenstvo, $type)") or die(mysql_error());}
if ($home_sf2 > 0) {mysql_query("INSERT INTO medals VALUES ('', $home_sf2, 2, $prvenstvo, $type)") or die(mysql_error());}
if ($home_pf2 > 0) {mysql_query("INSERT INTO medals VALUES ('', $home_pf2, 2, $prvenstvo, $type)") or die(mysql_error());}
if ($home_c2 > 0) {mysql_query("INSERT INTO medals VALUES ('', $home_c2, 2, $prvenstvo, $type)") or die(mysql_error());}
if ($away_pg1 > 0) {mysql_query("INSERT INTO medals VALUES ('', $away_pg1, 1, $prvenstvo, $type)") or die(mysql_error());}
if ($away_sg1 > 0) {mysql_query("INSERT INTO medals VALUES ('', $away_sg1, 1, $prvenstvo, $type)") or die(mysql_error());}
if ($away_sf1 > 0) {mysql_query("INSERT INTO medals VALUES ('', $away_sf1, 1, $prvenstvo, $type)") or die(mysql_error());}
if ($away_pf1 > 0) {mysql_query("INSERT INTO medals VALUES ('', $away_pf1, 1, $prvenstvo, $type)") or die(mysql_error());}
if ($away_c1 > 0) {mysql_query("INSERT INTO medals VALUES ('', $away_c1, 1, $prvenstvo, $type)") or die(mysql_error());}
if ($away_pg2 > 0) {mysql_query("INSERT INTO medals VALUES ('', $away_pg2, 1, $prvenstvo, $type)") or die(mysql_error());}
if ($away_sg2 > 0) {mysql_query("INSERT INTO medals VALUES ('', $away_sg2, 1, $prvenstvo, $type)") or die(mysql_error());}
if ($away_sf2 > 0) {mysql_query("INSERT INTO medals VALUES ('', $away_sf2, 1, $prvenstvo, $type)") or die(mysql_error());}
if ($away_pf2 > 0) {mysql_query("INSERT INTO medals VALUES ('', $away_pf2, 1, $prvenstvo, $type)") or die(mysql_error());}
if ($away_c2 > 0) {mysql_query("INSERT INTO medals VALUES ('', $away_c2, 1, $prvenstvo, $type)") or die(mysql_error());}
}
}
$drava1 = mysql_query("SELECT type, `home_score` , `away_score` , `home_pg1` , `home_sg1` , `home_sf1` , `home_pf1` , `home_c1` , `away_pg1` , `away_sg1` , `away_sf1` , `away_pf1` , `away_c1` , `home_pg2` , `home_sg2` , `home_sf2` , `home_pf2` , `home_c2` , `away_pg2` , `away_sg2` , `away_sf2` , `away_pf2` , `away_c2` FROM nt_matches WHERE matchid=$idtretjem") or die(mysql_error());
while ($mc = mysql_fetch_array($drava1)) {
$type = $mc[type];
$home_score = $mc[home_score];
$away_score = $mc[away_score];
$home_pg1 = $mc[home_pg1];
$home_sg1 = $mc[home_sg1];
$home_sf1 = $mc[home_sf1];
$home_pf1 = $mc[home_pf1];
$home_c1 = $mc[home_c1];
$away_pg1 = $mc[away_pg1];
$away_sg1 = $mc[away_sg1];
$away_sf1 = $mc[away_sf1];
$away_pf1 = $mc[away_pf1];
$away_c1 = $mc[away_c1];
$home_pg2 = $mc[home_pg2];
$home_sg2 = $mc[home_sg2];
$home_sf2 = $mc[home_sf2];
$home_pf2 = $mc[home_pf2];
$home_c2 = $mc[home_c2];
$away_pg2 = $mc[away_pg2];
$away_sg2 = $mc[away_sg2];
$away_sf2 = $mc[away_sf2];
$away_pf2 = $mc[away_pf2];
$away_c2 = $mc[away_c2];
if ($home_score > $away_score) {
if ($home_pg1 > 0) {mysql_query("INSERT INTO medals VALUES ('', $home_pg1, 3, $prvenstvo, $type)") or die(mysql_error());}
if ($home_sg1 > 0) {mysql_query("INSERT INTO medals VALUES ('', $home_sg1, 3, $prvenstvo, $type)") or die(mysql_error());}
if ($home_sf1 > 0) {mysql_query("INSERT INTO medals VALUES ('', $home_sf1, 3, $prvenstvo, $type)") or die(mysql_error());}
if ($home_pf1 > 0) {mysql_query("INSERT INTO medals VALUES ('', $home_pf1, 3, $prvenstvo, $type)") or die(mysql_error());}
if ($home_c1 > 0) {mysql_query("INSERT INTO medals VALUES ('', $home_c1, 3, $prvenstvo, $type)") or die(mysql_error());}
if ($home_pg2 > 0) {mysql_query("INSERT INTO medals VALUES ('', $home_pg2, 3, $prvenstvo, $type)") or die(mysql_error());}
if ($home_sg2 > 0) {mysql_query("INSERT INTO medals VALUES ('', $home_sg2, 3, $prvenstvo, $type)") or die(mysql_error());}
if ($home_sf2 > 0) {mysql_query("INSERT INTO medals VALUES ('', $home_sf2, 3, $prvenstvo, $type)") or die(mysql_error());}
if ($home_pf2 > 0) {mysql_query("INSERT INTO medals VALUES ('', $home_pf2, 3, $prvenstvo, $type)") or die(mysql_error());}
if ($home_c2 > 0) {mysql_query("INSERT INTO medals VALUES ('', $home_c2, 3, $prvenstvo, $type)") or die(mysql_error());}
}
else {
if ($away_pg1 > 0) {mysql_query("INSERT INTO medals VALUES ('', $away_pg1, 3, $prvenstvo, $type)") or die(mysql_error());}
if ($away_sg1 > 0) {mysql_query("INSERT INTO medals VALUES ('', $away_sg1, 3, $prvenstvo, $type)") or die(mysql_error());}
if ($away_sf1 > 0) {mysql_query("INSERT INTO medals VALUES ('', $away_sf1, 3, $prvenstvo, $type)") or die(mysql_error());}
if ($away_pf1 > 0) {mysql_query("INSERT INTO medals VALUES ('', $away_pf1, 3, $prvenstvo, $type)") or die(mysql_error());}
if ($away_c1 > 0) {mysql_query("INSERT INTO medals VALUES ('', $away_c1, 3, $prvenstvo, $type)") or die(mysql_error());}
if ($away_pg2 > 0) {mysql_query("INSERT INTO medals VALUES ('', $away_pg2, 3, $prvenstvo, $type)") or die(mysql_error());}
if ($away_sg2 > 0) {mysql_query("INSERT INTO medals VALUES ('', $away_sg2, 3, $prvenstvo, $type)") or die(mysql_error());}
if ($away_sf2 > 0) {mysql_query("INSERT INTO medals VALUES ('', $away_sf2, 3, $prvenstvo, $type)") or die(mysql_error());}
if ($away_pf2 > 0) {mysql_query("INSERT INTO medals VALUES ('', $away_pf2, 3, $prvenstvo, $type)") or die(mysql_error());}
if ($away_c2 > 0) {mysql_query("INSERT INTO medals VALUES ('', $away_c2, 3, $prvenstvo, $type)") or die(mysql_error());}
}
}
die("check other players manually if they are eligible for the medal");
*/


/*
//DRAW OF GROUPS WITH 4 TEAMS EACH

$group = 'H'; //which group by letter
$leagueid = 8; //which group by number, f.e. A=1, B=2...
$arena2=38302; //host arena no.1 - teamid not arenaid!
$arena1=38336; //host arena no.2 - teamid not arenaid!

//everything above is adjusted for each run of the script, below just once, whether these are juniors or seniors

$domacin = 'Indonesia'; //host country
$tipec =13; //3-senior 13-junior
$sezona = 22; //season
$league_hour = 19; //always 19
$year = 2015; //year
$day = 17; //day
$month = 4;// month
$min = 0; //always zero
$sec = 0; //always zero

//BELOW CHANGE TABLE, EITHER U18COUNTRIES OR COUNTRIES!!!

$day1 = date("Y-m-d H:i:s", mktime($league_hour,$min,$sec,$month,$day,$year));
$day2 = date("Y-m-d H:i:s", mktime($league_hour,$min,$sec,$month,$day+7,$year));
$day3 = date("Y-m-d H:i:s", mktime($league_hour,$min,$sec,$month,$day+14,$year));
$widezanka = mysql_query("SELECT countryid, country FROM u18countries WHERE qualgroup='$group'") or die(mysql_error());
$widenum=mysql_num_rows($widezanka);
$k=0;
while ($k < $widenum) {
$drzava_id = mysql_result($widezanka,$k,"countryid");
$drzava_name = mysql_result($widezanka,$k,"country");
$array_teamid[$k] = $drzava_id;
$array_name[$k] = $drzava_name;
$k++;
}
//ROUND 1
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[2], '$array_name[2]', $array_teamid[1], '$array_name[1]', $arena2, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day1', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$domacin', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[3], '$array_name[3]', $array_teamid[0], '$array_name[0]', $arena1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day1', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$domacin', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
//ROUND 2
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[0], '$array_name[0]', $array_teamid[2], '$array_name[2]', $arena1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day2', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$domacin', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[1], '$array_name[1]', $array_teamid[3], '$array_name[3]', $arena2, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day2', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$domacin', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
//ROUND 3
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[3], '$array_name[3]', $array_teamid[2], '$array_name[2]', $arena2, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day3', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$domacin', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[0], '$array_name[0]', $array_teamid[1], '$array_name[1]', $arena1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day3', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$domacin', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
die("ALL GOOD!");
*/


/*
//with these queries you can search host arenas
SELECT * FROM arena, teams WHERE arena.teamid = teams.teamid AND (teams.country = 'Romania' OR teams.country = 'Bulgaria') AND `cheer_logo` <> '' AND seats3 >= seats1 AND `status` =1 AND (city LIKE '%bal' OR city LIKE '%isbo%' OR city LIKE '%rag%' OR city LIKE '%ort%') ORDER BY seats1 + seats2 + seats3 + seats4 DESC LIMIT 250
SELECT * FROM arena, teams WHERE arena.teamid = teams.teamid AND teams.country = 'Indonesia' AND `cheer_logo` <> '' AND seats3 >= seats1 AND `status` =1 ORDER BY seats1 + seats2 + seats3 + seats4 DESC LIMIT 250
*/


/*
//QUALIFICATION DRAW WITH 8 TEAMS PER GROUP

$group = 'H'; //which group by letter
$leagueid = 8; //which group by number, f.e. A=1, B=2...

//everything above is adjusted for each run of the script, below just once, whether these are juniors or seniors

$tipec =1; //1-seniors 11-juniors
$sezona = 22; //season
$year = 2015; //year
$month = 4;// month
$day = 3; //day
$league_hour = 19; //always 19
$min = 0; //always zero
$sec = 0; //always zero

$day1 = date("Y-m-d H:i:s", mktime($league_hour,$min,$sec,$month,$day,$year));
$day2 = date("Y-m-d H:i:s", mktime($league_hour,$min,$sec,$month,$day+7,$year));
$day3 = date("Y-m-d H:i:s", mktime($league_hour,$min,$sec,$month,$day+14,$year));
$day4 = date("Y-m-d H:i:s", mktime($league_hour,$min,$sec,$month,$day+21,$year));
$day5 = date("Y-m-d H:i:s", mktime($league_hour,$min,$sec,$month,$day+28,$year));
$day6 = date("Y-m-d H:i:s", mktime($league_hour,$min,$sec,$month,$day+35,$year));
$day7 = date("Y-m-d H:i:s", mktime($league_hour,$min,$sec,$month,$day+42,$year));
$day8 = date("Y-m-d H:i:s", mktime($league_hour,$min,$sec,$month,$day+49,$year));
$day9 = date("Y-m-d H:i:s", mktime($league_hour,$min,$sec,$month,$day+56,$year));
$day10 = date("Y-m-d H:i:s", mktime($league_hour,$min,$sec,$month,$day+63,$year));
$day11 = date("Y-m-d H:i:s", mktime($league_hour,$min,$sec,$month,$day+70,$year));
$day12 = date("Y-m-d H:i:s", mktime($league_hour,$min,$sec,$month,$day+77,$year));
$day13 = date("Y-m-d H:i:s", mktime($league_hour,$min,$sec,$month,$day+84,$year));
$day14 = date("Y-m-d H:i:s", mktime($league_hour,$min,$sec,$month,$day+91,$year));
if ($tipec==1) {$widezanka = mysql_query("SELECT countryid, country, natarena FROM countries WHERE qualgroup='$group'") or die(mysql_error());}
if ($tipec==11) {$widezanka = mysql_query("SELECT countryid, country, natarena FROM u18countries WHERE qualgroup='$group'") or die(mysql_error());}
$widenum=mysql_num_rows($widezanka);
$k=0;
while ($k < $widenum) {
$drzava_id = mysql_result($widezanka,$k,"countryid");
$drzava_name = mysql_result($widezanka,$k,"country");
$drzava_arena = mysql_result($widezanka,$k,"natarena");
$array_teamid[$k] = $drzava_id;
$array_name[$k] = $drzava_name;
$array_arena[$k] = $drzava_arena;
$k++;
}
// ROUND 1
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[1], '$array_name[1]', $array_teamid[2], '$array_name[2]', $array_arena[1], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day1', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[1]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[5], '$array_name[5]', $array_teamid[4], '$array_name[4]', $array_arena[5], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day1', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[5]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[7], '$array_name[7]', $array_teamid[3], '$array_name[3]', $array_arena[7], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day1', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[7]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[6], '$array_name[6]', $array_teamid[0], '$array_name[0]', $array_arena[6], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day1', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[6]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
// ROUND 2
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[4], '$array_name[4]', $array_teamid[3], '$array_name[3]', $array_arena[4], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day2', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[4]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[0], '$array_name[0]', $array_teamid[5], '$array_name[5]', $array_arena[0], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day2', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[0]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[6], '$array_name[6]', $array_teamid[1], '$array_name[1]', $array_arena[6], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day2', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[6]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[2], '$array_name[2]', $array_teamid[7], '$array_name[7]', $array_arena[2], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day2', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[2]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
// ROUND 3
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[3], '$array_name[3]', $array_teamid[5], '$array_name[5]', $array_arena[3], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day3', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[3]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[1], '$array_name[1]', $array_teamid[4], '$array_name[4]', $array_arena[1], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day3', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[1]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[2], '$array_name[2]', $array_teamid[6], '$array_name[6]', $array_arena[2], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day3', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[2]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[7], '$array_name[7]', $array_teamid[0], '$array_name[0]', $array_arena[7], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day3', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[7]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
// ROUND 4
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[0], '$array_name[0]', $array_teamid[2], '$array_name[2]', $array_arena[0], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day4', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[0]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[3], '$array_name[3]', $array_teamid[1], '$array_name[1]', $array_arena[3], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day4', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[3]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[4], '$array_name[4]', $array_teamid[6], '$array_name[6]', $array_arena[4], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day4', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[4]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[5], '$array_name[5]', $array_teamid[7], '$array_name[7]', $array_arena[5], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day4', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[5]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
// ROUND 5
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[1], '$array_name[1]', $array_teamid[0], '$array_name[0]', $array_arena[1], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day5', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[1]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[2], '$array_name[2]', $array_teamid[5], '$array_name[5]', $array_arena[2], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day5', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[2]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[6], '$array_name[6]', $array_teamid[3], '$array_name[3]', $array_arena[6], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day5', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[6]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[7], '$array_name[7]', $array_teamid[4], '$array_name[4]', $array_arena[7], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day5', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[7]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
// ROUND 6
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[3], '$array_name[3]', $array_teamid[2], '$array_name[2]', $array_arena[3], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day6', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[3]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[5], '$array_name[5]', $array_teamid[6], '$array_name[6]', $array_arena[5], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day6', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[5]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[4], '$array_name[4]', $array_teamid[0], '$array_name[0]', $array_arena[4], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day6', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[4]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[7], '$array_name[7]', $array_teamid[1], '$array_name[1]', $array_arena[7], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day6', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[7]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
// ROUND 7
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[6], '$array_name[6]', $array_teamid[7], '$array_name[7]', $array_arena[6], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day7', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[6]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[2], '$array_name[2]', $array_teamid[4], '$array_name[4]', $array_arena[2], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day7', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[2]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[0], '$array_name[0]', $array_teamid[3], '$array_name[3]', $array_arena[0], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day7', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[0]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[1], '$array_name[1]', $array_teamid[5], '$array_name[5]', $array_arena[1], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day7', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[1]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
// ROUND 8
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[2], '$array_name[2]', $array_teamid[1], '$array_name[1]', $array_arena[2], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day8', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[2]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[4], '$array_name[4]', $array_teamid[5], '$array_name[5]', $array_arena[4], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day8', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[4]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[3], '$array_name[3]', $array_teamid[7], '$array_name[7]', $array_arena[3], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day8', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[3]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[0], '$array_name[0]', $array_teamid[6], '$array_name[6]', $array_arena[0], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day8', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[0]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
// ROUND 9
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[3], '$array_name[3]', $array_teamid[4], '$array_name[4]', $array_arena[3], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day9', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[3]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[5], '$array_name[5]', $array_teamid[0], '$array_name[0]', $array_arena[5], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day9', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[5]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[1], '$array_name[1]', $array_teamid[6], '$array_name[6]', $array_arena[1], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day9', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[1]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[7], '$array_name[7]', $array_teamid[2], '$array_name[2]', $array_arena[7], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day9', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[7]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
// ROUND 10
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[5], '$array_name[5]', $array_teamid[3], '$array_name[3]', $array_arena[5], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day10', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[5]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[4], '$array_name[4]', $array_teamid[1], '$array_name[1]', $array_arena[4], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day10', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[4]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[6], '$array_name[6]', $array_teamid[2], '$array_name[2]', $array_arena[6], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day10', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[6]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[0], '$array_name[0]', $array_teamid[7], '$array_name[7]', $array_arena[0], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day10', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[0]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
// ROUND 11
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[2], '$array_name[2]', $array_teamid[0], '$array_name[0]', $array_arena[2], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day11', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[2]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[1], '$array_name[1]', $array_teamid[3], '$array_name[3]', $array_arena[1], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day11', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[1]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[6], '$array_name[6]', $array_teamid[4], '$array_name[4]', $array_arena[6], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day11', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[6]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[7], '$array_name[7]', $array_teamid[5], '$array_name[5]', $array_arena[7], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day11', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[7]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
// ROUND 12
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[0], '$array_name[0]', $array_teamid[1], '$array_name[1]', $array_arena[0], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day12', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[0]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[5], '$array_name[5]', $array_teamid[2], '$array_name[2]', $array_arena[5], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day12', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[5]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[3], '$array_name[3]', $array_teamid[6], '$array_name[6]', $array_arena[3], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day12', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[3]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[4], '$array_name[4]', $array_teamid[7], '$array_name[7]', $array_arena[4], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day12', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[4]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
// ROUND 13
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[2], '$array_name[2]', $array_teamid[3], '$array_name[3]', $array_arena[2], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day13', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[2]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[6], '$array_name[6]', $array_teamid[5], '$array_name[5]', $array_arena[6], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day13', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[6]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[0], '$array_name[0]', $array_teamid[4], '$array_name[4]', $array_arena[0], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day13', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[0]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[1], '$array_name[1]', $array_teamid[7], '$array_name[7]', $array_arena[1], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day13', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[1]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
// ROUND 14
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[7], '$array_name[7]', $array_teamid[6], '$array_name[6]', $array_arena[7], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day14', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[7]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[4], '$array_name[4]', $array_teamid[2], '$array_name[2]', $array_arena[4], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day14', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[4]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[3], '$array_name[3]', $array_teamid[0], '$array_name[0]', $array_arena[3], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day14', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[3]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', $array_teamid[5], '$array_name[5]', $array_teamid[1], '$array_name[1]', $array_arena[5], '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day14', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$array_name[5]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
*/
?>