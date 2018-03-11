<?php
ini_set("max_execution_time", 2500);
require_once("cron2conect.php");
$tetekme = mysql_query("SELECT `time` FROM `nt_matches` WHERE `crowd1`=0 ORDER BY `time` ASC LIMIT 1") or die(mysql_error());
$datumzazdaj = mysql_result($tetekme,0);

mysql_query("DELETE FROM `nt_frendly dates` WHERE `date` LIKE '$datumzazdaj' LIMIT 1");
mysql_query("DELETE FROM `u18nt_friendly` WHERE `when` LIKE '$datumzazdaj'");

$tekmice = mysql_query("SELECT `matchid` FROM `nt_matches` WHERE `time`= '$datumzazdaj' AND `type` >10 AND `crowd1` =0") or die(mysql_error());
$tekemje = mysql_num_rows($tekmice);
if ($tekemje == 0) {die("End of matches");}
$u=0;
while ($u < $tekemje) { 
$matchid=mysql_result($tekmice,$u,"matchid");
$homescore='';
$awayscore='';
$dogodek='';
$walkover='';
$stevilodogodkov='';
$stevilodogodkov1='';
$stevilodogodkov2='';
$stevilodogodkov3='';
$nadaljevandogodek='';
$randdd='';
$ekipazzogo='';
$mposkodb='';
$eventime='';
$teamwithball='';
$home_pg1_favli='';
$home_sg1_favli='';
$home_sf1_favli='';
$home_pf1_favli='';
$home_c1_favli='';
$away_pg1_favli='';
$away_sg1_favli='';
$away_sf1_favli='';
$away_pf1_favli='';
$away_c1_favli='';
$dogodek_po_kraji='';
$bonusdosegel='';
$vengre='';
$dobljenskok='';
$ekipazzogo='';
$home_noofshots=0;
$away_noofshots=0;
$home_noofTOs=0;
$away_noofTOs=0;
$home_fouledtimes=0;
$away_fouledtimes=0;
$home2zadeti=0;
$away2zadeti=0;
$home2faljeni=0;
$away2faljeni=0;
$fugaH=0;
$fugaA=0;
$rand2ph=0;
$rand2pa=0;
$homeNTC='';
$awayNTC='';
$homeUNC='';
$awayUNC='';

echo "http://basketsim.com/nt_prikaz.php?matchid=".$matchid." ";

$result = mysql_query("SELECT home_id, away_id, arena_id, time, type FROM nt_matches WHERE matchid=$matchid LIMIT 1") or die("Ne bere iz tabele tekme!");
while($r=mysql_fetch_array($result)) {
$home_id=$r["home_id"];
$away_id=$r["away_id"];
$arena_id=$r["arena_id"];
$time=$r["time"];
$type=$r["type"];
}

$selektamo1 = mysql_query("SELECT mood,pg1,sg1,sf1,pf1,c1,pg2,sg2,sf2,pf2,c2,off,def,att,captain FROM u18countries WHERE countryid=$home_id LIMIT 1");
$home_mood = mysql_result($selektamo1,0,"mood");
$home_pg1 = mysql_result($selektamo1,0,"pg1");
$home_sg1 = mysql_result($selektamo1,0,"sg1");
$home_sf1 = mysql_result($selektamo1,0,"sf1");
$home_pf1 = mysql_result($selektamo1,0,"pf1");
$home_c1 = mysql_result($selektamo1,0,"c1");
$home_pg2 = mysql_result($selektamo1,0,"pg2");
$home_sg2 = mysql_result($selektamo1,0,"sg2");
$home_sf2 = mysql_result($selektamo1,0,"sf2");
$home_pf2 = mysql_result($selektamo1,0,"pf2");
$home_c2 = mysql_result($selektamo1,0,"c2");
$home_off = mysql_result($selektamo1,0,"off");
$home_def = mysql_result($selektamo1,0,"def");
$home_att = mysql_result($selektamo1,0,"att");
$homeUNC = mysql_result($selektamo1,0,"captain");

$selektamo2 = mysql_query("SELECT mood,pg1,sg1,sf1,pf1,c1,pg2,sg2,sf2,pf2,c2,off,def,att,captain FROM u18countries WHERE countryid=$away_id LIMIT 1");
$away_mood = mysql_result($selektamo2,0,"mood");
$away_pg1 = mysql_result($selektamo2,0,"pg1");
$away_sg1 = mysql_result($selektamo2,0,"sg1");
$away_sf1 = mysql_result($selektamo2,0,"sf1");
$away_pf1 = mysql_result($selektamo2,0,"pf1");
$away_c1 = mysql_result($selektamo2,0,"c1");
$away_pg2 = mysql_result($selektamo2,0,"pg2");
$away_sg2 = mysql_result($selektamo2,0,"sg2");
$away_sf2 = mysql_result($selektamo2,0,"sf2");
$away_pf2 = mysql_result($selektamo2,0,"pf2");
$away_c2 = mysql_result($selektamo2,0,"c2");
$away_off = mysql_result($selektamo2,0,"off");
$away_def = mysql_result($selektamo2,0,"def");
$away_att = mysql_result($selektamo2,0,"att");
$awayUNC = mysql_result($selektamo2,0,"captain");

//so igralci v klubu in zdravi?

$checkHOME = mysql_query("SELECT id,ntplayer,injury,age FROM players WHERE id='$home_pg1' OR id='$home_sg1' OR id='$home_sf1' OR id='$home_pf1' OR id='$home_c1' OR id='$home_pg2' OR id='$home_sg2' OR id='$home_sf2' OR id='$home_pf2' OR id='$home_c2'");
$jeniRows = mysql_num_rows($checkHOME);
if ($jeniRows > 0) {
while ($jeniF = mysql_fetch_array($checkHOME)) {
$nikul = 0;
if ($jeniF[1] <> 2) {$nikul = 1;}
if ($jeniF[2] >= 1) {$nikul = 1;}
if ($jeniF[3] > 19) {$nikul = 1;}
if ($nikul == 1) { //spremenimo id v 0 ker ni vec v tem klubu ali pa je poškodovan
switch ($jeniF[0]) {
case $home_pg1: $home_pg1 = 0; break;
case $home_sg1: $home_sg1 = 0; break;
case $home_sf1: $home_sf1 = 0; break;
case $home_pf1: $home_pf1 = 0; break;
case $home_c1: $home_c1 = 0; break;		
case $home_pg2: $home_pg2 = 0; break;
case $home_sg2: $home_sg2 = 0; break;
case $home_sf2: $home_sf2 = 0; break;
case $home_pf2: $home_pf2 = 0; break;
case $home_c2: $home_c2 = 0; break;	
}
}
}
}

$checkAWAY = mysql_query("SELECT id,ntplayer,injury,age FROM players WHERE id='$away_pg1' OR id='$away_sg1' OR id='$away_sf1' OR id='$away_pf1' OR id='$away_c1' OR id='$away_pg2' OR id='$away_sg2' OR id='$away_sf2' OR id='$away_pf2' OR id='$away_c2'");
$jeniRows = mysql_num_rows($checkAWAY);
if ($jeniRows > 0) {
while ($jeniG = mysql_fetch_array($checkAWAY)) {
$nikul1 = 0;
if ($jeniG[1] <> 2) {$nikul1 = 1;}
if ($jeniG[2] >= 1) {$nikul1 = 1;}
if ($jeniG[3] > 19) {$nikul1 = 1;}
if ($nikul1 == 1) { //spremenimo id v 0 ker ni vec v tem klubu ali pa je poškodovan
switch ($jeniG[0]) {
case $away_pg1: $away_pg1 = 0; break;
case $away_sg1: $away_sg1 = 0; break;
case $away_sf1: $away_sf1 = 0; break;
case $away_pf1: $away_pf1 = 0; break;
case $away_c1: $away_c1 = 0; break;		
case $away_pg2: $away_pg2 = 0; break;
case $away_sg2: $away_sg2 = 0; break;
case $away_sf2: $away_sf2 = 0; break;
case $away_pf2: $away_pf2 = 0; break;
case $away_c2: $away_c2 = 0; break;	
}
}
}
}

//nadomestni igralci

if ($home_pg1 == 0) {$home_pg1 = $home_pg2; $home_pg2 = 0;}
if ($home_sg1 == 0) {$home_sg1 = $home_sg2; $home_sg2 = 0;}
if ($home_sf1 == 0) {$home_sf1 = $home_sf2; $home_sf2 = 0;}
if ($home_pf1 == 0) {$home_pf1 = $home_pf2; $home_pf2 = 0;}
if ($home_c1 == 0) {$home_c1 = $home_c2; $home_c2 = 0;}
if ($home_pg1 == 0) {$home_pg1 = $home_sg2; $home_sg2 = 0;}
if ($home_pg1 == 0) {$home_pg1 = $home_sf2; $home_sf2 = 0;}
if ($home_pg1 == 0) {$home_pg1 = $home_pf2; $home_pf2 = 0;}
if ($home_pg1 == 0) {$home_pg1 = $home_c2; $home_c2 = 0;}
if ($home_sg1 == 0) {$home_sg1 = $home_pg2; $home_pg2 = 0;}
if ($home_sg1 == 0) {$home_sg1 = $home_sf2; $home_sf2 = 0;}
if ($home_sg1 == 0) {$home_sg1 = $home_pf2; $home_pf2 = 0;}
if ($home_sg1 == 0) {$home_sg1 = $home_c2; $home_c2 = 0;}
if ($home_sf1 == 0) {$home_sf1 = $home_sg2; $home_sg2 = 0;}
if ($home_sf1 == 0) {$home_sf1 = $home_pf2; $home_pf2 = 0;}
if ($home_sf1 == 0) {$home_sf1 = $home_c2; $home_c2 = 0;}
if ($home_sf1 == 0) {$home_sf1 = $home_pg2; $home_pg2 = 0;}
if ($home_pf1 == 0) {$home_pf1 = $home_c2; $home_c2 = 0;}
if ($home_pf1 == 0) {$home_pf1 = $home_sf2; $home_sf2 = 0;}
if ($home_pf1 == 0) {$home_pf1 = $home_sg2; $home_sg2 = 0;}
if ($home_pf1 == 0) {$home_pf1 = $home_pg2; $home_pg2 = 0;}
if ($home_c1 == 0) {$home_c1 = $home_pf2; $home_pf2 = 0;}
if ($home_c1 == 0) {$home_c1 = $home_sf2; $home_sf2 = 0;}
if ($home_c1 == 0) {$home_c1 = $home_sg2; $home_sg2 = 0;}
if ($home_c1 == 0) {$home_c1 = $home_pg2; $home_pg2 = 0;}

if ($away_pg1 == 0) {$away_pg1 = $away_pg2; $away_pg2 = 0;}
if ($away_sg1 == 0) {$away_sg1 = $away_sg2; $away_sg2 = 0;}
if ($away_sf1 == 0) {$away_sf1 = $away_sf2; $away_sf2 = 0;}
if ($away_pf1 == 0) {$away_pf1 = $away_pf2; $away_pf2 = 0;}
if ($away_c1 == 0) {$away_c1 = $away_c2; $away_c2 = 0;}
if ($away_pg1 == 0) {$away_pg1 = $away_sg2; $away_sg2 = 0;}
if ($away_pg1 == 0) {$away_pg1 = $away_sf2; $away_sf2 = 0;}
if ($away_pg1 == 0) {$away_pg1 = $away_pf2; $away_pf2 = 0;}
if ($away_pg1 == 0) {$away_pg1 = $away_c2; $away_c2 = 0;}
if ($away_sg1 == 0) {$away_sg1 = $away_pg2; $away_pg2 = 0;}
if ($away_sg1 == 0) {$away_sg1 = $away_sf2; $away_sf2 = 0;}
if ($away_sg1 == 0) {$away_sg1 = $away_pf2; $away_pf2 = 0;}
if ($away_sg1 == 0) {$away_sg1 = $away_c2; $away_c2 = 0;}
if ($away_sf1 == 0) {$away_sf1 = $away_sg2; $away_sg2 = 0;}
if ($away_sf1 == 0) {$away_sf1 = $away_pf2; $away_pf2 = 0;}
if ($away_sf1 == 0) {$away_sf1 = $away_c2; $away_c2 = 0;}
if ($away_sf1 == 0) {$away_sf1 = $away_pg2; $away_pg2 = 0;}
if ($away_pf1 == 0) {$away_pf1 = $away_c2; $away_c2 = 0;}
if ($away_pf1 == 0) {$away_pf1 = $away_sf2; $away_sf2 = 0;}
if ($away_pf1 == 0) {$away_pf1 = $away_sg2; $away_sg2 = 0;}
if ($away_pf1 == 0) {$away_pf1 = $away_pg2; $away_pg2 = 0;}
if ($away_c1 == 0) {$away_c1 = $away_pf2; $away_pf2 = 0;}
if ($away_c1 == 0) {$away_c1 = $away_sf2; $away_sf2 = 0;}
if ($away_c1 == 0) {$away_c1 = $away_sg2; $away_sg2 = 0;}
if ($away_c1 == 0) {$away_c1 = $away_pg2; $away_pg2 = 0;}

//zapis pravilnega lineupa v matches
mysql_query("UPDATE nt_matches SET home_pg1=$home_pg1, home_sg1=$home_sg1, home_sf1=$home_sf1, home_pf1=$home_pf1, home_c1=$home_c1, away_pg1=$away_pg1, away_sg1=$away_sg1, away_sf1=$away_sf1, away_pf1=$away_pf1, away_c1=$away_c1, home_pg2=$home_pg2, home_sg2=$home_sg2, home_sf2=$home_sf2, home_pf2=$home_pf2, home_c2=$home_c2, away_pg2=$away_pg2, away_sg2=$away_sg2, away_sf2=$away_sf2, away_pf2=$away_pf2, away_c2=$away_c2, home_def = $home_def, home_off = $home_off, away_def = $away_def, away_off = $away_off, attitude_hom = $home_att, attitude_awa = $away_att WHERE matchid=$matchid LIMIT 1") or die("Napaka pri zapisovanju pravinih lineupov!");

//nalovdam evente
$ddogodek[1] = array("22", "21", "20", "19", "18", "17", "16", "15", "14", "13", "12", "11", "10", "9", "8", "7", "6", "5", "4", "3", "1", "186", "194", "259", "263", "275", "276", "277", "278", "279", "310", "318", "319", "322", "328", "330", "333", "336", "337", "341", "342", "343", "344", "345", "346", "347", "492", "493", "494", "495", "496", "497", "498", "499", "500");
$ddogodek[2] = array("27", "26", "25", "24", "23", "2", "223", "260", "280", "281", "282", "283", "284", "302", "311", "316", "317", "348", "349", "350", "351", "352", "353", "354", "355", "356", "501", "502", "503");
$ddogodek[3] = array("33", "32", "31", "30", "29", "28", "246", "285", "286", "287", "357", "358");
$ddogodek[4] = array("40", "39", "38", "37", "36", "35", "34", "189", "288", "289", "359", "360", "361", "362", "363", "504", "505", "506", "507");
$ddogodek[5] = array("59", "60", "58", "57", "55", "56", "54", "53", "50", "51", "52", "48", "49", "47", "46", "44", "45", "42", "43", "41", "290", "329", "334", "364", "365");
$ddogodek[6] = array("66", "65", "63", "64", "61", "62", "188", "291", "323", "335", "67", "68", "69", "70", "71", "508", "509", "510");
$ddogodek[7] = array("81", "82", "83", "84", "185", "292", "72", "73", "74", "75", "76", "77", "78", "79", "80", "366", "367", "368", "369", "370", "371", "511", "512", "513", "514");
$ddogodek[8] = array("85", "86", "87", "88", "89", "90", "91", "92", "293", "327");
$ddogodek[9] = array("93", "94", "95", "96", "97", "98", "99", "100", "101", "102", "192", "372");
$ddogodek[10] = array("103", "104", "105", "106", "107", "108", "109", "110", "111", "112", "113", "114", "115", "116", "117", "118", "119", "320", "321", "338", "373", "515", "516", "517");
$ddogodek[11] = array("120", "121", "122", "123", "124", "125", "126", "127", "128", "129", "130", "374", "375", "518");
$ddogodek[12] = array("131", "132", "133", "134", "135", "136", "262", "376", "377", "397", "398", "519", "520", "521", "522");
$ddogodek[13] = array("137", "138", "139", "140", "378", "523", "524");
$ddogodek[14] = array("141", "142", "143", "144", "145", "146", "147", "148", "149", "150", "151", "183", "191", "379", "396");
$ddogodek[15] = array("152", "153", "154", "155", "156", "157", "158", "159", "184", "190", "193", "332", "381");
$ddogodek[16] = array("160", "161", "162", "163", "164", "187", "331", "339", "340", "382");
$ddogodek[17] = array("165", "166", "167", "383", "384", "525", "526", "527");
$ddogodek[18] = array("168", "169", "385", "528", "529");
$ddogodek[19] = array("170", "171", "172", "173", "174", "530");
$ddogodek[20] = array("175", "181", "386", "531", "532", "533", "534", "535");
$ddogodek[21] = array("176", "177", "178", "179", "536", "537");
$ddogodek[22] = array("180", "182", "195", "538");
$ddogodek[23] = array("196", "197", "198", "199", "200", "201", "202", "203", "204", "205", "206", "207", "208", "209", "308", "309", "325", "387", "388", "539");
$ddogodek[24] = array("210", "211", "212", "213", "324", "389", "540");
$ddogodek[25] = array("214", "215", "216", "221", "307", "399", "400", "401", "402", "403", "404", "405", "406", "407", "408", "409", "410", "411");
$ddogodek[26] = array("217", "218", "219", "220", "222", "412", "413", "414", "415", "416", "417", "541", "542");
$ddogodek[27] = array("224", "225", "226", "227", "228", "229", "230", "231", "232", "233", "234", "235", "326", "418", "419", "420", "421", "422", "423", "424", "425", "426", "543", "544");
$ddogodek[28] = array("236", "237", "238", "239", "240", "390", "391", "427", "428", "429", "430", "431", "432", "433", "434", "545");
$ddogodek[29] = array("241", "242", "243", "244", "245", "392", "393", "435", "436", "437", "438", "439", "440", "441", "442", "443", "444", "445", "446", "447");
$ddogodek[30] = array("247", "248", "249", "250", "294", "448", "449", "450", "451", "452", "453", "454");
$ddogodek[31] = array("251", "252", "253", "261", "264", "455", "456", "457", "458", "459", "460", "461", "462", "463", "464", "546", "547");
$ddogodek[32] = array("254", "255", "256", "394", "465", "466", "467", "468", "469", "470", "471", "472", "473", "474", "548");
$ddogodek[33] = array("257", "258", "295", "296", "303", "304", "305", "306", "475", "476", "477", "478", "479", "480", "481", "482", "483", "549");
$ddogodek[34] = array("265", "266");
$ddogodek[35] = array("267", "268", "484", "485");
$ddogodek[36] = array("269", "270", "313", "486");
$ddogodek[37] = array("271", "272", "487");
$ddogodek[38] = array("273", "274", "297", "298", "299", "395", "488", "489");
$ddogodek[39] = array("300", "301", "312", "490", "491");
$ddogodek[40] = array("314");
$ddogodek[41] = array("315");

//preverim walkover
if (($home_pg1==0) OR ($home_sg1==0) OR ($home_sf1==0) OR ($home_pf1==0) or ($home_c1==0)) {
$walkover=14; $dogodek=6;
$mev=37; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,0,$home_id,0,$away_id,37,$taopis,'$time',1,1,20)";
}
if (($away_pg1==0) OR ($away_sg1==0) OR ($away_sf1==0) OR ($away_pf1==0) or ($away_c1==0)) {
$walkover=14; $dogodek=6;
$mev=37; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,0,$away_id,0,$home_id,37,$taopis,'$time',1,20,1)";
}

//prispevek igralcev
require('inc/nt_influence.php');

//OBISK
//stevilo entertainerjev
$entertain = 0;
if ($homepg1_charac > 3 AND $homepg1_charac < 7) {$entertain = $entertain+1;}
if ($homesg1_charac > 3 AND $homesg1_charac < 7) {$entertain = $entertain+1;}
if ($homesf1_charac > 3 AND $homesf1_charac < 7) {$entertain = $entertain+1;}
if ($homepf1_charac > 3 AND $homepf1_charac < 7) {$entertain = $entertain+1;}
if ($homec1_charac > 3 AND $homec1_charac < 7) {$entertain = $entertain+1;}
//stevilo fanov in kvaliteta navijacic
$stevilofanov = rand(950,1650);
//upostevam tip tekme
if ($type==11) {$addkoef = rand(30,33);}
elseif ($type==12) {$addkoef = rand(6,9);}
elseif ($type==13) {$addkoef = rand(35,41);}
elseif ($type==14) {$addkoef = rand(48,49);}
$skupajobiska = $stevilofanov * ($addkoef+1+$entertain) / 2;
//sektorji
$court_side_obisk = round(4/10*$skupajobiska);
$court_end_obisk = round(125/1000*$skupajobiska);
$upper_level_obisk = round(45/100*$skupajobiska);
$vip_obisk = round(25/1000*$skupajobiska);
//dejanski obisk
$zici = mysql_query("SELECT in_use, seats1, seats2, seats3, seats4 FROM arena WHERE teamid=$arena_id LIMIT 1");
$zici0 = mysql_result($zici,0,"in_use");
$zici1 = mysql_result($zici,0,"seats1");
$zici2 = mysql_result($zici,0,"seats2");
$zici3 = mysql_result($zici,0,"seats3");
$zici4 = mysql_result($zici,0,"seats4");
if ($court_side_obisk > ($zici1*$zici0/100)) {$obisk1 = round($zici1*$zici0/100);} else {$obisk1 = $court_side_obisk;}
if ($court_end_obisk > ($zici2*$zici0/100)) {$obisk2 = round($zici2*$zici0/100);} else {$obisk2 = $court_end_obisk;}
if ($upper_level_obisk > ($zici3*$zici0/100)) {$obisk3 = round($zici3*$zici0/100);} else {$obisk3 = $upper_level_obisk;}
if ($vip_obisk > ($zici4*$zici0/100)) {$obisk4 = round($zici4*$zici0/100);} else {$obisk4 = $vip_obisk;}
if ($obisk1==0) {$obisk1=1;}
mysql_query("UPDATE nt_matches SET crowd1=$obisk1, crowd2=$obisk2, crowd3=$obisk3, crowd4=$obisk4 WHERE matchid=$matchid LIMIT 1");

//zacetni cas
$splitdatetime = explode(" ", $time); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$randad = rand(20,30);
$eventime = date("Y-m-d H:i:s", mktime($dbhour,$dbmin,$dbsec+$randad,$dbmonth,$dbday,$dbyear));

//GLAVNA ZANKA
while ($stevilodogodkov < 41) {

if (!$homescore) {$homescore = 0;}
if (!$awayscore) {$awayscore = 0;}

//ekipa z zogo
if ($teamwithball=='') {$ekipazzogo = $home_id;} else {$ekipazzogo = $teamwithball;}

//dogodek ki se bo zgodil v tem eventu 
//FORMULA za verjetnost dogodka pri ekipi v napadu
$cetrtina=1;
if ($walkover != 14) {require('inc/nt_dogodek.php');}


//ZACETEK DOGODKA

switch ($dogodek) {

//prva moznost je MET
CASE 0:
$kos = rand(0,$trojke);
if ($kos < 6) {

if ($ekipazzogo==$home_id) {
$kdomece = rand(0,20);
//kasneje bi lahko uporabnik imel vpliv na to kdo vec mece
switch (TRUE) {
case ($kdomece < 6): $igralec_mece = $home_pg1; $posrecenzadve = rand(0,$homepg1_za_dve); break;
case ($kdomece > 5 AND $kdomece < 12): $igralec_mece = $home_sg1; $posrecenzadve = rand(0,$homesg1_za_dve); break;
case ($kdomece > 11 AND $kdomece < 15): $igralec_mece = $home_sf1; $posrecenzadve = rand(0,$homesf1_za_dve); break;
case ($kdomece > 14 AND $kdomece < 18): $igralec_mece = $home_pf1; $posrecenzadve = rand(0,$homepf1_za_dve); break;
case ($kdomece > 17): $igralec_mece = $home_c1; $posrecenzadve = rand(0,$homec1_za_dve); break;
}
}
if ($ekipazzogo==$away_id) {
$kdomece = rand(0,20);
switch (TRUE) {
case ($kdomece < 6): $igralec_mece = $away_pg1; $posrecenzadve = rand(0,$awaypg1_za_dve); break;
case ($kdomece > 5 AND $kdomece < 12): $igralec_mece = $away_sg1; $posrecenzadve = rand(0,$awaysg1_za_dve); break;
case ($kdomece > 11 AND $kdomece < 15): $igralec_mece = $away_sf1; $posrecenzadve = rand(0,$awaysf1_za_dve); break;
case ($kdomece > 14 AND $kdomece < 18): $igralec_mece = $away_pf1; $posrecenzadve = rand(0,$awaypf1_za_dve); break;
case ($kdomece > 17): $igralec_mece = $away_c1; $posrecenzadve = rand(0,$awayc1_za_dve); break;
}
}

if ($posrecenzadve < 30) {
//zadet met

if ($ekipazzogo==$home_id) {
//podajalec
$domace_podaje = $homepg1_passing + $homesg1_passing + $homesf1_passing + $homepf1_passing + $homec1_passing;
$podaja = rand(0, $domace_podaje);
if ($podaja < $homepg1_passing AND $home_pg1 != $igralec_mece) {$podajalec = $home_pg1;}
elseif ($podaja >= $homepg1_passing AND $podaja < ($homepg1_passing+$homesg1_passing) AND $home_sg1 != $igralec_mece) {$podajalec = $home_sg1;}
elseif ($podaja >= ($homepg1_passing+$homesg1_passing) AND $podaja < ($homepg1_passing+$homesg1_passing+$homesf1_passing) AND $home_sf1 != $igralec_mece) {$podajalec = $home_sf1;}
elseif ($podaja >= ($homepg1_passing+$homesg1_passing+$homesf1_passing) AND $podaja < ($homepg1_passing+$homesg1_passing+$homesf1_passing+$homepf1_passing) AND $home_pf1 != $igralec_mece) {$podajalec = $home_pf1;}
elseif ($podaja >= ($homepg1_passing+$homesg1_passing+$homesf1_passing+$homepf1_passing) AND $home_c1 != $igralec_mece) {$podajalec = $home_c1;}
else {$podajalec=0;}

}
else
//kos so dali gostje
{
//podajalec
$gostujoce_podaje = $awaypg1_passing + $awaysg1_passing + $awaysf1_passing + $awaypf1_passing + $awayc1_passing;
$podaja = rand(0, $gostujoce_podaje);
if ($podaja < $awaypg1_passing AND $away_pg1 != $igralec_mece) {$podajalec = $away_pg1;}
elseif ($podaja >= $awaypg1_passing AND $podaja < ($awaypg1_passing+$awaysg1_passing) AND $away_sg1 != $igralec_mece) {$podajalec = $away_sg1;}
elseif ($podaja >= ($awaypg1_passing+$awaysg1_passing) AND $podaja < ($awaypg1_passing+$awaysg1_passing+$awaysf1_passing) AND $away_sf1 != $igralec_mece) {$podajalec = $away_sf1;}
elseif ($podaja >= ($awaypg1_passing+$awaysg1_passing+$awaysf1_passing) AND $podaja < ($awaypg1_passing+$awaysg1_passing+$awaysf1_passing+$awaypf1_passing) AND $away_pf1 != $igralec_mece) {$podajalec = $away_pf1;}
elseif ($podaja >= ($awaypg1_passing+$awaysg1_passing+$awaysf1_passing+$awaypf1_passing) AND $away_c1 != $igralec_mece) {$podajalec = $away_c1;}
else {$podajalec=0;}

}

if ($ekipazzogo==$home_id) {$homescore=$homescore+2; $home2zadeti=$home2zadeti+1; $teamwithball = $away_id; $nadaljevandogodek=0;}
else {$awayscore = $awayscore+2; $away2zadeti=$away2zadeti+1; $teamwithball = $home_id; $nadaljevandogodek=0;}

//vnos
if ($podajalec==0) {
$mev=2; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,0,0,2,$taopis,'$eventime',1,$homescore,$awayscore)";
}
else {
$mev=1; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$podajalec,$ekipazzogo,1,$taopis,'$eventime',1,$homescore,$awayscore)";
}

}
//konec zadetega meta za dve
//sledi blokada, kdo jo napravi trenutno ni odvisno od skilov
if ($posrecenzadve > 29 AND $posrecenzadve < 32) {
if ($ekipazzogo==$home_id) {$home2faljeni=$home2faljeni+1;
$banana = rand(0,2);
if ($banana==0) {$kdo_blokira = $away_sf1;}
if ($banana==1) {$kdo_blokira = $away_pf1;}
if ($banana==2) {$kdo_blokira = $away_c1;}
}
else {$away2faljeni=$away2faljeni+1;
$banana = rand(0,2);
if ($banana==0) {$kdo_blokira = $home_sf1;}
if ($banana==1) {$kdo_blokira = $home_pf1;}
if ($banana==2) {$kdo_blokira = $home_c1;}
}
if ($ekipazzogo==$home_id) {
//vnos
$mev=31; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$kdo_blokira,$away_id,31,$taopis,'$eventime',1,$homescore,$awayscore)";

$teamwithball = $home_id;
$nadaljevandogodek=0;
}
else {
//vnos
$mev=31; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$kdo_blokira,$home_id,31,$taopis,'$eventime',1,$homescore,$awayscore)";

$teamwithball = $away_id;
$nadaljevandogodek=0;
}

}
//konec blokade
//sledi faljen met
if ($posrecenzadve > 31) {

/* skok na odbito zogo */

if ($ekipazzogo==$home_id) {
$home2faljeni=$home2faljeni+1;
$tempskok = $homeoffskok + $awaydefskok;
$dobljenskok = rand(0,$tempskok);

$sestevek_skok_home = $homepg1_skok + $homesg1_skok + $homesf1_skok + $homepf1_skok + $homec1_skok;
$skakalec_home = rand(0,$sestevek_skok_home);
if ($skakalec_home <= $homepg1_skok) {$dobil_skok = $home_pg1;}
if ($skakalec_home > $homepg1_skok AND $skakalec_home <= ($homepg1_skok+$homesg1_skok)) {$dobil_skok = $home_sg1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok)) {$dobil_skok = $home_sf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$dobil_skok = $home_pf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$dobil_skok = $home_c1;}

$sestevek_skok_away = $awaypg1_skok + $awaysg1_skok + $awaysf1_skok + $awaypf1_skok + $awayc1_skok;
$skakalec_away = rand(0,$sestevek_skok_away);
if ($skakalec_away <= $awaypg1_skok) {$nasprotnik_skok = $away_pg1;}
if ($skakalec_away > $awaypg1_skok AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok)) {$nasprotnik_skok = $away_sg1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok)) {$nasprotnik_skok = $away_sf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$nasprotnik_skok = $away_pf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$nasprotnik_skok = $away_c1;}

if ($dobljenskok < $homeoffskok) {
$mev=3; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$dobil_skok,$ekipazzogo,3,$taopis,'$eventime',1,$homescore,$awayscore)";
$teamwithball = $ekipazzogo;
$nadaljevandogodek=1;
$nadaljuje_igralec=$dobil_skok;
}
if ($dobljenskok >= $homeoffskok) {
$mev=4; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$nasprotnik_skok,$away_id,4,$taopis,'$eventime',1,$homescore,$awayscore)";
$teamwithball = $away_id;
$nadaljevandogodek=0;
}
}

if ($ekipazzogo==$away_id) {
$away2faljeni=$away2faljeni+1;
$tempskok = $awayoffskok + $homedefskok;
$dobljenskok = rand(0,$tempskok);

$sestevek_skok_away = $awaypg1_skok + $awaysg1_skok + $awaysf1_skok + $awaypf1_skok + $awayc1_skok;
$skakalec_away = rand(0,$sestevek_skok_away);
if ($skakalec_away <= $awaypg1_skok) {$dobil_skok = $away_pg1;}
if ($skakalec_away > $awaypg1_skok AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok)) {$dobil_skok = $away_sg1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok)) {$dobil_skok = $away_sf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$dobil_skok = $away_pf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$dobil_skok = $away_c1;}

$sestevek_skok_home = $homepg1_skok + $homesg1_skok + $homesf1_skok + $homepf1_skok + $homec1_skok;
$skakalec_home = rand(0,$sestevek_skok_home);
if ($skakalec_home <= $homepg1_skok) {$nasprotnik_skok = $home_pg1;}
if ($skakalec_home > $homepg1_skok AND $skakalec_home <= ($homepg1_skok+$homesg1_skok)) {$nasprotnik_skok = $home_sg1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok)) {$nasprotnik_skok = $home_sf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$nasprotnik_skok = $home_pf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$nasprotnik_skok = $home_c1;}

