<?php
$default_season=22;
$sezonus=22;

$server = "localhost";
$dbuser = "root";
$dbpass = "qweqwe";
$dbname = "basketsim";

mysql_connect($server,$dbuser,$dbpass) or die (mysql_error());
mysql_select_db($dbname);
?>