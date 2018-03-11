<?php
//current season
$default_season=22;
/*
if ($_COOKIE['userid']==1) {$bkk=0;} else {die("<table width=\"100%\" cellspacing=\"1\" cellpadding=\"0\"><tr><td align=\"center\"><br/><b>Basketsim is starting a new chapter under new administrator - stay tuned and be a part of it - very soon!<br/><br/>Update: game is currently being prepared for continuation!<br/><br/>Grand Basketsim reopening and start of new life - this evening, in less than 24 hours.</b><br/><br/>Less than 20 minutes left to reopening and due to decision from new owner all users will start new season as supporters!</td></tr></table>");}

if ($_COOKIE['userid']==1) {$bkk=0;} else {die("<table width=\"100%\" height=\"100%\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#EFD279\"><tr><td valign=\"top\">
<br/><h2 align=\"center\"><font color=\"#024769\">BASKETSIM.COM</font><br/><small><i>temporary downtime</i></small></h2><br/>
<table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"1\" align=\"center\"><tr><td bgcolor=\"#95CBE9\" align=\"center\">
<b><font color=\"DarkSlateGrey\"><u>07.30 CET</u>: Basketsim is down for seasonal updates and will be back in the afternoon with season 22 coming!</b></font><table width=\"90%\" cellspacing=\"0\" cellpadding=\"0\" border=\"1\" align=\"center\"><tr><td bgcolor=\"#AFD775\" align=\"center\">
<font color=\"DarkSlateGrey\"><b>During the downtime you might can visit some of the following pages:</b><br/>
<a class=\"greenhilite\" href=\"http://basketsim.wikia.com/wiki/\" target=\"_blank\">bsWiki</a> - offers hours of browsing Basketsim topics and you can add your club page too!<br/>
<a class=\"greenhilite\" href=\"http://facebook.basketsim.com\" target=\"_blank\">Facebook group</a> - join them now!<br/>
<a class=\"greenhilite\" href=\"gamerules.php\" target=\"_blank\">Game rules</a> - official game rules, worth checking often<br/>
<a class=\"greenhilite\" href=\"http://bsgoodies.blogspot.com/\" target=\"_blank\">BS Goodies</a> - provides a great insight to the game<br/>
<a class=\"greenhilite\" href=\"http://bs.helpdesk.free.fr/\" target=\"_blank\">BS-helpdesk</a> - is doing exactly the same<br/>
<a class=\"greenhilite\" href=\"http://bs-spain.mejorforo.net/\" target=\"_blank\">Basketsim Spain</a> - external forum for Spanish speaking users<br/>
<a class=\"greenhilite\" href=\"http://www.dsws.cn/bbs/thread-75655-1-1.html\" target=\"_blank\">Basketsim China</a> - get Basketsim information or ask question in Chinese<br/>
<a class=\"greenhilite\" href=\"https://www.facebook.com/groups/pinoybasketsim/\" target=\"_blank\">Basketsim Philippines</a> - Philippines Facebook group<br/>
<a class=\"greenhilite\" href=\"http://basketsim.wikia.com/wiki/Cartoons_in_BS\" target=\"_blank\">Cartoons in BS</a> - old stuff, but still funny<br/>
<a class=\"greenhilite\" href=\"http://basketsim.wikia.com/wiki/The_BS_Times_-_edition_0001\" target=\"_blank\">The BS Times</a> - same as above!<br/>
<i>Send us an email to basketsim@basketsim.com for any page to be added!</i></td></tr></table></td></tr></table>");}
*/
//server check
// if ($_SERVER['SERVER_NAME']<>"basketsim.com" AND $_SERVER['SERVER_NAME']<>"www.basketsim.com"){die("<h1>Wrong server</h1>");}

$server = "localhost";
$dbuser = "root";
$dbpass = "qweqwe";
$dbname = "basketsim";

@mysql_connect($server,$dbuser,$dbpass) or die ("Unable to handle the request. Please try later.");
@mysql_select_db($dbname) or die ("<br/>Unable to handle the request. Please try later.");

//reading for cookies
$userid = $_COOKIE['userid'];
$koda = $_COOKIE['geslo'];

if (!is_numeric($userid) && (strlen($userid)>1)) {
setcookie("userid", "", time()-3600, "/", ".basketsim.com", 0);
setcookie("geslo", "", time()-3600, "/", ".basketsim.com", 0);
}
?>