if ($dobljenskok < $awayoffskok) {
$mev=3; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$dobil_skok,$ekipazzogo,3,$taopis,'$eventime',1,$homescore,$awayscore)";
$teamwithball = $ekipazzogo;
$nadaljevandogodek=1;
$nadaljuje_igralec=$dobil_skok;
}
if ($dobljenskok >= $awayoffskok) {
$mev=4; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$nasprotnik_skok,$home_id,4,$taopis,'$eventime',1,$homescore,$awayscore)";
$teamwithball = $home_id;
$nadaljevandogodek=0;
}
}
}
}
if ($kos > 5) {
if ($ekipazzogo==$home_id) {
$kdomece = rand(0,11);
switch (TRUE) {
case ($kdomece < 4): $igralec_mece = $home_pg1; $posrecenzatri = rand(0,$homepg1_za_tri); break;
case ($kdomece > 3 AND $kdomece < 9): $igralec_mece = $home_sg1; $posrecenzatri = rand(0,$homesg1_za_tri); break;
case ($kdomece > 8 AND $kdomece < 11): $igralec_mece = $home_sf1; $posrecenzatri = rand(0,$homesf1_za_tri); break;
case ($kdomece==11): $igralec_mece = $home_pf1; $posrecenzatri = rand(0,$homepf1_za_tri); break;
}
}

if ($ekipazzogo==$away_id) {
$kdomece = rand(0,11);
switch (TRUE) {
case ($kdomece < 4): $igralec_mece = $away_pg1; $posrecenzatri = rand(0,$awaypg1_za_tri); break;
case ($kdomece > 3 AND $kdomece < 9): $igralec_mece = $away_sg1; $posrecenzatri = rand(0,$awaysg1_za_tri); break;
case ($kdomece > 8 AND $kdomece < 11): $igralec_mece = $away_sf1; $posrecenzatri = rand(0,$awaysf1_za_tri); break;
case ($kdomece==11): $igralec_mece = $away_pf1; $posrecenzatri = rand(0,$awaypf1_za_tri); break;
}
}

if ($posrecenzatri < 5) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+3; $teamwithball = $away_id; $nadaljevandogodek=0;}
else {$awayscore = $awayscore+3; $teamwithball = $home_id; $nadaljevandogodek=0;}
//vpis
$mev=7; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,0,0,7,$taopis,'$eventime',1,$homescore,$awayscore)";

}
if ($posrecenzatri > 4) {

/* skok na odbito zogo */

if ($ekipazzogo==$home_id) {
$tempskok = $homeoffskok + $awaydefskok;
$dobljenskok = rand(0,$tempskok);

$sestevek_skok_home = $homepg1_skok + $homesg1_skok + $homesf1_skok + $homepf1_skok + $homec1_skok;
$skakalec_home = rand(0,$sestevek_skok_home);
if ($skakalec_home <= $homepg1_skok) {$dobil_skok = $home_pg1;}
if ($skakalec_home > $homepg1_skok AND $skakalec_home <= ($homepg1_skok+$homesg1_skok)) {$dobil_skok = $home_sg1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok)) {$dobil_skok = $home_sf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$dobil_skok = $home_pf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$dobil_skok = $home_c1;}

$sestevek_skok_away = $awaypg1_skok + $awaysg1_skok + $awaysf1_skok + $awaypf1_skok + $awayc1_skok;
$skakalec_away = rand(0,$sestevek_skok_away);
if ($skakalec_away <= $awaypg1_skok) {$nasprotnik_skok = $away_pg1;}
if ($skakalec_away > $awaypg1_skok AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok)) {$nasprotnik_skok = $away_sg1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok)) {$nasprotnik_skok = $away_sf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$nasprotnik_skok = $away_pf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$nasprotnik_skok = $away_c1;}

if ($dobljenskok < $homeoffskok) {
$mev=8; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$dobil_skok,$ekipazzogo,8,$taopis,'$eventime',1,$homescore,$awayscore)";
$teamwithball = $ekipazzogo;
$nadaljevandogodek=1;
$nadaljuje_igralec=$dobil_skok;
}
if ($dobljenskok >= $homeoffskok) {
$mev=9; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$nasprotnik_skok,$away_id,9,$taopis,'$eventime',1,$homescore,$awayscore)";
$teamwithball = $away_id;
$nadaljevandogodek=0;
}
}

if ($ekipazzogo==$away_id) {
$tempskok = $awayoffskok + $homedefskok;
$dobljenskok = rand(0,$tempskok);

$sestevek_skok_away = $awaypg1_skok + $awaysg1_skok + $awaysf1_skok + $awaypf1_skok + $awayc1_skok;
$skakalec_away = rand(0,$sestevek_skok_away);
if ($skakalec_away <= $awaypg1_skok) {$dobil_skok = $away_pg1;}
if ($skakalec_away > $awaypg1_skok AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok)) {$dobil_skok = $away_sg1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok)) {$dobil_skok = $away_sf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$dobil_skok = $away_pf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$dobil_skok = $away_c1;}

$sestevek_skok_home = $homepg1_skok + $homesg1_skok + $homesf1_skok + $homepf1_skok + $homec1_skok;
$skakalec_home = rand(0,$sestevek_skok_home);
if ($skakalec_home <= $homepg1_skok) {$nasprotnik_skok = $home_pg1;}
if ($skakalec_home > $homepg1_skok AND $skakalec_home <= ($homepg1_skok+$homesg1_skok)) {$nasprotnik_skok = $home_sg1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok)) {$nasprotnik_skok = $home_sf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$nasprotnik_skok = $home_pf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$nasprotnik_skok = $home_c1;}

if ($dobljenskok < $awayoffskok) {
$mev=8; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$dobil_skok,$ekipazzogo,8,$taopis,'$eventime',1,$homescore,$awayscore)";
$teamwithball = $ekipazzogo;
$nadaljevandogodek=1;
$nadaljuje_igralec=$dobil_skok;
}
if ($dobljenskok >= $awayoffskok) {
$mev=9; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$nasprotnik_skok,$home_id,9,$taopis,'$eventime',1,$homescore,$awayscore)";
$teamwithball = $home_id;
$nadaljevandogodek=0;
}
}
}

}

break;

/*
******************************************************************
*/

CASE 1:

/* druga moznost je IZGUBLJENA ZOGA */

//najprej me zanima kdo je izgubil zogo

$home_izgubil = $homepg1_napaka + $homesg1_napaka + $homesf1_napaka + $homepf1_napaka + $homec1_napaka;
$away_izgubil = $awaypg1_napaka + $awaysg1_napaka + $awaysf1_napaka + $awaypf1_napaka + $awayc1_napaka;

if ($ekipazzogo==$home_id) {
$narejena_napaka = rand(0, $home_izgubil);
if ($narejena_napaka < $homepg1_napaka) {$naredil_napako = $home_pg1;}
if ($narejena_napaka >= $homepg1_napaka AND $narejena_napaka < ($homepg1_napaka+$homesg1_napaka)) {$naredil_napako = $home_sg1;}
if ($narejena_napaka >= ($homepg1_napaka+$homesg1_napaka) AND $narejena_napaka < ($homepg1_napaka+$homesg1_napaka+$homesf1_napaka)) {$naredil_napako = $home_sf1;}
if ($narejena_napaka >= ($homepg1_napaka+$homesg1_napaka+$homesf1_napaka) AND $narejena_napaka < ($homepg1_napaka+$homesg1_napaka+$homesf1_napaka+$homepf1_napaka)) {$naredil_napako = $home_pf1;}
if ($narejena_napaka >= ($homepg1_napaka+$homesg1_napaka+$homesf1_napaka+$homepf1_napaka)) {$naredil_napako = $home_c1;}

} else {

$narejena_napaka = rand(0, $away_izgubil);
if ($narejena_napaka < $awaypg1_napaka) {$naredil_napako = $away_pg1;}
if ($narejena_napaka >= $awaypg1_napaka AND $narejena_napaka < ($awaypg1_napaka+$awaysg1_napaka)) {$naredil_napako = $away_sg1;}
if ($narejena_napaka >= ($awaypg1_napaka+$awaysg1_napaka) AND $narejena_napaka < ($awaypg1_napaka+$awaysg1_napaka+$awaysf1_napaka)) {$naredil_napako = $away_sf1;}
if ($narejena_napaka >= ($awaypg1_napaka+$awaysg1_napaka+$awaysf1_napaka) AND $narejena_napaka < ($awaypg1_napaka+$awaysg1_napaka+$awaysf1_napaka+$awaypf1_napaka)) {$naredil_napako = $away_pf1;}
if ($narejena_napaka >= ($awaypg1_napaka+$awaysg1_napaka+$awaysf1_napaka+$awaypf1_napaka)) {$naredil_napako = $away_c1;}

}

//konec ugotovitev gleda tega kdo je naredil napako

$zgubljena = rand(0,45);
if ($zgubljena < 29) {

//vnos
$mev=5; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$naredil_napako,$ekipazzogo,0,0,5,$taopis,'$eventime',1,$homescore,$awayscore)";

if ($ekipazzogo==$home_id) {
$teamwithball = $away_id;
$nadaljevandogodek=0;
}
else {
$teamwithball = $home_id;
$nadaljevandogodek=0;
}

}

if ($zgubljena > 28) {
//UKRADENA zoga - najprej me zanima kdo je ukradel zogo

$home_kraja = $homepg1_kraja + $homesg1_kraja + $homesf1_kraja + $homepf1_kraja + $homec1_kraja;
$away_kraja = $awaypg1_kraja + $awaysg1_kraja + $awaysf1_kraja + $awaypf1_kraja + $awayc1_kraja;

if ($ekipazzogo==$away_id) {
$ukradena_z = rand(0, $home_kraja);
if ($ukradena_z < $homepg1_kraja) {$ukradel_zogo = $home_pg1;}
if ($ukradena_z >= $homepg1_kraja AND $narejena_kraja < ($homepg1_kraja+$homesg1_kraja)) {$ukradel_zogo = $home_sg1;}
if ($ukradena_z >= ($homepg1_kraja+$homesg1_kraja) AND $narejena_kraja < ($homepg1_kraja+$homesg1_kraja+$homesf1_kraja)) {$ukradel_zogo = $home_sf1;}
if ($ukradena_z >= ($homepg1_kraja+$homesg1_kraja+$homesf1_kraja) AND $narejena_kraja < ($homepg1_kraja+$homesg1_kraja+$homesf1_kraja+$homepf1_kraja)) {$ukradel_zogo = $home_pf1;}
if ($ukradena_z >= ($homepg1_kraja+$homesg1_kraja+$homesf1_kraja+$homepf1_kraja)) {$ukradel_zogo = $home_c1;}

} else {

$ukradena_z = rand(0, $away_kraja);
if ($ukradena_z < $awaypg1_kraja) {$ukradel_zogo = $away_pg1;}
if ($ukradena_z >= $awaypg1_kraja AND $narejena_kraja < ($awaypg1_kraja+$awaysg1_kraja)) {$ukradel_zogo = $away_sg1;}
if ($ukradena_z >= ($awaypg1_kraja+$awaysg1_kraja) AND $narejena_kraja < ($awaypg1_kraja+$awaysg1_kraja+$awaysf1_kraja)) {$ukradel_zogo = $away_sf1;}
if ($ukradena_z >= ($awaypg1_kraja+$awaysg1_kraja+$awaysf1_kraja) AND $narejena_kraja < ($awaypg1_kraja+$awaysg1_kraja+$awaysf1_kraja+$awaypf1_kraja)) {$ukradel_zogo = $away_pf1;}
if ($ukradena_z >= ($awaypg1_kraja+$awaysg1_kraja+$awaysf1_kraja+$awaypf1_kraja)) {$ukradel_zogo = $away_c1;}

}
//konec ugotovitev gleda tega kdo je ukradel zogo

if ($ekipazzogo==$home_id) {
//vnos
$mev=6; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$naredil_napako,$ekipazzogo,$ukradel_zogo,$away_id,6,$taopis,'$eventime',1,$homescore,$awayscore)";

$teamwithball = $away_id;
$nadaljevandogodek=2;
$nadaljuje_igralc=$ukradel_zogo;
}
else {
//vnos
$mev=6; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$naredil_napako,$ekipazzogo,$ukradel_zogo,$home_id,6,$taopis,'$eventime',1,$homescore,$awayscore)";

$teamwithball = $home_id;
$nadaljevandogodek=2;
$nadaljuje_igralc=$ukradel_zogo;
}

}
break;

/*
***********************************
* tretja moznost je osebna napaka *
***********************************
*/

CASE 2:

$osebna = rand(0,19);
if ($osebna < 17) {
//najprej me zanima kdo je naredil osebno v obrambi in nad kom

$home_osebna_obramba = $homepg1_v_obrambi + $homesg1_v_obrambi + $homesf1_v_obrambi + $homepf1_v_obrambi + $homec1_v_obrambi;
$away_osebna_obramba = $awaypg1_v_obrambi + $awaysg1_v_obrambi + $awaysf1_v_obrambi + $awaypf1_v_obrambi + $awayc1_v_obrambi;

if ($ekipazzogo==$away_id) {

$osebna_obramba = rand(0, $home_osebna_obramba);
if ($osebna_obramba < $homepg1_v_obrambi) {
$favlal_v_obrambi = $home_pg1; $home_pg1_favli=$home_pg1_favli+1;
$pofavlan = rand(0,2);
if ($pofavlan==0) {$favl_nad = $away_pg1; $met_verjetnost = rand(0, $awaypg1_freethrow);}
if ($pofavlan==1) {$favl_nad = $away_sg1; $met_verjetnost = rand(0, $awaysg1_freethrow);}
if ($pofavlan==2) {$favl_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
}
if ($osebna_obramba >= $homepg1_v_obrambi AND $osebna_obramba < ($homepg1_v_obrambi+$homesg1_v_obrambi)) {
$favlal_v_obrambi = $home_sg1; $home_sg1_favli=$home_sg1_favli+1;
$pofavlan = rand(0,3);
if ($pofavlan==0) {$favl_nad = $away_pg1; $met_verjetnost = rand(0, $awaypg1_freethrow);}
if ($pofavlan==1) {$favl_nad = $away_sg1; $met_verjetnost = rand(0, $awaysg1_freethrow);}
if ($pofavlan==2) {$favl_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
if ($pofavlan==3) {$favl_nad = $away_pf1; $met_verjetnost = rand(0, $awaypf1_freethrow);}
}
if ($osebna_obramba >= ($homepg1_v_obrambi+$homesg1_v_obrambi) AND $osebna_obramba < ($homepg1_v_obrambi+$homesg1_v_obrambi+$homesf1_v_obrambi)) {
$favlal_v_obrambi = $home_sf1; $home_sf1_favli=$home_sf1_favli+1;
$pofavlan = rand(0,4);
if ($pofavlan==0) {$favl_nad = $away_pg1; $met_verjetnost = rand(0, $awaypg1_freethrow);}
if ($pofavlan==1) {$favl_nad = $away_sg1; $met_verjetnost = rand(0, $awaysg1_freethrow);}
if ($pofavlan==2) {$favl_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
if ($pofavlan==3) {$favl_nad = $away_pf1; $met_verjetnost = rand(0, $awaypf1_freethrow);}
if ($pofavlan==4) {$favl_nad = $away_c1; $met_verjetnost = rand(0, $awayc1_freethrow);}
}
if ($osebna_obramba >= ($homepg1_v_obrambi+$homesg1_v_obrambi+$homesf1_v_obrambi) AND $osebna_obramba < ($homepg1_v_obrambi+$homesg1_v_obrambi+$homesf1_v_obrambi+$homepf1_v_obrambi)) {
$favlal_v_obrambi = $home_pf1; $home_pf1_favli=$home_pf1_favli+1;
$pofavlan = rand(0,3);
if ($pofavlan==0) {$favl_nad = $away_sg1; $met_verjetnost = rand(0, $awaysg1_freethrow);}
if ($pofavlan==1) {$favl_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
if ($pofavlan==2) {$favl_nad = $away_pf1; $met_verjetnost = rand(0, $awaypf1_freethrow);}
if ($pofavlan==3) {$favl_nad = $away_c1; $met_verjetnost = rand(0, $awayc1_freethrow);}
}
if ($osebna_obramba >= ($homepg1_v_obrambi+$homesg1_v_obrambi+$homesf1_v_obrambi+$homepf1_v_obrambi)) {
$favlal_v_obrambi = $home_c1; $home_c1_favli=$home_c1_favli+1;
$pofavlan = rand(0,2);
if ($pofavlan==0) {$favl_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
if ($pofavlan==1) {$favl_nad = $away_pf1; $met_verjetnost = rand(0, $awaypf1_freethrow);}
if ($pofavlan==2) {$favl_nad = $away_c1; $met_verjetnost = rand(0, $awayc1_freethrow);}
}

} else {

$osebna_obramba = rand(0, $away_osebna_obramba);
if ($osebna_obramba < $awaypg1_v_obrambi) {
$favlal_v_obrambi = $away_pg1; $away_pg1_favli=$away_pg1_favli+1;
$pofavlan = rand(0,2);
if ($pofavlan==0) {$favl_nad = $home_pg1; $met_verjetnost = rand(0, $homepg1_freethrow);}
if ($pofavlan==1) {$favl_nad = $home_sg1; $met_verjetnost = rand(0, $homesg1_freethrow);}
if ($pofavlan==2) {$favl_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
}
if ($osebna_obramba >= $awaypg1_v_obrambi AND $osebna_obramba < ($awaypg1_v_obrambi+$awaysg1_v_obrambi)) {
$favlal_v_obrambi = $away_sg1; $away_sg1_favli=$away_sg1_favli+1;
$pofavlan = rand(0,3);
if ($pofavlan==0) {$favl_nad = $home_pg1; $met_verjetnost = rand(0, $homepg1_freethrow);}
if ($pofavlan==1) {$favl_nad = $home_sg1; $met_verjetnost = rand(0, $homesg1_freethrow);}
if ($pofavlan==2) {$favl_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
if ($pofavlan==3) {$favl_nad = $home_pf1; $met_verjetnost = rand(0, $homepf1_freethrow);}
}
if ($osebna_obramba >= ($awaypg1_v_obrambi+$awaysg1_v_obrambi) AND $osebna_obramba < 
($awaypg1_v_obrambi+$awaysg1_v_obrambi+$awaysf1_v_obrambi)) {
$favlal_v_obrambi = $away_sf1; $away_sf1_favli=$away_sf1_favli+1;
$pofavlan = rand(0,4);
if ($pofavlan==0) {$favl_nad = $home_pg1; $met_verjetnost = rand(0, $homepg1_freethrow);}
if ($pofavlan==1) {$favl_nad = $home_sg1; $met_verjetnost = rand(0, $homesg1_freethrow);}
if ($pofavlan==2) {$favl_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
if ($pofavlan==3) {$favl_nad = $home_pf1; $met_verjetnost = rand(0, $homepf1_freethrow);}
if ($pofavlan==4) {$favl_nad = $home_c1; $met_verjetnost = rand(0, $homec1_freethrow);}
}
if ($osebna_obramba >= ($awaypg1_v_obrambi+$awaysg1_v_obrambi+$awaysf1_v_obrambi) AND $osebna_obramba < ($awaypg1_v_obrambi+$awaysg1_v_obrambi+$awaysf1_v_obrambi+$awaypf1_v_obrambi)) {
$favlal_v_obrambi = $away_pf1; $away_pf1_favli=$away_pf1_favli+1;
$pofavlan = rand(0,3);
if ($pofavlan==0) {$favl_nad = $home_sg1; $met_verjetnost = rand(0, $homesg1_freethrow);}
if ($pofavlan==1) {$favl_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
if ($pofavlan==2) {$favl_nad = $home_pf1; $met_verjetnost = rand(0, $homepf1_freethrow);}
if ($pofavlan==3) {$favl_nad = $home_c1; $met_verjetnost = rand(0, $homec1_freethrow);}
}
if ($osebna_obramba >= ($awaypg1_v_obrambi+$awaysg1_v_obrambi+$awaysf1_v_obrambi+$awaypf1_v_obrambi)) {
$favlal_v_obrambi = $away_c1; $away_c1_favli=$away_c1_favli+1;
$pofavlan = rand(0,2);
if ($pofavlan==0) {$favl_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
if ($pofavlan==1) {$favl_nad = $home_pf1; $met_verjetnost = rand(0, $homepf1_freethrow);}
if ($pofavlan==2) {$favl_nad = $home_c1; $met_verjetnost = rand(0, $homec1_freethrow);}
}

}
//konec ugotovitev gleda tega kdo je naredil osebno v obrambi
}

if ($osebna < 11) {

//prekrsek ob metu za dve in dva prosta meta
//vnos prekrska
$mev=10; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
if ($ekipazzogo==$home_id) {$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,$favlal_v_obrambi,$away_id,10,$taopis,'$eventime',1,$homescore,$awayscore)";}
else {$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,$favlal_v_obrambi,$home_id,10,$taopis,'$eventime',1,$homescore,$awayscore)";}

if ($met_verjetnost > 26) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+2;} else {$awayscore = $awayscore+2;}
//vnos
$mev=14; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,14,$taopis,'$eventime',1,$homescore,$awayscore)";
}
elseif ($met_verjetnost > 13 AND $met_verjetnost < 27) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+1;} else {$awayscore = $awayscore+1;}
//vnos
$mev=15; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,15,$taopis,'$eventime',1,$homescore,$awayscore)";
}
else {
//vnos
$mev=16; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,16,$taopis,'$eventime',1,$homescore,$awayscore)";
}
//konec dveh prostih metov, kasneje se lahko dodajo skoki
if ($ekipazzogo==$home_id) {$teamwithball = $away_id;} else {$teamwithball = $home_id;}

}

if ($osebna > 10 AND $osebna < 13) {

//prekrsek ob metu za tri in trije prosti meti
//vnos prekrska
$mev=11; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
if ($ekipazzogo==$home_id) {$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,$favlal_v_obrambi,$away_id,11,$taopis,'$eventime',1,$homescore,$awayscore)";}
else {$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,$favlal_v_obrambi,$home_id,11,$taopis,'$eventime',1,$homescore,$awayscore)";}

//koliko od treh je bilo zadetih
if ($met_verjetnost > 25) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+3;} else {$awayscore = $awayscore+3;}
//vnos
$mev=17; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,17,$taopis,'$eventime',1,$homescore,$awayscore)";
}
elseif ($met_verjetnost > 15 AND $met_verjetnost < 26) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+2;} else {$awayscore = $awayscore+2;}
//vnos
$mev=18; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,18,$taopis,'$eventime',1,$homescore,$awayscore)";
}
elseif ($met_verjetnost > 7 AND $met_verjetnost < 16) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+1;} else {$awayscore = $awayscore+1;}
//vnos
$mev=19; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,19,$taopis,'$eventime',1,$homescore,$awayscore)";
}
else {
//vnos
$mev=20; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,20,$taopis,'$eventime',1,$homescore,$awayscore)";
}
//konec treh prostih metov, kasneje se lahko dodajo skoki
if ($ekipazzogo==$home_id) {$teamwithball = $away_id;} else {$teamwithball = $home_id;}

}

if ($osebna > 12 AND $osebna < 16) {

//zadet kos in dodatni met
//vnos zadetka in prekrska
$mev=12; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
if ($ekipazzogo==$home_id) {
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,$favlal_v_obrambi,$away_id,12,$taopis,'$eventime',1,$homescore+2,$awayscore)"; $home2zadeti=$home2zadeti+1;}
else {$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,$favlal_v_obrambi,$home_id,12,$taopis,'$eventime',1,$homescore,$awayscore+2)"; $away2zadeti=$away2zadeti+1;}

if ($met_verjetnost > 23) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+3;} else {$awayscore = $awayscore+3;}
//vnos
$mev=21; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,21,$taopis,'$eventime',1,$homescore,$awayscore)";
}
else {
if ($ekipazzogo==$home_id) {$homescore = $homescore+2;} else {$awayscore = $awayscore+2;}
//vnos
$mev=22; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,22,$taopis,'$eventime',1,$homescore,$awayscore)";
}
//konec dodatnega meta, kasneje dodam skok
if ($ekipazzogo==$home_id) {$teamwithball = $away_id;} else {$teamwithball = $home_id;}

}
if ($osebna==16) {

//zadeta trojka in dodatni met
//vnos zadetka in prekrska
$mev=13; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
if ($ekipazzogo==$home_id) {$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,$favlal_v_obrambi,$away_id,13,$taopis,'$eventime',1,$homescore+3,$awayscore)";}
else {$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,$favlal_v_obrambi,$home_id,13,$taopis,'$eventime',1,$homescore,$awayscore+3)";}

if ($met_verjetnost > 22) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+4;} else {$awayscore = $awayscore+4;}
//vnos
$mev=21; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,21,$taopis,'$eventime',1,$homescore,$awayscore)";
}
else {
if ($ekipazzogo==$home_id) {$homescore = $homescore+3;} else {$awayscore = $awayscore+3;}
//vnos
$mev=22; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,22,$taopis,'$eventime',1,$homescore,$awayscore)";
}
//konec dodatnega meta, kasneje dodam skok
if ($ekipazzogo==$home_id) {$teamwithball = $away_id;} else {$teamwithball = $home_id;}

}

if ($osebna > 16 AND $osebna < 19) {

//OSEBNA V NAPADU

$home_osebna_napad = $homepg1_v_napadu + $homesg1_v_napadu + $homesf1_v_napadu + $homepf1_v_napadu + $homec1_v_napadu;
$away_osebna_napad = $awaypg1_v_napadu + $awaysg1_v_napadu + $awaysf1_v_napadu + $awaypf1_v_napadu + $awayc1_v_napadu;

if ($ekipazzogo==$home_id) {

$osebna_napad = rand(0, $home_osebna_napad);
if ($osebna_napad < $homepg1_v_napadu) {$favlal_v_napadu = $home_pg1; $home_pg1_favli=$home_pg1_favli+1;}
if ($osebna_napad >= $homepg1_v_napadu AND $osebna_napad < ($homepg1_v_napadu+$homesg1_v_napadu)) {$favlal_v_napadu = $home_sg1; $home_sg1_favli=$home_sg1_favli+1;}
if ($osebna_napad >= ($homepg1_v_napadu+$homesg1_v_napadu) AND $osebna_napad < ($homepg1_v_napadu+$homesg1_v_napadu+$homesf1_v_napadu)) {$favlal_v_napadu = $home_sf1; $home_sf1_favli=$home_sf1_favli+1;}
if ($osebna_napad >= ($homepg1_v_napadu+$homesg1_v_napadu+$homesf1_v_napadu) AND $osebna_napad < ($homepg1_v_napadu+$homesg1_v_napadu+$homesf1_v_napadu+$homepf1_v_napadu)) {$favlal_v_napadu = $home_pf1; $home_pf1_favli=$home_pf1_favli+1;}
if ($osebna_napad >= ($homepg1_v_napadu+$homesg1_v_napadu+$homesf1_v_napadu+$homepf1_v_napadu)) {$favlal_v_napadu = $home_c1; $home_c1_favli=$home_c1_favli+1;}
//vnos
$mev=32; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,0,$away_id,$favlal_v_napadu,$ekipazzogo,32,$taopis,'$eventime',1,$homescore,$awayscore)";
//nadaljevanje
$teamwithball = $away_id;
}
else {

$osebna_napad = rand(0, $away_osebna_napad);
if ($osebna_napad < $awaypg1_v_napadu) {$favlal_v_napadu = $away_pg1; $away_pg1_favli=$away_pg1_favli+1;}
if ($osebna_napad >= $awaypg1_v_napadu AND $osebna_napad < ($awaypg1_v_napadu+$awaysg1_v_napadu)) {$favlal_v_napadu = $away_sg1; $away_sg1_favli=$away_sg1_favli+1;}
if ($osebna_napad >= ($awaypg1_v_napadu+$awaysg1_v_napadu) AND $osebna_napad < ($awaypg1_v_napadu+$awaysg1_v_napadu+$awaysf1_v_napadu)) {$favlal_v_napadu = $away_sf1; $away_sf1_favli=$away_sf1_favli+1;}
if ($osebna_napad >= ($awaypg1_v_napadu+$awaysg1_v_napadu+$awaysf1_v_napadu) AND $osebna_napad < ($awaypg1_v_napadu+$awaysg1_v_napadu+$awaysf1_v_napadu+$awaypf1_v_napadu)) {$favlal_v_napadu = $away_pf1; $away_pf1_favli=$away_pf1_favli+1;}
if ($osebna_napad >= ($awaypg1_v_napadu+$awaysg1_v_napadu+$awaysf1_v_napadu+$awaypf1_v_napadu)) {$favlal_v_napadu = $away_c1; $away_c1_favli=$away_c1_favli+1;}
//vnos
$mev=32; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,0,$home_id,$favlal_v_napadu,$ekipazzogo,32,$taopis,'$eventime',1,$homescore,$awayscore)";
//nadaljevanje
$teamwithball = $home_id;
}


