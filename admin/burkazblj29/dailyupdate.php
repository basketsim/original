<?php
ini_set("max_execution_time", 4500);
require_once('cron2conect.php');
$today = date("Y-m-d");
$danesni = date("Y-m-d H:i:s");


//closed users due to bad logins reopened
mysql_query("UPDATE users SET bad_login=0 WHERE bad_login < 90");


//arenas updated
$arene = mysql_query("SELECT teams.teamid AS teamid FROM arena, teams WHERE arena.teamid = teams.teamid AND teams.status =1 AND `in_use` <100 AND `upgrading` < '$today'") or die(mysql_error());
while ($j = mysql_fetch_array($arene)) {
$teamid=$j['teamid'];
echo "Arena: ".$teamid."<br/>";
mysql_query("UPDATE arena SET in_use=100 WHERE teamid='$teamid'") or die(mysql_error());
mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'Arena construction was completed. You can use its full capacity now.', 0, 0);") or die(mysql_error());
}


//supportership updates
$konec = mysql_query("SELECT club FROM users WHERE supporter=1 AND expire < '$danesni'");
while ($s = mysql_fetch_array($konec)) {
$userclub = $s['club'];
mysql_query("UPDATE teams SET logo='' WHERE teamid=$userclub LIMIT 1");
mysql_query("UPDATE users SET supporter=0, signature='' WHERE club=$userclub LIMIT 1");
mysql_query("INSERT INTO events VALUES ('', $userclub, NOW(), ' Your supportership has expired, thanks for supporting Basketsim! Consider to continue your support as this helps the game to exist and improve!', 0, 0);");
echo "POTEK: ",$userclub,"<br/>";
}
$tdatetime = explode(" ",$danesni); $ffdate = $tdatetime[0]; $fftime = $tdatetime[1];
$tdate = explode("-", $ffdate); $ffyear = $tdate[0]; $ffmonth = $tdate[1]; $ffday = $tdate[2];
$ttime = explode(":", $fftime); $ffhour = $ttime[0]; $ffmin = $ttime[1]; $ffsec = $ttime[2];
$ffdate = date("Y-m-d", mktime($ffhour,$ffmin,$ffsec,$ffmonth,$ffday+7,$ffyear));
$opozorilo = mysql_query("SELECT club FROM users WHERE expire LIKE '$ffdate%' AND expire NOT LIKE '%01:00:00'") or die(mysql_error());
while ($p = mysql_fetch_array($opozorilo)) {
$dokonca = $p['club'];
mysql_query("INSERT INTO `events` VALUES('',$dokonca,NOW(),'<u>Your supportership expires in 7 days</u>. If you wish to extend it <a href=profile.php>visit your profile</a>. Thank you for supporting Basketsim!',0,0);");
echo "Opozorilo glede supporterja za klub ",$dokonca,"<br/>";
}


//user inactivity warnings
$enddatee = mktime(0,0,0,date("m"),date("d")-20,date("Y"));
$enddatea = mktime(0,0,0,date("m"),date("d")-42,date("Y"));
$endate1 = date("Y-m-d", $enddatee);
$endate2 = date("Y-m-d", $enddatea);
$ding = mysql_query("SELECT username, login, email FROM `users` WHERE (`last_active` LIKE '$endate1%' OR `last_active` LIKE '$endate2%') AND bad_login < 99");
while ($gq = mysql_fetch_array($ding)) {
$useruser = $gq['username'];
$useruse = $gq['login'];
$mailmail = $gq['email'];
$subject = "Basketsim reminder";
$message0 = "Hello $useruser!";
$message1 = "Your players have notified us that you weren't around much lately and they're afraid that the team might lose an owner. You can login to Basketsim at any time to check how your club is doing, your login is $useruse.";
$message2 = "If you're unable to log in for any reason, reply to this email and we'll be glad to assist you.";
$message3 = "www.basketsim.com";
$body = "$message0 \n\n $message1 \n\n $message2 \n\n $message3";
$headers = 'From: basketsim@basketsim.com' . "\r\n" .
   'Reply-To: basketsim@basketsim.com' . "\r\n" .
   'X-Mailer: PHP/' . phpversion();
mail($mailmail, $subject, $body, $headers);
@mysql_query("UPDATE users SET is_online=1 WHERE username='$useruser' LIMIT 1");
}


