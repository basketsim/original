<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT lang, friendly FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)){$lang = mysql_result ($compare,0,"lang"); $asem = mysql_result ($compare,0,"friendly");} else {die(include 'basketsim.php');}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2><?=$langmark1044?></h2>
<table border="0" cellpading="9" cellspacing="9" width="100%">
<tr>
<td class="border" width="55%" valign="top" bgcolor="#ffffff">

<?php
$last_active = date("Y-m-d H:i:s");
$splitdatetime = explode(" ", $last_active); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$expireminus = date("Y-m-d H:i:s", mktime($dbhour,$dbmin-35,$dbsec,$dbmonth,$dbday,$dbyear));
$userson = mysql_query("SELECT users.userid AS uporabniki, users.username AS imena, teams.country AS drzave, users.supporter AS suporterji, friendly FROM users, teams WHERE users.club = teams.teamid AND users.is_online =1 AND users.last_active > '$expireminus'") or die(mysql_error());
$num=mysql_num_rows($userson);
$n=0;
while ($n < $num) {
$userjid = mysql_result($userson,$n,"uporabniki");
$username = mysql_result($userson,$n,"imena");
$country = mysql_result($userson,$n,"drzave");
if ($country=='Bosnia') {$country='Bosnia and Herzegovina';}
$suport = mysql_result($userson,$n,"suporterji");
$frendly = mysql_result($userson,$n,"friendly");
echo "&nbsp;<div style= \"border: 0px solid #fff; padding: 0px; margin: 0px; height: 5px\"><a href=\"club.php?clubid=",$userjid,"\">",$username,"</a> (",$country,")";
if ($suport==1) {echo "&nbsp;";}
if ($frendly==0 AND $asem==0) {echo "<img src=\"img/frendly.gif\" border=\"0\" title=\"Team is free to play a friendly match\" alt=\"",strtolower($langmark320),"\" height=\"12\">";}
if ($suport==1) {echo "<a href=\"supporter.php\"><img src=\"img/bsupn.png\" border=\"0\" alt=\"",strtolower($langmark1222),"\" title=\"",$langmark317,"\" style= \"border: 0px solid #fff; padding: 0px; margin: 0px; height: 11px; width: 11px;\"></a>&nbsp;";}
echo "</div>";
$n++;
}
?>
<br/>
</td>
<td class="border" width="45%" valign="top" bgcolor="#ffffff">

