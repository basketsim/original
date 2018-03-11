<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}
$getuser=mysql_query("SELECT lang FROM users WHERE password='$koda' AND userid='$userid' LIMIT 1");
if (mysql_num_rows($getuser)) {$lang = mysql_result($getuser,0,"lang");} else {die(include 'basketsim.php');}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2>FLAG CHASE STATS</h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff" width="100%">
<td class="border" width="100%">
<h2><table border="0" cellspacing="0" cellpadding="0" width="100%"><tr><td>Flag chasing stats</td><td align="right"><a href="newflags.php?see=help1" class="greenhilite" style="color:white">more info</a>&nbsp;</td></tr></table></h2><br/>
<?php
$see=$_GET['see'];
if ($see=='help1') {echo "Flag chasing stats are available to all users, however only current supporters are present in results. When user becomes supporter he is added at the next update (Thursday) with all his past data included! To understand different columns, check the legend at the bottom of the page. There are two main challenges, one is to <i>get flags from 128 friendlies</i> against opponents from different countries (64 home and 64 away). All users who reach that challenge will receive a club history entry. The second is so called <i>super challenge</i> - to collect 128 guestbook entries in addition to 128 friendly games flags. All winners of the super challenge will receive a special award! There will be no differentiation between winners of both challenges, so take your time and play long term - just like Basketsim should be played!</i><hr/>";}
?>
<table width="100%" cellspacing="0" cellpadding="1">
<tr height="100%" width="100%"><td width="143"></td>
<td align="center"><a href="newflags.php?which=mh" title="Matches hosted"><b>MH</b></a></td>
<td align="center"><a href="newflags.php?which=mv" title="Matches visited"><b>MV</b></a></td>
<td align="center"><a href="newflags.php?which=tm" title="Total matches"><b>TM</b></a></td>
<td align="center"><a href="newflags.php?which=fh" title="Friendlies hosted"><b>FH</b></a></td>
<td align="center"><a href="newflags.php?which=fv" title="Friendlies visited"><b>VF</b></a></td>
<td align="center"><a href="newflags.php?which=tf" title="Total friendlies"><b>TF</b></a></td>
<td align="center"><a href="newflags.php?which=gr" title="Guestbooks received"><b>GR</b></a></td>
<td align="center"><a href="newflags.php?which=gp" title="Guestbooks posted"><b>GP</b></a></td>
<td align="center"><a href="newflags.php?which=tg" title="Total guestbooks"><b>TG</b></a></td>
<td align="center"><a href="newflags.php?which=po" title="Players owed"><b>PO</b></a></td>
<tr><td colspan="13"><hr/></td></tr>
<?php
$ore=1;
$which=$_GET['which'];
if (strlen($which)<>2) {$which='tm';}
SWITCH ($which) {
CASE 'mh': $order = mysql_query("SELECT * FROM `flags` ORDER BY homematches DESC, totmatches DESC") or die(mysql_error()); break;
CASE 'mv': $order = mysql_query("SELECT * FROM `flags` ORDER BY awaymatches DESC, totmatches DESC") or die(mysql_error()); break;
CASE 'tm': $order = mysql_query("SELECT * FROM `flags` ORDER BY totmatches DESC, totfriendlies DESC") or die(mysql_error()); break;
CASE 'fh': $order = mysql_query("SELECT * FROM `flags` ORDER BY homefriendlies DESC, totfriendlies DESC") or die(mysql_error()); break;
CASE 'fv': $order = mysql_query("SELECT * FROM `flags` ORDER BY awayfriendlies DESC, totfriendlies DESC") or die(mysql_error()); break;
CASE 'tf': $order = mysql_query("SELECT * FROM `flags` ORDER BY totfriendlies DESC, totmatches DESC") or die(mysql_error()); break;
CASE 'gr': $order = mysql_query("SELECT * FROM `flags` ORDER BY homegbs DESC, totgbs DESC") or die(mysql_error()); break;
CASE 'gp': $order = mysql_query("SELECT * FROM `flags` ORDER BY awaygbs DESC, totgbs DESC") or die(mysql_error()); break;
CASE 'tg': $order = mysql_query("SELECT * FROM `flags` ORDER BY totgbs DESC, totmatches DESC") or die(mysql_error()); break;
CASE 'po': $order = mysql_query("SELECT * FROM `flags` ORDER BY players DESC, totmatches DESC") or die(mysql_error()); break;
}
while ($v = mysql_fetch_array($order)) {
$user = $v['user'];
$username = $v['username'];
$country = $v['country'];
$teamname = $v['team']; $teamname = stripslashes($teamname);
$homematches = $v['homematches'];
$awaymatches = $v['awaymatches'];
$homefriendlies = $v['homefriendlies'];
$awayfriendlies = $v['awayfriendlies'];
$homegbs = $v['homegbs'];
$awaygbs = $v['awaygbs'];
$players = $v['players'];
$totfriendlies = $v['totfriendlies'];
$totmatches = $v['totmatches'];
$totgbs = $v['totgbs'];

if ($ore < 21 OR $user==$userid) {
if ($user==$userid) {echo "<tr bgcolor=\"#FFDAB9\" width=\"100%\">"; $chol='#FFDAB9'; $jajn=4; $klava='#FFDAB9';}
else {$chol='#ECE5CE'; $klava='white'; echo "<tr onmouseover=\"style.backgroundColor='".$chol."';\" onmouseout=\"style.backgroundColor='".$klava."'\">";}
?>
<td><img src="img/Flags/<?=$country?>.png" border="0" alt="<?=$country?>" title="<?=$country?>">
<?=$ore?>. <a href="club.php?clubid=<?=$user?>&flags=all" class="greenhilite" title="<?=$teamname?>"><?=$username?></a></b></td>
<td align="center"><?=$homematches?>/<font color="darkgray">64<font></td>
<td align="center"><?=$awaymatches?>/<font color="darkgray">64<font></td>
<td align="center" bgcolor="<?=$chol?>"><b><?=$totmatches?></b></td>
<td align="center"><?=$homefriendlies?>/<font color="darkgray">64<font></td>
<td align="center"><?=$awayfriendlies?>/<font color="darkgray">64<font></td>
<td align="center" bgcolor="<?=$chol?>"><b><?=$totfriendlies?></b></td>
<td align="center"><?=$homegbs?>/<font color="darkgray">64<font></td>
<td align="center"><?=$awaygbs?>/<font color="darkgray">64<font></td>
<td align="center" bgcolor="<?=$chol?>"><b><?=$totgbs?></b></td>
<td align="center"><?=$players?></td>
<?php
}
$ore++;
}
?>
</table><hr/><br/><b>Legend</b><br/>
<br/><b>MH</b> - all matches hosted against opponents from different countries
<br/><b>MV</b> - all matches played in different countries
<br/><b>TM</b> - total matches
<br/><b>FH</b> - friendlies hosted against opponents from different countries
<br/><b>FV</b> - friendlies played in different countries
<br/><b>TF</b> - total friendlies
<br/><b>GR</b> - guestbook posts received from different countries
<br/><b>GP</b> - guestbook posts posted to different countries
<br/><b>TG</b> - total guestbook posts
<br/><b>PO</b> - players from different countries who played for a team
</td>
</tr>
</table>
</div>
</div>
</body>
</html>