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
if ($swc==1) {echo "<b>U18 WC 1</b> | <a href=\"u18worldcup.php?swc=2\">U18 WC 2</a> | <a href=\"u18worldcup.php?swc=3\">U18 WC 3</a> | <a href=\"u18worldcup.php?swc=4\">U18 WC 4</a> | <a href=\"u18worldcup.php?swc=5\">U18 WC 5</a> | <a href=\"u18worldcup.php?swc=6\">U18 WC 6</a> | <a href=\"u18worldcup.php?swc=7\">U19 WC 7</a> | <a href=\"u18worldcup.php?swc=8\">U19 WC 8</a> | <a href=\"u18worldcup.php?swc=9\">U19 WC 9</a>";}
elseif ($swc==2) {echo "<a href=\"u18worldcup.php?swc=1\">U18 WC 1</a> | <b>U18 WC 2</b> | <a href=\"u18worldcup.php?swc=3\">U18 WC 3</a> | <a href=\"u18worldcup.php?swc=4\">U18 WC 4</a> | <a href=\"u18worldcup.php?swc=5\">U18 WC 5</a> | <a href=\"u18worldcup.php?swc=6\">U18 WC 6</a> | <a href=\"u18worldcup.php?swc=7\">U19 WC 7</a> | <a href=\"u18worldcup.php?swc=8\">U19 WC 8</a> | <a href=\"u18worldcup.php?swc=9\">U19 WC 9</a>";}
elseif ($swc==3) {echo "<a href=\"u18worldcup.php?swc=1\">U18 WC 1</a> | <a href=\"u18worldcup.php?swc=2\">U18 WC 2</a> | <b>U18 WC 3</b> | <a href=\"u18worldcup.php?swc=4\">U18 WC 4</a> | <a href=\"u18worldcup.php?swc=5\">U18 WC 5</a> | <a href=\"u18worldcup.php?swc=6\">U18 WC 6</a> | <a href=\"u18worldcup.php?swc=7\">U19 WC 7</a> | <a href=\"u18worldcup.php?swc=8\">U19 WC 8</a> | <a href=\"u18worldcup.php?swc=9\">U19 WC 9</a>";}
elseif ($swc==4) {echo "<a href=\"u18worldcup.php?swc=1\">U18 WC 1</a> | <a href=\"u18worldcup.php?swc=2\">U18 WC 2</a> | <a href=\"u18worldcup.php?swc=3\">U18 WC 3</a> | <b>U18 WC 4</b> | <a href=\"u18worldcup.php?swc=5\">U18 WC 5</a> | <a href=\"u18worldcup.php?swc=6\">U18 WC 6</a> | <a href=\"u18worldcup.php?swc=7\">U19 WC 7</a> | <a href=\"u18worldcup.php?swc=8\">U19 WC 8</a> | <a href=\"u18worldcup.php?swc=9\">U19 WC 9</a>";}
elseif ($swc==5) {echo "<a href=\"u18worldcup.php?swc=1\">U18 WC 1</a> | <a href=\"u18worldcup.php?swc=2\">U18 WC 2</a> | <a href=\"u18worldcup.php?swc=3\">U18 WC 3</a> | <a href=\"u18worldcup.php?swc=4\">U18 WC 4</a> | <b>U18 WC 5</b> | <a href=\"u18worldcup.php?swc=6\">U18 WC 6</a> | <a href=\"u18worldcup.php?swc=7\">U19 WC 7</a> | <a href=\"u18worldcup.php?swc=8\">U19 WC 8</a> | <a href=\"u18worldcup.php?swc=9\">U19 WC 9</a>";}
elseif ($swc==6) {echo "<a href=\"u18worldcup.php?swc=1\">U18 WC 1</a> | <a href=\"u18worldcup.php?swc=2\">U18 WC 2</a> | <a href=\"u18worldcup.php?swc=3\">U18 WC 3</a> | <a href=\"u18worldcup.php?swc=4\">U18 WC 4</a> | <a href=\"u18worldcup.php?swc=5\">U18 WC 5</a> | <b>U18 WC 6</b> | <a href=\"u18worldcup.php?swc=7\">U19 WC 7</a> | <a href=\"u18worldcup.php?swc=8\">U19 WC 8</a> | <a href=\"u18worldcup.php?swc=9\">U19 WC 9</a>";}
elseif ($swc==7) {echo "<a href=\"u18worldcup.php?swc=1\">U18 WC 1</a> | <a href=\"u18worldcup.php?swc=2\">U18 WC 2</a> | <a href=\"u18worldcup.php?swc=3\">U18 WC 3</a> | <a href=\"u18worldcup.php?swc=4\">U18 WC 4</a> | <a href=\"u18worldcup.php?swc=5\">U18 WC 5</a> | <a href=\"u18worldcup.php?swc=6\">U19 WC 6</a> | <b>U19 WC 7</b> | <a href=\"u18worldcup.php?swc=8\">U19 WC 8</a> | <a href=\"u18worldcup.php?swc=9\">U19 WC 9</a>";}
elseif ($swc==8) {echo "<a href=\"u18worldcup.php?swc=1\">U18 WC 1</a> | <a href=\"u18worldcup.php?swc=2\">U18 WC 2</a> | <a href=\"u18worldcup.php?swc=3\">U18 WC 3</a> | <a href=\"u18worldcup.php?swc=4\">U18 WC 4</a> | <a href=\"u18worldcup.php?swc=5\">U18 WC 5</a> | <a href=\"u18worldcup.php?swc=6\">U18 WC 6</a> | <a href=\"u18worldcup.php?swc=7\">U19 WC 7</a> | <b>U19 WC 8</b> | <a href=\"u18worldcup.php?swc=9\">U19 WC 9</a>";}
else {echo "<a href=\"u18worldcup.php?swc=1\">U18 WC 1</a> | <a href=\"u18worldcup.php?swc=2\">U18 WC 2</a> | <a href=\"u18worldcup.php?swc=3\">U18 WC 3</a> | <a href=\"u18worldcup.php?swc=4\">U18 WC 4</a> | <a href=\"u18worldcup.php?swc=5\">U18 WC 5</a> | <a href=\"u18worldcup.php?swc=6\">U18 WC 6</a> | <a href=\"u18worldcup.php?swc=7\">U19 WC 7</a> | <a href=\"u18worldcup.php?swc=8\">U19 WC 8</a> | <b>U19 WC 9</b>";}
?>
</td></tr></table>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="50%">

