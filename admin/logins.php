<?php
include("common.php");
checklogin();
$msg = "";
$catname = "";
$catdesc = "";
$club=$_GET["club"];
$club = trim($club);
$club = strip_tags($club);
$club = addslashes($club);
if (isset($_POST['submit1'])){
$byIP = $_POST["byIP"];
$byIP = trim($byIP);
$byIP = strip_tags($byIP);
$byIP = addslashes($byIP);
}
if (isset($_POST['submit7'])){
$diIP = $_POST["diIP"];
$diIP = trim($diIP);
$diIP = strip_tags($diIP);
$diIP = addslashes($diIP);
}
if (isset($_POST['submit2'])){
$byuser = $_POST["byuser"];
$byuser = trim($byuser);
$byuser = strip_tags($byuser);
$byuser = addslashes($byuser);
}
if (isset($_POST['submit4'])){
$iduser = $_POST["iduser"];
$iduser = trim($iduser);
$iduser = strip_tags($iduser);
$iduser = addslashes($iduser);
}
?>
<html>
<head>
<title>Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<p><a href="index.php">Main</a></p>

<i>You can search the database of all logins from 1st of August 2014 to today. This mostly helps when potential cheating transfers are examined, since transfers between clubs using same IPs are forbidden. You should keep in mind that dynamic IPs can be assigned to various users from the same network, so time of logins is important - login of two users from same IP, but 1 or 2 months apart can mean nothing. Some IPs can be very busy, especially when logins are from mobile phones or public places, so never just close people based on that! Information about past IPs must be kept confidential - it's only use is determination of cheating cases. And just one more thing - when entering userid, it's not teamid, but ID that you get from browser URL, when checking club page!</i><br/><br/>

<form method="post" action="<?=$PHP_SELF?>" style="margin: 0">
<b>Search logins from IP</b>: <input type="text" name="byIP" size="15" maxlength="15" value="<?=$byIP?>"> <input type="submit" value="Show logins" name="submit1"></form>
<form method="post" action="<?=$PHP_SELF?>" style="margin: 0">
<b>Search logins by userid</b>: <input type="text" name="byuser" size="10" maxlength="6" value="<?=$byuser?>"> <input type="submit" value="Show logins" name="submit2"></form>
<form method="post" action="<?=$PHP_SELF?>" style="margin: 0">
<b>Find unique users by IP</b>: <input type="text" name="diIP" size="15" maxlength="15" value="<?=$diIP?>"> <input type="submit" value="Show users" name="submit7"></form>

<?php
if ($byIP) {echo "<h3>Logins from IP ",$byIP,"</h3>";
$q = mysql_query("SELECT user, time, username FROM `login`, users WHERE userid=user AND `ip` LIKE '$byIP' ORDER BY logid DESC");
while ($n = mysql_fetch_array($q)) {
$user = $n['user'];
$time = $n['time'];
$name  = $n['username'];
echo "<a href=\"../club.php?clubid=",$user,"\">",$name,"</a> - ",$time,"<br/>";
}
}
if ($diIP) {echo "<h3>Distinct users from IP ",$diIP,"</h3>";
$babas="SELECT DISTINCT userid, username FROM `login`, users WHERE userid=user AND `ip` LIKE '$diIP' ORDER BY logid DESC";
$q = mysql_query($babas);
while ($n = mysql_fetch_array($q)) {
$user = $n['userid'];
$time = $n['time'];
$name  = $n['username'];
echo "<a href=\"../club.php?clubid=",$user,"\">",$name,"</a><br/>";
}
}
if ($byuser) {echo "<h3>Logins for user <a href=\"../club.php?clubid=",$byuser,"\" target=\"_new\">",$byuser,"</a></h3>";
$q = mysql_query("SELECT ip, time FROM `login` WHERE `user`='$byuser' ORDER BY logid DESC");
while ($n = mysql_fetch_array($q)) {
$ip = $n['ip'];
$time = $n['time'];
echo $time," - ",$ip,"<br/>";
}
}
?>
<br/>
<b>Check all unique IPs per user (enter userid and see all IPs he used in the past)</b>
<form method="post" action="<?=$PHP_SELF?>" style="margin: 0">
<b>Userid</b>: <input type="text" name="iduser" size="8" maxlength="8" value="<?=$iduser?>"> <input type="submit" value="Display IPs" name="submit4"></form>
<?php
if ($iduser) {echo "<h3>List of IPs used in the past by user <a href=\"../club.php?clubid=",$iduser,"\">",$iduser,"</a>:</h3>";
$q = mysql_query("SELECT ip, time FROM `login` WHERE user =$iduser GROUP BY ip ORDER BY logid DESC");
while ($n = mysql_fetch_array($q)) {
$ip = $n['ip'];
$time = $n['time'];
echo "<a href=\"logins.php?byIP=",$ip,"\">",$ip,"</a> - last used on ",$time,"<br/>";
}
}
?>