<?php
ini_set("max_execution_time",2800);
require_once("cron2conect.php");

//odigran je bil krog serije v tekmovanju
mysql_query("UPDATE ekipe SET played=played+1 WHERE competition=2") or die(mysql_error());

$konec = mysql_query("SELECT `matchid`, `home_id`, `away_id`, `time`, `home_pg1`, `home_sg1`, `home_sf1`, `home_pf1`, `home_c1`, `away_pg1`, `away_sg1`, `away_sf1`, `away_pf1`, `away_c1`, `home_pg2`, `home_sg2`, `home_sf2`,  `home_pf2`, `home_c2`, `away_pg2`, `away_sg2`, `away_sf2`, `away_pf2`, `away_c2`, `country`, `lid_round` FROM `matches` WHERE `crowd1`>'0' AND `home_score`='0' AND `type`='7'") or die(mysql_error());
while ($rum=mysql_fetch_array($konec)) {
$matchid = $rum["matchid"];
$home_id = $rum["home_id"];
$away_id = $rum["away_id"];
$cas_tekme = $rum["time"];
$home_pg1 = $rum["home_pg1"];
$home_sg1 = $rum["home_sg1"];
$home_sf1 = $rum["home_sf1"];
$home_pf1 = $rum["home_pf1"];
$home_c1 = $rum["home_c1"];
$away_pg1 = $rum["away_pg1"];
$away_sg1 = $rum["away_sg1"];
$away_sf1 = $rum["away_sf1"];
$away_pf1 = $rum["away_pf1"];
$away_c1 = $rum["away_c1"];
$home_pg2 = $rum["home_pg2"];
$home_sg2 = $rum["home_sg2"];
$home_sf2 = $rum["home_sf2"];
$home_pf2 = $rum["home_pf2"];
$home_c2 = $rum["home_c2"];
$away_pg2 = $rum["away_pg2"];
$away_sg2 = $rum["away_sg2"];
$away_sf2 = $rum["away_sf2"];
$away_pf2 = $rum["away_pf2"];
$away_c2 = $rum["away_c2"];
$country = $rum["country"];
$lid_round = $rum["lid_round"];
@mysql_query("INSERT INTO events VALUES ('', $home_id, NOW(), 'Cup Winners Series match was played.', 0, 0);");
@mysql_query("INSERT INTO events VALUES ('', $away_id, NOW(), 'Cup Winners Series match was played.', 0, 0);");

//poskodbe
$pask = mysql_query("SELECT playerid, injuredfor FROM injuries WHERE tendency=0 AND matchid=$matchid");
while ($ps = mysql_fetch_array($pask)) {
$poplay = $ps[playerid];
$injufor = $ps[injuredfor];
mysql_query("UPDATE players SET injury = injury + $injufor WHERE id = $poplay LIMIT 1");
}

$koncnirezultat = mysql_query("SELECT `home_sc`, `away_sc` FROM `matchevents1` WHERE `match_id`=$matchid ORDER BY `event_time` DESC, `player1id` ASC LIMIT 1") or die(mysql_error());
if (mysql_num_rows($koncnirezultat) > 0)
{
   $domaci = mysql_result($koncnirezultat,0,"home_sc");
   $gostje = mysql_result($koncnirezultat,0,"away_sc");

if (($domaci >1) && ($gostje >1)) {
$q1 = mysql_query("SELECT home_sc, away_sc FROM `matchevents1` WHERE `quater`=1 AND `match_id` ='$matchid' ORDER BY `event_id` DESC LIMIT 1");
$hq1=mysql_result($q1,0,"home_sc"); $aq1=mysql_result($q1,0,"away_sc");
$q2 = mysql_query("SELECT home_sc, away_sc FROM `matchevents1` WHERE `quater`=2 AND `match_id` ='$matchid' ORDER BY `event_id` DESC LIMIT 1");
$hq2=mysql_result($q2,0,"home_sc"); $aq2=mysql_result($q2,0,"away_sc");
$q3 = mysql_query("SELECT home_sc, away_sc FROM `matchevents1` WHERE `quater`=3 AND `match_id` ='$matchid' ORDER BY `event_id` DESC LIMIT 1");
$hq3=mysql_result($q3,0,"home_sc"); $aq3=mysql_result($q3,0,"away_sc");
mysql_query("UPDATE `matches` SET `home_score` ='$domaci', `away_score` ='$gostje', HQ1=$hq1, HQ2=$hq2, HQ3=$hq3, AQ1=$aq1, AQ2=$aq2, AQ3=$aq3 WHERE `matchid` ='$matchid' LIMIT 1");} else {mysql_query("UPDATE `matches` SET `home_score` ='$domaci', `away_score` ='$gostje' WHERE `matchid` ='$matchid' LIMIT 1");}
}

if ($domaci > $gostje) {
mysql_query("UPDATE ekipe SET won=won+1 WHERE competition=2 AND ekipa=$home_id LIMIT 1") or die(mysql_error());
mysql_query("UPDATE teams SET `conwins`='0' WHERE `teamid` = '$away_id' LIMIT 1"); mysql_query("UPDATE `teams` SET `conwins`=`conwins`+1 WHERE `teamid` = '$home_id' LIMIT 1");
}
else {
mysql_query("UPDATE ekipe SET won=won+1 WHERE competition=2 AND ekipa=$away_id LIMIT 1") or die(mysql_error());
mysql_query("UPDATE teams SET `conwins`='0' WHERE `teamid` = '$home_id' LIMIT 1"); mysql_query("UPDATE `teams` SET `conwins`=`conwins`+1 WHERE `teamid`= '$away_id' LIMIT 1");
}

//OBDELAVA STATISTIKE
if ($domaci>1 && $gostje>1) {

//cas
$ftime = time(); $fyear=date('Y', $ftime); $fmonth=date('m', $ftime); $fday=date('d', $ftime); $fhour=date('H', $ftime); $fmin=date('i', $ftime); $fsec=date('s', $ftime);

//TWOPOINTS

//domaci

$sql_faljeni2 = "SELECT COUNT(*) AS faljeni2 FROM matchevents1 WHERE (event_type=3 OR event_type=4 OR event_type=28 OR event_type=29 OR event_type=31) AND match_id=$matchid AND player1id=$home_pg1";
$query_faljeni2 = mysql_query($sql_faljeni2);
$row1 = mysql_fetch_array($query_faljeni2, MYSQL_ASSOC);
$sql_zadeti2 = "SELECT COUNT(*) AS zadeti2 FROM matchevents1 WHERE (event_type=1 OR event_type=2 OR event_type=27 OR event_type=23 OR event_type=12) AND match_id=$matchid AND player1id=$home_pg1";
$query_zadeti2 = mysql_query($sql_zadeti2);
$row2 = mysql_fetch_array($query_zadeti2, MYSQL_ASSOC);
$faljeni2_pg1 = $row1['faljeni2'];
$zadeti2_pg1 = $row2['zadeti2'];

$sql_faljeni2 = "SELECT COUNT(*) AS faljeni2 FROM matchevents1 WHERE (event_type=3 OR event_type=4 OR event_type=28 OR event_type=29 OR event_type=31) AND match_id=$matchid AND player1id=$home_sg1";
$query_faljeni2 = mysql_query($sql_faljeni2);
$row1 = mysql_fetch_array($query_faljeni2, MYSQL_ASSOC);
$sql_zadeti2 = "SELECT COUNT(*) AS zadeti2 FROM matchevents1 WHERE (event_type=1 OR event_type=2 OR event_type=27 OR event_type=23 OR event_type=12) AND match_id=$matchid AND player1id=$home_sg1";
$query_zadeti2 = mysql_query($sql_zadeti2);
$row2 = mysql_fetch_array($query_zadeti2, MYSQL_ASSOC);
$faljeni2_sg1 = $row1['faljeni2'];
$zadeti2_sg1 = $row2['zadeti2'];

$sql_faljeni2 = "SELECT COUNT(*) AS faljeni2 FROM matchevents1 WHERE (event_type=3 OR event_type=4 OR event_type=28 OR event_type=29 OR event_type=31) AND match_id=$matchid AND player1id=$home_sf1";
$query_faljeni2 = mysql_query($sql_faljeni2);
$row1 = mysql_fetch_array($query_faljeni2, MYSQL_ASSOC);
$sql_zadeti2 = "SELECT COUNT(*) AS zadeti2 FROM matchevents1 WHERE (event_type=1 OR event_type=2 OR event_type=27 OR event_type=23 OR event_type=12) AND match_id=$matchid AND player1id=$home_sf1";
$query_zadeti2 = mysql_query($sql_zadeti2);
$row2 = mysql_fetch_array($query_zadeti2, MYSQL_ASSOC);
$faljeni2_sf1 = $row1['faljeni2'];
$zadeti2_sf1 = $row2['zadeti2'];

$sql_faljeni2 = "SELECT COUNT(*) AS faljeni2 FROM matchevents1 WHERE (event_type=3 OR event_type=4 OR event_type=28 OR event_type=29 OR event_type=31) AND match_id=$matchid AND player1id=$home_pf1";
$query_faljeni2 = mysql_query($sql_faljeni2);
$row1 = mysql_fetch_array($query_faljeni2, MYSQL_ASSOC);
$sql_zadeti2 = "SELECT COUNT(*) AS zadeti2 FROM matchevents1 WHERE (event_type=1 OR event_type=2 OR event_type=27 OR event_type=23 OR event_type=12) AND match_id=$matchid AND player1id=$home_pf1";
$query_zadeti2 = mysql_query($sql_zadeti2);
$row2 = mysql_fetch_array($query_zadeti2, MYSQL_ASSOC);
$faljeni2_pf1 = $row1['faljeni2'];
$zadeti2_pf1 = $row2['zadeti2'];

$sql_faljeni2 = "SELECT COUNT(*) AS faljeni2 FROM matchevents1 WHERE (event_type=3 OR event_type=4 OR event_type=28 OR event_type=29 OR event_type=31) AND match_id=$matchid AND player1id=$home_c1";
$query_faljeni2 = mysql_query($sql_faljeni2);
$row1 = mysql_fetch_array($query_faljeni2, MYSQL_ASSOC);
$sql_zadeti2 = "SELECT COUNT(*) AS zadeti2 FROM matchevents1 WHERE (event_type=1 OR event_type=2 OR event_type=27 OR event_type=23 OR event_type=12) AND match_id=$matchid AND player1id=$home_c1";
$query_zadeti2 = mysql_query($sql_zadeti2);
$row2 = mysql_fetch_array($query_zadeti2, MYSQL_ASSOC);
$faljeni2_c1 = $row1['faljeni2'];
$zadeti2_c1 = $row2['zadeti2'];

$sql_faljeni2 = "SELECT COUNT(*) AS faljeni2 FROM matchevents1 WHERE (event_type=3 OR event_type=4 OR event_type=28 OR event_type=29 OR event_type=31) AND match_id=$matchid AND player1id=$home_pg2";
$query_faljeni2 = mysql_query($sql_faljeni2);
$row1 = mysql_fetch_array($query_faljeni2, MYSQL_ASSOC);
$sql_zadeti2 = "SELECT COUNT(*) AS zadeti2 FROM matchevents1 WHERE (event_type=1 OR event_type=2 OR event_type=27 OR event_type=23 OR event_type=12) AND match_id=$matchid AND player1id=$home_pg2";
$query_zadeti2 = mysql_query($sql_zadeti2);
$row2 = mysql_fetch_array($query_zadeti2, MYSQL_ASSOC);
$faljeni2_pg2 = $row1['faljeni2'];
$zadeti2_pg2 = $row2['zadeti2'];

$sql_faljeni2 = "SELECT COUNT(*) AS faljeni2 FROM matchevents1 WHERE (event_type=3 OR event_type=4 OR event_type=28 OR event_type=29 OR event_type=31) AND match_id=$matchid AND player1id=$home_sg2";
$query_faljeni2 = mysql_query($sql_faljeni2);
$row1 = mysql_fetch_array($query_faljeni2, MYSQL_ASSOC);
$sql_zadeti2 = "SELECT COUNT(*) AS zadeti2 FROM matchevents1 WHERE (event_type=1 OR event_type=2 OR event_type=27 OR event_type=23 OR event_type=12) AND match_id=$matchid AND player1id=$home_sg2";
$query_zadeti2 = mysql_query($sql_zadeti2);
$row2 = mysql_fetch_array($query_zadeti2, MYSQL_ASSOC);
$faljeni2_sg2 = $row1['faljeni2'];
$zadeti2_sg2 = $row2['zadeti2'];

$sql_faljeni2 = "SELECT COUNT(*) AS faljeni2 FROM matchevents1 WHERE (event_type=3 OR event_type=4 OR event_type=28 OR event_type=29 OR event_type=31) AND match_id=$matchid AND player1id=$home_sf2";
$query_faljeni2 = mysql_query($sql_faljeni2);
$row1 = mysql_fetch_array($query_faljeni2, MYSQL_ASSOC);
$sql_zadeti2 = "SELECT COUNT(*) AS zadeti2 FROM matchevents1 WHERE (event_type=1 OR event_type=2 OR event_type=27 OR event_type=23 OR event_type=12) AND match_id=$matchid AND player1id=$home_sf2";
$query_zadeti2 = mysql_query($sql_zadeti2);
$row2 = mysql_fetch_array($query_zadeti2, MYSQL_ASSOC);
$faljeni2_sf2 = $row1['faljeni2'];
$zadeti2_sf2 = $row2['zadeti2'];

$sql_faljeni2 = "SELECT COUNT(*) AS faljeni2 FROM matchevents1 WHERE (event_type=3 OR event_type=4 OR event_type=28 OR event_type=29 OR event_type=31) AND match_id=$matchid AND player1id=$home_pf2";
$query_faljeni2 = mysql_query($sql_faljeni2);
$row1 = mysql_fetch_array($query_faljeni2, MYSQL_ASSOC);
$sql_zadeti2 = "SELECT COUNT(*) AS zadeti2 FROM matchevents1 WHERE (event_type=1 OR event_type=2 OR event_type=27 OR event_type=23 OR event_type=12) AND match_id=$matchid AND player1id=$home_pf2";
$query_zadeti2 = mysql_query($sql_zadeti2);
$row2 = mysql_fetch_array($query_zadeti2, MYSQL_ASSOC);
$faljeni2_pf2 = $row1['faljeni2'];
$zadeti2_pf2 = $row2['zadeti2'];

$sql_faljeni2 = "SELECT COUNT(*) AS faljeni2 FROM matchevents1 WHERE (event_type=3 OR event_type=4 OR event_type=28 OR event_type=29 OR event_type=31) AND match_id=$matchid AND player1id=$home_c2";
$query_faljeni2 = mysql_query($sql_faljeni2);
$row1 = mysql_fetch_array($query_faljeni2, MYSQL_ASSOC);
$sql_zadeti2 = "SELECT COUNT(*) AS zadeti2 FROM matchevents1 WHERE (event_type=1 OR event_type=2 OR event_type=27 OR event_type=23 OR event_type=12) AND match_id=$matchid AND player1id=$home_c2";
$query_zadeti2 = mysql_query($sql_zadeti2);
$row2 = mysql_fetch_array($query_zadeti2, MYSQL_ASSOC);
$faljeni2_c2 = $row1['faljeni2'];
$zadeti2_c2 = $row2['zadeti2'];

//gostje

$sql_faljeni2 = "SELECT COUNT(*) AS faljeni2 FROM matchevents1 WHERE (event_type=3 OR event_type=4 OR event_type=28 OR event_type=29 OR event_type=31) AND match_id=$matchid AND player1id=$away_pg1";
$query_faljeni2 = mysql_query($sql_faljeni2);
$row1 = mysql_fetch_array($query_faljeni2, MYSQL_ASSOC);
$sql_zadeti2 = "SELECT COUNT(*) AS zadeti2 FROM matchevents1 WHERE (event_type=1 OR event_type=2 OR event_type=27 OR event_type=23 OR event_type=12) AND match_id=$matchid AND player1id=$away_pg1";
$query_zadeti2 = mysql_query($sql_zadeti2);
$row2 = mysql_fetch_array($query_zadeti2, MYSQL_ASSOC);
$faljeni2_pg1a = $row1['faljeni2'];
$zadeti2_pg1a = $row2['zadeti2'];

$sql_faljeni2 = "SELECT COUNT(*) AS faljeni2 FROM matchevents1 WHERE (event_type=3 OR event_type=4 OR event_type=28 OR event_type=29 OR event_type=31) AND match_id=$matchid AND player1id=$away_sg1";
$query_faljeni2 = mysql_query($sql_faljeni2);
$row1 = mysql_fetch_array($query_faljeni2, MYSQL_ASSOC);
$sql_zadeti2 = "SELECT COUNT(*) AS zadeti2 FROM matchevents1 WHERE (event_type=1 OR event_type=2 OR event_type=27 OR event_type=23 OR event_type=12) AND match_id=$matchid AND player1id=$away_sg1";
$query_zadeti2 = mysql_query($sql_zadeti2);
$row2 = mysql_fetch_array($query_zadeti2, MYSQL_ASSOC);
$faljeni2_sg1a = $row1['faljeni2'];
$zadeti2_sg1a = $row2['zadeti2'];

$sql_faljeni2 = "SELECT COUNT(*) AS faljeni2 FROM matchevents1 WHERE (event_type=3 OR event_type=4 OR event_type=28 OR event_type=29 OR event_type=31) AND match_id=$matchid AND player1id=$away_sf1";
$query_faljeni2 = mysql_query($sql_faljeni2);
$row1 = mysql_fetch_array($query_faljeni2, MYSQL_ASSOC);
$sql_zadeti2 = "SELECT COUNT(*) AS zadeti2 FROM matchevents1 WHERE (event_type=1 OR event_type=2 OR event_type=27 OR event_type=23 OR event_type=12) AND match_id=$matchid AND player1id=$away_sf1";
$query_zadeti2 = mysql_query($sql_zadeti2);
$row2 = mysql_fetch_array($query_zadeti2, MYSQL_ASSOC);
$faljeni2_sf1a = $row1['faljeni2'];
$zadeti2_sf1a = $row2['zadeti2'];

$sql_faljeni2 = "SELECT COUNT(*) AS faljeni2 FROM matchevents1 WHERE (event_type=3 OR event_type=4 OR event_type=28 OR event_type=29 OR event_type=31) AND match_id=$matchid AND player1id=$away_pf1";
$query_faljeni2 = mysql_query($sql_faljeni2);
$row1 = mysql_fetch_array($query_faljeni2, MYSQL_ASSOC);
$sql_zadeti2 = "SELECT COUNT(*) AS zadeti2 FROM matchevents1 WHERE (event_type=1 OR event_type=2 OR event_type=27 OR event_type=23 OR event_type=12) AND match_id=$matchid AND player1id=$away_pf1";
$query_zadeti2 = mysql_query($sql_zadeti2);
$row2 = mysql_fetch_array($query_zadeti2, MYSQL_ASSOC);
$faljeni2_pf1a = $row1['faljeni2'];
$zadeti2_pf1a = $row2['zadeti2'];

$sql_faljeni2 = "SELECT COUNT(*) AS faljeni2 FROM matchevents1 WHERE (event_type=3 OR event_type=4 OR event_type=28 OR event_type=29 OR event_type=31) AND match_id=$matchid AND player1id=$away_c1";
$query_faljeni2 = mysql_query($sql_faljeni2);
$row1 = mysql_fetch_array($query_faljeni2, MYSQL_ASSOC);
$sql_zadeti2 = "SELECT COUNT(*) AS zadeti2 FROM matchevents1 WHERE (event_type=1 OR event_type=2 OR event_type=27 OR event_type=23 OR event_type=12) AND match_id=$matchid AND player1id=$away_c1";
$query_zadeti2 = mysql_query($sql_zadeti2);
$row2 = mysql_fetch_array($query_zadeti2, MYSQL_ASSOC);
$faljeni2_c1a = $row1['faljeni2'];
$zadeti2_c1a = $row2['zadeti2'];

$sql_faljeni2 = "SELECT COUNT(*) AS faljeni2 FROM matchevents1 WHERE (event_type=3 OR event_type=4 OR event_type=28 OR event_type=29 OR event_type=31) AND match_id=$matchid AND player1id=$away_pg2";
$query_faljeni2 = mysql_query($sql_faljeni2);
$row1 = mysql_fetch_array($query_faljeni2, MYSQL_ASSOC);
$sql_zadeti2 = "SELECT COUNT(*) AS zadeti2 FROM matchevents1 WHERE (event_type=1 OR event_type=2 OR event_type=27 OR event_type=23 OR event_type=12) AND match_id=$matchid AND player1id=$away_pg2";
$query_zadeti2 = mysql_query($sql_zadeti2);
$row2 = mysql_fetch_array($query_zadeti2, MYSQL_ASSOC);
$faljeni2_pg2a = $row1['faljeni2'];
$zadeti2_pg2a = $row2['zadeti2'];

$sql_faljeni2 = "SELECT COUNT(*) AS faljeni2 FROM matchevents1 WHERE (event_type=3 OR event_type=4 OR event_type=28 OR event_type=29 OR event_type=31) AND match_id=$matchid AND player1id=$away_sg2";
$query_faljeni2 = mysql_query($sql_faljeni2);
$row1 = mysql_fetch_array($query_faljeni2, MYSQL_ASSOC);
$sql_zadeti2 = "SELECT COUNT(*) AS zadeti2 FROM matchevents1 WHERE (event_type=1 OR event_type=2 OR event_type=27 OR event_type=23 OR event_type=12) AND match_id=$matchid AND player1id=$away_sg2";
$query_zadeti2 = mysql_query($sql_zadeti2);
$row2 = mysql_fetch_array($query_zadeti2, MYSQL_ASSOC);
$faljeni2_sg2a = $row1['faljeni2'];
$zadeti2_sg2a = $row2['zadeti2'];

$sql_faljeni2 = "SELECT COUNT(*) AS faljeni2 FROM matchevents1 WHERE (event_type=3 OR event_type=4 OR event_type=28 OR event_type=29 OR event_type=31) AND match_id=$matchid AND player1id=$away_sf2";
$query_faljeni2 = mysql_query($sql_faljeni2);
$row1 = mysql_fetch_array($query_faljeni2, MYSQL_ASSOC);
$sql_zadeti2 = "SELECT COUNT(*) AS zadeti2 FROM matchevents1 WHERE (event_type=1 OR event_type=2 OR event_type=27 OR event_type=23 OR event_type=12) AND match_id=$matchid AND player1id=$away_sf2";
$query_zadeti2 = mysql_query($sql_zadeti2);
$row2 = mysql_fetch_array($query_zadeti2, MYSQL_ASSOC);
$faljeni2_sf2a = $row1['faljeni2'];
$zadeti2_sf2a = $row2['zadeti2'];

$sql_faljeni2 = "SELECT COUNT(*) AS faljeni2 FROM matchevents1 WHERE (event_type=3 OR event_type=4 OR event_type=28 OR event_type=29 OR event_type=31) AND match_id=$matchid AND player1id=$away_pf2";
$query_faljeni2 = mysql_query($sql_faljeni2);
$row1 = mysql_fetch_array($query_faljeni2, MYSQL_ASSOC);
$sql_zadeti2 = "SELECT COUNT(*) AS zadeti2 FROM matchevents1 WHERE (event_type=1 OR event_type=2 OR event_type=27 OR event_type=23 OR event_type=12) AND match_id=$matchid AND player1id=$away_pf2";
$query_zadeti2 = mysql_query($sql_zadeti2);
$row2 = mysql_fetch_array($query_zadeti2, MYSQL_ASSOC);
$faljeni2_pf2a = $row1['faljeni2'];
$zadeti2_pf2a = $row2['zadeti2'];

$sql_faljeni2 = "SELECT COUNT(*) AS faljeni2 FROM matchevents1 WHERE (event_type=3 OR event_type=4 OR event_type=28 OR event_type=29 OR event_type=31) AND match_id=$matchid AND player1id=$away_c2";
$query_faljeni2 = mysql_query($sql_faljeni2);
$row1 = mysql_fetch_array($query_faljeni2, MYSQL_ASSOC);
$sql_zadeti2 = "SELECT COUNT(*) AS zadeti2 FROM matchevents1 WHERE (event_type=1 OR event_type=2 OR event_type=27 OR event_type=23 OR event_type=12) AND match_id=$matchid AND player1id=$away_c2";
$query_zadeti2 = mysql_query($sql_zadeti2);
$row2 = mysql_fetch_array($query_zadeti2, MYSQL_ASSOC);
$faljeni2_c2a = $row1['faljeni2'];
$zadeti2_c2a = $row2['zadeti2'];

//FREETHROWS

//domaci

$sqlp2meta = "SELECT COUNT(*) AS p2meta FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_pg1 AND (event_type=14 OR event_type=15 OR event_type=16)";
$queryp2meta = mysql_query($sqlp2meta);
$rowp2meta = mysql_fetch_array($queryp2meta, MYSQL_ASSOC);
$sqlp3meti = "SELECT COUNT(*) AS p3meti FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_pg1 AND (event_type=17 OR event_type=18 OR event_type=19 OR event_type=20)";
$queryp3meti = mysql_query($sqlp3meti);
$rowp3meti = mysql_fetch_array($queryp3meti, MYSQL_ASSOC);
$sqlp1met = "SELECT COUNT(*) AS p1met FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_pg1 AND (event_type=21 OR event_type=22)";
$queryp1met = mysql_query($sqlp1met);
$rowp1met = mysql_fetch_array($queryp1met, MYSQL_ASSOC);
$p2meta = $rowp2meta['p2meta'];
$p3meti = $rowp3meti['p3meti'];
$p1met = $rowp1met['p1met'];
$sqlp2meta_z = "SELECT COUNT(*) AS p2meta_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_pg1 AND (event_type=14 OR event_type=18)";
$queryp2meta_z = mysql_query($sqlp2meta_z);
$rowp2meta_z = mysql_fetch_array($queryp2meta_z, MYSQL_ASSOC);
$sqlp3meti_z = "SELECT COUNT(*) AS p3meti_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_pg1 AND event_type=17";
$queryp3meti_z = mysql_query($sqlp3meti_z);
$rowp3meti_z = mysql_fetch_array($queryp3meti_z, MYSQL_ASSOC);
$sqlp1met_z = "SELECT COUNT(*) AS p1met_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_pg1 AND (event_type=15 OR event_type=19 OR event_type=21)";
$queryp1met_z = mysql_query($sqlp1met_z);
$rowp1met_z = mysql_fetch_array($queryp1met_z, MYSQL_ASSOC);
$p2meta_z = $rowp2meta_z['p2meta_z'];
$p3meti_z = $rowp3meti_z['p3meti_z'];
$p1met_z = $rowp1met_z['p1met_z'];
$vrzeni1_pg1 = 2*$p2meta + 3*$p3meti + $p1met;
$zadeti1_pg1 = 2*$p2meta_z + 3*$p3meti_z + $p1met_z;

$sqlp2meta = "SELECT COUNT(*) AS p2meta FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_sg1 AND (event_type=14 OR event_type=15 OR event_type=16)";
$queryp2meta = mysql_query($sqlp2meta);
$rowp2meta = mysql_fetch_array($queryp2meta, MYSQL_ASSOC);
$sqlp3meti = "SELECT COUNT(*) AS p3meti FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_sg1 AND (event_type=17 OR event_type=18 OR event_type=19 OR event_type=20)";
$queryp3meti = mysql_query($sqlp3meti);
$rowp3meti = mysql_fetch_array($queryp3meti, MYSQL_ASSOC);
$sqlp1met = "SELECT COUNT(*) AS p1met FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_sg1 AND (event_type=21 OR event_type=22)";
$queryp1met = mysql_query($sqlp1met);
$rowp1met = mysql_fetch_array($queryp1met, MYSQL_ASSOC);
$p2meta = $rowp2meta['p2meta'];
$p3meti = $rowp3meti['p3meti'];
$p1met = $rowp1met['p1met'];
$sqlp2meta_z = "SELECT COUNT(*) AS p2meta_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_sg1 AND (event_type=14 OR event_type=18)";
$queryp2meta_z = mysql_query($sqlp2meta_z);
$rowp2meta_z = mysql_fetch_array($queryp2meta_z, MYSQL_ASSOC);
$sqlp3meti_z = "SELECT COUNT(*) AS p3meti_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_sg1 AND event_type=17";
$queryp3meti_z = mysql_query($sqlp3meti_z);
$rowp3meti_z = mysql_fetch_array($queryp3meti_z, MYSQL_ASSOC);
$sqlp1met_z = "SELECT COUNT(*) AS p1met_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_sg1 AND (event_type=15 OR event_type=19 OR event_type=21)";
$queryp1met_z = mysql_query($sqlp1met_z);
$rowp1met_z = mysql_fetch_array($queryp1met_z, MYSQL_ASSOC);
$p2meta_z = $rowp2meta_z['p2meta_z'];
$p3meti_z = $rowp3meti_z['p3meti_z'];
$p1met_z = $rowp1met_z['p1met_z'];
$vrzeni1_sg1 = 2*$p2meta + 3*$p3meti + $p1met;
$zadeti1_sg1 = 2*$p2meta_z + 3*$p3meti_z + $p1met_z;

$sqlp2meta = "SELECT COUNT(*) AS p2meta FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_sf1 AND (event_type=14 OR event_type=15 OR event_type=16)";
$queryp2meta = mysql_query($sqlp2meta);
$rowp2meta = mysql_fetch_array($queryp2meta, MYSQL_ASSOC);
$sqlp3meti = "SELECT COUNT(*) AS p3meti FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_sf1 AND (event_type=17 OR event_type=18 OR event_type=19 OR event_type=20)";
$queryp3meti = mysql_query($sqlp3meti);
$rowp3meti = mysql_fetch_array($queryp3meti, MYSQL_ASSOC);
$sqlp1met = "SELECT COUNT(*) AS p1met FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_sf1 AND (event_type=21 OR event_type=22)";
$queryp1met = mysql_query($sqlp1met);
$rowp1met = mysql_fetch_array($queryp1met, MYSQL_ASSOC);
$p2meta = $rowp2meta['p2meta'];
$p3meti = $rowp3meti['p3meti'];
$p1met = $rowp1met['p1met'];
$sqlp2meta_z = "SELECT COUNT(*) AS p2meta_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_sf1 AND (event_type=14 OR event_type=18)";
$queryp2meta_z = mysql_query($sqlp2meta_z);
$rowp2meta_z = mysql_fetch_array($queryp2meta_z, MYSQL_ASSOC);
$sqlp3meti_z = "SELECT COUNT(*) AS p3meti_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_sf1 AND event_type=17";
$queryp3meti_z = mysql_query($sqlp3meti_z);
$rowp3meti_z = mysql_fetch_array($queryp3meti_z, MYSQL_ASSOC);
$sqlp1met_z = "SELECT COUNT(*) AS p1met_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_sf1 AND (event_type=15 OR event_type=19 OR event_type=21)";
$queryp1met_z = mysql_query($sqlp1met_z);
$rowp1met_z = mysql_fetch_array($queryp1met_z, MYSQL_ASSOC);
$p2meta_z = $rowp2meta_z['p2meta_z'];
$p3meti_z = $rowp3meti_z['p3meti_z'];
$p1met_z = $rowp1met_z['p1met_z'];
$vrzeni1_sf1 = 2*$p2meta + 3*$p3meti + $p1met;
$zadeti1_sf1 = 2*$p2meta_z + 3*$p3meti_z + $p1met_z;

$sqlp2meta = "SELECT COUNT(*) AS p2meta FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_pf1 AND (event_type=14 OR event_type=15 OR event_type=16)";
$queryp2meta = mysql_query($sqlp2meta);
$rowp2meta = mysql_fetch_array($queryp2meta, MYSQL_ASSOC);
$sqlp3meti = "SELECT COUNT(*) AS p3meti FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_pf1 AND (event_type=17 OR event_type=18 OR event_type=19 OR event_type=20)";
$queryp3meti = mysql_query($sqlp3meti);
$rowp3meti = mysql_fetch_array($queryp3meti, MYSQL_ASSOC);
$sqlp1met = "SELECT COUNT(*) AS p1met FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_pf1 AND (event_type=21 OR event_type=22)";
$queryp1met = mysql_query($sqlp1met);
$rowp1met = mysql_fetch_array($queryp1met, MYSQL_ASSOC);
$p2meta = $rowp2meta['p2meta'];
$p3meti = $rowp3meti['p3meti'];
$p1met = $rowp1met['p1met'];
$sqlp2meta_z = "SELECT COUNT(*) AS p2meta_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_pf1 AND (event_type=14 OR event_type=18)";
$queryp2meta_z = mysql_query($sqlp2meta_z);
$rowp2meta_z = mysql_fetch_array($queryp2meta_z, MYSQL_ASSOC);
$sqlp3meti_z = "SELECT COUNT(*) AS p3meti_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_pf1 AND event_type=17";
$queryp3meti_z = mysql_query($sqlp3meti_z);
$rowp3meti_z = mysql_fetch_array($queryp3meti_z, MYSQL_ASSOC);
$sqlp1met_z = "SELECT COUNT(*) AS p1met_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_pf1 AND (event_type=15 OR event_type=19 OR event_type=21)";
$queryp1met_z = mysql_query($sqlp1met_z);
$rowp1met_z = mysql_fetch_array($queryp1met_z, MYSQL_ASSOC);
$p2meta_z = $rowp2meta_z['p2meta_z'];
$p3meti_z = $rowp3meti_z['p3meti_z'];
$p1met_z = $rowp1met_z['p1met_z'];
$vrzeni1_pf1 = 2*$p2meta + 3*$p3meti + $p1met;
$zadeti1_pf1 = 2*$p2meta_z + 3*$p3meti_z + $p1met_z;

$sqlp2meta = "SELECT COUNT(*) AS p2meta FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_c1 AND (event_type=14 OR event_type=15 OR event_type=16)";
$queryp2meta = mysql_query($sqlp2meta);
$rowp2meta = mysql_fetch_array($queryp2meta, MYSQL_ASSOC);
$sqlp3meti = "SELECT COUNT(*) AS p3meti FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_c1 AND (event_type=17 OR event_type=18 OR event_type=19 OR event_type=20)";
$queryp3meti = mysql_query($sqlp3meti);
$rowp3meti = mysql_fetch_array($queryp3meti, MYSQL_ASSOC);
$sqlp1met = "SELECT COUNT(*) AS p1met FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_c1 AND (event_type=21 OR event_type=22)";
$queryp1met = mysql_query($sqlp1met);
$rowp1met = mysql_fetch_array($queryp1met, MYSQL_ASSOC);
$p2meta = $rowp2meta['p2meta'];
$p3meti = $rowp3meti['p3meti'];
$p1met = $rowp1met['p1met'];
$sqlp2meta_z = "SELECT COUNT(*) AS p2meta_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_c1 AND (event_type=14 OR event_type=18)";
$queryp2meta_z = mysql_query($sqlp2meta_z);
$rowp2meta_z = mysql_fetch_array($queryp2meta_z, MYSQL_ASSOC);
$sqlp3meti_z = "SELECT COUNT(*) AS p3meti_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_c1 AND event_type=17";
$queryp3meti_z = mysql_query($sqlp3meti_z);
$rowp3meti_z = mysql_fetch_array($queryp3meti_z, MYSQL_ASSOC);
$sqlp1met_z = "SELECT COUNT(*) AS p1met_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_c1 AND (event_type=15 OR event_type=19 OR event_type=21)";
$queryp1met_z = mysql_query($sqlp1met_z);
$rowp1met_z = mysql_fetch_array($queryp1met_z, MYSQL_ASSOC);
$p2meta_z = $rowp2meta_z['p2meta_z'];
$p3meti_z = $rowp3meti_z['p3meti_z'];
$p1met_z = $rowp1met_z['p1met_z'];
$vrzeni1_c1 = 2*$p2meta + 3*$p3meti + $p1met;
$zadeti1_c1 = 2*$p2meta_z + 3*$p3meti_z + $p1met_z;

$sqlp2meta = "SELECT COUNT(*) AS p2meta FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_pg2 AND (event_type=14 OR event_type=15 OR event_type=16)";
$queryp2meta = mysql_query($sqlp2meta);
$rowp2meta = mysql_fetch_array($queryp2meta, MYSQL_ASSOC);
$sqlp3meti = "SELECT COUNT(*) AS p3meti FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_pg2 AND (event_type=17 OR event_type=18 OR event_type=19 OR event_type=20)";
$queryp3meti = mysql_query($sqlp3meti);
$rowp3meti = mysql_fetch_array($queryp3meti, MYSQL_ASSOC);
$sqlp1met = "SELECT COUNT(*) AS p1met FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_pg2 AND (event_type=21 OR event_type=22)";
$queryp1met = mysql_query($sqlp1met);
$rowp1met = mysql_fetch_array($queryp1met, MYSQL_ASSOC);
$p2meta = $rowp2meta['p2meta'];
$p3meti = $rowp3meti['p3meti'];
$p1met = $rowp1met['p1met'];
$sqlp2meta_z = "SELECT COUNT(*) AS p2meta_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_pg2 AND (event_type=14 OR event_type=18)";
$queryp2meta_z = mysql_query($sqlp2meta_z);
$rowp2meta_z = mysql_fetch_array($queryp2meta_z, MYSQL_ASSOC);
$sqlp3meti_z = "SELECT COUNT(*) AS p3meti_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_pg2 AND event_type=17";
$queryp3meti_z = mysql_query($sqlp3meti_z);
$rowp3meti_z = mysql_fetch_array($queryp3meti_z, MYSQL_ASSOC);
$sqlp1met_z = "SELECT COUNT(*) AS p1met_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_pg2 AND (event_type=15 OR event_type=19 OR event_type=21)";
$queryp1met_z = mysql_query($sqlp1met_z);
$rowp1met_z = mysql_fetch_array($queryp1met_z, MYSQL_ASSOC);
$p2meta_z = $rowp2meta_z['p2meta_z'];
$p3meti_z = $rowp3meti_z['p3meti_z'];
$p1met_z = $rowp1met_z['p1met_z'];
$vrzeni1_pg2 = 2*$p2meta + 3*$p3meti + $p1met;
$zadeti1_pg2 = 2*$p2meta_z + 3*$p3meti_z + $p1met_z;

$sqlp2meta = "SELECT COUNT(*) AS p2meta FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_sg2 AND (event_type=14 OR event_type=15 OR event_type=16)";
$queryp2meta = mysql_query($sqlp2meta);
$rowp2meta = mysql_fetch_array($queryp2meta, MYSQL_ASSOC);
$sqlp3meti = "SELECT COUNT(*) AS p3meti FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_sg2 AND (event_type=17 OR event_type=18 OR event_type=19 OR event_type=20)";
$queryp3meti = mysql_query($sqlp3meti);
$rowp3meti = mysql_fetch_array($queryp3meti, MYSQL_ASSOC);
$sqlp1met = "SELECT COUNT(*) AS p1met FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_sg2 AND (event_type=21 OR event_type=22)";
$queryp1met = mysql_query($sqlp1met);
$rowp1met = mysql_fetch_array($queryp1met, MYSQL_ASSOC);
$p2meta = $rowp2meta['p2meta'];
$p3meti = $rowp3meti['p3meti'];
$p1met = $rowp1met['p1met'];
$sqlp2meta_z = "SELECT COUNT(*) AS p2meta_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_sg2 AND (event_type=14 OR event_type=18)";
$queryp2meta_z = mysql_query($sqlp2meta_z);
$rowp2meta_z = mysql_fetch_array($queryp2meta_z, MYSQL_ASSOC);
$sqlp3meti_z = "SELECT COUNT(*) AS p3meti_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_sg2 AND event_type=17";
$queryp3meti_z = mysql_query($sqlp3meti_z);
$rowp3meti_z = mysql_fetch_array($queryp3meti_z, MYSQL_ASSOC);
$sqlp1met_z = "SELECT COUNT(*) AS p1met_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_sg2 AND (event_type=15 OR event_type=19 OR event_type=21)";
$queryp1met_z = mysql_query($sqlp1met_z);
$rowp1met_z = mysql_fetch_array($queryp1met_z, MYSQL_ASSOC);
$p2meta_z = $rowp2meta_z['p2meta_z'];
$p3meti_z = $rowp3meti_z['p3meti_z'];
$p1met_z = $rowp1met_z['p1met_z'];
$vrzeni1_sg2 = 2*$p2meta + 3*$p3meti + $p1met;
$zadeti1_sg2 = 2*$p2meta_z + 3*$p3meti_z + $p1met_z;

$sqlp2meta = "SELECT COUNT(*) AS p2meta FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_sf2 AND (event_type=14 OR event_type=15 OR event_type=16)";
$queryp2meta = mysql_query($sqlp2meta);
$rowp2meta = mysql_fetch_array($queryp2meta, MYSQL_ASSOC);
$sqlp3meti = "SELECT COUNT(*) AS p3meti FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_sf2 AND (event_type=17 OR event_type=18 OR event_type=19 OR event_type=20)";
$queryp3meti = mysql_query($sqlp3meti);
$rowp3meti = mysql_fetch_array($queryp3meti, MYSQL_ASSOC);
$sqlp1met = "SELECT COUNT(*) AS p1met FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_sf2 AND (event_type=21 OR event_type=22)";
$queryp1met = mysql_query($sqlp1met);
$rowp1met = mysql_fetch_array($queryp1met, MYSQL_ASSOC);
$p2meta = $rowp2meta['p2meta'];
$p3meti = $rowp3meti['p3meti'];
$p1met = $rowp1met['p1met'];
$sqlp2meta_z = "SELECT COUNT(*) AS p2meta_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_sf2 AND (event_type=14 OR event_type=18)";
$queryp2meta_z = mysql_query($sqlp2meta_z);
$rowp2meta_z = mysql_fetch_array($queryp2meta_z, MYSQL_ASSOC);
$sqlp3meti_z = "SELECT COUNT(*) AS p3meti_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_sf2 AND event_type=17";
$queryp3meti_z = mysql_query($sqlp3meti_z);
$rowp3meti_z = mysql_fetch_array($queryp3meti_z, MYSQL_ASSOC);
$sqlp1met_z = "SELECT COUNT(*) AS p1met_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_sf2 AND (event_type=15 OR event_type=19 OR event_type=21)";
$queryp1met_z = mysql_query($sqlp1met_z);
$rowp1met_z = mysql_fetch_array($queryp1met_z, MYSQL_ASSOC);
$p2meta_z = $rowp2meta_z['p2meta_z'];
$p3meti_z = $rowp3meti_z['p3meti_z'];
$p1met_z = $rowp1met_z['p1met_z'];
$vrzeni1_sf2 = 2*$p2meta + 3*$p3meti + $p1met;
$zadeti1_sf2 = 2*$p2meta_z + 3*$p3meti_z + $p1met_z;

$sqlp2meta = "SELECT COUNT(*) AS p2meta FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_pf2 AND (event_type=14 OR event_type=15 OR event_type=16)";
$queryp2meta = mysql_query($sqlp2meta);
$rowp2meta = mysql_fetch_array($queryp2meta, MYSQL_ASSOC);
$sqlp3meti = "SELECT COUNT(*) AS p3meti FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_pf2 AND (event_type=17 OR event_type=18 OR event_type=19 OR event_type=20)";
$queryp3meti = mysql_query($sqlp3meti);
$rowp3meti = mysql_fetch_array($queryp3meti, MYSQL_ASSOC);
$sqlp1met = "SELECT COUNT(*) AS p1met FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_pf2 AND (event_type=21 OR event_type=22)";
$queryp1met = mysql_query($sqlp1met);
$rowp1met = mysql_fetch_array($queryp1met, MYSQL_ASSOC);
$p2meta = $rowp2meta['p2meta'];
$p3meti = $rowp3meti['p3meti'];
$p1met = $rowp1met['p1met'];
$sqlp2meta_z = "SELECT COUNT(*) AS p2meta_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_pf2 AND (event_type=14 OR event_type=18)";
$queryp2meta_z = mysql_query($sqlp2meta_z);
$rowp2meta_z = mysql_fetch_array($queryp2meta_z, MYSQL_ASSOC);
$sqlp3meti_z = "SELECT COUNT(*) AS p3meti_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_pf2 AND event_type=17";
$queryp3meti_z = mysql_query($sqlp3meti_z);
$rowp3meti_z = mysql_fetch_array($queryp3meti_z, MYSQL_ASSOC);
$sqlp1met_z = "SELECT COUNT(*) AS p1met_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_pf2 AND (event_type=15 OR event_type=19 OR event_type=21)";
$queryp1met_z = mysql_query($sqlp1met_z);
$rowp1met_z = mysql_fetch_array($queryp1met_z, MYSQL_ASSOC);
$p2meta_z = $rowp2meta_z['p2meta_z'];
$p3meti_z = $rowp3meti_z['p3meti_z'];
$p1met_z = $rowp1met_z['p1met_z'];
$vrzeni1_pf2 = 2*$p2meta + 3*$p3meti + $p1met;
$zadeti1_pf2 = 2*$p2meta_z + 3*$p3meti_z + $p1met_z;

$sqlp2meta = "SELECT COUNT(*) AS p2meta FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_c2 AND (event_type=14 OR event_type=15 OR event_type=16)";
$queryp2meta = mysql_query($sqlp2meta);
$rowp2meta = mysql_fetch_array($queryp2meta, MYSQL_ASSOC);
$sqlp3meti = "SELECT COUNT(*) AS p3meti FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_c2 AND (event_type=17 OR event_type=18 OR event_type=19 OR event_type=20)";
$queryp3meti = mysql_query($sqlp3meti);
$rowp3meti = mysql_fetch_array($queryp3meti, MYSQL_ASSOC);
$sqlp1met = "SELECT COUNT(*) AS p1met FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_c2 AND (event_type=21 OR event_type=22)";
$queryp1met = mysql_query($sqlp1met);
$rowp1met = mysql_fetch_array($queryp1met, MYSQL_ASSOC);
$p2meta = $rowp2meta['p2meta'];
$p3meti = $rowp3meti['p3meti'];
$p1met = $rowp1met['p1met'];
$sqlp2meta_z = "SELECT COUNT(*) AS p2meta_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_c2 AND (event_type=14 OR event_type=18)";
$queryp2meta_z = mysql_query($sqlp2meta_z);
$rowp2meta_z = mysql_fetch_array($queryp2meta_z, MYSQL_ASSOC);
$sqlp3meti_z = "SELECT COUNT(*) AS p3meti_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_c2 AND event_type=17";
$queryp3meti_z = mysql_query($sqlp3meti_z);
$rowp3meti_z = mysql_fetch_array($queryp3meti_z, MYSQL_ASSOC);
$sqlp1met_z = "SELECT COUNT(*) AS p1met_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_c2 AND (event_type=15 OR event_type=19 OR event_type=21)";
$queryp1met_z = mysql_query($sqlp1met_z);
$rowp1met_z = mysql_fetch_array($queryp1met_z, MYSQL_ASSOC);
$p2meta_z = $rowp2meta_z['p2meta_z'];
$p3meti_z = $rowp3meti_z['p3meti_z'];
$p1met_z = $rowp1met_z['p1met_z'];
$vrzeni1_c2 = 2*$p2meta + 3*$p3meti + $p1met;
$zadeti1_c2 = 2*$p2meta_z + 3*$p3meti_z + $p1met_z;

//gostje

$sqlp2meta = "SELECT COUNT(*) AS p2meta FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_pg1 AND (event_type=14 OR event_type=15 OR event_type=16)";
$queryp2meta = mysql_query($sqlp2meta);
$rowp2meta = mysql_fetch_array($queryp2meta, MYSQL_ASSOC);
$sqlp3meti = "SELECT COUNT(*) AS p3meti FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_pg1 AND (event_type=17 OR event_type=18 OR event_type=19 OR event_type=20)";
$queryp3meti = mysql_query($sqlp3meti);
$rowp3meti = mysql_fetch_array($queryp3meti, MYSQL_ASSOC);
$sqlp1met = "SELECT COUNT(*) AS p1met FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_pg1 AND (event_type=21 OR event_type=22)";
$queryp1met = mysql_query($sqlp1met);
$rowp1met = mysql_fetch_array($queryp1met, MYSQL_ASSOC);
$p2meta = $rowp2meta['p2meta'];
$p3meti = $rowp3meti['p3meti'];
$p1met = $rowp1met['p1met'];
$sqlp2meta_z = "SELECT COUNT(*) AS p2meta_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_pg1 AND (event_type=14 OR event_type=18)";
$queryp2meta_z = mysql_query($sqlp2meta_z);
$rowp2meta_z = mysql_fetch_array($queryp2meta_z, MYSQL_ASSOC);
$sqlp3meti_z = "SELECT COUNT(*) AS p3meti_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_pg1 AND event_type=17";
$queryp3meti_z = mysql_query($sqlp3meti_z);
$rowp3meti_z = mysql_fetch_array($queryp3meti_z, MYSQL_ASSOC);
$sqlp1met_z = "SELECT COUNT(*) AS p1met_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_pg1 AND (event_type=15 OR event_type=19 OR event_type=21)";
$queryp1met_z = mysql_query($sqlp1met_z);
$rowp1met_z = mysql_fetch_array($queryp1met_z, MYSQL_ASSOC);
$p2meta_z = $rowp2meta_z['p2meta_z'];
$p3meti_z = $rowp3meti_z['p3meti_z'];
$p1met_z = $rowp1met_z['p1met_z'];
$vrzeni1_pg1a = 2*$p2meta + 3*$p3meti + $p1met;
$zadeti1_pg1a = 2*$p2meta_z + 3*$p3meti_z + $p1met_z;

$sqlp2meta = "SELECT COUNT(*) AS p2meta FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_sg1 AND (event_type=14 OR event_type=15 OR event_type=16)";
$queryp2meta = mysql_query($sqlp2meta);
$rowp2meta = mysql_fetch_array($queryp2meta, MYSQL_ASSOC);
$sqlp3meti = "SELECT COUNT(*) AS p3meti FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_sg1 AND (event_type=17 OR event_type=18 OR event_type=19 OR event_type=20)";
$queryp3meti = mysql_query($sqlp3meti);
$rowp3meti = mysql_fetch_array($queryp3meti, MYSQL_ASSOC);
$sqlp1met = "SELECT COUNT(*) AS p1met FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_sg1 AND (event_type=21 OR event_type=22)";
$queryp1met = mysql_query($sqlp1met);
$rowp1met = mysql_fetch_array($queryp1met, MYSQL_ASSOC);
$p2meta = $rowp2meta['p2meta'];
$p3meti = $rowp3meti['p3meti'];
$p1met = $rowp1met['p1met'];
$sqlp2meta_z = "SELECT COUNT(*) AS p2meta_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_sg1 AND (event_type=14 OR event_type=18)";
$queryp2meta_z = mysql_query($sqlp2meta_z);
$rowp2meta_z = mysql_fetch_array($queryp2meta_z, MYSQL_ASSOC);
$sqlp3meti_z = "SELECT COUNT(*) AS p3meti_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_sg1 AND event_type=17";
$queryp3meti_z = mysql_query($sqlp3meti_z);
$rowp3meti_z = mysql_fetch_array($queryp3meti_z, MYSQL_ASSOC);
$sqlp1met_z = "SELECT COUNT(*) AS p1met_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_sg1 AND (event_type=15 OR event_type=19 OR event_type=21)";
$queryp1met_z = mysql_query($sqlp1met_z);
$rowp1met_z = mysql_fetch_array($queryp1met_z, MYSQL_ASSOC);
$p2meta_z = $rowp2meta_z['p2meta_z'];
$p3meti_z = $rowp3meti_z['p3meti_z'];
$p1met_z = $rowp1met_z['p1met_z'];
$vrzeni1_sg1a = 2*$p2meta + 3*$p3meti + $p1met;
$zadeti1_sg1a = 2*$p2meta_z + 3*$p3meti_z + $p1met_z;

$sqlp2meta = "SELECT COUNT(*) AS p2meta FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_sf1 AND (event_type=14 OR event_type=15 OR event_type=16)";
$queryp2meta = mysql_query($sqlp2meta);
$rowp2meta = mysql_fetch_array($queryp2meta, MYSQL_ASSOC);
$sqlp3meti = "SELECT COUNT(*) AS p3meti FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_sf1 AND (event_type=17 OR event_type=18 OR event_type=19 OR event_type=20)";
$queryp3meti = mysql_query($sqlp3meti);
$rowp3meti = mysql_fetch_array($queryp3meti, MYSQL_ASSOC);
$sqlp1met = "SELECT COUNT(*) AS p1met FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_sf1 AND (event_type=21 OR event_type=22)";
$queryp1met = mysql_query($sqlp1met);
$rowp1met = mysql_fetch_array($queryp1met, MYSQL_ASSOC);
$p2meta = $rowp2meta['p2meta'];
$p3meti = $rowp3meti['p3meti'];
$p1met = $rowp1met['p1met'];
$sqlp2meta_z = "SELECT COUNT(*) AS p2meta_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_sf1 AND (event_type=14 OR event_type=18)";
$queryp2meta_z = mysql_query($sqlp2meta_z);
$rowp2meta_z = mysql_fetch_array($queryp2meta_z, MYSQL_ASSOC);
$sqlp3meti_z = "SELECT COUNT(*) AS p3meti_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_sf1 AND event_type=17";
$queryp3meti_z = mysql_query($sqlp3meti_z);
$rowp3meti_z = mysql_fetch_array($queryp3meti_z, MYSQL_ASSOC);
$sqlp1met_z = "SELECT COUNT(*) AS p1met_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_sf1 AND (event_type=15 OR event_type=19 OR event_type=21)";
$queryp1met_z = mysql_query($sqlp1met_z);
$rowp1met_z = mysql_fetch_array($queryp1met_z, MYSQL_ASSOC);
$p2meta_z = $rowp2meta_z['p2meta_z'];
$p3meti_z = $rowp3meti_z['p3meti_z'];
$p1met_z = $rowp1met_z['p1met_z'];
$vrzeni1_sf1a = 2*$p2meta + 3*$p3meti + $p1met;
$zadeti1_sf1a = 2*$p2meta_z + 3*$p3meti_z + $p1met_z;

$sqlp2meta = "SELECT COUNT(*) AS p2meta FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_pf1 AND (event_type=14 OR event_type=15 OR event_type=16)";
$queryp2meta = mysql_query($sqlp2meta);
$rowp2meta = mysql_fetch_array($queryp2meta, MYSQL_ASSOC);
$sqlp3meti = "SELECT COUNT(*) AS p3meti FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_pf1 AND (event_type=17 OR event_type=18 OR event_type=19 OR event_type=20)";
$queryp3meti = mysql_query($sqlp3meti);
$rowp3meti = mysql_fetch_array($queryp3meti, MYSQL_ASSOC);
$sqlp1met = "SELECT COUNT(*) AS p1met FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_pf1 AND (event_type=21 OR event_type=22)";
$queryp1met = mysql_query($sqlp1met);
$rowp1met = mysql_fetch_array($queryp1met, MYSQL_ASSOC);
$p2meta = $rowp2meta['p2meta'];
$p3meti = $rowp3meti['p3meti'];
$p1met = $rowp1met['p1met'];
$sqlp2meta_z = "SELECT COUNT(*) AS p2meta_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_pf1 AND (event_type=14 OR event_type=18)";
$queryp2meta_z = mysql_query($sqlp2meta_z);
$rowp2meta_z = mysql_fetch_array($queryp2meta_z, MYSQL_ASSOC);
$sqlp3meti_z = "SELECT COUNT(*) AS p3meti_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_pf1 AND event_type=17";
$queryp3meti_z = mysql_query($sqlp3meti_z);
$rowp3meti_z = mysql_fetch_array($queryp3meti_z, MYSQL_ASSOC);
$sqlp1met_z = "SELECT COUNT(*) AS p1met_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_pf1 AND (event_type=15 OR event_type=19 OR event_type=21)";
$queryp1met_z = mysql_query($sqlp1met_z);
$rowp1met_z = mysql_fetch_array($queryp1met_z, MYSQL_ASSOC);
$p2meta_z = $rowp2meta_z['p2meta_z'];
$p3meti_z = $rowp3meti_z['p3meti_z'];
$p1met_z = $rowp1met_z['p1met_z'];
$vrzeni1_pf1a = 2*$p2meta + 3*$p3meti + $p1met;
$zadeti1_pf1a = 2*$p2meta_z + 3*$p3meti_z + $p1met_z;

$sqlp2meta = "SELECT COUNT(*) AS p2meta FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_c1 AND (event_type=14 OR event_type=15 OR event_type=16)";
$queryp2meta = mysql_query($sqlp2meta);
$rowp2meta = mysql_fetch_array($queryp2meta, MYSQL_ASSOC);
$sqlp3meti = "SELECT COUNT(*) AS p3meti FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_c1 AND (event_type=17 OR event_type=18 OR event_type=19 OR event_type=20)";
$queryp3meti = mysql_query($sqlp3meti);
$rowp3meti = mysql_fetch_array($queryp3meti, MYSQL_ASSOC);
$sqlp1met = "SELECT COUNT(*) AS p1met FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_c1 AND (event_type=21 OR event_type=22)";
$queryp1met = mysql_query($sqlp1met);
$rowp1met = mysql_fetch_array($queryp1met, MYSQL_ASSOC);
$p2meta = $rowp2meta['p2meta'];
$p3meti = $rowp3meti['p3meti'];
$p1met = $rowp1met['p1met'];
$sqlp2meta_z = "SELECT COUNT(*) AS p2meta_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_c1 AND (event_type=14 OR event_type=18)";
$queryp2meta_z = mysql_query($sqlp2meta_z);
$rowp2meta_z = mysql_fetch_array($queryp2meta_z, MYSQL_ASSOC);
$sqlp3meti_z = "SELECT COUNT(*) AS p3meti_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_c1 AND event_type=17";
$queryp3meti_z = mysql_query($sqlp3meti_z);
$rowp3meti_z = mysql_fetch_array($queryp3meti_z, MYSQL_ASSOC);
$sqlp1met_z = "SELECT COUNT(*) AS p1met_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_c1 AND (event_type=15 OR event_type=19 OR event_type=21)";
$queryp1met_z = mysql_query($sqlp1met_z);
$rowp1met_z = mysql_fetch_array($queryp1met_z, MYSQL_ASSOC);
$p2meta_z = $rowp2meta_z['p2meta_z'];
$p3meti_z = $rowp3meti_z['p3meti_z'];
$p1met_z = $rowp1met_z['p1met_z'];
$vrzeni1_c1a = 2*$p2meta + 3*$p3meti + $p1met;
$zadeti1_c1a = 2*$p2meta_z + 3*$p3meti_z + $p1met_z;

$sqlp2meta = "SELECT COUNT(*) AS p2meta FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_pg2 AND (event_type=14 OR event_type=15 OR event_type=16)";
$queryp2meta = mysql_query($sqlp2meta);
$rowp2meta = mysql_fetch_array($queryp2meta, MYSQL_ASSOC);
$sqlp3meti = "SELECT COUNT(*) AS p3meti FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_pg2 AND (event_type=17 OR event_type=18 OR event_type=19 OR event_type=20)";
$queryp3meti = mysql_query($sqlp3meti);
$rowp3meti = mysql_fetch_array($queryp3meti, MYSQL_ASSOC);
$sqlp1met = "SELECT COUNT(*) AS p1met FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_pg2 AND (event_type=21 OR event_type=22)";
$queryp1met = mysql_query($sqlp1met);
$rowp1met = mysql_fetch_array($queryp1met, MYSQL_ASSOC);
$p2meta = $rowp2meta['p2meta'];
$p3meti = $rowp3meti['p3meti'];
$p1met = $rowp1met['p1met'];
$sqlp2meta_z = "SELECT COUNT(*) AS p2meta_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_pg2 AND (event_type=14 OR event_type=18)";
$queryp2meta_z = mysql_query($sqlp2meta_z);
$rowp2meta_z = mysql_fetch_array($queryp2meta_z, MYSQL_ASSOC);
$sqlp3meti_z = "SELECT COUNT(*) AS p3meti_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_pg2 AND event_type=17";
$queryp3meti_z = mysql_query($sqlp3meti_z);
$rowp3meti_z = mysql_fetch_array($queryp3meti_z, MYSQL_ASSOC);
$sqlp1met_z = "SELECT COUNT(*) AS p1met_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_pg2 AND (event_type=15 OR event_type=19 OR event_type=21)";
$queryp1met_z = mysql_query($sqlp1met_z);
$rowp1met_z = mysql_fetch_array($queryp1met_z, MYSQL_ASSOC);
$p2meta_z = $rowp2meta_z['p2meta_z'];
$p3meti_z = $rowp3meti_z['p3meti_z'];
$p1met_z = $rowp1met_z['p1met_z'];
$vrzeni1_pg2a = 2*$p2meta + 3*$p3meti + $p1met;
$zadeti1_pg2a = 2*$p2meta_z + 3*$p3meti_z + $p1met_z;

$sqlp2meta = "SELECT COUNT(*) AS p2meta FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_sg2 AND (event_type=14 OR event_type=15 OR event_type=16)";
$queryp2meta = mysql_query($sqlp2meta);
$rowp2meta = mysql_fetch_array($queryp2meta, MYSQL_ASSOC);
$sqlp3meti = "SELECT COUNT(*) AS p3meti FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_sg2 AND (event_type=17 OR event_type=18 OR event_type=19 OR event_type=20)";
$queryp3meti = mysql_query($sqlp3meti);
$rowp3meti = mysql_fetch_array($queryp3meti, MYSQL_ASSOC);
$sqlp1met = "SELECT COUNT(*) AS p1met FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_sg2 AND (event_type=21 OR event_type=22)";
$queryp1met = mysql_query($sqlp1met);
$rowp1met = mysql_fetch_array($queryp1met, MYSQL_ASSOC);
$p2meta = $rowp2meta['p2meta'];
$p3meti = $rowp3meti['p3meti'];
$p1met = $rowp1met['p1met'];
$sqlp2meta_z = "SELECT COUNT(*) AS p2meta_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_sg2 AND (event_type=14 OR event_type=18)";
$queryp2meta_z = mysql_query($sqlp2meta_z);
$rowp2meta_z = mysql_fetch_array($queryp2meta_z, MYSQL_ASSOC);
$sqlp3meti_z = "SELECT COUNT(*) AS p3meti_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_sg2 AND event_type=17";
$queryp3meti_z = mysql_query($sqlp3meti_z);
$rowp3meti_z = mysql_fetch_array($queryp3meti_z, MYSQL_ASSOC);
$sqlp1met_z = "SELECT COUNT(*) AS p1met_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_sg2 AND (event_type=15 OR event_type=19 OR event_type=21)";
$queryp1met_z = mysql_query($sqlp1met_z);
$rowp1met_z = mysql_fetch_array($queryp1met_z, MYSQL_ASSOC);
$p2meta_z = $rowp2meta_z['p2meta_z'];
$p3meti_z = $rowp3meti_z['p3meti_z'];
$p1met_z = $rowp1met_z['p1met_z'];
$vrzeni1_sg2a = 2*$p2meta + 3*$p3meti + $p1met;
$zadeti1_sg2a = 2*$p2meta_z + 3*$p3meti_z + $p1met_z;

$sqlp2meta = "SELECT COUNT(*) AS p2meta FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_sf2 AND (event_type=14 OR event_type=15 OR event_type=16)";
$queryp2meta = mysql_query($sqlp2meta);
$rowp2meta = mysql_fetch_array($queryp2meta, MYSQL_ASSOC);
$sqlp3meti = "SELECT COUNT(*) AS p3meti FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_sf2 AND (event_type=17 OR event_type=18 OR event_type=19 OR event_type=20)";
$queryp3meti = mysql_query($sqlp3meti);
$rowp3meti = mysql_fetch_array($queryp3meti, MYSQL_ASSOC);
$sqlp1met = "SELECT COUNT(*) AS p1met FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_sf2 AND (event_type=21 OR event_type=22)";
$queryp1met = mysql_query($sqlp1met);
$rowp1met = mysql_fetch_array($queryp1met, MYSQL_ASSOC);
$p2meta = $rowp2meta['p2meta'];
$p3meti = $rowp3meti['p3meti'];
$p1met = $rowp1met['p1met'];
$sqlp2meta_z = "SELECT COUNT(*) AS p2meta_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_sf2 AND (event_type=14 OR event_type=18)";
$queryp2meta_z = mysql_query($sqlp2meta_z);
$rowp2meta_z = mysql_fetch_array($queryp2meta_z, MYSQL_ASSOC);
$sqlp3meti_z = "SELECT COUNT(*) AS p3meti_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_sf2 AND event_type=17";
$queryp3meti_z = mysql_query($sqlp3meti_z);
$rowp3meti_z = mysql_fetch_array($queryp3meti_z, MYSQL_ASSOC);
$sqlp1met_z = "SELECT COUNT(*) AS p1met_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_sf2 AND (event_type=15 OR event_type=19 OR event_type=21)";
$queryp1met_z = mysql_query($sqlp1met_z);
$rowp1met_z = mysql_fetch_array($queryp1met_z, MYSQL_ASSOC);
$p2meta_z = $rowp2meta_z['p2meta_z'];
$p3meti_z = $rowp3meti_z['p3meti_z'];
$p1met_z = $rowp1met_z['p1met_z'];
$vrzeni1_sf2a = 2*$p2meta + 3*$p3meti + $p1met;
$zadeti1_sf2a = 2*$p2meta_z + 3*$p3meti_z + $p1met_z;

$sqlp2meta = "SELECT COUNT(*) AS p2meta FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_pf2 AND (event_type=14 OR event_type=15 OR event_type=16)";
$queryp2meta = mysql_query($sqlp2meta);
$rowp2meta = mysql_fetch_array($queryp2meta, MYSQL_ASSOC);
$sqlp3meti = "SELECT COUNT(*) AS p3meti FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_pf2 AND (event_type=17 OR event_type=18 OR event_type=19 OR event_type=20)";
$queryp3meti = mysql_query($sqlp3meti);
$rowp3meti = mysql_fetch_array($queryp3meti, MYSQL_ASSOC);
$sqlp1met = "SELECT COUNT(*) AS p1met FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_pf2 AND (event_type=21 OR event_type=22)";
$queryp1met = mysql_query($sqlp1met);
$rowp1met = mysql_fetch_array($queryp1met, MYSQL_ASSOC);
$p2meta = $rowp2meta['p2meta'];
$p3meti = $rowp3meti['p3meti'];
$p1met = $rowp1met['p1met'];
$sqlp2meta_z = "SELECT COUNT(*) AS p2meta_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_pf2 AND (event_type=14 OR event_type=18)";
$queryp2meta_z = mysql_query($sqlp2meta_z);
$rowp2meta_z = mysql_fetch_array($queryp2meta_z, MYSQL_ASSOC);
$sqlp3meti_z = "SELECT COUNT(*) AS p3meti_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_pf2 AND event_type=17";
$queryp3meti_z = mysql_query($sqlp3meti_z);
$rowp3meti_z = mysql_fetch_array($queryp3meti_z, MYSQL_ASSOC);
$sqlp1met_z = "SELECT COUNT(*) AS p1met_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_pf2 AND (event_type=15 OR event_type=19 OR event_type=21)";
$queryp1met_z = mysql_query($sqlp1met_z);
$rowp1met_z = mysql_fetch_array($queryp1met_z, MYSQL_ASSOC);
$p2meta_z = $rowp2meta_z['p2meta_z'];
$p3meti_z = $rowp3meti_z['p3meti_z'];
$p1met_z = $rowp1met_z['p1met_z'];
$vrzeni1_pf2a = 2*$p2meta + 3*$p3meti + $p1met;
$zadeti1_pf2a = 2*$p2meta_z + 3*$p3meti_z + $p1met_z;

$sqlp2meta = "SELECT COUNT(*) AS p2meta FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_c2 AND (event_type=14 OR event_type=15 OR event_type=16)";
$queryp2meta = mysql_query($sqlp2meta);
$rowp2meta = mysql_fetch_array($queryp2meta, MYSQL_ASSOC);
$sqlp3meti = "SELECT COUNT(*) AS p3meti FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_c2 AND (event_type=17 OR event_type=18 OR event_type=19 OR event_type=20)";
$queryp3meti = mysql_query($sqlp3meti);
$rowp3meti = mysql_fetch_array($queryp3meti, MYSQL_ASSOC);
$sqlp1met = "SELECT COUNT(*) AS p1met FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_c2 AND (event_type=21 OR event_type=22)";
$queryp1met = mysql_query($sqlp1met);
$rowp1met = mysql_fetch_array($queryp1met, MYSQL_ASSOC);
$p2meta = $rowp2meta['p2meta'];
$p3meti = $rowp3meti['p3meti'];
$p1met = $rowp1met['p1met'];
$sqlp2meta_z = "SELECT COUNT(*) AS p2meta_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_c2 AND (event_type=14 OR event_type=18)";
$queryp2meta_z = mysql_query($sqlp2meta_z);
$rowp2meta_z = mysql_fetch_array($queryp2meta_z, MYSQL_ASSOC);
$sqlp3meti_z = "SELECT COUNT(*) AS p3meti_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_c2 AND event_type=17";
$queryp3meti_z = mysql_query($sqlp3meti_z);
$rowp3meti_z = mysql_fetch_array($queryp3meti_z, MYSQL_ASSOC);
$sqlp1met_z = "SELECT COUNT(*) AS p1met_z FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_c2 AND (event_type=15 OR event_type=19 OR event_type=21)";
$queryp1met_z = mysql_query($sqlp1met_z);
$rowp1met_z = mysql_fetch_array($queryp1met_z, MYSQL_ASSOC);
$p2meta_z = $rowp2meta_z['p2meta_z'];
$p3meti_z = $rowp3meti_z['p3meti_z'];
$p1met_z = $rowp1met_z['p1met_z'];
$vrzeni1_c2a = 2*$p2meta + 3*$p3meti + $p1met;
$zadeti1_c2a = 2*$p2meta_z + 3*$p3meti_z + $p1met_z;

//THREEPOINTS

//domaci

$sql_faljeni3 = "SELECT COUNT(*) AS faljeni3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_pg1 AND (event_type=8 OR event_type=9)";
$query_faljeni3 = mysql_query($sql_faljeni3);
$row1 = mysql_fetch_array($query_faljeni3, MYSQL_ASSOC);
$sql_zadeti3 = "SELECT COUNT(*) AS zadeti3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_pg1 AND (event_type=7 OR event_type=13 OR event_type=24)";
$query_zadeti3 = mysql_query($sql_zadeti3);
$row2 = mysql_fetch_array($query_zadeti3, MYSQL_ASSOC);
$faljeni3_pg1 = $row1['faljeni3'];
$zadeti3_pg1 = $row2['zadeti3'];

$sql_faljeni3 = "SELECT COUNT(*) AS faljeni3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_sg1 AND (event_type=8 OR event_type=9)";
$query_faljeni3 = mysql_query($sql_faljeni3);
$row1 = mysql_fetch_array($query_faljeni3, MYSQL_ASSOC);
$sql_zadeti3 = "SELECT COUNT(*) AS zadeti3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_sg1 AND (event_type=7 OR event_type=13 OR event_type=24)";
$query_zadeti3 = mysql_query($sql_zadeti3);
$row2 = mysql_fetch_array($query_zadeti3, MYSQL_ASSOC);
$faljeni3_sg1 = $row1['faljeni3'];
$zadeti3_sg1 = $row2['zadeti3'];

$sql_faljeni3 = "SELECT COUNT(*) AS faljeni3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_sf1 AND (event_type=8 OR event_type=9)";
$query_faljeni3 = mysql_query($sql_faljeni3);
$row1 = mysql_fetch_array($query_faljeni3, MYSQL_ASSOC);
$sql_zadeti3 = "SELECT COUNT(*) AS zadeti3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_sf1 AND (event_type=7 OR event_type=13 OR event_type=24)";
$query_zadeti3 = mysql_query($sql_zadeti3);
$row2 = mysql_fetch_array($query_zadeti3, MYSQL_ASSOC);
$faljeni3_sf1 = $row1['faljeni3'];
$zadeti3_sf1 = $row2['zadeti3'];

$sql_faljeni3 = "SELECT COUNT(*) AS faljeni3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_pf1 AND (event_type=8 OR event_type=9)";
$query_faljeni3 = mysql_query($sql_faljeni3);
$row1 = mysql_fetch_array($query_faljeni3, MYSQL_ASSOC);
$sql_zadeti3 = "SELECT COUNT(*) AS zadeti3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_pf1 AND (event_type=7 OR event_type=13 OR event_type=24)";
$query_zadeti3 = mysql_query($sql_zadeti3);
$row2 = mysql_fetch_array($query_zadeti3, MYSQL_ASSOC);
$faljeni3_pf1 = $row1['faljeni3'];
$zadeti3_pf1 = $row2['zadeti3'];

$sql_faljeni3 = "SELECT COUNT(*) AS faljeni3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_c1 AND (event_type=8 OR event_type=9)";
$query_faljeni3 = mysql_query($sql_faljeni3);
$row1 = mysql_fetch_array($query_faljeni3, MYSQL_ASSOC);
$sql_zadeti3 = "SELECT COUNT(*) AS zadeti3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_c1 AND (event_type=7 OR event_type=13 OR event_type=24)";
$query_zadeti3 = mysql_query($sql_zadeti3);
$row2 = mysql_fetch_array($query_zadeti3, MYSQL_ASSOC);
$faljeni3_c1 = $row1['faljeni3'];
$zadeti3_c1 = $row2['zadeti3'];

//gostje

$sql_faljeni3 = "SELECT COUNT(*) AS faljeni3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_pg1 AND (event_type=8 OR event_type=9)";
$query_faljeni3 = mysql_query($sql_faljeni3);
$row1 = mysql_fetch_array($query_faljeni3, MYSQL_ASSOC);
$sql_zadeti3 = "SELECT COUNT(*) AS zadeti3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_pg1 AND (event_type=7 OR event_type=13 OR event_type=24)";
$query_zadeti3 = mysql_query($sql_zadeti3);
$row2 = mysql_fetch_array($query_zadeti3, MYSQL_ASSOC);
$faljeni3_pg1a = $row1['faljeni3'];
$zadeti3_pg1a = $row2['zadeti3'];

$sql_faljeni3 = "SELECT COUNT(*) AS faljeni3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_sg1 AND (event_type=8 OR event_type=9)";
$query_faljeni3 = mysql_query($sql_faljeni3);
$row1 = mysql_fetch_array($query_faljeni3, MYSQL_ASSOC);
$sql_zadeti3 = "SELECT COUNT(*) AS zadeti3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_sg1 AND (event_type=7 OR event_type=13 OR event_type=24)";
$query_zadeti3 = mysql_query($sql_zadeti3);
$row2 = mysql_fetch_array($query_zadeti3, MYSQL_ASSOC);
$faljeni3_sg1a = $row1['faljeni3'];
$zadeti3_sg1a = $row2['zadeti3'];

$sql_faljeni3 = "SELECT COUNT(*) AS faljeni3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_sf1 AND (event_type=8 OR event_type=9)";
$query_faljeni3 = mysql_query($sql_faljeni3);
$row1 = mysql_fetch_array($query_faljeni3, MYSQL_ASSOC);
$sql_zadeti3 = "SELECT COUNT(*) AS zadeti3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_sf1 AND (event_type=7 OR event_type=13 OR event_type=24)";
$query_zadeti3 = mysql_query($sql_zadeti3);
$row2 = mysql_fetch_array($query_zadeti3, MYSQL_ASSOC);
$faljeni3_sf1a = $row1['faljeni3'];
$zadeti3_sf1a = $row2['zadeti3'];

$sql_faljeni3 = "SELECT COUNT(*) AS faljeni3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_pf1 AND (event_type=8 OR event_type=9)";
$query_faljeni3 = mysql_query($sql_faljeni3);
$row1 = mysql_fetch_array($query_faljeni3, MYSQL_ASSOC);
$sql_zadeti3 = "SELECT COUNT(*) AS zadeti3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_pf1 AND (event_type=7 OR event_type=13 OR event_type=24)";
$query_zadeti3 = mysql_query($sql_zadeti3);
$row2 = mysql_fetch_array($query_zadeti3, MYSQL_ASSOC);
$faljeni3_pf1a = $row1['faljeni3'];
$zadeti3_pf1a = $row2['zadeti3'];

$sql_faljeni3 = "SELECT COUNT(*) AS faljeni3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_c1 AND (event_type=8 OR event_type=9)";
$query_faljeni3 = mysql_query($sql_faljeni3);
$row1 = mysql_fetch_array($query_faljeni3, MYSQL_ASSOC);
$sql_zadeti3 = "SELECT COUNT(*) AS zadeti3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_c1 AND (event_type=7 OR event_type=13 OR event_type=24)";
$query_zadeti3 = mysql_query($sql_zadeti3);
$row2 = mysql_fetch_array($query_zadeti3, MYSQL_ASSOC);
$faljeni3_c1a = $row1['faljeni3'];
$zadeti3_c1a = $row2['zadeti3'];

//REBOUNDS plus rezervni guardi

//domaci

$sql_defen = "SELECT COUNT(*) AS defen FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_pg1 AND (event_type=4 OR event_type=9 OR event_type=28)";
$query_defen = mysql_query($sql_defen);
$row1 = mysql_fetch_array($query_defen, MYSQL_ASSOC);
$sql_ofen = "SELECT COUNT(*) AS ofen FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_pg1 AND (event_type=3 OR event_type=8 OR event_type=29)";
$query_ofen = mysql_query($sql_ofen);
$row2 = mysql_fetch_array($query_ofen, MYSQL_ASSOC);
$defen_pg1 = $row1['defen'];
$ofen_pg1 = $row2['ofen'];

$sql_defen = "SELECT COUNT(*) AS defen FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_sg1 AND (event_type=4 OR event_type=9 OR event_type=28)";
$query_defen = mysql_query($sql_defen);
$row1 = mysql_fetch_array($query_defen, MYSQL_ASSOC);
$sql_ofen = "SELECT COUNT(*) AS ofen FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_sg1 AND (event_type=3 OR event_type=8 OR event_type=29)";
$query_ofen = mysql_query($sql_ofen);
$row2 = mysql_fetch_array($query_ofen, MYSQL_ASSOC);
$defen_sg1 = $row1['defen'];
$ofen_sg1 = $row2['ofen'];

$sql_defen = "SELECT COUNT(*) AS defen FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_sf1 AND (event_type=4 OR event_type=9 OR event_type=28)";
$query_defen = mysql_query($sql_defen);
$row1 = mysql_fetch_array($query_defen, MYSQL_ASSOC);
$sql_ofen = "SELECT COUNT(*) AS ofen FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_sf1 AND (event_type=3 OR event_type=8 OR event_type=29)";
$query_ofen = mysql_query($sql_ofen);
$row2 = mysql_fetch_array($query_ofen, MYSQL_ASSOC);
$defen_sf1 = $row1['defen'];
$ofen_sf1 = $row2['ofen'];

$sql_defen = "SELECT COUNT(*) AS defen FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_pf1 AND (event_type=4 OR event_type=9 OR event_type=28)";
$query_defen = mysql_query($sql_defen);
$row1 = mysql_fetch_array($query_defen, MYSQL_ASSOC);
$sql_ofen = "SELECT COUNT(*) AS ofen FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_pf1 AND (event_type=3 OR event_type=8 OR event_type=29)";
$query_ofen = mysql_query($sql_ofen);
$row2 = mysql_fetch_array($query_ofen, MYSQL_ASSOC);
$defen_pf1 = $row1['defen'];
$ofen_pf1 = $row2['ofen'];

$sql_defen = "SELECT COUNT(*) AS defen FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_c1 AND (event_type=4 OR event_type=9 OR event_type=28)";
$query_defen = mysql_query($sql_defen);
$row1 = mysql_fetch_array($query_defen, MYSQL_ASSOC);
$sql_ofen = "SELECT COUNT(*) AS ofen FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_c1 AND (event_type=3 OR event_type=8 OR event_type=29)";
$query_ofen = mysql_query($sql_ofen);
$row2 = mysql_fetch_array($query_ofen, MYSQL_ASSOC);
$defen_c1 = $row1['defen'];
$ofen_c1 = $row2['ofen'];

$sql2_defen = "SELECT COUNT(*) AS defen FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_pg2 AND (event_type=4 OR event_type=9 OR event_type=28)";
$query2_defen = mysql_query($sql2_defen);
$row1 = mysql_fetch_array($query2_defen, MYSQL_ASSOC);
$sql2_ofen = "SELECT COUNT(*) AS ofen FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_pg2 AND (event_type=3 OR event_type=8 OR event_type=29)";
$query2_ofen = mysql_query($sql2_ofen);
$row2 = mysql_fetch_array($query2_ofen, MYSQL_ASSOC);
$defen_pg2 = $row1['defen'];
$ofen_pg2 = $row2['ofen'];

$sql2_defen = "SELECT COUNT(*) AS defen FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_sg2 AND (event_type=4 OR event_type=9 OR event_type=28)";
$query2_defen = mysql_query($sql2_defen);
$row1 = mysql_fetch_array($query2_defen, MYSQL_ASSOC);
$sql2_ofen = "SELECT COUNT(*) AS ofen FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_sg2 AND (event_type=3 OR event_type=8 OR event_type=29)";
$query2_ofen = mysql_query($sql2_ofen);
$row2 = mysql_fetch_array($query2_ofen, MYSQL_ASSOC);
$defen_sg2 = $row1['defen'];
$ofen_sg2 = $row2['ofen'];

//gostje

$sql_defen = "SELECT COUNT(*) AS defen FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_pg1 AND (event_type=4 OR event_type=9 OR event_type=28)";
$query_defen = mysql_query($sql_defen);
$row1 = mysql_fetch_array($query_defen, MYSQL_ASSOC);
$sql_ofen = "SELECT COUNT(*) AS ofen FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_pg1 AND (event_type=3 OR event_type=8 OR event_type=29)";
$query_ofen = mysql_query($sql_ofen);
$row2 = mysql_fetch_array($query_ofen, MYSQL_ASSOC);
$defen_pg1a = $row1['defen'];
$ofen_pg1a = $row2['ofen'];

$sql_defen = "SELECT COUNT(*) AS defen FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_sg1 AND (event_type=4 OR event_type=9 OR event_type=28)";
$query_defen = mysql_query($sql_defen);
$row1 = mysql_fetch_array($query_defen, MYSQL_ASSOC);
$sql_ofen = "SELECT COUNT(*) AS ofen FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_sg1 AND (event_type=3 OR event_type=8 OR event_type=29)";
$query_ofen = mysql_query($sql_ofen);
$row2 = mysql_fetch_array($query_ofen, MYSQL_ASSOC);
$defen_sg1a = $row1['defen'];
$ofen_sg1a = $row2['ofen'];

$sql_defen = "SELECT COUNT(*) AS defen FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_sf1 AND (event_type=4 OR event_type=9 OR event_type=28)";
$query_defen = mysql_query($sql_defen);
$row1 = mysql_fetch_array($query_defen, MYSQL_ASSOC);
$sql_ofen = "SELECT COUNT(*) AS ofen FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_sf1 AND (event_type=3 OR event_type=8 OR event_type=29)";
$query_ofen = mysql_query($sql_ofen);
$row2 = mysql_fetch_array($query_ofen, MYSQL_ASSOC);
$defen_sf1a = $row1['defen'];
$ofen_sf1a = $row2['ofen'];

$sql_defen = "SELECT COUNT(*) AS defen FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_pf1 AND (event_type=4 OR event_type=9 OR event_type=28)";
$query_defen = mysql_query($sql_defen);
$row1 = mysql_fetch_array($query_defen, MYSQL_ASSOC);
$sql_ofen = "SELECT COUNT(*) AS ofen FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_pf1 AND (event_type=3 OR event_type=8 OR event_type=29)";
$query_ofen = mysql_query($sql_ofen);
$row2 = mysql_fetch_array($query_ofen, MYSQL_ASSOC);
$defen_pf1a = $row1['defen'];
$ofen_pf1a = $row2['ofen'];

$sql_defen = "SELECT COUNT(*) AS defen FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_c1 AND (event_type=4 OR event_type=9 OR event_type=28)";
$query_defen = mysql_query($sql_defen);
$row1 = mysql_fetch_array($query_defen, MYSQL_ASSOC);
$sql_ofen = "SELECT COUNT(*) AS ofen FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_c1 AND (event_type=3 OR event_type=8 OR event_type=29)";
$query_ofen = mysql_query($sql_ofen);
$row2 = mysql_fetch_array($query_ofen, MYSQL_ASSOC);
$defen_c1a = $row1['defen'];
$ofen_c1a = $row2['ofen'];

$sql2_defen = "SELECT COUNT(*) AS defen FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_pg2 AND (event_type=4 OR event_type=9 OR event_type=28)";
$query2_defen = mysql_query($sql2_defen);
$row1 = mysql_fetch_array($query2_defen, MYSQL_ASSOC);
$sql2_ofen = "SELECT COUNT(*) AS ofen FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_pg2 AND (event_type=3 OR event_type=8 OR event_type=29)";
$query2_ofen = mysql_query($sql2_ofen);
$row2 = mysql_fetch_array($query2_ofen, MYSQL_ASSOC);
$defen_pg2a = $row1['defen'];
$ofen_pg2a = $row2['ofen'];

$sql2_defen = "SELECT COUNT(*) AS defen FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_sg2 AND (event_type=4 OR event_type=9 OR event_type=28)";
$query2_defen = mysql_query($sql2_defen);
$row1 = mysql_fetch_array($query2_defen, MYSQL_ASSOC);
$sql2_ofen = "SELECT COUNT(*) AS ofen FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_sg2 AND (event_type=3 OR event_type=8 OR event_type=29)";
$query2_ofen = mysql_query($sql2_ofen);
$row2 = mysql_fetch_array($query2_ofen, MYSQL_ASSOC);
$defen_sg2a = $row1['defen'];
$ofen_sg2a = $row2['ofen'];

//BLOCKS

//domaci

$sql_banan = "SELECT COUNT(*) AS banan FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_pg1 AND event_type=31";
$query_banan = mysql_query($sql_banan);
$row1 = mysql_fetch_array($query_banan, MYSQL_ASSOC);
$banan_pg1 = $row1['banan'];

$sql_banan = "SELECT COUNT(*) AS banan FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_sg1 AND event_type=31";
$query_banan = mysql_query($sql_banan);
$row1 = mysql_fetch_array($query_banan, MYSQL_ASSOC);
$banan_sg1 = $row1['banan'];

$sql_banan = "SELECT COUNT(*) AS banan FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_sf1 AND event_type=31";
$query_banan = mysql_query($sql_banan);
$row1 = mysql_fetch_array($query_banan, MYSQL_ASSOC);
$banan_sf1 = $row1['banan'];

$sql_banan = "SELECT COUNT(*) AS banan FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_pf1 AND event_type=31";
$query_banan = mysql_query($sql_banan);
$row1 = mysql_fetch_array($query_banan, MYSQL_ASSOC);
$banan_pf1 = $row1['banan'];

$sql_banan = "SELECT COUNT(*) AS banan FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_c1 AND event_type=31";
$query_banan = mysql_query($sql_banan);
$row1 = mysql_fetch_array($query_banan, MYSQL_ASSOC);
$banan_c1 = $row1['banan'];

//gostje

$sql_banan = "SELECT COUNT(*) AS banan FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_pg1 AND event_type=31";
$query_banan = mysql_query($sql_banan);
$row1 = mysql_fetch_array($query_banan, MYSQL_ASSOC);
$banan_pg1a = $row1['banan'];

$sql_banan = "SELECT COUNT(*) AS banan FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_sg1 AND event_type=31";
$query_banan = mysql_query($sql_banan);
$row1 = mysql_fetch_array($query_banan, MYSQL_ASSOC);
$banan_sg1a = $row1['banan'];

$sql_banan = "SELECT COUNT(*) AS banan FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_sf1 AND event_type=31";
$query_banan = mysql_query($sql_banan);
$row1 = mysql_fetch_array($query_banan, MYSQL_ASSOC);
$banan_sf1a = $row1['banan'];

$sql_banan = "SELECT COUNT(*) AS banan FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_pf1 AND event_type=31";
$query_banan = mysql_query($sql_banan);
$row1 = mysql_fetch_array($query_banan, MYSQL_ASSOC);
$banan_pf1a = $row1['banan'];

$sql_banan = "SELECT COUNT(*) AS banan FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_c1 AND event_type=31";
$query_banan = mysql_query($sql_banan);
$row1 = mysql_fetch_array($query_banan, MYSQL_ASSOC);
$banan_c1a = $row1['banan'];

//ASSISTS

//domaci

$sql_podaj = "SELECT COUNT(*) AS podaj FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_pg1 AND event_type=1";
$query_podaj = mysql_query($sql_podaj);
$row1 = mysql_fetch_array($query_podaj, MYSQL_ASSOC);
$podaj_pg1 = $row1['podaj'];

$sql_podaj = "SELECT COUNT(*) AS podaj FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_sg1 AND event_type=1";
$query_podaj = mysql_query($sql_podaj);
$row1 = mysql_fetch_array($query_podaj, MYSQL_ASSOC);
$podaj_sg1 = $row1['podaj'];

$sql_podaj = "SELECT COUNT(*) AS podaj FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_sf1 AND event_type=1";
$query_podaj = mysql_query($sql_podaj);
$row1 = mysql_fetch_array($query_podaj, MYSQL_ASSOC);
$podaj_sf1 = $row1['podaj'];

$sql_podaj = "SELECT COUNT(*) AS podaj FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_pf1 AND event_type=1";
$query_podaj = mysql_query($sql_podaj);
$row1 = mysql_fetch_array($query_podaj, MYSQL_ASSOC);
$podaj_pf1 = $row1['podaj'];

$sql_podaj = "SELECT COUNT(*) AS podaj FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_c1 AND event_type=1";
$query_podaj = mysql_query($sql_podaj);
$row1 = mysql_fetch_array($query_podaj, MYSQL_ASSOC);
$podaj_c1 = $row1['podaj'];

//gostje

$sql_podaj = "SELECT COUNT(*) AS podaj FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_pg1 AND event_type=1";
$query_podaj = mysql_query($sql_podaj);
$row1 = mysql_fetch_array($query_podaj, MYSQL_ASSOC);
$podaj_pg1a = $row1['podaj'];

$sql_podaj = "SELECT COUNT(*) AS podaj FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_sg1 AND event_type=1";
$query_podaj = mysql_query($sql_podaj);
$row1 = mysql_fetch_array($query_podaj, MYSQL_ASSOC);
$podaj_sg1a = $row1['podaj'];

$sql_podaj = "SELECT COUNT(*) AS podaj FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_sf1 AND event_type=1";
$query_podaj = mysql_query($sql_podaj);
$row1 = mysql_fetch_array($query_podaj, MYSQL_ASSOC);
$podaj_sf1a = $row1['podaj'];

$sql_podaj = "SELECT COUNT(*) AS podaj FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_pf1 AND event_type=1";
$query_podaj = mysql_query($sql_podaj);
$row1 = mysql_fetch_array($query_podaj, MYSQL_ASSOC);
$podaj_pf1a = $row1['podaj'];

$sql_podaj = "SELECT COUNT(*) AS podaj FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_c1 AND event_type=1";
$query_podaj = mysql_query($sql_podaj);
$row1 = mysql_fetch_array($query_podaj, MYSQL_ASSOC);
$podaj_c1a = $row1['podaj'];

//STEALS

//domaci

$sql_ukrad = "SELECT COUNT(*) AS ukrad FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_pg1 AND event_type=6";
$query_ukrad = mysql_query($sql_ukrad);
$row1 = mysql_fetch_array($query_ukrad, MYSQL_ASSOC);
$ukrad_pg1 = $row1['ukrad'];

$sql_ukrad = "SELECT COUNT(*) AS ukrad FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_sg1 AND event_type=6";
$query_ukrad = mysql_query($sql_ukrad);
$row1 = mysql_fetch_array($query_ukrad, MYSQL_ASSOC);
$ukrad_sg1 = $row1['ukrad'];

$sql_ukrad = "SELECT COUNT(*) AS ukrad FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_sf1 AND event_type=6";
$query_ukrad = mysql_query($sql_ukrad);
$row1 = mysql_fetch_array($query_ukrad, MYSQL_ASSOC);
$ukrad_sf1 = $row1['ukrad'];

$sql_ukrad = "SELECT COUNT(*) AS ukrad FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_pf1 AND event_type=6";
$query_ukrad = mysql_query($sql_ukrad);
$row1 = mysql_fetch_array($query_ukrad, MYSQL_ASSOC);
$ukrad_pf1 = $row1['ukrad'];

$sql_ukrad = "SELECT COUNT(*) AS ukrad FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_c1 AND event_type=6";
$query_ukrad = mysql_query($sql_ukrad);
$row1 = mysql_fetch_array($query_ukrad, MYSQL_ASSOC);
$ukrad_c1 = $row1['ukrad'];

//gostje

$sql_ukrad = "SELECT COUNT(*) AS ukrad FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_pg1 AND event_type=6";
$query_ukrad = mysql_query($sql_ukrad);
$row1 = mysql_fetch_array($query_ukrad, MYSQL_ASSOC);
$ukrad_pg1a = $row1['ukrad'];

$sql_ukrad = "SELECT COUNT(*) AS ukrad FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_sg1 AND event_type=6";
$query_ukrad = mysql_query($sql_ukrad);
$row1 = mysql_fetch_array($query_ukrad, MYSQL_ASSOC);
$ukrad_sg1a = $row1['ukrad'];

$sql_ukrad = "SELECT COUNT(*) AS ukrad FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_sf1 AND event_type=6";
$query_ukrad = mysql_query($sql_ukrad);
$row1 = mysql_fetch_array($query_ukrad, MYSQL_ASSOC);
$ukrad_sf1a = $row1['ukrad'];

$sql_ukrad = "SELECT COUNT(*) AS ukrad FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_pf1 AND event_type=6";
$query_ukrad = mysql_query($sql_ukrad);
$row1 = mysql_fetch_array($query_ukrad, MYSQL_ASSOC);
$ukrad_pf1a = $row1['ukrad'];

$sql_ukrad = "SELECT COUNT(*) AS ukrad FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_c1 AND event_type=6";
$query_ukrad = mysql_query($sql_ukrad);
$row1 = mysql_fetch_array($query_ukrad, MYSQL_ASSOC);
$ukrad_c1a = $row1['ukrad'];

//FOULS

//domaci

$sql_osebne = "SELECT COUNT(*) AS osebne FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_pg1 AND (event_type=10 OR event_type=11 OR event_type=12 OR event_type=13 OR event_type=30 OR event_type=32)";
$query_osebne = mysql_query($sql_osebne);
$row1 = mysql_fetch_array($query_osebne, MYSQL_ASSOC);
$osebne_pg1 = $row1['osebne'];

$sql_osebne = "SELECT COUNT(*) AS osebne FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_sg1 AND (event_type=10 OR event_type=11 OR event_type=12 OR event_type=13 OR event_type=30 OR event_type=32)";
$query_osebne = mysql_query($sql_osebne);
$row1 = mysql_fetch_array($query_osebne, MYSQL_ASSOC);
$osebne_sg1 = $row1['osebne'];

$sql_osebne = "SELECT COUNT(*) AS osebne FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_sf1 AND (event_type=10 OR event_type=11 OR event_type=12 OR event_type=13 OR event_type=30 OR event_type=32)";
$query_osebne = mysql_query($sql_osebne);
$row1 = mysql_fetch_array($query_osebne, MYSQL_ASSOC);
$osebne_sf1 = $row1['osebne'];

$sql_osebne = "SELECT COUNT(*) AS osebne FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_pf1 AND (event_type=10 OR event_type=11 OR event_type=12 OR event_type=13 OR event_type=30 OR event_type=32)";
$query_osebne = mysql_query($sql_osebne);
$row1 = mysql_fetch_array($query_osebne, MYSQL_ASSOC);
$osebne_pf1 = $row1['osebne'];

$sql_osebne = "SELECT COUNT(*) AS osebne FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_c1 AND (event_type=10 OR event_type=11 OR event_type=12 OR event_type=13 OR event_type=30 OR event_type=32)";
$query_osebne = mysql_query($sql_osebne);
$row1 = mysql_fetch_array($query_osebne, MYSQL_ASSOC);
$osebne_c1 = $row1['osebne'];

//gostje

$sql_osebne = "SELECT COUNT(*) AS osebne FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_pg1 AND (event_type=10 OR event_type=11 OR event_type=12 OR event_type=13 OR event_type=30 OR event_type=32)";
$query_osebne = mysql_query($sql_osebne);
$row1 = mysql_fetch_array($query_osebne, MYSQL_ASSOC);
$osebne_pg1a = $row1['osebne'];

$sql_osebne = "SELECT COUNT(*) AS osebne FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_sg1 AND (event_type=10 OR event_type=11 OR event_type=12 OR event_type=13 OR event_type=30 OR event_type=32)";
$query_osebne = mysql_query($sql_osebne);
$row1 = mysql_fetch_array($query_osebne, MYSQL_ASSOC);
$osebne_sg1a = $row1['osebne'];

$sql_osebne = "SELECT COUNT(*) AS osebne FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_sf1 AND (event_type=10 OR event_type=11 OR event_type=12 OR event_type=13 OR event_type=30 OR event_type=32)";
$query_osebne = mysql_query($sql_osebne);
$row1 = mysql_fetch_array($query_osebne, MYSQL_ASSOC);
$osebne_sf1a = $row1['osebne'];

$sql_osebne = "SELECT COUNT(*) AS osebne FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_pf1 AND (event_type=10 OR event_type=11 OR event_type=12 OR event_type=13 OR event_type=30 OR event_type=32)";
$query_osebne = mysql_query($sql_osebne);
$row1 = mysql_fetch_array($query_osebne, MYSQL_ASSOC);
$osebne_pf1a = $row1['osebne'];

$sql_osebne = "SELECT COUNT(*) AS osebne FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_c1 AND (event_type=10 OR event_type=11 OR event_type=12 OR event_type=13 OR event_type=30 OR event_type=32)";
$query_osebne = mysql_query($sql_osebne);
$row1 = mysql_fetch_array($query_osebne, MYSQL_ASSOC);
$osebne_c1a = $row1['osebne'];

//TURNOVERS

//domaci

$sql_napak = "SELECT COUNT(*) AS napak FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_pg1 AND (event_type=5 OR event_type=6 OR event_type=26)";
$query_napak = mysql_query($sql_napak);
$row1 = mysql_fetch_array($query_napak, MYSQL_ASSOC);
$napak_pg1 = $row1['napak'];

$sql_napak = "SELECT COUNT(*) AS napak FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_sg1 AND (event_type=5 OR event_type=6 OR event_type=26)";
$query_napak = mysql_query($sql_napak);
$row1 = mysql_fetch_array($query_napak, MYSQL_ASSOC);
$napak_sg1 = $row1['napak'];

$sql_napak = "SELECT COUNT(*) AS napak FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_sf1 AND (event_type=5 OR event_type=6 OR event_type=26)";
$query_napak = mysql_query($sql_napak);
$row1 = mysql_fetch_array($query_napak, MYSQL_ASSOC);
$napak_sf1 = $row1['napak'];

$sql_napak = "SELECT COUNT(*) AS napak FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_pf1 AND (event_type=5 OR event_type=6 OR event_type=26)";
$query_napak = mysql_query($sql_napak);
$row1 = mysql_fetch_array($query_napak, MYSQL_ASSOC);
$napak_pf1 = $row1['napak'];

$sql_napak = "SELECT COUNT(*) AS napak FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_c1 AND (event_type=5 OR event_type=6 OR event_type=26)";
$query_napak = mysql_query($sql_napak);
$row1 = mysql_fetch_array($query_napak, MYSQL_ASSOC);
$napak_c1 = $row1['napak'];

//gostje

$sql_napak = "SELECT COUNT(*) AS napak FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_pg1 AND (event_type=5 OR event_type=6 OR event_type=26)";
$query_napak = mysql_query($sql_napak);
$row1 = mysql_fetch_array($query_napak, MYSQL_ASSOC);
$napak_pg1a = $row1['napak'];

$sql_napak = "SELECT COUNT(*) AS napak FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_sg1 AND (event_type=5 OR event_type=6 OR event_type=26)";
$query_napak = mysql_query($sql_napak);
$row1 = mysql_fetch_array($query_napak, MYSQL_ASSOC);
$napak_sg1a = $row1['napak'];

$sql_napak = "SELECT COUNT(*) AS napak FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_sf1 AND (event_type=5 OR event_type=6 OR event_type=26)";
$query_napak = mysql_query($sql_napak);
$row1 = mysql_fetch_array($query_napak, MYSQL_ASSOC);
$napak_sf1a = $row1['napak'];

$sql_napak = "SELECT COUNT(*) AS napak FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_pf1 AND (event_type=5 OR event_type=6 OR event_type=26)";
$query_napak = mysql_query($sql_napak);
$row1 = mysql_fetch_array($query_napak, MYSQL_ASSOC);
$napak_pf1a = $row1['napak'];

$sql_napak = "SELECT COUNT(*) AS napak FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_c1 AND (event_type=5 OR event_type=6 OR event_type=26)";
$query_napak = mysql_query($sql_napak);
$row1 = mysql_fetch_array($query_napak, MYSQL_ASSOC);
$napak_c1a = $row1['napak'];


// *** REZERVISTI ***

//THREEPOINTS

//domaci

$sql2_faljeni3 = "SELECT COUNT(*) AS faljeni3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_pg2 AND (event_type=8 OR event_type=9)";
$query2_faljeni3 = mysql_query($sql2_faljeni3);
$row1 = mysql_fetch_array($query2_faljeni3, MYSQL_ASSOC);
$sql2_zadeti3 = "SELECT COUNT(*) AS zadeti3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_pg2 AND (event_type=7 OR event_type=13 OR event_type=24)";
$query2_zadeti3 = mysql_query($sql2_zadeti3);
$row2 = mysql_fetch_array($query2_zadeti3, MYSQL_ASSOC);
$faljeni3_pg2 = $row1['faljeni3'];
$zadeti3_pg2 = $row2['zadeti3'];

$sql2_faljeni3 = "SELECT COUNT(*) AS faljeni3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_sg2 AND (event_type=8 OR event_type=9)";
$query2_faljeni3 = mysql_query($sql2_faljeni3);
$row1 = mysql_fetch_array($query2_faljeni3, MYSQL_ASSOC);
$sql2_zadeti3 = "SELECT COUNT(*) AS zadeti3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_sg2 AND (event_type=7 OR event_type=13 OR event_type=24)";
$query2_zadeti3 = mysql_query($sql2_zadeti3);
$row2 = mysql_fetch_array($query2_zadeti3, MYSQL_ASSOC);
$faljeni3_sg2 = $row1['faljeni3'];
$zadeti3_sg2 = $row2['zadeti3'];

$sql2_faljeni3 = "SELECT COUNT(*) AS faljeni3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_sf2 AND (event_type=8 OR event_type=9)";
$query2_faljeni3 = mysql_query($sql2_faljeni3);
$row1 = mysql_fetch_array($query2_faljeni3, MYSQL_ASSOC);
$sql2_zadeti3 = "SELECT COUNT(*) AS zadeti3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_sf2 AND (event_type=7 OR event_type=13 OR event_type=24)";
$query2_zadeti3 = mysql_query($sql2_zadeti3);
$row2 = mysql_fetch_array($query2_zadeti3, MYSQL_ASSOC);
$faljeni3_sf2 = $row1['faljeni3'];
$zadeti3_sf2 = $row2['zadeti3'];

$sql2_faljeni3 = "SELECT COUNT(*) AS faljeni3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_pf2 AND (event_type=8 OR event_type=9)";
$query2_faljeni3 = mysql_query($sql2_faljeni3);
$row1 = mysql_fetch_array($query2_faljeni3, MYSQL_ASSOC);
$sql2_zadeti3 = "SELECT COUNT(*) AS zadeti3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_pf2 AND (event_type=7 OR event_type=13 OR event_type=24)";
$query2_zadeti3 = mysql_query($sql2_zadeti3);
$row2 = mysql_fetch_array($query2_zadeti3, MYSQL_ASSOC);
$faljeni3_pf2 = $row1['faljeni3'];
$zadeti3_pf2 = $row2['zadeti3'];

$sql2_faljeni3 = "SELECT COUNT(*) AS faljeni3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_c2 AND (event_type=8 OR event_type=9)";
$query2_faljeni3 = mysql_query($sql2_faljeni3);
$row1 = mysql_fetch_array($query2_faljeni3, MYSQL_ASSOC);
$sql2_zadeti3 = "SELECT COUNT(*) AS zadeti3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$home_c2 AND (event_type=7 OR event_type=13 OR event_type=24)";
$query2_zadeti3 = mysql_query($sql2_zadeti3);
$row2 = mysql_fetch_array($query2_zadeti3, MYSQL_ASSOC);
$faljeni3_c2 = $row1['faljeni3'];
$zadeti3_c2 = $row2['zadeti3'];

//gostje

$sql2_faljeni3 = "SELECT COUNT(*) AS faljeni3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_pg2 AND (event_type=8 OR event_type=9)";
$query2_faljeni3 = mysql_query($sql2_faljeni3);
$row1 = mysql_fetch_array($query2_faljeni3, MYSQL_ASSOC);
$sql2_zadeti3 = "SELECT COUNT(*) AS zadeti3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_pg2 AND (event_type=7 OR event_type=13 OR event_type=24)";
$query2_zadeti3 = mysql_query($sql2_zadeti3);
$row2 = mysql_fetch_array($query2_zadeti3, MYSQL_ASSOC);
$faljeni3_pg2a = $row1['faljeni3'];
$zadeti3_pg2a = $row2['zadeti3'];

$sql2_faljeni3 = "SELECT COUNT(*) AS faljeni3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_sg2 AND (event_type=8 OR event_type=9)";
$query2_faljeni3 = mysql_query($sql2_faljeni3);
$row1 = mysql_fetch_array($query2_faljeni3, MYSQL_ASSOC);
$sql2_zadeti3 = "SELECT COUNT(*) AS zadeti3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_sg2 AND (event_type=7 OR event_type=13 OR event_type=24)";
$query2_zadeti3 = mysql_query($sql2_zadeti3);
$row2 = mysql_fetch_array($query2_zadeti3, MYSQL_ASSOC);
$faljeni3_sg2a = $row1['faljeni3'];
$zadeti3_sg2a = $row2['zadeti3'];

$sql2_faljeni3 = "SELECT COUNT(*) AS faljeni3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_sf2 AND (event_type=8 OR event_type=9)";
$query2_faljeni3 = mysql_query($sql2_faljeni3);
$row1 = mysql_fetch_array($query2_faljeni3, MYSQL_ASSOC);
$sql2_zadeti3 = "SELECT COUNT(*) AS zadeti3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_sf2 AND (event_type=7 OR event_type=13 OR event_type=24)";
$query2_zadeti3 = mysql_query($sql2_zadeti3);
$row2 = mysql_fetch_array($query2_zadeti3, MYSQL_ASSOC);
$faljeni3_sf2a = $row1['faljeni3'];
$zadeti3_sf2a = $row2['zadeti3'];

$sql2_faljeni3 = "SELECT COUNT(*) AS faljeni3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_pf2 AND (event_type=8 OR event_type=9)";
$query2_faljeni3 = mysql_query($sql2_faljeni3);
$row1 = mysql_fetch_array($query2_faljeni3, MYSQL_ASSOC);
$sql2_zadeti3 = "SELECT COUNT(*) AS zadeti3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_pf2 AND (event_type=7 OR event_type=13 OR event_type=24)";
$query2_zadeti3 = mysql_query($sql2_zadeti3);
$row2 = mysql_fetch_array($query2_zadeti3, MYSQL_ASSOC);
$faljeni3_pf2a = $row1['faljeni3'];
$zadeti3_pf2a = $row2['zadeti3'];

$sql2_faljeni3 = "SELECT COUNT(*) AS faljeni3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_c2 AND (event_type=8 OR event_type=9)";
$query2_faljeni3 = mysql_query($sql2_faljeni3);
$row1 = mysql_fetch_array($query2_faljeni3, MYSQL_ASSOC);
$sql2_zadeti3 = "SELECT COUNT(*) AS zadeti3 FROM matchevents1 WHERE match_id=$matchid AND player1id=$away_c2 AND (event_type=7 OR event_type=13 OR event_type=24)";
$query2_zadeti3 = mysql_query($sql2_zadeti3);
$row2 = mysql_fetch_array($query2_zadeti3, MYSQL_ASSOC);
$faljeni3_c2a = $row1['faljeni3'];
$zadeti3_c2a = $row2['zadeti3'];

//REBOUNDS

//domaci

$sql2_defen = "SELECT COUNT(*) AS defen FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_sf2 AND (event_type=4 OR event_type=9 OR event_type=28)";
$query2_defen = mysql_query($sql2_defen);
$row1 = mysql_fetch_array($query2_defen, MYSQL_ASSOC);
$sql2_ofen = "SELECT COUNT(*) AS ofen FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_sf2 AND (event_type=3 OR event_type=8 OR event_type=29)";
$query2_ofen = mysql_query($sql2_ofen);
$row2 = mysql_fetch_array($query2_ofen, MYSQL_ASSOC);
$defen_sf2 = $row1['defen'];
$ofen_sf2 = $row2['ofen'];

$sql2_defen = "SELECT COUNT(*) AS defen FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_pf2 AND (event_type=4 OR event_type=9 OR event_type=28)";
$query2_defen = mysql_query($sql2_defen);
$row1 = mysql_fetch_array($query2_defen, MYSQL_ASSOC);
$sql2_ofen = "SELECT COUNT(*) AS ofen FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_pf2 AND (event_type=3 OR event_type=8 OR event_type=29)";
$query2_ofen = mysql_query($sql2_ofen);
$row2 = mysql_fetch_array($query2_ofen, MYSQL_ASSOC);
$defen_pf2 = $row1['defen'];
$ofen_pf2 = $row2['ofen'];

$sql2_defen = "SELECT COUNT(*) AS defen FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_c2 AND (event_type=4 OR event_type=9 OR event_type=28)";
$query2_defen = mysql_query($sql2_defen);
$row1 = mysql_fetch_array($query2_defen, MYSQL_ASSOC);
$sql2_ofen = "SELECT COUNT(*) AS ofen FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_c2 AND (event_type=3 OR event_type=8 OR event_type=29)";
$query2_ofen = mysql_query($sql2_ofen);
$row2 = mysql_fetch_array($query2_ofen, MYSQL_ASSOC);
$defen_c2 = $row1['defen'];
$ofen_c2 = $row2['ofen'];

//gostje

$sql2_defen = "SELECT COUNT(*) AS defen FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_sf2 AND (event_type=4 OR event_type=9 OR event_type=28)";
$query2_defen = mysql_query($sql2_defen);
$row1 = mysql_fetch_array($query2_defen, MYSQL_ASSOC);
$sql2_ofen = "SELECT COUNT(*) AS ofen FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_sf2 AND (event_type=3 OR event_type=8 OR event_type=29)";
$query2_ofen = mysql_query($sql2_ofen);
$row2 = mysql_fetch_array($query2_ofen, MYSQL_ASSOC);
$defen_sf2a = $row1['defen'];
$ofen_sf2a = $row2['ofen'];

$sql2_defen = "SELECT COUNT(*) AS defen FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_pf2 AND (event_type=4 OR event_type=9 OR event_type=28)";
$query2_defen = mysql_query($sql2_defen);
$row1 = mysql_fetch_array($query2_defen, MYSQL_ASSOC);
$sql2_ofen = "SELECT COUNT(*) AS ofen FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_pf2 AND (event_type=3 OR event_type=8 OR event_type=29)";
$query2_ofen = mysql_query($sql2_ofen);
$row2 = mysql_fetch_array($query2_ofen, MYSQL_ASSOC);
$defen_pf2a = $row1['defen'];
$ofen_pf2a = $row2['ofen'];

$sql2_defen = "SELECT COUNT(*) AS defen FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_c2 AND (event_type=4 OR event_type=9 OR event_type=28)";
$query2_defen = mysql_query($sql2_defen);
$row1 = mysql_fetch_array($query2_defen, MYSQL_ASSOC);
$sql2_ofen = "SELECT COUNT(*) AS ofen FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_c2 AND (event_type=3 OR event_type=8 OR event_type=29)";
$query2_ofen = mysql_query($sql2_ofen);
$row2 = mysql_fetch_array($query2_ofen, MYSQL_ASSOC);
$defen_c2a = $row1['defen'];
$ofen_c2a = $row2['ofen'];

//BLOCKS

//domaci

$sql2_banan = "SELECT COUNT(*) AS banan FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_pg2 AND event_type=31";
$query2_banan = mysql_query($sql2_banan);
$row1 = mysql_fetch_array($query2_banan, MYSQL_ASSOC);
$banan_pg2 = $row1['banan'];

$sql2_banan = "SELECT COUNT(*) AS banan FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_sg2 AND event_type=31";
$query2_banan = mysql_query($sql2_banan);
$row1 = mysql_fetch_array($query2_banan, MYSQL_ASSOC);
$banan_sg2 = $row1['banan'];

$sql2_banan = "SELECT COUNT(*) AS banan FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_sf2 AND event_type=31";
$query2_banan = mysql_query($sql2_banan);
$row1 = mysql_fetch_array($query2_banan, MYSQL_ASSOC);
$banan_sf2 = $row1['banan'];

$sql2_banan = "SELECT COUNT(*) AS banan FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_pf2 AND event_type=31";
$query2_banan = mysql_query($sql2_banan);
$row1 = mysql_fetch_array($query2_banan, MYSQL_ASSOC);
$banan_pf2 = $row1['banan'];

$sql2_banan = "SELECT COUNT(*) AS banan FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_c2 AND event_type=31";
$query2_banan = mysql_query($sql2_banan);
$row1 = mysql_fetch_array($query2_banan, MYSQL_ASSOC);
$banan_c2 = $row1['banan'];

//gostje

$sql2_banan = "SELECT COUNT(*) AS banan FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_pg2 AND event_type=31";
$query2_banan = mysql_query($sql2_banan);
$row1 = mysql_fetch_array($query2_banan, MYSQL_ASSOC);
$banan_pg2a = $row1['banan'];

$sql2_banan = "SELECT COUNT(*) AS banan FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_sg2 AND event_type=31";
$query2_banan = mysql_query($sql2_banan);
$row1 = mysql_fetch_array($query2_banan, MYSQL_ASSOC);
$banan_sg2a = $row1['banan'];

$sql2_banan = "SELECT COUNT(*) AS banan FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_sf2 AND event_type=31";
$query2_banan = mysql_query($sql2_banan);
$row1 = mysql_fetch_array($query2_banan, MYSQL_ASSOC);
$banan_sf2a = $row1['banan'];

$sql2_banan = "SELECT COUNT(*) AS banan FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_pf2 AND event_type=31";
$query2_banan = mysql_query($sql2_banan);
$row1 = mysql_fetch_array($query2_banan, MYSQL_ASSOC);
$banan_pf2a = $row1['banan'];

$sql2_banan = "SELECT COUNT(*) AS banan FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_c2 AND event_type=31";
$query2_banan = mysql_query($sql2_banan);
$row1 = mysql_fetch_array($query2_banan, MYSQL_ASSOC);
$banan_c2a = $row1['banan'];

//ASSISTS

//domaci

$sql2_podaj = "SELECT COUNT(*) AS podaj FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_pg2 AND event_type=1";
$query2_podaj = mysql_query($sql2_podaj);
$row1 = mysql_fetch_array($query2_podaj, MYSQL_ASSOC);
$podaj_pg2 = $row1['podaj'];

$sql2_podaj = "SELECT COUNT(*) AS podaj FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_sg2 AND event_type=1";
$query2_podaj = mysql_query($sql2_podaj);
$row1 = mysql_fetch_array($query2_podaj, MYSQL_ASSOC);
$podaj_sg2 = $row1['podaj'];

$sql2_podaj = "SELECT COUNT(*) AS podaj FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_sf2 AND event_type=1";
$query2_podaj = mysql_query($sql2_podaj);
$row1 = mysql_fetch_array($query2_podaj, MYSQL_ASSOC);
$podaj_sf2 = $row1['podaj'];

$sql2_podaj = "SELECT COUNT(*) AS podaj FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_pf2 AND event_type=1";
$query2_podaj = mysql_query($sql2_podaj);
$row1 = mysql_fetch_array($query2_podaj, MYSQL_ASSOC);
$podaj_pf2 = $row1['podaj'];

$sql2_podaj = "SELECT COUNT(*) AS podaj FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_c2 AND event_type=1";
$query2_podaj = mysql_query($sql2_podaj);
$row1 = mysql_fetch_array($query2_podaj, MYSQL_ASSOC);
$podaj_c2 = $row1['podaj'];

//gostje

$sql2_podaj = "SELECT COUNT(*) AS podaj FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_pg2 AND event_type=1";
$query2_podaj = mysql_query($sql2_podaj);
$row1 = mysql_fetch_array($query2_podaj, MYSQL_ASSOC);
$podaj_pg2a = $row1['podaj'];

$sql2_podaj = "SELECT COUNT(*) AS podaj FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_sg2 AND event_type=1";
$query2_podaj = mysql_query($sql2_podaj);
$row1 = mysql_fetch_array($query2_podaj, MYSQL_ASSOC);
$podaj_sg2a = $row1['podaj'];

$sql2_podaj = "SELECT COUNT(*) AS podaj FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_sf2 AND event_type=1";
$query2_podaj = mysql_query($sql2_podaj);
$row1 = mysql_fetch_array($query2_podaj, MYSQL_ASSOC);
$podaj_sf2a = $row1['podaj'];

$sql2_podaj = "SELECT COUNT(*) AS podaj FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_pf2 AND event_type=1";
$query2_podaj = mysql_query($sql2_podaj);
$row1 = mysql_fetch_array($query2_podaj, MYSQL_ASSOC);
$podaj_pf2a = $row1['podaj'];

$sql2_podaj = "SELECT COUNT(*) AS podaj FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_c2 AND event_type=1";
$query2_podaj = mysql_query($sql2_podaj);
$row1 = mysql_fetch_array($query2_podaj, MYSQL_ASSOC);
$podaj_c2a = $row1['podaj'];

//STEALS

//domaci

$sql2_ukrad = "SELECT COUNT(*) AS ukrad FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_pg2 AND event_type=6";
$query2_ukrad = mysql_query($sql2_ukrad);
$row1 = mysql_fetch_array($query2_ukrad, MYSQL_ASSOC);
$ukrad_pg2 = $row1['ukrad'];

$sql2_ukrad = "SELECT COUNT(*) AS ukrad FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_sg2 AND event_type=6";
$query2_ukrad = mysql_query($sql2_ukrad);
$row1 = mysql_fetch_array($query2_ukrad, MYSQL_ASSOC);
$ukrad_sg2 = $row1['ukrad'];

$sql2_ukrad = "SELECT COUNT(*) AS ukrad FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_sf2 AND event_type=6";
$query2_ukrad = mysql_query($sql2_ukrad);
$row1 = mysql_fetch_array($query2_ukrad, MYSQL_ASSOC);
$ukrad_sf2 = $row1['ukrad'];

$sql2_ukrad = "SELECT COUNT(*) AS ukrad FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_pf2 AND event_type=6";
$query2_ukrad = mysql_query($sql2_ukrad);
$row1 = mysql_fetch_array($query2_ukrad, MYSQL_ASSOC);
$ukrad_pf2 = $row1['ukrad'];

$sql2_ukrad = "SELECT COUNT(*) AS ukrad FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_c2 AND event_type=6";
$query2_ukrad = mysql_query($sql2_ukrad);
$row1 = mysql_fetch_array($query2_ukrad, MYSQL_ASSOC);
$ukrad_c2 = $row1['ukrad'];

//gostje

$sql2_ukrad = "SELECT COUNT(*) AS ukrad FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_pg2 AND event_type=6";
$query2_ukrad = mysql_query($sql2_ukrad);
$row1 = mysql_fetch_array($query2_ukrad, MYSQL_ASSOC);
$ukrad_pg2a = $row1['ukrad'];

$sql2_ukrad = "SELECT COUNT(*) AS ukrad FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_sg2 AND event_type=6";
$query2_ukrad = mysql_query($sql2_ukrad);
$row1 = mysql_fetch_array($query2_ukrad, MYSQL_ASSOC);
$ukrad_sg2a = $row1['ukrad'];

$sql2_ukrad = "SELECT COUNT(*) AS ukrad FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_sf2 AND event_type=6";
$query2_ukrad = mysql_query($sql2_ukrad);
$row1 = mysql_fetch_array($query2_ukrad, MYSQL_ASSOC);
$ukrad_sf2a = $row1['ukrad'];

$sql2_ukrad = "SELECT COUNT(*) AS ukrad FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_pf2 AND event_type=6";
$query2_ukrad = mysql_query($sql2_ukrad);
$row1 = mysql_fetch_array($query2_ukrad, MYSQL_ASSOC);
$ukrad_pf2a = $row1['ukrad'];

$sql2_ukrad = "SELECT COUNT(*) AS ukrad FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_c2 AND event_type=6";
$query2_ukrad = mysql_query($sql2_ukrad);
$row1 = mysql_fetch_array($query2_ukrad, MYSQL_ASSOC);
$ukrad_c2a = $row1['ukrad'];

//FOULS

//domaci

$sql2_osebne = "SELECT COUNT(*) AS osebne FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_pg2 AND (event_type=10 OR event_type=11 OR event_type=12 OR event_type=13 OR event_type=30 OR event_type=32)";
$query2_osebne = mysql_query($sql2_osebne);
$row1 = mysql_fetch_array($query2_osebne, MYSQL_ASSOC);
$osebne_pg2 = $row1['osebne'];

$sql2_osebne = "SELECT COUNT(*) AS osebne FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_sg2 AND (event_type=10 OR event_type=11 OR event_type=12 OR event_type=13 OR event_type=30 OR event_type=32)";
$query2_osebne = mysql_query($sql2_osebne);
$row1 = mysql_fetch_array($query2_osebne, MYSQL_ASSOC);
$osebne_sg2 = $row1['osebne'];

$sql2_osebne = "SELECT COUNT(*) AS osebne FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_sf2 AND (event_type=10 OR event_type=11 OR event_type=12 OR event_type=13 OR event_type=30 OR event_type=32)";
$query2_osebne = mysql_query($sql2_osebne);
$row1 = mysql_fetch_array($query2_osebne, MYSQL_ASSOC);
$osebne_sf2 = $row1['osebne'];

$sql2_osebne = "SELECT COUNT(*) AS osebne FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_pf2 AND (event_type=10 OR event_type=11 OR event_type=12 OR event_type=13 OR event_type=30 OR event_type=32)";
$query2_osebne = mysql_query($sql2_osebne);
$row1 = mysql_fetch_array($query2_osebne, MYSQL_ASSOC);
$osebne_pf2 = $row1['osebne'];

$sql2_osebne = "SELECT COUNT(*) AS osebne FROM matchevents1 WHERE match_id=$matchid AND player2id=$home_c2 AND (event_type=10 OR event_type=11 OR event_type=12 OR event_type=13 OR event_type=30 OR event_type=32)";
$query2_osebne = mysql_query($sql2_osebne);
$row1 = mysql_fetch_array($query2_osebne, MYSQL_ASSOC);
$osebne_c2 = $row1['osebne'];

//gostje

$sql2_osebne = "SELECT COUNT(*) AS osebne FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_pg2 AND (event_type=10 OR event_type=11 OR event_type=12 OR event_type=13 OR event_type=30 OR event_type=32)";
$query2_osebne = mysql_query($sql2_osebne);
$row1 = mysql_fetch_array($query2_osebne, MYSQL_ASSOC);
$osebne_pg2a = $row1['osebne'];

$sql2_osebne = "SELECT COUNT(*) AS osebne FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_sg2 AND (event_type=10 OR event_type=11 OR event_type=12 OR event_type=13 OR event_type=30 OR event_type=32)";
$query2_osebne = mysql_query($sql2_osebne);
$row1 = mysql_fetch_array($query2_osebne, MYSQL_ASSOC);
$osebne_sg2a = $row1['osebne'];

$sql2_osebne = "SELECT COUNT(*) AS osebne FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_sf2 AND (event_type=10 OR event_type=11 OR event_type=12 OR event_type=13 OR event_type=30 OR event_type=32)";
$query2_osebne = mysql_query($sql2_osebne);
$row1 = mysql_fetch_array($query2_osebne, MYSQL_ASSOC);
$osebne_sf2a = $row1['osebne'];

$sql2_osebne = "SELECT COUNT(*) AS osebne FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_pf2 AND (event_type=10 OR event_type=11 OR event_type=12 OR event_type=13 OR event_type=30 OR event_type=32)";
$query2_osebne = mysql_query($sql2_osebne);
$row1 = mysql_fetch_array($query2_osebne, MYSQL_ASSOC);
$osebne_pf2a = $row1['osebne'];

$sql2_osebne = "SELECT COUNT(*) AS osebne FROM matchevents1 WHERE match_id=$matchid AND player2id=$away_c2 AND (event_type=10 OR event_type=11 OR event_type=12 OR event_type=13 OR event_type=30 OR event_type=32)";
$query2_osebne = mysql_query($sql2_osebne);
$row1 = mysql_fetch_array($query2_osebne, MYSQL_ASSOC);
$osebne_c2a = $row1['osebne'];

//TURNOVERS

//domaci

$sql2_napak = "SELECT COUNT(*) AS napak FROM matchevents1 WHERE (event_type=5 OR event_type=6 OR event_type=26) AND player1id=$home_pg2 AND match_id=$matchid";
$query2_napak = mysql_query($sql2_napak);
$row1 = mysql_fetch_array($query2_napak, MYSQL_ASSOC);
$napak_pg2 = $row1['napak'];

$sql2_napak = "SELECT COUNT(*) AS napak FROM matchevents1 WHERE (event_type=5 OR event_type=6 OR event_type=26) AND player1id=$home_sg2 AND match_id=$matchid";
$query2_napak = mysql_query($sql2_napak);
$row1 = mysql_fetch_array($query2_napak, MYSQL_ASSOC);
$napak_sg2 = $row1['napak'];

$sql2_napak = "SELECT COUNT(*) AS napak FROM matchevents1 WHERE (event_type=5 OR event_type=6 OR event_type=26) AND player1id=$home_sf2 AND match_id=$matchid";
$query2_napak = mysql_query($sql2_napak);
$row1 = mysql_fetch_array($query2_napak, MYSQL_ASSOC);
$napak_sf2 = $row1['napak'];

$sql2_napak = "SELECT COUNT(*) AS napak FROM matchevents1 WHERE (event_type=5 OR event_type=6 OR event_type=26) AND player1id=$home_pf2 AND match_id=$matchid";
$query2_napak = mysql_query($sql2_napak);
$row1 = mysql_fetch_array($query2_napak, MYSQL_ASSOC);
$napak_pf2 = $row1['napak'];

$sql2_napak = "SELECT COUNT(*) AS napak FROM matchevents1 WHERE (event_type=5 OR event_type=6 OR event_type=26) AND player1id=$home_c2 AND match_id=$matchid";
$query2_napak = mysql_query($sql2_napak);
$row1 = mysql_fetch_array($query2_napak, MYSQL_ASSOC);
$napak_c2 = $row1['napak'];

//gostje

$sql2_napak = "SELECT COUNT(*) AS napak FROM matchevents1 WHERE (event_type=5 OR event_type=6 OR event_type=26) AND player1id=$away_pg2 AND match_id=$matchid";
$query2_napak = mysql_query($sql2_napak);
$row1 = mysql_fetch_array($query2_napak, MYSQL_ASSOC);
$napak_pg2a = $row1['napak'];

$sql2_napak = "SELECT COUNT(*) AS napak FROM matchevents1 WHERE (event_type=5 OR event_type=6 OR event_type=26) AND player1id=$away_sg2 AND match_id=$matchid";
$query2_napak = mysql_query($sql2_napak);
$row1 = mysql_fetch_array($query2_napak, MYSQL_ASSOC);
$napak_sg2a = $row1['napak'];

$sql2_napak = "SELECT COUNT(*) AS napak FROM matchevents1 WHERE (event_type=5 OR event_type=6 OR event_type=26) AND player1id=$away_sf2 AND match_id=$matchid";
$query2_napak = mysql_query($sql2_napak);
$row1 = mysql_fetch_array($query2_napak, MYSQL_ASSOC);
$napak_sf2a = $row1['napak'];

$sql2_napak = "SELECT COUNT(*) AS napak FROM matchevents1 WHERE (event_type=5 OR event_type=6 OR event_type=26) AND player1id=$away_pf2 AND match_id=$matchid";
$query2_napak = mysql_query($sql2_napak);
$row1 = mysql_fetch_array($query2_napak, MYSQL_ASSOC);
$napak_pf2a = $row1['napak'];

$sql2_napak = "SELECT COUNT(*) AS napak FROM matchevents1 WHERE (event_type=5 OR event_type=6 OR event_type=26) AND player1id=$away_c2 AND match_id=$matchid";
$query2_napak = mysql_query($sql2_napak);
$row1 = mysql_fetch_array($query2_napak, MYSQL_ASSOC);
$napak_c2a = $row1['napak'];


//ZAPISI
mysql_query("INSERT INTO statistics VALUES ('',$home_pg1,$home_id,$matchid,7,0,'$country',$default_season,40,$zadeti2_pg1,$zadeti2_pg1+$faljeni2_pg1,$zadeti1_pg1,$vrzeni1_pg1,$zadeti3_pg1,$zadeti3_pg1+$faljeni3_pg1,$defen_pg1,$ofen_pg1,$banan_pg1,$podaj_pg1,$ukrad_pg1,$osebne_pg1,$napak_pg1,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error());
mysql_query("INSERT INTO statistics VALUES ('',$home_sg1,$home_id,$matchid,7,0,'$country',$default_season,40,$zadeti2_sg1,$zadeti2_sg1+$faljeni2_sg1,$zadeti1_sg1,$vrzeni1_sg1,$zadeti3_sg1,$zadeti3_sg1+$faljeni3_sg1,$defen_sg1,$ofen_sg1,$banan_sg1,$podaj_sg1,$ukrad_sg1,$osebne_sg1,$napak_sg1,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error());
mysql_query("INSERT INTO statistics VALUES ('',$home_sf1,$home_id,$matchid,7,0,'$country',$default_season,40,$zadeti2_sf1,$zadeti2_sf1+$faljeni2_sf1,$zadeti1_sf1,$vrzeni1_sf1,$zadeti3_sf1,$zadeti3_sf1+$faljeni3_sf1,$defen_sf1,$ofen_sf1,$banan_sf1,$podaj_sf1,$ukrad_sf1,$osebne_sf1,$napak_sf1,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error());
mysql_query("INSERT INTO statistics VALUES ('',$home_pf1,$home_id,$matchid,7,0,'$country',$default_season,40,$zadeti2_pf1,$zadeti2_pf1+$faljeni2_pf1,$zadeti1_pf1,$vrzeni1_pf1,$zadeti3_pf1,$zadeti3_pf1+$faljeni3_pf1,$defen_pf1,$ofen_pf1,$banan_pf1,$podaj_pf1,$ukrad_pf1,$osebne_pf1,$napak_pf1,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error());
mysql_query("INSERT INTO statistics VALUES ('',$home_c1,$home_id,$matchid,7,0,'$country',$default_season,40,$zadeti2_c1,$zadeti2_c1+$faljeni2_c1,$zadeti1_c1,$vrzeni1_c1,$zadeti3_c1,$zadeti3_c1+$faljeni3_c1,$defen_c1,$ofen_c1,$banan_c1,$podaj_c1,$ukrad_c1,$osebne_c1,$napak_c1,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error());

mysql_query("INSERT INTO statistics VALUES ('',$away_pg1,$away_id,$matchid,7,0,'$country',$default_season,40,$zadeti2_pg1a,$zadeti2_pg1a+$faljeni2_pg1a,$zadeti1_pg1a,$vrzeni1_pg1a,$zadeti3_pg1a,$zadeti3_pg1a+$faljeni3_pg1a,$defen_pg1a,$ofen_pg1a,$banan_pg1a,$podaj_pg1a,$ukrad_pg1a,$osebne_pg1a,$napak_pg1a,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error());
mysql_query("INSERT INTO statistics VALUES ('',$away_sg1,$away_id,$matchid,7,0,'$country',$default_season,40,$zadeti2_sg1a,$zadeti2_sg1a+$faljeni2_sg1a,$zadeti1_sg1a,$vrzeni1_sg1a,$zadeti3_sg1a,$zadeti3_sg1a+$faljeni3_sg1a,$defen_sg1a,$ofen_sg1a,$banan_sg1a,$podaj_sg1a,$ukrad_sg1a,$osebne_sg1a,$napak_sg1a,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error());
mysql_query("INSERT INTO statistics VALUES ('',$away_sf1,$away_id,$matchid,7,0,'$country',$default_season,40,$zadeti2_sf1a,$zadeti2_sf1a+$faljeni2_sf1a,$zadeti1_sf1a,$vrzeni1_sf1a,$zadeti3_sf1a,$zadeti3_sf1a+$faljeni3_sf1a,$defen_sf1a,$ofen_sf1a,$banan_sf1a,$podaj_sf1a,$ukrad_sf1a,$osebne_sf1a,$napak_sf1a,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error());
mysql_query("INSERT INTO statistics VALUES ('',$away_pf1,$away_id,$matchid,7,0,'$country',$default_season,40,$zadeti2_pf1a,$zadeti2_pf1a+$faljeni2_pf1a,$zadeti1_pf1a,$vrzeni1_pf1a,$zadeti3_pf1a,$zadeti3_pf1a+$faljeni3_pf1a,$defen_pf1a,$ofen_pf1a,$banan_pf1a,$podaj_pf1a,$ukrad_pf1a,$osebne_pf1a,$napak_pf1a,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error());
mysql_query("INSERT INTO statistics VALUES ('',$away_c1,$away_id,$matchid,7,0,'$country',$default_season,40,$zadeti2_c1a,$zadeti2_c1a+$faljeni2_c1a,$zadeti1_c1a,$vrzeni1_c1a,$zadeti3_c1a,$zadeti3_c1a+$faljeni3_c1a,$defen_c1a,$ofen_c1a,$banan_c1a,$podaj_c1a,$ukrad_c1a,$osebne_c1a,$napak_c1a,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error());

@mysql_query("UPDATE players SET orient=$matchid WHERE id=$home_pg1 OR id=$home_sg1 OR id=$home_sf1 OR id=$home_pf1 OR id=$home_c1 OR id=$away_pg1 OR id=$away_sg1 OR id=$away_sf1 OR id=$away_pf1 OR id=$away_c1");

if ($zadeti2_pg2 >0 || $faljeni2_pg2 >0 || $vrzeni1_pg2 >0 || $zadeti3_pg2 >0 || $faljeni3_pg2 >0 || $defen_pg2 >0 || $ofen_pg2 >0 || $banan_pg2 >0 || $podaj_pg2 >0 || $ukrad_pg2 >0 || $osebne_pg2 >0 || $napak_pg2 >0) {mysql_query("INSERT INTO statistics VALUES ('',$home_pg2,$home_id,$matchid,7,0,'$country',$default_season,0,$zadeti2_pg2,$zadeti2_pg2+$faljeni2_pg2,$zadeti1_pg2,$vrzeni1_pg2,$zadeti3_pg2,$zadeti3_pg2+$faljeni3_pg2,$defen_pg2,$ofen_pg2,$banan_pg2,$podaj_pg2,$ukrad_pg2,$osebne_pg2,$napak_pg2,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error()); @mysql_query("UPDATE players SET orient=$matchid WHERE id='$home_pg2'");}
if ($zadeti2_sg2 >0 || $faljeni2_sg2 >0 || $vrzeni1_sg2 >0 || $zadeti3_sg2 >0 || $faljeni3_sg2 >0 || $defen_sg2 >0 || $ofen_sg2 >0 || $banan_sg2 >0 || $podaj_sg2 >0 || $ukrad_sg2 >0 || $osebne_sg2 >0 || $napak_sg2 >0) {mysql_query("INSERT INTO statistics VALUES ('',$home_sg2,$home_id,$matchid,7,0,'$country',$default_season,0,$zadeti2_sg2,$zadeti2_sg2+$faljeni2_sg2,$zadeti1_sg2,$vrzeni1_sg2,$zadeti3_sg2,$zadeti3_sg2+$faljeni3_sg2,$defen_sg2,$ofen_sg2,$banan_sg2,$podaj_sg2,$ukrad_sg2,$osebne_sg2,$napak_sg2,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error()); @mysql_query("UPDATE players SET orient=$matchid WHERE id='$home_sg2'");}
if ($zadeti2_sf2 >0 || $faljeni2_sf2 >0 || $vrzeni1_sf2 >0 || $zadeti3_sf2 >0 || $faljeni3_sf2 >0 || $defen_sf2 >0 || $ofen_sf2 >0 || $banan_sf2 >0 || $podaj_sf2 >0 || $ukrad_sf2 >0 || $osebne_sf2 >0 || $napak_sf2 >0) {mysql_query("INSERT INTO statistics VALUES ('',$home_sf2,$home_id,$matchid,7,0,'$country',$default_season,0,$zadeti2_sf2,$zadeti2_sf2+$faljeni2_sf2,$zadeti1_sf2,$vrzeni1_sf2,$zadeti3_sf2,$zadeti3_sf2+$faljeni3_sf2,$defen_sf2,$ofen_sf2,$banan_sf2,$podaj_sf2,$ukrad_sf2,$osebne_sf2,$napak_sf2,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error()); @mysql_query("UPDATE players SET orient=$matchid WHERE id='$home_sf2'");}
if ($zadeti2_pf2 >0 || $faljeni2_pf2 >0 || $vrzeni1_pf2 >0 || $zadeti3_pf2 >0 || $faljeni3_pf2 >0 || $defen_pf2 >0 || $ofen_pf2 >0 || $banan_pf2 >0 || $podaj_pf2 >0 || $ukrad_pf2 >0 || $osebne_pf2 >0 || $napak_pf2 >0) {mysql_query("INSERT INTO statistics VALUES ('',$home_pf2,$home_id,$matchid,7,0,'$country',$default_season,0,$zadeti2_pf2,$zadeti2_pf2+$faljeni2_pf2,$zadeti1_pf2,$vrzeni1_pf2,$zadeti3_pf2,$zadeti3_pf2+$faljeni3_pf2,$defen_pf2,$ofen_pf2,$banan_pf2,$podaj_pf2,$ukrad_pf2,$osebne_pf2,$napak_pf2,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error()); @mysql_query("UPDATE players SET orient=$matchid WHERE id='$home_pf2'");}
if ($zadeti2_c2 >0 || $faljeni2_c2 >0 || $vrzeni1_c2 >0 || $zadeti3_c2 >0 || $faljeni3_c2 >0 || $defen_c2 >0 || $ofen_c2 >0 || $banan_c2 >0 || $podaj_c2 >0 || $ukrad_c2 >0 || $osebne_c2 >0 || $napak_c2 >0) {mysql_query("INSERT INTO statistics VALUES ('',$home_c2,$home_id,$matchid,7,0,'$country',$default_season,0,$zadeti2_c2,$zadeti2_c2+$faljeni2_c2,$zadeti1_c2,$vrzeni1_c2,$zadeti3_c2,$zadeti3_c2+$faljeni3_c2,$defen_c2,$ofen_c2,$banan_c2,$podaj_c2,$ukrad_c2,$osebne_c2,$napak_c2,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error()); @mysql_query("UPDATE players SET orient=$matchid WHERE id='$home_c2'");}

if ($zadeti2_pg2a >0 || $faljeni2_pg2a >0 || $vrzeni1_pg2a >0 || $zadeti3_pg2a >0 || $faljeni3_pg2a >0 || $defen_pg2a >0 || $ofen_pg2a >0 || $banan_pg2a >0 || $podaj_pg2a >0 || $ukrad_pg2a >0 || $osebne_pg2a >0 || $napak_pg2a >0) {mysql_query("INSERT INTO statistics VALUES ('',$away_pg2,$away_id,$matchid,7,0,'$country',$default_season,0,$zadeti2_pg2a,$zadeti2_pg2a+$faljeni2_pg2a,$zadeti1_pg2a,$vrzeni1_pg2a,$zadeti3_pg2a,$zadeti3_pg2a+$faljeni3_pg2a,$defen_pg2a,$ofen_pg2a,$banan_pg2a,$podaj_pg2a,$ukrad_pg2a,$osebne_pg2a,$napak_pg2a,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error()); @mysql_query("UPDATE players SET orient=$matchid WHERE id='$away_pg2'");}
if ($zadeti2_sg2a >0 || $faljeni2_sg2a >0 || $vrzeni1_sg2a >0 || $zadeti3_sg2a >0 || $faljeni3_sg2a >0 || $defen_sg2a >0 || $ofen_sg2a >0 || $banan_sg2a >0 || $podaj_sg2a >0 || $ukrad_sg2a >0 || $osebne_sg2a >0 || $napak_sg2a >0) {mysql_query("INSERT INTO statistics VALUES ('',$away_sg2,$away_id,$matchid,7,0,'$country',$default_season,0,$zadeti2_sg2a,$zadeti2_sg2a+$faljeni2_sg2a,$zadeti1_sg2a,$vrzeni1_sg2a,$zadeti3_sg2a,$zadeti3_sg2a+$faljeni3_sg2a,$defen_sg2a,$ofen_sg2a,$banan_sg2a,$podaj_sg2a,$ukrad_sg2a,$osebne_sg2a,$napak_sg2a,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error()); @mysql_query("UPDATE players SET orient=$matchid WHERE id='$away_sg2'");}
if ($zadeti2_sf2a >0 || $faljeni2_sf2a >0 || $vrzeni1_sf2a >0 || $zadeti3_sf2a >0 || $faljeni3_sf2a >0 || $defen_sf2a >0 || $ofen_sf2a >0 || $banan_sf2a >0 || $podaj_sf2a >0 || $ukrad_sf2a >0 || $osebne_sf2a >0 || $napak_sf2a >0) {mysql_query("INSERT INTO statistics VALUES ('',$away_sf2,$away_id,$matchid,7,0,'$country',$default_season,0,$zadeti2_sf2a,$zadeti2_sf2a+$faljeni2_sf2a,$zadeti1_sf2a,$vrzeni1_sf2a,$zadeti3_sf2a,$zadeti3_sf2a+$faljeni3_sf2a,$defen_sf2a,$ofen_sf2a,$banan_sf2a,$podaj_sf2a,$ukrad_sf2a,$osebne_sf2a,$napak_sf2a,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error()); @mysql_query("UPDATE players SET orient=$matchid WHERE id='$away_sf2'");}
if ($zadeti2_pf2a >0 || $faljeni2_pf2a >0 || $vrzeni1_pf2a >0 || $zadeti3_pf2a >0 || $faljeni3_pf2a >0 || $defen_pf2a >0 || $ofen_pf2a >0 || $banan_pf2a >0 || $podaj_pf2a >0 || $ukrad_pf2a >0 || $osebne_pf2a >0 || $napak_pf2a >0) {mysql_query("INSERT INTO statistics VALUES ('',$away_pf2,$away_id,$matchid,7,0,'$country',$default_season,0,$zadeti2_pf2a,$zadeti2_pf2a+$faljeni2_pf2a,$zadeti1_pf2a,$vrzeni1_pf2a,$zadeti3_pf2a,$zadeti3_pf2a+$faljeni3_pf2a,$defen_pf2a,$ofen_pf2a,$banan_pf2a,$podaj_pf2a,$ukrad_pf2a,$osebne_pf2a,$napak_pf2a,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error()); @mysql_query("UPDATE players SET orient=$matchid WHERE id='$away_pf2'");}
if ($zadeti2_c2a >0 || $faljeni2_c2a >0 || $vrzeni1_c2a >0 || $zadeti3_c2a >0 || $faljeni3_c2a >0 || $defen_c2a >0 || $ofen_c2a >0 || $banan_c2a >0 || $podaj_c2a >0 || $ukrad_c2a >0 || $osebne_c2a >0 || $napak_c2a >0) {mysql_query("INSERT INTO statistics VALUES ('',$away_c2,$away_id,$matchid,7,0,'$country',$default_season,0,$zadeti2_c2a,$zadeti2_c2a+$faljeni2_c2a,$zadeti1_c2a,$vrzeni1_c2a,$zadeti3_c2a,$zadeti3_c2a+$faljeni3_c2a,$defen_c2a,$ofen_c2a,$banan_c2a,$podaj_c2a,$ukrad_c2a,$osebne_c2a,$napak_c2a,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error()); @mysql_query("UPDATE players SET orient=$matchid WHERE id='$away_c2'");}

//MINUTAZA

$splitdatetime = explode(" ", $cas_tekme); $adate = $splitdatetime[0]; $atime = $splitdatetime[1];
$splittime = explode(":", $atime); $ahour = $splittime[0]; $amin = $splittime[1];
$menjave = mysql_query("SELECT player1id, player2id, event_time, quater FROM matchevents1 WHERE (event_type=33 OR event_type = 38) AND match_id=$matchid") or die(mysql_error());
$stevilomenjav = mysql_num_rows($menjave);
if ($stevilomenjav > 0) {
$b=0;
while ($b < $stevilomenjav) {
$player_dol=mysql_result($menjave,$b,"player1id");
$player_gor=mysql_result($menjave,$b,"player2id");
$cas_menjave=mysql_result($menjave,$b,"event_time");
$cetrtina_menjave=mysql_result($menjave,$b,"quater");
$splitdt = explode(" ", $cas_menjave); $bdate = $splitdt[0]; $btime = $splitdt[1];
$splitt = explode(":", $btime); $bhour = $splitt[0]; $bmin = $splitt[1];
if ($cetrtina_menjave==3 OR $cetrtina_menjave==4) {$odstevek=-15;} else {$odstevek=0;}
$minutatekme[$b] = round((((($bhour-$ahour)*60)+$bmin) - $amin + $odstevek) * 40 / 62);
if ($minutatekme[$b]>40) {$minutatekme[$b]=40;}
mysql_query("UPDATE `statistics` SET `gametime`=$minutatekme[$b] WHERE `player`=$player_dol AND `match`=$matchid") or die(mysql_error());
mysql_query("UPDATE `statistics` SET `gametime`=40-$minutatekme[$b] WHERE `player`=$player_gor AND `match`=$matchid") or die(mysql_error());
$b++;
}
}
}
echo $matchid,"_";
}

//stevilo odigranih tekem v seriji
$otekem = mysql_query("SELECT played FROM ekipe WHERE competition=2 ORDER BY played DESC LIMIT 3") or die(mysql_error());
$stekem = mysql_result($otekem,0,"played");
SWITCH ($stekem) {
CASE 2:
$poraz = mysql_query("SELECT ekipa, name AS namee, country AS drzava FROM ekipe, teams WHERE ekipe.ekipa = teams.teamid AND won=0 AND competition=2") or die(mysql_error());
while ($pp=mysql_fetch_array($poraz)){
$zgubekipa = $pp['ekipa'];
$namee = $pp['namee'];
$drzava = $pp['drzava'];
mysql_query("DELETE FROM matches WHERE home_score=0 AND crowd1=0 AND type=7 AND (home_id=$zgubekipa OR away_id=$zgubekipa)") or die(mysql_error());
if ($lid_round==1){$cprice=60000;}
if ($lid_round==2){$cprice=120000;}
if ($lid_round==3){$cprice=240000;}
if ($lid_round==4){$cprice=480000;}
if ($lid_round==5){$cprice=720000;}
if ($lid_round==6){$cprice=900000;}
if ($lid_round==7){$cprice=1200000;}
$dprice = number_format($cprice, 0, ',', '.');
mysql_query("UPDATE teams SET curmoney=curmoney+$cprice WHERE teamid=$zgubekipa") or die("Ne daje denarja");
mysql_query("INSERT INTO events VALUES ('', $zgubekipa, NOW(), 'Team was awarded $dprice &euro; for the Cup Winners Series achievement.', 1, $cprice);");
mysql_query("DELETE FROM ekipe WHERE won=0 AND competition=2 AND ekipa=$zgubekipa") or die(mysql_error());
$tehnik = mysql_query("SELECT userid FROM users WHERE club =$zgubekipa");
if (mysql_num_rows($tehnik) >0) {$userjevid = mysql_result($tehnik,0);} else {$userjevid=0;}
mysql_query("INSERT INTO `history` VALUES ('', $userjevid, $zgubekipa, '$namee', 7, $lid_round, 0, $default_season, '$drzava', 0, '', 0);");
}
break;
CASE 3:
$poraz = mysql_query("SELECT ekipa, name AS namee, country AS drzava FROM ekipe, teams WHERE ekipe.ekipa = teams.teamid AND won=1 AND competition=2") or die(mysql_error());
while ($pp=mysql_fetch_array($poraz)){
$zgubekipa = $pp['ekipa'];
$namee = $pp['namee'];
$drzava = $pp['drzava'];
if ($lid_round==1){$cprice=60000;}
if ($lid_round==2){$cprice=120000;}
if ($lid_round==3){$cprice=240000;}
if ($lid_round==4){$cprice=480000;}
if ($lid_round==5){$cprice=720000;}
if ($lid_round==6){$cprice=900000;}
if ($lid_round==7){$cprice=1200000;}
$dprice = number_format($cprice, 0, ',', '.');
mysql_query("UPDATE teams SET curmoney=curmoney+$cprice WHERE teamid=$zgubekipa") or die("Ne daje denarja");
mysql_query("INSERT INTO events VALUES ('', $zgubekipa, NOW(), 'The club was awarded $dprice &euro; for the Cup Winners Series achievement.', 1, $cprice);");
mysql_query("DELETE FROM ekipe WHERE won=1 AND competition=2 AND ekipa=$zgubekipa");
$tehnik = mysql_query("SELECT userid FROM users WHERE club =$zgubekipa");
if (mysql_num_rows($tehnik) >0) {$userjevid = mysql_result($tehnik,0);} else {$userjevid=0;}
mysql_query("INSERT INTO `history` VALUES ('', $userjevid, $zgubekipa, '$namee', 7, $lid_round, 0, $default_season, '$drzava', 0, '', 0);");
}
if (mysql_num_rows($otekem)>2) {
//ZREB
$splitdatetim = explode(" ", $cas_tekme); $dbdate = $splitdatetim[0]; $dbtime = $splitdatetim[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$day1 = date("Y-m-d H:i:s", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday+7,$dbyear));
$day2 = date("Y-m-d H:i:s", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday+14,$dbyear));
$day3 = date("Y-m-d H:i:s", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday+21,$dbyear));
$ekipezapokal = mysql_query("SELECT ekipa FROM ekipe WHERE competition=2 ORDER BY RAND()") or die(mysql_error());
$pika = mysql_num_rows($ekipezapokal);
$k=0;
$n=0;
$m=1;
while ($k < $pika/2) {
$teamid1=mysql_result($ekipezapokal,$n);
$teamid2=mysql_result($ekipezapokal,$m);
$aquery1 = mysql_query("SELECT arenaid FROM arena WHERE teamid=$teamid1 LIMIT 1") or die(mysql_error());
$arenaid1cup = mysql_result($aquery1,0);
$aquery2 = mysql_query("SELECT arenaid FROM arena WHERE teamid=$teamid2 LIMIT 1") or die(mysql_error());
$arenaid2cup = mysql_result($aquery2,0);
$drza1 = mysql_query("SELECT country FROM teams WHERE teamid=$teamid1 LIMIT 1") or die(mysql_error());
$drzava1 = mysql_result($drza1,0);
$drza2 = mysql_query("SELECT country FROM teams WHERE teamid=$teamid2 LIMIT 1") or die(mysql_error());
$drzava2 = mysql_result($drza2,0);
echo $teamid1," VERSUS ",$teamid2," IN ",$arenaidcup,"<br/>";
mysql_query("INSERT INTO matches VALUES ('', $teamid1, '', $teamid2, '', $arenaid1cup, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day1', 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$drzava1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $lid_round+1, $default_season, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)") or die(mysql_error());
mysql_query("INSERT INTO matches VALUES ('', $teamid2, '', $teamid1, '', $arenaid2cup, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day2', 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$drzava2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $lid_round+1, $default_season, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)") or die(mysql_error());
mysql_query("INSERT INTO matches VALUES ('', $teamid2, '', $teamid1, '', $arenaid2cup, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$day3', 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$drzava2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $lid_round+1, $default_season, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)") or die(mysql_error());
mysql_query("UPDATE arena SET fans=fans+15 WHERE teamid=$teamid1 LIMIT 1");
mysql_query("UPDATE arena SET fans=fans+15 WHERE teamid=$teamid2 LIMIT 1");
mysql_query("INSERT INTO events VALUES ('', $teamid1, NOW(), 'International glory has increased interest in your club. 15 new fans joined the fanclub as a result.', 0, 0);");
mysql_query("INSERT INTO events VALUES ('', $teamid2, NOW(), 'International glory has increased interest in your club. 15 new fans joined the fanclub as a result.', 0, 0);");
mysql_query("UPDATE teams SET curmoney=curmoney+600 WHERE teamid=$teamid1 LIMIT 1");
mysql_query("UPDATE teams SET curmoney=curmoney+600 WHERE teamid=$teamid2 LIMIT 1");
$n=$n+2;
$m=$m+2;
$k++;
}
}
mysql_query("UPDATE ekipe SET played=0, won=0 WHERE competition=2") or die(mysql_error());
break;
}

//KONEC?
$fin = mysql_query("SELECT ekipa, name, country FROM ekipe, teams WHERE ekipe.ekipa = teams.teamid AND competition=2") or die(mysql_error());
if (mysql_num_rows($fin)==1){
$zmagovalc = mysql_result($fin,0,"ekipa");
$namee = mysql_result($fin,0,"name");
$drzava = mysql_result($fin,0,"country");
mysql_query("DELETE FROM matches WHERE home_score=0 AND crowd1=0 AND type=7 AND (home_id=$zmagovalc OR away_id=$zmagovalc) LIMIT 1");
$crpice=1800000;
mysql_query("UPDATE teams SET curmoney=curmoney+$crpice WHERE teamid=$zmagovalc") or die("Ne daje denarja");
$drpice = number_format($crpice, 0, ',', '.');
mysql_query("INSERT INTO events VALUES ('', $zmagovalc, NOW(), 'The club was awarded $drpice &euro; for winning the Cup Winners Series.', 1, $crpice);");
$komu = mysql_query("SELECT userid FROM users WHERE club=$zmagovalc LIMIT 1");
$komuposljem = mysql_result($komu,0,"userid");
mysql_query("INSERT INTO messages VALUES ('', $komuposljem, 0, 0, NOW(), 'Congratulations!', 'You did it!<br/><br/>Another amazing achivement for your team. I wish you to celebrate it in the best possible way :-)<br/><br/>Regards<br/>admin')") or die(mysql_error());
mysql_query("INSERT INTO history VALUES ('', $komuposljem, $zmagovalc, '$namee', 7, 7, 1, $default_season, '$drzava', 0, '', 0);");
mysql_query("UPDATE arena SET fans=fans+15 WHERE teamid=$zmagovalc LIMIT 1");
mysql_query("INSERT INTO events VALUES ('', $zmagovalc, NOW(), 'International glory has increased interest in your club. 15 new fans joined the fanclub as a result.', 0, 0);");
mysql_query("UPDATE teams SET curmoney=curmoney+600 WHERE teamid=$zmagovalc LIMIT 1");
}

die("|CWS_matches_OK|");
?>