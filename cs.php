<?php
$expandmenu1=99;

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$sseason = $_POST["sseason"];
if (!$sseason) {$sseason = $_GET["season"];}
if (!$sseason) {$sseason=$default_season;} /* kasneje zakomentiram $sseason=$sseason+1; */
if (!is_numeric($sseason) OR ($sseason > $default_season) OR ($sseason < 0)) {die(include 'index.php');}

$compare = mysql_query("SELECT lang, supporter FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)) {
$lang = mysql_result($compare,0,"lang");
$suppo = mysql_result($compare,0,"supporter");
} else {die(include 'basketsim.php');}

//which round of the cup is active
$krogpokala = mysql_query("SELECT MAX(lid_round) FROM matches WHERE season=$sseason AND type=6") or die(mysql_error());
$krog = mysql_result($krogpokala,0);
$round=$_POST["round"];
if (!$round) {$round=$_GET["round"];}
if (!$round) {$round = $krog;}

if ($sseason==3 AND $round > 5) {$round=5;}
if ($sseason >3 AND $sseason <9 AND $round > 6) {$round=6;}
if ($sseason==$default_season AND $round > $krog) {$round=$krog;}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2>CHAMPIONS SERIES</h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="64%">

<?php
$cupmatches = mysql_query("SELECT `home_id`, `home_name`, `away_id`, `away_name`, `home_score`, `time` FROM `matches` WHERE `type` =6 AND `season` =$sseason AND `lid_round` =$round ORDER BY `time` ASC, matchid ASC");
$mat=mysql_num_rows($cupmatches);
$m=0;
while ($m < $mat) {
$home_id=mysql_result($cupmatches,$m,"home_id");
$home_name=mysql_result($cupmatches,$m,"home_name");
$away_id=mysql_result($cupmatches,$m,"away_id");
$away_name=mysql_result($cupmatches,$m,"away_name");
$dodprevod=mysql_result($cupmatches,$m,"home_score");
$tipr=mysql_result($cupmatches,$m,"time");
if ($mat > 1) {$tipp=mysql_result($cupmatches,$m+1,"time");}
$result1 = mysql_query("SELECT name, country FROM teams WHERE teamid =$home_id LIMIT 1");
if ($home_name=='') {$home_named = mysql_result($result1,0,"name"); $home_name = stripslashes($home_named);}
$home_country = mysql_result($result1,0,"country");
$result2 = mysql_query("SELECT name, country FROM teams WHERE teamid =$away_id LIMIT 1");
if ($away_name=='') {$away_named = mysql_result($result2,0,"name"); $away_name = stripslashes($away_named);}
$away_country = mysql_result($result2,0,"country");
if ($tipr<>$tipp) {$m=$mat+1;}
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%"><tr>
<td align="left" width="42%"><img src="img/Flags/<?=$home_country?>.png" border="1" alt="<?=$home_country?>" title="<?=$home_country?>">&nbsp;<?php echo "<a href=\"redirect.php?teamid=",$home_id,"\" class=\"greenhilite\">",$home_name,"</a>";?></td><td align="center" width="12%" bgcolor="#FFCC66">
<?php
if ($mat > 1) {
$hwi=0; $awi=0;
$ddmatche = mysql_query("SELECT home_id, away_id, home_score, away_score FROM matches WHERE type=6 AND season=$sseason AND (home_id=$home_id AND away_id=$away_id OR home_id=$away_id AND away_id=$home_id)") or die(mysql_error());
while ($gh = mysql_fetch_array($ddmatche)) {
$homeid11 = $gh[home_id];
$awayid11 = $gh[away_id];
$homescore11 = $gh[home_score];
$awayscore11 = $gh[away_score];
if ($homescore11 > $awayscore11 AND $homeid11==$home_id) {$hwi=$hwi+1;}
elseif ($homescore11 > $awayscore11 AND $homeid11==$away_id) {$awi=$awi+1;}
elseif ($awayscore11 > $homescore11 AND $awayid11==$home_id) {$hwi=$hwi+1;}
elseif ($awayscore11 > $homescore11 AND $awayid11==$away_id) {$awi=$awi+1;}
}
echo "<b>",$hwi," : ",$awi,"</b>";
}
else {echo "<b>FINAL</b>"; $grlo=44;}
?>
</td>
<td align="right" width="42%"><?php echo "<a href=\"redirect.php?teamid=",$away_id,"\" class=\"greenhilite\">",$away_name,"</a>";?>&nbsp;<img src="img/Flags/<?=$away_country?>.png" border="1" alt="<?=$away_country?>" title="<?=$away_country?>"></td>
</tr>
<?php
$lura=0;
$dodmatche = mysql_query("SELECT matchid, home_id, away_id, crowd1, home_score, away_score, time FROM matches WHERE type=6 AND season=$sseason AND (home_id=$home_id AND away_id=$away_id OR home_id=$away_id AND away_id=$home_id) ORDER BY matchid DESC") or die(mysql_error());
while ($go = mysql_fetch_array($dodmatche)) {
$matchid = $go[matchid];
$homeid = $go[home_id];
$awayid = $go[away_id];
$crowd1 = $go[crowd1];
$homescore = $go[home_score];
$awayscore = $go[away_score];
$prevtime = $go[time];
$zdele = date("Y-m-d H:i:s");
if ($homescore+$awayscore==0 && $crowd1 >0 AND $zdele > $prevtime) {$priks = 'LIVE';} elseif ($homescore+$awayscore==0) {$priks = 'preview';} elseif ($home_id==$homeid) {$priks = $homescore." : ".$awayscore;} else {$priks = $awayscore." : ".$homescore;}
if ($hwi==2 AND $lura==0) {echo "<tr><td colspan=\"3\" align=\"center\"><font color=\"#009900\"><b>",$home_name," won the series!</b></font></td></tr>";}
if ($awi==2 AND $lura==0) {echo "<tr><td colspan=\"3\" align=\"center\"><font color=\"#009900\"><b>",$away_name," won the series!</b></font></td></tr>";}
$lura++;
echo "<tr><td colspan=\"3\" align=\"center\"><a href=\"prikaz.php?matchid=",$matchid,"\">",$priks,"</a></td></tr>";
}
$m++;
}
if ($grlo==44 AND $homescore > $awayscore) {echo "<tr><td colspan=\"3\" align=\"center\"><font color=\"#009900\"><b>",$home_name," won the competition!</b></font></td></tr>";}
if ($grlo==44 AND $homescore < $awayscore) {echo "<tr><td colspan=\"3\" align=\"center\"><font color=\"#009900\"><b>",$away_name," won the competition!</b></font></td></tr>";}
echo "</table>";
if (mysql_num_rows($cupmatches)==1 && $sseason==$default_season) {
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<!--<td align="left"><img src="http://www4.slikomat.com/11/1004/riw-Cool-A.jpg" border="0" width="137"></td><td align="center"><b>VS.</b></td><td align="right"><img src="http://img378.imageshack.us/img378/1723/beastie1se8.png" border="0" width="137"></td>--></tr></table>
<?php
}
if (($grlo==44) OR ($sseason==3 AND $round==5) OR ($sseason >3 AND $sseason <9 AND $round==6)) {
//MVP
$hahaha = mysql_query("SELECT player, name, surname, teamname FROM top_players, players WHERE player=players.id AND type=6 AND season='$sseason'") or die(mysql_error());
if (mysql_num_rows($hahaha)) {
$idMVP = mysql_result($hahaha,0,"player");
$namMVP = mysql_result($hahaha,0,"name");
$surMVP = mysql_result($hahaha,0,"surname");
$teamMVP = mysql_result($hahaha,0,"teamname");
echo "<br/>Champions Series MVP award: <a href=\"player.php?playerid=",$idMVP,"\">",$namMVP," ",$surMVP,"</a> (",stripslashes($teamMVP),")";
} elseif($sseason==$default_season) {echo "<br/><i>Champions Series MVP will be awarded after the final is played.";} else {echo "<br/>Champions Series MVP: <i>retired player</i>";}
}
?>

