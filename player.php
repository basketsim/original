<?php
$playerid=$_GET['playerid'];
if (!is_numeric($playerid)) {die(include 'index.php');}

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT club, lastip, level, supporter, natcoach, nt_country, lang, name, curmoney, tempmoney, country, status FROM users, teams WHERE users.club=teams.teamid AND password='$koda' AND userid='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)<>1) {die(include 'basketsim.php');}

if (isset($_POST['submit'])) {
$cbt = $_POST['cbt'];
if ($cbt >0) {
$fouls = mysql_query("SELECT SUM(currentbid) FROM `transfers` WHERE `trstatus` ='1' AND `sellingid` ='$userid'") or die(mysql_error());
list($sum_fouls) = mysql_fetch_row($fouls);
$fouls1 = mysql_query("SELECT SUM(currentbid) FROM `transfers` WHERE `trstatus` ='1' AND `bidingteam` ='$userid'") or die(mysql_error());
list($sum_fouls1) = mysql_fetch_row($fouls1);
if (!$sum_fouls) {$sum_fouls=0;}
if (!$sum_fouls1) {$sum_fouls1=0;}
mysql_query("UPDATE `teams` SET `tempmoney`='$sum_fouls'-'$sum_fouls1' WHERE `teamid` ='$cbt' LIMIT 1") or die(mysql_error());
}
}

$arypas = mysql_fetch_array($compare);
$trueclub = $arypas[club];
$zadnjiIPb = $arypas[lastip];
$levelll = $arypas[level];
$is_supporter = $arypas[supporter];
$natcoach = $arypas[natcoach];
$nt_country = $arypas[nt_country];
$lang = $arypas[lang];
$clubbid = $arypas[name];
$madenar = $arypas[curmoney];
$plusdenar = $arypas[tempmoney];
$fukja = $arypas[country];
$kojikurac = $arypas[status];


//fix
if ($nt_country=='Bosnia and Herzegovina') {$nt_country='Bosnia';}


//number of days important for transfers

$dayz=$_GET['dayz'];
if ($dayz=='nat') {mysql_query("INSERT INTO messages VALUES ('', 3147, 0, 0, NOW(), 'Naturalization', '<a href=player.php?playerid=$playerid>link</a>')"); header("Location: player.php?playerid=$playerid&dayz=off");}
if ($dayz=='on') {
$davek = mysql_query("SELECT `timeofsale` FROM `transfers` WHERE `trstatus`<>1 AND `currentbid` >999 AND `playerid` =$playerid ORDER BY `timeofsale` DESC LIMIT 1");
if (mysql_num_rows($davek)==1) {
$timeof = mysql_result($davek,0,"timeofsale");
$splitdatetime = explode(" ", $timeof); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$days = (int)((mktime (0,0,0,$dbmonth,$dbday,$dbyear) - time(void))/86400);
$timeof = abs($days);
} else {$timeof = 10000;}
if ($timeof < 61) {$present = "This player was signed ".$timeof." days ago. If you decide to sell him, the agents will take a certain percentage of your earnings. <a href=\"gamerules.php?action=transfers\">Check more</a>.";}
if ($timeof > 60 AND $timeof < 10000) {$present = "This player was signed ".$timeof." days ago. If you decide to sell him, you will receive full transfer money.";}
if ($timeof==10000) {$present="This player is the original member of your team, you will get full transfer money if you decide to sell him.";}
}

if (isset($_POST['subYT'])) {
$sfs=$_POST['SFS'];
$fte=$_POST['FTE'];
$val111=$_POST['val111'];
$val222=$_POST['val222'];
$val333=$_POST['val333'];
if (is_numeric($sfs) AND is_numeric($fte) AND $sfs > 0 AND $fte > 0 AND $sfs < 10 AND $fte < 10 AND is_numeric($val111) AND is_numeric($val222) AND is_numeric($val333)) {
$proviw = $val111/10 + $val222/6 + ($val333-40)*2 + rand(2,25);
SWITCH ($fte) {
CASE 1: $proviw = $proviw * 0.6; break;
CASE 2: $proviw = $proviw * 0.7; break;
CASE 3: $proviw = $proviw * 0.8; break;
CASE 4: $proviw = $proviw * 0.9; break;
CASE 6: $proviw = $proviw * 1.1; break;
CASE 7: $proviw = $proviw * 1.18; break;
CASE 8: $proviw = $proviw * 1.28; break;
CASE 9: $proviw = $proviw * 1.4; break;
}
if ($proviw > 105) {$proviw=105;} elseif ($proviw < 9) {$proviw=9;}
@mysql_query("UPDATE players SET workrate=$proviw+1-quality/24, price=$sfs, motiv=$fte WHERE age=14 AND coach=9 AND workrate=0 AND quality < 49 AND club=$trueclub AND id=$playerid LIMIT 1");
@mysql_query("UPDATE players SET workrate=$proviw-3-quality/15, price=$sfs, motiv=$fte WHERE age=14 AND coach=9 AND workrate=0 AND quality > 48 AND club=$trueclub AND id=$playerid LIMIT 1");
@mysql_query("UPDATE players SET workrate=$proviw+2-quality/24, price=$sfs, motiv=$fte WHERE age=15 AND coach=9 AND workrate=0 AND quality < 65 AND club=$trueclub AND id=$playerid LIMIT 1");
@mysql_query("UPDATE players SET workrate=$proviw-2-quality/16, price=$sfs, motiv=$fte WHERE age=15 AND coach=9 AND workrate=0 AND quality > 64 AND club=$trueclub AND id=$playerid LIMIT 1");
@mysql_query("UPDATE players SET workrate=$proviw-quality/20, price=$sfs, motiv=$fte WHERE age=16 AND coach=9 AND workrate=0 AND quality < 81 AND club=$trueclub AND id=$playerid LIMIT 1");
@mysql_query("UPDATE players SET workrate=$proviw-quality/14, price=$sfs, motiv=$fte WHERE age=16 AND coach=9 AND workrate=0 AND quality > 80 AND club=$trueclub AND id=$playerid LIMIT 1");
@mysql_query("UPDATE players SET workrate=$proviw+1-quality/18, price=$sfs, motiv=$fte WHERE age=17 AND coach=9 AND workrate=0 AND quality < 81 AND club=$trueclub AND id=$playerid LIMIT 1");
@mysql_query("UPDATE players SET workrate=$proviw-1-quality/15, price=$sfs, motiv=$fte WHERE age=17 AND coach=9 AND workrate=0 AND quality > 80 AND club=$trueclub AND id=$playerid LIMIT 1");
}
}

require("inc/lang/".$lang.".php");

//izjava
if (isset($_POST['zjav'])) {
$zjav = $_POST["zjav"];
$zjav = addslashes($zjav);
$zjav = htmlspecialchars(stripslashes($zjav));
mysql_query("UPDATE players SET statement = '$zjav' WHERE id=$playerid LIMIT 1");
header("Location: player.php?playerid=$playerid&say=press");
}

$action=$_GET['action'];


//visible scout pick skills

if ($action=='lasts') {
$gnmm = mysql_query("SELECT * FROM scouts WHERE playerid='$playerid' AND teamid='$trueclub' LIMIT 1") or die (mysql_error());
if (mysql_num_rows($gnmm)) {$snravf = 44;}
}


//sacking youth player (deletion)

if ($action=='delyp') {
mysql_query("DELETE FROM players WHERE club='$trueclub' AND coach='9' AND id='$playerid' LIMIT 1") or die (mysql_error());
header('Location: yteam.php');
}
if ($action=='totheby') {
mysql_query("UPDATE players SET club=0, shirt=NULL WHERE age=15 AND quality > 56 AND quality < 100 AND club=$trueclub AND coach=9 AND id=$playerid LIMIT 1") or die (mysql_error());
header('Location: transfermarket.php?action=buyouth');
}


//call up to NT

if ($action=='call' AND $natcoach==1) {
$maxnumber = mysql_query("SELECT id FROM players WHERE country LIKE '$nt_country' AND ntplayer=1");
if (mysql_num_rows($maxnumber)>13) {header( "Location: player.php?playerid=$playerid&error=ntn" );die ();}
$prevntp = mysql_query("SELECT club, coach, ntplayer FROM players WHERE country='$nt_country' AND id=$playerid LIMIT 1") or die (mysql_error());
if (!mysql_num_rows($prevntp)) {header( "Location: index.php" );die ();}
if (mysql_result($prevntp,0,"ntplayer")>0) {header( "Location: player.php?playerid=$playerid&error=nta" );die ();}
if (mysql_result($prevntp,0,"club")==0 OR mysql_result($prevntp,0,"club")==99999) {header("Location: player.php?playerid=$playerid&error=pnc" );die ();}
if (mysql_result($prevntp,0,"coach")==9) {header("Location: player.php?playerid=$playerid&error=mty" );die ();}
mysql_query("UPDATE players SET ntplayer=1 WHERE id=$playerid LIMIT 1") or die (mysql_error());
if ($nt_country=='Bosnia') {mysql_query("UPDATE countries SET mood=greatest(mood-3,0) WHERE country LIKE 'Bosnia and Herzegovina' LIMIT 1") or die (mysql_error());} else {mysql_query("UPDATE countries SET mood=greatest(mood-3,0) WHERE country LIKE '$nt_country' LIMIT 1") or die (mysql_error());}
header ( "Location: nationalteams.php" );
}
if ($action=='uncall' AND $natcoach==1) {
$maxnumber = mysql_query("SELECT id FROM players WHERE country LIKE '$nt_country' AND ntplayer=1 AND id=$playerid");
if (!mysql_num_rows($maxnumber)) {header( "Location: player.php?playerid=$playerid" );die ();}
mysql_query("UPDATE players SET ntplayer=0, ntshirt=NULL WHERE id=$playerid LIMIT 1") or die (mysql_error());
if ($nt_country=='Bosnia') {mysql_query("UPDATE countries SET mood=greatest(mood-5,0) WHERE country LIKE 'Bosnia and Herzegovina' LIMIT 1") or die (mysql_error());} else {mysql_query("UPDATE countries SET mood=greatest(mood-5,0) WHERE country LIKE '$nt_country' LIMIT 1") or die (mysql_error());}
header ( "Location: nationalteams.php" );
}
if ($action=='call' AND $natcoach==2) {
$maxnumber = mysql_query("SELECT id FROM players WHERE country LIKE '$nt_country' AND ntplayer=2");
if (mysql_num_rows($maxnumber)>13) {header( "Location: player.php?playerid=$playerid&error=ntn" ); die ();}
$prevntp = mysql_query("SELECT club, age, coach, ntplayer FROM players WHERE country='$nt_country' AND id=$playerid LIMIT 1") or die (mysql_error());
if (!mysql_num_rows($prevntp)) {header( "Location: index.php" ); die ();}
if (mysql_result($prevntp,0,"age")>19) {header( "Location: player.php?playerid=$playerid&error=aer" );die ();}
if (mysql_result($prevntp,0,"ntplayer")>0) {header( "Location: player.php?playerid=$playerid&error=nta" );die ();}
if (mysql_result($prevntp,0,"club")==0 OR mysql_result($prevntp,0,"club")==99999) {header("Location: player.php?playerid=$playerid&error=pnc" );die ();}
if (mysql_result($prevntp,0,"coach")==9) {header("Location: player.php?playerid=$playerid&error=mty" );die ();}
$prevntDP = mysql_query("SELECT * FROM `transfers` WHERE `playerclub` LIKE 'Draft pick no.%' AND `sellingid`=0 AND `playerid`=$playerid LIMIT 1") or die (mysql_error());
if (mysql_num_rows($prevntDP)==1) {header( "Location: player.php?playerid=$playerid&error=dp" ); die ();}
mysql_query("UPDATE players SET ntplayer=2 WHERE id=$playerid LIMIT 1") or die (mysql_error());
if ($nt_country=='Bosnia') {mysql_query("UPDATE u18countries SET mood=greatest(mood-3,0) WHERE country LIKE 'Bosnia and Herzegovina' LIMIT 1") or die (mysql_error());} else {mysql_query("UPDATE u18countries SET mood=greatest(mood-3,0) WHERE country LIKE '$nt_country' LIMIT 1") or die (mysql_error());}
header ( "Location: u18teams.php" );
}
if ($action=='uncall' AND $natcoach==2) {
$maxnumber = mysql_query("SELECT id FROM players WHERE country LIKE '$nt_country' AND ntplayer=2 AND id=$playerid");
if (!mysql_num_rows($maxnumber)) {header( "Location: player.php?playerid=$playerid" ); die ();}
mysql_query("UPDATE players SET ntplayer=0, ntshirt=NULL WHERE id=$playerid LIMIT 1") or die (mysql_error());
if ($nt_country=='Bosnia') {mysql_query("UPDATE u18countries SET mood=greatest(mood-4,0) WHERE country LIKE 'Bosnia and Herzegovina' LIMIT 1") or die (mysql_error());} else {mysql_query("UPDATE u18countries SET mood=greatest(mood-4,0) WHERE country LIKE '$nt_country' LIMIT 1") or die (mysql_error());}
header ( "Location: u18teams.php" );
}

