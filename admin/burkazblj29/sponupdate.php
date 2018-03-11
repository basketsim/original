<?php
ini_set("max_execution_time", 2600);
require_once("cron2conect.php");

//sponsors
$ad = mysql_query("SELECT DISTINCT user_id, sponsorid, totalmoney, noofpayments, noofdays, club FROM sponsors, users WHERE userid=user_id AND `history`=1 ORDER BY sponsorid ASC");
while ($mm = mysql_fetch_array($ad)) {
$user_id = $mm['user_id'];
$sponsorid = $mm['sponsorid'];
$totalmoney = $mm['totalmoney'];
$noofpayments = $mm['noofpayments'];
$noofdays = $mm['noofdays'];
$club= $mm['club'];
$kaka=$noofdays/$noofpayments;
$placilo = 90*$totalmoney/$noofpayments;
$placilo = round($placilo/100);
$showsum = number_format($placilo, 0, ',', '.');
if (($noofdays % 7)==0 AND $kaka<>7) {
mysql_query("UPDATE `teams` SET `curmoney`=`curmoney`+$placilo WHERE `teamid`='$club' LIMIT 1") or die(mysql_error());
mysql_query("INSERT INTO events VALUES ('', $club, NOW(), 'General sponsor has paid the weekly sponsorship fee. After the 10% taxation, the club has received $showsum &euro;.', 1, $placilo);") or die(mysql_error());
}
//contract expires + sponsorship offer
if ($noofdays==0) {
$zdaj = date("Y-m-d H:i:s");
mysql_query("UPDATE `sponsors` SET `offerexpire`='$zdaj', `history`=2 WHERE `sponsorid`=$sponsorid LIMIT 1") or die(mysql_error());
$newspon=rand(1,15);
$splitdatetime = explode(" ", $zdaj); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$zdajB = date("Y-m-d H:i:s", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday+6,$dbyear));
$draga = mysql_query("SELECT curmoney FROM teams WHERE teamid='$club' LIMIT 1");
$dragi = @mysql_result($draga,0,"curmoney");
$is_ime = mysql_query("SELECT * FROM leagues, competition WHERE leagues.leagueid=competition.leagueid AND competition.teamid='$club' AND competition.season=$default_season LIMIT 1") or die(mysql_error());
$ligall = @mysql_result($is_ime,0,"leagues.level");
$ligass = @mysql_result($is_ime,0,"leagues.strength");
$ligapp = @mysql_result($is_ime,0,"competition.position");
if ($dragi < 0) {$uha = ((40-$ligapp)/30) * (100*(6-$ligall) + $ligass)/3 + rand(40,120); $stobrok=rand(5,9);}
else {$uha = (40-$ligapp)/30 * (100*(6-$ligall) + $ligass)/3 - ((sqrt($dragi))/48) + rand(40,120); $stobrok=rand(5,10);}
$uha = $uha * 0.80;
$enobrok = 100*$uha/11;
SWITCH ($stobrok) {
CASE 5: $konc = $enobrok * 450; break;
CASE 6: $konc = $enobrok * 560; break;
CASE 7: $konc = $enobrok * 670; break;
CASE 8: $konc = $enobrok * 780; break;
CASE 9: $konc = $enobrok * 890; break;
CASE 10: $konc = $enobrok * 1000; break;
}
if ($konc < 100000) {$konc=100000;}
$kdni=$stobrok*7;
mysql_query("INSERT INTO sponsors VALUES ('', '$newspon', '$user_id', '$konc', '$stobrok', '$kdni', '$zdajB', '0')") or die(mysql_error());
@mysql_query("INSERT INTO `messages` VALUES ('', $user_id, 0, 0, NOW(), '<b>Expired contract</b>', 'Hello, I\'m just letting you know that our general sponsorship contract has expired and it\'s time to start negotiating with potential sponsors for a new deal. I was able to get one offer already, you should be able to get one as well and after that you\'ll have to wait for a day each time to arrange further meetings. Having several offers will improve our chances of getting what we want!<br/><br/>Your personal assistant');") or die(mysql_error());
}
}
mysql_query("UPDATE sponsors SET noofdays=noofdays-1 WHERE `history`=1");
?>