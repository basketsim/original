<?php
$expandmenu1=917;

$limitad=500; $draftt=3; // 0 - draft is finished, 1 - ongoing draft, 2 - drafti is about to occur (top candidates are displayed), 3- draft is approaching (top clubs are shown)
$cenatok=1; $popuzt=$cenatok-1; //PRICE OF TOKENS IS CHANGING DURING DRAFT (top 900=2 | top 400=3 | top 100=5)

/*
//adjust to 5000 for purpose of draft preview if needed
if ($userid==1) {$draftt=1; $limitad=5000;}
*/

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$action=$_GET['action'];
if (!$action) {$action='cmrlj';}

$sseason = $_POST["sseason"];
if (!$sseason) {$sseason=$default_season;}
if (!is_numeric($sseason)) {die(include 'basketsim.php');}

$comparepa = mysql_query("SELECT club, lang, supporter, country, curmoney, conwins FROM users, teams WHERE club=teamid AND password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($comparepa)) {
$kjuv = mysql_result($comparepa,0,"club");
$lang = mysql_result($comparepa,0,"lang");
$is_supporter = mysql_result($comparepa,0,"supporter");
$prevdr = mysql_result($comparepa,0,"country");
$curmY = mysql_result($comparepa,0,"curmoney");
$conwY = mysql_result($comparepa,0,"conwins");
}
else {die(include 'basketsim.php');}

$luja = mysql_query("SELECT `tokens` FROM `drafters` WHERE `team`='$kjuv' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($luja)) {$dlaku = mysql_result($luja,0,"tokens");} else {$dlaku=0;}

$do = $_GET['do'];
if ($do=='clean') {setcookie("bstmk1", "$bstmk1", time()-36000); header('Location: transfermarket.php');}

if ($action=='topdraft' AND $draftt==1) {$refresh=1798;
$YMPRU = $_GET['impro'];
if ($YMPRU=='ve' AND $dlaku > $popuzt) {
mysql_query("LOCK TABLES `draft` WRITE;");
$koza = mysql_query("SELECT `draft_id`, `pick` FROM `draft` WHERE `done`=1 AND `season`='$default_season' AND `to_club`='$kjuv' LIMIT 1") or die(mysql_error());
while ($uu = mysql_fetch_array($koza)) {
$draft_id = $uu[draft_id];
$pick = $uu[pick];
$GOR=$pick-1;
$fatma = mysql_query("SELECT `draft_id`, `to_club`, `when` FROM `draft` WHERE `done`=1 AND `season`='$default_season' AND `pick`='$GOR' LIMIT 1") or die(mysql_error());
$draft_id1 = @mysql_result($fatma,0,"draft_id");
$toclub1 = @mysql_result($fatma,0,"to_club");
$dodatnoC = @mysql_result($fatma,0,"when");
$timenow = date("Y-m-d H:i:s");
if (mysql_num_rows($fatma)==1 AND $pick > 1 AND $timenow < $dodatnoC) {
mysql_query("UPDATE `draft` SET `to_club`='$toclub1' WHERE `to_club`='$kjuv' AND `draft_id`='$draft_id' LIMIT 1") or die(mysql_error());
mysql_query("UPDATE `draft` SET `to_club`='$kjuv' WHERE `to_club`='$toclub1' AND `draft_id`='$draft_id1' LIMIT 1") or die(mysql_error());
mysql_query("UNLOCK TABLES;");
mysql_query("UPDATE `drafters` SET `tokens`=`tokens`-$cenatok WHERE `team`='$kjuv'") or die(mysql_error());
}
}
mysql_close();
header('Location: transfermarket.php?action=topdraft');
}
}


$cheaters = $_GET["cheat"];

//YOUTH BUY
if (isset($_POST['submiY'])) {
$kljukica = $_POST['checkbox1'];
$potpis = $_POST['hideme'];
$cnna = $_POST['hidemp'];
$potpis = trim($potpis);
$cnna = trim($cnna);
if ($potpis >0 AND is_numeric($potpis) AND $cnna > 24999 AND is_numeric($cnna)) {
if ($kljukica<>'YES') {header( 'Location: transfermarket.php?action=buyouth&bug=kljuka' ); die();}
$lambafa = mysql_query("SELECT club, charac, country, coach FROM players WHERE id=$potpis LIMIT 1") or die(mysql_error());
$anola = mysql_result($lambafa,0,"club");
$snola = mysql_result($lambafa,0,"charac");
$scunt = mysql_result($lambafa,0,"country");
$enola = mysql_result($lambafa,0,"coach");
if ($anola<>0) {header( 'Location: transfermarket.php?action=buyouth&bug=inteam' ); die();}
elseif ($enola<>9) {header( 'Location: transfermarket.php?action=buyouth' ); die();}
elseif ($prevdr==$scunt) {header( 'Location: transfermarket.php?action=buyouth&bug=cousam' ); die();}
elseif ($snola < 4 AND ($curmY > 20000000 OR $curmY < 1500000)) {header( 'Location: transfermarket.php?action=buyouth&bug=stable' ); die();}
elseif ($snola > 3 AND $snola < 7 AND $conwY < 4) {header( 'Location: transfermarket.php?action=buyouth&bug=enter' ); die();}
elseif ($snola > 6 AND $snola < 11 AND ($curmY > 7500000 OR $conwY > 9)) {header( 'Location: transfermarket.php?action=buyouth&bug=calm' ); die();}
elseif ($snola > 10 AND $snola < 14 AND ($curmY < 1500000 OR $conwY < 1)) {header( 'Location: transfermarket.php?action=buyouth&bug=agress' ); die();}
elseif ($snola > 13 AND $snola < 17 AND $conwY > 4) {header( 'Location: transfermarket.php?action=buyouth&bug=contro' ); die();}
elseif ($snola > 16 AND $snola < 20 AND ($conwY > 12 OR $conwY < 2)) {header( 'Location: transfermarket.php?action=buyouth&bug=selfish' ); die();}
elseif ($snola > 22 AND $snola < 26 AND $conwY > 3 AND $curmY > 29000000) {header( 'Location: transfermarket.php?action=buyouth&bug=clumsy' ); die();}
elseif ($snola > 29 AND $snola < 33 AND $curmY > 50000000) {header( 'Location: transfermarket.php?action=buyouth&bug=loyal' ); die();}
elseif ($snola > 32 AND $snola < 35 AND ($curmY > 75000000 OR $curmY < 0)) {header( 'Location: transfermarket.php?action=buyouth&bug=wise' ); die();}
elseif ($snola > 34 AND $snola < 39 AND ($conwY > 2 OR $curmY > 25000000)) {header( 'Location: transfermarket.php?action=buyouth&bug=fragile' ); die();}
elseif ($snola > 40 AND $curmY < 10000000) {header( 'Location: transfermarket.php?action=buyouth&bug=lazy' ); die();}
else {
$preveriT = mysql_query("SELECT id FROM players WHERE coach=9 AND club=$kjuv") or die(mysql_error());
if (mysql_num_rows($preveriT) > 11) {header( 'Location: transfermarket.php?action=buyouth&bug=12' ); die();}
if ($scunt<>$prevdr) {
$preverNT = mysql_query("SELECT id FROM players WHERE country<>'$prevdr' AND coach=9 AND club=$kjuv") or die(mysql_error());
if (mysql_num_rows($preverNT) > 2) {header( 'Location: transfermarket.php?action=buyouth&bug=974' ); die();}
}
mysql_query("UPDATE players SET club=$kjuv WHERE coach=9 and club=0 and id=$potpis LIMIT 1") or die(mysql_error());
mysql_query("UPDATE teams SET curmoney=curmoney-$cnna WHERE teamid ='$kjuv' LIMIT 1") or die(mysql_error());
$dcna = number_format($cnna, 0, ',', '.');
mysql_query("INSERT INTO events VALUES ('', $kjuv, NOW(), '<a href=player.php?playerid=$potpis>Young player</a> was signed to the youth team at a cost of $dcna &euro;.', 1, -$cnna);") or die(mysql_error());
header( 'Location: yteam.php' );
}
}
}
//END YOUTH BUY

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');

if (isset($_POST['submit_cheat'])) {
$sporen = $_POST['sporen'];
if (!is_numeric($sporen)){echo "<div id=\"main\"><h2>",$langmark1166,"</h2><table cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr valign=\"top\" bgcolor=\"#ffffff\"><td class=\"border\" width=\"100%\">",$langmark656,"</td></tr></table>";}
else {
$sporen = trim($sporen);
$tunizija = mysql_query("SELECT id FROM players WHERE id =$sporen");
$verify1 = mysql_num_rows($tunizija);
if ($verify1 != 1){echo "<div id=\"main\"><h2>",$langmark1166,"</h2><table cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr valign=\"top\" bgcolor=\"#ffffff\"><td class=\"border\" width=\"100%\">",$langmark406,"</td></tr></table>";}
else {
$query = "INSERT INTO gm_messages VALUES ('', $userid, 'Suspicious Transfer', 'PlayerID: <a href=player.php?playerid=$sporen>$sporen</a>', NOW(), 0, 0, 0, '')";
$result = mysql_query($query) or die(mysql_error());
echo "<div id=\"main\"><h2>",$langmark1167,"</h2><table cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr valign=\"top\" bgcolor=\"#ffffff\"><td class=\"border\" width=\"100%\">",$langmark1168,"</td></tr></table>";}
}
}
?>

<div id="main">

<?php
if ($action=='toptransfers') {
//prikaz top transferov
?>
<h2><?=$langmark1169?></h2>
<table cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="100%">
<table border="0" cellspacing="0" cellpadding="1" width="100%">
<tr>
<td width="58"><?=$langmark756?></td>
<td width="140"><?=$langmark404?></td>
<td width="147"><?=$langmark1065?></td>
<td width="147"><?=$langmark1066;?></td>
<td align="right"><?=$langmark924?></td>
</tr></table><hr/>
<?php
$result65 = mysql_query("SELECT transfers.playerid AS playerid, transfers.playerclub AS playerclub, transfers.sellingid AS sellingid, transfers.timeofsale AS timeofsale, transfers.currentbid AS currentbid, transfers.bidingteam AS bidingteam, transfers.bidingname AS bidingname, players.name AS name, players.surname AS surname FROM transfers, players WHERE transfers.playerid=players.id AND transfers.currentbid > 1 AND transfers.trstatus =0 AND currentbid >30000000 AND transfers.sellingid <> transfers.bidingteam ORDER BY transfers.currentbid DESC LIMIT 25") or die(mysql_error());
while($v=mysql_fetch_array($result65)) {
$playerid=$v["playerid"];
$playerclub=$v["playerclub"];
$sellingid=$v["sellingid"];
$timeofsale=$v["timeofsale"];
$currentbid=$v["currentbid"];
$bidingteam=$v["bidingteam"];
$bidingname=$v["bidingname"];
$tname=$v["name"];
$tsurname=$v["surname"];

$pricedisplay = number_format($currentbid, 0, ',', '.');

$splitdatetime = explode(" ", $timeofsale); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$datedisplay = date("d.m.y", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));

echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"1\" width=\"100%\"><tr><td width=\"58\">".$datedisplay."</td><td width=\"140\"><a href=\"player.php?playerid=".$playerid."\">",$tname," ",$tsurname,"</a></td><td width=\"147\"><a href=club.php?clubid=",$sellingid,">",stripslashes($playerclub),"</a></td><td width=\"147\">";
echo "<a href=\"club.php?clubid=",$bidingteam,"\">",stripslashes($bidingname),"</a></td><td align=\"right\">".$pricedisplay."</td></tr></table>";
}
echo "<br/>[<a href=\"transfermarket.php\" class=\"greenhilite\"><<</a>]";

//konec prikaza top transferov
}


//najvišji prestopi v zadnjem casu
if ($action=='lasttop') {
?>

<h2><?=$langmark1170?></h2>

<table cellspacing="9" cellpadding="9" width="100%" border="0">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="100%">

<table border="0" cellspacing="0" cellpadding="1" width="100%"><tr>
<td width="58"><?=$langmark756?></td>
<td width="140"><?=$langmark404?></td>
<td width="147"><?=$langmark1065?></td>
<td width="147"><?=$langmark1066;?></td>
<td align="right"><?=$langmark924?></td>
</tr></table><hr/>
<?php
$tukaj = date("Y-m-d H:i:s"); $splitdt = explode(" ", $tukaj); $dbd = $splitdt[0]; $dbt = $splitdt[1];
$splitd = explode("-", $dbd); $byear = $splitd[0]; $bmonth = $splitd[1]; $bday = $splitd[2];
$splitt = explode(":", $dbt); $bhour = $splitt[0]; $bmin = $splitt[1]; $bsec = $splitt[2];
$expireminus = date("Y-m-d H:i:s", mktime($bhour,$bmin,$bsec,$bmonth,$bday-7,$byear));

$result699 = mysql_query("SELECT transfers.playerid AS playerid, transfers.playerclub AS playerclub, transfers.sellingid AS sellingid, transfers.timeofsale AS timeofsale, transfers.currentbid AS currentbid, transfers.bidingteam AS bidingteam, transfers.bidingname AS bidingname, players.name AS name, players.surname AS surname FROM transfers, players WHERE transfers.playerid=players.id AND transfers.currentbid > 1 AND transfers.trstatus =0 AND transfers.sellingid <> transfers.bidingteam AND transfers.timeofsale > '$expireminus' ORDER BY transfers.currentbid DESC LIMIT 25") or die(mysql_error());
//$result699 = mysql_query("SELECT transfers.playerid AS playerid, transfers.playerclub AS playerclub, transfers.sellingid AS sellingid, transfers.timeofsale AS timeofsale, transfers.currentbid AS currentbid, transfers.bidingteam AS bidingteam, transfers.bidingname AS bidingname, players.name AS name, players.surname AS surname FROM transfers, players WHERE transfers.playerid=players.id AND transfers.currentbid > 1 AND transfers.trstatus =0 AND transfers.sellingid <> transfers.bidingteam AND transfers.timeofsale > '2012-08-22 17:50:00' AND transfers.timeofsale < '2012-09-07 17:50:00' ORDER BY transfers.EV DESC LIMIT 800") or die(mysql_error());

while($vz=mysql_fetch_array($result699)) {
$playerid=$vz["playerid"];
$playerclub=$vz["playerclub"];
$sellingid=$vz["sellingid"];
$timeofsale=$vz["timeofsale"];
$currentbid=$vz["currentbid"];
$bidingteam=$vz["bidingteam"];
$bidingname=$vz["bidingname"];
$tname=$vz["name"];
$tsurname=$vz["surname"];

$pricedisplay = number_format($currentbid, 0, ',', '.');

$splitdatetime = explode(" ", $timeofsale); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$datedisplay = date("d.m.y", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));

echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"1\" width=\"100%\"><tr><td width=\"58\">".$datedisplay."</td><td width=\"140\"><a href=\"player.php?playerid=".$playerid."\">",$tname," ",$tsurname,"</a></td><td width=\"147\"><a href=\"club.php?clubid=",$sellingid,"\">".stripslashes($playerclub),"</a></td><td width=\"147\">";
echo "<a href=\"club.php?clubid=".$bidingteam."\">",stripslashes($bidingname),"</a></td><td align=\"right\">",$pricedisplay,"</td></tr></table>";

}
echo "<br/>[<a href=\"transfermarket.php\" class=\"greenhilite\"><<</a>]";

