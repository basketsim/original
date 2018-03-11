<?php
$error=$_GET['error'];
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT username, email, realname, club, supporter, signed, lastlog, lastip, lang, level FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)) {
$username=mysql_result($compare,0,"username");
$email=mysql_result($compare,0,"email");
$realname = mysql_result($compare,0,"realname");
$trueclub = mysql_result($compare,0,"club");
$is_supporter = mysql_result($compare,0,"supporter");
$signed=mysql_result($compare,0,"signed");
$lastlog=mysql_result($compare,0,"lastlog");
$lastip=mysql_result($compare,0,"lastip");
$lang = mysql_result($compare,0,"lang");
$gmlev = mysql_result($compare,0,"level");
}
else {die(include 'basketsim.php');}

//EDIT
if (isset($_POST['editpres'])) {
$stev_pr = $_POST["stev_pr"];
$heading1 = $_POST["heading1"];
$heading1 = strip_tags($heading1);
$heading1 = trim($heading1);
if (!$heading1) {
function truncateString($str, $max, $rep = '...') {
  if(strlen($str) > $max) {
    $leave = $max - strlen($rep);
    return substr_replace($str, $rep, $leave);
  } else {
    return $str;
  }
}
$heading1 = truncateString($newcontent1, 24);
}
$heading1=mysql_real_escape_string($heading1);
$newcontent1 = $_POST["newcontent1"];
$newcontent1 = strip_tags($newcontent1);
if (strlen(trim($newcontent1)) < 9) {header( "Location: statement.php?error=ncon" );}
else {
$newcontent1 = nl2br($newcontent1);
$newcontent1 = mysql_real_escape_string($newcontent1);
mysql_query("UPDATE statements SET title ='$heading1', content ='$newcontent1' WHERE id ='$stev_pr' LIMIT 1") or die(mysql_error()); header ( 'Location: statement.php');
}
}

//DELETE
if (isset($_POST['delpres'])) {
$stev_pr = $_POST["stev_pr"];
mysql_query("DELETE FROM statements WHERE id ='$stev_pr' LIMIT 1") or die(mysql_error());
header ( 'Location: statement.php');
}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');

$result = mysql_query("SELECT `name`, `city`, `country`, `shirt`, `logo`, `arenaname`, `fans`, `cheer_name` FROM `teams`, `arena` WHERE teams.teamid=arena.teamid AND teams.teamid ='$trueclub' LIMIT 1") or die(mysql_error());
$name=mysql_result($result,0,"name");
$city=mysql_result($result,0,"city");
$country=mysql_result($result,0,"country");
$shirt=mysql_result($result,0,"shirt");
$logo=mysql_result($result,0,"logo");
$arenam=mysql_result($result,0,"arenaname");
$arenam = stripslashes($arenam);
$nofans=mysql_result($result,0,"fans");
$fanclub=mysql_result($result,0,"cheer_name");

if ($is_supporter==0 AND $gmlev < 2) {$shirt='white';}

$result12 = mysql_query("SELECT leagues.leagueid AS leagueid, leagues.name AS name1, competition.position AS position FROM competition, leagues WHERE competition.leagueid = leagues.leagueid AND competition.season ='$default_season' && competition.teamid ='$trueclub' LIMIT 1") or die(mysql_error());
$whleague = mysql_result($result12,0,"leagueid");
$uvrscen = mysql_result($result12,0,"position");
$leaguenam = mysql_result($result12,0,"name1");

