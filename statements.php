<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT club,lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)) {$klap = mysql_result($compare,0,"club"); $lang = mysql_result($compare,0,"lang");} else {die(include 'basketsim.php');}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2>STATEMENTS OVERVIEW</h2>

<table border="0" cellpadding="9" cellspacing="9" width="100%">
<tr><td class="border" width="66%" valign="top" bgcolor="#ffffff">

<?php
$drzav1 = $_GET["country"];
$drzav1=strip_tags($drzav1);
$drzav1=addslashes($drzav1);
$userck = $_GET["user"];
$userck = trim($userck);
if (strlen($userck)>0 AND !is_numeric($userck)) {die(include 'index.php');}
if (!$drzav1 AND !$userck) {$jonba = @mysql_query("SELECT country FROM teams WHERE teamid='$klap' LIMIT 1"); $drzav1=@mysql_result($jonba,0,"country");}

if ($drzav1 && !$userck) {
echo "<h2>Last statments in ",$drzav1,"</h2><br/>";
$izbor = mysql_query("SELECT username AS usrn, `title`, `content`, user, league, leagues.`country` AS countr, `name` FROM statements, users, leagues WHERE users.userid = statements.user AND statements.league = leagues.leagueid AND statements.`country` LIKE '$drzav1' ORDER BY `id` DESC LIMIT 50 ") or die(mysql_error());
echo "<table width=\"100%\" border=\"0\" cellspacing=\"2\" cellpadding=\"2\">";
while ($f = mysql_fetch_array($izbor)) {
if ($kr>0) {echo "<tr><td><hr/></td></tr>";}
$kr++;
echo "<tr bgcolor=\"#efefef\"><td bgcolor=\"#ffffff\"><b>",stripslashes($f['title']),"</b> (<a href=\"club.php?clubid=",$f['user'],"\">",$f['usrn'],"</a>, <a href=\"leagues.php?leagueid=",$f['league'],"\">",$f['name'],"</a>)</td></tr>";
echo "<tr bgcolor=\"#efefef\"><td bgcolor=\"#ffffff\">",stripslashes($f['content']),"</td></tr>";
}
echo "</table>";
}

if (!$drzav1 && $userck) {
$user = mysql_query("SELECT username, country, signed FROM users, teams WHERE teamid=club AND userid ='$userck'") or die(mysql_error());
if (mysql_num_rows($user)>0) {
$ime = mysql_result($user,0,"username");
$zem = mysql_result($user,0,"country");
$join = mysql_result($user,0,"signed");
}
echo "<b>All statements from ",$ime,"</b><br/><br/>";
$izbor = mysql_query("SELECT `title`, `content`, `time` FROM statements WHERE user = '$userck' ORDER BY `id` DESC") or die(mysql_error());
echo "<table width=\"100%\" border=\"0\" cellspacing=\"2\" cellpadding=\"2\">";
while ($f = mysql_fetch_array($izbor)) {
$endatum = $f['time'];
$tdatetime = explode(" ",$endatum); $ffdate = $tdatetime[0]; $fftime = $tdatetime[1];
$tdate = explode("-", $ffdate); $ffyear = $tdate[0]; $ffmonth = $tdate[1]; $ffday = $tdate[2];
$ttime = explode(":", $fftime); $ffhour = $ttime[0]; $ffmin = $ttime[1]; $ffsec = $ttime[2];
$ffdate = date("Y-m-d H:i:s", mktime($ffhour,$ffmin,$ffsec,$ffmonth,$ffday,$ffyear));
if ($zem=='Israel') {echo "<tr bgcolor=\"#efefef\"><td bgcolor=\"#ffffff\">(",$ffdate,")&nbsp;<b>",stripslashes($f['title']),"</b></td></tr>";}
else {echo "<tr bgcolor=\"#efefef\"><td bgcolor=\"#ffffff\"><b>",stripslashes($f['title']),"</b> (",$ffdate,")</td></tr>";}
echo "<tr bgcolor=\"#efefef\"><td bgcolor=\"#ffffff\">",stripslashes($f['content']),"</td></tr>";
echo "<tr><td><hr/></td></tr>";
$z=$z+1;
}
echo "</table>";
}
?>

