<?php
$coexpand=14;

$vklopwc=1; //0 when there are qualifications, 1 when draw for wc is made (other than that just &r=wc and ==/<> + copypaste of Q)
$stobar=3; //amount of teams you want colored
$ON3RD=0; //1 means that 3rd placed teams display is on, currently not imporatant

$group = $_GET["group"];
if (!is_numeric($group)) {die(include 'u18teams.php');}
if (($group<0 or $group >12) && $group <> 99) {die(include 'u18teams.php');}
$action=$_GET['action'];

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$comparep = mysql_query("SELECT lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($comparep)) {$lang = mysql_result ($comparep,0,"lang");} else {die(include 'basketsim.php');}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2>U19 NATIONAL TEAMS FIXTURES</h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="50%">

<h2>10th Junior World Cup (Indonesia 2014)</h2>

<?php
//prikaz svetovnega prvenstva
$r = $_GET['r'];

//menu
if ($vklopwc<>1) {?><br/>[<?=$langmark1500?>]<br/><?php } elseif ($vklopwc==1 AND $r=='wc') {?><br/>[<?=$langmark1531?>]&nbsp;[<a href="u18teams.php?a=qual"><?=$langmark1500?></a>]<br/><?php } else {?><br/>[<a href="u18teams.php"><?=$langmark1531?></a>]&nbsp;[<?=$langmark1500?>]<br/><?php }

// !!! KASNEJE SPREMENIM SPODNJI POGOJ V ==/<> !!!
if ($r=='wc') {
?>

<!-- ZAČETEK zaključna faza wc copy/paste -->



<!-- KONEC zaključna faza wc copy/paste -->


<?php
$gAquery = mysql_query("SELECT country, win, lose, difference FROM `u18countries` WHERE qualgroup LIKE 'A' ORDER BY win DESC, difference DESC, for_ DESC, country ASC");
$gA=0;
$numnt = mysql_num_rows($gAquery);
if ($numnt > 0) {
?>
<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b><?=strtoupper($langmark1535)?> A</b><!-- <i>(<a class="greenhilite" href="region.php?region=Ontario">Ontario</a>)</i>--></td><td align="right"><a href="u18ntfixtures.php?group=1&r=wc"><b>Fixtures</b></a></td></tr></table>
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
<td width="200"><img src="img/Flags/<?=$cA?>.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=<?=$cA?>"><?=$cA?></td><td align="right"><?=$wA?> - <?=$lA?></td><td align="right">(<?=$dA?>)</td></tr>
<?php
$gA++;
}
?>
</table>

<?php
$gAquery = mysql_query("SELECT country, win, lose, difference FROM `u18countries` WHERE qualgroup LIKE 'B' ORDER BY win DESC, difference DESC, for_ DESC, country ASC");
$gA=0;
$numnt = mysql_num_rows($gAquery);
if ($numnt > 0) {
?>
<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b><?=strtoupper($langmark1535)?> B</b><!-- <i>(<a class="greenhilite" href="region.php?region=The West">The West</a>/<a class="greenhilite" href="region.php?region=Ontario">Ontario</a>)</i>--></td><td align="right"><a href="u18ntfixtures.php?group=2&r=wc"><b>Fixtures</b></a></td></tr></table>
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
<td width="200"><img src="img/Flags/<?=$cA?>.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=<?=$cA?>"><?=$cA?></td><td align="right"><?=$wA?> - <?=$lA?></td><td align="right">(<?=$dA?>)</td></tr>
<?php
$gA++;
}
?>
</table>

<?php
$gAquery = mysql_query("SELECT country, win, lose, difference FROM `u18countries` WHERE qualgroup LIKE 'C' ORDER BY win DESC, difference DESC, for_ DESC, country ASC");
$gA=0;
$numnt = mysql_num_rows($gAquery);
if ($numnt > 0) {
?>
<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b><?=strtoupper($langmark1535)?> C</b><!-- <i>(<a class="greenhilite" href="region.php?region=The Maritimes">The Maritimes</a>)</i>--></td><td align="right"><a href="u18ntfixtures.php?group=3&r=wc"><b>Fixtures</b></a></td></tr></table>
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
<td width="200"><img src="img/Flags/<?=$cA?>.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=<?=$cA?>"><?=$cA?></td><td align="right"><?=$wA?> - <?=$lA?></td><td align="right">(<?=$dA?>)</td></tr>
<?php
$gA++;
}
?>
</table>

<?php
$gAquery = mysql_query("SELECT country, win, lose, difference FROM `u18countries` WHERE qualgroup LIKE 'D' ORDER BY win DESC, difference DESC, for_ DESC, country ASC");
$gA=0;
$numnt = mysql_num_rows($gAquery);
if ($numnt > 0) {
?>
<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b><?=strtoupper($langmark1535)?> D</b><!-- <i>(<a class="greenhilite" href="region.php?region=Quebec">Quebec</a>/<a class="greenhilite" href="region.php?region=Ontario">Ontario</a>)</i>--></td><td align="right"><a href="u18ntfixtures.php?group=4&r=wc"><b>Fixtures</b></a></td></tr></table>
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
<td width="200"><img src="img/Flags/<?=$cA?>.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=<?=$cA?>"><?=$cA?></td><td align="right"><?=$wA?> - <?=$lA?></td><td align="right">(<?=$dA?>)</td></tr>
<?php
$gA++;
}
?>
</table>

<?php
$gAquery = mysql_query("SELECT country, win, lose, difference FROM `u18countries` WHERE qualgroup LIKE 'E' ORDER BY win DESC, difference DESC, for_ DESC, country ASC");
$gA=0;
$numnt = mysql_num_rows($gAquery);
if ($numnt > 0) {
?>
<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b><?=strtoupper($langmark1535)?> E</b><!-- <i>(<a class="greenhilite" href="region.php?region=Ontario">Ontario</a>)</i>--></td><td align="right"><a href="u18ntfixtures.php?group=5&r=wc"><b>Fixtures</b></a></td></tr></table>
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
<td width="200"><img src="img/Flags/<?=$cA?>.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=<?=$cA?>"><?=$cA?></td><td align="right"><?=$wA?> - <?=$lA?></td><td align="right">(<?=$dA?>)</td></tr>
<?php
$gA++;
}
?>
</table>

<?php
$gAquery = mysql_query("SELECT country, win, lose, difference FROM `u18countries` WHERE qualgroup LIKE 'F' ORDER BY win DESC, difference DESC, for_ DESC, country ASC");
$gA=0;
$numnt = mysql_num_rows($gAquery);
if ($numnt > 0) {
?>
<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b><?=strtoupper($langmark1535)?> F</b></td><td align="right"><a href="u18ntfixtures.php?group=6&r=wc"><b>Fixtures</b></a></td></tr></table>
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
<td width="200"><img src="img/Flags/<?=$cA?>.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=<?=$cA?>"><?=$cA?></td><td align="right"><?=$wA?> - <?=$lA?></td><td align="right">(<?=$dA?>)</td></tr>
<?php
$gA++;
}
?>
</table>

<?php
$gAquery = mysql_query("SELECT country, win, lose, difference FROM `u18countries` WHERE qualgroup LIKE 'G' ORDER BY win DESC, difference DESC, for_ DESC, country ASC");
$gA=0;
$numnt = mysql_num_rows($gAquery);
if ($numnt > 0) {
?>
<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b><?=strtoupper($langmark1535)?> G</b></td><td align="right"><a href="u18ntfixtures.php?group=7&r=wc"><b>Fixtures</b></a></td></tr></table>
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
<td width="200"><img src="img/Flags/<?=$cA?>.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=<?=$cA?>"><?=$cA?></td><td align="right"><?=$wA?> - <?=$lA?></td><td align="right">(<?=$dA?>)</td></tr>
<?php
$gA++;
}
?>
</table>

<?php
$gAquery = mysql_query("SELECT country, win, lose, difference FROM `u18countries` WHERE qualgroup LIKE 'H' ORDER BY win DESC, difference DESC, for_ DESC, country ASC");
$gA=0;
$numnt = mysql_num_rows($gAquery);
if ($numnt > 0) {
?>
<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b><?=strtoupper($langmark1535)?> H</b></td><td align="right"><a href="u18ntfixtures.php?group=8&r=wc"><b>Fixtures</b></a></td></tr></table>
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
<td width="200"><img src="img/Flags/<?=$cA?>.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=<?=$cA?>"><?=$cA?></td><td align="right"><?=$wA?> - <?=$lA?></td><td align="right">(<?=$dA?>)</td></tr>
<?php
$gA++;
}
?>
</table>

<?php
$gAquery = mysql_query("SELECT country, win, lose, difference FROM `u18countries` WHERE qualgroup LIKE 'I' ORDER BY win DESC, difference DESC, for_ DESC, country ASC");
$gA=0;
$numnt = mysql_num_rows($gAquery);
if ($numnt > 0) {
?>
<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b><?=strtoupper($langmark1535)?> I</b></td><td align="right"><a href="u18ntfixtures.php?group=9"><b>Fixtures</b></a></td></tr></table>
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
<td width="200"><img src="img/Flags/<?=$cA?>.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=<?=$cA?>"><?=$cA?></td><td align="right"><?=$wA?> - <?=$lA?></td><td align="right">(<?=$dA?>)</td></tr>
<?php
$gA++;
}
?>
</table>

<?php
$gAquery = mysql_query("SELECT country, win, lose, difference FROM `u18countries` WHERE qualgroup LIKE 'J' ORDER BY win DESC, difference DESC, for_ DESC, country ASC");
$gA=0;
$numnt = mysql_num_rows($gAquery);
if ($numnt > 0) {
?>
<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b><?=strtoupper($langmark1535)?> J</b></td><td align="right"><a href="u18ntfixtures.php?group=10"><b>Fixtures</b></a></td></tr></table>
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
<td width="200"><img src="img/Flags/<?=$cA?>.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=<?=$cA?>"><?=$cA?></td><td align="right"><?=$wA?> - <?=$lA?></td><td align="right">(<?=$dA?>)</td></tr>
<?php
$gA++;
}
?>
</table>

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

<?php if ($ON3RD==1){?>
<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>BEST THIRD-PLACE TEAMS</b></td><td align="right"></td></tr></table>
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
if ($dj < 5) {?><tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/<?=$country3?>.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=<?=$country3?>"><?=$country3?></td><td align="right"><?=$win3?>&nbsp;-&nbsp;<?=$lose3?></td><td align="right">(<span title="score difference"><?=$diff3?></span>)</td></tr><?php } else {?><tr><td width="200"><img src="img/Flags/<?=$country3?>.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=<?=$country3?>"><?=$country3?></td><td align="right"><?=$win3?>&nbsp;-&nbsp;<?=$lose3?></td><td align="right">(<span title="score difference"><?=$diff3?></span>)</td></tr><?php }
}
echo "</table>";
}
/*
if ($vklopwc==1) {
?>
<br/><hr/>
4 teams advance from each group.<br/>
There is a 1 week pause after the group round.<br/>
Round of 16 pairs:<br/>
A1-B4<br/>
C2-D3<br/>
B1-A4<br/>
D2-C3<br/>
C1-D4<br/>
A2-B3<br/>
D1-C4<br/>
B2-A3
<?php
}
*/
}
else
{
//TU VSTAVIM COPYPASTE OD ZADNJIH KVALIFIKACIJ KO SO LE TE KONČANE
?>



<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b><!-- <i>(<a class="greenhilite" href="region.php?region=Ontario">Ontario</a>)</i>--></td><td align="right"><a href="u18ntfixtures.php?group=1"><b>Fixtures</b></a></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Poland">Poland</td><td align="right">13 - 1</td><td align="right">(+179)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=USA">USA</td><td align="right">10 - 4</td><td align="right">(+188)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Bosnia and Herzegovina.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bosnia and Herzegovina">Bosnia and Herzegovina</td><td align="right">9 - 5</td><td align="right">(+161)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Uruguay.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Uruguay">Uruguay</td><td align="right">9 - 5</td><td align="right">(+101)</td></tr>
<tr><td width="200"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Argentina">Argentina</td><td align="right">7 - 7</td><td align="right">(+65)</td></tr>
<tr><td width="200"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Serbia">Serbia</td><td align="right">5 - 9</td><td align="right">(-104)</td></tr>
<tr><td width="200"><img src="img/Flags/Thailand.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Thailand">Thailand</td><td align="right">2 - 12</td><td align="right">(-206)</td></tr>
<tr><td width="200"><img src="img/Flags/Belarus.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Belarus">Belarus</td><td align="right">1 - 13</td><td align="right">(-384)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b><!-- <i>(<a class="greenhilite" href="region.php?region=The West">The West</a>/<a class="greenhilite" href="region.php?region=Ontario">Ontario</a>)</i>--></td><td align="right"><a href="u18ntfixtures.php?group=2"><b>Fixtures</b></a></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Canada.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Canada">Canada</td><td align="right">12 - 2</td><td align="right">(+235)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Israel">Israel</td><td align="right">12 - 2</td><td align="right">(+232)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Brazil.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Brazil">Brazil</td><td align="right">9 - 5</td><td align="right">(+146)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Hong Kong.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Hong Kong">Hong Kong</td><td align="right">8 - 6</td><td align="right">(+82)</td></tr>
<tr><td width="200"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Lithuania">Lithuania</td><td align="right">8 - 6</td><td align="right">(+59)</td></tr>
<tr><td width="200"><img src="img/Flags/Cyprus.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Cyprus">Cyprus</td><td align="right">4 - 10</td><td align="right">(-220)</td></tr>
<tr><td width="200"><img src="img/Flags/Georgia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Georgia">Georgia</td><td align="right">2 - 12</td><td align="right">(-281)</td></tr>
<tr><td width="200"><img src="img/Flags/Malta.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Malta">Malta</td><td align="right">1 - 13</td><td align="right">(-253)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b><!-- <i>(<a class="greenhilite" href="region.php?region=The Maritimes">The Maritimes</a>)</i>--></td><td align="right"><a href="u18ntfixtures.php?group=3"><b>Fixtures</b></a></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Portugal">Portugal</td><td align="right">11 - 3</td><td align="right">(+216)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Croatia">Croatia</td><td align="right">9 - 5</td><td align="right">(+142)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Latvia">Latvia</td><td align="right">9 - 5</td><td align="right">(+102)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Australia">Australia</td><td align="right">9 - 5</td><td align="right">(+29)</td></tr>
<tr><td width="200"><img src="img/Flags/United Kingdom.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=United Kingdom">United Kingdom</td><td align="right">8 - 6</td><td align="right">(+62)</td></tr>
<tr><td width="200"><img src="img/Flags/FYR Macedonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=FYR Macedonia">FYR Macedonia</td><td align="right">5 - 9</td><td align="right">(-18)</td></tr>
<tr><td width="200"><img src="img/Flags/Denmark.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Denmark">Denmark</td><td align="right">5 - 9</td><td align="right">(-58)</td></tr>
<tr><td width="200"><img src="img/Flags/Tunisia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Tunisia">Tunisia</td><td align="right">0 - 14</td><td align="right">(-475)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b><!-- <i>(<a class="greenhilite" href="region.php?region=Quebec">Quebec</a>/<a class="greenhilite" href="region.php?region=Ontario">Ontario</a>)</i>--></td><td align="right"><a href="u18ntfixtures.php?group=4"><b>Fixtures</b></a></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Italy">Italy</td><td align="right">11 - 3</td><td align="right">(+265)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Switzerland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Switzerland">Switzerland</td><td align="right">10 - 4</td><td align="right">(+174)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/South Korea.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=South Korea">South Korea</td><td align="right">10 - 4</td><td align="right">(+33)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Netherlands.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Netherlands">Netherlands</td><td align="right">9 - 5</td><td align="right">(+135)</td></tr>
<tr><td width="200"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Finland">Finland</td><td align="right">9 - 5</td><td align="right">(+85)</td></tr>
<tr><td width="200"><img src="img/Flags/Venezuela.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Venezuela">Venezuela</td><td align="right">4 - 10</td><td align="right">(-171)</td></tr>
<tr><td width="200"><img src="img/Flags/Colombia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Colombia">Colombia</td><td align="right">3 - 11</td><td align="right">(-130)</td></tr>
<tr><td width="200"><img src="img/Flags/Austria.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Austria">Austria</td><td align="right">0 - 14</td><td align="right">(-391)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP E</b><!-- <i>(<a class="greenhilite" href="region.php?region=Ontario">Ontario</a>)</i>--></td><td align="right"><a href="u18ntfixtures.php?group=5"><b>Fixtures</b></a></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Greece">Greece</td><td align="right">13 - 1</td><td align="right">(+170)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=France">France</td><td align="right">10 - 4</td><td align="right">(+179)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Indonesia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Indonesia">Indonesia</td><td align="right">8 - 6</td><td align="right">(+106)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Ukraine.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Ukraine">Ukraine</td><td align="right">8 - 6</td><td align="right">(-6)</td></tr>
<tr><td width="200"><img src="img/Flags/Philippines.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Philippines">Philippines</td><td align="right">7 - 7</td><td align="right">(+73)</td></tr>
<tr><td width="200"><img src="img/Flags/Peru.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Peru">Peru</td><td align="right">4 - 10</td><td align="right">(-132)</td></tr>
<tr><td width="200"><img src="img/Flags/Mexico.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Mexico">Mexico</td><td align="right">4 - 10</td><td align="right">(-190)</td></tr>
<tr><td width="200"><img src="img/Flags/Ireland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Ireland">Ireland</td><td align="right">2 - 12</td><td align="right">(-200)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP F</b></td><td align="right"><a href="u18ntfixtures.php?group=6"><b>Fixtures</b></a></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/China.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=China">China</td><td align="right">10 - 4</td><td align="right">(+113)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovenia">Slovenia</td><td align="right">10 - 4</td><td align="right">(+69)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Czech Republic.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Czech Republic">Czech Republic</td><td align="right">9 - 5</td><td align="right">(+65)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Egypt.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Egypt">Egypt</td><td align="right">8 - 6</td><td align="right">(+65)</td></tr>
<tr><td width="200"><img src="img/Flags/Albania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Albania">Albania</td><td align="right">7 - 7</td><td align="right">(+72)</td></tr>
<tr><td width="200"><img src="img/Flags/Norway.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Norway">Norway</td><td align="right">5 - 9</td><td align="right">(-81)</td></tr>
<tr><td width="200"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bulgaria">Bulgaria</td><td align="right">4 - 10</td><td align="right">(-117)</td></tr>
<tr><td width="200"><img src="img/Flags/Japan.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Japan">Japan</td><td align="right">3 - 11</td><td align="right">(-186)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP G</b></td><td align="right"><a href="u18ntfixtures.php?group=7"><b>Fixtures</b></a></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Estonia">Estonia</td><td align="right">10 - 4</td><td align="right">(+155)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Germany">Germany</td><td align="right">10 - 4</td><td align="right">(+27)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Montenegro.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Montenegro">Montenegro</td><td align="right">9 - 5</td><td align="right">(+98)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Hungary.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Hungary">Hungary</td><td align="right">9 - 5</td><td align="right">(+36)</td></tr>
<tr><td width="200"><img src="img/Flags/Sweden.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Sweden">Sweden</td><td align="right">8 - 6</td><td align="right">(+116)</td></tr>
<tr><td width="200"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Belgium">Belgium</td><td align="right">8 - 6</td><td align="right">(+42)</td></tr>
<tr><td width="200"><img src="img/Flags/Russia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Russia">Russia</td><td align="right">2 - 12</td><td align="right">(-208)</td></tr>
<tr><td width="200"><img src="img/Flags/Chile.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Chile">Chile</td><td align="right">0 - 14</td><td align="right">(-266)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP H</b></td><td align="right"><a href="u18ntfixtures.php?group=8"><b>Fixtures</b></a></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Romania">Romania</td><td align="right">10 - 4</td><td align="right">(+133)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Turkey">Turkey</td><td align="right">10 - 4</td><td align="right">(+88)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/New Zealand.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=New Zealand">New Zealand</td><td align="right">9 - 5</td><td align="right">(+102)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Spain">Spain</td><td align="right">9 - 5</td><td align="right">(+49)</td></tr>
<tr><td width="200"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovakia">Slovakia</td><td align="right">8 - 6</td><td align="right">(+45)</td></tr>
<tr><td width="200"><img src="img/Flags/Puerto Rico.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Puerto Rico">Puerto Rico</td><td align="right">6 - 8</td><td align="right">(-45)</td></tr>
<tr><td width="200"><img src="img/Flags/Malaysia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Malaysia">Malaysia</td><td align="right">3 - 11</td><td align="right">(-164)</td></tr>
<tr><td width="200"><img src="img/Flags/India.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=India">India</td><td align="right">1 - 13</td><td align="right">(-208)</td></tr>
</table>



<?php
}
?>

</td>

<td class="border" width="50%">

<h2><?=$langmark739?></h2><br/>
<?php
switch ($group) {
CASE 1: echo "<b>",$langmark1535," A</b><br/><br/>"; break;
CASE 2: echo "<b>",$langmark1535," B</b><br/><br/>"; break;
CASE 3: echo "<b>",$langmark1535," C</b><br/><br/>"; break;
CASE 4: echo "<b>",$langmark1535," D</b><br/><br/>"; break;
CASE 5: echo "<b>",$langmark1535," E</b><br/><br/>"; break;
CASE 6: echo "<b>",$langmark1535," F</b><br/><br/>"; break;
CASE 7: echo "<b>",$langmark1535," G</b><br/><br/>"; break;
CASE 8: echo "<b>",$langmark1535," H</b><br/><br/>"; break;
CASE 9: echo "<b>",$langmark1535," I</b><br/><br/>"; break;
CASE 10: echo "<b>",$langmark1535," J</b><br/><br/>"; break;
CASE 11: echo "<b>",$langmark1535," K</b><br/><br/>"; break;
CASE 12: echo "<b>",$langmark1535," L</b><br/><br/>"; break;
CASE 99: echo "<b>",$langmark1539,"</b><br/><br/>"; $snif=99; $type=12; break;
}
if ($r=='wc') {$type=13;} else {$type=11;}
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php
if ($vklopwc==1) {$group = mysql_query("SELECT matchid, home_name, away_name, crowd1, home_score, away_score, time FROM `nt_matches` WHERE type=$type AND season >= $default_season-1 AND lid_round ='$group' ORDER BY time ASC");}
else {$group = mysql_query("SELECT matchid, home_name, away_name, crowd1, home_score, away_score, time FROM `nt_matches` WHERE type=$type AND season >= $default_season AND lid_round ='$group' ORDER BY time ASC");}
$g=0;
while ($g < mysql_num_rows($group)) {
$tmatchid = mysql_result($group,$g,"matchid");
$thome_name = mysql_result($group,$g,"home_name");
$taway_name = mysql_result($group,$g,"away_name");
$tcrowd1 = mysql_result($group,$g,"crowd1");
$thome_score = mysql_result($group,$g,"home_score");
$taway_score = mysql_result($group,$g,"away_score");
$time = mysql_result($group,$g,"time");
if ($thome_name=='Bosnia and Herzegovina') {$thome_name='BiH';}
if ($taway_name=='Bosnia and Herzegovina') {$taway_name='BiH';}
$splitdatetime = explode(" ", $time); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$disdate = date("d.m H:i", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));
echo "<tr><td>",$disdate,"&nbsp;",$thome_name," - ",$taway_name,"</td><td align=\"right\"><a href=\"nt_prikaz.php?matchid=",$tmatchid,"\">";
if ($tcrowd1>0 AND $thome_score==0) {echo "LIVE";} else {echo $thome_score,"&nbsp;:&nbsp;",$taway_score;}
echo "</a></td></tr>";
if ((mysql_num_rows($group)==6) AND ($g==1 or $g==3 or $g==5)) {echo "<tr><td colspan=\"3\">&nbsp;</td></tr>";}
elseif ((mysql_num_rows($group)==15) AND ($g==2 or $g==5 or $g==8 or $g==11)) {echo "<tr><td colspan=\"3\">&nbsp;</td></tr>";}
elseif ((mysql_num_rows($group)<>15) AND ($g==3 or $g==7 or $g==11 or $g==15 or $g==19 or $g==23 or $g==27 or $g==31 or $g==35 or $g==39 or $g==43 or $g==47 or $g==51)) {echo "<tr><td colspan=\"3\">&nbsp;</td></tr>";}
$g++;
}

