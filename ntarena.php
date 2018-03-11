<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$comparepasss = mysql_query("SELECT username, club, lang, natcoach, nt_country FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($comparepasss)==1) {
$username = mysql_result ($comparepasss,0,"username");
$trueclub = mysql_result ($comparepasss,0,"club");
$lang = mysql_result ($comparepasss,0,"lang"); 
$natcoach = mysql_result ($comparepasss,0,"natcoach");
$nt_country = mysql_result ($comparepasss,0,"nt_country");
}
else {die(include 'basketsim.php');}
if ($natcoach==0) {die(include 'basketsim.php');}

require("inc/lang/".$lang.".php");

if (isset($_POST['submitboom']) && $natcoach==1){
$ndarena = $_POST["ndarena"];
mysql_query("UPDATE `countries` SET natarena=$ndarena WHERE `country`='$nt_country' LIMIT 1");
mysql_query("UPDATE `nt_matches` SET  `arena_id`=$ndarena WHERE `type`=1 AND `crowd1`=0 AND `home_name`='$nt_country'");
$pinko=4;
}

if (isset($_POST['submitboom']) && $natcoach==2){
$ndarena = $_POST["ndarena"];
mysql_query("UPDATE `u18countries` SET natarena=$ndarena WHERE `country`='$nt_country' LIMIT 1");
mysql_query("UPDATE `nt_matches` SET  `arena_id`=$ndarena WHERE `type`=11 AND `crowd1`=0 AND `home_name`='$nt_country'");
$pinko=4;
}

if ($natcoach==1) {$kuha = mysql_query("SELECT `natarena` FROM `countries` WHERE `country`='$nt_country' LIMIT 1") or die(mysql_error());}
if ($natcoach==2) {$kuha = mysql_query("SELECT `natarena` FROM `u18countries` WHERE `country`='$nt_country' LIMIT 1") or die(mysql_error());}
$natarena = mysql_result($kuha,0);

include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2><?=$langmark1545?></h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="100%">
<?=$langmark1546?> <b><?=$username?></b>!<br/>
<?=$langmark1547?> <b><?=$nt_country?><?php if ($natcoach==2){echo " U19";}?></b>.<br/>
<br/><?=$langmark1548?><br/><br/>
<form method="post" action="<?=$PHP_SELF?>" style="margin: 0">
<?php
if ($nt_country=='Bosnia and Herzegovina') {$country='Bosnia';} else {$country=$nt_country;}
$arenula = mysql_query("SELECT teams.teamid AS ida, arena.arenaname as dovolj2 FROM arena, teams WHERE arena.teamid = teams.teamid AND arena.in_use =100 AND teams.status =1 AND teams.country = '$country' ORDER BY (seats1+seats2+seats3+seats4) DESC LIMIT 10") or die(mysql_error());
$krum=0;
echo "<select name=\"ndarena\" class=\"inputreg\">";
while ($krum < mysql_num_rows($arenula)) {
$pravid = mysql_result($arenula,$krum,"ida");
?>
<option value="<?=$pravid?>" <?php if($pravid==$natarena){echo "selected";}?>><?=mysql_result($arenula,$krum,"dovolj2")?></option>
<?php
$krum++;
}
?>
</select>
<input type="submit" value="<?=$langmark012?>" name="submitboom" class="buttonreg">
</form>
<?php
if ($pinko==4) {echo "<br/><font color=\"darkgreen\"><?=$langmark1549?></font>";}
?>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>