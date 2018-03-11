<?php
include_once("common.php");
$ekipe=mysql_query("SELECT DISTINCT `time`, `country`, type FROM `matches` WHERE home_score=0 ORDER BY `time` ASC");
$bum = mysql_num_rows($ekipe);
$b=0;
while ($b < $bum) {
$time=mysql_result($ekipe,$b,"time");
$country=mysql_result($ekipe,$b,"country");
echo $time," - ",$country,"<br/>";
$b++;
}
?>