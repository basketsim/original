<?php
$sezona=17;
include_once("common.php");

$league_country = $_POST["league_country"];
$league_level = $_POST["league_level"];

if ($league_level < 2) {$level_numb = 1; }
elseif ($league_level > 1 AND $league_level < 3) {$level_numb = 3; }
elseif ($league_level > 2 AND $league_level < 4) {$level_numb = 9; }
elseif ($league_level > 3 AND $league_level < 5) {$level_numb = 27; }
elseif ($league_level > 4 AND $league_level < 6) {$level_numb = 81; }
elseif ($league_level > 5 AND $league_level < 7) {$level_numb = 243;}
else $level_numb = 729;

for ($numboflg = 1; $numboflg <= $level_numb; $numboflg++) {

/* CREATE BOT TEAMS */

for ($numofteams = 1; $numofteams <= 14; $numofteams++) {
$team_numb = mt_rand(100,999);
$bname = 'Bot team no.';
$bname .= $team_numb;
$query2 = "INSERT INTO teams VALUES ('', '$bname', '$bname', 'Bot team court', '', 0, 0, '$league_country', 2, 0, 0, 0, 0, 'orange', '', 0, 0, 0, 0, 0, 0)";
$result = mysql_query($query2) or die(mysql_error());
echo "SUCCESS! Bot team added to database.<br />";

$last_id = mysql_insert_id();
$array_ID[$numofteams] = $last_id;

}

/* adding leagues to tables */

$name = $league_level.".";
$name .= $numboflg;
$create_league_request = "INSERT INTO leagues (name, country, level) VALUES ('$name', '$league_country', $league_level);";
$result = mysql_query($create_league_request);
if($result){echo "SUCCESS! League was created.<br />";} else {echo "Failed";}

//third loop

for ($m=1; $m <= 14; $m++) {
$sql = "INSERT INTO competition VALUES (last_insert_id(), $array_ID[$m], '', $sezona, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
$result49 = mysql_query($sql) or die(mysql_error());
echo "<b>Total Success!</b><br/>";
}

}
?>
<p>
<a href="new_leagues.php">back</a>
</p>