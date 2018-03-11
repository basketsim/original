<?php
$expandmenu1=99;
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}
$getuser=mysql_query("SELECT club, lang, supporter, `level` FROM users WHERE password='$koda' AND userid='$userid' LIMIT 1");
if (mysql_num_rows($getuser)) {
$get_team = mysql_result($getuser,0,"club");
$lang = mysql_result($getuser,0,"lang");
$suppo = mysql_result($getuser,0,"supporter");
$lev = mysql_result($getuser,0,"level");
}
else {die(include 'basketsim.php');}
if ($lev>0) {$suppo=1;}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2>INTERNATIONAL CLUB RANKING</h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff" width="100%">
<td class="border" width="100%">
<h2><table border="0" cellspacing="0" cellpadding="0" width="100%"><tr><td>Best clubs in international club competitions</td><td align="right"><a href="intclubrank.php?see=help1" class="greenhilite" style="color:white">more info</a>&nbsp;</td></tr></table></h2><br/>
<?php
$see=$_GET['see'];
if ($see=='help1') {echo"<b>How the ranking works?</b><br/><i>Ranking is based on results of the last 10 seasons in Champions Series (CS) and Cup Winners Series (CWS) and last 5 seasons in Fair Play Cup (FPC) and Youth Club World Cup (YCWC). CS results bring the most points, CWS results slightly less and FPC/YCWC much less. More recent results count more than those from more distant future. Teams with zero or negative points are excluded from the ranking even if they have appereances in one of the cups. Ranking is updated every Thursday 23:00.</i><hr/>";}
?>
<table width="100%" cellspacing="0" cellpadding="1">
<tr height="100%" width="100%"><td></td><td align="center">
<?php if ($suppo>0) {?><a href="intclubrank.php?which=cs"><b>CS</b></a></td><td align="center"><a href="intclubrank.php?which=cws"><b>CWS</b></a></td><td align="center"><a href="intclubrank.php?which=fpc"><b>FPC</b></a></td><td align="center"><a href="intclubrank.php?which=ycwc"><b>YCWC</b></a></td><td align="right"><a href="intclubrank.php"><b>rank</b></a></td></tr><?php }
else {?><b>CS</b></td><td align="center"><b>CWS</b></td><td align="center"><b>FPC</b></td><td align="center"><b>YCWC</b></td><td align="right"><b>rank</b></td></tr><?php }?>
<tr><td colspan="6"><hr/></td></tr>
<?php
$ore=1;
$which=$_GET['which'];
if ($which=='cs' AND $suppo==1) {$order = mysql_query("SELECT * FROM `intrank` WHERE rank6 >0 ORDER BY rank6 DESC") or die(mysql_error());}
elseif ($which=='cws' AND $suppo==1) {$order = mysql_query("SELECT * FROM `intrank` WHERE rank7 >0 ORDER BY rank7 DESC") or die(mysql_error());}
elseif ($which=='fpc' AND $suppo==1) {$order = mysql_query("SELECT * FROM `intrank` WHERE rank5 >0 ORDER BY rank5 DESC") or die(mysql_error());}
elseif ($which=='ycwc' AND $suppo==1) {$order = mysql_query("SELECT * FROM `intrank` WHERE rank19 >0 ORDER BY rank19 DESC") or die(mysql_error());}
else {$order = mysql_query("SELECT * FROM `intrank`") or die(mysql_error());}
while ($v = mysql_fetch_array($order)) {
$user = $v['userid'];
$suppo = $v['suppo'];
$tname = $v['tname'];
$country = $v['country'];
$rank5 = $v['rank5'];
$rank6 = $v['rank6'];
$rank7 = $v['rank7'];
$rank19 = $v['rank19'];
$rank = $v['rank'];
$lpos = $v['lpos'];
$pos = $v['pos'];
if ($rank5==-0.00) {$rank5=0.00;}
if ($rank6==-0.00) {$rank6=0.00;}
if ($rank7==-0.00) {$rank7=0.00;}
if ($rank19==-0.00) {$rank19=0.00;}
if ($which=='cs' OR $which=='cws' OR $which=='fpc' OR $which=='ycwc') {$pos=$ore; $zlik='&nbsp';}
elseif ($lpos==$pos) {$zlik = "<img src=\"img/narrowa.png\" border=\"0\"  alt=\"==\" title=\"No change\">";}
elseif ($lpos<$pos) {$zlik = "<img src=\"img/pos_down.png\" border=\"0\"  alt=\"up\" title=\"Down from ".$lpos.". place\">";}
else {$zlik = "<img src=\"img/pos_up.png\" border=\"0\"  alt=\"down\" title=\"Up from ".$lpos.". place\">";}
if ($pos < 201 OR $user==$userid) {
if ($user==$userid) {echo "<tr bgcolor=\"#FFDAB9\" width=\"100%\">"; $chol='#FFDAB9'; $jajn=4; $klava='#FFDAB9';}
else {$chol='#ECE5CE'; $klava='white'; echo "<tr onmouseover=\"style.backgroundColor='".$chol."';\" onmouseout=\"style.backgroundColor='".$klava."'\">";}
if ($suppo>0) {
echo "<td><img src=\"img/Flags/",$country,".png\" border=\"0\" alt=\"",$country,"\" title=\"",$country,"\">&nbsp;",$zlik,"&nbsp;",$pos,". <a href=\"club.php?clubid=",$user,"\" class=\"greenhilite\">",stripslashes($tname),"</a> <a href=\"supporter.php\"><img src=\"img/bsupn.png\" border=\"0\" alt=\"",strtolower($langmark1222),"\" title=\"",$langmark317,"\" style= \"border: 0px solid #fff; padding: 0px; margin: 0px; height: 11px; width: 11px;\"></a></b></td><td align=\"center\">",$rank6,"</td><td align=\"center\" bgcolor=\"",$chol,"\">",$rank7,"</td><td align=\"center\">",$rank5,"</td><td align=\"center\" bgcolor=\"",$chol,"\">",$rank19,"</td><td align=\"right\"><b>",$rank,"</b></td></tr>";
} else {
echo "<td><img src=\"img/Flags/",$country,".png\" border=\"0\" alt=\"",$country,"\" title=\"",$country,"\">&nbsp;",$zlik,"&nbsp;",$pos,". <a href=\"club.php?clubid=",$user,"\" class=\"greenhilite\">",stripslashes($tname),"</a></b></td><td align=\"center\">",$rank6,"</td><td align=\"center\" bgcolor=\"",$chol,"\">",$rank7,"</td><td align=\"center\">",$rank5,"</td><td align=\"center\" bgcolor=\"",$chol,"\">",$rank19,"</td><td align=\"right\"><b>",$rank,"</b></td></tr>";
}
}
$ore++;
}
echo "</table><hr/>";
if ($jajn<>4 AND $see<>'help' AND $which) {echo "<b>There are ",$pos," teams currently ranked.</b><br/>Your team is currently not ranked! <a href=\"intclubrank.php?see=help&#35;bot\">See how the ranking works</a>.";}
elseif ($jajn==4 AND $see<>'help') {echo "<b>There are ",$pos," teams currently ranked.</b><br/><a href=\"intclubrank.php?see=help&#35;bot\">See how the ranking works</a>.";}
elseif ($jajn==4 AND $see=='help') {echo "<b>There are ",$pos," teams currently ranked.</b><br/><br/><a name=\"bot\"></a><b>How the ranking works?</b><br/><i>Ranking is based on results of the last 10 seasons in Champions Series (CS) and Cup Winners Series (CWS) and last 5 seasons in Fair Play Cup (FPC) and Youth Club World Cup (YCWC). CS results bring the most points, CWS results slightly less and FPC/YCWC much less. More recent results count more than those from more distant future. Teams with zero or negative points are excluded from the ranking even if they have appereances in one of the cups. Ranks are updated every Thursday 23:00.</i>";}
else {echo "<b>There are ",$pos," teams currently ranked.</b><br/>Your team is currently not ranked!<br/><br/><a name=\"bot\"></a><b>How the ranking works?</b><br/><i>Ranks are based on results of the last 10 seasons in Champions Series (CS) and Cup Winners Series (CWS) and last 5 seasons in Fair Play Cup (FPC) and Youth Club World Cup (YCWC). CS results bring the most points, CWS results slightly less and FPC/YCWC much less. More recent results count more than those from more distant future. Teams with zero or negative points are excluded from the ranking even if they have appereances in one of the cups. Ranks are updated every Thursday 23:00.</i>";}
?>
</td>
</tr>
</table>
</div>
</div>
</body>
</html>