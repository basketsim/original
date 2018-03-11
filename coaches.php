<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)) {$lang = mysql_result ($compare,0,"lang");} else {die(include 'basketsim.php');}

$sort=$_GET['sort'];
if (!$sort) {$sort='price1';}
SWITCH ($sort) {
CASE 'st1': $query = "SELECT id, name, surname, wage, country, workrate, experience, quality, price, motiv FROM players WHERE age < 61 AND experience < 122 AND club=0 AND coach=1 ORDER BY workrate ASC"; break;
CASE 'st2': $query = "SELECT id, name, surname, wage, country, workrate, experience, quality, price, motiv FROM players WHERE age < 61 AND experience < 122 AND club=0 AND coach=1 ORDER BY workrate DESC"; break;
CASE 'yt1': $query = "SELECT id, name, surname, wage, country, workrate, experience, quality, price, motiv FROM players WHERE age < 61 AND experience < 122 AND club=0 AND coach=1 ORDER BY `workrate`/10 + `experience`/6 +2 * (`quality`-40) ASC"; break;
CASE 'yt2': $query = "SELECT id, name, surname, wage, country, workrate, experience, quality, price, motiv FROM players WHERE age < 61 AND experience < 122 AND club=0 AND coach=1 ORDER BY `workrate`/10 + `experience`/6 +2 * (`quality`-40) DESC"; break;
CASE 'workrate1': $query = "SELECT id, name, surname, wage, country, workrate, experience, quality, price, motiv FROM players WHERE age < 61 AND experience < 122 AND club=0 AND coach=1 ORDER BY workrate DESC"; break;
CASE 'workrate2': $query = "SELECT id, name, surname, wage, country, workrate, experience, quality, price, motiv FROM players WHERE age < 61 AND experience < 122 AND club=0 AND coach=1 ORDER BY workrate ASC"; break;
CASE 'experience1': $query = "SELECT id, name, surname, wage, country, workrate, experience, quality, price, motiv FROM players WHERE age < 61 AND experience < 122 AND club=0 AND coach=1 ORDER BY experience DESC"; break;
CASE 'experience2': $query = "SELECT id, name, surname, wage, country, workrate, experience, quality, price, motiv FROM players WHERE age < 61 AND experience < 122 AND club=0 AND coach=1 ORDER BY experience ASC"; break;
CASE 'wwy1': $query = "SELECT id, name, surname, wage, country, workrate, experience, quality, price, motiv FROM players WHERE age < 61 AND experience < 122 AND club=0 AND coach=1 ORDER BY quality DESC"; break;
CASE 'wwy2': $query = "SELECT id, name, surname, wage, country, workrate, experience, quality, price, motiv FROM players WHERE age < 61 AND experience < 122 AND club=0 AND coach=1 ORDER BY quality ASC"; break;
CASE 'wage1': $query = "SELECT id, name, surname, wage, country, workrate, experience, quality, price, motiv FROM players WHERE age < 61 AND experience < 122 AND club=0 AND coach=1 ORDER BY wage DESC"; break;
CASE 'wage2': $query = "SELECT id, name, surname, wage, country, workrate, experience, quality, price, motiv FROM players WHERE age < 61 AND experience < 122 AND club=0 AND coach=1 ORDER BY wage ASC"; break;
CASE 'price1': $query = "SELECT id, name, surname, wage, wage, country, workrate, experience, quality, price, motiv FROM players WHERE age < 61 AND experience < 122 AND club=0 AND coach=1 ORDER BY price DESC"; break;
CASE 'price2': $query = "SELECT id, name, surname, wage, country, workrate, experience, quality, price, motiv FROM players WHERE age < 61 AND experience < 122 AND club=0 AND coach=1 ORDER BY price ASC"; break;
}

