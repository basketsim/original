<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}
$compare = mysql_query("SELECT lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)) {$lang = mysql_result($compare,0);} else {die(include 'basketsim.php');}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>
<div id="main">
<h2><?=$langmark338?></h2>

<table cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="68%">

<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td colspan="3" valign="top">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr nowrap>
<td width="100" align="left"><b><?=$langmark348?></b></td>
<td width="205"><b><?=$langmark341?></b></td>
<td width="85"><b><?=$langmark342?></b></td>
<tr><td colspan="4"><hr/></td></tr>
<?php
$action=$_GET['action'];
if ($action == more){
$query = "SELECT `msgid`, `username`, `to_id`, `read`, `time`, `title` FROM `messages` LEFT JOIN users ON messages.to_id = users.userid WHERE `from_id` ='$userid'"; $shrew=1000;
} else {
$query = "SELECT `msgid`, `username`, `to_id`, `read`, `time`, `title` FROM `messages` LEFT JOIN users ON messages.to_id = users.userid WHERE `from_id` ='$userid'"; $shrew=30;
}
function multisort($array, $tag=1, $limit=10, $sort_by, $key1, $key2=NULL, $key3=NULL, $key4=NULL, $key5=NULL, $key6=NULL, $key7=NULL, $key8=NULL){
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
$i++;
}
}
return $return_array;
}

$resultev = mysql_query($query);
$all_info = array();
while ($get_info = mysql_fetch_row($resultev)){
$all_info[] = $get_info;
$smoga=$smoga+1;
}

if ($smoga > 0) {
$all_info = multisort($all_info,2,$shrew,'0','1','2','3','4','5','6','7','8');
foreach($all_info as $get_info) {
$splitdatetime = explode(" ", $get_info[4]); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$disdate = date("d.m.y H:i", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));
?>
<tr width="100%" onmouseover="style.backgroundColor='#F5DEB3';" onmouseout="style.backgroundColor='white'"><td align="left"><?php if ($get_info[3]==0) {echo "<img src=img/mes.gif> ";}
if ($get_info[2]==0 AND $get_info[5]<>'New player found') { ?>Administration&nbsp;</td>
<?php } elseif ($get_info[2]==0 AND $get_info[5]=='New player found'){ ?>Scouting&nbsp;service&nbsp;</td>
<?php } else { ?><a href="club.php?clubid=<?=$get_info[2]?>"><?=$get_info[1]?></a>&nbsp;</td>
<?php } ?>
<td><a href="message.php?messageid=<?=$get_info[0]?>"><?=stripslashes($get_info[5])?></a>&nbsp;</td>
<td><?=$disdate?></td></tr>
<?php
$num=$num+1;
}
}
$msgs = @mysql_query("SELECT COUNT(*) FROM `messages` WHERE from_id=$userid");
list($stevilo) = @mysql_fetch_row($msgs);
?>
</table>
</td>
</tr>
</table>
<?php if ($num >24 AND $action <>'more') {echo "<table width=\"100%\"><td align=\"left\"><a href=\"smessages.php?action=more\">",$langmark231,"</a></td></table>";}?>
<?php if ($action == 'more') {echo "<table width=\"100%\"><td align=\"left\"><a href=\"smessages.php\">",$langmark230,"</a></td></table>";}?>
</td><td class="border" width="32%">
<h2><?=$langmark343;?></h2><br/>
<a href="messages.php"><?=$langmark344?></a><br/>
<?=$langmark345," (",$stevilo,")"?>
<br/><br/>
<a href="messages.php?action=compose"><?=$langmark361?></a>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>