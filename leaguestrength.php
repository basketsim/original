<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$country44 = $_POST["country"]; if (!$country44) {$country44='global';}
$level44 = $_POST["level"]; if (!$level44) {$level44=0;}
$order44 = $_POST["order"]; if (!$order44) {$order44='best';}
if (strlen($order44) > 5 || strlen($order44) < 4) {die(include 'basketsim.php');}
if ($level44 > 5 || $level44 < 0 || !is_numeric($level44)) {die(include 'basketsim.php');}
$country44 = htmlspecialchars(strip_tags($country44));

$compare = mysql_query("SELECT lang, supporter, leagueid FROM users, competition WHERE club=teamid AND season=$default_season AND password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)==1) {
$lang = mysql_result ($compare,0,"lang");
$supp = mysql_result ($compare,0,"supporter");
$primlig = mysql_result ($compare,0,"leagueid");
}
else {die(include 'basketsim.php');}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2>League strength stats</h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="64%">
<?php
if ($level44==0 AND $country44=='global' AND $order44=='best') {echo "<h2>Strongest leagues in Basketsim</h2>"; $query = "SELECT leagueid, name, country, `change`, strength FROM leagues WHERE active=1 ORDER BY strength DESC, level DESC, name DESC LIMIT 30";}
elseif ($level44==0 AND $country44<>'global' AND $order44=='best') {echo "<h2>Strongest leagues in ",$country44,"</h2>"; $query = "SELECT leagueid, name, country, `change`, strength FROM leagues WHERE active=1 AND country='$country44' ORDER BY strength DESC, level DESC, name DESC LIMIT 30";}
elseif ($level44==0 AND $country44=='global' AND $order44=='worst') {echo "<h2>Weakest leagues in Basketsim</h2>"; $query = "SELECT leagueid, name, country, `change`, strength FROM leagues WHERE active=1 ORDER BY strength ASC, level ASC, name ASC LIMIT 30";}
elseif ($level44==0 AND $country44<>'global' AND $order44=='worst') {echo "<h2>Weakest leagues in ",$country44,"</h2>"; $query = "SELECT leagueid, name, country, `change`, strength FROM leagues WHERE active=1 AND country='$country44' ORDER BY strength ASC, level ASC, name ASC LIMIT 30";}
elseif ($level44==1 AND $country44=='global' AND $order44=='best') {echo "<h2>Strongest 1.1 leagues in Basketsim</h2>"; $query = "SELECT leagueid, name, country, `change`, strength FROM leagues WHERE level=1 ORDER BY strength DESC, level DESC, name DESC LIMIT 30";}
elseif ($level44==1 AND $country44=='global' AND $order44=='worst') {echo "<h2>Weakest 1.1 leagues in Basketsim</h2>"; $query = "SELECT leagueid, name, country, `change`, strength FROM leagues WHERE level=1 ORDER BY strength ASC, level ASC, name ASC LIMIT 30";}
elseif ($level44==1 AND $country44<>'global' AND $order44=='best') {echo "<h2>Strongest 1.1 leagues in ",$country44,"</h2>"; $query = "SELECT leagueid, name, country, `change`, strength FROM leagues WHERE level=1 AND country='$country44' ORDER BY strength DESC, level DESC, name DESC LIMIT 30";}
elseif ($level44==1 AND $country44<>'global' AND $order44=='worst') {echo "<h2>Weakest 1.1 leagues in ",$country44,"</h2>"; $query = "SELECT leagueid, name, country, `change`, strength FROM leagues WHERE level=1 AND country='$country44' ORDER BY strength ASC, level ASC, name ASC LIMIT 30";}
elseif ($level44 > 1 AND $country44=='global' AND $order44=='best') {echo "<h2>Strongest ",$level44,".x leagues in Basketsim</h2>"; $query = "SELECT leagueid, name, country, `change`, strength FROM leagues WHERE active=1 AND level='$level44' ORDER BY strength DESC, level DESC, name DESC LIMIT 30";}
elseif ($level44 > 1 AND $country44<>'global' AND $order44=='best') {echo "<h2>Strongest ",$level44,".x leagues in ",$country44,"</h2>"; $query = "SELECT leagueid, name, country, `change`, strength FROM leagues WHERE active=1 AND level='$level44' AND country='$country44' ORDER BY strength DESC, level DESC, name DESC LIMIT 30";}
elseif ($level44 > 1 AND $country44=='global' AND $order44=='worst') {echo "<h2>Weakest ",$level44,".x leagues in Basketsim</h2>"; $query = "SELECT leagueid, name, country, `change`, strength FROM leagues WHERE active=1 AND level='$level44' ORDER BY strength ASC, level ASC, name ASC LIMIT 30";}
elseif ($level44 > 1 AND $country44<>'global' AND $order44=='worst') {echo "<h2>Weakest ",$level44,".x leagues in ",$country44,"</h2>"; $query = "SELECT leagueid, name, country, `change`, strength FROM leagues WHERE active=1 AND level='$level44' AND country='$country44' ORDER BY strength ASC, level ASC, name ASC LIMIT 30";}
?>
<br/><table border="0" width="100%" cellspacing="0" cellpadding="0">
<?php
$result = mysql_query($query) or die(mysql_error());
while ($f = mysql_fetch_array($result)) {
$leagueid = $f[leagueid];
$name = $f[name];
$country = $f[country];
$change = $f[change];
$strength = $f[strength];
if ($leagueid==$primlig) {$cgc='#FFCC66';} else {$cgc='white';}
if ($country=='Bosnia') {$country='Bosnia and Herzegovina';}
if ($change > 0) {$changed="<font color=\"green\">+".$change."</font>";} elseif ($change < 0) {$changed="<font color=\"red\">".$change."</font>";} else {$changed='==';}
$i=1+$i;
?>
<tr bgcolor="<?=$cgc?>" width="100%"><td width="87%" bgcolor="<?=$cgc?>"><?=$i,". <a href=\"leagues.php?leagueid=",$leagueid,"\"><b>",$name,"</b></a> (",$country,")"?></td><td align="left" bgcolor="<?=$cgc?>" width="13%"><?=$strength,"&nbsp;(",$changed,")"?></td></tr>
<?php
}
?>
</table>
</td><td class="border" width="36%">

