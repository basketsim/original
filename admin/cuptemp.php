<?php
ini_set("max_execution_time",4800);
include_once("common.php");

//script to be run for some optimizations


//queries below have nothing to do with cup draw, they enable to downsize database data

//DELETE FROM `login` WHERE `time` < '2014-08-01 00:00:00'
//DELETE FROM `gm_messages` WHERE `subject`='Suspicious Transfer' AND `time` < '2014-11-01 00:00:00'
//DELETE FROM `events` WHERE `when` < '2014-05-01 00:00:00' AND `description` LIKE '%>Player</a> was%'
//DELETE FROM `events` WHERE `when` < '2014-04-01 00:00:00' AND `description` LIKE 'New fans have contributed%'
//DELETE FROM `events` WHERE `when` < '2014-04-01 00:00:00' AND `description` LIKE '%raining took p%'
//DELETE FROM `events` WHERE `when` < '2014-03-01 00:00:00' AND `description` LIKE '%eekly update %'
//DELETE FROM `events` WHERE `when` < '2014-03-01 00:00:00' AND `description` LIKE '%match was played.'
//DELETE FROM `events` WHERE `when` < '2014-03-01 00:00:00' AND `description` LIKE '%atch revenue wa%'
//DELETE FROM `events` WHERE `when` < '2014-10-01 00:00:00' AND `description` LIKE '%for <a href=player.php?playerid=%'
//DELETE FROM `players` WHERE `club` =0 AND `coach` =0 AND `orient` =0 AND `injury` =0 AND `ntplayer` =0 AND `3points`=0
//DELETE FROM `messages` WHERE `read` =1 AND `time` < '2014-09-01 00:00:00' AND `title` LIKE '<b>Expired contract</b>'
//DELETE FROM `conf_comments_edit` WHERE `date_edit` < '2012-12-01 00:00:00'
//DELETE FROM `conf_comments` WHERE `deleted_by` >0 AND `date_deleted` < '2011-09-01 00:00:00'

//below are autodeletions, just adjust dates to newer, but make sure you don't delete too new

// mysql_query("DELETE FROM `lb_comments` WHERE `time` < '2013-03-01 00:00:00'") or die(mysql_error()); //liga forumi splošno
// mysql_query("DELETE FROM `lb_comments` WHERE `type` =5 AND `time` < '2014-04-01 00:00:00'") or die(mysql_error()); //liga forumi bot objave
// mysql_query("DELETE FROM `lb_comments` WHERE `type` =6 AND `time` < '2014-10-01 00:00:00'") or die(mysql_error()); //REKLAME!
// $krompir = mysql_query("SELECT `topic_id` FROM `conf_topics` WHERE `date_last_post` < '2011-02-01 00:00:00' AND `sticky` =0"); //forumi splošno
// $k=0;
// while ($k < mysql_num_rows($krompir)) {
// $topik = mysql_result($krompir,$k);
// mysql_query("DELETE FROM `conf_comments` WHERE `topic_id`=$topik");
// mysql_query("DELETE FROM `conf_last_read` WHERE `topic_id`=$topik");
// mysql_query("DELETE FROM `conf_topics` WHERE `topic_id`=$topik");
// $k++;
// }
// $krompir1 = mysql_query("SELECT `topic_id` FROM `conf_topics` WHERE `folder_id`= 'Transfer Market Ads' AND `date_last_post` < '2015-01-01 00:00:00' AND `sticky` =0"); //TMA oglasi
// $k=0;
// while ($k < mysql_num_rows($krompir1)) {
// $topik = mysql_result($krompir1,$k);
// mysql_query("DELETE FROM `conf_comments` WHERE `topic_id`=$topik");
// mysql_query("DELETE FROM `conf_last_read` WHERE `topic_id`=$topik");
// mysql_query("DELETE FROM `conf_topics` WHERE `topic_id`=$topik");
// $k++;
// }

//below is the script for deletion of players from tactics table when they shouldn't be there

