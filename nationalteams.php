<?php
$coexpand=14;

$stobar=4; //ekipe ki so obarvane (kvalifikanti)
$ON3RD=0; //1 pomeni prikaz 3-uvrščenih

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT club, lang, supporter, natcoach,  nt_country  FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)) {
$trueclub = mysql_result ($compare,0,"club");
$lang = mysql_result ($compare,0,"lang");
$is_supporter = mysql_result ($compare,0,"supporter");
$natcoach = mysql_result ($compare,0,"natcoach");
$nt_country = mysql_result ($compare,0,"nt_country");
}
else {die(include 'basketsim.php');}
require("inc/lang/".$lang.".php");

$azt = $_GET[azt];
if ($azt=='ion' AND $userid==1) {
mysql_query("TRUNCATE TABLE `thirdplace`") or die(mysql_error());
$thrupdat = mysql_query("SELECT * FROM `countries` WHERE qualgroup<>'' ORDER BY `qualgroup` ASC , win DESC , difference DESC , for_ DESC") or die(mysql_error());
$ik=0; $numa3=mysql_num_rows($thrupdat);
while ($ik < $numa3) {
if ($ik==2 OR $ik==8 OR $ik==14 OR $ik==20 OR $ik==26 OR $ik==32 OR $ik==38 OR $ik==44 OR $ik==50 OR $ik==56) {
$country3U=mysql_result($thrupdat,$ik,"country");
$win3U=mysql_result($thrupdat,$ik,"win");
$lose3U=mysql_result($thrupdat,$ik,"lose");
$diff3U=mysql_result($thrupdat,$ik,"difference");
$for3U=mysql_result($thrupdat,$ik,"for_");
mysql_query("INSERT INTO `thirdplace` VALUES ('$country3U', $win3U, $lose3U,$diff3U, $for3U);") or die(mysql_error());
}
$ik++;
}
mysql_query("ALTER TABLE `thirdplace` ORDER BY `win3` DESC, `diff3` DESC, `for3` DESC") or die(mysql_error());
die("3rd place updated!");
}

//nastavljeno
if (isset($_POST['submitac']) AND $natcoach==1) { 
$starting_pg = $_POST["starting_pg"];
$starting_sg = $_POST["starting_sg"];
$starting_sf = $_POST["starting_sf"];
$starting_pf = $_POST["starting_pf"];
$starting_c = $_POST["starting_c"];
$reserve_pg = $_POST["reserve_pg"];
$reserve_sg = $_POST["reserve_sg"];
$reserve_sf = $_POST["reserve_sf"];
$reserve_pf = $_POST["reserve_pf"];
$reserve_c = $_POST["reserve_c"];
$def_strat = $_POST["def_strat"];
$off_strat = $_POST["off_strat"];
$atitud = $_POST["atitud"];

if (!$starting_pg) {$starting_pg=0;}
if (!$starting_sg) {$starting_sg=0;}
if (!$starting_sf) {$starting_sf=0;}
if (!$starting_pf) {$starting_pf=0;}
if (!$starting_c) {$starting_c=0;}
if (!$reserve_pg) {$reserve_pg=0;}
if (!$reserve_sg) {$reserve_sg=0;}
if (!$reserve_sf) {$reserve_sf=0;}
if (!$reserve_pf) {$reserve_pf=0;}
if (!$reserve_c) {$reserve_c=0;}

if ($starting_pg == $starting_sg AND $starting_pg != 0) {header( "Location: nationalteams.php?ntc=yes&mess=no" ); die ();}
if ($starting_pg == $starting_sf AND $starting_pg != 0){header( "Location: nationalteams.php?ntc=yes&mess=no" ); die ();}
if ($starting_pg == $starting_pf AND $starting_pg != 0){header( "Location: nationalteams.php?ntc=yes&mess=no" ); die ();}
if ($starting_pg == $starting_c AND $starting_pg != 0){header( "Location: nationalteams.php?ntc=yes&mess=no" ); die ();}
if ($starting_sg == $starting_sf AND $starting_sg != 0){header( "Location: nationalteams.php?ntc=yes&mess=no" ); die ();}
if ($starting_sg == $starting_pf AND $starting_sg != 0){header( "Location: nationalteams.php?ntc=yes&mess=no" ); die ();}
if ($starting_sg == $starting_c AND $starting_sg != 0){header( "Location: nationalteams.php?ntc=yes&mess=no" ); die ();}
if ($starting_sf == $starting_pf AND $starting_sf != 0){header( "Location: nationalteams.php?ntc=yes&mess=no" ); die ();}
if ($starting_sf == $starting_c AND $starting_sf != 0){header( "Location: nationalteams.php?ntc=yes&mess=no" ); die ();}
if ($starting_pf == $starting_c AND $starting_pf != 0){header( "Location: nationalteams.php?ntc=yes&mess=no" ); die ();}
if ($starting_pg == $reserve_pg AND $starting_pg != 0) {header( "Location: nationalteams.php?ntc=yes&mess=no" ); die ();}
if ($starting_pg == $reserve_sg AND $starting_pg != 0) {header( "Location: nationalteams.php?ntc=yes&mess=no" ); die ();}
if ($starting_pg == $reserve_sf AND $starting_pg != 0){header( "Location: nationalteams.php?ntc=yes&mess=no" ); die ();}
if ($starting_pg == $reserve_pf AND $starting_pg != 0){header( "Location: nationalteams.php?ntc=yes&mess=no" ); die ();}
if ($starting_pg == $reserve_c AND $starting_pg != 0){header( "Location: nationalteams.php?ntc=yes&mess=no" ); die ();}
if ($starting_sg == $reserve_sg AND $starting_sg != 0){header( "Location: nationalteams.php?ntc=yes&mess=no" ); die ();}
if ($starting_sg == $reserve_sf AND $starting_sg != 0){header( "Location: nationalteams.php?ntc=yes&mess=no" ); die ();}
if ($starting_sg == $reserve_pf AND $starting_sg != 0){header( "Location: nationalteams.php?ntc=yes&mess=no" ); die ();}
if ($starting_sg == $reserve_c AND $starting_sg != 0){header( "Location: nationalteams.php?ntc=yes&mess=no" ); die ();}
if ($starting_sf == $reserve_sf AND $starting_sf != 0){header( "Location: nationalteams.php?ntc=yes&mess=no" ); die ();}
if ($starting_sf == $reserve_pf AND $starting_sf != 0){header( "Location: nationalteams.php?ntc=yes&mess=no" ); die ();}
if ($starting_sf == $reserve_c AND $starting_sf != 0){header( "Location: nationalteams.php?ntc=yes&mess=no" ); die ();}
if ($starting_pf == $reserve_pf AND $starting_pf != 0){header( "Location: nationalteams.php?ntc=yes&mess=no" ); die ();}
if ($starting_pf == $reserve_c AND $starting_pf != 0){header( "Location: nationalteams.php?ntc=yes&mess=no" ); die ();}
if ($starting_c == $reserve_c AND $starting_c != 0){header( "Location: nationalteams.php?ntc=yes&mess=no" ); die ();}
if ($reserve_pg == $reserve_sg AND $reserve_pg != 0) {header( "Location: nationalteams.php?ntc=yes&mess=no" ); die ();}
if ($reserve_pg == $reserve_sf AND $reserve_pg != 0){header( "Location: nationalteams.php?ntc=yes&mess=no" ); die ();}
if ($reserve_pg == $reserve_pf AND $reserve_pg != 0){header( "Location: nationalteams.php?ntc=yes&mess=no" ); die ();}
if ($reserve_pg == $reserve_c AND $reserve_pg != 0){header( "Location: nationalteams.php?ntc=yes&mess=no" ); die ();}
if ($reserve_sg == $reserve_sf AND $reserve_sg != 0){header( "Location: nationalteams.php?ntc=yes&mess=no" ); die ();}
if ($reserve_sg == $reserve_pf AND $reserve_sg != 0){header( "Location: nationalteams.php?ntc=yes&mess=no" ); die ();}
if ($reserve_sg == $reserve_c AND $reserve_sg != 0){header( "Location: nationalteams.php?ntc=yes&mess=no" ); die ();}
if ($reserve_sf == $reserve_pf AND $reserve_sf != 0){header( "Location: nationalteams.php?ntc=yes&mess=no" ); die ();}
if ($reserve_sf == $reserve_c AND $reserve_sf != 0){header( "Location: nationalteams.php?ntc=yes&mess=no" ); die ();}
if ($reserve_pf == $reserve_c AND $reserve_pf != 0){header( "Location: nationalteams.php?ntc=yes&mess=no" ); die ();}

if ($starting_pg==0 || $starting_sg==0 || $starting_sf==0 || $starting_pf==0 || $starting_c==0) {header( "Location: nationalteams.php?ntc=yes&mess=dlnv" ); die ();}

mysql_query("UPDATE countries SET pg1=$starting_pg, sg1=$starting_sg, sf1=$starting_sf, pf1=$starting_pf, c1=$starting_c, pg2=$reserve_pg, sg2=$reserve_sg, sf2=$reserve_sf, pf2=$reserve_pf, c2=$reserve_c, off=$off_strat, def=$def_strat, att='$atitud' WHERE country LIKE '$nt_country'") or die(mysql_error());
header( 'Location: nationalteams.php?ntc=yes&mess=yes' );
}

if (isset($_POST['submit']) AND $natcoach==1) {
$captain = $_POST["captain"];
$hshirt = $_POST["hshirt"];
$ashirt = $_POST["ashirt"];
$homepage = $_POST["homepage"];
$message = $_POST["message"];
$hshirt=mysql_real_escape_string($hshirt);
$ashirt=mysql_real_escape_string($ashirt);
$homepage=mysql_real_escape_string($homepage);
$message = strip_tags($message);
$message = nl2br($message);
$message = mysql_real_escape_string($message);
$djawa = mysql_query("SELECT * FROM countries WHERE `country`='$nt_country' AND captain=$captain LIMIT 1");
if (mysql_num_rows($djawa)<>1) {mysql_query("UPDATE countries SET mood=greatest(mood-8,0) WHERE country='$nt_country' LIMIT 1");}
mysql_query("UPDATE `countries` SET `home_shirt`='$hshirt', `away_shirt`='$ashirt', `home_page`='$homepage', `statement`='$message', `captain`='$captain' WHERE `country`='$nt_country' LIMIT 1") or die(mysql_error());
header("Location: nationalteams.php");
}

if (isset($_POST['submit1']) AND $natcoach==1) { 
//STEVILKE MAJIC
$nofp = $_POST["nofp"];
$ko=0;
while ($ko < $nofp) {
$shirtck = "shirtnum_".$ko;
$playerck = "playernum_".$ko;
$numigraca = $_POST["$shirtck"];
$idigraca = $_POST["$playerck"];
if ($nt_country=='Bosnia and Herzegovina') {$preveter = mysql_query("SELECT id FROM players WHERE country='Bosnia' AND ntplayer=1 AND ntshirt=$numigraca AND ntshirt >0") or die(mysql_error());}
else {$preveter = mysql_query("SELECT id FROM players WHERE country='$nt_country' AND ntplayer=1 AND ntshirt=$numigraca AND ntshirt >0") or die(mysql_error());}
if (!(mysql_num_rows($preveter)>0)) {mysql_query("UPDATE players SET ntshirt = $numigraca WHERE id = $idigraca LIMIT 1") or die(mysql_error());}
$ko++;
}
header("Location: nationalteams.php");
}

$country = $_POST["country"];
if (!$country){$country = $_GET["country"];}
if (!$country AND strlen($nt_country)>2 AND $natcoach==1){$country = $nt_country;}
if (!$country){
$scountry = mysql_query("SELECT country FROM teams WHERE teamid=$trueclub") or die(mysql_error());
$country = mysql_result($scountry,0);
}
if ($country=='Bosnia' || $country=='BiH') {$country='Bosnia and Herzegovina';}

$ntc = $_GET["ntc"];
if ($ntc=='yes' && $natcoach<>1) {header("Location:nationalteams.php"); die();}

