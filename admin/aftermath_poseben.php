<?php
sa
ini_set("max_execution_time",3000);
include_once("common.php");
$ccountry='Belgium';

$uratekemje = mysql_query("SELECT * FROM `matches` WHERE `crowd1` <>0 AND `home_score`=0 AND `country` LIKE '$ccountry'") or die(mysql_error());
while ($u = mysql_fetch_array($uratekemje)) {
$matchid=$u["matchid"];
$home_id=$u["home_id"];
$away_id=$u["away_id"];
$type=$u["type"];
$cas_tekme=$u["time"];
$home_pg1=$u["home_pg1"];
$home_sg1=$u["home_sg1"];
$home_sf1=$u["home_sf1"];
$home_pf1=$u["home_pf1"];
$home_c1=$u["home_c1"];
$away_pg1=$u["away_pg1"];
$away_sg1=$u["away_sg1"];
$away_sf1=$u["away_sf1"];
$away_pf1=$u["away_pf1"];
$away_c1=$u["away_c1"];
$home_pg2=$u["home_pg2"];
$home_sg2=$u["home_sg2"];
$home_sf2=$u["home_sf2"];
$home_pf2=$u["home_pf2"];
$home_c2=$u["home_c2"];
$away_pg2=$u["away_pg2"];
$away_sg2=$u["away_sg2"];
$away_sf2=$u["away_sf2"];
$away_pf2=$u["away_pf2"];
$away_c2=$u["away_c2"];
$country=$u["country"];

$domacirezultat = mysql_query("SELECT `home_sc` FROM `matchevents1` WHERE `match_id`=$matchid ORDER BY `event_time` DESC, `player1id` ASC LIMIT 1") or die(mysql_error());
$gostjerezultat = mysql_query("SELECT `away_sc` FROM `matchevents1` WHERE `match_id`=$matchid ORDER BY `event_time` DESC, `player1id` ASC LIMIT 1") or die(mysql_error());
$domaci = mysql_result($domacirezultat,0);
$gostje = mysql_result($gostjerezultat,0);
mysql_query("UPDATE `matches` SET `home_score`=$domaci, `away_score`=$gostje WHERE `matchid`=$matchid LIMIT 1") or die(mysql_error());

//status ekip
$preveter = mysql_query("SELECT `status` FROM `teams` WHERE `teamid`=$away_id") or die(mysql_error());
$veter = mysql_result($preveter,0);
$preveter1 = mysql_query("SELECT `status` FROM `teams` WHERE `teamid`=$home_id") or die(mysql_error());
$veter1 = mysql_result($preveter1,0);

$imapokal_dom = mysql_query("SELECT matchid FROM matches WHERE crowd1 =0 AND (type=2 OR type=3) AND (home_id=$home_id OR away_id=$home_id)") or die(mysql_error());
if (mysql_num_rows($imapokal_dom) > 0) {$zeima1=1;}
$imapokal_gos = mysql_query("SELECT matchid FROM matches WHERE crowd1 =0 AND (type=2 OR type=3) AND (home_id=$away_id OR away_id=$away_id)") or die(mysql_error());
if (mysql_num_rows($imapokal_gos) > 0) {$zeima=1;}
if ($veter<2 AND $zeima !=1) {mysql_query("UPDATE users SET friendly=0 WHERE club=$away_id LIMIT 1");}
if ($veter1<2 AND $zeima1 !=1) {mysql_query("UPDATE users SET friendly=0 WHERE club=$home_id LIMIT 1");}

//STATISTIKA
if (($domaci >1) && ($gostje >1)) {
$ftime = time(); $fyear=date('Y', $ftime); $fmonth=date('m', $ftime); $fday=date('d', $ftime); $fhour=date('H', $ftime); $fmin=date('i', $ftime); $fsec=date('s', $ftime);
echo $matchid,"_";

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
mysql_query("INSERT INTO statistics VALUES ('',$home_pg1,$home_id,$matchid,$type,0,'$country',$default_season,40,$zadeti2_pg1,$zadeti2_pg1+$faljeni2_pg1,$zadeti1_pg1,$vrzeni1_pg1,$zadeti3_pg1,$zadeti3_pg1+$faljeni3_pg1,$defen_pg1,$ofen_pg1,$banan_pg1,$podaj_pg1,$ukrad_pg1,$osebne_pg1,$napak_pg1,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error());
mysql_query("INSERT INTO statistics VALUES ('',$home_sg1,$home_id,$matchid,$type,0,'$country',$default_season,40,$zadeti2_sg1,$zadeti2_sg1+$faljeni2_sg1,$zadeti1_sg1,$vrzeni1_sg1,$zadeti3_sg1,$zadeti3_sg1+$faljeni3_sg1,$defen_sg1,$ofen_sg1,$banan_sg1,$podaj_sg1,$ukrad_sg1,$osebne_sg1,$napak_sg1,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error());
mysql_query("INSERT INTO statistics VALUES ('',$home_sf1,$home_id,$matchid,$type,0,'$country',$default_season,40,$zadeti2_sf1,$zadeti2_sf1+$faljeni2_sf1,$zadeti1_sf1,$vrzeni1_sf1,$zadeti3_sf1,$zadeti3_sf1+$faljeni3_sf1,$defen_sf1,$ofen_sf1,$banan_sf1,$podaj_sf1,$ukrad_sf1,$osebne_sf1,$napak_sf1,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error());
mysql_query("INSERT INTO statistics VALUES ('',$home_pf1,$home_id,$matchid,$type,0,'$country',$default_season,40,$zadeti2_pf1,$zadeti2_pf1+$faljeni2_pf1,$zadeti1_pf1,$vrzeni1_pf1,$zadeti3_pf1,$zadeti3_pf1+$faljeni3_pf1,$defen_pf1,$ofen_pf1,$banan_pf1,$podaj_pf1,$ukrad_pf1,$osebne_pf1,$napak_pf1,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error());
mysql_query("INSERT INTO statistics VALUES ('',$home_c1,$home_id,$matchid,$type,0,'$country',$default_season,40,$zadeti2_c1,$zadeti2_c1+$faljeni2_c1,$zadeti1_c1,$vrzeni1_c1,$zadeti3_c1,$zadeti3_c1+$faljeni3_c1,$defen_c1,$ofen_c1,$banan_c1,$podaj_c1,$ukrad_c1,$osebne_c1,$napak_c1,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error());

mysql_query("INSERT INTO statistics VALUES ('',$away_pg1,$away_id,$matchid,$type,0,'$country',$default_season,40,$zadeti2_pg1a,$zadeti2_pg1a+$faljeni2_pg1a,$zadeti1_pg1a,$vrzeni1_pg1a,$zadeti3_pg1a,$zadeti3_pg1a+$faljeni3_pg1a,$defen_pg1a,$ofen_pg1a,$banan_pg1a,$podaj_pg1a,$ukrad_pg1a,$osebne_pg1a,$napak_pg1a,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error());
mysql_query("INSERT INTO statistics VALUES ('',$away_sg1,$away_id,$matchid,$type,0,'$country',$default_season,40,$zadeti2_sg1a,$zadeti2_sg1a+$faljeni2_sg1a,$zadeti1_sg1a,$vrzeni1_sg1a,$zadeti3_sg1a,$zadeti3_sg1a+$faljeni3_sg1a,$defen_sg1a,$ofen_sg1a,$banan_sg1a,$podaj_sg1a,$ukrad_sg1a,$osebne_sg1a,$napak_sg1a,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error());
mysql_query("INSERT INTO statistics VALUES ('',$away_sf1,$away_id,$matchid,$type,0,'$country',$default_season,40,$zadeti2_sf1a,$zadeti2_sf1a+$faljeni2_sf1a,$zadeti1_sf1a,$vrzeni1_sf1a,$zadeti3_sf1a,$zadeti3_sf1a+$faljeni3_sf1a,$defen_sf1a,$ofen_sf1a,$banan_sf1a,$podaj_sf1a,$ukrad_sf1a,$osebne_sf1a,$napak_sf1a,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error());
mysql_query("INSERT INTO statistics VALUES ('',$away_pf1,$away_id,$matchid,$type,0,'$country',$default_season,40,$zadeti2_pf1a,$zadeti2_pf1a+$faljeni2_pf1a,$zadeti1_pf1a,$vrzeni1_pf1a,$zadeti3_pf1a,$zadeti3_pf1a+$faljeni3_pf1a,$defen_pf1a,$ofen_pf1a,$banan_pf1a,$podaj_pf1a,$ukrad_pf1a,$osebne_pf1a,$napak_pf1a,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error());
mysql_query("INSERT INTO statistics VALUES ('',$away_c1,$away_id,$matchid,$type,0,'$country',$default_season,40,$zadeti2_c1a,$zadeti2_c1a+$faljeni2_c1a,$zadeti1_c1a,$vrzeni1_c1a,$zadeti3_c1a,$zadeti3_c1a+$faljeni3_c1a,$defen_c1a,$ofen_c1a,$banan_c1a,$podaj_c1a,$ukrad_c1a,$osebne_c1a,$napak_c1a,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error());

mysql_query("INSERT INTO statistics VALUES ('',$home_pg2,$home_id,$matchid,$type,0,'$country',$default_season,0,$zadeti2_pg2,$zadeti2_pg2+$faljeni2_pg2,$zadeti1_pg2,$vrzeni1_pg2,$zadeti3_pg2,$zadeti3_pg2+$faljeni3_pg2,$defen_pg2,$ofen_pg2,$banan_pg2,$podaj_pg2,$ukrad_pg2,$osebne_pg2,$napak_pg2,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error());
mysql_query("INSERT INTO statistics VALUES ('',$home_sg2,$home_id,$matchid,$type,0,'$country',$default_season,0,$zadeti2_sg2,$zadeti2_sg2+$faljeni2_sg2,$zadeti1_sg2,$vrzeni1_sg2,$zadeti3_sg2,$zadeti3_sg2+$faljeni3_sg2,$defen_sg2,$ofen_sg2,$banan_sg2,$podaj_sg2,$ukrad_sg2,$osebne_sg2,$napak_sg2,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error());
mysql_query("INSERT INTO statistics VALUES ('',$home_sf2,$home_id,$matchid,$type,0,'$country',$default_season,0,$zadeti2_sf2,$zadeti2_sf2+$faljeni2_sf2,$zadeti1_sf2,$vrzeni1_sf2,$zadeti3_sf2,$zadeti3_sf2+$faljeni3_sf2,$defen_sf2,$ofen_sf2,$banan_sf2,$podaj_sf2,$ukrad_sf2,$osebne_sf2,$napak_sf2,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error());
mysql_query("INSERT INTO statistics VALUES ('',$home_pf2,$home_id,$matchid,$type,0,'$country',$default_season,0,$zadeti2_pf2,$zadeti2_pf2+$faljeni2_pf2,$zadeti1_pf2,$vrzeni1_pf2,$zadeti3_pf2,$zadeti3_pf2+$faljeni3_pf2,$defen_pf2,$ofen_pf2,$banan_pf2,$podaj_pf2,$ukrad_pf2,$osebne_pf2,$napak_pf2,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error());
mysql_query("INSERT INTO statistics VALUES ('',$home_c2,$home_id,$matchid,$type,0,'$country',$default_season,0,$zadeti2_c2,$zadeti2_c2+$faljeni2_c2,$zadeti1_c2,$vrzeni1_c2,$zadeti3_c2,$zadeti3_c2+$faljeni3_c2,$defen_c2,$ofen_c2,$banan_c2,$podaj_c2,$ukrad_c2,$osebne_c2,$napak_c2,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error());

mysql_query("INSERT INTO statistics VALUES ('',$away_pg2,$away_id,$matchid,$type,0,'$country',$default_season,0,$zadeti2_pg2a,$zadeti2_pg2a+$faljeni2_pg2a,$zadeti1_pg2a,$vrzeni1_pg2a,$zadeti3_pg2a,$zadeti3_pg2a+$faljeni3_pg2a,$defen_pg2a,$ofen_pg2a,$banan_pg2a,$podaj_pg2a,$ukrad_pg2a,$osebne_pg2a,$napak_pg2a,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error());
mysql_query("INSERT INTO statistics VALUES ('',$away_sg2,$away_id,$matchid,$type,0,'$country',$default_season,0,$zadeti2_sg2a,$zadeti2_sg2a+$faljeni2_sg2a,$zadeti1_sg2a,$vrzeni1_sg2a,$zadeti3_sg2a,$zadeti3_sg2a+$faljeni3_sg2a,$defen_sg2a,$ofen_sg2a,$banan_sg2a,$podaj_sg2a,$ukrad_sg2a,$osebne_sg2a,$napak_sg2a,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error());
mysql_query("INSERT INTO statistics VALUES ('',$away_sf2,$away_id,$matchid,$type,0,'$country',$default_season,0,$zadeti2_sf2a,$zadeti2_sf2a+$faljeni2_sf2a,$zadeti1_sf2a,$vrzeni1_sf2a,$zadeti3_sf2a,$zadeti3_sf2a+$faljeni3_sf2a,$defen_sf2a,$ofen_sf2a,$banan_sf2a,$podaj_sf2a,$ukrad_sf2a,$osebne_sf2a,$napak_sf2a,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error());
mysql_query("INSERT INTO statistics VALUES ('',$away_pf2,$away_id,$matchid,$type,0,'$country',$default_season,0,$zadeti2_pf2a,$zadeti2_pf2a+$faljeni2_pf2a,$zadeti1_pf2a,$vrzeni1_pf2a,$zadeti3_pf2a,$zadeti3_pf2a+$faljeni3_pf2a,$defen_pf2a,$ofen_pf2a,$banan_pf2a,$podaj_pf2a,$ukrad_pf2a,$osebne_pf2a,$napak_pf2a,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error());
mysql_query("INSERT INTO statistics VALUES ('',$away_c2,$away_id,$matchid,$type,0,'$country',$default_season,0,$zadeti2_c2a,$zadeti2_c2a+$faljeni2_c2a,$zadeti1_c2a,$vrzeni1_c2a,$zadeti3_c2a,$zadeti3_c2a+$faljeni3_c2a,$defen_c2a,$ofen_c2a,$banan_c2a,$podaj_c2a,$ukrad_c2a,$osebne_c2a,$napak_c2a,'$fyear=$fmonth=$fday $fhour+$fmin+$fsec');") or die(mysql_error());

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
$splitdt = explode(" ", $cas_menjave);
$bdate = $splitdt[0]; $btime = $splitdt[1];
$splitt = explode(":", $btime); $bhour = $splitt[0]; $bmin = $splitt[1];
if ($cetrtina_menjave == 3 OR $cetrtina_menjave == 4) {$odstevek=-15;} else {$odstevek=0;}
if ($bhour==00) {$bhour=24;}
$minutatekme[$b] = round((((($bhour-$ahour)*60)+$bmin) - $amin + $odstevek) * 40 / 62);
if ($minutatekme[$b]>40) {$minutatekme[$b]=40;}
$zapisvb = $minutatekme[$b];
mysql_query("UPDATE `statistics` SET `gametime` ='$zapisvb' WHERE `player` ='$player_dol' AND `match` ='$matchid'") or die(mysql_error());
mysql_query("UPDATE `statistics` SET `gametime` =40-'$zapisvb' WHERE `player` ='$player_gor' AND `match` ='$matchid'") or die(mysql_error());

if ($zapisvb==0) {echo "___".$player_dol."___".$zadeti2_c2a."___itd___";}

$b++;
}
}
}
}
?>