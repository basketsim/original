<?php
include("common.php");
$teamid=$_GET['teamid'];
$resultf = mysql_query("SELECT `country`, `status`, `curmoney` FROM `teams` WHERE `teamid`=$teamid LIMIT 1") or die(mysql_error());
$create_country = mysql_result($resultf,0,"country");
$hud_status = mysql_result($resultf,0,"status");
$dnardnar = mysql_result($resultf,0,"curmoney");
if ($hud_status==3) {die("This club was already deactivated!<br><br/><a href=index.php>back</a>");}

$email = mysql_query("SELECT `userid`, `supporter`, `email`, `last_active`, `bad_login` FROM `users` WHERE `club`=$teamid LIMIT 1") or die(mysql_error());
$user_is = mysql_result($email,0,"userid");
$email_to = mysql_result($email,0,"email");
$supper = mysql_result($email,0,"supporter");
$last_active = mysql_result($email,0,"last_active");
$bad_login = mysql_result($email,0,"bad_login");

$enddate = mktime(date("H"),date("i"),date("s"),date("m"),date("d")-61,date("Y"));
$endate = date("Y-m-d H:i:s", $enddate);

if ($endate > $last_active) {$fik=6;}
if ($hud_status==0) {$fik=6;}
if ($dnardnar < -2000000) {$fik=6;}
if ($supper==1) {$fik=16;}

if ($fik != 6) {die("This club cannot be deleted");}

mysql_query("UPDATE players SET club =0, shirt=NULL WHERE club ='$teamid' LIMIT 50") or die(mysql_error());

echo "<hr/><b>New players were added to the team. If there is no error message displayed, use the bottom back link to return to last page.</b><br/><br/>";

if ($create_country<>'Georgia' AND $create_country<>'Puerto Rico' AND $create_country<>'Belarus' AND $create_country<>'Japan') {
mysql_query("UPDATE players SET club=$teamid WHERE country='$create_country' AND fatigue=0 AND injury=0 AND 3points=0 AND coach=0 AND club=0 AND age < 40 AND wage=201 LIMIT 12") or die(mysql_error());
} else {mysql_query("UPDATE players SET club=$teamid WHERE fatigue=0 AND injury=0 AND 3points=0 AND coach=0 AND club=0 AND age < 40 AND wage=201 LIMIT 12") or die(mysql_error());}

$plaqer = mysql_query("SELECT id FROM players WHERE club=$teamid");
$pum=mysql_num_rows($plaqer) or die(mysql_error());
$p=0;
while ($p < $pum) {
$id=mysql_result($plaqer,$p);
$array_playerid[$p] = $id;
$p++;
}
mysql_query("DELETE FROM tactics WHERE tactics_team = $teamid LIMIT 1") or die(mysql_error());
mysql_query("INSERT INTO tactics VALUES ($teamid, $array_playerid[0], $array_playerid[1], $array_playerid[2], $array_playerid[3], $array_playerid[4], $array_playerid[5], $array_playerid[6], $array_playerid[7], $array_playerid[8], $array_playerid[9], $array_playerid[10], $array_playerid[11]);") or die(mysql_error());

//zapis imena v competition
$imekipe = mysql_query("SELECT name FROM teams WHERE teamid=$teamid") or die(mysql_error());
while ($ime_ek = mysql_fetch_array($imekipe, MYSQL_ASSOC))
   {   foreach ($ime_ek as $ekipa_ime)
   {$ekipa_ime; }     } ;
$querycom = "UPDATE competition SET curname='$ekipa_ime' WHERE teamid=$teamid AND season=$sez LIMIT 1";
$resultcom = mysql_query($querycom) or die(mysql_error());

mysql_query("UPDATE teams SET status=3, intensity=0, guards_t=0, bigmen_t=0, shirt='orange', logo='', youthcamp=0, campinvest=0, schoolinvest=0, draft=0 WHERE teamid=$teamid LIMIT 1") or die(mysql_error());
mysql_query("DELETE FROM bookmarks WHERE team=$teamid");
mysql_query("DELETE FROM scouting WHERE team=$teamid");
mysql_query("DELETE FROM scouts WHERE teamid=$teamid LIMIT 1");
mysql_query("DELETE FROM medical_center WHERE id_team=$teamid");
mysql_query("DELETE FROM drafters WHERE team=$teamid");
mysql_query("DELETE FROM weight WHERE team=$teamid");

function send_mail($to, $body, $subject, $fromaddress, $fromname)
{
  $eol="\n";
  $headers .= "From: ".$fromname."<".$fromaddress.">".$eol;
  $headers .= "Reply-To: ".$fromname."<".$fromaddress.">".$eol;
  $headers .= "Return-Path: ".$fromname."<".$fromaddress.">".$eol;
  $headers .= "Message-ID: <".time()."-".$fromaddress.">".$eol;
  $headers .= "X-Mailer: PHP v".phpversion().$eol;          // These two to help avoid spam-filters
  $headers .= 'MIME-Version: 1.0'.$eol.$eol;
  $msg .= $body.$eol.$eol;
  ini_set(sendmail_from,$fromaddress);  // the INI lines are to force the From Address to be used !
  $mail_sent = mail($to, $subject, $msg, $headers);
  ini_restore(sendmail_from);
  return $mail_sent;
}
$message1 = "There are two possible explanations why you have received this message.";
$message2 = "If you just signed up on www.basketsim.com recently, it means that your registration was refused. You can re-register, just keep in mind that only one club per person is allowed, that offensive team and user names are not allowed and that you must submit real name and sign up in your own country.";
$message3 = "Second possibility is that your account was deleted due to inactivity. Whatever the reason, it's a final decision, but you are welcome to join us again right now or at any time in the future!";
$message4 = "In any case, we wish you to have fun!";
$message5 = "www.basketsim.com";
if ($bad_login < 99) {
send_mail("$email_to", "Hello coach!\n\n$message1\n\n$message2\n\n$message3\n\n$message4\n$message5", "Basketsim team deleted", "basketsim@basketsim.com", "Basketsim");
}

//izbrisi
mysql_query("DELETE FROM messages WHERE to_id=$user_is");
mysql_query("DELETE FROM messages WHERE from_id=$user_is");
mysql_query("DELETE FROM friendly WHERE sent_user=$user_is");
mysql_query("DELETE FROM friendly WHERE received_user=$user_is");
mysql_query("DELETE FROM statements WHERE user=$user_is");
mysql_query("DELETE FROM bookmarks WHERE b_link=$user_is AND b_type=2");
mysql_query("DELETE FROM gm_messages WHERE user=$user_is");
mysql_query("DELETE FROM `conf_user_folder` WHERE `user_id` =$user_is");
mysql_query("DELETE FROM `conf_last_read` WHERE `user_id` =$user_is");
mysql_query("DELETE FROM `lb_user_read` WHERE `user` =$user_is");
mysql_query("DELETE FROM users WHERE userid=$user_is LIMIT 1");
mysql_query("DELETE FROM login WHERE user=$user_is LIMIT 1");
echo "<b><font color=\"red\">Team de-activated</font></b>";
mysql_query("UPDATE `players` SET `motiv`=105, `wage`=(`experience`*(100*`quality` - 4000))/2 WHERE `club` =0 AND `coach` =1");
?>
<p>
<a href="zapiranje.php">back</a><hr/>
</p>