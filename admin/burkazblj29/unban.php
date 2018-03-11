<?php
require_once('cron2conect.php');
$danesni = date("Y-m-d H:i:s");
$pl = mysql_query("SELECT `userid` FROM `users` WHERE `s_time` <= '$danesni' AND `s_time` NOT LIKE '0000-00-00 00:00:00'");
$knd = 0;
while ($knd < mysql_num_rows($pl)) {
$kuplaj = mysql_result($pl,$knd,"userid");
mysql_query("UPDATE users SET `s_time`= '0000-00-00 00:00:00', `level`='1' WHERE `userid`='$kuplaj' LIMIT 1");
$knd++;
}
?>