</td><td class="border" width="34%" valign="top" bgcolor="#ffffff">
<?php
if (!$userck) {
if ($drzav1=='Bosnia') {echo "<h2>Top 10 posters in BiH</h2><br/>";} else {echo "<h2>Top 10 posters in ",$drzav1,"</h2><br/>";}
//show additional stats between 1h and 15h only
$ur = date("H");
if ($ur < 13 OR $ur > 22) {
$query = mysql_query("SELECT user, username, count( * ) AS tev FROM `statements` , users WHERE `country` = '$drzav1' AND userid = user GROUP BY `user` ORDER BY tev DESC
LIMIT 10") or die(mysql_error());
$num = mysql_num_rows($query);
$i=0;
while ($i < $num) {
$greceiver = mysql_result($query,$i,"user");
$name = mysql_result($query,$i,"username");
$stevec = mysql_result($query,$i,"tev");
echo "<span class=\"alignleft\">",($i+1),". <a href=\"club.php?clubid=",$greceiver,"\">",$name,"</a></span><span class=\"alignright\">",$stevec,"</span><br/>";
$i++;
}
} else {echo "<i>Top 10 posters are visible here at any hour between 22:00 and 13:00!</i><br/>";}
?>
<br/><h2>Statements per country</h2><br/>
<?php
$spc = mysql_query("SELECT COUNT( * ) AS count, `country` AS country FROM `statements` GROUP BY `country`") or die(mysql_error());
while ($s = mysql_fetch_array($spc)) {
$drzava = $s["country"];

if ($drzava==$drzav1 AND $drzava=='Bosnia') {echo "<b>Bosnia and Herzegovina (",$s["count"],")</b><br/>";}
elseif ($drzava==$drzav1 AND $drzava<>'Bosnia') {echo "<b>",$drzava," (",$s["count"],")</b><br/>";}
elseif ($drzava<>$drzav1 AND $drzava=='Bosnia') {echo "<a href=\"statements.php?country=Bosnia\">Bosnia and Herzegovina</a> (",$s["count"],")<br/>";}
else {echo "<a href=\"statements.php?country=",$drzava,"\">",$drzava,"</a> (",$s["count"],")<br/>";}

}
}
else {
$datetime = explode(" ",$join); $fdate = $datetime[0]; $ftime = $datetime[1];
$date = explode("-", $fdate); $fyear = $date[0]; $fmonth = $date[1]; $fday = $date[2];
$time = explode(":", $ftime); $fhour = $time[0]; $fmin = $time[1]; $fsec = $time[2];
$fdate = date("Y-m-d H:i:s", mktime($fhour,$fmin,$fsec,$fmonth,$fday,$fyear));
$days = (int)((mktime (0,0,0,$fmonth,$fday,$fyear) - time(void))/86400);
?>
<h2>Overview</h2><br/>
User: <a href="club.php?clubid=<?=$userck?>"><?=$ime?></a><br/>
Days active: <?=abs($days)?><br/>
Statements posted: <?=$z?><br/>
Country: <a href="statements.php?country=<?=$zem?>"><?=$zem?></a><br/>
<?php
$koef = ($z / ((abs($days)/30.25) + 0.01));
if (round($koef,1)<0.75) {echo "<br/><i>On average ",$ime," issues less than 1 statement per month.</i>";}
elseif (round($koef,1)>0.74 && round($koef,1)<1.01) {echo "<br/><i>On average ",$ime," issues ",round($koef)," statement per month.</i>";}
elseif (round($koef,1)>1) {echo "<br/><i>On average ",$ime," issues ",round($koef)," statements per month.</i>";}
}
?>
</td></tr></table>
</div>
</div>
</body>
</html>