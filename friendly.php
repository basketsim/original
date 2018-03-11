<?php
$action=$_GET['action'];
$today = date("l");
if(($today =='Tuesday' || $today =='Wednesday') && ($action=='accept')) {header( "location: friendly.php?rday=neg");}

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT `username`, `club`, `lang`, `friendly`, `supporter`, `expire` FROM `users` WHERE `password`='$koda' AND `userid`='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)==1) {
$cpoka = mysql_result ($compare,0,"username");
$get_team = mysql_result ($compare,0,"club");
$lang = mysql_result ($compare,0,"lang");
$isfrend = mysql_result ($compare,0,"friendly");
$jeplas = mysql_result ($compare,0,"supporter");
$expire = mysql_result ($compare,0,"expire");
}
else {die(include 'basketsim.php');}

require("inc/lang/".$lang.".php");

if (isset($_POST['submitcc']) && $jeplas==1) {
$dvoj = mysql_query("SELECT * FROM fc WHERE o_userid=$userid AND status=1") or die(mysql_error());
if (mysql_num_rows($dvoj) >0) {header('Location:friendly.php'); die();}
$cupnam = $_POST["cupname"];
$awar = $_POST["award"];
$tim = $_POST["time"];
if (!is_numeric($awar) OR $awar > 12 OR $awar < 0) {$awar=0;}
if ($tim<>12 AND $tim<>20) {$tim=20;}
$cupnam = strip_tags($cupnam);
$cupnam = trim($cupnam);
if (strlen($cupnam) < 2) {$cupnam=$cpoka."'s Cup"; $err=2;}
if ($awar >0 AND $err<>2) {
$splitdatetime = explode(" ", $expire); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$novdatum = date("Y-m-d H:i:s", mktime($dbhour,$dbmin,$dbsec,$dbmonth-$awar,$dbday,$dbyear));
$endatum = date("Y-m-d H:i:s");
$tdatetime = explode(" ",$endatum); $ffdate = $tdatetime[0]; $fftime = $tdatetime[1];
$tdate = explode("-", $ffdate); $ffyear = $tdate[0]; $ffmonth = $tdate[1]; $ffday = $tdate[2];
$ttime = explode(":", $fftime); $ffhour = $ttime[0]; $ffmin = $ttime[1]; $ffsec = $ttime[2];
$cas = date("Y-m-d H:i:s", mktime($ffhour,$ffmin,$ffsec,$ffmonth,$ffday+8,$ffyear));
if ($cas > $novdatum) {$err=3;}
}
if ($err<>2 AND $err<>3) {
$cupnam = addslashes($cupnam);
$cupnam = htmlspecialchars(stripslashes($cupnam));
mysql_query("INSERT INTO fc VALUES ('', '$cupnam', $userid, '$cpoka', $awar, $tim, 1, 0, '', 0, '', 'NOW()')") or die(mysql_error());
}
}
if ($action=='reject') {
$id = $_GET['id'];
if (!is_numeric($id)) {die(include 'index.php');}
$whiss = mysql_query("SELECT received_user FROM friendly WHERE chall_id =$id LIMIT 1");
$verify = mysql_fetch_row($whiss);
if (!$verify){ die(include 'index.php');}
$rightus = mysql_result($whiss,0);
if ($rightus <> $userid) die (include 'index.php');
mysql_query("DELETE FROM friendly WHERE chall_id =$id LIMIT 1");
header( 'Location: friendly.php' );
}

if ($action=='cancel') {
$id = $_GET['id'];
if (!is_numeric($id)) {die(include 'index.php');}
$whiss = mysql_query("SELECT sent_user FROM friendly WHERE chall_id =$id LIMIT 1");
$verify = mysql_fetch_row($whiss);
if (!$verify){ die(include 'index.php');}
$rightus = mysql_result($whiss,0);
if ($rightus <> $userid) die (include 'index.php');
mysql_query("DELETE FROM friendly WHERE chall_id =$id LIMIT 1");
header( 'Location: friendly.php' );
}

