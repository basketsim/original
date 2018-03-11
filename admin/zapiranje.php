<?php
include_once("common.php");
$country = $_POST["country"];
?>
<p><a href="index.php">Main</a></p>If there is nothing below, all inactive clubs are currently cleared, so nothing to do here :)<br/>Check option is here for historical reasons, no need to check teams, every team listed here is inactive for 9 weeks and can be deleted!<br/><!--<font color="green"><b>Teams should mostly be deleted in night hours, but most important - not during the peak hours (due to server performance).</b></font><br/>-->
<?php
if ($userid=='4234324231' || $userid=='32342423423011') {
?>
<form method="post" action="<?php echo $PHP_SELF;?>" style="margin: 0">
<select name="country">
<option name="Argentina" value="Argentina" <?php if ($country=='Argentina'){echo "selected";}?>>Argentina</option>
<option name="Australia" value="Australia" <?php if ($country=='Australia'){echo "selected";}?>>Australia</option>
<option name="Belgium" value="Belgium" <?php if ($country=='Belgium'){echo "selected";}?>>Belgi&#235;</option>
<option name="Bosnia" value="Bosnia" <?php if ($country=='Bosnia'){echo "selected";}?>>Bosna i Hercegovina</option>
<option name="Brazil" value="Brazil" <?php if ($country=='Brazil'){echo "selected";}?>>Brasil</option>
<option name="Bulgaria" value="Bulgaria" <?php if ($country=='Bulgaria'){echo "selected";}?>>Bulgaria</option>
<option name="Canada" value="Canada" <?php if ($country=='Canada'){echo "selected";}?>>Canada</option>
<option name="Chile" value="Chile" <?php if ($country=='Chile'){echo "selected";}?>>Chile</option>
<option name="China" value="China" <?php if ($country=='China'){echo "selected";}?>>China</option>
<option name="Colombia" value="Colombia" <?php if ($country=='Colombia'){echo "selected";}?>>Colombia</option>
<option name="Cyprus" value="Cyprus" <?php if ($country=='Cyprus'){echo "selected";}?>>Cyprus</option>
<option name="Czech Republic" value="Czech Republic" <?php if ($country=='Czech Republic'){echo "selected";}?>>&#268;esk&aacute; republika</option>
<option name="Denmark" value="Denmark" <?php if ($country=='Denmark'){echo "selected";}?>>Danmark</option>
<option name="Germany" value="Germany" <?php if ($country=='Germany'){echo "selected";}?>>Deutschland</option>
<option name="Estonia" value="Estonia" <?php if ($country=='Estonia'){echo "selected";}?>>Eesti</option>
<option name="Spain" value="Spain" <?php if ($country=='Spain'){echo "selected";}?>>Espa&#241;a</option>
<option name="France" value="France" <?php if ($country=='France'){echo "selected";}?>>France</option>
<option name="Greece" value="Greece" <?php if ($country=='Greece'){echo "selected";}?>>Hellas</option>
<option name="Croatia" value="Croatia" <?php if ($country=='Croatia'){echo "selected";}?>>Hrvatska</option>
<option name="Israel" value="Israel" <?php if ($country=='Israel'){echo "selected";}?>>Israel</option>
<option name="Italy" value="Italy" <?php if ($country=='Italy'){echo "selected";}?>>Italia</option>
<option name="Latvia" value="Latvia" <?php if ($country=='Latvia'){echo "selected";}?>>Latvija</option>
<option name="Lithuania" value="Lithuania" <?php if ($country=='Lithuania'){echo "selected";}?>>Lietuva</option>
<option name="Hungary" value="Hungary" <?php if ($country=='Hungary'){echo "selected";}?>>Magyarorsz&aacute;g</option>
<option name="FYR Macedonia" value="FYR Macedonia" <?php if ($country=='FYR Macedonia'){echo "selected";}?>>Makedonija</option>
<option name="Malta" value="Malta" <?php if ($country=='Malta'){echo "selected";}?>>Malta</option>
<option name="Mexico" value="Mexico" <?php if ($country=='Mexico'){echo "selected";}?>>M&eacute;xico</option>
<option name="Netherlands" value="Netherlands" <?php if ($country=='Netherlands'){echo "selected";}?>>Nederland</option>
<option name="New Zealand" value="New Zealand" <?php if ($country=='New Zealand'){echo "selected";}?>>New Zealand</option>
<option name="Austria" value="Austria" <?php if ($country=='Austria'){echo "selected";}?>>&Ouml;sterreich</option>
<option name="Philippines" value="Philippines" <?php if ($country=='Philippines'){echo "selected";}?>>Pilipinas</option>
<option name="Poland" value="Poland" <?php if ($country=='Poland'){echo "selected";}?>>Polska</option>
<option name="Portugal" value="Portugal" <?php if ($country=='Portugal'){echo "selected";}?>>Portugal</option>
<option name="Thailand" value="Thailand" <?php if ($country=='Thailand'){echo "selected";}?>>Prathet Thai</option>
<option name="Romania" value="Romania" <?php if ($country=='Romania'){echo "selected";}?>>Rom&#226;nia</option>
<option name="Russia" value="Russia" <?php if ($country=='Russia'){echo "selected";}?>>Rossiya</option>
<option name="Switzerland" value="Switzerland" <?php if ($country=='Switzerland'){echo "selected";}?>>Schweiz</option>
<option name="Albania" value="Albania" <?php if ($country=='Albania'){echo "selected";}?>>Shqiperia</option>
<option name="Slovenia" value="Slovenia" <?php if ($country=='Slovenia'){echo "selected";}?>>Slovenija</option>
<option name="Slovakia" value="Slovakia" <?php if ($country=='Slovakia'){echo "selected";}?>>Slovensko</option>
<option name="Serbia" value="Serbia" <?php if ($country=='Serbia'){echo "selected";}?>>Srbija</option>
<option name="Finland" value="Finland" <?php if ($country=='Finland'){echo "selected";}?>>Suomi</option>
<option name="Sweden" value="Sweden" <?php if ($country=='Sweden'){echo "selected";}?>>Sverige</option>
<option name="Turkey" value="Turkey" <?php if ($country=='Turkey'){echo "selected";}?>>T&uuml;rkiye</option>
<option name="United Kingdom" value="United Kingdom" <?php if ($country=='United Kingdom'){echo "selected";}?>>United Kingdom</option>
<option name="Uruguay" value="Uruguay" <?php if ($country=='Uruguay'){echo "selected";}?>>Uruguay</option>
<option name="USA" value="USA" <?php if ($country=='USA'){echo "selected";}?>>USA</option>
<option name="Venezuela" value="Venezuela" <?php if ($country=='Venezuela'){echo "selected";}?>>Venezuela</option>
<option name="" value="">all countries</option>
</select>
<input type="submit" value="choose" name="submit">
</form>

<?php
}
if (!$country) {echo "<br/>";} else {
$topliga = mysql_query("SELECT DISTINCT level FROM `leagues` WHERE `country`='$country' ORDER BY `level` DESC LIMIT 2") or die(mysql_error());
$top_liga = mysql_result($topliga,1);
$koliko = mysql_query("SELECT DISTINCT `teams`.`teamid` FROM `teams`, `competition`, `leagues` WHERE `teams`.`teamid` = `competition`.`teamid` AND `competition`.`leagueid` = `leagues`.`leagueid` AND `teams`.`status`=3 AND `leagues`.`level` >= $top_liga AND `teams`.`country` LIKE '$country' AND `competition`.season=13");
echo "Available teams: ",mysql_num_rows($koliko),"<br/>";}

