<?php
$macht=$_POST["mach"];
$venue=$_POST["venu"];
$seaso=$_POST["siso"];
if (strlen($macht)>0 && !is_numeric($macht)) {die(include 'basketsim.php');}
if (strlen($venue)>0 && !is_numeric($venue)) {die(include 'basketsim.php');}
if (strlen($seaso)>0 && !is_numeric($seaso)) {die(include 'basketsim.php');}
$cuse=$_GET["cuse"];
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}
$comparepasss = mysql_query("SELECT club, supporter, lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($comparepasss)) {
$trueclub = mysql_result ($comparepasss,0,"club");
$is_supporter = mysql_result($comparepasss,0,"supporter");
$lang = mysql_result ($comparepasss,0,"lang");
}
else {die(include 'basketsim.php');}

if ($is_supporter==0) {$venue=0; $seaso=0;}
if ($cuse > 0) {$seaso=$cuse; $macht=3;}

$zmagestreak=0; $porazistreak=0;
$zmagce=0; $porazki=0;

$clubclub=$_GET['clubid'];
if (!is_numeric($clubclub)) {$clubclub = $userid;}

$addmatch = $_GET['addmatch'];
if (is_numeric($addmatch) AND $addmatch>0) {
$kopo = mysql_query("SELECT matchid FROM matches WHERE matchid =$addmatch LIMIT 1") or die(mysql_error());
$already = mysql_query("SELECT bookmarkid FROM bookmarks WHERE b_type =3 AND multiview =1 AND team ='$trueclub' AND b_link=$addmatch") or die(mysql_error());
$already1 = mysql_query("SELECT bookmarkid FROM bookmarks WHERE b_type =3 AND multiview =1 AND team ='$trueclub'") or die(mysql_error());
if (mysql_num_rows($already1)>6 && $is_supporter==1) {header("Location:multiview.php?act=7"); die();}
if (mysql_num_rows($already1)>3 && $is_supporter==0) {header("Location:multiview.php?act=7"); die();}
if (mysql_num_rows($kopo)>0 && !mysql_num_rows($already)) {mysql_query("INSERT INTO bookmarks VALUES ('', $trueclub, '', $addmatch, 3, 1);");}
header("Location:multiview.php");
}

$result = mysql_query("SELECT club, supporter, signed, level FROM users WHERE userid ='$clubclub' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($result)) {
$get_team = mysql_result($result,0,"club");
$huhsupporter = mysql_result($result,0,"supporter");
$swhen = mysql_result($result,0,"signed");
$gmlev = mysql_result($result,0,"level");
}
else {die (include 'index.php');}

$result = mysql_query("SELECT name, shirt, country FROM teams WHERE teamid ='$get_team' LIMIT 1");
if (mysql_num_rows($result)) {
$name=mysql_result($result,0,"name");
$zaheader = stripslashes($name);
$shirt=mysql_result($result,0,"shirt");
$country=mysql_result($result,0,"country");
}
else {die(include 'index.php');}
if ($huhsupporter==0 AND $gmlev < 2) {$shirt='white';}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2><?=$name," >> ",$langmark734?></h2>

<?php
//bookmark
if ($action == bookmark) {
$already = mysql_query("SELECT * FROM bookmarks WHERE b_type =2 && team ='$trueclub' && b_link ='$clubclub' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($already) > 0) {echo "<table cellpadding=\"10\" cellspacing=\"10\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">",$langmark473," ",$langmark094," <a href=\"bookmarks.php\">",$langmark095,"</a>.</td></tr></table>";
}
else {mysql_query("INSERT INTO bookmarks VALUES ('', $trueclub, '$name', $clubclub, 2, 1);") or die(mysql_error());
echo "<table cellpadding=\"10\" cellspacing=\"10\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">",$langmark474," ",$langmark094," <a href=\"bookmarks.php\">",$langmark095,"</a>.</td></tr></table>";}
}
?>
<table border="0" cellpadding="9" cellspacing="9" width="100%">
<tr bgcolor="#ffffff">
<td class="border">

<table><tr><td width="45">
<img src="img/shirts/<?=$shirt?>.gif" alt="" border="0" height="52" width="42"></td>
<td><h3><?=stripslashes($name)?>
<?php if($is_supporter==1){echo "&nbsp;<a href=\"club.php?clubid=",$clubclub,"&action=bookmark\"><img src=\"img/bookmark.jpg\" border=\"0\" alt=\"",$langmark477,"\" title=\"",$langmark477,"\"></a>";}?>
</h3></td></tr></table>

