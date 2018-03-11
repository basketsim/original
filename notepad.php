<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT club, supporter, level, lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)==1) {
$get_team = mysql_result ($compare,0,"club");
$is_supporter = mysql_result($compare,0,"supporter");
$level = mysql_result($compare,0,"level");
$lang = mysql_result ($compare,0,"lang");
}
else {die(include 'basketsim.php');}
if ($is_supporter <>1 && $level==1) {die(include 'supporter.php');}

if (isset($_POST['submit'])) {
$message = $_POST['message'];
//$message = addslashes($message);
//$message = htmlspecialchars(stripslashes($message));
$message = mysql_real_escape_string($message);
$content1 = mysql_query("SELECT `content` FROM notepad WHERE owner ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($content1)>0) {mysql_query("UPDATE `notepad` SET `content` ='$message' WHERE owner ='$userid' LIMIT 1") or die(mysql_error());}
else {mysql_query("INSERT INTO `notepad` VALUES ($userid, '$message');") or die(mysql_error());}
}
$content = mysql_query("SELECT `content` FROM `notepad` WHERE owner ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($content)>0) {$helena=mysql_result($content,0);}
require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>
<div id="main">
<h2><?=$langmark1254," - ",$langmark1255?></h2>
<table border="0" cellpadding="9" cellspacing="9" width="100%">
<tr>
<td class="border" width="100%" bgcolor="#ffffff">
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="margin: 0">
<textarea style="width:98%;padding:1px;border-style:solid;border-color:darkred;background-color:#F5F5F5;" rows="29" cols="109" name="message" wrap="soft"><?=stripslashes($helena)?></textarea>
<br/><input type="submit" value="<?=$langmark1256;?>" name="submit" class="buttonreg">
</form>
</td>
</tr>
</table>
</div>
</div>
</body>
</html>