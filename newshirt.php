<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT username, email, realname, club, supporter, signed, lastlog, lastip, lang, level FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
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
$dodgm = mysql_result($compare,0,"level");
}
else {die(include 'basketsim.php');}
if ($is_supporter<>1 AND $dodgm < 2) {die(include 'club.php');}

//majica
if (isset($_POST['submit'])) {
$shirtcolor = $_POST["shirtcolor"];
mysql_query("UPDATE teams SET shirt ='$shirtcolor' WHERE teamid ='$trueclub'");
header ( 'location: newshirt.php' );
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

$result12 = mysql_query("SELECT leagues.leagueid AS leagueid, leagues.name AS name1, competition.position AS position FROM competition, leagues WHERE competition.leagueid = leagues.leagueid AND competition.season ='$default_season' && competition.teamid ='$trueclub' LIMIT 1") or die(mysql_error());
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
<tr valign="top"><td><?=$langmark479?> </td><td># <?=$uvrscen," ",$langmark1494?> <b><a href="leagues.php?leagueid=<?=$whleague?>"><?=$leaguenam?></a></b></td></tr>	
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

if ($username == 'black') {$username= 'black_';}
elseif ($username == 'blue') {$username= 'blue_';}
elseif ($username == 'green') {$username= 'green_';}
elseif ($username == 'grey') {$username= 'grey_';}
elseif ($username == 'orange') {$username= 'orange_';}
elseif ($username == 'pink') {$username= 'pink_';}
elseif ($username == 'red') {$username= 'red_';}
elseif ($username == 'violet') {$username= 'violet_';}
elseif ($username == 'yellow') {$username= 'yellow_';}
?>

<!-- konec pressov -->

</td></tr>
</table>

<!-- konec celotnega levega okvirja na strani kluba -->

</td>

<!-- desni okvir, kako doseci cellspacing/padding?! -->

<td class="border" width="40%" valign="top" bgcolor="#ffffff">

<h2><?=$langmark531?></h2><br/>
<a href="statement.php"><?=$langmark521?></a><br/>
<a href="newlogo.php"><?=$langmark522?></a><br/>

<br/><h2><?=$langmark661?></h2><br/>

<form method="post" action="<?=$PHP_SELF?>" style="margin: 0">
<select name="shirtcolor" class="inputreg">
<option value="white" <?php if($shirt=='white'){echo "selected";}?>><?=$langmark682?></option>
<option value="white1" <?php if($shirt=='white1'){echo "selected";}?>><?=$langmark683?> 1</option>
<option value="white2" <?php if($shirt=='white2'){echo "selected";}?>><?=$langmark683?> 2</option>
<option value="white3" <?php if($shirt=='white3'){echo "selected";}?>><?=$langmark683?> 3</option>
<option value="white4" <?php if($shirt=='white4'){echo "selected";}?>><?=$langmark683?> 4</option>
<option value="white5" <?php if($shirt=='white5'){echo "selected";}?>><?=$langmark683?> 5</option>
<option value="white6" <?php if($shirt=='white6'){echo "selected";}?>><?=$langmark683?> 6</option>
<option value="yellow" <?php if($shirt=='yellow'){echo "selected";}?>><?=$langmark684?></option>
<option value="yellow1" <?php if($shirt=='yellow1'){echo "selected";}?>><?=$langmark685?> 1</option>
<option value="yellow2" <?php if($shirt=='yellow2'){echo "selected";}?>><?=$langmark685?> 2</option>
<option value="yellow3" <?php if($shirt=='yellow3'){echo "selected";}?>><?=$langmark685?> 3</option>
<option value="yellow4" <?php if($shirt=='yellow4'){echo "selected";}?>><?=$langmark685?> 4</option>
<option value="yellow5" <?php if($shirt=='yellow5'){echo "selected";}?>><?=$langmark685?> 5</option>
<option value="yellow6" <?php if($shirt=='yellow6'){echo "selected";}?>><?=$langmark685?> 6</option>
<option value="orange" <?php if($shirt=='orange'){echo "selected";}?>><?=$langmark672?></option>
<option value="orange1" <?php if($shirt=='orange1'){echo "selected";}?>><?=$langmark673?> 1</option>
<option value="orange2" <?php if($shirt=='orange2'){echo "selected";}?>><?=$langmark673?> 2</option>
<option value="orange3" <?php if($shirt=='orange3'){echo "selected";}?>><?=$langmark673?> 3</option>
<option value="orange4" <?php if($shirt=='orange4'){echo "selected";}?>><?=$langmark673?> 4</option>
<option value="orange5" <?php if($shirt=='orange5'){echo "selected";}?>><?=$langmark673?> 5</option>
<option value="orange6" <?php if($shirt=='orange6'){echo "selected";}?>><?=$langmark673?> 6</option>
<option value="green" <?php if($shirt=='green'){echo "selected";}?>><?=$langmark666?></option>
<option value="green1" <?php if($shirt=='green1'){echo "selected";}?>><?=$langmark667?> 1</option>
<option value="green2" <?php if($shirt=='green2'){echo "selected";}?>><?=$langmark667?> 2</option>
<option value="green3" <?php if($shirt=='green3'){echo "selected";}?>><?=$langmark667?> 3</option>
<option value="green4" <?php if($shirt=='green4'){echo "selected";}?>><?=$langmark667?> 4</option>
<option value="green5" <?php if($shirt=='green5'){echo "selected";}?>><?=$langmark667?> 5</option>
<option value="green6" <?php if($shirt=='green6'){echo "selected";}?>><?=$langmark667?> 6</option>
<option value="turquoise" <?php if($shirt=='turquoise'){echo "selected";}?>><?=$langmark678?></option>
<option value="turquoise1" <?php if($shirt=='turquoise1'){echo "selected";}?>><?=$langmark679?> 1</option>
<option value="turquoise2" <?php if($shirt=='turquoise2'){echo "selected";}?>><?=$langmark679?> 2</option>
<option value="turquoise3" <?php if($shirt=='turquoise3'){echo "selected";}?>><?=$langmark679?> 3</option>
<option value="turquoise4" <?php if($shirt=='turquoise4'){echo "selected";}?>><?=$langmark679?> 4</option>
<option value="turquoise5" <?php if($shirt=='turquoise5'){echo "selected";}?>><?=$langmark679?> 5</option>
<option value="turquoise6" <?php if($shirt=='turquoise6'){echo "selected";}?>><?=$langmark679?> 6</option>
<option value="lightblue" <?php if($shirt=='lightblue'){echo "selected";}?>><?=$langmark670?></option>
<option value="lightblue1" <?php if($shirt=='lightblue1'){echo "selected";}?>><?=$langmark671?> 1</option>
<option value="lightblue2" <?php if($shirt=='lightblue2'){echo "selected";}?>><?=$langmark671?> 2</option>
<option value="lightblue3" <?php if($shirt=='lightblue3'){echo "selected";}?>><?=$langmark671?> 3</option>
<option value="lightblue4" <?php if($shirt=='lightblue4'){echo "selected";}?>><?=$langmark671?> 4</option>
<option value="lightblue5" <?php if($shirt=='lightblue5'){echo "selected";}?>><?=$langmark671?> 5</option>
<option value="lightblue6" <?php if($shirt=='lightblue6'){echo "selected";}?>><?=$langmark671?> 6</option>
<option value="blue" <?php if($shirt=='blue'){echo "selected";}?>><?=$langmark664?></option>
<option value="blue1" <?php if($shirt=='blue1'){echo "selected";}?>><?=$langmark665?> 1</option>
<option value="blue2" <?php if($shirt=='blue2'){echo "selected";}?>><?=$langmark665?> 2</option>
<option value="blue3" <?php if($shirt=='blue3'){echo "selected";}?>><?=$langmark665?> 3</option>
<option value="blue4" <?php if($shirt=='blue4'){echo "selected";}?>><?=$langmark665?> 4</option>
<option value="blue5" <?php if($shirt=='blue5'){echo "selected";}?>><?=$langmark665?> 5</option>
<option value="blue6" <?php if($shirt=='blue6'){echo "selected";}?>><?=$langmark665?> 6</option>
<option value="pink" <?php if($shirt=='pink'){echo "selected";}?>><?=$langmark674?></option>
<option value="pink1" <?php if($shirt=='pink1'){echo "selected";}?>><?=$langmark675?> 1</option>
<option value="pink2" <?php if($shirt=='pink2'){echo "selected";}?>><?=$langmark675?> 2</option>
<option value="pink3" <?php if($shirt=='pink3'){echo "selected";}?>><?=$langmark675?> 3</option>
<option value="pink4" <?php if($shirt=='pink4'){echo "selected";}?>><?=$langmark675?> 4</option>
<option value="pink5" <?php if($shirt=='pink5'){echo "selected";}?>><?=$langmark675?> 5</option>
<option value="pink6" <?php if($shirt=='pink6'){echo "selected";}?>><?=$langmark675?> 6</option>
<option value="red" <?php if($shirt=='red'){echo "selected";}?>><?=$langmark676?></option>
<option value="red1" <?php if($shirt=='red1'){echo "selected";}?>><?=$langmark677?> 1</option>
<option value="red2" <?php if($shirt=='red2'){echo "selected";}?>><?=$langmark677?> 2</option>
<option value="red3" <?php if($shirt=='red3'){echo "selected";}?>><?=$langmark677?> 3</option>
<option value="red4" <?php if($shirt=='red4'){echo "selected";}?>><?=$langmark677?> 4</option>
<option value="red5" <?php if($shirt=='red5'){echo "selected";}?>><?=$langmark677?> 5</option>
<option value="red6" <?php if($shirt=='red6'){echo "selected";}?>><?=$langmark677?> 6</option>
<option value="violet" <?php if($shirt=='violet'){echo "selected";}?>><?=$langmark680?></option>
<option value="violet1" <?php if($shirt=='violet1'){echo "selected";}?>><?=$langmark681?> 1</option>
<option value="violet2" <?php if($shirt=='violet2'){echo "selected";}?>><?=$langmark681?> 2</option>
<option value="violet3" <?php if($shirt=='violet3'){echo "selected";}?>><?=$langmark681?> 3</option>
<option value="violet4" <?php if($shirt=='violet4'){echo "selected";}?>><?=$langmark681?> 4</option>
<option value="violet5" <?php if($shirt=='violet5'){echo "selected";}?>><?=$langmark681?> 5</option>
<option value="violet6" <?php if($shirt=='violet6'){echo "selected";}?>><?=$langmark681?> 6</option>
<option value="grey" <?php if($shirt=='grey'){echo "selected";}?>><?=$langmark668?></option>
<option value="grey1" <?php if($shirt=='grey1'){echo "selected";}?>><?=$langmark669?> 1</option>
<option value="grey2" <?php if($shirt=='grey2'){echo "selected";}?>><?=$langmark669?> 2</option>
<option value="grey3" <?php if($shirt=='grey3'){echo "selected";}?>><?=$langmark669?> 3</option>
<option value="grey4" <?php if($shirt=='grey4'){echo "selected";}?>><?=$langmark669?> 4</option>
<option value="grey5" <?php if($shirt=='grey5'){echo "selected";}?>><?=$langmark669?> 5</option>
<option value="grey6" <?php if($shirt=='grey6'){echo "selected";}?>><?=$langmark669?> 6</option>
<option value="black" <?php if($shirt=='black'){echo "selected";}?>><?=$langmark662?></option>
<option value="black1" <?php if($shirt=='black1'){echo "selected";}?>><?=$langmark663?> 1</option>
<option value="black2" <?php if($shirt=='black2'){echo "selected";}?>><?=$langmark663?> 2</option>
<option value="black3" <?php if($shirt=='black3'){echo "selected";}?>><?=$langmark663?> 3</option>
<option value="black4" <?php if($shirt=='black4'){echo "selected";}?>><?=$langmark663?> 4</option>
<option value="black5" <?php if($shirt=='black5'){echo "selected";}?>><?=$langmark663?> 5</option>
<option value="black6" <?php if($shirt=='black6'){echo "selected";}?>><?=$langmark663?> 6</option>
</select><br/>
<input type="submit" value="<?=$langmark534?>" name="submit" class="buttonreg">
</form>

<?php
if (isset($_POST['submitfa'])) {
if (($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/bmp")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "application/octet-stream")
&& ($_FILES["file"]["size"] < 12000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br/>";
    }
  else
    {
    if (file_exists("img/shirts/".$username."gif"))
      {
      unlink("img/shirts/".$username."gif");
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "img/shirts/".$username.".gif");
      mysql_query("UPDATE teams SET shirt = '$username' WHERE teamid ='$trueclub' LIMIT 1");
  echo "<br/><b><font color=\"darkgreen\">",$langmark1493,"</font></b>";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "img/shirts/".$username.".gif");
      mysql_query("UPDATE teams SET shirt = '$username' WHERE teamid ='$trueclub' LIMIT 1");
  echo "<br/><b><font color=\"darkgreen\">",$langmark1493,"</font></b>";
      }
    }
  }
else {echo "<br/><b>Invalid file!</b>";}
}
?>
<br/><h2><?=$langmark1247?></h2>
<br/><i><?=$langmark1248?></i>
<form action="<?=$PHP_SELF?>" method="post" enctype="multipart/form-data">
<input type="file" name="file" id="file" class="buttonreg"><br/>
<input type="submit" name="submitfa" value="<?=$langmark1249?>" class="buttonreg">
</form><br/>
1. <?=$langmark1250?><br/>
2. <?=$langmark1251?><br/>
3. <?=$langmark1252?><br/>
4. <?=$langmark1253?><br/>
<br/>If you don't see a new shirt after uploading it, refresh your club page in browser with F5!
</td>
</tr>
</table>
</div>
</div>
</body>
</html>