<?php
$playerid=$_GET['playerid'];
if (!is_numeric($_GET['playerid'])) {die(include 'index.php');}

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$show = $_GET["show"];
if ($show=='career') {$sezonica='season > 0 AND season < 99';} else {$sezonica='season='.$default_season;}

$comparep = mysql_query("SELECT club, supporter, natcoach, nt_country, lang, `level` FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($comparep)){
$trueclub = mysql_result($comparep,0,"club");
$is_supporter = mysql_result($comparep,0,"supporter");
$natcoach = mysql_result($comparep,0,"natcoach");
$nt_country = mysql_result($comparep,0,"nt_country");
$lang = mysql_result ($comparep,0,"lang");
$levelll = mysql_result($comparep,0,"level");
}
else {die(include 'basketsim.php');}
require("inc/lang/".$lang.".php");

$result = mysql_query("SELECT * FROM players WHERE coach<>9 AND id ='$playerid' LIMIT 1");
if (mysql_num_rows($result) < 1) {header("Location: player.php?playerid=$playerid&ex=yes"); die();}
while($r=mysql_fetch_array($result)) {
$name=$r["name"];
$surname=$r["surname"];
$age=$r["age"];
$club=$r["club"];
$country=$r["country"];
$charac=$r["charac"];
$height=$r["height"];
$weight=$r["weight"];
$handling=$r["handling"];
$speed=$r["speed"];
$passing=$r["passing"];
$vision=$r["vision"];
$rebounds=$r["rebounds"];
$position=$r["position"];
$freethrow=$r["freethrow"];
$shooting=$r["shooting"];
$defense=$r["defense"];
$workrate=$r["workrate"];
$experience=$r["experience"];
$fatigue=$r["fatigue"];
$wage=$r["wage"];
$coach=$r["coach"];
$hawr=$r["quality"];
$isonsale=$r["isonsale"];
$face=$r["face"];
$ears=$r["ears"];
$mouth=$r["mouth"];
$eyes=$r["eyes"];
$nose=$r["nose"];
$mustage=$r["mustage"];
$hair=$r["hair"];
$star_qual=$r["star_qual"];
$star_posit=$r["star_posit"];
$injury_time=$r["injury"];
$ntplayer=$r["ntplayer"];
$shirtnum=$r["shirt"];
}
if ($shirtnum==0) {$shirtnum='';}
$dcountry = $country; if ($dcountry=='Bosnia') {$dcountry = 'Bosnia and Herzegovina';}

$bivsi = mysql_query("SELECT statid FROM `nt_statistics`  WHERE `player` ='$playerid' LIMIT 1");

if (($country=='Japan' OR $country=='China' OR $country=='Philippines' OR $country=='Thailand' OR $country=='South Korea' OR $country=='Malaysia' OR $country=='Indonesia' OR $country=='Hong Kong') AND $eyes=='eyes1') {$eyes='eyes1c';}
elseif (($country=='Japan' OR $country=='China' OR $country=='Philippines' OR $country=='Thailand' OR $country=='South Korea' OR $country=='Malaysia' OR $country=='Indonesia' OR $country=='Hong Kong') AND $eyes=='eyes2') {$eyes='eyes2c';}
elseif (($country=='Japan' OR $country=='China' OR $country=='Philippines' OR $country=='Thailand' OR $country=='South Korea' OR $country=='Malaysia' OR $country=='Indonesia' OR $country=='Hong Kong') AND $eyes=='eyes3') {$eyes='eyes3c';}
elseif (($country=='Japan' OR $country=='China' OR $country=='Philippines' OR $country=='Thailand' OR $country=='South Korea' OR $country=='Malaysia' OR $country=='Indonesia' OR $country=='Hong Kong') AND $eyes=='eyes4') {$eyes='eyes4c';}
elseif (($country=='Japan' OR $country=='China' OR $country=='Philippines' OR $country=='Thailand' OR $country=='South Korea' OR $country=='Malaysia' OR $country=='Indonesia' OR $country=='Hong Kong') AND $eyes=='eyes5') {$eyes='eyes5c';}
elseif (($country=='Japan' OR $country=='China' OR $country=='Philippines' OR $country=='Thailand' OR $country=='South Korea' OR $country=='Malaysia' OR $country=='Indonesia' OR $country=='Hong Kong') AND $eyes=='eyes6') {$eyes='eyes6c';}
elseif (($country=='Japan' OR $country=='China' OR $country=='Philippines' OR $country=='Thailand' OR $country=='South Korea' OR $country=='Malaysia' OR $country=='Indonesia' OR $country=='Hong Kong') AND $eyes=='eyes7') {$eyes='eyes7c';}
elseif (($country=='Japan' OR $country=='China' OR $country=='Philippines' OR $country=='Thailand' OR $country=='South Korea' OR $country=='Malaysia' OR $country=='Indonesia' OR $country=='Hong Kong') AND $eyes=='eyes8') {$eyes='eyes8c';}
elseif (($country=='Japan' OR $country=='China' OR $country=='Philippines' OR $country=='Thailand' OR $country=='South Korea' OR $country=='Malaysia' OR $country=='Indonesia' OR $country=='Hong Kong') AND $eyes=='eyes9') {$eyes='eyes9c';}
elseif (($country=='Japan' OR $country=='China' OR $country=='Philippines' OR $country=='Thailand' OR $country=='South Korea' OR $country=='Malaysia' OR $country=='Indonesia' OR $country=='Hong Kong') AND $eyes=='eyes10') {$eyes='eyes10c';}
elseif (($country=='Japan' OR $country=='China' OR $country=='Philippines' OR $country=='Thailand' OR $country=='South Korea' OR $country=='Malaysia' OR $country=='Indonesia' OR $country=='Hong Kong') AND $eyes=='eyes11') {$eyes='eyes11c';}
elseif (($country=='Japan' OR $country=='China' OR $country=='Philippines' OR $country=='Thailand' OR $country=='South Korea' OR $country=='Malaysia' OR $country=='Indonesia' OR $country=='Hong Kong') AND $eyes=='eyes12') {$eyes='eyes12c';}
elseif (($country=='Japan' OR $country=='China' OR $country=='Philippines' OR $country=='Thailand' OR $country=='South Korea' OR $country=='Malaysia' OR $country=='Indonesia' OR $country=='Hong Kong') AND $eyes=='eyes13') {$eyes='eyes13c';}
elseif (($country=='Japan' OR $country=='China' OR $country=='Philippines' OR $country=='Thailand' OR $country=='South Korea' OR $country=='Malaysia' OR $country=='Indonesia' OR $country=='Hong Kong') AND $eyes=='eyes14') {$eyes='eyes14c';}
elseif (($country=='Japan' OR $country=='China' OR $country=='Philippines' OR $country=='Thailand' OR $country=='South Korea' OR $country=='Malaysia' OR $country=='Indonesia' OR $country=='Hong Kong') AND $eyes=='eyes15') {$eyes='eyes2c';}
elseif (($country=='Japan' OR $country=='China' OR $country=='Philippines' OR $country=='Thailand' OR $country=='South Korea' OR $country=='Malaysia' OR $country=='Indonesia' OR $country=='Hong Kong') AND $eyes=='eyes16') {$eyes='eyes2c';}
elseif (($country=='Japan' OR $country=='China' OR $country=='Philippines' OR $country=='Thailand' OR $country=='South Korea' OR $country=='Malaysia' OR $country=='Indonesia' OR $country=='Hong Kong') AND $eyes=='eyes17') {$eyes='eyes9c';}
if (($country=='Japan' OR $country=='China' OR $country=='Philippines' OR $country=='Thailand' OR $country=='South Korea' OR $country=='Malaysia' OR $country=='Indonesia' OR $country=='Hong Kong') AND $mustage=='kumis4') {$mustage='kumis0';}
if ($playerid=='579851') {$country='All Star Team';}
$zaheader = $name." ".$surname;

