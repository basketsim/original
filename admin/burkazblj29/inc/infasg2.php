<?php
$awaysg1 = mysql_query("SELECT charac, height, weight, handling, speed, passing, vision, rebounds, position, freethrow, shooting, defense, workrate, experience, fatigue FROM players WHERE id=$away_sg1 LIMIT 1");
while ($aa=mysql_fetch_array($awaysg1))
{
$awaysg1_charac=$aa["charac"];
$awaysg1_height=$aa["height"];
$awaysg1_weight=$aa["weight"];
$awaysg1_handling=$aa["handling"];
$awaysg1_speed=$aa["speed"];
$awaysg1_passing=$aa["passing"];
$awaysg1_vision=$aa["vision"];
$awaysg1_rebounds=$aa["rebounds"];
$awaysg1_position=$aa["position"];
$awaysg1_freethrow=$aa["freethrow"];
$awaysg1_shooting=$aa["shooting"];
$awaysg1_defense=$aa["defense"];
$awaysg1_workrate=$aa["workrate"];
$awaysg1_experience=$aa["experience"];
$awaysg1_fatigue=$aa["fatigue"];
}

//verjetnost igralca da zadane met za dve
if ($awaysg1_charac < 4){$addcharac = 4;}
elseif ($awaysg1_charac > 3 AND $awaysg1_charac < 7){$addcharac = -2;}
elseif ($awaysg1_charac > 10 AND $awaysg1_charac < 14){$addcharac = 4;}
elseif ($awaysg1_charac > 16){$addcharac = -2;}
else {$addcharac = 1;}
if ($awaysg1_height < 181) {$heightbonus=1;}
elseif ($awaysg1_height > 180 AND $awaysg1_height < 186) {$heightbonus=2;}
elseif ($awaysg1_height > 185 AND $awaysg1_height < 192) {$heightbonus=3;}
elseif ($awaysg1_height > 191 AND $awaysg1_height < 201) {$heightbonus=4;}
elseif ($awaysg1_height > 200 AND $awaysg1_height < 206) {$heightbonus=2;}
elseif ($awaysg1_height > 205 AND $awaysg1_height < 210) {$heightbonus=0;}
else {$heightbonus=-3;}
$awaysg1_za_dve = round(99 - ($heightbonus + ($awaysg1_speed/11) + ($awaysg1_vision/15) + ($awaysg1_position/7) + (sqrt($awaysg1_shooting*4))*0.9 - ($awaysg1_fatigue/2) + $addcharac - ($homesg1_defense/8) - ((abs($awaysg1_weight-91))/5)));

//verjetnost igralca da zadane za tri
if ($awaysg1_charac >3 AND $awaysg1_charac < 7){$addcharac =3;} elseif ($awaysg1_charac > 6 AND $awaysg1_charac < 11){$addcharac =3;} elseif ($awaysg1_charac > 16){$addcharac = -3;} else {$addcharac = 0;}
$awaysg1_za_tri= 51-(($awaysg1_speed/16)+($awaysg1_position/14)+(sqrt($awaysg1_shooting*4.5))+($awaysg1_experience/6)-($awaysg1_fatigue/2)+($awaysg1_freethow/18) +$addcharac - ($homesg1_defense/15));
if ($awaysg1_za_tri < 9) {$awaysg1_za_tri=9;}

//skok
if ($awaysg1_charac > 10 AND $awaysg1_charac < 14){$addcharac = 3;} else {$addcharac = 0;}
$awaysg1_skok = round(($addcharac + ($awaysg1_speed /5) + ($awaysg1_position /2) + ($awaysg1_experience /4) - ($awaysg1_fatigue *3) + ($awaysg1_rebounds /2)) * ($awaysg1_height / 190));
if ($awaysg1_skok < 1) {$awaysg1_skok = 1;}
$awayteam_skok = $awaypg1_skok + $awaysg1_skok + $awaysf1_skok + $awaypf1_skok + $awayc1_skok + $reb2_oh;
if ($away_off==5) {$awayoffskok = $awayteam_skok*1.2;} else {$awayoffskok = $awayteam_skok;}
if ($away_def==3) {$awaydefskok = $awayteam_skok*2.76;} else {$awaydefskok = $awayteam_skok*2.3;}

//moznost igralca za osebno v napadu
if ($awaysg1_charac >6 && $awaysg1_charac < 11) {$addcharacter=4;} elseif ($awaysg1_charac >10 && $awaysg1_charac < 14) {$addcharacter= -5;} else {$addcharacter=0;}
$awaysg1_v_napadu = round(49 - (($awaysg1_vision /7) + ($awaysg1_position /9) - ($awaysg1_fatigue /2) + ($awaysg1_experience /5) + $addcharacter - ($homesg1_position /6) - ($homesg1_defense /8)));

//verjetnost za osebno
if ($awaysg1_charac > 6 AND $awaysg1_charac < 11) {$addcharacter = -10;} elseif ($awaysg1_charac > 10 AND $awaysg1_charac < 14) {$addcharacter = 10;} else {$addcharacter = 0;}
$awaysg1_v_obrambi = round(((160 - $awaysg1_speed) + (160 - $awaysg1_position) + (160 - $awaysg1_defense) + ((160 - $awaysg1_experience) /2) + $homesg1_speed + $homesg1_position + $addcharacter + $awaysg1_fatigue)/10)-11;

//verjetnost za TO
if ($awaysg1_charac < 4) {$addch = 100;} else {$addch = 0;} $awaysg1_napaka = round((601 + (abs($awaysg1_height-195)) + (abs($awaysg1_weight-92)) - $awaysg1_vision - $awaysg1_passing - $awaysg1_experience - $awaysg1_handling + $awaysg1_fatigue*4 + $homesg1_speed + $homesg1_defense - $addch)/10);

$awaysg1_kraja = round(($awaysg1_speed + $awaysg1_defense + 50)/10);
$awaysg1_freethrow=round($awaysg1_freethrow+$gos_vrednost+$ft2_oh);
$awaysg1_passing=$awaysg1_passing+10;
$awaysk2 = $awaypg1_za_dve + $awaysg1_za_dve + $awaysf1_za_dve + $awaypf1_za_dve + $awayc1_za_dve;
?>