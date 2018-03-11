<?php
/*
SELECT curname, country, teamid, strength /2 * ( 6 - `level` ) * ( 15 - position ) /111 +30 * win / ( played + 0.01 ) + ( (difference / ( played + 0.01 ) ) +55) /5 +15 AS gacha, `level` , `strength` , `position` , win, lose, difference FROM leagues, competition WHERE leagues.leagueid = competition.leagueid AND season =11 ORDER BY gacha DESC
display '(world) power ranking' on club page (x/32088, global ranking, # of clubs and points maybe) with link to ranking
*/

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT `username`, `club`, `signed`, `lastip`, `lang`, `supporter`, `expire`, `level`, `friendly`, `flags` FROM `users` WHERE `password` ='$koda' AND `userid` ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)) {
$buuu = mysql_result($compare,0,'username');
$trueclub = mysql_result($compare,0,'club');
$signed1 = mysql_result($compare,0,'signed');
$goljufanje = mysql_result($compare,0,'lastip');
$lang = mysql_result($compare,0,'lang');
$is_supporter = mysql_result($compare,0,'supporter');
$expajr = mysql_result($compare,0,'expire');
$moderating = mysql_result($compare,0,'level');
$friendly1 = mysql_result($compare,0,'friendly');
$flagsd = mysql_result($compare,0,'flags');
}
else {die(include 'basketsim.php');}

$clubclub = $_GET['clubid'];
if ($clubclub ==0) {$clubclub = $userid;}
if (!is_numeric($clubclub)) {$clubclub = $userid;}

$query = mysql_query("SELECT * FROM `users` WHERE `userid` ='$clubclub' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($query)) {
$ary = mysql_fetch_array($query);
$username=$ary[username];
$keple=$ary[password];
$email=$ary[email];
$realname=$ary[realname];
$get_team=$ary[club];
$signed=$ary[signed];
$lastlog=$ary[lastlog];
$lastip=$ary[lastip];
$hide_email=$ary[hide_email];
$friendly=$ary[friendly];
$is_online=$ary[is_online];
$lang1=$ary[lang];
$last_active=$ary[last_active];
$huhsupporter=$ary[supporter];
$statuskluba=$ary[bad_login];
$cform=$ary[level];
$s_time=$ary[s_time];
$selektor1=$ary[natcoach];
$selektor2=$ary[nt_country];
$homepage=$ary[homepage];
$flagsd=$ary[flags];
}
else {die(include 'noclub.php');}

//JM
if (($userid==3107 AND $clubclub==89189) OR ($userid==89189 AND $clubclub==3107)) {$dlehen=9;}

//izbris
$cleanup = $_GET["cleanup"];
if ($cleanup=='yes' AND $clubclub == $userid) {mysql_query("DELETE FROM events WHERE type=0 AND description LIKE 'Better%' AND team ='$trueclub' LIMIT 800");}
if ($cleanup=='chall' AND $clubclub == $userid) {mysql_query("DELETE FROM events WHERE type=0 AND description LIKE 'Received ch%' AND team ='$trueclub' LIMIT 800");}

if (isset($_POST['submiban'])) {
$breason = $_POST["breason"];
SWITCH ($breason) {
CASE 1: $fnote="You were banned from forums for spaming. Be aware that spaming makes forums less organized, so it's bad for all users! You will be able to return to forums after your ban expire."; break;
CASE 2: $fnote="You were banned from forums for using inappropriate language. Such behaviour is not welcome on the forums as this game is meant to be fun, and reading such messages can ruin it for other users. You will be able to return to forums after your ban expire."; break;
CASE 3: $fnote="You were banned from forums for abusive replies towards other users. You should always have respect towards other users even if they have different opinion. You will be able to return to forums after your ban expire."; break;
CASE 4: $fnote="You were banned from forums for linking illegal content. Linking any such content is stricktly forbidden! You will be able to return to forums after your ban expire."; break;
CASE 5: $fnote="You were banned from forums for unwanted racial comments. It's totally unacceptable to judge other people based on their skin color, everybody deserves the same respectful treatment. You will be able to return to forums after your ban expire."; break;
CASE 6: $fnote="You were banned from forums for commenting GM decisions. This is stricktly unfair, as gamemasters are volunteers who always try to provide the most fair solutions to the game. If they make mistake this should be reported to gamemasters form or to administration. Each mistake can be and will be corrected."; break;
CASE 7: $fnote="You were banned from forums for abusing Transfer Market Ads forum. Make sure that in the future you will only post there in accordance with the rules provided."; break;
}
$fnote = addslashes($fnote);
$numofday = $_POST['numofday'];
$enddate = mktime(0,0,0,date("m"),date("d")+$numofday,date("Y"));
$endate = date("Y-m-d 07:30:00", $enddate);
mysql_query("UPDATE `users` SET level=0, `s_time` = '$endate' WHERE `userid` ='$clubclub' LIMIT 1") or die(mysql_error());
mysql_query("INSERT INTO `bans` VALUES ('', $userid, $clubclub, $numofday, $breason);") or die(mysql_error());
mysql_query("INSERT INTO `messages` VALUES ('', $clubclub, 0, 0, NOW(), 'From: $buuu', '$fnote');") or die(mysql_error());
header ("Location: club.php?clubid=$clubclub");
}

//sprememba imena
if (isset($_POST['submit97'])) {
$danesni = date("Y-m-d H:i:s");
$tdatetime = explode(" ",$danesni); $ffdate = $tdatetime[0]; $fftime = $tdatetime[1];
$tdate = explode("-", $ffdate); $ffyear = $tdate[0]; $ffmonth = $tdate[1]; $ffday = $tdate[2];
$ttime = explode(":", $fftime); $ffhour = $ttime[0]; $ffmin = $ttime[1]; $ffsec = $ttime[2];
$ffdate = date("Y-m-d", mktime($ffhour,$ffmin,$ffsec,$ffmonth-4,$ffday,$ffyear));
$testren = mysql_query("SELECT eventid FROM `events` WHERE `when` > '$ffdate' AND description LIKE 'Team was renamed.' AND team = '$trueclub'") or die(mysql_error());
if (mysql_num_rows($testren) >0){header("Location: club.php?do=changename&msg=3"); die();}
$nov_ime = $_POST['novime'];
if ($nov_ime=='Free Agent' OR $nov_ime=='College Team' OR $nov_ime=='Youth camp' OR $nov_ime=='Youth Camp'){header("Location: club.php?do=changename&msg=4"); die();}
$novkratk = $_POST['novkratk'];
$nov_ime=strip_tags($nov_ime);
$novkratk=strip_tags($novkratk);
if (strlen(trim($nov_ime)) < 3) {header("Location: club.php?do=changename&msg=1"); die();}
if (strlen(trim($novkratk)) < 2) {header("Location: club.php?do=changename&msg=1"); die();}
$queryunit = mysql_query("SELECT `teamid` FROM `teams` WHERE `status` <2 AND `name` ='$nov_ime'") or die(mysql_error());
$verify1 = mysql_fetch_row($queryunit); if ($verify1){header("Location: club.php?do=changename&msg=2"); die();}
$nov_ime=addslashes($nov_ime);
$novkratk=addslashes($novkratk);
mysql_query("UPDATE competition SET curname = '$nov_ime' WHERE season ='$default_season' AND teamid ='$trueclub' LIMIT 1") or die(mysql_error());
mysql_query("UPDATE teams SET name = '$nov_ime', short_name = '$novkratk', curmoney=curmoney-125000 WHERE teamid=$trueclub LIMIT 1");
mysql_query("INSERT INTO events VALUES ('', $trueclub, NOW(), 'Team was renamed.', 0, -125000);");
mysql_query("INSERT INTO history VALUES ('', $userid, $trueclub, '$nov_ime', 125, 0, 0, $default_season, '', 0, '', 0);");
mysql_query("INSERT INTO events VALUES ('', $trueclub, NOW(), '125.000 &euro; was payed after team was renamed.', 1, -125000);");
header( 'Location: club.php' );
}

//sprememba regije
if (isset($_POST['submit999'])) {
$new_region = $_POST["new_region"];
$new_region=strip_tags($new_region);
mysql_query("UPDATE teams SET city = '$new_region' WHERE teamid=$trueclub LIMIT 1");
header( 'Location: club.php' );
}

//gb-dodano
if (isset($_POST['gadd'])) {
if (!$ginput) {header( "location: club.php?clubid=$clubclub&guest=empty" );}
else {
$ginput = $_POST['ginput'];
$ginput = addslashes($ginput);
$ginput = htmlspecialchars(stripslashes($ginput));
mysql_query("INSERT INTO guestbook VALUES ( '', $userid, '$ginput', $clubclub, NOW() );") or die(mysql_error());
}
}

$result = mysql_query("SELECT `name`, `short_name`, `city`, `country`, `shirt`, `logo`, `arenaname`, `fans`, `cheer_name`, `conwins` FROM `teams`, `arena` WHERE `teams`.`teamid`=`arena`.`teamid` AND `teams`.`teamid` ='$get_team' LIMIT 1") or die(mysql_error());
$arx = mysql_fetch_array($result);
$name=$arx[name];
$shortname=$arx[short_name];
$city=$arx[city];
$country=$arx[country];
$shirt=$arx[shirt];
if ($huhsupporter==0 AND $cform<2) {$shirt='white';}
$logo=$arx[logo];
$arenam=$arx[arenaname];
$nofans=$arx[fans];
$fanclub=$arx[cheer_name];
$conwins=$arx[conwins];

$arenam = stripslashes($arenam);
$zaheader = stripslashes($name);

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');

$result12 = mysql_query("SELECT leagues.leagueid AS leagueid, leagues.name AS name1, competition.position AS position FROM competition, leagues WHERE competition.leagueid = leagues.leagueid AND competition.season ='$default_season' AND competition.teamid ='$get_team' LIMIT 1") or die(mysql_error());
$whleague = mysql_result($result12,0,"leagueid");
$uvrscen = mysql_result($result12,0,"position");
$leaguenam = mysql_result($result12,0,"name1");

$result14 = mysql_query("SELECT * FROM statements WHERE `user` ='$clubclub' ORDER BY `id` DESC LIMIT 1") or die(mysql_error());
if (mysql_num_rows($result14)) {
$id=mysql_result($result14,0,"id");
$title=mysql_result($result14,0,"title");
$content=mysql_result($result14,0,"content");
$user=mysql_result($result14,0,"user");
$tSime=mysql_result($result14,0,"time");
}