<br/><h2><?=$langmark492?></h2><br/>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
<?php
if ($macht==4) {$ty = "(type <>2 AND type <>5) AND";}
elseif ($macht==5) {$ty = "(type <>1 AND type <>2  AND type <>3  AND type <>4) AND";}
elseif ($macht==1) {$ty = "type = 1 AND";}
elseif ($macht==2) {$ty = "type = 2 AND";}
elseif ($macht==3) {$ty = "type = 3 AND";}
else {$ty = '';}
if ($seaso==0) {$sz='';} else {$sz="season=".$seaso." AND";}
$show = $_GET['show'];
if ($venue==1) {
$staretekme = "SELECT matchid, home_id, away_id, home_name, away_name, home_score, away_score, time, type, lid_round, season FROM matches WHERE $ty home_score > 0 AND $sz time > '$swhen' AND home_id ='$get_team'";} elseif ($venue==2) {
$staretekme = "SELECT matchid, home_id, away_id, home_name, away_name, home_score, away_score, time, type, lid_round, season FROM matches WHERE $ty home_score > 0 AND $sz time > '$swhen' AND away_id ='$get_team'";} else {
$staretekme = "SELECT matchid, home_id, away_id, home_name, away_name, home_score, away_score, time, type, lid_round, season FROM matches WHERE $ty home_score > 0 AND $sz time > '$swhen' AND home_id ='$get_team' UNION SELECT matchid, home_id, away_id, home_name, away_name, home_score, away_score, time, type, lid_round, season FROM matches WHERE $ty home_score > 0 AND $sz time > '$swhen' AND away_id ='$get_team'";}

function multisort($array, $tag=1, $limit=10, $sort_by, $key1, $key2=NULL, $key3=NULL, $key4=NULL, $key5=NULL, $key6=NULL, $key7=NULL, $key8=NULLL, $key9=NULL, $key10=NULL, $key11=NULL){
// sort by ?
foreach ($array as $pos =>  $val)
$tmp_array[$pos] = $val[$sort_by];
if($tag==1){
asort($tmp_array);
}else{
arsort($tmp_array);
}
   
$i=1;
// display however you want
foreach ($tmp_array as $pos =>  $val){
if($i<=$limit){
$return_array[$pos][$sort_by] = $array[$pos][$sort_by];
$return_array[$pos][$key1] = $array[$pos][$key1];
if (isset($key2)){
$return_array[$pos][$key2] = $array[$pos][$key2];
}
if (isset($key3)){
$return_array[$pos][$key3] = $array[$pos][$key3];
}
if (isset($key4)){
$return_array[$pos][$key4] = $array[$pos][$key4];
}
if (isset($key5)){
$return_array[$pos][$key5] = $array[$pos][$key5];
}
if (isset($key6)){
$return_array[$pos][$key6] = $array[$pos][$key6];
}
if (isset($key7)){
$return_array[$pos][$key7] = $array[$pos][$key7];
}
if (isset($key8)){
$return_array[$pos][$key8] = $array[$pos][$key8];
}
if (isset($key9)){
$return_array[$pos][$key9] = $array[$pos][$key9];
}
if (isset($key10)){
$return_array[$pos][$key10] = $array[$pos][$key10];
}
if (isset($key11)){
$return_array[$pos][$key11] = $array[$pos][$key11];
}
$i++;
}
}
return $return_array;
}

$resultev = mysql_query($staretekme);
$all_info = array();
while ($get_info = mysql_fetch_row($resultev)){
$all_info[] = $get_info;
$smoga=$smoga+1;
}

