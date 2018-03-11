<?php
$homesf1 = mysql_query("SELECT charac, height, weight, handling, speed, passing, vision, rebounds, position, freethrow, shooting, defense, workrate, experience, fatigue FROM players WHERE id=$home_sf1 LIMIT 1");
while ($aa=mysql_fetch_array($homesf1))
{
$homesf1_charac=$aa["charac"];
$homesf1_height=$aa["height"];
$homesf1_weight=$aa["weight"];
$homesf1_handling=$aa["handling"];
$homesf1_speed=$aa["speed"];
$homesf1_passing=$aa["passing"];
$homesf1_vision=$aa["vision"];
$homesf1_rebounds=$aa["rebounds"];
$homesf1_position=$aa["position"];
$homesf1_freethrow=$aa["freethrow"];
$homesf1_shooting=$aa["shooting"];
$homesf1_defense=$aa["defense"];
$homesf1_workrate=$aa["workrate"];
$homesf1_experience=$aa["experience"];
$homesf1_fatigue=$aa["fatigue"];
}
if ($type==1) {
$homesf1_speed=round($homesf1_speed*1.03,2);
$homesf1_passing=round($homesf1_passing*1.03,2);
$homesf1_rebounds=round($homesf1_rebounds*1.08,2);
$homesf1_freethrow=round($homesf1_freethrow*1.06,2);
$homesf1_defense=round($homesf1_defense*1.08,2);
}

//verjetnost igralca da zadane met za dve
if ($homesf1_charac < 4){$addcharac = 3;}
elseif ($homesf1_charac > 3 AND $homesf1_charac < 7){$addcharac = -3;}
elseif ($homesf1_charac > 10 AND $homesf1_charac < 14){$addcharac = 3;}
elseif ($homesf1_charac > 16){$addcharac = -3;}
else {$addcharac = 0;}
if ($homesf1_height < 184) {$heightbonus=-3;}
elseif ($homesf1_height > 183 AND $homesf1_height < 189) {$heightbonus=-1;}
elseif ($homesf1_height > 188 AND $homesf1_height < 193) {$heightbonus=0;}
elseif ($homesf1_height > 192 AND $homesf1_height < 196) {$heightbonus=1;}
elseif ($homesf1_height > 195 AND $homesf1_height < 210) {$heightbonus=3;}
else {$heightbonus=0;}
$homesf1_za_dve = round(104 - ($heightbonus + ($homesf1_speed/11) + ($homesf1_vision/16) + ($homesf1_position/7) + (sqrt($homesf1_shooting*4))*0.9 - ($homesf1_fatigue/2) + $addcharac - ($awaysf1_defense/7) - ((abs($homesf1_weight-100))/6)));

//verjetnost igralca da zadane za tri
if ($homesf1_charac >3 AND $homesf1_charac < 7){$addcharac =3;} elseif ($homesf1_charac > 6 AND $homesf1_charac < 11){$addcharac =3;} elseif ($homesf1_charac > 16){$addcharac = -3;} else {$addcharac = 0;}
$homesf1_za_tri= 56-(($homesf1_speed/16)+($homesf1_position/14)+(sqrt($homesf1_shooting*4.5))+($homesf1_experience/6)-($homesf1_fatigue/2)+($homesf1_freethow/18) +$addcharac - ($awaysf1_defense/15));
if ($homesf1_za_tri < 9) {$homesf1_za_tri=9;}

//skok
if ($homesf1_charac > 10 AND $homesf1_charac < 14){$addcharac = 8;} else {$addcharac = 0;} $hkoef = 0.63 + atan($homesf1_height/10 - 18) / M_PI;
$homesf1_skok = round(($addcharac + ($homesf1_weight /4) + ($homesf1_speed /3) + ($homesf1_position /2) + ($homesf1_experience /5) - ($homesf1_fatigue *2) + ($homesf1_rebounds * 0.75)) * $hkoef);
if ($homesf1_skok < 1) {$homesf1_skok = 1;}
$hometeam_skok = $homepg1_skok + $homesg1_skok + $homesf1_skok + $homepf1_skok + $homec1_skok + $reb1_oh;
if ($home_off==5) {$homeoffskok = $hometeam_skok*1.2;} else {$homeoffskok = $hometeam_skok;}
if ($home_def==3) {$homedefskok = $hometeam_skok*2.76;} else {$homedefskok = $hometeam_skok*2.3;}

//moznost igralca za osebno v napadu
if ($homesf1_charac >6 && $homesf1_charac < 11) {$addcharacter=4;} elseif ($homesf1_charac >10 && $homesf1_charac < 14) {$addcharacter= -5;} else {$addcharacter=0;}
$homesf1_v_napadu = round(49 - (($homesf1_vision /8) + ($homesf1_position /9) - ($homesf1_fatigue /2) + ($homesf1_experience /5) + $addcharacter - ($awaysf1_position /6) - ($awaysf1_defense /7)));

//verjetnost za osebno
if ($homesf1_charac > 6 AND $homesf1_charac < 11) {$addcharacter = -10;} elseif ($homesf1_charac > 10 AND $homesf1_charac < 14) {$addcharacter = 10;} else {$addcharacter = 0;}
$homesf1_v_obrambi = round(((160 - $homesf1_speed) + (160 - $homesf1_position) + (160 - $homesf1_defense) + ((160 - $homesf1_experience) /2) + $awaysf1_speed + $awaysf1_position + $addcharacter + $homesf1_fatigue)/10)-11;

//verjetnost za TO
if ($homesf1_charac < 4) {$addch = 100;} else {$addch = 0;} $homesf1_napaka = round((601 + (abs($homesf1_height-201)) + (abs($homesf1_weight-100)) - $homesf1_vision - $homesf1_passing - $homesf1_experience - $homesf1_handling + $homesf1_fatigue*4 + $awaysf1_speed + $awaysf1_defense - $addch)/10);

$homesf1_kraja = round(($homesf1_speed + $homesf1_defense + 35)/10);
$homesf1_freethrow=round($homesf1_freethrow+$dom_vrednost+$ft1_oh);
$homesf1_passing=$homesf1_passing+5;
$homesk2 = $homepg1_za_dve + $homesg1_za_dve + $homesf1_za_dve + $homepf1_za_dve + $homec1_za_dve;
?>