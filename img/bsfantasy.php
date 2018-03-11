<?php
$coexpand=14;
$ntp=2; //1=člani 2=mladinci
$competu=6; //kater competition
$disablef=1; //premaknem na 2 oz ko stvar deluje nazaj na 1 (ko pa je konec pa na tri)   [SPODAJ GA MORAM SPREMENIT NA 2 KO BO IGRA AKTIVNA ... to mam že avtomatsko zdaj?!]
$gamew=1; //TEDEN, ko je konec dam na teden 10

/*
cooltext716154123.png

optimizacija, nekaj sem imel v mislih, nekakšen cache ali nekaj takega - poiščem v cuptemp in nasploh vse od tam prenesem sm (še od kje drugje ali samo s cuptemp?)
kako avtomatsko določam tedn? ko je deadline se tedn zapre in začne se nov +še kaj iz cuptemp?
med live delujeta linka submit next week in back čudno; namesto back js back? 'back' prevedm! 'back' ali 'go back'?; UK okrajšava
označim nt kovče v vrstnem redu; v isti sezoni viden score za bivše tedne; nasploh zmagovalci tednov za nazaj +največkrat zmagal teden; spodaj do konca - history [bsfantasy.php?act=WCFG&se=2]
most picked fantasy players (ali dejansko na strani, ali pa napišem poleg nt previewa danes še te statse zraven?!)
fantasy game kao sponzor gugl ads +pri wcju nekaj oz pri wc tekmah?!..
*/

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$getuser=mysql_query("SELECT username, club, lang FROM users WHERE password='$koda' AND userid='$userid' LIMIT 1");
if (mysql_num_rows($getuser)) {
$usercek = mysql_result ($getuser,0,"username");
$get_team = mysql_result ($getuser,0,"club");
$lang = mysql_result ($getuser,0,"lang");
}
else {die(include 'basketsim.php');}

//nastavljeno
if (isset($_POST['submit'])) { 
$starting_pg = $_POST["starting_pg"];
$starting_sg = $_POST["starting_sg"];
$starting_sf = $_POST["starting_sf"];
$starting_pf = $_POST["starting_pf"];
$starting_c = $_POST["starting_c"];
$reserve_pg = $_POST["reserve_pg"];
$reserve_sg = $_POST["reserve_sg"];
$reserve_sf = $_POST["reserve_sf"];
$reserve_pf = $_POST["reserve_pf"];
$reserve_c = $_POST["reserve_c"];

if ($starting_pg >0 AND $starting_sg >0 AND $starting_sf >0 AND $starting_pf >0 AND $starting_c >0 AND $reserve_pg >0  AND $reserve_sg >0 AND $reserve_sf >0  AND $reserve_pf >0  AND $reserve_c >0) {$lan=4;} else {die("Something went wrong!");}

$zeze = mysql_query("SELECT * FROM fantasy WHERE compet=$competu AND week=$gamew AND user=$userid LIMIT 1");
if (mysql_num_rows($zeze)) {
mysql_query("UPDATE fantasy SET username='$usercek', pg1id=$starting_pg, sg1id=$starting_sg, sf1id=$starting_sf, pf1id=$starting_pf, c1id=$starting_c, pg2id=$reserve_pg, sg2id=$reserve_sg, sf2id=$reserve_sf, pf2id=$reserve_pf, c2id=$reserve_c WHERE compet=$competu AND week=$gamew AND user=$userid LIMIT 1") or die(mysql_error());
}
else {
mysql_query("INSERT INTO fantasy VALUES ('', $competu, $userid, '$usercek', $gamew, 0, $starting_pg, 0, $starting_sg, 0, $starting_sf, 0, $starting_pf, 0, $starting_c, 0, $reserve_pg, 0, $reserve_sg, 0, $reserve_sf, 0, $reserve_pf, 0, $reserve_c, 0);") or die(mysql_error());
}

header( 'Location: bsfantasy.php' );
}

$act=$_GET["act"];
$man=$_GET["man"];
if (!$man) {$man=$userid;}

