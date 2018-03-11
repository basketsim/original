<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$comparepasss = mysql_query("SELECT username, email, realname, club, signed, lastlog, lastip, supporter, `expire`, lang, level FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($comparepasss)) {
$username=mysql_result($comparepasss,0,"username");
$email=mysql_result($comparepasss,0,"email");
$realname = mysql_result($comparepasss,0,"realname");
$trueclub = mysql_result($comparepasss,0,"club");
$signed=mysql_result($comparepasss,0,"signed");
$lastlog=mysql_result($comparepasss,0,"lastlog");
$lastip=mysql_result($comparepasss,0,"lastip");
$is_supporter=mysql_result($comparepasss,0,"supporter");
$expajr = mysql_result($comparepasss,0,'expire');
$lang = mysql_result($comparepasss,0,"lang");
$gmlev = mysql_result($comparepasss,0,"level");
}
else {die(include 'basketsim.php');}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');

$result = mysql_query("SELECT `name`, `city`, `country`, `shirt`, `logo`, `arenaname`, `fans`, `cheer_name` FROM `teams`, `arena` WHERE teams.teamid=arena.teamid AND teams.teamid ='$trueclub' LIMIT 1") or die(mysql_error());
$name=mysql_result($result,0,"name");
$city=mysql_result($result,0,"city");
$country=mysql_result($result,0,"country");
$shirt=mysql_result($result,0,"shirt");
if ($is_supporter==0 AND $gmlev < 2) {$shirt='white';}
$logo=mysql_result($result,0,"logo");
$arenam=mysql_result($result,0,"arenaname");
$arenam = stripslashes($arenam);
$nofans=mysql_result($result,0,"fans");
$fanclub=mysql_result($result,0,"cheer_name");

$result12 = mysql_query("SELECT leagues.leagueid AS leagueid, leagues.name AS name1, competition.position AS position FROM competition, leagues WHERE competition.leagueid = leagues.leagueid AND competition.season ='$default_season' AND competition.teamid ='$trueclub' LIMIT 1") or die(mysql_error());
$whleague = mysql_result($result12,0,"leagueid");
$uvrscen = mysql_result($result12,0,"position");
$leaguenam = mysql_result($result12,0,"name1");

$result14 = mysql_query("SELECT * FROM statements WHERE user ='$userid' ORDER BY `id` DESC LIMIT 1") or die(mysql_error());
if (mysql_num_rows($result14) > 0)
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
<td class="border" width="59%" valign="top" bgcolor="#ffffff">

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
<tr valign="top"><td width=52><?=$langmark475?>: </td><td><b><?=$trueclub?></b></td></tr>
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
<?php } else {echo "<br/><i>",$langmark489,"</i>";}
?>

<!-- konec pressov -->

</td></tr>
</table>

<!-- konec celotnega levega okvirja na strani kluba -->

</td>

<!-- desni okvir, kako doseci cellspacing/padding?! -->

<td class="border" width="41%" valign="top" bgcolor="#ffffff">

<h2><?=$langmark524?></h2><br/>
<?php
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

$resultev = mysql_query("SELECT `eventid`, `when`, `description` FROM `events` WHERE `type` =0 AND team ='$trueclub'");
$all_info = array();
while ($get_info = mysql_fetch_row($resultev)){
$all_info[] = $get_info;
}
$all_info = multisort($all_info,2,70,'0','1','2');
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
<br/><a href="club.php"><?=$langmark409?></a>
</td>
</tr>
</table>
</div>
</div>
</body>
</html>