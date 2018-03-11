<?php
ini_set("max_execution_time", 3600);
require_once("cron2conect.php");
$drzavazdaj = 'Denmark';
$tetekme = mysql_query("SELECT `time` FROM `matches` WHERE `crowd1`=0 AND home_score=0 AND `country`='$drzavazdaj' ORDER BY `time` ASC LIMIT 1") or die(mysql_error());
$datumzazdaj = mysql_result($tetekme,0);
require('runlm.php');
?>