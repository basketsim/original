<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}
$comparep = mysql_query("SELECT username, club, lang, supporter, curmoney FROM users, teams WHERE club=teamid AND password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($comparep)){
$username = mysql_result($comparep,0,"username");
$get_team = mysql_result($comparep,0,"club");
$lang = mysql_result ($comparep,0,"lang");
$supporter = mysql_result ($comparep,0,"supporter");
$imadenar = mysql_result ($comparep,0,"curmoney");
}
else {die(include 'basketsim.php');}
//if ($supporter==0) {$supporter=1; $razlaga='on';}

if (isset($_POST['submitD'])) {
$kljukica = $_POST['checkbox1'];
if ($kljukica=='YES') {

/*
$hhh = number_format($zzz, 0, '.', '.');
mysql_query("INSERT INTO events VALUES ('', $get_team, NOW(), '$hhh &euro; was paid when one of your players was sent to the coaching school.', 1, -$zzz);") or die(mysql_error());
denar stran

potek šolanja
- prikaz igralca
- nezmožnost šolanja novega
- nezmožnost dati tega igralca na trg

konec šolanja
- nova plača
- klub dobi event
- igralec dobi nove izkušnje
- igralec dobi nov workrate
- star trener se upokoji oz je odpuščen
- določi se mu motivacija

dodatno
- stalno višanje xp kovčem
- pravila, news, preizkus in aktivacija (dodam link na trening.php)
*/

header( 'Location: training.php' );}
}

if (isset($_POST['submit'])) {
$inte = $_POST["inte"]; if (is_numeric($inte) AND $inte >= 0 AND $inte <= 3) {mysql_query("UPDATE teams SET intensity=$inte WHERE teamid=$get_team LIMIT 1");}
$inte2 = $_POST["inte2"]; if (is_numeric($inte2) AND $inte2 >= 0 AND $inte2 <= 3) {mysql_query("UPDATE teams SET intensity2=$inte2 WHERE teamid=$get_team LIMIT 1");}
$guar = $_POST["guar"]; if (is_numeric($guar) AND $guar >= 0 AND $guar <= 9) {mysql_query("UPDATE teams SET guards_t=$guar WHERE teamid=$get_team LIMIT 1");}
$bigm = $_POST["bigm"]; if (is_numeric($bigm) AND $bigm >= 0 AND $bigm <= 9) {mysql_query("UPDATE teams SET bigmen_t=$bigm WHERE teamid=$get_team LIMIT 1");}
}

$result1 = mysql_query("SELECT * FROM players WHERE coach =1 AND club ='$get_team' LIMIT 1") or die(mysql_error());
$mum=mysql_num_rows($result1);

require("inc/lang/".$lang.".php");
include('inc/header.php');
include('inc/osnova.php');
?>

<div id="main">
<h2><?=$langmark999?></h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="63%">

