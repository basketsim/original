<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT club, supporter, lang, level FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)) {
$get_team = mysql_result ($compare,0,"club");
$is_supporter = mysql_result($compare,0,"supporter");
$lang = mysql_result ($compare,0,"lang");
$level = mysql_result($compare,0,"level");
}
else {die(include 'basketsim.php');}
if ($level >1) {$is_supporter=1;}
if ($is_supporter<>1) {header("Location: supporter.php");}
require("inc/lang/".$lang.".php");

$id=$_GET['id'];
$a=$_GET['a'];
if ($a=='rem'){
if (!is_numeric($id)){die(include 'bookmarks.php');}
mysql_query("DELETE FROM bookmarks WHERE team='$get_team' && bookmarkid='$id' LIMIT 1") or die(mysql_error());
}

if ($a=='players') {mysql_query("DELETE FROM bookmarks WHERE team = '$get_team' && ( b_type =1 || b_type =5 ) LIMIT 500") or die(mysql_error());}
if ($a=='clubs') {mysql_query("DELETE FROM bookmarks WHERE team = '$get_team' && b_type =2 LIMIT 250") or die(mysql_error());}
if ($a=='matches') {mysql_query("DELETE FROM bookmarks WHERE team = '$get_team' && multiview=0 && b_type =3 LIMIT 250") or die(mysql_error());}
if ($a=='leagues') {mysql_query("DELETE FROM bookmarks WHERE team = '$get_team' && b_type =4 LIMIT 250") or die(mysql_error());}

include_once('inc/header.php');
include_once('inc/osnova.php');

if (isset($_POST['delete'])) {
for($i=0;$i<400;$i++){
$del_id = $checkbox[$i];
mysql_query("DELETE FROM bookmarks WHERE team='$get_team' AND bookmarkid='$del_id' LIMIT 1") or die(mysql_error());
}
}
if (isset($_POST['delete1'])) {
for($i=0;$i<400;$i++){
$del_id = $checkbox[$i];
mysql_query("DELETE FROM bookmarks WHERE team='$get_team' AND bookmarkid='$del_id' LIMIT 1") or die(mysql_error());
}
}
if (isset($_POST['delete2'])) {
for($i=0;$i<400;$i++){
$del_id = $checkbox[$i];
mysql_query("DELETE FROM bookmarks WHERE team='$get_team' AND bookmarkid='$del_id' LIMIT 1") or die(mysql_error());
}
}
if (isset($_POST['delete3'])) {
for($i=0;$i<400;$i++){
$del_id = $checkbox[$i];
mysql_query("DELETE FROM bookmarks WHERE team='$get_team' AND bookmarkid='$del_id' LIMIT 1") or die(mysql_error());
}
}
?>

<div id="main">
<h2><?=$langmark033?></h2>
<table border="0" cellpading="9" cellspacing="9" width="100%">
<tr>
<td class="border" width="100%" valign="top" bgcolor="#ffffff">

<br/><h2><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td align="left"><?=$langmark034?></td><td align="right"><a href="bookmarks.php?a=players"><font color="white"><?=$langmark1367?></font></a>&nbsp;</td></tr></table></h2><br/>

<form name="form1" method="post" action="bookmarks.php">

