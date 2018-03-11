<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT club, lang, supporter, level FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)) {
$trueclub = mysql_result($compare,0,"club");
$lang = mysql_result($compare,0,"lang");
$is_supporter = mysql_result($compare,0,"supporter");
$moderating = mysql_result($compare,0,"level");
}
else {die(include 'basketsim.php');}

$clubclub=$_GET['clubid'];
if ($clubclub == 0) {$clubclub = $userid;}

$query = mysql_query("SELECT club, level, supporter, name, shirt FROM users, teams WHERE users.club=teams.teamid AND userid ='$clubclub' LIMIT 1");
if (mysql_num_rows($query) > 0) {
$get_team = mysql_result($query,0,"club");
$cform = mysql_result($query,0,"level");
$gestbukec=mysql_result($query,0,"supporter");
$name=mysql_result($query,0,"name");
$shirt=mysql_result($query,0,"shirt");
}
else {die(include 'index.php');}
if ($cform > 1) {$gestbukec=1;}
if ($gestbukec <> 1) {header ( "Location: club.php?clubid=$clubclub" );}

$act = $_GET['act'];
if ($act=='delete') {
$delentry = $_GET["eno"];
mysql_query("DELETE FROM guestbook WHERE gid ='$delentry' AND greceiver ='$userid' LIMIT 1");
header ( "Location: viewguestbook.php" );
}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2>Basketsim >> <?=stripslashes($name)?></h2>

<!-- OBMOCJE TABEL -->

<table border="0" cellpading="0" cellspacing="10" width="100%">
<tr>
<td class="border" width="60%" valign="top" bgcolor="#ffffff">

<!-- majica in ime kluba -->
<table>
<tr><td width="45">
<img src="img/shirts/<?=$shirt?>.gif" alt="" border="0" height="52" width="42"></td>
<td><h3><?=$langmark1143," ",stripslashes($name)?></h3></td>
</tr>
</table>
<!-- konec majice in imena kluba -->

<?php
//funkcija za smeske
function smeski($string){
  $lokacija = "img/smeski";
  $asci = array(":)", ":D", ":(", ":S", ":s", "=)", "8)", ":o", ":O", ":|", ";)", "!!!", "???", ":basket");
  $slikce = array("<img src=\"$lokacija/icon_smile.gif\">", "<img src=\"$lokacija/icon_biggrin.gif\">", "<img src=\"$lokacija/icon_sad.gif\">", "<img src=\"$lokacija/icon_confused.gif\">", "<img src=\"$lokacija/icon_confused.gif\">",
  "<img src=\"$lokacija/icon_cheesygrin.gif\">", "<img src=\"$lokacija/icon_cool.gif\">", "<img src=\"$lokacija/icon_surprised.gif\">", "<img src=\"$lokacija/icon_eek.gif\">", "<img src=\"$lokacija/icon_neutral.gif\">",
  "<img src=\"$lokacija/icon_wink.gif\">", "<img src=\"$lokacija/icon_exclaim.gif\">", "<img src=\"$lokacija/icon_question.gif\">", "<img src=\"$lokacija/score.gif\">");
 
  $nova = str_replace($asci, $slikce, $string);
  return $nova;
}
$vsigb = mysql_query("SELECT * FROM guestbook WHERE greceiver ='$clubclub' ORDER BY gid DESC");
$skupaj = mysql_num_rows($vsigb);
if ($skupaj > 0) {
if ($skupaj > 2) {echo "<br/>",$langmark1147," ",$skupaj," ",$langmark1148,"<br/>";}
elseif ($skupaj == 2) {echo "<br/>",$langmark1147," ",$skupaj," ",$langmark1149,"<br/>";}
else {echo "<br/>",$langmark1150,"<br/>";}
if ($is_supporter<>1) {echo $langmark1144," <a href=\"supporter.php\">",$langmark1145,"</a> ",$langmark1146,"<br/>";}
echo "<hr/>";
$m=0;
$perpage = 50; //vnosov na strani
$pages = ceil($skupaj/$perpage); //skupaj delimo z per page da dobimo st strani
$sel_page=$_GET['page']; //preko GET dobimo st strani
if ($sel_page == 0) {$sel_page = 1;} //ce ni GET-a potem je to stran 1
if ($sel_page > $pages) {$sel_page = $pages;} //ce je get vecji kot kolikor je strani potem selectamo zadnjo stran
$mmin = ($sel_page - 1) * $perpage; //spodnja meja ki nam pove s katerimo vnosom zacnemo
$mmax = ($sel_page * $perpage) - 1; //zgornja meja torej zadnji vnos ki ga vidimo

while ($m < $skupaj) {
$gid = mysql_result($vsigb,$m,"gid");
$gauthor = mysql_result($vsigb,$m,"gauthor");
$njime = mysql_query("SELECT username FROM users WHERE userid ='$gauthor'") or die(mysql_error());
if (mysql_num_rows($njime) > 0) {$avtime=mysql_result($njime,0);} else {$avtime=$langmark528;}
$gcontent = mysql_result($vsigb,$m,"gcontent");
$gcontent = str_replace("ooooooooooooooooooooooo","ooooooo",$gcontent);
$gcontent = str_replace("aaaaaaaaaaaaaaaaaaaaaaa","aaaaaaa",$gcontent);
$gcontent = str_replace("EEEEEEEEEEEEEEEEEEEEE","EEEEEEE",$gcontent);
$gtime = mysql_result($vsigb,$m,"gtime");
$splitgb = explode(" ", $gtime); $gb1date = $splitgb[0]; $gb2time = $splitgb[1];
$split1 = explode("-", $gb1date); $gbyear = $split1[0]; $gbmonth = $split1[1]; $gbday = $split1[2];
$split2 = explode(":", $gb2time); $gbhour = $split2[0]; $gbmin = $split2[1]; $gbsec = $split2[2];
$gbtime = date("d.m.Y H:i", mktime($gbhour,$gbmin,$gbsec,$gbmonth,$gbday,$gbyear));
$tole = $skupaj - $m;

if ($m >= $mmin AND $m <= $mmax) { //pregledamo ce $m ustreza mejam
echo "<br/><b>",$langmark1152," ",$tole," ",$langmark1153," ",$skupaj,":</b>";
echo "<br/>",$langmark1151," <a href=\"club.php?clubid=",$gauthor,"\">",$avtime,"</a> on ",$gbtime;
if ($userid==$clubclub) {echo " <a href=\"viewguestbook.php?act=delete&eno=",$gid,"\">Delete</a>";}
echo "<br/><br/>",nl2br(smeski(strip_tags($gcontent))),"<br/><br/><hr>";
}else{
//ne prikazemo nicesar ker te strani ni
}

$m++;
}

//PRIKAZ STRANI
if ($pages < 2) { //manj kot 2 strani torej ne prikazemo linkov
//linkov ni
}else{
//prikaz linkov
echo "<center>";
for ($i = 1; $i <= $pages; $i++) {
if ($i == $sel_page) { //smo na izbrani strani
echo " <b>",$i,"</b>&nbsp;";
}else{
echo " <a href=\"viewguestbook.php?clubid=",$clubclub,"&page=",$i,"\">",$i,"</a>&nbsp;";
}
}
echo "</center>";
}

} else {
?>
<hr/>
<?=$langmark1154?> <a href="supporter.php"><?=$langmark1155?></a> <?=$langmark1156?><br/>
<a href="club.php?clubid=<?=$clubclub?>&guest=write"><?=$langmark550?></a> <?=$langmark1157?><hr/>
<?php
}
?>

