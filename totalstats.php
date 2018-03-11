<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT club, supporter, lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)) {
$trueclub = mysql_result ($compare,0,"club");
$is_supporter = mysql_result ($compare,0,"supporter");
$lang = mysql_result ($compare,0,"lang");
}
else {die(include 'basketsim.php');}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');

$season = $_POST["season"];
if (!$season) {$season=$default_season;}
if (!is_numeric($season)) {$season=$default_season;}
if ($season > $default_season AND $season<>99) {$season=$default_season;}
$action = $_POST["action"];
$machoi = $_POST["machoi"];
?>

<div id="main">
<h2><?=$langmark377?> >> <?=$langmark874?></h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="100%">
<form method="post" action="<?=$PHP_SELF?>" style="margin: 0">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td align="left">
<select name="season" class="inputreg">
<option value="99" <?php if($season==99){echo "selected";}?>><?=$langmark1362?></option>
<option value="22" <?php if($season==22){echo "selected";}?>><?=$langmark502?> 22</option>
<option value="21" <?php if($season==21){echo "selected";}?>><?=$langmark502?> 21</option>
<option value="20" <?php if($season==20){echo "selected";}?>><?=$langmark502?> 20</option>
<option value="19" <?php if($season==19){echo "selected";}?>><?=$langmark502?> 19</option>
<option value="18" <?php if($season==18){echo "selected";}?>><?=$langmark502?> 18</option>
<option value="17" <?php if($season==17){echo "selected";}?>><?=$langmark502?> 17</option>
<option value="16" <?php if($season==16){echo "selected";}?>><?=$langmark502?> 16</option>
<option value="15" <?php if($season==15){echo "selected";}?>><?=$langmark502?> 15</option>
<option value="14" <?php if($season==14){echo "selected";}?>><?=$langmark502?> 14</option>
<option value="13" <?php if($season==13){echo "selected";}?>><?=$langmark502?> 13</option>
<option value="12" <?php if($season==12){echo "selected";}?>><?=$langmark502?> 12</option>
<option value="11" <?php if($season==11){echo "selected";}?>><?=$langmark502?> 11</option>
<option value="10" <?php if($season==10){echo "selected";}?>><?=$langmark502?> 10</option>
<option value="9" <?php if($season==9){echo "selected";}?>><?=$langmark502?> 9</option>
<option value="8" <?php if($season==8){echo "selected";}?>><?=$langmark502?> 8</option>
<option value="7" <?php if($season==7){echo "selected";}?>><?=$langmark502?> 7</option>
<option value="6" <?php if($season==6){echo "selected";}?>><?=$langmark502?> 6</option>
<option value="5" <?php if($season==5){echo "selected";}?>><?=$langmark502?> 5</option>
<option value="4" <?php if($season==4){echo "selected";}?>><?=$langmark502?> 4</option>
<option value="3" <?php if($season==3){echo "selected";}?>><?=$langmark502?> 3</option>
<option value="2" <?php if($season==2){echo "selected";}?>><?=$langmark502?> 2</option>
<option value="1" <?php if($season==1){echo "selected";}?>><?=$langmark502?> 1</option>
</select>
<?php if ($is_supporter==1) {?>
<select name="action" class="inputreg">
<option value="0" <?php if($action==0){echo "selected";}?>>Per game</option>
<option value="40" <?php if($action==40){echo "selected";}?>>Per 40 minutes</option>
</select>
<?php }?>
<input type="submit" value="<?=$langmark534?>" name="submit" class="buttonreg"></td>
<td align="right">
<select name="machoi" class="inputreg">
<option value="1" <?php if($machoi==1){echo "selected";}?>>All matches</option>
<option value="2" <?php if($machoi==2){echo "selected";}?>>Competitive matches</option>
<option value="3" <?php if($machoi==3){echo "selected";}?>>League matches</option>
<option value="4" <?php if($machoi==4){echo "selected";}?>>Youth matches</option>
</select>
</td></tr></table>
</form><br/>

