<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT username, level FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)) {
$username = mysql_result ($compare,0,"username");
$moderating = mysql_result ($compare,0,"level");
}
else {die(include 'basketsim.php');}
if ($moderating<>3){die(include 'index.php');}
$action = $_GET['action'];
$id=$_GET["id"];
$msgsent=$_GET["msgsent"];
//comment
if (isset($_POST['submit'])) {
$cmessage = $_POST["cmessage"];
$cmessage = nl2br($cmessage);
mysql_query("UPDATE gm_messages SET gm ='$userid', comment ='$cmessage' WHERE id ='$id'") or die(mysql_error());
}

$psw=$_GET["psw"];
if ($psw=='new') {
$result = mysql_query("SELECT users.userid, users.email FROM users, gm_messages WHERE users.userid = gm_messages.user AND gm_messages.id ='$id' LIMIT 1") or die(mysql_error());
$user= mysql_result($result,0,"users.userid");
$email = mysql_result($result,0,"users.email");
if (mysql_numrows($result) < 1) {header("Location: gmpages.php"); die();}
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
$dbupdpass = mysql_query("UPDATE users SET password ='$dbpass' WHERE userid ='$user' LIMIT 1") or die(mysql_error());
function send_mail($to, $body, $subject, $fromaddress, $fromname)
{
  $eol="\r\n";
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
$message1 = "We received your request for new password. You can now login to www.basketsim.com again. If it wasn't you who sent the request you must still use new password, but you should report this to basketsim administration.";
$message2 = "New password is: ".$password;
send_mail("$email", "Hello coach!\n\n$message1\n\n$message2", "Basketsim lost password", "basketsim@basketsim.com", "Basketsim");
header( "Location: gmpages.php?action=read&id=$id" );
}

include_once('inc/header.php');
include_once('inc/osnova.php');
?>
<h2>GM PAGES</h2>

<table cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="57%">

<?php
if (isset($_POST['submit97'])) {
$naname = addslashes(strip_tags($_POST['novime']));
$naname = trim($naname);
echo "<h2>",$naname,"'s gamemasters file:</h2>";
$result = mysql_query("SELECT `subject`, `message`, `time`, `comment` FROM gm_messages, users WHERE userid = user AND username = '$naname' ORDER BY id DESC LIMIT 500");
while($r=mysql_fetch_array($result)) {
$subject=$r["subject"];
$message=$r["message"];
$time=$r["time"];
$comment=$r["comment"];
echo "<br/><b>Time:</b> ",$time,"<br/>";
echo "<b>Subject:</b> ",$subject,"<br/>";
echo "<b>Message:</b><br/>",stripslashes($message),"<br>";
if (strlen($comment)>1) {echo "<br/><b>GM comment: <i>",stripslashes($comment),"</i></b>";}
echo "<hr/>";
}
die("<a href=\"gmpages.php\">back</a>");
}

if ($msgsent==1) {echo "<b><font color=\"darkgreen\">In-game message was sent to user.</font></b><br/><br/>";}
if ($msgsent==2) {echo "<b><font color=\"darkgreen\">Email was sent to user. If user decides to contact us again new case will be open.</font></b><br/><br/>";}

if ($action=='read') {mysql_query("UPDATE `gm_messages` SET `gm`= $userid, `read`= 1 WHERE `id`= $id") or die(mysql_error());}
if ($action=='view') {
$result = mysql_query("SELECT * FROM gm_messages WHERE id ='$id'");
while($r=mysql_fetch_array($result))
{
$user=$r["user"];
$subject=$r["subject"];
$message=$r["message"];
$time=$r["time"];
$read=$r["read"];
$outside=$r["outside"];
$author=$r["gm"];
$comment=$r["comment"];
}

//ime
$unquery = mysql_query("SELECT username FROM users WHERE userid ='$user'");
$fromname = mysql_result($unquery,0);

//cas
$splitdatetime = explode(" ", $time);
$dbdate = $splitdatetime[0];
$dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate);
$dbyear = $splitdate[0];
$dbmonth = $splitdate[1];
$dbday = $splitdate[2];
$splittime = explode(":", $dbtime);
$dbhour = $splittime[0];
$dbmin = $splittime[1];
$dbsec = $splittime[2];
$datedisplay = date("d.m.y H:i", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));
?>

<b>Sent by:</b> <a href="club.php?clubid=<?=$user?>"><?=$fromname?></a><br/>
<b>Time:</b> <?=$datedisplay?><br/>
<b>Subject:</b> <?=$subject?><br/>
<br/><?=stripslashes($message)?><hr/>

