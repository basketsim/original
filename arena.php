<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT club, lang, country, cheer_logo, arenaid, arenaname, seats1, seats2, seats3, seats4, in_use, upgrading, cheer_week, cheer_season, season_ideal FROM users, teams, arena WHERE users.club=teams.teamid AND teams.teamid=arena.teamid AND password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)) {
$arypas = mysql_fetch_array($compare);
$teamid = $arypas[club];
$lang = $arypas[lang];
$drzavnika = $arypas[country];
$userslogo = $arypas[cheer_logo];
$arenaid=$arypas[arenaid];
$arenaname=$arypas[arenaname];
$seats1=$arypas[seats1];
$seats2=$arypas[seats2];
$seats3=$arypas[seats3];
$seats4=$arypas[seats4];
$in_use=$arypas[in_use];
$upgrading =$arypas[upgrading];
$cheer_week=$arypas[cheer_week];
$cheer_season=$arypas[cheer_season];
$season_ideal=$arypas[season_ideal];
}
else {die(include 'basketsim.php');}
require("inc/lang/".$lang.".php");

//vlozek v navijacice
if (isset($_POST['submit_ch'])) { 
$vlozek = $_POST["vlozek"];
if ((is_numeric($vlozek)==FALSE) OR ($vlozek<0)){header('Location: arena.php?error=1');die();}
mysql_query("UPDATE arena SET cheer_week ='$vlozek' WHERE teamid ='$teamid' LIMIT 1") or die(mysql_error());
header ('Location: arena.php ');
}

//sprememba imena
$action=$_GET["action"];
if (isset($_POST['submit1'])) {
$nov_ime = $_POST["nov_ime"];
$nov_ime=strip_tags($nov_ime);
$nov_ime=addslashes($nov_ime);
mysql_query("UPDATE arena SET arenaname ='$nov_ime' WHERE arenaid ='$arenaid' LIMIT 1") or die(mysql_error());
mysql_query("UPDATE teams SET curmoney = curmoney-25000 WHERE teamid ='$teamid' LIMIT 1");
mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), '$langmark750 $nov_ime.', 0, -25000);");
header( 'Location: arena.php' );
}

include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2><?=$langmark001?></h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="63%">
<?php
$error = $_GET["error"];
if ($error==1) {echo "<b><font color=\"red\">",$langmark002,"</font></b><br/><br/>";}
?>
<b><big><?=stripslashes($arenaname)?></big></b><hr/>
<table>
<tr><td align="right" style='width:142;text-wrap:hard-wrap'><b><?=$langmark003?>:</b></td><td width="76" align="right"><?=$seats1?></td></tr>
<tr><td align="right" style='width:142;text-wrap:hard-wrap'><b><?=$langmark004?>:</b></td><td width="76" align="right"><?=$seats2?></td></tr>
<tr><td align="right" style='width:142;text-wrap:hard-wrap'><b><?=$langmark005?>:</b></td><td width="76" align="right"><?=$seats3?></td></tr>
<tr><td align="right" style='width:142;text-wrap:hard-wrap'><b><?=$langmark006?>:</b></td><td width="76" align="right"><?=$seats4?></td></tr>
<tr align="right"><td style='width:142;text-wrap:hard-wrap'><hr/></td><td width="76" height="5"><hr/></td></tr>
<tr align="right"><td align="right" style='width:142;text-wrap:hard-wrap'><b><?=$langmark007?>:</b></td><td width="76" align="right"><?=($seats1+$seats2+$seats3+$seats4)?></td></tr></table>
<?php
if ($in_use < 100) {echo "<br/><i>",$langmark008," ",$in_use,"%.</i>";
//prikaz datumov
$splitdatetime = explode(" ", $upgrading); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$disdate = date("d.m.Y", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));
echo "<br/><i>",$langmark009,"&nbsp;",$disdate,"</i>";
}
?>
<hr/>
<br/>
<?=$langmark010?>
<form method="post" action="<?=$PHP_SELF?>" style="margin: 0">
<table>
<tr><td><b><?=$langmark011?>:</b></td><td>
<input type="text" maxlength="5" size="5" name="vlozek" value="<?=$cheer_week?>" class="inputreg"></td>
<td><input type="submit" value="<?=$langmark012?>" name="submit_ch" class="buttonreg"></td>
</td></tr>
</table>
</form>
(<?=$langmark013?>)
</td><td class="border" width="37%">

<h2><?=$langmark014?></h2><br/>

<a href="capacity.php"><?=$langmark015?></a><br/>

