<?php
$stseat = $_POST['1stseat'];
$ndseat = $_POST['2ndseat'];
$rdseat = $_POST['3rdseat'];
$vipboxs = $_POST['vipbox'];
$noofday = $_POST['nofday'];
$nwlevel = $_POST['newlevel'];
if (!is_numeric($stseat)){die(include 'index.php');}
if (!is_numeric($ndseat)){die(include 'index.php');}
if (!is_numeric($rdseat)){die(include 'index.php');}
if (!is_numeric($vipbox)){die(include 'index.php');}
if (!is_numeric($noofday)){die(include 'index.php');}
if (!is_numeric($nwlevel)){die(include 'index.php');}
if ($noofday<0){die(include 'index.php');}
if ($nwlevel<0){die(include 'index.php');}

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT password, club, lang, arenaname, seats1, seats2, seats3, seats4, in_use FROM users, arena WHERE arena.teamid=users.club AND password ='$koda' AND userid ='$userid' LIMIT 1");
if (mysql_num_rows($compare)<>1) {die(include 'basketsim.php');}
while($r=mysql_fetch_array($compare)) {
$get_team=$r["club"];
$lang=$r["lang"];
$arenaname=$r["arenaname"];
$seats1=$r["seats1"];
$seats2=$r["seats2"];
$seats3=$r["seats3"];
$seats4=$r["seats4"];
$in_use=$r["in_use"];
}
if ($in_use < 100) {die(include 'index.php');}

require("inc/lang/".$lang.".php");
require_once('inc/header.php');
require_once('inc/osnova.php');
?>

<div id="main">
<h2><?=$langmark001?></h2>
<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="51%">
<table>
<tr>
<b><big><?=$arenaname?></big></b>
<hr>
</tr><tr><td align="right" style='width:124;text-wrap:hard-wrap'><b><?=$langmark047?>:</b></td><td width="76" align="right"><?=$seats1?></td>
</tr><tr><td align="right" style='width:124;text-wrap:hard-wrap'><b><?=$langmark048?>:</b></td><td width="76" align="right"><?=$seats2?></td>
</tr><tr><td align="right" style='width:124;text-wrap:hard-wrap'><b><?=$langmark049?>:</b></td><td width="76" align="right"><?=$seats3?></td>
</tr><tr><td align="right" style='width:124;text-wrap:hard-wrap'><b><?=$langmark050?>:</b></td><td width="76" align="right"><?=$seats4?></td>
</tr><tr align="right"><td align="right" style='width:124;text-wrap:hard-wrap'><hr/><b><?=$langmark051?>:</b></td><td align="right" style='width:76;text-wrap:hard-wrap'><hr/><?=($seats1+$seats2+$seats3+$seats4)?></td>
</tr>
</table>
<hr/>
<br/><br/>
</td><td class="border" width="49%">
<?php
if (($seats1+$seats2+$seats3+$seats4) <= ($seats1+$seats2+$seats3+$seats4+$stseat+$ndseat+$rdseat+$vipboxs)) {$upgperc=round((($seats1+$seats2+$seats3+$seats4)/($seats1+$seats2+$seats3+$seats4+$stseat+$ndseat+$rdseat+$vipboxs))*100 - (15/2));} else {$upgperc=90;}

$enddate = mktime(0,0,0,date("m"),date("d")+$noofday,date("Y"));
$endate = date("Y-m-d", $enddate);
$displayd = date("d.m.Y", $enddate);

mysql_query("UPDATE arena SET seats1=seats1+$stseat, seats2=seats2+$ndseat, seats3=seats3+$rdseat, seats4=seats4+$vipboxs, in_use=$upgperc, upgrading='$endate' WHERE teamid='$get_team' LIMIT 1") or die(mysql_error());
mysql_query("UPDATE teams SET curmoney=curmoney-$nwlevel WHERE teamid='$get_team' LIMIT 1") or die(mysql_error());
$nwleveldspl = number_format($nwlevel, 0, ',', '.');
mysql_query("INSERT INTO events VALUES ('', $get_team, NOW(), '$nwleveldspl &euro; $langmark142 <a href=cheerleaders.php?squad=$get_team>$langmark143</a> $langmark144.', 1, -$nwlevel);");
echo "<br/><font color=\"darkred\"><b>",$langmark145,". ",$langmark146," ",$displayd," ",$langmark147,".</b></font><br/><br/><a href=\"arena.php\">",$langmark059,"</a><br/>";
?>
</td>
</tr>
</table>
<img src="img/bbs.jpg" alt="" border="0">
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>