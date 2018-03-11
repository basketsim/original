<?php
include_once("common.php");
checklogin();
$msg = "";
$catname = "";
$catdesc = "";
if (isset($_POST['submit'])){
$anip = $_POST["anip"];
$anip = trim($anip);
$anip = strip_tags($anip);
$anip = addslashes($anip);
$do = mysql_query("SELECT userid, username, email FROM users WHERE email LIKE '$anip' LIMIT 100");
if (mysql_num_rows($do)>0) {$k=2;} else {$k=4;}
}
?>
<div id="main">

<table border="0" cellspacing="7" cellpadding="7" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="55%">

<p><a href="index.php">Main</a></p>

<p><b>Find user by email</b></p>

<form method="post" action="<?php echo $PHP_SELF;?>" style="margin: 0">
<table width="100%">
<tr><td width="120">Enter email: </td><td><input type="text" name="anip" size="15" maxlength="25"></td></tr>
<tr><td width="120"><input type="submit" value="Search" name="submit"></td></tr>
</form>
<?php
if ($k==2) {echo "<hr/>";
while ($d = mysql_fetch_array($do)) {
echo "<a href=\"../club.php?clubid=",$d["userid"],"\">",$d["username"],"</a> (",$d["email"],")<br/>";
}
echo "<hr/>";
}
elseif ($k==4) {echo "<hr/><i>No user found</i><hr/>";}
?>
</td>
</tr>
</table>
<img src="img/bbs.jpg" alt="" border="0">
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>