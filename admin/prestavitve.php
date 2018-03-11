<?php
include('../inc/config.php');

$query = mysql_query("SELECT fd_id, `date` FROM friendly_dates WHERE country='Georgia'");
$pik = mysql_num_rows($query);
$p=0;
while ($p < $pik) {
$fdid = mysql_result($query,$p,"fd_id");
$urica = mysql_result($query,$p,"date");
$splitdatetime = explode(" ", $urica); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$novaurica = date("Y-m-d H:i:s", mktime($dbhour-1,$dbmin,$dbsec,$dbmonth,$dbday-11,$dbyear));
echo $urica," -> ",$novaurica,"<br/>";
mysql_query("UPDATE friendly_dates SET `date` = '$novaurica' WHERE `date`='$urica' AND fd_id=$fdid LIMIT 1");
$p++;
}


/*
$drzavica = 'Israel';
$query = mysql_query("SELECT `matchid` , `time` FROM `matches` WHERE`crowd1` =0 AND `country`= '$drzavica' AND type < 5 AND `time` NOT LIKE '%19:00:00'");
$pik = mysql_num_rows($query);
echo $pik,"<br/>";
$p=0;
while ($p < $pik) {

$tekmica = mysql_result($query,$p,"matchid");
$urica = mysql_result($query,$p,"time");

$splitdatetime = explode(" ", $urica); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$novaurica = date("Y-m-d H:i:s", mktime($dbhour-3,$dbmin-30,$dbsec,$dbmonth,$dbday,$dbyear));

echo $urica," -> ",$novaurica,"<br/>";

mysql_query("UPDATE matches SET time = '$novaurica' WHERE matchid=$tekmica");

$p++;
}
echo "<br>",$p;
*/
?>