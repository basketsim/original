<?php
//ZAČASNO!!!
$skin=7;

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$comparep = mysql_query("SELECT username, login, club, email, hide_email, supporter, expire, level, lang, signature, cbpp_code, homepage, langadm, flags, look FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($comparep)) {
$username = mysql_result($comparep,0,"username");
$login= mysql_result($comparep,0,"login");
$truecub = mysql_result($comparep,0,"club");
$email_adress = mysql_result($comparep,0,"email");
$hide_email = mysql_result($comparep,0,"hide_email");
$supporter_is = mysql_result($comparep,0,"supporter");
$expire = mysql_result($comparep,0,"expire");
$level = mysql_result($comparep,0,"level");
$lang = mysql_result($comparep,0,"lang");
$signature = mysql_result($comparep,0,"signature");
$homepage = mysql_result($comparep,0,"homepage");
$langadm = mysql_result($comparep,0,"langadm");
$cbpp_code = mysql_result($comparep,0,"cbpp_code");
$flagica = mysql_result($comparep,0,"flags");
$look = mysql_result($comparep,0,"look");
$checked='checked';
if (strlen($homepage)<3) {$homepage='http://';}
}
else {die(include 'basketsim.php');}

require("inc/lang/".$lang.".php");

$language = $_POST["language"];
if (strlen($language)>3) {die(include 'basketsim.php');}

$ab = mysql_query("SELECT cheer_name FROM arena WHERE teamid ='$truecub' LIMIT 1") or die(mysql_error());

