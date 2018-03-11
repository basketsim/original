<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}
$compare = mysql_query("SELECT club, lang, country FROM users, teams WHERE club=teamid AND password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)){
$get_team = mysql_result ($compare,0,"club");
$lang = mysql_result ($compare,0,"lang");
$country = mysql_result ($compare,0,"country");
}
else {die(include 'basketsim.php');}

if (isset($_POST['submitC'])) {mysql_query("DELETE FROM `weight` WHERE `team` ='$get_team' LIMIT 200") or die(mysql_error());}
if (isset($_POST['submit'])) {
$numb = $_POST["numb"];
$n=0;
while ($n < $numb) {
$formid = "formid_".$n;
$igralec = "igralec_".$n;
$type = "type_".$n;
$focus = "focus_".$n;
$idform = $_POST["$formid"];
$igralcek = $_POST["$igralec"];
$typec = $_POST["$type"];
$fokusus = $_POST["$focus"];
if ($idform==0 AND is_numeric($igralcek) AND ($igralcek > 0) AND ($typec>0) AND ($fokusus>0) AND is_numeric($typec) AND is_numeric($fokusus)) {
mysql_query("INSERT INTO weight VALUES ('', $get_team, $igralcek, $typec, $fokusus, 0);") or die(mysql_error());}
elseif ($idform>0 AND is_numeric($idform) AND ($igralcek > 0) AND is_numeric($igralcek) AND ($typec>0) AND ($fokusus>0) AND is_numeric($typec) AND is_numeric($fokusus)) {
mysql_query("UPDATE weight SET training ='$typec', focus ='$fokusus', `change` =0 WHERE player ='$igralcek' AND team ='$get_team' AND id ='$idform'") or die(mysql_error());}
else {
@mysql_query("UPDATE weight SET training ='0', focus ='0', `change` =0 WHERE player ='$igralcek' AND team ='$get_team' AND id ='$idform'");
@mysql_query("DELETE FROM weight WHERE player ='$igralcek' AND team ='$get_team' AND id ='$idform' LIMIT 5");
}
$n++;
}
header('Location:weight.php');
}

require("inc/lang/".$lang.".php");
include('inc/header.php');
include('inc/osnova.php');

if ($country=='USA') {$oz1='ft'; $oz2='lb';} else {$oz1='cm'; $oz2='kg';}
?>

