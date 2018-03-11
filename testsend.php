<?php
require("inc/lang/en.php");

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
$message1 = "12 local players have signed contracts to play for your Basketsim team. Sponsors have agreed to contribute 1,15 million as a club's starting money - it seems they are confident you are the person to take this club to a higher level! You can login to www.basketsim.com at any time to give your players instructions what to train and how to play. Don't forget to read the game rules and while logged in, check the forums for more info.";
$message2 = "Have fun!";
$message3 = "www.basketsim.com";
$email = 'antemercep@yahoo.com';
send_mail("$email", "Hello coach!\n\n$message1\n\n$message2\n$message3", "Basketsim team activated", "basketsim@basketsim.com", "Basketsim");

?>