<?php
$report = $_GET['report'];
if ($report =='growth' || isset($_POST['submit19'])) {
$binf = $_POST["team_id"];
if (!$binf) {$binf=$get_team;}
?>
<i><?=$langmark1276?></i>
<form method="post" action="training.php" style="margin: 0">
<br/><?=$langmark637?>: <input type="text" name="team_id" size="7" maxlength="6" class="inputreg" value="<?=$binf?>"><input type="submit" value="<?=$langmark636?>" name="submit19" class="buttonreg">
</form>
<?php
if (isset($_POST['submit19']) AND $supporter==1) {
$djan=55;
$team_id = $_POST["team_id"];
if (!is_numeric($team_id)){die("<br/><i>$langmark652</i></td></tr></table>");}
$team_id_r = mysql_query("SELECT name FROM teams WHERE teamid ='$team_id' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($team_id_r) <>1){die("<br/><i>$langmark653</i></td></tr></table>");}
$imen = mysql_result($team_id_r,0);
echo "<br/><b>",$langmark1277," ",stripslashes($imen),"</b>:<hr/>";
$piuka = mysql_query("SELECT * FROM `events` WHERE `team` ='$team_id' AND `description` LIKE '%grown%' ORDER BY eventid DESC");
$f=0;
while ($f<mysql_num_rows($piuka)) {
$a=mysql_result($piuka, $f, "when");
$tdatetime = explode(" ",$a); $ffdate = $tdatetime[0]; $fftime = $tdatetime[1];
$tdate = explode("-", $ffdate); $ffyear = $tdate[0]; $ffmonth = $tdate[1]; $ffday = $tdate[2];
$ttime = explode(":", $fftime); $ffhour = $ttime[0]; $ffmin = $ttime[1]; $ffsec = $ttime[2];
$a = date("d.m.y", mktime($ffhour,$ffmin,$ffsec,$ffmonth,$ffday,$ffyear));
$b=mysql_result($piuka, $f, "description");
$b = str_replace("has grown for ", "+", $b);
$b = str_replace("has grown ", "+", $b);
$b = str_replace(". He also gained ", ", +", $b);
$b = str_replace(". He has also gained ", ", +", $b);
echo $a,"&nbsp;",$b,"<br/>";
$f++;
}
if ($f==0) {echo $langmark1278;}
}

} elseif ($report =='report' AND $supporter ==1) {
//prikaz treninga za supporterje
//if ($razlaga=='on') {echo "Training report is a <a href=\"supporter.php\">supporter feature</a>, but it's available to all clubs this week! Thank you for coming back after the downtime to play Basketsim again!<hr/>";}
echo "<i>",$langmark1279," ",$username,",<br/>",$langmark1280,"</i><br/><br/>";

$prikaz = mysql_query("SELECT id, name, surname, last_position, handling, speed, passing, vision, rebounds, position, shooting, freethrow, defense, last_training FROM players WHERE club ='$get_team'") or die(mysql_error());
while ($pri = mysql_fetch_array($prikaz)) {
$plid = $pri[id];
$name = $pri[name];
$surname = $pri[surname];
$last_position = $pri[last_position];
SWITCH ($last_position) {
CASE 1: $trening = $pri[handling]; $toj = 'handling'; break;
CASE 2: $trening = $pri[speed]; $toj = 'quickness'; break;
CASE 3: $trening = $pri[passing]; $toj = 'passing'; break;
CASE 4: $trening = $pri[vision]; $toj = 'dribbling'; break;
CASE 5: $trening = $pri[rebounds]; $toj = 'rebounds'; break;
CASE 6: $trening = $pri[position]; $toj = 'positioning'; break;
CASE 7: $trening = $pri[shooting]; $toj = 'shooting'; break;
CASE 8: $trening = $pri[freethrow]; $toj = 'free throws'; break;
CASE 9: $trening = $pri[defense]; $toj = 'defense'; break;
}
$last_training = $pri[last_training];

SWITCH (TRUE) {
CASE ($trening >= 1 AND $trening < 9): $down=1; $up=9; break;
CASE ($trening >= 9 AND $trening < 17): $down=9; $up=17; break;
CASE ($trening >= 17 AND $trening < 25): $down=17; $up=25; break;
CASE ($trening >= 25 AND $trening < 33): $down=25; $up=33; break;
CASE ($trening >= 33 AND $trening < 41): $down=33; $up=41; break;
CASE ($trening >= 41 AND $trening < 49): $down=41; $up=49; break;
CASE ($trening >= 49 AND $trening < 57): $down=49; $up=57; break;
CASE ($trening >= 57 AND $trening < 65): $down=57; $up=65; break;
CASE ($trening >= 65 AND $trening < 73): $down=65; $up=73; break;
CASE ($trening >= 73 AND $trening < 81): $down=73; $up=81; break;
CASE ($trening >= 81 AND $trening < 89): $down=81; $up=89; break;
CASE ($trening >= 89 AND $trening < 97): $down=89; $up=97; break;
CASE ($trening >= 97 AND $trening < 105): $down=97; $up=105; break;
CASE ($trening >= 105 AND $trening < 113): $down=105; $up=113; break;
CASE ($trening >= 113 AND $trening < 121): $down=113; $up=121; break;
CASE ($trening >= 121 AND $trening < 129): $down=121; $up=129; break;
CASE ($trening >= 129 AND $trening < 137): $down=129; $up=137; break;
CASE ($trening >= 137 AND $trening < 145): $down=137; $up=145; break;
CASE ($trening >= 145 AND $trening < 153): $down=145; $up=153; break;
CASE ($trening >= 153 AND $trening < 161): $down=153; $up=161; break;
CASE ($trening >= 161): $down=161; $up=999; break;
}
$odtrenirano = ($trening - $last_training - $down)*20;

if (strlen($toj)>1 && $last_training>0 && $last_position>0) {echo "<a href=\"player.php?playerid=",$plid,"\" class=\"greenhilite\">",$name," ",$surname,"</a> | ",$toj;?>

<div style="height:7px; width:160px;background-color:#ffffff;position:relative; overflow:hidden; border: 1px solid #000000;">
<div style="position:absolute;top:0px;left:0px;background-color:rgb(51,168,45); width:<?=$odtrenirano?>px;height:7px"></div>
<div style="position:absolute;top:0px;left:<?=$odtrenirano?>px;background-color:rgb(255,10,0); width:<?=($last_training*20)?>px;height:7px;border-right: 1px solid #000000;"></div></div>

<?php
}
}
$name1=mysql_result($result1,$i,"name");
$surname1=mysql_result($result1,$i,"surname");

echo "<br/><i>",$langmark1281,",</i><br/>",$name1," ",$surname1,", ",$langmark1282;

}
elseif ($report=='school') {
if (isset($_POST['submit200'])) {
$labla=400;
$lid = $_POST['lid'];
$prog = $_POST['prog'];
}
$results=mysql_query("SELECT `id`, `name`, `surname` FROM `players` WHERE coach=0 AND `club` ='$get_team'") or die(mysql_error());
?>
<h2>Coaching school</h2><br/>
<i>Check if players are suitable to be sent to the coaching school.</i><br/>
<form method="post" action="training.php?report=school" style="margin: 0">
<select class="inputreg" name="lid">
<?php
for($u=0; $u<mysql_num_rows($results); $u++){
$id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');?>
<option value="<?=$id?>" <?php if ($lid==$id){echo "selected";}?>><?=$name," ",$surname?></option><?php }?></select>
<select class="inputreg" name="prog">
<option value="1" <?php if ($prog==1){echo "selected";}?>>amateur level (4 weeks)</option>
<option value="2" <?php if ($prog==2){echo "selected";}?>>basic level (8 weeks)</option>
<option value="3" <?php if ($prog==3){echo "selected";}?>>advanced level (12 weeks)</option>
<option value="4" <?php if ($prog==4){echo "selected";}?>>pro level (16 weeks)</option>
<option value="5" <?php if ($prog==5){echo "selected";}?>>master level (20 weeks)</option>
</select>
<input type="submit" value=">>" name="submit200" class="buttonreg">
<?php
if ($labla==400) {
$baba = mysql_query("SELECT id,  experience FROM players WHERE age > 29 AND ntplayer=0 AND isonsale=0 AND coach=0 AND club=$get_team AND id=$lid") or die(mysql_error());
if (mysql_num_rows($baba) >0) {
$ksp = mysql_result($baba,0,"experience");
echo "<br/><br/><font color=\"green\"><b>This player can be send to the coaching school.</b></font>";?>
<br/><br/><b>IMPORTANT</b><br/>- It's not possible to school same player twice!<br/>
- Player will become your coach after he completes the course!<br/>
- Time spent in club will affect his future motivation.<br/>
- You won't be able to sell him and his wage will change.<br/>
<br/><b><span title="Expected experiences once that player becomes a coach">Expected XP</spam>:</b>&nbsp;
<?php
$ksp = round($ksp*0.4734);
if ($ksp < 9) {$ksp_dspl = $langmark111."(0)"; }
elseif ($ksp > 8 AND $ksp < 17) {$ksp_dspl = $langmark096."(1)"; }
elseif ($ksp > 16 AND $ksp < 25) {$ksp_dspl = $langmark097."(2)"; }
elseif ($ksp > 24 AND $ksp < 33) {$ksp_dspl = $langmark098."(3)"; }
elseif ($ksp > 32 AND $ksp < 41) {$ksp_dspl = $langmark099."(4)"; }
elseif ($ksp > 40 AND $ksp < 49) {$ksp_dspl = $langmark100."(5)"; }
elseif ($ksp > 48 AND $ksp < 57) {$ksp_dspl = $langmark101."(6)"; }
elseif ($ksp > 56 AND $ksp < 65) {$ksp_dspl = $langmark102."(7)"; }
elseif ($ksp > 64 AND $ksp < 73) {$ksp_dspl = $langmark103."(8)"; }
elseif ($ksp > 72 AND $ksp < 81) {$ksp_dspl = $langmark104."(9)"; }
elseif ($ksp > 80 AND $ksp < 89) {$ksp_dspl = $langmark105."(10)"; }
elseif ($ksp > 88 AND $ksp < 97) {$ksp_dspl = $langmark106."(11)"; }
elseif ($ksp > 96 AND $ksp < 105) {$ksp_dspl = $langmark107."(12)"; }
elseif ($ksp > 104 AND $ksp < 113) {$ksp_dspl = $langmark108."(13)"; }
elseif ($ksp > 112 AND $ksp < 121) {$ksp_dspl = $langmark109."(14)"; }
else $ksp_dspl = $langmark110."(15)";
echo $ksp_dspl;
?>
<br/><b><span title="Expected workrate once that player becomes a coach">Expected WR</spam>:</b>
<?php
SWITCH ($prog) {
CASE 1: echo "pathetic (1), terrible (2) or poor (3)"; break;
CASE 2: echo "below average (4), average (5) or above average (6)"; break;
CASE 3: echo "good (7), very good (8) or great (9)"; break;
CASE 4: echo "extremely great (10), fantastic (11) or amazing (12)"; break;
CASE 5: echo "extra-ordinary (13), magical (14) or perfect (15)"; break;
}?>
<br/><b>Course price:</b>&nbsp;
<?php
SWITCH ($prog) {
CASE 1: echo "250.000 &euro;"; $pdnar=$imadenar-200000; break;
CASE 2: echo "500.000 &euro;"; $pdnar=$imadenar-400000; break;
CASE 3: echo "1.000.000 &euro;"; $pdnar=$imadenar-800000; break;
CASE 4: echo "2.500.000 &euro;"; $pdnar=$imadenar-2000000; break;
CASE 5: echo "5.000.000 &euro;"; $pdnar=$imadenar-4000000; break;
}
?>

<br/><input type='checkbox' name='checkbox1' value='YES'>&nbsp;
<input type="submit" name="submitD" value="Send player to the coaching school now!" class="buttonreg" <?php if($pdnar<0) {echo "disabled=\"disabled\"";}?>>
<?php
if ($pdnar < 0) {echo "<br/><font color=\"darkred\"<b>Your don't have enough current money for this transaction.</b></font>";}
} else {echo "<br/><br/><font color=\"darkred\">This player can't become a coach yet. Player must be at least 30 years old, not market-listed and not a member of the national team.</font>";}
}
echo "</form>";

}
else {
//ce report rasti ni vklopljen potem normalno

$result33 = mysql_query("SELECT intensity, intensity2, guards_t, bigmen_t FROM teams WHERE teamid ='$get_team' LIMIT 1") or die(mysql_error());
while($s=mysql_fetch_array($result33)) {
$intensity=$s["intensity"];
$intensity2=$s["intensity2"];
$guards_t=$s["guards_t"];
$bigmen_t=$s["bigmen_t"];
}
if ($intensity==0) {$intens_dspl = $langmark1011; }
elseif ($intensity==1) {$intens_dspl = $langmark1012; }
elseif ($intensity==2) {$intens_dspl = $langmark1013; }
else {$intens_dspl = "immense (40h/week)";}

if ($intensity2==0) {$intens_dspl2 = $langmark1011; }
elseif ($intensity2==1) {$intens_dspl2 = $langmark1012; }
elseif ($intensity2==2) {$intens_dspl2 = $langmark1013; }
else {$intens_dspl2 = "immense (40h/week)";}

SWITCH ($guards_t) {
CASE 0: $guards_dspl = $langmark1017; break;
CASE 1: $guards_dspl = $langmark120; break;
CASE 2: $guards_dspl = $langmark121; break;
CASE 3: $guards_dspl = $langmark122; break;
CASE 4: $guards_dspl = $langmark123; break;
CASE 5: $guards_dspl = $langmark124; break;
CASE 6: $guards_dspl = $langmark125; break;
CASE 7: $guards_dspl = $langmark126; break;
CASE 8: $guards_dspl = $langmark127; break;
CASE 9: $guards_dspl = $langmark128; break;
}
SWITCH ($bigmen_t) {
CASE 0: $bigmen_dspl = $langmark1017; break;
CASE 1: $bigmen_dspl = $langmark120; break;
CASE 2: $bigmen_dspl = $langmark121; break;
CASE 3: $bigmen_dspl = $langmark122; break;
CASE 4: $bigmen_dspl = $langmark123; break;
CASE 5: $bigmen_dspl = $langmark124; break;
CASE 6: $bigmen_dspl = $langmark125; break;
CASE 7: $bigmen_dspl = $langmark126; break;
CASE 8: $bigmen_dspl = $langmark127; break;
CASE 9: $bigmen_dspl = $langmark128; break;
}
?>

<table border="0" cellspacing="0" cellpadding="0" width="100%"><tr><td>
<table border="0" cellspacing="1" cellpadding="1" width="100%">
<tr><td colspan="2"><b><?=$langmark1000?></b></td></tr>
<!--
+kovči round > ceil
-->
<tr><td width="58"><b><?=$langmark1002?></b></td><td><?=$guards_dspl?></td></tr>
<tr><td width="58"><b><?=$langmark1001?></b></td><td><?=$intens_dspl?></td></tr>
<tr><td width="58"><hr/></td></tr>
<tr><td width="58"><b><?=$langmark1003?></b></td><td><?=$bigmen_dspl?></td></tr>
<tr><td width="58"><b><?=$langmark1001?></b></td><td><?=$intens_dspl2?></td></tr>
</table>
<br/><br/><b><?=$langmark1004?></b><br/>
</td>
<?php if ($mum>0) {echo "<td align=\"right\" valign=\"top\"><img src=\"img/coach.jpg\" border=\"1\" alt=\"Coach at training\" title=\"Coach at training\" align=\"top\"></td>";}?>
</tr>
</table>

<?php
if ($mum==0) {echo "<br/>",$langmark1005," ",$langmark1006," <a href=\"coaches.php\">",$langmark1007,"</a>.";}
else
{
$id=mysql_result($result1,$i,"id");
$name=mysql_result($result1,$i,"name");
$surname=mysql_result($result1,$i,"surname");
$age=mysql_result($result1,$i,"age");
$club=mysql_result($result1,$i,"club");
$country=mysql_result($result1,$i,"country");
$charac=mysql_result($result1,$i,"charac");
$height=mysql_result($result1,$i,"height");
$weight=mysql_result($result1,$i,"weight");
$handling=mysql_result($result1,$i,"handling");
$speed=mysql_result($result1,$i,"speed");
$passing=mysql_result($result1,$i,"passing");
$vision=mysql_result($result1,$i,"vision");
$rebounds=mysql_result($result1,$i,"rebounds");
$position=mysql_result($result1,$i,"position");
$freethrow=mysql_result($result1,$i,"freethrow");
$shooting=mysql_result($result1,$i,"shooting");
$defense=mysql_result($result1,$i,"defense");
$workrate=mysql_result($result1,$i,"workrate");
$experience=mysql_result($result1,$i,"experience");
$hskill=mysql_result($result1,$i,"quality");
$signup=mysql_result($result1,$i,"price");
$wage=mysql_result($result1,$i,"wage");
$orient=mysql_result($result1,$i,"orient");
$quality=mysql_result($result1,$i,"quality");
$motiv=mysql_result($result1,$i,"motiv");
if ($motiv > 100) {$motiv=100;}

$con=$_GET["con"];
if ($con > 0 && $motiv < 95 && $club==$get_team) {$xxx = round(($motiv/1.25) * $wage + $signup - $con * ($motiv/1.25));}
if ($xxx < 0) {$xxx=0;}
if ($con > 0 && $imadenar < 75*$xxx/100 && $xxx > 0) {echo "<br/><font color=\"red\"><b>You don't have enough money to pay the desired sign-up fee!</b></font><br/>";}
if ($con > 0 && ($imadenar > 75*$xxx/100 || $xxx==0) && $motiv < 95 && $club==$get_team) {
mysql_query("UPDATE players SET wage ='$con', motiv =104 WHERE id ='$id' LIMIT 1") or die(mysql_error());
mysql_query("UPDATE teams SET curmoney = curmoney - $xxx WHERE teamid ='$get_team' LIMIT 1") or die(mysql_error());
$yyy = number_format($xxx, 0, '.', '.');
if ($xxx > 0) {mysql_query("INSERT INTO events VALUES ('', $get_team, NOW(), '$yyy &euro; was paid to your coach, after he agreed to sign a new contract with the club.', 1, -$xxx);") or die(mysql_error());} else {mysql_query("INSERT INTO events VALUES ('', $get_team, NOW(), 'New contract was signed with a coach, giving him a salary increase.', 0, 0);") or die(mysql_error());}
}

if ($handling < 9) {$handling_dspl = $langmark111; }
elseif ($handling > 8 AND $handling < 17) {$handling_dspl = $langmark096; }
elseif ($handling > 16 AND $handling < 25) {$handling_dspl = $langmark097; }
elseif ($handling > 24 AND $handling < 33) {$handling_dspl = $langmark098; }
elseif ($handling > 32 AND $handling < 41) {$handling_dspl = $langmark099; }
elseif ($handling > 40 AND $handling < 49) {$handling_dspl = $langmark100; }
elseif ($handling > 48 AND $handling < 57) {$handling_dspl = $langmark101; }
elseif ($handling > 56 AND $handling < 65) {$handling_dspl = $langmark102; }
elseif ($handling > 64 AND $handling < 73) {$handling_dspl = $langmark103; }
elseif ($handling > 72 AND $handling < 81) {$handling_dspl = $langmark104; }
elseif ($handling > 80 AND $handling < 89) {$handling_dspl = $langmark105; }
elseif ($handling > 88 AND $handling < 97) {$handling_dspl = $langmark106; }
elseif ($handling > 96 AND $handling < 105) {$handling_dspl = $langmark107; }
elseif ($handling > 104 AND $handling < 113) {$handling_dspl = $langmark108; }
elseif ($handling > 112 AND $handling < 121) {$handling_dspl = $langmark109; }
else $handling_dspl = $langmark110;

if ($speed < 9) {$speed_dspl = $langmark111; }
elseif ($speed > 8 AND $speed < 17) {$speed_dspl = $langmark096; }
elseif ($speed > 16 AND $speed < 25) {$speed_dspl = $langmark097; }
elseif ($speed > 24 AND $speed < 33) {$speed_dspl = $langmark098; }
elseif ($speed > 32 AND $speed < 41) {$speed_dspl = $langmark099; }
elseif ($speed > 40 AND $speed < 49) {$speed_dspl = $langmark100; }
elseif ($speed > 48 AND $speed < 57) {$speed_dspl = $langmark101; }
elseif ($speed > 56 AND $speed < 65) {$speed_dspl = $langmark102; }
elseif ($speed > 64 AND $speed < 73) {$speed_dspl = $langmark103; }
elseif ($speed > 72 AND $speed < 81) {$speed_dspl = $langmark104; }
elseif ($speed > 80 AND $speed < 89) {$speed_dspl = $langmark105; }
elseif ($speed > 88 AND $speed < 97) {$speed_dspl = $langmark106; }
elseif ($speed > 96 AND $speed < 105) {$speed_dspl = $langmark107; }
elseif ($speed > 104 AND $speed < 113) {$speed_dspl = $langmark108; }
elseif ($speed > 112 AND $speed < 121) {$speed_dspl = $langmark109; }
else $speed_dspl = $langmark110;

if ($passing < 9) {$passing_dspl = $langmark111; }
elseif ($passing > 8 AND $passing < 17) {$passing_dspl = $langmark096; }
elseif ($passing > 16 AND $passing < 25) {$passing_dspl = $langmark097; }
elseif ($passing > 24 AND $passing < 33) {$passing_dspl = $langmark098; }
elseif ($passing > 32 AND $passing < 41) {$passing_dspl = $langmark099; }
elseif ($passing > 40 AND $passing < 49) {$passing_dspl = $langmark100; }
elseif ($passing > 48 AND $passing < 57) {$passing_dspl = $langmark101; }
elseif ($passing > 56 AND $passing < 65) {$passing_dspl = $langmark102; }
elseif ($passing > 64 AND $passing < 73) {$passing_dspl = $langmark103; }
elseif ($passing > 72 AND $passing < 81) {$passing_dspl = $langmark104; }
elseif ($passing > 80 AND $passing < 89) {$passing_dspl = $langmark105; }
elseif ($passing > 88 AND $passing < 97) {$passing_dspl = $langmark106; }
elseif ($passing > 96 AND $passing < 105) {$passing_dspl = $langmark107; }
elseif ($passing > 104 AND $passing < 113) {$passing_dspl = $langmark108; }
elseif ($passing > 112 AND $passing < 121) {$passing_dspl = $langmark109; }
else $passing_dspl = $langmark110;

if ($vision < 9) {$vision_dspl = $langmark111; }
elseif ($vision > 8 AND $vision < 17) {$vision_dspl = $langmark096; }
elseif ($vision > 16 AND $vision < 25) {$vision_dspl = $langmark097; }
elseif ($vision > 24 AND $vision < 33) {$vision_dspl = $langmark098; }
elseif ($vision > 32 AND $vision < 41) {$vision_dspl = $langmark099; }
elseif ($vision > 40 AND $vision < 49) {$vision_dspl = $langmark100; }
elseif ($vision > 48 AND $vision < 57) {$vision_dspl = $langmark101; }
elseif ($vision > 56 AND $vision < 65) {$vision_dspl = $langmark102; }
elseif ($vision > 64 AND $vision < 73) {$vision_dspl = $langmark103; }
elseif ($vision > 72 AND $vision < 81) {$vision_dspl = $langmark104; }
elseif ($vision > 80 AND $vision < 89) {$vision_dspl = $langmark105; }
elseif ($vision > 88 AND $vision < 97) {$vision_dspl = $langmark106; }
elseif ($vision > 96 AND $vision < 105) {$vision_dspl = $langmark107; }
elseif ($vision > 104 AND $vision < 113) {$vision_dspl = $langmark108; }
elseif ($vision > 112 AND $vision < 121) {$vision_dspl = $langmark109; }
else $vision_dspl = $langmark110;

if ($rebounds < 9) {$rebounds_dspl = $langmark111; }
elseif ($rebounds > 8 AND $rebounds < 17) {$rebounds_dspl = $langmark096; }
elseif ($rebounds > 16 AND $rebounds < 25) {$rebounds_dspl = $langmark097; }
elseif ($rebounds > 24 AND $rebounds < 33) {$rebounds_dspl = $langmark098; }
elseif ($rebounds > 32 AND $rebounds < 41) {$rebounds_dspl = $langmark099; }
elseif ($rebounds > 40 AND $rebounds < 49) {$rebounds_dspl = $langmark100; }
elseif ($rebounds > 48 AND $rebounds < 57) {$rebounds_dspl = $langmark101; }
elseif ($rebounds > 56 AND $rebounds < 65) {$rebounds_dspl = $langmark102; }
elseif ($rebounds > 64 AND $rebounds < 73) {$rebounds_dspl = $langmark103; }
elseif ($rebounds > 72 AND $rebounds < 81) {$rebounds_dspl = $langmark104; }
elseif ($rebounds > 80 AND $rebounds < 89) {$rebounds_dspl = $langmark105; }
elseif ($rebounds > 88 AND $rebounds < 97) {$rebounds_dspl = $langmark106; }
elseif ($rebounds > 96 AND $rebounds < 105) {$rebounds_dspl = $langmark107; }
elseif ($rebounds > 104 AND $rebounds < 113) {$rebounds_dspl = $langmark108; }
elseif ($rebounds > 112 AND $rebounds < 121) {$rebounds_dspl = $langmark109; }
else $rebounds_dspl = $langmark110;

if ($position < 9) {$position_dspl = $langmark111; }
elseif ($position > 8 AND $position < 17) {$position_dspl = $langmark096; }
elseif ($position > 16 AND $position < 25) {$position_dspl = $langmark097; }
elseif ($position > 24 AND $position < 33) {$position_dspl = $langmark098; }
elseif ($position > 32 AND $position < 41) {$position_dspl = $langmark099; }
elseif ($position > 40 AND $position < 49) {$position_dspl = $langmark100; }
elseif ($position > 48 AND $position < 57) {$position_dspl = $langmark101; }
elseif ($position > 56 AND $position < 65) {$position_dspl = $langmark102; }
elseif ($position > 64 AND $position < 73) {$position_dspl = $langmark103; }
elseif ($position > 72 AND $position < 81) {$position_dspl = $langmark104; }
elseif ($position > 80 AND $position < 89) {$position_dspl = $langmark105; }
elseif ($position > 88 AND $position < 97) {$position_dspl = $langmark106; }
elseif ($position > 96 AND $position < 105) {$position_dspl = $langmark107; }
elseif ($position > 104 AND $position < 113) {$position_dspl = $langmark108; }
elseif ($position > 112 AND $position < 121) {$position_dspl = $langmark109; }
else $position_dspl = $langmark110;

if ($shooting < 9) {$shooting_dspl = $langmark111; }
elseif ($shooting > 8 AND $shooting < 17) {$shooting_dspl = $langmark096; }
elseif ($shooting > 16 AND $shooting < 25) {$shooting_dspl = $langmark097; }
elseif ($shooting > 24 AND $shooting < 33) {$shooting_dspl = $langmark098; }
elseif ($shooting > 32 AND $shooting < 41) {$shooting_dspl = $langmark099; }
elseif ($shooting > 40 AND $shooting < 49) {$shooting_dspl = $langmark100; }
elseif ($shooting > 48 AND $shooting < 57) {$shooting_dspl = $langmark101; }
elseif ($shooting > 56 AND $shooting < 65) {$shooting_dspl = $langmark102; }
elseif ($shooting > 64 AND $shooting < 73) {$shooting_dspl = $langmark103; }
elseif ($shooting > 72 AND $shooting < 81) {$shooting_dspl = $langmark104; }
elseif ($shooting > 80 AND $shooting < 89) {$shooting_dspl = $langmark105; }
elseif ($shooting > 88 AND $shooting < 97) {$shooting_dspl = $langmark106; }
elseif ($shooting > 96 AND $shooting < 105) {$shooting_dspl = $langmark107; }
elseif ($shooting > 104 AND $shooting < 113) {$shooting_dspl = $langmark108; }
elseif ($shooting > 112 AND $shooting < 121) {$shooting_dspl = $langmark109; }
else $shooting_dspl = $langmark110;

if ($freethrow < 9) {$freethrow_dspl = $langmark111; }
elseif ($freethrow > 8 AND $freethrow < 17) {$freethrow_dspl = $langmark096; }
elseif ($freethrow > 16 AND $freethrow < 25) {$freethrow_dspl = $langmark097; }
elseif ($freethrow > 24 AND $freethrow < 33) {$freethrow_dspl = $langmark098; }
elseif ($freethrow > 32 AND $freethrow < 41) {$freethrow_dspl = $langmark099; }
elseif ($freethrow > 40 AND $freethrow < 49) {$freethrow_dspl = $langmark100; }
elseif ($freethrow > 48 AND $freethrow < 57) {$freethrow_dspl = $langmark101; }
elseif ($freethrow > 56 AND $freethrow < 65) {$freethrow_dspl = $langmark102; }
elseif ($freethrow > 64 AND $freethrow < 73) {$freethrow_dspl = $langmark103; }
elseif ($freethrow > 72 AND $freethrow < 81) {$freethrow_dspl = $langmark104; }
elseif ($freethrow > 80 AND $freethrow < 89) {$freethrow_dspl = $langmark105; }
elseif ($freethrow > 88 AND $freethrow < 97) {$freethrow_dspl = $langmark106; }
elseif ($freethrow > 96 AND $freethrow < 105) {$freethrow_dspl = $langmark107; }
elseif ($freethrow > 104 AND $freethrow < 113) {$freethrow_dspl = $langmark108; }
elseif ($freethrow > 112 AND $freethrow < 121) {$freethrow_dspl = $langmark109; }
else $freethrow_dspl = $langmark110;

if ($defense < 9) {$defense_dspl = $langmark111; }
elseif ($defense > 8 AND $defense < 17) {$defense_dspl = $langmark096; }
elseif ($defense > 16 AND $defense < 25) {$defense_dspl = $langmark097; }
elseif ($defense > 24 AND $defense < 33) {$defense_dspl = $langmark098; }
elseif ($defense > 32 AND $defense < 41) {$defense_dspl = $langmark099; }
elseif ($defense > 40 AND $defense < 49) {$defense_dspl = $langmark100; }
elseif ($defense > 48 AND $defense < 57) {$defense_dspl = $langmark101; }
elseif ($defense > 56 AND $defense < 65) {$defense_dspl = $langmark102; }
elseif ($defense > 64 AND $defense < 73) {$defense_dspl = $langmark103; }
elseif ($defense > 72 AND $defense < 81) {$defense_dspl = $langmark104; }
elseif ($defense > 80 AND $defense < 89) {$defense_dspl = $langmark105; }
elseif ($defense > 88 AND $defense < 97) {$defense_dspl = $langmark106; }
elseif ($defense > 96 AND $defense < 105) {$defense_dspl = $langmark107; }
elseif ($defense > 104 AND $defense < 113) {$defense_dspl = $langmark108; }
elseif ($defense > 112 AND $defense < 121) {$defense_dspl = $langmark109; }
else $defense_dspl = $langmark110;

if ($workrate < 9) {$workrate_dspl = $langmark111; }
elseif ($workrate > 8 AND $workrate < 17) {$workrate_dspl = $langmark096; }
elseif ($workrate > 16 AND $workrate < 25) {$workrate_dspl = $langmark097; }
elseif ($workrate > 24 AND $workrate < 33) {$workrate_dspl = $langmark098; }
elseif ($workrate > 32 AND $workrate < 41) {$workrate_dspl = $langmark099; }
elseif ($workrate > 40 AND $workrate < 49) {$workrate_dspl = $langmark100; }
elseif ($workrate > 48 AND $workrate < 57) {$workrate_dspl = $langmark101; }
elseif ($workrate > 56 AND $workrate < 65) {$workrate_dspl = $langmark102; }
elseif ($workrate > 64 AND $workrate < 73) {$workrate_dspl = $langmark103; }
elseif ($workrate > 72 AND $workrate < 81) {$workrate_dspl = $langmark104; }
elseif ($workrate > 80 AND $workrate < 89) {$workrate_dspl = $langmark105; }
elseif ($workrate > 88 AND $workrate < 97) {$workrate_dspl = $langmark106; }
elseif ($workrate > 96 AND $workrate < 105) {$workrate_dspl = $langmark107; }
elseif ($workrate > 104 AND $workrate < 113) {$workrate_dspl = $langmark108; }
elseif ($workrate > 112 AND $workrate < 121) {$workrate_dspl = $langmark109; }
else $workrate_dspl = $langmark110;

if ($experience < 9) {$experience_dspl = $langmark111; }
elseif ($experience > 8 AND $experience < 17) {$experience_dspl = $langmark096; }
elseif ($experience > 16 AND $experience < 25) {$experience_dspl = $langmark097; }
elseif ($experience > 24 AND $experience < 33) {$experience_dspl = $langmark098; }
elseif ($experience > 32 AND $experience < 41) {$experience_dspl = $langmark099; }
elseif ($experience > 40 AND $experience < 49) {$experience_dspl = $langmark100; }
elseif ($experience > 48 AND $experience < 57) {$experience_dspl = $langmark101; }
elseif ($experience > 56 AND $experience < 65) {$experience_dspl = $langmark102; }
elseif ($experience > 64 AND $experience < 73) {$experience_dspl = $langmark103; }
elseif ($experience > 72 AND $experience < 81) {$experience_dspl = $langmark104; }
elseif ($experience > 80 AND $experience < 89) {$experience_dspl = $langmark105; }
elseif ($experience > 88 AND $experience < 97) {$experience_dspl = $langmark106; }
elseif ($experience > 96 AND $experience < 105) {$experience_dspl = $langmark107; }
elseif ($experience > 104 AND $experience < 113) {$experience_dspl = $langmark108; }
elseif ($experience > 112 AND $experience < 121) {$experience_dspl = $langmark109; }
else $experience_dspl = $langmark110;

SWITCH (TRUE) {
CASE ($charac < 4): $spec_txt=$langmark763; break;
CASE ($charac > 3 && $charac < 7): $spec_txt=$langmark764; break;
CASE ($charac > 6 && $charac < 11): $spec_txt=$langmark765; break;
CASE ($charac > 10 && $charac < 14): $spec_txt=$langmark766; break;
CASE ($charac > 13 && $charac < 17): $spec_txt=$langmark767; break;
CASE ($charac > 16): $spec_txt=$langmark768; break;
}

$feetheight = floor((100*$height)/3048);
$tempheight = $height - ($feetheight*3048/100);
$inchheight = (100*$tempheight)/254;
$usheight = $feetheight.".".round($inchheight);
$usweight = round ($weight * 22046 / 10000);
$diswage = number_format($wage, 0, ',', '.');

echo "<hr/><b>",$name,"&nbsp;",$surname,"</b><br/><br/>";

//bari
$YTBAR = 100 * ($workrate/10 + $experience/6 + 2*($hskill-40)) / 68;
if ($YTBAR > 100) {$YTBAR=100;}
if ($workrate > 121) {$tempwr = 121;} else {$tempwr=$workrate;}
if ($motiv > 99.99) {$STBAR = 100 * $tempwr / 121;} else {$STBAR = (100 * $tempwr * $motiv/100) / 121;}
//$FTBAR = 100 * $experience / 121;
//if ($FTBAR > 100) {$FTBAR = 100;}

echo "<nobr><b>",round($STBAR),"/100</b> - ability to develop senior team players</nobr><br/>";
$colR = round(200-$STBAR-$STBAR);
$colG = round(2*$STBAR);
?>
<div style="height:7px; width:200px;background-color:#ffffff;position:relative; overflow:hidden; border: 1px solid #000000;">
<div style="position:absolute;top:0px;left:0px;background-color:rgb(<?=$colR?>,<?=$colG?>,73); width:<?=$colG?>px;height:7px"></div>
<div style="position:absolute;top:0px;left:<?=$colG?>px;background-color:rgb(255,255,255); width:<?=$colR?>px;height:7px;border-right: 1px solid #000000;"></div></div>
<?php
echo "<b>",round($YTBAR),"/100</b> - ability to develop youth team players<br/>";
$colR = round(200-$YTBAR-$YTBAR);
$colG = round(2*$YTBAR);
?>
<div style="height:7px; width:200px;background-color:#ffffff;position:relative; overflow:hidden; border: 1px solid #000000;">
<div style="position:absolute;top:0px;left:0px;background-color:rgb(<?=$colR?>,<?=$colG?>,73); width:<?=$colG?>px;height:7px"></div>
<div style="position:absolute;top:0px;left:<?=$colG?>px;background-color:rgb(255,255,255); width:<?=$colR?>px;height:7px;border-right: 1px solid #000000;"></div></div>
<br/>
<?php
echo "<b>",$langmark113,":</b> ",$age,"<br/>";
echo "<b>",$langmark114,":</b> ",$country,"<br/>";
echo "<b>",$langmark115,":</b> ",$spec_txt,"<br/>";
echo "<b>",$langmark116,":</b> ",$height," cm (",$usheight," ft)<br/>";
echo "<b>",$langmark117,":</b> ",round($weight)," kg (",$usweight," lb)<br/>";
echo "<b>",$langmark118,":</b> ",$diswage," &euro; / ",$langmark382,"<br/>";
echo "<b>Working with youth:</b>&nbsp;";
SWITCH (TRUE) {
CASE ($hskill < 43): echo $langmark096; break;
CASE ($hskill > 42 && $hskill < 46): echo $langmark098; break;
CASE ($hskill > 45 && $hskill < 49): echo $langmark100; break;
CASE ($hskill > 48 && $hskill < 52): echo $langmark102; break;
CASE ($hskill > 51 && $hskill < 55): echo $langmark104; break;
CASE ($hskill > 54 && $hskill < 58): echo $langmark106; break;
CASE ($hskill > 57): echo $langmark108; break;
}
?>
<br/><br/>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr><td width="73"><b><?=$langmark120?>:</b></td><td width="128"> <?=$handling_dspl?></td>
<td width="75"><b><?=$langmark121?>:</b></td><td width="117"> <?=$speed_dspl?></td></tr>
<tr><td><b><?=$langmark122?>:</b></td><td> <?=$passing_dspl?></td>
<td><b><?=$langmark123?>:</b></td><td> <?=$vision_dspl?></td></tr>
<tr><td><b><?=$langmark124?>:</b></td><td> <?=$rebounds_dspl?></td>
<td><b><?=$langmark125?>:</b></td><td> <?=$position_dspl?></td></tr>
<tr><td><b><?=$langmark126?>:</b></td><td> <?=$shooting_dspl?></td>
<td><b><?=$langmark127?>:</b></td><td> <?=$freethrow_dspl?></td></tr>
<tr><td><b><?=$langmark128?>:</b></td><td> <?=$defense_dspl?></td>
<td><b><?=$langmark129?>:</b></td><td> <?=$workrate_dspl?></td></tr>
<tr><td><b><?=$langmark130?>:</b></td><td> <?=$experience_dspl?></td>

<?php if (ceil($motiv) > 80 AND ceil($motiv) < 85) {?><td><b><?=$langmark131?>:</b></td><td> <font color="red"><?=ceil($motiv)?>%</font></td>
<?php } elseif (ceil($motiv) > 74 AND ceil($motiv) < 81){?><td><b><?=$langmark131?>:</b></td><td> <font color="red"><b><?=ceil($motiv)?>%</b></font></td>
<?php } elseif (ceil($motiv) < 76){?><td><font color="red"><b><?=$langmark131?>:</b></font></td><td> <font color="red"><b><?=ceil($motiv)?>%</b></font></td>
<?php } else {?><td><b><?=$langmark131?>:</b></td><td> <?=ceil($motiv)?>%</td><?php }?>
</tr>
</table>
<br/>
<?php
$action = $_GET['action'];
if (isset($_POST['submit1'])) {
$placilo = $_POST["placilo"];
if ($placilo) {$action='newdeal';}
if ((is_numeric($placilo)==FALSE) OR ($placilo<$wage)){$ru=4;} else {$ru=7;}
}
if ($action<>'newdeal'){?><a href="coaches.php"><?=$langmark1008?></a><?php } else {
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="100%">
<h2>OFFER NEW CONTRACT</h2>
<form method="post" action="training.php" style="margin: 0">
<b>Offer new weekly wage to your coach:</b><br/>
<input type="text" maxlength="6" size="6" name="placilo" value="<?=$placilo?>" class="inputreg"><br/>
<input type="submit" value="Ask him if he's happy" name="submit1" class="buttonreg">
</form>
<?php if ($ru==4) {echo "<hr/><font color=\"darkred\"><b>Coach looks annoyed. He refuses to accept less than his current wage is.</b></font>";}
elseif ($ru==7) {
$xxx = round(($motiv/1.25) * $wage + $signup - $placilo * ($motiv/1.25));
if ($xxx > 0) {echo "<hr/><b>Coach is willing to sign new contract, but he demands ".number_format($xxx, 0, '.', '.')."&euro; sign-up fee. Sign new contract now?</b> <a href=\"training.php?con=".$placilo."\">Yes</a> | <a href=\"training.php?action=newdeal\">No</a>";} else {echo "<hr/><b>Coach is willing to sign new contract immidiately with no additional sign-up fee. Sign new contract now?</b> <a href=\"training.php?con=".$placilo."\">Yes</a> | <a href=\"training.php?action=newdeal\">No</a>";}
}?>
</td></tr></table>
<?php
}
}
}
?>
</td><td class="border" width="37%">

<h2><?=$langmark1009?></h2><br/>

<form method="post" action="<?=$_SERVER['PHP_SELF']?>" style="margin: 0">
<table width="200">

<tr><td><b><?=$langmark1002?></b></td><td>
<select name="guar" class="inputreg"><option value="99">--<?=$langmark012?>--</option><option value="1"><?=$langmark120?></option><option  value="2"><?=$langmark121?></option><option value="3"><?=$langmark122?></option><option value="4"><?=$langmark123?></option><option value="5"><?=$langmark124?></option><option value="6"><?=$langmark125?></option><option value="7"><?=$langmark126?></option><option value="8"><?=$langmark127?></option><option value="9"><?=$langmark128?></option></select></td></tr>

<tr><td><b><?=$langmark1001?></b></td><td>
<select name="inte" class="inputreg"><option value="99">-<?=$langmark1010?>-</option><option value="0"><?=$langmark1011?></option><option value="1"><?=$langmark1012?></option><option value="2"><?=$langmark1013?></option><option value="3">Immense (40h/week)</option></select></td></tr>

<tr><td><hr/></td><td>

<tr><td><b><?=$langmark1003?></b></td><td>
<select name="bigm" class="inputreg"><option value="99">--<?=$langmark012?>--</option><option value="1"><?=$langmark120?></option><option value="2"><?=$langmark121?></option><option value="3"><?=$langmark122?></option><option value="4"><?=$langmark123?></option><option value="5"><?=$langmark124?></option><option value="6"><?=$langmark125?></option><option value="7"><?=$langmark126?></option><option value="8"><?=$langmark127?></option><option value="9"><?=$langmark128?></option></select></td></tr>

<tr><td><b><?=$langmark1001?></b></td><td>
<select name="inte2" class="inputreg"><option value="99">-<?=$langmark1010?>-</option><option value="0"><?=$langmark1011?></option><option value="1"><?=$langmark1012?></option><option value="2"><?=$langmark1013?></option><option value="3">Immense (40h/week)</option></select></td></tr>

<tr><td colspan="2" align="right">
<input type="submit" value="<?=$langmark1014?>" name="submit" class="buttonreg">
</td></tr>
</table></form><br/>

<h2><?=$langmark1444?></h2><br/>
<?php
if ($mum==0) {echo "<a href=\"coaches.php\">",$langmark1015,"</a>";}
if ($mum<>0 && $motiv < 95 && $report <> 'report' && $report <> 'growth' AND $djan<>55) {echo "<a href=\"training.php?action=newdeal\">New contract</a><br/>";}
if ($mum<>0 && $report <> 'growth') {echo "<a href=\"training.php?action=trytofire\">",$langmark1283,"</a><br/><br/>";}
if ($action=='trytofire'){echo "<font color=\"darkred\"><b>",$langmark470,"<br/><a href=\"coach.php?coachid=",$id,"&action=fire\">",$langmark471,"</a><br/><a href=\"training.php\">",$langmark472,"</a></font></b>";}
$dodch = round(100 * ($workrate/10 + $experience/6 + 2*($hskill-40)) / 68);
if ($mum==1 AND $action <>'trytofire' AND $dodch > 74) {echo "<a href=\"yteam.php\">Youth team</a><br/>";}
if ($mum==1 AND $action <>'trytofire') {echo "<a href=\"weight.php\">Physical training</a><br/>";}
if ($supporter==1 AND $mum==1 AND $action <>'trytofire') {echo "<a href=\"training.php?report=report\">",$langmark1284,"</a>&nbsp;<img src=\"img/bsupn.png\" title=\"Thanks for supporting Basketsim!\" height=\"10\" align=\"bottom\">";}
if ($supporter==1 AND $mum==1 AND $action <>'trytofire') {echo "<br/><a href=\"playerstable.php\">Exact report on player skills</a> <img src=\"img/bsupn.png\" title=\"Thanks for supporting Basketsim!\" height=\"10\" align=\"bottom\">";}
if ($supporter==1 AND $mum==1 AND $action <>'trytofire') {echo "<br/><a href=\"training.php?report=growth\">",$langmark1285,"</a>&nbsp;<img src=\"img/bsupn.png\" title=\"Thanks for supporting Basketsim!\" height=\"10\" align=\"bottom\">";}
?>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>