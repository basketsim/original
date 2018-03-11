<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$comparepa = mysql_query("SELECT club, lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($comparepa)) {
$trueclub = mysql_result ($comparepa,0,"club");
$lang = mysql_result ($comparepa,0,"lang");
}
else {die(include 'basketsim.php');}

require("inc/lang/".$lang.".php");
require_once('inc/header.php');
require_once('inc/osnova.php');

$name_input = addslashes(strip_tags($_POST["name_input"]));
$team_id = addslashes(strip_tags($_POST["team_id"]));
$user_name = addslashes(strip_tags($_POST["user_name"]));
$first_name = addslashes(strip_tags($_POST["first_name"]));
$last_name = addslashes(strip_tags($_POST["last_name"]));
$player_id = addslashes(strip_tags($_POST["player_id"]));
$country44 = addslashes(strip_tags($_POST["country"]));
$league_name = addslashes(strip_tags($_POST["league_name"]));
$league_id = addslashes(strip_tags($_POST["league_id"]));
$match_id = addslashes(strip_tags($_POST["match_id"]));
?>

<div id="main">
<h2><?=$langmark634?></h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="54%">

<p><b><?=$langmark635?></b></p>

<form method="post" action="<?php echo $PHP_SELF;?>" style="margin: 0">
<table width="100%" border="0" cellspacing="0" cellpadding="2">
<tr><td width="130"><?=$langmark170?>: </td><td><input type="text" name="name_input" size="10" maxlength="18" value="<?=stripslashes(stripslashes($name_input))?>" class="inputreg"><input type="submit" value="<?=$langmark636?>" name="submit" class="buttonreg"></td></tr>
</form>
<form method="post" action="<?php echo $PHP_SELF;?>" style="margin: 0">
<tr><td width="130"><?=$langmark637?>: </td><td><input type="text" name="team_id" size="10" maxlength="10" value="<?=stripslashes(stripslashes($team_id))?>" class="inputreg"><input type="submit" value="<?=$langmark636?>" name="submit1" class="buttonreg"></td></tr>
</form>
<form method="post" action="<?php echo $PHP_SELF;?>" style="margin: 0">
<tr><td width="130"><?=$langmark660?>: </td><td><input type="text" name="user_name" size="10" maxlength="15" value="<?=stripslashes(stripslashes($user_name))?>" class="inputreg"><input type="submit" value="<?=$langmark636?>" name="submit2" class="buttonreg"></td></tr>
</form>
</table>

<p><b><?=$langmark638?></b></p>

<form method="post" action="<?php echo $PHP_SELF;?>" style="margin: 0">
<table width="100%" border="0" cellspacing="0" cellpadding="2">
<tr><td width="130"><?=$langmark639?>: </td><td><input type="text" name="first_name" size="10" maxlength="15" value="<?=stripslashes(stripslashes($first_name))?>" class="inputreg"></td></tr>
<tr><td width="130"><?=$langmark640?>: </td><td><input type="text" name="last_name" size="10" maxlength="15" value="<?=stripslashes(stripslashes($last_name))?>" class="inputreg"><input type="submit" value="<?=$langmark636?>" name="submit3" class="buttonreg">
<!--&nbsp;<a href="search.php?action=explain"><img src="img/qm.gif" title="You can use Search only accepts English characters, if you're searching for player with ćšža*öüa- or similar characters in his name, replace a string of characters with %. For example, if you search for Ale%, players with names starting with Ale (like Alexander or Aleš) are displayed. You can also use % in the beginning of the name." alt="info" border="0"></a>-->
<?php
$action=$_GET["action"];
if ($action=='explain') {
?>
</td></tr><tr><td colspan="3"><hr/ ><i>Search only accepts English characters, if you're searching for player with ćšža*öüa- or similar characters in his name, replace a string of characeters with %. For example, if you search for Ale%, players with names starting with Ale (like Alexander or Aleš) are displayed. You can also use % in the beggining of the name.</i><hr/>
<?php
}
?>
</td></tr>
</form>
<form method="post" action="<?php echo $PHP_SELF;?>" style="margin: 0">
<tr><td width="130"><?=$langmark641?>: </td><td><input type="text" name="player_id" size="10" maxlength="12" value="<?=stripslashes(stripslashes($player_id))?>" class="inputreg"><input type="submit" value="<?=$langmark636?>" name="submit4" class="buttonreg"></td></tr>
</form>
</table>