//KONEC OSEBNE V NAPADU

}
if ($osebna==19) {

//NAMERNA OSEBNA NAPAKA

$namerna_osebna = rand(0,69);
//switch znotraj switcha
SWITCH (TRUE) {
CASE ($namerna_osebna < 16):
if ($ekipazzogo==$home_id) {$naredil_namerno = $away_pg1; $away_pg1_favli=$away_pg1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $home_pg1; $met_verjetnost = rand(0, $homepg1_freethrow);}
if ($namerna==1) {$namerna_nad = $home_sg1; $met_verjetnost = rand(0, $homesg1_freethrow);}
if ($namerna==2) {$namerna_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
if ($namerna==3) {$namerna_nad = $home_pf1; $met_verjetnost = rand(0, $homepf1_freethrow);}
if ($namerna==4) {$namerna_nad = $home_c1; $met_verjetnost = rand(0, $homec1_freethrow);}
}
else {$naredil_namerno = $home_pg1; $home_pg1_favli=$home_pg1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $away_pg1; $met_verjetnost = rand(0, $awaypg1_freethrow);}
if ($namerna==1) {$namerna_nad = $away_sg1; $met_verjetnost = rand(0, $awaysg1_freethrow);}
if ($namerna==2) {$namerna_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
if ($namerna==3) {$namerna_nad = $away_pf1; $met_verjetnost = rand(0, $awaypf1_freethrow);}
if ($namerna==4) {$namerna_nad = $away_c1; $met_verjetnost = rand(0, $awayc1_freethrow);}
}
break;

CASE ($namerna_osebna > 15 AND $namerna_osebna < 27):
if ($ekipazzogo==$home_id) {$naredil_namerno = $away_sg1; $away_sg1_favli=$away_sg1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $home_pg1; $met_verjetnost = rand(0, $homepg1_freethrow);}
if ($namerna==1) {$namerna_nad = $home_sg1; $met_verjetnost = rand(0, $homesg1_freethrow);}
if ($namerna==2) {$namerna_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
if ($namerna==3) {$namerna_nad = $home_pf1; $met_verjetnost = rand(0, $homepf1_freethrow);}
if ($namerna==4) {$namerna_nad = $home_c1; $met_verjetnost = rand(0, $homec1_freethrow);}
}
else {$naredil_namerno = $home_sg1; $home_sg1_favli=$home_sg1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $away_pg1; $met_verjetnost = rand(0, $awaypg1_freethrow);}
if ($namerna==1) {$namerna_nad = $away_sg1; $met_verjetnost = rand(0, $awaysg1_freethrow);}
if ($namerna==2) {$namerna_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
if ($namerna==3) {$namerna_nad = $away_pf1; $met_verjetnost = rand(0, $awaypf1_freethrow);}
if ($namerna==4) {$namerna_nad = $away_c1; $met_verjetnost = rand(0, $awayc1_freethrow);}
}
break;

CASE ($namerna_osebna > 26 AND $namerna_osebna < 45):
if ($ekipazzogo==$home_id) {$naredil_namerno = $away_sf1; $away_sf1_favli=$away_sf1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $home_pg1; $met_verjetnost = rand(0, $homepg1_freethrow);}
if ($namerna==1) {$namerna_nad = $home_sg1; $met_verjetnost = rand(0, $homesg1_freethrow);}
if ($namerna==2) {$namerna_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
if ($namerna==3) {$namerna_nad = $home_pf1; $met_verjetnost = rand(0, $homepf1_freethrow);}
if ($namerna==4) {$namerna_nad = $home_c1; $met_verjetnost = rand(0, $homec1_freethrow);}
}
else {$naredil_namerno = $home_sf1; $home_sf1_favli=$home_sf1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $away_pg1; $met_verjetnost = rand(0, $awaypg1_freethrow);}
if ($namerna==1) {$namerna_nad = $away_sg1; $met_verjetnost = rand(0, $awaysg1_freethrow);}
if ($namerna==2) {$namerna_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
if ($namerna==3) {$namerna_nad = $away_pf1; $met_verjetnost = rand(0, $awaypf1_freethrow);}
if ($namerna==4) {$namerna_nad = $away_c1; $met_verjetnost = rand(0, $awayc1_freethrow);}
}
break;

CASE ($namerna_osebna > 44 AND $namerna_osebna < 61):
if ($ekipazzogo==$home_id) {$naredil_namerno = $away_pf1; $away_pf1_favli=$away_pf1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $home_pg1; $met_verjetnost = rand(0, $homepg1_freethrow);}
if ($namerna==1) {$namerna_nad = $home_sg1; $met_verjetnost = rand(0, $homesg1_freethrow);}
if ($namerna==2) {$namerna_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
if ($namerna==3) {$namerna_nad = $home_pf1; $met_verjetnost = rand(0, $homepf1_freethrow);}
if ($namerna==4) {$namerna_nad = $home_c1; $met_verjetnost = rand(0, $homec1_freethrow);}
}
else {$naredil_namerno = $home_pf1; $home_pf1_favli=$home_pf1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $away_pg1; $met_verjetnost = rand(0, $awaypg1_freethrow);}
if ($namerna==1) {$namerna_nad = $away_sg1; $met_verjetnost = rand(0, $awaysg1_freethrow);}
if ($namerna==2) {$namerna_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
if ($namerna==3) {$namerna_nad = $away_pf1; $met_verjetnost = rand(0, $awaypf1_freethrow);}
if ($namerna==4) {$namerna_nad = $away_c1; $met_verjetnost = rand(0, $awayc1_freethrow);}
}
break;

CASE ($namerna_osebna > 60):
if ($ekipazzogo==$home_id) {$naredil_namerno = $away_c1; $away_c1_favli=$away_c1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $home_pg1; $met_verjetnost = rand(0, $homepg1_freethrow);}
if ($namerna==1) {$namerna_nad = $home_sg1; $met_verjetnost = rand(0, $homesg1_freethrow);}
if ($namerna==2) {$namerna_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
if ($namerna==3) {$namerna_nad = $home_pf1; $met_verjetnost = rand(0, $homepf1_freethrow);}
if ($namerna==4) {$namerna_nad = $home_c1; $met_verjetnost = rand(0, $homec1_freethrow);}
}
else {$naredil_namerno = $home_c1; $home_c1_favli=$home_c1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $away_pg1; $met_verjetnost = rand(0, $awaypg1_freethrow);}
if ($namerna==1) {$namerna_nad = $away_sg1; $met_verjetnost = rand(0, $awaysg1_freethrow);}
if ($namerna==2) {$namerna_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
if ($namerna==3) {$namerna_nad = $away_pf1; $met_verjetnost = rand(0, $awaypf1_freethrow);}
if ($namerna==4) {$namerna_nad = $away_c1; $met_verjetnost = rand(0, $awayc1_freethrow);}
}
break;
}
//konec switcha v switchu

if ($met_verjetnost > 24) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+2; $mev=30; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$namerna_nad,$ekipazzogo,$naredil_namerno,$away_id,30,$taopis,'$eventime',1,$homescore,$awayscore)";
}
else {$awayscore = $awayscore+2; $mev=30; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$namerna_nad,$ekipazzogo,$naredil_namerno,$home_id,30,$taopis,'$eventime',1,$homescore,$awayscore)";
}
//vnos obeh prostih metov
$mev=14; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$namerna_nad,$ekipazzogo,0,0,14,$taopis,'$eventime',1,$homescore,$awayscore)";
}
elseif ($met_verjetnost > 9 AND $met_verjetnost < 25) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+1; $mev=30; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$namerna_nad,$ekipazzogo,$naredil_namerno,$away_id,30,$taopis,'$eventime',1,$homescore,$awayscore)";
}
else {$awayscore = $awayscore+1; $mev=30; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$namerna_nad,$ekipazzogo,$naredil_namerno,$home_id,30,$taopis,'$eventime',1,$homescore,$awayscore)";
}
//vnos prostega meta
$mev=15; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$namerna_nad,$ekipazzogo,0,0,15,$taopis,'$eventime',1,$homescore,$awayscore)";
}
else {
if ($ekipazzogo==$home_id) {$mev=30; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$namerna_nad,$ekipazzogo,$naredil_namerno,$away_id,30,$taopis,'$eventime',1,$homescore,$awayscore)";
}
else {$mev=30; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$namerna_nad,$ekipazzogo,$naredil_namerno,$home_id,30,$taopis,'$eventime',1,$homescore,$awayscore)";
}
//vnos zgresenih metov
$mev=16; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$namerna_nad,$ekipazzogo,0,0,16,$taopis,'$eventime',1,$homescore,$awayscore)";
}

if ($ekipazzogo==$home_id) {$teamwithball = $home_id;} else {$teamwithball = $away_id;}

}

if ($home_pg1_favli==5) {$bonusdosegel=0; $vengre=$home_pg1; $home_pg1=0; $home_pg1_favli = 0;}
if ($home_sg1_favli==5) {$bonusdosegel=1; $vengre=$home_sg1; $home_sg1=0; $home_sg1_favli = 0;}
if ($home_sf1_favli==5) {$bonusdosegel=2; $vengre=$home_sf1; $home_sf1=0; $home_sf1_favli = 0;}
if ($home_pf1_favli==5) {$bonusdosegel=3; $vengre=$home_pf1; $home_pf1=0; $home_pf1_favli = 0;}
if ($home_c1_favli==5) {$bonusdosegel=4; $vengre=$home_c1; $home_c1=0; $home_c1_favli = 0;}

if ($away_pg1_favli==5) {$bonusdosegel=5; $vengre=$away_pg1; $away_pg1=0; $away_pg1_favli = 0;}
if ($away_sg1_favli==5) {$bonusdosegel=6; $vengre=$away_sg1; $away_sg1=0; $away_sg1_favli = 0;}
if ($away_sf1_favli==5) {$bonusdosegel=7; $vengre=$away_sf1; $away_sf1=0; $away_sf1_favli = 0;}
if ($away_pf1_favli==5) {$bonusdosegel=8; $vengre=$away_pf1; $away_pf1=0; $away_pf1_favli = 0;}
if ($away_c1_favli==5) {$bonusdosegel=9; $vengre=$away_c1; $away_c1=0; $away_c1_favli = 0;}


//KONEC OSEBNIH NAPAK
break;


/* tu se zacne tretji primer, to je tisti izjemni - nadaljevan dogodek */
//dogodek po skoku

CASE 3:
$dogodek_po_skoku = rand(0,4);

//switch znotraj switcha
SWITCH (TRUE) {
CASE ($dogodek_po_skoku < 3):
//zogo dobijo nasprotniki
if ($ekipazzogo==$home_id) {$homescore = $homescore+2; $home2zadeti=$home2zadeti+1; $teamwithball = $away_id;}
else {$awayscore = $awayscore+2; $away2zadeti=$away2zadeti+1; $teamwithball = $home_id;}
$nadaljevandogodek=0;
//vnos
$mev=27; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$nadaljuje_igralec,$ekipazzogo,0,0,27,$taopis,'$eventime',1,$homescore,$awayscore)";
break;

CASE ($dogodek_po_skoku > 2):

/* skok na odbito zogo */

if ($ekipazzogo==$home_id) {
$home2faljeni=$home2faljeni+1;
$tempskok = $homeoffskok + $awaydefskok;
$dobljenskok = rand(0,$tempskok);

$sestevek_skok_home = $homepg1_skok + $homesg1_skok + $homesf1_skok + $homepf1_skok + $homec1_skok;
$skakalec_home = rand(0,$sestevek_skok_home);
if ($skakalec_home <= $homepg1_skok) {$dobil_skok = $home_pg1;}
if ($skakalec_home > $homepg1_skok AND $skakalec_home <= ($homepg1_skok+$homesg1_skok)) {$dobil_skok = $home_sg1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok)) {$dobil_skok = $home_sf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$dobil_skok = $home_pf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$dobil_skok = $home_c1;}

$sestevek_skok_away = $awaypg1_skok + $awaysg1_skok + $awaysf1_skok + $awaypf1_skok + $awayc1_skok;
$skakalec_away = rand(0,$sestevek_skok_away);
if ($skakalec_away <= $awaypg1_skok) {$nasprotnik_skok = $away_pg1;}
if ($skakalec_away > $awaypg1_skok AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok)) {$nasprotnik_skok = $away_sg1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok)) {$nasprotnik_skok = $away_sf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$nasprotnik_skok = $away_pf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$nasprotnik_skok = $away_c1;}

if ($dobljenskok < $homeoffskok) {
$mev=29; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$nadaljuje_igralec,$ekipazzogo,$dobil_skok,$ekipazzogo,29,$taopis,'$eventime',1,$homescore,$awayscore)";
$teamwithball = $ekipazzogo;
$nadaljevandogodek=1;
$nadaljuje_igralec=$dobil_skok;
}
if ($dobljenskok >= $homeoffskok) {
$mev=28; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$nadaljuje_igralec,$ekipazzogo,$nasprotnik_skok,$away_id,28,$taopis,'$eventime',1,$homescore,$awayscore)";
$teamwithball = $away_id;
$nadaljevandogodek=0;
}
}

if ($ekipazzogo==$away_id) {
$away2faljeni=$away2faljeni+1;
$tempskok = $awayoffskok + $homedefskok;
$dobljenskok = rand(0,$tempskok);

$sestevek_skok_away = $awaypg1_skok + $awaysg1_skok + $awaysf1_skok + $awaypf1_skok + $awayc1_skok;
$skakalec_away = rand(0,$sestevek_skok_away);
if ($skakalec_away <= $awaypg1_skok) {$dobil_skok = $away_pg1;}
if ($skakalec_away > $awaypg1_skok AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok)) {$dobil_skok = $away_sg1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok)) {$dobil_skok = $away_sf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$dobil_skok = $away_pf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$dobil_skok = $away_c1;}

$sestevek_skok_home = $homepg1_skok + $homesg1_skok + $homesf1_skok + $homepf1_skok + $homec1_skok;
$skakalec_home = rand(0,$sestevek_skok_home);
if ($skakalec_home <= $homepg1_skok) {$nasprotnik_skok = $home_pg1;}
if ($skakalec_home > $homepg1_skok AND $skakalec_home <= ($homepg1_skok+$homesg1_skok)) {$nasprotnik_skok = $home_sg1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok)) {$nasprotnik_skok = $home_sf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$nasprotnik_skok = $home_pf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$nasprotnik_skok = $home_c1;}

if ($dobljenskok < $awayoffskok) {
$mev=29; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$nadaljuje_igralec,$ekipazzogo,$dobil_skok,$ekipazzogo,29,$taopis,'$eventime',1,$homescore,$awayscore)";
$teamwithball = $ekipazzogo;
$nadaljevandogodek=1;
$nadaljuje_igralec=$dobil_skok;
}
if ($dobljenskok >= $awayoffskok) {
$mev=28; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$nadaljuje_igralec,$ekipazzogo,$nasprotnik_skok,$home_id,28,$taopis,'$eventime',1,$homescore,$awayscore)";
$teamwithball = $home_id;
$nadaljevandogodek=0;
}
}
/* konec skoka */
break;

}
//konec switcha znotraj switcha

break;


/* cetrti primer, igralec ki je ukradel zogo krene v protinapad */

CASE 4:
$dogodek_po_kraji = rand(0,36);

//switch znotraj switcha
SWITCH (TRUE) {
CASE ($dogodek_po_kraji < 24):
//dosezen je kos
if ($ekipazzogo==$home_id) {$homescore=$homescore+2;  $home2zadeti=$home2zadeti+1; $teamwithball = $away_id;}
else {$awayscore = $awayscore+2; $away2zadeti=$away2zadeti+1; $teamwithball = $home_id;}
$nadaljevandogodek=0;
//vnos
$mev=23; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$nadaljuje_igralc,$ekipazzogo,0,0,23,$taopis,'$eventime',1,$homescore,$awayscore)";
break;

CASE ($dogodek_po_kraji > 23 AND $dogodek_po_kraji < 27):
//zogo dobijo nasprotniki
if ($ekipazzogo==$home_id) {$homescore = $homescore+3; $teamwithball = $away_id;} else {$awayscore = $awayscore+3; $teamwithball = $home_id;}
$nadaljevandogodek=0;
//vnos
$mev=24; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$nadaljuje_igralc,$ekipazzogo,0,0,24,$taopis,'$eventime',1,$homescore,$awayscore)";
break;

CASE ($dogodek_po_kraji > 26 AND $dogodek_po_kraji < 32):
$nadaljevandogodek=0;
//vnos
$mev=25; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$nadaljuje_igralc,$ekipazzogo,0,0,25,$taopis,'$eventime',1,$homescore,$awayscore)";
break;

CASE ($dogodek_po_kraji > 31):
//zogo dobijo nasprotniki
if ($ekipazzogo==$home_id) {$home_noofTOs=$home_noofTOs+1; $teamwithball = $away_id;} else {$away_noofTOs=$away_noofTOs+1; $teamwithball = $home_id;}
$nadaljevandogodek=0;
//vnos
$mev=26;shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$nadaljuje_igralc,$ekipazzogo,0,0,26,$taopis,'$eventime',1,$homescore,$awayscore)";
break;
}
//konec switcha znotraj switcha


//konec CELOTNEGA switcha za dogodek
break;
}

$randdd = $randdd + rand(19,25);
$eventime = date("Y-m-d H:i:s", mktime($dbhour,$dbmin,$dbsec+$randdd+30,$dbmonth,$dbday,$dbyear));
$stevilodogodkov++;
}




/*
******************************************************************
***********************************************KONEC PRVE CETRTINE
******************************************************************
*/
if ($dogodek != 6) {
$split = explode(" ", $eventime); $ndate = $split[0]; $ntime = $split[1];
$splitd = explode("-", $ndate); $nyear = $splitd[0]; $nmonth = $splitd[1]; $nday = $splitd[2];
$splitt = explode(":", $ntime); $nhour = $splitt[0]; $nmin = $splitt[1]; $nsec = $splitt[2];
$eventime = date("Y-m-d H:i:s", mktime($nhour,$nmin,$nsec+15,$nmonth,$nday,$nyear));
$mev=34; shuffle($ddogodek[$mev]); $c_opis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,0,0,0,0,34,$c_opis,'$eventime',1,$homescore,$awayscore)";
$split = explode(" ", $eventime); $ndate = $split[0]; $ntime = $split[1];
$splitd = explode("-", $ndate); $nyear = $splitd[0]; $nmonth = $splitd[1]; $nday = $splitd[2];
$splitt = explode(":", $ntime); $nhour = $splitt[0]; $nmin = $splitt[1]; $nsec = $splitt[2];
$eventime = date("Y-m-d H:i:s", mktime($nhour,$nmin+2,$nsec,$nmonth,$nday,$nyear));
}
/*
******************************************************************
***********************************************KONEC PRVE CETRTINE
******************************************************************
*/



//GLAVNA ZANKA
while ($stevilodogodkov1 < 41) {

if (!$homescore) {$homescore = 0;}
if (!$awayscore) {$awayscore = 0;}

//ekipa z zogo
if ($teamwithball=='') {$ekipazzogo = $home_id;} else {$ekipazzogo = $teamwithball;}

//dogodek ki se bo zgodil v tem eventu 
//FORMULA za verjetnost dogodka pri ekipi v napadu
$cetrtina=2;
if ($walkover != 14) {require('inc/nt_dogodek.php');}


//zacetek dogodka

switch ($dogodek) {


//prva moznost je met
CASE 0:
$kos = rand(0,$trojke);
if ($kos < 6) {

if ($ekipazzogo==$home_id) {
$fugaH = round((1 - $homesk2/$awaysk2 - (($home2zadeti/($home2zadeti+$home2faljeni)) - ($away2zadeti/($away2zadeti+$away2faljeni))))*10);
$fugaH = 0-$fugaH;
//echo "H".$fugaH."_";
$kdomece = rand(0,20);
//kasneje bi lahko uporabnik imel vpliv na to kdo vec mece
switch (TRUE) {
case ($kdomece < 6): $igralec_mece = $home_pg1; $posrecenzadve = rand($fugaH,$homepg1_za_dve); break;
case ($kdomece > 5 AND $kdomece < 12): $igralec_mece = $home_sg1; $posrecenzadve = rand($fugaH,$homesg1_za_dve); break;
case ($kdomece > 11 AND $kdomece < 15): $igralec_mece = $home_sf1; $posrecenzadve = rand($fugaH,$homesf1_za_dve); break;
case ($kdomece > 14 AND $kdomece < 18): $igralec_mece = $home_pf1; $posrecenzadve = rand($fugaH,$homepf1_za_dve); break;
case ($kdomece > 17): $igralec_mece = $home_c1; $posrecenzadve = rand($fugaH,$homec1_za_dve); break;
}
}
if ($ekipazzogo==$away_id) {
$fugaA = round((1 - $awaysk2/$homesk2 - (($away2zadeti/($away2zadeti+$away2faljeni)) - ($home2zadeti/($home2zadeti+$home2faljeni))))*10);
$fugaA = 0-$fugaA;
//echo "A".$fugaA."_";
$kdomece = rand(0,20);
switch (TRUE) {
case ($kdomece < 6): $igralec_mece = $away_pg1; $posrecenzadve = rand($fugaA,$awaypg1_za_dve); break;
case ($kdomece > 5 AND $kdomece < 12): $igralec_mece = $away_sg1; $posrecenzadve = rand($fugaA,$awaysg1_za_dve); break;
case ($kdomece > 11 AND $kdomece < 15): $igralec_mece = $away_sf1; $posrecenzadve = rand($fugaA,$awaysf1_za_dve); break;
case ($kdomece > 14 AND $kdomece < 18): $igralec_mece = $away_pf1; $posrecenzadve = rand($fugaA,$awaypf1_za_dve); break;
case ($kdomece > 17): $igralec_mece = $away_c1; $posrecenzadve = rand($fugaA,$awayc1_za_dve); break;
}
}

if ($posrecenzadve < 29) {
//zadet met

if ($ekipazzogo==$home_id) {
//podajalec
$domace_podaje = $homepg1_passing + $homesg1_passing + $homesf1_passing + $homepf1_passing + $homec1_passing;
$podaja = rand(0, $domace_podaje);
if ($podaja < $homepg1_passing AND $home_pg1 != $igralec_mece) {$podajalec = $home_pg1;}
elseif ($podaja >= $homepg1_passing AND $podaja < ($homepg1_passing+$homesg1_passing) AND $home_sg1 != $igralec_mece) {$podajalec = $home_sg1;}
elseif ($podaja >= ($homepg1_passing+$homesg1_passing) AND $podaja < ($homepg1_passing+$homesg1_passing+$homesf1_passing) AND $home_sf1 != $igralec_mece) {$podajalec = $home_sf1;}
elseif ($podaja >= ($homepg1_passing+$homesg1_passing+$homesf1_passing) AND $podaja < ($homepg1_passing+$homesg1_passing+$homesf1_passing+$homepf1_passing) AND $home_pf1 != $igralec_mece) {$podajalec = $home_pf1;}
elseif ($podaja >= ($homepg1_passing+$homesg1_passing+$homesf1_passing+$homepf1_passing) AND $home_c1 != $igralec_mece) {$podajalec = $home_c1;}
else {$podajalec=0;}

}
else
//kos so dali gostje
{
//podajalec
$gostujoce_podaje = $awaypg1_passing + $awaysg1_passing + $awaysf1_passing + $awaypf1_passing + $awayc1_passing;
$podaja = rand(0, $gostujoce_podaje);
if ($podaja < $awaypg1_passing AND $away_pg1 != $igralec_mece) {$podajalec = $away_pg1;}
elseif ($podaja >= $awaypg1_passing AND $podaja < ($awaypg1_passing+$awaysg1_passing) AND $away_sg1 != $igralec_mece) {$podajalec = $away_sg1;}
elseif ($podaja >= ($awaypg1_passing+$awaysg1_passing) AND $podaja < ($awaypg1_passing+$awaysg1_passing+$awaysf1_passing) AND $away_sf1 != $igralec_mece) {$podajalec = $away_sf1;}
elseif ($podaja >= ($awaypg1_passing+$awaysg1_passing+$awaysf1_passing) AND $podaja < ($awaypg1_passing+$awaysg1_passing+$awaysf1_passing+$awaypf1_passing) AND $away_pf1 != $igralec_mece) {$podajalec = $away_pf1;}
elseif ($podaja >= ($awaypg1_passing+$awaysg1_passing+$awaysf1_passing+$awaypf1_passing) AND $away_c1 != $igralec_mece) {$podajalec = $away_c1;}
else {$podajalec=0;}

}


if ($ekipazzogo==$home_id) {$homescore = $homescore+2; $home2zadeti=$home2zadeti+1; $teamwithball = $away_id; $nadaljevandogodek=0;}
else {$awayscore = $awayscore+2; $away2zadeti=$away2zadeti+1; $teamwithball = $home_id; $nadaljevandogodek=0;}


//vnos
if ($podajalec==0) {
$mev=2; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,0,0,2,$taopis,'$eventime',2,$homescore,$awayscore)";
} else {
$mev=1; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$podajalec,$ekipazzogo,1,$taopis,'$eventime',2,$homescore,$awayscore)";
}


}
//konec zadetega meta za dve
//sledi blokada, kdo jo napravi trenutno ni odvisno od skilov
if ($posrecenzadve > 28 AND $posrecenzadve < 32) {
if ($ekipazzogo==$home_id) {$home2faljeni=$home2faljeni+1;
$banana = rand(0,2);
if ($banana==0) {$kdo_blokira = $away_sf1;}
if ($banana==1) {$kdo_blokira = $away_pf1;}
if ($banana==2) {$kdo_blokira = $away_c1;}
}
else {$away2faljeni=$away2faljeni+1;
$banana = rand(0,2);
if ($banana==0) {$kdo_blokira = $home_sf1;}
if ($banana==1) {$kdo_blokira = $home_pf1;}
if ($banana==2) {$kdo_blokira = $home_c1;}
}
if ($ekipazzogo==$home_id) {
//vnos
$mev=31; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$kdo_blokira,$away_id,31,$taopis,'$eventime',2,$homescore,$awayscore)";

$teamwithball = $home_id;
$nadaljevandogodek=0;
}
else {
//vnos
$mev=31; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$kdo_blokira,$home_id,31,$taopis,'$eventime',2,$homescore,$awayscore)";

$teamwithball = $away_id;
$nadaljevandogodek=0;
}


}
//konec blokade
//sledi faljen met
if ($posrecenzadve > 31) {

/* skok na odbito zogo */

if ($ekipazzogo==$home_id) {
$home2faljeni=$home2faljeni+1;
$tempskok = $homeoffskok + $awaydefskok;
$dobljenskok = rand(0,$tempskok);

$sestevek_skok_home = $homepg1_skok + $homesg1_skok + $homesf1_skok + $homepf1_skok + $homec1_skok;
$skakalec_home = rand(0,$sestevek_skok_home);
if ($skakalec_home <= $homepg1_skok) {$dobil_skok = $home_pg1;}
if ($skakalec_home > $homepg1_skok AND $skakalec_home <= ($homepg1_skok+$homesg1_skok)) {$dobil_skok = $home_sg1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok)) {$dobil_skok = $home_sf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$dobil_skok = $home_pf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$dobil_skok = $home_c1;}

$sestevek_skok_away = $awaypg1_skok + $awaysg1_skok + $awaysf1_skok + $awaypf1_skok + $awayc1_skok;
$skakalec_away = rand(0,$sestevek_skok_away);
if ($skakalec_away <= $awaypg1_skok) {$nasprotnik_skok = $away_pg1;}
if ($skakalec_away > $awaypg1_skok AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok)) {$nasprotnik_skok = $away_sg1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok)) {$nasprotnik_skok = $away_sf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$nasprotnik_skok = $away_pf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$nasprotnik_skok = $away_c1;}

if ($dobljenskok < $homeoffskok) {
$mev=3; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$dobil_skok,$ekipazzogo,3,$taopis,'$eventime',2,$homescore,$awayscore)";
$teamwithball = $ekipazzogo;
$nadaljevandogodek=1;
$nadaljuje_igralec=$dobil_skok;
}
if ($dobljenskok >= $homeoffskok) {
$mev=4; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$nasprotnik_skok,$away_id,4,$taopis,'$eventime',2,$homescore,$awayscore)";
$teamwithball = $away_id;
$nadaljevandogodek=0;
}
}

if ($ekipazzogo==$away_id) {
$away2faljeni=$away2faljeni+1;
$tempskok = $awayoffskok + $homedefskok;
$dobljenskok = rand(0,$tempskok);

$sestevek_skok_away = $awaypg1_skok + $awaysg1_skok + $awaysf1_skok + $awaypf1_skok + $awayc1_skok;
$skakalec_away = rand(0,$sestevek_skok_away);
if ($skakalec_away <= $awaypg1_skok) {$dobil_skok = $away_pg1;}
if ($skakalec_away > $awaypg1_skok AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok)) {$dobil_skok = $away_sg1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok)) {$dobil_skok = $away_sf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$dobil_skok = $away_pf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$dobil_skok = $away_c1;}

$sestevek_skok_home = $homepg1_skok + $homesg1_skok + $homesf1_skok + $homepf1_skok + $homec1_skok;
$skakalec_home = rand(0,$sestevek_skok_home);
if ($skakalec_home <= $homepg1_skok) {$nasprotnik_skok = $home_pg1;}
if ($skakalec_home > $homepg1_skok AND $skakalec_home <= ($homepg1_skok+$homesg1_skok)) {$nasprotnik_skok = $home_sg1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok)) {$nasprotnik_skok = $home_sf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$nasprotnik_skok = $home_pf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$nasprotnik_skok = $home_c1;}

if ($dobljenskok < $awayoffskok) {
$mev=3; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$dobil_skok,$ekipazzogo,3,$taopis,'$eventime',2,$homescore,$awayscore)";
$teamwithball = $ekipazzogo;
$nadaljevandogodek=1;
$nadaljuje_igralec=$dobil_skok;
}
if ($dobljenskok >= $awayoffskok) {
$mev=4; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$nasprotnik_skok,$home_id,4,$taopis,'$eventime',2,$homescore,$awayscore)";
$teamwithball = $home_id;
$nadaljevandogodek=0;
}
}
}
}
if ($kos > 5) {
if ($ekipazzogo==$home_id) {
$kdomece = rand(0,11);
switch (TRUE) {
case ($kdomece < 4):
$igralec_mece = $home_pg1;
$posrecenzatri = rand(0,$homepg1_za_tri);
   break;
case ($kdomece > 3 AND $kdomece < 9):
$igralec_mece = $home_sg1;
$posrecenzatri = rand(0,$homesg1_za_tri);
   break;
case ($kdomece > 8 AND $kdomece < 11):
$igralec_mece = $home_sf1;
$posrecenzatri = rand(0,$homesf1_za_tri);
   break;
case ($kdomece==11):
$igralec_mece = $home_pf1;
$posrecenzatri = rand(0,$homepf1_za_tri);
   break;
}
}

if ($ekipazzogo==$away_id) {
$kdomece = rand(0,11);
switch (TRUE) {
case ($kdomece < 4): $igralec_mece = $away_pg1; $posrecenzatri = rand(0,$awaypg1_za_tri); break;
case ($kdomece > 3 AND $kdomece < 9): $igralec_mece = $away_sg1; $posrecenzatri = rand(0,$awaysg1_za_tri); break;
case ($kdomece > 8 AND $kdomece < 11): $igralec_mece = $away_sf1; $posrecenzatri = rand(0,$awaysf1_za_tri); break;
case ($kdomece==11): $igralec_mece = $away_pf1; $posrecenzatri = rand(0,$awaypf1_za_tri); break;
}
}

if ($posrecenzatri < 5) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+3; $teamwithball = $away_id; $nadaljevandogodek=0;}
else {$awayscore = $awayscore+3; $teamwithball = $home_id; $nadaljevandogodek=0;}
//vpis
$mev=7; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,0,0,7,$taopis,'$eventime',2,$homescore,$awayscore)";

}
if ($posrecenzatri > 4) {

/* skok na odbito zogo */

if ($ekipazzogo==$home_id) {
$tempskok = $homeoffskok + $awaydefskok;
$dobljenskok = rand(0,$tempskok);

$sestevek_skok_home = $homepg1_skok + $homesg1_skok + $homesf1_skok + $homepf1_skok + $homec1_skok;
$skakalec_home = rand(0,$sestevek_skok_home);
if ($skakalec_home <= $homepg1_skok) {$dobil_skok = $home_pg1;}
if ($skakalec_home > $homepg1_skok AND $skakalec_home <= ($homepg1_skok+$homesg1_skok)) {$dobil_skok = $home_sg1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok)) {$dobil_skok = $home_sf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$dobil_skok = $home_pf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$dobil_skok = $home_c1;}

$sestevek_skok_away = $awaypg1_skok + $awaysg1_skok + $awaysf1_skok + $awaypf1_skok + $awayc1_skok;
$skakalec_away = rand(0,$sestevek_skok_away);
if ($skakalec_away <= $awaypg1_skok) {$nasprotnik_skok = $away_pg1;}
if ($skakalec_away > $awaypg1_skok AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok)) {$nasprotnik_skok = $away_sg1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok)) {$nasprotnik_skok = $away_sf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$nasprotnik_skok = $away_pf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$nasprotnik_skok = $away_c1;}

if ($dobljenskok < $homeoffskok) {
$mev=8; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$dobil_skok,$ekipazzogo,8,$taopis,'$eventime',2,$homescore,$awayscore)";
$teamwithball = $ekipazzogo;
$nadaljevandogodek=1;
$nadaljuje_igralec=$dobil_skok;
}
if ($dobljenskok >= $homeoffskok) {
$mev=9; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$nasprotnik_skok,$away_id,9,$taopis,'$eventime',2,$homescore,$awayscore)";
$teamwithball = $away_id;
$nadaljevandogodek=0;
}
}

if ($ekipazzogo==$away_id) {
$tempskok = $awayoffskok + $homedefskok;
$dobljenskok = rand(0,$tempskok);

$sestevek_skok_away = $awaypg1_skok + $awaysg1_skok + $awaysf1_skok + $awaypf1_skok + $awayc1_skok;
$skakalec_away = rand(0,$sestevek_skok_away);
if ($skakalec_away <= $awaypg1_skok) {$dobil_skok = $away_pg1;}
if ($skakalec_away > $awaypg1_skok AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok)) {$dobil_skok = $away_sg1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok)) {$dobil_skok = $away_sf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$dobil_skok = $away_pf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$dobil_skok = $away_c1;}

$sestevek_skok_home = $homepg1_skok + $homesg1_skok + $homesf1_skok + $homepf1_skok + $homec1_skok;
$skakalec_home = rand(0,$sestevek_skok_home);
if ($skakalec_home <= $homepg1_skok) {$nasprotnik_skok = $home_pg1;}
if ($skakalec_home > $homepg1_skok AND $skakalec_home <= ($homepg1_skok+$homesg1_skok)) {$nasprotnik_skok = $home_sg1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok)) {$nasprotnik_skok = $home_sf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$nasprotnik_skok = $home_pf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$nasprotnik_skok = $home_c1;}

if ($dobljenskok < $awayoffskok) {
$mev=8; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$dobil_skok,$ekipazzogo,8,$taopis,'$eventime',2,$homescore,$awayscore)";
$teamwithball = $ekipazzogo;
$nadaljevandogodek=1;
$nadaljuje_igralec=$dobil_skok;
}
if ($dobljenskok >= $awayoffskok) {
$mev=9; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$nasprotnik_skok,$home_id,9,$taopis,'$eventime',2,$homescore,$awayscore)";
$teamwithball = $home_id;
$nadaljevandogodek=0;
}
}
}

}


break;

/*
******************************************************************
*/

CASE 1:

/* druga moznost je IZGUBLJENA ZOGA */

//najprej me zanima kdo je izgubil ?ogo

$home_izgubil = $homepg1_napaka + $homesg1_napaka + $homesf1_napaka + $homepf1_napaka + $homec1_napaka;
$away_izgubil = $awaypg1_napaka + $awaysg1_napaka + $awaysf1_napaka + $awaypf1_napaka + $awayc1_napaka;

