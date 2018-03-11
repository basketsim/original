<?php
$dom_vrednost=0; $gos_vrednost=0;
SWITCH ($home_att) {
CASE 0: $def1_oh=-6; $ft1_oh=13; $reb1_oh=-30; $inj1_oh=4; $tir1=0; break;
CASE 1: $def1_oh=-6; $ft1_oh=8; $reb1_oh=0; $inj1_oh=2; $tir1=0; break;
CASE 2: $def1_oh=6; $ft1_oh=8; $reb1_oh=0; $inj1_oh=2; $tir1=0; break;
CASE 3: $def1_oh=12; $ft1_oh=8; $reb1_oh=0; $inj1_oh=1; $tir1=1; break;
CASE 4: $def1_oh=16; $ft1_oh=0; $reb1_oh=40; $inj1_oh=0; $tir1=2; break;
}
SWITCH ($away_att) {
CASE 0: $def2_oh=-6; $ft2_oh=13; $reb2_oh=-30; $inj2_oh=4; $tir2=0; break;
CASE 1: $def2_oh=-6; $ft2_oh=8; $reb2_oh=0; $inj2_oh=2; $tir2=0; break;
CASE 2: $def2_oh=6; $ft2_oh=8; $reb2_oh=0; $inj2_oh=2; $tir2=0; break;
CASE 3: $def2_oh=12; $ft2_oh=8; $reb2_oh=0; $inj2_oh=1; $tir2=1; break;
CASE 4: $def2_oh=16; $ft2_oh=0; $reb2_oh=40; $inj2_oh=0; $tir2=2; break;
}

//home team

$homepg1 = mysql_query("SELECT charac, height, weight, handling, speed, passing, vision, rebounds, position, freethrow, shooting, defense, workrate, experience, fatigue FROM players WHERE id=$home_pg1");
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

$homesg1 = mysql_query("SELECT charac, height, weight, handling, speed, passing, vision, rebounds, position, freethrow, shooting, defense, workrate, experience, fatigue FROM players WHERE id=$home_sg1");
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

$homesf1 = mysql_query("SELECT charac, height, weight, handling, speed, passing, vision, rebounds, position, freethrow, shooting, defense, workrate, experience, fatigue FROM players WHERE id=$home_sf1");
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

$homepf1 = mysql_query("SELECT charac, height, weight, handling, speed, passing, vision, rebounds, position, freethrow, shooting, defense, workrate, experience, fatigue FROM players WHERE id=$home_pf1");
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

$homec1 = mysql_query("SELECT charac, height, weight, handling, speed, passing, vision, rebounds, position, freethrow, shooting, defense, workrate, experience, fatigue FROM players WHERE id=$home_c1");
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

//away team

$awaypg1 = mysql_query("SELECT charac, height, weight, handling, speed, passing, vision, rebounds, position, freethrow, shooting, defense, workrate, experience, fatigue FROM players WHERE id=$away_pg1");
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

$awaysg1 = mysql_query("SELECT charac, height, weight, handling, speed, passing, vision, rebounds, position, freethrow, shooting, defense, workrate, experience, fatigue FROM players WHERE id=$away_sg1");
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

$awaysf1 = mysql_query("SELECT charac, height, weight, handling, speed, passing, vision, rebounds, position, freethrow, shooting, defense, workrate, experience, fatigue FROM players WHERE id=$away_sf1");
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

$awaypf1 = mysql_query("SELECT charac, height, weight, handling, speed, passing, vision, rebounds, position, freethrow, shooting, defense, workrate, experience, fatigue FROM players WHERE id=$away_pf1");
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

$awayc1 = mysql_query("SELECT charac, height, weight, handling, speed, passing, vision, rebounds, position, freethrow, shooting, defense, workrate, experience, fatigue FROM players WHERE id=$away_c1");
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

//defense
$homepg1_defense=$homepg1_defense+$def1_oh;
$homesg1_defense=$homesg1_defense+$def1_oh;
$homesf1_defense=$homesf1_defense+$def1_oh;
$homepf1_defense=$homepf1_defense+$def1_oh;
$homec1_defense=$homec1_defense+$def1_oh;
$awaypg1_defense=$awaypg1_defense+$def2_oh;
$awaysg1_defense=$awaysg1_defense+$def2_oh;
$awaysf1_defense=$awaysf1_defense+$def2_oh;
$awaypf1_defense=$awaypf1_defense+$def2_oh;
$awayc1_defense=$awayc1_defense+$def2_oh;

//fatigue
if ($homepg1_handling > $homepg1_fatigue) {$homepg1_handling=$homepg1_handling-$homepg1_fatigue;} else {$homepg1_handling=0;}
if ($homepg1_speed > $homepg1_fatigue) {$homepg1_speed=$homepg1_speed-$homepg1_fatigue;} else {$homepg1_speed=0;}
if ($homepg1_passing > $homepg1_fatigue) {$homepg1_passing=$homepg1_passing-$homepg1_fatigue;} else {$homepg1_passing=0;}
if ($homepg1_vision > $homepg1_fatigue) {$homepg1_vision=$homepg1_vision-$homepg1_fatigue;} else {$homepg1_vision=0;}
if ($homepg1_rebounds > $homepg1_fatigue) {$homepg1_rebounds=$homepg1_rebounds-$homepg1_fatigue;} else {$homepg1_rebounds=0;}
if ($homepg1_position > $homepg1_fatigue) {$homepg1_position=$homepg1_position-$homepg1_fatigue;} else {$homepg1_position=0;}
if ($homepg1_freethrow > $homepg1_fatigue) {$homepg1_freethrow=$homepg1_freethrow-$homepg1_fatigue;} else {$homepg1_freethrow=0;}
if ($homepg1_shooting > $homepg1_fatigue) {$homepg1_shooting=$homepg1_shooting-$homepg1_fatigue;} else {$homepg1_shooting=0;}
if ($homepg1_defense > $homepg1_fatigue) {$homepg1_defense=$homepg1_defense-$homepg1_fatigue;} else {$homepg1_defense=0;}
if ($homepg1_experience > $homepg1_fatigue) {$homepg1_experience=$homepg1_experience-$homepg1_fatigue;} else {$homepg1_experience=0;}
if ($homesg1_handling > $homesg1_fatigue) {$homesg1_handling=$homesg1_handling-$homesg1_fatigue;} else {$homesg1_handling=0;}
if ($homesg1_speed > $homesg1_fatigue) {$homesg1_speed=$homesg1_speed-$homesg1_fatigue;} else {$homesg1_speed=0;}
if ($homesg1_passing > $homesg1_fatigue) {$homesg1_passing=$homesg1_passing-$homesg1_fatigue;} else {$homesg1_passing=0;}
if ($homesg1_vision > $homesg1_fatigue) {$homesg1_vision=$homesg1_vision-$homesg1_fatigue;} else {$homesg1_vision=0;}
if ($homesg1_rebounds > $homesg1_fatigue) {$homesg1_rebounds=$homesg1_rebounds-$homesg1_fatigue;} else {$homesg1_rebounds=0;}
if ($homesg1_position > $homesg1_fatigue) {$homesg1_position=$homesg1_position-$homesg1_fatigue;} else {$homesg1_position=0;}
if ($homesg1_freethrow > $homesg1_fatigue) {$homesg1_freethrow=$homesg1_freethrow-$homesg1_fatigue;} else {$homesg1_freethrow=0;}
if ($homesg1_shooting > $homesg1_fatigue) {$homesg1_shooting=$homesg1_shooting-$homesg1_fatigue;} else {$homesg1_shooting=0;}
if ($homesg1_defense > $homesg1_fatigue) {$homesg1_defense=$homesg1_defense-$homesg1_fatigue;} else {$homesg1_defense=0;}
if ($homesg1_experience > $homesg1_fatigue) {$homesg1_experience=$homesg1_experience-$homesg1_fatigue;} else {$homesg1_experience=0;}
if ($homesf1_handling > $homesf1_fatigue) {$homesf1_handling=$homesf1_handling-$homesf1_fatigue;} else {$homesf1_handling=0;}
if ($homesf1_speed > $homesf1_fatigue) {$homesf1_speed=$homesf1_speed-$homesf1_fatigue;} else {$homesf1_speed=0;}
if ($homesf1_passing > $homesf1_fatigue) {$homesf1_passing=$homesf1_passing-$homesf1_fatigue;} else {$homesf1_passing=0;}
if ($homesf1_vision > $homesf1_fatigue) {$homesf1_vision=$homesf1_vision-$homesf1_fatigue;} else {$homesf1_vision=0;}
if ($homesf1_rebounds > $homesf1_fatigue) {$homesf1_rebounds=$homesf1_rebounds-$homesf1_fatigue;} else {$homesf1_rebounds=0;}
if ($homesf1_position > $homesf1_fatigue) {$homesf1_position=$homesf1_position-$homesf1_fatigue;} else {$homesf1_position=0;}
if ($homesf1_freethrow > $homesf1_fatigue) {$homesf1_freethrow=$homesf1_freethrow-$homesf1_fatigue;} else {$homesf1_freethrow=0;}
if ($homesf1_shooting > $homesf1_fatigue) {$homesf1_shooting=$homesf1_shooting-$homesf1_fatigue;} else {$homesf1_shooting=0;}
if ($homesf1_defense > $homesf1_fatigue) {$homesf1_defense=$homesf1_defense-$homesf1_fatigue;} else {$homesf1_defense=0;}
if ($homesf1_experience > $homesf1_fatigue) {$homesf1_experience=$homesf1_experience-$homesf1_fatigue;} else {$homesf1_experience=0;}
if ($homepf1_handling > $homepf1_fatigue) {$homepf1_handling=$homepf1_handling-$homepf1_fatigue;} else {$homepf1_handling=0;}
if ($homepf1_speed > $homepf1_fatigue) {$homepf1_speed=$homepf1_speed-$homepf1_fatigue;} else {$homepf1_speed=0;}
if ($homepf1_passing > $homepf1_fatigue) {$homepf1_passing=$homepf1_passing-$homepf1_fatigue;} else {$homepf1_passing=0;}
if ($homepf1_vision > $homepf1_fatigue) {$homepf1_vision=$homepf1_vision-$homepf1_fatigue;} else {$homepf1_vision=0;}
if ($homepf1_rebounds > $homepf1_fatigue) {$homepf1_rebounds=$homepf1_rebounds-$homepf1_fatigue;} else {$homepf1_rebounds=0;}
if ($homepf1_position > $homepf1_fatigue) {$homepf1_position=$homepf1_position-$homepf1_fatigue;} else {$homepf1_position=0;}
if ($homepf1_freethrow > $homepf1_fatigue) {$homepf1_freethrow=$homepf1_freethrow-$homepf1_fatigue;} else {$homepf1_freethrow=0;}
if ($homepf1_shooting > $homepf1_fatigue) {$homepf1_shooting=$homepf1_shooting-$homepf1_fatigue;} else {$homepf1_shooting=0;}
if ($homepf1_defense > $homepf1_fatigue) {$homepf1_defense=$homepf1_defense-$homepf1_fatigue;} else {$homepf1_defense=0;}
if ($homepf1_experience > $homepf1_fatigue) {$homepf1_experience=$homepf1_experience-$homepf1_fatigue;} else {$homepf1_experience=0;}
if ($homec1_handling > $homec1_fatigue) {$homec1_handling=$homec1_handling-$homec1_fatigue;} else {$homec1_handling=0;}
if ($homec1_speed > $homec1_fatigue) {$homec1_speed=$homec1_speed-$homec1_fatigue;} else {$homec1_speed=0;}
if ($homec1_passing > $homec1_fatigue) {$homec1_passing=$homec1_passing-$homec1_fatigue;} else {$homec1_passing=0;}
if ($homec1_vision > $homec1_fatigue) {$homec1_vision=$homec1_vision-$homec1_fatigue;} else {$homec1_vision=0;}
if ($homec1_rebounds > $homec1_fatigue) {$homec1_rebounds=$homec1_rebounds-$homec1_fatigue;} else {$homec1_rebounds=0;}
if ($homec1_position > $homec1_fatigue) {$homec1_position=$homec1_position-$homec1_fatigue;} else {$homec1_position=0;}
if ($homec1_freethrow > $homec1_fatigue) {$homec1_freethrow=$homec1_freethrow-$homec1_fatigue;} else {$homec1_freethrow=0;}
if ($homec1_shooting > $homec1_fatigue) {$homec1_shooting=$homec1_shooting-$homec1_fatigue;} else {$homec1_shooting=0;}
if ($homec1_defense > $homec1_fatigue) {$homec1_defense=$homec1_defense-$homec1_fatigue;} else {$homec1_defense=0;}
if ($homec1_experience > $homec1_fatigue) {$homec1_experience=$homec1_experience-$homec1_fatigue;} else {$homec1_experience=0;}