<?php
if ($action=='changename'){
?>
<form method="post" action="<?=$PHP_SELF?>" style="margin: 0">
<table>
<tr><td><b><?=$langmark017?>:</b>&nbsp;<input type="text" maxlength="30" size="16" name="nov_ime" value="<?=stripslashes($arenaname)?>" class="inputreg"></td></tr>
<tr><td align="right"><input type="submit" value="<?=$langmark018?>" name="submit1" class="buttonreg"></td></tr>
<tr><td><i>(<?=$langmark019?>)</i></td></tr>
</table>
</form>
<?php } else {?>
<a href="arena.php?action=changename"><?=$langmark016?></a><br/>
<?php }?>

<br/><h2><table border="0" width="100%" cellspacing="0" cellpadding="0"><tr><td><?=$langmark020?></td><td align="right"><a href="newlogo.php" title="Set cheerleaders picture!">^</a>&nbsp;</td></tr></table></h2><br/>
<b><?=$langmark021?>:</b> <?=number_format($cheer_week, 0, ',', '.')?> &euro;<br/>
<b><?=$langmark022?>:</b> <?=number_format($cheer_season, 0, ',', '.')?> &euro;<br/>
<?php
if ($cheer_season == $season_ideal AND $season_ideal<>0) {$rratio=100;}
elseif ($cheer_season == $season_ideal AND $season_ideal == 0) {$rratio=60;}
else {$rratio = 100-((abs($cheer_season-$season_ideal))*100/($season_ideal+0.01));}

if ($rratio < 29) {$rratiodspl = $langmark023; }
elseif ($rratio > 28 AND $rratio < 45) {$rratiodspl = $langmark024; }
elseif ($rratio > 44 AND $rratio < 59) {$rratiodspl = $langmark025; }
elseif ($rratio > 58 AND $rratio < 71) {$rratiodspl = $langmark026; }
elseif ($rratio > 70 AND $rratio < 81) {$rratiodspl = $langmark027; }
elseif ($rratio > 80 AND $rratio < 89) {$rratiodspl = $langmark028; }
elseif ($rratio > 88 AND $rratio < 95) {$rratiodspl = $langmark029; }
else $rratiodspl = $langmark030;
?>
<b><?=$langmark031?>: </b><?=$rratiodspl?>
<?php
if ($season_ideal==0) {$krunaglu=56;}
elseif (($season_ideal - $cheer_season > 3000) AND $rratio <94) {echo "<br/><b>Tip: </b>Girls need more money!";} 
elseif (($season_ideal - $cheer_season < -3000) AND $rratio <94) {echo "<br/><b>Tip: </b>Girls are getting spoiled!";}
else {echo "<br/><b>Tip: </b>Girls seem to love you!";}

if ($action=='more') {
$limit =50;
?>
<br/><br/><h2><?=$langmark1401?></h2>&nbsp;<a href="arena.php" class="greenhilite">[-]</a>&nbsp;<a href="arena.php?action=pics" class="greenhilite">[P]</a><br/>
<?php
} else {
$limit =10;
?>
<br/><br/><h2><?=$langmark032?></h2>

<?php
if ($userslogo=='' || $userslogo=='http://') {echo "<font color=\"darkred\"><i>You don't have cheerleaders picture set up yet! You can set it <a href=\"newlogo.php\">here</a>.</i></font><br/>";}
?>

&nbsp;<a href="arena.php?action=more" class="greenhilite">[+]</a>
<?php
if ($action=='pics') {
?>
<a href="arena.php" class="greenhilite">[P]</a><br/>
<?php
} else {
?>
<a href="arena.php?action=pics" class="greenhilite">[P]</a><br/>
<?php
}
}

$advorder = mysql_query("SELECT teams.teamid, cheer_logo, name FROM arena, teams WHERE teams.teamid = arena.teamid AND status=1 AND cheer_logo<>'' AND cheer_logo<>'http://' AND cheer_season<>0 AND season_ideal > 0 AND country='$drzavnika' ORDER BY 100-((abs(cheer_season-season_ideal))*100/(season_ideal+0.01)) DESC LIMIT $limit") or die(mysql_error());

$num=mysql_num_rows($advorder);
$i=0;
while ($i < $num) {
$teamid=mysql_result($advorder,$i,"teams.teamid");
$tteamnm=mysql_result($advorder,$i,"name");

echo ($i+1),". <a href=\"cheerleaders.php?squad=",$teamid,"\">",stripslashes($tteamnm),"</a><br/>";

if ($action=='pics') {
?>
<a href="cheerleaders.php?squad=<?=$teamid?>"><img src="<?=mysql_result($advorder,$i,"cheer_logo")?>" alt="<?=stripslashes($tteamnm)?>" title="<?=stripslashes($tteamnm)?>" width="150" border="0"></a><br/>
<?php
}
$i++;
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