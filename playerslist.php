<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT club, lang, supporter, level, friendly FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)) {
$trueclub = mysql_result($compare,0,"club");
$lang = mysql_result($compare,0,"lang");
$is_supporter = mysql_result($compare,0,"supporter");
$moderating = mysql_result($compare,0,"level");
$friendly1 = mysql_result($compare,0,"friendly");
}
else {die(include 'basketsim.php');}

$clubclub=$_GET['clubid'];
if ($clubclub == 0) {$clubclub = $userid;}
if (!is_numeric($clubclub)) {$clubclub = $userid;}

$query = mysql_query("SELECT * FROM users WHERE userid ='$clubclub' LIMIT 1");
if (mysql_num_rows($query)) {
$username=mysql_result($query,0,"username");
$email=mysql_result($query,0,"email");
$realname = mysql_result($query,0,"realname");
$get_team = mysql_result($query,0,"club");
$signed=mysql_result($query,0,"signed");
$lastlog=mysql_result($query,0,"lastlog");
$lastip=mysql_result($query,0,"lastip");
$hide_email=mysql_result($query,0,"hide_email");
$friendly=mysql_result($query,0,"friendly");
$is_online=mysql_result($query,0,"is_online");
$lang1=mysql_result($query,0,"lang");
$last_active=mysql_result($query,0,"last_active");
$huhsupporter = mysql_result($query,0,"supporter");
$statuskluba = mysql_result($query,0,"bad_login");
$cform = mysql_result($query,0,"level");
$selektor1 = mysql_result($query,0,"natcoach");
$selektor2 = mysql_result($query,0,"nt_country");
$homepage = mysql_result($query,0,"homepage");
}
else {die (include 'index.php');}

$result = mysql_query("SELECT `name`, `city`, `country`, `shirt`, `logo`, `arenaid`, `arenaname`, `fans`, `cheer_name`, conwins FROM `teams`, `arena` WHERE teams.teamid=arena.teamid AND teams.teamid ='$get_team' LIMIT 1") or die(mysql_error());
$ary = mysql_fetch_array($result);
$name=$ary[name];
$city=$ary[city];
$country=$ary[country];
$shirt=$ary[shirt];
$arenicaa=$ary[arenaid];
if ($huhsupporter==0 AND $cform < 2) {$shirt='white';}
$logo=$ary[logo];
$arenam=$ary[arenaname];
$nofans=$ary[fans];
$fanclub=$ary[cheer_name];
$conwins=$ary[conwins];

$arenam = stripslashes($arenam);
$zaheader = stripslashes($name);