<?php
echo "<table cellspacing=\"0\" cellpadding=\"1\" border=\"0\" width=\"100%\">";
function multisort($array, $tag=1, $limit=10, $sort_by, $key1, $key2=NULL, $key3=NULL, $key4=NULL, $key5=NULL, $key6=NULL, $key7=NULL, $key8=NULL){
// sort by ?
foreach ($array as $pos =>  $val)
$tmp_array[$pos] = $val[$sort_by];
if($tag==1){asort($tmp_array);}else{arsort($tmp_array);}
$i=1;
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
$i++;
}
}
return $return_array;
}
$resultev = mysql_query("SELECT timeofsale, bookmarkid, b_name, b_link, b_type, currentbid, players.country as cozaza, ntplayer FROM bookmarks, players, transfers WHERE bookmarks.b_link = players.id AND players.id = transfers.playerid AND transfers.trstatus =1 && b_type=1 && team ='$get_team'");
$all_info = array();
while ($get_info = mysql_fetch_row($resultev)){
$all_info[] = $get_info;
$smoga=$smoga+1;
}
if ($smoga > 0) {
$all_info = multisort($all_info,1,400,'0','1','2','3','4','5','6','7');
foreach($all_info as $get_info) {
$bar=$bar+1;
if($bar % 2) {$barva = 'white'; $slikca = 'for_sale.jpg';} else {$barva = '#D3E0EA'; $slikca = 'for_sale.jpg';}
$timeofsale=$get_info[0];
$bookmarkid=$get_info[1]; 
$b_name=$get_info[2];
$b_link=$get_info[3];
$b_type=$get_info[4];
$cuom=$get_info[5];
$cozaza=$get_info[6];
$ntzaza=$get_info[7];
$splitdatetime = explode(" ", $timeofsale); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$disdate = date("m/d H:i", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));
echo "<tr><td align=\"left\" bgcolor=\"",$barva,"\">";
?>
<input style="margin:0; padding:0;" name="checkbox[]" type="checkbox" id="checkbox[]" value="<?=$bookmarkid?>">
<?php
echo "&nbsp;<a href=\"player.php?playerid=",$b_link,"\" class=\"greenhilite\">",$b_name,"</a>";
if ($ntzaza==1) {echo "&nbsp;<img src=\"img/Flags/",$cozaza,".png\" border=\"0\" alt=\"",$langmark378," ",$cozaza,"\" title=\"",$langmark378," ",$cozaza,"\">";}
if ($ntzaza==2) {echo "&nbsp;<img src=\"img/Flags/",$cozaza,".png\" border=\"0\" alt=\"",$langmark378," ",$cozaza," U19\" title=\"",$langmark378," ",$cozaza," U19\">";}
echo "</td><td align=\"right\" bgcolor=\"",$barva,"\">";
if ($cuom > 0) {echo  number_format($cuom, 0, ',', '.')."&nbsp;&euro;&nbsp;";}
echo "<img src=\"img/",$slikca,"\" border=\"0\" alt=\"",$langmark936,"\" title=\"",$langmark936,"\">&nbsp;",$disdate,"</td></tr>";
$ti=1;
}
}
$igralci_s = mysql_query("SELECT bookmarkid, b_name, b_link, b_type, country, ntplayer FROM bookmarks, players WHERE bookmarks.b_link = players.id AND players.isonsale =0 AND (b_type =1 || b_type =5) AND team ='$get_team' ORDER BY bookmarkid ASC LIMIT 400") or die(mysql_error());
while ($is = mysql_fetch_array($igralci_s)) {
$bar=$bar+1;
if($bar % 2) {$barva = 'white';} else {$barva = '#D3E0EA';}
$bookmarkid=$is["bookmarkid"];
$b_name=$is["b_name"];
$b_link=$is["b_link"];
$b_type=$is["b_type"];
$cozaza=$is["country"];
$ntzaza1=$is["ntplayer"];
echo "<tr><td align=\"left\" bgcolor=\"",$barva,"\">";
?>
<input style="margin:0; padding:0;" name="checkbox[]" type="checkbox" id="checkbox[]" value="<?=$bookmarkid?>">
<?php
if ($b_type==5) {echo "&nbsp;<a href=\"coach.php?coachid=",$b_link,"\" class=\"greenhilite\">",$b_name,"</a></td><td align=\"right\" bgcolor=\"",$barva,"\">",$langmark036;}
elseif ($b_type<>5) {echo "&nbsp;<a href=\"player.php?playerid=",$b_link,"\" class=\"greenhilite\">",$b_name,"</a>";
if ($ntzaza1==1) {echo "&nbsp;<img src=\"img/Flags/",$cozaza,".png\" border=\"0\" alt=\"",$langmark378," ",$cozaza,"\" title=\"",$langmark378," ",$cozaza,"\">";}
if ($ntzaza1==2) {echo "&nbsp;<img src=\"img/Flags/",$cozaza,".png\" border=\"0\" alt=\"",$langmark378," ",$cozaza," U19\" title=\"",$langmark378," ",$cozaza," U19\">";}
echo "</td><td align=\"right\" bgcolor=\"",$barva,"\">&nbsp;</td></tr>";}
$ti=1;
}
if ($bar>0) {?>
<tr><td align="left"><input name="delete" type="submit" id="delete" value="Delete selected" class="inputreg"></td></tr>
<?php
}
echo "</form></table>";
if ($ti<>1) {echo "<br/><i>",$langmark035,".</i><br/>";}?>

<br/><h2><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td align="left"><?=$langmark040?></td><td align="right"><a href="bookmarks.php?a=clubs"><font color="white"><?=$langmark1367?></font></a>&nbsp;</td></tr></table></h2><br/>

<form name="form2" method="post" action="bookmarks.php">

