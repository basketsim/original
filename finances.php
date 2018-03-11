<?php
$expandmenu1=342;

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$getuser=mysql_query("SELECT club, lang, curmoney, campinvest, tempmoney, fans, cheer_week FROM users, teams, arena WHERE users.club=teams.teamid AND teams.teamid=arena.teamid AND password='$koda' AND userid='$userid' LIMIT 1");
if (mysql_num_rows($getuser)) {
$get_team = mysql_result ($getuser,0,"club");
$lang = mysql_result ($getuser,0,"lang");
$moneystate = mysql_result($getuser,0,"curmoney");
$moneyforcamp = mysql_result($getuser,0,"campinvest");
$tempmoney = mysql_result($getuser,0,"tempmoney");
$nooffans = mysql_result($getuser,0,"fans");
$moneyforcheer = mysql_result($getuser,0,"cheer_week");
}
else {die(include 'basketsim.php');}

$monstdispl = number_format($moneystate, 0, ',', '.');
if ($moneystate >= 0) {
$bankinterest = round($moneystate*0.1/100);
$interestdspl = number_format($bankinterest, 0, ',', '.');
$loandspl = 0;
}
else {
$interestdspl = 0;
$bankloan = round(abs($moneystate)*1/100);
$loandspl = number_format($bankloan, 0, ',', '.');
}
$sponsors = round(sqrt($nooffans)*7000);

if ($action=='refresh') {
$fouls = mysql_query("SELECT SUM(currentbid) FROM `transfers` WHERE `trstatus` ='1' AND `sellingid` ='$userid'") or die(mysql_error());
list($sum_fouls) = mysql_fetch_row($fouls);
$fouls1 = mysql_query("SELECT SUM(currentbid) FROM `transfers` WHERE `trstatus` ='1' AND `bidingteam` ='$userid'") or die(mysql_error());
list($sum_fouls1) = mysql_fetch_row($fouls1);
if (!$sum_fouls) {$sum_fouls=0;}
if (!$sum_fouls1) {$sum_fouls1=0;}
mysql_query("UPDATE `teams` SET `tempmoney`='$sum_fouls'-'$sum_fouls1' WHERE `teamid` ='$get_team' LIMIT 1") or die(mysql_error());
}

$salaries = mysql_query("SELECT SUM(wage) FROM `players` WHERE `club` ='$get_team' LIMIT 1") or die(mysql_error());
list($sum) = mysql_fetch_row($salaries);

$intden=0;
$laa = mysql_query("SELECT competition FROM ekipe WHERE competition<>3 AND ekipa=$get_team");
if (mysql_num_rows($laa)) {
$ty4 = mysql_result($laa,0, "competition");
if ($ty4==1) {$intden=50000;} else {$intden=40000;}
$drava = mysql_query("SELECT crowd4, home_score, away_score FROM matches WHERE home_score >0 AND (type=6 OR type=7) AND home_id=$get_team ORDER BY matchid DESC LIMIT 1") or die(mysql_error());
while ($mc = mysql_fetch_array($drava)) {
$cr4 = $mc[crowd4];
$hs4 = $mc[home_score];
$as4 = $mc[away_score];
$intden= $intden + $cr4 * 40;
if ($hs4 > $as4) {$intden=$intden+20000;}
}
$cjuf=4;
}

$qwa = mysql_query("SELECT totalmoney/noofpayments AS ena FROM sponsors WHERE history=1 AND user_id=$userid");
if (mysql_num_rows($qwa)) {
$gs100 = mysql_result($qwa,0,"ena");
//$gs10 = round(0.1*$gs100);
$gs90 = round(0.9*$gs100);
} else {$gsm=0;}

$oklepaj = round($moneystate + $sponsors +$intden + $bankinterest + $gs90 - $sum - $moneyforcamp - $moneyforcheer - $bankloan);
if ($oklepaj > 0) {$bsleta='green';} elseif ($oklepaj < 0) {$bsleta='red';} else {$bsleta='black';}
if ($moneystate > 0) {$asleta='green';} elseif ($moneystate < 0) {$asleta='red';} else {$asleta='black';}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2><?=$langmark148?></h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="56%">

<big title="This is the money you currently have (in brackets is prediction for next week)"><font color="<?=$asleta?>"><?=$langmark149?>: <?=$monstdispl?> &euro;</font> (<font color="<?=$bsleta?>"><?=number_format($oklepaj, 0, ',', '.')?> &euro;</font>)</big><hr/>

<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr><td>

<br/><?=$langmark150?><br/>

<br/><b><?=$langmark151?>:</b> <?=number_format($sponsors,0,',','.')?> &euro;<br/>
<b>General sponsor:</b> <a href="sponsors.php" class="greenhilite"><?=number_format($gs90,0,',','.')?> &euro;</a><br/>
<?php if ($cjuf==4) {echo "<b>International:</b> ",number_format($intden,0,',','.')," &euro;<br/>";}?>
<b><?=$langmark152?>:</b> <?=$interestdspl?> &euro;<br/>
<b><?=$langmark153?>:</b><br/>

