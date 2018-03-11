<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT level FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)==1) {$level = mysql_result($compare,0,"level");} else {die(include 'basketsim.php');}
if ($level < 3) {die(include 'index.php');}

$send=$_GET['send'];
$user=$_GET['user'];
$return=$_GET['return'];
if (!is_numeric($user) OR !is_numeric($return)) {die("Error!");}

//name
$querydve = "SELECT username FROM users WHERE userid ='$user'";
$unlast = mysql_result (mysql_query ($querydve), 0);
//message
$querydva = "SELECT message FROM gm_messages WHERE id ='$return'";
$mesageg = mysql_result (mysql_query ($querydva), 0);
$mesageg = stripslashes($mesageg);

//content
if (isset($_POST['submit'])) {
$message = $_POST["message"];
$message = trim($message);
$message = nl2br($message);
if (!$message) {die("Oops, that was an empty message reply! Just press back in your browser to get right back!");}
//ingame
if ($send=='in') {
$message = $message."<br/><br><b>This is a GM reply, please only respond according to instructions.</b>";
$result = mysql_query("INSERT INTO messages VALUES ('', $user, $userid, 0, NOW(), 'Response from GM team', '$message');");
header( "Location: gmpages.php?action=view&id=$return&msgsent=1" );
}
//email
if ($send=='out') {
$querygm = "SELECT username FROM users WHERE userid=$userid";
$gmnama = mysql_result (mysql_query ($querygm), 0);
$usermail = "SELECT email FROM users WHERE userid=$user";
$umail = mysql_result (mysql_query ($usermail), 0);
$message = strip_tags($message);
$message = stripslashes($message);
function send_mail($to, $body, $subject, $fromaddress, $fromname)
{
  $eol="\n";
  $headers .= "From: ".$fromname."<".$fromaddress.">".$eol;
  $headers .= "Reply-To: ".$fromname."<".$fromaddress.">".$eol;
  $headers .= "Return-Path: ".$fromname."<".$fromaddress.">".$eol;
  $headers .= "Message-ID: <".time()."-".$fromaddress.">".$eol;
  $headers .= "X-Mailer: PHP v".phpversion().$eol;          // These two to help avoid spam-filters
  $headers .= 'MIME-Version: 1.0'.$eol.$eol;
  $msg .= $body.$eol.$eol;
  ini_set(sendmail_from,$fromaddress);  // the INI lines are to force the From Address to be used !
  $mail_sent = mail($to, $subject, $msg, $headers);
  ini_restore(sendmail_from);
  return $mail_sent;
}
$message0 = "Hi ".$unlast.",";
$message2 = "This message was sent by ".$gmnama." and is offical response from Basketsim GM team. Please read it carefully, if you need further assistance, use Basketsim contact form again at www.basketsim.com";
send_mail("$umail", "$message0\n\n$message\n\n$message2", "Response from GM team", "basketsim@basketsim.com", "Basketsim");
header( "Location: gmpages.php?action=view&id=$return&msgsent=2" );
}
}
include('inc/header.php');
include('inc/osnova.php');
?>

<h2>Official reply to user</h2>

<table border="0" cellspacing="10" cellpadding="10" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border">

<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="margin: 0">
<?php echo "Receiver: ",$unlast; ?><br/>
<?php if($send=='in'){?>Method: in-game message<br/>
<textarea style="width:80%;padding:1px;border-style:solid;border-color:darkred;background-color:#F5F5F5;" rows="16" name="message" wrap="soft" onKeyDown="limitText(this.form.message,this.form.countdown,1000);" 
onKeyUp="limitText(this.form.message,this.form.countdown,1000);">><?=strip_tags($mesageg)?></textarea><br/>
<input readonly type="text" name="countdown" size="3" value="1000" style="padding:1px;border-style:solid;border-color:darkred;background-color:#F5F5F5;">
<input type="submit" value="Send message" name="submit" class="buttonreg">
<?php }?>
<?php if($send=='out'){?>Method: outgoing e-mail<br/>
Message you are replying to:<br/><br/>
<i><?=strip_tags($mesageg)?></i><br/><br/>
(Welcome message is already included, so don't start with Hi/Hello line, just write the content!)<br/>
<textarea style="width:80%;padding:1px;border-style:solid;border-color:darkred;background-color:#F5F5F5;" rows="16" name="message" wrap="soft" onKeyDown="limitText(this.form.message,this.form.countdown,1000);" 
onKeyUp="limitText(this.form.message,this.form.countdown,1000);"></textarea><br/>
<input readonly type="text" name="countdown" size="3" value="1000" style="padding:1px;border-style:solid;border-color:darkred;background-color:#F5F5F5;">
<input type="submit" value="Send e-mail" name="submit" class="buttonreg">
<?php }?>
</form>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>