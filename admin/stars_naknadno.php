<?php
ini_set("max_execution_time",9600);
include_once("common.php");

/*
$result = mysql_query("SELECT * FROM `matches` WHERE `hpg_rating` =0 AND `hsg_rating` =0 AND `hsf_rating` =0 AND `hpf_rating` =0 AND `hc_rating` =0 AND `apg_rating` =0 AND `asg_rating` = 0 AND `asf_rating` =0 AND `apf_rating` =0 AND `ac_rating` =0 AND `crowd1` <>0 AND season =6") or die("Ne bere");
*/
$result = mysql_query("SELECT * FROM `matches` WHERE `matchid` =<ID TEKME> LIMIT 1") or die("Ne bere");
while($r=mysql_fetch_array($result)) {
$matchid=$r["matchid"];
$home_id=$r["home_id"];
$away_id=$r["away_id"];
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
echo "<b><a href=\"../prikaz.php?matchid=",$matchid,"\">",$matchid,"</a></b><br/>";

$homepg1_charac=0;
$homepg1_height=0;
$homepg1_weight=0;
$homepg1_handling=0;
$homepg1_speed=0;
$homepg1_passing=0;
$homepg1_vision=0;
$homepg1_rebounds=0;
$homepg1_position=0;
$homepg1_freethrow=0;
$homepg1_shooting=0;
$homepg1_defense=0;
$homepg1_workrate=0;
$homepg1_experience=0;
$homepg1_fatigue=0;
$homesg1_charac=0;
$homesg1_height=0;
$homesg1_weight=0;
$homesg1_handling=0;
$homesg1_speed=0;
$homesg1_passing=0;
$homesg1_vision=0;
$homesg1_rebounds=0;
$homesg1_position=0;
$homesg1_freethrow=0;
$homesg1_shooting=0;
$homesg1_defense=0;
$homesg1_workrate=0;
$homesg1_experience=0;
$homesg1_fatigue=0;
$homesf1_charac=0;
$homesf1_height=0;
$homesf1_weight=0;
$homesf1_handling=0;
$homesf1_speed=0;
$homesf1_passing=0;
$homesf1_vision=0;
$homesf1_rebounds=0; 
$homesf1_position=0;
$homesf1_freethrow=0;
$homesf1_shooting=0;
$homesf1_defense=0;
$homesf1_workrate=0;
$homesf1_experience=0;
$homesf1_fatigue=0;
$homepf1_charac=0;
$homepf1_height=0;
$homepf1_weight=0;
$homepf1_handling=0;
$homepf1_speed=0;
$homepf1_passing=0;
$homepf1_vision=0;
$homepf1_rebounds=0;
$homepf1_position=0;
$homepf1_freethrow=0;
$homepf1_shooting=0;
$homepf1_defense=0;
$homepf1_workrate=0;
$homepf1_experience=0;
$homepf1_fatigue=0;
$homec1_charac=0;
$homec1_height=0;
$homec1_weight=0;
$homec1_handling=0;
$homec1_speed=0;
$homec1_passing=0;
$homec1_vision=0;
$homec1_rebounds=0;
$homec1_position=0;
$homec1_freethrow=0;
$homec1_shooting=0;
$homec1_defense=0;
$homec1_workrate=0;
$homec1_experience=0;
$homec1_fatigue=0;
$awaypg1_charac=0;
$awaypg1_height=0;
$awaypg1_weight=0;
$awaypg1_handling=0;
$awaypg1_speed=0;
$awaypg1_passing=0;
$awaypg1_vision=0;
$awaypg1_rebounds=0;
$awaypg1_position=0;
$awaypg1_freethrow=0;
$awaypg1_shooting=0;
$awaypg1_defense=0;
$awaypg1_workrate=0;
$awaypg1_experience=0;
$awaypg1_fatigue=0;
$awaysg1_charac=0;
$awaysg1_height=0;
$awaysg1_weight=0;
$awaysg1_handling=0;
$awaysg1_speed=0;
$awaysg1_passing=0;
$awaysg1_vision=0;
$awaysg1_rebounds=0;
$awaysg1_position=0;
$awaysg1_freethrow=0;
$awaysg1_shooting=0;
$awaysg1_defense=0;
$awaysg1_workrate=0;
$awaysg1_experience=0;
$awaysg1_fatigue=0;
$awaysf1_charac=0;
$awaysf1_height=0;
$awaysf1_weight=0;
$awaysf1_handling=0;
$awaysf1_speed=0;
$awaysf1_passing=0;
$awaysf1_vision=0;
$awaysf1_rebounds=0;
$awaysf1_position=0;
$awaysf1_freethrow=0;
$awaysf1_shooting=0;
$awaysf1_defense=0;
$awaysf1_workrate=0;
$awaysf1_experience=0;
$awaysf1_fatigue=0;
$awaypf1_charac=0;
$awaypf1_height=0;
$awaypf1_weight=0;
$awaypf1_handling=0;
$awaypf1_speed=0;
$awaypf1_passing=0;
$awaypf1_vision=0;
$awaypf1_rebounds=0;
$awaypf1_position=0;
$awaypf1_freethrow=0;
$awaypf1_shooting=0;
$awaypf1_defense=0;
$awaypf1_workrate=0;
$awaypf1_experience=0;
$awaypf1_fatigue=0;
$awayc1_charac=0;
$awayc1_height=0;
$awayc1_weight=0;
$awayc1_handling=0;
$awayc1_speed=0;
$awayc1_passing=0;
$awayc1_vision=0;
$awayc1_rebounds=0;
$awayc1_position=0;
$awayc1_freethrow=0;
$awayc1_shooting=0;
$awayc1_defense=0;
$awayc1_workrate=0;
$awayc1_experience=0;
$awayc1_fatigue=0;

$homepg1 = mysql_query("SELECT charac, height, weight, handling, speed, passing, vision, rebounds, position, freethrow, shooting, defense, workrate, experience, fatigue FROM players WHERE id=$home_pg1");
while ($aa=mysql_fetch_array($homepg1)) {
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
while ($aa=mysql_fetch_array($homesg1)) {
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
while ($aa=mysql_fetch_array($homesf1)) {
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
while ($aa=mysql_fetch_array($homepf1)) {
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
while ($aa=mysql_fetch_array($homec1)) {
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

$awaypg1 = mysql_query("SELECT charac, height, weight, handling, speed, passing, vision, rebounds, position, freethrow, shooting, defense, workrate, experience, fatigue FROM players WHERE id=$away_pg1");
while ($aa=mysql_fetch_array($awaypg1)) {
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
while ($aa=mysql_fetch_array($awaysg1)) {
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
while ($aa=mysql_fetch_array($awaysf1)) {
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
while ($aa=mysql_fetch_array($awaypf1)) {
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
while ($aa=mysql_fetch_array($awayc1)) {
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

//VERJETNOSTI

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
$homepg1_za_dve = round(98 - ($heightbonus + ($homepg1_speed/11) + ($homepg1_vision/16) + ($homepg1_position/7) + (sqrt($homepg1_shooting*4)) - ($homepg1_fatigue/2) + $addcharac - ($awaypg1_defense/9) - ((abs($homepg1_weight-83))/5)));

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
$homesg1_za_dve =round(99 - ($heightbonus + ($homesg1_speed/11) + ($homesg1_vision/15) + ($homesg1_position/7) + (sqrt($homesg1_shooting*4)) - ($homesg1_fatigue/2) + $addcharac - ($awaysg1_defense/8) - ((abs($homesg1_weight-91))/5)));

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
$homesf1_za_dve = round(104 - ($heightbonus + ($homesf1_speed/11) + ($homesf1_vision/16) + ($homesf1_position/7) + (sqrt($homesf1_shooting*4)) - ($homesf1_fatigue/2) + $addcharac - ($awaysf1_defense/7) - ((abs($homesf1_weight-100))/6)));

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
$homepf1_za_dve = round(99 - ($heightbonus + ($homepf1_speed/12) + ($homepf1_position/7) + (sqrt($homepf1_shooting*4)) - ($homepf1_fatigue/2) + $addcharac - ($awaypf1_defense/8) - ((abs($homepf1_weight-106))/7)));

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
$homec1_za_dve = round(98 - ($heightbonus + ($homec1_speed/11) + ($homec1_position/7) + (sqrt($homec1_shooting*4)) - ($homec1_fatigue/2) + $addcharac - ($awayc1_defense/9) - ((abs($homec1_weight-115))/7)));


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
$awaypg1_za_dve = round(98 - ($heightbonus + ($awaypg1_speed/11) + ($awaypg1_vision/16) + ($awaypg1_position/7) + (sqrt($awaypg1_shooting*4)) - ($awaypg1_fatigue/2) + $addcharac - ($homepg1_defense/9) - ((abs($awaypg1_weight-83))/5)));

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
$awaysg1_za_dve = round(99 - ($heightbonus + ($awaysg1_speed/11) + ($awaysg1_vision/15) + ($awaysg1_position/7) + (sqrt($awaysg1_shooting*4)) - ($awaysg1_fatigue/2) + $addcharac - ($homesg1_defense/8) - ((abs($awaysg1_weight-91))/5)));

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
$awaysf1_za_dve = round(104 - ($heightbonus + ($awaysf1_speed/11) + ($awaysf1_vision/16) + ($awaysf1_position/7) + (sqrt($awaysf1_shooting*4)) - ($awaysf1_fatigue/2) + $addcharac - ($homesf1_defense/7) - ((abs($awaysf1_weight-100))/6)));

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
$awaypf1_za_dve = round(99 - ($heightbonus + ($awaypf1_speed/12) + ($awaypf1_position/7) + (sqrt($awaypf1_shooting*4)) - ($awaypf1_fatigue/2) + $addcharac - ($homepf1_defense/8) - ((abs($awaypf1_weight-106))/7)));

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
$awayc1_za_dve = round(98 - ($heightbonus + ($awayc1_speed/11) + ($awayc1_position/7) + (sqrt($awayc1_shooting*4)) - ($awayc1_fatigue/2) + $addcharac - ($homec1_defense/9) - ((abs($awayc1_weight-115))/7)));

//verjetnost posameznega igralca da zadane met za tri tocke

if ($homepg1_charac >3 AND $homepg1_charac < 7){$addcharac =3;} elseif ($homepg1_charac > 6 AND $homepg1_charac < 11){$addcharac =3;} elseif ($homepg1_charac > 16){$addcharac = -3;} else {$addcharac = 0;}
$homepg1_za_tri= 51-(($homepg1_speed/16) +($homepg1_position/14)+(sqrt($homepg1_shooting*5))+($homepg1_experience/6)-($homepg1_fatigue/2)+($homepg1_freethow/18) +$addcharac - ($awaypg1_defense/15));
if ($homepg1_za_tri < 8) {$homepg1_za_tri=8;}
if ($homesg1_charac >3 AND $homesg1_charac < 7){$addcharac =3;} elseif ($homesg1_charac > 6 AND $homesg1_charac < 11){$addcharac =3;} elseif ($homesg1_charac > 16){$addcharac = -3;} else {$addcharac = 0;}
$homesg1_za_tri= 51-(($homesg1_speed/16) +($homesg1_position/14)+(sqrt($homesg1_shooting*5))+($homesg1_experience/6)-($homesg1_fatigue/2)+($homesg1_freethow/18) +$addcharac - ($awaysg1_defense/15));
if ($homesg1_za_tri < 8) {$homesg1_za_tri=8;}
if ($homesf1_charac >3 AND $homesf1_charac < 7){$addcharac =3;} elseif ($homesf1_charac > 6 AND $homesf1_charac < 11){$addcharac =3;} elseif ($homesf1_charac > 16){$addcharac = -3;} else {$addcharac = 0;}
$homesf1_za_tri= 56-(($homesf1_speed/16)+($homesf1_position/14)+(sqrt($homesf1_shooting*5))+($homesf1_experience/6)-($homesf1_fatigue/2)+($homesf1_freethow/18) +$addcharac - ($awaysf1_defense/15));
if ($homesf1_za_tri < 8) {$homesf1_za_tri=8;}
if ($homepf1_charac >3 AND $homepf1_charac < 7){$addcharac =3;} elseif ($homepf1_charac > 6 AND $homepf1_charac < 11){$addcharac =3;} elseif ($homepf1_charac > 16){$addcharac = -3;} else {$addcharac = 0;}
$homepf1_za_tri= 58-(($homepf1_speed/16)+($homepf1_position/14)+(sqrt($homepf1_shooting*5))+($homepf1_experience/6)-($homepf1_fatigue/2)+($homepf1_freethow/18) +$addcharac - ($awaypf1_defense/15));
if ($homepf1_za_tri < 8) {$homepf1_za_tri=8;}

if ($awaypg1_charac >3 AND $awaypg1_charac < 7){$addcharac =3;} elseif ($awaypg1_charac > 6 AND $awaypg1_charac < 11){$addcharac =3;} elseif ($awaypg1_charac > 16){$addcharac = -3;} else {$addcharac = 0;}
$awaypg1_za_tri= 51-(($awaypg1_speed/16)+($awaypg1_position/14)+(sqrt($awaypg1_shooting*5))+($awaypg1_experience/6)-($awaypg1_fatigue/2)+($awaypg1_freethow/18) +$addcharac - ($homepg1_defense/15));
if ($awaypg1_za_tri < 8) {$awaypg1_za_tri=8;}
if ($awaysg1_charac >3 AND $awaysg1_charac < 7){$addcharac =3;} elseif ($awaysg1_charac > 6 AND $awaysg1_charac < 11){$addcharac =3;} elseif ($awaysg1_charac > 16){$addcharac = -3;} else {$addcharac = 0;}
$awaysg1_za_tri= 51-(($awaysg1_speed/16)+($awaysg1_position/14)+(sqrt($awaysg1_shooting*5))+($awaysg1_experience/6)-($awaysg1_fatigue/2)+($awaysg1_freethow/18) +$addcharac - ($homesg1_defense/15));
if ($awaysg1_za_tri < 8) {$awaysg1_za_tri=8;}
if ($awaysf1_charac >3 AND $awaysf1_charac < 7){$addcharac =3;} elseif ($awaysf1_charac > 6 AND $awaysf1_charac < 11){$addcharac =3;} elseif ($awaysf1_charac > 16){$addcharac = -3;} else {$addcharac = 0;}
$awaysf1_za_tri= 56-(($awaysf1_speed/16)+($awaysf1_position/14)+(sqrt($awaysf1_shooting*5))+($awaysf1_experience/6)-($awaysf1_fatigue/2)+($awaysf1_freethow/18) +$addcharac - ($homesf1_defense/15));
if ($awaysf1_za_tri < 8) {$awaysf1_za_tri=8;}
if ($awaypf1_charac >3 AND $awaypf1_charac < 7){$addcharac =3;} elseif ($awaypf1_charac > 6 AND $awaypf1_charac < 11){$addcharac =3;} elseif ($awaypf1_charac > 16){$addcharac = -3;} else {$addcharac = 0;}
$awaypf1_za_tri= 58-(($awaypf1_speed/16)+($awaypf1_position/14)+(sqrt($awaypf1_shooting*5))+($awaypf1_experience/6)-($awaypf1_fatigue/2)+($awaypf1_freethow/18) +$addcharac - ($homepf1_defense/15));
if ($awaypf1_za_tri < 8) {$awaypf1_za_tri=8;}

//moznost za skok

if ($homepg1_charac > 10 AND $homepg1_charac < 14){$addcharac = 3;} else {$addcharac = 0;}
$homepg1_skok = round(($addcharac + ($homepg1_speed /5) + ($homepg1_position /2) + ($homepg1_experience /4) - ($homepg1_fatigue *3) + ($homepg1_rebounds /2)) * ($homepg1_height / 190));
if ($homesg1_charac > 10 AND $homesg1_charac < 14){$addcharac = 3;} else {$addcharac = 0;}
$homesg1_skok = round(($addcharac + ($homesg1_speed /5) + ($homesg1_position /2) + ($homesg1_experience /4) - ($homesg1_fatigue *3) + ($homesg1_rebounds /2)) * ($homesg1_height / 190));
if ($homesf1_charac > 10 AND $homesf1_charac < 14){$addcharac = 8;} else {$addcharac = 0;} $hkoef = 0.63 + atan($homesf1_height/10 - 18) / M_PI;
$homesf1_skok = round(($addcharac + ($homesf1_weight /4) + ($homesf1_speed /3) + ($homesf1_position /2) + ($homesf1_experience /5) - ($homesf1_fatigue *2) + ($homesf1_rebounds * 0.75)) * $hkoef);
if ($homepf1_charac > 10 AND $homepf1_charac < 14){$addcharac = 8;} else {$addcharac = 0;} $hkoef = 0.65 + atan($homepf1_height/9 - 21) / M_PI;
$homepf1_skok = round(($addcharac + ($homepf1_weight /4) + ($homepf1_speed /3) + ($homepf1_position /2) + ($homepf1_experience /5) - ($homepf1_fatigue *2) + ($homepf1_rebounds * 0.9)) * $hkoef);
if ($homec1_charac > 10 AND $homec1_charac < 14){$addcharac = 8;} else {$addcharac = 0;} $hkoef = 0.7 + atan($homec1_height/9 - 22) / M_PI;
$homec1_skok = round(($addcharac + ($homec1_weight /4) + ($homec1_speed /3) + ($homec1_position /2) + ($homec1_experience /5) - ($homec1_fatigue *2) + $homec1_rebounds) * $hkoef);

if ($awaypg1_charac > 10 AND $awaypg1_charac < 14){$addcharac = 3;} else {$addcharac = 0;}
$awaypg1_skok = round(($addcharac + ($awaypg1_speed /5) + ($awaypg1_position /2) + ($awaypg1_experience /4) - ($awaypg1_fatigue *3) + ($awaypg1_rebounds /2)) * ($awaypg1_height / 190));
if ($awaysg1_charac > 10 AND $awaysg1_charac < 14){$addcharac = 3;} else {$addcharac = 0;}
$awaysg1_skok = round(($addcharac + ($awaysg1_speed /5) + ($awaysg1_position /2) + ($awaysg1_experience /4) - ($awaysg1_fatigue *3) + ($awaysg1_rebounds /2)) * ($awaysg1_height / 190));
if ($awaysf1_charac > 10 AND $awaysf1_charac < 14){$addcharac = 8;} else {$addcharac = 0;} $hkoef = 0.63 + atan($awaysf1_height/10 - 18) / M_PI;
$awaysf1_skok = round(($addcharac + ($awaysf1_weight /4) + ($awaysf1_speed /3) + ($awaysf1_position /2) + ($awaysf1_experience /5) - ($awaysf1_fatigue *2) + ($awaysf1_rebounds * 0.75)) * $hkoef);
if ($awaypf1_charac > 10 AND $awaypf1_charac < 14){$addcharac = 8;} else {$addcharac = 0;} $hkoef = 0.65 + atan($awaypf1_height/9 - 21) / M_PI;
$awaypf1_skok = round(($addcharac + ($awaypf1_weight /4) + ($awaypf1_speed /3) + ($awaypf1_position /2) + ($awaypf1_experience /5) - ($awaypf1_fatigue *2) + ($awaypf1_rebounds * 0.9)) * $hkoef);
if ($awayc1_charac > 10 AND $awayc1_charac < 14){$addcharac = 8;} else {$addcharac = 0;} $hkoef = 0.7 + atan($awayc1_height/9 - 22) / M_PI;
$awayc1_skok = round(($addcharac + ($awayc1_weight /4) + ($awayc1_speed /3) + ($awayc1_position /2) + ($awayc1_experience /5) - ($awayc1_fatigue *2) + $awayc1_rebounds) * $hkoef);

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

if ($homepg1_charac >6 && $homepg1_charac < 11) {$addcharacter=4;} elseif ($homepg1_charac >10 && $homepg1_charac < 14) {$addcharacter= -5;} else {$addcharacter=0;}
$homepg1_v_napadu = round(49 - (($homepg1_vision /7) + ($homepg1_position /9) - ($homepg1_fatigue /2) + ($homepg1_experience /5) + $addcharacter - ($awaypg1_position /6) - ($awaypg1_defense /8)));
if ($homesg1_charac >6 && $homesg1_charac < 11) {$addcharacter=4;} elseif ($homesg1_charac >10 && $homesg1_charac < 14) {$addcharacter= -5;} else {$addcharacter=0;}
$homesg1_v_napadu = round(49 - (($homesg1_vision /7) + ($homesg1_position /9) - ($homesg1_fatigue /2) + ($homesg1_experience /5) + $addcharacter - ($awaysg1_position /6) - ($awaysg1_defense /8)));
if ($homesf1_charac >6 && $homesf1_charac < 11) {$addcharacter=4;} elseif ($homesf1_charac >10 && $homesf1_charac < 14) {$addcharacter= -5;} else {$addcharacter=0;}
$homesf1_v_napadu = round(49 - (($homesf1_vision /8) + ($homesf1_position /9) - ($homesf1_fatigue /2) + ($homesf1_experience /5) + $addcharacter - ($awaysf1_position /6) - ($awaysf1_defense /7)));
if ($homepf1_charac >6 && $homepf1_charac < 11) {$addcharacter=4;} elseif ($homepf1_charac >10 && $homepf1_charac < 14) {$addcharacter= -5;} else {$addcharacter=0;}
$homepf1_v_napadu = round(49 - (($homepf1_vision /9) + ($homepf1_position /9) - ($homepf1_fatigue /2) + ($homepf1_experience /5) + $addcharacter - ($awaypf1_position /6) - ($awaypf1_defense /6)));
if ($homec1_charac >6 && $homec1_charac < 11) {$addcharacter=4;} elseif ($homec1_charac >10 && $homec1_charac < 14) {$addcharacter= -5;} else {$addcharacter=0;}
$homec1_v_napadu = round(49 - (($homec1_vision /9) + ($homec1_position /9) - ($homec1_fatigue /2) + ($homec1_experience /5) + $addcharacter - ($awayc1_position /6) - ($awayc1_defense /6)));

if ($awaypg1_charac >6 && $awaypg1_charac < 11) {$addcharacter=4;} elseif ($awaypg1_charac >10 && $awaypg1_charac < 14) {$addcharacter= -5;} else {$addcharacter=0;}
$awaypg1_v_napadu = round(49 - (($awaypg1_vision /7) + ($awaypg1_position /9) - ($awaypg1_fatigue /2) + ($awaypg1_experience /5) + $addcharacter - ($homepg1_position /6) - ($homepg1_defense /8)));
if ($awaysg1_charac >6 && $awaysg1_charac < 11) {$addcharacter=4;} elseif ($awaysg1_charac >10 && $awaysg1_charac < 14) {$addcharacter= -5;} else {$addcharacter=0;}
$awaysg1_v_napadu = round(49 - (($awaysg1_vision /7) + ($awaysg1_position /9) - ($awaysg1_fatigue /2) + ($awaysg1_experience /5) + $addcharacter - ($homesg1_position /6) - ($homesg1_defense /8)));
if ($awaysf1_charac >6 && $awaysf1_charac < 11) {$addcharacter=4;} elseif ($awaysf1_charac >10 && $awaysf1_charac < 14) {$addcharacter= -5;} else {$addcharacter=0;}
$awaysf1_v_napadu = round(49 - (($awaysf1_vision /8) + ($awaysf1_position /9) - ($awaysf1_fatigue /2) + ($awaysf1_experience /5) + $addcharacter - ($homesf1_position /6) - ($homesf1_defense /7)));
if ($awaypf1_charac >6 && $awaypf1_charac < 11) {$addcharacter=4;} elseif ($awaypf1_charac >10 && $awaypf1_charac < 14) {$addcharacter= -5;} else {$addcharacter=0;}
$awaypf1_v_napadu = round(49 - (($awaypf1_vision /9) + ($awaypf1_position /9) - ($awaypf1_fatigue /2) + ($awaypf1_experience /5) + $addcharacter - ($homepf1_position /6) - ($homepf1_defense /6)));
if ($awayc1_charac >6 && $awayc1_charac < 11) {$addcharacter=4;} elseif ($awayc1_charac >10 && $awayc1_charac < 14) {$addcharacter= -5;} else {$addcharacter=0;}
$awayc1_v_napadu = round(49 - (($awayc1_vision /9) + ($awayc1_position /9) - ($awayc1_fatigue /2) + ($awayc1_experience /5) + $addcharacter - ($homec1_position /6) - ($homec1_defense /6)));

//VERJETNOST ZA OSEBNO

if ($homepg1_charac >6 && $homepg1_charac <11) {$addcharacter= -10;} elseif ($homepg1_charac >10 && $homepg1_charac <14) {$addcharacter=10;} else {$addcharacter= 0;}
$homepg1_v_obrambi = round(((160 - $homepg1_speed) + (160 - $homepg1_position) + (160 - $homepg1_defense) + ((160 - $homepg1_experience) /2) + $awaypg1_speed + $awaypg1_position + $addcharacter + $homepg1_fatigue)/10)-11;

if ($homesg1_charac >6 && $homesg1_charac <11) {$addcharacter= -10;} elseif ($homesg1_charac >10 && $homesg1_charac <14) {$addcharacter=10;} else {$addcharacter= 0;}
$homesg1_v_obrambi = round(((160 - $homesg1_speed) + (160 - $homesg1_position) + (160 - $homesg1_defense) + ((160 - $homesg1_experience) /2) + $awaysg1_speed + $awaysg1_position + $addcharacter + $homesg1_fatigue)/10)-11;

if ($homesf1_charac >6 && $homesf1_charac <11) {$addcharacter= -10;} elseif ($homesf1_charac >10 && $homesf1_charac <14) {$addcharacter=10;} else {$addcharacter= 0;}
$homesf1_v_obrambi = round(((160 - $homesf1_speed) + (160 - $homesf1_position) + (160 - $homesf1_defense) + ((160 - $homesf1_experience) /2) + $awaysf1_speed + $awaysf1_position + $addcharacter + $homesf1_fatigue)/10)-11;

if ($homepf1_charac >6 && $homepf1_charac <11) {$addcharacter= -10;} elseif ($homepf1_charac >10 && $homepf1_charac <14) {$addcharacter=10;} else {$addcharacter=0;}
$homepf1_v_obrambi = round(((160 - $homepf1_speed) + (160 - $homepf1_position) + (160 - $homepf1_defense) + ((160 - $homepf1_experience) /2) + $awaypf1_speed + $awaypf1_position + $addcharacter + $homepf1_fatigue)/10)-11;

if ($homec1_charac >6 && $homec1_charac <11) {$addcharacter= -10;} elseif ($homec1_charac >10 && $homec1_charac <14) {$addcharacter=10;} else {$addcharacter=0;}
$homec1_v_obrambi = round(((160 - $homec1_speed) + (160 - $homec1_position) + (160 - $homec1_defense) + ((160 - $homec1_experience) /2) + $awayc1_speed + $awayc1_position + $addcharacter + $homec1_fatigue)/10)-11;


if ($awaypg1_charac >6 && $awaypg1_charac <11) {$addcharacter= -10;} elseif ($awaypg1_charac >10 && $awaypg1_charac <14) {$addcharacter=10;} else {$addcharacter=0;}
$awaypg1_v_obrambi = round(((160 - $awaypg1_speed) + (160 - $awaypg1_position) + (160 - $awaypg1_defense) + ((160 - $awaypg1_experience) /2) + $homepg1_speed + $homepg1_position + $addcharacter + $awaypg1_fatigue)/10)-11;

if ($awaysg1_charac >6 && $awaysg1_charac <11) {$addcharacter= -10;} elseif ($awaysg1_charac >10 && $awaysg1_charac <14) {$addcharacter=10;} else {$addcharacter=0;}
$awaysg1_v_obrambi = round(((160 - $awaysg1_speed) + (160 - $awaysg1_position) + (160 - $awaysg1_defense) + ((160 - $awaysg1_experience) /2) + $homesg1_speed + $homesg1_position + $addcharacter + $awaysg1_fatigue)/10)-11;

if ($awaysf1_charac >6 && $awaysf1_charac <11) {$addcharacter= -10;} elseif ($awaysf1_charac >10 && $awaysf1_charac <14) {$addcharacter=10;} else {$addcharacter=0;}
$awaysf1_v_obrambi = round(((160 - $awaysf1_speed) + (160 - $awaysf1_position) + (160 - $awaysf1_defense) + ((160 - $awaysf1_experience) /2) + $homesf1_speed + $homesf1_position + $addcharacter + $awaysf1_fatigue)/10)-11;

if ($awaypf1_charac >6 && $awaypf1_charac <11) {$addcharacter= -10;} elseif ($awaypf1_charac >10 && $awaypf1_charac <14) {$addcharacter=10;} else {$addcharacter=0;}
$awaypf1_v_obrambi = round(((160 - $awaypf1_speed) + (160 - $awaypf1_position) + (160 - $awaypf1_defense) + ((160 - $awaypf1_experience) /2) + $homepf1_speed + $homepf1_position + $addcharacter + $awaypf1_fatigue)/10)-11;

if ($awayc1_charac >6 && $awayc1_charac <11) {$addcharacter= -10;} elseif ($awayc1_charac >10 && $awayc1_charac <14) {$addcharacter=10;} else {$addcharacter=0;}
$awayc1_v_obrambi = round(((160 - $awayc1_speed) + (160 - $awayc1_position) + (160 - $awayc1_defense) + ((160 - $awayc1_experience) /2) + $homec1_speed + $homec1_position + $addcharacter + $awayc1_fatigue)/10)-11;

//VERJETNOST ZA TURNOVER

if ($homepg1_charac < 4) {$addch = 100;} else {$addch = 0;} $homepg1_napaka = round((601 + (abs($homepg1_height-187)) + (abs($homepg1_weight-83)) - $homepg1_vision - $homepg1_passing - $homepg1_experience - $homepg1_handling + $homepg1_fatigue*4 + $awaypg1_speed + $awaypg1_defense - $addch)/10);
if ($homesg1_charac < 4) {$addch = 100;} else {$addch = 0;} $homesg1_napaka = round((601 + (abs($homesg1_height-195)) + (abs($homesg1_weight-92)) - $homesg1_vision - $homesg1_passing - $homesg1_experience - $homesg1_handling + $homesg1_fatigue*4 + $awaysg1_speed + $awaysg1_defense - $addch)/10);
if ($homesf1_charac < 4) {$addch = 100;} else {$addch = 0;} $homesf1_napaka = round((601 + (abs($homesf1_height-201)) + (abs($homesf1_weight-100)) - $homesf1_vision - $homesf1_passing - $homesf1_experience - $homesf1_handling + $homesf1_fatigue*4 + $awaysf1_speed + $awaysf1_defense - $addch)/10);
if ($homepf1_charac < 4) {$addch = 100;} else {$addch = 0;} $homepf1_napaka = round((608 + (abs($homepf1_height-204)) - $homepf1_vision - $homepf1_passing - $homepf1_experience - $homepf1_handling + $homepf1_fatigue*4 + $awaypf1_speed + $awaypf1_defense - $addch)/10);
if ($homec1_charac < 4) {$addch = 100;} else {$addch = 0;}
$homec1_napaka = round((614 - $homec1_position - $homec1_passing - $homec1_experience - $homec1_handling + $homec1_fatigue*4 + $awayc1_speed + $awayc1_defense - $addch)/10);

if ($awaypg1_charac < 4) {$addch = 100;} else {$addch = 0;} $awaypg1_napaka = round((601 + (abs($awaypg1_height-187)) + (abs($awaypg1_weight-83)) - $awaypg1_vision - $awaypg1_passing - $awaypg1_experience - $awaypg1_handling + $awaypg1_fatigue*4 + $homepg1_speed + $homepg1_defense - $addch)/10);
if ($awaysg1_charac < 4) {$addch = 100;} else {$addch = 0;} $awaysg1_napaka = round((601 + (abs($awaysg1_height-195)) + (abs($awaysg1_weight-92)) - $awaysg1_vision - $awaysg1_passing - $awaysg1_experience - $awaysg1_handling + $awaysg1_fatigue*4 + $homesg1_speed + $homesg1_defense - $addch)/10);
if ($awaysf1_charac < 4) {$addch = 100;} else {$addch = 0;} $awaysf1_napaka = round((601 + (abs($awaysf1_height-201)) + (abs($awaysf1_weight-100)) - $awaysf1_vision - $awaysf1_passing - $awaysf1_experience - $awaysf1_handling + $awaysf1_fatigue*4 + $homesf1_speed + $homesf1_defense - $addch)/10);
if ($awaypf1_charac < 4) {$addch = 100;} else {$addch = 0;} $awaypf1_napaka = round((608 + (abs($awaypf1_height-204)) - $awaypf1_vision - $awaypf1_passing - $awaypf1_experience - $awaypf1_handling + $awaypf1_fatigue*4 + $homepf1_speed + $homepf1_defense - $addch)/10);
if ($awayc1_charac < 4) {$addch = 100;} else {$addch = 0;}
$awayc1_napaka = round((614 - $awayc1_position - $awayc1_passing - $awayc1_experience - $awayc1_handling + $awayc1_fatigue*4 + $homec1_speed + $homec1_defense - $addch)/10);

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

//star ratings
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

//ratingi
$homesk2 = $homepg1_za_dve + $homesg1_za_dve + $homesf1_za_dve + $homepf1_za_dve + $homec1_za_dve;
$awaysk2 = $awaypg1_za_dve + $awaysg1_za_dve + $awaysf1_za_dve + $awaypf1_za_dve + $awayc1_za_dve;
$homesk3 = $homepg1_za_tri + $homesg1_za_tri + $homesf1_za_tri + $homepf1_za_tri + $homec1_za_tri + 4;
$awaysk3 = $awaypg1_za_tri + $awaysg1_za_tri + $awaysf1_za_tri + $awaypf1_za_tri + $awayc1_za_tri + 4;
$homefat = $homepg1_fatigue + $homesg1_fatigue + $homesf1_fatigue + $homepf1_fatigue + $homec1_fatigue;
$awayfat = $awaypg1_fatigue + $awaysg1_fatigue + $awaysf1_fatigue + $awaypf1_fatigue + $awayc1_fatigue;
$hometo = $homepg1_handling + $homesg1_vision + $homesf1_passing + $homepf1_passing + $homec1_speed;
$awayto = $awaypg1_handling + $awaysg1_vision + $awaysf1_passing + $awaypf1_passing + $awayc1_speed;

$dokkveri = "UPDATE `matches` SET `hpg_rating` =$hpgzvezd, `hsg_rating` =$hsgzvezd, `hsf_rating` =$hsfzvezd, `hpf_rating` =$hpfzvezd, `hc_rating` =$hczvezd, `apg_rating` =$apgzvezd, `asg_rating` =$asgzvezd, `asf_rating` =$asfzvezd, `apf_rating` =$apfzvezd, `ac_rating` =$aczvezd, h2p = '$homesk2', a2p = '$awaysk2', h3p = '$homesk3', a3p = '$awaysk3', hreb = $homeoffskok + $homedefskok, areb = $awayoffskok + $awaydefskok, hto = '$hometo', ato = '$awayto', htir = '$homefat', atir = '$awayfat' WHERE `matchid`=$matchid LIMIT 1";
mysql_query($dokkveri);
}
die("_____");
?>