if (isset($_POST["acceptCY"])) {
$imat1 = mysql_query("SELECT * FROM matches WHERE `type` >17 and crowd1=0 AND (home_id =$get_team OR away_id =$get_team)") or die(mysql_error());
$imat2 = mysql_query("SELECT * FROM matches WHERE `type` >17 and crowd1=0 AND (home_id =$trueclub OR away_id =$trueclub)") or die(mysql_error());
if ((!mysql_num_rows($imat1) OR mysql_num_rows($imat1)==0) AND (!mysql_num_rows($imat2) OR mysql_num_rows($imat2)==0) AND date("H")<>22 AND date("H")<>23) {

if (date("d")==1) {$ctekme='2015-08-03 22:45:00';}
elseif (date("d")==2) {$ctekme='2015-08-03 22:45:00';}
elseif (date("d")==3) {$ctekme='2015-07-06 22:45:00';}
elseif (date("d")==4) {$ctekme='2015-07-06 22:45:00';}
elseif (date("d")==5) {$ctekme='2015-07-06 22:45:00';}
elseif (date("d")==6) {$ctekme='2015-07-06 22:45:00';}
elseif (date("d")==7) {$ctekme='2015-07-13 22:45:00';}
elseif (date("d")==8) {$ctekme='2015-07-13 22:45:00';}
elseif (date("d")==9) {$ctekme='2015-07-13 22:45:00';}
elseif (date("d")==10) {$ctekme='2015-07-13 22:45:00';}
elseif (date("d")==11) {$ctekme='2015-07-13 22:45:00';}
elseif (date("d")==12) {$ctekme='2015-07-13 22:45:00';}
elseif (date("d")==13) {$ctekme='2015-07-13 22:45:00';}
elseif (date("d")==14) {$ctekme='2015-07-20 22:45:00';}
elseif (date("d")==15) {$ctekme='2015-07-20 22:45:00';}
elseif (date("d")==16) {$ctekme='2015-07-20 22:45:00';}
elseif (date("d")==17) {$ctekme='2015-07-20 22:45:00';}
elseif (date("d")==18) {$ctekme='2015-07-20 22:45:00';}
elseif (date("d")==19) {$ctekme='2015-07-20 22:45:00';}
elseif (date("d")==20) {$ctekme='2015-07-20 22:45:00';}
elseif (date("d")==21) {$ctekme='2015-07-27 22:45:00';}
elseif (date("d")==22) {$ctekme='2015-07-27 22:45:00';}
elseif (date("d")==23) {$ctekme='2015-07-27 22:45:00';}
elseif (date("d")==24) {$ctekme='2015-07-27 22:45:00';}
elseif (date("d")==25) {$ctekme='2015-07-27 22:45:00';}
elseif (date("d")==26) {$ctekme='2015-07-27 22:45:00';}
elseif (date("d")==27) {$ctekme='2015-07-27 22:45:00';}
elseif (date("d")==28) {$ctekme='2015-08-03 22:45:00';}
elseif (date("d")==29) {$ctekme='2015-08-03 22:45:00';}
elseif (date("d")==30) {$ctekme='2015-08-03 22:45:00';}
elseif (date("d")==31) {$ctekme='2015-08-03 22:45:00';}

mysql_query("INSERT INTO matches VALUES ('', $get_team, '', $trueclub, '', $arenicaa, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$ctekme', 18, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$country', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $default_season, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)") or die(mysql_error());
mysql_query("DELETE FROM ytfren WHERE Hteam=$get_team OR Hteam=$trueclub") or die(mysql_error());
mysql_query("DELETE FROM ytfren WHERE Ateam=$get_team OR Ateam=$trueclub") or die(mysql_error());
$a1 = "DELETE FROM messages WHERE from_id=0 AND title='YT friendly challenge' AND message LIKE '%$userid%'"; mysql_query($a1) or die(mysql_error());
$a2 = "DELETE FROM messages WHERE from_id=0 AND title='YT friendly challenge' AND message LIKE '%$clubclub%'"; mysql_query($a2) or die(mysql_error());
header('Location:matches.php');
}
}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');

$result12 = mysql_query("SELECT leagues.leagueid AS leagueid, leagues.name AS name1, competition.position AS position FROM competition, leagues WHERE competition.leagueid = leagues.leagueid AND competition.season ='$default_season' AND competition.teamid ='$get_team' LIMIT 1") or die(mysql_error());
$whleague = mysql_result($result12,0,"leagueid");
$uvrscen = mysql_result($result12,0,"position");
$leaguenam = mysql_result($result12,0,"name1");

$result14 = mysql_query("SELECT * FROM statements WHERE user ='$clubclub' ORDER BY `time` DESC LIMIT 1") or die(mysql_error());
if (mysql_num_rows($result14)) {
$id=mysql_result($result14,0,"id");
$title=mysql_result($result14,0,"title");
$content=mysql_result($result14,0,"content");
$user=mysql_result($result14,0,"user");
$time=mysql_result($result14,0,"time");
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
$already = mysql_query("SELECT * FROM bookmarks WHERE b_type =2 AND team ='$trueclub' AND b_link ='$clubclub' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($already) > 0) {echo "<table cellpadding=\"9\" cellspacing=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">",$langmark473," ",$langmark094," <a href=\"bookmarks.php\">",$langmark095,"</a>.</td></tr></table>";
}
else
{
mysql_query("INSERT INTO bookmarks VALUES ('', $trueclub, '$name', $clubclub, 2, 1);") or die(mysql_error());
echo "<table cellpadding=\"9\" cellspacing=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">",$langmark474," ",$langmark094," <a href=\"bookmarks.php\">",$langmark095,"</a>.</td></tr></table>";
}
}
?>

<!-- OBMOCJE TABEL -->

<table border="0" cellpading="0" cellspacing="9" width="100%">
<tr>
<td class="border" width="60%" valign="top" bgcolor="#ffffff">

<?php
if ($statuskluba < 99 AND $moderating > 2 AND $clubclub <> $userid) {echo "<font color=\"darkred\"><b>[<a href=\"admin/gm.php?act=close&club=",$clubclub,"\">Close due to cheating on market</a>] <br/>[<a href=\"admin/gm.php?act=close1&club=",$clubclub,"\">Close due to multiple accounts</a>]</b></font><br>";}
if ($statuskluba > 9 AND $statuskluba < 99 AND $moderating>2) {echo "<font color=\"darkred\"><b>This club was temporary closed due to 10 or more bad login attempts. <a href=\"admin/gm.php?act=reopen&club=",$clubclub,"\">Re-open</a>.</b></font><br>";}
if ($statuskluba > 98 AND $statuskluba < 199 AND $moderating>2) {echo "<font color=\"darkred\"><b>This club was closed due to cheating on the market. <a href=\"admin/gm.php?act=open&club=",$clubclub,"\">Open this club now</a></b></font><br>";}
if ($statuskluba > 198 AND $moderating>2) {echo "<font color=\"darkred\"><b>This club was closed due to being one of the multiple accounts. <a href=\"admin/gm.php?act=open&club=",$clubclub,"\">Open this club now</a></b></font><br>";}
?>

