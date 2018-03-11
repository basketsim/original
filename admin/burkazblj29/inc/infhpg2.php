<?php
$homepg1 = mysql_query("SELECT charac, height, weight, handling, speed, passing, vision, rebounds, position, freethrow, shooting, defense, workrate, experience, fatigue FROM players WHERE id=$home_pg1 LIMIT 1");
while ($aa=mysql_fetch_array($homepg1))
{
$homepg1_charac=$aa["charac"];
$homepg1_height=$aa["height"];
$homepg1_weight=$aa["weight"];
$homepg1_handling=$aa["handling"];
$homepg1_speed=$aa["speed"];
$homepg1_passing=$aa["passing"];
$homepg1_vision=$aa["vision"];
$homepg1_rebounds=$aa["rebounds"];
$homepg1_position=$aa["position"];
$homepg1_freethrow=$aa["freethrow"];
$homepg1_shooting=$aa["shooting"];
$homepg1_defense=$aa["defense"];
$homepg1_workrate=$aa["workrate"];
$homepg1_experience=$aa["experience"];
$homepg1_fatigue=$aa["fatigue"];
}
if ($type==1) {
$homepg1_speed=round($homepg1_speed*1.03,2);
$homepg1_passing=round($homepg1_passing*1.03,2);
$homepg1_rebounds=round($homepg1_rebounds*1.08,2);
$homepg1_freethrow=round($homepg1_freethrow*1.06,2);
$homepg1_defense=round($homepg1_defense*1.08,2);
}

//verjetnost igralca da zadane met za dve
if ($homepg1_charac < 4){$addcharac = 4;}
elseif ($homepg1_charac > 3 AND $homepg1_charac < 7){$addcharac = -2;}
elseif ($homepg1_charac > 10 AND $homepg1_charac < 14){$addcharac = 4;}
elseif ($homepg1_charac > 16){$addcharac = -2;}
else {$addcharac = 1;}
if ($homepg1_height < 176) {$heightbonus=1;}
elseif ($homepg1_height > 175 AND $homepg1_height < 181) {$heightbonus=2;}
elseif ($homepg1_height > 180 AND $homepg1_height < 186) {$heightbonus=3;}
elseif ($homepg1_height > 185 AND $homepg1_height < 196) {$heightbonus=4;}
elseif ($homepg1_height > 195 AND $homepg1_height < 201) {$heightbonus=2;}
elseif ($homepg1_height > 200 AND $homepg1_height < 206) {$heightbonus=0;}
else {$heightbonus=-3;}
$homepg1_za_dve = round(98 - ($heightbonus + ($homepg1_speed/11) + ($homepg1_vision/16) + ($homepg1_position/7) + (sqrt($homepg1_shooting*4))*0.9 - ($homepg1_fatigue/2) + $addcharac - ($awaypg1_defense/9) - ((abs($homepg1_weight-83))/5)));

//verjetnost igralca da zadane za tri
if ($homepg1_charac >3 AND $homepg1_charac < 7){$addcharac =3;} elseif ($homepg1_charac > 6 AND $homepg1_charac < 11){$addcharac =3;} elseif ($homepg1_charac > 16){$addcharac = -3;} else {$addcharac = 0;}
$homepg1_za_tri= 51-(($homepg1_speed/16) +($homepg1_position/14)+(sqrt($homepg1_shooting*4.5))+($homepg1_experience/6)-($homepg1_fatigue/2)+($homepg1_freethow/18) +$addcharac - ($awaypg1_defense/15));
if ($homepg1_za_tri < 9) {$homepg1_za_tri=9;}

//skok
if ($homepg1_charac > 10 AND $homepg1_charac < 14){$addcharac = 3;} else {$addcharac = 0;}
$homepg1_skok = round(($addcharac + ($homepg1_speed /5) + ($homepg1_position /2) + ($homepg1_experience /4) - ($homepg1_fatigue *3) + ($homepg1_rebounds /2)) * ($homepg1_height / 190));
if ($homepg1_skok < 1) {$homepg1_skok = 1;}
$hometeam_skok = $homepg1_skok + $homesg1_skok + $homesf1_skok + $homepf1_skok + $homec1_skok + $reb1_oh;
if ($home_off==5) {$homeoffskok = $hometeam_skok*1.2;} else {$homeoffskok = $hometeam_skok;}
if ($home_def==3) {$homedefskok = $hometeam_skok*2.76;} else {$homedefskok = $hometeam_skok*2.3;}

//moznost igralca za osebno v napadu
if ($homepg1_charac >6 && $homepg1_charac < 11) {$addcharacter=4;} elseif ($homepg1_charac >10 && $homepg1_charac < 14) {$addcharacter= -5;} else {$addcharacter=0;}
$homepg1_v_napadu = round(49 - (($homepg1_vision /7) + ($homepg1_position /9) - ($homepg1_fatigue /2) + ($homepg1_experience /5) + $addcharacter - ($awaypg1_position /6) - ($awaypg1_defense /8)));

//verjetnost za osebno
if ($homepg1_charac > 6 AND $homepg1_charac < 11) {$addcharacter = -10;} elseif ($homepg1_charac > 10 AND $homepg1_charac < 14) {$addcharacter = 10;} else {$addcharacter = 0;}
$homepg1_v_obrambi = round(((160 - $homepg1_speed) + (160 - $homepg1_position) + (160 - $homepg1_defense) + ((160 - $homepg1_experience) /2) + $awaypg1_speed + $awaypg1_position + $addcharacter + $homepg1_fatigue)/10)-11;

//verjetnost za TO
if ($homepg1_charac < 4) {$addch = 100;} else {$addch = 0;} $homepg1_napaka = round((601 + (abs($homepg1_height-187)) + (abs($homepg1_weight-83)) - $homepg1_vision - $homepg1_passing - $homepg1_experience - $homepg1_handling + $homepg1_fatigue*4 + $awaypg1_speed + $awaypg1_defense - $addch)/10);

$homepg1_kraja = round(($homepg1_defense + $homepg1_speed + 62)/10);
$homepg1_freethrow=round($homepg1_freethrow+$dom_vrednost+$ft1_oh);
$homepg1_passing=$homepg1_passing+20;
$homesk2 = $homepg1_za_dve + $homesg1_za_dve + $homesf1_za_dve + $homepf1_za_dve + $homec1_za_dve;
?>