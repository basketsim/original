<?php
ini_set("max_execution_time", 6000);
require_once('cron2conect.php');

//motivation drops for coaches
mysql_query("UPDATE players SET motiv=motiv-0.12 WHERE charac < 4 AND club != 0 AND coach=1") or die("Ne updata trenerjev.");
mysql_query("UPDATE players SET motiv=motiv-0.18 WHERE charac > 3 AND charac < 11 AND club != 0 AND coach=1") or die("Ne updata trenerjev.");
mysql_query("UPDATE players SET motiv=motiv-0.15 WHERE charac > 10 AND charac < 17 AND club != 0 AND coach=1") or die("Ne updata trenerjev.");
mysql_query("UPDATE players SET motiv=motiv-0.21 WHERE charac > 16 AND club != 0 AND coach=1") or die("Ne updata trenerjev.");
mysql_query("UPDATE players SET motiv=motiv-0.14 WHERE age < 37 AND club != 0 AND coach=1") or die("Ne updata trenerjev.");
mysql_query("UPDATE players SET motiv=motiv-0.11 WHERE age > 36 AND age < 57 AND club != 0 AND coach=1") or die("Ne updata trenerjev.");
mysql_query("UPDATE players SET motiv=motiv-0.15 WHERE age > 56 AND age < 64 AND club != 0 AND coach=1") or die("Ne updata trenerjev.");
mysql_query("UPDATE players SET motiv=motiv-0.21 WHERE age > 63 AND club != 0 AND coach=1") or die("Ne updata trenerjev.");

//salaries, sponsors and interest money for non-bot teams
$querypw = mysql_query("SELECT users.userid AS userid, users.signed AS signed, teams.teamid AS teamid, teams.curmoney AS curmoney FROM users, teams WHERE users.club=teams.teamid AND teams.status=1") or die("Ne bere IDjev ekip.");
while ($j = mysql_fetch_array($querypw)) {
$useron = $j["userid"];
$signon = $j["signed"];
$teamid = $j["teamid"];
$moneystate = $j["curmoney"];
//salaries
$salaries = mysql_query("SELECT SUM(wage) FROM players WHERE club=$teamid") or die("Proces branja plac ustavljen pri klubu $teamid.");
list($sum) = mysql_fetch_row($salaries);
if ($sum < 1) {$sum=0;}
//new teams discount
$timeofsale = date("Y-m-d H:i:s");
$splitdatetime = explode(" ", $timeofsale); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$prikazcasa = date("Y-m-d H:i:s", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear-1));
if ($signon > $prikazcasa) {$sum = $sum/2;}
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
$iddl = number_format(round($intden), 0, ',', '.');
mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'Due to participation in international club competition team received $iddl &euro; this week.', 1, $intden);");
}
//interest
if ($moneystate >= 0) {$bankinterest = $moneystate*0.1/100; $bankloan = 0;} else {$bankinterest = 0; $bankloan = abs($moneystate*1/100);}
mysql_query("UPDATE teams SET curmoney=curmoney-$sum+$sponsors+$intden+$bankinterest-$bankloan WHERE teamid=$teamid LIMIT 1") or die("Proces updatanja denarja od plac koncan pri klubu $teamid.");
//bankrupcy warnings
if ($moneystate <= -5000000) {mysql_query("INSERT INTO `messages` VALUES ('', $useron, 0, 0, NOW(), '<b>Money issues</b>', 'Hello coach!<br/><br/>Your club finances are not doing so good lately. The good news is that bankruptcies are currently disabled, so you have time to sort out your finances!<br/><br/>Johnny B. Cash,<br/>Senior bank assistant');");}
//notices
$wagedspl = number_format(round($sum), 0, ',', '.');
$sponsdspl = number_format($sponsors, 0, ',', '.');
mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'Salaries were paid to staff in total of $wagedspl &euro;. Contribution from sponsors was $sponsdspl &euro; this week.', 1, $sponsors-$sum);");
mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'Weekly update took place.', 0, 0);");
}

