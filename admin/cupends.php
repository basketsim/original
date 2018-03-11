<?php
include_once("common.php");
//dodam mass msg čestitke?
OFF



//HERE YOU ADJUST FOR MORE/LESS THAN 300 TEAMS AND BY THIS 3 AND 4-5 LEVEL LEAGUES!
//CURRENTLY THE SCRIPT IS READY TO BE RUN FOR 4-5 LEVEL LEAGUES (>300)
$drava = mysql_query("SELECT DISTINCT country AS country FROM regions");
while ($mc = mysql_fetch_array($drava)) {
$countr = $mc[country];
$lik = mysql_query("SELECT teamid FROM teams WHERE cupstatus<>0 AND country = '$countr'");
$lik = mysql_num_rows($lik);
if ($lik > 300) {$drzava = $countr;
echo $drzava,"<br/>";

$pokalneekipe = mysql_query("SELECT teamid, name, cupstatus FROM teams WHERE country='$drzava' ORDER BY cupstatus DESC") or die(mysql_error());
$steviloekip = mysql_num_rows($pokalneekipe);
$zmagovalec=mysql_result($pokalneekipe,0,"cupstatus");
$porazenec=mysql_result($pokalneekipe,1,"cupstatus");
if ($zmagovalec==$porazenec) {die("Cup not finished yet!");}

//cup mvps
$drav = mysql_query("SELECT player, team, sum( 2 * `two_scored` + `one_scored` +3 * `three_scored` + `def_rebounds` + `off_rebounds` + `assists` + `steals` + `blocks` - `turnovers` - `two_total` + `two_scored` - `three_total` + `three_scored` - `one_total` + `one_scored` ) AS rating FROM `statistics` , matches WHERE `match` = matchid AND ( 2 * `two_scored` + `one_scored` +3 * `three_scored` + `def_rebounds` + `off_rebounds` + `assists` + `steals` + `blocks` - `turnovers` - `two_total` + `two_scored` - `three_total` + `three_scored` - `one_total` + `one_scored` ) <10000 AND matches.season =$suzona AND matches.type =3 AND matches.country = '$countr' GROUP BY player ORDER BY `rating` DESC, (2 * `two_scored` + `one_scored` +3 * `three_scored`) DESC LIMIT 1") or die(mysql_error());
while ($aba=mysql_fetch_array($drav)) {
$playerID=0;
$playerID=$aba['player'];
$teamC=$aba['team'];
$ratingC=$aba['rating'];
if (is_numeric($playerID) AND $playerID >0 AND $ratingC > 0) {
$dodq = mysql_query("SELECT `name` FROM teams WHERE teamid=$teamC LIMIT 1") or die(mysql_error());
$imee = @mysql_result($dodq,0,'name');
$imee = addslashes($imee);
mysql_query("INSERT INTO top_players VALUES ('', $playerID, $ratingC, 0, '$imee', 0, 0, 0, '$countr', 0, $suzona, 3);") or die(mysql_error());
echo $countr,": ",$playerID," (",$imee,") - ",$ratingC,"<br/>";
}
}

$i=0;
while ($i < $steviloekip) {
$teamid=mysql_result($pokalneekipe,$i,"teamid");
$name=mysql_result($pokalneekipe,$i,"name");
$cupstatus=mysql_result($pokalneekipe,$i,"cupstatus");

$usercek = mysql_query("SELECT userid FROM users WHERE club=$teamid");
if (mysql_num_rows($usercek) > 0) {$userjev_id = mysql_result($usercek,0);} else {$userjev_id=0;}

mysql_query("INSERT INTO history VALUES ('', $userjev_id, $teamid, '$name', 3, $cupstatus, 0, $suzona, '$drzava', 0, '', 0);");

SWITCH (TRUE) {
CASE ($cupstatus==$zmagovalec):
if ($userjev_id > 0) {mysql_query("UPDATE users SET friendly =0 WHERE userid=$userjev_id LIMIT 1");}
mysql_query("UPDATE history SET won=1 WHERE h_type=3 AND h_teamid=$teamid AND h_season=$suzona LIMIT 1") or die("Ne zapise zmagovalca");
mysql_query("UPDATE teams SET curmoney = curmoney + 1600000 WHERE teamid=$teamid") or die("Ne daje denarja");
mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'After a superb cup achievement club was awarded 1.600.000 &euro;.', 1, 1600000);");
break;
CASE ($cupstatus==$zmagovalec-1):
mysql_query("UPDATE teams SET curmoney = curmoney + 1200000 WHERE teamid=$teamid") or die("Ne daje denarja");
mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'After a superb cup achievement club was awarded 1.200.000 &euro;.', 1, 1200000);");
break;
CASE ($cupstatus==$zmagovalec-2):
mysql_query("UPDATE teams SET curmoney = curmoney + 900000 WHERE teamid=$teamid") or die("Ne daje denarja");
mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'After a superb cup achievement club was awarded 900.000 &euro;.', 1, 900000);");
break;
CASE ($cupstatus==$zmagovalec-3):
mysql_query("UPDATE teams SET curmoney = curmoney + 600000 WHERE teamid=$teamid") or die("Ne daje denarja");
mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'After a great cup achievement club was awarded 600.000 &euro;.', 1, 600000);");
break;
CASE ($cupstatus==$zmagovalec-4):
mysql_query("UPDATE teams SET curmoney = curmoney + 400000 WHERE teamid=$teamid") or die("Ne daje denarja");
mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'After a great cup achievement club was awarded 400.000 &euro;.', 1, 400000);");
break;
CASE ($cupstatus==$zmagovalec-5):
mysql_query("UPDATE teams SET curmoney = curmoney + 200000 WHERE teamid=$teamid") or die("Ne daje denarja");
mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'After a great cup achievement club was awarded 200.000 &euro;.', 1, 200000);");
break;
CASE ($cupstatus==$zmagovalec-6):
mysql_query("UPDATE teams SET curmoney = curmoney + 100000 WHERE teamid=$teamid") or die("Ne daje denarja");
mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'After a good cup achievement club was awarded 100.000 &euro;.', 1, 100000);");
break;
CASE ($cupstatus==$zmagovalec-7):
mysql_query("UPDATE teams SET curmoney = curmoney + 50000 WHERE teamid=$teamid") or die("Ne daje denarja");
mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'After a decent cup achievement club was awarded 50.000 &euro;.', 1, 50000);");
break;
}
$i++;
}

}
}
?>