if ($awaypg1_handling > $awaypg1_fatigue) {$awaypg1_handling=$awaypg1_handling-$awaypg1_fatigue;} else {$awaypg1_handling=0;}
if ($awaypg1_speed > $awaypg1_fatigue) {$awaypg1_speed=$awaypg1_speed-$awaypg1_fatigue;} else {$awaypg1_speed=0;}
if ($awaypg1_passing > $awaypg1_fatigue) {$awaypg1_passing=$awaypg1_passing-$awaypg1_fatigue;} else {$awaypg1_passing=0;}
if ($awaypg1_vision > $awaypg1_fatigue) {$awaypg1_vision=$awaypg1_vision-$awaypg1_fatigue;} else {$awaypg1_vision=0;}
if ($awaypg1_rebounds > $awaypg1_fatigue) {$awaypg1_rebounds=$awaypg1_rebounds-$awaypg1_fatigue;} else {$awaypg1_rebounds=0;}
if ($awaypg1_position > $awaypg1_fatigue) {$awaypg1_position=$awaypg1_position-$awaypg1_fatigue;} else {$awaypg1_position=0;}
if ($awaypg1_freethrow > $awaypg1_fatigue) {$awaypg1_freethrow=$awaypg1_freethrow-$awaypg1_fatigue;} else {$awaypg1_freethrow=0;}
if ($awaypg1_shooting > $awaypg1_fatigue) {$awaypg1_shooting=$awaypg1_shooting-$awaypg1_fatigue;} else {$awaypg1_shooting=0;}
if ($awaypg1_defense > $awaypg1_fatigue) {$awaypg1_defense=$awaypg1_defense-$awaypg1_fatigue;} else {$awaypg1_defense=0;}
if ($awaypg1_experience > $awaypg1_fatigue) {$awaypg1_experience=$awaypg1_experience-$awaypg1_fatigue;} else {$awaypg1_experience=0;}
if ($awaysg1_handling > $awaysg1_fatigue) {$awaysg1_handling=$awaysg1_handling-$awaysg1_fatigue;} else {$awaysg1_handling=0;}
if ($awaysg1_speed > $awaysg1_fatigue) {$awaysg1_speed=$awaysg1_speed-$awaysg1_fatigue;} else {$awaysg1_speed=0;}
if ($awaysg1_passing > $awaysg1_fatigue) {$awaysg1_passing=$awaysg1_passing-$awaysg1_fatigue;} else {$awaysg1_passing=0;}
if ($awaysg1_vision > $awaysg1_fatigue) {$awaysg1_vision=$awaysg1_vision-$awaysg1_fatigue;} else {$awaysg1_vision=0;}
if ($awaysg1_rebounds > $awaysg1_fatigue) {$awaysg1_rebounds=$awaysg1_rebounds-$awaysg1_fatigue;} else {$awaysg1_rebounds=0;}
if ($awaysg1_position > $awaysg1_fatigue) {$awaysg1_position=$awaysg1_position-$awaysg1_fatigue;} else {$awaysg1_position=0;}
if ($awaysg1_freethrow > $awaysg1_fatigue) {$awaysg1_freethrow=$awaysg1_freethrow-$awaysg1_fatigue;} else {$awaysg1_freethrow=0;}
if ($awaysg1_shooting > $awaysg1_fatigue) {$awaysg1_shooting=$awaysg1_shooting-$awaysg1_fatigue;} else {$awaysg1_shooting=0;}
if ($awaysg1_defense > $awaysg1_fatigue) {$awaysg1_defense=$awaysg1_defense-$awaysg1_fatigue;} else {$awaysg1_defense=0;}
if ($awaysg1_experience > $awaysg1_fatigue) {$awaysg1_experience=$awaysg1_experience-$awaysg1_fatigue;} else {$awaysg1_experience=0;}
if ($awaysf1_handling > $awaysf1_fatigue) {$awaysf1_handling=$awaysf1_handling-$awaysf1_fatigue;} else {$awaysf1_handling=0;}
if ($awaysf1_speed > $awaysf1_fatigue) {$awaysf1_speed=$awaysf1_speed-$awaysf1_fatigue;} else {$awaysf1_speed=0;}
if ($awaysf1_passing > $awaysf1_fatigue) {$awaysf1_passing=$awaysf1_passing-$awaysf1_fatigue;} else {$awaysf1_passing=0;}
if ($awaysf1_vision > $awaysf1_fatigue) {$awaysf1_vision=$awaysf1_vision-$awaysf1_fatigue;} else {$awaysf1_vision=0;}
if ($awaysf1_rebounds > $awaysf1_fatigue) {$awaysf1_rebounds=$awaysf1_rebounds-$awaysf1_fatigue;} else {$awaysf1_rebounds=0;}
if ($awaysf1_position > $awaysf1_fatigue) {$awaysf1_position=$awaysf1_position-$awaysf1_fatigue;} else {$awaysf1_position=0;}
if ($awaysf1_freethrow > $awaysf1_fatigue) {$awaysf1_freethrow=$awaysf1_freethrow-$awaysf1_fatigue;} else {$awaysf1_freethrow=0;}
if ($awaysf1_shooting > $awaysf1_fatigue) {$awaysf1_shooting=$awaysf1_shooting-$awaysf1_fatigue;} else {$awaysf1_shooting=0;}
if ($awaysf1_defense > $awaysf1_fatigue) {$awaysf1_defense=$awaysf1_defense-$awaysf1_fatigue;} else {$awaysf1_defense=0;}
if ($awaysf1_experience > $awaysf1_fatigue) {$awaysf1_experience=$awaysf1_experience-$awaysf1_fatigue;} else {$awaysf1_experience=0;}
if ($awaypf1_handling > $awaypf1_fatigue) {$awaypf1_handling=$awaypf1_handling-$awaypf1_fatigue;} else {$awaypf1_handling=0;}
if ($awaypf1_speed > $awaypf1_fatigue) {$awaypf1_speed=$awaypf1_speed-$awaypf1_fatigue;} else {$awaypf1_speed=0;}
if ($awaypf1_passing > $awaypf1_fatigue) {$awaypf1_passing=$awaypf1_passing-$awaypf1_fatigue;} else {$awaypf1_passing=0;}
if ($awaypf1_vision > $awaypf1_fatigue) {$awaypf1_vision=$awaypf1_vision-$awaypf1_fatigue;} else {$awaypf1_vision=0;}
if ($awaypf1_rebounds > $awaypf1_fatigue) {$awaypf1_rebounds=$awaypf1_rebounds-$awaypf1_fatigue;} else {$awaypf1_rebounds=0;}
if ($awaypf1_position > $awaypf1_fatigue) {$awaypf1_position=$awaypf1_position-$awaypf1_fatigue;} else {$awaypf1_position=0;}
if ($awaypf1_freethrow > $awaypf1_fatigue) {$awaypf1_freethrow=$awaypf1_freethrow-$awaypf1_fatigue;} else {$awaypf1_freethrow=0;}
if ($awaypf1_shooting > $awaypf1_fatigue) {$awaypf1_shooting=$awaypf1_shooting-$awaypf1_fatigue;} else {$awaypf1_shooting=0;}
if ($awaypf1_defense > $awaypf1_fatigue) {$awaypf1_defense=$awaypf1_defense-$awaypf1_fatigue;} else {$awaypf1_defense=0;}
if ($awaypf1_experience > $awaypf1_fatigue) {$awaypf1_experience=$awaypf1_experience-$awaypf1_fatigue;} else {$awaypf1_experience=0;}
if ($awayc1_handling > $awayc1_fatigue) {$awayc1_handling=$awayc1_handling-$awayc1_fatigue;} else {$awayc1_handling=0;}
if ($awayc1_speed > $awayc1_fatigue) {$awayc1_speed=$awayc1_speed-$awayc1_fatigue;} else {$awayc1_speed=0;}
if ($awayc1_passing > $awayc1_fatigue) {$awayc1_passing=$awayc1_passing-$awayc1_fatigue;} else {$awayc1_passing=0;}
if ($awayc1_vision > $awayc1_fatigue) {$awayc1_vision=$awayc1_vision-$awayc1_fatigue;} else {$awayc1_vision=0;}
if ($awayc1_rebounds > $awayc1_fatigue) {$awayc1_rebounds=$awayc1_rebounds-$awayc1_fatigue;} else {$awayc1_rebounds=0;}
if ($awayc1_position > $awayc1_fatigue) {$awayc1_position=$awayc1_position-$awayc1_fatigue;} else {$awayc1_position=0;}
if ($awayc1_freethrow > $awayc1_fatigue) {$awayc1_freethrow=$awayc1_freethrow-$awayc1_fatigue;} else {$awayc1_freethrow=0;}
if ($awayc1_shooting > $awayc1_fatigue) {$awayc1_shooting=$awayc1_shooting-$awayc1_fatigue;} else {$awayc1_shooting=0;}
if ($awayc1_defense > $awayc1_fatigue) {$awayc1_defense=$awayc1_defense-$awayc1_fatigue;} else {$awayc1_defense=0;}
if ($awayc1_experience > $awayc1_fatigue) {$awayc1_experience=$awayc1_experience-$awayc1_fatigue;} else {$awayc1_experience=0;}

