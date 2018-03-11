<?php
//BE CAREFUL THAT FPC WINNER WASN'T 3RD PLACED IN THE LEAGUE

$sezona=22; //curent season - adjust value, then run sections 1, 2, 3

$stara=$sezona-1;
ini_set("max_execution_time",2300);
include_once("common.php");

/*
//run this section first, it will make sure that CS contestants are determined, but won't determine CWS contestants completely

mysql_query("TRUNCATE TABLE `ekipe`") or die(mysql_error());
//vnesem prvake in podprvake lig
$dve = mysql_query("SELECT club FROM competition, users, leagues WHERE teamid=club AND competition.leagueid=leagues.leagueid AND leagues.level=1 AND season=$stara AND position<3") or die(mysql_error());
while ($b= mysql_fetch_array($dve)) {$team = $b['club']; mysql_query("INSERT INTO ekipe VALUES ('', $team, 1, 0, 0, 0)") or die(mysql_error());}
//dodam prvaka FPC če že ni not
$ena = mysql_query("SELECT h_teamid FROM history WHERE h_type=5 AND h_season='$stara' AND won=1") or die(mysql_error());
while ($a= mysql_fetch_array($ena))
{
$team1 = $a['h_teamid']; $stiri = mysql_query("SELECT * FROM ekipe WHERE ekipa ='$team1'");
if (!mysql_num_rows($stiri)) {mysql_query("INSERT INTO ekipe VALUES ('', $team1, 1, 0, 0, 0)") or die(mysql_error());}
}
//tretjeuvrščeni iz preostalih držav v CS
$tri = mysql_query("SELECT COUNT(id) FROM ekipe WHERE competition=1") or die(mysql_error());
while($c = mysql_fetch_array($tri)) {$stevilo1 = $c['COUNT(id)'];} $limit1 = 128-$stevilo1;
$devet = mysql_query("SELECT club FROM competition, users, leagues, countries WHERE teamid = club AND competition.leagueid = leagues.leagueid AND leagues.country = ALTCOUNTRY AND leagues.level =1 AND season =$stara AND position =3 ORDER BY INTRANK DESC LIMIT $limit1") or die(mysql_error());
while ($d= mysql_fetch_array($devet))
{
$team5 = $d['club'];
$deset = mysql_query("SELECT competition FROM ekipe WHERE ekipa ='$team5'");
if (!mysql_num_rows($deset)) {mysql_query("INSERT INTO ekipe VALUES ('', $team5, 1, 0, 0, 0)") or die(mysql_error());}
}
//cup winners into CWS
$sestnajst = mysql_query("SELECT ALTCOUNTRY FROM countries");
while ($j=mysql_fetch_array($sestnajst))
{
$drzava7=$j['ALTCOUNTRY'];
$sedemnajst = mysql_query("SELECT h_teamid FROM history, users WHERE userid = h_userid AND h_type =3 AND h_season =$stara AND `h_country`='$drzava7' ORDER BY achivement DESC LIMIT 1");
if (mysql_num_rows($sedemnajst)) {$ecws = mysql_result($sedemnajst,0,"h_teamid");
$dvajset = mysql_query("SELECT * FROM ekipe WHERE ekipa =$ecws");
if (!mysql_num_rows($dvajset)) {mysql_query("INSERT INTO ekipe VALUES ('', $ecws, 2, 0, 0, 0)") or die(mysql_error());} else {echo $drzava7," - <a href=\"../nationalcup.php?country=",$drzava7,"\">POLFINALE</a><br/>";}
}
}
//cup runners up into CWS
$sestnajst = mysql_query("SELECT ALTCOUNTRY FROM countries");
while ($j=mysql_fetch_array($sestnajst))
{
$drzava7=$j['ALTCOUNTRY'];
$sedemnajst = mysql_query("SELECT h_teamid FROM history, users WHERE userid = h_userid AND h_type =3 AND h_season =$stara AND `h_country`='$drzava7' ORDER BY achivement DESC LIMIT 1,1");
if (mysql_num_rows($sedemnajst)) {$ecws = mysql_result($sedemnajst,0,"h_teamid");
$dvajset = mysql_query("SELECT * FROM ekipe WHERE ekipa ='$ecws'");
if (!mysql_num_rows($dvajset)) {mysql_query("INSERT INTO ekipe VALUES ('', $ecws, 2, 0, 0, 0)") or die(mysql_error());} else {echo $drzava7," - <a href=\"../nationalcup.php?country=",$drzava7,"\">POLFINALE</a><br/>";}
}
}
die("________CS_ZBRIŠEM_BOTTOM_8_______");

//end of section 1
*/