// $pismu = mysql_query("SELECT tactics_team, start_pg FROM tactics");
// $frk=0;
// while ($frk < mysql_num_rows($pismu)) {$p = mysql_result($pismu,$frk,"start_pg"); $labim = mysql_query("SELECT id FROM players WHERE coach=0 AND id=$p");
// if (mysql_num_rows($labim)>0) {$kooo=4;} else {$t = mysql_result($pismu,$frk,"tactics_team"); mysql_query("UPDATE tactics SET start_pg=0 WHERE tactics_team=$t LIMIT 1");}
// $frk++;
// }
// $pismu = mysql_query("SELECT tactics_team, start_sg FROM tactics");
// $frk=0;
// while ($frk < mysql_num_rows($pismu)) {$p = mysql_result($pismu,$frk,"start_sg"); $labim = mysql_query("SELECT id FROM players WHERE coach=0 AND id=$p");
// if (mysql_num_rows($labim)>0) {$kooo=4;} else {$t = mysql_result($pismu,$frk,"tactics_team"); mysql_query("UPDATE tactics SET start_sg=0 WHERE tactics_team=$t LIMIT 1");}
// $frk++;
// }
// $pismu = mysql_query("SELECT tactics_team, start_sf FROM tactics");
// $frk=0;
// while ($frk < mysql_num_rows($pismu)) {$p = mysql_result($pismu,$frk,"start_sf"); $labim = mysql_query("SELECT id FROM players WHERE coach=0 AND id=$p");
// if (mysql_num_rows($labim)>0) {$kooo=4;} else {$t = mysql_result($pismu,$frk,"tactics_team"); mysql_query("UPDATE tactics SET start_sf=0 WHERE tactics_team=$t LIMIT 1");}
// $frk++;
// }
// $pismu = mysql_query("SELECT tactics_team, start_pf FROM tactics");
// $frk=0;
// while ($frk < mysql_num_rows($pismu)) {$p = mysql_result($pismu,$frk,"start_pf"); $labim = mysql_query("SELECT id FROM players WHERE coach=0 AND id=$p");
// if (mysql_num_rows($labim)>0) {$kooo=4;} else {$t = mysql_result($pismu,$frk,"tactics_team"); mysql_query("UPDATE tactics SET start_pf=0 WHERE tactics_team=$t LIMIT 1");}
// $frk++;
// }
// $pismu = mysql_query("SELECT tactics_team, start_c FROM tactics");
// $frk=0;
// while ($frk < mysql_num_rows($pismu)) {$p = mysql_result($pismu,$frk,"start_c"); $labim = mysql_query("SELECT id FROM players WHERE coach=0 AND id=$p");
// if (mysql_num_rows($labim)>0) {$kooo=4;} else {$t = mysql_result($pismu,$frk,"tactics_team"); mysql_query("UPDATE tactics SET start_c=0 WHERE tactics_team=$t LIMIT 1");}
// $frk++;
// }
// $pismu = mysql_query("SELECT tactics_team, res_pg FROM tactics");
// $frk=0;
// while ($frk < mysql_num_rows($pismu)) {$p = mysql_result($pismu,$frk,"res_pg"); $labim = mysql_query("SELECT id FROM players WHERE coach=0 AND id=$p");
// if (mysql_num_rows($labim)>0) {$kooo=4;} else {$t = mysql_result($pismu,$frk,"tactics_team"); mysql_query("UPDATE tactics SET res_pg=0 WHERE tactics_team=$t LIMIT 1");}
// $frk++;
// }
// $pismu = mysql_query("SELECT tactics_team, res_sg FROM tactics");
// $frk=0;
// while ($frk < mysql_num_rows($pismu)) {$p = mysql_result($pismu,$frk,"res_sg"); $labim = mysql_query("SELECT id FROM players WHERE coach=0 AND id=$p");
// if (mysql_num_rows($labim)>0) {$kooo=4;} else {$t = mysql_result($pismu,$frk,"tactics_team"); mysql_query("UPDATE tactics SET res_sg=0 WHERE tactics_team=$t LIMIT 1");}
// $frk++;
// }
// $pismu = mysql_query("SELECT tactics_team, res_sf FROM tactics");
// $frk=0;
// while ($frk < mysql_num_rows($pismu)) {$p = mysql_result($pismu,$frk,"res_sf"); $labim = mysql_query("SELECT id FROM players WHERE coach=0 AND id=$p");
// if (mysql_num_rows($labim)>0) {$kooo=4;} else {$t = mysql_result($pismu,$frk,"tactics_team"); mysql_query("UPDATE tactics SET res_sf=0 WHERE tactics_team=$t LIMIT 1");}
// $frk++;
// }
// $pismu = mysql_query("SELECT tactics_team, res_pf FROM tactics");
// $frk=0;
// while ($frk < mysql_num_rows($pismu)) {$p = mysql_result($pismu,$frk,"res_pf"); $labim = mysql_query("SELECT id FROM players WHERE coach=0 AND id=$p");
// if (mysql_num_rows($labim)>0) {$kooo=4;} else {$t = mysql_result($pismu,$frk,"tactics_team"); mysql_query("UPDATE tactics SET res_pf=0 WHERE tactics_team=$t LIMIT 1");}
// $frk++;
// }
// $pismu = mysql_query("SELECT tactics_team, res_c FROM tactics");
// $frk=0;
// while ($frk < mysql_num_rows($pismu)) {$p = mysql_result($pismu,$frk,"res_c"); $labim = mysql_query("SELECT id FROM players WHERE coach=0 AND id=$p");
// if (mysql_num_rows($labim)>0) {$kooo=4;} else {$t = mysql_result($pismu,$frk,"tactics_team"); mysql_query("UPDATE tactics SET res_c=0 WHERE tactics_team=$t LIMIT 1");}
// $frk++;
// }