</td>

<!-- desni okvir -->

<td class="border" width="40%" valign="top" bgcolor="#ffffff">

<h2><?=$langmark510?></h2><br/>

<a href="club.php?clubid=<?=$clubclub?>"><?=$langmark934?></a><br/>
<a href="playerslist.php?clubid=<?=$clubclub?>"><?=$langmark034?></a><br/>
<a href="club.php?clubid=<?=$clubclub?>&action=showcoach"><?=$langmark036?></a><br/>
<a href="showmatches.php?clubid=<?=$clubclub?>"><?=$langmark043?></a><br/>
<a href="clubhistory.php?clubid=<?=$clubclub?>">Club history</a><br/>
<a href="transfhistory.php?clubid=<?=$clubclub?>"><?=$langmark466?></a><br/>
<?php if (($is_supporter==1 || $moderating >1) AND $userid<>$clubclub) {?><a href="club.php?clubid=<?=$clubclub?>&action=showpast">Past duels</a><br/><?php }?>

<br/><h2><?=$langmark1158?></h2><br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td>
<?php
$hudquer = mysql_query("SELECT DISTINCT country FROM teams, users, guestbook WHERE teamid = club AND userid = gauthor AND greceiver ='$clubclub' ORDER BY country ASC") or die (mysql_error());
while($i=mysql_fetch_array($hudquer)) {
$uhdrzava1 = $i['country'];
echo "<img src=\"img/Flags/",$uhdrzava1,".png\" alt=\"",$uhdrzava1,"\" title=\"",$uhdrzava1,"\" border=\"0\" style=\"border-color: white\"> ";
}
?>
</td></tr></table>
<?php
$hudquer1 = mysql_query("SELECT DISTINCT country FROM teams, users, guestbook WHERE teamid = club AND userid = greceiver AND gauthor ='$clubclub' ORDER BY country ASC") or die (mysql_error());
if (mysql_num_rows($hudquer1)) {
$knl='mb';
?>
<br/><h2>Guestbook posts to:</h2><br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td>
<?php
}
while($ui=mysql_fetch_array($hudquer1)) {
$uhdrzavaz = $ui['country'];
echo "<img src=\"img/Flags/",$uhdrzavaz,".png\" alt=\"",$uhdrzavaz,"\" title=\"",$uhdrzavaz,"\" border=\"0\" style=\"border-color: white\"> ";
}
if ($knl=='mb') {echo "</td></tr></table>";}
?>
</td></tr></table>
</div></div></body></html>