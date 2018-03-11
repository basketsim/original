<?php
function prepcom($vsebina)
{
$vsebina = addslashes($vsebina);
$vsebina = nl2br($vsebina);
$vsebina=str_replace("<br />","[br]",$vsebina);
return $vsebina;
}

$dbyear = date("Y"); $dbmonth = date("m"); $dbday = date("d");
$dbhour = date("H"); $dbmin = date("i"); $dbsec = date("s");
$now = date("Y-m-d H:i:s", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));

$leagueid=$_GET['leagueid'];
if (!is_numeric($leagueid)) {die(include 'index.php');}

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT username, club, supporter, lang, level FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)==1) {
$username = mysql_result ($compare,0,"username");
$trueclub = mysql_result ($compare,0,"club");
$is_supporter = mysql_result ($compare,0,"supporter");
$lang = mysql_result ($compare,0,"lang");
$modi = mysql_result ($compare,0,"level");
}
else {die(include 'basketsim.php');}

//liga
$liga = mysql_query("SELECT * FROM leagues WHERE leagueid ='$leagueid' LIMIT 1");
if (mysql_num_rows($liga)<>1) {die(include 'index.php');}
while($r=mysql_fetch_array($liga)) {
$leaguelink=$r["leagueid"];
$name=$r["name"];
$country=$r["country"];
$level=$r["level"];
}

