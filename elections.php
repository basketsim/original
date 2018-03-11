<?php
$coexpand=14;

//un-comment U19 based on which elections these are (some twiches are needed in the script every season, so check carefully)
//below set your userid and so you can check that everything is ok, as only you will see the script in action before commenting the line
//if($userid<>1) {die("starting soon!");}

//to be adjusted

$ZACETEK = '2015-04-12 10:00:00'; //start of elections
$KONEC = '2015-04-15 20:00:00'; //end of elections
$countries = array('Australia','Austria','Chile','Croatia','Denmark','Egypt','Georgia','Hong Kong','India','Lithuania','Malta','Philippines','Puerto Rico','Thailand');
//at the end display of results will be instant, but after this it's good to check for cheating
//this usually took me full day, since there are always so many reports and everything is being checked

//start of script

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT lang, signed, country, votedfor FROM users, teams WHERE users.club = teams.teamid AND bad_login < 99 AND password ='$koda' AND userid ='$userid'") or die(mysql_error());
if (mysql_num_rows($compare)) {
$lang = mysql_result ($compare,0,"lang");
$signed = mysql_result ($compare,0,"signed");
$country = mysql_result ($compare,0,"country");
$votedfor = mysql_result ($compare,0,"votedfor");
}
else {die(include 'basketsim.php');}

if (isset($_POST['form2']) && date("Y-m-d H:i:s") < $KONEC) {
$scontent = $_REQUEST["scontent"];
$drzva = $_REQUEST["drzva"];
$scontent = addslashes($scontent);
$scontent = htmlspecialchars(stripslashes($scontent));
$drzva = mysql_real_escape_string($drzva);
mysql_query("UPDATE elections SET speech = '$scontent' WHERE country='$drzva' AND userid='$userid' LIMIT 1") or die(mysql_error());
header("Location:elections.php?speech=$userid&where=$drzva");
}

$speech = $_GET["speech"];
if (!is_numeric($speech) && !empty($speech)) {header("Location:elections.php"); die();}

$reject = $_GET["reject"];
$place = $_GET["place"];
$place = mysql_real_escape_string($place);
if ($reject=='yes' && date("Y-m-d H:i:s") < $KONEC) {
mysql_query("UPDATE elections SET reject=1 WHERE country='$place' AND userid=$userid LIMIT 1");
header("Location:elections.php?where=$place"); die();
}
if ($reject=='no' && date("Y-m-d H:i:s") < $KONEC) {
mysql_query("UPDATE elections SET reject=0 WHERE country='$place' AND userid=$userid LIMIT 1");
header("Location:elections.php?where=$place"); die();
}

if (isset($_POST['submit'])) {
if (date("Y-m-d H:i:s") > $KONEC) {header("Location:elections.php?err=900"); die();}
if (!(in_array($country, $countries)) ) {header("Location:elections.php?err=900"); die();}
if ($signed > $ZACETEK) {header("Location:elections.php?err=97"); die();}
//user je skušal oddati glas za nekoga ki ga je vpisal
$kandidat = $_REQUEST["kandidat"];
$kandidat = trim($kandidat);
$kandidat = mysql_real_escape_string($kandidat);
$glasza = mysql_query("SELECT userid FROM users WHERE username='$kandidat' LIMIT 1") or die(mysql_error());
if (!mysql_fetch_row($glasza)){header("Location: elections.php?err=1"); die();}
$kandidat = mysql_result($glasza,0);
$nekdo = mysql_query("SELECT reject FROM elections WHERE country='$country' AND userid=$kandidat LIMIT 1") or die(mysql_error());
if (!mysql_num_rows($nekdo) && $votedfor==0){
mysql_query("INSERT INTO elections VALUES('',$kandidat,1,'$country',0,'',0);") or die(mysql_error());
mysql_query("UPDATE users SET votedfor = $kandidat WHERE userid=$userid LIMIT 1") or die(mysql_error());
header("Location:elections.php");
}
elseif (!mysql_num_rows($nekdo) && $votedfor>0){
mysql_query("INSERT INTO elections VALUES('',$kandidat,1,'$country',0,'',0);") or die(mysql_error());
mysql_query("UPDATE elections SET votes=votes-1 WHERE country='$country' AND userid=$votedfor LIMIT 1") or die(mysql_error());
mysql_query("UPDATE users SET votedfor = $kandidat WHERE userid=$userid LIMIT 1") or die(mysql_error());
header("Location:elections.php");
}
elseif ((mysql_num_rows($nekdo)>0) && $votedfor==0){
//zavrnil?
if (mysql_result($nekdo,0)==1) {header("Location: elections.php?err=4"); die();}
mysql_query("UPDATE elections SET votes=votes+1 WHERE country='$country' AND userid='$kandidat' LIMIT 1") or die(mysql_error());
mysql_query("UPDATE users SET votedfor='$kandidat' WHERE userid='$userid' LIMIT 1") or die(mysql_error());
header("Location:elections.php");
}
elseif ((mysql_num_rows($nekdo)>0) && $votedfor>0){
//zavrnil?
if (mysql_result($nekdo,0)==1) {header("Location: elections.php?err=4"); die();}
mysql_query("UPDATE elections SET votes=votes+1 WHERE country='$country' AND userid='$kandidat' LIMIT 1") or die(mysql_error());
mysql_query("UPDATE elections SET votes=votes-1 WHERE country='$country' AND userid='$votedfor' LIMIT 1") or die(mysql_error());
mysql_query("UPDATE users SET votedfor='$kandidat' WHERE userid='$userid' LIMIT 1") or die(mysql_error());
header("Location:elections.php");
}
}
require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2><?=$langmark1502?></h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="54%">

