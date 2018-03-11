<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT username, lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)==1) {
$username = mysql_result ($compare,0,"username");
$lang = mysql_result ($compare,0,"lang");
}
else {die(include 'basketsim.php');}

//obrazec
if (isset($_POST['submit'])) {
$csubject = $_POST["csubject"];
if (!is_numeric($csubject)) {header('Location: gmcontact.php');die();}
if ($csubject > 4 OR $csubject < 0) {header('Location: gmcontact.php');die();}
$cmessage = $_POST["cmessage"];
if(strlen($cmessage) < 8) {header("Location: gmcontact.php?error=mts");die();}
$cmessage = nl2br($cmessage);
if ($csubject==0){$opis='Cheating case';}
if ($csubject==1){$opis='Other issues';}
if ($csubject==3){$opis='Same computer';}
if ($csubject==4){$opis='Bug report';}
if ($csubject==0 OR $csubject==1 OR $csubject==3 OR $csubject==4){
$cmessage = strip_tags($cmessage);
$cmessage = nl2br($cmessage);
$cmessage = mysql_real_escape_string($cmessage);
if ($userid==54313) {$query = "INSERT INTO messages VALUES ('', 1, 0, 0, NOW(), '$opis', '$cmessage')";} else {$query = "INSERT INTO gm_messages VALUES ('', $userid, '$opis', '$cmessage', NOW(), 0, 0, 0, '')";}
mysql_query($query) or die(mysql_error());
header("Location: gmcontact.php?error=ok");
}
if ($csubject==2){
$query = "INSERT INTO messages VALUES ('', 1, $userid, 0, NOW(), 'Payment issue', '$cmessage')";
mysql_query($query) or die("Failed. Please try again");
header("Location: gmcontact.php?error=ok1");
}
}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>
<h2><?=$langmark204?></h2>

<table cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="57%">
<?=$langmark205?><br/>

<br/><b><?=$langmark206?></b><br/>
<?=$langmark207?> <a href="indexconf.php"><?=$langmark209?></a>.<br/>
<?=$langmark210?> <a href="gamerules.php"><?=$langmark211?></a>.<br/>

<br/>
<?php
$error=$_GET['error'];
if ($error=='mts') {echo "<b><font color=\"red\">",$langmark212,"</font></b>";}
if ($error=='ok') {echo "<b><font color=\"green\">",$langmark213,"</font></b>";}
if ($error=='ok1') {echo "<b><font color=\"green\">",$langmark214,"</font></b>";}
?>
<form method="post" action="<?=$_SERVER['PHP_SELF']?>" style="margin: 0">
<i><?=$langmark215?>:</i><br/>
<select name="csubject" class="inputreg">
<option value="0"><?=$langmark216?></option>
<option value="3"><?=$langmark282?></option>
<option value="4">Bug report</option>
<option value="2"><?=$langmark217?></option>
<option value="1"><?=$langmark218?></option>
</select><br/>
<textarea rows="6" cols="25" name="cmessage" wrap="virtual" class="inputreg"></textarea><br/>
<input type="submit" value="<?=$langmark219?>" name="submit" class="buttonreg">
</form>
</td>
<td class="border" width="43%">
<h2><?=$langmark220?></h2><br/>
<?=$langmark221?> <a href="transfermarket.php?cheat=1"><?=$langmark222?></a> <?=$langmark223?>. <?=$langmark224?><br/><br/><?=$langmark225?>
</td>
</tr>
</table>
</div>
</div>
</body>
</html>