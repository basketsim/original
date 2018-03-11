<?php
include("common.php");
$teamid=$_GET['teamid'];
if (empty($teamid)) {die("No team.");}

$iscemuserja = mysql_query("SELECT userid FROM users WHERE club = $teamid LIMIT 1") or die(mysql_error());
$user = mysql_result($iscemuserja,0);

mysql_query("UPDATE teams SET curmoney=curmoney-100000 WHERE teamid=$teamid LIMIT 1") or die(mysql_error());

mysql_query("INSERT INTO `messages` VALUES ('', $user, 0, 0, NOW(), 'Cheating', 'You were fined 100.000 &euro; due to your attempt to create more then one club. This is not allowed and is regarded as cheating, you can only control one club in Basketsim!');") or die(mysql_error());

mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'Fined 100.000 &euro;.', 1, -100000);") or die(mysql_error());

?>
<b><font color="red">Team fined!</font></b>
<p>
<a href="manage.php">back</a>
</p>