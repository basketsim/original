<?php
ini_set("max_execution_time",4200);
include_once("common.php");
$suzona=22; //always make sure that season is consistent with current one

/*
this is a tool for searching top players, for global mvps which are manually assigned
it would be easier to use some kind of other tool, like top managers picking mvps or voting for them
but if this below is used, then there should be adjustment made for season and in each run for league level from 1 to 3
SELECT player, (scoring - ( two_total - two_scored ) - ( one_total - one_scored ) - ( three_total - three_scored ) + def_rebounds + off_rebounds + blocks + assists + steals - turnovers
) / gametime AS average, players.name AS ime, surname, teams.name AS ekipa, teamid FROM totalstats, players, teams, leagues WHERE season =13 AND totalstats.league = leagueid
AND leagues.level =1 AND player = id AND club = teamid AND team = teamid AND club <>0 AND gametime >499 AND age <21 ORDER BY (scoring - ( two_total - two_scored ) - ( one_total - one_scored ) - ( three_total - three_scored ) + def_rebounds + off_rebounds + blocks + assists + steals - turnovers) / gametime DESC LIMIT 250 
*/

//FIRST WE UNCOMMENT THIS AND RUN WILL POST MVPS ON LEAGUEBOARDS
/*
$izbor = mysql_query("SELECT DISTINCT leagues.leagueid FROM leagues, competition WHERE leagues.leagueid = competition.leagueid AND competition.season =$suzona") or die(mysql_error());
$k=0;
while ($k < mysql_num_rows($izbor)) {
$liga = mysql_result($izbor,$k);
$jarod='';
$mvpracun = mysql_query("SELECT id, name, surname, gametime, (scoring - two_total + two_scored - one_total + one_scored - three_total + three_scored + def_rebounds + off_rebounds + blocks + assists + steals - turnovers)/gametime AS average, (scoring - two_total + two_scored - one_total + one_scored - three_total + three_scored + def_rebounds + off_rebounds + blocks + assists + steals - turnovers) AS rating FROM totalstats, players WHERE player=id AND (scoring - two_total + two_scored - one_total + one_scored - three_total + three_scored + def_rebounds + off_rebounds + blocks + assists + steals - turnovers) < 100000 AND gametime >499 AND season=$suzona AND league=$liga ORDER BY (scoring - two_total + two_scored - one_total + one_scored - three_total + three_scored + def_rebounds + off_rebounds + blocks + assists + steals - turnovers)/gametime DESC LIMIT 15") or die(mysql_error());
while ($mc = mysql_fetch_array($mvpracun)) {
$player = $mc[id];
$name = $mc[name];
$surname = $mc[surname];
$gametime = $mc[gametime];
$average = $mc[average];
$rating = $mc[rating];
$jarod .= number_format(40*$average, 1, '.', '')." ".$name." ".$surname." (".$rating." rating / ".$gametime." minutes)\n";
}
mysql_query("INSERT INTO lb_comments (`username`, `type`, `league`, `time`, `content`) VALUES ('MVP Race', 4, $liga, NOW(), '$jarod')") or die(mysql_error());
$k++;
}
die("leagueboards");
*/

//SECOND WE UNCOMMENT THIS AND LEAGUE MVPS WILL BE ASSIGNED
/*
$izbor = mysql_query("SELECT DISTINCT leagues.leagueid FROM leagues, competition WHERE leagues.leagueid = competition.leagueid AND competition.season =$suzona") or die(mysql_error());
$k=0;
while ($k < mysql_num_rows($izbor)) {
$liga = mysql_result($izbor,$k);
$mvpracun = mysql_query("SELECT player, club, totalstats.country AS country, gametime, (scoring - two_total + two_scored - one_total + one_scored - three_total + three_scored + def_rebounds + off_rebounds + blocks + assists + steals - turnovers) AS rating FROM totalstats, players WHERE player=id AND club<>0 AND (scoring - two_total + two_scored - one_total + one_scored - three_total + three_scored + def_rebounds + off_rebounds + blocks + assists + steals - turnovers) < 100000 AND gametime >499 AND season=$suzona AND league=$liga ORDER BY (scoring - two_total + two_scored - one_total + one_scored - three_total + three_scored + def_rebounds + off_rebounds + blocks + assists + steals - turnovers)/gametime DESC") or die(mysql_error());
if (mysql_num_rows($mvpracun)>0) {
$player = mysql_result($mvpracun,0,"player");
$team = mysql_result($mvpracun,0,"club");
$country = mysql_result($mvpracun,0,"country");
$gametime = mysql_result($mvpracun,0,"gametime");
$rating = mysql_result($mvpracun,0,"rating");
} else {
$mvpracun = mysql_query("SELECT player, team, country, gametime, (scoring - two_total + two_scored - one_total + one_scored - three_total + three_scored + def_rebounds + off_rebounds + blocks + assists + steals - turnovers) AS rating FROM totalstats WHERE (scoring - two_total + two_scored - one_total + one_scored - three_total + three_scored + def_rebounds + off_rebounds + blocks + assists + steals - turnovers) < 100000 AND gametime >39 AND season=$suzona AND league=$liga ORDER BY (scoring - two_total + two_scored - one_total + one_scored - three_total + three_scored + def_rebounds + off_rebounds + blocks + assists + steals - turnovers) DESC") or die(mysql_error());
$player = mysql_result($mvpracun,0,"player");
$team = mysql_result($mvpracun,0,"team");
$country = mysql_result($mvpracun,0,"country");
$gametime = mysql_result($mvpracun,0,"gametime");
$rating = mysql_result($mvpracun,0,"rating");
}
$plus = mysql_query("SELECT name FROM teams WHERE teamid ='$team' LIMIT 1");
$plusime = mysql_result($plus,0);
mysql_query("INSERT INTO top_players VALUES ('', $player, $rating, $gametime, '$plusime', 1, $liga, 0, '$country', 0, $suzona, 0);") or die(mysql_error());
mysql_query("UPDATE teams SET curmoney = curmoney + 50000 WHERE teamid = $team") or die(mysql_error());
mysql_query("INSERT INTO events VALUES ('', $team, NOW(), 'Club have received 50.000 &euro; after one of the players was declared as league MVP of the season!', 0, 50000);") or die(mysql_error());
echo $liga," - <a href=\"../player.php?playerid=",$player,"\">",$player,"</a><br/>";
$k++;
}
die("gfdfddfdf");
*/

//THIRD WE UNCOMMENT THIS AND COUNTRY MVPS WILL BE ASSIGNED
/*
$izbor = mysql_query("SELECT DISTINCT country FROM teams");
$k=0;
while ($k < mysql_num_rows($izbor)) {
$drzava = mysql_result($izbor,$k);
$izbranec = mysql_query("SELECT id, player, top_players.league FROM top_players, leagues WHERE league = leagueid AND top_players.country = '$drzava' AND gametime >499 AND season =$suzona ORDER BY (strength/3.4 + rating)/gametime DESC LIMIT 1");
if (mysql_num_rows($izbranec)>0) {
$izbran = mysql_result($izbranec,0);
mysql_query("UPDATE top_players SET country_award = 1 WHERE id = $izbran AND season=$suzona");
}
$k++;
}
*/
?>