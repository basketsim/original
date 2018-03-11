<?php
$awaysf1 = mysql_query("SELECT charac, height, weight, handling, speed, passing, vision, rebounds, position, freethrow, shooting, defense, workrate, experience, fatigue FROM players WHERE id=$away_sf1 LIMIT 1");
while ($aa=mysql_fetch_array($awaysf1))
{
$awaysf1_charac=$aa["charac"];
$awaysf1_height=$aa["height"];
$awaysf1_weight=$aa["weight"];
$awaysf1_handling=$aa["handling"];
$awaysf1_speed=$aa["speed"];
$awaysf1_passing=$aa["passing"];
$awaysf1_vision=$aa["vision"];
$awaysf1_rebounds=$aa["rebounds"];
$awaysf1_position=$aa["position"];
$awaysf1_freethrow=$aa["freethrow"];
$awaysf1_shooting=$aa["shooting"];
$awaysf1_defense=$aa["defense"];
$awaysf1_workrate=$aa["workrate"];
$awaysf1_experience=$aa["experience"];
$awaysf1_fatigue=$aa["fatigue"];
}

//verjetnost igralca da zadane met za dve
if ($awaysf1_charac < 4){$addcharac = 3;}
elseif ($awaysf1_charac > 3 AND $awaysf1_charac < 7){$addcharac = -3;}
elseif ($awaysf1_charac > 10 AND $awaysf1_charac < 14){$addcharac = 3;}
elseif ($awaysf1_charac > 16){$addcharac = -3;}
else {$addcharac = 0;}
if ($awaysf1_height < 184) {$heightbonus=-3;}
elseif ($awaysf1_height > 183 AND $awaysf1_height < 189) {$heightbonus=-1;}
elseif ($awaysf1_height > 188 AND $awaysf1_height < 193) {$heightbonus=0;}
elseif ($awaysf1_height > 192 AND $awaysf1_height < 196) {$heightbonus=1;}
elseif ($awaysf1_height > 195 AND $awaysf1_height < 210) {$heightbonus=3;}
else {$heightbonus=0;}
$awaysf1_za_dve = round(104 - ($heightbonus + ($awaysf1_speed/11) + ($awaysf1_vision/16) + ($awaysf1_position/7) + (sqrt($awaysf1_shooting*4))*0.9 - ($awaysf1_fatigue/2) + $addcharac - ($homesf1_defense/7) - ((abs($awaysf1_weight-100))/6)));

//verjetnost igralca da zadane za tri
if ($awaysf1_charac >3 AND $awaysf1_charac < 7){$addcharac =3;} elseif ($awaysf1_charac > 6 AND $awaysf1_charac < 11){$addcharac =3;} elseif ($awaysf1_charac > 16){$addcharac = -3;} else {$addcharac = 0;}
$awaysf1_za_tri= 56-(($awaysf1_speed/16)+($awaysf1_position/14)+(sqrt($awaysf1_shooting*4.5))+($awaysf1_experience/6)-($awaysf1_fatigue/2)+($awaysf1_freethow/18) +$addcharac - ($homesf1_defense/15));
if ($awaysf1_za_tri < 9) {$awaysf1_za_tri=9;}

//skok
if ($awaysf1_charac > 10 AND $awaysf1_charac < 14){$addcharac = 8;} else {$addcharac = 0;} $hkoef = 0.63 + atan($awaysf1_height/10 - 18) / M_PI;
$awaysf1_skok = round(($addcharac + ($awaysf1_weight /4) + ($awaysf1_speed /3) + ($awaysf1_position /2) + ($awaysf1_experience /5) - ($awaysf1_fatigue *2) + ($awaysf1_rebounds * 0.75)) * $hkoef);
if ($awaysf1_skok < 1) {$awaysf1_skok = 1;}
$awayteam_skok = $awaypg1_skok + $awaysg1_skok + $awaysf1_skok + $awaypf1_skok + $awayc1_skok + $reb2_oh;
if ($away_off==5) {$awayoffskok = $awayteam_skok*1.2;} else {$awayoffskok = $awayteam_skok;}
if ($away_def==3) {$awaydefskok = $awayteam_skok*2.76;} else {$awaydefskok = $awayteam_skok*2.3;}

//moznost igralca za osebno v napadu
if ($awaysf1_charac >6 && $awaysf1_charac < 11) {$addcharacter=4;} elseif ($awaysf1_charac >10 && $awaysf1_charac < 14) {$addcharacter= -5;} else {$addcharacter=0;}
$awaysf1_v_napadu = round(49 - (($awaysf1_vision /8) + ($awaysf1_position /9) - ($awaysf1_fatigue /2) + ($awaysf1_experience /5) + $addcharacter - ($homesf1_position /6) - ($homesf1_defense /7)));

//verjetnost za osebno
if ($awaysf1_charac > 6 AND $awaysf1_charac < 11) {$addcharacter = -10;} elseif ($awaysf1_charac > 10 AND $awaysf1_charac < 14) {$addcharacter = 10;} else {$addcharacter = 0;}
$awaysf1_v_obrambi = round(((160 - $awaysf1_speed) + (160 - $awaysf1_position) + (160 - $awaysf1_defense) + ((160 - $awaysf1_experience) /2) + $homesf1_speed + $homesf1_position + $addcharacter + $awaysf1_fatigue)/10)-11;

//verjetnost za TO
if ($awaysf1_charac < 4) {$addch = 100;} else {$addch = 0;} $awaysf1_napaka = round((601 + (abs($awaysf1_height-201)) + (abs($awaysf1_weight-100)) - $awaysf1_vision - $awaysf1_passing - $awaysf1_experience - $awaysf1_handling + $awaysf1_fatigue*4 + $homesf1_speed + $homesf1_defense - $addch)/10);

$awaysf1_kraja = round(($awaysf1_speed + $awaysf1_defense + 35)/10);
$awaysf1_freethrow=round($awaysf1_freethrow+$gos_vrednost+$ft2_oh);
$awaysf1_passing=$awaysf1_passing+5;
$awaysk2 = $awaypg1_za_dve + $awaysg1_za_dve + $awaysf1_za_dve + $awaypf1_za_dve + $awayc1_za_dve;
?>