//konec prikaza last top transferov
}

if ($action=='buyouth') {?>
<h2>SIGN YOUTH TEAM MEMBERS</h2>
<?php
$bugd = $_GET['bug'];

if ($bugd) {?><table cellspacing="9" cellpadding="9" width="100%" border="0"><tr valign="top" bgcolor="#ffffff"><td class="border" width="100%"><?php }
SWITCH($bugd) {
CASE 'kljuka': echo "<font color=\"darkred\"><b>You have to tick a box next to the Sign button to make sure that your signup is successful!</b></font>"; break;
CASE 'inteam': echo "<font color=\"darkred\"><b>Player has already signed for another team.</b></font>"; break;
CASE 'cousam': echo "<font color=\"darkred\"><b>It is not possible to sign domestic players in the youth market.</b></font>"; break;
CASE 'stable': echo "<font color=\"darkred\"><b>Player has decided not to sign for you. He thinks that there's no chemistry between him and your team, so he'll rather wait for another option.</b></font> <a href=\"gamerules.php?action=youth&#35;byo\">What is this?</a>"; break;
CASE 'enter': echo "<font color=\"darkred\"><b>Player has decided not to sign for you. He just isn't convinced that your spectators would appreciate his entertaining style of play right now.</b></font> <a href=\"gamerules.php?action=youth&#35;byo\">What is this?</a>"; break;
CASE 'calm': echo "<font color=\"darkred\"><b>Player has decided not to sign for you. He is mostly worried that his calmness wouldn't go along with current electric athmosphere at your club.</b></font> <a href=\"gamerules.php?action=youth&#35;byo\">What is this?</a>"; break;
CASE 'agress': echo "<font color=\"darkred\"><b>Player has decided not to sign for you. He believes that signing for your team wouldn't be the right step in his career, as there might be some discrepancies between your and his ambitions.</b></font> <a href=\"gamerules.php?action=youth&#35;byo\">What is this?</a>"; break;
CASE 'contro': echo "<font color=\"darkred\"><b>Player has decided not to sign for you. He believes that such a well organized group of players would have hard time accepting someone as controversial as he is.</b></font> <a href=\"gamerules.php?action=youth&#35;byo\">What is this?</a>"; break;
CASE 'selfish': echo "<font color=\"darkred\"><b>Player has decided not to sign for you. He's looking for a place where he'll be able to get under the spotlights immidiately and he doesn't think he could achieve that in your team.</b></font> <a href=\"gamerules.php?action=youth&#35;byo\">What is this?</a>"; break;
CASE 'clumsy': echo "<font color=\"darkred\"><b>Player has decided not to sign for you. He's worried that in your ambitious team, his clumsiness might be welcomed by laughter.</b></font> <a href=\"gamerules.php?action=youth&#35;byo\">What is this?</a>"; break;
CASE 'loyal': echo "<font color=\"darkred\"><b>Player has decided not to sign for you. He is worried that he wouldn't be able to connect with his true identity while playing for your side.</b></font> <a href=\"gamerules.php?action=youth&#35;byo\">What is this?</a>"; break;
CASE 'wise': echo "<font color=\"darkred\"><b>Player has decided not to sign for you. He is wisely considering every step of his career and he has decided to wait a bit longer.</b></font> <a href=\"gamerules.php?action=youth&#35;byo\">What is this?</a>"; break;
CASE 'fragile': echo "<font color=\"darkred\"><b>Player has decided not to sign for you. He is worried that your team is too big for him and that he would crush under weight of expectations.</b></font> <a href=\"gamerules.php?action=youth&#35;byo\">What is this?</a>"; break;
CASE 'lazy': echo "<font color=\"darkred\"><b>Player has decided not to sign for you. He was so lazy that he didn't even bother to respond to your approach at all!</b></font> <a href=\"gamerules.php?action=youth&#35;byo\">What is this?</a>"; break;
CASE 974: echo "<font color=\"darkred\"><b>Currently you're not allowed to sign another youth player of foreign nationality, because the upper limit for foreign players in youth teams is 3.</b></font>"; break;
CASE 12: echo "<font color=\"darkred\"><b>You have 12 players in your youth team, this is the maximum, so you need to fire someone first.</b></font>"; break;
}
if ($bugd) {echo "</td></tr></table>";}
$buyy = mysql_query("SELECT `id`, `name`, `surname`, `age`, `country`, `charac`, `height`, `weight`, `handling`, `speed`, `passing`, `vision`, `rebounds`, `position`, `freethrow`, `shooting`, `defense`, `workrate`, `quality` FROM `players` WHERE age < 18 AND `club` =0 AND `coach` =9");
?>
<table cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="100%"><b>Currently available players (<?=mysql_num_rows($buyy)?>):</b><br/>
<table cellspacing="0" cellpadding="1" width="100%" border="0">
<tr bgcolor="#FFCC66"><td align="left" colspan="2"></td><td align="center"><b>Age</b></td><td align="center"><b>Height</b></td><td align="center"><b>Weight</b></td><td align="center"><b>Character</b></td><td align="right"><b>Sign-up value</b></td></td><td align="right"></td></tr>
<?php
while ($by = mysql_fetch_array($buyy)) {
$stetje=@mysql_num_rows($buyy);
if (!$stetje) {$stetje=0;}
$id = $by[id];
$name = $by[name];
$surname = $by[surname];
$age = $by[age];
$country = $by[country];
$charac = $by[charac];
$height = $by[height];
$weight = $by[weight];
$weight = round($weight);
$s1 = $by[handling];
$s2 = $by[speed];
$s3 = $by[passing];
$s4 = $by[vision];
$s5 = $by[rebounds];
$s6 = $by[position];
$s7 = $by[freethrow];
$s8 = $by[shooting];
$s9 = $by[defense];
$s0 = $by[workrate];
$quality = $by[quality];
SWITCH (TRUE) {
CASE ($charac < 4): $spec_txt=$langmark763; break;
CASE ($charac > 3 && $charac < 7): $spec_txt=$langmark764; break;
CASE ($charac > 6 && $charac < 11): $spec_txt=$langmark765; break;
CASE ($charac > 10 && $charac < 14): $spec_txt=$langmark766; break;
CASE ($charac > 13 && $charac < 17): $spec_txt=$langmark767; break;
CASE ($charac > 16 && $charac < 20): $spec_txt=$langmark768; break;
CASE ($charac > 19 && $charac < 23): $spec_txt='dirty'; break;
CASE ($charac > 22 && $charac < 26): $spec_txt='clumsy'; break;
CASE ($charac > 25 && $charac < 30): $spec_txt='explosive'; break;
CASE ($charac > 29 && $charac < 33): $spec_txt='loyal'; break;
CASE ($charac > 32 && $charac < 35): $spec_txt='wise'; break;
CASE ($charac > 34 && $charac < 39): $spec_txt='fragile'; break;
CASE ($charac > 38 && $charac < 41): $spec_txt='tough'; break;
CASE ($charac > 40 && $charac < 44): $spec_txt='lazy'; break;
}
$signup = 25000 + (($s1 + $s2 + $s3 + $s4 + $s5 + $s6 + $s7 + $s8 + $s9 + $s0) * ($s1 + $s2 + $s3 + $s4 + $s5 + $s6 + $s7 + $s8 + $s9 + $s0) * 10);
$signup = round(($quality/60) * $signup);
if ($signup < 25000) {$signup=25000;}
if ($prevdr=='USA') {
$feetheight = floor((100*$height)/3048);
$tempheight = $height - ($feetheight*3048/100);
$inchheight = round((100*$tempheight)/254);
if ($inchheight==12) {$feetheight=$feetheight+1; $inchheight=''; $height = $feetheight."'0";} else {$height = $feetheight."'".$inchheight;}
$weight = round ($weight * 22046 / 10000);
}

//supp colored display of correct skills
if ($is_supporter<>1) {$dodK='white';} elseif (
($charac < 4 AND ($curmY > 20000000 OR $curmY < 1500000)) OR
($prevdr==$country) OR
($charac > 3 AND $charac < 7 AND $conwY < 4) OR
($charac > 6 AND $charac < 11 AND ($curmY > 7500000 OR $conwY > 9)) OR
($charac > 10 AND $charac < 14 AND ($curmY < 1500000 OR $conwY < 1)) OR
($charac > 13 AND $charac < 17 AND $conwY > 4) OR
($charac > 16 AND $charac < 20 AND ($conwY > 12 OR $conwY < 2)) OR
($charac > 22 AND $charac < 26 AND $conwY > 3 AND $curmY > 29000000) OR
($charac > 29 AND $charac < 33 AND $curmY > 50000000) OR
($charac > 32 AND $charac < 35 AND ($curmY > 75000000 OR $curmY < 0)) OR
($charac > 34 AND $charac < 39 AND ($conwY > 2 OR $curmY > 25000000)) OR
($charac > 40 AND $curmY < 10000000)) {$dodK = '#FFFAFA';}
else {$dodK='#D6E6C3';}

echo "<tr bgcolor=\"",$dodK,"\"><td align=\"left\"><img src=\"img/Flags/",$country,".png\" border=\"0\" alt=\"",$country,"\" title=\"",$country,"\"></td><td align=\"left\"><a href=\"player.php?playerid=",$id,"\">",$name," ",$surname,"</a></td><td align=\"center\">",$age,"</td><td align=\"center\">",$height,"</td><td align=\"center\">",$weight,"</td><td align=\"center\">",$spec_txt,"</td><td align=\"right\">",number_format($signup, 0, ',', '.')," &euro;</td><td align=\"right\">";
if ($stetje>14){?>
<form method="post" action="transfermarket.php?action=buyouth" style="margin: 0">
<input type="hidden" name="hidemp" value="<?=$signup?>">
<input type="hidden" name="hideme" value="<?=$id?>">
<input type="submit" name="submiY" value="Sign" class="buttonreg">
<input style="margin:0; padding:0;" type='checkbox' name='checkbox1' value='YES' />
</form>
<?php } else {echo "&nbsp;";}
echo "</td></tr>";
}
echo "</table>";
if ($stetje < 15) {echo "<hr/>Signups are currently disabled. Youth market reopens every time when there are at least 15 players available. If you like a player, check back often and maybe you'll be able to sign him when more clubless youth arrive to the market.<br/>";}
?>

<br/><b>Players to be soon available:</b>
<table cellspacing="0" cellpadding="1" width="100%" border="0">
<tr height="100%" width="100%" bgcolor="#FFCC66"><td align="left" colspan="2"></td><td align="center"><b>Age</b></td><td align="center"><b>Height</b></td><td align="center"><b>Weight</b></td><td align="center"><b>Character</b></td><td align="right"><b>Sign-up value</b></td></td><td align="right"></td></tr>
<?php
$tukaj = date("Y-m-d H:i:s"); $splitdt = explode(" ", $tukaj); $dbd = $splitdt[0]; $dbt = $splitdt[1];
$splitd = explode("-", $dbd); $byear = $splitd[0]; $bmonth = $splitd[1]; $bday = $splitd[2];
$splitt = explode(":", $dbt); $bhour = $splitt[0]; $bmin = $splitt[1]; $bsec = $splitt[2];
$expireminus = date("Y-m-d H:i:s", mktime($bhour,$bmin,$bsec,$bmonth,$bday-54,$byear));
$buyy = mysql_query("SELECT `id`, `name`, `surname`, `age`, `country`, `charac`, `height`, `weight`, `handling`, `speed`, `passing`, `vision`, `rebounds`, `position`, `freethrow`, `shooting`, `defense`, `workrate`, `quality` FROM `players` , users WHERE supporter=0 AND players.club = users.club AND coach =9 AND `last_active` < '$expireminus' AND is_online =0 ORDER BY last_active ASC LIMIT 15");
while ($by = mysql_fetch_array($buyy)) {
$stetje=@mysql_num_rows($buyy);
$id = $by[id];
$name = $by[name];
$surname = $by[surname];
$age = $by[age];
$country = $by[country];
$charac = $by[charac];
$height = $by[height];
$weight = $by[weight];
$weight = round($weight);
$s1 = $by[handling];
$s2 = $by[speed];
$s3 = $by[passing];
$s4 = $by[vision];
$s5 = $by[rebounds];
$s6 = $by[position];
$s7 = $by[freethrow];
$s8 = $by[shooting];
$s9 = $by[defense];
$s0 = $by[workrate];
$quality = $by[quality];
SWITCH (TRUE) {
CASE ($charac < 4): $spec_txt=$langmark763; break;
CASE ($charac > 3 && $charac < 7): $spec_txt=$langmark764; break;
CASE ($charac > 6 && $charac < 11): $spec_txt=$langmark765; break;
CASE ($charac > 10 && $charac < 14): $spec_txt=$langmark766; break;
CASE ($charac > 13 && $charac < 17): $spec_txt=$langmark767; break;
CASE ($charac > 16 && $charac < 20): $spec_txt=$langmark768; break;
CASE ($charac > 19 && $charac < 23): $spec_txt='dirty'; break;
CASE ($charac > 22 && $charac < 26): $spec_txt='clumsy'; break;
CASE ($charac > 25 && $charac < 30): $spec_txt='explosive'; break;
CASE ($charac > 29 && $charac < 33): $spec_txt='loyal'; break;
CASE ($charac > 32 && $charac < 35): $spec_txt='wise'; break;
CASE ($charac > 34 && $charac < 39): $spec_txt='fragile'; break;
CASE ($charac > 38 && $charac < 41): $spec_txt='tough'; break;
CASE ($charac > 40 && $charac < 44): $spec_txt='lazy'; break;
}
$signup = 25000 + (($s1 + $s2 + $s3 + $s4 + $s5 + $s6 + $s7 + $s8 + $s9 + $s0) * ($s1 + $s2 + $s3 + $s4 + $s5 + $s6 + $s7 + $s8 + $s9 + $s0) * 10);
$signup = round(($quality/60) * $signup);
if ($signup < 25000) {$signup=25000;}
if ($prevdr=='USA') {
$feetheight = floor((100*$height)/3048);
$tempheight = $height - ($feetheight*3048/100);
$inchheight = round((100*$tempheight)/254);
if ($inchheight==12) {$feetheight=$feetheight+1; $inchheight=''; $height = $feetheight."'0";} else {$height = $feetheight."'".$inchheight;}
$weight = round ($weight * 22046 / 10000);
}
/*
if ($is_supporter<>1) {$dodK='white';}
elseif (($charac < 4 AND ($curmY > 15000000 OR $curmY < 1500000)) OR ($charac > 3 AND $charac < 7 AND $conwY < 4) OR ($charac > 6 AND $charac < 11 AND $curmY > 6500000) OR ($charac > 10 AND $charac < 14 AND $curmY < 1500000) OR ($charac > 13 AND $charac < 17 AND $conwY > 4) OR ($charac > 16 AND ($conwY > 12 OR $conwY < 2))) {$dodK = '#FFFAFA';}
else {$dodK='#D6E6C3';}
*/
echo "<tr><td align=\"left\"><img src=\"img/Flags/",$country,".png\" border=\"0\" alt=\"",$country,"\" title=\"",$country,"\"></td><td align=\"left\"><a href=\"player.php?playerid=",$id,"\">",$name," ",$surname,"</a></td><td align=\"center\">",$age,"</td><td align=\"center\">",$height,"</td><td align=\"center\">",$weight,"</td><td align=\"center\">",$spec_txt,"</td><td align=\"right\">",number_format($signup, 0, ',', '.')," &euro;</td><td align=\"right\">";
if ($stedfe>14){?>
<form method="post" action="transfermarket.php?action=buyouth" style="margin: 0">
<input type="hidden" name="hidemp" value="<?=$signup?>">
<input type="hidden" name="hideme" value="<?=$id?>">
<input type="submit" name="submiY" value="Sign" class="buttonreg">
<input style="margin:0; padding:0;" type='checkbox' name='checkbox1' value='YES' />
</form>
<?php } else {echo "&nbsp;";}
echo "</td></tr>";
}
echo "</table>";
echo "<hr/>These players are likely to become clubless soon and when they do, they'll be available to sign. The exact time when they'll become clubless cannot be determined, it can take a few days, but it can also happen in a couple of hours.<br/>";

echo "<br/>[<a href=\"transfermarket.php\" class=\"greenhilite\"><<</a>] [<a href=\"gamerules.php?action=youth\" class=\"greenhilite\">",strtolower($langmark302),"</a>]";
}