SWITCH ($country) {
CASE 'Argentina': $localname='Argentina'; break;
CASE 'Australia': $localname='Australia'; break;
CASE 'Belgium': $localname='Belgium'; break;
CASE 'Bosnia': $localname='Bosna i Hercegovina'; break;
CASE 'Brazil': $localname='Brasil'; break;
CASE 'Bulgaria': $localname='Bulgaria'; break;
CASE 'Canada': $localname='Canada'; break;
CASE 'Chile': $localname='Chile'; break;
CASE 'China': $localname='China'; break;
CASE 'Colombia': $localname='Colombia'; break;
CASE 'Montenegro': $localname='Crna Gora'; break;
CASE 'Cyprus': $localname='Cyprus'; break;
CASE 'Czech Republic': $localname='&#268;esk&aacute; republika'; break;
CASE 'Denmark': $localname='Danmark'; break;
CASE 'Germany': $localname='Deutschland'; break;
CASE 'Estonia': $localname='Eesti'; break;
CASE 'Egypt': $localname='Egypt'; break;
CASE 'Spain': $localname='Espa&#241;a'; break;
CASE 'France': $localname='France'; break;
CASE 'Greece': $localname='Hellas'; break;
CASE 'Hong Kong': $localname='Hong Kong'; break;
CASE 'Croatia': $localname='Hrvatska'; break;
CASE 'Indonesia': $localname='Indonesia'; break;
CASE 'India': $localname='India'; break;
CASE 'Ireland': $localname='Ireland'; break;
CASE 'Israel': $localname='Israel'; break;
CASE 'Italy': $localname='Italia'; break;
CASE 'Latvia': $localname='Latvija'; break;
CASE 'Lithuania': $localname='Lietuva'; break;
CASE 'Hungary': $localname='Magyarorsz&aacute;g'; break;
CASE 'FYR Macedonia': $localname='Makedonija'; break;
CASE 'Malaysia': $localname='Malaysia'; break;
CASE 'Malta': $localname='Malta'; break;
CASE 'Mexico': $localname='M&eacute;xico'; break;
CASE 'Austria': $localname='&Ouml;sterreich'; break;
CASE 'Netherlands': $localname='Nederland'; break;
CASE 'New Zealand': $localname='New Zealand'; break;
CASE 'Norway': $localname='Norge'; break;
CASE 'Peru': $localname='Per&uacute;'; break;
CASE 'Philippines': $localname='Pilipinas'; break;
CASE 'Poland': $localname='Polska'; break;
CASE 'Portugal': $localname='Portugal'; break;
CASE 'Thailand': $localname='Prathet Thai'; break;
CASE 'Romania': $localname='Rom&#226;nia'; break;
CASE 'Russia': $localname='Rossiya'; break;
CASE 'Switzerland': $localname='Schweiz'; break;
CASE 'Albania': $localname='Shqiperia'; break;
CASE 'Slovenia': $localname='Slovenija'; break;
CASE 'Slovakia': $localname='Slovensko'; break;
CASE 'South Korea': $localname='South Korea'; break;
CASE 'Serbia': $localname='Srbija'; break;
CASE 'Finland': $localname='Suomi'; break;
CASE 'Sweden': $localname='Sverige'; break;
CASE 'Tunisia': $localname='T&#363;nis'; break;
CASE 'Turkey': $localname='T&uuml;rkiye'; break;
CASE 'Ukraine': $localname='Ukrayina'; break;
CASE 'United Kingdom': $localname='United Kingdom'; break;
CASE 'Uruguay': $localname='Uruguay'; break;
CASE 'USA': $localname='USA'; break;
CASE 'Venezuela': $localname='Venezuela'; break;
CASE 'Japan': $localname='Nippon'; break;
CASE 'Georgia': $localname='Sakartvelo'; break;
CASE 'Belarus': $localname='Belarus'; break;
CASE 'Puerto Rico': $localname='Puerto Rico'; break;
}
?>

<div id="main">
<h2>Basketsim >> <?=stripslashes($name)?></h2>

<?php
$action = $_GET["action"];
//bookmark
if ($action == bookmark) {
$already = mysql_query("SELECT * FROM bookmarks WHERE b_type = 2 AND team=$trueclub AND b_link ='$clubclub' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($already) > 0) {echo "<table cellpadding=\"9\" cellspacing=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">",$langmark473," ",$langmark094," <a href=\"bookmarks.php\">",$langmark095,"</a>.</td></tr></table>";
}
else
{
mysql_query("INSERT INTO `bookmarks` VALUES ('', $trueclub, '$name', $clubclub, 2, 1);") or die(mysql_error());
echo "<table cellpadding=\"9\" cellspacing=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">",$langmark474," ",$langmark094," <a href=\"bookmarks.php\">",$langmark095,"</a>.</td></tr></table>";
}
}

$coachaction = $_GET['action'];
if ($coachaction == 'showpast' AND ($is_supporter==1 || $moderating >1)) {$gtwin=0; $tcwin=0;?>
<table cellspacing="9" cellpadding="9" width="100%" border="0">
<tr bgcolor="#ffffff">
<td class="border" width="75%" valign="top" bgcolor="#ffffff">
<table cellspacing="0" cellpadding="0" width="100%" border="0">
<?php
//PAST DUELS
if ($signed1 < $signed) {$limitt = $signed;} else {$limitt = $signed1;}
$exmatches = mysql_query("SELECT matchid, home_id, home_name, away_id, away_name, home_score, away_score, time, type FROM matches WHERE time > '$limitt' AND home_score >0 AND home_id ='$trueclub' AND away_id ='$get_team' UNION SELECT matchid, home_id, home_name, away_id, away_name, home_score, away_score, time, type FROM matches WHERE time > '$limitt' AND home_score >0 AND away_id ='$trueclub' AND home_id ='$get_team' ORDER BY `time` DESC") or die(mysql_error());
echo "<b>",$langmark1465,"</b><br/><br/>";
while ($m = mysql_fetch_array($exmatches)) {
$matchid=$m["matchid"];
$hometid=$m["home_id"];
$home_name=$m["home_name"];
$awaytid =$m["away_id"];
$away_name=$m["away_name"];
$home_score=$m["home_score"];
$away_score=$m["away_score"];
$time=$m["time"];
$typee=$m["type"];
$tdatetime = explode(" ",$time); $ffdate = $tdatetime[0]; $fftime = $tdatetime[1];
$tdate = explode("-", $ffdate); $ffyear = $tdate[0]; $ffmonth = $tdate[1]; $ffday = $tdate[2];
$ttime = explode(":", $fftime); $ffhour = $ttime[0]; $ffmin = $ttime[1]; $ffsec = $ttime[2];
$time = date("d.m.Y", mktime($ffhour,$ffmin,$ffsec,$ffmonth,$ffday,$ffyear));
echo "<tr><td>",$time,"&nbsp;&nbsp;";
if ($home_score > $away_score) {
echo "<font color=\"green\">",$home_name,"</font>";
if ($hometid==$get_team) {$gtwin=$gtwin+1;}
if ($hometid==$trueclub) {$tcwin=$tcwin+1;}
}
else {echo $home_name;}
echo " - ";
if ($home_score < $away_score) {
echo "<font color=\"green\">",$away_name,"</font>";
if ($awaytid==$get_team) {$gtwin=$gtwin+1;}
if ($awaytid==$trueclub) {$tcwin=$tcwin+1;}
}
else {echo $away_name;}
echo "</td><td align=\"center\">";
SWITCH ($typee){
CASE 1: $tip=$langmark479; break;
CASE 2: $tip=$langmark320; break;
CASE 3: $tip=$langmark321; break;
CASE 4: $tip=$langmark322; break;
CASE 5: $tip=$langmark1274; break;
CASE 6: $tip=$langmark1274; break;
CASE 7: $tip=$langmark1274; break;
CASE 18: $tip="Youth"; break;
CASE 19: $tip="Youth"; break;
}
echo "&nbsp;(",$tip,")&nbsp;</td><td align=\"right\"><a href=\"prikaz.php?matchid=",$matchid,"\">",$home_score,"&nbsp;:&nbsp;",$away_score,"</a></tr>";
}
if (mysql_num_rows($exmatches)==0) {echo "<i>Your team haven't met this team yet.</i>";}
?>
</table></td>
<td class="border" width="25%" valign="bottom" bgcolor="#ffffff" align="right">
<b>Manager stats:</b><br/><br/>
<?php
if ($tcwin==0 OR $tcwin >1) {echo $buuu," - ",$tcwin," wins<br/>";} else {echo $buuu," - 1 win<br/>";}
if ($gtwin==0 OR $gtwin >1) {echo $username," - ",$gtwin," wins";} else {echo $username," - 1 win<br/>";}
?>
</td></tr></table>
<?php
}
?>
<table border="0" cellpading="0" cellspacing="9" width="100%">
<tr>
<td class="border" width="60%" valign="top" bgcolor="#ffffff">
<?php
/*
if ($statuskluba < 99 AND $moderating > 2 AND $clubclub != $userid) {echo "<font color=\"darkred\"><b>[<a href=\"admin/gm.php?act=close&club=",$clubclub,"\">Close due to market cheating</a>] <br/>[<a href=\"admin/gm.php?act=close1&club=",$clubclub,"\">Close due to multiple accounts</a>]</b></font><br/>";}
*/
if ($statuskluba > 9 AND $statuskluba < 99 AND $moderating>2) {echo "<font color=\"darkred\"><b>This club was temporary closed due to 10 or more bad login attempts. <a href=\"admin/gm.php?act=reopen&club=",$clubclub,"\">Re-open</a>.</b></font><br/>";}
if ($statuskluba > 98 AND $statuskluba < 199 AND $moderating>2) {echo "<font color=\"darkred\"><b>This club was closed due to cheating on the market. <a href=\"admin/gm.php?act=open&club=",$clubclub,"\">Open this club now</a></b></font><br/>";}
if ($statuskluba > 198 AND $moderating>2) {echo "<font color=\"darkred\"><b>This club was closed for being one of the multiple accounts. <a href=\"admin/gm.php?act=open&club=",$clubclub,"\">Open this club now</a></b></font><br/>";}
if ($moderating>1 AND $s_time=='0000-00-00 00:00:00' AND $clubclub != $userid) {echo "<b><font color=\"darkred\">[</font><a href=\"club.php?clubid=",$clubclub,"&forum=ban\">Ban user from using forums</a><font color=\"darkred\">]</font></b></font><br/>";}
if ($moderating>1 AND $s_time!='0000-00-00 00:00:00' AND $clubclub != $userid) {echo "<font color=\"darkred\"><b>This user is banned from forums until ".$s_time.".</b></font><br/>";}
$forum = $_GET["forum"];
if ($forum == 'ban' AND $moderating > 1 AND $dlehen<>9) {
?>
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="margin: 0">
<b>Reason:</b>
<select name="breason" class="inputreg">
<option value="7">abusing Transfer Market Ads (use 2-7 days ban)</option>
<option value="1">bad spaming case (use 3-7 days ban)</option>
<option value="2">extensive swearing (use 3-7 days ban)</option>
<option value="6">commenting GM decisions (use 2-10 days ban)</option>
<option value="3">abusing other users (use according to case)</option>
<option value="4">linking illegal content (use 7-14 days ban)</option>
<option value="5">unfair racial comments (use 30 days ban)</option>
</select>
<br/><b>&nbsp;Length:</b>
<select name="numofday" class="inputreg">
<option value="1">1 day</option>
<option value="2">2 days</option>
<option value="3">3 days</option>
<option value="5">5 days</option>
<option value="7">7 days</option>
<option value="10">10 days</option>
<option value="14">14 days</option>
<option value="21">21 days</option>
<option value="30">30 days</option>
</select>
<input type="submit" value="Apply ban" name="submiban" class="buttonreg">
</form>
<?php
}
?>

<!-- majica in ime kluba -->

<table border="0" cellpadding="4" cellspacing="4" width="100%">
<tr><td valign="top">

<!-- majica in ime kluba -->

<table width="100%" border="0">
<tr width="100%"><td width="45">
<img src="img/shirts/<?=$shirt?>.gif" alt="shirt" title="club shirt" border="0" height="52" width="42"></td>
<td><h3><?=stripslashes($name)?>
<?php if($is_supporter==1 || $moderating >1){echo "&nbsp;<a href=\"club.php?clubid=",$clubclub,"&action=bookmark\"><img src=\"img/bookmark.jpg\" alt=\"",$langmark477,"\" title=\"",$langmark477,"\" border=\"0\"></a>";}?>
</h3></td>
<?php if ($conwins >1) {echo "<td align=\"right\" width=\"20%\"><i>",$langmark1525," ",$conwins," ",$langmark1526,"</i></td>";}?>
</tr></table>

<!-- konec majice in imena kluba -->


