<?php
$matchid=$_GET['matchid'];
if (!is_numeric($matchid)) {header( 'Location: matches.php' ); die ();}
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$comparepasss = mysql_query("SELECT `club`, `lang` FROM `users` WHERE `password` ='$koda' AND `userid` ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($comparepasss)) {
$get_team = mysql_result($comparepasss,0,"club");
$lang = mysql_result ($comparepasss,0,"lang");
}
else {die(include 'basketsim.php');}

$results=mysql_query("SELECT `id`, `name`, `surname`, `injury` FROM `players` WHERE coach<>9 AND `club` ='$get_team'") or die(mysql_error());
$zdaj1 = date("Y-m-d H:i:s");
$splitdate = explode(" ", $zdaj1); $date1 = $splitdate[0]; $time1 = $splitdate[1];
$split1 = explode("-", $date1); $tyear = $split1[0]; $tmonth = $split1[1]; $tday = $split1[2];
$split2 = explode(":", $time1); $thour = $split2[0]; $tmin = $split2[1]; $tsec = $split2[2];
$zdaj = date("Y-m-d H:i:s", mktime($thour,$tmin+30,$tsec,$tmonth,$tday,$tyear));

$matchesqu = mysql_query("SELECT `home_id` FROM `matches` WHERE `matchid`='$matchid' AND `time` > '$zdaj'") or die(mysql_error());
if (mysql_num_rows($matchesqu) < 1) {header( 'Location: matches.php' ); die ();}
if (!$matchesqu) {header( 'Location: matches.php' ); die ();}
$hometeam=mysql_result($matchesqu,0) or die(mysql_error());
$matchesquer = mysql_query("SELECT `away_id` FROM `matches` WHERE `matchid` ='$matchid' LIMIT 1") or die(mysql_error());
$awayteam=mysql_result($matchesquer,0) or die(mysql_error());

$ime1q = mysql_query("SELECT name FROM teams WHERE teamid = '$hometeam'") or die(mysql_error()); $ime1 = stripslashes(mysql_result($ime1q,0));
$ime2q = mysql_query("SELECT name FROM teams WHERE teamid = '$awayteam'") or die(mysql_error()); $ime2 = stripslashes(mysql_result($ime2q,0));

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
$backup_g = $_POST["backup_g"];
$backup_f = $_POST["backup_f"];
$def_strat = $_POST["def_strat"];
$off_strat = $_POST["off_strat"];
$def_tactic = $_POST["def_tactic"];

if (!$starting_pg) {$starting_pg=0;}
if (!$starting_sg) {$starting_sg=0;}
if (!$starting_sf) {$starting_sf=0;}
if (!$starting_pf) {$starting_pf=0;}
if (!$starting_c) {$starting_c=0;}
if (!$reserve_pg) {$reserve_pg=0;}
if (!$reserve_sg) {$reserve_sg=0;}
if (!$reserve_sf) {$reserve_sf=0;}
if (!$reserve_pf) {$reserve_pf=0;}
if (!$reserve_c) {$reserve_c=0;}
if (!$backup_g) {$backup_g=0;}
if (!$backup_f) {$backup_f=0;}

