<?php
$expandmenu1=499;
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}
$getuser=mysql_query("SELECT club, lang, name FROM users, teams WHERE users.club = teams.teamid AND password='$koda' AND userid='$userid' LIMIT 1");
if (mysql_num_rows($getuser)) {
$get_team = mysql_result($getuser,0,"club");
$lang = mysql_result($getuser,0,"lang");
$namez = mysql_result($getuser,0,"name");
}
else {die(include 'basketsim.php');}

$teamleague = mysql_query("SELECT level, country, position, name, win, lose, difference FROM leagues, competition WHERE leagues.leagueid = competition.leagueid AND season ='$default_season' AND teamid ='$get_team'") or die(mysql_error());
$lev = mysql_result($teamleague,0,"level");
$cou = mysql_result($teamleague,0,"country");
$pos = mysql_result($teamleague,0,"position");
$nam = mysql_result($teamleague,0,"name");
$win = mysql_result($teamleague,0,"win");
$los = mysql_result($teamleague,0,"lose");
$dif = mysql_result($teamleague,0,"difference");

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2>TEAM RANKING</h2>

<table border="0" cellspacing="10" cellpadding="10" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="60%">
<?php
$action = $_POST["country"];
if (!$action) {$action = $_GET["action"];}
if (!$action) {
$order = mysql_query("SELECT curname, country, teamid, `level`, position, win, lose, difference FROM leagues, competition WHERE leagues.leagueid = competition.leagueid AND season ='$default_season' AND `level`=1 ORDER BY position ASC, win DESC, lose ASC, difference DESC, for_ DESC LIMIT 500") or die(mysql_error());
echo "<h2>Top ranked teams (global)</h2><br/><table width=\"100%\" cellspacing=\"0\" cellpadding=\"1\">";
while ($v = mysql_fetch_array($order)) {
$ekipa = $v['teamid'];
$addon = mysql_query("SELECT userid FROM users WHERE club = '$ekipa'");
if (mysql_num_rows($addon)) {$user = mysql_result($addon,0); $link="club.php?clubid=".$user;} else {$link="team.php?clubid=".$ekipa;}
$no=$no+1;
echo "<tr>";
if ($v['teamid'] == $get_team) {echo "<td bgcolor=\"#FFCC66\"><img src=\"img/Flags/",$v['country'],".png\" border=\"0\" alt=\"",$country,"\" title=\"",$country,"\"><b> ",$no,". ",stripslashes($v['curname']),"</b></td><td align=\"right\" bgcolor=\"#FFCC66\"><b>",(6 - $v['level']).((16 - $v['position']) * 6).number_format((26+$v['win']-$v['lose'])*0.19, 1, ',', '').round(((1999 + $v['difference'])*2.5)/1000),"</b></td></tr>";}
else {echo "<td><img src=\"img/Flags/",$v['country'],".png\" border=\"0\" alt=\"",$country,"\" title=\"",$country,"\"> ",$no,". <a href=\"",$link,"\">",stripslashes($v['curname']),"</a></td><td align=\"right\">",(6 - $v['level']).((16 - $v['position']) * 6).number_format((26+$v['win']-$v['lose'])*0.19, 1, ',', '').round(((1999 + $v['difference'])*2.5)/1000),"</td></tr>";}
}
echo "</table>";
}
else {
$order = mysql_query("SELECT curname, country, teamid, `level`, position, win, lose, difference FROM leagues, competition WHERE leagues.leagueid = competition.leagueid AND season ='$default_season' AND country ='$action' ORDER BY `level` ASC, position ASC, win DESC, lose ASC, difference DESC, for_ DESC LIMIT 500") or die(mysql_error());
echo "<h2>Top ranked teams (",$action,")</h2><br/><table width=\"100%\" cellspacing=\"0\" cellpadding=\"1\">";
while ($v = mysql_fetch_array($order)) {
$ekipa = $v['teamid'];
$addon = mysql_query("SELECT userid FROM users WHERE club = '$ekipa'");
if (mysql_num_rows($addon)) {$user = mysql_result($addon,0); $link="club.php?clubid=".$user;} else {$link="team.php?clubid=".$ekipa;}
$no=$no+1;
echo "<tr>";
if ($v['teamid'] == $get_team) {echo "<td bgcolor=\"#FFCC66\"><img src=\"img/Flags/",$v['country'],".png\" border=\"0\" alt=\"",$country,"\" title=\"",$country,"\"><b> ",$no,". ",stripslashes($v['curname']),"</b></td><td align=\"right\" bgcolor=\"#FFCC66\"><b>",(6 - $v['level']).((16 - $v['position']) * 6).number_format((26+$v['win']-$v['lose'])*0.19, 1, ',', '').round(((1999 + $v['difference'])*2.5)/1000),"</b></td></tr>";}
else {echo "<td><img src=\"img/Flags/",$v['country'],".png\" border=\"0\" alt=\"",$country,"\" title=\"",$country,"\"> ",$no,". <a href=\"",$link,"\">",stripslashes($v['curname']),"</td><td align=\"right\">",(6 - $v['level']).((16 - $v['position']) * 6).number_format((26+$v['win']-$v['lose'])*0.19, 1, ',', '').round(((1999 + $v['difference'])*2.5)/1000),"</td></tr>";}
}
echo "</table>";
}
?>

