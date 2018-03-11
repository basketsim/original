<?php
$homepf1 = mysql_query("SELECT charac, height, weight, handling, speed, passing, vision, rebounds, position, freethrow, shooting, defense, workrate, experience, fatigue FROM players WHERE id=$home_pf1 LIMIT 1");
while ($aa=mysql_fetch_array($homepf1))
{
$homepf1_charac=$aa["charac"];
$homepf1_height=$aa["height"];
$homepf1_weight=$aa["weight"];
$homepf1_handling=$aa["handling"];
$homepf1_speed=$aa["speed"];
$homepf1_passing=$aa["passing"];
$homepf1_vision=$aa["vision"];
$homepf1_rebounds=$aa["rebounds"];
$homepf1_position=$aa["position"];
$homepf1_freethrow=$aa["freethrow"];
$homepf1_shooting=$aa["shooting"];
$homepf1_defense=$aa["defense"];
$homepf1_workrate=$aa["workrate"];
$homepf1_experience=$aa["experience"];
$homepf1_fatigue=$aa["fatigue"];
}
if ($type==1) {
$homepf1_speed=round($homepfc1_speed*1.03,2);
$homepf1_passing=round($homepf1_passing*1.03,2);
$homepf1_rebounds=round($homepf1_rebounds*1.08,2);
$homepf1_freethrow=round($homepf1_freethrow*1.06,2);
$homepf1_defense=round($homepf1_defense*1.08,2);
}

//verjetnost igralca da zadane met za dve
if ($homepf1_charac < 4){$addcharac = 3;}
elseif ($homepf1_charac > 3 AND $homepf1_charac < 7){$addcharac = -2;}
elseif ($homepf1_charac > 10 AND $homepf1_charac < 14){$addcharac = 3;}
elseif ($homepf1_charac > 16){$addcharac = -2;}
else {$addcharac = 0;}
if ($homepf1_height < 189) {$heightbonus=-3;}
elseif ($homepf1_height > 188 AND $homepf1_height < 195) {$heightbonus=-1;}
elseif ($homepf1_height > 194 AND $homepf1_height < 201) {$heightbonus=0;}
elseif ($homepf1_height > 200 AND $homepf1_height < 214) {$heightbonus=3;}
else {$heightbonus=1;}
$homepf1_za_dve = round(99 - ($heightbonus + ($homepf1_speed/12) + ($homepf1_position/7) + (sqrt($homepf1_shooting*4))*0.9 - ($homepf1_fatigue/2) + $addcharac - ($awaypf1_defense/8) - ((abs($homepf1_weight-106))/7)));

//verjetnost igralca da zadane za tri
if ($homepf1_charac >3 AND $homepf1_charac < 7){$addcharac =3;} elseif ($homepf1_charac > 6 AND $homepf1_charac < 11){$addcharac =3;} elseif ($homepf1_charac > 16){$addcharac = -3;} else {$addcharac = 0;}
$homepf1_za_tri= 58-(($homepf1_speed/16)+($homepf1_position/14)+(sqrt($homepf1_shooting*4.5))+($homepf1_experience/6)-($homepf1_fatigue/2)+($homepf1_freethow/18) +$addcharac - ($awaypf1_defense/15));
if ($homepf1_za_tri < 9) {$homepf1_za_tri=9;}

//skok
if ($homepf1_charac > 10 AND $homepf1_charac < 14){$addcharac = 8;} else {$addcharac = 0;} $hkoef = 0.65 + atan($homepf1_height/9 - 21) / M_PI;
$homepf1_skok = round(($addcharac + ($homepf1_weight /4) + ($homepf1_speed /3) + ($homepf1_position /2) + ($homepf1_experience /5) - ($homepf1_fatigue *2) + ($homepf1_rebounds * 0.9)) * $hkoef);
if ($homepf1_skok < 1) {$homepf1_skok = 1;}
$hometeam_skok = $homepg1_skok + $homesg1_skok + $homesf1_skok + $homepf1_skok + $homec1_skok + $reb1_oh;
if ($home_off==5) {$homeoffskok = $hometeam_skok*1.2;} else {$homeoffskok = $hometeam_skok;}
if ($home_def==3) {$homedefskok = $hometeam_skok*2.76;} else {$homedefskok = $hometeam_skok*2.3;}

//moznost igralca za osebno v napadu
if ($homepf1_charac >6 && $homepf1_charac < 11) {$addcharacter=4;} elseif ($homepf1_charac >10 && $homepf1_charac < 14) {$addcharacter= -5;} else {$addcharacter=0;}
$homepf1_v_napadu = round(49 - (($homepf1_vision /9) + ($homepf1_position /9) - ($homepf1_fatigue /2) + ($homepf1_experience /5) + $addcharacter - ($awaypf1_position /6) - ($awaypf1_defense /6)));

//verjetnost za osebno
if ($homepf1_charac > 6 AND $homepf1_charac < 11) {$addcharacter = -10;} elseif ($homepf1_charac > 10 AND $homepf1_charac < 14) {$addcharacter = 10;} else {$addcharacter = 0;}
$homepf1_v_obrambi = round(((160 - $homepf1_speed) + (160 - $homepf1_position) + (160 - $homepf1_defense) + ((160 - $homepf1_experience) /2) + $awaypf1_speed + $awaypf1_position + $addcharacter + $homepf1_fatigue)/10)-11;

//verjetnost za TO
if ($homepf1_charac < 4) {$addch = 100;} else {$addch = 0;} $homepf1_napaka = round((608 + (abs($homepf1_height-204)) - $homepf1_vision - $homepf1_passing - $homepf1_experience - $homepf1_handling + $homepf1_fatigue*4 + $awaypf1_speed + $awaypf1_defense - $addch)/10);

$homepf1_kraja = round(($homepf1_speed + $homepf1_defense + 17)/10);
$homepf1_freethrow=round($homepf1_freethrow+$dom_vrednost+$ft1_oh);
$homesk2 = $homepg1_za_dve + $homesg1_za_dve + $homesf1_za_dve + $homepf1_za_dve + $homec1_za_dve;
?>