//CAPTAIN
if ($homeNTC==$home_pg1 AND $type < 9) {$homepg1_experience=$homepg1_experience*0.76;} elseif ($homeNTC<>$home_pg1 AND $type < 9) {$homepg1_experience=$homepg1_experience*0.6;}
if ($homeNTC==$home_sg1 AND $type < 9) {$homesg1_experience=$homesg1_experience*0.76;} elseif ($homeNTC<>$home_sg1 AND $type < 9) {$homesg1_experience=$homesg1_experience*0.6;}
if ($homeNTC==$home_sf1 AND $type < 9) {$homesf1_experience=$homesf1_experience*0.76;} elseif ($homeNTC<>$home_sf1 AND $type < 9) {$homesf1_experience=$homesf1_experience*0.6;}
if ($homeNTC==$home_pf1 AND $type < 9) {$homepf1_experience=$homepf1_experience*0.76;} elseif ($homeNTC<>$home_pf1 AND $type < 9) {$homepf1_experience=$homepf1_experience*0.6;}
if ($homeNTC==$home_c1 AND $type < 9) {$homec1_experience=$homec1_experience*0.76;} elseif ($homeNTC<>$home_c1 AND $type < 9) {$homec1_experience=$homec1_experience*0.6;}
if ($homeUNC==$home_pg1 AND $type > 9) {$homepg1_experience=$homepg1_experience*1.16;}
if ($homeUNC==$home_sg1 AND $type > 9) {$homesg1_experience=$homesg1_experience*1.16;}
if ($homeUNC==$home_sf1 AND $type > 9) {$homesf1_experience=$homesf1_experience*1.16;}
if ($homeUNC==$home_pf1 AND $type > 9) {$homepf1_experience=$homepf1_experience*1.16;}
if ($homeUNC==$home_c1 AND $type > 9) {$homec1_experience=$homec1_experience*1.16;}
if ($awayNTC==$away_pg1 AND $type < 9) {$awaypg1_experience=$awaypg1_experience*0.76;} elseif ($awayNTC<>$away_pg1 AND $type < 9) {$awaypg1_experience=$awaypg1_experience*0.6;}
if ($awayNTC==$away_sg1 AND $type < 9) {$awaysg1_experience=$awaysg1_experience*0.76;} elseif ($awayNTC<>$away_sg1 AND $type < 9) {$awaysg1_experience=$awaysg1_experience*0.6;}
if ($awayNTC==$away_sf1 AND $type < 9) {$awaysf1_experience=$awaysf1_experience*0.76;} elseif ($awayNTC<>$away_sf1 AND $type < 9) {$awaysf1_experience=$awaysf1_experience*0.6;}
if ($awayNTC==$away_pf1 AND $type < 9) {$awaypf1_experience=$awaypf1_experience*0.76;} elseif ($awayNTC<>$away_pf1 AND $type < 9) {$awaypf1_experience=$awaypf1_experience*0.6;}
if ($awayNTC==$away_c1 AND $type < 9) {$awayc1_experience=$awayc1_experience*0.76;} elseif ($awayNTC<>$away_c1 AND $type < 9) {$awayc1_experience=$awayc1_experience*0.6;}
if ($awayUNC==$away_pg1 AND $type > 9) {$awaypg1_experience=$awaypg1_experience*1.16;}
if ($awayUNC==$away_sg1 AND $type > 9) {$awaysg1_experience=$awaysg1_experience*1.16;}
if ($awayUNC==$away_sf1 AND $type > 9) {$awaysf1_experience=$awaysf1_experience*1.16;}
if ($awayUNC==$away_pf1 AND $type > 9) {$awaypf1_experience=$awaypf1_experience*1.16;}
if ($awayUNC==$away_c1 AND $type > 9) {$awayc1_experience=$awayc1_experience*1.16;}


//procent trojk vrzen med tekmo
if ($home_off==3 AND $away_off==3) {$trojke = 10;} //oba DS: 45.5%
elseif ($home_off==6 AND $away_off==6) {$trojke = 6;} //oba IS: 14,3%
elseif ($home_off==3 AND $away_off==6) {$trojke = 8;} //izniceno: 33,3%
elseif ($home_off==6 AND $away_off==3) {$trojke = 8;} //izniceno: 33,3%
elseif ($home_off==3 OR $away_off==3) {$trojke = 9;} //en DS: 40%
elseif ($home_off==6 OR $away_off==6) {$trojke = 7;} //en IS: 25%
else {$trojke = 8;} //izniceno: 33,3%


