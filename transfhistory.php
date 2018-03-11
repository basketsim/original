<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT club, supporter, lang, level FROM users WHERE password ='$geslo' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)){
$trueclub = mysql_result($compare,0,"club");
$is_supporter = mysql_result($compare,0,"supporter");
$lang = mysql_result($compare,0,"lang");
$gm = mysql_result($compare,0,"level");
}
else {die(include 'basketsim.php');}

$clubclub=$_GET['clubid'];
if (!is_numeric($clubclub) || $clubclub==0) {$clubclub = $userid;}

$result = mysql_query("SELECT userid, club, supporter, level FROM users WHERE userid ='$clubclub' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($result)) {
$dodpreu = mysql_result($result,0,"userid");
$get_team = mysql_result($result,0,"club");
$huhsupporter = mysql_result($result,0,"supporter");
$gmlev = mysql_result($result,0,"level");
}
else {die (include 'index.php');}

$result = mysql_query("SELECT teamid, name, status, shirt FROM teams WHERE teamid ='$get_team' LIMIT 1") or die(mysql_error());
$teamid=mysql_result($result,0,"teamid");
$name=mysql_result($result,0,"name");
$status=mysql_result($result,0,"status");
$shirt=mysql_result($result,0,"shirt");
if ($huhsupporter==0 AND $gmlev < 2) {$shirt='white';}

$zaheader = stripslashes($name);

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2><?=stripslashes($name)?> >> <?=$langmark466?></h2>

<?php
$action = $_GET["action"];
//bookmark
if ($action =='bookmark') {
$already = mysql_query("SELECT * FROM bookmarks WHERE b_type =2 AND team ='$trueclub' AND b_link ='$clubclub' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($already) > 0) {echo "<table cellpadding=\"9\" cellspacing=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">",$langmark473," ",$langmark094," <a href=\"bookmarks.php\">",$langmark095,"</a>.</td></tr></table>";
}
else
{
mysql_query("INSERT INTO bookmarks VALUES ('', $trueclub, '$name', $clubclub, 2, 1);") or die(mysql_error());
echo "<table cellpadding=\"9\" cellspacing=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">",$langmark474," ",$langmark094," <a href=\"bookmarks.php\">",$langmark095,"</a>.</td></tr></table>";
}
}
?>

<table border="0" cellpadding="9" cellspacing="9" width="100%">
<tr bgcolor="#ffffff">
<td class="border">

<table><tr><td width="45">
<img src="img/shirts/<?=$shirt?>.gif" alt="" border="0" height="52" width="42"></td>
<td><h3><?=stripslashes($name)?>
<?php if($is_supporter==1){echo "&nbsp;<a href=\"transfhistory.php?clubid=",$clubclub,"&action=bookmark\"><img src=\"img/bookmark.jpg\" border=\"0\" alt=\"",$langmark477."\" title=\"".$langmark477,"\"></a>";}?>
</h3></td></tr></table>
<hr/>

<?php
ob_start();

