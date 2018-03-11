<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$comparepasss = mysql_query("SELECT lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($comparepasss)) {$lang = mysql_result ($comparepasss,0);} else {die(include 'basketsim.php');}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2><?=$langmark887?></h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="70%">

<?=$langmark842?><br/><br/>

<font color="darkgreen"><b><?=$langmark843?></b></font><br/>
<a name="1"></a><br/><b>1. <?=$langmark844?></b><br/><img src="img/supscr1.jpg" border="0" alt=""><br/><br/>
<a name="2"></a><br/><b>2. <?=$langmark845?></b><br/><img src="img/dresroom1.gif" border="0" alt=""><br/><br/>
<a name="3"></a><br/><b>3. <?=$langmark846?></b><img src="img/supscr2.jpg" border="0" alt=""><br/>
<a name="4"></a><br/><b>4. <?=$langmark1339?></b><br/>
<a name="5"></a><br/><b>5. <?=$langmark847?></b><br/><img src="img/supscr3.jpg" border="0" alt=""><br/>
<a name="6"></a><br/><b>6. <?=$langmark848?> <?=$langmark1340?></b><br/><img src="img/supscr6.jpg" border="0" alt=""><img src="img/suppgb.jpg" border="0" alt=""><br/>
<a name="7"></a><br/><b>7. <?=$langmark849?></b><br/><img src="img/supscr4.jpg" border="0" alt=""><img src="img/supadd1.jpg" border="0" alt="<?=$langmark1341?>" title="<?=$langmark1341?>"><br/>
<a name="8"></a><br/><b>8. <?=$langmark850?></b><br/>
<a name="9"></a><br/><b>9. <?=$langmark851?></b><br/>
<a name="10"></a><br/><b>10. <?=$langmark852?><br/><img src="img/subscr8.jpg" border="0" alt=""><br/>
<!-- <a name="11"></a><br/><b>11. <?=$langmark853?></b><br/> -->
<a name="12"></a><br/><b>11. <?=$langmark854?></b><br/>
<a name="13"></a><br/><b>12. <?=$langmark855?></b><br/>
<a name="14"></a><br/><b>13. <?=$langmark856?><br>- <?=$langmark857?><br/>- <?=$langmark858?><br/>- <?=$langmark860?><br/>- <?=$langmark1342?><br/>- <?=$langmark1343?><br/>- <?=$langmark861?> <a href="img/supsta.gif" target="_blank"><?=$langmark862?></a></b><br/>
<a name="15"></a><br/><b>14. <?=$langmark863?></b><br/><img src="img/supscr7.jpg" border="0" alt=""><br/>
<a name="16"></a><br/><b>15. <?=$langmark1344?></b><br/>
<a name="18"></a><br/><b>16. You can assign shirt numbers from 1 to 99 to your players.</b><br/>
<a name="19"></a><br/><b>17. You can chose any special name for your fanclub.</b><br/>

</td><td class="border" width="30%">

<h2><?=$langmark864?></h2><br/>
1. <a href="#1"><?=$langmark865?></a><br/>
2. <a href="#2"><?=$langmark866?></a><br/>
3. <a href="#3"><?=$langmark867?></a><br/>
4. <a href="#4"><?=$langmark1345?></a><br/>
5. <a href="#5"><?=$langmark868?></a><br/>
6. <a href="#6"><?=$langmark869?></a><br/>
7. <a href="#7"><?=$langmark870?></a><br/>
8. <a href="#8"><?=$langmark258?></a><br/>
9. <a href="#9">Fair Play Cup</a><br/>
10. <a href="#10"><?=$langmark500?></a><br/>
11.&nbsp;<a href="#11"><?=$langmark871?></a><br/>
12. <a href="#12">Thumbs Up <?=$langmark872?></a><br/>
13. <a href="#13"><?=$langmark873?></a><br/>
14. <a href="#14"><?=$langmark874?></a><br/>
15. <a href="#15"><?=$langmark875?></a><br/>
16. <a href="#16"><?=$langmark1346?></a><br/>
17. <a href="#17">Shirt numbers 1-99</a><br/>
18. <a href="#18">Fanclub name</a><br/>

<br/><h2><?=$langmark876?></h2><br/>

<b><?=$langmark877?></b><br/>

<?php
$ftime = time();
$fyear=date('Y', $ftime); $fmonth=date('m', $ftime); $fday=date('d', $ftime);
$fhour=date('H', $ftime); $fmin=date('i', $ftime); $fsec=date('s', $ftime);
$unique3 = $userid."-3-".$fyear.$fmonth.$fday.$fhour.$fmin.$fsec;
$unique6 = $userid."-6-".$fyear.$fmonth.$fday.$fhour.$fmin.$fsec;
$unique12 = $userid."-12-".$fyear.$fmonth.$fday.$fhour.$fmin.$fsec;
?>

<!-- <table width="100%" cellspacing="1" cellpadding="1"><tr>
<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<td width="50">3 <?=$langmark878?></td><td align="center">(5.50&euro;)</td><td align="right">
<input type="hidden" name="pay_to_email" value="hopeillwin@yahoo.com">
<input type="hidden" name="transaction_id" value="<?=$unique3?>">
<input type="hidden" name="status_url" value="tkranjc@gmail.com">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="5.50">
<input type="hidden" name="currency" value="EUR">
<input type="hidden" name="detail1_description" value="Basketsim Supporter">
<input type="hidden" name="detail1_text" value="3 months">
<input type="hidden" name="confirmation_note" value="Thanks for supporting the game!<br/>Please allow up to 48 hours for activation of your supportership.">
<input type="submit" value="Buy!" class="buttonreg"></td></tr>
</form>

<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<td width="50">6 <?=$langmark878?></td><td align="center">(10.90&euro;)</td><td align="right">
<input type="hidden" name="pay_to_email" value="hopeillwin@yahoo.com">
<input type="hidden" name="transaction_id" value="<?=$unique6?>">
<input type="hidden" name="status_url" value="tkranjc@gmail.com">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="10.90">
<input type="hidden" name="currency" value="EUR">
<input type="hidden" name="detail1_description" value="Basketsim Supporter">
<input type="hidden" name="detail1_text" value="6 months">
<input type="hidden" name="confirmation_note" value="Thanks for supporting the game!<br/>Please allow up to 48 hours for activation of your supportership.">
<input type="submit" value="Buy!" class="buttonreg"></td></tr>
</form>

<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<td width="50">1 <?=$langmark879?></td><td align="center">(19.90&euro;)</td><td align="right">
<input type="hidden" name="pay_to_email" value="hopeillwin@yahoo.com">
<input type="hidden" name="transaction_id" value="<?=$unique12?>">
<input type="hidden" name="status_url" value="tkranjc@gmail.com">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="19.90">
<input type="hidden" name="currency" value="EUR">
<input type="hidden" name="detail1_description" value="Basketsim Supporter">
<input type="hidden" name="detail1_text" value="1 year">
<input type="hidden" name="confirmation_note" value="Thanks for supporting the game!<br/>Please allow up to 48 hours for activation of your supportership.">
<input type="submit" value="Buy!" class="buttonreg"></td></tr>
</form>
</table> -->
<?php
// if ($action != 'more') {echo "<a href=\"supporter.php?action=more\">",$langmark231,"</a>";}
// $action=$_GET["action"];
// if ($action == 'more') {echo "<br/>",$langmark883," ",$langmark884," <a href=\"https://www.moneybookers.com/app/?rid=2850168\" target=\"_blank\">",$langmark885,"</a> ",$langmark886,"<br/><br/><a href=\"supporter.php\">",$langmark230,"</a>";}
?>
<!--<br/><br/><hr/><br/><b><a href="supporter_cc.php"><?=$langmark880?></a></b>-->
<!-- <br/><br/><hr/>Another option is <b>PayPal</b>. <a href="club.php?clubid=3147"><?=$langmark881?></a></td></tr> -->
<br/><br/><hr/>Buying supporter is temporary disabled. More info about this will be posted in the news section</td></tr>
</table>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>