if ($snif==99) {
echo "<tr><td colspan=\"4\"><u>Next matches</u></td></tr>";
$groups = mysql_query("SELECT `matchid`, `home_name` , `away_name` , `crowd1` , `time` FROM `nt_matches` WHERE home_score=0 AND `type` =12 ORDER BY `time` ASC, home_name ASC") or die(mysql_error());
$gs=0;
$stev=0; $stev = mysql_num_rows($groups);
if ($stev==0) {echo "<tr><td colspan=\"4\"><i>Currently there are no NT friendly matches scheduled. This is most likely due to ongoing <a href=\"u18teams.php\">World Cup </a> matches</i></td></tr>";}
while ($gs < $stev) {
$times = mysql_result($groups,$gs,"time");
$times1 = @mysql_result($groups,$gs+1,"time");
$splitdatetime = explode(" ", $times); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$disdates = date("d.m", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));
$mnozica =mysql_result($groups,$gs,"crowd1");
if ($mnozica > 0) {$rezultat = 'LIVE';} else {$rezultat = 'preview';}
$homhom = mysql_result($groups,$gs,"home_name");
$awaawa = mysql_result($groups,$gs,"away_name");
$ztring = $ztring . " country<>'".$homhom."' AND country<>'".$awaawa."' AND";
echo "<tr><td>",$disdates,"  ",$homhom," - ",$awaawa,"</td><td align=\"right\"><a href=\"nt_prikaz.php?matchid=",mysql_result($groups,$gs,"matchid"),"\">",$rezultat,"</a></td></tr>";
$gs++;
if ($times <> $times1) {$gs=$stev;}
}
//no friendly yet
if ($mnozica==0 AND $stev<>0) {
$ztring = $ztring . " country<>'All Star Team' AND country<>'Europe' AND country<>'World' AND natarena > 0 ORDER BY country ASC";
$grumM = "SELECT country FROM u18countries WHERE " . $ztring;
$vijav = mysql_query($grumM) or die(mysql_error());
$vijavN = mysql_num_rows($vijav);
if ($vijavN>0) {echo "<tr><td colspan=\"4\"><hr/><b>Available countries:</b>";}
$grb=0; while ($grb < $vijavN) {echo "<br/>",mysql_result($vijav,$grb,"country"); $grb++;}
echo "<hr/></td></tr>";
}