$soar=$_GET['sort'];
if (!$soar) {$soar='late';}
if ($soar<>'in' AND $soar<>'out' AND $soar<>'earl') {$soar='late';}
SWITCH ($soar) {
CASE 'in': $result65 = mysql_query("SELECT `playerid` , `playerclub` , `sellingid` , `price` , `timeofsale` , `currentbid` , `bidingteam` , `bidingname` FROM `transfers` WHERE sellingid <> bidingteam AND `currentbid` > 1 AND `trstatus`=0 AND `sellingid`='$clubclub' UNION SELECT `playerid` , `playerclub` , `sellingid` , `price` , `timeofsale` , `currentbid` , `bidingteam` , `bidingname` FROM `transfers` WHERE sellingid <> bidingteam AND  `currentbid` > 1 AND `trstatus`=0 AND `bidingteam`='$clubclub' ORDER BY `currentbid` DESC") or die(mysql_error()); break;
CASE 'out': $result65 = mysql_query("SELECT `playerid` , `playerclub` , `sellingid` , `price` , `timeofsale` , `currentbid` , `bidingteam` , `bidingname` FROM `transfers` WHERE sellingid <> bidingteam AND `currentbid` > 1 AND `trstatus`=0 AND `sellingid`='$clubclub' UNION SELECT `playerid` , `playerclub` , `sellingid` , `price` , `timeofsale` , `currentbid` , `bidingteam` , `bidingname` FROM `transfers` WHERE sellingid <> bidingteam AND  `currentbid` > 1 AND `trstatus`=0 AND `bidingteam`='$clubclub' ORDER BY `currentbid` ASC") or die(mysql_error()); break;
CASE 'earl': $result65 = mysql_query("SELECT `playerid` , `playerclub` , `sellingid` , `price` , `timeofsale` , `currentbid` , `bidingteam` , `bidingname` FROM `transfers` WHERE sellingid <> bidingteam AND `currentbid` > 1 AND `trstatus`=0 AND `sellingid`='$clubclub' UNION SELECT `playerid` , `playerclub` , `sellingid` , `price` , `timeofsale` , `currentbid` , `bidingteam` , `bidingname` FROM `transfers` WHERE sellingid <> bidingteam AND  `currentbid` > 1 AND `trstatus`=0 AND `bidingteam`='$clubclub' ORDER BY `timeofsale` ASC") or die(mysql_error()); break;
CASE 'late': $result65 = mysql_query("SELECT `playerid` , `playerclub` , `sellingid` , `price` , `timeofsale` , `currentbid` , `bidingteam` , `bidingname` FROM `transfers` WHERE sellingid <> bidingteam AND `currentbid` > 1 AND `trstatus`=0 AND `sellingid`='$clubclub' UNION SELECT `playerid` , `playerclub` , `sellingid` , `price` , `timeofsale` , `currentbid` , `bidingteam` , `bidingname` FROM `transfers` WHERE sellingid <> bidingteam AND  `currentbid` > 1 AND `trstatus`=0 AND `bidingteam`='$clubclub' ORDER BY `timeofsale` DESC") or die(mysql_error()); break;
}
$bum=mysql_num_rows($result65);
?>

<b><table border="0" cellspacing="0" cellpadding="1" width="100%"><tr>
<?php if ($page >0) {?><td width="50"><a href="transfhistory.php?clubid=<?=$clubclub?>&sort=late"><?=$langmark756?></a></td><?php } elseif (($sort=='late' OR $soar=='late') AND $sort<>'earl') {?><td width="50"><a href="transfhistory.php?clubid=<?=$clubclub?>&sort=earl"><?=$langmark756?></a></td><?php } elseif ($sort=='earl') {?>
<td width="50"><a href="transfhistory.php?clubid=<?=$clubclub?>&sort=late"><?=$langmark756?></a></td><?php } else {?>
<td width="50"><a href="transfhistory.php?clubid=<?=$clubclub?>&sort=late"><?=$langmark756?></a></td><?php }?>
<td width="150"><?=$langmark404?></td>
<td width="200"><?=$langmark1065?>/<?=$langmark1066?></td>
<?php if ($sort=='in' AND !$page) {?><td width="70" align="right"><a href="transfhistory.php?clubid=<?=$clubclub?>&sort=out"><?=$langmark924?></a></td><?php } elseif ($sort=='out') {?><td width="70" align="right"><a href="transfhistory.php?clubid=<?=$clubclub?>&sort=in"><?=$langmark924?></a></td>
<?php } else {?><td width="70" align="right"><a href="transfhistory.php?clubid=<?=$clubclub?>&sort=in"><?=$langmark924?></a></td><?php }?>
</tr></table><hr/></b>

