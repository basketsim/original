<?php
$expandmenu1=499;

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT club, lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)) {$lang = mysql_result ($compare,0,"lang");} else {die(include 'basketsim.php');}

$country44 = $_POST["country"];
if (!$country44){$country44 = $_GET["country"];}
if ($country44=='Bosnia and Herzegovina') {$country44='Bosnia';}
if (!$country44){
$trueclub = mysql_result($compare,0,"club");
$scountry = mysql_query("SELECT country FROM teams WHERE teamid ='$trueclub' LIMIT 1") or die(mysql_error());
$country44 = mysql_result($scountry,0);
}

$num=0;
//$result = mysql_query("SELECT leagueid, name, level FROM leagues WHERE `level` < 4 AND country ='$country44' ORDER BY `leagueid` ASC") or die(mysql_error());
$result = mysql_query("SELECT leagueid, name, level FROM leagues WHERE country ='$country44' LIMIT 13") or die(mysql_error());
$num=mysql_num_rows($result);
if ($num==0) {die(include 'index.php');}

$zmagal = mysql_query("SELECT * FROM `history` WHERE `won` =1 AND (`h_type` =5 OR `h_type` =6 OR `h_type` =7 OR `h_type` =19) AND `h_country`='$country44' ORDER BY `history_id` ASC") or die(mysql_error());
$bunr = mysql_num_rows($zmagal);

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2><?=$langmark238?> >> <?=$country44?></h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="46%">

<?php
while ($i=mysql_fetch_array($result)) {
$leagueid=$i["leagueid"];
$name=$i["name"];
$level=$i["level"];
if ($level==1) {echo "<table border=\"0\"><td><a href=\"leagues.php?leagueid=",$leagueid,"\">".$name." (level ".$level.")</a></td></table>";}
if ($level==2) {echo "<table border=\"0\"><td width=\"35\"> </td><td><a href=\"leagues.php?leagueid=",$leagueid,"\">".$name." (level ".$level.")</a></td></table>";}
if ($level==3) {echo "<table border=\"0\"><td width=\"70\"> </td><td><a href=\"leagues.php?leagueid=",$leagueid,"\">".$name." (level ".$level.")</a></td></table>";}
}