//verjetnost igralca da zadane met za dve tocki

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
$homepg1_za_dve = round(99 - ($heightbonus + ($homepg1_speed/11) + ($homepg1_vision/16) + ($homepg1_position/7) + (sqrt($homepg1_shooting*4))*0.9 - ($homepg1_fatigue/2) + $addcharac - ($awaypg1_defense/10) - ((abs($homepg1_weight-83))/5)));

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
$homesg1_za_dve =round(100 - ($heightbonus + ($homesg1_speed/11) + ($homesg1_vision/15) + ($homesg1_position/7) + (sqrt($homesg1_shooting*4))*0.9 - ($homesg1_fatigue/2) + $addcharac - ($awaysg1_defense/9) - ((abs($homesg1_weight-91))/5)));

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
$homesf1_za_dve = round(104 - ($heightbonus + ($homesf1_speed/11) + ($homesf1_vision/16) + ($homesf1_position/7) + (sqrt($homesf1_shooting*4))*0.9 - ($homesf1_fatigue/2) + $addcharac - ($awaysf1_defense/8) - ((abs($homesf1_weight-100))/6)));

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
$homepf1_za_dve = round(99 - ($heightbonus + ($homepf1_speed/12) + ($homepf1_position/7) + (sqrt($homepf1_shooting*4))*0.9 - ($homepf1_fatigue/2) + $addcharac - ($awaypf1_defense/9) - ((abs($homepf1_weight-106))/7)));

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
$homec1_za_dve = round(99 - ($heightbonus + ($homec1_speed/11) + ($homec1_position/7) + (sqrt($homec1_shooting*4))*0.9 - ($homec1_fatigue/2) + $addcharac - ($awayc1_defense/10) - ((abs($homec1_weight-115))/7)));


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
$awaypg1_za_dve = round(99 - ($heightbonus + ($awaypg1_speed/11) + ($awaypg1_vision/16) + ($awaypg1_position/7) + (sqrt($awaypg1_shooting*4))*0.9 - ($awaypg1_fatigue/2) + $addcharac - ($homepg1_defense/10) - ((abs($awaypg1_weight-83))/5)));

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
$awaysg1_za_dve = round(100 - ($heightbonus + ($awaysg1_speed/11) + ($awaysg1_vision/15) + ($awaysg1_position/7) + (sqrt($awaysg1_shooting*4))*0.9 - ($awaysg1_fatigue/2) + $addcharac - ($homesg1_defense/9) - ((abs($awaysg1_weight-91))/5)));

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
$awaysf1_za_dve = round(105 - ($heightbonus + ($awaysf1_speed/11) + ($awaysf1_vision/16) + ($awaysf1_position/7) + (sqrt($awaysf1_shooting*4))*0.9 - ($awaysf1_fatigue/2) + $addcharac - ($homesf1_defense/8) - ((abs($awaysf1_weight-100))/6)));

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
$awaypf1_za_dve = round(99 - ($heightbonus + ($awaypf1_speed/12) + ($awaypf1_position/7) + (sqrt($awaypf1_shooting*4))*0.9 - ($awaypf1_fatigue/2) + $addcharac - ($homepf1_defense/9) - ((abs($awaypf1_weight-106))/7)));

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
$awayc1_za_dve = round(99 - ($heightbonus + ($awayc1_speed/11) + ($awayc1_position/7) + (sqrt($awayc1_shooting*4))*0.9 - ($awayc1_fatigue/2) + $addcharac - ($homec1_defense/10) - ((abs($awayc1_weight-115))/7)));


//verjetnost posameznega igralca da zadane met za tri tocke

if ($homepg1_charac >3 AND $homepg1_charac < 7){$addcharac =3;} elseif ($homepg1_charac > 6 AND $homepg1_charac < 11){$addcharac =3;} elseif ($homepg1_charac > 16){$addcharac = -3;} else {$addcharac = 0;}
$homepg1_za_tri= 52-(($homepg1_speed/16) +($homepg1_position/14)+(sqrt($homepg1_shooting*4.5))+($homepg1_experience/7)-($homepg1_fatigue/2)+($homepg1_freethow/18) +$addcharac - ($awaypg1_defense/14));
if ($homepg1_za_tri < 9) {$homepg1_za_tri=9;}
if ($homesg1_charac >3 AND $homesg1_charac < 7){$addcharac =3;} elseif ($homesg1_charac > 6 AND $homesg1_charac < 11){$addcharac =3;} elseif ($homesg1_charac > 16){$addcharac = -3;} else {$addcharac = 0;}
$homesg1_za_tri= 52-(($homesg1_speed/16) +($homesg1_position/14)+(sqrt($homesg1_shooting*4.5))+($homesg1_experience/7)-($homesg1_fatigue/2)+($homesg1_freethow/18) +$addcharac - ($awaysg1_defense/14));
if ($homesg1_za_tri < 10) {$homesg1_za_tri=10;}
if ($homesf1_charac >3 AND $homesf1_charac < 7){$addcharac =3;} elseif ($homesf1_charac > 6 AND $homesf1_charac < 11){$addcharac =3;} elseif ($homesf1_charac > 16){$addcharac = -3;} else {$addcharac = 0;}
$homesf1_za_tri= 57-(($homesf1_speed/16)+($homesf1_position/14)+(sqrt($homesf1_shooting*4.5))+($homesf1_experience/7)-($homesf1_fatigue/2)+($homesf1_freethow/18) +$addcharac - ($awaysf1_defense/14));
if ($homesf1_za_tri < 10) {$homesf1_za_tri=10;}
if ($homepf1_charac >3 AND $homepf1_charac < 7){$addcharac =3;} elseif ($homepf1_charac > 6 AND $homepf1_charac < 11){$addcharac =3;} elseif ($homepf1_charac > 16){$addcharac = -3;} else {$addcharac = 0;}
$homepf1_za_tri= 59-(($homepf1_speed/16)+($homepf1_position/14)+(sqrt($homepf1_shooting*4.5))+($homepf1_experience/7)-($homepf1_fatigue/2)+($homepf1_freethow/18) +$addcharac - ($awaypf1_defense/14));
if ($homepf1_za_tri < 10) {$homepf1_za_tri=10;}

if ($awaypg1_charac >3 AND $awaypg1_charac < 7){$addcharac =3;} elseif ($awaypg1_charac > 6 AND $awaypg1_charac < 11){$addcharac =3;} elseif ($awaypg1_charac > 16){$addcharac = -3;} else {$addcharac = 0;}
$awaypg1_za_tri= 52-(($awaypg1_speed/16)+($awaypg1_position/14)+(sqrt($awaypg1_shooting*4.5))+($awaypg1_experience/7)-($awaypg1_fatigue/2)+($awaypg1_freethow/18) +$addcharac - ($homepg1_defense/14));
if ($awaypg1_za_tri < 9) {$awaypg1_za_tri=9;}
if ($awaysg1_charac >3 AND $awaysg1_charac < 7){$addcharac =3;} elseif ($awaysg1_charac > 6 AND $awaysg1_charac < 11){$addcharac =3;} elseif ($awaysg1_charac > 16){$addcharac = -3;} else {$addcharac = 0;}
$awaysg1_za_tri= 52-(($awaysg1_speed/16)+($awaysg1_position/14)+(sqrt($awaysg1_shooting*4.5))+($awaysg1_experience/7)-($awaysg1_fatigue/2)+($awaysg1_freethow/18) +$addcharac - ($homesg1_defense/14));
if ($awaysg1_za_tri < 10) {$awaysg1_za_tri=10;}
if ($awaysf1_charac >3 AND $awaysf1_charac < 7){$addcharac =3;} elseif ($awaysf1_charac > 6 AND $awaysf1_charac < 11){$addcharac =3;} elseif ($awaysf1_charac > 16){$addcharac = -3;} else {$addcharac = 0;}
$awaysf1_za_tri= 57-(($awaysf1_speed/16)+($awaysf1_position/14)+(sqrt($awaysf1_shooting*4.5))+($awaysf1_experience/7)-($awaysf1_fatigue/2)+($awaysf1_freethow/18) +$addcharac - ($homesf1_defense/14));
if ($awaysf1_za_tri < 10) {$awaysf1_za_tri=10;}
if ($awaypf1_charac >3 AND $awaypf1_charac < 7){$addcharac =3;} elseif ($awaypf1_charac > 6 AND $awaypf1_charac < 11){$addcharac =3;} elseif ($awaypf1_charac > 16){$addcharac = -3;} else {$addcharac = 0;}
$awaypf1_za_tri= 59-(($awaypf1_speed/16)+($awaypf1_position/14)+(sqrt($awaypf1_shooting*4.5))+($awaypf1_experience/7)-($awaypf1_fatigue/2)+($awaypf1_freethow/18) +$addcharac - ($homepf1_defense/14));
if ($awaypf1_za_tri < 10) {$awaypf1_za_tri=10;}


//moznost za skok