mysql_query("UPDATE `countries` SET `mood`=`mood`-1 WHERE `mood` > 159") or die(mysql_error());
mysql_query("UPDATE `countries` SET `mood`=`mood`-1 WHERE `mood` > 139") or die(mysql_error());
mysql_query("UPDATE `countries` SET `mood`=`mood`+1 WHERE `mood` < 119") or die(mysql_error());
mysql_query("UPDATE `countries` SET `mood`=`mood`+1 WHERE `mood` < 89") or die(mysql_error());
mysql_query("UPDATE `countries` SET `mood`=`mood`+1 WHERE `mood` < 59") or die(mysql_error());
mysql_query("UPDATE `countries` SET `mood`=`mood`+1 WHERE `mood` < 29") or die(mysql_error());
mysql_query("UPDATE `u18countries` SET `mood`=`mood`-1 WHERE `mood` > 169") or die(mysql_error());
mysql_query("UPDATE `u18countries` SET `mood`=`mood`-1 WHERE `mood` > 139") or die(mysql_error());
mysql_query("UPDATE `u18countries` SET `mood`=`mood`+1 WHERE `mood` < 109") or die(mysql_error());
mysql_query("UPDATE `u18countries` SET `mood`=`mood`+1 WHERE `mood` < 69") or die(mysql_error());
mysql_query("UPDATE `u18countries` SET `mood`=`mood`+1 WHERE `mood` < 29") or die(mysql_error());

//cheerleaders
$cheeradd = mysql_query("SELECT teamid, cheer_week FROM arena") or die("Ne bere IDjev aren klubov.");
$i=0;
while ($i < mysql_num_rows($cheeradd)) {
$teamid=mysql_result($cheeradd,$i,"teamid");
$cheer_week=mysql_result($cheeradd,$i,"cheer_week");
$enaaa = rand(1000,1500);
mysql_query("UPDATE arena SET season_ideal =season_ideal+week_ideal, cheer_season=cheer_season+cheer_week, week_ideal = (seats1 * 1.8 + seats2 * 1.4 + seats3 * 0.7 + seats4 * 0.2 + $enaaa) * in_use/100 WHERE teamid=$teamid") or die("Ne updata navijačic");
mysql_query("UPDATE teams SET curmoney=curmoney-$cheer_week WHERE teamid=$teamid");
$i++;
}

//remove extra players
$result = mysql_query("SELECT DISTINCT teamid, name, country, userid FROM teams, users WHERE club=teamid AND status=1") or die (mysql_error());
while($r=mysql_fetch_array($result)) {
$teamid=$r[teamid];
$namesee2=$r[name];
$csee2=$r[country];
$userid=$r[userid];
$rule = mysql_query("SELECT id FROM players WHERE isonsale <> 1 && coach=0 && ntplayer=0 && club=$teamid ORDER BY wage DESC") or die (mysql_error());
$dong = mysql_num_rows($rule);
if ($dong > 40) {
for ($counter = 40; $counter < $dong; $counter += 1) {
$od=$od+1;
$playerid = mysql_result($rule,$counter,"id");
mysql_query("UPDATE players SET club=0, has_played=0, last_position=1, shirt=NULL WHERE club=$teamid AND id=$playerid LIMIT 1") or die (mysql_error());
$ranpos=mt_rand(1,5);
$ftime = time(); $fyear=date('Y', $ftime); $fmonth=date('m', $ftime); $fday=date('d', $ftime); $fhour=date('H', $ftime); $fmin=date('i', $ftime); $fsec=date('s', $ftime);
$freetransf = "INSERT INTO transfers VALUES ('', $playerid, '$namesee2', $userid, '$csee2', 0, $ranpos, '$fyear=$fmonth=$fday $fhour+$fmin+$fsec', 1, 0, 'Free Transfer', 0, 1000);";
mysql_query($freetransf);
}
$odstevek=10000*$od; $od=0;
mysql_query("UPDATE teams SET curmoney=curmoney-$odstevek WHERE teamid=$teamid LIMIT 1") or die (mysql_error());
mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'Due to overcrowded gym, your coach was forced to fire some players at administrative cost of 10.000 per player.', 0, 0);") or die (mysql_error());
}
}

//camp
$kamp = mysql_query("UPDATE teams SET youthcamp=0") or die("Ne resetira mladinskih ekip.");
if ($kamp) {echo "KAMP RESETIRAN - VSE OK!";}

//fatigue deducation based on medical center level
$mcf = mysql_query("SELECT id_team, current_level FROM medical_center WHERE current_level >0 ORDER BY id_team ASC") or die(mysql_error());
while ($u=mysql_fetch_array($mcf)) {
$id_team = $u[id_team];
$dodatek = $u[current_level];
mysql_query("UPDATE players SET fatigue=greatest(fatigue-$dodatek,0) WHERE age < 31 AND club=$id_team") or die(mysql_error());
$doddve = $dodatek - 1;
if ($doddve > 0) {mysql_query("UPDATE players SET fatigue=greatest(fatigue-$doddve,0) WHERE age > 30 AND club=$id_team") or die(mysql_error());}
echo "_".$id_team;
}
?>