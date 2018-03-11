<?php
$messageid = $_GET['messageid'];
$url = $_GET['url'];
if (!is_numeric($messageid)) {die(include 'messages.php');}

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)==1) {$lang = mysql_result($compare,0);} else {die(include 'basketsim.php');}

$result = mysql_query("SELECT * FROM `messages` WHERE `msgid` ='$messageid' LIMIT 1");
while($r=mysql_fetch_array($result))
{	
$to_id=$r["to_id"];
$from_id=$r["from_id"];
$time=$r["time"];
$title=$r["title"];
$message=$r["message"];
}

//preverjanje
if ($userid <> $from_id && $userid <> $to_id) {die(include 'index.php');}

//delete
$action=$_GET['action'];
if ($action =='delmsg') {
if ($to_id <> $userid) {die(include 'index.php');}
mysql_query("DELETE FROM messages WHERE msgid ='$messageid' LIMIT 1");
header("Location: messages.php?action=".$url."");
}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2><?=$langmark339?></h2>
<?php
$unquery = mysql_query("SELECT username FROM users WHERE userid ='$from_id' LIMIT 1");
if (mysql_num_rows($unquery) >0) {$fromname = mysql_result($unquery,0);} else {$adm=4;}
$unquery1 = mysql_query("SELECT username FROM users WHERE userid ='$to_id' LIMIT 1");
if (mysql_num_rows($unquery1) >0) {$komu = mysql_result($unquery1,0);}
//cas
$splitdatetime = explode(" ", $time); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$datedisplay = date("d.m.y H:i", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));
?>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="65%">

<b><?php echo $langmark340,":</b> ";
if ($adm==4 && $title<>'New player found') {echo "Administration";} elseif($adm==4 && $title=='New player found') {echo "Scouting service";} else {echo "<a href=\"club.php?clubid=",$from_id,"\">",$fromname,"</a>";}?>
<b><?=" ",$langmark348,":</b> <a href=\"club.php?clubid=",$to_id,"\">",$komu?></a><br/>
<b><?=$langmark349,":</b> ",$datedisplay?><br/>
<b><?=$langmark341,":</b> ",stripslashes($title)?><br/>
<br/><?=stripslashes($message)?><hr>
<br/><a href="messages.php"><?=$langmark352?></a>
<?php
//prebrano
if ($from_id==0 AND ($title=='Forum reply received' OR $title=='New player found' OR $title=='YT friendly challenge')) {mysql_query("DELETE FROM messages WHERE msgid ='$messageid' LIMIT 1");}
elseif ($userid==$to_id AND $read==0) {mysql_query("UPDATE `messages` SET `read` =1 WHERE `msgid` ='$messageid'");}
?>
</td>
<td class="border" width="35%">
<h2><?=$langmark351?></h2><br/>
<?php
if ($from_id==0 AND ($title=='Forum reply received' OR $title=='New player found' OR $title=='YT friendly challenge')) {$grabsh=44;}
elseif ($userid == $to_id and $adm<>4) {echo "<a href=\"repmsg.php?id=",$messageid,"\">",$langmark353,"</a><br/><br/><a href=\"message.php?messageid=",$messageid,"&action=delmsg\">",$langmark354,"</a>";}
elseif ($userid == $to_id and $adm==4) {echo "<a href=\"message.php?messageid=",$messageid,"&action=delmsg\">",$langmark354,"</a>";}
else {echo $langmark350;}
?>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>