//draft updates
$draftu = mysql_query("SELECT teams.teamid AS timid, curmoney, seats1 + seats2 + seats3 + seats4 AS sedezi, signed FROM teams, arena, users WHERE teams.teamid = arena.teamid AND club = teams.teamid AND draft =1") or die(mysql_error());
while ($g = mysql_fetch_array($draftu)) {
$trueclub = $g[timid];
$curmoney = $g[curmoney];
$sedezi = $g[sedezi];
$kdajl = $g[signed];
$prvidod = mysql_query("SELECT current_level FROM medical_center WHERE id_team = '$trueclub'") or die(mysql_error());
if (mysql_num_rows($prvidod)==1) {$centerm = mysql_result($prvidod,0,"current_level");} else {$centerm = 0;}
$cwealth = 100 + round(95 - $curmoney/300000 - $sedezi/800 - 6*$centerm);
if ($cwealth > 200) {$cwealth=200;} elseif ($cwealth < 0) {$cwealth = 0;}
$anoqu = mysql_query("SELECT position, level FROM leagues, competition WHERE leagues.leagueid = competition.leagueid AND competition.season ='$default_season' AND competition.teamid ='$trueclub'") or die(mysql_error());
$plzaj = mysql_result($anoqu,0,"position");
$hura = mysql_result($anoqu,0,"level");
$yyy = ($plzaj+1)*($hura+2)-5;
$salaries = mysql_query("SELECT SUM(wage) FROM `players` WHERE `club` ='$trueclub' LIMIT 1") or die(mysql_error());
list($sum) = mysql_fetch_row($salaries);
$xxx = round(201 - ($sum/5000));
if ($xxx > 200) {$xxx=200;} elseif ($xxx < 0) {$xxx=0;}
mysql_query("UPDATE drafters SET points = $yyy, strength = $xxx, wealth = $cwealth WHERE team = $trueclub LIMIT 1");
$b=0;
$ena = mysql_query("SELECT matchid FROM matches WHERE `time` > '$kdajl' AND home_id='$trueclub' AND home_score =1 AND season=$default_season") or die(mysql_error());
$b=$b+(mysql_num_rows($ena));
$dve = mysql_query("SELECT matchid FROM matches WHERE `time` > '$kdajl' AND away_id='$trueclub' AND away_score =1 AND season=$default_season") or die(mysql_error());
$b=$b+(mysql_num_rows($dve));
if ($b>2) {mysql_query("DELETE FROM drafters WHERE team = $trueclub LIMIT 1") or die(mysql_error());}
}



