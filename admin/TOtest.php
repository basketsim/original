<?php
ini_set("max_execution_time",1500);
include_once("common.php");

$result = mysql_query("SELECT * FROM matches WHERE matchid=2872361 LIMIT 1") or die("Ne bere iz tabele tekme!");
while($r=mysql_fetch_array($result))
{
$home_id=$r["home_id"];
$away_id=$r["away_id"];
$arena_id=$r["arena_id"];
$time=$r["time"];
$type=$r["type"];
$home_def=$r["home_def"];
$home_off=$r["home_off"];
$away_def=$r["away_def"];
$away_off=$r["away_off"];
$home_pg1=$r["home_pg1"];
$home_sg1=$r["home_sg1"];
$home_sf1=$r["home_sf1"];
$home_pf1=$r["home_pf1"];
$home_c1=$r["home_c1"];
$away_pg1=$r["away_pg1"];
$away_sg1=$r["away_sg1"];
$away_sf1=$r["away_sf1"];
$away_pf1=$r["away_pf1"];
$away_c1=$r["away_c1"];
$home_pg2=$r["home_pg2"];
$home_sg2=$r["home_sg2"];
$home_sf2=$r["home_sf2"];
$home_pf2=$r["home_pf2"];
$home_c2=$r["home_c2"];
$away_pg2=$r["away_pg2"];
$away_sg2=$r["away_sg2"];
$away_sf2=$r["away_sf2"];
$away_pf2=$r["away_pf2"];
$away_c2=$r["away_c2"];
$home_set=$r["home_set"];
$away_set=$r["away_set"];
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

if ($type==1) {
$homepg1_speed=round($homepg1_speed*1.03,2);
$homepg1_passing=round($homepg1_passing*1.03,2);
$homepg1_rebounds=round($homepg1_rebounds*1.08,2);
$homepg1_freethrow=round($homepg1_freethrow*1.06,2);
$homepg1_defense=round($homepg1_defense*1.08,2);
$homesg1_speed=round($homesg1_speed*1.03,2);
$homesg1_passing=round($homesg1_passing*1.03,2);
$homesg1_rebounds=round($homesg1_rebounds*1.08,2);
$homesg1_freethrow=round($homesg1_freethrow*1.06,2);
$homesg1_defense=round($homesg1_defense*1.08,2);
$homesf1_passing=round($homesf1_passing*1.03,2);
$homesf1_rebounds=round($homesf1_rebounds*1.08,2);
$homesf1_freethrow=round($homesf1_freethrow*1.06,2);
$homesf1_defense=round($homesf1_defense*1.08,2);
$homepf1_speed=round($homepfc1_speed*1.03,2);
$homepf1_passing=round($homepf1_passing*1.03,2);
$homepf1_rebounds=round($homepf1_rebounds*1.08,2);
$homepf1_freethrow=round($homepf1_freethrow*1.06,2);
$homepf1_defense=round($homepf1_defense*1.08,2);
$homec1_speed=round($homec1_speed*1.03,2);
$homec1_passing=round($homec1_passing*1.03,2);
$homec1_rebounds=round($homec1_rebounds*1.08,2);
$homec1_freethrow=round($homec1_freethrow*1.06,2);
$homec1_defense=round($homec1_defense*1.08,2);
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

$tim1 = "1.6 * $homepg1_handling + 1.5 * $homepg1_passing + $homepg1_vision - 1.2 * $homepg1_fatigue + $homesg1_handling + 0.9 * $homesg1_passing + $homesg1_vision - 1.2 * $homesg1_fatigue + $homesf1_handling /2 + $homesf1_passing + $homesf1_vision - $homesf1_fatigue + $homepf1_passing /2 - 1.2 * $homepf1_fatigue - 1.2 * $homec1_fatigue - 1.5 * $awaypg1_defense - 1.5 * $awaysg1_defense - $awaysf1_defense - $awaypf1_defense /2";

$tim2 = "1.6 * $awaypg1_handling + 1.5 * $awaypg1_passing + $awaypg1_vision - 1.2 * $awaypg1_fatigue + $awaysg1_handling + 0.9 * $awaysg1_passing + $awaysg1_vision - 1.2 * $awaysg1_fatigue + $awaysf1_handling /2 + $awaysf1_passing + $awaysf1_vision - $awaysf1_fatigue + $awaypf1_passing /2 - 1.2 * $awaypf1_fatigue - 1.2 * $awayc1_fatigue - 1.5 * $homepg1_defense - 1.5 * $homesg1_defense - $homesf1_defense - $homepf1_defense /2";

$result1 = 1.6 * $homepg1_handling + 1.5 * $homepg1_passing + $homepg1_vision - 1.2 * $homepg1_fatigue + $homesg1_handling + 0.9 * $homesg1_passing + $homesg1_vision - 1.2 * $homesg1_fatigue + $homesf1_handling /2 + $homesf1_passing + $homesf1_vision - $homesf1_fatigue + $homepf1_passing /2 - 1.2 * $homepf1_fatigue - 1.2 * $homec1_fatigue - 1.5 * $awaypg1_defense - 1.5 * $awaysg1_defense - $awaysf1_defense - $awaypf1_defense /2;

$result2 = 1.6 * $awaypg1_handling + 1.5 * $awaypg1_passing + $awaypg1_vision - 1.2 * $awaypg1_fatigue + $awaysg1_handling + 0.9 * $awaysg1_passing + $awaysg1_vision - 1.2 * $awaysg1_fatigue + $awaysf1_handling /2 + $awaysf1_passing + $awaysf1_vision - $awaysf1_fatigue + $awaypf1_passing /2 - 1.2 * $awaypf1_fatigue - 1.2 * $awayc1_fatigue - 1.5 * $homepg1_defense - 1.5 * $homesg1_defense - $homesf1_defense - $homepf1_defense /2;

echo $tim1,"<br/>";
echo $tim2,"<br/><br/>";
echo $result1," - ",$result2;
?>