if (isset($_POST['submit'])) {
$user_name = $_POST['user_name'];
$login_name = $_POST['login_name'];
$old_pass = $_POST['old_pass'];
$new_pass1 = $_POST['new_pass1'];
$new_pass2 = $_POST['new_pass2'];
$user_mail = $_POST['user_mail'];
$hide_mail = $_POST['hide_mail'];
$home_page = $_POST['home_page'];
$cbppcode = $_POST['cbppcode'];
//$skin = $_POST['skin'];
//if (!is_numeric($skin)) {die(include 'basketsim.php');}

if ($hide_mail == TRUE) {$hide_mail = 1;} else {$hide_mail = 0;}
if ($langadm==1) {$binokob=4;} else {$binokob=7;}
if ($level>1) {$binokob=4;}
if (preg_match( '/[^A-z0-9]+/', $user_name ) AND $binokob==7) {header ( "Location: profile.php?error=1"); die();}
if (preg_match( '/[^A-z0-9]+/', $login_name )) {header ( "Location: profile.php?error=16"); die();}
if (preg_match( '/[^A-z0-9]+/', $new_pass1 )) {header("Location: profile.php?error=2" ); die();}
if (preg_match( '/[^A-z0-9]+/', $cbppcode )) {header("Location: profile.php?error=108"); die();}
if (preg_match( '/[^A-z0-9]+/', $new_pass2 )) {header("Location: profile.php?error=2" ); die();}
if ($new_pass1<>$new_pass2) {header ( "Location: profile.php?error=3" ); die();}
if (md5($old_pass)<>$koda) {header ( "Location: profile.php?error=4" ); die();}

$home_page_ver = explode("://",$home_page);
if (!($home_page_ver[0] == 'Http' OR $home_page_ver[0] == 'https' OR $home_page_ver[0] == 'http' OR $home_page_ver[0] == 'Https')) {header ( "Location: profile.php?error=99" ); die();}
if (strlen($home_page)<4) {header ( "Location: profile.php?error=99" ); die();}

$user_name=strip_tags($user_name);
$new_pass1=strip_tags($new_pass1);
$new_pass2=strip_tags($new_pass2);
$user_mail=strip_tags($user_mail);
$home_page=strip_tags($home_page);
$cbppcode=strip_tags($cbppcode);

$user_mail=str_replace(" ","",$user_mail);
$home_page=str_replace(" ","",$home_page);

$user_name=str_replace("%20","",$user_name);
$new_pass1=str_replace("%20","",$new_pass1);
$new_pass2=str_replace("%20","",$new_pass2);
$user_mail=str_replace("%20","",$user_mail);
$home_page=str_replace("%20","",$home_page);
$cbppcode=str_replace("%20","",$cbppcode);

$user_name=addslashes($user_name);
$old_pass=addslashes($old_pass);
$new_pass1=addslashes($new_pass1);
$new_pass2=addslashes($new_pass2);
$user_mail=addslashes($user_mail);
$home_page=addslashes($home_page);
$cbppcode=addslashes($cbppcode);

$minuser_name_len = 4;
$minuser_login_len = 5;
if (!$new_pass1 AND !$new_pass2) {$minnew_pass1_len = 0; $minnew_pass2_len = 0;} else {$minnew_pass1_len = 5; $minnew_pass2_len = 5;}

$brand_new_pass=md5($new_pass2);

if ((md5($cbppcode) == $koda AND $cbppcode <> '') OR (md5($cbppcode) == $brand_new_pass AND $cbppcode != '')) {header ( "Location: profile.php?error=66" ); die();}
if(!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,6}$",$user_mail)) {header ( "Location: profile.php?error=6" ); die();}

//unikatnost usernama
$queryuni = mysql_query("SELECT userid FROM users WHERE username ='$user_name' AND username <>'$username'") or die(mysql_error());
$verify = mysql_fetch_row($queryuni);
if ($verify){
header ( "Location: profile.php?error=5" );
die();}

//unikatnost mejla
$querymai = mysql_query("SELECT email FROM users WHERE email ='$user_mail' AND email <>'$email_adress'") or die(mysql_error());
$verify2 = mysql_fetch_row($querymai);
if ($verify){header ("Location: profile.php?error=7" ); die();}

if(strlen($user_name) < $minuser_name_len) {header ( "Location: profile.php?error=8" ); die();}
if(strlen($login_name) < $minuser_login_len) {header ( "Location: profile.php?error=49" ); die();}
if(strlen($new_pass1) < $minnew_pass1_len) {header ( "Location: profile.php?error=9" ); die();}
if(strlen($new_pass2) < $minnew_pass1_len) {header ( "Location: profile.php?error=9" ); die();}
if(strlen($cbppcode) < 5 AND $cbppcode != '') {header ( "Location: profile.php?error=19" ); die();}

$sfansbla = $_POST["sfansbla"];
if (strlen($sfansbla)>0 AND $supporter_is==1) {
$sfansbla = addslashes($sfansbla);
$sfansbla = htmlspecialchars(stripslashes($sfansbla));
mysql_query("UPDATE arena SET cheer_name = '$sfansbla' WHERE teamid ='$truecub' LIMIT 1") or die(mysql_error());
}

if (!$new_pass1 AND !$new_pass2) {mysql_query("UPDATE users SET username='$user_name', login='$login_name', email='$user_mail', hide_email=$hide_mail, lang='$language', cbpp_code='$cbppcode', homepage='$home_page', look=$skin WHERE userid=$userid LIMIT 1") or die(mysql_error());
@mysql_query("UPDATE fantasy SET username='$user_name' WHERE user=$userid");
}
else {
mysql_query("UPDATE users SET username='$user_name', login='$login_name', password='$brand_new_pass', email='$user_mail', hide_email=$hide_mail, lang='$language', cbpp_code='$cbppcode', homepage='$home_page', look=$skin WHERE userid=$userid LIMIT 1") or die(mysql_error());
@mysql_query("UPDATE fantasy SET username='$user_name' WHERE user=$userid");
setcookie( "geslo", "0", time()-18000, "/", "", 0 );
setcookie("geslo", "$brand_new_pass", time()+18000, "/", "", 0 );
}
header ( 'Location: profile.php' );
}
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<h2><?=$langmark608?></h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr bgcolor="#ffffff" valign="top">
<td class="border">