$ex=$_GET['ex'];
if ($ex<>'yes') {$result = mysql_query("SELECT * FROM players WHERE id='$playerid' LIMIT 1");
if (mysql_num_rows($result) < 1) {header("Location: player.php?playerid=$playerid&ex=yes"); die();}
while($r=mysql_fetch_array($result)) {
$name=$r["name"];
$surname=$r["surname"];
$age=$r["age"];
$club=$r["club"];
$country=$r["country"];
$charac=$r["charac"];
$height=$r["height"];
$weight=$r["weight"];
$handling=$r["handling"];
$speed=$r["speed"];
$passing=$r["passing"];
$vision=$r["vision"];
$rebounds=$r["rebounds"];
$position=$r["position"];
$freethrow=$r["freethrow"];
$shooting=$r["shooting"];
$defense=$r["defense"];
$workrate=$r["workrate"];
$experience=$r["experience"];
$fatigue=$r["fatigue"];
$wage=$r["wage"];
$coach=$r["coach"];
$lasttekma=$r["orient"];
$hawr=$r["quality"];
$zeimatren=$r["price"];
$secasa=$r["motiv"];
$isonsale=$r["isonsale"];
$face=$r["face"];
$ears=$r["ears"];
$mouth=$r["mouth"];
$eyes=$r["eyes"];
$nose=$r["nose"];
$mustage=$r["mustage"];
$hair=$r["hair"];
$star_qual=$r["star_qual"];
$star_posit=$r["star_posit"];
$injury_time=$r["injury"];
$ntplayer=$r["ntplayer"];
$shirtnum=$r["shirt"];
$hesay=$r["statement"];
}

if ($snravf==44 AND $club==0) {$club=99999;}

$signuYT = 25000 + (($handling + $speed + $passing + $vision + $rebounds + $position + $freethrow + $shooting + $defense + $workrate) * ($handling + $speed + $passing + $vision + $rebounds + $position + $freethrow + $shooting + $defense + $workrate) * 10);
if ($hawr==0) {$signuYT = round((1/60) * $signuYT);} else {$signuYT = round(($hawr/60) * $signuYT);}
if ($shirtnum==0) {$shirtnum='';}
$hesay = stripslashes($hesay);
$dcountry = $country; if ($dcountry=='Bosnia') {$dcountry = 'Bosnia and Herzegovina';}


//player promotion

if ($coach==9 AND $action=='ptst') {
$izhod1 = $handling+$speed+$passing+$vision+$rebounds+$position+$freethrow+$shooting+$defense;
if ($izhod1 < 180 AND $hawr < 41) {$spod=14; $zgor=56;}
elseif ($izhod1 > 179 AND $izhod1 < 299 AND $hawr < 41) {$spod=10; $zgor=56;}
elseif ($izhod1 > 179 AND $izhod1 < 299 AND $hawr > 80) {$spod=7; $zgor=46;}
elseif ($izhod1 < 180 AND $hawr > 40 AND $hawr < 81) {$spod=10; $zgor=49;}
elseif ($izhod1 > 298 AND $hawr < 41) {$spod=13; $zgor=49;}
elseif ($izhod1 > 298 AND $hawr > 80) {$spod=9; $zgor=41;}
else {$spod=9; $zgor=48;}
if ($izhod1 > 477) {$zgor=$zgor-14;}
if ($age==16) {$spod=$spod-1; $zgor=$zgor-2; $cexperience = round(rand(1,7) * ($age/106), 2);}
if ($age==17) {$cexperience = round(rand(5,29) * ($age/104), 2);}
if ($handling==0) {$new_handling=rand($spod,$zgor);} else {$new_handling=$handling;}
if ($speed==0) {$new_speed=rand($spod,$zgor);} else {$new_speed=$speed;}
if ($passing==0) {$new_passing=rand($spod,$zgor);} else {$new_passing=$passing;}
if ($vision==0) {$new_vision=rand($spod,$zgor);} else {$new_vision=$vision;}
if ($rebounds==0) {$new_rebounds=rand($spod,$zgor);} else {$new_rebounds=$rebounds;}
if ($position==0) {$new_position=rand($spod,$zgor);} else {$new_position=$position;}
if ($freethrow==0) {$new_freethrow=rand($spod,$zgor);} else {$new_freethrow=$freethrow;}
if ($shooting==0) {$new_shooting=rand($spod,$zgor);} else {$new_shooting=$shooting;}
if ($defense==0) {$new_defense=rand($spod,$zgor);} else {$new_defense=$defense;}

$value5 = ($height * 2) + $new_handling + ($new_speed * 4) + ($new_passing * 2) + ($new_vision * 2) + ($new_rebounds * 3) + ($new_position * 4) + ($new_freethrow * 3) + ($new_shooting * 4) + ($cexperience * 2) + ($new_defense * 3);
$value5 = (($value5 * $value5 * $value5) / 225000) - 7500;
if ($value5 < 200) {$value5=200;}
$value=((($value5/9)*($value5/9))/15)*(($value5/240000+(1/(exp(pow((($age-16)/10),4.1)))))*(((($hawr/8)+1)/19)+1))*((sqrt($value5/180000))/((((tanh((($age/2)-10))/2)+0.5)*0.71)+0.29));
if ($value < 1000) {$value=1000;}
//new wage
$waw = (($new_handling * (((-tanh((($height-190)/6)-2.5))/4)+0.75)) + ($new_speed * (((-tanh((($height-190)/6)-2.5))/10)+0.9)) + ($new_passing * (((-tanh((($height-190)/6)-2.5))/6.5)+0.75)) + ($new_vision * ((((tanh((($height-180)/3)-2.5))/20)+0.85)+(((-tanh((($height-200)/3)-2.5))/10)+0.8)-0.9)) + ($new_rebounds * (((tanh((($height-185)/6)-2.5))/2.5)+0.6)) + ($new_position * ((((-tanh((($height-180)/3)-2.5))/6.6)+0.55)+(((tanh((($height-200)/3)-2.5))/3.33)+0.8)-0.5)) + ($new_freethrow) + ($new_shooting * ((((tanh((($height-180)/3)-2.5))/6.6)+0.85)+(((-tanh((($height-200)/3)-2.5))/6.6)+0.85)-1)) + ($cexperience * 0.5) + ($new_defense)) *4;
$waw = (($waw*$waw*$waw)/225000)-7500;
if ($waw < 200) {$waw=200;}

$resultYC = mysql_query("UPDATE players SET handling=$new_handling, speed=$new_speed, passing=$new_passing, vision=$new_vision, rebounds=$new_rebounds, position=$new_position, freethrow=$new_freethrow, shooting=$new_shooting, defense=$new_defense, workrate=$hawr, experience=$cexperience, wage = $waw, coach=0, quality=0, price=0, motiv=0, shirt=NULL WHERE club=$trueclub AND coach=9 AND age > 15 AND id=$playerid LIMIT 1") or die (mysql_error());
if($resultYC){
$cenaza = round(0.15*$value);
$cenapr = number_format($cenaza, 0, ',', '.');
$cenane = 0-$cenaza;
mysql_query("UPDATE teams SET curmoney=curmoney-$cenaza WHERE teamid =$trueclub LIMIT 1") or die(mysql_error());
mysql_query("INSERT INTO events VALUES ('', $trueclub, NOW(), '<a href=player.php?playerid=$playerid>Camp player</a> was promoted from youths to senior team at a cost of $cenapr &euro;.', 1, $cenane);");
//transfer
$pos=rand(1,5);
$ftime = time(); $fyear=date('Y', $ftime); $fmonth=date('m', $ftime); $fday=date('d', $ftime); $fhour=date('H', $ftime); $fmin=date('i', $ftime); $fsec=date('s', $ftime);
mysql_query("INSERT INTO transfers VALUES ('', $playerid, 'Youth camp', 0, '$country', 0, $pos, '$fyear=$fmonth=$fday $fhour+$fmin+$fsec', 1, $userid, '$clubbid', 0, $value);");
}
header ( "Location: players.php" );
}
//end of promotion

//value
$value5 = ($height * 2) + $handling + ($speed * 4) + ($passing * 2) + ($vision * 2) + ($rebounds * 3) + ($position * 4) + ($freethrow * 3) + ($shooting * 4) + ($experience * 2) + ($defense * 3);
$value5 = (($value5 * $value5 * $value5) / 225000) - 7500;
if ($value5 < 200) {$value5=200;}
//if ($playerid==3742111) {$value5=34293;}
$value=((($value5/9)*($value5/9))/15)*(($value5/240000+(1/(exp(pow((($age-16)/10),4.1)))))*(((($workrate/8)+1)/19)+1))*((sqrt($value5/180000))/((((tanh((($age/2)-10))/2)+0.5)*0.71)+0.29));
if ($value < 1000) {$value=1000;}
$gage=$age+1;
$ww = ((($value5/9)*($value5/9))/15)*(($value5/240000+(1/(exp(pow((($gage-16)/10),4.1)))))*(((($hawr/8)+1)/19)+1))*((sqrt($value5/180000))/((((tanh((($gage/2)-10))/2)+0.5)*0.71)+0.29));
if ($ww < 1000) {$ww=1000;}

//testni value
$w = (($handling * (((-tanh((($height-190)/6)-2.5))/4)+0.75)) + ($speed * (((-tanh((($height-190)/6)-2.5))/10)+0.9)) + ($passing * (((-tanh((($height-190)/6)-2.5))/6.5)+0.75)) + ($vision * ((((tanh((($height-180)/3)-2.5))/20)+0.85)+(((-tanh((($height-200)/3)-2.5))/10)+0.8)-0.9)) + ($rebounds * (((tanh((($height-185)/6)-2.5))/2.5)+0.6)) + ($position * ((((-tanh((($height-180)/3)-2.5))/6.6)+0.55)+(((tanh((($height-200)/3)-2.5))/3.33)+0.8)-0.5)) + ($freethrow) + ($shooting * ((((tanh((($height-180)/3)-2.5))/6.6)+0.85)+(((-tanh((($height-200)/3)-2.5))/6.6)+0.85)-1)) + ($experience * 0.5) + ($defense)) *4;
$w = (($w*$w*$w)/225000)-7500;
if ($w < 1000) {$w=200;}
/*
$value444=((($w/9)*($w/9))/15)*(($w/240000+(1/(exp(pow((($age-16)/10),4.1)))))*(((($workrate/8)+1)/19)+1))*((sqrt($w/180000))/((((tanh((($age/2)-10))/2)+0.5)*0.71)+0.29));
if ($value444 < 1000) {$value444=1000;}
if ($age > 28) {
$valueN320 = ($handling + $speed + $passing + $vision + $rebounds + $position + $freethrow + $shooting + $experience + $defense)*3.3;
$valueN330 = ($handling + $speed + $passing + $vision + $rebounds + $position + $freethrow + $shooting + ($experience-($experience-(pow($experience,(1.95/2))))) + $defense)*3.3;
$valueM320 = (($valueN320*$valueN320*$valueN320)/225000)-7500;
$valueM330 = (($valueN330*$valueN330*$valueN330)/225000)-7500;
$valueFF=((($valueM320/9)*($valueM320/9))/15)*(($valueM320/240000+(1/(exp(pow((($age-16)/10),4.1))))))*(((($workrate/8)+1)/19)+1)*((sqrt($valueM320/180000))/((((tanh((($age/2)-10))/2)+0.5)*0.71)+0.29));
$valueGG=((($valueM330/9)*($valueM330/9))/15)*(($valueM330/240000+(1/(exp(pow((($age-16)/10),4.1))))))*(((($workrate/8)+1)/19)+1)*((sqrt($valueM330/180000))/((((tanh((($age/2)-10))/2)+0.5)*0.71)+0.29));
} else {
$valueN320 = ($handling + $speed + $passing + $vision + $rebounds + $position + $freethrow + $shooting + $experience + $defense)*((-0.05*($age-16))+3.8);
$valueN330 = ($handling + $speed + $passing + $vision + $rebounds + $position + $freethrow + $shooting + ($experience-($experience-(pow($experience,(1.95/2))))) + $defense)*((-0.05*($age-16))+3.8);
$valueM320 = (($valueN320*$valueN320*$valueN320)/225000)-7500;
$valueM330 = (($valueN330*$valueN330*$valueN330)/225000)-7500;
$valueFF=((($valueM320/9)*($valueM320/9))/15)*(($valueM320/240000+(1/(exp(pow((($age-16)/10),4.1))))))*(((($workrate/8)+1)/19)+1)*((sqrt($valueM320/180000))/((((tanh((($age/2)-10))/2)+0.5)*0.71)+0.29));
$valueGG=((($valueM330/9)*($valueM330/9))/15)*(($valueM330/240000+(1/(exp(pow((($age-16)/10),4.1))))))*(((($workrate/8)+1)/19)+1)*((sqrt($valueM330/180000))/((((tanh((($age/2)-10))/2)+0.5)*0.71)+0.29));
}
$valueN320 = ($handling + $speed + $passing + $vision + $rebounds + $position + $freethrow + $shooting + $experience + $defense)*3.2; $valueM320 = (($valueN320*$valueN320*$valueN320)/225000)-7500;
$valueN330 = ($handling + $speed + $passing + $vision + $rebounds + $position + $freethrow + $shooting + $experience + $defense)*3.3; $valueM330 = (($valueN330*$valueN330*$valueN330)/225000)-7500;
$valueN340 = ($handling + $speed + $passing + $vision + $rebounds + $position + $freethrow + $shooting + $experience + $defense)*3.4; $valueM340 = (($valueN340*$valueN340*$valueN340)/225000)-7500;
$valueN350 = ($handling + $speed + $passing + $vision + $rebounds + $position + $freethrow + $shooting + $experience + $defense)*3.5; $valueM350 = (($valueN350*$valueN350*$valueN350)/225000)-7500;
$valueN360 = ($handling + $speed + $passing + $vision + $rebounds + $position + $freethrow + $shooting + $experience + $defense)*3.6; $valueM360 = (($valueN360*$valueN360*$valueN360)/225000)-7500;
$valueN370 = ($handling + $speed + $passing + $vision + $rebounds + $position + $freethrow + $shooting + $experience + $defense)*3.7; $valueM370 = (($valueN370*$valueN370*$valueN370)/225000)-7500;
$valueN380 = ($handling + $speed + $passing + $vision + $rebounds + $position + $freethrow + $shooting + $experience + $defense)*3.8; $valueM380 = (($valueN380*$valueN380*$valueN380)/225000)-7500;
$valueF320=((($valueM320/9)*($valueM320/9))/15)*(($valueM320/240000+(1/(exp(pow((($age-16)/10),4.1))))))*(((($workrate/8)+1)/19)+1)*((sqrt($valueM320/180000))/((((tanh((($age/2)-10))/2)+0.5)*0.71)+0.29));
$valueF330=((($valueM330/9)*($valueM330/9))/15)*(($valueM330/240000+(1/(exp(pow((($age-16)/10),4.1))))))*(((($workrate/8)+1)/19)+1)*((sqrt($valueM330/180000))/((((tanh((($age/2)-10))/2)+0.5)*0.71)+0.29));
$valueF340=((($valueM340/9)*($valueM340/9))/15)*(($valueM340/240000+(1/(exp(pow((($age-16)/10),4.1))))))*(((($workrate/8)+1)/19)+1)*((sqrt($valueM340/180000))/((((tanh((($age/2)-10))/2)+0.5)*0.71)+0.29));
$valueF350=((($valueM350/9)*($valueM350/9))/15)*(($valueM350/240000+(1/(exp(pow((($age-16)/10),4.1))))))*(((($workrate/8)+1)/19)+1)*((sqrt($valueM350/180000))/((((tanh((($age/2)-10))/2)+0.5)*0.71)+0.29));
$valueF360=((($valueM360/9)*($valueM360/9))/15)*(($valueM360/240000+(1/(exp(pow((($age-16)/10),4.1))))))*(((($workrate/8)+1)/19)+1)*((sqrt($valueM360/180000))/((((tanh((($age/2)-10))/2)+0.5)*0.71)+0.29));
$valueF370=((($valueM370/9)*($valueM370/9))/15)*(($valueM370/240000+(1/(exp(pow((($age-16)/10),4.1))))))*(((($workrate/8)+1)/19)+1)*((sqrt($valueM370/180000))/((((tanh((($age/2)-10))/2)+0.5)*0.71)+0.29));
$valueF380=((($valueM380/9)*($valueM380/9))/15)*(($valueM380/240000+(1/(exp(pow((($age-16)/10),4.1))))))*(((($workrate/8)+1)/19)+1)*((sqrt($valueM380/180000))/((((tanh((($age/2)-10))/2)+0.5)*0.71)+0.29));
*/

//odpust
$resultfire = mysql_query("SELECT club, isonsale, ntplayer FROM players WHERE id='$playerid'") or die (mysql_error());
if (!mysql_num_rows($resultfire)) {die(include 'index.php');}
$playersteam = mysql_result($resultfire,0,"club");
$sale400 = mysql_result($resultfire,0,"isonsale");
$ntpnoo = mysql_result($resultfire,0,"ntplayer");
if ($action=='fire') {
if ($sale400==1) {header("Location: player.php?playerid=$playerid&error=tm");die ();}
if ($trueclub<>$playersteam) {header("Location: player.php?playerid=$playerid&error=oc");die ();}
if ($ntpnoo >0) {header("Location: player.php?playerid=$playerid&error=nnt");die ();}
$dod = mysql_query("SELECT * FROM players WHERE coach=0 AND club=$trueclub");
if (mysql_num_rows($dod) <6) {header("Location: player.php?playerid=$playerid&error=cfp");die ();}
mysql_query("UPDATE players SET club=0, has_played=0, last_position=1, shirt=NULL WHERE coach=0 AND id='$playerid' LIMIT 1") or die (mysql_error());
mysql_query("INSERT INTO events VALUES ('', $trueclub, NOW(), '<a href=player.php?playerid=$playerid>$langmark404</a> $langmark090.', 0, 0);");
//"prestop"
$namesee = mysql_query("SELECT name, country FROM teams WHERE teamid='$trueclub' LIMIT 1") or die (mysql_error());
$namesee2 = mysql_result($namesee,0,"name");
$csee2 = mysql_result($namesee,0,"country");
//polozaj in cas
$ranpos=mt_rand(1,5);
$ftime = time(); $fyear=date('Y', $ftime);
$fmonth=date('m', $ftime);
$fday=date('d', $ftime);
$fhour=date('H', $ftime);
$fmin=date('i', $ftime);
$fsec=date('s', $ftime);
$freetransf = "INSERT INTO transfers VALUES ('', $playerid, '$namesee2', $userid, '$csee2', 0, $ranpos, '$fyear=$fmonth=$fday $fhour+$fmin+$fsec', 1, 0, 'Free Transfer', 0, $value);";
mysql_query($freetransf);
header( 'Location: players.php' );
}
//konec odpusta

if (($country=='Japan' OR $country=='China' OR $country=='Philippines' OR $country=='Thailand' OR $country=='South Korea' OR $country=='Malaysia' OR $country=='Indonesia' OR $country=='Hong Kong') AND $eyes=='eyes1') {$eyes='eyes1c';}
elseif (($country=='Japan' OR $country=='China' OR $country=='Philippines' OR $country=='Thailand' OR $country=='South Korea' OR $country=='Malaysia' OR $country=='Indonesia' OR $country=='Hong Kong') AND $eyes=='eyes2') {$eyes='eyes2c';}
elseif (($country=='Japan' OR $country=='China' OR $country=='Philippines' OR $country=='Thailand' OR $country=='South Korea' OR $country=='Malaysia' OR $country=='Indonesia' OR $country=='Hong Kong') AND $eyes=='eyes3') {$eyes='eyes3c';}
elseif (($country=='Japan' OR $country=='China' OR $country=='Philippines' OR $country=='Thailand' OR $country=='South Korea' OR $country=='Malaysia' OR $country=='Indonesia' OR $country=='Hong Kong') AND $eyes=='eyes4') {$eyes='eyes4c';}
elseif (($country=='Japan' OR $country=='China' OR $country=='Philippines' OR $country=='Thailand' OR $country=='South Korea' OR $country=='Malaysia' OR $country=='Indonesia' OR $country=='Hong Kong') AND $eyes=='eyes5') {$eyes='eyes5c';}
elseif (($country=='Japan' OR $country=='China' OR $country=='Philippines' OR $country=='Thailand' OR $country=='South Korea' OR $country=='Malaysia' OR $country=='Indonesia' OR $country=='Hong Kong') AND $eyes=='eyes6') {$eyes='eyes6c';}
elseif (($country=='Japan' OR $country=='China' OR $country=='Philippines' OR $country=='Thailand' OR $country=='South Korea' OR $country=='Malaysia' OR $country=='Indonesia' OR $country=='Hong Kong') AND $eyes=='eyes7') {$eyes='eyes7c';}
elseif (($country=='Japan' OR $country=='China' OR $country=='Philippines' OR $country=='Thailand' OR $country=='South Korea' OR $country=='Malaysia' OR $country=='Indonesia' OR $country=='Hong Kong') AND $eyes=='eyes8') {$eyes='eyes8c';}
elseif (($country=='Japan' OR $country=='China' OR $country=='Philippines' OR $country=='Thailand' OR $country=='South Korea' OR $country=='Malaysia' OR $country=='Indonesia' OR $country=='Hong Kong') AND $eyes=='eyes9') {$eyes='eyes9c';}
elseif (($country=='Japan' OR $country=='China' OR $country=='Philippines' OR $country=='Thailand' OR $country=='South Korea' OR $country=='Malaysia' OR $country=='Indonesia' OR $country=='Hong Kong') AND $eyes=='eyes10') {$eyes='eyes10c';}
elseif (($country=='Japan' OR $country=='China' OR $country=='Philippines' OR $country=='Thailand' OR $country=='South Korea' OR $country=='Malaysia' OR $country=='Indonesia' OR $country=='Hong Kong') AND $eyes=='eyes11') {$eyes='eyes11c';}
elseif (($country=='Japan' OR $country=='China' OR $country=='Philippines' OR $country=='Thailand' OR $country=='South Korea' OR $country=='Malaysia' OR $country=='Indonesia' OR $country=='Hong Kong') AND $eyes=='eyes12') {$eyes='eyes12c';}
elseif (($country=='Japan' OR $country=='China' OR $country=='Philippines' OR $country=='Thailand' OR $country=='South Korea' OR $country=='Malaysia' OR $country=='Indonesia' OR $country=='Hong Kong') AND $eyes=='eyes13') {$eyes='eyes13c';}
elseif (($country=='Japan' OR $country=='China' OR $country=='Philippines' OR $country=='Thailand' OR $country=='South Korea' OR $country=='Malaysia' OR $country=='Indonesia' OR $country=='Hong Kong') AND $eyes=='eyes14') {$eyes='eyes14c';}
elseif (($country=='Japan' OR $country=='China' OR $country=='Philippines' OR $country=='Thailand' OR $country=='South Korea' OR $country=='Malaysia' OR $country=='Indonesia' OR $country=='Hong Kong') AND $eyes=='eyes15') {$eyes='eyes2c';}
elseif (($country=='Japan' OR $country=='China' OR $country=='Philippines' OR $country=='Thailand' OR $country=='South Korea' OR $country=='Malaysia' OR $country=='Indonesia' OR $country=='Hong Kong') AND $eyes=='eyes16') {$eyes='eyes2c';}
elseif (($country=='Japan' OR $country=='China' OR $country=='Philippines' OR $country=='Thailand' OR $country=='South Korea' OR $country=='Malaysia' OR $country=='Indonesia' OR $country=='Hong Kong') AND $eyes=='eyes17') {$eyes='eyes9c';}
if (($country=='Japan' OR $country=='China' OR $country=='Philippines' OR $country=='Thailand' OR $country=='South Korea' OR $country=='Malaysia' OR $country=='Indonesia' OR $country=='Hong Kong') AND $mustage=='kumis4') {$mustage='kumis0';}

$zaheader = $name." ".$surname;
}
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2><?=$langmark405?></h2>