include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2><?=$langmark405?></h2>

<?php
//bookmark
$joshk=0;
if ($is_supporter==1 OR $levelll >1) {
$already = mysql_query("SELECT * FROM bookmarks WHERE b_type=1 AND team='$trueclub' AND b_link='$playerid' LIMIT 1") or die(mysql_error());
$joshk=mysql_num_rows($already);
}

$slika = '<img src=ocena.jpeg border=0 alt=*>';
if ($star_qual > 69 AND $star_qual < 92) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena1.jpeg border=0 alt=°>';}
elseif ($star_qual > 91 AND $star_qual < 114) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
elseif ($star_qual > 113 AND $star_qual < 136) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena1.jpeg border=0 alt=°>';}
elseif ($star_qual > 135 AND $star_qual < 158) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
elseif ($star_qual > 157 AND $star_qual < 180) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena1.jpeg border=0 alt=°>';}
elseif ($star_qual > 179 AND $star_qual < 202) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
elseif ($star_qual > 201 AND $star_qual < 224) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena1.jpeg border=0 alt=°>';}
elseif ($star_qual > 223 AND $star_qual < 247) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
elseif ($star_qual > 246 AND $star_qual < 279) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena1.jpeg border=0 alt=°>';}
elseif ($star_qual > 268 AND $star_qual < 291) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
elseif ($star_qual > 290 AND $star_qual < 313) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena1.jpeg border=0 alt=°>';}
elseif ($star_qual > 312 AND $star_qual < 335) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
elseif ($star_qual > 334 AND $star_qual < 357) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena1.jpeg border=0 alt=°>';}
elseif ($star_qual > 356 AND $star_qual < 379) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}
elseif ($star_qual > 378 AND $star_qual < 401) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena1.jpeg border=0 alt=°>';}
elseif ($star_qual > 400) {$slika = '<img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*><img src=ocena.jpeg border=0 alt=*>';}

SWITCH ($star_posit) {
CASE 1: $ppos=$langmark386."."; break;
CASE 2: $ppos=$langmark387."."; break;
CASE 3: $ppos=$langmark388."."; break;
CASE 4: $ppos=$langmark389."."; break;
CASE 5: $ppos=$langmark390."."; break;
}

//poskodbe
switch (TRUE) {
CASE ($injury_time ==0): $prikaz_poskodbe = '&nbsp;'; break;
CASE ($injury_time >0 AND $injury_time < 1): $prikaz_poskodbe = '&nbsp;<img src=/img/poskodbe/+1ok.gif border=0 height=16 title=Slightly&nbsp;injured,&nbsp;can&nbsp;play>&nbsp;'; break;
CASE ($injury_time >=1 AND $injury_time < 2): $prikaz_poskodbe = '&nbsp;<img src=/img/poskodbe/+1.gif border=0 height=16 title=Injured&nbsp;for&nbsp;1&nbsp;week>&nbsp;'; break;
CASE ($injury_time >=2 AND $injury_time < 3): $prikaz_poskodbe = '&nbsp;<img src=/img/poskodbe/+2.gif border=0 height=16 title=Injured&nbsp;for&nbsp;2&nbsp;weeks>&nbsp;'; break;
CASE ($injury_time >=3 AND $injury_time < 4): $prikaz_poskodbe = '&nbsp;<img src=/img/poskodbe/+3.gif border=0 height=16 title=Injured&nbsp;for&nbsp;3&nbsp;weeks>&nbsp;'; break;
CASE ($injury_time >=4 AND $injury_time < 5): $prikaz_poskodbe = '&nbsp;<img src=/img/poskodbe/+4.gif border=0 height=16 title=Injured&nbsp;for&nbsp;4&nbsp;weeks>&nbsp;'; break;
CASE ($injury_time >=5 AND $injury_time < 6): $prikaz_poskodbe = '&nbsp;<img src=/img/poskodbe/+5.gif border=0 height=16 title=Injured&nbsp;for&nbsp;5&nbsp;weeks>&nbsp;'; break;
CASE ($injury_time >=6 AND $injury_time < 7): $prikaz_poskodbe = '&nbsp;<img src=/img/poskodbe/+6.gif border=0 height=16 title=Injured&nbsp;for&nbsp;6&nbsp;weeks>&nbsp;'; break;
CASE ($injury_time >=7 AND $injury_time < 8): $prikaz_poskodbe = '&nbsp;<img src=/img/poskodbe/+7.gif border=0 height=16 title=Injured&nbsp;for&nbsp;7&nbsp;weeks>&nbsp;'; break;
CASE ($injury_time >=8 AND $injury_time < 9): $prikaz_poskodbe = '&nbsp;<img src=/img/poskodbe/+8.gif border=0 height=16 title=Injured&nbsp;for&nbsp;8&nbsp;weeks>&nbsp;'; break;
CASE ($injury_time >=9): $prikaz_poskodbe = '&nbsp;<img src=/img/poskodbe/+9.gif border=0 height=16 title=Injured&nbsp;for&nbsp;9&nbsp;weeks>&nbsp;'; break;
}

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

//vrednost
$value5 = ($height * 2) + $handling + ($speed * 4) + ($passing * 2) + ($vision * 2) + ($rebounds * 3) + ($position * 4) + ($freethrow * 3) + ($shooting * 4) + ($experience * 2) + ($defense * 3);
$value5 = (($value5 * $value5 * $value5) / 225000) - 7500;
if ($value5 < 200) {$value5=200;}
$value = ((($value5/9)*($value5/9))/15)*(($value5/240000+(1/(exp(pow((($age-16)/10),4.1)))))*(((($workrate/8)+1)/19)+1))*((sqrt($value5/180000))/((((tanh((($age/2)-10))/2)+0.5)*0.71)+0.29));
if ($value < 1000) {$value=1000;}
?>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="57%">
<?php
$feetheight = floor((100*$height)/3048);
$tempheight = $height - ($feetheight*3048/100);
$inchheight = round((100*$tempheight)/254);
if ($inchheight==12) {
$feetheight=$feetheight+1; $inchheight='';
$usheight = $feetheight."'0";}
else {$usheight = $feetheight."'".$inchheight;}
$usweight = round ($weight * 22046 / 10000);
$diswage = number_format($wage, 0, ',', '.');