<?php
//izpisem igralce na katerih je bid
$resultt = mysql_query("SELECT `playerid`, `currentbid` FROM `transfers` WHERE `currentbid` > 0 AND `trstatus` =1 AND `sellingid` ='$userid' ORDER BY `timeofsale`");
if (!$resultt) {echo $langmark154,"<br/>"; }
else {
$tm=mysql_num_rows($resultt);
if ($tm==0) {echo $langmark154,"<br/>"; }

$t=0;
while ($t < $tm) {
$playerid=mysql_result($resultt,$t,"playerid");
$currentbid=mysql_result($resultt,$t,"currentbid");

$ime_igralca = mysql_query("SELECT `name`, `surname` FROM `players` WHERE `id` ='$playerid' LIMIT 1") or die(mysql_error());
$ime = mysql_result($ime_igralca,0,"name");
$priimek = mysql_result($ime_igralca,0,"surname");

echo "<a href=\"player.php?playerid=",$playerid,"\">",$ime," ",$priimek,"</a> - ",number_format($currentbid, 0, ',', '.')," &euro;<br/>";

$zasluzekdnara = $zasluzekdnara + $currentbid;
$t++;
}
}
?>

<br/><?=$langmark155?><br/>
<br/><b><?=$langmark156?>:</b> <?=number_format(round($sum),0,',','.')?> &euro;<br/>
<b><?=$langmark157?>:</b> <?=number_format($moneyforcamp,0,',','.')?> &euro;<br/>
<b><?=$langmark158?>:</b> <?=number_format($moneyforcheer,0,',','.')?> &euro;<br/>
<!--<b>Taxation:</b> <?=number_format($gs10,0,',','.')?> &euro;<br/>-->
<b><?=$langmark159?>:</b> <?=$loandspl?> &euro;<br/>
<b><?=$langmark160?>:</b><br/>

<?php
//izpisem igralce na katerih imam bid
$resultt = mysql_query("SELECT `playerid`, `currentbid` FROM `transfers` WHERE `trstatus` =1 AND `bidingteam` ='$userid' ORDER BY `timeofsale`");
if (!$resultt) {echo $langmark154,"<br/>"; }
else {
$tm=mysql_num_rows($resultt);
if ($tm==0) {echo $langmark154,"<br/>"; }

$t=0;
while ($t < $tm) {
$playerid=mysql_result($resultt,$t,"playerid");
$currentbid=mysql_result($resultt,$t,"currentbid");
$ime_igralca = mysql_query("SELECT `name`, `surname` FROM `players` WHERE `id` ='$playerid' LIMIT 1") or die(mysql_error());
$ime = mysql_result($ime_igralca,0,"name");
$priimek = mysql_result($ime_igralca,0,"surname");

echo "<a href=\"player.php?playerid=",$playerid,"\">",$ime," ",$priimek,"</a> - ",number_format($currentbid, 0, ',', '.')," &euro;<br/>";

$skupidnara = $skupidnara + $currentbid;
$t++;
}
}

$available = round($moneystate + $tempmoney);
if ($available > -299999) {$csleta='green';} else {$csleta='red';}
if ($available<=-300000) {$available=$langmark1397;} else {$available=number_format($available+300000, 0, ',', '.')." &euro;";}
?>

</td>
<td>
<img src="img/finances.jpg" border="0" alt="Finances" title="Finances">
</td></tr></table>

<?php
echo "<br/><hr/><big title=\"This is the money currently available to you to use on the transfer market\"><font color=\"$csleta\">",$langmark1398,": ",$available;?></font><!-- <a href="finances.php?action=refresh"><img src="img/ref.jpg" border="0" alt="<?=$langmark1396?>" title="<?=$langmark1396?>"></a>--></big><br/>

<br/><a href="gamerules.php?action=finances"><?=$langmark1399?></a> <?=$langmark1400?>

</td><td class="border" width="44%">

<h2><?=$langmark164?></h2><br/>
<?php
function multisort($array, $tag=1, $limit=10, $sort_by, $key1, $key2=NULL, $key3=NULL, $key4=NULL, $key5=NULL, $key6=NULL){
// sort by ?
foreach ($array as $pos =>  $val)
$tmp_array[$pos] = $val[$sort_by];
if($tag==1){
asort($tmp_array);
}else{
arsort($tmp_array);
}
   
$i=1;
// display however you want
foreach ($tmp_array as $pos =>  $val){
if($i<=$limit){
$return_array[$pos][$sort_by] = $array[$pos][$sort_by];
$return_array[$pos][$key1] = $array[$pos][$key1];
if (isset($key2)){
$return_array[$pos][$key2] = $array[$pos][$key2];
}
if (isset($key3)){
$return_array[$pos][$key3] = $array[$pos][$key3];
}
if (isset($key4)){
$return_array[$pos][$key4] = $array[$pos][$key4];
}
if (isset($key5)){
$return_array[$pos][$key5] = $array[$pos][$key5];
}
if (isset($key6)){
$return_array[$pos][$key6] = $array[$pos][$key6];
}
$i++;
}
}
return $return_array;
}

$resultev = mysql_query("SELECT `eventid`, `when`, `description` FROM `events` WHERE `type` =1 AND `team` ='$get_team'");
$all_info = array();
while ($get_info = mysql_fetch_row($resultev)){
$all_info[] = $get_info;
$smoga=$smoga+1;
}
if ($smoga > 0) {
$all_info = multisort($all_info,2,16,'0','1','2');
foreach($all_info as $get_info) {
$splitdatetime = explode(" ", $get_info[1]); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$datedisplay = date("d.m.y", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));
echo $datedisplay," - ",$get_info[2],"<br/>";
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