//scouts updates (the main part of the daily update)
mysql_query("UPDATE scouts SET days=days-1, days2=days2+1 WHERE status=1") or die(mysql_error());
$skavti = mysql_query("SELECT * FROM scouts WHERE status=1") or die(mysql_error());
while ($s = mysql_fetch_array($skavti)) {
$s2id = $s["id"];
$s2name = $s["name"];
$s2surname = $s["surname"];
$s2location0 = $s["location0"];
$s2location1 = $s["location1"];
$s2location2 = $s["location2"];
$s2location3 = $s["location3"];
$s2focus1 = $s["focus1"];
$s2focus2 = $s["focus2"];
$s2quality = $s["quality"];
$s2talent = $s["talent"];
$s2teamid = $s["teamid"];
$s2playerid = $s["playerid"];
$s2days = $s["days"];
$s2days2 = $s["days2"];
$minwage = ($s2quality*1050) + ($s2days2*5100)/($s2days+$s2days2);
if ($minwage < 9000) {$minwage=9000;} else {$minwage = round($minwage);}
$maxage = (36-$s2talent);
SWITCH ($s2quality) {
CASE 0: $top=48; $downs=0.45; break;
CASE 1: $top=49; $downs=0.5; break;
CASE 2: $top=50; $downs=0.5; break;
CASE 3: $top=51; $downs=0.55; break;
CASE 4: $top=52; $downs=0.55; break;
CASE 5: $top=53; $downs=0.6; break;
CASE 6: $top=54; $downs=0.65; break;
CASE 7: $top=55; $downs=0.7; break;
CASE 8: $top=56; $downs=0.76; break;
CASE 9: $top=57; $downs=0.82; break;
CASE 10: $top=58; $downs=0.88; break;
CASE 11: $top=59; $downs=0.94; break;
CASE 12: $top=60; $downs=1; break;
CASE 13: $top=61; $downs=1.12; break;
CASE 14: $top=62; $downs=1.24; break;
CASE 15: $top=62; $downs=1.36; break;
}
if ($s2days2<8) {$maxwage=50000*$downs;}
if ($s2days2>7 && $s2days2<15) {$maxwage=60000*$downs;}
if ($s2days2>14 && $s2days2<22) {$maxwage=70000*$downs;}
if ($s2days2>21) {$maxwage=80000*$downs;}
SWITCH (TRUE) {
CASE ($s2days >= 0):
$nekigralec = "SELECT id FROM players WHERE ".$s2focus1.">".$top." AND ".$s2focus2.">".$top." AND age <= ".$maxage." AND wage >= ".$minwage." AND wage <= ".$maxwage." AND (country LIKE '".$s2location0."' OR country LIKE '".$s2location1."' OR country LIKE '".$s2location2."' OR country LIKE '".$s2location3."') AND coach=0 AND club=0 AND workrate > age ORDER BY RAND() LIMIT 1";
$prostigralec=mysql_query($nekigralec);
$num = mysql_num_rows($prostigralec);
if ($num >0) {
$winer = mysql_result($prostigralec,0,"id");
mysql_query("UPDATE scouts SET playerid = $winer WHERE teamid=$s2teamid LIMIT 1");
$pin = mysql_query("SELECT userid FROM users WHERE club=$s2teamid LIMIT 1");
if (mysql_num_rows($pin)==1) {$user = mysql_result($pin,0); mysql_query("INSERT INTO `messages` VALUES ('', $user, 0, 0, NOW(), 'New player found', 'Hi coach!<br/><br/>I managed to found a new player during my search. You can check him in the <a href=staff1.php>staff</a> section.<br/><br/>Best regards,<br/>$s2name $s2surname<br/><br/><i>(This message is deleted automatically as soon as you read it!)</i>');") or die(mysql_error());}
}
break;
CASE ($s2days < 0):
mysql_query("DELETE FROM scouts WHERE teamid=$s2teamid LIMIT 1") or die(mysql_error());
mysql_query("INSERT INTO events VALUES ('', $s2teamid, NOW(), 'Scout has completed his search. You didn\'t sign any of the players offered.', 0, 0);") or die(mysql_error());
break;
}
}
//confirmation for scouts to email
echo "___SKAVTI_OK__";


//daily injury updates and 3point contest daily update
mysql_query("UPDATE `players` SET `3points`=`3points`-1 WHERE `3points`>0");
mysql_query("UPDATE `players` SET `injury`=0 WHERE `injury` <= 0.14");
mysql_query("UPDATE `players` SET `injury`=`injury`-0.14 WHERE `injury` > 0.14");
$drava = mysql_query("SELECT `id_team`, `current_level` FROM `medical_center`") or die(mysql_error());
while ($mc = mysql_fetch_array($drava)) {
$id_team = $mc['id_team'];
$current_level = $mc['current_level'];
SWITCH ($current_level) {
CASE 1: $dodatek = 0.06; break;
CASE 2: $dodatek = 0.07; break;
CASE 3: $dodatek = 0.08; break;
CASE 4: $dodatek = 0.10; break;
CASE 5: $dodatek = 0.12; break;
}
mysql_query("UPDATE `players` SET `injury`=0 WHERE `injury` <= $dodatek AND `club`=$id_team LIMIT 60");
mysql_query("UPDATE `players` SET `injury`=`injury`-$dodatek WHERE `injury` > $dodatek AND `club`=$id_team LIMIT 60");
}


//medical centers update
$centri = mysql_query("SELECT DISTINCT id_team AS idteam FROM medical_center WHERE current_level < 5 AND next_update < '$today' AND next_update <> '0000-00-00'") or die(mysql_error());
while ($m = mysql_fetch_array($centri)) {
$idteam=$m['idteam'];
echo "MC upgrade: ".$idteam."<br/>";
mysql_query("UPDATE medical_center SET current_level=current_level+1, next_update='0000-00-00' WHERE id_team=$idteam") or die(mysql_error());
mysql_query("INSERT INTO events VALUES ('', $idteam, NOW(), 'Medical center was upgraded.', 0, 0);");
}