$rt=$_GET['rt'];
if (!$rt) {$rt=0;}
$action = $_GET["action"];
$kvota=0;
$post = $_GET["post"];
if (!$post) {$post=0;}
SWITCH (TRUE) {
CASE ($action=='managers' && $post==0):
if ($rt>0) {$when='0000-00-00 00:00:00';} else {$datumi = mysql_query("SELECT `read_time` FROM lb_user_read WHERE type=1 AND user='$userid' AND leagueid='$leagueid'") or die(mysql_error());}
if (!$when && mysql_num_rows($datumi)>0) {$when = mysql_result($datumi,0);} else {$when='0000-00-00 00:00:00';}
$query=mysql_query("SELECT * FROM lb_comments WHERE type=1 AND league = $leagueid AND time > '$when' AND id >= $rt ORDER BY id ASC") or die(mysql_error()); $start=1; $kvota='Managers'; $tip=1;
$preveri = mysql_query("SELECT * FROM lb_user_read WHERE user = '$userid' AND type=1 AND leagueid = '$leagueid'") or die(mysql_error());
if (mysql_num_rows($preveri) > 0) {mysql_query("UPDATE lb_user_read SET read_time = '$now' WHERE user = '$userid' AND type=1 AND leagueid = '$leagueid'") or die(mysql_error());}
else {mysql_query("INSERT INTO lb_user_read VALUES ('$userid', 1, '$leagueid', '$now');") or die(mysql_error());} break;

CASE ($action=='matches' && $post==0):
if ($rt>0) {$when='0000-00-00 00:00:00';} else {$datumi = mysql_query("SELECT `read_time` FROM lb_user_read WHERE type=2 AND user='$userid' AND leagueid='$leagueid'") or die(mysql_error());}
if (!$when && mysql_num_rows($datumi)>0) {$when = mysql_result($datumi,0);} else {$when='0000-00-00 00:00:00';}
$query=mysql_query("SELECT * FROM lb_comments WHERE type=2 AND league = $leagueid AND time > '$when' AND id >= $rt ORDER BY id ASC") or die(mysql_error()); $start=1; $kvota='Matches'; $tip=2;
$preveri = mysql_query("SELECT * FROM lb_user_read WHERE user = '$userid' AND type =2 AND leagueid = '$leagueid'") or die(mysql_error());
if (mysql_num_rows($preveri) > 0) {mysql_query("UPDATE lb_user_read SET read_time = '$now' WHERE user = '$userid' AND type=2 AND leagueid = '$leagueid'") or die(mysql_error());}
else {mysql_query("INSERT INTO lb_user_read VALUES ('$userid', 2, '$leagueid', '$now');") or die(mysql_error());} break;

CASE ($action=='predictions' && $post==0):
if ($rt>0) {$when='0000-00-00 00:00:00';} else {$datumi = mysql_query("SELECT `read_time` FROM lb_user_read WHERE type=3 AND user='$userid' AND leagueid='$leagueid'") or die(mysql_error());}
if (!$when && mysql_num_rows($datumi)>0) {$when = mysql_result($datumi,0);} else {$when='0000-00-00 00:00:00';}
$query=mysql_query("SELECT * FROM lb_comments WHERE type=3 AND league = $leagueid AND time > '$when' AND id >= $rt ORDER BY id ASC") or die(mysql_error()); $start=1; $kvota='Predictions'; $tip=3;
$preveri = mysql_query("SELECT * FROM lb_user_read WHERE user = '$userid' AND type =3 AND leagueid = '$leagueid'") or die(mysql_error());
if (mysql_num_rows($preveri) > 0) {mysql_query("UPDATE lb_user_read SET read_time = '$now' WHERE user = '$userid' AND type=3 AND leagueid = '$leagueid'") or die(mysql_error());}
else {mysql_query("INSERT INTO lb_user_read VALUES ('$userid', 3, '$leagueid', '$now');") or die(mysql_error());} break;

CASE ($action=='reports' && $post==0):
if ($rt>0) {$when='0000-00-00 00:00:00';} else {$datumi = mysql_query("SELECT `read_time` FROM lb_user_read WHERE type=4 AND user='$userid' AND leagueid='$leagueid'") or die(mysql_error());}
if (!$when && mysql_num_rows($datumi)>0) {$when = mysql_result($datumi,0);} else {$when='0000-00-00 00:00:00';}
$query=mysql_query("SELECT * FROM lb_comments WHERE type=4 AND league = $leagueid AND time > '$when' AND id >= $rt ORDER BY id ASC") or die(mysql_error()); $start=1; $kvota='Reports'; $tip=4;
$preveri = mysql_query("SELECT * FROM lb_user_read WHERE user = '$userid' AND type =4 AND leagueid = '$leagueid'") or die(mysql_error());
if (mysql_num_rows($preveri) > 0) {mysql_query("UPDATE lb_user_read SET read_time = '$now' WHERE user = '$userid' AND type=4 AND leagueid = '$leagueid'") or die(mysql_error());}
else {mysql_query("INSERT INTO lb_user_read VALUES ('$userid', 4, '$leagueid', '$now');") or die(mysql_error());} break;

CASE ($action=='players' && $post==0):
if ($rt>0) {$when='0000-00-00 00:00:00';} else {$datumi = mysql_query("SELECT `read_time` FROM lb_user_read WHERE type=5 AND user='$userid' AND leagueid='$leagueid'") or die(mysql_error());}
if (!$when && mysql_num_rows($datumi)>0) {$when = mysql_result($datumi,0);} else {$when='0000-00-00 00:00:00';}
$query=mysql_query("SELECT * FROM lb_comments WHERE type=5 AND league = $leagueid AND time > '$when' AND id >= $rt ORDER BY id ASC") or die(mysql_error()); $start=1; $kvota='Players'; $tip=5;
$preveri = mysql_query("SELECT * FROM lb_user_read WHERE user = '$userid' AND type =5 AND leagueid = '$leagueid'") or die(mysql_error());
if (mysql_num_rows($preveri) > 0) {mysql_query("UPDATE lb_user_read SET read_time = '$now' WHERE user = '$userid' AND type=5 AND leagueid = '$leagueid'") or die(mysql_error());}
else {mysql_query("INSERT INTO lb_user_read VALUES ('$userid', 5, '$leagueid', '$now');") or die(mysql_error());} break;

CASE ($action=='transfers' && $post==0):
if ($rt>0) {$when='0000-00-00 00:00:00';} else {$datumi = mysql_query("SELECT `read_time` FROM lb_user_read WHERE type=6 AND user='$userid' AND leagueid='$leagueid'") or die(mysql_error());}
if (!$when && mysql_num_rows($datumi)>0) {$when = mysql_result($datumi,0);} else {$when='0000-00-00 00:00:00';}
$query=mysql_query("SELECT * FROM lb_comments WHERE type=6 AND league = $leagueid AND time > '$when' AND id >= $rt ORDER BY id ASC") or die(mysql_error()); $start=1; $kvota='Transfers'; $tip=6;
$preveri = mysql_query("SELECT * FROM lb_user_read WHERE user = '$userid' AND type =6 AND leagueid = '$leagueid'") or die(mysql_error());
if (mysql_num_rows($preveri) > 0) {mysql_query("UPDATE lb_user_read SET read_time = '$now' WHERE user = '$userid' AND type=6 AND leagueid = '$leagueid'") or die(mysql_error());}
else {mysql_query("INSERT INTO lb_user_read VALUES ('$userid', 6, '$leagueid', '$now');") or die(mysql_error());} break;

CASE ($action=='chitchat' && $post==0):
if ($rt>0) {$when='0000-00-00 00:00:00';} else {$datumi = mysql_query("SELECT `read_time` FROM lb_user_read WHERE type=7 AND user='$userid' AND leagueid='$leagueid'") or die(mysql_error());}
if (!$when && mysql_num_rows($datumi)>0) {$when = mysql_result($datumi,0);} else {$when='0000-00-00 00:00:00';}
$query=mysql_query("SELECT * FROM lb_comments WHERE type=7 AND league = $leagueid AND time > '$when' AND id >= $rt ORDER BY id ASC") or die(mysql_error()); $start=1; $kvota='Chit-chat'; $tip=7;
$preveri = mysql_query("SELECT * FROM lb_user_read WHERE user = '$userid' AND type =7 AND leagueid = '$leagueid'") or die(mysql_error());
if (mysql_num_rows($preveri) > 0) {mysql_query("UPDATE lb_user_read SET read_time = '$now' WHERE user = '$userid' AND type=7 AND leagueid = '$leagueid'") or die(mysql_error());}
else {mysql_query("INSERT INTO lb_user_read VALUES ('$userid', 7, '$leagueid', '$now');") or die(mysql_error());} break;

CASE ($action=='managers' && $post<>0):
$query=mysql_query("SELECT * FROM lb_comments WHERE type=1 AND league = $leagueid AND id=$post") or die(mysql_error()); $start=1; $kvota='Managers'; $tip=1; break;
CASE ($action=='matches' && $post<>0):
$query=mysql_query("SELECT * FROM lb_comments WHERE type=2 AND league = $leagueid AND id=$post") or die(mysql_error()); $start=1; $kvota='Matches'; $tip=2; break;
CASE ($action=='predictions' && $post<>0):
$query=mysql_query("SELECT * FROM lb_comments WHERE type=3 AND league = $leagueid AND id=$post") or die(mysql_error()); $start=1; $kvota='Predictions'; $tip=3; break;
CASE ($action=='reports' && $post<>0):
$query=mysql_query("SELECT * FROM lb_comments WHERE type=4 AND league = $leagueid AND id=$post") or die(mysql_error()); $start=1; $kvota='Reports'; $tip=4; break;
CASE ($action=='players' && $post<>0):
$query=mysql_query("SELECT * FROM lb_comments WHERE type=5 AND league = $leagueid AND id=$post") or die(mysql_error()); $start=1; $kvota='Players'; $tip=5; break;
CASE ($action=='transfers' && $post<>0):
$query=mysql_query("SELECT * FROM lb_comments WHERE type=6 AND league = $leagueid AND id=$post") or die(mysql_error()); $start=1; $kvota='Transfers'; $tip=6; break;
CASE ($action=='chitchat' && $post<>0):
$query=mysql_query("SELECT * FROM lb_comments WHERE type=7 AND league = $leagueid AND id=$post") or die(mysql_error()); $start=1; $kvota='Chit-chat'; $tip=7; break;
}
if (!$kvota) {$kvota='General';}

