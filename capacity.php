<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$comparepasss = mysql_query("SELECT club, signed, lang, arenaname, curmoney, seats1, seats2, seats3, seats4, in_use FROM users, teams, arena WHERE arena.teamid=users.club AND teams.teamid=users.club AND teams.teamid=arena.teamid AND password='$koda' AND userid='$userid' LIMIT 1");
if (mysql_num_rows($comparepasss)<>1) {die(include 'basketsim.php');}
while($r=mysql_fetch_array($comparepasss)) {
$teamid=$r["club"];
$signed=$r["signed"];
$lang=$r["lang"];
$arenaname=$r["arenaname"];
$curmoney=$r["curmoney"];
$seats1=$r["seats1"];
$seats2=$r["seats2"];
$seats3=$r["seats3"];
$seats4=$r["seats4"];
$in_use=$r["in_use"];
}
$tdatetime = explode(" ",$signed);
$ffdate = $tdatetime[0];
$tdate = explode("-", $ffdate);
$ffyear = $tdate[0];

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id=main>
<h2><?=$langmark001?></h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="51%">
<table>
<tr>
<b><big><?=stripslashes($arenaname)?></big></b>
<td colspan="7"><hr/></td>
</tr><tr><td align="right" style='width:124;text-wrap:hard-wrap'><b><?=$langmark003?>:</b></td><td width="76" align="right"><?=$seats1?></td>
</tr><tr><td align="right" style='width:124;text-wrap:hard-wrap'><b><?=$langmark004?>:</b></td><td width="76" align="right"><?=$seats2?></td>
</tr><tr><td align="right" style='width:124;text-wrap:hard-wrap'><b><?=$langmark005?>:</b></td><td width="76" align="right"><?=$seats3?></td>
</tr><tr><td align="right" style='width:124;text-wrap:hard-wrap'><b><?=$langmark006?>:</b></td><td width="76" align="right"><?=$seats4?></td>
</tr><tr align="right"><td align="right" width="124"><hr><b><?=$langmark051?>:</b></td><td width="76" align="right"><hr/><?=($seats1+$seats2+$seats3+$seats4)?></td>
</tr></table>
<?php
if ($in_use < 100) {echo "<br/><i>",$langmark052,"&nbsp;",$in_use,"%.</i>";}
?>

