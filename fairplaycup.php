<?php
$expandmenu1=99;

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$sseason = $_POST["sseason"];
if (!$sseason) {$sseason = $_GET["season"];}
if (!$sseason) {$sseason=$default_season;} /* kasneje dodam -1 */
if (!is_numeric($sseason) OR ($sseason > $default_season) OR ($sseason < 0)) {die(include 'index.php');}

$kgr = $_GET["kgr"];
if ((!$kgr OR $kgr > 145) AND $sseason < 14) {$kgr=0;}
if ((!$kgr OR $kgr > 170) AND $sseason > 13 AND $sseason < 17) {$kgr=0;}
if ((!$kgr OR $kgr > 210) AND $sseason > 16) {$kgr=0;}
if ((!is_numeric($kgr) OR $kgr >146 OR $kgr < 0) AND $sseason < 14) {die(include 'basketsim.php');}
if ((!is_numeric($kgr) OR $kgr >171 OR $kgr < 0) AND $sseason > 13 AND $sseason < 17) {die(include 'basketsim.php');}
if ((!is_numeric($kgr) OR $kgr >211 OR $kgr < 0) AND $sseason > 16) {die(include 'basketsim.php');}

$compare = mysql_query("SELECT lang, supporter FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)) {
$lang = mysql_result($compare,0,"lang");
$suppo = mysql_result($compare,0,"supporter");
} else {die(include 'basketsim.php');}