//VPIS V BAZO
if (isset($_POST['submit'])) {
$szComment = $_POST['szComment'];
if(!strlen(trim($szComment))) {header("Location: leagueboard.php?leagueid=$leagueid&action=$action&error=1"); die();}
$szComment = addslashes($szComment);
$vsebina = htmlspecialchars(stripslashes($szComment));
mysql_query("INSERT INTO `lb_comments` (`author`,`username`,`supporter`,`type`,`league`,`time`,`content`,`replyto`) VALUES ('$userid', '$username', '$is_supporter', '$tip', '$leagueid', '$now', '$vsebina', '$post');") or die(mysql_error());
$newid = mysql_insert_id();
if ($post > 0) {$newid=$post;}
header ("Location: leagueboard.php?leagueid=$leagueid&action=$action&rt=$newid");
}

$clear = $_GET["clear"];
if (is_numeric($clear)) {
$izbriss = mysql_query("SELECT author FROM lb_comments WHERE id=$clear") or die(mysql_error());
if (mysql_num_rows($izbriss) > 0) {$kater = mysql_result($izbriss,0);}
if ($kater==$userid || $modi > 1) {mysql_query("DELETE FROM lb_comments WHERE id=$clear LIMIT 1") or die(mysql_error());}
header ("Location: leagueboard.php?leagueid=$leagueid&action=$action&rt=1");
}