if ($action=='lasttransfers') {
?>

<h2><?=$langmark1171?></h2>

<table cellspacing="9" cellpadding="9" width="100%" border="0">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="100%">

<table border="0" cellspacing="0" cellpadding="1" width="100%"><tr>
<td width="43"><?=$langmark349?></td>
<td width="142"><?=$langmark404?></td>
<td width="149"><?=$langmark1065?></td>
<td width="149"><?=$langmark1066;?></td>
<td align="right"><?=$langmark924?></td>
</tr></table><hr/>
<?php
$tukaj = date("Y-m-d H:i:s"); $splitdt = explode(" ", $tukaj); $dbd = $splitdt[0]; $dbt = $splitdt[1];
$splitd = explode("-", $dbd); $byear = $splitd[0]; $bmonth = $splitd[1]; $bday = $splitd[2];
$splitt = explode(":", $dbt); $bhour = $splitt[0]; $bmin = $splitt[1]; $bsec = $splitt[2];
$expireminus = date("Y-m-d H:i:s", mktime($bhour,$bmin,$bsec,$bmonth,$bday-1,$byear));
$result65 = mysql_query("SELECT transfers.playerid AS playerid, transfers.playerclub AS playerclub, transfers.sellingid AS sellingid, transfers.timeofsale AS timeofsale, transfers.currentbid AS currentbid, transfers.bidingteam AS bidingteam, transfers.bidingname AS bidingname, players.name AS name, players.surname AS surname FROM transfers, players WHERE transfers.playerid=players.id AND transfers.currentbid > 1 AND transfers.trstatus =0 AND transfers.timeofsale > '$expireminus' ORDER BY timeofsale DESC LIMIT 25") or die(mysql_error());
while($v=mysql_fetch_array($result65)) {
$playerid=$v["playerid"];
$playerclub=$v["playerclub"];
$sellingid=$v["sellingid"];
$timeofsale=$v["timeofsale"];
$currentbid=$v["currentbid"];
$bidingteam=$v["bidingteam"];
$bidingname=$v["bidingname"];
$tname=$v["name"];
$tsurname=$v["surname"];

if ($sellingid==$bidingteam) {$currentbid=$currentbid*10;}

$pricedisplay = number_format($currentbid, 0, ',', '.');

$splitdatetime = explode(" ", $timeofsale); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$datedisplay = date("H:i", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));

?>
<table border="0" cellspacing="0" cellpadding="1" width="100%"><tr>
<td width="43"><?=$datedisplay?></td>
<td width="142"><a href="player.php?playerid=<?=$playerid?>"><?=$tname,"&nbsp;",$tsurname?></a></td>
<td width="149"><a href="club.php?clubid=<?=$sellingid?>"><?=$playerclub?></a></td>
<td width="149"><a href="club.php?clubid=<?=$bidingteam?>"><?=$bidingname?></a></td>
<td align="right"><?=$pricedisplay?></td></tr></table>

<?php
}
echo "<br/>[<a href=\"transfermarket.php\" class=\"greenhilite\"><<</a>]";

//konec prikaza last transferov
}


if ($action=='topdraft') {
?>

<h2><?=$langmark1172?></h2>

<table cellspacing="9" cellpadding="9" width="100%" border="0">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="59%">

<?php
//preverim ce draft poteka
$skonec = mysql_query("SELECT * FROM draft WHERE season='$sseason' AND done =1"); //nadomestim z $draftt ko so napovedani kandidati

if ($draftt==1) {echo "<h2>",$langmark1349,"</h2><br/>";} elseif ($draftt==0) {echo "<h2>",$langmark1350,"</h2><br/>";}

//s tem prikažem dejanske drafte
$talecas = date("Y-m-d H:i:s");
if ($draftt==0 OR $draftt==1) {
$country44 = $_POST["country"];
if (!$country44){$country44 = $_GET['country'];}
if ($draftt==0 AND !empty($country44)) {$result65 = mysql_query("SELECT * FROM `draft` WHERE `season` ='$sseason' AND `player_country` LIKE '$country44' ORDER BY `pick` ASC LIMIT 100") or die(mysql_error());}
if ($draftt==0 AND empty($country44)) {$result65 = mysql_query("SELECT * FROM `draft` WHERE `season` ='$sseason' ORDER BY `pick` ASC LIMIT 100") or die(mysql_error());}
if ($draftt==1) {$huh = "SELECT * FROM `draft` WHERE `season` ='$sseason' AND done=0 ORDER BY `pick` ASC LIMIT 30"; $result65 = mysql_query($huh) or die(mysql_error());}
$bum=mysql_num_rows($result65);
$v=0;
while ($v < $bum) {
$pick=mysql_result($result65,$v,"pick");
$player_id=mysql_result($result65,$v,"player_id");
$name=mysql_result($result65,$v,"player_name");
$surname=mysql_result($result65,$v,"player_surname");
$age=mysql_result($result65,$v,"player_age");
$country=mysql_result($result65,$v,"player_country");
$height=mysql_result($result65,$v,"player_height");
$to_club=mysql_result($result65,$v,"to_club");
if ($country=='Bosnia') {$country='Bosnia and Herzegovina';}
$query1 = mysql_query("SELECT name FROM teams WHERE teamid=$to_club"); if (mysql_num_rows($query1) > 0) {$imekluba = mysql_result($query1,0);}
$query2 = mysql_query("SELECT userid FROM users WHERE club=$to_club"); if (mysql_num_rows($query2) > 0) {$linkkluba = mysql_result($query2,0);} else {$linkkluba = 'noclub';}
echo $pick,". <a href=\"player.php?playerid=",$player_id,"\">",$name," ",$surname,"</a>, ",$age,", ",$country,", ",$height," cm";
echo "<br/><font color=\"red\"><b>",$langmark1176," <a href=\"club.php?clubid=",$linkkluba,"\">",stripslashes($imekluba),"</a></b></font><br/>";
$v++;
}
if ($v==0 AND $draftt<>1) {echo "<i>",$langmark1445,"</i><br/><br/>";}

if (mysql_num_rows($skonec)) {
echo "<br/><h2><?=$langmark1351?></h2><br/>";
$result657 = mysql_query("SELECT * FROM draft WHERE season ='$sseason' AND done =1 ORDER BY pick DESC LIMIT 100") or die(mysql_error());
$bum6=mysql_num_rows($result657);
$ku=0;
while ($ku < $bum6) {
$pick=mysql_result($result657,$ku,"pick");
$player_id=mysql_result($result657,$ku,"player_id");
$name=mysql_result($result657,$ku,"player_name");
$surname=mysql_result($result657,$ku,"player_surname");
$age=mysql_result($result657,$ku,"player_age");
$country=mysql_result($result657,$ku,"player_country");
$height=mysql_result($result657,$ku,"player_height");
$to_club=mysql_result($result657,$ku,"to_club");
$whemm=mysql_result($result657,$ku,"when");
$splitdatetime = explode(" ", $whemm); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$whemm = date("H:i:s", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));
if ($country=='Bosnia') {$country='Bosnia and Herzegovina';}
$query1 = mysql_query("SELECT name FROM teams WHERE teamid=$to_club"); if (mysql_num_rows($query1) > 0) {$imekluba = mysql_result($query1,0);}
$query2 = mysql_query("SELECT userid FROM users WHERE club=$to_club"); if (mysql_num_rows($query2) > 0) {$linkkluba = mysql_result($query2,0);} else {$linkkluba = 'noclub';}
echo $pick,". <a href=\"player.php?playerid=",$player_id,"\">",$name," ",$surname,"</a>, ",$age,", ",$country,", ",$height," cm";
echo "<br/><font color=\"green\"><b>Predicted to go to <a href=\"club.php?clubid=",$linkkluba,"\">",stripslashes($imekluba),"</a> at ",$whemm,"</b></font><br/>";

if ($kjuv==$to_club AND $pick > 1 AND $dlaku > 0) {
echo "<hr/><br/><b> * * * <a href=\"transfermarket.php?action=topdraft&impro=ve\">IMPROVE YOUR RANK FOR ONE PLACE</a> * * *</b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(You have ".$dlaku." draft tokens left to use)<br/><br/><hr/>";
}
if ($kjuv==$to_club AND $pick > 1 AND $dlaku==0) {
echo "<hr/><br/><b> * * * YOU DON'T HAVE ANY TOKENS AT THE MOMENT * * *</b><br/><br/><hr/>";
}

$ku++;
}
}
}

// * * tu dodam paging * *