echo "<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"><tr><td><b>",$shirtnum," ",$name," ",$surname," (",$playerid,")</b>";
if ($ntplayer==1) {echo "&nbsp;<img src=\"img/Flags/",$country,".png\" border=\"0\" alt=\"",$langmark378," ",$dcountry,"\" title=\"",$langmark378," ",$dcountry,"\">";}
if ($ntplayer==2) {echo "&nbsp;<img src=\"img/Flags/",$country,".png\" border=\"0\" alt=\"",$langmark378," ",$dcountry," U19\" title=\"",$langmark378," ",$dcountry," U19\">";}
if (($is_supporter==1 OR $levelll >1) AND $joshk==0) {echo "&nbsp;<a href=\"player.php?playerid=",$playerid,"&action=bookmark\"><img src=\"img/bookmark.jpg\" alt=\"",$langmark410,"\" title=\"",$langmark410,"\" border=\"0\"></a>";}
if (($is_supporter==1 OR $levelll >1) AND $joshk>0) {echo "&nbsp;<img src=\"img/bookmarkY.jpg\" border=\"0\" alt=\"bookmarked\" title=\"Player already bookmarked\">";}
echo $prikaz_poskodbe,"</td><td align=\"right\"><a href=\"player.php?playerid=",$playerid,"\"><img src=\"img/back.jpg\" alt=\"",$langmark059,"\" title=\"",$langmark059,"\" border=\"0\"></a></td></tr></table><hr/>";
if ($is_supporter==1){?><table cellpadding="0" cellspacing="0" width="100%"><tr><td><img src="faces/template.php?kepal=<?=$face?>&teling=<?=$ears?>&mat=<?=$eyes?>&mulut=<?=$mouth?>&hidung=<?=$nose?>&kumis=<?=$mustage?>&rambut=<?=$hair?>" border="1"></td><td><table cellpadding="0" cellspacing="0" width="100%">
<?php } else {?><table cellpadding="0" cellspacing="0" width="330"><?php }?>
<tr><td><b><?=$langmark113,":</b> ",$age?></td></tr>
<tr><td><b><?=$langmark114,":</b> <a class=\"greenhilite\" href=\"league.php?country=",$country,"\">",$dcountry?></a><?php
if ($coach==0 AND $hawr > 0) {
SWITCH ($hawr) {
CASE 1: echo "/<a class=\"greenhilite\" href=\"league.php?country=Slovenia\">Slovenia</a>"; break;
CASE 5: echo "/<a class=\"greenhilite\" href=\"league.php?country=Romania\">Romania</a>"; break;
CASE 3: echo "/<a class=\"greenhilite\" href=\"league.php?country=Portugal\">Portugal</a>"; break;
CASE 4: echo "/<a class=\"greenhilite\" href=\"league.php?country=Poland\">Poland</a>"; break;
CASE 5: echo "/<a class=\"greenhilite\" href=\"league.php?country=Netherlands\">Netherlands</a>"; break;
CASE 6: echo "/<a class=\"greenhilite\" href=\"league.php?country=Lithuania\">Lithuania</a>"; break;
CASE 7: echo "/<a class=\"greenhilite\" href=\"league.php?country=Latvia\">Latvia</a>"; break;
CASE 8: echo "/<a class=\"greenhilite\" href=\"league.php?country=Italy\">Italy</a>"; break;
CASE 9: echo "/<a class=\"greenhilite\" href=\"league.php?country=Israel\">Israel</a>"; break;
CASE 10: echo "/<a class=\"greenhilite\" href=\"league.php?country=Croatia\">Croatia</a>"; break;
CASE 11: echo "/<a class=\"greenhilite\" href=\"league.php?country=France\">France</a>"; break;
CASE 12: echo "/<a class=\"greenhilite\" href=\"league.php?country=Spain\">Spain</a>"; break;
CASE 13: echo "/<a class=\"greenhilite\" href=\"league.php?country=Estonia\">Estonia</a>"; break;
CASE 14: echo "/<a class=\"greenhilite\" href=\"league.php?country=Germany\">Germany</a>"; break;
CASE 15: echo "/<a class=\"greenhilite\" href=\"league.php?country=Chile\">Chile</a>"; break;
CASE 16: echo "/<a class=\"greenhilite\" href=\"league.php?country=Belgium\">Belgium</a>"; break;
CASE 17: echo "/<a class=\"greenhilite\" href=\"league.php?country=Argentina\">Argentina</a>"; break;
CASE 18: echo "/<a class=\"greenhilite\" href=\"league.php?country=USA\">USA</a>"; break;
CASE 19: echo "/<a class=\"greenhilite\" href=\"league.php?country=Serbia\">Serbia</a>"; break;
CASE 20: echo "/<a class=\"greenhilite\" href=\"league.php?country=Turkey\">Turkey</a>"; break;
CASE 21: echo "/<a class=\"greenhilite\" href=\"league.php?country=Greece\">Greece</a>"; break;
CASE 22: echo "/<a class=\"greenhilite\" href=\"league.php?country=Finland\">Finland</a>"; break;
CASE 23: echo "/<a class=\"greenhilite\" href=\"league.php?country=Hungary\">Hungary</a>"; break;
CASE 24: echo "/<a class=\"greenhilite\" href=\"league.php?country=Bosnia\">Bosnia and Herzegovina</a>"; break;
CASE 25: echo "/<a class=\"greenhilite\" href=\"league.php?country=Czech Republic\">Czech Republic</a>"; break;
CASE 26: echo "/<a class=\"greenhilite\" href=\"league.php?country=Australia\">Australia</a>"; break;
CASE 27: echo "/<a class=\"greenhilite\" href=\"league.php?country=Bulgaria\">Bulgaria</a>"; break;
CASE 28: echo "/<a class=\"greenhilite\" href=\"league.php?country=Brazil\">Brazil</a>"; break;
CASE 29: echo "/<a class=\"greenhilite\" href=\"league.php?country=China\">China</a>"; break;
CASE 30: echo "/<a class=\"greenhilite\" href=\"league.php?country=Cyprus\">Cyprus</a>"; break;
CASE 31: echo "/<a class=\"greenhilite\" href=\"league.php?country=Denmark\">Denmark</a>"; break;
CASE 32: echo "/<a class=\"greenhilite\" href=\"league.php?country=Slovakia\">Slovakia</a>"; break;
CASE 33: echo "/<a class=\"greenhilite\" href=\"league.php?country=Sweden\">Sweden</a>"; break;
CASE 34: echo "/<a class=\"greenhilite\" href=\"league.php?country=Switzerland\">Switzerland</a>"; break;
CASE 35: echo "/<a class=\"greenhilite\" href=\"league.php?country=United Kingdom\">United Kingdom</a>"; break;
CASE 36: echo "/<a class=\"greenhilite\" href=\"league.php?country=Canada\">Canada</a>"; break;
CASE 37: echo "/<a class=\"greenhilite\" href=\"league.php?country=Malta\">Malta</a>"; break;
CASE 38: echo "/<a class=\"greenhilite\" href=\"league.php?country=Philippines\">Philippines</a>"; break;
CASE 39: echo "/<a class=\"greenhilite\" href=\"league.php?country=Russia\">Russia</a>"; break;
CASE 40: echo "/<a class=\"greenhilite\" href=\"league.php?country=Uruguay\">Uruguay</a>"; break;
CASE 41: echo "/<a class=\"greenhilite\" href=\"league.php?country=FYR Macedonia\">FYR Macedonia</a>"; break;
CASE 42: echo "/<a class=\"greenhilite\" href=\"league.php?country=Albania\">Albania</a>"; break;
CASE 43: echo "/<a class=\"greenhilite\" href=\"league.php?country=Austria\">Austria</a>"; break;
CASE 44: echo "/<a class=\"greenhilite\" href=\"league.php?country=Colombia\">Colombia</a>"; break;
CASE 45: echo "/<a class=\"greenhilite\" href=\"league.php?country=Mexico\">Mexico</a>"; break;
CASE 46: echo "/<a class=\"greenhilite\" href=\"league.php?country=New Zealand\">New Zealand</a>"; break;
CASE 47: echo "/<a class=\"greenhilite\" href=\"league.php?country=Thailand\">Thailand</a>"; break;
CASE 48: echo "/<a class=\"greenhilite\" href=\"league.php?country=Venezuela\">Venezuela</a>"; break;
CASE 49: echo "/<a class=\"greenhilite\" href=\"league.php?country=Egypt\">Egypt</a>"; break;
CASE 50: echo "/<a class=\"greenhilite\" href=\"league.php?country=Indonesia\">Indonesia</a>"; break;
CASE 51: echo "/<a class=\"greenhilite\" href=\"league.php?country=Norway\">Norway</a>"; break;
CASE 52: echo "/<a class=\"greenhilite\" href=\"league.php?country=South Korea\">South Korea</a>"; break;
CASE 53: echo "/<a class=\"greenhilite\" href=\"league.php?country=Tunisia\">Tunisia</a>"; break;
CASE 54: echo "/<a class=\"greenhilite\" href=\"league.php?country=Ukraine\">Ukraine</a>"; break;
CASE 55: echo "/<a class=\"greenhilite\" href=\"league.php?country=Hong Kong\">Hong Kong</a>"; break;
CASE 56: echo "/<a class=\"greenhilite\" href=\"league.php?country=India\">India</a>"; break;
CASE 57: echo "/<a class=\"greenhilite\" href=\"league.php?country=Ireland\">Ireland</a>"; break;
CASE 58: echo "/<a class=\"greenhilite\" href=\"league.php?country=Malaysia\">Malaysia</a>"; break;
CASE 59: echo "/<a class=\"greenhilite\" href=\"league.php?country=Montenegro\">Montenegro</a>"; break;
CASE 60: echo "/<a class=\"greenhilite\" href=\"league.php?country=Peru\">Peru</a>"; break;
CASE 61: echo "/<a class=\"greenhilite\" href=\"league.php?country=Japan\">Japan</a>"; break;
CASE 62: echo "/<a class=\"greenhilite\" href=\"league.php?country=Georgia\">Georgia</a>"; break;
CASE 63: echo "/<a class=\"greenhilite\" href=\"league.php?country=Belarus\">Belarus</a>"; break;
CASE 64: echo "/<a class=\"greenhilite\" href=\"league.php?country=Puerto Rico\">Puerto Rico</a>"; break;
}
}?></td></tr>
<tr><td><b><?=$langmark115,":</b> ",$spec_txt?></td></tr>
<tr><td><b><?=$langmark116,":</b> ",$height?> cm (<?=$usheight?> ft)</td></tr>
<tr><td><b><?=$langmark117,":</b> ",round($weight)?> kg (<?=$usweight?> lb)</td></tr>
<tr><td><b><?=$langmark118,":</b> ",number_format($wage, 0, ',', '.')," &euro; / ",$langmark382?></td></tr>
<tr><td><b><?=$langmark411,":</b> ",number_format($value, 0, ',', '.')," &euro;"?></td></tr>
<?php
if ($is_supporter==1){?></td></tr></table><?php } else {?><br/><?php }
if ($star_qual >0){echo $slika," ",$langmark412," ",$ppos,"<br/><hr/></td></tr></table>";} else {echo "<br/><hr/></td></tr></table>";}