if ($homepg1_charac > 10 AND $homepg1_charac < 14){$addcharac = 3;} else {$addcharac = 0;}
$homepg1_skok = round(($addcharac + ($homepg1_speed /5) + ($homepg1_position /2) + ($homepg1_experience /6) - ($homepg1_fatigue *3) + ($homepg1_rebounds /2)) * ($homepg1_height / 190));
if ($homesg1_charac > 10 AND $homesg1_charac < 14){$addcharac = 3;} else {$addcharac = 0;}
$homesg1_skok = round(($addcharac + ($homesg1_speed /5) + ($homesg1_position /2) + ($homesg1_experience /6) - ($homesg1_fatigue *3) + ($homesg1_rebounds /2)) * ($homesg1_height / 190));
if ($homesf1_charac > 10 AND $homesf1_charac < 14){$addcharac = 8;} else {$addcharac = 0;} $hkoef = 0.63 + atan($homesf1_height/10 - 18) / M_PI;
$homesf1_skok = round(($addcharac + ($homesf1_weight /4) + ($homesf1_speed /3) + ($homesf1_position /2) + ($homesf1_experience /6) - ($homesf1_fatigue *2) + ($homesf1_rebounds * 0.75)) * $hkoef);
if ($homepf1_charac > 10 AND $homepf1_charac < 14){$addcharac = 8;} else {$addcharac = 0;} $hkoef = 0.65 + atan($homepf1_height/9 - 21) / M_PI;
$homepf1_skok = round(($addcharac + ($homepf1_weight /4) + ($homepf1_speed /3) + ($homepf1_position /2) + ($homepf1_experience /6) - ($homepf1_fatigue *2) + ($homepf1_rebounds * 0.9)) * $hkoef);
if ($homec1_charac > 10 AND $homec1_charac < 14){$addcharac = 8;} else {$addcharac = 0;} $hkoef = 0.7 + atan($homec1_height/9 - 22) / M_PI;
$homec1_skok = round(($addcharac + ($homec1_weight /4) + ($homec1_speed /3) + ($homec1_position /2) + ($homec1_experience /6) - ($homec1_fatigue *2) + $homec1_rebounds) * $hkoef);

if ($awaypg1_charac > 10 AND $awaypg1_charac < 14){$addcharac = 3;} else {$addcharac = 0;}
$awaypg1_skok = round(($addcharac + ($awaypg1_speed /5) + ($awaypg1_position /2) + ($awaypg1_experience /6) - ($awaypg1_fatigue *3) + ($awaypg1_rebounds /2)) * ($awaypg1_height / 190));
if ($awaysg1_charac > 10 AND $awaysg1_charac < 14){$addcharac = 3;} else {$addcharac = 0;}
$awaysg1_skok = round(($addcharac + ($awaysg1_speed /5) + ($awaysg1_position /2) + ($awaysg1_experience /6) - ($awaysg1_fatigue *3) + ($awaysg1_rebounds /2)) * ($awaysg1_height / 190));
if ($awaysf1_charac > 10 AND $awaysf1_charac < 14){$addcharac = 8;} else {$addcharac = 0;} $hkoef = 0.63 + atan($awaysf1_height/10 - 18) / M_PI;
$awaysf1_skok = round(($addcharac + ($awaysf1_weight /4) + ($awaysf1_speed /3) + ($awaysf1_position /2) + ($awaysf1_experience /6) - ($awaysf1_fatigue *2) + ($awaysf1_rebounds * 0.75)) * $hkoef);
if ($awaypf1_charac > 10 AND $awaypf1_charac < 14){$addcharac = 8;} else {$addcharac = 0;} $hkoef = 0.65 + atan($awaypf1_height/9 - 21) / M_PI;
$awaypf1_skok = round(($addcharac + ($awaypf1_weight /4) + ($awaypf1_speed /3) + ($awaypf1_position /2) + ($awaypf1_experience /6) - ($awaypf1_fatigue *2) + ($awaypf1_rebounds * 0.9)) * $hkoef);
if ($awayc1_charac > 10 AND $awayc1_charac < 14){$addcharac = 8;} else {$addcharac = 0;} $hkoef = 0.7 + atan($awayc1_height/9 - 22) / M_PI;
$awayc1_skok = round(($addcharac + ($awayc1_weight /4) + ($awayc1_speed /3) + ($awayc1_position /2) + ($awayc1_experience /6) - ($awayc1_fatigue *2) + $awayc1_rebounds) * $hkoef);

if ($homepg1_skok < 1) {$homepg1_skok = 1;}
if ($homesg1_skok < 1) {$homesg1_skok = 1;}
if ($homesf1_skok < 1) {$homesf1_skok = 1;}
if ($homepf1_skok < 1) {$homepf1_skok = 1;}
if ($homec1_skok < 1) {$homec1_skok = 1;}
if ($awaypg1_skok < 1) {$awaypg1_skok = 1;}
if ($awaysg1_skok < 1) {$awaysg1_skok = 1;}
if ($awaysf1_skok < 1) {$awaysf1_skok = 1;}
if ($awaypf1_skok < 1) {$awaypf1_skok = 1;}
if ($awayc1_skok < 1) {$awayc1_skok = 1;}

//skok za ekipo
$hometeam_skok = $homepg1_skok + $homesg1_skok + $homesf1_skok + $homepf1_skok + $homec1_skok + $reb1_oh;
if ($home_off==5) {$homeoffskok = $hometeam_skok*1.2;} else {$homeoffskok = $hometeam_skok;}
if ($home_def==3) {$homedefskok = $hometeam_skok*2.76;} else {$homedefskok = $hometeam_skok*2.3;}
$awayteam_skok = $awaypg1_skok + $awaysg1_skok + $awaysf1_skok + $awaypf1_skok + $awayc1_skok + $reb2_oh;
if ($away_off==5) {$awayoffskok = $awayteam_skok*1.2;} else {$awayoffskok = $awayteam_skok;}
if ($away_def==3) {$awaydefskok = $awayteam_skok*2.76;} else {$awaydefskok = $awayteam_skok*2.3;}

if ($homeoffskok < 10) {$homeoffskok=$homeoffskok=9;}
if ($homedefskok < 10) {$homedefskok=$homedefskok=9;}
if ($awayoffskok < 10) {$awayoffskok=$awayoffskok=9;}
if ($awaydefskok < 10) {$awaydefskok=$awaydefskok=9;}


//moznost za osebno v napadu

if ($homepg1_charac >6 && $homepg1_charac < 11) {$addcharacter=4;} elseif ($homepg1_charac > 10 AND $homepg1_charac < 14) {$addcharacter = -5;} else {$addcharacter = 0;}
$homepg1_v_napadu = round(49 - (($homepg1_vision /7) + ($homepg1_position /9) - ($homepg1_fatigue /2) + ($homepg1_experience /5) + $addcharacter - ($awaypg1_position /6) - ($awaypg1_defense /8)));
if ($homesg1_charac >6 && $homesg1_charac < 11) {$addcharacter=4;} elseif ($homesg1_charac > 10 AND $homesg1_charac < 14) {$addcharacter = -5;} else {$addcharacter = 0;}
$homesg1_v_napadu = round(49 - (($homesg1_vision /7) + ($homesg1_position /9) - ($homesg1_fatigue /2) + ($homesg1_experience /5) + $addcharacter - ($awaysg1_position /6) - ($awaysg1_defense /8)));
if ($homesf1_charac >6 && $homesf1_charac < 11) {$addcharacter=4;} elseif ($homesf1_charac > 10 AND $homesf1_charac < 14) {$addcharacter = -5;} else {$addcharacter = 0;}
$homesf1_v_napadu = round(49 - (($homesf1_vision /8) + ($homesf1_position /9) - ($homesf1_fatigue /2) + ($homesf1_experience /5) + $addcharacter - ($awaysf1_position /6) - ($awaysf1_defense /7)));
if ($homepf1_charac >6 && $homepf1_charac < 11) {$addcharacter=4;} elseif ($homepf1_charac > 10 AND $homepf1_charac < 14) {$addcharacter = -5;} else {$addcharacter = 0;}
$homepf1_v_napadu = round(49 - (($homepf1_vision /9) + ($homepf1_position /9) - ($homepf1_fatigue /2) + ($homepf1_experience /5) + $addcharacter - ($awaypf1_position /6) - ($awaypf1_defense /6)));
if ($homec1_charac >6 && $homec1_charac < 11) {$addcharacter=4;} elseif ($homec1_charac > 10 AND $homec1_charac < 14) {$addcharacter = -5;} else {$addcharacter = 0;}
$homec1_v_napadu = round(49 - (($homec1_vision /9) + ($homec1_position /9) - ($homec1_fatigue /2) + ($homec1_experience /5) + $addcharacter - ($awayc1_position /6) - ($awayc1_defense /6)));