<b><?=$langmark609?></b><br/><br/>
<?php if ($error==1) {echo "<b><font color=\"red\">",$langmark610,"</font></b><br/><br/>";}?>
<?php if ($error==2) {echo "<b><font color=\"red\">",$langmark611,"</font></b><br/><br/>";}?>
<?php if ($error==3) {echo "<b><font color=\"red\">",$langmark612,"</font></b><br/><br/>";}?>
<?php if ($error==4) {echo "<b><font color=\"red\">",$langmark613,"</font></b><br/><br/>";}?>
<?php if ($error==5) {echo "<b><font color=\"red\">",$langmark614,"</font></b><br/><br/>";}?>
<?php if ($error==6) {echo "<b><font color=\"red\">",$langmark615,"</font></b><br/><br/>";}?>
<?php if ($error==7) {echo "<b><font color=\"red\">",$langmark616,"</font></b><br/><br/>";}?>
<?php if ($error==8) {echo "<b><font color=\"red\">",$langmark617,"</font></b><br/><br/>";}?>
<?php if ($error==9) {echo "<b><font color=\"red\">",$langmark618,"</font></b><br/><br/>";}?>
<?php if ($error==16) {echo "<b><font color=\"red\">Login name contains invalid characters. Only english alphabet characters and numbers are allowed.</font></b><br/><br/>";}?>
<?php if ($error==19) {echo "<b><font color=\"red\">CBPP code must have at least 5 characters!</font></b><br/><br/>";}?>
<?php if ($error==49) {echo "<b><font color=\"red\">Login name too short. Please choose login name with more characters.</font></b><br/><br/>";}?>
<?php if ($error==66) {echo "<b><font color=\"red\">CBPP code and password must not be the same!</font></b><br/><br/>";}?>
<?php if ($error==99) {echo "<b><font color=\"red\">Home page must start with http://</font></b><br/><br/>";}?>
<?php if ($error==108) {echo "<b><font color=\"red\">CBPP code contains invalid characters!</font></b><br/><br/>";}?>

<form method="post" action="<?=$PHP_SELF?>" style="margin: 0">
<table width="100%">
<tr><td><?=$langmark619?>:</td><td>
<input type="text" name="user_name" maxlength="20" value="<?=$username?>" class="inputreg"> (min.4)</td></tr>

<tr><td>Login name: (<a href="profile.php?act=explain">more info</a>)</td><td>
<input type="text" name="login_name" maxlength="20" value="<?=$login?>" class="inputreg"> (min.5)<!-- <font color="green"><b>NEW!</b></font>--></td></tr>
<?php
$expa=$_GET['act'];
if ($expa=='explain') {?>
<tr><td colspan="2">
<hr/>Login name is a name that you can use instead of your username to log on to Basketsim. You can keep it the same as your username, or you can pick a secret login name and use it instead of your username when logging in. By doing that, you will increase the security of your account and prevent all hacking attempts. If you decide to use login name, your username in the game will still stay the same, you just won't be able to use it for logins anymore!<hr/>
</td></tr>
<?php }?>

<tr><td><?=$langmark620?>:</td><td>
<input type="password" name="old_pass" maxlength="30" class="inputreg"></td></tr>

<tr><td><?=$langmark621?>:</td><td>
<input type="password" name="new_pass1" maxlength="30" class="inputreg"> (min.5)</td></tr>

<tr><td><?=$langmark622?>:</td><td>
<input type="password" name="new_pass2" maxlength="30" class="inputreg"> (min.5)</td></tr>

