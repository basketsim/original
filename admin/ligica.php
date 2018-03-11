<?php
$season=22;
$suzona=22;
include("cron2conect.php");
ini_set("max_execution_time", 30000);

$rob = mysql_query("SELECT * FROM `statistics` WHERE season=$season and `type`=1 AND `added_on`<>'0000-00-00 00:00:00'") or die(mysql_error());
while ($p = mysql_fetch_array($rob)) {
$statid=$p['statid'];
$player=$p['player'];
$team=$p['team'];
$type=$p['type'];
$league=$p['league'];
$country=$p['country'];
$gametime=$p['gametime'];
$two_scored=$p['two_scored'];
$two_total=$p['two_total'];
$one_scored=$p['one_scored'];
$one_total=$p['one_total'];
$three_scored=$p['three_scored'];
$three_total=$p['three_total'];
$def_rebounds=$p['def_rebounds'];
$off_rebounds=$p['off_rebounds'];
$blocks=$p['blocks'];
$assists=$p['assists'];
$steals=$p['steals'];
$fouls=$p['fouls'];
$turnovers=$p['turnovers'];
$scoring = $two_scored*2 + $three_scored*3 + $one_scored;
$zefin = mysql_query("SELECT tstatid FROM totalstats WHERE season=$season AND league=$league AND team=$team AND player=$player") or die(mysql_error());
$pravilno = mysql_num_rows($zefin);
SWITCH (TRUE) {
CASE ($pravilno<>1):
mysql_query("INSERT INTO totalstats VALUES ('', $player, $team, 1, $league, '$country', $season, $gametime, $scoring, $two_scored, $two_total, $one_scored, $one_total, $three_scored, $three_total, $def_rebounds, $off_rebounds, $blocks, $assists, $steals, $fouls, $turnovers);") or die(mysql_error());
mysql_query("UPDATE statistics SET added_on='0000-00-00 00:00:00' WHERE statid=$statid") or die(mysql_error());
break;
CASE ($pravilno==1):
$stevilka=mysql_result($zefin,0);
mysql_query("UPDATE totalstats SET played=played+1, gametime=gametime+$gametime, scoring=scoring+$scoring, two_scored=two_scored+$two_scored, two_total=two_total+$two_total, one_scored=one_scored+$one_scored, one_total=one_total+$one_total, three_scored=three_scored+$three_scored, three_total=three_total+$three_total, def_rebounds=def_rebounds+$def_rebounds, off_rebounds=off_rebounds+$off_rebounds, blocks=blocks+$blocks, assists=assists+$assists, steals=steals+$steals, fouls=fouls+$fouls, turnovers=turnovers+$turnovers WHERE tstatid=$stevilka") or die(mysql_error());
mysql_query("UPDATE statistics SET added_on='0000-00-00 00:00:00' WHERE statid=$statid") or die(mysql_error());
break;
}
}

