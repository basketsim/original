<?php
if (isset($_POST['submitcancel'])) {header("Location:staff1.php");}
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT `club`, `lang`, `name`, `country`, `curmoney` FROM `users`, `teams` WHERE users.club=teams.teamid AND password ='$koda' AND userid ='$userid' LIMIT 1") or die(include 'basketsim.php');
if (mysql_num_rows($compare)) {
$trueclub = mysql_result($compare,0,"club");
$lang = mysql_result ($compare,0,"lang");
$iname = mysql_result($compare,0,"name");
$icountry = mysql_result ($compare,0,"country");
$icurmoney = mysql_result ($compare,0,"curmoney");
}
else {die(include 'basketsim.php');}
require("inc/lang/".$lang.".php");

$preveritev = mysql_query("SELECT * FROM scouts WHERE teamid ='$trueclub' LIMIT 1") or die(mysql_error());
$prev = mysql_num_rows($preveritev);
while ($g = mysql_fetch_array($preveritev)) {
$sname = $g["name"];
$ssurname = $g["surname"];
$slocation0 = $g["location0"]; if($slocation0=='Bosnia'){$slocation0='Bosnia and Herzegovina';}
$slocation1 = $g["location1"]; if($slocation1=='Bosnia'){$slocation1='Bosnia and Herzegovina';}
$slocation2 = $g["location2"]; if($slocation2=='Bosnia'){$slocation2='Bosnia and Herzegovina';}
$slocation3 = $g["location3"]; if($slocation3=='Bosnia'){$slocation3='Bosnia and Herzegovina';}
$sfocus1 = $g["focus1"];
$sfocus2 = $g["focus2"];
$squality = $g["quality"];
$stalent = $g["talent"];
$splayerid = $g["playerid"];
$sstatus = $g["status"];
$sdays = $g["days"];
}

$new = $_GET["new"];
//skavt je pripeljal igralca
if ($new=='confirm' AND $sstatus==1 AND $splayerid>0) {
$pnaj = mysql_query("SELECT club, age, workrate, height, handling, speed, passing, vision, rebounds, position, freethrow, shooting, experience, defense FROM players WHERE id ='$splayerid' LIMIT 1") or die(mysql_error());
if (mysql_result($pnaj,0,"club")==0) {
mysql_query("UPDATE players SET club ='$trueclub', shirt=NULL WHERE id ='$splayerid' LIMIT 1") or die(mysql_error());
mysql_query("DELETE FROM scouts WHERE teamid ='$trueclub'") or die(mysql_error());
$polzaj=rand(1,5);
$height = mysql_result($pnaj,0,"height");
$handling = mysql_result($pnaj,0,"handling");
$speed = mysql_result($pnaj,0,"speed");
$passing = mysql_result($pnaj,0,"passing");
$vision = mysql_result($pnaj,0,"vision");
$rebounds = mysql_result($pnaj,0,"rebounds");
$position = mysql_result($pnaj,0,"position");
$freethrow = mysql_result($pnaj,0,"freethrow");
$shooting = mysql_result($pnaj,0,"shooting");
$experience = mysql_result($pnaj,0,"experience");
$defense = mysql_result($pnaj,0,"defense");
$wr_nov = mysql_result($pnaj,0,"workrate");
$age_nov = mysql_result($pnaj,0,"age");
$value5 = ($height * 2) + $handling + ($speed * 4) + ($passing * 2) + ($vision * 2) + ($rebounds * 3) + ($position * 4) + ($freethrow * 3) + ($shooting * 4) + ($experience * 2) + ($defense * 3);
$wage_nov = (($value5 * $value5 * $value5) / 225000) - 7500;
if ($wage_nov < 200) {$wage_nov=200;}
$vvalue = ((($wage_nov/9)*($wage_nov/9))/15)*(($wage_nov/240000+(1/(exp(pow((($age_nov-16)/10),4.1)))))*(((($wr_nov/8)+1)/19)+1))*((sqrt($wage_nov/180000))/((((tanh((($age_nov/2)-10))/2)+0.5)*0.71)+0.29));
if ($vvalue < 1000) {$vvalue=1000;}
$denar = round($vvalue/3);
mysql_query("UPDATE teams SET curmoney=curmoney-$denar WHERE teamid ='$trueclub' LIMIT 1") or die(mysql_error());
$denar1 = number_format($denar, 0, ',', '.');
$ftime = time(); $fyear=date('Y', $ftime); $fmonth=date('m', $ftime); $fday=date('d', $ftime); $fhour=date('H', $ftime); $fmin=date('i', $ftime); $fsec=date('s', $ftime);
mysql_query("INSERT INTO transfers VALUES ('', $splayerid, 'Free Agent', 0, '$icountry', 0, $polzaj, '$fyear=$fmonth=$fday $fhour+$fmin+$fsec', 1, $userid, '$iname', 0, $vvalue);");
mysql_query("INSERT INTO events VALUES ('', $trueclub, NOW(), 'The contract was signed with a <a href=player.php?playerid=$splayerid>free agent</a> at a cost of $denar1 &euro;.', 1, -$denar);") or die(mysql_error());
mysql_query("INSERT INTO events VALUES ('', $trueclub, NOW(), 'Signed a <a href=player.php?playerid=$splayerid>free agent</a>.', 0, -$denar);") or die(mysql_error());
} else {header("Location:staff1.php?new=error");die();}
header("Location:player.php?playerid=$splayerid");
}