if ($ekipazzogo==$home_id) {
$narejena_napaka = rand(0, $home_izgubil);
if ($narejena_napaka < $homepg1_napaka) {$naredil_napako = $home_pg1;}
if ($narejena_napaka >= $homepg1_napaka AND $narejena_napaka < ($homepg1_napaka+$homesg1_napaka)) {$naredil_napako = $home_sg1;}
if ($narejena_napaka >= ($homepg1_napaka+$homesg1_napaka) AND $narejena_napaka < ($homepg1_napaka+$homesg1_napaka+$homesf1_napaka)) {$naredil_napako = $home_sf1;}
if ($narejena_napaka >= ($homepg1_napaka+$homesg1_napaka+$homesf1_napaka) AND $narejena_napaka < ($homepg1_napaka+$homesg1_napaka+$homesf1_napaka+$homepf1_napaka)) {$naredil_napako=$home_pf1;}
if ($narejena_napaka >= ($homepg1_napaka+$homesg1_napaka+$homesf1_napaka+$homepf1_napaka)) {$naredil_napako = $home_c1;}

} else {

$narejena_napaka = rand(0, $away_izgubil);
if ($narejena_napaka < $awaypg1_napaka) {$naredil_napako = $away_pg1;}
if ($narejena_napaka >= $awaypg1_napaka AND $narejena_napaka < ($awaypg1_napaka+$awaysg1_napaka)) {$naredil_napako = $away_sg1;}
if ($narejena_napaka >= ($awaypg1_napaka+$awaysg1_napaka) AND $narejena_napaka < ($awaypg1_napaka+$awaysg1_napaka+$awaysf1_napaka)) {$naredil_napako = $away_sf1;}
if ($narejena_napaka >= ($awaypg1_napaka+$awaysg1_napaka+$awaysf1_napaka) AND $narejena_napaka < ($awaypg1_napaka+$awaysg1_napaka+$awaysf1_napaka+$awaypf1_napaka)) {$naredil_napako = $away_pf1;}
if ($narejena_napaka >= ($awaypg1_napaka+$awaysg1_napaka+$awaysf1_napaka+$awaypf1_napaka)) {$naredil_napako = $away_c1;}

}

//konec ugotovitev gleda tega kdo je naredil napako


$zgubljena = rand(0,45);
if ($zgubljena < 29) {

//vnos
$mev=5; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$naredil_napako,$ekipazzogo,0,0,5,$taopis,'$eventime',2,$homescore,$awayscore)";

if ($ekipazzogo==$home_id) {
$teamwithball = $away_id;
$nadaljevandogodek=0;
}
else {
$teamwithball = $home_id;
$nadaljevandogodek=0;
}

}

if ($zgubljena > 28) {
//UKRADENA zoga - najprej me zanima kdo je ukradel zogo

$home_kraja = $homepg1_kraja + $homesg1_kraja + $homesf1_kraja + $homepf1_kraja + $homec1_kraja;
$away_kraja = $awaypg1_kraja + $awaysg1_kraja + $awaysf1_kraja + $awaypf1_kraja + $awayc1_kraja;

if ($ekipazzogo==$away_id) {
$ukradena_z = rand(0, $home_kraja);
if ($ukradena_z < $homepg1_kraja) {$ukradel_zogo = $home_pg1;}
if ($ukradena_z >= $homepg1_kraja AND $narejena_kraja < ($homepg1_kraja+$homesg1_kraja)) {$ukradel_zogo = $home_sg1;}
if ($ukradena_z >= ($homepg1_kraja+$homesg1_kraja) AND $narejena_kraja < ($homepg1_kraja+$homesg1_kraja+$homesf1_kraja)) {$ukradel_zogo = $home_sf1;}
if ($ukradena_z >= ($homepg1_kraja+$homesg1_kraja+$homesf1_kraja) AND $narejena_kraja < ($homepg1_kraja+$homesg1_kraja+$homesf1_kraja+$homepf1_kraja)) {$ukradel_zogo = $home_pf1;}
if ($ukradena_z >= ($homepg1_kraja+$homesg1_kraja+$homesf1_kraja+$homepf1_kraja)) {$ukradel_zogo = $home_c1;}

} else {

$ukradena_z = rand(0, $away_kraja);
if ($ukradena_z < $awaypg1_kraja) {$ukradel_zogo = $away_pg1;}
if ($ukradena_z >= $awaypg1_kraja AND $narejena_kraja < ($awaypg1_kraja+$awaysg1_kraja)) {$ukradel_zogo = $away_sg1;}
if ($ukradena_z >= ($awaypg1_kraja+$awaysg1_kraja) AND $narejena_kraja < ($awaypg1_kraja+$awaysg1_kraja+$awaysf1_kraja)) {$ukradel_zogo = $away_sf1;}
if ($ukradena_z >= ($awaypg1_kraja+$awaysg1_kraja+$awaysf1_kraja) AND $narejena_kraja < ($awaypg1_kraja+$awaysg1_kraja+$awaysf1_kraja+$awaypf1_kraja)) {$ukradel_zogo = $away_pf1;}
if ($ukradena_z >= ($awaypg1_kraja+$awaysg1_kraja+$awaysf1_kraja+$awaypf1_kraja)) {$ukradel_zogo = $away_c1;}

}

//konec ugotovitev gleda tega kdo je ukradel zogo


if ($ekipazzogo==$home_id) {
//vnos
$mev=6; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$naredil_napako,$ekipazzogo,$ukradel_zogo,$away_id,6,$taopis,'$eventime',2,$homescore,$awayscore)";

$teamwithball = $away_id;
$nadaljevandogodek=2;
$nadaljuje_igralc=$ukradel_zogo;
}
else {
//vnos
$mev=6; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$naredil_napako,$ekipazzogo,$ukradel_zogo,$home_id,6,$taopis,'$eventime',2,$homescore,$awayscore)";

$teamwithball = $home_id;
$nadaljevandogodek=2;
$nadaljuje_igralc=$ukradel_zogo;
}

}
break;

/*
***********************************
* tretja moznost je osebna napaka *
***********************************
*/

CASE 2:

$osebna = rand(0,19);
if ($osebna < 17) {
//najprej me zanima kdo je naredil osebno v obrambi in nad kom

$home_osebna_obramba = $homepg1_v_obrambi + $homesg1_v_obrambi + $homesf1_v_obrambi + $homepf1_v_obrambi + $homec1_v_obrambi;
$away_osebna_obramba = $awaypg1_v_obrambi + $awaysg1_v_obrambi + $awaysf1_v_obrambi + $awaypf1_v_obrambi + $awayc1_v_obrambi;

if ($ekipazzogo==$away_id) {

$osebna_obramba = rand(0, $home_osebna_obramba);
if ($osebna_obramba < $homepg1_v_obrambi) {
$favlal_v_obrambi = $home_pg1; $home_pg1_favli=$home_pg1_favli+1;
$pofavlan = rand(0,2);
if ($pofavlan==0) {$favl_nad = $away_pg1; $met_verjetnost = rand(0, $awaypg1_freethrow);}
if ($pofavlan==1) {$favl_nad = $away_sg1; $met_verjetnost = rand(0, $awaysg1_freethrow);}
if ($pofavlan==2) {$favl_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
}
if ($osebna_obramba >= $homepg1_v_obrambi AND $osebna_obramba < ($homepg1_v_obrambi+$homesg1_v_obrambi)) {
$favlal_v_obrambi = $home_sg1; $home_sg1_favli=$home_sg1_favli+1;
$pofavlan = rand(0,3);
if ($pofavlan==0) {$favl_nad = $away_pg1; $met_verjetnost = rand(0, $awaypg1_freethrow);}
if ($pofavlan==1) {$favl_nad = $away_sg1; $met_verjetnost = rand(0, $awaysg1_freethrow);}
if ($pofavlan==2) {$favl_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
if ($pofavlan==3) {$favl_nad = $away_pf1; $met_verjetnost = rand(0, $awaypf1_freethrow);}
}
if ($osebna_obramba >= ($homepg1_v_obrambi+$homesg1_v_obrambi) AND $osebna_obramba < ($homepg1_v_obrambi+$homesg1_v_obrambi+$homesf1_v_obrambi)) {
$favlal_v_obrambi = $home_sf1; $home_sf1_favli=$home_sf1_favli+1;
$pofavlan = rand(0,4);
if ($pofavlan==0) {$favl_nad = $away_pg1; $met_verjetnost = rand(0, $awaypg1_freethrow);}
if ($pofavlan==1) {$favl_nad = $away_sg1; $met_verjetnost = rand(0, $awaysg1_freethrow);}
if ($pofavlan==2) {$favl_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
if ($pofavlan==3) {$favl_nad = $away_pf1; $met_verjetnost = rand(0, $awaypf1_freethrow);}
if ($pofavlan==4) {$favl_nad = $away_c1; $met_verjetnost = rand(0, $awayc1_freethrow);}
}
if ($osebna_obramba >= ($homepg1_v_obrambi+$homesg1_v_obrambi+$homesf1_v_obrambi) AND $osebna_obramba < ($homepg1_v_obrambi+$homesg1_v_obrambi+$homesf1_v_obrambi+$homepf1_v_obrambi)) {
$favlal_v_obrambi = $home_pf1; $home_pf1_favli=$home_pf1_favli+1;
$pofavlan = rand(0,3);
if ($pofavlan==0) {$favl_nad = $away_sg1; $met_verjetnost = rand(0, $awaysg1_freethrow);}
if ($pofavlan==1) {$favl_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
if ($pofavlan==2) {$favl_nad = $away_pf1; $met_verjetnost = rand(0, $awaypf1_freethrow);}
if ($pofavlan==3) {$favl_nad = $away_c1; $met_verjetnost = rand(0, $awayc1_freethrow);}
}
if ($osebna_obramba >= ($homepg1_v_obrambi+$homesg1_v_obrambi+$homesf1_v_obrambi+$homepf1_v_obrambi)) {
$favlal_v_obrambi = $home_c1; $home_c1_favli=$home_c1_favli+1;
$pofavlan = rand(0,2);
if ($pofavlan==0) {$favl_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
if ($pofavlan==1) {$favl_nad = $away_pf1; $met_verjetnost = rand(0, $awaypf1_freethrow);}
if ($pofavlan==2) {$favl_nad = $away_c1; $met_verjetnost = rand(0, $awayc1_freethrow);}
}

} else {

$osebna_obramba = rand(0, $away_osebna_obramba);
if ($osebna_obramba < $awaypg1_v_obrambi) {
$favlal_v_obrambi = $away_pg1; $away_pg1_favli=$away_pg1_favli+1;
$pofavlan = rand(0,2);
if ($pofavlan==0) {$favl_nad = $home_pg1; $met_verjetnost = rand(0, $homepg1_freethrow);}
if ($pofavlan==1) {$favl_nad = $home_sg1; $met_verjetnost = rand(0, $homesg1_freethrow);}
if ($pofavlan==2) {$favl_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
}
if ($osebna_obramba >= $awaypg1_v_obrambi AND $osebna_obramba < ($awaypg1_v_obrambi+$awaysg1_v_obrambi)) {
$favlal_v_obrambi = $away_sg1; $away_sg1_favli=$away_sg1_favli+1;
$pofavlan = rand(0,3);
if ($pofavlan==0) {$favl_nad = $home_pg1; $met_verjetnost = rand(0, $homepg1_freethrow);}
if ($pofavlan==1) {$favl_nad = $home_sg1; $met_verjetnost = rand(0, $homesg1_freethrow);}
if ($pofavlan==2) {$favl_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
if ($pofavlan==3) {$favl_nad = $home_pf1; $met_verjetnost = rand(0, $homepf1_freethrow);}
}
if ($osebna_obramba >= ($awaypg1_v_obrambi+$awaysg1_v_obrambi) AND $osebna_obramba < 
($awaypg1_v_obrambi+$awaysg1_v_obrambi+$awaysf1_v_obrambi)) {
$favlal_v_obrambi = $away_sf1; $away_sf1_favli=$away_sf1_favli+1;
$pofavlan = rand(0,4);
if ($pofavlan==0) {$favl_nad = $home_pg1; $met_verjetnost = rand(0, $homepg1_freethrow);}
if ($pofavlan==1) {$favl_nad = $home_sg1; $met_verjetnost = rand(0, $homesg1_freethrow);}
if ($pofavlan==2) {$favl_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
if ($pofavlan==3) {$favl_nad = $home_pf1; $met_verjetnost = rand(0, $homepf1_freethrow);}
if ($pofavlan==4) {$favl_nad = $home_c1; $met_verjetnost = rand(0, $homec1_freethrow);}
}
if ($osebna_obramba >= ($awaypg1_v_obrambi+$awaysg1_v_obrambi+$awaysf1_v_obrambi) AND $osebna_obramba < ($awaypg1_v_obrambi+$awaysg1_v_obrambi+$awaysf1_v_obrambi+$awaypf1_v_obrambi)) {
$favlal_v_obrambi = $away_pf1; $away_pf1_favli=$away_pf1_favli+1;
$pofavlan = rand(0,3);
if ($pofavlan==0) {$favl_nad = $home_sg1; $met_verjetnost = rand(0, $homesg1_freethrow);}
if ($pofavlan==1) {$favl_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
if ($pofavlan==2) {$favl_nad = $home_pf1; $met_verjetnost = rand(0, $homepf1_freethrow);}
if ($pofavlan==3) {$favl_nad = $home_c1; $met_verjetnost = rand(0, $homec1_freethrow);}
}
if ($osebna_obramba >= ($awaypg1_v_obrambi+$awaysg1_v_obrambi+$awaysf1_v_obrambi+$awaypf1_v_obrambi)) {
$favlal_v_obrambi = $away_c1; $away_c1_favli=$away_c1_favli+1;
$pofavlan = rand(0,2);
if ($pofavlan==0) {$favl_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
if ($pofavlan==1) {$favl_nad = $home_pf1; $met_verjetnost = rand(0, $homepf1_freethrow);}
if ($pofavlan==2) {$favl_nad = $home_c1; $met_verjetnost = rand(0, $homec1_freethrow);}
}

}

//konec ugotovitev gleda tega kdo je naredil osebno v obrambi
}


if ($osebna < 11) {

//preksrsek ob metu za dve in dva prosta meta
//vnos prekrska
$mev=10; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
if ($ekipazzogo==$home_id) {$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,$favlal_v_obrambi,$away_id,10,$taopis,'$eventime',2,$homescore,$awayscore)";}
else {$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,$favlal_v_obrambi,$home_id,10,$taopis,'$eventime',2,$homescore,$awayscore)";}

if ($met_verjetnost > 26) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+2;} else {$awayscore = $awayscore+2;}
//vnos
$mev=14; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,14,$taopis,'$eventime',2,$homescore,$awayscore)";
}
elseif ($met_verjetnost > 13 AND $met_verjetnost < 27) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+1;} else {$awayscore = $awayscore+1;}
//vnos
$mev=15; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,15,$taopis,'$eventime',2,$homescore,$awayscore)";
}
else {
//vnos
$mev=16; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,16,$taopis,'$eventime',2,$homescore,$awayscore)";
}
//konec dveh prostih metov, kasneje se lahko dodajo skoki
if ($ekipazzogo==$home_id) {$teamwithball = $away_id;} else {$teamwithball = $home_id;}

}

if ($osebna > 10 AND $osebna < 13) {

//prekrsek ob metu za tri in trije prosti meti
//vnos prekrska
$mev=11; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
if ($ekipazzogo==$home_id) {$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,$favlal_v_obrambi,$away_id,11,$taopis,'$eventime',2,$homescore,$awayscore)";}
else {$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,$favlal_v_obrambi,$home_id,11,$taopis,'$eventime',2,$homescore,$awayscore)";}

//koliko od treh je bilo zadetih
if ($met_verjetnost > 25) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+3;} else {$awayscore = $awayscore+3;}
//vnos
$mev=17; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,17,$taopis,'$eventime',2,$homescore,$awayscore)";
}
elseif ($met_verjetnost > 15 AND $met_verjetnost < 26) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+2;} else {$awayscore = $awayscore+2;}
//vnos
$mev=18; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,18,$taopis,'$eventime',2,$homescore,$awayscore)";
}
elseif ($met_verjetnost > 7 AND $met_verjetnost < 16) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+1;} else {$awayscore = $awayscore+1;}
//vnos
$mev=19; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,19,$taopis,'$eventime',2,$homescore,$awayscore)";
}
else {
//vnos
$mev=20; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,20,$taopis,'$eventime',2,$homescore,$awayscore)";
}
//konec treh prostih metov, kasneje se lahko dodajo skoki
if ($ekipazzogo==$home_id) {$teamwithball = $away_id;} else {$teamwithball = $home_id;}

}

if ($osebna > 12 AND $osebna < 16) {

//zadet kos in dodatni met
//vnos zadetka in prekrska
$mev=12; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
if ($ekipazzogo==$home_id) {
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,$favlal_v_obrambi,$away_id,12,$taopis,'$eventime',2,$homescore+2,$awayscore)"; $home2zadeti=$home2zadeti+1;}
else {$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,$favlal_v_obrambi,$home_id,12,$taopis,'$eventime',2,$homescore,$awayscore+2)"; $away2zadeti=$away2zadeti+1;}

if ($met_verjetnost > 23) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+3;} else {$awayscore = $awayscore+3;}
//vnos
$mev=21; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,21,$taopis,'$eventime',2,$homescore,$awayscore)";
}
else {
if ($ekipazzogo==$home_id) {$homescore = $homescore+2;} else {$awayscore = $awayscore+2;}
//vnos
$mev=22; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,22,$taopis,'$eventime',2,$homescore,$awayscore)";
}
//konec dodatnega meta, kasneje dodam skok
if ($ekipazzogo==$home_id) {$teamwithball = $away_id;} else {$teamwithball = $home_id;}

}
if ($osebna==16) {

//zadeta trojka in dodatni met
//vnos zadetka in prekrska
$mev=13; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
if ($ekipazzogo==$home_id) {$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,$favlal_v_obrambi,$away_id,13,$taopis,'$eventime',2,$homescore+3,$awayscore)";}
else {$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,$favlal_v_obrambi,$home_id,13,$taopis,'$eventime',2,$homescore,$awayscore+3)";}

if ($met_verjetnost > 22) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+4;} else {$awayscore = $awayscore+4;}
//vnos
$mev=21; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,21,$taopis,'$eventime',2,$homescore,$awayscore)";
}
else {
if ($ekipazzogo==$home_id) {$homescore = $homescore+3;} else {$awayscore = $awayscore+3;}
//vnos
$mev=22; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,22,$taopis,'$eventime',2,$homescore,$awayscore)";
}
//konec dodatnega meta, kasneje dodam skok
if ($ekipazzogo==$home_id) {$teamwithball = $away_id;} else {$teamwithball = $home_id;}

}

if ($osebna > 16 AND $osebna < 19) {

//OSEBNA V NAPADU

$home_osebna_napad = $homepg1_v_napadu + $homesg1_v_napadu + $homesf1_v_napadu + $homepf1_v_napadu + $homec1_v_napadu;
$away_osebna_napad = $awaypg1_v_napadu + $awaysg1_v_napadu + $awaysf1_v_napadu + $awaypf1_v_napadu + $awayc1_v_napadu;

if ($ekipazzogo==$home_id) {

$osebna_napad = rand(0, $home_osebna_napad);
if ($osebna_napad < $homepg1_v_napadu) {$favlal_v_napadu = $home_pg1; $home_pg1_favli=$home_pg1_favli+1;}
if ($osebna_napad >= $homepg1_v_napadu AND $osebna_napad < ($homepg1_v_napadu+$homesg1_v_napadu)) {$favlal_v_napadu = $home_sg1; $home_sg1_favli=$home_sg1_favli+1;}
if ($osebna_napad >= ($homepg1_v_napadu+$homesg1_v_napadu) AND $osebna_napad < ($homepg1_v_napadu+$homesg1_v_napadu+$homesf1_v_napadu)) {$favlal_v_napadu = $home_sf1; $home_sf1_favli=$home_sf1_favli+1;}
if ($osebna_napad >= ($homepg1_v_napadu+$homesg1_v_napadu+$homesf1_v_napadu) AND $osebna_napad < ($homepg1_v_napadu+$homesg1_v_napadu+$homesf1_v_napadu+$homepf1_v_napadu)) {$favlal_v_napadu = $home_pf1; $home_pf1_favli=$home_pf1_favli+1;}
if ($osebna_napad >= ($homepg1_v_napadu+$homesg1_v_napadu+$homesf1_v_napadu+$homepf1_v_napadu)) {$favlal_v_napadu = $home_c1; $home_c1_favli=$home_c1_favli+1;}
//vnos
$mev=32; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,0,$away_id,$favlal_v_napadu,$ekipazzogo,32,$taopis,'$eventime',2,$homescore,$awayscore)";
//nadaljevanje
$teamwithball = $away_id;
}
else {

$osebna_napad = rand(0, $away_osebna_napad);
if ($osebna_napad < $awaypg1_v_napadu) {$favlal_v_napadu = $away_pg1; $away_pg1_favli=$away_pg1_favli+1;}
if ($osebna_napad >= $awaypg1_v_napadu AND $osebna_napad < ($awaypg1_v_napadu+$awaysg1_v_napadu)) {$favlal_v_napadu = $away_sg1; $away_sg1_favli=$away_sg1_favli+1;}
if ($osebna_napad >= ($awaypg1_v_napadu+$awaysg1_v_napadu) AND $osebna_napad < ($awaypg1_v_napadu+$awaysg1_v_napadu+$awaysf1_v_napadu)) {$favlal_v_napadu = $away_sf1; $away_sf1_favli=$away_sf1_favli+1;}
if ($osebna_napad >= ($awaypg1_v_napadu+$awaysg1_v_napadu+$awaysf1_v_napadu) AND $osebna_napad < ($awaypg1_v_napadu+$awaysg1_v_napadu+$awaysf1_v_napadu+$awaypf1_v_napadu)) {$favlal_v_napadu = $away_pf1; $away_pf1_favli=$away_pf1_favli+1;}
if ($osebna_napad >= ($awaypg1_v_napadu+$awaysg1_v_napadu+$awaysf1_v_napadu+$awaypf1_v_napadu)) {$favlal_v_napadu = $away_c1; $away_c1_favli=$away_c1_favli+1;}
//vnos
$mev=32; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,0,$home_id,$favlal_v_napadu,$ekipazzogo,32,$taopis,'$eventime',2,$homescore,$awayscore)";
//nadaljevanje
$teamwithball = $home_id;
}



//KONEC OSEBNE V NAPADU

}
if ($osebna==19) {

//NAMERNA OSEBNA NAPAKA

$namerna_osebna = rand(0,69);
//switch znotraj switcha
SWITCH (TRUE) {
CASE ($namerna_osebna < 16):
if ($ekipazzogo==$home_id) {$naredil_namerno = $away_pg1; $away_pg1_favli=$away_pg1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $home_pg1; $met_verjetnost = rand(0, $homepg1_freethrow);}
if ($namerna==1) {$namerna_nad = $home_sg1; $met_verjetnost = rand(0, $homesg1_freethrow);}
if ($namerna==2) {$namerna_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
if ($namerna==3) {$namerna_nad = $home_pf1; $met_verjetnost = rand(0, $homepf1_freethrow);}
if ($namerna==4) {$namerna_nad = $home_c1; $met_verjetnost = rand(0, $homec1_freethrow);}
}
else {$naredil_namerno = $home_pg1; $home_pg1_favli=$home_pg1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $away_pg1; $met_verjetnost = rand(0, $awaypg1_freethrow);}
if ($namerna==1) {$namerna_nad = $away_sg1; $met_verjetnost = rand(0, $awaysg1_freethrow);}
if ($namerna==2) {$namerna_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
if ($namerna==3) {$namerna_nad = $away_pf1; $met_verjetnost = rand(0, $awaypf1_freethrow);}
if ($namerna==4) {$namerna_nad = $away_c1; $met_verjetnost = rand(0, $awayc1_freethrow);}
}
break;

CASE ($namerna_osebna > 15 AND $namerna_osebna < 27):
if ($ekipazzogo==$home_id) {$naredil_namerno = $away_sg1; $away_sg1_favli=$away_sg1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $home_pg1; $met_verjetnost = rand(0, $homepg1_freethrow);}
if ($namerna==1) {$namerna_nad = $home_sg1; $met_verjetnost = rand(0, $homesg1_freethrow);}
if ($namerna==2) {$namerna_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
if ($namerna==3) {$namerna_nad = $home_pf1; $met_verjetnost = rand(0, $homepf1_freethrow);}
if ($namerna==4) {$namerna_nad = $home_c1; $met_verjetnost = rand(0, $homec1_freethrow);}
}
else {$naredil_namerno = $home_sg1; $home_sg1_favli=$home_sg1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $away_pg1; $met_verjetnost = rand(0, $awaypg1_freethrow);}
if ($namerna==1) {$namerna_nad = $away_sg1; $met_verjetnost = rand(0, $awaysg1_freethrow);}
if ($namerna==2) {$namerna_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
if ($namerna==3) {$namerna_nad = $away_pf1; $met_verjetnost = rand(0, $awaypf1_freethrow);}
if ($namerna==4) {$namerna_nad = $away_c1; $met_verjetnost = rand(0, $awayc1_freethrow);}
}
break;

CASE ($namerna_osebna > 26 AND $namerna_osebna < 45):
if ($ekipazzogo==$home_id) {$naredil_namerno = $away_sf1; $away_sf1_favli=$away_sf1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $home_pg1; $met_verjetnost = rand(0, $homepg1_freethrow);}
if ($namerna==1) {$namerna_nad = $home_sg1; $met_verjetnost = rand(0, $homesg1_freethrow);}
if ($namerna==2) {$namerna_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
if ($namerna==3) {$namerna_nad = $home_pf1; $met_verjetnost = rand(0, $homepf1_freethrow);}
if ($namerna==4) {$namerna_nad = $home_c1; $met_verjetnost = rand(0, $homec1_freethrow);}
}
else {$naredil_namerno = $home_sf1; $home_sf1_favli=$home_sf1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $away_pg1; $met_verjetnost = rand(0, $awaypg1_freethrow);}
if ($namerna==1) {$namerna_nad = $away_sg1; $met_verjetnost = rand(0, $awaysg1_freethrow);}
if ($namerna==2) {$namerna_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
if ($namerna==3) {$namerna_nad = $away_pf1; $met_verjetnost = rand(0, $awaypf1_freethrow);}
if ($namerna==4) {$namerna_nad = $away_c1; $met_verjetnost = rand(0, $awayc1_freethrow);}
}
break;

CASE ($namerna_osebna > 44 AND $namerna_osebna < 61):
if ($ekipazzogo==$home_id) {$naredil_namerno = $away_pf1; $away_pf1_favli=$away_pf1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $home_pg1; $met_verjetnost = rand(0, $homepg1_freethrow);}
if ($namerna==1) {$namerna_nad = $home_sg1; $met_verjetnost = rand(0, $homesg1_freethrow);}
if ($namerna==2) {$namerna_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
if ($namerna==3) {$namerna_nad = $home_pf1; $met_verjetnost = rand(0, $homepf1_freethrow);}
if ($namerna==4) {$namerna_nad = $home_c1; $met_verjetnost = rand(0, $homec1_freethrow);}
}
else {$naredil_namerno = $home_pf1; $home_pf1_favli=$home_pf1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $away_pg1; $met_verjetnost = rand(0, $awaypg1_freethrow);}
if ($namerna==1) {$namerna_nad = $away_sg1; $met_verjetnost = rand(0, $awaysg1_freethrow);}
if ($namerna==2) {$namerna_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
if ($namerna==3) {$namerna_nad = $away_pf1; $met_verjetnost = rand(0, $awaypf1_freethrow);}
if ($namerna==4) {$namerna_nad = $away_c1; $met_verjetnost = rand(0, $awayc1_freethrow);}
}
break;

CASE ($namerna_osebna > 60):
if ($ekipazzogo==$home_id) {$naredil_namerno = $away_c1; $away_c1_favli=$away_c1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $home_pg1; $met_verjetnost = rand(0, $homepg1_freethrow);}
if ($namerna==1) {$namerna_nad = $home_sg1; $met_verjetnost = rand(0, $homesg1_freethrow);}
if ($namerna==2) {$namerna_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
if ($namerna==3) {$namerna_nad = $home_pf1; $met_verjetnost = rand(0, $homepf1_freethrow);}
if ($namerna==4) {$namerna_nad = $home_c1; $met_verjetnost = rand(0, $homec1_freethrow);}
}
else {$naredil_namerno = $home_c1; $home_c1_favli=$home_c1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $away_pg1; $met_verjetnost = rand(0, $awaypg1_freethrow);}
if ($namerna==1) {$namerna_nad = $away_sg1; $met_verjetnost = rand(0, $awaysg1_freethrow);}
if ($namerna==2) {$namerna_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
if ($namerna==3) {$namerna_nad = $away_pf1; $met_verjetnost = rand(0, $awaypf1_freethrow);}
if ($namerna==4) {$namerna_nad = $away_c1; $met_verjetnost = rand(0, $awayc1_freethrow);}
}
break;
}
//konec switcha v switchu

if ($met_verjetnost > 24) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+2; $mev=30; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$namerna_nad,$ekipazzogo,$naredil_namerno,$away_id,30,$taopis,'$eventime',2,$homescore,$awayscore)";
}
else {$awayscore = $awayscore+2; $mev=30; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$namerna_nad,$ekipazzogo,$naredil_namerno,$home_id,30,$taopis,'$eventime',2,$homescore,$awayscore)";
}
//vnos obeh prostih metov
$mev=14; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$namerna_nad,$ekipazzogo,0,0,14,$taopis,'$eventime',2,$homescore,$awayscore)";
}
elseif ($met_verjetnost > 9 AND $met_verjetnost < 25) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+1; $mev=30; shuffle($ddogodek[$mev]); $taopis =$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$namerna_nad,$ekipazzogo,$naredil_namerno,$away_id,30,$taopis,'$eventime',2,$homescore,$awayscore)";
}
else {$awayscore = $awayscore+1; $mev=30; shuffle($ddogodek[$mev]); $taopis =$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$namerna_nad,$ekipazzogo,$naredil_namerno,$home_id,30,$taopis,'$eventime',2,$homescore,$awayscore)";
}
//vnos prostega meta
$mev=15; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$namerna_nad,$ekipazzogo,0,0,15,$taopis,'$eventime',2,$homescore,$awayscore)";
}
else {
if ($ekipazzogo==$home_id) {$mev=30; shuffle($ddogodek[$mev]); $taopis =$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$namerna_nad,$ekipazzogo,$naredil_namerno,$away_id,30,$taopis,'$eventime',2,$homescore,$awayscore)";
}
else {$mev=30; shuffle($ddogodek[$mev]); $taopis =$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$namerna_nad,$ekipazzogo,$naredil_namerno,$home_id,30,$taopis,'$eventime',2,$homescore,$awayscore)";
}
//vnos zgresenih metov
$mev=16; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$namerna_nad,$ekipazzogo,0,0,16,$taopis,'$eventime',2,$homescore,$awayscore)";
}


if ($ekipazzogo==$home_id) {$teamwithball = $home_id;} else {$teamwithball = $away_id;}
}

if ($home_pg1_favli==5) {$bonusdosegel=0; $vengre=$home_pg1; $home_pg1=0; $home_pg1_favli = 0;}
if ($home_sg1_favli==5) {$bonusdosegel=1; $vengre=$home_sg1; $home_sg1=0; $home_sg1_favli = 0;}
if ($home_sf1_favli==5) {$bonusdosegel=2; $vengre=$home_sf1; $home_sf1=0; $home_sf1_favli = 0;}
if ($home_pf1_favli==5) {$bonusdosegel=3; $vengre=$home_pf1; $home_pf1=0; $home_pf1_favli = 0;}
if ($home_c1_favli==5) {$bonusdosegel=4; $vengre=$home_c1; $home_c1=0; $home_c1_favli = 0;}

if ($away_pg1_favli==5) {$bonusdosegel=5; $vengre=$away_pg1; $away_pg1=0; $away_pg1_favli = 0;}
if ($away_sg1_favli==5) {$bonusdosegel=6; $vengre=$away_sg1; $away_sg1=0; $away_sg1_favli = 0;}
if ($away_sf1_favli==5) {$bonusdosegel=7; $vengre=$away_sf1; $away_sf1=0; $away_sf1_favli = 0;}
if ($away_pf1_favli==5) {$bonusdosegel=8; $vengre=$away_pf1; $away_pf1=0; $away_pf1_favli = 0;}
if ($away_c1_favli==5) {$bonusdosegel=9; $vengre=$away_c1; $away_c1=0; $away_c1_favli = 0;}


//KONEC OSEBNIH NAPAK
break;


/* tu se zacne tretji primer, to je tisti izjemni - nadaljevan dogodek */
//dogodek po skoku

CASE 3:
$dogodek_po_skoku = rand(0,4);

//switch znotraj switcha
SWITCH (TRUE) {
CASE ($dogodek_po_skoku < 3):
//zogo dobijo nasprotniki
if ($ekipazzogo==$home_id) {$homescore = $homescore+2;  $home2zadeti=$home2zadeti+1; $teamwithball = $away_id;}
else {$awayscore = $awayscore+2; $away2zadeti=$away2zadeti+1; $teamwithball = $home_id;}
$nadaljevandogodek=0;
//vnos
$mev=27; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$nadaljuje_igralec,$ekipazzogo,0,0,27,$taopis,'$eventime',2,$homescore,$awayscore)";
break;

