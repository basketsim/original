<?php
$matchid=$_GET['matchid'];
if (!is_numeric($matchid)) {die(include 'index.php');}

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT club, supporter, lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)) {
$trueclub = mysql_result ($compare,0,"club");
$is_supporter = mysql_result ($compare,0,"supporter");
$lang = mysql_result ($compare,0,"lang");
}
else {die(include 'basketsim.php');}

$action=$_GET["action"];
SWITCH ($action) {
CASE 'bookmark':
if ($is_supporter==1) {
$already = mysql_query("SELECT bookmarkid FROM bookmarks WHERE b_type =3 && multiview =0 && team ='$trueclub' && b_link ='$matchid' LIMIT 1") or die(mysql_error());
if (!mysql_num_rows($already)) {mysql_query("INSERT INTO bookmarks VALUES ('', $trueclub, '', $matchid, 3, 0);") or die(mysql_error());}
header ("Location: bookmarks.php");
} break;
CASE 'multiview':
$already = mysql_query("SELECT bookmarkid FROM bookmarks WHERE b_type =1 && multiview =1 && team ='$trueclub' && b_link ='$matchid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($already)>5 && $is_supporter==1) {header("Location:multiview.php?act=7"); die();}
if (mysql_num_rows($already)>2 && $is_supporter==0) {header("Location:multiview.php?act=7"); die();}
if (!mysql_num_rows($already)) {mysql_query("INSERT INTO bookmarks VALUES ('', $trueclub, '', $matchid, 3, 1);") or die(mysql_error());}
header("Location: multiview.php");
break;
}

$zdaj = date("Y-m-d H:i:s");
$vzivo = mysql_query("SELECT event_id FROM matchevents1 WHERE event_time > '$zdaj' && match_id ='$matchid'") or die(mysql_error());
if (mysql_num_rows($vzivo) > 0) {$refresh=1798;}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2><?=$langmark324?></h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="69%">

<?php
$result = mysql_query("SELECT * FROM matchevents1 WHERE event_time < '$zdaj' && match_id ='$matchid' ORDER BY event_time ASC, event_id ASC");
$num=mysql_num_rows($result);
if ($num == 0){$tekmabo = mysql_query("SELECT home_id, away_id, time FROM matches WHERE matchid ='$matchid'") or die(mysql_error());
if (mysql_num_rows($tekmabo) < 1) {die ("$langmark325.<br/><a href=\"javascript: history.go(-1)\">$langmark059</a></td></tr></table>");}
else {
$team1=mysql_result($tekmabo,0,"home_id");
$team2=mysql_result($tekmabo,0,"away_id");
$timeof=mysql_result($tekmabo,0,"time");
$tp1 = mysql_query("SELECT name FROM teams WHERE teamid ='$team1' LIMIT 1") or die(mysql_error());
$jam = mysql_numrows($tp1); if ($jam > 0){$temname=mysql_result($tp1,0); $temname=stripslashes($temname);}
$tp2 = mysql_query("SELECT name FROM teams WHERE teamid ='$team2' LIMIT 1") or die(mysql_error());
$lum = mysql_numrows($tp2); if ($lum > 0){$temname2=mysql_result($tp2,0); $temname2=stripslashes($temname2);}
$splitdt1 = explode(" ", $timeof); $bdate1 = $splitdt1[0]; $btime1 = $splitdt1[1];
$splitd1 = explode("-", $bdate1); $byear1 = $splitd1[0]; $bmonth1 = $splitd1[1]; $bday1 = $splitd1[2];
$splitt1 = explode(":", $btime1); $bhour1 = $splitt1[0]; $bmin1 = $splitt1[1]; $bsec1 = $splitt1[2];
$timdisp = date('d.m.Y H:i', mktime($bhour1,$bmin1,$bsec1,$bmonth1,$bday1,$byear1));
//bookmark
if ($action=='bookmark') {
$already = mysql_query("SELECT * FROM bookmarks WHERE b_type =3 && multiview =0 && team ='$trueclub' AND b_link ='$matchid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($already)) {echo "<table cellpadding=\"9\" cellspacing=\"9\" width=\"100%\"><tr bgcolor=\"#eeeeee\"><td class=\"border\">",$langmark326," ",$langmark094," <a href=\"bookmarks.php\">",$langmark095,"</a>.</td></tr></table>";}
else {mysql_query("INSERT INTO bookmarks VALUES ('', $trueclub, '', $matchid, 3, 0);") or die(mysql_error()); echo "<table cellpadding=\"9\" cellspacing=\"9\" width=\"100%\"><tr bgcolor=\"#eeeeee\"><td class=\"border\">",$langmark327," ",$langmark094," <a href=\"bookmarks.php\">",$langmark095,"</a>.</td></tr></table>";}
}
if ($action=='multiview') {
$already = mysql_query("SELECT * FROM bookmarks WHERE b_type =3 && multiview =1 && team ='$trueclub' AND b_link ='$matchid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($already)) {echo "<table cellpadding=\"9\" cellspacing=\"9\" width=\"100%\"><tr bgcolor=\"#eeeeee\"><td class=\"border\">",$langmark328," <a href=\"multiview.php\">",$langmark330,"</a>!</td></tr></table>";}
else {mysql_query("INSERT INTO bookmarks VALUES ('', $trueclub, '', $matchid, 3, 1);") or die(mysql_error()); echo "<table cellpadding=\"9\" cellspacing=\"9\" width=\"100%\"><tr bgcolor=\"#eeeeee\"><td class=\"border\">",$langmark329," <a href=\"multiview.php\">",$langmark330,"</a>!</td></tr></table>";}
}
$gledalci = mysql_query("SELECT home_id, away_id FROM matches WHERE matchid ='$matchid' LIMIT 1");
$home_id=mysql_result($gledalci,0,"home_id");
$away_id=mysql_result($gledalci,0,"away_id");
$result18 = mysql_query("SELECT userid FROM users WHERE club ='$home_id' LIMIT 1");
while ($cln = mysql_fetch_array($result18, MYSQL_ASSOC))
   {   foreach ($cln as $clink)
   {$clink; }     } ;
$result18b = mysql_query("SELECT userid FROM users WHERE club ='$away_id' LIMIT 1");
while ($bln = mysql_fetch_array($result18b, MYSQL_ASSOC))
   {   foreach ($bln as $blink)
   {$blink; }     } ;
$result19 = mysql_query("SELECT status FROM teams WHERE teamid ='$home_id' LIMIT 1");
while ($stat = mysql_fetch_array($result19, MYSQL_ASSOC))
   {   foreach ($stat as $statusje)
   {$statusje; }     } ;
$result19b = mysql_query("SELECT status FROM teams WHERE teamid ='$away_id' LIMIT 1");
while ($statb = mysql_fetch_array($result19b, MYSQL_ASSOC))
   {   foreach ($statb as $statusjeb)
   {$statusjeb; }     } ;
if ($statusje != 3) {$dpovezava = "<a href=club.php?clubid=".$clink.">";}
else {$dpovezava = "<a href=team.php?clubid=".$home_id.">";}
if ($statusjeb != 3) {$gpovezava= "<a href=club.php?clubid=".$blink.">";}
else {$gpovezava = "<a href=team.php?clubid=".$away_id.">";}

if($is_supporter==1){$prikaz_book="&nbsp;<a href=\"matchreport1.php?matchid=$matchid&action=bookmark\"><img src=\"img/bookmark.jpg\" border=\"0\" alt=\"".$langmark331."\" title=\"".$langmark331."\"></a>&nbsp;";}
if($is_supporter<>1){$prikaz_book="&nbsp;";}

die("<b>$temname - $temname2</b>
$prikaz_book<a href=\"matchreport1.php?matchid=".$matchid."&action=multiview\"><img src=\"img/live.jpg\" border=\"0\" alt=\"".$langmark332."\" title=\"".$langmark332."\"></a></p>
<p>".$langmark333." $timdisp.<br/>".$langmark334."</p>
<a href=\"javascript: history.go(-1)\">".$langmark132."</a></td>
<td class=border width=\"40%\"><h2>".$langmark335."</h2><br/>".$dpovezava."".$temname."</a><br/>".$gpovezava."".$temname2."</a></td></tr></table>");}
}

$gledalci = mysql_query("SELECT * FROM matches WHERE matchid ='$matchid' LIMIT 1");
$prvaekipa=mysql_result($gledalci,0,"home_id");
$home_name=mysql_result($gledalci,0,"home_name");
$drugaekipa=mysql_result($gledalci,0,"away_id");
$away_name=mysql_result($gledalci,0,"away_name");
$arena=mysql_result($gledalci,0,"arena_id");
$gl1=mysql_result($gledalci,0,"crowd1");
$gl2=mysql_result($gledalci,0,"crowd2");
$gl3=mysql_result($gledalci,0,"crowd3");
$gl4=mysql_result($gledalci,0,"crowd4");
$time_tekme=mysql_result($gledalci,0,"time");
$home_pg1=mysql_result($gledalci,0,"home_pg1");
$home_sg1=mysql_result($gledalci,0,"home_sg1");
$home_sf1=mysql_result($gledalci,0,"home_sf1");
$home_pf1=mysql_result($gledalci,0,"home_pf1");
$home_c1=mysql_result($gledalci,0,"home_c1");
$away_pg1=mysql_result($gledalci,0,"away_pg1");
$away_sg1=mysql_result($gledalci,0,"away_sg1");
$away_sf1=mysql_result($gledalci,0,"away_sf1");
$away_pf1=mysql_result($gledalci,0,"away_pf1");
$away_c1=mysql_result($gledalci,0,"away_c1");
$home_pg2=mysql_result($gledalci,0,"home_pg2");
$home_sg2=mysql_result($gledalci,0,"home_sg2");
$home_sf2=mysql_result($gledalci,0,"home_sf2");
$home_pf2=mysql_result($gledalci,0,"home_pf2");
$home_c2=mysql_result($gledalci,0,"home_c2");
$away_pg2=mysql_result($gledalci,0,"away_pg2");
$away_sg2=mysql_result($gledalci,0,"away_sg2");
$away_sf2=mysql_result($gledalci,0,"away_sf2");
$away_pf2=mysql_result($gledalci,0,"away_pf2");
$away_c2=mysql_result($gledalci,0,"away_c2");

$homepg_name = @mysql_query("SELECT surname FROM players WHERE id =$home_pg1 LIMIT 1"); $hpg1name=@mysql_result($homepg_name,0);
$homesg_name = @mysql_query("SELECT surname FROM players WHERE id =$home_sg1 LIMIT 1"); $hsg1name=@mysql_result($homesg_name,0);
$homesf_name = @mysql_query("SELECT surname FROM players WHERE id =$home_sf1 LIMIT 1"); $hsf1name=@mysql_result($homesf_name,0);
$homepf_name = @mysql_query("SELECT surname FROM players WHERE id =$home_pf1 LIMIT 1"); $hpf1name=@mysql_result($homepf_name,0);
$homec_name = @mysql_query("SELECT surname FROM players WHERE id =$home_c1 LIMIT 1"); $hc1name=@mysql_result($homec_name,0);
$awaypg_name = @mysql_query("SELECT surname FROM players WHERE id =$away_pg1 LIMIT 1"); $apg1name=@mysql_result($awaypg_name,0);
$awaysg_name = @mysql_query("SELECT surname FROM players WHERE id =$away_sg1 LIMIT 1"); $asg1name=@mysql_result($awaysg_name,0);
$awaysf_name = @mysql_query("SELECT surname FROM players WHERE id =$away_sf1 LIMIT 1"); $asf1name=@mysql_result($awaysf_name,0);
$awaypf_name = @mysql_query("SELECT surname FROM players WHERE id =$away_pf1 LIMIT 1"); $apf1name=@mysql_result($awaypf_name,0);
$awayc_name = @mysql_query("SELECT surname FROM players WHERE id =$away_c1 LIMIT 1"); $ac1name=@mysql_result($awayc_name,0);
$homepg2_name = @mysql_query("SELECT surname FROM players WHERE id=$home_pg2 LIMIT 1"); $hpg2name=@mysql_result($homepg2_name,0);
$homesg2_name = @mysql_query("SELECT surname FROM players WHERE id=$home_sg2 LIMIT 1"); $hsg2name=@mysql_result($homesg2_name,0);
$homesf2_name = @mysql_query("SELECT surname FROM players WHERE id=$home_sf2 LIMIT 1"); $hsf2name=@mysql_result($homesf2_name,0);
$homepf2_name = @mysql_query("SELECT surname FROM players WHERE id=$home_pf2 LIMIT 1"); $hpf2name=@mysql_result($homepf2_name,0);
$homec2_name = @mysql_query("SELECT surname FROM players WHERE id=$home_c2 LIMIT 1"); $hc2name=@mysql_result($homec2_name,0);
$awaypg2_name = @mysql_query("SELECT surname FROM players WHERE id=$away_pg2 LIMIT 1"); $apg2name=@mysql_result($awaypg2_name,0);
$awaysg2_name = @mysql_query("SELECT surname FROM players WHERE id=$away_sg2 LIMIT 1"); $asg2name=@mysql_result($awaysg2_name,0);
$awaysf2_name = @mysql_query("SELECT surname FROM players WHERE id=$away_sf2 LIMIT 1"); $asf2name=@mysql_result($awaysf2_name,0);
$awaypf2_name = @mysql_query("SELECT surname FROM players WHERE id=$away_pf2 LIMIT 1"); $apf2name=@mysql_result($awaypf2_name,0);
$awayc2_name = @mysql_query("SELECT surname FROM players WHERE id=$away_c2 LIMIT 1"); $ac2name=@mysql_result($awayc2_name,0);

$gled = $gl1 + $gl2 + $gl3 + $gl4;
$ar1 = mysql_query("SELECT arenaname FROM arena WHERE arenaid ='$arena' LIMIT 1");
$imearene=mysql_result($ar1,0);
$imearene=stripslashes($imearene);
$splitdt1 = explode(" ", $time_tekme); $bdate1 = $splitdt1[0]; $btime1 = $splitdt1[1];
$splitd1 = explode("-", $bdate1); $byear1 = $splitd1[0]; $bmonth1 = $splitd1[1]; $bday1 = $splitd1[2];
$splitt1 = explode(":", $btime1); $bhour1 = $splitt1[0]; $bmin1 = $splitt1[1]; $bsec1 = $splitt1[2];
$timdisp = date('d.m.Y H:i', mktime($bhour1,$bmin1,$bsec1,$bmonth1,$bday1,$byear1));
?>

<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr>
<td>
<?php
echo "<b>",$timdisp,"</b>";
if ($is_supporter==1){echo "&nbsp;<a href=\"matchreport1.php?matchid=",$matchid,"&action=bookmark\"><img src=\"img/bookmark.jpg\" border=\"0\" alt=\"",$langmark331,"\" title=\"",$langmark331,"\"></a>";}
if ($refresh==1798) {echo "&nbsp;<a href=\"matchreport1.php?matchid=",$matchid,"&action=multiview\"><img src=img/live.jpg border=\"0\" alt=\"",$langmark332,"\" title=\"",$langmark332,"\"></a>";}
echo "</td><td align=\"right\"><b>",$langmark647,":</b> ",$matchid,"</td></tr></table>";
echo "<hr/>",$langmark336," <b>",$imearene,"</b>. ",$gled," ",$langmark337,".<br/><br/>";

$timest=0;$lamb=0; $lamb1=0; $lchg=0; $domaST=0; $goST=0; $domaRE=0; $goRE=0;
$i=0;
while ($i < $num) {
$event_id=mysql_result($result,$i,"event_id");
$player1id=mysql_result($result,$i,"player1id");
$team1id=mysql_result($result,$i,"team1id");
$player2id=mysql_result($result,$i,"player2id");
$team2id=mysql_result($result,$i,"team2id");
$event_type=mysql_result($result,$i,"event_type");
$desc_id=mysql_result($result,$i,"desc_id");
$event_time=mysql_result($result,$i,"event_time");
$quater=mysql_result($result,$i,"quater");
$home_sc=mysql_result($result,$i,"home_sc");
$home_sc1=@mysql_result($result,$i+1,"home_sc");
$away_sc=mysql_result($result,$i,"away_sc");
$away_sc1=@mysql_result($result,$i+1,"away_sc");

if ($home_sc1 >0 AND $home_sc1==$away_sc1 AND $home_sc<>$away_sc) {$timest=$timest+1;}
if ($home_sc<>$away_sc) {$lamb = $home_sc - $away_sc;}
if ($home_sc1<>$away_sc1) {$lamb1 = $home_sc1 - $away_sc1;}
if (($lamb > 0 AND $lamb1 < 0) OR ($lamb < 0 AND $lamb1 > 0)) {$lchg=$lchg+1;}

//Points after steals
if ($event_type==23 AND $team1id==$prvaekipa) {$domaST=$domaST+2;}
elseif ($event_type==24 AND $team1id==$prvaekipa) {$domaST=$domaST+3;}
elseif ($event_type==23 AND $team1id==$drugaekipa) {$goST=$goST+2;}
elseif ($event_type==24 AND $team1id==$drugaekipa) {$goST=$goST+3;}
//Points after rebounds
if ($event_type==27 AND $team1id==$prvaekipa) {$domaRE=$domaRE+2;}
elseif ($event_type==27 AND $team1id==$drugaekipa) {$goRE=$goRE+2;}

switch ($player1id){
	case $home_pg1: $surname1=$hpg1name; break;
	case $home_sg1: $surname1=$hsg1name; break;
	case $home_sf1: $surname1=$hsf1name; break;
	case $home_pf1: $surname1=$hpf1name; break;
	case $home_c1: $surname1=$hc1name; break;
	case $away_pg1: $surname1=$apg1name; break;
	case $away_sg1: $surname1=$asg1name; break;
	case $away_sf1: $surname1=$asf1name; break;
	case $away_pf1: $surname1=$apf1name; break;
	case $away_c1: $surname1=$ac1name; break;
	case $home_pg2: $surname1=$hpg2name; break;
	case $home_sg2: $surname1=$hsg2name; break;
	case $home_sf2: $surname1=$hsf2name; break;
	case $home_pf2: $surname1=$hpf2name; break;
	case $home_c2: $surname1=$hc2name; break;
	case $away_pg2: $surname1=$apg2name; break;
	case $away_sg2: $surname1=$asg2name; break;
	case $away_sf2: $surname1=$asf2name; break;
	case $away_pf2: $surname1=$apf2name; break;
	case $away_c2: $surname1=$ac2name; break;
}
switch ($player2id){
	case $home_pg1: $surname2=$hpg1name; break;
	case $home_sg1: $surname2=$hsg1name; break;
	case $home_sf1: $surname2=$hsf1name; break;
	case $home_pf1: $surname2=$hpf1name; break;
	case $home_c1: $surname2=$hc1name; break;
	case $away_pg1: $surname2=$apg1name; break;
	case $away_sg1: $surname2=$asg1name; break;
	case $away_sf1: $surname2=$asf1name; break;
	case $away_pf1: $surname2=$apf1name; break;
	case $away_c1: $surname2=$ac1name; break;
	case $home_pg2: $surname2=$hpg2name; break;
	case $home_sg2: $surname2=$hsg2name; break;
	case $home_sf2: $surname2=$hsf2name; break;
	case $home_pf2: $surname2=$hpf2name; break;
	case $home_c2: $surname2=$hc2name; break;
	case $away_pg2: $surname2=$apg2name; break;
	case $away_sg2: $surname2=$asg2name; break;
	case $away_sf2: $surname2=$asf2name; break;
	case $away_pf2: $surname2=$apf2name; break;
	case $away_c2: $surname2=$ac2name; break;
}

$query = mysql_query("SELECT description FROM descriptions WHERE descid ='$desc_id' LIMIT 1");
while ($users_team = mysql_fetch_array($query, MYSQL_ASSOC))
   {   foreach ($users_team as $get_team)
   {$get_team; }     } ;

if ($team1id==$prvaekipa){
$get_team=str_replace('$team1id',"<font color=#56704B><b>$home_name</b></font>",$get_team);
$get_team=str_replace('$team2id',"<font color=#A30006><b>$away_name</b></font>",$get_team);
}
if ($team1id==$drugaekipa){
$get_team=str_replace('$team1id',"<font color=#A30006><b>$away_name</b></font>",$get_team);
$get_team=str_replace('$team2id',"<font color=#56704B><b>$home_name</b></font>",$get_team);
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
?>

</td><td class="border" width="31%">

<?php
$home_id=$prvaekipa;
$away_id=$drugaekipa;

$result18 = mysql_query("SELECT userid FROM users WHERE club =$home_id LIMIT 1");
while ($cln = mysql_fetch_array($result18, MYSQL_ASSOC))
   {   foreach ($cln as $clink)
   {$clink; }     } ;

$result18b = mysql_query("SELECT userid FROM users WHERE club =$away_id LIMIT 1");
while ($bln = mysql_fetch_array($result18b, MYSQL_ASSOC))
   {   foreach ($bln as $blink)
   {$blink; }     } ;
?>

<table border="0" cellspacing="0" cellpadding="0" width="100%"><tr><td width="20">
<?php if ($clink >0) {echo "<a href=\"club.php?clubid=",$clink,"\">";} else {echo "<a href=\"team.php?clubid=",$home_id,"\">";}?>
<img src="img/link.jpg" border="0" alt=""></a></td><td><b><font color="#56704B"><?=$home_name?></font></b></td>
<td align="right"><b><?=$home_sc?></b></td><tr><td width="20">
<?php if ($blink >0) {echo "<a href=\"club.php?clubid=",$blink,"\">";} else {echo "<a href=\"team.php?clubid=",$away_id,"\">";}?>
<img src="img/link.jpg" border="0" alt=""></a></td><td><b><font color="#A30006"><?=$away_name?></font></b></td>
<td align="right"><b><?=$away_sc?></b></td></tr>

<tr><td colspan="3"><br/></td></tr>
<tr><td colspan="3" class="border" align="center"><b>Points after steals</b><br/><?=$domaST," : ",$goST?></td></tr>
<tr><td colspan="3"><br/></td></tr>
<tr><td colspan="3" class="border" align="center"><b>Points after rebounds</b><br/><?=$domaRE," : ",$goRE?></td></tr>
<tr><td colspan="3"><br/></td></tr>
<tr><td colspan="3" class="border" align="center"><b>Lead changes: </b><?=$lchg?></td></tr>
</table>
<br/>[<a href="javascript: history.go(-1)"><?=$langmark409?></a>]

<?php
if ($is_supporter <>1) {
?>
<br/><br/>
<script type="text/javascript"><!--
google_ad_client = "pub-9708116335383093";
google_alternate_color = "ffffff";
google_ad_width = 125;
google_ad_height = 125;
google_ad_format = "125x125_as";
google_ad_type = "text_image";
google_ad_channel = "";
google_color_border = "B00000";
google_color_bg = "FFFFFF";
google_color_link = "B00000";
google_color_text = "000000";
google_color_url = "008800";
//--></script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
<?php } else {echo "<br/>";}?>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>