<?php
$teamid = $_GET["teamid"];
if (!is_numeric($teamid)) {die(include 'index.php');}
include_once('inc/config.php');
$bot = mysql_query("SELECT status FROM teams WHERE teamid ='$teamid' LIMIT 1");
if (!mysql_fetch_row($bot)) {die(include 'index.php');} //no such team
$ekipa = mysql_result($bot,0);
if ($ekipa==1) {
$uzer = mysql_query("SELECT userid FROM users WHERE club ='$teamid' LIMIT 1");
$teamid = mysql_result($uzer,0);
header ( "Location: club.php?clubid=$teamid" ); die();
}
header ( "Location: team.php?clubid=$teamid" );
?>