//skavt je bil poslan na dejansko iskanje
if (isset($_POST["submitsearch"])) {
$s_time=$_POST["s_time"];
if ($sstatus<>1 AND $s_time>4) {
if ($icurmoney<0) {header( "Location: staff1.php?new=error1" );die();}
$denar = round($s_time*10000);
mysql_query("UPDATE scouts SET status=1, days=$s_time WHERE teamid ='$trueclub' LIMIT 1") or die(mysql_error());
mysql_query("UPDATE teams SET curmoney=curmoney-$denar WHERE teamid ='$trueclub' LIMIT 1") or die(mysql_error());
$denarP = number_format($denar, 0, ',', '.');
mysql_query("INSERT INTO events VALUES ('', $trueclub, NOW(), 'Scout was hired at a cost of $denarP &euro;.', 1, -$denar);") or die(mysql_error());
}
header( 'Location: staff1.php' );
}

//najem skavta
if ($new=='scout') {
if ($icurmoney<0) {header( "Location: staff1.php?new=error1" );die();}
//locations
$locations = mysql_query("SELECT DISTINCT `country` FROM `regions`") or die(mysql_error());
while ($zb = mysql_fetch_array($locations)) {
$arrLoc[] = $zb[0];
}
shuffle($arrLoc);
$location0 = $arrLoc[0]; 
$location1 = $arrLoc[1];
$location2 = $arrLoc[2];
$location3 = $arrLoc[3];
//name,surname
$namez = mysql_query("SELECT `name` FROM `names` WHERE `country` LIKE '$location0'") or die(mysql_error());
while ($n = mysql_fetch_array($namez)) {
$arrName[] = $n[0];
}
shuffle($arrName);
$random_name_value = $arrName[0];
$surnamez = mysql_query("SELECT `surname` FROM `surnames` WHERE `country` LIKE '$location0'") or die(mysql_error());
while ($s = mysql_fetch_array($surnamez)) {
$arrSur[] = $s[0];
}
shuffle($arrSur);
$random_surname_value = $arrSur[0];
//skills
$ddog = array("handling", "speed", "passing", "vision", "rebounds", "position", "freethrow", "shooting", "defense", "workrate");
shuffle($ddog);
$skill1=$ddog[0];
$skill2=$ddog[1];
//quality,talent
$koef1=rand(7,24);
SWITCH ($koef1) {
CASE 7: $quality=rand(0,2); break;
CASE 8: $quality=rand(0,2); break;
CASE 9: $quality=rand(0,2); break;
CASE 10: $quality=rand(0,2); break;
CASE 11: $quality=rand(0,3); break;
CASE 12: $quality=rand(0,3); break;
CASE 13: $quality=rand(0,4); break;
CASE 14: $quality=rand(0,4); break;
CASE 15: $quality=rand(1,4); break;
CASE 16: $quality=rand(1,4); break;
CASE 17: $quality=rand(1,4); break;
CASE 18: $quality=rand(0,6); break;
CASE 19: $quality=rand(0,9); break;
CASE 20: $quality=rand(0,9); break;
CASE 21: $quality=rand(1,10); break;
CASE 22: $quality=rand(1,11); break;
CASE 23: $quality=rand(1,12); break;
CASE 24: $quality=rand(0,15); break;
}
$koef2=rand(6,24);
SWITCH ($koef2) {
CASE 6: $talent=rand(0,1); break;
CASE 7: $talent=rand(0,1); break;
CASE 8: $talent=rand(0,2); break;
CASE 9: $talent=rand(0,2); break;
CASE 10: $talent=rand(0,2); break;
CASE 11: $talent=rand(0,3); break;
CASE 12: $talent=rand(0,3); break;
CASE 13: $talent=rand(0,4); break;
CASE 14: $talent=rand(0,5); break;
CASE 15: $talent=rand(0,6); break;
CASE 16: $talent=rand(0,7); break;
CASE 17: $talent=rand(1,8); break;
CASE 18: $talent=rand(0,8); break;
CASE 19: $talent=rand(0,8); break;
CASE 20: $talent=rand(0,9); break;
CASE 21: $talent=rand(1,9); break;
CASE 22: $talent=rand(1,11); break;
CASE 23: $talent=rand(1,11); break;
CASE 24: $talent=rand(1,15); break;
}
if ($prev >0 AND $sstatus <>1) {mysql_query("DELETE FROM scouts WHERE teamid ='$trueclub' LIMIT 5") or die(mysql_error());}
if ($sstatus <>1) {
mysql_query("INSERT INTO scouts VALUES('', '$random_name_value', '$random_surname_value', '$location0', '$location1', '$location2', '$location3', '$skill1', '$skill2', $quality, $talent, $trueclub, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("UPDATE teams SET curmoney=curmoney-3000 WHERE teamid=$trueclub LIMIT 1") or die(mysql_error());
mysql_query("INSERT INTO events VALUES ('', $trueclub, NOW(), 'Scout was hired.', 2, -3000);") or die(mysql_error());
}
header("Location:staff1.php");
}

//preverim obstoj m.c.
$centerje = mysql_query("SELECT current_level, next_update FROM medical_center WHERE id_team ='$trueclub'") or die(mysql_error());
if (mysql_num_rows($centerje)){
$obstaja = 1;
$current_level = mysql_result($centerje,0,"current_level");
$next_update = mysql_result($centerje,0,"next_update");
SWITCH ($current_level) {
CASE 0: $ime_stopnje = $langmark902; $stevilo_dni=10; $cena='100.000'; $money=100000; break;
CASE 1: $ime_stopnje = $langmark909; $stevilo_dni=20; $cena='250.000'; $money=250000; break;
CASE 2: $ime_stopnje = $langmark910; $stevilo_dni=30; $cena='1 M'; $money=1000000; break;
CASE 3: $ime_stopnje = $langmark911; $stevilo_dni=45; $cena='2.5 M'; $money=2500000; break;
CASE 4: $ime_stopnje = $langmark912; $stevilo_dni=60; $cena='5 M'; $money=5000000; break;
CASE 5: $ime_stopnje = $langmark913; break;
}
//zgoraj konec switcha
}
else {$obstaja = 0; $current_level=0;}

//zacetek gradnje
if (isset($_POST['submit1'])) {
if (mysql_num_rows($centerje)>0) {header("location: staff1.php"); die();}
$mindenarja = $money*90/100; if ($icurmoney < $mindenarja) {header( 'Location: staff1.php?error=nm' ); die();}
$enddate = mktime(0,0,0,date("m"),date("d")+10,date("Y"));
$endate = date("Y-m-d", $enddate);
$kljukica = $_POST['checkbox1'];
if ($kljukica=='YES') {
mysql_query("INSERT INTO medical_center VALUES ('', $trueclub, 0, '$endate');") or die(mysql_error());
mysql_query("UPDATE teams SET curmoney=curmoney-100000 WHERE teamid ='$trueclub' LIMIT 1");
mysql_query("INSERT INTO events VALUES ('', $trueclub, NOW(), 'Medical center upgrade was ordered at a cost of 100.000 &euro;.', 1, -100000);");
header( 'Location: staff1.php' );
}
}

if (isset($_POST['submit'])) {
if (mysql_result($centerje,0,"next_update")<>'0000-00-00') {header("location: staff1.php"); die();}
$mindenarja = $money*90/100; if ($icurmoney < $mindenarja) {header( 'Location: staff1.php?error=nm' ); die();}
$enddate = mktime(0,0,0,date("m"),date("d")+$stevilo_dni,date("Y"));
$endate = date("Y-m-d", $enddate);
$kljukica = $_POST['checkbox1'];
if ($kljukica=='YES') {
mysql_query("UPDATE medical_center SET next_update='$endate' WHERE id_team ='$trueclub' LIMIT 1") or die(mysql_error());
mysql_query("UPDATE teams SET curmoney=curmoney-$money WHERE teamid ='$trueclub' LIMIT 1");
mysql_query("INSERT INTO events VALUES ('', $trueclub, NOW(), 'Medical center upgrade was ordered at a cost of $cena &euro;.', 1, -$money);");
header( 'Location: staff1.php' );
}
}

include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2><?=$langmark897?></h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="49%">

<?php
$error = $_GET["error"];
if ($error=='nm'){echo "<font color=\"red\"><b>",$langmark898,"</b></font><br/>";}
?>
<h2><?=$langmark899?></h2><br/>
<i><?=$langmark900?></i><br/><br/>

<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td width="70%">

<?php if($obstaja==0){?>

<?=$langmark901," <b>",$langmark902?></b><br/>
<?=$langmark903?> <b>100.000 &euro;</b><br/>
<?=$langmark904," <b>10 ",$langmark905?></b><br/><br/>
<form method="post" action="<?=$PHP_SELF?>" style="margin: 0">
<input style="margin:0; padding:0;" type='checkbox' name='checkbox1' value='YES' />&nbsp;
<input type="submit" name="submit1" value="<?=$langmark906?>" class="buttonreg">
</form>

<?php } else { ?>

<?=$langmark901," <b>",$ime_stopnje?></b><br/>
<?php if ($current_level <>5){?><?=$langmark903," <b>",$cena?> &euro;</b><br/><?php }?>
<?php if ($current_level <>5){?><?=$langmark904," <b>",$stevilo_dni," ",$langmark905?></b><br/><br/><?php }?>
<?php if ($current_level <>5 AND $next_update =='0000-00-00'){?><form method="post" action="<?=$PHP_SELF?>" style="margin: 0"><input style="margin:0; padding:0;" type='checkbox' name='checkbox1' value='YES' />&nbsp;<input type="submit" name="submit" value="<?=$langmark906?>" class="buttonreg"></form><?php }?>
<?php if ($current_level <>5 AND $next_update <>'0000-00-00'){echo "<i>",$langmark907," ",$next_update,".</i>";}?>
<?php if ($current_level ==5){echo $langmark908,"<br/>";}?>

<?php }?>
</td><td width="30%">
<?php
SWITCH ($current_level) {
CASE "0": echo "<img src=\"/img/Medical0.jpg\" title=\"".$langmark1292."\" alt=\"".$langmark1292."\">"; break;
CASE "1": echo "<img src=\"/img/Medical1.jpg\" title=\"".$langmark1293." 1\" alt=\"".$langmark1293." 1\">"; break;
CASE "2": echo "<img src=\"/img/Medical2.jpg\" title=\"".$langmark1293." 2\" alt=\"".$langmark1293." 2\">"; break;
CASE "3": echo "<img src=\"/img/Medical3.jpg\" title=\"".$langmark1293." 3\" alt=\"".$langmark1293." 3\">"; break;
CASE "4": echo "<img src=\"/img/Medical4.jpg\" title=\"".$langmark1293." 4\" alt=\"".$langmark1293." 4\">"; break;
CASE "5": echo "<img src=\"/img/Medical5.jpg\" title=\"".$langmark1294."\" alt=\"".$langmark1294."\">"; break;
}
?>
</td></tr></table>

</td>
<td class="border" width="51%">

<?php
if ($new=='error'){echo "<font color=\"darkred\"><b>",$langmark1295,"</b></font><br/>";}
if ($new=='error1'){echo "<font color=\"darkred\"><b>",$langmark1296,"</b></font><br/>";}
?>

<h2><?=$langmark914?></h2><br/>

<i><?=$langmark915?></i><br/><br/>

<?php
//sploh imamo skavta?
if ($prev>0) {

SWITCH ($sfocus1) {
CASE 'speed': $sfocus1='quickness'; break;
CASE 'vision': $sfocus1='dribbling'; break;
CASE 'position': $sfocus1='positioning'; break;
CASE 'freethrow': $sfocus1='free throws'; break;
}
SWITCH ($sfocus2) {
CASE 'speed': $sfocus2='quickness'; break;
CASE 'vision': $sfocus2='dribbling'; break;
CASE 'position': $sfocus2='positioning'; break;
CASE 'freethrow': $sfocus2='free throws'; break;
}
SWITCH ($squality) {
CASE 0: $squality = $langmark111." (0)"; break;
CASE 1: $squality = $langmark096." (1)"; break;
CASE 2: $squality = $langmark097." (2)"; break;
CASE 3: $squality = $langmark098." (3)"; break;
CASE 4: $squality = $langmark099." (4)"; break;
CASE 5: $squality = $langmark100." (5)"; break;
CASE 6: $squality = $langmark101." (6)"; break;
CASE 7: $squality = $langmark102." (7)"; break;
CASE 8: $squality = $langmark103." (8)"; break;
CASE 9: $squality = $langmark104." (9)"; break;
CASE 10: $squality = $langmark105." (10)"; break;
CASE 11: $squality = $langmark106." (11)"; break;
CASE 12: $squality = $langmark107." (12)"; break;
CASE 13: $squality = $langmark108." (13)"; break;
CASE 14: $squality = $langmark109." (14)"; break;
CASE 15: $squality = $langmark110." (15)"; break;
}
SWITCH ($stalent) {
CASE 0: $stalent = $langmark111." (0)"; break;
CASE 1: $stalent = $langmark096." (1)"; break;
CASE 2: $stalent = $langmark097." (2)"; break;
CASE 3: $stalent = $langmark098." (3)"; break;
CASE 4: $stalent = $langmark099." (4)"; break;
CASE 5: $stalent = $langmark100." (5)"; break;
CASE 6: $stalent = $langmark101." (6)"; break;
CASE 7: $stalent = $langmark102." (7)"; break;
CASE 8: $stalent = $langmark103." (8)"; break;
CASE 9: $stalent = $langmark104." (9)"; break;
CASE 10: $stalent = $langmark105." (10)"; break;
CASE 11: $stalent = $langmark106." (11)"; break;
CASE 12: $stalent = $langmark107." (12)"; break;
CASE 13: $stalent = $langmark108." (13)"; break;
CASE 14: $stalent = $langmark109." (14)"; break;
CASE 15: $stalent = $langmark110." (15)"; break;
}
echo "<big></b> ",$sname," ",$ssurname," <img src=\"img/Flags/",$slocation0,".png\" alt=\"($slocation0)\" title=\"$slocation0\" border=\"0\"></b></big><hr/>";
echo "<b>",$langmark1297,"</b> ",$slocation0,", ",$slocation1,", ",$slocation2,", ",$slocation3,"<br/>";
echo "<b>",$langmark1298,"</b> ",$sfocus1,", ",$sfocus2,"<br/>";
echo "<b>",$langmark1299,"</b> ",$squality,"<br/>";
echo "<b>",$langmark1300,"</b> ",$stalent,"<hr/>";
}
if ($sstatus==0 AND $prev>0 AND $new<>'order') {echo "<a href=\"staff1.php?new=order\">",$langmark1301,"</a><br/>";}
if ($new=='ask') {?><b><?=$langmark1302?> 3.000 &euro;?</b>&nbsp;[<a href="staff1.php?new=scout"><?=$langmark1303?></a>]&nbsp;[<a href="staff1.php"><?=$langmark1304?></a>]<br/><a href="topagents.php"><?=$langmark928?></a><br/><a href="gamerules.php?action=transfers">scouting rules</a><?php } elseif ($new<>'order' AND $sstatus<>1) {?><a href="staff1.php?new=ask"><?=$langmark1305?></a><br/><a href="topagents.php"><?=$langmark928?></a><br/><a href="gamerules.php?action=transfers">scouting rules</a>
<?php } elseif ($new<>'order' AND $sstatus==1) {?><?php if($splayerid>0) {?><i><a href="player.php?playerid=<?=$splayerid?>&action=lasts"><?=$langmark1306?></a> <?=$langmark1307?></i> (<a href="staff1.php?new=player"><?=$langmark1308?></a>)<br/><?php }?>
<?php if($new=='player' && $sstatus==1){?><font color="darkred"><?=$langmark1309?> <a href="player.php?playerid=<?=$splayerid?>&action=lasts"><?=$langmark1310?></a> <?=$langmark1311?> <a href="staff1.php?new=confirm"><?=$langmark1312?></a> <?=$langmark1313?></font><br/><i>(Signup costs 1/3 of player's value)</i><hr/><?php }?><i><?=$langmark1315?></i> <?=$sdays?><br/><a href="topagents.php"><?=$langmark928?></a><br/><a href="gamerules.php?action=transfers">scouting rules</a><?php }
if ($new=='order') {
?>
<form method="post" action="<?=$PHP_SELF?>" style="margin: 0">
<i><?=$langmark1316?> 10.000 &euro; <?=$langmark1317?></i><br/>
<b><?=$langmark1318?></b>
<select name="s_time" class="buttonreg">
<option value="14" onclick="alert('To hire a scout for 14 days costs 140.000 &euro;');">14 <?=$langmark905?></option>
<option value="21" onclick="alert('To hire a scout for 21 days costs 210.000 &euro;');">21 <?=$langmark905?></option>
<option value="28" onclick="alert('To hire a scout for 28 days costs 280.000 &euro;');">28 <?=$langmark905?></option>
</select>
<input type="submit" name="submitsearch" value="<?=$langmark1319?>" class="buttonreg">
<input type="submit" name="submitcancel" value="<?=$langmark1320?>" class="buttonreg">
</form>
<?php }?>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>