<?php
require_once("cron2conect.php");

//TOO SMALL TEAMS
$result = mysql_query("SELECT teamid FROM teams WHERE status<>0") or die (mysql_error());
while($r=mysql_fetch_array($result)) {
$teamid=$r[teamid];
$rule = mysql_query("SELECT id FROM players WHERE coach=0 AND isonsale<>1 AND club=$teamid") or die (mysql_error());
$dong = mysql_num_rows($rule);
if ($dong < 5) {
$lim = 10 - $dong;
$apd = "UPDATE `players` SET `club`=$teamid, `wage`=200 WHERE `fatigue`=0 AND `injury`=0 AND `3points`=0 AND `coach`=0 AND `club`=0 AND `wage`=201 LIMIT $lim";
mysql_query($apd);
mysql_query("INSERT INTO events VALUES ('', $teamid, NOW(), 'Club was forced to bring in additional players to make sure that matches can be played!', 0, 0);") or die (mysql_error());
}
}
//WRONG PLAYERS
$lu = mysql_query("SELECT tactics_team, start_pg FROM tactics");
while ($a = mysql_fetch_array($lu)) {
$t = $a[tactics_team];
$p = $a[start_pg];
$labim = mysql_query("SELECT id FROM players, tactics WHERE coach=0 AND club=tactics_team AND club=$t AND id=$p");
if (mysql_num_rows($labim)==0) {mysql_query("UPDATE tactics SET start_pg=0 WHERE tactics_team=$t LIMIT 1");}
}
$lu = mysql_query("SELECT tactics_team, start_sg FROM tactics");
while ($a = mysql_fetch_array($lu)) {
$t = $a[tactics_team];
$p = $a[start_sg];
$labim = mysql_query("SELECT id FROM players, tactics WHERE coach=0 AND club=tactics_team AND club=$t AND id=$p");
if (mysql_num_rows($labim)==0) {mysql_query("UPDATE tactics SET start_sg=0 WHERE tactics_team=$t LIMIT 1");}
}
$lu = mysql_query("SELECT tactics_team, start_sf FROM tactics");
while ($a = mysql_fetch_array($lu)) {
$t = $a[tactics_team];
$p = $a[start_sf];
$labim = mysql_query("SELECT id FROM players, tactics WHERE coach=0 AND club=tactics_team AND club=$t AND id=$p");
if (mysql_num_rows($labim)==0) {mysql_query("UPDATE tactics SET start_sf=0 WHERE tactics_team=$t LIMIT 1");}
}
$lu = mysql_query("SELECT tactics_team, start_pf FROM tactics");
while ($a = mysql_fetch_array($lu)) {
$t = $a[tactics_team];
$p = $a[start_pf];
$labim = mysql_query("SELECT id FROM players, tactics WHERE coach=0 AND club=tactics_team AND club=$t AND id=$p");
if (mysql_num_rows($labim)==0) {mysql_query("UPDATE tactics SET start_pf=0 WHERE tactics_team=$t LIMIT 1");}
}
$lu = mysql_query("SELECT tactics_team, start_c FROM tactics");
while ($a = mysql_fetch_array($lu)) {
$t = $a[tactics_team];
$p = $a[start_c];
$labim = mysql_query("SELECT id FROM players, tactics WHERE coach=0 AND club=tactics_team AND club=$t AND id=$p");
if (mysql_num_rows($labim)==0) {mysql_query("UPDATE tactics SET start_c=0 WHERE tactics_team=$t LIMIT 1");}
}
$lu = mysql_query("SELECT tactics_team, res_pg FROM tactics");
while ($a = mysql_fetch_array($lu)) {
$t = $a[tactics_team];
$p = $a[res_pg];
$labim = mysql_query("SELECT id FROM players, tactics WHERE coach=0 AND club=tactics_team AND club=$t AND id=$p");
if (mysql_num_rows($labim)==0) {mysql_query("UPDATE tactics SET res_pg=0 WHERE tactics_team=$t LIMIT 1");}
}
$lu = mysql_query("SELECT tactics_team, res_sg FROM tactics");
while ($a = mysql_fetch_array($lu)) {
$t = $a[tactics_team];
$p = $a[res_sg];
$labim = mysql_query("SELECT id FROM players, tactics WHERE coach=0 AND club=tactics_team AND club=$t AND id=$p");
if (mysql_num_rows($labim)==0) {mysql_query("UPDATE tactics SET res_sg=0 WHERE tactics_team=$t LIMIT 1");}
}
$lu = mysql_query("SELECT tactics_team, res_sf FROM tactics");
while ($a = mysql_fetch_array($lu)) {
$t = $a[tactics_team];
$p = $a[res_sf];
$labim = mysql_query("SELECT id FROM players, tactics WHERE coach=0 AND club=tactics_team AND club=$t AND id=$p");
if (mysql_num_rows($labim)==0) {mysql_query("UPDATE tactics SET res_sf=0 WHERE tactics_team=$t LIMIT 1");}
}
$lu = mysql_query("SELECT tactics_team, res_pf FROM tactics");
while ($a = mysql_fetch_array($lu)) {
$t = $a[tactics_team];
$p = $a[res_pf];
$labim = mysql_query("SELECT id FROM players, tactics WHERE coach=0 AND club=tactics_team AND club=$t AND id=$p");
if (mysql_num_rows($labim)==0) {mysql_query("UPDATE tactics SET res_pf=0 WHERE tactics_team=$t LIMIT 1");}
}
$lu = mysql_query("SELECT tactics_team, res_c FROM tactics");
while ($a = mysql_fetch_array($lu)) {
$t = $a[tactics_team];
$p = $a[res_c];
$labim = mysql_query("SELECT id FROM players, tactics WHERE coach=0 AND club=tactics_team AND club=$t AND id=$p");
if (mysql_num_rows($labim)==0) {mysql_query("UPDATE tactics SET res_c=0 WHERE tactics_team=$t LIMIT 1");}
}
//WRONG LINEUPS
$lineup = mysql_query("SELECT tactics_team, start_pg, start_sg, start_sf, start_pf, start_c, res_pg, res_sg, res_sf, res_pf, res_c FROM tactics");
while ($b = mysql_fetch_array($lineup)) {
$napak=0;
$team = $b[tactics_team];
if ($b[start_pg]==0) {$napak=$napak+1;}
if ($b[start_sg]==0) {$napak=$napak+1;}
if ($b[start_sf]==0) {$napak=$napak+1;}
if ($b[start_pf]==0) {$napak=$napak+1;}
if ($b[start_c]==0) {$napak=$napak+1;}
if ($b[res_pg]==0) {$napak=$napak+1;}
if ($b[res_sg]==0) {$napak=$napak+1;}
if ($b[res_sf]==0) {$napak=$napak+1;}
if ($b[res_pf]==0) {$napak=$napak+1;}
if ($b[res_c]==0) {$napak=$napak+1;}
if ($napak > 5) {
$array_playerid[5]=0;
$array_playerid[6]=0;
$array_playerid[7]=0;
$array_playerid[8]=0;
$array_playerid[9]=0;
$array_playerid[10]=0;
$array_playerid[11]=0;
$plaqer = mysql_query("SELECT id FROM players WHERE coach=0 AND club=$team ORDER BY isonsale ASC") or die(mysql_error());
$pum=mysql_num_rows($plaqer);
$p=0;
while ($p < $pum) {
$id=mysql_result($plaqer,$p);
$array_playerid[$p] = $id;
$p++;
}
mysql_query("DELETE FROM tactics WHERE tactics_team = $team LIMIT 1") or die(mysql_error());
mysql_query("INSERT INTO tactics VALUES ($team, $array_playerid[0], $array_playerid[1], $array_playerid[2], $array_playerid[3], $array_playerid[4], $array_playerid[5], $array_playerid[6], $array_playerid[7], $array_playerid[8], $array_playerid[9], $array_playerid[10], $array_playerid[11]);") or die(mysql_error());
}
}
echo "_TAKTIKESOSUPERtorek_";
?>