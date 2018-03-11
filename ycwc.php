<?php
$expandmenu1=99;
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

if (is_numeric($_GET['season'])) {$sseason = $_GET['season'];} else {$sseason = $_POST['sseason'];}
if (!$sseason) {$sseason = $default_season-1;} /* kasneje dodam -1 */
if (!is_numeric($sseason) OR ($sseason > $default_season) OR ($sseason < 0)) {die(include 'index.php');}

$compare = mysql_query("SELECT lang, supporter FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)) {
$lang = mysql_result($compare,0,"lang");
$suppo = mysql_result($compare,0,"supporter");
} else {die(include 'basketsim.php');}

//kateri krog prvenstva je aktiven
$krogpokala = mysql_query("SELECT MAX(lid_round) FROM matches WHERE season=$sseason AND type=19") or die(mysql_error());
$krog = mysql_result($krogpokala,0);
$round=$_POST["round"];
if (!$round) {$round=$_GET["round"];}
if (!$round) {$round = $krog;}
if ($sseason==$default_season AND $round > $krog) {$round=$krog;}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2>YOUTH CLUB WORLD CUP</h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="65%">

<?php
$cupmatches = mysql_query("SELECT `home_id`, `home_name`, `away_id`, `away_name`, `home_score`, `time` FROM `matches` WHERE `type` =19 AND `season` =$sseason AND `lid_round` =$round ORDER BY `time` ASC, matchid ASC");
$mat=mysql_num_rows($cupmatches);
$m=0;
while ($m < $mat) {
$home_id=mysql_result($cupmatches,$m,"home_id");
$home_name=mysql_result($cupmatches,$m,"home_name");
$away_id=mysql_result($cupmatches,$m,"away_id");
$away_name=mysql_result($cupmatches,$m,"away_name");
$dodprevod=mysql_result($cupmatches,$m,"home_score");
$tipr=mysql_result($cupmatches,$m,"time");
$result1 = mysql_query("SELECT name, country FROM teams WHERE teamid =$home_id LIMIT 1");
if ($home_name=='') {$home_named = mysql_result($result1,0,"name"); $home_name = stripslashes($home_named);}
$home_country = mysql_result($result1,0,"country");
$result2 = mysql_query("SELECT name, country FROM teams WHERE teamid =$away_id LIMIT 1");
if ($away_name=='') {$away_named = mysql_result($result2,0,"name"); $away_name = stripslashes($away_named);}
$away_country = mysql_result($result2,0,"country");
?>
<table border="0" cellspacing="0" cellpadding="1" width="100%"><tr onmouseover="style.backgroundColor='#F5DEB3';" onmouseout="style.backgroundColor='white'">
<td align="left" width="44%"><img src="img/Flags/<?=$home_country?>.png" border="1" alt="<?=$home_country?>" title="<?=$home_country?>">&nbsp;<?php echo "<a href=\"redirect.php?teamid=",$home_id,"\" class=\"greenhilite\">",$home_name,"</a>";?></td><td align="center">
<?php
$lura=0;
$dodmatche = mysql_query("SELECT matchid, home_id, away_id, crowd1, home_score, away_score, time FROM matches WHERE type=19 AND season=$sseason AND (home_id=$home_id AND away_id=$away_id OR home_id=$away_id AND away_id=$home_id) ORDER BY matchid DESC") or die(mysql_error());
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
$lura++;
echo "<td align=\"center\"><a href=\"prikaz.php?matchid=",$matchid,"\">",$priks,"</a></td>";
?>
<td align="right" width="44%"><?php echo "<a href=\"redirect.php?teamid=",$away_id,"\" class=\"greenhilite\">",$away_name,"</a>";?>&nbsp;<img src="img/Flags/<?=$away_country?>.png" border="1" alt="<?=$away_country?>" title="<?=$away_country?>"></td>
<?php
}
$m++;
}
echo "</table>";
//if (mysql_num_rows($cupmatches)==1 && ($sseason==$default_season OR $sseason=$default_season+1)) {
if (mysql_num_rows($cupmatches)==1) {
?><br/>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="left" width="49%">
<?php if ($sseason==15) {?>
<img src="http://titanimg.titan24.com/news/2009/11/27/d0096ec6c8_1259320601.jpg" border="0" width="137">
</td><td align="center" width="2%"><b>VS.</b></td><td align="right" width="49%">
<img src="http://www.gamerisms.com/image-files/bskz3gg.png" border="0" width="137">
</td>
<?php } if ($sseason==16) {?>
<img src="http://dl.dropbox.com/u/15462598/basketsim/resources/images/logos/spursLogo_137px.png" border="0" width="137">
</td><td align="center" width="2%"><b>VS.</b></td><td align="right" width="49%">
<img src="http://i382.photobucket.com/albums/oo268/zeljo86/bs/logo.png" border="0" width="137">
<?php } if ($sseason==17) {?>
<img src="http://i165.photobucket.com/albums/u71/kaloian40/Logos%20and%20kits/mk.png" border="0" width="137">
</td><td align="center" width="2%"><b>VS.</b></td><td align="right" width="49%">
<img src="http://www.naszkosz.enbiej.pl/wp-content/2011/10/19_1296725278.gif" border="0" width="137">
<?php } if ($sseason==18) {?>
<img src="http://i610.photobucket.com/albums/tt188/LongerPL/logo-19.png" border="0" width="137">
</td><td align="center" width="2%"><b>VS.</b></td><td align="right" width="49%">
<img src="http://www.clipartdb.com/data/media/22/eagle_clipart_red_basketball_eagle_06.gif" border="0" width="137">
</td>
<?php
}
echo "</tr></table>";
//MVP
$hahaha = mysql_query("SELECT player, name, surname, teamname FROM top_players, players WHERE player=players.id AND type=19 AND season='$sseason'") or die(mysql_error());
if (mysql_num_rows($hahaha)) {
$idMVP = mysql_result($hahaha,0,"player");
$namMVP = mysql_result($hahaha,0,"name");
$surMVP = mysql_result($hahaha,0,"surname");
$teamMVP = mysql_result($hahaha,0,"teamname");
echo "<br/>Youth Club World Cup MVP award: <a href=\"player.php?playerid=",$idMVP,"\">",$namMVP," ",$surMVP,"</a> (",stripslashes($teamMVP),")";
} elseif($sseason<=$default_season) {echo "<br/><i>Youth Club World Cup MVP will be awarded after the final is played.";} else {echo "<br/>Youth Club World Cup MVP: <i>retired player</i>";}
}?>

