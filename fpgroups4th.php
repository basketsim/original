<?php
$expandmenu1=99;

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT lang, supporter, level FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)) {
$lang = mysql_result($compare,0,"lang");
$suppo = mysql_result($compare,0,"supporter");
$mus = mysql_result($compare,0,"level");
}
else {die(include 'basketsim.php');}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');

$act=$_GET["act"];
$oba=$_GET["oba"];
if ($mus > 1) {$suppo=1;}
?>

<div id="main">
<h2>FAIR PLAY CUP</h2>
<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="61%">

<?php if ($suppo==1 AND $act=='his') {?>

<h2>Best Group stage managers</h2><br/>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
<tr>
<td><b><span title="Placing">P</span></b></td>
<td><b>Manager name</b></td>
<td align="center"><b><span title="Won - Lost"><?=$langmark171?></span></b></td>
<td align="center"><b><span title="Points scored by the team">+</span></b></td>
<td align="center"><b><span title="Points scored against the team">-</span></b></td>
<td align="center"><b><span title="Point difference">+/-</span></b></td>
<td align="center"><b><span title="Win percentage">%</span></b></td>
</tr>
<tr><td colspan="7"><hr/></td></tr>
<?php
$query1 = mysql_query("SELECT users.userid AS id, country, username, sum(won) AS wins, sum(lost) AS losses, sum(scored) AS koshi, sum(against) AS prejeti, sum(difference) AS razlika FROM fpgroups, users WHERE users.userid=fpgroups.userid GROUP BY fpgroups.userid ORDER BY wins DESC, losses ASC, razlika DESC, koshi DESC");
while ($a = mysql_fetch_array($query1)) {
$id = $a['id'];
$cy = $a['country'];
$un = $a['username'];
$wi = $a['wins'];
$lo = $a['losses'];
$kz = $a['koshi'];
$kp = $a['prejeti'];
$df = $a['razlika'];
$sl=$sl+1;
if ($userid==$id) {?><tr bgcolor="#FFCC66"><?php } elseif ($sl<251){?><tr><?php }
if ($userid==$id OR $sl < 251) {
?>
<td><span title="Placing"><?=$sl?></span></td>
<td><img src="img/Flags/<?=$cy?>.png" title="<?=$cy?>" alt="<?=$cy?>">&nbsp;<a href="club.php?clubid=<?=$id?>"><?=stripslashes($un),"</a></td>";?>
<td align="center"><span title="Won - Lost"><?=$wi,"-",$lo?></span></td>
<td align="center"><span title="Points scored by the team"><?=$kz?></span></td>
<td align="center"><span title="Points scored against the team"><?=$kp?></span></td>
<td align="center"><span title="Point difference"><?=$df?></span></td>
<td align="center"><span title="Win percentage"><?=round(100*$wi/($wi+$lo+0.00001),1),"%"?></span></td>
</tr>
<?php
}
}
?>
</table>

<?php } elseif ($act=='top') {?>

<h2>Projected top seeds</h2><br/>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
<tr>
<td><b><span title="Team place">P</span></b></td>
<td><b><?=$langmark170?></b></td>
<td align="center"><b><span title="Won - Lost"><?=$langmark171?></span></b></td>
<td align="center"><b><span title="Points scored by the team">+</span></b></td>
<td align="center"><b><span title="Points scored against the team">-</span></b></td>
<td align="center"><b><span title="Point difference">+/-</span></b></td>
<td align="center"><b><span title="Group number and link">GRP</span></b></td>
</tr>
<tr><td colspan="7"><hr/></td></tr>
<?php
$query1 = mysql_query("SELECT `teamname`, `country`, `userid`, `won`, `lost`, `scored`, `against`, `difference`, `GROUP` FROM `fpgroups` WHERE `position` =1 AND `season` =$default_season ORDER BY won DESC, difference DESC, scored DESC");
while ($a = mysql_fetch_array($query1)) {
$tn = $a['teamname'];
$cy = $a['country'];
$ui = $a['userid'];
$wi = $a['won'];
$lo = $a['lost'];
$kz = $a['scored'];
$kp = $a['against'];
$df = $a['difference'];
$GR = $a['GROUP'];
$sl=$sl+1;
if ($userid==$ui) {?><tr bgcolor="#FFCC66"><?php }elseif($ui==$oba){?><tr bgcolor="lightblue"><?php }else{?><tr><?php }?>
<td><span title="Team place"><?=$sl?></span></td>
<td><img src="img/Flags/<?=$cy?>.png" title="<?=$cy?>" alt="<?=$cy?>">&nbsp;<a href="club.php?clubid=<?=$ui?>"><?=stripslashes($tn),"</a></td>";?>
<td align="center"><span title="Won - Lost"><?=$wi,"-",$lo?></span></td>
<td align="center"><span title="Points scored by the team"><?=$kz?></span></td>
<td align="center"><span title="Points scored against the team"><?=$kp?></span></td>
<td align="center"><span title="Point difference"><?=$df?></span></td>
<td align="right"><a href="fairplaycup.php?kgr=<?=$GR?>&season=<?=$default_season?>"><?=$GR?></a></td>
</tr>
<?php
}?>
</table>
<?php
 if (!$sl OR $sl==0) {echo "<br/><i>Table is unavailable.<br/>Most likely the Fair Play Cup hasn't started yet this season.</i>";}

}
else
{
?>

<h2>Best 3rd place teams</h2><br/>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
<tr>
<td><b><span title="Team place">P</span></b></td>
<td><b><?=$langmark170?></b></td>
<td align="center"><b><span title="Won - Lost"><?=$langmark171?></span></b></td>
<td align="center"><b><span title="Points scored by the team">+</span></b></td>
<td align="center"><b><span title="Points scored against the team">-</span></b></td>
<td align="center"><b><span title="Point difference">+/-</span></b></td>
<td align="center"><b><span title="Group number and link">GRP</span></b></td>
</tr>
<tr><td colspan="7"><hr/></td></tr>
<?php
$query1 = mysql_query("SELECT `teamname`, `country`, `userid`, `won`, `lost`, `scored`, `against`, `difference`, `GROUP` FROM `fpgroups` WHERE `position` =3 AND `season` =$default_season ORDER BY won DESC, difference DESC, scored DESC");
while ($a = mysql_fetch_array($query1)) {
$tn = $a['teamname'];
$cy = $a['country'];
$ui = $a['userid'];
$wi = $a['won'];
$lo = $a['lost'];
$kz = $a['scored'];
$kp = $a['against'];
$df = $a['difference'];
$GR = $a['GROUP'];
$sl=$sl+1;
if ($userid==$ui) {?><tr bgcolor="#FFCC66"><?php }elseif($ui==$oba){?><tr bgcolor="lightblue"><?php }else{?><tr><?php }?>
<td><span title="Team place"><?=$sl?></span></td>
<td><img src="img/Flags/<?=$cy?>.png" title="<?=$cy?>" alt="<?=$cy?>">&nbsp;<a href="club.php?clubid=<?=$ui?>"><?=stripslashes($tn),"</a></td>";?>
<td align="center"><span title="Won - Lost"><?=$wi,"-",$lo?></span></td>
<td align="center"><span title="Points scored by the team"><?=$kz?></span></td>
<td align="center"><span title="Points scored against the team"><?=$kp?></span></td>
<td align="center"><span title="Point difference"><?=$df?></span></td>
<td align="right"><a href="fairplaycup.php?kgr=<?=$GR?>&season=<?=$default_season?>"><?=$GR?></a></td>
</tr>
<?php
if ($sl==92) {echo "<tr><td colspan=\"7\"><hr/></td></tr>";}
}?>
</table>
<?php
 if (!$sl OR $sl==0) {echo "<br/><i>Table is unavailable.<br/>Most likely the Fair Play Cup hasn't started yet this season.</i>";}
}?>