<!-- majica in ime kluba -->

<table border="0" cellpadding="4" cellspacing="4" width="100%">
<tr><td valign="top">

<!-- majica in ime kluba -->

<table>
<tr><td width="45">
<img src="img/shirts/<?=$shirt?>.gif" alt="" border="0" height="52" width="42"></td>
<td><h3><?=stripslashes($name)?>
<?php if($is_supporter==1){echo "&nbsp;<a href=\"playerslist.php?clubid=",$clubclub,"&action=bookmark\"><img src=\"img/bookmark.jpg\" alt=\"",$langmark477,"\" title=\"",$langmark477,"\" border=\"0\"></a>";}?>
</h3></td>
<?php if ($conwins >1) {echo "<td align=\"right\" width=\"25%\"><i>",$langmark1525," ",$conwins," ",$langmark1526,"</i></td>";}?>
</tr></table>

<!-- konec majice in imena kluba -->


<!-- podatki o klubu, uporabniku + logo (tri tabele) -->

<table border="0" cellpadding="5" cellspacing="0" width="100%"><tr><td valign="top">
<!-- podatki o klubu -->

<table border="0" cellpadding="1" cellspacing="0">
<p></p>
<tr valign="top"><td width=52><?=$langmark475?> </td><td><b><?=$get_team?></b></td></tr>
<tr valign="top"><td><?=$langmark476?> </td><td><b><a href="cheerleaders.php?squad=<?=$get_team?>"><?=$arenam?></a></b></td></tr>
<tr valign="top"><td><?=$langmark1275?> </td><td><b><a href="region.php?region=<?=$city?>"><?=$city?></a></b></td></tr>
<tr valign="top"><td><?=$langmark478?> </td><td><a href="league.php?country=<?=$country?>"><b><?=$localname?></b></a></td></tr>
<tr valign="top"><td><?=$langmark479?> </td><td># <?=$uvrscen?> in <b><a href="leagues.php?leagueid=<?=$whleague?>"><?=$leaguenam?></a></b></td></tr>
<tr valign="top"><td><?=$langmark480?> </td><td><b><?=$nofans?></b></td></tr>
<?php if (strlen($fanclub)>0 && $huhsupporter==1) {?><tr valign="top"><td><?=$langmark1492?> </td><td><b><?=stripslashes($fanclub)?></b></td></tr><?php }?>
</table>

<!-- konec podatkov o klubu -->

<br/>

<!-- podatki o uporabniku -->

<?php
if ($lastlog == '0000-00-00 00:00:00') {$lastlogus = $langmark481;}
else
{
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
if ($moderating > 2 AND $ip_disp != '-') {$ip_disp = "<a href=\"playerslist.php?clubid=".$clubclub."&action=sameip\">".$lastip."</a>";}
//aktivnost
$splitdatetime = explode(" ", $last_active); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$expireminus = date("Y-m-d H:i:s", mktime($dbhour,$dbmin+30,$dbsec,$dbmonth,$dbday,$dbyear));
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
<tr valign="top"><td width="52"><font color="darkred">Realname: </font></td><td><b><font color="darkred"><?=stripslashes($realname)?></font></b></td></tr>
<?php }?>
<tr valign="top"><td width="52"><?=$langmark482?> </td><td><b><?php echo $username; if ($is_online==1){echo " <font color=\"green\"> <b> Online!</b></font>";}?></b></td></tr>
<tr valign="top"><td><?=$langmark483?> </td><td><b><?=$lastlogus?></b></td></tr>
<tr valign="top"><td><?=$langmark484?> </td><td><b><?=$ip_disp?></b></td></tr>
<tr valign="top"><td><?=$langmark485?> </td><td><b><?=$joined1?></b></td></tr>
<tr valign="top"><td><?=$langmark486?> </td><td><b><?php if ($hide_email==0 OR $moderating>2){echo $email;} else {echo $langmark487;} ?></b></td></tr>
<?php if ($selektor1==1){echo "<tr valign=\"top\"><td colspan=\"3\">Coach of <a href=\"nationalteams.php?country=",$selektor2,"\">",$selektor2,"</a>";}?>
<?php if ($selektor1==2){echo "<tr valign=\"top\"><td colspan=\"3\">Coach of <a href=\"u18teams.php?country=",$selektor2,"\">",$selektor2,"&nbsp;U19</a>";}?>
</td></tr>