if ($act=='latest') {$zeod = mysql_query("SELECT user, username, `pg1id`, `pg1score`, `sg1id`, `sg1score`, `sf1id`, `sf1score`, `pf1id`, `pf1score`, `c1id`, `c1score`, `pg2id`, `pg2score`, `sg2id`, `sg2score`, `sf2id`, `sf2score`, `pf2id`, `pf2score`, `c2id`, `c2score` FROM fantasy WHERE compet=$competu AND week=$gamew-1 AND user=$man LIMIT 1");}
else {$zeod = mysql_query("SELECT `points`, `pg1id`, `pg1score`, `sg1id`, `sg1score`, `sf1id`, `sf1score`, `pf1id`, `pf1score`, `c1id`, `c1score`, `pg2id`, `pg2score`, `sg2id`, `sg2score`, `sf2id`, `sf2score`, `pf2id`, `pf2score`, `c2id`, `c2score` FROM fantasy WHERE compet=$competu AND week=$gamew AND user=$userid LIMIT 1");}
$arypas = mysql_fetch_array($zeod);
$manlink = $arypas[user];
$maname = $arypas[username];
$mypg1 = $arypas[pg1id];
$pg1score = $arypas[pg1score];
$mysg1 = $arypas[sg1id];
$sg1score = $arypas[sg1score];
$mysf1 = $arypas[sf1id];
$sf1score = $arypas[sf1score];
$mypf1 = $arypas[pf1id];
$pf1score = $arypas[pf1score];
$myc1 = $arypas[c1id];
$c1score = $arypas[c1score];
$mypg2 = $arypas[pg2id];
$pg2score = $arypas[pg2score];
$mysg2 = $arypas[sg2id];
$sg2score = $arypas[sg2score];
$mysf2 = $arypas[sf2id];
$sf2score = $arypas[sf2score];
$mypf2 = $arypas[pf2id];
$pf2score = $arypas[pf2score];
$myc2 = $arypas[c2id];
$c2score = $arypas[c2score];

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2><img src="img/cooltext716160313.png" alt="World Cup Fantasy Game" title="World Cup Fantasy Game" border="0" width="375" height="50">&nbsp;<a href="u18teams.php"><img src="img/cooltext716153552.png" alt="7th Junior World Cup" title="7th Junior World Cup" border="0" valign="bottom" align="right"></a></h2>

<br/><table width="100%" bgcolor="#F5F5F5"><tr><td colspan="2" style="border-top: solid 1px LightSteelBlue;"></td></tr><tr><td colspan="2">
<!--If you want to write <b>World Cup Fantasy preview</b> (tips on players etc), <a href="club.php?clubid=1">send me a PM</a> and it will be posted in here.<br/>-->
If you want to write <b>U19 World Cup preview</b> (groups, teams etc), <a href="club.php?clubid=1">let me know</a> and it will be posted in the news section!<br/>
For a complete WC preview, writer will be able to pick the award from three choices. English text is required.
</td></tr><tr><td colspan="2" style="border-bottom: solid 1px LightSteelBlue;"></td></tr></table>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="60%">

