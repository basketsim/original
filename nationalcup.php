<?php
$country=$_GET['country'];
if ($country=='Bosnia and Herzegovina') {$country='Bosnia';}
if (!$country) {die(include 'index.php');}
$country=strip_tags($country);
$country=addslashes($country);

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$sseason = $_POST["sseason"];
if (!$sseason) {$sseason = $_GET["season"]; $mvpja=$_GET['mvpja'];} else {$mvpja=0;}
if (!$sseason) {$sseason=$default_season;} /* ZAČASNO lahko -1!!! */
if (!is_numeric($sseason)) {die(include 'basketsim.php');}
if ($sseason==$default_season) {$ladjy=14;}

$compare = mysql_query("SELECT `lang` FROM `users` WHERE password ='$koda' AND `userid` ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)) {$lang = mysql_result($compare,0,"lang");} else {die(include 'basketsim.php');}

if ($ladjy==14) {
$ob = mysql_query("SELECT level FROM leagues WHERE active=1 AND country='$country' ORDER BY level DESC LIMIT 1");
if (!mysql_num_rows($ob)) {die(include 'index.php');}
$obrazec = mysql_result($ob,0);
if ($obrazec==3) {$preveritev = 6; $chuka=8;}
if ($obrazec==4) {$preveritev = 8; $kjada=1; $chuka=10;}
if ($obrazec==5) {$preveritev = 10; $kjada=2; $chuka=10;}
}
else {
$ob = mysql_query("SELECT * FROM matches WHERE `type` =3 AND `season` ='$sseason' AND `country` ='$country'");
$obrazec = mysql_num_rows($ob);
if ($obrazec > 64) {$preveritev = 6; $chuka=6;}
if ($obrazec > 128) {$preveritev = 8; $chuka=8;}
if ($obrazec > 512) {$preveritev = 10; $chuka=10;}
}

//kateri krog pokala je aktiven
$krogpokala = mysql_query("SELECT `cupstatus` FROM `teams` WHERE `country` ='$country' ORDER BY `cupstatus` DESC LIMIT 2") or die(mysql_error());
if (mysql_num_rows($krogpokala) > 0) {
$krog = mysql_result($krogpokala,0);
$krog1 = mysql_result($krogpokala,1);
}
else {die(include 'index.php');}

$round=$_POST["round"];
if ($krog <> $krog1) {$krog=$krog-1;}
if (!$round) {$round=$_GET["round"];}
if (!$round) {$round = $krog;}
if ($mvpja==55) {$round=$chuka;}

$cupmatches = mysql_query("SELECT * FROM `matches` WHERE `type` =3 AND `lid_round` ='$round' AND `season`='$sseason' AND `country`='$country'");
$verify = mysql_fetch_row($cupmatches);
if (!$verify) {
$konecpok = mysql_query("SELECT name FROM `teams` WHERE `country`='$country' AND `cupstatus`='$round'");
if (mysql_num_rows($konecpok)) {$zmagovalec = mysql_result($konecpok,0);}
else {$round=1; $cupmatches = mysql_query("SELECT * FROM `matches` WHERE `type` =3 AND `lid_round` ='$round' AND `season`='$sseason' AND `country`='$country'");}
}
$mat=mysql_num_rows($cupmatches);

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2><?=$langmark365?></h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="63%">
<?php
$m=0;
while ($m < $mat) {
$matchid=mysql_result($cupmatches,$m,"matchid");
$home_id=mysql_result($cupmatches,$m,"home_id");
$home_name=mysql_result($cupmatches,$m,"home_name");
$away_id=mysql_result($cupmatches,$m,"away_id");
$away_name=mysql_result($cupmatches,$m,"away_name");
$crowd=mysql_result($cupmatches,$m,"crowd1");
$home_score=mysql_result($cupmatches,$m,"home_score");
$away_score=mysql_result($cupmatches,$m,"away_score");
$time=mysql_result($cupmatches,$m,"time");
$type=mysql_result($cupmatches,$m,"type");
$home_set=mysql_result($cupmatches,$m,"home_set");
$away_set=mysql_result($cupmatches,$m,"away_set");
if ($home_score==$away_score) {$dabu1='black'; $dabu2='black';} elseif ($home_score > $away_score) {$dabu1='#111625'; $dabu2='#A8A39D';} else {$dabu2='#111625'; $dabu1='#A8A39D';}

$result1 = mysql_query("SELECT name, status, shirt FROM teams WHERE teamid ='$home_id' LIMIT 1");
if ($home_name == '') {$home_name = mysql_result($result1,0,"name");}
$status1 = mysql_result($result1,0,"status");
$majcka1 = mysql_result($result1,0,"shirt");
$result2 = mysql_query("SELECT name, status, shirt FROM teams WHERE teamid ='$away_id' LIMIT 1");
if ($away_name == '') {$away_name = mysql_result($result2,0,"name");}
$status2 = mysql_result($result2,0,"status");
$majcka2 = mysql_result($result2,0,"shirt");
$supp1=0;
$supp2=0;
$linkec1 = "team.php?clubid=".$home_id;
$linkec2 = "team.php?clubid=".$away_id;
$lact1='';
$lact2='';
if ($status1==1) {
$limp1 = mysql_query("SELECT `userid`, `last_active`, `bad_login`, `supporter`, `purchase`, `level` FROM users WHERE club=$home_id LIMIT 1");
$link1 = @mysql_result($limp1,0,"userid");
$lact1 = @mysql_result($limp1,0,"last_active");
$badl1 = @mysql_result($limp1,0,"bad_login");
$supp1 = @mysql_result($limp1,0,"supporter");
$purc1 = @mysql_result($limp1,0,"purchase");
$lev1 = @mysql_result($limp1,0,"level");
if ($lev1 >1) {$supp1=1;}
if ($purc1<>'0000-00-00 00:00:00') {$supp1=1;}
$linkec1 = "club.php?clubid=".$link1;
}
if ($status2==1) {
$limp2 = mysql_query("SELECT `userid`, `last_active`, `bad_login`, `supporter`, `purchase`, `level` FROM users WHERE club=$away_id");
$link2 = @mysql_result($limp2,0,"userid");
$lact2 = @mysql_result($limp2,0,"last_active");
$badl2 = @mysql_result($limp2,0,"bad_login");
$supp2 = @mysql_result($limp2,0,"supporter");
$purc2 = @mysql_result($limp2,0,"purchase");
$lev2 = @mysql_result($limp2,0,"level");
if ($lev2 >1) {$supp2=1;}
if ($purc2<>'0000-00-00 00:00:00') {$supp2=1;}
$linkec2 = "club.php?clubid=".$link2;
}
if ($supp1==0) {$majcka1='cupspic';}
if ($supp2==0) {$majcka2='cupspic';}
if ($status1==3) {$majcka1='';}
if ($status2==3) {$majcka2='';}
if ($userid==1 AND $badl1>98) {$majcka1='';}
if ($userid==1 AND $badl2>98) {$majcka2='';}
if ($userid==1 AND $lact1 > date("Y-m-d H:i:s",time()-30*60)) {$isonlaj1='° ';} else {$isonlaj1='';}
if ($userid==1 AND $lact2 > date("Y-m-d H:i:s",time()-30*60)) {$isonlaj2=' °';} else {$isonlaj2='';}
?>
<table cellpadding="1" cellspacing="0" width="100%" border="0"><tr width="100%" onmouseover="style.backgroundColor='#F5DEB3';" onmouseout="style.backgroundColor='white'">
<td align="left" width="45%"><?php if($majcka1<>''){?><img src="img/shirts/<?=$majcka1?>.gif" border="0" height="13"><?php }?>&nbsp;<?=$isonlaj1,"<a href=\"",$linkec1,"\" class=\"greenhilite\"><font color=\"$dabu1\">",stripslashes($home_name),"</font></a>"?></td>
<td align="center" width="10%">
<?php if (($home_score+$away_score==21 && $time < '2009-01-11 22:30:01') || ($type==2 && $time < '2007-08-30 03:00:00')) {?><?php } else {$dnn=33;?><a href="prikaz.php?matchid=<?=$matchid?>"><?php }
if ($home_score+$away_score==0 && $crowd >0) {echo "LIVE";} else {?><?=$home_score?>&nbsp;:&nbsp;<?=$away_score?><?php }?><?php if ($dnn==33) {echo "</a>";}?></td>
<td align="right" width="45%"><?="<a href=\"",$linkec2,"\" class=\"greenhilite\"><font color=\"$dabu2\">",stripslashes($away_name),"</font></a>",$isonlaj2;?>&nbsp;<?php if($majcka2<>''){?><img src="img/shirts/<?=$majcka2?>.gif" border="0" height="13"><?php }?></td></tr></table>
<?php
$m++;
}
if ($mat==1) {
$finalce = mysql_query("SELECT `arena_id`, `time` FROM `matches` WHERE `lid_round` ='$round' AND `type` =3 AND `country` ='$country' AND season ='$sseason' ORDER BY `lid_round` DESC LIMIT 1");
$fin1 = mysql_result($finalce,0,"arena_id");
$fin2 = mysql_result($finalce,0,"time");
$zakljuc = mysql_query("SELECT arenaname AS arenaname, seats1+seats2+seats3+seats4 AS capcity, city AS region, arena.teamid AS tojeto FROM arena, teams WHERE arena.teamid = teams.teamid AND arena.arenaid = $fin1");
echo "<br/><img src=\"img/cupaward.png\" alt=\"",$langmark758,"\" title=\"",$langmark758,"\" border=\"0\"><br/>";
echo "<br/><b>",$langmark755,"</b><br/>";
echo "<b>",$langmark756,":</b> ",$fin2,"<br/>";
echo "<b>",$langmark181,":</b> <a href=\"cheerleaders.php?squad=",mysql_result($zakljuc,0,"tojeto"),"\">",stripslashes(mysql_result($zakljuc,0,"arenaname")),"</a> (",mysql_result($zakljuc,0,"region"),") ",mysql_result($zakljuc,0,"capcity")," ",$langmark757;
//cup mvp
$hahaha = mysql_query("SELECT player, name, surname, teamname FROM top_players, players WHERE player=players.id AND type=3 AND season='$sseason' AND top_players.country='$country'") or die(mysql_error());
if (mysql_num_rows($hahaha)) {
$idMVP = mysql_result($hahaha,0,"player");
$namMVP = mysql_result($hahaha,0,"name");
$surMVP = mysql_result($hahaha,0,"surname");
$teamMVP = mysql_result($hahaha,0,"teamname");
echo "<br/><hr/><br/><b>National cup MVP award:</b> <a href=\"player.php?playerid=",$idMVP,"\">",$namMVP," ",$surMVP,"</a> (",stripslashes($teamMVP),")";
} elseif($sseason==$default_season) {echo "<br/><b>National cup MVP</b> will be awarded on Thursday after the Final.";} else {echo "<br/><hr/><br/><b>National cup MVP award:</b> <i>retired player</i>";}
}
if ($mat==0 AND $sseason < $default_season) {echo "<i>This country was either added in later season or had less rounds in the season you are currently checking!</i>";}
?>

</td><td class="border" width="37%">

<big><?=$langmark366," ",$country?></big><br/>

<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="margin: 0">
<select name="round" class="inputreg">
<?php if ($krog > 0 || $sseason < $default_season){?><option value="1" <?php if ($round==1){echo "selected";}?>><?=$langmark367?> 1</option><?php } ?>
<?php if ($krog > 1 || $sseason < $default_season){?><option value="2" <?php if ($round==2){echo "selected";}?>><?=$langmark367?> 2</option><?php } ?>
<?php if ($krog > 2 || $sseason < $default_season){?><option value="3" <?php if ($round==3){echo "selected";}?>><?=$langmark367?> 3</option><?php } ?>
<?php if ($krog > 3 || $sseason < $default_season){?><option value="4" <?php if ($round==4){echo "selected";}?>><?=$langmark367?> 4</option><?php } ?>
<?php if ($krog > 4 || $sseason < $default_season){?><option value="5" <?php if ($round==5){echo "selected";}?>><?=$langmark367?> 5</option><?php } ?>
<?php if ($krog > 5 || $sseason < $default_season){?><option value="6" <?php if ($round==6){echo "selected";}?>><?=$langmark367?> 6</option><?php } ?>
<?php if ($krog > 6 || ($sseason < $default_season && $preveritev > 6)){?><option value="7" <?php if ($round==7){echo "selected";}?>><?=$langmark367?> 7</option><?php } ?>
<?php if ($krog > 7 || ($sseason < $default_season && $preveritev > 7)){?><option value="8" <?php if ($round==8){echo "selected";}?>><?=$langmark367?> 8</option><?php } ?>
<?php if ($krog > 8 || ($sseason < $default_season && $preveritev > 8)){?><option value="9" <?php if ($round==9){echo "selected";}?>><?=$langmark367?> 9</option><?php } ?>
<?php if ($krog > 9 || ($sseason < $default_season && $preveritev > 9)){?><option value="10" <?php if ($round==10){echo "selected";}?>><?=$langmark367?> 10</option><?php } ?>
<?php if ($krog > 10 || ($sseason < $default_season && $preveritev > 10)){?><option value="11" <?php if ($round==11){echo "selected";}?>><?=$langmark367?> 11</option><?php } ?>
<?php if ($krog > 11 || ($sseason < $default_season && $preveritev > 11)){?><option value="12" <?php if ($round==12){echo "selected";}?>><?=$langmark367?> 12</option><?php } ?>
</select>

<select name="sseason" class="inputreg">
<?php
$kose = $default_season;
while($kose >= 1) {?>
<option value="<?=$kose?>" <?php if($sseason==$kose){echo "selected";}?>><?=$langmark502," ",$kose?></option>
<?php
$kose--;
}
?>
</select>
<input type="submit" value="&nbsp;&raquo;" name="submit" class="buttonreg">
</form>

<?php
/*
?>
<br/><b><?=$langmark369?>:</b><br/>
<?=$langmark370?><br/>
<?=$langmark371?><br/>
<?php if ($country=='Latvia' OR $country=='Slovenia' OR $country=='Italy' OR $country=='Poland' OR $country=='Greece' OR $country=='Bosnia' OR $country=='Israel' OR $country=='Spain' OR $country=='USA') {echo $langmark1491,"<br/>Top teams qualify for <a href=\"intrank.php\">Cup Winners Series</a>";} else {?>
<?=$langmark373?><br/>
<?=$langmark372?><br/>
Top teams qualify for <a href="intrank.php">Cup Winners Series</a>
<?php
}
*/

if ($ladjy==14) {
?>

<a href="/gamerules.php?action=matches&#35;ncrules"><?=$langmark369?></a>

<br/><br/><b><?=$langmark374?>:</b><br/>
<?php
$ekipezapokal = mysql_query("SELECT short_name, city, logo, userid FROM teams, users WHERE teams.teamid=users.club AND country = '$country' AND logo <> '' AND cupstatus >= $round ORDER BY RAND() LIMIT 1") or die(mysql_error());
if (!mysql_num_rows($ekipezapokal)) {echo $langmark375;} else {
$short_name = mysql_result($ekipezapokal,0,"short_name");
$city = mysql_result($ekipezapokal,0,"city");
$logo = mysql_result($ekipezapokal,0,"logo");
$linkec = mysql_result($ekipezapokal,0,"userid");
echo "<a href=\"club.php?clubid=",$linkec,"\">",stripslashes($short_name),"</a> (<a href=\"region.php?region=",$city,"\">",$city,"</a>)<br/>";
echo "<img src=",$logo," width=\"80\" border=\"0\" alt=\"",$langmark376,"\" title=\"",$langmark376,"\">";}
}
//if ($country=='Romania') {echo "<br/><br/><i><a href=\"club.php?clubid=29\">paopao</a> contributes 6 months supporter for winner and 3 months for runner up!</i>";}
echo "<br/>";

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

if ($ladjy==14 AND $round > 1) {
echo "<br/><h2>Still in cup</h2><br/>";
$liga1 = mysql_query("SELECT COUNT(*) FROM `teams` , competition, leagues WHERE teams.country = '$country' AND season =$sseason AND leagues.level =1 AND cupstatus >= $round AND leagues.leagueid = competition.leagueid AND competition.teamid = teams.teamid");
list($ligaprikaz1) = mysql_fetch_row($liga1);
$liga2 = mysql_query("SELECT COUNT(*) FROM `teams` , competition, leagues WHERE teams.country = '$country' AND season =$sseason AND leagues.level =2 AND cupstatus >= $round AND leagues.leagueid = competition.leagueid AND competition.teamid = teams.teamid");
list($ligaprikaz2) = mysql_fetch_row($liga2);
$liga3 = mysql_query("SELECT COUNT(*) FROM `teams` , competition, leagues WHERE teams.country = '$country' AND season =$sseason AND leagues.level =3 AND cupstatus >= $round AND leagues.leagueid = competition.leagueid AND competition.teamid = teams.teamid");
list($ligaprikaz3) = mysql_fetch_row($liga3);
if ($kjada>0) {
$liga4 = mysql_query("SELECT COUNT(*) FROM `teams` , competition, leagues WHERE teams.country = '$country' AND season =$sseason AND leagues.level =4 AND cupstatus >= $round AND leagues.leagueid = competition.leagueid AND competition.teamid = teams.teamid");
list($ligaprikaz4) = mysql_fetch_row($liga4);}
if ($kjada>1) {
$liga5 = mysql_query("SELECT COUNT(*) FROM `teams` , competition, leagues WHERE teams.country = '$country' AND season =$sseason AND leagues.level =5 AND cupstatus >= $round AND leagues.leagueid = competition.leagueid AND competition.teamid = teams.teamid");
list($ligaprikaz5) = mysql_fetch_row($liga5);}
$deljenc = max($ligaprikaz1, $ligaprikaz2, $ligaprikaz3, $ligaprikaz4, $ligaprikaz5);
$osnova= (19-$round)*10;
$width1x = round($ligaprikaz1 * $osnova / $deljenc);
$width2x = round($ligaprikaz2 * $osnova / $deljenc);
$width3x = round($ligaprikaz3 * $osnova / $deljenc);
$width4x = round($ligaprikaz4 * $osnova / $deljenc);
$width5x = round($ligaprikaz5 * $osnova / $deljenc);

echo "<table cellpadding=\"0\" cellspacing=\"0\" width=\"190\" border=\"0\">";
if ($ligaprikaz1==1) {echo "<tr><td align=\"left\" width=\"10\"><b>1.1</b>&nbsp;</td><td style=\"background-image:url(img/testbar1.gif)\" width=\"",$width1x,"\" title=\"1 team left from league level 1\"></td><td align=\"left\" title=\"1 team left from league level 1\">&nbsp;<b>1</b></td></tr>";} elseif ($ligaprikaz1==2) {echo "<tr><td align=\"left\" width=\"10\"><b>1.1</b>&nbsp;</td><td style=\"background-image:url(img/testbar1.gif)\" width=\"",$width1x,"\" title=\"2 teams left from league level 1\"></td><td align=\"left\" title=\"2 teams left from league level 1\">&nbsp;<b>2</b></td></tr>";} else {echo "<tr><td align=\"left\" width=\"10\"><b>1.1</b>&nbsp;</td><td style=\"background-image:url(img/testbar1.gif)\" width=\"",$width1x,"\" title=\"",$ligaprikaz1," teams left from league level 1\"></td><td width=\"",(180-$width1x),"\" title=\"",$ligaprikaz1," teams left from league level 1\">&nbsp;<b>",$ligaprikaz1,"</b></td></tr>";}
echo "</table>";
echo "<table cellpadding=\"0\" cellspacing=\"0\" width=\"190\" border=\"0\">";
if ($ligaprikaz2==1) {echo "<tr><td align=\"left\" width=\"10\"><b>2.x</b>&nbsp;</td><td style=\"background-image:url(img/testbar1.gif)\" width=\"",$width2x,"\" title=\"1 team left from league level 2\"></td><td align=\"left\" title=\"1 team left from league level 2\">&nbsp;<b>1</b></td></tr>";} elseif ($ligaprikaz2==2) {echo "<tr><td align=\"left\" width=\"10\"><b>2.x</b>&nbsp;</td><td style=\"background-image:url(img/testbar1.gif)\" width=\"",$width2x,"\" title=\"2 teams left from league level 2\"></td><td align=\"left\" title=\"2 teams left from league level 2\">&nbsp;<b>2</b></td></tr>";} else {echo "<tr><td align=\"left\" width=\"10\"><b>2.x</b>&nbsp;</td><td style=\"background-image:url(img/testbar1.gif)\" width=\"",$width2x,"\" title=\"",$ligaprikaz2," teams left from league level 2\"></td><td width=\"",(180-$width2x),"\" title=\"",$ligaprikaz2," teams left from league level 2\">&nbsp;<b>",$ligaprikaz2,"</b></td></tr>";}
echo "</table>";
echo "<table cellpadding=\"0\" cellspacing=\"0\" width=\"190\" border=\"0\">";
if ($ligaprikaz3==1) {echo "<tr><td align=\"left\" width=\"10\"><b>3.x</b>&nbsp;</td><td style=\"background-image:url(img/testbar1.gif)\" width=\"",$width3x,"\" title=\"1 team left from league level 3\"></td><td align=\"left\" title=\"1 team left from league level 3\">&nbsp;<b>1</b></td></tr>";} elseif ($ligaprikaz3==2) {echo "<tr><td align=\"left\" width=\"10\"><b>3.x</b>&nbsp;</td><td style=\"background-image:url(img/testbar1.gif)\" width=\"",$width3x,"\" title=\"2 team left from league level 3\"></td><td align=\"left\" title=\"2 teams left from league level 3\">&nbsp;<b>2</b></td></tr>";} else {echo "<tr><td align=\"left\" width=\"10\"><b>3.x</b>&nbsp;</td><td style=\"background-image:url(img/testbar1.gif)\" width=\"",$width3x,"\" title=\"",$ligaprikaz3," teams left from league level 3\"></td><td width=\"",(180-$width3x),"\" title=\"",$ligaprikaz3," teams left from league level 3\">&nbsp;<b>",$ligaprikaz3,"</b></td></tr>";}
echo "</table>";
if ($kjada>0) {
echo "<table cellpadding=\"0\" cellspacing=\"0\" width=\"190\" border=\"0\">";
if ($ligaprikaz4==1) {echo "<tr><td align=\"left\" width=\"10\"><b>4.x</b>&nbsp;</td><td style=\"background-image:url(img/testbar1.gif)\" width=\"",$width4x,"\" title=\"1 team left from league level 4\"></td><td align=\"left\" title=\"1 team left from league level 4\">&nbsp;<b>1</b></td></tr>";} elseif ($ligaprikaz4==2) {echo "<tr><td align=\"left\" width=\"10\"><b>4.x</b>&nbsp;</td><td style=\"background-image:url(img/testbar1.gif)\" width=\"",$width4x,"\" title=\"2 teams left from league level 4\"></td><td align=\"left\" title=\"2 teams left from league level 4\">&nbsp;<b>2</b></td></tr>";} else {echo "<tr><td align=\"left\" width=\"10\"><b>4.x</b>&nbsp;</td><td style=\"background-image:url(img/testbar1.gif)\" width=\"",$width4x,"\" title=\"",$ligaprikaz4," teams left from league level 4\"></td><td width=\"",(180-$width4x),"\" title=\"",$ligaprikaz4," teams left from league level 4\">&nbsp;<b>",$ligaprikaz4,"</b></td></tr>";}
echo "</table>";
}
if ($kjada>1) {
echo "<table cellpadding=\"0\" cellspacing=\"0\" width=\"190\" border=\"0\">";
if ($ligaprikaz5==1) {echo "<tr><td align=\"left\" width=\"10\"><b>5.x</b>&nbsp;</td><td style=\"background-image:url(img/testbar1.gif)\" width=\"",$width5x,"\" title=\"1 team left from league level 5\"></td><td align=\"left\" title=\"1 team left from league level 5\">&nbsp;<b>1</b></td></tr>";} elseif ($ligaprikaz5==2) {echo "<tr><td align=\"left\" width=\"10\"><b>5.x</b>&nbsp;</td><td style=\"background-image:url(img/testbar1.gif)\" width=\"",$width5x,"\" title=\"2 teams left from league level 5\"></td><td align=\"left\" title=\"2 teams left from league level 5\">&nbsp;<b>2</b></td></tr>";} else {echo "<tr><td align=\"left\" width=\"10\"><b>5.x</b>&nbsp;</td><td style=\"background-image:url(img/testbar1.gif)\" width=\"",$width5x,"\" title=\"",$ligaprikaz5," teams left from league level 5\"></td><td width=\"",(180-$width5x),"\" title=\"",$ligaprikaz5," teams left from league level 5\">&nbsp;<b>",$ligaprikaz5,"</b></td></tr>";}
echo "</table>";
}
echo "<br/>";} elseif ($ladjy==14 AND $round==1) {echo "<br/>";}

$resultev = mysql_query("SELECT `h_season`, `h_userid`, `h_teamname` FROM `history` WHERE `h_country`='$country' AND `h_type`=3 AND `won`=1");
$all_info = array();
while ($get_info = mysql_fetch_row($resultev)){
$ddr=$ddr+1;
$all_info[] = $get_info;
}
$all_info = multisort($all_info,2,$default_season,'0','1','2');
if ($ddr > 0) {echo "<h2>",$langmark1246,"</h2><br/>";}

/*
$count = 0; //count variable 
$tmp = ''; //temp variable 
*/

foreach($all_info as $get_info) {
$preveritev = mysql_query("SELECT * FROM `users` WHERE `userid`='$get_info[1]' LIMIT 1");
if ($get_info[0] < 10) {$dizp = "0".$get_info[0];} else {$dizp = $get_info[0];}
if (mysql_num_rows($preveritev)) {
echo "<span title=\"",$langmark502," ",$get_info[0],"\"><b>",$dizp," </b></span><a href=\"club.php?clubid=",$get_info[1],"\">",stripslashes($get_info[2]),"</a>";

/*
//SOLUTION -- START
if ($get_info[1] == $tmp){
	$count++;
}else{
	$count=1;
}
$tmp = $get_info[1]; //reset the temp variable.
if ($count >1) {echo " (" . $count . ")";}
*/

echo "<br/>";} else {echo "<span title=\"",$langmark502," ",$get_info[0],"\"><b>",$dizp," </b></span>",stripslashes($get_info[2]),"<br/>";}
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