<?php
$awaypg1 = mysql_query("SELECT charac, height, weight, handling, speed, passing, vision, rebounds, position, freethrow, shooting, defense, workrate, experience, fatigue FROM players WHERE id=$away_pg1 LIMIT 1");
while ($aa=mysql_fetch_array($awaypg1))
{
$awaypg1_charac=$aa["charac"];
$awaypg1_height=$aa["height"];
$awaypg1_weight=$aa["weight"];
$awaypg1_handling=$aa["handling"];
$awaypg1_speed=$aa["speed"];
$awaypg1_passing=$aa["passing"];
$awaypg1_vision=$aa["vision"];
$awaypg1_rebounds=$aa["rebounds"];
$awaypg1_position=$aa["position"];
$awaypg1_freethrow=$aa["freethrow"];
$awaypg1_shooting=$aa["shooting"];
$awaypg1_defense=$aa["defense"];
$awaypg1_workrate=$aa["workrate"];
$awaypg1_experience=$aa["experience"];
$awaypg1_fatigue=$aa["fatigue"];
}

//verjetnost igralca da zadane met za dve
if ($awaypg1_charac < 4){$addcharac = 4;}
elseif ($awaypg1_charac > 3 AND $awaypg1_charac < 7){$addcharac = -2;}
elseif ($awaypg1_charac > 10 AND $awaypg1_charac < 14){$addcharac = 4;}
elseif ($awaypg1_charac > 16){$addcharac = -2;}
else {$addcharac = 1;}
if ($awaypg1_height < 176) {$heightbonus=1;}
elseif ($awaypg1_height > 175 AND $awaypg1_height < 181) {$heightbonus=2;}
elseif ($awaypg1_height > 180 AND $awaypg1_height < 186) {$heightbonus=3;}
elseif ($awaypg1_height > 185 AND $awaypg1_height < 196) {$heightbonus=4;}
elseif ($awaypg1_height > 195 AND $awaypg1_height < 201) {$heightbonus=2;}
elseif ($awaypg1_height > 200 AND $awaypg1_height < 206) {$heightbonus=0;}
else {$heightbonus=-3;}
$awaypg1_za_dve = round(98 - ($heightbonus + ($awaypg1_speed/11) + ($awaypg1_vision/16) + ($awaypg1_position/7) + (sqrt($awaypg1_shooting*4))*0.9 - ($awaypg1_fatigue/2) + $addcharac - ($homepg1_defense/9) - ((abs($awaypg1_weight-83))/5)));

//verjetnost igralca da zadane za tri
if ($awaypg1_charac >3 AND $awaypg1_charac < 7){$addcharac =3;} elseif ($awaypg1_charac > 6 AND $awaypg1_charac < 11){$addcharac =3;} elseif ($awaypg1_charac > 16){$addcharac = -3;} else {$addcharac = 0;}
$awaypg1_za_tri= 51-(($awaypg1_speed/16)+($awaypg1_position/14)+(sqrt($awaypg1_shooting*4.5))+($awaypg1_experience/6)-($awaypg1_fatigue/2)+($awaypg1_freethow/18) +$addcharac - ($homepg1_defense/15));
if ($awaypg1_za_tri < 9) {$awaypg1_za_tri=9;}

//skok
if ($awaypg1_charac > 10 AND $awaypg1_charac < 14){$addcharac = 3;} else {$addcharac = 0;}
$awaypg1_skok = round(($addcharac + ($awaypg1_speed /5) + ($awaypg1_position /2) + ($awaypg1_experience /4) - ($awaypg1_fatigue *3) + ($awaypg1_rebounds /2)) * ($awaypg1_height / 190));
if ($awaypg1_skok < 1) {$awaypg1_skok = 1;}
$awayteam_skok = $awaypg1_skok + $awaysg1_skok + $awaysf1_skok + $awaypf1_skok + $awayc1_skok + $reb2_oh;
if ($away_off==5) {$awayoffskok = $awayteam_skok*1.2;} else {$awayoffskok = $awayteam_skok;}
if ($away_def==3) {$awaydefskok = $awayteam_skok*2.76;} else {$awaydefskok = $awayteam_skok*2.3;}

//moznost igralca za osebno v napadu
if ($awaypg1_charac >6 && $awaypg1_charac < 11) {$addcharacter=4;} elseif ($awaypg1_charac >10 && $awaypg1_charac < 14) {$addcharacter= -5;} else {$addcharacter=0;}
$awaypg1_v_napadu = round(49 - (($awaypg1_vision /7) + ($awaypg1_position /9) - ($awaypg1_fatigue /2) + ($awaypg1_experience /5) + $addcharacter - ($homepg1_position /6) - ($homepg1_defense /8)));

//verjetnost za osebno
if ($awaypg1_charac > 6 AND $awaypg1_charac < 11) {$addcharacter = -10;} elseif ($awaypg1_charac > 10 AND $awaypg1_charac < 14) {$addcharacter = 10;} else {$addcharacter = 0;}
$awaypg1_v_obrambi = round(((160 - $awaypg1_speed) + (160 - $awaypg1_position) + (160 - $awaypg1_defense) + ((160 - $awaypg1_experience) /2) + $homepg1_speed + $homepg1_position + $addcharacter + $awaypg1_fatigue)/10)-11;

//verjetnost za TO
if ($awaypg1_charac < 4) {$addch = 100;} else {$addch = 0;} $awaypg1_napaka = round((601 + (abs($awaypg1_height-187)) + (abs($awaypg1_weight-83)) - $awaypg1_vision - $awaypg1_passing - $awaypg1_experience - $awaypg1_handling + $awaypg1_fatigue*4 + $homepg1_speed + $homepg1_defense - $addch)/10);

$awaypg1_kraja = round(($awaypg1_speed + $awaypg1_defense + 62)/10);
$awaypg1_freethrow=round($awaypg1_freethrow+$gos_vrednost+$ft2_oh);
$awaypg1_passing=$awaypg1_passing+20;
$awaysk2 = $awaypg1_za_dve + $awaysg1_za_dve + $awaysf1_za_dve + $awaypf1_za_dve + $awayc1_za_dve;
?>