<?php if (date("Y-m-d H:i:s") < $ZACETEK && ($country == 'Denmark' || $country == 'Venezuela' || $country == 'Egypt' || $country == 'Germany' || $country == 'Australia' || $country == 'Thailand' || $country == 'Ireland')) {echo "New elections start soon!</td></tr></table>"; die();}?>

<h2><?=$langmark1372?></h2><br/>
<form method="post" action="<?=$_SERVER['PHP_SELF']?>" style="margin: 0">
<?=$langmark1373?><!-- U19-->. <?=$langmark1374?> <b><?=$KONEC?></b>. <?=$langmark1375," ",$langmark1376?><br/><br/><b><?=$langmark1377?></b><br/><br/>
<?php
$err = $_GET["err"];
if ($err==1) {echo "<font color=\"red\"><b>",$langmark1378,"</b></font><br/>";}
if ($err==4) {echo "<font color=\"red\"><b>",$langmark1379,"</b></font><br/>";}
if ($err==97) {echo "<font color=\"red\"><b>",$langmark1380,"</b></font><br/>";}
if ($err==900) {echo "<font color=\"red\"><b>",$langmark1381,"</b></font><br/>";}

if ($votedfor > 0) {$glas = mysql_query("SELECT username FROM users WHERE userid ='$votedfor' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($glas)) {
?>
<i><?=$langmark1382?> <a href="club.php?clubid=<?=$votedfor?>"><?=mysql_result($glas,0)?></a>.</i><br/>
<?php } else {?>
<i><?=$langmark1383?></i><br/>
<?php }
}?>
<b><?=$langmark1384?></b> <input type="text" name="kandidat" maxlength="29" size="15" class="inputreg"><input type="submit" value="<?=$langmark534?>" name="submit" class="buttonreg"></form>

