<?php
$expandmenu1=342;
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$getuser=mysql_query("SELECT club, lang, history FROM users, sponsors WHERE history<>2 AND user_id=userid AND password='$koda' AND userid='$userid'") or die(mysql_error());
$cheta = mysql_num_rows($getuser);
if ($cheta > 0) {
$dnak = mysql_result ($getuser,0,"club");
$lang = mysql_result ($getuser,0,"lang");
$stat = mysql_result ($getuser,0,"history");
}
else {die(include 'finances.php');}

//CONTRACT SIGNED
if (isset($_POST['submit1']) AND $stat==0) {
$check1 = $_POST['checkbox1'];
$spID = $_POST['spid'];
if ($check1=='YES' AND $spID > 0) {
mysql_query("UPDATE sponsors SET history=1 WHERE user_id=$userid AND sponsorid=$spID LIMIT 1") or die(mysql_error());
mysql_query("DELETE FROM sponsors WHERE history=0 AND user_id=$userid") or die(mysql_error());
}
header('Location:sponsors.php');
}

//MEETING OCCURED: new sponsorship offer gained
if (isset($_POST['submit']) AND $stat==0) {
$checkS = $_POST['checkbox'];
$expireC = $_POST['expdat'];
$ligapp = $_POST['ligapp'];
$ligall = $_POST['ligall'];
$ligass = $_POST['ligass'];
$timenC = date("Y-m-d H:i:s");
if ($expireC < $timenC AND $checkS=='YES') {
do {$newspon=rand(1,15);
$klavor = mysql_query("SELECT * FROM sponsors WHERE history=0 AND sponsor=$newspon AND user_id=$userid") or die(mysql_error());
$gnecha = mysql_num_rows($klavor);} while ($gnecha==1); 
$zdaj = date("Y-m-d H:i:s");
$splitdatetime = explode(" ", $zdaj); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$zdajB = date("Y-m-d H:i:s", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday+7,$dbyear));
$draga = mysql_query("SELECT curmoney FROM teams WHERE teamid='$dnak' LIMIT 1");
$dragi = @mysql_result($draga,0,"curmoney");
if ($dragi < 0) {$uha = ((40-$ligapp)/30) * (100*(6-$ligall) + $ligass)/3 + rand(40,120); $stobrok=rand(5,9);}
else {$uha = (40-$ligapp)/30 * (100*(6-$ligall) + $ligass)/3 - ((sqrt($dragi))/48) + rand(40,120); $stobrok=rand(5,10);}
SWITCH ($cheta) {
CASE 1: $uha = $uha * 0.80; break;
CASE 2: $uha = $uha * 0.85; break;
CASE 3: $uha = $uha * 0.90; break;
CASE 4: $uha = $uha * 0.95; break;
CASE 5: $uha = $uha * 1.00; break;
CASE 6: $uha = $uha * 1.04; break;
CASE 7: $uha = $uha * 1.08; break;
CASE 8: $uha = $uha * 1.12; break;
CASE 9: $uha = $uha * 1.15; break;
}
$enobrok = 100*$uha/11;
SWITCH ($stobrok) {
CASE 5: $konc = $enobrok * 450; break;
CASE 6: $konc = $enobrok * 560; break;
CASE 7: $konc = $enobrok * 670; break;
CASE 8: $konc = $enobrok * 780; break;
CASE 9: $konc = $enobrok * 890; break;
CASE 10: $konc = $enobrok * 1000; break;
}
if ($konc < 100000) {$konc=100000;}
$kdni=$stobrok*7;
mysql_query("INSERT INTO sponsors VALUES ('', '$newspon', '$userid', '$konc', '$stobrok', '$kdni', '$zdajB', '0')") or die(mysql_error());
}
header('Location:sponsors.php');
}

include_once('inc/header.php');
require("inc/lang/".$lang.".php");
include_once('inc/osnova.php');
?>