if ($country44 == 'Argentina') {$localname='Argentina'; $tnumber=182; $date1="21.45 (".$langmark751.")"; $date2="21.45 (".$langmark754.")";}
elseif ($country44 == 'Australia') {$localname='Australia'; $tnumber=182; $date1="09.00 (".$langmark751.")"; $date2="07.30 (".$langmark754.")";}
elseif ($country44 == 'Belarus') {$localname='Belarus'; $tnumber=182; $date1="11.15 (".$langmark751.")"; $date2="18.00 (".$langmark754.")";}
elseif ($country44 == 'Belgium') {$localname='Belgium'; $tnumber=182; $date1="12.30 (".$langmark751.")"; $date2="15.00 (".$langmark754.")";}
elseif ($country44 == 'Bosnia') {$localname='Bosna i Hercegovina'; $tnumber=560; $date1="13.00 (".$langmark751.")"; $date2="20.30 (".$langmark754.")";}
elseif ($country44 == 'Brazil') {$localname='Brasil'; $tnumber=182; $date1="23.00 (".$langmark751.")"; $date2="23.00 (".$langmark754.")";}
elseif ($country44 == 'Bulgaria') {$localname='Bulgaria'; $tnumber=182; $date1="15.00 (".$langmark752.")"; $date2="19.30 (".$langmark753.")";}
elseif ($country44 == 'Canada') {$localname='Canada'; $tnumber=182; $date1="23.30 (".$langmark752.")"; $date2="23.00 (".$langmark753.")";}
elseif ($country44 == 'Chile') {$localname='Chile'; $tnumber=182; $date1="23.30 (".$langmark751.")"; $date2="23.30 (".$langmark754.")";}
elseif ($country44 == 'China') {$localname='China'; $tnumber=182; $date1="08.30 (".$langmark752.")"; $date2="09.30 (".$langmark753.")";}
elseif ($country44 == 'Colombia') {$localname='Colombia'; $tnumber=182; $date1="00.30 (".$langmark254.")"; $date2="00.30 (".$langmark256.")";}
elseif ($country44 == 'Montenegro') {$localname='Crna Gora'; $tnumber=182; $date1="11.30 (".$langmark752.")"; $date2="12.00 (".$langmark753.")";}
elseif ($country44 == 'Cyprus') {$localname='Cyprus'; $tnumber=182; $date1="10.00 (".$langmark751.")"; $date2="13.15 (".$langmark753.")";}
elseif ($country44 == 'Czech Republic') {$localname='&#268;esk&aacute; republika'; $tnumber=182; $date1="12.00 (".$langmark751.")"; $date2="15.30 (".$langmark754.")";}
elseif ($country44 == 'Denmark') {$localname='Danmark'; $tnumber=182; $date1="21.00 (".$langmark752.")"; $date2="19.30 (".$langmark754.")";}
elseif ($country44 == 'Germany') {$localname='Deutschland'; $tnumber=182; $date1="18.30 (".$langmark752.")"; $date2="16.15 (".$langmark753.")";}
elseif ($country44 == 'Estonia') {$localname='Eesti'; $tnumber=560; $date1="14.00 (".$langmark751.")"; $date2="12.00 (".$langmark754.")";}
elseif ($country44 == 'Egypt') {$localname='Miṣr'; $tnumber=182; $date1="09:00 (".$langmark752.")"; $date2="17.30 (".$langmark753.")";}
elseif ($country44 == 'Spain') {$localname='Espa&#241;a'; $tnumber=560; $date1="21.30 (".$langmark752.")"; $date2="11.00 (".$langmark753.")";}
elseif ($country44 == 'France') {$localname='France'; $tnumber=182; $date1="20.00 (".$langmark752.")"; $date2="15.30 (".$langmark753.")";}
elseif ($country44 == 'Greece') {$localname='Hellas'; $tnumber=1694; $date1="16.40 (".$langmark752.")"; $date2="10.00 (".$langmark753.")";}
elseif ($country44 == 'Hong Kong') {$localname='Hong Kong'; $tnumber=182; $date1="07.30 (".$langmark751.")"; $date2="07.30 (".$langmark753.")";}
elseif ($country44 == 'Croatia') {$localname='Hrvatska'; $tnumber=182; $date1="20.45 (".$langmark751.")"; $date2="19.15 (".$langmark754.")";}
elseif ($country44 == 'India') {$localname='India'; $tnumber=182; $date1="11.00 (".$langmark751.")"; $date2="09.00 (".$langmark753.")";}
elseif ($country44 == 'Indonesia') {$localname='Indonesia'; $tnumber=182; $date1="06.30 (".$langmark752.")"; $date2="07.00 (".$langmark754.")";}
elseif ($country44 == 'Ireland') {$localname='Ireland'; $tnumber=182; $date1="21.15 (".$langmark751.")"; $date2="21.20 (".$langmark754.")";}
elseif ($country44 == 'Israel') {$localname='Israel'; $tnumber=182; $date1="19.00 (".$langmark751.")"; $date2="16.00 (".$langmark754.")";}
elseif ($country44 == 'Italy') {$localname='Italia'; $tnumber=560; $date1="12.30 (".$langmark752.")"; $date2="18.00 (".$langmark753.")";}
elseif ($country44 == 'Latvia') {$localname='Latvija'; $tnumber=560; $date1="10.30 (".$langmark752.")"; $date2="13.30 (".$langmark754.")";}
elseif ($country44 == 'Lithuania') {$localname='Lietuva'; $tnumber=560; $date1="17.45 (".$langmark752.")"; $date2="13.45 (".$langmark753.")";}
elseif ($country44 == 'Hungary') {$localname='Magyarorsz&aacute;g'; $tnumber=182; $date1="20.30 (".$langmark752.")"; $date2="20.30 (".$langmark753.")";}
elseif ($country44 == 'FYR Macedonia') {$localname='Makedonija'; $tnumber=182; $date1="17.30 (".$langmark751.")"; $date2="19.00 (".$langmark754.")";}
elseif ($country44 == 'Malaysia') {$localname='Malaysia'; $tnumber=182; $date1="07.00 (".$langmark751.")"; $date2="07.00 (".$langmark753.")";}
elseif ($country44 == 'Malta') {$localname='Malta'; $tnumber=182; $date1="14.30 (".$langmark751.")"; $date2="16.30 (".$langmark754.")";}
elseif ($country44 == 'Mexico') {$localname='M&eacute;xico'; $tnumber=182; $date1="23.00 (".$langmark752.")"; $date2="23.30 (".$langmark753.")";}
elseif ($country44 == 'Netherlands') {$localname='Nederland'; $tnumber=182; $date1="20.15 (".$langmark751.")"; $date2="20.00 (".$langmark754.")";}
elseif ($country44 == 'New Zealand') {$localname='New Zealand'; $tnumber=182; $date1="07.30 (".$langmark752.")"; $date2="06.30 (".$langmark754.")";}
elseif ($country44 == 'Japan') {$localname='Nippon'; $tnumber=182; $date1="08.30 (".$langmark751.")"; $date2="08.30 (".$langmark754.")";}
elseif ($country44 == 'Norway') {$localname='Norge'; $tnumber=182; $date1="15.15 (".$langmark752.")"; $date2="15.45 (".$langmark754.")";}
elseif ($country44 == 'Austria') {$localname='&Ouml;sterreich'; $tnumber=182; $date1="19.00 (".$langmark752.")"; $date2="16.45 (".$langmark753.")";}
elseif ($country44 == 'Peru') {$localname='Per&uacute;'; $tnumber=182; $date1="23.45 (".$langmark752.")"; $date2="00.30 (".$langmark754.")";}
elseif ($country44 == 'Philippines') {$localname='Pilipinas'; $tnumber=182; $date1="07.00 (".$langmark752.")"; $date2="06.00 (".$langmark754.")";}
elseif ($country44 == 'Poland') {$localname='Polska'; $tnumber=560; $date1="10.30 (".$langmark751.")"; $date2="11.00 (".$langmark754.")";}
elseif ($country44 == 'Portugal') {$localname='Portugal'; $tnumber=182; $date1="22.30 (".$langmark752.")"; $date2="22.00 (".$langmark753.")";}
elseif ($country44 == 'Thailand') {$localname='Prathet Thai'; $tnumber=182; $date1="08.00 (".$langmark752.")"; $date2="08.30 (".$langmark753.")";}
elseif ($country44 == 'Puerto Rico') {$localname='Puerto Rico'; $tnumber=182; $date1="22.10 (".$langmark751.")"; $date2="22.10 (".$langmark754.")";}
elseif ($country44 == 'Romania') {$localname='Rom&#226;nia'; $tnumber=182; $date1="10.00 (".$langmark752.")"; $date2="10.00 (".$langmark754.")";}
elseif ($country44 == 'Russia') {$localname='Rossiya'; $tnumber=182; $date1="09.30 (".$langmark751.")"; $date2="09.30 (".$langmark754.")";}
elseif ($country44 == 'Georgia') {$localname='Sakartvelo'; $tnumber=182; $date1="15.30 (".$langmark751.")"; $date2="14.30 (".$langmark754.")";}
elseif ($country44 == 'Albania') {$localname='Shqiperia'; $tnumber=182; $date1="17.45 (".$langmark751.")"; $date2="17.15 (".$langmark753.")";}
elseif ($country44 == 'Slovenia') {$localname='Slovenija'; $tnumber=560; $date1="16.00 (".$langmark751.")"; $date2="17.30 (".$langmark754.")";}
elseif ($country44 == 'Slovakia') {$localname='Slovensko'; $tnumber=182; $date1="14.00 (".$langmark752.")"; $date2="14.30 (".$langmark753.")";}
elseif ($country44 == 'Switzerland') {$localname='Schweiz'; $tnumber=182; $date1="19.45 (".$langmark751.")"; $date2="18.30 (".$langmark754.")";}
elseif ($country44 == 'South Korea') {$localname='South Korea'; $tnumber=182; $date1="08.00 (".$langmark751.")"; $date2="08.00 (".$langmark753.")";}
elseif ($country44 == 'Serbia') {$localname='Srbija'; $tnumber=560; $date1="13.30 (".$langmark752.")"; $date2="12.45 (".$langmark753.")";}
elseif ($country44 == 'Finland') {$localname='Suomi'; $tnumber=182; $date1="19.30 (".$langmark752.")"; $date2="20.00 (".$langmark753.")";}
elseif ($country44 == 'Sweden') {$localname='Sverige'; $tnumber=182; $date1="11.30 (".$langmark751.")"; $date2="21.00 (".$langmark754.")";}
elseif ($country44 == 'Tunisia') {$localname='T&#363;nis'; $tnumber=182; $date1="15.00 (".$langmark751.")"; $date2="12.30 (".$langmark753.")";}
elseif ($country44 == 'Turkey') {$localname='T&uuml;rkiye'; $tnumber=182; $date1="18.00 (".$langmark751.")"; $date2="08.00 (".$langmark754.")";}
elseif ($country44 == 'United Kingdom') {$localname='United Kingdom'; $tnumber=182; $date1="18.30 (".$langmark751.")"; $date2="21.15 (".$langmark753.")";}
elseif ($country44 == 'Ukraine') {$localname='Ukrayina'; $tnumber=182; $date1="14.30 (".$langmark752.")"; $date2="12.30 (".$langmark754.")";}
elseif ($country44 == 'Uruguay') {$localname='Uruguay'; $tnumber=182; $date1="22.30 (".$langmark751.")"; $date2="22.30 (".$langmark754.")";}
elseif ($country44 == 'USA') {$localname='USA'; $tnumber=560; $date1="00.15 (".$langmark751.")"; $date2="00.00 (".$langmark754.")";}
elseif ($country44 == 'Venezuela') {$localname='Venezuela'; $tnumber=182; $date1="00.00 (".$langmark254.")"; $date2="00.00 (".$langmark256.")";}