<?php
if (($act<>'latest' AND !is_numeric($mypg1)) OR $act=='lineup') {
$stara=100;
?>

<table width="100%" border="0" cellspacing="0" cellpadding="1">

<tr width="100%"><td colspan="2"><b>Set your team and play the World Cup fantasy game!</b><br/></td></tr>

<tr width="100%"><td colspan="2"><br/><i>Score points based on statistical ratings of players involved in the <a href="u18teams.php">U19 World Cup</a>. Players in your starting five give you double points. You can change picks every week, so consider the fixtures. And most important: pick players who will actually play, else they won't score any points!</i></td></tr>

<tr><td colspan="2"><br/></td></tr>

<tr width="100%"><td align="center" colspan="2"><b>&nbsp;*&nbsp;*&nbsp;*&nbsp;*&nbsp;*&nbsp;<?=$langmark1057?>&nbsp;*&nbsp;*&nbsp;*&nbsp;*&nbsp;*&nbsp;</b></td></tr>
<form name="lineup" method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="margin: 0">

<?php
/*
$results = mysql_query("SELECT DISTINCT id, name, surname, players.country AS country FROM players, `nt_matches`, countries WHERE players.country = countries.ALTCOUNTRY AND `type` =4 AND `home_score` =0 AND (`home_name` = countries.country OR `away_name` = countries.country) AND ntplayer =$ntp AND star_posit=1 AND injury < 1 AND wage > 125999 ORDER BY players.country ASC");
$prevsq = mysql_num_rows($results);
if ((!$prevsq OR $prevsq=='' OR $prevsq==0) AND $disablef<>3) {$disablef=2;}
*/

$results = mysql_query("SELECT id, name, surname, players.country AS country FROM players, u18countries WHERE players.country = u18countries.ALTCOUNTRY AND qualgroup <> '' AND ntplayer =$ntp AND wage > 30999 AND injury < 1  AND star_posit =1 ORDER BY players.country ASC");

?>
<tr width="100%"><td><?=$langmark386?></td><td align="right">
<?php
echo"<select name=\"starting_pg\" class=\"inputreg\">";
for($u=0; $u<mysql_num_rows($results); $u++){
$id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$name = substr($name,0,1);
if ($name=='&') {$name='';}
$surname=mysql_result($results,$u,'surname');
$country=mysql_result($results,$u,"country");
if ($country=='Bosnia') {$country='BiH';}
?>
<option <?php if($mypg1==$id){echo " selected";}?> value="<?=$id?>"><?=$name," ",$surname," (",$country,")"?></option><?php }?>
</select></td></tr>

<?php
/*
$results = mysql_query("SELECT DISTINCT id, name, surname, players.country AS country FROM players, `nt_matches`, countries WHERE players.country = countries.ALTCOUNTRY AND `type` =4 AND `home_score` =0 AND (`home_name` = countries.country OR `away_name` = countries.country) AND ntplayer =$ntp AND star_posit=2 AND injury < 1 AND wage > 142499 ORDER BY players.country ASC");
*/

$results = mysql_query("SELECT id, name, surname, players.country AS country FROM players, u18countries WHERE players.country = u18countries.ALTCOUNTRY AND qualgroup <> '' AND ntplayer =$ntp AND wage > 29999 AND injury < 1  AND star_posit =2 ORDER BY players.country ASC");

?>
<tr width="100%"><td><nobr><?=$langmark387?></nobr></td><td align="right">
<?php
echo"<select name=\"starting_sg\" class=\"inputreg\">";
for($u=0; $u<mysql_num_rows($results); $u++){
$id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$name = substr($name,0,1);
if ($name=='&') {$name='';}
$surname=mysql_result($results,$u,'surname');
$country=mysql_result($results,$u,"country");
if ($country=='Bosnia') {$country='BiH';}
?>
<option <?php if($mysg1==$id){echo " selected";}?> value="<?=$id?>"><?=$name," ",$surname," (",$country,")"?></option><?php }?>
</select></td></tr>

<?php
/*
$results = mysql_query("SELECT DISTINCT id, name, surname, players.country AS country FROM players, `nt_matches`, countries WHERE players.country = countries.ALTCOUNTRY AND `type` =4 AND `home_score` =0 AND (`home_name` = countries.country OR `away_name` = countries.country) AND ntplayer =$ntp AND star_posit=3 AND injury < 1 AND wage > 162999 ORDER BY players.country ASC");
*/

$results = mysql_query("SELECT id, name, surname, players.country AS country FROM players, u18countries WHERE players.country = u18countries.ALTCOUNTRY AND qualgroup <> '' AND ntplayer =$ntp AND wage > 25999 AND injury < 1  AND star_posit =3 ORDER BY players.country ASC");

?>
<tr width="100%"><td><?=$langmark388?></td><td align="right">
<?php
echo"<select name=\"starting_sf\" class=\"inputreg\">";
for($u=0; $u<mysql_num_rows($results); $u++){
$id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$name = substr($name,0,1);
if ($name=='&') {$name='';}
$surname=mysql_result($results,$u,'surname');
$country=mysql_result($results,$u,"country");
if ($country=='Bosnia') {$country='BiH';}
?>
<option <?php if($mysf1==$id){echo " selected";}?> value="<?=$id?>"><?=$name," ",$surname," (",$country,")"?></option><?php }?>
</select></td></tr>

<?php
/*
$results = mysql_query("SELECT DISTINCT id, name, surname, players.country AS country FROM players, `nt_matches`, countries WHERE players.country = countries.ALTCOUNTRY AND `type` =4 AND `home_score` =0 AND (`home_name` = countries.country OR `away_name` = countries.country) AND ntplayer =$ntp AND star_posit=4 AND injury < 1 AND wage > 141999 ORDER BY players.country ASC");
*/

$results = mysql_query("SELECT id, name, surname, players.country AS country FROM players, u18countries WHERE players.country = u18countries.ALTCOUNTRY AND qualgroup <> '' AND ntplayer =$ntp AND wage > 24999 AND injury < 1  AND star_posit =4 ORDER BY players.country ASC");

?>
<tr width="100%"><td><?=$langmark389?></td><td align="right">
<?php
echo"<select name=\"starting_pf\" class=\"inputreg\">";
for($u=0; $u<mysql_num_rows($results); $u++){
$id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$name = substr($name,0,1);
if ($name=='&') {$name='';}
$surname=mysql_result($results,$u,'surname');
$country=mysql_result($results,$u,"country");
if ($country=='Bosnia') {$country='BiH';}
?>
<option <?php if($mypf1==$id){echo " selected";}?> value="<?=$id?>"><?=$name," ",$surname," (",$country,")"?></option><?php }?>
</select></td></tr>

<?php
/*
$results = mysql_query("SELECT DISTINCT id, name, surname, players.country AS country FROM players, `nt_matches`, countries WHERE players.country = countries.ALTCOUNTRY AND `type` =4 AND `home_score` =0 AND (`home_name` = countries.country OR `away_name` = countries.country) AND ntplayer =$ntp AND star_posit=5 AND injury < 1 AND wage > 139999 ORDER BY players.country ASC");
*/

$results = mysql_query("SELECT id, name, surname, players.country AS country FROM players, u18countries WHERE players.country = u18countries.ALTCOUNTRY AND qualgroup <> '' AND ntplayer =$ntp AND wage > 23999 AND injury < 1  AND star_posit =5 ORDER BY players.country ASC");

?>
<tr width="100%"><td><?=$langmark390?></td><td align="right">
<?php
echo"<select name=\"starting_c\" class=\"inputreg\">";
for($u=0; $u<mysql_num_rows($results); $u++){
$id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$name = substr($name,0,1);
if ($name=='&') {$name='';}
$surname=mysql_result($results,$u,'surname');
$country=mysql_result($results,$u,"country");
if ($country=='Bosnia') {$country='BiH';}
?>
<option <?php if($myc1==$id){echo " selected";}?> value="<?=$id?>"><?=$name," ",$surname," (",$country,")"?></option><?php }?>
</select></td></tr>

<tr width="100%"><td align="center" colspan="2"><b>&nbsp;*&nbsp;*&nbsp;*&nbsp;*&nbsp;*&nbsp;<?=$langmark1058?>&nbsp;*&nbsp;*&nbsp;*&nbsp;*&nbsp;*&nbsp;</b></td></tr>

<?php
/*
$results = mysql_query("SELECT DISTINCT id, name, surname, players.country AS country FROM players, `nt_matches`, countries WHERE players.country = countries.ALTCOUNTRY AND `type` =4 AND `home_score` =0 AND (`home_name` = countries.country OR `away_name` = countries.country) AND ntplayer =$ntp AND star_posit=1 AND injury < 1 AND wage < 126000 ORDER BY players.country ASC");
*/

$results = mysql_query("SELECT id, name, surname, players.country AS country FROM players, u18countries WHERE players.country = u18countries.ALTCOUNTRY AND qualgroup <> '' AND ntplayer =$ntp AND wage < 31000 AND injury < 1  AND star_posit =1 ORDER BY players.country ASC");

?>
<tr width="100%"><td><?=$langmark386?></td><td align="right">
<?php
echo"<select name=\"reserve_pg\" class=\"inputreg\">";
for($u=0; $u<mysql_num_rows($results); $u++){
$id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$name = substr($name,0,1);
if ($name=='&') {$name='';}
$surname=mysql_result($results,$u,'surname');
$country=mysql_result($results,$u,"country");
if ($country=='Bosnia') {$country='BiH';}
?>
<option <?php if($mypg2==$id){echo " selected";}?> value="<?=$id?>"><?=$name," ",$surname," (",$country,")"?></option><?php }?>
</select></td></tr>

<?php
/*
$results = mysql_query("SELECT DISTINCT id, name, surname, players.country AS country FROM players, `nt_matches`, countries WHERE players.country = countries.ALTCOUNTRY AND `type` =4 AND `home_score` =0 AND (`home_name` = countries.country OR `away_name` = countries.country) AND ntplayer =$ntp AND star_posit=2 AND injury < 1 AND wage < 142500 ORDER BY players.country ASC");
*/

$results = mysql_query("SELECT id, name, surname, players.country AS country FROM players, u18countries WHERE players.country = u18countries.ALTCOUNTRY AND qualgroup <> '' AND ntplayer =$ntp AND wage < 30000 AND injury < 1  AND star_posit =2 ORDER BY players.country ASC");

?>
<tr width="100%"><td><nobr><?=$langmark387?></nobr></td><td align="right">
<?php
echo"<select name=\"reserve_sg\" class=\"inputreg\">";
for($u=0; $u<mysql_num_rows($results); $u++){
$id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$name = substr($name,0,1);
if ($name=='&') {$name='';}
$surname=mysql_result($results,$u,'surname');
$country=mysql_result($results,$u,"country");
if ($country=='Bosnia') {$country='BiH';}
?>
<option <?php if($mysg2==$id){echo " selected";}?> value="<?=$id?>"><?=$name," ",$surname," (",$country,")"?></option><?php }?>
</select></td></tr>

<?php
/*
$results = mysql_query("SELECT DISTINCT id, name, surname, players.country AS country FROM players, `nt_matches`, countries WHERE players.country = countries.ALTCOUNTRY AND `type` =4 AND `home_score` =0 AND (`home_name` = countries.country OR `away_name` = countries.country) AND ntplayer =$ntp AND star_posit=3 AND injury < 1 AND wage < 163000 ORDER BY players.country ASC");
*/

$results = mysql_query("SELECT id, name, surname, players.country AS country FROM players, u18countries WHERE players.country = u18countries.ALTCOUNTRY AND qualgroup <> '' AND ntplayer =$ntp AND wage < 26000 AND injury < 1  AND star_posit =3 ORDER BY players.country ASC");

?>
<tr width="100%"><td><?=$langmark388?></td><td align="right">
<?php
echo"<select name=\"reserve_sf\" class=\"inputreg\">";
for($u=0; $u<mysql_num_rows($results); $u++){
$id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$name = substr($name,0,1);
if ($name=='&') {$name='';}
$surname=mysql_result($results,$u,'surname');
$country=mysql_result($results,$u,"country");
if ($country=='Bosnia') {$country='BiH';}
?>
<option <?php if($mysf2==$id){echo " selected";}?> value="<?=$id?>"><?=$name," ",$surname," (",$country,")"?></option><?php }?>
</select></td></tr>

<?php
/*
$results = mysql_query("SELECT DISTINCT id, name, surname, players.country AS country FROM players, `nt_matches`, countries WHERE players.country = countries.ALTCOUNTRY AND `type` =4 AND `home_score` =0 AND (`home_name` = countries.country OR `away_name` = countries.country) AND ntplayer =$ntp AND star_posit=4 AND injury < 1 AND wage < 142000 ORDER BY players.country ASC");
*/

$results = mysql_query("SELECT id, name, surname, players.country AS country FROM players, u18countries WHERE players.country = u18countries.ALTCOUNTRY AND qualgroup <> '' AND ntplayer =$ntp AND wage < 25000 AND injury < 1  AND star_posit =4 ORDER BY players.country ASC");

?>
<tr width="100%"><td><?=$langmark389?></td><td align="right">
<?php
echo"<select name=\"reserve_pf\" class=\"inputreg\">";
for($u=0; $u<mysql_num_rows($results); $u++){
$id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$name = substr($name,0,1);
if ($name=='&') {$name='';}
$surname=mysql_result($results,$u,'surname');
$country=mysql_result($results,$u,"country");
if ($country=='Bosnia') {$country='BiH';}
?>
<option <?php if($mypf2==$id){echo " selected";}?> value="<?=$id?>"><?=$name," ",$surname," (",$country,")"?></option><?php }?>
</select></td></tr>

<?php
/*
$results = mysql_query("SELECT DISTINCT id, name, surname, players.country AS country FROM players, `nt_matches`, countries WHERE players.country = countries.ALTCOUNTRY AND `type` =4 AND `home_score` =0 AND (`home_name` = countries.country OR `away_name` = countries.country) AND ntplayer =$ntp AND star_posit=5 AND injury < 1 AND wage < 140000 ORDER BY players.country ASC");
*/

$results = mysql_query("SELECT id, name, surname, players.country AS country FROM players, u18countries WHERE players.country = u18countries.ALTCOUNTRY AND qualgroup <> '' AND ntplayer =$ntp AND wage < 24000 AND injury < 1  AND star_posit =5 ORDER BY players.country ASC");

?>
<tr width="100%"><td><?=$langmark390?></td><td align="right">
<?php
echo"<select name=\"reserve_c\" class=\"inputreg\">";
for($u=0; $u<mysql_num_rows($results); $u++){
$id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$name = substr($name,0,1);
if ($name=='&') {$name='';}
$surname=mysql_result($results,$u,'surname');
$country=mysql_result($results,$u,"country");
if ($country=='Bosnia') {$country='BiH';}
?>
<option <?php if($myc2==$id){echo " selected";}?> value="<?=$id?>"><?=$name," ",$surname," (",$country,")"?></option><?php }?>
</select></td></tr>

<tr width="100%"><td align="center" colspan="2">
<?php if ($disablef<>2 AND $disablef<>3) {?>
<input type="submit" name="submit" value="Submit your fantasy lineup!" class="buttonreg"></form>
<?php } elseif ($disablef==3) {?>
<b>World Cup fantasy for this season has ended!</b>
<?php } else {?>
<b>Squad for the next week cannot be submited yet!</b>
<?php }?>
</td></tr></table>

<?php } elseif ($act=='WCFG') {
//history
//klik na past competition, zaščitim neobstoječe sezone tekmovanja npr. 6 in pa črkovni vnos (ne sprejmem)
//- vidiš levo zmagovalce posameznih tednov (ali pa top 3) +tvoj score in obarvan (oboje ali nekaj od tega za supp?
//- vidiš desno skupni vrstni red za tisto sezono
//potem presodim če še rabim v oklepaju za past winners rezultat in se odločim ali ob pregledu že nastavljenega lajnupa rabim past winners
$lua = $_GET['se'];
echo $lua;

} elseif ($act=='latest') {?>

<?php
if (mysql_num_rows($zeod) > 0) {
$results = mysql_query("SELECT id, name, surname, players.country AS country FROM players WHERE id=$mypg1 LIMIT 1");
?>
<b>Latest points for <a href="club.php?clubid=<?=$manlink?>"><?=$maname?></a></b><br/><br/>
<table width="100%" bgcolor="#F5F5F5">
<tr><td colspan="3" style="border-top: solid 1px LightSteelBlue;"></td></tr>
<tr><td colspan="3"><b><?=$langmark1057?></b></td></tr>
<tr><td>PG</td><td>
<?php
$id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$country=mysql_result($results,$u,"country");
if ($country=='Bosnia') {$country='Bosnia and Herzegovina';}
echo "<a href=\"player.php?playerid=",$id,"\" class=\"greenhilite\">",$name," ",$surname,"</a> (",$country,")</td><td align=\"right\">",2*$pg1score,"</td></tr>";

$results = mysql_query("SELECT id, name, surname, players.country AS country FROM players WHERE id=$mysg1 LIMIT 1");
?>
<tr><td>SG</td><td>
<?php
$id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$country=mysql_result($results,$u,"country");
if ($country=='Bosnia') {$country='Bosnia and Herzegovina';}
echo "<a href=\"player.php?playerid=",$id,"\" class=\"greenhilite\">",$name," ",$surname,"</a> (",$country,")</td><td align=\"right\">",2*$sg1score,"</td></tr>";

$results = mysql_query("SELECT id, name, surname, players.country AS country FROM players WHERE id=$mysf1 LIMIT 1");
?>
<tr><td>SF</td><td>
<?php
$id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$country=mysql_result($results,$u,"country");
if ($country=='Bosnia') {$country='Bosnia and Herzegovina';}
echo "<a href=\"player.php?playerid=",$id,"\" class=\"greenhilite\">",$name," ",$surname,"</a> (",$country,")</td><td align=\"right\">",2*$sf1score,"</td></tr>";

$results = mysql_query("SELECT id, name, surname, players.country AS country FROM players WHERE id=$mypf1 LIMIT 1");
?>
<tr><td>PF</td><td>
<?php
$id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$country=mysql_result($results,$u,"country");
if ($country=='Bosnia') {$country='Bosnia and Herzegovina';}
echo "<a href=\"player.php?playerid=",$id,"\" class=\"greenhilite\">",$name," ",$surname,"</a> (",$country,")</td><td align=\"right\">",2*$pf1score,"</td></tr>";

$results = mysql_query("SELECT id, name, surname, players.country AS country FROM players WHERE id=$myc1 LIMIT 1");
?>
<tr><td>C</td><td>
<?php
$id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$country=mysql_result($results,$u,"country");
if ($country=='Bosnia') {$country='Bosnia and Herzegovina';}
echo "<a href=\"player.php?playerid=",$id,"\" class=\"greenhilite\">",$name," ",$surname,"</a> (",$country,")</td><td align=\"right\">",2*$c1score,"</td></tr>";
?>

<tr><td colspan="3"><b><br/></b></td></tr>
<tr><td colspan="3"><b><?=$langmark1058?></b></td></tr>

<?php
$results = mysql_query("SELECT id, name, surname, players.country AS country FROM players WHERE id=$mypg2 LIMIT 1");
?>
<tr><td>PG</td><td>
<?php
$id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$country=mysql_result($results,$u,"country");
if ($country=='Bosnia') {$country='Bosnia and Herzegovina';}
echo "<a href=\"player.php?playerid=",$id,"\" class=\"greenhilite\">",$name," ",$surname,"</a> (",$country,")</td><td align=\"right\">",$pg2score,"</td></tr>";

$results = mysql_query("SELECT id, name, surname, players.country AS country FROM players WHERE id=$mysg2 LIMIT 1");
?>
<tr><td>SG</td><td>
<?php
$id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$country=mysql_result($results,$u,"country");
if ($country=='Bosnia') {$country='Bosnia and Herzegovina';}
echo "<a href=\"player.php?playerid=",$id,"\" class=\"greenhilite\">",$name," ",$surname,"</a> (",$country,")</td><td align=\"right\">",$sg2score,"</td></tr>";

$results = mysql_query("SELECT id, name, surname, players.country AS country FROM players WHERE id=$mysf2 LIMIT 1");
?>
<tr><td>SF</td><td>
<?php
$id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$country=mysql_result($results,$u,"country");
if ($country=='Bosnia') {$country='Bosnia and Herzegovina';}
echo "<a href=\"player.php?playerid=",$id,"\" class=\"greenhilite\">",$name," ",$surname,"</a> (",$country,")</td><td align=\"right\">",$sf2score,"</td></tr>";

$results = mysql_query("SELECT id, name, surname, players.country AS country FROM players WHERE id=$mypf2 LIMIT 1");
?>
<tr><td>PF</td><td>
<?php
$id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$country=mysql_result($results,$u,"country");
if ($country=='Bosnia') {$country='Bosnia and Herzegovina';}
echo "<a href=\"player.php?playerid=",$id,"\" class=\"greenhilite\">",$name," ",$surname,"</a> (",$country,")</td><td align=\"right\">",$pf2score,"</td></tr>";

$results = mysql_query("SELECT id, name, surname, players.country AS country FROM players WHERE id=$myc2 LIMIT 1");
?>
<tr><td>C</td><td>
<?php
$id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$country=mysql_result($results,$u,"country");
if ($country=='Bosnia') {$country='Bosnia and Herzegovina';}
echo "<a href=\"player.php?playerid=",$id,"\" class=\"greenhilite\">",$name," ",$surname,"</a> (",$country,")</td><td align=\"right\">",$c2score,"</td></tr>";
?>
<tr><td colspan="3"><br/></td></tr>
<tr><td colspan="2"><b>TOTAL SCORE</b></td><td align="right"><b><?=(2*$pg1score+2*$sg1score+2*$sf1score+2*$pf1score+2*$c1score+$pg2score+$sg2score+$sf2score+$pf2score+$c2score)?></b></td></tr>
<tr><td colspan="3" style="border-bottom: solid 1px LightSteelBlue;"></td></tr>
</table><br/>
<?php
//if ($man==$userid) {echo "<a href=\"bsfantasy.php\">submit next week lineup</a></i>";}
if ($man<>$userid) {echo "<a href=\"bsfantasy.php\">back</a></i>";}
}
else {echo "<i>This manager hasn't submited lineup last week.";
if ($man==$userid) {echo "<br/><a href=\"bsfantasy.php\">Make sure to submit lineup for this week!</a></i>";}
}
 } else {?>

<b>Your current lineup for week <?=$gamew?></b><br/><br/>
<table width="100%" bgcolor="#f5f5f5">
<tr><td colspan="2" style="border-top: solid 1px LightSteelBlue;"></td></tr>
<tr><td colspan="2"><b><?=$langmark1057?></b></td></tr>
<?php
$results = mysql_query("SELECT id, name, surname, players.country AS country FROM players WHERE id=$mypg1 LIMIT 1");
?>
<tr><td>PG</td><td>
<?php
$id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$country=mysql_result($results,$u,"country");
if ($country=='Bosnia') {$country='Bosnia and Herzegovina';}
echo "<a href=\"player.php?playerid=",$id,"\" class=\"greenhilite\">",$name," ",$surname,"</a> (",$country,")</td></tr>";

$results = mysql_query("SELECT id, name, surname, players.country AS country FROM players WHERE id=$mysg1 LIMIT 1");
?>
<tr><td>SG</td><td>
<?php
$id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$country=mysql_result($results,$u,"country");
if ($country=='Bosnia') {$country='Bosnia and Herzegovina';}
echo "<a href=\"player.php?playerid=",$id,"\" class=\"greenhilite\">",$name," ",$surname,"</a> (",$country,")</td></tr>";

$results = mysql_query("SELECT id, name, surname, players.country AS country FROM players WHERE id=$mysf1 LIMIT 1");
?>
<tr><td>SF</td><td>
<?php
$id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$country=mysql_result($results,$u,"country");
if ($country=='Bosnia') {$country='Bosnia and Herzegovina';}
echo "<a href=\"player.php?playerid=",$id,"\" class=\"greenhilite\">",$name," ",$surname,"</a> (",$country,")</td></tr>";

$results = mysql_query("SELECT id, name, surname, players.country AS country FROM players WHERE id=$mypf1 LIMIT 1");
?>
<tr><td>PF</td><td>
<?php
$id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$country=mysql_result($results,$u,"country");
if ($country=='Bosnia') {$country='Bosnia and Herzegovina';}
echo "<a href=\"player.php?playerid=",$id,"\" class=\"greenhilite\">",$name," ",$surname,"</a> (",$country,")</td></tr>";

$results = mysql_query("SELECT id, name, surname, players.country AS country FROM players WHERE id=$myc1 LIMIT 1");
?>
<tr><td>C</td><td>
<?php
$id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$country=mysql_result($results,$u,"country");
if ($country=='Bosnia') {$country='Bosnia and Herzegovina';}
echo "<a href=\"player.php?playerid=",$id,"\" class=\"greenhilite\">",$name," ",$surname,"</a> (",$country,")</td></tr>";
?>

<tr><td colspan="2"><br/></td></tr>
<tr><td colspan="2"><b><?=$langmark1058?></b></td></tr>

<?php
$results = mysql_query("SELECT id, name, surname, players.country AS country FROM players WHERE id=$mypg2 LIMIT 1");
?>
<tr><td>PG</td><td>
<?php
$id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$country=mysql_result($results,$u,"country");
if ($country=='Bosnia') {$country='Bosnia and Herzegovina';}
echo "<a href=\"player.php?playerid=",$id,"\" class=\"greenhilite\">",$name," ",$surname,"</a> (",$country,")</td></tr>";

$results = mysql_query("SELECT id, name, surname, players.country AS country FROM players WHERE id=$mysg2 LIMIT 1");
?>
<tr><td>SG</td><td>
<?php
$id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$country=mysql_result($results,$u,"country");
if ($country=='Bosnia') {$country='Bosnia and Herzegovina';}
echo "<a href=\"player.php?playerid=",$id,"\" class=\"greenhilite\">",$name," ",$surname,"</a> (",$country,")</td></tr>";

$results = mysql_query("SELECT id, name, surname, players.country AS country FROM players WHERE id=$mysf2 LIMIT 1");
?>
<tr><td>SF</td><td>
<?php
$id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$country=mysql_result($results,$u,"country");
if ($country=='Bosnia') {$country='Bosnia and Herzegovina';}
echo "<a href=\"player.php?playerid=",$id,"\" class=\"greenhilite\">",$name," ",$surname,"</a> (",$country,")</td></tr>";

$results = mysql_query("SELECT id, name, surname, players.country AS country FROM players WHERE id=$mypf2 LIMIT 1");
?>
<tr><td>PF</td><td>
<?php
$id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$country=mysql_result($results,$u,"country");
if ($country=='Bosnia') {$country='Bosnia and Herzegovina';}
echo "<a href=\"player.php?playerid=",$id,"\" class=\"greenhilite\">",$name," ",$surname,"</a> (",$country,")</td></tr>";

$results = mysql_query("SELECT id, name, surname, players.country AS country FROM players WHERE id=$myc2 LIMIT 1");
?>
<tr><td>C</td><td>
<?php
$id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$country=mysql_result($results,$u,"country");
if ($country=='Bosnia') {$country='Bosnia and Herzegovina';}
echo "<a href=\"player.php?playerid=",$id,"\" class=\"greenhilite\">",$name," ",$surname,"</a> (",$country,")</td></tr>";
?>
<tr><td colspan="2" style="border-bottom: solid 1px LightSteelBlue;"></td></tr>
</table><br/>
<?php
echo "<a href=\"bsfantasy.php?act=lineup\">Change lineup</a> <i>(changes are allowed until Friday 19:00)</i>";
}
?>

