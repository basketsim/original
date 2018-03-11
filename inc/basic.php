<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta property="og:title" content="Basketsim" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://www.basketsim.com" />
<meta property="og:image" content="http://basketsim.com/img/BSlogoM.png" />
<meta property="og:site_name" content="Basketsim - online basketball manager" />
<link rel="stylesheet" href="./styleF.css">
<title>Basketsim - online basketball manager game</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="description" content="Play Online Basketball Manager Game for Free at Basketsim.com. Register for free and enjoy the fun of basketball browser game challenge.">
<meta name="keywords" content="basketball, manager, online, game, free, simulation, strategy, games, dunking, fun, basketball, manager, online, game, free, simulation, strategy, games, dunking, fun, basketball, manager, online, game, free, simulation, strategy, games, dunking, fun, basketball, manager, online, game, free, simulation, strategy, games, dunking, fun">
<meta name="author" content="Basketsim">
<meta name="google-site-verification" content="YTenYA58zm9JsZ_00eNg2zAAjuVu0vs0ALSr8T9a9M0" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<script language="javascript" src="js.js"></script>

<script>
//za select regij
function dynamicSelect(id1, id2) {
     if (document.getElementById && document.getElementsByTagName) {
         var sel1 = document.getElementById(id1);
         var sel2 = document.getElementById(id2);
         var clone = sel2.cloneNode(true);
         var clonedOptions = clone.getElementsByTagName("option");
         refreshDynamicSelectOptions(sel1, sel2, clonedOptions);
         sel1.onchange = function() {
             refreshDynamicSelectOptions(sel1, sel2, clonedOptions);
         };
     }
 }
 function refreshDynamicSelectOptions(sel1, sel2, clonedOptions) {
     while (sel2.options.length) {
         sel2.remove(0);
     }
     var pattern1 = /( |^)(select)( |$)/;
     var pattern2 = new RegExp("( |^)(" +
        sel1.options[sel1.selectedIndex].value + ")( |$)");
     for (var i = 0; i < clonedOptions.length; i++) {
         if (clonedOptions[i].className.match(pattern1) ||
            clonedOptions[i].className.match(pattern2)) {
             sel2.appendChild(clonedOptions[i].cloneNode(true));
         }
     }
 }
 window.onload = function() {
     dynamicSelect("pda-brand", "pda-type");
 }
</script>
<?php
include_once("inc/servertime.php");
$st = new servertime;
#$st->lang = 'eng';
$st->shortmonth = true;
$st->InstallClockHead();
?>
</head>
<body>
<div id="container">
<div id="banner">
<table cellspacing="0" cellpadding="0" border="0" width="100%" height="95%" bgcolor="#990000"><tr>
<td width="100%" height="60" valign="top" style="background:url(img/header/header_02.png) top repeat-x"><img src="img/header/header_01.png" border="0" alt=""></td>
<td width="468" height="100%" valign="middle" align="center"><img src="img/header/header_04.png" border="0" alt=""></td>
</tr></table>
<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tr><td class="mega" valign="bottom" halign="bottom">
<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
  {parsetags: 'explicit'}
</script>
<g:plusone size="medium" href="http://www.basketsim.com/"></g:plusone>
<script type="text/javascript">gapi.plusone.go();</script>
<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.basketsim.com%2F&amp;send=false&amp;layout=button_count&amp;width=150&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font=tahoma&amp;height=20" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:150px; height:20px;" allowTransparency="true"></iframe>
</td>
<td align="right" class="mega">
<?php
/*
$st->InstallClock();
echo ' ';
$st->InstallClockBody();
*/
echo "21476 teams, 64 countries";
?>
</td></tr>
</table>
</div>
<div id="left">
<h2>Menu</h2>
<div id="navcontainer">
<ul id="navlist">
<li><a href="index.php" class="greenhilite"><b>Home</b></a></li>
<li><a href="join.php" class="greenhilite"><b>Register</b></a></li>
<li><a href="gamerules.php" class="greenhilite"><b>About</b></a></li>
<li><a href="contact.php" class="greenhilite"><b>Contact</b></a></li>
</ul>
</div>
<h2>Members</h2>
<form action="../login.php" method="post" style="margin: 0">
<b>Login:</b><br/><input type="text" name="username" size="12"><br>
<b>Password:</b><br/><input type="password" name="password" size="12"><br/>
<input type="hidden" name="submit" value="submit">
<input type="image" src="img/cooltext635592390.png" onmouseover="this.src='img/cooltext635592390MouseOver.png';" onmouseout="this.src='img/cooltext635592390.png';" style="margin: 0px; padding: 0px; background-color:#f5dd93;" alt="LOGIN" />
</form>
<a href="forgotpass.php" class="greenhilite"><b>Forgot password?</b></a>
</div>
<div id="content">