/*
//re-setting array for match events, once you add more textual descriptions of events!

$kul = mysql_query("SELECT DISTINCT matchevent AS me FROM descriptions");
while ($pin = mysql_fetch_array($kul)) {
$me = $pin["me"];
$dod = mysql_query("SELECT descid FROM descriptions WHERE matchevent = $me");
echo "&#036;ddogodek[",$me,"] = array(";
$f=0;
while ($f < mysql_num_rows($dod)) {
SWITCH (TRUE) {
CASE ($f==0): echo "&#034;",mysql_result($dod,$f),"&#034;"; break;
CASE ($f>0): echo ", &#034;",mysql_result($dod,$f),"&#034;"; break;
}
$f++;
}
echo ");<br>";
}
*/



//with this you update top free agents list

// $drzve = mysql_query("SELECT DISTINCT `country` FROM `regions` ORDER BY `country` ASC");
// $d=0;
// while ($d < mysql_num_rows($drzve)) {
// $country = mysql_result($drzve,$d);
// if ($country=='Bosnia') {echo "<br/>&lt;br/&gt;&lt;b&gt;Bosnia and Herzegovina&lt;/b&gt;&lt;br/&gt;<br/>";} else {echo "<br/>&lt;br/&gt;&lt;b&gt;",$country,"&lt;/b&gt;&lt;br/&gt;<br/>";}
// $cen = mysql_query("SELECT id, name, surname, handling, speed, passing, vision, rebounds, position, freethrow, shooting, defense FROM players WHERE country='$country' AND coach != 1 AND club = 0 ORDER BY wage DESC LIMIT 10") or die(mysql_error());
// $c=0;
// while ($c < 10) {
// $no=$c+1;
// $cid=mysql_result($cen,$c,"id");
// $cname=mysql_result($cen,$c,"name");
// $csurname=mysql_result($cen,$c,"surname");
// $s1=mysql_result($cen,$c,"handling");
// $s2=mysql_result($cen,$c,"speed");
// $s3=mysql_result($cen,$c,"passing");
// $s4=mysql_result($cen,$c,"vision");
// $s5=mysql_result($cen,$c,"rebounds");
// $s6=mysql_result($cen,$c,"position");
// $s7=mysql_result($cen,$c,"freethrow");
// $s8=mysql_result($cen,$c,"shooting");
// $s9=mysql_result($cen,$c,"defense");
// $fokused = max($s1,$s2,$s3,$s4,$s5,$s6,$s7,$s8,$s9);
// switch ($fokused) {
// CASE $s1: $fokuse='$langmark120'; break;
// CASE $s2: $fokuse='$langmark121'; break;
// CASE $s3: $fokuse='$langmark122'; break;
// CASE $s4: $fokuse='$langmark123'; break;
// CASE $s5: $fokuse='$langmark124'; break;
// CASE $s6: $fokuse='$langmark125'; break;
// CASE $s7: $fokuse='$langmark127'; break;
// CASE $s8: $fokuse='$langmark126'; break;
// CASE $s9: $fokuse='$langmark128'; break;
// }
// echo $no,". &lt;a href=&quot;player.php?playerid=",$cid,"&quot;&gt;&lt;b&gt;",$cname," ",$csurname,"&lt;/b&gt;&lt;/a&gt; (&lt;?php ";
// echo 'echo';
// echo "&nbsp;";
// echo '$langmark929';
// echo ",&quot;: &quot;,",$fokuse,"&#59;?&gt;)&lt;br/&gt;<br/>";
// $c++;
// }
// $d++;
// }