if ($handling < 9) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=0\">".$langmark111."</a>"; }
elseif ($handling > 8 AND $handling < 17) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=1\">".$langmark096."</a>"; }
elseif ($handling > 16 AND $handling < 25) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=2\">".$langmark097."</a>"; }
elseif ($handling > 24 AND $handling < 33) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=3\">".$langmark098."</a>"; }
elseif ($handling > 32 AND $handling < 41) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=4\">".$langmark099."</a>"; }
elseif ($handling > 40 AND $handling < 49) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=5\">".$langmark100."</a>"; }
elseif ($handling > 48 AND $handling < 57) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=6\">".$langmark101."</a>"; }
elseif ($handling > 56 AND $handling < 65) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=7\">".$langmark102."</a>"; }
elseif ($handling > 64 AND $handling < 73) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=8\">".$langmark103."</a>"; }
elseif ($handling > 72 AND $handling < 81) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=9\">".$langmark104."</a>"; }
elseif ($handling > 80 AND $handling < 89) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=10\">".$langmark105."</a>"; }
elseif ($handling > 88 AND $handling < 97) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=11\">".$langmark106."</a>"; }
elseif ($handling > 96 AND $handling < 105) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=12\">".$langmark107."</a>"; }
elseif ($handling > 104 AND $handling < 113) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=13\">".$langmark108."</a>"; }
elseif ($handling > 112 AND $handling < 121) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=14\">".$langmark1584."</a>"; }
elseif ($handling > 120 AND $handling < 129) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=15\">".$langmark1585."</a>"; }
elseif ($handling > 128 AND $handling < 137) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=16\">".$langmark1586."</a>"; }
elseif ($handling > 136 AND $handling < 145) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=17\">".$langmark1587."</a>"; }
elseif ($handling > 144 AND $handling < 153) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=18\">".$langmark1588."</a>"; }
elseif ($handling > 152 AND $handling < 161) {$handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=19\">".$langmark109."</a>"; }
else $handling_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=20\">".$langmark110."</a>";

if ($speed < 9) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=0\">".$langmark111."</a>"; }
elseif ($speed > 8 AND $speed < 17) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=1\">".$langmark096."</a>"; }
elseif ($speed > 16 AND $speed < 25) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=2\">".$langmark097."</a>"; }
elseif ($speed > 24 AND $speed < 33) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=3\">".$langmark098."</a>"; }
elseif ($speed > 32 AND $speed < 41) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=4\">".$langmark099."</a>"; }
elseif ($speed > 40 AND $speed < 49) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=5\">".$langmark100."</a>"; }
elseif ($speed > 48 AND $speed < 57) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=6\">".$langmark101."</a>"; }
elseif ($speed > 56 AND $speed < 65) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=7\">".$langmark102."</a>"; }
elseif ($speed > 64 AND $speed < 73) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=8\">".$langmark103."</a>"; }
elseif ($speed > 72 AND $speed < 81) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=9\">".$langmark104."</a>"; }
elseif ($speed > 80 AND $speed < 89) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=10\">".$langmark105."</a>"; }
elseif ($speed > 88 AND $speed < 97) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=11\">".$langmark106."</a>"; }
elseif ($speed > 96 AND $speed < 105) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=12\">".$langmark107."</a>"; }
elseif ($speed > 104 AND $speed < 113) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=13\">".$langmark108."</a>"; }
elseif ($speed > 112 AND $speed < 121) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=14\">".$langmark1584."</a>"; }
elseif ($speed > 120 AND $speed < 129) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=15\">".$langmark1585."</a>"; }
elseif ($speed > 128 AND $speed < 137) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=16\">".$langmark1586."</a>"; }
elseif ($speed > 136 AND $speed < 145) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=17\">".$langmark1587."</a>"; }
elseif ($speed > 144 AND $speed < 153) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=18\">".$langmark1588."</a>"; }
elseif ($speed > 152 AND $speed < 161) {$speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=19\">".$langmark109."</a>"; }
else $speed_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=20\">".$langmark110."</a>";

