<?php
$suzona=22;
$sez=22;

$kodazavstop=$_COOKIE['geslo'];
$userid=$_COOKIE['userid'];
if (!is_numeric($userid)) {header("Location: http://www.basketsim.com"); die();}
if ($userid=='1' && $kodazavstop=='cfba8eb8f7054db1bf1b8d6da59d3ca3') {$pisuka='vstopON';}
elseif ($userid=='36' && $kodazavstop=='39f3870c350982f1ffd1b10305c6daf6') {$pisuka='vstopON';}
elseif ($userid=='850' && $kodazavstop=='5ba9790b313ce586764c58d57a55d0ab') {$pisuka='vstopON';}
elseif ($userid=='1490' && $kodazavstop=='f84e7a986f9333140c8bb6148076e32a') {$pisuka='vstopON';}
elseif ($userid=='2590' && $kodazavstop=='738405c031d2b41eca7c07f8dc31164c') {$pisuka='vstopON';}
elseif ($userid=='3147' && $kodazavstop=='118f2fad19d637bb21011bfbdf8daa20') {$pisuka='vstopON';}
elseif ($userid=='5402' && $kodazavstop=='f2321e52b307a30950095e2e6d7c4e9b') {$pisuka='vstopON';}
elseif ($userid=='9119' && $kodazavstop=='3bd21ee36f13300d12757624024744be') {$pisuka='vstopON';}
if ($pisuka <> 'vstopON') {header("Location: http://www.basketsim.com"); die();}

function checklogin()
{
	session_start();
	if(!isset($_SESSION['adminok']))
	die(include 'login.php');
}
require_once("../inc/config.php");
$puter = mysql_query("SELECT `level`, `username` FROM `users` WHERE `userid`='$userid'");
$p=0;
while ($p < mysql_num_rows($puter)){
$levell = mysql_result($puter,$p,"level");
$usernam = mysql_result($puter,$p,"username");
if ($levell<>3) {header("Location: Http://www.basketsim.com");die();}
$p++;
}
?>