if ($tnumber==560) {echo $langmark239," <a href=\"search.php?goto=",$country44,"\">",$langmark636,"</a>.";}
if ($tnumber==1694) {echo $langmark240," <a href=\"search.php?goto=",$country44,"\">",$langmark636,"</a>.";}
?>
</td><td class="border" width="54%">

<form method="post" action="<?=$PHP_SELF?>" style="margin: 0" name="tijuk">
<select name="country"  OnChange="location.href='league.php?country='+tijuk.country.options[selectedIndex].value" class="inputreg">
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
<option name="Denmark" value="Denmark" <?php if ($country44=='Denmark'){echo "selected";}?>>Denmark</option>
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
<input type="submit" value="&nbsp;&raquo;" name="submit" class="buttonreg">
</form>

<?php
$userjev = mysql_query("SELECT teamid FROM teams WHERE status =1 AND country ='$country44'") or die(mysql_error());
$stevilo = mysql_num_rows($userjev);
echo "<div style=\"text-align:bottom\">",$langmark241," (",$langmark242,"):";
if ($country44=='Bosnia') {echo " <b>Bosnia and Herzegovina</b> ";} else {echo " <b>",$country44,"</b> ";}?>
<a href="countrystats.php?country=<?=$country44?>"><img src="img/leaguestats.jpg" border="0" title="<?=$langmark1329?>" alt="<?=$langmark1329?>"></a>
<?php if ($bunr>0){?>
<a href="league.php?country=<?=$country44?>&add=cups"><img src="img/cupm.jpg" alt="Major trophies" title="Major trophies won" border="0" height="15"></a>
<?php }?>
<a href="statements.php?country=<?=$country44?>"><img src="img/cstatements.jpg" alt="Last statements" title="Check last statements" border="0" height="18"></a>
</div>
<div style="text-align:bottom"><?=$langmark241?> (<?=$langmark243?>): <b><?php echo $localname; if ($localname=='Belgi&#235;'){echo '/Belgique/Belgien';}?></b></div>
<div style="text-align:bottom"><?=$langmark244?>: <b><?=$tnumber?></b></div>
<div style="text-align:bottom"><?=$langmark245?>: <b><?=$stevilo?></b></div>

