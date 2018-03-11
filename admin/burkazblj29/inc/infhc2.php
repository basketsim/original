<?php
$homec1 = mysql_query("SELECT charac, height, weight, handling, speed, passing, vision, rebounds, position, freethrow, shooting, defense, workrate, experience, fatigue FROM players WHERE id=$home_c1 LIMIT 1");
while ($aa=mysql_fetch_array($homec1))
{
$homec1_charac=$aa["charac"];
$homec1_height=$aa["height"];
$homec1_weight=$aa["weight"];
$homec1_handling=$aa["handling"];
$homec1_speed=$aa["speed"];
$homec1_passing=$aa["passing"];
$homec1_vision=$aa["vision"];
$homec1_rebounds=$aa["rebounds"];
$homec1_position=$aa["position"];
$homec1_freethrow=$aa["freethrow"];
$homec1_shooting=$aa["shooting"];
$homec1_defense=$aa["defense"];
$homec1_workrate=$aa["workrate"];
$homec1_experience=$aa["experience"];
$homec1_fatigue=$aa["fatigue"];
}
if ($type==1) {
$homec1_speed=round($homec1_speed*1.03,2);
$homec1_passing=round($homec1_passing*1.03,2);
$homec1_rebounds=round($homec1_rebounds*1.08,2);
$homec1_freethrow=round($homec1_freethrow*1.06,2);
$homec1_defense=round($homec1_defense*1.08,2);
}

//verjetnost igralca da zadane met za dve
if ($homec1_charac < 4){$addcharac = 3;}
elseif ($homec1_charac > 3 AND $homec1_charac < 7){$addcharac = -3;}
elseif ($homec1_charac > 10 AND $homec1_charac < 14){$addcharac = 3;}
elseif ($homec1_charac > 16){$addcharac = -2;}
else {$addcharac = 0;}
if ($homec1_height < 196) {$heightbonus=-5;}
elseif ($homec1_height > 195 AND $homec1_height < 199) {$heightbonus=-3;}
elseif ($homec1_height > 198 AND $homec1_height < 203) {$heightbonus=-1;}
elseif ($homec1_height > 202 AND $homec1_height < 208) {$heightbonus=2;}
else {$heightbonus=5;}
$homec1_za_dve = round(98 - ($heightbonus + ($homec1_speed/11) + ($homec1_position/7) + (sqrt($homec1_shooting*4))*0.9 - ($homec1_fatigue/2) + $addcharac - ($awayc1_defense/9) - ((abs($homec1_weight-115))/7)));

//skok
if ($homec1_charac > 10 AND $homec1_charac < 14){$addcharac = 8;} else {$addcharac = 0;} $hkoef = 0.7 + atan($homec1_height/9 - 22) / M_PI;
$homec1_skok = round(($addcharac + ($homec1_weight /4) + ($homec1_speed /3) + ($homec1_position /2) + ($homec1_experience /5) - ($homec1_fatigue *2) + $homec1_rebounds) * $hkoef);
if ($homec1_skok < 1) {$homec1_skok = 1;}
$hometeam_skok = $homepg1_skok + $homesg1_skok + $homesf1_skok + $homepf1_skok + $homec1_skok + $reb1_oh;
if ($home_off==5) {$homeoffskok = $hometeam_skok*1.2;} else {$homeoffskok = $hometeam_skok;}
if ($home_def==3) {$homedefskok = $hometeam_skok*2.76;} else {$homedefskok = $hometeam_skok*2.3;}

//moznost igralca za osebno v napadu
if ($homec1_charac >6 && $homec1_charac < 11) {$addcharacter=4;} elseif ($homec1_charac >10 && $homec1_charac < 14) {$addcharacter= -5;} else {$addcharacter=0;}
$homec1_v_napadu = round(49 - (($homec1_vision /9) + ($homec1_position /9) - ($homec1_fatigue /2) + ($homec1_experience /5) + $addcharacter - ($awayc1_position /6) - ($awayc1_defense /6)));

//verjetnost za osebno
if ($homec1_charac > 6 AND $homec1_charac < 11) {$addcharacter = -10;} elseif ($homec1_charac > 10 AND $homec1_charac < 14) {$addcharacter = 10;} else {$addcharacter = 0;}
$homec1_v_obrambi = round(((160 - $homec1_speed) + (160 - $homec1_position) + (160 - $homec1_defense) + ((160 - $homec1_experience) /2) + $awayc1_speed + $awayc1_position + $addcharacter + $homec1_fatigue)/10)-11;

//verjetnost za TO
if ($homec1_charac < 4) {$addch = 100;} else {$addch = 0;}
$homec1_napaka = round((614 - $homec1_position - $homec1_passing - $homec1_experience - $homec1_handling + $homec1_fatigue*4 + $awayc1_speed + $awayc1_defense - $addch)/10);

$homec1_kraja = round(($homec1_speed + $homec1_defense - 9)/12);
$homec1_freethrow=round($homec1_freethrow+$dom_vrednost+$ft1_oh);
$homesk2 = $homepg1_za_dve + $homesg1_za_dve + $homesf1_za_dve + $homepf1_za_dve + $homec1_za_dve;
?>