$kuha = mysql_query("SELECT `countryid`, mood, home_shirt, away_shirt, home_page, statement, natarena, pg1, sg1, sf1, pf1, c1, pg2, sg2, sf2, pf2, c2, off, def, att, captain, legendid, legendname FROM `countries` WHERE `country`='$country' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($kuha)<>1) {header('Location: index.php'); die();}
$cunja = mysql_result($kuha,0,"countryid");
$cenas = mysql_result($kuha,0,"mood");
$dmajca = mysql_result($kuha,0,"home_shirt");
$gmajca = mysql_result($kuha,0,"away_shirt");
$dstran = mysql_result($kuha,0,"home_page");
$homepr = str_replace("Http://","",$dstran); $homepr = str_replace("http://","",$homepr); $homepr = str_replace("Https://","",$homepr); $homepr = str_replace("https://","",$homepr);
$mesdz = mysql_result($kuha,0,"statement"); $mesdz = trim($mesdz);
$natarena = mysql_result($kuha,0,"natarena");
$home_pg1 = mysql_result($kuha,0,"pg1");
$home_sg1 = mysql_result($kuha,0,"sg1");
$home_sf1 = mysql_result($kuha,0,"sf1");
$home_pf1 = mysql_result($kuha,0,"pf1");
$home_c1 = mysql_result($kuha,0,"c1");
$home_pg2 = mysql_result($kuha,0,"pg2");
$home_sg2 = mysql_result($kuha,0,"sg2");
$home_sf2 = mysql_result($kuha,0,"sf2");
$home_pf2 = mysql_result($kuha,0,"pf2");
$home_c2 = mysql_result($kuha,0,"c2");
$home_off = mysql_result($kuha,0,"off");
$home_def = mysql_result($kuha,0,"def");
$home_att = mysql_result($kuha,0,"att");
$cset = mysql_result($kuha,0,"captain");
$legendid = mysql_result($kuha,0,"legendid");
$legendname = mysql_result($kuha,0,"legendname");

//frendly challenge
if (isset($_POST['submitboom']) AND $natcoach==1) {
$frendrzava = $_POST["frendrzava"];
$frendarena = $_POST["frendarena"];
$frendatu = $_POST["frendatu"];
if ($frendatu <> '1970-01-01 00:59:59' && $frendatu <> '1970-01-01 00:59:00') {mysql_query("INSERT INTO nt_friendly VALUES ('', $cunja, $frendrzava, $frendarena, '$frendatu');") or die(mysql_error());}
header( 'Location: nationalteams.php?ntc=yes&mess=chal' );
}

//sprejem frendlija
$ction = $_GET["ction"];
$did = $_GET["did"];
if ($ction==accept && is_numeric($did)) {
$preveru = mysql_query("SELECT `nt_friendly`.`who_from`, `nt_friendly`.`who_to`, `nt_friendly`.`when`, `nt_friendly`.`where`, `countries`.`country` FROM `nt_friendly`, `countries` WHERE `nt_friendly`.`who_from` = `countries`.`countryid` AND `nt_friendly`.`id` = '$did' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($preveru) != 1) {header("Location:nationalteams.php?ntc=yes"); die();}
if (mysql_result($preveru,0,"who_to") == $cunja) {
//res je bil izzvan on, zdaj pogledam ce ima tekmo
$casss = mysql_result($preveru,0,"nt_friendly.when");
$unnn = mysql_result($preveru,0,"nt_friendly.who_from");
$ktar = mysql_result($preveru,0,"nt_friendly.where");
$slabodiv = mysql_result($preveru,0,"countries.country");
$preveritevzadnja = mysql_query("SELECT matchid FROM nt_matches WHERE (home_id=$cunja OR away_id = $cunja OR home_id = $unnn OR away_id = $unnn) AND type < 10 AND time = '$casss'") or die(mysql_error());
if (mysql_num_rows($preveritevzadnja)>0) {header( 'Location: nationalteams.php?ntc=yes&mess=bya' ); die();}
else {
//nastavim tekmo in zbrišem challenge ter redirectam na seznam tekem
mysql_query("INSERT INTO nt_matches VALUES ('', $unnn, '$slabodiv', $cunja, '$nt_country', $ktar, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$casss', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '$slabodiv', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $default_season, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);") or die(mysql_error());
mysql_query("DELETE FROM nt_friendly WHERE id = $did LIMIT 1") or die(mysql_error());
header( "location: ntfixtures.php?group=99" );
}
}
}
if ($ction==reject && is_numeric($did)) {
@mysql_query("DELETE FROM nt_friendly WHERE id = $did LIMIT 1");
header( "Location: nationalteams.php?ntc=yes" );
}

include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2><?=$langmark1530?></h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<?php
$a = $_GET["a"];
if ($ntc=='yes'){?><td class="border" width="63%"><?php } else {?><td class="border" width="50%"><?php }

if ($ntc<>'yes') {
//DISPLAY OF GROUPS
?>

<h2>11th World Cup (TBA 2015)</h2><br/>

<!--
[<?php if ($a==qual) {?><a href="nationalteams.php"><?=$langmark1531?></a>]&nbsp;[<?=$langmark1500?>]<?php } else {?><?=$langmark1531?>]&nbsp;[<a href="nationalteams.php?a=qual"><?=$langmark1500?></a>]<?php }?><br/>
-->
[<?=$langmark1500?>]<br/>

<?php
if ($a == 'qual') {

//COPYPASTE OF LAST QUALS
?>








<?php
//END OF COPYPASTE OF LAST QUALS
} else {
?>



<!--
world cup final here
-->






<?php
$gAquery = mysql_query("SELECT country, win, lose, difference FROM `countries` WHERE qualgroup LIKE 'A' ORDER BY win DESC, difference DESC, for_ DESC, country ASC");
$gA=0;
$numnt = mysql_num_rows($gAquery);
if ($numnt > 0) {
?>
<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b><?=strtoupper($langmark1535)?> A</b><!-- <i>(<a class="greenhilite" href="region.php?region=Attiki">Attiki</a>)</i>--></td><td align="right"><a href="ntfixtures.php?group=1"><b>Fixtures</b></a></td></tr></table>
<?php }?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<?php
while ($gA < $numnt) {
$cA = mysql_result($gAquery,$gA,"country");
$wA = mysql_result($gAquery,$gA,"win");
$lA = mysql_result($gAquery,$gA,"lose");
$dA = mysql_result($gAquery,$gA,"difference");
if ($dA > 0) {$dA="+".$dA;}
if ($gA < $stobar) {echo "<tr bgcolor=\"#FFCC99\">";} else {echo "<tr>";}
?>
<td width="200"><img src="img/Flags/<?=$cA?>.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=<?=$cA?>"><?=$cA?></td><td align="right"><?=$wA?> - <?=$lA?></td><td align="right">(<?=$dA?>)</td></tr>
<?php
$gA++;
}
?>
</table>

<?php
$gAquery = mysql_query("SELECT country, win, lose, difference FROM `countries` WHERE qualgroup LIKE 'B' ORDER BY win DESC, difference DESC, for_ DESC, country ASC");
$gA=0;
$numnt = mysql_num_rows($gAquery);
if ($numnt > 0) {
?>
<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b><?=strtoupper($langmark1535)?> B</b><!-- <i>(<a class="greenhilite" href="region.php?region=Kriti">Kriti</a>)</i>--></td><td align="right"><a href="ntfixtures.php?group=2"><b>Fixtures</b></a></td></tr></table>
<?php }?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<?php
while ($gA < $numnt) {
$cA = mysql_result($gAquery,$gA,"country");
$wA = mysql_result($gAquery,$gA,"win");
$lA = mysql_result($gAquery,$gA,"lose");
$dA = mysql_result($gAquery,$gA,"difference");
if ($dA > 0) {$dA="+".$dA;}
if ($gA < $stobar) {echo "<tr bgcolor=\"#FFCC99\">";} else {echo "<tr>";}
?>
<td width="200"><img src="img/Flags/<?=$cA?>.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=<?=$cA?>"><?=$cA?></td><td align="right"><?=$wA?> - <?=$lA?></td><td align="right">(<?=$dA?>)</td></tr>
<?php
$gA++;
}
?>
</table>

<?php
$gAquery = mysql_query("SELECT country, win, lose, difference FROM `countries` WHERE qualgroup LIKE 'C' ORDER BY win DESC, difference DESC, for_ DESC, country ASC");
$gA=0;
$numnt = mysql_num_rows($gAquery);
if ($numnt > 0) {
?>
<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b><?=strtoupper($langmark1535)?> C</b><!-- <i>(<a class="greenhilite" href="region.php?region=Sterea Ellas">Sterea Ellas</a>)</i>--></td><td align="right"><a href="ntfixtures.php?group=3"><b>Fixtures</b></a></td></tr></table>
<?php }?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<?php
while ($gA < $numnt) {
$cA = mysql_result($gAquery,$gA,"country");
$wA = mysql_result($gAquery,$gA,"win");
$lA = mysql_result($gAquery,$gA,"lose");
$dA = mysql_result($gAquery,$gA,"difference");
if ($dA > 0) {$dA="+".$dA;}
if ($gA < $stobar) {echo "<tr bgcolor=\"#FFCC99\">";} else {echo "<tr>";}
?>
<td width="200"><img src="img/Flags/<?=$cA?>.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=<?=$cA?>"><?=$cA?></td><td align="right"><?=$wA?> - <?=$lA?></td><td align="right">(<?=$dA?>)</td></tr>
<?php
$gA++;
}
?>
</table>

<?php
$gAquery = mysql_query("SELECT country, win, lose, difference FROM `countries` WHERE qualgroup LIKE 'D' ORDER BY win DESC, difference DESC, for_ DESC, country ASC");
$gA=0;
$numnt = mysql_num_rows($gAquery);
if ($numnt > 0) {
?>
<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b><?=strtoupper($langmark1535)?> D</b><!-- <i>(<a class="greenhilite" href="region.php?region=Attiki">Attiki</a>)</i>--></td><td align="right"><a href="ntfixtures.php?group=4"><b>Fixtures</b></a></td></tr></table>
<?php }?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<?php
while ($gA < $numnt) {
$cA = mysql_result($gAquery,$gA,"country");
$wA = mysql_result($gAquery,$gA,"win");
$lA = mysql_result($gAquery,$gA,"lose");
$dA = mysql_result($gAquery,$gA,"difference");
if ($dA > 0) {$dA="+".$dA;}
if ($gA < $stobar) {echo "<tr bgcolor=\"#FFCC99\">";} else {echo "<tr>";}
?>
<td width="200"><img src="img/Flags/<?=$cA?>.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=<?=$cA?>"><?=$cA?></td><td align="right"><?=$wA?> - <?=$lA?></td><td align="right">(<?=$dA?>)</td></tr>
<?php
$gA++;
}
?>
</table>

<?php
$gAquery = mysql_query("SELECT country, win, lose, difference FROM `countries` WHERE qualgroup LIKE 'E' ORDER BY win DESC, difference DESC, for_ DESC, country ASC");
$gA=0;
$numnt = mysql_num_rows($gAquery);
if ($numnt > 0) {
?>
<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b><?=strtoupper($langmark1535)?> E</b><!-- <i>(<a class="greenhilite" href="region.php?region=Peloponnisos">Peloponnisos</a>)</i>--></td><td align="right"><a href="ntfixtures.php?group=5"><b>Fixtures</b></a></td></tr></table>
<?php }?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<?php
while ($gA < $numnt) {
$cA = mysql_result($gAquery,$gA,"country");
$wA = mysql_result($gAquery,$gA,"win");
$lA = mysql_result($gAquery,$gA,"lose");
$dA = mysql_result($gAquery,$gA,"difference");
if ($dA > 0) {$dA="+".$dA;}
if ($gA < $stobar) {echo "<tr bgcolor=\"#FFCC99\">";} else {echo "<tr>";}
?>
<td width="200"><img src="img/Flags/<?=$cA?>.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=<?=$cA?>"><?=$cA?></td><td align="right"><?=$wA?> - <?=$lA?></td><td align="right">(<?=$dA?>)</td></tr>
<?php
$gA++;
}
?>
</table>

<?php
$gAquery = mysql_query("SELECT country, win, lose, difference FROM `countries` WHERE qualgroup LIKE 'F' ORDER BY win DESC, difference DESC, for_ DESC, country ASC");
$gA=0;
$numnt = mysql_num_rows($gAquery);
if ($numnt > 0) {
?>
<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b><?=strtoupper($langmark1535)?> F</b><!-- <i>(<a class="greenhilite" href="region.php?region=Ipeiros">Ipeiros</a>)</i>--></td><td align="right"><a href="ntfixtures.php?group=6"><b>Fixtures</b></a></td></tr></table>
<?php }?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<?php
while ($gA < $numnt) {
$cA = mysql_result($gAquery,$gA,"country");
$wA = mysql_result($gAquery,$gA,"win");
$lA = mysql_result($gAquery,$gA,"lose");
$dA = mysql_result($gAquery,$gA,"difference");
if ($dA > 0) {$dA="+".$dA;}
if ($gA < $stobar) {echo "<tr bgcolor=\"#FFCC99\">";} else {echo "<tr>";}
?>
<td width="200"><img src="img/Flags/<?=$cA?>.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=<?=$cA?>"><?=$cA?></td><td align="right"><?=$wA?> - <?=$lA?></td><td align="right">(<?=$dA?>)</td></tr>
<?php
$gA++;
}
?>
</table>

<?php
$gAquery = mysql_query("SELECT country, win, lose, difference FROM `countries` WHERE qualgroup LIKE 'G' ORDER BY win DESC, difference DESC, for_ DESC, country ASC");
$gA=0;
$numnt = mysql_num_rows($gAquery);
if ($numnt > 0) {
?>
<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b><?=strtoupper($langmark1535)?> G</b><!-- <i>(<a class="greenhilite" href="region.php?region=Aigaio">Aigaio</a>)</i>--></td><td align="right"><a href="ntfixtures.php?group=7"><b>Fixtures</b></a></td></tr></table>
<?php }?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<?php
while ($gA < $numnt) {
$cA = mysql_result($gAquery,$gA,"country");
$wA = mysql_result($gAquery,$gA,"win");
$lA = mysql_result($gAquery,$gA,"lose");
$dA = mysql_result($gAquery,$gA,"difference");
if ($dA > 0) {$dA="+".$dA;}
if ($gA < $stobar) {echo "<tr bgcolor=\"#FFCC99\">";} else {echo "<tr>";}
?>
<td width="200"><img src="img/Flags/<?=$cA?>.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=<?=$cA?>"><?=$cA?></td><td align="right"><?=$wA?> - <?=$lA?></td><td align="right">(<?=$dA?>)</td></tr>
<?php
$gA++;
}
?>
</table>

<?php
$gAquery = mysql_query("SELECT country, win, lose, difference FROM `countries` WHERE qualgroup LIKE 'H' ORDER BY win DESC, difference DESC, for_ DESC, country ASC");
$gA=0;
$numnt = mysql_num_rows($gAquery);
if ($numnt > 0) {
?>
<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b><?=strtoupper($langmark1535)?> H</b><!-- <i>(<a class="greenhilite" href="region.php?region=Makedonia">Makedonia</a>)</i>--></td><td align="right"><a href="ntfixtures.php?group=8"><b>Fixtures</b></a></td></tr></table>
<?php }?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<?php
while ($gA < $numnt) {
$cA = mysql_result($gAquery,$gA,"country");
$wA = mysql_result($gAquery,$gA,"win");
$lA = mysql_result($gAquery,$gA,"lose");
$dA = mysql_result($gAquery,$gA,"difference");
if ($dA > 0) {$dA="+".$dA;}
if ($gA < $stobar) {echo "<tr bgcolor=\"#FFCC99\">";} else {echo "<tr>";}
?>
<td width="200"><img src="img/Flags/<?=$cA?>.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=<?=$cA?>"><?=$cA?></td><td align="right"><?=$wA?> - <?=$lA?></td><td align="right">(<?=$dA?>)</td></tr>
<?php
$gA++;
}
?>
</table>

<?php
$gAquery = mysql_query("SELECT country, win, lose, difference FROM `countries` WHERE qualgroup LIKE 'I' ORDER BY win DESC, difference DESC, for_ DESC, country ASC");
$gA=0;
$numnt = mysql_num_rows($gAquery);
if ($numnt > 0) {
?>
<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b><?=strtoupper($langmark1535)?> I</b></td><td align="right"><a href="ntfixtures.php?group=9"><b>Fixtures</b></a></td></tr></table>
<?php }?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<?php
while ($gA < $numnt) {
$cA = mysql_result($gAquery,$gA,"country");
$wA = mysql_result($gAquery,$gA,"win");
$lA = mysql_result($gAquery,$gA,"lose");
$dA = mysql_result($gAquery,$gA,"difference");
if ($dA > 0) {$dA="+".$dA;}
if ($gA < $stobar) {echo "<tr bgcolor=\"#FFCC99\">";} else {echo "<tr>";}
?>
<td width="200"><img src="img/Flags/<?=$cA?>.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=<?=$cA?>"><?=$cA?></td><td align="right"><?=$wA?> - <?=$lA?></td><td align="right">(<?=$dA?>)</td></tr>
<?php
$gA++;
}
?>
</table>

<?php
$gAquery = mysql_query("SELECT country, win, lose, difference FROM `countries` WHERE qualgroup LIKE 'J' ORDER BY win DESC, difference DESC, for_ DESC, country ASC");
$gA=0;
$numnt = mysql_num_rows($gAquery);
if ($numnt > 0) {
?>
<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b><?=strtoupper($langmark1535)?> J</b></td><td align="right"><a href="ntfixtures.php?group=10"><b>Fixtures</b></a></td></tr></table>
<?php }?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<?php
while ($gA < $numnt) {
$cA = mysql_result($gAquery,$gA,"country");
$wA = mysql_result($gAquery,$gA,"win");
$lA = mysql_result($gAquery,$gA,"lose");
$dA = mysql_result($gAquery,$gA,"difference");
if ($dA > 0) {$dA="+".$dA;}
if ($gA < $stobar) {echo "<tr bgcolor=\"#FFCC99\">";} else {echo "<tr>";}
?>
<td width="200"><img src="img/Flags/<?=$cA?>.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=<?=$cA?>"><?=$cA?></td><td align="right"><?=$wA?> - <?=$lA?></td><td align="right">(<?=$dA?>)</td></tr>
<?php
$gA++;
}
?>
</table>

<?php
$gAquery = mysql_query("SELECT country, win, lose, difference FROM `countries` WHERE qualgroup LIKE 'K' ORDER BY win DESC, difference DESC, for_ DESC, country ASC");
$gA=0;
$numnt = mysql_num_rows($gAquery);
if ($numnt > 0) {
?>
<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b><?=strtoupper($langmark1535)?> K</b></td><td align="right"><a href="ntfixtures.php?group=11"><b>Fixtures</b></a></td></tr></table>
<?php }?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<?php
while ($gA < $numnt) {
$cA = mysql_result($gAquery,$gA,"country");
$wA = mysql_result($gAquery,$gA,"win");
$lA = mysql_result($gAquery,$gA,"lose");
$dA = mysql_result($gAquery,$gA,"difference");
if ($dA > 0) {$dA="+".$dA;}
if ($gA < $stobar) {echo "<tr bgcolor=\"#FFCC99\">";} else {echo "<tr>";}
?>
<td width="200"><img src="img/Flags/<?=$cA?>.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=<?=$cA?>"><?=$cA?></td><td align="right"><?=$wA?> - <?=$lA?></td><td align="right">(<?=$dA?>)</td></tr>
<?php
$gA++;
}
?>
</table>

<?php
$gAquery = mysql_query("SELECT country, win, lose, difference FROM `countries` WHERE qualgroup LIKE 'L' ORDER BY win DESC, difference DESC, for_ DESC, country ASC");
$gA=0;
$numnt = mysql_num_rows($gAquery);
if ($numnt > 0) {
?>
<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b><?=strtoupper($langmark1535)?> L</b></td><td align="right"><a href="ntfixtures.php?group=12"><b>Fixtures</b></a></td></tr></table>
<?php }?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<?php
while ($gA < $numnt) {
$cA = mysql_result($gAquery,$gA,"country");
$wA = mysql_result($gAquery,$gA,"win");
$lA = mysql_result($gAquery,$gA,"lose");
$dA = mysql_result($gAquery,$gA,"difference");
if ($dA > 0) {$dA="+".$dA;}
if ($gA < $stobar) {echo "<tr bgcolor=\"#FFCC99\">";} else {echo "<tr>";}
?>
<td width="200"><img src="img/Flags/<?=$cA?>.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=<?=$cA?>"><?=$cA?></td><td align="right"><?=$wA?> - <?=$lA?></td><td align="right">(<?=$dA?>)</td></tr>
<?php
$gA++;
}
?>
</table>

<!--<br/><hr/>3 teams from each group advance to the World Cup.-->
<?php if ($ON3RD==1){?>
<br/><hr/>2 teams from each group advance to the World Cup.<br/>4 best third-placed teams also qualify.<br/><br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>BEST THIRD-PLACE TEAMS</b></td><td align="right"></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<?php
$ada = mysql_query("SELECT `country3`, `win3`, `lose3`,`diff3` FROM `thirdplace`") or die(mysql_error());
while ($pp=mysql_fetch_array($ada)) {
$country3 = $pp[country3];
$win3 = $pp[win3];
$lose3 = $pp[lose3];
$diff3 = $pp[diff3];
if ($diff3 > 0) {$diff3="+".$diff3;}
$dj=$dj+1;
if ($dj < 5) {?><tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/<?=$country3?>.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=<?=$country3?>"><?=$country3?></td><td align="right"><?=$win3?>&nbsp;-&nbsp;<?=$lose3?></td><td align="right">(<span title="score difference"><?=$diff3?></span>)</td></tr><?php } else {?><tr><td width="200"><img src="img/Flags/<?=$country3?>.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=<?=$country3?>"><?=$country3?></td><td align="right"><?=$win3?>&nbsp;-&nbsp;<?=$lose3?></td><td align="right">(<span title="score difference"><?=$diff3?></span>)</td></tr><?php }
}
echo "</table>";
if ($userid==1) {echo "<a href=\"nationalteams.php?azt=ion\">.</a>";}
}
?>
<!--
<br/><hr/>
Winner of each group qualify for the round of 16.<br/>
2nd and 3rd place team qualify for the playoff round.<br/>
Elimination stage pairs:<br/>
A1 - (B2|H3)<br/>
C1 - (D2|F3)<br/>
B1 - (A2|G3)<br/>
D1 - (C2|E3)<br/>
E1 - (F2|D3)<br/>
G1 - (H2|B3)<br/>
F1 - (E2|C3)<br/>
H1 - (G2|A3)
-->
<br/><hr/>4 teams qualify from each group.

<?php

//KONEC PRIKAZA SKUPIN
//spodaj copy paste zaključnega dela wc
?>







<?php
}
}
elseif ($ntc == 'yes' AND $natcoach==1) {
//PRIKAZ SKILLOV
if ($nt_country=='Bosnia and Herzegovina') {$nt_country='Bosnia';}

$sort = $_POST["sort"];

if (!$sort || $sort=='shirt') {$result = mysql_query("SELECT *, IF (ntshirt IS NULL || ntshirt ='' || ntshirt=0, 1, 0) AS isnull FROM players WHERE country='$nt_country' AND ntplayer=1 ORDER BY isnull ASC, ntshirt ASC, wage DESC");}
elseif ($sort=='age') {$result = mysql_query("SELECT * FROM players WHERE country='$nt_country' AND ntplayer=1 ORDER BY age ASC") or die(mysql_error());}
elseif ($sort=='skillsum') {$result = mysql_query("SELECT * FROM players WHERE country='$nt_country' AND ntplayer=1 ORDER BY `handling` + `speed` + `passing` + `vision` + `rebounds` + `position` + `freethrow` + `shooting` + `defense` DESC") or die(mysql_error());}
elseif ($sort=='height' OR $sort=='weight' OR $sort=='handling' OR $sort=='speed' OR $sort=='passing' OR $sort=='vision' OR $sort=='rebounds' OR $sort=='position' OR $sort=='shooting' OR $sort=='freethrow' OR $sort=='defense' OR $sort=='experience' OR $sort=='workrate' OR $sort=='fatigue' OR $sort=='wage') {$result = mysql_query("SELECT * FROM players WHERE country='$nt_country' AND ntplayer=1 ORDER BY $sort DESC") or die(mysql_error());}
elseif ($sort=='training') {$result = mysql_query("SELECT * FROM players WHERE country='$nt_country' AND ntplayer=1 AND last_position > 0 ORDER BY last_training DESC") or die(mysql_error());}
while ($i=mysql_fetch_array($result)) {
$id=$i["id"];
$name=$i["name"];
$surname=$i["surname"];
$age=$i["age"];
$club=$i["club"];
$charac=$i["charac"];
$height=$i["height"];
$weight=$i["weight"];
$handling=$i["handling"];
$speed=$i["speed"];
$passing=$i["passing"];
$vision=$i["vision"];
$rebounds=$i["rebounds"];
$position=$i["position"];
$freethrow=$i["freethrow"];
$shooting=$i["shooting"];
$defense=$i["defense"];
$workrate=$i["workrate"];
$experience=$i["experience"];
$fatigue=$i["fatigue"];
$isonsale=$i["isonsale"];
$wage=$i["wage"];
$last_position=$i["last_position"];
$last_training=$i["last_training"];
$injury_time=$i["injury"];
$ntplayer=$i["ntplayer"];
$hulahup=$i["ntshirt"];
if ($hulahup==0) {$hulahup='';}

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

if ($handling < 9) {$handling_dspl = $langmark111; }
elseif ($handling > 8 AND $handling < 17) {$handling_dspl = $langmark096; }
elseif ($handling > 16 AND $handling < 25) {$handling_dspl = $langmark097; }
elseif ($handling > 24 AND $handling < 33) {$handling_dspl = $langmark098; }
elseif ($handling > 32 AND $handling < 41) {$handling_dspl = $langmark099; }
elseif ($handling > 40 AND $handling < 49) {$handling_dspl = $langmark100; }
elseif ($handling > 48 AND $handling < 57) {$handling_dspl = $langmark101; }
elseif ($handling > 56 AND $handling < 65) {$handling_dspl = $langmark102; }
elseif ($handling > 64 AND $handling < 73) {$handling_dspl = $langmark103; }
elseif ($handling > 72 AND $handling < 81) {$handling_dspl = $langmark104; }
elseif ($handling > 80 AND $handling < 89) {$handling_dspl = $langmark105; }
elseif ($handling > 88 AND $handling < 97) {$handling_dspl = $langmark106; }
elseif ($handling > 96 AND $handling < 105) {$handling_dspl = $langmark107; }
elseif ($handling > 104 AND $handling < 113) {$handling_dspl = $langmark108; }
elseif ($handling > 112 AND $handling < 121) {$handling_dspl = $langmark1584; }
elseif ($handling > 120 AND $handling < 129) {$handling_dspl = $langmark1585; }
elseif ($handling > 128 AND $handling < 137) {$handling_dspl = $langmark1586; }
elseif ($handling > 136 AND $handling < 145) {$handling_dspl = $langmark1587; }
elseif ($handling > 144 AND $handling < 153) {$handling_dspl = $langmark1588; }
elseif ($handling > 152 AND $handling < 161) {$handling_dspl = $langmark109; }
else $handling_dspl = $langmark110;

if ($speed < 9) {$speed_dspl = $langmark111; }
elseif ($speed > 8 AND $speed < 17) {$speed_dspl = $langmark096; }
elseif ($speed > 16 AND $speed < 25) {$speed_dspl = $langmark097; }
elseif ($speed > 24 AND $speed < 33) {$speed_dspl = $langmark098; }
elseif ($speed > 32 AND $speed < 41) {$speed_dspl = $langmark099; }
elseif ($speed > 40 AND $speed < 49) {$speed_dspl = $langmark100; }
elseif ($speed > 48 AND $speed < 57) {$speed_dspl = $langmark101; }
elseif ($speed > 56 AND $speed < 65) {$speed_dspl = $langmark102; }
elseif ($speed > 64 AND $speed < 73) {$speed_dspl = $langmark103; }
elseif ($speed > 72 AND $speed < 81) {$speed_dspl = $langmark104; }
elseif ($speed > 80 AND $speed < 89) {$speed_dspl = $langmark105; }
elseif ($speed > 88 AND $speed < 97) {$speed_dspl = $langmark106; }
elseif ($speed > 96 AND $speed < 105) {$speed_dspl = $langmark107; }
elseif ($speed > 104 AND $speed < 113) {$speed_dspl = $langmark108; }
elseif ($speed> 112 AND $speed< 121) {$speed_dspl = $langmark1584; }
elseif ($speed> 120 AND $speed< 129) {$speed_dspl = $langmark1585; }
elseif ($speed> 128 AND $speed< 137) {$speed_dspl = $langmark1586; }
elseif ($speed> 136 AND $speed< 145) {$speed_dspl = $langmark1587; }
elseif ($speed> 144 AND $speed< 153) {$speed_dspl = $langmark1588; }
elseif ($speed> 152 AND $speed< 161) {$speed_dspl = $langmark109; }
else $speed_dspl = $langmark110;

if ($passing < 9) {$passing_dspl = $langmark111; }
elseif ($passing > 8 AND $passing < 17) {$passing_dspl = $langmark096; }
elseif ($passing > 16 AND $passing < 25) {$passing_dspl = $langmark097; }
elseif ($passing > 24 AND $passing < 33) {$passing_dspl = $langmark098; }
elseif ($passing > 32 AND $passing < 41) {$passing_dspl = $langmark099; }
elseif ($passing > 40 AND $passing < 49) {$passing_dspl = $langmark100; }
elseif ($passing > 48 AND $passing < 57) {$passing_dspl = $langmark101; }
elseif ($passing > 56 AND $passing < 65) {$passing_dspl = $langmark102; }
elseif ($passing > 64 AND $passing < 73) {$passing_dspl = $langmark103; }
elseif ($passing > 72 AND $passing < 81) {$passing_dspl = $langmark104; }
elseif ($passing > 80 AND $passing < 89) {$passing_dspl = $langmark105; }
elseif ($passing > 88 AND $passing < 97) {$passing_dspl = $langmark106; }
elseif ($passing > 96 AND $passing < 105) {$passing_dspl = $langmark107; }
elseif ($passing > 104 AND $passing < 113) {$passing_dspl = $langmark108; }
elseif ($passing > 112 AND $passing < 121) {$passing_dspl = $langmark1584; }
elseif ($passing > 120 AND $passing < 129) {$passing_dspl = $langmark1585; }
elseif ($passing > 128 AND $passing < 137) {$passing_dspl = $langmark1586; }
elseif ($passing > 136 AND $passing < 145) {$passing_dspl = $langmark1587; }
elseif ($passing > 144 AND $passing < 153) {$passing_dspl = $langmark1588; }
elseif ($passing > 152 AND $passing < 161) {$passing_dspl = $langmark109; }
else $passing_dspl = $langmark110;


if ($vision < 9) {$vision_dspl = $langmark111; }
elseif ($vision > 8 AND $vision < 17) {$vision_dspl = $langmark096; }
elseif ($vision > 16 AND $vision < 25) {$vision_dspl = $langmark097; }
elseif ($vision > 24 AND $vision < 33) {$vision_dspl = $langmark098; }
elseif ($vision > 32 AND $vision < 41) {$vision_dspl = $langmark099; }
elseif ($vision > 40 AND $vision < 49) {$vision_dspl = $langmark100; }
elseif ($vision > 48 AND $vision < 57) {$vision_dspl = $langmark101; }
elseif ($vision > 56 AND $vision < 65) {$vision_dspl = $langmark102; }
elseif ($vision > 64 AND $vision < 73) {$vision_dspl = $langmark103; }
elseif ($vision > 72 AND $vision < 81) {$vision_dspl = $langmark104; }
elseif ($vision > 80 AND $vision < 89) {$vision_dspl = $langmark105; }
elseif ($vision > 88 AND $vision < 97) {$vision_dspl = $langmark106; }
elseif ($vision > 96 AND $vision < 105) {$vision_dspl = $langmark107; }
elseif ($vision > 104 AND $vision < 113) {$vision_dspl = $langmark108; }
elseif ($vision > 112 AND $vision < 121) {$vision_dspl = $langmark1584; }
elseif ($vision > 120 AND $vision < 129) {$vision_dspl = $langmark1585; }
elseif ($vision > 128 AND $vision < 137) {$vision_dspl = $langmark1586; }
elseif ($vision > 136 AND $vision < 145) {$vision_dspl = $langmark1587; }
elseif ($vision > 144 AND $vision < 153) {$vision_dspl = $langmark1588; }
elseif ($vision > 152 AND $vision < 161) {$vision_dspl = $langmark109; }
else $vision_dspl = $langmark110;


if ($rebounds < 9) {$rebounds_dspl = $langmark111; }
elseif ($rebounds > 8 AND $rebounds < 17) {$rebounds_dspl = $langmark096; }
elseif ($rebounds > 16 AND $rebounds < 25) {$rebounds_dspl = $langmark097; }
elseif ($rebounds > 24 AND $rebounds < 33) {$rebounds_dspl = $langmark098; }
elseif ($rebounds > 32 AND $rebounds < 41) {$rebounds_dspl = $langmark099; }
elseif ($rebounds > 40 AND $rebounds < 49) {$rebounds_dspl = $langmark100; }
elseif ($rebounds > 48 AND $rebounds < 57) {$rebounds_dspl = $langmark101; }
elseif ($rebounds > 56 AND $rebounds < 65) {$rebounds_dspl = $langmark102; }
elseif ($rebounds > 64 AND $rebounds < 73) {$rebounds_dspl = $langmark103; }
elseif ($rebounds > 72 AND $rebounds < 81) {$rebounds_dspl = $langmark104; }
elseif ($rebounds > 80 AND $rebounds < 89) {$rebounds_dspl = $langmark105; }
elseif ($rebounds > 88 AND $rebounds < 97) {$rebounds_dspl = $langmark106; }
elseif ($rebounds > 96 AND $rebounds < 105) {$rebounds_dspl = $langmark107; }
elseif ($rebounds > 104 AND $rebounds < 113) {$rebounds_dspl = $langmark108; }
elseif ($rebounds > 112 AND $rebounds < 121) {$rebounds_dspl = $langmark1584; }
elseif ($rebounds > 120 AND $rebounds < 129) {$rebounds_dspl = $langmark1585; }
elseif ($rebounds > 128 AND $rebounds < 137) {$rebounds_dspl = $langmark1586; }
elseif ($rebounds > 136 AND $rebounds < 145) {$rebounds_dspl = $langmark1587; }
elseif ($rebounds > 144 AND $rebounds < 153) {$rebounds_dspl = $langmark1588; }
elseif ($rebounds > 152 AND $rebounds < 161) {$rebounds_dspl = $langmark109; }
else $rebounds_dspl = $langmark110;


if ($position < 9) {$position_dspl = $langmark111; }
elseif ($position > 8 AND $position < 17) {$position_dspl = $langmark096; }
elseif ($position > 16 AND $position < 25) {$position_dspl = $langmark097; }
elseif ($position > 24 AND $position < 33) {$position_dspl = $langmark098; }
elseif ($position > 32 AND $position < 41) {$position_dspl = $langmark099; }
elseif ($position > 40 AND $position < 49) {$position_dspl = $langmark100; }
elseif ($position > 48 AND $position < 57) {$position_dspl = $langmark101; }
elseif ($position > 56 AND $position < 65) {$position_dspl = $langmark102; }
elseif ($position > 64 AND $position < 73) {$position_dspl = $langmark103; }
elseif ($position > 72 AND $position < 81) {$position_dspl = $langmark104; }
elseif ($position > 80 AND $position < 89) {$position_dspl = $langmark105; }
elseif ($position > 88 AND $position < 97) {$position_dspl = $langmark106; }
elseif ($position > 96 AND $position < 105) {$position_dspl = $langmark107; }
elseif ($position > 104 AND $position < 113) {$position_dspl = $langmark108; }
elseif ($position > 112 AND $position < 121) {$position_dspl = $langmark1584; }
elseif ($position > 120 AND $position < 129) {$position_dspl = $langmark1585; }
elseif ($position > 128 AND $position < 137) {$position_dspl = $langmark1586; }
elseif ($position > 136 AND $position < 145) {$position_dspl = $langmark1587; }
elseif ($position > 144 AND $position < 153) {$position_dspl = $langmark1588; }
elseif ($position > 152 AND $position < 161) {$position_dspl = $langmark109; }
else $position_dspl = $langmark110;


if ($shooting < 9) {$shooting_dspl = $langmark111; }
elseif ($shooting > 8 AND $shooting < 17) {$shooting_dspl = $langmark096; }
elseif ($shooting > 16 AND $shooting < 25) {$shooting_dspl = $langmark097; }
elseif ($shooting > 24 AND $shooting < 33) {$shooting_dspl = $langmark098; }
elseif ($shooting > 32 AND $shooting < 41) {$shooting_dspl = $langmark099; }
elseif ($shooting > 40 AND $shooting < 49) {$shooting_dspl = $langmark100; }
elseif ($shooting > 48 AND $shooting < 57) {$shooting_dspl = $langmark101; }
elseif ($shooting > 56 AND $shooting < 65) {$shooting_dspl = $langmark102; }
elseif ($shooting > 64 AND $shooting < 73) {$shooting_dspl = $langmark103; }
elseif ($shooting > 72 AND $shooting < 81) {$shooting_dspl = $langmark104; }
elseif ($shooting > 80 AND $shooting < 89) {$shooting_dspl = $langmark105; }
elseif ($shooting > 88 AND $shooting < 97) {$shooting_dspl = $langmark106; }
elseif ($shooting > 96 AND $shooting < 105) {$shooting_dspl = $langmark107; }
elseif ($shooting > 104 AND $shooting < 113) {$shooting_dspl = $langmark108; }
elseif ($shooting > 112 AND $shooting < 121) {$shooting_dspl = $langmark1584; }
elseif ($shooting > 120 AND $shooting < 129) {$shooting_dspl = $langmark1585; }
elseif ($shooting > 128 AND $shooting < 137) {$shooting_dspl = $langmark1586; }
elseif ($shooting > 136 AND $shooting < 145) {$shooting_dspl = $langmark1587; }
elseif ($shooting > 144 AND $shooting < 153) {$shooting_dspl = $langmark1588; }
elseif ($shooting > 152 AND $shooting < 161) {$shooting_dspl = $langmark109; }
else $shooting_dspl = $langmark110;


if ($freethrow < 9) {$freethrow_dspl = $langmark111; }
elseif ($freethrow > 8 AND $freethrow < 17) {$freethrow_dspl = $langmark096; }
elseif ($freethrow > 16 AND $freethrow < 25) {$freethrow_dspl = $langmark097; }
elseif ($freethrow > 24 AND $freethrow < 33) {$freethrow_dspl = $langmark098; }
elseif ($freethrow > 32 AND $freethrow < 41) {$freethrow_dspl = $langmark099; }
elseif ($freethrow > 40 AND $freethrow < 49) {$freethrow_dspl = $langmark100; }
elseif ($freethrow > 48 AND $freethrow < 57) {$freethrow_dspl = $langmark101; }
elseif ($freethrow > 56 AND $freethrow < 65) {$freethrow_dspl = $langmark102; }
elseif ($freethrow > 64 AND $freethrow < 73) {$freethrow_dspl = $langmark103; }
elseif ($freethrow > 72 AND $freethrow < 81) {$freethrow_dspl = $langmark104; }
elseif ($freethrow > 80 AND $freethrow < 89) {$freethrow_dspl = $langmark105; }
elseif ($freethrow > 88 AND $freethrow < 97) {$freethrow_dspl = $langmark106; }
elseif ($freethrow > 96 AND $freethrow < 105) {$freethrow_dspl = $langmark107; }
elseif ($freethrow > 104 AND $freethrow < 113) {$freethrow_dspl = $langmark108; }
elseif ($freethrow > 112 AND $freethrow < 121) {$freethrow_dspl = $langmark1584; }
elseif ($freethrow > 120 AND $freethrow < 129) {$freethrow_dspl = $langmark1585; }
elseif ($freethrow > 128 AND $freethrow < 137) {$freethrow_dspl = $langmark1586; }
elseif ($freethrow > 136 AND $freethrow < 145) {$freethrow_dspl = $langmark1587; }
elseif ($freethrow > 144 AND $freethrow < 153) {$freethrow_dspl = $langmark1588; }
elseif ($freethrow > 152 AND $freethrow < 161) {$freethrow_dspl = $langmark109; }
else $freethrow_dspl = $langmark110;


if ($defense < 9) {$defense_dspl = $langmark111; }
elseif ($defense > 8 AND $defense < 17) {$defense_dspl = $langmark096; }
elseif ($defense > 16 AND $defense < 25) {$defense_dspl = $langmark097; }
elseif ($defense > 24 AND $defense < 33) {$defense_dspl = $langmark098; }
elseif ($defense > 32 AND $defense < 41) {$defense_dspl = $langmark099; }
elseif ($defense > 40 AND $defense < 49) {$defense_dspl = $langmark100; }
elseif ($defense > 48 AND $defense < 57) {$defense_dspl = $langmark101; }
elseif ($defense > 56 AND $defense < 65) {$defense_dspl = $langmark102; }
elseif ($defense > 64 AND $defense < 73) {$defense_dspl = $langmark103; }
elseif ($defense > 72 AND $defense < 81) {$defense_dspl = $langmark104; }
elseif ($defense > 80 AND $defense < 89) {$defense_dspl = $langmark105; }
elseif ($defense > 88 AND $defense < 97) {$defense_dspl = $langmark106; }
elseif ($defense > 96 AND $defense < 105) {$defense_dspl = $langmark107; }
elseif ($defense > 104 AND $defense < 113) {$defense_dspl = $langmark108; }
elseif ($defense > 112 AND $defense < 121) {$defense_dspl = $langmark1584; }
elseif ($defense > 120 AND $defense < 129) {$defense_dspl = $langmark1585; }
elseif ($defense > 128 AND $defense < 137) {$defense_dspl = $langmark1586; }
elseif ($defense > 136 AND $defense < 145) {$defense_dspl = $langmark1587; }
elseif ($defense > 144 AND $defense < 153) {$defense_dspl = $langmark1588; }
elseif ($defense > 152 AND $defense < 161) {$defense_dspl = $langmark109; }
else $defense_dspl = $langmark110;


if ($workrate < 9) {$workrate_dspl = $langmark111; }
elseif ($workrate > 8 AND $workrate < 17) {$workrate_dspl = $langmark096; }
elseif ($workrate > 16 AND $workrate < 25) {$workrate_dspl = $langmark097; }
elseif ($workrate > 24 AND $workrate < 33) {$workrate_dspl = $langmark098; }
elseif ($workrate > 32 AND $workrate < 41) {$workrate_dspl = $langmark099; }
elseif ($workrate > 40 AND $workrate < 49) {$workrate_dspl = $langmark100; }
elseif ($workrate > 48 AND $workrate < 57) {$workrate_dspl = $langmark101; }
elseif ($workrate > 56 AND $workrate < 65) {$workrate_dspl = $langmark102; }
elseif ($workrate > 64 AND $workrate < 73) {$workrate_dspl = $langmark103; }
elseif ($workrate > 72 AND $workrate < 81) {$workrate_dspl = $langmark104; }
elseif ($workrate > 80 AND $workrate < 89) {$workrate_dspl = $langmark105; }
elseif ($workrate > 88 AND $workrate < 97) {$workrate_dspl = $langmark106; }
elseif ($workrate > 96 AND $workrate < 105) {$workrate_dspl = $langmark107; }
elseif ($workrate > 104 AND $workrate < 113) {$workrate_dspl = $langmark108; }
elseif ($workrate > 112 AND $workrate < 121) {$workrate_dspl = $langmark1584; }
elseif ($workrate > 120 AND $workrate < 129) {$workrate_dspl = $langmark1585; }
elseif ($workrate > 128 AND $workrate < 137) {$workrate_dspl = $langmark1586; }
elseif ($workrate > 136 AND $workrate < 145) {$workrate_dspl = $langmark1587; }
elseif ($workrate > 144 AND $workrate < 153) {$workrate_dspl = $langmark1588; }
elseif ($workrate > 152 AND $workrate < 161) {$workrate_dspl = $langmark109; }
else $workrate_dspl = $langmark110;


if ($experience < 9) {$experience_dspl = $langmark111; }
elseif ($experience > 8 AND $experience < 17) {$experience_dspl = $langmark096; }
elseif ($experience > 16 AND $experience < 25) {$experience_dspl = $langmark097; }
elseif ($experience > 24 AND $experience < 33) {$experience_dspl = $langmark098; }
elseif ($experience > 32 AND $experience < 41) {$experience_dspl = $langmark099; }
elseif ($experience > 40 AND $experience < 49) {$experience_dspl = $langmark100; }
elseif ($experience > 48 AND $experience < 57) {$experience_dspl = $langmark101; }
elseif ($experience > 56 AND $experience < 65) {$experience_dspl = $langmark102; }
elseif ($experience > 64 AND $experience < 73) {$experience_dspl = $langmark103; }
elseif ($experience > 72 AND $experience < 81) {$experience_dspl = $langmark104; }
elseif ($experience > 80 AND $experience < 89) {$experience_dspl = $langmark105; }
elseif ($experience > 88 AND $experience < 97) {$experience_dspl = $langmark106; }
elseif ($experience > 96 AND $experience < 105) {$experience_dspl = $langmark107; }
elseif ($experience > 104 AND $experience < 113) {$experience_dspl = $langmark108; }
elseif ($experience > 112 AND $experience < 121) {$experience_dspl = $langmark1584; }
elseif ($experience > 120 AND $experience < 129) {$experience_dspl = $langmark1585; }
elseif ($experience > 128 AND $experience < 137) {$experience_dspl = $langmark1586; }
elseif ($experience > 136 AND $experience < 145) {$experience_dspl = $langmark1587; }
elseif ($experience > 144 AND $experience < 153) {$experience_dspl = $langmark1588; }
elseif ($experience > 152 AND $experience < 161) {$experience_dspl = $langmark109; }
else $experience_dspl = $langmark110;


switch ($isonsale) {
case 0: $saledisplay='img/notsale.jpg'; break;
case 1: $saledisplay='img/for_sale.jpg'; break;
}

switch (TRUE) {
CASE ($injury_time ==0): $prikaz_poskodbe = '&nbsp;'; break;
CASE ($injury_time >0 AND $injury_time < 1): $prikaz_poskodbe = '&nbsp;<font color="#67917A"><b>+1</b></font>'; break;
CASE ($injury_time >=1 AND $injury_time < 2): $prikaz_poskodbe = '&nbsp;<font color="red"><b>+1</b></font>'; break;
CASE ($injury_time >=2 AND $injury_time < 3): $prikaz_poskodbe = '&nbsp;<font color="red"><b>+2</b></font>'; break;
CASE ($injury_time >=3 AND $injury_time < 4): $prikaz_poskodbe = '&nbsp;<font color="red"><b>+3</b></font>'; break;
CASE ($injury_time >=4 AND $injury_time < 5): $prikaz_poskodbe = '&nbsp;<font color="red"><b>+4</b></font>'; break;
CASE ($injury_time >=5 AND $injury_time < 6): $prikaz_poskodbe = '&nbsp;<font color="red"><b>+5</b></font>'; break;
CASE ($injury_time >=6 AND $injury_time < 7): $prikaz_poskodbe = '&nbsp;<font color="red"><b>+6</b></font>'; break;
CASE ($injury_time >=7 AND $injury_time < 8): $prikaz_poskodbe = '&nbsp;<font color="red"><b>+7</b></font>'; break;
CASE ($injury_time >=8 AND $injury_time < 9): $prikaz_poskodbe = '&nbsp;<font color="red"><b>+8</b></font>'; break;
CASE ($injury_time >=9): $prikaz_poskodbe = '&nbsp;<font color="red"><b>+9</b></font>'; break;
}
//ameriska visina
if ($country=='USA'){
$feetheight = floor((100*$height)/3048);
$tempheight = $height - ($feetheight*3048/100);
$inchheight = round((100*$tempheight)/254);
if ($inchheight==12) {
$feetheight=$feetheight+1; $inchheight='';
$height = $feetheight."'0 ft, ";}
else {$height = $feetheight."'".$inchheight." ft, ";}
$weight = round($weight * 22046 / 10000);
$weight = $weight." lb.";
}
else {
$height = $height." cm, ";
$weight = round($weight)." kg.";
}

echo "<b>",$hulahup," <a href=\"player.php?playerid=",$id,"\">",$name," ",$surname,"</a></b>",$prikaz_poskodbe,"<img src=\"",$saledisplay,"\" border=\"0\" alt=\"\"><br/>",$age," ",$langmark379," ",$country,". ",$height;
if ($last_position==10 AND $last_training >0) {echo "<font color=\"green\">",$weight,"</font><br/>";}
elseif ($last_position==10 AND $last_training < 0){echo "<font color=\"red\">",$weight,"</font><br/>";}
else {echo $weight,"</font><br/>";}
echo $langmark380," ".$spec_txt.". ",$langmark381," ".$wage." &euro; / ",$langmark382,".<br/>";

if ($last_training >0 AND $last_position <>0) {echo "<font color=\"green\">",$langmark257,": +",$last_training,"</font>";}
if ($last_training <0) {echo "<font color=\"red\">",$langmark257,": ",$last_training,"</font>";}
?>
<br/>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="68"><b><?=$langmark120?>:</b></td><td width="117">
<?php
if ($last_position==1 AND $last_training > 0){echo "<font color=\"green\">",$handling_dspl,"</font></td>";}
elseif ($last_position==1 AND $last_training < 0){echo "<font color=\"red\">",$handling_dspl,"</font></td>";}
else {echo $handling_dspl,"</font></td>";}

echo "<td width=70><b>",$langmark121,":</b></td><td width=115> ";
if ($last_position==2 AND $last_training > 0){echo "<font color=\"green\">",$speed_dspl,"</font></td>";}
elseif ($last_position==2 AND $last_training < 0){echo "<font color=\"red\">",$speed_dspl,"</font></td>";}
else {echo $speed_dspl,"</font></td>";}

echo "<tr><td><b>",$langmark122,":</b></td><td> ";
if ($last_position==3 AND $last_training > 0){echo "<font color=\"green\">",$passing_dspl,"</font></td>";}
elseif ($last_position==3 AND $last_training < 0){echo "<font color=\"red\">",$passing_dspl,"</font></td>";}
else {echo $passing_dspl,"</font></td>";}

echo "<td><b>",$langmark123,":</b></td><td> ";
if ($last_position==4 AND $last_training > 0){echo "<font color=\"green\">",$vision_dspl,"</font></td>";}
elseif ($last_position==4 AND $last_training < 0){echo "<font color=\"red\">",$vision_dspl,"</font></td>";}
else {echo $vision_dspl,"</font></td>";}

echo "<tr><td><b>",$langmark124,":</b></td><td> ";
if ($last_position==5 AND $last_training > 0){echo "<font color=\"green\">",$rebounds_dspl,"</font></td>";}
elseif ($last_position==5 AND $last_training < 0){echo "<font color=\"red\">",$rebounds_dspl,"</font></td>";}
else {echo $rebounds_dspl,"</font></td>";}

echo "<td><b>",$langmark125,":</b></td><td> ";
if ($last_position==6 AND $last_training > 0){echo "<font color=\"green\">",$position_dspl,"</font></td>";}
elseif ($last_position==6 AND $last_training < 0){echo "<font color=\"red\">",$position_dspl,"</font></td>";}
else {echo $position_dspl,"</font></td>";}

echo "<tr><td><b>",$langmark126,":</b></td><td> ";
if ($last_position==7 AND $last_training > 0){echo "<font color=\"green\">",$shooting_dspl,"</font></td>";}
elseif ($last_position==7 AND $last_training < 0){echo "<font color=\"red\">",$shooting_dspl,"</font></td>";}
else {echo $shooting_dspl,"</font></td>";}

echo "<td><b>",$langmark127,":</b></td><td> ";
if ($last_position==8 AND $last_training > 0){echo "<font color=\"green\">",$freethrow_dspl,"</font></td>";}
elseif ($last_position==8 AND $last_training < 0){echo "<font color=\"red\">",$freethrow_dspl,"</font></td>";}
else {echo $freethrow_dspl,"</font></td>";}

echo "<tr><td><b>",$langmark128,":</b></td><td> ";
if ($last_position==9 AND $last_training > 0){echo "<font color=\"green\">",$defense_dspl,"</font></td>";}
elseif ($last_position==9 AND $last_training < 0){echo "<font color=\"red\">",$defense_dspl,"</font></td>";}
else {echo $defense_dspl,"</font></td>";}
?>

<td><b><?=$langmark129?>:</b></td><td> <?=$workrate_dspl?></td></tr>
<tr><td><b><?=$langmark130?>:</b></td><td> <?=$experience_dspl?></td>
<td><b><?=$langmark383?>:</b></td><td> <?=$fatigue?>%</td></tr>
</table><br/>

<?php
}

//IE prikaz borderja
if (mysql_num_rows($result)==0) {echo "&nbsp;";}

//KONEC PRIKAZA SKILLOV
}
?>

</td>
<?php
//DESNA STRAN ZASLONA
if ($ntc==yes){?><td class="border" width="37%">

<h2>Sort players</h2><br/>
<form method="post" action="nationalteams.php?ntc=yes" style="margin: 0">
<select name="sort" class="inputreg">
<option value="shirt" <?php if ($sort=='shirt'){echo "selected";}?>><?=$langmark1263?></option>
<option value="age" <?php if ($sort=='age'){echo "selected";}?>><?=$langmark113?></option>
<option value="height" <?php if ($sort=='height'){echo "selected";}?>><?=$langmark116?></option>
<option value="weight" <?php if ($sort=='weight'){echo "selected";}?>><?=$langmark117?></option>
<option value="wage" <?php if ($sort=='wage'){echo "selected";}?>><?=$langmark118?></option>
<?php if ($is_supporter==1){?><option value="training" <?php if ($sort=='training'){echo "selected";}?>><?=$langmark257?></option><?php }?>
<option value="handling" <?php if ($sort=='handling'){echo "selected";}?>><?=$langmark120?></option>
<option value="speed" <?php if ($sort=='speed'){echo "selected";}?>><?=$langmark121?></option>
<option value="passing" <?php if ($sort=='passing'){echo "selected";}?>><?=$langmark122?></option>
<option value="vision" <?php if ($sort=='vision'){echo "selected";}?>><?=$langmark123?></option>
<option value="rebounds" <?php if ($sort=='rebounds'){echo "selected";}?>><?=$langmark124?></option>
<option value="position" <?php if ($sort=='position'){echo "selected";}?>><?=$langmark125?></option>
<option value="shooting" <?php if ($sort=='shooting'){echo "selected";}?>><?=$langmark126?></option>
<option value="freethrow" <?php if ($sort=='freethrow'){echo "selected";}?>><?=$langmark127?></option>
<option value="defense" <?php if ($sort=='defense'){echo "selected";}?>><?=$langmark128?></option>
<option value="workrate" <?php if ($sort=='workrate'){echo "selected";}?>><?=$langmark129?></option>
<option value="experience" <?php if ($sort=='experience'){echo "selected";}?>><?=$langmark130?></option>
<option value="fatigue" <?php if ($sort=='fatigue'){echo "selected";}?>><?=$langmark398?></option>
<?php if ($is_supporter==1){?><option value="skillsum" <?php if ($sort=='skillsum'){echo "selected";}?>>Skill sum</option><?php }?>
</select>
<input type="submit" value="Sort" name="submitSO" class="buttonreg">
</form><br/>

<?php } else {?><td class="border" width="50%"><?php }

if ($ntc <> 'yes') {
//PRIKAZ REPKE ZA VSE

if ($country=='Bosnia and Herzegovina') {$country111='BiH';} else {$country111=$country;}
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%"><tr><td><b><?php echo strtoupper($langmark1524." ".$country111);?></b></td><td align="right"><a href="nationalteams.php?country=<?=$country?>&listall=m&#35;matches" title="<?=$langmark734?>"><font color="darkred"><b><?=$langmark043?></b></font></a> <a href="u18teams.php?country=<?=$country?>" title="<?=$country111?> U19"><img src="img/downswitch.png" title="<?=$country111?> U19" height="12" border="0"></a></td></tr></table><hr/>

<table border="0" cellspacing="0" width="100%" cellpadding="0">
<tr width="100%">
<td align="left">
<?php
if (strlen($dmajca)==0 AND strlen($gmajca)==0) {$dmajca='http://www.basketsim.com/img/shirts/white.gif';}
if (strlen($dmajca)>2) {?><img src="<?=$dmajca?>" border="0" width="40" height="50">&nbsp;<?php }
if (strlen($gmajca)>2) {?><img src="<?=$gmajca?>" border="0" width="40" height="50"><?php }





if ($userid==1) {
/*
?>
<img src="http://www.basketsim.com/faces/template.php?kepal=template8&teling=ears1&mat=eyes5&mulut=mouth9&hidung=nose11&kumis=kumis0&rambut=hair8" height="50" title="National coach" border="1">
<?php
*/
}?>





</td>
<td align="right">
<?php
//medalje
if ($country=='Croatia') {echo "<a href=\"worldcup.php?swc=1\"><img src=\"img/wcsmallgold.jpg\" border=\"0\" alt=\"",$langmark1559,"\" title=\"",$langmark1559,"\"></a>";}
elseif ($country=='Bosnia and Herzegovina') {echo "<a href=\"worldcup.php?swc=1\"><img src=\"img/wcsmallsilver.jpg\" border=\"0\" alt=\"",$langmark1560,"\" title=\"",$langmark1560,"\"></a>";}
elseif ($country=='Slovenia') {echo "<a href=\"worldcup.php?swc=1\"><img src=\"img/wcsmallbronze.jpg\" border=\"0\" alt=\"",$langmark1561,"\" title=\"",$langmark1561,"\"><a href=\"worldcup.php?swc=5\"><img src=\"img/wcsmallsilver.jpg\" border=\"0\" alt=\"",$langmark1560,"\" title=\"",$langmark1560,"\"></a></a><a href=\"worldcup.php?swc=8\"><img src=\"img/wcsmallbronze.jpg\" border=\"0\" alt=\"",$langmark1561,"\" title=\"",$langmark1561,"\"><a href=\"worldcup.php?swc=9\"><img src=\"img/wcsmallsilver.jpg\" border=\"0\" alt=\"",$langmark1560,"\" title=\"",$langmark1560,"\"></a>";}
elseif ($country=='Estonia') {echo "<a href=\"worldcup.php?swc=2\"><img src=\"img/wcsmallgold.jpg\" border=\"0\" alt=\"",$langmark1559,"\" title=\"",$langmark1559,"\"></a><a href=\"worldcup.php?swc=5\"><img src=\"img/wcsmallgold.jpg\" border=\"0\" alt=\"",$langmark1559,"\" title=\"",$langmark1559,"\"></a><a href=\"worldcup.php?swc=7\"><img src=\"img/wcsmallgold.jpg\" border=\"0\" alt=\"",$langmark1559,"\" title=\"",$langmark1559,"\"></a><a href=\"worldcup.php?swc=9\"><img src=\"img/wcsmallgold.jpg\" border=\"0\" alt=\"",$langmark1559,"\" title=\"",$langmark1559,"\"></a>";}
elseif ($country=='Latvia') {echo "<a href=\"worldcup.php?swc=2\"><img src=\"img/wcsmallsilver.jpg\" border=\"0\" alt=\"",$langmark1560,"\" title=\"",$langmark1560,"\"></a><a href=\"worldcup.php?swc=3\"><img src=\"img/wcsmallgold.jpg\" border=\"0\" alt=\"",$langmark1559,"\" title=\"",$langmark1559,"\"></a>";}
elseif ($country=='France') {echo "<a href=\"worldcup.php?swc=2\"><img src=\"img/wcsmallbronze.jpg\" border=\"0\" alt=\"",$langmark1561,"\" title=\"",$langmark1561,"\"></a>";}
elseif ($country=='Belgium') {echo "<a href=\"worldcup.php?swc=3\"><img src=\"img/wcsmallsilver.jpg\" border=\"0\" alt=\"",$langmark1560,"\" title=\"",$langmark1560,"\"></a>";}
elseif ($country=='Chile') {echo "<a href=\"worldcup.php?swc=3\"><img src=\"img/wcsmallbronze.jpg\" border=\"0\" alt=\"",$langmark1561,"\" title=\"",$langmark1561,"\"></a>";}
elseif ($country=='Israel') {echo "<a href=\"worldcup.php?swc=4\"><img src=\"img/wcsmallgold.jpg\" border=\"0\" alt=\"",$langmark1559,"\" title=\"",$langmark1559,"\"></a>";}
elseif ($country=='Turkey') {echo "<a href=\"worldcup.php?swc=4\"><img src=\"img/wcsmallsilver.jpg\" border=\"0\" alt=\"",$langmark1560,"\" title=\"",$langmark1560,"\"></a><a href=\"worldcup.php?swc=7\"><img src=\"img/wcsmallbronze.jpg\" border=\"0\" alt=\"",$langmark1561,"\" title=\"",$langmark1561,"\"></a>";}
elseif ($country=='Serbia') {echo "<a href=\"worldcup.php?swc=4\"><img src=\"img/wcsmallbronze.jpg\" border=\"0\" alt=\"",$langmark1561,"\" title=\"",$langmark1561,"\"></a><a href=\"worldcup.php?swc=5\"><img src=\"img/wcsmallbronze.jpg\" border=\"0\" alt=\"",$langmark1561,"\" title=\"",$langmark1561,"\"></a>";}
elseif ($country=='Italy') {echo "<a href=\"worldcup.php?swc=6\"><img src=\"img/wcsmallgold.jpg\" border=\"0\" alt=\"",$langmark1559,"\" title=\"",$langmark1559,"\"></a><a href=\"worldcup.php?swc=7\"><img src=\"img/wcsmallsilver.jpg\" border=\"0\" alt=\"",$langmark1560,"\" title=\"",$langmark1560,"\"></a><a href=\"worldcup.php?swc=10\"><img src=\"img/wcsmallsilver.jpg\" border=\"0\" alt=\"",$langmark1560,"\" title=\"",$langmark1560,"\"></a>";}
elseif ($country=='Greece') {echo "<a href=\"worldcup.php?swc=6\"><img src=\"img/wcsmallsilver.jpg\" border=\"0\" alt=\"",$langmark1560,"\" title=\"",$langmark1560,"\"></a>";}
elseif ($country=='Slovakia') {echo "<a href=\"worldcup.php?swc=6\"><img src=\"img/wcsmallbronze.jpg\" border=\"0\" alt=\"",$langmark1561,"\" title=\"",$langmark1561,"\"></a>";}
elseif ($country=='Germany') {echo "<a href=\"worldcup.php?swc=8\"><img src=\"img/wcsmallgold.jpg\" border=\"0\" alt=\"",$langmark1559,"\" title=\"",$langmark1559,"\"></a><a href=\"worldcup.php?swc=9\"><img src=\"img/wcsmallbronze.jpg\" border=\"0\" alt=\"",$langmark1561,"\" title=\"",$langmark1561,"\"></a>";}
elseif ($country=='Lithuania') {echo "<a href=\"worldcup.php?swc=8\"><img src=\"img/wcsmallsilver.jpg\" border=\"0\" alt=\"",$langmark1560,"\" title=\"",$langmark1560,"\"></a><a href=\"worldcup.php?swc=10\"><img src=\"img/wcsmallbronze.jpg\" border=\"0\" alt=\"",$langmark1561,"\" title=\"",$langmark1561,"\">";}
elseif ($country=='Spain') {echo "<a href=\"worldcup.php?swc=10\"><img src=\"img/wcsmallgold.jpg\" border=\"0\" alt=\"",$langmark1559,"\" title=\"",$langmark1559,"\"></a>";}
?>
</td>
</tr><tr width="100%"><td colspan="2">
<?php
//national coach
$piko = mysql_query("SELECT userid, username FROM users WHERE nt_country='$country' AND natcoach=1 LIMIT 1") or die(mysql_error());
if (mysql_num_rows($piko)>0) {
$NTCid = mysql_result($piko,0,'userid');
$NTCname = mysql_result($piko,0,'username');
}
elseif ($country=='Europe') {echo "<b>",$langmark1555,"</b>: <a href=\"club.php?clubid=7523\">gassojose</a>";}
elseif ($country=='World') {echo "<b>",$langmark1555,"</b>: <a href=\"club.php?clubid=43645\">danielv</a>";}
else {echo "<b>",$langmark1555,"</b>: -";}
if ($NTCid>0) {echo "<b>",$langmark1555,"</b>: <a href=\"club.php?clubid=",$NTCid,"\">",$NTCname,"</a>";}
if ($NTCid==$userid) {echo " <a href=\"nationalteams.php?ntc=yes\">",$langmark1556,"</a>";}
if ($country<>'World' AND $country<>'Europe') {
$nar = mysql_query("SELECT arenaname FROM arena WHERE teamid ='$natarena' LIMIT 1") or die(mysql_error());
?>
<br/><b><?=$langmark1557?></b>: <a href="cheerleaders.php?squad=<?=$natarena?>"><?php if (mysql_num_rows($nar)>0) {echo stripslashes(mysql_result($nar,0));} else {echo "-";}?></a>
<?php
}
if ($NTCid>0 && $NTCid==$userid) {echo " <a href=\"ntarena.php\">",$langmark1558,"</a>";}
if ($country<>'World' AND $country<>'Europe') {?><br/><b>Country legend</b>: <a href="player.php?playerid=<?=$legendid?>"><?=$legendname?></a><?php }?>
</td>
</tr>
</table>
<br/>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<?php
if ($country=='Bosnia and Herzegovina') {$country='Bosnia';}
$ntims = mysql_query("SELECT id, name, surname, age, height, handling, speed, passing, vision, rebounds, position, freethrow, shooting, defense, workrate, experience, isonsale, wage, injury, ntshirt, IF (ntshirt IS NULL || ntshirt ='' || ntshirt=0, 1, 0) AS isnull FROM players WHERE country='$country' AND ntplayer =1 ORDER BY isnull ASC, ntshirt ASC, wage DESC") or die(mysql_error());
if (mysql_fetch_row($ntims)) {
$vsi = mysql_num_rows($ntims);
$v=0;
while ($v < $vsi) {
$id=mysql_result($ntims,$v,"id");
$name=mysql_result($ntims,$v,"name");
$surname=mysql_result($ntims,$v,"surname");
$agee=mysql_result($ntims,$v,"age");
$height=mysql_result($ntims,$v,"height");
$handling=mysql_result($ntims,$v,"handling");
$speed=mysql_result($ntims,$v,"speed");
$passing=mysql_result($ntims,$v,"passing");
$vision=mysql_result($ntims,$v,"vision");
$rebounds=mysql_result($ntims,$v,"rebounds");
$position=mysql_result($ntims,$v,"position");
$freethrow=mysql_result($ntims,$v,"freethrow");
$shooting=mysql_result($ntims,$v,"shooting");
$defense=mysql_result($ntims,$v,"defense");
$workrate=mysql_result($ntims,$v,"workrate");
$experience=mysql_result($ntims,$v,"experience");
$isonsale=mysql_result($ntims,$v,"isonsale");
$wagez=mysql_result($ntims,$v,"wage");
$injury_time=mysql_result($ntims,$v,"injury");
$ntshirt=mysql_result($ntims,$v,"ntshirt");
$kruy=0; $jnk = mysql_query("SELECT count(*) FROM `nt_statistics` WHERE `player` =$id AND `type` <10"); $kruy = @mysql_result($jnk,0);
$value5 = ($height * 2) + $handling + ($speed * 4) + ($passing * 2) + ($vision * 2) + ($rebounds * 3) + ($position * 4) + ($freethrow * 3) + ($shooting * 4) + ($experience * 2) + ($defense * 3);
$value5 = (($value5 * $value5 * $value5) / 225000) - 7500;
if ($value5 < 200) {$value5=200;}
$value = ((($value5/9)*($value5/9))/15)*(($value5/240000+(1/(exp(pow((($agee-16)/10),4.1)))))*(((($workrate/8)+1)/19)+1))*((sqrt($value5/180000))/((((tanh((($agee/2)-10))/2)+0.5)*0.71)+0.29));
if ($value < 1000) {$value=1000;}
$skupajv = $skupajv+$value;
$skupwag = $skupwag+$wagez;
$skupage = $skupage+$agee;
if ($ntshirt==0) {$ntshirt='';}
if ($country=='World' OR $country=='Europe') {$ntshirt='';}
//poskodbe
switch (TRUE) {
CASE ($injury_time ==0): $prikaz_poskodbe = ''; break;
CASE ($injury_time >0 AND $injury_time < 1): $prikaz_poskodbe = '&nbsp;<font color="#67917A"><b>+1</b></font>'; break;
CASE ($injury_time >=1 AND $injury_time < 2): $prikaz_poskodbe = '&nbsp;<font color="red"><b>+1</b></font>'; break;
CASE ($injury_time >=2 AND $injury_time < 3): $prikaz_poskodbe = '&nbsp;<font color="red"><b>+2</b></font>'; break;
CASE ($injury_time >=3 AND $injury_time < 4): $prikaz_poskodbe = '&nbsp;<font color="red"><b>+3</b></font>'; break;
CASE ($injury_time >=4 AND $injury_time < 5): $prikaz_poskodbe = '&nbsp;<font color="red"><b>+4</b></font>'; break;
CASE ($injury_time >=5 AND $injury_time < 6): $prikaz_poskodbe = '&nbsp;<font color="red"><b>+5</b></font>'; break;
CASE ($injury_time >=6 AND $injury_time < 7): $prikaz_poskodbe = '&nbsp;<font color="red"><b>+6</b></font>'; break;
CASE ($injury_time >=7 AND $injury_time < 8): $prikaz_poskodbe = '&nbsp;<font color="red"><b>+7</b></font>'; break;
CASE ($injury_time >=8 AND $injury_time < 9): $prikaz_poskodbe = '&nbsp;<font color="red"><b>+8</b></font>'; break;
CASE ($injury_time >=9): $prikaz_poskodbe = '&nbsp;<font color="red"><b>+9</b></font>'; break;
}
if ($name==' ') {$kmah = $surname;} else {$kmah = $name." ".$surname;}
echo "<tr><td align=\"center\"><b>",$ntshirt,"</b></td><td><b>&nbsp;<a href=\"player.php?playerid=",$id,"\">",$kmah,"</a></b>";
echo " <span title=\"",$kruy," NT matches\">(",$kruy,")</span>";
echo $prikaz_poskodbe,"&nbsp;";
if ($isonsale==1) {echo "<img src=\"img/for_sale.jpg\" alt=\"",$langmark936,"\" title=\"",$langmark936,"\">&nbsp;";}
if ($cset==$id) {echo "<i>(captain)</i>";}
echo "</td></tr>";
$v++;
}
echo "</table>";
?>
<table cellspacing="0" cellpadding="0" border="0" width="99%" bgcolor="#F5F5F5">
<tr><td colspan="2" style="border-top: solid 1px LightSteelBlue;"></td></tr>
<tr><td><?=$langmark1267?>:</td><td align="right"><?=number_format($skupajv, 0, ',', '.')?> &euro;</td></tr>
<tr><td>Average wage:</td><td align="right"><?=number_format($skupwag/$vsi, 0, ',', '.')?> &euro;</td></tr>
<tr><td>Average age:</td><td align="right"><?=round($skupage/$vsi,1);?></td></tr>
<tr><td colspan="2" style="border-bottom: solid 1px LightSteelBlue;"></td></tr>
</table>
<?php
} elseif ($country<>'World' AND $country<>'Europe') {echo "<tr><td>",$langmark1562,"</td></tr></table>";}
?>
<br/><b><?=$langmark1563?></b>:<i>
<?php
SWITCH (TRUE) {
CASE ($cenas < 21): echo " <span title=\"Level 1/9\"><a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=20\">",$langmark1564,"</a></span>"; break;
CASE ($cenas > 20 AND $cenas < 40): echo " <span title=\"Level 2/9\"><a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=21\">",$langmark1565,"</a></span>"; break;
CASE ($cenas > 39 AND $cenas < 60): echo " <span title=\"Level 3/9\"><a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=22\">",$langmark1566,"</a></span>"; break;
CASE ($cenas > 59 AND $cenas < 80): echo " <span title=\"Level 4/9\"><a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=23\">",$langmark1567,"</a></span>"; break;
CASE ($cenas > 79 AND $cenas < 120): echo " <span title=\"Level 5/9\"><a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=24\">",$langmark1568,"</a></span>"; break;
CASE ($cenas > 119 AND $cenas < 140): echo " <span title=\"Level 6/9\"><a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=25\">",$langmark1569,"</a></span>"; break;
CASE ($cenas > 139 AND $cenas < 160): echo " <span title=\"Level 7/9\"><a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=26\">",$langmark1570,"</a></span>"; break;
CASE ($cenas > 159 AND $cenas < 181): echo " <span title=\"Level 8/9\"><a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=27\">",$langmark1571,"</a></span>"; break;
CASE ($cenas > 180): echo " <span title=\"Level 9/9\"><a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=28\">",$langmark1572,"</a></span>"; break;
}
?>
</i><br/>
<a name="matches"></a>
<?php
if ($country=='World' OR $country=='Europe') {?><br/><?=stripslashes($mesdz)?><br/><?php } elseif (strlen($mesdz) >0) {?><br/><b><?=$langmark1573?></b>:<br/><?=stripslashes($mesdz)?><br/><?php }
$hpwi = explode("/", $homepr);
if ($hpwi[1]=='bswiki') {
//echo " <br/><b>",$langmark1574,"</b>: <a href=\"",$dstran,"\"><img src=\"http://www.basketsim.gr/pics/bswiki.gif\" border=\"0\" title=\"",$country," @ BS wiki\" alt=\"",stripslashes($name)," @ BS wiki\"></a><br/>";
$greb=44;
} elseif (strlen($homepr) >1) {?> <br/><b><?=$langmark1574?></b>: <a href="<?=$dstran?>"><?=$homepr?></a><br/>
<?php
}
//general ali matches
$listall = $_GET["listall"];
if ($listall <> 'm' && $listall <> 'mm') {
?>
<br><h2><?=$langmark798?></h2><br/>
<?php 
if ($default_season & 2) {?><a href="ntfixtures.php?group=99"><?php } else {?><a href="ntfixtures.php?group=99"><?php }?>
<b><?=$langmark1539?></b></a><br/>
<a href="elections.php?gcountry=<?=$country?>"><b><?=$langmark1575?></b></a><!-- <font color="red"><?=$langmark1576?></font> ONGOING WARNING --><br/>
<a href="stats.php"><b><?=$langmark1335?></b></a><br/>
<a href="ntstats.php"><b>NT stats</b></a><br/>
<a href="worldcup.php"><b><?=$langmark1464?></b></a>
<?php
}
elseif ($listall == 'mm') {
//list of ALL matches
if ($country=='Bosnia') {$bula9='Bosnia and Herzegovina';} else {$bula9=$country;}
?>
<br/><h2><?=$langmark1577?> [<a href="nationalteams.php?country=<?=$country?>&listall=m&#35;matches"><font color="white">-</font></a>]</h2><br/>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
<?php
$staretekme = mysql_query("SELECT matchid, home_id, away_id, home_name, away_name, home_score, away_score, time, type, season FROM nt_matches WHERE crowd1 > 0 AND type < 10 AND home_name LIKE '$bula9' UNION SELECT matchid, home_id, away_id, home_name, away_name, home_score, away_score, time, type, season FROM nt_matches WHERE crowd1 > 0 AND type < 10 AND away_name LIKE '$bula9' ORDER BY season ASC, `time` ASC") or die(mysql_error());
$ststarih = mysql_num_rows($staretekme);
SWITCH (TRUE) {
CASE ($ststarih < 1): echo $langmark493; break;
CASE ($ststarih > 0):
if ($ststarih < 501) {$s=0;}
if ($ststarih > 500 AND $show<>'arch') {$s=$ststarih-500;}
if ($ststarih > 500 AND $show=='arch') {$s=0;}
while ($s < $ststarih) {
$matchid = mysql_result($staretekme,$s,"matchid");
$home_id = mysql_result($staretekme,$s,"home_id");
$away_id = mysql_result($staretekme,$s,"away_id");
$home_name = mysql_result($staretekme,$s,"home_name");
$away_name = mysql_result($staretekme,$s,"away_name");
$home_score = mysql_result($staretekme,$s,"home_score");
$away_score = mysql_result($staretekme,$s,"away_score");
$time = mysql_result($staretekme,$s,"time");
$barua = mysql_result($staretekme,$s,"type");
$seza1 = mysql_result($staretekme,$s,"season");
$seza2 = @mysql_result($staretekme,$s-1,"season");
if ($seza1<>$seza2) {echo "<tr><td colspan=\"3\"><hr/><b>SEASON ",$seza1,"</b><hr/></td></tr>";}
$splitdatetime = explode(" ", $time); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$disdate = date("d/m", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));
if ($home_score == $away_score) {$zmaga='&nbsp;';}
if ($barua==1) {echo "<tr style=\"background-color:#d0e0eb;\">";} elseif($barua>2){echo "<tr style=\"background-color:lightblue\">";} else {echo "<tr>";}
echo "<td align=\"left\">",$disdate," ",$home_name," - ",$away_name," </td><td align=\"right\"><a href=\"nt_prikaz.php?matchid=",$matchid,"\">",$home_score,"&nbsp;:&nbsp;",$away_score,"</a>&nbsp;</td>";
if ($home_score >= $away_score AND $home_score > 0 AND $home_name == $bula9) {echo "<td><font color=\"green\"><b>",$langmark735,"</b></td>";}
elseif ($home_score < $away_score AND $home_name == $bula9) {echo "<td><font color=\"red\"><b>",$langmark736,"</b></td>";}
elseif ($home_score > $away_score AND $away_name == $bula9) {echo "<td><font color=\"red\"><b>",$langmark736,"</b></td>";}
elseif ($home_score <= $away_score AND $home_score > 0 AND $away_name == $bula9) {echo "<td><font color=\"green\"><b>",$langmark735,"</b></td>";}
echo "</tr>";
$s++;
}
break;
}
echo "</table>";
}
//list of 10 last and few next matches
else
{
if ($country=='Bosnia') {$bula9='Bosnia and Herzegovina';} else {$bula9=$country;}
?>
<br><h2><?=$langmark734?> [<a href="nationalteams.php?country=<?=$country?>&listall=mm&#35;matches"><font color="white">+</font></a>]</h2><br/>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
<?php
$staretekme = mysql_query("SELECT matchid, home_id, away_id, home_name, away_name, home_score, away_score, time FROM nt_matches WHERE home_score > 0 AND type < 10 AND home_name LIKE '$bula9' UNION SELECT matchid, home_id, away_id, home_name, away_name, home_score, away_score, time FROM nt_matches WHERE home_score > 0 AND type < 10 AND away_name LIKE '$bula9' ORDER BY `time` ASC") or die(mysql_error());
$ststarih = mysql_num_rows($staretekme);
SWITCH (TRUE) {
CASE ($ststarih < 1): echo $langmark493; break;
CASE ($ststarih > 0):
if ($ststarih < 11) {$s=0;}
if ($ststarih > 10 AND $show<>arch) {$s=$ststarih-10;}
if ($ststarih > 10 AND $show==arch) {$s=0;}
while ($s < $ststarih) {
$matchid = mysql_result($staretekme,$s,"matchid");
$home_id = mysql_result($staretekme,$s,"home_id");
$away_id = mysql_result($staretekme,$s,"away_id");
$home_name = mysql_result($staretekme,$s,"home_name");
$away_name = mysql_result($staretekme,$s,"away_name");
$home_score = mysql_result($staretekme,$s,"home_score");
$away_score = mysql_result($staretekme,$s,"away_score");
$time = mysql_result($staretekme,$s,"time");
$splitdatetime = explode(" ", $time); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$disdate = date("d/m", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));
if ($home_score == $away_score) {$zmaga='&nbsp;';}
echo "<tr><td align=\"left\">",$disdate," ",$home_name," - ",$away_name," </td><td align=\"right\"><a href=\"nt_prikaz.php?matchid=",$matchid,"\">",$home_score,"&nbsp;:&nbsp;",$away_score,"</a>&nbsp;</td>";
if ($home_score >= $away_score AND $home_score > 0 AND $home_name == $bula9) {echo "<td><font color=\"green\"><b>",$langmark735,"</b></td>";}
elseif ($home_score < $away_score AND $home_name == $bula9) {echo "<td><font color=\"red\"><b>",$langmark736,"</b></td>";}
elseif ($home_score > $away_score AND $away_name == $bula9) {echo "<td><font color=\"red\"><b>",$langmark736,"</b></td>";}
elseif ($home_score <= $away_score AND $home_score > 0 AND $away_name == $bula9) {echo "<td><font color=\"green\"><b>",$langmark735,"</b></td>";}
echo "</tr>";
$s++;
}
break;
}
echo "</table>";

//future matches
?>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
<?php
$staretekme = mysql_query("SELECT matchid, home_id, away_id, crowd1, home_name, away_name, home_score, away_score, time FROM nt_matches WHERE home_score = 0 AND type < 10 AND home_name LIKE '$bula9' UNION SELECT matchid, home_id, away_id, crowd1, home_name, away_name, home_score, away_score, time FROM nt_matches WHERE home_score = 0 AND type < 10 AND away_name LIKE '$bula9' ORDER BY `time` ASC") or die(mysql_error());
$ststarih = mysql_num_rows($staretekme);
SWITCH (TRUE) {
CASE ($ststarih > 0):
if ($ststarih < 16) {$s=0;}
if ($ststarih > 15 AND $show<>arch) {$s=$ststarih-16;}
if ($ststarih > 15 AND $show==arch) {$s=0;}
while ($s < $ststarih) {
$matchid = mysql_result($staretekme,$s,"matchid");
$home_id = mysql_result($staretekme,$s,"home_id");
$away_id = mysql_result($staretekme,$s,"away_id");
$crowd1c = mysql_result($staretekme,$s,"crowd1");
$home_name = mysql_result($staretekme,$s,"home_name");
$away_name = mysql_result($staretekme,$s,"away_name");
$home_score = mysql_result($staretekme,$s,"home_score");
$away_score = mysql_result($staretekme,$s,"away_score");
$time = mysql_result($staretekme,$s,"time");
$splitdatetime = explode(" ", $time); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$disdate = date("d/m", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));
if ($home_score == $away_score) {$zmaga='&nbsp;';}
if ($crowd1c > 0) {echo "<tr><td align=\"left\">",$disdate," ",$home_name," - ",$away_name," </td><td align=\"right\"><a href=\"nt_prikaz.php?matchid=",$matchid,"\">LIVE</a></td><td>&nbsp;&nbsp;&nbsp;</td></tr>";} else {echo "<tr><td align=\"left\">",$disdate," ",$home_name," - ",$away_name," </td><td align=\"right\"><a href=\"nt_prikaz.php?matchid=",$matchid,"\">preview</a></td><td>&nbsp;&nbsp;&nbsp;</td></tr>";}
$s++;
}
break;
}
echo "</table>";

}
//konec prikaza tekem

