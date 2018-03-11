<?php
ini_set("max_execution_time",2400);
include_once("common.php");

/*
//YCWC
//removing teams which are inactive (was 5 days but can be adjusted)
//removing teams which are not good enough, at least 8 players is needed + minimum amount of wins in a season is needed!

$drzve = mysql_query("SELECT DISTINCT `country` FROM `regions` order by country asc limit 64") or die(mysql_error());
$d=0;
while ($d < mysql_num_rows($drzve)) {
$clubus=NULL;
$country = mysql_result($drzve,$d);
$kul = mysql_query("SELECT players.club as clubus, sum(handling + speed + passing + vision + rebounds + position + freethrow + shooting + defense) as sumarum FROM players, users, teams WHERE teams.country = '$country' AND players.club = users.club AND coach=9 AND (last_active > '2014-08-13 23:59:59' OR (supporter >0 AND expire NOT LIKE '%01:00:00')) AND bad_login < 99 and teams.teamid=users.club GROUP BY players.club ORDER BY sumarum DESC LIMIT 2") or die(mysql_error());
while ($pin = mysql_fetch_array($kul)) {
$clubus = $pin['clubus'];
if ($clubus > 0) {
$tri1=NULL; $tri2=NULL; $trizmaga=NULL; $trizmagb=NULL;
//checking for three wins
$trizmaga = mysql_query("SELECT * FROM `matches` WHERE `type`=18 AND `season`='$suzona' AND `home_id`='$clubus' AND `home_score` > `away_score`");
$tri1 = @mysql_num_rows($trizmaga);
$trizmagb = mysql_query("SELECT * FROM `matches` WHERE `type`=18 AND `season`='$suzona' AND `away_id`='$clubus' AND `away_score` > `home_score`");
$tri2 = @mysql_num_rows($trizmagb);
if ($tri1 > 1 OR $tri2 > 1) {mysql_query("INSERT INTO ekipe VALUES('', $clubus, 99, 0, 0, 0);") or die(mysql_error());}
}
}
$d++;
}
$kul1 = mysql_query("SELECT players.club AS clubus, sum( handling + speed + passing + vision + rebounds + position + freethrow + shooting + defense ) AS sumarum, teams.country FROM `players` , users, teams WHERE players.club = users.club AND coach =9 AND supporter >0 AND expire NOT LIKE '%01:00:00' AND teams.teamid = users.club GROUP BY players.club ORDER BY sumarum DESC LIMIT 150") or die(mysql_error());
while ($pinn = mysql_fetch_array($kul1)) {
$clubus = $pinn['clubus'];
$borba = mysql_query("SELECT * FROM ekipe WHERE competition=99 AND ekipa=$clubus LIMIT 1") or die(mysql_error());
if (!mysql_num_rows($borba)) {
$tri1=NULL; $tri2=NULL; $trizmaga=NULL; $trizmagb=NULL;
//checking for three wins
$trizmaga = mysql_query("SELECT * FROM `matches` WHERE `type`=18 AND `season`='$suzona' AND `home_id`='$clubus' AND `home_score` > `away_score`");
$tri1 = @mysql_num_rows($trizmaga);
$trizmagb = mysql_query("SELECT * FROM `matches` WHERE `type`=18 AND `season`='$suzona' AND `away_id`='$clubus' AND `away_score` > `home_score`");
$tri2 = @mysql_num_rows($trizmagb);
if ($tri1 > 1 OR $tri2 > 1) {echo $clubus,"<br/>";}
}
}
die("!!!REMOVE TEAMS WITH TOO FEW PLAYERS!!!");
*/

/*
//THIS PART OF THE SCRIPT IS ONLY FOR BASKETSIM NEWS OUTPUT
$brun = mysql_query("SELECT teamid, name, country FROM `ekipe` , teams WHERE `competition` =99 AND teamid = ekipa ORDER BY country ASC LIMIT 555");
while ($pun = mysql_fetch_array($brun)) {
$teamid = $pun['teamid'];
$name = $pun['name'];
$country = $pun['country'];
echo "<a href=\"redirect.php?teamid=",$teamid,"\">",stripslashes($name),"</a> (",$country,"), ";
}
die("SHMORHN!!!");
*/