<?php
$gcountry = $_POST["gcountry"];
if (empty($gcountry)) {$gcountry = $_GET["gcountry"];}
$where = $_GET["where"];
$where = mysql_real_escape_string($where);
if (empty($gcountry)) {$gcountry=$where;}
if (empty($gcountry)) {$gcountry=$country;}
$jeze = mysql_query("SELECT users.username AS name, elections.userid AS link, reject, speech FROM users, elections WHERE users.userid=elections.userid AND elections.country='$gcountry' AND elections.votes > 0 ORDER BY elections.votes DESC LIMIT 10") or die(mysql_error());
$tum = mysql_num_rows($jeze);
if ($tum>0) {
echo "<br/><hr/><b>",$langmark1386,"</b><br/><br/>";
if ($country==$gcountry) {echo "<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"100%\">"; $gama=447;}
while ($jezeF = mysql_fetch_array($jeze)) {$arrTop10[] = $jezeF[1] . "/\/" . $jezeF[0] . "/\/" . $jezeF[2] . "/\/" . $jezeF[3];}
shuffle($arrTop10);
for ($gg = 0; $gg < $tum; $gg++) {
$clovek = explode("/\/", $arrTop10[$gg]); //damo narazen
if ($country==$gcountry) {
echo "<tr><td align=\"left\"><form method=\"post\" action=\"",$_SERVER['PHP_SELF'],"\" style=\"margin: 0\"><input type=\"hidden\" value=\"",$clovek[1],"\" name=\"kandidat\"><input type=\"submit\" name=\"submit\" value=\"",$langmark1385,"\" class=\"buttonreg\"> <a href=\"club.php?clubid=",$clovek[0],"\">$clovek[1]</a></form></td><td align=\"right\">";
if ($clovek[0]==$userid AND $clovek[2]==0) {echo "<a href=\"elections.php?reject=yes&place=",$gcountry,"\">",$langmark1395,"</a> ";}
if ($clovek[0]==$userid AND $clovek[2]==1) {echo "<a href=\"elections.php?reject=no&place=",$gcountry,"\">",$langmark1394,"</a> ";}
if ((($speech<>$clovek[0]) AND strlen($clovek[3])>0) OR ($clovek[0]==$userid)) {echo "<a href=\"elections.php?speech=",$clovek[0],"&where=",$gcountry,"\"><i>",$langmark1393,"</i></a>";} elseif (($speech==$clovek[0]) AND strlen($clovek[3])>0) {echo "<b>speech</b>";}
echo "&nbsp;</td></tr>";
} else {
echo "<span class=\"alignleft\"><a href=\"club.php?clubid=",$clovek[0],"\">$clovek[1]</a></span><span class=\"alignright\">";
if ($clovek[0]==$userid AND $clovek[2]==0) {echo "<a href=\"elections.php?reject=yes&place=",$gcountry,"\">",$langmark1395,"</a> ";}
if ($clovek[0]==$userid AND $clovek[2]==1) {echo "<a href=\"elections.php?reject=no&place=",$gcountry,"\">",$langmark1394,"</a> ";}
if ((($speech<>$clovek[0]) AND strlen($clovek[3])>0) OR ($clovek[0]==$userid)) {echo "<a href=\"elections.php?speech=",$clovek[0],"&where=",$gcountry,"\"><i>",$langmark1393,"</i></a>";} elseif (($speech==$clovek[0]) AND strlen($clovek[3])>0) {echo "<b>speech</b>";}
echo "</span>&nbsp;<br/>";}
}
}
if ($gama==447) {echo "</table>";}
?>

</td><td class="border" width="46%">