//KONEC SKUPNEGA PRIKAZA
}
elseif ($ntc == 'yes' AND $natcoach==1) {
//PRIKAZ ZA NAT.COACHA

//erorji ali potrditev ob nastavitvi postave
$mess=$_GET["mess"];
if ($mess=='yes') {echo "<font color=\"green\"><b>",$langmark1578,"</b></font>";}
elseif ($mess=='no') {echo "<font color=\"red\"><b>",$langmark1579,"</b></font>";}
elseif ($mess=='dlnv') {echo "<font color=\"darkred\"><b>Lineup is not valid, all starting players must be set!</b></font>";}
elseif ($mess=='chal') {echo "<font color=\"green\"><b>",$langmark191,"</b></font>";}
elseif ($mess=='bya') {echo "<font color=\"red\"><b>",$langmark1580,"</b></font>";}
?>
<h2><?=$langmark1581?></h2><br/>
<?php
$results=mysql_query("SELECT id, name, surname, injury from players WHERE `ntplayer`='1' AND `country` LIKE '$nt_country'") or die(mysql_error());
?>
<SCRIPT language="Javascript">
<!--
function PlayerInUse(id)
{
var PlayerExist = false;
if (id == document.lineup.starting_pg.value) {PlayerExist = true;}
else if (id == document.lineup.starting_sg.value) {PlayerExist = true;}
else if (id == document.lineup.starting_sf.value) {PlayerExist = true;}		
else if (id == document.lineup.starting_pf.value) {PlayerExist = true;}		
else if (id == document.lineup.starting_c.value) {PlayerExist = true;}
return PlayerExist;
}
		
function podvajanje(id, FromField) {		
if (FromField == 'pointguard') {
} else if (id == document.lineup.starting_pg.value) {document.lineup.starting_pg.value = '';}
if (FromField == 'shootingguard') {
} else if (id == document.lineup.starting_sg.value) {document.lineup.starting_sg.value = '';}
if (FromField == 'smallforward') {
} else if (id == document.lineup.starting_sf.value) {document.lineup.starting_sf.value = '';}
if (FromField == 'powerforward') {
} else if (id == document.lineup.starting_pf.value) {document.lineup.starting_pf.value = '';}
if (FromField == 'center') {
} else if (id == document.lineup.starting_c.value) {document.lineup.starting_c.value = '';}
if (FromField == 'pointguard2') {
} else if (id == document.lineup.reserve_pg.value) {document.lineup.reserve_pg.value = '';}
if (FromField == 'shootingguard2') {
} else if (id == document.lineup.reserve_sg.value) {document.lineup.reserve_sg.value = '';}
if (FromField == 'smallforward2') {
} else if (id == document.lineup.reserve_sf.value) {document.lineup.reserve_sf.value = '';}
if (FromField == 'powerforward2') {
} else if (id == document.lineup.reserve_pf.value) {document.lineup.reserve_pf.value = '';}
if (FromField == 'center2') {
} else if (id == document.lineup.reserve_c.value) {document.lineup.reserve_c.value = '';}
}
//-->
</SCRIPT>

<form name="lineup" method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="margin: 0">
<table width="100%">

<tr><td align="right">PG1:&nbsp;</td><td>
   <?php
echo"<select name=\"starting_pg\" class=\"inputreg\" size=\"1\" onchange=\"podvajanje(document.lineup.starting_pg.options[document.lineup.starting_pg.selectedIndex].value,'pointguard');\">";
echo '<option> </option>';
for($u=0; $u<mysql_num_rows($results); $u++){ $id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$injury=mysql_result($results,$u,"injury");
?>
<option <?php if($injury>1){echo "class=red";} if($id==$home_pg1 OR $id==$away_pg1){echo selected;}?> value="<?=$id?>"><?=$name," ",$surname;?></option>
<?php } ?>
</select></td></tr>

<tr><td align="right">SG1:&nbsp;</td><td>
   <?php
echo"<select name=\"starting_sg\" class=\"inputreg\" size=\"1\" onchange=\"podvajanje(document.lineup.starting_sg.options[document.lineup.starting_sg.selectedIndex].value,'shootingguard');\">";
echo '<option> </option>';
for($u=0; $u<mysql_num_rows($results); $u++){ $id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$injury=mysql_result($results,$u,"injury");
?>
<option <?php if($injury>1){echo "class=red";} if($id==$home_sg1 OR $id==$away_sg1){echo selected;}?> value="<?=$id?>"><?=$name," ",$surname;?></option>
<?php } ?>
</select></td></tr>

<tr><td align="right">SF1:&nbsp;</td><td>
   <?php
echo"<select name=\"starting_sf\" class=\"inputreg\" size=\"1\" onchange=\"podvajanje(document.lineup.starting_sf.options[document.lineup.starting_sf.selectedIndex].value,'smallforward');\">";
echo '<option> </option>';
for($u=0; $u<mysql_num_rows($results); $u++){ $id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$injury=mysql_result($results,$u,"injury");
?>
<option <?php if($injury>1){echo "class=red";} if($id==$home_sf1 OR $id==$away_sf1){echo selected;}?> value="<?=$id?>"><?=$name," ",$surname;?></option>
<?php } ?>
</select></td></tr>

<tr><td align="right">PF1:&nbsp;</td><td>
   <?php
echo"<select name=\"starting_pf\" class=\"inputreg\" size=\"1\" onchange=\"podvajanje(document.lineup.starting_pf.options[document.lineup.starting_pf.selectedIndex].value,'powerforward');\">";
echo '<option> </option>';
for($u=0; $u<mysql_num_rows($results); $u++){ $id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$injury=mysql_result($results,$u,"injury");
?>
<option <?php if($injury>1){echo "class=red";} if($id==$home_pf1 OR $id==$away_pf1){echo selected;}?> value="<?=$id?>"><?=$name," ",$surname;?></option>
<?php } ?>
</select></td></tr>

<tr><td align="right">C1:&nbsp;</td><td>
   <?php
echo"<select name=\"starting_c\" class=\"inputreg\" size=\"1\" onchange=\"podvajanje(document.lineup.starting_c.options[document.lineup.starting_c.selectedIndex].value,'center');\">";
echo '<option> </option>';
for($u=0; $u<mysql_num_rows($results); $u++){ $id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$injury=mysql_result($results,$u,"injury");
?>
<option <?php if($injury>1){echo "class=red";} if($id==$home_c1 OR $id==$away_c1){echo selected;}?> value="<?=$id?>"><?=$name," ",$surname;?></option>
<?php } ?>
</select></td></tr>


<tr><td align="right">PG2:&nbsp;</td><td>
   <?php
echo"<select name=\"reserve_pg\" class=\"inputreg\" size=\"1\" onchange=\"podvajanje(document.lineup.reserve_pg.options[document.lineup.reserve_pg.selectedIndex].value,'pointguard2');\">";
echo '<option> </option>';
for($u=0; $u<mysql_num_rows($results); $u++){ $id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$injury=mysql_result($results,$u,"injury");
?>
<option <?php if($injury>1){echo "class=red";} if($id==$home_pg2 OR $id==$away_pg2){echo selected;}?> value="<?=$id?>"><?=$name," ",$surname;?></option>
<?php } ?>
</select></td></tr>

<tr><td align="right">SG2:&nbsp;</td><td>
   <?php
echo"<select name=\"reserve_sg\" class=\"inputreg\" size=\"1\" onchange=\"podvajanje(document.lineup.reserve_sg.options[document.lineup.reserve_sg.selectedIndex].value,'shootingguard2');\">";
echo '<option> </option>';
for($u=0; $u<mysql_num_rows($results); $u++){ $id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$injury=mysql_result($results,$u,"injury");
?>
<option <?php if($injury>1){echo "class=red";} if($id==$home_sg2 OR $id==$away_sg2){echo selected;}?> value="<?=$id?>"><?=$name," ",$surname;?></option>
<?php } ?>
</select></td></tr>

<tr><td align="right">SF2:&nbsp;</td><td>
   <?php
echo"<select name=\"reserve_sf\" class=\"inputreg\" size=\"1\" onchange=\"podvajanje(document.lineup.reserve_sf.options[document.lineup.reserve_sf.selectedIndex].value,'smallforward2');\">";
echo '<option> </option>';
for($u=0; $u<mysql_num_rows($results); $u++){ $id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$injury=mysql_result($results,$u,"injury");
?>
<option <?php if($injury>1){echo "class=red";} if($id==$home_sf2 OR $id==$away_sf2){echo selected;}?> value="<?=$id?>"><?=$name," ",$surname;?></option>
<?php } ?>
</select></td></tr>

<tr><td align="right">PF2:&nbsp;</td><td>
   <?php
echo"<select name=\"reserve_pf\" class=\"inputreg\" size=\"1\" onchange=\"podvajanje(document.lineup.reserve_pf.options[document.lineup.reserve_pf.selectedIndex].value,'powerforward2');\">";
echo '<option> </option>';
for($u=0; $u<mysql_num_rows($results); $u++){ $id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$injury=mysql_result($results,$u,"injury");
?>
<option <?php if($injury>1){echo "class=red";} if($id==$home_pf2 OR $id==$away_pf2){echo selected;}?> value="<?=$id?>"><?=$name," ",$surname;?></option>
<?php } ?>
</select></td></tr>

<tr><td align="right">C2:&nbsp;</td><td>
   <?php
echo"<select name=\"reserve_c\" class=\"inputreg\" size=\"1\" onchange=\"podvajanje(document.lineup.reserve_c.options[document.lineup.reserve_c.selectedIndex].value,'center2');\">";
echo '<option> </option>';
for($u=0; $u<mysql_num_rows($results); $u++){ $id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$injury=mysql_result($results,$u,"injury");
?>
<option <?php if($injury>1){echo "class=red";} if($id==$home_c2 OR $id==$away_c2){echo selected;}?> value="<?=$id?>"><?=$name," ",$surname;?></option>
<?php } ?>
</select></td></tr>
 
<tr><td><b><?=$langmark128?></b>:</td><td>
<select name="def_strat" class="inputreg">
<option <?php if($home_def==0){echo "selected";}?> value="0"><?=$langmark722?></option>
<option <?php if($home_def==1){echo "selected";}?> value="1"><?=$langmark723?></option>
<option <?php if($home_def==2){echo "selected";}?> value="2"><?=$langmark724?></option>
<option <?php if($home_def==3){echo "selected";}?> value="3"><?=$langmark725?></option>
<option <?php if($home_def==4){echo "selected";}?> value="4"><?=$langmark726?></option>
<option <?php if($home_def==5){echo "selected";}?> value="5"><?=$langmark727?></option>
<option <?php if($home_def==6){echo "selected";}?> value="6">half court trap</option>
</select></td></tr>

<tr><td><b><?=$langmark1582?></b>:</td><td>
<select name="off_strat" class="inputreg">
<option <?php if($home_off==0){echo "selected";}?> value="0"><?=$langmark722?></option>
<option <?php if($home_off==1){echo "selected";}?> value="1"><?=$langmark728?></option>
<option <?php if($home_off==2){echo "selected";}?> value="2"><?=$langmark729?></option>
<option <?php if($home_off==3){echo "selected";}?> value="3"><?=$langmark730?></option>
<option <?php if($home_off==4){echo "selected";}?> value="4"><?=$langmark731?></option>
<option <?php if($home_off==5){echo "selected";}?> value="5"><?=$langmark732?></option>
<option <?php if($home_off==6){echo "selected";}?> value="6">inside shooting</option>
</select></td></tr>

<tr><td><b><?=$langmark031?></b>:</td><td>
<select name="atitud" class="inputreg">
<option <?php if($home_att==0){echo "selected";}?> value="0"><?=$langmark1540?></option>
<option <?php if($home_att==1){echo "selected";}?> value="1"><?=$langmark1541?></option>
<option <?php if($home_att==2){echo "selected";}?> value="2"><?=$langmark1542?></option>
<option <?php if($home_att==3){echo "selected";}?> value="3"><?=$langmark1543?></option>
<option <?php if($home_att==4){echo "selected";}?> value="4"><?=$langmark1544?></option>
</select></td></tr>

<tr><td colspan="2"><input type="submit" name="submitac" value="<?=$langmark1063?>" class="buttonreg">
</td></tr></table>

<br/><h2><?=$langmark1583?></h2><br/>
<table width="100%" cellspacing="0" cellpadding="0" border="0">
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="margin: 0">
<tr><td><b>Captain</b>:</td><td><select name="captain" class="inputreg"><?php
for($u=0; $u<mysql_num_rows($results); $u++){
$id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');?>
<option <?php if($cset==$id){echo selected;}?> value="<?=$id?>"><?=$name," ",$surname;?></option>
<?php } ?></select></td></tr>
<tr><td><b><?=$langmark1263?> 1</b>:</td><td><input type="text" size="25" maxlength="77" name="hshirt" value="<?=$dmajca?>" class="inputreg"></td></tr>
<tr><td><b><?=$langmark1263?> 2</b>:</td><td><input type="text" size="25" maxlength="77" name="ashirt" value="<?=$gmajca?>" class="inputreg"></td></tr>
<tr><td><b><?=$langmark1574?></b>:</td><td><input type="text" size="25" maxlength="60" name="homepage" value="<?=$dstran?>" class="inputreg"></td></tr>
<tr><td><br/></td></tr>
<tr><td colspan="2"><b><?=$langmark1573?></b>: <textarea rows="5" cols="26" name="message" wrap="virtual" class="inputreg"><?=strip_tags(stripslashes($mesdz))?></textarea></td></tr>
<tr><td colspan="2"><input type="submit" value="<?=$langmark624?>" name="submit" class="buttonreg"></td></tr>
</form></table>

<br/><h2>Shirt numbers</h2><br/>
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="margin: 0">
<?php
$numeros = mysql_query("SELECT id, surname, ntshirt FROM players WHERE country='$nt_country' AND ntplayer=1") or die(mysql_error());
$n=0;
while ($n < mysql_num_rows($numeros)) {
$ntstev = mysql_result($numeros,$n,"ntshirt");
?>
<select name="<?="shirtnum_",$n?>" class="inputreg">
<option value="4" <?php if($ntstev==4){echo "selected";}?>>4</option>
<option value="5" <?php if($ntstev==5){echo "selected";}?>>5</option>
<option value="6" <?php if($ntstev==6){echo "selected";}?>>6</option>
<option value="7" <?php if($ntstev==7){echo "selected";}?>>7</option>
<option value="8" <?php if($ntstev==8){echo "selected";}?>>8</option>
<option value="9" <?php if($ntstev==9){echo "selected";}?>>9</option>
<option value="10" <?php if($ntstev==10){echo "selected";}?>>10</option>
<option value="11" <?php if($ntstev==11){echo "selected";}?>>11</option>
<option value="12" <?php if($ntstev==12){echo "selected";}?>>12</option>
<option value="13" <?php if($ntstev==13){echo "selected";}?>>13</option>
<option value="14" <?php if($ntstev==14){echo "selected";}?>>14</option>
<option value="15" <?php if($ntstev==15){echo "selected";}?>>15</option>
<option value="0" <?php if($ntstev==0){echo "selected";}?>>-</option>
</select>
<input type="hidden" name="<?="playernum_",$n?>" value="<?=mysql_result($numeros,$n,"id")?>">
<?php
echo mysql_result($numeros,$n,"surname"),"<br/>";
$n++;
}
?>
<input type="hidden" name="nofp" value="<?=$n?>">
<input type="submit" value="Confirm numbers" name="submit1" class="buttonreg">
</form>

<br/><h2>Friendly challenges</h2><br/>
<form method="post" action="<?=$PHP_SELF?>" style="margin: 0">
Challenge
<?php
$pilula = mysql_query("SELECT countryid, country FROM countries WHERE country <> '$nt_country' AND natarena <> 0 ORDER BY country ASC") or die(mysql_error());
$krump=0;
echo "<select name=\"frendrzava\" class=\"inputreg\">";
while ($krump < mysql_num_rows($pilula)) {
echo "<option value=\"",mysql_result($pilula,$krump,"countryid"),"\">",mysql_result($pilula,$krump,"country"),"</option>";
$krump++;
}
?>
</select>
<br/>On date:&nbsp;
<?php
$datula = mysql_query("SELECT date FROM `nt_frendly dates` ORDER BY date ASC") or die(mysql_error());
$kru=0;
echo "<select name=\"frendatu\" class=\"inputreg\">";
while ($kru < mysql_num_rows($datula)) {
echo "<option value=\"",mysql_result($datula,$kru),"\">",mysql_result($datula,$kru),"</option>";
$kru++;
}
?>
</select>
<br/>In&nbsp;arena:&nbsp;
<?php
$arenula = mysql_query("SELECT arena.teamid AS dovolj1, arena.arenaname as dovolj2 FROM arena, teams WHERE arena.teamid = teams.teamid AND arena.in_use=100 AND teams.status=1 AND teams.country = '$nt_country' ORDER BY (seats1+seats2+seats3+seats4) DESC LIMIT 100") or die(mysql_error());
$krum=0;
echo "<select name=\"frendarena\" class=\"inputreg\">";
while ($krum < mysql_num_rows($arenula)) {
echo "<option value=\"",mysql_result($arenula,$krum,"dovolj1"),"\">",mysql_result($arenula,$krum,"dovolj2"),"</option>";
$krum++;
}
?>
</select>
<br/><input type="submit" value="Send challenge" name="submitboom" class="buttonreg">
</form>

<?php
$tnu = mysql_query("SELECT `nt_friendly`.id, `nt_friendly`.`when`, `countries`.`country` FROM `nt_friendly`, countries WHERE `nt_friendly`.who_from = countries.countryid AND `nt_friendly`.who_to=$cunja") or die(mysql_error());
$kahut = mysql_num_rows($tnu);
if ($kahut>0) {echo "<br/><h2>Challenges received</h2><br/>";} else {echo "<br/>";}
$abad=0;
while ($abad < $kahut) {
$didi = mysql_result($tnu,$abad,"nt_friendly.id");
$cnamena = mysql_result($tnu,$abad,"countries.country");
$pwen = mysql_result($tnu,$abad,"nt_friendly.when");
echo $cnamena," invites you to away friendly match on ",$pwen," <a href=\"nationalteams.php?did=",$didi,"&ction=accept\">accept</a> <a href=\"nationalteams.php?did=",$didi,"&ction=reject\">reject</a><br/><br/>";
$abad++;
}

if ($is_supporter==1) {
echo "<h2>Training report</h2><br/>";

$prikaz = mysql_query("SELECT *, IF (ntshirt IS NULL || ntshirt ='' || ntshirt=0, 1, 0) AS isnull FROM players WHERE ntplayer=1 AND country='$nt_country' ORDER BY isnull ASC, ntshirt ASC, wage DESC") or die(mysql_error());
while ($pri = mysql_fetch_array($prikaz)) {
$plid = $pri[id];
$name = $pri[name];
$surname = $pri[surname];
$last_position = $pri[last_position];
SWITCH ($last_position) {
CASE 1: $trening = $pri[handling]; $toj = 'handling'; break;
CASE 2: $trening = $pri[speed]; $toj = 'quickness'; break;
CASE 3: $trening = $pri[passing]; $toj = 'passing'; break;
CASE 4: $trening = $pri[vision]; $toj = 'dribbling'; break;
CASE 5: $trening = $pri[rebounds]; $toj = 'rebounds'; break;
CASE 6: $trening = $pri[position]; $toj = 'positioning'; break;
CASE 7: $trening = $pri[shooting]; $toj = 'shooting'; break;
CASE 8: $trening = $pri[freethrow]; $toj = 'free throws'; break;
CASE 9: $trening = $pri[defense]; $toj = 'defense'; break;
}
$last_training = $pri[last_training];

SWITCH (TRUE) {
CASE ($trening >= 1 AND $trening < 9): $down=1; $up=9; break;
CASE ($trening >= 9 AND $trening < 17): $down=9; $up=17; break;
CASE ($trening >= 17 AND $trening < 25): $down=17; $up=25; break;
CASE ($trening >= 25 AND $trening < 33): $down=25; $up=33; break;
CASE ($trening >= 33 AND $trening < 41): $down=33; $up=41; break;
CASE ($trening >= 41 AND $trening < 49): $down=41; $up=49; break;
CASE ($trening >= 49 AND $trening < 57): $down=49; $up=57; break;
CASE ($trening >= 57 AND $trening < 65): $down=57; $up=65; break;
CASE ($trening >= 65 AND $trening < 73): $down=65; $up=73; break;
CASE ($trening >= 73 AND $trening < 81): $down=73; $up=81; break;
CASE ($trening >= 81 AND $trening < 89): $down=81; $up=89; break;
CASE ($trening >= 89 AND $trening < 97): $down=89; $up=97; break;
CASE ($trening >= 97 AND $trening < 105): $down=97; $up=105; break;
CASE ($trening >= 105 AND $trening < 113): $down=105; $up=113; break;
CASE ($trening >= 113 AND $trening < 121): $down=113; $up=121; break;
CASE ($trening >= 121): $down=121; $up=999; break;
}
$odtrenirano = ($trening - $last_training - $down)*20;

if (strlen($toj)>1 && $last_training>0 && $last_position>0) {echo "<a href=\"player.php?playerid=",$plid,"\" class=\"greenhilite\">",$name," ",$surname,"</a> | ",$toj;?>

<div style="height:7px; width:160px;background-color:#ffffff;position:relative; overflow:hidden; border: 1px solid #000000;">
<div style="position:absolute;top:0px;left:0px;background-color:rgb(51,168,45); width:<?=$odtrenirano?>px;height:7px"></div>
<div style="position:absolute;top:0px;left:<?=$odtrenirano?>px;background-color:rgb(255,10,0); width:<?=($last_training*20)?>px;height:7px;border-right: 1px solid #000000;"></div></div>
<?php
}
}
}
}
//konec prikaza za kovce
?>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>