CASE ($dogodek_po_skoku > 2):

/* skok na odbito zogo */

if ($ekipazzogo==$home_id) {
$home2faljeni=$home2faljeni+1;
$tempskok = $homeoffskok + $awaydefskok;
$dobljenskok = rand(0,$tempskok);

$sestevek_skok_home = $homepg1_skok + $homesg1_skok + $homesf1_skok + $homepf1_skok + $homec1_skok;
$skakalec_home = rand(0,$sestevek_skok_home);
if ($skakalec_home <= $homepg1_skok) {$dobil_skok = $home_pg1;}
if ($skakalec_home > $homepg1_skok AND $skakalec_home <= ($homepg1_skok+$homesg1_skok)) {$dobil_skok = $home_sg1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok)) {$dobil_skok = $home_sf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$dobil_skok = $home_pf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$dobil_skok = $home_c1;}

$sestevek_skok_away = $awaypg1_skok + $awaysg1_skok + $awaysf1_skok + $awaypf1_skok + $awayc1_skok;
$skakalec_away = rand(0,$sestevek_skok_away);
if ($skakalec_away <= $awaypg1_skok) {$nasprotnik_skok = $away_pg1;}
if ($skakalec_away > $awaypg1_skok AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok)) {$nasprotnik_skok = $away_sg1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok)) {$nasprotnik_skok = $away_sf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$nasprotnik_skok = $away_pf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$nasprotnik_skok = $away_c1;}

if ($dobljenskok < $homeoffskok) {
$mev=29; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$nadaljuje_igralec,$ekipazzogo,$dobil_skok,$ekipazzogo,29,$taopis,'$eventime',2,$homescore,$awayscore)";
$teamwithball = $ekipazzogo;
$nadaljevandogodek=1;
$nadaljuje_igralec=$dobil_skok;
}
if ($dobljenskok >= $homeoffskok) {
$mev=28; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$nadaljuje_igralec,$ekipazzogo,$nasprotnik_skok,$away_id,28,$taopis,'$eventime',2,$homescore,$awayscore)";
$teamwithball = $away_id;
$nadaljevandogodek=0;
}
}

if ($ekipazzogo==$away_id) {
$away2faljeni=$away2faljeni+1;
$tempskok = $awayoffskok + $homedefskok;
$dobljenskok = rand(0,$tempskok);

$sestevek_skok_away = $awaypg1_skok + $awaysg1_skok + $awaysf1_skok + $awaypf1_skok + $awayc1_skok;
$skakalec_away = rand(0,$sestevek_skok_away);
if ($skakalec_away <= $awaypg1_skok) {$dobil_skok = $away_pg1;}
if ($skakalec_away > $awaypg1_skok AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok)) {$dobil_skok = $away_sg1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok)) {$dobil_skok = $away_sf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$dobil_skok = $away_pf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$dobil_skok = $away_c1;}

$sestevek_skok_home = $homepg1_skok + $homesg1_skok + $homesf1_skok + $homepf1_skok + $homec1_skok;
$skakalec_home = rand(0,$sestevek_skok_home);
if ($skakalec_home <= $homepg1_skok) {$nasprotnik_skok = $home_pg1;}
if ($skakalec_home > $homepg1_skok AND $skakalec_home <= ($homepg1_skok+$homesg1_skok)) {$nasprotnik_skok = $home_sg1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok)) {$nasprotnik_skok = $home_sf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$nasprotnik_skok = $home_pf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$nasprotnik_skok = $home_c1;}

if ($dobljenskok < $awayoffskok) {
$mev=29; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$nadaljuje_igralec,$ekipazzogo,$dobil_skok,$ekipazzogo,29,$taopis,'$eventime',2,$homescore,$awayscore)";
$teamwithball = $ekipazzogo;
$nadaljevandogodek=1;
$nadaljuje_igralec=$dobil_skok;
}
if ($dobljenskok >= $awayoffskok) {
$mev=28; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$nadaljuje_igralec,$ekipazzogo,$nasprotnik_skok,$home_id,28,$taopis,'$eventime',2,$homescore,$awayscore)";
$teamwithball = $home_id;
$nadaljevandogodek=0;
}
}
/* konec skoka */
break;


}
//konec switcha znotraj switcha


break;


/* cetrti primer, igralec ki je ukradel zogo krene v protinapad */

CASE 4:
$dogodek_po_kraji = rand(0,36);

//switch znotraj switcha
SWITCH (TRUE) {
CASE ($dogodek_po_kraji < 24):
//zogo dobijo nasprotniki
if ($ekipazzogo==$home_id) {$homescore = $homescore+2; $home2zadeti=$home2zadeti+1; $teamwithball = $away_id;}
else {$awayscore = $awayscore+2; $away2zadeti=$away2zadeti+1; $teamwithball = $home_id;}
$nadaljevandogodek=0;
//vnos
$mev=23; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$nadaljuje_igralc,$ekipazzogo,0,0,23,$taopis,'$eventime',2,$homescore,$awayscore)";
break;

CASE ($dogodek_po_kraji > 23 AND $dogodek_po_kraji < 27):
//zogo dobijo nasprotniki
if ($ekipazzogo==$home_id) {$homescore = $homescore+3; $teamwithball = $away_id;} else {$awayscore = $awayscore+3; $teamwithball = $home_id;}
$nadaljevandogodek=0;
//vnos
$mev=24; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$nadaljuje_igralc,$ekipazzogo,0,0,24,$taopis,'$eventime',2,$homescore,$awayscore)";
break;

CASE ($dogodek_po_kraji > 26 AND $dogodek_po_kraji < 32):
$nadaljevandogodek=0;
//vnos
$mev=25; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$nadaljuje_igralc,$ekipazzogo,0,0,25,$taopis,'$eventime',2,$homescore,$awayscore)";
break;

CASE ($dogodek_po_kraji > 31):
//zogo dobijo nasprotniki
if ($ekipazzogo==$home_id) {$home_noofTOs=$home_noofTOs+1; $teamwithball = $away_id;} else {$away_noofTOs=$away_noofTOs+1; $teamwithball = $home_id;}
$nadaljevandogodek=0;
//vnos
$mev=26; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$nadaljuje_igralc,$ekipazzogo,0,0,26,$taopis,'$eventime',2,$homescore,$awayscore)";
break;
}
//konec switcha znotraj switcha


//konec CELOTNEGA switcha za dogodek
break;
}

$randdd = $randdd + rand(19,25);
$eventime = date("Y-m-d H:i:s", mktime($dbhour,$dbmin+2,$dbsec+$randdd+30,$dbmonth,$dbday,$dbyear));
$stevilodogodkov1++;
}



/*
******************************************************************
**********************************************KONEC DRUGE CETRTINE
******************************************************************
*/
if ($dogodek != 6) {
$split = explode(" ", $eventime); $ndate = $split[0]; $ntime = $split[1];
$splitd = explode("-", $ndate); $nyear = $splitd[0]; $nmonth = $splitd[1]; $nday = $splitd[2];
$splitt = explode(":", $ntime); $nhour = $splitt[0]; $nmin = $splitt[1]; $nsec = $splitt[2];
$ihatime = date("Y-m-d H:i:s", mktime($nhour,$nmin,$nsec+8,$nmonth,$nday,$nyear));
$eventime = date("Y-m-d H:i:s", mktime($nhour,$nmin,$nsec+15,$nmonth,$nday,$nyear));
//OBRAMBA
if (($Hfouls > $Afouls) && ($awayscore < 46)) {
$mev=40; shuffle($ddogodek[$mev]); $vpob12=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,0,$home_id,0,$away_id,40,$vpob12,'$ihatime',2,$homescore,$awayscore)";
}
if (($Hfouls < $Afouls) && ($homescore < 46)) {
$mev=40; shuffle($ddogodek[$mev]); $vpob12=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,0,$away_id,0,$home_id,40,$vpob12,'$ihatime',2,$homescore,$awayscore)";
}
if (($Hfouls > $Afouls) && ($awayscore > 45)) {
$mev=41; shuffle($ddogodek[$mev]); $vpob12=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,0,$home_id,0,$away_id,41,$vpob12,'$ihatime',2,$homescore,$awayscore)";
}
if (($Hfouls < $Afouls) && ($homescore > 45)) {
$mev=41; shuffle($ddogodek[$mev]); $vpob12=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,0,$away_id,0,$home_id,41,$vpob12,'$ihatime',2,$homescore,$awayscore)";
}
//HALF-TIME
$mev=35; shuffle($ddogodek[$mev]); $p_opis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,0,0,0,0,35,$p_opis,'$eventime',2,$homescore,$awayscore)";
$split = explode(" ", $eventime); $ndate = $split[0]; $ntime = $split[1];
$splitd = explode("-", $ndate); $nyear = $splitd[0]; $nmonth = $splitd[1]; $nday = $splitd[2];
$splitt = explode(":", $ntime); $nhour = $splitt[0]; $nmin = $splitt[1]; $nsec = $splitt[2];
$eventime = date("Y-m-d H:i:s", mktime($nhour,$nmin+15,$nsec,$nmonth,$nday,$nyear));
//TO RATINGI
$hometoHT = round(1.6 * $homepg1_handling + 1.5 * $homepg1_passing + $homepg1_vision - 1.2 * $homepg1_fatigue + $homesg1_handling + 0.9 * $homesg1_passing + $homesg1_vision - 1.2 * $homesg1_fatigue + $homesf1_handling /2 + $homesf1_passing + $homesf1_vision - $homesf1_fatigue + $homepf1_passing /2 - 1.2 * $homepf1_fatigue - 1.2 * $homec1_fatigue - 1.5 * $awaypg1_defense - 1.5 * $awaysg1_defense - $awaysf1_defense - $awaypf1_defense /2);
$awaytoHT = round(1.6 * $awaypg1_handling + 1.5 * $awaypg1_passing + $awaypg1_vision - 1.2 * $awaypg1_fatigue + $awaysg1_handling + 0.9 * $awaysg1_passing + $awaysg1_vision - 1.2 * $awaysg1_fatigue + $awaysf1_handling /2 + $awaysf1_passing + $awaysf1_vision - $awaysf1_fatigue + $awaypf1_passing /2 - 1.2 * $awaypf1_fatigue - 1.2 * $awayc1_fatigue - 1.5 * $homepg1_defense - 1.5 * $homesg1_defense - $homesf1_defense - $homepf1_defense /2);
}
/*
******************************************************************
**********************************************KONEC DRUGE CETRTINE
******************************************************************
*/




//GLAVNA ZANKA
while ($stevilodogodkov2 < 41) {

if (!$homescore) {$homescore = 0;}
if (!$awayscore) {$awayscore = 0;}

//ekipa z zogo
if ($teamwithball=='') {$ekipazzogo = $home_id;} else {$ekipazzogo = $teamwithball;}

//dogodek ki se bo zgodil v tem eventu 
//FORMULA za verjetnost dogodka pri ekipi v napadu
$cetrtina=3;
if ($walkover != 14) {require('inc/nt_dogodek.php');}

//zacetek dogodka

switch ($dogodek) {

//prva moznost je met
CASE 0:
$kos = rand(0,$trojke);
if ($kos < 6) {

if ($ekipazzogo==$home_id) {
$fugaH = round((1 - $homesk2/$awaysk2 - (($home2zadeti/($home2zadeti+$home2faljeni)) - ($away2zadeti/($away2zadeti+$away2faljeni))))*10);
$fugaH = 0-$fugaH;
//echo "H".$fugaH."_";
$kdomece = rand(0,20);
//kasneje bi lahko uporabnik imel vpliv na to kdo vec mece
switch (TRUE) {
case ($kdomece < 6): $igralec_mece = $home_pg1; $posrecenzadve = rand($fugaH,$homepg1_za_dve); break;
case ($kdomece > 5 AND $kdomece < 12): $igralec_mece = $home_sg1; $posrecenzadve = rand($fugaH,$homesg1_za_dve); break;
case ($kdomece > 11 AND $kdomece < 15): $igralec_mece = $home_sf1; $posrecenzadve = rand($fugaH,$homesf1_za_dve); break;
case ($kdomece > 14 AND $kdomece < 18): $igralec_mece = $home_pf1; $posrecenzadve = rand($fugaH,$homepf1_za_dve); break;
case ($kdomece > 17): $igralec_mece = $home_c1; $posrecenzadve = rand($fugaH,$homec1_za_dve); break;
}
}
if ($ekipazzogo==$away_id) {
$fugaA = round((1 - $awaysk2/$homesk2 - (($away2zadeti/($away2zadeti+$away2faljeni)) - ($home2zadeti/($home2zadeti+$home2faljeni))))*10);
$fugaA = 0-$fugaA;
//echo "A".$fugaA."_";
$kdomece = rand(0,20);
switch (TRUE) {
case ($kdomece < 6): $igralec_mece = $away_pg1; $posrecenzadve = rand($fugaA,$awaypg1_za_dve); break;
case ($kdomece > 5 AND $kdomece < 12): $igralec_mece = $away_sg1; $posrecenzadve = rand($fugaA,$awaysg1_za_dve); break;
case ($kdomece > 11 AND $kdomece < 15): $igralec_mece = $away_sf1; $posrecenzadve = rand($fugaA,$awaysf1_za_dve); break;
case ($kdomece > 14 AND $kdomece < 18): $igralec_mece = $away_pf1; $posrecenzadve = rand($fugaA,$awaypf1_za_dve); break;
case ($kdomece > 17): $igralec_mece = $away_c1; $posrecenzadve = rand($fugaA,$awayc1_za_dve); break;
}
}


if ($posrecenzadve < 29) {
//zadet met

if ($ekipazzogo==$home_id) {
//podajalec
$domace_podaje = $homepg1_passing + $homesg1_passing + $homesf1_passing + $homepf1_passing + $homec1_passing;
$podaja = rand(0, $domace_podaje);
if ($podaja < $homepg1_passing AND $home_pg1 != $igralec_mece) {
$podajalec = $home_pg1;
}
elseif ($podaja >= $homepg1_passing AND $podaja < ($homepg1_passing+$homesg1_passing) AND $home_sg1 != $igralec_mece) {
$podajalec = $home_sg1;
}
elseif ($podaja >= ($homepg1_passing+$homesg1_passing) AND $podaja < ($homepg1_passing+$homesg1_passing+$homesf1_passing) AND $home_sf1 != $igralec_mece) {
$podajalec = $home_sf1;
}
elseif ($podaja >= ($homepg1_passing+$homesg1_passing+$homesf1_passing) AND $podaja < ($homepg1_passing+$homesg1_passing+$homesf1_passing+$homepf1_passing) AND $home_pf1 != $igralec_mece) {
$podajalec = $home_pf1;
}
elseif ($podaja >= ($homepg1_passing+$homesg1_passing+$homesf1_passing+$homepf1_passing) AND $home_c1 != $igralec_mece) {
$podajalec = $home_c1;
}
else {$podajalec=0;}


}
else
//kos so dali gostje
{
//podajalec
$gostujoce_podaje = $awaypg1_passing + $awaysg1_passing + $awaysf1_passing + $awaypf1_passing + $awayc1_passing;
$podaja = rand(0, $gostujoce_podaje);
if ($podaja < $awaypg1_passing AND $away_pg1 != $igralec_mece) {$podajalec = $away_pg1;}
elseif ($podaja >= $awaypg1_passing AND $podaja < ($awaypg1_passing+$awaysg1_passing) AND $away_sg1 != $igralec_mece) {$podajalec = $away_sg1;}
elseif ($podaja >= ($awaypg1_passing+$awaysg1_passing) AND $podaja < ($awaypg1_passing+$awaysg1_passing+$awaysf1_passing) AND $away_sf1 != $igralec_mece) {$podajalec = $away_sf1;}
elseif ($podaja >= ($awaypg1_passing+$awaysg1_passing+$awaysf1_passing) AND $podaja < ($awaypg1_passing+$awaysg1_passing+$awaysf1_passing+$awaypf1_passing) AND $away_pf1 != $igralec_mece) {$podajalec = $away_pf1;}
elseif ($podaja >= ($awaypg1_passing+$awaysg1_passing+$awaysf1_passing+$awaypf1_passing) AND $away_c1 != $igralec_mece) {$podajalec = $away_c1;}
else {$podajalec=0;}

}

if ($ekipazzogo==$home_id) {$homescore = $homescore+2; $home2zadeti=$home2zadeti+1; $teamwithball = $away_id; $nadaljevandogodek=0;}
else {$awayscore = $awayscore+2; $away2zadeti=$away2zadeti+1; $teamwithball = $home_id; $nadaljevandogodek=0;}


//vnos
if ($podajalec==0) {$mev=2; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,0,0,2,$taopis,'$eventime',3,$homescore,$awayscore)";}
else {$mev=1; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$podajalec,$ekipazzogo,1,$taopis,'$eventime',3,$homescore,$awayscore)";}


}
//konec zadetega meta za dve
//sledi blokada, kdo jo napravi trenutno ni odvisno od skilov
if ($posrecenzadve > 28 AND $posrecenzadve < 32) {
if ($ekipazzogo==$home_id) {$home2faljeni=$home2faljeni+1;
$banana = rand(0,2);
if ($banana==0) {$kdo_blokira = $away_sf1;}
if ($banana==1) {$kdo_blokira = $away_pf1;}
if ($banana==2) {$kdo_blokira = $away_c1;}
}
else {$away2faljeni=$away2faljeni+1;
$banana = rand(0,2);
if ($banana==0) {$kdo_blokira = $home_sf1;}
if ($banana==1) {$kdo_blokira = $home_pf1;}
if ($banana==2) {$kdo_blokira = $home_c1;}
}
if ($ekipazzogo==$home_id) {
//vnos
$mev=31; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$kdo_blokira,$away_id,31,$taopis,'$eventime',3,$homescore,$awayscore)";

$teamwithball = $home_id;
$nadaljevandogodek=0;
}
else {
//vnos
$mev=31; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$kdo_blokira,$home_id,31,$taopis,'$eventime',3,$homescore,$awayscore)";

$teamwithball = $away_id;
$nadaljevandogodek=0;
}


}
//konec blokade
//sledi faljen met
if ($posrecenzadve > 31) {

/* skok na odbito zogo */

if ($ekipazzogo==$home_id) {
$home2faljeni=$home2faljeni+1;
$tempskok = $homeoffskok + $awaydefskok;
$dobljenskok = rand(0,$tempskok);

$sestevek_skok_home = $homepg1_skok + $homesg1_skok + $homesf1_skok + $homepf1_skok + $homec1_skok;
$skakalec_home = rand(0,$sestevek_skok_home);
if ($skakalec_home <= $homepg1_skok) {$dobil_skok = $home_pg1;}
if ($skakalec_home > $homepg1_skok AND $skakalec_home <= ($homepg1_skok+$homesg1_skok)) {$dobil_skok = $home_sg1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok)) {$dobil_skok = $home_sf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$dobil_skok = $home_pf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$dobil_skok = $home_c1;}

$sestevek_skok_away = $awaypg1_skok + $awaysg1_skok + $awaysf1_skok + $awaypf1_skok + $awayc1_skok;
$skakalec_away = rand(0,$sestevek_skok_away);
if ($skakalec_away <= $awaypg1_skok) {$nasprotnik_skok = $away_pg1;}
if ($skakalec_away > $awaypg1_skok AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok)) {$nasprotnik_skok = $away_sg1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok)) {$nasprotnik_skok = $away_sf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$nasprotnik_skok = $away_pf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$nasprotnik_skok = $away_c1;}

if ($dobljenskok < $homeoffskok) {
$mev=3; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$dobil_skok,$ekipazzogo,3,$taopis,'$eventime',3,$homescore,$awayscore)";
$teamwithball = $ekipazzogo;
$nadaljevandogodek=1;
$nadaljuje_igralec=$dobil_skok;
}
if ($dobljenskok >= $homeoffskok) {
$mev=4; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$nasprotnik_skok,$away_id,4,$taopis,'$eventime',3,$homescore,$awayscore)";
$teamwithball = $away_id;
$nadaljevandogodek=0;
}
}

if ($ekipazzogo==$away_id) {
$away2faljeni=$away2faljeni+1;
$tempskok = $awayoffskok + $homedefskok;
$dobljenskok = rand(0,$tempskok);

$sestevek_skok_away = $awaypg1_skok + $awaysg1_skok + $awaysf1_skok + $awaypf1_skok + $awayc1_skok;
$skakalec_away = rand(0,$sestevek_skok_away);
if ($skakalec_away <= $awaypg1_skok) {$dobil_skok = $away_pg1;}
if ($skakalec_away > $awaypg1_skok AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok)) {$dobil_skok = $away_sg1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok)) {$dobil_skok = $away_sf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$dobil_skok = $away_pf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$dobil_skok = $away_c1;}

$sestevek_skok_home = $homepg1_skok + $homesg1_skok + $homesf1_skok + $homepf1_skok + $homec1_skok;
$skakalec_home = rand(0,$sestevek_skok_home);
if ($skakalec_home <= $homepg1_skok) {$nasprotnik_skok = $home_pg1;}
if ($skakalec_home > $homepg1_skok AND $skakalec_home <= ($homepg1_skok+$homesg1_skok)) {$nasprotnik_skok = $home_sg1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok)) {$nasprotnik_skok = $home_sf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$nasprotnik_skok = $home_pf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$nasprotnik_skok = $home_c1;}

if ($dobljenskok < $awayoffskok) {
$mev=3; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$dobil_skok,$ekipazzogo,3,$taopis,'$eventime',3,$homescore,$awayscore)";
$teamwithball = $ekipazzogo;
$nadaljevandogodek=1;
$nadaljuje_igralec=$dobil_skok;
}
if ($dobljenskok >= $awayoffskok) {
$mev=4; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$nasprotnik_skok,$home_id,4,$taopis,'$eventime',3,$homescore,$awayscore)";
$teamwithball = $home_id;
$nadaljevandogodek=0;
}
}
}
}
if ($kos > 5) {
if ($ekipazzogo==$home_id) {
$kdomece = rand(0,11);
switch (TRUE) {
case ($kdomece < 4): $igralec_mece = $home_pg1; $posrecenzatri = rand(0,$homepg1_za_tri); break;
case ($kdomece > 3 AND $kdomece < 9): $igralec_mece = $home_sg1; $posrecenzatri = rand(0,$homesg1_za_tri); break;
case ($kdomece > 8 AND $kdomece < 11): $igralec_mece = $home_sf1; $posrecenzatri = rand(0,$homesf1_za_tri); break;
case ($kdomece==11): $igralec_mece = $home_pf1; $posrecenzatri = rand(0,$homepf1_za_tri); break;
}
}

if ($ekipazzogo==$away_id) {
$kdomece = rand(0,11);
switch (TRUE) {
case ($kdomece < 4): $igralec_mece = $away_pg1; $posrecenzatri = rand(0,$awaypg1_za_tri); break;
case ($kdomece > 3 AND $kdomece < 9): $igralec_mece = $away_sg1; $posrecenzatri = rand(0,$awaysg1_za_tri); break;
case ($kdomece > 8 AND $kdomece < 11): $igralec_mece = $away_sf1; $posrecenzatri = rand(0,$awaysf1_za_tri); break;
case ($kdomece==11): $igralec_mece = $away_pf1; $posrecenzatri = rand(0,$awaypf1_za_tri); break;
}
}

if ($posrecenzatri < 5) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+3; $teamwithball = $away_id; $nadaljevandogodek=0;}
else {$awayscore = $awayscore+3; $teamwithball = $home_id; $nadaljevandogodek=0;}
//vpis
$mev=7; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,0,0,7,$taopis,'$eventime',3,$homescore,$awayscore)";

}
if ($posrecenzatri > 4) {

/* skok na odbito zogo */

if ($ekipazzogo==$home_id) {
$tempskok = $homeoffskok + $awaydefskok;
$dobljenskok = rand(0,$tempskok);

$sestevek_skok_home = $homepg1_skok + $homesg1_skok + $homesf1_skok + $homepf1_skok + $homec1_skok;
$skakalec_home = rand(0,$sestevek_skok_home);
if ($skakalec_home <= $homepg1_skok) {$dobil_skok = $home_pg1;}
if ($skakalec_home > $homepg1_skok AND $skakalec_home <= ($homepg1_skok+$homesg1_skok)) {$dobil_skok = $home_sg1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok)) {$dobil_skok = $home_sf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$dobil_skok = $home_pf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$dobil_skok = $home_c1;}

$sestevek_skok_away = $awaypg1_skok + $awaysg1_skok + $awaysf1_skok + $awaypf1_skok + $awayc1_skok;
$skakalec_away = rand(0,$sestevek_skok_away);
if ($skakalec_away <= $awaypg1_skok) {$nasprotnik_skok = $away_pg1;}
if ($skakalec_away > $awaypg1_skok AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok)) {$nasprotnik_skok = $away_sg1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok)) {$nasprotnik_skok = $away_sf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$nasprotnik_skok = $away_pf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$nasprotnik_skok = $away_c1;}

if ($dobljenskok < $homeoffskok) {
$mev=8; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$dobil_skok,$ekipazzogo,8,$taopis,'$eventime',3,$homescore,$awayscore)";
$teamwithball = $ekipazzogo;
$nadaljevandogodek=1;
$nadaljuje_igralec=$dobil_skok;
}
if ($dobljenskok >= $homeoffskok) {
$mev=9; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$nasprotnik_skok,$away_id,9,$taopis,'$eventime',3,$homescore,$awayscore)";
$teamwithball = $away_id;
$nadaljevandogodek=0;
}
}

if ($ekipazzogo==$away_id) {
$tempskok = $awayoffskok + $homedefskok;
$dobljenskok = rand(0,$tempskok);

$sestevek_skok_away = $awaypg1_skok + $awaysg1_skok + $awaysf1_skok + $awaypf1_skok + $awayc1_skok;
$skakalec_away = rand(0,$sestevek_skok_away);
if ($skakalec_away <= $awaypg1_skok) {$dobil_skok = $away_pg1;}
if ($skakalec_away > $awaypg1_skok AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok)) {$dobil_skok = $away_sg1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok)) {$dobil_skok = $away_sf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$dobil_skok = $away_pf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$dobil_skok = $away_c1;}

$sestevek_skok_home = $homepg1_skok + $homesg1_skok + $homesf1_skok + $homepf1_skok + $homec1_skok;
$skakalec_home = rand(0,$sestevek_skok_home);
if ($skakalec_home <= $homepg1_skok) {$nasprotnik_skok = $home_pg1;}
if ($skakalec_home > $homepg1_skok AND $skakalec_home <= ($homepg1_skok+$homesg1_skok)) {$nasprotnik_skok = $home_sg1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok)) {$nasprotnik_skok = $home_sf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$nasprotnik_skok = $home_pf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$nasprotnik_skok = $home_c1;}

if ($dobljenskok < $awayoffskok) {
$mev=8; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$dobil_skok,$ekipazzogo,8,$taopis,'$eventime',3,$homescore,$awayscore)";
$teamwithball = $ekipazzogo;
$nadaljevandogodek=1;
$nadaljuje_igralec=$dobil_skok;
}
if ($dobljenskok >= $awayoffskok) {
$mev=9; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$nasprotnik_skok,$home_id,9,$taopis,'$eventime',3,$homescore,$awayscore)";
$teamwithball = $home_id;
$nadaljevandogodek=0;
}
}
}

}
break;

/*
******************************************************************
*/

CASE 1:

/* druga moznost je IZGUBLJENA ZOGA */

//najprej me zanima kdo je izgubil zogo

$home_izgubil = $homepg1_napaka + $homesg1_napaka + $homesf1_napaka + $homepf1_napaka + $homec1_napaka;
$away_izgubil = $awaypg1_napaka + $awaysg1_napaka + $awaysf1_napaka + $awaypf1_napaka + $awayc1_napaka;

if ($ekipazzogo==$home_id) {
$narejena_napaka = rand(0, $home_izgubil);
if ($narejena_napaka < $homepg1_napaka) {$naredil_napako = $home_pg1;}
if ($narejena_napaka >= $homepg1_napaka AND $narejena_napaka < ($homepg1_napaka+$homesg1_napaka)) {$naredil_napako = $home_sg1;}
if ($narejena_napaka >= ($homepg1_napaka+$homesg1_napaka) AND $narejena_napaka < ($homepg1_napaka+$homesg1_napaka+$homesf1_napaka)) {$naredil_napako = $home_sf1;}
if ($narejena_napaka >= ($homepg1_napaka+$homesg1_napaka+$homesf1_napaka) AND $narejena_napaka < ($homepg1_napaka+$homesg1_napaka+$homesf1_napaka+$homepf1_napaka)) {$naredil_napako = $home_pf1;}
if ($narejena_napaka >= ($homepg1_napaka+$homesg1_napaka+$homesf1_napaka+$homepf1_napaka)) {$naredil_napako = $home_c1;}

} else {

$narejena_napaka = rand(0, $away_izgubil);
if ($narejena_napaka < $awaypg1_napaka) {$naredil_napako = $away_pg1;}
if ($narejena_napaka >= $awaypg1_napaka AND $narejena_napaka < ($awaypg1_napaka+$awaysg1_napaka)) {$naredil_napako = $away_sg1;}
if ($narejena_napaka >= ($awaypg1_napaka+$awaysg1_napaka) AND $narejena_napaka < ($awaypg1_napaka+$awaysg1_napaka+$awaysf1_napaka)) {$naredil_napako = $away_sf1;}
if ($narejena_napaka >= ($awaypg1_napaka+$awaysg1_napaka+$awaysf1_napaka) AND $narejena_napaka < ($awaypg1_napaka+$awaysg1_napaka+$awaysf1_napaka+$awaypf1_napaka)) {$naredil_napako = $away_pf1;}
if ($narejena_napaka >= ($awaypg1_napaka+$awaysg1_napaka+$awaysf1_napaka+$awaypf1_napaka)) {$naredil_napako = $away_c1;}

}

//konec ugotovitev gleda tega kdo je naredil napako

$zgubljena = rand(0,45);
if ($zgubljena < 29) {
//vnos
$mev=5; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$naredil_napako,$ekipazzogo,0,0,5,$taopis,'$eventime',3,$homescore,$awayscore)";

if ($ekipazzogo==$home_id) {$teamwithball = $away_id; $nadaljevandogodek=0;}
else {$teamwithball = $home_id; $nadaljevandogodek=0;}

}

if ($zgubljena > 28) {
//UKRADENA zoga - najprej me zanima kdo je ukradel zogo

$home_kraja = $homepg1_kraja + $homesg1_kraja + $homesf1_kraja + $homepf1_kraja + $homec1_kraja;
$away_kraja = $awaypg1_kraja + $awaysg1_kraja + $awaysf1_kraja + $awaypf1_kraja + $awayc1_kraja;

if ($ekipazzogo==$away_id) {
$ukradena_z = rand(0, $home_kraja);
if ($ukradena_z < $homepg1_kraja) {$ukradel_zogo = $home_pg1;}
if ($ukradena_z >= $homepg1_kraja AND $narejena_kraja < ($homepg1_kraja+$homesg1_kraja)) {$ukradel_zogo = $home_sg1;}
if ($ukradena_z >= ($homepg1_kraja+$homesg1_kraja) AND $narejena_kraja < ($homepg1_kraja+$homesg1_kraja+$homesf1_kraja)) {$ukradel_zogo = $home_sf1;}
if ($ukradena_z >= ($homepg1_kraja+$homesg1_kraja+$homesf1_kraja) AND $narejena_kraja < ($homepg1_kraja+$homesg1_kraja+$homesf1_kraja+$homepf1_kraja)) {$ukradel_zogo = $home_pf1;}
if ($ukradena_z >= ($homepg1_kraja+$homesg1_kraja+$homesf1_kraja+$homepf1_kraja)) {$ukradel_zogo = $home_c1;}

} else {

$ukradena_z = rand(0, $away_kraja);
if ($ukradena_z < $awaypg1_kraja) {$ukradel_zogo = $away_pg1;}
if ($ukradena_z >= $awaypg1_kraja AND $narejena_kraja < ($awaypg1_kraja+$awaysg1_kraja)) {$ukradel_zogo = $away_sg1;}
if ($ukradena_z >= ($awaypg1_kraja+$awaysg1_kraja) AND $narejena_kraja < ($awaypg1_kraja+$awaysg1_kraja+$awaysf1_kraja)) {$ukradel_zogo = $away_sf1;}
if ($ukradena_z >= ($awaypg1_kraja+$awaysg1_kraja+$awaysf1_kraja) AND $narejena_kraja < ($awaypg1_kraja+$awaysg1_kraja+$awaysf1_kraja+$awaypf1_kraja)) {$ukradel_zogo = $away_pf1;}
if ($ukradena_z >= ($awaypg1_kraja+$awaysg1_kraja+$awaysf1_kraja+$awaypf1_kraja)) {$ukradel_zogo = $away_c1;}

}
//konec ugotovitev gleda tega kdo je ukradel zogo


if ($ekipazzogo==$home_id) {
//vnos
$mev=6; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$naredil_napako,$ekipazzogo,$ukradel_zogo,$away_id,6,$taopis,'$eventime',3,$homescore,$awayscore)";

$teamwithball = $away_id;
$nadaljevandogodek=2;
$nadaljuje_igralc=$ukradel_zogo;
}
else {
//vnos
$mev=6; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$naredil_napako,$ekipazzogo,$ukradel_zogo,$home_id,6,$taopis,'$eventime',3,$homescore,$awayscore)";