//daily tiredness deduction for players
$todan = date("l");
if ($todan<>'Wednesday' AND $todan<>'Sunday') {
mysql_query("UPDATE `players` SET `fatigue`=0 WHERE fatigue < 4") or die("ni odbitka utrujenosti I");
mysql_query("UPDATE `players` SET `fatigue`=`fatigue`-3 WHERE fatigue > 3") or die("ni odbitka utrujenosti II");
}


//players with best star rating update
mysql_query("TRUNCATE TABLE `topplayers`");
$guard = mysql_query("SELECT id, name, surname, country, star_qual FROM players WHERE club <> 0 AND (star_posit = 1 OR star_posit = 2) ORDER BY star_qual DESC LIMIT 5") or die(mysql_error());
$g=0;
while ($g < 5) {
$gid=mysql_result($guard,$g,"id");
$no=mysql_result($guard,$g,"star_qual");
$gname=mysql_result($guard,$g,"name");
$gsurname=mysql_result($guard,$g,"surname");
$drz=mysql_result($guard,$g,"country");
if ($gid==3287291) {$name='A. Kolokithikorfadas';} elseif ($gid==279072) {$name='Alejandro G. M&aacute;rquez';} elseif ($gid==1036436) {$name='Arvydas Celie&#353;ius';} else {$name = $gname." ".$gsurname;}
mysql_query("INSERT INTO topplayers VALUES ('$no', $gid, '$name', 1, '$drz');");
$g++;
}
$guard = mysql_query("SELECT id, name, surname, country, star_qual FROM players WHERE club != 0 AND (star_posit = 1 OR star_posit = 2) AND age < 19 ORDER BY star_qual DESC LIMIT 5") or die(mysql_error());
$g=0;
while ($g < 5) {
$no=mysql_result($guard,$g,"star_qual");
$gid=mysql_result($guard,$g,"id");
$gname=mysql_result($guard,$g,"name");
$gsurname=mysql_result($guard,$g,"surname");
$drz=mysql_result($guard,$g,"country");
if ($gid==3604652) {$name='L. Papariganopoulos';} elseif ($gid==3539846) {$name='JP Vaz Ferreira';} else {$name = $gname." ".$gsurname;}
mysql_query("INSERT INTO topplayers VALUES ('$no', $gid, '$name', 2, '$drz');");
$g++;
}
$for = mysql_query("SELECT id, name, surname, country, star_qual FROM players WHERE club != 0 AND star_posit = 3 OR star_posit = 4 ORDER BY star_qual DESC LIMIT 5") or die(mysql_error());
$f=0;
while ($f < 5) {
$no=mysql_result($for,$f,"star_qual");
$fid=mysql_result($for,$f,"id");
$fname=mysql_result($for,$f,"name");
$fsurname=mysql_result($for,$f,"surname");
$drz=mysql_result($for,$f,"country");
if ($fid==339520) {$name='E. Saltsidis';} elseif ($fid==1691090) {$name='L. Gaidamavi&#269;ius';} elseif ($fid==1522411) {$name='S. Przybyszewski';} elseif ($fid==1128637) {$name='&#256;dams Bisenieks';} else {$name = $fname." ".$fsurname;}
mysql_query("INSERT INTO topplayers VALUES ('$no', $fid, '$name', 3, '$drz');");
$f++;
}
$for = mysql_query("SELECT id, name, surname, country, star_qual FROM players WHERE club != 0 AND (star_posit = 3 OR star_posit = 4) AND age < 19 ORDER BY star_qual DESC LIMIT 5") or die(mysql_error());
$f=0;
while ($f < 5) {
$no=mysql_result($for,$f,"star_qual");
$fid=mysql_result($for,$f,"id");
$fname=mysql_result($for,$f,"name");
$fsurname=mysql_result($for,$f,"surname");
$drz=mysql_result($for,$f,"country");
if ($fid==2935602) {$name='P. Panyarachun';} elseif ($fid==2928044) {$name='A. Ramanauskas';} else {$name = $fname." ".$fsurname;}
mysql_query("INSERT INTO topplayers VALUES ('$no', $fid, '$name', 4, '$drz');");
$f++;
}
$cen = mysql_query("SELECT id, name, surname, country, star_qual FROM players WHERE club != 0 AND star_posit = 5 ORDER BY star_qual DESC LIMIT 5") or die(mysql_error());
$c=0;
while ($c < 5) {
$no=mysql_result($cen,$c,"star_qual");
$cid=mysql_result($cen,$c,"id");
$cname=mysql_result($cen,$c,"name");
$csurname=mysql_result($cen,$c,"surname");
$drz=mysql_result($cen,$c,"country");
if ($cid==196734) {$name='Rogelio Mercado';} elseif ($cid==1179985) {$name='R. Frischknecht';} else {$name = $cname." ".$csurname;}
mysql_query("INSERT INTO topplayers VALUES ('$no', $cid, '$name', 5, '$drz');");
$c++;
}
$cen = mysql_query("SELECT id, name, surname, country, star_qual FROM players WHERE club != 0 AND star_posit = 5 AND age < 19 ORDER BY star_qual DESC LIMIT 5") or die(mysql_error());
$c=0;
while ($c < 5) {
$no=mysql_result($cen,$c,"star_qual");
$cid=mysql_result($cen,$c,"id");
$cname=mysql_result($cen,$c,"name");
$csurname=mysql_result($cen,$c,"surname");
$drz=mysql_result($cen,$c,"country");
if ($cid==2929301) {$name='Jos&eacute; F. Moreno';} elseif ($cid==2928044) {$name='A. Ramanauskas';} else {$name = $cname." ".$csurname;}
mysql_query("INSERT INTO topplayers VALUES ('$no', $cid, '$name', 6, '$drz');");
$c++;
}