if ($draftt==3) {

echo "<h2>Draft ranking table</h2><br/>";
echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"1\" width=\"100%\">";

$hdrt = $_GET["hdrt"];
echo "<tr><td></td><td width=\"5\"><b>#</b></td><td><b>Name (tokens)</b></td><td align=\"right\"><b>";
if ($hdrt==2) {echo "<a href=\"transfermarket.php?action=topdraft&hdrt=1\" title=\"League position\">LP</a>";} else {echo "<a href=\"transfermarket.php?action=topdraft&hdrt=2\" title=\"League position\">LP</a>";}
echo "</b><td align=\"right\"><b>";
if ($hdrt==4) {echo "<a href=\"transfermarket.php?action=topdraft&hdrt=3\" title=\"Team strength\">TS</a>";} else {echo "<a href=\"transfermarket.php?action=topdraft&hdrt=4\" title=\"Team strength\">TS</a>";}
echo "</b></td><td align=\"right\"><b>";
if ($hdrt==6) {echo "<a href=\"transfermarket.php?action=topdraft&hdrt=5\" title=\"Club wealth\">CW</a>";} else {echo "<a href=\"transfermarket.php?action=topdraft&hdrt=6\" title=\"Club wealth\">CW</a>";}
echo "</b></td><td align=\"right\"><b>";
if ($hdrt==8 OR !$hdrt) {echo "<a href=\"transfermarket.php?action=topdraft&hdrt=7\" title=\"Total\">TOT</a>";} else {echo "<a href=\"transfermarket.php?action=topdraft&hdrt=8\" title=\"Total\">TOT</a>";}
echo "</b></td></tr>";

if ($hdrt==1) {$ladraft="SELECT name, userid, country, points, strength, wealth, tokens FROM users, teams, drafters WHERE users.club = teams.teamid AND teams.teamid = drafters.team ORDER BY `points` ASC";}
elseif ($hdrt==2) {$ladraft="SELECT name, userid, country, points, strength, wealth, tokens FROM users, teams, drafters WHERE users.club = teams.teamid AND teams.teamid = drafters.team ORDER BY `points` DESC";}
elseif ($hdrt==3) {$ladraft="SELECT name, userid, country, points, strength, wealth, tokens FROM users, teams, drafters WHERE users.club = teams.teamid AND teams.teamid = drafters.team ORDER BY `strength` ASC";}
elseif ($hdrt==4) {$ladraft="SELECT name, userid, country, points, strength, wealth, tokens FROM users, teams, drafters WHERE users.club = teams.teamid AND teams.teamid = drafters.team ORDER BY `strength` DESC";}
elseif ($hdrt==5) {$ladraft="SELECT name, userid, country, points, strength, wealth, tokens FROM users, teams, drafters WHERE users.club = teams.teamid AND teams.teamid = drafters.team ORDER BY `wealth` ASC";}
elseif ($hdrt==6) {$ladraft="SELECT name, userid, country, points, strength, wealth, tokens FROM users, teams, drafters WHERE users.club = teams.teamid AND teams.teamid = drafters.team ORDER BY `wealth` DESC";}
elseif ($hdrt==7) {$ladraft="SELECT name, userid, country, points, strength, wealth, tokens FROM users, teams, drafters WHERE users.club = teams.teamid AND teams.teamid = drafters.team ORDER BY `points`+`strength`+`wealth` ASC, wealth ASC";}
else {$ladraft="SELECT name, userid, country, points, strength, wealth, tokens FROM users, teams, drafters WHERE users.club = teams.teamid AND teams.teamid = drafters.team ORDER BY `points`+`strength`+`wealth` DESC, wealth DESC";}

$pld = mysql_query($ladraft) or die(mysql_error());
while ($pp = mysql_fetch_array($pld)) {
$ddname = $pp["name"];
$dduserid = $pp["userid"];
$ddcountry = $pp["country"];
$ddpoints = $pp["points"];
$ddstrength = $pp["strength"];
$ddwealth = $pp["wealth"];
$ddtokens = $pp["tokens"];
$gmd = $gmd+1;
if ($dduserid==$userid) {echo "<tr bgcolor=\"#FFCC66\">"; $TOKE=$ddtokens;} else {echo "<tr>";}
if (($gmd < 201 OR $dduserid==$userid) AND $ddtokens >0) {echo "<td><img src=\"img/Flags/",$ddcountry,".png\" border=\"0\" alt=\"",$ddcountry,"\" title=\"",$ddcountry,"\"></td><td>",$gmd,".</td><td><a href=\"club.php?clubid=",$dduserid,"\">",stripslashes($ddname),"</a> <b>(",$ddtokens,")</b></td><td align=\"right\">",$ddpoints,"</td><td align=\"right\">",$ddstrength,"</td><td align=\"right\">",$ddwealth,"</td><td align=\"right\">",($ddpoints+$ddstrength+$ddwealth),"</td></tr>";}
elseif (($gmd < 201 OR $dduserid==$userid) AND $ddtokens==0) {echo "<td><img src=\"img/Flags/",$ddcountry,".png\" border=\"0\" alt=\"",$ddcountry,"\" title=\"",$ddcountry,"\"></td><td>",$gmd,".</td><td><a href=\"club.php?clubid=",$dduserid,"\">",stripslashes($ddname),"</a></td><td align=\"right\">",$ddpoints,"</td><td align=\"right\">",$ddstrength,"</td><td align=\"right\">",$ddwealth,"</td><td align=\"right\">",($ddpoints+$ddstrength+$ddwealth),"</td></tr>";}
}
echo "</table>";
}

if ($draftt==2) {

echo "<b>500 best draftees in season ",$default_season,":</b><br/><br/>";

$kurn = mysql_query("select *, ((((((((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3)) * ((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3)) * ((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3))) / 225000) - 7500)/9)*((((((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3)) * ((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3)) * ((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3))) / 225000) - 7500)/9))/15)*(((((((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3)) * ((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3)) * ((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3))) / 225000) - 7500)/240000+(1/(exp(pow(((age-16)/10),4.1)))))*((((workrate/8)+1)/19)+1))*((sqrt((((((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3)) * ((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3)) * ((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3))) / 225000) - 7500)/180000))/(((-0.231+0.5)*0.71)+0.29)) as tada from players where club=99999 and age=19 UNION select *, ((((((((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3)) * ((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3)) * ((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3))) / 225000) - 7500)/9)*((((((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3)) * ((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3)) * ((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3))) / 225000) - 7500)/9))/15)*(((((((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3)) * ((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3)) * ((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3))) / 225000) - 7500)/240000+(1/(exp(pow(((age-16)/10),4.1)))))*((((workrate/8)+1)/19)+1))*((sqrt((((((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3)) * ((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3)) * ((height * 2) + handling + (speed * 4) + (passing * 2) + (vision * 2) + (rebounds * 3) + (position * 4) + (freethrow * 3) + (shooting * 4) + (experience * 2) + (defense * 3))) / 225000) - 7500)/180000))/(((0+0.5)*0.71)+0.29)) as tada from players where club=99999 and age=20 order by tada DESC LIMIT $limitad");
$ku=0;
while ($ku < mysql_num_rows($kurn)) {
$kuid=mysql_result($kurn,$ku,"id");
$kuname=mysql_result($kurn,$ku,"name");
$kusurname=mysql_result($kurn,$ku,"surname");
$kage=mysql_result($kurn,$ku,"age");
$kucountry=mysql_result($kurn,$ku,"country");
if ($kucountry=='Bosnia') {$kucountry='Bosnia and Herzegovina';}
$kuheight=mysql_result($kurn,$ku,"height");
echo ($ku+1),". <a href=\"player.php?playerid=",$kuid,"\">",$kuname," ",$kusurname,"</a>, ",$kage,", ",$kucountry,", ",$kuheight," cm<br/>";
$ku++;
}
}
?>

</td>
<td class="border" width="41%"><h2><?=$langmark1353?></h2><br/>
<?php
if ($draftt==2 OR $draftt==3) {
$ekipe = mysql_query("SELECT count( team ) AS ekipe FROM drafters");
$number = mysql_result($ekipe,0,"ekipe");
if ($TOKE > 0) {echo "<i>",$number," ",$langmark1180,"</i><br/><br/><b>You have ",$TOKE," tokens to use.</b>";} else {echo "<i>",$number," ",$langmark1180,"</i>";}
echo "<br/><br/><h2>Draft rules</h2><br/><i>Basketsim draft occurs once per season and provides an opportunity for smaller clubs to sign a future star. Bigger clubs can play it smart and get a good player as well. Participating clubs are sorted by league position (determined by league level and standing), team strength (wages) and club wealth (finances and club facilities). Teams can score up to 100 points in league position category and up to 200 in the other two categories. List of top teams is updated daily.</i><br/><br/><i>",$langmark1354," Teams with less than 6 players in squad or arena below 1500 seats will be removed before the draft begins.</i><br/>";
}

//status draft - preverim a je v živo
if (mysql_num_rows($skonec) AND $draftt==1) {
?>
<i>- <b><?=$langmark1356?></b><br/> <!--Draft is happening live-->
- 1108 <?=$langmark1357?><br/> <!--no of participating teams-->
- <?=$langmark1358?> 20 <?=$langmark1359?><br/> <!--seconds interval for picking players-->
- <?=$langmark1360?><br/> <!--best player picked as last-->
- <?=$langmark1361?> 23:15<br/></i> <!--draft finishes at-->
<?php
} if ($draftt==0) {
?>
<i>- <b><?=$langmark1363?></b><br/> <!--draft has ended-->
- 1108 <?=$langmark1364?><br/> <!--teams participated-->
- 1108 <?=$langmark1365?><br/><br/></i> <!--players picked-->
<?php
}

if (mysql_num_rows($skonec)) {
echo "<br/><h2>",$langmark1366,"</h2><br/>";
$result695 = mysql_query("SELECT to_club, tokens FROM draft, drafters WHERE season = '$sseason' AND done =1 AND to_club = team ORDER BY pick DESC LIMIT 100") or die(mysql_error());
$ccum=mysql_num_rows($result695);
if ($ccum > 0) {
$c=0;
while ($c < $ccum) {
$cto_club=mysql_result($result695,$c,"to_club");
$tokenz=mysql_result($result695,$c,"tokens");
$query1c = mysql_query("SELECT name FROM teams WHERE teamid ='$cto_club' LIMIT 1");
$imeklubac = mysql_result($query1c,0);
$query2c = mysql_query("SELECT userid, last_active, is_online FROM users WHERE club ='$cto_club' LIMIT 1");
$linkklubac = mysql_result($query2c,0,"userid");
$izonline = mysql_result($query2c,0,"is_online");
$lastactive = mysql_result($query2c,0,"last_active");
//aktivnost
$splitdatetime = explode(" ", $lastactive); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$expireminus = date("Y-m-d H:i:s", mktime($dbhour,$dbmin+35,$dbsec,$dbmonth,$dbday,$dbyear));
if ($talecas > $expireminus) {$izonline=0;}
echo "<a href=\"club.php?clubid=",$linkklubac,"\">",stripslashes($imeklubac),"</a>";
if ($tokenz > 0) {echo "&nbsp;(<span title=\"tokens\">",$tokenz,"</span>)";}
if ($izonline==1) {echo "&nbsp;<b><font color=\"darkgreen\">",$langmark042,"!</font></b>";}
echo "</font><br/>";
$c++;
}
}
if ($is_supporter==0) {
?>
<br/><h2>Draft sponsors:</h2><br/>
<script type="text/javascript"><!--
google_ad_client = "ca-pub-9708116335383093";
/* Basketsim Draft */
google_ad_slot = "9625448377";
google_ad_width = 120;
google_ad_height = 600;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
<?php
}
}