SWITCH (TRUE) {
CASE ($smoga < 1): echo $langmark493; break;
CASE ($smoga > 0):
if ($smoga < 11) {$s=0;}
if ($smoga > 10 AND $show<>'arch') {$s=$ststarih-10;}
if ($smoga > 10 AND $show=='arch') {$s=0;}
$all_info = multisort($all_info,1,20,'7','1','2','3','4','5','6','7','8','9','10','11');
foreach($all_info as $get_info) {
$matchid = $get_info[0];
$home_id = $get_info[1];
$away_id = $get_info[2];
$home_name = $get_info[3];
$away_name = $get_info[4];
$home_score = $get_info[5];
$away_score = $get_info[6];
$time = $get_info[7];
$type = $get_info[8];
$lid_round = $get_info[9];
$pravlink = $get_info[10];
$splitdatetime = explode(" ", $time); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$disdate = date("d.m.Y H:i", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));
//potrebno?
if ($home_name == ''){$teamname1 = mysql_query("SELECT name FROM teams WHERE teamid='$home_id' LIMIT 1"); $home_name=mysql_result($teamname1,0);}
if ($away_name == ''){$teamname2 = mysql_query("SELECT name FROM teams WHERE teamid='$away_id' LIMIT 1"); $away_name=mysql_result($teamname2,0);}
SWITCH ($type){
CASE 1: $tip="<a href=\"leagues.php?leagueid=".$lid_round."\">".$langmark479."</a>"; break;
CASE 2: $tip=$langmark320; break;
CASE 3: $tip="<a href=\"nationalcup.php?country=".$country."&season=".$pravlink."&round=".$lid_round."\">".$langmark321."</a>"; break;
CASE 4: $tip=$langmark322; break;
CASE 5: 
if ($lid_round<>1 || $pravlink<7) {$tip="<a href=\"fairplaycup.php?season=".$pravlink."&round=".$lid_round."\">".$langmark1274."</a>";}
elseif ($lid_round==1 && $pravlink >6) {
$prever = mysql_query("SELECT `GROUP` FROM `fpgroups` WHERE season=$pravlink AND `ekipa`='$get_team' LIMIT 1");
$skupa = mysql_result($prever,0);
$tip="<a href=\"fairplaycup.php?kgr=".$skupa."&season=".$pravlink."\">".$langmark1274."</a>";}
break;
CASE 6: $tip="<a href=\"cs.php?season=".$pravlink."&round=".$lid_round."\">".$langmark1274."</a>"; break;
CASE 7: $tip="<a href=\"cws.php?season=".$pravlink."&round=".$lid_round."\">".$langmark1274."</a>"; break;
}
if ($home_score >= $away_score AND $home_id == $get_team AND $home_score > 0) {$zmaga="<b><font color=\"green\">".$langmark735."</font></b>"; $zmagce=$zmagce+1; $ztot=$ztot+1; $ptot=0;}
if ($home_score < $away_score AND $home_id == $get_team AND $home_score > 0) {$zmaga="<b><font color=\"red\">".$langmark736."</font></b>"; $porazki=$porazki+1; $ptot=$ptot+1; $ztot=0;}
if ($home_score >= $away_score AND $away_id == $get_team AND $home_score > 0) {$zmaga="<b><font color=\"red\">".$langmark736."</font></b>"; $porazki=$porazki+1; $ptot=$ptot+1; $ztot=0;}
if ($home_score < $away_score AND $away_id == $get_team AND $home_score > 0) {$zmaga="<b><font color=\"green\">".$langmark735."</font></b>"; $zmagce=$zmagce+1; $ztot=$ztot+1; $ptot=0;}
if ($home_score == 0) {$zmaga='&nbsp;';}
if ($zmagestreak < $ztot) {$zmagestreak=$ztot;}
if ($porazistreak < $ptot) {$porazistreak=$ptot;}
if ($type>4 && $gron<>4) {$gron=4;}
echo "<tr><td align=\"left\">",$disdate," <b>(",$tip,")</b> ",stripslashes($home_name)," - ",stripslashes($away_name);?>
</td><td align="right">
<?php
if (($home_score+$away_score==21 && $time < '2009-01-11 22:30:01') || ($type==2 && $time < '2007-08-30 03:00:00')) {?><?php } else {?><a href="prikaz.php?matchid=<?=$matchid?>"><?php }
echo $home_score,"&nbsp;:&nbsp;",$away_score,"</a></td><td align=\"right\"> ",$zmaga,"</td></tr>";
$s++;
}
break;
}

