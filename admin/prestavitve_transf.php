$result = mysql_query("SELECT transferid, playerid, timeofsale, sellingid FROM `transfers` WHERE `currentbid` >0 AND price >0 AND `timeofsale` > '2009-02-13 13:00' AND `timeofsale` < '2009-02-13 15:20'");
while ($i = mysql_fetch_array($result)) {
$transferid=$i["transferid"];
$playerid=$i["playerid"];
$urica = $i['timeofsale'];
$sellingid=$i["sellingid"];

$splitdatetime = explode(" ", $urica); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$novaurica = date("Y-m-d H:i:s", mktime($dbhour+5,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));

echo $novaurica,"<br/>";

//prodajalec
$resultld = mysql_query("SELECT `club` FROM `users` WHERE `userid`='$sellingid' LIMIT 1");
if (mysql_num_rows($resultld)>0) {$asoldte = mysql_result($resultld,0,"club");} else {$asoldte=0;}

mysql_query("UPDATE `players` SET `club`='$asoldte', `isonsale`='1' WHERE `id`='$playerid' LIMIT 1") or die(mysql_error());
mysql_query("UPDATE `transfers` SET `trstatus`='1, timeofsale ='$novaurica'' WHERE `transferid`='$transferid' LIMIT 1") or die(mysql_error());

}
die("OK");








<?php
include('../inc/conect.php');
j
$drzavica = 'Turkey';
$query = mysql_query("SELECT `matchid` , `time` FROM `matches` WHERE type=1 AND `crowd1` =0 AND season=6 AND `country`= '$drzavica' AND `time` NOT LIKE '%18:00:00'");
$pik = mysql_num_rows($query);
echo $pik,"<br/>";
$p=0;
while ($p < $pik) {

$tekmica = mysql_result($query,$p,"matchid");
$urica = mysql_result($query,$p,"time");

$splitdatetime = explode(" ", $urica); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$novaurica = date("Y-m-d H:i:s", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear-1));

echo $urica," -> ",$novaurica,"<br/>";

mysql_query("UPDATE matches SET time = '$novaurica' WHERE matchid=$tekmica AND season=7 AND `country`= '$drzavica'");
$p++;
}
echo "<br>",$p;
?>