if ($passing < 9) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=0\">".$langmark111."</a>"; }
elseif ($passing > 8 AND $passing < 17) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=1\">".$langmark096."</a>"; }
elseif ($passing > 16 AND $passing < 25) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=2\">".$langmark097."</a>"; }
elseif ($passing > 24 AND $passing < 33) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=3\">".$langmark098."</a>"; }
elseif ($passing > 32 AND $passing < 41) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=4\">".$langmark099."</a>"; }
elseif ($passing > 40 AND $passing < 49) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=5\">".$langmark100."</a>"; }
elseif ($passing > 48 AND $passing < 57) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=6\">".$langmark101."</a>"; }
elseif ($passing > 56 AND $passing < 65) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=7\">".$langmark102."</a>"; }
elseif ($passing > 64 AND $passing < 73) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=8\">".$langmark103."</a>"; }
elseif ($passing > 72 AND $passing < 81) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=9\">".$langmark104."</a>"; }
elseif ($passing > 80 AND $passing < 89) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=10\">".$langmark105."</a>"; }
elseif ($passing > 88 AND $passing < 97) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=11\">".$langmark106."</a>"; }
elseif ($passing > 96 AND $passing < 105) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=12\">".$langmark107."</a>"; }
elseif ($passing > 104 AND $passing < 113) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=13\">".$langmark108."</a>"; }
elseif ($passing > 112 AND $passing < 121) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=14\">".$langmark1584."</a>"; }
elseif ($passing > 120 AND $passing < 129) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=15\">".$langmark1585."</a>"; }
elseif ($passing > 128 AND $passing < 137) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=16\">".$langmark1586."</a>"; }
elseif ($passing > 136 AND $passing < 145) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=17\">".$langmark1587."</a>"; }
elseif ($passing > 144 AND $passing < 153) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=18\">".$langmark1588."</a>"; }
elseif ($passing > 152 AND $passing < 161) {$passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=19\">".$langmark109."</a>"; }
else $passing_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=20\">".$langmark110."</a>";

if ($vision < 9) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=0\">".$langmark111."</a>"; }
elseif ($vision > 8 AND $vision < 17) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=1\">".$langmark096."</a>"; }
elseif ($vision > 16 AND $vision < 25) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=2\">".$langmark097."</a>"; }
elseif ($vision > 24 AND $vision < 33) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=3\">".$langmark098."</a>"; }
elseif ($vision > 32 AND $vision < 41) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=4\">".$langmark099."</a>"; }
elseif ($vision > 40 AND $vision < 49) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=5\">".$langmark100."</a>"; }
elseif ($vision > 48 AND $vision < 57) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=6\">".$langmark101."</a>"; }
elseif ($vision > 56 AND $vision < 65) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=7\">".$langmark102."</a>"; }
elseif ($vision > 64 AND $vision < 73) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=8\">".$langmark103."</a>"; }
elseif ($vision > 72 AND $vision < 81) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=9\">".$langmark104."</a>"; }
elseif ($vision > 80 AND $vision < 89) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=10\">".$langmark105."</a>"; }
elseif ($vision > 88 AND $vision < 97) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=11\">".$langmark106."</a>"; }
elseif ($vision > 96 AND $vision < 105) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=12\">".$langmark107."</a>"; }
elseif ($vision > 104 AND $vision < 113) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=13\">".$langmark108."</a>"; }
elseif ($vision > 112 AND $vision < 121) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=14\">".$langmark1584."</a>"; }
elseif ($vision > 120 AND $vision < 129) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=15\">".$langmark1585."</a>"; }
elseif ($vision > 128 AND $vision < 137) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=16\">".$langmark1586."</a>"; }
elseif ($vision > 136 AND $vision < 145) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=17\">".$langmark1587."</a>"; }
elseif ($vision > 144 AND $vision < 153) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=18\">".$langmark1588."</a>"; }
elseif ($vision > 152 AND $vision < 161) {$vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=19\">".$langmark109."</a>"; }
else $vision_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=20\">".$langmark110."</a>";

if ($rebounds < 9) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=0\">".$langmark111."</a>"; }
elseif ($rebounds > 8 AND $rebounds < 17) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=1\">".$langmark096."</a>"; }
elseif ($rebounds > 16 AND $rebounds < 25) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=2\">".$langmark097."</a>"; }
elseif ($rebounds > 24 AND $rebounds < 33) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=3\">".$langmark098."</a>"; }
elseif ($rebounds > 32 AND $rebounds < 41) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=4\">".$langmark099."</a>"; }
elseif ($rebounds > 40 AND $rebounds < 49) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=5\">".$langmark100."</a>"; }
elseif ($rebounds > 48 AND $rebounds < 57) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=6\">".$langmark101."</a>"; }
elseif ($rebounds > 56 AND $rebounds < 65) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=7\">".$langmark102."</a>"; }
elseif ($rebounds > 64 AND $rebounds < 73) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=8\">".$langmark103."</a>"; }
elseif ($rebounds > 72 AND $rebounds < 81) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=9\">".$langmark104."</a>"; }
elseif ($rebounds > 80 AND $rebounds < 89) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=10\">".$langmark105."</a>"; }
elseif ($rebounds > 88 AND $rebounds < 97) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=11\">".$langmark106."</a>"; }
elseif ($rebounds > 96 AND $rebounds < 105) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=12\">".$langmark107."</a>"; }
elseif ($rebounds > 104 AND $rebounds < 113) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=13\">".$langmark108."</a>"; }
elseif ($rebounds > 112 AND $rebounds < 121) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=14\">".$langmark1584."</a>"; }
elseif ($rebounds > 120 AND $rebounds < 129) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=15\">".$langmark1585."</a>"; }
elseif ($rebounds > 128 AND $rebounds < 137) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=16\">".$langmark1586."</a>"; }
elseif ($rebounds > 136 AND $rebounds < 145) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=17\">".$langmark1587."</a>"; }
elseif ($rebounds > 144 AND $rebounds < 153) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=18\">".$langmark1588."</a>"; }
elseif ($rebounds > 152 AND $rebounds < 161) {$rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=19\">".$langmark109."</a>"; }
else $rebounds_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=20\">".$langmark110."</a>";

if ($position < 9) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=0\">".$langmark111."</a>"; }
elseif ($position > 8 AND $position < 17) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=1\">".$langmark096."</a>"; }
elseif ($position > 16 AND $position < 25) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=2\">".$langmark097."</a>"; }
elseif ($position > 24 AND $position < 33) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=3\">".$langmark098."</a>"; }
elseif ($position > 32 AND $position < 41) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=4\">".$langmark099."</a>"; }
elseif ($position > 40 AND $position < 49) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=5\">".$langmark100."</a>"; }
elseif ($position > 48 AND $position < 57) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=6\">".$langmark101."</a>"; }
elseif ($position > 56 AND $position < 65) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=7\">".$langmark102."</a>"; }
elseif ($position > 64 AND $position < 73) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=8\">".$langmark103."</a>"; }
elseif ($position > 72 AND $position < 81) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=9\">".$langmark104."</a>"; }
elseif ($position > 80 AND $position < 89) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=10\">".$langmark105."</a>"; }
elseif ($position > 88 AND $position < 97) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=11\">".$langmark106."</a>"; }
elseif ($position > 96 AND $position < 105) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=12\">".$langmark107."</a>"; }
elseif ($position > 104 AND $position < 113) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=13\">".$langmark108."</a>"; }
elseif ($position > 112 AND $position < 121) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=14\">".$langmark1584."</a>"; }
elseif ($position > 120 AND $position < 129) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=15\">".$langmark1585."</a>"; }
elseif ($position > 128 AND $position < 137) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=16\">".$langmark1586."</a>"; }
elseif ($position > 136 AND $position < 145) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=17\">".$langmark1587."</a>"; }
elseif ($position > 144 AND $position < 153) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=18\">".$langmark1588."</a>"; }
elseif ($position > 152 AND $position < 161) {$position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=19\">".$langmark109."</a>"; }
else $position_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=20\">".$langmark110."</a>";

