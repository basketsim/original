<?php
$awayc1 = mysql_query("SELECT charac, height, weight, handling, speed, passing, vision, rebounds, position, freethrow, shooting, defense, workrate, experience, fatigue FROM players WHERE id=$away_c1 LIMIT 1");
while ($aa=mysql_fetch_array($awayc1))
{
$awayc1_charac=$aa["charac"];
$awayc1_height=$aa["height"];
$awayc1_weight=$aa["weight"];
$awayc1_handling=$aa["handling"];
$awayc1_speed=$aa["speed"];
$awayc1_passing=$aa["passing"];
$awayc1_vision=$aa["vision"];
$awayc1_rebounds=$aa["rebounds"];
$awayc1_position=$aa["position"];
$awayc1_freethrow=$aa["freethrow"];
$awayc1_shooting=$aa["shooting"];
$awayc1_defense=$aa["defense"];
$awayc1_workrate=$aa["workrate"];
$awayc1_experience=$aa["experience"];
$awayc1_fatigue=$aa["fatigue"];
}

//verjetnost igralca da zadane met za dve
if ($awayc1_charac < 4){$addcharac = 3;}
elseif ($awayc1_charac > 3 AND $awayc1_charac < 7){$addcharac = -3;}
elseif ($awayc1_charac > 10 AND $awayc1_charac < 14){$addcharac = 3;}
elseif ($awayc1_charac > 16){$addcharac = -2;}
else {$addcharac = 0;}
if ($awayc1_height < 196) {$heightbonus=-5;}
elseif ($awayc1_height > 195 AND $awayc1_height < 199) {$heightbonus=-3;}
elseif ($awayc1_height > 198 AND $awayc1_height < 203) {$heightbonus=-1;}
elseif ($awayc1_height > 202 AND $awayc1_height < 208) {$heightbonus=2;}
else {$heightbonus=5;}
$awayc1_za_dve = round(98 - ($heightbonus + ($awayc1_speed/11) + ($awayc1_position/7) + (sqrt($awayc1_shooting*4))*0.9 - ($awayc1_fatigue/2) + $addcharac - ($homec1_defense/9) - ((abs($awayc1_weight-115))/7)));

//skok
if ($awayc1_charac > 10 AND $awayc1_charac < 14){$addcharac = 8;} else {$addcharac = 0;} $hkoef = 0.7 + atan($awayc1_height/9 - 22) / M_PI;
$awayc1_skok = round(($addcharac + ($awayc1_weight /4) + ($awayc1_speed /3) + ($awayc1_position /2) + ($awayc1_experience /5) - ($awayc1_fatigue *2) + $awayc1_rebounds) * $hkoef);
if ($awayc1_skok < 1) {$awayc1_skok = 1;}
$awayteam_skok = $awaypg1_skok + $awaysg1_skok + $awaysf1_skok + $awaypf1_skok + $awayc1_skok + $reb2_oh;
if ($away_off==5) {$awayoffskok = $awayteam_skok*1.2;} else {$awayoffskok = $awayteam_skok;}
if ($away_def==3) {$awaydefskok = $awayteam_skok*2.76;} else {$awaydefskok = $awayteam_skok*2.3;}

//moznost igralca za osebno v napadu
if ($awayc1_charac >6 && $awayc1_charac < 11) {$addcharacter=4;} elseif ($awayc1_charac >10 && $awayc1_charac < 14) {$addcharacter= -5;} else {$addcharacter=0;}
$awayc1_v_napadu = round(49 - (($awayc1_vision /9) + ($awayc1_position /9) - ($awayc1_fatigue /2) + ($awayc1_experience /5) + $addcharacter - ($homec1_position /6) - ($homec1_defense /6)));

//verjetnost za osebno
if ($awayc1_charac > 6 AND $awayc1_charac < 11) {$addcharacter = -10;} elseif ($awayc1_charac > 10 AND $awayc1_charac < 14) {$addcharacter = 10;} else {$addcharacter = 0;}
$awayc1_v_obrambi = round(((160 - $awayc1_speed) + (160 - $awayc1_position) + (160 - $awayc1_defense) + ((160 - $awayc1_experience) /2) + $homec1_speed + $homec1_position + $addcharacter + $awayc1_fatigue)/10)-11;

//verjetnost za TO
if ($awayc1_charac < 4) {$addch = 100;} else {$addch = 0;}
$awayc1_napaka = round((614 - $awayc1_position - $awayc1_passing - $awayc1_experience - $awayc1_handling + $awayc1_fatigue*4 + $homec1_speed + $homec1_defense - $addch)/10);

$awayc1_kraja = round(($awayc1_speed + $awayc1_defense - 9)/12);
$awayc1_freethrow=round($awayc1_freethrow+$gos_vrednost+$ft2_oh);
$awaysk2 = $awaypg1_za_dve + $awaysg1_za_dve + $awaysf1_za_dve + $awaypf1_za_dve + $awayc1_za_dve;
?>