<?php
if ($ex=='yes') {
//bivši igralec
echo "<table border=\"0\" cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\" valign=\"top\"><td class=\"border\" align=\"center\" width=\"30%\" bgcolor=\"#ffffff\">";
SWITCH ($playerid % 7) {
CASE 0: echo "<img src=\"img/circus.gif\" width=\"180\"></td><td class=\"border\" bgcolor=\"#ffffff\">A player has decided that there are more important things in life. He had quit basketball some time ago and have joined the circus instead. You won't see him on the court anymore."; break;
CASE 1: echo "<img src=\"img/basketsim.png\" width=\"180\"></td><td class=\"border\" bgcolor=\"#ffffff\">This player got badly addicted with an online game and his real basketball career was soon over. Only the most dedicated fans will remember him after a while."; break;
CASE 2: echo "<img src=\"img/rockstar.jpg\" width=\"180\"></td><td class=\"border\" bgcolor=\"#ffffff\">No one is sure what happened to this player. But people are saying that a new local rock star looks exactly like him. It's a real pitty, he was such a good player!"; break;
CASE 3: echo "<img src=\"img/recreation.jpg\" width=\"180\"></td><td class=\"border\" bgcolor=\"#ffffff\">After some consideration, a player has decided that he's not good enough. You will often see him playing on recreational level, but you won't see him again in the top notch Basketsim matches."; break;
CASE 4: echo "<img src=\"img/yoga.gif\" width=\"240\"></td><td class=\"border\" bgcolor=\"#ffffff\">The was too much pressure on this player and he was not able to handle it anymore. Don't expect to see him in any of the arenas anymore, but you might run into him in a yoga class."; break;
CASE 5: echo "<img src=\"img/weary.jpg\" width=\"240\"></td><td class=\"border\" bgcolor=\"#ffffff\">After feeling weary and tired for months, a player has decided it's time to end his career. Maybe his coach was a bit too harsh on him with the training schedule."; break;
CASE 6: echo "<img src=\"img/standup.jpg\" width=\"210\"></td><td class=\"border\" bgcolor=\"#ffffff\">After quiting the basketball, a player has revealed that he was always torn between his sports and standup comedian career. Finally, he made up his mind to be the funny guy."; break;
}
//echo "<br/><br/><a href=\"javascript: history.go(-1)\">Go back</a></td></tr></table>";
die();
}


//bookmark player

$joshk=0;
if ($is_supporter==1 OR $levelll >1) {
$already = mysql_query("SELECT * FROM bookmarks WHERE b_type=1 AND team='$trueclub' AND b_link='$playerid' LIMIT 1") or die(mysql_error());
$joshk=mysql_num_rows($already);
}
if ($action=='bookmark') {
$skupay = mysql_query("SELECT * FROM bookmarks WHERE b_type=1 AND team='$trueclub'") or die(mysql_error());
if ($joshk > 0) {echo "<table cellpadding=\"9\" cellspacing=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">",$langmark407," ",$langmark094," <a href=\"bookmarks.php\">",$langmark095,"</a>.</td></tr></table>";}
elseif (mysql_num_rows($skupay) > 300) {echo "<table cellpadding=\"9\" cellspacing=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">You have reached the limit of 300 bookmarked players.<br/>You need to remove some players from your bookmarks to be able to add new ones.</td></tr></table>";}
else {$ime = $name." ".$surname; $zapis = mysql_query("INSERT INTO bookmarks VALUES ('', $trueclub, '$ime', $playerid, 1, 0);") or die(mysql_error());
echo "<table cellpadding=\"9\" cellspacing=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">",$langmark408," ",$langmark094,"  <a href=\"bookmarks.php\">",$langmark095,"</a>.</td></tr></table>";}
}

$slika = '<img src=ocena.jpeg border=0 alt=*>';
if ($star_qual > 69 AND $star_qual < 92) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena1.jpeg border=0 alt=°>';}
elseif ($star_qual > 91 AND $star_qual < 114) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
elseif ($star_qual > 113 AND $star_qual < 136) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena1.jpeg border=0 alt=°>';}
elseif ($star_qual > 135 AND $star_qual < 158) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
elseif ($star_qual > 157 AND $star_qual < 180) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena1.jpeg border=0 alt=°>';}
elseif ($star_qual > 179 AND $star_qual < 202) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
elseif ($star_qual > 201 AND $star_qual < 224) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena1.jpeg border=0 alt=°>';}
elseif ($star_qual > 223 AND $star_qual < 247) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
elseif ($star_qual > 246 AND $star_qual < 279) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena1.jpeg border=0 alt=°>';}
elseif ($star_qual > 268 AND $star_qual < 291) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
elseif ($star_qual > 290 AND $star_qual < 313) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena1.jpeg border=0 alt=°>';}
elseif ($star_qual > 312 AND $star_qual < 335) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
elseif ($star_qual > 334 AND $star_qual < 357) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena1.jpeg border=0 alt=°>';}
elseif ($star_qual > 356 AND $star_qual < 379) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
elseif ($star_qual > 378 AND $star_qual < 401) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena1.jpeg border=0 alt=°>';}
elseif ($star_qual > 400) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}

SWITCH ($star_posit) {
CASE 1: $ppos=$langmark386."."; break;
CASE 2: $ppos=$langmark387."."; break;
CASE 3: $ppos=$langmark388."."; break;
CASE 4: $ppos=$langmark389."."; break;
CASE 5: $ppos=$langmark390."."; break;
}

//poskodbe
switch (TRUE) {
CASE ($injury_time ==0): $prikaz_poskodbe = '&nbsp;'; break;
CASE ($injury_time >0 AND $injury_time < 1): $prikaz_poskodbe = '&nbsp;<img src=/img/poskodbe/+1ok.gif border=0 height=16 title=Slightly&nbsp;injured,&nbsp;can&nbsp;play>&nbsp;'; break;
CASE ($injury_time >=1 AND $injury_time < 2): $prikaz_poskodbe = '&nbsp;<img src=/img/poskodbe/+1.gif border=0 height=16 title=Injured&nbsp;for&nbsp;1&nbsp;week>&nbsp;'; break;
CASE ($injury_time >=2 AND $injury_time < 3): $prikaz_poskodbe = '&nbsp;<img src=/img/poskodbe/+2.gif border=0 height=16 title=Injured&nbsp;for&nbsp;2&nbsp;weeks>&nbsp;'; break;
CASE ($injury_time >=3 AND $injury_time < 4): $prikaz_poskodbe = '&nbsp;<img src=/img/poskodbe/+3.gif border=0 height=16 title=Injured&nbsp;for&nbsp;3&nbsp;weeks>&nbsp;'; break;
CASE ($injury_time >=4 AND $injury_time < 5): $prikaz_poskodbe = '&nbsp;<img src=/img/poskodbe/+4.gif border=0 height=16 title=Injured&nbsp;for&nbsp;4&nbsp;weeks>&nbsp;'; break;
CASE ($injury_time >=5 AND $injury_time < 6): $prikaz_poskodbe = '&nbsp;<img src=/img/poskodbe/+5.gif border=0 height=16 title=Injured&nbsp;for&nbsp;5&nbsp;weeks>&nbsp;'; break;
CASE ($injury_time >=6 AND $injury_time < 7): $prikaz_poskodbe = '&nbsp;<img src=/img/poskodbe/+6.gif border=0 height=16 title=Injured&nbsp;for&nbsp;6&nbsp;weeks>&nbsp;'; break;
CASE ($injury_time >=7 AND $injury_time < 8): $prikaz_poskodbe = '&nbsp;<img src=/img/poskodbe/+7.gif border=0 height=16 title=Injured&nbsp;for&nbsp;7&nbsp;weeks>&nbsp;'; break;
CASE ($injury_time >=8 AND $injury_time < 9): $prikaz_poskodbe = '&nbsp;<img src=/img/poskodbe/+8.gif border=0 height=16 title=Injured&nbsp;for&nbsp;8&nbsp;weeks>&nbsp;'; break;
CASE ($injury_time >=9): $prikaz_poskodbe = '&nbsp;<img src=/img/poskodbe/+9.gif border=0 height=16 title=Injured&nbsp;for&nbsp;9&nbsp;weeks>&nbsp;'; break;
}

SWITCH (TRUE) {
CASE ($charac < 4): $spec_txt=$langmark763; break;
CASE ($charac > 3 && $charac < 7): $spec_txt=$langmark764; break;
CASE ($charac > 6 && $charac < 11): $spec_txt=$langmark765; break;
CASE ($charac > 10 && $charac < 14): $spec_txt=$langmark766; break;
CASE ($charac > 13 && $charac < 17): $spec_txt=$langmark767; break;
CASE ($charac > 16 && $charac < 20): $spec_txt=$langmark768; break;
CASE ($charac > 19 && $charac < 23): $spec_txt='dirty'; break;
CASE ($charac > 22 && $charac < 26): $spec_txt='clumsy'; break;
CASE ($charac > 25 && $charac < 30): $spec_txt='explosive'; break;
CASE ($charac > 29 && $charac < 33): $spec_txt='loyal'; break;
CASE ($charac > 32 && $charac < 35): $spec_txt='wise'; break;
CASE ($charac > 34 && $charac < 39): $spec_txt='fragile'; break;
CASE ($charac > 38 && $charac < 41): $spec_txt='tough'; break;
CASE ($charac > 40 && $charac < 44): $spec_txt='lazy'; break;
}
?>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="57%">

<?php
$feetheight = floor((100*$height)/3048);
$tempheight = $height - ($feetheight*3048/100);
$inchheight = round((100*$tempheight)/254);
if ($inchheight==12) {
$feetheight=$feetheight+1; $inchheight='';
$usheight = $feetheight."'0";}
else {$usheight = $feetheight."'".$inchheight;}
$usweight = round ($weight * 22046 / 10000);
$disvalue5 = number_format($value5, 0, ',', '.');
$vrednostij = number_format($vrednostij, 0, ',', '.');

$result17 = mysql_query("SELECT userid, supporter, lastip FROM users WHERE club=$club LIMIT 1");
if (mysql_num_rows($result17)>0) {
$clubus = mysql_result($result17,0,"userid");
$suppus = mysql_result($result17,0,"supporter");
$lastIPs = mysql_result($result17,0,"lastip");
}

$error=$_GET['error'];
if ($error=='tm' AND $isonsale==1) {echo "<b><font color=\"darkred\">",$langmark402,"</font></b><br/><br/>";}
elseif ($error=='oc' AND $club<>$trueclub) {echo "<b><font color=\"darkred\">",$langmark403,"</font></b><br/><br/>";}
elseif ($error=='nnt') {echo "<b><font color=\"darkred\">A national team player cannot be fired!</font></b><br/><br/>";}
elseif ($error=='aer') {echo "<b><font color=\"darkred\">This player is too old to be enrolled!</font></b><br/><br/>";}
elseif ($error=='nta') {echo "<b><font color=\"darkred\">This player is already a member of the national team!</font></b><br/><br/>";}
elseif ($error=='ntn') {echo "<b><font color=\"darkred\">There are currently no empty slots in the national team!</font></b><br/><br/>";}
elseif ($error=='pnc') {echo "<b><font color=\"darkred\">You can't enroll a clubless player!</font></b><br/><br/>";}
elseif ($error=='cfp') {echo "<b><font color=\"darkred\">You need to have at least 5 players in your team!</font></b><br/><br/>";}
elseif ($error=='mty') {echo "<b><font color=\"darkred\">YT players are unavailable for the national team selection!</font></b><br/><br/>";}
elseif ($error=='dp') {echo "<b><font color=\"darkred\">Drafted players are unavailable for the junior national team selection!</font></b><br/><br/>";}

$psay = $_GET["say"];

echo "<b>",$shirtnum," ",$name," ",$surname," (",$playerid,")</b>";
if ($ntplayer==1) {echo "&nbsp;<img src=\"img/Flags/",$country,".png\" border=\"0\" alt=\"",$langmark378," ",$dcountry,"\" title=\"",$langmark378," ",$dcountry,"\">";}
if ($ntplayer==2) {echo "&nbsp;<img src=\"img/Flags/",$country,".png\" border=\"0\" alt=\"",$langmark378," ",$dcountry," U19\" title=\"",$langmark378," ",$dcountry," U19\">";}
if ($coach==9) {
$dodnt15 = @mysql_query("SELECT id FROM u15players WHERE id=$playerid LIMIT 1");
if (@mysql_num_rows($dodnt15)) {echo "&nbsp;<img src=\"img/Flags/",$country,".png\" border=\"0\" alt=\"",$langmark378," ",$dcountry," U15\" title=\"",$langmark378," ",$dcountry," U15\">"; $coachriba='lod';}
}
if (($is_supporter==1 OR $levelll >1) AND $joshk==0) {echo "&nbsp;<a href=\"player.php?playerid=",$playerid,"&action=bookmark\"><img src=\"img/bookmark.jpg\" border=\"0\" alt=\"",$langmark410,"\" title=\"",$langmark410,"\"></a>";}
if (($is_supporter==1 OR $levelll >1) AND $joshk>0) {echo "&nbsp;<img src=\"img/bookmarkY.jpg\" border=\"0\" alt=\"bookmarked\" title=\"Player already bookmarked\">";}
if ($clubus==$userid && $is_supporter==1 && $coach<>1 && ($psay=='press' || strlen(trim($hesay))==0)) {echo "&nbsp;<a href=\"player.php?playerid=",$playerid,"&say=edit\"><img src=\"img/say.gif\" alt=\"Set statement\" title=\"Set statement\" border=\"0\"></a>";}
if ($clubus==$userid && $suppus==1 && $coach<>1 && $psay<>'press' && strlen(trim($hesay))>0) {echo "&nbsp;<a href=\"player.php?playerid=",$playerid,"&say=press\"><img src=\"img/say.gif\" alt=\"Show statement\" title=\"Show statement\" border=\"0\"></a>";}
if ($clubus<>$userid && $coach<>1 && strlen(trim($hesay))>0 && $psay<>'press' && $suppus==1) {echo "&nbsp;<a href=\"player.php?playerid=",$playerid,"&say=press\"><img src=\"img/say.gif\" alt=\"Show statement\" title=\"Show statement\" border=\"0\"></a>";}
if ($clubus<>$userid && $coach<>1 && strlen(trim($hesay))>0 && $psay=='press' && $suppus==1) {echo "&nbsp;<a href=\"player.php?playerid=",$playerid,"\"><img src=\"img/say.gif\" alt=\"Hide statement\" title=\"Hide statement\" border=\"0\"></a>";}

