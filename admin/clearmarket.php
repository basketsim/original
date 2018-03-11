<?php
include('cron2conect.php');

$optim = rand(0,3);
if ($optim==2){
$zdaje = date("Y-m-d H:i:s");
$adijo = mysql_query("SELECT `sponsorid`, `user_id`, `offerexpire` FROM `sponsors` WHERE `offerexpire` < '$zdaje' AND `history`=0 ORDER BY sponsorid ASC");
while ($mm = mysql_fetch_array($adijo)) {
$sponsorid = $mm['sponsorid'];
$user_id = $mm['user_id'];
$offerexpire = $mm['offerexpire'];
$prech = mysql_query("SELECT * FROM sponsors WHERE `history`=0 AND `user_id`=$user_id");
if (mysql_num_rows($prech)>1) {mysql_query("DELETE FROM sponsors WHERE history=0 AND user_id=$user_id AND sponsorid=$sponsorid LIMIT 1");
} else {
$splitdatetime = explode(" ", $zdaje); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$zdajU = date("Y-m-d H:i:s", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday+6,$dbyear));
mysql_query("UPDATE sponsors SET offerexpire='$zdajU' WHERE history=0 AND user_id=$user_id AND sponsorid=$sponsorid");
}
}
}

$timenow=date("Y-m-d H:i:s");
$result = mysql_query("SELECT `transferid`, `playerid`, `playerclub`, `sellingid`, `price`, `currentbid`, `bidingteam`, `bidingname` FROM `transfers` WHERE `trstatus`=1 AND `timeofsale`< '$timenow'") or die(mysql_error());
while ($i = mysql_fetch_array($result)) {
$transferid=$i["transferid"];
$playerid=$i["playerid"];
$iekp=$i["playerclub"];
$sellingid=$i["sellingid"];
$price=$i["price"];
$currentbid=$i["currentbid"];
$bidingteam=$i["bidingteam"];
$iekk=$i["bidingname"];

//ni bilo bida
if ($bidingteam == 0) {
mysql_query("UPDATE `transfers` SET `trstatus`='0' WHERE `transferid`='$transferid' LIMIT 1") or die(mysql_error());
mysql_query("UPDATE `players` SET `isonsale`='0' WHERE `id`='$playerid' LIMIT 1") or die(mysql_error());
} else {

//kupec
$resultcl = mysql_query("SELECT club, leagueid FROM users, competition WHERE teamid=club AND season='$default_season' AND userid='$bidingteam' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($resultcl)) {$asnwt = mysql_result($resultcl,0,"club"); $liga11 = mysql_result($resultcl,0,"leagueid");} else {$asnwt=0;}
//prodajalec
$resultld = mysql_query("SELECT club, leagueid FROM users, competition WHERE teamid=club AND season='$default_season' AND userid='$sellingid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($resultld)) {$asoldte = mysql_result($resultld,0,"club"); $liga22 = mysql_result($resultld,0,"leagueid");} else {$asoldte=0;}

//autobid
if ($asnwt==$asoldte && $asnwt<>0) {$removemoney= round($currentbid*10/100);}
//taxation
if ($asnwt<>$asoldte) {
$davek = mysql_query("SELECT `timeofsale`, `currentbid` FROM `transfers` WHERE `currentbid` >999 AND `playerid` =$playerid ORDER BY `timeofsale` DESC LIMIT 2");
$koef=100;
if (mysql_num_rows($davek) >1) {
$timeof = mysql_result($davek,1,"timeofsale");
$currentbid1 = mysql_result($davek,1,"currentbid");
$splitdatetime = explode(" ", $timeof); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$days = (int)((mktime (0,0,0,$dbmonth,$dbday,$dbyear) - time(void))/86400);
$timeof = abs($days);
if ($timeof <= 1) {$timeof=1;}
$koef = 5*($timeof-1)/3;
}
if ($koef > 100) {$koef=100;}
if (empty($currentbid1)) {$currentbid1=$currentbid;}
$removemoney = round((($currentbid - $currentbid1) * (100-$koef))/100);
}
if ($removemoney < 0) {$removemoney=0;}
$skupaj = $currentbid-$removemoney;

if ($asoldte>0) {mysql_query("UPDATE `teams` SET `curmoney`=`curmoney`+$skupaj, `tempmoney`=`tempmoney`-'$currentbid' WHERE `teamid`='$asoldte' LIMIT 1") or die(mysql_error());}
mysql_query("UPDATE `players` SET `club`='$asnwt', `isonsale`='0', `shirt`='0' WHERE `id`='$playerid' LIMIT 1") or die(mysql_error());
if ($asnwt>0) {mysql_query("UPDATE `teams` SET `curmoney`=`curmoney`-'$currentbid', `tempmoney`=`tempmoney`+'$currentbid' WHERE `teamid`='$asnwt' LIMIT 1") or die(mysql_error());}
if ($asoldte >0 && $removemoney >0 && $asnwt==$asoldte) {mysql_query("UPDATE `transfers` SET `trstatus`='0', currentbid=$removemoney WHERE `transferid`='$transferid' LIMIT 1") or die(mysql_error());} else {mysql_query("UPDATE `transfers` SET `trstatus`='0' WHERE `transferid`='$transferid' LIMIT 1") or die(mysql_error());}

$curbidispl = number_format($currentbid, 0, ',', '.');
$removedispl = number_format($removemoney, 0, ',', '.');
if($asnwt >0 && $asnwt<>$asoldte) {mysql_query("INSERT INTO events VALUES ('', $asnwt, NOW(), '<a href=player.php?playerid=$playerid>Player</a> was purchased.', 0, -$currentbid);") or die(mysql_error());}
if($asoldte >0 && $asnwt<>$asoldte) {mysql_query("INSERT INTO events VALUES ('', $asoldte, NOW(), '<a href=player.php?playerid=$playerid>Player</a> was sold.', 0, $skupaj);") or die(mysql_error());}
if($asnwt >0 && $asnwt<>$asoldte) {mysql_query("INSERT INTO events VALUES ('', $asnwt, NOW(), 'Paid $curbidispl &euro; for a <a href=player.php?playerid=$playerid>player</a>.', 1, -$currentbid);") or die(mysql_error());}
if($asoldte >0 && $removemoney==0) {mysql_query("INSERT INTO events VALUES ('', $asoldte, NOW(), '$curbidispl &euro; was received after a <a href=player.php?playerid=$playerid>player</a> was sold.', 1, $currentbid);") or die(mysql_error());}
if($asoldte >0 && $removemoney >0 && $asnwt==$asoldte) {
mysql_query("INSERT INTO events VALUES ('', $asoldte, NOW(), 'After buying back your own <a href=player.php?playerid=$playerid>player</a> $removedispl was lost to pay the agent fees.', 1, $currentbid);") or die(mysql_error());
@mysql_query("INSERT INTO messages VALUES ('', $bidingteam, 0, 0, NOW(), '<b><font color=\"darkred\">Buy back warning</font></b>', 'This is a general notice regarding your recent buy-back of own <a href=transferhistory.php?playerid=$playerid>player</a>. Make sure to understand that buy-backs are only intended for cases when you change your mind about the sale and not for the cases when you feel that player\'s price is too low and try to increase it. So if you\'re going to list the same player for sale again very soon, the agents will claim most of the money in case of a sale. For more information check the relevant <a href=gamerules.php?action=transfers>game rules section</a>.<br/><br/>Best regards<br/>Peter Fair, International Basketsim Federation member')");
}
if($asoldte >0 && $removemoney >0 && $timeof==1 && $asnwt<>$asoldte) {mysql_query("INSERT INTO events VALUES ('', $asoldte, NOW(), '<a href=player.php?playerid=$playerid>Player</a> was sold for $curbidispl &euro;. His previous transfer occured only 1 day ago, so the agents earned $removedispl &euro; from the deal.', 1, $skupaj);") or die(mysql_error());}
if($asoldte >0 && $removemoney >0 && $timeof >1 && $asnwt<>$asoldte) {mysql_query("INSERT INTO events VALUES ('', $asoldte, NOW(), '<a href=player.php?playerid=$playerid>Player</a> was sold for $curbidispl &euro;. His previous transfer occured only $timeof days ago, so the agents earned $removedispl &euro; from the deal.', 1, $skupaj);") or die(mysql_error());}

if ($asnwt<>$asoldte) {
$iekp = addslashes($iekp);
$iekk = addslashes($iekk);
$aa[1] = "[playerid=".$playerid."] - [i]According to the press, ".$iekk." have purchased new player just earlier today. Some moments ago both teams involved have confirmed the deal, so it\'s final![/i]";
$aa[2] = "[playerid=".$playerid."] - [i]Trying to sign additional player for some time, ".$iekk." have welcomed newcomer today and now they are full of hope that he\'ll show great performances in the near future.[/i]";
$aa[3] = "[playerid=".$playerid."] - [i]".$iekk." have just announced that new player was brought to the club. He\'ll try to help achieve club goals from now on.[/i]";
$aa[4] = "[playerid=".$playerid."] - [i]Keeping an eye on the market, ".$iekk." made the move today, bringing in a fresh face. They hope to benefit from that purchase in the long term.[/i]";
$aa[5] = "[playerid=".$playerid."] - [i]".$iekk." have strengthened their roster today. A deal was reached with newcomer, he already passed the medical and is now officially member of the club.[/i]";
$aa[6] = "[playerid=".$playerid."] - [i]Perhaps things will be easier for ".$iekk." from now on, since additional player was purchased in attempt to improve their team squad.[/i]";
$aa[7] = "[playerid=".$playerid."] - [i]A player was signed by ".$iekk." today. Fans are eager to see him in action soon, so that they can determine what he can do for the club![/i]";
$dd = rand(1,7);
$izjava1 = $aa[$dd];

$cc[1]= "[playerid=".$playerid."] - [i]Player who was no longer needed at ".$iekp." was sold today to another club. It\'s yet unclear at this point if the manager will be seeking an immediate replacement.[/i]";
$cc[2]= "[playerid=".$playerid."] - [i]There will be one player less at ".$iekp." from today. In a short statement fans have expressed their worries about players leaving the club, but the management is standing behind the decision to sell this player.[/i]";
$cc[3]= "[playerid=".$playerid."] - [i]A departing player of ".$iekp." is waving goodbye to the fans, after his manager accepted the offer on him by another club.[/i]";
$cc[4]= "[playerid=".$playerid."] - [i]In a long rumored move, ".$iekp." let go one of their players today! Selling price and personal terms were both succesfully negotiated, so it was time for player to say goodbye to the fans and teammates.[/i]";
$cc[5]= "[playerid=".$playerid."] - [i]Player who was wanted by other clubs for some time is no longer a member of ".$iekp.". He was sold away to another club.[/i]";
$cc[6]= "[playerid=".$playerid."] - [i]".$iekp." have just announced a sale of a player who was no longer in club\'s long term plans. In such circumstances, switch to another club was a good move for all parties involved.[/i]";
$dd = rand(1,6);
$izjava2 = $cc[$dd];

if ($liga22 > 0) {
$lulc2 = "INSERT INTO `lb_comments` (username, type, league, time, content) VALUES ('transfers_bot', 5, $liga22, NOW(), '$izjava2');";
mysql_query($lulc2);
}
if ($liga11 > 0) {
$lulc1 = "INSERT INTO `lb_comments` (username, type, league, time, content) VALUES ('transfers_bot', 5, $liga11, NOW(), '$izjava1');";
mysql_query($lulc1);
}
}





}
}





$past_active = date('Y-m-d H:i:s');
$splitdatetime = explode(" ", $past_active); $aadate = $splitdatetime[0]; $aatime = $splitdatetime[1];
$splitdate = explode("-", $aadate); $aayear = $splitdate[0]; $aamonth = $splitdate[1]; $aaday = $splitdate[2];
$splittime = explode(":", $aatime); $aahour = $splittime[0]; $aamin = $splittime[1]; $aasec = $splittime[2];
$expireminus = date('Y-m-d H:i:s', mktime($aahour,$aamin-35,$aasec,$aamonth,$aaday,$aayear));
$online = mysql_query("SELECT COUNT(*) FROM users WHERE last_active > '$expireminus' AND is_online=1") or die(mysql_error());
list($ston) = mysql_fetch_row($online);
@mysql_query("UPDATE online SET online='$ston' LIMIT 1");
?>