if ($shooting < 9) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=0\">".$langmark111."</a>"; }
elseif ($shooting > 8 AND $shooting < 17) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=1\">".$langmark096."</a>"; }
elseif ($shooting > 16 AND $shooting < 25) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=2\">".$langmark097."</a>"; }
elseif ($shooting > 24 AND $shooting < 33) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=3\">".$langmark098."</a>"; }
elseif ($shooting > 32 AND $shooting < 41) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=4\">".$langmark099."</a>"; }
elseif ($shooting > 40 AND $shooting < 49) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=5\">".$langmark100."</a>"; }
elseif ($shooting > 48 AND $shooting < 57) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=6\">".$langmark101."</a>"; }
elseif ($shooting > 56 AND $shooting < 65) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=7\">".$langmark102."</a>"; }
elseif ($shooting > 64 AND $shooting < 73) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=8\">".$langmark103."</a>"; }
elseif ($shooting > 72 AND $shooting < 81) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=9\">".$langmark104."</a>"; }
elseif ($shooting > 80 AND $shooting < 89) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=10\">".$langmark105."</a>"; }
elseif ($shooting > 88 AND $shooting < 97) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=11\">".$langmark106."</a>"; }
elseif ($shooting > 96 AND $shooting < 105) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=12\">".$langmark107."</a>"; }
elseif ($shooting > 104 AND $shooting < 113) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=13\">".$langmark108."</a>"; }
elseif ($shooting > 112 AND $shooting < 121) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=14\">".$langmark1584."</a>"; }
elseif ($shooting > 120 AND $shooting < 129) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=15\">".$langmark1585."</a>"; }
elseif ($shooting > 128 AND $shooting < 137) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=16\">".$langmark1586."</a>"; }
elseif ($shooting > 136 AND $shooting < 145) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=17\">".$langmark1587."</a>"; }
elseif ($shooting > 144 AND $shooting < 153) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=18\">".$langmark1588."</a>"; }
elseif ($shooting > 152 AND $shooting < 161) {$shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=19\">".$langmark109."</a>"; }
else $shooting_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=20\">".$langmark110."</a>";

if ($freethrow < 9) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=0\">".$langmark111."</a>"; }
elseif ($freethrow > 8 AND $freethrow < 17) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=1\">".$langmark096."</a>"; }
elseif ($freethrow > 16 AND $freethrow < 25) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=2\">".$langmark097."</a>"; }
elseif ($freethrow > 24 AND $freethrow < 33) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=3\">".$langmark098."</a>"; }
elseif ($freethrow > 32 AND $freethrow < 41) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=4\">".$langmark099."</a>"; }
elseif ($freethrow > 40 AND $freethrow < 49) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=5\">".$langmark100."</a>"; }
elseif ($freethrow > 48 AND $freethrow < 57) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=6\">".$langmark101."</a>"; }
elseif ($freethrow > 56 AND $freethrow < 65) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=7\">".$langmark102."</a>"; }
elseif ($freethrow > 64 AND $freethrow < 73) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=8\">".$langmark103."</a>"; }
elseif ($freethrow > 72 AND $freethrow < 81) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=9\">".$langmark104."</a>"; }
elseif ($freethrow > 80 AND $freethrow < 89) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=10\">".$langmark105."</a>"; }
elseif ($freethrow > 88 AND $freethrow < 97) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=11\">".$langmark106."</a>"; }
elseif ($freethrow > 96 AND $freethrow < 105) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=12\">".$langmark107."</a>"; }
elseif ($freethrow > 104 AND $freethrow < 113) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=13\">".$langmark108."</a>"; }
elseif ($freethrow > 112 AND $freethrow < 121) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=14\">".$langmark1584."</a>"; }
elseif ($freethrow > 120 AND $freethrow < 129) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=15\">".$langmark1585."</a>"; }
elseif ($freethrow > 128 AND $freethrow < 137) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=16\">".$langmark1586."</a>"; }
elseif ($freethrow > 136 AND $freethrow < 145) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=17\">".$langmark1587."</a>"; }
elseif ($freethrow > 144 AND $freethrow < 153) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=18\">".$langmark1588."</a>"; }
elseif ($freethrow > 152 AND $freethrow < 161) {$freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=19\">".$langmark109."</a>"; }
else $freethrow_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=20\">".$langmark110."</a>";

if ($defense < 9) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=0\">".$langmark111."</a>"; }
elseif ($defense > 8 AND $defense < 17) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=1\">".$langmark096."</a>"; }
elseif ($defense > 16 AND $defense < 25) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=2\">".$langmark097."</a>"; }
elseif ($defense > 24 AND $defense < 33) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=3\">".$langmark098."</a>"; }
elseif ($defense > 32 AND $defense < 41) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=4\">".$langmark099."</a>"; }
elseif ($defense > 40 AND $defense < 49) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=5\">".$langmark100."</a>"; }
elseif ($defense > 48 AND $defense < 57) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=6\">".$langmark101."</a>"; }
elseif ($defense > 56 AND $defense < 65) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=7\">".$langmark102."</a>"; }
elseif ($defense > 64 AND $defense < 73) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=8\">".$langmark103."</a>"; }
elseif ($defense > 72 AND $defense < 81) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=9\">".$langmark104."</a>"; }
elseif ($defense > 80 AND $defense < 89) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=10\">".$langmark105."</a>"; }
elseif ($defense > 88 AND $defense < 97) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=11\">".$langmark106."</a>"; }
elseif ($defense > 96 AND $defense < 105) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=12\">".$langmark107."</a>"; }
elseif ($defense > 104 AND $defense < 113) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=13\">".$langmark108."</a>"; }
elseif ($defense > 112 AND $defense < 121) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=14\">".$langmark1584."</a>"; }
elseif ($defense > 120 AND $defense < 129) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=15\">".$langmark1585."</a>"; }
elseif ($defense > 128 AND $defense < 137) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=16\">".$langmark1586."</a>"; }
elseif ($defense > 136 AND $defense < 145) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=17\">".$langmark1587."</a>"; }
elseif ($defense > 144 AND $defense < 153) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=18\">".$langmark1588."</a>"; }
elseif ($defense > 152 AND $defense < 161) {$defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=19\">".$langmark109."</a>"; }
else $defense_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=20\">".$langmark110."</a>";

