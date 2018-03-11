<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}
$compare = mysql_query("SELECT lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)) {$lang = mysql_result($compare,0);} else {die(include 'basketsim.php');}

require("inc/lang/".$lang.".php");

$action=$_GET['action'];
if ($action=='deleteall'){
if (!is_numeric($userid)){die(include 'basketsim.php');}
mysql_query("DELETE FROM messages WHERE to_id=$userid ORDER BY msgid DESC LIMIT 500") or die(mysql_error());
}

//message
if (isset($_POST['submit'])) {
$message = $_POST["message"];
$ruser = $_POST["ruser"];
$ruser=strip_tags($ruser);
$ruser=str_replace(" ","",$ruser);
$ruser=addslashes($ruser);
$iskanje = mysql_query("SELECT `userid`, `lang` FROM `users` WHERE `username`='$ruser' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($iskanje)==1) {$prejemnik = mysql_result($iskanje,0,"userid"); $lang1 = mysql_result($iskanje,0,"lang");} else {$message = urlencode($message); header( "Location: messages.php?action=compose&error=nu&mes=$message" ); die ();}
$title = trim($_POST["title"]);
if (!$title AND $lang1 != $lang) {$title = "(no subject)";}
if (!$title AND $lang1 == $lang) {$title = "(".$langmark517.")";}
if (!$message) {header("Location: messages.php?action=compose&error=em"); die();}
$title=strip_tags($title);
$title=mysql_real_escape_string($title);
$message = strip_tags($message);
$message = nl2br($message);
$message = mysql_real_escape_string($message);
//spam
$alije = stristr($message,"powerplaymanager");
if (strlen($alije)>0) {mysql_query("INSERT INTO messages VALUES ('', 1, $userid, 0, NOW(), '$title', '$message')") or die(mysql_error());}
$alije1 = stristr($message,"teamhb");
if (strlen($alije1)>0) {mysql_query("INSERT INTO messages VALUES ('', 1, $userid, 0, NOW(), '$title', '$message')") or die(mysql_error());}
elseif (($prejemnik==3107 AND $userid==89189) OR ($prejemnik==89189 AND $userid==3107)) {@mysql_query("INSERT INTO messages VALUES ('', 1, 0, 0, NOW(), '$title', '$message')");}
else {mysql_query("INSERT INTO messages VALUES ('', $prejemnik, $userid, 0, NOW(), '$title', '$message')") or die(mysql_error());}
{header("Location: messages.php?action=compose&error=ok"); die ();}
}

include_once('inc/header.php');
include_once('inc/osnova.php');
?>
<div id="main">
<h2><?=$langmark338?></h2>

<table cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="68%">

<?php
//nov
if ($action=='compose') {
?>
<b><?=$langmark355?>:</b><br/>
<?php
$error=$_GET["error"];
if ($error=='nu') {echo "<font color=\"darkred\"><b>",$langmark356,"</b></font><br/>";}
if ($error=='em') {echo "<font color=\"darkred\"><b>",$langmark357,"</b></font><br/>";}
if ($error=='ok') {echo "<font color=\"darkgreen\"><b>",$langmark358,"</b></font><br/>";}
?>
<hr/><form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="margin: 0">
<?=$langmark359?> <input style="padding:1px;border-style:solid;border-color:darkred;background-color:#F5F5F5;" type="text" size="10" maxlength="30" name="ruser"> <i>(<?=$langmark360?>)</i><br/>
<?=$langmark341?>: <input style="padding:1px;border-style:solid;border-color:darkred;background-color:#F5F5F5;" type="text" size="23" maxlength="35" name="title"><br/>
<textarea style="width:98%;padding:1px;border-style:solid;border-color:darkred;background-color:#F5F5F5;" rows="16" name="message" wrap="soft" onKeyDown="limitText(this.form.message,this.form.countdown,1000);" 
onKeyUp="limitText(this.form.message,this.form.countdown,1000);"></textarea><br/>
<input readonly type="text" name="countdown" size="3" value="1000" style="padding:1px;border-style:solid;border-color:darkred;background-color:#F5F5F5;">
<input type="submit" value="<?=$langmark219?>" name="submit" class="buttonreg">
</form>
<?php
}
elseif ($action == 'more'){
$query = "SELECT `msgid`, `username`, `from_id`, `read`, `time`, `title` FROM `messages` LEFT JOIN `users` ON `userid` = `from_id` WHERE `to_id` ='$userid'"; $shrew=1000;
} else {
$query = "SELECT `msgid`, `username`, `from_id`, `read`, `time`, `title` FROM `messages` LEFT JOIN `users` ON `userid` = `from_id` WHERE `to_id` ='$userid'"; $shrew=25;
}
if ($action <>'compose') {
?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
<td colspan="3" valign="top">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr nowrap>
<td width="100" align="left"><b><?=$langmark340?></b></td>
<td width="205"><b><?=$langmark341?></b></td>
<td width="85"><b><?=$langmark342?></b></td></tr>
<tr><td colspan="3"><hr/></td></tr>
<?php
function multisort($array, $tag=1, $limit=10, $sort_by, $key1, $key2=NULL, $key3=NULL, $key4=NULL, $key5=NULL, $key6=NULL, $key7=NULL, $key8=NULL){
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
if (isset($key7)){
$return_array[$pos][$key7] = $array[$pos][$key7];
}
if (isset($key8)){
$return_array[$pos][$key8] = $array[$pos][$key8];
}
$i++;
}
}
return $return_array;
}

$resultev = mysql_query($query);
$all_info = array();
while ($get_info = mysql_fetch_row($resultev)){
$all_info[] = $get_info;
$smoga=$smoga+1;
}

if ($smoga > 0) {
$all_info = multisort($all_info,2,$shrew,'0','1','2','3','4','5','6','7','8');
foreach($all_info as $get_info) {
$splitdatetime = explode(" ", $get_info[4]); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$disdate = date("d.m.y H:i", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));
?>
<tr width="100%" onmouseover="style.backgroundColor='#F5DEB3';" onmouseout="style.backgroundColor='white'"><td align="left"><?php if ($get_info[3]==0) {echo "<img src=img/mes.gif> ";}
if ($get_info[2]==0 AND $get_info[5]<>'New player found') { ?>Administration&nbsp;</td>
<?php } elseif ($get_info[2]==0 AND $get_info[5]=='New player found'){ ?>Scouting&nbsp;service&nbsp;</td>
<?php } else { ?><a href="club.php?clubid=<?=$get_info[2]?>"><?=$get_info[1]?></a>&nbsp;</td>
<?php } ?>
<td><a href="message.php?messageid=<?=$get_info[0]?>"><?=stripslashes($get_info[5])?></a>&nbsp;</td>
<td><?=$disdate?>&nbsp;</td><td><a href="message.php?messageid=<?=$get_info[0]?>&action=delmsg&url=<?=$action?>"><img src="img/recybin.jpg" alt="delete" title="<?=$langmark354?>" border="0" height="16"></a></td></tr>
<?php
$num=$num+1;
}
}
?>
</table>
</td>
</tr>
</table>
<?php if ($num > 24 AND $action <> 'more') {echo "<table width=\"100%\"><td align=\"left\"><a href=\"messages.php?action=more\">",$langmark231,"</a></td></table>";}?>
<?php if ($action=='more') {echo "<table width=\"100%\"><td align=\"left\"><a href=\"messages.php\">",$langmark230,"</a></td></table>";}?>
<?php
//konec primera da ni nov
}
$msgs = @mysql_query("SELECT COUNT(*) FROM `messages` WHERE to_id=$userid");
list($stevilo) = @mysql_fetch_row($msgs);
?>
</td><td class="border" width="32%">
<h2><?=$langmark343?></h2><br/>
<?php if ($action<>'compose') {echo $langmark344," (",$stevilo,")";} else { ?><a href="messages.php"><?=$langmark344?></a><?php } ?><br/>
<a href="smessages.php"><?=$langmark345?></a>
<br/><br/>
<?php if($action<>'compose'){?><a href="messages.php?action=compose"><?=$langmark361?></a><?php }?>
<?php if($action<>'askdelete' AND $num>0){?><br/><br/><a href="messages.php?action=askdelete">Delete all messages</a><?php }
if ($action=='askdelete'){echo "<br/><br/><font color=\"darkred\"><b>Confirm your decision!<br/><a href=\"messages.php?action=deleteall\">Yes, delete all my messages</a><br/><a href=\"messages.php\">No, I want to keep them</a></font></b>";}
if($action<>'compose'){?><br/><br/><i>All messages are private, never post them in statements, forums, leagueboards or elsewhere!</i><?php }?>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>