<!-- podatki o klubu, uporabniku + logo (tri tabele) -->

<table border="0" cellpadding="4" cellspacing="0" width="100%"><tr><td valign="top">
<!-- podatki o klubu -->

<table border="0" cellpadding="1" cellspacing="0">
<br/>
<tr valign="top"><td width=52><?=$langmark475?> </td><td><b><?=$get_team?></b></td></tr>
<tr valign="top"><td><?=$langmark476?> </td><td><a href="cheerleaders.php?squad=<?=$get_team?>"><b><?=$arenam?></b></a></td></tr>
<?php if ($cleanup<>'region' && $clubclub==$userid){?><tr><td valign="top"><?=$langmark1275?>&nbsp;<a href="club.php?cleanup=region"><img src="img/regije.gif" border="0" title="Change region" alt="&gt;&gt;"></a></td><td><a href="region.php?region=<?=$city?>"><b><?=$city?></b></a></td></tr><?php } else {?><tr><td valign="top"><?=$langmark1275?></td><td><a href="region.php?region=<?=$city?>"><b><?=$city?></b></a></td></tr><?php }?>
<?php if ($cleanup=='region'){?><tr valign="top"><td colspan="2">
<form method="post" action="<?=$PHP_SELF?>" style="margin: 0"><select name="new_region" class="inputreg">
<?php
$rs = mysql_query("SELECT `region` FROM `regions` WHERE country LIKE '$country' ORDER BY `id` ASC, `region` ASC");
while($row = mysql_fetch_assoc($rs)) {
echo "<option name=\"",$row['region'],"\">",$row['region'],"</option>";
}
?>
</select><input type="submit" value="Change region" name="submit999" class="buttonreg"></form></td></tr>
<?php }?>
<tr valign="top"><td><?=$langmark478?> </td><td><a href="league.php?country=<?=$country?>"><b><?=$localname?></b></a></td></tr>
<tr valign="top"><td><?=$langmark479?> </td><td># <?=$uvrscen?> in <a href="leagues.php?leagueid=<?=$whleague?>"><b><?=$leaguenam?></b></a></td></tr>
<tr valign="top"><td><?=$langmark480?> </td><td><b><?=$nofans?></b></td></tr>
<?php if (strlen($fanclub)>0 && $huhsupporter==1) {?><tr valign="top"><td><?=$langmark1492?> </td><td><b><?=stripslashes($fanclub)?></b></td></tr><?php }?>
</table>

<!-- konec podatkov o klubu -->

<br/>

<!-- podatki o uporabniku -->

<?php
if ($lastlog == '0000-00-00 00:00:00') {$lastlogus = $langmark481;}
else {
$splitdt = explode(" ", $lastlog); $bdate = $splitdt[0]; $btime = $splitdt[1];
$splitd = explode("-", $bdate); $byear = $splitd[0]; $bmonth = $splitd[1]; $bday = $splitd[2];
$splitt = explode(":", $btime); $bhour = $splitt[0]; $bmin = $splitt[1]; $bsec = $splitt[2];
$lastlogus = date("d.m.y H:i", mktime($bhour,$bmin,$bsec,$bmonth,$bday,$byear));
}
//prikrijem zadnji del IPja
$splitip = explode(".", $lastip);
$num11 = $splitip[0];
$num22 = $splitip[1];
$num33 = $splitip[2];
$num44 = $splitip[3];
if ($num44 < 10) {$numadd = '&#8226;';}
elseif ($num44 > 9 AND $num44 < 100) {$numadd = '&#8226;&#8226;';}
else {$numadd = '&#8226;&#8226;&#8226;';}
$ip_disp=$num11.".".$num22.".".$num33.".".$numadd;
if ($lastip == ''){$ip_disp = '-';}
if ($moderating > 2 AND $ip_disp != '-') {$ip_disp = "<a href=\"club.php?clubid=".$clubclub."&action=sameip\">".$lastip."</a>";}
//aktivnost
$splitdatetime_ = explode(" ", $last_active); $dbdate_ = $splitdatetime_[0]; $dbtime_ = $splitdatetime_[1];
$splitdate_ = explode("-", $dbdate_); $dbyear_ = $splitdate_[0]; $dbmonth_ = $splitdate_[1]; $dbday_ = $splitdate_[2];
$splittime_ = explode(":", $dbtime_); $dbhour_ = $splittime_[0]; $dbmin_ = $splittime_[1]; $dbsec_ = $splittime_[2];
$expireminus = date("Y-m-d H:i:s", mktime($dbhour_,$dbmin_+30,$dbsec_,$dbmonth_,$dbday_,$dbyear_));
$timenow = date("Y-m-d H:i:s");

if ($timenow > $expireminus) {$is_online=0;}
//joined
$splitdt1 = explode(" ", $signed); $bdate1 = $splitdt1[0]; $btime1 = $splitdt1[1];
$splitd1 = explode("-", $bdate1); $byear1 = $splitd1[0]; $bmonth1 = $splitd1[1]; $bday1 = $splitd1[2];
$splitt1 = explode(":", $btime1); $bhour1 = $splitt1[0]; $bmin1 = $splitt1[1]; $bsec1 = $splitt1[2];
$joined1 = date("d.m.y H:i", mktime($bhour1,$bmin1,$bsec1,$bmonth1,$bday1,$byear1));
//email
if (strlen($email) > 22 AND $huhsupporter==1 AND strlen($logo) > 0) {$splitmail = explode("@", $email); $mail11 = $splitmail[0]; $mail22 = $splitmail[1]; $email=$mail11."@<br/>".$mail22;}
?>

<table border="0" cellpadding="0" cellspacing="2">
<?php if($moderating>2){?>
<tr valign="top"><td width="52"><font color="darkred">Realname&nbsp;</font></td><td><b><font color="darkred"><?=stripslashes($realname)?></font></b></td></tr>
<?php }?>
<tr valign="top"><td width="52"><?=$langmark482?> </td><td><b><?php echo $username; if ($is_online==1){echo " <font color=\"green\"> Online!</font>";}?></b></td></tr>
<tr valign="top"><td><?=$langmark483?> </td><td><b><?=$lastlogus?></b></td></tr>
<tr valign="top"><td><?=$langmark484?> </td><td><b><?=$ip_disp?></b></td></tr>
<tr valign="top"><td><?=$langmark485?> </td><td><b><?=$joined1?></b></td></tr>
<tr valign="top"><td><?=$langmark486?> </td><td><b><?php if ($hide_email==0 OR $moderating>2){echo $email;} else {echo $langmark487;} ?></b></td></tr>
<?php if ($selektor1==1){echo "<tr valign=\"top\"><td colspan=\"3\">Coach of <a href=\"nationalteams.php?country=",$selektor2,"\">",$selektor2,"</a>";}?>
<?php if ($selektor1==2){echo "<tr valign=\"top\"><td colspan=\"3\">Coach of <a href=\"u18teams.php?country=",$selektor2,"\">",$selektor2,"&nbsp;U19</a>";}?>
</td></tr>
</table>

<!-- konec tabele za uporabnika -->

</td><td align="left" valign="top">

<!-- logo -->

<table border="0" cellpadding="0" cellspacing="0" align="left"><tr><td>
<?php if ($logo != ''){ ?><img src="<?=$logo?>" border="0" alt="" width="137"><?php } ?>
</td></tr></table>

<!-- konec tabele za logo -->

</td>
</tr>
</table>

<!-- konec treh tabel, uporabniki, klub, logo -->

<?php
//gminfo
if ($action=='sameip' AND $moderating > 2) {
?>
<table width="100%" border="1" cellspacing="2" cellpadding="2">
<tr bgcolor="#ffffff">
<td class="border">
<?php
$podvajanje=mysql_query("SELECT userid FROM users WHERE lastip='$lastip' AND userid <>$clubclub") or die(mysql_error());
$vecjihje = mysql_num_rows($podvajanje);
if ($vecjihje > 0) {
echo "<b>Clubs currently using same IP: (<a href=\"club.php?clubid=",$clubclub,"&action=samepas\">password</a>)<b><br/><br/>";
$f=0;
while ($f < $vecjihje) {
$enmulti = mysql_result($podvajanje,$f);
$result1 = mysql_query("SELECT teams.name AS name1 FROM teams, users WHERE users.club=teams.teamid AND users.userid=$enmulti") or die(mysql_error());
$g=0;
while ($g < mysql_num_rows($result1)) {
$name1=mysql_result($result1,$g,"name1");
echo "<a href=\"club.php?clubid=",$enmulti,"\">",stripslashes($name1),"</a><br/>";
$g++;
}
$f++;
}
} else {echo "<b>No other clubs currently use same IP. (<a href=\"club.php?clubid=",$clubclub,"&action=samepas\">password</a>)</b>";}
?>
</td>
</tr>
</table>
<?php
}
//to je bil konec gminfo
?>

<?php
//gm-P-info
if ($action=='samepas' && $moderating >2) {
?>
<table width="100%" border="1" cellspacing="2" cellpadding="2">
<tr bgcolor="#ffffff">
<td class="border">
<?php
$podvajanje=mysql_query("SELECT userid FROM users WHERE password='$keple' AND userid <>$clubclub") or die(mysql_error());
$vecjihje = mysql_num_rows($podvajanje);
if ($vecjihje > 0) {
echo "<b>Clubs currently using same password: (<a href=\"club.php?clubid=",$clubclub,"&action=sameip\">IP</a>)<b><br/><br/>";
$f=0;
while ($f < $vecjihje) {
$enmulti = mysql_result($podvajanje,$f);
$result1 = mysql_query("SELECT teams.name AS name1 FROM teams, users WHERE users.club=teams.teamid AND users.userid=$enmulti") or die(mysql_error());
$g=0;
while ($g < mysql_num_rows($result1)) {
$name1=mysql_result($result1,$g,"name1");
echo "<a href=\"club.php?clubid=",$enmulti,"\">",stripslashes($name1),"</a><br/>";
$g++;
}
$f++;
}
} else {echo "<b>No other clubs currently use same password. (<a href=\"club.php?clubid=",$clubclub,"&action=sameip\">IP</a>)</b>";}
?>
</td>
</tr>
</table>
<?php
}
//to je bil konec gm-P-inf
?>

<!-- pressi -->

<?php
if ($id > 0) {
$splitpres = explode(" ", $tSime); $tdate = $splitpres[0]; $ttime = $splitpres[1];
$splitena = explode("-", $tdate); $tyear = $splitena[0]; $tmonth = $splitena[1]; $tday = $splitena[2];
$splitdve = explode(":", $ttime); $thour = $splitdve[0]; $tmin = $splitdve[1]; $tsec = $splitdve[2];
$presadat = date("d.m.Y H:i", mktime($thour,$tmin,$tsec,$tmonth,$tday,$tyear));
?>
<br/><b><?=stripslashes($title)?></b> <a href="statements.php?user=<?=$clubclub?>"><img src="img/cstatements.jpg" border="0" title="Check all statements" alt="Check all statements"></a><br/>
<br/><?=stripslashes($content)?><br/>
<br/><i><?=$langmark488," ",$presadat?></i><br/>
<?php
}
else {echo "<br/><i>",$langmark489,"</i>";}
?>

<!-- konec pressov -->