<?php
$b_ekipe = mysql_query("SELECT bookmarkid, b_name, b_link, username, is_online, last_active, supporter FROM bookmarks, users WHERE userid=b_link AND b_type =2 AND team ='$get_team' ORDER BY `bookmarkid` ASC") or die(mysql_error());
if ($userid==1) {$b_ekipe = mysql_query("SELECT bookmarkid, b_name, b_link, username, is_online, last_active, supporter FROM bookmarks, users WHERE userid=b_link AND b_type =2 AND team ='$get_team' ORDER BY `expire` ASC") or die(mysql_error());}
$num_e = mysql_num_rows($b_ekipe);
if ($num_e <1) {echo "<br/><i>",$langmark041,".</i><br/>";}
else {echo "<table cellspacing=\"0\" cellpadding=\"1\" border=\"0\" width=\"100%\">";
$n=0;
while ($n < $num_e) {
if($n % 2) {$barva = '#D3E0EA';} else {$barva = 'white';}
$bookmarkid=mysql_result($b_ekipe,$n,"bookmarkid");
$b_name=mysql_result($b_ekipe,$n,"b_name");
$b_link=mysql_result($b_ekipe,$n,"b_link");
$username = mysql_result($b_ekipe,$n,"username");
$is_online = mysql_result($b_ekipe,$n,"is_online");
$last_active = mysql_result($b_ekipe,$n,"last_active");
$zupp = mysql_result($b_ekipe,$n,"supporter");
//aktivnost
$splitdatetime = explode(" ", $last_active); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$expireminus = date("Y-m-d H:i:s", mktime($dbhour,$dbmin+35,$dbsec,$dbmonth,$dbday,$dbyear));
$timenow = date("Y-m-d H:i:s");
if ($timenow > $expireminus) {$is_online=0;}
echo "<tr><td align=\"left\" bgcolor=\"",$barva,"\">";
?>
<input style="margin:0; padding:0;" name="checkbox[]" type="checkbox" id="checkbox[]" value="<?=$bookmarkid?>">
&nbsp;<?php echo "<a href=\"club.php?clubid=",$b_link,"\" class=\"greenhilite\">",$b_name,"</a>";
echo "</td><td align=\"right\" bgcolor=\"",$barva,"\">";
//if ($is_online==1) {echo $username,"&nbsp;<font color=\"green\"><b>",$langmark042,"!</b></font>";} else {echo $username;}

if ($is_online==1 AND $zupp==1) {echo $username,"&nbsp;<img src=\"img/bsupn.png\" border=\"0\" alt=\"",strtolower($langmark1222),"\" title=\"",$langmark317,"\" style= \"border: 0px solid #fff; padding: 0px; margin: 0px; height: 10px; width: 10px;\">&nbsp;<img src=\"img/g_dot.gif\" alt=\"",$langmark042,"\" title=\"",$langmark042,"\" style= \"border: 0px solid #fff; padding: 0px; margin: 0px;\">";}
elseif ($is_online==0 AND $zupp==1) {echo $username,"&nbsp;<img src=\"img/bsupn.png\" border=\"0\" alt=\"",strtolower($langmark1222),"\" title=\"",$langmark317,"\" style= \"border: 0px solid #fff; padding: 0px; margin: 0px; height: 10px; width: 10px;\">";}
elseif ($is_online==1 AND $zupp==0) {echo $username,"&nbsp;<img src=\"img/g_dot.gif\" alt=\"",$langmark042,"\" title=\"",$langmark042,"\" style= \"border: 0px solid #fff; padding: 0px; margin: 0px;\">";}
else {echo $username;}

/*
if ($is_online==1 AND $zupp==1) {echo "<img src=\"img/bsupn.png\" border=\"0\" alt=\"",strtolower($langmark1222),"\" title=\"",$langmark317,"\" style= \"border: 0px solid #fff; padding: 0px; margin: 0px; height: 11px; width: 11px;\">&nbsp;".$username."&nbsp;<font color=\"green\"><b>",$langmark042,"!</b></font>";}
elseif ($is_online==0 AND $zupp==1) {echo "<img src=\"img/bsupn.png\" border=\"0\" alt=\"",strtolower($langmark1222),"\" title=\"",$langmark317,"\" style= \"border: 0px solid #fff; padding: 0px; margin: 0px; height: 11px; width: 11px;\">&nbsp;".$username;}
elseif ($is_online==1 AND $zupp==0) {echo $username,"&nbsp;<font color=\"green\"><b>",$langmark042,"!</b></font>";}
else {echo $username." <img src=\"img/g_dot.gif\" alt=\"",$langmark042,"\" title=\"",$langmark042,"\">";}
*/
//if ($zupp==1) {echo " <img src=\"img/bsupn.png\" border=\"0\" alt=\"",strtolower($langmark1222),"\" title=\"",$langmark317,"\" style= \"border: 0px solid #fff; padding: 0px; margin: 0px; height: 11px; width: 11px;\">";}
echo "</td></tr>";
$n++;
}
if ($n>0) {?>
<tr><td align="left"><input name="delete1" type="submit" id="delete1" value="Delete selected" class="inputreg"></td></tr>
<?php
}
echo "</table>";
}
?></form>