</td><td class="border" width="36%">

<big>Champions Series</big><br/>

<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="margin: 0">
<select name="round" class="inputreg">
<?php if ($krog > 0 || $sseason < $default_season){?><option value="1" <?php if ($round==1){echo "selected";}?>><?=$langmark367?> 1</option><?php } ?>
<?php if ($krog > 1 || $sseason < $default_season){?><option value="2" <?php if ($round==2){echo "selected";}?>><?=$langmark367?> 2</option><?php } ?>
<?php if ($krog > 2 || $sseason < $default_season){?><option value="3" <?php if ($round==3){echo "selected";}?>><?=$langmark367?> 3</option><?php } ?>
<?php if ($krog > 3 || $sseason < $default_season){?><option value="4" <?php if ($round==4){echo "selected";}?>><?=$langmark367?> 4</option><?php } ?>
<?php if ($krog > 4 || $sseason < $default_season){?><option value="5" <?php if ($round==5){echo "selected";}?>><?=$langmark367?> 5</option><?php } ?>
<?php if (($krog > 5 || $sseason < $default_season) && $sseason >3){?><option value="6" <?php if ($round==6){echo "selected";}?>><?=$langmark367?> 6</option><?php } ?>
<?php if (($krog > 6 || $sseason < $default_season) && $sseason >8){?><option value="7" <?php if ($round==7){echo "selected";}?>><?=$langmark367?> 7</option><?php } ?>
<?php if ($krog > 7){?><option value="8" <?php if ($round==8){echo "selected";}?>><?=$langmark367?> 8</option><?php } ?>
<?php if ($krog > 8){?><option value="9" <?php if ($round==9){echo "selected";}?>><?=$langmark367?> 9</option><?php } ?>
<?php if ($krog > 9){?><option value="10" <?php if ($round==10){echo "selected";}?>><?=$langmark367?> 10</option><?php } ?>
<?php if ($krog > 10){?><option value="11" <?php if ($round==11){echo "selected";}?>><?=$langmark367?> 11</option><?php } ?>
</select>
<select name="sseason" class="inputreg">
<?php
$kose = $default_season;
while($kose >= 3) {?>
<option value="<?=$kose?>" <?php if($sseason==$kose){echo "selected";}?>><?=$langmark502," ",$kose?></option>
<?php
$kose--;
}
?>
</select>
<input type="submit" value="&nbsp;&raquo;" name="submit" class="buttonreg">
</form>

