<?php
//fantasy game values
$kabel = 5; //4=enabled!!!
$casek = '2013-1d0-25 19:00:00'; //change query down in first week of fantasy game!!

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT club, supporter, lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)) {
$get_team = mysql_result ($compare,0,"club");
$supp = mysql_result ($compare,0,"supporter");
$lang = mysql_result ($compare,0,"lang");
}
else {die(include 'basketsim.php');}
if ($supp==0) {$maxic=4;} elseif ($supp==1) {$maxic=7;}

$refresh=1798;
$id=$_GET['id'];
$a=$_GET['a'];
if ($a==rem){if (!is_numeric($id)){die(include 'index.php');} $deletebook = mysql_query("DELETE FROM bookmarks WHERE bookmarkid=$id LIMIT 1") or die(mysql_error()); header ( 'Location: nt_multiview.php' );}
if ($a=='clearall') {mysql_query("DELETE FROM bookmarks WHERE b_type=9 AND multiview=1 AND team=$get_team LIMIT 100"); header ( 'Location: nt_multiview.php' );}

require("inc/lang/".$lang.".php");
include('inc/header.php');
include('inc/osnova.php');
?>
<div id="main">
<?php
if ($kabel==4) {
echo "<table border=\"1\" width=\"100%\" cellspacing=\"5\" cellpadding=\"5\"><tr>";
$timenow = date("Y-m-d H:i:s");
$tekmice = mysql_query("SELECT matchid, home_name, away_name, max( home_sc ) as hsco , max( away_sc ) as asco FROM nt_matches, nt_matchevents WHERE match_id = matchid AND `time` = '$casek' AND TYPE <9 AND TYPE <>2 AND event_time < '$timenow' GROUP BY match_id") or die(mysql_error());
$tekemje = mysql_num_rows($tekmice);
$u=0;
while ($u < $tekemje) { 
$matchid=mysql_result($tekmice,$u,"matchid");
$home_name=mysql_result($tekmice,$u,"home_name");
$away_name=mysql_result($tekmice,$u,"away_name");
$hscore=mysql_result($tekmice,$u,"hsco");
$ascore=mysql_result($tekmice,$u,"asco");
if ($u % 2) {$coloric = '#F5F5F5';} else {$coloric = '#FFFAFA';}
echo "<td bgcolor=\"",$coloric,"\"><a href=\"nt_prikaz.php?matchid=",$matchid,"\" class=\"greenhilite\"><img src=\"img/Flags/",$home_name,".png\" border=\"0\" alt=\"",$home_name,"\" title=\"",$home_name,"\"><br/><b>$hscore</b><br/><img src=\"img/Flags/",$away_name,".png\" border=\"0\" alt=\"",$away_name,"\" title=\"",$away_name,"\"><br/><b>$ascore</b></a></td>";
$u++;
}
echo "</tr></table>";
}
?>
<h2><?php echo $langmark362," (",$langmark1258," ",$maxic," ",$langmark1259,")";?></h2>
<table border="0" cellpading="9" cellspacing="9" width="100%">
&nbsp;<a href="nt_multiview.php?a=clearall"><?=$langmark1469?></a>
<?php $dn = date("l"); $ur = date("H"); if ($dn=='Friday' AND ($ur==19 OR $ur==20)) {$neki=100;} else {?> | <a href="multiview.php"><?=$langmark1272?></a><?php }?>
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="100%" valign="top" bgcolor="#ffffff">
<?php
$b_tekme = mysql_query("SELECT bookmarkid, b_link FROM bookmarks WHERE b_type =9 AND multiview =1 AND team ='$get_team'") or die(mysql_error());
$num_t=mysql_num_rows($b_tekme);
if ($num_t < 1) {echo "<br/><i>",$langmark363,"<br/>",$langmark364,"</i><br/>";}
else {
$p=0;
while ($p < $num_t) {
$bookmarkid=mysql_result($b_tekme,$p,"bookmarkid");
$b_link=mysql_result($b_tekme,$p,"b_link");
$result = mysql_query("SELECT * FROM nt_matches WHERE matchid=$b_link");
$home_id=mysql_result($result,0,"home_id");
$home_name=mysql_result($result,0,"home_name");
$away_id=mysql_result($result,0,"away_id");
$away_name=mysql_result($result,0,"away_name");
$type=mysql_result($result,0,"type");
$home_pg1=mysql_result($result,0,"home_pg1");
$home_sg1=mysql_result($result,0,"home_sg1");
$home_sf1=mysql_result($result,0,"home_sf1");
$home_pf1=mysql_result($result,0,"home_pf1");
$home_c1=mysql_result($result,0,"home_c1");
$away_pg1=mysql_result($result,0,"away_pg1");
$away_sg1=mysql_result($result,0,"away_sg1");
$away_sf1=mysql_result($result,0,"away_sf1");
$away_pf1=mysql_result($result,0,"away_pf1");
$away_c1=mysql_result($result,0,"away_c1");
$home_pg2=mysql_result($result,0,"home_pg2");
$home_sg2=mysql_result($result,0,"home_sg2");
$home_sf2=mysql_result($result,0,"home_sf2");
$home_pf2=mysql_result($result,0,"home_pf2");
$home_c2=mysql_result($result,0,"home_c2");
$away_pg2=mysql_result($result,0,"away_pg2");
$away_sg2=mysql_result($result,0,"away_sg2");
$away_sf2=mysql_result($result,0,"away_sf2");
$away_pf2=mysql_result($result,0,"away_pf2");
$away_c2=mysql_result($result,0,"away_c2");

if ($type < 10) {$home_name = stripslashes($home_name); $away_name = stripslashes($away_name);} else {$home_name = stripslashes($home_name)." U19"; $away_name = stripslashes($away_name)." U19";}

$zacetek1 = mysql_query("SELECT min(event_time) FROM nt_matchevents WHERE match_id=$b_link AND quater=1");
$zacetek2 = mysql_query("SELECT min(event_time) FROM nt_matchevents WHERE match_id=$b_link AND quater=2");
$zacetek3 = mysql_query("SELECT min(event_time) FROM nt_matchevents WHERE match_id=$b_link AND quater=3");
$zacetek4 = mysql_query("SELECT min(event_time) FROM nt_matchevents WHERE match_id=$b_link AND quater=4");
$konec1 = mysql_query("SELECT max(event_time) FROM nt_matchevents WHERE match_id=$b_link AND quater=1");
$konec2 = mysql_query("SELECT max(event_time) FROM nt_matchevents WHERE match_id=$b_link AND quater=2");
$konec3 = mysql_query("SELECT max(event_time) FROM nt_matchevents WHERE match_id=$b_link AND quater=3");
$konec4 = mysql_query("SELECT max(event_time) FROM nt_matchevents WHERE match_id=$b_link AND quater=4");
if (mysql_num_rows($zacetek1)) {$zacetek_1 = mysql_result($zacetek1,0);}
if (mysql_num_rows($zacetek2)) {$zacetek_2 = mysql_result($zacetek2,0);}
if (mysql_num_rows($zacetek3)) {$zacetek_3 = mysql_result($zacetek3,0);}
if (mysql_num_rows($zacetek4)) {$zacetek_4 = mysql_result($zacetek4,0);}
if (mysql_num_rows($konec1)) {$konec_1 = mysql_result($konec1,0);}
if (mysql_num_rows($konec2)) {$konec_2 = mysql_result($konec2,0);}
if (mysql_num_rows($konec3)) {$konec_3 = mysql_result($konec3,0);}
if (mysql_num_rows($konec4)) {$konec_4 = mysql_result($konec4,0);}
$z1 = explode(" ", $zacetek_1); $z1d = $z1[0]; $z1t = $z1[1];
$sz1d = explode("-", $z1d); $z1ye = $sz1d[0]; $z1mo = $sz1d[1]; $z1da = $sz1d[2];
$sz1t = explode(":", $z1t); $z1ho = $sz1t[0]; $z1mi = $sz1t[1]; $z1se = $sz1t[2];
$k1 = explode(" ", $konec_1); $k1d = $k1[0]; $k1t = $k1[1];
$sk1d = explode("-", $k1d); $k1ye = $sk1d[0]; $k1mo = $sk1d[1]; $k1da = $sk1d[2];
$sk1t = explode(":", $k1t); $k1ho = $sk1t[0]; $k1mi = $sk1t[1]; $k1se = $sk1t[2];
$dolzina1 = date("i:s", mktime($k1ho-z1ho,$k1mi-$z1mi,$k1se-$z1se,$k1mo-$z1mo,$k1da-$z1da,$k1ye-z1ye));
$z2 = explode(" ", $zacetek_2); $z2d = $z2[0]; $z2t = $z2[1];
$sz2d = explode("-", $z2d); $z2ye = $sz2d[0]; $z2mo = $sz2d[1]; $z2da = $sz2d[2];
$sz2t = explode(":", $z2t); $z2ho = $sz2t[0]; $z2mi = $sz2t[1]; $z2se = $sz2t[2];
$k2 = explode(" ", $konec_2); $k2d = $k2[0]; $k2t = $k2[1];
$sk2d = explode("-", $k2d); $k2ye = $sk2d[0]; $k2mo = $sk2d[1]; $k2da = $sk2d[2];
$sk2t = explode(":", $k2t); $k2ho = $sk2t[0]; $k2mi = $sk2t[1]; $k2se = $sk2t[2];
$dolzina2 = date("i:s", mktime($k2ho-z2ho,$k2mi-$z2mi,$k2se-$z2se,$k2mo-$z2mo,$k2da-$z2da,$k2ye-z2ye));
$z3 = explode(" ", $zacetek_3); $z3d = $z3[0]; $z3t = $z3[1];
$sz3d = explode("-", $z3d); $z3ye = $sz3d[0]; $z3mo = $sz3d[1]; $z3da = $sz3d[2];
$sz3t = explode(":", $z3t); $z3ho = $sz3t[0]; $z3mi = $sz3t[1]; $z3se = $sz3t[2];
$k3 = explode(" ", $konec_3); $k3d = $k3[0]; $k3t = $k3[1];
$sk3d = explode("-", $k3d); $k3ye = $sk3d[0]; $k3mo = $sk3d[1]; $k3da = $sk3d[2];
$sk3t = explode(":", $k3t); $k3ho = $sk3t[0]; $k3mi = $sk3t[1]; $k3se = $sk3t[2];
$dolzina3 = date("i:s", mktime($k3ho-z3ho,$k3mi-$z3mi,$k3se-$z3se,$k3mo-$z3mo,$k3da-$z3da,$k3ye-z3ye));
$z4 = explode(" ", $zacetek_4); $z4d = $z4[0]; $z4t = $z4[1];
$sz4d = explode("-", $z4d); $z4ye = $sz4d[0]; $z4mo = $sz4d[1]; $z4da = $sz4d[2];
$sz4t = explode(":", $z4t); $z4ho = $sz4t[0]; $z4mi = $sz4t[1]; $z4se = $sz4t[2];
$k4 = explode(" ", $konec_4); $k4d = $k4[0]; $k4t = $k4[1];
$sk4d = explode("-", $k4d); $k4ye = $sk4d[0]; $k4mo = $sk4d[1]; $k4da = $sk4d[2];
$sk4t = explode(":", $k4t); $k4ho = $sk4t[0]; $k4mi = $sk4t[1]; $k4se = $sk4t[2];
$dolzina4 = date("i:s", mktime($k4ho-z4ho,$k4mi-$z4mi,$k4se-$z4se,$k4mo-$z4mo,$k4da-$z4da,$k4ye-z4ye));

$sek1 = explode(":", $dolzina1); $sekunde1 = 60 * $sek1[0] + $sek1[1]; if($sekunde1 < 800){$sekunde1=900;}
$sek2 = explode(":", $dolzina2); $sekunde2 = 60 * $sek2[0] + $sek2[1]; if($sekunde2 < 800){$sekunde2=900;}
$sek3 = explode(":", $dolzina3); $sekunde3 = 60 * $sek3[0] + $sek3[1]; if($sekunde3 < 800){$sekunde3=900;}
$sek4 = explode(":", $dolzina4); $sekunde4 = 60 * $sek4[0] + $sek4[1]; if($sekunde4 < 800){$sekunde4=900;}

$zdaj = date("Y-m-d H:i:s");
$result = mysql_query("SELECT * FROM nt_matchevents WHERE event_time < '$zdaj' AND match_id ='$b_link' ORDER BY event_time DESC, event_id DESC LIMIT $maxic");
$num=mysql_num_rows($result);
$i=0;
while ($i < $num) {
$player1id=mysql_result($result,$i,"player1id");
$team1id=mysql_result($result,$i,"team1id");
$player2id=mysql_result($result,$i,"player2id");
$team2id=mysql_result($result,$i,"team2id");
$event_type=mysql_result($result,$i,"event_type");
$desc_id=mysql_result($result,$i,"desc_id");
$event_time=mysql_result($result,$i,"event_time");
$quater=mysql_result($result,$i,"quater");
$home_sc=mysql_result($result,$i,"home_sc");
$away_sc=mysql_result($result,$i,"away_sc");

$event = explode(" ", $event_time); $eventd = $event[0]; $eventt = $event[1];
$seventd = explode("-", $eventd); $eventye = $seventd[0]; $eventmo = $seventd[1]; $eventda = $seventd[2];
$seventt = explode(":", $eventt); $eventho = $seventt[0]; $eventmi = $seventt[1]; $eventse = $seventt[2];

SWITCH ($quater) {
CASE 1:
$curmin = date("i", mktime($eventho-z1ho,$eventmi-$z1mi,$eventse-$z1se,$eventmo-$z1mo,$eventda-$z1da,$eventye-z1ye));
$cursec = date("s", mktime($eventho-z1ho,$eventmi-$z1mi,$eventse-$z1se,$eventmo-$z1mo,$eventda-$z1da,$eventye-z1ye));
$cur_time = 60 * $curmin + $cursec;
$dejansko = round(600*$cur_time/$sekunde1);
$dej_min = round($dejansko/60);
break;
CASE 2:
$curmin = date("i", mktime($eventho-z2ho,$eventmi-$z2mi,$eventse-$z2se,$eventmo-$z2mo,$eventda-$z2da,$eventye-z2ye));
$cursec = date("s", mktime($eventho-z2ho,$eventmi-$z2mi,$eventse-$z2se,$eventmo-$z2mo,$eventda-$z2da,$eventye-z2ye));
$cur_time = 60 * $curmin + $cursec;
$dejansko = round(600*$cur_time/$sekunde2);
$dej_min = round($dejansko/60)+10;
break;
CASE 3:
$curmin = date("i", mktime($eventho-z3ho,$eventmi-$z3mi,$eventse-$z3se,$eventmo-$z3mo,$eventda-$z3da,$eventye-z3ye));
$cursec = date("s", mktime($eventho-z3ho,$eventmi-$z3mi,$eventse-$z3se,$eventmo-$z3mo,$eventda-$z3da,$eventye-z3ye));
$cur_time = 60 * $curmin + $cursec;
$dejansko = round(600*$cur_time/$sekunde3);
$dej_min = round($dejansko/60)+20;
break;
CASE 4:
$curmin = date("i", mktime($eventho-z4ho,$eventmi-$z4mi,$eventse-$z4se,$eventmo-$z4mo,$eventda-$z4da,$eventye-z4ye));
$cursec = date("s", mktime($eventho-z4ho,$eventmi-$z4mi,$eventse-$z4se,$eventmo-$z4mo,$eventda-$z4da,$eventye-z4ye));
$cur_time = 60 * $curmin + $cursec;
$dejansko = round(600*$cur_time/$sekunde4);
$dej_min = round($dejansko/60)+30;
break;
}

//semafor
if ($home_sc > $away_sc AND $i==0) {echo "<br/><ul><li><a href=\"nt_prikaz.php?matchid=",$b_link,"\" class=\"greenhilite\">[+]</a>&nbsp;<a href=\"nt_multiview.php?id=",$bookmarkid,"&a=rem\" class=\"greenhilite\">[-]</a> <b>",$home_name," <span style=\"border: solid 2px darkgreen; font-family: courier; color: black; background-color: #B9D48B\">&nbsp;",sprintf("%02s", $home_sc)," : ",sprintf("%02s", $away_sc),"&nbsp;</span> ",$away_name,"</b></li></ul>";}
elseif ($home_sc < $away_sc AND $i==0) {echo "<br/><ul><li><a href=\"nt_prikaz.php?matchid=",$b_link,"\" class=\"greenhilite\">[+]</a>&nbsp;<a href=\"nt_multiview.php?id=",$bookmarkid,"&a=rem\" class=\"greenhilite\">[-]</a> <b>",$home_name," <span style=\"border: solid 2px darkred; font-family: courier; color: black; background-color: #FF8A84\">&nbsp;",sprintf("%02s", $home_sc)," : ",sprintf("%02s", $away_sc),"&nbsp;</span> ",$away_name,"</b></li></ul>";}
elseif ($home_sc+$away_sc > 0 AND $i==0) {echo "<br/><ul><li><a href=\"nt_prikaz.php?matchid=",$b_link,"\" class=\"greenhilite\">[+]</a>&nbsp;<a href=\"nt_multiview.php?id=",$bookmarkid,"&a=rem\" class=\"greenhilite\">[-]</a> <b>",$home_name," <span style=\"border: solid 2px gray; font-family: courier; color: black; background-color: lightgray\">&nbsp;",sprintf("%02s", $home_sc)," : ",sprintf("%02s", $away_sc),"&nbsp;</span> ",$away_name,"</b></li></ul>";}

echo "<u>",$dej_min,"min</u>: ";

$tp1 = mysql_query("SELECT country FROM countries WHERE countryid ='$team1id' LIMIT 1");
$jam = mysql_num_rows($tp1);
if ($jam > 0 && $type < 10){$temname=mysql_result($tp1,0);}
if ($jam > 0 && $type > 10){$temname=mysql_result($tp1,0)." U19";}
$tp2 = mysql_query("SELECT country FROM countries WHERE countryid ='$team2id' LIMIT 1");
$lum = mysql_num_rows($tp2);
if ($lum > 0 && $type < 10){$temname2=mysql_result($tp2,0);}
if ($lum > 0 && $type > 10){$temname2=mysql_result($tp2,0)." U19";}

$resultp1 = mysql_query("SELECT name,surname FROM players WHERE id ='$player1id' LIMIT 1");
$drum = mysql_num_rows($resultp1);
if ($drum > 0) {
$name1=mysql_result($resultp1,0,"name");
$surname1=mysql_result($resultp1,0,"surname");
}

$resultp2 = mysql_query("SELECT name,surname FROM players WHERE id ='$player2id' LIMIT 1");
$bum = mysql_num_rows($resultp2);
if ($bum > 0) {
$name2=mysql_result($resultp2,0,"name");
$surname2=mysql_result($resultp2,0,"surname");
}

$query = mysql_query("SELECT description FROM descriptions WHERE descid ='$desc_id' LIMIT 1");
while ($users_team = mysql_fetch_array($query, MYSQL_ASSOC))
   {   foreach ($users_team as $get_team)
   {$get_team; }     } ;


if ($team1id==$home_id){
$get_team=str_replace('$team1id',"<font color=#56704B><b>$temname</b></font>",$get_team);
$get_team=str_replace('$team2id',"<font color=#A30006><b>$temname2</b></font>",$get_team);
}
if ($team1id==$away_id){
$get_team=str_replace('$team1id',"<font color=#A30006><b>$temname</b></font>",$get_team);
$get_team=str_replace('$team2id',"<font color=#56704B><b>$temname2</b></font>",$get_team);
}

if ($player1id == $home_pg1 OR $player1id == $home_sg1 OR $player1id == $home_sf1 OR $player1id == $home_pf1 OR $player1id == $home_c1 OR $player1id == $home_pg2 OR $player1id == $home_sg2 OR $player1id == $home_sf2 OR $player1id == $home_pf2 OR $player1id == $home_c2){
$get_team=str_replace('$player1id',"<font color=#56704B><b>$surname1</b></font>",$get_team);} else { $get_team=str_replace('$player1id',"<font color=#A30006><b>$surname1</b></font>",$get_team);}
if ($player2id == $home_pg1 OR $player2id == $home_sg1 OR $player2id == $home_sf1 OR $player2id == $home_pf1 OR $player2id == $home_c1 OR $player2id == $home_pg2 OR $player2id == $home_sg2 OR $player2id == $home_sf2 OR $player2id == $home_pf2 OR $player2id == $home_c2){
$get_team=str_replace('$player2id',"<font color=#56704B><b>$surname2</b></font>",$get_team);} else { $get_team=str_replace('$player2id',"<font color=#A30006><b>$surname2</b></font>",$get_team);}

$get_team=str_replace('$home_sc',"$home_sc",$get_team);
$get_team=str_replace('$away_sc.',"$away_sc",$get_team);

echo stripslashes($get_team)."<br/>";

$i++;
}
$p++;
}
}
?>
<br/>
</td>
</tr>
</table>
</div>
</div>
</body>
</html>