/*
//THIS IS TO UPDATE ODDS, THIS MUST BE RUN!
$piksl = mysql_query("SELECT ekipa FROM ekipe WHERE competition=99") or die(mysql_error());
$galava=mysql_num_rows($piksl);
while ($p = mysql_fetch_array($piksl)) {
$psk = 0;
$grwa = $p[ekipa];
$slava = mysql_query("SELECT sum(handling + speed + passing + vision + rebounds + position + freethrow + shooting + defense) as sumarum FROM players WHERE club=$grwa AND coach=9") or die(mysql_error());
$psk = @mysql_result($slava,0,"sumarum");
$odds=12800/$psk * sqrt($galava)/3;
mysql_query("UPDATE ekipe SET odds=$odds WHERE competition=99 AND ekipa='$grwa' LIMIT 1") or die(mysql_error());
}
mysql_query("ALTER TABLE `ekipe` ORDER BY `odds` ASC") or die(mysql_error());
die("FAFAFA");
*/

/*
//DRAW - ADJUST EVERYTHING NECCESARY!!
$datum = '2014-08-20 22:45:00'; //always starting on Monday!!!
$aquery = mysql_query("SELECT ekipa as teamid, sum( handling + speed + passing + vision + rebounds + position + freethrow + shooting + defense ) AS sumar, arenaid, teams.country as country  FROM `ekipe`, players, arena, teams WHERE club = ekipa AND coach =9 AND competition =99 AND arena.teamid=ekipe.ekipa AND teams.teamid=ekipe.ekipa GROUP BY club ORDER BY `sumar` DESC");
$stekip = mysql_num_rows($aquery);
$n=0;
$m=$stekip-1;
while ($n < ($stekip/2)) {
$teamid1=mysql_result($aquery,$n,"teamid");
$teamid2=mysql_result($aquery,$m,"teamid");
$arenaid = mysql_result($aquery,$n,"arenaid");
$drzava = mysql_result($aquery,$n,"country");
echo $teamid1," VERSUS ",$teamid2," IN ",$arenaid,"<br/>";
mysql_query("INSERT INTO matches VALUES ('', $teamid1, '', $teamid2, '', $arenaid, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$datum', 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$drzava', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, $suzona, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)") or die(mysql_error());
$m=$m-1;
$n++;
}
die("END");
*/

/*
//mass mailout - CHANGE SEASON!!!!!!
function send_mail($to, $body, $subject, $fromaddress, $fromname)
{
  $eol="\n";
  $headers .= "From: ".$fromname."<".$fromaddress.">".$eol;
  $headers .= "Reply-To: ".$fromname."<".$fromaddress.">".$eol;
  $headers .= "Return-Path: ".$fromname."<".$fromaddress.">".$eol;
  $headers .= "Message-ID: <".time()."-".$fromaddress.">".$eol;
  $headers .= "X-Mailer: PHP v".phpversion().$eol;
  $headers .= 'MIME-Version: 1.0'.$eol.$eol;
  $msg .= $body.$eol.$eol;
  ini_set(sendmail_from,$fromaddress);
  $mail_sent = mail($to, $subject, $msg, $headers);
  ini_restore(sendmail_from);
  return $mail_sent;
}
$blabla = mysql_query("SELECT userid, username, email FROM `matches`, users WHERE `TYPE` =19 AND season =21 AND home_set =0 AND home_id = club");
while ($mc = mysql_fetch_array($blabla)) {
$user = $mc['username'];
$login = $mc['login'];
$email = $mc['email'];
$message1 = "6th Youth Club World Cup is starting in just 16 hours - with your club involvement! So log in to Basketsim as soon as possible, read the front page news and set your match before the 22:30 deadline!";
$message2 = "Best regards";
$message3 = "www.basketsim.com";
send_mail("$email", "Hello $user!\n\n$message1\n\n$message2\n$message3", "Basketsim Youth Club World Cup!", "basketsim@basketsim.com", "Basketsim");
}
die("EHO");
*/

/*
SELECT club, count( * ) FROM `ekipe` , players WHERE ekipa = club AND coach =9 and competition=99 GROUP BY club ORDER BY count( * ) asc limit 130
*/
?>