//kateri krog pokala je aktiven
$krogpokala = mysql_query("SELECT MAX(lid_round) FROM matches WHERE season=$sseason AND type=5") or die(mysql_error());
$krog = mysql_result($krogpokala,0);
$round=$_POST["round"];
if (!$round) {$round=$_GET["round"];}
if (!$round && $kgr==0) {$round = $krog;}
if (!$round && $kgr > 0) {$round=1;}
if ($round > 1 && $kgr > 0) {$kgr=0;}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2>FAIR PLAY CUP</h2>
<?php
//country stats #1
$acto = $_GET['acto'];
if ($round < 9 AND $round==$krog AND $sseason==$default_season AND $acto=='drzave' AND $suppo==1 AND $round==1) {
echo "<table border=\"0\" cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr valign=\"top\" bgcolor=\"#ffffff\"><td class=\"border\" width=\"100%\">";
$dvaqu = mysql_query("SELECT country, count( * ) AS nombr FROM ekipe, teams WHERE ekipa = teamid AND competition =3 GROUP BY country ORDER BY nombr DESC, `country` ASC LIMIT 65");
echo "<i>",mysql_num_rows($dvaqu)," countries are represented in the Fair Play Cup this season.</i><br/><b>Teams per country</b>:<br/><br/>";
while ($numr=mysql_fetch_array($dvaqu)) {
$countDI=$numr['country'];
$nombrDI=$numr['nombr'];
if ($countDI=='Bosnia') {$countDI='Bosnia and Herzergovina';}
echo "<b>",$nombrDI,"</b> - ",$countDI,"<br/>";
}
echo "<br/>[<a href=\"javascript: history.go(-1)\" class=\"greenhilite\"><<</a>]</td></tr></table>";
die();
}
?>
<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="63%">
<?php
$cupmatches = mysql_query("SELECT `matchid` , `home_id` , `home_name` , `away_id` , `away_name` ,  `crowd1` ,`home_score` , `away_score` , `time` FROM `matches` WHERE `type` =5 AND `lid_round`='$round' AND `season`='$sseason' ORDER BY `matchid` ASC ");
$mumic = mysql_num_rows($cupmatches);
if ($mumic < 3 AND $sseason>12) {?><h2>FINAL FOUR</h2><?php }
if ($round > 1 || $sseason < 7) {?>
<table border="0" cellspacing="1" cellpadding="0" width="100%">
<?php
if ($mumic < 3 AND $sseason==13) {?><nobr>&nbsp;
<img src="img/Int/fpc_s14_l1.gif" title="Dunkers" height="129">&nbsp;
<img src="img/Int/fpc_s13_l2.png" title="SportingBasket" width="90">&nbsp;&nbsp;
<img src="img/Int/fpc_s13_l3.jpg" title="EnBW Ludwigsburg" width="86">&nbsp;
<img src="img/Int/fpc_s13_l4.jpg" title="veseli vesoljčki™" width="87"></nobr><hr/>
<?php
} elseif ($mumic < 3 AND $sseason==14) {?><nobr>
<img src="img/Int/fpc_s14_l1.gif" title="Dunkers" height="126">&nbsp;
<img src="img/Int/fpc_s14_l2.jpg" title="Kisújszállás Háry's Angels" width="83">&nbsp;
<img src="img/Int/fpc_s14_l3.png" title="Red Warriors" width="84">&nbsp;
<img src="img/Int/fpc_s14_l4.png" title="BK LatGriz" height="88"></nobr><hr/>
<?php
} elseif ($mumic < 3 AND $sseason==15) {?><nobr>
<img src="img/Int/fpc_s15_l1.png" title="Pankow Rejecters" width="87">&nbsp;
<img src="img/Int/fpc_s15_l2.jpg" title="Extreme Heat" width="87">&nbsp;
<img src="img/Int/fpc_s15_l3.png" title="BK Stienis" height="113">&nbsp;
<img src="img/Int/fpc_s15_l4.gif" title="BT Lipek" width="90"></nobr><hr/>
<?php
} elseif ($mumic < 3 AND $sseason==16) {?><nobr>&nbsp;&nbsp;
<img src="img/Int/fpc_s16_1.png" title="Ravaging Inhuman Beasts" height="105">&nbsp;&nbsp;&nbsp;
<img src="img/Int/fpc_s16_2.jpg" title="JUVIRTUS" height="91">&nbsp;&nbsp;
<img src="img/Int/fpc_s16_3.png" title="ARIS K. SCHOLARIOU" height="114">&nbsp;
<img src="img/Int/fpc_s16_4.jpg" title="orangutanu bars" height="94"></nobr><hr/>
<?php
} elseif ($mumic < 3 AND $sseason==17) {?><nobr>&nbsp;&nbsp;
<img src="http://www.freebits.nl/images/815NLbasketbalstars4.jpg" title="Northern Lights" height="115">&nbsp;&nbsp;&nbsp;
<img src="http://img378.imageshack.us/img378/1723/beastie1se8.png" title="EJ's BeastieBoys" height="115">&nbsp;
<img src="http://img24.imageshack.us/img24/4807/vounariacopyak3.jpg" title="Vounaria B.C." height="115">&nbsp;&nbsp;&nbsp;&nbsp;
<img src="http://i717.photobucket.com/albums/ww172/sstartee/TopGunlogo.png" title="Top Gun" height="115"></nobr><hr/>
<?php
} elseif ($mumic < 3 AND $sseason==18) {?><br/><nobr>&nbsp;&nbsp;
<img src="http://mrgdawg.com/KOGBB/basketball_-_eagle_2.gif" title="marsk aru" height="115">&nbsp;
<img src="https://imageshack.us/a/img259/1065/pravilogo22.png" title="100% gubimo" height="115">&nbsp;&nbsp;
<img src="http://i165.photobucket.com/albums/u71/kaloian40/Logos%20and%20kits/bcreg_zpsc2219a83.png" title="BK Reiņugals" height="115">&nbsp;&nbsp;
<img src="http://desmond.imageshack.us/Himg43/scaled.php?server=43&filename=greencelticbernbsemblem.png&res=landing" title="Celtic Bern" height="115"></nobr><hr/>
<?php
} elseif ($mumic < 3 AND $sseason==19) {?><nobr>&nbsp;
<img src="http://www.basketsim.com/img/shirts/black6.gif" title="Hesusators" height="85">&nbsp;&nbsp;
<img src="http://desmond.imageshack.us/Himg43/scaled.php?server=43&filename=greencelticbernbsemblem.png&res=landing" title="Celtic Bern" height="115">
<img src="http://www.biokia.fi/biokia/wp-content/uploads/2010/10/karpalo.jpg" title="Karjalan Palloseura" height="92">
<img src="http://shrani.si/f/m/Dx/2ShEJL3x/1/polz.png" title="ŠD Hitri polži" height="115"></nobr><hr/>
<?php
} elseif ($mumic < 3 AND ($sseason==20 OR $sseason==21)) {?><br><hr/>
<?php
}
while ($m=mysql_fetch_array($cupmatches)) {
$matchid=$m[matchid];
$home_id=$m[home_id];
$home_name=$m[home_name];
$away_id=$m[away_id];
$away_name=$m[away_name];
$crowd=$m[crowd1];
$home_score=$m[home_score];
$away_score=$m[away_score];
$time1=$m[time];
if ($home_score==$away_score) {$dabu1='black'; $dabu2='black';} elseif ($home_score > $away_score) {$dabu1='black'; $dabu2='gray';} else {$dabu2='black'; $dabu1='gray';}
$result1 = mysql_query("SELECT name, country FROM teams WHERE teamid ='$home_id' LIMIT 1");
if ($home_name=='') {$home_named = mysql_result($result1,0,"name"); $home_name = stripslashes($home_named);}
$home_country = mysql_result($result1,0,"country");
$result2 = mysql_query("SELECT name, country FROM teams WHERE teamid ='$away_id' LIMIT 1");
if ($away_name=='') {$away_named = mysql_result($result2,0,"name"); $away_name = stripslashes($away_named);}
$away_country = mysql_result($result2,0,"country");
?>
<tr>
<td align="left" width="42%">
<img src="img/Flags/<?=$home_country?>.png" border="1" alt="<?=$home_country?>" title="<?=$home_country?>">&nbsp;<font color="<?=$dabu1?>"><a href="redirect.php?teamid=<?=$home_id?>" class="greenhilite"><?=$home_name?></a></font></td>
<td align="center" width="12%">
<?php if ($home_score+$away_score==21 && $time1 < '2009-01-11 22:30:01') {?><a href="prikaz_wo.php?matchid=<?=$matchid?>"><?php } else {?><a href="prikaz.php?matchid=<?=$matchid?>"><?php }
if ($home_score+$away_score==0 && $crowd >0) {echo "LIVE";} else {?>
<?=$home_score?>&nbsp;:&nbsp;<?=$away_score?><?php }?>
</a></td><td align="right" width="42%"><font color="<?=$dabu2?>"><a href="redirect.php?teamid=<?=$away_id?>" class="greenhilite"><?=$away_name?></a></font>&nbsp;<img src="img/Flags/<?=$away_country?>.png" border="1" alt="<?=$away_country?>" title="<?=$away_country?>"></td></tr>
<?php
}
if ($mumic==4 AND $sseason==$default_season) {echo "<tr><td colspan=\"5\"><br/><i>Winners of the quarterfinals will qualify for the Final Four!<br/>Final Four will start on 22nd of August.<br/>Competition host will be decided soon.</i></td></tr>";}

//country stats
if ($round < 9 AND $round==$krog AND $sseason==$default_season AND $acto=='drzave') {
echo "<tr><td colspan=\"3\"><br/>";
$dvaqu = mysql_query("SELECT country, count( * ) AS nombr FROM ekipe, teams WHERE ekipa = teamid AND competition =3 GROUP BY country ORDER BY nombr DESC, `country` ASC LIMIT 65");
echo "<i>",mysql_num_rows($dvaqu)," countries are still represented in the Fair Play Cup this season.</i><br/><b>Teams per country</b>:<br/><br/>";
while ($numr=mysql_fetch_array($dvaqu)) {
$countDI=$numr['country'];
$nombrDI=$numr['nombr'];
if ($countDI=='Bosnia') {$countDI='Bosnia and Herzergovina';}
echo "<b>",$nombrDI,"</b> - ",$countDI,"<br/>";
}
echo "<br/>[<a href=\"javascript: history.go(-1)\" class=\"greenhilite\"><<</a>]</td></tr>";
}
elseif ($round < 9 AND $round==$krog AND $sseason==$default_season AND $acto<>'drzave') {echo "<tr><td colspan=\"3\"><br/><a href=\"fairplaycup.php?acto=drzave\">Country stats</a></td></tr>";}

}
elseif ($round==1 && $kgr==0 && $sseason >= 7) {
?>
<table cellpadding="0" cellspacing="0" width="100%" border="0">
<tr><td><b>GROUP 1</b></td><td align="right"><a href="fairplaycup.php?kgr=1&season=<?=$sseason?>">fixtures</a></td></tr>
<tr><td colspan="3"><hr/></td></tr>
<?php
$fgrupe = mysql_query("SELECT `teamname`, `country`, `userid`, `won`, `lost`, `scored`, `against` FROM `fpgroups` WHERE `season` = '$sseason' ORDER BY `GROUP` ASC , `won` DESC , `difference` DESC , `scored` DESC , `against` ASC , `teamname` ASC") or die(mysql_error());
while ($neki=mysql_fetch_array($fgrupe)) {
$teamname1=$neki['teamname'];
$country1=$neki['country'];
$linknatim=$neki['userid'];
$won1=$neki['won'];
$lost1=$neki['lost'];
$scored1=$neki['scored'];
$against1=$neki['against'];
$played1=$won1+$lost1;
$stev = $stev+1;
if (((($stev+5) % 6 ==0 || ($stev+4) % 6 ==0 || ($stev+3) % 6 ==0) AND $sseason < 17) OR ((($stev+5) % 6 ==0 || ($stev+4) % 6 ==0) AND $sseason > 16)){
?><tr bgcolor="#FFCC99"><?php } elseif ((($stev+3) % 6 ==0) AND $sseason > 16){?><tr bgcolor="#FFEDBF"><?php } else {echo "<tr>";}?>
<td><img src="img/Flags/<?=$country1?>.png" border="1" alt="<?=$country1?>" title="<?=$neki[country]?>">&nbsp;
<a href="club.php?clubid=<?=$linknatim?>" class="greenhilite"><?=stripslashes($teamname1)?></a>
</td><td align="right"><span title="Wins - Losses"><?=$won1,"&nbsp;-&nbsp;",$lost1,"</span><span title=\"Points scored by a team : Points scored against a team\">&nbsp;(",$scored1,"&nbsp;:&nbsp;",$against1,")</span>"?></td></tr>
<?php if ((!($stev % 6) AND ($stev/6)+1 < 146 AND $sseason < 14) OR (!($stev % 6) AND ($stev/6)+1 < 171 AND $sseason > 13 AND $sseason < 17) OR (!($stev % 6) AND ($stev/6)+1 < 211 AND $sseason > 16)) {echo "<tr><td colspan=\"3\"><br/></td></tr><tr><td><b>GROUP ",(($stev/6)+1),"</b></td><td align=\"right\"><a href=\"fairplaycup.php?kgr=",(($stev/6)+1),"&season=",$sseason,"\">fixtures</a></td></tr><tr><td colspan=\"3\"><hr/></td></tr>";}
}
}
elseif ($round==1 AND $kgr<>0) {
?>
<table cellpadding="0" cellspacing="0" width="100%" border="0">
<tr><td><b>GROUP <?=$kgr?></b></td><td align="right">[<a href="fairplaycup.php?kgr=<?=($kgr-1)?>&season=<?=$sseason?>" class="greenhilite" title="Previous group">«</a>]&nbsp;[<a href="fairplaycup.php?kgr=<?=($kgr+1)?>&season=<?=$sseason?>" class="greenhilite" title="Next group">»</a>]</td></tr>
<tr><td colspan="3"><hr/></td></tr>
<?php
$fgrupe = mysql_query("SELECT ekipa, `teamname`, `country`, `userid`, `won`, `lost`, `scored`, `against` FROM `fpgroups` WHERE `season` = '$sseason' && `GROUP`='$kgr' ORDER BY won DESC, difference DESC, scored DESC, against ASC, teamname ASC") or die(mysql_error());
while ($neki = mysql_fetch_array($fgrupe)) {
$stev = $stev+1;
$gent=$stev-1;
$array_ekipa[$gent] = $neki[ekipa];
$teamname1=$neki[teamname];
$country1=$neki[country];
$linknatim=$neki['userid'];
$won1=$neki['won'];
$lost1=$neki['lost'];
$scored1=$neki['scored'];
$against1=$neki['against'];
$played1=$won1+$lost1;
$lost1=$played1-$won1;
if (((($stev+5) % 6 ==0 || ($stev+4) % 6 ==0 || ($stev+3) % 6 ==0) AND $sseason < 17) OR ((($stev+5) % 6 ==0 || ($stev+4) % 6 ==0) AND $sseason > 16)){
?><tr bgcolor="#FFCC99"><?php } elseif ((($stev+3) % 6 ==0) AND $sseason > 16){?><tr bgcolor="#FFEDBF"><?php } else {echo "<tr>";}?>
<td><img src="img/Flags/<?=$country1?>.png" border="1" alt="<?=$country1?>" title="<?=$neki[country]?>">&nbsp;
<a href="club.php?clubid=<?=$linknatim?>" class="greenhilite"><?=stripslashes($teamname1)?></a>
<?php
if ($stev==1 AND $sseason==$default_season) {echo "&nbsp;<a href=\"fpgroups4th.php?act=top&oba=",$linknatim,"\"><img src=\"img/fpclink.gif\" title=\"Projected top seeds\" alt=\"Projected top seeds\" border=\"0\"></a>";}
if ($stev==3 AND $sseason==$default_season) {echo "&nbsp;<a href=\"fpgroups4th.php?oba=",$linknatim,"\"><img src=\"img/fpclink.gif\" title=\"Best 3rd placed teams\" alt=\"Best 3rd placed teams\" border=\"0\"></a>";}
?>
</td><td align="right"><span title="Wins - Losses"><?=$won1,"&nbsp;-&nbsp;",$lost1,"</span><span title=\"Points scored by a team : Points scored against a team\">&nbsp;(",$scored1,"&nbsp;:&nbsp;",$against1,")</span>"?></td></tr>
<?php
}
$nmatches = mysql_query("SELECT matchid, home_id, `home_name`, away_id, `away_name`, crowd1, home_score, away_score FROM `matches` WHERE lid_round = 1 AND type =5 AND season=$sseason AND (home_id =$array_ekipa[0] OR home_id =$array_ekipa[1] OR home_id =$array_ekipa[2] OR home_id =$array_ekipa[3] OR home_id =$array_ekipa[4] OR home_id =$array_ekipa[5])  ORDER BY `time` ASC") or die(mysql_error());
while ($mat = mysql_fetch_array($nmatches)) {
$dod=$dod+1;
$matchid = $mat[matchid];
$home_id = $mat[home_id];
$home_named = $mat[home_name];
$away_id = $mat[away_id];
$away_named = $mat[away_name];
$crowds = $mat[crowd1];
$homes = $mat[home_score];
$aways = $mat[away_score];
if (!$home_named) {$result1 = mysql_query("SELECT name FROM teams WHERE teamid ='$home_id'");
while ($hometn = mysql_fetch_array($result1, MYSQL_ASSOC))
   {   foreach ($hometn as $home_named)
   {$home_named; }     } ;
} if (!$away_named) {$result2 = mysql_query("SELECT name FROM teams WHERE teamid ='$away_id'");
while ($awaytn = mysql_fetch_array($result2, MYSQL_ASSOC))
   {   foreach ($awaytn as $away_named)
   {$away_named; }     } ;
}
if ($dod==1 || $dod==4 || $dod==7 || $dod==10 || $dod==13) {
?><tr><td colspan="3"><br/></td></tr><?php }?>
<tr><td><a href="redirect.php?teamid=<?=$home_id?>" class="greenhilite"><?=stripslashes($home_named),"</a><b>  -  </b><a href=\"redirect.php?teamid=",$away_id,"\" class=\"greenhilite\">",stripslashes($away_named)?></a></td>
<td align="right"><a href="prikaz.php?matchid=<?=$matchid?>"><?php if ($homes+$aways==0 && $crowds >0) {echo "LIVE";} else {?><?=$homes?>&nbsp;:&nbsp;<?=$aways?><?php }?></td></tr>
<?php
}
}
echo "</table>";