</td><td class="border" width="40%">

<h2>Choose country</h2><br/>
<form method="post" action="clubrank.php" style="margin: 0" name="tijuk">
<select name="country"  OnChange="location.href='clubrank.php?action='+tijuk.country.options[selectedIndex].value" class="inputreg">
<option value="">Global stats</option>
<option name="Albania" value="Albania" <?php if ($action=='Albania'){echo "selected";}?>>Albania</option>
<option name="Argentina" value="Argentina" <?php if ($action=='Argentina'){echo "selected";}?>>Argentina</option>
<option name="Australia" value="Australia" <?php if ($action=='Australia'){echo "selected";}?>>Australia</option>
<option name="Austria" value="Austria" <?php if ($action=='Austria'){echo "selected";}?>>Austria</option>
<option name="Belarus" value="Belarus" <?php if ($action=='Belarus'){echo "selected";}?>>Belarus</option>
<option name="Belgium" value="Belgium" <?php if ($action=='Belgium'){echo "selected";}?>>Belgium</option>
<option name="Bosnia" value="Bosnia" <?php if ($action=='Bosnia'){echo "selected";}?>>Bosna and Herzegovina</option>
<option name="Brazil" value="Brazil" <?php if ($action=='Brazil'){echo "selected";}?>>Brazil</option>
<option name="Bulgaria" value="Bulgaria" <?php if ($action=='Bulgaria'){echo "selected";}?>>Bulgaria</option>
<option name="Canada" value="Canada" <?php if ($action=='Canada'){echo "selected";}?>>Canada</option>
<option name="Chile" value="Chile" <?php if ($action=='Chile'){echo "selected";}?>>Chile</option>
<option name="China" value="China" <?php if ($action=='China'){echo "selected";}?>>China</option>
<option name="Colombia" value="Colombia" <?php if ($action=='Colombia'){echo "selected";}?>>Colombia</option>
<option name="Croatia" value="Croatia" <?php if ($action=='Croatia'){echo "selected";}?>>Croatia</option>
<option name="Cyprus" value="Cyprus" <?php if ($action=='Cyprus'){echo "selected";}?>>Cyprus</option>
<option name="Czech Republic" value="Czech Republic" <?php if ($action=='Czech Republic'){echo "selected";}?>>Czech Republic</option>
<option name="Denmark" value="Denmark" <?php if ($action=='Denmark'){echo "selected";}?>>Danmark</option>
<option name="Egypt" value="Egypt" <?php if ($action=='Egypt'){echo "selected";}?>>Egypt</option>
<option name="Estonia" value="Estonia" <?php if ($action=='Estonia'){echo "selected";}?>>Estonia</option>
<option name="Finland" value="Finland" <?php if ($action=='Finland'){echo "selected";}?>>Finland</option>
<option name="France" value="France" <?php if ($action=='France'){echo "selected";}?>>France</option>
<option name="FYR Macedonia" value="FYR Macedonia" <?php if ($action=='FYR Macedonia'){echo "selected";}?>>FYR Macedonia</option>
<option name="Georgia" value="Georgia" <?php if ($action=='Georgia'){echo "selected";}?>>Georgia</option>
<option name="Germany" value="Germany" <?php if ($action=='Germany'){echo "selected";}?>>Germany</option>
<option name="Greece" value="Greece" <?php if ($action=='Greece'){echo "selected";}?>>Greece</option>
<option name="Hong Kong" value="Hong Kong" <?php if ($action=='Hong Kong'){echo "selected";}?>>Hong Kong</option>
<option name="Hungary" value="Hungary" <?php if ($action=='Hungary'){echo "selected";}?>>Hungary</option>
<option name="India" value="India" <?php if ($action=='India'){echo "selected";}?>>India</option>
<option name="Indonesia" value="Indonesia" <?php if ($action=='Indonesia'){echo "selected";}?>>Indonesia</option>
<option name="Ireland" value="Ireland" <?php if ($action=='Ireland'){echo "selected";}?>>Ireland</option>
<option name="Israel" value="Israel" <?php if ($action=='Israel'){echo "selected";}?>>Israel</option>
<option name="Italy" value="Italy" <?php if ($action=='Italy'){echo "selected";}?>>Italia</option>
<option name="Japan" value="Japan" <?php if ($action=='Japan'){echo "selected";}?>>Japan</option>
<option name="Latvia" value="Latvia" <?php if ($action=='Latvia'){echo "selected";}?>>Latvija</option>
<option name="Lithuania" value="Lithuania" <?php if ($action=='Lithuania'){echo "selected";}?>>Lithuania</option>
<option name="Malaysia" value="Malaysia" <?php if ($action=='Malaysia'){echo "selected";}?>>Malaysia</option>
<option name="Malta" value="Malta" <?php if ($action=='Malta'){echo "selected";}?>>Malta</option>
<option name="Mexico" value="Mexico" <?php if ($action=='Mexico'){echo "selected";}?>>Mexico</option>
<option name="Montenegro" value="Montenegro" <?php if ($action=='Montenegro'){echo "selected";}?>>Montenegro</option>
<option name="Netherlands" value="Netherlands" <?php if ($action=='Netherlands'){echo "selected";}?>>Netherlands</option>
<option name="New Zealand" value="New Zealand" <?php if ($action=='New Zealand'){echo "selected";}?>>New Zealand</option>
<option name="Norway" value="Norway" <?php if ($action=='Norway'){echo "selected";}?>>Norway</option>
<option name="Peru" value="Peru" <?php if ($action=='Peru'){echo "selected";}?>>Peru</option>
<option name="Philippines" value="Philippines" <?php if ($action=='Philippines'){echo "selected";}?>>Philippines</option>
<option name="Poland" value="Poland" <?php if ($action=='Poland'){echo "selected";}?>>Poland</option>
<option name="Portugal" value="Portugal" <?php if ($action=='Portugal'){echo "selected";}?>>Portugal</option>
<option name="Puerto Rico" value="Puerto Rico" <?php if ($action=='Puerto Rico'){echo "selected";}?>>Puerto Rico</option>
<option name="Romania" value="Romania" <?php if ($action=='Romania'){echo "selected";}?>>Romania</option>
<option name="Russia" value="Russia" <?php if ($action=='Russia'){echo "selected";}?>>Russia</option>
<option name="Serbia" value="Serbia" <?php if ($action=='Serbia'){echo "selected";}?>>Serbia</option>
<option name="Slovakia" value="Slovakia" <?php if ($action=='Slovakia'){echo "selected";}?>>Slovakia</option>
<option name="Slovenia" value="Slovenia" <?php if ($action=='Slovenia'){echo "selected";}?>>Slovenia</option>
<option name="South Korea" value="South Korea" <?php if ($action=='South Korea'){echo "selected";}?>>South Korea</option>
<option name="Spain" value="Spain" <?php if ($action=='Spain'){echo "selected";}?>>Spain</option>
<option name="Sweden" value="Sweden" <?php if ($action=='Sweden'){echo "selected";}?>>Sweden</option>
<option name="Switzerland" value="Switzerland" <?php if ($action=='Switzerland'){echo "selected";}?>>Switzerland</option>
<option name="Thailand" value="Thailand" <?php if ($action=='Thailand'){echo "selected";}?>>Thailand</option>
<option name="Tunisia" value="Tunisia" <?php if ($action=='Tunisia'){echo "selected";}?>>Tunisia</option>
<option name="Turkey" value="Turkey" <?php if ($action=='Turkey'){echo "selected";}?>>Turkey</option>
<option name="Ukraine" value="Ukraine" <?php if ($action=='Ukraine'){echo "selected";}?>>Ukraine</option>
<option name="United Kingdom" value="United Kingdom" <?php if ($action=='United Kingdom'){echo "selected";}?>>United Kingdom</option>
<option name="Uruguay" value="Uruguay" <?php if ($action=='Uruguay'){echo "selected";}?>>Uruguay</option>
<option name="USA" value="USA" <?php if ($action=='USA'){echo "selected";}?>>USA</option>
<option name="Venezuela" value="Venezuela" <?php if ($action=='Venezuela'){echo "selected";}?>>Venezuela</option>
</select>
<input type="submit" value="&nbsp;&raquo;" name="" class="buttonreg">
</form>
<br/>
<h2>Legend</h2><br/>
Teams are sorted by:<br/>
1) League level and position<br/>
2) Wins and losses<br/>
3) Score difference<br/>
<br/>
Only results of the current season count.<br/>
<br/><h2>Your team</h2><br/>
<table width="100%" cellspacing="0" cellpadding="1">
<tr><td><b>Name</b></td><td align="right"><?=stripslashes($namez)?></td></tr>
<tr><td><b>League</b></td><td align="right"><?=stripslashes($nam)?> (<?=$cou?>)</td></tr>
<tr><td><b>Position</b></td><td align="right"># <?=$pos?></td></tr>
<tr><td><b>Ranking points</b></td><td align="right"><?=(6 - $lev).((16 - $pos) * 6).number_format((26+$win-$los)*0.19, 1, ',', '').round(((1999 + $dif)*2.5)/1000)?><br/></tr>
</table>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>