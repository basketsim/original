<?php
//for friendlies that were arranged in last week of previous season I adjust season in matches table to the new one
//remove die() from aftermath1

ini_set("max_execution_time",4000);
include_once("common.php");
mysql_query("TRUNCATE TABLE `friendly_dates`");
mysql_query("UPDATE users SET friendly=1") or die(mysql_error());
mysql_query("UPDATE teams SET cupstatus=0") or die(mysql_error());
$query1=mysql_query("SELECT DISTINCT `country` FROM `regions`") or die(mysql_error());
while ($a=mysql_fetch_array($query1)) {
$drzava = $a['country'];
$query2 = mysql_query("SELECT teamid FROM `teams` WHERE status=1 AND `country`='$drzava' ORDER BY teamid ASC LIMIT 1") or die(mysql_error());
//$query2 = mysql_query("SELECT teamid FROM `teams` WHERE `country`='$drzava' ORDER BY teamid ASC LIMIT 1") or die(mysql_error());
while ($b=mysql_fetch_array($query2)) {
$ekipa = $b['teamid'];
$query3 = mysql_query("SELECT `time` FROM `matches` WHERE `home_id`=$ekipa AND type=1 AND season=$suzona UNION SELECT `time` FROM `matches` WHERE `away_id`=$ekipa AND type=1 AND season =$suzona ORDER BY `time` ASC LIMIT 15,1") or die(mysql_error());
$endatum = mysql_result($query3,0,"time");
$tdatetime = explode(" ",$endatum); $ffdate = $tdatetime[0]; $fftime = $tdatetime[1];
$tdate = explode("-", $ffdate); $ffyear = $tdate[0]; $ffmonth = $tdate[1]; $ffday = $tdate[2];
$ttime = explode(":", $fftime); $ffhour = $ttime[0]; $ffmin = $ttime[1]; $ffsec = $ttime[2];
$cas1 = date("Y-m-d H:i:s", mktime($ffhour,$ffmin,$ffsec,$ffmonth,$ffday+7,$ffyear));
$cas2 = date("Y-m-d H:i:s", mktime($ffhour,$ffmin,$ffsec,$ffmonth,$ffday+14,$ffyear));
$cas3 = date("Y-m-d H:i:s", mktime($ffhour,$ffmin,$ffsec,$ffmonth,$ffday+21,$ffyear));
$cas4 = date("Y-m-d H:i:s", mktime($ffhour,$ffmin,$ffsec,$ffmonth,$ffday+28,$ffyear));
$cas5 = date("Y-m-d H:i:s", mktime($ffhour,$ffmin,$ffsec,$ffmonth,$ffday+35,$ffyear));
$cas6 = date("Y-m-d H:i:s", mktime($ffhour,$ffmin,$ffsec,$ffmonth,$ffday+42,$ffyear));
$cas7 = date("Y-m-d H:i:s", mktime($ffhour,$ffmin,$ffsec,$ffmonth,$ffday+49,$ffyear));
$cas8 = date("Y-m-d H:i:s", mktime($ffhour,$ffmin,$ffsec,$ffmonth,$ffday+56,$ffyear));
$cas9 = date("Y-m-d H:i:s", mktime($ffhour,$ffmin,$ffsec,$ffmonth,$ffday+63,$ffyear));
$cas10 = date("Y-m-d H:i:s", mktime($ffhour,$ffmin,$ffsec,$ffmonth,$ffday+70,$ffyear));
$cas11 = date("Y-m-d H:i:s", mktime($ffhour,$ffmin,$ffsec,$ffmonth,$ffday+77,$ffyear));

mysql_query("INSERT INTO friendly_dates VALUES ('', '$drzava', '$cas1');") or die(mysql_error());
mysql_query("INSERT INTO friendly_dates VALUES ('', '$drzava', '$cas2');") or die(mysql_error());
mysql_query("INSERT INTO friendly_dates VALUES ('', '$drzava', '$cas3');") or die(mysql_error());
mysql_query("INSERT INTO friendly_dates VALUES ('', '$drzava', '$cas4');") or die(mysql_error());
mysql_query("INSERT INTO friendly_dates VALUES ('', '$drzava', '$cas5');") or die(mysql_error());
mysql_query("INSERT INTO friendly_dates VALUES ('', '$drzava', '$cas6');") or die(mysql_error());
mysql_query("INSERT INTO friendly_dates VALUES ('', '$drzava', '$cas7');") or die(mysql_error());
mysql_query("INSERT INTO friendly_dates VALUES ('', '$drzava', '$cas8');") or die(mysql_error());
mysql_query("INSERT INTO friendly_dates VALUES ('', '$drzava', '$cas9');") or die(mysql_error());
mysql_query("INSERT INTO friendly_dates VALUES ('', '$drzava', '$cas10');") or die(mysql_error());
mysql_query("INSERT INTO friendly_dates VALUES ('', '$drzava', '$cas11');") or die(mysql_error());
}
$query4=mysql_query("SELECT level FROM leagues WHERE active=1 AND country ='$drzava' ORDER BY `level` DESC LIMIT 1") or die(mysql_error());
$nivo = mysql_result($query4,0,"level");
$query5 = mysql_query("SELECT `date` FROM `friendly_dates` WHERE `country` LIKE '$drzava' ORDER BY `date` ASC LIMIT 1") or die(mysql_error());
$day = mysql_result($query5,0,"date");
if ($nivo<5) {
$ekipezapokal = mysql_query("SELECT competition.teamid AS teamid FROM competition, leagues, teams WHERE competition.leagueid = leagues.leagueid AND competition.teamid = teams.teamid AND season='$suzona' AND leagues.country LIKE '$drzava' ORDER BY `status` desc, RAND()") or die(mysql_error());
if ($nivo==3) {$predkrog = 108;} elseif ($nivo==4) {$predkrog = 96;}
$i=0;
while ($i < $predkrog) {
$teamid=mysql_result($ekipezapokal,$i);
$array_teamid[$i] = $teamid;
$i++;
}
$k=0; $n=0; $m=$predkrog-1;
while ($k < $predkrog/2) {
$aquery = mysql_query("SELECT arenaid FROM arena WHERE teamid=$array_teamid[$m]") or die(mysql_error());
$arenaidcup = mysql_result($aquery,0);
$result = mysql_query("INSERT INTO matches VALUES ('', $array_teamid[$m], '', $array_teamid[$n], '', $arenaidcup, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day', 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$drzava', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, $suzona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)") or die(mysql_error()) or die(mysql_error());
mysql_query("UPDATE teams SET cupstatus=1 WHERE teamid=$array_teamid[$n]") or die(mysql_error());
mysql_query("UPDATE teams SET cupstatus=1 WHERE teamid=$array_teamid[$m]") or die(mysql_error());
$n=$n+1;
$m=$m-1;
$k++;
}
}
else {
$sezs=$suzona-1;
$nim = mysql_query("SELECT teams.teamid AS tid FROM teams, competition, leagues WHERE teams.teamid = competition.teamid AND competition.leagueid = leagues.leagueid AND competition.season =$sezs AND leagues.country = '$drzava' ORDER BY teams.status ASC, leagues.level ASC, position ASC, win DESC, difference DESC, for_ DESC LIMIT 1024") or die(mysql_error());
$n=0;
while ($n < mysql_num_rows($nim)) {
$ek = mysql_result($nim,$n,"tid");
mysql_query("UPDATE teams SET cupstatus=1 WHERE teamid=$ek LIMIT 1");
$n++;
}
$ekipezapokal = mysql_query("SELECT teamid FROM teams WHERE country='$drzava' AND cupstatus=1 ORDER BY `status` ASC, RAND()") or die(mysql_error());
$i=0;
while ($i < 1024) {
$teamid=mysql_result($ekipezapokal,$i);
$array_teamid[$i] = $teamid;
$i++;
}
$k=0; $n=0; $m=1023;
while ($k < 512) {
$aquery = mysql_query("SELECT arenaid FROM arena WHERE teamid=$array_teamid[$n]") or die(mysql_error());
$arenaidcup = mysql_result($aquery,0);
$result = mysql_query("INSERT INTO matches VALUES ('', $array_teamid[$n], '', $array_teamid[$m], '', $arenaidcup, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day', 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$drzava', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, $suzona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)") or die(mysql_error());
$n=$n+1;
$m=$m-1;
$k++;
}
}
}
mysql_query("UPDATE users, teams SET friendly=0 WHERE teamid=club AND cupstatus=0") or die(mysql_error());
$pizb = mysql_query("SELECT userid FROM teams, users WHERE cupstatus=1 AND teamid=club");
while ($p = mysql_fetch_array($pizb)) {
$useri = $p['userid'];
mysql_query("DELETE FROM friendly WHERE received_user=$useri");
}
?>