if ($draftt==0) {
?>
<form method="post" action="transfermarket.php?action=topdraft" style="margin: 0" name="tijuk">
<select name="country"  OnChange="location.href='transfermarket.php?action=topdraft&country='+tijuk.country.options[selectedIndex].value" class="inputreg">
<option name="" value="" <?php if ($country44==''){echo "selected";}?>>All countries</option>
<option name="Albania" value="Albania" <?php if ($country44=='Albania'){echo "selected";}?>>Albania</option>
<option name="Argentina" value="Argentina" <?php if ($country44=='Argentina'){echo "selected";}?>>Argentina</option>
<option name="Australia" value="Australia" <?php if ($country44=='Australia'){echo "selected";}?>>Australia</option>
<option name="Austria" value="Austria" <?php if ($country44=='Austria'){echo "selected";}?>>Austria</option>
<option name="Belarus" value="Belarus" <?php if ($country44=='Belarus'){echo "selected";}?>>Belarus</option>
<option name="Belgium" value="Belgium" <?php if ($country44=='Belgium'){echo "selected";}?>>Belgium</option>
<option name="Bosnia" value="Bosnia" <?php if ($country44=='Bosnia'){echo "selected";}?>>BiH</option>
<option name="Brazil" value="Brazil" <?php if ($country44=='Brazil'){echo "selected";}?>>Brazil</option>
<option name="Bulgaria" value="Bulgaria" <?php if ($country44=='Bulgaria'){echo "selected";}?>>Bulgaria</option>
<option name="Canada" value="Canada" <?php if ($country44=='Canada'){echo "selected";}?>>Canada</option>
<option name="Chile" value="Chile" <?php if ($country44=='Chile'){echo "selected";}?>>Chile</option>
<option name="China" value="China" <?php if ($country44=='China'){echo "selected";}?>>China</option>
<option name="Colombia" value="Colombia" <?php if ($country44=='Colombia'){echo "selected";}?>>Colombia</option>
<option name="Croatia" value="Croatia" <?php if ($country44=='Croatia'){echo "selected";}?>>Croatia</option>
<option name="Cyprus" value="Cyprus" <?php if ($country44=='Cyprus'){echo "selected";}?>>Cyprus</option>
<option name="Czech Republic" value="Czech Republic" <?php if ($country44=='Czech Republic'){echo "selected";}?>>Czech Republic</option>
<option name="Denmark" value="Denmark" <?php if ($country44=='Denmark'){echo "selected";}?>>Danmark</option>
<option name="Egypt" value="Egypt" <?php if ($country44=='Egypt'){echo "selected";}?>>Egypt</option>
<option name="Estonia" value="Estonia" <?php if ($country44=='Estonia'){echo "selected";}?>>Estonia</option>
<option name="Finland" value="Finland" <?php if ($country44=='Finland'){echo "selected";}?>>Finland</option>
<option name="France" value="France" <?php if ($country44=='France'){echo "selected";}?>>France</option>
<option name="FYR Macedonia" value="FYR Macedonia" <?php if ($country44=='FYR Macedonia'){echo "selected";}?>>FYR Macedonia</option>
<option name="Georgia" value="Georgia" <?php if ($country44=='Georgia'){echo "selected";}?>>Georgia</option>
<option name="Germany" value="Germany" <?php if ($country44=='Germany'){echo "selected";}?>>Germany</option>
<option name="Greece" value="Greece" <?php if ($country44=='Greece'){echo "selected";}?>>Greece</option>
<option name="Hong Kong" value="Hong Kong" <?php if ($country44=='Hong Kong'){echo "selected";}?>>Hong Kong</option>
<option name="Hungary" value="Hungary" <?php if ($country44=='Hungary'){echo "selected";}?>>Hungary</option>
<option name="India" value="India" <?php if ($country44=='India'){echo "selected";}?>>India</option>
<option name="Indonesia" value="Indonesia" <?php if ($country44=='Indonesia'){echo "selected";}?>>Indonesia</option>
<option name="Ireland" value="Ireland" <?php if ($country44=='Ireland'){echo "selected";}?>>Ireland</option>
<option name="Israel" value="Israel" <?php if ($country44=='Israel'){echo "selected";}?>>Israel</option>
<option name="Italy" value="Italy" <?php if ($country44=='Italy'){echo "selected";}?>>Italia</option>
<option name="Japan" value="Japan" <?php if ($country44=='Japan'){echo "selected";}?>>Japan</option>
<option name="Latvia" value="Latvia" <?php if ($country44=='Latvia'){echo "selected";}?>>Latvija</option>
<option name="Lithuania" value="Lithuania" <?php if ($country44=='Lithuania'){echo "selected";}?>>Lithuania</option>
<option name="Malaysia" value="Malaysia" <?php if ($country44=='Malaysia'){echo "selected";}?>>Malaysia</option>
<option name="Malta" value="Malta" <?php if ($country44=='Malta'){echo "selected";}?>>Malta</option>
<option name="Mexico" value="Mexico" <?php if ($country44=='Mexico'){echo "selected";}?>>Mexico</option>
<option name="Montenegro" value="Montenegro" <?php if ($country44=='Montenegro'){echo "selected";}?>>Montenegro</option>
<option name="Netherlands" value="Netherlands" <?php if ($country44=='Netherlands'){echo "selected";}?>>Netherlands</option>
<option name="New Zealand" value="New Zealand" <?php if ($country44=='New Zealand'){echo "selected";}?>>New Zealand</option>
<option name="Norway" value="Norway" <?php if ($country44=='Norway'){echo "selected";}?>>Norway</option>
<option name="Peru" value="Peru" <?php if ($country44=='Peru'){echo "selected";}?>>Peru</option>
<option name="Philippines" value="Philippines" <?php if ($country44=='Philippines'){echo "selected";}?>>Philippines</option>
<option name="Poland" value="Poland" <?php if ($country44=='Poland'){echo "selected";}?>>Poland</option>
<option name="Portugal" value="Portugal" <?php if ($country44=='Portugal'){echo "selected";}?>>Portugal</option>
<option name="Puerto Rico" value="Puerto Rico" <?php if ($country44=='Puerto Rico'){echo "selected";}?>>Puerto Rico</option>
<option name="Romania" value="Romania" <?php if ($country44=='Romania'){echo "selected";}?>>Romania</option>
<option name="Russia" value="Russia" <?php if ($country44=='Russia'){echo "selected";}?>>Russia</option>
<option name="Serbia" value="Serbia" <?php if ($country44=='Serbia'){echo "selected";}?>>Serbia</option>
<option name="Slovakia" value="Slovakia" <?php if ($country44=='Slovakia'){echo "selected";}?>>Slovakia</option>
<option name="Slovenia" value="Slovenia" <?php if ($country44=='Slovenia'){echo "selected";}?>>Slovenia</option>
<option name="South Korea" value="South Korea" <?php if ($country44=='South Korea'){echo "selected";}?>>South Korea</option>
<option name="Spain" value="Spain" <?php if ($country44=='Spain'){echo "selected";}?>>Spain</option>
<option name="Sweden" value="Sweden" <?php if ($country44=='Sweden'){echo "selected";}?>>Sweden</option>
<option name="Switzerland" value="Switzerland" <?php if ($country44=='Switzerland'){echo "selected";}?>>Switzerland</option>
<option name="Thailand" value="Thailand" <?php if ($country44=='Thailand'){echo "selected";}?>>Thailand</option>
<option name="Tunisia" value="Tunisia" <?php if ($country44=='Tunisia'){echo "selected";}?>>Tunisia</option>
<option name="Turkey" value="Turkey" <?php if ($country44=='Turkey'){echo "selected";}?>>Turkey</option>
<option name="Ukraine" value="Ukraine" <?php if ($country44=='Ukraine'){echo "selected";}?>>Ukraine</option>
<option name="United Kingdom" value="United Kingdom" <?php if ($country44=='United Kingdom'){echo "selected";}?>>United Kingdom</option>
<option name="Uruguay" value="Uruguay" <?php if ($country44=='Uruguay'){echo "selected";}?>>Uruguay</option>
<option name="USA" value="USA" <?php if ($country44=='USA'){echo "selected";}?>>USA</option>
<option name="Venezuela" value="Venezuela" <?php if ($country44=='Venezuela'){echo "selected";}?>>Venezuela</option>
</select>
<select name="sseason" class="inputreg">
<option value="21" <?php if($sseason==21){echo "selected";}?>>season 21</option>
<option value="20" <?php if($sseason==20){echo "selected";}?>>season 20</option>
<option value="19" <?php if($sseason==19){echo "selected";}?>>season 19</option>
<option value="18" <?php if($sseason==18){echo "selected";}?>>season 18</option>
<option value="17" <?php if($sseason==17){echo "selected";}?>>season 17</option>
<option value="16" <?php if($sseason==16){echo "selected";}?>>season 16</option>
<option value="15" <?php if($sseason==15){echo "selected";}?>>season 15</option>
<option value="14" <?php if($sseason==14){echo "selected";}?>>season 14</option>
<option value="13" <?php if($sseason==13){echo "selected";}?>>season 13</option>
<option value="12" <?php if($sseason==12){echo "selected";}?>>season 12</option>
<option value="11" <?php if($sseason==11){echo "selected";}?>>season 11</option>
<option value="10" <?php if($sseason==10){echo "selected";}?>>season 10</option>
<option value="9" <?php if($sseason==9){echo "selected";}?>>season 9</option>
<option value="8" <?php if($sseason==8){echo "selected";}?>>season 8</option>
<option value="7" <?php if($sseason==7){echo "selected";}?>>season 7</option>
<option value="6" <?php if($sseason==6){echo "selected";}?>>season 6</option>
<option value="5" <?php if($sseason==5){echo "selected";}?>>season 5</option>
<option value="4" <?php if($sseason==4){echo "selected";}?>>season 4</option>
<option value="3" <?php if($sseason==3){echo "selected";}?>>season 3</option>
<option value="2" <?php if($sseason==2){echo "selected";}?>>season 2</option>
<option value="1" <?php if($sseason==1){echo "selected";}?>>season 1</option>
</select>
<input type="submit" value=">" name="submit" class="buttonreg">
</form>
<?php
$yourex = mysql_query("SELECT season, player_id, player_name, player_surname, player_age, player_country FROM draft WHERE to_club=$kjuv");
$blaq = mysql_num_rows($yourex);
if ($blaq > 0) {echo "<br/><br/><h2>Your all-time draft picks</h2>";}
while ($kuc < $blaq) {
$exse=mysql_result($yourex,$kuc,"season");
$exid=mysql_result($yourex,$kuc,"player_id");
$exna=mysql_result($yourex,$kuc,"player_name");
$exsu=mysql_result($yourex,$kuc,"player_surname");
$exag=mysql_result($yourex,$kuc,"player_age");
$exco=mysql_result($yourex,$kuc,"player_country");
if ($exse < 10) {$exse1 = "0".$exse;} else {$exse1 = $exse;}
echo "<br/><span title=\"",$langmark502," ",$exse,"\"><b>",$exse1," </b></span>&nbsp;<img src=\"img/Flags/",$exco,".png\" border=\"0\" alt=\"",$exco,"\" title=\"",$exco,"\">&nbsp;<a href=\"player.php?playerid=",$exid,"\">",$exna," ",$exsu,"</a> (",$exag,")";
$kuc++;
}
}
echo "</td>";
//konec prikaza draftov
}

