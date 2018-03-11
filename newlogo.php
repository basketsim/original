<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT username, email, realname, club, supporter, signed, lastlog, lastip, lang, level FROM users WHERE password ='$koda' AND userid ='$userid'") or die(mysql_error());
if (mysql_num_rows($compare)) {
$username=mysql_result($compare,0,"username");
$email=mysql_result($compare,0,"email");
$realname = mysql_result($compare,0,"realname");
$trueclub = mysql_result($compare,0,"club");
$is_supporter = mysql_result ($compare,0,"supporter");
$signed=mysql_result($compare,0,"signed");
$lastlog=mysql_result($compare,0,"lastlog");
$lastip=mysql_result($compare,0,"lastip");
$lang = mysql_result($compare,0,"lang");
$gmlev = mysql_result($compare,0,"level");
}
else {die(include 'basketsim.php');}

//new logo
if (isset($_POST['submit']) AND $is_supporter==1) {
$newtlogo = $_POST["newtlogo"];
$newtlogo = strip_tags($newtlogo);
$newtlogo = str_replace(" ","",$newtlogo);
$newtlogo = str_replace("Http://http://","http://",$newtlogo);
$newtlogo = str_replace("http://http://","http://",$newtlogo);
$newtlogo = addslashes($newtlogo);
mysql_query("UPDATE teams SET logo ='$newtlogo' WHERE teamid ='$trueclub' LIMIT 1") or die(mysql_error());
header ( 'Location: newlogo.php' );
}

//new picture
if (isset($_POST['submit1'])) { 
$newclogo = strip_tags($newclogo);
$newclogo = $_POST["newclogo"];
$newclogo = str_replace(" ","",$newclogo);
$newclogo = str_replace("Http://http://","http://",$newclogo);
$newclogo = str_replace("http://http://","http://",$newclogo);
$newclogo = addslashes($newclogo);
mysql_query("UPDATE arena SET cheer_logo ='$newclogo' WHERE teamid ='$trueclub'") or die(mysql_error());
header ( "Location: cheerleaders.php?squad=$trueclub" );
}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');

$result = mysql_query("SELECT name, city, country, shirt, logo, arenaname, fans, cheer_name, cheer_logo FROM `teams`, `arena` WHERE teams.teamid=arena.teamid AND teams.teamid ='$trueclub' LIMIT 1") or die(mysql_error());
$name=mysql_result($result,0,"name");
$city=mysql_result($result,0,"city");
$country=mysql_result($result,0,"country");
$shirt=mysql_result($result,0,"shirt");
if ($is_supporter==0 AND $gmlev < 2) {$shirt='white';}
$logo=mysql_result($result,0,"logo");
$cheerlogo=mysql_result($result,0,"cheer_logo");
$arenam=mysql_result($result,0,"arenaname");
$arenam = stripslashes($arenam);
$nofans=mysql_result($result,0,"fans");
$fanclub=mysql_result($result,0,"cheer_name");
if (strlen($logo)>0) {$zaobrazec1 = $logo;} else {$zaobrazec1 = 'http://';}
if (strlen($cheerlogo)>0) {$zaobrazec2 = $cheerlogo;} else {$zaobrazec2 = 'http://';}

$result12 = mysql_query("SELECT leagues.leagueid AS leagueid, leagues.name AS name1, competition.position AS position FROM competition, leagues WHERE competition.leagueid = leagues.leagueid AND competition.season ='$default_season' AND competition.teamid ='$trueclub' LIMIT 1") or die(mysql_error());
$whleague = mysql_result($result12,0,"leagueid");
$uvrscen = mysql_result($result12,0,"position");
$leaguenam = mysql_result($result12,0,"name1");

$result14 = mysql_query("SELECT * FROM statements WHERE user ='$userid' ORDER BY `time` DESC LIMIT 1") or die(mysql_error());
if (mysql_num_rows($result14) >0)
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

<table border="0" cellpading="0" cellspacing="10" width="100%">
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
if (strlen($email) > 23 AND $is_supporter==1 AND strlen($logo) > 0) {$splitmail = explode("@", $email); $mail11 = $splitmail[0]; $mail22 = $splitmail[1]; $email=$mail11."@<br/>".$mail22;}
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
<?php if ($logo != '') {?><img src="<?=$logo?>" border="0" alt="" width="137"><?php }?>
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
<a href="statement.php"><?=$langmark521?></a><br/>
<?php if($is_supporter==1){echo "<a href=\"newshirt.php\">",$langmark523,"</a><br/>";?>
<br/>
<h2><?=$langmark532?></h2><br/>
<form method="post" action="<?=$_SERVER['PHP_SELF']?>" style="margin: 0">
<?=$langmark533?> <input type="text" size="27" maxlength="370" name="newtlogo" value="<?=$zaobrazec1?>" class="inputreg"><br/>
<input type="submit" value="<?=$langmark534?>" name="submit" class="buttonreg"></form>
<?php }?>

<br/><h2><?=$langmark535?></h2><br/>

<form method="post" action="<?=$PHP_SELF?>" style="margin: 0">
<?=$langmark536?> <input type="text" size="26" maxlength="370" name="newclogo" value="<?=$zaobrazec2?>" class="inputreg"><br/>
<input type="submit" value="<?=$langmark534?>" name="submit1" class="buttonreg">
</form>

<br/><h2><?=$langmark537?></h2><br/>
1. <?=$langmark538?><br/>
2. <?=$langmark539?><br/>
3. <?=$langmark540?><br/>
4. <?=$langmark541?><br/>

</td>
</tr>
</table>
</div>
</div>
</body>
</html>