<?php
if ($is_supporter==0){
?>
<tr valign="top"><td colspan="3">
<?php
$kunac = mt_rand(0,1);
SWITCH ($kunac) {
CASE 0:
?>
<script type="text/javascript"><!--
google_ad_client = "pub-9708116335383093";
google_ad_output = "textlink";
google_ad_format = "ref_text";
google_cpa_choice = "CAAQwOyI_AEaCL_IbiZuSueDKMSm7oMB";
google_ad_channel = "";
//--></script>
<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
<?php
break;
CASE 1:
?>
<script type="text/javascript"><!--
google_ad_client = "pub-9708116335383093";
google_ad_output = "textlink";
google_ad_format = "ref_text";
google_cpa_choice = "CAEQs_mAhQIQi9_f3wIQl9b27AIQ09b27AIQx8DbiAMQ-8HbiAMaCD5Wd1Q5whV1KI-A1YABKN-y77sBKLOd2MsBKLOd2MsBKLOd2MsBKLOd2MsBMAA";
google_ad_channel = "";
//-->
</script>
<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></td></tr>
<?php
break;
CASE 2:
?>
<a href="http://www.worldonlinegames.com/vote2/1461" target="_new">Vote for Basketsim!</a>
<?php
break;
}
}
?>
</table>

<!-- konec tabele za uporabnika -->

</td><td align="left" valign="top">

<!-- logo -->

<table border="0" cellpadding="0" cellspacing="0" align="left"><tr><td>
<?php if ($logo != ''){ ?>
<img src="<?=$logo?>" border="0" alt="" width="137">
<?php } ?>
</td></tr></table>

<!-- konec tabele za logo -->

</td>
</tr>
</table>

<!-- konec treh tabel, uporabniki, klub, logo -->

<?php
//gminfo
if ($action=='sameip' AND $moderating >2) {
?>
<table width="100%" border="1" cellspacing="2" cellpadding="2">
<tr bgcolor="#ffffff">
<td class="border">
<?php
$nedela = "SELECT userid FROM users WHERE lastip='$lastip' AND userid <>$clubclub";
$podvajanje=mysql_query($nedela) or die(mysql_error());
$vecjihje = mysql_num_rows($podvajanje);
if ($vecjihje > 0) {
echo "<b>Clubs currently using the same IP:<b><br/><br/>";
$f=0;
while ($f < $vecjihje) {
$enmulti = mysql_result($podvajanje,$f);
$result1 = mysql_query("SELECT teams.name AS name1 FROM teams, users WHERE users.club=teams.teamid AND users.userid='$enmulti'") or die(mysql_error());
$g=0;
while ($g < mysql_num_rows($result1)) {
$name1=mysql_result($result1,$g,"name1");
echo "<a href=\"playerslist.php?clubid=",$enmulti,"\">",stripslashes($name1),"</a><br/>";
$g++;
}
$f++;
}
} else {echo "<b>No other clubs are currently using the same IP.</b>";}
?>
</td>
</tr>
</table>
<?php
}
//to je bil konec gminfo
?>

<!-- pressi -->