if ($mumic==1 && $sseason==12) {echo "<br/><i>Hosted by <a href=\"cheerleaders.php?squad=9133\">Helldome</a> (Belgium), 42000 seats</i><br/>";}
if ($mumic==1 && $sseason==12) {
?>
<br/><br/>
<table width="100%" border="0" cellspacing="0" cellpadding="0"><tr>
<td align="left"><img src="img/Int/fpc_s12_l1.jpg" border="0" title="tunaUPSA" width="137"></td><td align="center"><b>VS.</b></td><td align="right"><img src="img/Int/fpc_s12_l2.gif" border="0" title="BC VeebiLoto.eu" width="137"></td></tr></table>
<br/><hr/>Congrats to the winner and big "Thank You" to all who <a href="supporter.php">support</a> Basketsim!<hr/>
<?php
//echo "<br/><hr/><i>Fair Play Cup final will be played today, starting at 17:30</i><hr/>";
}
if ($round > 8 AND $sseason==13) {?>
<hr/><b>Final Four host</b>: <a href="cheerleaders.php?squad=7889">Kreuzberger Kiez</a><br/>
<br/><i>
25.08. at 18:30 - first semifinal<br/>
25.08. at 21:00 - second semifinal<br/>
26.08. at 18:30 - FAIR PLAY CUP FINAL<br/>
26.08. at 21:00 - All Star Game: <a href="nt_prikaz.php?matchid=10424">Europe vs World</a></i>
<?php
}
if ($round > 8 AND $sseason==14) {?>
<hr/><b>Final Four host</b>: <a href="cheerleaders.php?squad=19493">Attiswil Staples Center</a><br/>
<br/><i>
05.01. at 18:30 - first semifinal<br/>
05.01. at 21:00 - second semifinal<br/>
06.01. at 18:30 - FAIR PLAY CUP FINAL<br/>
06.01. at 21:00 - All Star Game: <a href="nt_prikaz.php?matchid=11553">Europe vs World</a></i>
<!--<br/><br/><br/><b>
14th Fair Play Cup will begin on 23rd of February<br/>
Groups will be drawn on Monday, 20th of February<br/>
All supporters (unless still in CS/CWS) will be included</b>-->
<?php
}
if ($round > 8 AND $sseason==15) {?>
<hr/><b>Final Four host</b>: <a href="cheerleaders.php?squad=11695">Nargothrond Main Cave</a><br/>
<br/><i>
17.05. at 18:30 - first semifinal<br/>
17.05. at 21:00 - second semifinal<br/>
18.05. at 18:30 - FAIR PLAY CUP FINAL<br/>
18.05. at 21:00 - <a href="nt_prikaz.php?matchid=12634">All Star Game</a>: <a href="nationalteams.php?country=Europe" class="greenhilite">Europe</a> vs <a href="nationalteams.php?country=World" class="greenhilite">World</a> (<a href="nt_prikaz.php?matchid=10424">1:0</a>) (<a href="nt_prikaz.php?matchid=11553">1:1</a>)</i>
<?php
}
if ($round > 8 AND $sseason==16) {?>
<hr/><b>Final Four host</b>: <a href="cheerleaders.php?squad=24708">Pen ar Bed Stadium</a><br/>
<br/><i>
25.10. at 18:30 - first semifinal<br/>
25.10. at 21:00 - second semifinal<br/>
26.10. at 19:30 - FAIR PLAY CUP FINAL<br/>
26.10. at 21:00 - <a href="nt_prikaz.php?matchid=13715">All Star Game</a>: <a href="nationalteams.php?country=Europe" class="greenhilite">Europe</a> vs <a href="nationalteams.php?country=World" class="greenhilite">World</a> (<a href="nt_prikaz.php?matchid=10424">1:0</a>) (<a href="nt_prikaz.php?matchid=11553">1:1</a>) (<a href="nt_prikaz.php?matchid=12634">1:2</a>)</i>
<?php
}
if ($round > 8 AND $sseason==17) {?>
<hr/><b>Final Four host</b>: <a href="cheerleaders.php?squad=19618">Awesome Arena</a><br/>
<br/><i>
07.03. at 18:30 - first semifinal<br/>
07.03. at 21:00 - second semifinal<br/>
08.03. at 18:30 - FAIR PLAY CUP FINAL<br/>
08.03. at 21:00 - <a href="nt_prikaz.php?matchid=14762">All Star Game</a>: <a href="nationalteams.php?country=Europe" class="greenhilite">Europe</a> vs <a href="nationalteams.php?country=World" class="greenhilite">World</a> (<a href="nt_prikaz.php?matchid=10424">1:0</a>) (<a href="nt_prikaz.php?matchid=11553">1:1</a>) (<a href="nt_prikaz.php?matchid=12634">1:2</a>) (<a href="nt_prikaz.php?matchid=13715">1:3</a>)</i>
<?php
}
if ($round > 8 AND $sseason==18) {?>
<hr/><b>Final Four host</b>: <a href="cheerleaders.php?squad=14534">Point Guard Arena</a><br/>
<br/><i>
18.07. at 18:30 - first semifinal<br/>
18.07. at 21:00 - second semifinal<br/>
19.07. at 18:30 - FAIR PLAY CUP FINAL<br/>
19.07. at 21:00 - <a href="nt_prikaz.php?matchid=15899">All Star Game</a>: <a href="nationalteams.php?country=Europe" class="greenhilite">Europe</a> vs <a href="nationalteams.php?country=World" class="greenhilite">World</a> (<a href="nt_prikaz.php?matchid=10424">1:0</a>) (<a href="nt_prikaz.php?matchid=11553">1:1</a>) (<a href="nt_prikaz.php?matchid=12634">1:2</a>) (<a href="nt_prikaz.php?matchid=13715">1:3</a>) (<a href="nt_prikaz.php?matchid=14762">2:3</a>)</i>
<?php
}
if ($round > 8 AND $sseason==19) {?>
<hr/><b>Final Four host</b>: <a href="cheerleaders.php?squad=25230">Basil Poledouris Arena</a><br/>
<br/><i>
28.11. at 18:30 - first semifinal<br/>
28.11. at 21:00 - second semifinal<br/>
29.11. at 18:30 - FAIR PLAY CUP FINAL<br/>
29.11. at 21:00 - <a href="nt_prikaz.php?matchid=17043">All Star Game</a>: <a href="nationalteams.php?country=Europe" class="greenhilite">Europe</a> vs <a href="nationalteams.php?country=World" class="greenhilite">World</a> (<a href="nt_prikaz.php?matchid=10424">1:0</a>) (<a href="nt_prikaz.php?matchid=11553">1:1</a>) (<a href="nt_prikaz.php?matchid=12634">1:2</a>) (<a href="nt_prikaz.php?matchid=13715">1:3</a>) (<a href="nt_prikaz.php?matchid=14762">2:3</a>) (<a href="nt_prikaz.php?matchid=15899">3:3</a>)</i>
<?php
}
if ($round > 8 AND $sseason==20) {?>
<hr/><b>Final Four host</b>: <a href="cheerleaders.php?squad=18283">Action Stadium</a><br/>
<br/><i>
10.04. at 19:30 - first semifinal<br/>
11.01. at 21:00 - second semifinal<br/>
14.04. at 23:59 - FAIR PLAY CUP FINAL<br/>
18.04. at 22:30 - <a href="nt_prikaz.php?matchid=18220">All Star Game</a>: <a href="nationalteams.php?country=Europe" class="greenhilite">Europe</a> vs <a href="nationalteams.php?country=World" class="greenhilite">World</a> (<a href="nt_prikaz.php?matchid=10424">1:0</a>) (<a href="nt_prikaz.php?matchid=11553">1:1</a>) (<a href="nt_prikaz.php?matchid=12634">1:2</a>) (<a href="nt_prikaz.php?matchid=13715">1:3</a>) (<a href="nt_prikaz.php?matchid=14762">2:3</a>) (<a href="nt_prikaz.php?matchid=15899">3:3</a>)</i> (<a href="nt_prikaz.php?matchid=17043">4:3</a>)</i>
<?php
}
if ($round > 8 AND $sseason==21) {?>
<hr/><b>Final Four host</b>: <a href="cheerleaders.php?squad=9563">COLOSO</a><br/>
<br/><i>
22.08. at 18:30 - first semifinal<br/>
22.08. at 21:00 - second semifinal<br/>
24.08. at 18:30 - FAIR PLAY CUP FINAL<br/>
24.08. at 21:30 - <a href="nt_prikaz.php?matchid=19361">All Star Game</a>: <a href="nationalteams.php?country=Europe" class="greenhilite">Europe</a> vs <a href="nationalteams.php?country=World" class="greenhilite">World</a> (<a href="nt_prikaz.php?matchid=10424">1:0</a>) (<a href="nt_prikaz.php?matchid=11553">1:1</a>) (<a href="nt_prikaz.php?matchid=12634">1:2</a>) (<a href="nt_prikaz.php?matchid=13715">1:3</a>) (<a href="nt_prikaz.php?matchid=14762">2:3</a>) (<a href="nt_prikaz.php?matchid=15899">3:3</a>)</i> (<a href="nt_prikaz.php?matchid=17043">4:3</a>) (<a href="nt_prikaz.php?matchid=18220">4:4</a>)</i>
<?php
}
if ($round > 8 AND $sseason==22) {?>
<hr/><b>Final Four host</b>: <a href="cheerleaders.php?squad=11430">Malpis no va a subir</a><br/>
<br/><i>
16.07. at 18:30 - first semifinal<br/>
16.07. at 21:00 - second semifinal<br/>
17.07. at 18:30 - FAIR PLAY CUP FINAL<br/>
17.07. at 21:00 - All Star Game TBA

<?php
}
//MVP
if ($mumic==1) {
if ($sseason > 12) {echo "<br/>";}
$hahaha = mysql_query("SELECT player, name, surname, teamname FROM top_players, players WHERE player=players.id AND type=5 AND season='$sseason'") or die(mysql_error());
if (mysql_num_rows($hahaha)) {
$idMVP = mysql_result($hahaha,0,"player");
$namMVP = mysql_result($hahaha,0,"name");
$surMVP = mysql_result($hahaha,0,"surname");
$teamMVP = mysql_result($hahaha,0,"teamname");
echo "<br/>Fair Play Cup MVP award: <a href=\"player.php?playerid=",$idMVP,"\">",$namMVP," ",$surMVP,"</a> (",stripslashes($teamMVP),")";
} elseif($sseason==$default_season) {echo "<br/><i>Fair Play Cup MVP award will be awarded after the final is played.";} else {echo "<br/>Fair Play Cup MVP: <i>retired player</i>";}
}
?>
</td><td class="border" width="37%">