if ($workrate < 9) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=0\">".$langmark111."</a>"; $gmwr=0;}
elseif ($workrate > 8 AND $workrate < 17) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=1\">".$langmark096."</a>"; $gmwr=1;}
elseif ($workrate > 16 AND $workrate < 25) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=2\">".$langmark097."</a>"; $gmwr=2;}
elseif ($workrate > 24 AND $workrate < 33) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=3\">".$langmark098."</a>"; $gmwr=3;}
elseif ($workrate > 32 AND $workrate < 41) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=4\">".$langmark099."</a>"; $gmwr=4;}
elseif ($workrate > 40 AND $workrate < 49) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=5\">".$langmark100."</a>"; $gmwr=5;}
elseif ($workrate > 48 AND $workrate < 57) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=6\">".$langmark101."</a>"; $gmwr=6;}
elseif ($workrate > 56 AND $workrate < 65) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=7\">".$langmark102."</a>"; $gmwr=7;}
elseif ($workrate > 64 AND $workrate < 73) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=8\">".$langmark103."</a>"; $gmwr=8;}
elseif ($workrate > 72 AND $workrate < 81) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=9\">".$langmark104."</a>"; $gmwr=9;}
elseif ($workrate > 80 AND $workrate < 89) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=10\">".$langmark105."</a>"; $gmwr=10;}
elseif ($workrate > 88 AND $workrate < 97) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=11\">".$langmark106."</a>"; $gmwr=11;}
elseif ($workrate > 96 AND $workrate < 105) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=12\">".$langmark107."</a>"; $gmwr=12;}
elseif ($workrate > 104 AND $workrate < 113) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=13\">".$langmark108."</a>"; $gmwr=13;}
elseif ($workrate > 112 AND $workrate < 121) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=14\">".$langmark1584."</a>"; }
elseif ($workrate > 120 AND $workrate < 129) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=15\">".$langmark1585."</a>"; }
elseif ($workrate > 128 AND $workrate < 137) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=16\">".$langmark1586."</a>"; }
elseif ($workrate > 136 AND $workrate < 145) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=17\">".$langmark1587."</a>"; }
elseif ($workrate > 144 AND $workrate < 153) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=18\">".$langmark1588."</a>"; }
elseif ($workrate > 152 AND $workrate < 161) {$workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=19\">".$langmark109."</a>"; }
else $workrate_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=20\">".$langmark110."</a>";

if ($experience < 9) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=0\">".$langmark111."</a>"; }
elseif ($experience > 8 AND $experience < 17) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=1\">".$langmark096."</a>"; }
elseif ($experience > 16 AND $experience < 25) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=2\">".$langmark097."</a>"; }
elseif ($experience > 24 AND $experience < 33) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=3\">".$langmark098."</a>"; }
elseif ($experience > 32 AND $experience < 41) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=4\">".$langmark099."</a>"; }
elseif ($experience > 40 AND $experience < 49) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=5\">".$langmark100."</a>"; }
elseif ($experience > 48 AND $experience < 57) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=6\">".$langmark101."</a>"; }
elseif ($experience > 56 AND $experience < 65) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=7\">".$langmark102."</a>"; }
elseif ($experience > 64 AND $experience < 73) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=8\">".$langmark103."</a>"; }
elseif ($experience > 72 AND $experience < 81) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=9\">".$langmark104."</a>"; }
elseif ($experience > 80 AND $experience < 89) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=10\">".$langmark105."</a>"; }
elseif ($experience > 88 AND $experience < 97) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=11\">".$langmark106."</a>"; }
elseif ($experience > 96 AND $experience < 105) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=12\">".$langmark107."</a>"; }
elseif ($experience > 104 AND $experience < 113) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=13\">".$langmark108."</a>"; }
elseif ($experience > 112 AND $experience < 121) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=14\">".$langmark1584."</a>"; }
elseif ($experience > 120 AND $experience < 129) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=15\">".$langmark1585."</a>"; }
elseif ($experience > 128 AND $experience < 137) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=16\">".$langmark1586."</a>"; }
elseif ($experience > 136 AND $experience < 145) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=17\">".$langmark1587."</a>"; }
elseif ($experience > 144 AND $experience < 153) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=18\">".$langmark1588."</a>"; }
elseif ($experience > 152 AND $experience < 161) {$experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=19\">".$langmark109."</a>"; }
else $experience_dspl = "<a class=\"greenhilite\" href=\"gamerules.php?action=denominations&color=20\">".$langmark110."</a>";
//samo lastniki
$result17 = mysql_query("SELECT userid FROM users WHERE club ='$club'");
while ($usercl = mysql_fetch_array($result17, MYSQL_ASSOC))
   {   foreach ($usercl as $clubus)
   {$clubus; }     } ;

$result18 = mysql_query("SELECT name, status FROM teams WHERE teamid ='$club'");
if (mysql_num_rows($result18)) {
$tename = mysql_result($result18,0,"name");
$statusje = mysql_result($result18,0,"status");
}

if ($ntplayer==1){echo "<font color=\"green\"><b>",$langmark415,"</b></font> <a href=\"nationalteams.php?country=",$country,"\"><font color=\"green\"><b>",$dcountry,"</b></font></a>.<br/>";}
if ($ntplayer==2){echo "<font color=\"green\"><b>",$langmark415,"</b></font> <a href=\"u18teams.php?country=",$country,"\"><font color=\"green\"><b>",$dcountry," U19</b></font></a>.<br/>";}
if ($club == 0) {echo $langmark416;}
elseif ($clubus <> $userid AND $isonsale <> 1 AND $statusje ==1) {
echo $langmark417," <a href=\"club.php?clubid=",$clubus,"\"><b>",stripslashes($tename),"</b></a>.";
//utrujenost
if ($fatigue < 5) {echo "<br/>",$langmark418," ",$langmark419,".";}
elseif ($fatigue > 4 AND $fatigue < 10) {echo "<br/>",$langmark418," ",$langmark420,".";}
elseif ($fatigue > 9 AND $fatigue < 15) {echo "<br/>",$langmark418," ",$langmark421,".";}
elseif ($fatigue > 14 AND $fatigue < 20) {echo "<br/>",$langmark418," ",$langmark422,".";}
elseif ($fatigue > 19 AND $fatigue < 25) {echo "<br/>",$langmark418," ",$langmark423,".";}
elseif ($fatigue > 24 AND $fatigue < 30) {echo "<br/>",$langmark418," ",$langmark424,".";}
else {echo "<br/>",$langmark418," ",$langmark425,".";}

}
elseif ($clubus<>$userid AND $isonsale <> 1 AND $statusje == 3) {
echo $langmark417," <a href=\"team.php?clubid=",$club,"\"><b>",stripslashes($tename),"</b></a>.";
//utrujenost
if ($fatigue < 5) {echo "<br/>",$langmark418," ",$langmark419,".";}
elseif ($fatigue > 4 AND $fatigue < 10) {echo "<br/>",$langmark418," ",$langmark420,".";}
elseif ($fatigue > 9 AND $fatigue < 15) {echo "<br/>",$langmark418," ",$langmark421,".";}
elseif ($fatigue > 14 AND $fatigue < 20) {echo "<br/>",$langmark418," ",$langmark422,".";}
elseif ($fatigue > 19 AND $fatigue < 25) {echo "<br/>",$langmark418," ",$langmark423,".";}
elseif ($fatigue > 24 AND $fatigue < 30) {echo "<br/>",$langmark418," ",$langmark424,".";}
else {echo "<br/>",$langmark418," ",$langmark425,".";}

}
else {echo $langmark417," <a href=\"club.php?clubid=$clubus\"><b>",stripslashes($tename),"</b></a>";
?>
<br/><br/>
<table border="0" cellpadding="0" cellspacing="0">
<tr><td width="162"><b><?=$langmark426?>:</b> <?=$handling_dspl?></td>
<td><b><?=$langmark121?>:</b> <?=$speed_dspl?></td></tr>
<tr><td><b><?=$langmark122?>:</b> <?=$passing_dspl?></td>
<td><b><?=$langmark123?>:</b> <?=$vision_dspl?></td></tr>
<tr><td><b><?=$langmark427?>:</b> <?=$rebounds_dspl?></td>
<td><b><?=$langmark125?>:</b> <?=$position_dspl?></td></tr>
<tr><td><b><?=$langmark126?>:</b> <?=$shooting_dspl?></td>
<td><b><?=$langmark428?>:</b> <?=$freethrow_dspl?></td></tr>
<tr><td><b><?=$langmark128?>:</b> <?=$defense_dspl?></td>
<td><b><?=$langmark129?>:</b> <?=$workrate_dspl?></td></tr>
<tr><td><b><?=$langmark130?>:</b> <?=$experience_dspl?></td>
<td><b><?=$langmark383?>:</b> <?=$fatigue?>%</td></tr>
</table>
<?php }?>