<p><b><?=$langmark642?></b></p>
<?php if (!$country44) {$country44 = $_GET['goto'];}?>
<form method="post" action="<?php echo $PHP_SELF;?>" style="margin: 0">
<table width="100%" border="0" cellspacing="0" cellpadding="2">
<tr><td width="130"><?=$langmark114?>:</td><td>
<select name="country" class="inputreg">
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
<option name="" value=""><?=$langmark643?></option>
</td></tr><tr><td width="130"><?=$langmark644?>: </td><td><input type="text" name="league_name" size="10" maxlength="8" value="<?=stripslashes(stripslashes($league_name))?>" class="inputreg"><input type="submit" value="<?=$langmark636?>" name="submit5" class="buttonreg"></td></tr>
</form>
<form method="post" action="<?php echo $PHP_SELF;?>" style="margin: 0">
<tr><td width="130"><?=$langmark645?>: </td><td><input type="text" name="league_id" size="10" maxlength="8" value="<?=stripslashes(stripslashes($league_id))?>" class="inputreg"><input type="submit" value="<?=$langmark636?>" name="submit6" class="buttonreg"></td></tr>
</form>
</table>

<p><b><?=$langmark646?></b></p>

<form method="post" action="<?php echo $PHP_SELF;?>" style="margin: 0">
<table width="100%" border="0" cellspacing="0" cellpadding="2">
<tr><td width="130"><?=$langmark647?>: </td><td><input type="text" name="match_id" size="10" maxlength="12" value="<?=stripslashes(stripslashes($match_id))?>" class="inputreg"><input type="submit" value="<?=$langmark636?>" name="submit7" class="buttonreg"></td></tr>
</form>
</table>

</td><td class="border" width="46%">

<h2><?=$langmark650?></h2><br/>

<?php
if (isset($_POST['submit'])) {
$team_name_r = mysql_query("SELECT teamid, curname FROM competition WHERE season=$default_season AND curname LIKE '$name_input%' LIMIT 50") or die(mysql_error());
$num = mysql_num_rows($team_name_r);
if ($num < 1 OR !$name_input) {die("<i>$langmark651</i></td></tr></table>");}
$b=0;
while ($b < $num) {
$teamid=mysql_result($team_name_r,$b,"teamid");
$name=mysql_result($team_name_r,$b,"curname");
echo "<a href=\"redirect.php?teamid=",$teamid,"\">",stripslashes($name),"</a><br/>";
$b++;
}
}

