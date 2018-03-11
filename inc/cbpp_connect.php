<?php

/*
$today = date("l");
if($today =='Sunday' || $today =='Saturday' || $today =='Wednesday' || $today =='Thursday') {die("null");}
*/
$server = "localhost";
$dbuser = "cbpp";
$dbpass = "nikolae98y";
$dbname = "basketsim";

mysql_connect($server,$dbuser,$dbpass) or die (mysql_error());
mysql_select_db($dbname);
?>