<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$comparepasss = mysql_query("SELECT lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($comparepasss)==1) {$lang = mysql_result ($comparepasss,0);} else {die(include 'basketsim.php');}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2>GIVE SUPPORTER</h2>

<table border="0" cellspacing="10" cellpadding="10" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="100%">




s profila ali s tekmovanja trojk redirekt semle
tu imaš prikaz koliko dni suporterja imaš
nato lahko določeno število dni (če jih imaš) doniraš na tekmovanje trojk ali pa drugemu uporabniku (ki ga prej poiščeš ali pa pri donaciji natančno izpiše kdo je)
prisoten je tudi link na nabavo supporterja

če uporabnik hoče donirat za trojke
- pogledam ali je aktivno tekmovanje
- če je aktivno mu izpišem da ni mogoče in da naj kasneje
- če ni aktivno štartam tekmovanje avtomatsko
- poberem mu supporterja
- to nujno zapišem!

če uporabnik da drugemu
- preverim če ima
- dam drugemu
- mu odtrgam
- to nujno zabeležim!

preverim supp za litla, mrki, bobi, jaz

kaj če klikne gor nesuporter?
- ga redirectam
- mu pojasnim
- mu dam link za nakup

</td>
</tr>
</table>
<img src="img/bbs.jpg" alt="" border="0">
</div>
</div>
</body>
</html>