echo $prikaz_poskodbe,"<br/><hr/>";
if (strlen(trim($hesay))>0 && $psay=='press') {echo "<i>",$hesay,"</i><hr/>";}
if ($dayz=='off') {echo "<font color=\"green\"><b>Citizenship request sent!</b></font><hr/>";}
if ($dayz=='on') {echo "<font color=\"#336666\">",$present,"</font>";
//naturalizacija
if ($timeof > 1094 AND $coach==0 AND $ntplayer==0 AND $hawr==0) {
$davk = mysql_query("SELECT MAX(`timeofsale`) AS `tub` FROM transfers WHERE playerid=$playerid");
if (mysql_num_rows($davk)) {
$timeic = mysql_result($davk,0,"tub");
$splitdatetime = explode(" ", $timeic); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$dayss = (int)((mktime (0,0,0,$dbmonth,$dbday,$dbyear) - time(void))/86400);
$koncprev = abs($dayss);
}
$stteke = mysql_query("SELECT * FROM nt_statistics WHERE player=$playerid");
if (!mysql_num_rows($stteke) AND $koncprev > 1094 AND ($fukja <> $country) AND $age > 23 AND $fukja<>'China' AND $country<>'China') {echo " <b><a href=\"player.php?playerid=".$playerid."&dayz=nat&ch=".rand(39654,79689)."\">Request citizenship!</a></b>";}
}
echo "<hr/>";
}
if ($clubus==$userid AND $psay=='edit' AND $is_supporter==1) {
?>
<form method="post" action="<?php echo "player.php?playerid=",$playerid;?>" style="margin: 0">
<input type="text" maxlength="156" size="50" name="zjav" value="<?=$hesay?>" class="inputreg">
<input type="submit" value="Set" class="buttonreg"><br/>
</form>
<hr/>
<?php
}
$wsal = $_GET["changeto"];
if ($is_supporter==1){?><table cellpadding="0" cellspacing="0" width="100%"><tr><td align="left"><img src="faces/template.php?kepal=<?=$face?>&teling=<?=$ears?>&mat=<?=$eyes?>&mulut=<?=$mouth?>&hidung=<?=$nose?>&kumis=<?=$mustage?>&rambut=<?=$hair?>" border="1" alt="<?=$hesay?>" title="<?=$hesay?>"></td><td align="left"><table cellpadding="0" cellspacing="0" width="100%">
<?php } else { ?><table cellpadding="0" cellspacing="0" width="330"><?php }?>
<tr><td><b><?=$langmark113,":</b> ",$age?></td></tr>
<tr><td><b><?=$langmark114,":</b> <a class=\"greenhilite\" href=\"league.php?country=",$country,"\">",$dcountry?></a><?php
if ($coach==0 AND $hawr > 0) {
SWITCH ($hawr) {
CASE 1: echo "/<a class=\"greenhilite\" href=\"league.php?country=Slovenia\">Slovenia</a>"; break;
CASE 5: echo "/<a class=\"greenhilite\" href=\"league.php?country=Romania\">Romania</a>"; break;
CASE 3: echo "/<a class=\"greenhilite\" href=\"league.php?country=Portugal\">Portugal</a>"; break;
CASE 4: echo "/<a class=\"greenhilite\" href=\"league.php?country=Poland\">Poland</a>"; break;
CASE 5: echo "/<a class=\"greenhilite\" href=\"league.php?country=Netherlands\">Netherlands</a>"; break;
CASE 6: echo "/<a class=\"greenhilite\" href=\"league.php?country=Lithuania\">Lithuania</a>"; break;
CASE 7: echo "/<a class=\"greenhilite\" href=\"league.php?country=Latvia\">Latvia</a>"; break;
CASE 8: echo "/<a class=\"greenhilite\" href=\"league.php?country=Italy\">Italy</a>"; break;
CASE 9: echo "/<a class=\"greenhilite\" href=\"league.php?country=Israel\">Israel</a>"; break;
CASE 10: echo "/<a class=\"greenhilite\" href=\"league.php?country=Croatia\">Croatia</a>"; break;
CASE 11: echo "/<a class=\"greenhilite\" href=\"league.php?country=France\">France</a>"; break;
CASE 12: echo "/<a class=\"greenhilite\" href=\"league.php?country=Spain\">Spain</a>"; break;
CASE 13: echo "/<a class=\"greenhilite\" href=\"league.php?country=Estonia\">Estonia</a>"; break;
CASE 14: echo "/<a class=\"greenhilite\" href=\"league.php?country=Germany\">Germany</a>"; break;
CASE 15: echo "/<a class=\"greenhilite\" href=\"league.php?country=Chile\">Chile</a>"; break;
CASE 16: echo "/<a class=\"greenhilite\" href=\"league.php?country=Belgium\">Belgium</a>"; break;
CASE 17: echo "/<a class=\"greenhilite\" href=\"league.php?country=Argentina\">Argentina</a>"; break;
CASE 18: echo "/<a class=\"greenhilite\" href=\"league.php?country=USA\">USA</a>"; break;
CASE 19: echo "/<a class=\"greenhilite\" href=\"league.php?country=Serbia\">Serbia</a>"; break;
CASE 20: echo "/<a class=\"greenhilite\" href=\"league.php?country=Turkey\">Turkey</a>"; break;
CASE 21: echo "/<a class=\"greenhilite\" href=\"league.php?country=Greece\">Greece</a>"; break;
CASE 22: echo "/<a class=\"greenhilite\" href=\"league.php?country=Finland\">Finland</a>"; break;
CASE 23: echo "/<a class=\"greenhilite\" href=\"league.php?country=Hungary\">Hungary</a>"; break;
CASE 24: echo "/<a class=\"greenhilite\" href=\"league.php?country=Bosnia\">Bosnia and Herzegovina</a>"; break;
CASE 25: echo "/<a class=\"greenhilite\" href=\"league.php?country=Czech Republic\">Czech Republic</a>"; break;
CASE 26: echo "/<a class=\"greenhilite\" href=\"league.php?country=Australia\">Australia</a>"; break;
CASE 27: echo "/<a class=\"greenhilite\" href=\"league.php?country=Bulgaria\">Bulgaria</a>"; break;
CASE 28: echo "/<a class=\"greenhilite\" href=\"league.php?country=Brazil\">Brazil</a>"; break;
CASE 29: echo "/<a class=\"greenhilite\" href=\"league.php?country=China\">China</a>"; break;
CASE 30: echo "/<a class=\"greenhilite\" href=\"league.php?country=Cyprus\">Cyprus</a>"; break;
CASE 31: echo "/<a class=\"greenhilite\" href=\"league.php?country=Denmark\">Denmark</a>"; break;
CASE 32: echo "/<a class=\"greenhilite\" href=\"league.php?country=Slovakia\">Slovakia</a>"; break;
CASE 33: echo "/<a class=\"greenhilite\" href=\"league.php?country=Sweden\">Sweden</a>"; break;
CASE 34: echo "/<a class=\"greenhilite\" href=\"league.php?country=Switzerland\">Switzerland</a>"; break;
CASE 35: echo "/<a class=\"greenhilite\" href=\"league.php?country=United Kingdom\">United Kingdom</a>"; break;
CASE 36: echo "/<a class=\"greenhilite\" href=\"league.php?country=Canada\">Canada</a>"; break;
CASE 37: echo "/<a class=\"greenhilite\" href=\"league.php?country=Malta\">Malta</a>"; break;
CASE 38: echo "/<a class=\"greenhilite\" href=\"league.php?country=Philippines\">Philippines</a>"; break;
CASE 39: echo "/<a class=\"greenhilite\" href=\"league.php?country=Russia\">Russia</a>"; break;
CASE 40: echo "/<a class=\"greenhilite\" href=\"league.php?country=Uruguay\">Uruguay</a>"; break;
CASE 41: echo "/<a class=\"greenhilite\" href=\"league.php?country=FYR Macedonia\">FYR Macedonia</a>"; break;
CASE 42: echo "/<a class=\"greenhilite\" href=\"league.php?country=Albania\">Albania</a>"; break;
CASE 43: echo "/<a class=\"greenhilite\" href=\"league.php?country=Austria\">Austria</a>"; break;
CASE 44: echo "/<a class=\"greenhilite\" href=\"league.php?country=Colombia\">Colombia</a>"; break;
CASE 45: echo "/<a class=\"greenhilite\" href=\"league.php?country=Mexico\">Mexico</a>"; break;
CASE 46: echo "/<a class=\"greenhilite\" href=\"league.php?country=New Zealand\">New Zealand</a>"; break;
CASE 47: echo "/<a class=\"greenhilite\" href=\"league.php?country=Thailand\">Thailand</a>"; break;
CASE 48: echo "/<a class=\"greenhilite\" href=\"league.php?country=Venezuela\">Venezuela</a>"; break;
CASE 49: echo "/<a class=\"greenhilite\" href=\"league.php?country=Egypt\">Egypt</a>"; break;
CASE 50: echo "/<a class=\"greenhilite\" href=\"league.php?country=Indonesia\">Indonesia</a>"; break;
CASE 51: echo "/<a class=\"greenhilite\" href=\"league.php?country=Norway\">Norway</a>"; break;
CASE 52: echo "/<a class=\"greenhilite\" href=\"league.php?country=South Korea\">South Korea</a>"; break;
CASE 53: echo "/<a class=\"greenhilite\" href=\"league.php?country=Tunisia\">Tunisia</a>"; break;
CASE 54: echo "/<a class=\"greenhilite\" href=\"league.php?country=Ukraine\">Ukraine</a>"; break;
CASE 55: echo "/<a class=\"greenhilite\" href=\"league.php?country=Hong Kong\">Hong Kong</a>"; break;
CASE 56: echo "/<a class=\"greenhilite\" href=\"league.php?country=India\">India</a>"; break;
CASE 57: echo "/<a class=\"greenhilite\" href=\"league.php?country=Ireland\">Ireland</a>"; break;
CASE 58: echo "/<a class=\"greenhilite\" href=\"league.php?country=Malaysia\">Malaysia</a>"; break;
CASE 59: echo "/<a class=\"greenhilite\" href=\"league.php?country=Montenegro\">Montenegro</a>"; break;
CASE 60: echo "/<a class=\"greenhilite\" href=\"league.php?country=Peru\">Peru</a>"; break;
CASE 61: echo "/<a class=\"greenhilite\" href=\"league.php?country=Japan\">Japan</a>"; break;
CASE 62: echo "/<a class=\"greenhilite\" href=\"league.php?country=Georgia\">Georgia</a>"; break;
CASE 63: echo "/<a class=\"greenhilite\" href=\"league.php?country=Belarus\">Belarus</a>"; break;
CASE 64: echo "/<a class=\"greenhilite\" href=\"league.php?country=Puerto Rico\">Puerto Rico</a>"; break;
}
}?></td></tr>
<tr><td><b><?=$langmark115,":</b> ",$spec_txt?></td></tr>
<tr><td><b><?=$langmark116,":</b> ",$height?> cm (<?=$usheight?> ft)</td></tr>
<tr><td><b><?=$langmark117,":</b> ",round($weight)?> kg (<?=$usweight?> lb)</td></tr>
<tr><td><b><?=$langmark118,":</b> ",number_format($wage, 0, ',', '.')," &euro; / ",$langmark382?></td></tr>
<?php $next = $_GET['next'];
if($next=='wage' && $club==$trueclub && $coach==0){?><tr><td><font color="green"><b>Predicted wage:</b> <?=number_format($w, 0, ',', '.')," &euro; / ",$langmark382?></font></td></tr><?php }
/*
if($next=='EV' && $club==$trueclub && $coach==0){?><tr><td><font color="green"><b>Predicted EV:</b> <?=number_format($ww, 0, ',', '.')," &euro;"?></font></td></tr><tr><td colspan="2"><font color="green"><i>When new season starts, EV for all players go down, because of aging. This preview shows you what would EV of this player be if he was <?=($age+1)?> instead of <?=$age?> years old.</i></font></td></tr><?php }
*/
if($coach==9){?><tr><td><b>
<?php
switch (TRUE){
case ($hawr < 36): echo "This player is believed to be somewhat talented."; break;
case ($hawr > 35 AND $hawr < 100): echo "This player is believed to be talented."; break;
case ($hawr > 99): echo "This player is believed to be very talented."; break;
}
?></b><?php } else {?><tr><td><b><?=$langmark411?>:</b> <?=number_format($value, 0, ',', '.')?> &euro;
<?php
}
if($next=='EV' && $club==$trueclub && $coach==0){?><tr><td colspan="2"><font color="green"><i>At new season start, EV for all players go down, because of aging! Drops are <b>normal</b> and <b>same for all teams and players</b>!</i></font></td></tr><?php }
if ($is_supporter==1){?></td></tr></table><?php } else {?><br/><?php }
$val = $_GET['val'];
if ($val=='new') {echo "<table width=\"100%\" bgcolor=\"#F5F5F5\"><tr><td colspan=\"2\" style=\"border-top: solid 1px LightSteelBlue;\"></td></tr><tr><td colspan=\"2\">Player values were adjusted based on age and quality, so new values are closer to actual market worth. This change has <b>zero impact on how good the players are or how much they sell for!</b> The only purpose is to make values more accurate!</td></tr><tr><td colspan=\"2\" style=\"border-bottom: solid 1px LightSteelBlue;\"></td></tr></table>";}

if ($star_qual >0){echo $slika," ",$langmark412," ",$ppos,"<br/><hr/></td></tr></table>";} else {echo "<br/><hr/></td></tr></table>";}

if ($handling < 9) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=0\">".$langmark111."</a>"; }
elseif ($handling > 8 AND $handling < 17) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=1\">".$langmark096."</a>"; }
elseif ($handling > 16 AND $handling < 25) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=2\">".$langmark097."</a>"; }
elseif ($handling > 24 AND $handling < 33) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=3\">".$langmark098."</a>"; }
elseif ($handling > 32 AND $handling < 41) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=4\">".$langmark099."</a>"; }
elseif ($handling > 40 AND $handling < 49) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=5\">".$langmark100."</a>"; }
elseif ($handling > 48 AND $handling < 57) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=6\">".$langmark101."</a>"; }
elseif ($handling > 56 AND $handling < 65) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=7\">".$langmark102."</a>"; }
elseif ($handling > 64 AND $handling < 73) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=8\">".$langmark103."</a>"; }
elseif ($handling > 72 AND $handling < 81) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=9\">".$langmark104."</a>"; }
elseif ($handling > 80 AND $handling < 89) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=10\">".$langmark105."</a>"; }
elseif ($handling > 88 AND $handling < 97) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=11\">".$langmark106."</a>"; }
elseif ($handling > 96 AND $handling < 105) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=12\">".$langmark107."</a>"; }
elseif ($handling > 104 AND $handling < 113) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=13\">".$langmark108."</a>"; }
elseif ($handling > 112 AND $handling < 121) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=14\">".$langmark1584."</a>"; }
elseif ($handling > 120 AND $handling < 129) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=15\">".$langmark1585."</a>"; }
elseif ($handling > 128 AND $handling < 137) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=16\">".$langmark1586."</a>"; }
elseif ($handling > 136 AND $handling < 145) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=17\">".$langmark1587."</a>"; }
elseif ($handling > 144 AND $handling < 153) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=18\">".$langmark1588."</a>"; }
elseif ($handling > 152 AND $handling < 161) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=19\">".$langmark109."</a>"; }
else $handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=20\">".$langmark110."</a>";

if ($speed < 9) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=0\">".$langmark111."</a>"; }
elseif ($speed > 8 AND $speed < 17) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=1\">".$langmark096."</a>"; }
elseif ($speed > 16 AND $speed < 25) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=2\">".$langmark097."</a>"; }
elseif ($speed > 24 AND $speed < 33) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=3\">".$langmark098."</a>"; }
elseif ($speed > 32 AND $speed < 41) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=4\">".$langmark099."</a>"; }
elseif ($speed > 40 AND $speed < 49) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=5\">".$langmark100."</a>"; }
elseif ($speed > 48 AND $speed < 57) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=6\">".$langmark101."</a>"; }
elseif ($speed > 56 AND $speed < 65) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=7\">".$langmark102."</a>"; }
elseif ($speed > 64 AND $speed < 73) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=8\">".$langmark103."</a>"; }
elseif ($speed > 72 AND $speed < 81) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=9\">".$langmark104."</a>"; }
elseif ($speed > 80 AND $speed < 89) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=10\">".$langmark105."</a>"; }
elseif ($speed > 88 AND $speed < 97) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=11\">".$langmark106."</a>"; }
elseif ($speed > 96 AND $speed < 105) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=12\">".$langmark107."</a>"; }
elseif ($speed > 104 AND $speed < 113) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=13\">".$langmark108."</a>"; }
elseif ($speed > 112 AND $speed < 121) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=14\">".$langmark1584."</a>"; }
elseif ($speed > 120 AND $speed < 129) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=15\">".$langmark1585."</a>"; }
elseif ($speed > 128 AND $speed < 137) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=16\">".$langmark1586."</a>"; }
elseif ($speed > 136 AND $speed < 145) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=17\">".$langmark1587."</a>"; }
elseif ($speed > 144 AND $speed < 153) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=18\">".$langmark1588."</a>"; }
elseif ($speed > 152 AND $speed < 161) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=19\">".$langmark109."</a>"; }
else $speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=20\">".$langmark110."</a>";