if (isset($_POST['submit1'])) { 
$team_id = trim($team_id);
if (!is_numeric($team_id)){die("<i>$langmark652</i></td></tr></table>");}
$team_id_r = mysql_query("SELECT teamid, curname FROM competition WHERE season=$default_season AND teamid ='$team_id' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($team_id_r) < 1) {die("<i>$langmark653</i></td></tr></table>");}
$teamid=mysql_result($team_id_r,0,"teamid");
$name=mysql_result($team_id_r,0,"curname");
echo "<a href=\"redirect.php?teamid=",$team_id,"\">",stripslashes($name),"</a>";
}

if (isset($_POST['submit2'])) { 
$user_name_r = mysql_query("SELECT userid, username FROM users WHERE username LIKE '$user_name%' LIMIT 50") or die(mysql_error());
$num_u = mysql_num_rows($user_name_r);
if ($num_u < 1 OR !$user_name) {die("<i>$langmark654</i></td></tr></table>");}
$u=0;
while ($u < $num_u) {
$userid=mysql_result($user_name_r,$u,"userid");
$username=mysql_result($user_name_r,$u,"username");
echo "<a href=\"club.php?clubid=",$userid,"\">",$username,"</a><br/>";
$u++;
}
}

if (isset($_POST['submit3'])) {

$first_name=str_replace("Ç","&Ccedil;",$first_name);
$last_name=str_replace("Ç","&Ccedil;",$last_name);
$first_name=str_replace("ç","&ccedil;",$first_name);
$last_name=str_replace("ç","&ccedil;",$last_name);
$first_name=str_replace("Ë","&Euml;",$first_name);
$last_name=str_replace("Ë","&Euml;",$last_name);
$first_name=str_replace("ë","&euml;",$first_name);
$last_name=str_replace("ë","&euml;",$last_name);
$first_name=str_replace("À","&Agrave;",$first_name);
$last_name=str_replace("À","&Agrave;",$last_name);
$first_name=str_replace("à","&agrave;",$first_name);
$last_name=str_replace("à","&agrave;",$last_name);
$first_name=str_replace("È","&Egrave;",$first_name);
$last_name=str_replace("È","&Egrave;",$last_name);
$first_name=str_replace("è","&egrave;",$first_name);
$last_name=str_replace("è","&egrave;",$last_name);
$first_name=str_replace("É","&Eacute;",$first_name);
$last_name=str_replace("É","&Eacute;",$last_name);
$first_name=str_replace("é","&eacute;",$first_name);
$last_name=str_replace("é","&eacute;",$last_name);
$first_name=str_replace("Í","&Iacute;",$first_name);
$last_name=str_replace("Í","&Iacute;",$last_name);
$first_name=str_replace("í","&iacute;",$first_name);
$last_name=str_replace("í","&iacute;",$last_name);
$first_name=str_replace("Ï","&Iuml;",$first_name);
$last_name=str_replace("Ï","&Iuml;",$last_name);
$first_name=str_replace("ï","&iuml;",$first_name);
$last_name=str_replace("ï","&iuml;",$last_name);
$first_name=str_replace("Ò","&Ograve;",$first_name);
$last_name=str_replace("Ò","&Ograve;",$last_name);
$first_name=str_replace("ò","&ograve;",$first_name);
$last_name=str_replace("ò","&ograve;",$last_name);
$first_name=str_replace("Ó","&Oacute;",$first_name);
$last_name=str_replace("Ó","&Oacute;",$last_name);
$first_name=str_replace("ó","&oacute;",$first_name);
$last_name=str_replace("ó","&oacute;",$last_name);
$first_name=str_replace("Ú","&Uacute;",$first_name);
$last_name=str_replace("Ú","&Uacute;",$last_name);
$first_name=str_replace("ú","&uacute;",$first_name);
$last_name=str_replace("ú","&uacute;",$last_name);
$first_name=str_replace("Ü","&Uuml;",$first_name);
$last_name=str_replace("Ü","&Uuml;",$last_name);
$first_name=str_replace("ü","&uuml;",$first_name);
$last_name=str_replace("ü","&uuml;",$last_name);
$first_name=str_replace("ª","&ordf;",$first_name);
$last_name=str_replace("ª","&ordf;",$last_name);
$first_name=str_replace("º","&ordm;",$first_name);
$last_name=str_replace("º","&ordm;",$last_name);
$first_name=str_replace("·","&middot;",$first_name);
$last_name=str_replace("·","&middot;",$last_name);
$first_name=str_replace("Ć","&#262;",$first_name);
$last_name=str_replace("Ć","&#262;",$last_name);
$first_name=str_replace("ć","&#263;",$first_name);
$last_name=str_replace("ć","&#263;",$last_name);
$first_name=str_replace("Č","&#268;",$first_name);
$last_name=str_replace("Č","&#268;",$last_name);
$first_name=str_replace("č","&#269;",$first_name);
$last_name=str_replace("č","&#269;",$last_name);
$first_name=str_replace("Đ","&#272;",$first_name);
$last_name=str_replace("Đ","&#272;",$last_name);
$first_name=str_replace("đ","&#273;",$first_name);
$last_name=str_replace("đ","&#273;",$last_name);
$first_name=str_replace("Š","&#352;",$first_name);
$last_name=str_replace("Š","&#352;",$last_name);
$first_name=str_replace("š","&#353;",$first_name);
$last_name=str_replace("š","&#353;",$last_name);
$first_name=str_replace("Ž","&#381;",$first_name);
$last_name=str_replace("Ž","&#381;",$last_name);
$first_name=str_replace("ž","&#382;",$first_name);
$last_name=str_replace("ž","&#382;",$last_name);
$first_name=str_replace("Á","&Aacute;",$first_name);
$last_name=str_replace("Á","&Aacute;",$last_name);
$first_name=str_replace("á","&aacute;",$first_name);
$last_name=str_replace("á","&aacute;",$last_name);
$first_name=str_replace("Ď","&#270;",$first_name);
$last_name=str_replace("Ď","&#270;",$last_name);
$first_name=str_replace("ď","&#271;",$first_name);
$last_name=str_replace("ď","&#271;",$last_name);
$first_name=str_replace("Ě","&#282;",$first_name);
$last_name=str_replace("Ě","&#282;",$last_name);
$first_name=str_replace("ě","&#283;",$first_name);
$last_name=str_replace("ě","&#283;",$last_name);
$first_name=str_replace("Ň","&#327;",$first_name);
$last_name=str_replace("Ň","&#327;",$last_name);
$first_name=str_replace("ň","&#328;",$first_name);
$last_name=str_replace("ň","&#328;",$last_name);
$first_name=str_replace("Ř","&#344;",$first_name);
$last_name=str_replace("Ř","&#344;",$last_name);
$first_name=str_replace("ř","&#345;",$first_name);
$last_name=str_replace("ř","&#345;",$last_name);
$first_name=str_replace("Ť","&#356;",$first_name);
$last_name=str_replace("Ť","&#356;",$last_name);
$first_name=str_replace("ť","&#357;",$first_name);
$last_name=str_replace("ť","&#357;",$last_name);
$first_name=str_replace("Ů","&#366;",$first_name);
$last_name=str_replace("Ů","&#366;",$last_name);
$first_name=str_replace("ů","&#367;",$first_name);
$last_name=str_replace("ů","&#367;",$last_name);
$first_name=str_replace("Ý","&Yacute;",$first_name);
$last_name=str_replace("Ý","&Yacute;",$last_name);
$first_name=str_replace("ý","&yacute;",$first_name);
$last_name=str_replace("ý","&yacute;",$last_name);
$first_name=str_replace("Æ","&AElig;",$first_name);
$last_name=str_replace("Æ","&AElig;",$last_name);
$first_name=str_replace("æ","&aelig;",$first_name);
$last_name=str_replace("æ","&aelig;",$last_name);
$first_name=str_replace("Ø","&Oslash;",$first_name);
$last_name=str_replace("Ø","&Oslash;",$last_name);
$first_name=str_replace("ø","&oslash;",$first_name);
$last_name=str_replace("ø","&oslash;",$last_name);
$first_name=str_replace("Å","&Aring;",$first_name);
$last_name=str_replace("Å","&Aring;",$last_name);
$first_name=str_replace("å","&aring;",$first_name);
$last_name=str_replace("å","&aring;",$last_name);
$first_name=str_replace("Ä","&Auml;",$first_name);
$last_name=str_replace("Ä","&Auml;",$last_name);
$first_name=str_replace("ä","&auml;",$first_name);
$last_name=str_replace("ä","&auml;",$last_name);
$first_name=str_replace("Ö","&Ouml;",$first_name);
$last_name=str_replace("Ö","&Ouml;",$last_name);
$first_name=str_replace("ö","&ouml;",$first_name);
$last_name=str_replace("ö","&ouml;",$last_name);
$first_name=str_replace("Õ","&Otilde;",$first_name);
$last_name=str_replace("Õ","&Otilde;",$last_name);
$first_name=str_replace("õ","&otilde;",$first_name);
$last_name=str_replace("õ","&otilde;",$last_name);
$first_name=str_replace("Ð","&ETH;",$first_name);
$last_name=str_replace("Ð","&ETH;",$last_name);
$first_name=str_replace("ð","&eth;",$first_name);
$last_name=str_replace("ð","&eth;",$last_name);
$first_name=str_replace("Â","&Acirc;",$first_name);
$last_name=str_replace("Â","&Acirc;",$last_name);
$first_name=str_replace("â","&acirc;",$first_name);
$last_name=str_replace("â","&acirc;",$last_name);
$first_name=str_replace("Ê","&Ecirc;",$first_name);
$last_name=str_replace("Ê","&Ecirc;",$last_name);
$first_name=str_replace("ê","&ecirc;",$first_name);
$last_name=str_replace("ê","&ecirc;",$last_name);
$first_name=str_replace("Î","&Icirc;",$first_name);
$last_name=str_replace("Î","&Icirc;",$last_name);
$first_name=str_replace("î","&icirc;",$first_name);
$last_name=str_replace("î","&icirc;",$last_name);
$first_name=str_replace("Ô","&Ocirc;",$first_name);
$last_name=str_replace("Ô","&Ocirc;",$last_name);
$first_name=str_replace("ô","&ocirc;",$first_name);
$last_name=str_replace("ô","&ocirc;",$last_name);
$first_name=str_replace("Œ","&OElig;",$first_name);
$last_name=str_replace("Œ","&OElig;",$last_name);
$first_name=str_replace("œ","&oelig;",$first_name);
$last_name=str_replace("œ","&oelig;",$last_name);
$first_name=str_replace("Ù","&Ugrave;",$first_name);
$last_name=str_replace("Ù","&Ugrave;",$last_name);
$first_name=str_replace("ù","&ugrave;",$first_name);
$last_name=str_replace("ù","&ugrave;",$last_name);
$first_name=str_replace("Û","&Ucirc;",$first_name);
$last_name=str_replace("Û","&Ucircg;",$last_name);
$first_name=str_replace("û","&ucirc;",$first_name);
$last_name=str_replace("û","&ucirc;",$last_name);
$first_name=str_replace("Ÿ","&#376;",$first_name);
$last_name=str_replace("Ÿ","&#376;",$last_name);
$first_name=str_replace("ÿ","&yuml;",$first_name);
$last_name=str_replace("ÿ","&yuml;",$last_name);
$first_name=str_replace("ß","&szlig;",$first_name);
$last_name=str_replace("ß","&szlig;",$last_name);
$first_name=str_replace("Ő","&#336;",$first_name);
$last_name=str_replace("Ő","&#336;",$last_name);
$first_name=str_replace("ő","&#337;",$first_name);
$last_name=str_replace("ő","&#337;",$last_name);
$first_name=str_replace("Ű","&#368;",$first_name);
$last_name=str_replace("Ű","&#368;",$last_name);
$first_name=str_replace("ű","&#369;",$first_name);
$last_name=str_replace("ű","&#369;",$last_name);
$first_name=str_replace("Þ","&THORN;",$first_name);
$last_name=str_replace("Þ","&THORN;",$last_name);
$first_name=str_replace("þ","&thorn;",$first_name);
$last_name=str_replace("þ","&thorn;",$last_name);
$first_name=str_replace("Ì","&Igrave;",$first_name);
$last_name=str_replace("Ì","&Igrave;",$last_name);
$first_name=str_replace("ì","&igrave;",$first_name);
$last_name=str_replace("ì","&igrave;",$last_name);
$first_name=str_replace("Ā","&#256;",$first_name);
$last_name=str_replace("Ā","&#256;",$last_name);
$first_name=str_replace("ā","&#257;",$first_name);
$last_name=str_replace("ā","&#257;",$last_name);
$first_name=str_replace("Ē","&#274;",$first_name);
$last_name=str_replace("Ē","&#274;",$last_name);
$first_name=str_replace("ē","&#275;",$first_name);
$last_name=str_replace("ē","&#275;",$last_name);
$first_name=str_replace("Ģ","&#290;",$first_name);
$last_name=str_replace("Ģ","&#290;",$last_name);
$first_name=str_replace("ģ","&#291;",$first_name);
$last_name=str_replace("ģ","&#291;",$last_name);
$first_name=str_replace("Ī","&#298;",$first_name);
$last_name=str_replace("Ī","&#298;",$last_name);
$first_name=str_replace("ī","&#299;",$first_name);
$last_name=str_replace("ī","&#299;",$last_name);
$first_name=str_replace("Ķ","&#310;",$first_name);
$last_name=str_replace("Ķ","&#310;",$last_name);
$first_name=str_replace("ķ","&#311;",$first_name);
$last_name=str_replace("ķ","&#311;",$last_name);
$first_name=str_replace("Ļ,","&#315;",$first_name);
$last_name=str_replace("Ļ,","&#315;",$last_name);
$first_name=str_replace("ļ","&#316;",$first_name);
$last_name=str_replace("ļ","&#316;",$last_name);
$first_name=str_replace("Ņ","&#325;",$first_name);
$last_name=str_replace("Ņ","&#325;",$last_name);
$first_name=str_replace("ņ","&#326;",$first_name);
$last_name=str_replace("ņ","&#326;",$last_name);
$first_name=str_replace("Ŗ,","&#342;",$first_name);
$last_name=str_replace("Ŗ,","&#342;",$last_name);
$first_name=str_replace("ŗ","&#343;",$first_name);
$last_name=str_replace("ŗ","&#343;",$last_name);
$first_name=str_replace("Ū","&#362;",$first_name);
$last_name=str_replace("Ū","&#362;",$last_name);
$first_name=str_replace("ū","&#363;",$first_name);
$last_name=str_replace("ū","&#363;",$last_name);
$first_name=str_replace("Ą","&#260;",$first_name);
$last_name=str_replace("Ą","&#260;",$last_name);
$first_name=str_replace("ą","&#261;",$first_name);
$last_name=str_replace("ą","&#261;",$last_name);
$first_name=str_replace("Ę","&#280;",$first_name);
$last_name=str_replace("Ę","&#280;",$last_name);
$first_name=str_replace("ę","&#281;",$first_name);
$last_name=str_replace("ę","&#281;",$last_name);
$first_name=str_replace("Ł","&#321;",$first_name);
$last_name=str_replace("Ł","&#321;",$last_name);
$first_name=str_replace("ł","&#322;",$first_name);
$last_name=str_replace("ł","&#322;",$last_name);
$first_name=str_replace("Ń","&#323;",$first_name);
$last_name=str_replace("Ń","&#323;",$last_name);
$first_name=str_replace("ń","&#324;",$first_name);
$last_name=str_replace("ń","&#324;",$last_name);
$first_name=str_replace("Ś","&#346;",$first_name);
$last_name=str_replace("Ś","&#346;",$last_name);
$first_name=str_replace("ś","&#347;",$first_name);
$last_name=str_replace("ś","&#347;",$last_name);
$first_name=str_replace("Ź","&#377;",$first_name);
$last_name=str_replace("Ź","&#377;",$last_name);
$first_name=str_replace("ź","&#378;",$first_name);
$last_name=str_replace("ź","&#378;",$last_name);
$first_name=str_replace("Ż","&#379;",$first_name);
$last_name=str_replace("Ż","&#379;",$last_name);
$first_name=str_replace("ż","&#380;",$first_name);
$last_name=str_replace("ż","&#380;",$last_name);
$first_name=str_replace("Ã","&Atilde;",$first_name);
$last_name=str_replace("Ã","&Atilde;",$last_name);
$first_name=str_replace("ã","&atilde;",$first_name);
$last_name=str_replace("ã","&atilde;",$last_name);
$first_name=str_replace("Ă","&#258;",$first_name);
$last_name=str_replace("Ă","&#258;",$last_name);
$first_name=str_replace("ă","&#259;",$first_name);
$last_name=str_replace("ă","&#259;",$last_name);
$first_name=str_replace("Ş","&#350;",$first_name);
$last_name=str_replace("Ş","&#350;",$last_name);
$first_name=str_replace("ş","&#351;",$first_name);
$last_name=str_replace("ş","&#351;",$last_name);
$first_name=str_replace("Ţ","&#354;",$first_name);
$last_name=str_replace("Ţ","&#354;",$last_name);
$first_name=str_replace("ţ","&#355;",$first_name);
$last_name=str_replace("ţ","&#355;",$last_name);
$first_name=str_replace("Ĺ","&#313;",$first_name);
$last_name=str_replace("Ĺ","&#313;",$last_name);
$first_name=str_replace("ĺ","&#314;",$first_name);
$last_name=str_replace("ĺ","&#314;",$last_name);
$first_name=str_replace("Ľ","&#317;",$first_name);
$last_name=str_replace("Ľ","&#317;",$last_name);
$first_name=str_replace("ľ","&#318;",$first_name);
$last_name=str_replace("ľ","&#318;",$last_name);
$first_name=str_replace("Ŕ","&#340;",$first_name);
$last_name=str_replace("Ŕ","&#340;",$last_name);
$first_name=str_replace("ŕ","&#341;",$first_name);
$last_name=str_replace("ŕ","&#341;",$last_name);
$first_name=str_replace("Ñ","&Ntilde;",$first_name);
$last_name=str_replace("Ñ","&Ntilde;",$last_name);
$first_name=str_replace("ñ","&ntilde;",$first_name);
$last_name=str_replace("ñ","&ntilde;",$last_name);
$first_name=str_replace("¡","&iexcl;",$first_name);
$last_name=str_replace("¡","&iexcl;",$last_name);
$first_name=str_replace("¿","&iquest;",$first_name);
$last_name=str_replace("¿","&iquest;",$last_name);
$first_name=str_replace("Ğ","&#286;",$first_name);
$last_name=str_replace("Ğ","&#286;",$last_name);
$first_name=str_replace("ğ","&#287;",$first_name);
$last_name=str_replace("ğ","&#287;",$last_name);
$first_name=str_replace("İ","&#304;",$first_name);
$last_name=str_replace("İ","&#304;",$last_name);
$first_name=str_replace("ı","&#305;",$first_name);
$last_name=str_replace("ı","&#305;",$last_name);
$first_name=str_replace("€","&euro;",$first_name);
$last_name=str_replace("€","&euro;",$last_name);
$first_name=str_replace("«","&laquo;",$first_name);
$last_name=str_replace("«","&laquo;",$last_name);
$first_name=str_replace("»","&raquo;",$first_name);
$last_name=str_replace("»","&raquo;",$last_name);
$first_name=str_replace("•","&bull;",$first_name);
$last_name=str_replace("•","&bull;",$last_name);
$first_name=str_replace("†","&dagger;",$first_name);
$last_name=str_replace("†","&dagger;",$last_name);
$first_name=str_replace("©","&copy;",$first_name);
$last_name=str_replace("©","&copy;",$last_name);
$first_name=str_replace("®","&reg;",$first_name);
$last_name=str_replace("®","&reg;",$last_name);
$first_name=str_replace("°","&deg;",$first_name);
$last_name=str_replace("°","&deg;",$last_name);
$first_name=str_replace("µ","&micro;",$first_name);
$last_name=str_replace("µ","&micro;",$last_name);
$first_name=str_replace("·","&middot;",$first_name);
$last_name=str_replace("·","&middot;",$last_name);
$first_name=str_replace("–","&ndash;",$first_name);
$last_name=str_replace("–","&ndash;",$last_name);
$first_name=str_replace("—","&mdash;",$first_name);
$last_name=str_replace("—","&mdash;",$last_name);
$first_name=str_replace("№","&#8470;",$first_name);
$last_name=str_replace("№","&#8470;",$last_name);
$first_name=str_replace("'","&rsquo;",$first_name);
$last_name=str_replace("'","&rsquo;",$last_name);

$playersearch = mysql_query("SELECT id, name, surname FROM players WHERE name LIKE '$first_name%' AND surname LIKE '$last_name%' LIMIT 50") or die(mysql_error());
$num_pl = mysql_num_rows($playersearch);
if ($num_pl < 1 OR (!$first_name AND !$last_name)){die("<i>$langmark655</i></td></tr></table>");}
$j=0;
while ($j < $num_pl) {
$id=mysql_result($playersearch,$j,"id");
$name=mysql_result($playersearch,$j,"name");
$surname=mysql_result($playersearch,$j,"surname");
echo "<a href=\"player.php?playerid=",$id,"\">",$name," ",$surname,"</a><br/>";
$j++;
}
}

if (isset($_POST['submit4'])) {
$player_id = trim($player_id);
if (!is_numeric($player_id)){die("<i>$langmark656</i></td></tr></table>");}
$playersearch = mysql_query("SELECT id, name, surname FROM players WHERE id ='$player_id' LIMIT 1") or die(mysql_error());
$num_pl = mysql_num_rows($playersearch);
if ($num_pl < 1){die("<i>$langmark655</i></td></tr></table>");}
$id=mysql_result($playersearch,0,"id");
$name=mysql_result($playersearch,0,"name");
$surname=mysql_result($playersearch,0,"surname");
echo "<a href=\"player.php?playerid=",$id,"\">",$name," ",$surname,"</a><br/>";
}

if (isset($_POST['submit5'])) { 
$leaguesearch = mysql_query("SELECT leagueid, name, country FROM leagues WHERE active=1 AND country LIKE '%$country44%' AND name LIKE '$league_name%' LIMIT 50") or die(mysql_error());
$num_l = mysql_num_rows($leaguesearch);
if ($num_l < 1){die("<i>$langmark657</i></td></tr></table>");}
$k=0;
while ($k < $num_l) {
$leagueid=mysql_result($leaguesearch,$k,"leagueid");
$name=mysql_result($leaguesearch,$k,"name");
$country44=mysql_result($leaguesearch,$k,"country");
echo "<a href=leagues.php?leagueid=",$leagueid,">",$name," (",$country44,")</a><br/>";
$k++;
}
}

if (isset($_POST['submit6'])) {
$league_id = trim($league_id);
if (!is_numeric($league_id)){die("<i>$langmark658</i></td></tr></table>");}
$leaguesearch = mysql_query("SELECT leagueid, name, country FROM leagues WHERE active=1 AND leagueid = $league_id LIMIT 1") or die(mysql_error());
$num_pl = mysql_num_rows($leaguesearch);
if ($num_pl < 1){die("<i>$langmark657</i></td></tr></table>");}
$id=mysql_result($leaguesearch,0,"leagueid");
$name=mysql_result($leaguesearch,0,"name");
$country44=mysql_result($leaguesearch,0,"country");
echo "<a href=leagues.php?leagueid=",$id,">",$name," (",$country44,")</a><br/>";
}

if (isset($_POST['submit7'])) {
$match_id = trim($match_id);
if (!is_numeric($match_id)){die("<i>$langmark659</i></td></tr></table>");}
$matchsearch = mysql_query("SELECT * FROM matches WHERE matchid ='$match_id' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($matchsearch) < 1){die("<i>$langmark325</i></td></tr></table>");}
echo "<a href=prikaz.php?matchid=",$match_id,">",$match_id,"</a><br/>";
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