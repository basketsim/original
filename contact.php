<?php
if (isset($_POST['submit'])) {
$cuser = $_POST['cuser'];
$cuser=strip_tags($cuser);
$cuser=str_replace(" ","",$cuser);
$cuser=str_replace("%20","",$cuser);
$cuser=addslashes($cuser);
$cuser=stripslashes($cuser);
if (preg_match( '/[^A-z0-9]+/', $cuser)) {header("Location: contact.php?error=char");die();}
if ($cuser=='') {header("Location: contact.php?error=nou");die();}
$cmail = $_POST['cmail'];
if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $cmail)){header("Location: contact.php?error=mail");die();}
$csubject = $_POST["csubject"];
if (!is_numeric($csubject)) {header('Location: contact.php');die();}
if ($csubject > 2 OR $csubject < 0) {header('Location: contact.php');die();}
$cmessage = $_POST["cmessage"];
if(strlen($cmessage) < 7) {header("Location: contact.php?error=mts");die();}
$email=strip_tags($email);
$cmail=str_replace(" ","",$cmail);
$cmail=str_replace("%20","",$cmail);
$cmail=addslashes($cmail);
require_once('inc/config.php');
$cmessage = strip_tags($cmessage);
$cmessage = nl2br($cmessage);
$cmessage = mysql_real_escape_string($cmessage);
$pis = mysql_query("SELECT userid, login FROM users WHERE email='$cmail'");
if (mysql_num_rows($pis) < 1) {header("Location: contact.php?error=not");die();}
$stvar = mysql_result($pis,0,"login");
if ($stvar<>$cuser) {header("Location: contact.php?error=match");die();}

$odkoga = mysql_result($pis,0,"userid");
if ($csubject==0){$opis='Cant login due to bad logins';}
if ($csubject==1){$opis='Cheating case';}
if ($csubject==2){$opis='Cant log in (other reason)';}

$query = "INSERT INTO gm_messages VALUES ('', $odkoga, '$opis', '$cmessage', NOW(), 0, 1, 0, '')";
mysql_query($query) or die("Failed. Please try again");
header("Location: contact.php?error=ok");
}

require("inc/lang/en.php");
include_once('inc/basic.php');
?>

<h2><?=$langmark559?></h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top">
<td class="border" width="61%" bgcolor="#ffffff">

<b><?=$langmark560?>:</b> <a href="mailto:basketsim@basketsim.com">basketsim@basketsim.com</a><br/>
<?=$langmark561?><br/>
<?=$langmark562?> <a href="gamerules.php"><?=$langmark563?></a>.<br/>
<?=$langmark564?> <a href="forgotpass.php"><?=$langmark565?></a> (<?=$langmark566?><b>!</b>).<br/>
<br/>
<b><?=$langmark568?></b><br/>
<?php
$error=$_GET['error'];
if ($error=='nou') {echo "<b><font color=\"red\">You must provide login name!</font></b>";}
if ($error=='mail') {echo "<b><font color=\"red\">",$langmark570,"</font></b>";}
if ($error=='mts') {echo "<b><font color=\"red\">",$langmark571,"</font></b>";}
if ($error=='char') {echo "<b><font color=\"red\">",$langmark572,"</font></b>";}
if ($error=='not') {echo "<b><font color=\"red\">Wrong login name and/or email!</font></b>";}
if ($error=='match') {echo "<b><font color=\"red\">Wrong login name and/or email!</font></b>";}
if ($error=='ok') {echo "<b><font color=\"darkgreen\">",$langmark575,"</font></b>";}
?>
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="margin: 0">
<table>
<tr><td>Login name:</td><td><input type="text" name="cuser" size="18" maxlength="30" class="inputreg"></td></tr>
<tr><td><?=$langmark486?>:</td><td><input type="text" name="cmail" size="18" maxlength="55" class="inputreg"></td></tr>
<tr><td><?=$langmark577?>:</td><td><select name="csubject" class="inputreg">
<option value="0"><?=$langmark578?></option>
<option value="1"><?=$langmark579?></option>
<option value="2"><?=$langmark580?></option></select></td></tr>
<tr><td colspan="2"><textarea style="width: 240px; padding: 1px; margin: 2px;" rows="7" name="cmessage" wrap="soft" class="inputreg"></textarea></td></tr>
<tr><td colspan="2"><input type="submit" value="<?=$langmark219?>" name="submit" class="buttonreg"></td></tr></table>
</form>
</td><td width="39%">
<img src="img/BSLS_light.png" alt="Basketsim" border="0" width="230">
</td>
</tr>
</table>
</div>
</div>
</body>
</html>