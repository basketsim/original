<?php
dfd
ini_set("max_execution_time", 3000);
require_once('cron2conect.php');

$querypw = mysql_query("SELECT users.userid AS userid, teams.teamid AS teamid, teams.curmoney AS curmoney FROM users, teams WHERE users.club=teams.teamid AND teams.status=1 AND userid < 141557") or die("Ne bere IDjev ekip.");
while ($j = mysql_fetch_array($querypw)) {
$useron = $j["userid"];
$teamid = $j["teamid"];
$moneystate = $j["curmoney"];
//place
$salaries = mysql_query("SELECT SUM(wage) FROM players WHERE club=$teamid") or die("Proces branja plac ustavljen pri klubu $teamid.");
list($sum) = mysql_fetch_row($salaries);
if ($sum < 1) {$sum=0;}
//sponzorji
$fanumb = mysql_query("SELECT fans FROM arena WHERE teamid=$teamid LIMIT 1");
while ($fanumber = mysql_fetch_array($fanumb, MYSQL_ASSOC))
   {   foreach ($fanumber as $nooffans)
   {$nooffans; }     } ;
$sponsors = round(sqrt($nooffans)*7000);
//international
$intden=0;
$laa = mysql_query("SELECT competition FROM ekipe WHERE competition<>3 AND ekipa=$teamid") or die("tabela competition");
if (mysql_num_rows($laa)) {
$ty4 = mysql_result($laa,0, "competition");
if ($ty4==1) {$intden=50000;} else {$intden=40000;}
$drva = mysql_query("SELECT crowd4, home_score, away_score FROM matches WHERE home_score >0 AND (type=6 OR type=7) AND home_id=$teamid ORDER BY matchid DESC LIMIT 1") or die("intekme");
while ($mu = mysql_fetch_array($drva)) {
$cr4 = $mu[crowd4];
$hs4 = $mu[home_score];
$as4 = $mu[away_score];
$intden= $intden + $cr4 * 40;
if ($hs4 > $as4) {$intden=$intden+20000;}
}
}
//obresti
if ($moneystate >= 0) {$bankinterest = $moneystate*0.1/100; $bankloan = 0;} else {$bankinterest = 0; $bankloan = abs($moneystate*1/100);}
mysql_query("UPDATE teams SET curmoney=curmoney+$sum-$sponsors-$intden-$bankinterest+$bankloan WHERE teamid=$teamid LIMIT 1") or die("Proces updatanja denarja od plac koncan pri klubu $teamid.");
}
?>