if ($awaypg1_charac >6 && $awaypg1_charac < 11) {$addcharacter=4;} elseif ($awaypg1_charac > 10 AND $awaypg1_charac < 14) {$addcharacter = -5;} else {$addcharacter = 0;}
$awaypg1_v_napadu = round(49 - (($awaypg1_vision /7) + ($awaypg1_position /9) - ($awaypg1_fatigue /2) + ($awaypg1_experience /5) + $addcharacter - ($homepg1_position /6) - ($homepg1_defense /8)));
if ($awaysg1_charac >6 && $awaysg1_charac < 11) {$addcharacter=4;} elseif ($awaysg1_charac > 10 AND $awaysg1_charac < 14) {$addcharacter = -5;} else {$addcharacter = 0;}
$awaysg1_v_napadu = round(49 - (($awaysg1_vision /7) + ($awaysg1_position /9) - ($awaysg1_fatigue /2) + ($awaysg1_experience /5) + $addcharacter - ($homesg1_position /6) - ($homesg1_defense /8)));
if ($awaysf1_charac >6 && $awaysf1_charac < 11) {$addcharacter=4;} elseif ($awaysf1_charac > 10 AND $awaysf1_charac < 14) {$addcharacter = -5;} else {$addcharacter = 0;}
$awaysf1_v_napadu = round(49 - (($awaysf1_vision /8) + ($awaysf1_position /9) - ($awaysf1_fatigue /2) + ($awaysf1_experience /5) + $addcharacter - ($homesf1_position /6) - ($homesf1_defense /7)));
if ($awaypf1_charac >6 && $awaypf1_charac < 11) {$addcharacter=4;} elseif ($awaypf1_charac > 10 AND $awaypf1_charac < 14) {$addcharacter = -5;} else {$addcharacter = 0;}
$awaypf1_v_napadu = round(49 - (($awaypf1_vision /9) + ($awaypf1_position /9) - ($awaypf1_fatigue /2) + ($awaypf1_experience /5) + $addcharacter - ($homepf1_position /6) - ($homepf1_defense /6)));
if ($awayc1_charac >6 && $awayc1_charac < 11) {$addcharacter=4;} elseif ($awayc1_charac > 10 AND $awayc1_charac < 14) {$addcharacter = -5;} else {$addcharacter = 0;}
$awayc1_v_napadu = round(49 - (($awayc1_vision /9) + ($awayc1_position /9) - ($awayc1_fatigue /2) + ($awayc1_experience /5) + $addcharacter - ($homec1_position /6) - ($homec1_defense /6)));


//VERJETNOST ZA OSEBNO

if ($homepg1_charac > 6 AND $homepg1_charac < 11) {$addcharacter = -10;} elseif ($homepg1_charac > 10 AND $homepg1_charac < 14) {$addcharacter = 10;} else {$addcharacter = 0;}
$homepg1_v_obrambi = round(((160 - $homepg1_speed) + (160 - $homepg1_position) + (160 - $homepg1_defense) + ((160 - 0.8*$homepg1_experience) /2) + $awaypg1_speed + $awaypg1_position + $addcharacter + $homepg1_fatigue)/10)-11;

if ($homesg1_charac > 6 AND $homesg1_charac < 11) {$addcharacter = -10;} elseif ($homesg1_charac > 10 AND $homesg1_charac < 14) {$addcharacter = 10;} else {$addcharacter = 0;}
$homesg1_v_obrambi = round(((160 - $homesg1_speed) + (160 - $homesg1_position) + (160 - $homesg1_defense) + ((160 - 0.8*$homesg1_experience) /2) + $awaysg1_speed + $awaysg1_position + $addcharacter + $homesg1_fatigue)/10)-11;

if ($homesf1_charac > 6 AND $homesf1_charac < 11) {$addcharacter = -10;} elseif ($homesf1_charac > 10 AND $homesf1_charac < 14) {$addcharacter = 10;} else {$addcharacter = 0;}
$homesf1_v_obrambi = round(((160 - $homesf1_speed) + (160 - $homesf1_position) + (160 - $homesf1_defense) + ((160 - 0.8*$homesf1_experience) /2) + $awaysf1_speed + $awaysf1_position + $addcharacter + $homesf1_fatigue)/10)-11;

if ($homepf1_charac > 6 AND $homepf1_charac < 11) {$addcharacter = -10;} elseif ($homepf1_charac > 10 AND $homepf1_charac < 14) {$addcharacter = 10;} else {$addcharacter = 0;}
$homepf1_v_obrambi = round(((160 - $homepf1_speed) + (160 - $homepf1_position) + (160 - $homepf1_defense) + ((160 - 0.8*$homepf1_experience) /2) + $awaypf1_speed + $awaypf1_position + $addcharacter + $homepf1_fatigue)/10)-11;

if ($homec1_charac > 6 AND $homec1_charac < 11) {$addcharacter = -10;} elseif ($homec1_charac > 10 AND $homec1_charac < 14) {$addcharacter = 10;} else {$addcharacter = 0;}
$homec1_v_obrambi = round(((160 - $homec1_speed) + (160 - $homec1_position) + (160 - $homec1_defense) + ((160 - 0.8*$homec1_experience) /2) + $awayc1_speed + $awayc1_position + $addcharacter + $homec1_fatigue)/10)-11;


if ($awaypg1_charac > 6 AND $awaypg1_charac < 11) {$addcharacter = -10;} elseif ($awaypg1_charac > 10 AND $awaypg1_charac < 14) {$addcharacter = 10;} else {$addcharacter = 0;}
$awaypg1_v_obrambi = round(((160 - $awaypg1_speed) + (160 - $awaypg1_position) + (160 - $awaypg1_defense) + ((160 - 0.8*$awaypg1_experience) /2) + $homepg1_speed + $homepg1_position + $addcharacter + $awaypg1_fatigue)/10)-11;

if ($awaysg1_charac > 6 AND $awaysg1_charac < 11) {$addcharacter = -10;} elseif ($awaysg1_charac > 10 AND $awaysg1_charac < 14) {$addcharacter = 10;} else {$addcharacter = 0;}
$awaysg1_v_obrambi = round(((160 - $awaysg1_speed) + (160 - $awaysg1_position) + (160 - $awaysg1_defense) + ((160 - 0.8*$awaysg1_experience) /2) + $homesg1_speed + $homesg1_position + $addcharacter + $awaysg1_fatigue)/10)-11;

if ($awaysf1_charac > 6 AND $awaysf1_charac < 11) {$addcharacter = -10;} elseif ($awaysf1_charac > 10 AND $awaysf1_charac < 14) {$addcharacter = 10;} else {$addcharacter = 0;}
$awaysf1_v_obrambi = round(((160 - $awaysf1_speed) + (160 - $awaysf1_position) + (160 - $awaysf1_defense) + ((160 - 0.8*$awaysf1_experience) /2) + $homesf1_speed + $homesf1_position + $addcharacter + $awaysf1_fatigue)/10)-11;

if ($awaypf1_charac > 6 AND $awaypf1_charac < 11) {$addcharacter = -10;} elseif ($awaypf1_charac > 10 AND $awaypf1_charac < 14) {$addcharacter = 10;} else {$addcharacter = 0;}
$awaypf1_v_obrambi = round(((160 - $awaypf1_speed) + (160 - $awaypf1_position) + (160 - $awaypf1_defense) + ((160 - 0.8*$awaypf1_experience) /2) + $homepf1_speed + $homepf1_position + $addcharacter + $awaypf1_fatigue)/10)-11;

if ($awayc1_charac > 6 AND $awayc1_charac < 11) {$addcharacter = -10;} elseif ($awayc1_charac > 10 AND $awayc1_charac < 14) {$addcharacter = 10;} else {$addcharacter = 0;}
$awayc1_v_obrambi = round(((160 - $awayc1_speed) + (160 - $awayc1_position) + (160 - $awayc1_defense) + ((160 - 0.8*$awayc1_experience) /2) + $homec1_speed + $homec1_position + $addcharacter + $awayc1_fatigue)/10)-11;


//VERJETNOST ZA TURNOVER

if ($homepg1_charac < 4) {$addch = 100;} else {$addch = 0;} $homepg1_napaka = round((601 + (abs($homepg1_height-187)) + (abs($homepg1_weight-83)) - $homepg1_vision - $homepg1_passing - $homepg1_experience/2 - $homepg1_handling + $homepg1_fatigue*4 + $awaypg1_speed + $awaypg1_defense - $addch)/10);
if ($homesg1_charac < 4) {$addch = 100;} else {$addch = 0;} $homesg1_napaka = round((601 + (abs($homesg1_height-195)) + (abs($homesg1_weight-92)) - $homesg1_vision - $homesg1_passing - $homesg1_experience/2 - $homesg1_handling + $homesg1_fatigue*4 + $awaysg1_speed + $awaysg1_defense - $addch)/10);
if ($homesf1_charac < 4) {$addch = 100;} else {$addch = 0;} $homesf1_napaka = round((601 + (abs($homesf1_height-201)) + (abs($homesf1_weight-100)) - $homesf1_vision - $homesf1_passing - $homesf1_experience/2 - $homesf1_handling + $homesf1_fatigue*4 + $awaysf1_speed + $awaysf1_defense - $addch)/10);
if ($homepf1_charac < 4) {$addch = 100;} else {$addch = 0;} $homepf1_napaka = round((608 + (abs($homepf1_height-204)) - $homepf1_vision - $homepf1_passing - $homepf1_experience/2 - $homepf1_handling + $homepf1_fatigue*4 + $awaypf1_speed + $awaypf1_defense - $addch)/10);
if ($homec1_charac < 4) {$addch = 100;} else {$addch = 0;}
$homec1_napaka = round((614 - $homec1_position - $homec1_passing - $homec1_experience/2 - $homec1_handling + $homec1_fatigue*4 + $awayc1_speed + $awayc1_defense - $addch)/10);

