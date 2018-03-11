<?php
$coexpand=14;
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}
$swc = $_GET['swc'];
if (!$swc) {$swc=99;}
$getuser=mysql_query("SELECT lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1");
if (mysql_num_rows($getuser)) {$lang = mysql_result ($getuser,0,"lang");} else {die(include 'basketsim.php');}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2><?=$langmark1446?></h2>

<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="100%">
<?php
if ($swc==1) {echo "<b>WC 1</b> | <a href=\"worldcup.php?swc=2\">WC 2</a> | <a href=\"worldcup.php?swc=3\">WC 3</a> | <a href=\"worldcup.php?swc=4\">WC 4</a> | <a href=\"worldcup.php?swc=5\">WC 5</a> | <a href=\"worldcup.php?swc=6\">WC 6</a> | <a href=\"worldcup.php?swc=7\">WC 7</a> | <a href=\"worldcup.php?swc=8\">WC 8</a> | <a href=\"worldcup.php?swc=9\">WC 9</a> | <a href=\"worldcup.php?swc=10\">WC 10</a>";}
elseif ($swc==2) {echo "<a href=\"worldcup.php?swc=1\">WC 1</a> | <b>WC 2</b> | <a href=\"worldcup.php?swc=3\">WC 3</a> | <a href=\"worldcup.php?swc=4\">WC 4</a> | <a href=\"worldcup.php?swc=5\">WC 5</a> | <a href=\"worldcup.php?swc=6\">WC 6</a> | <a href=\"worldcup.php?swc=7\">WC 7</a> | <a href=\"worldcup.php?swc=8\">WC 8</a> | <a href=\"worldcup.php?swc=9\">WC 9</a> | <a href=\"worldcup.php?swc=10\">WC 10</a>";}
elseif ($swc==3) {echo "<a href=\"worldcup.php?swc=1\">WC 1</a> | <a href=\"worldcup.php?swc=2\">WC 2</a> | <b>WC 3</b> | <a href=\"worldcup.php?swc=4\">WC 4</a> | <a href=\"worldcup.php?swc=5\">WC 5</a> | <a href=\"worldcup.php?swc=6\">WC 6</a> | <a href=\"worldcup.php?swc=7\">WC 7</a> | <a href=\"worldcup.php?swc=8\">WC 8</a> | <a href=\"worldcup.php?swc=9\">WC 9</a> | <a href=\"worldcup.php?swc=10\">WC 10</a>";}
elseif ($swc==4) {echo "<a href=\"worldcup.php?swc=1\">WC 1</a> | <a href=\"worldcup.php?swc=2\">WC 2</a> | <a href=\"worldcup.php?swc=3\">WC 3</a> | <b>WC 4</b> | <a href=\"worldcup.php?swc=5\">WC 5</a> | <a href=\"worldcup.php?swc=6\">WC 6</a> | <a href=\"worldcup.php?swc=7\">WC 7</a> | <a href=\"worldcup.php?swc=8\">WC 8</a> | <a href=\"worldcup.php?swc=9\">WC 9</a> | <a href=\"worldcup.php?swc=10\">WC 10</a>";}
elseif ($swc==5) {echo "<a href=\"worldcup.php?swc=1\">WC 1</a> | <a href=\"worldcup.php?swc=2\">WC 2</a> | <a href=\"worldcup.php?swc=3\">WC 3</a> | <a href=\"worldcup.php?swc=4\">WC 4</a> | <b>WC 5</b> | <a href=\"worldcup.php?swc=6\">WC 6</a> | <a href=\"worldcup.php?swc=7\">WC 7</a> | <a href=\"worldcup.php?swc=8\">WC 8</a> | <a href=\"worldcup.php?swc=9\">WC 9</a> | <a href=\"worldcup.php?swc=10\">WC 10</a>";}
elseif ($swc==6) {echo "<a href=\"worldcup.php?swc=1\">WC 1</a> | <a href=\"worldcup.php?swc=2\">WC 2</a> | <a href=\"worldcup.php?swc=3\">WC 3</a> | <a href=\"worldcup.php?swc=4\">WC 4</a> | <a href=\"worldcup.php?swc=5\">WC 5</a> | <b>WC 6</b> | <a href=\"worldcup.php?swc=7\">WC 7</a> | <a href=\"worldcup.php?swc=8\">WC 8</a> | <a href=\"worldcup.php?swc=9\">WC 9</a> | <a href=\"worldcup.php?swc=10\">WC 10</a>";}
elseif ($swc==7) {echo "<a href=\"worldcup.php?swc=1\">WC 1</a> | <a href=\"worldcup.php?swc=2\">WC 2</a> | <a href=\"worldcup.php?swc=3\">WC 3</a> | <a href=\"worldcup.php?swc=4\">WC 4</a> | <a href=\"worldcup.php?swc=5\">WC 5</a> | <a href=\"worldcup.php?swc=6\">WC 6</a> | <b>WC 7</b> | <a href=\"worldcup.php?swc=8\">WC 8</a> | <a href=\"worldcup.php?swc=9\">WC 9</a> | <a href=\"worldcup.php?swc=10\">WC 10</a>";}
elseif ($swc==8) {echo "<a href=\"worldcup.php?swc=1\">WC 1</a> | <a href=\"worldcup.php?swc=2\">WC 2</a> | <a href=\"worldcup.php?swc=3\">WC 3</a> | <a href=\"worldcup.php?swc=4\">WC 4</a> | <a href=\"worldcup.php?swc=5\">WC 5</a> | <a href=\"worldcup.php?swc=6\">WC 6</a> | <a href=\"worldcup.php?swc=7\">WC 7</a> | <b>WC 8</b> | <a href=\"worldcup.php?swc=9\">WC 9</a> | <a href=\"worldcup.php?swc=10\">WC 10</a>";}
elseif ($swc==9) {echo "<a href=\"worldcup.php?swc=1\">WC 1</a> | <a href=\"worldcup.php?swc=2\">WC 2</a> | <a href=\"worldcup.php?swc=3\">WC 3</a> | <a href=\"worldcup.php?swc=4\">WC 4</a> | <a href=\"worldcup.php?swc=5\">WC 5</a> | <a href=\"worldcup.php?swc=6\">WC 6</a> | <a href=\"worldcup.php?swc=7\">WC 7</a> | <a href=\"worldcup.php?swc=8\">WC 8</a> | <b>WC 9</b> | <a href=\"worldcup.php?swc=10\">WC 10</a>";}
else {echo "<a href=\"worldcup.php?swc=1\">WC 1</a> | <a href=\"worldcup.php?swc=2\">WC 2</a> | <a href=\"worldcup.php?swc=3\">WC 3</a> | <a href=\"worldcup.php?swc=4\">WC 4</a> | <a href=\"worldcup.php?swc=5\">WC 5</a> | <a href=\"worldcup.php?swc=6\">WC 6</a> | <a href=\"worldcup.php?swc=7\">WC 7</a> | <a href=\"worldcup.php?swc=8\">WC 8</a> | <a href=\"worldcup.php?swc=9\">WC 9</a> | <b>WC 10</b>";}
?>
</td></tr></table>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="50%">