function doreplaceall($string, $pattern, $replacer)
{
$patterncopy = str_replace("/", "", $pattern);
while(preg_match($pattern, $string, $arraydummy))
{
$string = preg_replace($pattern, $replacer, $string);
$string = preg_replace($patterncopy, $replacer, $string);
}
return $string;
}

function ubbcode($posting)
{
$posting = doreplaceall($posting, "#(\[teamid=([^\[]+)\])#si", "<a href=\"http://www.basketsim.com/redirect.php?teamid=\\2\" class=\"lnk\" target=\"_top\">(\\2)</a>");
$posting = doreplaceall($posting, "#(\[matchid=([^\[]+)\])#si", "<a href=\"http://www.basketsim.com/prikaz.php?matchid=\\2\" class=\"lnk\" target=\"_top\">(\\2)</a>");
$posting = doreplaceall($posting, "#(\[playerid=([^\[]+)\])#si", "<a href=\"http://www.basketsim.com/player.php?playerid=\\2\" class=\"lnk\" target=\"_top\">(\\2)</a>");
$posting = doreplaceall($posting, "#(\[link=([^\[]+)\])#si", "<a href=\"\\2\" target=\"_blank\" class=\"lnk\">(\\2)</a>");
$posting = doreplaceall($posting, "#((\[messageid=)([0-9]{0,})\.([0-9]{0,})\])#si", "<a href=\"http://basketsim.com/mainconf.php?szAction=viewtopic&nTopicId=\\3&nCommentId=\\4&nAsReply=1\" class=\"lnk\">(\\3.\\4)</a>");
$posting = doreplaceall($posting, "#\[b\](.*?)\[/b\]#is", '<strong>\1</strong>');
$posting = doreplaceall($posting, "#\[u\](.*?)\[/u\]#is", '<u>\1</u>');
$posting = doreplaceall($posting, "#\[i\](.*?)\[/i\]#is", '<em>\1</em>');
$posting = doreplaceall($posting, "#\[q\](.*?)\[/q\]#isU", '<em>\1</em><hr/><br/>');
$posting = doreplaceall($posting, "#\[/q\]#isU", '<hr/><br/>');
$posting = doreplaceall($posting, "#(\[br\])#is", "<br/>");
return $posting;
}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2>LEAGUEBOARDS</h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="26%">

<h2><a href="leagues.php?leagueid=<?=$leaguelink?>"><font color="white"><?=$name?>, <?=$country?></font></a></h2>