<?php
$result = mysql_query("SELECT id, surname, shirt, IF (shirt IS NULL || shirt ='' || shirt=0, 1, 0) AS isnull FROM players WHERE coach<>1 AND club='$trueclub' ORDER BY isnull ASC, shirt ASC, wage DESC LIMIT 50");
$mojigralci = mysql_num_rows($result);
if ($mojigralci==0) {die("<br/>$langmark1160<br/>$langmark1161</td></tr></table>");}
?>
<table width="100%" border="0" cellspacing="0" cellpadding="2"><tr bgcolor="#FFCC66">
<td align="right" width="3" bgcolor="#FFCC66">#</td><td width="93" bgcolor="#FFCC66"><?=$langmark404?></td><td align="center" bgcolor="#FFCC66">NoM</td><td align="center" bgcolor="#FFCC66">MPG</td><td bgcolor="#FFCC66">PPG</td><td bgcolor="#FFCC66">2PA</td><td bgcolor="#FFCC66">2P%</td><td bgcolor="#FFCC66">FTA</td><td bgcolor="#FFCC66">FT%</td><td bgcolor="#FFCC66">3PA</td><td bgcolor="#FFCC66">3P%</td><td bgcolor="#FFCC66">RPG</td><td bgcolor="#FFCC66">DPG</td><td bgcolor="#FFCC66">OPG</td><td bgcolor="#FFCC66">BPG</td><td bgcolor="#FFCC66">APG</td><td>SPG</td><td bgcolor="#FFCC66">FPG</td><td bgcolor="#FFCC66">TPG</td><td>RAT</td></tr>
<?php
$mi=0;
while ($mi < $mojigralci) {
$playerid=mysql_result($result,$mi,"id");
$surname=mysql_result($result,$mi,"surname");
$zhirt=mysql_result($result,$mi,"shirt");
if (!$zhirt OR $zhirt==0) {$zhirt='';}

//sezona
if ($season==99) {$season = '1 OR season=2 OR season=3 OR season=4 OR season=5 OR season=6 OR season=7 OR season=8 OR season=9 OR season=10 OR season=11 OR season=12 OR season=13 OR season=14 OR season=15 OR season=16 OR season=17 OR season=18 OR season=19 OR season=20 OR season=21 OR season=22 OR season=23';}

//tip
if ($machoi==4) {$ty = '1500 AND (type=18 OR type=19)';} //youth matches
elseif ($machoi==2) {$ty = '2 AND type <>5 AND type<>18 AND type<>19';} //competitive matches
elseif ($machoi==3) {$ty = '1500 AND type=1';} //league matches
else {$ty = '1500';} //all matches

$bigquery = mysql_query("SELECT COUNT(*) AS `tekem` , SUM(`gametime`) AS `gametime`, SUM(`two_scored`) AS `za_dve_zadel`, SUM(`two_total`) AS `za_dve`, SUM(`one_scored`) AS `za_ena_zadel`, SUM(`one_total`) AS `za_ena`, SUM(`three_scored`) AS `za_tri_zadel`, SUM(`three_total`) AS `za_tri`, SUM(`def_rebounds`) AS `obr_skoki`, SUM(`off_rebounds`) AS `nap_skoki`, SUM(`blocks`) AS `blocks`, SUM(`assists`) AS `assists`, SUM(`steals`) AS `steals`, SUM(`fouls`) AS `fouls`, SUM(`turnovers`) AS `turnovers` FROM `statistics` WHERE (season=$season) AND (type<>$ty) AND `player` = '$playerid' LIMIT 1");
$ary = mysql_fetch_array($bigquery);
$skupaj_tekem = $ary[tekem];
$sum_gametime = $ary[gametime];
$sum_za_dve_zadel = $ary[za_dve_zadel];
$sum_za_dve = $ary[za_dve];
$sum_za_ena_zadel = $ary[za_ena_zadel];
$sum_za_ena = $ary[za_ena];
$sum_za_tri_zadel = $ary[za_tri_zadel];
$sum_za_tri = $ary[za_tri];
$obr_skoki = $ary[obr_skoki];
$nap_skoki = $ary[nap_skoki];
$sum_blocks = $ary[blocks];
$sum_assists = $ary[assists];
$sum_steals = $ary[steals];
$sum_fouls = $ary[fouls];
$sum_turnovers = $ary[turnovers];

if ($skupaj_tekem >0) {
$povprecje_gametime = $sum_gametime/$skupaj_tekem;
if ($sum_gametime==0) {$sum_gametime=1;}
if ($action==40 && $is_supporter==1) {
$povprecje_tock = 40*($sum_za_dve_zadel*2 + $sum_za_ena_zadel + $sum_za_tri_zadel*3)/$sum_gametime;
if ($sum_za_dve <>0) {$povprecje_za_dve = 100*$sum_za_dve_zadel/$sum_za_dve;} else {$povprecje_za_dve = 0;}
if ($sum_za_ena <>0) {$povprecje_za_ena = 100*$sum_za_ena_zadel/$sum_za_ena;} else {$povprecje_za_ena = 0;}
if ($sum_za_tri <>0) {$povprecje_za_tri = 100*$sum_za_tri_zadel/$sum_za_tri;} else {$povprecje_za_tri = 0;}
$povprecje_skokov = 40*($obr_skoki+$nap_skoki)/$sum_gametime;
$povprecje_obr_skokov = 40*$obr_skoki/$sum_gametime;
$povprecje_nap_skokov = 40*$nap_skoki/$sum_gametime;
$povprecje_blokad = 40*$sum_blocks/$sum_gametime;
$povprecje_podaj = 40*$sum_assists/$sum_gametime;
$povprecje_ukradenih = 40*$sum_steals/$sum_gametime;
$povprecje_osebnih = 40*$sum_fouls/$sum_gametime;
$povprecje_napak = 40*$sum_turnovers/$sum_gametime;
$rat = 40*(($sum_za_dve_zadel*2 + $sum_za_ena_zadel + $sum_za_tri_zadel*3) - ($sum_za_dve - $sum_za_dve_zadel) - ($sum_za_ena - $sum_za_ena_zadel) - ($sum_za_tri - $sum_za_tri_zadel) + $obr_skoki + $nap_skoki + $sum_blocks + $sum_steals + $sum_assists - $sum_turnovers)/$sum_gametime;
}
else {
$povprecje_tock = ($sum_za_dve_zadel*2 + $sum_za_ena_zadel + $sum_za_tri_zadel*3)/$skupaj_tekem;
if ($sum_za_dve <>0) {$povprecje_za_dve = 100*$sum_za_dve_zadel/$sum_za_dve;} else {$povprecje_za_dve = 0;}
if ($sum_za_ena <>0) {$povprecje_za_ena = 100*$sum_za_ena_zadel/$sum_za_ena;} else {$povprecje_za_ena = 0;}
if ($sum_za_tri <>0) {$povprecje_za_tri = 100*$sum_za_tri_zadel/$sum_za_tri;} else {$povprecje_za_tri = 0;}
$povprecje_skokov = ($obr_skoki+$nap_skoki)/$skupaj_tekem;
$povprecje_obr_skokov = $obr_skoki/$skupaj_tekem;
$povprecje_nap_skokov = $nap_skoki/$skupaj_tekem;
$povprecje_blokad = $sum_blocks/$skupaj_tekem;
$povprecje_podaj = $sum_assists/$skupaj_tekem;
$povprecje_ukradenih = $sum_steals/$skupaj_tekem;
$povprecje_osebnih = $sum_fouls/$skupaj_tekem;
$povprecje_napak = $sum_turnovers/$skupaj_tekem;
$rat = (($sum_za_dve_zadel*2 + $sum_za_ena_zadel + $sum_za_tri_zadel*3) - ($sum_za_dve - $sum_za_dve_zadel) - ($sum_za_ena - $sum_za_ena_zadel) - ($sum_za_tri - $sum_za_tri_zadel) + $obr_skoki + $nap_skoki + $sum_blocks + $sum_steals + $sum_assists - $sum_turnovers)/$skupaj_tekem;
}
?>

<tr>
<td align="right" width="3"><?=$zhirt?></td>
<td width="93"><?php echo "<a href=\"player.php?playerid=",$playerid,"\">",$surname;?></a></td>
<td align="center"><b><?=$skupaj_tekem?></b></td>
<td align="center"><?=round($povprecje_gametime)?></td>
<td><b><?=round($povprecje_tock,1)?></b></td>
<?php
if ($action==40 && $is_supporter==1) {?>
<td><?=round(80*$sum_za_dve_zadel/$sum_gametime,1),"</td><td>",round($povprecje_za_dve,1)?></td>
<td><?=round(40*$sum_za_ena_zadel/$sum_gametime,1),"</td><td>",round($povprecje_za_ena,1)?></td>
<td><?=round(120*$sum_za_tri_zadel/$sum_gametime,1),"</td><td>",round($povprecje_za_tri,1)?></td>
<?php }else{?>
<td><?=round(2*$sum_za_dve_zadel/$skupaj_tekem,1),"</td><td>",round($povprecje_za_dve,1)?></td>
<td><?=round($sum_za_ena_zadel/$skupaj_tekem,1),"</td><td>",round($povprecje_za_ena,1)?></td>
<td><?=round(3*$sum_za_tri_zadel/$skupaj_tekem,1),"</td><td>",round($povprecje_za_tri,1)?></td>
<?php }?>
<td><b><?=round($povprecje_skokov,1)?></b></td>
<td><?=round($povprecje_obr_skokov,1)?></td>
<td><?=round($povprecje_nap_skokov,1)?></td>
<td><b><?=round($povprecje_blokad,1)?></b></td>
<td><b><?=round($povprecje_podaj,1)?></b></td>
<td><b><?=round($povprecje_ukradenih,1)?></b></td>
<td><b><?=round($povprecje_osebnih,1)?></b></td>
<td><b><?=round($povprecje_napak,1)?></b></td>
<td><font color="green"><b><?=round($rat,1)?></b></font></td>
</tr>
<?php
}
$mi++;
}
?>
</table>
</td>
</tr>
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="100%">
NoM - <?=$langmark1410?><br/>
MPG - <?=$langmark1132?><br/>
PPG - <?=$langmark1133?><br/>
2PA - <?=$langmark1411?><br/>
2P% - <?=$langmark1412?><br/>
FTA - <?=$langmark1413?><br/>
FT% - <?=$langmark1414?><br/>
3PA - <?=$langmark1415?><br/>
3P% - <?=$langmark1416?><br/>
RPG - <?=$langmark1134?><br/>
OPG - <?=$langmark1417?><br/>
DPG - <?=$langmark1418?><br/>
BPG - <?=$langmark1135?><br/>
APG - <?=$langmark1136?><br/>
SPG - <?=$langmark1137?><br/>
FPG - <?=$langmark1138?><br/>
TPG - <?=$langmark1139?><br/>
RAT - <?=$langmark1419?>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>