<h2><?=$langmark241?></h2><br/>
<form method="post" action="<?=$PHP_SELF?>" style="margin: 0" name="tijuk">
<select name="gcountry" OnChange="location.href='elections.php?gcountry='+tijuk.gcountry.options[selectedIndex].value" class="inputreg">
<option name="Albania" value="Albania" <?php if ($gcountry=='Albania'){echo "selected";}?>>Albania</option>
<option name="Argentina" value="Argentina" <?php if ($gcountry=='Argentina'){echo "selected";}?>>Argentina</option>
<option name="Australia" value="Australia" <?php if ($gcountry=='Australia'){echo "selected";}?>>Australia</option>
<option name="Austria" value="Austria" <?php if ($gcountry=='Austria'){echo "selected";}?>>Austria</option>
<option name="Belarus" value="Belarus" <?php if ($gcountry=='Belarus'){echo "selected";}?>>Belarus</option>
<option name="Belgium" value="Belgium" <?php if ($gcountry=='Belgium'){echo "selected";}?>>Belgium</option>
<option name="Bosnia" value="Bosnia" <?php if ($gcountry=='Bosnia'){echo "selected";}?>>Bosnia and Herzegovina</option>
<option name="Brazil" value="Brazil" <?php if ($gcountry=='Brazil'){echo "selected";}?>>Brazil</option>
<option name="Bulgaria" value="Bulgaria" <?php if ($gcountry=='Bulgaria'){echo "selected";}?>>Bulgaria</option>
<option name="Canada" value="Canada" <?php if ($gcountry=='Canada'){echo "selected";}?>>Canada</option>
<option name="Chile" value="Chile" <?php if ($gcountry=='Chile'){echo "selected";}?>>Chile</option>
<option name="China" value="China" <?php if ($gcountry=='China'){echo "selected";}?>>China</option>
<option name="Colombia" value="Colombia" <?php if ($gcountry=='Colombia'){echo "selected";}?>>Colombia</option>
<option name="Croatia" value="Croatia" <?php if ($gcountry=='Croatia'){echo "selected";}?>>Croatia</option>
<option name="Cyprus" value="Cyprus" <?php if ($gcountry=='Cyprus'){echo "selected";}?>>Cyprus</option>
<option name="Czech Republic" value="Czech Republic" <?php if ($gcountry=='Czech Republic'){echo "selected";}?>>Czech Republic</option>
<option name="Denmark" value="Denmark" <?php if ($gcountry=='Denmark'){echo "selected";}?>>Denmark</option>
<option name="Egypt" value="Egypt" <?php if ($gcountry=='Egypt'){echo "selected";}?>>Egypt</option>
<option name="Estonia" value="Estonia" <?php if ($gcountry=='Estonia'){echo "selected";}?>>Estonia</option>
<option name="Finland" value="Finland" <?php if ($gcountry=='Finland'){echo "selected";}?>>Finland</option>
<option name="France" value="France" <?php if ($gcountry=='France'){echo "selected";}?>>France</option>
<option name="FYR Macedonia" value="FYR Macedonia" <?php if ($gcountry=='FYR Macedonia'){echo "selected";}?>>FYR Macedonia</option>
<option name="Georgia" value="Georgia" <?php if ($gcountry=='Georgia'){echo "selected";}?>>Georgia</option>
<option name="Germany" value="Germany" <?php if ($gcountry=='Germany'){echo "selected";}?>>Germany</option>
<option name="Greece" value="Greece" <?php if ($gcountry=='Greece'){echo "selected";}?>>Greece</option>
<option name="Hong Kong" value="Hong Kong" <?php if ($gcountry=='Hong Kong'){echo "selected";}?>>Hong Kong</option>
<option name="Hungary" value="Hungary" <?php if ($gcountry=='Hungary'){echo "selected";}?>>Hungary</option>
<option name="India" value="India" <?php if ($gcountry=='India'){echo "selected";}?>>India</option>
<option name="Indonesia" value="Indonesia" <?php if ($gcountry=='Indonesia'){echo "selected";}?>>Indonesia</option>
<option name="Ireland" value="Ireland" <?php if ($gcountry=='Ireland'){echo "selected";}?>>Ireland</option>
<option name="Israel" value="Israel" <?php if ($gcountry=='Israel'){echo "selected";}?>>Israel</option>
<option name="Italy" value="Italy" <?php if ($gcountry=='Italy'){echo "selected";}?>>Italy</option>
<option name="Japan" value="Japan" <?php if ($gcountry=='Japan'){echo "selected";}?>>Japan</option>
<option name="Latvia" value="Latvia" <?php if ($gcountry=='Latvia'){echo "selected";}?>>Latvia</option>
<option name="Lithuania" value="Lithuania" <?php if ($gcountry=='Lithuania'){echo "selected";}?>>Lithuania</option>
<option name="Malaysia" value="Malaysia" <?php if ($gcountry=='Malaysia'){echo "selected";}?>>Malaysia</option>
<option name="Malta" value="Malta" <?php if ($gcountry=='Malta'){echo "selected";}?>>Malta</option>
<option name="Mexico" value="Mexico" <?php if ($gcountry=='Mexico'){echo "selected";}?>>Mexico</option>
<option name="Montenegro" value="Montenegro" <?php if ($gcountry=='Montenegro'){echo "selected";}?>>Montenegro</option>
<option name="Netherlands" value="Netherlands" <?php if ($gcountry=='Netherlands'){echo "selected";}?>>Netherlands</option>
<option name="New Zealand" value="New Zealand" <?php if ($gcountry=='New Zealand'){echo "selected";}?>>New Zealand</option>
<option name="Norway" value="Norway" <?php if ($gcountry=='Norway'){echo "selected";}?>>Norway</option>
<option name="Peru" value="Peru" <?php if ($gcountry=='Peru'){echo "selected";}?>>Peru</option>
<option name="Philippines" value="Philippines" <?php if ($gcountry=='Philippines'){echo "selected";}?>>Philippines</option>
<option name="Poland" value="Poland" <?php if ($gcountry=='Poland'){echo "selected";}?>>Poland</option>
<option name="Portugal" value="Portugal" <?php if ($gcountry=='Portugal'){echo "selected";}?>>Portugal</option>
<option name="Puerto Rico" value="Puerto Rico" <?php if ($gcountry=='Puerto Rico'){echo "selected";}?>>Puerto Rico</option>
<option name="Romania" value="Romania" <?php if ($gcountry=='Romania'){echo "selected";}?>>Romania</option>
<option name="Russia" value="Russia" <?php if ($gcountry=='Russia'){echo "selected";}?>>Russia</option>
<option name="Serbia" value="Serbia" <?php if ($gcountry=='Serbia'){echo "selected";}?>>Serbia</option>
<option name="Slovakia" value="Slovakia" <?php if ($gcountry=='Slovakia'){echo "selected";}?>>Slovakia</option>
<option name="Slovenia" value="Slovenia" <?php if ($gcountry=='Slovenia'){echo "selected";}?>>Slovenia</option>
<option name="South Korea" value="South Korea" <?php if ($gcountry=='South Korea'){echo "selected";}?>>South Korea</option>
<option name="Spain" value="Spain" <?php if ($gcountry=='Spain'){echo "selected";}?>>Spain</option>
<option name="Sweden" value="Sweden" <?php if ($gcountry=='Sweden'){echo "selected";}?>>Sweden</option>
<option name="Switzerland" value="Switzerland" <?php if ($gcountry=='Switzerland'){echo "selected";}?>>Switzerland</option>
<option name="Thailand" value="Thailand" <?php if ($gcountry=='Thailand'){echo "selected";}?>>Thailand</option>
<option name="Tunisia" value="Tunisia" <?php if ($gcountry=='Tunisia'){echo "selected";}?>>Tunisia</option>
<option name="Turkey" value="Turkey" <?php if ($gcountry=='Turkey'){echo "selected";}?>>Turkey</option>
<option name="Ukraine" value="Ukraine" <?php if ($gcountry=='Ukraine'){echo "selected";}?>>Ukraine</option>
<option name="United Kingdom" value="United Kingdom" <?php if ($gcountry=='United Kingdom'){echo "selected";}?>>United Kingdom</option>
<option name="Uruguay" value="Uruguay" <?php if ($gcountry=='Uruguay'){echo "selected";}?>>Uruguay</option>
<option name="USA" value="USA" <?php if ($gcountry=='USA'){echo "selected";}?>>USA</option>
<option name="Venezuela" value="Venezuela" <?php if ($gcountry=='Venezuela'){echo "selected";}?>>Venezuela</option>
</select>
<input type="submit" value="&nbsp;&raquo;" name="submit1" class="buttonreg">
</form>