$teamwithball = $home_id;
$nadaljevandogodek=2;
$nadaljuje_igralc=$ukradel_zogo;
}

}
break;

/*
***********************************
* tretja moznost je osebna napaka *
***********************************
*/

CASE 2:

$osebna = rand(0,19);
if ($osebna < 17) {
//najprej me zanima kdo je naredil osebno v obrambi in nad kom

$home_osebna_obramba = $homepg1_v_obrambi + $homesg1_v_obrambi + $homesf1_v_obrambi + $homepf1_v_obrambi + $homec1_v_obrambi;
$away_osebna_obramba = $awaypg1_v_obrambi + $awaysg1_v_obrambi + $awaysf1_v_obrambi + $awaypf1_v_obrambi + $awayc1_v_obrambi;

if ($ekipazzogo==$away_id) {

$osebna_obramba = rand(0, $home_osebna_obramba);
if ($osebna_obramba < $homepg1_v_obrambi) {
$favlal_v_obrambi = $home_pg1; $home_pg1_favli=$home_pg1_favli+1;
$pofavlan = rand(0,2);
if ($pofavlan==0) {$favl_nad = $away_pg1; $met_verjetnost = rand(0, $awaypg1_freethrow);}
if ($pofavlan==1) {$favl_nad = $away_sg1; $met_verjetnost = rand(0, $awaysg1_freethrow);}
if ($pofavlan==2) {$favl_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
}
if ($osebna_obramba >= $homepg1_v_obrambi AND $osebna_obramba < ($homepg1_v_obrambi+$homesg1_v_obrambi)) {
$favlal_v_obrambi = $home_sg1; $home_sg1_favli=$home_sg1_favli+1;
$pofavlan = rand(0,3);
if ($pofavlan==0) {$favl_nad = $away_pg1; $met_verjetnost = rand(0, $awaypg1_freethrow);}
if ($pofavlan==1) {$favl_nad = $away_sg1; $met_verjetnost = rand(0, $awaysg1_freethrow);}
if ($pofavlan==2) {$favl_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
if ($pofavlan==3) {$favl_nad = $away_pf1; $met_verjetnost = rand(0, $awaypf1_freethrow);}
}
if ($osebna_obramba >= ($homepg1_v_obrambi+$homesg1_v_obrambi) AND $osebna_obramba < ($homepg1_v_obrambi+$homesg1_v_obrambi+$homesf1_v_obrambi)) {
$favlal_v_obrambi = $home_sf1; $home_sf1_favli=$home_sf1_favli+1;
$pofavlan = rand(0,4);
if ($pofavlan==0) {$favl_nad = $away_pg1; $met_verjetnost = rand(0, $awaypg1_freethrow);}
if ($pofavlan==1) {$favl_nad = $away_sg1; $met_verjetnost = rand(0, $awaysg1_freethrow);}
if ($pofavlan==2) {$favl_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
if ($pofavlan==3) {$favl_nad = $away_pf1; $met_verjetnost = rand(0, $awaypf1_freethrow);}
if ($pofavlan==4) {$favl_nad = $away_c1; $met_verjetnost = rand(0, $awayc1_freethrow);}
}
if ($osebna_obramba >= ($homepg1_v_obrambi+$homesg1_v_obrambi+$homesf1_v_obrambi) AND $osebna_obramba < ($homepg1_v_obrambi+$homesg1_v_obrambi+$homesf1_v_obrambi+$homepf1_v_obrambi)) {
$favlal_v_obrambi = $home_pf1; $home_pf1_favli=$home_pf1_favli+1;
$pofavlan = rand(0,3);
if ($pofavlan==0) {$favl_nad = $away_sg1; $met_verjetnost = rand(0, $awaysg1_freethrow);}
if ($pofavlan==1) {$favl_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
if ($pofavlan==2) {$favl_nad = $away_pf1; $met_verjetnost = rand(0, $awaypf1_freethrow);}
if ($pofavlan==3) {$favl_nad = $away_c1; $met_verjetnost = rand(0, $awayc1_freethrow);}
}
if ($osebna_obramba >= ($homepg1_v_obrambi+$homesg1_v_obrambi+$homesf1_v_obrambi+$homepf1_v_obrambi)) {
$favlal_v_obrambi = $home_c1; $home_c1_favli=$home_c1_favli+1;
$pofavlan = rand(0,2);
if ($pofavlan==0) {$favl_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
if ($pofavlan==1) {$favl_nad = $away_pf1; $met_verjetnost = rand(0, $awaypf1_freethrow);}
if ($pofavlan==2) {$favl_nad = $away_c1; $met_verjetnost = rand(0, $awayc1_freethrow);}
}

} else {

$osebna_obramba = rand(0, $away_osebna_obramba);
if ($osebna_obramba < $awaypg1_v_obrambi) {
$favlal_v_obrambi = $away_pg1; $away_pg1_favli=$away_pg1_favli+1;
$pofavlan = rand(0,2);
if ($pofavlan==0) {$favl_nad = $home_pg1; $met_verjetnost = rand(0, $homepg1_freethrow);}
if ($pofavlan==1) {$favl_nad = $home_sg1; $met_verjetnost = rand(0, $homesg1_freethrow);}
if ($pofavlan==2) {$favl_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
}
if ($osebna_obramba >= $awaypg1_v_obrambi AND $osebna_obramba < ($awaypg1_v_obrambi+$awaysg1_v_obrambi)) {
$favlal_v_obrambi = $away_sg1; $away_sg1_favli=$away_sg1_favli+1;
$pofavlan = rand(0,3);
if ($pofavlan==0) {$favl_nad = $home_pg1; $met_verjetnost = rand(0, $homepg1_freethrow);}
if ($pofavlan==1) {$favl_nad = $home_sg1; $met_verjetnost = rand(0, $homesg1_freethrow);}
if ($pofavlan==2) {$favl_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
if ($pofavlan==3) {$favl_nad = $home_pf1; $met_verjetnost = rand(0, $homepf1_freethrow);}
}
if ($osebna_obramba >= ($awaypg1_v_obrambi+$awaysg1_v_obrambi) AND $osebna_obramba < 
($awaypg1_v_obrambi+$awaysg1_v_obrambi+$awaysf1_v_obrambi)) {
$favlal_v_obrambi = $away_sf1; $away_sf1_favli=$away_sf1_favli+1;
$pofavlan = rand(0,4);
if ($pofavlan==0) {$favl_nad = $home_pg1; $met_verjetnost = rand(0, $homepg1_freethrow);}
if ($pofavlan==1) {$favl_nad = $home_sg1; $met_verjetnost = rand(0, $homesg1_freethrow);}
if ($pofavlan==2) {$favl_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
if ($pofavlan==3) {$favl_nad = $home_pf1; $met_verjetnost = rand(0, $homepf1_freethrow);}
if ($pofavlan==4) {$favl_nad = $home_c1; $met_verjetnost = rand(0, $homec1_freethrow);}
}
if ($osebna_obramba >= ($awaypg1_v_obrambi+$awaysg1_v_obrambi+$awaysf1_v_obrambi) AND $osebna_obramba < ($awaypg1_v_obrambi+$awaysg1_v_obrambi+$awaysf1_v_obrambi+$awaypf1_v_obrambi)) {
$favlal_v_obrambi = $away_pf1; $away_pf1_favli=$away_pf1_favli+1;
$pofavlan = rand(0,3);
if ($pofavlan==0) {$favl_nad = $home_sg1; $met_verjetnost = rand(0, $homesg1_freethrow);}
if ($pofavlan==1) {$favl_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
if ($pofavlan==2) {$favl_nad = $home_pf1; $met_verjetnost = rand(0, $homepf1_freethrow);}
if ($pofavlan==3) {$favl_nad = $home_c1; $met_verjetnost = rand(0, $homec1_freethrow);}
}
if ($osebna_obramba >= ($awaypg1_v_obrambi+$awaysg1_v_obrambi+$awaysf1_v_obrambi+$awaypf1_v_obrambi)) {
$favlal_v_obrambi = $away_c1; $away_c1_favli=$away_c1_favli+1;
$pofavlan = rand(0,2);
if ($pofavlan==0) {$favl_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
if ($pofavlan==1) {$favl_nad = $home_pf1; $met_verjetnost = rand(0, $homepf1_freethrow);}
if ($pofavlan==2) {$favl_nad = $home_c1; $met_verjetnost = rand(0, $homec1_freethrow);}
}

}
//konec ugotovitev gleda tega kdo je naredil osebno v obrambi
}

if ($osebna < 11) {

//preksrsek ob metu za dve in dva prosta meta
//vnos prekrska
$mev=10; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
if ($ekipazzogo==$home_id) {$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,$favlal_v_obrambi,$away_id,10,$taopis,'$eventime',3,$homescore,$awayscore)";}
else {$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,$favlal_v_obrambi,$home_id,10,$taopis,'$eventime',3,$homescore,$awayscore)";}

if ($met_verjetnost > 25) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+2;} else {$awayscore = $awayscore+2;}
//vnos
$mev=14; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,14,$taopis,'$eventime',3,$homescore,$awayscore)";
}
elseif ($met_verjetnost > 10 AND $met_verjetnost < 26) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+1;} else {$awayscore = $awayscore+1;}
//vnos
$mev=15; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,15,$taopis,'$eventime',3,$homescore,$awayscore)";
}
else {
//vnos
$mev=16; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,16,$taopis,'$eventime',3,$homescore,$awayscore)";
}
//konec dveh prostih metov, kasneje se lahko dodajo skoki
if ($ekipazzogo==$home_id) {$teamwithball = $away_id;} else {$teamwithball = $home_id;}

}

if ($osebna > 10 AND $osebna < 13) {

//prekrsek ob metu za tri in trije prosti meti
//vnos prekrska
$mev=11; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
if ($ekipazzogo==$home_id) {$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,$favlal_v_obrambi,$away_id,11,$taopis,'$eventime',3,$homescore,$awayscore)";
} else {$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,$favlal_v_obrambi,$home_id,11,$taopis,'$eventime',3,$homescore,$awayscore)";
}

//koliko od treh je bilo zadetih
if ($met_verjetnost > 25) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+3;} else {$awayscore = $awayscore+3;}
//vnos
$mev=17; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,17,$taopis,'$eventime',3,$homescore,$awayscore)";
}
elseif ($met_verjetnost > 15 AND $met_verjetnost < 26) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+2;} else {$awayscore = $awayscore+2;}
//vnos
$mev=18; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,18,$taopis,'$eventime',3,$homescore,$awayscore)";
}
elseif ($met_verjetnost > 7 AND $met_verjetnost < 16) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+1;} else {$awayscore = $awayscore+1;}
//vnos
$mev=19; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,19,$taopis,'$eventime',3,$homescore,$awayscore)";
}
else {
//vnos
$mev=20; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,20,$taopis,'$eventime',3,$homescore,$awayscore)";
}
//konec treh prostih metov, kasneje se lahko dodajo skoki
if ($ekipazzogo==$home_id) {$teamwithball = $away_id;} else {$teamwithball = $home_id;}

}

if ($osebna > 12 AND $osebna < 16) {

//zadet kos in dodatni met
//vnos zadetka in prekrska
$mev=12; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
if ($ekipazzogo==$home_id) {
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,$favlal_v_obrambi,$away_id,12,$taopis,'$eventime',3,$homescore+2,$awayscore)"; $home2zadeti=$home2zadeti+1;}
else {$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,$favlal_v_obrambi,$home_id,12,$taopis,'$eventime',3,$homescore,$awayscore+2)"; $away2zadeti=$away2zadeti+1;}

if ($met_verjetnost > 23) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+3;} else {$awayscore = $awayscore+3;}
//vnos
$mev=21; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,21,$taopis,'$eventime',3,$homescore,$awayscore)";
}
else {
if ($ekipazzogo==$home_id) {$homescore = $homescore+2;} else {$awayscore = $awayscore+2;}
//vnos
$mev=22; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,22,$taopis,'$eventime',3,$homescore,$awayscore)";
}
//konec dodatnega meta, kasneje dodam skok
if ($ekipazzogo==$home_id) {$teamwithball = $away_id;} else {$teamwithball = $home_id;}

}
if ($osebna==16) {

//zadeta trojka in dodatni met
//vnos zadetka in prekrska
$mev=13; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
if ($ekipazzogo==$home_id) {$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,$favlal_v_obrambi,$away_id,13,$taopis,'$eventime',3,$homescore+3,$awayscore)";}
else {$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,$favlal_v_obrambi,$home_id,13,$taopis,'$eventime',3,$homescore,$awayscore+3)";}

if ($met_verjetnost > 22) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+4;} else {$awayscore = $awayscore+4;}
//vnos
$mev=21; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,21,$taopis,'$eventime',3,$homescore,$awayscore)";
}
else {
if ($ekipazzogo==$home_id) {$homescore = $homescore+3;} else {$awayscore = $awayscore+3;}
//vnos
$mev=22; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,22,$taopis,'$eventime',3,$homescore,$awayscore)";
}
//konec dodatnega meta, kasneje dodam skok
if ($ekipazzogo==$home_id) {$teamwithball = $away_id;} else {$teamwithball = $home_id;}

}

if ($osebna > 16 AND $osebna < 19) {

//OSEBNA V NAPADU

$home_osebna_napad = $homepg1_v_napadu + $homesg1_v_napadu + $homesf1_v_napadu + $homepf1_v_napadu + $homec1_v_napadu;
$away_osebna_napad = $awaypg1_v_napadu + $awaysg1_v_napadu + $awaysf1_v_napadu + $awaypf1_v_napadu + $awayc1_v_napadu;

if ($ekipazzogo==$home_id) {

$osebna_napad = rand(0, $home_osebna_napad);
if ($osebna_napad < $homepg1_v_napadu) {$favlal_v_napadu = $home_pg1; $home_pg1_favli=$home_pg1_favli+1;}
if ($osebna_napad >= $homepg1_v_napadu AND $osebna_napad < ($homepg1_v_napadu+$homesg1_v_napadu)) {$favlal_v_napadu = $home_sg1; $home_sg1_favli=$home_sg1_favli+1;}
if ($osebna_napad >= ($homepg1_v_napadu+$homesg1_v_napadu) AND $osebna_napad < ($homepg1_v_napadu+$homesg1_v_napadu+$homesf1_v_napadu)) {$favlal_v_napadu = $home_sf1; $home_sf1_favli=$home_sf1_favli+1;}
if ($osebna_napad >= ($homepg1_v_napadu+$homesg1_v_napadu+$homesf1_v_napadu) AND $osebna_napad < ($homepg1_v_napadu+$homesg1_v_napadu+$homesf1_v_napadu+$homepf1_v_napadu)) {$favlal_v_napadu = $home_pf1; $home_pf1_favli=$home_pf1_favli+1;}
if ($osebna_napad >= ($homepg1_v_napadu+$homesg1_v_napadu+$homesf1_v_napadu+$homepf1_v_napadu)) {$favlal_v_napadu = $home_c1; $home_c1_favli=$home_c1_favli+1;}
//vnos
$mev=32; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,0,$away_id,$favlal_v_napadu,$ekipazzogo,32,$taopis,'$eventime',3,$homescore,$awayscore)";
//nadaljevanje
$teamwithball = $away_id;
}
else {

$osebna_napad = rand(0, $away_osebna_napad);
if ($osebna_napad < $awaypg1_v_napadu) {$favlal_v_napadu = $away_pg1; $away_pg1_favli=$away_pg1_favli+1;}
if ($osebna_napad >= $awaypg1_v_napadu AND $osebna_napad < ($awaypg1_v_napadu+$awaysg1_v_napadu)) {$favlal_v_napadu = $away_sg1; $away_sg1_favli=$away_sg1_favli+1;}
if ($osebna_napad >= ($awaypg1_v_napadu+$awaysg1_v_napadu) AND $osebna_napad < ($awaypg1_v_napadu+$awaysg1_v_napadu+$awaysf1_v_napadu)) {$favlal_v_napadu = $away_sf1; $away_sf1_favli=$away_sf1_favli+1;}
if ($osebna_napad >= ($awaypg1_v_napadu+$awaysg1_v_napadu+$awaysf1_v_napadu) AND $osebna_napad < ($awaypg1_v_napadu+$awaysg1_v_napadu+$awaysf1_v_napadu+$awaypf1_v_napadu)) {$favlal_v_napadu = $away_pf1; $away_pf1_favli=$away_pf1_favli+1;}
if ($osebna_napad >= ($awaypg1_v_napadu+$awaysg1_v_napadu+$awaysf1_v_napadu+$awaypf1_v_napadu)) {$favlal_v_napadu = $away_c1; $away_c1_favli=$away_c1_favli+1;}
//vnos
$mev=32; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,0,$home_id,$favlal_v_napadu,$ekipazzogo,32,$taopis,'$eventime',3,$homescore,$awayscore)";
//nadaljevanje
$teamwithball = $home_id;
}

//KONEC OSEBNE V NAPADU

}
if ($osebna==19) {

//NAMERNA OSEBNA NAPAKA

$namerna_osebna = rand(0,69);
//switch znotraj switcha
SWITCH (TRUE) {
CASE ($namerna_osebna < 16):
if ($ekipazzogo==$home_id) {$naredil_namerno = $away_pg1; $away_pg1_favli=$away_pg1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $home_pg1; $met_verjetnost = rand(0, $homepg1_freethrow);}
if ($namerna==1) {$namerna_nad = $home_sg1; $met_verjetnost = rand(0, $homesg1_freethrow);}
if ($namerna==2) {$namerna_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
if ($namerna==3) {$namerna_nad = $home_pf1; $met_verjetnost = rand(0, $homepf1_freethrow);}
if ($namerna==4) {$namerna_nad = $home_c1; $met_verjetnost = rand(0, $homec1_freethrow);}
}
else {$naredil_namerno = $home_pg1; $home_pg1_favli=$home_pg1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $away_pg1; $met_verjetnost = rand(0, $awaypg1_freethrow);}
if ($namerna==1) {$namerna_nad = $away_sg1; $met_verjetnost = rand(0, $awaysg1_freethrow);}
if ($namerna==2) {$namerna_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
if ($namerna==3) {$namerna_nad = $away_pf1; $met_verjetnost = rand(0, $awaypf1_freethrow);}
if ($namerna==4) {$namerna_nad = $away_c1; $met_verjetnost = rand(0, $awayc1_freethrow);}
}
break;

CASE ($namerna_osebna > 15 AND $namerna_osebna < 27):
if ($ekipazzogo==$home_id) {$naredil_namerno = $away_sg1; $away_sg1_favli=$away_sg1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $home_pg1; $met_verjetnost = rand(0, $homepg1_freethrow);}
if ($namerna==1) {$namerna_nad = $home_sg1; $met_verjetnost = rand(0, $homesg1_freethrow);}
if ($namerna==2) {$namerna_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
if ($namerna==3) {$namerna_nad = $home_pf1; $met_verjetnost = rand(0, $homepf1_freethrow);}
if ($namerna==4) {$namerna_nad = $home_c1; $met_verjetnost = rand(0, $homec1_freethrow);}
}
else {$naredil_namerno = $home_sg1; $home_sg1_favli=$home_sg1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $away_pg1; $met_verjetnost = rand(0, $awaypg1_freethrow);}
if ($namerna==1) {$namerna_nad = $away_sg1; $met_verjetnost = rand(0, $awaysg1_freethrow);}
if ($namerna==2) {$namerna_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
if ($namerna==3) {$namerna_nad = $away_pf1; $met_verjetnost = rand(0, $awaypf1_freethrow);}
if ($namerna==4) {$namerna_nad = $away_c1; $met_verjetnost = rand(0, $awayc1_freethrow);}
}
break;

CASE ($namerna_osebna > 26 AND $namerna_osebna < 45):
if ($ekipazzogo==$home_id) {$naredil_namerno = $away_sf1; $away_sf1_favli=$away_sf1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $home_pg1; $met_verjetnost = rand(0, $homepg1_freethrow);}
if ($namerna==1) {$namerna_nad = $home_sg1; $met_verjetnost = rand(0, $homesg1_freethrow);}
if ($namerna==2) {$namerna_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
if ($namerna==3) {$namerna_nad = $home_pf1; $met_verjetnost = rand(0, $homepf1_freethrow);}
if ($namerna==4) {$namerna_nad = $home_c1; $met_verjetnost = rand(0, $homec1_freethrow);}
}
else {$naredil_namerno = $home_sf1; $home_sf1_favli=$home_sf1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $away_pg1; $met_verjetnost = rand(0, $awaypg1_freethrow);}
if ($namerna==1) {$namerna_nad = $away_sg1; $met_verjetnost = rand(0, $awaysg1_freethrow);}
if ($namerna==2) {$namerna_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
if ($namerna==3) {$namerna_nad = $away_pf1; $met_verjetnost = rand(0, $awaypf1_freethrow);}
if ($namerna==4) {$namerna_nad = $away_c1; $met_verjetnost = rand(0, $awayc1_freethrow);}
}
break;

CASE ($namerna_osebna > 44 AND $namerna_osebna < 61):
if ($ekipazzogo==$home_id) {$naredil_namerno = $away_pf1; $away_pf1_favli=$away_pf1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $home_pg1; $met_verjetnost = rand(0, $homepg1_freethrow);}
if ($namerna==1) {$namerna_nad = $home_sg1; $met_verjetnost = rand(0, $homesg1_freethrow);}
if ($namerna==2) {$namerna_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
if ($namerna==3) {$namerna_nad = $home_pf1; $met_verjetnost = rand(0, $homepf1_freethrow);}
if ($namerna==4) {$namerna_nad = $home_c1; $met_verjetnost = rand(0, $homec1_freethrow);}
}
else {$naredil_namerno = $home_pf1; $home_pf1_favli=$home_pf1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $away_pg1; $met_verjetnost = rand(0, $awaypg1_freethrow);}
if ($namerna==1) {$namerna_nad = $away_sg1; $met_verjetnost = rand(0, $awaysg1_freethrow);}
if ($namerna==2) {$namerna_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
if ($namerna==3) {$namerna_nad = $away_pf1; $met_verjetnost = rand(0, $awaypf1_freethrow);}
if ($namerna==4) {$namerna_nad = $away_c1; $met_verjetnost = rand(0, $awayc1_freethrow);}
}
break;

CASE ($namerna_osebna > 60):
if ($ekipazzogo==$home_id) {$naredil_namerno = $away_c1; $away_c1_favli=$away_c1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $home_pg1; $met_verjetnost = rand(0, $homepg1_freethrow);}
if ($namerna==1) {$namerna_nad = $home_sg1; $met_verjetnost = rand(0, $homesg1_freethrow);}
if ($namerna==2) {$namerna_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
if ($namerna==3) {$namerna_nad = $home_pf1; $met_verjetnost = rand(0, $homepf1_freethrow);}
if ($namerna==4) {$namerna_nad = $home_c1; $met_verjetnost = rand(0, $homec1_freethrow);}
}
else {$naredil_namerno = $home_c1; $home_c1_favli=$home_c1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $away_pg1; $met_verjetnost = rand(0, $awaypg1_freethrow);}
if ($namerna==1) {$namerna_nad = $away_sg1; $met_verjetnost = rand(0, $awaysg1_freethrow);}
if ($namerna==2) {$namerna_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
if ($namerna==3) {$namerna_nad = $away_pf1; $met_verjetnost = rand(0, $awaypf1_freethrow);}
if ($namerna==4) {$namerna_nad = $away_c1; $met_verjetnost = rand(0, $awayc1_freethrow);}
}
break;
}
//konec switcha v switchu

if ($met_verjetnost > 25) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+2; $mev=30; shuffle($ddogodek[$mev]); $taopis =$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$namerna_nad,$ekipazzogo,$naredil_namerno,$away_id,30,$taopis,'$eventime',3,$homescore,$awayscore)";
}
else {$awayscore = $awayscore+2; $mev=30; shuffle($ddogodek[$mev]); $taopis =$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$namerna_nad,$ekipazzogo,$naredil_namerno,$home_id,30,$taopis,'$eventime',3,$homescore,$awayscore)";
}
//vnos obeh prostih metov
$mev=14; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$namerna_nad,$ekipazzogo,0,0,14,$taopis,'$eventime',3,$homescore,$awayscore)";
}
elseif ($met_verjetnost > 12 AND $met_verjetnost < 26) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+1; $mev=30; shuffle($ddogodek[$mev]); $taopis =$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$namerna_nad,$ekipazzogo,$naredil_namerno,$away_id,30,$taopis,'$eventime',3,$homescore,$awayscore)";
}
else {$awayscore = $awayscore+1; $mev=30; shuffle($ddogodek[$mev]); $taopis =$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$namerna_nad,$ekipazzogo,$naredil_namerno,$home_id,30,$taopis,'$eventime',3,$homescore,$awayscore)";
}
//vnos prostega meta
$mev=15; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$namerna_nad,$ekipazzogo,0,0,15,$taopis,'$eventime',3,$homescore,$awayscore)";
}
else {
if ($ekipazzogo==$home_id) {$mev=30; shuffle($ddogodek[$mev]); $taopis =$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$namerna_nad,$ekipazzogo,$naredil_namerno,$away_id,30,$taopis,'$eventime',3,$homescore,$awayscore)";
}
else {$mev=30; shuffle($ddogodek[$mev]); $taopis =$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$namerna_nad,$ekipazzogo,$naredil_namerno,$home_id,30,$taopis,'$eventime',3,$homescore,$awayscore)";
}
//vnos zgresenih metov
$mev=16; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$namerna_nad,$ekipazzogo,0,0,16,$taopis,'$eventime',3,$homescore,$awayscore)";
}


if ($ekipazzogo==$home_id) {$teamwithball = $home_id;} else {$teamwithball = $away_id;}

}

if ($home_pg1_favli==5) {$bonusdosegel=0; $vengre=$home_pg1; $home_pg1=0; $home_pg1_favli = 0;}
if ($home_sg1_favli==5) {$bonusdosegel=1; $vengre=$home_sg1; $home_sg1=0; $home_sg1_favli = 0;}
if ($home_sf1_favli==5) {$bonusdosegel=2; $vengre=$home_sf1; $home_sf1=0; $home_sf1_favli = 0;}
if ($home_pf1_favli==5) {$bonusdosegel=3; $vengre=$home_pf1; $home_pf1=0; $home_pf1_favli = 0;}
if ($home_c1_favli==5) {$bonusdosegel=4; $vengre=$home_c1; $home_c1=0; $home_c1_favli = 0;}

if ($away_pg1_favli==5) {$bonusdosegel=5; $vengre=$away_pg1; $away_pg1=0; $away_pg1_favli = 0;}
if ($away_sg1_favli==5) {$bonusdosegel=6; $vengre=$away_sg1; $away_sg1=0; $away_sg1_favli = 0;}
if ($away_sf1_favli==5) {$bonusdosegel=7; $vengre=$away_sf1; $away_sf1=0; $away_sf1_favli = 0;}
if ($away_pf1_favli==5) {$bonusdosegel=8; $vengre=$away_pf1; $away_pf1=0; $away_pf1_favli = 0;}
if ($away_c1_favli==5) {$bonusdosegel=9; $vengre=$away_c1; $away_c1=0; $away_c1_favli = 0;}

//KONEC OSEBNIH NAPAK
break;


/* tu se zacne tretji primer, to je tisti izjemni - nadaljevan dogodek */
//dogodek po skoku

CASE 3:
$dogodek_po_skoku = rand(0,4);

//switch znotraj switcha
SWITCH (TRUE) {
CASE ($dogodek_po_skoku < 3):
//zogo dobijo nasprotniki
if ($ekipazzogo==$home_id) {$homescore = $homescore+2; $home2zadeti=$home2zadeti+1; $teamwithball = $away_id;}
else {$awayscore = $awayscore+2; $away2zadeti=$away2zadeti+1; $teamwithball = $home_id;}
$nadaljevandogodek=0;
//vnos
$mev=27; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$nadaljuje_igralec,$ekipazzogo,0,0,27,$taopis,'$eventime',3,$homescore,$awayscore)";
break;

CASE ($dogodek_po_skoku > 2):

/* skok na odbito zogo */

if ($ekipazzogo==$home_id) {
$home2faljeni=$home2faljeni+1;
$tempskok = $homeoffskok + $awaydefskok;
$dobljenskok = rand(0,$tempskok);

$sestevek_skok_home = $homepg1_skok + $homesg1_skok + $homesf1_skok + $homepf1_skok + $homec1_skok;
$skakalec_home = rand(0,$sestevek_skok_home);
if ($skakalec_home <= $homepg1_skok) {$dobil_skok = $home_pg1;}
if ($skakalec_home > $homepg1_skok AND $skakalec_home <= ($homepg1_skok+$homesg1_skok)) {$dobil_skok = $home_sg1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok)) {$dobil_skok = $home_sf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$dobil_skok = $home_pf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$dobil_skok = $home_c1;}

$sestevek_skok_away = $awaypg1_skok + $awaysg1_skok + $awaysf1_skok + $awaypf1_skok + $awayc1_skok;
$skakalec_away = rand(0,$sestevek_skok_away);
if ($skakalec_away <= $awaypg1_skok) {$nasprotnik_skok = $away_pg1;}
if ($skakalec_away > $awaypg1_skok AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok)) {$nasprotnik_skok = $away_sg1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok)) {$nasprotnik_skok = $away_sf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$nasprotnik_skok = $away_pf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$nasprotnik_skok = $away_c1;}

if ($dobljenskok < $homeoffskok) {
$mev=29; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$nadaljuje_igralec,$ekipazzogo,$dobil_skok,$ekipazzogo,29,$taopis,'$eventime',3,$homescore,$awayscore)";
$teamwithball = $ekipazzogo;
$nadaljevandogodek=1;
$nadaljuje_igralec=$dobil_skok;
}
if ($dobljenskok >= $homeoffskok) {
$mev=28; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$nadaljuje_igralec,$ekipazzogo,$nasprotnik_skok,$away_id,28,$taopis,'$eventime',3,$homescore,$awayscore)";
$teamwithball = $away_id;
$nadaljevandogodek=0;
}
}

if ($ekipazzogo==$away_id) {
$away2faljeni=$away2faljeni+1;
$tempskok = $awayoffskok + $homedefskok;
$dobljenskok = rand(0,$tempskok);

$sestevek_skok_away = $awaypg1_skok + $awaysg1_skok + $awaysf1_skok + $awaypf1_skok + $awayc1_skok;
$skakalec_away = rand(0,$sestevek_skok_away);
if ($skakalec_away <= $awaypg1_skok) {$dobil_skok = $away_pg1;}
if ($skakalec_away > $awaypg1_skok AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok)) {$dobil_skok = $away_sg1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok)) {$dobil_skok = $away_sf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$dobil_skok = $away_pf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$dobil_skok = $away_c1;}

$sestevek_skok_home = $homepg1_skok + $homesg1_skok + $homesf1_skok + $homepf1_skok + $homec1_skok;
$skakalec_home = rand(0,$sestevek_skok_home);
if ($skakalec_home <= $homepg1_skok) {$nasprotnik_skok = $home_pg1;}
if ($skakalec_home > $homepg1_skok AND $skakalec_home <= ($homepg1_skok+$homesg1_skok)) {$nasprotnik_skok = $home_sg1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok)) {$nasprotnik_skok = $home_sf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$nasprotnik_skok = $home_pf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$nasprotnik_skok = $home_c1;}

if ($dobljenskok < $awayoffskok) {
$mev=29; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$nadaljuje_igralec,$ekipazzogo,$dobil_skok,$ekipazzogo,29,$taopis,'$eventime',3,$homescore,$awayscore)";
$teamwithball = $ekipazzogo;
$nadaljevandogodek=1;
$nadaljuje_igralec=$dobil_skok;
}
if ($dobljenskok >= $awayoffskok) {
$mev=28; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$nadaljuje_igralec,$ekipazzogo,$nasprotnik_skok,$home_id,28,$taopis,'$eventime',3,$homescore,$awayscore)";
$teamwithball = $home_id;
$nadaljevandogodek=0;
}
}
/* konec skoka */
break;

}
//konec switcha znotraj switcha


break;


/* cetrti primer, igralec ki je ukradel zogo krene v protinapad */