if ($starting_pg==$starting_sg AND $starting_pg<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($starting_pg==$starting_sf AND $starting_pg<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($starting_pg==$starting_pf AND $starting_pg<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($starting_pg==$starting_c AND $starting_pg<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($starting_sg==$starting_sf AND $starting_sg<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($starting_sg==$starting_pf AND $starting_sg<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($starting_sg==$starting_c AND $starting_sg<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($starting_sf==$starting_pf AND $starting_sf<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($starting_sf==$starting_c AND $starting_sf<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($starting_pf==$starting_c AND $starting_pf<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($starting_pg==$reserve_pg AND $starting_pg<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($starting_pg==$reserve_sg AND $starting_pg<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($starting_pg==$reserve_sf AND $starting_pg<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($starting_pg==$reserve_pf AND $starting_pg<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($starting_pg==$reserve_c AND $starting_pg<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($starting_sg==$reserve_sg AND $starting_sg<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($starting_sg==$reserve_sf AND $starting_sg<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($starting_sg==$reserve_pf AND $starting_sg<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($starting_sg==$reserve_c AND $starting_sg<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($starting_sf==$reserve_sf AND $starting_sf<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($starting_sf==$reserve_pf AND $starting_sf<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($starting_sf==$reserve_c AND $starting_sf<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($starting_pf==$reserve_pf AND $starting_pf<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($starting_pf==$reserve_c AND $starting_pf<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($starting_c==$reserve_c AND $starting_c<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($reserve_pg==$reserve_sg AND $reserve_pg<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($reserve_pg==$reserve_sf AND $reserve_pg<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($reserve_pg==$reserve_pf AND $reserve_pg<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($reserve_pg==$reserve_c AND $reserve_pg<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($reserve_sg==$reserve_sf AND $reserve_sg<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($reserve_sg==$reserve_pf AND $reserve_sg<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($reserve_sg==$reserve_c AND $reserve_sg<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($reserve_sf==$reserve_pf AND $reserve_sf<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($reserve_sf==$reserve_c AND $reserve_sf<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($reserve_pf==$reserve_c AND $reserve_pf<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($starting_pg==$backup_g AND $starting_pg<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($starting_pg==$backup_f AND $starting_pg<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($starting_sg==$backup_g AND $starting_sg<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($starting_sg==$backup_f AND $starting_sg<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($starting_sf==$backup_g AND $starting_sf<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($starting_sf==$backup_f AND $starting_sf<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($starting_pf==$backup_g AND $starting_pf<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($starting_pf==$backup_f AND $starting_pf<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($starting_c==$backup_g AND $starting_c<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($starting_c==$backup_f AND $starting_c<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($reserve_pg==$backup_g AND $reserve_pg<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($reserve_pg==$backup_f AND $reserve_pg<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($reserve_sg==$backup_g AND $reserve_sg<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($reserve_sg==$backup_f AND $reserve_sg<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($reserve_sf==$backup_g AND $reserve_sf<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($reserve_sf==$backup_f AND $reserve_sf<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($reserve_pf==$backup_g AND $reserve_pf<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($reserve_pf==$backup_f AND $reserve_pf<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($reserve_c==$backup_g AND $reserve_c<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}
if ($reserve_c==$backup_f AND $reserve_c<>0){header("Location: tactics.php?matchid=$matchid&error=sp"); die();}

if ($starting_pg==0 || $starting_sg==0 || $starting_sf==0 || $starting_pf==0 || $starting_c==0) {header( "Location: tactics.php?matchid=$matchid&error=dlnv" ); die ();}

if ($hometeam == $get_team) {mysql_query("UPDATE matches SET home_def=$def_strat, home_off=$off_strat, home_pg1=$starting_pg, home_sg1=$starting_sg, home_sf1=$starting_sf, home_pf1=$starting_pf, home_c1=$starting_c, home_pg2=$reserve_pg, home_sg2=$reserve_sg, home_sf2=$reserve_sf, home_pf2=$reserve_pf, home_c2=$reserve_c, home_set=1 WHERE matchid ='$matchid'") or die(mysql_error());}
if ($awayteam == $get_team) {mysql_query("UPDATE matches SET away_def=$def_strat, away_off=$off_strat, away_pg1=$starting_pg, away_sg1=$starting_sg, away_sf1=$starting_sf, away_pf1=$starting_pf, away_c1=$starting_c, away_pg2=$reserve_pg, away_sg2=$reserve_sg, away_sf2=$reserve_sf, away_pf2=$reserve_pf, away_c2=$reserve_c, away_set=1 WHERE matchid ='$matchid'") or die(mysql_error());}
if ($def_tactic == 1) {mysql_query("UPDATE tactics SET start_pg=$starting_pg, start_sg=$starting_sg, start_sf=$starting_sf, start_pf=$starting_pf, start_c=$starting_c, res_pg=$reserve_pg, res_sg=$reserve_sg, res_sf=$reserve_sf, res_pf=$reserve_pf, res_c=$reserve_c, backup_g=$backup_g, backup_f=$backup_f WHERE tactics_team ='$get_team'") or die(mysql_error());}
header( 'Location: matches.php' );
}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>
<body onload="ffoxSelectUpdate(document.lineup.starting_pg);
ffoxSelectUpdate(document.lineup.starting_sf);
ffoxSelectUpdate(document.lineup.starting_pf);
ffoxSelectUpdate(document.lineup.starting_sg);
ffoxSelectUpdate(document.lineup.starting_c);
ffoxSelectUpdate(document.lineup.reserve_pg);
ffoxSelectUpdate(document.lineup.reserve_sf);
ffoxSelectUpdate(document.lineup.reserve_pf);
ffoxSelectUpdate(document.lineup.reserve_sg);
ffoxSelectUpdate(document.lineup.reserve_c);
ffoxSelectUpdate(document.lineup.backup_g);
ffoxSelectUpdate(document.lineup.backup_f);
">


<div id="main">
<h2><?=$langmark1054?> >> <?=stripslashes($ime1)?> - <?=stripslashes($ime2)?></h2>

<?php
$matchesquery = mysql_query("SELECT * FROM `matches` WHERE `matchid` ='$matchid' LIMIT 1") or die(mysql_error());
$home_def=mysql_result($matchesquery,0,"home_def");
$home_off=mysql_result($matchesquery,0,"home_off");
$away_def=mysql_result($matchesquery,0,"away_def");
$away_off=mysql_result($matchesquery,0,"away_off");
$home_pg1=mysql_result($matchesquery,0,"home_pg1");
$home_sg1=mysql_result($matchesquery,0,"home_sg1");
$home_sf1=mysql_result($matchesquery,0,"home_sf1");
$home_pf1=mysql_result($matchesquery,0,"home_pf1");
$home_c1=mysql_result($matchesquery,0,"home_c1");
$away_pg1=mysql_result($matchesquery,0,"away_pg1");
$away_sg1=mysql_result($matchesquery,0,"away_sg1");
$away_sf1=mysql_result($matchesquery,0,"away_sf1");
$away_pf1=mysql_result($matchesquery,0,"away_pf1");
$away_c1=mysql_result($matchesquery,0,"away_c1");
$home_pg2=mysql_result($matchesquery,0,"home_pg2");
$home_sg2=mysql_result($matchesquery,0,"home_sg2");
$home_sf2=mysql_result($matchesquery,0,"home_sf2");
$home_pf2=mysql_result($matchesquery,0,"home_pf2");
$home_c2=mysql_result($matchesquery,0,"home_c2");
$away_pg2=mysql_result($matchesquery,0,"away_pg2");
$away_sg2=mysql_result($matchesquery,0,"away_sg2");
$away_sf2=mysql_result($matchesquery,0,"away_sf2");
$away_pf2=mysql_result($matchesquery,0,"away_pf2");
$away_c2=mysql_result($matchesquery,0,"away_c2");
$home_set=mysql_result($matchesquery,0,"home_set");
$away_set=mysql_result($matchesquery,0,"away_set");

//default lineupi

if ($get_team == $hometeam AND $home_set == 0) {
$def = mysql_query("SELECT * FROM tactics WHERE tactics_team ='$get_team'") or die(mysql_error());
$home_pg1 = mysql_result($def,0,"start_pg");
$home_sg1 = mysql_result($def,0,"start_sg");
$home_sf1 = mysql_result($def,0,"start_sf");
$home_pf1 = mysql_result($def,0,"start_pf");
$home_c1 = mysql_result($def,0,"start_c");
$home_pg2 = mysql_result($def,0,"res_pg");
$home_sg2 = mysql_result($def,0,"res_sg");
$home_sf2 = mysql_result($def,0,"res_sf");
$home_pf2 = mysql_result($def,0,"res_pf");
$home_c2 = mysql_result($def,0,"res_c");
$home_bg = mysql_result($def,0,"backup_g");
$home_bf = mysql_result($def,0,"backup_f");
}

if ($get_team == $awayteam AND $away_set == 0) {
$def = mysql_query("SELECT * FROM tactics WHERE tactics_team ='$get_team'") or die(mysql_error());
$away_pg1 = mysql_result($def,0,"start_pg");
$away_sg1 = mysql_result($def,0,"start_sg");
$away_sf1 = mysql_result($def,0,"start_sf");
$away_pf1 = mysql_result($def,0,"start_pf");
$away_c1 = mysql_result($def,0,"start_c");
$away_pg2 = mysql_result($def,0,"res_pg");
$away_sg2 = mysql_result($def,0,"res_sg");
$away_sf2 = mysql_result($def,0,"res_sf");
$away_pf2 = mysql_result($def,0,"res_pf");
$away_c2 = mysql_result($def,0,"res_c");
$away_bg = mysql_result($def,0,"backup_g");
$away_bf = mysql_result($def,0,"backup_f");
}

if ($hometeam <> $get_team AND $awayteam <> $get_team) {die ("<table cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">$langmark1055<br/><a href=\"matches.php\">$langmark059</a></td></tr></table>");}
?>

<SCRIPT language="Javascript">
<!--
function PlayerInUse(id)
{
var PlayerExist = false;
if (id == document.lineup.starting_pg.value){PlayerExist = true;}
else if (id == document.lineup.starting_sg.value){PlayerExist = true;}
else if (id == document.lineup.starting_sf.value){PlayerExist = true;}        
else if (id == document.lineup.starting_pf.value){PlayerExist = true;}        
else if (id == document.lineup.starting_c.value){PlayerExist = true;}
return PlayerExist;
}
        
function podvajanje(id, FromField) {
if (FromField == 'pointguard'){
}else if (id == document.lineup.starting_pg.value){document.lineup.starting_pg.value = '';document.lineup.starting_pg.style.cssText='background:white';}
if (FromField == 'shootingguard'){
}else if (id == document.lineup.starting_sg.value){document.lineup.starting_sg.value = '';document.lineup.starting_sg.style.cssText='background:white';}
if (FromField == 'smallforward'){
}else if (id == document.lineup.starting_sf.value){document.lineup.starting_sf.value = '';document.lineup.starting_sf.style.cssText='background:white';}
if (FromField == 'powerforward'){
}else if (id == document.lineup.starting_pf.value){document.lineup.starting_pf.value = '';document.lineup.starting_pf.style.cssText='background:white';}
if (FromField == 'center'){
}else if (id == document.lineup.starting_c.value){document.lineup.starting_c.value = '';document.lineup.starting_c.style.cssText='background:white';}
if (FromField == 'pointguard2'){
}else if (id == document.lineup.reserve_pg.value){document.lineup.reserve_pg.value = '';document.lineup.reserve_pg.style.cssText='background:white';}
if (FromField == 'shootingguard2'){
}else if (id == document.lineup.reserve_sg.value){document.lineup.reserve_sg.value = '';document.lineup.reserve_sg.style.cssText='background:white';}
if (FromField == 'smallforward2'){
}else if (id == document.lineup.reserve_sf.value){document.lineup.reserve_sf.value = '';document.lineup.reserve_sf.style.cssText='background:white';}
if (FromField == 'powerforward2'){
}else if (id == document.lineup.reserve_pf.value){document.lineup.reserve_pf.value = '';document.lineup.reserve_pf.style.cssText='background:white';}
if (FromField == 'center2'){
}else if (id == document.lineup.reserve_c.value){document.lineup.reserve_c.value = '';document.lineup.reserve_c.style.cssText='background:white';}
if (FromField == 'backupguard'){
}else if (id == document.lineup.backup_g.value){document.lineup.backup_g.value = '';document.lineup.backup_g.style.cssText='background:white';}
if (FromField == 'backupforward'){
}else if (id == document.lineup.backup_f.value){document.lineup.backup_f.value = '';document.lineup.backup_f.style.cssText='background:white';}
}
//-->

function ffoxSelectUpdate(elmt)
{
if(!document.all) elmt.style.cssText =
elmt.options[elmt.selectedIndex].style.cssText;
}
</SCRIPT>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="52%">

<?php
$error=$_GET['error'];
if ($error == 'sp') {echo "<font color=\"darkred\"><b>",$langmark1056,"</b></font>";}
elseif ($error == 'dlnv') {echo "<font color=\"darkred\"><b>Lineup is not valid, all starting players must be set!</b></font>";}
?>

<form name="lineup" method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="margin: 0">
<table cellpadding="0" cellspacing="0" width="100%">

<tr><td><b><?=$langmark1057?></b><hr/></td></tr>
<tr><td><?=$langmark386?>:</td><td>
   <?php
echo"<select name=\"starting_pg\" size=\"1\" onchange=\"ffoxSelectUpdate(this);podvajanje(document.lineup.starting_pg.options[document.lineup.starting_pg.selectedIndex].value,'pointguard');\">";
echo '<option style="background:white"> </option>';
for($u=0; $u<mysql_num_rows($results); $u++){ $id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$injury=mysql_result($results,$u,"injury");
?>
<option <?php if($injury>=1){echo "style=\"background:red\"";}elseif($injury>0 && $injury<=1){echo "style=\"background:green\"";}else{echo "style=\"background:white\"";} if($id==$home_pg1 OR $id==$away_pg1){echo " selected";}?> value="<?=$id?>"><?=$name," ",$surname?></option><?php }?>
</select></td></tr>

<tr><td><?=$langmark387?>:</td><td>
   <?php
echo"<select name=\"starting_sg\" size=\"1\" onchange=\"ffoxSelectUpdate(this);podvajanje(document.lineup.starting_sg.options[document.lineup.starting_sg.selectedIndex].value,'shootingguard');\">";
echo '<option style="background:white"> </option>';
for($u=0; $u<mysql_num_rows($results); $u++){ $id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$injury=mysql_result($results,$u,"injury");
?>
<option <?php if($injury>=1){echo "style=\"background:red\"";}elseif($injury>0 && $injury<=1){echo "style=\"background:green\"";}else{echo "style=\"background:white\"";} if($id==$home_sg1 OR $id==$away_sg1){echo " selected";}?> value="<?=$id?>"><?=$name," ",$surname?></option><?php }?>
</select></td></tr>

<tr><td><?=$langmark388?>:</td><td>
   <?php
echo"<select name=\"starting_sf\" size=\"1\" onchange=\"ffoxSelectUpdate(this);podvajanje(document.lineup.starting_sf.options[document.lineup.starting_sf.selectedIndex].value,'smallforward');\">";
echo '<option style="background:white"> </option>';
for($u=0; $u<mysql_num_rows($results); $u++){ $id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$injury=mysql_result($results,$u,"injury");
?>
<option <?php if($injury>=1){echo "style=\"background:red\"";}elseif($injury>0 && $injury<=1){echo "style=\"background:green\"";}else{echo "style=\"background:white\"";} if($id==$home_sf1 OR $id==$away_sf1){echo " selected";}?> value="<?=$id?>"><?=$name," ",$surname?></option><?php }?>
</select></td></tr>

<tr><td><?=$langmark389?>:</td><td>
   <?php
echo"<select name=\"starting_pf\" size=\"1\" onchange=\"ffoxSelectUpdate(this);podvajanje(document.lineup.starting_pf.options[document.lineup.starting_pf.selectedIndex].value,'powerforward');\">";
echo '<option style="background:white"> </option>';
for($u=0; $u<mysql_num_rows($results); $u++){ $id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$injury=mysql_result($results,$u,"injury");
?>
<option <?php if($injury>=1){echo "style=\"background:red\"";}elseif($injury>0 && $injury<=1){echo "style=\"background:green\"";}else{echo "style=\"background:white\"";} if($id==$home_pf1 OR $id==$away_pf1){echo " selected";}?> value="<?=$id?>"><?=$name," ",$surname?></option><?php }?>
</select></td></tr>

<tr><td><?=$langmark390?>:</td><td>
   <?php
echo"<select name=\"starting_c\" size=\"1\" onchange=\"ffoxSelectUpdate(this);podvajanje(document.lineup.starting_c.options[document.lineup.starting_c.selectedIndex].value,'center');\">";
echo '<option style="background:white"> </option>';
for($u=0; $u<mysql_num_rows($results); $u++){ $id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$injury=mysql_result($results,$u,"injury");
?>
<option <?php if($injury>=1){echo "style=\"background:red\"";}elseif($injury>0 && $injury<=1){echo "style=\"background:green\"";}else{echo "style=\"background:white\"";} if($id==$home_c1 OR $id==$away_c1){echo " selected";}?> value="<?=$id?>"><?=$name," ",$surname?></option><?php }?>
</select></td></tr>

<tr><td><hr><b><?=$langmark1058?></b><hr></td></tr>

<tr><td><?=$langmark386?>:</td><td>
   <?php
echo"<select name=\"reserve_pg\" size=\"1\" onchange=\"ffoxSelectUpdate(this);podvajanje(document.lineup.reserve_pg.options[document.lineup.reserve_pg.selectedIndex].value,'pointguard2');\">";
echo '<option style="background:white"> </option>';
for($u=0; $u<mysql_num_rows($results); $u++){ $id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$injury=mysql_result($results,$u,"injury");
?>
<option <?php if($injury>=1){echo "style=\"background:red\"";}elseif($injury>0 && $injury<=1){echo "style=\"background:green\"";}else{echo "style=\"background:white\"";} if($id==$home_pg2 OR $id==$away_pg2){echo " selected";}?> value="<?=$id?>"><?=$name," ",$surname?></option><?php }?>
</select></td></tr>

<tr><td><?=$langmark387?>:</td><td>
   <?php
echo"<select name=\"reserve_sg\" size=\"1\" onchange=\"ffoxSelectUpdate(this);podvajanje(document.lineup.reserve_sg.options[document.lineup.reserve_sg.selectedIndex].value,'shootingguard2');\">";
echo '<option style="background:white"> </option>';
for($u=0; $u<mysql_num_rows($results); $u++){ $id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$injury=mysql_result($results,$u,"injury");
?>
<option <?php if($injury>=1){echo "style=\"background:red\"";}elseif($injury>0 && $injury<=1){echo "style=\"background:green\"";}else{echo "style=\"background:white\"";} if($id==$home_sg2 OR $id==$away_sg2){echo " selected";}?> value="<?=$id?>"><?=$name," ",$surname?></option><?php }?>
</select></td></tr>

<tr><td><?=$langmark388?>:</td><td>
   <?php
echo"<select name=\"reserve_sf\" size=\"1\" onchange=\"ffoxSelectUpdate(this);podvajanje(document.lineup.reserve_sf.options[document.lineup.reserve_sf.selectedIndex].value,'smallforward2');\">";
echo '<option style="background:white"> </option>';
for($u=0; $u<mysql_num_rows($results); $u++){ $id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$injury=mysql_result($results,$u,"injury");
?>
<option <?php if($injury>=1){echo "style=\"background:red\"";}elseif($injury>0 && $injury<=1){echo "style=\"background:green\"";}else{echo "style=\"background:white\"";} if($id==$home_sf2 OR $id==$away_sf2){echo " selected";}?> value="<?=$id?>"><?=$name," ",$surname?></option><?php }?>
</select></td></tr>

<tr><td><?=$langmark389?>:</td><td>
   <?php
echo"<select name=\"reserve_pf\" size=\"1\" onchange=\"ffoxSelectUpdate(this);podvajanje(document.lineup.reserve_pf.options[document.lineup.reserve_pf.selectedIndex].value,'powerforward2');\">";
echo '<option style="background:white"> </option>';
for($u=0; $u<mysql_num_rows($results); $u++){ $id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$injury=mysql_result($results,$u,"injury");
?>
<option <?php if($injury>=1){echo "style=\"background:red\"";}elseif($injury>0 && $injury<=1){echo "style=\"background:green\"";}else{echo "style=\"background:white\"";} if($id==$home_pf2 OR $id==$away_pf2){echo " selected";}?> value="<?=$id?>"><?=$name," ",$surname?></option><?php }?>
</select></td></tr>

<tr><td><?=$langmark390?>:</td><td>
   <?php
echo"<select name=\"reserve_c\" size=\"1\" onchange=\"ffoxSelectUpdate(this);podvajanje(document.lineup.reserve_c.options[document.lineup.reserve_c.selectedIndex].value,'center2');\">";
echo '<option style="background:white"> </option>';
for($u=0; $u<mysql_num_rows($results); $u++){ $id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$injury=mysql_result($results,$u,"injury");
?>
<option <?php if($injury>=1){echo "style=\"background:red\"";}elseif($injury>0 && $injury<=1){echo "style=\"background:green\"";}else{echo "style=\"background:white\"";} if($id==$home_c2 OR $id==$away_c2){echo " selected";}?> value="<?=$id?>"><?=$name," ",$surname?></option><?php }?>
</select></td></tr>
 
<tr><td><hr><b>BACKUP</b><hr></td></tr>

<tr><td>Guard:</td><td>
   <?php
echo"<select name=\"backup_g\" size=\"1\" onchange=\"ffoxSelectUpdate(this);podvajanje(document.lineup.backup_g.options[document.lineup.backup_g.selectedIndex].value,'backupguard');\">";
echo '<option style="background:white"> </option>';
for($u=0; $u<mysql_num_rows($results); $u++){ $id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$injury=mysql_result($results,$u,"injury");
?>
<option <?php if($injury>=1){echo "style=\"background:red\"";}elseif($injury>0 && $injury<=1){echo "style=\"background:green\"";}else{echo "style=\"background:white\"";} if($id==$home_bg OR $id==$away_bg){echo " selected";}?> value="<?=$id?>"><?=$name," ",$surname?></option><?php }?>
</select></td></tr>

<tr><td>Forward:</td><td>
   <?php
echo"<select name=\"backup_f\" size=\"1\" onchange=\"ffoxSelectUpdate(this);podvajanje(document.lineup.backup_f.options[document.lineup.backup_f.selectedIndex].value,'backupforward');\">";
echo '<option style="background:white"> </option>';
for($u=0; $u<mysql_num_rows($results); $u++){ $id=mysql_result($results,$u,'id');
$name=mysql_result($results,$u,'name');
$surname=mysql_result($results,$u,'surname');
$injury=mysql_result($results,$u,"injury");
?>
<option <?php if($injury>=1){echo "style=\"background:red\"";}elseif($injury>0 && $injury<=1){echo "style=\"background:green\"";}else{echo "style=\"background:white\"";} if($id==$home_gf OR $id==$away_bf){echo " selected";}?> value="<?=$id?>"><?=$name," ",$surname?></option><?php }?>
</select></td></tr>

</tr></table>

</td><td class="border" width="48%">

<h2><?=$langmark1059?></h2><br/>

<table width="250">
<tr><td><b><?=$langmark1060?>:</b></td><td>

<?php if ($hometeam == $get_team) {
?>
<select name="def_strat">
<option <?php if($home_def==0){echo "selected";}?> value="0"><?=$langmark722?></option>
<option <?php if($home_def==1){echo "selected";}?> value="1"><?=$langmark723?></option>
<option <?php if($home_def==2){echo "selected";}?> value="2"><?=$langmark724?></option>
<option <?php if($home_def==3){echo "selected";}?> value="3"><?=$langmark725?></option>
<option <?php if($home_def==4){echo "selected";}?> value="4"><?=$langmark726?></option>
<option <?php if($home_def==5){echo "selected";}?> value="5"><?=$langmark727?></option>
</select></td></tr>
<?php
}
if ($awayteam == $get_team) {
?>
<select name="def_strat">
<option <?php if($away_def==0){echo "selected";}?> value="0"><?=$langmark722?></option>
<option <?php if($away_def==1){echo "selected";}?> value="1"><?=$langmark723?></option>
<option <?php if($away_def==2){echo "selected";}?> value="2"><?=$langmark724?></option>
<option <?php if($away_def==3){echo "selected";}?> value="3"><?=$langmark725?></option>
<option <?php if($away_def==4){echo "selected";}?> value="4"><?=$langmark726?></option>
<option <?php if($away_def==5){echo "selected";}?> value="5"><?=$langmark727?></option>
</select></td></tr>
<?php
}
if ($hometeam == $get_team) {
?>
<tr><td><b><?=$langmark1061?>:</b></td><td>
<select name="off_strat">
<option <?php if($home_off==0){echo "selected";}?> value="0"><?=$langmark722?></option>
<option <?php if($home_off==1){echo "selected";}?> value="1"><?=$langmark728?></option>
<option <?php if($home_off==2){echo "selected";}?> value="2"><?=$langmark729?></option>
<option <?php if($home_off==3){echo "selected";}?> value="3"><?=$langmark730?></option>
<option <?php if($home_off==4){echo "selected";}?> value="4"><?=$langmark731?></option>
<option <?php if($home_off==5){echo "selected";}?> value="5"><?=$langmark732?></option>
</select></td></tr>
<?php
}
if ($awayteam == $get_team) {
?>
<tr><td><b><?=$langmark1061?>:</b></td><td>
<select name="off_strat">
<option <?php if($away_off==0){echo "selected";}?> value="0"><?=$langmark722?></option>
<option <?php if($away_off==1){echo "selected";}?> value="1"><?=$langmark728?></option>
<option <?php if($away_off==2){echo "selected";}?> value="2"><?=$langmark729?></option>
<option <?php if($away_off==3){echo "selected";}?> value="3"><?=$langmark730?></option>
<option <?php if($away_off==4){echo "selected";}?> value="4"><?=$langmark731?></option>
<option <?php if($away_off==5){echo "selected";}?> value="5"><?=$langmark732?></option>
</select></td></tr>
<?php } ?>

<tr><td colspan="2" align="right"><br/><?=$langmark1062?> 
<input style="margin:0; padding:0;" type="checkbox" name="def_tactic" value="1" /></td></tr>

<tr><td colspan="2" align="right">
<br/><input type="submit" name="submit" value="<?=$langmark1063?>">

<SCRIPT language="Javascript">
<!--
function clearlineup() {
document.lineup.starting_pg.value = '';
document.lineup.starting_sg.value = '';
document.lineup.starting_sf.value = '';
document.lineup.starting_pf.value = '';
document.lineup.starting_c.value = '';
document.lineup.reserve_pg.value = '';
document.lineup.reserve_sg.value = '';
document.lineup.reserve_sf.value = '';
document.lineup.reserve_pf.value = '';
document.lineup.reserve_c.value = '';
document.lineup.backup_g.value = '';
document.lineup.backup_f.value = '';
}
function swapLineup() {
var swapLineupTemp;
swapLineupTemp = document.lineup.starting_pg.selectedIndex;
document.lineup.starting_pg.selectedIndex = document.lineup.reserve_pg.selectedIndex;
document.lineup.reserve_pg.selectedIndex = swapLineupTemp;

swapLineupTemp = document.lineup.starting_sg.selectedIndex;
document.lineup.starting_sg.selectedIndex = document.lineup.reserve_sg.selectedIndex;
document.lineup.reserve_sg.selectedIndex = swapLineupTemp;

swapLineupTemp = document.lineup.starting_sf.selectedIndex;
document.lineup.starting_sf.selectedIndex = document.lineup.reserve_sf.selectedIndex;
document.lineup.reserve_sf.selectedIndex = swapLineupTemp;

swapLineupTemp = document.lineup.starting_pf.selectedIndex;
document.lineup.starting_pf.selectedIndex = document.lineup.reserve_pf.selectedIndex;
document.lineup.reserve_pf.selectedIndex = swapLineupTemp;

swapLineupTemp = document.lineup.starting_c.selectedIndex;
document.lineup.starting_c.selectedIndex = document.lineup.reserve_c.selectedIndex;
document.lineup.reserve_c.selectedIndex = swapLineupTemp;
}
//-->
</SCRIPT>

<input type="button" value="Swap" onClick="swapLineup();">&nbsp;<input type="button" value="Clear" onClick="clearlineup();">

</td></tr></table>

<br/><br/>
&nbsp;&nbsp;&nbsp;<img src="img/tactics_2.jpg" width="230" height="140" border="0" usemap="#map" />
<map name="map">
<!-- #$-:Image Map file created by GIMP Imagemap Plugin -->
<!-- #$-:GIMP Imagemap Plugin by Maurits Rijk -->
<!-- #$-:Please do not edit lines starting with "#$" -->
<!-- #$VERSION:2.0 -->
<!-- #$AUTHOR:Tomaz Kranjc -->
<area shape="circle" coords="155,68,7" alt="<?=$langmark386?>" title="<?=$langmark386?>" href="players.php?desc=PG" />
<area shape="circle" coords="163,104,7" alt="<?=$langmark387?>" title="<?=$langmark387?>" href="players.php?desc=SG" />
<area shape="circle" coords="187,44,6" alt="<?=$langmark390?>" title="<?=$langmark390?>" href="players.php?desc=C" />
<area shape="circle" coords="219,22,7" alt="<?=$langmark388?>" title="<?=$langmark388?>" href="players.php?desc=SF" />
<area shape="circle" coords="213,94,7" alt="<?=$langmark389?>" title="<?=$langmark389?>" href="players.php?desc=PF" />
</map>
<noscript><br/><b>Tip:</b> switching on javascript in your browser can make match set-up a bit easier for you!</noscript>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>