if ($passing < 9) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=0\">".$langmark111."</a>"; }
elseif ($passing > 8 AND $passing < 17) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=1\">".$langmark096."</a>"; }
elseif ($passing > 16 AND $passing < 25) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=2\">".$langmark097."</a>"; }
elseif ($passing > 24 AND $passing < 33) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=3\">".$langmark098."</a>"; }
elseif ($passing > 32 AND $passing < 41) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=4\">".$langmark099."</a>"; }
elseif ($passing > 40 AND $passing < 49) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=5\">".$langmark100."</a>"; }
elseif ($passing > 48 AND $passing < 57) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=6\">".$langmark101."</a>"; }
elseif ($passing > 56 AND $passing < 65) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=7\">".$langmark102."</a>"; }
elseif ($passing > 64 AND $passing < 73) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=8\">".$langmark103."</a>"; }
elseif ($passing > 72 AND $passing < 81) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=9\">".$langmark104."</a>"; }
elseif ($passing > 80 AND $passing < 89) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=10\">".$langmark105."</a>"; }
elseif ($passing > 88 AND $passing < 97) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=11\">".$langmark106."</a>"; }
elseif ($passing > 96 AND $passing < 105) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=12\">".$langmark107."</a>"; }
elseif ($passing > 104 AND $passing < 113) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=13\">".$langmark108."</a>"; }
elseif ($passing > 112 AND $passing < 121) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=14\">".$langmark1584."</a>"; }
elseif ($passing > 120 AND $passing < 129) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=15\">".$langmark1585."</a>"; }
elseif ($passing > 128 AND $passing < 137) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=16\">".$langmark1586."</a>"; }
elseif ($passing > 136 AND $passing < 145) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=17\">".$langmark1587."</a>"; }
elseif ($passing > 144 AND $passing < 153) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=18\">".$langmark1588."</a>"; }
elseif ($passing > 152 AND $passing < 161) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=19\">".$langmark109."</a>"; }
else $passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=20\">".$langmark110."</a>";

if ($vision < 9) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=0\">".$langmark111."</a>"; }
elseif ($vision > 8 AND $vision < 17) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=1\">".$langmark096."</a>"; }
elseif ($vision > 16 AND $vision < 25) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=2\">".$langmark097."</a>"; }
elseif ($vision > 24 AND $vision < 33) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=3\">".$langmark098."</a>"; }
elseif ($vision > 32 AND $vision < 41) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=4\">".$langmark099."</a>"; }
elseif ($vision > 40 AND $vision < 49) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=5\">".$langmark100."</a>"; }
elseif ($vision > 48 AND $vision < 57) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=6\">".$langmark101."</a>"; }
elseif ($vision > 56 AND $vision < 65) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=7\">".$langmark102."</a>"; }
elseif ($vision > 64 AND $vision < 73) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=8\">".$langmark103."</a>"; }
elseif ($vision > 72 AND $vision < 81) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=9\">".$langmark104."</a>"; }
elseif ($vision > 80 AND $vision < 89) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=10\">".$langmark105."</a>"; }
elseif ($vision > 88 AND $vision < 97) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=11\">".$langmark106."</a>"; }
elseif ($vision > 96 AND $vision < 105) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=12\">".$langmark107."</a>"; }
elseif ($vision > 104 AND $vision < 113) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=13\">".$langmark108."</a>"; }
elseif ($vision > 112 AND $vision < 121) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=14\">".$langmark1584."</a>"; }
elseif ($vision > 120 AND $vision < 129) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=15\">".$langmark1585."</a>"; }
elseif ($vision > 128 AND $vision < 137) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=16\">".$langmark1586."</a>"; }
elseif ($vision > 136 AND $vision < 145) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=17\">".$langmark1587."</a>"; }
elseif ($vision > 144 AND $vision < 153) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=18\">".$langmark1588."</a>"; }
elseif ($vision > 152 AND $vision < 161) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=19\">".$langmark109."</a>"; }
else $vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=20\">".$langmark110."</a>";

if ($rebounds < 9) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=0\">".$langmark111."</a>"; }
elseif ($rebounds > 8 AND $rebounds < 17) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=1\">".$langmark096."</a>"; }
elseif ($rebounds > 16 AND $rebounds < 25) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=2\">".$langmark097."</a>"; }
elseif ($rebounds > 24 AND $rebounds < 33) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=3\">".$langmark098."</a>"; }
elseif ($rebounds > 32 AND $rebounds < 41) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=4\">".$langmark099."</a>"; }
elseif ($rebounds > 40 AND $rebounds < 49) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=5\">".$langmark100."</a>"; }
elseif ($rebounds > 48 AND $rebounds < 57) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=6\">".$langmark101."</a>"; }
elseif ($rebounds > 56 AND $rebounds < 65) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=7\">".$langmark102."</a>"; }
elseif ($rebounds > 64 AND $rebounds < 73) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=8\">".$langmark103."</a>"; }
elseif ($rebounds > 72 AND $rebounds < 81) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=9\">".$langmark104."</a>"; }
elseif ($rebounds > 80 AND $rebounds < 89) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=10\">".$langmark105."</a>"; }
elseif ($rebounds > 88 AND $rebounds < 97) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=11\">".$langmark106."</a>"; }
elseif ($rebounds > 96 AND $rebounds < 105) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=12\">".$langmark107."</a>"; }
elseif ($rebounds > 104 AND $rebounds < 113) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=13\">".$langmark108."</a>"; }
elseif ($rebounds > 112 AND $rebounds < 121) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=14\">".$langmark1584."</a>"; }
elseif ($rebounds > 120 AND $rebounds < 129) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=15\">".$langmark1585."</a>"; }
elseif ($rebounds > 128 AND $rebounds < 137) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=16\">".$langmark1586."</a>"; }
elseif ($rebounds > 136 AND $rebounds < 145) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=17\">".$langmark1587."</a>"; }
elseif ($rebounds > 144 AND $rebounds < 153) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=18\">".$langmark1588."</a>"; }
elseif ($rebounds > 152 AND $rebounds < 161) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=19\">".$langmark109."</a>"; }
else $rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=20\">".$langmark110."</a>";

if ($position < 9) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=0\">".$langmark111."</a>"; }
elseif ($position > 8 AND $position < 17) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=1\">".$langmark096."</a>"; }
elseif ($position > 16 AND $position < 25) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=2\">".$langmark097."</a>"; }
elseif ($position > 24 AND $position < 33) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=3\">".$langmark098."</a>"; }
elseif ($position > 32 AND $position < 41) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=4\">".$langmark099."</a>"; }
elseif ($position > 40 AND $position < 49) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=5\">".$langmark100."</a>"; }
elseif ($position > 48 AND $position < 57) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=6\">".$langmark101."</a>"; }
elseif ($position > 56 AND $position < 65) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=7\">".$langmark102."</a>"; }
elseif ($position > 64 AND $position < 73) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=8\">".$langmark103."</a>"; }
elseif ($position > 72 AND $position < 81) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=9\">".$langmark104."</a>"; }
elseif ($position > 80 AND $position < 89) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=10\">".$langmark105."</a>"; }
elseif ($position > 88 AND $position < 97) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=11\">".$langmark106."</a>"; }
elseif ($position > 96 AND $position < 105) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=12\">".$langmark107."</a>"; }
elseif ($position > 104 AND $position < 113) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=13\">".$langmark108."</a>"; }
elseif ($position > 112 AND $position < 121) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=14\">".$langmark1584."</a>"; }
elseif ($position > 120 AND $position < 129) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=15\">".$langmark1585."</a>"; }
elseif ($position > 128 AND $position < 137) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=16\">".$langmark1586."</a>"; }
elseif ($position > 136 AND $position < 145) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=17\">".$langmark1587."</a>"; }
elseif ($position > 144 AND $position < 153) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=18\">".$langmark1588."</a>"; }
elseif ($position > 152 AND $position < 161) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=19\">".$langmark109."</a>"; }
else $position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=20\">".$langmark110."</a>";

if ($shooting < 9) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=0\">".$langmark111."</a>"; }
elseif ($shooting > 8 AND $shooting < 17) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=1\">".$langmark096."</a>"; }
elseif ($shooting > 16 AND $shooting < 25) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=2\">".$langmark097."</a>"; }
elseif ($shooting > 24 AND $shooting < 33) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=3\">".$langmark098."</a>"; }
elseif ($shooting > 32 AND $shooting < 41) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=4\">".$langmark099."</a>"; }
elseif ($shooting > 40 AND $shooting < 49) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=5\">".$langmark100."</a>"; }
elseif ($shooting > 48 AND $shooting < 57) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=6\">".$langmark101."</a>"; }
elseif ($shooting > 56 AND $shooting < 65) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=7\">".$langmark102."</a>"; }
elseif ($shooting > 64 AND $shooting < 73) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=8\">".$langmark103."</a>"; }
elseif ($shooting > 72 AND $shooting < 81) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=9\">".$langmark104."</a>"; }
elseif ($shooting > 80 AND $shooting < 89) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=10\">".$langmark105."</a>"; }
elseif ($shooting > 88 AND $shooting < 97) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=11\">".$langmark106."</a>"; }
elseif ($shooting > 96 AND $shooting < 105) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=12\">".$langmark107."</a>"; }
elseif ($shooting > 104 AND $shooting < 113) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=13\">".$langmark108."</a>"; }
elseif ($shooting > 112 AND $shooting < 121) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=14\">".$langmark1584."</a>"; }
elseif ($shooting > 120 AND $shooting < 129) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=15\">".$langmark1585."</a>"; }
elseif ($shooting > 128 AND $shooting < 137) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=16\">".$langmark1586."</a>"; }
elseif ($shooting > 136 AND $shooting < 145) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=17\">".$langmark1587."</a>"; }
elseif ($shooting > 144 AND $shooting < 153) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=18\">".$langmark1588."</a>"; }
elseif ($shooting > 152 AND $shooting < 161) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=19\">".$langmark109."</a>"; }
else $shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=20\">".$langmark110."</a>";

if ($freethrow < 9) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=0\">".$langmark111."</a>"; }
elseif ($freethrow > 8 AND $freethrow < 17) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=1\">".$langmark096."</a>"; }
elseif ($freethrow > 16 AND $freethrow < 25) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=2\">".$langmark097."</a>"; }
elseif ($freethrow > 24 AND $freethrow < 33) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=3\">".$langmark098."</a>"; }
elseif ($freethrow > 32 AND $freethrow < 41) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=4\">".$langmark099."</a>"; }
elseif ($freethrow > 40 AND $freethrow < 49) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=5\">".$langmark100."</a>"; }
elseif ($freethrow > 48 AND $freethrow < 57) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=6\">".$langmark101."</a>"; }
elseif ($freethrow > 56 AND $freethrow < 65) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=7\">".$langmark102."</a>"; }
elseif ($freethrow > 64 AND $freethrow < 73) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=8\">".$langmark103."</a>"; }
elseif ($freethrow > 72 AND $freethrow < 81) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=9\">".$langmark104."</a>"; }
elseif ($freethrow > 80 AND $freethrow < 89) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=10\">".$langmark105."</a>"; }
elseif ($freethrow > 88 AND $freethrow < 97) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=11\">".$langmark106."</a>"; }
elseif ($freethrow > 96 AND $freethrow < 105) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=12\">".$langmark107."</a>"; }
elseif ($freethrow > 104 AND $freethrow < 113) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=13\">".$langmark108."</a>"; }
elseif ($freethrow > 112 AND $freethrow < 121) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=14\">".$langmark1584."</a>"; }
elseif ($freethrow > 120 AND $freethrow < 129) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=15\">".$langmark1585."</a>"; }
elseif ($freethrow > 128 AND $freethrow < 137) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=16\">".$langmark1586."</a>"; }
elseif ($freethrow > 136 AND $freethrow < 145) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=17\">".$langmark1587."</a>"; }
elseif ($freethrow > 144 AND $freethrow < 153) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=18\">".$langmark1588."</a>"; }
elseif ($freethrow > 152 AND $freethrow < 161) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=19\">".$langmark109."</a>"; }
else $freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=20\">".$langmark110."</a>";

if ($defense < 9) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=0\">".$langmark111."</a>"; }
elseif ($defense > 8 AND $defense < 17) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=1\">".$langmark096."</a>"; }
elseif ($defense > 16 AND $defense < 25) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=2\">".$langmark097."</a>"; }
elseif ($defense > 24 AND $defense < 33) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=3\">".$langmark098."</a>"; }
elseif ($defense > 32 AND $defense < 41) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=4\">".$langmark099."</a>"; }
elseif ($defense > 40 AND $defense < 49) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=5\">".$langmark100."</a>"; }
elseif ($defense > 48 AND $defense < 57) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=6\">".$langmark101."</a>"; }
elseif ($defense > 56 AND $defense < 65) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=7\">".$langmark102."</a>"; }
elseif ($defense > 64 AND $defense < 73) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=8\">".$langmark103."</a>"; }
elseif ($defense > 72 AND $defense < 81) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=9\">".$langmark104."</a>"; }
elseif ($defense > 80 AND $defense < 89) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=10\">".$langmark105."</a>"; }
elseif ($defense > 88 AND $defense < 97) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=11\">".$langmark106."</a>"; }
elseif ($defense > 96 AND $defense < 105) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=12\">".$langmark107."</a>"; }
elseif ($defense > 104 AND $defense < 113) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=13\">".$langmark108."</a>"; }
elseif ($defense > 112 AND $defense < 121) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=14\">".$langmark1584."</a>"; }
elseif ($defense > 120 AND $defense < 129) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=15\">".$langmark1585."</a>"; }
elseif ($defense > 128 AND $defense < 137) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=16\">".$langmark1586."</a>"; }
elseif ($defense > 136 AND $defense < 145) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=17\">".$langmark1587."</a>"; }
elseif ($defense > 144 AND $defense < 153) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=18\">".$langmark1588."</a>"; }
elseif ($defense > 152 AND $defense < 161) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=19\">".$langmark109."</a>"; }
else $defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=20\">".$langmark110."</a>";

if ($workrate < 9) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=0\">".$langmark111."</a>"; $gmwr=0;}
elseif ($workrate > 8 AND $workrate < 17) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=1\">".$langmark096."</a>"; $gmwr=1;}
elseif ($workrate > 16 AND $workrate < 25) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=2\">".$langmark097."</a>"; $gmwr=2;}
elseif ($workrate > 24 AND $workrate < 33) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=3\">".$langmark098."</a>"; $gmwr=3;}
elseif ($workrate > 32 AND $workrate < 41) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=4\">".$langmark099."</a>"; $gmwr=4;}
elseif ($workrate > 40 AND $workrate < 49) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=5\">".$langmark100."</a>"; $gmwr=5;}
elseif ($workrate > 48 AND $workrate < 57) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=6\">".$langmark101."</a>"; $gmwr=6;}
elseif ($workrate > 56 AND $workrate < 65) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=7\">".$langmark102."</a>"; $gmwr=7;}
elseif ($workrate > 64 AND $workrate < 73) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=8\">".$langmark103."</a>"; $gmwr=8;}
elseif ($workrate > 72 AND $workrate < 81) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=9\">".$langmark104."</a>"; $gmwr=9;}
elseif ($workrate > 80 AND $workrate < 89) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=10\">".$langmark105."</a>"; $gmwr=10;}
elseif ($workrate > 88 AND $workrate < 97) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=11\">".$langmark106."</a>"; $gmwr=11;}
elseif ($workrate > 96 AND $workrate < 105) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=12\">".$langmark107."</a>"; $gmwr=12;}
elseif ($workrate > 104 AND $workrate < 113) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=13\">".$langmark108."</a>"; $gmwr=13;}
elseif ($workrate > 112 AND $workrate < 121) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=14\">".$langmark1584."</a>"; $gmwr=14;}
elseif ($workrate > 120 AND $workrate < 129) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=15\">".$langmark1585."</a>"; $gmwr=15;}
elseif ($workrate > 128 AND $workrate < 137) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=16\">".$langmark1586."</a>"; $gmwr=16;}
elseif ($workrate > 136 AND $workrate < 145) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=17\">".$langmark1587."</a>"; $gmwr=17;}
elseif ($workrate > 144 AND $workrate < 153) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=18\">".$langmark1588."</a>"; $gmwr=18;}
elseif ($workrate > 152 AND $workrate < 161) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=19\">".$langmark109."</a>"; $gmwr=19;}
else $workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=20\">".$langmark110."</a>";

