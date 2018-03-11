<?php

if (empty($_COOKIE['userid'])){die(include './basketsim.php');}
$userid=$_COOKIE['userid'];
$kodazavstop=$_COOKIE['geslo'];
?>
	<script language="JavaScript">
		if(!parent.frames['menuFrame']){
			top.location.href = './index.php';
		}
	</script>
	<?php
// if ($_SERVER['SERVER_NAME']!="basketsim.com" AND $_SERVER['SERVER_NAME']!="www.basketsim.com"){
//   die("<h1>Wrong server</h1>");
// }

$server = "localhost";
$dbuser = "root";
$dbpass = "qweqwe";
$dbname = "basketsim";

mysql_connect($server,$dbuser,$dbpass) or die (mysql_error());
mysql_select_db($dbname);

        $szQuery	= "SELECT userid, password, level FROM users WHERE userid = $userid";
	$resQuery	= mysql_query($szQuery) or die("Error reading user's informations ! ".mysql_error());
	if( mysql_num_rows($resQuery)){ // the session_id exists
		$row			= mysql_fetch_array($resQuery);
		$current_user		= $row['userid'];
                $current_password	= $row['password'];
		$current_right  	= $row['level'];

		$curr_time_sek	= time();
		$q2	= "UPDATE users SET s_time = '$curr_time_sek' WHERE userid = '$current_user'";
		$r2	= mysql_query($q2) or die("Error updating user ! ".mysql_error());
	}

if ($current_password != $kodazavstop) {die(include 'basketsim.php');}

$temp_u = $_COOKIE['userid'];
$onlinestat = mysql_query("UPDATE users SET is_online=1, last_active=NOW() WHERE userid=$temp_u");

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
$posting = doreplaceall($posting, "#\[b\](.*?)\[/b\]#si", '<strong>\1</strong>');
$posting = doreplaceall($posting, "#\[u\](.*?)\[/u\]#si", '<u>\1</u>');
$posting = doreplaceall($posting, "#\[i\](.*?)\[/i\]#si", '<em>\1</em>');
$posting = doreplaceall($posting, "#\[q\](.*?)\[/q\]#si", '<em>\1</em><hr><br/>');
return $posting;
}
/*
define("BGCOLOR", '#FF4500');
*/
define("CONFERENCE_COLOR", '#bce2cd');
include('english.php');
?>