$result14 = mysql_query("SELECT * FROM statements WHERE user ='$userid' ORDER BY `time` DESC LIMIT 1") or die(mysql_error());
if (mysql_num_rows($result14))
{
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

<!-- OBMOCJE TABEL -->

<table border="0" cellpading="0" cellspacing="9" width="100%">
<tr>
<td class="border" width="60%" valign="top" bgcolor="#ffffff">

<!-- majica in ime kluba -->

<table border="0" cellpadding="4" cellspacing="4" width="100%">
<tr><td valign="top">

<!-- majica in ime kluba -->

<table>
<tr><td width="45">
<img src="img/shirts/<?=$shirt?>.gif" alt="" border="0" height="52" width="42"></td>
<td><h3><?=stripslashes($name)?></h3></td></tr>
</table>

<!-- konec majice in imena kluba -->

<!-- podatki o klubu, uporabniku + logo (tri tabele) -->
						
<table border="0" cellpadding="5" cellspacing="0" width="100%"><tr><td valign="top">			
<!-- podatki o klubu -->

<table border="0" cellpadding="1" cellspacing="0">
<p></p>
<tr valign="top"><td width=52><?=$langmark475?> </td><td><b><?=$trueclub?></b></td></tr>
<tr valign="top"><td><?=$langmark476?> </td><td><b><a href="cheerleaders.php?squad=<?=$trueclub?>"><?=$arenam?></a></b></td></tr>
<tr valign="top"><td><?=$langmark1275?> </td><td><b><a href="region.php?region=<?=$city?>"><?=$city?></a></b></td></tr>
<tr valign="top"><td><?=$langmark478?> </td><td><a href="league.php?country=<?=$country?>"><b><?=$localname?></b></a></td></tr>
<tr valign="top"><td><?=$langmark479?> </td><td># <?=$uvrscen?> in <b><a href="leagues.php?leagueid=<?=$whleague?>"><?=$leaguenam?></a></b></td></tr>	
<tr valign="top"><td><?=$langmark480?> </td><td><b><?=$nofans?></b></td></tr>
<?php if (strlen($fanclub)>0 && $is_supporter==1) {?><tr valign="top"><td><?=$langmark1492?> </td><td><b><?=stripslashes($fanclub)?></b></td></tr><?php }?>
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
//joined
$splitdt1 = explode(" ", $signed); $bdate1 = $splitdt1[0]; $btime1 = $splitdt1[1];
$splitd1 = explode("-", $bdate1); $byear1 = $splitd1[0]; $bmonth1 = $splitd1[1]; $bday1 = $splitd1[2];
$splitt1 = explode(":", $btime1); $bhour1 = $splitt1[0]; $bmin1 = $splitt1[1]; $bsec1 = $splitt1[2];
$joined1 = date("d.m.y H:i", mktime($bhour1,$bmin1,$bsec1,$bmonth1,$bday1,$byear1));
//email
if (strlen($email) > 23 && $is_supporter==1 && strlen($logo) > 0) {$splitmail = explode("@", $email); $mail11 = $splitmail[0]; $mail22 = $splitmail[1]; $email=$mail11."@<br/>".$mail22;}
?>

<table border="0" cellpadding="0" cellspacing="2">
<tr valign="top"><td width="52"><?=$langmark482?> </td><td><b><?php echo $username," <font color=\"green\"> <b> ",$langmark042,"!</b></font>";?></b></td></tr>
<tr valign="top"><td><?=$langmark483?> </td><td><b><?=$lastlogus?></b></td></tr>
<tr valign="top"><td><?=$langmark484?> </td><td><b><?=$lastip?></b></td></tr>
<tr valign="top"><td><?=$langmark485?> </td><td><b><?=$joined1?></b></td></tr>
<tr valign="top"><td><?=$langmark486?> </td><td><b><?=$email?></b></td></tr>
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

<!-- pressi -->

<?php
if ($id != 0) {
$splitpres = explode(" ", $time); $tdate = $splitpres[0]; $ttime = $splitpres[1];
$splitena = explode("-", $tdate); $tyear = $splitena[0]; $tmonth = $splitena[1]; $tday = $splitena[2];
$splitdve = explode(":", $ttime); $thour = $splitdve[0]; $tmin = $splitdve[1]; $tsec = $splitdve[2];
$presadat = date("d.m.Y H:i", mktime($thour,$tmin,$tsec,$tmonth,$tday,$tyear));
?>
<br/><b><?=stripslashes($title)?></b><br/>
<br/><?=stripslashes($content)?><br/>
<br/><i><?=$langmark488," ",$presadat?></i>
<?php } else {echo "<br/><i>",$langmark489,"</i>";}?>

<!-- konec pressov -->

</td></tr>
</table>

<!-- konec celotnega levega okvirja na strani kluba -->

</td>

<!-- desni okvir, kako doseci cellspacing/padding?! -->

<td class="border" width="40%" valign="top" bgcolor="#ffffff">

<h2><?=$langmark531?></h2><br/>
<a href="newlogo.php"><?=$langmark522?></a><br/>
<?php if ($is_supporter==1) {echo "<a href=\"newshirt.php\">",$langmark523,"</a><br/>";}?>

<br/><h2><?=$langmark521?></h2><br/>

<i>Statements must never be used for commenting on the decisions of GMs or MODs. Use official mail for that purpose.</i><br/><br/>

<?php
$heading = $_POST["heading"];
$heading=strip_tags($heading);
$heading=trim($heading);
$newcontent = $_POST["newcontent"];
if (!isset($_POST['submit'])) {
?>
<form method="post" action="<?=$PHP_SELF?>" style="margin: 0">
<?=$langmark341?>: <input type="text" size="22" maxlength="40" name="heading" class="inputreg"><br/>
<textarea style="width: 186px; padding: 1px; margin: 2px;" name="newcontent" rows="7" wrap="soft" class="inputreg"></textarea><br/>
<input type="submit" value="<?=$langmark534?>" name="submit" class="buttonreg">
</form>
<?php
} else {

if (!$heading) {
function truncateString($str, $max, $rep = '...') {
  if(strlen($str) > $max) {
    $leave = $max - strlen($rep);
    return substr_replace($str, $rep, $leave);
  } else {
    return $str;
  }
}
$heading = truncateString($newcontent, 24);
}
$heading=mysql_real_escape_string($heading);
$newcontent = strip_tags($newcontent);
if (strlen(trim($newcontent)) < 10) {die("<b><font color=\"darkred\">Statement too short</font></b><br/><a href=\"javascript: history.go(-1)\">Go back</a>");}
$newcontent = nl2br($newcontent);
$newcontent = mysql_real_escape_string($newcontent);

$result77 = mysql_query("INSERT INTO statements VALUES ('', '$heading', '$newcontent', $userid, $whleague, '$country', NOW())");
if($result77){echo "<p>",$langmark743,"</p><br/><a href=\"club.php\">",$langmark441,"</a>";}
}

if ($error=='ncon') {echo "<br/><b><font color=\"darkred\">Statement too short</font></b><br/><a href=\"javascript: history.go(-1)\">Go back</a>";} else {
?>

<br/><h2><?=$langmark744?></h2><br/>

<?php
$vsipresi = mysql_query("SELECT id, title FROM statements WHERE user ='$userid' ORDER BY id DESC");
if (mysql_num_rows($vsipresi) > 0) {
?>
<form method="post" action="<?=$PHP_SELF?>" style="margin: 0">
<select name="nekid" class="inputreg">
<?php
$vsi_pressi = mysql_num_rows($vsipresi);
$vsi=0;
while ($vsi < $vsi_pressi) {
$id_presa = mysql_result($vsipresi,$vsi,"id");
$naslov = mysql_result($vsipresi,$vsi,"title");
?>
<option value="<?=$id_presa?>"><?=stripslashes($naslov)?></option>
<?php
$vsi++;
}
?>
</select>
<input type="submit" value="<?=$langmark745?>" name="editnow" class="buttonreg">
</form>
<?php
} else {echo $langmark746;}

//edit
if (isset($_POST['editnow'])) {
$nekid = $_POST["nekid"];
$enpres = mysql_query("SELECT title, content FROM statements WHERE id=$nekid LIMIT 1");
$naslov1 = mysql_result($enpres,0,"title");
$vsebina1 = mysql_result($enpres,0,"content");
$vsebina1 = stripslashes($vsebina1);
?>
<br/><form method="post" action="<?=$PHP_SELF?>" style="margin: 0">
<?=$langmark341?>: <input type="text" size="22" maxlength="40" name="heading1" value="<?=stripslashes($naslov1)?>" class="inputreg"><br/>
<textarea style="width: 186px; padding: 1px; margin: 2px;" name="newcontent1" rows="7" wrap="soft" class="inputreg"><?=strip_tags($vsebina1)?></textarea><br/>
<input type="hidden" name="stev_pr" value="<?=$nekid?>">
<input type="submit" value="<?=$langmark747?>" name="editpres" class="buttonreg">
<input type="submit" value="<?=$langmark748?>" name="delpres" class="buttonreg">
</form>
<?php
}
}
?>
</td>
</tr>
</table>
</div>
</div>
</body>
</html>