//attempted accept
if ($action=='accept' && $today<>'Tuesday' && $today<>'Wednesday') {
$id = $_GET['id'];
if (!is_numeric($id)) {die(include 'index.php');}
$whiss = mysql_query("SELECT received_user FROM friendly WHERE chall_id ='$id'");
$verify = mysql_fetch_row($whiss);
if (!$verify){ die(include 'index.php');}
$rightus = mysql_result($whiss,0);
if ($rightus <> $userid) {die (include 'index.php');}
$preveritev = mysql_query("SELECT friendly FROM users WHERE userid ='$userid'");
$preveri = mysql_result($preveritev,0);
if ($preveri <>0) {echo $langmark1405; die (include 'index.php');}
$whiss1 = mysql_query("SELECT sent_user FROM friendly WHERE chall_id =$id");
$rightus1 = @mysql_result($whiss1,0);
$preveri1=4;
$preveritev1 = @mysql_query("SELECT friendly FROM users WHERE userid =$rightus1");
$preveri1 = @mysql_result($preveritev1,0);
if ($preveri1 <>0) {echo $langmark1404; die (include 'index.php');}

$ve = $_GET['ve'];
if ($ve==1) {
$hometeamname = mysql_query("SELECT name FROM teams WHERE teamid ='$get_team'");
$home_team_name = mysql_result($hometeamname,0);
$oppteam = mysql_query("SELECT club FROM users WHERE userid =$rightus1");
$opp_team = mysql_result($oppteam,0);
$oppteamname = mysql_query("SELECT `name`,`country` FROM teams WHERE teamid =$opp_team");
$opp_team_name = mysql_result($oppteamname,0,"name");
$opp_team_country = mysql_result($oppteamname,0,"country");
$opparena = mysql_query("SELECT arenaid FROM arena WHERE teamid =$opp_team");
$opp_arena = mysql_result($opparena,0);
$opparenaname = mysql_query("SELECT arenaname FROM arena WHERE teamid =$opp_team");
$opp_arena_name = mysql_result($opparenaname,0);
//cas tekme
$datenow = date("Y-m-d H:i:s");
$pult = mysql_query("SELECT `date`FROM `friendly_dates`WHERE `country` LIKE '$opp_team_country' AND `date` > '$datenow' ORDER BY `date` ASC") or die(mysql_error());
if (mysql_num_rows($pult) > 0) {$totaltime = mysql_result($pult,0);}
else {echo $langmark1403; die (include 'index.php');}
$cfmatch = "INSERT INTO matches VALUES ('', $opp_team, '', $get_team, '', $opp_arena, '$opp_arena_name', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$totaltime', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$opp_team_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $default_season, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$cfresult = mysql_query($cfmatch);
$delchal = mysql_query("DELETE FROM friendly WHERE sent_user =$rightus1");
$delchal1 = mysql_query("DELETE FROM friendly WHERE sent_user =$userid");
$delchal2 = mysql_query("DELETE FROM friendly WHERE received_user =$rightus1");
$delchal3 = mysql_query("DELETE FROM friendly WHERE received_user =$userid");
$fmstatmus = mysql_query("UPDATE users SET friendly =1 WHERE userid =$userid LIMIT 1");
$fmstatus1 = mysql_query("UPDATE users SET friendly =1 WHERE userid =$rightus1 LIMIT 1");
}
elseif ($ve==2) {
$hometeamname = mysql_query("SELECT `name`,`country` FROM teams WHERE teamid ='$get_team'");
$home_team_name = mysql_result($hometeamname,0,"name");
$home_team_country = mysql_result($hometeamname,0,"country");
$oppteam = mysql_query("SELECT club FROM users WHERE userid=$rightus1");
$opp_team = mysql_result($oppteam,0);
$oppteamname = mysql_query("SELECT name FROM teams WHERE teamid=$opp_team");
$opp_team_name = mysql_result($oppteamname,0);
$myarena = mysql_query("SELECT arenaid FROM arena WHERE teamid=$get_team");
$my_arena = mysql_result($myarena,0);
$myarenaname = mysql_query("SELECT arenaname FROM arena WHERE teamid=$get_team");
$my_arena_name = mysql_result($myarenaname,0);
//cas tekme
$datenow = date("Y-m-d H:i:s");
$pult = mysql_query("SELECT `date`FROM `friendly_dates`WHERE `country` LIKE '$home_team_country' AND `date` > '$datenow' ORDER BY `date` ASC") or die(mysql_error());
if (mysql_num_rows($pult) > 0) {$totaltime = mysql_result($pult,0);}
else {echo $langmark1403; die (include 'index.php');}
$cfmatch = "INSERT INTO matches VALUES ('', $get_team, '', $opp_team, '', $my_arena, '$my_arena_name', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$totaltime', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$home_team_country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $default_season, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$cfresult = mysql_query($cfmatch);
$delchal = mysql_query("DELETE FROM friendly WHERE sent_user=$rightus1");
$delchal1 = mysql_query("DELETE FROM friendly WHERE sent_user=$userid");
$delchal2 = mysql_query("DELETE FROM friendly WHERE received_user=$rightus1");
$delchal3 = mysql_query("DELETE FROM friendly WHERE received_user=$userid");
$fmstatmus = mysql_query("UPDATE users SET friendly=1 WHERE userid=$userid LIMIT 1");
$fmstatus1 = mysql_query("UPDATE users SET friendly=1 WHERE userid=$rightus1 LIMIT 1");
header( 'Location: matches.php' );
}
else {header( 'Location: friendly.php' ); die();}
}
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2><?=$langmark178?></h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<?php
$rday = $_GET['rday'];
if ($rday=='neg') {
?>
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="100%" colspan="2">
<b><font color="darkred"><?=$langmark769?></font></b>
</td></tr>
<?php
}
?>
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="53%">
<?php
if ($isfrend==0){?>
<?php
$theteam = $_POST["theteam"];
$where = $_POST["where"];
if (!isset($_POST['submit1'])) {
echo $langmark179;?>
<br/><br/><?=$langmark180?><br/><br/>
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="margin: 0">
<h2><?=$langmark1402?></h2>
<b>TeamID:</b> <input type="text" size="7" name="theteam" maxlength="15" class="inputreg"><br/>
<b><?=$langmark181?>:</b> <select name="where" class="inputreg"><option value="1"><?=$langmark182?></option><option value="2"><?=$langmark183?></option></select><br/>
<input type="submit" value="<?=$langmark184?>" name="submit1" class="buttonreg">
</form>
<?php
} else {
if (!is_numeric($theteam)) {die("<b>".$langmark185." ".$langmark186."</b><br/><a href=\"friendly.php\">$langmark059</a></td></tr></table></td></tr></table>");}
if ($theteam == $get_team) {die("<b>".$langmark185." ".$langmark187."</b><br/><a href=\"friendly.php\">$langmark059</a></td></tr></table></td></tr></table>");}
$userfrend = mysql_query("SELECT userid FROM users WHERE club='$theteam'");
$verify7 = mysql_fetch_row($userfrend);
if (!$verify7){die("<b>".$langmark185." ".$langmark188."</b><br/><a href=\"friendly.php\">$langmark059</a></td></tr></table></td></tr></table>");}
$frendth = mysql_result($userfrend,0);
$nogam = mysql_query("SELECT friendly FROM users WHERE userid ='$frendth'");
$friendl2 = mysql_result($nogam,0);
if ($friendl2 != 0){
die ("<b>".$langmark189."</b><br/><a href=\"friendly.php\">$langmark059</a></td></tr></table>");
}
$setfch = mysql_query("INSERT INTO friendly VALUES ('', $userid, $frendth, $where);");
//$vest = mysql_query("INSERT INTO events VALUES ('', $theteam, NOW(), 'Received challenge.', 0, 0);");
echo "<font color=\"darkred\">".$langmark191."</font><br/><a href=\"friendly.php\">".$langmark192."</a></td></tr>"; die();
}
}
else {echo $langmark179,"<br/><br/><b>",$langmark193," ",$langmark194," <a href=\"matches.php\">",$langmark195,"</a> ",$langmark196,".</b>";}
?>
</td><td class="border" width="47%">