<br/><?php if (strlen($homepage)>7) {?>
<?php
$homepag = str_replace("Http://","",$homepage);
$homepag = str_replace("http://","",$homepag);
$homepag = str_replace("Https://","",$homepag);
$homepag = str_replace("https://","",$homepag);
$hpwi = explode("/", $homepag);
if ($hpwi[1]<>'bswiki') {?><br/><b>Home page:</b>&nbsp;
<?php
}
if ($hpwi[1]=='bswiki') {
//echo "<a href=\"",$homepage,"\"><img src=\"http://www.basketsim.gr/pics/bswiki.gif\" border=\"0\" title=\"",stripslashes($name)," @ BS wiki\" alt=\"",stripslashes($name)," @ BS wiki\"></a>";
$krom443=5;
} else {?><a href="<?=$homepage?>" target="_new"><?php
echo $homepag,"</a>";
}
?>
<?php
}
?>
</td>
</tr>
</table>

<!-- konec celotnega levega okvirja na strani kluba -->

</td>

<!-- desni okvir -->

<td class="border" width="40%" valign="top" bgcolor="#ffffff">

<?php
if ($coachaction == 'showcoach') {
//COACH
$resultco = mysql_query("SELECT name,surname,age,country,charac,workrate,experience,wage,quality,motiv FROM players WHERE coach=1 AND club='$get_team' LIMIT 1") or die(mysql_error());
$cuc=mysql_num_rows($resultco);
if ($cuc==0) {echo "<p>",$langmark490,"<br/><br/><a href=\"club.php?clubid=".$clubclub."\">",$langmark491,"</a></p>";}
else {
$name=mysql_result($resultco,0,"name");
$surname=mysql_result($resultco,0,"surname");
$age=mysql_result($resultco,0,"age");
$country=mysql_result($resultco,0,"country");
$charac=mysql_result($resultco,0,"charac");
$workrate=mysql_result($resultco,0,"workrate");
$experience=mysql_result($resultco,0,"experience");
$wage=mysql_result($resultco,0,"wage");
$hskill=mysql_result($resultco,0,"quality");
$motiv=mysql_result($resultco,0,"motiv");
if ($motiv > 100) {$motiv=100;}

if ($workrate < 9) {$workrate_dspl = $langmark111; }
elseif ($workrate > 8 AND $workrate < 17) {$workrate_dspl = $langmark096; }
elseif ($workrate > 16 AND $workrate < 25) {$workrate_dspl = $langmark097; }
elseif ($workrate > 24 AND $workrate < 33) {$workrate_dspl = $langmark098; }
elseif ($workrate > 32 AND $workrate < 41) {$workrate_dspl = $langmark099; }
elseif ($workrate > 40 AND $workrate < 49) {$workrate_dspl = $langmark100; }
elseif ($workrate > 48 AND $workrate < 57) {$workrate_dspl = $langmark101; }
elseif ($workrate > 56 AND $workrate < 65) {$workrate_dspl = $langmark102; }
elseif ($workrate > 64 AND $workrate < 73) {$workrate_dspl = $langmark103; }
elseif ($workrate > 72 AND $workrate < 81) {$workrate_dspl = $langmark104; }
elseif ($workrate > 80 AND $workrate < 89) {$workrate_dspl = $langmark105; }
elseif ($workrate > 88 AND $workrate < 97) {$workrate_dspl = $langmark106; }
elseif ($workrate > 96 AND $workrate < 105) {$workrate_dspl = $langmark107; }
elseif ($workrate > 104 AND $workrate < 113) {$workrate_dspl = $langmark108; }
elseif ($workrate > 112 AND $workrate < 121) {$workrate_dspl = $langmark109; }
else $workrate_dspl = $langmark110;

if ($experience < 9) {$experience_dspl = $langmark111; }
elseif ($experience > 8 AND $experience < 17) {$experience_dspl = $langmark096; }
elseif ($experience > 16 AND $experience < 25) {$experience_dspl = $langmark097; }
elseif ($experience > 24 AND $experience < 33) {$experience_dspl = $langmark098; }
elseif ($experience > 32 AND $experience < 41) {$experience_dspl = $langmark099; }
elseif ($experience > 40 AND $experience < 49) {$experience_dspl = $langmark100; }
elseif ($experience > 48 AND $experience < 57) {$experience_dspl = $langmark101; }
elseif ($experience > 56 AND $experience < 65) {$experience_dspl = $langmark102; }
elseif ($experience > 64 AND $experience < 73) {$experience_dspl = $langmark103; }
elseif ($experience > 72 AND $experience < 81) {$experience_dspl = $langmark104; }
elseif ($experience > 80 AND $experience < 89) {$experience_dspl = $langmark105; }
elseif ($experience > 88 AND $experience < 97) {$experience_dspl = $langmark106; }
elseif ($experience > 96 AND $experience < 105) {$experience_dspl = $langmark107; }
elseif ($experience > 104 AND $experience < 113) {$experience_dspl = $langmark108; }
elseif ($experience > 112 AND $experience < 121) {$experience_dspl = $langmark109; }
else $experience_dspl = $langmark110;

SWITCH (TRUE) {
CASE ($charac < 4): $spec_txt=$langmark763; break;
CASE ($charac > 3 && $charac < 7): $spec_txt=$langmark764; break;
CASE ($charac > 6 && $charac < 11): $spec_txt=$langmark765; break;
CASE ($charac > 10 && $charac < 14): $spec_txt=$langmark766; break;
CASE ($charac > 13 && $charac < 17): $spec_txt=$langmark767; break;
CASE ($charac > 16 && $charac < 20): $spec_txt=$langmark768; break;
CASE ($charac > 19 && $charac < 23): $spec_txt='dirty'; break;
CASE ($charac > 22 && $charac < 26): $spec_txt='clumsy'; break;
CASE ($charac > 25 && $charac < 30): $spec_txt='explosive'; break;
CASE ($charac > 29 && $charac < 33): $spec_txt='loyal'; break;
CASE ($charac > 32 && $charac < 35): $spec_txt='wise'; break;
CASE ($charac > 34 && $charac < 39): $spec_txt='fragile'; break;
CASE ($charac > 38 && $charac < 41): $spec_txt='tough'; break;
CASE ($charac > 40 && $charac < 44): $spec_txt='lazy'; break;
}

$diswage = number_format($wage, 0, ',', '.');
$weight = round($weight);
echo "<b>".stripslashes($name)." ".$surname."</b><br/><br/>";
//bari
$YTBAR = 100 * ($workrate/10 + $experience/6 + 2*($hskill-40)) / 68;
if ($YTBAR > 100) {$YTBAR=100;}
if ($workrate > 121) {$tempwr = 121;} else {$tempwr=$workrate;}
if ($motiv > 99.99) {$STBAR = 100 * $tempwr / 121;} else {$STBAR = (100 * $tempwr * $motiv/100) / 121;}
//$FTBAR = 100 * $experience / 121;
//if ($FTBAR > 100) {$FTBAR = 100;}

echo "<nobr><b>",round($STBAR),"/100</b> - ability to develop senior team players</nobr><br/>";
$colR = round(200-$STBAR-$STBAR);
$colG = round(2*$STBAR);
?>
<div style="height:7px; width:200px;background-color:#ffffff;position:relative; overflow:hidden; border: 1px solid #000000;">
<div style="position:absolute;top:0px;left:0px;background-color:rgb(<?=$colR?>,<?=$colG?>,73); width:<?=$colG?>px;height:7px"></div>
<div style="position:absolute;top:0px;left:<?=$colG?>px;background-color:rgb(255,255,255); width:<?=$colR?>px;height:7px;border-right: 1px solid #000000;"></div></div>
<?php
echo "<b>",round($YTBAR),"/100</b> - ability to develop youth team players<br/>";
$colR = round(200-$YTBAR-$YTBAR);
$colG = round(2*$YTBAR);
?>
<div style="height:7px; width:200px;background-color:#ffffff;position:relative; overflow:hidden; border: 1px solid #000000;">
<div style="position:absolute;top:0px;left:0px;background-color:rgb(<?=$colR?>,<?=$colG?>,73); width:<?=$colG?>px;height:7px"></div>
<div style="position:absolute;top:0px;left:<?=$colG?>px;background-color:rgb(255,255,255); width:<?=$colR?>px;height:7px;border-right: 1px solid #000000;"></div></div>
<br/>
<?php
echo "<b>",$langmark113,":</b> ".$age."<br/>";
echo "<b>",$langmark114,":</b> ".$country."<br/>";
echo "<b>",$langmark115,":</b> ".$spec_txt."<br/>";
echo "<b>",$langmark118,":</b> ".$diswage." &euro; / ",$langmark382,"<br/>";
echo "<b>Working with youths:</b>&nbsp;";
SWITCH (TRUE) {
CASE ($hskill < 43): echo $langmark096; break;
CASE ($hskill > 42 && $hskill < 46): echo $langmark098; break;
CASE ($hskill > 45 && $hskill < 49): echo $langmark100; break;
CASE ($hskill > 48 && $hskill < 52): echo $langmark102; break;
CASE ($hskill > 51 && $hskill < 55): echo $langmark104; break;
CASE ($hskill > 54 && $hskill < 58): echo $langmark106; break;
CASE ($hskill > 57): echo $langmark108; break;
}
echo "<br/><b>",$langmark129,":</b> ",$workrate_dspl,"<br/>";
echo "<b>",$langmark130,":</b> ",$experience_dspl,"<br/>";
echo "<b>",$langmark131,":</b> ",ceil($motiv),"%<br/>";

echo "<br/><a href=\"club.php?clubid=",$clubclub,"\">",$langmark491,"</a>";
}

}
else
{

//ZASTAVICE
if ($huhsupporter==1 AND $flags=='all') {
SWITCH ($flagsd) {
CASE 0: $quera1='(type=2 OR type >4)'; $quera2='ORDER BY country ASC'; break;
CASE 1: $quera1='(type=2 OR type >4)'; $quera2='ORDER BY country ASC'; break;
CASE 2: $quera1='(type=2 OR type >4)'; $quera2=''; break;
CASE 3: $quera1='type=2'; $quera2='ORDER BY country ASC'; break;
CASE 4: $quera1='type=2'; $quera2=''; break;
}
$drzavke = mysql_query("SELECT DISTINCT `country` FROM `matches` WHERE ".$quera1." AND crowd1 > 0 AND time > '$signed' AND away_id='$get_team' ".$quera2."") or die(mysql_error());
$numc1 = mysql_num_rows($drzavke);
echo "<b>",$langmark497," (",$numc1,"):</b><br/> ";
if ($numc1==0) {echo "No international visits yet";}
while($uk=mysql_fetch_array($drzavke)) {
$uhdrzava = $uk["country"];
echo "<img src=\"img/Flags/",$uhdrzava,".png\" alt=\"",$uhdrzava,"\" title=\"",$uhdrzava,"\" border=\"0\"> ";
}
$drzavke1 = mysql_query("SELECT DISTINCT teams.country AS country FROM teams, matches WHERE teams.teamid = matches.away_id AND ".$quera1." AND matches.crowd1 > 0 AND time > '$signed' AND matches.home_id='$get_team' ".$quera2."") or die(mysql_error());
$numc2 = mysql_num_rows($drzavke1);
echo "<br/><b>",$langmark498," (",$numc2,"):</b><br/> ";
while($uk1=mysql_fetch_array($drzavke1)) {
$uhdrzava1 = $uk1["country"];
echo "<img src=\"img/Flags/",$uhdrzava1,".png\" alt=\"",$uhdrzava1,"\" title=\"",$uhdrzava1,"\" border=\"0\"> ";
}
if ($numc2==0) {echo "No international matches hosted yet";}

}
elseif ($huhsupporter==1 AND $flags!='all') {echo "<a href=\"club.php?clubid=",$clubclub,"&flags=all\">",$langmark499,"</a>";}

//--LOVORIKE--
if ($clubclub==36) {$dong= "<img src=\"img/cu2.png\" alt=\"Second best forum poster of 2012\" title=\"Second best forum poster of 2012\" border=\"0\" height=\"43\"> <a href=\"u18worldcup.php?swc=8\"><img src=\"img/wcsmallsilver.jpg\" alt=\"U19 World Cup silver medal\" title=\"U19 World Cup silver medal\" border=\"0\"></a><a href=\"u18worldcup.php?swc=9\"><img src=\"img/wcsmallbronze.jpg\" alt=\"U19 World Cup bronze medal\" title=\"U19 World Cup bronze medal\" border=\"0\"></a>";}
elseif ($clubclub==567) {$dong= "<a href=\"worldcup.php?swc=6\"><img src=\"img/wcsmallbronze.jpg\" alt=\"World Cup bronze medal\" title=\"World Cup bronze medal\" border=\"0\"></a>";}
elseif ($clubclub==675) {$dong= "<a href=\"worldcup.php?swc=9\"><img src=\"img/wcsmallsilver.jpg\" alt=\"World Cup silver medal\" title=\"World Cup silver medal\" border=\"0\"></a>";}
elseif ($clubclub==1070) {$dong= "<a href=\"u18worldcup.php?swc=4\"><img src=\"img/wcsmallgold.jpg\" alt=\"U18 World Cup gold medal\" title=\"U18 World Cup gold medal\" border=\"0\"></a>";}
elseif ($clubclub==1078) {$dong= "<a href=\"worldcup.php?swc=5\"><img src=\"img/wcsmallsilver.jpg\" alt=\"World Cup silver medal\" title=\"World Cup silver medal\" border=\"0\"></a><a href=\"u18worldcup.php?swc=6\"><img src=\"img/wcsmallbronze.jpg\" alt=\"U18 World Cup bronze medal\" title=\"U18 World Cup bronze medal\" border=\"0\"></a><a href=\"worldcup.php?swc=8\"><img src=\"img/wcsmallbronze.jpg\" alt=\"World Cup bronze medal\" title=\"World Cup bronze medal\" border=\"0\"></a>";}
elseif ($clubclub==1149) {$dong= "<a href=\"u18worldcup.php?swc=1\"><img src=\"img/wcsmallsilver.jpg\" alt=\"U18 World Cup silver medal\" title=\"U18 World Cup silver medal\" border=\"0\"></a>";}
elseif ($clubclub==1412) {$dong= "<a href=\"worldcup.php?swc=1\"><img src=\"img/wcsmallgold.jpg\" alt=\"World Cup gold medal\" title=\"World Cup gold medal\" border=\"0\"></a>";}
elseif ($clubclub==1490) {$dong= "<a href=\"u18worldcup.php?swc=1\"><img src=\"img/wcsmallgold.jpg\" alt=\"U18 World Cup gold medal\" title=\"U18 World Cup gold medal\" border=\"0\"></a>";}
elseif ($clubclub==1895) {$dong= "<a href=\"worldcup.php?swc=7\"><img src=\"img/wcsmallsilver.jpg\" alt=\"World Cup silver medal\" title=\"World Cup silver medal\" border=\"0\"></a>";}
elseif ($clubclub==3011) {$dong= "<a href=\"worldcup.php?swc=1\"><img src=\"img/wcsmallbronze.jpg\" alt=\"World Cup bronze medal\" title=\"World Cup bronze medal\" border=\"0\"></a>";}
elseif ($clubclub==3103) {$dong= "<a href=\"u18worldcup.php?swc=4\"><img src=\"img/wcsmallbronze.jpg\" alt=\"U18 World Cup bronze medal\" title=\"U18 World Cup bronze medal\" border=\"0\"></a>";}
elseif ($clubclub==3114) {$dong= "<a href=\"u18worldcup.php?swc=2\"><img src=\"img/wcsmallgold.jpg\" alt=\"U18 World Cup gold medal\" title=\"U18 World Cup gold medal\" border=\"0\"></a><a href=\"worldcup.php?swc=7\"><img src=\"img/wcsmallgold.jpg\" alt=\"World Cup gold medal\" title=\"World Cup gold medal\" border=\"0\"></a>";}
elseif ($clubclub==3231) {$dong= "<a href=\"u18worldcup.php?swc=4\"><img src=\"img/wcsmallsilver.jpg\" alt=\"U18 World Cup silver medal\" title=\"U18 World Cup silver medal\" border=\"0\"></a>";}
elseif ($clubclub==3645) {$dong= "<a href=\"worldcup.php?swc=3\"><img src=\"img/wcsmallbronze.jpg\" alt=\"World Cup bronze medal\" title=\"World Cup bronze medal\" border=\"0\"></a>";}
elseif ($clubclub==3682) {$dong= "<a href=\"u18worldcup.php?swc=2\"><img src=\"img/wcsmallbronze.jpg\" alt=\"U18 World Cup bronze medal\" title=\"U18 World Cup bronze medal\" border=\"0\"></a>";}
elseif ($clubclub==3907) {$dong= "<a href=\"worldcup.php?swc=3\"><img src=\"img/wcsmallsilver.jpg\" alt=\"World Cup silver medal\" title=\"World Cup silver medal\" border=\"0\"></a>";}
elseif ($clubclub==5646) {$dong= "<a href=\"u18worldcup.php?swc=3\"><img src=\"img/wcsmallgold.jpg\" alt=\"U18 World Cup gold medal\" title=\"U18 World Cup gold medal\" border=\"0\"></a>";}
elseif ($clubclub==5846) {$dong= "<a href=\"u18worldcup.php?swc=6\"><img src=\"img/wcsmallsilver.jpg\" alt=\"U18 World Cup silver medal\" title=\"U18 World Cup silver medal\" border=\"0\"></a>";}
elseif ($clubclub==5848) {$dong= "<a href=\"u18worldcup.php?swc=2\"><img src=\"img/wcsmallsilver.jpg\" alt=\"U18 World Cup silver medal\" title=\"U18 World Cup silver medal\" border=\"0\"></a>";}
elseif ($clubclub==6594) {$dong= "<a href=\"worldcup.php?swc=4\"><img src=\"img/wcsmallsilver.jpg\" alt=\"World Cup silver medal\" title=\"World Cup silver medal\" border=\"0\"></a>";}
elseif ($clubclub==6719) {$dong= "<a href=\"worldcup.php?swc=2\"><img src=\"img/wcsmallsilver.jpg\" alt=\"World Cup silver medal\" title=\"World Cup silver medal\" border=\"0\"></a>";}
elseif ($clubclub==6911) {$dong= "<a href=\"worldcup.php?swc=9\"><img src=\"img/wcsmallgold.jpg\" alt=\"World Cup gold medal\" title=\"World Cup gold medal\" border=\"0\"></a>";}
elseif ($clubclub==6979) {$dong= "<a href=\"worldcup.php?swc=3\"><img src=\"img/wcsmallgold.jpg\" alt=\"World Cup gold medal\" title=\"World Cup gold medal\" border=\"0\"></a>";}
elseif ($clubclub==7849) {$dong= "<a href=\"worldcup.php?swc=1\"><img src=\"img/wcsmallsilver.jpg\" alt=\"World Cup silver medal\" title=\"World Cup silver medal\" border=\"0\"></a>";}
elseif ($clubclub==8814) {$dong= "<a href=\"worldcup.php?swc=4\"><img src=\"img/wcsmallgold.jpg\" alt=\"World Cup gold medal\" title=\"World Cup gold medal\" border=\"0\"></a><a href=\"bsfantasy.php\"><img src=\"img/fantasy.gif\" alt=\"World Cup Fantasy game winner\" title=\"World Cup Fantasy game winner\" border=\"0\"></a><a href=\"worldcup.php?swc=6\"><img src=\"img/wcsmallsilver.jpg\" alt=\"World Cup silver medal\" title=\"World Cup silver medal\" border=\"0\"></a><a href=\"bsfantasy.php\"><img src=\"img/fantasy.gif\" alt=\"World Cup Fantasy game winner\" title=\"World Cup Fantasy game winner\" border=\"0\"></a>&nbsp;";}
elseif ($clubclub==9119) {$dong= "<a href=\"worldcup.php?swc=2\"><img src=\"img/wcsmallgold.jpg\" alt=\"World Cup gold medal\" title=\"World Cup gold medal\" border=\"0\"></a><a href=\"u18worldcup.php?swc=5\"><img src=\"img/wcsmallgold.jpg\" alt=\"U18 World Cup gold medal\" title=\"U18 World Cup gold medal\" border=\"0\"></a>";}
elseif ($clubclub==9562) {$dong= "<a href=\"worldcup.php?swc=4\"><img src=\"img/wcsmallbronze.jpg\" alt=\"World Cup bronze medal\" title=\"World Cup bronze medal\" border=\"0\"></a><a href=\"worldcup.php?swc=5\"><img src=\"img/wcsmallbronze.jpg\" alt=\"World Cup bronze medal\" title=\"World Cup bronze medal\" border=\"0\"></a>";}
elseif ($clubclub==10343) {$dong= "<a href=\"bsfantasy.php\"><img src=\"img/fantasy.gif\" alt=\"World Cup Fantasy game winner\" title=\"World Cup Fantasy game winner\" border=\"0\"></a> ";}
elseif ($clubclub==10370) {$dong= "<a href=\"worldcup.php?swc=2\"><img src=\"img/wcsmallbronze.jpg\" alt=\"World Cup bronze medal\" title=\"World Cup bronze medal\" border=\"0\"></a>";}
elseif ($clubclub==10058) {$dong= "<a href=\"worldcup.php?swc=6\"><img src=\"img/wcsmallgold.jpg\" alt=\"World Cup gold medal\" title=\"World Cup gold medal\" border=\"0\"></a>";}
elseif ($clubclub==11643) {$dong= "<a href=\"worldcup.php?swc=8\"><img src=\"img/wcsmallsilver.jpg\" alt=\"World Cup silver medal\" title=\"World Cup silver medal\" border=\"0\"></a><a href=\"worldcup.php?swc=10\"><img src=\"img/wcsmallbronze.jpg\" alt=\"World Cup bronze medal\" title=\"World Cup bronze medal\" border=\"0\"></a>";}
elseif ($clubclub==11932) {$dong= "<a href=\"u18worldcup.php?swc=3\"><img src=\"img/wcsmallbronze.jpg\" alt=\"U18 World Cup bronze medal\" title=\"U18 World Cup bronze medal\" border=\"0\"></a>";}
elseif ($clubclub==12210) {$dong= "<a href=\"u18worldcup.php?swc=5\"><img src=\"img/wcsmallsilver.jpg\" alt=\"U18 World Cup silver medal\" title=\"U18 World Cup silver medal\" border=\"0\"></a>";}
elseif ($clubclub==12436) {$dong= "<img src=\"img/cu3.png\" alt=\"Third best forum poster of 2011\" title=\"Third best forum poster of 2011\" border=\"0\" height=\"43\"> ";}
elseif ($clubclub==13728) {$dong= "<a href=\"u18worldcup.php?swc=7\"><img src=\"img/wcsmallsilver.jpg\" alt=\"U19 World Cup silver medal\" title=\"U19 World Cup silver medal\" border=\"0\"></a>";}
elseif ($clubclub==14445) {$dong= "<a href=\"bsfantasy.php\"><img src=\"img/fantasy.gif\" alt=\"World Cup Fantasy game winner\" title=\"World Cup Fantasy game winner\" border=\"0\"></a> <a href=\"bsfantasy.php\"><img src=\"img/fantasy.gif\" alt=\"World Cup Fantasy game winner\" title=\"World Cup Fantasy game winner\" border=\"0\"></a> <a href=\"bsfantasy.php\"><img src=\"img/fantasy.gif\" alt=\"World Cup Fantasy game winner\" title=\"World Cup Fantasy game winner\" border=\"0\"></a> ";}
elseif ($clubclub==19183) {$dong= "<a href=\"u18worldcup.php?swc=1\"><img src=\"img/wcsmallbronze.jpg\" alt=\"U18 World Cup bronze medal\" title=\"U18 World Cup bronze medal\" border=\"0\"></a>";}
elseif ($clubclub==24634) {$dong= "<a href=\"worldcup.php?swc=5\"><img src=\"img/wcsmallgold.jpg\" alt=\"World Cup gold medal\" title=\"World Cup gold medal\" border=\"0\"></a>";}
elseif ($clubclub==27871) {$dong= "<a href=\"u18worldcup.php?swc=5\"><img src=\"img/wcsmallbronze.jpg\" alt=\"U18 World Cup bronze medal\" title=\"U18 World Cup bronze medal\" border=\"0\"></a>";}
elseif ($clubclub==29420) {$dong= "<a href=\"u18worldcup.php?swc=7\"><img src=\"img/wcsmallgold.jpg\" alt=\"U19 World Cup gold medal\" title=\"U19 World Cup gold medal\" border=\"0\"></a>";}
elseif ($clubclub==35746) {$dong= "<a href=\"bsfantasy.php\"><img src=\"img/fantasy.gif\" alt=\"World Cup Fantasy game winner\" title=\"World Cup Fantasy game winner\" border=\"0\"></a><a href=\"worldcup.php?swc=10\"><img src=\"img/wcsmallgold.jpg\" alt=\"World Cup gold medal\" title=\"World Cup gold medal\" border=\"0\"></a>";}
elseif ($clubclub==35881) {$dong= "<a href=\"u18worldcup.php?swc=9\"><img src=\"img/wcsmallsilver.jpg\" alt=\"U19 World Cup silver medal\" title=\"U19 World Cup silver medal\" border=\"0\"></a>";}
elseif ($clubclub==38123) {$dong= "<a href=\"u18worldcup.php?swc=8\"><img src=\"img/wcsmallgold.jpg\" alt=\"U19 World Cup gold medal\" title=\"U19 World Cup gold medal\" border=\"0\"></a>";}
elseif ($clubclub==45342) {$dong= "<a href=\"worldcup.php?swc=8\"><img src=\"img/wcsmallgold.jpg\" alt=\"World Cup gold medal\" title=\"World Cup gold medal\" border=\"0\"></a><a href=\"worldcup.php?swc=9\"><img src=\"img/wcsmallbronze.jpg\" alt=\"World Cup bronze medal\" title=\"World Cup bronze medal\" border=\"0\"></a>";}
elseif ($clubclub==47027) {$dong= "<a href=\"worldcup.php?swc=10\"><img src=\"img/wcsmallgold.jpg\" alt=\"World Cup gold medal\" title=\"World Cup gold medal\" border=\"0\"></a>";}
elseif ($clubclub==49781) {$dong= "<a href=\"u18worldcup.php?swc=7\"><img src=\"img/wcsmallbronze.jpg\" alt=\"U19 World Cup bronze medal\" title=\"U19 World Cup bronze medal\" border=\"0\"></a>";}
elseif ($clubclub==52490) {$dong= "<a href=\"u18worldcup.php?swc=6\"><img src=\"img/wcsmallgold.jpg\" alt=\"U18 World Cup gold medal\" title=\"U18 World Cup gold medal\" border=\"0\"></a>";}
elseif ($clubclub==53061) {$dong= "<img src=\"img/cu2.png\" alt=\"Second best forum poster of 2010\" title=\"Second best forum poster of 2010\" border=\"0\" height=\"43\"> ";}
elseif ($clubclub==54348) {$dong= "<a href=\"u18worldcup.php?swc=9\"><img src=\"img/wcsmallgold.jpg\" alt=\"U19 World Cup gold medal\" title=\"U19 World Cup gold medal\" border=\"0\"></a>";}
elseif ($clubclub==56273) {$dong= "<img src=\"img/cu1.png\" alt=\"Top forum poster of 2010\" title=\"Top forum poster of 2010\" border=\"0\" height=\"43\"> ";}
elseif ($clubclub==62681) {$dong= "<a href=\"worldcup.php?swc=7\"><img src=\"img/wcsmallbronze.jpg\" alt=\"World Cup bronze medal\" title=\"World Cup bronze medal\" border=\"0\"></a>";}
elseif ($clubclub==63436) {$dong= "<a href=\"bsfantasy.php\"><img src=\"img/fantasy.gif\" alt=\"World Cup Fantasy game winner\" title=\"World Cup Fantasy game winner\" border=\"0\"></a> ";}
elseif ($clubclub==79869) {$dong= "<a href=\"bsfantasy.php\"><img src=\"img/fantasy.gif\" alt=\"World Cup Fantasy game winner\" title=\"World Cup Fantasy game winner\" border=\"0\"></a> ";}
elseif ($clubclub==83212) {$dong= "<a href=\"bsfantasy.php\"><img src=\"img/fantasy.gif\" alt=\"World Cup Fantasy game winner\" title=\"World Cup Fantasy game winner\" border=\"0\"></a> <img src=\"img/cu2.png\" alt=\"Second best forum poster of 2011\" title=\"Second best forum poster of 2011\" border=\"0\" height=\"43\"> <img src=\"img/cu3.png\" alt=\"Third best forum poster of 2012\" title=\"Third best forum poster of 2012\" border=\"0\" height=\"43\"> ";}
elseif ($clubclub==83215) {$dong= "<img src=\"img/cu3.png\" alt=\"Third best forum poster of 2010\" title=\"Third best forum poster of 2010\" border=\"0\" height=\"43\"> <img src=\"img/cu1.png\" alt=\"Top forum poster of 2011\" title=\"Top forum poster of 2011\" border=\"0\" height=\"43\"> <img src=\"img/cu1.png\" alt=\"Top forum poster of 2012\" title=\"Top forum poster of 2012\" border=\"0\" height=\"43\"> ";}
elseif ($clubclub==114201) {$dong= "<a href=\"u18worldcup.php?swc=8\"><img src=\"img/wcsmallbronze.jpg\" alt=\"U19 World Cup bronze medal\" title=\"U19 World Cup bronze medal\" border=\"0\"></a>";}
elseif ($clubclub==124768) {$dong= "<a href=\"u18worldcup.php?swc=3\"><img src=\"img/wcsmallsilver.jpg\" alt=\"U18 World Cup silver medal\" title=\"U18 World Cup silver medal\" border=\"0\"></a>";}

$zmagal = mysql_query("SELECT h_type, h_country, h_season, h_llevel, h_lname, h_lid FROM history WHERE won > 0 AND h_userid=$clubclub") or die(mysql_error());
$nagradil = mysql_query("SELECT id FROM threepoints WHERE sponsor = $clubclub");
if ((mysql_num_rows($nagradil) > 0 OR mysql_num_rows($zmagal) > 0 OR strlen($dong) >0) AND $huhsupporter==1) {
echo "<h2>",$langmark500,"</h2><br/>&nbsp;";
if (strlen($dong) >0) {echo $dong;}
$pok = 0;
while ($pok < (mysql_num_rows($zmagal))) {
$h_type=mysql_result($zmagal,$pok,"h_type");
$h_country=mysql_result($zmagal,$pok,"h_country");
$h_season=mysql_result($zmagal,$pok,"h_season");
$l_name=mysql_result($zmagal,$pok,"h_lname");
$l_link=mysql_result($zmagal,$pok,"h_lid");
$l_level=mysql_result($zmagal,$pok,"h_llevel");
//prikaz
if ($h_type==55) {
?><img src="img/Gold.png" alt="5 years" title="5 years in Basketsim!" border="0">
<?php
}
if ($h_type==3) {
?><a href="showmatches.php?clubid=<?=$clubclub?>&show=arch&cuse=<?=$h_season?>"><img src="img/cupaward.png" alt="<?=$langmark501,", ",$langmark502," ",$h_season?>" title="<?=$langmark501,", ",$langmark502," ",$h_season?>" border="0"></a>
<?php
}
if ($h_type==1) {
?><a href="leagues.php?leagueid=<?=$l_link?>&season=<?=$h_season?>"><img src="img/<?="league".$l_level?>.png" alt="Winners of league <?=$l_name?> in season <?=$h_season?>" title="Winners of league <?=$l_name?> in season <?=$h_season?>" border="0"></a>
<?php
}
if ($h_type==10) {
?><a href="fairplaycup.php"><img src="img/10fpc.gif" alt="10th Fair Play Cup appearance in season <?=$h_season?>" title="10th Fair Play Cup appearance in season <?=$h_season?>" border="0"></a>
<?php
}
if ($h_type==5 AND $h_season==2) {
?><a href="fairplaycup.php?season=<?=$h_season?>&round=9"><img src="img/pokalcic.png" alt="Winners of the Fair Play Cup in season <?=$h_season?>" title="Winners of the Fair Play Cup in season <?=$h_season?>" border="0"></a>
<?php
}
if ($h_type==5 AND $h_season>2) {
?><a href="fairplaycup.php?season=<?=$h_season?>&round=10"><img src="img/pokalcic.png" alt="Winners of the Fair Play Cup in season <?=$h_season?>" title="Winners of the Fair Play Cup in season <?=$h_season?>" border="0"></a>
<?php
}
if ($h_type==6) {
?><a href="cs.php?season=<?=$h_season?>&round=7"><img src="img/int_CS.gif" alt="Winners of the Champions Series in season <?=$h_season?>" title="Winners of the Champions Series in season <?=$h_season?>" border="0"></a>
<?php
}
if ($h_type==7) {
?><a href="cws.php?season=<?=$h_season?>&round=7"><img src="img/int_CWS.gif" alt="Winners of the Cup Winners Series in season <?=$h_season?>" title="Winners of the Cup Winners Series in season <?=$h_season?>" border="0"></a>
<?php
}
if ($h_type==19) {
?><a href="ycwc.php?season=<?=$h_season?>&round=7"><img src="img/ycwc.png" alt="Winners of the Youth Club World Cup in season <?=$h_season?>" title="Winners of the Youth Club World Cup in season <?=$h_season?>" border="0"></a>
<?php
}
$pok++;
}

$nag=0;
if (mysql_num_rows($nagradil) > 0) {
$salar = mysql_query("SELECT SUM(totalsup) FROM threepoints WHERE sponsor = $clubclub") or die(mysql_error());
list($sum) = mysql_fetch_row($salar);
SWITCH($sum) {
CASE 3: echo "<a href=\"threepointers.php?super=winners\"><img src=\"img/silver.gif\" alt=\"Silver sponsor of 3-points contest\" title=\"Silver sponsor of 3-points contest\" border=\"0\"></a>"; break;
CASE 6: echo "<a href=\"threepointers.php?super=winners\"><img src=\"img/silver.gif\" alt=\"Silver sponsor of 3-points contest\" title=\"Silver sponsor of 3-points contest\" border=\"0\"></a> <a href=\"threepointers.php?super=winners\"><img src=\"img/silver.gif\" alt=\"Silver sponsor of 3-points contest\" title=\"Silver sponsor of 3-points contest\" border=\"0\"></a>"; break;
CASE 9: echo "<a href=\"threepointers.php?super=winners\"><img src=\"img/silver.gif\" alt=\"Silver sponsor of 3-points contest\" title=\"Silver sponsor of 3-points contest\" border=\"0\"></a> <a href=\"threepointers.php?super=winners\"><img src=\"img/silver.gif\" alt=\"Silver sponsor of 3-points contest\" title=\"Silver sponsor of 3-points contest\" border=\"0\"></a> <a href=\"threepointers.php?super=winners\"><img src=\"img/silver.gif\" alt=\"Silver sponsor of 3-points contest\" title=\"Silver sponsor of 3-points contest\" border=\"0\"></a>"; break;
CASE 12: echo "<a href=\"threepointers.php?super=winners\"><img src=\"img/3pokal.gif\" alt=\"Gold sponsor of 3-points contest\" title=\"Gold sponsor of 3-points contest\" border=\"0\"></a>"; break;
CASE 15: echo "<a href=\"threepointers.php?super=winners\"><img src=\"img/3pokal.gif\" alt=\"Gold sponsor of 3-points contest\" title=\"Gold sponsor of 3-points contest\" border=\"0\"></a> <a href=\"threepointers.php?super=winners\"><img src=\"img/silver.gif\" alt=\"Silver sponsor of 3-points contest\" title=\"Silver sponsor of 3-points contest\" border=\"0\"></a>"; break;
CASE 18: echo "<a href=\"threepointers.php?super=winners\"><img src=\"img/3pokal.gif\" alt=\"Gold sponsor of 3-points contest\" title=\"Gold sponsor of 3-points contest\" border=\"0\"></a> <a href=\"threepointers.php?super=winners\"><img src=\"img/silver.gif\" alt=\"Silver sponsor of 3-points contest\" title=\"Silver sponsor of 3-points contest\" border=\"0\"></a> <a href=\"threepointers.php?super=winners\"><img src=\"img/silver.gif\" alt=\"Silver sponsor of 3-points contest\" title=\"Silver sponsor of 3-points contest\" border=\"0\"></a>"; break;
CASE 21: echo "<a href=\"threepointers.php?super=winners\"><img src=\"img/3pokal.gif\" alt=\"Gold sponsor of 3-points contest\" title=\"Gold sponsor of 3-points contest\" border=\"0\"></a> <a href=\"threepointers.php?super=winners\"><img src=\"img/silver.gif\" alt=\"Silver sponsor of 3-points contest\" title=\"Silver sponsor of 3-points contest\" border=\"0\"></a> <a href=\"threepointers.php?super=winners\"><img src=\"img/silver.gif\" alt=\"Silver sponsor of 3-points contest\" title=\"Silver sponsor of 3-points contest\" border=\"0\"></a> <a href=\"threepointers.php?super=winners\"><img src=\"img/silver.gif\" alt=\"Silver sponsor of 3-points contest\" title=\"Silver sponsor of 3-points contest\" border=\"0\"></a>"; break;
CASE 24: echo "<a href=\"threepointers.php?super=winners\"><img src=\"img/3pokal.gif\" alt=\"Gold sponsor of 3-points contest\" title=\"Gold sponsor of 3-points contest\" border=\"0\"></a> <a href=\"threepointers.php?super=winners\"><img src=\"img/3pokal.gif\" alt=\"Gold sponsor of 3-points contest\" title=\"Gold sponsor of 3-points contest\" border=\"0\"></a>"; break;
CASE 27: echo "<a href=\"threepointers.php?super=winners\"><img src=\"img/3pokal.gif\" alt=\"Gold sponsor of 3-points contest\" title=\"Gold sponsor of 3-points contest\" border=\"0\"></a> <a href=\"threepointers.php?super=winners\"><img src=\"img/3pokal.gif\" alt=\"Gold sponsor of 3-points contest\" title=\"Gold sponsor of 3-points contest\" border=\"0\"></a> <a href=\"threepointers.php?super=winners\"><img src=\"img/silver.gif\" alt=\"Silver sponsor of 3-points contest\" title=\"Silver sponsor of 3-points contest\" border=\"0\"></a>"; break;
CASE 30: echo "<a href=\"threepointers.php?super=winners\"><img src=\"img/3pokal.gif\" alt=\"Gold sponsor of 3-points contest\" title=\"Gold sponsor of 3-points contest\" border=\"0\"></a> <a href=\"threepointers.php?super=winners\"><img src=\"img/3pokal.gif\" alt=\"Gold sponsor of 3-points contest\" title=\"Gold sponsor of 3-points contest\" border=\"0\"></a> <a href=\"threepointers.php?super=winners\"><img src=\"img/silver.gif\" alt=\"Silver sponsor of 3-points contest\" title=\"Silver sponsor of 3-points contest\" border=\"0\"></a> <a href=\"threepointers.php?super=winners\"><img src=\"img/silver.gif\" alt=\"Silver sponsor of 3-points contest\" title=\"Silver sponsor of 3-points contest\" border=\"0\"></a>"; break;
CASE 33: echo "<a href=\"threepointers.php?super=winners\"><img src=\"img/3pokal.gif\" alt=\"Gold sponsor of 3-points contest\" title=\"Gold sponsor of 3-points contest\" border=\"0\"></a> <a href=\"threepointers.php?super=winners\"><img src=\"img/3pokal.gif\" alt=\"Gold sponsor of 3-points contest\" title=\"Gold sponsor of 3-points contest\" border=\"0\"></a> <a href=\"threepointers.php?super=winners\"><img src=\"img/silver.gif\" alt=\"Silver sponsor of 3-points contest\" title=\"Silver sponsor of 3-points contest\" border=\"0\"></a> <a href=\"threepointers.php?super=winners\"><img src=\"img/silver.gif\" alt=\"Silver sponsor of 3-points contest\" title=\"Silver sponsor of 3-points contest\" border=\"0\"></a> <a href=\"threepointers.php?super=winners\"><img src=\"img/silver.gif\" alt=\"Silver sponsor of 3-points contest\" title=\"Silver sponsor of 3-points contest\" border=\"0\"></a>"; break;
CASE 36: echo "<a href=\"threepointers.php?super=winners\"><img src=\"img/3pokal.gif\" alt=\"Gold sponsor of 3-points contest\" title=\"Gold sponsor of 3-points contest\" border=\"0\"></a> <a href=\"threepointers.php?super=winners\"><img src=\"img/3pokal.gif\" alt=\"Gold sponsor of 3-points contest\" title=\"Gold sponsor of 3-points contest\" border=\"0\"></a> <a href=\"threepointers.php?super=winners\"><img src=\"img/3pokal.gif\" alt=\"Gold sponsor of 3-points contest\" title=\"Gold sponsor of 3-points contest\" border=\"0\"></a>"; break;
CASE 39: echo "<a href=\"threepointers.php?super=winners\"><img src=\"img/3pokal.gif\" alt=\"Gold sponsor of 3-points contest\" title=\"Gold sponsor of 3-points contest\" border=\"0\"></a> <a href=\"threepointers.php?super=winners\"><img src=\"img/3pokal.gif\" alt=\"Gold sponsor of 3-points contest\" title=\"Gold sponsor of 3-points contest\" border=\"0\"></a> <a href=\"threepointers.php?super=winners\"><img src=\"img/3pokal.gif\" alt=\"Gold sponsor of 3-points contest\" title=\"Gold sponsor of 3-points contest\" border=\"0\"></a> <a href=\"threepointers.php?super=winners\"><img src=\"img/silver.gif\" alt=\"Silver sponsor of 3-points contest\" title=\"Silver sponsor of 3-points contest\" border=\"0\"></a>"; break;
CASE 42: echo "<a href=\"threepointers.php?super=winners\"><img src=\"img/3pokal.gif\" alt=\"Gold sponsor of 3-points contest\" title=\"Gold sponsor of 3-points contest\" border=\"0\"></a> <a href=\"threepointers.php?super=winners\"><img src=\"img/3pokal.gif\" alt=\"Gold sponsor of 3-points contest\" title=\"Gold sponsor of 3-points contest\" border=\"0\"></a> <a href=\"threepointers.php?super=winners\"><img src=\"img/3pokal.gif\" alt=\"Gold sponsor of 3-points contest\" title=\"Gold sponsor of 3-points contest\" border=\"0\"></a> <a href=\"threepointers.php?super=winners\"><img src=\"img/silver.gif\" alt=\"Silver sponsor of 3-points contest\" title=\"Silver sponsor of 3-points contest\" border=\"0\"></a> <a href=\"threepointers.php?super=winners\"><img src=\"img/silver.gif\" alt=\"Silver sponsor of 3-points contest\" title=\"Silver sponsor of 3-points contest\" border=\"0\">"; break;
CASE 45: echo "<a href=\"threepointers.php?super=winners\"><img src=\"img/3pokal.gif\" alt=\"Gold sponsor of 3-points contest\" title=\"Gold sponsor of 3-points contest\" border=\"0\"></a> <a href=\"threepointers.php?super=winners\"><img src=\"img/3pokal.gif\" alt=\"Gold sponsor of 3-points contest\" title=\"Gold sponsor of 3-points contest\" border=\"0\"></a> <a href=\"threepointers.php?super=winners\"><img src=\"img/3pokal.gif\" alt=\"Gold sponsor of 3-points contest\" title=\"Gold sponsor of 3-points contest\" border=\"0\"></a> <a href=\"threepointers.php?super=winners\"><img src=\"img/silver.gif\" alt=\"Silver sponsor of 3-points contest\" title=\"Silver sponsor of 3-points contest\" border=\"0\"></a> <a href=\"threepointers.php?super=winners\"><img src=\"img/silver.gif\" alt=\"Silver sponsor of 3-points contest\" title=\"Silver sponsor of 3-points contest\" border=\"0\"></a> <a href=\"threepointers.php?super=winners\"><img src=\"img/silver.gif\" alt=\"Silver sponsor of 3-points contest\" title=\"Silver sponsor of 3-points contest\" border=\"0\">"; break;
CASE 48: echo "<a href=\"threepointers.php?super=winners\"><img src=\"img/3pokal.gif\" alt=\"Gold sponsor of 3-points contest\" title=\"Gold sponsor of 3-points contest\" border=\"0\"></a> <a href=\"threepointers.php?super=winners\"><img src=\"img/3pokal.gif\" alt=\"Gold sponsor of 3-points contest\" title=\"Gold sponsor of 3-points contest\" border=\"0\"></a> <a href=\"threepointers.php?super=winners\"><img src=\"img/3pokal.gif\" alt=\"Gold sponsor of 3-points contest\" title=\"Gold sponsor of 3-points contest\" border=\"0\"></a> <a href=\"threepointers.php?super=winners\"><img src=\"img/3pokal.gif\" alt=\"Gold sponsor of 3-points contest\" title=\"Gold sponsor of 3-points contest\" border=\"0\"></a>"; break;



}
}
echo "<br/>";
}

//gestbuk
if ($huhsupporter==1 OR $cform >1) {
?>

<h2><?=$langmark504?></h2><br/>
<?php
$gspor = mysql_query("SELECT gauthor, gcontent, gtime FROM guestbook WHERE greceiver='$clubclub' ORDER BY gid DESC LIMIT 1") or die(mysql_error());
if (mysql_num_rows($gspor)) {
$lastauthor = mysql_result($gspor,0,"gauthor");
$njime = mysql_query("SELECT username FROM users WHERE userid = $lastauthor") or die(mysql_error());
if (mysql_num_rows($njime)) {$avtime=mysql_result($njime,0);} else {$avtime=$langmark528;}
$lastcontent = mysql_result($gspor,0,"gcontent");
$lastcontent = str_replace("ooooooooooooooooooooooo","ooooooo",$lastcontent);
$lastcontent = str_replace("aaaaaaaaaaaaaaaaaaaaaaa","aaaaaaa",$lastcontent);
$lastcontent = str_replace("EEEEEEEEEEEEEEEEEEEEE","EEEEEEE",$lastcontent);

//funkcija za smeske
function smeski($string){
  $lokacija = "img/smeski";
  $asci = array(":)", ":D", ":(", ":S", ":s", "=)", "8)", ":o", ":O", ":|", ";)", "!!!", "???", ":basket");
  $slikce = array("<img src=\"$lokacija/icon_smile.gif\">", "<img src=\"$lokacija/icon_biggrin.gif\">", "<img src=\"$lokacija/icon_sad.gif\">", "<img src=\"$lokacija/icon_confused.gif\">", "<img src=\"$lokacija/icon_confused.gif\">",
  "<img src=\"$lokacija/icon_cheesygrin.gif\">", "<img src=\"$lokacija/icon_cool.gif\">", "<img src=\"$lokacija/icon_surprised.gif\">", "<img src=\"$lokacija/icon_eek.gif\">", "<img src=\"$lokacija/icon_neutral.gif\">",
  "<img src=\"$lokacija/icon_wink.gif\">", "<img src=\"$lokacija/icon_exclaim.gif\">", "<img src=\"$lokacija/icon_question.gif\">", "<img src=\"$lokacija/score.gif\">");

  $nova = str_replace($asci, $slikce, $string);
  return $nova;
}
$lastcontent =  smeski($lastcontent);

$lasttime = mysql_result($gspor,0,"gtime");
$splitgb = explode(" ", $lasttime); $gb1date = $splitgb[0]; $gb2time = $splitgb[1];
$split1 = explode("-", $gb1date); $gbyear = $split1[0]; $gbmonth = $split1[1]; $gbday = $split1[2];
$split2 = explode(":", $gb2time); $gbhour = $split2[0]; $gbmin = $split2[1]; $gbsec = $split2[2];
$gbtime = date("d.m.Y", mktime($gbhour,$gbmin,$gbsec,$gbmonth,$gbday,$gbyear));
echo $langmark529," ",$gbtime," ",$langmark530," <a href=\"club.php?clubid=",$lastauthor,"\">",$avtime,"</a><br/><i>",$lastcontent,"</i><br/><br/>";
}
else {echo "<i>",$langmark505,"</i><br/><br/>";}
echo "<a href=\"viewguestbook.php?clubid=",$clubclub,"\">",$langmark506,"</a>";
if ($huhsupporter==1 OR $moderating >1) {echo "&nbsp;|&nbsp;<a href=\"club.php?clubid=",$clubclub,"&guest=write\">",$langmark507,"</a><br/>";}

}
$guest = $_GET['guest'];
if ($guest=='empty') {echo "<b>",$langmark508,"</b>";}
if ($guest=='write' AND ($is_supporter==1 OR $moderating > 1)) {
?>
<form method="post" action="<?=$PHP_SELF?>?clubid=<?=$clubclub?>" style="margin: 0">
<textarea name="ginput" rows="3" cols="29" wrap="soft" id="ginput" onKeyDown="limitText(this.form.ginput,this.form.countdown,150);"
onKeyUp="limitText(this.form.ginput,this.form.countdown,150);" class="inputreg"></textarea><br/>
<input readonly type="text" name="countdown" size="3" value="150" class="inputreg"><input type="submit" value="<?=$langmark509?>" name="gadd" class="buttonreg">
</form>

<?php } ?>
<h2><?=$langmark510?></h2><br/>

<a href="playerslist.php?clubid=<?=$clubclub?>"><?=$langmark034?></a><br/>
<a href="club.php?clubid=<?=$clubclub?>&action=showcoach"><?=$langmark036?></a><br/>
<a href="showmatches.php?clubid=<?=$clubclub?>"><?=$langmark043?></a><br/>
<a href="clubhistory.php?clubid=<?=$clubclub?>">Club history</a><br/>
<a href="transfhistory.php?clubid=<?=$clubclub?>"><?=$langmark466?></a><br/>

<?php
if ($userid<>$clubclub) {

if (($is_supporter==1 || $moderating >1) AND $coachaction<>'showpast') {?><a href="club.php?clubid=<?=$clubclub?>&action=showpast">Past duels</a><br/><?php }
if ($moderating > 2) {echo "<a href=\"admin/transfers_o.php?club=",$clubclub,"\"><font color=\"red\">Check current bids</font></a><br/>";}

//FRIENDLIES
switch ($friendly==0 AND $friendly1==0) {
case (TRUE):
?>
<br/><h2><?=$langmark511?></h2><br/>
<?php
$where = $_POST["where"];
if (!isset($_POST['submit1'])) {
?>
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="margin: 0">
<?=$langmark512?>
<br/>
<select name="where" class="inputreg">
<option value="1"><?=$langmark182?></option>
<option value="2"><?=$langmark183?></option></select>
<input type="submit" value="<?=$langmark219?>" name="submit1" class="buttonreg">
</form>
<?php
} else {
if ($friendly<>0 OR $friendly1<>0){die ("<p>$langmark513</p>");}
$setfcha = mysql_query("INSERT INTO friendly VALUES ('', $userid, $clubclub, $where);");
if($setfcha){
//$ovest = mysql_query("INSERT INTO events VALUES ('', $get_team, NOW(), 'Received challenge', 0, 0);");
echo "<p>",$langmark191,"</p>";
}
}
break;
case (FALSE):
echo "<br/><h2>",$langmark511,"</h2><br/>";
if ($friendly1 == 1) {echo $langmark193;}
else {echo $langmark514;}
break;
}

//MESSAGES
?>
<br/><h2><?=$langmark515?></h2><br/>
<?php
if ($cform>2) {echo "<font color=\"darkred\">",$langmark516," <a href=\"gmcontact.php\">",$langmark222,"</a>.</font><br/>";}

$title = $_POST["title"];
$message = $_POST["message"];
if (!isset($_POST['submit'])) {
?>
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="margin: 0">
<?=$langmark341?>: <input type="text" size="16" maxlength="35" name="title" class="inputreg"><br/>
<textarea style="width: 156px; padding: 1px; margin: 2px;" rows="6" name="message" wrap="soft" onKeyDown="limitText(this.form.message,this.form.countdown,500);"
onKeyUp="limitText(this.form.message,this.form.countdown,500);" class="inputreg"></textarea>
<br/><input readonly type="text" name="countdown" size="3" value="500" class="inputreg">
<input type="submit" value="<?=$langmark219?>" name="submit" class="buttonreg">
</form>
<?php
} else {
if (!$title AND $lang1<>$lang) {$title = "(no subject)";}
if (!$title AND $lang1==$lang) {$title = "(".$langmark517.")";}
if (!$message) {die("<p>$langmark518!<br/><a href=\"javascript:history.go(-1)\">$langmark059</a> $langmark519.</p>");}

$title=strip_tags($title);
$title=mysql_real_escape_string($title);
$message = strip_tags($message);
$message = nl2br($message);
$message = mysql_real_escape_string($message);

//spam
if ($clubclub==1 AND $userid==45827) {$bggg=34;} else {$bggg=0;}
if ($is_supporter==0 AND $moderating==0) {
} else {
	$alije = stristr($message,"powerplaymanager");
	if (strlen($alije)>0 OR $dlehen==9) {mysql_query("INSERT INTO messages VALUES ('', 1, 0, 0, NOW(), '$title', '$message')"); die();}
	$alije1 = stristr($message,"teamhb");
	if (strlen($alije1)>0) {mysql_query("INSERT INTO messages VALUES ('', 1, $userid, 0, NOW(), '$title', '$message')"); die();}

	if ($userid<>2160000 AND $bggg<>34) {mysql_query("INSERT INTO messages VALUES ('', $clubclub, $userid, 0, NOW(), '$title', '$message')") or die(mysql_error());
	echo $langmark520,"<br/><a href=\"club.php?clubid=",$clubclub,"\">",$langmark491,"</a>";}
	}
}

}
else
{
?>
<a href="statement.php"><?=$langmark521?></a><br/>
<a href="newlogo.php"><?=$langmark522?></a><br/>
<?php if ($is_supporter==1 || $moderating > 1) { ?><a href="newshirt.php"><?=$langmark523?></a><br/><?php } ?>
<a href="club.php?do=changename"><?=$langmark016?></a><br/>

<?php
//preimenovanje
$do = $_GET["do"];
$notice = $_GET["msg"];
if ($do=='changename'){
$name = stripslashes($name);
?>
<br/><h2>Rename your team</h2><br/>
<?php
if ($notice==1) {echo "<b><font color=\"red\">Name too short!</font></b><br/>";}
if ($notice==2) {echo "<b><font color=\"red\">Name already taken!</font></b><br/>";}
if ($notice==3) {echo "<b><font color=\"red\">Change isn't possible. At least 4 months must pass since your last rename.</font></b><br/>";}
if ($notice==4) {echo "<b><font color=\"red\">This name is reserved and can not be used as a team name.</font></b><br/>";}
?>
<form method="post" action="<?=$PHP_SELF?>" style="margin: 0">
<b>New name:</b>&nbsp;<input type="text" maxlength="33" size="18" name="novime" value="<?=$name?>" class="inputreg"><br/>
<b>Short name:</b>&nbsp;<input type="text" maxlength="30" size="16" name="novkratk" value="<?=stripslashes($shortname)?>" class="inputreg"><br/>
<input type="submit" value="<?=$langmark018?>" name="submit97" class="buttonreg"><br/>
<i>It costs 125.000 &euro; to rename team. Offensive names are not allowed and will be punished!</i><br/>
</form>
<?php
}

echo "<br/><h2>",$langmark524,"</h2><br/>";

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

$resultev = mysql_query("SELECT `eventid`, `when`, `description` FROM `events` WHERE `type`=0 AND `team`='$trueclub'");
$all_info = array();
while ($get_info = mysql_fetch_row($resultev)){
$all_info[] = $get_info;
}
$all_info = multisort($all_info,2,10,'0','1','2');
foreach($all_info as $get_info) {
$splitdatetime = explode(" ", $get_info[1]); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$datedisplay = date("d.m.y", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));
$description1 = $get_info[2]." ";
$description1 = substr($description1,0,24);
$description1 = substr($description1,0,strrpos($description1,' '));
$plitdatetime = explode(" ", $expajr); $btime = $plitdatetime[1]; $plittime = explode(":", $btime); $bhour = $plittime[0]; $bmin = $plittime[1]; $bsec = $plittime[2];
if ($description1 == 'Better price was') {$descr = explode ("?", "$get_info[2]"); $drugidel = explode ("=", "$descr[1]"); $smotanid = explode (">", "$drugidel[1]");
echo $datedisplay," - ",$langmark444," <a href=\"player.php?playerid=",$smotanid[0],"\">",$langmark445,"</a>.<br/>";}
elseif ($get_info[2] == 'Received challenge' OR $get_info[2] == 'Received challenge.') {echo $datedisplay," - ",$langmark190,"<br/>";}
elseif (($get_info[2]=='Your WildCard supportership week has come to an end. If you enjoyed it, please be welcome to support the game at any time in the future!') OR ($is_supporter==0 AND $bhour==1 AND $bmin==0 AND $bsec==0 AND $get_info[2]==' Your supportership has expired, thanks for supporting Basketsim! Consider to continue your support as this helps the game to exist and improve!')) {echo $datedisplay," - <i>Your test supportership has expired. If you enjoyed it, please consider to support the game, because users support is the only way for this game to exist and improve!</i><br/>";}
else {echo $datedisplay," - ",$get_info[2],"<br/>";}
}
?>
<br/><a href="latestnews.php"><?=$langmark525?></a> | <a href="club.php?cleanup=yes"><?=$langmark526?></a>
<?php
}
//konec prikaza brez action
}
?>
</td>
</tr>
</table>
</div>
</div>
</body>
</html>