<?php
if ($swc==1) {
?>

<b><?=$langmark1447?></b><br/>

<br/><span style="background-image:url(/img/12gold.gif); background-repeat: no-repeat;">&nbsp;1&nbsp;</span> <a href="nationalteams.php?country=Croatia" class="greenhilite">Croatia</a> (maxell)
<br/><span style="background-image:url(/img/12silver.gif); background-repeat: no-repeat;">&nbsp;2&nbsp;</span> <a href="nationalteams.php?country=Bosnia" class="greenhilite">Bosnia and Herzegovina</a> (<a href="club.php?clubid=7849">LA-mikiforov</a>)
<br/><span style="background-image:url(/img/12bronze.gif); background-repeat: no-repeat;">&nbsp;3&nbsp;</span> <a href="nationalteams.php?country=Slovenia" class="greenhilite">Slovenia</a> (<a href="club.php?clubid=3011">Mrki</a>)
<br/>&nbsp;4. <a href="nationalteams.php?country=Poland" class="greenhilite">Poland</a> (<a href="club.php?clubid=2023">Notch</a>)
<br/>&nbsp;5. <a href="nationalteams.php?country=Spain" class="greenhilite">Spain</a> (<a href="club.php?clubid=4317">frodo_bolson</a>)
<br/>&nbsp;6. <a href="nationalteams.php?country=Latvia" class="greenhilite">Latvia</a> (Scrolllock)
<br/>&nbsp;7. <a href="nationalteams.php?country=Lithuania" class="greenhilite">Lithuania</a> (tarekas)
<br/>&nbsp;8. <a href="nationalteams.php?country=France" class="greenhilite">France</a> (<a href="club.php?clubid=743">bamb</a>)
<br/>&nbsp;9. <a href="nationalteams.php?country=Estonia" class="greenhilite">Estonia</a> (<a href="club.php?clubid=6911">Tony</a>)
<br/>&nbsp;10. <a href="nationalteams.php?country=Serbia" class="greenhilite">Serbia</a> (<a href="club.php?clubid=278">zcurcic</a>)
<br/>&nbsp;11. <a href="nationalteams.php?country=Israel" class="greenhilite">Israel</a> (<a href="club.php?clubid=1071">Laster</a>)
<br/>&nbsp;12. <a href="nationalteams.php?country=Belgium" class="greenhilite">Belgium</a> (<a href="club.php?clubid=7042">spiroumika</a>)
<br/>&nbsp;13. <a href="nationalteams.php?country=Germany" class="greenhilite">Germany</a> (DerHerTheiner)
<br/>&nbsp;14. <a href="nationalteams.php?country=Italy" class="greenhilite">Italy</a> (<a href="club.php?clubid=129445">atorobot</a>)
<br/>&nbsp;15. <a href="nationalteams.php?country=USA" class="greenhilite">USA</a> (Carlos_87)
<br/>&nbsp;16. <a href="nationalteams.php?country=Romania" class="greenhilite">Romania</a> (paopao)


</td><td class="border" width="50%">

<b><?=$langmark1448?></b><br/><br/>

<?=$langmark1453?>: <a href="league.php?country=Lithuania">Lithuania</a><br/>
<?=$langmark1449?>: 35<br/>
<?=$langmark1450?>: 190<br/>
<?=$langmark1451?>: 2.904.005<br/>
<?=$langmark1452?>: 15.284<br/>


<br/><b><?=$langmark1454?></b><br/><br/>

PG: <a href="player.php?playerid=160983">Wojciech Czamanski</a> (Poland)<br/>
SG: <a href="player.php?playerid=571281">Nezir Rendulić</a> (Bosnia and Herzegovina)<br/>
SF: <a href="player.php?playerid=570148">Joco Šalić</a> (Croatia)<br/>
PF: <a href="player.php?playerid=570753">Stojan Gartner</a> (Slovenia)<br/>
C: <a href="player.php?playerid=955105">Emilijan Kolar</a> (Croatia)<br/>

<br/><?=$langmark1455?>: <a href="player.php?playerid=570148">Joco Šalić</a> (Croatia)
<br/><?=$langmark1456?>: <a href="player.php?playerid=570148">Joco Šalić</a> (Croatia)
</td>
</tr>
</table>

<table cellspacing="9" cellpadding="9" border="0" width="100%">
<tr bgcolor="white">
<td class="border" bgcolor="white" width="50%" valign="top">

<b><?=$langmark1457?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Croatia">Croatia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=683">104&nbsp;:&nbsp;85</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Bosnia">BIH</a>&nbsp;<img src="img/Flags/Bosnia.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1458?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovenia">Slovenia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=682">101&nbsp;:&nbsp;99</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Poland">Poland</a>&nbsp;<img src="img/Flags/Poland.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1459?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovenia">Slovenia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=667">77&nbsp;:&nbsp;87</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Croatia">Croatia</a>&nbsp;<img src="img/Flags/Croatia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Poland">Poland</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=668">71&nbsp;:&nbsp;80</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Bosnia">BIH</a>&nbsp;<img src="img/Flags/Bosnia.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1460?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovenia">Slovenia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=650">94 : 93</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Spain">Spain</a>&nbsp;<img src="img/Flags/Spain.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Lithuania">Lithuania</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=651">78 : 83</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Croatia">Croatia</a>&nbsp;<img src="img/Flags/Croatia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Poland">Poland</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=652">101&nbsp;:&nbsp;91</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=France">France</a>&nbsp;<img src="img/Flags/France.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Latvia">Latvia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=653">88 : 91</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Bosnia and Herzegovina">BIH</a>&nbsp;<img src="img/Flags/Bosnia.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1461?></b><br/>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP E</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovenia">Slovenia</td><td align="right">5 - 0</td><td align="right">(+74)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Poland">Poland</td><td align="right">3 - 2</td><td align="right">(-2)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Croatia">Croatia</td><td align="right">2 - 3</td><td align="right">(+6)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Bosnia and Herzegovina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bosnia and Herzegovina">Bosnia and Herzegovina</td><td align="right">2 - 3</td><td align="right">(-5)</td></tr>
<tr><td width="200"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia">Estonia</td><td align="right">2 - 3</td><td align="right">(-36)</td></tr>
<tr><td width="200"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Belgium">Belgium</td><td align="right">1 - 4</td><td align="right">(-37)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP F</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Latvia">Latvia</td><td align="right">4 - 1</td><td align="right">(+69)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Lithuania">Lithuania</td><td align="right">3 - 2</td><td align="right">(+42)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=France">France</td><td align="right">2 - 3</td><td align="right">(+8)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Spain">Spain</td><td align="right">2 - 3</td><td align="right">(-16)</td></tr>
<tr><td width="200"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Serbia">Serbia</td><td align="right">2 - 3</td><td align="right">(-45)</td></tr>
<tr><td width="200"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Israel">Israel</td><td align="right">2 - 3</td><td align="right">(-58)</td></tr>
</table>

<br/><b><?=$langmark1462?></b><br/>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovenia">Slovenia</td><td align="right">2 - 1</td><td align="right">(+30)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Poland">Poland</td><td align="right">2 - 1</td><td align="right">(-23)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Belgium">Belgium</td><td align="right">1 - 2</td><td align="right">(-1)</td></tr>
<tr><td width="200"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Italy">Italy</td><td align="right">1 - 2</td><td align="right">(-6)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia">Estonia</td><td align="right">3 - 0</td><td align="right">(+30)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Bosnia and Herzegovina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bosnia and Herzegovina">Bosnia and Herzegovina</td><td align="right">2 - 1</td><td align="right">(+28)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Croatia">Croatia</td><td align="right">1 - 2</td><td align="right">(+4)</td></tr>
<tr><td width="200"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Romania">Romania</td><td align="right">0 - 3</td><td align="right">(-62)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Lithuania">Lithuania</td><td align="right">3 - 0</td><td align="right">(+58)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Latvia">Latvia</td><td align="right">2 - 1</td><td align="right">(+20)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Israel">Israel</td><td align="right">1 - 2</td><td align="right">(-48)</td></tr>
<tr><td width="200"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=USA">USA</td><td align="right">0 - 3</td><td align="right">(-30)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Spain">Spain</td><td align="right">2 - 1</td><td align="right">(+4)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Serbia">Serbia</td><td align="right">2 - 1</td><td align="right">(-11)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=France">France</td><td align="right">1 - 2</td><td align="right">(+6)</td></tr>
<tr><td width="200"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Germany">Germany</td><td align="right">1 - 2</td><td align="right">(+1)</td></tr>
</table>

</td>
<td width="50%" valign="top" class="border" bgcolor="white">

<b><?=$langmark1463?></b><br/>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovenia">Slovenia</td><td align="right">7 - 1</td><td align="right">(+138)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Serbia">Serbia</td><td align="right">5 - 3</td><td align="right">(-16)</td></tr>
<tr><td width="200"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bulgaria">Bulgaria</td><td align="right">4 - 4</td><td align="right">(+14)</td></tr>
<tr><td width="200"><img src="img/Flags/Chile.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Chile">Chile</td><td align="right">4 - 4</td><td align="right">(-2)</td></tr>
<tr><td width="200"><img src="img/Flags/Netherlands.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Netherlands">Netherlands</td><td align="right">0 - 8</td><td align="right">(-134)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Lithuania">Lithuania</td><td align="right">6 - 2</td><td align="right">(+145)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Italy">Italy</td><td align="right">6 - 2</td><td align="right">(+60)</td></tr>
<tr><td width="200"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovakia">Slovakia</td><td align="right">5 - 3</td><td align="right">(-2)</td></tr>
<tr><td width="200"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Finland">Finland</td><td align="right">3 - 5</td><td align="right">(-24)</td></tr>
<tr><td width="200"><img src="img/Flags/Brazil.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Brazil">Brazil</td><td align="right">0 - 8</td><td align="right">(-179)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia">Estonia</td><td align="right">7 - 1</td><td align="right">(+85)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Latvia">Latvia</td><td align="right">5 - 3</td><td align="right">(+45)</td></tr>
<tr><td width="200"><img src="img/Flags/United Kingdom.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=United Kingdom">United Kingdom</td><td align="right">4 - 4</td><td align="right">(-36)</td></tr>
<tr><td width="200"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Portugal">Portugal</td><td align="right">3 - 5</td><td align="right">(-12)</td></tr>
<tr><td width="200"><img src="img/Flags/Denmark.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Denmark">Denmark</td><td align="right">1 - 7</td><td align="right">(-82)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=USA">USA</td><td align="right">7 - 1</td><td align="right">(+79)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Croatia">Croatia</td><td align="right">6 - 2</td><td align="right">(+44)</td></tr>
<tr><td width="200"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Greece">Greece</td><td align="right">4 - 4</td><td align="right">(+19)</td></tr>
<tr><td width="200"><img src="img/Flags/China.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=China">China</td><td align="right">3 - 5</td><td align="right">(+34)</td></tr>
<tr><td width="200"><img src="img/Flags/Czech Republic.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Czech Republic">Czech Republic</td><td align="right">0 - 8</td><td align="right">(-176)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP E</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Poland">Poland</td><td align="right">5 - 3</td><td align="right">(+69)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=France">France</td><td align="right">5 - 3</td><td align="right">(+69)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Israel">Israel</td><td align="right">5 - 3</td><td align="right">(+3)</td></tr>
<tr><td width="200"><img src="img/Flags/Switzerland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Switzerland">Switzerland</td><td align="right">3 - 5</td><td align="right">(-62)</td></tr>
<tr><td width="200"><img src="img/Flags/Hungary.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Hungary">Hungary</td><td align="right">2 - 6</td><td align="right">(-79)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP F</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Germany">Germany</td><td align="right">7 - 1</td><td align="right">(+80)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Romania">Romania</td><td align="right">4 - 4</td><td align="right">(+41)</td></tr>
<tr><td width="200"><img src="img/Flags/Cyprus.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Cyprus">Cyprus</td><td align="right">4 - 4</td><td align="right">(+21)</td></tr>
<tr><td width="200"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Argentina">Argentina</td><td align="right">3 - 5</td><td align="right">(-34)</td></tr>
<tr><td width="200"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Turkey">Turkey</td><td align="right">2 - 6</td><td align="right">(-108)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP G</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Bosnia and Herzegovina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bosnia and Herzegovina">Bosnia and Herzegovina</td><td align="right">6 - 2</td><td align="right">(+91)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Spain">Spain</td><td align="right">6 - 2</td><td align="right">(+78)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Belgium">Belgium</td><td align="right">5 - 3</td><td align="right">(+60)</td></tr>
<tr><td width="200"><img src="img/Flags/Sweden.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Sweden">Sweden</td><td align="right">2 - 6</td><td align="right">(-138)</td></tr>
<tr><td width="200"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Australia">Australia</td><td align="right">1 - 7</td><td align="right">(-91)</td></tr>
</table>

<?php
 } elseif ($swc==2) {
?>

<b>2nd World Cup - Final Standings</b><br/>

<br/><span style="background-image:url(/img/12gold.gif); background-repeat: no-repeat;">&nbsp;1&nbsp;</span> <a href="nationalteams.php?country=Estonia" class="greenhilite">Estonia</a> (<a href="club.php?clubid=9119">MOD-starte</a>)
<br/><span style="background-image:url(/img/12silver.gif); background-repeat: no-repeat;">&nbsp;2&nbsp;</span> <a href="nationalteams.php?country=Latvia" class="greenhilite">Latvia</a> (Namejs)
<br/><span style="background-image:url(/img/12bronze.gif); background-repeat: no-repeat;">&nbsp;3&nbsp;</span> <a href="nationalteams.php?country=France" class="greenhilite">France</a> (<a href="club.php?clubid=10370">MiraJ</a>)
<br/>&nbsp;4. <a href="nationalteams.php?country=Italy" class="greenhilite">Italy</a> (<a href="club.php?clubid=1411">magoandrea</a>)
<br/>&nbsp;5. <a href="nationalteams.php?country=Belgium" class="greenhilite">Belgium</a> (<a href="club.php?clubid=7042">spiroumika</a>)
<br/>&nbsp;6. <a href="nationalteams.php?country=Poland" class="greenhilite">Poland</a> (<a href="club.php?clubid=1881">ZenekKonevka</a>)
<br/>&nbsp;7. <a href="nationalteams.php?country=Israel" class="greenhilite">Israel</a> (<a href="club.php?clubid=1071">Laster</a>)
<br/>&nbsp;8. <a href="nationalteams.php?country=Bosnia" class="greenhilite">Bosnia and Herzegovina</a> (<a href="club.php?clubid=7849">LA-mikiforov</a>)
<br/>&nbsp;9. <a href="nationalteams.php?country=Germany" class="greenhilite">Germany</a> (<a href="club.php?clubid=5757">Pomaxx</a>)
<br/>&nbsp;10. <a href="nationalteams.php?country=USA" class="greenhilite">USA</a> (Carlos_87)
<br/>&nbsp;11. <a href="nationalteams.php?country=Greece" class="greenhilite">Greece</a> (<a href="club.php?clubid=8814">theobasketsim</a>)
<br/>&nbsp;12. <a href="nationalteams.php?country=Portugal" class="greenhilite">Portugal</a> (<a href="club.php?clubid=1026">SubTekk</a>)
<br/>&nbsp;13. <a href="nationalteams.php?country=Serbia" class="greenhilite">Serbia</a> (<a href="club.php?clubid=7498">Boca</a>)
<br/>&nbsp;14. <a href="nationalteams.php?country=Romania" class="greenhilite">Romania</a> (<a href="club.php?clubid=567">tudoran</a>)
<br/>&nbsp;15. <a href="nationalteams.php?country=Turkey" class="greenhilite">Turkey</a> (<a href="club.php?clubid=5395">khalidelamin</a>)
<br/>&nbsp;16. <a href="nationalteams.php?country=Slovenia" class="greenhilite">Slovenia</a> (<a href="club.php?clubid=10109">tango</a>)
<br/>&nbsp;17. <a href="nationalteams.php?country=Chile" class="greenhilite">Chile</a> (tajo)
<br/>&nbsp;18. <a href="nationalteams.php?country=Lithuania" class="greenhilite">Lithuania</a> (<a href="club.php?clubid=10005">Marius</a>)
<br/>&nbsp;19. <a href="nationalteams.php?country=Hungary" class="greenhilite">Hungary</a> (<a href="club.php?clubid=7707">Mancini_</a>)
<br/>&nbsp;20. <a href="nationalteams.php?country=Finland" class="greenhilite">Finland</a> (<a href="club.php?clubid=5401">Bremen</a>)
<br/>&nbsp;21. <a href="nationalteams.php?country=Croatia" class="greenhilite">Croatia</a> (maxell)
<br/>&nbsp;22. <a href="nationalteams.php?country=Bulgaria" class="greenhilite">Bulgaria</a> (<a href="club.php?clubid=12123">Bus73r</a>)
<br/>&nbsp;23. <a href="nationalteams.php?country=Netherlands" class="greenhilite">Netherlands</a> (Toolman)
<br/>&nbsp;24. <a href="nationalteams.php?country=Slovakia" class="greenhilite">Slovakia</a> (<a href="club.php?clubid=10644">immot</a>)

</td><td class="border" width="50%">

<b><?=$langmark1448?></b><br/><br/>

<?=$langmark1453?>: <a href="league.php?country=USA">USA</a><br/>
<?=$langmark1449?>: 48<br/>
<?=$langmark1450?>: 316<br/>
<?=$langmark1451?>: 5.942.466<br/>
<?=$langmark1452?>: 18.805<br/>


<br/><b><?=$langmark1454?></b><br/><br/>

PG: <a href="player.php?playerid=570117">Sason Joffe</a> (Israel)<br/>
SG: <a href="player.php?playerid=310631"> Aasar Sepmann</a> (Estonia)<br/>
SF: <a href="player.php?playerid=153876">Guido De Flaviiis</a> (Italy)<br/>
PF: <a href="player.php?playerid=234818">Eduards Akurāters</a> (Latvia)<br/>
C: <a href="player.php?playerid=225653">Eduard Raud</a> (Estonia)<br/>

<br/><?=$langmark1455?>:&nbsp;<a href="player.php?playerid=310631">Aasar Sepmann</a>&nbsp;(Estonia)
<br/><?=$langmark1456?>: <a href="player.php?playerid=657968">Koit Runnel</a> (Estonia)
</td>
</tr>
</table>

<table cellspacing="9" cellpadding="9" border="0" width="100%">
<tr bgcolor="white">
<td class="border" bgcolor="white" width="50%" valign="top">

<b><?=$langmark1457?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Latvia">Latvia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=2265">98&nbsp;:&nbsp;112</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Estonia">Estonia</a>&nbsp;<img src="img/Flags/Estonia.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1458?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=France">France</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=2264">99&nbsp;:&nbsp;96</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Italy">Italy</a>&nbsp;<img src="img/Flags/Italy.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1459?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Latvia">Latvia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=2245">104&nbsp;:&nbsp;91</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=France">France</a>&nbsp;<img src="img/Flags/France.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Italy">Italy</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=2246">92&nbsp;:&nbsp;93</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Estonia">Estonia</a>&nbsp;<img src="img/Flags/Estonia.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1460?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Bosnia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bosnia">BiH</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=2225">74&nbsp;:&nbsp;98</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Latvia">Latvia</a>&nbsp;<img src="img/Flags/Latvia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=France">France</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=2226">96&nbsp;:&nbsp;93</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Belgium">Belgium</a>&nbsp;<img src="img/Flags/Belgium.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Poland">Poland</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=2227">83&nbsp;:&nbsp;89</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Italy">Italy</a>&nbsp;<img src="img/Flags/Italy.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia">Estonia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=2228">96&nbsp;:&nbsp;87</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Israel">Israel</a>&nbsp;<img src="img/Flags/Israel.png" border="0" alt=""></td></tr>
</table>

<br/><b>Round of 16</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Turkey">Turkey</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=2205">88&nbsp;:&nbsp;114</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Bosnia">BiH</a>&nbsp;<img src="img/Flags/Bosnia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Latvia">Latvia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=2206">94&nbsp;:&nbsp;86</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Portugal">Portugal</a>&nbsp;<img src="img/Flags/Portugal.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Serbia">Serbia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=2207">71&nbsp;:&nbsp;82</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=France">France</a>&nbsp;<img src="img/Flags/France.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Belgium">Belgium</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=2208">91&nbsp;:&nbsp;86</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Greece">Greece</a>&nbsp;<img src="img/Flags/Greece.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Poland">Poland</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=2209">103&nbsp;:&nbsp;102</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Germany">Germany</a>&nbsp;<img src="img/Flags/Germany.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Italy">Italy</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=2210">94&nbsp;:&nbsp;93</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=USA">USA</a>&nbsp;<img src="img/Flags/USA.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia">Estonia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=2211">114&nbsp;:&nbsp;91</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Romania">Romania</a>&nbsp;<img src="img/Flags/Romania.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Israel">Israel</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=2212">104&nbsp;:&nbsp;75</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Slovenia">Slovenia</a>&nbsp;<img src="img/Flags/Slovenia.png" border="0" alt=""></td></tr>
</table>


<br/><b><?=$langmark1462?></b><br/>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Turkey">Turkey</td><td align="right">3 - 2</td><td align="right">(+21)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Italy">Italy</td><td align="right">3 - 2</td><td align="right">(+17)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovenia">Slovenia</td><td align="right">3 - 2</td><td align="right">(-1)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=France">France</td><td align="right">3 - 2</td><td align="right">(-1)</td></tr>
<tr><td width="200"><img src="img/Flags/Chile.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Chile">Chile</td><td align="right">2 - 3</td><td align="right">(-9)</td></tr>
<tr><td width="200"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Croatia">Croatia</td><td align="right">1 - 4</td><td align="right">(-27)</td></tr>
</table>

<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b></td></tr></table>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Serbia">Serbia</td><td align="right">4 - 1</td><td align="right">(+77)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Israel">Israel</td><td align="right">4 - 1</td><td align="right">(+52)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=USA">USA</td><td align="right">3 - 2</td><td align="right">(+44)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Bosnia and Herzegovina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bosnia and Herzegovina">Bosnia and Herzegovina</td><td align="right">3 - 2</td><td align="right">(+41)</td></tr>
<tr><td width="200"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Finland">Finland</td><td align="right">1 - 4</td><td align="right">(-80)</td></tr>
<tr><td width="200"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovakia">Slovakia</td><td align="right">0 - 5</td><td align="right">(-134)</td></tr>
</table>

<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Poland">Poland</td><td align="right">4 - 1</td><td align="right">(+54)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Latvia">Latvia</td><td align="right">4 - 1</td><td align="right">(+34)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Greece">Greece</td><td align="right">3 - 2</td><td align="right">(+8)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Romania">Romania</td><td align="right">2 - 3</td><td align="right">(+16)</td></tr>
<tr><td width="200"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Lithuania">Lithuania</td><td align="right">2 - 3</td><td align="right">(-48)</td></tr>
<tr><td width="200"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bulgaria">Bulgaria</td><td align="right">0 - 5</td><td align="right">(-64)</td></tr>

</table>

<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia">Estonia</td><td align="right">5 - 0</td><td align="right">(+170)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Belgium">Belgium</td><td align="right">3 - 2</td><td align="right">(+27)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Portugal">Portugal</td><td align="right">3 - 2</td><td align="right">(-40)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Germany">Germany</td><td align="right">2 - 3</td><td align="right">(-16)</td></tr>
<tr><td width="200"><img src="img/Flags/Hungary.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Hungary">Hungary</td><td align="right">2 - 3</td><td align="right">(-61)</td></tr>
<tr><td width="200"><img src="img/Flags/Netherlands.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Netherlands">Netherlands</td><td align="right">0 - 5</td><td align="right">(-80)</td></tr>
</table>


</td>
<td width="50%" valign="top" class="border" bgcolor="white">

<b><?=$langmark1463?></b><br/>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovenia">Slovenia</td><td align="right">9 - 1</td><td align="right">(+203)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Greece">Greece</td><td align="right">9 - 1</td><td align="right">(+117)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Netherlands.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Netherlands">Netherlands</td><td align="right">4 - 6</td><td align="right">(-11)</td></tr>
<tr><td width="200"><img src="img/Flags/Sweden.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Sweden">Sweden</td><td align="right">4 - 6</td><td align="right">(-41)</td></tr>
<tr><td width="200"><img src="img/Flags/Cyprus.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Cyprus">Cyprus</td><td align="right">2 - 8</td><td align="right">(-124)</td></tr>
<tr><td width="200"><img src="img/Flags/Mexico.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Mexico">Mexico</td><td align="right">2 - 8</td><td align="right">(-144)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Israel">Israel</td><td align="right">8 - 2</td><td align="right">(+119)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Croatia">Croatia</td><td align="right">7 - 3</td><td align="right">(+131)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bulgaria">Bulgaria</td><td align="right">6 - 4</td><td align="right">(+31)</td></tr>
<tr><td width="200"><img src="img/Flags/Czech Republic.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Czech Republic">Czech Republic</td><td align="right">5 - 5</td><td align="right">(-40)</td></tr>
<tr><td width="200"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Australia">Australia</td><td align="right">4 - 6</td><td align="right">(-29)</td></tr>
<tr><td width="200"><img src="img/Flags/Austria.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Austria">Austria</td><td align="right">0 - 10</td><td align="right">(-212)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Chile.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Chile">Chile</td><td align="right">9 - 1</td><td align="right">(+130)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Lithuania">Lithuania</td><td align="right">7 - 3</td><td align="right">(+80)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovakia">Slovakia</td><td align="right">6 - 4</td><td align="right">(-13)</td></tr>
<tr><td width="200"><img src="img/Flags/Brazil.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Brazil">Brazil</td><td align="right">4 - 6</td><td align="right">(+6)</td></tr>
<tr><td width="200"><img src="img/Flags/Denmark.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Denmark">Denmark</td><td align="right">3 - 7</td><td align="right">(-16)</td></tr>
<tr><td width="200"><img src="img/Flags/New Zealand.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=New Zealand">New Zealand</td><td align="right">1 - 9</td><td align="right">(-187)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Bosnia and Herzegovina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bosnia and Herzegovina">Bosnia and Herzegovina</td><td align="right">9 - 1</td><td align="right">(+250)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Belgium">Belgium</td><td align="right">9 - 1</td><td align="right">(+147)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Turkey">Turkey</td><td align="right">5 - 5</td><td align="right">(+71)</td></tr>
<tr><td width="200"><img src="img/Flags/China.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=China">China</td><td align="right">5 - 5</td><td align="right">(+17)</td></tr>
<tr><td width="200"><img src="img/Flags/Russia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Russia">Russia</td><td align="right">2 - 8</td><td align="right">(-162)</td></tr>
<tr><td width="200"><img src="img/Flags/Thailand.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Thailand">Thailand</td><td align="right">0 - 10</td><td align="right">(-323)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP E</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Latvia">Latvia</td><td align="right">10 - 0</td><td align="right">(+308)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Hungary.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Hungary">Hungary</td><td align="right">7 - 3</td><td align="right">(+77)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=USA">USA</td><td align="right">6 - 4</td><td align="right">(+67)</td></tr>
<tr><td width="200"><img src="img/Flags/United Kingdom.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=United Kingdom">United Kingdom</td><td align="right">4 - 6</td><td align="right">(-102)</td></tr>
<tr><td width="200"><img src="img/Flags/Canada.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Canada">Canada</td><td align="right">3 - 7</td><td align="right">(-80)</td></tr>
<tr><td width="200"><img src="img/Flags/Colombia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Colombia">Colombia</td><td align="right">0 - 10</td><td align="right">(-270)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP F</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia">Estonia</td><td align="right">10 - 0</td><td align="right">(+317)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Serbia">Serbia</td><td align="right">7 - 3</td><td align="right">(+186)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Italy">Italy</td><td align="right">6 - 4</td><td align="right">(-17)</td></tr>
<tr><td width="200"><img src="img/Flags/Switzerland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Switzerland">Switzerland</td><td align="right">3 - 7</td><td align="right">(-84)</td></tr>
<tr><td width="200"><img src="img/Flags/Uruguay.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Uruguay">Uruguay</td><td align="right">2 - 8</td><td align="right">(-171)</td></tr>
<tr><td width="200"><img src="img/Flags/Venezuela.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Venezuela">Venezuela</td><td align="right">2 - 8</td><td align="right">(-231)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP G</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Poland">Poland</td><td align="right">8 - 2</td><td align="right">(+111)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=France">France</td><td align="right">7 - 3</td><td align="right">(+166)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Portugal">Portugal</td><td align="right">7 - 3</td><td align="right">(+90)</td></tr>
<tr><td width="200"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Argentina">Argentina</td><td align="right">6 - 4</td><td align="right">(+42)</td></tr>
<tr><td width="200"><img src="img/Flags/Philippines.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Philippines">Philippines</td><td align="right">1 - 9</td><td align="right">(-176)</td></tr>
<tr><td width="200"><img src="img/Flags/Albania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Albania">Albania</td><td align="right">1 - 9</td><td align="right">(-233)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP H</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Germany">Germany</td><td align="right">7 - 3</td><td align="right">(+140)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Finland">Finland</td><td align="right">7 - 3</td><td align="right">(+104)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Romania">Romania</td><td align="right">7 - 3</td><td align="right">(+34)</td></tr>
<tr><td width="200"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Spain">Spain</td><td align="right">6 - 4</td><td align="right">(+117)</td></tr>
<tr><td width="200"><img src="img/Flags/FYR Macedonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=FYR Macedonia">FYR Macedonia</td><td align="right">2 - 8</td><td align="right">(-160)</td></tr>
<tr><td width="200"><img src="img/Flags/Malta.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Malta">Malta</td><td align="right">1 - 9</td><td align="right">(-235)</td></tr>
</table>

<?php
 } elseif ($swc==3) {
?>

<b>3rd World Cup - Final Standings</b><br/>

<br/><span style="background-image:url(/img/12gold.gif); background-repeat: no-repeat;">&nbsp;1&nbsp;</span> <a href="nationalteams.php?country=Latvia" class="greenhilite">Latvia</a> (<a href="club.php?clubid=6979">Darkmen</a>)
<br/><span style="background-image:url(/img/12silver.gif); background-repeat: no-repeat;">&nbsp;2&nbsp;</span> <a href="nationalteams.php?country=Belgium" class="greenhilite">Belgium</a> (<a href="club.php?clubid=3907">White_Stripe</a>)
<br/><span style="background-image:url(/img/12bronze.gif); background-repeat: no-repeat;">&nbsp;3&nbsp;</span> <a href="nationalteams.php?country=Chile" class="greenhilite">Chile</a> (pvial)
<br/>&nbsp;4. <a href="nationalteams.php?country=Estonia" class="greenhilite">Estonia</a> (<a href="club.php?clubid=9119">MOD-starte</a>)
<br/>&nbsp;5. <a href="nationalteams.php?country=Spain" class="greenhilite">Spain</a> (<a href="club.php?clubid=35746">Rainman</a>)
<br/>&nbsp;6. <a href="nationalteams.php?country=Italy" class="greenhilite">Italy</a> (<a href="club.php?clubid=26813">rikyb</a>)
<br/>&nbsp;7. <a href="nationalteams.php?country=Germany" class="greenhilite">Germany</a> (<a href="club.php?clubid=5757">Pomaxx</a>)
<br/>&nbsp;8. <a href="nationalteams.php?country=Argentina" class="greenhilite">Argentina</a> (<a href="club.php?clubid=5846">le0nel</a>)
<br/>&nbsp;9. <a href="nationalteams.php?country=Bulgaria" class="greenhilite">Bulgaria</a> (<a href="club.php?clubid=14208">ikset</a>)
<br/>&nbsp;10. <a href="nationalteams.php?country=Poland" class="greenhilite">Poland</a> (<a href="club.php?clubid=1881">ZenekKonevka</a>)
<br/>&nbsp;11. <a href="nationalteams.php?country=Israel" class="greenhilite">Israel</a> (<a href="club.php?clubid=4970">gil123</a>)
<br/>&nbsp;12. <a href="nationalteams.php?country=Bosnia" class="greenhilite">Bosnia and Herzegovina</a> (mikiforov)
<br/>&nbsp;13. <a href="nationalteams.php?country=Portugal" class="greenhilite">Portugal</a> (<a href="club.php?clubid=1026">SubTekk</a>)
<br/>&nbsp;14. <a href="nationalteams.php?country=Slovenia" class="greenhilite">Slovenia</a> (fejstfnt)
<br/>&nbsp;15. <a href="nationalteams.php?country=Serbia" class="greenhilite">Serbia</a> (<a href="club.php?clubid=9562">Dzungla</a>)
<br/>&nbsp;16. <a href="nationalteams.php?country=Australia" class="greenhilite">Australia</a> (<a href="club.php?clubid=10976">JRA_WestyQld2</a>)
<br/>&nbsp;17. <a href="nationalteams.php?country=Hungary" class="greenhilite">Hungary</a> (<a href="club.php?clubid=7707">Mancini_</a>)
<br/>&nbsp;18. <a href="nationalteams.php?country=Finland" class="greenhilite">Finland</a> (<a href="club.php?clubid=5402">MOD-Houston</a>)
<br/>&nbsp;19. <a href="nationalteams.php?country=Lithuania" class="greenhilite">Lithuania</a> (<a href="club.php?clubid=45435">dommaz</a>)
<br/>&nbsp;20. <a href="nationalteams.php?country=Romania" class="greenhilite">Romania</a> (<a href="club.php?clubid=567">tudoran</a>)
<br/>&nbsp;21. <a href="nationalteams.php?country=France" class="greenhilite">France</a> (<a href="club.php?clubid=10370">MiraJ</a>)
<br/>&nbsp;22. <a href="nationalteams.php?country=Turkey" class="greenhilite">Turkey</a> (<a href="club.php?clubid=5395">khalidelamin</a>)
<br/>&nbsp;23. <a href="nationalteams.php?country=Netherlands" class="greenhilite">Netherlands</a> (Toolman)
<br/>&nbsp;24. <a href="nationalteams.php?country=Croatia" class="greenhilite">Croatia</a> (<a href="club.php?clubid=903">Scortek</a>)

</td><td class="border" width="50%">

<b><?=$langmark1448?></b><br/><br/>

<?=$langmark1453?>: <a href="league.php?country=Spain">Spain</a><br/>
<?=$langmark1449?>: 54 <br/>
<?=$langmark1450?>: 346<br/>
<?=$langmark1451?>: 7.815.141<br/>
<?=$langmark1452?>: 22.587<br/>


<br/><b><?=$langmark1454?></b><br/><br/>

PG: <a href="player.php?playerid=570593">U&#291;is Balodis</a> (Latvia)<br/>
SG: <a href="player.php?playerid=342576">Marwan de Duve</a> (Belgium)<br/>
SF: <a href="player.php?playerid=657968">Koit Runnel</a> (Estonia)<br/>
PF: <a href="player.php?playerid=160202">Zenek Ruiz</a> (Chile)<br/>
C: <a href="player.php?playerid=570830">Edv&#299;ns V&#299;tols</a> (Latvia)<br/>

<br/><?=$langmark1455?>: <a href="player.php?playerid=570593">U&#291;is Balodis</a> (Latvia)
<br/><?=$langmark1456?>: <a href="player.php?playerid=570830">Edv&#299;ns V&#299;tols</a> (Latvia)
</td>
</tr>
</table>

<table cellspacing="9" cellpadding="9" border="0" width="100%">
<tr bgcolor="white">
<td class="border" bgcolor="white" width="50%" valign="top">

<b><?=$langmark1457?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Latvia">Latvia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=4121">99&nbsp;:&nbsp;76</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Belgium">Belgium</a>&nbsp;<img src="img/Flags/Belgium.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1458?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia">Estonia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=4122">77&nbsp;:&nbsp;87</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Chile">Chile</a>&nbsp;<img src="img/Flags/Chile.png" border="0" alt=""></td></tr>
</table>


<br/><b><?=$langmark1459?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia">Estonia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=4103"> 85&nbsp;:&nbsp;97</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Latvia">Latvia</a>&nbsp;<img src="img/Flags/Latvia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Chile.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Chile">Chile</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=4104">91&nbsp;:&nbsp;92</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Belgium">Belgium</a>&nbsp;<img src="img/Flags/Belgium.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1460?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia">Estonia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=4086">106&nbsp;:&nbsp;86</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Argentina">Argentina</a>&nbsp;<img src="img/Flags/Argentina.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Spain">Spain</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=4087">109&nbsp;:&nbsp;114</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Latvia">Latvia</a>&nbsp;<img src="img/Flags/Latvia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Italy">Italy</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=4088">93&nbsp;:&nbsp;104</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Chile">Chile</a>&nbsp;<img src="img/Flags/Chile.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Belgium">Belgium</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=4089">103&nbsp;:&nbsp;90</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Germany">Germany</a>&nbsp;<img src="img/Flags/Germany.png" border="0" alt=""></td></tr>
</table>

<br/><b>Round of 16</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia">Estonia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=4048">98&nbsp;:&nbsp;83</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Portugal">Portugal</a>&nbsp;<img src="img/Flags/Portugal.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Bosnia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bosnia">BiH</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=4049">80&nbsp;:&nbsp;94</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Argentina">Argentina</a>&nbsp;<img src="img/Flags/Argentina.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Spain">Spain</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=4050">96&nbsp;:&nbsp;61</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Australia">Australia</a>&nbsp;<img src="img/Flags/Australia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Latvia">Latvia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=4051">124&nbsp;:&nbsp;89</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Serbia">Serbia</a>&nbsp;<img src="img/Flags/Serbia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Italy">Italy</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=4052">82&nbsp;:&nbsp;81</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Bulgaria">Bulgaria</a>&nbsp;<img src="img/Flags/Bulgaria.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Chile.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Chile">Chile</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=4053">102&nbsp;:&nbsp;73</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Slovenia">Slovenia</a>&nbsp;<img src="img/Flags/Slovenia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Belgium">Belgium</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=4054">99&nbsp;:&nbsp;94</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Israel">Israel</a>&nbsp;<img src="img/Flags/Israel.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Germany">Germany</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=4055">100&nbsp;:&nbsp;95</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Poland">Poland</a>&nbsp;<img src="img/Flags/Poland.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1462?></b><br/>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia">Estonia</td><td align="right">4 - 1</td><td align="right">(+102)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Chile.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Chile">Chile</td><td align="right">4 - 1</td><td align="right">(+30)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Poland">Poland</td><td align="right">3 - 2</td><td align="right">(+43)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Australia">Australia</td><td align="right">2 - 3</td><td align="right">(-46)</td></tr>
<tr><td width="200"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Lithuania">Lithuania</td><td align="right">1 - 4</td><td align="right">(-57)</td></tr>
<tr><td width="200"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Turkey">Turkey</td><td align="right">1 - 4</td><td align="right">(-72)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Spain">Spain</td><td align="right">4 - 1</td><td align="right">(+65)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Germany">Germany</td><td align="right">3 - 2</td><td align="right">(+50)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovenia">Slovenia</td><td align="right">3 - 2</td><td align="right">(-2)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Portugal">Portugal</td><td align="right">2 - 3</td><td align="right">(-34)</td></tr>
<tr><td width="200"><img src="img/Flags/Hungary.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Hungary">Hungary</td><td align="right">2 - 3</td><td align="right">(-43)</td></tr>
<tr><td width="200"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=France">France</td><td align="right">1 - 4</td><td align="right">(-36)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Italy">Italy</td><td align="right">4 - 1</td><td align="right">(+82)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Bosnia and Herzegovina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bosnia and Herzegovina">Bosnia and Herzegovina</td><td align="right">4 - 1</td><td align="right">(+31)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Serbia">Serbia</td><td align="right">4 - 1</td><td align="right">(+29)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Israel">Israel</td><td align="right">2 - 3</td><td align="right">(+3)</td></tr>
<tr><td width="200"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Romania">Romania</td><td align="right">1 - 4</td><td align="right">(-68)</td></tr>
<tr><td width="200"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Croatia">Croatia</td><td align="right">0 - 5</td><td align="right">(-77)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Belgium">Belgium</td><td align="right">5 - 0</td><td align="right">(+64)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Latvia">Latvia</td><td align="right">3 - 2</td><td align="right">(+13)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Argentina">Argentina</td><td align="right">3 - 2</td><td align="right">(+1)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bulgaria">Bulgaria</td><td align="right">2 - 3</td><td align="right">(+1)</td></tr>
<tr><td width="200"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Finland">Finland</td><td align="right">1 - 4</td><td align="right">(+1)</td></tr>
<tr><td width="200"><img src="img/Flags/Netherlands.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Netherlands">Netherlands</td><td align="right">1 - 4</td><td align="right">(-80)</td></tr>
</table>

</td>
<td width="50%" valign="top" class="border" bgcolor="white">

<b><?=$langmark1463?></b><br/>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Estonia">Estonia</td><td align="right">10 - 0</td><td align="right">(+212)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Portugal">Portugal</td><td align="right">7 - 3</td><td align="right">(+154)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Romania">Romania</td><td align="right">6 - 4</td><td align="right">(+157)</td></tr>
<tr><td width="200"><img src="img/Flags/Denmark.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Denmark">Denmark</td><td align="right">3 - 7</td><td align="right">(-90)</td></tr>
<tr><td width="200"><img src="img/Flags/Sweden.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Sweden">Sweden</td><td align="right">3 - 7</td><td align="right">(-98)</td></tr>
<tr><td width="200"><img src="img/Flags/South Korea.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=South Korea">South Korea</td><td align="right">1 - 9</td><td align="right">(-335)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Latvia">Latvia</td><td align="right">10 - 0</td><td align="right">(+304)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Italy">Italy</td><td align="right">8 - 2</td><td align="right">(+154)</td></tr>
<tr><td width="200"><img src="img/Flags/Uruguay.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Uruguay">Uruguay</td><td align="right">5 - 5</td><td align="right">(-90)</td></tr>
<tr><td width="200"><img src="img/Flags/China.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=China">China</td><td align="right">4 - 6</td><td align="right">(-64)</td></tr>
<tr><td width="200"><img src="img/Flags/Philippines.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Philippines">Philippines</td><td align="right">2 - 8</td><td align="right">(-145)</td></tr>
<tr><td width="200"><img src="img/Flags/Norway.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Norway">Norway</td><td align="right">1 - 9</td><td align="right">(-159)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Slovenia">Slovenia</td><td align="right">9 - 1</td><td align="right">(+251)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Chile.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Chile">Chile</td><td align="right">7 - 3</td><td align="right">(+120)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Argentina">Argentina</td><td align="right">6 - 4</td><td align="right">(+107)</td></tr>
<tr><td width="200"><img src="img/Flags/Russia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Russia">Russia</td><td align="right">4 - 6</td><td align="right">(-119)</td></tr>
<tr><td width="200"><img src="img/Flags/Tunisia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Tunisia">Tunisia</td><td align="right">2 - 8</td><td align="right">(-169)</td></tr>
<tr><td width="200"><img src="img/Flags/New Zealand.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=New Zealand">New Zealand</td><td align="right">2 - 8</td><td align="right">(-190)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Bosnia and Herzegovina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Bosnia and Herzegovina">Bosnia and Herzegovina</td><td align="right">8 - 2</td><td align="right">(+151)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Finland">Finland</td><td align="right">7 - 3</td><td align="right">(+107)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Australia">Australia</td><td align="right">6 - 4</td><td align="right">(+138)</td></tr>
<tr><td width="200"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=USA">USA</td><td align="right">6 - 4</td><td align="right">(+75)</td></tr>
<tr><td width="200"><img src="img/Flags/Venezuela.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Venezuela">Venezuela</td><td align="right">3 - 7</td><td align="right">(-115)</td></tr>
<tr><td width="200"><img src="img/Flags/Egypt.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Egypt">Egypt</td><td align="right">0 - 10</td><td align="right">(-356)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP E</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Bulgaria">Bulgaria</td><td align="right">7 - 3</td><td align="right">(+78)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Croatia">Croatia</td><td align="right">6 - 4</td><td align="right">(+89)</td></tr>
<tr><td width="200"><img src="img/Flags/Brazil.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Brazil">Brazil</td><td align="right">6 - 4</td><td align="right">(+30)</td></tr>
<tr><td width="200"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Greece">Greece</td><td align="right">5 - 5</td><td align="right">(+120)</td></tr>
<tr><td width="200"><img src="img/Flags/FYR Macedonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=FYR Macedonia">FYR Macedonia</td><td align="right">5 - 5</td><td align="right">(-35)</td></tr>
<tr><td width="200"><img src="img/Flags/Indonesia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Indonesia">Indonesia</td><td align="right">1 - 9</td><td align="right">(-282)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP F</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Poland">Poland</td><td align="right">9 - 1</td><td align="right">(+173)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Spain">Spain</td><td align="right">7 - 3</td><td align="right">(+119)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Hungary.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Hungary">Hungary</td><td align="right">6 - 4</td><td align="right">(+128)</td></tr>
<tr><td width="200"><img src="img/Flags/Switzerland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Switzerland">Switzerland</td><td align="right">4 - 6</td><td align="right">(-45)</td></tr>
<tr><td width="200"><img src="img/Flags/Albania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Albania">Albania</td><td align="right">4 - 6</td><td align="right">(-76)</td></tr>
<tr><td width="200"><img src="img/Flags/Ukraine.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Ukraine">Ukraine</td><td align="right">0 - 10</td><td align="right">(-299)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP G</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=France">France</td><td align="right">9 - 1</td><td align="right">(+208)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Turkey">Turkey</td><td align="right">8 - 2</td><td align="right">(+144)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Germany">Germany</td><td align="right">7 - 3</td><td align="right">(+138)</td></tr>
<tr><td width="200"><img src="img/Flags/Mexico.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Mexico">Mexico</td><td align="right">2 - 8</td><td align="right">(-144)</td></tr>
<tr><td width="200"><img src="img/Flags/Malta.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Malta">Malta</td><td align="right">2 - 8</td><td align="right">(-147)</td></tr>
<tr><td width="200"><img src="img/Flags/Thailand.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Thailand">Thailand</td><td align="right">2 - 8</td><td align="right">(-199)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP H</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Netherlands.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Netherlands">Netherlands</td><td align="right">7 - 3</td><td align="right">(+57)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Serbia">Serbia</td><td align="right">6 - 4</td><td align="right">(+109)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Lithuania">Lithuania</td><td align="right">6 - 4</td><td align="right">(+65)</td></tr>
<tr><td width="200"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Slovakia">Slovakia</td><td align="right">5 - 5</td><td align="right">(-16)</td></tr>
<tr><td width="200"><img src="img/Flags/Czech Republic.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Czech Republic">Czech Republic</td><td align="right">4 - 6</td><td align="right">(-76)</td></tr>
<tr><td width="200"><img src="img/Flags/Cyprus.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Cyprus">Cyprus</td><td align="right">2 - 8</td><td align="right">(-139)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP I</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Israel">Israel</td><td align="right">10 - 0</td><td align="right">(+243)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Belgium">Belgium</td><td align="right">7 - 3</td><td align="right">(+53)</td></tr>
<tr><td width="200"><img src="img/Flags/Canada.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Canada">Canada</td><td align="right">5 - 5</td><td align="right">(+24)</td></tr>
<tr><td width="200"><img src="img/Flags/Colombia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Colombia">Colombia</td><td align="right">4 - 6</td><td align="right">(-42)</td></tr>
<tr><td width="200"><img src="img/Flags/United Kingdom.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=United Kingdom">United Kingdom</td><td align="right">2 - 8</td><td align="right">(-130)</td></tr>
<tr><td width="200"><img src="img/Flags/Austria.png" border="0" alt="">&nbsp;<a href="nationalteams.php?a=qual&country=Austria">Austria</td><td align="right">2 - 8</td><td align="right">(-148)</td></tr>
</table>

<?php
 } elseif ($swc==4) {
?>

<b>4th World Cup - Final Standings</b><br/>

<br/><span style="background-image:url(/img/12gold.gif); background-repeat: no-repeat;">&nbsp;1&nbsp;</span> <a href="nationalteams.php?country=Israel" class="greenhilite">Israel</a> (<a href="club.php?clubid=8814">theobasketsim</a>)
<br/><span style="background-image:url(/img/12silver.gif); background-repeat: no-repeat;">&nbsp;2&nbsp;</span> <a href="nationalteams.php?country=Turkey" class="greenhilite">Turkey</a> (<a href="club.php?clubid=6594">Fatsali</a>)
<br/><span style="background-image:url(/img/12bronze.gif); background-repeat: no-repeat;">&nbsp;3&nbsp;</span> <a href="nationalteams.php?country=Serbia" class="greenhilite">Serbia</a> (<a href="club.php?clubid=9562">LA-Jungle</a>)
<br/>&nbsp;4. <a href="nationalteams.php?country=Australia" class="greenhilite">Australia</a> (<a href="club.php?clubid=11364">Oslo</a>)
<br/>&nbsp;5. <a href="nationalteams.php?country=Slovenia" class="greenhilite">Slovenia</a> (<a href="club.php?clubid=1078">schmex</a>)
<br/>&nbsp;6. <a href="nationalteams.php?country=Bulgaria" class="greenhilite">Bulgaria</a> (<a href="club.php?clubid=12123">Bus73r</a>)
<br/>&nbsp;7. <a href="nationalteams.php?country=Germany" class="greenhilite">Germany</a> (<a href="club.php?clubid=597">vwpolo</a>)
<br/>&nbsp;8. <a href="nationalteams.php?country=Spain" class="greenhilite">Spain</a> (<a href="club.php?clubid=35746">Rainman</a>)
<br/>&nbsp;9. <a href="nationalteams.php?country=Hungary" class="greenhilite">Hungary</a> (<a href="club.php?clubid=7707">Mancini_</a>)
<br/>&nbsp;10. <a href="nationalteams.php?country=Argentina" class="greenhilite">Argentina</a> (<a href="club.php?clubid=3682">MOD-Shata</a>)
<br/>&nbsp;11. <a href="nationalteams.php?country=Finland" class="greenhilite">Finland</a> (<a href="club.php?clubid=5474">palokang</a>)
<br/>&nbsp;12. <a href="nationalteams.php?country=Estonia" class="greenhilite">Estonia</a> (<a href="club.php?clubid=6911">Tony</a>)
<br/>&nbsp;13. <a href="nationalteams.php?country=Lithuania" class="greenhilite">Lithuania</a> (<a href="club.php?clubid=45435">dommaz</a>)
<br/>&nbsp;14. <a href="nationalteams.php?country=Poland" class="greenhilite">Poland</a> (Ewelina)
<br/>&nbsp;15. <a href="nationalteams.php?country=Romania" class="greenhilite">Romania</a> (<a href="club.php?clubid=36">Bebe</a>)
<br/>&nbsp;16. <a href="nationalteams.php?country=Latvia" class="greenhilite">Latvia</a> (<a href="club.php?clubid=6979">Darkmen</a>)
<br/>&nbsp;17. <a href="nationalteams.php?country=France" class="greenhilite">France</a> (<a href="club.php?clubid=7042">spiroumika</a>)
<br/>&nbsp;18. <a href="nationalteams.php?country=Portugal" class="greenhilite">Portugal</a> (<a href="club.php?clubid=4075">JonasAntu</a>)
<br/>&nbsp;19. <a href="nationalteams.php?country=USA" class="greenhilite">USA</a> (Carlos_87)
<br/>&nbsp;20. <a href="nationalteams.php?country=Croatia" class="greenhilite">Croatia</a> (<a href="club.php?clubid=1490">Wizl</a>)
<br/>&nbsp;21. <a href="nationalteams.php?country=Chile" class="greenhilite">Chile</a> (<a href="club.php?clubid=18778">Rondo</a>)
<br/>&nbsp;22. <a href="nationalteams.php?country=Switzerland" class="greenhilite">Switzerland</a> (<a href="club.php?clubid=17062">Mathcorejay</a>)
<br/>&nbsp;23. <a href="nationalteams.php?country=Greece" class="greenhilite">Greece</a> (<a href="club.php?clubid=8630">MarkosG</a>)
<br/>&nbsp;24. <a href="nationalteams.php?country=Belgium" class="greenhilite">Belgium</a> (<a href="club.php?clubid=3907">White_Stripe</a>)

</td><td class="border" width="50%">

<b><?=$langmark1448?></b><br/><br/>

<?=$langmark1453?>: <a href="league.php?country=Czech Republic">Czech Republic</a><br/>
<?=$langmark1449?>: 60<br/>
<?=$langmark1450?>: 316<br/>
<?=$langmark1451?>: 7.243.829<br/>
<?=$langmark1452?>: 22.924<br/>

<br/><b><?=$langmark1454?></b><br/><br/>

PG: <a href="player.php?playerid=447540">Tommy Rosenbrock</a> (Australia)<br/>
SG: <a href="player.php?playerid=232749">Peran Ivković</a> (Serbia)<br/>
SF: <a href="player.php?playerid=210774">Or Lazarus</a> (Israel)<br/>
PF: <a href="player.php?playerid=571348">Viktor Yakimov</a> (Bulgaria)<br/>
C: <a href="player.php?playerid=1344063">Kuddusi Karadağ</a> (Turkey)<br/>

<br/><?=$langmark1455?>: <a href="player.php?playerid=210774">Or Lazarus</a> (Israel)
<br/><?=$langmark1456?>: <a href="player.php?playerid=278564">Amos Levin</a> (Israel)
</td>
</tr>
</table>

<table cellspacing="9" cellpadding="9" border="0" width="100%">
<tr bgcolor="white">
<td class="border" bgcolor="white" width="50%" valign="top">

<b><?=$langmark1457?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Israel">Israel</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=6130">92&nbsp;:&nbsp;83</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Turkey">Turkey</a>&nbsp;<img src="img/Flags/Turkey.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1458?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Australia">Australia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=6131">71&nbsp;:&nbsp;91</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Serbia">Serbia</a>&nbsp;<img src="img/Flags/Serbia.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1459?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Israel">Israel</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=6107">104&nbsp;:&nbsp;91</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Australia">Australia</a>&nbsp;<img src="img/Flags/Australia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Turkey">Turkey</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=6108">96&nbsp;:&nbsp;89</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Serbia">Serbia</a>&nbsp;<img src="img/Flags/Serbia.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1460?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Israel">Israel</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=6083">81&nbsp;-&nbsp;79</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Bulgaria">Bulgaria</a>&nbsp;<img src="img/Flags/Bulgaria.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Australia">Australia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=6084">87&nbsp;-&nbsp;85</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Slovenia">Slovenia</a>&nbsp;<img src="img/Flags/Slovenia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Turkey">Turkey</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=6085">102&nbsp;-&nbsp;96</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Germany">Germany</a>&nbsp;<img src="img/Flags/Germany.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Spain">Spain</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=6086">93&nbsp;-&nbsp;101</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Serbia">Serbia</a>&nbsp;<img src="img/Flags/Serbia.png" border="0" alt=""></td></tr>
</table>

<br/><b>Round of 16</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Israel">Israel</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=6046">102&nbsp;:&nbsp;92</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Lithuania">Lithuania</a>&nbsp;<img src="img/Flags/Lithuania.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bulgaria">Bulgaria</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=6047">85&nbsp;:&nbsp;81</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Argentina">Argentina</a>&nbsp;<img src="img/Flags/Argentina.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia">Estonia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=6048">78&nbsp;:&nbsp;87</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Australia">Australia</a>&nbsp;<img src="img/Flags/Australia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovenia">Slovenia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=6049">93&nbsp;:&nbsp;73</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Romania">Romania</a>&nbsp;<img src="img/Flags/Romania.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Turkey">Turkey</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=6050">85&nbsp;:&nbsp;83</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Hungary">Hungary</a>&nbsp;<img src="img/Flags/Hungary.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Latvia">Latvia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=6051">90&nbsp;:&nbsp;114</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Germany">Germany</a>&nbsp;<img src="img/Flags/Germany.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Spain">Spain</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=6052">94&nbsp;:&nbsp;81</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Poland">Poland</a>&nbsp;<img src="img/Flags/Poland.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Finland">Finland</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=6053">92&nbsp;:&nbsp;100</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Serbia">Serbia</a>&nbsp;<img src="img/Flags/Serbia.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1462?></b><br/>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b></td><td align="right"></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Israel">Israel</td><td align="right">5 - 0</td><td align="right">(+40)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Latvia">Latvia</td><td align="right">3 - 2</td><td align="right">(+26)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Serbia">Serbia</td><td align="right">3 - 2</td><td align="right">(+23)</td></tr>
<tr bgcolor="#FFCC99" bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Australia">Australia</td><td align="right">2 - 3</td><td align="right">(+8)</td></tr>
<tr><td width="200"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Croatia">Croatia</td><td align="right">1 - 4</td><td align="right">(-28)</td></tr>
<tr><td width="200"><img src="img/Flags/Chile.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Chile">Chile</td><td align="right">1 - 4</td><td align="right">(-69)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b></td><td align="right"></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia">Estonia</td><td align="right">5 - 0</td><td align="right">(+57)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Finland">Finland</td><td align="right">4 - 1</td><td align="right">(+25)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Germany">Germany</td><td align="right">3 - 2</td><td align="right">(+23)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Lithuania">Lithuania</td><td align="right">2 - 3</td><td align="right">(-22)</td></tr>
<tr><td width="200"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=USA">USA</td><td align="right">1 - 4</td><td align="right">(-23)</td></tr>
<tr><td width="200"><img src="img/Flags/Switzerland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Switzerland">Switzerland</td><td align="right">0 - 5</td><td align="right">(-60)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b></td><td align="right"></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Turkey">Turkey</td><td align="right">5 - 0</td><td align="right">(+73)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bulgaria">Bulgaria</td><td align="right">3 - 2</td><td align="right">(+29)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Romania">Romania</td><td align="right">3 - 2</td><td align="right">(+3)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Poland">Poland</td><td align="right">2 - 3</td><td align="right">(-4)</td></tr>
<tr><td width="200"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=France">France</td><td align="right">2 - 3</td><td align="right">(-27)</td></tr>
<tr><td width="200"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Belgium">Belgium</td><td align="right">0 - 5</td><td align="right">(-74)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b></td><td align="right"></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Spain">Spain</td><td align="right">5 - 0</td><td align="right">(+79)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovenia">Slovenia</td><td align="right">3 - 2</td><td align="right">(+43)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Argentina">Argentina</td><td align="right">3 - 2</td><td align="right">(+4)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Hungary.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Hungary">Hungary</td><td align="right">2 - 3</td><td align="right">(+3)</td></tr>
<tr><td width="200"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Portugal">Portugal</td><td align="right">2 - 3</td><td align="right">(-56)</td></tr>
<tr><td width="200"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Greece">Greece</td><td align="right">0 - 5</td><td align="right">(-73)</td></tr>
</table>

</td>
<td width="50%" valign="top" class="border" bgcolor="white">

<b><?=$langmark1463?></b><br/>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b></td><td align="right"></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia&a=qual">Estonia</td><td align="right">7 - 1</td><td align="right">(+125)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bulgaria&a=qual">Bulgaria</td><td align="right">7 - 1</td><td align="right">(+100)</td></tr>
<tr><td width="200"><img src="img/Flags/United Kingdom.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=United Kingdom&a=qual">United Kingdom</td><td align="right">3 - 5</td><td align="right">(+21)</td></tr>
<tr><td width="200"><img src="img/Flags/Czech Republic.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Czech Republic&a=qual">Czech Republic</td><td align="right">3 - 5</td><td align="right">(0)</td></tr>
<tr><td width="200"><img src="img/Flags/Montenegro.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Montenegro&a=qual">Montenegro</td><td align="right">0 - 8</td><td align="right">(-246)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b></td><td align="right"></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Lithuania&a=qual">Lithuania</td><td align="right">7 - 1</td><td align="right">(+185)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Latvia&a=qual">Latvia</td><td align="right">7 - 1</td><td align="right">(+147)</td></tr>
<tr><td width="200"><img src="img/Flags/Russia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Russia&a=qual">Russia</td><td align="right">3 - 5</td><td align="right">(-41)</td></tr>
<tr><td width="200"><img src="img/Flags/Canada.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Canada&a=qual">Canada</td><td align="right">3 - 5</td><td align="right">(-54)</td></tr>
<tr><td width="200"><img src="img/Flags/Peru.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Peru&a=qual">Peru</td><td align="right">0 - 8</td><td align="right">(-237)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b></td><td align="right"></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Croatia&a=qual">Croatia</td><td align="right">6 - 2</td><td align="right">(+120)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Switzerland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Switzerland&a=qual">Switzerland</td><td align="right">6 - 2</td><td align="right">(+114)</td></tr>
<tr><td width="200"><img src="img/Flags/Bosnia and Herzegovina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bosnia and Herzegovina&a=qual">Bosnia and Herzegovina</td><td align="right">6 - 2</td><td align="right">(+95)</td></tr>
<tr><td width="200"><img src="img/Flags/India.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=India&a=qual">India</td><td align="right">2 - 6</td><td align="right">(-188)</td></tr>
<tr><td width="200"><img src="img/Flags/Tunisia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Tunisia&a=qual">Tunisia</td><td align="right">0 - 8</td><td align="right">(-141)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b></td><td align="right"></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Romania&a=qual">Romania</td><td align="right">7 - 1</td><td align="right">(+138)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Israel&a=qual">Israel</td><td align="right">6 - 2</td><td align="right">(+71)</td></tr>
<tr><td width="200"><img src="img/Flags/Cyprus.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Cyprus&a=qual">Cyprus</td><td align="right">5 - 3</td><td align="right">(+29)</td></tr>
<tr><td width="200"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovakia&a=qual">Slovakia</td><td align="right">2 - 6</td><td align="right">(-57)</td></tr>
<tr><td width="200"><img src="img/Flags/Ireland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Ireland&a=qual">Ireland</td><td align="right">0 - 8</td><td align="right">(-181)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP E</b></td><td align="right"></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Finland&a=qual">Finland</td><td align="right">8 - 0</td><td align="right">(+220)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Belgium&a=qual">Belgium</td><td align="right">5 - 3</td><td align="right">(+152)</td></tr>
<tr><td width="200"><img src="img/Flags/Albania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Albania&a=qual">Albania</td><td align="right">5 - 3</td><td align="right">(-46)</td></tr>
<tr><td width="200"><img src="img/Flags/China.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=China&a=qual">China</td><td align="right">2 - 6</td><td align="right">(-133)</td></tr>
<tr><td width="200"><img src="img/Flags/Hong Kong.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Hong Kong&a=qual">Hong Kong</td><td align="right">0 - 8</td><td align="right">(-193)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP F</b></td><td align="right"></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Poland&a=qual">Poland</td><td align="right">7 - 1</td><td align="right">(+159)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Hungary.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Hungary&a=qual">Hungary</td><td align="right">7 - 1</td><td align="right">(+140)</td></tr>
<tr><td width="200"><img src="img/Flags/Sweden.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Sweden&a=qual">Sweden</td><td align="right">4 - 4</td><td align="right">(-5)</td></tr>
<tr><td width="200"><img src="img/Flags/Mexico.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Mexico&a=qual">Mexico</td><td align="right">2 - 6</td><td align="right">(-112)</td></tr>
<tr><td width="200"><img src="img/Flags/Malaysia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Malaysia&a=qual">Malaysia</td><td align="right">0 - 8</td><td align="right">(-182)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP G</b></td><td align="right"></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Turkey&a=qual">Turkey</td><td align="right">8 - 0</td><td align="right">(+297)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovenia&a=qual">Slovenia</td><td align="right">6 - 2</td><td align="right">(+167)</td></tr>
<tr><td width="200"><img src="img/Flags/Netherlands.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Netherlands&a=qual">Netherlands</td><td align="right">4 - 4</td><td align="right">(-68)</td></tr>
<tr><td width="200"><img src="img/Flags/Venezuela.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Venezuela&a=qual">Venezuela</td><td align="right">1 - 7</td><td align="right">(-176)</td></tr>
<tr><td width="200"><img src="img/Flags/Thailand.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Thailand&a=qual">Thailand</td><td align="right">1 - 7</td><td align="right">(-220)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP H</b></td><td align="right"></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Chile.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Chile&a=qual">Chile</td><td align="right">7 - 1</td><td align="right">(+226)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=USA&a=qual">USA</td><td align="right">7 - 1</td><td align="right">(+123)</td></tr>
<tr><td width="200"><img src="img/Flags/Denmark.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Denmark&a=qual">Denmark</td><td align="right">4 - 4</td><td align="right">(+57)</td></tr>
<tr><td width="200"><img src="img/Flags/Egypt.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Egypt&a=qual">Egypt</td><td align="right">2 - 6</td><td align="right">(-197)</td></tr>
<tr><td width="200"><img src="img/Flags/Norway.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Norway&a=qual">Norway</td><td align="right">0 - 8</td><td align="right">(-209)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP I</b></td><td align="right"></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Argentina&a=qual">Argentina</td><td align="right">7 - 1</td><td align="right">(+185)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=France&a=qual">France</td><td align="right">7 - 1</td><td align="right">(+120)</td></tr>
<tr><td width="200"><img src="img/Flags/Colombia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Colombia&a=qual">Colombia</td><td align="right">3 - 5</td><td align="right">(-57)</td></tr>
<tr><td width="200"><img src="img/Flags/FYR Macedonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=FYR Macedonia&a=qual">FYR Macedonia</td><td align="right">3 - 5</td><td align="right">(-68)</td></tr>
<tr><td width="200"><img src="img/Flags/Ukraine.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Ukraine&a=qual">Ukraine</td><td align="right">0 - 8</td><td align="right">(-180)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP J</b></td><td align="right"></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Serbia&a=qual">Serbia</td><td align="right">8 - 0</td><td align="right">(+158)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Portugal&a=qual">Portugal</td><td align="right">6 - 2</td><td align="right">(+134)</td></tr>
<tr><td width="200"><img src="img/Flags/Brazil.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Brazil&a=qual">Brazil</td><td align="right">4 - 4</td><td align="right">(+5)</td></tr>
<tr><td width="200"><img src="img/Flags/Philippines.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Philippines&a=qual">Philippines</td><td align="right">2 - 6</td><td align="right">(-38)</td></tr>
<tr><td width="200"><img src="img/Flags/South Korea.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=South Korea&a=qual">South Korea</td><td align="right">0 - 8</td><td align="right">(-259)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP K</b></td><td align="right"></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Greece&a=qual">Greece</td><td align="right">6 - 2</td><td align="right">(+140)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Australia&a=qual">Australia</td><td align="right">6 - 2</td><td align="right">(+124)</td></tr>
<tr><td width="200"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Italy&a=qual">Italy</td><td align="right">6 - 2</td><td align="right">(+95)</td></tr>
<tr><td width="200"><img src="img/Flags/New Zealand.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=New Zealand&a=qual">New Zealand</td><td align="right">2 - 6</td><td align="right">(-112)</td></tr>
<tr><td width="200"><img src="img/Flags/Austria.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Austria&a=qual">Austria</td><td align="right">0 - 8</td><td align="right">(-247)</td></tr>
</table>

<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP L</b></td><td align="right"></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Spain&a=qual">Spain</td><td align="right">8 - 0</td><td align="right">(+188)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Germany&a=qual">Germany</td><td align="right">6 - 2</td><td align="right">(+187)</td></tr>
<tr><td width="200"><img src="img/Flags/Uruguay.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Uruguay&a=qual">Uruguay</td><td align="right">4 - 4</td><td align="right">(-87)</td></tr>
<tr><td width="200"><img src="img/Flags/Malta.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Malta&a=qual">Malta</td><td align="right">2 - 6</td><td align="right">(-172)</td></tr>
<tr><td width="200"><img src="img/Flags/Indonesia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Indonesia&a=qual">Indonesia</td><td align="right">0 - 8</td><td align="right">(-116)</td></tr>
</table>

<?php
} elseif ($swc==5) {
?>

<b>5th World Cup - Final Standings</b><br/><br/>

<span style="background-image:url(/img/12gold.gif); background-repeat: no-repeat;">&nbsp;1&nbsp;</span> <a href="nationalteams.php?country=Estonia" class="greenhilite">Estonia</a> (<a href="club.php?clubid=24634">chad</a>)<br/>
<span style="background-image:url(/img/12silver.gif); background-repeat: no-repeat;">&nbsp;2&nbsp;</span> <a href="nationalteams.php?country=Slovenia" class="greenhilite">Slovenia</a> (<a href="club.php?clubid=1078">schmex</a>)<br/>
<span style="background-image:url(/img/12bronze.gif); background-repeat: no-repeat;">&nbsp;3&nbsp;</span> <a href="nationalteams.php?country=Serbia" class="greenhilite">Serbia</a> (<a href="club.php?clubid=9562">LA-Jungle</a>)<br/>
&nbsp;4. <a href="nationalteams.php?country=Croatia" class="greenhilite">Croatia</a> (<a href="club.php?clubid=1490">Wizl</a>)<br/>
&nbsp;5. <a href="nationalteams.php?country=Israel" class="greenhilite">Israel</a> (<a href="club.php?clubid=4022">irmi82</a>)<br/>
&nbsp;6. <a href="nationalteams.php?country=Turkey" class="greenhilite">Turkey</a> (<a href="club.php?clubid=6594">Fatsali</a>)<br/>
&nbsp;7. <a href="nationalteams.php?country=Slovakia" class="greenhilite">Slovakia</a> (<a href="club.php?clubid=567">tudoran</a>)<br/>
&nbsp;8. <a href="nationalteams.php?country=Germany" class="greenhilite">Germany</a> (<a href="club.php?clubid=597">vwpolo</a>)<br/>
&nbsp;9. <a href="nationalteams.php?country=Spain" class="greenhilite">Spain</a> (<a href="club.php?clubid=35746">Rainman</a>)<br/>
&nbsp;10. <a href="nationalteams.php?country=Greece" class="greenhilite">Greece</a> (<a href="club.php?clubid=8814">theobasketsim</a>)<br/>
&nbsp;11. <a href="nationalteams.php?country=Bosnia" class="greenhilite">Bosnia and Herzegovina</a> (<a href="club.php?clubid=7855">doN_FEBO</a>)<br/>
&nbsp;12. <a href="nationalteams.php?country=Finland" class="greenhilite">Finland</a> (<a href="club.php?clubid=70713">Grau</a>)<br/>
&nbsp;13. <a href="nationalteams.php?country=Argentina" class="greenhilite">Argentina</a> (<a href="club.php?clubid=3682">MOD-Shata</a>)<br/>
&nbsp;14. <a href="nationalteams.php?country=Latvia" class="greenhilite">Latvia</a> (<a href="club.php?clubid=6979">Darkmen</a>)<br/>
&nbsp;15. <a href="nationalteams.php?country=Italy" class="greenhilite">Italy</a> (<a href="club.php?clubid=10058">Ganjalf</a>)<br/>
&nbsp;16. <a href="nationalteams.php?country=Brazil" class="greenhilite">Brazil</a> (<a href="club.php?clubid=21608">katumbi</a>)<br/>
&nbsp;17. <a href="nationalteams.php?country=Bulgaria" class="greenhilite">Bulgaria</a> (<a href="club.php?clubid=12123">Bus73r</a>)<br/>
&nbsp;18. <a href="nationalteams.php?country=Chile" class="greenhilite">Chile</a> (<a href="club.php?clubid=1748">Amurpo</a>)<br/>
&nbsp;19. <a href="nationalteams.php?country=Cyprus" class="greenhilite">Cyprus</a> (<a href="club.php?clubid=19183">SongokuCY</a>)<br/>
&nbsp;20. <a href="nationalteams.php?country=France" class="greenhilite">France</a> (<a href="club.php?clubid=47240">boubik</a>)<br/>
&nbsp;21. <a href="nationalteams.php?country=Portugal" class="greenhilite">Portugal</a> (<a href="club.php?clubid=20311">danip</a>)<br/>
&nbsp;22. <a href="nationalteams.php?country=Romania" class="greenhilite">Romania</a> (<a href="club.php?clubid=36">Bebe</a>)<br/>
&nbsp;23. <a href="nationalteams.php?country=Hungary" class="greenhilite">Hungary</a> (<a href="club.php?clubid=7707">Mancini_</a>)<br/>
&nbsp;24. <a href="nationalteams.php?country=Poland" class="greenhilite">Poland</a> (<a href="club.php?clubid=4453">hesus</a>)

</td><td class="border" width="50%">

<b><?=$langmark1448?></b><br/><br/>

<?=$langmark1453?>: <a href="league.php?country=Turkey">Turkey</a><br/>
<?=$langmark1449?>: 60<br/>
<?=$langmark1450?>: 378<br/>
<?=$langmark1451?>: 8.912.977<br/>
<?=$langmark1452?>: 23.579<br/>

<br/><b><?=$langmark1454?></b><br/><br/>

PG: <a href="player.php?playerid=157851">Osvald Künnapu</a> (Estonia)<br/>
SG: <a href="player.php?playerid=232749">Peran Ivković</a> (Serbia)<br/>
SF: <a href="player.php?playerid=657968">Koit Runnel</a> (Estonia)<br/>
PF: <a href="player.php?playerid=688498">Joško Plećan</a> (Croatia)<br/>
C: <a href="player.php?playerid=171378">Aljaž Bevk</a> (Slovenia)<br/>

<br/><?=$langmark1455?>: <a href="player.php?playerid=232749">Peran Ivković</a> (Serbia)
<br/><?=$langmark1456?>: <a href="player.php?playerid=157851">Osvald Künnapu</a> (Estonia)
</td>
</tr>
</table>

<table cellspacing="9" cellpadding="9" border="0" width="100%">
<tr bgcolor="white">
<td class="border" bgcolor="white" width="50%" valign="top">

<b><?=$langmark1457?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia">Estonia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=8157">114&nbsp;:&nbsp;70</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Slovenia">Slovenia</a>&nbsp;<img src="img/Flags/Slovenia.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1458?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Serbia">Serbia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=8158">101&nbsp;:&nbsp;93</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Croatia">Croatia</a>&nbsp;<img src="img/Flags/Croatia.png" border="0" alt=""></td></tr>
</table>

<br/><b>5th place match</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Israel">Israel</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=8159">84&nbsp;:&nbsp;83</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Turkey">Turkey</a>&nbsp;<img src="img/Flags/Turkey.png" border="0" alt=""></td></tr>
</table>

<br/><b>7th place match</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Germany">Germany</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=8135">92&nbsp;:&nbsp;93</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Slovakia">Slovakia</a>&nbsp;<img src="img/Flags/Slovakia.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1459?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Serbia">Serbia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=8133">86&nbsp;:&nbsp;95</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Estonia">Estonia</a>&nbsp;<img src="img/Flags/Estonia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovenia">Slovenia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=8134">90&nbsp;:&nbsp;80</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Croatia">Croatia</a>&nbsp;<img src="img/Flags/Croatia.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1460?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Serbia">Serbia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=8109">109&nbsp;:&nbsp;86</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Germany">Germany</a>&nbsp;<img src="img/Flags/Germany.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia">Estonia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=8110">105&nbsp;:&nbsp;94</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Israel">Israel</a>&nbsp;<img src="img/Flags/Israel.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Turkey">Turkey</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=8111">63&nbsp;:&nbsp;83</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Slovenia">Slovenia</a>&nbsp;<img src="img/Flags/Slovenia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Croatia">Croatia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=8112">109&nbsp;:&nbsp;85</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Slovakia">Slovakia</a>&nbsp;<img src="img/Flags/Slovakia.png" border="0" alt=""></td></tr>
</table>

<br/><b>Round of 16</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Spain">Spain</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=8076">80&nbsp;:&nbsp;82</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Serbia">Serbia</a>&nbsp;<img src="img/Flags/Serbia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Bosnia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bosnia">BiH</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=8077">86&nbsp;:&nbsp;90</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Germany">Germany</a>&nbsp;<img src="img/Flags/Germany.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia">Estonia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=8078">81&nbsp;:&nbsp;67</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Brazil">Brazil</a>&nbsp;<img src="img/Flags/Brazil.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Israel">Israel</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=8079">82&nbsp;:&nbsp;76</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Argentina">Argentina</a>&nbsp;<img src="img/Flags/Argentina.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Turkey">Turkey</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=8080">101&nbsp;:&nbsp;94</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Latvia">Latvia</a>&nbsp;<img src="img/Flags/Latvia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Italy">Italy</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=8081">94&nbsp;:&nbsp;102</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Slovenia">Slovenia</a>&nbsp;<img src="img/Flags/Slovenia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Croatia">Croatia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=8082">85&nbsp;:&nbsp;81</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Finland">Finland</a>&nbsp;<img src="img/Flags/Finland.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Greece">Greece</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=8083">81&nbsp;:&nbsp;84</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Slovakia">Slovakia</a>&nbsp;<img src="img/Flags/Slovakia.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1462?></b><br/>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Spain">Spain</td><td align="right">5 - 0</td><td align="right">(+29)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Italy">Italy</td><td align="right">3 - 2</td><td align="right">(+15)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovakia">Slovakia</td><td align="right">3 - 2</td><td align="right">(-6)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Brazil.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Brazil">Brazil</td><td align="right">2 - 3</td><td align="right">(+20)</td></tr>
<tr><td width="200"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bulgaria">Bulgaria</td><td align="right">1 - 4</td><td align="right">(-23)</td></tr>
<tr><td width="200"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Portugal">Portugal</td><td align="right">1 - 4</td><td align="right">(-35)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia">Estonia</td><td align="right">4 - 1</td><td align="right">(+40)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Greece">Greece</td><td align="right">4 - 1</td><td align="right">(+36)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovenia">Slovenia</td><td align="right">3 - 2</td><td align="right">(+31)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Serbia">Serbia</td><td align="right">3 - 2</td><td align="right">(+2)</td></tr>
<tr><td width="200"><img src="img/Flags/Cyprus.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Cyprus">Cyprus</td><td align="right">1 - 4</td><td align="right">(-53)</td></tr>
<tr><td width="200"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Poland">Poland</td><td align="right">0 - 5</td><td align="right">(-56)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Turkey">Turkey</td><td align="right">4 - 1</td><td align="right">(+68)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Bosnia and Herzegovina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bosnia and Herzegovina">Bosnia and Herzegovina</td><td align="right">4 - 1</td><td align="right">(+57)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Argentina">Argentina</td><td align="right">4 - 1</td><td align="right">(+45)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Finland">Finland</td><td align="right">2 - 3</td><td align="right">(-9)</td></tr>
<tr><td width="200"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=France">France</td><td align="right">1 - 4</td><td align="right">(-107)</td></tr>
<tr><td width="200"><img src="img/Flags/Hungary.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Hungary">Hungary</td><td align="right">0 - 5</td><td align="right">(-54)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Croatia">Croatia</td><td align="right">5 - 0</td><td align="right">(+67)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Israel">Israel</td><td align="right">4 - 1</td><td align="right">(-4)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Germany">Germany</td><td align="right">2 - 3</td><td align="right">(+11)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Latvia">Latvia</td><td align="right">2 - 3</td><td align="right">(+2)</td></tr>
<tr><td width="200"><img src="img/Flags/Chile.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Chile">Chile</td><td align="right">1 - 4</td><td align="right">(-33)</td></tr>
<tr><td width="200"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Romania">Romania</td><td align="right">1 - 4</td><td align="right">(-43)</td></tr>
</table>

</td>
<td width="50%" valign="top" class="border" bgcolor="white">

<b><?=$langmark1463?></b><br/>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Turkey">Turkey</td><td align="right">10 - 0</td><td align="right">(+227)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Croatia">Croatia</td><td align="right">8 - 2</td><td align="right">(+188)</td></tr>
<tr><td width="200"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Belgium">Belgium</td><td align="right">5 - 5</td><td align="right">(+50)</td></tr>
<tr><td width="200"><img src="img/Flags/Colombia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Colombia">Colombia</td><td align="right">5 - 5</td><td align="right">(+15)</td></tr>
<tr><td width="200"><img src="img/Flags/Venezuela.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Venezuela">Venezuela</td><td align="right">2 - 8</td><td align="right">(-166)</td></tr>
<tr><td width="200"><img src="img/Flags/Norway.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Norway">Norway</td><td align="right">0 - 10</td><td align="right">(-314)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Italy">Italy</td><td align="right">10 - 0</td><td align="right">(+288)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Poland">Poland</td><td align="right">8 - 2</td><td align="right">(+131)</td></tr>
<tr><td width="200"><img src="img/Flags/Albania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Albania">Albania</td><td align="right">6 - 4</td><td align="right">(+52)</td></tr>
<tr><td width="200"><img src="img/Flags/Denmark.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Denmark">Denmark</td><td align="right">4 - 6</td><td align="right">(-29)</td></tr>
<tr><td width="200"><img src="img/Flags/Hong Kong.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Hong Kong">Hong Kong</td><td align="right">1 - 9</td><td align="right">(-219)</td></tr>
<tr><td width="200"><img src="img/Flags/Malaysia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Malaysia">Malaysia</td><td align="right">1 - 9</td><td align="right">(-223)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Greece">Greece</td><td align="right">9 - 1</td><td align="right">(+170)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bulgaria">Bulgaria</td><td align="right">8 - 2</td><td align="right">(+123)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Israel">Israel</td><td align="right">7 - 3</td><td align="right">(+126)</td></tr>
<tr><td width="200"><img src="img/Flags/Sweden.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Sweden">Sweden</td><td align="right">3 - 7</td><td align="right">(-48)</td></tr>
<tr><td width="200"><img src="img/Flags/Mexico.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Mexico">Mexico</td><td align="right">3 - 7</td><td align="right">(-173)</td></tr>
<tr><td width="200"><img src="img/Flags/Indonesia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Indonesia">Indonesia</td><td align="right">0 - 10</td><td align="right">(-198)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia">Estonia</td><td align="right">10 - 0</td><td align="right">(+280)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Romania">Romania</td><td align="right">7 - 3</td><td align="right">(+30)</td></tr>
<tr><td width="200"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Lithuania">Lithuania</td><td align="right">5 - 5</td><td align="right">(+33)</td></tr>
<tr><td width="200"><img src="img/Flags/Philippines.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Philippines">Philippines</td><td align="right">5 - 5</td><td align="right">(+17)</td></tr>
<tr><td width="200"><img src="img/Flags/Russia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Russia">Russia</td><td align="right">3 - 7</td><td align="right">(-90)</td></tr>
<tr><td width="200"><img src="img/Flags/Egypt.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Egypt">Egypt</td><td align="right">0 - 10</td><td align="right">(-270)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP E</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Latvia">Latvia</td><td align="right">10 - 0</td><td align="right">(+154)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Portugal">Portugal</td><td align="right">7 - 3</td><td align="right">(+177)</td></tr>
<tr><td width="200"><img src="img/Flags/United Kingdom.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=United Kingdom">United Kingdom</td><td align="right">6 - 4</td><td align="right">(+102)</td></tr>
<tr><td width="200"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Australia">Australia</td><td align="right">5 - 5</td><td align="right">(+39)</td></tr>
<tr><td width="200"><img src="img/Flags/South Korea.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=South Korea">South Korea</td><td align="right">2 - 8</td><td align="right">(-235)</td></tr>
<tr><td width="200"><img src="img/Flags/China.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=China">China</td><td align="right">0 - 10</td><td align="right">(-237)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP F</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Spain">Spain</td><td align="right">8 - 2</td><td align="right">(+261)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Cyprus.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Cyprus">Cyprus</td><td align="right">8 - 2</td><td align="right">(+103)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Hungary.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Hungary">Hungary</td><td align="right">6 - 4</td><td align="right">(+111)</td></tr>
<tr><td width="200"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=USA">USA</td><td align="right">5 - 5</td><td align="right">(+93)</td></tr>
<tr><td width="200"><img src="img/Flags/Ukraine.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Ukraine">Ukraine</td><td align="right">3 - 7</td><td align="right">(-198)</td></tr>
<tr><td width="200"><img src="img/Flags/India.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=India">India</td><td align="right">0 - 10</td><td align="right">(-370)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP G</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Germany">Germany</td><td align="right">9 - 1</td><td align="right">(+234)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Bosnia and Herzegovina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bosnia and Herzegovina">Bosnia and Herzegovina</td><td align="right">8 - 2</td><td align="right">(+236)</td></tr>
<tr><td width="200"><img src="img/Flags/Netherlands.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Netherlands">Netherlands</td><td align="right">6 - 4</td><td align="right">(+90)</td></tr>
<tr><td width="200"><img src="img/Flags/Uruguay.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Uruguay">Uruguay</td><td align="right">5 - 5</td><td align="right">(-82)</td></tr>
<tr><td width="200"><img src="img/Flags/Tunisia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Tunisia">Tunisia</td><td align="right">2 - 8</td><td align="right">(-234)</td></tr>
<tr><td width="200"><img src="img/Flags/Peru.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Peru">Peru</td><td align="right">0 - 10</td><td align="right">(-244)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP H</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Finland">Finland</td><td align="right">9 - 1</td><td align="right">(+215)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Chile.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Chile">Chile</td><td align="right">8 - 2</td><td align="right">(+194)</td></tr>
<tr><td width="200"><img src="img/Flags/Canada.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Canada">Canada</td><td align="right">5 - 5</td><td align="right">(-58)</td></tr>
<tr><td width="200"><img src="img/Flags/Thailand.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Thailand">Thailand</td><td align="right">4 - 6</td><td align="right">(-19)</td></tr>
<tr><td width="200"><img src="img/Flags/FYR Macedonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=FYR Macedonia">FYR Macedonia</td><td align="right">4 - 6</td><td align="right">(-55)</td></tr>
<tr><td width="200"><img src="img/Flags/Ireland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Ireland">Ireland</td><td align="right">0 - 10</td><td align="right">(-277)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP I</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovenia">Slovenia</td><td align="right">8 - 2</td><td align="right">(+202)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=France">France</td><td align="right">7 - 3</td><td align="right">(+107)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Brazil.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Brazil">Brazil</td><td align="right">7 - 3</td><td align="right">(+79)</td></tr>
<tr><td width="200"><img src="img/Flags/Czech Republic.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Czech Republic">Czech Republic</td><td align="right">6 - 4</td><td align="right">(+49)</td></tr>
<tr><td width="200"><img src="img/Flags/New Zealand.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=New Zealand">New Zealand</td><td align="right">2 - 8</td><td align="right">(-120)</td></tr>
<tr><td width="200"><img src="img/Flags/Austria.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Austria">Austria</td><td align="right">0 - 10</td><td align="right">(-317)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP J</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovakia">Slovakia</td><td align="right">9 - 1</td><td align="right">(+156)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Argentina">Argentina</td><td align="right">8 - 2</td><td align="right">(+241)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Serbia">Serbia</td><td align="right">7 - 3</td><td align="right">(+161)</td></tr>
<tr><td width="200"><img src="img/Flags/Switzerland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Switzerland">Switzerland</td><td align="right">4 - 6</td><td align="right">(+15)</td></tr>
<tr><td width="200"><img src="img/Flags/Malta.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Malta">Malta</td><td align="right">2 - 8</td><td align="right">(-136)</td></tr>
<tr><td width="200"><img src="img/Flags/Montenegro.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Montenegro">Montenegro</td><td align="right">0 - 10</td><td align="right">(-437)</td></tr>
</table>

<?php
} elseif($swc==6) {
?>

<b>6th World Cup - Final Standings</b><br/><br/>

<span style="background-image:url(/img/12gold.gif); background-repeat: no-repeat;">&nbsp;1&nbsp;</span> <a href="nationalteams.php?country=Italy" class="greenhilite">Italy</a> (<a href="club.php?clubid=10058">Ganjalf</a>)<br/>
<span style="background-image:url(/img/12silver.gif); background-repeat: no-repeat;">&nbsp;2&nbsp;</span> <a href="nationalteams.php?country=Greece" class="greenhilite">Greece</a> (<a href="club.php?clubid=8814">theobasketsim</a>)<br/>
<span style="background-image:url(/img/12bronze.gif); background-repeat: no-repeat;">&nbsp;3&nbsp;</span> <a href="nationalteams.php?country=Slovakia" class="greenhilite">Slovakia</a> (<a href="club.php?clubid=567">tudoran</a>)<br/>
&nbsp;4. <a href="nationalteams.php?country=Poland" class="greenhilite">Poland</a> (<a href="club.php?clubid=4453">hesus</a>)<br/>
&nbsp;5. <a href="nationalteams.php?country=Finland" class="greenhilite">Finland</a> (<a href="club.php?clubid=70713">Grau</a>)<br/>
&nbsp;6. <a href="nationalteams.php?country=Estonia" class="greenhilite">Estonia</a> (<a href="club.php?clubid=24634">chad</a>)<br/>
&nbsp;7. <a href="nationalteams.php?country=Germany" class="greenhilite">Germany</a> (<a href="club.php?clubid=45342">sneakyerik</a>)<br/>
&nbsp;8. <a href="nationalteams.php?country=Romania" class="greenhilite">Romania</a> (<a href="club.php?clubid=2590">Dobay</a>)<br/>
&nbsp;9. <a href="nationalteams.php?country=Slovenia" class="greenhilite">Slovenia</a> (<a href="club.php?clubid=7352">JJJJ</a>)<br/>
&nbsp;10. <a href="nationalteams.php?country=Bulgaria" class="greenhilite">Bulgaria</a> (<a href="club.php?clubid=12183">ivooo</a>)<br/>
&nbsp;11. <a href="nationalteams.php?country=Spain" class="greenhilite">Spain</a> (<a href="club.php?clubid=35746">Rainman</a>)<br/>
&nbsp;12. <a href="nationalteams.php?country=Hungary" class="greenhilite">Hungary</a> (<a href="club.php?clubid=7707">Mancini_</a>)<br/>
&nbsp;13. <a href="nationalteams.php?country=Serbia" class="greenhilite">Serbia</a> (<a href="club.php?clubid=9562">LA-Jungle</a>)<br/>
&nbsp;14. <a href="nationalteams.php?country=Portugal" class="greenhilite">Portugal</a> (<a href="club.php?clubid=20311">danip</a>)<br/>
&nbsp;15. <a href="nationalteams.php?country=Latvia" class="greenhilite">Latvia</a> (<a href="club.php?clubid=6979">Darkmen</a>)<br/>
&nbsp;16. <a href="nationalteams.php?country=Philippines" class="greenhilite">Philippines</a> (<a href="club.php?clubid=32280">Alibata</a>)<br/>
&nbsp;17. <a href="nationalteams.php?country=Czech Republic" class="greenhilite">Czech Republic</a> (<a href="club.php?clubid=14449">Kalda</a>)<br/>
&nbsp;18. <a href="nationalteams.php?country=Israel" class="greenhilite">Israel</a> (<a href="club.php?clubid=4022">irmi82</a>)<br/>
&nbsp;19. <a href="nationalteams.php?country=France" class="greenhilite">France</a> (<a href="club.php?clubid=26615">magic_zal</a>)<br/>
&nbsp;20. <a href="nationalteams.php?country=United Kingdom" class="greenhilite">United Kingdom</a> (<a href="club.php?clubid=17211">jazon1977</a>)<br/>
&nbsp;21. <a href="nationalteams.php?country=Bosnia and Herzegovina" class="greenhilite">Bosnia and Herzegovina</a> (<a href="club.php?clubid=7855">doN_FEBO</a>)<br/>
&nbsp;22. <a href="nationalteams.php?country=Cyprus" class="greenhilite">Cyprus</a> (<a href="club.php?clubid=19183">SongokuCY</a>)<br/>
&nbsp;23. <a href="nationalteams.php?country=FYR Macedonia" class="greenhilite">FYR Macedonia</a> (<a href="club.php?clubid=33693">Stoilkovic</a>)<br/>
&nbsp;24. <a href="nationalteams.php?country=USA" class="greenhilite">USA</a> (<a href="club.php?clubid=53061">mschein1</a>)

</td><td class="border" width="50%">

<b><?=$langmark1448?></b><br/><br/>

<?=$langmark1453?>: <a href="league.php?country=Australia">Australia</a><br/>
<?=$langmark1449?>: 60<br/>
<?=$langmark1450?>: 378<br/>
<?=$langmark1451?>: 10.581.003<br/>
<?=$langmark1452?>: 27.992<br/>

<br/><b><?=$langmark1454?></b><br/><br/>

PG: <a href="player.php?playerid=740188">Žigmund Barka</a> (Slovakia)<br/>
SG: <a href="player.php?playerid=1937897">Adam Kruszelnicki</a> (Poland)<br/>
SF: <a href="player.php?playerid=1082616">Eligio Martelloni</a> (Italy)<br/>
PF: <a href="player.php?playerid=914518">Linos Kserolas</a> (Greece)<br/>
C: <a href="player.php?playerid=1051037">Gennaro Armanno</a> (Italy)<br/>

<br/><?=$langmark1455?>: <a href="player.php?playerid=1082616">Eligio Martelloni</a> (Italy)
<br/><?=$langmark1456?>: <a href="player.php?playerid=1082616">Eligio Martelloni</a> (Italy)
</td>
</tr>
</table>

<table cellspacing="9" cellpadding="9" border="0" width="100%">
<tr bgcolor="white">
<td class="border" bgcolor="white" width="50%" valign="top">

<b><?=$langmark1457?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Italy">Italy</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=10217">91&nbsp;:&nbsp;80</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Greece">Greece</a>&nbsp;<img src="img/Flags/Greece.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1458?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Poland">Poland</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=10218">85&nbsp;:&nbsp;86</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Slovakia">Slovakia</a>&nbsp;<img src="img/Flags/Slovakia.png" border="0" alt=""></td></tr>
</table>

<br/><b>5th place match</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia">Estonia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=10219">89&nbsp;:&nbsp;102</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Finland">Finland</a>&nbsp;<img src="img/Flags/Finland.png" border="0" alt=""></td></tr>
</table>

<br/><b>7th place match</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Romania">Romania</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=10194">95&nbsp;:&nbsp;99</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Germany">Germany</a>&nbsp;<img src="img/Flags/Germany.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1459?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Italy">Italy</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=10192">99&nbsp;:&nbsp;98</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Poland">Poland</a>&nbsp;<img src="img/Flags/Poland.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovakia">Slovakia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=10193">90&nbsp;:&nbsp;99</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Greece">Greece</a>&nbsp;<img src="img/Flags/Greece.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1460?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Italy">Italy</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=10167">93&nbsp;:&nbsp;92</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Estonia">Estonia</a>&nbsp;<img src="img/Flags/Estonia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Romania">Romania</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=10168">88&nbsp;:&nbsp;100</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Poland">Poland</a>&nbsp;<img src="img/Flags/Poland.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovakia">Slovakia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=10169">88&nbsp;:&nbsp;85</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Finland">Finland</a>&nbsp;<img src="img/Flags/Finland.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Greece">Greece</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=10170">99&nbsp;:&nbsp;86</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Germany">Germany</a>&nbsp;<img src="img/Flags/Germany.png" border="0" alt=""></td></tr>
</table>


<br/><b>Round of 16</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Italy">Italy</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=10131">95&nbsp;:&nbsp;65</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Portugal">Portugal</a>&nbsp;<img src="img/Flags/Portugal.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bulgaria">Bulgaria</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=10132">84&nbsp;:&nbsp;86</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Estonia">Estonia</a>&nbsp;<img src="img/Flags/Estonia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Romania">Romania</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=10133">118&nbsp;:&nbsp;70</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Philippines">Philippines</a>&nbsp;<img src="img/Flags/Philippines.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Poland">Poland</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=10134">106&nbsp;:&nbsp;91</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Serbia">Serbia</a>&nbsp;<img src="img/Flags/Serbia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Spain">Spain</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=10135">97&nbsp;:&nbsp;106</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Slovakia">Slovakia</a>&nbsp;<img src="img/Flags/Slovakia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Finland">Finland</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=10136">110&nbsp;:&nbsp;109</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Slovenia">Slovenia</a>&nbsp;<img src="img/Flags/Slovenia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Greece">Greece</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=10137">114&nbsp;:&nbsp;76</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Latvia">Latvia</a>&nbsp;<img src="img/Flags/Latvia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Germany">Germany</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=10138">96&nbsp;:&nbsp;85</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Hungary">Hungary</a>&nbsp;<img src="img/Flags/Hungary.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1462?></b><br/>

<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b> (<a class="greenhilite" href="region.php?region=Victoria"><i>Victoria</i></a>)</td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Italy">Italy</td><td align="right">4 - 1</td><td align="right">(+64)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Finland">Finland</td><td align="right">3 - 2</td><td align="right">(+25)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Hungary.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Hungary">Hungary</td><td align="right">3 - 2</td><td align="right">(+9)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Philippines.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Philippines">Philippines</td><td align="right">3 - 2</td><td align="right">(-41)</td></tr>
<tr><td width="200"><img src="img/Flags/Czech Republic.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Czech Republic">Czech Republic</td><td align="right">2 - 3</td><td align="right">(+2)</td></tr>
<tr><td width="200"><img src="img/Flags/Bosnia and Herzegovina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bosnia and Herzegovina">Bosnia and Herzegovina</td><td align="right">0 - 5</td><td align="right">(-59)</td></tr>

</table>

<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b> (<a class="greenhilite" href="region.php?region=New South Wales"><i>New South Wales</i></a>)</td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Romania">Romania</td><td align="right">4 - 1</td><td align="right">(+57)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Germany">Germany</td><td align="right">4 - 1</td><td align="right">(+44)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovenia">Slovenia</td><td align="right">3 - 2</td><td align="right">(+12)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Portugal">Portugal</td><td align="right">3 - 2</td><td align="right">(-23)</td></tr>
<tr><td width="200"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=France">France</td><td align="right">1 - 4</td><td align="right">(-25)</td></tr>
<tr><td width="200"><img src="img/Flags/Cyprus.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Cyprus">Cyprus</td><td align="right">0 - 5</td><td align="right">(-65)</td></tr>
</table>

<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b> (<a class="greenhilite" href="region.php?region=South Australia"><i>South Australia</i></a>)</td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Spain">Spain</td><td align="right">5 - 0</td><td align="right">(+52)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bulgaria">Bulgaria</td><td align="right">4 - 1</td><td align="right">(+68)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Serbia">Serbia</td><td align="right">3 - 2</td><td align="right">(+22)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Latvia">Latvia</td><td align="right">2 - 3</td><td align="right">(-59)</td></tr>
<tr><td width="200"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Israel">Israel</td><td align="right">1 - 4</td><td align="right">(+6)</td></tr>
<tr><td width="200"><img src="img/Flags/FYR Macedonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=FYR Macedonia">FYR Macedonia</td><td align="right">0 - 5</td><td align="right">(-89)</td></tr>
</table>

<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b> (<a class="greenhilite" href="region.php?region=Tasmania"><i>Tasmania</i></a>)</td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Greece">Greece</td><td align="right">5 - 0</td><td align="right">(+91)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Poland">Poland</td><td align="right">4 - 1</td><td align="right">(+66)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia">Estonia</td><td align="right">3 - 2</td><td align="right">(+46)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovakia">Slovakia</td><td align="right">2 - 3</td><td align="right">(-5)</td></tr>
<tr><td width="200"><img src="img/Flags/United Kingdom.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=United Kingdom">United Kingdom</td><td align="right">1 - 4</td><td align="right">(-32)</td></tr>
<tr><td width="200"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=USA">USA</td><td align="right">0 - 5</td><td align="right">(-166)</td></tr>
</table>

</td>
<td width="50%" valign="top" class="border" bgcolor="white">

<b><?=$langmark1463?></b><br/>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Greece">Greece</td><td align="right">9 - 1</td><td align="right">(+209)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Cyprus.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Cyprus">Cyprus</td><td align="right">8 - 2</td><td align="right">(+192)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Israel">Israel</td><td align="right">7 - 3</td><td align="right">(+103)</td></tr>
<tr><td width="200"><img src="img/Flags/Colombia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Colombia">Colombia</td><td align="right">3 - 7</td><td align="right">(-89)</td></tr>
<tr><td width="200"><img src="img/Flags/Venezuela.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Venezuela">Venezuela</td><td align="right">2 - 8</td><td align="right">(-129)</td></tr>
<tr><td width="200"><img src="img/Flags/Ireland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Ireland">Ireland</td><td align="right">1 - 9</td><td align="right">(-286)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Spain">Spain</td><td align="right">9 - 1</td><td align="right">(+174)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovakia">Slovakia</td><td align="right">8 - 2</td><td align="right">(+238)</td></tr>
<tr><td width="200"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Australia">Australia</td><td align="right">6 - 4</td><td align="right">(+51)</td></tr>
<tr><td width="200"><img src="img/Flags/Uruguay.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Uruguay">Uruguay</td><td align="right">4 - 6</td><td align="right">(-95)</td></tr>
<tr><td width="200"><img src="img/Flags/New Zealand.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=New Zealand">New Zealand</td><td align="right">3 - 7</td><td align="right">(-100)</td></tr>
<tr><td width="200"><img src="img/Flags/Norway.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Norway">Norway</td><td align="right">0 - 10</td><td align="right">(-268)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Romania">Romania</td><td align="right">9 - 1</td><td align="right">(+206)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/FYR Macedonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=FYR Macedonia">FYR Macedonia</td><td align="right">8 - 2</td><td align="right">(+132)</td></tr>
<tr><td width="200"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Turkey">Turkey</td><td align="right">6 - 4</td><td align="right">(+121)</td></tr>
<tr><td width="200"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Lithuania">Lithuania</td><td align="right">4 - 6</td><td align="right">(+20)</td></tr>
<tr><td width="200"><img src="img/Flags/Russia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Russia">Russia</td><td align="right">3 - 7</td><td align="right">(-68)</td></tr>
<tr><td width="200"><img src="img/Flags/Montenegro.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Montenegro">Montenegro</td><td align="right">0 - 10</td><td align="right">(-411)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Philippines.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Philippines">Philippines</td><td align="right">9 - 1</td><td align="right">(+72)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovenia">Slovenia</td><td align="right">7 - 3</td><td align="right">(+144)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=USA">USA</td><td align="right">6 - 4</td><td align="right">(+130)</td></tr>
<tr><td width="200"><img src="img/Flags/Chile.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Chile">Chile</td><td align="right">4 - 6</td><td align="right">(+11)</td></tr>
<tr><td width="200"><img src="img/Flags/Peru.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Peru">Peru</td><td align="right">3 - 7</td><td align="right">(-166)</td></tr>
<tr><td width="200"><img src="img/Flags/Malta.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Malta">Malta</td><td align="right">1 - 9</td><td align="right">(-191)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP E</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Italy">Italy</td><td align="right">10 - 0</td><td align="right">(+285)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/United Kingdom.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=United Kingdom">United Kingdom</td><td align="right">8 - 2</td><td align="right">(+150)</td></tr>
<tr><td width="200"><img src="img/Flags/Netherlands.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Netherlands">Netherlands</td><td align="right">5 - 5</td><td align="right">(+49)</td></tr>
<tr><td width="200"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Croatia">Croatia</td><td align="right">5 - 5</td><td align="right">(+46)</td></tr>
<tr><td width="200"><img src="img/Flags/Indonesia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Indonesia">Indonesia</td><td align="right">2 - 8</td><td align="right">(-190)</td></tr>
<tr><td width="200"><img src="img/Flags/Malaysia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Malaysia">Malaysia</td><td align="right">0 - 10</td><td align="right">(-340)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP F</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Germany">Germany</td><td align="right">9 - 1</td><td align="right">(+209)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Bosnia and Herzegovina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bosnia and Herzegovina">Bosnia and Herzegovina</td><td align="right">7 - 3</td><td align="right">(+169)</td></tr>
<tr><td width="200"><img src="img/Flags/Switzerland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Switzerland">Switzerland</td><td align="right">6 - 4</td><td align="right">(-3)</td></tr>
<tr><td width="200"><img src="img/Flags/Tunisia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Tunisia">Tunisia</td><td align="right">4 - 6</td><td align="right">(-119)</td></tr>
<tr><td width="200"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Belgium">Belgium</td><td align="right">3 - 7</td><td align="right">(-87)</td></tr>
<tr><td width="200"><img src="img/Flags/Hong Kong.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Hong Kong">Hong Kong</td><td align="right">1 - 9</td><td align="right">(-169)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP G</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia">Estonia</td><td align="right">9 - 1</td><td align="right">(+180)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Portugal">Portugal</td><td align="right">8 - 2</td><td align="right">(+162)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Hungary.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Hungary">Hungary</td><td align="right">7 - 3</td><td align="right">(+94)</td></tr>
<tr><td width="200"><img src="img/Flags/Austria.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Austria">Austria</td><td align="right">3 - 7</td><td align="right">(-123)</td></tr>
<tr><td width="200"><img src="img/Flags/Canada.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Canada">Canada</td><td align="right">2 - 8</td><td align="right">(-83)</td></tr>
<tr><td width="200"><img src="img/Flags/Thailand.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Thailand">Thailand</td><td align="right">1 - 9</td><td align="right">(-230)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP H</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Serbia">Serbia</td><td align="right">9 - 1</td><td align="right">(+273)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Poland">Poland</td><td align="right">7 - 3</td><td align="right">(+160)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=France">France</td><td align="right">7 - 3</td><td align="right">(+148)</td></tr>
<tr><td width="200"><img src="img/Flags/Sweden.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Sweden">Sweden</td><td align="right">5 - 5</td><td align="right">(-83)</td></tr>
<tr><td width="200"><img src="img/Flags/India.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=India">India</td><td align="right">1 - 9</td><td align="right">(-184)</td></tr>
<tr><td width="200"><img src="img/Flags/Mexico.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Mexico">Mexico</td><td align="right">1 - 9</td><td align="right">(-314)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP I</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Latvia">Latvia</td><td align="right">8 - 2</td><td align="right">(+138)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Czech Republic.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Czech Republic">Czech Republic</td><td align="right">8 - 2</td><td align="right">(+112)</td></tr>
<tr><td width="200"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Argentina">Argentina</td><td align="right">6 - 4</td><td align="right">(+76)</td></tr>
<tr><td width="200"><img src="img/Flags/China.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=China">China</td><td align="right">5 - 5</td><td align="right">(+41)</td></tr>
<tr><td width="200"><img src="img/Flags/Egypt.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Egypt">Egypt</td><td align="right">2 - 8</td><td align="right">(-186)</td></tr>
<tr><td width="200"><img src="img/Flags/Albania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Albania">Albania</td><td align="right">1 - 9</td><td align="right">(-181)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP J</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Finland">Finland</td><td align="right">8 - 2</td><td align="right">(+202)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bulgaria">Bulgaria</td><td align="right">8 - 2</td><td align="right">(+112)</td></tr>
<tr><td width="200"><img src="img/Flags/Brazil.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Brazil">Brazil</td><td align="right">6 - 4</td><td align="right">(+31)</td></tr>
<tr><td width="200"><img src="img/Flags/Denmark.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Denmark">Denmark</td><td align="right">4 - 6</td><td align="right">(-82)</td></tr>
<tr><td width="200"><img src="img/Flags/Ukraine.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Ukraine">Ukraine</td><td align="right">3 - 7</td><td align="right">(-74)</td></tr>
<tr><td width="200"><img src="img/Flags/South Korea.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=South Korea">South Korea</td><td align="right">1 - 9</td><td align="right">(-189)</td></tr>
</table>

<?php
} elseif($swc==7) {
?>
<b>7th World Cup - Final Standings</b><br/><br/>

<span style="background-image:url(/img/12gold.gif); background-repeat: no-repeat;">&nbsp;1&nbsp;</span> <a href="nationalteams.php?country=Estonia" class="greenhilite">Estonia</a> (<a href="club.php?clubid=3114">Eissa</a>)<br/>
<span style="background-image:url(/img/12silver.gif); background-repeat: no-repeat;">&nbsp;2&nbsp;</span> <a href="nationalteams.php?country=Italy" class="greenhilite">Italy</a> (<a href="club.php?clubid=1895">mauroth</a>)<br/>
<span style="background-image:url(/img/12bronze.gif); background-repeat: no-repeat;">&nbsp;3&nbsp;</span> <a href="nationalteams.php?country=Turkey" class="greenhilite">Turkey</a> (<a href="club.php?clubid=62681">maydanoz</a>)<br/>
&nbsp;4. <a href="nationalteams.php?country=Czech Republic" class="greenhilite">Czech Republic</a> (<a href="club.php?clubid=39652">jzajko</a>)<br/>
&nbsp;5. <a href="nationalteams.php?country=Argentina" class="greenhilite">Argentina</a> (<a href="club.php?clubid=74993">aioria</a>)<br/>
&nbsp;6. <a href="nationalteams.php?country=Greece" class="greenhilite">Greece</a> (<a href="club.php?clubid=9530">Tasos</a>)<br/>
&nbsp;7. <a href="nationalteams.php?country=Poland" class="greenhilite">Poland</a> (<a href="club.php?clubid=3231">salo</a>)<br/>
&nbsp;8. <a href="nationalteams.php?country=Germany" class="greenhilite">Germany</a> (<a href="club.php?clubid=45342">sneakyerik</a>)<br/>
&nbsp;9. <a href="nationalteams.php?country=Spain" class="greenhilite">Spain</a> (<a href="club.php?clubid=35746">Rainman</a>)<br/>
&nbsp;10. <a href="nationalteams.php?country=Bulgaria" class="greenhilite">Bulgaria</a> (<a href="club.php?clubid=12183">ivooo</a>)<br/>
&nbsp;11. <a href="nationalteams.php?country=Latvia" class="greenhilite">Latvia</a> (<a href="club.php?clubid=35881">Grizzz^</a>)<br/>
&nbsp;12. <a href="nationalteams.php?country=Serbia" class="greenhilite">Serbia</a> (<a href="club.php?clubid=4766">DuXoMaN</a>)<br/>
&nbsp;13. <a href="nationalteams.php?country=Slovakia" class="greenhilite">Slovakia</a> (<a href="club.php?clubid=567">tudoran</a>)<br/>
&nbsp;14. <a href="nationalteams.php?country=Israel" class="greenhilite">Israel</a> (<a href="club.php?clubid=4022">irmi82</a>)<br/>
&nbsp;15. <a href="nationalteams.php?country=France" class="greenhilite">France</a> (<a href="club.php?clubid=86471">dugaz</a>)<br/>
&nbsp;16. <a href="nationalteams.php?country=FYR Macedonia" class="greenhilite">FYR Macedonia</a> (<a href="club.php?clubid=9119">GM-starte</a>)<br/>
&nbsp;17. <a href="nationalteams.php?country=Slovenia" class="greenhilite">Slovenia</a> (<a href="club.php?clubid=1070">mod-keyser</a>)<br/>
&nbsp;18. <a href="nationalteams.php?country=Hungary" class="greenhilite">Hungary</a> (<a href="club.php?clubid=7707">Mancini_</a>)<br/>
&nbsp;19. <a href="nationalteams.php?country=Finland" class="greenhilite">Finland</a> (<a href="club.php?clubid=16621">ThanosFR</a>)<br/>
&nbsp;20. <a href="nationalteams.php?country=Bosnia and Herzegovina" class="greenhilite">Bosnia and Herzegovina</a> (<a href="club.php?clubid=67068">zaketa</a>)<br/>
&nbsp;21. <a href="nationalteams.php?country=Romania" class="greenhilite">Romania</a> (<a href="club.php?clubid=2590">Dobay</a>)<br/>
&nbsp;22. <a href="nationalteams.php?country=Cyprus" class="greenhilite">Cyprus</a> (<a href="club.php?clubid=76132">Kais</a>)<br/>
&nbsp;23. <a href="nationalteams.php?country=Philippines" class="greenhilite">Philippines</a> (<a href="club.php?clubid=32280">Alibata</a>)<br/>
&nbsp;24. <a href="nationalteams.php?country=Australia" class="greenhilite">Australia</a> (<a href="club.php?clubid=54506">Deejohnson</a>)

</td><td class="border" width="50%">

<b><?=$langmark1448?></b><br/><br/>

<?=$langmark1453?>: <a href="league.php?country=Estonia">Estonia</a>, <a href="league.php?country=Latvia">Latvia</a><br/>
<?=$langmark1449?>: 60<br/>
<?=$langmark1450?>: 378<br/>
<?=$langmark1451?>: 10.821.190<br/>
<?=$langmark1452?>: 28.627<br/>

<br/><b><?=$langmark1454?></b><br/><br/>

PG: <a href="player.php?playerid=417956">Stefano Nardone</a> (Italy)<br/>
SG: <a href="player.php?playerid=169826">Andrus Krikmann</a> (Estonia)<br/>
SF: <a href="player.php?playerid=791404">Samil Valioglu</a> (Turkey)<br/>
PF: <a href="player.php?playerid=158176">Kaido Liitoja</a> (Estonia)<br/>
C: <a href="player.php?playerid=1344063">Kuddusi Karadağ</a> (Turkey)<br/>

<br/><?=$langmark1455?>: <a href="player.php?playerid=791404">Samil Valioglu</a> (Turkey)
<br/><?=$langmark1456?>: <a href="player.php?playerid=169826">Andrus Krikmann</a> (Estonia)
<br/>Coach of the tournament: <a href="club.php?clubid=39652">jzajko</a> (Czech Republic)
</td>
</tr>
</table>

<table cellspacing="9" cellpadding="9" border="0" width="100%">
<tr bgcolor="white">
<td class="border" bgcolor="white" width="50%" valign="top">

<b><?=$langmark1457?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia">Estonia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=12403">102&nbsp;:&nbsp;89</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Italy">Italy</a>&nbsp;<img src="img/Flags/Italy.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1458?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Czech Republic.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Czech Republic">Czech Republic</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=12404">83&nbsp;:&nbsp;102</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Turkey">Turkey</a>&nbsp;<img src="img/Flags/Turkey.png" border="0" alt=""></td></tr>
</table>

<br/><b>5th place match</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Greece">Greece</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=12405">78&nbsp;:&nbsp;88</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Argentina">Argentina</a>&nbsp;<img src="img/Flags/Argentina.png" border="0" alt=""></td></tr>
</table>

<br/><b>7th place match</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Germany">Germany</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=12380">71&nbsp;:&nbsp;96</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Poland">Poland</a>&nbsp;<img src="img/Flags/Poland.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1459?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Czech Republic.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Czech Republic">Czech Republic</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=12378">75&nbsp;:&nbsp;94</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Estonia">Estonia</a>&nbsp;<img src="img/Flags/Estonia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Turkey">Turkey</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=12379">88&nbsp;:&nbsp;96</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Italy">Italy</a>&nbsp;<img src="img/Flags/Italy.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1460?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Greece">Greece</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=12351">96&nbsp;:&nbsp;97</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Czech Republic">Czech Republic</a>&nbsp;<img src="img/Flags/Czech Republic.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Argentina">Argentina</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=12352">91&nbsp;:&nbsp;92</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Estonia">Estonia</a>&nbsp;<img src="img/Flags/Estonia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Germany">Germany</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=12353">91&nbsp;:&nbsp;99</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Turkey">Turkey</a>&nbsp;<img src="img/Flags/Turkey.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Italy">Italy</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=12354">100&nbsp;:&nbsp;98</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Poland">Poland</a>&nbsp;<img src="img/Flags/Poland.png" border="0" alt=""></td></tr>
</table>

<br/><b>Round of 16</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Greece">Greece</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=12319">99&nbsp;:&nbsp;67</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=FYR Macedonia">FYR Macedonia</a>&nbsp;<img src="img/Flags/FYR Macedonia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Czech Republic.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Czech Republic">Czech Republic</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=12320">114&nbsp;:&nbsp;99</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Serbia">Serbia</a>&nbsp;<img src="img/Flags/Serbia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Spain">Spain</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=12321">85&nbsp;:&nbsp;88</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Argentina">Argentina</a>&nbsp;<img src="img/Flags/Argentina.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia">Estonia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=12322">99&nbsp;:&nbsp;86</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Latvia">Latvia</a>&nbsp;<img src="img/Flags/Latvia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovakia">Slovakia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=12323">81&nbsp;:&nbsp;96</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Germany">Germany</a>&nbsp;<img src="img/Flags/Germany.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Turkey">Turkey</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=12324">109&nbsp;:&nbsp;93</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Israel">Israel</a>&nbsp;<img src="img/Flags/Israel.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Italy">Italy</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=12325">100&nbsp;:&nbsp;70</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=France">France</a>&nbsp;<img src="img/Flags/France.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Poland">Poland</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=12326">88&nbsp;:&nbsp;79</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Bulgaria">Bulgaria</a>&nbsp;<img src="img/Flags/Bulgaria.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1462?></b><br/>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b> (<a class="greenhilite" href="region.php?region=Harjumaa"><i>Harjumaa</i></a>)</td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Greece">Greece</td><td align="right">4 - 1</td><td align="right">(+76)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Turkey">Turkey</td><td align="right">4 - 1</td><td align="right">(+43)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bulgaria">Bulgaria</td><td align="right">3 - 2</td><td align="right">(+28)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Argentina">Argentina</td><td align="right">3 - 2</td><td align="right">(+20)</td></tr>
<tr><td width="200"><img src="img/Flags/Bosnia and Herzegovina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bosnia and Herzegovina">Bosnia and Herzegovina</td><td align="right">1 - 4</td><td align="right">(-52)</td></tr>
<tr><td width="200"><img src="img/Flags/Philippines.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Philippines">Philippines</td><td align="right">0 - 5</td><td align="right">(-115)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b> (<a class="greenhilite" href="region.php?region=Ventspils"><i>Ventspils</i></a>)</td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Spain">Spain</td><td align="right">5 - 0</td><td align="right">(+58)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Poland">Poland</td><td align="right">3 - 2</td><td align="right">(+33)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Israel">Israel</td><td align="right">3 - 2</td><td align="right">(+31)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/FYR Macedonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=FYR Macedonia">FYR Macedonia</td><td align="right">2 - 3</td><td align="right">(-31)</td></tr>
<tr><td width="200"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Finland">Finland</td><td align="right">2 - 3</td><td align="right">(-47)</td></tr>
<tr><td width="200"><img src="img/Flags/Cyprus.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Cyprus">Cyprus</td><td align="right">0 - 5</td><td align="right">(-44)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b> (<a class="greenhilite" href="region.php?region=Rīga"><i>Rīga</i></a>)</td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovakia">Slovakia</td><td align="right">3 - 2</td><td align="right">(+26)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Czech Republic.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Czech Republic">Czech Republic</td><td align="right">3 - 2</td><td align="right">(+20)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Latvia">Latvia</td><td align="right">3 - 2</td><td align="right">(0)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=France">France</td><td align="right">3 - 2</td><td align="right">(-8)</td></tr>
<tr><td width="200"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovenia">Slovenia</td><td align="right">2 - 3</td><td align="right">(+5)</td></tr>
<tr><td width="200"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Romania">Romania</td><td align="right">1 - 4</td><td align="right">(-43)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b> (<a class="greenhilite" href="region.php?region=Tartumaa"><i>Tartumaa</i></a>)</td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Italy">Italy</td><td align="right">5 - 0</td><td align="right">(+75)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia">Estonia</td><td align="right">3 - 2</td><td align="right">(+41)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Serbia">Serbia</td><td align="right">3 - 2</td><td align="right">(+14)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Germany">Germany</td><td align="right">2 - 3</td><td align="right">(+11)</td></tr>
<tr><td width="200"><img src="img/Flags/Hungary.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Hungary">Hungary</td><td align="right">2 - 3</td><td align="right">(-21)</td></tr>
<tr><td width="200"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Australia">Australia</td><td align="right">0 - 5</td><td align="right">(-120)</td></tr>
</table>

</td>
<td width="50%" valign="top" class="border" bgcolor="white">

<b><?=$langmark1463?></b><br/>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Greece">Greece</td><td align="right">9 - 1</td><td align="right">(+276)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Hungary.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Hungary">Hungary</td><td align="right">8 - 2</td><td align="right">(+130)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Israel">Israel</td><td align="right">7 - 3</td><td align="right">(+174)</td></tr>
<tr><td width="200"><img src="img/Flags/Sweden.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Sweden">Sweden</td><td align="right">4 - 6</td><td align="right">(-81)</td></tr>
<tr><td width="200"><img src="img/Flags/Malaysia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Malaysia">Malaysia</td><td align="right">1 - 9</td><td align="right">(-212)</td></tr>
<tr><td width="200"><img src="img/Flags/New Zealand.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=New Zealand">New Zealand</td><td align="right">1 - 9</td><td align="right">(-287)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Latvia">Latvia</td><td align="right">9 - 1</td><td align="right">(+188)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Spain">Spain</td><td align="right">8 - 2</td><td align="right">(+244)</td></tr>
<tr><td width="200"><img src="img/Flags/Uruguay.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Uruguay">Uruguay</td><td align="right">6 - 4</td><td align="right">(+72)</td></tr>
<tr><td width="200"><img src="img/Flags/Brazil.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Brazil">Brazil</td><td align="right">4 - 6</td><td align="right">(-23)</td></tr>
<tr><td width="200"><img src="img/Flags/Ukraine.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Ukraine">Ukraine</td><td align="right">2 - 8</td><td align="right">(-153)</td></tr>
<tr><td width="200"><img src="img/Flags/Ireland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Ireland">Ireland</td><td align="right">1 - 9</td><td align="right">(-328)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Argentina">Argentina</td><td align="right">10 - 0</td><td align="right">(+154)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Finland">Finland</td><td align="right">8 - 2</td><td align="right">(+152)</td></tr>
<tr><td width="200"><img src="img/Flags/Netherlands.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Netherlands">Netherlands</td><td align="right">5 - 5</td><td align="right">(+63)</td></tr>
<tr><td width="200"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Lithuania">Lithuania</td><td align="right">5 - 5</td><td align="right">(+57)</td></tr>
<tr><td width="200"><img src="img/Flags/Austria.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Austria">Austria</td><td align="right">2 - 8</td><td align="right">(-166)</td></tr>
<tr><td width="200"><img src="img/Flags/Malta.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Malta">Malta</td><td align="right">0 - 10</td><td align="right">(-260)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Poland">Poland</td><td align="right">10 - 0</td><td align="right">(+190)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovenia">Slovenia</td><td align="right">7 - 3</td><td align="right">(+203)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Australia">Australia</td><td align="right">6 - 4</td><td align="right">(+173)</td></tr>
<tr><td width="200"><img src="img/Flags/Switzerland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Switzerland">Switzerland</td><td align="right">5 - 5</td><td align="right">(+5)</td></tr>
<tr><td width="200"><img src="img/Flags/Peru.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Peru">Peru</td><td align="right">2 - 8</td><td align="right">(-252)</td></tr>
<tr><td width="200"><img src="img/Flags/South Korea.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=South Korea">South Korea</td><td align="right">0 - 10</td><td align="right">(-319)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP E</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Italy">Italy</td><td align="right">10 - 0</td><td align="right">(+256)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Czech Republic.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Czech Republic">Czech Republic</td><td align="right">7 - 3</td><td align="right">(+145)</td></tr>
<tr><td width="200"><img src="img/Flags/United Kingdom.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=United Kingdom">United Kingdom</td><td align="right">6 - 4</td><td align="right">(+93)</td></tr>
<tr><td width="200"><img src="img/Flags/Russia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Russia">Russia</td><td align="right">4 - 6</td><td align="right">(-144)</td></tr>
<tr><td width="200"><img src="img/Flags/Canada.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Canada">Canada</td><td align="right">2 - 8</td><td align="right">(-124)</td></tr>
<tr><td width="200"><img src="img/Flags/Montenegro.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Montenegro">Montenegro</td><td align="right">1 - 9</td><td align="right">(-226)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP F</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Romania">Romania</td><td align="right">9 - 1</td><td align="right">(+149)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Serbia">Serbia</td><td align="right">7 - 3</td><td align="right">(+122)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Philippines.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Philippines">Philippines</td><td align="right">7 - 3</td><td align="right">(+47)</td></tr>
<tr><td width="200"><img src="img/Flags/Colombia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Colombia">Colombia</td><td align="right">4 - 6</td><td align="right">(+27)</td></tr>
<tr><td width="200"><img src="img/Flags/Egypt.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Egypt">Egypt</td><td align="right">2 - 8</td><td align="right">(-164)</td></tr>
<tr><td width="200"><img src="img/Flags/Tunisia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Tunisia">Tunisia</td><td align="right">1 - 9</td><td align="right">(-181)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP G</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovakia">Slovakia</td><td align="right">10 - 0</td><td align="right">(+265)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Bosnia and Herzegovina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bosnia and Herzegovina">Bosnia and Herzegovina</td><td align="right">8 - 2</td><td align="right">(+161)</td></tr>
<tr><td width="200"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Belgium">Belgium</td><td align="right">6 - 4</td><td align="right">(+121)</td></tr>
<tr><td width="200"><img src="img/Flags/Chile.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Chile">Chile</td><td align="right">3 - 7</td><td align="right">(-127)</td></tr>
<tr><td width="200"><img src="img/Flags/Venezuela.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Venezuela">Venezuela</td><td align="right">2 - 8</td><td align="right">(-192)</td></tr>
<tr><td width="200"><img src="img/Flags/Mexico.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Mexico">Mexico</td><td align="right">1 - 9</td><td align="right">(-228)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP H</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Germany">Germany</td><td align="right">9 - 1</td><td align="right">(+198)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bulgaria">Bulgaria</td><td align="right">7 - 3</td><td align="right">(+71)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=France">France</td><td align="right">7 - 3</td><td align="right">(+61)</td></tr>
<tr><td width="200"><img src="img/Flags/Denmark.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Denmark">Denmark</td><td align="right">4 - 6</td><td align="right">(-12)</td></tr>
<tr><td width="200"><img src="img/Flags/Thailand.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Thailand">Thailand</td><td align="right">3 - 7</td><td align="right">(-110)</td></tr>
<tr><td width="200"><img src="img/Flags/India.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=India">India</td><td align="right">0 - 10</td><td align="right">(-208)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP I</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia">Estonia</td><td align="right">9 - 1</td><td align="right">(+135)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Cyprus.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Cyprus">Cyprus</td><td align="right">7 - 3</td><td align="right">(+129)</td></tr>
<tr><td width="200"><img src="img/Flags/China.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=China">China</td><td align="right">6 - 4</td><td align="right">(+19)</td></tr>
<tr><td width="200"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Portugal">Portugal</td><td align="right">5 - 5</td><td align="right">(+74)</td></tr>
<tr><td width="200"><img src="img/Flags/Albania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Albania">Albania</td><td align="right">3 - 7</td><td align="right">(-116)</td></tr>
<tr><td width="200"><img src="img/Flags/Norway.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Norway">Norway</td><td align="right">0 - 10</td><td align="right">(-241)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP J</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/FYR Macedonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=FYR Macedonia">FYR Macedonia</td><td align="right">9 - 1</td><td align="right">(+204)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Turkey">Turkey</td><td align="right">9 - 1</td><td align="right">(+176)</td></tr>
<tr><td width="200"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Croatia">Croatia</td><td align="right">6 - 4</td><td align="right">(+113)</td></tr>
<tr><td width="200"><img src="img/Flags/Indonesia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Indonesia">Indonesia</td><td align="right">4 - 6</td><td align="right">(-43)</td></tr>
<tr><td width="200"><img src="img/Flags/Hong Kong.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Hong Kong">Hong Kong</td><td align="right">1 - 9</td><td align="right">(-216)</td></tr>
<tr><td width="200"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=USA">USA</td><td align="right">1 - 9</td><td align="right">(-234)</td></tr>
</table>

<?php
} elseif($swc==8) {
?>
<b>8th World Cup - Final Standings</b><br/><br/>

<span style="background-image:url(/img/12gold.gif); background-repeat: no-repeat;">&nbsp;1&nbsp;</span> <a href="nationalteams.php?country=Germany" class="greenhilite">Germany</a> (<a href="club.php?clubid=45342">sneakyerik</a>)<br/>
<span style="background-image:url(/img/12silver.gif); background-repeat: no-repeat;">&nbsp;2&nbsp;</span> <a href="nationalteams.php?country=Lithuania" class="greenhilite">Lithuania</a> (<a href="club.php?clubid=11643">Gizzo</a>)<br/>
<span style="background-image:url(/img/12bronze.gif); background-repeat: no-repeat;">&nbsp;3&nbsp;</span> <a href="nationalteams.php?country=Slovenia" class="greenhilite">Slovenia</a> (<a href="club.php?clubid=1078">schmex</a>)<br/>
&nbsp;4. <a href="nationalteams.php?country=Greece" class="greenhilite">Greece</a> (<a href="club.php?clubid=9530">Tasos</a>)<br/>
&nbsp;5. <a href="nationalteams.php?country=Argentina" class="greenhilite">Argentina</a> (<a href="club.php?clubid=74993">aioria</a>)<br/>
&nbsp;6. <a href="nationalteams.php?country=Poland" class="greenhilite">Poland</a> (<a href="club.php?clubid=3231">salo</a>)<br/>
&nbsp;7. <a href="nationalteams.php?country=Serbia" class="greenhilite">Serbia</a> (<a href="club.php?clubid=4766">Mod-DuXoMaN</a>)<br/>
&nbsp;8. <a href="nationalteams.php?country=Australia" class="greenhilite">Australia</a> (<a href="club.php?clubid=54506">Deejohnson</a>)<br/>
&nbsp;9. <a href="nationalteams.php?country=Netherlands" class="greenhilite">Netherlands</a> (<a href="club.php?clubid=21218">Rene</a>)<br/>
&nbsp;10. <a href="nationalteams.php?country=Estonia" class="greenhilite">Estonia</a> (<a href="club.php?clubid=3114">Eissa</a>)<br/>
&nbsp;11. <a href="nationalteams.php?country=Czech Republic" class="greenhilite">Czech Republic</a> (<a href="club.php?clubid=39652">jzajko</a>)<br/>
&nbsp;12. <a href="nationalteams.php?country=Cyprus" class="greenhilite">Cyprus</a> (<a href="club.php?clubid=76132">Kais</a>)<br/>
&nbsp;13. <a href="nationalteams.php?country=Italy" class="greenhilite">Italy</a> (<a href="club.php?clubid=25950">Giorgiojj</a>)<br/>
&nbsp;14. <a href="nationalteams.php?country=Finland" class="greenhilite">Finland</a> (<a href="club.php?clubid=16621">MOD-ThanosFR</a>)<br/>
&nbsp;15. <a href="nationalteams.php?country=Spain" class="greenhilite">Spain</a> (<a href="club.php?clubid=35746">Rainman</a>)<br/>
&nbsp;16. <a href="nationalteams.php?country=Belgium" class="greenhilite">Belgium</a> (<a href="club.php?clubid=16828">Jaumin</a>)<br/>
&nbsp;17. <a href="nationalteams.php?country=Turkey" class="greenhilite">Turkey</a> (<a href="club.php?clubid=62681">maydanoz</a>)<br/>
&nbsp;18. <a href="nationalteams.php?country=FYR Macedonia" class="greenhilite">FYR Macedonia</a> (<a href="club.php?clubid=9119">GM-starte</a>)<br/>
&nbsp;19. <a href="nationalteams.php?country=Slovakia" class="greenhilite">Slovakia</a> (<a href="club.php?clubid=25696">Mattej</a>)<br/>
&nbsp;20. <a href="nationalteams.php?country=Latvia" class="greenhilite">Latvia</a> (<a href="club.php?clubid=35881">Magician</a>)<br/>
&nbsp;21. <a href="nationalteams.php?country=United Kingdom" class="greenhilite">United Kingdom</a> (<a href="club.php?clubid=17211">jazon1977</a>)<br/>
&nbsp;22. <a href="nationalteams.php?country=Croatia" class="greenhilite">Croatia</a> (<a href="club.php?clubid=45827">TuTn</a>)<br/>
&nbsp;23. <a href="nationalteams.php?country=Bosnia and Herzegovina" class="greenhilite">Bosnia and Herzegovina</a> (<a href="club.php?clubid=102548">JocoM_Selektor_BIH</a>)<br/>
&nbsp;24. <a href="nationalteams.php?country=Portugal" class="greenhilite">Portugal</a> (<a href="club.php?clubid=20311">MOD-danip</a>)<br/>
&nbsp;25. <a href="nationalteams.php?country=France" class="greenhilite">France</a> (<a href="club.php?clubid=30759">Ronny</a>)<br/>
&nbsp;26. <a href="nationalteams.php?country=Israel" class="greenhilite">Israel</a> (<a href="club.php?clubid=4022">irmi82</a>)<br/>
&nbsp;27. <a href="nationalteams.php?country=China" class="greenhilite">China</a> (<a href="club.php?clubid=5900">pxgjon</a>)<br/>
&nbsp;28. <a href="nationalteams.php?country=Romania" class="greenhilite">Romania</a> (<a href="club.php?clubid=2590">Dobay</a>)<br/>
&nbsp;29. <a href="nationalteams.php?country=Philippines" class="greenhilite">Philippines</a> (<a href="club.php?clubid=126883">Vonix06</a>)<br/>
&nbsp;30. <a href="nationalteams.php?country=Canada" class="greenhilite">Canada</a> (<a href="club.php?clubid=57125">Packman</a>)

</td><td class="border" width="50%">

<b><?=$langmark1448?></b><br/><br/>

<?=$langmark1453?>: <a href="league.php?country=Bulgaria">Bulgaria</a>, <a href="league.php?country=Romania">Romania</a><br/>
<?=$langmark1449?>: 60<br/>
<?=$langmark1450?>: 393<br/>
<?=$langmark1451?>: 11.383.274<br/>
<?=$langmark1452?>: 28.965<br/>

<br/><b><?=$langmark1454?></b><br/><br/>

PG: <a href="player.php?playerid=1558308">Heinz Wunderlich</a> (Germany)<br/>
SG: <a href="player.php?playerid=1690992">Epifanios Kaikis</a> (Greece)<br/>
SF: <a href="player.php?playerid=643838">Kristian Derksen</a> (Netherlands)<br/>
PF: <a href="player.php?playerid=2042895">Tomaž Šter</a> (Slovenia)<br/>
C: <a href="player.php?playerid=1124625">Arvydas Čekaitis</a> (Lithuania)<br/>

<br/><?=$langmark1455?>: <a href="player.php?playerid=1558308">Heinz Wunderlich</a> (Germany)
<br/><?=$langmark1456?>: <a href="player.php?playerid=2020287">Mike Häcke</a> (Germany)
<br/>Coach of the tournament: <a href="club.php?clubid=45342">sneakyerik</a> (Germany)

<?php
$a = $_GET["a"];
if ($a=='y') {?>
<br/><br/><b>Statistical leaders</b> <a href="<?=$_SERVER['REQUEST_URI']?>&a=n" class="greenhilite" title="close">[x]</a><br/>
<br/>Points: <a href="player.php?playerid=1690992">Epifanios Kaikis</a> (Greece)
<br/>Rebounds: <a href="player.php?playerid=1124625">Arvydas Čekaitis</a> (Lithuania)
<br/>Assist: <a href="player.php?playerid=1622065">Valon Grdovič</a> (Slovenia)
<br/>Blocks: <a href="player.php?playerid=725326">Radomir Vidojković</a> (Serbia)
<br/>Steals: <a href="player.php?playerid=2038926">Vygandas Purlys</a> (Lithuania)
<?php } else {echo "<br/><br/><a href=\"",$_SERVER['REQUEST_URI'],"?go=kart&a=y\">statistical leaders</a>";}?>
</td>
</tr>
</table>

<table cellspacing="9" cellpadding="9" border="0" width="100%">
<tr bgcolor="white">
<td class="border" bgcolor="white" width="50%" valign="top">

<b><?=$langmark1457?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Germany">Germany</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=14533">96&nbsp;:&nbsp;77</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Lithuania">Lithuania</a>&nbsp;<img src="img/Flags/Lithuania.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1458?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Greece">Greece</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=14534">97&nbsp;:&nbsp;99</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Slovenia">Slovenia</a>&nbsp;<img src="img/Flags/Slovenia.png" border="0" alt=""></td></tr>
</table>

<br/><b>5th place match</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Poland">Poland</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=14535">78&nbsp;:&nbsp;84</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Argentina">Argentina</a>&nbsp;<img src="img/Flags/Argentina.png" border="0" alt=""></td></tr>
</table>

<br/><b>7th place match</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Australia">Australia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=14509">74&nbsp;:&nbsp;91</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Serbia">Serbia</a>&nbsp;<img src="img/Flags/Serbia.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1459?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Germany">Germany</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=14507">90&nbsp;:&nbsp;88</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Greece">Greece</a>&nbsp;<img src="img/Flags/Greece.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovenia">Slovenia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=14508">95&nbsp;:&nbsp;105</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Lithuania">Lithuania</a>&nbsp;<img src="img/Flags/Lithuania.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1460?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Germany">Germany</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=14483">88&nbsp;:&nbsp;86</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Poland">Poland</a>&nbsp;<img src="img/Flags/Poland.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Greece">Greece</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=14484">87&nbsp;:&nbsp;85</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Australia">Australia</a>&nbsp;<img src="img/Flags/Australia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Argentina">Argentina</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=14485">87&nbsp;:&nbsp;88</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Slovenia">Slovenia</a>&nbsp;<img src="img/Flags/Slovenia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Serbia">Serbia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=14486">91&nbsp;:&nbsp;101</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Lithuania">Lithuania</a>&nbsp;<img src="img/Flags/Lithuania.png" border="0" alt=""></td></tr>
</table>

<br/><b>Round of 16</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">

<tr><td align="left" width="42%"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Germany">Germany</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=14447">94&nbsp;:&nbsp;81</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Finland">Finland</a>&nbsp;<img src="img/Flags/Finland.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Poland">Poland</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=14448">89&nbsp;:&nbsp;86</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Cyprus">Cyprus</a>&nbsp;<img src="img/Flags/Cyprus.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Greece">Greece</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=14449">102&nbsp;:&nbsp;99</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Estonia">Estonia</a>&nbsp;<img src="img/Flags/Estonia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Australia">Australia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=14450">97&nbsp;:&nbsp;83</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Spain">Spain</a>&nbsp;<img src="img/Flags/Spain.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Italy">Italy</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=14451">75&nbsp;:&nbsp;83</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Argentina">Argentina</a>&nbsp;<img src="img/Flags/Argentina.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Czech Republic.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Czech Republic">Czech Republic</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=14452">88&nbsp;:&nbsp;91</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Slovenia">Slovenia</a>&nbsp;<img src="img/Flags/Slovenia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Netherlands.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Netherlands">Netherlands</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=14453">92&nbsp;:&nbsp;93</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Serbia">Serbia</a>&nbsp;<img src="img/Flags/Serbia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Belgium">Belgium</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=14454">80&nbsp;:&nbsp;105</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Lithuania">Lithuania</a>&nbsp;<img src="img/Flags/Lithuania.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1462?></b><br/>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b> <i>(<a class="greenhilite" href="region.php?region=Bucureşti">Bucureşti</a>)</i></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Italy">Italy</td><td align="right">5 - 0</td><td align="right">(+79)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Poland">Poland</td><td align="right">3 - 2</td><td align="right">(+71)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Lithuania">Lithuania</td><td align="right">3 - 2</td><td align="right">(+67)</td></tr>
<tr><td width="200"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovakia">Slovakia</td><td align="right">2 - 3</td><td align="right">(-19)</td></tr>
<tr><td width="200"><img src="img/Flags/Bosnia and Herzegovina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bosnia and Herzegovina">Bosnia and Herzegovina</td><td align="right">2 - 3</td><td align="right">(-41)</td></tr>
<tr><td width="200"><img src="img/Flags/Canada.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Canada">Canada</td><td align="right">0 - 5</td><td align="right">(-157)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b> <i>(<a class="greenhilite" href="region.php?region=Constanţa">Constanţa</a>/<a class="greenhilite" href="region.php?region=Buzău">Buzău</a>)</i></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Netherlands.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Netherlands">Netherlands</td><td align="right">5 - 0</td><td align="right">(+48)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Czech Republic.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Czech Republic">Czech Republic</td><td align="right">4 - 1</td><td align="right">(+34)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia">Estonia</td><td align="right">3 - 2</td><td align="right">(+23)</td></tr>
<tr><td width="200"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Latvia">Latvia</td><td align="right">2 - 3</td><td align="right">(-27)</td></tr>
<tr><td width="200"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Portugal">Portugal</td><td align="right">1 - 4</td><td align="right">(-2)</td></tr>
<tr><td width="200"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Romania">Romania</td><td align="right">0 - 5</td><td align="right">(-76)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b> <i>(<a class="greenhilite" href="region.php?region=Yambol">Yambol</a>)</i></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Germany">Germany</td><td align="right">5 - 0</td><td align="right">(+98)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Cyprus.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Cyprus">Cyprus</td><td align="right">3 - 2</td><td align="right">(+25)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Serbia">Serbia</td><td align="right">3 - 2</td><td align="right">(-5)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Argentina">Argentina</td><td align="right">3 - 2</td><td align="right">(-8)</td></tr>
<tr><td width="200"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=France">France</td><td align="right">1 - 4</td><td align="right">(-57)</td></tr>
<tr><td width="200"><img src="img/Flags/China.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=China">China</td><td align="right">0 - 5</td><td align="right">(-53)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b> <i>(<a class="greenhilite" href="region.php?region=Sofia">Sofia</a>)</i></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Greece">Greece</td><td align="right">4 - 1</td><td align="right">(+77)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Belgium">Belgium</td><td align="right">4 - 1</td><td align="right">(+35)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Spain">Spain</td><td align="right">3 - 2</td><td align="right">(+39)</td></tr>
<tr><td width="200"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Turkey">Turkey</td><td align="right">2 - 3</td><td align="right">(+9)</td></tr>
<tr><td width="200"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Croatia">Croatia</td><td align="right">2 - 3</td><td align="right">(-27)</td></tr>
<tr><td width="200"><img src="img/Flags/Philippines.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Philippines">Philippines</td><td align="right">0 - 5</td><td align="right">(-133)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP E</b> <i>(<a class="greenhilite" href="region.php?region=Stara Zagora">Stara Zagora</a>)</i></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Australia">Australia</td><td align="right">3 - 2</td><td align="right">(+25)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovenia">Slovenia</td><td align="right">3 - 2</td><td align="right">(+9)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Finland">Finland</td><td align="right">3 - 2</td><td align="right">(0)</td></tr>
<tr><td width="200"><img src="img/Flags/FYR Macedonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=FYR Macedonia">FYR Macedonia</td><td align="right">2 - 3</td><td align="right">(+6)</td></tr>
<tr><td width="200"><img src="img/Flags/United Kingdom.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=United Kingdom">United Kingdom</td><td align="right">2 - 3</td><td align="right">(-16)</td></tr>
<tr><td width="200"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Israel">Israel</td><td align="right">2 - 3</td><td align="right">(-24)</td></tr>
</table>

</td>
<td width="50%" valign="top" class="border" bgcolor="white">

<b><?=$langmark1463?></b><br/>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b><!-- (<a class="greenhilite" href="region.php?region=Harjumaa"><i>Harjumaa</i></a>)--></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Greece">Greece</td><td align="right">8 - 2</td><td align="right">(+164)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Bosnia and Herzegovina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bosnia and Herzegovina">Bosnia and Herzegovina</td><td align="right">8 - 2</td><td align="right">(+143)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/FYR Macedonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=FYR Macedonia">FYR Macedonia</td><td align="right">6 - 4</td><td align="right">(+89)</td></tr>
<tr><td width="200"><img src="img/Flags/Russia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Russia">Russia</td><td align="right">4 - 6</td><td align="right">(-117)</td></tr>
<tr><td width="200"><img src="img/Flags/Ireland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Ireland">Ireland</td><td align="right">3 - 7</td><td align="right">(-218)</td></tr>
<tr><td width="200"><img src="img/Flags/Ukraine.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Ukraine">Ukraine</td><td align="right">1 - 9</td><td align="right">(-61)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b><!-- (<a class="greenhilite" href="region.php?region=Ventspils"><i>Ventspils</i></a>)--></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Finland">Finland</td><td align="right">9 - 1</td><td align="right">(+155)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Serbia">Serbia</td><td align="right">8 - 2</td><td align="right">(+165)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Lithuania">Lithuania</td><td align="right">6 - 4</td><td align="right">(+95)</td></tr>
<tr><td width="200"><img src="img/Flags/Switzerland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Switzerland">Switzerland</td><td align="right">5 - 5</td><td align="right">(+30)</td></tr>
<tr><td width="200"><img src="img/Flags/New Zealand.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=New Zealand">New Zealand</td><td align="right">2 - 8</td><td align="right">(-242)</td></tr>
<tr><td width="200"><img src="img/Flags/Peru.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Peru">Peru</td><td align="right">0 - 10</td><td align="right">(-203)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b><!-- (<a class="greenhilite" href="region.php?region=Rīga"><i>Rīga</i></a>)--></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Argentina">Argentina</td><td align="right">10 - 0</td><td align="right">(+226)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Turkey">Turkey</td><td align="right">8 - 2</td><td align="right">(+135)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Netherlands.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Netherlands">Netherlands</td><td align="right">5 - 5</td><td align="right">(+52)</td></tr>
<tr><td width="200"><img src="img/Flags/Brazil.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Brazil">Brazil</td><td align="right">4 - 6</td><td align="right">(+9)</td></tr>
<tr><td width="200"><img src="img/Flags/Hong Kong.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Hong Kong">Hong Kong</td><td align="right">2 - 8</td><td align="right">(-172)</td></tr>
<tr><td width="200"><img src="img/Flags/Egypt.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Egypt">Egypt</td><td align="right">1 - 9</td><td align="right">(-250)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b><!-- (<a class="greenhilite" href="region.php?region=Tartumaa"><i>Tartumaa</i></a>)--></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Poland">Poland</td><td align="right">9 - 1</td><td align="right">(+104)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Latvia">Latvia</td><td align="right">8 - 2</td><td align="right">(+144)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Philippines.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Philippines">Philippines</td><td align="right">7 - 3</td><td align="right">(+99)</td></tr>
<tr><td width="200"><img src="img/Flags/Colombia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Colombia">Colombia</td><td align="right">4 - 6</td><td align="right">(-32)</td></tr>
<tr><td width="200"><img src="img/Flags/Mexico.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Mexico">Mexico</td><td align="right">2 - 8</td><td align="right">(-150)</td></tr>
<tr><td width="200"><img src="img/Flags/Tunisia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Tunisia">Tunisia</td><td align="right">0 - 10</td><td align="right">(-165)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP E</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Spain">Spain</td><td align="right">9 - 1</td><td align="right">(+233)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/United Kingdom.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=United Kingdom">United Kingdom</td><td align="right">8 - 2</td><td align="right">(+58)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Canada.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Canada">Canada</td><td align="right">6 - 4</td><td align="right">(+27)</td></tr>
<tr><td width="200"><img src="img/Flags/Hungary.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Hungary">Hungary</td><td align="right">5 - 5</td><td align="right">(-65)</td></tr>
<tr><td width="200"><img src="img/Flags/Chile.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Chile">Chile</td><td align="right">2 - 8</td><td align="right">(-45)</td></tr>
<tr><td width="200"><img src="img/Flags/Malaysia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Malaysia">Malaysia</td><td align="right">0 - 10</td><td align="right">(-208)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP F</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovenia">Slovenia</td><td align="right">9 - 1</td><td align="right">(+132)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovakia">Slovakia</td><td align="right">8 - 2</td><td align="right">(+108)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Croatia">Croatia</td><td align="right">6 - 4</td><td align="right">(+66)</td></tr>
<tr><td width="200"><img src="img/Flags/Albania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Albania">Albania</td><td align="right">4 - 6</td><td align="right">(-69)</td></tr>
<tr><td width="200"><img src="img/Flags/South Korea.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=South Korea">South Korea</td><td align="right">2 - 8</td><td align="right">(-134)</td></tr>
<tr><td width="200"><img src="img/Flags/Denmark.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Denmark">Denmark</td><td align="right">1 - 9</td><td align="right">(-103)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP G</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Romania">Romania</td><td align="right">8 - 2</td><td align="right">(+135)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Belgium">Belgium</td><td align="right">7 - 3</td><td align="right">(+141)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/China.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=China">China</td><td align="right">7 - 3</td><td align="right">(+126)</td></tr>
<tr><td width="200"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bulgaria">Bulgaria</td><td align="right">6 - 4</td><td align="right">(+87)</td></tr>
<tr><td width="200"><img src="img/Flags/Thailand.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Thailand">Thailand</td><td align="right">1 - 9</td><td align="right">(-227)</td></tr>
<tr><td width="200"><img src="img/Flags/India.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=India">India</td><td align="right">1 - 9</td><td align="right">(-262)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP H</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Italy">Italy</td><td align="right">9 - 1</td><td align="right">(+179)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Portugal">Portugal</td><td align="right">6 - 4</td><td align="right">(+97)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=France">France</td><td align="right">6 - 4</td><td align="right">(+54)</td></tr>
<tr><td width="200"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=USA">USA</td><td align="right">5 - 5</td><td align="right">(+43)</td></tr>
<tr><td width="200"><img src="img/Flags/Indonesia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Indonesia">Indonesia</td><td align="right">4 - 6</td><td align="right">(+3)</td></tr>
<tr><td width="200"><img src="img/Flags/Montenegro.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Montenegro">Montenegro</td><td align="right">0 - 10</td><td align="right">(-376)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP I</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Germany">Germany</td><td align="right">8 - 2</td><td align="right">(+128)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Australia">Australia</td><td align="right">8 - 2</td><td align="right">(+46)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Czech Republic.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Czech Republic">Czech Republic</td><td align="right">6 - 4</td><td align="right">(+109)</td></tr>
<tr><td width="200"><img src="img/Flags/Uruguay.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Uruguay">Uruguay</td><td align="right">4 - 6</td><td align="right">(+5)</td></tr>
<tr><td width="200"><img src="img/Flags/Venezuela.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Venezuela">Venezuela</td><td align="right">3 - 7</td><td align="right">(-76)</td></tr>
<tr><td width="200"><img src="img/Flags/Malta.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Malta">Malta</td><td align="right">1 - 9</td><td align="right">(-212)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP J</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia">Estonia</td><td align="right">9 - 1</td><td align="right">(+244)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Cyprus.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Cyprus">Cyprus</td><td align="right">7 - 3</td><td align="right">(+102)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Israel">Israel</td><td align="right">6 - 4</td><td align="right">(+56)</td></tr>
<tr><td width="200"><img src="img/Flags/Sweden.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Sweden">Sweden</td><td align="right">4 - 6</td><td align="right">(-54)</td></tr>
<tr><td width="200"><img src="img/Flags/Austria.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Austria">Austria</td><td align="right">4 - 6</td><td align="right">(-91)</td></tr>
<tr><td width="200"><img src="img/Flags/Norway.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Norway">Norway</td><td align="right">0 - 10</td><td align="right">(-257)</td></tr>
</table>

<?php
} elseif($swc==9) {
?>
<b>9th World Cup - Final Standings</b><br/><br/>

<span style="background-image:url(/img/12gold.gif); background-repeat: no-repeat;">&nbsp;1&nbsp;</span> <a href="nationalteams.php?country=Estonia" class="greenhilite">Estonia</a> (<a href="club.php?clubid=6911">Tony</a>)<br/>
<span style="background-image:url(/img/12silver.gif); background-repeat: no-repeat;">&nbsp;2&nbsp;</span> <a href="nationalteams.php?country=Slovenia" class="greenhilite">Slovenia</a> (<a href="club.php?clubid=675">Xfile</a>)<br/>
<span style="background-image:url(/img/12bronze.gif); background-repeat: no-repeat;">&nbsp;3&nbsp;</span> <a href="nationalteams.php?country=Germany" class="greenhilite">Germany</a> (<a href="club.php?clubid=45342">sneakyerik</a>)<br/>
&nbsp;4. <a href="nationalteams.php?country=Romania" class="greenhilite">Romania</a> (<a href="club.php?clubid=2590">Dobay</a>)<br/>
&nbsp;5. <a href="nationalteams.php?country=Greece" class="greenhilite">Greece</a> (<a href="club.php?clubid=10840">n13costas</a>)<br/>
&nbsp;6. <a href="nationalteams.php?country=Bosnia and Herzegovina" class="greenhilite">Bosnia and Herzegovina</a> (<a href="club.php?clubid=8184">sirbeg</a>)<br/>
&nbsp;7. <a href="nationalteams.php?country=Finland" class="greenhilite">Finland</a> (<a href="club.php?clubid=104090">MOD-madskillz</a>)<br/>
&nbsp;8. <a href="nationalteams.php?country=Belgium" class="greenhilite">Belgium</a> (<a href="club.php?clubid=35384">bahali</a>)<br/>
&nbsp;9. <a href="nationalteams.php?country=Argentina" class="greenhilite">Argentina</a> (<a href="club.php?clubid=74993">aioria</a>)<br/>
&nbsp;10. <a href="nationalteams.php?country=Latvia" class="greenhilite">Latvia</a> (<a href="club.php?clubid=13728">MOD-kasers</a>)<br/>
&nbsp;11. <a href="nationalteams.php?country=Bulgaria" class="greenhilite">Bulgaria</a> (<a href="club.php?clubid=12183">ivooo</a>)<br/>
&nbsp;12. <a href="nationalteams.php?country=Poland" class="greenhilite">Poland</a> (<a href="club.php?clubid=4453">hesus</a>)<br/>
&nbsp;13. <a href="nationalteams.php?country=France" class="greenhilite">France</a> (<a href="club.php?clubid=30759">Ronny</a>)<br/>
&nbsp;14. <a href="nationalteams.php?country=Turkey" class="greenhilite">Turkey</a> (<a href="club.php?clubid=7688">balbak</a>)<br/>
&nbsp;15. <a href="nationalteams.php?country=Italy" class="greenhilite">Italy</a> (<a href="club.php?clubid=47027">The_Huge</a>)<br/>
&nbsp;16. <a href="nationalteams.php?country=Serbia" class="greenhilite">Serbia</a> (<a href="club.php?clubid=2228">puramoca</a>)<br/>
&nbsp;17. <a href="nationalteams.php?country=Lithuania" class="greenhilite">Lithuania</a> (<a href="club.php?clubid=11643">Gizzo</a>)<br/>
&nbsp;18. <a href="nationalteams.php?country=FYR Macedonia" class="greenhilite">FYR Macedonia</a> (<a href="club.php?clubid=9119">GM-starte</a>)<br/>
&nbsp;19. <a href="nationalteams.php?country=Portugal" class="greenhilite">Portugal</a> (<a href="club.php?clubid=1026">SubTekk</a>)<br/>
&nbsp;20. <a href="nationalteams.php?country=Spain" class="greenhilite">Spain</a> (<a href="club.php?clubid=35746">Rainman</a>)<br/>
&nbsp;21. <a href="nationalteams.php?country=Israel" class="greenhilite">Israel</a> (<a href="club.php?clubid=1071">TheLaster</a>)<br/>
&nbsp;22. <a href="nationalteams.php?country=Czech Republic" class="greenhilite">Czech Republic</a> (<a href="club.php?clubid=39652">jzajko</a>)<br/>
&nbsp;23. <a href="nationalteams.php?country=Slovakia" class="greenhilite">Slovakia</a> (<a href="club.php?clubid=25696">Mattej</a>)<br/>
&nbsp;24. <a href="nationalteams.php?country=Russia" class="greenhilite">Russia</a> (<a href="club.php?clubid=41156">MOD-Sanych</a>)<br/>
&nbsp;25. <a href="nationalteams.php?country=Australia" class="greenhilite">Australia</a> (<a href="club.php?clubid=54506">Deejohnson</a>)<br/>
&nbsp;26. <a href="nationalteams.php?country=China" class="greenhilite">China</a> (<a href="club.php?clubid=5900">pxgjon</a>)<br/>
&nbsp;27. <a href="nationalteams.php?country=Croatia" class="greenhilite">Croatia</a> (<a href="club.php?clubid=6106">lovre_7</a>)<br/>
&nbsp;28. <a href="nationalteams.php?country=United Kingdom" class="greenhilite">United Kingdom</a> (<a href="club.php?clubid=4502">wizard</a>)<br/>
&nbsp;29. <a href="nationalteams.php?country=Uruguay" class="greenhilite">Uruguay</a> (<a href="club.php?clubid=47180">dinamo_14</a>)<br/>
&nbsp;30. <a href="nationalteams.php?country=Sweden" class="greenhilite">Sweden</a> (<a href="club.php?clubid=129063">jonas_strandba</a>)<br/>
&nbsp;31. <a href="nationalteams.php?country=Hong Kong" class="greenhilite">Hong Kong</a> (<a href="club.php?clubid=5864">nikogucci</a>)<br/>
&nbsp;32. <a href="nationalteams.php?country=Indonesia" class="greenhilite">Indonesia</a> (<a href="club.php?clubid=53061">mschein1</a>)

</td><td class="border" width="50%">

<b><?=$langmark1448?></b><br/><br/>

<?=$langmark1453?>: <a href="league.php?country=Greece">Greece</a><br/>
<?=$langmark1449?>: 64<br/>
<?=$langmark1450?>: 522<br/>
<?=$langmark1451?>: 14.621.943<br/>
<?=$langmark1452?>: 28.011<br/>

<br/><b><?=$langmark1454?></b><br/><br/>

PG: <a href="player.php?playerid=1956719">Urban Žlebir</a> (Slovenia)<br/>
SG: <a href="player.php?playerid=1934696">Peep Kangur</a> (Estonia)<br/>
SF: <a href="player.php?playerid=1593170">Sotiris Sfentonas</a> (Greece)<br/>
PF: <a href="player.php?playerid=1491589">Vlatko Jopec</a> (BiH)<br/>
C: <a href="player.php?playerid=1177843">Bert Bleibtreu</a> (Germany)<br/>

<br/><?=$langmark1455?>: <a href="player.php?playerid=1956719">Urban Žlebir</a> (Slovenia)
<br/><?=$langmark1456?>: <a href="player.php?playerid=1934696">Peep Kangur</a> (Estonia)
<br/>Coach of the tournament: <a href="club.php?clubid=6911">Tony</a> (Estonia)

<?php
$a = $_GET["a"];
if ($a=='y') {?>
<br/><br/><b>Statistical leaders</b> <a href="<?=$_SERVER['REQUEST_URI']?>&a=n" class="greenhilite" title="close">[x]</a><br/>
<br/>Points: <a href="player.php?playerid=1622065">Valon Grdovič</a> (Slovenia)
<br/>Rebounds: <a href="player.php?playerid=2042895">Tomaž Šter</a> (Slovenia)
<br/>Assist: <a href="player.php?playerid=2039522">Jan Bekker</a> (Germany)
<br/>Blocks: <a href="player.php?playerid=2020287">Mike Häcke</a> (Germany)
<br/>Steals: <a href="player.php?playerid=1956719">Urban Žlebir</a> (Slovenia)
<?php } else {echo "<br/><br/><a href=\"",$_SERVER['REQUEST_URI'],"?go=kart&a=y\">statistical leaders</a>";}?>
</td>
</tr>
</table>

<table cellspacing="9" cellpadding="9" border="0" width="100%">
<tr bgcolor="white">
<td class="border" bgcolor="white" width="50%" valign="top">

<b><?=$langmark1457?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia">Estonia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=16771">95&nbsp;:&nbsp;94</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Slovenia">Slovenia</a>&nbsp;<img src="img/Flags/Slovenia.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1458?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Germany">Germany</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=16772">90&nbsp;:&nbsp;88</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Romania">Romania</a>&nbsp;<img src="img/Flags/Romania.png" border="0" alt=""></td></tr>
</table>

<br/><b>5th place match</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Greece">Greece</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=16773">110&nbsp;:&nbsp;106</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Bosnia">BiH</a>&nbsp;<img src="img/Flags/Bosnia.png" border="0" alt=""></td></tr>
</table>

<br/><b>7th place match</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Belgium">Belgium</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=16754">86&nbsp;:&nbsp;98</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Finland">Finland</a>&nbsp;<img src="img/Flags/Finland.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1459?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Germany">Germany</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=16752">82&nbsp;:&nbsp;91</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Estonia">Estonia</a>&nbsp;<img src="img/Flags/Estonia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovenia">Slovenia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=16753">99&nbsp;:&nbsp;89</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Romania">Romania</a>&nbsp;<img src="img/Flags/Romania.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1460?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Greece">Greece</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=16713">89&nbsp;:&nbsp;96</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Germany">Germany</a>&nbsp;<img src="img/Flags/Germany.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia">Estonia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=16714">110&nbsp;:&nbsp;84</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Belgium">Belgium</a>&nbsp;<img src="img/Flags/Belgium.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Finland">Finland</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=16715">98&nbsp;:&nbsp;117</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Slovenia">Slovenia</a>&nbsp;<img src="img/Flags/Slovenia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Romania">Romania</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=16716">107&nbsp;:&nbsp;94</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Bosnia">BiH</a>&nbsp;<img src="img/Flags/Bosnia.png" border="0" alt=""></td></tr>

</table><br/><b>Round of 16</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Greece">Greece</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=16682">91&nbsp;:&nbsp;89</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Latvia">Latvia</a>&nbsp;<img src="img/Flags/Latvia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Germany">Germany</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=16683">94&nbsp;:&nbsp;61</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Serbia">Serbia</a>&nbsp;<img src="img/Flags/Serbia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia">Estonia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=16684">100&nbsp;:&nbsp;88</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Turkey">Turkey</a>&nbsp;<img src="img/Flags/Turkey.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Belgium">Belgium</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=16685">94&nbsp;:&nbsp;88</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=France">France</a>&nbsp;<img src="img/Flags/France.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Poland">Poland</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=16686">81&nbsp;:&nbsp;86</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Finland">Finland</a>&nbsp;<img src="img/Flags/Finland.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovenia">Slovenia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=16687">99&nbsp;:&nbsp;76</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Italy">Italy</a>&nbsp;<img src="img/Flags/Italy.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Romania">Romania</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=16688">95&nbsp;:&nbsp;92</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Bulgaria">Bulgaria</a>&nbsp;<img src="img/Flags/Bulgaria.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Bosnia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bosnia">BiH</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=16689">96&nbsp;:&nbsp;95</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Argentina">Argentina</a>&nbsp;<img src="img/Flags/Argentina.png" border="0" alt=""></td></tr>
</table>

<br/><b>Playoff round</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Russia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Russia">Russia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=16652">80&nbsp;:&nbsp;104</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Latvia">Latvia</a>&nbsp;<img src="img/Flags/Latvia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Serbia">Serbia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=16653">101&nbsp;:&nbsp;100</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Lithuania">Lithuania</a>&nbsp;<img src="img/Flags/Lithuania.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Turkey">Turkey</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=16654">115&nbsp;:&nbsp;98</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Slovakia">Slovakia</a>&nbsp;<img src="img/Flags/Slovakia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Spain">Spain</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=16655">81&nbsp;:&nbsp;87</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=France">France</a>&nbsp;<img src="img/Flags/France.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Israel">Israel</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=16656">95&nbsp;:&nbsp;104</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Finland">Finland</a>&nbsp;<img src="img/Flags/Finland.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Czech Republic.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Czech Republic">Czech Republic</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=16657">76&nbsp;:&nbsp;90</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Italy">Italy</a>&nbsp;<img src="img/Flags/Italy.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/FYR Macedonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=FYR Macedonia">FYR Macedonia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=16658">85&nbsp;:&nbsp;87</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Bulgaria">Bulgaria</a>&nbsp;<img src="img/Flags/Bulgaria.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Portugal">Portugal</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=16659">82&nbsp;:&nbsp;86</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Argentina">Argentina</a>&nbsp;<img src="img/Flags/Argentina.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1462?></b><br/>

<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b> <i>(<a class="greenhilite" href="region.php?region=Attiki">Attiki</a>)</i></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Greece">Greece</td><td align="right">3 - 0</td><td align="right">(+34)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Turkey">Turkey</td><td align="right">2 - 1</td><td align="right">(+30)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Argentina">Argentina</td><td align="right">1 - 2</td><td align="right">(+14)</td></tr>
<tr><td width="200"><img src="img/Flags/Hong Kong.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Hong Kong">Hong Kong</td><td align="right">0 - 3</td><td align="right">(-78)</td></tr>
</table>

<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b> <i>(<a class="greenhilite" href="region.php?region=Kriti">Kriti</a>)</i></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia">Estonia</td><td align="right">2 - 1</td><td align="right">(+20)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Russia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Russia">Russia</td><td align="right">2 - 1</td><td align="right">(+11)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Italy">Italy</td><td align="right">1 - 2</td><td align="right">(+4)</td></tr>
<tr><td width="200"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Croatia">Croatia</td><td align="right">1 - 2</td><td align="right">(-35)</td></tr>
</table>

<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b> <i>(<a class="greenhilite" href="region.php?region=Sterea Ellas">Sterea Ellas</a>)</i></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Germany">Germany</td><td align="right">3 - 0</td><td align="right">(+40)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Spain">Spain</td><td align="right">2 - 1</td><td align="right">(+26)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bulgaria">Bulgaria</td><td align="right">1 - 2</td><td align="right">(-23)</td></tr>
<tr><td width="200"><img src="img/Flags/Uruguay.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Uruguay">Uruguay</td><td align="right">0 - 3</td><td align="right">(-43)</td></tr>
</table>

<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b> <i>(<a class="greenhilite" href="region.php?region=Attiki">Attiki</a>)</i></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Belgium">Belgium</td><td align="right">3 - 0</td><td align="right">(+43)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Serbia">Serbia</td><td align="right">2 - 1</td><td align="right">(+38)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Finland">Finland</td><td align="right">1 - 2</td><td align="right">(+28)</td></tr>
<tr><td width="200"><img src="img/Flags/Indonesia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Indonesia">Indonesia</td><td align="right">0 - 3</td><td align="right">(-109)</td></tr>
</table>

<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP E</b> <i>(<a class="greenhilite" href="region.php?region=Peloponnisos">Peloponnisos</a>)</i></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Poland">Poland</td><td align="right">3 - 0</td><td align="right">(+32)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/FYR Macedonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=FYR Macedonia">FYR Macedonia</td><td align="right">1 - 2</td><td align="right">(0)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=France">France</td><td align="right">1 - 2</td><td align="right">(-7)</td></tr>
<tr><td width="200"><img src="img/Flags/China.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=China">China</td><td align="right">1 - 2</td><td align="right">(-25)</td></tr>
</table>

<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP F</b> <i>(<a class="greenhilite" href="region.php?region=Ipeiros">Ipeiros</a>)</i></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Romania">Romania</td><td align="right">2 - 1</td><td align="right">(+25)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Israel">Israel</td><td align="right">2 - 1</td><td align="right">(-1)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Lithuania">Lithuania</td><td align="right">2 - 1</td><td align="right">(-5)</td></tr>
<tr><td width="200"><img src="img/Flags/United Kingdom.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=United Kingdom">United Kingdom</td><td align="right">0 - 3</td><td align="right">(-19)</td></tr>
</table>

<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP G</b> <i>(<a class="greenhilite" href="region.php?region=Aigaio">Aigaio</a>)</i></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovenia">Slovenia</td><td align="right">3 - 0</td><td align="right">(+57)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Portugal">Portugal</td><td align="right">2 - 1</td><td align="right">(+12)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovakia">Slovakia</td><td align="right">1 - 2</td><td align="right">(+5)</td></tr>
<tr><td width="200"><img src="img/Flags/Sweden.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Sweden">Sweden</td><td align="right">0 - 3</td><td align="right">(-74)</td></tr>
</table>

<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP H</b> <i>(<a class="greenhilite" href="region.php?region=Makedonia">Makedonia</a>)</i></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Bosnia and Herzegovina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bosnia and Herzegovina">Bosnia and Herzegovina</td><td align="right">2 - 1</td><td align="right">(+8)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Czech Republic.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Czech Republic">Czech Republic</td><td align="right">2 - 1</td><td align="right">(+3)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Latvia">Latvia</td><td align="right">1 - 2</td><td align="right">(-2)</td></tr>
<tr><td width="200"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Australia">Australia</td><td align="right">1 - 2</td><td align="right">(-9)</td></tr>
</table>

</td>
<td width="50%" valign="top" class="border" bgcolor="white">

<b><?=$langmark1463?></b><br/>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b><!-- <i>(<a class="greenhilite" href="region.php?region=Bucureşti">Bucureşti</a>)</i>--></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Italy">Italy</td><td align="right">13 - 1</td><td align="right">(+372)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Lithuania">Lithuania</td><td align="right">12 - 2</td><td align="right">(+195)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/FYR Macedonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=FYR Macedonia">FYR Macedonia</td><td align="right">8 - 6</td><td align="right">(+171)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Hong Kong.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Hong Kong">Hong Kong</td><td align="right">8 - 6</td><td align="right">(+67)</td></tr>
<tr><td width="200"><img src="img/Flags/Philippines.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Philippines">Philippines</td><td align="right">6 - 8</td><td align="right">(-19)</td></tr>
<tr><td width="200"><img src="img/Flags/Mexico.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Mexico">Mexico</td><td align="right">5 - 9</td><td align="right">(-61)</td></tr>
<tr><td width="200"><img src="img/Flags/Switzerland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Switzerland">Switzerland</td><td align="right">4 - 10</td><td align="right">(-91)</td></tr>
<tr><td width="200"><img src="img/Flags/Georgia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Georgia">Georgia</td><td align="right">0 - 14</td><td align="right">(-634)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b><!-- <i>(<a class="greenhilite" href="region.php?region=Constanţa">Constanţa</a>/<a class="greenhilite" href="region.php?region=Buzău">Buzău</a>)</i>--></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Poland">Poland</td><td align="right">10 - 4</td><td align="right">(+231)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Croatia">Croatia</td><td align="right">10 - 4</td><td align="right">(+186)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovakia">Slovakia</td><td align="right">9 - 5</td><td align="right">(+70)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Australia">Australia</td><td align="right">9 - 5</td><td align="right">(+62)</td></tr>
<tr><td width="200"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=USA">USA</td><td align="right">9 - 5</td><td align="right">(+29)</td></tr>
<tr><td width="200"><img src="img/Flags/Albania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Albania">Albania</td><td align="right">6 - 8</td><td align="right">(-87)</td></tr>
<tr><td width="200"><img src="img/Flags/Ireland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Ireland">Ireland</td><td align="right">2 - 12</td><td align="right">(-198)</td></tr>
<tr><td width="200"><img src="img/Flags/Malta.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Malta">Malta</td><td align="right">1 - 13</td><td align="right">(-293)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b><!-- <i>(<a class="greenhilite" href="region.php?region=Yambol">Yambol</a>)</i>--></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Finland">Finland</td><td align="right">12 - 2</td><td align="right">(+258)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/China.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=China">China</td><td align="right">12 - 2</td><td align="right">(+230)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia">Estonia</td><td align="right">11 - 3</td><td align="right">(+274)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Israel">Israel</td><td align="right">9 - 5</td><td align="right">(+174)</td></tr>
<tr><td width="200"><img src="img/Flags/Brazil.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Brazil">Brazil</td><td align="right">6 - 8</td><td align="right">(+89)</td></tr>
<tr><td width="200"><img src="img/Flags/Ukraine.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Ukraine">Ukraine</td><td align="right">4 - 10</td><td align="right">(-39)</td></tr>
<tr><td width="200"><img src="img/Flags/Tunisia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Tunisia">Tunisia</td><td align="right">2 - 12</td><td align="right">(-343)</td></tr>
<tr><td width="200"><img src="img/Flags/Puerto Rico.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Puerto Rico">Puerto Rico</td><td align="right">0 - 14</td><td align="right">(-643)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b><!-- <i>(<a class="greenhilite" href="region.php?region=Sofia">Sofia</a>)</i>--></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovenia">Slovenia</td><td align="right">12 - 2</td><td align="right">(+196)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Turkey">Turkey</td><td align="right">11 - 3</td><td align="right">(+221)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/United Kingdom.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=United Kingdom">United Kingdom</td><td align="right">10 - 4</td><td align="right">(+160)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Russia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Russia">Russia</td><td align="right">8 - 6</td><td align="right">(+72)</td></tr>
<tr><td width="200"><img src="img/Flags/India.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=India">India</td><td align="right">5 - 9</td><td align="right">(-171)</td></tr>
<tr><td width="200"><img src="img/Flags/Denmark.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Denmark">Denmark</td><td align="right">4 - 10</td><td align="right">(-167)</td></tr>
<tr><td width="200"><img src="img/Flags/New Zealand.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=New Zealand">New Zealand</td><td align="right">4 - 10</td><td align="right">(-172)</td></tr>
<tr><td width="200"><img src="img/Flags/Netherlands.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Netherlands">Netherlands</td><td align="right">2 - 12</td><td align="right">(-139)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP E</b><!-- <i>(<a class="greenhilite" href="region.php?region=Stara Zagora">Stara Zagora</a>)</i>--></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Bosnia and Herzegovina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bosnia and Herzegovina">Bosnia and Herzegovina</td><td align="right">12 - 2</td><td align="right">(+257)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Belgium">Belgium</td><td align="right">11 - 3</td><td align="right">(+266)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Greece">Greece</td><td align="right">10 - 4</td><td align="right">(+231)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Uruguay.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Uruguay">Uruguay</td><td align="right">8 - 6</td><td align="right">(+148)</td></tr>
<tr><td width="200"><img src="img/Flags/Colombia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Colombia">Colombia</td><td align="right">7 - 7</td><td align="right">(+87)</td></tr>
<tr><td width="200"><img src="img/Flags/Thailand.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Thailand">Thailand</td><td align="right">5 - 9</td><td align="right">(-61)</td></tr>
<tr><td width="200"><img src="img/Flags/Egypt.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Egypt">Egypt</td><td align="right">3 - 11</td><td align="right">(-289)</td></tr>
<tr><td width="200"><img src="img/Flags/Belarus.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Belarus">Belarus</td><td align="right">0 - 14</td><td align="right">(-639)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP F</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Argentina">Argentina</td><td align="right">12 - 2</td><td align="right">(+361)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Latvia">Latvia</td><td align="right">11 - 3</td><td align="right">(+312)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bulgaria">Bulgaria</td><td align="right">11 - 3</td><td align="right">(+220)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Sweden.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Sweden">Sweden</td><td align="right">9 - 5</td><td align="right">(+115)</td></tr>
<tr><td width="200"><img src="img/Flags/Hungary.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Hungary">Hungary</td><td align="right">7 - 7</td><td align="right">(+214)</td></tr>
<tr><td width="200"><img src="img/Flags/Austria.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Austria">Austria</td><td align="right">3 - 11</td><td align="right">(-263)</td></tr>
<tr><td width="200"><img src="img/Flags/Montenegro.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Montenegro">Montenegro</td><td align="right">3 - 11</td><td align="right">(-464)</td></tr>
<tr><td width="200"><img src="img/Flags/Malaysia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Malaysia">Malaysia</td><td align="right">0 - 14</td><td align="right">(-495)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP G</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Romania">Romania</td><td align="right">11 - 3</td><td align="right">(+190)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Spain">Spain</td><td align="right">10 - 4</td><td align="right">(+187)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Serbia">Serbia</td><td align="right">10 - 4</td><td align="right">(+161)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=France">France</td><td align="right">9 - 5</td><td align="right">(+117)</td></tr>
<tr><td width="200"><img src="img/Flags/Chile.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Chile">Chile</td><td align="right">8 - 6</td><td align="right">(+8)</td></tr>
<tr><td width="200"><img src="img/Flags/Canada.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Canada">Canada</td><td align="right">6 - 8</td><td align="right">(-76)</td></tr>
<tr><td width="200"><img src="img/Flags/Peru.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Peru">Peru</td><td align="right">2 - 12</td><td align="right">(-332)</td></tr>
<tr><td width="200"><img src="img/Flags/Norway.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Norway">Norway</td><td align="right">0 - 14</td><td align="right">(-255)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP H</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Germany">Germany</td><td align="right">13 - 1</td><td align="right">(+225)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Portugal">Portugal</td><td align="right">11 - 3</td><td align="right">(+320)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Czech Republic.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Czech Republic">Czech Republic</td><td align="right">10 - 4</td><td align="right">(+160)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Indonesia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Indonesia">Indonesia</td><td align="right">8 - 6</td><td align="right">(+90)</td></tr>
<tr><td width="200"><img src="img/Flags/Cyprus.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Cyprus">Cyprus</td><td align="right">7 - 7</td><td align="right">(+89)</td></tr>
<tr><td width="200"><img src="img/Flags/Venezuela.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Venezuela">Venezuela</td><td align="right">5 - 9</td><td align="right">(-58)</td></tr>
<tr><td width="200"><img src="img/Flags/South Korea.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=South Korea">South Korea</td><td align="right">2 - 12</td><td align="right">(-297)</td></tr>
<tr><td width="200"><img src="img/Flags/Japan.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Japan">Japan</td><td align="right">0 - 14</td><td align="right">(-529)</td></tr>
</table>

<?php
} else {
?>
<b>10th World Cup - Final Standings</b><br/><br/>

<span style="background-image:url(/img/12gold.gif); background-repeat: no-repeat;">&nbsp;1&nbsp;</span> <a href="nationalteams.php?country=Spain" class="greenhilite">Spain</a> (<a href="club.php?clubid=35746">Rainman</a>)<br/>
<span style="background-image:url(/img/12silver.gif); background-repeat: no-repeat;">&nbsp;2&nbsp;</span> <a href="nationalteams.php?country=Italy" class="greenhilite">Italy</a> (<a href="club.php?clubid=47027">The_Huge</a>)<br/>
<span style="background-image:url(/img/12bronze.gif); background-repeat: no-repeat;">&nbsp;3&nbsp;</span> <a href="nationalteams.php?country=Lithuania" class="greenhilite">Lithuania</a> (<a href="club.php?clubid=11643">Gizzo</a>)<br/>
<!--
&nbsp;4. <a href="nationalteams.php?country=Romania" class="greenhilite">Romania</a> (<a href="club.php?clubid=2590">Dobay</a>)<br/>
&nbsp;5. <a href="nationalteams.php?country=Greece" class="greenhilite">Greece</a> (<a href="club.php?clubid=10840">n13costas</a>)<br/>
&nbsp;6. <a href="nationalteams.php?country=Bosnia and Herzegovina" class="greenhilite">Bosnia and Herzegovina</a> (<a href="club.php?clubid=8184">sirbeg</a>)<br/>
&nbsp;7. <a href="nationalteams.php?country=Finland" class="greenhilite">Finland</a> (<a href="club.php?clubid=104090">MOD-madskillz</a>)<br/>
&nbsp;8. <a href="nationalteams.php?country=Belgium" class="greenhilite">Belgium</a> (<a href="club.php?clubid=35384">bahali</a>)<br/>
&nbsp;9. <a href="nationalteams.php?country=Argentina" class="greenhilite">Argentina</a> (<a href="club.php?clubid=74993">aioria</a>)<br/>
&nbsp;10. <a href="nationalteams.php?country=Latvia" class="greenhilite">Latvia</a> (<a href="club.php?clubid=13728">MOD-kasers</a>)<br/>
&nbsp;11. <a href="nationalteams.php?country=Bulgaria" class="greenhilite">Bulgaria</a> (<a href="club.php?clubid=12183">ivooo</a>)<br/>
&nbsp;12. <a href="nationalteams.php?country=Poland" class="greenhilite">Poland</a> (<a href="club.php?clubid=4453">hesus</a>)<br/>
&nbsp;13. <a href="nationalteams.php?country=France" class="greenhilite">France</a> (<a href="club.php?clubid=30759">Ronny</a>)<br/>
&nbsp;14. <a href="nationalteams.php?country=Turkey" class="greenhilite">Turkey</a> (<a href="club.php?clubid=7688">balbak</a>)<br/>
&nbsp;15. <a href="nationalteams.php?country=Italy" class="greenhilite">Italy</a> (<a href="club.php?clubid=47027">The_Huge</a>)<br/>
&nbsp;16. <a href="nationalteams.php?country=Serbia" class="greenhilite">Serbia</a> (<a href="club.php?clubid=2228">puramoca</a>)<br/>
&nbsp;17. <a href="nationalteams.php?country=Lithuania" class="greenhilite">Lithuania</a> (<a href="club.php?clubid=11643">Gizzo</a>)<br/>
&nbsp;18. <a href="nationalteams.php?country=FYR Macedonia" class="greenhilite">FYR Macedonia</a> (<a href="club.php?clubid=9119">GM-starte</a>)<br/>
&nbsp;19. <a href="nationalteams.php?country=Portugal" class="greenhilite">Portugal</a> (<a href="club.php?clubid=1026">SubTekk</a>)<br/>
&nbsp;20. <a href="nationalteams.php?country=Spain" class="greenhilite">Spain</a> (<a href="club.php?clubid=35746">Rainman</a>)<br/>
&nbsp;21. <a href="nationalteams.php?country=Israel" class="greenhilite">Israel</a> (<a href="club.php?clubid=1071">TheLaster</a>)<br/>
&nbsp;22. <a href="nationalteams.php?country=Czech Republic" class="greenhilite">Czech Republic</a> (<a href="club.php?clubid=39652">jzajko</a>)<br/>
&nbsp;23. <a href="nationalteams.php?country=Slovakia" class="greenhilite">Slovakia</a> (<a href="club.php?clubid=25696">Mattej</a>)<br/>
&nbsp;24. <a href="nationalteams.php?country=Russia" class="greenhilite">Russia</a> (<a href="club.php?clubid=41156">MOD-Sanych</a>)<br/>
&nbsp;25. <a href="nationalteams.php?country=Australia" class="greenhilite">Australia</a> (<a href="club.php?clubid=54506">Deejohnson</a>)<br/>
&nbsp;26. <a href="nationalteams.php?country=China" class="greenhilite">China</a> (<a href="club.php?clubid=5900">pxgjon</a>)<br/>
&nbsp;27. <a href="nationalteams.php?country=Croatia" class="greenhilite">Croatia</a> (<a href="club.php?clubid=6106">lovre_7</a>)<br/>
&nbsp;28. <a href="nationalteams.php?country=United Kingdom" class="greenhilite">United Kingdom</a> (<a href="club.php?clubid=4502">wizard</a>)<br/>
&nbsp;29. <a href="nationalteams.php?country=Uruguay" class="greenhilite">Uruguay</a> (<a href="club.php?clubid=47180">dinamo_14</a>)<br/>
&nbsp;30. <a href="nationalteams.php?country=Sweden" class="greenhilite">Sweden</a> (<a href="club.php?clubid=129063">jonas_strandba</a>)<br/>
&nbsp;31. <a href="nationalteams.php?country=Hong Kong" class="greenhilite">Hong Kong</a> (<a href="club.php?clubid=5864">nikogucci</a>)<br/>
&nbsp;32. <a href="nationalteams.php?country=Indonesia" class="greenhilite">Indonesia</a> (<a href="club.php?clubid=53061">mschein1</a>)
-->
</td><td class="border" width="50%">

<b><?=$langmark1448?></b><br/><br/>

<?=$langmark1453?>: <a href="league.php?country=France">France</a><br/>
<?=$langmark1449?>: 64<br/>
<?=$langmark1450?>: 522<br/>
<?=$langmark1451?>: 14.682.778<br/>
<?=$langmark1452?>: 28.128<br/>

<br/><b><?=$langmark1454?></b><br/><br/>

PG: <a href="player.php?playerid=2296491">Manuel Campos</a> (Spain)<br/>
SG: <a href="player.php?playerid=2076114">Guido Ulisse</a> (Italy)<br/>
SF: <a href="player.php?playerid=2436431">Inocentas Sparnaitis</a> (Lithuania)<br/>
PF: <a href="player.php?playerid=1957819">Gabriele Annibale</a> (Italy)<br/>
C: <a href="player.php?playerid=2632209">Daniel Díaz Hernandez</a> (Uruguay)<br/>

<br/><?=$langmark1455?>: <a href="player.php?playerid=2296491">Manuel Campos</a> (Spain)
<br/><?=$langmark1456?>: <a href="player.php?playerid=2076114">Guido Ulisse</a> (Italy)
<br/>Coach of the tournament: <a href="club.php?clubid=4502">wizard</a> (United Kingdom)

<?php
$a = $_GET["a"];
if ($a=='y') {?>
<br/><br/><b>Statistical leaders</b> <a href="<?=$_SERVER['REQUEST_URI']?>&a=n" class="greenhilite" title="close">[x]</a><br/>
<br/>Points: <a href="player.php?playerid=1048858">Vicente Etxebarría</a> (Spain)
<br/>Rebounds: <a href="player.php?playerid=1957819">Gabriele Annibale</a> (Italy)
<br/>Assist: <a href="player.php?playerid=2838715">Vicente Muñoz</a> (Spain)
<br/>Blocks: <a href="player.php?playerid=1982443">Javier Ruiz</a> (Spain)
<br/>Steals: <a href="player.php?playerid=2699810">Santeri Luuri</a> (Finland)
<?php } else {echo "<br/><br/><a href=\"",$_SERVER['REQUEST_URI'],"?go=kart&a=y\">statistical leaders</a>";}?>
</td>
</tr>
</table>

<table cellspacing="9" cellpadding="9" border="0" width="100%">
<tr bgcolor="white">
<td class="border" bgcolor="white" width="50%" valign="top">

<b><?=$langmark1457?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Italy">Italy</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=19292">99&nbsp;:&nbsp;110</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Spain">Spain</a>&nbsp;<img src="img/Flags/Spain.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1458?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/United Kingdom.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=United Kingdom">United Kingdom</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=19293">74&nbsp;:&nbsp;85</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Lithuania">Lithuania</a>&nbsp;<img src="img/Flags/Lithuania.png" border="0" alt=""></td></tr>
</table>

<br/><b>5th place match</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Portugal">Portugal</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=19294">98&nbsp;:&nbsp;97</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Uruguay">Uruguay</a>&nbsp;<img src="img/Flags/Uruguay.png" border="0" alt=""></td></tr>
</table>

<br/><b>7th place match</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Finland">Finland</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=19272">95&nbsp;:&nbsp;111</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Belgium">Belgium</a>&nbsp;<img src="img/Flags/Belgium.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1459?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Italy">Italy</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=19270">106&nbsp;:&nbsp;95</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=United Kingdom">United Kingdom</a>&nbsp;<img src="img/Flags/United Kingdom.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Spain">Spain</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=19271">102&nbsp;:&nbsp;90</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Lithuania">Lithuania</a>&nbsp;<img src="img/Flags/Lithuania.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1460?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Italy">Italy</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=19245">89&nbsp;:&nbsp;85</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Portugal">Portugal</a>&nbsp;<img src="img/Flags/Portugal.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/United Kingdom.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=United Kingdom">United Kingdom</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=19246">104&nbsp;:&nbsp;99</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Uruguay">Uruguay</a>&nbsp;<img src="img/Flags/Uruguay.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Finland">Finland</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=19247">104&nbsp;:&nbsp;113</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Spain">Spain</a>&nbsp;<img src="img/Flags/Spain.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Lithuania">Lithuania</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=19248">106&nbsp;:&nbsp;79</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Belgium">Belgium</a>&nbsp;<img src="img/Flags/Belgium.png" border="0" alt=""></td></tr>
</table>

<br/><b>Round of 16</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Italy">Italy</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=19213">117&nbsp;:&nbsp;93</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Bosnia">BiH</a>&nbsp;<img src="img/Flags/Bosnia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Portugal">Portugal</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=19214">113&nbsp;:&nbsp;96</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Latvia">Latvia</a>&nbsp;<img src="img/Flags/Latvia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/United Kingdom.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=United Kingdom">United Kingdom</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=19215">106&nbsp;:&nbsp;83</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Switzerland">Switzerland</a>&nbsp;<img src="img/Flags/Switzerland.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Uruguay.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Uruguay">Uruguay</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=19216">98&nbsp;:&nbsp;94</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Croatia">Croatia</a>&nbsp;<img src="img/Flags/Croatia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Argentina">Argentina</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=19217">83&nbsp;:&nbsp;105</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Finland">Finland</a>&nbsp;<img src="img/Flags/Finland.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovenia">Slovenia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=19218">85&nbsp;:&nbsp;86</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Spain">Spain</a>&nbsp;<img src="img/Flags/Spain.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia">Estonia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=19219">93&nbsp;:&nbsp;95</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Lithuania">Lithuania</a>&nbsp;<img src="img/Flags/Lithuania.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Belgium">Belgium</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=19220">89&nbsp;:&nbsp;71</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Germany">Germany</a>&nbsp;<img src="img/Flags/Germany.png" border="0" alt=""></td></tr>
</table>

<br/><b>Playoff round</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Bosnia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bosnia">BiH</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=19185">103&nbsp;:&nbsp;89</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Sweden">Sweden</a>&nbsp;<img src="img/Flags/Sweden.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Latvia">Latvia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=19186">101&nbsp;:&nbsp;86</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=France">France</a>&nbsp;<img src="img/Flags/France.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Brazil.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Brazil">Brazil</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=19187">72&nbsp;:&nbsp;92</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Switzerland">Switzerland</a>&nbsp;<img src="img/Flags/Switzerland.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Cyprus.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Cyprus">Cyprus</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=19188">90&nbsp;:&nbsp;101</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Croatia">Croatia</a>&nbsp;<img src="img/Flags/Croatia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Finland">Finland</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=19189">91&nbsp;:&nbsp;76</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Poland">Poland</a>&nbsp;<img src="img/Flags/Poland.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Spain">Spain</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=19190">99&nbsp;:&nbsp;72</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Romania">Romania</a>&nbsp;<img src="img/Flags/Romania.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Lithuania">Lithuania</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=19191">100&nbsp;:&nbsp;90</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=Turkey">Turkey</a>&nbsp;<img src="img/Flags/Turkey.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Germany">Germany</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=19192">93&nbsp;:&nbsp;73</a></td>
<td align="right" width="42%"><a href="nationalteams.php?country=China">China</a>&nbsp;<img src="img/Flags/China.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1462?></b><br/>

<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Italy">Italy</td><td align="right">2 - 1</td><td align="right">(+22)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Brazil.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Brazil">Brazil</td><td align="right">2 - 1</td><td align="right">(+10)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/China.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=China">China</td><td align="right">1 - 2</td><td align="right">(-1)</td></tr>
<tr><td width="200"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Greece">Greece</td><td align="right">1 - 2</td><td align="right">(-31)</td></tr>
</table>

<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/United Kingdom.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=United Kingdom">United Kingdom</td><td align="right">2 - 1</td><td align="right">(+52)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Bosnia and Herzegovina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Bosnia and Herzegovina">Bosnia and Herzegovina</td><td align="right">2 - 1</td><td align="right">(-21)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Romania">Romania</td><td align="right">1 - 2</td><td align="right">(+7)</td></tr>
<tr><td width="200"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Australia">Australia</td><td align="right">1 - 2</td><td align="right">(-38)</td></tr>
</table>

<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Portugal">Portugal</td><td align="right">3 - 0</td><td align="right">(+13)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Cyprus.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Cyprus">Cyprus</td><td align="right">2 - 1</td><td align="right">(+40)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Turkey">Turkey</td><td align="right">1 - 2</td><td align="right">(-19)</td></tr>
<tr><td width="200"><img src="img/Flags/Colombia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Colombia">Colombia</td><td align="right">0 - 3</td><td align="right">(-34)</td></tr>
</table>

<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Uruguay.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Uruguay">Uruguay</td><td align="right">3 - 0</td><td align="right">(+31)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Latvia">Latvia</td><td align="right">2 - 1</td><td align="right">(+15)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Poland">Poland</td><td align="right">1 - 2</td><td align="right">(0)</td></tr>
<tr><td width="200"><img src="img/Flags/Malta.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Malta">Malta</td><td align="right">0 - 3</td><td align="right">(-46)</td></tr>
</table>

<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP E</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Argentina">Argentina</td><td align="right">2 - 1</td><td align="right">(+20)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Lithuania">Lithuania</td><td align="right">2 - 1</td><td align="right">(-5)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Croatia">Croatia</td><td align="right">1 - 2</td><td align="right">(0)</td></tr>
<tr><td width="200"><img src="img/Flags/Hungary.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Hungary">Hungary</td><td align="right">1 - 2</td><td align="right">(-15)</td></tr>
</table>

<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP F</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Estonia">Estonia</td><td align="right">2 - 1</td><td align="right">(+60)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Finland">Finland</td><td align="right">2 - 1</td><td align="right">(+18)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=France">France</td><td align="right">2 - 1</td><td align="right">(-34)</td></tr>
<tr><td width="200"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovakia">Slovakia</td><td align="right">0 - 3</td><td align="right">(-44)</td></tr>
</table>

<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP G</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Slovenia">Slovenia</td><td align="right">3 - 0</td><td align="right">(+23)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Germany">Germany</td><td align="right">2 - 1</td><td align="right">(+18)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Switzerland.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Switzerland">Switzerland</td><td align="right">1 - 2</td><td align="right">(-26)</td></tr>
<tr><td width="200"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=USA">USA</td><td align="right">0 - 3</td><td align="right">(-15)</td></tr>
</table>

<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP H</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Belgium">Belgium</td><td align="right">3 - 0</td><td align="right">(+46)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Spain">Spain</td><td align="right">2 - 1</td><td align="right">(+2)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Sweden.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Sweden">Sweden</td><td align="right">1 - 2</td><td align="right">(-31)</td></tr>
<tr><td width="200"><img src="img/Flags/Indonesia.png" border="0" alt="">&nbsp;<a href="nationalteams.php?country=Indonesia">Indonesia</td><td align="right">0 - 3</td><td align="right">(-17)</td></tr>
</table>

</td>
<td width="50%" valign="top" class="border" bgcolor="white">

<b><?=$langmark1463?></b><br/>

<br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b></td></tr></table>
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
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b></td></tr></table>
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
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b></td></tr></table>
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
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b></td></tr></table>
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
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP E</b></td></tr></table>
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
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP F</b></td></tr></table>
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
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP G</b></td></tr></table>
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
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP H</b></td></tr></table>
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
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>