<?php
if ($id > 0) {
$splitpres = explode(" ", $time); $tdate = $splitpres[0]; $ttime = $splitpres[1];
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

<!-- desni okvir, kako doseci cellspacing/padding?! -->

<td class="border" width="40%" valign="top" bgcolor="#ffffff">
<h2>Club options</h2><br />
<a href="club.php?clubid=<?=$clubclub?>"><?=$langmark934?></a><br/>
<a href="club.php?clubid=<?=$clubclub?>&action=showcoach"><?=$langmark085?></a><br/>
<a href="showmatches.php?clubid=<?=$clubclub?>"><?=$langmark043?></a><br/>
<a href="clubhistory.php?clubid=<?=$clubclub?>">Club history</a><br/>
<a href="transfhistory.php?clubid=<?=$clubclub?>"><?=$langmark466?></a><br/>
<?php if (($is_supporter==1 || $moderating >1) AND $userid<>$clubclub) {?><a href="club.php?clubid=<?=$clubclub?>&action=showpast">Past duels</a><br/><?php }?>

<?php
$sort = $_POST["sort"];
if (!$sort) {$sort='shirt';}

if ($sort=='shirt') {$result44 = mysql_query("SELECT *, IF (shirt IS NULL || shirt ='' || shirt=0, 1, 0) AS isnull FROM players WHERE club ='$get_team' AND coach=0 ORDER BY isnull ASC, shirt ASC, wage DESC");}
elseif ($sort=='age') {$result44 = mysql_query("SELECT * FROM players WHERE club ='$get_team' AND coach=0 ORDER BY age ASC");}
elseif ($sort=='height') {$result44 = mysql_query("SELECT * FROM players WHERE club ='$get_team' AND coach=0 ORDER BY height DESC");}
elseif ($sort=='weight') {$result44 = mysql_query("SELECT * FROM players WHERE club ='$get_team' AND coach=0 ORDER BY weight DESC");}
elseif ($sort=='fatigue') {$result44 = mysql_query("SELECT * FROM players WHERE club ='$get_team' AND coach=0 ORDER BY fatigue DESC");}
elseif ($sort=='wage') {$result44 = mysql_query("SELECT * FROM players WHERE club ='$get_team' AND coach=0 ORDER BY wage DESC");}
$numi=mysql_num_rows($result44);
?>
<br/><h2><?=$langmark935?> (<?=$numi?>)</h2>
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="margin: 0">
<select name="sort" class="inputreg">
<option value="shirt" <?php if ($sort=='shirt'){echo "selected";}?>><?=$langmark1263?></option>
<option value="age" <?php if ($sort=='age'){echo "selected";}?>><?=$langmark113?></option>
<option value="height" <?php if ($sort=='height'){echo "selected";}?>><?=$langmark116?></option>
<option value="weight" <?php if ($sort=='weight'){echo "selected";}?>><?=$langmark117?></option>
<option value="wage" <?php if ($sort=='wage'){echo "selected";}?>><?=$langmark118?></option>
<option value="fatigue" <?php if ($sort=='fatigue'){echo "selected";}?>><?=$langmark398?></option>
</select>
<input type="submit" value="&nbsp;&raquo;" name="submit" class="buttonreg">
</form>
<br/>

<table cellspacing="0" cellpadding="0" border="0" width="100%">
<?php
while ($m = mysql_fetch_array($result44)) {
$id=$m[id];
$name=$m[name];
$surname=$m[surname];
$age=$m[age];
$pcountry=$m[country];
$height=$m[height];
$weight=$m[weight];
$handling=$m[handling];
$speed=$m[speed];
$passing=$m[passing];
$vision=$m[vision];
$rebounds=$m[rebounds];
$position=$m[position];
$freethrow=$m[freethrow];
$shooting=$m[shooting];
$defense=$m[defense];
$workrate=$m[workrate];
$experience=$m[experience];
$isonsale=$m[isonsale];
$wages=$m[wage];
$injury_time=$m[injury];
$ntplayer=$m[ntplayer];
$shirtnum=$m[shirt];

$skuphan = $skuphan+($handling-1)/8;
$skupspe = $skupspe+($speed-1)/8;
$skuppas = $skuppas+($passing-1)/8;
$skupvis = $skupvis+($vision-1)/8;
$skupreb = $skupreb+($rebounds-1)/8;
$skuppos = $skuppos+($position-1)/8;
$skupfre = $skupfre+($freethrow-1)/8;
$skupsho = $skupsho+($shooting-1)/8;
$skupdef = $skupdef+($defense-1)/8;
$skupexp = $skupexp+($experience-1)/8;

$value5 = ($height * 2) + $handling + ($speed * 4) + ($passing * 2) + ($vision * 2) + ($rebounds * 3) + ($position * 4) + ($freethrow * 3) + ($shooting * 4) + ($experience * 2) + ($defense * 3);
$value5 = (($value5 * $value5 * $value5) / 225000) - 7500;
if ($value5 < 200) {$value5=200;}
$value=((($value5/9)*($value5/9))/15)*(($value5/240000+(1/(exp(pow((($age-16)/10),4.1)))))*(((($workrate/8)+1)/19)+1))*((sqrt($value5/180000))/((((tanh((($age/2)-10))/2)+0.5)*0.71)+0.29));
if ($value < 1000) {$value=1000;}
$skupajv = $skupajv+$value;

$skupwag = $skupwag+$wages;
$skupage = $skupage+$age;

if ($shirtnum==0) {$shirtnum='';}

//poskodbe
switch (TRUE) {
CASE ($injury_time ==0): $prikaz_poskodbe = ''; break;
CASE ($injury_time >0 AND $injury_time < 1): $prikaz_poskodbe = '&nbsp;<font color="green"><b>+1</b></font>'; break;
CASE ($injury_time >=1 AND $injury_time < 2): $prikaz_poskodbe = '&nbsp;<font color="red"><b>+1</b></font>'; break;
CASE ($injury_time >=2 AND $injury_time < 3): $prikaz_poskodbe = '&nbsp;<font color="red"><b>+2</b></font>'; break;
CASE ($injury_time >=3 AND $injury_time < 4): $prikaz_poskodbe = '&nbsp;<font color="red"><b>+3</b></font>'; break;
CASE ($injury_time >=4 AND $injury_time < 5): $prikaz_poskodbe = '&nbsp;<font color="red"><b>+4</b></font>'; break;
CASE ($injury_time >=5 AND $injury_time < 6): $prikaz_poskodbe = '&nbsp;<font color="red"><b>+5</b></font>'; break;
CASE ($injury_time >=6 AND $injury_time < 7): $prikaz_poskodbe = '&nbsp;<font color="red"><b>+6</b></font>'; break;
CASE ($injury_time >=7 AND $injury_time < 8): $prikaz_poskodbe = '&nbsp;<font color="red"><b>+7</b></font>'; break;
CASE ($injury_time >=8 AND $injury_time < 9): $prikaz_poskodbe = '&nbsp;<font color="red"><b>+8</b></font>'; break;
CASE ($injury_time >=9): $prikaz_poskodbe = '&nbsp;<font color="red"><b>+9</b></font>'; break;
}
echo "<tr><td align=\"center\">",$shirtnum,"</td><td><a href=\"player.php?playerid=",$id,"\">",$name," ",$surname,"</a>";
if ($ntplayer>0) {echo "&nbsp;<img style=\"vertical-align:middle\" src=\"img/Flags/",$pcountry,".png\" border=\"0\" width=\"16\" height=\"11\" alt=\"",$langmark378," ",$pcountry,"\" title=\"",$langmark378," ",$pcountry,"\">";}
echo $prikaz_poskodbe,"&nbsp;";
if ($isonsale==1) {echo "<img src=\"img/for_sale.jpg\" alt=\"",$langmark936,"\" title=\"",$langmark936,"\">";}
echo "</td></tr>";
}
?></table>
<?php
if ($numi>0) {
$skupexpA = round($skupexp/$numi);
if ($skupexpA==0) {$skupexp_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=0\">".$langmark111."</a>"; }
elseif ($skupexpA==1) {$skupexp_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=1\">".$langmark096."</a>"; }
elseif ($skupexpA==2) {$skupexp_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=2\">".$langmark097."</a>"; }
elseif ($skupexpA==3) {$skupexp_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=3\">".$langmark098."</a>"; }
elseif ($skupexpA==4) {$skupexp_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=4\">".$langmark099."</a>"; }
elseif ($skupexpA==5) {$skupexp_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=5\">".$langmark100."</a>"; }
elseif ($skupexpA==6) {$skupexp_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=6\">".$langmark101."</a>"; }
elseif ($skupexpA==7) {$skupexp_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=7\">".$langmark102."</a>"; }
elseif ($skupexpA==8) {$skupexp_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=8\">".$langmark103."</a>"; }
elseif ($skupexpA==9) {$skupexp_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=9\">".$langmark104."</a>"; }
elseif ($skupexpA==10) {$skupexp_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=10\">".$langmark105."</a>"; }
elseif ($skupexpA==11) {$skupexp_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=11\">".$langmark106."</a>"; }
elseif ($skupexpA==12) {$skupexp_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=12\">".$langmark107."</a>"; }
elseif ($skupexpA==13) {$skupexp_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=13\">".$langmark108."</a>"; }
elseif ($skupexpA==14) {$skupexp_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=14\">".$langmark1584."</a>"; }
elseif ($skupexpA==15) {$skupexp_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=15\">".$langmark1585."</a>"; }
elseif ($skupexpA==16) {$skupexp_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=16\">".$langmark1586."</a>"; }
elseif ($skupexpA==17) {$skupexp_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=17\">".$langmark1587."</a>"; }
elseif ($skupexpA==18) {$skupexp_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=18\">".$langmark1588."</a>"; }
elseif ($skupexpA==19) {$skupexp_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=19\">".$langmark109."</a>"; }
else {$skupexp_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=20\">".$langmark110."</a>";}
?>
<table cellspacing="0" cellpadding="0" border="0" width="99%" bgcolor="#F5F5F5">
<tr><td colspan="2" style="border-top: solid 1px LightSteelBlue;"></td></tr>
<tr><td><?=$langmark1267?>:</td><td align="right"><?=number_format($skupajv, 0, ',', '.')?> &euro;</td></tr>
<tr><td>Average wage:</td><td align="right"><?=number_format($skupwag/$numi, 0, ',', '.')?> &euro;</td></tr>
<tr><td>Average age:</td><td align="right"><?=number_format($skupage/$numi,1)?></td></tr>
<tr><td>Experience:</td><td align="right"><?=$skupexp_dspl?></td></tr>
<tr><td colspan="2" style="border-bottom: solid 1px LightSteelBlue;"></td></tr>
</table>
<?php
}
//supp stats
if ($clubclub == $userid && $act == 'supps' && $is_supporter==1) {
?>
<a href="playerslist.php">Back</a>
<table cellspacing="0" cellpadding="0" border="0" width="99%">
<tr><td>Average handling:</td><td align="right"><?=number_format($skuphan/$numi, 1, '.', '.')?></td></tr>
<tr><td>Average quickness:</td><td align="right"><?=number_format($skupspe/$numi, 1, '.', '.')?></td></tr>
<tr><td>Average passing:</td><td align="right"><?=number_format($skuppas/$numi, 1, '.', '.')?></td></tr>
<tr><td>Average dribbling:</td><td align="right"><?=number_format($skupvis/$numi, 1, '.', '.')?></td></tr>
<tr><td>Average rebounds:</td><td align="right"><?=number_format($skupreb/$numi, 1, '.', '.')?></td></tr>
<tr><td>Average positioning:</td><td align="right"><?=number_format($skuppos/$numi, 1, '.', '.')?></td></tr>
<tr><td>Average freethrows:</td><td align="right"><?=number_format($skupfre/$numi, 1, '.', '.')?></td></tr>
<tr><td>Average shooting:</td><td align="right"><?=number_format($skupsho/$numi, 1, '.', '.')?></td></tr>
<tr><td>Average defense:</td><td align="right"><?=number_format($skupdef/$numi, 1, '.', '.')?></td></tr>
<tr><td>Average experience:</td><td align="right"><?=number_format($skupexp/$numi, 1, '.', '.')?></td></tr>
</table>
<?php
}
elseif ($clubclub == $userid && $act <> 'supps' && $is_supporter==1) {echo "<a href=\"playerslist.php?act=supps\">Supporter stats</a><br/>";}
if ($act<>'supps') {
?>
<table cellspacing="0" cellpadding="0" border="0" width="99%">
<?php

/*
klikabilne zastavce
bug za pošiljanje izzivov!
+ potem še 16.0
+ link na nc in title over
*/

$resultAA = mysql_query("SELECT *, IF (shirt IS NULL || shirt ='' || shirt=0, 1, 0) AS isnull FROM players WHERE club ='$get_team' AND coach=9 ORDER BY isnull ASC, shirt ASC, wage DESC");
$kuja = mysql_num_rows($resultAA);
//YT friendly
if (isset($_POST['submitCY']) AND $kuja > 7 AND date("H")<>22 AND date("H")<>23)
{
mysql_query("INSERT INTO ytfren VALUES ($trueclub, $get_team);");
$klado = "INSERT INTO messages VALUES ('', $clubclub, 0, 0, NOW(), 'YT friendly challenge', '<b>Your youth team have received a challange to play a friendly game.</b><br/>To accept a challenge, <a href=playerslist.php?clubid=$userid><b>visit this link</b></a>.<br/><br/><i>This message is deleted automatically as soon as you read it, so make sure to visit the link above now!</i>');";
mysql_query($klado) or die(mysql_error()); echo "<br/><font color=\"green\"><b>Challenge sent!</b></font>";
}
elseif($kuja > 7 AND date("H")<>22 AND date("H")<>23)
          {

$imat1 = mysql_query("SELECT * FROM matches WHERE `type` >17 and crowd1=0 AND (home_id =$get_team OR away_id =$get_team)") or die(mysql_error());
$imat2 = mysql_query("SELECT * FROM matches WHERE `type` >17 and crowd1=0 AND (home_id =$trueclub OR away_id =$trueclub)") or die(mysql_error());
if ((!mysql_num_rows($imat1) OR mysql_num_rows($imat1)==0) AND (!mysql_num_rows($imat2) OR mysql_num_rows($imat2)==0) AND $clubclub<>$userid)
    {


?>
<br/><form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="margin: 0">
<input type="submit" value="Challenge youth team" name="submitCY" class="buttonreg"></form>
<?php
$jamad = mysql_query("SELECT * FROM ytfren WHERE Hteam=$get_team AND Ateam=$trueclub");
if (mysql_num_rows($jamad))
 {
?><br/><form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="margin: 0">
<input type="submit" value="Accept challenge" name="acceptCY" class="greenreg"></form>
<?php
 }


    }

         }
if ($kuja>0) {echo "<br/><b>Youth team:</b><br/>";}
while ($m = mysql_fetch_array($resultAA)) {
$id=$m[id];
$name=$m[name];
$surname=$m[surname];
$avage=$m[age]; $a=$a+1; $skuag=$skuag+$avage;
$haveg=$m[height]; $da=$da+1; $skuha=$skuha+$haveg;
$u15co=$m[country];
$handling=$m[handling];
$speed=$m[speed];
$passing=$m[passing];
$vision=$m[vision];
$rebounds=$m[rebounds];
$position=$m[position];
$freethrow=$m[freethrow];
$shooting=$m[shooting];
$defense=$m[defense];
$workrate=$m[workrate];
$hawr=$m[quality];
$injury_time=$m[injury];
$yshirtn=$m[shirt];
$signuYT = 25000 + (($handling + $speed + $passing + $vision + $rebounds + $position + $freethrow + $shooting + $defense + $workrate) * ($handling + $speed + $passing + $vision + $rebounds + $position + $freethrow + $shooting + $defense + $workrate) * 10);
if ($hawr==0) {$signuYT = round((1/60) * $signuYT);} else {$signuYT = round(($hawr/60) * $signuYT);}
$totval=$totval+$signuYT;
if ($yshirtn==0) {$yshirtn='';}
//poskodbe
switch (TRUE) {
CASE ($injury_time==0):
$prikaz_poskodbe = '&nbsp;';
break;
CASE ($injury_time >0 AND $injury_time < 1): $prikaz_poskodbe = '&nbsp;<font color=green><b>+1</b></font>'; break;
CASE ($injury_time >=1 AND $injury_time < 2): $prikaz_poskodbe = '&nbsp;<font color=red><b>+1</b></font>'; break;
CASE ($injury_time >=2 AND $injury_time < 3): $prikaz_poskodbe = '&nbsp;<font color=red><b>+2</b></font>'; break;
CASE ($injury_time >=3 AND $injury_time < 4): $prikaz_poskodbe = '&nbsp;<font color=red><b>+3</b></font>'; break;
CASE ($injury_time >=4 AND $injury_time < 5): $prikaz_poskodbe = '&nbsp;<font color=red><b>+4</b></font>'; break;
CASE ($injury_time >=5 AND $injury_time < 6): $prikaz_poskodbe = '&nbsp;<font color=red><b>+5</b></font>'; break;
CASE ($injury_time >=6 AND $injury_time < 7): $prikaz_poskodbe = '&nbsp;<font color=red><b>+6</b></font>'; break;
CASE ($injury_time >=7 AND $injury_time < 8): $prikaz_poskodbe = '&nbsp;<font color=red><b>+7</b></font>'; break;
CASE ($injury_time >=8 AND $injury_time < 9): $prikaz_poskodbe = '&nbsp;<font color=red><b>+8</b></font>'; break;
CASE ($injury_time >=9): $prikaz_poskodbe = '&nbsp;<font color=red><b>+9</b></font>';
break;
}
echo "<tr><td align=\"center\">",$yshirtn,"</td><td><a href=\"player.php?playerid=",$id,"\">",$name," ",$surname,"</a>";
$dodnt15 = @mysql_query("SELECT id FROM u15players WHERE id=$id LIMIT 1");
if (@mysql_num_rows($dodnt15)) {echo "&nbsp;<img src=\"img/Flags/",$u15co,".png\" border=\"0\" width=\"16\" height=\"11\" alt=\"",$langmark378," ",$u15co,"\" title=\"",$langmark378," ",$u15co,"\">";}
echo "<b>",$prikaz_poskodbe,"</b></td></tr>";
}
if ($totval >0) {
?>
<table cellspacing="0" cellpadding="0" border="0" width="99%" bgcolor="#F5F5F5">
<tr><td colspan="2" style="border-top: solid 1px LightSteelBlue;"></td></tr>
<tr><td><?=$langmark1267?>:</td><td align="right"><?=number_format($totval, 0, ',', '.')?> &euro;</td></tr>
<tr><td>Average age:</td><td align="right"><?=round($skuag/$a,1);?></td></tr>
<tr><td>Average height:</td><td align="right"><?=round($skuha/$da,1);?></td></tr>
<tr><td colspan="2" style="border-bottom: solid 1px LightSteelBlue;"></td></tr>
</table>
<?php
}
}
?>
</table>
</td>
</tr>
</table>
</div>
</div>
</body>
</html>