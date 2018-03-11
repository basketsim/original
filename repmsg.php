<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$comparepa = mysql_query("SELECT lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($comparepa)) {$lang = mysql_result ($comparepa,0,"lang");} else {die(include 'basketsim.php');}
require("inc/lang/".$lang.".php");

//komu se replyja
$id=$_GET['id'];
if (empty($id)) {die(include 'index.php');}
$gnh = mysql_query("SELECT `from_id`, `title`, `message`FROM `messages` WHERE `msgid`='$id' LIMIT 1");
if (!mysql_num_rows($gnh)) {header('Location: messages.php'); die();}
$fromidlast = mysql_result($gnh,0, "from_id");
$mestit = mysql_result($gnh, 0, "title");
$mesagetit = mysql_result($gnh, 0, "message");
$mesagetit = stripslashes($mesagetit);

$querydve = mysql_query("SELECT username, lang FROM `users` WHERE `userid`='$fromidlast' LIMIT 1");
if (!mysql_num_rows($querydve)) {header('Location: messages.php'); die();}
$unlast = mysql_result($querydve,0,"username");
$lang1 = mysql_result($querydve,0,"lang");

//sporocilo
if (isset($_POST['submit'])) {
$title = $_POST["title"];
$message = $_POST["message"];
if (!$title AND $lang1 <> $lang) {$title = "(no subject)";}
if (!$title AND $lang1 == $lang) {$title = "(".$langmark517.")";}
if (!$message AND $lang1 <> $lang) {$message="[empty message]";}
if (!$message AND $lang1 == $lang) {$message="[".$langmark518."]";}
$title=strip_tags($title);
$title=mysql_real_escape_string($title);
$message = strip_tags($message);
$message = nl2br($message);
$message = mysql_real_escape_string($message);

if ($userid<>'2160000') {$result = mysql_query("INSERT INTO messages VALUES ('', $fromidlast, $userid, 0, NOW(), '$title', '$message')");
$newmid = mysql_insert_id();
header("Location: message.php?messageid=$newmid");
}
}
include_once('inc/header.php');
include_once('inc/osnova.php');
?>
<h2><?=$langmark741?></h2>
<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border">
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="margin: 0">
<?=$langmark742,": <a href=\"club.php?clubid=",$fromidlast,"\">",$unlast?></a><br/>
<?=$langmark341;?>: <input style="padding:1px;border-style:solid;border-color:darkred;background-color:#F5F5F5;" type="text" size="24" maxlength="35" name="title" value="<?php $kulpul = str_replace('Re: ', '', $mestit); echo "Re: ".stripslashes($kulpul);?>"><br/>
<textarea style="width:80%;padding:1px;border-style:solid;border-color:darkred;background-color:#F5F5F5;" rows="16" name="message" wrap="soft" onKeyDown="limitText(this.form.message,this.form.countdown,1000);" 
onKeyUp="limitText(this.form.message,this.form.countdown,1000);">><?=strip_tags($mesagetit)?></textarea><br/>
<input readonly type="text" name="countdown" size="3" value="1000" style="padding:1px;border-style:solid;border-color:darkred;background-color:#F5F5F5;">
<input type="submit" value="<?=$langmark219?>" name="submit" class="buttonreg">
</form>

<?php
$laj = mysql_query("SELECT msgid, from_id, `read`, `time`, `message` FROM messages WHERE (to_id =$fromidlast AND from_id =$userid) OR (to_id =$userid AND from_id =$fromidlast) AND msgid<>$id ORDER BY msgid DESC LIMIT 50");
$mll = mysql_num_rows($laj);
if ($mll > 0) {echo "<br/><br/><h2>Conversation with ".$unlast.":</h2><hr/>";}
$wv=0;
while ($wv < $mll) {
$msgid = mysql_result($laj,$wv,"msgid");
$from = mysql_result($laj,$wv,"from_id");
$readz = mysql_result($laj,$wv,"read");
$timus = mysql_result($laj,$wv,"time");
$mesageg = mysql_result($laj,$wv,"message");
echo "-".($wv+1)."/".$mll."-";
if ($from==$userid) {$tekzt='sent by you'; $coloz='black'; $tekzt2='sent';} else {$tekzt='read now'; $coloz='darkred'; $tekzt2='received';}
if ($readz==0) {echo "&nbsp;<font color=\"",$coloz,"\"><b>UNREAD (<a href=\"message.php?messageid=",$msgid,"\" target=\"_blank\">",$tekzt,"</a>)</b></font>";}
if ($readz==1) {echo "&nbsp;[",$tekzt2,"]";}
echo "<hr/><b>".$timus."</b><br/>".stripslashes($mesageg)."<hr/>";
$wv++;
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