<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr><td colspan=\"2\"><h2><?=$langmark197?></h2></td></tr>
<?php
$result1 = mysql_query("SELECT * FROM friendly WHERE received_user ='$userid'");
$num=mysql_num_rows($result1);
$i=0;
while ($i < $num) {
$chall_id=mysql_result($result1,$i,"chall_id");
$sent_user=mysql_result($result1,$i,"sent_user");
$place=mysql_result($result1,$i,"place");

$s_team = mysql_query("SELECT club FROM users WHERE userid ='$sent_user'");
$sentis = mysql_result($s_team,0);
$se_team = mysql_query("SELECT name FROM teams WHERE teamid ='$sentis'");
$sent_is = mysql_result($se_team,0);
$sent_is = stripslashes($sent_is);

if ($place ==1) {
$s_arena = mysql_query("SELECT arenaname, country FROM arena, teams WHERE arena.teamid=teams.teamid AND arena.teamid ='$sentis' LIMIT 1");
$sarena = mysql_result($s_arena,0,"arenaname");
$sarena = stripslashes($sarena);
$sacun = mysql_result($s_arena,0,"country");
echo "<tr><td colspan=\"2\"><br/></td></tr><tr><td colspan=\"2\"><b>",$langmark198,":</b> <a href=\"club.php?clubid=".$sent_user."\">".$sent_is."</a></td></tr><tr><td><b>",$langmark181,":</b> <a href=\"cheerleaders.php?squad=".$sentis."\">".$sarena."</a></td><td align=\"right\"><img src=\"img/Flags/",$sacun,".png\" border=\"0\" alt=\"",$sacun,"\" title=\"",$sacun,"\"></td></tr><tr><td colspan=\"2\"><b>",$langmark199,":</b> <a href=\"friendly.php?id=",$chall_id,"&action=accept&ve=1\">",$langmark200,"</a> <a href=\"friendly.php?id=".$chall_id."&action=reject\">",$langmark201,"</a></td></tr>";
}
else {
$r_arena = mysql_query("SELECT arenaname, country FROM arena, teams WHERE arena.teamid=teams.teamid AND arena.teamid ='$get_team' LIMIT 1");
$rarena = mysql_result($r_arena,0,"arenaname");
$rarena = stripslashes($rarena);
$racun = mysql_result($r_arena,0,"country");
echo "<tr><td colspan=\"2\"><br/></td></tr><tr><td colspan=\"2\"><b>",$langmark198,":</b> <a href=\"club.php?clubid=".$sent_user."\">".$sent_is."</a></td></tr><tr><td><b>",$langmark181,":</b> <a href=cheerleaders.php?squad=".$get_team.">".$rarena."</a></td><td align=\"right\"><img src=\"img/Flags/",$racun,".png\" border=\"0\" alt=\"",$racun,"\" title=\"",$racun,"\"></td></tr><tr><td colspan=\"2\"><b>",$langmark199,":</b> <a href=\"friendly.php?id=".$chall_id."&action=accept&ve=2\">",$langmark200,"</a> <a href=\"friendly.php?id=".$chall_id."&action=reject\">",$langmark201,"</a></td></tr>";
}
$i++;
}
?>