<form name="form3" method="post" action="bookmarks.php">
<br/><h2><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td align="left"><?=$langmark043?></td><td align="right"><a href="bookmarks.php?a=matches"><font color="white"><?=$langmark1367?></font></a>&nbsp;</td></tr></table></h2><br/>
<?php
$b_tekme = mysql_query("SELECT bookmarkid, b_link, home_id, home_name, away_id, away_name, home_score, away_score FROM bookmarks, matches WHERE matchid=b_link AND multiview =0 AND b_type =3 AND team ='$get_team' ORDER BY `bookmarkid` ASC") or die(mysql_error());
$num_t=mysql_num_rows($b_tekme);
if ($num_t < 1) {echo "<br/><i>",$langmark044,".</i><br/>";}
else {
echo "<table cellspacing=\"0\" cellpadding=\"1\" border=\"0\" width=\"100%\">";
$p=0;
while ($p < $num_t) {
if($p % 2) {$barva = '#D3E0EA';} else {$barva = 'white';}
$bookmarkid=mysql_result($b_tekme,$p,"bookmarkid");
$b_link=mysql_result($b_tekme,$p,"b_link");
$home_id=mysql_result($b_tekme,$p,"home_id");
$home_name=mysql_result($b_tekme,$p,"home_name");
$away_id=mysql_result($b_tekme,$p,"away_id");
$away_name=mysql_result($b_tekme,$p,"away_name");
$home_score=mysql_result($b_tekme,$p,"home_score");
$away_score=mysql_result($b_tekme,$p,"away_score");
if ($home_name == ''){
$result1 = mysql_query("SELECT name FROM teams WHERE teamid ='$home_id' LIMIT 1");
while ($hometn = mysql_fetch_array($result1, MYSQL_ASSOC))
   {   foreach ($hometn as $home_name)
   {$home_name; }     } ;
}
if ($away_name == ''){
$result2 = mysql_query("SELECT name FROM teams WHERE teamid ='$away_id' LIMIT 1");
while ($awaytn = mysql_fetch_array($result2, MYSQL_ASSOC))
   {   foreach ($awaytn as $away_name)
   {$away_name; }     } ;
}
echo "<tr><td align=\"left\" bgcolor=\"",$barva,"\">";?>
<input style="margin:0; padding:0;" name="checkbox[]" type="checkbox" id="checkbox[]" value="<?=$bookmarkid?>">
<?php
echo "&nbsp;<a href=\"prikaz.php?matchid=",$b_link,"\" class=\"greenhilite\">",stripslashes($home_name)," - ",stripslashes($away_name),"</a></td><td align=\"right\" bgcolor=\"",$barva,"\">",$home_score,"&nbsp;-&nbsp;",$away_score,"</td></tr>";
$p++;
}
if ($p>0) {?>
<tr><td align="left"><input name="delete2" type="submit" id="delete2" value="Delete selected" class="inputreg"></td></tr>
<?php
}
echo "</table>";
}
?></form>

<form name="form4" method="post" action="bookmarks.php">
<br/><h2><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td align="left"><?=$langmark045?></td><td align="right"><a href="bookmarks.php?a=leagues"><font color="white"><?=$langmark1367?></font></a>&nbsp;</td></tr></table></h2><br/>
<?php
$b_lige = mysql_query("SELECT bookmarkid, b_name, b_link, country FROM bookmarks, leagues WHERE leagueid = b_link AND b_type =4 AND team ='$get_team' ORDER BY `bookmarkid` ASC") or die(mysql_error());
$num_l = mysql_num_rows($b_lige);
if ($num_l <1) {echo "<br/><i>",$langmark046,".</i><br/>";}
else {
echo "<table cellspacing=\"0\" cellpadding=\"1\" border=\"0\" width=\"100%\">";
$b=0;
while ($b < $num_l) {
if($b % 2) {$barva = '#D3E0EA';} else {$barva = 'white';}
$bookmarkid=mysql_result($b_lige,$b,"bookmarkid");
$b_name=mysql_result($b_lige,$b,"b_name");
$b_link=mysql_result($b_lige,$b,"b_link");
$country = mysql_result($b_lige,$b,"country");
echo "<tr><td align=\"left\" bgcolor=\"",$barva,"\">";
?>
<input style="margin:0; padding:0;" name="checkbox[]" type="checkbox" id="checkbox[]" value="<?=$bookmarkid?>">
<?php
echo "&nbsp;<a href=\"leagues.php?leagueid=",$b_link,"\" class=\"greenhilite\">",$b_name,"</td><td align=\"right\" bgcolor=\"",$barva,"\">",$country,"</td></tr>";
$b++;
}
if ($b>0) {?>
<tr><td align="left"><input name="delete3" type="submit" id="delete3" value="Delete selected" class="inputreg"></td></tr>
<?php
}
echo "</table>";
}
?></form>
<br/>
</td>
</tr>
</table>
</div>
</div>
</body>
</html>