//5 let
$timen = date('Y-m-d H:i:s', strtotime('-5 years'));
$piksl = mysql_query("SELECT userid, club, supporter FROM users WHERE `signed` < '$timen'");
while ($p = mysql_fetch_array($piksl)) {
$user = $p['userid'];
$team = $p['club'];
$supp = $p['supporter'];
$ch = mysql_query("SELECT * FROM history WHERE h_type=55 AND h_userid='$user' LIMIT 1") or die(mysql_error());
if (!mysql_num_rows($ch)) {
mysql_query("INSERT INTO history VALUES ('', $user, $team, '', 55, 0, 1, $default_season, '', 0, '', 0);") or die(mysql_error());
if ($supp==0) {
$timeofsale = date("Y-m-d H:i:s");
$splitdatetime = explode(" ", $timeofsale); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$prikazcasa = date("Y-m-d H:i:s", mktime(1,0,0,$dbmonth,$dbday+6,$dbyear));
mysql_query("UPDATE users SET supporter=1, `expire`='$prikazcasa' WHERE supporter=0 AND userid=$user LIMIT 1");
mysql_query("INSERT INTO `messages` VALUES ('', $user, 0, 0, NOW(), '<b>5 years in Basketsim</b>', 'Congratulations, you have reached the 5 years mark in your Basketsim stay. We would like to thank you from the bottom of our hearts for sticking with us. While it\'s impossible to fully emulate basketball in online environment, we were always looking to build Basketsim into a fun place, where people can enjoy their stay, have a good time and run their own team in the way they want and with the players they chose. Adding new options to that was something done in the past and something that will be done in the future.<br/><br/>When someone stays with us for so long as you did, he receives a 5 year thank you badge to his trophy room. But since you are not a Basketsim supporter and we still want you to see that trophy, we are giving away 5 days of supportership for free, hoping that you will enjoy that. The donations from supporters are what makes this game possible to exist and free to play for everyone else! To see the status of your supportership and when it expires, please check your ingame <a href=\"profile.php\">profile</a>.<br/><br/>Enjoy the experience and thanks again for playing Basketsim!<br/>Yours, admin');") or die(mysql_error());}
elseif ($supp==1) {
mysql_query("INSERT INTO `messages` VALUES ('', $user, 0, 0, NOW(), '<b>5 years in Basketsim</b>', 'Congratulations, you have reached the 5 years mark in your Basketsim stay. We would like to thank you from the bottom of our hearts for sticking with us. While it\'s impossible to fully emulate basketball in online environment, we were always looking to build Basketsim into a fun place, where people can enjoy their stay, have a good time and run their own team in the way they want and with the players they chose. Adding new options to that was something done in the past and something that will be done in the future. And when someone stays with us for so long as you did, he receives a 5 year thank you badge to his trophy room. We would also like to thank you for supporting Basketsim, the donations from supporters are what makes this game possible to exist!<br/><br/>Thanks again for playing Basketsim and contributing towards it\'s stay!<br/>Yours, admin');") or die(mysql_error());}
}
}

//confirmation for email output
echo "__|PRAV VSE OK";
?>