$endatum = date("Y-m-d H:i:s");
$tdatetime = explode(" ",$endatum); $ffdate = $tdatetime[0]; $fftime = $tdatetime[1];
$tdate = explode("-", $ffdate); $ffyear = $tdate[0]; $ffmonth = $tdate[1]; $ffday = $tdate[2];
$ttime = explode(":", $fftime); $ffhour = $ttime[0]; $ffmin = $ttime[1]; $ffsec = $ttime[2];
if ($userid==1) {$cas = date("Y-m-d H:i:s", mktime($ffhour,$ffmin,$ffsec,$ffmonth,$ffday-64,$ffyear));}
else {$cas = date("Y-m-d H:i:s", mktime($ffhour,$ffmin,$ffsec,$ffmonth,$ffday-65,$ffyear));}

if (!$country) {$izbor = mysql_query("SELECT users.userid AS userid, users.realname AS pravo, users.lastip AS imeno, users.club AS ekipa, users.username AS clovek, users.last_active AS zadnjic FROM users, teams WHERE users.club = teams.teamid AND users.supporter != 1 AND users.last_active < '$cas' ORDER BY users.last_active ASC") or die(mysql_error());}
else
{$izbor = mysql_query("SELECT users.userid AS userid, users.realname AS pravo, users.lastip AS imeno, users.club AS ekipa, users.username AS clovek, users.last_active AS zadnjic FROM users, teams WHERE users.club = teams.teamid AND users.supporter != 1 AND teams.country = '$country' AND users.last_active < '$cas' ORDER BY users.last_active ASC") or die(mysql_error());}
$tudi = mysql_num_rows($izbor);
$t=0;
while ($t < $tudi) {
$userid = mysql_result($izbor,$t,"userid");
$ekipa = mysql_result($izbor,$t,"ekipa");
$clovek = mysql_result($izbor,$t,"clovek");
$imeno = mysql_result($izbor,$t,"imeno");
$pravo = mysql_result($izbor,$t,"pravo");
$zadnjic = mysql_result($izbor,$t,"zadnjic");

echo "[<a href=\"../club.php?clubid=",$userid,"\">check</a>] [<a href=\"refuse.php?teamid=",$ekipa,"\">delete</a>] - ",$clovek," - ",$zadnjic," [",$imeno,"] - ",$pravo," <br/>";
$t++;
}
?>