CASE 4:
$dogodek_po_kraji = rand(0,36);

//switch znotraj switcha
SWITCH (TRUE) {
CASE ($dogodek_po_kraji < 24):
//zogo dobijo nasprotniki
if ($ekipazzogo==$home_id) {$homescore = $homescore+2; $home2zadeti=$home2zadeti+1; $teamwithball = $away_id;}
else {$awayscore = $awayscore+2; $away2zadeti=$away2zadeti+1; $teamwithball = $home_id;}
$nadaljevandogodek=0;
//vnos
$mev=23; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$nadaljuje_igralc,$ekipazzogo,0,0,23,$taopis,'$eventime',3,$homescore,$awayscore)";
break;

CASE ($dogodek_po_kraji > 23 AND $dogodek_po_kraji < 27):
//zogo dobijo nasprotniki
if ($ekipazzogo==$home_id) {$homescore = $homescore+3; $teamwithball = $away_id;}
else {$awayscore = $awayscore+3; $teamwithball = $home_id;}
$nadaljevandogodek=0;
//vnos
$mev=24; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$nadaljuje_igralc,$ekipazzogo,0,0,24,$taopis,'$eventime',3,$homescore,$awayscore)";
break;

CASE ($dogodek_po_kraji > 26 AND $dogodek_po_kraji < 32):
$nadaljevandogodek=0;
//vnos
$mev=25; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$nadaljuje_igralc,$ekipazzogo,0,0,25,$taopis,'$eventime',3,$homescore,$awayscore)";
break;

CASE ($dogodek_po_kraji > 31):
//zogo dobijo nasprotniki
if ($ekipazzogo==$home_id) {$home_noofTOs=$home_noofTOs+1; $teamwithball = $away_id;} else {$away_noofTOs=$away_noofTOs+1; $teamwithball = $home_id;}
$nadaljevandogodek=0;
//vnos
$mev=26; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$nadaljuje_igralc,$ekipazzogo,0,0,26,$taopis,'$eventime',3,$homescore,$awayscore)";
break;
}
//konec switcha znotraj switcha


//konec CELOTNEGA switcha za dogodek
break;
}

$randdd = $randdd + rand(19,25);
$eventime = date("Y-m-d H:i:s", mktime($dbhour,$dbmin+17,$dbsec+$randdd+30,$dbmonth,$dbday,$dbyear));
$stevilodogodkov2++;
}


/*
******************************************************************
*********************************************KONEC TRETJE CETRTINE
******************************************************************
*/
if ($dogodek != 6) {
$split = explode(" ", $eventime); $ndate = $split[0]; $ntime = $split[1];
$splitd = explode("-", $ndate); $nyear = $splitd[0]; $nmonth = $splitd[1]; $nday = $splitd[2];
$splitt = explode(":", $ntime); $nhour = $splitt[0]; $nmin = $splitt[1]; $nsec = $splitt[2];
$eventime = date("Y-m-d H:i:s", mktime($nhour,$nmin,$nsec+15,$nmonth,$nday,$nyear));
$mev=34; shuffle($ddogodek[$mev]); $c_opis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,0,0,0,0,34,$c_opis,'$eventime',3,$homescore,$awayscore)";
$split = explode(" ", $eventime); $ndate = $split[0]; $ntime = $split[1];
$splitd = explode("-", $ndate); $nyear = $splitd[0]; $nmonth = $splitd[1]; $nday = $splitd[2];
$splitt = explode(":", $ntime); $nhour = $splitt[0]; $nmin = $splitt[1]; $nsec = $splitt[2];
$eventime = date("Y-m-d H:i:s", mktime($nhour,$nmin+2,$nsec,$nmonth,$nday,$nyear));
}
/*
******************************************************************
*********************************************KONEC TRETJE CETRTINE
******************************************************************
*/


//GLAVNA ZANKA
while ($stevilodogodkov3 < 41) {

if (!$homescore) {$homescore = 0;}
if (!$awayscore) {$awayscore = 0;}

//ekipa z zogo
if ($teamwithball=='') {$ekipazzogo = $home_id;} else {$ekipazzogo = $teamwithball;}

//dogodek ki se bo zgodil v tem eventu 
//FORMULA za verjetnost dogodka pri ekipi v napadu
$cetrtina=4;
if ($walkover != 14) {require('inc/nt_dogodek.php');}


//zacetek dogodka

switch ($dogodek) {


//prva moznost je met
CASE 0:
$kos = rand(0,$trojke);
if ($kos < 6) {

if ($ekipazzogo==$home_id) {
$fugaH = round((1 - $homesk2/$awaysk2 - (($home2zadeti/($home2zadeti+$home2faljeni)) - ($away2zadeti/($away2zadeti+$away2faljeni))))*10);
$fugaH = 0-$fugaH;
if ((($fugaH - $fugaA > 4) OR ($fugaA - $fugaH > 4)) AND $neakt==0) {$rand2ph=$fugaH;}
$kdomece = rand(0,20);
//kasneje bi lahko uporabnik imel vpliv na to kdo vec mece
switch (TRUE) {
case ($kdomece < 6): $igralec_mece = $home_pg1; $posrecenzadve = rand($fugaH,$homepg1_za_dve); break;
case ($kdomece > 5 AND $kdomece < 12): $igralec_mece = $home_sg1; $posrecenzadve = rand($fugaH,$homesg1_za_dve); break;
case ($kdomece > 11 AND $kdomece < 15): $igralec_mece = $home_sf1; $posrecenzadve = rand($fugaH,$homesf1_za_dve); break;
case ($kdomece > 14 AND $kdomece < 18): $igralec_mece = $home_pf1; $posrecenzadve = rand($fugaH,$homepf1_za_dve); break;
case ($kdomece > 17): $igralec_mece = $home_c1; $posrecenzadve = rand($fugaH,$homec1_za_dve); break;
}
}
if ($ekipazzogo==$away_id) {
$fugaA = round((1 - $awaysk2/$homesk2 - (($away2zadeti/($away2zadeti+$away2faljeni)) - ($home2zadeti/($home2zadeti+$home2faljeni))))*10);
$fugaA = 0-$fugaA;
if ((($fugaH - $fugaA > 4) OR ($fugaA - $fugaH > 4)) AND $neakt==0) {$rand2pa=$fugaA;}
$kdomece = rand(0,20);
switch (TRUE) {
case ($kdomece < 6): $igralec_mece = $away_pg1; $posrecenzadve = rand($fugaA,$awaypg1_za_dve); break;
case ($kdomece > 5 AND $kdomece < 12): $igralec_mece = $away_sg1; $posrecenzadve = rand($fugaA,$awaysg1_za_dve); break;
case ($kdomece > 11 AND $kdomece < 15): $igralec_mece = $away_sf1; $posrecenzadve = rand($fugaA,$awaysf1_za_dve); break;
case ($kdomece > 14 AND $kdomece < 18): $igralec_mece = $away_pf1; $posrecenzadve = rand($fugaA,$awaypf1_za_dve); break;
case ($kdomece > 17): $igralec_mece = $away_c1; $posrecenzadve = rand($fugaA,$awayc1_za_dve); break;
}
}

if ($posrecenzadve < 29) {
//zadet met

if ($ekipazzogo==$home_id) {
//podajalec
$domace_podaje = $homepg1_passing + $homesg1_passing + $homesf1_passing + $homepf1_passing + $homec1_passing;
$podaja = rand(0, $domace_podaje);
if ($podaja < $homepg1_passing AND $home_pg1 != $igralec_mece) {$podajalec = $home_pg1;}
elseif ($podaja >= $homepg1_passing AND $podaja < ($homepg1_passing+$homesg1_passing) AND $home_sg1 != $igralec_mece) {$podajalec = $home_sg1;}
elseif ($podaja >= ($homepg1_passing+$homesg1_passing) AND $podaja < ($homepg1_passing+$homesg1_passing+$homesf1_passing) AND $home_sf1 != $igralec_mece) {$podajalec = $home_sf1;}
elseif ($podaja >= ($homepg1_passing+$homesg1_passing+$homesf1_passing) AND $podaja < ($homepg1_passing+$homesg1_passing+$homesf1_passing+$homepf1_passing) AND $home_pf1 != $igralec_mece) {$podajalec = $home_pf1;}
elseif ($podaja >= ($homepg1_passing+$homesg1_passing+$homesf1_passing+$homepf1_passing) AND $home_c1 != $igralec_mece) {$podajalec = $home_c1;}
else {$podajalec=0;}

}
else
//kos so dali gostje
{
//podajalec
$gostujoce_podaje = $awaypg1_passing + $awaysg1_passing + $awaysf1_passing + $awaypf1_passing + $awayc1_passing;
$podaja = rand(0, $gostujoce_podaje);
if ($podaja < $awaypg1_passing AND $away_pg1 != $igralec_mece) {$podajalec = $away_pg1;}
elseif ($podaja >= $awaypg1_passing AND $podaja < ($awaypg1_passing+$awaysg1_passing) AND $away_sg1 != $igralec_mece) {$podajalec = $away_sg1;}
elseif ($podaja >= ($awaypg1_passing+$awaysg1_passing) AND $podaja < ($awaypg1_passing+$awaysg1_passing+$awaysf1_passing) AND $away_sf1 != $igralec_mece) {$podajalec = $away_sf1;}
elseif ($podaja >= ($awaypg1_passing+$awaysg1_passing+$awaysf1_passing) AND $podaja < ($awaypg1_passing+$awaysg1_passing+$awaysf1_passing+$awaypf1_passing) AND $away_pf1 != $igralec_mece) {$podajalec = $away_pf1;}
elseif ($podaja >= ($awaypg1_passing+$awaysg1_passing+$awaysf1_passing+$awaypf1_passing) AND $away_c1 != $igralec_mece) {$podajalec = $away_c1;}
else {$podajalec=0;}

}

if ($ekipazzogo==$home_id) {$homescore = $homescore+2; $home2zadeti=$home2zadeti+1; $teamwithball = $away_id; $nadaljevandogodek=0;}
else {$awayscore = $awayscore+2; $away2zadeti=$away2zadeti+1; $teamwithball = $home_id; $nadaljevandogodek=0;}

//vnos
if ($podajalec==0) {
$mev=2; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,0,0,2,$taopis,'$eventime',4,$homescore,$awayscore)";
}
else {
$mev=1; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$podajalec,$ekipazzogo,1,$taopis,'$eventime',4,$homescore,$awayscore)";
}


}
//konec zadetega meta za dve
//sledi blokada, kdo jo napravi trenutno ni odvisno od skilov
if ($posrecenzadve > 28 AND $posrecenzadve < 32) {
if ($ekipazzogo==$home_id) {$home2faljeni=$home2faljeni+1;
$banana = rand(0,2);
if ($banana==0) {$kdo_blokira = $away_sf1;}
if ($banana==1) {$kdo_blokira = $away_pf1;}
if ($banana==2) {$kdo_blokira = $away_c1;}
}
else {$away2faljeni=$away2faljeni+1;
$banana = rand(0,2);
if ($banana==0) {$kdo_blokira = $home_sf1;}
if ($banana==1) {$kdo_blokira = $home_pf1;}
if ($banana==2) {$kdo_blokira = $home_c1;}
}
if ($ekipazzogo==$home_id) {
//vnos
$mev=31; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$kdo_blokira,$away_id,31,$taopis,'$eventime',4,$homescore,$awayscore)";

$teamwithball = $home_id;
$nadaljevandogodek=0;
}
else {
//vnos
$mev=31; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$kdo_blokira,$home_id,31,$taopis,'$eventime',4,$homescore,$awayscore)";

$teamwithball = $away_id;
$nadaljevandogodek=0;
}

}
//konec blokade
//sledi faljen met
if ($posrecenzadve > 31) {

/* skok na odbito zogo */

if ($ekipazzogo==$home_id) {
$home2faljeni=$home2faljeni+1;
$tempskok = $homeoffskok + $awaydefskok;
$dobljenskok = rand(0,$tempskok);

$sestevek_skok_home = $homepg1_skok + $homesg1_skok + $homesf1_skok + $homepf1_skok + $homec1_skok;
$skakalec_home = rand(0,$sestevek_skok_home);
if ($skakalec_home <= $homepg1_skok) {$dobil_skok = $home_pg1;}
if ($skakalec_home > $homepg1_skok AND $skakalec_home <= ($homepg1_skok+$homesg1_skok)) {$dobil_skok = $home_sg1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok)) {$dobil_skok = $home_sf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$dobil_skok = $home_pf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$dobil_skok = $home_c1;}

$sestevek_skok_away = $awaypg1_skok + $awaysg1_skok + $awaysf1_skok + $awaypf1_skok + $awayc1_skok;
$skakalec_away = rand(0,$sestevek_skok_away);
if ($skakalec_away <= $awaypg1_skok) {$nasprotnik_skok = $away_pg1;}
if ($skakalec_away > $awaypg1_skok AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok)) {$nasprotnik_skok = $away_sg1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok)) {$nasprotnik_skok = $away_sf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$nasprotnik_skok = $away_pf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$nasprotnik_skok = $away_c1;}

if ($dobljenskok < $homeoffskok) {
$mev=3; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$dobil_skok,$ekipazzogo,3,$taopis,'$eventime',4,$homescore,$awayscore)";
$teamwithball = $ekipazzogo;
$nadaljevandogodek=1;
$nadaljuje_igralec=$dobil_skok;
}
if ($dobljenskok >= $homeoffskok) {
$mev=4; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$nasprotnik_skok,$away_id,4,$taopis,'$eventime',4,$homescore,$awayscore)";
$teamwithball = $away_id;
$nadaljevandogodek=0;
}
}

if ($ekipazzogo==$away_id) {
$away2faljeni=$away2faljeni+1;
$tempskok = $awayoffskok + $homedefskok;
$dobljenskok = rand(0,$tempskok);

$sestevek_skok_away = $awaypg1_skok + $awaysg1_skok + $awaysf1_skok + $awaypf1_skok + $awayc1_skok;
$skakalec_away = rand(0,$sestevek_skok_away);
if ($skakalec_away <= $awaypg1_skok) {$dobil_skok = $away_pg1;}
if ($skakalec_away > $awaypg1_skok AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok)) {$dobil_skok = $away_sg1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok)) {$dobil_skok = $away_sf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$dobil_skok = $away_pf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$dobil_skok = $away_c1;}

$sestevek_skok_home = $homepg1_skok + $homesg1_skok + $homesf1_skok + $homepf1_skok + $homec1_skok;
$skakalec_home = rand(0,$sestevek_skok_home);
if ($skakalec_home <= $homepg1_skok) {$nasprotnik_skok = $home_pg1;}
if ($skakalec_home > $homepg1_skok AND $skakalec_home <= ($homepg1_skok+$homesg1_skok)) {$nasprotnik_skok = $home_sg1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok)) {$nasprotnik_skok = $home_sf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$nasprotnik_skok = $home_pf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$nasprotnik_skok = $home_c1;}

if ($dobljenskok < $awayoffskok) {
$mev=3; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$dobil_skok,$ekipazzogo,3,$taopis,'$eventime',4,$homescore,$awayscore)";
$teamwithball = $ekipazzogo;
$nadaljevandogodek=1;
$nadaljuje_igralec=$dobil_skok;
}
if ($dobljenskok >= $awayoffskok) {
$mev=4; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$nasprotnik_skok,$home_id,4,$taopis,'$eventime',4,$homescore,$awayscore)";
$teamwithball = $home_id;
$nadaljevandogodek=0;
}
}
}
}
if ($kos > 5) {
if ($ekipazzogo==$home_id) {
$kdomece = rand(0,11);
switch (TRUE) {
case ($kdomece < 4): $igralec_mece = $home_pg1; $posrecenzatri = rand(0,$homepg1_za_tri); break;
case ($kdomece > 3 AND $kdomece < 9): $igralec_mece = $home_sg1; $posrecenzatri = rand(0,$homesg1_za_tri); break;
case ($kdomece > 8 AND $kdomece < 11): $igralec_mece = $home_sf1; $posrecenzatri = rand(0,$homesf1_za_tri); break;
case ($kdomece==11): $igralec_mece = $home_pf1; $posrecenzatri = rand(0,$homepf1_za_tri); break;
}
}

if ($ekipazzogo==$away_id) {
$kdomece = rand(0,11);
switch (TRUE) {
case ($kdomece < 4): $igralec_mece = $away_pg1; $posrecenzatri = rand(0,$awaypg1_za_tri); break;
case ($kdomece > 3 AND $kdomece < 9): $igralec_mece = $away_sg1; $posrecenzatri = rand(0,$awaysg1_za_tri); break;
case ($kdomece > 8 AND $kdomece < 11): $igralec_mece = $away_sf1; $posrecenzatri = rand(0,$awaysf1_za_tri); break;
case ($kdomece==11): $igralec_mece = $away_pf1; $posrecenzatri = rand(0,$awaypf1_za_tri); break;
}
}

if ($posrecenzatri < 5) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+3; $teamwithball = $away_id; $nadaljevandogodek=0;}
else {$awayscore = $awayscore+3; $teamwithball = $home_id; $nadaljevandogodek=0;}
//vpis
$mev=7; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,0,0,7,$taopis,'$eventime',4,$homescore,$awayscore)";

}
if ($posrecenzatri > 4) {

/* skok na odbito zogo */

if ($ekipazzogo==$home_id) {
$tempskok = $homeoffskok + $awaydefskok;
$dobljenskok = rand(0,$tempskok);

$sestevek_skok_home = $homepg1_skok + $homesg1_skok + $homesf1_skok + $homepf1_skok + $homec1_skok;
$skakalec_home = rand(0,$sestevek_skok_home);
if ($skakalec_home <= $homepg1_skok) {$dobil_skok = $home_pg1;}
if ($skakalec_home > $homepg1_skok AND $skakalec_home <= ($homepg1_skok+$homesg1_skok)) {$dobil_skok = $home_sg1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok)) {$dobil_skok = $home_sf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$dobil_skok = $home_pf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$dobil_skok = $home_c1;}

$sestevek_skok_away = $awaypg1_skok + $awaysg1_skok + $awaysf1_skok + $awaypf1_skok + $awayc1_skok;
$skakalec_away = rand(0,$sestevek_skok_away);
if ($skakalec_away <= $awaypg1_skok) {$nasprotnik_skok = $away_pg1;}
if ($skakalec_away > $awaypg1_skok AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok)) {$nasprotnik_skok = $away_sg1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok)) {$nasprotnik_skok = $away_sf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$nasprotnik_skok = $away_pf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$nasprotnik_skok = $away_c1;}

if ($dobljenskok < $homeoffskok) {
$mev=8; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$dobil_skok,$ekipazzogo,8,$taopis,'$eventime',4,$homescore,$awayscore)";
$teamwithball = $ekipazzogo;
$nadaljevandogodek=1;
$nadaljuje_igralec=$dobil_skok;
}
if ($dobljenskok >= $homeoffskok) {
$mev=9; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$nasprotnik_skok,$away_id,9,$taopis,'$eventime',4,$homescore,$awayscore)";
$teamwithball = $away_id;
$nadaljevandogodek=0;
}
}

if ($ekipazzogo==$away_id) {
$tempskok = $awayoffskok + $homedefskok;
$dobljenskok = rand(0,$tempskok);

$sestevek_skok_away = $awaypg1_skok + $awaysg1_skok + $awaysf1_skok + $awaypf1_skok + $awayc1_skok;
$skakalec_away = rand(0,$sestevek_skok_away);
if ($skakalec_away <= $awaypg1_skok) {$dobil_skok = $away_pg1;}
if ($skakalec_away > $awaypg1_skok AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok)) {$dobil_skok = $away_sg1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok)) {$dobil_skok = $away_sf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$dobil_skok = $away_pf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$dobil_skok = $away_c1;}

$sestevek_skok_home = $homepg1_skok + $homesg1_skok + $homesf1_skok + $homepf1_skok + $homec1_skok;
$skakalec_home = rand(0,$sestevek_skok_home);
if ($skakalec_home <= $homepg1_skok) {$nasprotnik_skok = $home_pg1;}
if ($skakalec_home > $homepg1_skok AND $skakalec_home <= ($homepg1_skok+$homesg1_skok)) {$nasprotnik_skok = $home_sg1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok)) {$nasprotnik_skok = $home_sf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$nasprotnik_skok = $home_pf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$nasprotnik_skok = $home_c1;}

if ($dobljenskok < $awayoffskok) {
$mev=8; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$dobil_skok,$ekipazzogo,8,$taopis,'$eventime',4,$homescore,$awayscore)";
$teamwithball = $ekipazzogo;
$nadaljevandogodek=1;
$nadaljuje_igralec=$dobil_skok;
}
if ($dobljenskok >= $awayoffskok) {
$mev=9; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$igralec_mece,$ekipazzogo,$nasprotnik_skok,$home_id,9,$taopis,'$eventime',4,$homescore,$awayscore)";
$teamwithball = $home_id;
$nadaljevandogodek=0;
}
}
}

}
break;

/*
******************************************************************
*/

CASE 1:

/* druga moznost je IZGUBLJENA ZOGA */

//najprej me zanima kdo je izgubil zogo

$home_izgubil = $homepg1_napaka + $homesg1_napaka + $homesf1_napaka + $homepf1_napaka + $homec1_napaka;
$away_izgubil = $awaypg1_napaka + $awaysg1_napaka + $awaysf1_napaka + $awaypf1_napaka + $awayc1_napaka;

if ($ekipazzogo==$home_id) {
$narejena_napaka = rand(0, $home_izgubil);
if ($narejena_napaka < $homepg1_napaka) {$naredil_napako = $home_pg1;}
if ($narejena_napaka >= $homepg1_napaka AND $narejena_napaka < ($homepg1_napaka+$homesg1_napaka)) {$naredil_napako = $home_sg1;}
if ($narejena_napaka >= ($homepg1_napaka+$homesg1_napaka) AND $narejena_napaka < ($homepg1_napaka+$homesg1_napaka+$homesf1_napaka)) {$naredil_napako = $home_sf1;}
if ($narejena_napaka >= ($homepg1_napaka+$homesg1_napaka+$homesf1_napaka) AND $narejena_napaka < ($homepg1_napaka+$homesg1_napaka+$homesf1_napaka+$homepf1_napaka)) {$naredil_napako = $home_pf1;}
if ($narejena_napaka >= ($homepg1_napaka+$homesg1_napaka+$homesf1_napaka+$homepf1_napaka)) {$naredil_napako = $home_c1;}

} else {

$narejena_napaka = rand(0, $away_izgubil);
if ($narejena_napaka < $awaypg1_napaka) {$naredil_napako = $away_pg1;}
if ($narejena_napaka >= $awaypg1_napaka AND $narejena_napaka < ($awaypg1_napaka+$awaysg1_napaka)) {$naredil_napako = $away_sg1;}
if ($narejena_napaka >= ($awaypg1_napaka+$awaysg1_napaka) AND $narejena_napaka < ($awaypg1_napaka+$awaysg1_napaka+$awaysf1_napaka)) {$naredil_napako = $away_sf1;}
if ($narejena_napaka >= ($awaypg1_napaka+$awaysg1_napaka+$awaysf1_napaka) AND $narejena_napaka < ($awaypg1_napaka+$awaysg1_napaka+$awaysf1_napaka+$awaypf1_napaka)) {$naredil_napako = $away_pf1;}
if ($narejena_napaka >= ($awaypg1_napaka+$awaysg1_napaka+$awaysf1_napaka+$awaypf1_napaka)) {$naredil_napako = $away_c1;}

}

//konec ugotovitev gleda tega kdo je naredil napako

$zgubljena = rand(0,45);
if ($zgubljena < 29) {
//vnos
$mev=5; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$naredil_napako,$ekipazzogo,0,0,5,$taopis,'$eventime',4,$homescore,$awayscore)";

if ($ekipazzogo==$home_id) {$teamwithball = $away_id; $nadaljevandogodek=0;} else {$teamwithball = $home_id; $nadaljevandogodek=0;}

}

if ($zgubljena > 28) {
//UKRADENA zoga - najprej me zanima kdo je ukradel zogo

$home_kraja = $homepg1_kraja + $homesg1_kraja + $homesf1_kraja + $homepf1_kraja + $homec1_kraja;
$away_kraja = $awaypg1_kraja + $awaysg1_kraja + $awaysf1_kraja + $awaypf1_kraja + $awayc1_kraja;

if ($ekipazzogo==$away_id) {
$ukradena_z = rand(0, $home_kraja);
if ($ukradena_z < $homepg1_kraja) {$ukradel_zogo = $home_pg1;}
if ($ukradena_z >= $homepg1_kraja AND $narejena_kraja < ($homepg1_kraja+$homesg1_kraja)) {$ukradel_zogo = $home_sg1;}
if ($ukradena_z >= ($homepg1_kraja+$homesg1_kraja) AND $narejena_kraja < ($homepg1_kraja+$homesg1_kraja+$homesf1_kraja)) {$ukradel_zogo = $home_sf1;}
if ($ukradena_z >= ($homepg1_kraja+$homesg1_kraja+$homesf1_kraja) AND $narejena_kraja < ($homepg1_kraja+$homesg1_kraja+$homesf1_kraja+$homepf1_kraja)) {$ukradel_zogo = $home_pf1;}
if ($ukradena_z >= ($homepg1_kraja+$homesg1_kraja+$homesf1_kraja+$homepf1_kraja)) {$ukradel_zogo = $home_c1;}

} else {

$ukradena_z = rand(0, $away_kraja);
if ($ukradena_z < $awaypg1_kraja) {$ukradel_zogo = $away_pg1;}
if ($ukradena_z >= $awaypg1_kraja AND $narejena_kraja < ($awaypg1_kraja+$awaysg1_kraja)) {$ukradel_zogo = $away_sg1;}
if ($ukradena_z >= ($awaypg1_kraja+$awaysg1_kraja) AND $narejena_kraja < ($awaypg1_kraja+$awaysg1_kraja+$awaysf1_kraja)) {$ukradel_zogo = $away_sf1;}
if ($ukradena_z >= ($awaypg1_kraja+$awaysg1_kraja+$awaysf1_kraja) AND $narejena_kraja < ($awaypg1_kraja+$awaysg1_kraja+$awaysf1_kraja+$awaypf1_kraja)) {$ukradel_zogo = $away_pf1;}
if ($ukradena_z >= ($awaypg1_kraja+$awaysg1_kraja+$awaysf1_kraja+$awaypf1_kraja)) {$ukradel_zogo = $away_c1;}

}
//konec ugotovitev gleda tega kdo je ukradel zogo

if ($ekipazzogo==$home_id) {
//vnos
$mev=6; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$naredil_napako,$ekipazzogo,$ukradel_zogo,$away_id,6,$taopis,'$eventime',4,$homescore,$awayscore)";

$teamwithball = $away_id;
$nadaljevandogodek=2;
$nadaljuje_igralc=$ukradel_zogo;
}
else {
//vnos
$mev=6; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$naredil_napako,$ekipazzogo,$ukradel_zogo,$home_id,6,$taopis,'$eventime',4,$homescore,$awayscore)";

$teamwithball = $home_id;
$nadaljevandogodek=2;
$nadaljuje_igralc=$ukradel_zogo;
}

}
break;

/*
***********************************
* tretja moznost je osebna napaka *
***********************************
*/

CASE 2:

$osebna = rand(0,19);
if ($osebna < 17) {
//najprej me zanima kdo je naredil osebno v obrambi in nad kom

$home_osebna_obramba = $homepg1_v_obrambi + $homesg1_v_obrambi + $homesf1_v_obrambi + $homepf1_v_obrambi + $homec1_v_obrambi;
$away_osebna_obramba = $awaypg1_v_obrambi + $awaysg1_v_obrambi + $awaysf1_v_obrambi + $awaypf1_v_obrambi + $awayc1_v_obrambi;

if ($ekipazzogo==$away_id) {

$osebna_obramba = rand(0, $home_osebna_obramba);
if ($osebna_obramba < $homepg1_v_obrambi) {
$favlal_v_obrambi = $home_pg1; $home_pg1_favli=$home_pg1_favli+1;
$pofavlan = rand(0,2);
if ($pofavlan==0) {$favl_nad = $away_pg1; $met_verjetnost = rand(0, $awaypg1_freethrow);}
if ($pofavlan==1) {$favl_nad = $away_sg1; $met_verjetnost = rand(0, $awaysg1_freethrow);}
if ($pofavlan==2) {$favl_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
}
if ($osebna_obramba >= $homepg1_v_obrambi AND $osebna_obramba < ($homepg1_v_obrambi+$homesg1_v_obrambi)) {
$favlal_v_obrambi = $home_sg1; $home_sg1_favli=$home_sg1_favli+1;
$pofavlan = rand(0,3);
if ($pofavlan==0) {$favl_nad = $away_pg1; $met_verjetnost = rand(0, $awaypg1_freethrow);}
if ($pofavlan==1) {$favl_nad = $away_sg1; $met_verjetnost = rand(0, $awaysg1_freethrow);}
if ($pofavlan==2) {$favl_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
if ($pofavlan==3) {$favl_nad = $away_pf1; $met_verjetnost = rand(0, $awaypf1_freethrow);}
}
if ($osebna_obramba >= ($homepg1_v_obrambi+$homesg1_v_obrambi) AND $osebna_obramba < ($homepg1_v_obrambi+$homesg1_v_obrambi+$homesf1_v_obrambi)) {
$favlal_v_obrambi = $home_sf1; $home_sf1_favli=$home_sf1_favli+1;
$pofavlan = rand(0,4);
if ($pofavlan==0) {$favl_nad = $away_pg1; $met_verjetnost = rand(0, $awaypg1_freethrow);}
if ($pofavlan==1) {$favl_nad = $away_sg1; $met_verjetnost = rand(0, $awaysg1_freethrow);}
if ($pofavlan==2) {$favl_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
if ($pofavlan==3) {$favl_nad = $away_pf1; $met_verjetnost = rand(0, $awaypf1_freethrow);}
if ($pofavlan==4) {$favl_nad = $away_c1; $met_verjetnost = rand(0, $awayc1_freethrow);}
}
if ($osebna_obramba >= ($homepg1_v_obrambi+$homesg1_v_obrambi+$homesf1_v_obrambi) AND $osebna_obramba < ($homepg1_v_obrambi+$homesg1_v_obrambi+$homesf1_v_obrambi+$homepf1_v_obrambi)) {
$favlal_v_obrambi = $home_pf1; $home_pf1_favli=$home_pf1_favli+1;
$pofavlan = rand(0,3);
if ($pofavlan==0) {$favl_nad = $away_sg1; $met_verjetnost = rand(0, $awaysg1_freethrow);}
if ($pofavlan==1) {$favl_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
if ($pofavlan==2) {$favl_nad = $away_pf1; $met_verjetnost = rand(0, $awaypf1_freethrow);}
if ($pofavlan==3) {$favl_nad = $away_c1; $met_verjetnost = rand(0, $awayc1_freethrow);}
}
if ($osebna_obramba >= ($homepg1_v_obrambi+$homesg1_v_obrambi+$homesf1_v_obrambi+$homepf1_v_obrambi)) {
$favlal_v_obrambi = $home_c1; $home_c1_favli=$home_c1_favli+1;
$pofavlan = rand(0,2);
if ($pofavlan==0) {$favl_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
if ($pofavlan==1) {$favl_nad = $away_pf1; $met_verjetnost = rand(0, $awaypf1_freethrow);}
if ($pofavlan==2) {$favl_nad = $away_c1; $met_verjetnost = rand(0, $awayc1_freethrow);}
}

} else {

$osebna_obramba = rand(0, $away_osebna_obramba);
if ($osebna_obramba < $awaypg1_v_obrambi) {
$favlal_v_obrambi = $away_pg1; $away_pg1_favli=$away_pg1_favli+1;
$pofavlan = rand(0,2);
if ($pofavlan==0) {$favl_nad = $home_pg1; $met_verjetnost = rand(0, $homepg1_freethrow);}
if ($pofavlan==1) {$favl_nad = $home_sg1; $met_verjetnost = rand(0, $homesg1_freethrow);}
if ($pofavlan==2) {$favl_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
}
if ($osebna_obramba >= $awaypg1_v_obrambi AND $osebna_obramba < ($awaypg1_v_obrambi+$awaysg1_v_obrambi)) {
$favlal_v_obrambi = $away_sg1; $away_sg1_favli=$away_sg1_favli+1;
$pofavlan = rand(0,3);
if ($pofavlan==0) {$favl_nad = $home_pg1; $met_verjetnost = rand(0, $homepg1_freethrow);}
if ($pofavlan==1) {$favl_nad = $home_sg1; $met_verjetnost = rand(0, $homesg1_freethrow);}
if ($pofavlan==2) {$favl_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
if ($pofavlan==3) {$favl_nad = $home_pf1; $met_verjetnost = rand(0, $homepf1_freethrow);}
}
if ($osebna_obramba >= ($awaypg1_v_obrambi+$awaysg1_v_obrambi) AND $osebna_obramba < 
($awaypg1_v_obrambi+$awaysg1_v_obrambi+$awaysf1_v_obrambi)) {
$favlal_v_obrambi = $away_sf1; $away_sf1_favli=$away_sf1_favli+1;
$pofavlan = rand(0,4);
if ($pofavlan==0) {$favl_nad = $home_pg1; $met_verjetnost = rand(0, $homepg1_freethrow);}
if ($pofavlan==1) {$favl_nad = $home_sg1; $met_verjetnost = rand(0, $homesg1_freethrow);}
if ($pofavlan==2) {$favl_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
if ($pofavlan==3) {$favl_nad = $home_pf1; $met_verjetnost = rand(0, $homepf1_freethrow);}
if ($pofavlan==4) {$favl_nad = $home_c1; $met_verjetnost = rand(0, $homec1_freethrow);}
}
if ($osebna_obramba >= ($awaypg1_v_obrambi+$awaysg1_v_obrambi+$awaysf1_v_obrambi) AND $osebna_obramba < ($awaypg1_v_obrambi+$awaysg1_v_obrambi+$awaysf1_v_obrambi+$awaypf1_v_obrambi)) {
$favlal_v_obrambi = $away_pf1; $away_pf1_favli=$away_pf1_favli+1;
$pofavlan = rand(0,3);
if ($pofavlan==0) {$favl_nad = $home_sg1; $met_verjetnost = rand(0, $homesg1_freethrow);}
if ($pofavlan==1) {$favl_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
if ($pofavlan==2) {$favl_nad = $home_pf1; $met_verjetnost = rand(0, $homepf1_freethrow);}
if ($pofavlan==3) {$favl_nad = $home_c1; $met_verjetnost = rand(0, $homec1_freethrow);}
}
if ($osebna_obramba >= ($awaypg1_v_obrambi+$awaysg1_v_obrambi+$awaysf1_v_obrambi+$awaypf1_v_obrambi)) {
$favlal_v_obrambi = $away_c1; $away_c1_favli=$away_c1_favli+1;
$pofavlan = rand(0,2);
if ($pofavlan==0) {$favl_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
if ($pofavlan==1) {$favl_nad = $home_pf1; $met_verjetnost = rand(0, $homepf1_freethrow);}
if ($pofavlan==2) {$favl_nad = $home_c1; $met_verjetnost = rand(0, $homec1_freethrow);}
}

}
//konec ugotovitev gleda tega kdo je naredil osebno v obrambi
}

if ($osebna < 11) {

//preksrsek ob metu za dve in dva prosta meta
//vnos prekrska
$mev=10; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
if ($ekipazzogo==$home_id) {$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,$favlal_v_obrambi,$away_id,10,$taopis,'$eventime',4,$homescore,$awayscore)";}
else {$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,$favlal_v_obrambi,$home_id,10,$taopis,'$eventime',4,$homescore,$awayscore)";}

if ($met_verjetnost > 26) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+2;} else {$awayscore = $awayscore+2;}
//vnos
$mev=14; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,14,$taopis,'$eventime',4,$homescore,$awayscore)";
}
elseif ($met_verjetnost > 13 AND $met_verjetnost < 27) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+1;} else {$awayscore = $awayscore+1;}
//vnos
$mev=15; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,15,$taopis,'$eventime',4,$homescore,$awayscore)";
}
else {
//vnos
$mev=16; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,16,$taopis,'$eventime',4,$homescore,$awayscore)";
}
//konec dveh prostih metov, kasneje se lahko dodajo skoki
if ($ekipazzogo==$home_id) {$teamwithball = $away_id;} else {$teamwithball = $home_id;}

}

if ($osebna > 10 AND $osebna < 13) {

//prekrsek ob metu za tri in trije prosti meti
//vnos prekrska
$mev=11; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
if ($ekipazzogo==$home_id) {$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,$favlal_v_obrambi,$away_id,11,$taopis,'$eventime',4,$homescore,$awayscore)";
} else {$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,$favlal_v_obrambi,$home_id,11,$taopis,'$eventime',4,$homescore,$awayscore)";
}

//koliko od treh je bilo zadetih
if ($met_verjetnost > 25) {
if ($ekipazzogo==$home_id) {
$homescore = $homescore+3;} else {$awayscore = $awayscore+3;}
//vnos
$mev=17; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,17,$taopis,'$eventime',4,$homescore,$awayscore)";
}
elseif ($met_verjetnost > 15 AND $met_verjetnost < 26) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+2;} else {$awayscore = $awayscore+2;}
//vnos
$mev=18; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,18,$taopis,'$eventime',4,$homescore,$awayscore)";
}
elseif ($met_verjetnost > 7 AND $met_verjetnost < 16) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+1;} else {$awayscore = $awayscore+1;}
//vnos
$mev=19; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,19,$taopis,'$eventime',4,$homescore,$awayscore)";
}
else {
//vnos
$mev=20; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,20,$taopis,'$eventime',4,$homescore,$awayscore)";
}
//konec treh prostih metov, kasneje se lahko dodajo skoki
if ($ekipazzogo==$home_id) {$teamwithball = $away_id;} else {$teamwithball = $home_id;}

}