echo "<tr><td colspan=\"4\"><br/></td></tr>";
echo "<tr><td colspan=\"4\"><u>",$langmark234,"</u></td></tr>";
$groups = mysql_query("SELECT `matchid`, `home_name`, `away_name`, `home_score`, `away_score`, `time` FROM `nt_matches` WHERE `home_score` >0 AND lid_round=0 AND `type` =12 AND season >= '$default_season'-1 ORDER BY `time` DESC, `home_name` ASC") or die(mysql_error());
$numor = mysql_num_rows($groups);
$gs=0;
while ($gs < $numor) {
$times = mysql_result($groups,$gs,"time");
$times1 = @mysql_result($groups,$gs+1,"time");
$splitdatetime = explode(" ", $times); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$disdates = date("d.m", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));
echo "<tr><td>",$disdates,"  ",mysql_result($groups,$gs,"home_name")," - ",mysql_result($groups,$gs,"away_name"),"</td><td align=\"right\"><a href=\"nt_prikaz.php?matchid=",mysql_result($groups,$gs,"matchid"),"\">",mysql_result($groups,$gs,"home_score"),"&nbsp;:&nbsp;",mysql_result($groups,$gs,"away_score"),"</a></td></tr>";
$gs++;
if ($times <> $times1) {$gs=$numor;}
}
}
?>
</table>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>