if ($awaypg1_charac < 4) {$addch = 100;} else {$addch = 0;} $awaypg1_napaka = round((601 + (abs($awaypg1_height-187)) + (abs($awaypg1_weight-83)) - $awaypg1_vision - $awaypg1_passing - $awaypg1_experience/2 - $awaypg1_handling + $awaypg1_fatigue*4 + $homepg1_speed + $homepg1_defense - $addch)/10);
if ($awaysg1_charac < 4) {$addch = 100;} else {$addch = 0;} $awaysg1_napaka = round((601 + (abs($awaysg1_height-195)) + (abs($awaysg1_weight-92)) - $awaysg1_vision - $awaysg1_passing - $awaysg1_experience/2 - $awaysg1_handling + $awaysg1_fatigue*4 + $homesg1_speed + $homesg1_defense - $addch)/10);
if ($awaysf1_charac < 4) {$addch = 100;} else {$addch = 0;} $awaysf1_napaka = round((601 + (abs($awaysf1_height-201)) + (abs($awaysf1_weight-100)) - $awaysf1_vision - $awaysf1_passing - $awaysf1_experience/2 - $awaysf1_handling + $awaysf1_fatigue*4 + $homesf1_speed + $homesf1_defense - $addch)/10);
if ($awaypf1_charac < 4) {$addch = 100;} else {$addch = 0;} $awaypf1_napaka = round((608 + (abs($awaypf1_height-204)) - $awaypf1_vision - $awaypf1_passing - $awaypf1_experience/2 - $awaypf1_handling + $awaypf1_fatigue*4 + $homepf1_speed + $homepf1_defense - $addch)/10);
if ($awayc1_charac < 4) {$addch = 100;} else {$addch = 0;}
$awayc1_napaka = round((614 - $awayc1_position - $awayc1_passing - $awayc1_experience/2 - $awayc1_handling + $awayc1_fatigue*4 + $homec1_speed + $homec1_defense - $addch)/10);


//verjetnost da igralec ukrade žogo

$homepg1_kraja = round(($homepg1_defense + $homepg1_speed + 62)/10);
$homesg1_kraja = round(($homesg1_defense + $homesg1_speed + 50)/10);
$homesf1_kraja = round(($homesf1_speed + $homesf1_defense + 35)/10);
$homepf1_kraja = round(($homepf1_speed + $homepf1_defense + 17)/10);
$homec1_kraja = round(($homec1_speed + $homec1_defense - 9)/12);

$awaypg1_kraja = round(($awaypg1_speed + $awaypg1_defense + 62)/10);
$awaysg1_kraja = round(($awaysg1_speed + $awaysg1_defense + 50)/10);
$awaysf1_kraja = round(($awaysf1_speed + $awaysf1_defense + 35)/10);
$awaypf1_kraja = round(($awaypf1_speed + $awaypf1_defense + 17)/10);
$awayc1_kraja = round(($awayc1_speed + $awayc1_defense - 9)/12);

/*
echo $homepg1_za_dve,"<br/>";
echo $homesg1_za_dve,"<br/>";
echo $homesf1_za_dve,"<br/>";
echo $homepf1_za_dve,"<br/>";
echo $homec1_za_dve,"<br/>";
echo $awaypg1_za_dve,"<br/>";
echo $awaysg1_za_dve,"<br/>";
echo $awaysf1_za_dve,"<br/>";
echo $awaypf1_za_dve,"<br/>";
echo $awayc1_za_dve,"<br/>";
echo $homepg1_za_tri,"<br/>";
echo $homesg1_za_tri,"<br/>";
echo $homesf1_za_tri,"<br/>";
echo $homepf1_za_tri,"<br/>";
echo $homec1_za_tri,"<br/>";
echo $awaypg1_za_tri,"<br/>";
echo $awaysg1_za_tri,"<br/>";
echo $awaysf1_za_tri,"<br/>";
echo $awaypf1_za_tri,"<br/>";
echo $awayc1_za_tri,"<br/>";
echo $homepg1_skok,"<br/>";
echo $homesg1_skok,"<br/>";
echo $homesf1_skok,"<br/>";
echo $homepf1_skok,"<br/>";
echo $homec1_skok,"<br/>";
echo $awaypg1_skok,"<br/>";
echo $awaysg1_skok,"<br/>";
echo $awaysf1_skok,"<br/>";
echo $awaypf1_skok,"<br/>";
echo $awayc1_skok,"<br/>";
echo $homedefskok,"<br/>";
echo $homeoffskok,"<br/>";
echo $awaydefskok,"<br/>";
echo $awayoffskok,"<br/>";
echo $homepg1_v_napadu,"<br/>";
echo $homesg1_v_napadu,"<br/>";
echo $homesf1_v_napadu,"<br/>";
echo $homepf1_v_napadu,"<br/>";
echo $homec1_v_napadu,"<br/>";
echo $awaypg1_v_napadu,"<br/>";
echo $awaysg1_v_napadu,"<br/>";
echo $awaysf1_v_napadu,"<br/>";
echo $awaypf1_v_napadu,"<br/>";
echo $awayc1_v_napadu,"<br/>";
echo $homepg1_v_obrambi,"<br/>";
echo $homesg1_v_obrambi,"<br/>";
echo $homesf1_v_obrambi,"<br/>";
echo $homepf1_v_obrambi,"<br/>";
echo $homec1_v_obrambi,"<br/>";
echo $awaypg1_v_obrambi,"<br/>";
echo $awaysg1_v_obrambi,"<br/>";
echo $awaysf1_v_obrambi,"<br/>";
echo $awaypf1_v_obrambi,"<br/>";
echo $awayc1_v_obrambi,"<br/>";
echo $homepg1_napaka,"<br/>";
echo $homesg1_napaka,"<br/>";
echo $homesf1_napaka,"<br/>";
echo $homepf1_napaka,"<br/>";
echo $homec1_napaka,"<br/>";
echo $awaypg1_napaka,"<br/>";
echo $awaysg1_napaka,"<br/>";
echo $awaysf1_napaka,"<br/>";
echo $awaypf1_napaka,"<br/>";
echo $awayc1_napaka,"<br/>";
echo $homepg1_kraja,"<br/>";
echo $homesg1_kraja,"<br/>";
echo $homesf1_kraja,"<br/>";
echo $homepf1_kraja,"<br/>";
echo $homec1_kraja,"<br/>";
echo $awaypg1_kraja,"<br/>";
echo $awaysg1_kraja,"<br/>";
echo $awaysf1_kraja,"<br/>";
echo $awaypf1_kraja,"<br/>";
echo $awayc1_kraja,"<br/>";
die();
*/

//zvezdice
$hpgzvezd = round($homepg1_kraja*3.1 + (100-$homepg1_za_dve)*3.3 + (50-$homepg1_za_tri)*2.5 - $homepg1_napaka);
$hsgzvezd = round($homesg1_kraja*3.3 + (100-$homesg1_za_dve)*3.4 + (50-$homesg1_za_tri)*2.5 - $homesg1_napaka);
$hsfzvezd = round($homesf1_skok*0.85 + $homesf1_kraja*3.3 + (31/$homesf1_za_dve*101) + (6/$homesf1_za_tri*177.5) - $homesf1_napaka);
$hpfzvezd = round($homepf1_skok*0.92 + (100-$homepf1_za_dve)*2.4 - $homepf1_napaka/2)*1.17;
$hczvezd = round($homec1_skok + (100-$homec1_za_dve)*2 - $homec1_napaka/2)*1.05;

$apgzvezd = round($awaypg1_kraja*3.1 + (100-$awaypg1_za_dve)*3.3 + (50-$awaypg1_za_tri)*2.5 - $awaypg1_napaka);
$asgzvezd = round($awaysg1_kraja*3.3 + (100-$awaysg1_za_dve)*3.4 + (50-$awaysg1_za_tri)*2.5 - $awaysg1_napaka);
$asfzvezd = round($awaysf1_skok*0.85 + $awaysf1_kraja*3.3 + (31/$awaysf1_za_dve*101) + (6/$awaysf1_za_tri*177.5) - $awaysf1_napaka);
$apfzvezd = round($awaypf1_skok*0.92 + (100-$awaypf1_za_dve)*2.4 - $awaypf1_napaka/2)*1.17;
$aczvezd = round($awayc1_skok + (100-$awayc1_za_dve)*2 - $awayc1_napaka/2)*1.05;