/*
//ODDS - run this sections 2nd, because 1st round draw is made based on quality (odds)

$piksl = mysql_query("SELECT ekipa, won FROM ekipe WHERE competition=1") or die(mysql_error());
$galava=mysql_num_rows($piksl);
while ($p = mysql_fetch_array($piksl)) {
$pwag0 = 0; $pwag1 = 0; $pwag2 = 0; $pwag3 = 0; $pwag4 = 0; $pwag5 = 0; $pwag6 = 0; $pwag7 = 0;
$grwa = $p[ekipa];
$wona = $p[won]*0.95;
$slava = mysql_query("SELECT wage FROM players WHERE coach=0 AND club=$grwa ORDER BY wage DESC") or die(mysql_error());
$pwag0 = @mysql_result($slava,0,"wage");
$pwag1 = @mysql_result($slava,1,"wage");
$pwag2 = @mysql_result($slava,2,"wage");
$pwag3 = @mysql_result($slava,3,"wage");
$pwag4 = @mysql_result($slava,4,"wage");
$pwag5 = @mysql_result($slava,5,"wage");
$pwag6 = @mysql_result($slava,6,"wage");
$pwag7 = @mysql_result($slava,7,"wage");
$knona=($pwag0+$pwag1+$pwag2+$pwag3+$pwag4/1.1+$pwag5/1.9+$pwag6/2+$pwag7/2.1)*($pwag0+$pwag1+$pwag2+$pwag3+$pwag4/1.1+$pwag5/1.9+$pwag6/2+$pwag7/2.1);
$knona=$knona/500000;
$odds=12800/($knona/100) * (sqrt($galava)/3 + 4.5);
$odds=$odds - $wona;
mysql_query("UPDATE ekipe SET odds=$odds WHERE competition=1 AND ekipa='$grwa' LIMIT 1") or die(mysql_error());
}
$piksl = mysql_query("SELECT ekipa, won FROM ekipe WHERE competition=2") or die(mysql_error());
$galava=mysql_num_rows($piksl);
while ($p = mysql_fetch_array($piksl)) {
$pwag0 = 0; $pwag1 = 0; $pwag2 = 0; $pwag3 = 0; $pwag4 = 0; $pwag5 = 0; $pwag6 = 0; $pwag7 = 0;
$grwa = $p[ekipa];
$wona = $p[won]*0.95;
$slava = mysql_query("SELECT wage FROM players WHERE coach=0 AND club=$grwa ORDER BY wage DESC") or die(mysql_error());
$pwag0 = @mysql_result($slava,0,"wage");
$pwag1 = @mysql_result($slava,1,"wage");
$pwag2 = @mysql_result($slava,2,"wage");
$pwag3 = @mysql_result($slava,3,"wage");
$pwag4 = @mysql_result($slava,4,"wage");
$pwag5 = @mysql_result($slava,5,"wage");
$pwag6 = @mysql_result($slava,6,"wage");
$pwag7 = @mysql_result($slava,7,"wage");
$knona=($pwag0+$pwag1+$pwag2+$pwag3+$pwag4/1.1+$pwag5/1.9+$pwag6/2+$pwag7/2.1)*($pwag0+$pwag1+$pwag2+$pwag3+$pwag4/1.1+$pwag5/1.9+$pwag6/2+$pwag7/2.1);
$knona=$knona/500000;
$odds=12800/($knona/100) * (sqrt($galava)/3 + 4.5);
$odds=$odds - $wona;
mysql_query("UPDATE ekipe SET odds=$odds WHERE competition=2 AND ekipa='$grwa' LIMIT 1") or die(mysql_error());
}
mysql_query("ALTER TABLE `ekipe` ORDER BY `odds` ASC") or die(mysql_error());
echo "_ODDSupdated";
die("__Ddd__");

//end of section 2
*/


