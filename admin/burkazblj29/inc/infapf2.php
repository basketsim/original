<?php
$awaypf1 = mysql_query("SELECT charac, height, weight, handling, speed, passing, vision, rebounds, position, freethrow, shooting, defense, workrate, experience, fatigue FROM players WHERE id=$away_pf1 LIMIT 1");
while ($aa=mysql_fetch_array($awaypf1))
{
$awaypf1_charac=$aa["charac"];
$awaypf1_height=$aa["height"];
$awaypf1_weight=$aa["weight"];
$awaypf1_handling=$aa["handling"];
$awaypf1_speed=$aa["speed"];
$awaypf1_passing=$aa["passing"];
$awaypf1_vision=$aa["vision"];
$awaypf1_rebounds=$aa["rebounds"];
$awaypf1_position=$aa["position"];
$awaypf1_freethrow=$aa["freethrow"];
$awaypf1_shooting=$aa["shooting"];
$awaypf1_defense=$aa["defense"];
$awaypf1_workrate=$aa["workrate"];
$awaypf1_experience=$aa["experience"];
$awaypf1_fatigue=$aa["fatigue"];
}

//verjetnost igralca da zadane met za dve
if ($awaypf1_charac < 4){$addcharac = 3;}
elseif ($awaypf1_charac > 3 AND $awaypf1_charac < 7){$addcharac = -2;}
elseif ($awaypf1_charac > 10 AND $awaypf1_charac < 14){$addcharac = 3;}
elseif ($awaypf1_charac > 16){$addcharac = -2;}
else {$addcharac = 0;}
if ($awaypf1_height < 189) {$heightbonus=-3;}
elseif ($awaypf1_height > 188 AND $awaypf1_height < 195) {$heightbonus=-1;}
elseif ($awaypf1_height > 194 AND $awaypf1_height < 201) {$heightbonus=0;}
elseif ($awaypf1_height > 200 AND $awaypf1_height < 214) {$heightbonus=3;}
else {$heightbonus=1;}
$awaypf1_za_dve = round(99 - ($heightbonus + ($awaypf1_speed/12) + ($awaypf1_position/7) + (sqrt($awaypf1_shooting*4))*0.9 - ($awaypf1_fatigue/2) + $addcharac - ($homepf1_defense/8) - ((abs($awaypf1_weight-106))/7)));

//verjetnost igralca da zadane za tri
if ($awaypf1_charac >3 AND $awaypf1_charac < 7){$addcharac =3;} elseif ($awaypf1_charac > 6 AND $awaypf1_charac < 11){$addcharac =3;} elseif ($awaypf1_charac > 16){$addcharac = -3;} else {$addcharac = 0;}
$awaypf1_za_tri= 58-(($awaypf1_speed/16)+($awaypf1_position/14)+(sqrt($awaypf1_shooting*4.5))+($awaypf1_experience/6)-($awaypf1_fatigue/2)+($awaypf1_freethow/18) +$addcharac - ($homepf1_defense/15));
if ($awaypf1_za_tri < 9) {$awaypf1_za_tri=9;}

//skok
if ($awaypf1_charac > 10 AND $awaypf1_charac < 14){$addcharac = 8;} else {$addcharac = 0;} $hkoef = 0.65 + atan($awaypf1_height/9 - 21) / M_PI;
$awaypf1_skok = round(($addcharac + ($awaypf1_weight /4) + ($awaypf1_speed /3) + ($awaypf1_position /2) + ($awaypf1_experience /5) - ($awaypf1_fatigue *2) + ($awaypf1_rebounds * 0.9)) * $hkoef);
if ($awaypf1_skok < 1) {$awaypf1_skok = 1;}
$awayteam_skok = $awaypg1_skok + $awaysg1_skok + $awaysf1_skok + $awaypf1_skok + $awayc1_skok + $reb2_oh;
if ($away_off==5) {$awayoffskok = $awayteam_skok*1.2;} else {$awayoffskok = $awayteam_skok;}
if ($away_def==3) {$awaydefskok = $awayteam_skok*2.76;} else {$awaydefskok = $awayteam_skok*2.3;}

//moznost igralca za osebno v napadu
if ($awaypf1_charac >6 && $awaypf1_charac < 11) {$addcharacter=4;} elseif ($awaypf1_charac >10 && $awaypf1_charac < 14) {$addcharacter= -5;} else {$addcharacter=0;}
$awaypf1_v_napadu = round(49 - (($awaypf1_vision /9) + ($awaypf1_position /9) - ($awaypf1_fatigue /2) + ($awaypf1_experience /5) + $addcharacter - ($homepf1_position /6) - ($homepf1_defense /6)));

//verjetnost za osebno
if ($awaypf1_charac > 6 AND $awaypf1_charac < 11) {$addcharacter = -10;} elseif ($awaypf1_charac > 10 AND $awaypf1_charac < 14) {$addcharacter = 10;} else {$addcharacter = 0;}
$awaypf1_v_obrambi = round(((160 - $awaypf1_speed) + (160 - $awaypf1_position) + (160 - $awaypf1_defense) + ((160 - $awaypf1_experience) /2) + $homepf1_speed + $homepf1_position + $addcharacter + $awaypf1_fatigue)/10)-11;

//verjetnost za TO
if ($awaypf1_charac < 4) {$addch = 100;} else {$addch = 0;} $awaypf1_napaka = round((608 + (abs($awaypf1_height-204)) - $awaypf1_vision - $awaypf1_passing - $awaypf1_experience - $awaypf1_handling + $awaypf1_fatigue*4 + $homepf1_speed + $homepf1_defense - $addch)/10);

$awaypf1_kraja = round(($awaypf1_speed + $awaypf1_defense + 17)/10);
$awaypf1_freethrow=round($awaypf1_freethrow+$gos_vrednost+$ft2_oh);
$awaysk2 = $awaypg1_za_dve + $awaysg1_za_dve + $awaysf1_za_dve + $awaypf1_za_dve + $awayc1_za_dve;
?>