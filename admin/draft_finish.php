<?php
include("cron2conect.php");
$caszdaj = date("Y-m-d H:i:s");
$result65 = mysql_query("SELECT * FROM draft WHERE season=$default_season AND `when` < '$caszdaj' AND done=1") or die(mysql_error());
$bum=mysql_num_rows($result65);
$v=0;
while ($v < $bum) {
$pick=mysql_result($result65,$v,"pick");
$id=mysql_result($result65,$v,"player_id");
$name=mysql_result($result65,$v,"player_name");
$surname=mysql_result($result65,$v,"player_surname");
$age=mysql_result($result65,$v,"player_age");
$country=mysql_result($result65,$v,"player_country");
$height=mysql_result($result65,$v,"player_height");
$to_club=mysql_result($result65,$v,"to_club");

//dodelim
mysql_query("UPDATE players SET club=$to_club WHERE id=$id");

//obvestila
if ($to_club <> 0) {mysql_query("INSERT INTO events VALUES ('', $to_club, NOW(), '<a href=\"player.php?playerid=$id\">Player</a> was drafted.', 0, 0);");

//"prestop"
$draftpick = "Draft pick no.".$pick;
$namesee = mysql_query("SELECT name FROM teams WHERE teamid=$to_club") or die (mysql_error());
$namesee2 = mysql_result($namesee,0);
$query2 = mysql_query("SELECT userid FROM users WHERE club=$to_club") or die (mysql_error());
$linkkluba = mysql_result($query2,0);
//polozaj in cas
$pnaj = mysql_query("SELECT age, workrate, height, handling, speed, passing, vision, rebounds, position, freethrow, shooting, experience, defense FROM players WHERE id=$id") or die (mysql_error());
$age_nov = mysql_result($pnaj,0,"age");
$wr_nov = mysql_result($pnaj,0,"workrate");
$height = mysql_result($pnaj,0,"height");
$handling = mysql_result($pnaj,0,"handling");
$speed = mysql_result($pnaj,0,"speed");
$passing = mysql_result($pnaj,0,"passing");
$vision = mysql_result($pnaj,0,"vision");
$rebounds = mysql_result($pnaj,0,"rebounds");
$position = mysql_result($pnaj,0,"position");
$freethrow = mysql_result($pnaj,0,"freethrow");
$shooting = mysql_result($pnaj,0,"shooting");
$experience = mysql_result($pnaj,0,"experience");
$defense = mysql_result($pnaj,0,"defense");
$value5 = ($height * 2) + $handling + ($speed * 4) + ($passing * 2) + ($vision * 2) + ($rebounds * 3) + ($position * 4) + ($freethrow * 3) + ($shooting * 4) + ($experience * 2) + ($defense * 3);
$wage_nov = (($value5 * $value5 * $value5) / 225000) - 7500;
if ($wage_nov < 200) {$wage_nov=200;}
$vvalue = ((($wage_nov/9)*($wage_nov/9))/15)*(($wage_nov/240000+(1/(exp(pow((($age_nov-16)/10),4.1)))))*(((($wr_nov/8)+1)/19)+1))*((sqrt($wage_nov/180000))/((((tanh((($age_nov/2)-10))/2)+0.5)*0.71)+0.29));
if ($vvalue < 1000) {$vvalue=1000;}
$ranpos=mt_rand(1,5);
$ftime = time(); $fyear=date('Y', $ftime); $fmonth=date('m', $ftime); $fday=date('d', $ftime);
$fhour=date('H', $ftime); $fmin=date('i', $ftime); $fsec=date('s', $ftime);
mysql_query("INSERT INTO transfers VALUES ('', $id, '$draftpick', 0, '$country', 0, $ranpos, '$fyear=$fmonth=$fday $fhour+$fmin+$fsec', 1, $linkkluba, '$namesee2', 0, $vvalue);");
}
mysql_query("UPDATE draft SET done=0 WHERE player_id=$id");
$v++;
}
?>