<tr><td><?=$langmark623?>:</td><td>
<select name="language" class="inputreg">
<option name="bos" value="bos" <?php if ($lang=='bos'){echo "selected";}?>>Bosanski</option>
<option name="bul" value="bul" <?php if ($lang=='bul'){echo "selected";}?>>Български</option>
<option name="cat" value="cat" <?php if ($lang=='cat'){echo "selected";}?>>Catalan</option>
<option name="chn" value="chn" <?php if ($lang=='chn'){echo "selected";}?>>Chinese (simplified)</option>
<option name="chn" value="chn" <?php if ($lang=='cht'){echo "selected";}?>>Chinese (traditional)</option>
<option name="cze" value="cze" <?php if ($lang=='cze'){echo "selected";}?>>Čeština</option>
<option name="den" value="den" <?php if ($lang=='den'){echo "selected";}?>>Dansk</option>
<option name="ger" value="ger" <?php if ($lang=='ger'){echo "selected";}?>>Deutsch</option>
<option name="est" value="est" <?php if ($lang=='est'){echo "selected";}?>>Eesti</option>
<option name="gre" value="gre" <?php if ($lang=='gre'){echo "selected";}?>>ελληνικά</option>
<option name="en" value="en" <?php if ($lang=='en'){echo "selected";}?>>English</option>
<option name="spa" value="spa" <?php if ($lang=='spa'){echo "selected";}?>>Español</option>
<option name="arg" value="arg" <?php if ($lang=='arg'){echo "selected";}?>>Español argentino</option>
<option name="chi" value="chi" <?php if ($lang=='chi'){echo "selected";}?>>Español chileno</option>
<option name="fre" value="fre" <?php if ($lang=='fre'){echo "selected";}?>>Français</option>
<option name="isr" value="isr" <?php if ($lang=='isr'){echo "selected";}?>>עברית</option>
<option name="cro" value="cro" <?php if ($lang=='cro'){echo "selected";}?>>Hrvatski</option>
<option name="ita" value="ita" <?php if ($lang=='ita'){echo "selected";}?>>Italiano</option>
<option name="lat" value="lat" <?php if ($lang=='lat'){echo "selected";}?>>Latviešu</option>
<option name="lit" value="lit" <?php if ($lang=='lit'){echo "selected";}?>>Lietuvių</option>
<option name="hun" value="hun" <?php if ($lang=='hun'){echo "selected";}?>>Magyar</option>
<option name="pol" value="pol" <?php if ($lang=='pol'){echo "selected";}?>>Polski</option>
<option name="por" value="por" <?php if ($lang=='por'){echo "selected";}?>>Português</option>
<option name="rom" value="rom" <?php if ($lang=='rom'){echo "selected";}?>>Romanian</option>
<option name="rus" value="rus" <?php if ($lang=='rus'){echo "selected";}?>>Pусский</option>
<option name="slk" value="slk" <?php if ($lang=='slk'){echo "selected";}?>>Slovenčina</option>
<option name="slo" value="slo" <?php if ($lang=='slo'){echo "selected";}?>>Slovenščina</option>
<option name="srl" value="srl" <?php if ($lang=='srl'){echo "selected";}?>>Srpski</option>
<option name="src" value="src" <?php if ($lang=='src'){echo "selected";}?>>Cрпски</option>
<option name="fin" value="fin" <?php if ($lang=='fin'){echo "selected";}?>>Suomi</option>
<option name="swe" value="swe" <?php if ($lang=='swe'){echo "selected";}?>>Svenska</option>
<option name="tur" value="tur" <?php if ($lang=='tur'){echo "selected";}?>>Türkçe</option>
<option name="bel" value="bel" <?php if ($lang=='bel'){echo "selected";}?>>Vlaams</option>
</select> <i>(translations are not complete yet)</i></td></tr>

<tr><td><?=$langmark012," ",strtolower($langmark560)?>:</td><td>
<input type="text" name="user_mail" value="<?=$email_adress?>" class="inputreg" size="25"></td></tr>

<!-- <tr><td><?=$langmark594?></td><td>
<input type="checkbox" class="inputreg" name="hide_mail" <?=$checked?>></td></tr> -->

<?php if ($supporter_is==1) {?><tr><td>Fanclub name:</td><td>
<input type="text" maxlength="14" name="sfansbla" value="<?=stripslashes(mysql_result($ab,0))?>" class="inputreg"></td></tr><?php }?>

<tr><td>CBPP code:</td><td>
<input type="text" name="cbppcode" value="<?=$cbpp_code?>" maxlength="20" class="inputreg"> (min.5)</td></tr>

<tr><td>Home page:</td><td>
<input type="text" name="home_page" value="<?=$homepage?>" size="51" maxlength="128" class="inputreg"></td></tr>

<tr><td>Prefered look:</td><td>
<select name="skin" class="inputreg" disabled="disabled">
<option name="0" value="0" <?php if ($look==0){echo "selected";}?>>Default (cream background, white menu)</option>
<option name="1" value="1" <?php if ($look==1){echo "selected";}?>>Cream (cream background, cream menu)</option>
<option name="2" value="2" <?php if ($look==2){echo "selected";}?>>Transparent (cream background, see through menu)</option>
<option name="3" value="3" <?php if ($look==3){echo "selected";}?>>Clean (white background, white menu)</option>
<option name="4" value="4" <?php if ($look==4){echo "selected";}?>>Old style (white background, gray menu)</option>
<option name="5" value="5" <?php if ($look==5){echo "selected";}?>>Orange (orange background, white menu)</option>
<option name="6" value="6" <?php if ($look==6){echo "selected";}?>>Wild (red-orange background, white menu)</option>
<option name="7" value="7" <?php if ($look==7){echo "selected";}?>>Widescreen friendly look</option>
</select>
<br/><i>A new, wider look has been applied. Skins will be available again in the future!</i>
</td></tr>

<tr><td><input type="submit" name="submit" value="<?=$langmark624?>" class="buttonreg"></td></tr>
</table></form>