//FATIGUE
if ($home_def==0 OR $home_def==3) {$hom_def_fat=1;} else {$hom_def_fat=0;}
if ($away_def==0 OR $away_def==3) {$awa_def_fat=1;} else {$awa_def_fat=0;}
if ($home_off==0 OR $home_off==1) {$hom_off_fat=1;} else {$hom_off_fat=0;}
if ($away_off==0 OR $away_off==1) {$awa_off_fat=1;} else {$awa_off_fat=0;}

if ($type==1 || $type==11) {$typ_add_fat=3; $xp_add=0.65;}
if ($type==2 || $type==12) {$typ_add_fat=1; $xp_add=0.25;}
if ($type==3 || $type==4 || $type==13 || $type==14) {$typ_add_fat=4; $xp_add=0.85;}

mysql_query("UPDATE players SET experience=experience+$xp_add, fatigue=fatigue+$hom_def_fat+$hom_off_fat+$typ_add_fat+$tir1 WHERE id=$home_pg1 LIMIT 1");
mysql_query("UPDATE players SET experience=experience+$xp_add, fatigue=fatigue+$hom_def_fat+$hom_off_fat+$typ_add_fat+$tir1 WHERE id=$home_sg1 LIMIT 1");
mysql_query("UPDATE players SET experience=experience+$xp_add, fatigue=fatigue+$hom_def_fat+$hom_off_fat+$typ_add_fat+$tir1 WHERE id=$home_sf1 LIMIT 1");
mysql_query("UPDATE players SET experience=experience+$xp_add, fatigue=fatigue+$hom_def_fat+$hom_off_fat+$typ_add_fat+$tir1 WHERE id=$home_pf1 LIMIT 1");
mysql_query("UPDATE players SET experience=experience+$xp_add, fatigue=fatigue+$hom_def_fat+$hom_off_fat+$typ_add_fat+$tir1 WHERE id=$home_c1 LIMIT 1");

mysql_query("UPDATE players SET experience=experience+$xp_add, fatigue=fatigue+$awa_def_fat+$awa_off_fat+$typ_add_fat+$tir2 WHERE id=$away_pg1 LIMIT 1");
mysql_query("UPDATE players SET experience=experience+$xp_add, fatigue=fatigue+$awa_def_fat+$awa_off_fat+$typ_add_fat+$tir2 WHERE id=$away_sg1 LIMIT 1");
mysql_query("UPDATE players SET experience=experience+$xp_add, fatigue=fatigue+$awa_def_fat+$awa_off_fat+$typ_add_fat+$tir2 WHERE id=$away_sf1 LIMIT 1");
mysql_query("UPDATE players SET experience=experience+$xp_add, fatigue=fatigue+$awa_def_fat+$awa_off_fat+$typ_add_fat+$tir2 WHERE id=$away_pf1 LIMIT 1");
mysql_query("UPDATE players SET experience=experience+$xp_add, fatigue=fatigue+$awa_def_fat+$awa_off_fat+$typ_add_fat+$tir2 WHERE id=$away_c1 LIMIT 1");

//ratingi
$homesk2 = $homepg1_za_dve + $homesg1_za_dve + $homesf1_za_dve + $homepf1_za_dve + $homec1_za_dve;
$awaysk2 = $awaypg1_za_dve + $awaysg1_za_dve + $awaysf1_za_dve + $awaypf1_za_dve + $awayc1_za_dve;
$homesk3 = $homepg1_za_tri + $homesg1_za_tri + $homesf1_za_tri + $homepf1_za_tri + $homec1_za_tri + 2;
$awaysk3 = $awaypg1_za_tri + $awaysg1_za_tri + $awaysf1_za_tri + $awaypf1_za_tri + $awayc1_za_tri + 2;
$homefat = $homepg1_fatigue + $homesg1_fatigue + $homesf1_fatigue + $homepf1_fatigue + $homec1_fatigue;
$awayfat = $awaypg1_fatigue + $awaysg1_fatigue + $awaysf1_fatigue + $awaypf1_fatigue + $awayc1_fatigue;
$hometo = round(1.6 * $homepg1_handling + 1.5 * $homepg1_passing + $homepg1_vision - 2 * $homepg1_fatigue + $homesg1_handling + 0.9 * $homesg1_passing + $homesg1_vision - 2 * $homesg1_fatigue + $homesf1_handling /2 + $homesf1_passing + $homesf1_vision - 2 * $homesf1_fatigue + $homepf1_passing /2 - 2 * $homepf1_fatigue - 2 * $homec1_fatigue - 1.5 * $awaypg1_defense - 1.5 * $awaysg1_defense - $awaysf1_defense - $awaypf1_defense /2 - 90 + $home_mood);
$awayto = round(1.6 * $awaypg1_handling + 1.5 * $awaypg1_passing + $awaypg1_vision - 2 * $awaypg1_fatigue + $awaysg1_handling + 0.9 * $awaysg1_passing + $awaysg1_vision - 2 * $awaysg1_fatigue + $awaysf1_handling /2 + $awaysf1_passing + $awaysf1_vision - 2 * $awaysf1_fatigue + $awaypf1_passing /2 - 2 * $awaypf1_fatigue - 2 * $awayc1_fatigue - 1.5 * $homepg1_defense - 1.5 * $homesg1_defense - $homesf1_defense - $homepf1_defense /2 - 90 + $away_mood);

mysql_query("UPDATE `nt_matches` SET `hpg_rating` =$hpgzvezd, `hsg_rating` =$hsgzvezd, `hsf_rating` =$hsfzvezd, `hpf_rating` =$hpfzvezd, `hc_rating` =$hczvezd, `apg_rating` =$apgzvezd, `asg_rating` =$asgzvezd, `asf_rating` =$asfzvezd, `apf_rating` =$apfzvezd, `ac_rating` =$aczvezd, home_off=$home_off, home_def=$home_def, away_def=$away_def, home_def=$home_def, attitude_hom=$home_att, attitude_awa=$away_att, h2p = '$homesk2', a2p = '$awaysk2', h3p = '$homesk3', a3p = '$awaysk3', hreb = $homeoffskok + $homedefskok, areb = $awayoffskok + $awaydefskok, hto = $hometo, ato = $awayto, htir = '$homefat', atir = '$awayfat' WHERE `matchid`=$matchid LIMIT 1");

//poskodbe
$antiposkodbe = $inj1_oh+$inj2_oh+1;
$slabokaze = ($antiposkodbe*$antiposkodbe*150) + 600;
$slabokaze2 = $slabokaze-1;

//bonus na proste mete
$homepg1_freethrow=round($homepg1_freethrow+$ft1_oh-1);
$homesg1_freethrow=round($homesg1_freethrow+$ft1_oh-1);
$homesf1_freethrow=round($homesf1_freethrow+$ft1_oh-1);
$homepf1_freethrow=round($homepf1_freethrow+$ft1_oh-1);
$homec1_freethrow=round($homec1_freethrow+$ft1_oh-1);
$awaypg1_freethrow=round($awaypg1_freethrow+$ft2_oh-1);
$awaysg1_freethrow=round($awaysg1_freethrow+$ft2_oh-1);
$awaysf1_freethrow=round($awaysf1_freethrow+$ft2_oh-1);
$awaypf1_freethrow=round($awaypf1_freethrow+$ft2_oh-1);
$awayc1_freethrow=round($awayc1_freethrow+$ft2_oh-1);

if($homepg1_freethrow < 7) {$homepg1_freethrow=7;}
if($homesg1_freethrow < 7) {$homesg1_freethrow=7;}
if($homesf1_freethrow < 7) {$homesf1_freethrow=7;}
if($homepf1_freethrow < 7) {$homepf1_freethrow=7;}
if($homec1_freethrow < 7) {$homec1_freethrow=7;}
if($awaypg1_freethrow < 7) {$awaypg1_freethrow=7;}
if($awaysg1_freethrow < 7) {$awaysg1_freethrow=7;}
if($awaysf1_freethrow < 7) {$awaysf1_freethrow=7;}
if($awaypf1_freethrow < 7) {$awaypf1_freethrow=7;}
if($awayc1_freethrow < 7) {$awayc1_freethrow=7;}

$homepg1_passing=$homepg1_passing+20;
$homesg1_passing=$homesg1_passing+10;
$homesf1_passing=$homesf1_passing+5;
$awaypg1_passing=$awaypg1_passing+20;
$awaysg1_passing=$awaysg1_passing+10;
$awaysf1_passing=$awaysf1_passing+5;
?>