<tr><td colspan=\"2\"><br/><h2><?=$langmark202?></h2></td></tr>
<?php
$result11 = mysql_query("SELECT * FROM friendly WHERE sent_user ='$userid'");
$num=mysql_num_rows($result11);
$j=0;
while ($j < $num) {
$chall_id=mysql_result($result11,$j,"chall_id");
$received_user=mysql_result($result11,$j,"received_user");
$place=mysql_result($result11,$j,"place");

$s_team1 = mysql_query("SELECT club FROM users WHERE userid ='$received_user'");
$sentis1 = mysql_result($s_team1,0);
$se_team1 = mysql_query("SELECT name FROM teams WHERE teamid ='$sentis1' LIMIT 1");
$sent_is1 = mysql_result($se_team1,0);
$sent_is1 = stripslashes($sent_is1);

if ($place == 1) {
$s_arena1 = mysql_query("SELECT arenaname, country FROM arena, teams WHERE arena.teamid=teams.teamid AND arena.teamid ='$get_team' LIMIT 1");
$sarena1 = mysql_result($s_arena1,0,"arenaname");
$sarena1 = stripslashes($sarena1);
$raakoo = mysql_result($s_arena1,0,"country");
echo "<tr><td colspan=\"2\"><br/></td></tr><tr><td colspan=\"2\"><b>",$langmark198,":</b> <a href=\"club.php?clubid=",$received_user,"\">",$sent_is1,"</a></td></tr><tr><td><b>",$langmark181,":</b> <a href=\"cheerleaders.php?squad=",$get_team,"\">",$sarena1,"</a></td><td align=\"right\"><img src=\"img/Flags/",$raakoo,".png\" border=\"0\" alt=\"",$raakoo,"\" title=\"",$raakoo,"\"></td></tr><tr><td colspan=\"2\"><a href=friendly.php?id=".$chall_id."&action=cancel>",$langmark203,"</a></td></tr>";
}
else {
$r_arena1 = mysql_query("SELECT arenaname, country FROM arena, teams WHERE arena.teamid=teams.teamid AND arena.teamid ='$sentis1' LIMIT 1");
$rarena1 = mysql_result($r_arena1,0,"arenaname");
$rarena1 = stripslashes($rarena1);
$saakoo = mysql_result($r_arena1,0,"country");
echo "<tr><td colspan=\"2\"><br/></td></tr><tr><td colspan=\"2\"><b>",$langmark198,":</b> <a href=\"club.php?clubid=",$received_user,"\">".$sent_is1."</a></td></tr><tr><td><b>",$langmark181,":</b> <a href=\"cheerleaders.php?squad=",$sentis1,"\">",$rarena1,"</a></td><td align=\"right\"><img src=\"img/Flags/",$saakoo,".png\" border=\"0\" alt=\"",$saakoo,"\" title=\"",$saakoo,"\"></td></tr><tr><td colspan=\"2\"><a href=\"friendly.php?id=",$chall_id,"&action=cancel\">",$langmark203,"</a></td></tr>";
}
$j++;
}
echo "</table>";


