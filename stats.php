<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

//addon to international rankings, default
$dodatekN=100;
$dodatekU=100;

$comparepa = mysql_query("SELECT club, supporter, lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($comparepa)) {
$trueclub = mysql_result ($comparepa,0,"club");
$supp = mysql_result ($comparepa,0,"supporter");
$lang = mysql_result ($comparepa,0,"lang");
}
else {die(include 'basketsim.php');}

require("inc/lang/".$lang.".php");
include('inc/header.php');
include('inc/osnova.php');
?>

<div id="main">
<h2><?=$langmark1321?> & <?=$langmark1322?></h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="60%">

<h2 align="center"><?=$langmark1321?></h2><br/>

<?=$langmark1323?><br/><br/>

<table width="100%" border="0" cellspacing="1" cellpadding="1">
<tr onmouseover="style.backgroundColor='orange';" onmouseout="style.backgroundColor='white'"><td align="center"><b><a href="totalstats.php" class="greenhilite" style="display:block; border: 0px;"><?=$langmark1324?></a></b></td></tr>
<tr onmouseover="style.backgroundColor='orange';" onmouseout="style.backgroundColor='white'"><td align="center"><b><a href="leaguestats.php?leagueid=<?=$ligaa?>" class="greenhilite" style="display:block; border: 0px;"><?=$langmark1325?></a></b></td></tr>
<tr onmouseover="style.backgroundColor='orange';" onmouseout="style.backgroundColor='white'"><td align="center"><b><a href="leaguestrength.php" class="greenhilite" style="display:block; border: 0px;">League strength</a></b></td></tr>
<tr onmouseover="style.backgroundColor='orange';" onmouseout="style.backgroundColor='white'"><td align="center"><b><a href="countrystats.php" class="greenhilite" style="display:block; border: 0px;"><?=$langmark1329?></a></b></td></tr>
<tr onmouseover="style.backgroundColor='orange';" onmouseout="style.backgroundColor='white'"><td align="center"><b><a href="mvp.php" class="greenhilite" style="display:block; border: 0px;"><?=$langmark1326?></a></b></td></tr>
<tr onmouseover="style.backgroundColor='orange';" onmouseout="style.backgroundColor='white'"><td align="center"><b><a href="u15players.php" class="greenhilite" style="display:block; border: 0px;">List of U15 players</a></b></td></tr>
<tr onmouseover="style.backgroundColor='orange';" onmouseout="style.backgroundColor='white'"><td align="center"><b><a href="ycwc_preview.php" class="greenhilite" style="display:block; border: 0px;">Best Youth Teams</a></b></td></tr>
<tr onmouseover="style.backgroundColor='orange';" onmouseout="style.backgroundColor='white'"><td align="center"><b><a href="newflags.php" class="greenhilite" style="display:block; border: 0px;">Flag stats</a></b></td></tr>
<tr onmouseover="style.backgroundColor='orange';" onmouseout="style.backgroundColor='white'"><td align="center"><b><a href="threepointers.php?super=winners" class="greenhilite" style="display:block; border: 0px;"><?=$langmark1327?></a></b></td></tr>
<tr onmouseover="style.backgroundColor='orange';" onmouseout="style.backgroundColor='white'"><td align="center"><b><a href="stats.php?show=topost" class="greenhilite" style="display:block; border: 0px;">Top forum posters</a></b></td></tr>
<?php if ($supp==1){?>
<tr onmouseover="style.backgroundColor='orange';" onmouseout="style.backgroundColor='white'"><td align="center"><b><a href="stats.php?show=konfstats" class="greenhilite" style="display:block; border: 0px;"><?=$langmark1331?></a></b></td></tr>
<?php $dn = date("l"); $ur = date("H"); $mn = date("i"); if (($dn=='Friday' AND $ur==28) OR ($dn=='Friday' AND $ur==28 AND $mn < 0)) {?>
<tr><td align="center"><i>Supporter stats are available at any time with an exception of Friday, 19:00 - 20:20, when national team matches are played!</i></td></tr><?php } else {?>
<tr onmouseover="style.backgroundColor='orange';" onmouseout="style.backgroundColor='white'"><td align="center"><b><a href="statistics.php?stat=players" class="greenhilite" style="display:block; border: 0px;"> > <?=$langmark1330?> < <!-- <font color="red">improved!</font>--></a></b></td></tr><?php }
} else {echo "<tr><td align=\"center\">&nbsp;</td></tr><tr><td align=\"center\"><i>There are more stats available to <a href=\"supporter.php\">",$langmark1333,"</a>.</i></td></tr>";}?>
</table>
<br/>
</td>
<?php if ($show=='konfstats' AND $supp==1) {
$totalG = mysql_query("SELECT COUNT(*) FROM `conf_comments`");
list($total) = @mysql_fetch_row($totalG);
$total1 = mysql_num_rows(mysql_query("SELECT * FROM `conf_comments` WHERE user_id ='$userid'"));
?>
<td class="border" width="40%"><h2>Total amount of Forum posts</h2><br/>
<?php
} elseif ($show=='topost') {
?>
<td class="border" width="40%"><h2>Top forum posters</h2><br/>
<?php
 } else {?>
<td class="border" width="20%"><h2 align="center"><?=$langmark1335?></h2><br/>
<?php }?>
<table width="100%" cellspacing="0" cellpadding="1" border="0">
<?php
if ($show<>'konfstats' AND $show<>'topost') {
$countries = mysql_query("SELECT country, 500 * totalwin / ( 2 * totallose + totalwin ) + ( totaldifference +250 ) / 2.5 +150 + ( totallose + totalwin -50 ) *3 AS rating FROM countries  WHERE natarena >0 ORDER BY 500 * totalwin / ( 2 * totallose + totalwin ) + ( totaldifference +250 ) / 2.5 +150 + ( totallose + totalwin -50 ) *3 DESC");
$c = 0;
while ($c < mysql_num_rows($countries)) {
$country1 = mysql_result($countries,$c,"country");
$rating1 = mysql_result($countries,$c,"rating");
//echo "<tr><td align=\"right\">",($c+1),".&nbsp;&nbsp;&nbsp;<a href=\"nationalteams.php?country=",$country1,"\"><img src=\"img/Flags/",$country1,".png\" border=\"0\" alt=\"",$country1,"\" title=\"",$country1,"\"></a></td><td align=\"right\">",round($rating1+$dodatekN),"&nbsp;&nbsp;&nbsp;</td></tr>";
echo "<tr><td align=\"right\">",($c+1),".&nbsp;&nbsp;<a href=\"nationalteams.php?country=",$country1,"\"><img src=\"img/Flags/",$country1,".png\" border=\"0\" alt=\"",$country1,"\" title=\"",$country1,"\"></a></td><td align=\"center\">&nbsp;&nbsp;",round($rating1+$dodatekU),"</td><td align=\"right\">&nbsp;&nbsp;</td></tr>";
$c++;
}
}

