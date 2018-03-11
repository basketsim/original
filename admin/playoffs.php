<?php
ini_set("max_execution_time", 3500);
include("cron2conect.php");
//čestitke liga massmail ali pa dobiš won a league ko je konec


mysql_query("TRUNCATE TABLE `playoffs`");
$kisha = mysql_query("SELECT DISTINCT country FROM leagues, competition WHERE leagues.leagueid = competition.leagueid AND competition.season=$default_season AND competition.played=26");
$ku=0;
while ($ku < mysql_num_rows($kisha)) {
$country = mysql_result($kisha,$ku);
//izberem drugouvrscene
$drugouvrsceni = mysql_query("SELECT competition.teamid AS ekipa, competition.curname AS ime FROM competition, teams, leagues WHERE teams.teamid = competition.teamid AND competition.leagueid = leagues.leagueid AND teams.country = '$country' AND competition.position =2 AND competition.season ='$default_season' ORDER BY LEVEL ASC , `position` ASC , `win` DESC , `difference` DESC , `for_` DESC") or die(mysql_error());
$num = mysql_num_rows($drugouvrsceni);
$i=1; //prva liga odpade
while ($i < $num){
$ekipa = mysql_result($drugouvrsceni,$i,"ekipa");
$ime = mysql_result($drugouvrsceni,$i,"ime");
$ime = addslashes($ime);
//zapis
$insertq = "INSERT INTO playoffs VALUES ('', $ekipa, '$ime', 0, '', '$country', 0, 0, 0, 0, 0);";
mysql_query($insertq) or die(mysql_error());
$i++;
}
//dodam tiste ki se borijo za obstanek
$obstanek = mysql_query("SELECT competition.teamid AS ekipa2, competition.curname AS ime2 FROM competition, teams, leagues WHERE teams.teamid = competition.teamid AND competition.leagueid = leagues.leagueid AND teams.country = '$country' AND competition.position >8 AND competition.position <12 AND competition.season ='$default_season' ORDER BY LEVEL ASC , `position` DESC , `win` ASC , `difference` ASC , `for_` ASC") or die(mysql_error());
$num = mysql_num_rows($obstanek);
$i=0;
while ($i < $num){
$ekipa2 = mysql_result($obstanek,$i,"ekipa2");
$ime2 = mysql_result($obstanek,$i,"ime2");
$ime2 = addslashes($ime2);
//zapis
mysql_query("UPDATE playoffs SET team2 = $ekipa2, name2 = '$ime2' WHERE team2 = 0 ORDER BY id ASC LIMIT 1");
$i++;
}
$ku++;
}



//naredim tekme
$playoffi = mysql_query("SELECT `team1`, `team2`, `country`, `arenaid`, `arenaname` FROM `playoffs`, `arena` WHERE `team1`=`teamid`") or die("Ne bere iz playoff tabele.");
$n=0;
while ($n < mysql_num_rows($playoffi)) {
$team1 = mysql_result($playoffi,$n,'team1');
$team2 = mysql_result($playoffi,$n,'team2');
$drzava= mysql_result($playoffi,$n,'country');
$id_arene = mysql_result($playoffi,$n,'arenaid');
$kraj_tekme = mysql_result($playoffi,$n,'arenaname');
$kraj_tekme = addslashes($kraj_tekme);
$placnik = mysql_query("SELECT MAX(`time`) AS `tm` FROM `matches` WHERE `season`=$default_season AND `type` =1 AND `country`='$drzava'") or die("bwehmet");
$casnik = mysql_result($placnik,0,'tm');
$splitpres = explode(" ", $casnik); $tdate = $splitpres[0]; $ttime = $splitpres[1];
$splitena = explode("-", $tdate); $tyear = $splitena[0]; $tmonth = $splitena[1]; $tday = $splitena[2];
$splitdve = explode(":", $ttime); $thour = $splitdve[0]; $tmin = $splitdve[1]; $tsec = $splitdve[2];
$presadat = date("Y-m-d H:i:s", mktime($thour,$tmin,$tsec,$tmonth,$tday+7,$tyear));
$create_m = "INSERT INTO matches VALUES ('', '$team1', '', '$team2', '', '$id_arene', '$kraj_tekme', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$presadat', '4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$drzava', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$default_season', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);";
mysql_query($create_m) or die($team1." ".$team2);
$n++;
}

?>