<?php
$v=0;
$perpage = 25; //vnosov na strani
$pages = ceil($bum/$perpage); //skupaj delimo z per page da dobimo st strani
$sel_page=$_GET['page']; //preko GET dobimo st strani
if ($sel_page == 0) {$sel_page = 1;} //ce ni GET-a potem je to stran 1
if ($sel_page > $pages) {$sel_page = $pages;} //ce je get vecji kot kolikor je strani potem selectamo zadnjo stran
$vmin = ($sel_page - 1) * $perpage; //spodnja meja ki nam pove s katerimo vnosom zacnemo
$vmax = ($sel_page * $perpage) - 1; //zgornja meja torej zadnji vnos ki ga vidimo

while ($v < $bum) {
$playerid=mysql_result($result65,$v,"playerid");
$playerclub=mysql_result($result65,$v,"playerclub");
$sellingid=mysql_result($result65,$v,"sellingid");
$price1=mysql_result($result65,$v,"price");
$timeofsale=mysql_result($result65,$v,"timeofsale");
$currentbid=mysql_result($result65,$v,"currentbid");
$bidingteam=mysql_result($result65,$v,"bidingteam");
$bidingname=mysql_result($result65,$v,"bidingname");

$pricedisplay = number_format($currentbid, 0, ',', '.');

$splitdatetime = explode(" ", $timeofsale); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$datedisplay = date("d.m.y", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));

$result66 = mysql_query("SELECT name, surname FROM players WHERE id =$playerid LIMIT 1");
if (mysql_num_rows($result66)>0){
$tname=mysql_result($result66,0,"name");
$tsurname=mysql_result($result66,0,"surname");
$taigralec = "<a href=\"player.php?playerid=".$playerid."\">".$tname." ".$tsurname."</a>";
}
else {$taigralec="(".$langmark759.")";}

if ($v >= $vmin AND $v <= $vmax) { //pregledamo ce $m ustreza mejam
//izpis
$dlaka='white';
if ($bidingteam==$dodpreu) {?>

<table border="0" cellspacing="0" cellpadding="1" width="100%">
<tr>
<td width="50"><?=$datedisplay?></td>
<td width="150"><?=$taigralec?></td>
<td width="200"><img src="img/arL.gif" height="12" border="0" alt="in" title="Player was purchased">&nbsp<a href="club.php?clubid=<?=$sellingid?>"><?=$playerclub?></a></td>
<td width="70" align="right"><font color="darkred"><?=$pricedisplay?></font></td>
</tr>
<?php if ($gm==3 AND $price1 > $currentbid) {?><tr><td colspan="5"><font color="darkred"><b>GM INFO ONLY: above transfer was adjusted from <?=number_format($price1, 0, ',', '.')?> to <?=$pricedisplay?>.</b></font></td></tr><?php }?>

<?php } elseif ($sellingid==$dodpreu) {?>

<table border="0" cellspacing="0" cellpadding="1" width="100%">
<tr>
<td width="50"><?=$datedisplay?></td>
<td width="150"><?=$taigralec?></td>
<td width="200"><img src="img/arR.gif" height="12" border="0" alt="in" title="Player was sold">&nbsp<a href="club.php?clubid=<?=$bidingteam?>"><?=$bidingname?></a></td>
<td width="70" align="right"><font color="darkgreen"><?=$pricedisplay?></font></td>
</tr>
<?php if ($gm==3 AND $price1 > $currentbid) {?><tr><td colspan="5"><font color="darkred"><b>GM INFO ONLY: above transfer was adjusted from <?=number_format($price1, 0, ',', '.')?> to <?=$pricedisplay?>.</b></font></td></tr><?php }?>

<?php
}
echo "</table>";
}

if ($sellingid == $clubclub) {$totalsold = $totalsold + $currentbid; $nos = $nos + 1;}
if ($bidingteam == $clubclub) {$totalbought = $totalbought + $currentbid; $nob = $nob + 1;}

$v++;
} //konec while zajema in izpisa transferov


