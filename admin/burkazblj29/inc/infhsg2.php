<?php
$homesg1 = mysql_query("SELECT charac, height, weight, handling, speed, passing, vision, rebounds, position, freethrow, shooting, defense, workrate, experience, fatigue FROM players WHERE id=$home_sg1 LIMIT 1");
while ($aa=mysql_fetch_array($homesg1))
{
$homesg1_charac=$aa["charac"];
$homesg1_height=$aa["height"];
$homesg1_weight=$aa["weight"];
$homesg1_handling=$aa["handling"];
$homesg1_speed=$aa["speed"];
$homesg1_passing=$aa["passing"];
$homesg1_vision=$aa["vision"];
$homesg1_rebounds=$aa["rebounds"];
$homesg1_position=$aa["position"];
$homesg1_freethrow=$aa["freethrow"];
$homesg1_shooting=$aa["shooting"];
$homesg1_defense=$aa["defense"];
$homesg1_workrate=$aa["workrate"];
$homesg1_experience=$aa["experience"];
$homesg1_fatigue=$aa["fatigue"];
}
if ($type==1) {
$homesg1_speed=round($homesg1_speed*1.03,2);
$homesg1_passing=round($homesg1_passing*1.03,2);
$homesg1_rebounds=round($homesg1_rebounds*1.08,2);
$homesg1_freethrow=round($homesg1_freethrow*1.06,2);
$homesg1_defense=round($homesg1_defense*1.08,2);
}

//verjetnost igralca da zadane met za dve
if ($homesg1_charac < 4){$addcharac = 4;}
elseif ($homesg1_charac > 3 AND $homesg1_charac < 7){$addcharac = -2;}
elseif ($homesg1_charac > 10 AND $homesg1_charac < 14){$addcharac = 4;}
elseif ($homesg1_charac > 16){$addcharac = -2;}
else {$addcharac = 1;}
if ($homesg1_height < 181) {$heightbonus=1;}
elseif ($homesg1_height > 180 AND $homesg1_height < 186) {$heightbonus=2;}
elseif ($homesg1_height > 185 AND $homesg1_height < 192) {$heightbonus=3;}
elseif ($homesg1_height > 191 AND $homesg1_height < 201) {$heightbonus=4;}
elseif ($homesg1_height > 200 AND $homesg1_height < 206) {$heightbonus=2;}
elseif ($homesg1_height > 205 AND $homesg1_height < 210) {$heightbonus=0;}
else {$heightbonus=-3;}
$homesg1_za_dve =round(99 - ($heightbonus + ($homesg1_speed/11) + ($homesg1_vision/15) + ($homesg1_position/7) + (sqrt($homesg1_shooting*4))*0.9 - ($homesg1_fatigue/2) + $addcharac - ($awaysg1_defense/8) - ((abs($homesg1_weight-91))/5)));

//verjetnost igralca da zadane za tri
if ($homesg1_charac >3 AND $homesg1_charac < 7){$addcharac =3;} elseif ($homesg1_charac > 6 AND $homesg1_charac < 11){$addcharac =3;} elseif ($homesg1_charac > 16){$addcharac = -3;} else {$addcharac = 0;}
$homesg1_za_tri= 51-(($homesg1_speed/16) +($homesg1_position/14)+(sqrt($homesg1_shooting*4.5))+($homesg1_experience/6)-($homesg1_fatigue/2)+($homesg1_freethow/18) +$addcharac - ($awaysg1_defense/15));
if ($homesg1_za_tri < 9) {$homesg1_za_tri=9;}

//skok
if ($homesg1_charac > 10 AND $homesg1_charac < 14){$addcharac = 3;} else {$addcharac = 0;}
$homesg1_skok = round(($addcharac + ($homesg1_speed /5) + ($homesg1_position /2) + ($homesg1_experience /4) - ($homesg1_fatigue *3) + ($homesg1_rebounds /2)) * ($homesg1_height / 190));
if ($homesg1_skok < 1) {$homesg1_skok = 1;}
$hometeam_skok = $homepg1_skok + $homesg1_skok + $homesf1_skok + $homepf1_skok + $homec1_skok + $reb1_oh;
if ($home_off==5) {$homeoffskok = $hometeam_skok*1.2;} else {$homeoffskok = $hometeam_skok;}
if ($home_def==3) {$homedefskok = $hometeam_skok*2.76;} else {$homedefskok = $hometeam_skok*2.3;}

//moznost igralca za osebno v napadu
if ($homesg1_charac >6 && $homesg1_charac < 11) {$addcharacter=4;} elseif ($homesg1_charac >10 && $homesg1_charac < 14) {$addcharacter= -5;} else {$addcharacter=0;}
$homesg1_v_napadu = round(49 - (($homesg1_vision /7) + ($homesg1_position /9) - ($homesg1_fatigue /2) + ($homesg1_experience /5) + $addcharacter - ($awaysg1_position /6) - ($awaysg1_defense /8)));

//verjetnost za osebno
if ($homesg1_charac > 6 AND $homesg1_charac < 11) {$addcharacter = -10;} elseif ($homesg1_charac > 10 AND $homesg1_charac < 14) {$addcharacter = 10;} else {$addcharacter = 0;}
$homesg1_v_obrambi = round(((160 - $homesg1_speed) + (160 - $homesg1_position) + (160 - $homesg1_defense) + ((160 - $homesg1_experience) /2) + $awaysg1_speed + $awaysg1_position + $addcharacter + $homesg1_fatigue)/10)-11;

//verjetnost za TO
if ($homesg1_charac < 4) {$addch = 100;} else {$addch = 0;} $homesg1_napaka = round((601 + (abs($homesg1_height-195)) + (abs($homesg1_weight-92)) - $homesg1_vision - $homesg1_passing - $homesg1_experience - $homesg1_handling + $homesg1_fatigue*4 + $awaysg1_speed + $awaysg1_defense - $addch)/10);

$homesg1_kraja = round(($homesg1_defense + $homesg1_speed + 50)/10);
$homesg1_freethrow=round($homesg1_freethrow+$dom_vrednost+$ft1_oh);
$homesg1_passing=$homesg1_passing+10;
$homesk2 = $homepg1_za_dve + $homesg1_za_dve + $homesf1_za_dve + $homepf1_za_dve + $homec1_za_dve;
?>