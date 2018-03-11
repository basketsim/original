<?php
ini_set("max_execution_time", 2500);
require_once("cron2conect.php");

mysql_query("UPDATE weight SET change =0");

$klaba = mysql_query("SELECT id, team, player FROM weight") or die(mysql_error());
while ($a = mysql_fetch_array($klaba)) {
$id = $a['id'];
$team = $a['team'];
$player = $a['player'];
$prebv = mysql_query("SELECT id FROM players WHERE id=$player AND club=$team LIMIT 1") or die(mysql_error());
if (!mysql_num_rows($prebv)) {mysql_query("UPDATE weight SET `player`=0, training=0, `focus`=0, `change`=0.0 WHERE id=$id LIMIT 1") or die(mysql_error());}
}

$pht = mysql_query("SELECT DISTINCT `player` AS player, `weight`, 10000 * weight / ( height * height ) AS `BMI`, training, focus FROM `players`, `weight` WHERE players.id = `player` AND fatigue < 30 AND injury <1 AND club = team");
while ($k = mysql_fetch_array($pht)) {
$player = $k['player'];
$weight = $k['weight'];
$BMI = $k['BMI'];
$training = $k['training'];
$focus = $k['focus'];

if ($training==1 && $focus==1 && $BMI<=19) {$tir=rand(0,1); $add=-0.2;}
elseif ($training==1 && $focus==1 && $BMI>19 && $BMI<=30) {$tir=rand(0,1); $add=-0.2;}
elseif ($training==1 && $focus==1 && $BMI>30) {$tir=rand(0,1); $add=-0.3;}
elseif ($training==1 && $focus==2 && $BMI<19) {$tir=rand(0,1); $add=-0.3;}
elseif ($training==1 && $focus==2 && $BMI>19 && $BMI<=30) {$tir=1; $add=-0.3;}
elseif ($training==1 && $focus==2 && $BMI>30) {$tir=1; $add=-0.4;}
elseif ($training==2 && $focus==1 && $BMI<19) {$tir=rand(0,1); $add=0.2;}
elseif ($training==2 && $focus==1 && $BMI>19 && $BMI<=30) {$tir=1; $add=0.2;}
elseif ($training==2 && $focus==1 && $BMI>30) {$tir=1; $add=-0.2;}
elseif ($training==2 && $focus==2 && $BMI<19) {$tir=2; $add=0.4;}
elseif ($training==2 && $focus==2 && $BMI>19 && $BMI<=30) {$tir=1; $add=0.4;}
elseif ($training==2 && $focus==2 && $BMI>30) {$tir=2; $add=0.2;}
elseif ($training==3 && $weight<110 && $focus==1 && $BMI<=19) {$tir=1; $add=-0.2;}
elseif ($training==3 && $weight<110 && $focus==1 && $BMI>19 && $BMI<=30) {$tir=1; $add=-0.3;}
elseif ($training==3 && $weight<110 && $focus==1 && $BMI>30) {$tir=2; $add=-0.4;}
elseif ($training==3 && $weight<110 && $focus==2 && $BMI<19) {$tir=2; $add=-0.3;}
elseif ($training==3 && $weight<110 && $focus==2 && $BMI>19 && $BMI<=30) {$tir=1; $add=-0.4;}
elseif ($training==3 && $weight<110 && $focus==2 && $BMI>30) {$tir=3; $add=-0.6;}
elseif ($training==3 && $weight>109 && $focus==1 && $BMI<=19) {$tir=2; $add=-0.2;}
elseif ($training==3 && $weight>109 && $focus==1 && $BMI>19 && $BMI<=30) {$tir=2; $add=-0.3;}
elseif ($training==3 && $weight>109 && $focus==1 && $BMI>30) {$tir=3; $add=-0.5;}
elseif ($training==3 && $weight>109 && $focus==2 && $BMI<=19) {$tir=3; $add=-0.3;}
elseif ($training==3 && $weight>109 && $focus==2 && $BMI>19 && $BMI<=30) {$tir=2; $add=-0.5;}
elseif ($training==3 && $weight>109 && $focus==2 && $BMI>30) {$tir=4; $add=-0.7;}
elseif ($training==4 && $focus==1 && $BMI<19) {$tir=1; $add=0.3;}
elseif ($training==4 && $focus==1 && $BMI>19 && $BMI<=30) {$tir=1; $add=0.2;}
elseif ($training==4 && $focus==1 && $BMI>30) {$tir=1; $add=-0.2;}
elseif ($training==4 && $focus==2 && $BMI<19) {$tir=3; $add=0.6;}
elseif ($training==4 && $focus==2 && $BMI>19 && $BMI<=30) {$tir=2; $add=0.5;}
elseif ($training==4 && $focus==2 && $BMI>30) {$tir=2; $add=0.5;}

if ($BMI < 18) {$add=0.9;}
if ($BMI > 34) {$add=-0.9;}
/*
echo $player," - TIR:",$tir," ADD:",$add," (",$wid,")<br/>";
*/
mysql_query("UPDATE players SET `weight`=`weight`+$add, fatigue=fatigue+$tir WHERE id=$player LIMIT 1") or die(mysql_error());
mysql_query("UPDATE `weight` SET `change`=$add WHERE player=$player LIMIT 1") or die(mysql_error());
}
mysql_query("DELETE FROM `weight` WHERE `change`=0");

//cena
$laba = mysql_query("SELECT distinct `id_team` as `tim`, `current_level` FROM `medical_center` WHERE current_level > 0") or die(mysql_error());
while ($dc = mysql_fetch_array($laba)) {
$tim = $dc['tim'];
$clc = $dc['current_level'];
$zzena = mysql_query("SELECT * FROM `weight` WHERE `team`='$tim'") or die(mysql_error());
if (mysql_num_rows($zzena)) {
$fpric=mysql_num_rows($zzena)*$clc*100;
$iddl = number_format(round($fpric), 0, ',', '.');
mysql_query("INSERT INTO events VALUES ('', $tim, NOW(), 'Weekly gym rental costs were paid in total of $iddl &euro;.', 1, -$fpric);");
mysql_query("UPDATE teams SET curmoney=curmoney-$fpric WHERE teamid=$tim LIMIT 1") or die(mysql_error());
} else {$fpric=0;}
}

echo "Physical training OK";
?>