<?php if($supp==1){?>

<h2>Sorting options</h2><br/>

<form method="post" action="leaguestrength.php" style="margin: 0" name="tijuk">
<select name="country" class="inputreg">
<option name="global" value="global" <?php if ($country44=='global'){echo "selected";}?>>Global stats</option>
<option name="Albania" value="Albania" <?php if ($country44=='Albania'){echo "selected";}?>>Albania</option>
<option name="Argentina" value="Argentina" <?php if ($country44=='Argentina'){echo "selected";}?>>Argentina</option>
<option name="Australia" value="Australia" <?php if ($country44=='Australia'){echo "selected";}?>>Australia</option>
<option name="Austria" value="Austria" <?php if ($country44=='Austria'){echo "selected";}?>>Austria</option>
<option name="Belarus" value="Belarus" <?php if ($country44=='Belarus'){echo "selected";}?>>Belarus</option>
<option name="Belgium" value="Belgium" <?php if ($country44=='Belgium'){echo "selected";}?>>Belgium</option>
<option name="Bosnia" value="Bosnia" <?php if ($country44=='Bosnia'){echo "selected";}?>>Bosna and Herzegovina</option>
<option name="Brazil" value="Brazil" <?php if ($country44=='Brazil'){echo "selected";}?>>Brazil</option>
<option name="Bulgaria" value="Bulgaria" <?php if ($country44=='Bulgaria'){echo "selected";}?>>Bulgaria</option>
<option name="Canada" value="Canada" <?php if ($country44=='Canada'){echo "selected";}?>>Canada</option>
<option name="Chile" value="Chile" <?php if ($country44=='Chile'){echo "selected";}?>>Chile</option>
<option name="China" value="China" <?php if ($country44=='China'){echo "selected";}?>>China</option>
<option name="Colombia" value="Colombia" <?php if ($country44=='Colombia'){echo "selected";}?>>Colombia</option>
<option name="Croatia" value="Croatia" <?php if ($country44=='Croatia'){echo "selected";}?>>Croatia</option>
<option name="Cyprus" value="Cyprus" <?php if ($country44=='Cyprus'){echo "selected";}?>>Cyprus</option>
<option name="Czech Republic" value="Czech Republic" <?php if ($country44=='Czech Republic'){echo "selected";}?>>Czech Republic</option>
<option name="Denmark" value="Denmark" <?php if ($country44=='Denmark'){echo "selected";}?>>Danmark</option>
<option name="Egypt" value="Egypt" <?php if ($country44=='Egypt'){echo "selected";}?>>Egypt</option>
<option name="Estonia" value="Estonia" <?php if ($country44=='Estonia'){echo "selected";}?>>Estonia</option>
<option name="Finland" value="Finland" <?php if ($country44=='Finland'){echo "selected";}?>>Finland</option>
<option name="France" value="France" <?php if ($country44=='France'){echo "selected";}?>>France</option>
<option name="FYR Macedonia" value="FYR Macedonia" <?php if ($country44=='FYR Macedonia'){echo "selected";}?>>FYR Macedonia</option>
<option name="Georgia" value="Georgia" <?php if ($country44=='Georgia'){echo "selected";}?>>Georgia</option>
<option name="Germany" value="Germany" <?php if ($country44=='Germany'){echo "selected";}?>>Germany</option>
<option name="Greece" value="Greece" <?php if ($country44=='Greece'){echo "selected";}?>>Greece</option>
<option name="Hong Kong" value="Hong Kong" <?php if ($country44=='Hong Kong'){echo "selected";}?>>Hong Kong</option>
<option name="Hungary" value="Hungary" <?php if ($country44=='Hungary'){echo "selected";}?>>Hungary</option>
<option name="India" value="India" <?php if ($country44=='India'){echo "selected";}?>>India</option>
<option name="Indonesia" value="Indonesia" <?php if ($country44=='Indonesia'){echo "selected";}?>>Indonesia</option>
<option name="Ireland" value="Ireland" <?php if ($country44=='Ireland'){echo "selected";}?>>Ireland</option>
<option name="Israel" value="Israel" <?php if ($country44=='Israel'){echo "selected";}?>>Israel</option>
<option name="Italy" value="Italy" <?php if ($country44=='Italy'){echo "selected";}?>>Italia</option>
<option name="Japan" value="Japan" <?php if ($country44=='Japan'){echo "selected";}?>>Japan</option>
<option name="Latvia" value="Latvia" <?php if ($country44=='Latvia'){echo "selected";}?>>Latvija</option>
<option name="Lithuania" value="Lithuania" <?php if ($country44=='Lithuania'){echo "selected";}?>>Lithuania</option>
<option name="Malaysia" value="Malaysia" <?php if ($country44=='Malaysia'){echo "selected";}?>>Malaysia</option>
<option name="Malta" value="Malta" <?php if ($country44=='Malta'){echo "selected";}?>>Malta</option>
<option name="Mexico" value="Mexico" <?php if ($country44=='Mexico'){echo "selected";}?>>Mexico</option>
<option name="Montenegro" value="Montenegro" <?php if ($country44=='Montenegro'){echo "selected";}?>>Montenegro</option>
<option name="Netherlands" value="Netherlands" <?php if ($country44=='Netherlands'){echo "selected";}?>>Netherlands</option>
<option name="New Zealand" value="New Zealand" <?php if ($country44=='New Zealand'){echo "selected";}?>>New Zealand</option>
<option name="Norway" value="Norway" <?php if ($country44=='Norway'){echo "selected";}?>>Norway</option>
<option name="Peru" value="Peru" <?php if ($country44=='Peru'){echo "selected";}?>>Peru</option>
<option name="Philippines" value="Philippines" <?php if ($country44=='Philippines'){echo "selected";}?>>Philippines</option>
<option name="Poland" value="Poland" <?php if ($country44=='Poland'){echo "selected";}?>>Poland</option>
<option name="Portugal" value="Portugal" <?php if ($country44=='Portugal'){echo "selected";}?>>Portugal</option>
<option name="Puerto Rico" value="Puerto Rico" <?php if ($country44=='Puerto Rico'){echo "selected";}?>>Puerto Rico</option>
<option name="Romania" value="Romania" <?php if ($country44=='Romania'){echo "selected";}?>>Romania</option>
<option name="Russia" value="Russia" <?php if ($country44=='Russia'){echo "selected";}?>>Russia</option>
<option name="Serbia" value="Serbia" <?php if ($country44=='Serbia'){echo "selected";}?>>Serbia</option>
<option name="Slovakia" value="Slovakia" <?php if ($country44=='Slovakia'){echo "selected";}?>>Slovakia</option>
<option name="Slovenia" value="Slovenia" <?php if ($country44=='Slovenia'){echo "selected";}?>>Slovenia</option>
<option name="South Korea" value="South Korea" <?php if ($country44=='South Korea'){echo "selected";}?>>South Korea</option>
<option name="Spain" value="Spain" <?php if ($country44=='Spain'){echo "selected";}?>>Spain</option>
<option name="Sweden" value="Sweden" <?php if ($country44=='Sweden'){echo "selected";}?>>Sweden</option>
<option name="Switzerland" value="Switzerland" <?php if ($country44=='Switzerland'){echo "selected";}?>>Switzerland</option>
<option name="Thailand" value="Thailand" <?php if ($country44=='Thailand'){echo "selected";}?>>Thailand</option>
<option name="Tunisia" value="Tunisia" <?php if ($country44=='Tunisia'){echo "selected";}?>>Tunisia</option>
<option name="Turkey" value="Turkey" <?php if ($country44=='Turkey'){echo "selected";}?>>Turkey</option>
<option name="Ukraine" value="Ukraine" <?php if ($country44=='Ukraine'){echo "selected";}?>>Ukraine</option>
<option name="United Kingdom" value="United Kingdom" <?php if ($country44=='United Kingdom'){echo "selected";}?>>United Kingdom</option>
<option name="Uruguay" value="Uruguay" <?php if ($country44=='Uruguay'){echo "selected";}?>>Uruguay</option>
<option name="USA" value="USA" <?php if ($country44=='USA'){echo "selected";}?>>USA</option>
<option name="Venezuela" value="Venezuela" <?php if ($country44=='Venezuela'){echo "selected";}?>>Venezuela</option>
</select>
<br/>
<select name="level" class="inputreg">
<option name="0" value="0" <?php if ($level44==0){echo "selected";}?>>All leagues</option>
<option name="1" value="1" <?php if ($level44==1){echo "selected";}?>>1.1 leagues only</option>
<option name="2" value="2" <?php if ($level44==2){echo "selected";}?>>2.x leagues only</option>
<option name="3" value="3" <?php if ($level44==3){echo "selected";}?>>3.x leagues only</option>
<option name="4" value="4" <?php if ($level44==4){echo "selected";}?>>4.x leagues only</option>
<option name="5" value="5" <?php if ($level44==5){echo "selected";}?>>5.x leagues only</option>
</select>
<br/>
<select name="order" class="inputreg">
<option name="best" value="best" <?php if ($order44=='best'){echo "selected";}?>>Best leagues</option>
<option name="worst" value="worst" <?php if ($order44=='worst'){echo "selected";}?>>Weakest leagues</option>
</select>
<br/>
<input type="submit" value="Submit" name="" class="buttonreg">
</form>
<br/>
<?php }?>
<h2>Explanation</h2><br/>
<i>League strength is calculated based on wages of players competing in a league.<br/><br/>
Values are updated every day at 6:30 (server time), ups and downs are displayed in green/red.</i>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>