<hr/>
<br/><br/>
</td><td class="border" width="49%">
<?php
$adds1 = $_POST["adds1"];
$adds2 = $_POST["adds2"];
$adds3 = $_POST["adds3"];
$adds4 = $_POST["adds4"];
if (!isset($_POST['submit'])) { 
?>
<h2><?=$langmark053?></h2><br/>
<?=$langmark054?><br/><br/>
<form method="post" action="<?=$PHP_SELF?>" style="margin: 0">
<table>
<tr><td><b><?=$langmark047?>:</b></td><td align="right"> <input type="text" size="6" maxlength="7" name="adds1" class="inputreg"></td></tr>
<tr><td><b><?=$langmark048?>:</b></td><td align="right"> <input type="text" size="6" maxlength="7" name="adds2" class="inputreg"></td></tr>
<tr><td><b><?=$langmark049?>:</b></td><td align="right"> <input type="text" size="6" maxlength="7" name="adds3" class="inputreg"></td></tr>
<tr><td><b><?=$langmark050?>:</b></td><td align="right"> <input type="text" size="6" maxlength="7" name="adds4" class="inputreg"></td></tr>
<tr><td colspan="2" align="right">
<input type="submit" value="<?=$langmark055?>" name="submit" class="buttonreg">
</td>
</tr>
</table>
</form>
<?php
} else {
//validacija

if (!$adds1) {$adds1 = 0;}
if (!$adds2) {$adds2 = 0;}
if (!$adds3) {$adds3 = 0;}
if (!$adds4) {$adds4 = 0;}

if (is_numeric($adds1) == FALSE) {$adds1 = 0;}
if (is_numeric($adds2) == FALSE) {$adds2 = 0;}
if (is_numeric($adds3) == FALSE) {$adds3 = 0;}
if (is_numeric($adds4) == FALSE) {$adds4 = 0;}

if ($seats1+$adds1 < 0) {die("<font color=\"red\"><b>".$langmark056."</b></font> ".$langmark057.".");}
if ($seats2+$adds2 < 0) {die("<font color=\"red\"><b>".$langmark056."</b></font> ".$langmark057.".");}
if ($seats3+$adds3 < 0) {die("<font color=\"red\"><b>".$langmark056."</b></font> ".$langmark057.".");}
if ($seats4+$adds4 < 0) {die("<font color=\"red\"><b>".$langmark056."</b></font> ".$langmark057.".");}

if ($in_use < 100) {die("<p><b>".$langmark058.".</b><br/><br/><a href=\"arena.php\">".$langmark059."</a></p></font></td></tr></table>");}

//ima uporabnik denar?
if ($curmoney < 0) {die("<p><b>".$langmark060.".</b><br/><br/><a href=\"arena.php\">".$langmark059."</a></p></font></td></tr></table>");}

if ($curmoney < 1200000 && ($adds1+$adds2+$adds3+$adds4 > 8000)) {die("<p><b>".$langmark061.".</b><br/><br/><a href=\"capacity.php\">".$langmark059."</a></p></font></td></tr></table>");}

//preveliko povecanje
if ($adds1+$adds2+$adds3+$adds4 > 15000) {die("<p><b>".$langmark061.".</b><br/><br/><a href=\"capacity.php\">".$langmark059."</a></p></font></td></tr></table>");}
?>
<table width="100%"><tr><td width="50%" valign="top">
<table>
<tr><b><?=$langmark413?>:</b></tr>
<tr><td><?=$langmark062?>: </td><td><?=$adds1?></td></tr>
<tr><td><?=$langmark063?>: </td><td><?=$adds2?></td></tr>
<tr><td><?=$langmark064?>: </td><td><?=$adds3?></td></tr>
<tr><td><?=$langmark065?>: </td><td><?=$adds4?></td></tr>
</table>

</td><td width="50%" valign="top">

<table>
<tr><b><?=$langmark066?>:</b></tr>
<tr><td><?=$langmark062?>: </td><td><?=$seats1+$adds1?></td></tr>
<tr><td><?=$langmark063?>: </td><td><?=$seats2+$adds2?></td></tr>
<tr><td><?=$langmark064?>: </td><td><?=$seats3+$adds3?></td></tr>
<tr><td><?=$langmark065?>: </td><td><?=$seats4+$adds4?></td></tr>
</table>
</td>
</tr>
</table>
<br/>
<?php
if ($seats3==0 AND $adds3<>0) {
$noofdays = round((abs($adds1)+abs($adds2)+abs($adds3)+abs($adds4))/300)+7;
?>

<table>
<tr>
<b><?=$langmark067?>:</b></tr>
<tr><td><?=$langmark068?>: </td><td align="right">165.000 &euro;</td></tr>
<tr><td><?=$langmark069?>: </td><td align="right"><?=number_format((abs($adds1)+abs($adds2)+abs($adds3))*125, 0, ',', '.')?> &euro;</td></tr>
<tr><td><?=$langmark065?>: </td><td align="right"><?=number_format(abs($adds4)*675, 0, ',', '.')?> &euro;</td></tr>
<tr><td><?=$langmark070?>: </td><td align="right">330.000 &euro;</td></tr>
<?php if ($ffyear>2009 && $seats3==0 && $adds3 > 999) {echo "<tr><td><font color=\"red\">Discount:</font> </td><td align=\"right\"><font color=\"red\">-&nbsp;300.000 &euro;
</font></td></tr>"; $diss=300000;} else {$diss=0;}?>
<tr><td><hr/><?=$langmark071?>: </td><td align="right"><hr/><?php echo number_format(((abs($adds1)+abs($adds2)+abs($adds3))*125)+(abs($adds4)*675)+495000-$diss, 0, ',', '.'); ?> &euro;</td></tr></table>

<br/><br/><i>(<?=$langmark072,"&nbsp;",$noofdays,"&nbsp;",$langmark073?>)</i>
<br/><br/>
<form action="confirmarena.php" method="post" style="margin: 0">
<input type="hidden" name="1stseat" value="<?=$adds1?>">
<input type="hidden" name="2ndseat" value="<?=$adds2?>">
<input type="hidden" name="3rdseat" value="<?=$adds3?>">
<input type="hidden" name="vipbox" value="<?=$adds4?>">
<input type="hidden" name="nofday" value="<?=$noofdays?>">
<input type="hidden" name="newlevel" value="<?php $costs=((abs($adds1)+abs($adds2)+abs($adds3))*125)+(abs($adds4)*675)+495000-$diss; echo $costs; ?>">
<input type="submit" value="<?=$langmark074?>" class="buttonreg">
</form>
<?php
}
else
{
$noofdays = round((abs($adds1)+abs($adds2)+abs($adds3)+abs($adds4))/300);
?>
<table>
<tr>
<b><?=$langmark067?>:</b></tr>
<tr><td><?=$langmark068?>: </td><td align="right">165.000 &euro;</td></tr>
<tr><td><?=$langmark069?>: </td><td align="right"><?=number_format((abs($adds1)+abs($adds2)+abs($adds3))*125, 0, ',', '.')?>  &euro;</td></tr>
<tr><td><?=$langmark065?>: </td><td align="right"><?=number_format(abs($adds4)*675, 0, ',', '.')?> &euro;</td></tr>
<tr><td><hr/><?=$langmark071?>: </td><td align="right"><hr/><?=number_format(((abs($adds1)+abs($adds2)+abs($adds3))*125)+(abs($adds4)*675)+165000, 0, ',', '.')?> &euro;</td></tr></table>
<br/><i>(<?=$langmark072,"&nbsp;",$noofdays,"&nbsp;",$langmark073?>)</i>
<br/><br/>
<form action="confirmarena.php" method="post" style="margin: 0">
<input type="hidden" name="1stseat" value="<?=$adds1?>">
<input type="hidden" name="2ndseat" value="<?=$adds2?>">
<input type="hidden" name="3rdseat" value="<?=$adds3?>">
<input type="hidden" name="vipbox" value="<?=$adds4?>">
<input type="hidden" name="nofday" value="<?=$noofdays?>">
<input type="hidden" name="newlevel" value="<?php $costs=((abs($adds1)+abs($adds2)+abs($adds3))*125)+(abs($adds4)*675)+165000; echo $costs;?>">
<input type="submit" value="<?=$langmark074?>" class="buttonreg">
</form>
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
</html>