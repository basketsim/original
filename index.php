<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT lang, s_time FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)) {
$lang = mysql_result ($compare,0,"lang");
$s_time = mysql_result ($compare,0,"s_time");
}
else {die(include 'basketsim.php');}

$plitdatetime = explode(" ", $s_time); $cbdate = $plitdatetime[0]; $cbtime = $plitdatetime[1];
$plitdate = explode("-", $cbdate); $cbyear = $plitdate[0]; $cbmonth = $plitdate[1]; $cbday = $plitdate[2];
$plittime = explode(":", $cbtime); $cbhour = $plittime[0]; $cbmin = $plittime[1]; $cbsec = $plittime[2];
$hudodelec = date("Y-m-d H:i", mktime($cbhour,$cbmin,$cbsec,$cbmonth,$cbday,$cbyear));

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>
<div id="main">
<?php
/*
if ($kabel==4) {
echo "<table border=\"1\" width=\"100%\" cellspacing=\"5\" cellpadding=\"5\"><tr>";
$timenow = date("Y-m-d H:i:s");
$tekmice = mysql_query("SELECT matchid, home_name, away_name, max( home_sc ) as hsco , max( away_sc ) as asco FROM nt_matches, nt_matchevents WHERE match_id = matchid AND `time` = '$casek' AND TYPE <9 AND TYPE <>2 AND event_time < '$timenow' GROUP BY match_id") or die(mysql_error());
$tekemje = mysql_num_rows($tekmice);
$u=0;
while ($u < $tekemje) {
$matchid=mysql_result($tekmice,$u,"matchid");
$home_name=mysql_result($tekmice,$u,"home_name");
$away_name=mysql_result($tekmice,$u,"away_name");
$hscore=mysql_result($tekmice,$u,"hsco");
$ascore=mysql_result($tekmice,$u,"asco");
if ($u % 2) {$coloric = '#F5F5F5';} else {$coloric = '#FFFAFA';}
echo "<td bgcolor=\"",$coloric,"\"><a href=\"nt_prikaz.php?matchid=",$matchid,"\" class=\"greenhilite\"><img src=\"img/Flags/",$home_name,".png\" border=\"0\" alt=\"",$home_name,"\" title=\"",$home_name,"\"> <b>$hscore</b><br/><img src=\"img/Flags/",$away_name,".png\" border=\"0\" alt=\"",$away_name,"\" title=\"",$away_name,"\"> <b>$ascore</b></a></td>";
$u++;
}
echo "</tr></table>";
}
*/
$forum_ac = $_GET['forum'];
if ($forum_ac == 'no'){?>
<h2><?=$langmark226?></h2>
<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="100%">
<font color="darkred"><b><?= "Your team has not been approved yet or ", $langmark227," ",$hudodelec?> (CET).</b></font>
</td></tr></table>
<?php }?>
<h2>
<table cellpadding="0" cellspacing="0" width="100%" border="0"><tr><td><?=strtoupper($langmark524)?></td><td align="right">
</td></tr></table></h2>
<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="100%">
<?php
$n=$_GET['n'];
if ($n==old){$limito=125;} else {$limito=4;}
$query = "SELECT time, subject, content FROM news ORDER BY newsid DESC LIMIT $limito";
$query1 = mysql_query($query);
while ($i = mysql_fetch_array($query1)) {
$time=$i["time"];
$subject=$i["subject"];
$content=$i["content"];
if ($time=='2012-03-23 03:15:30') {echo "<h2>",$subject," (posted by theobasketsim ",$time,")</h2>";}
elseif ($time=='2011-09-30 08:45:34') {echo "<h2>",$subject," (posted by yoshi ",$time,")</h2>";}
elseif ($time=='2012-06-29 18:55:35') {echo "<h2>",$subject," (posted by yoshi ",$time,")</h2>";}
elseif ($time=='2013-09-06 01:15:16') {echo "<h2>",$subject," (posted by theobasketsim ",$time,")</h2>";}
else {echo "<h2>",$subject," (",$langmark229," ",$time,")</h2>";}
if ($time=='2012-05-11 15:22:13' OR $time=='2012-05-26 12:51:07') {$content = str_replace("gligligli", "公元前操你", $content);}
?>
<table border="0" width="99%"><tr><td class="border">
<?=$content?>
</td></tr></table><br/>
<?php
}
if ($n==old) {echo "<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\"><td align=\"right\"><a href=\"index.php\">",$langmark230,"</td></table>";
} else {echo "<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\"><td align=\"right\"><a href=\"index.php?n=old\">",$langmark231,"</td></table>";}
?>
</td>
</tr>
</table>
</div>
</div>
</body>
</html>