if ($cuse >0) {echo "<b>Cup run in season ",$cuse,":</b><hr/>";}
if ($show=='arch' && $ststarih >0 && !$cuse) {
?>
<form method="post" action="<?=$PHP_SELF?>?clubid=<?=$clubclub?>&show=arch" style="margin: 0">
<select name="mach" class="inputreg">
<option value="0" <?php if($macht==0){echo "selected";}?>>All matches</option>
<option value="4" <?php if($macht==4){echo "selected";}?>>Competitive matches</option>
<?php if ($is_supporter==1) {?><option value="1" <?php if($macht==1){echo "selected";}?>>League matches</option>
<option value="3" <?php if($macht==3){echo "selected";}?>>Cup matches</option>
<option value="2" <?php if($macht==2){echo "selected";}?>>Friendly matches</option><? }?>
<?php if ($gron==4) {?><option value="5" <?php if($macht==5){echo "selected";}?>>International matches</option><?php }?>
</select>
<?php if ($is_supporter==1) {
$wseas = $_POST["wseas"];
if (!$wseas) {$wseas=mysql_result($staretekme,0,"season");}
?>
<select name="venu" class="inputreg">
<option value="0" <?php if($venue==0){echo "selected";}?>>at any venue</option>
<option value="1" <?php if($venue==1){echo "selected";}?>>at home</option>
<option value="2" <?php if($venue==2){echo "selected";}?>>away from home</option>
</select>
<select name="siso" class="inputreg">
<option value="0" <?php if($seaso==0){echo "selected";}?>>in all seasons</option>
<?php if ($wseas <= 14) {?><option value="14" <?php if($seaso==14){echo "selected";}?>>in season 14</option><?php }?>
<?php if ($wseas <= 13) {?><option value="13" <?php if($seaso==13){echo "selected";}?>>in season 13</option><?php }?>
<?php if ($wseas <= 12) {?><option value="12" <?php if($seaso==12){echo "selected";}?>>in season 12</option><?php }?>
<?php if ($wseas <= 11) {?><option value="11" <?php if($seaso==11){echo "selected";}?>>in season 11</option><?php }?>
<?php if ($wseas <= 10) {?><option value="10" <?php if($seaso==10){echo "selected";}?>>in season 10</option><?php }?>
<?php if ($wseas <= 9) {?><option value="9" <?php if($seaso==9){echo "selected";}?>>in season 9</option><?php }?>
<?php if ($wseas <= 8) {?><option value="8" <?php if($seaso==8){echo "selected";}?>>in season 8</option><?php }?>
<?php if ($wseas <= 7) {?><option value="7" <?php if($seaso==7){echo "selected";}?>>in season 7</option><?php }?>
<?php if ($wseas <= 6) {?><option value="6" <?php if($seaso==6){echo "selected";}?>>in season 6</option><?php }?>
<?php if ($wseas <= 5) {?><option value="5" <?php if($seaso==5){echo "selected";}?>>in season 5</option><?php }?>
<?php if ($wseas <= 4) {?><option value="4" <?php if($seaso==4){echo "selected";}?>>in season 4</option><?php }?>
<?php if ($wseas <= 3) {?><option value="3" <?php if($seaso==3){echo "selected";}?>>in season 3</option><?php }?>
<?php if ($wseas <= 2) {?><option value="2" <?php if($seaso==2){echo "selected";}?>>in season 2</option><?php }?>
<?php if ($wseas <= 1) {?><option value="1" <?php if($seaso==1){echo "selected";}?>>in season 1</option><?php }?>
</select>
<?php }?>
<input type="hidden" name="gron" value="<?=$gron?>">
<input type="hidden" name="wseas" value="<?=$wseas?>">
<input type="submit" value="&nbsp;&raquo;" name="submit" class="buttonreg">
</form>
<?php
if ($is_supporter==1) {echo "<br/>";}
echo "<b>Matches: ",$zmagce+$porazki,"</b>&nbsp;&nbsp;";
echo "<font color=\"green\"><b>Won: ",$zmagce,"</b></font>&nbsp;&nbsp;";
echo "<font color=\"red\"><b>Lost: ",$porazki,"</b></font>&nbsp;&nbsp;";
if ($is_supporter==1) {
echo "<font color=\"green\"><b><span title=\"Most matches won in a row by the club\">Best streak: ",$zmagestreak,"</span></b></font>&nbsp;&nbsp;";
echo "<font color=\"red\"><b><span title=\"Most matches lost in a row by the club\">Worst streak: ",$porazistreak,"</span></b></font>";}
echo "<hr/>";
}


