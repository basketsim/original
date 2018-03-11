<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$comparepasss = mysql_query("SELECT club, lang, 3pts FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(include 'basketsim.php');
if (mysql_num_rows($comparepasss)) {
$trueclub = mysql_result($comparepasss,0,"club");
$lang = mysql_result ($comparepasss,0,"lang");
$threepts = mysql_result($comparepasss,0,"3pts");
}
else {die(include 'basketsim.php');}

$throws=$_POST["throws"];

if (isset($_POST['submit']) AND $threepts==0 AND $throws >0){
$izbranec = mysql_query("SELECT club, height, weight, handling, speed, shooting, experience FROM players WHERE id =$throws") or die(mysql_error());
$klubec = mysql_result($izbranec,0,"club");
$visina = mysql_result($izbranec,0,"height");
$teza = mysql_result($izbranec,0,"weight");
$vodenje = mysql_result($izbranec,0,"handling"); if ($vodenje > 94) {$vodenje=94;}
$speed = mysql_result($izbranec,0,"speed"); $speed = $speed * 0.83;
$shooting = mysql_result($izbranec,0,"shooting"); if ($shooting > 120) {$shooting=120;}
$shooting = $shooting - 32; if ($shooting < 24) {$shooting=24;}
$experience = mysql_result($izbranec,0,"experience"); if ($experience > 108) {$experience=108;}
$experience = $experience - 21; if ($experience < 18) {$experience=18;}
if ($visina < 172 OR $visina > 205) {$prava_visina=0;} else {$prava_visina=2;}
if ($teza < 66 OR $teza > 100) {$prava_teza=0;} else {$prava_teza=2;}
$moznost = $prava_visina + $prava_teza + $vodenje/2 + $speed/2 + (5*$shooting/2) + $experience;
$moznost = floor($moznost);
$m=0;
while ($m<25) {
SWITCH (TRUE) {
CASE ($moznost < 80): $yeah = rand(2,83); break;
CASE ($moznost > 79 AND $moznost < 130): $yeah = rand(2,54); break;
CASE ($moznost > 129 AND $moznost < 180): $yeah = rand(2,41); break;
CASE ($moznost > 179 AND $moznost < 220): $yeah = rand(2,32); break;
CASE ($moznost > 219 AND $moznost < 260): $yeah = rand(2,26); break;
CASE ($moznost > 259 AND $moznost < 300): $yeah = rand(2,20); break;
CASE ($moznost > 299 AND $moznost < 330): $yeah = rand(2,17); break;
CASE ($moznost > 329 AND $moznost < 360): $yeah = rand(2,15); break;
CASE ($moznost > 359 AND $moznost < 399): $yeah = rand(2,13); break;
CASE ($moznost > 398 AND $moznost < 439): $yeah = rand(2,12); break;
CASE ($moznost > 438): $yeah = rand(2,11); break;
}
$vrednost_ = 1;
if ($m==4 OR $m==9 OR $m==14 OR $m==19 OR $m==24) {$vrednost_=2;}
if ($yeah < 10) {$uspeh=1;} else {$uspeh=0;}
if (($m==4 OR $m==9 OR $m==14 OR $m==19 OR $m==24) AND ($uspeh==1)) {$uspeh=2;}
$skupaj = $skupaj + $uspeh;
$poizk = $m+1;
mysql_query("INSERT INTO tp_contest VALUES ('', $throws, $klubec, $poizk, $vrednost_, $uspeh, $skupaj);") or die(mysql_error());
$m++;
}
mysql_query("UPDATE users SET 3pts=1 WHERE userid=$userid LIMIT 1") or die(mysql_error());
mysql_query("UPDATE players SET 3points=30 WHERE id=$throws LIMIT 1") or die(mysql_error());
header( 'Location: threepointers.php' );
}

//ZGODOVINA
$super = $_GET["super"];
if ($super == 'winners')
{
//podatki o tekmovanju
$sponzoruu = mysql_query("SELECT sponsor, winner1, winner2, winner3, winner4, `award1`, `award2`, `award3`, `award4`, `score` FROM `threepoints` WHERE status =0 ORDER BY id DESC") or die(mysql_error());

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2><?=$langmark939?></h2>
<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="100%">

<img src="img/3ptsbaner231.gif" width="230" alt="<?=$langmark1217?>" title="<?=$langmark1217?>">
<h2><?=$langmark940?></h2><br/>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
<tr><td align="right"><span title="<?=$langmark942?>">#</span></td><td></td><td><b><?=$langmark404?></b></td><td><b><?=$langmark934?></b></td><td><b><?=$langmark692?></b></td><td><td><b><?=$langmark941?></b></td></tr>
<tr><td colspan="7"><hr/></td></tr>

<?php
$gur=0;
$tekmovanj = mysql_num_rows($sponzoruu);
while ($gur < $tekmovanj) {

$sponsorus = mysql_result($sponzoruu, $gur, "sponsor");
$winnerus1 = mysql_result($sponzoruu, $gur, "winner1");
$winnerus2 = mysql_result($sponzoruu, $gur, "winner2");
$winnerus3 = mysql_result($sponzoruu, $gur, "winner3");
$winnerus4 = mysql_result($sponzoruu, $gur, "winner4");
$awardus1 = mysql_result($sponzoruu, $gur, "award1");
$awardus2 = mysql_result($sponzoruu, $gur, "award2");
$awardus3 = mysql_result($sponzoruu, $gur, "award3");
$awardus4 = mysql_result($sponzoruu, $gur, "award4");
$scorus = mysql_result($sponzoruu, $gur, "score");

$koristnik='';
$uhdec = mysql_query("SELECT username FROM users WHERE userid ='$sponsorus' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($uhdec)) {$koristnik = mysql_result($uhdec,0);} else {$koristnik='';}

$imein1 = mysql_query("SELECT `name`, `surname` FROM `players` WHERE `id` ='$winnerus1'") or die(mysql_error());
$imenus1 = mysql_result($imein1,0,"name");
$primkus1 = mysql_result($imein1,0,"surname");

//izpis
if ($sponsorus==$userid AND $koristnik<>'') {$jabla='#FFCC66';} else {$jabla='white';}

echo "<tr bgcolor=\"$jabla\"><td align=\"right\"><b>",($tekmovanj-$gur),"</b></td><td>&nbsp;</td><td><a href=\"player.php?playerid=",$winnerus1,"\">",$imenus1," ",$primkus1,"</a></td><td>",stripslashes($awardus1),"</td><td>",$scorus," ",$langmark174,"</td><td><td><a href=\"club.php?clubid=",$sponsorus,"\">",$koristnik,"</a></td></tr>";

if ($winnerus2 > 0) {
$imein2 = mysql_query("SELECT `name`, `surname` FROM `players` WHERE `id` ='$winnerus2'") or die(mysql_error());
$imenus2 = mysql_result($imein2,0,"name");
$primkus2 = mysql_result($imein2,0,"surname");
echo "<tr bgcolor=\"$jabla\"><td align=\"right\"><b>",($tekmovanj-$gur),"</b></td><td>&nbsp;</td><td><a href=\"player.php?playerid=",$winnerus2,"\">",$imenus2," ",$primkus2,"</a></td><td>",stripslashes($awardus2),"</td><td>";
if (($tekmovanj-$gur) <>2 && ($tekmovanj-$gur) <>6 && ($tekmovanj-$gur) <>10 && ($tekmovanj-$gur) <>13 && ($tekmovanj-$gur) <>19 && ($tekmovanj-$gur) <>28 && ($tekmovanj-$gur) <>38 && ($tekmovanj-$gur) <>45 && ($tekmovanj-$gur) <>49 && ($tekmovanj-$gur) <>53 && ($tekmovanj-$gur) <>60 && ($tekmovanj-$gur) <>62 && ($tekmovanj-$gur) <>63 && ($tekmovanj-$gur) <>71 && ($tekmovanj-$gur) <>74 && ($tekmovanj-$gur) <>75 && ($tekmovanj-$gur) <>90 && ($tekmovanj-$gur) <>95 && ($tekmovanj-$gur) <>103 && ($tekmovanj-$gur) <>107 && ($tekmovanj-$gur) <>110 && ($tekmovanj-$gur) <>111 && ($tekmovanj-$gur) <>119 && ($tekmovanj-$gur) <>122 && ($tekmovanj-$gur) <>124 && ($tekmovanj-$gur) <>128 && ($tekmovanj-$gur) <>138 && ($tekmovanj-$gur) <>145 && ($tekmovanj-$gur) <>148 && ($tekmovanj-$gur) <>149 && ($tekmovanj-$gur) <>153 && ($tekmovanj-$gur) <>154 && ($tekmovanj-$gur) <>156 && ($tekmovanj-$gur) <>157 && ($tekmovanj-$gur) <>158 && ($tekmovanj-$gur) <>159 && ($tekmovanj-$gur) <>162 && ($tekmovanj-$gur) <>163 && ($tekmovanj-$gur) <>164 && ($tekmovanj-$gur) <>165 && ($tekmovanj-$gur) <>172) {echo $scorus," ",$langmark174;}
echo "</td><td><td><a href=\"club.php?clubid=",$sponsorus,"\">",$koristnik,"</a></td></tr>";
}
if ($winnerus3 > 0) {
$imein3 = mysql_query("SELECT `name`, `surname` FROM `players` WHERE `id` ='$winnerus3'") or die(mysql_error());
$imenus3 = mysql_result($imein3,0,"name");
$primkus3 = mysql_result($imein3,0,"surname");
echo "<tr bgcolor=\"$jabla\"><td align=\"right\"><b>",($tekmovanj-$gur),"</b></td><td>&nbsp;</td><td><a href=\"player.php?playerid=",$winnerus3,"\">",$imenus3," ",$primkus3,"</a></td><td>",stripslashes($awardus3),"</td><td>";
if (($tekmovanj-$gur) <>13 && ($tekmovanj-$gur) <>16 && ($tekmovanj-$gur) <>28 && ($tekmovanj-$gur) <>38 && ($tekmovanj-$gur) <>45 && ($tekmovanj-$gur) <>49 && ($tekmovanj-$gur) <>60 && ($tekmovanj-$gur) <>66 && ($tekmovanj-$gur) <>67 && ($tekmovanj-$gur) <>81 && ($tekmovanj-$gur) <>90 && ($tekmovanj-$gur) <>100 && ($tekmovanj-$gur) <>106 && ($tekmovanj-$gur) <>109 && ($tekmovanj-$gur) <>111 && ($tekmovanj-$gur) <>131 && ($tekmovanj-$gur) <>133 && ($tekmovanj-$gur) <>142 && ($tekmovanj-$gur) <>145 && ($tekmovanj-$gur) <>156 && ($tekmovanj-$gur) <>157 && ($tekmovanj-$gur) <>159 && ($tekmovanj-$gur) <>162 && ($tekmovanj-$gur) <>163 && ($tekmovanj-$gur) <>164 && ($tekmovanj-$gur) <>165 && ($tekmovanj-$gur) <>172 && ($tekmovanj-$gur) <>179) {echo $scorus," ",$langmark174;}
echo "</td><td><td><a href=\"club.php?clubid=",$sponsorus,"\">",$koristnik,"</a></td></tr>";
}
if ($winnerus4 > 0) {
$imein4 = mysql_query("SELECT `name`, `surname` FROM `players` WHERE `id` ='$winnerus4'") or die(mysql_error());
$imenus4 = mysql_result($imein4,0,"name");
$primkus4 = mysql_result($imein4,0,"surname");
echo "<tr bgcolor=\"$jabla\"><td align=\"right\"><b>",($tekmovanj-$gur),"</b></td><td>&nbsp;</td><td><a href=\"player.php?playerid=",$winnerus4,"\">",$imenus4," ",$primkus4,"</a></td><td>",stripslashes($awardus4),"</td><td>";
if (($tekmovanj-$gur) <>16 && ($tekmovanj-$gur) <>28 && ($tekmovanj-$gur) <>49 && ($tekmovanj-$gur) <>60 && ($tekmovanj-$gur) <>64 && ($tekmovanj-$gur) <>65 && ($tekmovanj-$gur) <>92 && ($tekmovanj-$gur) <>100 && ($tekmovanj-$gur) <>112 && ($tekmovanj-$gur) <>113 && ($tekmovanj-$gur) <>115 && ($tekmovanj-$gur) <>117 && ($tekmovanj-$gur) <>137 && ($tekmovanj-$gur) <>142 && ($tekmovanj-$gur) <>145 && ($tekmovanj-$gur) <>156 && ($tekmovanj-$gur) <>157 && ($tekmovanj-$gur) <>159 && ($tekmovanj-$gur) <>161 && ($tekmovanj-$gur) <>162 && ($tekmovanj-$gur) <>172 && ($tekmovanj-$gur) <>176 && ($tekmovanj-$gur) <>177) {echo $scorus," ",$langmark174;}
echo "</td><td><td><a href=\"club.php?clubid=",$sponsorus,"\">",$koristnik,"</a></td></tr>";
}
$gur++;
}
?>
</table>
<br/><a href="javascript: history.go(-1)"><?=$langmark409?></a>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>
<?php
die();
}
//KONEC PRIKAZA ZGODOVINE

//podatki o tekmovanju
$sponzorstvo = mysql_query("SELECT * FROM threepoints ORDER BY id DESC LIMIT 2") or die(mysql_error());
$sponsor = mysql_result($sponzorstvo,0,"sponsor");
$supportership = mysql_result($sponzorstvo,0,"supportership");
$winner1 = mysql_result($sponzorstvo,0,"winner1");
$winner2 = mysql_result($sponzorstvo,0,"winner2");
$winner3 = mysql_result($sponzorstvo,0,"winner3");
$winner4 = mysql_result($sponzorstvo,0,"winner4");
$award1 = mysql_result($sponzorstvo,0,"award1");
$award2 = mysql_result($sponzorstvo,0,"award2");
$award3 = mysql_result($sponzorstvo,0,"award3");
$award4 = mysql_result($sponzorstvo,0,"award4");
$time = mysql_result($sponzorstvo,0,"time");
$status = mysql_result($sponzorstvo,0,"status");
$podatki = mysql_query("SELECT `name`, `logo`, `username` FROM `teams`, `users` WHERE teamid=club AND userid ='$sponsor' LIMIT 1") or die(mysql_error());
$ekipa = mysql_result($podatki,0,'name');
$logo = mysql_result($podatki,0,'logo');
$nick = mysql_result($podatki,0,'username');

//igralci od uporabnika
$seznam = mysql_query("SELECT id, name, surname FROM players WHERE coach=0 AND 3points=0 AND injury < 1 AND club ='$trueclub' ORDER BY shooting DESC") or die(mysql_error());

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2><?=$langmark943?></h2>
<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="55%">

<img src="img/3ptsbaner231.gif" width="230" alt="<?=$langmark1217?>" title="<?=$langmark1217?>"><hr/>

<?php if($status==0){echo $langmark944,"<br/><br/>";
if ($winner2>0) {echo "<b>",$langmark945,"</b>";} else {echo "<b>",$langmark946,"</b>";}
echo "<br/>";
$zmag1 = mysql_query("SELECT name, surname FROM players WHERE id =$winner1");
$ime_zmag1 = mysql_result($zmag1,0,"name");
$priimek_zmag1 = mysql_result($zmag1,0,"surname");
echo "<a href=\"player.php?playerid=",$winner1,"\">",$ime_zmag1," ",$priimek_zmag1,"</a> (",stripslashes($award1),")<br/>";
if ($winner2>0) {
$zmag2 = mysql_query("SELECT name, surname FROM players WHERE id =$winner2");
$ime_zmag2 = mysql_result($zmag2,0,"name");
$priimek_zmag2 = mysql_result($zmag2,0,"surname");
echo "<a href=\"player.php?playerid=",$winner2,"\">",$ime_zmag2," ",$priimek_zmag2,"</a> (",stripslashes($award2),")<br/>";
}
if ($winner3>0) {
$zmag3 = mysql_query("SELECT name, surname FROM players WHERE id =$winner3");
$ime_zmag3 = mysql_result($zmag3,0,"name");
$priimek_zmag3 = mysql_result($zmag3,0,"surname");
echo "<a href=\"player.php?playerid=",$winner3,"\">",$ime_zmag3," ",$priimek_zmag3,"</a> (",stripslashes($award3),")<br/>";
}
if ($winner4>0) {
$zmag4 = mysql_query("SELECT name, surname FROM players WHERE id =$winner4");
$ime_zmag4 = mysql_result($zmag4,0,"name");
$priimek_zmag4 = mysql_result($zmag4,0,"surname");
echo "<a href=\"player.php?playerid=",$winner4,"\">",$ime_zmag4," ",$priimek_zmag4,"</a> (",stripslashes($award4),")<br/>";
}
//konec prikaza zmagovalcev
}
elseif ($threepts==0)
{
?>
<form name="contest" method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="margin: 0">
<b><?=$langmark947?></b><br/>
<?php
echo "<select name=\"throws\" size=\"1\" class=\"inputreg\">";
for($u=0; $u<mysql_num_rows($seznam); $u++){ $id=mysql_result($seznam,$u,'id');
$name=mysql_result($seznam,$u,'name');
$surname=mysql_result($seznam,$u,'surname');
?>
<option value="<?=$id?>"><?=$name," ",$surname?></option>
<?php
}
?>
</select>
<input type="submit" name="submit" value="<?=$langmark949?>" class="buttonreg">
</form>
<i><?=$langmark948?></i><br/>
<font color="darkred"><?=$langmark1441?></font><br/>
<hr/>
<?php
//order view before submition
$vsiskupaj = mysql_query("SELECT player, total FROM tp_contest WHERE attempt=25 ORDER BY total DESC") or die(mysql_error());
if (mysql_num_rows($vsiskupaj) > 0){
echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"1\">";
$f=0;
while($f < mysql_num_rows($vsiskupaj)){
$igralechud = mysql_result($vsiskupaj,$f,"player");
$totalhud = mysql_result($vsiskupaj,$f,"total");
$podatek9 = mysql_query("SELECT name, surname, club FROM players WHERE id =$igralechud");
$name9 = mysql_result($podatek9,0,"name");
$name9 = substr($name9,0,1);
if (!$name9 OR strlen(trim($name9))==0) {$name9='';} elseif ($name9=='&') {$name9='';} else {$name9=$name9.".&nbsp;";}
$surname9 = mysql_result($podatek9,0,"surname");
$club9 = mysql_result($podatek9,0,"club");
if ($club9 <>0) {$plusklub = mysql_query("SELECT name FROM teams WHERE teamid =$club9"); $imekluba = mysql_result($plusklub,0);}
if ($club9 ==0) {$imekluba = $langmark951;}
$coloric = 'white';
if ($f < 25 OR $club9==$trueclub) {echo "<tr bgcolor=\"",$coloric,"\"><td align=\"right\">",($f+1),".</td><td align=\"left\">&nbsp;<a href=\"player.php?playerid=",$igralechud,"\" class=\"greenhilite\">",$name9,"",$surname9,"</a></td><td align=\"center\"><a href=\"redirect.php?teamid=",$club9,"\" class=\"greenhilite\">",stripslashes($imekluba),"</a></td><td align=\"center\">",$totalhud,"</td>";}
$f++;
}
echo "</table>";
}
//konec prikaza vrstnega reda
}
elseif ($threepts==1)
{
$igrac = mysql_query("SELECT player FROM tp_contest WHERE team ='$trueclub' LIMIT 1");
$igrac = mysql_result($igrac,0);
$podatek = mysql_query("SELECT name, surname FROM players WHERE id =$igrac LIMIT 1");
$name1 = mysql_result($podatek,0,"name");
$surname1 = mysql_result($podatek,0,"surname");
echo "<b>",$name1," ",$surname1,"</b> ",$langmark952,"<br/>";
}
else
{
//order view after submition, including expanded view
$koliko=$_GET['show'];
/*
SELECT player, total, players.name AS name, surname, club FROM tp_contest, players, teams WHERE teams.country='Montenegro' AND player = players.id AND players.club = teamid AND attempt =25 ORDER BY total DESC
SELECT player, total, name, surname, club FROM tp_contest, players WHERE player = players.id AND `mustage`='kumis5' AND attempt =25 ORDER BY total DESC
SELECT player, total, players.name AS name, surname, club FROM tp_contest, players, teams WHERE teams.country='Indonesia' AND player = players.id AND players.club = teamid AND attempt =25 ORDER BY total DESC
SELECT player, total, name, surname, club FROM tp_contest, players WHERE age < 20 AND player = players.id AND attempt =25 ORDER BY total DESC
SELECT player, total, players.name AS name, surname, club FROM tp_contest, players, teams WHERE teams.country='Tunisia' AND player = players.id AND players.club = teamid AND attempt =25 ORDER BY total DESC
SELECT player, total, name, surname, club FROM tp_contest, players WHERE country='Ireland' AND player = players.id AND age < 20 AND attempt =25 ORDER BY total DESC
SELECT player, total, name, surname, club FROM tp_contest, players WHERE country='India' AND player = players.id AND attempt =25 ORDER BY total DESC
SELECT player, total, players.name AS name, surname, club FROM tp_contest, players, teams WHERE teams.country='Malaysia' AND player = players.id AND players.club = teamid AND attempt =25 ORDER BY total DESC
SELECT player, total, name, surname, club FROM tp_contest, players WHERE player = players.id AND `eyes`='kacamata' AND attempt =25 ORDER BY total DESC
SELECT player, total, name, surname, club FROM competition, players, tp_contest where season=16 and ((competition.leagueid > 1050 AND competition.leagueid < 1078) OR (competition.leagueid > 1781 AND competition.leagueid < 1863)) and club=teamid AND player=players.id AND attempt =25 ORDER BY total DESC
*/
if ($koliko=='special') {$vsiskupaj = mysql_query("SELECT player, total, name, surname, club FROM tp_contest, players WHERE player = players.id AND charac > 40 AND attempt =25 ORDER BY total ASC") or die(mysql_error());}
elseif ($koliko=='special1') {$vsiskupaj = mysql_query("SELECT player, total, name, surname, club FROM tp_contest, players WHERE height < 170 AND player = players.id AND attempt =25 ORDER BY total DESC") or die(mysql_error());}
elseif ($koliko=='special2') {$vsiskupaj = mysql_query("SELECT player, total, name, surname, club FROM tp_contest, players WHERE country='Ireland' AND player = players.id AND age < 21 AND attempt =25 ORDER BY total DESC") or die(mysql_error());}
else {$vsiskupaj = mysql_query("SELECT player, total, name, surname, club FROM tp_contest, players WHERE player = players.id AND attempt =25 ORDER BY total DESC") or die(mysql_error());}
if (mysql_num_rows($vsiskupaj)){?>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
<tr><td align="center"><b><span title="Place">#</span></b></td><td align="left"><b>Player</b></td><td align="center"><b>Club</b></td><td align="center"><b><span title="Score">S</span></b></td></tr>
<?php
$f=1; $lac=1;
while ($fplus=mysql_fetch_array($vsiskupaj)) {
$igralechud = $fplus['player'];
$bjaga=$totalhud;
$totalhud = $fplus['total'];
if ($f==1) {$totalhud11=$totalhud;}
$name9 = $fplus['name'];
$surname9 = $fplus['surname'];
$club9 = $fplus['club'];
if ($club9<>0) {$plusklub = mysql_query("SELECT name FROM teams WHERE teamid=$club9 LIMIT 1"); $imekluba = mysql_result($plusklub,0);} elseif ($club9==0) {$imekluba = $langmark951;}
$name9 = substr($name9,0,1); if (!$name9 OR strlen(trim($name9))==0) {$name9='';} elseif ($name9=='&') {$name9='';} else {$name9=$name9.".&nbsp;";}
if ($bjaga<>$totalhud) {$numa=$f."."; $lac++;} else {$numa='';}
if ($club9==$trueclub) {$coloric = 'lightblue';} elseif ($lac % 2) {$coloric = '#FFCC66';} else {$coloric = '#E9967A';}
if ($f < 26 OR $club9==$trueclub) {
echo "<tr bgcolor=\"",$coloric,"\"><td align=\"center\">",$numa,"</td><td align=\"left\"><a href=\"player.php?playerid=",$igralechud,"\" class=\"greenhilite\">",$name9,"",$surname9,"</a></td><td align=\"center\"><a href=\"redirect.php?teamid=",$club9,"\" class=\"greenhilite\">",stripslashes($imekluba),"</a></td><td align=\"center\">",$totalhud,"</td>";}
elseif ($koliko=='all') {echo "<tr bgcolor=\"",$coloric,"\"><td align=\"center\">",$numa,"</td><td align=\"left\"><a href=\"player.php?playerid=",$igralechud,"\" class=\"greenhilite\">",$name9,"",$surname9,"</a></td><td align=\"center\"><a href=\"redirect.php?teamid=",$club9,"\" class=\"greenhilite\">",stripslashes($imekluba),"</a></td><td align=\"center\">",$totalhud,"</td>";}
$f++;
}
echo "</table>";

if ($koliko=='all'){echo "<br/>[<a href=\"threepointers.php\" title=\"",$langmark132,"\" class=\"greenhilite\">-</a>]";}
elseif ($koliko=='special'){echo "<br/>[<a href=\"threepointers.php\" title=\"",$langmark132,"\" class=\"greenhilite\"><<</a>]";}
else {
echo "<br/>[<a href=\"threepointers.php?show=all\" title=\"",$langmark953,"\" class=\"greenhilite\">+</a>]";
//echo " [<a href=\"threepointers.php?show=special\" class=\"greenhilite\">lazy</a>]"; //TO KASNEJE ZAKOMENTIRAM
//echo " [<a href=\"threepointers.php?show=special1\" class=\"greenhilite\"><170cm</a>]"; //TO KASNEJE ZAKOMENTIRAM
//echo " [<a href=\"threepointers.php?show=special2\" class=\"greenhilite\">Irish U19</a>]"; //TO KASNEJE ZAKOMENTIRAM
}

}
else {echo $langmark955;}
}

//PRIKAZ
$met=0;
$met = $_GET['met'];
if ($threepts==1 AND $met < 1) {
?>
<img src="img/trojke/threeptcont1.gif" border="0" width="340" alt="">
<a href="threepointers.php?met=1"><?=$langmark957?></a>.
<?php
}
if ($threepts==1 AND $met > 0 AND $met < 26) {
$uspeh = mysql_query("SELECT score, total FROM tp_contest WHERE attempt =$met AND team ='$trueclub' LIMIT 1");
$score_ = mysql_result($uspeh,0,"score");
$total_ = mysql_result($uspeh,0,"total");
$dodbon = ceil(($met+1)/5);
$slikazdaj = $met+1;
if ($score_==0) {echo "<br/><font color=\"red\"><h3><b>",$langmark958,"</b></h3></font>";}
elseif ($score_==1) {echo "<br/><font color=\"green\"><h3><b>",$langmark959,"</b></h3></font>";}
else {echo "<br/><font color=\"green\"><h3><b>",$langmark959," THE MONEY BALL!</b></h3></font>";}
?>
<img src="img/trojke/threeptcont<?=$slikazdaj?>.gif" border="0" width="340" alt="">
<b><?=$langmark960?> <?=$total_?></b><br/>
<b>MAX POSSIBLE: <?=abs($met+$dodbon-1-$total_-30)?></b><br/>
<?php
if ($met==25) {
mysql_query("UPDATE users SET 3pts=2 WHERE userid=$userid LIMIT 1") or die(mysql_error());
echo "<a href=\"threepointers.php\">",$langmark961,"</a>.";} else {
?>
<a href="threepointers.php?met=<?=$slikazdaj?>"><?=$langmark962?></a>
<?php
}
}
?>
</td>
<td class="border" width="45%">
<?=$langmark963?><br/>
<br/><h2><?=$langmark964?></h2><br/>
<table width="100%"><tr><td width="50%"><img src="<?=$logo?>" alt="<?=$langmark941?>" title="<?=$langmark503?>" border="0" width="80"></td>
<td width="50%"><b><i><?php if ($status==0) {echo $langmark965;} else {echo $langmark966;}?></i>:</b><br/><b><?=$nick?></b>, <?=$langmark967?> <a href="club.php?clubid=<?=$sponsor?>"><?=stripslashes($ekipa)?></a>.<br/><br/><b><i><?php if ($status==0) {echo $langmark968;} else {echo $langmark969;}?></i>:</b><br/><?=$supportership," ",$langmark970?></tr></table>
<hr/><?=$langmark971?> <a href="club.php?clubid=1"><?=$langmark972?></a>.
<br/><br/><h2><?=$langmark973?></h2>
<?php
$splitdate2 = explode(" ", $time);
$splitdate1 = $splitdate2[0]; $splitdate4 = $splitdate2[1];
$splitdate = explode("-", $splitdate1); $splitdate3 = explode(":", $splitdate4);
$dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$dbhour = $splitdate3[0]; $dbminute = $splitdate3[1]; $dbsecond = $splitdate3[2];

$time=mktime($dbhour, $dbminute, $dbsecond, $dbmonth, $dbday, $dbyear);

$timecurrent=date('U');
$cuntdowntime=$time-$timecurrent;
$cuntdownhours=$cuntdowntime/3600;
$cuntdowndays=$cuntdownhours/24;
if ($cuntdownhours < 0) {$cuntdownhours=0;}

if ($cuntdowndays > 1 AND $status==1) {echo "<br/><b><u>",$langmark974,"</u></b><br/>",$langmark975," ",round($cuntdowndays)," ",$langmark905," (",round($cuntdownhours)," hours)<br/>";}
elseif ($status==0) {echo "<br/><b><u>",$langmark974,"</u></b><br/>",$langmark976,"<br/>";}
else {echo "<br/><b><u>",$langmark974,"</u></b><br/>",$langmark975," ",round($cuntdownhours)," hour(s)<br/>";}
?>

<br/><b><u><?=$langmark978?></u></b><br/>
- <?=$langmark126?> [<?=$langmark979?>]<br/>
- <?=$langmark130?> [<?=$langmark980?>]<br/>
- <?=$langmark116?>, <?=$langmark120?>, <?=$langmark984?>, <?=$langmark117?><br/>
<br/><b><u><?=$langmark981?></u></b><br/>
If there are several winners, award is split. In case of too many winners, only some players receive cups, but all teams share supportership.<br/>

<br/><h2><?=$langmark983?></h2><br/>
<table width="100%" cellspacing="0" cellpadding="1" border="0">
<tr>
<td><a href="threepointers.php?super=winners"><img src="img/3pokal.gif" alt="<?=$langmark983?>" title="<?=$langmark983?>" border="0"></a></td>
<td>
<?php
$winner11 = mysql_result($sponzorstvo,1,"winner1");
$winner22 = mysql_result($sponzorstvo,1,"winner2");
$winner33 = mysql_result($sponzorstvo,1,"winner3");
$winner44 = mysql_result($sponzorstvo,1,"winner4");
$award11 = mysql_result($sponzorstvo,1,"award1");
$award22 = mysql_result($sponzorstvo,1,"award2");
$award33 = mysql_result($sponzorstvo,1,"award3");
$award44 = mysql_result($sponzorstvo,1,"award4");
$score55 = mysql_result($sponzorstvo,1,"score");
$zmag11 = mysql_query("SELECT name, surname FROM players WHERE id =$winner11");
$ime_zmag11 = mysql_result($zmag11,0,"name");
$priimek_zmag11 = mysql_result($zmag11,0,"surname");
echo "<a href=\"player.php?playerid=",$winner11,"\">",$ime_zmag11," ",$priimek_zmag11,"</a> (",stripslashes($award11),") - <b>",$score55," ",$langmark174,"</b><br/>";
if ($winner22>0) {
$zmag22 = mysql_query("SELECT name, surname FROM players WHERE id =$winner22");
$ime_zmag22 = mysql_result($zmag22,0,"name");
$priimek_zmag22 = mysql_result($zmag22,0,"surname");
echo "<a href=\"player.php?playerid=",$winner22,"\">",$ime_zmag22," ",$priimek_zmag22,"</a> (",stripslashes($award22),")<br/>";
}
if ($winner33>0) {
$zmag33 = mysql_query("SELECT name, surname FROM players WHERE id =$winner33");
$ime_zmag33 = mysql_result($zmag33,0,"name");
$priimek_zmag33 = mysql_result($zmag33,0,"surname");
echo "<a href=\"player.php?playerid=",$winner33,"\">",$ime_zmag33," ",$priimek_zmag33,"</a> (",stripslashes($award33),")<br/>";
}
if ($winner44>0) {
$zmag44 = mysql_query("SELECT name, surname FROM players WHERE id =$winner44");
$ime_zmag44 = mysql_result($zmag44,0,"name");
$priimek_zmag44 = mysql_result($zmag44,0,"surname");
echo "<a href=\"player.php?playerid=",$winner44,"\">",$ime_zmag44," ",$priimek_zmag44,"</a> (",stripslashes($award44),")<br/>";
}
?>
</td>
</tr>
</table>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>