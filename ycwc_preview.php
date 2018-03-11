<?php
$expandmenu1=99;
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}
$compare = mysql_query("SELECT club, lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(include 'basketsim.php');
if (mysql_num_rows($compare)) {
$trueclub = mysql_result($compare,0,"club");
$lang = mysql_result ($compare,0,"lang");
}
else {die(include 'basketsim.php');}
require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>
<div id="main">
<h2>YOUTH CLUB WORLD CUP PREVIEW</h2>
<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="51%">
<?php
$drzve = mysql_query("SELECT DISTINCT `country` FROM `regions` order by country asc limit 64") or die(mysql_error());
$grz = mysql_num_rows($drzve);
$d=0;
while ($d < $grz) {
$clubus=NULL;
$country = mysql_result($drzve,$d);
if ($country=='Bosnia') {echo "<a name=\"Bosnia\"></a><h2>Bosnia and Herzegovina</h2>"; $kluk=0;} else {echo "<a name=\"",$country,"\"></a><h2>",$country,"</h2>"; $kluk=0;}
$kul = mysql_query("SELECT userid, teams.name as name, sum(handling + speed + passing + vision + rebounds + position + freethrow + shooting + defense) as sumarum, avg(age) as aag FROM `players`, users, teams WHERE teams.country = '$country' AND players.club = users.club AND coach=9 AND bad_login < 99 and teams.teamid=users.club GROUP BY players.club ORDER BY sumarum DESC LIMIT 10") or die(mysql_error());
while ($pin = mysql_fetch_array($kul)) {
$userid = $pin['userid'];
$tname = $pin['name'];
$sumar = $pin['sumarum'];
$aage = $pin['aag'];
if ($kluk<2 AND round($sumar) > 0) {echo "<span class=\"alignleft\" style=\"background-color: lightblue;\">",round($sumar)," <a href=\"playerslist.php?clubid=",$userid,"\" class=\"greenhilite\">",stripslashes($tname),"</a></span><span class=\"alignright\">".number_format($aage,1)."</span><br/>";}
else {echo "<span class=\"alignleft\">",round($sumar)," <a href=\"playerslist.php?clubid=",$userid,"\" class=\"greenhilite\">",stripslashes($tname),"</a></span><span class=\"alignright\">".number_format($aage,1)."</span><br/>";}
$kluk++;
}
$d++;
if ($grz > $d) {echo "<br/>";}
}
?>
</td><td class="border" width="49%">
<?php
$ich = mysql_query("SELECT sum(handling + speed + passing + vision + rebounds + position + freethrow + shooting + defense) as sumarum FROM `players` WHERE coach=9 AND club=$trueclub") or die(mysql_error());
if (mysql_num_rows($ich)) {$glow = mysql_result($ich,0);
if ($glow > 0) {echo "<b>Your points</b> ".round($glow)." <a href=\"ycwc_preview.php&#35;".$drza."\"><img src=\"img/Flags/",$drza,".png\" border=\"0\" alt=\"",$drza,"\" title=\"",$drza,"\"></a><hr/><br/>";}
}
?>
<b>Youth Club World Cup (YCWC)</b> take place in the final week of every Basketsim season with dynamic format of matches being played daily, from round 1 to the final.
<br/><br/>
On the left, you can see a preview which clubs are <font style="background-color: lightblue;"><b>likely</b></font> to feature in this season's competition. Participants are determined based on total skill level of their youth players.
<br/><br/>
Top 2 youth teams from every country <b>can</b> qualify for the Cup - that's maximum of 128 teams, but based on rules (below) inactive teams are removed and their spots are given to best clubs with supporter outside of 128.
<br/><br/>
3 rules for teams to keep their country spots:<br/>- youth teams with less than 8 players are excluded,
<br/>- teams with <b>managers not active in last 7 days before the draw are replaced with active ones</b>,
<br/>- to ensure that only active teams are playing, <b>2 wins</b> from youth friendly games in the season are needed.
<br/><br/>
You can improve your position by keeping players in your YT for extended period, especially when they are 17.
<br/><br/>
Check the <a href="ycwc.php">latest YCWC edition</a>!
<?php if ($glow > 0) {echo "<br/><br/><hr/>";}?>
</td>
</tr>
</table>
</div>
</div>
</body>
</html>