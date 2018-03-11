<?php
//BEFOREHAND OPTION TO DOWNSIZE LEAGUES (OR INCREASE)

ini_set("max_execution_time", 3500);
$sezona=22; $ssec = 0; $syear=2015; $smonth=3;
include_once("common.php");

$dara = mysql_query("SELECT * FROM dates");
while ($mn = mysql_fetch_array($dara)) {
$fixtures_country = $mn[country];
$date101 = $mn[date1];
$day101 = $mn[day1];
$date202 = $mn[date2];
$day202 = $mn[day2];
if ($day101==6) {$sday = 14;} elseif ($day101==7) {$sday = 15;} else {$sday = 16;} //TO NASLEDNJIČ EDITIRAM PRED ZAGONOM (prilagodim sday)
if ($day101==6 AND $day202==2) {$dodp=3;}
if ($day101==6 AND $day202==3) {$dodp=4;}
if ($day101==7 AND $day202==2) {$dodp=2;}
if ($day101==7 AND $day202==3) {$dodp=3;}
if ($day101==1 AND $day202==4) {$dodp=3;}
$ex1 = explode(":", $date101); $league_hour = $ex1[0]; $smin = $ex1[1];
$ex2 = explode(":", $date202); $cup_hour = $ex2[0]; $cmin = $ex2[1];
$day1 = date("Y-m-d H:i:s", mktime($league_hour,$smin,$ssec,$smonth,$sday,$syear));
$day2 = date("Y-m-d H:i:s", mktime($cup_hour,$cmin,$ssec,$smonth,$sday+$dodp,$syear));
$day3 = date("Y-m-d H:i:s", mktime($league_hour,$smin,$ssec,$smonth,$sday+7,$syear));
$day4 = date("Y-m-d H:i:s", mktime($cup_hour,$cmin,$ssec,$smonth,$sday+7+$dodp,$syear));
$day5 = date("Y-m-d H:i:s", mktime($league_hour,$smin,$ssec,$smonth,$sday+14,$syear));
$day6 = date("Y-m-d H:i:s", mktime($cup_hour,$cmin,$ssec,$smonth,$sday+14+$dodp,$syear));
$day7 = date("Y-m-d H:i:s", mktime($league_hour,$smin,$ssec,$smonth,$sday+21,$syear));
$day8 = date("Y-m-d H:i:s", mktime($cup_hour,$cmin,$ssec,$smonth,$sday+21+$dodp,$syear));
$day9 = date("Y-m-d H:i:s", mktime($league_hour,$smin,$ssec,$smonth,$sday+28,$syear));
$day10 = date("Y-m-d H:i:s", mktime($cup_hour,$cmin,$ssec,$smonth,$sday+28+$dodp,$syear));
$day11 = date("Y-m-d H:i:s", mktime($league_hour,$smin,$ssec,$smonth,$sday+35,$syear));
$day12 = date("Y-m-d H:i:s", mktime($cup_hour,$cmin,$ssec,$smonth,$sday+35+$dodp,$syear));
$day13 = date("Y-m-d H:i:s", mktime($league_hour,$smin,$ssec,$smonth,$sday+42,$syear));
$day14 = date("Y-m-d H:i:s", mktime($cup_hour,$cmin,$ssec,$smonth,$sday+42+$dodp,$syear));
$day15 = date("Y-m-d H:i:s", mktime($league_hour,$smin,$ssec,$smonth,$sday+49,$syear));
$day16 = date("Y-m-d H:i:s", mktime($cup_hour,$cmin,$ssec,$smonth,$sday+49+$dodp,$syear));
$day17 = date("Y-m-d H:i:s", mktime($league_hour,$smin,$ssec,$smonth,$sday+56,$syear));
$day18 = date("Y-m-d H:i:s", mktime($league_hour,$smin,$ssec,$smonth,$sday+63,$syear));
$day19 = date("Y-m-d H:i:s", mktime($league_hour,$smin,$ssec,$smonth,$sday+70,$syear));
$day20 = date("Y-m-d H:i:s", mktime($league_hour,$smin,$ssec,$smonth,$sday+77,$syear));
$day21 = date("Y-m-d H:i:s", mktime($league_hour,$smin,$ssec,$smonth,$sday+84,$syear));
$day22 = date("Y-m-d H:i:s", mktime($league_hour,$smin,$ssec,$smonth,$sday+91,$syear));
$day23 = date("Y-m-d H:i:s", mktime($league_hour,$smin,$ssec,$smonth,$sday+98,$syear));
$day24 = date("Y-m-d H:i:s", mktime($league_hour,$smin,$ssec,$smonth,$sday+105,$syear));
$day25 = date("Y-m-d H:i:s", mktime($league_hour,$smin,$ssec,$smonth,$sday+112,$syear));
$day26 = date("Y-m-d H:i:s", mktime($league_hour,$smin,$ssec,$smonth,$sday+119,$syear));

echo $fixtures_country," _._ ",$day1,"<br/>",$day2;
/*
die();
*/

//EKIPE V NEKI LIGI
/*
$widezanka = mysql_query("SELECT leagueid FROM leagues WHERE active=1 AND country='$fixtures_country' AND (`leagueid` =302 OR `leagueid` =296 OR `leagueid` =307 OR `leagueid` =299 OR `leagueid` =300 OR `leagueid` =318 OR `leagueid` =315 OR `leagueid` =297
OR `leagueid` =319 OR `leagueid` =304 OR `leagueid` =305 OR `leagueid` =309 OR `leagueid` =301 OR `leagueid` =317 OR `leagueid` =313 OR `leagueid` =295 OR `leagueid` =329 OR `leagueid` =566 OR `leagueid` =573 OR `leagueid` =570)");
*/
$widezanka = mysql_query("SELECT leagueid FROM leagues WHERE active=1 AND country='$fixtures_country'");
$widenum=mysql_num_rows($widezanka);
$k=0;
while ($k < $widenum) {
$leagueid=mysql_result($widezanka,$k);

//notranja zanka
$result = mysql_query("SELECT teamid FROM competition WHERE leagueid=$leagueid AND season=$sezona") or die($leagueid);
$num=mysql_num_rows($result);
$i=0;
while ($i < $num) {
$teamid=mysql_result($result,$i);
//ekipe
$array_teamid[$i] = $teamid;
$i++;
}

//ARENE
$aquery0 = mysql_query("SELECT arenaid FROM arena WHERE teamid=$array_teamid[0]") or die(mysql_error());
while ($arena0 = mysql_fetch_array($aquery0, MYSQL_ASSOC))
   {   foreach ($arena0 as $arenaid0)
   {$arenaid0; }     } ;
$aquery1 = mysql_query("SELECT arenaid FROM arena WHERE teamid=$array_teamid[1]") or die(mysql_error());
while ($arena1 = mysql_fetch_array($aquery1, MYSQL_ASSOC))
   {   foreach ($arena1 as $arenaid1)
   {$arenaid1; }     } ;
$aquery2 = mysql_query("SELECT arenaid FROM arena WHERE teamid=$array_teamid[2]") or die(mysql_error());
while ($arena2= mysql_fetch_array($aquery2, MYSQL_ASSOC))
   {   foreach ($arena2 as $arenaid2)
   {$arenaid2; }     } ;
$aquery3 = mysql_query("SELECT arenaid FROM arena WHERE teamid=$array_teamid[3]") or die(mysql_error());
while ($arena3 = mysql_fetch_array($aquery3, MYSQL_ASSOC))
   {   foreach ($arena3 as $arenaid3)
   {$arenaid3; }     } ;
$aquery4 = mysql_query("SELECT arenaid FROM arena WHERE teamid=$array_teamid[4]") or die(mysql_error());
while ($arena4 = mysql_fetch_array($aquery4, MYSQL_ASSOC))
   {   foreach ($arena4 as $arenaid4)
   {$arenaid4; }     } ;
$aquery5 = mysql_query("SELECT arenaid FROM arena WHERE teamid=$array_teamid[5]") or die(mysql_error());
while ($arena5 = mysql_fetch_array($aquery5, MYSQL_ASSOC))
   {   foreach ($arena5 as $arenaid5)
   {$arenaid5; }     } ;
$aquery6 = mysql_query("SELECT arenaid FROM arena WHERE teamid=$array_teamid[6]") or die(mysql_error());
while ($arena6 = mysql_fetch_array($aquery6, MYSQL_ASSOC))
   {   foreach ($arena6 as $arenaid6)
   {$arenaid6; }     } ;
$aquery7 = mysql_query("SELECT arenaid FROM arena WHERE teamid=$array_teamid[7]") or die(mysql_error());
while ($arena7 = mysql_fetch_array($aquery7, MYSQL_ASSOC))
   {   foreach ($arena7 as $arenaid7)
   {$arenaid7; }     } ;
$aquery8 = mysql_query("SELECT arenaid FROM arena WHERE teamid=$array_teamid[8]") or die(mysql_error());
while ($arena8 = mysql_fetch_array($aquery8, MYSQL_ASSOC))
   {   foreach ($arena8 as $arenaid8)
   {$arenaid8; }     } ;
$aquery9 = mysql_query("SELECT arenaid FROM arena WHERE teamid=$array_teamid[9]") or die(mysql_error());
while ($arena9 = mysql_fetch_array($aquery9, MYSQL_ASSOC))
   {   foreach ($arena9 as $arenaid9)
   {$arenaid9; }     } ;
$aquery10 = mysql_query("SELECT arenaid FROM arena WHERE teamid=$array_teamid[10]") or die(mysql_error());
while ($arena10 = mysql_fetch_array($aquery10, MYSQL_ASSOC))
   {   foreach ($arena10 as $arenaid10)
   {$arenaid10; }     } ;
$aquery11 = mysql_query("SELECT arenaid FROM arena WHERE teamid=$array_teamid[11]") or die(mysql_error());
while ($arena11 = mysql_fetch_array($aquery11, MYSQL_ASSOC))
   {   foreach ($arena11 as $arenaid11)
   {$arenaid11; }     } ;
$aquery12 = mysql_query("SELECT arenaid FROM arena WHERE teamid=$array_teamid[12]") or die(mysql_error());
while ($arena12 = mysql_fetch_array($aquery12, MYSQL_ASSOC))
   {   foreach ($arena12 as $arenaid12)
   {$arenaid12; }     } ;
$aquery13 = mysql_query("SELECT arenaid FROM arena WHERE teamid=$array_teamid[13]") or die(mysql_error());
while ($arena13 = mysql_fetch_array($aquery13, MYSQL_ASSOC))
   {   foreach ($arena13 as $arenaid13)
   {$arenaid13; }     } ;


//round 1

$r1m1 = "INSERT INTO matches VALUES ('', $array_teamid[2], '', $array_teamid[1], '', $arenaid2, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day1', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r1m1);

$r1m2 = "INSERT INTO matches VALUES ('', $array_teamid[0], '', $array_teamid[8], '', $arenaid0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day1', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r1m2);

$r1m3 = "INSERT INTO matches VALUES ('', $array_teamid[7], '', $array_teamid[6], '', $arenaid7, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day1', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r1m3);

$r1m4 = "INSERT INTO matches VALUES ('', $array_teamid[9], '', $array_teamid[3], '', $arenaid9, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day1', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r1m4);

$r1m5 = "INSERT INTO matches VALUES ('', $array_teamid[13], '', $array_teamid[5], '', $arenaid13, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day1', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r1m5);

$r1m6 = "INSERT INTO matches VALUES ('', $array_teamid[11], '', $array_teamid[4], '', $arenaid11, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day1', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r1m6);

$r1m7 = "INSERT INTO matches VALUES ('', $array_teamid[10], '', $array_teamid[12], '', $arenaid10, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day1', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r1m7);


//round 2

$r2m1 = "INSERT INTO matches VALUES ('', $array_teamid[13], '', $array_teamid[12], '', $arenaid13, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day2', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r2m1);

$r2m2 = "INSERT INTO matches VALUES ('', $array_teamid[6], '', $array_teamid[1], '', $arenaid6, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day2', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r2m2);

$r2m3 = "INSERT INTO matches VALUES ('', $array_teamid[5], '', $array_teamid[0], '', $arenaid5, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day2', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r2m3);

$r2m4 = "INSERT INTO matches VALUES ('', $array_teamid[2], '', $array_teamid[11], '', $arenaid2, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day2', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r2m4);

$r2m5 = "INSERT INTO matches VALUES ('', $array_teamid[7], '', $array_teamid[9], '', $arenaid7, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day2', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r2m5);

$r2m6 = "INSERT INTO matches VALUES ('', $array_teamid[3], '', $array_teamid[4], '', $arenaid3, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day2', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r2m6);

$r2m7 = "INSERT INTO matches VALUES ('', $array_teamid[8], '', $array_teamid[10], '', $arenaid8, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day2', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r2m7);


//round 3

$r3m1 = "INSERT INTO matches VALUES ('', $array_teamid[0], '', $array_teamid[3], '', $arenaid0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day3', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r3m1);

$r3m2 = "INSERT INTO matches VALUES ('', $array_teamid[4], '', $array_teamid[6], '', $arenaid4, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day3', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r3m2);

$r3m3 = "INSERT INTO matches VALUES ('', $array_teamid[10], '', $array_teamid[7], '', $arenaid10, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day3', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r3m3);

$r3m4 = "INSERT INTO matches VALUES ('', $array_teamid[12], '', $array_teamid[2], '', $arenaid12, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day3', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r3m4);

$r3m5 = "INSERT INTO matches VALUES ('', $array_teamid[11], '', $array_teamid[5], '', $arenaid11, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day3', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r3m5);

$r3m6 = "INSERT INTO matches VALUES ('', $array_teamid[1], '', $array_teamid[9], '', $arenaid1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day3', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r3m6);

$r3m7 = "INSERT INTO matches VALUES ('', $array_teamid[8], '', $array_teamid[13], '', $arenaid8, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day3', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r3m7);


//round 4

$r4m1 = "INSERT INTO matches VALUES ('', $array_teamid[6], '', $array_teamid[0], '', $arenaid6, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day4', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r4m1);

$r4m2 = "INSERT INTO matches VALUES ('', $array_teamid[1], '', $array_teamid[7], '', $arenaid1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day4', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r4m2);

$r4m3 = "INSERT INTO matches VALUES ('', $array_teamid[5], '', $array_teamid[4], '', $arenaid5, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day4', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r4m3);

$r4m4 = "INSERT INTO matches VALUES ('', $array_teamid[3], '', $array_teamid[8], '', $arenaid3, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day4', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r4m4);

$r4m5 = "INSERT INTO matches VALUES ('', $array_teamid[2], '', $array_teamid[13], '', $arenaid2, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day4', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r4m5);

$r4m6 = "INSERT INTO matches VALUES ('', $array_teamid[9], '', $array_teamid[10], '', $arenaid9, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day4', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r4m6);

$r4m7 = "INSERT INTO matches VALUES ('', $array_teamid[11], '', $array_teamid[12], '', $arenaid11, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day4', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r4m7);


//round 5

$r5m1 = "INSERT INTO matches VALUES ('', $array_teamid[7], '', $array_teamid[2], '', $arenaid7, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day5', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r5m1);

$r5m2 = "INSERT INTO matches VALUES ('', $array_teamid[12], '', $array_teamid[3], '', $arenaid12, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day5', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r5m2);

$r5m3 = "INSERT INTO matches VALUES ('', $array_teamid[0], '', $array_teamid[4], '', $arenaid0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day5', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r5m3);

$r5m4 = "INSERT INTO matches VALUES ('', $array_teamid[6], '', $array_teamid[11], '', $arenaid6, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day5', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r5m4);

$r5m5 = "INSERT INTO matches VALUES ('', $array_teamid[13], '', $array_teamid[9], '', $arenaid13, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day5', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r5m5);

$r5m6 = "INSERT INTO matches VALUES ('', $array_teamid[8], '', $array_teamid[5], '', $arenaid8, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day5', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r5m6);

$r5m7 = "INSERT INTO matches VALUES ('', $array_teamid[10], '', $array_teamid[1], '', $arenaid10, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day5', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r5m7);


//round 6

$r6m1 = "INSERT INTO matches VALUES ('', $array_teamid[2], '', $array_teamid[8], '', $arenaid2, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day6', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r6m1);

$r6m2 = "INSERT INTO matches VALUES ('', $array_teamid[5], '', $array_teamid[6], '', $arenaid5, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day6', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r6m2);

$r6m3 = "INSERT INTO matches VALUES ('', $array_teamid[4], '', $array_teamid[7], '', $arenaid4, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day6', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r6m3);

$r6m4 = "INSERT INTO matches VALUES ('', $array_teamid[0], '', $array_teamid[11], '', $arenaid0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day6', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r6m4);

$r6m5 = "INSERT INTO matches VALUES ('', $array_teamid[3], '', $array_teamid[10], '', $arenaid3, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day6', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r6m5);

$r6m6 = "INSERT INTO matches VALUES ('', $array_teamid[1], '', $array_teamid[13], '', $arenaid1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day6', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r6m6);

$r6m7 = "INSERT INTO matches VALUES ('', $array_teamid[9], '', $array_teamid[12], '', $arenaid9, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day6', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r6m7);


//round 7

$r7m1 = "INSERT INTO matches VALUES ('', $array_teamid[7], '', $array_teamid[13], '', $arenaid7, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day7', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r7m1);

$r7m2 = "INSERT INTO matches VALUES ('', $array_teamid[1], '', $array_teamid[8], '', $arenaid1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day7', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r7m2);

$r7m3 = "INSERT INTO matches VALUES ('', $array_teamid[2], '', $array_teamid[6], '', $arenaid2, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day7', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r7m3);

$r7m4 = "INSERT INTO matches VALUES ('', $array_teamid[10], '', $array_teamid[0], '', $arenaid10, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day7', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r7m4);

$r7m5 = "INSERT INTO matches VALUES ('', $array_teamid[12], '', $array_teamid[5], '', $arenaid12, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day7', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r7m5);

$r7m6 = "INSERT INTO matches VALUES ('', $array_teamid[11], '', $array_teamid[3], '', $arenaid11, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day7', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r7m6);

$r7m7 = "INSERT INTO matches VALUES ('', $array_teamid[4], '', $array_teamid[9], '', $arenaid4, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day7', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r7m7);


//round 8

$r8m1 = "INSERT INTO matches VALUES ('', $array_teamid[0], '', $array_teamid[2], '', $arenaid0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day8', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r8m1);

$r8m2 = "INSERT INTO matches VALUES ('', $array_teamid[3], '', $array_teamid[1], '', $arenaid3, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day8', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r8m2);

$r8m3 = "INSERT INTO matches VALUES ('', $array_teamid[9], '', $array_teamid[5], '', $arenaid9, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day8', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r8m3);

$r8m4 = "INSERT INTO matches VALUES ('', $array_teamid[8], '', $array_teamid[7], '', $arenaid8, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day8', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r8m4);

$r8m5 = "INSERT INTO matches VALUES ('', $array_teamid[10], '', $array_teamid[6], '', $arenaid10, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day8', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r8m5);

$r8m6 = "INSERT INTO matches VALUES ('', $array_teamid[4], '', $array_teamid[12], '', $arenaid4, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day8', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r8m6);

$r8m7 = "INSERT INTO matches VALUES ('', $array_teamid[13], '', $array_teamid[11], '', $arenaid13, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day8', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r8m7);


//round 9

$r9m1 = "INSERT INTO matches VALUES ('', $array_teamid[0], '', $array_teamid[13], '', $arenaid0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day9', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r9m1);

$r9m2 = "INSERT INTO matches VALUES ('', $array_teamid[5], '', $array_teamid[2], '', $arenaid5, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day9', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r9m2);

$r9m3 = "INSERT INTO matches VALUES ('', $array_teamid[7], '', $array_teamid[3], '', $arenaid7, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day9', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r9m3);

$r9m4 = "INSERT INTO matches VALUES ('', $array_teamid[6], '', $array_teamid[9], '', $arenaid6, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day9', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r9m4);

$r9m5 = "INSERT INTO matches VALUES ('', $array_teamid[8], '', $array_teamid[11], '', $arenaid8, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day9', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r9m5);

$r9m6 = "INSERT INTO matches VALUES ('', $array_teamid[10], '', $array_teamid[4], '', $arenaid10, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day9', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r9m6);

$r9m7 = "INSERT INTO matches VALUES ('', $array_teamid[1], '', $array_teamid[12], '', $arenaid1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day9', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r9m7);


//round 10

$r10m1 = "INSERT INTO matches VALUES ('', $array_teamid[12], '', $array_teamid[8], '', $arenaid12, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day10', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r10m1);

$r10m2 = "INSERT INTO matches VALUES ('', $array_teamid[7], '', $array_teamid[0], '', $arenaid7, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day10', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r10m2);

$r10m3 = "INSERT INTO matches VALUES ('', $array_teamid[5], '', $array_teamid[10], '', $arenaid5, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day10', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r10m3);

$r10m4 = "INSERT INTO matches VALUES ('', $array_teamid[11], '', $array_teamid[1], '', $arenaid11, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day10', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r10m4);

$r10m5 = "INSERT INTO matches VALUES ('', $array_teamid[6], '', $array_teamid[3], '', $arenaid6, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day10', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r10m5);

$r10m6 = "INSERT INTO matches VALUES ('', $array_teamid[2], '', $array_teamid[9], '', $arenaid2, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day10', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r10m6);

$r10m7 = "INSERT INTO matches VALUES ('', $array_teamid[13], '', $array_teamid[4], '', $arenaid13, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day10', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r10m7);


//round 11

$r11m1 = "INSERT INTO matches VALUES ('', $array_teamid[3], '', $array_teamid[13], '', $arenaid3, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day11', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r11m1);

$r11m2 = "INSERT INTO matches VALUES ('', $array_teamid[1], '', $array_teamid[5], '', $arenaid1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day11', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r11m2);

$r11m3 = "INSERT INTO matches VALUES ('', $array_teamid[9], '', $array_teamid[0], '', $arenaid9, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day11', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r11m3);

$r11m4 = "INSERT INTO matches VALUES ('', $array_teamid[8], '', $array_teamid[6], '', $arenaid8, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day11', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r11m4);

$r11m5 = "INSERT INTO matches VALUES ('', $array_teamid[11], '', $array_teamid[10], '', $arenaid11, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day11', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r11m5);

$r11m6 = "INSERT INTO matches VALUES ('', $array_teamid[4], '', $array_teamid[2], '', $arenaid4, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day11', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r11m6);

$r11m7 = "INSERT INTO matches VALUES ('', $array_teamid[12], '', $array_teamid[7], '', $arenaid12, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day11', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r11m7);


//round 12

$r12m1 = "INSERT INTO matches VALUES ('', $array_teamid[0], '', $array_teamid[1], '', $arenaid0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day12', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r12m1);

$r12m2 = "INSERT INTO matches VALUES ('', $array_teamid[2], '', $array_teamid[3], '', $arenaid2, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day12', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r12m2);

$r12m3 = "INSERT INTO matches VALUES ('', $array_teamid[5], '', $array_teamid[7], '', $arenaid5, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day12', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r12m3);

$r12m4 = "INSERT INTO matches VALUES ('', $array_teamid[6], '', $array_teamid[12], '', $arenaid6, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day12', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r12m4);

$r12m5 = "INSERT INTO matches VALUES ('', $array_teamid[4], '', $array_teamid[8], '', $arenaid4, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day12', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r12m5);

$r12m6 = "INSERT INTO matches VALUES ('', $array_teamid[13], '', $array_teamid[10], '', $arenaid13, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day12', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r12m6);

$r12m7 = "INSERT INTO matches VALUES ('', $array_teamid[9], '', $array_teamid[11], '', $arenaid9, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day12', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r12m7);


//round 13

$r13m1 = "INSERT INTO matches VALUES ('', $array_teamid[12], '', $array_teamid[0], '', $arenaid12, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day13', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r13m1);

$r13m2 = "INSERT INTO matches VALUES ('', $array_teamid[11], '', $array_teamid[7], '', $arenaid11, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day13', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r13m2);

$r13m3 = "INSERT INTO matches VALUES ('', $array_teamid[6], '', $array_teamid[13], '', $arenaid6, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day13', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r13m3);

$r13m4 = "INSERT INTO matches VALUES ('', $array_teamid[8], '', $array_teamid[9], '', $arenaid8, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day13', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r13m4);

$r13m5 = "INSERT INTO matches VALUES ('', $array_teamid[10], '', $array_teamid[2], '', $arenaid10, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day13', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r13m5);

$r13m6 = "INSERT INTO matches VALUES ('', $array_teamid[1], '', $array_teamid[4], '', $arenaid1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day13', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r13m6);

$r13m7 = "INSERT INTO matches VALUES ('', $array_teamid[3], '', $array_teamid[5], '', $arenaid3, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day13', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r13m7);


//round 14

$r14m1 = "INSERT INTO matches VALUES ('', $array_teamid[1], '', $array_teamid[2], '', $arenaid1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day14', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r14m1);

$r14m2 = "INSERT INTO matches VALUES ('', $array_teamid[8], '', $array_teamid[0], '', $arenaid8, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day14', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r14m2);

$r14m3 = "INSERT INTO matches VALUES ('', $array_teamid[6], '', $array_teamid[7], '', $arenaid6, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day14', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r14m3);

$r14m4 = "INSERT INTO matches VALUES ('', $array_teamid[3], '', $array_teamid[9], '', $arenaid3, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day14', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r14m4);

$r14m5 = "INSERT INTO matches VALUES ('', $array_teamid[5], '', $array_teamid[13], '', $arenaid5, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day14', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r14m5);

$r14m6 = "INSERT INTO matches VALUES ('', $array_teamid[4], '', $array_teamid[11], '', $arenaid4, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day14', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r14m6);

$r14m7 = "INSERT INTO matches VALUES ('', $array_teamid[12], '', $array_teamid[10], '', $arenaid12, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day14', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r14m7);


//round 15

$r15m1 = "INSERT INTO matches VALUES ('', $array_teamid[12], '', $array_teamid[13], '', $arenaid12, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day15', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r15m1);

$r15m2 = "INSERT INTO matches VALUES ('', $array_teamid[1], '', $array_teamid[6], '', $arenaid1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day15', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r15m2);

$r15m3 = "INSERT INTO matches VALUES ('', $array_teamid[0], '', $array_teamid[5], '', $arenaid0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day15', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r15m3);

$r15m4 = "INSERT INTO matches VALUES ('', $array_teamid[11], '', $array_teamid[2], '', $arenaid11, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day15', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r15m4);

$r15m5 = "INSERT INTO matches VALUES ('', $array_teamid[9], '', $array_teamid[7], '', $arenaid9, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day15', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r15m5);

$r15m6 = "INSERT INTO matches VALUES ('', $array_teamid[4], '', $array_teamid[3], '', $arenaid4, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day15', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r15m6);

$r15m7 = "INSERT INTO matches VALUES ('', $array_teamid[10], '', $array_teamid[8], '', $arenaid10, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day15', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r15m7);


//round 16

$r16m1 = "INSERT INTO matches VALUES ('', $array_teamid[3], '', $array_teamid[0], '', $arenaid3, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day16', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r16m1);

$r16m2 = "INSERT INTO matches VALUES ('', $array_teamid[6], '', $array_teamid[4], '', $arenaid6, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day16', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r16m2);

$r16m3 = "INSERT INTO matches VALUES ('', $array_teamid[7], '', $array_teamid[10], '', $arenaid7, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day16', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r16m3);

$r16m4 = "INSERT INTO matches VALUES ('', $array_teamid[2], '', $array_teamid[12], '', $arenaid2, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day16', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r16m4);

$r16m5 = "INSERT INTO matches VALUES ('', $array_teamid[5], '', $array_teamid[11], '', $arenaid5, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day16', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r16m5);

$r16m6 = "INSERT INTO matches VALUES ('', $array_teamid[9], '', $array_teamid[1], '', $arenaid9, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day16', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r16m6);

$r16m7 = "INSERT INTO matches VALUES ('', $array_teamid[13], '', $array_teamid[8], '', $arenaid13, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day16', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r16m7);


//round 17

$r17m1 = "INSERT INTO matches VALUES ('', $array_teamid[0], '', $array_teamid[6], '', $arenaid0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day17', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r17m1);

$r17m2 = "INSERT INTO matches VALUES ('', $array_teamid[7], '', $array_teamid[1], '', $arenaid7, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day17', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r17m2);

$r17m3 = "INSERT INTO matches VALUES ('', $array_teamid[4], '', $array_teamid[5], '', $arenaid4, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day17', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r17m3);

$r17m4 = "INSERT INTO matches VALUES ('', $array_teamid[8], '', $array_teamid[3], '', $arenaid8, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day17', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r17m4);

$r17m5 = "INSERT INTO matches VALUES ('', $array_teamid[13], '', $array_teamid[2], '', $arenaid13, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day17', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r17m5);

$r17m6 = "INSERT INTO matches VALUES ('', $array_teamid[10], '', $array_teamid[9], '', $arenaid10, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day17', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r17m6);

$r17m7 = "INSERT INTO matches VALUES ('', $array_teamid[12], '', $array_teamid[11], '', $arenaid12, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day17', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r17m7);


//round 18

$r18m1 = "INSERT INTO matches VALUES ('', $array_teamid[2], '', $array_teamid[7], '', $arenaid2, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day18', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r18m1);

$r18m2 = "INSERT INTO matches VALUES ('', $array_teamid[3], '', $array_teamid[12], '', $arenaid3, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day18', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r18m2);

$r18m3 = "INSERT INTO matches VALUES ('', $array_teamid[4], '', $array_teamid[0], '', $arenaid4, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day18', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r18m3);

$r18m4 = "INSERT INTO matches VALUES ('', $array_teamid[11], '', $array_teamid[6], '', $arenaid11, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day18', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r18m4);

$r18m5 = "INSERT INTO matches VALUES ('', $array_teamid[9], '', $array_teamid[13], '', $arenaid9, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day18', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r18m5);

$r18m6 = "INSERT INTO matches VALUES ('', $array_teamid[5], '', $array_teamid[8], '', $arenaid5, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day18', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r18m6);

$r18m7 = "INSERT INTO matches VALUES ('', $array_teamid[1], '', $array_teamid[10], '', $arenaid1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day18', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r18m7);


//round 19

$r19m1 = "INSERT INTO matches VALUES ('', $array_teamid[8], '', $array_teamid[2], '', $arenaid8, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day19', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r19m1);

$r19m2 = "INSERT INTO matches VALUES ('', $array_teamid[6], '', $array_teamid[5], '', $arenaid6, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day19', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r19m2);

$r19m3 = "INSERT INTO matches VALUES ('', $array_teamid[7], '', $array_teamid[4], '', $arenaid7, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day19', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r19m3);

$r19m4 = "INSERT INTO matches VALUES ('', $array_teamid[11], '', $array_teamid[0], '', $arenaid11, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day19', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r19m4);

$r19m5 = "INSERT INTO matches VALUES ('', $array_teamid[10], '', $array_teamid[3], '', $arenaid10, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day19', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r19m5);

$r19m6 = "INSERT INTO matches VALUES ('', $array_teamid[13], '', $array_teamid[1], '', $arenaid13, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day19', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r19m6);

$r19m7 = "INSERT INTO matches VALUES ('', $array_teamid[12], '', $array_teamid[9], '', $arenaid12, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day19', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r19m7);


//round 20

$r20m1 = "INSERT INTO matches VALUES ('', $array_teamid[13], '', $array_teamid[7], '', $arenaid13, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day20', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r20m1);

$r20m2 = "INSERT INTO matches VALUES ('', $array_teamid[8], '', $array_teamid[1], '', $arenaid8, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day20', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r20m2);

$r20m3 = "INSERT INTO matches VALUES ('', $array_teamid[6], '', $array_teamid[2], '', $arenaid6, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day20', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r20m3);

$r20m4 = "INSERT INTO matches VALUES ('', $array_teamid[0], '', $array_teamid[10], '', $arenaid0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day20', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r20m4);

$r20m5 = "INSERT INTO matches VALUES ('', $array_teamid[5], '', $array_teamid[12], '', $arenaid5, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day20', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r20m5);

$r20m6 = "INSERT INTO matches VALUES ('', $array_teamid[3], '', $array_teamid[11], '', $arenaid3, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day20', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r20m6);

$r20m7 = "INSERT INTO matches VALUES ('', $array_teamid[9], '', $array_teamid[4], '', $arenaid9, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day20', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r20m7);


//round 21

$r21m1 = "INSERT INTO matches VALUES ('', $array_teamid[2], '', $array_teamid[0], '', $arenaid2, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day21', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r21m1);

$r21m2 = "INSERT INTO matches VALUES ('', $array_teamid[1], '', $array_teamid[3], '', $arenaid1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day21', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r21m2);

$r21m3 = "INSERT INTO matches VALUES ('', $array_teamid[5], '', $array_teamid[9], '', $arenaid5, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day21', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r21m3);

$r21m4 = "INSERT INTO matches VALUES ('', $array_teamid[7], '', $array_teamid[8], '', $arenaid7, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day21', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r21m4);

$r21m5 = "INSERT INTO matches VALUES ('', $array_teamid[6], '', $array_teamid[10], '', $arenaid6, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day21', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r21m5);

$r21m6 = "INSERT INTO matches VALUES ('', $array_teamid[12], '', $array_teamid[4], '', $arenaid12, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day21', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r21m6);

$r21m7 = "INSERT INTO matches VALUES ('', $array_teamid[11], '', $array_teamid[13], '', $arenaid11, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day21', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r21m7);


//round 22

$r22m1 = "INSERT INTO matches VALUES ('', $array_teamid[13], '', $array_teamid[0], '', $arenaid13, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day22', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r22m1);

$r22m2 = "INSERT INTO matches VALUES ('', $array_teamid[2], '', $array_teamid[5], '', $arenaid2, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day22', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r22m2);

$r22m3 = "INSERT INTO matches VALUES ('', $array_teamid[3], '', $array_teamid[7], '', $arenaid3, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day22', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r22m3);

$r22m4 = "INSERT INTO matches VALUES ('', $array_teamid[9], '', $array_teamid[6], '', $arenaid9, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day22', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r22m4);

$r22m5 = "INSERT INTO matches VALUES ('', $array_teamid[11], '', $array_teamid[8], '', $arenaid11, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day22', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r22m5);

$r22m6 = "INSERT INTO matches VALUES ('', $array_teamid[4], '', $array_teamid[10], '', $arenaid4, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day22', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r22m6);

$r22m7 = "INSERT INTO matches VALUES ('', $array_teamid[12], '', $array_teamid[1], '', $arenaid12, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day22', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r22m7);


//round 23

$r23m1 = "INSERT INTO matches VALUES ('', $array_teamid[8], '', $array_teamid[12], '', $arenaid8, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day23', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r23m1);

$r23m2 = "INSERT INTO matches VALUES ('', $array_teamid[0], '', $array_teamid[7], '', $arenaid0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day23', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r23m2);

$r23m3 = "INSERT INTO matches VALUES ('', $array_teamid[10], '', $array_teamid[5], '', $arenaid10, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day23', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r23m3);

$r23m4 = "INSERT INTO matches VALUES ('', $array_teamid[1], '', $array_teamid[11], '', $arenaid1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day23', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r23m4);

$r23m5 = "INSERT INTO matches VALUES ('', $array_teamid[3], '', $array_teamid[6], '', $arenaid3, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day23', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r23m5);

$r23m6 = "INSERT INTO matches VALUES ('', $array_teamid[9], '', $array_teamid[2], '', $arenaid9, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day23', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r23m6);

$r23m7 = "INSERT INTO matches VALUES ('', $array_teamid[4], '', $array_teamid[13], '', $arenaid4, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day23', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r23m7);


//round 24

$r24m1 = "INSERT INTO matches VALUES ('', $array_teamid[13], '', $array_teamid[3], '', $arenaid13, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day24', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r24m1);

$r24m2 = "INSERT INTO matches VALUES ('', $array_teamid[5], '', $array_teamid[1], '', $arenaid5, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day24', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r24m2);

$r24m3 = "INSERT INTO matches VALUES ('', $array_teamid[0], '', $array_teamid[9], '', $arenaid0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day24', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r24m3);

$r24m4 = "INSERT INTO matches VALUES ('', $array_teamid[6], '', $array_teamid[8], '', $arenaid6, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day24', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r24m4);

$r24m5 = "INSERT INTO matches VALUES ('', $array_teamid[10], '', $array_teamid[11], '', $arenaid10, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day24', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r24m5);

$r24m6 = "INSERT INTO matches VALUES ('', $array_teamid[2], '', $array_teamid[4], '', $arenaid2, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day24', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r24m6);

$r24m7 = "INSERT INTO matches VALUES ('', $array_teamid[7], '', $array_teamid[12], '', $arenaid7, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day24', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r24m7);


//round 25

$r25m1 = "INSERT INTO matches VALUES ('', $array_teamid[1], '', $array_teamid[0], '', $arenaid1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day25', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r25m1);

$r25m2 = "INSERT INTO matches VALUES ('', $array_teamid[3], '', $array_teamid[2], '', $arenaid3, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day25', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r25m2);

$r25m3 = "INSERT INTO matches VALUES ('', $array_teamid[7], '', $array_teamid[5], '', $arenaid7, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day25', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r25m3);

$r25m4 = "INSERT INTO matches VALUES ('', $array_teamid[12], '', $array_teamid[6], '', $arenaid12, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day25', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r25m4);

$r25m5 = "INSERT INTO matches VALUES ('', $array_teamid[8], '', $array_teamid[4], '', $arenaid8, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day25', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r25m5);

$r25m6 = "INSERT INTO matches VALUES ('', $array_teamid[10], '', $array_teamid[13], '', $arenaid10, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day25', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r25m6);

$r25m7 = "INSERT INTO matches VALUES ('', $array_teamid[11], '', $array_teamid[9], '', $arenaid11, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day25', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r25m7);


//round 26

$r26m1 = "INSERT INTO matches VALUES ('', $array_teamid[0], '', $array_teamid[12], '', $arenaid0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day26', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r26m1);

$r26m2 = "INSERT INTO matches VALUES ('', $array_teamid[7], '', $array_teamid[11], '', $arenaid7, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day26', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r26m2);

$r26m3 = "INSERT INTO matches VALUES ('', $array_teamid[13], '', $array_teamid[6], '', $arenaid13, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day26', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r26m3);

$r26m4 = "INSERT INTO matches VALUES ('', $array_teamid[9], '', $array_teamid[8], '', $arenaid9, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day26', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r26m4);

$r26m5 = "INSERT INTO matches VALUES ('', $array_teamid[2], '', $array_teamid[10], '', $arenaid2, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day26', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r26m5);

$r26m6 = "INSERT INTO matches VALUES ('', $array_teamid[4], '', $array_teamid[1], '', $arenaid4, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day26', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r26m6);

$r26m7 = "INSERT INTO matches VALUES ('', $array_teamid[5], '', $array_teamid[3], '', $arenaid5, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day26', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$fixtures_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $leagueid, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result = mysql_query($r26m7);

$k++;
}


}
echo "Success<br/>";
?>