if ($userid==1) {
?>
</td></tr></table>
<br/><h2>FRIENDLY CUPS</h2>
<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr bgcolor="white" valign="top"><td width="63%" class="border" valign="top">

<!--
če sem v pokalu:
- prikaz pokala ki ga trenutno igram (na levi)
- seznam aktivnih pokalov (na desni)
- arhiv pokalov (link na desni)

če nisem v pokalu:
- seznam pokalov ki se igrajo (na desni) ob kliknu na določen pokal je na levi strani širši pregled tega pokala
- link za create cup naredim, ta ni dosegljiv če ima user že kreiran cup ali če ni supporter
- po kreaciji kupa le.ta viden na levi pri kreatorju namesto seznama tistih ki so na voljo
- s kreacijo kupa izbris vseh mojih prijav na ostale kupe

splošno:
- po kreaciji kupa redirect na prikaz tega cupa
- klikabilna razlaga pri obrazcu
-->

<?php
$kup = $_GET["cup"];
if ($kup=='create' AND $jeplas==1) {
?>
<h2>Create cup</h2><br/>

<table cellspacing="2" cellpadding="2" width="100%" border="0">
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="margin: 0">
<tr><td><b>Cup name</b></td><td align="right"><input type="text" maxlength="25" size="25" name="cupname" value="<?=stripslashes($cupnam)?>" class="inputreg">&nbsp;<img src="img/qm.gif" border="0" title="You can pick any name that is not offensive." alt="You can pick any name that is not offensive."></td></tr>
<tr><td><b>Time of matches</b></td><td align="right"><select name="time" class="inputreg"><option value="12">12:00</option><option value="20" selected>20:00</option></select>&nbsp;<img src="img/qm.gif" border="0" title="12:00 is prefered hour for Australasia, 20:00 is prefered hour for Europe and Americas." alt="12:00 is prefered hour for Australasia, 20:00 is prefered hour for Europe and Americas."></td></tr>
<tr><td><b>Award</b></td><td align="right"><select name="award" class="inputreg"><option value="0" <?php if($awar==0){echo "selected";}?>>No award</option><option value="1" <?php if($awar==1){echo "selected";}?>>1 month supporter</option><option value="3" <?php if($awar==3){echo "selected";}?>>3 months supporter</option><option value="6" <?php if($awar==6){echo "selected";}?>>6 months supporter</option><option value="12" <?php if($awar==12){echo "selected";}?>>1 year supporter</option></select>&nbsp;<img src="img/qm.gif" border="0" title="If you add an award to the cup, given amount of supporter is taken from your account. By adding award the cup can be started with less then 50% supporters participating in it. You can win back the award by winning the cup!" alt="If you add an award to the cup, given amount of supporter is taken from your account. By adding award the cup can be started with less then 50% supporters participating in it. You can win back the award by winning the cup!"></td></tr>
<tr><td colspan="2" align="right"><input type="submit" name="submitcc" value="Create cup now!" class="buttonreg">&nbsp;<img src="img/qm.gif" border="0" title="Cup can be canceled at any time before fixtures are created. In case of cancelation award is returned to cup creator." alt="Cup can be canceled at any time before fixtures are created. In case of cancelation award is returned to cup creator."></td></tr>
</form>
</table>

<?php }?>

</td><td width="37%" class="border" valign="top">
<?php
if ($kup=='create' AND $jeplas==1) {
?>
<h2>Awards</h2<br/>
Most obvious reson to add an award to your cup is to make it more exciting and award the winner. By adding an award, you also lower the limit of participants with supporter needed to start the cup. Amount of supporter given as an award is taken from your account. If you later cancel the cup, that same amount is returned to you. By winning the cup you also win back the award.</td></tr>
<?php
}
}
?>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>1