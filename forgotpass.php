<?php
require("inc/lang/en.php");
if (isset($_POST['submit'])) {
$lost_user = $_POST["lost_user"];
$email = $_POST["email"];
$email=trim($email);
$email=strip_tags($email);
$lost_user=trim($lost_user);
$lost_user=strip_tags($lost_user);
$email=str_replace(" ","",$email);
$lost_user=str_replace(" ","",$lost_user);
$email=str_replace("%20","",$email);
$lost_user=str_replace("%20","",$lost_user);
$email=addslashes($email);
$lost_user=addslashes($lost_user);
require_once('inc/config.php');
$usermail = mysql_query("SELECT email FROM users WHERE username ='$lost_user' LIMIT 1") or die(mysql_error());
if (mysql_numrows($usermail) < 1) {header( "Location: forgotpass.php?error=nm" );die ();}
else {$mail = mysql_result($usermail,0); if ($mail <> $email) {header( "Location: forgotpass.php?error=nm" );die ();}
}
function createRandomPassword() {
    $chars = "abcdefghijkmnopqrstuvwxyz023456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '' ;
    while ($i <= 7) {
        $num = rand() % 33;
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
    }
    return $pass;
}
$password = createRandomPassword();
$dbpass = md5($password);
$dbupdpass = mysql_query("UPDATE users SET password ='$dbpass' WHERE username ='$lost_user' LIMIT 1") or die(mysql_error());
function send_mail($to, $body, $subject, $fromaddress, $fromname)
{
  $eol="\r\n";
  $headers .= "From: ".$fromname."<".$fromaddress.">".$eol;
  $headers .= "Reply-To: ".$fromname."<".$fromaddress.">".$eol;
  $headers .= "Return-Path: ".$fromname."<".$fromaddress.">".$eol;
  $headers .= "Message-ID: <".time()."-".$fromaddress.">".$eol;
  $headers .= "X-Mailer: PHP v".phpversion().$eol;          // These two to help avoid spam-filters
  $headers .= 'MIME-Version: 1.0'.$eol.$eol;
  $msg .= $body;
  ini_set(sendmail_from,$fromaddress);  // the INI lines are to force the From Address to be used !
  $mail_sent = mail($to, $subject, $msg, $headers);
  ini_restore(sendmail_from);
  return $mail_sent;
}
$poslanpas= $langmark584." ".$password;
send_mail("$email", "$langmark582\n\n$langmark583\n\n$poslanpas", "$langmark581", "basketsim@basketsim.com", "Basketsim");
header( "Location: forgotpass.php?error=ok" );
}
include ('inc/basic.php');
$error=$_GET['error'];
?>

<h2><?=$langmark585?></h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top">
<td class="border" width="59%" bgcolor="#ffffff">

<?php if ($error=='nm') {echo "<b><font color=\"darkred\">",$langmark586,"</font></b><br/><br/>";}?>
<?php if ($error=='ok') {echo "<b><font color=\"darkgreen\">".$langmark587,"</font></b><br/><br/>";}?>

<?=$langmark588?> <a href="contact.php"><?=$langmark1503?></a>.<br/>

<br/><form name="forgotpassword" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="margin: 0">
<table cellspacing="0" cellpadding="0" border="0">
<tr><td width="60"><?=$langmark589?></td><td><input name="lost_user" type="text" class="inputreg"></td></tr>
<tr><td width="60"><?=$langmark486?></td><td><input name="email" type="text" class="inputreg"></td></tr>
<tr><td width="60"></td><td><input type="submit" name="submit" value="<?=$langmark219?>" class="buttonreg"></td></tr>
<tr><td colspan="2"><br/><b>(If there will be nothing in your inbox, check your spam inbox as well and mark it as not spam!)</b></td></tr>
</table>
</form>  
</td>
<td width="41%"><img src="img/BSLS_light.png" alt="Basketsim" border="0" width="230"></td>
</tr>
</table>
</div>
</div>
</body>
</html>