if ($show=='konfstats' AND $supp==1) {
?>
<?=$langmark1336?> <b><?=$total?></b><br/>
<?=$langmark1337?> <b><?=$total1?></b><br/><br/>
<?php
$pina = mysql_query("SELECT `folder_id` FROM `conf_folders` WHERE `folder_type` = 'G' ORDER BY `folder_id` ASC");
while($r=mysql_fetch_array($pina)) {
$tema=$r["folder_id"];
$pn = mysql_query("SELECT `conf_comments`.`comment_id` FROM `conf_comments`,  `conf_topics` WHERE `conf_comments`.`topic_id` = `conf_topics`.`topic_id` AND `conf_topics`.`folder_id` = '$tema'");
$vlak = mysql_num_rows($pn);
$delez = round(1000*$vlak/$total);
echo $tema," - <b>",$vlak,"</b>";
?>
<table cellpadding="0" cellspacing="0" width="150" border="1"><tr><td style="background-image:url('img/right.jpg')" valign="middle" width="<?=$delez?>%"></td><td width="<?=(125-$delez)?>%">&nbsp;</tr></table>
<?php
}
?>
<br/>
<?php
$pina = mysql_query("SELECT `folder_id` FROM `conf_folders` WHERE `folder_type` = 'N' AND `folder_id` NOT LIKE 'Non-%' ORDER BY `folder_id` ASC");
while($r=mysql_fetch_array($pina)) {
$tema=$r["folder_id"];
$pn = mysql_query("SELECT `conf_comments`.`comment_id` FROM `conf_comments`,  `conf_topics` WHERE `conf_comments`.`topic_id` = `conf_topics`.`topic_id` AND `conf_topics`.`folder_id` = '$tema'");
$delez = 10 * round(100*mysql_num_rows($pn)/$total,1);
echo $tema," - <b>",mysql_num_rows($pn),"</b>";
?>
<table cellpadding="0" cellspacing="0" width="150" border="1"><tr><td style="background-image:url(img/left.jpg)" valign="middle" width="<?=$delez?>%"></td><td width="<?=(125-$delez)?>%">&nbsp;</tr></table>
<?php
}
}
if ($show=='topost') {
$zime = $_POST['time'];
if (!$zime) {$zime = $_GET['time'];}
?>

<form method="post" action="stats.php?show=topost&time=<?=$zime?>" style="margin: 0" name="tijuk">
<select name="time"  OnChange="location.href='stats.php?show=topost&time='+tijuk.time.options[selectedIndex].value" class="inputreg">
<option name="alltime" value="alltime" <?php if ($zime=='alltime'){echo "selected";}?>>All time top posters</option>
<option name="seasn" value="seasn" <?php if ($zime=='seasn'){echo "selected";}?>>Current season top</option>
<input type="submit" value="&nbsp;&raquo;" name="submit" class="buttonreg">
</form><tr><td colpsan="2"><br/></td></tr>

<?php
/*
# Query_time: 0  Lock_time: 0  Rows_sent: 50  Rows_examined: 505243
SELECT userid, username, COUNT( * ) AS stevilo FROM conf_comments, users WHERE date_comment > '2014-08-25 20:00:00' AND user_id = userid GROUP BY userid ORDER BY stevilo DESC LIMIT 50;

nekam bi moral zapisati število objav za userja ter število objav v trenutni sezoni
*/

if ($zime=='seasn') {$stuser = mysql_query("SELECT userid, username, COUNT( * ) AS stevilo FROM conf_comments, users WHERE date_comment > '2014-08-25 20:00:00' AND user_id = userid GROUP BY userid ORDER BY stevilo DESC LIMIT 50");} else {$stuser = mysql_query("SELECT userid, username, COUNT( * ) AS stevilo FROM conf_comments, users WHERE user_id = userid GROUP BY userid ORDER BY stevilo DESC LIMIT 100");}
while($f=mysql_fetch_array($stuser)) {
$userc = $f["userid"];
$dim = $f['username'];
$count = $f["stevilo"];
$dr=1+$dr;
if ($userc==$userid AND $supp==1) {$ciat='#FFCC66';} else {$ciat='white';}
echo "<tr><td bgcolor=\"",$ciat,"\">",$dr,". <a href=\"club.php?clubid=",$userc,"\">",$dim,"</a></td><td align=\"right\" bgcolor=\"",$ciat,"\">",$count," posts</td></tr>";}
}
?>
</table>
<?php
if ($show<>'konfstats' AND $show<>'topost') {
?>
</td>
<td class="border" width="20%">
<h2 align="center">U19 rankings</h2><br/>
<table width="99%" cellspacing="0" cellpadding="1" border="0">
<?php
$countries = mysql_query("SELECT country, 500 * totalwin / ( 2 * totallose + totalwin ) + ( totaldifference +250 ) / 2.5 +150 + ( totallose + totalwin -50 ) *3 AS rating FROM u18countries  WHERE natarena >0 ORDER BY 500 * totalwin / ( 2 * totallose + totalwin ) + ( totaldifference +250 ) / 2.5 +150 + ( totallose + totalwin -50 ) *3 DESC");
$c = 0;
while ($c < mysql_num_rows($countries)) {
$country1 = mysql_result($countries,$c,"country");
$rating1 = mysql_result($countries,$c,"rating");
//echo "<tr><td align=\"right\">",($c+1),".&nbsp;&nbsp;&nbsp;<a href=\"u18teams.php?country=",$country1,"\"><img src=\"img/Flags/",$country1,".png\" border=\"0\" alt=\"",$country1,"\" title=\"",$country1,"\"></a></td><td align=\"right\">",round($rating1+$dodatekU),"&nbsp;&nbsp;&nbsp;</td></tr>";
echo "<tr><td align=\"right\">",($c+1),".&nbsp;&nbsp;<a href=\"u18teams.php?country=",$country1,"\"><img src=\"img/Flags/",$country1,".png\" border=\"0\" alt=\"",$country1,"\" title=\"",$country1,"\"></a></td><td align=\"center\">&nbsp;&nbsp;",round($rating1+$dodatekU),"</td><td align=\"right\">&nbsp;&nbsp;</td></tr>";
$c++;
}
?>
</table>
</td>
<?php
}
?>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>