<table width="100%" cellspacing="1" cellpadding="2">
<tr><td width="50%"><h2><?=$langmark1046?></h2><br/>
<?php
if (!$defcountry) {$queryy = mysql_query("SELECT idigralca, imepriimek, pozicija FROM topplayers WHERE pozicija=1 ORDER BY `order` DESC LIMIT 5");} else {$queryy = mysql_query("SELECT idigralca, imepriimek, pozicija FROM topplayers WHERE pozicija=1 AND country LIKE '$country' ORDER BY `order` DESC LIMIT 5");}
while ($qy = mysql_fetch_array($queryy)) {
$idigralca = $qy['idigralca'];
$imepriimek = $qy['imepriimek'];
$no=$no+1;
echo $no,". <a href=\"player.php?playerid=",$idigralca,"\">",$imepriimek,"</a><br/>";}
?>
</td><td width="50%"><h2><?=$langmark1047?></h2><br/>
<?php
if (!$defcountry) {$queryy = mysql_query("SELECT idigralca, imepriimek, pozicija FROM topplayers WHERE pozicija=2 ORDER BY `order` DESC LIMIT 5");} else {$queryy = mysql_query("SELECT idigralca, imepriimek, pozicija FROM topplayers WHERE pozicija=2 AND country LIKE '$country' ORDER BY `order` DESC LIMIT 5");}
while ($qy = mysql_fetch_array($queryy)) {
$idigralca = $qy['idigralca'];
$imepriimek = $qy['imepriimek'];
$na=$na+1;
echo $na,". <a href=\"player.php?playerid=",$idigralca,"\">",$imepriimek,"</a><br/>";}
?>
</td></tr><tr><td width="50%"><br/><h2><?=$langmark1048?></h2><br/>
<?php
if (!$defcountry) {$queryy = mysql_query("SELECT idigralca, imepriimek, pozicija FROM topplayers WHERE pozicija=3 ORDER BY `order` DESC LIMIT 5");} else {$queryy = mysql_query("SELECT idigralca, imepriimek, pozicija FROM topplayers WHERE pozicija=3 AND country LIKE '$country' ORDER BY `order` DESC LIMIT 5");}
while ($qy = mysql_fetch_array($queryy)) {
$idigralca = $qy['idigralca'];
$imepriimek = $qy['imepriimek'];
$nr=$nr+1;
echo $nr,". <a href=\"player.php?playerid=",$idigralca,"\">",$imepriimek,"</a><br/>";}
?>
</td><td width="50%"><br/><h2><?=$langmark1049?></h2><br/>
<?php
if (!$defcountry) {$queryy = mysql_query("SELECT idigralca, imepriimek, pozicija FROM topplayers WHERE pozicija=4 ORDER BY `order` DESC LIMIT 5");} else {$queryy = mysql_query("SELECT idigralca, imepriimek, pozicija FROM topplayers WHERE pozicija=4 AND country LIKE '$country' ORDER BY `order` DESC LIMIT 5");}
while ($qy = mysql_fetch_array($queryy)) {
$idigralca = $qy['idigralca'];
$imepriimek = $qy['imepriimek'];
$nu=$nu+1;
echo $nu,". <a href=\"player.php?playerid=",$idigralca,"\">",$imepriimek,"</a><br/>";}
?>
</td></tr><tr><td width="50%"><br/><h2><?=$langmark1050?></h2><br/>
<?php
if (!$defcountry) {$queryy = mysql_query("SELECT idigralca, imepriimek, pozicija FROM topplayers WHERE pozicija=5 ORDER BY `order` DESC LIMIT 5");} else {$queryy = mysql_query("SELECT idigralca, imepriimek, pozicija FROM topplayers WHERE pozicija=5 AND country LIKE '$country' ORDER BY `order` DESC LIMIT 5");}
while ($qy = mysql_fetch_array($queryy)) {
$idigralca = $qy['idigralca'];
$imepriimek = $qy['imepriimek'];
$ne=$ne+1;
echo $ne,". <a href=\"player.php?playerid=",$idigralca,"\">",$imepriimek,"</a><br/>";}
?>
</td><td width="50%"><br/><h2><?=$langmark1051?></h2><br/>
<?php
if (!$defcountry) {$queryy = mysql_query("SELECT idigralca, imepriimek, pozicija FROM topplayers WHERE pozicija=6 ORDER BY `order` DESC LIMIT 5");} else {$queryy = mysql_query("SELECT idigralca, imepriimek, pozicija FROM topplayers WHERE pozicija=6 AND country LIKE '$country' ORDER BY `order` DESC LIMIT 5");}
while ($qy = mysql_fetch_array($queryy)) {
$idigralca = $qy['idigralca'];
$imepriimek = $qy['imepriimek'];
$nn=$nn+1;
echo "<nobr>",$nn,". <a href=\"player.php?playerid=",$idigralca,"\">",$imepriimek,"</a></nobr><br/>";}
?>
</td></tr></table>

<br/><h2><?=$langmark1052?></h2>
<i><?=$langmark1053?></i>
<br/><a href="http://www.omgn.com/topgames/vote.php?Game_ID=1223" target="_blank">omgn.com</a>
<br/><a href="http://theogn.com/gamedata.php?gameid=3155" target="_blank">theogn.com</a>
<br/><a href="http://www.gtop100.com/in.php?site=75559" target="_blank">gtop100.com</a>
<br/><a href="http://www.worldonlinegames.com/game/sports/1006/basketsim.aspx" target="_blank">worldonlinegames.com</a>
<!--<br/><a href="http://bgs.gdynamite.de/games_2713.html" target="_blank">gdynamite.de</a> ("Vote für dieses Spiel abgeben")-->
</td>
</tr>
</table>
</div>
</div>
</body>
</html>