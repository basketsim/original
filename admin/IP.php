<?php
include_once("common.php");
checklogin();
$msg = "";
$catname = "";
$catdesc = "";
if (isset($_POST['submit'])){
$anip = $_POST["banip"];
$anip = trim($anip);
$anip = strip_tags($anip);
$anip = addslashes($anip);
if (strlen($anip)>9 && strlen($anip)<16) {$res = mysql_query("INSERT INTO `baned_ips` (`address` ) VALUES ('$anip');");}
if ($res) {echo "<font color=\"green\"><b>Success! IP ",$anip," was banned from the game.</b></font>";} else {echo "<font color=\"red\"><b>Failed, check the format of IP, try again and if it still doesn't work, notify me.</b></font>"; $def = $anip;}
}
?>
<html>
<head>
<title>Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<p><a href="index.php">Main</a></p>
<h3>Here you can ban an IP</h3>
<i>Occasionally you will notice same person creating 10 or more clubs in less then an hour. Another scenario is when user keeps making multiple accounts even if he was previously fined for it on several occasions. The third possible scenario is when there are many clubs from same IP involved in a bad cheating case. In such cases it's appropriate to ban IP and prevent users from registering. If dynamic IPs are used and banning IPs doesn't help, send me a notice and I will temporarely ban the network or apply another solution.</i>
<br/><br/>
<form method="post" action="<?=$PHP_SELF?>" style="margin: 0">
<b>Ban IP:</b>
<input type="text" name="banip" size="18" value="<?=$def?>">
<input type="submit" value="ban" name="submit">
</form>
<?php
$action = $_GET['action'];
if ($action<>check) {
?>
<small>Here you can <a href="IP.php?action=check">check the list of banned IPs</a> (if same IP is banned twice it's not a problem).</small>
<br/><br/>
<i>Sometimes users create clubs in more then one country for the purpose of cheating. To determine location of an IP use <a href="http://www.ip2location.com/free.asp" target="_new">this tool</a> or <a href="
http://whatismyipaddress.com/staticpages/index.php/lookup-ip" target="_new">this tool</a>. The use of this tool shouldn't be mentioned to users who were caught cheating, as revealing any of our methods will only cause them to cheat better.</i>
<?php } else {?>
<a href="IP.php">switch back to normal view</a>
<br/><h3>List of banned IPs:</h3>
<?php
$t = mysql_query("SELECT `address` FROM `baned_ips` ORDER BY `address` ASC");
while ($r = mysql_fetch_array($t)) {
echo $r["address"],"<br/>";
}
}
?>