<?php
$expandmenu1=99;
//if ($userid<>1) {die("Wildcards are coming soon!");}
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}
$compare = mysql_query("SELECT `userid`, `username`, `lang`, `supporter`, `expire` FROM `users` WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(include 'basketsim.php');
if (mysql_num_rows($compare)) {
$user = mysql_result ($compare,0,"userid");
$uname = mysql_result ($compare,0,"username");
$supp = mysql_result ($compare,0,"supporter");
$lang = mysql_result ($compare,0,"lang");
$exp = mysql_result ($compare,0,"expire");
}
else {die(include 'basketsim.php');}
$splitdatetime = explode(" ", $exp); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$zdajB = date("Y-m-d H:i:s", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday-7,$dbyear));
$days = (int)((mktime (0,0,0,$dbmonth,$dbday,$dbyear) - time(void))/86400);
$days = $days+1;

$for=$_GET['for'];
if ($for>0 AND $supp==1) {
$tral = mysql_query("SELECT club, last_active, bad_login FROM users WHERE userid=$for");
if (mysql_num_rows($tral)) {
$zaeki = mysql_result($tral,0,"club");
$ula = mysql_result($tral,0,"last_active");
$bad = mysql_result($tral,0,"bad_login");

if ($bad > 98) {header("Location: wildcards.php?err=clo"); die();}

$splitdatetime = explode(" ", $ula); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$expiretime = date("Y-m-d H:i:s", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday+20,$dbyear));
$timenow = date("Y-m-d H:i:s");
if ($timenow > $expiretime) {header("Location: wildcards.php?err=not"); die();}

mysql_query("INSERT INTO ekipe VALUES ('','$zaeki','3','0','0','0');");
mysql_query("UPDATE users SET supporter=1, `expire`='2014-06-11 01:00:00' WHERE supporter=0 AND userid=$for LIMIT 1");
mysql_query("UPDATE users SET `expire`='$zdajB' WHERE supporter=1 AND userid=$user LIMIT 1");
mysql_query("INSERT INTO `messages` VALUES ('', $for, 0, 0, NOW(), '<b>Fair Play Cup</b>', 'Congratulations, you have just received a WildCard to play in the Fair Play Cup this season and 7 days of supportership with it. WildCard was sent to you by <b>$uname</b>!<br/><br/>Enjoy your Fair Play Cup experience, best of luck!<br/>admin');") or die(mysql_error());
mysql_query("INSERT INTO wildcards VALUES ('$user', '$uname', $default_season);");
header("Location: wildcards.php?err=ok");
}
}
require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>
<div id="main">
<h2>FAIR PLAY CUP WILDCARDS</h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="100%" colspan="2">
<b><font color="darkred">Thanks to everyone for sending out the invitations!</font></b><br/>
<b>All available WildCards for season 21 have been used!</b>
</td></tr></table>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="60%">
<i><a href="fairplaycup.php">Fair Play Cup</a> is an international competition which comes with 19 seasons - 7 years of tradition! Over 1000 teams from around the globe compete against each other, first in group round and later head-to-head, to determine the winner. All Basketsim supporters are included in the cup, while others can enter if they receive a WildCard!</i><br/>
<?php if ($supp==1 AND $days > 13) {
if (isset($_POST['submit'])) {
$err='nouser';
$usern = $_POST['usern']; $usern=strip_tags($usern); $usern=str_replace(" ","",$usern); $usern=str_replace(" ","",$usern); $usern=addslashes($usern);
$teami = $_POST['teami'];
if (is_numeric($teami)) {
$klubus = mysql_query("SELECT userid, username FROM users WHERE club=$teami LIMIT 1");
if (mysql_num_rows($klubus)) {$zausera=mysql_result($klubus,0,"userid"); $usern=mysql_result($klubus,0,"username"); $err='';}
}
if ($err=='nouser') {
$userus = mysql_query("SELECT userid, club FROM users WHERE username='$usern' LIMIT 1");
if (mysql_num_rows($userus)) {$zausera=mysql_result($userus,0,"userid"); $teami=mysql_result($userus,0,"club"); $err='';}
}
if ($err<>'nouser') {
$lala = mysql_query("SELECT * FROM ekipe WHERE ekipa='$teami'") or die(mysql_error());
if (mysql_num_rows($lala)) {$err='unav';} else {$signo='yes';}
}
}
if ($err<>'nouser' AND $err<>'unav') {$err=$_GET['err'];}
SWITCH ($err) {
CASE 'nouser': echo "<br/><font color=\"red\"><b>There is no such team/user. Please redefine your search.</b></font>"; break;
CASE 'unav': echo "<br/><font color=\"red\"><b>This team is already in the international cup!</b></font>"; break;
CASE 'not': echo "<br/><font color=\"red\"><b>This team was not active lately and cannot receive a WildCard.</b></font>"; break;
CASE 'clo': echo "<br/><font color=\"red\"><b>This team is currently closed and cannot receive a WildCard.</b></font>"; break;
CASE 'ok': echo "<br/><font color=\"green\"><b>Wildcard was sent successfully!</b></font>"; break;
}
?><br/><hr/>
<b>Send a WildCard to your friends, leaguemates, fellow countrymen or anyone else - by giving away 7 days of your supportership, which they will receive from you!</b><br/><br/>
<!--<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="margin: 0">-->
<b>Enter username here:</b>&nbsp;<input type="text" value="<?=stripslashes($usern)?>" name="usern" size="10" class="inputreg"><br/>
<b>Or Enter teamid here:</b>&nbsp;<input type="text" value="" name="teami" size="10" class="inputreg"><br/>
<input type="submit" value="Search for a team/user!" name="submit" class="buttonreg"><!--</form>-->
<?php
if ($signo=='yes') {echo "<br/><b>Send a WildCard to user <a href=\"club.php?clubid=",$zausera,"\">",stripslashes($usern),"</a>?<br/><a href=\"wildcards.php?for=",$zausera,"\">YES</a><br/><a href=\"wildcards.php\">NO</a></b>";}
?>
<hr/>
<?php
} elseif ($supp==1 AND $days < 15) {?>
<br/><br/><hr/><b>Send a WildCard to your friends, leaguemates, fellow countrymen or anyone else - by giving away 7 days of your supportership, which they will receive!</b><br/><br/><i>You need 15+ days of remaining supportership to send a WildCard.</i><hr/>
<?php
} else {?>
<br/><br/><hr/><b>Send a WildCard to your friends, leaguemates, fellow countrymen or anyone else - by giving away 7 days of your supportership, which they will receive!</b><br/><br/><i>You have to be supporter to be able to send a WildCard.</i><hr/>
<?php }?>
</td>
<td class="border" width="40%">
<?php if ($supp==1) {
echo "<b>You are a Basketsim supporter!</b><br/>";
if ($days > 14) {echo "<i>You are supporter for <u>",$days," more days</u>.</i>";} else {echo "<i>Your supportership expires in under 15 days.</i>";}
}
else {echo "You are currently not a <a href=\"supporter.php\">supporter</a>.";}
$stev = mysql_query("SELECT * FROM ekipe WHERE competition=3");
$stevD = mysql_num_rows($stev);
echo "<br/><br/><b>",1260-$stevD," wildcards are still available!</b><br/><i>",$stevD," teams were already confirmed to play.</i>";
//most wc
$a=$_GET['a'];
if ($a=='l') {$seza="season=$default_season-1";} elseif ($a=='a') {$seza="season>0";} else {$seza="season=$default_season";}
$hnoy = "SELECT `user`, `username`, COUNT(*) AS `no` FROM `wildcards` WHERE $seza GROUP BY(`user`) ORDER BY `no` DESC LIMIT 10";
$vrstn = mysql_query($hnoy);
if (mysql_num_rows($vrstn)) {echo "<br/><br/><h2>Users who gave out most wildcards</h2>";}
while($r=mysql_fetch_array($vrstn)) {
$tuser=$r["user"];
$tusern=$r["username"];
$topno=$r["no"];
echo "<br/><b>",$topno,"</b> - <a href=\"club.php?clubid=",$tuser,"\">",stripslashes($tusern),"</a>";
}
if ($a=='a') {echo "<br/><br/>[<a href=\"wildcards.php?a=l\">Last season top 10</a>] [<a href=\"wildcards.php\">Current season top</a>]";}
elseif ($a=='l') {echo "<br/><br/>[<a href=\"wildcards.php\">Current season top</a>] [<a href=\"wildcards.php?a=a\">All time best</a>]";}
else {echo "<br/><br/>[<a href=\"wildcards.php?a=l\">Last season top 10</a>] [<a href=\"wildcards.php?a=a\">All time best</a>]";}
?>
</td>
</tr>
</table>
</div>
</div>
</body>
</html>