<big>Fair Play Cup</big><br/>

<form method="post" action="fairplaycup.php" style="margin: 0">
<select name="round" class="inputreg">
<?php if ($krog > 0 || $sseason < $default_season){?><option value="1" <?php if ($round==1){echo "selected";}?>><?=$langmark367?> 1</option><?php } ?>
<?php if ($krog > 1 || $sseason < $default_season){?><option value="2" <?php if ($round==2){echo "selected";}?>><?=$langmark367?> 2</option><?php } ?>
<?php if ($krog > 2 || $sseason < $default_season){?><option value="3" <?php if ($round==3){echo "selected";}?>><?=$langmark367?> 3</option><?php } ?>
<?php if ($krog > 3 || $sseason < $default_season){?><option value="4" <?php if ($round==4){echo "selected";}?>><?=$langmark367?> 4</option><?php } ?>
<?php if ($krog > 4 || $sseason < $default_season){?><option value="5" <?php if ($round==5){echo "selected";}?>><?=$langmark367?> 5</option><?php } ?>
<?php if ($krog > 5 || $sseason < $default_season){?><option value="6" <?php if ($round==6){echo "selected";}?>><?=$langmark367?> 6</option><?php } ?>
<?php if ($krog > 6 || $sseason < $default_season){?><option value="7" <?php if ($round==7){echo "selected";}?>><?=$langmark367?> 7</option><?php } ?>
<?php if ($krog > 7 || $sseason < $default_season){?><option value="8" <?php if ($round==8){echo "selected";}?>><?=$langmark367?> 8</option><?php } ?>
<?php if ($krog > 8 || $sseason < $default_season){?><option value="9" <?php if ($round==9){echo "selected";}?>><?=$langmark367?> 9</option><?php } ?>
<?php if (($krog > 9 || $sseason < $default_season) && $sseason >2){?><option value="10" <?php if ($round==10){echo "selected";}?>><?=$langmark367?> 10</option><?php } ?>
<?php if ($krog > 10){?><option value="11" <?php if ($round==11){echo "selected";}?>><?=$langmark367?> 11</option><?php } ?>
<?php if ($krog > 11){?><option value="12" <?php if ($round==12){echo "selected";}?>><?=$langmark367?> 12</option><?php } ?>
</select>
<select name="sseason" class="inputreg">
<?php
$kose = $default_season;
while($kose >= 2) {?>
<option value="<?=$kose?>" <?php if($sseason==$kose){echo "selected";}?>><?=$langmark502," ",$kose?></option>
<?php
$kose--;
}
?>
</select>
<input type="submit" value="&nbsp;&raquo;" name="submit" class="buttonreg">
</form>