<div id="main">
<h2>Physical Training</h2>
<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="69%">
<b>Assign training type and focus for your players.</b><br/><br/>
<table cellspacing="1" cellpadding="1" width="100%">
<tr><td><b>Player</b></td><td align="center"><b><?=$oz1?></b></td><td align="center"><b><?=$oz2?></b></td><td align="center"><b>Type</b></td><td align="center"><b>Focus</b></td><td align="right"><b>Last</b></td></tr>
<form name="ptren" method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="margin: 0">
<?php
$kul = mysql_query("SELECT `id`, `name`, `surname`, `height`, `weight`, `injury`, `fatigue` FROM `players` WHERE coach<>1 AND `club` ='$get_team'") or die(mysql_error());
$k=0;
while ($pin = mysql_fetch_array($kul)) {
$id = $pin['id'];
$name = $pin['name'];
$surname = $pin['surname'];
$height= $pin['height'];
$weight= $pin['weight'];
$injury= $pin['injury'];
$fatigue= $pin['fatigue'];
if ($country=='USA') {
$feetheight = floor((100*$height)/3048);
$tempheight = $height - ($feetheight*3048/100);
$inchheight = round((100*$tempheight)/254);
if ($inchheight==12) {$feetheight=$feetheight+1; $inchheight=''; $usheight = $feetheight."'0";} else {$usheight = $feetheight."'".$inchheight;}
$usweight = round ($weight * 22046 / 10000);
} else {$usheight=$height; $usweight=round($weight);}
if (mb_strlen($name)+mb_strlen($surname) > 23) {
$name = substr($name,0,1);
if (!$name OR strlen(trim($name))==0) {$name='';} elseif ($name=='&') {$name='';} else {$name=$name.".&nbsp;";}
}
$check = mysql_query("SELECT `id` AS hoyi, `player` AS player1, `training`, `focus`, `change` FROM `weight` WHERE `player`='$id' AND `team`='$get_team' LIMIT 1");
$hoyi = @mysql_result($check,0,'hoyi'); if (!$hoyi) {$hoyi=0;}
$player = @mysql_result($check,0,'player1'); if (!$player) {$player=0;}
$enaktip = @mysql_result($check,0,'training'); if (!$enaktip) {$enaktip=0;}
$enakfoc = @mysql_result($check,0,'focus'); if (!$enakfoc) {$enakfoc=0;}
$LAST = @mysql_result($check,0,'change'); if (!$LAST) {$LAST=0;}
if ($country=='USA') {$LAST = round($LAST*22046 /10000,1); $bb='lb';} else {$bb='kg';}
?>
<tr><td>
<input type="hidden" name="<?="formid_".$k?>" value="<?=$hoyi?>">
<input type="hidden" name="igralec_<?=$k?>" id="igralec_<?=$k?>" value="<?=$id?>">
<?php if($injury>1 OR $fatigue>29){echo "<font color=\"red\">",$name," ",$surname,"</font></td><td align=\"center\">",$usheight,"</td><td align=\"center\">",$usweight; $gnoya=4; $enaktip=0;} else {echo "<a href=\"player.php?playerid=",$id,"\" class=\"greenhilite\">",$name," ",$surname,"</a></td><td align=\"center\">",$usheight,"</td><td align=\"center\">",$usweight; $gnoya=0;}?></td><td align="center">
<select name="type_<?=$k?>" id="type_<?=$k?>" class="inputreg" <?php if($gnoya==4){echo " disabled=\"disabled\"";}?>>
<option value="0" <?php if($enaktip==0){echo " selected=\"selected\"";}?>></option>
<option value="1" <?php if($enaktip==1){echo " selected=\"selected\"";}?>>Jogging</option>
<option value="2" <?php if($enaktip==2){echo " selected=\"selected\"";}?>>Push ups</option>
<option value="3" <?php if($enaktip==3){echo " selected=\"selected\"";}?>>Short sprints</option>
<option value="4" <?php if($enaktip==4){echo " selected=\"selected\"";}?>>Weight lifting</option>
</select></td><td align="center"><select name="focus_<?=$k?>" id="focus_<?=$k?>" class="inputreg">
<option value="1" <?php if($enakfoc==1){echo " selected=\"selected\"";}?>>Agility</option>
<option value="2" <?php if($enakfoc==2){echo " selected=\"selected\"";}?>>Power</option>
</select></td><td align="right"><?php if ($LAST<>0) {echo $LAST."&nbsp;".$bb;}?></td></tr>
<?php
$k++;
}
echo "<tr><td colspan=\"6\">&nbsp;</td></tr>";
echo "<tr width=\"100%\"><td colspan=\"6\"><input type=\"hidden\" name=\"numb\" value=\"".$k."\"><input type=\"submit\" name=\"submit\" value=\"Set physical training\" class=\"buttonreg\">&nbsp;<input type=\"submit\" name=\"submitC\" value=\"Empty the gym\" class=\"buttonreg\"></td></tr></form></table>";
?>
</td><td class="border" width="31%">
<a href="training.php">Back to training page</a><br/>
<a href="gamerules.php?action=training"><b>Check the training rules</b></a><br/>
<br/><i>Exhausted players can't train.</i><br/><br/><i>Training report is available every Monday at 16:00 (server time).</i>
<?php
$bonga = mysql_query("SELECT current_level FROM medical_center WHERE current_level > 0 AND id_team='$get_team' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($bonga)) {echo "<br/><br>Weekly cost per player training in a gym: <b>",(100*mysql_result($bonga,0))," &euro;</b>";}
?>
</td>
</tr>
</table>
</div>
</div>
</body>
</html>