<?php
if ($supporter_is==1) {
?>
</td>
<tr bgcolor="#ffffff">
<td class="border" bgcolor="#ffffff">
<b><?=$langmark625?></b><br/><br/>
<?php
$splitdatetime = explode(" ", $expire); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$days = (int)((mktime (0,0,0,$dbmonth,$dbday,$dbyear) - time(void))/86400);
$days = $days+1;
if ($days > 1) {echo $langmark626," ",$days," ",$langmark627,"!";}
else {echo $langmark628;}
?>
<br/><?=$langmark629?> <a href="supporter.php"><?=$langmark630?></a>.


<?php
if ($userid==1) {
echo "<br/><br/><b>You can transfer part of your supportership to another user</b>";
echo "<br/>Search by username: <input type=\"text\" value=\"<?=$vpisanus?>\" name=\"ttuser\" size=\"5\">";
/*
ko nekdo nabavi suppa grem v admina in mu ga vklopim, to se zapiše v bazo in user dobi sporočilo v inbox, kjer je tudi link na profil
user vidi v profilu nabavljenega supporterja
lahko ga prenese drugemu uporabniku - zahtevek, ki ga potrdim (ali pa avtomatsko?)
zraven tudi opozorilo koliko supporterja mu bo ostalo, če sploh kaj
prenos supporterja se zapiše v bazo, drugi user dobi sporočilo in tudi on potem vidi ta supporter zapisan v svojem profilu
(mogoč je tudi darilni prenos z eventom ali brez - ali pa anonimni prenos?)
pri novem sistemu mora biti zraven tudi obvestilo od katerega datuma dalje je pač tako
pošljem tudi massmail suppom? mogoče, predvsem pa že pri nabavi zapišem da je mogoče takoj potem prenesti na drugega, torej je mogoče kupiti za drugega!
sočasno dodam še nove opcije plačila? mogoče tudi ob nabavi suppa zapišem način plačila in ga prikazujem userju
*/
}
?>


</td>

<tr bgcolor="#ffffff">
<td class="border" bgcolor="#ffffff">
<b><?=$langmark631?></b><br/><br/>
<?php
$scontent = $_POST["scontent"];
if (!isset($_POST['form2'])) {
?>
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="margin: 0">
<textarea name="scontent" rows="3" cols="50" wrap="soft" class="inputreg"><?=$signature?></textarea>
<br/><input type="submit" value="<?=$langmark632?>" name="form2" class="buttonreg">
</form>
<?php
} else {
$scontent = addslashes($scontent);
$scontent = htmlspecialchars(stripslashes($scontent));
mysql_query("UPDATE users SET signature = '$scontent' WHERE userid=$userid LIMIT 1") or die(mysql_error());
echo $langmark633,"!";
}
?>
</td>
</tr>
<tr bgcolor="#ffffff">
<td class="border" bgcolor="#ffffff">
<b>Your <a href="club.php?flags=all">flag chasing</a> preferences:</b><br/><br/>
<?php
$flags1 = $_POST["flags1"];
$flags2 = $_POST["flags2"];
if (!isset($_POST['submitdod'])) {
?>
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="margin: 0">
<select name="flags1" class="inputreg">
<option name="1" value="1" <?php if ($flagica==1 || $flagica==2) {echo "selected";}?>>Show flags collected in all international matches</option>
<option name="2" value="2" <?php if ($flagica==3 || $flagica==4) {echo "selected";}?>>Show flags collected in friendly matches only</option>
</select><br/>
<select name="flags2" class="inputreg">
<option name="1" value="1" <?php if ($flagica==1 || $flagica==3) {echo "selected";}?>>Display flags in alphabet order of countries</option>
<option name="2" value="2" <?php if ($flagica==2 || $flagica==4) {echo "selected";}?>>Display flags in chronological order of matches</option>
</select><br/>
<input type="submit" name="submitdod" value="<?=$langmark624?>" class="buttonreg">
</form>
<?php
} else {
//tip1: vse tekme po abecedi
//tip2: vse tekme brez orderja
//tip3: samo frendliji po abecedi
//tip4: samo frendliji brez orderja
if (!is_numeric($flags1) || !is_numeric($flags2)) {die("An error had occured, please go to your profile again to set the preferences.");}
if ($flags1==1 AND $flags2==1) {$novt=1;}
elseif ($flags1==1 AND $flags2==2) {$novt=2;}
elseif ($flags1==2 AND $flags2==1) {$novt=3;}
elseif ($flags1==2 AND $flags2==2) {$novt=4;}
mysql_query("UPDATE users SET flags=$novt WHERE userid=$userid LIMIT 1") or die(mysql_error());
?>
Your preferences were updated!
<?php
}
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