<?php
if ($swc==1) {
?>

<b>1st U18 World Cup - Final Standings</b><br/>

<br/><span style="background-image:url(/img/12gold.gif); background-repeat: no-repeat;">&nbsp;1&nbsp;</span> <a href="u18teams.php?country=Croatia" class="greenhilite">Croatia</a> (<a href="club.php?clubid=1490">GM-Wizl</a>)
<br/><span style="background-image:url(/img/12silver.gif); background-repeat: no-repeat;">&nbsp;2&nbsp;</span> <a href="u18teams.php?country=Lithuania" class="greenhilite">Lithuania</a> (<a href="club.php?clubid=1149">tubis</a>)
<br/><span style="background-image:url(/img/12bronze.gif); background-repeat: no-repeat;">&nbsp;3&nbsp;</span> <a href="u18teams.php?country=Cyprus" class="greenhilite">Cyprus</a> (<a href="club.php?clubid=19183">SongokuCY</a>)
<br/>&nbsp;4. <a href="u18teams.php?country=Germany" class="greenhilite">Germany</a> (vinzzz)
<br/>&nbsp;5. <a href="u18teams.php?country=Argentina" class="greenhilite">Argentina</a> (<a href="club.php?clubid=3682">Shata</a>)
<br/>&nbsp;6. <a href="u18teams.php?country=Finland" class="greenhilite">Finland</a> (<a href="club.php?clubid=5474">palokang</a>)
<br/>&nbsp;7. <a href="u18teams.php?country=Poland" class="greenhilite">Poland</a> (<a href="club.php?clubid=2875">yaco</a>)
<br/>&nbsp;8. <a href="u18teams.php?country=Czech Republic" class="greenhilite">Czech Republic</a> (<a href="club.php?clubid=10266">Pajinho</a>)
<br/>&nbsp;9. <a href="u18teams.php?country=Belgium" class="greenhilite">Belgium</a> (<a href="club.php?clubid=6061">dj_fabou</a>)
<br/>&nbsp;10. <a href="u18teams.php?country=Israel" class="greenhilite">Israel</a> (<a href="club.php?clubid=1542">amitay19</a>)
<br/>&nbsp;11. <a href="u18teams.php?country=Romania" class="greenhilite">Romania</a> (dioneanu)
<br/>&nbsp;12. <a href="u18teams.php?country=Spain" class="greenhilite">Spain</a> (<a href="club.php?clubid=9210">nash_11</a>)
<br/>&nbsp;13. <a href="u18teams.php?country=USA" class="greenhilite">USA</a> (<a href="club.php?clubid=749">Faja</a>)
<br/>&nbsp;14. <a href="u18teams.php?country=Estonia" class="greenhilite">Estonia</a> (<a href="club.php?clubid=3114">Eissa</a>)
<br/>&nbsp;15. <a href="u18teams.php?country=Italy" class="greenhilite">Italy</a> (Boso)
<br/>&nbsp;16. <a href="u18teams.php?country=Turkey" class="greenhilite">Turkey</a> (Alpermete)


</td><td class="border" width="50%">

<b><?=$langmark1448?></b><br/><br/>

<?=$langmark1453?>: <a href="league.php?country=Finland">Finland</a><br/>
<?=$langmark1449?>: 40<br/>
<?=$langmark1450?>: 210<br/>
<?=$langmark1451?>: 3.236.233<br/>
<?=$langmark1452?>: 15.411<br/>


<br/><b><?=$langmark1454?></b><br/><br/>

PG: <a href="player.php?playerid=1088056">Adolfas Binkis</a> (Lithuania)<br/>
SG: <a href="player.php?playerid=1216048">Edgardo Oberto</a> (Argentina)<br/>
SF: <a href="player.php?playerid=1117197">Ante Škiljić</a> (Croatia)<br/>
PF: <a href="player.php?playerid=688498">Joško Plećan</a> (Croatia)<br/>
C: <a href="player.php?playerid=817391">Kyriakos Georgiou</a> (Cyprus)<br/>

<br/><?=$langmark1455?>: <a href="player.php?playerid=1117197">Ante Škiljić</a> (Croatia)
<br/><?=$langmark1456?>: <a href="player.php?playerid=688498">Joško Plećan</a> (Croatia)
</td>
</tr>
</table>

<table cellspacing="9" cellpadding="9" border="0" width="100%">
<tr bgcolor="white">
<td class="border" bgcolor="white" width="50%" valign="top">

<b><?=$langmark1457?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Lithuania">Lithuania</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=1506">73&nbsp;:&nbsp;81</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Croatia">Croatia</a>&nbsp;<img src="img/Flags/Croatia.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1458?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Germany">Germany</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=1507">57&nbsp;:&nbsp;87</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Cyprus">Cyprus</a>&nbsp;<img src="img/Flags/Cyprus.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1459?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Lithuania">Lithuania</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=1473">75&nbsp;:&nbsp;74</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Germany">Germany</a>&nbsp;<img src="img/Flags/Germany.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Croatia">Croatia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=1474">89&nbsp;:&nbsp;70</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Cyprus">Cyprus</a>&nbsp;<img src="img/Flags/Cyprus.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1460?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Lithuania">Lithuania</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=1456">86&nbsp;:&nbsp;85</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Argentina">Argentina</a>&nbsp;<img src="img/Flags/Argentina.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Czech%20Republic.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Czech%20Republic">Czech Republic</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=1457">63&nbsp;:&nbsp;78</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Germany">Germany</a>&nbsp;<img src="img/Flags/Germany.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Finland">Finland</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=1458">87&nbsp;:&nbsp;91</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Croatia">Croatia</a>&nbsp;<img src="img/Flags/Croatia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Cyprus.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Cyprus">Cyprus</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=1459">81&nbsp;:&nbsp;69</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Poland">Poland</a>&nbsp;<img src="img/Flags/Poland.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1461?></b><br/>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP E</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Lithuania">Lithuania</td><td align="right">4 - 1</td><td align="right">(+46)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Cyprus.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Cyprus">Cyprus</td><td align="right">4 - 1</td><td align="right">(+10)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Germany">Germany</td><td align="right">3 - 2</td><td align="right">(+26)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Finland">Finland</td><td align="right">2 - 3</td><td align="right">(-42)</td></tr>
<tr><td width="200"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Israel">Israel</td><td align="right">1 - 4</td><td align="right">(-14)</td></tr>
<tr><td width="200"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Spain">Spain</td><td align="right">1 - 4</td><td align="right">(-24)</td></tr>

</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP F</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Croatia">Croatia</td><td align="right">5 - 0</td><td align="right">(+81)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Czech Republic.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Czech Republic">Czech Republic</td><td align="right">3 - 2</td><td align="right">(-8)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Poland">Poland</td><td align="right">2 - 3</td><td align="right">(-5)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Argentina">Argentina</td><td align="right">2 - 3</td><td align="right">(-27)</td></tr>
<tr><td width="200"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Belgium">Belgium</td><td align="right">2 - 3</td><td align="right">(-28)</td></tr>
<tr><td width="200"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Romania">Romania</td><td align="right">1 - 4</td><td align="right">(-13)</td></tr>
</table>

<br/><b><?=$langmark1462?></b><br/>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Spain">Spain</td><td align="right">2 - 1</td><td align="right">(+22)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Israel">Israel</td><td align="right">2 - 1</td><td align="right">(+20)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Germany">Germany</td><td align="right">2 - 1</td><td align="right">(+15)</td></tr>
<tr><td width="200"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Turkey">Turkey</td><td align="right">0 - 3</td><td align="right">(-57)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Cyprus.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Cyprus">Cyprus</td><td align="right">3 - 0</td><td align="right">(+15)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Lithuania">Lithuania</td><td align="right">2 - 1</td><td align="right">(+19)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Finland">Finland</td><td align="right">1 - 2</td><td align="right">(+3)</td></tr>
<tr><td width="200"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Estonia">Estonia</td><td align="right">0 - 3</td><td align="right">(-37)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b></td></tr></table>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Croatia">Croatia</td><td align="right">3 - 0</td><td align="right">(+39)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Czech Republic.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Czech Republic">Czech Republic</td><td align="right">2 - 1</td><td align="right">(+2)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Poland">Poland</td><td align="right">1 - 2</td><td align="right">(+11)</td></tr>
<tr><td width="200"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Italy">Italy</td><td align="right">0 - 3</td><td align="right">(-52)</td></tr>

</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Argentina">Argentina</td><td align="right">2 - 1</td><td align="right">(+9)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Belgium">Belgium</td><td align="right">2 - 1</td><td align="right">(+5)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Romania">Romania</td><td align="right">1 - 2</td><td align="right">(+3)</td></tr>
<tr><td width="200"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=USA">USA</td><td align="right">1 - 2</td><td align="right">(-17)</td></tr>
</table>

</td>
<td width="50%" valign="top" class="border" bgcolor="white">

<b><?=$langmark1463?></b><br/>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Cyprus.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Cyprus">Cyprus</td><td align="right">6 - 2</td><td align="right">(+7)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=USA">USA</td><td align="right">5 - 3</td><td align="right">(+10)</td></tr>
<tr><td width="200"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Latvia">Latvia</td><td align="right">3 - 5</td><td align="right">(+4)</td></tr>
<tr><td width="200"><img src="img/Flags/Chile.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Chile">Chile</td><td align="right">3 - 5</td><td align="right">(-10)</td></tr>
<tr><td width="200"><img src="img/Flags/Canada.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Canada">Canada</td><td align="right">3 - 5</td><td align="right">(-11)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Poland">Poland</td><td align="right">6 - 2</td><td align="right">(+72)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Germany">Germany</td><td align="right">5 - 3</td><td align="right">(+8)</td></tr>
<tr><td width="200"><img src="img/Flags/Hungary.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Hungary">Hungary</td><td align="right">4 - 4</td><td align="right">(0)</td></tr>
<tr><td width="200"><img src="img/Flags/Russia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Russia">Russia</td><td align="right">3 - 5</td><td align="right">(-11)</td></tr>
<tr><td width="200"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovakia">Slovakia</td><td align="right">2 - 6</td><td align="right">(-69)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Croatia">Croatia</td><td align="right">6 - 2</td><td align="right">(+47)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Finland">Finland</td><td align="right">5 - 3</td><td align="right">(-15)</td></tr>
<tr><td width="200"><img src="img/Flags/Bosnia and Herzegovina.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bosnia and Herzegovina">Bosnia and Herzegovina</td><td align="right">4 - 4</td><td align="right">(0)</td></tr>
<tr><td width="200"><img src="img/Flags/Uruguay.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Uruguay">Uruguay</td><td align="right">3 - 5</td><td align="right">(-26)</td></tr>
<tr><td width="200"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Australia">Australia</td><td align="right">2 - 6</td><td align="right">(-6)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Spain">Spain</td><td align="right">5 - 3</td><td align="right">(+59)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Argentina">Argentina</td><td align="right">5 - 3</td><td align="right">(+56)</td></tr>
<tr><td width="200"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Greece">Greece</td><td align="right">4 - 4</td><td align="right">(+31)</td></tr>
<tr><td width="200"><img src="img/Flags/Switzerland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Switzerland">Switzerland</td><td align="right">4 - 4</td><td align="right">(-67)</td></tr>
<tr><td width="200"><img src="img/Flags/Philippines.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Philippines">Philippines</td><td align="right">2 - 6</td><td align="right">(-79)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP E</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Lithuania">Lithuania</td><td align="right">7 - 1</td><td align="right">(+29)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Israel">Israel</td><td align="right">6 - 2</td><td align="right">(+117)</td></tr>
<tr><td width="200"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bulgaria">Bulgaria</td><td align="right">3 - 5</td><td align="right">(-43)</td></tr>
<tr><td width="200"><img src="img/Flags/United Kingdom.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=United Kingdom">United Kingdom</td><td align="right">2 - 6</td><td align="right">(-16)</td></tr>
<tr><td width="200"><img src="img/Flags/Sweden.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Sweden">Sweden</td><td align="right">2 - 6</td><td align="right">(-87)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP F</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Turkey">Turkey</td><td align="right">7 - 1</td><td align="right">(+82)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Estonia">Estonia</td><td align="right">6 - 2</td><td align="right">(+114)</td></tr>
<tr><td width="200"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=France">France</td><td align="right">3 - 5</td><td align="right">(-14)</td></tr>
<tr><td width="200"><img src="img/Flags/China.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=China">China</td><td align="right">3 - 5</td><td align="right">(-61)</td></tr>
<tr><td width="200"><img src="img/Flags/Malta.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Malta">Malta</td><td align="right">1 - 7</td><td align="right">(-121)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP G</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Belgium">Belgium</td><td align="right">6 - 2</td><td align="right">(+71)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Italy">Italy</td><td align="right">6 - 2</td><td align="right">(+35)</td></tr>
<tr><td width="200"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Portugal">Portugal</td><td align="right">4 - 4</td><td align="right">(+1)</td></tr>
<tr><td width="200"><img src="img/Flags/Brazil.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Brazil">Brazil</td><td align="right">3 - 5</td><td align="right">(-27)</td></tr>
<tr><td width="200"><img src="img/Flags/Denmark.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Denmark">Denmark</td><td align="right">1 - 7</td><td align="right">(-80)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP H</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Romania">Romania</td><td align="right">6 - 2</td><td align="right">(+59)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Czech Republic.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Czech Republic">Czech Republic</td><td align="right">6 - 2</td><td align="right">(+36)</td></tr>
<tr><td width="200"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Serbia">Serbia</td><td align="right">5 - 3</td><td align="right">(+72)</td></tr>
<tr><td width="200"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovenia">Slovenia</td><td align="right">3 - 5</td><td align="right">(-58)</td></tr>
<tr><td width="200"><img src="img/Flags/Netherlands.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Netherlands">Netherlands</td><td align="right">0 - 8</td><td align="right">(-109)</td></tr>
</table>

<?php
 } elseif ($swc==2) {
?>

<b>2nd U18 World Cup - Final Standings</b><br/>

<br/><span style="background-image:url(/img/12gold.gif); background-repeat: no-repeat;">&nbsp;1&nbsp;</span> <a href="u18teams.php?country=Estonia" class="greenhilite">Estonia</a> (<a href="club.php?clubid=3114">Eissa</a>)
<br/><span style="background-image:url(/img/12silver.gif); background-repeat: no-repeat;">&nbsp;2&nbsp;</span> <a href="u18teams.php?country=Spain" class="greenhilite">Spain</a> (<a href="club.php?clubid=5848">Cuhoy</a>)
<br/><span style="background-image:url(/img/12bronze.gif); background-repeat: no-repeat;">&nbsp;3&nbsp;</span> <a href="u18teams.php?country=Argentina" class="greenhilite">Argentina</a> (<a href="club.php?clubid=3682">MOD-Shata</a>)
<br/>&nbsp;4. <a href="u18teams.php?country=Finland" class="greenhilite">Finland</a> (<a href="club.php?clubid=5474">palokang</a>)
<br/>&nbsp;5. <a href="u18teams.php?country=Germany" class="greenhilite">Germany</a> (vinzzz)
<br/>&nbsp;6. <a href="u18teams.php?country=Portugal" class="greenhilite">Portugal</a> (<a href="club.php?clubid=118785">skink</a>)
<br/>&nbsp;7. <a href="u18teams.php?country=Greece" class="greenhilite">Greece</a> (<a href="club.php?clubid=5291">Sonap</a>)
<br/>&nbsp;8. <a href="u18teams.php?country=Bulgaria" class="greenhilite">Bulgaria</a> (<a href="club.php?clubid=12436">lasthope141</a>)
<br/>&nbsp;9. <a href="u18teams.php?country=France" class="greenhilite">France</a> (<a href="club.php?clubid=3275">jujuaubey</a>)
<br/>&nbsp;10. <a href="u18teams.php?country=Latvia" class="greenhilite">Latvia</a> (Jancis15)
<br/>&nbsp;11. <a href="u18teams.php?country=Chile" class="greenhilite">Chile</a> (chan)
<br/>&nbsp;12. <a href="u18teams.php?country=Hungary" class="greenhilite">Hungary</a> (<a href="club.php?clubid=8453">Zoli</a>)
<br/>&nbsp;13. <a href="u18teams.php?country=Lithuania" class="greenhilite">Lithuania</a> (sixthree)
<br/>&nbsp;14. <a href="u18teams.php?country=USA" class="greenhilite">USA</a> (<a href="club.php?clubid=3365">Ruthless</a>)
<br/>&nbsp;15. <a href="u18teams.php?country=Switzerland" class="greenhilite">Switzerland</a> (<a href="club.php?clubid=32041">SoNic13</a>)
<br/>&nbsp;16. <a href="u18teams.php?country=Poland" class="greenhilite">Poland</a> (<a href="club.php?clubid=10246">jazz85</a>)
<br/>&nbsp;17. <a href="u18teams.php?country=Italy" class="greenhilite">Italy</a> (<a href="club.php?clubid=188">Gianduia</a>)
<br/>&nbsp;18. <a href="u18teams.php?country=Brazil" class="greenhilite">Brazil</a> (<a href="club.php?clubid=20410">fura_redes</a>)
<br/>&nbsp;19. <a href="u18teams.php?country=China" class="greenhilite">China</a> (<a href="club.php?clubid=53819">limefish</a>)
<br/>&nbsp;20. <a href="u18teams.php?country=Australia" class="greenhilite">Australia</a> (<a href="club.php?clubid=28399">joshihow</a>)
<br/>&nbsp;21. <a href="u18teams.php?country=Russia" class="greenhilite">Russia</a> (Nickolay)
<br/>&nbsp;22. <a href="u18teams.php?country=Denmark" class="greenhilite">Denmark</a> (MichaelCD)
<br/>&nbsp;23. <a href="u18teams.php?country=Croatia" class="greenhilite">Croatia</a> (<a href="club.php?clubid=1490">Wizl</a>)
<br/>&nbsp;24. <a href="u18teams.php?country=Serbia" class="greenhilite">Serbia</a> (marko84)

</td><td class="border" width="50%">

<b><?=$langmark1448?></b><br/><br/>

<?=$langmark1453?>: <a href="league.php?country=Switzerland">Switzerland</a><br/>
<?=$langmark1449?>: 54<br/>
<?=$langmark1450?>: 346<br/>
<?=$langmark1451?>: 5.274.788<br/>
<?=$langmark1452?>: 15.245<br/>


<br/><b><?=$langmark1454?></b><br/><br/>

PG: <a href="player.php?playerid=1184409">Emmanuel Liberman</a> (Argentina)<br/>
SG: <a href="player.php?playerid=1256761">Tõnis Veerpalu</a> (Estonia)<br/>
SF: <a href="player.php?playerid=1388341">Joaquín Gil</a> (Spain)<br/>
PF: <a href="player.php?playerid=1667676">Mikko Taimela</a> (Finland)<br/>
C: <a href="player.php?playerid=1531186">Kristen Lood</a> (Estonia)<br/>

<br/><?=$langmark1455?>: <a href="player.php?playerid=1256761">Tõnis Veerpalu</a> (Estonia)
<br/><?=$langmark1456?>: <a href="player.php?playerid=1256761">Tõnis Veerpalu</a> (Estonia)
</td>
</tr>
</table>

<table cellspacing="9" cellpadding="9" border="0" width="100%">
<tr bgcolor="white">
<td class="border" bgcolor="white" width="50%" valign="top">

<b><?=$langmark1457?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Spain">Spain</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=3233">91&nbsp;:&nbsp;93</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Estonia">Estonia</a>&nbsp;<img src="img/Flags/Estonia.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1458?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Finland">Finland</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=3234">76&nbsp;:&nbsp;100</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Argentina">Argentina</a>&nbsp;<img src="img/Flags/Argentina.png" border="0" alt=""></td></tr>
</table>


<br/><b><?=$langmark1459?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Spain">Spain</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=3209">101&nbsp;:&nbsp;96</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Finland">Finland</a>&nbsp;<img src="img/Flags/Finland.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Estonia">Estonia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=3210">93&nbsp;:&nbsp;75</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Argentina">Argentina</a>&nbsp;<img src="img/Flags/Argentina.png" border="0" alt=""></td></tr>
</table>


<br/><b><?=$langmark1460?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Germany">Germany</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=3183">77&nbsp;:&nbsp;85</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Spain">Spain</a>&nbsp;<img src="img/Flags/Spain.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Finland">Finland</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=3184">92&nbsp;:&nbsp;80</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Greece">Greece</a>&nbsp;<img src="img/Flags/Greece.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Portugal">Portugal</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=3185">77&nbsp;:&nbsp;88</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Estonia">Estonia</a>&nbsp;<img src="img/Flags/Estonia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bulgaria">Bulgaria</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=3186">69&nbsp;:&nbsp;81</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Argentina">Argentina</a>&nbsp;<img src="img/Flags/Argentina.png" border="0" alt=""></td></tr>
</table>


<br/><b>Round of 16</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=France">France</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=3157">83&nbsp;:&nbsp;84</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Germany">Germany</a>&nbsp;<img src="img/Flags/Germany.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=USA">USA</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=3158">67&nbsp;:&nbsp;89</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Spain">Spain</a>&nbsp;<img src="img/Flags/Spain.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Latvia">Latvia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=3159">85&nbsp;:&nbsp;92</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Finland">Finland</a>&nbsp;<img src="img/Flags/Finland.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Lithuania">Lithuania</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=3160">77&nbsp;:&nbsp;89</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Greece">Greece</a>&nbsp;<img src="img/Flags/Greece.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Portugal">Portugal</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=3161">68&nbsp;:&nbsp;59</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Chile">Chile</a>&nbsp;<img src="img/Flags/Chile.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Estonia">Estonia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=3162">105&nbsp;:&nbsp;62</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Switzerland">Switzerland</a>&nbsp;<img src="img/Flags/Switzerland.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bulgaria">Bulgaria</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=3163">97&nbsp;:&nbsp;53</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Poland">Poland</a>&nbsp;<img src="img/Flags/Poland.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Argentina">Argentina</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=3164">89&nbsp;:&nbsp;78</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Hungary">Hungary</a>&nbsp;<img src="img/Flags/Hungary.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1462?></b><br/>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=France">France</td><td align="right">5 - 0</td><td align="right">(+66)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Estonia">Estonia</td><td align="right">4 - 1</td><td align="right">(+47)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Hungary.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Hungary">Hungary</td><td align="right">3 - 2</td><td align="right">(-18)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Finland">Finland</td><td align="right">2 - 3</td><td align="right">(+6)</td></tr>
<tr><td width="200"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Australia">Australia</td><td align="right">1 - 4</td><td align="right">(-52)</td></tr>
<tr><td width="200"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Croatia">Croatia</td><td align="right">0 - 5</td><td align="right">(-49)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Latvia">Latvia</td><td align="right">5 - 0</td><td align="right">(+123)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Argentina">Argentina</td><td align="right">3 - 2</td><td align="right">(+6)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Switzerland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Switzerland">Switzerland</td><td align="right">2 - 3</td><td align="right">(-15)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Germany">Germany</td><td align="right">2 - 3</td><td align="right">(-23)</td></tr>
<tr><td width="200"><img src="img/Flags/China.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=China">China</td><td align="right">2 - 3</td><td align="right">(-34)</td></tr>
<tr><td width="200"><img src="img/Flags/Denmark.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Denmark">Denmark</td><td align="right">1 - 4</td><td align="right">(-57)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Portugal">Portugal</td><td align="right">4 - 1</td><td align="right">(+93)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=USA">USA</td><td align="right">3 - 2</td><td align="right">(-2)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Greece">Greece</td><td align="right">2 - 3</td><td align="right">(-8)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Poland">Poland</td><td align="right">2 - 3</td><td align="right">(-18)</td></tr>
<tr><td width="200"><img src="img/Flags/Brazil.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Brazil">Brazil</td><td align="right">2 - 3</td><td align="right">(-31)</td></tr>
<tr><td width="200"><img src="img/Flags/Russia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Russia">Russia</td><td align="right">2 - 3</td><td align="right">(-34)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b></td></tr></table>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bulgaria">Bulgaria</td><td align="right">5 - 0</td><td align="right">(+113)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Lithuania">Lithuania</td><td align="right">3 - 2</td><td align="right">(+48)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Spain">Spain</td><td align="right">3 - 2</td><td align="right">(+1)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Chile.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Chile">Chile</td><td align="right">2 - 3</td><td align="right">(-21)</td></tr>
<tr><td width="200"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Italy">Italy</td><td align="right">2 - 3</td><td align="right">(-28)</td></tr>
<tr><td width="200"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Serbia">Serbia</td><td align="right">0 - 5</td><td align="right">(-113)</td></tr>
</table>


</td>
<td width="50%" valign="top" class="border" bgcolor="white">

<b><?=$langmark1463?></b><br/>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Croatia">Croatia</td><td align="right">9 - 1</td><td align="right">(+138)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Italy">Italy</td><td align="right">8 - 2</td><td align="right">(+178)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Portugal">Portugal</td><td align="right">6 - 4</td><td align="right">(+75)</td></tr>
<tr><td width="200"><img src="img/Flags/Philippines.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Philippines">Philippines</td><td align="right">4 - 6</td><td align="right">(-8)</td></tr>
<tr><td width="200"><img src="img/Flags/Sweden.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Sweden">Sweden</td><td align="right">3 - 7</td><td align="right">(-50)</td></tr>
<tr><td width="200"><img src="img/Flags/South Korea.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=South Korea">South Korea</td><td align="right">0 - 10</td><td align="right">(-333)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Lithuania">Lithuania</td><td align="right">8 - 2</td><td align="right">(+97)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Greece">Greece</td><td align="right">7 - 3</td><td align="right">(+134)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Denmark.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Denmark">Denmark</td><td align="right">6 - 4</td><td align="right">(-2)</td></tr>
<tr><td width="200"><img src="img/Flags/Bosnia and Herzegovina.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bosnia and Herzegovina">Bosnia and Herzegovina</td><td align="right">5 - 5</td><td align="right">(+34)</td></tr>
<tr><td width="200"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovakia">Slovakia</td><td align="right">3 - 7</td><td align="right">(-47)</td></tr>
<tr><td width="200"><img src="img/Flags/Tunisia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Tunisia">Tunisia</td><td align="right">1 - 9</td><td align="right">(-216)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=USA">USA</td><td align="right">9 - 1</td><td align="right">(+115)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/China.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=China">China</td><td align="right">6 - 4</td><td align="right">(+131)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Hungary.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Hungary">Hungary</td><td align="right">6 - 4</td><td align="right">(+40)</td></tr>
<tr><td width="200"><img src="img/Flags/Cyprus.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Cyprus">Cyprus</td><td align="right">6 - 4</td><td align="right">(-1)</td></tr>
<tr><td width="200"><img src="img/Flags/Malta.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Malta">Malta</td><td align="right">2 - 8</td><td align="right">(-76)</td></tr>
<tr><td width="200"><img src="img/Flags/Egypt.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Egypt">Egypt</td><td align="right">1 - 9</td><td align="right">(-209)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Latvia">Latvia</td><td align="right">10 - 0</td><td align="right">(+220)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Finland">Finland</td><td align="right">7 - 3</td><td align="right">(+108)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Poland">Poland</td><td align="right">5 - 5</td><td align="right">(+57)</td></tr>
<tr><td width="200"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovenia">Slovenia</td><td align="right">5 - 5</td><td align="right">(+15)</td></tr>
<tr><td width="200"><img src="img/Flags/Netherlands.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Netherlands">Netherlands</td><td align="right">3 - 7</td><td align="right">(-71)</td></tr>
<tr><td width="200"><img src="img/Flags/Norway.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Norway">Norway</td><td align="right">0 - 10</td><td align="right">(-329)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP E</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Argentina">Argentina</td><td align="right">7 - 3</td><td align="right">(+132)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Chile.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Chile">Chile</td><td align="right">7 - 3</td><td align="right">(+21)</td></tr>
<tr><td width="200"><img src="img/Flags/Czech Republic.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Czech Republic">Czech Republic</td><td align="right">5 - 5</td><td align="right">(+56)</td></tr>
<tr><td width="200"><img src="img/Flags/United Kingdom.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=United Kingdom">United Kingdom</td><td align="right">4 - 6</td><td align="right">(-56)</td></tr>
<tr><td width="200"><img src="img/Flags/Ukraine.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Ukraine">Ukraine</td><td align="right">4 - 6</td><td align="right">(-62)</td></tr>
<tr><td width="200"><img src="img/Flags/FYR Macedonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=FYR Macedonia">FYR Macedonia</td><td align="right">3 - 7</td><td align="right">(-91)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP F</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Germany">Germany</td><td align="right">7 - 3</td><td align="right">(+116)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Spain">Spain</td><td align="right">6 - 4</td><td align="right">(+125)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Australia">Australia</td><td align="right">6 - 4</td><td align="right">(+38)</td></tr>
<tr><td width="200"><img src="img/Flags/Canada.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Canada">Canada</td><td align="right">6 - 4</td><td align="right">(-27)</td></tr>
<tr><td width="200"><img src="img/Flags/Mexico.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Mexico">Mexico</td><td align="right">4 - 6</td><td align="right">(-50)</td></tr>
<tr><td width="200"><img src="img/Flags/Indonesia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Indonesia">Indonesia</td><td align="right">1 - 9</td><td align="right">(-202)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP G</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bulgaria">Bulgaria</td><td align="right">10 - 0</td><td align="right">(+171)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Russia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Russia">Russia</td><td align="right">7 - 3</td><td align="right">(+30)</td></tr>
<tr><td width="200"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Israel">Israel</td><td align="right">5 - 5</td><td align="right">(+18)</td></tr>
<tr><td width="200"><img src="img/Flags/New Zealand.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=New Zealand">New Zealand</td><td align="right">5 - 5</td><td align="right">(-17)</td></tr>
<tr><td width="200"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Turkey">Turkey</td><td align="right">3 - 7</td><td align="right">(-58)</td></tr>
<tr><td width="200"><img src="img/Flags/Thailand.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Thailand">Thailand</td><td align="right">0 - 10</td><td align="right">(-144)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP H</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Brazil.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Brazil">Brazil</td><td align="right">10 - 0</td><td align="right">(+149)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=France">France</td><td align="right">8 - 2</td><td align="right">(+144)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Serbia">Serbia</td><td align="right">6 - 4</td><td align="right">(+62)</td></tr>
<tr><td width="200"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Belgium">Belgium</td><td align="right">3 - 7</td><td align="right">(-28)</td></tr>
<tr><td width="200"><img src="img/Flags/Venezuela.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Venezuela">Venezuela</td><td align="right">2 - 8</td><td align="right">(-181)</td></tr>
<tr><td width="200"><img src="img/Flags/Colombia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Colombia">Colombia</td><td align="right">1 - 9</td><td align="right">(-146)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP I</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Estonia">Estonia</td><td align="right">9 - 1</td><td align="right">(+213)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Switzerland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Switzerland">Switzerland</td><td align="right">6 - 4</td><td align="right">(+14)</td></tr>
<tr><td width="200"><img src="img/Flags/Uruguay.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Uruguay">Uruguay</td><td align="right">5 - 5</td><td align="right">(+52)</td></tr>
<tr><td width="200"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Romania">Romania</td><td align="right">4 - 6</td><td align="right">(-18)</td></tr>
<tr><td width="200"><img src="img/Flags/Austria.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Austria">Austria</td><td align="right">3 - 7</td><td align="right">(-103)</td></tr>
<tr><td width="200"><img src="img/Flags/Albania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Albania">Albania</td><td align="right">3 - 7</td><td align="right">(-158)</td></tr>
</table>

<?php
} elseif ($swc==3) {
?>

<b>3rd U18 World Cup - Final Standings</b><br/>

<br/><span style="background-image:url(/img/12gold.gif); background-repeat: no-repeat;">&nbsp;1&nbsp;</span> <a href="u18teams.php?country=Estonia" class="greenhilite">Estonia</a> (<a href="club.php?clubid=5646">turk</a>)
<br/><span style="background-image:url(/img/12silver.gif); background-repeat: no-repeat;">&nbsp;2&nbsp;</span> <a href="u18teams.php?country=Cyprus" class="greenhilite">Cyprus</a> (<a href="club.php?clubid=124768">kofas</a>)
<br/><span style="background-image:url(/img/12bronze.gif); background-repeat: no-repeat;">&nbsp;3&nbsp;</span> <a href="u18teams.php?country=Bulgaria" class="greenhilite">Bulgaria</a> (<a href="club.php?clubid=11932">SM-Exorcist</a>)
<br/>&nbsp;4. <a href="u18teams.php?country=Argentina" class="greenhilite">Argentina</a> (<a href="club.php?clubid=3753">Wess</a>)
<br/>&nbsp;5. <a href="u18teams.php?country=France" class="greenhilite">France</a> (<a href="club.php?clubid=3275">MOD-jujuaubey</a>)
<br/>&nbsp;6. <a href="u18teams.php?country=Romania" class="greenhilite">Romania</a> (<a href="club.php?clubid=3103">mire</a>)
<br/>&nbsp;7. <a href="u18teams.php?country=Greece" class="greenhilite">Greece</a> (<a href="club.php?clubid=5291">Sonap</a>)
<br/>&nbsp;8. <a href="u18teams.php?country=Germany" class="greenhilite">Germany</a> (vinzzz)
<br/>&nbsp;9. <a href="u18teams.php?country=Croatia" class="greenhilite">Croatia</a> (<a href="club.php?clubid=10010">Alijansa</a>)
<br/>&nbsp;10. <a href="u18teams.php?country=Poland" class="greenhilite">Poland</a> (<a href="club.php?clubid=10246">jazz85</a>)
<br/>&nbsp;11. <a href="u18teams.php?country=Turkey" class="greenhilite">Turkey</a> (<a href="club.php?clubid=11493">nart</a>)
<br/>&nbsp;12. <a href="u18teams.php?country=China" class="greenhilite">China</a> (<a href="club.php?clubid=53819">limefish</a>)
<br/>&nbsp;13. <a href="u18teams.php?country=FYR Macedonia" class="greenhilite">FYR Macedonia</a> (<a href="club.php?clubid=33693">MiLaNcHoS</a>)
<br/>&nbsp;14. <a href="u18teams.php?country=Spain" class="greenhilite">Spain</a> (kax_8)
<br/>&nbsp;15. <a href="u18teams.php?country=Belgium" class="greenhilite">Belgium</a> (<a href="club.php?clubid=35384">bahali</a>)
<br/>&nbsp;16. <a href="u18teams.php?country=Israel" class="greenhilite">Israel</a> (<a href="club.php?clubid=1542">amitay19</a>)
<br/>&nbsp;17. <a href="u18teams.php?country=Serbia" class="greenhilite">Serbia</a> (<a href="club.php?clubid=18787">Jack</a>)
<br/>&nbsp;18. <a href="u18teams.php?country=Chile" class="greenhilite">Chile</a> (<a href="club.php?clubid=1748">Amurpo</a>)
<br/>&nbsp;19. <a href="u18teams.php?country=Portugal" class="greenhilite">Portugal</a> (<a href="club.php?clubid=118785">skink</a>)
<br/>&nbsp;20. <a href="u18teams.php?country=Slovenia" class="greenhilite">Slovenia</a> (<a href="club.php?clubid=1070">MOD-keyser</a>)
<br/>&nbsp;21. <a href="u18teams.php?country=Finland" class="greenhilite">Finland</a> (<a href="club.php?clubid=5976">Tuuna</a>)
<br/>&nbsp;22. <a href="u18teams.php?country=Netherlands" class="greenhilite">Netherlands</a> (Thomean)
<br/>&nbsp;23. <a href="u18teams.php?country=Slovakia" class="greenhilite">Slovakia</a> (<a href="club.php?clubid=19008">Marek_23</a>)
<br/>&nbsp;24. <a href="u18teams.php?country=Russia" class="greenhilite">Russia</a> (Queller)

</td><td class="border" width="50%">

<b><?=$langmark1448?></b><br/><br/>

<?=$langmark1453?>: <a href="league.php?country=Argentina">Argentina</a><br/>
<?=$langmark1449?>: 60<br/>
<?=$langmark1450?>: 376<br/>
<?=$langmark1451?>: 5.956.737<br/>
<?=$langmark1452?>: 15.842<br/>


<br/><b><?=$langmark1454?></b><br/><br/>

PG: <a href="player.php?playerid=2378098">Víctor González</a> (Argentina)<br/>
SG: <a href="player.php?playerid=2141484">Panagiotis Ntouvaras</a> (Cyprus)<br/>
SF: <a href="player.php?playerid=2024499">Kert Danilson</a> (Estonia)<br/>
PF: <a href="player.php?playerid=2033359">Juhan Hämarsalu</a> (Estonia)<br/>
C: <a href="player.php?playerid=1940069">Lyubomir Bonev</a> (Bulgaria)<br/>

<br/><?=$langmark1455?>: <a href="player.php?playerid=2024499">Kert Danilson</a> (Estonia)
<br/><?=$langmark1456?>: <a href="player.php?playerid=2123324">Roman Kink</a> (Estonia)
</td>
</tr>
</table>

<table cellspacing="9" cellpadding="9" border="0" width="100%">
<tr bgcolor="white">

<td class="border" bgcolor="white" width="50%" valign="top">

<b><?=$langmark1457?></b><br/><br/>
<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Estonia">Estonia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=5116">89&nbsp;:&nbsp;81</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Cyprus">Cyprus</a>&nbsp;<img src="img/Flags/Cyprus.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1458?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bulgaria">Bulgaria</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=5117">77&nbsp;:&nbsp;58</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Argentina">Argentina</a>&nbsp;<img src="img/Flags/Argentina.png" border="0" alt=""></td></tr>
</table>


<br/><b><?=$langmark1459?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Estonia">Estonia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=5085">72&nbsp;:&nbsp;63</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Bulgaria">Bulgaria</a>&nbsp;<img src="img/Flags/Bulgaria.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Argentina">Argentina</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=5086">75&nbsp;:&nbsp;77</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Cyprus">Cyprus</a>&nbsp;<img src="img/Flags/Cyprus.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1460?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Estonia">Estonia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=5056">88&nbsp;:&nbsp;79</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Greece">Greece</a>&nbsp;<img src="img/Flags/Greece.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bulgaria">Bulgaria</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=5057">72&nbsp;:&nbsp;67</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Romania">Romania</a>&nbsp;<img src="img/Flags/Romania.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Germany">Germany</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=5058">70&nbsp;:&nbsp;83</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Argentina">Argentina</a>&nbsp;<img src="img/Flags/Argentina.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=France">France</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=5059">66&nbsp;:&nbsp;69</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Cyprus">Cyprus</a>&nbsp;<img src="img/Flags/Cyprus.png" border="0" alt=""></td></tr>
</table>

<br/><b>Round of 16</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Estonia">Estonia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=5002">89&nbsp;:&nbsp;77</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=FYR Macedonia">FYR Macedonia</a>&nbsp;<img src="img/Flags/FYR Macedonia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Greece">Greece</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=5003">88&nbsp;:&nbsp;59</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Belgium">Belgium</a>&nbsp;<img src="img/Flags/Belgium.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bulgaria">Bulgaria</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=5004">91&nbsp;:&nbsp;58</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Israel">Israel</a>&nbsp;<img src="img/Flags/Israel.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Romania">Romania</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=5005">75&nbsp;:&nbsp;71</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Croatia">Croatia</a>&nbsp;<img src="img/Flags/Croatia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Turkey">Turkey</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=5006">81&nbsp;:&nbsp;87</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Germany">Germany</a>&nbsp;<img src="img/Flags/Germany.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Spain">Spain</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=5007">64&nbsp;:&nbsp;79</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Argentina">Argentina</a>&nbsp;<img src="img/Flags/Argentina.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/China.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=China">China</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=5008">76&nbsp;:&nbsp;82</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=France">France</a>&nbsp;<img src="img/Flags/France.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Poland">Poland</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=5009">72&nbsp;:&nbsp;77</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Cyprus">Cyprus</a>&nbsp;<img src="img/Flags/Cyprus.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1462?></b><br/>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Estonia">Estonia</td><td align="right">4 - 1</td><td align="right">(+74)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Spain">Spain</td><td align="right">4 - 1</td><td align="right">(+72)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Cyprus.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Cyprus">Cyprus</td><td align="right">3 - 2</td><td align="right">(+42)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Israel">Israel</td><td align="right">3 - 2</td><td align="right">(+8)</td></tr>
<tr><td width="200"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Portugal">Portugal</td><td align="right">1 - 4</td><td align="right">(-52)</td></tr>
<tr><td width="200"><img src="img/Flags/Russia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Russia">Russia</td><td align="right">0 - 5</td><td align="right">(-144)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bulgaria">Bulgaria</td><td align="right">3 - 2</td><td align="right">(+49)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Poland">Poland</td><td align="right">3 - 2</td><td align="right">(+10)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Argentina">Argentina</td><td align="right">3 - 2</td><td align="right">(-5)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/FYR Macedonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=FYR Macedonia">FYR Macedonia</td><td align="right">3 - 2</td><td align="right">(-6)</td></tr>
<tr><td width="200"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Serbia">Serbia</td><td align="right">2 - 3</td><td align="right">(+1)</td></tr>
<tr><td width="200"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Finland">Finland</td><td align="right">1 - 4</td><td align="right">(-49)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Turkey">Turkey</td><td align="right">5 - 0</td><td align="right">(+111)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Greece">Greece</td><td align="right">4 - 1</td><td align="right">(+49)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Croatia">Croatia</td><td align="right">3 - 2</td><td align="right">(+33)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=France">France</td><td align="right">2 - 3</td><td align="right">(-25)</td></tr>
<tr><td width="200"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovenia">Slovenia</td><td align="right">1 - 4</td><td align="right">(-58)</td></tr>
<tr><td width="200"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovakia">Slovakia</td><td align="right">0 - 5</td><td align="right">(-110)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/China.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=China">China</td><td align="right">4 - 1</td><td align="right">(+71)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Romania">Romania</td><td align="right">4 - 1</td><td align="right">(+10)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Belgium">Belgium</td><td align="right">3 - 2</td><td align="right">(+19)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Germany">Germany</td><td align="right">3 - 2</td><td align="right">(+3)</td></tr>
<tr><td width="200"><img src="img/Flags/Chile.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Chile">Chile</td><td align="right">1 - 4</td><td align="right">(-8)</td></tr>
<tr><td width="200"><img src="img/Flags/Netherlands.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Netherlands">Netherlands</td><td align="right">0 - 5</td><td align="right">(-95)</td></tr>
</table>

</td>
<td width="50%" valign="top" class="border" bgcolor="white">

<b><?=$langmark1463?></b><br/>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Argentina">Argentina</td><td align="right">9 - 1</td><td align="right">(+172)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovenia">Slovenia</td><td align="right">8 - 2</td><td align="right">(+125)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Cyprus.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Cyprus">Cyprus</td><td align="right">7 - 3</td><td align="right">(+102)</td></tr>
<tr><td width="200"><img src="img/Flags/Switzerland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Switzerland">Switzerland</td><td align="right">3 - 7</td><td align="right">(-10)</td></tr>
<tr><td width="200"><img src="img/Flags/Indonesia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Indonesia">Indonesia</td><td align="right">3 - 7</td><td align="right">(-89)</td></tr>
<tr><td width="200"><img src="img/Flags/Norway.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Norway">Norway</td><td align="right">0 - 10</td><td align="right">(-300)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Greece">Greece</td><td align="right">9 - 1</td><td align="right">(+202)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bulgaria">Bulgaria</td><td align="right">9 - 1</td><td align="right">(+164)</td></tr>
<tr><td width="200"><img src="img/Flags/Bosnia and Herzegovina.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bosnia and Herzegovina">Bosnia and Herzegovina</td><td align="right">6 - 4</td><td align="right">(+28)</td></tr>
<tr><td width="200"><img src="img/Flags/Ukraine.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Ukraine">Ukraine</td><td align="right">3 - 7</td><td align="right">(-93)</td></tr>
<tr><td width="200"><img src="img/Flags/Venezuela.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Venezuela">Venezuela</td><td align="right">3 - 7</td><td align="right">(-101)</td></tr>
<tr><td width="200"><img src="img/Flags/Hong Kong.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Hong Kong">Hong Kong</td><td align="right">0 - 10</td><td align="right">(-200)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/FYR Macedonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=FYR Macedonia">FYR Macedonia</td><td align="right">9 - 1</td><td align="right">(+192)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/China.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=China">China</td><td align="right">7 - 3</td><td align="right">(+81)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Croatia">Croatia</td><td align="right">7 - 3</td><td align="right">(+71)</td></tr>
<tr><td width="200"><img src="img/Flags/Czech Republic.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Czech Republic">Czech Republic</td><td align="right">5 - 5</td><td align="right">(+84)</td></tr>
<tr><td width="200"><img src="img/Flags/Sweden.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Sweden">Sweden</td><td align="right">2 - 8</td><td align="right">(-200)</td></tr>
<tr><td width="200"><img src="img/Flags/Malaysia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Malaysia">Malaysia</td><td align="right">0 - 10</td><td align="right">(-228)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Belgium">Belgium</td><td align="right">8 - 2</td><td align="right">(+96)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovakia">Slovakia</td><td align="right">7 - 3</td><td align="right">(+64)</td></tr>
<tr><td width="200"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Latvia">Latvia</td><td align="right">7 - 3</td><td align="right">(+24)</td></tr>
<tr><td width="200"><img src="img/Flags/Brazil.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Brazil">Brazil</td><td align="right">5 - 5</td><td align="right">(+97)</td></tr>
<tr><td width="200"><img src="img/Flags/Austria.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Austria">Austria</td><td align="right">3 - 7</td><td align="right">(-112)</td></tr>
<tr><td width="200"><img src="img/Flags/Ireland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Ireland">Ireland</td><td align="right">0 - 10</td><td align="right">(-169)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP E</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Romania">Romania</td><td align="right">8 - 2</td><td align="right">(+161)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Estonia">Estonia</td><td align="right">7 - 3</td><td align="right">(+99)</td></tr>
<tr><td width="200"><img src="img/Flags/Philippines.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Philippines">Philippines</td><td align="right">7 - 3</td><td align="right">(+37)</td></tr>
<tr><td width="200"><img src="img/Flags/Hungary.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Hungary">Hungary</td><td align="right">4 - 6</td><td align="right">(-49)</td></tr>
<tr><td width="200"><img src="img/Flags/Peru.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Peru">Peru</td><td align="right">3 - 7</td><td align="right">(-147)</td></tr>
<tr><td width="200"><img src="img/Flags/Albania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Albania">Albania</td><td align="right">1 - 9</td><td align="right">(-101)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP F</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=France">France</td><td align="right">9 - 1</td><td align="right">(+146)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Serbia">Serbia</td><td align="right">8 - 2</td><td align="right">(+127)</td></tr>
<tr><td width="200"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Italy">Italy</td><td align="right">5 - 5</td><td align="right">(+15)</td></tr>
<tr><td width="200"><img src="img/Flags/Thailand.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Thailand">Thailand</td><td align="right">5 - 5</td><td align="right">(-56)</td></tr>
<tr><td width="200"><img src="img/Flags/Mexico.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Mexico">Mexico</td><td align="right">2 - 8</td><td align="right">(-114)</td></tr>
<tr><td width="200"><img src="img/Flags/South Korea.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=South Korea">South Korea</td><td align="right">1 - 9</td><td align="right">(-118)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP G</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Germany">Germany</td><td align="right">9 - 1</td><td align="right">(+266)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Russia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Russia">Russia</td><td align="right">7 - 3</td><td align="right">(+77)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Poland">Poland</td><td align="right">7 - 3</td><td align="right">(+46)</td></tr>
<tr><td width="200"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Australia">Australia</td><td align="right">4 - 6</td><td align="right">(-68)</td></tr>
<tr><td width="200"><img src="img/Flags/Colombia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Colombia">Colombia</td><td align="right">2 - 8</td><td align="right">(-173)</td></tr>
<tr><td width="200"><img src="img/Flags/Montenegro.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Montenegro">Montenegro</td><td align="right">1 - 9</td><td align="right">(-148)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP H</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Portugal">Portugal</td><td align="right">9 - 1</td><td align="right">(+254)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Turkey">Turkey</td><td align="right">8 - 2</td><td align="right">(+170)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Netherlands.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Netherlands">Netherlands</td><td align="right">7 - 3</td><td align="right">(+63)</td></tr>
<tr><td width="200"><img src="img/Flags/New Zealand.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=New Zealand">New Zealand</td><td align="right">3 - 7</td><td align="right">(-148)</td></tr>
<tr><td width="200"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=USA">USA</td><td align="right">2 - 8</td><td align="right">(-139)</td></tr>
<tr><td width="200"><img src="img/Flags/Tunisia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Tunisia">Tunisia</td><td align="right">1 - 9</td><td align="right">(-200)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP I</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Israel">Israel</td><td align="right">8 - 2</td><td align="right">(+84)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Chile.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Chile">Chile</td><td align="right">7 - 3</td><td align="right">(+150)</td></tr>
<tr><td width="200"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Lithuania">Lithuania</td><td align="right">7 - 3</td><td align="right">(+39)</td></tr>
<tr><td width="200"><img src="img/Flags/United Kingdom.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=United Kingdom">United Kingdom</td><td align="right">4 - 6</td><td align="right">(+42)</td></tr>
<tr><td width="200"><img src="img/Flags/Denmark.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Denmark">Denmark</td><td align="right">4 - 6</td><td align="right">(-84)</td></tr>
<tr><td width="200"><img src="img/Flags/India.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=India">India</td><td align="right">0 - 10</td><td align="right">(-231)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP J</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Spain">Spain</td><td align="right">8 - 2</td><td align="right">(+217)</td></tr>
<tr bgcolor="#FFCC99"><td width="200" bgcolor="#FFCC99"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Finland">Finland</td><td align="right">6 - 4</td><td align="right">(+55)</td></tr>
<tr><td width="200"><img src="img/Flags/Malta.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Malta">Malta</td><td align="right">5 - 5</td><td align="right">(-47)</td></tr>
<tr><td width="200"><img src="img/Flags/Egypt.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Egypt">Egypt</td><td align="right">5 - 5</td><td align="right">(-64)</td></tr>
<tr><td width="200"><img src="img/Flags/Canada.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Canada">Canada</td><td align="right">3 - 7</td><td align="right">(-47)</td></tr>
<tr><td width="200"><img src="img/Flags/Uruguay.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Uruguay">Uruguay</td><td align="right">3 - 7</td><td align="right">(-114)</td></tr>
</table>

<?php
} elseif ($swc==4) {
?>

<b>4th U18 World Cup - Final Standings</b><br/><br/>

<span style="background-image:url(/img/12gold.gif); background-repeat: no-repeat;">&nbsp;1&nbsp;</span> <a href="u18teams.php?country=Slovenia" class="greenhilite">Slovenia</a> (<a href="club.php?clubid=1070">MOD-keyser</a>)<br/>
<span style="background-image:url(/img/12silver.gif); background-repeat: no-repeat;">&nbsp;2&nbsp;</span> <a href="u18teams.php?country=Poland" class="greenhilite">Poland</a> (<a href="club.php?clubid=3231">salo</a>)<br/>
<span style="background-image:url(/img/12bronze.gif); background-repeat: no-repeat;">&nbsp;3&nbsp;</span> <a href="u18teams.php?country=Romania" class="greenhilite">Romania</a> (<a href="club.php?clubid=3103">mire</a>)<br/>
&nbsp;4. <a href="u18teams.php?country=Lithuania" class="greenhilite">Lithuania</a> (<a href="club.php?clubid=11643">Gizzo</a>)<br/>
&nbsp;5. <a href="u18teams.php?country=Greece" class="greenhilite">Greece</a> (<a href="club.php?clubid=16621">thanosthrylos</a>)<br/>
&nbsp;6. <a href="u18teams.php?country=Italy" class="greenhilite">Italy</a> (<a href="club.php?clubid=188">Gianduia</a>)<br/>
&nbsp;7. <a href="u18teams.php?country=Bosnia" class="greenhilite">Bosnia and Herzegovina</a> (<a href="club.php?clubid=10136">Haree</a>)<br/>
&nbsp;8. <a href="u18teams.php?country=Brazil" class="greenhilite">Brazil</a> (<a href="club.php?clubid=1026">SubTekk</a>)<br/>
&nbsp;9. <a href="u18teams.php?country=Switzerland" class="greenhilite">Switzerland</a> (<a href="club.php?clubid=30180">Gollum</a>)<br/>
&nbsp;10. <a href="u18teams.php?country=Turkey" class="greenhilite">Turkey</a> (<a href="club.php?clubid=8531">Roran</a>)<br/>
&nbsp;11. <a href="u18teams.php?country=Chile" class="greenhilite">Chile</a> (<a href="club.php?clubid=48736">joros</a>)<br/>
&nbsp;12. <a href="u18teams.php?country=Germany" class="greenhilite">Germany</a> (<a href="club.php?clubid=304">poschdi</a>)<br/>
&nbsp;13. <a href="u18teams.php?country=Portugal" class="greenhilite">Portugal</a> (<a href="club.php?clubid=12210">randy_orton</a>)<br/>
&nbsp;14. <a href="u18teams.php?country=China" class="greenhilite">China</a> (<a href="club.php?clubid=53819">limefish</a>)<br/>
&nbsp;15. <a href="u18teams.php?country=Croatia" class="greenhilite">Croatia</a> (<a href="club.php?clubid=1514">Zvone</a>)<br/>
&nbsp;16. <a href="u18teams.php?country=Serbia" class="greenhilite">Serbia</a> (<a href="club.php?clubid=18787">Jack</a>)<br/>
&nbsp;17. <a href="u18teams.php?country=Bulgaria" class="greenhilite">Bulgaria</a> (<a href="club.php?clubid=12122">Valentin_Bonev</a>)<br/>
&nbsp;18. <a href="u18teams.php?country=Estonia" class="greenhilite">Estonia</a> (<a href="club.php?clubid=9119">GM-starte</a>)<br/>
&nbsp;19. <a href="u18teams.php?country=Belgium" class="greenhilite">Belgium</a> (<a href="club.php?clubid=35384">bahali</a>)<br/>
&nbsp;20. <a href="u18teams.php?country=Israel" class="greenhilite">Israel</a> (<a href="club.php?clubid=36323">BigOrion</a>)<br/>
&nbsp;21. <a href="u18teams.php?country=Hungary" class="greenhilite">Hungary</a> (<a href="club.php?clubid=8453">Zoli</a>)<br/>
&nbsp;22. <a href="u18teams.php?country=Finland" class="greenhilite">Finland</a> (<a href="club.php?clubid=5401">Cicero</a>)<br/>
&nbsp;23. <a href="u18teams.php?country=Argentina" class="greenhilite">Argentina</a> (<a href="club.php?clubid=5846">le0nel</a>)<br/>
&nbsp;24. <a href="u18teams.php?country=Norway" class="greenhilite">Norway</a> (<a href="club.php?clubid=71138">Master_Methos</a>)

</td><td class="border" width="50%">

<b><?=$langmark1448?></b><br/><br/>

<?=$langmark1453?>: <a href="league.php?country=Belgium">Belgium</a>, <a href="league.php?country=Netherlands">Netherlands</a><br/>
<?=$langmark1449?>: 60<br/>
<?=$langmark1450?>: 376<br/>
<?=$langmark1451?>: 6.191.713<br/>
<?=$langmark1452?>: 16.467<br/>


<br/><b><?=$langmark1454?></b><br/><br/>

PG: <a href="player.php?playerid=2742494">Lovro Magič</a> (Slovenia)<br/>
SG: <a href="player.php?playerid=2922508">Mario Sbaraglia</a> (Italy)<br/>
SF: <a href="player.php?playerid=2614310">Alexandru Ghita</a> (Romania)<br/>
PF: <a href="player.php?playerid=2640958">Goran Podobnik</a> (Slovenia)<br/>
C: <a href="player.php?playerid=2664492">Igor Jaroszewski</a> (Poland)<br/>

<br/><?=$langmark1455?>: <a href="player.php?playerid=2640958">Goran Podobnik</a> (Slovenia)
<br/><?=$langmark1456?>: <a href="player.php?playerid=2632693">Silvo Sever</a> (Slovenia)
</td>
</tr>
</table>

<table cellspacing="9" cellpadding="9" border="0" width="100%">
<tr bgcolor="white">
<td class="border" bgcolor="white" width="50%" valign="top">

<b><?=$langmark1457?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Poland">Poland</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=7165">80&nbsp;:&nbsp;91</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Slovenia">Slovenia</a>&nbsp;<img src="img/Flags/Slovenia.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1458?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Lithuania">Lithuania</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=7166">63&nbsp;:&nbsp;84</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Romania">Romania</a>&nbsp;<img src="img/Flags/Romania.png" border="0" alt=""></td></tr>
</table>


<br/><b><?=$langmark1459?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Lithuania">Lithuania</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=7141">60&nbsp;:&nbsp;78</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Poland">Poland</a>&nbsp;<img src="img/Flags/Poland.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Romania">Romania</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=7142">81&nbsp;:&nbsp;87</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Slovenia">Slovenia</a>&nbsp;<img src="img/Flags/Slovenia.png" border="0" alt=""></td></tr>
</table>


<br/><b><?=$langmark1460?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Lithuania">Lithuania</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=7119">80&nbsp;:&nbsp;79</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Greece">Greece</a>&nbsp;<img src="img/Flags/Greece.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Italy">Italy</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=7120">83&nbsp;:&nbsp;95</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Poland">Poland</a>&nbsp;<img src="img/Flags/Poland.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Romania">Romania</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=7121">79&nbsp;:&nbsp;65</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Bosnia and Herzegovina">Bosnia and Herzegovina</a>&nbsp;<img src="img/Flags/Bosnia and Herzegovina.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovenia">Slovenia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=7122">86&nbsp;:&nbsp;61</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Brazil">Brazil</a>&nbsp;<img src="img/Flags/Brazil.png" border="0" alt=""></td></tr>
</table>


<br/><b>Round of 16</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Lithuania">Lithuania</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=7087">92&nbsp;:&nbsp;70</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=China">China</a>&nbsp;<img src="img/Flags/China.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Turkey">Turkey</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=7088">60&nbsp;:&nbsp;64</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Greece">Greece</a>&nbsp;<img src="img/Flags/Greece.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Italy">Italy</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=7089">87&nbsp;:&nbsp;77</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Chile">Chile</a>&nbsp;<img src="img/Flags/Chile.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Poland">Poland</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=7090">90&nbsp;:&nbsp;55</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Serbia">Serbia</a>&nbsp;<img src="img/Flags/Serbia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Romania">Romania</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=7091">77&nbsp;:&nbsp;75</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Switzerland">Switzerland</a>&nbsp;<img src="img/Flags/Switzerland.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Croatia">Croatia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=7092">56&nbsp;:&nbsp;87</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Bosnia and Herzegovina">Bosnia and Herzegovina</a>&nbsp;<img src="img/Flags/Bosnia and Herzegovina.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovenia">Slovenia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=7093">100&nbsp;:&nbsp;78</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Portugal">Portugal</a>&nbsp;<img src="img/Flags/Portugal.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Germany">Germany</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=7094">55&nbsp;:&nbsp;75</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Brazil">Brazil</a>&nbsp;<img src="img/Flags/Brazil.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1462?></b><br/>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Lithuania">Lithuania</td><td align="right">4 - 1</td><td align="right">(+56)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Croatia">Croatia</td><td align="right">3 - 2</td><td align="right">(+43)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Brazil.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Brazil">Brazil</td><td align="right">3 - 2</td><td align="right">(+15)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Chile.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Chile">Chile</td><td align="right">2 - 3</td><td align="right">(-24)</td></tr>
<tr><td width="200"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Belgium">Belgium</td><td align="right">2 - 3</td><td align="right">(-50)</td></tr>
<tr><td width="200"><img src="img/Flags/Hungary.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Hungary">Hungary</td><td align="right">1 - 4</td><td align="right">(-40)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Italy">Italy</td><td align="right">5 - 0</td><td align="right">(+103)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Germany">Germany</td><td align="right">4 - 1</td><td align="right">(+39)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Bosnia and Herzegovina.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bosnia and Herzegovina">Bosnia and Herzegovina</td><td align="right">2 - 3</td><td align="right">(-21)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/China.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=China">China</td><td align="right">2 - 3</td><td align="right">(-49)</td></tr>
<tr><td width="200"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Israel">Israel</td><td align="right">1 - 4</td><td align="right">(-6)</td></tr>
<tr><td width="200"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Finland">Finland</td><td align="right">1 - 4</td><td align="right">(-66)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Romania">Romania</td><td align="right">4 - 1</td><td align="right">(+68)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Turkey">Turkey</td><td align="right">3 - 2</td><td align="right">(+30)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Serbia">Serbia</td><td align="right">3 - 2</td><td align="right">(+23)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Portugal">Portugal</td><td align="right">3 - 2</td><td align="right">(-25)</td></tr>
<tr><td width="200"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bulgaria">Bulgaria</td><td align="right">2 - 3</td><td align="right">(-4)</td></tr>
<tr><td width="200"><img src="img/Flags/Norway.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Norway">Norway</td><td align="right">0 - 5</td><td align="right">(-92)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovenia">Slovenia</td><td align="right">5 - 0</td><td align="right">(+107)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Poland">Poland</td><td align="right">3 - 2</td><td align="right">(+42)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Greece">Greece</td><td align="right">2 - 3</td><td align="right">(-8)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Switzerland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Switzerland">Switzerland</td><td align="right">2 - 3</td><td align="right">(-14)</td></tr>
<tr><td width="200"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Estonia">Estonia</td><td align="right">2 - 3</td><td align="right">(-49)</td></tr>
<tr><td width="200"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Argentina">Argentina</td><td align="right">1 - 4</td><td align="right">(-78)</td></tr>
</table>


</td>
<td width="50%" valign="top" class="border" bgcolor="white">

<b><?=$langmark1463?></b><br/>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Belgium">Belgium</td><td align="right">8 - 2</td><td align="right">(+199)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Argentina">Argentina</td><td align="right">7 - 3</td><td align="right">(+146)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Romania">Romania</td><td align="right">7 - 3</td><td align="right">(+92)</td></tr>
<tr><td width="200"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovakia">Slovakia</td><td align="right">6 - 4</td><td align="right">(-1)</td></tr>
<tr><td width="200"><img src="img/Flags/Malaysia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Malaysia">Malaysia</td><td align="right">2 - 8</td><td align="right">(-152)</td></tr>
<tr><td width="200"><img src="img/Flags/Peru.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Peru">Peru</td><td align="right">0 - 10</td><td align="right">(-284)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Poland">Poland</td><td align="right">10 - 0</td><td align="right">(+218)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bulgaria">Bulgaria</td><td align="right">7 - 3</td><td align="right">(+127)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Chile.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Chile">Chile</td><td align="right">7 - 3</td><td align="right">(+71)</td></tr>
<tr><td width="200"><img src="img/Flags/Uruguay.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Uruguay">Uruguay</td><td align="right">3 - 7</td><td align="right">(-55)</td></tr>
<tr><td width="200"><img src="img/Flags/Ukraine.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Ukraine">Ukraine</td><td align="right">2 - 8</td><td align="right">(-162)</td></tr>
<tr><td width="200"><img src="img/Flags/South Korea.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=South Korea">South Korea</td><td align="right">1 - 9</td><td align="right">(-199)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/China.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=China">China</td><td align="right">9 - 1</td><td align="right">(+154)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Hungary.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Hungary">Hungary</td><td align="right">8 - 2</td><td align="right">(+76)</td></tr>
<tr><td width="200"><img src="img/Flags/Philippines.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Philippines">Philippines</td><td align="right">6 - 4</td><td align="right">(+49)</td></tr>
<tr><td width="200"><img src="img/Flags/Cyprus.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Cyprus">Cyprus</td><td align="right">4 - 6</td><td align="right">(-28)</td></tr>
<tr><td width="200"><img src="img/Flags/Albania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Albania">Albania</td><td align="right">2 - 8</td><td align="right">(-79)</td></tr>
<tr><td width="200"><img src="img/Flags/Indonesia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Indonesia">Indonesia</td><td align="right">1 - 9</td><td align="right">(-172)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Serbia">Serbia</td><td align="right">8 - 2</td><td align="right">(+150)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Italy">Italy</td><td align="right">8 - 2</td><td align="right">(+134)</td></tr>
<tr><td width="200"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Latvia">Latvia</td><td align="right">6 - 4</td><td align="right">(+41)</td></tr>
<tr><td width="200"><img src="img/Flags/Denmark.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Denmark">Denmark</td><td align="right">6 - 4</td><td align="right">(+40)</td></tr>
<tr><td width="200"><img src="img/Flags/Mexico.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Mexico">Mexico</td><td align="right">2 - 8</td><td align="right">(-154)</td></tr>
<tr><td width="200"><img src="img/Flags/Tunisia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Tunisia">Tunisia</td><td align="right">0 - 10</td><td align="right">(-211)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP E</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Estonia">Estonia</td><td align="right">8 - 2</td><td align="right">(+166)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Norway.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Norway">Norway</td><td align="right">8 - 2</td><td align="right">(+68)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Israel">Israel</td><td align="right">7 - 3</td><td align="right">(+114)</td></tr>
<tr><td width="200"><img src="img/Flags/New Zealand.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=New Zealand">New Zealand</td><td align="right">4 - 6</td><td align="right">(-69)</td></tr>
<tr><td width="200"><img src="img/Flags/FYR Macedonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=FYR Macedonia">FYR Macedonia</td><td align="right">2 - 8</td><td align="right">(-112)</td></tr>
<tr><td width="200"><img src="img/Flags/Malta.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Malta">Malta</td><td align="right">1 - 9</td><td align="right">(-167)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP F</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovenia">Slovenia</td><td align="right">8 - 2</td><td align="right">(+135)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Finland">Finland</td><td align="right">6 - 4</td><td align="right">(+1)</td></tr>
<tr><td width="200"><img src="img/Flags/Netherlands.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Netherlands">Netherlands</td><td align="right">5 - 5</td><td align="right">(-1)</td></tr>
<tr><td width="200"><img src="img/Flags/Austria.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Austria">Austria</td><td align="right">5 - 5</td><td align="right">(-47)</td></tr>
<tr><td width="200"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Spain">Spain</td><td align="right">4 - 6</td><td align="right">(+33)</td></tr>
<tr><td width="200"><img src="img/Flags/India.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=India">India</td><td align="right">2 - 8</td><td align="right">(-121)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP G</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Brazil.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Brazil">Brazil</td><td align="right">9 - 1</td><td align="right">(+174)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Germany">Germany</td><td align="right">9 - 1</td><td align="right">(+151)</td></tr>
<tr><td width="200"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=USA">USA</td><td align="right">6 - 4</td><td align="right">(+113)</td></tr>
<tr><td width="200"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Australia">Australia</td><td align="right">4 - 6</td><td align="right">(-5)</td></tr>
<tr><td width="200"><img src="img/Flags/Colombia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Colombia">Colombia</td><td align="right">1 - 9</td><td align="right">(-183)</td></tr>
<tr><td width="200"><img src="img/Flags/Sweden.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Sweden">Sweden</td><td align="right">1 - 9</td><td align="right">(-250)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP H</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Turkey">Turkey</td><td align="right">10 - 0</td><td align="right">(+236)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Greece">Greece</td><td align="right">7 - 3</td><td align="right">(+108)</td></tr>
<tr><td width="200"><img src="img/Flags/Canada.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Canada">Canada</td><td align="right">6 - 4</td><td align="right">(-1)</td></tr>
<tr><td width="200"><img src="img/Flags/Czech Republic.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Czech Republic">Czech Republic</td><td align="right">4 - 6</td><td align="right">(+1)</td></tr>
<tr><td width="200"><img src="img/Flags/Thailand.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Thailand">Thailand</td><td align="right">3 - 7</td><td align="right">(-159)</td></tr>
<tr><td width="200"><img src="img/Flags/Hong Kong.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Hong Kong">Hong Kong</td><td align="right">0 - 10</td><td align="right">(-185)</td></tr>

</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP I</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Bosnia and Herzegovina.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bosnia and Herzegovina">Bosnia and Herzegovina</td><td align="right">9 - 1</td><td align="right">(+95)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Croatia">Croatia</td><td align="right">7 - 3</td><td align="right">(+90)</td></tr>
<tr><td width="200"><img src="img/Flags/United Kingdom.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=United Kingdom">United Kingdom</td><td align="right">6 - 4</td><td align="right">(+104)</td></tr>
<tr><td width="200"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=France">France</td><td align="right">5 - 5</td><td align="right">(-6)</td></tr>
<tr><td width="200"><img src="img/Flags/Ireland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Ireland">Ireland</td><td align="right">3 - 7</td><td align="right">(-45)</td></tr>
<tr><td width="200"><img src="img/Flags/Egypt.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Egypt">Egypt</td><td align="right">0 - 10</td><td align="right">(-238)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP J</b></td></tr></table>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Portugal">Portugal</td><td align="right">8 - 2</td><td align="right">(+138)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Lithuania">Lithuania</td><td align="right">8 - 2</td><td align="right">(+135)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Switzerland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Switzerland">Switzerland</td><td align="right">7 - 3</td><td align="right">(+67)</td></tr>
<tr><td width="200"><img src="img/Flags/Venezuela.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Venezuela">Venezuela</td><td align="right">4 - 6</td><td align="right">(-73)</td></tr>
<tr><td width="200"><img src="img/Flags/Russia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Russia">Russia</td><td align="right">3 - 7</td><td align="right">(-9)</td></tr>
<tr><td width="200"><img src="img/Flags/Montenegro.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Montenegro">Montenegro</td><td align="right">0 - 10</td><td align="right">(-258)</td></tr>
</table>

<?php
} elseif ($swc==5) {
?>

<b>5th U18 World Cup - Final Standings</b><br/><br/>

<span style="background-image:url(/img/12gold.gif); background-repeat: no-repeat;">&nbsp;1&nbsp;</span> <a href="u18teams.php?country=Estonia" class="greenhilite">Estonia</a> (<a href="club.php?clubid=9119">GM-starte</a>)<br/>
<span style="background-image:url(/img/12silver.gif); background-repeat: no-repeat;">&nbsp;2&nbsp;</span> <a href="u18teams.php?country=Portugal" class="greenhilite">Portugal</a> (<a href="club.php?clubid=12210">randy_orton</a>)<br/>
<span style="background-image:url(/img/12bronze.gif); background-repeat: no-repeat;">&nbsp;3&nbsp;</span> <a href="u18teams.php?country=Bulgaria" class="greenhilite">Bulgaria</a> (<a href="club.php?clubid=27871">likantrop</a>)<br/>
&nbsp;4. <a href="u18teams.php?country=Spain" class="greenhilite">Spain</a> (<a href="club.php?clubid=9210">nash_11</a>)<br/>
&nbsp;5. <a href="u18teams.php?country=Greece" class="greenhilite">Greece</a> (<a href="club.php?clubid=16621">thanosthrylos</a>)<br/>
&nbsp;6. <a href="u18teams.php?country=Slovakia" class="greenhilite">Slovakia</a> (<a href="club.php?clubid=58960">dodod</a>)<br/>
&nbsp;7. <a href="u18teams.php?country=Poland" class="greenhilite">Poland</a> (<a href="club.php?clubid=3231">salo</a>)<br/>
&nbsp;8. <a href="u18teams.php?country=Italy" class="greenhilite">Italy</a> (<a href="club.php?clubid=1895">mauroth</a>)<br/>
&nbsp;9. <a href="u18teams.php?country=Croatia" class="greenhilite">Croatia</a> (<a href="club.php?clubid=1514">Zvone</a>)<br/>
&nbsp;10. <a href="u18teams.php?country=Latvia" class="greenhilite">Latvia</a> (<a href="club.php?clubid=13728">kasers</a>)<br/>
&nbsp;11. <a href="u18teams.php?country=Germany" class="greenhilite">Germany</a> (<a href="club.php?clubid=31067">Bonner</a>)<br/>
&nbsp;12. <a href="u18teams.php?country=FYR Macedonia" class="greenhilite">FYR Macedonia</a> (<a href="club.php?clubid=38629">m`ki</a>)<br/>
&nbsp;13. <a href="u18teams.php?country=Turkey" class="greenhilite">Turkey</a> (<a href="club.php?clubid=62681">maydanoz</a>)<br/>
&nbsp;14. <a href="u18teams.php?country=Belgium" class="greenhilite">Belgium</a> (<a href="club.php?clubid=57885">fugazi</a>)<br/>
&nbsp;15. <a href="u18teams.php?country=Thailand" class="greenhilite">Thailand</a> (<a href="club.php?clubid=3068">hatukas</a>)<br/>
&nbsp;16. <a href="u18teams.php?country=Serbia" class="greenhilite">Serbia</a> (<a href="club.php?clubid=13943">corrupt</a>)<br/>
&nbsp;17. <a href="u18teams.php?country=Lithuania" class="greenhilite">Lithuania</a> (<a href="club.php?clubid=11643">Gizzo</a>)<br/>
&nbsp;18. <a href="u18teams.php?country=Argentina" class="greenhilite">Argentina</a> (<a href="club.php?clubid=5846">le0nel</a>)<br/>
&nbsp;19. <a href="u18teams.php?country=USA" class="greenhilite">USA</a> (<a href="club.php?clubid=52490">nate</a>)<br/>
&nbsp;20. <a href="u18teams.php?country=Canada" class="greenhilite">Canada</a> (<a href="club.php?clubid=49752">equercus</a>)<br/>
&nbsp;21. <a href="u18teams.php?country=United Kingdom" class="greenhilite">United Kingdom</a> (<a href="club.php?clubid=71283">Murphy</a>)<br/>
&nbsp;22. <a href="u18teams.php?country=Israel" class="greenhilite">Israel</a> (<a href="club.php?clubid=29921">amos</a>)<br/>
&nbsp;23. <a href="u18teams.php?country=Australia" class="greenhilite">Australia</a> (<a href="club.php?clubid=28399">joshihow</a>)<br/>
&nbsp;24. <a href="u18teams.php?country=Uruguay" class="greenhilite">Uruguay</a> (<a href="club.php?clubid=43412">martindgi</a>)

</td><td class="border" width="50%">

<b><?=$langmark1448?></b><br/><br/>

<?=$langmark1453?>: <a href="league.php?country=Slovenia">Slovenia</a>, <a href="league.php?country=Croatia">Croatia</a><br/>
<?=$langmark1449?>: 60<br/>
<?=$langmark1450?>: 378<br/>
<?=$langmark1451?>: 10.235.818<br/>
<?=$langmark1452?>: 27.078<br/>

<br/><b><?=$langmark1454?></b><br/><br/>

PG: <a href="player.php?playerid=3164622">Stylianos Antikatzides</a> (Greece)<br/>
SG: <a href="player.php?playerid=3171049">Olev Nael</a> (Estonia)<br/>
SF: <a href="player.php?playerid=3136419">Lúcio Branco</a> (Portugal)<br/>
PF: <a href="player.php?playerid=3423588">Ivo Todorov</a> (Bulgaria)<br/>
C: <a href="player.php?playerid=3164173">Alar Smirnov</a> (Estonia)<br/>

<br/><?=$langmark1455?>: <a href="player.php?playerid=3423588">Ivo Todorov</a> (Bulgaria)
<br/><?=$langmark1456?>: <a href="player.php?playerid=3144641">Andrus Pind</a> (Estonia)
</td>
</tr>
</table>

<table cellspacing="9" cellpadding="9" border="0" width="100%">
<tr bgcolor="white">
<td class="border" bgcolor="white" width="50%" valign="top">

<b><?=$langmark1457?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Estonia">Estonia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=9180">107&nbsp;:&nbsp;75</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Portugal">Portugal</a>&nbsp;<img src="img/Flags/Portugal.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1458?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bulgaria">Bulgaria</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=9181">76&nbsp;:&nbsp;58</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Spain">Spain</a>&nbsp;<img src="img/Flags/Spain.png" border="0" alt=""></td></tr>
</table>

<br/><b>5th place match</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Greece">Greece</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=9182">86&nbsp;:&nbsp;58</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Slovakia">Slovakia</a>&nbsp;<img src="img/Flags/Slovakia.png" border="0" alt=""></td></tr>
</table>

<br/><b>7th place match</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Poland">Poland</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=9155">90&nbsp;:&nbsp;83</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Italy">Italy</a>&nbsp;<img src="img/Flags/Italy.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1459?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bulgaria">Bulgaria</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=9153">60&nbsp;:&nbsp;69</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Estonia">Estonia</a>&nbsp;<img src="img/Flags/Estonia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Portugal">Portugal</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=9154">80&nbsp;:&nbsp;78</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Spain">Spain</a>&nbsp;<img src="img/Flags/Spain.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1460?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Greece">Greece</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=9128">80&nbsp;:&nbsp;84</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Bulgaria">Bulgaria</a>&nbsp;<img src="img/Flags/Bulgaria.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Poland">Poland</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=9129">84&nbsp;:&nbsp;97</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Estonia">Estonia</a>&nbsp;<img src="img/Flags/Estonia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Portugal">Portugal</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=9130">61&nbsp;:&nbsp;56</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Slovakia">Slovakia</a>&nbsp;<img src="img/Flags/Slovakia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Italy">Italy</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=9131">63&nbsp;:&nbsp;78</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Spain">Spain</a>&nbsp;<img src="img/Flags/Spain.png" border="0" alt=""></td></tr>
</table>


<br/><b>Round of 16</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Greece">Greece</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=9094">99&nbsp;:&nbsp;75</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Thailand">Thailand</a>&nbsp;<img src="img/Flags/Thailand.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/FYR Macedonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=FYR Macedonia">FYR Macedonia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=9095">66&nbsp;:&nbsp;83</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Bulgaria">Bulgaria</a>&nbsp;<img src="img/Flags/Bulgaria.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Poland">Poland</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=9096">91&nbsp;:&nbsp;53</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Serbia">Serbia</a>&nbsp;<img src="img/Flags/Serbia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Estonia">Estonia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=9097">87&nbsp;:&nbsp;66</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Turkey">Turkey</a>&nbsp;<img src="img/Flags/Turkey.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Latvia">Latvia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=9098">72&nbsp;:&nbsp;83</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Portugal">Portugal</a>&nbsp;<img src="img/Flags/Portugal.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Belgium">Belgium</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=9099">61&nbsp;:&nbsp;82</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Slovakia">Slovakia</a>&nbsp;<img src="img/Flags/Slovakia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Italy">Italy</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=9100">79&nbsp;:&nbsp;78</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Croatia">Croatia</a>&nbsp;<img src="img/Flags/Croatia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Spain">Spain</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=9101">81&nbsp;:&nbsp;70</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Germany">Germany</a>&nbsp;<img src="img/Flags/Germany.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1462?></b><br/>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b> (<a class="greenhilite" href="region.php?region=Ljubljana"><i>Ljubljana</i></a>)</td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Greece">Greece</td><td align="right">5 - 0</td><td align="right">(+142)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Belgium">Belgium</td><td align="right">4 - 1</td><td align="right">(+19)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Germany">Germany</td><td align="right">3 - 2</td><td align="right">(-9)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Serbia">Serbia</td><td align="right">2 - 3</td><td align="right">(-39)</td></tr>
<tr><td width="200"><img src="img/Flags/Canada.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Canada">Canada</td><td align="right">1 - 4</td><td align="right">(-80)</td></tr>
<tr><td width="200"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Australia">Australia</td><td align="right">0 - 5</td><td align="right">(-33)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b> (<a class="greenhilite" href="region.php?region=Novo mesto"><i>Novo mesto</i></a>)</td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Poland">Poland</td><td align="right">4 - 1</td><td align="right">(+97)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Spain">Spain</td><td align="right">4 - 1</td><td align="right">(+24)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovakia">Slovakia</td><td align="right">3 - 2</td><td align="right">(-5)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Thailand.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Thailand">Thailand</td><td align="right">2 - 3</td><td align="right">(-43)</td></tr>
<tr><td width="200"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Argentina">Argentina</td><td align="right">1 - 4</td><td align="right">(-28)</td></tr>
<tr><td width="200"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Israel">Israel</td><td align="right">1 - 4</td><td align="right">(-45)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b> (<a class="greenhilite" href="region.php?region=Zagreb"><i>Zagreb</i></a>)</td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Latvia">Latvia</td><td align="right">3 - 2</td><td align="right">(+44)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/FYR Macedonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=FYR Macedonia">FYR Macedonia</td><td align="right">3 - 2</td><td align="right">(+39)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Turkey">Turkey</td><td align="right">3 - 2</td><td align="right">(+30)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Croatia">Croatia</td><td align="right">2 - 3</td><td align="right">(-24)</td></tr>
<tr><td width="200"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Lithuania">Lithuania</td><td align="right">2 - 3</td><td align="right">(-26)</td></tr>
<tr><td width="200"><img src="img/Flags/United Kingdom.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=United Kingdom">United Kingdom</td><td align="right">2 - 3</td><td align="right">(-63)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b> (<a class="greenhilite" href="region.php?region=Split"><i>Split</i></a>/<a class="greenhilite" href="region.php?region=Dubrovnik"><i>Dubrovnik</i></a>)</td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Italy">Italy</td><td align="right">5 - 0</td><td align="right">(+101)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Estonia">Estonia</td><td align="right">4 - 1</td><td align="right">(+107)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bulgaria">Bulgaria</td><td align="right">3 - 2</td><td align="right">(+41)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Portugal">Portugal</td><td align="right">2 - 3</td><td align="right">(-76)</td></tr>
<tr><td width="200"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=USA">USA</td><td align="right">1 - 4</td><td align="right">(-40)</td></tr>
<tr><td width="200"><img src="img/Flags/Uruguay.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Uruguay">Uruguay</td><td align="right">0 - 5</td><td align="right">(-133)</td></tr>
</table>


</td>
<td width="50%" valign="top" class="border" bgcolor="white">

<b><?=$langmark1463?></b><br/>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Croatia">Croatia</td><td align="right">8 - 2</td><td align="right">(+36)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Australia">Australia</td><td align="right">6 - 4</td><td align="right">(+102)</td></tr>
<tr><td width="200"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovenia">Slovenia</td><td align="right">6 - 4</td><td align="right">(+70)</td></tr>
<tr><td width="200"><img src="img/Flags/Chile.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Chile">Chile</td><td align="right">6 - 4</td><td align="right">(+60)</td></tr>
<tr><td width="200"><img src="img/Flags/New Zealand.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=New Zealand">New Zealand</td><td align="right">3 - 7</td><td align="right">(-109)</td></tr>
<tr><td width="200"><img src="img/Flags/Montenegro.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Montenegro">Montenegro</td><td align="right">1 - 9</td><td align="right">(-159)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Latvia">Latvia</td><td align="right">8 - 2</td><td align="right">(+171)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Poland">Poland</td><td align="right">8 - 2</td><td align="right">(+66)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Belgium">Belgium</td><td align="right">8 - 2</td><td align="right">(+65)</td></tr>
<tr><td width="200"><img src="img/Flags/Peru.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Peru">Peru</td><td align="right">3 - 7</td><td align="right">(-59)</td></tr>
<tr><td width="200"><img src="img/Flags/Russia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Russia">Russia</td><td align="right">3 - 7</td><td align="right">(-70)</td></tr>
<tr><td width="200"><img src="img/Flags/Norway.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Norway">Norway</td><td align="right">0 - 10</td><td align="right">(-173)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Italy">Italy</td><td align="right">9 - 1</td><td align="right">(+185)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Greece">Greece</td><td align="right">9 - 1</td><td align="right">(+103)</td></tr>
<tr><td width="200"><img src="img/Flags/Switzerland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Switzerland">Switzerland</td><td align="right">6 - 4</td><td align="right">(-9)</td></tr>
<tr><td width="200"><img src="img/Flags/Netherlands.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Netherlands">Netherlands</td><td align="right">3 - 7</td><td align="right">(-71)</td></tr>
<tr><td width="200"><img src="img/Flags/Colombia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Colombia">Colombia</td><td align="right">3 - 7</td><td align="right">(-76)</td></tr>
<tr><td width="200"><img src="img/Flags/Ireland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Ireland">Ireland</td><td align="right">0 - 10</td><td align="right">(-132)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Uruguay.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Uruguay">Uruguay</td><td align="right">8 - 2</td><td align="right">(+176)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Germany">Germany</td><td align="right">8 - 2</td><td align="right">(+138)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Israel">Israel</td><td align="right">7 - 3</td><td align="right">(+89)</td></tr>
<tr><td width="200"><img src="img/Flags/Austria.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Austria">Austria</td><td align="right">5 - 5</td><td align="right">(+32)</td></tr>
<tr><td width="200"><img src="img/Flags/Tunisia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Tunisia">Tunisia</td><td align="right">2 - 8</td><td align="right">(-180)</td></tr>
<tr><td width="200"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=France">France</td><td align="right">0 - 10</td><td align="right">(-255)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP E</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovakia">Slovakia</td><td align="right">8 - 2</td><td align="right">(+101)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Lithuania">Lithuania</td><td align="right">7 - 3</td><td align="right">(+90)</td></tr>
<tr><td width="200"><img src="img/Flags/Czech Republic.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Czech Republic">Czech Republic</td><td align="right">5 - 5</td><td align="right">(+84)</td></tr>
<tr><td width="200"><img src="img/Flags/China.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=China">China</td><td align="right">5 - 5</td><td align="right">(+28)</td></tr>
<tr><td width="200"><img src="img/Flags/Mexico.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Mexico">Mexico</td><td align="right">4 - 6</td><td align="right">(-81)</td></tr>
<tr><td width="200"><img src="img/Flags/Egypt.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Egypt">Egypt</td><td align="right">1 - 9</td><td align="right">(-222)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP F</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Serbia">Serbia</td><td align="right">9 - 1</td><td align="right">(+169)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Portugal">Portugal</td><td align="right">8 - 2</td><td align="right">(+117)</td></tr>
<tr><td width="200"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Finland">Finland</td><td align="right">6 - 4</td><td align="right">(+67)</td></tr>
<tr><td width="200"><img src="img/Flags/Hungary.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Hungary">Hungary</td><td align="right">3 - 7</td><td align="right">(-38)</td></tr>
<tr><td width="200"><img src="img/Flags/Indonesia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Indonesia">Indonesia</td><td align="right">3 - 7</td><td align="right">(-62)</td></tr>
<tr><td width="200"><img src="img/Flags/South Korea.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=South Korea">South Korea</td><td align="right">1 - 9</td><td align="right">(-253)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP G</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Argentina">Argentina</td><td align="right">10 - 0</td><td align="right">(+288)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/United Kingdom.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=United Kingdom">United Kingdom</td><td align="right">7 - 3</td><td align="right">(+95)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bulgaria">Bulgaria</td><td align="right">6 - 4</td><td align="right">(+74)</td></tr>
<tr><td width="200"><img src="img/Flags/Denmark.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Denmark">Denmark</td><td align="right">3 - 7</td><td align="right">(-116)</td></tr>
<tr><td width="200"><img src="img/Flags/India.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=India">India</td><td align="right">3 - 7</td><td align="right">(-162)</td></tr>
<tr><td width="200"><img src="img/Flags/Albania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Albania">Albania</td><td align="right">1 - 9</td><td align="right">(-179)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP H</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Turkey">Turkey</td><td align="right">10 - 0</td><td align="right">(+250)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Thailand.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Thailand">Thailand</td><td align="right">7 - 3</td><td align="right">(+92)</td></tr>
<tr><td width="200"><img src="img/Flags/Bosnia and Herzegovina.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bosnia and Herzegovina">Bosnia and Herzegovina</td><td align="right">6 - 4</td><td align="right">(+43)</td></tr>
<tr><td width="200"><img src="img/Flags/Cyprus.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Cyprus">Cyprus</td><td align="right">3 - 7</td><td align="right">(-51)</td></tr>
<tr><td width="200"><img src="img/Flags/Hong Kong.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Hong Kong">Hong Kong</td><td align="right">3 - 7</td><td align="right">(-137)</td></tr>
<tr><td width="200"><img src="img/Flags/Venezuela.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Venezuela">Venezuela</td><td align="right">1 - 9</td><td align="right">(-197)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP I</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Canada.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Canada">Canada</td><td align="right">8 - 2</td><td align="right">(+207)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Estonia">Estonia</td><td align="right">8 - 2</td><td align="right">(+165)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/FYR Macedonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=FYR Macedonia">FYR Macedonia</td><td align="right">7 - 3</td><td align="right">(+185)</td></tr>
<tr><td width="200"><img src="img/Flags/Brazil.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Brazil">Brazil</td><td align="right">5 - 5</td><td align="right">(-2)</td></tr>
<tr><td width="200"><img src="img/Flags/Malaysia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Malaysia">Malaysia</td><td align="right">2 - 8</td><td align="right">(-218)</td></tr>
<tr><td width="200"><img src="img/Flags/Ukraine.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Ukraine">Ukraine</td><td align="right">0 - 10</td><td align="right">(-337)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP J</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Spain">Spain</td><td align="right">8 - 2</td><td align="right">(+73)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=USA">USA</td><td align="right">7 - 3</td><td align="right">(+52)</td></tr>
<tr><td width="200"><img src="img/Flags/Sweden.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Sweden">Sweden</td><td align="right">6 - 4</td><td align="right">(+58)</td></tr>
<tr><td width="200"><img src="img/Flags/Malta.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Malta">Malta</td><td align="right">4 - 6</td><td align="right">(-67)</td></tr>
<tr><td width="200"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Romania">Romania</td><td align="right">3 - 7</td><td align="right">(-28)</td></tr>
<tr><td width="200"><img src="img/Flags/Philippines.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Philippines">Philippines</td><td align="right">2 - 8</td><td align="right">(-88)</td></tr>
</table>

<?php
} elseif($swc==6) {
?>

<b>6th U18 World Cup - Final Standings</b><br/><br/>

<span style="background-image:url(/img/12gold.gif); background-repeat: no-repeat;">&nbsp;1&nbsp;</span> <a href="u18teams.php?country=USA" class="greenhilite">USA</a> (<a href="club.php?clubid=52490">nate</a>)<br/>
<span style="background-image:url(/img/12silver.gif); background-repeat: no-repeat;">&nbsp;2&nbsp;</span> <a href="u18teams.php?country=Argentina" class="greenhilite">Argentina</a> (<a href="club.php?clubid=5846">le0nel</a>)<br/>
<span style="background-image:url(/img/12bronze.gif); background-repeat: no-repeat;">&nbsp;3&nbsp;</span> <a href="u18teams.php?country=Slovenia" class="greenhilite">Slovenia</a> (<a href="club.php?clubid=1078">schmex</a>)<br/>
&nbsp;4. <a href="u18teams.php?country=Lithuania" class="greenhilite">Lithuania</a> (<a href="club.php?clubid=49781">Jurgis1</a>)<br/>
&nbsp;5. <a href="u18teams.php?country=Italy" class="greenhilite">Italy</a> (<a href="club.php?clubid=29420">Skip</a>)<br/>
&nbsp;6. <a href="u18teams.php?country=Poland" class="greenhilite">Poland</a> (<a href="club.php?clubid=35935">dwyanewade333</a>)<br/>
&nbsp;7. <a href="u18teams.php?country=Estonia" class="greenhilite">Estonia</a> (<a href="club.php?clubid=74980">aadi</a>)<br/>
&nbsp;8. <a href="u18teams.php?country=Greece" class="greenhilite">Greece</a> (<a href="club.php?clubid=54025">skordalias</a>)<br/>
&nbsp;9. <a href="u18teams.php?country=United Kingdom" class="greenhilite">United Kingdom</a> (LucaBadoer)<br/>
&nbsp;10. <a href="u18teams.php?country=Latvia" class="greenhilite">Latvia</a> (<a href="club.php?clubid=13728">kasers</a>)<br/>
&nbsp;11. <a href="u18teams.php?country=Romania" class="greenhilite">Romania</a> (<a href="club.php?clubid=67031">jourjaque</a>)<br/>
&nbsp;12. <a href="u18teams.php?country=Slovakia" class="greenhilite">Slovakia</a> (<a href="club.php?clubid=58960">dodod</a>)<br/>
&nbsp;13. <a href="u18teams.php?country=Switzerland" class="greenhilite">Switzerland</a> (<a href="club.php?clubid=5401">Cicero</a>)<br/>
&nbsp;14. <a href="u18teams.php?country=Bulgaria" class="greenhilite">Bulgaria</a> (<a href="club.php?clubid=27871">likantrop</a>)<br/>
&nbsp;15. <a href="u18teams.php?country=Czech Republic" class="greenhilite">Czech Republic</a> (<a href="club.php?clubid=104090">madskillz</a>)<br/>
&nbsp;16. <a href="u18teams.php?country=Croatia" class="greenhilite">Croatia</a> (<a href="club.php?clubid=1514">Zvone</a>)<br/>
&nbsp;17. <a href="u18teams.php?country=Portugal" class="greenhilite">Portugal</a> (<a href="club.php?clubid=28052">fr0z3nshad3</a>)<br/>
&nbsp;18. <a href="u18teams.php?country=China" class="greenhilite">China</a> (<a href="club.php?clubid=36510">perastikos_13</a>)<br/>
&nbsp;19. <a href="u18teams.php?country=Serbia" class="greenhilite">Serbia</a> (<a href="club.php?clubid=60637">RodjenLosh</a>)<br/>
&nbsp;20. <a href="u18teams.php?country=Finland" class="greenhilite">Finland</a> (<a href="club.php?clubid=6424">moonkey</a>)<br/>
&nbsp;21. <a href="u18teams.php?country=Philippines" class="greenhilite">Philippines</a> (<a href="club.php?clubid=104009">naismith2010</a>)<br/>
&nbsp;22. <a href="u18teams.php?country=Canada" class="greenhilite">Canada</a> (<a href="club.php?clubid=102232">ShadyLady</a>)<br/>
&nbsp;23. <a href="u18teams.php?country=South Korea" class="greenhilite">South Korea</a> (<a href="club.php?clubid=94785">yoshi</a>)<br/>
&nbsp;24. <a href="u18teams.php?country=Turkey" class="greenhilite">Turkey</a> (<a href="club.php?clubid=21730">mukemmel</a>)<br/>

</td><td class="border" width="50%">

<b><?=$langmark1448?></b><br/><br/>

<?=$langmark1453?>: <a href="league.php?country=Italy">Italy</a><br/>
<?=$langmark1449?>: 60<br/>
<?=$langmark1450?>: 378<br/>
<?=$langmark1451?>: 8.229.558<br/>
<?=$langmark1452?>: 21.771<br/>

<br/><b><?=$langmark1454?></b><br/><br/>

PG: <a href="player.php?playerid=3613021">Sabino Porta</a> (Argentina)<br/>
SG: <a href="player.php?playerid=3589455">Ernest Petelin</a> (Slovenia)<br/>
SF: <a href="player.php?playerid=3443667">Liudvikas Žukauskas</a> (Lithuania)<br/>
PF: <a href="player.php?playerid=3588820">Dexter Feldman</a> (USA)<br/>
C: <a href="player.php?playerid=3438418">Jaak Tohver</a> (Estonia)<br/>

<br/><?=$langmark1455?>: <a href="player.php?playerid=3588820">Dexter Feldman</a> (USA)
<br/><?=$langmark1456?>: <a href="player.php?playerid=3588820">Dexter Feldman</a> (USA)
</td>
</tr>
</table>

<table cellspacing="9" cellpadding="9" border="0" width="100%">
<tr bgcolor="white">
<td class="border" bgcolor="white" width="50%" valign="top">

<b><?=$langmark1457?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Argentina">Argentina</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=11284">71&nbsp;:&nbsp;72</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=USA">USA</a>&nbsp;<img src="img/Flags/USA.png" border="0" alt=""></td></tr>
</table>
<!--<table width="100%" bgcolor="#F5F5F5">
<tr><td colspan="2" style="border-top: solid 1px LightSteelBlue;"></td></tr>
<tr><td colspan="2">Starts at 10:00 (LA) 13:00 (NY) 15:00 (Buenos Aires)</td></tr>
<tr><td colspan="2" style="border-bottom: solid 1px LightSteelBlue;"></td></tr>
</table>-->

<br/><b><?=$langmark1458?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovenia">Slovenia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=11285">80&nbsp;:&nbsp;63</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Lithuania">Lithuania</a>&nbsp;<img src="img/Flags/Lithuania.png" border="0" alt=""></td></tr>
</table>

<br/><b>5th place match</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Poland">Poland</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=11286">61&nbsp;:&nbsp;76</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Italy">Italy</a>&nbsp;<img src="img/Flags/Italy.png" border="0" alt=""></td></tr>
</table>

<br/><b>7th place match</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Estonia">Estonia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=11262">88&nbsp;:&nbsp;65</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Greece">Greece</a>&nbsp;<img src="img/Flags/Greece.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1459?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Argentina">Argentina</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=11260">77&nbsp;:&nbsp;74</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Slovenia">Slovenia</a>&nbsp;<img src="img/Flags/Slovenia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Lithuania">Lithuania</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=11261">73&nbsp;:&nbsp;79</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=USA">USA</a>&nbsp;<img src="img/Flags/USA.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1460?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Poland">Poland</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=11233">70&nbsp;:&nbsp;78</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Argentina">Argentina</a>&nbsp;<img src="img/Flags/Argentina.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovenia">Slovenia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=11234">84&nbsp;:&nbsp;74</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Estonia">Estonia</a>&nbsp;<img src="img/Flags/Estonia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Italy">Italy</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=11235">66&nbsp;:&nbsp;73</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Lithuania">Lithuania</a>&nbsp;<img src="img/Flags/Lithuania.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=USA">USA</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=11236">79&nbsp;:&nbsp;67</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Greece">Greece</a>&nbsp;<img src="img/Flags/Greece.png" border="0" alt=""></td></tr>
</table>

<br/><b>Round of 16</b><br/><br/>

<table cellpadding="1" cellspacing="0" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Latvia">Latvia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=11193">74&nbsp;:&nbsp;79</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Poland">Poland</a>&nbsp;<img src="img/Flags/Poland.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Argentina">Argentina</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=11194">78&nbsp;:&nbsp;72</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Slovakia">Slovakia</a>&nbsp;<img src="img/Flags/Slovakia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovenia">Slovenia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=11195">84&nbsp;:&nbsp;61</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Croatia">Croatia</a>&nbsp;<img src="img/Flags/Croatia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Estonia">Estonia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=11196">71&nbsp;:&nbsp;66</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Romania">Romania</a>&nbsp;<img src="img/Flags/Romania.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Italy">Italy</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=11197">78&nbsp;:&nbsp;77</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=United Kingdom">United Kingdom</a>&nbsp;<img src="img/Flags/United Kingdom.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Lithuania">Lithuania</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=11198">81&nbsp;:&nbsp;67</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Switzerland">Switzerland</a>&nbsp;<img src="img/Flags/Switzerland.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=USA">USA</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=11199">83&nbsp;:&nbsp;61</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Czech Republic">Czech Republic</a>&nbsp;<img src="img/Flags/Czech Republic.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bulgaria">Bulgaria</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=11200">46&nbsp;:&nbsp;64</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Greece">Greece</a>&nbsp;<img src="img/Flags/Greece.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1462?></b><br/>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b> (<a class="greenhilite" href="region.php?region=Milano"><i>Milano</i></a>)</td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Latvia">Latvia</td><td align="right">4 - 1</td><td align="right">(+26)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Lithuania">Lithuania</td><td align="right">4 - 1</td><td align="right">(+17)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Greece">Greece</td><td align="right">3 - 2</td><td align="right">(+32)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Croatia">Croatia</td><td align="right">2 - 3</td><td align="right">(-10)</td></tr>
<tr><td width="200"><img src="img/Flags/China.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=China">China</td><td align="right">1 - 4</td><td align="right">(-11)</td></tr>
<tr><td width="200"><img src="img/Flags/Canada.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Canada">Canada</td><td align="right">1 - 4</td><td align="right">(-54)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b> (<a class="greenhilite" href="region.php?region=Lombardia"><i>Lombardia</i></a>)</td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovenia">Slovenia</td><td align="right">4 - 1</td><td align="right">(+51)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bulgaria">Bulgaria</td><td align="right">3 - 2</td><td align="right">(+5)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Switzerland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Switzerland">Switzerland</td><td align="right">3 - 2</td><td align="right">(-31)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Poland">Poland</td><td align="right">2 - 3</td><td align="right">(+13)</td></tr>
<tr><td width="200"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Portugal">Portugal</td><td align="right">2 - 3</td><td align="right">(+3)</td></tr>
<tr><td width="200"><img src="img/Flags/Philippines.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Philippines">Philippines</td><td align="right">1 - 4</td><td align="right">(-41)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b> (<a class="greenhilite" href="region.php?region=Toscana"><i>Toscana</i></a>)</td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Italy">Italy</td><td align="right">5 - 0</td><td align="right">(+83)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Argentina">Argentina</td><td align="right">4 - 1</td><td align="right">(+48)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Romania">Romania</td><td align="right">3 - 2</td><td align="right">(+15)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Czech Republic.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Czech Republic">Czech Republic</td><td align="right">2 - 3</td><td align="right">(-50)</td></tr>
<tr><td width="200"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Finland">Finland</td><td align="right">1 - 4</td><td align="right">(-59)</td></tr>
<tr><td width="200"><img src="img/Flags/South Korea.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=South Korea">South Korea</td><td align="right">0 - 5</td><td align="right">(-37)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b> (<a class="greenhilite" href="region.php?region=Veneto"><i>Veneto</i></a>)</td></a></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=USA">USA</td><td align="right">5 - 0</td><td align="right">(+58)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Estonia">Estonia</td><td align="right">4 - 1</td><td align="right">(+131)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovakia">Slovakia</td><td align="right">3 - 2</td><td align="right">(+17)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/United Kingdom.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=United Kingdom">United Kingdom</td><td align="right">2 - 3</td><td align="right">(-55)</td></tr>
<tr><td width="200"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Serbia">Serbia</td><td align="right">1 - 4</td><td align="right">(-45)</td></tr>
<tr><td width="200"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Turkey">Turkey</td><td align="right">0 - 5</td><td align="right">(-106)</td></tr>
</table>

</td>
<td width="50%" valign="top" class="border" bgcolor="white">

<b><?=$langmark1463?></b><br/>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bulgaria">Bulgaria</td><td align="right">9 - 1</td><td align="right">(+120)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Finland">Finland</td><td align="right">8 - 2</td><td align="right">(+100)</td></tr>
<tr><td width="200"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Australia">Australia</td><td align="right">7 - 3</td><td align="right">(+29)</td></tr>
<tr><td width="200"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Belgium">Belgium</td><td align="right">4 - 6</td><td align="right">(+14)</td></tr>
<tr><td width="200"><img src="img/Flags/Indonesia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Indonesia">Indonesia</td><td align="right">2 - 8</td><td align="right">(-85)</td></tr>
<tr><td width="200"><img src="img/Flags/Albania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Albania">Albania</td><td align="right">0 - 10</td><td align="right">(-178)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/South Korea.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=South Korea">South Korea</td><td align="right">9 - 1</td><td align="right">(+118)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Turkey">Turkey</td><td align="right">7 - 3</td><td align="right">(+54)</td></tr>
<tr><td width="200"><img src="img/Flags/Bosnia and Herzegovina.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bosnia and Herzegovina">Bosnia and Herzegovina</td><td align="right">6 - 4</td><td align="right">(+64)</td></tr>
<tr><td width="200"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Israel">Israel</td><td align="right">6 - 4</td><td align="right">(+58)</td></tr>
<tr><td width="200"><img src="img/Flags/Sweden.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Sweden">Sweden</td><td align="right">1 - 9</td><td align="right">(-91)</td></tr>
<tr><td width="200"><img src="img/Flags/Netherlands.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Netherlands">Netherlands</td><td align="right">1 - 9</td><td align="right">(-203)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovakia">Slovakia</td><td align="right">8 - 2</td><td align="right">(+102)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Poland">Poland</td><td align="right">8 - 2</td><td align="right">(+71)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/China.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=China">China</td><td align="right">7 - 3</td><td align="right">(+117)</td></tr>
<tr><td width="200"><img src="img/Flags/Norway.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Norway">Norway</td><td align="right">4 - 6</td><td align="right">(-6)</td></tr>
<tr><td width="200"><img src="img/Flags/Ukraine.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Ukraine">Ukraine</td><td align="right">2 - 8</td><td align="right">(-75)</td></tr>
<tr><td width="200"><img src="img/Flags/Russia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Russia">Russia</td><td align="right">1 - 9</td><td align="right">(-209)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Portugal">Portugal</td><td align="right">8 - 2</td><td align="right">(+137)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Czech Republic.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Czech Republic">Czech Republic</td><td align="right">8 - 2</td><td align="right">(+124)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Serbia">Serbia</td><td align="right">7 - 3</td><td align="right">(+71)</td></tr>
<tr><td width="200"><img src="img/Flags/Hungary.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Hungary">Hungary</td><td align="right">4 - 6</td><td align="right">(+23)</td></tr>
<tr><td width="200"><img src="img/Flags/Colombia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Colombia">Colombia</td><td align="right">3 - 7</td><td align="right">(-110)</td></tr>
<tr><td width="200"><img src="img/Flags/India.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=India">India</td><td align="right">0 - 10</td><td align="right">(-245)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP E</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Estonia">Estonia</td><td align="right">8 - 2</td><td align="right">(+89)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Canada.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Canada">Canada</td><td align="right">7 - 3</td><td align="right">(+118)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Philippines.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Philippines">Philippines</td><td align="right">7 - 3</td><td align="right">(+38)</td></tr>
<tr><td width="200"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Spain">Spain</td><td align="right">6 - 4</td><td align="right">(+44)</td></tr>
<tr><td width="200"><img src="img/Flags/Montenegro.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Montenegro">Montenegro</td><td align="right">2 - 8</td><td align="right">(-93)</td></tr>
<tr><td width="200"><img src="img/Flags/Mexico.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Mexico">Mexico</td><td align="right">0 - 10</td><td align="right">(-196)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP F</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Latvia">Latvia</td><td align="right">7 - 3</td><td align="right">(+125)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Switzerland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Switzerland">Switzerland</td><td align="right">7 - 3</td><td align="right">(+22)</td></tr>
<tr><td width="200"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=France">France</td><td align="right">6 - 4</td><td align="right">(+21)</td></tr>
<tr><td width="200"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Germany">Germany</td><td align="right">5 - 5</td><td align="right">(+7)</td></tr>
<tr><td width="200"><img src="img/Flags/Austria.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Austria">Austria</td><td align="right">5 - 5</td><td align="right">(+3)</td></tr>
<tr><td width="200"><img src="img/Flags/Malaysia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Malaysia">Malaysia</td><td align="right">0 - 10</td><td align="right">(-178)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP G</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Greece">Greece</td><td align="right">10 - 0</td><td align="right">(+201)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Romania">Romania</td><td align="right">6 - 4</td><td align="right">(+116)</td></tr>
<tr><td width="200"><img src="img/Flags/Malta.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Malta">Malta</td><td align="right">6 - 4</td><td align="right">(+92)</td></tr>
<tr><td width="200"><img src="img/Flags/Chile.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Chile">Chile</td><td align="right">4 - 6</td><td align="right">(-60)</td></tr>
<tr><td width="200"><img src="img/Flags/Tunisia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Tunisia">Tunisia</td><td align="right">2 - 8</td><td align="right">(-146)</td></tr>
<tr><td width="200"><img src="img/Flags/Denmark.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Denmark">Denmark</td><td align="right">2 - 8</td><td align="right">(-203)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP H</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Croatia">Croatia</td><td align="right">8 - 2</td><td align="right">(+127)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/United Kingdom.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=United Kingdom">United Kingdom</td><td align="right">8 - 2</td><td align="right">(+7)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Italy">Italy</td><td align="right">7 - 3</td><td align="right">(+131)</td></tr>
<tr><td width="200"><img src="img/Flags/Cyprus.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Cyprus">Cyprus</td><td align="right">5 - 5</td><td align="right">(+48)</td></tr>
<tr><td width="200"><img src="img/Flags/New Zealand.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=New Zealand">New Zealand</td><td align="right">2 - 8</td><td align="right">(-94)</td></tr>
<tr><td width="200"><img src="img/Flags/Egypt.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Egypt">Egypt</td><td align="right">0 - 10</td><td align="right">(-219)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP I</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=USA">USA</td><td align="right">10 - 0</td><td align="right">(+212)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovenia">Slovenia</td><td align="right">8 - 2</td><td align="right">(+151)</td></tr>
<tr><td width="200"><img src="img/Flags/Ireland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Ireland">Ireland</td><td align="right">5 - 5</td><td align="right">(+37)</td></tr>
<tr><td width="200"><img src="img/Flags/Brazil.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Brazil">Brazil</td><td align="right">4 - 6</td><td align="right">(-143)</td></tr>
<tr><td width="200"><img src="img/Flags/Thailand.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Thailand">Thailand</td><td align="right">2 - 8</td><td align="right">(-125)</td></tr>
<tr><td width="200"><img src="img/Flags/Peru.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Peru">Peru</td><td align="right">1 - 9</td><td align="right">(-132)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP J</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Argentina">Argentina</td><td align="right">8 - 2</td><td align="right">(+166)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Lithuania">Lithuania</td><td align="right">8 - 2</td><td align="right">(+113)</td></tr>
<tr><td width="200"><img src="img/Flags/Uruguay.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Uruguay">Uruguay</td><td align="right">6 - 4</td><td align="right">(+11)</td></tr>
<tr><td width="200"><img src="img/Flags/FYR Macedonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=FYR Macedonia">FYR Macedonia</td><td align="right">4 - 6</td><td align="right">(+42)</td></tr>
<tr><td width="200"><img src="img/Flags/Hong Kong.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Hong Kong">Hong Kong</td><td align="right">4 - 6</td><td align="right">(-131)</td></tr>
<tr><td width="200"><img src="img/Flags/Venezuela.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Venezuela">Venezuela</td><td align="right">0 - 10</td><td align="right">(-201)</td></tr>
</table>

<?php
} elseif($swc==7) {
?>

<b>7th U19 World Cup - Final Standings</b><br/><br/>

<span style="background-image:url(/img/12gold.gif); background-repeat: no-repeat;">&nbsp;1&nbsp;</span> <a href="u18teams.php?country=Italy" class="greenhilite">Italy</a> (<a href="club.php?clubid=29420">Skip</a>)<br/>
<span style="background-image:url(/img/12silver.gif); background-repeat: no-repeat;">&nbsp;2&nbsp;</span> <a href="u18teams.php?country=Latvia" class="greenhilite">Latvia</a> (<a href="club.php?clubid=13728">kasers</a>)<br/>
<span style="background-image:url(/img/12bronze.gif); background-repeat: no-repeat;">&nbsp;3&nbsp;</span> <a href="u18teams.php?country=Lithuania" class="greenhilite">Lithuania</a> (<a href="club.php?clubid=49781">Jurgis1</a>)<br/>
&nbsp;4. <a href="u18teams.php?country=Slovenia" class="greenhilite">Slovenia</a> (<a href="club.php?clubid=38123">juricob</a>)<br/>
&nbsp;5. <a href="u18teams.php?country=Greece" class="greenhilite">Greece</a> (<a href="club.php?clubid=54025">skordalias</a>)<br/>
&nbsp;6. <a href="u18teams.php?country=Australia" class="greenhilite">Australia</a> (<a href="club.php?clubid=19557">5rich</a>)<br/>
&nbsp;7. <a href="u18teams.php?country=Serbia" class="greenhilite">Serbia</a> (<a href="club.php?clubid=4253">megacar</a>)<br/>
&nbsp;8. <a href="u18teams.php?country=Finland" class="greenhilite">Finland</a> (<a href="club.php?clubid=6424">moonkey</a>)<br/>
&nbsp;9. <a href="u18teams.php?country=Belgium" class="greenhilite">Belgium</a> (<a href="club.php?clubid=73062">jaws</a>)<br/>
&nbsp;10. <a href="u18teams.php?country=Estonia" class="greenhilite">Estonia</a> (<a href="club.php?clubid=74980">aadi</a>)<br/>
&nbsp;11. <a href="u18teams.php?country=Canada" class="greenhilite">Canada</a> (<a href="club.php?clubid=94785">yoshi</a>)<br/>
&nbsp;12. <a href="u18teams.php?country=China" class="greenhilite">China</a> (<a href="club.php?clubid=36510">perastikos_13</a>)<br/>
&nbsp;13. <a href="u18teams.php?country=Bulgaria" class="greenhilite">Bulgaria</a> (<a href="club.php?clubid=27871">likantrop</a>)<br/>
&nbsp;14. <a href="u18teams.php?country=Slovakia" class="greenhilite">Slovakia</a> (<a href="club.php?clubid=58960">dodod</a>)<br/>
&nbsp;15. <a href="u18teams.php?country=USA" class="greenhilite">USA</a> (<a href="club.php?clubid=54469">winock</a>)<br/>
&nbsp;16. <a href="u18teams.php?country=Switzerland" class="greenhilite">Switzerland</a> (<a href="club.php?clubid=5401">Bremen</a>)<br/>
&nbsp;17. <a href="u18teams.php?country=Argentina" class="greenhilite">Argentina</a> (<a href="club.php?clubid=3433">CARegina</a>)<br/>
&nbsp;18. <a href="u18teams.php?country=Romania" class="greenhilite">Romania</a> (<a href="club.php?clubid=36">Bebe</a>)<br/>
&nbsp;19. <a href="u18teams.php?country=Croatia" class="greenhilite">Croatia</a> (<a href="club.php?clubid=74870">melkior</a>)<br/>
&nbsp;20. <a href="u18teams.php?country=FYR Macedonia" class="greenhilite">FYR Macedonia</a> (<a href="club.php?clubid=45354">Miso</a>)<br/>
&nbsp;21. <a href="u18teams.php?country=Turkey" class="greenhilite">Turkey</a> (<a href="club.php?clubid=41190">ohdaesu</a>)<br/>
&nbsp;22. <a href="u18teams.php?country=Portugal" class="greenhilite">Portugal</a> (<a href="club.php?clubid=28052">fr0z3nshad3</a>)<br/>
&nbsp;23. <a href="u18teams.php?country=Hungary" class="greenhilite">Hungary</a> (<a href="club.php?clubid=18006">harynjk</a>)<br/>
&nbsp;24. <a href="u18teams.php?country=Cyprus" class="greenhilite">Cyprus</a> (<a href="club.php?clubid=100534">ferguson</a>)<br/>

</td><td class="border" width="50%">

<b><?=$langmark1448?></b><br/><br/>

<?=$langmark1453?>: <a href="league.php?country=Portugal">Portugal</a><br/>
<?=$langmark1449?>: 60<br/>
<?=$langmark1450?>: 378<br/>
<?=$langmark1451?>: 8.717.499<br/>
<?=$langmark1452?>: 23.062<br/>

<br/><b><?=$langmark1454?></b><br/><br/>

PG: <a href="player.php?playerid=3551183">Jan Hedl</a> (Slovenia)<br/>
SG: <a href="player.php?playerid=3439827">Jēkabs Ignāts</a> (Latvia)<br/>
SF: <a href="player.php?playerid=3433665">Arnoldas Markauskas</a> (Lithuania)<br/>
PF: <a href="player.php?playerid=3728089">Artūrs Kalve</a> (Latvia)<br/>
C: <a href="player.php?playerid=3610098">Ludovico Monaghesi</a> (Italy)<br/>

<br/><?=$langmark1455?>: <a href="player.php?playerid=3610098">Ludovico Monaghesi</a> (Italy)
<br/><?=$langmark1456?>: <a href="player.php?playerid=3610098">Ludovico Monaghesi</a> (Italy)

<?php
$a = $_GET["a"];
if ($a=='y') {?>
<br/><br/><b>Statistical leaders</b> <a href="<?=$_SERVER['REQUEST_URI']?>?a=n" class="greenhilite" title="close">[x]</a><br/>
<br/>Points: <a href="player.php?playerid=3720685">Rodney Shaw</a> (Australia)
<br/>Rebounds: <a href="player.php?playerid=3610098">Ludovico Monaghesi</a> (Italy)
<br/>Assist: <a href="player.php?playerid=3500998">Stojan Marinč</a> (Slovenia)
<br/>Blocks: <a href="player.php?playerid=3472438">Chrisanthos Prevalakis</a> (Greece)
<br/>Steals: <a href="player.php?playerid=3440219">Silvestro Di Luzio</a> (Italy)
<?php } else {echo "<br/><br/><a href=\"",$_SERVER['REQUEST_URI'],"?go=kart&a=y\">statistical leaders</a>";}?>
</td>
</tr>
</table>

<table cellspacing="9" cellpadding="9" border="0" width="100%">
<tr bgcolor="white">
<td class="border" bgcolor="white" width="50%" valign="top">

<b><?=$langmark1457?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Italy">Italy</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=13458">91&nbsp;:&nbsp;80</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Latvia">Latvia</a>&nbsp;<img src="img/Flags/Latvia.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1458?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovenia">Slovenia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=13459">73&nbsp;:&nbsp;74</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Lithuania">Lithuania</a>&nbsp;<img src="img/Flags/Lithuania.png" border="0" alt=""></td></tr>
</table>

<br/><b>5th place match</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Australia">Australia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=13460">60&nbsp;:&nbsp;89</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Greece">Greece</a>&nbsp;<img src="img/Flags/Greece.png" border="0" alt=""></td></tr>
</table>

<br/><b>7th place match</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Serbia">Serbia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=13433">92&nbsp;:&nbsp;54</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Finland">Finland</a>&nbsp;<img src="img/Flags/Finland.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1459?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovenia">Slovenia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=13431">61&nbsp;:&nbsp;62</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Italy">Italy</a>&nbsp;<img src="img/Flags/Italy.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Lithuania">Lithuania</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=13432">77&nbsp;:&nbsp;82</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Latvia">Latvia</a>&nbsp;<img src="img/Flags/Latvia.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1460?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Serbia">Serbia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=13403">65&nbsp;:&nbsp;76</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Slovenia">Slovenia</a>&nbsp;<img src="img/Flags/Slovenia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Italy">Italy</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=13404">71&nbsp;:&nbsp;59</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Finland">Finland</a>&nbsp;<img src="img/Flags/Finland.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Australia">Australia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=13405">69&nbsp;:&nbsp;71</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Lithuania">Lithuania</a>&nbsp;<img src="img/Flags/Lithuania.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Latvia">Latvia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=13406">81&nbsp;:&nbsp;75</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Greece">Greece</a>&nbsp;<img src="img/Flags/Greece.png" border="0" alt=""></td></tr>
</table>

<br/><b>Round of 16</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Serbia">Serbia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=13351">92&nbsp;:&nbsp;78</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Canada">Canada</a>&nbsp;<img src="img/Flags/Canada.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=USA">USA</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=13352">62&nbsp;:&nbsp;83</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Slovenia">Slovenia</a>&nbsp;<img src="img/Flags/Slovenia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Italy">Italy</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=13353">71&nbsp;:&nbsp;43</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Switzerland">Switzerland</a>&nbsp;<img src="img/Flags/Switzerland.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Finland">Finland</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=13354">78&nbsp;:&nbsp;64</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=China">China</a>&nbsp;<img src="img/Flags/China.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Australia">Australia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=13355">75&nbsp;:&nbsp;60</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Bulgaria">Bulgaria</a>&nbsp;<img src="img/Flags/Bulgaria.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Belgium">Belgium</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=13356">75&nbsp;:&nbsp;76</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Lithuania">Lithuania</a>&nbsp;<img src="img/Flags/Lithuania.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovakia">Slovakia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=13357">71&nbsp;:&nbsp;92</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Latvia">Latvia</a>&nbsp;<img src="img/Flags/Latvia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Greece">Greece</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=13358">86&nbsp;:&nbsp;81</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Estonia">Estonia</a>&nbsp;<img src="img/Flags/Estonia.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1462?></b><br/>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b> (<a class="greenhilite" href="region.php?region=Porto"><i>Porto</i></a>)</td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Serbia">Serbia</td><td align="right">4 - 1</td><td align="right">(+38)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Belgium">Belgium</td><td align="right">4 - 1</td><td align="right">(-9)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Estonia">Estonia</td><td align="right">3 - 2</td><td align="right">(+23)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Switzerland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Switzerland">Switzerland</td><td align="right">2 - 3</td><td align="right">(+14)</td></tr>
<tr><td width="200"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Argentina">Argentina</td><td align="right">2 - 3</td><td align="right">(-10)</td></tr>
<tr><td width="200"><img src="img/Flags/Cyprus.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Cyprus">Cyprus</td><td align="right">0 - 5</td><td align="right">(-56)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b> (<a class="greenhilite" href="region.php?region=Braga"><i>Braga</i></a>)</td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Italy">Italy</td><td align="right">4 - 1</td><td align="right">(+26)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Greece">Greece</td><td align="right">3 - 2</td><td align="right">(+31)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Lithuania">Lithuania</td><td align="right">3 - 2</td><td align="right">(+11)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Canada.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Canada">Canada</td><td align="right">3 - 2</td><td align="right">(-1)</td></tr>
<tr><td width="200"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Croatia">Croatia</td><td align="right">2 - 3</td><td align="right">(-20)</td></tr>
<tr><td width="200"><img src="img/Flags/Hungary.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Hungary">Hungary</td><td align="right">0 - 5</td><td align="right">(-47)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b> (<a class="greenhilite" href="region.php?region=Lisboa"><i>Lisboa</i></a>)</td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Australia">Australia</td><td align="right">4 - 1</td><td align="right">(+36)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=USA">USA</td><td align="right">3 - 2</td><td align="right">(+16)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/China.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=China">China</td><td align="right">3 - 2</td><td align="right">(-3)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Latvia">Latvia</td><td align="right">2 - 3</td><td align="right">(+17)</td></tr>
<tr><td width="200"><img src="img/Flags/FYR Macedonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=FYR Macedonia">FYR Macedonia</td><td align="right">2 - 3</td><td align="right">(-36)</td></tr>
<tr><td width="200"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Portugal">Portugal</td><td align="right">1 - 4</td><td align="right">(-30)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b> (<a class="greenhilite" href="region.php?region=Setúbal"><i>Setúbal</i></a>)</td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovakia">Slovakia</td><td align="right">4 - 1</td><td align="right">(-7)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Finland">Finland</td><td align="right">3 - 2</td><td align="right">(+39)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovenia">Slovenia</td><td align="right">2 - 3</td><td align="right">(+20)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bulgaria">Bulgaria</td><td align="right">2 - 3</td><td align="right">(-7)</td></tr>
<tr><td width="200"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Romania">Romania</td><td align="right">2 - 3</td><td align="right">(-12)</td></tr>
<tr><td width="200"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Turkey">Turkey</td><td align="right">2 - 3</td><td align="right">(-33)</td></tr>
</table>

</td>
<td width="50%" valign="top" class="border" bgcolor="white">

<b><?=$langmark1463?></b><br/>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Serbia">Serbia</td><td align="right">9 - 1</td><td align="right">(+129)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Italy">Italy</td><td align="right">8 - 2</td><td align="right">(+122)</td></tr>
<tr><td width="200"><img src="img/Flags/Bosnia and Herzegovina.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bosnia and Herzegovina">Bosnia and Herzegovina</td><td align="right">6 - 4</td><td align="right">(+62)</td></tr>
<tr><td width="200"><img src="img/Flags/Ukraine.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Ukraine">Ukraine</td><td align="right">5 - 5</td><td align="right">(+34)</td></tr>
<tr><td width="200"><img src="img/Flags/Sweden.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Sweden">Sweden</td><td align="right">2 - 8</td><td align="right">(-144)</td></tr>
<tr><td width="200"><img src="img/Flags/Indonesia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Indonesia">Indonesia</td><td align="right">0 - 10</td><td align="right">(-203)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Croatia">Croatia</td><td align="right">9 - 1</td><td align="right">(+114)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovenia">Slovenia</td><td align="right">7 - 3</td><td align="right">(+91)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/China.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=China">China</td><td align="right">7 - 3</td><td align="right">(+65)</td></tr>
<tr><td width="200"><img src="img/Flags/India.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=India">India</td><td align="right">5 - 5</td><td align="right">(+37)</td></tr>
<tr><td width="200"><img src="img/Flags/New Zealand.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=New Zealand">New Zealand</td><td align="right">2 - 8</td><td align="right">(-113)</td></tr>
<tr><td width="200"><img src="img/Flags/Thailand.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Thailand">Thailand</td><td align="right">0 - 10</td><td align="right">(-194)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Romania">Romania</td><td align="right">7 - 3</td><td align="right">(+101)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Lithuania">Lithuania</td><td align="right">7 - 3</td><td align="right">(+94)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovakia">Slovakia</td><td align="right">7 - 3</td><td align="right">(+72)</td></tr>
<tr><td width="200"><img src="img/Flags/Austria.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Austria">Austria</td><td align="right">6 - 4</td><td align="right">(+46)</td></tr>
<tr><td width="200"><img src="img/Flags/Russia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Russia">Russia</td><td align="right">3 - 7</td><td align="right">(-92)</td></tr>
<tr><td width="200"><img src="img/Flags/Mexico.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Mexico">Mexico</td><td align="right">0 - 10</td><td align="right">(-221)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Greece">Greece</td><td align="right">9 - 1</td><td align="right">(+194)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Belgium">Belgium</td><td align="right">9 - 1</td><td align="right">(+120)</td></tr>
<tr><td width="200"><img src="img/Flags/Colombia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Colombia">Colombia</td><td align="right">4 - 6</td><td align="right">(-22)</td></tr>
<tr><td width="200"><img src="img/Flags/Brazil.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Brazil">Brazil</td><td align="right">3 - 7</td><td align="right">(-79)</td></tr>
<tr><td width="200"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Germany">Germany</td><td align="right">3 - 7</td><td align="right">(-117)</td></tr>
<tr><td width="200"><img src="img/Flags/Venezuela.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Venezuela">Venezuela</td><td align="right">2 - 8</td><td align="right">(-96)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP E</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Turkey">Turkey</td><td align="right">9 - 1</td><td align="right">(+82)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Australia">Australia</td><td align="right">7 - 3</td><td align="right">(+99)</td></tr>
<tr><td width="200"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Poland">Poland</td><td align="right">6 - 4</td><td align="right">(+69)</td></tr>
<tr><td width="200"><img src="img/Flags/Chile.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Chile">Chile</td><td align="right">5 - 5</td><td align="right">(-5)</td></tr>
<tr><td width="200"><img src="img/Flags/Montenegro.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Montenegro">Montenegro</td><td align="right">2 - 8</td><td align="right">(-83)</td></tr>
<tr><td width="200"><img src="img/Flags/Peru.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Peru">Peru</td><td align="right">1 - 9</td><td align="right">(-162)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP F</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bulgaria">Bulgaria</td><td align="right">9 - 1</td><td align="right">(+201)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Portugal">Portugal</td><td align="right">7 - 3</td><td align="right">(+110)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Switzerland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Switzerland">Switzerland</td><td align="right">7 - 3</td><td align="right">(+83)</td></tr>
<tr><td width="200"><img src="img/Flags/Netherlands.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Netherlands">Netherlands</td><td align="right">5 - 5</td><td align="right">(+1)</td></tr>
<tr><td width="200"><img src="img/Flags/Denmark.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Denmark">Denmark</td><td align="right">2 - 8</td><td align="right">(-123)</td></tr>
<tr><td width="200"><img src="img/Flags/Malta.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Malta">Malta</td><td align="right">0 - 10</td><td align="right">(-272)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP G</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Estonia">Estonia</td><td align="right">9 - 1</td><td align="right">(+162)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Finland">Finland</td><td align="right">8 - 2</td><td align="right">(+82)</td></tr>
<tr><td width="200"><img src="img/Flags/Czech Republic.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Czech Republic">Czech Republic</td><td align="right">6 - 4</td><td align="right">(+111)</td></tr>
<tr><td width="200"><img src="img/Flags/South Korea.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=South Korea">South Korea</td><td align="right">4 - 6</td><td align="right">(-61)</td></tr>
<tr><td width="200"><img src="img/Flags/Egypt.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Egypt">Egypt</td><td align="right">3 - 7</td><td align="right">(-71)</td></tr>
<tr><td width="200"><img src="img/Flags/Ireland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Ireland">Ireland</td><td align="right">0 - 10</td><td align="right">(-223)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP H</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=USA">USA</td><td align="right">10 - 0</td><td align="right">(+167)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Canada.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Canada">Canada</td><td align="right">8 - 2</td><td align="right">(+135)</td></tr>
<tr><td width="200"><img src="img/Flags/United Kingdom.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=United Kingdom">United Kingdom</td><td align="right">6 - 4</td><td align="right">(+66)</td></tr>
<tr><td width="200"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=France">France</td><td align="right">3 - 7</td><td align="right">(-76)</td></tr>
<tr><td width="200"><img src="img/Flags/Philippines.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Philippines">Philippines</td><td align="right">3 - 7</td><td align="right">(-111)</td></tr>
<tr><td width="200"><img src="img/Flags/Albania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Albania">Albania</td><td align="right">0 - 10</td><td align="right">(-181)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP I</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Latvia">Latvia</td><td align="right">8 - 2</td><td align="right">(+150)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Cyprus.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Cyprus">Cyprus</td><td align="right">6 - 4</td><td align="right">(+73)</td></tr>
<tr><td width="200"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Spain">Spain</td><td align="right">6 - 4</td><td align="right">(+1)</td></tr>
<tr><td width="200"><img src="img/Flags/Uruguay.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Uruguay">Uruguay</td><td align="right">5 - 5</td><td align="right">(+51)</td></tr>
<tr><td width="200"><img src="img/Flags/Norway.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Norway">Norway</td><td align="right">5 - 5</td><td align="right">(-31)</td></tr>
<tr><td width="200"><img src="img/Flags/Tunisia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Tunisia">Tunisia</td><td align="right">0 - 10</td><td align="right">(-244)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP J</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/FYR Macedonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=FYR Macedonia">FYR Macedonia</td><td align="right">8 - 2</td><td align="right">(+155)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Argentina">Argentina</td><td align="right">8 - 2</td><td align="right">(+117)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Hungary.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Hungary">Hungary</td><td align="right">7 - 3</td><td align="right">(+35)</td></tr>
<tr><td width="200"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Israel">Israel</td><td align="right">3 - 7</td><td align="right">(-30)</td></tr>
<tr><td width="200"><img src="img/Flags/Malaysia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Malaysia">Malaysia</td><td align="right">2 - 8</td><td align="right">(-118)</td></tr>
<tr><td width="200"><img src="img/Flags/Hong Kong.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Hong Kong">Hong Kong</td><td align="right">2 - 8</td><td align="right">(-159)</td></tr>
</table>

<?php
} elseif($swc==8) {
?>

<b>8th U19 World Cup - Final Standings</b><br/><br/>

<span style="background-image:url(/img/12gold.gif); background-repeat: no-repeat;">&nbsp;1&nbsp;</span> <a href="u18teams.php?country=Slovenia" class="greenhilite">Slovenia</a> (<a href="club.php?clubid=38123">juricob</a>)<br/>
<span style="background-image:url(/img/12silver.gif); background-repeat: no-repeat;">&nbsp;2&nbsp;</span> <a href="u18teams.php?country=Romania" class="greenhilite">Romania</a> (<a href="club.php?clubid=36">Bebe</a>)<br/>
<span style="background-image:url(/img/12bronze.gif); background-repeat: no-repeat;">&nbsp;3&nbsp;</span> <a href="u18teams.php?country=Serbia" class="greenhilite">Serbia</a> (<a href="club.php?clubid=114201">cerovac</a>)<br/>
&nbsp;4. <a href="u18teams.php?country=USA" class="greenhilite">USA</a> (<a href="club.php?clubid=45079">DustBunny</a>)<br/>
&nbsp;5. <a href="u18teams.php?country=Greece" class="greenhilite">Greece</a> (<a href="club.php?clubid=23182">Faithless</a>)<br/>
&nbsp;6. <a href="u18teams.php?country=Latvia" class="greenhilite">Latvia</a> (<a href="club.php?clubid=7053">Latvian_u19_coach</a>)<br/>
&nbsp;7. <a href="u18teams.php?country=Switzerland" class="greenhilite">Switzerland</a> (<a href="club.php?clubid=5401">Bremen</a>)<br/>
&nbsp;8. <a href="u18teams.php?country=Estonia" class="greenhilite">Estonia</a> (<a href="club.php?clubid=54348">vpliin</a>)<br/>
&nbsp;9. <a href="u18teams.php?country=Canada" class="greenhilite">Canada</a> (<a href="club.php?clubid=94785">yoshi</a>)<br/>
&nbsp;10. <a href="u18teams.php?country=Spain" class="greenhilite">Spain</a> (<a href="club.php?clubid=7523">gassojose</a>)<br/>
&nbsp;11. <a href="u18teams.php?country=Slovakia" class="greenhilite">Slovakia</a> (<a href="club.php?clubid=58960">dodod</a>)<br/>
&nbsp;12. <a href="u18teams.php?country=Israel" class="greenhilite">Israel</a> (<a href="club.php?clubid=27034">katashefer</a>)<br/>
&nbsp;13. <a href="u18teams.php?country=Portugal" class="greenhilite">Portugal</a> (<a href="club.php?clubid=28052">fr0z3nshad3</a>)<br/>
&nbsp;14. <a href="u18teams.php?country=France" class="greenhilite">France</a>  (<a href="club.php?clubid=86471">dugaz</a>)<br/>
&nbsp;15. <a href="u18teams.php?country=Hungary" class="greenhilite">Hungary</a> (<a href="club.php?clubid=18006">harynjk</a>)<br/>
&nbsp;16. <a href="u18teams.php?country=United Kingdom" class="greenhilite">United Kingdom</a> (<a href="club.php?clubid=94952">abstract</a>)<br/>
&nbsp;17. <a href="u18teams.php?country=Italy" class="greenhilite">Italy</a> (<a href="club.php?clubid=47828">vano19</a>)<br/>
&nbsp;18. <a href="u18teams.php?country=Philippines" class="greenhilite">Philippines</a> (<a href="club.php?clubid=20518">bostjanMR</a>)<br/>
&nbsp;19. <a href="u18teams.php?country=Czech Republic" class="greenhilite">Czech Republic</a> (<a href="club.php?clubid=132739">Kivis</a>)<br/>
&nbsp;20. <a href="u18teams.php?country=Poland" class="greenhilite">Poland</a> (<a href="club.php?clubid=2468">lipek</a>)<br/>
&nbsp;21. <a href="u18teams.php?country=Bulgaria" class="greenhilite">Bulgaria</a> (<a href="club.php?clubid=11932">MOD-Exorcist</a>)<br/>
&nbsp;22. <a href="u18teams.php?country=Belgium" class="greenhilite">Belgium</a> (<a href="club.php?clubid=73062">jaws</a>)<br/>
&nbsp;23. <a href="u18teams.php?country=Cyprus" class="greenhilite">Cyprus</a> (<a href="club.php?clubid=100534">ferguson</a>)<br/>
&nbsp;24. <a href="u18teams.php?country=Indonesia" class="greenhilite">Indonesia</a> (<a href="club.php?clubid=71302">setiawan_sinaga</a>)<br/>
&nbsp;25. <a href="u18teams.php?country=South Korea" class="greenhilite">South Korea</a> (<a href="club.php?clubid=99045">Saphina</a>)<br/>
&nbsp;26. <a href="u18teams.php?country=Bosnia and Herzegovina" class="greenhilite">Bosnia and Herzegovina</a> (<a href="club.php?clubid=51653">Voyager</a>)<br/>
&nbsp;27. <a href="u18teams.php?country=Netherlands" class="greenhilite">Netherlands</a> (<a href="club.php?clubid=100322">Tollie</a>)<br/>
&nbsp;28. <a href="u18teams.php?country=Norway" class="greenhilite">Norway</a> (<a href="club.php?clubid=850">GM-Ripp</a>)<br/>
&nbsp;29. <a href="u18teams.php?country=China" class="greenhilite">China</a> (<a href="club.php?clubid=36510">perastikos_13</a>)<br/>
&nbsp;30. <a href="u18teams.php?country=Sweden" class="greenhilite">Sweden</a> (<a href="club.php?clubid=36153">matjaz54</a>)<br/>

</td><td class="border" width="50%">

<b><?=$langmark1448?></b><br/><br/>

<?=$langmark1453?>: <a href="league.php?country=Canada">Canada</a><br/>
<?=$langmark1449?>: 60<br/>
<?=$langmark1450?>: 393<br/>
<?=$langmark1451?>: 9.049.706<br/>
<?=$langmark1452?>: 23.027<br/>

<br/><b><?=$langmark1454?></b><br/><br/>
PG: <a href="player.php?playerid=3745691">Kostas Rodakis</a> (Greece)<br/>
SG: <a href="player.php?playerid=3732228">Ionut Ion</a> (Romania)<br/>
SF: <a href="player.php?playerid=3732317">Igor Potokar</a> (Slovenia)<br/>
PF: <a href="player.php?playerid=3843605">Urban Ravelli</a> (Slovenia)<br/>
C: <a href="player.php?playerid=3890629">Stanislav Orlović</a> (Serbia)<br/>
<br/>
PG2: <a href="player.php?playerid=3731435">Benoît Vandeweghe</a> (Canada)<br/>
SG2: <a href="player.php?playerid=3862647">Johnny Farrar</a> (USA)<br/>
SF2: <a href="player.php?playerid=3771673">George Ion</a> (Romania)<br/>
PF2: <a href="player.php?playerid=3849154">Žika Žukić</a> (Serbia)<br/>
C2: <a href="player.php?playerid=3799923">Dravis Grundulis</a> (Latvia)<br/>

<br/><?=$langmark1455?>: <a href="player.php?playerid=3843605">Urban Ravelli</a> (Slovenia)
<br/><?=$langmark1456?>: <a href="player.php?playerid=3771673">George Ion</a> (Romania)
<br/>Coach of the tournament: <a href="club.php?clubid=36">Bebe</a> (Romania)

<?php
$a = $_GET["a"];
if ($a=='y') {?>
<br/><br/><b>Statistical leaders</b> <a href="<?=$_SERVER['REQUEST_URI']?>?a=n" class="greenhilite" title="close">[x]</a><br/>
<br/>Points: <a href="player.php?playerid=3732228">Ionut Ion</a> (Romania)
<br/>Rebounds: <a href="player.php?playerid=3849154">Žika Žukić</a> (Serbia)
<br/>Assist: <a href="player.php?playerid=3843859">Adi Calugarescu</a> (Romania)
<br/>Blocks: <a href="player.php?playerid=3875640">Jayson Dadi</a> (France)
<br/>Steals: <a href="player.php?playerid=3732228">Ionut Ion</a> (Romania)
<?php } else {echo "<br/><br/><a href=\"",$_SERVER['REQUEST_URI'],"?go=kart&a=y\">statistical leaders</a>";}?>
</td>
</tr>
</table>

<table cellspacing="9" cellpadding="9" border="0" width="100%">
<tr bgcolor="white">
<td class="border" bgcolor="white" width="50%" valign="top">

<b><?=$langmark1457?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Romania">Romania</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=15636">64&nbsp;:&nbsp;66</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Slovenia">Slovenia</a>&nbsp;<img src="img/Flags/Slovenia.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1458?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=USA">USA</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=15637">56&nbsp;:&nbsp;68</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Serbia">Serbia</a>&nbsp;<img src="img/Flags/Serbia.png" border="0" alt=""></td></tr>
</table>

<br/><b>5th place match</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Latvia">Latvia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=15638">57&nbsp;:&nbsp;77</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Greece">Greece</a>&nbsp;<img src="img/Flags/Greece.png" border="0" alt=""></td></tr>
</table>

<br/><b>7th place match</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Estonia">Estonia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=15612">58&nbsp;:&nbsp;82</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Switzerland">Switzerland</a>&nbsp;<img src="img/Flags/Switzerland.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1459?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Romania">Romania</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=15610">86&nbsp;:&nbsp;80</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=USA">USA</a>&nbsp;<img src="img/Flags/USA.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Serbia">Serbia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=15611">75&nbsp;:&nbsp;80</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Slovenia">Slovenia</a>&nbsp;<img src="img/Flags/Slovenia.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1460?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Estonia">Estonia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=15583">83&nbsp;:&nbsp;89</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Romania">Romania</a>&nbsp;<img src="img/Flags/Romania.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Latvia">Latvia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=15584">77&nbsp;:&nbsp;79</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=USA">USA</a>&nbsp;<img src="img/Flags/USA.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Greece">Greece</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=15585">78&nbsp;:&nbsp;81</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Serbia">Serbia</a>&nbsp;<img src="img/Flags/Serbia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovenia">Slovenia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=15586">86&nbsp;:&nbsp;60</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Switzerland">Switzerland</a>&nbsp;<img src="img/Flags/Switzerland.png" border="0" alt=""></td></tr>
</table>

<br/><b>Round of 16</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Estonia">Estonia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=15529">73&nbsp;:&nbsp;70</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Spain">Spain</a>&nbsp;<img src="img/Flags/Spain.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Romania">Romania</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=15530">94&nbsp;:&nbsp;73</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=United Kingdom">United Kingdom</a>&nbsp;<img src="img/Flags/United Kingdom.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Portugal">Portugal</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=15531">69&nbsp;:&nbsp;79</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Latvia">Latvia</a>&nbsp;<img src="img/Flags/Latvia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovakia">Slovakia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=15532">71&nbsp;:&nbsp;79</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=USA">USA</a>&nbsp;<img src="img/Flags/USA.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Greece">Greece</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=15533">80&nbsp;:&nbsp;64</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=France">France</a>&nbsp;<img src="img/Flags/France.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Serbia">Serbia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=15534">74&nbsp;:&nbsp;65</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Israel">Israel</a>&nbsp;<img src="img/Flags/Israel.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovenia">Slovenia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=15535">87&nbsp;:&nbsp;68</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Hungary">Hungary</a>&nbsp;<img src="img/Flags/Hungary.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Canada.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Canada">Canada</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=15536">75&nbsp;:&nbsp;77</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Switzerland">Switzerland</a>&nbsp;<img src="img/Flags/Switzerland.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1462?></b><br/>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b> <i>(<a class="greenhilite" href="region.php?region=Ontario">Ontario</a>)</i></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Portugal">Portugal</td><td align="right">4 - 1</td><td align="right">(+100)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Romania">Romania</td><td align="right">4 - 1</td><td align="right">(+57)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Switzerland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Switzerland">Switzerland</td><td align="right">4 - 1</td><td align="right">(+45)</td></tr>
<tr><td width="200"><img src="img/Flags/Czech Republic.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Czech Republic">Czech Republic</td><td align="right">2 - 3</td><td align="right">(-32)</td></tr>
<tr><td width="200"><img src="img/Flags/Indonesia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Indonesia">Indonesia</td><td align="right">1 - 4</td><td align="right">(-87)</td></tr>
<tr><td width="200"><img src="img/Flags/Netherlands.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Netherlands">Netherlands</td><td align="right">0 - 5</td><td align="right">(-83)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b> <i>(<a class="greenhilite" href="region.php?region=The West">The West</a>/<a class="greenhilite" href="region.php?region=Ontario">Ontario</a>)</i></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Greece">Greece</td><td align="right">5 - 0</td><td align="right">(+121)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/United Kingdom.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=United Kingdom">United Kingdom</td><td align="right">3 - 2</td><td align="right">(+36)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Hungary.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Hungary">Hungary</td><td align="right">3 - 2</td><td align="right">(-27)</td></tr>
<tr><td width="200"><img src="img/Flags/Philippines.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Philippines">Philippines</td><td align="right">2 - 3</td><td align="right">(+5)</td></tr>
<tr><td width="200"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Belgium">Belgium</td><td align="right">2 - 3</td><td align="right">(-20)</td></tr>
<tr><td width="200"><img src="img/Flags/Norway.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Norway">Norway</td><td align="right">0 - 5</td><td align="right">(-115)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b> <i>(<a class="greenhilite" href="region.php?region=The Maritimes">The Maritimes</a>)</i></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Estonia">Estonia</td><td align="right">5 - 0</td><td align="right">(+134)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Canada.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Canada">Canada</td><td align="right">4 - 1</td><td align="right">(+84)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=France">France</td><td align="right">2 - 3</td><td align="right">(+4)</td></tr>
<tr><td width="200"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Poland">Poland</td><td align="right">2 - 3</td><td align="right">(-35)</td></tr>
<tr><td width="200"><img src="img/Flags/Cyprus.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Cyprus">Cyprus</td><td align="right">2 - 3</td><td align="right">(-52)</td></tr>
<tr><td width="200"><img src="img/Flags/China.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=China">China</td><td align="right">0 - 5</td><td align="right">(-135)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b> <i>(<a class="greenhilite" href="region.php?region=Quebec">Quebec</a>/<a class="greenhilite" href="region.php?region=Ontario">Ontario</a>)</i></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovakia">Slovakia</td><td align="right">4 - 1</td><td align="right">(+7)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Israel">Israel</td><td align="right">3 - 2</td><td align="right">(+25)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Latvia">Latvia</td><td align="right">3 - 2</td><td align="right">(+6)</td></tr>
<tr><td width="200"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Italy">Italy</td><td align="right">3 - 2</td><td align="right">(+1)</td></tr>
<tr><td width="200"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bulgaria">Bulgaria</td><td align="right">2 - 3</td><td align="right">(+1)</td></tr>
<tr><td width="200"><img src="img/Flags/Bosnia and Herzegovina.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bosnia and Herzegovina">Bosnia and Herzegovina</td><td align="right">0 - 5</td><td align="right">(-40)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP E</b> <i>(<a class="greenhilite" href="region.php?region=Ontario">Ontario</a>)</i></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovenia">Slovenia</td><td align="right">4 - 1</td><td align="right">(+112)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Serbia">Serbia</td><td align="right">4 - 1</td><td align="right">(+77)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=USA">USA</td><td align="right">3 - 2</td><td align="right">(+68)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Spain">Spain</td><td align="right">3 - 2</td><td align="right">(+5)</td></tr>
<tr><td width="200"><img src="img/Flags/South Korea.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=South Korea">South Korea</td><td align="right">1 - 4</td><td align="right">(-114)</td></tr>
<tr><td width="200"><img src="img/Flags/Sweden.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Sweden">Sweden</td><td align="right">0 - 5</td><td align="right">(-148)</td></tr>
</table>

</td>
<td width="50%" valign="top" class="border" bgcolor="white">

<b><?=$langmark1463?></b><br/>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovakia">Slovakia</td><td align="right">9 - 1</td><td align="right">(+142)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Cyprus.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Cyprus">Cyprus</td><td align="right">7 - 3</td><td align="right">(+142)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Serbia">Serbia</td><td align="right">7 - 3</td><td align="right">(+88)</td></tr>
<tr><td width="200"><img src="img/Flags/Russia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Russia">Russia</td><td align="right">5 - 5</td><td align="right">(+95)</td></tr>
<tr><td width="200"><img src="img/Flags/Denmark.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Denmark">Denmark</td><td align="right">1 - 9</td><td align="right">(-190)</td></tr>
<tr><td width="200"><img src="img/Flags/Austria.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Austria">Austria</td><td align="right">1 - 9</td><td align="right">(-277)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Israel">Israel</td><td align="right">8 - 2</td><td align="right">(+121)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/South Korea.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=South Korea">South Korea</td><td align="right">6 - 4</td><td align="right">(+5)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Indonesia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Indonesia">Indonesia</td><td align="right">6 - 4</td><td align="right">(-22)</td></tr>
<tr><td width="200"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Lithuania">Lithuania</td><td align="right">5 - 5</td><td align="right">(-10)</td></tr>
<tr><td width="200"><img src="img/Flags/Hong Kong.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Hong Kong">Hong Kong</td><td align="right">3 - 7</td><td align="right">(-35)</td></tr>
<tr><td width="200"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Australia">Australia</td><td align="right">2 - 8</td><td align="right">(-59)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=USA">USA</td><td align="right">8 - 2</td><td align="right">(+93)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Czech Republic.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Czech Republic">Czech Republic</td><td align="right">7 - 3</td><td align="right">(+13)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Belgium">Belgium</td><td align="right">6 - 4</td><td align="right">(+32)</td></tr>
<tr><td width="200"><img src="img/Flags/Colombia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Colombia">Colombia</td><td align="right">5 - 5</td><td align="right">(+39)</td></tr>
<tr><td width="200"><img src="img/Flags/Brazil.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Brazil">Brazil</td><td align="right">3 - 7</td><td align="right">(-23)</td></tr>
<tr><td width="200"><img src="img/Flags/Mexico.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Mexico">Mexico</td><td align="right">1 - 9</td><td align="right">(-154)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Spain">Spain</td><td align="right">9 - 1</td><td align="right">(+142)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Philippines.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Philippines">Philippines</td><td align="right">7 - 3</td><td align="right">(+61)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Latvia">Latvia</td><td align="right">6 - 4</td><td align="right">(+112)</td></tr>
<tr><td width="200"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Finland">Finland</td><td align="right">4 - 6</td><td align="right">(-65)</td></tr>
<tr><td width="200"><img src="img/Flags/New Zealand.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=New Zealand">New Zealand</td><td align="right">4 - 6</td><td align="right">(-68)</td></tr>
<tr><td width="200"><img src="img/Flags/Peru.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Peru">Peru</td><td align="right">0 - 10</td><td align="right">(-182)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP E</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Greece">Greece</td><td align="right">9 - 1</td><td align="right">(+93)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/China.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=China">China</td><td align="right">7 - 3</td><td align="right">(+142)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Netherlands.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Netherlands">Netherlands</td><td align="right">7 - 3</td><td align="right">(+109)</td></tr>
<tr><td width="200"><img src="img/Flags/Ukraine.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Ukraine">Ukraine</td><td align="right">4 - 6</td><td align="right">(+2)</td></tr>
<tr><td width="200"><img src="img/Flags/FYR Macedonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=FYR Macedonia">FYR Macedonia</td><td align="right">3 - 7</td><td align="right">(-72)</td></tr>
<tr><td width="200"><img src="img/Flags/Tunisia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Tunisia">Tunisia</td><td align="right">0 - 10</td><td align="right">(-274)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP F</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Hungary.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Hungary">Hungary</td><td align="right">8 - 2</td><td align="right">(+135)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bulgaria">Bulgaria</td><td align="right">7 - 3</td><td align="right">(+89)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Sweden.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Sweden">Sweden</td><td align="right">7 - 3</td><td align="right">(+31)</td></tr>
<tr><td width="200"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Croatia">Croatia</td><td align="right">5 - 5</td><td align="right">(+22)</td></tr>
<tr><td width="200"><img src="img/Flags/Egypt.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Egypt">Egypt</td><td align="right">3 - 7</td><td align="right">(-135)</td></tr>
<tr><td width="200"><img src="img/Flags/Uruguay.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Uruguay">Uruguay</td><td align="right">0 - 10</td><td align="right">(-142)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP G</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Romania">Romania</td><td align="right">9 - 1</td><td align="right">(+223)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovenia">Slovenia</td><td align="right">8 - 2</td><td align="right">(+139)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=France">France</td><td align="right">6 - 4</td><td align="right">(+49)</td></tr>
<tr><td width="200"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Turkey">Turkey</td><td align="right">5 - 5</td><td align="right">(+36)</td></tr>
<tr><td width="200"><img src="img/Flags/Venezuela.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Venezuela">Venezuela</td><td align="right">2 - 8</td><td align="right">(-190)</td></tr>
<tr><td width="200"><img src="img/Flags/India.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=India">India</td><td align="right">0 - 10</td><td align="right">(-257)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP H</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Estonia">Estonia</td><td align="right">8 - 2</td><td align="right">(+182)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Portugal">Portugal</td><td align="right">8 - 2</td><td align="right">(+128)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/United Kingdom.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=United Kingdom">United Kingdom</td><td align="right">7 - 3</td><td align="right">(+74)</td></tr>
<tr><td width="200"><img src="img/Flags/Ireland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Ireland">Ireland</td><td align="right">5 - 5</td><td align="right">(-40)</td></tr>
<tr><td width="200"><img src="img/Flags/Thailand.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Thailand">Thailand</td><td align="right">2 - 8</td><td align="right">(-106)</td></tr>
<tr><td width="200"><img src="img/Flags/Chile.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Chile">Chile</td><td align="right">0 - 10</td><td align="right">(-238)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP I</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Switzerland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Switzerland">Switzerland</td><td align="right">8 - 2</td><td align="right">(+49)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Italy">Italy</td><td align="right">7 - 3</td><td align="right">(+149)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Poland">Poland</td><td align="right">7 - 3</td><td align="right">(+63)</td></tr>
<tr><td width="200"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Germany">Germany</td><td align="right">5 - 5</td><td align="right">(-9)</td></tr>
<tr><td width="200"><img src="img/Flags/Albania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Albania">Albania</td><td align="right">3 - 7</td><td align="right">(-83)</td></tr>
<tr><td width="200"><img src="img/Flags/Malta.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Malta">Malta</td><td align="right">0 - 10</td><td align="right">(-169)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP J</b></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Canada.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Canada">Canada</td><td align="right">8 - 2</td><td align="right">(+172)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Norway.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Norway">Norway</td><td align="right">7 - 3</td><td align="right">(+148)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Bosnia and Herzegovina.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bosnia and Herzegovina">Bosnia and Herzegovina</td><td align="right">7 - 3</td><td align="right">(+79)</td></tr>
<tr><td width="200"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Argentina">Argentina</td><td align="right">6 - 4</td><td align="right">(+145)</td></tr>
<tr><td width="200"><img src="img/Flags/Malaysia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Malaysia">Malaysia</td><td align="right">2 - 8</td><td align="right">(-206)</td></tr>
<tr><td width="200"><img src="img/Flags/Montenegro.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Montenegro">Montenegro</td><td align="right">0 - 10</td><td align="right">(-338)</td></tr>
</table>

<?php
} else {
?>

<b>9th U19 World Cup - Final Standings</b><br/><br/>

<span style="background-image:url(/img/12gold.gif); background-repeat: no-repeat;">&nbsp;1&nbsp;</span> <a href="u18teams.php?country=Estonia" class="greenhilite">Estonia</a> (<a href="club.php?clubid=54348">vpliin</a>)<br/>
<span style="background-image:url(/img/12silver.gif); background-repeat: no-repeat;">&nbsp;2&nbsp;</span> <a href="u18teams.php?country=Latvia" class="greenhilite">Latvia</a> (<a href="club.php?clubid=35881">Grizzz^</a>)<br/>
<span style="background-image:url(/img/12bronze.gif); background-repeat: no-repeat;">&nbsp;3&nbsp;</span> <a href="u18teams.php?country=Romania" class="greenhilite">Romania</a> (<a href="club.php?clubid=36">Bebe</a>)<br/>
<br><i>(to be completed)</i>

</td><td class="border" width="50%">

<b><?=$langmark1448?></b><br/><br/>

<?=$langmark1453?>: <a href="league.php?country=Poland">Poland</a><br/>
<?=$langmark1449?>: 64<br/>
<?=$langmark1450?>: 522<br/>
<?=$langmark1451?>: 11.479.797<br/>
<?=$langmark1452?>: 21.992<br/>

<br/><b><?=$langmark1454?></b><br/><br/>
PG: <a href="player.php?playerid=4043750">Itai Rudnitzky</a> (Israel)<br/>
SG: <a href="player.php?playerid=3998120">Allar Ellama</a> (Estonia)<br/>
SF: <a href="player.php?playerid=4043602">Sorinel Bonda</a> (Romania)<br/>
PF: <a href="player.php?playerid=3990776">Zigmārs Mednis</a> (Latvia)<br/>
C: <a href="player.php?playerid=3968232">Delfim Lemos</a> (Portugal)<br/>
<br/>
PG2: <a href="player.php?playerid=3976603">Liudvikas Palaitis</a> (Lithuania)<br/>
SG2: <a href="player.php?playerid=3990086">Laviniu Ciofoaia</a> (Romania)<br/>
SF2: <a href="player.php?playerid=3975784">Robert Kommer</a> (Estonia)<br/>
PF2: <a href="player.php?playerid=3977204">Viljar Ait</a> (Estonia)<br/>
C2: <a href="player.php?playerid=3977250">Danilo Delos Santos</a> (Philippines)<br/>

<br/><?=$langmark1455?>: <a href="player.php?playerid=3990776">Zigmārs Mednis</a> (Latvia)
<br/><?=$langmark1456?>: <a href="player.php?playerid=3998120">Allar Ellama</a> (Estonia)

<?php
$a = $_GET["a"];
if ($a=='y') {?>
<br/><br/><b>Statistical leaders</b> <a href="<?=$_SERVER['REQUEST_URI']?>?a=n" class="greenhilite" title="close">[x]</a><br/>
<br/>Points: <a href="player.php?playerid=3990086">Laviniu Ciofoaia</a> (Romania)
<br/>Rebounds: <a href="player.php?playerid=3990776">Zigmārs Mednis</a> (Latvia)
<br/>Assist: <a href="player.php?playerid=3997028">Elgars Balodis</a> (Latvia)
<br/>Blocks: <a href="player.php?playerid=4010224">Gani Gutierrez</a> (Philippines)
<br/>Steals: <a href="player.php?playerid=3998120">Allar Ellama</a> (Estonia)
<?php } else {echo "<br/><br/><a href=\"",$_SERVER['REQUEST_URI'],"?go=kart&a=y\">statistical leaders</a>";}?>
</td>
</tr>
</table>

<table cellspacing="9" cellpadding="9" border="0" width="100%">
<tr bgcolor="white">
<td class="border" bgcolor="white" width="50%" valign="top">

<b><?=$langmark1457?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Estonia">Estonia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=18097">96&nbsp;:&nbsp;71</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Latvia">Latvia</a>&nbsp;<img src="img/Flags/Latvia.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1458?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Romania">Romania</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=18098">89&nbsp;:&nbsp;87</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Israel">Israel</a>&nbsp;<img src="img/Flags/Israel.png" border="0" alt=""></td></tr>
</table>

<br/><b>5th place match</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Lithuania">Lithuania</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=18099">87&nbsp;:&nbsp;61</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Portugal">Portugal</a>&nbsp;<img src="img/Flags/Portugal.png" border="0" alt=""></td></tr>
</table>

<br/><b>7th place match</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Philippines.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Philippines">Philippines</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=18056">94&nbsp;:&nbsp;63</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Greece">Greece</a>&nbsp;<img src="img/Flags/Greece.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1459?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Estonia">Estonia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=18054">87&nbsp;:&nbsp;80</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Romania">Romania</a>&nbsp;<img src="img/Flags/Romania.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Israel">Israel</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=18055">71&nbsp;:&nbsp;98</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Latvia">Latvia</a>&nbsp;<img src="img/Flags/Latvia.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1460?></b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Estonia">Estonia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=18019">78&nbsp;:&nbsp;76</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Lithuania">Lithuania</a>&nbsp;<img src="img/Flags/Lithuania.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Philippines.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Philippines">Philippines</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=18020">55&nbsp;:&nbsp;78</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Romania">Romania</a>&nbsp;<img src="img/Flags/Romania.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Portugal">Portugal</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=18021">67&nbsp;:&nbsp;76</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Israel">Israel</a>&nbsp;<img src="img/Flags/Israel.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Latvia">Latvia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=18022">89&nbsp;:&nbsp;68</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Greece">Greece</a>&nbsp;<img src="img/Flags/Greece.png" border="0" alt=""></td></tr>
</table>

<br/><b>Round of 16</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Estonia">Estonia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=17989">78&nbsp;:&nbsp;76</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Australia">Australia</a>&nbsp;<img src="img/Flags/Australia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Egypt.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Egypt">Egypt</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=17990">62&nbsp;:&nbsp;86</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Lithuania">Lithuania</a>&nbsp;<img src="img/Flags/Lithuania.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Italy">Italy</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=17991">54&nbsp;:&nbsp;88</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Philippines">Philippines</a>&nbsp;<img src="img/Flags/Philippines.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=USA">USA</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=17992">84&nbsp;:&nbsp;88</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Romania">Romania</a>&nbsp;<img src="img/Flags/Romania.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Portugal">Portugal</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=17993">79&nbsp;:&nbsp;59</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Cyprus">Cyprus</a>&nbsp;<img src="img/Flags/Cyprus.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Israel">Israel</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=17994">86&nbsp;:&nbsp;72</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Germany">Germany</a>&nbsp;<img src="img/Flags/Germany.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Latvia">Latvia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=17995">83&nbsp;:&nbsp;63</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Indonesia">Indonesia</a>&nbsp;<img src="img/Flags/Indonesia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Greece">Greece</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=17996">87&nbsp;:&nbsp;54</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Croatia">Croatia</a>&nbsp;<img src="img/Flags/Croatia.png" border="0" alt=""></td></tr>
</table>

<br/><b>Playoff round</b><br/><br/>

<table cellpadding="1" cellspacing="1" width="100%" border="0">
<tr><td align="left" width="42%"><img src="img/Flags/Netherlands.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Netherlands">Netherlands</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=17956">79&nbsp;:&nbsp;81</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Australia">Australia</a>&nbsp;<img src="img/Flags/Australia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Serbia">Serbia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=17957">71&nbsp;:&nbsp;72</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Lithuania">Lithuania</a>&nbsp;<img src="img/Flags/Lithuania.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Philippines.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Philippines">Philippines</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=17958">81&nbsp;:&nbsp;80</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Slovenia">Slovenia</a>&nbsp;<img src="img/Flags/Slovenia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Romania">Romania</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=17959">83&nbsp;:&nbsp;70</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Canada">Canada</a>&nbsp;<img src="img/Flags/Canada.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bulgaria">Bulgaria</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=17960">56&nbsp;:&nbsp;70</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Cyprus">Cyprus</a>&nbsp;<img src="img/Flags/Cyprus.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Germany">Germany</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=17961">82&nbsp;:&nbsp;79</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Finland">Finland</a>&nbsp;<img src="img/Flags/Finland.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Poland">Poland</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=17962">67&nbsp;:&nbsp;79</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=Indonesia">Indonesia</a>&nbsp;<img src="img/Flags/Indonesia.png" border="0" alt=""></td></tr>

<tr><td align="left" width="42%"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Croatia">Croatia</a></td>
<td align="center" width="12%"><a href="nt_prikaz.php?matchid=17963">74&nbsp;:&nbsp;65</a></td>
<td align="right" width="42%"><a href="u18teams.php?country=New Zealand">New Zealand</a>&nbsp;<img src="img/Flags/New Zealand.png" border="0" alt=""></td></tr>
</table>

<br/><b><?=$langmark1462?></b><br/>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b></td><td align="right"></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Estonia">Estonia</td><td align="right">3 - 0</td><td align="right">(+56)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Philippines.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Philippines">Philippines</td><td align="right">2 - 1</td><td align="right">(+56)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/New Zealand.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=New Zealand">New Zealand</td><td align="right">1 - 2</td><td align="right">(-62)</td></tr>
<tr><td width="200"><img src="img/Flags/Ukraine.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Ukraine">Ukraine</td><td align="right">0 - 3</td><td align="right">(-50)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b></td><td align="right"></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Italy">Italy</td><td align="right">3 - 0</td><td align="right">(+98)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Netherlands.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Netherlands">Netherlands</td><td align="right">2 - 1</td><td align="right">(+9)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Finland">Finland</td><td align="right">1 - 2</td><td align="right">(-20)</td></tr>
<tr><td width="200"><img src="img/Flags/Norway.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Norway">Norway</td><td align="right">0 - 3</td><td align="right">(-87)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b></td><td align="right"></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Egypt.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Egypt">Egypt</td><td align="right">2 - 1</td><td align="right">(+27)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Romania">Romania</td><td align="right">2 - 1</td><td align="right">(+21)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Indonesia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Indonesia">Indonesia</td><td align="right">2 - 1</td><td align="right">(-3)</td></tr>
<tr><td width="200"><img src="img/Flags/Russia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Russia">Russia</td><td align="right">0 - 3</td><td align="right">(-45)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b></td><td align="right"></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=USA">USA</td><td align="right">3 - 0</td><td align="right">(+47)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Serbia">Serbia</td><td align="right">2 - 1</td><td align="right">(+40)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Cyprus.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Cyprus">Cyprus</td><td align="right">1 - 2</td><td align="right">(-46)</td></tr>
<tr><td width="200"><img src="img/Flags/Czech Republic.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Czech Republic">Czech Republic</td><td align="right">0 - 3</td><td align="right">(-41)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP E</b></td><td align="right"></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Portugal">Portugal</td><td align="right">3 - 0</td><td align="right">(+45)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Poland">Poland</td><td align="right">2 - 1</td><td align="right">(+16)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Canada.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Canada">Canada</td><td align="right">1 - 2</td><td align="right">(-40)</td></tr>
<tr><td width="200"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=France">France</td><td align="right">0 - 3</td><td align="right">(-21)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP F</b></td><td align="right"></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Latvia">Latvia</td><td align="right">3 - 0</td><td align="right">(+32)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bulgaria">Bulgaria</td><td align="right">2 - 1</td><td align="right">(+11)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Lithuania">Lithuania</td><td align="right">1 - 2</td><td align="right">(-15)</td></tr>
<tr><td width="200"><img src="img/Flags/Hungary.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Hungary">Hungary</td><td align="right">0 - 3</td><td align="right">(-28)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP G</b></td><td align="right"></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Israel">Israel</td><td align="right">3 - 0</td><td align="right">(+43)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Croatia">Croatia</td><td align="right">2 - 1</td><td align="right">(-1)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovenia">Slovenia</td><td align="right">1 - 2</td><td align="right">(+28)</td></tr>
<tr><td width="200"><img src="img/Flags/Switzerland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Switzerland">Switzerland</td><td align="right">0 - 3</td><td align="right">(-70)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP H</b></td><td align="right"></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Greece">Greece</td><td align="right">2 - 1</td><td align="right">(+28)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Germany">Germany</td><td align="right">2 - 1</td><td align="right">(+12)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Australia">Australia</td><td align="right">1 - 2</td><td align="right">(-18)</td></tr>
<tr><td width="200"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Spain">Spain</td><td align="right">1 - 2</td><td align="right">(-22)</td></tr>
</table>

</td>
<td width="50%" valign="top" class="border" bgcolor="white">

<b><?=$langmark1463?></b><br/>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP A</b></td><td align="right"></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Romania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Romania">Romania</td><td align="right">13 - 1</td><td align="right">(+379)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/New Zealand.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=New Zealand">New Zealand</td><td align="right">10 - 4</td><td align="right">(+170)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Portugal.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Portugal">Portugal</td><td align="right">10 - 4</td><td align="right">(+159)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Cyprus.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Cyprus">Cyprus</td><td align="right">9 - 5</td><td align="right">(+67)</td></tr>
<tr><td width="200"><img src="img/Flags/South Korea.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=South Korea">South Korea</td><td align="right">8 - 6</td><td align="right">(+23)</td></tr>
<tr><td width="200"><img src="img/Flags/Malta.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Malta">Malta</td><td align="right">3 - 11</td><td align="right">(-196)</td></tr>
<tr><td width="200"><img src="img/Flags/Denmark.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Denmark">Denmark</td><td align="right">3 - 11</td><td align="right">(-228)</td></tr>
<tr><td width="200"><img src="img/Flags/China.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=China">China</td><td align="right">0 - 14</td><td align="right">(-374)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP B</b></td><td align="right"></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Hungary.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Hungary">Hungary</td><td align="right">11 - 3</td><td align="right">(+143)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Indonesia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Indonesia">Indonesia</td><td align="right">9 - 5</td><td align="right">(+100)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Serbia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Serbia">Serbia</td><td align="right">9 - 5</td><td align="right">(+42)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Ukraine.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Ukraine">Ukraine</td><td align="right">8 - 6</td><td align="right">(+120)</td></tr>
<tr><td width="200"><img src="img/Flags/FYR Macedonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=FYR Macedonia">FYR Macedonia</td><td align="right">8 - 6</td><td align="right">(+37)</td></tr>
<tr><td width="200"><img src="img/Flags/Belgium.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Belgium">Belgium</td><td align="right">7 - 7</td><td align="right">(+42)</td></tr>
<tr><td width="200"><img src="img/Flags/Venezuela.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Venezuela">Venezuela</td><td align="right">3 - 11</td><td align="right">(-183)</td></tr>
<tr><td width="200"><img src="img/Flags/Georgia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Georgia">Georgia</td><td align="right">1 - 13</td><td align="right">(-301)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP C</b></td><td align="right"></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Greece.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Greece">Greece</td><td align="right">11 - 3</td><td align="right">(+278)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/France.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=France">France</td><td align="right">10 - 4</td><td align="right">(+209)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Lithuania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Lithuania">Lithuania</td><td align="right">8 - 6</td><td align="right">(+135)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Norway.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Norway">Norway</td><td align="right">7 - 7</td><td align="right">(+93)</td></tr>
<tr><td width="200"><img src="img/Flags/Argentina.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Argentina">Argentina</td><td align="right">7 - 7</td><td align="right">(+64)</td></tr>
<tr><td width="200"><img src="img/Flags/India.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=India">India</td><td align="right">7 - 7</td><td align="right">(+2)</td></tr>
<tr><td width="200"><img src="img/Flags/Chile.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Chile">Chile</td><td align="right">6 - 8</td><td align="right">(+39)</td></tr>
<tr><td width="200"><img src="img/Flags/Puerto Rico.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Puerto Rico">Puerto Rico</td><td align="right">0 - 14</td><td align="right">(-820)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP D</b></td><td align="right"></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Slovenia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovenia">Slovenia</td><td align="right">11 - 3</td><td align="right">(+171)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Netherlands.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Netherlands">Netherlands</td><td align="right">10 - 4</td><td align="right">(+138)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Philippines.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Philippines">Philippines</td><td align="right">10 - 4</td><td align="right">(+81)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Spain.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Spain">Spain</td><td align="right">9 - 5</td><td align="right">(+80)</td></tr>
<tr><td width="200"><img src="img/Flags/United Kingdom.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=United Kingdom">United Kingdom</td><td align="right">7 - 7</td><td align="right">(+68)</td></tr>
<tr><td width="200"><img src="img/Flags/Hong Kong.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Hong Kong">Hong Kong</td><td align="right">6 - 8</td><td align="right">(-5)</td></tr>
<tr><td width="200"><img src="img/Flags/Ireland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Ireland">Ireland</td><td align="right">3 - 11</td><td align="right">(-127)</td></tr>
<tr><td width="200"><img src="img/Flags/Belarus.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Belarus">Belarus</td><td align="right">0 - 14</td><td align="right">(-406)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP E</b></td><td align="right"></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/USA.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=USA">USA</td><td align="right">12 - 2</td><td align="right">(+223)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Germany.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Germany">Germany</td><td align="right">11 - 3</td><td align="right">(+153)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Israel.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Israel">Israel</td><td align="right">9 - 5</td><td align="right">(+130)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Poland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Poland">Poland</td><td align="right">8 - 6</td><td align="right">(+128)</td></tr>
<tr><td width="200"><img src="img/Flags/Uruguay.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Uruguay">Uruguay</td><td align="right">8 - 6</td><td align="right">(+99)</td></tr>
<tr><td width="200"><img src="img/Flags/Slovakia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Slovakia">Slovakia</td><td align="right">6 - 8</td><td align="right">(+70)</td></tr>
<tr><td width="200"><img src="img/Flags/Thailand.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Thailand">Thailand</td><td align="right">2 - 12</td><td align="right">(-284)</td></tr>
<tr><td width="200"><img src="img/Flags/Montenegro.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Montenegro">Montenegro</td><td align="right">0 - 14</td><td align="right">(-519)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP F</b></td><td align="right"></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Estonia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Estonia">Estonia</td><td align="right">12 - 2</td><td align="right">(+228)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Bulgaria.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bulgaria">Bulgaria</td><td align="right">11 - 3</td><td align="right">(+208)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Egypt.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Egypt">Egypt</td><td align="right">11 - 3</td><td align="right">(+145)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Croatia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Croatia">Croatia</td><td align="right">9 - 5</td><td align="right">(+143)</td></tr>
<tr><td width="200"><img src="img/Flags/Bosnia and Herzegovina.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Bosnia and Herzegovina">Bosnia and Herzegovina</td><td align="right">5 - 9</td><td align="right">(-51)</td></tr>
<tr><td width="200"><img src="img/Flags/Albania.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Albania">Albania</td><td align="right">5 - 9</td><td align="right">(-63)</td></tr>
<tr><td width="200"><img src="img/Flags/Colombia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Colombia">Colombia</td><td align="right">3 - 11</td><td align="right">(-130)</td></tr>
<tr><td width="200"><img src="img/Flags/Japan.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Japan">Japan</td><td align="right">0 - 14</td><td align="right">(-480)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP G</b></td><td align="right"></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Italy.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Italy">Italy</td><td align="right">13 - 1</td><td align="right">(+216)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Switzerland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Switzerland">Switzerland</td><td align="right">11 - 3</td><td align="right">(+190)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Australia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Australia">Australia</td><td align="right">8 - 6</td><td align="right">(+29)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Russia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Russia">Russia</td><td align="right">8 - 6</td><td align="right">(+5)</td></tr>
<tr><td width="200"><img src="img/Flags/Turkey.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Turkey">Turkey</td><td align="right">7 - 7</td><td align="right">(+51)</td></tr>
<tr><td width="200"><img src="img/Flags/Malaysia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Malaysia">Malaysia</td><td align="right">6 - 8</td><td align="right">(-69)</td></tr>
<tr><td width="200"><img src="img/Flags/Tunisia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Tunisia">Tunisia</td><td align="right">3 - 11</td><td align="right">(-134)</td></tr>
<tr><td width="200"><img src="img/Flags/Austria.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Austria">Austria</td><td align="right">0 - 14</td><td align="right">(-288)</td></tr>
</table>

<br/><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td><b>GROUP H</b></td><td align="right"></td></tr></table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Canada.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Canada">Canada</td><td align="right">12 - 2</td><td align="right">(+227)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Czech Republic.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Czech Republic">Czech Republic</td><td align="right">10 - 4</td><td align="right">(+229)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Finland.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Finland">Finland</td><td align="right">10 - 4</td><td align="right">(+187)</td></tr>
<tr bgcolor="#FFCC99"><td width="200"><img src="img/Flags/Latvia.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Latvia">Latvia</td><td align="right">10 - 4</td><td align="right">(+167)</td></tr>
<tr><td width="200"><img src="img/Flags/Brazil.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Brazil">Brazil</td><td align="right">7 - 7</td><td align="right">(+36)</td></tr>
<tr><td width="200"><img src="img/Flags/Mexico.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Mexico">Mexico</td><td align="right">5 - 9</td><td align="right">(-120)</td></tr>
<tr><td width="200"><img src="img/Flags/Sweden.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Sweden">Sweden</td><td align="right">2 - 12</td><td align="right">(-245)</td></tr>
<tr><td width="200"><img src="img/Flags/Peru.png" border="0" alt="">&nbsp;<a href="u18teams.php?country=Peru">Peru</td><td align="right">0 - 14</td><td align="right">(-481)</td></tr>
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