<div id="main">
<?php if ($stat==1) {?><h2>General sponsorship deal</h2><?php } else {?><h2>Sponsorship offers</h2><?php } ?>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="100%">
<?php
//OPTION 1: User has no contract, but offers only
if ($stat==0) {
?>
<table cellspacing="0" cellpadding="0" border="0" width="100%">
<?php
$offerz = mysql_query("SELECT * FROM sponsors WHERE history=0 AND user_id=$userid ORDER BY sponsorid DESC") or die(mysql_error());
while ($o = mysql_fetch_array($offerz)) {
$sponsorid = $o['sponsorid'];
$sponsor = $o['sponsor'];
$totmoney = $o['totalmoney'];
$noofpaym = $o['noofpayments'];
$noofdays = $o['noofdays'];
$expirewhen = $o['offerexpire'];

SWITCH ($sponsor) {
CASE 1: $cname='Basketsim TV'; $cdesc='sports TV channel'; break;
CASE 2: $cname='Board to Death'; $cdesc='surf retail chain'; break;
CASE 3: $cname='BS-Mobile'; $cdesc='mobile phone operator'; break;
CASE 4: $cname='Derry Air'; $cdesc='Irish airliner'; break;
CASE 5: $cname='Don\'t stink'; $cdesc='men\'s cosmetics'; break;
CASE 6: $cname='Dudley Do Drugs'; $cdesc='online pharmacy'; break;
CASE 7: $cname='Dunkstrong'; $cdesc='basketball equipment'; break;
CASE 8: $cname='Eye Caramba'; $cdesc='eye clinic'; break;
CASE 9: $cname='BS-Retards'; $cdesc='cartoons magazine'; break;
CASE 10: $cname='Heisler'; $cdesc='German beer'; break;
CASE 11: $cname='Mike'; $cdesc='sportswear supplier'; break;
CASE 12: $cname='Random Cola'; $cdesc='soft drink'; break;
CASE 13: $cname='Sportacus'; $cdesc='sports shop chain'; break;
CASE 14: $cname='The Family Jewels'; $cdesc='real estate business'; break;
CASE 15: $cname='We cut heads'; $cdesc='barbershop chain'; break;
}
$b++;
if ($b > 1) {echo "<tr><td colspan=\"3\"><hr/></td></tr>";} else {$casa=$expirewhen;}
?>
<tr><td align="left" width="36%"><img src="img/sponsors/<?=$sponsor?>.png" alt="<?=$cname?>" title="<?=$cname?>" height="100"></td>
<td align="left" width="26%">
<b>Company name:</b><br/>
<i>What is it?</i><br/>
<br>
<b>Money offered:</b><br/>
<b>Contract length:</b><br/>
<b>Offer expires on:</b>
</td>
<td align="right" width="38%">
<b><?=stripslashes($cname)?></b><br/>
<i><?=stripslashes($cdesc)?></i><br/>
<br>
<b><?=$noofpaym?> payments, each <?=number_format($totmoney/$noofpaym)?> &euro;</b><br/>
<b><?=$noofdays?> days</b><br/>
<b><?=$expirewhen?></b>
</td>
</tr><tr><td colspan="3" align="right">
<form method="post" action="sponsors.php" style="margin: 0">
<input type="hidden" name="spid" value="<?=$sponsorid?>">
<input style="margin:0; padding:0;" type='checkbox' name='checkbox1' value='YES' />&nbsp;<input type="submit" name="submit1" value="Sign the contract!" class="buttonreg"></form></tr>
<?php }?>
<tr><td colspan="3"><hr/><br/>
<?php
$splitdatetime = explode(" ", $casa); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$prikazcasa = date("Y-m-d H:i", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday-6,$dbyear));
$expireminus = date("Y-m-d H:i:s", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday-6,$dbyear));
$timenow = date("Y-m-d H:i:s");
echo "<b>You don't have to pick any of the offers above, instead you can arrange a meeting with other interested sponsors to get more contract options and perhaps a better one!</b>";
if ($expireminus > $timenow) {echo "<br/><br/><b>You will be able to arrange the next meeting with potential sponsors at ",$prikazcasa,"<br/>";} else {
?><br/>
<form method="post" action="sponsors.php" style="margin: 0">
<input type="hidden" name="ligapp" value="<?=$ligap?>">
<input type="hidden" name="ligall" value="<?=$ligal?>">
<input type="hidden" name="ligass" value="<?=$ligas?>">
<input type="hidden" name="expdat" value="<?=$expireminus?>">
<input style="margin:0; padding:0;" type='checkbox' name='checkbox' value='YES' />&nbsp;<input type="submit" name="submit" value="Attend the meeting with potential sponsors now!" class="buttonreg">
</form>
<?php }?>
</tr>
</table>
<?php
}
//OPTION 2: User has general sponsor signed
elseif ($stat==1) {
$offerC = mysql_query("SELECT * FROM sponsors WHERE history=1 AND user_id=$userid LIMIT 1") or die(mysql_error());
$arp = mysql_fetch_array($offerC);
$sponsor1 = $arp['sponsor'];
$totmoney1 = $arp['totalmoney'];
$noofpaym1 = $arp['noofpayments'];
$noofdays1 = $arp['noofdays'];
SWITCH ($sponsor1) {
CASE 1: $cname='Basketsim TV'; $cdesc='sports TV channel'; break;
CASE 2: $cname='Board to Death'; $cdesc='surf retail chain'; break;
CASE 3: $cname='BS-Mobile'; $cdesc='mobile phone operator'; break;
CASE 4: $cname='Derry Air'; $cdesc='Irish airliner'; break;
CASE 5: $cname='Don\'t stink'; $cdesc='men\'s cosmetics'; break;
CASE 6: $cname='Dudley Do Drugs'; $cdesc='online pharmacy'; break;
CASE 7: $cname='Dunkstrong'; $cdesc='basketball equipment'; break;
CASE 8: $cname='Eye Caramba'; $cdesc='eye clinic'; break;
CASE 9: $cname='BS-Retards'; $cdesc='cartoons magazine'; break;
CASE 10: $cname='Heisler'; $cdesc='German beer'; break;
CASE 11: $cname='Mike'; $cdesc='sportswear supplier'; break;
CASE 12: $cname='Random Cola'; $cdesc='soft drink'; break;
CASE 13: $cname='Sportacus'; $cdesc='sports shop chain'; break;
CASE 14: $cname='The Family Jewels'; $cdesc='real estate business'; break;
CASE 15: $cname='We cut heads'; $cdesc='barbershop chain'; break;
}
$ostanek = $noofdays1 % 7;
$zdaje = date("Y-m-d H:i:s");
$splitdatetime = explode(" ", $zdaje); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$h = mktime(0,0,0,$dbmonth,$dbday+$ostanek,$dbyear);
$w= date("l", $h) ;
$kaka = $noofdays1/$noofpaym1;
if ($kaka==7) {$ostanek=7;}
?>
<h2>Your current general sponsor</h2><br/>
<table cellspacing="0" cellpadding="0" border="0" width="100%">
<tr><td align="left" width="36%"><img src="img/sponsors/<?=$sponsor1?>.png" alt="<?=$cname?>" title="<?=$cname?>" height="100"></td>
<td align="left" width="26%">
<b>Company name:</b><br/>
<i>What is it?</i><br/>
<br>
<b>Full contract value:</b><br/>
<?php if ($ostanek==0 AND $kaka<>7) {echo "<font color=\"orangered\"><b>Next payment:</b></font>";} else {echo "<b>Next payment in:</b>";}?><br/>
<b>Contract expires in:</b>
</td>
<td align="right" width="38%">
<b><?=stripslashes($cname)?></b><br/>
<i><?=stripslashes($cdesc)?></i><br/>
<br>
<b><?=$noofpaym1?> payments, each <?=number_format($totmoney1/$noofpaym1)?> &euro;</b><br/>
<?php if ($ostanek==0 AND $kaka<>7){echo "<font color=\"orangered\"><b>today at 23:59!</b></font>";} else {echo "<b>",$ostanek," days (",$w,")</b>";}?><br/>
<b><?=$noofdays1?> days</b>
</td>
</tr>
<tr>
<td colspan="3"><hr/>
<br/><b>All payouts are a subject of the 10% taxation!</b>
<br/><br/>The general sponsor pay you money on a weekly basis, according to the agreement.
<br/>First payment of the deal is done one week after signing the contract.
<br/>All payments are made on the same day of the week as when the contract was agreed. For example if you've signed contract on Monday, you'll receive your weekly payment every Monday.
<br/>Upon contract expiry, you'll be able to agree on the new sponsorship deal.
<br/><br>[<a href="finances.php">Back to finances page</a>]
</td>
</tr>
</table>
<?php
}
?>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>