<?php
if (strlen($comment) < 2) {echo "<font color=\"darkgreen\"><b><a href=\"gmpages.php?action=view&id=",$id,"&reply=1\">Add comment</a></b></font><br/>";}
else {
$whichgm = mysql_query("SELECT username FROM users WHERE userid ='$author'") or die(mysql_error());
$heisgm = mysql_result($whichgm,0);
echo "<b><font color=\"darkgreen\">",$comment,"</b><br/><i>(By ",$heisgm,")</i></font><hr/>";
}
$reply = $_GET['reply'];
if ($reply==1 AND strlen($comment) < 2){
?>
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="margin: 0">
<textarea rows="5" cols="22" name="cmessage" wrap="virtual"></textarea>
<input type="submit" name="submit" value="Add GM comment">
</form>
<?php
}
if ($read==0) {
if ($outside==0) {?><a href="repmsg_gm.php?return=<?=$id?>&user=<?=$user?>&send=in">Reply with ingame message</a><?php }
if ($outside==1) {?><a href="repmsg_gm.php?return=<?=$id?>&user=<?=$user?>&send=out">Reply with email message</a><?php }
?>
<br/><a href="gmpages.php?action=read&id=<?=$id?>">Mark as solved and go back</a>
<br/><a href="gmpages.php">Go back and leave unsolved</a>
<br/><a href="gmpages.php?action=view&id=<?=$id?>&psw=confirm">Send new password</a><br/>
<?php
if ($psw=='confirm') {
?>
<a href="gmpages.php?action=view&id=<?=$id?>&psw=new"><font color="green"><i>Random password will be generated and mailed to user. Use this option if new password was requested. To confirm click this link.</i></font></a><br/>
<?php
}
?>
<br><font color="darkred"><b>If you can't resolve the issue, leave it unmarked.</b></font>
<?php
} else {
$whichgm = mysql_query("SELECT username FROM users WHERE userid=$author") or die(mysql_error());
$heisgm = mysql_result($whichgm,0);
?>
<font color="darkred"><b>Issue was solved by <?=$heisgm?>.</b></font>
<br/><a href="gmpages.php">Go back</a><br/>
<?php
}
//drug else
}
else
{
?>
<font color="darkred"><b>Welcome <?=$username?>!</b></font><br/>
<font color="darkred"><b>Unsolved issues are marked with red arrow.</b></font><hr/>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
<td colspan="2" valign="top">
<table border="0" cellpadding="0" cellspacing="0">
<tr nowrap><td></td>

<td width="96"><b>From</b><hr width="200%"></td>
<td width="260"><b>Subject</b><hr/></td>
<td width="72"><b>Time</b><hr/></td></tr>

<?php
$result = mysql_query("SELECT `id`, `user`, `subject`, `message`, `time`, `read` FROM `gm_messages` ORDER BY `read` ASC, `id` DESC LIMIT 50") or die(mysql_error());
$num=mysql_num_rows($result);
$i=0;
while ($i < $num) {
$id=mysql_result($result,$i,"id");
$user=mysql_result($result,$i,"user");
$subject=mysql_result($result,$i,"subject");
$message=mysql_result($result,$i,"message");
$time=mysql_result($result,$i,"time");
$read=mysql_result($result,$i,"read");

$query1 = mysql_query("SELECT username FROM users WHERE userid ='$user' LIMIT 1") or die(mysql_error());
$mess_sent = @mysql_result($query1,0);

$splitdatetime = explode(" ", $time); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$disdate = date("d.m H:i", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));
?>

<tr><td>&nbsp;</td><td><?php if ($read == 0) {echo "<img src=img/mes.gif>&nbsp;";}?>
<a href="club.php?clubid=<?=$user?>"><?=$mess_sent?></a>&nbsp;</td>
<td><a href="gmpages.php?action=view&id=<?=$id?>"><?=$subject?></a>&nbsp;</td>
<td><nobr><?=$disdate?></nobr>&nbsp;</td></tr>

<?php
$i++;
}
?>
</table>
</td>
</tr>
</table>
</td>

<?php
//konec prikaza vseh sporocil
}
?>

<td class="border" width="43%" valign="top" bgcolor="#ffffff">
<?php
$stew=@mysql_query("SELECT * FROM teams WHERE status=0 LIMIT 1");
if (@mysql_num_rows($stew)>0) {echo "<a href=\"/admin/manage.php\" class=\"greenhilite\"><b><font color=\"red\">There are teams waiting for activation</font></b></a><br/>";}
?>
<h2>Guidelines</h2><br/>
- any GM can take care of any message<br/>
- if you can do nothing about it, leave it open<br/>
- work of GMs is stricktly confidential!<hr/>
In case of <u>harmful cheating</u> (numerous clubs with same IP and bids all over) close all clubs.<hr/>
In case of <u>other type of market cheating</u> close clubs that were used to make purchases, but leave the main club open - they will receive the message about the adjusted transfers anyway!<hr/>
In case of <u>multiple accounts</u> (don't judge by IP alone!) leave the main account open, but close the additonal accounts.<hr/>
Sometimes accounts are also made for a sole spamming purpose - close such clubs immidiately and notify me, so I can delete them.<br/><br/>

<h2>User files</h2><br/>
<i>User files serve as notes on users, just write in the username and get the full correspondance on this user together with GM comments.</i><br/>
<form method="post" action="<?=$PHP_SELF?>" style="margin: 0">
<b>Username:</b>&nbsp;<input type="text" maxlength="33" size="18" name="novime" value="<?=$naname?>" class="inputreg">
<input type="submit" value=">>" name="submit97" class="buttonreg">
</form><br/>

<h2>User requests and GM actions</h2><br/>
1.) <b>Suspicious transfer</b>: examine the player and if bid is not suspicious no further action is needed. In case of an obvious cheating adjust the transfer. If you're unsure what to do, leave it open.<br/>
2.) <b>Cheating case</b>: when cheating is reported, examine the situation and act according to findings. Messaging users back is voluntary, but very recommended in case of closed/reopened clubs.<br/>
3.) <b>Other</b>: any game-related questions you're free to answer, but it's not a must. It's good to point user to gamerules or forum.<br/>
4.) <b>If user is unable to login and he reports only blank screen popping up after the login attempts, suggest him to clear cookies or temporary use another browser!</b>

</td>
</tr>
</table>
</div>
</div>
</body>
</html>