echo "</table>";

if ($show <> 'arch') {
?>
<br/><h2><?=$langmark494?></h2><br/>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
<?php

$act = $_GET["act"];
if ($act==7) {echo "<font color=\"red\">",$langmark1261,"</font>";}

$bodtekme = mysql_query("SELECT matchid, home_id, away_id, crowd1, time, type, lid_round, season FROM matches WHERE home_id=$get_team AND home_score = 0 UNION SELECT matchid, home_id, away_id, crowd1, time, type, lid_round, season FROM matches WHERE home_score =0 && away_id ='$get_team' ORDER BY 'time' ASC LIMIT 5") or die(mysql_error());
$stbod = mysql_num_rows($bodtekme);
SWITCH (TRUE) {
CASE ($stbod < 1): echo $langmark495; break;
CASE ($stbod > 0):
$b=0;
while ($b < $stbod) {
$matchid = mysql_result($bodtekme,$b,"matchid");
$home_id = mysql_result($bodtekme,$b,"home_id");
$away_id = mysql_result($bodtekme,$b,"away_id");
$crowd1 = mysql_result($bodtekme,$b,"crowd1");
$time = mysql_result($bodtekme,$b,"time");
$type = mysql_result($bodtekme,$b,"type");
$lid_round = mysql_result($bodtekme,$b,"lid_round");
$pravlink = mysql_result($bodtekme,$b,"season");
$splitdatetime = explode(" ", $time); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$disdate = date("d.m.Y H:i", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));
$homeime = mysql_query("SELECT name FROM teams WHERE teamid = $home_id LIMIT 1") or die(mysql_error()); $home_named=mysql_result($homeime,0);
$awayime = mysql_query("SELECT name FROM teams WHERE teamid = $away_id LIMIT 1") or die(mysql_error()); $away_named=mysql_result($awayime,0);
SWITCH ($type){
CASE 1: $tip="<a href=\"leagues.php?leagueid=".$lid_round."\">".$langmark479."</a>"; break;
CASE 2: $tip=$langmark320; break;
CASE 3: $tip="<a href=\"nationalcup.php?country=".$country."&season=".$pravlink."&round=".$lid_round."\">".$langmark321."</a>"; break;
CASE 4: $tip=$langmark322; break;
CASE 5: 
if ($lid_round<>1 || $pravlink<>$default_season) {$tip="<a href=\"fairplaycup.php\">".$langmark1274."</a>";}
elseif ($lid_round==1 && $pravlink==$default_season) {
$prever = mysql_query("SELECT `GROUP` FROM `fpgroups` WHERE season=$pravlink AND `ekipa`='$get_team' LIMIT 1");
$skupa = mysql_result($prever,0);
$tip="<a href=\"fairplaycup.php?kgr=".$skupa."\">".$langmark1274."</a>";}
break;
CASE 6: $tip="<a href=\"cs.php\">".$langmark1274."</a>"; break;
CASE 7: $tip="<a href=\"cws.php\">".$langmark1274."</a>"; break;
}
$zdele = date("Y-m-d H:i:s");
echo "<tr><td>",$disdate," <b>(",$tip,")</b> ",stripslashes($home_named)," - ",stripslashes($away_named)," </td><td align=\"right\" width=\"45\">";
if ($b==0 AND $crowd1 > 0 AND $zdele > $time) {?><td align="right">&nbsp;&nbsp;&nbsp;<a href="prikaz.php?matchid=<?=$matchid?>">LIVE</a>&nbsp;<a href="showmatches.php?addmatch=<?=$matchid?>"><img src="img/live_mini.jpg" alt="<?=$langmark332?>" title="<?=$langmark332?>" border="0"></a></td><?php } else {echo "<td align=\"right\"><a href=\"prikaz.php?matchid=",$matchid,"\">",$langmark737,"</a></td>";}
echo "</tr>";
$b++;
}
break;
}
echo "</table><br/>[<a href=\"club.php?clubid=",$clubclub,"\">",$langmark491,"</a>]<br/>[<a href=\"showmatches.php?clubid=",$clubclub,"&show=arch\">",$langmark496,"</a>]";}
else {echo "<br/>[<a href=\"javascript: history.go(-1)\">",$langmark132,"</a>]";}
?>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>