if ($experience < 9) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=0\">".$langmark111."</a>"; }
elseif ($experience > 8 AND $experience < 17) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=1\">".$langmark096."</a>"; }
elseif ($experience > 16 AND $experience < 25) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=2\">".$langmark097."</a>"; }
elseif ($experience > 24 AND $experience < 33) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=3\">".$langmark098."</a>"; }
elseif ($experience > 32 AND $experience < 41) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=4\">".$langmark099."</a>"; }
elseif ($experience > 40 AND $experience < 49) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=5\">".$langmark100."</a>"; }
elseif ($experience > 48 AND $experience < 57) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=6\">".$langmark101."</a>"; }
elseif ($experience > 56 AND $experience < 65) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=7\">".$langmark102."</a>"; }
elseif ($experience > 64 AND $experience < 73) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=8\">".$langmark103."</a>"; }
elseif ($experience > 72 AND $experience < 81) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=9\">".$langmark104."</a>"; }
elseif ($experience > 80 AND $experience < 89) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=10\">".$langmark105."</a>"; }
elseif ($experience > 88 AND $experience < 97) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=11\">".$langmark106."</a>"; }
elseif ($experience > 96 AND $experience < 105) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=12\">".$langmark107."</a>"; }
elseif ($experience > 104 AND $experience < 113) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=13\">".$langmark108."</a>"; }
elseif ($experience > 112 AND $experience < 121) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=14\">".$langmark1584."</a>"; }
elseif ($experience > 120 AND $experience < 129) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=15\">".$langmark1585."</a>"; }
elseif ($experience > 128 AND $experience < 137) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=16\">".$langmark1586."</a>"; }
elseif ($experience > 136 AND $experience < 145) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=17\">".$langmark1587."</a>"; }
elseif ($experience > 144 AND $experience < 153) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=18\">".$langmark1588."</a>"; }
elseif ($experience > 152 AND $experience < 161) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=19\">".$langmark109."</a>"; }
else $experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=20\">".$langmark110."</a>";

if ($coach==9) {
if ($handling==0 AND $spec_txt==$langmark763) {$handling_dspl = "<font color=#009900>unknown</font>"; $lk=4;} elseif ($handling==0 AND $spec_txt=='clumsy') {$handling_dspl = "<font color=#A30006>unknown</font>"; $lk=4;} elseif ($handling==0) {$handling_dspl = "<i>unknown</i>";}
if ($speed==0 AND $spec_txt==$langmark765) {$speed_dspl = "<font color=#A30006>unknown</font>"; $lk=4;} elseif ($speed==0 AND $spec_txt=='explosive') {$speed_dspl = "<font color=#009900>unknown</font>"; $lk=4;} elseif ($speed==0 AND $spec_txt=='wise') {$speed_dspl = "<font color=#A30006>unknown</font>"; $lk=4;} elseif ($speed==0 AND $spec_txt=='lazy') {$speed_dspl = "<font color=#A30006>unknown</font>"; $lk=4;} elseif ($speed==0 AND $spec_txt=='tough') {$speed_dspl = "<font color=#A30006>unknown</font>"; $lk=4;} elseif ($speed==0) {$speed_dspl = "<i>unknown</i>";}
if ($passing==0 AND $spec_txt==$langmark768) {$passing_dspl = "<font color=#A30006>unknown</font>"; $lk=4;} elseif ($passing==0 AND $spec_txt=='wise') {$passing_dspl = "<font color=#009900>unknown</font>"; $lk=4;} elseif ($passing==0 AND $spec_txt=='fragile') {$passing_dspl = "<font color=#009900>unknown</font>"; $lk=4;} elseif ($passing==0 AND $spec_txt=='clumsy') {$passing_dspl = "<font color=#A30006>unknown</font>"; $lk=4;} elseif ($passing==0) {$passing_dspl = "<i>unknown</i>";}
if ($vision==0 AND ($spec_txt==$langmark764 OR $spec_txt==$langmark768)) {$vision_dspl = "<font color=#009900>unknown</font>"; $lk=4;} elseif ($vision==0 AND $spec_txt=='clumsy') {$vision_dspl = "<font color=#A30006>unknown</font>"; $lk=4;} elseif ($vision==0 AND $spec_txt=='fragile') {$vision_dspl = "<font color=#A30006>unknown</font>"; $lk=4;} elseif ($vision==0 AND $spec_txt=='tough') {$vision_dspl = "<font color=#A30006>unknown</font>"; $lk=4;} elseif ($vision==0) {$vision_dspl = "<i>unknown</i>";}
if ($rebounds==0 AND $spec_txt==$langmark766) {$rebounds_dspl = "<font color=#009900>unknown</font>"; $lk=4;} elseif ($rebounds==0 AND $spec_txt=='fragile') {$rebounds_dspl = "<font color=#A30006>unknown</font>"; $lk=4;} elseif ($rebounds==0 AND $spec_txt=='clumsy') {$rebounds_dspl = "<font color=#009900>unknown</font>"; $lk=4;} elseif ($rebounds==0) {$rebounds_dspl = "<i>unknown</i>";}
if ($position==0 AND $spec_txt==$langmark767) {$position_dspl = "<font color=#A30006>unknown</font>"; $lk=4;} elseif ($position==0 AND $spec_txt=='clumsy') {$position_dspl = "<font color=#009900>unknown</font>"; $lk=4;} elseif ($position==0 AND $spec_txt=='lazy') {$position_dspl = "<font color=#009900>unknown</font>"; $lk=4;} elseif ($position==0 AND $spec_txt=='explosive') {$position_dspl = "<font color=#A30006>unknown</font>"; $lk=4;} elseif ($position==0) {$position_dspl = "<i>unknown</i>";}
if ($shooting==0 AND ($spec_txt==$langmark765 OR $spec_txt==$langmark768)) {$shooting_dspl = "<font color=#009900>unknown</font>"; $lk=4;} elseif ($shooting==0 AND $spec_txt=='fragile') {$shooting_dspl = "<font color=#009900>unknown</font>"; $lk=4;} elseif ($shooting==0) {$shooting_dspl = "<i>unknown</i>";}
if ($freethrow==0 AND $spec_txt==$langmark763) {$freethrow_dspl = "<font color=#009900>unknown</font>"; $lk=4;} elseif ($freethrow==0 AND $spec_txt=='fragile') {$freethrow_dspl = "<font color=#009900>unknown</font>"; $lk=4;} elseif ($freethrow==0) {$freethrow_dspl = "<i>unknown</i>";}
if ($defense==0 AND $spec_txt==$langmark768) {$defense_dspl = "<font color=#A30006>unknown</font>"; $lk=4;} elseif ($defense==0 AND $spec_txt=='explosive') {$defense_dspl = "<font color=#A30006>unknown</font>"; $lk=4;} elseif ($defense==0 AND $spec_txt=='lazy') {$defense_dspl = "<font color=#A30006>unknown</font>"; $lk=4;} elseif ($defense==0 AND $spec_txt=='tough') {$defense_dspl = "<font color=#009900>unknown</font>"; $lk=4;} elseif ($defense==0) {$defense_dspl = "<i>unknown</i>";}
if ($workrate==0) {$workrate_dspl = "unknown";}
}

if ($club >0 AND $club < 99999) {
$result18 = mysql_query("SELECT name, status FROM teams WHERE teamid=$club LIMIT 1");
$tename = mysql_result($result18,0,"name");
$statusje = mysql_result($result18,0,"status");
}

if ($ntplayer==1){echo "<font color=\"green\"><b>",$langmark415,"</b></font> <a href=\"nationalteams.php?country=",$country,"\"><font color=\"green\"><b>",$dcountry,"</b></font></a>.<br/>";}
if ($ntplayer==2){echo "<font color=\"green\"><b>",$langmark415,"</b></font> <a href=\"u18teams.php?country=",$country,"\"><font color=\"green\"><b>",$dcountry," U19</b></font></a>.<br/>";}
if ($coachriba=='lod') {echo "<font color=\"green\"><b>",$langmark415,"</b></font> <a href=\"u15players.php&#35;",$country,"\"><font color=\"green\"><b>",$dcountry," U15</b></font></a>.<br/>";}
if ($club==0 AND $coach<>9) {echo $langmark416;}
elseif ($clubus <> $userid AND $isonsale <> 1 AND $statusje==1) {
echo $langmark417," <a href=\"club.php?clubid=",$clubus,"\"><b>",stripslashes($tename),"</b></a>.";


//fatigue

if ($fatigue < 5) {echo "<br/>",$langmark418," ",$langmark419,".";}
elseif ($fatigue > 4 AND $fatigue < 10) {echo "<br/>",$langmark418," ",$langmark420,".";}
elseif ($fatigue > 9 AND $fatigue < 15) {echo "<br/>",$langmark418," ",$langmark421,".";}
elseif ($fatigue > 14 AND $fatigue < 20) {echo "<br/>",$langmark418," ",$langmark422,".";}
elseif ($fatigue > 19 AND $fatigue < 25) {echo "<br/>",$langmark418," ",$langmark423,".";}
elseif ($fatigue > 24 AND $fatigue < 30) {echo "<br/>",$langmark418," ",$langmark424,".";}
else {echo "<br/>",$langmark418," ",$langmark425,".";}

}
elseif ($clubus <> $userid AND $isonsale <> 1 AND $statusje==3) {
echo $langmark417," <a href=\"team.php?clubid=",$club,"\"><b>",stripslashes($tename),"</b></a>.";

//utrujenost
if ($fatigue < 5) {echo "<br/>",$langmark418," ",$langmark419,".";}
if ($fatigue > 4 AND $fatigue < 10) {echo "<br/>",$langmark418," ",$langmark420,".";}
if ($fatigue > 9 AND $fatigue < 15) {echo "<br/>",$langmark418," ",$langmark421,".";}
if ($fatigue > 14 AND $fatigue < 20) {echo "<br/>",$langmark418," ",$langmark422,".";}
if ($fatigue > 19 AND $fatigue < 25) {echo "<br/>",$langmark418," ",$langmark423,".";}
if ($fatigue > 24 AND $fatigue < 30) {echo "<br/>",$langmark418," ",$langmark424,".";}
if ($fatigue > 29) {echo "<br/>",$langmark418," ",$langmark425,".";}

} else {

if ($club==0 AND $coach==9) {echo $langmark416; $bong=40;}
if ($bong<>40) {echo $langmark417," <a href=\"club.php?clubid=$clubus\"><b>",stripslashes($tename),"</b></a>";}
?>
<br/><br/>
<table border="0" cellpadding="0" cellspacing="0">
<tr><td width="162"><b><?=$langmark426?>:</b> <?=$handling_dspl?></td>
<td><b><?=$langmark121?>:</b> <?=$speed_dspl?></td></tr>
<tr><td><b><?=$langmark122?>:</b> <?=$passing_dspl?></td>
<td><b><?=$langmark123?>:</b> <?=$vision_dspl?></td></tr>
<tr><td><b><?=$langmark427?>:</b> <?=$rebounds_dspl?></td>
<td><b><?=$langmark125?>:</b> <?=$position_dspl?></td></tr>
<tr><td><b><?=$langmark126?>:</b> <?=$shooting_dspl?></td>
<td><b><?=$langmark428?>:</b> <?=$freethrow_dspl?></td></tr>
<tr><td><b><?=$langmark128?>:</b> <?=$defense_dspl?></td>
<td><b><?=$langmark129?>:</b> <?=$workrate_dspl?></td></tr>
<?php if ($coach<>9){?>
<tr><td<?php if($next=='xpbar' AND $club==$trueclub AND $coach==0 AND $is_supporter==1){echo " class=\"border\"";}?>><b><?=$langmark130?>:</b> <?=$experience_dspl?></td>
<td><b><?=$langmark383?>:</b> <?=$fatigue?>%</td></tr><?php }?>

<?php if($next=='xpbar' AND $club==$trueclub AND $coach==0 AND $is_supporter==1){
SWITCH (TRUE) {
CASE ($experience >= 0 AND $experience < 9): $down=0; $up=9; $baga=5001; break;
CASE ($experience >= 9 AND $experience < 17): $down=9; $up=17; break;
CASE ($experience >= 17 AND $experience < 25): $down=17; $up=25; break;
CASE ($experience >= 25 AND $experience < 33): $down=25; $up=33; break;
CASE ($experience >= 33 AND $experience < 41): $down=33; $up=41; break;
CASE ($experience >= 41 AND $experience < 49): $down=41; $up=49; break;
CASE ($experience >= 49 AND $experience < 57): $down=49; $up=57; break;
CASE ($experience >= 57 AND $experience < 65): $down=57; $up=65; break;
CASE ($experience >= 65 AND $experience < 73): $down=65; $up=73; break;
CASE ($experience >= 73 AND $experience < 81): $down=73; $up=81; break;
CASE ($experience >= 81 AND $experience < 89): $down=81; $up=89; break;
CASE ($experience >= 89 AND $experience < 97): $down=89; $up=97; break;
CASE ($experience >= 97 AND $experience < 105): $down=97; $up=105; break;
CASE ($experience >= 105 AND $experience < 113): $down=105; $up=113; break;
CASE ($experience >= 113 AND $experience < 121): $down=113; $up=121; break;
CASE ($experience >= 121 AND $experience < 129): $down=121; $up=129; break;
CASE ($experience >= 129 AND $experience < 137): $down=129; $up=137; break;
CASE ($experience >= 137 AND $experience < 145): $down=137; $up=145; break;
CASE ($experience >= 145 AND $experience < 153): $down=145; $up=153; break;
CASE ($experience >= 153 AND $experience < 161): $down=153; $up=161; break;
CASE ($experience >= 161 AND $experience < 169): $down=161; $up=169; break;
CASE ($experience >= 169 AND $experience < 177): $down=169; $up=177; break;
CASE ($experience >= 177 AND $experience < 185): $down=177; $up=185; break;
CASE ($experience >= 185 AND $experience < 193): $down=185; $up=193; break;
CASE ($experience >= 193 AND $experience < 201): $down=193; $up=201; break;
CASE ($experience >= 201 AND $experience < 209): $down=201; $up=209; break;
CASE ($experience >= 209 AND $experience < 217): $down=209; $up=217; break;
CASE ($experience >= 217 AND $experience < 225): $down=217; $up=225; break;
CASE ($experience >= 225 AND $experience < 233): $down=225; $up=233; break;
CASE ($experience >= 233 AND $experience < 241): $down=233; $up=241; break;
CASE ($experience >= 241 AND $experience < 249): $down=241; $up=249; break;
CASE ($experience >= 249 AND $experience < 257): $down=249; $up=257; break;
CASE ($experience >= 257 AND $experience < 265): $down=257; $up=265; break;
CASE ($experience >= 265 AND $experience < 273): $down=265; $up=273; break;
CASE ($experience >= 273 AND $experience < 281): $down=273; $up=281; break;
CASE ($experience >= 281 AND $experience < 289): $down=281; $up=289; break;
CASE ($experience >= 289 AND $experience < 297): $down=289; $up=297; break;
CASE ($experience >= 297 AND $experience < 305): $down=297; $up=305; break;
}
if ($baga==5001) {
$odtrenirano = round(($experience - $down)*280/9);
$prozent = round(($experience - $down)*100/9);
} else {
$odtrenirano = ($experience - $down)*35;
$prozent = ($experience - $down)*12.5;
}
?>
<tr><td colspan="2"><br/><b>Experience progress bar:</b>
<div style="height:9px; width:280px;background-color:#ffffff;position:relative; overflow:hidden; border: 1px solid #000000;">
<div style="position:absolute;top:0px;left:0px;background-color:lightblue; width:<?=$odtrenirano?>px;height:9px"></div>
<div style="position:absolute;top:0px;left:<?=$odtrenirano?>px;background-color:rgb(255,10,0); width:0px;height:9px;border-right: 1px solid #000000;"></div></div>
<i><?=round($prozent)?>% completed, around <?=round(100-$prozent)?>% needed to reach the next level.</i>
</td></tr><?php }?>

</table>
<?php
if ($lk==4 AND $workrate==0) {
?>
<br/><table width="100%" bgcolor="#F5F5F5">
<tr><td colspan="2" style="border-top: solid 1px LightSteelBlue;"></td></tr>
<tr><td colspan="2">Green / red color represent skills that player is likely to develop better / worse, according to his character! <a href="gamerules.php?action=youth">Read more</a></td></tr>
<tr><td colspan="2" style="border-bottom: solid 1px LightSteelBlue;"></td></tr>
</table>
<?php
}
if ($coach==9) {?>
<br/>
<b>Youth value</b>: <?php echo number_format($signuYT, 0, ',', '.')." &euro;<br/><i>(Players are expected to have much lower value after promotion)</i>";
}
}
?>

</td><td class="border" width="43%">


<?php

//world cup medals

