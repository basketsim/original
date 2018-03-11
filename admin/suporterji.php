<?php
require_once('../inc/conect.php');

$piuka = mysql_query("SELECT DISTINCT country FROM teams");
$f=0;
while ($f<mysql_num_rows($piuka)) {
$timi = mysql_result($piuka,$f);
$neka = mysql_query("SELECT users.userid FROM users, teams WHERE users.club=teams.teamid AND teams.country='$timi'");
$nek1 = mysql_query("SELECT users.userid FROM users, teams WHERE users.club=teams.teamid AND teams.country='$timi' AND users.supporter=1");
echo $timi," - ",round(mysql_num_rows($nek1)/mysql_num_rows($neka)*100,1),"<br/>";
$f++;
}


echo "<br/><hr/><br/>";
//št. userjev v vsaki državi - določanje arraya za draft
$ena = mysql_query("SELECT DISTINCT country AS country FROM regions");
while ($a = mysql_fetch_array($ena)){
$country = $a["country"];
$d = mysql_query("SELECT userid FROM teams, users WHERE teams.teamid = users.club AND teams.status=1 AND teams.country LIKE '$country'");
$uh = mysql_query("SELECT teamid FROM teams WHERE country LIKE '$country'");
echo $country," - ",100*(mysql_num_rows($d)/mysql_num_rows($uh)),"<br/>";
}

?>