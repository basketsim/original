<?php
$compar = @mysql_query("SELECT supporter, club, level, lang, name, country, look FROM teams, users WHERE users.club=teams.teamid AND password='$koda' AND userid='$userid' LIMIT 1");
$supo = @mysql_result($compar,0,"supporter");
$idja = @mysql_result($compar,0,"club");
$moderator = @mysql_result ($compar,0,"level");
$lang = @mysql_result ($compar,0,"lang");
$nama = @mysql_result($compar,0,"name");
$drza = @mysql_result($compar,0,"country");
$whichcss = @mysql_result($compar,0,"look");
if (!$_COOKIE['ligaa'] OR !$_COOKIE['ligal'] OR !$_COOKIE['ligan'] OR !$_COOKIE['ligas'] OR !$_COOKIE['ligap']) {
$is_ime = @mysql_query("SELECT leagues.leagueid as lid, `leagues`.`level` AS lleva, leagues.name as lena, `leagues`.`strength` as dvakar, competition.position as cop FROM leagues, competition WHERE leagues.leagueid=competition.leagueid AND competition.teamid='$idja' AND competition.season='$default_season' LIMIT 1");
setcookie("ligaa", "", time()-3600, "/", ".basketsim.com", 0);
setcookie("ligal", "", time()-3600, "/", ".basketsim.com", 0);
setcookie("ligan", "", time()-3600, "/", ".basketsim.com", 0);
setcookie("ligas", "", time()-3600, "/", ".basketsim.com", 0);
setcookie("ligap", "", time()-3600, "/", ".basketsim.com", 0);
$ligaa = @mysql_result($is_ime,0,"lid"); setcookie("ligaa", "$ligaa", time()+3600, "/", ".basketsim.com", 0);
$ligal = @mysql_result($is_ime,0,"lleva"); setcookie("ligal", "$ligal", time()+3600, "/", ".basketsim.com", 0);
$ligan = @mysql_result($is_ime,0,"lena"); setcookie("ligan", "$ligan", time()+3600, "/", ".basketsim.com", 0);
$ligas = @mysql_result($is_ime,0,"dvakar"); setcookie("ligas", "$ligas", time()+3600, "/", ".basketsim.com", 0);
$ligap = @mysql_result($is_ime,0,"cop"); setcookie("ligap", "$ligap", time()+3600, "/", ".basketsim.com", 0);
}
else {
$ligaa = $_COOKIE['ligaa'];
$ligal = $_COOKIE['ligal'];
$ligan = $_COOKIE['ligan'];
$ligas = $_COOKIE['ligas'];
$ligap = $_COOKIE['ligap'];
}
if ($frejmi==11) {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<?php
} else {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
}
?>
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<?php
if (strlen($zaheader)>0) {echo "<title>",$zaheader," - Basketsim</title>";} else {echo "<title>Basketsim - online basketball manager game</title>";}

if ($refresh == 1798) {?>
<META HTTP-EQUIV="Refresh" CONTENT="30" charset=UTF-8>
<?php } elseif ($refresh==179) {?>
<META HTTP-EQUIV="Refresh" CONTENT="2" charset=UTF-8>
<?php } else {?>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name=viewport content="width=device-width, initial-scale=1">
<?php
}
//user is online update
$timen = date('Y-m-d H:i:s', strtotime('+5 minutes'));
$groznRA=rand(1,4); if ($groznRA==3) {@mysql_query("UPDATE users SET is_online=1, last_active='$timen' WHERE password = '$koda' AND userid='$userid' LIMIT 1");}
/*
$is_ime = @mysql_query("SELECT leagues.leagueid, `leagues`.`level` AS lleva, leagues.name, `leagues`.`strength` as dvakar, competition.position FROM leagues, competition WHERE leagues.leagueid=competition.leagueid AND competition.teamid='$idja' AND competition.season=$default_season LIMIT 1");
$ligaa = @mysql_result($is_ime,0,"leagues.leagueid");
$ligal = @mysql_result($is_ime,0,"lleva");
$ligan = @mysql_result($is_ime,0,"leagues.name");
$ligas = @mysql_result($is_ime,0,"dvakar");
$ligap = @mysql_result($is_ime,0,"competition.position");
*/
?>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<?php if ($whichcss==1) {?><link rel="stylesheet" href="style1.css">
<?php } elseif ($whichcss==2) {?><link rel="stylesheet" href="style2.css">
<?php } elseif ($whichcss==3) {?><link rel="stylesheet" href="style3.css">
<?php } elseif ($whichcss==4) {?><link rel="stylesheet" href="style4.css">
<?php } elseif ($whichcss==5) {?><link rel="stylesheet" href="style5.css">
<?php } elseif ($whichcss==6) {?><link rel="stylesheet" href="style6.css">
<?php } elseif ($whichcss==7) {?><link rel="stylesheet" href="style7.css?rand=121212">
<?php } else {?><link rel="stylesheet" href="style.css"><?php }?>
<script language="javascript" src="js.js">
</script>
<?php
include 'inc/servertime.php';
$st = new servertime;
#$st->lang = 'eng';
$st->shortmonth = true;
$st->InstallClockHead();
?>
<script language=javascript>
function verify(){
msg = "Are you sure you'd like to fund a local college? Money will be transfered to them immediately!"
return confirm(msg);}
</script>
<!-- msg limitation -->
<script language="javascript" type="text/javascript">
function limitText(limitField, limitCount, limitNum) {if (limitField.value.length > limitNum) {limitField.value = limitField.value.substring(0, limitNum);} else {limitCount.value = limitNum - limitField.value.length;}
}
</script>
<!-- commas in sale player form -->
<SCRIPT LANGUAGE="JavaScript">
function commaSplit(srcNumber) {
var txtNumber = '' + srcNumber;
if (isNaN(txtNumber) || txtNumber == "" || txtNumber < 0) {
alert("Enter a valid price first and then check it!");
fieldName.select();
fieldName.focus();
}
else {
var rxSplit = new RegExp('([0-9])([0-9][0-9][0-9][.,])');
var arrNumber = txtNumber.split(',');
arrNumber[0] += ',';
do {
arrNumber[0] = arrNumber[0].replace(rxSplit, '$1.$2');
} while (rxSplit.test(arrNumber[0]));
if (arrNumber.length > 1) {
return arrNumber.join('');
}
else {
return arrNumber[0].split(',')[0];
      }
   }
}
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60442811-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '461041720725779',
      xfbml      : true,
      version    : 'v2.3'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<div id="container">