</td><td class="border" width="40%">

<?php if ($act<>'latest') {

if ($gamew >1) {?><h2>Options</h2><br/><a href="bsfantasy.php?act=latest">Check the latest scores</a><br/><br/><?php }?>

<h2>Fixtures for week <?=$gamew?></h2><br/>
<table width="100%" border="0" cellpadding="1" cellspacing="0">
<?php
$tetekme = mysql_query("SELECT MIN(`time`) FROM `nt_matches` WHERE `crowd1`=0 and type > 9 AND type <> 12") or die(mysql_error());
$datumzazdaj = @mysql_result($tetekme,0);
$tekmice = mysql_query("SELECT matchid, home_name, away_name FROM `nt_matches` WHERE `time`= '$datumzazdaj' and type > 9 AND type <> 12") or die(mysql_error());
$tekemje = mysql_num_rows($tekmice);
if (!$tekemje) {$tekemje=0;}
$u=0;
while ($u < $tekemje) { 
$matchid=mysql_result($tekmice,$u,"matchid");
$home_name=mysql_result($tekmice,$u,"home_name");
$away_name=mysql_result($tekmice,$u,"away_name");
if ($home_name=='Bosnia and Herzegovina') {$home_name='BiH';}
if ($away_name=='Bosnia and Herzegovina') {$away_name='BiH';}
if ($u % 2) {$coloric = '#F5F5F5';} else {$coloric = '#FFFAFA';}
echo "<tr><td bgcolor=\"$coloric\"><b><a href=\"nationalteams.php?country=",$home_name,"\" class=\"greenhilite\">",$home_name,"</a></b> <a href=\"nt_prikaz.php?matchid=",$matchid,"\">v</a> <b><a href=\"nationalteams.php?country=",$away_name,"\" class=\"greenhilite\">",$away_name,"</a></td></tr>";
$u++;
}
if ($tekemje==0 AND $disablef<>3) {echo "<i>Next round matches are not scheduled yet.</i><br/>";}
if ($tekemje==0 AND $disablef==3) {echo "<i>World Cup fantasy for this season has ended. Thank you for playing and see you again next season!</i><br/>";}
?>
</table>
<br/><h2><?=$langmark983?></h2>
<br/>WCFG5 - <a href="league.php?country=Greece"><img src="img/Flags/Greece.png" border="0" title="Greece"></a> <a href="club.php?clubid=14445">kutsuk7</a> (2299)
<br/>WCFG4 - <a href="league.php?country=Greece"><img src="img/Flags/Greece.png" border="0" title="Greece"></a> <a href="club.php?clubid=14445">kutsuk7</a> (1766)
<br/>WCFG3 - <a href="league.php?country=Spain"><img src="img/Flags/Spain.png" border="0" title="Spain"></a> <a href="club.php?clubid=35746">Rainman</a> (2288)
<br/>WCFG2 - <a href="league.php?country=Romania"><img src="img/Flags/Romania.png" border="0" title="Romania"></a> <a href="club.php?clubid=83212">PerSempre</a> (1846)
<br/>WCFG1 - <a href="league.php?country=Greece"><img src="img/Flags/Greece.png" border="0" title="Greece"></a> <a href="club.php?clubid=8814">theobasketsim</a> (2018)
<br/><br/>
<?php
}
//vrsni redi
$dispa = $_GET['disp'];
if (!$dispa) {$dispa='wee';}
SWITCH ($dispa) {
CASE 'wee':
if ($gamew-1<>0) {echo "<h2>Best managers in week ",($gamew-1)," <a href=\"bsfantasy.php?act=latest&disp=tot\" class=\"toptitle\" title=\"Best total score\">[+]</a></h2>";} $labas = mysql_query("SELECT user, username, 2 * pg1score +2 * sg1score +2 * sf1score +2 * pf1score +2 * c1score + pg2score + sg2score + sf2score + pf2score + c2score AS points FROM fantasy WHERE compet =$competu AND week=$gamew-1 ORDER BY points DESC , id ASC"); break;
CASE 'tot':
if ($gamew-1<>0) {echo "<h2>Best total score <a href=\"bsfantasy.php?act=latest&disp=wee\" class=\"toptitle\" title=\"Best weekly score\">[-]</a></h2>";} $labas = mysql_query("SELECT user, username, sum( 2 * pg1score +2 * sg1score +2 * sf1score +2 * pf1score +2 * c1score + pg2score + sg2score + sf2score + pf2score + c2score ) AS points FROM fantasy WHERE compet =$competu GROUP BY user ORDER BY points DESC , id ASC"); break;
}
?>
<br/><table width="100%" border="0" cellpadding="1" cellspacing="0">
<?php
$dang=1;
while ($i = mysql_fetch_array($labas)) {
$userl=$i[user];
$usernd=$i[username];
$pts=$i[points];
$coza='white';
if ($userl==$man) {$coza='lightblue';}
if ($userl==$userid) {$coza='#FFCC66';}
echo "<tr bgcolor=\"$coza\"><td bgcolor=\"$coza\">",$dang,". <a href=\"bsfantasy.php?act=latest&man=",$userl,"&disp=",$dispa,"\">",$usernd,"</a></td><td align=\"right\" bgcolor=\"$coza\">",$pts,"</td></tr>";
$dang++;
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