if ($osebna > 12 AND $osebna < 16) {

//zadet kos in dodatni met
//vnos zadetka in prekrska
$mev=12; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
if ($ekipazzogo==$home_id) {
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,$favlal_v_obrambi,$away_id,12,$taopis,'$eventime',4,$homescore+2,$awayscore)"; $home2zadeti=$home2zadeti+1;}
else {$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,$favlal_v_obrambi,$home_id,12,$taopis,'$eventime',4,$homescore,$awayscore+2)"; $away2zadeti=$away2zadeti+1;}

if ($met_verjetnost > 23) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+3;} else {$awayscore = $awayscore+3;}
//vnos
$mev=21; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,21,$taopis,'$eventime',4,$homescore,$awayscore)";
}
else {
if ($ekipazzogo==$home_id) {$homescore = $homescore+2;} else {$awayscore = $awayscore+2;}
//vnos
$mev=22; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,22,$taopis,'$eventime',4,$homescore,$awayscore)";
}
//konec dodatnega meta, kasneje dodam skok
if ($ekipazzogo==$home_id) {$teamwithball = $away_id;} else {$teamwithball = $home_id;}

}
if ($osebna==16) {

//zadeta trojka in dodatni met
//vnos zadetka in prekrska
$mev=13; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
if ($ekipazzogo==$home_id) {$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,$favlal_v_obrambi,$away_id,13,$taopis,'$eventime',4,$homescore+3,$awayscore)";}
else {$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,$favlal_v_obrambi,$home_id,13,$taopis,'$eventime',4,$homescore,$awayscore+3)";}

if ($met_verjetnost > 22) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+4;} else {$awayscore = $awayscore+4;}
//vnos
$mev=21; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,21,$taopis,'$eventime',4,$homescore,$awayscore)";
}
else {
if ($ekipazzogo==$home_id) {$homescore = $homescore+3;} else {$awayscore = $awayscore+3;}
//vnos
$mev=22; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$favl_nad,$ekipazzogo,0,0,22,$taopis,'$eventime',4,$homescore,$awayscore)";
}
//konec dodatnega meta, kasneje dodam skok
if ($ekipazzogo==$home_id) {$teamwithball = $away_id;} else {$teamwithball = $home_id;}

}

if ($osebna > 16 AND $osebna < 19) {

//OSEBNA V NAPADU

$home_osebna_napad = $homepg1_v_napadu + $homesg1_v_napadu + $homesf1_v_napadu + $homepf1_v_napadu + $homec1_v_napadu;
$away_osebna_napad = $awaypg1_v_napadu + $awaysg1_v_napadu + $awaysf1_v_napadu + $awaypf1_v_napadu + $awayc1_v_napadu;

if ($ekipazzogo==$home_id) {

$osebna_napad = rand(0, $home_osebna_napad);
if ($osebna_napad < $homepg1_v_napadu) {$favlal_v_napadu = $home_pg1; $home_pg1_favli=$home_pg1_favli+1;}
if ($osebna_napad >= $homepg1_v_napadu AND $osebna_napad < ($homepg1_v_napadu+$homesg1_v_napadu)) {$favlal_v_napadu = $home_sg1; $home_sg1_favli=$home_sg1_favli+1;}
if ($osebna_napad >= ($homepg1_v_napadu+$homesg1_v_napadu) AND $osebna_napad < ($homepg1_v_napadu+$homesg1_v_napadu+$homesf1_v_napadu)) {$favlal_v_napadu = $home_sf1; $home_sf1_favli=$home_sf1_favli+1;}
if ($osebna_napad >= ($homepg1_v_napadu+$homesg1_v_napadu+$homesf1_v_napadu) AND $osebna_napad < ($homepg1_v_napadu+$homesg1_v_napadu+$homesf1_v_napadu+$homepf1_v_napadu)) {$favlal_v_napadu = $home_pf1; $home_pf1_favli=$home_pf1_favli+1;}
if ($osebna_napad >= ($homepg1_v_napadu+$homesg1_v_napadu+$homesf1_v_napadu+$homepf1_v_napadu)) {$favlal_v_napadu = $home_c1; $home_c1_favli=$home_c1_favli+1;}
//vnos
$mev=32; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,0,$away_id,$favlal_v_napadu,$ekipazzogo,32,$taopis,'$eventime',4,$homescore,$awayscore)";
//nadaljevanje
$teamwithball = $away_id;
}
else {

$osebna_napad = rand(0, $away_osebna_napad);
if ($osebna_napad < $awaypg1_v_napadu) {$favlal_v_napadu = $away_pg1; $away_pg1_favli=$away_pg1_favli+1;}
if ($osebna_napad >= $awaypg1_v_napadu AND $osebna_napad < ($awaypg1_v_napadu+$awaysg1_v_napadu)) {$favlal_v_napadu = $away_sg1; $away_sg1_favli=$away_sg1_favli+1;}
if ($osebna_napad >= ($awaypg1_v_napadu+$awaysg1_v_napadu) AND $osebna_napad < ($awaypg1_v_napadu+$awaysg1_v_napadu+$awaysf1_v_napadu)) {$favlal_v_napadu = $away_sf1; $away_sf1_favli=$away_sf1_favli+1;}
if ($osebna_napad >= ($awaypg1_v_napadu+$awaysg1_v_napadu+$awaysf1_v_napadu) AND $osebna_napad < ($awaypg1_v_napadu+$awaysg1_v_napadu+$awaysf1_v_napadu+$awaypf1_v_napadu)) {$favlal_v_napadu = $away_pf1; $away_pf1_favli=$away_pf1_favli+1;}
if ($osebna_napad >= ($awaypg1_v_napadu+$awaysg1_v_napadu+$awaysf1_v_napadu+$awaypf1_v_napadu)) {$favlal_v_napadu = $away_c1; $away_c1_favli=$away_c1_favli+1;}
//vnos
$mev=32; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,0,$home_id,$favlal_v_napadu,$ekipazzogo,32,$taopis,'$eventime',4,$homescore,$awayscore)";
//nadaljevanje
$teamwithball = $home_id;
}


//KONEC OSEBNE V NAPADU

}
if ($osebna==19) {

//NAMERNA OSEBNA NAPAKA

$namerna_osebna = rand(0,69);
//switch znotraj switcha
SWITCH (TRUE) {
CASE ($namerna_osebna < 16):
if ($ekipazzogo==$home_id) {$naredil_namerno = $away_pg1; $away_pg1_favli=$away_pg1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $home_pg1; $met_verjetnost = rand(0, $homepg1_freethrow);}
if ($namerna==1) {$namerna_nad = $home_sg1; $met_verjetnost = rand(0, $homesg1_freethrow);}
if ($namerna==2) {$namerna_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
if ($namerna==3) {$namerna_nad = $home_pf1; $met_verjetnost = rand(0, $homepf1_freethrow);}
if ($namerna==4) {$namerna_nad = $home_c1; $met_verjetnost = rand(0, $homec1_freethrow);}
}
else {$naredil_namerno = $home_pg1; $home_pg1_favli=$home_pg1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $away_pg1; $met_verjetnost = rand(0, $awaypg1_freethrow);}
if ($namerna==1) {$namerna_nad = $away_sg1; $met_verjetnost = rand(0, $awaysg1_freethrow);}
if ($namerna==2) {$namerna_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
if ($namerna==3) {$namerna_nad = $away_pf1; $met_verjetnost = rand(0, $awaypf1_freethrow);}
if ($namerna==4) {$namerna_nad = $away_c1; $met_verjetnost = rand(0, $awayc1_freethrow);}
}
break;

CASE ($namerna_osebna > 15 AND $namerna_osebna < 27):
if ($ekipazzogo==$home_id) {$naredil_namerno = $away_sg1; $away_sg1_favli=$away_sg1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $home_pg1; $met_verjetnost = rand(0, $homepg1_freethrow);}
if ($namerna==1) {$namerna_nad = $home_sg1; $met_verjetnost = rand(0, $homesg1_freethrow);}
if ($namerna==2) {$namerna_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
if ($namerna==3) {$namerna_nad = $home_pf1; $met_verjetnost = rand(0, $homepf1_freethrow);}
if ($namerna==4) {$namerna_nad = $home_c1; $met_verjetnost = rand(0, $homec1_freethrow);}
}
else {$naredil_namerno = $home_sg1; $home_sg1_favli=$home_sg1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $away_pg1; $met_verjetnost = rand(0, $awaypg1_freethrow);}
if ($namerna==1) {$namerna_nad = $away_sg1; $met_verjetnost = rand(0, $awaysg1_freethrow);}
if ($namerna==2) {$namerna_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
if ($namerna==3) {$namerna_nad = $away_pf1; $met_verjetnost = rand(0, $awaypf1_freethrow);}
if ($namerna==4) {$namerna_nad = $away_c1; $met_verjetnost = rand(0, $awayc1_freethrow);}
}
break;

CASE ($namerna_osebna > 26 AND $namerna_osebna < 45):
if ($ekipazzogo==$home_id) {$naredil_namerno = $away_sf1; $away_sf1_favli=$away_sf1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $home_pg1; $met_verjetnost = rand(0, $homepg1_freethrow);}
if ($namerna==1) {$namerna_nad = $home_sg1; $met_verjetnost = rand(0, $homesg1_freethrow);}
if ($namerna==2) {$namerna_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
if ($namerna==3) {$namerna_nad = $home_pf1; $met_verjetnost = rand(0, $homepf1_freethrow);}
if ($namerna==4) {$namerna_nad = $home_c1; $met_verjetnost = rand(0, $homec1_freethrow);}
}
else {$naredil_namerno = $home_sf1; $home_sf1_favli=$home_sf1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $away_pg1; $met_verjetnost = rand(0, $awaypg1_freethrow);}
if ($namerna==1) {$namerna_nad = $away_sg1; $met_verjetnost = rand(0, $awaysg1_freethrow);}
if ($namerna==2) {$namerna_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
if ($namerna==3) {$namerna_nad = $away_pf1; $met_verjetnost = rand(0, $awaypf1_freethrow);}
if ($namerna==4) {$namerna_nad = $away_c1; $met_verjetnost = rand(0, $awayc1_freethrow);}
}
break;

CASE ($namerna_osebna > 44 AND $namerna_osebna < 61):
if ($ekipazzogo==$home_id) {$naredil_namerno = $away_pf1; $away_pf1_favli=$away_pf1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $home_pg1; $met_verjetnost = rand(0, $homepg1_freethrow);}
if ($namerna==1) {$namerna_nad = $home_sg1; $met_verjetnost = rand(0, $homesg1_freethrow);}
if ($namerna==2) {$namerna_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
if ($namerna==3) {$namerna_nad = $home_pf1; $met_verjetnost = rand(0, $homepf1_freethrow);}
if ($namerna==4) {$namerna_nad = $home_c1; $met_verjetnost = rand(0, $homec1_freethrow);}
}
else {$naredil_namerno = $home_pf1; $home_pf1_favli=$home_pf1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $away_pg1; $met_verjetnost = rand(0, $awaypg1_freethrow);}
if ($namerna==1) {$namerna_nad = $away_sg1; $met_verjetnost = rand(0, $awaysg1_freethrow);}
if ($namerna==2) {$namerna_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
if ($namerna==3) {$namerna_nad = $away_pf1; $met_verjetnost = rand(0, $awaypf1_freethrow);}
if ($namerna==4) {$namerna_nad = $away_c1; $met_verjetnost = rand(0, $awayc1_freethrow);}
}
break;

CASE ($namerna_osebna > 60):
if ($ekipazzogo==$home_id) {$naredil_namerno = $away_c1; $away_c1_favli=$away_c1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $home_pg1; $met_verjetnost = rand(0, $homepg1_freethrow);}
if ($namerna==1) {$namerna_nad = $home_sg1; $met_verjetnost = rand(0, $homesg1_freethrow);}
if ($namerna==2) {$namerna_nad = $home_sf1; $met_verjetnost = rand(0, $homesf1_freethrow);}
if ($namerna==3) {$namerna_nad = $home_pf1; $met_verjetnost = rand(0, $homepf1_freethrow);}
if ($namerna==4) {$namerna_nad = $home_c1; $met_verjetnost = rand(0, $homec1_freethrow);}
}
else {$naredil_namerno = $home_c1; $home_c1_favli=$home_c1_favli+1;
$namerna = rand(0,4);
if ($namerna==0) {$namerna_nad = $away_pg1; $met_verjetnost = rand(0, $awaypg1_freethrow);}
if ($namerna==1) {$namerna_nad = $away_sg1; $met_verjetnost = rand(0, $awaysg1_freethrow);}
if ($namerna==2) {$namerna_nad = $away_sf1; $met_verjetnost = rand(0, $awaysf1_freethrow);}
if ($namerna==3) {$namerna_nad = $away_pf1; $met_verjetnost = rand(0, $awaypf1_freethrow);}
if ($namerna==4) {$namerna_nad = $away_c1; $met_verjetnost = rand(0, $awayc1_freethrow);}
}
break;
}
//konec switcha v switchu

if ($met_verjetnost > 25) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+2; $mev=30; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$namerna_nad,$ekipazzogo,$naredil_namerno,$away_id,30,$taopis,'$eventime',4,$homescore,$awayscore)";
}
else {$awayscore = $awayscore+2; $mev=30; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$namerna_nad,$ekipazzogo,$naredil_namerno,$home_id,30,$taopis,'$eventime',4,$homescore,$awayscore)";
}
//vnos obeh prostih metov
$mev=14; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$namerna_nad,$ekipazzogo,0,0,14,$taopis,'$eventime',4,$homescore,$awayscore)";
}
elseif ($met_verjetnost > 12 AND $met_verjetnost < 26) {
if ($ekipazzogo==$home_id) {$homescore = $homescore+1; $mev=30; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$namerna_nad,$ekipazzogo,$naredil_namerno,$away_id,30,$taopis,'$eventime',4,$homescore,$awayscore)";
}
else {$awayscore = $awayscore+1; $mev=30; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$namerna_nad,$ekipazzogo,$naredil_namerno,$home_id,30,$taopis,'$eventime',4,$homescore,$awayscore)";
}
//vnos prostega meta
$mev=15; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$namerna_nad,$ekipazzogo,0,0,15,$taopis,'$eventime',4,$homescore,$awayscore)";
}
else {
if ($ekipazzogo==$home_id) {$mev=30; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$namerna_nad,$ekipazzogo,$naredil_namerno,$away_id,30,$taopis,'$eventime',4,$homescore,$awayscore)";
}
else {$mev=30; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$namerna_nad,$ekipazzogo,$naredil_namerno,$home_id,30,$taopis,'$eventime',4,$homescore,$awayscore)";
}
//vnos zgresenih metov
$mev=16; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$namerna_nad,$ekipazzogo,0,0,16,$taopis,'$eventime',4,$homescore,$awayscore)";
}


if ($ekipazzogo==$home_id) {$teamwithball = $home_id;} else {$teamwithball = $away_id;}

}

if ($home_pg1_favli==5) {$bonusdosegel=0; $vengre=$home_pg1; $home_pg1=0; $home_pg1_favli = 0;}
if ($home_sg1_favli==5) {$bonusdosegel=1; $vengre=$home_sg1; $home_sg1=0; $home_sg1_favli = 0;}
if ($home_sf1_favli==5) {$bonusdosegel=2; $vengre=$home_sf1; $home_sf1=0; $home_sf1_favli = 0;}
if ($home_pf1_favli==5) {$bonusdosegel=3; $vengre=$home_pf1; $home_pf1=0; $home_pf1_favli = 0;}
if ($home_c1_favli==5) {$bonusdosegel=4; $vengre=$home_c1; $home_c1=0; $home_c1_favli = 0;}

if ($away_pg1_favli==5) {$bonusdosegel=5; $vengre=$away_pg1; $away_pg1=0; $away_pg1_favli = 0;}
if ($away_sg1_favli==5) {$bonusdosegel=6; $vengre=$away_sg1; $away_sg1=0; $away_sg1_favli = 0;}
if ($away_sf1_favli==5) {$bonusdosegel=7; $vengre=$away_sf1; $away_sf1=0; $away_sf1_favli = 0;}
if ($away_pf1_favli==5) {$bonusdosegel=8; $vengre=$away_pf1; $away_pf1=0; $away_pf1_favli = 0;}
if ($away_c1_favli==5) {$bonusdosegel=9; $vengre=$away_c1; $away_c1=0; $away_c1_favli = 0;}

//KONEC OSEBNIH NAPAK
break;


/* tu se zacne tretji primer, to je tisti izjemni - nadaljevan dogodek */
//dogodek po skoku

CASE 3:
$dogodek_po_skoku = rand(0,4);

//switch znotraj switcha
SWITCH (TRUE) {
CASE ($dogodek_po_skoku < 3):
//zogo dobijo nasprotniki
if ($ekipazzogo==$home_id) {$homescore = $homescore+2; $home2zadeti=$home2zadeti+1; $teamwithball = $away_id;}
else {$awayscore = $awayscore+2; $away2zadeti=$away2zadeti+1; $teamwithball = $home_id;}
$nadaljevandogodek=0;
//vnos
$mev=27; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$nadaljuje_igralec,$ekipazzogo,0,0,27,$taopis,'$eventime',4,$homescore,$awayscore)";
break;

CASE ($dogodek_po_skoku > 2):

/* skok na odbito zogo */

if ($ekipazzogo==$home_id) {
$home2faljeni=$home2faljeni+1;
$tempskok = $homeoffskok + $awaydefskok;
$dobljenskok = rand(0,$tempskok);

$sestevek_skok_home = $homepg1_skok + $homesg1_skok + $homesf1_skok + $homepf1_skok + $homec1_skok;
$skakalec_home = rand(0,$sestevek_skok_home);
if ($skakalec_home <= $homepg1_skok) {$dobil_skok = $home_pg1;}
if ($skakalec_home > $homepg1_skok AND $skakalec_home <= ($homepg1_skok+$homesg1_skok)) {$dobil_skok = $home_sg1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok)) {$dobil_skok = $home_sf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$dobil_skok = $home_pf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$dobil_skok = $home_c1;}

$sestevek_skok_away = $awaypg1_skok + $awaysg1_skok + $awaysf1_skok + $awaypf1_skok + $awayc1_skok;
$skakalec_away = rand(0,$sestevek_skok_away);
if ($skakalec_away <= $awaypg1_skok) {$nasprotnik_skok = $away_pg1;}
if ($skakalec_away > $awaypg1_skok AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok)) {$nasprotnik_skok = $away_sg1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok)) {$nasprotnik_skok = $away_sf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$nasprotnik_skok = $away_pf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$nasprotnik_skok = $away_c1;}

if ($dobljenskok < $homeoffskok) {
$mev=29; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$nadaljuje_igralec,$ekipazzogo,$dobil_skok,$ekipazzogo,29,$taopis,'$eventime',4,$homescore,$awayscore)";
$teamwithball = $ekipazzogo;
$nadaljevandogodek=1;
$nadaljuje_igralec=$dobil_skok;
}
if ($dobljenskok >= $homeoffskok) {
$mev=28; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$nadaljuje_igralec,$ekipazzogo,$nasprotnik_skok,$away_id,28,$taopis,'$eventime',4,$homescore,$awayscore)";
$teamwithball = $away_id;
$nadaljevandogodek=0;
}
}

if ($ekipazzogo==$away_id) {
$away2faljeni=$away2faljeni+1;
$tempskok = $awayoffskok + $homedefskok;
$dobljenskok = rand(0,$tempskok);

$sestevek_skok_away = $awaypg1_skok + $awaysg1_skok + $awaysf1_skok + $awaypf1_skok + $awayc1_skok;
$skakalec_away = rand(0,$sestevek_skok_away);
if ($skakalec_away <= $awaypg1_skok) {$dobil_skok = $away_pg1;}
if ($skakalec_away > $awaypg1_skok AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok)) {$dobil_skok = $away_sg1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok)) {$dobil_skok = $away_sf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok) AND $skakalec_away <= ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$dobil_skok = $away_pf1;}
if ($skakalec_away > ($awaypg1_skok+$awaysg1_skok+$awaysf1_skok+$awaypf1_skok)) {$dobil_skok = $away_c1;}

$sestevek_skok_home = $homepg1_skok + $homesg1_skok + $homesf1_skok + $homepf1_skok + $homec1_skok;
$skakalec_home = rand(0,$sestevek_skok_home);
if ($skakalec_home <= $homepg1_skok) {$nasprotnik_skok = $home_pg1;}
if ($skakalec_home > $homepg1_skok AND $skakalec_home <= ($homepg1_skok+$homesg1_skok)) {$nasprotnik_skok = $home_sg1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok)) {$nasprotnik_skok = $home_sf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok) AND $skakalec_home <= ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$nasprotnik_skok = $home_pf1;}
if ($skakalec_home > ($homepg1_skok+$homesg1_skok+$homesf1_skok+$homepf1_skok)) {$nasprotnik_skok = $home_c1;}

if ($dobljenskok < $awayoffskok) {
$mev=29; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$nadaljuje_igralec,$ekipazzogo,$dobil_skok,$ekipazzogo,29,$taopis,'$eventime',4,$homescore,$awayscore)";
$teamwithball = $ekipazzogo;
$nadaljevandogodek=1;
$nadaljuje_igralec=$dobil_skok;
}
if ($dobljenskok >= $awayoffskok) {
$mev=28; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$nadaljuje_igralec,$ekipazzogo,$nasprotnik_skok,$home_id,28,$taopis,'$eventime',4,$homescore,$awayscore)";
$teamwithball = $home_id;
$nadaljevandogodek=0;
}
}
/* konec skoka */
break;

}
//konec switcha znotraj switcha


break;


/* cetrti primer, igralec ki je ukradel zogo krene v protinapad */

CASE 4:
$dogodek_po_kraji = rand(0,36);

//switch znotraj switcha
SWITCH (TRUE) {
CASE ($dogodek_po_kraji < 24):
//zogo dobijo nasprotniki
if ($ekipazzogo==$home_id) {$homescore = $homescore+2; $home2zadeti=$home2zadeti+1; $teamwithball = $away_id;}
else {$awayscore = $awayscore+2; $away2zadeti=$away2zadeti+1; $teamwithball = $home_id;}
$nadaljevandogodek=0;
//vnos
$mev=23; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$nadaljuje_igralc,$ekipazzogo,0,0,23,$taopis,'$eventime',4,$homescore,$awayscore)";
break;

CASE ($dogodek_po_kraji > 23 AND $dogodek_po_kraji < 27):
//zogo dobijo nasprotniki
if ($ekipazzogo==$home_id) {$homescore = $homescore+3; $teamwithball = $away_id;} else {$awayscore = $awayscore+3; $teamwithball = $home_id;}
$nadaljevandogodek=0;
//vnos
$mev=24; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$nadaljuje_igralc,$ekipazzogo,0,0,24,$taopis,'$eventime',4,$homescore,$awayscore)";
break;

CASE ($dogodek_po_kraji > 26 AND $dogodek_po_kraji < 32):
$nadaljevandogodek=0;
//vnos
$mev=25; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$nadaljuje_igralc,$ekipazzogo,0,0,25,$taopis,'$eventime',4,$homescore,$awayscore)";
break;

CASE ($dogodek_po_kraji > 31):
//zogo dobijo nasprotniki
if ($ekipazzogo==$home_id) {$home_noofTOs=$home_noofTOs+1; $teamwithball = $away_id;} else {$away_noofTOs=$away_noofTOs+1; $teamwithball = $home_id;}
$nadaljevandogodek=0;
//vnos
$mev=26; shuffle($ddogodek[$mev]); $taopis=$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,$nadaljuje_igralc,$ekipazzogo,0,0,26,$taopis,'$eventime',4,$homescore,$awayscore)";
break;
}
//konec switcha znotraj switcha


//konec CELOTNEGA switcha za dogodek
break;
}

$randdd = $randdd + rand(18,24);
$eventime = date("Y-m-d H:i:s", mktime($dbhour,$dbmin+19,$dbsec+$randdd+30,$dbmonth,$dbday,$dbyear));
$stevilodogodkov3++;
if ($stevilodogodkov3==41 AND $homescore==$awayscore AND $homescore != 0 AND $walkover != 14) {$stevilodogodkov3 = $stevilodogodkov3 - 1;}
}

if ($dogodek != 6) {$mev=36; shuffle($ddogodek[$mev]); $k_opis =$ddogodek[$mev][0];
$sql=$sql.", ('',$matchid,0,0,0,0,36,$k_opis,'$eventime',4,$homescore,$awayscore)";
}

echo "\n".$homesk2." v ".$awaysk2." | ".round($homesk3)." v ".round($awaysk3)." | ".round($homeoffskok+$homedefskok)." v ".round($awayoffskok+$awaydefskok)." | ".$hometo." v ".$awayto."   (".$homescore." : ".$awayscore.") ";
if ((($hometo - $homesk2 - $homesk3 - 125) > ($awayto - $awaysk2 - $awaysk3)) AND $homescore < $awayscore AND ($home_def > 0 OR $home_off > 0)) {echo "RAND ";}
if ((($awayto - $awaysk2 - $awaysk3 - 125) > ($hometo - $homesk2 - $homesk3)) AND $homescore > $awayscore AND ($away_def > 0 OR $away_off > 0)) {echo "RAND ";}
if ((($hometo - $homesk2 - $homesk3 - 175) > ($awayto - $awaysk2 - $awaysk3)) AND $homescore < $awayscore AND $neakt==0 AND $home_def==0 AND $home_off==0) {echo "NN ";}
if ((($awayto - $awaysk2 - $awaysk3 - 175) > ($hometo - $homesk2 - $homesk3)) AND $homescore > $awayscore AND $neakt==0 AND $away_def==0 AND $away_off==0) {echo "NN ";}
/*
if ($homesk2 < $awaysk2 AND $homesk3 < $awaysk3 AND $hometo > $awayto AND $homescore < $awayscore AND ($home_def > 0 OR $home_off > 0)) {echo "tot ";}
if ($homesk2 > $awaysk2 AND $homesk3 > $awaysk3 AND $hometo < $awayto AND $homescore > $awayscore AND ($away_def > 0 OR $away_off > 0)) {echo "tot ";}
if ($homesk2 < $awaysk2 AND $homesk3 < $awaysk3 AND $hometo > $awayto AND $homescore < $awayscore AND $neakt==0 AND $home_def==0 AND $home_off==0) {echo "nn ";}
if ($homesk2 > $awaysk2 AND $homesk3 > $awaysk3 AND $hometo < $awayto AND $homescore > $awayscore AND $neakt==0 AND $away_def==0 AND $away_off==0) {echo "nn ";}
*/
if (($homesk2 - $awaysk2 + $homesk3 - $awaysk3) < -50 AND $homescore < $awayscore AND $neakt==0) {echo "SH ";}
if (($awaysk2 - $homesk2 + $awaysk3 - $homesk3) < -50 AND $homescore > $awayscore AND $neakt==0) {echo "SH ";}
if ($rand2ph > 0 AND $homescore > $awayscore) {echo "2P ";}
if ($rand2pa > 0 AND $homescore < $awayscore) {echo "2P ";}
if ($hometo/2 > $awayto AND $homescore < $awayscore AND $neakt==0) {echo "TO";}
if ($awayto/2 > $hometo AND $homescore > $awayscore AND $neakt==0) {echo "TO";}
echo "\n";

//vnos v bazo
$gquery = "INSERT INTO `nt_matchevents` (`event_id`, `match_id`, `player1id`, `team1id`, `player2id`, `team2id`, `event_type`, `desc_id`, `event_time`, `quater`, `home_sc`, `away_sc`) VALUES ".$sql;
$gquery = str_replace("ES , (","ES (",$gquery);
mysql_query($gquery) or die(mysql_error());
$gquery = NULL;
$sql = NULL;

$u++;
}
?>