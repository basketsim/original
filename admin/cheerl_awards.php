<?php
//remove "off" text below to make the script working and then run after last friday in a season
off

ini_set("max_execution_time",2000);
include_once("common.php");
$izbor = mysql_query("SELECT DISTINCT country FROM teams") or die(mysql_error());
$k=0;
while ($k < mysql_num_rows($izbor)) {

$drzavnika = mysql_result($izbor,$k);

$advorder = mysql_query("SELECT arena.teamid AS teamid FROM arena, teams WHERE arena.teamid = teams.teamid AND teams.status=1 AND country='$drzavnika' AND cheer_logo<>'' AND cheer_logo<>'http://' AND cheer_season<>0 AND arena.season_ideal > 0 ORDER BY 100-((abs(cheer_season-season_ideal))*100/(season_ideal+0.01)) DESC LIMIT 20") or die(mysql_error());
$num=mysql_num_rows($advorder);
$i=0;
while ($i < $num) {
$teamid=mysql_result($advorder,$i,"teamid");

SWITCH ($i) {
CASE 0: mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'Club have received prize money of 100.000 &euro; after cheerleaders were crowned as the best in the country.', 1, 100000);") or die(mysql_error()); mysql_query("UPDATE teams SET curmoney=curmoney+100000 WHERE teamid=$teamid LIMIT 1") or die(mysql_error()); break;
CASE 1: mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'Club have received prize money of 90.000 &euro; after cheerleaders ended the season as the 2nd best in the country.', 1, 90000);") or die(mysql_error()); mysql_query("UPDATE teams SET curmoney=curmoney+90000 WHERE teamid=$teamid LIMIT 1") or die(mysql_error()); break;
CASE 2: mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'Club have received prize money of 85.000 &euro; after cheerleaders ended the season as the 3rd best in the country.', 1, 85000);") or die(mysql_error()); mysql_query("UPDATE teams SET curmoney=curmoney+85000 WHERE teamid=$teamid LIMIT 1") or die(mysql_error()); break;
CASE 3: mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'Club have received prize money of 80.000 &euro; after cheerleaders ended the season as the 4th best in the country.', 1, 80000);") or die(mysql_error()); mysql_query("UPDATE teams SET curmoney=curmoney+80000 WHERE teamid=$teamid LIMIT 1") or die(mysql_error()); break;
CASE 4: mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'Club have received prize money of 75.000 &euro; after cheerleaders ended the season as the 5th best in the country.', 1, 75000);") or die(mysql_error()); mysql_query("UPDATE teams SET curmoney=curmoney+75000 WHERE teamid=$teamid LIMIT 1") or die(mysql_error()); break;
CASE 5: mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'Club have received prize money of 70.000 &euro; after cheerleaders ended the season as the 6th best in the country.', 1, 70000);") or die(mysql_error()); mysql_query("UPDATE teams SET curmoney=curmoney+70000 WHERE teamid=$teamid LIMIT 1") or die(mysql_error()); break;
CASE 6: mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'Club have received prize money of 65.000 &euro; after cheerleaders ended the season as the 7th best in the country.', 1, 65000);") or die(mysql_error()); mysql_query("UPDATE teams SET curmoney=curmoney+65000 WHERE teamid=$teamid LIMIT 1") or die(mysql_error()); break;
CASE 7: mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'Club have received prize money of 60.000 &euro; after cheerleaders ended the season as the 8th best in the country.', 1, 60000);") or die(mysql_error()); mysql_query("UPDATE teams SET curmoney=curmoney+60000 WHERE teamid=$teamid LIMIT 1") or die(mysql_error()); break;
CASE 8: mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'Club have received prize money of 55.000 &euro; after cheerleaders ended the season as the 9th best in the country.', 1, 55000);") or die(mysql_error()); mysql_query("UPDATE teams SET curmoney=curmoney+55000 WHERE teamid=$teamid LIMIT 1") or die(mysql_error()); break;
CASE 9: mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'Club have received prize money of 50.000 &euro; after cheerleaders ended the season as the 10th best in the country.', 1, 50000);") or die(mysql_error()); mysql_query("UPDATE teams SET curmoney=curmoney+50000 WHERE teamid=$teamid LIMIT 1") or die(mysql_error()); break;
CASE 10: mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'Club have received prize money of 45.000 &euro; after cheerleaders ended the season as the 11th best in the country.', 1, 45000);") or die(mysql_error()); mysql_query("UPDATE teams SET curmoney=curmoney+45000 WHERE teamid=$teamid LIMIT 1") or die(mysql_error()); break;
CASE 11: mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'Club have received prize money of 40.000 &euro; after cheerleaders ended the season as the 12th best in the country.', 1, 40000);") or die(mysql_error()); mysql_query("UPDATE teams SET curmoney=curmoney+40000 WHERE teamid=$teamid LIMIT 1") or die(mysql_error()); break;
CASE 12: mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'Club have received prize money of 35.000 &euro; after cheerleaders ended the season as the 13th best in the country.', 1, 35000);") or die(mysql_error()); mysql_query("UPDATE teams SET curmoney=curmoney+35000 WHERE teamid=$teamid LIMIT 1") or die(mysql_error()); break;
CASE 13: mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'Club have received prize money of 30.000 &euro; after cheerleaders ended the season as the 14th best in the country.', 1, 30000);") or die(mysql_error()); mysql_query("UPDATE teams SET curmoney=curmoney+30000 WHERE teamid=$teamid LIMIT 1") or die(mysql_error()); break;
CASE 14: mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'Club have received prize money of 27.000 &euro; after cheerleaders ended the season as the 15th best in the country.', 1, 27000);") or die(mysql_error()); mysql_query("UPDATE teams SET curmoney=curmoney+27000 WHERE teamid=$teamid LIMIT 1") or die(mysql_error()); break;
CASE 15: mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'Club have received prize money of 24.000 &euro; after cheerleaders ended the season as the 16th best in the country.', 1, 24000);") or die(mysql_error()); mysql_query("UPDATE teams SET curmoney=curmoney+24000 WHERE teamid=$teamid LIMIT 1") or die(mysql_error()); break;
CASE 16: mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'Club have received prize money of 21.000 &euro; after cheerleaders ended the season as the 17th best in the country.', 1, 21000);") or die(mysql_error()); mysql_query("UPDATE teams SET curmoney=curmoney+21000 WHERE teamid=$teamid LIMIT 1") or die(mysql_error()); break;
CASE 17: mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'Club have received prize money of 18.000 &euro; after cheerleaders ended the season as the 18th best in the country.', 1, 18000);") or die(mysql_error()); mysql_query("UPDATE teams SET curmoney=curmoney+18000 WHERE teamid=$teamid LIMIT 1") or die(mysql_error()); break;
CASE 18: mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'Club have received prize money of 16.000 &euro; after cheerleaders ended the season as the 19th best in the country.', 1, 16000);") or die(mysql_error()); mysql_query("UPDATE teams SET curmoney=curmoney+16000 WHERE teamid=$teamid LIMIT 1") or die(mysql_error()); break;
CASE 19: mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'Club have received prize money of 15.000 &euro; after cheerleaders ended the season as the 20th best in the country.', 1, 15000);") or die(mysql_error()); mysql_query("UPDATE teams SET curmoney=curmoney+15000 WHERE teamid=$teamid LIMIT 1") or die(mysql_error()); break;
}
echo $teamid,"<br/>";

$i++;
}

$k++;
}

echo "Set up new cron.";
?>