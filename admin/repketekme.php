<?php
/*
BE CAREFUL ABOUT THE CHANGE OF TABLE NAME WHEN IT COMES TO BONUS POINTS
IN CASE OF ERROR WHEN RUNNING THE SCRIPT, DATA IS NOT STORED IN FORM - FIX!
in output:
- if the game is final warning about adding new dates to nt dates table
- code to be added to nationalteams.php or u18teams.php to display fixtures could be perhaps added to input also
- automatic addon of bonuses
- even before output it would be helpful to see the WC arenas displayed, because they are as speaking being picked by hand
*/

include_once("common.php");
checklogin();
?>

<html>
<head>
<title>Admin - basketsim</title>
</head>
<body bgcolor="#BCCDCC">
<?php
//in query should be host country, in the future implenment the display of arenas, rather than just query
$qquery = "SELECT * FROM `arena` , teams WHERE arena.`teamid` = teams.teamid AND teams.country = 'Indonesia' AND `cheer_logo` <> '' AND `seats3` > `seats1` AND STATUS =1 ORDER BY seats1 + seats2 + seats3 + seats4 DESC LIMIT 100";
echo $qquery,"<br/><hr/>";
?>
<table width="76%" border="1" align="center" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
<tr> 
<td width="100%" bgcolor="#CCCCCC"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
<form name="obrazec" method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="margin: 0">
<input type="text" maxlength="20" size="30" name="time" value="201X-XX-XX 19:00:00">&nbsp;<input type="text" maxlength="30" size="30" name="hosts" value="HOST">
<hr/><select name="tip">
<option value="PR">Playoff round</option>
<option value="EF">Round of 16</option>
<option value="QF">Quarterfinal</option>
<option value="SF">Semifinal and 7th place</option>
<option value="GF">Final, 3rd place, 7th place</option>
</select>&nbsp;<select name="vrsta">
<option value="ST">national team</option>
<option value="YT">youth national team</option>
</select>
<hr/>
<input type="text" maxlength="30" size="20" name="countrya1" value="">&nbsp;<b>VS</b>&nbsp;<input type="text" maxlength="30" size="20" name="countrya2" value="">&nbsp;<b>in</b>&nbsp;<input type="text" maxlength="10" size="10" name="arena1" value=""> arena (teamid!)
<br/><input type="text" maxlength="30" size="20" name="countryb1" value="">&nbsp;<b>VS</b>&nbsp;<input type="text" maxlength="30" size="20" name="countryb2" value="">&nbsp;<b>in</b>&nbsp;<input type="text" maxlength="10" size="10" name="arena2" value=""> arena (teamid!)
<br/><input type="text" maxlength="30" size="20" name="countryc1" value="">&nbsp;<b>VS</b>&nbsp;<input type="text" maxlength="30" size="20" name="countryc2" value="">&nbsp;<b>in</b>&nbsp;<input type="text" maxlength="10" size="10" name="arena3" value=""> arena (teamid!)
<br/><input type="text" maxlength="30" size="20" name="countryd1" value="">&nbsp;<b>VS</b>&nbsp;<input type="text" maxlength="30" size="20" name="countryd2" value="">&nbsp;<b>in</b>&nbsp;<input type="text" maxlength="10" size="10" name="arena4" value=""> arena (teamid!)
<br/><input type="text" maxlength="30" size="20" name="countrye1" value="">&nbsp;<b>VS</b>&nbsp;<input type="text" maxlength="30" size="20" name="countrye2" value="">&nbsp;<b>in</b>&nbsp;<input type="text" maxlength="10" size="10" name="arena5" value=""> arena (teamid!)
<br/><input type="text" maxlength="30" size="20" name="countryf1" value="">&nbsp;<b>VS</b>&nbsp;<input type="text" maxlength="30" size="20" name="countryf2" value="">&nbsp;<b>in</b>&nbsp;<input type="text" maxlength="10" size="10" name="arena6" value=""> arena (teamid!)
<br/><input type="text" maxlength="30" size="20" name="countryg1" value="">&nbsp;<b>VS</b>&nbsp;<input type="text" maxlength="30" size="20" name="countryg2" value="">&nbsp;<b>in</b>&nbsp;<input type="text" maxlength="10" size="10" name="arena7" value=""> arena (teamid!)
<br/><input type="text" maxlength="30" size="20" name="countryh1" value="">&nbsp;<b>VS</b>&nbsp;<input type="text" maxlength="30" size="20" name="countryh2" value="">&nbsp;<b>in</b>&nbsp;<input type="text" maxlength="10" size="10" name="arena8" value=""> arena (teamid!)
<hr/><select name="bonusi">
<option value="1">add bonuses automatically</option>
<option value="2">do not add bonuses - print warning instead</option>
</select><hr/><input type="submit" name="submit" value="Create the matches"></form>
</font></td>
</tr>
</table>
<?php
if (isset($_POST['submit'])) { 
$time = $_POST['time'];
$vrsta = $_POST['vrsta'];
$tip = $_POST['tip'];
$hosts = $_POST['hosts'];
$bonusi = $_POST['bonusi'];
$countrya1 = $_POST['countrya1'];
$countrya2 = $_POST['countrya2'];
$countryb1 = $_POST['countryb1'];
$countryb2 = $_POST['countryb2'];
$countryc1 = $_POST['countryc1'];
$countryc2 = $_POST['countryc2'];
$countryd1 = $_POST['countryd1'];
$countryd2 = $_POST['countryd2'];
$countrye1 = $_POST['countrye1'];
$countrye2 = $_POST['countrye2'];
$countryf1 = $_POST['countryf1'];
$countryf2 = $_POST['countryf2'];
$countryg1 = $_POST['countryg1'];
$countryg2 = $_POST['countryg2'];
$countryh1 = $_POST['countryh1'];
$countryh2 = $_POST['countryh2'];

if ($vrsta=='ST') {$tipec=4;} elseif ($vrsta=='YT') {$tipec=14;} else {die("WRONG TYPE!");}

mysql_query("INSERT INTO nt_matches VALUES ('', 0, '$countrya1', 0, '$countrya2', $arena1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$time', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$hosts', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99, $suzona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', 0, '$countryb1', 0, '$countryb2', $arena2, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$time', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$hosts', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99, $suzona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', 0, '$countryc1', 0, '$countryc2', $arena3, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$time', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$hosts', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99, $suzona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
if ($tip=='EF' OR $tip=='QF' OR $tip=='PR') {
mysql_query("INSERT INTO nt_matches VALUES ('', 0, '$countryd1', 0, '$countryd2', $arena4, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$time', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$hosts', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99, $suzona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
}
if ($tip=='EF' OR $tip=='PR') {
mysql_query("INSERT INTO nt_matches VALUES ('', 0, '$countrye1', 0, '$countrye2', $arena5, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$time', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$hosts', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99, $suzona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', 0, '$countryf1', 0, '$countryf2', $arena6, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$time', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$hosts', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99, $suzona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', 0, '$countryg1', 0, '$countryg2', $arena7, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$time', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$hosts', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99, $suzona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("INSERT INTO nt_matches VALUES ('', 0, '$countryh1', 0, '$countryh2', $arena8, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$time', $tipec, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$hosts', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99, $suzona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
}
//BONUS POINTS
//switching between countries and u18countries table
//always adjust!
if ($bonusi==1 AND strlen($countrya1)>1) {mysql_query("UPDATE u18countries SET totalwin=totalwin+1 WHERE country='$countrya1'"); echo $countrya1," have received 1 bonus point<br/>";}
if ($bonusi==1 AND strlen($countrya2)>1) {mysql_query("UPDATE u18countries SET totalwin=totalwin+1 WHERE country='$countrya2'"); echo $countrya2," have received 1 bonus point<br/>";}
if ($bonusi==1 AND strlen($countryb1)>1) {mysql_query("UPDATE u18countries SET totalwin=totalwin+1 WHERE country='$countryb1'"); echo $countryb1," have received 1 bonus point<br/>";}
if ($bonusi==1 AND strlen($countryb2)>1) {mysql_query("UPDATE u18countries SET totalwin=totalwin+1 WHERE country='$countryb2'"); echo $countryb2," have received 1 bonus point<br/>";}
if ($bonusi==1 AND strlen($countryc1)>1) {mysql_query("UPDATE u18countries SET totalwin=totalwin+1 WHERE country='$countryc1'"); echo $countryc1," have received 1 bonus point<br/>";}
if ($bonusi==1 AND strlen($countryc2)>1) {mysql_query("UPDATE u18countries SET totalwin=totalwin+1 WHERE country='$countryc2'"); echo $countryc2," have received 1 bonus point<br/>";}
if ($bonusi==1 AND strlen($countryd1)>1) {mysql_query("UPDATE u18countries SET totalwin=totalwin+1 WHERE country='$countryd1'"); echo $countryd1," have received 1 bonus point<br/>";}
if ($bonusi==1 AND strlen($countryd2)>1) {mysql_query("UPDATE u18countries SET totalwin=totalwin+1 WHERE country='$countryd2'"); echo $countryd2," have received 1 bonus point<br/>";}
if ($bonusi==1 AND strlen($countrye1)>1) {mysql_query("UPDATE u18countries SET totalwin=totalwin+1 WHERE country='$countrye1'"); echo $countrye1," have received 1 bonus point<br/>";}
if ($bonusi==1 AND strlen($countrye2)>1) {mysql_query("UPDATE u18countries SET totalwin=totalwin+1 WHERE country='$countrye2'"); echo $countrye2," have received 1 bonus point<br/>";}
if ($bonusi==1 AND strlen($countryf1)>1) {mysql_query("UPDATE u18countries SET totalwin=totalwin+1 WHERE country='$countryf1'"); echo $countryf1," have received 1 bonus point<br/>";}
if ($bonusi==1 AND strlen($countryf2)>1) {mysql_query("UPDATE u18countries SET totalwin=totalwin+1 WHERE country='$countryf2'"); echo $countryf2," have received 1 bonus point<br/>";}
if ($bonusi==1 AND strlen($countryg1)>1) {mysql_query("UPDATE u18countries SET totalwin=totalwin+1 WHERE country='$countryg1'"); echo $countryg1," have received 1 bonus point<br/>";}
if ($bonusi==1 AND strlen($countryg2)>1) {mysql_query("UPDATE u18countries SET totalwin=totalwin+1 WHERE country='$countryg2'"); echo $countryg2," have received 1 bonus point<br/>";}
if ($bonusi==1 AND strlen($countryh1)>1) {mysql_query("UPDATE u18countries SET totalwin=totalwin+1 WHERE country='$countryh1'"); echo $countryh1," have received 1 bonus point<br/>";}
if ($bonusi==1 AND strlen($countryh2)>1) {mysql_query("UPDATE u18countries SET totalwin=totalwin+1 WHERE country='$countryh2'"); echo $countryh2," have received 1 bonus point<br/>";}

//NEW DATE IS AUTOMATICALLY ADDED
mysql_query("INSERT INTO `nt_frendly dates` VALUES ('$time');") or die(mysql_error());

//update for country ID, no need to switch table, it's the same, so leave it as it is
mysql_query("UPDATE nt_matches, countries SET home_id=`countryid` WHERE `home_name`=countries.`country` AND home_id=0") or die(mysql_error());
mysql_query("UPDATE nt_matches, countries SET away_id=`countryid` WHERE `away_name`=countries.`country` AND away_id=0") or die(mysql_error());
echo "<hr/>ALL GOOD!";
}
?>
</body>
</html>