/*
//draft refund tokens

$advorder = mysql_query("SELECT DISTINCT team AS team, tokens FROM drafters WHERE tokens >1") or die(mysql_error());
$num=mysql_num_rows($advorder);
$i=0;
while ($i < $num) {
$teamid=mysql_result($advorder,$i,"team");
$tokens=mysql_result($advorder,$i,"tokens");
$dodam = $tokens*600;
$prikdod = number_format($dodam, 0, ',', '.');
echo $teamid,"___",$tokens,"___",$dodam,"___",$prikdod,"<br/>";
mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'International Basketsim Federation (IBF) has issued a $prikdod &euro; refund after $tokens of your draft tokens were left unused.', 1, $dodam);") or die(mysql_error());
mysql_query("UPDATE teams SET curmoney=curmoney+$dodam WHERE teamid=$teamid LIMIT 1") or die(mysql_error());
$i++;
}
die("fdsfds");
*/




//mass mailout code

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
$blabla = mysql_query("SELECT `userid`, `username`, `login`, `email`, `last_active` FROM `users` WHERE `last_active` < '2015-03-12 12:00:00' ");
while ($mc = mysql_fetch_array($blabla)) {
$userid = $mc['userid'];
$user = $mc['username'];
$login = $mc['login'];
$email = $mc['email'];
$endatum = $mc['last_active'];
$tdatetime = explode(" ",$endatum); $ffdate = $tdatetime[0]; $fftime = $tdatetime[1];
$tdate = explode("-", $ffdate); $ffyear = $tdate[0]; $ffmonth = $tdate[1]; $ffday = $tdate[2];
$ttime = explode(":", $fftime); $ffhour = $ttime[0]; $ffmin = $ttime[1]; $ffsec = $ttime[2];
$ffdate = date("Y-m-d H:i:s", mktime($ffhour,$ffmin,$ffsec,$ffmonth,$ffday+26,$ffyear));
$message1 = "Basketsim is back! And you are getting this message because your friends over there are missing you!";
$message2 = "What happened and what does the future hold? Adiego stepped down and now the game has a new admin with a new vision - rebuilding the game and bringing it up to 2015s standards. Your feedback and support are needed! Your login name is $login and, if you dont remember your password, please use forgot password feature on Basketsim front page (in case of not receiving it, check your spam inbox first, else send us a short reply here and we will fix this for you!)";
$message3 = "www.basketsim.com";
$message4 = "(Basketsim never send spam messages, you have only receive this message as a registered user. To unsuscribe from future messages, send us a quick reply.)";
send_mail("$email", "Hello $user!\n\n$message1\n\n$message2\n\n$message3\n\n$message4", "Basketsim is back!", "basketsim@basketsim.com", "Basketsim");
mysql_query("UPDATE users SET last_active='$ffdate' WHERE userid='$userid' LIMIT 1");
}
die("EHO");



/*
//searching of clubs from certain countries based on IPs, for example searching for all players logging from Iceland (non-BS country)

include("../geoip.inc");
$querypw = mysql_query("SELECT distinct ip as ip from login where time > '2012-11-07 23:59:59'");
while ($j = mysql_fetch_array($querypw)) {
$lastip = $j["ip"];
$hahacountry='';
$gi = geoip_open("../GeoIP.dat",GEOIP_STANDARD);
$hahacountry = geoip_country_name_by_addr($gi, $lastip);
geoip_close($gi);
if ($hahacountry=='Puerto Rico') {echo $lastip,"<br/>";}
}
die("JAJAJAJA");
*/
?>