//LEAGUE REPORTS - BEST TEAMS
$troday = date("l"); //<----------one line below only Monday when second part of the season, else OR Thursday!!!!!!!!!
if ($troday=='Monday') {
$izbor = mysql_query("SELECT distinct leagueid AS leagueid, played FROM `competition` WHERE `season`=$suzona") or die(mysql_error());
while ($k = mysql_fetch_array($izbor)) {
$leagueid = $k["leagueid"];
$runda = $k["played"];
$tajm=NULL; $jarod=NULL;
$grin = mysql_query("SELECT max(time) AS tajm FROM matches WHERE matches.season =$suzona AND type =1 AND lid_round =$leagueid AND crowd1 >0") or die(mysql_error());
$tajm = mysql_result($grin,0,"tajm") or die(mysql_error());
$qq1 = mysql_query("SELECT players.name AS pname, players.surname AS psur, teams.name AS nam, matchid, ( 2 * two_scored + one_scored + three_scored *3 ) + def_rebounds + off_rebounds + assists + steals + blocks - turnovers - ( two_total - two_scored ) - ( three_total - three_scored ) - ( one_total - one_scored ) AS rat FROM `matches`, statistics, players, teams WHERE matches.season =$suzona AND matches.type =1 AND lid_round =$leagueid AND ( 2 * two_scored + one_scored + three_scored *3 ) + def_rebounds + off_rebounds + assists + steals + blocks - turnovers - ( two_total - two_scored ) - ( three_total - three_scored ) - ( one_total - one_scored ) <6000 AND matchid = `match` AND statistics.player = players.id AND players.club=teams.teamid AND time = '$tajm' AND (player = home_pg1 OR player = home_pg2 OR player = away_pg1 OR player = away_pg2) ORDER BY ( 2 * two_scored + one_scored + three_scored *3 ) + def_rebounds + off_rebounds + assists + steals + blocks - turnovers - ( two_total - two_scored ) - ( three_total - three_scored ) - ( one_total - one_scored ) DESC, 2 * two_scored + one_scored + three_scored *3 desc LIMIT 1") or die(mysql_error());
$name=''; $surname=NULL; $nam=NULL; $rat=NULL; $mat=NULL;
$name = mysql_result($qq1,0,"pname");
$surname = mysql_result($qq1,0,"psur") or die(mysql_error());
$nam = mysql_result($qq1,0,"nam") or die(mysql_error());
$rat = mysql_result($qq1,0,"rat") or die(mysql_error());
$mat = mysql_result($qq1,0,"matchid") or die(mysql_error());
$jarod .= "[b]PG[/b] ".$name." ".$surname." (".$nam.") - [b]".$rat."[/b] [matchid=".$mat."]\n";
$qq2 = mysql_query("SELECT players.name AS pname, players.surname AS psur, teams.name AS nam, matchid, ( 2 * two_scored + one_scored + three_scored *3 ) + def_rebounds + off_rebounds + assists + steals + blocks - turnovers - ( two_total - two_scored ) - ( three_total - three_scored ) - ( one_total - one_scored ) AS rat FROM `matches`, statistics, players, teams WHERE matches.season =$suzona AND matches.type =1 AND lid_round =$leagueid AND ( 2 * two_scored + one_scored + three_scored *3 ) + def_rebounds + off_rebounds + assists + steals + blocks - turnovers - ( two_total - two_scored ) - ( three_total - three_scored ) - ( one_total - one_scored ) <6000 AND matchid = `match` AND statistics.player = players.id AND players.club=teams.teamid AND time = '$tajm' AND (player = home_sg1 OR player = home_sg2 OR player = away_sg1 OR player = away_sg2) ORDER BY ( 2 * two_scored + one_scored + three_scored *3 ) + def_rebounds + off_rebounds + assists + steals + blocks - turnovers - ( two_total - two_scored ) - ( three_total - three_scored ) - ( one_total - one_scored ) DESC, 2 * two_scored + one_scored + three_scored *3 desc LIMIT 1") or die(mysql_error());
$name=''; $surname=NULL; $nam=NULL; $rat=NULL; $mat=NULL;
$name = mysql_result($qq2,0,"pname");
$surname = mysql_result($qq2,0,"psur") or die(mysql_error());
$nam = mysql_result($qq2,0,"nam") or die(mysql_error());
$rat = mysql_result($qq2,0,"rat") or die(mysql_error());
$mat = mysql_result($qq2,0,"matchid") or die(mysql_error());
$jarod .= "[b]SG[/b] ".$name." ".$surname." (".$nam.") - [b]".$rat."[/b] [matchid=".$mat."]\n";
$qq3 = mysql_query("SELECT players.name AS pname, players.surname AS psur, teams.name AS nam, matchid, ( 2 * two_scored + one_scored + three_scored *3 ) + def_rebounds + off_rebounds + assists + steals + blocks - turnovers - ( two_total - two_scored ) - ( three_total - three_scored ) - ( one_total - one_scored ) AS rat FROM `matches`, statistics, players, teams WHERE matches.season =$suzona AND matches.type =1 AND lid_round =$leagueid AND ( 2 * two_scored + one_scored + three_scored *3 ) + def_rebounds + off_rebounds + assists + steals + blocks - turnovers - ( two_total - two_scored ) - ( three_total - three_scored ) - ( one_total - one_scored ) <6000 AND matchid = `match` AND statistics.player = players.id AND players.club=teams.teamid AND time = '$tajm' AND (player = home_sf1 OR player = home_sf2 OR player = away_sf1 OR player = away_sf2) ORDER BY ( 2 * two_scored + one_scored + three_scored *3 ) + def_rebounds + off_rebounds + assists + steals + blocks - turnovers - ( two_total - two_scored ) - ( three_total - three_scored ) - ( one_total - one_scored ) DESC, 2 * two_scored + one_scored + three_scored *3 desc LIMIT 1") or die(mysql_error());
$name=''; $surname=NULL; $nam=NULL; $rat=NULL; $mat=NULL;
$name = mysql_result($qq3,0,"pname");
$surname = mysql_result($qq3,0,"psur") or die(mysql_error());
$nam = mysql_result($qq3,0,"nam") or die(mysql_error());
$rat = mysql_result($qq3,0,"rat") or die(mysql_error());
$mat = mysql_result($qq3,0,"matchid") or die(mysql_error());
$jarod .= "[b]SF[/b] ".$name." ".$surname." (".$nam.") - [b]".$rat."[/b] [matchid=".$mat."]\n";
$qq4 = mysql_query("SELECT players.name AS pname, players.surname AS psur, teams.name AS nam, matchid, ( 2 * two_scored + one_scored + three_scored *3 ) + def_rebounds + off_rebounds + assists + steals + blocks - turnovers - ( two_total - two_scored ) - ( three_total - three_scored ) - ( one_total - one_scored ) AS rat FROM `matches`, statistics, players, teams WHERE matches.season =$suzona AND matches.type =1 AND lid_round =$leagueid AND ( 2 * two_scored + one_scored + three_scored *3 ) + def_rebounds + off_rebounds + assists + steals + blocks - turnovers - ( two_total - two_scored ) - ( three_total - three_scored ) - ( one_total - one_scored ) <6000 AND matchid = `match` AND statistics.player = players.id AND players.club=teams.teamid AND time = '$tajm' AND (player = home_pf1 OR player = home_pf2 OR player = away_pf1 OR player = away_pf2) ORDER BY ( 2 * two_scored + one_scored + three_scored *3 ) + def_rebounds + off_rebounds + assists + steals + blocks - turnovers - ( two_total - two_scored ) - ( three_total - three_scored ) - ( one_total - one_scored ) DESC, 2 * two_scored + one_scored + three_scored *3 desc LIMIT 1") or die(mysql_error());
$name=''; $surname=NULL; $nam=NULL; $rat=NULL; $mat=NULL;
$name = mysql_result($qq4,0,"pname");
$surname = mysql_result($qq4,0,"psur") or die(mysql_error());
$nam = mysql_result($qq4,0,"nam") or die(mysql_error());
$rat = mysql_result($qq4,0,"rat") or die(mysql_error());
$mat = mysql_result($qq4,0,"matchid") or die(mysql_error());
$jarod .= "[b]PF[/b] ".$name." ".$surname." (".$nam.") - [b]".$rat."[/b] [matchid=".$mat."]\n";
$qq5 = mysql_query("SELECT players.name AS pname, players.surname AS psur, teams.name AS nam, matchid, ( 2 * two_scored + one_scored + three_scored *3 ) + def_rebounds + off_rebounds + assists + steals + blocks - turnovers - ( two_total - two_scored ) - ( three_total - three_scored ) - ( one_total - one_scored ) AS rat FROM `matches`, statistics, players, teams WHERE matches.season =$suzona AND matches.type =1 AND lid_round =$leagueid AND ( 2 * two_scored + one_scored + three_scored *3 ) + def_rebounds + off_rebounds + assists + steals + blocks - turnovers - ( two_total - two_scored ) - ( three_total - three_scored ) - ( one_total - one_scored ) <6000 AND matchid = `match` AND statistics.player = players.id AND players.club=teams.teamid AND time = '$tajm' AND (player = home_c1 OR player = home_c2 OR player = away_c1 OR player = away_c2) ORDER BY ( 2 * two_scored + one_scored + three_scored *3 ) + def_rebounds + off_rebounds + assists + steals + blocks - turnovers - ( two_total - two_scored ) - ( three_total - three_scored ) - ( one_total - one_scored ) DESC, 2 * two_scored + one_scored + three_scored *3 desc LIMIT 1") or die(mysql_error());
$name=''; $surname=NULL; $nam=NULL; $rat=NULL; $mat=NULL;
$name = mysql_result($qq5,0,"pname");
$surname = mysql_result($qq5,0,"psur") or die(mysql_error());
$nam = mysql_result($qq5,0,"nam") or die(mysql_error());
$rat = mysql_result($qq5,0,"rat") or die(mysql_error());
$mat = mysql_result($qq5,0,"matchid") or die(mysql_error());
$jarod .= "[b]C[/b] ".$name." ".$surname." (".$nam.") - [b]".$rat."[/b] [matchid=".$mat."]\n";
$jarod = "Best team of round $runda (season $suzona):[br][br]".$jarod."[br]Congratulations!";
mysql_query("INSERT INTO lb_comments (`username`, `type`, `league`, `time`, `content`) VALUES ('Top team', 4, $leagueid, NOW(), '$jarod')") or die(mysql_error());
}
//update world rankings (powerrank)
$ggg=1;
$updPR = mysql_query("SELECT teamid, strength/2 * (6 - `level`) * (15 - position) /111 + 30 * win/( played+ 0.01) + ((difference/(played+0.01))+55)/5 +15 AS gacha FROM leagues, competition WHERE leagues.leagueid=competition.leagueid AND season=$season ORDER BY gacha DESC") or die("narobe1");
while ($uP = mysql_fetch_array($updPR)) {
$teamid = $uP[teamid];
mysql_query("UPDATE competition SET prank=$ggg WHERE season=$season AND teamid=$teamid LIMIT 1") or die("narobe2");
$ggg++;
}
}
?>