<div id="banner">
<?php if (false) {?>
<table cellspacing="0" cellpadding="0" border="0" width="100%" height="95%" bgcolor="#990000" style ='margin-bottom:5px'>
<tr>
<td width="100%" height="60" valign="top">
<a href="index.php"><img src="img/header/header_01.png" border="0" alt=""></a>
</td>
<td width="468" height="100%" valign="middle" align="center">
<!-- <script type="text/javascript">
google_ad_client = "pub-9708116335383093";
/* 468x60, created 23/04/09 */
google_ad_slot = "8865111565";
google_ad_width = 468;
google_ad_height = 60;
</script> -->
<!-- <script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script> -->
</td>
</tr>
</table>
<?php } else {?>
<table cellspacing="0" cellpadding="0" border="0" width="100%" height="95%" bgcolor="#990000" style ='margin-bottom:5px'>
<tr>
<td width="100%" height="60" valign="top" style="background:url(img/header/header_02.png) top repeat-x">
<a href="index.php" style="float:left"><img src="img/header/header_01.png" border="0" alt=""></a>
<div style="width:468px; height:60px; float:left; margin-left:71px">
<!-- <script type="text/javascript"> -->
<!-- /* Copacet.com Premium */
google_ad_client = "ca-pub-6571357433542418";
google_ad_slot = "8532930881/7658048418";
google_ad_width = 468;
google_ad_height = 60;
//-->
<!-- </script> -->
<!-- <script type="text/javascript"src="//pagead2.googlesyndication.com/pagead/show_ads.js"></script> -->
<!-- Project Wonderful Ad Box Loader -->
<script type="text/javascript">
   (function(){function pw_load(){
      if(arguments.callee.z)return;else arguments.callee.z=true;
      var d=document;var s=d.createElement('script');
      var x=d.getElementsByTagName('script')[0];
      s.type='text/javascript';s.async=true;
      s.src='//www.projectwonderful.com/pwa.js';
      x.parentNode.insertBefore(s,x);}
   if (window.attachEvent){
    window.attachEvent('DOMContentLoaded',pw_load);
    window.attachEvent('onload',pw_load);}
   else{
    window.addEventListener('DOMContentLoaded',pw_load,false);
    window.addEventListener('load',pw_load,false);}})();
</script>
<!-- End Project Wonderful Ad Box Loader -->

<!-- Project Wonderful Ad Box Code -->
<div id="pw_adbox_76134_1_0"></div>
<script type="text/javascript"></script>
<noscript><map name="admap76134" id="admap76134"><area href="http://www.projectwonderful.com/out_nojs.php?r=0&c=0&id=76134&type=1" shape="rect" coords="0,0,468,60" title="" alt="" target="_blank" /></map>
<table cellpadding="0" cellspacing="0" style="width:468px;border-style:none;background-color:;"><tr><td><img src="http://www.projectwonderful.com/nojs.php?id=76134&type=1" style="width:468px;height:60px;border-style:none;" usemap="#admap76134" alt="" /></td></tr></table>
</noscript>
<!-- End Project Wonderful Ad Box Code -->
</div>
</td>
<td width="468" height="100%" valign="middle" align="center">
<img src="img/header/header_04.png" border="0" alt="Basketsim">
</td>
</tr>
</table>
<?php }?>
<table width="100%" cellspacing="0" cellpadding="0" border="0"><tr>
<td class="mega">
<a href="club.php?clubid=<?=$uporabnik?>"><nobr><?=stripslashes($nama)?></nobr></a><br/><a href="leagues.php?leagueid=<?=$ligaa?>"><?=stripslashes($ligan)?></a>, <a href="league.php?country=<?=$drza?>"><?php if ($drza<>'Bosnia') {echo $drza;} else {echo "Bosnia and Herzegovina";}?></a></td>
<td align="center" class="mega">
Selling players has been disabled to avoid market crash during downtime.<br>
Friendly matches are unfortuntaly not available due to current dates structure and dependencies. <br>
For further updates regarding v2, the news page and the facebook page are he official channels that can be followed.
<!-- Draft has been cancelled. All teams that signed up will receive a refund at the start of new season. Sorry for the inconvenience. -->
</td>
<td align="right" class="mega">
<?php
$nuofuon = @mysql_query("SELECT online FROM online");
$ston = @mysql_result($nuofuon,0);
/*
SELECT * FROM `matches` WHERE `time` > '2013-07-27 03:00:00' AND time < '2013-07-29 03:00:00' AND season =19 AND TYPE =1 AND `hpg_rating` + `hsg_rating` + `hsf_rating` + `hpf_rating` + `hc_rating` + `apg_rating` + `asg_rating` + `asf_rating` + `apf_rating` + `ac_rating` >3370
SELECT * FROM `matches` WHERE `time` > '2013-07-27 03:00:00' AND time < '2013-07-29 03:00:00' AND season =19 AND TYPE =1 AND crowd1 + crowd2 + crowd3 + crowd4 > 42399
SELECT * FROM `matches` WHERE `time` > '2013-07-27 03:00:00' AND time < '2013-07-29 03:00:00' AND season =19 AND TYPE =1 AND home_score + away_score > 210
SELECT * FROM matches, statistics WHERE time > '2013-07-27 03:00:00' AND time < '2013-07-29 03:00:00' AND matches.season =19 AND matches.TYPE =1 AND matchid = `match` AND one_scored + two_scored *2 + three_scored *3 >50
SELECT * FROM matches, statistics WHERE time > '2013-07-27 03:00:00' AND time < '2013-07-29 03:00:00' AND matches.season =19 AND matches.TYPE =1 AND matchid = `match` AND ( 2 * two_scored + one_scored +3 * three_scored + def_rebounds + off_rebounds + assists + steals + blocks - turnovers - two_total + two_scored - three_total + three_scored - one_total + one_scored ) < 5000 and ( 2 * two_scored + one_scored +3 * three_scored + def_rebounds + off_rebounds + assists + steals + blocks - turnovers - two_total + two_scored - three_total + three_scored - one_total + one_scored ) > 60

$past_active = date('Y-m-d H:i:s');
$splitdatetime = explode(" ", $past_active); $aadate = $splitdatetime[0]; $aatime = $splitdatetime[1];
$splitdate = explode("-", $aadate); $aayear = $splitdate[0]; $aamonth = $splitdate[1]; $aaday = $splitdate[2];
$splittime = explode(":", $aatime); $aahour = $splittime[0]; $aamin = $splittime[1]; $aasec = $splittime[2];
$expireminus = date('Y-m-d H:i:s', mktime($aahour,$aamin-35,$aasec,$aamonth,$aaday,$aayear));
$online = mysql_query("SELECT COUNT(*) FROM users WHERE last_active > '$expireminus' AND is_online=1") or die(mysql_error());
list($ston) = mysql_fetch_row($online);
*/
if ($langmark042=='') {$langmark042='online';}
echo "<a href=\"whosonline.php\">",$ston,"&nbsp;",$langmark042,"</a>&nbsp;|&nbsp;<a href=\"stats.php\">Statistics</a>";
$st->InstallClock();
echo ' ';
$st->InstallClockBody();
?>
</td>
</tr>
</table>
<script type="text/javascript">
    var shouldClear = false;
    var interval = setInterval(function() {
        try {
          if (document.getElementsByTagName('td')[1].children[0].children[0].alt === 'Basketsim Goodies') {
            //document.getElementsByTagName('tr')[0].removeChild(document.getElementsByTagName('tr')[0].childNodes[2])
            document.getElementsByTagName('tr')[0].children[0].width = '100%';
            shouldClear = true;
          }
        }
        catch(e) {

        }
        if (shouldClear) {
          clearInterval(interval);
          clearTimeout(timeout);
        }
    }, 100);
    var timeout = setTimeout(function(){
      clearInterval(interval);
    }, 3000);

</script>
</div>
<div id="left">
