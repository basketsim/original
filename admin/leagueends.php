<?php

//AT THE END OF THE SEASON BEFORE NEW SEASON SCRIPT - just a simple run, that's it

ini_set("max_execution_time", 3000);
include_once("common.php");

OFF

//script can be a bit slow, no worries there

$izbor = mysql_query("SELECT DISTINCT country FROM teams");
$k=0;
while ($k < mysql_num_rows($izbor)) {
$drzava = mysql_result($izbor,$k);
$ligaekipe = mysql_query("SELECT competition.teamid AS ekipa, competition.curname AS ime, competition.position AS uvrstitev FROM competition, teams WHERE competition.teamid = teams.teamid AND competition.season ='$suzona' AND teams.country='$drzava'") or die(mysql_error());
$stevilo = mysql_num_rows($ligaekipe);
$i=0;
while ($i < $stevilo) {
$ekipa=mysql_result($ligaekipe,$i,"ekipa");
$ime=mysql_result($ligaekipe,$i,"ime");
$ime=addslashes($ime);
$uvrstitev=mysql_result($ligaekipe,$i,"uvrstitev");
$usercek = mysql_query("SELECT userid FROM users WHERE club=$ekipa");
if (mysql_num_rows($usercek)) {$userjev_id = mysql_result($usercek,0);} else {$userjev_id=0;}

$zapislig = mysql_query("SELECT leagues.leagueid, leagues.name, leagues.level FROM leagues, competition WHERE leagues.leagueid = competition.leagueid AND competition.teamid = $ekipa AND competition.season=$suzona");
$krompir = mysql_result($zapislig,0,"leagues.leagueid");
$zelje = mysql_result($zapislig,0,"leagues.name");
$rizota = mysql_result($zapislig,0,"leagues.level");

if ($uvrstitev == 1) {mysql_query("INSERT INTO history VALUES ('', $userjev_id, $ekipa, '$ime', 1, $uvrstitev, 1, $suzona, '$drzava', $rizota, '$zelje', $krompir);");}
if ($uvrstitev > 1) {mysql_query("INSERT INTO history VALUES ('', $userjev_id, $ekipa, '$ime', 1, $uvrstitev, 0, $suzona, '$drzava', $rizota, '$zelje', $krompir);");}

if ($rizota==1) {
SWITCH ($uvrstitev) {
CASE 1: $price=1500000; mysql_query("UPDATE arena SET fans=fans+50 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a great season the club has offered a free membership for new fans and 50 decided to join.', 0, 0);"); break;
CASE 2: $price=1200000; mysql_query("UPDATE arena SET fans=fans+40 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a great season the club has offered a free membership for new fans and 40 decided to join.', 0, 0);"); break;
CASE 3: $price=900000; mysql_query("UPDATE arena SET fans=fans+30 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a great season the club has offered a free membership for new fans and 30 decided to join.', 0, 0);"); break;
CASE 4: $price=750000; mysql_query("UPDATE arena SET fans=fans+20 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a great season the club has offered a free membership for new fans and 20 decided to join.', 0, 0);"); break;
CASE 5: $price=600000; mysql_query("UPDATE arena SET fans=fans+10 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a great season the club has offered a free membership for new fans and 10 decided to join.', 0, 0);"); break;
CASE 6: $price=500000; break;
CASE 7: $price=450000; break;
CASE 8: $price=400000; break;
CASE 9: $price=100000; break;
CASE 10: $price=100000; break;
CASE 11: $price=100000; break;
CASE 12: $price=200000; mysql_query("UPDATE arena SET fans=fans-30 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a poor season 30 members left the fanclub.', 0, 0);"); break;
CASE 13: $price=200000; mysql_query("UPDATE arena SET fans=fans-40 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a poor season 40 members left the fanclub.', 0, 0);"); break;
CASE 14: $price=200000; mysql_query("UPDATE arena SET fans=fans-50 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a poor season 50 members left the fanclub.', 0, 0);"); break;
}
}
if ($rizota==2) {
SWITCH ($uvrstitev) {
CASE 1: $price=900000; mysql_query("UPDATE arena SET fans=fans+50 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a great season the club has offered a free membership for new fans and 50 decided to join.', 0, 0);"); break;
CASE 2: $price=550000; mysql_query("UPDATE arena SET fans=fans+40 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a great season the club has offered a free membership for new fans and 40 decided to join.', 0, 0);"); break;
CASE 3: $price=550000; mysql_query("UPDATE arena SET fans=fans+30 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a great season the club has offered a free membership for new fans and 30 decided to join.', 0, 0);"); break;
CASE 4: $price=500000; mysql_query("UPDATE arena SET fans=fans+20 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a great season the club has offered a free membership for new fans and 20 decided to join.', 0, 0);"); break;
CASE 5: $price=450000; mysql_query("UPDATE arena SET fans=fans+10 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a great season the club has offered a free membership for new fans and 10 decided to join.', 0, 0);"); break;
CASE 6: $price=400000; break;
CASE 7: $price=350000; break;
CASE 8: $price=300000; break;
CASE 9: $price=75000; break;
CASE 10: $price=75000; break;
CASE 11: $price=75000; break;
CASE 12: $price=100000; mysql_query("UPDATE arena SET fans=fans-30 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a poor season 30 members left the fanclub.', 0, 0);"); break;
CASE 13: $price=100000; mysql_query("UPDATE arena SET fans=fans-40 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a poor season 40 members left the fanclub.', 0, 0);"); break;
CASE 14: $price=100000; mysql_query("UPDATE arena SET fans=fans-50 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a poor season 50 members left the fanclub.', 0, 0);"); break;
}
}
if ($rizota==3) {
SWITCH ($uvrstitev) {
CASE 1: $price=800000; mysql_query("UPDATE arena SET fans=fans+50 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a great season the club has offered a free membership for new fans and 50 decided to join.', 0, 0);"); break;
CASE 2: $price=450000; mysql_query("UPDATE arena SET fans=fans+40 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a great season the club has offered a free membership for new fans and 40 decided to join.', 0, 0);"); break;
CASE 3: $price=450000; mysql_query("UPDATE arena SET fans=fans+30 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a great season the club has offered a free membership for new fans and 30 decided to join.', 0, 0);"); break;
CASE 4: $price=410000; mysql_query("UPDATE arena SET fans=fans+20 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a great season the club has offered a free membership for new fans and 20 decided to join.', 0, 0);"); break;
CASE 5: $price=370000; mysql_query("UPDATE arena SET fans=fans+10 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a great season the club has offered a free membership for new fans and 10 decided to join.', 0, 0);"); break;
CASE 6: $price=330000; break;
CASE 7: $price=290000; break;
CASE 8: $price=250000; break;
CASE 9: $price=120000; break;
CASE 10: $price=120000; break;
CASE 11: $price=120000; break;
CASE 12: $price=120000; mysql_query("UPDATE arena SET fans=fans-30 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a poor season 30 members left the fanclub.', 0, 0);"); break;
CASE 13: $price=120000; mysql_query("UPDATE arena SET fans=fans-40 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a poor season 40 members left the fanclub.', 0, 0);"); break;
CASE 14: $price=120000; mysql_query("UPDATE arena SET fans=fans-50 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a poor season 50 members left the fanclub.', 0, 0);"); break;
}
}
if ($rizota==4) {
SWITCH ($uvrstitev) {
CASE 1: $price=700000; mysql_query("UPDATE arena SET fans=fans+50 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a great season the club has offered a free membership for new fans and 50 decided to join.', 0, 0);"); break;
CASE 2: $price=350000; mysql_query("UPDATE arena SET fans=fans+40 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a great season the club has offered a free membership for new fans and 40 decided to join.', 0, 0);"); break;
CASE 3: $price=350000; mysql_query("UPDATE arena SET fans=fans+30 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a great season the club has offered a free membership for new fans and 30 decided to join.', 0, 0);"); break;
CASE 4: $price=320000; mysql_query("UPDATE arena SET fans=fans+20 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a great season the club has offered a free membership for new fans and 20 decided to join.', 0, 0);"); break;
CASE 5: $price=290000; mysql_query("UPDATE arena SET fans=fans+10 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a great season the club has offered a free membership for new fans and 10 decided to join.', 0, 0);"); break;
CASE 6: $price=260000; break;
CASE 7: $price=230000; break;
CASE 8: $price=200000; break;
CASE 9: $price=100000; break;
CASE 10: $price=100000; break;
CASE 11: $price=100000; break;
CASE 12: $price=100000; mysql_query("UPDATE arena SET fans=fans-30 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a poor season 30 members left the fanclub.', 0, 0);"); break;
CASE 13: $price=100000; mysql_query("UPDATE arena SET fans=fans-40 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a poor season 40 members left the fanclub.', 0, 0);"); break;
CASE 14: $price=100000; mysql_query("UPDATE arena SET fans=fans-50 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a poor season 50 members left the fanclub.', 0, 0);"); break;
}
}
if ($rizota==5) {
SWITCH ($uvrstitev) {
CASE 1: $price=600000; mysql_query("UPDATE arena SET fans=fans+50 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a great season the club has offered a free membership for new fans and 50 decided to join.', 0, 0);"); break;
CASE 2: $price=300000; mysql_query("UPDATE arena SET fans=fans+40 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a great season the club has offered a free membership for new fans and 40 decided to join.', 0, 0);"); break;
CASE 3: $price=300000; mysql_query("UPDATE arena SET fans=fans+30 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a great season the club has offered a free membership for new fans and 30 decided to join.', 0, 0);"); break;
CASE 4: $price=260000; mysql_query("UPDATE arena SET fans=fans+20 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a great season the club has offered a free membership for new fans and 20 decided to join.', 0, 0);"); break;
CASE 5: $price=220000; mysql_query("UPDATE arena SET fans=fans+10 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a great season the club has offered a free membership for new fans and 10 decided to join.', 0, 0);"); break;
CASE 6: $price=180000; break;
CASE 7: $price=140000; break;
CASE 8: $price=100000; break;
CASE 9: $price=75000; break;
CASE 10: $price=75000; break;
CASE 11: $price=75000; break;
CASE 12: $price=50000; mysql_query("UPDATE arena SET fans=fans-30 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a poor season 30 members left the fanclub.', 0, 0);"); break;
CASE 13: $price=50000; mysql_query("UPDATE arena SET fans=fans-40 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a poor season 40 members left the fanclub.', 0, 0);"); break;
CASE 14: $price=50000; mysql_query("UPDATE arena SET fans=fans-50 WHERE teamid=$ekipa LIMIT 1"); mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'After a poor season 50 members left the fanclub.', 0, 0);"); break;
}
}
$pricedspl = number_format($price, 0, ',', '.');
mysql_query("UPDATE teams SET curmoney=curmoney+$price WHERE teamid=$ekipa") or die("Ne daje denarja 2");
mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'The club has been awarded with $pricedspl &euro; for a league achievement.', 1, $price);");
$i++;
}
$k++;
}

//navijači obnovijo membership
$navijac = mysql_query("SELECT teams.teamid AS idekipe, fans FROM teams,arena WHERE teams.teamid=arena.teamid AND status=1") or die(mysql_error());
while ($pp = mysql_fetch_array($navijac)) {
$idekipe = $pp['idekipe'];
$nofans = $pp['fans'];
$cena = $nofans * 40;
$cenadsp = number_format($cena, 0, ',', '.');
mysql_query("UPDATE teams SET curmoney=curmoney+$cena WHERE teamid=$idekipe") or die("Ne daje denarja 1");
mysql_query("INSERT INTO events VALUES ('', $idekipe, NOW(), 'The fans have extended annual memberships, giving the club $cenadsp &euro; in total.', 1, $cena);") or die(mysql_error());
}

mysql_query("UPDATE `arena` SET fans=150 WHERE fans <150") or die(mysql_error());
?>