<?php
if ($mat==1 AND $dodprevod > 0) {$dlak=44;}
if ($sseason==$default_season AND $dlak<>44) {
?>

<br/><!--<h2><?=$langmark1468?></h2><br/>-->
Champions Series <?=$langmark1406?> <a href="gamerules.php?action=international"><?=$langmark1408?></a>.<br/>

<br/><h2>Outright odds</h2><br/>
<?php
$supp3 = $_GET["supp"];
if ($supp3==10 AND $suppo==1) {
$bzook = mysql_query("SELECT userid, name, odds FROM ekipe, teams, users WHERE club=ekipa and teamid=club and competition=1");
$stevaf = @mysql_num_rows($bzook);
while ($odas=mysql_fetch_array($bzook)) {
$userLI = $odas[userid];
$nameLI = $odas[name];
$oddsLI = $odas[odds];
if ($oddsLI > 5000) {$oddsLI=5000;}
if ($gemn==2 OR $gemn==3) {$oddsLI=$oddsLI/1.2;} elseif ($gemn==4) {$oddsLI=$oddsLI/0.66;} elseif ($mat>15) {$oddsLI=$oddsLI/0.36;}
if ($oddsLI < 1.23) {$priOD='1-5';}
elseif ($oddsLI > 1.22 AND $oddsLI < 1.30) {$priOD='1-4';}
elseif ($oddsLI > 1.29 AND $oddsLI < 1.37) {$priOD='1-3';}
elseif ($oddsLI > 1.36 AND $oddsLI < 1.46) {$priOD='2-5';}
elseif ($oddsLI > 1.45 AND $oddsLI < 1.56) {$priOD='1-2';}
elseif ($oddsLI > 1.55 AND $oddsLI < 1.64) {$priOD='3-5';}
elseif ($oddsLI > 1.63 AND $oddsLI < 1.71) {$priOD='2-3';}
elseif ($oddsLI > 1.70 AND $oddsLI < 1.78) {$priOD='3-4';}
elseif ($oddsLI > 1.77 AND $oddsLI < 1.91) {$priOD='4-5';}
elseif ($oddsLI > 1.90 AND $oddsLI < 2.10) {$priOD='1-1';}
elseif ($oddsLI > 2.09 AND $oddsLI < 2.23) {$priOD='6-5';}
elseif ($oddsLI > 2.22 AND $oddsLI < 2.30) {$priOD='5-4';}
elseif ($oddsLI > 2.29 AND $oddsLI < 2.37) {$priOD='4-3';}
elseif ($oddsLI > 2.36 AND $oddsLI < 2.46) {$priOD='7-5';}
elseif ($oddsLI > 2.45 AND $oddsLI < 2.56) {$priOD='3-2';}
elseif ($oddsLI > 2.55 AND $oddsLI < 2.64) {$priOD='8-5';}
elseif ($oddsLI > 2.63 AND $oddsLI < 2.71) {$priOD='5-3';}
elseif ($oddsLI > 2.70 AND $oddsLI < 2.78) {$priOD='7-4';}
elseif ($oddsLI > 2.77 AND $oddsLI < 2.91) {$priOD='9-5';}
elseif ($oddsLI > 2.90 AND $oddsLI < 3.13) {$priOD='2-1';}
elseif ($oddsLI > 3.12 AND $oddsLI < 3.30) {$priOD='9-4';}
elseif ($oddsLI > 3.29 AND $oddsLI < 3.42) {$priOD='7-3';}
elseif ($oddsLI > 3.41 AND $oddsLI < 3.59) {$priOD='5-2';}
elseif ($oddsLI > 3.58 AND $oddsLI < 3.84) {$priOD='8-3';}
elseif ($oddsLI > 3.83 AND $oddsLI < 4.26) {$priOD='3-1';}
elseif ($oddsLI > 4.25 AND $oddsLI < 4.76) {$priOD='7-2';}
elseif ($oddsLI > 5.25 AND $oddsLI < 5.63) {$priOD='9-2';}
else {$priOD=round($oddsLI-1)."-1";}
$nnn++;
if ($nnn < 16) {echo $priOD," <a href=\"club.php?clubid=",$userLI,"\">",stripslashes($nameLI),"</a><br/>";}
if ($nnn==16) {echo "<br/>...<br/><br/>"; $yuc=44;}
if ($nnn > $stevaf - 5 AND $yuc==44) {echo $priOD," <a href=\"club.php?clubid=",$userLI,"\">",stripslashes($nameLI),"</a><br/>";}
}
}
else {
$bzook = mysql_query("SELECT userid, name, odds FROM ekipe, teams, users WHERE club=ekipa and teamid=club and competition=1 LIMIT 5");
$gemn = @mysql_num_rows($bzook);
while ($odas=mysql_fetch_array($bzook)) {
$glj=$glj+1;
$userLI = $odas[userid];
$nameLI = $odas[name];
$oddsLI = $odas[odds];
if ($oddsLI > 5000) {$oddsLI=5000;}
if ($gemn==2 OR $gemn==3) {$oddsLI=$oddsLI/1.2;} elseif ($gemn==4) {$oddsLI=$oddsLI/0.66;} elseif ($mat>15) {$oddsLI=$oddsLI/0.36;}
if ($oddsLI < 1.23) {$priOD='1-5';}
elseif ($oddsLI > 1.22 AND $oddsLI < 1.30) {$priOD='1-4';}
elseif ($oddsLI > 1.29 AND $oddsLI < 1.37) {$priOD='1-3';}
elseif ($oddsLI > 1.36 AND $oddsLI < 1.46) {$priOD='2-5';}
elseif ($oddsLI > 1.45 AND $oddsLI < 1.56) {$priOD='1-2';}
elseif ($oddsLI > 1.55 AND $oddsLI < 1.64) {$priOD='3-5';}
elseif ($oddsLI > 1.63 AND $oddsLI < 1.71) {$priOD='2-3';}
elseif ($oddsLI > 1.70 AND $oddsLI < 1.78) {$priOD='3-4';}
elseif ($oddsLI > 1.77 AND $oddsLI < 1.91) {$priOD='4-5';}
elseif ($oddsLI > 1.90 AND $oddsLI < 2.10) {$priOD='1-1';}
elseif ($oddsLI > 2.09 AND $oddsLI < 2.23) {$priOD='6-5';}
elseif ($oddsLI > 2.22 AND $oddsLI < 2.30) {$priOD='5-4';}
elseif ($oddsLI > 2.29 AND $oddsLI < 2.37) {$priOD='4-3';}
elseif ($oddsLI > 2.36 AND $oddsLI < 2.46) {$priOD='7-5';}
elseif ($oddsLI > 2.45 AND $oddsLI < 2.56) {$priOD='3-2';}
elseif ($oddsLI > 2.55 AND $oddsLI < 2.64) {$priOD='8-5';}
elseif ($oddsLI > 2.63 AND $oddsLI < 2.71) {$priOD='5-3';}
elseif ($oddsLI > 2.70 AND $oddsLI < 2.78) {$priOD='7-4';}
elseif ($oddsLI > 2.77 AND $oddsLI < 2.91) {$priOD='9-5';}
elseif ($oddsLI > 2.90 AND $oddsLI < 3.13) {$priOD='2-1';}
elseif ($oddsLI > 3.12 AND $oddsLI < 3.30) {$priOD='9-4';}
elseif ($oddsLI > 3.29 AND $oddsLI < 3.42) {$priOD='7-3';}
elseif ($oddsLI > 3.41 AND $oddsLI < 3.59) {$priOD='5-2';}
elseif ($oddsLI > 3.58 AND $oddsLI < 3.84) {$priOD='8-3';}
elseif ($oddsLI > 3.83 AND $oddsLI < 4.26) {$priOD='3-1';}
elseif ($oddsLI > 4.25 AND $oddsLI < 4.76) {$priOD='7-2';}
elseif ($oddsLI > 5.25 AND $oddsLI < 5.63) {$priOD='9-2';}
else {$priOD=round($oddsLI-1)."-1";}
echo $priOD," <a href=\"club.php?clubid=",$userLI,"\">",stripslashes($nameLI),"</a><br/>";
}
}
if ($suppo==1 AND $supp3<>10 AND $glj==5) {echo "[<a href=\"cs.php?supp=10\" title=\"",$langmark231,"\" class=\"greenhilite\">+</a>]<br/>";}
if ($suppo==1 AND $supp3==10) {echo "[<a href=\"javascript: history.go(-1)\" title=\"",$langmark409,"\" class=\"greenhilite\">-</a>]<br/>";}

$offset_result = mysql_query("SELECT FLOOR(RAND() * COUNT(*)) AS `offset` FROM `players`, `ekipe` WHERE `players`.`club` = `ekipe`.`ekipa` AND `players`.`statement` != '' AND ekipe.competition=1");
$offset_row = mysql_fetch_object($offset_result);
$offset = $offset_row->offset;
$puma = mysql_query("SELECT `players`.`id`, `players`.`name`, `players`.`surname`, `players`.`statement` FROM `players`, `ekipe` WHERE `players`.`club` = `ekipe`.`ekipa` AND `players`.`statement` != '' AND ekipe.competition=1 LIMIT $offset, 1");
if (mysql_num_rows($puma)==1) {
echo "<br/><h2>",$langmark1409,"</h2><br/>"; $izj=1;
$link = mysql_result($puma,0,"players.id");
$ime = mysql_result($puma,0,"players.name");
$priimek = mysql_result($puma,0,"players.surname");
$izjava = mysql_result($puma,0,"players.statement");
echo "<i>",stripslashes($izjava),"</i><br/><br/><center><a href=\"player.php?playerid=",$link,"&say=press\">",$ime," ",$priimek;?></a></center>
<?php
}
}