if ($userid==1) {
$actr = $_GET['actr'];
$idr = $_GET['idr'];
if ($actr=='ret' AND $idr>0 AND $userid==1) {
mysql_query("UPDATE players SET age=61 WHERE coach=1 and club=0 and id='$idr' LIMIT 1") or die(mysql_error());
header("Location: coaches.php");
}
}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2><?=$langmark139?></h2>
<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="100%">
<b><?=$langmark140?></b> <i>(a new coach is added every 2 hours)</i><b>:</b><br/>
<br/><table cellspacing="0" cellpadding="1" width="100%" border="0">
<tr width="100%">
<td align="left" width="126"></td>
<?php if ($sort=='workrate1') {?><td align="center" width="99"><a href="coaches.php?sort=workrate2" title="Click to sort"><b><?=$langmark129?></b></a></td><?php } else {?><td align="center" width="99"><a href="coaches.php?sort=workrate1" title="Click to sort"><b><?=$langmark129?></b></a></td><?php }?>
<?php if ($sort=='experience1') {?><td align="center" width="99"><a href="coaches.php?sort=experience2" title="Click to sort"><b><?=$langmark130?></b></a></td><?php } else {?><td align="center" width="99"><a href="coaches.php?sort=experience1" title="Click to sort"><b><?=$langmark130?></b></a></td><?php }?>
<?php if ($sort=='wwy1') {?><td align="center" width="95"><a href="coaches.php?sort=wwy2" title="Click to sort"><b>Youth</b></a></td><?php } else {?><td align="center" width="95"><a href="coaches.php?sort=wwy1" title="Click to sort"><b>Youth</b></a></td><?php }?>
<?php if ($sort=='wage1') {?><td align="center" width="48"><a href="coaches.php?sort=wage2" title="Click to sort"><b><?=$langmark118?></b></a></td><?php } else {?>
<td align="center" width="48"><a href="coaches.php?sort=wage1" title="Click to sort"><b><?=$langmark118?></b></a></td><?php }?>
<?php if ($sort=='price1') {?><td align="center" width="61"><a href="coaches.php?sort=price2" title="Click to sort"><b><?=$langmark141?></b></a></td><?php } else {?>
<td align="center" width="61"><a href="coaches.php?sort=price1" title="Click to sort"><b><?=$langmark141?></b></a></td><?php }?>
<?php if ($sort=='st2') {?><td align="center" width="26"><a href="coaches.php?sort=st1" title="ability to develop senior players - click to sort"><b>ST</b></a></td><?php } else {?>
<td align="center" width="26"><a href="coaches.php?sort=st2" title="ability to develop senior players - click to sort"><b>ST</b></a></td><?php }?>
<?php if ($sort=='yt2') {?><td align="center" width="26"><a href="coaches.php?sort=yt1" title="ability to develop youth players - click to sort"><b>YT</b></a></td><?php } else {?>
<td align="center" width="26"><a href="coaches.php?sort=yt2" title="ability to develop youth players - click to sort"><b>YT</b></a></td><?php }?>
</tr>
<?php
$result = mysql_query($query);
while ($i = mysql_fetch_array($result)) {
$id=$i["id"];
$name=$i[name];
$surname=$i[surname];
$wage=$i[wage];
$country=$i[country];
$workrate=$i[workrate];
$experience=$i[experience];
$hskill=$i[quality];
$price=$i[price];
$motiv=$i[motiv];

$YT = 100 * ($workrate/10 + $experience/6 + 2*($hskill-40)) / 68;
if ($YT > 100) {$YT=100;}
if ($workrate > 121) {$tempwr = 121;} else {$tempwr=$workrate;}
if ($motiv > 99.99) {$ST = 100 * $tempwr / 121;} else {$ST = (100 * $tempwr * $motiv/100) / 121;}

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
elseif ($workrate > 112 AND $workrate < 121) {$workrate_dspl = $langmark109; }
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
elseif ($experience > 112 AND $experience < 121) {$experience_dspl = $langmark109; }
else $experience_dspl = $langmark110;

$vrst=$vrst+1;
if($vrst % 2) {$colorc = '#D3E0EA';} else {$colorc = '#FFFFFF';}
?>
<tr width="100%" bgcolor="<?=$colorc?>">
<td align="left" width="126"><a href="coach.php?coachid=<?=$id?>"><?=$name," ",$surname?></a><?php if ($userid==3147){echo "<a href=\"coaches.php?actr=ret&idr=".$id."\">&nbsp;</a>";}?></td>
<td align="center" width="99"><?=$workrate_dspl?></td>
<td align="center" width="99"><?=$experience_dspl?></td>
<td align="center" width="95">
<?php
SWITCH (TRUE) {
CASE ($hskill < 43): echo $langmark096; break;
CASE ($hskill > 42 && $hskill < 46): echo $langmark098; break;
CASE ($hskill > 45 && $hskill < 49): echo $langmark100; break;
CASE ($hskill > 48 && $hskill < 52): echo $langmark102; break;
CASE ($hskill > 51 && $hskill < 55): echo $langmark104; break;
CASE ($hskill > 54 && $hskill < 58): echo $langmark106; break;
CASE ($hskill > 57): echo $langmark108; break;
}
?>
</td><td align="center" width="48"><?=number_format($wage, 0, ',', '.')?></td>
</td><td align="center" width="61"><?=number_format($price, 0, ',', '.')?></td>
<td align="center" width="26"><?=round($ST)?></td><td align="center" width="26"><?php if(round($YT)>74){echo round($YT);} else {echo "-";}?></td>
</tr>
<?php
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