<br/>
<a href="nationalcup.php?country=<?=$country44?>"><?=$langmark246?> <?php if ($localname=='Belgi&#235;') {echo 'Belgium';} else {echo $localname;}?></a><br/>
<a href="nationalteams.php?country=<?=$country44?>"><?=$langmark1524?> <?php if ($localname=='Belgi&#235;') {echo 'Belgium';} else {echo $localname;}?></a><br/>
<a href="u18teams.php?country=<?=$country44?>"><?=$langmark1524?> <?php if ($localname=='Belgi&#235;') {echo 'Belgium';} else {echo $localname;}?> U19</a><br/>

<br/>
<b><?=$langmark249," (",$langmark250?>):</b><br/>
<?=$langmark251?> - 02.00 (<?=$langmark252?>)<br/>
<?=$langmark253?>  - 13.30 (<?=$langmark254," ",$langmark255," ",$langmark256?>)<br/>
<?=$langmark257?> - Youths 12.30 &amp; Seniors 15.00 (<?=$langmark256?>)<br/>
<?=$langmark258?> - 21.30 (<?=$langmark254," ",$langmark255," ",$langmark259?>)<br/>
<?=$langmark260?> - 12.00 (<?=$langmark259?>)<br/>
<?=$langmark261," - ",$date1?><br/>
<?=$langmark262," - ",$date2?><br/>
</td>
</tr>
</table>
<?php
if ($add=='cups' AND $bunr > 0) {
?>
<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="100%" colspan="2">
<?php
$pok = 0;
while ($pok < (mysql_num_rows($zmagal))) {
$h_type=mysql_result($zmagal,$pok,"h_type");
$h_season=mysql_result($zmagal,$pok,"h_season");
if ($h_type==5 AND $h_season==2) {
?><a href="fairplaycup.php?season=<?=$h_season?>&round=9"><img src="img/pokalcic.png" alt="FPC winners" title="Winners of the Fair Play Cup in season <?=$h_season?>" border="0"></a>
<?php
}
if ($h_type==5 AND $h_season>2) {
?><a href="fairplaycup.php?season=<?=$h_season?>&round=10"><img src="img/pokalcic.png" alt="FPC winners" title="Winners of the Fair Play Cup in season <?=$h_season?>" border="0"></a>
<?php
}
if ($h_type==6) {
?><a href="cs.php?season=<?=$h_season?>&round=7"><img src="img/int_CS.gif" alt="CS winners" title="Winners of the Champions Series in season <?=$h_season?>" border="0"></a>
<?php
}
if ($h_type==7) {
?><a href="cws.php?season=<?=$h_season?>&round=7"><img src="img/int_CWS.gif" alt="CWS winners" title="Winners of the Cup Winners Series in season <?=$h_season?>" border="0"></a>
<?php
}
if ($h_type==19) {
?>
<a href="ycwc.php?season=<?=$h_season?>&round=7"><img src="img/ycwc.png" alt="YCWC winners" title="Winners of the Youth Club World Cup in season <?=$h_season?>" border="0"></a>
<?php
}
$pok++;
}
?>
</td>
</tr>
</table>
<?php
}
?>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>