/*
//draw - run this last

$comp=2; $type=7; //comp1type6, comp2type7 CHANGE DATES BELOW(WEEKS)
$round1=1; $day1 = '2015-03-12 18:30:00';
$round2=1; $day2 = '2015-03-19 18:30:00';
$round3=1; $day3 = '2015-03-26 18:30:00';

//above you need to change, below it's automatic

$aquery = mysql_query("SELECT ekipa, userid FROM ekipe, users WHERE club=ekipa AND competition='$comp' ORDER BY `odds` ASC");
$stekip = mysql_num_rows($aquery);
$n=0;
$m=$stekip-1;
while ($n < ($stekip/2)) {
$teamid1=mysql_result($aquery,$n,"ekipa");
$teamid2=mysql_result($aquery,$m,"ekipa");
$userf1=@mysql_result($aquery,$n,"userid");
$userf2=@mysql_result($aquery,$m,"userid");
@mysql_query("INSERT INTO messages VALUES ('', $userf1, 0, 0, NOW(), '<b>Champions Series</b>', 'After a great league season, your team has entered the <a href=\"cs.php\">Champions Series</a> and will represent your country there. First round draw is visible from the moment when this message was received. Opening matches will be played on Thursday - in less than 48 hours time! Pride and prestige aside, money and experience can be earned in international competitions, so you can easily downgrade training intensity when and if needed. All the best to you and your team, I wish you to make your fans and nation proud!<br/><br/>To learn more about CS, <a href=\"gamerules.php?action=international\">visit this link</a>.<br/><br/>Best regards<br/>admin')") or die(mysql_error());
@mysql_query("INSERT INTO messages VALUES ('', $userf2, 0, 0, NOW(), '<b>Champions Series</b>', 'After a great league season, your team has entered the <a href=\"cs.php\">Champions Series</a> and will represent your country there. First round draw is visible from the moment when this message was received. Opening matches will be played on Thursday - in less than 48 hours time! Pride and prestige aside, money and experience can be earned in international competitions, so you can easily downgrade training intensity when and if needed. All the best to you and your team, I wish you to make your fans and nation proud!<br/><br/>To learn more about CS, <a href=\"gamerules.php?action=international\">visit this link</a>.<br/><br/>Best regards<br/>admin')") or die(mysql_error());
//@mysql_query("INSERT INTO messages VALUES ('', $userf1, 0, 0, NOW(), '<b>Cup Winners Series</b>', 'After a great cup season, your team has entered the <a href=\"cws.php\">Cup Winners Series</a> and will represent your country there. First round draw is visible from the moment when this message was received. Opening matches will be played on Thursday - in less than 48 hours time! Pride and prestige aside, money and experience can be earned in international competitions, so you can easily downgrade training intensity when and if needed. All the best to you and your team, I wish you to make your fans and nation proud!<br/><br/>To learn more about CWS, <a href=\"gamerules.php?action=international\">visit this link</a>.<br/><br/>Best regards<br/>admin')") or die(mysql_error());
//@mysql_query("INSERT INTO messages VALUES ('', $userf2, 0, 0, NOW(), '<b>Cup Winners Series</b>', 'After a great cup season, your team has entered the <a href=\"cws.php\">Cup Winners Series</a> and will represent your country there. First round draw is visible from the moment when this message was received. Opening matches will be played on Thursday - in less than 48 hours time! Pride and prestige aside, money and experience can be earned in international competitions, so you can easily downgrade training intensity when and if needed. All the best to you and your team, I wish you to make your fans and nation proud!<br/><br/>To learn more about CWS, <a href=\"gamerules.php?action=international\">visit this link</a>.<br/><br/>Best regards<br/>admin')") or die(mysql_error());
$aquery1 = mysql_query("SELECT arenaid FROM arena WHERE teamid=$teamid1 LIMIT 1") or die(mysql_error());
$arenaid1cup = mysql_result($aquery1,0);
$aquery2 = mysql_query("SELECT arenaid FROM arena WHERE teamid=$teamid2 LIMIT 1") or die(mysql_error());
$arenaid2cup = mysql_result($aquery2,0);
$drza1 = mysql_query("SELECT country FROM teams WHERE teamid=$teamid1 LIMIT 1") or die(mysql_error());
$drzava1 = mysql_result($drza1,0);
$drza2 = mysql_query("SELECT country FROM teams WHERE teamid=$teamid2 LIMIT 1") or die(mysql_error());
$drzava2 = mysql_result($drza2,0);
$result = mysql_query("INSERT INTO matches VALUES ('', $teamid1, '', $teamid2, '', $arenaid1cup, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day1', $type, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$drzava1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $round1, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)") or die(mysql_error());
$result = mysql_query("INSERT INTO matches VALUES ('', $teamid2, '', $teamid1, '', $arenaid2cup, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day2', $type, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$drzava2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $round2, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)") or die(mysql_error());
$result = mysql_query("INSERT INTO matches VALUES ('', $teamid2, '', $teamid1, '', $arenaid2cup, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day3', $type, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$drzava2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $round3, $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)") or die(mysql_error());
$m=$m-1;
$n++;
}

//end of section 3
*/
?>