//prikaz trga
if ($action=='cmrlj') {
?>

<h2><?=$langmark1182?></h2>

<table cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="69%">

<!-- skupna tabela za levo stran -->

<table border="0" cellpadding="0" cellspacing="0">
<tr>
<td colspan="2" valign="top">

<form action="transfers.php" method="post" style="margin: 0">

<!-- SEARCH INFO -->

<?php
$bstmk1=$_COOKIE['bstmk1'];
$vse = explode("/-",$bstmk1);
$position = $vse[0];
$deadline = $vse[1];
$league = $vse[2];
$bornn = $vse[3];
$min_age = $vse[4];
$max_age = $vse[5];
$min_height = $vse[6];
$max_height = $vse[7];
$min_weight = $vse[8];
$max_weight = $vse[9];
$min_wage = $vse[10];
$max_wage = $vse[11];
$min_price = $vse[12];
$max_price = $vse[13];
$character = $vse[14];
$skill1 = $vse[15];
$skill1_min = $vse[16];
$skill1_max = $vse[17];
$skill2 = $vse[18];
$skill2_min = $vse[19];
$skill2_max = $vse[20];
$skill3 = $vse[21];
$skill3_min = $vse[22];
$skill3_max = $vse[23];
$skill4 = $vse[24];
$skill4_min = $vse[25];
$skill4_max = $vse[26];
$skill5 = $vse[27];
$skill5_min = $vse[28];
$skill5_max = $vse[29];
?>

<!-- tabela za zgornji dve opciji v searchu -->

<table border="0" cellpadding="2" cellspacing="0" width="355">
<tr>
<td valign="top">
<b><?=$langmark449?>:</b><br/>
<select name="position" size="1" class="inputreg">
<option value="0"><?=$langmark1183?></option>
<option value="1"<?php if($position==1){echo " selected";}?>><?=$langmark386?></option>
<option value="2"<?php if($position==2){echo " selected";}?>><?=$langmark387?></option>
<option value="3"<?php if($position==3){echo " selected";}?>><?=$langmark388?></option>
<option value="4"<?php if($position==4){echo " selected";}?>><?=$langmark389?></option>
<option value="5"<?php if($position==5){echo " selected";}?>><?=$langmark390?></option>
</select>
</td>

<td valign="top">
<b><?=$langmark1076?>:</b><br/>
<select name="deadline" size="1" class="inputreg">
<option value="0"><?=$langmark1184?></option>
<option value="1"<?php if($deadline==1){echo " selected";}?>><?=$langmark1185?></option>
<option value="2"<?php if($deadline==2){echo " selected";}?>><?=$langmark1186?></option>
<option value="3"<?php if($deadline==3){echo " selected";}?>><?=$langmark1187?></option>
<option value="4"<?php if($deadline==4){echo " selected";}?>><?=$langmark1188?></option>
<option value="5"<?php if($deadline==5){echo " selected";}?>><?=$langmark1189?></option>
<option value="6"<?php if($deadline==6){echo " selected";}?>><?=$langmark1190?></option>
<option value="7"<?php if($deadline==7){echo " selected";}?>><?=$langmark1191?></option>
</select>
</td>
</tr>
</table>

<!-- konec tabele za zgornji dve opciji -->

<!-- tabela od lige pa do konca skilov -->

<table border="0" cellpadding="4" cellspacing="0" width="355">
<tr>
<td colspan="1" valign="middle">
<b><?=$langmark1269?></b>
</td>
<td colspan="2" valign="top">
<select name="bornn" class="inputreg">
<option value="non">---<?=$langmark596?>---</option>
<option name="Albania" value="Albania" <?php if ($bornn=='Albania'){echo "selected";}?>>Albania</option>
<option name="Argentina" value="Argentina" <?php if ($bornn=='Argentina'){echo "selected";}?>>Argentina</option>
<option name="Australia" value="Australia" <?php if ($bornn=='Australia'){echo "selected";}?>>Australia</option>
<option name="Austria" value="Austria" <?php if ($bornn=='Austria'){echo "selected";}?>>Austria</option>
<option name="Belarus" value="Belarus" <?php if ($bornn=='Belarus'){echo "selected";}?>>Belarus</option>
<option name="Belgium" value="Belgium" <?php if ($bornn=='Belgium'){echo "selected";}?>>Belgium</option>
<option name="Bosnia" value="Bosnia" <?php if ($bornn=='Bosnia'){echo "selected";}?>>Bosna and Herzegovina</option>
<option name="Brazil" value="Brazil" <?php if ($bornn=='Brazil'){echo "selected";}?>>Brazil</option>
<option name="Bulgaria" value="Bulgaria" <?php if ($bornn=='Bulgaria'){echo "selected";}?>>Bulgaria</option>
<option name="Canada" value="Canada" <?php if ($bornn=='Canada'){echo "selected";}?>>Canada</option>
<option name="Chile" value="Chile" <?php if ($bornn=='Chile'){echo "selected";}?>>Chile</option>
<option name="China" value="China" <?php if ($bornn=='China'){echo "selected";}?>>China</option>
<option name="Colombia" value="Colombia" <?php if ($bornn=='Colombia'){echo "selected";}?>>Colombia</option>
<option name="Croatia" value="Croatia" <?php if ($bornn=='Croatia'){echo "selected";}?>>Croatia</option>
<option name="Cyprus" value="Cyprus" <?php if ($bornn=='Cyprus'){echo "selected";}?>>Cyprus</option>
<option name="Czech Republic" value="Czech Republic" <?php if ($bornn=='Czech Republic'){echo "selected";}?>>Czech Republic</option>
<option name="Denmark" value="Denmark" <?php if ($bornn=='Denmark'){echo "selected";}?>>Danmark</option>
<option name="Egypt" value="Egypt" <?php if ($bornn=='Egypt'){echo "selected";}?>>Egypt</option>
<option name="Estonia" value="Estonia" <?php if ($bornn=='Estonia'){echo "selected";}?>>Estonia</option>
<option name="Finland" value="Finland" <?php if ($bornn=='Finland'){echo "selected";}?>>Finland</option>
<option name="France" value="France" <?php if ($bornn=='France'){echo "selected";}?>>France</option>
<option name="FYR Macedonia" value="FYR Macedonia" <?php if ($bornn=='FYR Macedonia'){echo "selected";}?>>FYR Macedonia</option>
<option name="Georgia" value="Georgia" <?php if ($bornn=='Georgia'){echo "selected";}?>>Georgia</option>
<option name="Germany" value="Germany" <?php if ($bornn=='Germany'){echo "selected";}?>>Germany</option>
<option name="Greece" value="Greece" <?php if ($bornn=='Greece'){echo "selected";}?>>Greece</option>
<option name="Hong Kong" value="Hong Kong" <?php if ($bornn=='Hong Kong'){echo "selected";}?>>Hong Kong</option>
<option name="Hungary" value="Hungary" <?php if ($bornn=='Hungary'){echo "selected";}?>>Hungary</option>
<option name="India" value="India" <?php if ($bornn=='India'){echo "selected";}?>>India</option>
<option name="Indonesia" value="Indonesia" <?php if ($bornn=='Indonesia'){echo "selected";}?>>Indonesia</option>
<option name="Ireland" value="Ireland" <?php if ($bornn=='Ireland'){echo "selected";}?>>Ireland</option>
<option name="Israel" value="Israel" <?php if ($bornn=='Israel'){echo "selected";}?>>Israel</option>
<option name="Italy" value="Italy" <?php if ($bornn=='Italy'){echo "selected";}?>>Italia</option>
<option name="Japan" value="Japan" <?php if ($bornn=='Japan'){echo "selected";}?>>Japan</option>
<option name="Latvia" value="Latvia" <?php if ($bornn=='Latvia'){echo "selected";}?>>Latvija</option>
<option name="Lithuania" value="Lithuania" <?php if ($bornn=='Lithuania'){echo "selected";}?>>Lithuania</option>
<option name="Malaysia" value="Malaysia" <?php if ($bornn=='Malaysia'){echo "selected";}?>>Malaysia</option>
<option name="Malta" value="Malta" <?php if ($bornn=='Malta'){echo "selected";}?>>Malta</option>
<option name="Mexico" value="Mexico" <?php if ($bornn=='Mexico'){echo "selected";}?>>Mexico</option>
<option name="Montenegro" value="Montenegro" <?php if ($bornn=='Montenegro'){echo "selected";}?>>Montenegro</option>
<option name="Netherlands" value="Netherlands" <?php if ($bornn=='Netherlands'){echo "selected";}?>>Netherlands</option>
<option name="New Zealand" value="New Zealand" <?php if ($bornn=='New Zealand'){echo "selected";}?>>New Zealand</option>
<option name="Norway" value="Norway" <?php if ($bornn=='Norway'){echo "selected";}?>>Norway</option>
<option name="Peru" value="Peru" <?php if ($bornn=='Peru'){echo "selected";}?>>Peru</option>
<option name="Philippines" value="Philippines" <?php if ($bornn=='Philippines'){echo "selected";}?>>Philippines</option>
<option name="Poland" value="Poland" <?php if ($bornn=='Poland'){echo "selected";}?>>Poland</option>
<option name="Portugal" value="Portugal" <?php if ($bornn=='Portugal'){echo "selected";}?>>Portugal</option>
<option name="Puerto Rico" value="Puerto Rico" <?php if ($bornn=='Puerto Rico'){echo "selected";}?>>Puerto Rico</option>
<option name="Romania" value="Romania" <?php if ($bornn=='Romania'){echo "selected";}?>>Romania</option>
<option name="Russia" value="Russia" <?php if ($bornn=='Russia'){echo "selected";}?>>Russia</option>
<option name="Serbia" value="Serbia" <?php if ($bornn=='Serbia'){echo "selected";}?>>Serbia</option>
<option name="Slovakia" value="Slovakia" <?php if ($bornn=='Slovakia'){echo "selected";}?>>Slovakia</option>
<option name="Slovenia" value="Slovenia" <?php if ($bornn=='Slovenia'){echo "selected";}?>>Slovenia</option>
<option name="South Korea" value="South Korea" <?php if ($bornn=='South Korea'){echo "selected";}?>>South Korea</option>
<option name="Spain" value="Spain" <?php if ($bornn=='Spain'){echo "selected";}?>>Spain</option>
<option name="Sweden" value="Sweden" <?php if ($bornn=='Sweden'){echo "selected";}?>>Sweden</option>
<option name="Switzerland" value="Switzerland" <?php if ($bornn=='Switzerland'){echo "selected";}?>>Switzerland</option>
<option name="Thailand" value="Thailand" <?php if ($bornn=='Thailand'){echo "selected";}?>>Thailand</option>
<option name="Tunisia" value="Tunisia" <?php if ($bornn=='Tunisia'){echo "selected";}?>>Tunisia</option>
<option name="Turkey" value="Turkey" <?php if ($bornn=='Turkey'){echo "selected";}?>>Turkey</option>
<option name="Ukraine" value="Ukraine" <?php if ($bornn=='Ukraine'){echo "selected";}?>>Ukraine</option>
<option name="United Kingdom" value="United Kingdom" <?php if ($bornn=='United Kingdom'){echo "selected";}?>>United Kingdom</option>
<option name="Uruguay" value="Uruguay" <?php if ($bornn=='Uruguay'){echo "selected";}?>>Uruguay</option>
<option name="USA" value="USA" <?php if ($bornn=='USA'){echo "selected";}?>>USA</option>
<option name="Venezuela" value="Venezuela" <?php if ($bornn=='Venezuela'){echo "selected";}?>>Venezuela</option>
</select></td>
</tr>

<tr>
<td colspan="1" valign="middle"><b><?=$langmark113?>:</b></td>
<td colspan="1" valign="top"><?=$langmark1193?> <input type="text" name="min_age" value="<?=$min_age?>" size="2" maxlength="2" class="inputreg">yo</td>
<td colspan="1" valign="top"><?=$langmark1194?> <input type="text" name="max_age" value="<?=$max_age?>" size="2" maxlength="2" class="inputreg">yo</td>
</tr>

<tr>
<td colspan="1" valign="middle"><b><?=$langmark116?>:</b></td>
<td colspan="1" valign="top"><?=$langmark1193?> <input type="text" name="min_height" value="<?=$min_height?>" size="2" maxlength="3" class="inputreg">cm</td>
<td colspan="1" valign="top"><?=$langmark1194?> <input type="text" name="max_height" value="<?=$max_height?>" size="2" maxlength="3" class="inputreg">cm</td>
</tr>

<tr>
<td colspan="1" valign="middle"><b><?=$langmark117?>:</b></td>
<td colspan="1" valign="top"><?=$langmark1193?> <input type="text" name="min_weight" value="<?=$min_weight?>" size="2" maxlength="3" class="inputreg">kg</td>
<td colspan="1" valign="top"><?=$langmark1194?> <input type="text" name="max_weight" value="<?=$max_weight?>" size="2" maxlength="3" class="inputreg">kg</td>
</tr>

<tr>
<td colspan="1" valign="middle"><b><?=$langmark1195?>:</b></td>
<td colspan="1" valign="top"><?=$langmark1193?> <input type="text" name="min_wage" value="<?=$min_wage?>" size="7" maxlength="8" class="inputreg"></td>
<td colspan="1" valign="top"><?=$langmark1194?> <input type="text" name="max_wage" value="<?=$max_wage?>" size="7" maxlength="8" class="inputreg"></td>
</tr>
<tr>
<td colspan="1" valign="middle"><b><?=$langmark1196?>:</b></td>
<td colspan="1" valign="top"><?=$langmark1193?> <input type="text" name="min_price" value="<?=$min_price?>" size="7" maxlength="10" class="inputreg"></td>
<td colspan="1" valign="top"><?=$langmark1194?> <input type="text" name="max_price" value="<?=$max_price?>" size="7" maxlength="10" class="inputreg"></td>
</tr>
<tr>
<td colspan="1" valign="middle"><b><?=$langmark115?>:</b></td>
<td colspan="2" valign="top">
<select name="character" class="inputreg">
<option value="0"><?=$langmark1197?></option>
<option value="1"<?php if($character==1){echo " selected";}?>><?=$langmark766?></option>
<option value="2"<?php if($character==2){echo " selected";}?>><?=$langmark765?></option>
<option value="3"<?php if($character==3){echo " selected";}?>><?=$langmark767?></option>
<option value="4"<?php if($character==4){echo " selected";}?>><?=$langmark764?></option>
<option value="5"<?php if($character==5){echo " selected";}?>><?=$langmark768?></option>
<option value="6"<?php if($character==6){echo " selected";}?>><?=$langmark763?></option>
<option value="8"<?php if($character==6){echo " selected";}?>>clumsy</option>
<option value="7"<?php if($character==6){echo " selected";}?>>dirty</option>
<option value="9"<?php if($character==6){echo " selected";}?>>explosive</option>
<option value="12"<?php if($character==6){echo " selected";}?>>fragile</option>
<option value="14"<?php if($character==6){echo " selected";}?>>lazy</option>
<option value="10"<?php if($character==6){echo " selected";}?>>loyal</option>
<option value="13"<?php if($character==6){echo " selected";}?>>tough</option>
<option value="11"<?php if($character==6){echo " selected";}?>>wise</option>
</select>
</td>
</tr>

<tr><td colspan="3" valign="middle"><h2><?=$langmark1198?>:</h2></td></tr>
<tr><td colspan="3" valign="top">

<!-- tabela za skill 1 -->

<table border="0" cellspacing="0" cellpadding="1" width="99%">
<tr><td valign="top">
<select name="skill1" size="1" class="inputreg">
<option value="">---<?=$langmark1199?>&nbsp;1---</option>
<option value="handling"<?php if($skill1=='handling'){echo " selected";}?>><?=$langmark120?></option>
<option value="speed"<?php if($skill1=='speed'){echo " selected";}?>><?=$langmark121?></option>
<option value="passing"<?php if($skill1=='passing'){echo " selected";}?>><?=$langmark122?></option>
<option value="vision"<?php if($skill1=='vision'){echo " selected";}?>><?=$langmark123?></option>
<option value="rebounds"<?php if($skill1=='rebounds'){echo " selected";}?>><?=$langmark124?></option>
<option value="position"<?php if($skill1=='position'){echo " selected";}?>><?=$langmark125?></option>
<option value="shooting"<?php if($skill1=='shooting'){echo " selected";}?>><?=$langmark126?></option>
<option value="freethrow"<?php if($skill1=='freethrow'){echo " selected";}?>><?=$langmark127?></option>
<option value="defense"<?php if($skill1=='defense'){echo " selected";}?>><?=$langmark128?></option>
<option value="workrate"<?php if($skill1=='workrate'){echo " selected";}?>><?=$langmark129?></option>
<option value="experience"<?php if($skill1=='experience'){echo " selected";}?>><?=$langmark130?></option>
</select></td>

<td valign="top">
<select name="skill1_min" size="1" class="inputreg">
<option value="">---<?=$langmark1193?>---</option>
<option value="0"<?php if($skill1_min==0){echo " selected";}?>><?=$langmark111?></option>
<option value="9"<?php if($skill1_min==9){echo " selected";}?>><?=$langmark096?></option>
<option value="17"<?php if($skill1_min==17){echo " selected";}?>><?=$langmark097?></option>
<option value="25"<?php if($skill1_min==25){echo " selected";}?>><?=$langmark098?></option>
<option value="33"<?php if($skill1_min==33){echo " selected";}?>><?=$langmark099?></option>
<option value="41"<?php if($skill1_min==41){echo " selected";}?>><?=$langmark100?></option>
<option value="49"<?php if($skill1_min==49){echo " selected";}?>><?=$langmark101?></option>
<option value="57"<?php if($skill1_min==57){echo " selected";}?>><?=$langmark102?></option>
<option value="65"<?php if($skill1_min==65){echo " selected";}?>><?=$langmark103?></option>
<option value="73"<?php if($skill1_min==73){echo " selected";}?>><?=$langmark104?></option>
<option value="81"<?php if($skill1_min==81){echo " selected";}?>><?=$langmark105?></option>
<option value="89"<?php if($skill1_min==89){echo " selected";}?>><?=$langmark106?></option>
<option value="97"<?php if($skill1_min==97){echo " selected";}?>><?=$langmark107?></option>
<option value="105"<?php if($skill1_min==105){echo " selected";}?>><?=$langmark108?></option>
<option value="113"<?php if($skill1_min==113){echo " selected";}?>><?=$langmark1584?></option>
<option value="121"<?php if($skill1_min==121){echo " selected";}?>><?=$langmark1585?></option>
<option value="129"<?php if($skill1_min==129){echo " selected";}?>><?=$langmark1586?></option>
<option value="137"<?php if($skill1_min==137){echo " selected";}?>><?=$langmark1587?></option>
<option value="145"<?php if($skill1_min==145){echo " selected";}?>><?=$langmark1588?></option>
<option value="153"<?php if($skill1_min==153){echo " selected";}?>><?=$langmark109?></option>
<option value="161"<?php if($skill1_min==161){echo " selected";}?>><?=$langmark110?></option>
</select></td>

<td valign="top">
<select name="skill1_max" size="1" class="inputreg">
<option value="">---<?=$langmark1194?>---</option>
<option value="9"<?php if($skill1_max==9){echo " selected";}?>><?=$langmark111?></option>
<option value="17"<?php if($skill1_max==17){echo " selected";}?>><?=$langmark096?></option>
<option value="25"<?php if($skill1_max==25){echo " selected";}?>><?=$langmark097?></option>
<option value="33"<?php if($skill1_max==33){echo " selected";}?>><?=$langmark098?></option>
<option value="41"<?php if($skill1_max==41){echo " selected";}?>><?=$langmark099?></option>
<option value="49"<?php if($skill1_max==49){echo " selected";}?>><?=$langmark100?></option>
<option value="57"<?php if($skill1_max==57){echo " selected";}?>><?=$langmark101?></option>
<option value="65"<?php if($skill1_max==65){echo " selected";}?>><?=$langmark102?></option>
<option value="73"<?php if($skill1_max==73){echo " selected";}?>><?=$langmark103?></option>
<option value="81"<?php if($skill1_max==81){echo " selected";}?>><?=$langmark104?></option>
<option value="89"<?php if($skill1_max==89){echo " selected";}?>><?=$langmark105?></option>
<option value="97"<?php if($skill1_max==97){echo " selected";}?>><?=$langmark106?></option>
<option value="105"<?php if($skill1_max==105){echo " selected";}?>><?=$langmark107?></option>
<option value="113"<?php if($skill1_max==113){echo " selected";}?>><?=$langmark108?></option>
<option value="121"<?php if($skill1_max==121){echo " selected";}?>><?=$langmark1584?></option>
<option value="129"<?php if($skill1_max==129){echo " selected";}?>><?=$langmark1585?></option>
<option value="137"<?php if($skill1_max==137){echo " selected";}?>><?=$langmark1586?></option>
<option value="145"<?php if($skill1_max==145){echo " selected";}?>><?=$langmark1587?></option>
<option value="153"<?php if($skill1_max==153){echo " selected";}?>><?=$langmark1588?></option>
<option value="161"<?php if($skill1_max==161){echo " selected";}?>><?=$langmark109?></option>
<option value="400"<?php if($skill1_max==400){echo " selected";}?>><?=$langmark110?></option>
</select></td></tr>
</table>

<!-- konec tabele za skill 1 -->

</td></tr>
<tr><td colspan="3" valign="top">

<!-- tabela za skill 2 -->

<table border="0" cellspacing="0" cellpadding="1" width="99%">
<tr><td valign="top">
<select name="skill2" size="1" class="inputreg">
<option value="">---<?=$langmark1199?>&nbsp;2---</option>
<option value="handling"<?php if($skill2=='handling'){echo " selected";}?>><?=$langmark120?></option>
<option value="speed"<?php if($skill2=='speed'){echo " selected";}?>><?=$langmark121?></option>
<option value="passing"<?php if($skill2=='passing'){echo " selected";}?>><?=$langmark122?></option>
<option value="vision"<?php if($skill2=='vision'){echo " selected";}?>><?=$langmark123?></option>
<option value="rebounds"<?php if($skill2=='rebounds'){echo " selected";}?>><?=$langmark124?></option>
<option value="position"<?php if($skill2=='position'){echo " selected";}?>><?=$langmark125?></option>
<option value="shooting"<?php if($skill2=='shooting'){echo " selected";}?>><?=$langmark126?></option>
<option value="freethrow"<?php if($skill2=='freethrow'){echo " selected";}?>><?=$langmark127?></option>
<option value="defense"<?php if($skill2=='defense'){echo " selected";}?>><?=$langmark128?></option>
<option value="workrate"<?php if($skill2=='workrate'){echo " selected";}?>><?=$langmark129?></option>
<option value="experience"<?php if($skill2=='experience'){echo " selected";}?>><?=$langmark130?></option>
</select></td>

<td valign="top">
<select name="skill2_min" size="1" class="inputreg">
<option value="">---<?=$langmark1193?>---</option>
<option value="0"<?php if($skill2_min==0){echo " selected";}?>><?=$langmark111?></option>
<option value="9"<?php if($skill2_min==9){echo " selected";}?>><?=$langmark096?></option>
<option value="17"<?php if($skill2_min==17){echo " selected";}?>><?=$langmark097?></option>
<option value="25"<?php if($skill2_min==25){echo " selected";}?>><?=$langmark098?></option>
<option value="33"<?php if($skill2_min==33){echo " selected";}?>><?=$langmark099?></option>
<option value="41"<?php if($skill2_min==41){echo " selected";}?>><?=$langmark100?></option>
<option value="49"<?php if($skill2_min==49){echo " selected";}?>><?=$langmark101?></option>
<option value="57"<?php if($skill2_min==57){echo " selected";}?>><?=$langmark102?></option>
<option value="65"<?php if($skill2_min==65){echo " selected";}?>><?=$langmark103?></option>
<option value="73"<?php if($skill2_min==73){echo " selected";}?>><?=$langmark104?></option>
<option value="81"<?php if($skill2_min==81){echo " selected";}?>><?=$langmark105?></option>
<option value="89"<?php if($skill2_min==89){echo " selected";}?>><?=$langmark106?></option>
<option value="97"<?php if($skill2_min==97){echo " selected";}?>><?=$langmark107?></option>
<option value="105"<?php if($skill2_min==105){echo " selected";}?>><?=$langmark108?></option>
<option value="113"<?php if($skill2_min==113){echo " selected";}?>><?=$langmark1584?></option>
<option value="121"<?php if($skill2_min==121){echo " selected";}?>><?=$langmark1585?></option>
<option value="129"<?php if($skill2_min==129){echo " selected";}?>><?=$langmark1586?></option>
<option value="137"<?php if($skill2_min==137){echo " selected";}?>><?=$langmark1587?></option>
<option value="145"<?php if($skill2_min==145){echo " selected";}?>><?=$langmark1588?></option>
<option value="153"<?php if($skill2_min==153){echo " selected";}?>><?=$langmark109?></option>
<option value="161"<?php if($skill2_min==161){echo " selected";}?>><?=$langmark110?></option>
</select></td>

<td valign="top">
<select name="skill2_max" size="1" class="inputreg">
<option value="">---<?=$langmark1194?>---</option>
<option value="9"<?php if($skill2_max==9){echo " selected";}?>><?=$langmark111?></option>
<option value="17"<?php if($skill2_max==17){echo " selected";}?>><?=$langmark096?></option>
<option value="25"<?php if($skill2_max==25){echo " selected";}?>><?=$langmark097?></option>
<option value="33"<?php if($skill2_max==33){echo " selected";}?>><?=$langmark098?></option>
<option value="41"<?php if($skill2_max==41){echo " selected";}?>><?=$langmark099?></option>
<option value="49"<?php if($skill2_max==49){echo " selected";}?>><?=$langmark100?></option>
<option value="57"<?php if($skill2_max==57){echo " selected";}?>><?=$langmark101?></option>
<option value="65"<?php if($skill2_max==65){echo " selected";}?>><?=$langmark102?></option>
<option value="73"<?php if($skill2_max==73){echo " selected";}?>><?=$langmark103?></option>
<option value="81"<?php if($skill2_max==81){echo " selected";}?>><?=$langmark104?></option>
<option value="89"<?php if($skill2_max==89){echo " selected";}?>><?=$langmark105?></option>
<option value="97"<?php if($skill2_max==97){echo " selected";}?>><?=$langmark106?></option>
<option value="105"<?php if($skill2_max==105){echo " selected";}?>><?=$langmark107?></option>
<option value="113"<?php if($skill2_max==113){echo " selected";}?>><?=$langmark108?></option>
<option value="121"<?php if($skill2_max==121){echo " selected";}?>><?=$langmark1584?></option>
<option value="129"<?php if($skill2_max==129){echo " selected";}?>><?=$langmark1585?></option>
<option value="137"<?php if($skill2_max==137){echo " selected";}?>><?=$langmark1586?></option>
<option value="145"<?php if($skill2_max==145){echo " selected";}?>><?=$langmark1587?></option>
<option value="153"<?php if($skill2_max==153){echo " selected";}?>><?=$langmark1588?></option>
<option value="161"<?php if($skill2_max==161){echo " selected";}?>><?=$langmark109?></option>
<option value="400"<?php if($skill2_max==400){echo " selected";}?>><?=$langmark110?></option>
</select></td></tr>
</table>

<!-- konec tabele za skil 2 -->

</td></tr>
<tr><td colspan="3" valign="top">

<!-- tabele za skil 3 -->

<table border="0" cellspacing="0" cellpadding="1" width="99%">
<tr><td valign="top">
<select name="skill3" size="1" class="inputreg">
<option value="">---<?=$langmark1199?>&nbsp;3---</option>
<option value="handling"<?php if($skill3=='handling'){echo " selected";}?>><?=$langmark120?></option>
<option value="speed"<?php if($skill3=='speed'){echo " selected";}?>><?=$langmark121?></option>
<option value="passing"<?php if($skill3=='passing'){echo " selected";}?>><?=$langmark122?></option>
<option value="vision"<?php if($skill3=='vision'){echo " selected";}?>><?=$langmark123?></option>
<option value="rebounds"<?php if($skill3=='rebounds'){echo " selected";}?>><?=$langmark124?></option>
<option value="position"<?php if($skill3=='position'){echo " selected";}?>><?=$langmark125?></option>
<option value="shooting"<?php if($skill3=='shooting'){echo " selected";}?>><?=$langmark126?></option>
<option value="freethrow"<?php if($skill3=='freethrow'){echo " selected";}?>><?=$langmark127?></option>
<option value="defense"<?php if($skill3=='defense'){echo " selected";}?>><?=$langmark128?></option>
<option value="workrate"<?php if($skill3=='workrate'){echo " selected";}?>><?=$langmark129?></option>
<option value="experience"<?php if($skill3=='experience'){echo " selected";}?>><?=$langmark130?></option>
</select></td>

<td valign="top">
<select name="skill3_min" size="1" class="inputreg">
<option value="">---<?=$langmark1193?>---</option>
<option value="0"<?php if($skill3_min==0){echo " selected";}?>><?=$langmark111?></option>
<option value="9"<?php if($skill3_min==9){echo " selected";}?>><?=$langmark096?></option>
<option value="17"<?php if($skill3_min==17){echo " selected";}?>><?=$langmark097?></option>
<option value="25"<?php if($skill3_min==25){echo " selected";}?>><?=$langmark098?></option>
<option value="33"<?php if($skill3_min==33){echo " selected";}?>><?=$langmark099?></option>
<option value="41"<?php if($skill3_min==41){echo " selected";}?>><?=$langmark100?></option>
<option value="49"<?php if($skill3_min==49){echo " selected";}?>><?=$langmark101?></option>
<option value="57"<?php if($skill3_min==57){echo " selected";}?>><?=$langmark102?></option>
<option value="65"<?php if($skill3_min==65){echo " selected";}?>><?=$langmark103?></option>
<option value="73"<?php if($skill3_min==73){echo " selected";}?>><?=$langmark104?></option>
<option value="81"<?php if($skill3_min==81){echo " selected";}?>><?=$langmark105?></option>
<option value="89"<?php if($skill3_min==89){echo " selected";}?>><?=$langmark106?></option>
<option value="97"<?php if($skill3_min==97){echo " selected";}?>><?=$langmark107?></option>
<option value="105"<?php if($skill3_min==105){echo " selected";}?>><?=$langmark108?></option>
<option value="113"<?php if($skill3_min==113){echo " selected";}?>><?=$langmark1584?></option>
<option value="121"<?php if($skill3_min==121){echo " selected";}?>><?=$langmark1585?></option>
<option value="129"<?php if($skill3_min==129){echo " selected";}?>><?=$langmark1586?></option>
<option value="137"<?php if($skill3_min==137){echo " selected";}?>><?=$langmark1587?></option>
<option value="145"<?php if($skill3_min==145){echo " selected";}?>><?=$langmark1588?></option>
<option value="153"<?php if($skill3_min==153){echo " selected";}?>><?=$langmark109?></option>
<option value="161"<?php if($skill3_min==161){echo " selected";}?>><?=$langmark110?></option>
</select></td>

<td valign="top">
<select name="skill3_max" size="1" class="inputreg">
<option value="">---<?=$langmark1194?>---</option>
<option value="9"<?php if($skill3_max==9){echo " selected";}?>><?=$langmark111?></option>
<option value="17"<?php if($skill3_max==17){echo " selected";}?>><?=$langmark096?></option>
<option value="25"<?php if($skill3_max==25){echo " selected";}?>><?=$langmark097?></option>
<option value="33"<?php if($skill3_max==33){echo " selected";}?>><?=$langmark098?></option>
<option value="41"<?php if($skill3_max==41){echo " selected";}?>><?=$langmark099?></option>
<option value="49"<?php if($skill3_max==49){echo " selected";}?>><?=$langmark100?></option>
<option value="57"<?php if($skill3_max==57){echo " selected";}?>><?=$langmark101?></option>
<option value="65"<?php if($skill3_max==65){echo " selected";}?>><?=$langmark102?></option>
<option value="73"<?php if($skill3_max==73){echo " selected";}?>><?=$langmark103?></option>
<option value="81"<?php if($skill3_max==81){echo " selected";}?>><?=$langmark104?></option>
<option value="89"<?php if($skill3_max==89){echo " selected";}?>><?=$langmark105?></option>
<option value="97"<?php if($skill3_max==97){echo " selected";}?>><?=$langmark106?></option>
<option value="105"<?php if($skill3_max==105){echo " selected";}?>><?=$langmark107?></option>
<option value="113"<?php if($skill3_max==113){echo " selected";}?>><?=$langmark108?></option>
<option value="121"<?php if($skill3_max==121){echo " selected";}?>><?=$langmark1584?></option>
<option value="129"<?php if($skill3_max==129){echo " selected";}?>><?=$langmark1585?></option>
<option value="137"<?php if($skill3_max==137){echo " selected";}?>><?=$langmark1586?></option>
<option value="145"<?php if($skill3_max==145){echo " selected";}?>><?=$langmark1587?></option>
<option value="153"<?php if($skill3_max==153){echo " selected";}?>><?=$langmark1588?></option>
<option value="161"<?php if($skill3_max==161){echo " selected";}?>><?=$langmark109?></option>
<option value="400"<?php if($skill3_max==400){echo " selected";}?>><?=$langmark110?></option>
</select></td></tr>
</table>

<!-- konec tabele za skil 3 -->

</td></tr>
<tr><td colspan="3" valign="top">

<!-- tabela za skil 4 -->

<table border="0" cellspacing="0" cellpadding="1" width="99%">
<tr><td valign="top">
<select name="skill4" size="1" class="inputreg">
<option value="">---<?=$langmark1199?>&nbsp;4---</option>
<option value="handling"<?php if($skill4=='handling'){echo " selected";}?>><?=$langmark120?></option>
<option value="speed"<?php if($skill4=='speed'){echo " selected";}?>><?=$langmark121?></option>
<option value="passing"<?php if($skill4=='passing'){echo " selected";}?>><?=$langmark122?></option>
<option value="vision"<?php if($skill4=='vision'){echo " selected";}?>><?=$langmark123?></option>
<option value="rebounds"<?php if($skill4=='rebounds'){echo " selected";}?>><?=$langmark124?></option>
<option value="position"<?php if($skill4=='position'){echo " selected";}?>><?=$langmark125?></option>
<option value="shooting"<?php if($skill4=='shooting'){echo " selected";}?>><?=$langmark126?></option>
<option value="freethrow"<?php if($skill4=='freethrow'){echo " selected";}?>><?=$langmark127?></option>
<option value="defense"<?php if($skill4=='defense'){echo " selected";}?>><?=$langmark128?></option>
<option value="workrate"<?php if($skill4=='workrate'){echo " selected";}?>><?=$langmark129?></option>
<option value="experience"<?php if($skill4=='experience'){echo " selected";}?>><?=$langmark130?></option>
</select></td>

<td valign="top">
<select name="skill4_min" size="1" class="inputreg">
<option value="">---<?=$langmark1193?>---</option>
<option value="0"<?php if($skill4_min==0){echo " selected";}?>><?=$langmark111?></option>
<option value="9"<?php if($skill4_min==9){echo " selected";}?>><?=$langmark096?></option>
<option value="17"<?php if($skill4_min==17){echo " selected";}?>><?=$langmark097?></option>
<option value="25"<?php if($skill4_min==25){echo " selected";}?>><?=$langmark098?></option>
<option value="33"<?php if($skill4_min==33){echo " selected";}?>><?=$langmark099?></option>
<option value="41"<?php if($skill4_min==41){echo " selected";}?>><?=$langmark100?></option>
<option value="49"<?php if($skill4_min==49){echo " selected";}?>><?=$langmark101?></option>
<option value="57"<?php if($skill4_min==57){echo " selected";}?>><?=$langmark102?></option>
<option value="65"<?php if($skill4_min==65){echo " selected";}?>><?=$langmark103?></option>
<option value="73"<?php if($skill4_min==73){echo " selected";}?>><?=$langmark104?></option>
<option value="81"<?php if($skill4_min==81){echo " selected";}?>><?=$langmark105?></option>
<option value="89"<?php if($skill4_min==89){echo " selected";}?>><?=$langmark106?></option>
<option value="97"<?php if($skill4_min==97){echo " selected";}?>><?=$langmark107?></option>
<option value="105"<?php if($skill4_min==105){echo " selected";}?>><?=$langmark108?></option>
<option value="113"<?php if($skill4_min==113){echo " selected";}?>><?=$langmark1584?></option>
<option value="121"<?php if($skill4_min==121){echo " selected";}?>><?=$langmark1585?></option>
<option value="129"<?php if($skill4_min==129){echo " selected";}?>><?=$langmark1586?></option>
<option value="137"<?php if($skill4_min==137){echo " selected";}?>><?=$langmark1587?></option>
<option value="145"<?php if($skill4_min==145){echo " selected";}?>><?=$langmark1588?></option>
<option value="153"<?php if($skill4_min==153){echo " selected";}?>><?=$langmark109?></option>
<option value="161"<?php if($skill4_min==161){echo " selected";}?>><?=$langmark110?></option>
</select></td>

<td valign="top">
<select name="skill4_max" size="1" class="inputreg">
<option value="">---<?=$langmark1194?>---</option>
<option value="9"<?php if($skill4_max==9){echo " selected";}?>><?=$langmark111?></option>
<option value="17"<?php if($skill4_max==17){echo " selected";}?>><?=$langmark096?></option>
<option value="25"<?php if($skill4_max==25){echo " selected";}?>><?=$langmark097?></option>
<option value="33"<?php if($skill4_max==33){echo " selected";}?>><?=$langmark098?></option>
<option value="41"<?php if($skill4_max==41){echo " selected";}?>><?=$langmark099?></option>
<option value="49"<?php if($skill4_max==49){echo " selected";}?>><?=$langmark100?></option>
<option value="57"<?php if($skill4_max==57){echo " selected";}?>><?=$langmark101?></option>
<option value="65"<?php if($skill4_max==65){echo " selected";}?>><?=$langmark102?></option>
<option value="73"<?php if($skill4_max==73){echo " selected";}?>><?=$langmark103?></option>
<option value="81"<?php if($skill4_max==81){echo " selected";}?>><?=$langmark104?></option>
<option value="89"<?php if($skill4_max==89){echo " selected";}?>><?=$langmark105?></option>
<option value="97"<?php if($skill4_max==97){echo " selected";}?>><?=$langmark106?></option>
<option value="105"<?php if($skill4_max==105){echo " selected";}?>><?=$langmark107?></option>
<option value="113"<?php if($skill4_max==113){echo " selected";}?>><?=$langmark108?></option>
<option value="121"<?php if($skill4_max==121){echo " selected";}?>><?=$langmark1584?></option>
<option value="129"<?php if($skill4_max==129){echo " selected";}?>><?=$langmark1585?></option>
<option value="137"<?php if($skill4_max==137){echo " selected";}?>><?=$langmark1586?></option>
<option value="145"<?php if($skill4_max==145){echo " selected";}?>><?=$langmark1587?></option>
<option value="153"<?php if($skill4_max==153){echo " selected";}?>><?=$langmark1588?></option>
<option value="161"<?php if($skill4_max==161){echo " selected";}?>><?=$langmark109?></option>
<option value="400"<?php if($skill4_max==400){echo " selected";}?>><?=$langmark110?></option>
</select></td></tr>
</table>

<!-- konec tabele za skil 4 -->

</td></tr>
<tr><td colspan="3" valign="top">

<!-- tabela za skil 5 -->

<table border="0" cellspacing="0" cellpadding="1" width="99%">
<tr><td valign="top">
<select name="skill5" size="1" class="inputreg">
<option value="">---<?=$langmark1199?>&nbsp;5---</option>
<option value="handling"<?php if($skill5=='handling'){echo " selected";}?>><?=$langmark120?></option>
<option value="speed"<?php if($skill5=='speed'){echo " selected";}?>><?=$langmark121?></option>
<option value="passing"<?php if($skill5=='passing'){echo " selected";}?>><?=$langmark122?></option>
<option value="vision"<?php if($skill5=='vision'){echo " selected";}?>><?=$langmark123?></option>
<option value="rebounds"<?php if($skill5=='rebounds'){echo " selected";}?>><?=$langmark124?></option>
<option value="position"<?php if($skill5=='position'){echo " selected";}?>><?=$langmark125?></option>
<option value="shooting"<?php if($skill5=='shooting'){echo " selected";}?>><?=$langmark126?></option>
<option value="freethrow"<?php if($skill5=='freethrow'){echo " selected";}?>><?=$langmark127?></option>
<option value="defense"<?php if($skill5=='defense'){echo " selected";}?>><?=$langmark128?></option>
<option value="workrate"<?php if($skill5=='workrate'){echo " selected";}?>><?=$langmark129?></option>
<option value="experience"<?php if($skill5=='experience'){echo " selected";}?>><?=$langmark130?></option>
</select></td>

<td valign="top">
<select name="skill5_min" size="1" class="inputreg">
<option value="">---<?=$langmark1193?>---</option>
<option value="0"<?php if($skill5_min==0){echo " selected";}?>><?=$langmark111?></option>
<option value="9"<?php if($skill5_min==9){echo " selected";}?>><?=$langmark096?></option>
<option value="17"<?php if($skill5_min==17){echo " selected";}?>><?=$langmark097?></option>
<option value="25"<?php if($skill5_min==25){echo " selected";}?>><?=$langmark098?></option>
<option value="33"<?php if($skill5_min==33){echo " selected";}?>><?=$langmark099?></option>
<option value="41"<?php if($skill5_min==41){echo " selected";}?>><?=$langmark100?></option>
<option value="49"<?php if($skill5_min==49){echo " selected";}?>><?=$langmark101?></option>
<option value="57"<?php if($skill5_min==57){echo " selected";}?>><?=$langmark102?></option>
<option value="65"<?php if($skill5_min==65){echo " selected";}?>><?=$langmark103?></option>
<option value="73"<?php if($skill5_min==73){echo " selected";}?>><?=$langmark104?></option>
<option value="81"<?php if($skill5_min==81){echo " selected";}?>><?=$langmark105?></option>
<option value="89"<?php if($skill5_min==89){echo " selected";}?>><?=$langmark106?></option>
<option value="97"<?php if($skill5_min==97){echo " selected";}?>><?=$langmark107?></option>
<option value="105"<?php if($skill5_min==105){echo " selected";}?>><?=$langmark108?></option>
<option value="113"<?php if($skill5_min==113){echo " selected";}?>><?=$langmark1584?></option>
<option value="121"<?php if($skill5_min==121){echo " selected";}?>><?=$langmark1585?></option>
<option value="129"<?php if($skill5_min==129){echo " selected";}?>><?=$langmark1586?></option>
<option value="137"<?php if($skill5_min==137){echo " selected";}?>><?=$langmark1587?></option>
<option value="145"<?php if($skill5_min==145){echo " selected";}?>><?=$langmark1588?></option>
<option value="153"<?php if($skill5_min==153){echo " selected";}?>><?=$langmark109?></option>
<option value="161"<?php if($skill5_min==161){echo " selected";}?>><?=$langmark110?></option>

</select></td>

<td valign="top">
<select name="skill5_max" size="1" class="inputreg">
<option value="">---<?=$langmark1194?>---</option>
<option value="9"<?php if($skill5_max==9){echo " selected";}?>><?=$langmark111?></option>
<option value="17"<?php if($skill5_max==17){echo " selected";}?>><?=$langmark096?></option>
<option value="25"<?php if($skill5_max==25){echo " selected";}?>><?=$langmark097?></option>
<option value="33"<?php if($skill5_max==33){echo " selected";}?>><?=$langmark098?></option>
<option value="41"<?php if($skill5_max==41){echo " selected";}?>><?=$langmark099?></option>
<option value="49"<?php if($skill5_max==49){echo " selected";}?>><?=$langmark100?></option>
<option value="57"<?php if($skill5_max==57){echo " selected";}?>><?=$langmark101?></option>
<option value="65"<?php if($skill5_max==65){echo " selected";}?>><?=$langmark102?></option>
<option value="73"<?php if($skill5_max==73){echo " selected";}?>><?=$langmark103?></option>
<option value="81"<?php if($skill5_max==81){echo " selected";}?>><?=$langmark104?></option>
<option value="89"<?php if($skill5_max==89){echo " selected";}?>><?=$langmark105?></option>
<option value="97"<?php if($skill5_max==97){echo " selected";}?>><?=$langmark106?></option>
<option value="105"<?php if($skill5_max==105){echo " selected";}?>><?=$langmark107?></option>
<option value="113"<?php if($skill5_max==113){echo " selected";}?>><?=$langmark108?></option>
<option value="121"<?php if($skill5_max==121){echo " selected";}?>><?=$langmark1584?></option>
<option value="129"<?php if($skill5_max==129){echo " selected";}?>><?=$langmark1585?></option>
<option value="137"<?php if($skill5_max==137){echo " selected";}?>><?=$langmark1586?></option>
<option value="145"<?php if($skill5_max==145){echo " selected";}?>><?=$langmark1587?></option>
<option value="153"<?php if($skill5_max==153){echo " selected";}?>><?=$langmark1588?></option>
<option value="161"<?php if($skill5_max==161){echo " selected";}?>><?=$langmark109?></option>
<option value="400"<?php if($skill5_max==400){echo " selected";}?>><?=$langmark110?></option>
</select></td></tr>
</table>

<!-- konec tabele za skil 5 -->

</td>
</tr>
<tr>
<td colspan="2" valign="top"></td>
<td colspan="1" align="right" valign="bottom">
<input type="submit" value="<?=$langmark1200?>" class="buttonreg"></td>
</tr>
</table>

<!-- konec tabele od lige pa do konca skilov -->

</form>
<a href="transfermarket.php?do=clean"><?=$langmark1201?></a>
</td>
</tr>
</table>

<!-- konec skupne tabele za levo stran -->

<?php
}
if ($action<>'toptransfers' AND $action<>'lasttransfers' AND $action<>'topdraft' AND $action <>'lasttop' AND $action <>'buyouth'){
?>

</td><td class="border" width="31%">

<h2><?=$langmark199?></h2><br/>

<a href="transfermarket.php?cheat=1"><?=$langmark1203?></a><br/>
<?php
if ($cheat==1){
?>
<br/><form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="margin: 0">
<b><?=$langmark1204?></b> <input type="text" size="10" maxlength="10" name="sporen" class="inputreg">
<input type="submit" name="submit_cheat" value="<?=$langmark1205?>" class="buttonreg">
</form>
<b><a href="gmcontact.php"><?=$langmark1206?></a></b><br/>
<?php }?>
<br/><h2>Statistics</h2><br/>
<a href="transfermarket.php?action=lasttransfers"><?=$langmark1209?></a><br/>
<a href="transfermarket.php?action=lasttop"><?=$langmark1208?></a><br/>
<a href="transfermarket.php?action=toptransfers"><?=$langmark1207?></a><br/>
<br/><img src="img/moneysmall.jpg" border="0" alt="" title="" /></td>
<?php } ?>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>