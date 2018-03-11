<?php
if (empty($_COOKIE['userid'])){die(include './basketsim.php');}
$userid=$_COOKIE['userid'];
$kodazavstop=$_COOKIE['geslo'];
?>
<script language="JavaScript">
if(!parent.frames['menuFrame']){top.location.href = './index.php';}
</script>
<?php
$server = "localhost";
$dbuser = "root";
$dbpass = "qweqwe";
$dbname = "basketsim";
mysql_connect($server,$dbuser,$dbpass) or die ("Unable to handle the request. Please refresh the page to try again.");
mysql_select_db($dbname);

	$resQuery = mysql_query("SELECT `userid`, `password`,  `level`, `langadm`, `lang`, `natcoach` FROM `users` WHERE `password` ='$kodazavstop' AND `userid` ='$userid' LIMIT 1") or die(mysql_error());
	if(mysql_num_rows($resQuery)){
		$row = mysql_fetch_array($resQuery);
		$current_user = $row['userid'];
                $current_password = $row['password'];
		$current_right = $row['level'];
		$langad = $row['langadm'];
		$kljuca	= $row['lang'];
		$natac = $row['natcoach'];
	}
else {die(include 'basketsim.php');}
$krup = mt_rand(1,3);
if ($krup==2) {mysql_query("UPDATE users SET is_online=1, last_active=NOW() WHERE userid='$userid' LIMIT 1") or die(mysql_error());}

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

function prepcom($vsebina)
{
$vsebina = addslashes($vsebina);
$vsebina = nl2br($vsebina);
$vsebina=str_replace("<br />","[br]",$vsebina);
return $vsebina;
}

function ubbcode($posting)
{
$posting = doreplaceall($posting, "#(\[teamid=([^\[]+)\])#is", "<a href=\"http://www.basketsim.com/redirect.php?teamid=\\2\" class=\"lnk\" target=\"_top\">(\\2)</a>");
$posting = doreplaceall($posting, "#(\[matchid=([^\[]+)\])#is", "<a href=\"http://www.basketsim.com/prikaz.php?matchid=\\2\" class=\"lnk\" target=\"_top\">(\\2)</a>");
$posting = doreplaceall($posting, "#(\[playerid=([^\[]+)\])#is", "<a href=\"http://www.basketsim.com/player.php?playerid=\\2\" class=\"lnk\" target=\"_top\">(\\2)</a>");
$posting = doreplaceall($posting, "#(\[link=([^\[]+)\])#is", "<a href=\"\\2\" target=\"_blank\" class=\"lnk\">(\\2)</a>");
$posting = doreplaceall($posting, "#((\[messageid=)([0-9]{0,})\.([0-9]{0,})\])#is", "<a href=\"http://basketsim.com/mainconf.php?szAction=viewtopic&nTopicId=\\3&nCommentId=\\4&nAsReply=1\" class=\"lnk\">(\\3.\\4)</a>");
$posting = doreplaceall($posting, "#\[b\](.*?)\[/b\]#is", '<strong>\1</strong>');
$posting = doreplaceall($posting, "#\[u\](.*?)\[/u\]#is", '<u>\1</u>');
$posting = doreplaceall($posting, "#\[i\](.*?)\[/i\]#is", '<em>\1</em>');
$posting = doreplaceall($posting, "#\[q\](.*?)\[/q\]#isU", '<em>\1</em><hr/><br/>');
$posting = doreplaceall($posting, "#\[/q\]#isU", '<hr/><br/>');
$posting = doreplaceall($posting, "#(\[br\])#is", "<br/>");
return $posting;
}

define("BGCOLOR", '#990000');
define("CONFERENCE_COLOR", '#bce2cd');

require("inc/lang/".$kljuca.".php");
?>