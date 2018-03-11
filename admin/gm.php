<?php
if (!$_COOKIE['userid']){die(include 'basketsim.php');}

$kodazavstop=$_COOKIE['geslo'];
$usernum=$_COOKIE['userid'];

require_once('../inc/config.php');

$comparepasss = mysql_query("SELECT username, password, level FROM users WHERE userid=$usernum") or die(mysql_error());
$username = mysql_result ($comparepasss,0,"username");
$truepas = mysql_result ($comparepasss,0,"password");
$moderating = mysql_result ($comparepasss,0,"level");

if ($truepas != $kodazavstop) {die("<h1>NO GO!</h1>");}
if ($moderating < 3) {die("<h1>NO GO!</h1>");}

$club=$_GET['club'];
$act=$_GET['act'];

if ($act=='close'){
mysql_query("UPDATE users SET bad_login=99 WHERE userid=$club LIMIT 1");
mysql_query("INSERT INTO gm VALUES ('',$usernum,$club, 'Closed club.', NOW());") or die(mysql_error());
header ( "Location: ../club.php?clubid=$club" );
}

if ($act=='close1'){
mysql_query("UPDATE users SET bad_login=199 WHERE userid=$club LIMIT 1");
mysql_query("INSERT INTO gm VALUES ('',$usernum,$club, 'Closed club.', NOW());") or die(mysql_error());
header ( "Location: ../club.php?clubid=$club" );
}

if ($act=='open'){
mysql_query("UPDATE users SET bad_login=0 WHERE userid=$club LIMIT 1") or die(mysql_error());
mysql_query("INSERT INTO gm VALUES ('',$usernum,$club, 'Opened club.', NOW());");
header ( "Location: ../club.php?clubid=$club" );
}

if ($act=='reopen'){
mysql_query("UPDATE users SET bad_login=0 WHERE userid=$club LIMIT 1") or die(mysql_error());
mysql_query("INSERT INTO gm VALUES ('',$usernum,$club, 'Re-opened club.', NOW());");
header ( "Location: ../club.php?clubid=$club" );
}
?>