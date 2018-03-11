<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT club, supporter, lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)) {
$get_team = mysql_result($compare,0,"club");
$is_supporter = mysql_result($compare,0,"supporter");
$lang = mysql_result ($compare,0,"lang");
}
else {die(include 'basketsim.php');}
if ($is_supporter<>1) {header("Location: supporter.php");}
require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2><?=$langmark377?></h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="100%">

<i>In the table below you can see exact skills of your players. For example skill 9.01 means that player is just slightly over visible skill "great". On the other hand skill 9.99 means that he is very close to "extremely great" level. Check the list of skills <a href="gamerules.php?action=denominations">here</a>.</i>
<!--<br/><br/>
<i>If skills are marked green this means that with same training level as player had the week before, he would improve a visible skill in just one additional training. The only thing that could restrict him from doing so is if that's a close call and your coach is on his way of losing motivation, but such cases should be rare. Always check training report as well, to be sure about the upcoming skill pop!</i>
<br/><br/>
<i>Old players can also have skills marked red, meaning that they can drop level of that skill in just one training. so be careful in what training group will they be assigned and with what intensity will they train.</i>-->
<br/><br/>

<table border="0" cellspacing="0" cellpadding="3" width="100%">
<?php
echo "<tr width=\"100%\">
<td align=\"left\"></td>
<td align=\"center\"><b>HAN</b></td>
<td align=\"center\"><b>QUI</b></td>
<td align=\"center\"><b>PAS</b></td>
<td align=\"center\"><b>DRI</b></td>
<td align=\"center\"><b>REB</b></td>
<td align=\"center\"><b>POS</b></td>
<td align=\"center\"><b>FT</b></td>
<td align=\"center\"><b>SHO</b></td>
<td align=\"center\"><b>DEF</b></td>
<td align=\"center\"><b>WR</b></td>
<!--<td align=\"center\"><small>last<br/>training</small></td>-->
</tr>";

$act = $_GET["act"];
$query1 = "SELECT *, IF (shirt IS NULL || shirt ='' || shirt=0, 1, 0) AS isnull FROM players WHERE club ='$get_team' AND coach=9 ORDER BY isnull ASC, shirt ASC, wage DESC";
$query2 = "SELECT *, IF (shirt IS NULL || shirt ='' || shirt=0, 1, 0) AS isnull FROM players WHERE club ='$get_team' AND coach=0 ORDER BY isnull ASC, shirt ASC, wage DESC";
if ($act=='yt') {$result = mysql_query($query1);} else {$result = mysql_query($query2);}
while ($i = mysql_fetch_array($result)) {
$id=$i[id];
$name=$i[name];
$surname=$i[surname];
$age=$i[age];
$country=$i[country];
$height=$i[height];
$weight=$i[weight];
$handling=$i[handling];
$speed=$i[speed];
$passing=$i[passing];
$vision=$i[vision];
$rebounds=$i[rebounds];
$position=$i[position];
$freethrow=$i[freethrow];
$shooting=$i[shooting];
$defense=$i[defense];
$workrate=$i[workrate];
$experience=$i[experience];
$last_training=$i[last_training];
$ntplayer=$i[ntplayer];
if ($gmah % 2) {$coloric = 'white';} else {$coloric = '#ECE5CE';}

$a1 = floor((($handling-1)/8)*100)/100; if ($handling==0 AND $act=='yt') {$d1 = '-';} else {$d1 = number_format($a1,2);}
$a2 = floor((($speed-1)/8)*100)/100; if ($speed==0 AND $act=='yt') {$d2 = '-';} else {$d2 = number_format($a2,2);}
$a3 = floor((($passing-1)/8)*100)/100; if ($passing==0 AND $act=='yt') {$d3 = '-';} else {$d3 = number_format($a3,2);}
$a4 = floor((($vision-1)/8)*100)/100; if ($vision==0 AND $act=='yt') {$d4 = '-';} else {$d4 = number_format($a4,2);}
$a5 = floor((($rebounds-1)/8)*100)/100; if ($rebounds==0 AND $act=='yt') {$d5 = '-';} else {$d5 = number_format($a5,2);}
$a6 = floor((($position-1)/8)*100)/100; if ($position==0 AND $act=='yt') {$d6 = '-';} else {$d6 = number_format($a6,2);}
$a7 = floor((($freethrow-1)/8)*100)/100; if ($freethrow==0 AND $act=='yt') {$d7 = '-';} else {$d7 = number_format($a7,2);}
$a8 = floor((($shooting-1)/8)*100)/100; if ($shooting==0 AND $act=='yt') {$d8 = '-';} else {$d8 = number_format($a8,2);}
$a9 = floor((($defense-1)/8)*100)/100; if ($defense==0 AND $act=='yt') {$d9 = '-';} else {$d9 = number_format($a9,2);}
$a10 = floor((($experience-1)/8)*100)/100; if ($experience==0 AND $act=='yt') {$d10 = '-';} else {$d10 = number_format($a10,2);}
$a11 = floor((($workrate-1)/8)*100)/100; if ($workrate==0 AND $act=='yt') {$d11 = '-';} else {$d11 = number_format($a11,2);}
if ($d11==-0.13) {$d11=0;}

echo "<tr width=\"100%\" bgcolor=\"$coloric\">
<td align=\"left\"><a href=\"player.php?playerid=",$id,"\" class=\"greenhilite\">",$name," ",$surname,"</a></td>
<td align=\"center\">",$d1,"</td>
<td align=\"center\">",$d2,"</td>
<td align=\"center\">",$d3,"</td>
<td align=\"center\">",$d4,"</td>
<td align=\"center\">",$d5,"</td>
<td align=\"center\">",$d6,"</td>
<td align=\"center\">",$d7,"</td>
<td align=\"center\">",$d8,"</td>
<td align=\"center\">",$d9,"</td>
<td align=\"center\">",$d11,"</td>
</tr>";
$gmah++;
}?>
</table><br/><hr/>
<?php if($act=='yt'){?>
<a href="playerstable.php">Back to senior team</a> | <a href="training.php">Back to training page</a> | <a href="yteam.php">To the players list</a>
<?php } else {
if (mysql_num_rows(mysql_query($query1))){?><a href="playerstable.php?act=yt">Switch to juniors</a> | <?php }?>
<a href="training.php">Back to training page</a> | <a href="players.php">To the players list</a>
<?php }?>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>