<br/><h2><?=$langmark974?></h2><br/>
<?php
if (date("Y-m-d H:i:s") > $KONEC  || !(in_array($country, $countries)) ) {echo "<b>",$langmark1388,"</b>";} else {echo "<b>",$langmark1387,"</b>";}
if (date("Y-m-d H:i:s") > $KONEC) {?>
<br/><br/><h2><?=$langmark176?></h2><br/><table cellspacing="0" cellpadding="0" border="0" width="100%">
<?php
$plok = mysql_query("SELECT users.username AS namejk, users.userid AS idjek, elections.votes AS votejck, elections.reject AS rejeckto FROM elections, users WHERE elections.userid = users.userid AND elections.votes > 0 AND elections.country='$gcountry' ORDER BY elections.votes DESC, users.signed ASC") or die(mysql_error());
$sc=0;
while ($sc < mysql_num_rows($plok)) {
$dzaba = mysql_result($plok,$sc,"idjek");
$antie = mysql_result($plok,$sc,"rejeckto");
if ($dzaba==$userid) {echo "<tr bgcolor=\"#FFCC66\">";} else {echo "<tr>";}
echo "<td width=\"25\">",($sc+1),".</td><td><a href=\"club.php?clubid=",$dzaba,"\">",mysql_result($plok,$sc,"namejk"),"</a></td><td align=\"right\">",mysql_result($plok,$sc,"votejck");
if ($antie==1) {echo "(R)";}
$kl = $kl + $antie;
echo "&nbsp;</td></tr>";
$sc++;
}
echo "</table>";
if ($kl >0) {echo "<br/><i>R = ",$langmark1389,"</i>";}
}

//speeches
if ($speech >0) {
?>
<br/><br/><h2><?=$langmark1390?></h2><br/>
<?php
$puma = mysql_query("SELECT speech FROM elections WHERE country='$where' AND userid ='$speech' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($puma)>0){echo "<i>",mysql_result($puma,0),"</i><br/><br/>[<a href=\"elections.php?where=",$where,"\">",$langmark1391,"</a>]";}

if ($userid==$speech) {
//option to enter speech
?>
<br/><br/><?=$langmark1392?><br/>
<form method="post" action="<?=$_SERVER['PHP_SELF']?>" style="margin: 0">
<textarea rows="4" cols="30" name="scontent" wrap="virtual" class="inputreg"><?=mysql_result($puma,0)?></textarea><br/>
<input type="hidden" value="<?=$where?>" name="drzva">
<input type="submit" value="<?=$langmark534?>" name="form2" class="inputreg"></form>
<?php
}
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