$dmm = mysql_query("SELECT `whichmedal` , `whichcup` , `type` FROM medals WHERE playerid = '$playerid' ORDER BY whichcup ASC, type ASC, medalid ASC");
while ($mm = mysql_fetch_array($dmm)) {
$whichm = $mm['whichmedal'];
$whichc = $mm['whichcup'];
$medalt = $mm['type'];
if ($medalt==4 && $whichm==1) {echo "<a href=\"worldcup.php?swc=",$whichc,"\"><img src=\"img/wcsmallgold.jpg\" alt=\"World Cup gold medal\" title=\"World Cup gold medal\" border=\"0\"></a>";}
if ($medalt==4 && $whichm==2) {echo "<a href=\"worldcup.php?swc=",$whichc,"\"><img src=\"img/wcsmallsilver.jpg\" alt=\"World Cup silver medal\" title=\"World Cup silver medal\" border=\"0\"></a>";}
if ($medalt==4 && $whichm==3) {echo "<a href=\"worldcup.php?swc=",$whichc,"\"><img src=\"img/wcsmallbronze.jpg\" alt=\"World Cup bronze medal\" title=\"World Cup bronze medal\" border=\"0\"></a>";}
if ($medalt==4 && $whichm==0) {echo "<a href=\"worldcup.php?swc=",$whichc,"\"><img src=\"img/carC_small.gif\" alt=\"World Cup MVP\" title=\"World Cup MVP\" border=\"0\"></a>";}
if ($medalt==14 && $whichm==1) {echo "<a href=\"u18worldcup.php?swc=",$whichc,"\"><img src=\"img/wcsmallgold.jpg\" alt=\"U18 World Cup gold medal\" title=\"U18 World Cup gold medal\" border=\"0\"></a>";}
if ($medalt==14 && $whichm==2) {echo "<a href=\"u18worldcup.php?swc=",$whichc,"\"><img src=\"img/wcsmallsilver.jpg\" alt=\"U18 World Cup silver medal\" title=\"U18 World Cup silver medal\" border=\"0\"></a>";}
if ($medalt==14 && $whichm==3) {echo "<a href=\"u18worldcup.php?swc=",$whichc,"\"><img src=\"img/wcsmallbronze.jpg\" alt=\"U18 World Cup bronze medal\" title=\"U18 World Cup bronze medal\" border=\"0\"></a>";}
if ($medalt==14 && $whichm==0) {echo "<a href=\"u18worldcup.php?swc=",$whichc,"\"><img src=\"img/carC_small.gif\" alt=\"U18 World Cup MVP\" title=\"U18 World Cup MVP\" border=\"0\"></a>";}
}


//three-points contest

$tpquer = mysql_query("SELECT id FROM `threepoints` WHERE `winner1`='$playerid'") or die(mysql_error());
while ($rub = mysql_fetch_array($tpquer)) {echo "<a href=\"threepointers.php?super=winners\"><img src=\"img/3pokal.gif\" alt=\"",$langmark429,"\" title=\"",$langmark429,"\" border=\"0\"></a>&nbsp;";}
$tpquer = mysql_query("SELECT id FROM `threepoints` WHERE `winner2`='$playerid'") or die(mysql_error());
while ($rub = mysql_fetch_array($tpquer)) {echo "<a href=\"threepointers.php?super=winners\"><img src=\"img/3pokal.gif\" alt=\"",$langmark429,"\" title=\"",$langmark429,"\" border=\"0\"></a>&nbsp;";}
$tpquer = mysql_query("SELECT id FROM `threepoints` WHERE `winner3`='$playerid'") or die(mysql_error());
while ($rub = mysql_fetch_array($tpquer)) {echo "<a href=\"threepointers.php?super=winners\"><img src=\"img/3pokal.gif\" alt=\"",$langmark429,"\" title=\"",$langmark429,"\" border=\"0\"></a>&nbsp;";}
$tpquer = mysql_query("SELECT id FROM `threepoints` WHERE `winner4`='$playerid'") or die(mysql_error());
while ($rub = mysql_fetch_array($tpquer)) {echo "<a href=\"threepointers.php?super=winners\"><img src=\"img/3pokal.gif\" alt=\"",$langmark429,"\" title=\"",$langmark429,"\" border=\"0\"></a>&nbsp;";}


//trophies won

$grad = mysql_query("SELECT country_award, league_award, league, season_award, season, country, type FROM top_players WHERE player = $playerid") or die(mysql_error());
$bub=0;
while ($bub < mysql_num_rows($grad)) {
$skupaj_N = mysql_result($grad,$bub,"season_award");
$drzava_N = mysql_result($grad,$bub,"country_award");
$ligica_N = mysql_result($grad,$bub,"league_award");
$ligica_L = mysql_result($grad,$bub,"league");
$season_N = mysql_result($grad,$bub,"season");
$country_N = mysql_result($grad,$bub,"country");
$type_N = mysql_result($grad,$bub,"type");
//pokali
if ($skupaj_N==1) {echo "<a href=\"mvp.php?sn=",$season_N,"\"><img src=\"img/car.jpg\" alt=\"Global MVP\" title=\"Best player of Basketsim season ",$season_N,"\" border=\"0\"></a> ";}
elseif ($drzava_N==1) {echo "<a href=\"mvp.php?sn=",$season_N,"&cy=",$country_N,"\"><img src=\"img/3pokal.gif\" alt=\"Country MVP\" title=\"",$country_N," MVP in season ",$season_N,"\" border=\"0\"></a> ";}
elseif ($ligica_N==1) {echo "<a href=\"mvp.php?league_id=",$ligica_L,"&sn=",$season_N,"&cy=",$country_N,"\"><img src=\"img/silver.gif\" alt=\"League MVP\" title=\"League MVP in season ",$season_N,"\" border=\"0\"></a> ";}
elseif ($type_N==3) {echo "<a href=\"nationalcup.php?mvpja=55&season=",$season_N,"&country=",$country_N,"\"><img src=\"img/cupm.gif\" alt=\"Cup MVP\" title=\"National cup MVP in season ",$season_N,"\" border=\"0\"></a> ";}
elseif ($type_N==5) {echo "<a href=\"fairplaycup.php?mvpja=55&season=",$season_N,"\"><img src=\"img/mvpfpc.jpg\" alt=\"FPC MVP\" title=\"Fair Play Cup MVP in season ",$season_N,"\" border=\"0\"></a> ";}
elseif ($type_N==6) {echo "<a href=\"cs.php?mvpja=55&season=",$season_N,"\"><img src=\"img/mvpcs.png\" alt=\"CS MVP\" title=\"Champions Series MVP in season ",$season_N,"\" border=\"0\"></a> ";}
elseif ($type_N==7) {echo "<a href=\"cws.php?mvpja=55&season=",$season_N,"\"><img src=\"img/mvpcws.png\" alt=\"CWS MVP\" title=\"Cup Winners Series MVP in season ",$season_N,"\" border=\"0\"></a> ";}
elseif ($type_N==19) {echo "<a href=\"ycwc.php?round=7&season=",$season_N,"\"><img src=\"img/ycwc.jpg\" alt=\"YCWC MVP\" title=\"Youth Club World Cup MVP in season ",$season_N,"\" border=\"0\"></a> ";}
$bub++;
}

if (($mm>0 || $rub>0 || $bub>0) && isset($_POST['submit'])) {echo "<hr/><br/>";}

//naprodaj?
if ($sale400 == 1){
//zacetek obrazca za bidanje

$plontransf = mysql_query("SELECT * FROM transfers WHERE trstatus=1 AND playerid=$playerid LIMIT 1");
while($g=mysql_fetch_array($plontransf))
{
$transferid=$g["transferid"];
$playerclub=$g["playerclub"];
$sellingid=$g["sellingid"];
$price=$g["price"];
$position=$g["position"];
$timeofsale=$g["timeofsale"];
$currentbid=$g["currentbid"];
$bidingteam=$g["bidingteam"];
$bidingname=$g["bidingname"];
}

switch (TRUE) {
case $currentbid >= $price AND $currentbid <> 0: $atmoffer = round($currentbid * 102/100); break;
case $currentbid == 0 AND $price < 1000: $atmoffer = 1000; break;
case $currentbid == 0 and $price > 999: $atmoffer = $price; break;
}

if ($position < 2) {$posdisp = $langmark386; }
elseif ($position > 1 AND $position < 3) {$posdisp = $langmark387; }
elseif ($position > 2 AND $position < 4) {$posdisp = $langmark388; }
elseif ($position > 3 AND $position < 5) {$posdisp = $langmark389; }
else $posdisp = $langmark390;

//izvedba bida
$newpric = $_POST["newpric"];
if ($newpric < 1000) {$newpric=1000;}

if (!isset($_POST['submit'])) {
?>

<h2><?=$langmark772?></h2><br/>
<table width="100%" border="0" cellspacing="0" cellpadding="1"><tr>
<td width="100"><b><?=$langmark430?>:</b></td><td> <?=$posdisp?></td></tr>
<tr><td><b><?=$langmark431?>:</b></td><td> <?=number_format($price,0,',','.')?></td></tr>
<tr><td><b><?=$langmark432?>:</b></td><td> <?=number_format($currentbid, 0,',','.')?></td></tr>
<tr><td><b><?=$langmark433?>:</b></td><td> <a href="club.php?clubid=<?=$bidingteam?>"><?=$bidingname?></a></td></tr>

<?php
//je transfer pretecen?
$splitdatetime = explode(" ", $timeofsale); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$prikazcasa = date("d.m.Y H:i", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));

//kdaj potece?
$expiretime = date("Y-m-d H:i:s", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));
$expireminus = date("Y-m-d H:i:s", mktime($dbhour,$dbmin-3,$dbsec,$dbmonth,$dbday,$dbyear));
$timenow = date("Y-m-d H:i:s");

