<?php
$coexpand=14;

$vklopwc=0; //0 when there are qualifications, 1 when draw for wc is made (other than that just &r=wc and ==/<> + copypaste of Q)
$stobar=4; //amount of teams you want colored
$ON3RD=0; //1 means that 3rd placed teams display is on, currently not imporatant

$group = $_GET["group"];
if (!is_numeric($group)) {die(include 'nationalteams.php');}
if (($group<0 or $group >8) && $group <> 99) {die(include 'nationalteams.php');}
$action=$_GET['action'];

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)) {$lang = mysql_result($compare,0,"lang");} else {die(include 'basketsim.php');}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2><?=$langmark1550?></h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="50%">

<h2>11th World Cup (TBA 2015)</h2>

<?php
//prikaz svetovnega prvenstva
$r = $_GET['r'];

//SWITCHING BETWEEN ==/<>
if ($r<>'wc' OR ($group==99 AND $vklopwc==1)) {
?>


<!--
<br/><b><?=$langmark1462?></b><br/>
-->
<br/>[<?=$langmark1500?>]<br/>



<?php
$gAquery = mysql_query("SELECT country, win, lose, difference FROM `countries` WHERE qualgroup LIKE 'A' ORDER BY win DESC, difference DESC, for_ DESC, country ASC");
$gA=0;
$numnt = mysql_num_rows($gAquery);
if ($numnt > 0) {
?>
<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b><?=strtoupper($langmark1535)?> A</b><!-- <i>(<a class="greenhilite" href="region.php?region=Attiki">Attiki</a>)</i>--></td><td align="right"><a href="ntfixtures.php?group=1"><b>Fixtures</b></a></td></tr></table>
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
<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b><?=strtoupper($langmark1535)?> B</b><!-- <i>(<a class="greenhilite" href="region.php?region=Kriti">Kriti</a>)</i>--></td><td align="right"><a href="ntfixtures.php?group=2"><b>Fixtures</b></a></td></tr></table>
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
<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b><?=strtoupper($langmark1535)?> C</b><!-- <i>(<a class="greenhilite" href="region.php?region=Sterea Ellas">Sterea Ellas</a>)</i>--></td><td align="right"><a href="ntfixtures.php?group=3"><b>Fixtures</b></a></td></tr></table>
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
<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b><?=strtoupper($langmark1535)?> D</b><!-- <i>(<a class="greenhilite" href="region.php?region=Attiki">Attiki</a>)</i>--></td><td align="right"><a href="ntfixtures.php?group=4"><b>Fixtures</b></a></td></tr></table>
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
<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b><?=strtoupper($langmark1535)?> E</b><!-- <i>(<a class="greenhilite" href="region.php?region=Peloponnisos">Peloponnisos</a>)</i>--></td><td align="right"><a href="ntfixtures.php?group=5"><b>Fixtures</b></a></td></tr></table>
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
<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b><?=strtoupper($langmark1535)?> F</b><!-- <i>(<a class="greenhilite" href="region.php?region=Ipeiros">Ipeiros</a>)</i>--></td><td align="right"><a href="ntfixtures.php?group=6"><b>Fixtures</b></a></td></tr></table>
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
<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b><?=strtoupper($langmark1535)?> G</b><!-- <i>(<a class="greenhilite" href="region.php?region=Aigaio">Aigaio</a>)</i>--></td><td align="right"><a href="ntfixtures.php?group=7"><b>Fixtures</b></a></td></tr></table>
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
<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b><?=strtoupper($langmark1535)?> H</b><!-- <i>(<a class="greenhilite" href="region.php?region=Makedonia">Makedonia</a>)</i>--></td><td align="right"><a href="ntfixtures.php?group=8"><b>Fixtures</b></a></td></tr></table>
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
<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b><?=strtoupper($langmark1535)?> I</b></td><td align="right"><a href="ntfixtures.php?group=9"><b>Fixtures</b></a></td></tr></table>
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
<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b><?=strtoupper($langmark1535)?> J</b></td><td align="right"><a href="ntfixtures.php?group=10"><b>Fixtures</b></a></td></tr></table>
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
}
else
{
//TU VSTAVIM COPYPASTE OD ZADNJIH KVALIFIKACIJ KO SO LE TE KONCANE
?>
<br/>[<a href="nationalteams.php"><?=$langmark1531?></a>]&nbsp;[<?=$langmark1500?>]<br/>




<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b><!-- <i>(<a class="greenhilite" href="region.php?region=Attiki">Attiki</a>)</i>--></td><td align="right"><a href="ntfixtures.php?group=1"><b>Fixtures</b></a></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Argentina">Argentina</td><td align="right">11 - 3</td><td align="right">(+255)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Latvia">Latvia</td><td align="right">11 - 3</td><td align="right">(+246)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/China.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=China">China</td><td align="right">9 - 5</td><td align="right">(+202)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=USA">USA</td><td align="right">9 - 5</td><td align="right">(+171)</td></tr>
<tr><td width="200"><img src="img/Flags/Ukraine.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Ukraine">Ukraine</td><td align="right">7 - 7</td><td align="right">(+56)</td></tr>
<tr><td width="200"><img src="img/Flags/Netherlands.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Netherlands">Netherlands</td><td align="right">6 - 8</td><td align="right">(-15)</td></tr>
<tr><td width="200"><img src="img/Flags/Ireland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Ireland">Ireland</td><td align="right">3 - 11</td><td align="right">(-239)</td></tr>
<tr><td width="200"><img src="img/Flags/Georgia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Georgia">Georgia</td><td align="right">0 - 14</td><td align="right">(-676)</td></tr>
</table>

<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b><!-- <i>(<a class="greenhilite" href="region.php?region=Kriti">Kriti</a>)</i>--></td><td align="right"><a href="ntfixtures.php?group=2"><b>Fixtures</b></a></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Germany">Germany</td><td align="right">11 - 3</td><td align="right">(+405)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Romania">Romania</td><td align="right">10 - 4</td><td align="right">(+197)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Sweden.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Sweden">Sweden</td><td align="right">10 - 4</td><td align="right">(+39)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Portugal">Portugal</td><td align="right">8 - 6</td><td align="right">(+118)</td></tr>
<tr><td width="200"><img src="img/Flags/Russia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Russia">Russia</td><td align="right">8 - 6</td><td align="right">(+88)</td></tr>
<tr><td width="200"><img src="img/Flags/Denmark.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Denmark">Denmark</td><td align="right">4 - 10</td><td align="right">(-222)</td></tr>
<tr><td width="200"><img src="img/Flags/Montenegro.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Montenegro">Montenegro</td><td align="right">3 - 11</td><td align="right">(-320)</td></tr>
<tr><td width="200"><img src="img/Flags/Austria.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Austria">Austria</td><td align="right">2 - 12</td><td align="right">(-305)</td></tr>
</table>

<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b><!-- <i>(<a class="greenhilite" href="region.php?region=Sterea Ellas">Sterea Ellas</a>)</i>--></td><td align="right"><a href="ntfixtures.php?group=3"><b>Fixtures</b></a></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Poland">Poland</td><td align="right">11 - 3</td><td align="right">(+122)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Belgium">Belgium</td><td align="right">10 - 4</td><td align="right">(+162)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Switzerland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Switzerland">Switzerland</td><td align="right">9 - 5</td><td align="right">(+117)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Croatia">Croatia</td><td align="right">9 - 5</td><td align="right">(+98)</td></tr>
<tr><td width="200"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Israel">Israel</td><td align="right">7 - 7</td><td align="right">(+7)</td></tr>
<tr><td width="200"><img src="img/Flags/Canada.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Canada">Canada</td><td align="right">5 - 9</td><td align="right">(-60)</td></tr>
<tr><td width="200"><img src="img/Flags/Tunisia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Tunisia">Tunisia</td><td align="right">3 - 11</td><td align="right">(-105)</td></tr>
<tr><td width="200"><img src="img/Flags/Peru.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Peru">Peru</td><td align="right">2 - 12</td><td align="right">(-341)</td></tr>
</table>

<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b><!-- <i>(<a class="greenhilite" href="region.php?region=Attiki">Attiki</a>)</i>--></td><td align="right"><a href="ntfixtures.php?group=4"><b>Fixtures</b></a></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Italy">Italy</td><td align="right">12 - 2</td><td align="right">(+344)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Colombia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Colombia">Colombia</td><td align="right">9 - 5</td><td align="right">(+137)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Hungary.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Hungary">Hungary</td><td align="right">9 - 5</td><td align="right">(+107)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Bosnia and Herzegovina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bosnia and Herzegovina">Bosnia and Herzegovina</td><td align="right">9 - 5</td><td align="right">(+94)</td></tr>
<tr><td width="200"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bulgaria">Bulgaria</td><td align="right">8 - 6</td><td align="right">(+90)</td></tr>
<tr><td width="200"><img src="img/Flags/Mexico.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Mexico">Mexico</td><td align="right">5 - 9</td><td align="right">(+50)</td></tr>
<tr><td width="200"><img src="img/Flags/India.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=India">India</td><td align="right">4 - 10</td><td align="right">(-76)</td></tr>
<tr><td width="200"><img src="img/Flags/Belarus.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Belarus">Belarus</td><td align="right">0 - 14</td><td align="right">(-746)</td></tr>
</table>

<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP E</b><!-- <i>(<a class="greenhilite" href="region.php?region=Peloponnisos">Peloponnisos</a>)</i>--></td><td align="right"><a href="ntfixtures.php?group=5"><b>Fixtures</b></a></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Australia">Australia</td><td align="right">12 - 2</td><td align="right">(+234)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovenia">Slovenia</td><td align="right">11 - 3</td><td align="right">(+176)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=France">France</td><td align="right">10 - 4</td><td align="right">(+263)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Indonesia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Indonesia">Indonesia</td><td align="right">9 - 5</td><td align="right">(+58)</td></tr>
<tr><td width="200"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Serbia">Serbia</td><td align="right">8 - 6</td><td align="right">(+44)</td></tr>
<tr><td width="200"><img src="img/Flags/Malaysia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Malaysia">Malaysia</td><td align="right">4 - 10</td><td align="right">(-155)</td></tr>
<tr><td width="200"><img src="img/Flags/Venezuela.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Venezuela">Venezuela</td><td align="right">2 - 12</td><td align="right">(-144)</td></tr>
<tr><td width="200"><img src="img/Flags/South Korea.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=South Korea">South Korea</td><td align="right">0 - 14</td><td align="right">(-476)</td></tr>
</table>

<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP F</b><!-- <i>(<a class="greenhilite" href="region.php?region=Ipeiros">Ipeiros</a>)</i>--></td><td align="right"><a href="ntfixtures.php?group=6"><b>Fixtures</b></a></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Cyprus.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Cyprus">Cyprus</td><td align="right">13 - 1</td><td align="right">(+280)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Lithuania">Lithuania</td><td align="right">11 - 3</td><td align="right">(+246)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/United Kingdom.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=United Kingdom">United Kingdom</td><td align="right">9 - 5</td><td align="right">(+145)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Greece">Greece</td><td align="right">8 - 6</td><td align="right">(+169)</td></tr>
<tr><td width="200"><img src="img/Flags/Philippines.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Philippines">Philippines</td><td align="right">7 - 7</td><td align="right">(-15)</td></tr>
<tr><td width="200"><img src="img/Flags/Albania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Albania">Albania</td><td align="right">6 - 8</td><td align="right">(+26)</td></tr>
<tr><td width="200"><img src="img/Flags/Egypt.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Egypt">Egypt</td><td align="right">1 - 13</td><td align="right">(-327)</td></tr>
<tr><td width="200"><img src="img/Flags/Japan.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Japan">Japan</td><td align="right">1 - 13</td><td align="right">(-524)</td></tr>
</table>

<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP G</b><!-- <i>(<a class="greenhilite" href="region.php?region=Aigaio">Aigaio</a>)</i>--></td><td align="right"><a href="ntfixtures.php?group=7"><b>Fixtures</b></a></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Spain">Spain</td><td align="right">13 - 1</td><td align="right">(+180)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Finland">Finland</td><td align="right">9 - 5</td><td align="right">(+133)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Malta.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Malta">Malta</td><td align="right">9 - 5</td><td align="right">(+14)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovakia">Slovakia</td><td align="right">8 - 6</td><td align="right">(+29)</td></tr>
<tr><td width="200"><img src="img/Flags/Chile.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Chile">Chile</td><td align="right">7 - 7</td><td align="right">(+18)</td></tr>
<tr><td width="200"><img src="img/Flags/Hong Kong.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Hong Kong">Hong Kong</td><td align="right">5 - 9</td><td align="right">(-116)</td></tr>
<tr><td width="200"><img src="img/Flags/Norway.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Norway">Norway</td><td align="right">3 - 11</td><td align="right">(-162)</td></tr>
<tr><td width="200"><img src="img/Flags/FYR Macedonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=FYR Macedonia">FYR Macedonia</td><td align="right">2 - 12</td><td align="right">(-96)</td></tr>
</table>

<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP H</b><!-- <i>(<a class="greenhilite" href="region.php?region=Makedonia">Makedonia</a>)</i>--></td><td align="right"><a href="ntfixtures.php?group=8"><b>Fixtures</b></a></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia">Estonia</td><td align="right">13 - 1</td><td align="right">(+313)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Brazil.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Brazil">Brazil</td><td align="right">10 - 4</td><td align="right">(+185)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Turkey">Turkey</td><td align="right">10 - 4</td><td align="right">(+162)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Uruguay.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Uruguay">Uruguay</td><td align="right">9 - 5</td><td align="right">(+191)</td></tr>
<tr><td width="200"><img src="img/Flags/Czech Republic.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Czech Republic">Czech Republic</td><td align="right">7 - 7</td><td align="right">(+63)</td></tr>
<tr><td width="200"><img src="img/Flags/Thailand.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Thailand">Thailand</td><td align="right">4 - 10</td><td align="right">(-169)</td></tr>
<tr><td width="200"><img src="img/Flags/New Zealand.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=New Zealand">New Zealand</td><td align="right">3 - 11</td><td align="right">(-157)</td></tr>
<tr><td width="200"><img src="img/Flags/Puerto Rico.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Puerto Rico">Puerto Rico</td><td align="right">0 - 14</td><td align="right">(-588)</td></tr>
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
CASE 99: echo "<b>",$langmark1539,"</b><br/><br/>"; $snif=99; $type=2; break;
}
if ($r=='wc') {$type=3;} else {$type=1;}
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
$groups = mysql_query("SELECT `matchid`, `home_name` , `away_name` , `crowd1` , `time` FROM `nt_matches` WHERE home_score=0 AND `type` =2 ORDER BY `time` ASC, home_name ASC") or die(mysql_error());
$gs=0;
$stev=0; $stev = mysql_num_rows($groups);
if ($stev==0) {echo "<tr><td colspan=\"4\"><i>Currently there are no NT friendly matches scheduled. This is most likely due to ongoing <a href=\"nationalteams.php\">World Cup </a> matches</i>.</td></tr>";}
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
$grumM = "SELECT country FROM countries WHERE " . $ztring;
$vijav = mysql_query($grumM) or die(mysql_error());
$vijavN = mysql_num_rows($vijav);
if ($vijavN>0) {echo "<tr><td colspan=\"4\"><hr/><b>Available countries:</b>";}
$grb=0; while ($grb < $vijavN) {echo "<br/>",mysql_result($vijav,$grb,"country"); $grb++;}
echo "<hr/></td></tr>";
}

echo "<tr><td colspan=\"4\"><br/></td></tr>";
echo "<tr><td colspan=\"4\"><u>",$langmark234,"</u></td></tr>";
$groups = mysql_query("SELECT `matchid`, `home_name`, `away_name`, `home_score`, `away_score`, `time` FROM `nt_matches` WHERE `home_score` >0 AND lid_round=0 AND `type` =2 AND season >= '$default_season'-1 ORDER BY `time` DESC, home_name ASC") or die(mysql_error());
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