<?php
//these two are addon to rankings to make sure they are not to negative for the worst teams
$dodatekN=100;
$dodatekU=100;

//unset cookie
setcookie("userid", "", time()-3600, "/", ".basketsim.com", 0);
setcookie("geslo", "", time()-3600, "/", ".basketsim.com", 0);
setcookie("ligaa", "", time()-3600, "/", ".basketsim.com", 0);
setcookie("ligal", "", time()-3600, "/", ".basketsim.com", 0);
setcookie("ligan", "", time()-3600, "/", ".basketsim.com", 0);
setcookie("ligas", "", time()-3600, "/", ".basketsim.com", 0);
setcookie("ligap", "", time()-3600, "/", ".basketsim.com", 0);
if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
}
require("inc/lang/en.php");
include_once('inc/basic.php');
?>
<h2><?=$langmark542?> - online since 2006!</h2>
<?php
include_once('inc/config.php');
?>
<table border="0" cellspacing="6" cellpadding="3" width="100%">
<tr>
<td width="60%">
<?php
$n=$_GET['n'];
if ($n==1) {echo "<table border=\"0\" cellspacing=\"5\" cellpadding=\"5\"><tr bgcolor=\"#ffffff\"><td class=\"border\"><font color=\"darkred\"><b>Wrong login name or password!</b></font></td></tr></table><hr/>";}
elseif ($n==2) {echo "<table border=\"0\" cellspacing=\"5\" cellpadding=\"5\"><tr bgcolor=\"#ffffff\"><td class=\"border\"><font color=\"darkred\"><b>Your account was temporary closed due to high amount of false login attempts. Send a short notice to <a href=\"contact.php\">contact form</a> for help!</b></font></td></tr></table><hr/>";} elseif ($n==12) {echo "<table border=\"0\" cellspacing=\"5\" cellpadding=\"5\"><tr bgcolor=\"#ffffff\"><td class=\"border\"><font color=\"#009900\"><b>You are now logged out. Thank you for playing Basketsim!</font></td></tr></table><hr/>";} elseif ($n==45) {echo "<table border=\"0\" cellspacing=\"5\" cellpadding=\"5\"><tr bgcolor=\"#ffffff\"><td class=\"border\"><font color=\"darkred\"><b>Your account was closed due to abuse or cheating. To argue this decision use the <a href=\"contact.php\">contact form</a>. However, in case of bad cheating you may not receive an answer.</b></font></td></tr></table><hr/>";} else {?><!--<a href="join.php"><img src="img/cooltext648304480.png" onmouseover="this.src='img/cooltext648304480MouseOver.png';" onmouseout="this.src='img/cooltext648304480.png';" height="32" border="0" /></a><br/><br/>--><?php }?>
<b>Basketsim <?=$langmark544?>!</b><br/><br/><b><?=$langmark1436?></b><br/><br/><b><?=$langmark1437?><br/><br/><?=$langmark549?>!</b><br/><br/>
<a href="join.php"><img src="img/cooltext648306028.png" onmouseover="this.src='img/cooltext648306028MouseOver.png';" onmouseout="this.src='img/cooltext648306028.png';" height="32" border="0" /></a></td>
</td><td width="40%">
<table cellspacing="0" cellpadding="0" border="0"><tr><td><img src="img/BSLS_light.png" alt="Basketsim" border="0" width="230"></td></tr></table>
</td>
</tr>
</table>
<table border="0" cellspacing="0" cellpadding="0" width="70%">
<tr><td align="center"><hr/><img src="img/tfl.gif" border="0" title="Basketsim countries"><hr/></td></tr>
</table>
<table border="0" cellspacing="3" cellpadding="3" width="70%">
<tr bgcolor="#ffffff">
<td class="border" width="104" valign="top">
<h2><?=$langmark1335?></h2>
<table cellspacing="0" cellpadding="0" border="0"><br/>
<?php
$countries = mysql_query("SELECT country, 500 * totalwin / ( 2 * totallose + totalwin ) + ( totaldifference +250 ) / 2.5 +150 + ( totallose + totalwin -50 ) *3 AS rating FROM countries  WHERE natarena >0 ORDER BY 500 * totalwin / ( 2 * totallose + totalwin ) + ( totaldifference +250 ) / 2.5 +150 + ( totallose + totalwin -50 ) *3 DESC LIMIT 15");
$c = 0;
while ($c < mysql_num_rows($countries)) {
$country1 = mysql_result($countries,$c,"country");
$rating1 = mysql_result($countries,$c,"rating");
echo "<tr><td align=\"right\">",($c+1),".&nbsp;&nbsp;&nbsp;<a href=\"nationalteams.php?country=",$country1,"\"><img src=\"img/Flags/",$country1,".png\" border=\"0\" alt=\"",$country1,"\" title=\"",$country1,"\"></a></td><td align=\"right\">&nbsp;&nbsp;&nbsp;&nbsp;",round($rating1+$dodatekN),"</td></tr>";
$c++;
}
?>
</table>
</td>
<td class="border" width="104" valign="top">
<h2>U19 rankings</h2>
<table cellspacing="0" cellpadding="0" border="0"><br/>
<?php
$countries = mysql_query("SELECT country, 500 * totalwin / ( 2 * totallose + totalwin ) + ( totaldifference +250 ) / 2.5 +150 + ( totallose + totalwin -50 ) *3 AS rating FROM u18countries  WHERE natarena >0 ORDER BY 500 * totalwin / ( 2 * totallose + totalwin ) + ( totaldifference +250 ) / 2.5 +150 + ( totallose + totalwin -50 ) *3 DESC LIMIT 15");
$c = 0;
while ($c < mysql_num_rows($countries)) {
$country1 = mysql_result($countries,$c,"country");
$rating1 = mysql_result($countries,$c,"rating");
echo "<tr><td align=\"right\">",($c+1),".&nbsp;&nbsp;&nbsp;<a href=\"u18teams.php?country=",$country1,"\"><img src=\"img/Flags/",$country1,".png\" border=\"0\" alt=\"",$country1,"\" title=\"",$country1,"\"></a></td><td align=\"right\">&nbsp;&nbsp;&nbsp;&nbsp;",round($rating1+$dodatekU),"</td></tr>";
$c++;
}
?>
</table>
</td>
<td class="border" width="216" valign="top">
<?php
/*
- nič
- index
- array + index
*/
$order = mysql_query("SELECT name, country, conwins FROM teams WHERE status=1 ORDER BY conwins DESC, cupstatus DESC LIMIT 15") or die(mysql_error());
echo "<h2>Most matches won in a row</h2><br/><table cellspacing=\"0\" cellpadding=\"0\">";
while ($v = mysql_fetch_array($order)) {
$no=$no+1;
$dod = $v[name];
if ($dod=='The Crazy Max And Pink SexBunny') {$dod='Bunnies';}
//if ($dod=='DupsenBaazenDirsenMahenYoYuNoLaLa') {$dod='DBDMYYNLL';}
//if ($dod=='Silver Millenium Tuxedo Masks') {$dod='Tuxedo Masks';}
//if ($dod=='SIDEN POLSKI CUKIER TORUŃ') {$dod='Siden PC TORUŃ';}
//if ($dod=='Real Grupo de Cultura Covadonga') {$dod='Grupo Covadonga';}
$cou = $v[country];
echo "<tr><td align=\"left\" width=\"95%\"><img src=\"img/Flags/",$cou,".png\" border=\"0\" alt=\"",$cou,"\" title=\"",$cou,"\"> ",$no,". ",stripslashes($dod),"</td><td align=\"right\" width=\"5%\">&nbsp;",$v[conwins],"&nbsp;&nbsp;</td></tr>";
}
echo "</table>";
?>
</td>
</tr>
<tr>
<td></td>
<td><div id="footer" style="text-align:right"> <a href="privacy.php"> Privacy Policy</a> </div></td>
</tr>
</table>
</div>
</div>
<!--
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-1191958-1";
urchinTracker();
</script>
-->
</body>
</html>