<br/><a href="leagueboard.php?leagueid=<?=$leagueid?>">Home</a><br/><br/>
<?php
if ($action<>'number') {
$query1=mysql_query("SELECT * FROM lb_comments WHERE type=1 AND league = $leagueid") or die(mysql_error());
$query2=mysql_query("SELECT * FROM lb_comments WHERE type=2 AND league = $leagueid") or die(mysql_error());
$query3=mysql_query("SELECT * FROM lb_comments WHERE type=3 AND league = $leagueid") or die(mysql_error());
$query4=mysql_query("SELECT * FROM lb_comments WHERE type=4 AND league = $leagueid") or die(mysql_error());
$query5=mysql_query("SELECT * FROM lb_comments WHERE type=5 AND league = $leagueid") or die(mysql_error());
$query6=mysql_query("SELECT * FROM lb_comments WHERE type=6 AND league = $leagueid") or die(mysql_error());
$query7=mysql_query("SELECT * FROM lb_comments WHERE type=7 AND league = $leagueid") or die(mysql_error());
$q1 = mysql_num_rows($query1);
$q2 = mysql_num_rows($query2);
$q3 = mysql_num_rows($query3);
$q4 = mysql_num_rows($query4);
$q5 = mysql_num_rows($query5);
$q6 = mysql_num_rows($query6);
$q7 = mysql_num_rows($query7);
$datum1 = mysql_query("SELECT `read_time` FROM lb_user_read WHERE type=1 AND user='$userid' AND leagueid='$leagueid'") or die(mysql_error());
$datum2 = mysql_query("SELECT `read_time` FROM lb_user_read WHERE type=2 AND user='$userid' AND leagueid='$leagueid'") or die(mysql_error());
$datum3 = mysql_query("SELECT `read_time` FROM lb_user_read WHERE type=3 AND user='$userid' AND leagueid='$leagueid'") or die(mysql_error());
$datum4 = mysql_query("SELECT `read_time` FROM lb_user_read WHERE type=4 AND user='$userid' AND leagueid='$leagueid'") or die(mysql_error());
$datum5 = mysql_query("SELECT `read_time` FROM lb_user_read WHERE type=5 AND user='$userid' AND leagueid='$leagueid'") or die(mysql_error());
$datum6 = mysql_query("SELECT `read_time` FROM lb_user_read WHERE type=6 AND user='$userid' AND leagueid='$leagueid'") or die(mysql_error());
$datum7 = mysql_query("SELECT `read_time` FROM lb_user_read WHERE type=7 AND user='$userid' AND leagueid='$leagueid'") or die(mysql_error());

if (mysql_num_rows($datum1)>0) {$d1 = mysql_result($datum1,0);$preveri1 = mysql_query("SELECT * FROM lb_comments WHERE type=1 AND league = $leagueid AND time > '$d1'") or die(mysql_error()); $pr1 = mysql_num_rows($preveri1);} else {$pr1=$q1;}
if (mysql_num_rows($datum2)>0) {$d2 = mysql_result($datum2,0);$preveri2 = mysql_query("SELECT * FROM lb_comments WHERE type=2 AND league = $leagueid AND time > '$d2'") or die(mysql_error()); $pr2 = mysql_num_rows($preveri2);} else {$pr2=$q2;}
if (mysql_num_rows($datum3)>0) {$d3 = mysql_result($datum3,0);$preveri3 = mysql_query("SELECT * FROM lb_comments WHERE type=3 AND league = $leagueid AND time > '$d3'") or die(mysql_error()); $pr3 = mysql_num_rows($preveri3);} else {$pr3=$q3;}
if (mysql_num_rows($datum4)>0) {$d4 = mysql_result($datum4,0);$preveri4 = mysql_query("SELECT * FROM lb_comments WHERE type=4 AND league = $leagueid AND time > '$d4'") or die(mysql_error()); $pr4 = mysql_num_rows($preveri4);} else {$pr4=$q4;}
if (mysql_num_rows($datum5)>0) {$d5 = mysql_result($datum5,0);$preveri5 = mysql_query("SELECT * FROM lb_comments WHERE type=5 AND league = $leagueid AND time > '$d5'") or die(mysql_error()); $pr5 = mysql_num_rows($preveri5);} else {$pr5=$q5;}
if (mysql_num_rows($datum6)>0) {$d6 = mysql_result($datum6,0);$preveri6 = mysql_query("SELECT * FROM lb_comments WHERE type=6 AND league = $leagueid AND time > '$d6'") or die(mysql_error()); $pr6 = mysql_num_rows($preveri6);} else {$pr6=$q6;}
if (mysql_num_rows($datum7)>0) {$d7 = mysql_result($datum7,0);$preveri7 = mysql_query("SELECT * FROM lb_comments WHERE type=7 AND league = $leagueid AND time > '$d7'") or die(mysql_error()); $pr7 = mysql_num_rows($preveri7);} else {$pr7=$q7;}
?>
<?php if ($action=='managers') {?>Managers (<?=$q1?><?php if($pr1>0){echo "+",$pr1;}?>)<?php } else {?><a href="leagueboard.php?leagueid=<?=$leagueid?>&action=managers">Managers</a> (<?=$q1?><?php if($pr1>0){echo "+",$pr1;}?>)<?php }?><br/>
<?php if ($action=='matches') {?>Matches (<?=$q2?><?php if($pr2>0){echo "+",$pr2;}?>)<?php } else {?><a href="leagueboard.php?leagueid=<?=$leagueid?>&action=matches">Matches</a> (<?=$q2?><?php if($pr2>0){echo "+",$pr2;}?>)<?php }?><br/>
<?php if ($action=='predictions') {?>Predictions (<?=$q3?><?php if($pr3>0){echo "+",$pr3;}?>)<?php } else {?><a href="leagueboard.php?leagueid=<?=$leagueid?>&action=predictions">Predictions</a> (<?=$q3?><?php if($pr3>0){echo "+",$pr3;}?>)<?php }?><br/>
<?php if ($action=='reports') {?>Reports (<?=$q4?><?php if($pr4>0){echo "+",$pr4;}?>)<?php } else {?><a href="leagueboard.php?leagueid=<?=$leagueid?>&action=reports">Reports</a> (<?=$q4?><?php if($pr4>0){echo "+",$pr4;}?>)<?php }?><br/>
<?php if ($action=='players') {?>Players (<?=$q5?><?php if($pr5>0){echo "+",$pr5;}?>)<?php } else {?><a href="leagueboard.php?leagueid=<?=$leagueid?>&action=players">Players</a> (<?=$q5?><?php if($pr5>0){echo "+",$pr5;}?>)<?php }?><br/>
<?php if ($action=='transfers') {?>Transfers (<?=$q6?><?php if($pr6>0){echo "+",$pr6;}?>)<?php } else {?><a href="leagueboard.php?leagueid=<?=$leagueid?>&action=transfers">Transfers</a> (<?=$q6?><?php if($pr6>0){echo "+",$pr6;}?>)<?php }?><br/>
<?php if ($action=='chitchat') {?>Chit-chat (<?=$q7?><?php if($pr7>0){echo "+",$pr7;}?>)<?php } else {?><a href="leagueboard.php?leagueid=<?=$leagueid?>&action=chitchat">Chit-chat</a> (<?=$q7?><?php if($pr7>0){echo "+",$pr7;}?>)<?php }?><br/>

<br/><a href="leagueboard.php?leagueid=<?=$leagueid?>&action=number">Number of posts</a>

<?php
}
elseif ($action=='number') {
$posters = mysql_query("SELECT DISTINCT author, username FROM lb_comments WHERE author <>0 AND league=$leagueid");
while ($pp = mysql_fetch_array($posters)) {
$authorr = $pp['author'];
$usernamee = $pp['username'];
$noposts = mysql_query("SELECT id FROM lb_comments WHERE league='$leagueid' AND author='$authorr'");
$stpost= mysql_num_rows($noposts);
$array[]= $stpost . "/" . $usernamee . "/" . $authorr;
$sk=$sk+1;
}
$sk=$sk-1;
if ($sk>-1) {
usort($array, "strnatcmp");
while ($sk > -1) {
$clovek = explode("/", $array[$sk]);
if ($clovek[2] > 0) {echo "<a href=\"club.php?clubid=",$clovek[2],"\">$clovek[1]</a> - ",$clovek[0],"<br/>";} else {echo $clovek[1]," - ",$clovek[0],"<br/>";}
$sk=$sk-1;
}
}
if (!$authorr) {echo "<i>No one has posted on this leagueboard yet.</i>";}
}?>