</td><td class="border" width="35%">

<big>Youth Club World Cup</big><br/>

<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="margin: 0">
<select name="round" class="inputreg">
<?php if ($krog > 0 || $sseason < $default_season){?><option value="1" <?php if ($round==1){echo "selected";}?>><?=$langmark367?> 1</option><?php } ?>
<?php if ($krog > 1 || $sseason < $default_season){?><option value="2" <?php if ($round==2){echo "selected";}?>><?=$langmark367?> 2</option><?php } ?>
<?php if ($krog > 2 || $sseason < $default_season){?><option value="3" <?php if ($round==3){echo "selected";}?>><?=$langmark367?> 3</option><?php } ?>
<?php if ($krog > 3 || $sseason < $default_season){?><option value="4" <?php if ($round==4){echo "selected";}?>><?=$langmark367?> 4</option><?php } ?>
<?php if ($krog > 4 || $sseason < $default_season){?><option value="5" <?php if ($round==5){echo "selected";}?>><?=$langmark367?> 5</option><?php } ?>
<?php if ($krog > 5 || $sseason < $default_season){?><option value="6" <?php if ($round==6){echo "selected";}?>><?=$langmark367?> 6</option><?php } ?>
<?php if ($krog > 6 || $sseason < $default_season){?><option value="7" <?php if ($round==7){echo "selected";}?>><?=$langmark367?> 7</option><?php } ?>
</select>
<select name="sseason" class="inputreg">
<?php
$kose = $default_season;
while($kose >= 15) {?>
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
Youth Club WC is an international club competition for youth teams. Best sets of youngsters go head to head in the final week of the season to determine which youth team is best in the World! <!--<a href="gamerules.php?action=international"><?=$langmark1408?></a>.--><br/>

<br/><h2>Outright odds</h2><br/>
<?php
$supp3 = $_GET["supp"];
if ($supp3==10 AND $suppo==1) {
$bzook = mysql_query("SELECT userid, name, odds FROM ekipe, teams, users WHERE club=ekipa and teamid=club and competition=99");
$stevaf = @mysql_num_rows($bzook);
while ($odas=mysql_fetch_array($bzook)) {
$userLI = $odas[userid];
$nameLI = $odas[name];
$oddsLI = $odas[odds];
if ($gemn==2 OR $gemn==3) {$oddsLI=$oddsLI*1.3;} elseif ($gemn==4) {$oddsLI=$oddsLI*1.3;} else {$oddsLI=$oddsLI*2.3;}
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
$bzook = mysql_query("SELECT userid, name, odds FROM ekipe, teams, users WHERE club=ekipa and teamid=club and competition=99 LIMIT 5");
$gemn = @mysql_num_rows($bzook);
while ($odas=mysql_fetch_array($bzook)) {
$glj=$glj+1;
$userLI = $odas[userid];
$nameLI = $odas[name];
$oddsLI = $odas[odds];
if ($gemn==2 OR $gemn==3) {$oddsLI=$oddsLI*1.3;} elseif ($gemn==4) {$oddsLI=$oddsLI*1.3;} else {$oddsLI=$oddsLI*2.3;}
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
if ($suppo==1 AND $supp3<>10 AND $glj==5) {echo "[<a href=\"ycwc.php?supp=10\" title=\"",$langmark231,"\" class=\"greenhilite\">+</a>]<br/>";}
if ($suppo==1 AND $supp3==10) {echo "[<a href=\"javascript: history.go(-1)\" title=\"",$langmark409,"\" class=\"greenhilite\">-</a>]<br/>";}

$offset_result = mysql_query("SELECT FLOOR(RAND() * COUNT(*)) AS `offset` FROM `players`, `ekipe` WHERE `players`.`club` = `ekipe`.`ekipa` AND `players`.`statement` != '' AND ekipe.competition=2 and `coach`=9");
$offset_row = mysql_fetch_object($offset_result);
$offset = $offset_row->offset;
$puma = mysql_query("SELECT `players`.`id`, `players`.`name`, `players`.`surname`, `players`.`statement` FROM `players`, `ekipe` WHERE `players`.`club` = `ekipe`.`ekipa` AND `players`.`statement` != '' AND ekipe.competition=2 and coach=9 LIMIT $offset, 1");
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
$zmagovalci = mysql_query("SELECT `h_season`, `h_userid`, `h_teamid`, `h_teamname`, `h_country` FROM `history` WHERE `h_type`=19 AND `won` =1 ORDER BY `h_season` DESC") or die(mysql_error());
while ($pus=mysql_fetch_array($zmagovalci)) {
$h_season = $pus[h_season];
$h_userid = $pus[h_userid];
$h_teamid = $pus[h_teamid];
$h_teamname = $pus[h_teamname];
$h_country = $pus[h_country];
$dizp = $h_season;
$preveritev = mysql_query("SELECT * FROM `users` WHERE `userid`='$h_userid' LIMIT 1");
if (mysql_num_rows($preveritev)) {echo "<tr><td><a href=\"ycwc.php?season=",$h_season,"&round=7\" title=\"",$langmark502," ",$h_season,"\">",$dizp,"</a>&nbsp;&nbsp;<img src=\"img/Flags/",$h_country,".png\" border=\"1\" alt=\"",$h_country,"\" title=\"",$h_country,"\">&nbsp;&nbsp;<a href=\"club.php?clubid=",$h_userid,"\">",stripslashes($h_teamname),"</a></td></tr>";} else {echo "<tr><td><a href=\"ycwc.php?season=",$h_season,"&round=7\" title=\"",$langmark502," ",$h_season,"\">",$dizp,"</a>&nbsp;&nbsp;<img src=\"img/Flags/",$h_country,".png\" border=\"1\" alt=\"",$h_country,"\" title=\"",$h_country,"\">&nbsp;&nbsp;",stripslashes($h_teamname),"</td></tr>";}
}
?>
</table>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>