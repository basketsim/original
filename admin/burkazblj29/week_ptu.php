<?php
ini_set("max_execution_time", 3000);
require_once('cron2conect.php');
//medical centri - utrujenost
$mcf = mysql_query("SELECT id_team, current_level FROM medical_center WHERE current_level >0 ORDER BY id_team ASC") or die(mysql_error());
while ($u=mysql_fetch_array($mcf)) {
$id_team = $u[id_team];
$dodatek = $u[current_level];
mysql_query("UPDATE players SET fatigue=fatigue-$dodatek WHERE club='$id_team'") or die(mysql_error());
echo $id_team."_";
}

//coaches
mysql_query("UPDATE players SET motiv=motiv-0.12 WHERE charac < 4 AND club != 0 AND coach=1") or die("Ne updata trenerjev.");
mysql_query("UPDATE players SET motiv=motiv-0.18 WHERE charac > 3 AND charac < 11 AND club != 0 AND coach=1") or die("Ne updata trenerjev.");
mysql_query("UPDATE players SET motiv=motiv-0.15 WHERE charac > 10 AND charac < 17 AND club != 0 AND coach=1") or die("Ne updata trenerjev.");
mysql_query("UPDATE players SET motiv=motiv-0.21 WHERE charac > 16 AND club != 0 AND coach=1") or die("Ne updata trenerjev.");
mysql_query("UPDATE players SET motiv=motiv-0.14 WHERE age < 37 AND club != 0 AND coach=1") or die("Ne updata trenerjev.");
mysql_query("UPDATE players SET motiv=motiv-0.11 WHERE age > 36 AND age < 57 AND club != 0 AND coach=1") or die("Ne updata trenerjev.");
mysql_query("UPDATE players SET motiv=motiv-0.15 WHERE age > 56 AND age < 64 AND club != 0 AND coach=1") or die("Ne updata trenerjev.");
mysql_query("UPDATE players SET motiv=motiv-0.21 WHERE age > 63 AND club != 0 AND coach=1") or die("Ne updata trenerjev.");
?>