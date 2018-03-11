<?php
$takoj = date("Y-m-d H:i:s");
require_once('inc/config.php');
include_once('inc/basic.php');
require('inc/lang/en.php');

function GetUserIP() {
    if (isset($_SERVER)) {
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
            return $_SERVER["HTTP_X_FORWARDED_FOR"];
        if (isset($_SERVER["HTTP_CLIENT_IP"]))
            return $_SERVER["HTTP_CLIENT_IP"];
        return $_SERVER["REMOTE_ADDR"];
    }
    if (getenv('HTTP_X_FORWARDED_FOR'))
        return getenv('HTTP_X_FORWARDED_FOR');
    if (getenv('HTTP_CLIENT_IP'))
        return getenv('HTTP_CLIENT_IP');
    return getenv('REMOTE_ADDR');
}
$user_ip = GetUserIP();
$temp = explode(".", $user_ip);
//if ($temp[0] == "82" && $temp[1] == "137") {die("<h2>REGISTRATION INFO</h2><table cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">This computer or network has been banned from Basketsim due to abuse. For potential unban, send us a mail to basketsim@basketsim.com, but make sure to include an explanation.<br/><br/>Basketsim administrator</td></tr></table>");}
if ($temp[0] == "82" && $temp[1] == "77" && $temp[2] == "74") {die("<h2>REGISTRATION INFO</h2><table cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">This computer or network has been banned from Basketsim due to abuse. For potential unban, send us a mail to basketsim@basketsim.com, but make sure to include an explanation.<br/><br/>Basketsim administrator</td></tr></table>");}
//if ($temp[0] == "207" && $temp[1] == "182" && $temp[2] == "131") {die("<h2>REGISTRATION INFO</h2><table cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">This computer or network has been banned from Basketsim due to abuse. For potential unban, send us a mail to basketsim@basketsim.com, but make sure to include an explanation.<br/><br/>Basketsim administrator</td></tr></table>");}
//if ($temp[0] == "75" && $temp[1] == "126" && $temp[2] == "219") {die("<h2>REGISTRATION INFO</h2><table cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">This computer or network has been banned from Basketsim due to abuse. For potential unban, send us a mail to basketsim@basketsim.com, but make sure to include an explanation.<br/><br/>Basketsim administrator</td></tr></table>");}
//if ($temp[0] == "78" && $temp[1] == "26" && $temp[2] == "179") {die("<h2>REGISTRATION INFO</h2><table cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">This computer or network has been banned from Basketsim due to abuse. For potential unban, send us a mail to basketsim@basketsim.com, but make sure to include an explanation.<br/><br/>Basketsim administrator</td></tr></table>");}
//if ($temp[0] == "79" && $temp[1] == "113" && $temp[2] == "130") {die("<h2>REGISTRATION INFO</h2><table cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">This computer or network has been banned from Basketsim due to abuse. For potential unban, send us a mail to basketsim@basketsim.com, but make sure to include an explanation.<br/><br/>Basketsim administrator</td></tr></table>");}
//if ($temp[0] == "79" && $temp[1] == "116" && $temp[2] == "32") {die("<h2>REGISTRATION INFO</h2><table cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">This computer or network has been banned from Basketsim due to abuse. For potential unban, send us a mail to basketsim@basketsim.com, but make sure to include an explanation.<br/><br/>Basketsim administrator</td></tr></table>");}
//if ($temp[0] == "79" && $temp[1] == "116" && $temp[2] == "33") {die("<h2>REGISTRATION INFO</h2><table cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">This computer or network has been banned from Basketsim due to abuse. For potential unban, send us a mail to basketsim@basketsim.com, but make sure to include an explanation.<br/><br/>Basketsim administrator</td></tr></table>");}
$preverimga = mysql_query("SELECT * FROM `baned_ips` WHERE `address` = '$user_ip'") or die(mysql_error());
if (mysql_num_rows($preverimga)) {die("<h2>REGISTRATION INFO</h2><table cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">This computer or network has been banned from Basketsim due to abuse. For potential unban, send us a mail to basketsim@basketsim.com, but make sure to include an explanation.<br/><br/>Basketsim administrator</td></tr></table>");}
echo "<h2>",$langmark1037,"</h2>";
$user_name = $_POST['user_name'];
$user_pass = $_POST['user_pass'];
$user_mail = $_POST['user_mail'];
$tempm = explode("@", $user_mail);
$hide_mail = $_POST['hide_mail'];
$user_real = $_POST['user_real'];
$user_region = $_POST['user_region'];
$user_country = $_POST['user_country'];
$team_name = $_POST['team_name'];
$short_name = $_POST['short_name'];
$arena_name = $_POST['arena_name'];

//if ($tempm[1] == 'aol.com' || $tempm[1] == 'AOL.COM') {die("<table cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">Currently it's not possible to use AOL email address for registration. Please pick any other email address, there are no restrictions on other domains. Press back button in your browser to retain your registration data.</td></tr></table>");}
if ($user_mail == 'lol@hotmail.com' OR $user_mail == 'haris.tm87@hotmail.com' OR $user_mail == 'shranjevanje@gmail.com' OR $user_mail == 'fucker91@net.hr' OR $user_mail == 'kurac@email.si' OR $user_mail == 'dhruv@gmail.com' OR $user_mail == 'dhruv@yahoo.com' OR $user_mail == 'skapina_ve@msn.com' OR $user_mail == 'hackzors@hotmail.com' OR $user_mail == 'simionescu_adi@yahoo.com'){die("<table cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">".$langmark1018."<br/><br/>Basketsim administrator</td></tr></table>");}
if ($user_real=='TLR' OR $user_real=='Tricom' OR $user_real=='Boom' OR $user_real=='Xeno' OR $user_real=='Dieing With Style' OR $user_real=='NBO' OR $user_real=='Dak Mercenaries' OR $user_real=='EverySoldierCounts' OR $user_real=='Still undecided' OR $user_real=='The United Irishmen' OR $user_real=='XSZ Appearently' OR $user_real=='3TAG' OR $user_real=='3TAGS') {die("<table cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">".$langmark582."<br/><br/>".$langmark1018."<br/><br/>Basketsim administrator</td></tr></table>");}
if ($tempm[1]=='hotmail.com' AND strlen($tempm[0]) < 5) {die("<table cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">$langmark1031</td></tr></table>");}

if (preg_match( '/[^A-z0-9]+/', $user_name ) ) {die("<table cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">$langmark1021<br/>$langmark1022</td></tr></table>");}
if (preg_match( '/[^A-z0-9]+/', $user_pass ) ) {die("<table cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">$langmark1023<br/>$langmark1022</td></tr></table>");}

$user_name=strip_tags($user_name);
$user_pass=strip_tags($user_pass);
$user_mail=strip_tags($user_mail);
$user_real=strip_tags($user_real);
$team_name=strip_tags($team_name);
$short_name=strip_tags($short_name);
$arena_name=strip_tags($arena_name);
$user_region=strip_tags($user_region);

$user_name=str_replace(" ","",$user_name);
$user_pass=str_replace(" ","",$user_pass);
$user_mail=str_replace(" ","",$user_mail);
$user_name=str_replace("%20","",$user_name);
$user_pass=str_replace("%20","",$user_pass);
$user_mail=str_replace("%20","",$user_mail);

$user_name=str_replace(" ","",$user_name);
$user_pass=str_replace(" ","",$user_pass);
$user_mail=str_replace(" ","",$user_mail);
$user_name=str_replace("%20","",$user_name);
$user_pass=str_replace("%20","",$user_pass);
$user_mail=str_replace("%20","",$user_mail);

$user_name=addslashes($user_name);
$user_pass=addslashes($user_pass);
$user_mail=addslashes($user_mail);
$user_real=addslashes($user_real);
$team_name=addslashes($team_name);
$short_name=addslashes($short_name);
$arena_name=addslashes($arena_name);

//unikatnost usernejma
$queryuni = mysql_query("SELECT userid FROM users WHERE username='$user_name' LIMIT 1") or die(mysql_error());
$verify = mysql_fetch_row($queryuni);
if ($verify){
die("<table cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">$langmark1024</td></tr></table>");}

//unikatnost timnejma
$queryunit = mysql_query("SELECT teamid FROM teams WHERE status=1 AND name='$team_name' LIMIT 1") or die(mysql_error());
$verify1 = mysql_fetch_row($queryunit);
if ($verify1){
die("<table cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">$langmark1025</td></tr></table>");}

//unikatnost mejla
$querymai = mysql_query("SELECT email FROM users WHERE email='$user_mail' LIMIT 1") or die(mysql_error());
$verify2 = mysql_fetch_row($querymai);
if ($verify2){die("<table cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">$langmark616<br/>$langmark1022</td></tr></table>");}

if(strlen($user_name) < 4){die("<table cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">$langmark1026</td></tr></table>");}
if(strlen($user_pass) < 5){die("<table cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">$langmark1027</td></tr></table>");}
if(strlen(trim($team_name)) < 2 || strlen($short_name) < 2){die("<table cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">$langmark1028</td></tr></table>");}
if(strlen(trim($arena_name)) < 2){die("<table cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">$langmark1029</td></tr></table>");}
if(strlen(trim($user_real)) < 3){die("<table cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">$langmark1030</td></tr></table>");}

//mail
if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $user_mail)){
die("<table cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">$langmark1031</td></tr></table>");
}

$user_pass=md5($user_pass);
if ($user_pass == '87e2b05d05a460f75820977bb6502793'){die("<table cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">".$langmark1018."<br/><br/>Basketsim administrator</td></tr></table>");}

$topliga = mysql_query("SELECT DISTINCT `level` FROM `leagues` WHERE `country`='$user_country' and active=1 ORDER BY `leagueid` DESC LIMIT 2") or die(mysql_error());
$top_liga = mysql_result($topliga,1);
$iscembota = mysql_query("SELECT DISTINCT `teams`.`teamid` FROM `teams`, `competition`, `leagues` WHERE `teams`.`teamid` = `competition`.`teamid` AND `competition`.`leagueid` = `leagues`.`leagueid` AND `teams`.`status`=3 AND `leagues`.`level` >= $top_liga AND `teams`.`country` LIKE '$user_country' AND `competition`.`season`='$default_season' and leagues.active=1 ORDER BY `teams`.`teamid` ASC LIMIT 1") OR die("<table cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">Failed due to database error!<br/>Please press back button in your browser and try again</td></tr></table>");

while ($bot_found = mysql_fetch_array($iscembota, MYSQL_ASSOC))
   {   foreach ($bot_found as $new_team)
   {$new_team; }     } ;

if ($new_team==0) {die("<table cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">$langmark582<br/><br/>$langmark1032<br/><br/>Basketsim administrator</td></tr></table>");}

//pokal
$statusfrend = mysql_query("SELECT cupstatus FROM teams WHERE country='$user_country' ORDER BY cupstatus DESC LIMIT 1");
$fr_st = mysql_result($statusfrend,0);
$frendlii = mysql_query("SELECT cupstatus FROM teams WHERE teamid='$new_team' LIMIT 1");
$frendl = mysql_result($frendlii,0);
if ($fr_st==$frendl AND $fr_st>0) {$dodaj_f=1;} else {$dodaj_f=0;}
if ($dodaj_f==0) {
$pokalnik = mysql_query("SELECT matchid FROM matches WHERE type=2 AND crowd1=0 AND home_id=$new_team UNION SELECT matchid FROM matches WHERE type=2 AND crowd1=0 AND away_id=$new_team");
if (mysql_num_rows($pokalnik)) {$dodaj_f=1;}
}

//ekipa
$query = mysql_query("UPDATE teams SET name='$team_name', short_name='$short_name', city='$user_region', curmoney=0, tempmoney=0, status=0 where teamid=$new_team LIMIT 1") or die (mysql_error());

//arena
$tideal = mt_rand(4950,5350);
$result1 = mysql_query("UPDATE arena SET arenaname='$arena_name', seats1=1000, seats2=500, seats3=0, seats4=0, in_use=100, upgrading='', fans=250, cheer_logo='', cheer_week =0, week_ideal=$tideal, cheer_season=0, season_ideal=0 WHERE teamid=$new_team LIMIT 2");
if (!$result1){
$team_numb = mt_rand(100,999);
$bname = 'Bot team no.';
$bname .= $team_numb;
$oldteam = mysql_query("UPDATE teams SET name='$bname', short_name='$bname', city='', status=3 where teamid=$new_team");
die("<table cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">Failed due to database error!<br/>Please press back button in your browser and try again</td></tr></table>");
}

if ($hide_mail == TRUE) {$hide_mail = 1;} else {$hide_mail = 0;}

$request = "INSERT INTO `users` ( `userid` , `username` , `login`, `password` , `email`, `realname`, club , signed , `lastip` , hide_email , friendly, is_online, last_active, `lang`, `level`, `look` ) VALUES ('', '$user_name', '$user_name', '$user_pass', '$user_mail', '$user_real', $new_team, '$takoj', '$user_ip', $hide_mail, $dodaj_f, 0, '$takoj', 'en', 0, 7 );";
$result2 = mysql_query($request);
$newuid = mysql_insert_id();

if (!$result2){
$team_numb = mt_rand(100,999);
$bname = 'Bot team no.';
$bname .= $team_numb;
$oldteam = mysql_query("update teams set name='$bname', short_name='$bname', city='', status=3 where teamid=$new_team LIMIT 2");
$oldarena = mysql_query("update arena set arenaname='Bot team court' where teamid=$new_team LIMIT 2");
die(mysql_error());
}

//izbris_def_takt
$result77 = mysql_query("DELETE FROM tactics WHERE tactics_team=$new_team LIMIT 12");
if (!$result77){
$team_numb = mt_rand(100,999);
$bname = 'Bot team no.';
$bname .= $team_numb;
$oldteam = mysql_query("UPDATE teams SET name='$bname', short_name='$bname', city='', status=0 WHERE teamid=$new_team LIMIT 2");
$oldarena = mysql_query("UPDATE arena SET arenaname='Bot team court' where teamid=$new_team LIMIT 2");
$nouser = mysql_query("DELETE FROM users WHERE userid=$newuid LIMIT 5");
die(mysql_error());
}

mysql_query("UPDATE players SET club=0, isonsale=0, shirt=0 WHERE club=$new_team LIMIT 500");
mysql_query("DELETE FROM events WHERE team ='$new_team'");

//obvestila
$welcomem = mysql_query("INSERT INTO messages VALUES ('', $newuid, 0, 0, '$takoj', '<b>Welcome!</b>', 'It&#39;s great to meet you on Basketsim! You have been assigned as a manager of your own basketball team. What will happen to this club is now up to you, since you will be making all the important decisions!<br/><br/>If your registration was honest you&#39;ll be soon approved by the gamemasters (can be few minutes, a couple of hours or 1 day at most). 12 local players will sign contracts to play for you and your team will receive starting money.<br/><br/>The best advice that I can give you right now is to approach the game patiently. Just take your time, read the rules, see where it would be best to spend the starting money. There are many different ways how to play Basketsim, some people spend their starting money on top quality coach and then they run youth team in addition to senior team. Some spend their starting money on other things in the game and they prefer to run senior team only. But take your time and get to know the game before making any decisions.<br/><br/>What is good about Basketsim is that it&#39;s full of helpful people who will be happy to answer any your questions. So visit the forums and ask there, or if you like more direct approach, check the gamerules for list of helpers and contact one of them for help. Most can be contacted in local language or English.<br/><br/>Now take your time and look around, your team will be activated soon! Then you will start receiving help messages, 1 message per every 2 days.<br/><br/>Have fun!<br/>admin')") or die("<table cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">$langmark1033<p></p><a href=\"gamerules.php\">manual</a></td></tr></table>");

$lnwelc = mysql_query("INSERT INTO events VALUES ('', $new_team, '$takoj', '$langmark1036 <a href=messages.php>$langmark630</a>.', 0, 0);");

echo "<table cellspacing=\"9\" cellpadding=\"9\" width=\"100%\"><tr bgcolor=\"#ffffff\"><td class=\"border\">You are awesome!<br/><br/>$langmark1033<br/><br/>$langmark1034</td></tr></table>";
?>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>