//PRIKAZ STRANI
if ($pages < 2) { //manj kot 2 strani torej ne prikazemo linkov
//linkov ni
}else{
//prikaz linkov
echo "<hr/><center>";
for ($i = 1; $i <= $pages; $i++) {
if ($i == $sel_page) { //smo na izbrani strani
echo " <b>",$langmark1119,"&nbsp;$i</b>&nbsp;";
}else{
echo " <a href=\"transfhistory.php?clubid=",$clubclub,"&page=",$i,"&sort=",$soar,"\">",$langmark1119,"&nbsp;$i</a>&nbsp;";
}
}
echo "</center>";
}
//konec prikaza strani

if ($nos == '') {$nos = 0;}
if ($nob == '') {$nob = 0;}

if ($action=='more') {
ob_end_clean();
?>
<table border="0" cellspacing="0" cellpadding="1">
<tr><td width="155"><?=$langmark1121?></td> <td align="right"><?=$nos?></td></tr>
<tr><td><?=$langmark1122?></td> <td align="right"><?=number_format($totalsold, 0, ',', '.')?></td></tr>
<tr><td><?=$langmark1123?></td> <td align="right"><?php if ($nos==0) {echo "0";} else {echo number_format($totalsold/$nos, 0, ',', '.');} ?></td></tr>
<tr><td><?=$langmark1124?></td> <td align="right"><?=$nob?></td></tr>
<tr><td><?=$langmark1125?></td> <td align="right"><?=number_format($totalbought, 0, ',', '.')?></td></tr>
<tr><td><?=$langmark1126?></td> <td align="right"><?php if ($nob==0) {echo "0";} else {echo number_format($totalbought/$nob, 0, ',', '.');} ?></td></tr>
<tr><td><?=$langmark1127?></td> <td align="right"><?=number_format($totalsold-$totalbought, 0, ',', '.')?></td></tr>

<?php
if ($is_supporter>0 OR $gm>1) {
$jagab = mysql_query("SELECT playerid FROM transfers WHERE playerclub = 'Youth Camp' AND bidingteam =$clubclub");
$raa=mysql_num_rows($jagab);
$skupv=0; $topv=0;
while ($lu=mysql_fetch_array($jagab)) {
$soldYC=$lu[playerid];
$dod = mysql_query("SELECT currentbid FROM transfers WHERE sellingid<>bidingteam AND currentbid >999 AND sellingid=$clubclub AND playerid=$soldYC ORDER BY transferid ASC LIMIT 1");
$dod122=$topv; $dod123=0;
$dod123 = @mysql_result($dod,0);
if (!$dod123) {$dod123=0;}
if ($dod123 > $dod122) {$topv=$dod123; $Rplayer=$soldYC;}
$skupv = $skupv + $dod123;
}
?>
<tr><td colspan="2"><br/></td></tr>
<tr><td width="155">Camp players recruited:</td> <td align="right"><?=$raa?></td></tr>
<tr><td><?=$langmark1122?></td> <td align="right"><?=number_format($skupv, 0, ',', '.')?></td></tr>
<tr><td><?=$langmark1123?></td> <td align="right"><?php if ($raa==0) {echo "0";} else {echo number_format($skupv/$raa, 0, ',', '.');} ?></td></tr>
<?php if($topv>0 AND $is_supporter==1) {?><tr><td>Biggest amount received:</td> <td align="right"><a href="transferhistory.php?playerid=<?=$Rplayer?>"><?=number_format($topv, 0, ',', '.')?></a></td></tr>
<?php
}
elseif ($topv>0 AND $is_supporter==0 AND $gm>1) {?><tr><td>Biggest amount received:</td> <td align="right"><?=number_format($topv, 0, ',', '.')?></td></tr>
<?php
}
}
?>
</table>
<br/>[<a href="transfhistory.php?clubid=<?=$clubclub?>"><?=$langmark132?></a>]
<?php } else {?>
<br/>
[<a href="transfhistory.php?clubid=<?=$clubclub?>&action=more"><?=$langmark1120?></a>]&nbsp;[<a href="club.php?clubid=<?=$clubclub?>"><?=$langmark491?></a>]
<?php }?>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>