switch (TRUE){
case $timenow > $expiretime: echo "</table><b>",$langmark434,"</b><br/>"; break;
case $timenow <= $expiretime:
?>
<tr><td><b><?=$langmark435?></b></td><td> <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="margin: 0">
<input type="text" value="<?=$atmoffer?>" name="newpric" size="8" class="inputreg">
<input type="hidden" name="cbt" value="<?=$trueclub?>">
<input type="submit" value="<?=$langmark436?>" name="submit" class="buttonreg"></form></td></tr>
<tr><td><b><?=$langmark437?>:</b></td><td><?=$prikazcasa?><br /></td></tr></table>

<?php
break;
}

} else {

//ima uporabnik dejansko že bid na igralcu
if ($userid==$bidingteam) {die("<b>You already have bid on this player. You will be able to bid again when another club makes a better offer.<br/><br/><a href=\"javascript: history.go(-1)\">$langmark059</a></td></tr></table>");}

//IP check
if ($userid <> $clubus AND $zadnjiIPb == $lastIPs) {die("<b>You are not allowed to bid on player from someone who uses same IP as you do! This is against the rules and considered cheating.<br/><br/><a href=\"player.php?playerid=$playerid\">$langmark059</a></td></tr></table>");}

//je uporabnik potrjen in ali ima denar?
if ($kojikurac <> 1) {die("<b>$langmark438</b><br/><br/><a href=\"player.php?playerid=$playerid\">$langmark059</a>");}
$mindenarja = $newpric-300000;
if ($madenar+$plusdenar < $mindenarja) {die("<b>$langmark439</b><br/><br/><a href=\"javascript: history.go(-1)\">$langmark059</a></td></tr></table>");}

//cas do izteka
$splitdatetime = explode(" ", $timeofsale); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
//tri minute?
$expireminus = date("Y-m-d H:i:s", mktime($dbhour,$dbmin-3,$dbsec,$dbmonth,$dbday,$dbyear));
$timenow = date("Y-m-d H:i:s");
switch (TRUE){
case $timenow > $expireminus: $newdeadl = date("Y-m-d H:i:s", mktime($dbhour,$dbmin,$dbsec+37,$dbmonth,$dbday,$dbyear)); break;
case $timenow <= $expireminus: $newdeadl = date("Y-m-d H:i:s", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear)); break;
}
$expiretime = date("Y-m-d H:i:s", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));
if ($timenow > $expiretime) {echo "<p>",$langmark440,"<br/><a href=\"player.php?playerid=",$playerid,"\">",$langmark441,"</a></p>";
}
else
{
//validacija
$trenutno = mysql_query("SELECT currentbid FROM transfers WHERE trstatus=1 AND playerid=$playerid LIMIT 1") or die(mysql_error());
$trenuten_bid = mysql_result($trenutno,0);
if (!is_numeric($newpric) OR $newpric < round($trenuten_bid*102/100)) {die("<b>$langmark442</b><br/><br/><a href=\"player.php?playerid=$playerid\">$langmark059</a></td></tr></table>");}

//previsok bid
if ($newpric > round($trenuten_bid*104/100) AND $newpric > $trenuten_bid+50000 AND $trenuten_bid>0) {die("<b>Price too high, you can only raise bid for 50.000 or 4%</b><br/><br/><a href=\"javascript: history.go(-1)\">$langmark059</a></td></tr></table>");}
if ($newpric > round($price*104/100) AND $newpric > $price+50000 AND $trenuten_bid==0) {die("<b>Price too high, you can only raise bid for 50.000 or 4%</b><br/><br/><a href=\"javascript: history.go(-1)\">$langmark059</a></td></tr></table>");}

if ($trenuten_bid==0 AND $newpric < $price) {die("<b>$langmark442</b><br/><br/><a href=\"javascript: history.go(-1)\">$langmark059</a></td></tr></table>");}

//obvestilo
$last_bid = mysql_query("SELECT bidingteam FROM transfers WHERE transferid=$transferid LIMIT 1");
$last_user_bidding = mysql_result($last_bid,0);
$bidding_club = mysql_query("SELECT club FROM users WHERE userid=$last_user_bidding LIMIT 1");
while ($c_bidding = mysql_fetch_array($bidding_club, MYSQL_ASSOC))
   {   foreach ($c_bidding as $bidding_c)
   {$bidding_c; }     } ;

//bid
mysql_query("UPDATE transfers SET timeofsale='$newdeadl', currentbid=$newpric, bidingteam=$userid, bidingname='$clubbid' WHERE transferid='$transferid' LIMIT 1") or die(mysql_error());
echo $langmark443;?><br/><a href="player.php?playerid=<?=$playerid?>"><?=$langmark441?></a><br/>
<?php
if ($last_user_bidding > 0) {
mysql_query("INSERT INTO events VALUES ('', $bidding_c, NOW(), 'Better price was offered for <a href=player.php?playerid=$playerid>player</a>.', 0, 0);");
mysql_query("UPDATE teams SET tempmoney = tempmoney + $trenuten_bid WHERE teamid=$bidding_c LIMIT 1");
}
mysql_query("UPDATE teams SET tempmoney = tempmoney - $trenuten_bid + $newpric WHERE teamid=$club LIMIT 1");
mysql_query("UPDATE teams SET tempmoney = tempmoney - $newpric WHERE teamid=$trueclub LIMIT 1");
@mysql_query("INSERT INTO bids VALUES ($transferid, $userid, NOW(), '$newpric', '$newdeadl');");
}
}
//konec obrazca za bidanje

}
else
{
switch (TRUE) {
case $clubus <> $userid:
?>
<h2><?=$langmark446?></h2>
<?php if ($coach==0){?><br/><?=$langmark447?><br/><?php }?>
<?php if ($coach==9){die("<br/>Youth players can't be sold on market, but can be signed on Buy Youth when out of contract.<br/><br/><h2>Youth value</h2><br/><b>".number_format($signuYT, 0, ',', '.')." &euro;</b><br/><i>(Players are expected to have much lower value after promotion)</i></td></tr></table></div></div></body></html>");
}
break;
case ($clubus == $userid AND $coach==9):

//coach
$jekoex = mysql_query("SELECT workrate, experience, quality FROM players WHERE coach=1 AND club=$trueclub LIMIT 1");
if (mysql_num_rows($jekoex) > 0) {
$wrzawr = mysql_result($jekoex,0,"workrate");
$stted = mysql_result($jekoex,0,"experience");
$hszawr = mysql_result($jekoex,0,"quality");
}
else {$stted=3; $wrzawr=0; $hszawr=40;}
if ($stted>121) {$stted=121;}
$stted=$stted/11;
?>
<h2>Youth team options</h2><br/>

<?php if ($age<16){?><i>Player can't join seniors before he's 16.</i><br/><?php }
if ($age>15) {?><a href="player.php?playerid=<?=$playerid?>&action=ttpts">Promote to senior team</a><br/><?php }
if ($lasttekma > 0 AND $coach==9){?><a href="prikaz.php?matchid=<?=$lasttekma?>"><?=$langmark464?></a><br/><?php }
if ($action=='ttpts'){echo "<br/><font color=\"darkred\"><b>",$langmark470,"<br/><a href=\"player.php?playerid=",$playerid,"&action=ptst\">Yes, promote him!</a><br/><a href=\"player.php?playerid=",$playerid,"\">No, I still want him in Youth team!</a></font></b><br/><br/><i>(Price to promote a player is 15% of his future EV)</i><br/><br/>";}?>

<a href="player.php?playerid=<?=$playerid?>&action=ttdelyp"><?=$langmark469?></a><br/>
<?php if ($action=='ttdelyp'){echo "<br/><font color=\"darkred\"><b>",$langmark470,"<br/><a href=\"player.php?playerid=".$playerid."&action=delyp\">",$langmark471,"</a><br/>";
if ($age==15 AND $handling+$speed+$passing+$vision+$rebounds+$position+$freethrow+$shooting+$defense==0 AND $hawr>56 AND $hawr<100 AND ($workrate==0 OR $workrate > 80)){?><a href="player.php?playerid=<?=$playerid?>&action=totheby">Yes, release to Buy Youth!</a><br/><?php }?><a href="player.php?playerid=<?=$playerid?>"><?=$langmark472?></a></font></b><?php }?>

<br/><h2>Player developement</h2><br/>

<?php
if ($zeimatren >0) {?>
<table border="0" cellspacing="0" cellpadding="1" width="99%">
<tr width="100%"><td align="left"><b>Skill Focus:</b></td><td align="right">
<?php
SWITCH ($zeimatren) {
CASE 1: echo $langmark120; break;
CASE 2: echo $langmark121; break;
CASE 3: echo $langmark122; break;
CASE 4: echo $langmark123; break;
CASE 5: echo $langmark124; break;
CASE 6: echo $langmark125; break;
CASE 7: echo $langmark126; break;
CASE 8: echo $langmark127; break;
CASE 9: echo $langmark128; break;
}
?>
</td></tr>
<tr width="100%"><td align="left"><b>Remaining time:</b></td><td align="right"><?=round($secasa)?> week(s)</td></tr>
<!--<tr width="100%"><td align="left"><b>Skill prediction:</b></td><td align="right"></td></tr>-->
</table>

<br/><h2>Temporary workrate</h2><br/>

<i>Youth team players have temporary workrate. It changes when they start to develop new skill. It has nothing to do with their future workrate, it just shows what skill level are they likely to develop.</i>

<?php } else {?>

<table border="0" cellspacing="0" cellpadding="1" width="99%">
<form method="post" action="<?php echo "player.php?playerid=",$playerid;?>" style="margin: 0">
<tr width="100%"><td align="left"><b>Skill Focus:</b></td><td align="right"><select name="SFS" class="inputreg"><option value="1"><?=$langmark120?></option><option  value="2"><?=$langmark121?></option><option value="3"><?=$langmark122?></option><option value="4"><?=$langmark123?></option><option value="5"><?=$langmark124?></option><option value="6"><?=$langmark125?></option><option value="7"><?=$langmark126?></option><option value="8"><?=$langmark127?></option><option value="9"><?=$langmark128?></option></select></td></tr>
<tr width="100%"><td align="left"><b>Focus time:</b></td><td align="right"><select name="FTE" class="inputreg">
<?php if($stted>8){?><option value="9">9 weeks</option><?php }?>
<?php if($stted>7){?><option value="8">8 weeks</option><?php }?>
<?php if($stted>6){?><option value="7">7 weeks</option><?php }?>
<?php if($stted>5){?><option value="6">6 weeks</option><?php }?>
<?php if($stted>4){?><option value="5">5 weeks</option><?php }?>
<option value="4">4 weeks</option>
</select></td></tr><tr><td align="right" colspan="2">
<input type="hidden" name="val111" value="<?=$wrzawr?>">
<input type="hidden" name="val222" value="<?=($stted*11)?>">
<input type="hidden" name="val333" value="<?=$hszawr?>">
<input type="submit" value="Set training!" name="subYT" class="buttonreg">
</form></td></tr>
</table>
<?php
}
if ($age==17 AND $workrate==0) {
?>
<br/><br/><table width="100%" bgcolor="#F5F5F5">
<tr><td colspan="2" style="border-top: solid 1px LightSteelBlue;"></td></tr>
<tr><td colspan="2">17 year olds will be autopromoted in 19 weeks.</td></tr>
<!--<tr><td colspan="2">17 year olds will be autopromoted soon, so plan their training accordingly!</td></tr>-->
<tr><td colspan="2" style="border-bottom: solid 1px LightSteelBlue;"></td></tr>
</table>
<?php
}
break;
case ($clubus == $userid AND $coach<>9):
/* form enabling player sale */
?>

<h2>Selling disabled - returns error</h2><br/>
<?php
$posit = $_POST['posit'];
$pric = $_POST['pric'];
$stime = $_POST['stime'];
if (!isset($_POST['submit'])) {
//$browsar = get_browser(null, true);
//$browsar['javascript'];
?>
<table width="100%" border="0" cellsacing="0" cellpadding="0">
<form name="commas" method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="margin: 0">
<tr width="100%"><td align="left"><b><?=$langmark449?></b></td><td align="right">
<select name="posit" class="inputreg">
<option value="1"><?=$langmark386?></option>
<option value="2"><?=$langmark387?></option>
<option value="3"><?=$langmark388?></option>
<option value="4"><?=$langmark389?></option>
<option value="5"><?=$langmark390?></option>
</select></td></tr>
<tr width="100%"><td align="left"><b><?=$langmark451?></b></td><td align="right">
<select name="stime" class="inputreg">
<option value="1"><?=$langmark452?></option>
<option value="2"><?=$langmark453?></option>
<option value="3"><?=$langmark454?></option>
<option value="4"><?=$langmark455?></option>
<option value="5"><?=$langmark456?></option>
</select></td></tr>
<tr width="100%"><td align="left"><b><?=$langmark450?></b></td><td align="right">
<input type="button" value="check" onClick="document.commas.pric.value=commaSplit(document.commas.pric.value);" class="buttonreg" />
<input type="text" size="9" name="pric" maxlength="10" class="inputreg" /></td></tr>
<tr width="100%"><td colspan="2" align="right"><a href="player.php?playerid=<?=$playerid?>&dayz=on"><img src="img/qm.gif" alt="info" title="Transfer market info" border="0"></a>&nbsp;<input type="submit" value="Put him on the market!" name="submit" class="buttonreg"></td></tr></form></table>

<?php
} else {
$pric = str_replace(".","",$pric);
$pric = str_replace(",","",$pric);
$pric = str_replace(" ","",$pric);
if (!is_numeric($pric)) {die("<b>$langmark458</b><br/><a href=player.php?playerid=$playerid>$langmark059</a></td></tr></table></div></div></body></html>");}


//check set price and allowed max

if ($pric > ($value *1.5)+1) {$najvech = number_format($value*1.5, 0, ',', '.'); die("<b>Maximum starting price for this player is $najvech &euro;</b><br/><a href=\"javascript:history.go(-1)\">$langmark059</a></td></tr></table></div></div></body></html>");}


//check if he's not a coach

if ($coach==1) {die("<b>$langmark460</b><br/><a href=player.php?playerid=$playerid>$langmark059</a></td></tr></table></div></div></body></html>");}


//check if he's not on market already

$pore = mysql_query("SELECT transferid FROM transfers WHERE trstatus=1 AND playerid=$playerid");
if (mysql_num_rows($pore)>0) {die("<b>This player is already transfer listed!</b><br/><a href=player.php?playerid=$playerid>$langmark059</a></td></tr></table></div></div></body></html>");}

$nameseek = mysql_query("SELECT name, country FROM teams WHERE teamid ='$club' LIMIT 1");
$nameseek2 = mysql_result($nameseek,0,"name");
$countseek2 = mysql_result($nameseek,0,"country");

$caszdaj = date("Y-m-d H:i:s");
$splitdate = explode(" ", $caszdaj); $date1 = $splitdate[0]; $time1 = $splitdate[1];
$split1 = explode("-", $date1); $tyear = $split1[0]; $tmonth = $split1[1]; $tday = $split1[2];
$split2 = explode(":", $time1); $thour = $split2[0]; $tmin = $split2[1]; $tsec = $split2[2];
$transftime = date("Y-m-d H:i:s", mktime($thour,$tmin,$tsec,$tmonth,$tday+$stime,$tyear));

// $onmarketact = mysql_query("INSERT INTO transfers VALUES ('', $playerid, '$nameseek2', $clubus, '$countseek2', $pric, $posit, '$transftime', 0, 0, '', 1, $value);");

if($onmarketact){
echo "<p>",$langmark771,"<br/><a href=\"player.php?playerid=",$playerid,"\">",$langmark441,"</a></p>";
$trstatus = mysql_query("update players set isonsale=1 where id=$playerid");

} else {die("<p>$langmark461<br/><a href=player.php?playerid=$playerid>$langmark059</a></p></td></tr></table></div></div></body></html>");}

}

/* end of form which enables player sale */

break;
}
}

if ($coach<>9){?><br/><h2><?=$langmark462?></h2><br/><a href="playerstats.php?playerid=<?=$playerid?>"><?=$langmark463?></a><br/><?php }
if ($is_supporter==1 AND $coach<>9){?><a href="personal.php?playerid=<?=$playerid?>">Career stats</a>&nbsp;<img src="img/bsupn.png" title="Thanks for supporting Basketsim!" height="10" align="bottom"><br/><?php }
if ($lasttekma > 0 AND $coach<>9){?><a href="prikaz.php?matchid=<?=$lasttekma?>"><?=$langmark464?></a><br/><?php }
if ($coach<>9) {echo "<a href=\"transferhistory.php?playerid=",$playerid,"\">",$langmark466,"</a><br/>";}
if ($clubus==$userid AND $coach==0 AND $is_supporter==1) {echo "<a href=\"player.php?playerid=",$playerid,"&next=xpbar\">Experience bar</a>&nbsp;<img src=\"img/bsupn.png\" title=\"Thanks for supporting Basketsim!\" height=\"10\" align=\"bottom\"><br/>";}
if ($next<>'wage' AND $clubus==$userid AND $coach==0) {echo "<a href=\"player.php?playerid=",$playerid,"&next=wage\">Predicted wage</a><br/>";} elseif($next=='wage') {echo "<a href=\"player.php?playerid=",$playerid,"\">Remove prediction</a><br/>";}
//if ($next<>'EV' AND $clubus==$userid AND $coach==0) {echo "<a href=\"player.php?playerid=",$playerid,"&next=EV\">Predicted EV</a> <font color=\"green\"><b>NEW!</b></font><br/>";} elseif($next=='EV') {echo "<a href=\"player.php?playerid=",$playerid,"\">Remove prediction</a><br/>";}

//national
if ($natcoach>0 AND $nt_country==$country AND $ntplayer==0 AND $coach<>9) { ?><a href="player.php?playerid=<?=$playerid?>&action=trytocall"><?=$langmark468?></a><br/><?php }
if ($natcoach==1 AND $nt_country==$country AND $ntplayer==1 AND $coach<>9) { ?><a href="player.php?playerid=<?=$playerid?>&action=trytouncall">Remove from national team</a><br/><?php }
if ($natcoach==2 AND $nt_country==$country AND $ntplayer==2 AND $coach<>9) { ?><a href="player.php?playerid=<?=$playerid?>&action=trytouncall">Remove from national team</a><br/><?php }

if ($action=='trytocall' AND $coach<>9){echo "<br/><font color=\"darkred\"><b>",$langmark470,"<br/><a href=\"player.php?playerid=",$playerid,"&action=call\">Yes, call him up!</a><br/><a href=\"player.php?playerid=",$playerid,"\">No, do not call him!</a></font></b><br/><br/>";}
if ($action=='trytouncall' AND $coach<>9){echo "<br/><font color=\"darkred\"><b>",$langmark470,"<br/><a href=\"player.php?playerid=",$playerid,"&action=uncall\">Yes, lets get rid of him!</a><br/><a href=\"player.php?playerid=",$playerid,"\">No, keep him in!</a></font></b><br/>";}

switch (TRUE) {
case $clubus <> $userid:
echo " ";
break;

case ($clubus==$userid):

if ($isonsale < 1 AND $coach==0 AND $wsal <>'new') {?><a href="player.php?playerid=<?=$playerid?>&action=trytofire"><?=$langmark469?></a><br/><?php }
elseif ($coach==1) {echo "<b>This is your coach!</b><br/>";}
else {echo " ";
;}

break;
}

if ($action=='trytofire'){echo "<br/><font color=\"darkred\"><b>",$langmark470,"<br/><a href=\"player.php?playerid=",$playerid,"&action=fire\">",$langmark471,"</a><br/><a href=\"player.php?playerid=",$playerid,"\">",$langmark472,"</a></font></b>";}

if ($levelll >2 AND $club<>$trueclub AND $coach==0) {echo "<a href=\"admin/transfers.php?player=",$playerid,"\"><font color=\"darkred\">Price adjustment</font></a> <font color=\"darkred\">(WR=",$gmwr,")</font>";}

$intr = mysql_query("SELECT * FROM `bookmarks` WHERE b_type=1 AND b_link=$playerid");
$numi = mysql_num_rows($intr);
if ($numi > 2 && $action<>'trytofire' && $coach==0) {echo "<br/><i>$numi clubs are interested in this player!</i>";}

if ($userid==300000) {

//sam 8igralcev je igral za mene 100+, ali dam na 50 in uporabim za 50 uno hudo formulo, ali pa naredm celo stran vseh ki lahko nekoga podpišejo - mogoče kar takoj za test!; vidni skili igralcev?
//v pravila (100+ tekem, 24+, NT, listing); ni možno podpisovat pred kratkim odpuščenih; velja transfer omejitev 60 dni (stestiram!); fiksni denar od bodočega prestopa?
//stestiram z nt free agentom najprej podpis (klubske finance!), potem pa še listing (ali za nulo ali pa za isto ceno max); naj se objavi na LB, tist podpis ki je kao free naj bo za pavšal

if ($age > 23 AND $age < 40 AND $wage > 24999 AND $value > 999999) {
SWITCH ($age) {
CASE 24: $evmax=22000000; $wagemax=150000; $koefmax=3.5; $summax=55; break;
CASE 25: $evmax=24000000; $wagemax=150000; $koefmax=3.0; $summax=55; break;
CASE 26: $evmax=26500000; $wagemax=155000; $koefmax=2.6; $summax=60; break;
CASE 27: $evmax=27500000; $wagemax=175000; $koefmax=2.3; $summax=60; break;
CASE 28: $evmax=28000000; $wagemax=185000; $koefmax=2.1; $summax=60; break;
CASE 29: $evmax=27500000; $wagemax=175000; $koefmax=2.0; $summax=60; break;
CASE 30: $evmax=18000000; $wagemax=150000; $koefmax=1.9; $summax=55; break;
CASE 31: $evmax=12500000; $wagemax=140000; $koefmax=1.8; $summax=50; break;
CASE 32: $evmax=11000000; $wagemax=135000; $koefmax=1.7; $summax=50; break;
CASE 33: $evmax=9500000; $wagemax=125000; $koefmax=1.6; $summax=50; break;
CASE 34: $evmax=4500000; $wagemax=90000; $koefmax=1.5; $summax=45; break;
CASE 35: $evmax=3500000; $wagemax=75000; $koefmax=1.4; $summax=40; break;
CASE 36: $evmax=3000000; $wagemax=70000; $koefmax=1.3; $summax=40; break;
CASE 37: $evmax=2500000; $wagemax=65000; $koefmax=1.2; $summax=40; break;
CASE 38: $evmax=2000000; $wagemax=60000; $koefmax=1.1; $summax=35; break;
CASE 39: $evmax=1500000; $wagemax=55000; $koefmax=1.0; $summax=30; break;
}
if ($value > 6900000 AND $wage > 89000) {$koefmax=$koefmax+0.1;}
if ($value > 7900000 AND $wage > 99000) {$koefmax=$koefmax+0.2;}
if ($value > 8900000 AND $wage > 89999) {$koefmax=$koefmax+0.3;}
if ($value > 9400000 AND $wage > 104000) {$koefmax=$koefmax+0.2;}
if ($value > 12500000 AND $wage > 119000) {$koefmax=$koefmax+0.1;}
if ($value < 3300000 AND $wage < 64000) {$koefmax=$koefmax-0.1;}
if ($value < 2499999 AND $wage < 59999) {$koefmax=$koefmax-0.1;}
if ($value < 1999999 AND $wage < 44999) {$koefmax=$koefmax-0.12;}
if ($value < 1799999 AND $wage < 55000) {$koefmax=$koefmax-0.12;}
if ($koefmax < 1) {$koefmax=1;}

$koncnvr = ((((((((sqrt($workrate + 1)) / 5) + ($value / $evmax) + ($wage / $wagemax)) / 3) + (2 * ((pow($summax,2)) / 7200))) / 4) * ($koefmax - 1)) + 0.5) * $value * 0.75;
echo "<br/>";
echo "100 tekem - ",round(1.5*$koncnvr),"<br/>";
echo "150 tekem - ",round(1.4*$koncnvr),"<br/>";
echo "200 tekem - ",round(1.3*$koncnvr),"<br/>";
echo "250 tekem - ",round(1.2*$koncnvr),"<br/>";
echo "300 tekem - ",round(1.1*$koncnvr),"<br/>";
echo "<br/><b><a href=\"player.php?playerid=",$playerid,"\">Sign your former player</a></b>";
} elseif (($age > 39 OR $wage < 25000 OR $value < 1000000) AND ($age > 23)) {echo "<br/><b><a href=\"player.php?playerid=",$playerid,"\">Sign your former player for 10k</a></b>";}
}
?>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>