<?php
if ($round==1 AND $sseason >6) {?>
<br/><b><?=$langmark369?>:</b><br/>2 teams from each group qualify, as well as some <a href="fpgroups4th.php">best 3rd placed teams</a>. Best teams from group round are seeded for elimination rounds. There is no ticket money, but also no injuries or tiredness.<br/>
<?php
}
elseif ($round >1 AND $sseason >6) {
if ($round<>10) {?><br/><b><?=$langmark369?>:</b><br/>All match winners qualify for the next round. <a href="fpgroups4th.php?act=top">Draw is based on group round success</a>. There is no ticket money, but also no harsh injuries or tiredness.<br/><?php }
}
else {?>
<br/><b><?=$langmark369?>:</b><br/>
<?=$langmark1518?><br/>
<?=$langmark370?><br/>
<?=$langmark1517?><br/>
<?php
}

if ($krog < 10) {
?>
<br/><h2>Outright odds</h2><br/>
<?php
$supp3 = $_GET["supp"];
if ($supp3==10 AND $suppo==1) {
$bzook = @mysql_query("SELECT userid, name, odds FROM ekipe, teams, users WHERE club=ekipa and teamid=club and competition=3");
$stevaf = @mysql_num_rows($bzook);
while ($odas=@mysql_fetch_array($bzook)) {
$userLI = $odas[userid];
$nameLI = $odas[name];
$oddsLI = $odas[odds];
if ($gemn==2) {$oddsLI=$oddsLI/3;} elseif ($gemn==4) {$oddsLI=$oddsLI/1.5;} else {$oddsLI=$oddsLI/0.66;}
if ($oddsLI > 50001) {$oddsLI=50001;}
if ($oddsLI < 1.23) {$priOD='1-5';}
elseif ($oddsLI > 1.22 AND $oddsLI < 1.30) {$priOD='1-4';}
elseif ($oddsLI > 1.29 AND $oddsLI < 1.37) {$priOD='1-3';}
elseif ($oddsLI > 1.36 AND $oddsLI < 1.46) {$priOD='2-5';}
elseif ($oddsLI > 1.45 AND $oddsLI < 1.56) {$priOD='1-2';}
elseif ($oddsLI > 1.55 AND $oddsLI < 1.64) {$priOD='3-5';}
elseif ($oddsLI > 1.63 AND $oddsLI < 1.71) {$priOD='2-3';}
elseif ($oddsLI > 1.70 AND $oddsLI < 1.78) {$priOD='3-4';}
elseif ($oddsLI > 1.77 AND $oddsLI < 1.91) {$priOD='4-5';}
elseif ($oddsLI > 1.90 AND $oddsLI < 2.10) {$priOD='1-1';}
elseif ($oddsLI > 2.09 AND $oddsLI < 2.23) {$priOD='6-5';}
elseif ($oddsLI > 2.22 AND $oddsLI < 2.30) {$priOD='5-4';}
elseif ($oddsLI > 2.29 AND $oddsLI < 2.37) {$priOD='4-3';}
elseif ($oddsLI > 2.36 AND $oddsLI < 2.46) {$priOD='7-5';}
elseif ($oddsLI > 2.45 AND $oddsLI < 2.56) {$priOD='3-2';}
elseif ($oddsLI > 2.55 AND $oddsLI < 2.64) {$priOD='8-5';}
elseif ($oddsLI > 2.63 AND $oddsLI < 2.71) {$priOD='5-3';}
elseif ($oddsLI > 2.70 AND $oddsLI < 2.78) {$priOD='7-4';}
elseif ($oddsLI > 2.77 AND $oddsLI < 2.91) {$priOD='9-5';}
elseif ($oddsLI > 2.90 AND $oddsLI < 3.13) {$priOD='2-1';}
elseif ($oddsLI > 3.12 AND $oddsLI < 3.30) {$priOD='9-4';}
elseif ($oddsLI > 3.29 AND $oddsLI < 3.42) {$priOD='7-3';}
elseif ($oddsLI > 3.41 AND $oddsLI < 3.59) {$priOD='5-2';}
elseif ($oddsLI > 3.58 AND $oddsLI < 3.84) {$priOD='8-3';}
elseif ($oddsLI > 3.83 AND $oddsLI < 4.26) {$priOD='3-1';}
elseif ($oddsLI > 4.25 AND $oddsLI < 4.76) {$priOD='7-2';}
elseif ($oddsLI > 5.25 AND $oddsLI < 5.63) {$priOD='9-2';}
else {$priOD=round($oddsLI-1)."-1";}
$nnn++;
if ($nnn < 16) {echo $priOD," <a href=\"club.php?clubid=",$userLI,"\">",stripslashes($nameLI),"</a><br/>";}
if ($nnn==16) {echo "<br/>...<br/><br/>"; $yuc=44;}
if ($nnn > $stevaf - 5 AND $yuc==44) {echo $priOD," <a href=\"club.php?clubid=",$userLI,"\">",stripslashes($nameLI),"</a><br/>";}
}
}
else
{
$bzook = @mysql_query("SELECT userid, name, odds FROM ekipe, teams, users WHERE club=ekipa and teamid=club and competition=3 LIMIT 5");
$gemn = @mysql_num_rows($bzook);
while ($odas=@mysql_fetch_array($bzook)) {
$glj=$glj+1;
$userLI = $odas[userid];
$nameLI = $odas[name];
$oddsLI = $odas[odds];
if ($gemn==2) {$oddsLI=$oddsLI/3;} elseif ($gemn==4) {$oddsLI=$oddsLI/1.5;} else {$oddsLI=$oddsLI/0.66;}
if ($oddsLI > 50001) {$oddsLI=50001;}
if ($oddsLI < 1.23) {$priOD='1-5';}
elseif ($oddsLI > 1.22 AND $oddsLI < 1.30) {$priOD='1-4';}
elseif ($oddsLI > 1.29 AND $oddsLI < 1.37) {$priOD='1-3';}
elseif ($oddsLI > 1.36 AND $oddsLI < 1.46) {$priOD='2-5';}
elseif ($oddsLI > 1.45 AND $oddsLI < 1.56) {$priOD='1-2';}
elseif ($oddsLI > 1.55 AND $oddsLI < 1.64) {$priOD='3-5';}
elseif ($oddsLI > 1.63 AND $oddsLI < 1.71) {$priOD='2-3';}
elseif ($oddsLI > 1.70 AND $oddsLI < 1.78) {$priOD='3-4';}
elseif ($oddsLI > 1.77 AND $oddsLI < 1.91) {$priOD='4-5';}
elseif ($oddsLI > 1.90 AND $oddsLI < 2.10) {$priOD='1-1';}
elseif ($oddsLI > 2.09 AND $oddsLI < 2.23) {$priOD='6-5';}
elseif ($oddsLI > 2.22 AND $oddsLI < 2.30) {$priOD='5-4';}
elseif ($oddsLI > 2.29 AND $oddsLI < 2.37) {$priOD='4-3';}
elseif ($oddsLI > 2.36 AND $oddsLI < 2.46) {$priOD='7-5';}
elseif ($oddsLI > 2.45 AND $oddsLI < 2.56) {$priOD='3-2';}
elseif ($oddsLI > 2.55 AND $oddsLI < 2.64) {$priOD='8-5';}
elseif ($oddsLI > 2.63 AND $oddsLI < 2.71) {$priOD='5-3';}
elseif ($oddsLI > 2.70 AND $oddsLI < 2.78) {$priOD='7-4';}
elseif ($oddsLI > 2.77 AND $oddsLI < 2.91) {$priOD='9-5';}
elseif ($oddsLI > 2.90 AND $oddsLI < 3.13) {$priOD='2-1';}
elseif ($oddsLI > 3.12 AND $oddsLI < 3.30) {$priOD='9-4';}
elseif ($oddsLI > 3.29 AND $oddsLI < 3.42) {$priOD='7-3';}
elseif ($oddsLI > 3.41 AND $oddsLI < 3.59) {$priOD='5-2';}
elseif ($oddsLI > 3.58 AND $oddsLI < 3.84) {$priOD='8-3';}
elseif ($oddsLI > 3.83 AND $oddsLI < 4.26) {$priOD='3-1';}
elseif ($oddsLI > 4.25 AND $oddsLI < 4.76) {$priOD='7-2';}
elseif ($oddsLI > 5.25 AND $oddsLI < 5.63) {$priOD='9-2';}
else {$priOD=round($oddsLI-1)."-1";}
echo $priOD," <a href=\"club.php?clubid=",$userLI,"\">",stripslashes($nameLI),"</a><br/>";
}
}
if ($suppo==1 AND $supp3<>10 AND $glj==5) {echo "[<a href=\"fairplaycup.php?supp=10\" title=\"",$langmark231,"\" class=\"greenhilite\">+</a>]<br/>";}
if ($suppo==1 AND $supp3==10) {echo "[<a href=\"javascript: history.go(-1)\" title=\"",$langmark409,"\" class=\"greenhilite\">-</a>]<br/>";}

$offset_result = mysql_query("SELECT FLOOR(RAND() * COUNT(*)) AS `offset` FROM `players`, `ekipe` WHERE `players`.`club` = `ekipe`.`ekipa` AND `players`.`statement` != '' AND ekipe.competition=3");
$offset_row = mysql_fetch_object($offset_result);
$offset = $offset_row->offset;
$puma = mysql_query("SELECT `players`.`id`, `players`.`name`, `players`.`surname`, `players`.`statement` FROM `players`, `ekipe` WHERE `players`.`club` = `ekipe`.`ekipa` AND `players`.`statement` != '' AND ekipe.competition=3 LIMIT $offset, 1");
if (mysql_num_rows($puma)==1) {
echo "<br/><h2>",$langmark1409,"</h2><br/>"; $izj=1;
$link = mysql_result($puma,0,"players.id");
$ime = mysql_result($puma,0,"players.name");
$priimek = mysql_result($puma,0,"players.surname");
$izjava = mysql_result($puma,0,"players.statement");
echo "<i>",stripslashes($izjava),"</i><br/><br/><center><a href=\"player.php?playerid=",$link,"&say=press\">",$ime," ",$priimek;?></a></center>
<?php
}
}

