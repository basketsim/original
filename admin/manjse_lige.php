$a=0;
$countr='Croatia';
$seson=22;
$ulev=4; //higher league level
$dlev=3; //lower league level
$drava = mysql_query("SELECT users.club AS ekipa1, competition.leagueid AS liga1, userid FROM leagues, competition, users WHERE competition.leagueid = leagues.leagueid AND competition.teamid = users.club AND leagues.level =$ulev AND season =$seson AND leagues.country = '$countr' ORDER BY strength DESC") or die(mysql_error());
while ($mc = mysql_fetch_array($drava)) {
$ekipa1 = $mc[ekipa1];
$liga1 = $mc[liga1];
$usermsg = $mc[userid];

//poiščem bot ekipo, ki pade ven
//$bolha = mysql_query("SELECT teams.teamid AS ekipa2, competition.leagueid AS liga2 FROM leagues, competition, teams WHERE competition.leagueid = leagues.leagueid AND competition.teamid = teams.teamid AND teams.status =3 AND leagues.level =$dlev AND season =$seson AND leagues.country = '$countr' AND teams.name LIKE 'Bot team no.%' ORDER BY strength ASC") or die(mysql_error());
$bolha = mysql_query("SELECT teams.teamid AS ekipa2, competition.leagueid AS liga2 FROM leagues, competition, teams WHERE competition.leagueid = leagues.leagueid AND competition.teamid = teams.teamid AND teams.status =3 AND leagues.level =$dlev AND season =$seson AND leagues.country = '$countr' ORDER BY strength ASC") or die(mysql_error());
$ekipa2 = mysql_result($bolha,$a,"ekipa2");
$liga2 = mysql_result($bolha,$a,"liga2");

echo $ekipa1," iz ",$liga1," zamenja ",$ekipa2," v ",$liga2,"<br/>";

//update obeh ekip
mysql_query("UPDATE competition SET leagueid=$liga2 WHERE teamid=$ekipa1 AND season=$seson") or die(mysql_error());
mysql_query("UPDATE competition SET leagueid=$liga1 WHERE teamid=$ekipa2 AND season=$seson") or die(mysql_error());

//msg userju in na liga forum
mysql_query("INSERT INTO messages VALUES ('', $usermsg, 0, 0, NOW(), '<b>League switch</b>', 'Since the lower tier of leagues in your country have become inactive, your team was moved to a higher league. The purpose behind league changes is to improve the general state of your country leagues, making them even better: more competitive and more enjoyable!<br/><br/>Best regards and best of luck in the new season!<br/>admin')") or die(mysql_error());
$lulc = "INSERT INTO `lb_comments` (username, type, league, time, content) VALUES ('league_manager', 4, $liga2, NOW(), 'Due to league restructuring in your country, a new club has joined the league from the bottom tier.');";
mysql_query($lulc) or die(mysql_error());
}
mysql_query("UPDATE `leagues` SET active=0 WHERE `country`='$countr' AND `level` =$ulev") or die(mysql_error());
//*SELECT `teamid` , `curname` , `season` , `position` , `played` , `win` , `lose` , `for_` , `against` , `difference` , `lastpos` , `prank` FROM competition, leagues WHERE competition.leagueid = leagues.leagueid AND season =19 AND `level` =5 AND `country` = 'Italy' LIMIT 0 , 90*
die("_________");