//bivši zmagovalci
echo "<br/><h2>",$langmark1246,"</h2>";?>
<table cellspacing="0" cellpadding="0" border="0" width="100%">
<tr><td><br/></td></tr>
<?php
$zmagovalci = mysql_query("SELECT `h_season`, `h_userid`, `h_teamid`, `h_teamname`, `h_country` FROM `history` WHERE `h_type`=6 AND `won` =1 ORDER BY `h_season` DESC") or die(mysql_error());
while ($pus=mysql_fetch_array($zmagovalci)) {
$h_season = $pus[h_season];
$h_userid = $pus[h_userid];
$h_teamid = $pus[h_teamid];
$h_teamname = $pus[h_teamname];
$h_country = $pus[h_country];
if ($h_season < 10) {$dizp = "0".$h_season;} else {$dizp = $h_season;}
$preveritev = mysql_query("SELECT * FROM `users` WHERE `userid`='$h_userid' LIMIT 1");
if (mysql_num_rows($preveritev)) {echo "<tr><td><a href=\"cs.php?season=",$h_season,"&round=7\" title=\"",$langmark502," ",$h_season,"\">",$dizp,"</a>&nbsp;&nbsp;<img src=\"img/Flags/",$h_country,".png\" border=\"1\" alt=\"",$h_country,"\" title=\"",$h_country,"\">&nbsp;&nbsp;<a href=\"club.php?clubid=",$h_userid,"\">",stripslashes($h_teamname),"</a></td></tr>";} else {echo "<tr><td><a href=\"cs.php?season=",$h_season,"&round=7\" title=\"",$langmark502," ",$h_season,"\">",$dizp,"</a>&nbsp;&nbsp;<img src=\"img/Flags/",$h_country,".png\" border=\"1\" alt=\"",$h_country,"\" title=\"",$h_country,"\">&nbsp;&nbsp;",stripslashes($h_teamname),"</td></tr>";}
}?>
</table>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>