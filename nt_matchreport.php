<?php
$coexpand=14;

$matchid=$_GET['matchid'];
if (!is_numeric($matchid)) {die(include 'index.php');}

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$comparepasss = mysql_query("SELECT club, supporter, lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($comparepasss)==1) {
$trueclub = mysql_result ($comparepasss,0,"club");
$is_supporter = mysql_result ($comparepasss,0,"supporter");
$lang = mysql_result ($comparepasss,0,"lang");
}
else {die(include 'basketsim.php');}

$zdaj = date("Y-m-d H:i:s");
$vzivo = mysql_query("SELECT event_id FROM nt_matchevents WHERE event_time > '$zdaj' && match_id ='$matchid' LIMIT 1") or die(mysql_error());
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
$result = mysql_query("SELECT * FROM nt_matchevents WHERE event_time < '$zdaj' && match_id ='$matchid' ORDER BY event_time ASC, event_id ASC");
$num=mysql_num_rows($result);
if ($num == 0){$tekmabo = mysql_query("SELECT home_id, away_id, time FROM nt_matches WHERE matchid ='$matchid'") or die(mysql_error());
if (mysql_num_rows($tekmabo) < 1) {die ("$langmark325.<br/><a href=\"javascript: history.go(-1)\">$langmark059</a></td></tr></table>");}
else {
$team1=mysql_result($tekmabo,0,"home_id");
$team2=mysql_result($tekmabo,0,"away_id");
$timeof=mysql_result($tekmabo,0,"time");
$splitdt1 = explode(" ", $timeof); $bdate1 = $splitdt1[0]; $btime1 = $splitdt1[1];
$splitd1 = explode("-", $bdate1); $byear1 = $splitd1[0]; $bmonth1 = $splitd1[1]; $bday1 = $splitd1[2];
$splitt1 = explode(":", $btime1); $bhour1 = $splitt1[0]; $bmin1 = $splitt1[1]; $bsec1 = $splitt1[2];
$timdisp = date('jS \of F H:i', mktime($bhour1,$bmin1,$bsec1,$bmonth1,$bday1,$byear1));

$gledalci = mysql_query("SELECT home_id, home_name, away_id, away_name FROM nt_matches WHERE matchid ='$matchid' LIMIT 1");
$home_id=mysql_result($gledalci,0,"home_id");
$away_id=mysql_result($gledalci,0,"away_id");
$home_name=mysql_result($gledalci,0,"home_name");
$away_name=mysql_result($gledalci,0,"away_name");

die("<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td align=\"left\"><b>".$home_name." - ".$away_name."</b></td><td align=\"right\"><b>$langmark647:</b> $matchid</td></tr></table>
<p>".$langmark688." ".$timdisp.".<br/>".$langmark689."</p>
<a href=\"javascript: history.go(-1)\">".$langmark132."</a></td>
<td class=\"border\" width=\"45%\"><h2>".$langmark335."</h2><br/><a href=\"nationalteams.php?country=$home_name\">".$home_name."</a><br/><a href=\"nationalteams.php?country=$away_name\">".$away_name."</a></td></tr></table>");}
}

$gledalci = mysql_query("SELECT * FROM nt_matches WHERE matchid ='$matchid' LIMIT 1");
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

$gled = $gl1 + $gl2 + $gl3 + $gl4;
$ar1 = mysql_query("SELECT arenaname FROM arena WHERE teamid ='$arena' LIMIT 1");
$imearene=mysql_result($ar1,0);
$imearene=stripslashes($imearene);
$splitdt1 = explode(" ", $time_tekme); $bdate1 = $splitdt1[0]; $btime1 = $splitdt1[1];
$splitd1 = explode("-", $bdate1); $byear1 = $splitd1[0]; $bmonth1 = $splitd1[1]; $bday1 = $splitd1[2];
$splitt1 = explode(":", $btime1); $bhour1 = $splitt1[0]; $bmin1 = $splitt1[1]; $bsec1 = $splitt1[2];
$timdisp = date('jS \of F H:i', mktime($bhour1,$bmin1,$bsec1,$bmonth1,$bday1,$byear1));
?>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr>
<td>
<?php
echo "<b>",$timdisp,"</b></td><td align=\"right\"><b>",$langmark647,":</b> ",$matchid,"</td></tr></table>";
echo "<hr/>",$langmark336," <b>",$imearene,"</b>. ",$gled," ",$langmark337,".<br/><br/>";

$timest=0;$lamb=0; $lamb1=0; $lchg=0; $domaST=0; $goST=0; $domaRE=0; $gostRE=0;
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

$tp1 = mysql_query("SELECT country FROM countries WHERE countryid ='$team1id' LIMIT 1");
$jam = mysql_num_rows($tp1);
if ($jam > 0){$temname=mysql_result($tp1,0);}
$tp2 = mysql_query("SELECT country FROM countries WHERE countryid ='$team2id' LIMIT 1");
$lum = mysql_num_rows($tp2);
if ($lum > 0){$temname2=mysql_result($tp2,0);}

$resultp1 = mysql_query("SELECT name,surname FROM players WHERE id ='$player1id' LIMIT 1");
$drum = mysql_numrows($resultp1);
if ($drum > 0){
$name1=mysql_result($resultp1,0,"name");
$surname1=mysql_result($resultp1,0,"surname");
}

$resultp2 = mysql_query("SELECT name,surname FROM players WHERE id ='$player2id' LIMIT 1");
$bum = mysql_num_rows($resultp2);
if ($bum > 0){
$name2=mysql_result($resultp2,0,"name");
$surname2=mysql_result($resultp2,0,"surname");
}

$query = mysql_query("SELECT description FROM descriptions WHERE descid=$desc_id LIMIT 1");
while ($users_team = mysql_fetch_array($query, MYSQL_ASSOC))
   {   foreach ($users_team as $get_team)
   {$get_team; }     } ;


if ($team1id==$prvaekipa){
$get_team=str_replace('$team1id',"<font color=#56704B><b>$temname</b></font>",$get_team);
$get_team=str_replace('$team2id',"<font color=#A30006><b>$temname2</b></font>",$get_team);
}
if ($team1id==$drugaekipa){
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
?>

</td><td class="border" width="31%">

<?php
$home_id=$prvaekipa;
$away_id=$drugaekipa;
?>

<table border="0" cellspacing="0" cellpadding="0" width="100%"><tr><td width="20">
<a href="nationalteams.php?country=<?=$home_name?>"><img src="img/link.jpg" alt="" border="0"></a></td><td><b><font color="#56704B"><?=$home_name?></font></b></td>
<td align="right"><b><?=$home_sc?></b></td><tr><td width="20">
<a href="nationalteams.php?country=<?=$away_name?>"><img src="img/link.jpg" alt="" border="0"></a></td><td><b><font color="#A30006"><?=$away_name?></font></b></td>
<td align="right"><b><?=$away_sc?></b></b></td>

<tr><td colspan="3"><br/></td></tr>
<tr><td colspan="3" class="border" align="center"><b>Points after steals</b><br/><?=$domaST," : ",$goST?></td></tr>
<tr><td colspan="3"><br/></td></tr>
<tr><td colspan="3" class="border" align="center"><b>Points after rebounds</b><br/><?=$domaRE," : ",$goRE?></td></tr>
<tr><td colspan="3"><br/></td></tr>
<tr><td colspan="3" class="border" align="center"><b>Lead changes: </b><?=$lchg?></td></tr>
</table>
<br/>[<a href="javascript: history.go(-1)"><?=$langmark409?></a>]

<?php
if ($is_supporter <> 1) {
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