</td><td class="border" width="39%">
<h2>Options</h2><br/>

<?php
if ($act=='top') {?><a href="fpgroups4th.php">Best 3rd placed teams</a><?php }
if ($act=='') {?><a href="fpgroups4th.php?act=top">Projected top seeds</a><?php }?>
<?php if ($suppo==1 AND $act<>'his') {?><br/><a href="fpgroups4th.php?act=his">Most successful managers</a><?php }
elseif ($suppo==1 AND $act=='his') {?><a href="fpgroups4th.php">Best 3rd placed teams</a><br/><a href="fpgroups4th.php?act=top">Projected top seeds</a><?php }?>

<?php
if ($suppo<>1) {echo "<hr/>";} else  {echo "<br/>";}
if ($act=='top'){?>

<b>Projected top seeds</b><br/>
<br/><i>Table on the left reveals best teams of this season FPC, the current group leaders. In elimination rounds, teams are seeded based on their group stage success.</i><br/>
<br/><a href="gamerules.php?action=international#fpc">Read more</a>.

<?php
} elseif ($act=='his') {?>

<b>All time best group-stage managers</b><br/>
<br/><i>Table on the left is based on group stage success only, so it should be read as an overview of all-time best managers in the history of Fair Play Cup group stage.</i>

<?php } else {?>

<b>Best 3rd placed teams</b><br/>
<br/><i>Top two teams from each group qualify for the elimination round. But since there are 512 places available, some best 3rd placed teams also qualify! To seperate 3rd placed teams, they are sorted by: wins, point difference, points scored.</i><br/>

<br/><a href="gamerules.php?action=international#fpc">Read more</a>.

<?php }?>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>