</td><td class="border" width="43%">

<?php if ($show<>'career'){echo "[",$langmark1287,"]&nbsp;[<a href=\"playerstats.php?playerid=",$playerid,"&show=career\">",$langmark1420,"</a>]";}
else {echo "[<a href=\"playerstats.php?playerid=",$playerid,"\">",$langmark1287,"</a>]&nbsp;[",$langmark1420,"]";}?>
<?php if (mysql_num_rows($bivsi)) {?>&nbsp;[<a href="ntplayerstats.php?playerid=<?=$playerid?>"><?=$langmark1421?></a>]<?php }

$bigquery = mysql_query("SELECT COUNT(*) AS `tekem` , SUM(`gametime`) AS `gametime`, SUM(`two_scored`) AS `za_dve_zadel`, SUM(`two_total`) AS `za_dve`, SUM(`one_scored`) AS `za_ena_zadel`, SUM(`one_total`) AS `za_ena`, SUM(`three_scored`) AS `za_tri_zadel`, SUM(`three_total`) AS `za_tri`, SUM(`def_rebounds`) AS `obr_skoki`, SUM(`off_rebounds`) AS `nap_skoki`, SUM(`blocks`) AS `blocks`, SUM(`assists`) AS `assists`, SUM(`steals`) AS `steals`, SUM(`fouls`) AS `fouls`, SUM(`turnovers`) AS `turnovers` FROM `statistics` WHERE $sezonica AND (type <>2 AND type <>5 AND type<>18 AND type<>19) AND player=$playerid LIMIT 1");
$ary = mysql_fetch_array($bigquery);
$skupaj_tekem = $ary[tekem];
if (!$skupaj_tekem OR $skupaj_tekem==0) {die("<ul><li>$langmark998</li></ul></td></tr></table>");}
$sum_gametime = $ary[gametime];
$sum_za_dve_zadel = $ary[za_dve_zadel];
$sum_za_dve = $ary[za_dve];
$sum_za_ena_zadel = $ary[za_ena_zadel];
$sum_za_ena = $ary[za_ena];
$sum_za_tri_zadel = $ary[za_tri_zadel];
$sum_za_tri = $ary[za_tri];
$obr_skoki = $ary[obr_skoki];
$nap_skoki = $ary[nap_skoki];
$sum_blocks = $ary[blocks];
$sum_assists = $ary[assists];
$sum_steals = $ary[steals];
$sum_fouls = $ary[fouls];
$sum_turnovers = $ary[turnovers];


$rat = (($sum_za_dve_zadel*2 + $sum_za_ena_zadel + $sum_za_tri_zadel*3) - ($sum_za_dve - $sum_za_dve_zadel) - ($sum_za_ena - $sum_za_ena_zadel) - ($sum_za_tri - $sum_za_tri_zadel) + $obr_skoki + $nap_skoki + $sum_blocks + $sum_steals + $sum_assists - $sum_turnovers)/$skupaj_tekem;

$povprecje_gametime = $sum_gametime/$skupaj_tekem;
$povprecje_tock = ($sum_za_dve_zadel*2 + $sum_za_ena_zadel + $sum_za_tri_zadel*3)/$skupaj_tekem;
if ($sum_za_dve != 0) {$povprecje_za_dve = 100*$sum_za_dve_zadel/$sum_za_dve;}
if ($sum_za_ena != 0) {$povprecje_za_ena = 100*$sum_za_ena_zadel/$sum_za_ena;}
if ($sum_za_tri != 0) {$povprecje_za_tri = 100*$sum_za_tri_zadel/$sum_za_tri;}
$povprecje_skokov = ($obr_skoki+$nap_skoki)/$skupaj_tekem;
$povprecje_obr_skokov = $obr_skoki/$skupaj_tekem;
$povprecje_nap_skokov = $nap_skoki/$skupaj_tekem;

$povprecje_blokad = $sum_blocks/$skupaj_tekem;
$povprecje_podaj = $sum_assists/$skupaj_tekem;
$povprecje_ukradenih = $sum_steals/$skupaj_tekem;
$povprecje_osebnih = $sum_fouls/$skupaj_tekem;
$povprecje_napak = $sum_turnovers/$skupaj_tekem;
?>

<table>
<?php if($skupaj_tekem==1){?><tr><td><b><?php echo $langmark1128," ",$skupaj_tekem," ",$langmark1129;}?>
<?php if($skupaj_tekem==2){?><tr><td><b><?php echo $langmark1128," ",$skupaj_tekem," ",$langmark1130;}?>
<?php if($skupaj_tekem>2){?><tr><td><b><?php echo $langmark1128," ",$skupaj_tekem," ",$langmark1131;}?>
<tr><td><b><?=round($povprecje_gametime)," ",$langmark1132?></b></td></tr>
<tr><td><b><?=round($povprecje_tock, 1)," ",$langmark1133?></b></td></tr>
<tr><td><?php echo $langmark1140,": ",round(2*$sum_za_dve_zadel/$skupaj_tekem,1),"",strtolower($langmark174)," ",round($povprecje_za_dve,1);?>%</td></tr>
<tr><td><?php echo $langmark1141,": ",round($sum_za_ena_zadel/$skupaj_tekem,1),"",strtolower($langmark174)," ",round($povprecje_za_ena,1);?>%</td></tr>
<tr><td><?php echo $langmark1142,": ",round(3*$sum_za_tri_zadel/$skupaj_tekem,1),"",strtolower($langmark174)," ",round($povprecje_za_tri,1);?>%</td></tr>
<tr><td><b><?php echo round($povprecje_skokov, 1)," ",$langmark1134;?></b></td></tr>
<tr><td><?=$langmark310?>: <?=round($povprecje_obr_skokov,1)?></td></tr>
<tr><td><?=$langmark309?>: <?=round($povprecje_nap_skokov,1)?></td></tr>
<tr><td><b><?=round($povprecje_blokad, 1)," ",$langmark1135?></b></td></tr>
<tr><td><b><?=round($povprecje_podaj, 1)," ",$langmark1136?></b></td></tr>
<tr><td><b><?=round($povprecje_ukradenih, 1)," ",$langmark1137?></b></td></tr>
<tr><td><b><?=round($povprecje_osebnih, 1)," ",$langmark1138?></b></td></tr>
<tr><td><b><?=round($povprecje_napak, 1)," ",$langmark1139?></b></td></tr>
<tr><td><font color="darkred"><b>Average rating: <?=round($rat,1)?><b></font></td></tr>
</table>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>