</td><td class="border" width="74%">

<h2><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td>Leagueboard >> <?=$kvota?></td>
<?php if ($action){?><td align="right"><font color="white">(</font><a href="leagueboard.php?leagueid=<?=$leagueid?>&action=<?=$action?>&rt=1"><font color="white">view all</font></a><font color="white">)</font>&nbsp</td><?php }?>
</tr></table></h2>

<?php
if ($start<>1) {
?>
<br/><b>Welcome to leagueboard</b><br/><br/>You can check messages in each topic on the left. Unread messages are displayed in brackets. Feel free to post on leagueboards, just keep in mind that some <a href="leagueboard.php?leagueid=<?=$leagueid?>&action=rules">rules</a> apply to posting comments.
<?php
}
if ($action=='rules') {
?>
<br/><br/>1. Use appropriate language (league's national language or english).
<br/>2. Avoid using CAPS LOCKS as it can upset other users.
<br/>3. No offensive behaviour towards the other users.
<br/>4. No linking to pornographic or illegal content.
<br/>5. Avoid discussing politics or religion.
<br/>6. Do not spam.
<?php
}
if ($start<>1) {
?>
<br/><br/>Have fun!

<?php
}
if ($start==1) {

$k=0;
while ($k < mysql_num_rows($query)) {

$id = mysql_result($query,$k,"id");
$author = mysql_result($query,$k,"author");
$usernam = mysql_result($query,$k,"username");
$supporter = mysql_result($query,$k,"supporter");
$time = mysql_result($query,$k,"time");
$content = mysql_result($query,$k,"content");
$edit_time = mysql_result($query,$k,"edit_time");
$edit_userid = mysql_result($query,$k,"edit_userid");
$edit_username = mysql_result($query,$k,"edit_username");
$delete_time = mysql_result($query,$k,"delete_time");
$delete_userid = mysql_result($query,$k,"delete_userid");
$delete_username = mysql_result($query,$k,"delete_username");
$replyto = mysql_result($query,$k,"replyto");
if ($author==$userid) {$coli='lightblue';} else {$coli='white';}
?>

<br/><table width="100%" cellpadding="2" cellspacing="0" border="0" style="border: 1px solid #0E2127">
<tr bgcolor="#b00000"><TD width="100%" height="15">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
<td width="60" height="12" valign="bottom"><font color="white" style="font-size: 12px;">From:</font></td>
<td width="*" valign="bottom"><?php if($author>0) {?><a href="club.php?clubid=<?=$author?>"><font color="white"><?=$usernam?></font></a><?php } else {?><font color="white"><?=$usernam?></font><?php }
if ($supporter==1) {echo "&nbsp;<a href=\"supporter.php\" title=\"Basketsim Supporter\"><img align=\"absbottom\" src=\"img/fairplaysup.gif\" border=\"0\" alt=\"Basketsim Supporter\" width=\"13\" height=\"15\"></a>";} else {echo "&nbsp;";}
?>
</td>
<?php if($replyto>0){?><td align="right"><font color="white">as reply to</font> <a href="leagueboard.php?leagueid=<?=$leagueid?>&action=<?=$action?>&rt=<?=$replyto?>"><font color="white"><?=$replyto?></font></a></font></td><?php }?>
</tr>
<tr>
<td width="60" height="12" valign="bottom"><font color="white" style="font-size: 12px;">Time:</font></td>
<td width="*" valign="bottom"><font color="white"><?=$time?></font></td>
</tr>
</table>
</td></tr>
<tr><td height="10" bgcolor="<?=$coli?>"></td></tr>
<tr><td bgcolor="<?=$coli?>"><?php
$user_comment = strip_tags($content);
print nl2br(ubbcode(strip_tags($user_comment)));
?></td></tr>
<tr><td height="10" bgcolor="<?=$coli?>"></td></tr>
<tr><td align="center" bgcolor="<?=$coli?>"><a href="leagueboard.php?leagueid=<?=$leagueid?>&action=<?=$action?>&post=<?=$id?>">Reply with comment</a>

<?php if($author==$userid || $modi>1){echo "&nbsp;<a href=\"leagueboard.php?leagueid=",$leagueid,"&action=",$action,"&clear=",$id,"\">Delete comment</a>";}?>

</td></tr>
</table>

<?php
$k++;
}
if ($when=='0000-00-00 00:00:00' && $k==0) {echo "<br/><i>No comments were posted in this section yet. Use form below to post message!</i><br/>";}
if ($when=='0000-00-00 00:00:00' && $k<>0) {?>

<br/>Add new comment to the topic:

<br/><table><tr><td width="100%" bgcolor="#FFFFFF" style="padding-left:0px;" valign="middle" height="18"><a href="javascript:insertValueAtCursor('[q]<?=prepcom($content)?>[/q]');" title="quote"><img src="img/quote.jpg" border="0" align="absmiddle" alt="quote"></a>&nbsp;<a href="javascript:insertAtCursor(0);" title="bold"><img src="img/bold.jpg" border="0" align="absmiddle" alt="bold" title="bold"></a>&nbsp;<a href="javascript:insertAtCursor(1);" title="italic"><img src="img/italic.jpg" border="0" align="absmiddle" alt="italic"></a>&nbsp;<a href="javascript:insertAtCursor(2);" title="underline"><img src="img/underline.jpg" border="0" align="absmiddle" alt="underline" title="underline"></a>&nbsp;<a href="javascript:insertValueAtCursor('[playerid=XXX]');" class="lnk">[playerid]</a>&nbsp;<a href="javascript:insertValueAtCursor('[matchid=XXX]');" class="lnk">[matchid]</a>&nbsp;<a href="javascript:insertValueAtCursor('[teamid=XXX]');" class="lnk">[teamid]</a>&nbsp;<a href="javascript:insertValueAtCursor('[link=XXX]');" class="lnk">[link]</a></td></tr></table>
<form name="frmReplyTo" method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="margin: 0">
<textarea id="szComment" name="szComment" rows="9" cols="64"></textarea>
<br/><input type="submit" value="Post comment" name="submit">
</form>

<?php
}
if ($k==0 && $when<>'0000-00-00 00:00:00') {echo "<br/><i>You have no unread messages in this section.<br/><br/><a href=\"leagueboard.php?leagueid=",$leagueid,"&action=",$action,"&rt=1\">Check all messages in this section</a> or<br/>use the form below to add a new comment.</i><br/>";}

$error = $_GET["error"];
if ($error==1) {echo "<br/><font color=\"darkred\">You cannot submit an empty comment!</font>";}
?>

<script language="JavaScript">
	var arrayStatus = new Array(0,0,0,0);
	var arraySymbol = new Array(0,0,0,0);
	arrayStatus[0] = arrayStatus[1] = arrayStatus[2] = arrayStatus[3] = false;
	arraySymbol[0] = 'b';
	arraySymbol[1] = 'i';
	arraySymbol[2] = 'u';
	arraySymbol[3] = 'q';

	function insertAtCursor(nIndex)
	{
		var myField, myValue;
		myValue	= "[/"+arraySymbol[nIndex]+"]";
		if(arrayStatus[nIndex] == false)
		{
			myValue	= "["+arraySymbol[nIndex]+"]";
			arrayStatus[nIndex] = true;
		}
		else {arrayStatus[nIndex] = false;}
		
		insertValueAtCursor(myValue);
	}
	
	function insertValueAtCursor(myValue)
	{
		var myField;
		myField= document.getElementById('szComment');
		document.getElementById('szComment').focus();
		if(document.selection)
		{
			var objRange;
			objRange = document.selection.createRange();
			objRange.text = myValue;
		}
		else if (myField.selectionStart || myField.selectionStart == '0')
		{
			var startPos = myField.selectionStart;
			var endPos   = myField.selectionEnd;
		myField.value = myField.value.substring(0, startPos) + myValue + myField.value.substring(endPos, myField.value.length);
		}
		else {myField.value += myValue;}
	}
</script>

<?php
if ($k==0 or $post>0) {
?>

<br/><table><tr><td width="100%" bgcolor="#FFFFFF" style="padding-left:0px;" valign="middle" height="18"><a href="javascript:insertValueAtCursor('[q]<?=prepcom($content)?>[/q]');" title="quote"><img src="img/quote.jpg" border="0" align="absmiddle" alt="quote"></a>&nbsp;<a href="javascript:insertAtCursor(0);" title="bold"><img src="img/bold.jpg" border="0" align="absmiddle" alt="bold" title="bold"></a>&nbsp;<a href="javascript:insertAtCursor(1);" title="italic"><img src="img/italic.jpg" border="0" align="absmiddle" alt="italic"></a>&nbsp;<a href="javascript:insertAtCursor(2);" title="underline"><img src="img/underline.jpg" border="0" align="absmiddle" alt="underline" title="underline"></a>&nbsp;<a href="javascript:insertValueAtCursor('[playerid=XXX]');" class="lnk">[playerid]</a>&nbsp;<a href="javascript:insertValueAtCursor('[matchid=XXX]');" class="lnk">[matchid]</a>&nbsp;<a href="javascript:insertValueAtCursor('[teamid=XXX]');" class="lnk">[teamid]</a>&nbsp;<a href="javascript:insertValueAtCursor('[link=XXX]');" class="lnk">[link]</a></td></tr></table>
<form name="frmReplyTo" method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="margin: 0">
<textarea id="szComment" name="szComment" rows="9" cols="64"></textarea>
<br/><input type="submit" value="Post comment" name="submit">
</form>

<?php
}
}
?>
</td>
</tr>
</table>
<img src="img/bbs.jpg" alt="" border="0">
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>