//bivši zmagovalci
echo "<br/><h2>",$langmark1246,"</h2>";
$zmagovalci = mysql_query("SELECT `h_userid`, `h_teamid`, `h_teamname`, `h_country` FROM `history` WHERE `h_type`=5 AND `won` =1 ORDER BY `h_season` DESC") or die(mysql_error());
while ($pus=mysql_fetch_array($zmagovalci)) {
$h_userid = $pus[h_userid];
$h_teamid = $pus[h_teamid];
$h_teamname = $pus[h_teamname];
$h_country = $pus[h_country];
$preveritev = mysql_query("SELECT * FROM `users` WHERE `userid`='$h_userid' LIMIT 1");
if (mysql_num_rows($preveritev)) {echo "<br/><img src=\"img/Flags/",$h_country,".png\" border=\"1\" alt=\"",$h_country,"\" title=\"",$h_country,"\"> <a href=\"club.php?clubid=",$h_userid,"\">",stripslashes($h_teamname),"</a>";} else {echo "<br/><img src=\"img/Flags/",$h_country,".png\" border=\"1\" alt=\"",$h_country,"\" title=\"",$h_country,"\"> ",stripslashes($h_teamname);}
}

if ($round < 9 AND $round==$krog AND $sseason==$default_season AND $acto<>'drzave') {echo "<br/><br/><h2>Statistics</h2><br/><a href=\"fairplaycup.php?acto=drzave\">Country stats</a><br/><a href=\"wildcards.php\">WildCard stats</a>";}
?>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>