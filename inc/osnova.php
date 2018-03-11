<?php
require_once("inc/lang/".$lang.".php");
?>
<div class="gumbi">
<div class="buttons">
<h2><?=$langmark1211?></h2>
<ul>
<li><a href="club.php"><?=$langmark934?></a></li>
<li><a href="players.php"><?=$langmark034?></a></li>
<li><a href="training.php"><?=$langmark257?></a></li>
<li><a href="youth.php"><?=$langmark1212?></a></li>
<li><a href="arena.php"><?=$langmark476?></a></li>
<li><a href="finances.php"><?=$langmark1213?>
<?php
$stha = mysql_query("SELECT COUNT(*) FROM `sponsors` WHERE `history`=0 AND `user_id`='$userid'");
list($jeyu) = mysql_fetch_row($stha);
if ($jeyu >0 AND $expandmenu1<>342) {echo " <font color=\"#DF151A\" style=\"font-size: 12px\">(",$jeyu,")</font>";}
?>
</a></li>
<?php if ($expandmenu1==342){?>
</ul></div></div>
<div class="gumbi1">
<div class="buttons1">
<ul>
<span class="subm"><a href="finances.php"><?=$langmark1213?></a></span>
<span class="subm"><a href="sponsors.php">Sponsors<?php if($jeyu >0){?> <font color="#DF151A" style="font-size: 12px">(<?=$jeyu?>)</font><?php }?></a></span>
</ul></div></div>
<div class="gumbi">
<div class="buttons">
<ul>
<?php }?>
<li><a href="staff1.php"><?=$langmark1214?></a></li>
</ul>
<h2><?=$langmark1215?></h2>
<ul>
<li><a href="matches.php"><?=$langmark043?></a></li>
<li><a href="friendly.php"><?=$langmark320?>
<?php
$toda = date("l");
if ($toda<>'Tuesday' AND $toda<>'Wednesday') {
$poizvedb = mysql_query("SELECT COUNT(*) FROM `friendly` WHERE `received_user`='$userid'");
list($stchal) = mysql_fetch_row($poizvedb);
if ($stchal >0) {echo " <font color=\"#DF151A\" style=\"font-size: 12px\">(",$stchal,")</font>";}
}
?>
</a></li>
<li><a href="league.php"><?=$langmark045?></a></li>
<?php if ($expandmenu1==499){?>
</ul></div></div>
<div class="gumbi1">
<div class="buttons1">
<ul>
<span class="subm"><a href="league.php"><?=$langmark045?></a></span>
<span class="subm"><a href="clubrank.php">Team ranking</a></span>
</ul></div></div>
<div class="gumbi">
<div class="buttons">
<ul>
<?php }?>
<li><a href="multiview.php"><?=$langmark1216?></a></li>
<li><a href="threepointers.php"><?=$langmark1217?></a></li>
<li><a href="cs.php">International</a></li>
<?php if ($expandmenu1==99){?>
</ul></div></div>
<div class="gumbi1">
<div class="buttons1">
<ul>
<span class="subm"><a href="cs.php">Champions Series</a></span>
<span class="subm"><a href="cws.php">Cup Winners Series</a></span>
<span class="subm"><a href="fairplaycup.php">Fair Play Cup</a></span>
<span class="subm"><a href="intclubrank.php">Clubs ranking</a></span>
<span class="subm"><a href="intrank.php">Countries rank</a></span>
<span class="subm"><a href="ycwc.php">Youth Club WC</a></span>
</ul></div></div>
<div class="gumbi">
<div class="buttons">
<ul>
<?php }?>
<li><a href="nationalteams.php">World Cup</a></li>
</ul>
<?php if ($coexpand==14){?>
</ul></div></div>
<div class="gumbi1">
<div class="buttons1">
<ul>
<span class="subm"><a href="nationalteams.php">World Cup</a></span>
<span class="subm"><a href="u18teams.php">U19 World Cup</a></span>
<span class="subm"><a href="bsfantasy.php">WC Fantasy game</a></span>
</ul></div></div>
<div class="gumbi">
<div class="buttons">
<?php }?>
<h2><?=$langmark1218?></h2>
<ul>
<?php
$poizvedba = mysql_query("SELECT COUNT(*) FROM `messages` WHERE `read` =0 AND `to_id`='$userid'");
list($stmsg) = mysql_fetch_row($poizvedba);
if ($stmsg >0 AND $lang<>'isr') {echo "<li><a href=\"messages.php\">",$langmark343," <font color=\"#DF151A\" style=\"font-size: 12px\">(",$stmsg,")</font>";}
elseif ($stmsg >0 AND $lang=='isr') {echo "<li><a href=\"messages.php\"><font color=\"#DF151A\" style=\"font-size: 12px\">(",$stmsg,")</font> ",$langmark343;}
else {echo "<li><a href=\"messages.php\">",$langmark343;}
?>
</a></li>
<li><a href="indexconf.php"><?=$langmark1219?></a></li>
<li><a href="search.php"><?=$langmark1220?></a></li>
<li><a href="transfermarket.php"><?=$langmark1221?></a></li>
<?php if($expandmenu1==917){?>
</ul></div></div>
<div class="gumbi1">
<div class="buttons1">
<ul>
<span class="subm"><a href="transfermarket.php?action=buyouth">Buy youth</a></span>
<span class="subm"><a href="transfermarket.php?action=topdraft">Draft</a></span>
</ul></div></div>
<div class="gumbi">
<div class="buttons">
<ul>
<?php
}
if ($supo==1 || $moderator>1) {echo "<li><a href=\"bookmarks.php\">",$langmark868,"</a></li>";}
if ($supo<>1) {echo "<li><a href=\"supporter.php\">",$langmark1222,"</a></li>";}
?>
<li><a href="gamerules.php"><?=$langmark1223?></a></li>
<?php
if (($moderator==3) && ($userid=='1' || $userid=='36' ||$userid=='850'||$userid=='2590' || $userid=='3147' || $userid=='5402' || $userid=='9119')) {echo "<li><a href=\"gmpages.php\">GM Pages</a></li>";}
?>
</ul></div></div>
<hr/>
<center>
<?php
if ($whichcss==1 || $whichcss==2 || $whichcss==7) {$imgm1='gumb1c.jpg';$imgm2='gumb2c.jpg';$imgm3='gumb3c.jpg';}
elseif ($whichcss==4) {$imgm1='gumb1g.jpg';$imgm2='gumb2g.jpg';$imgm3='gumb3g.jpg';}
else {$imgm1='gumb1.jpg';$imgm2='gumb2.jpg';$imgm3='gumb3.jpg';}
?>
<a href="index.php"><img src="../img/<?=$imgm1?>" alt="home" title="home" border="0"></a>&nbsp;&nbsp;
<a href="profile.php"><img src="../img/m_profile.png" alt="profile" title="profile" border="0" height="21"></a>&nbsp;&nbsp;
<?php
if ($supo==1 || $moderator>1) {echo "<a href=\"notepad.php\"><img src=\"../img/m_notepad.gif\" alt=\"notepad\" title=\"notepad\" height=\"21\" border=\"0\">";}
?></a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="logout.php"><img src="../img/exit.jpg" alt="logoff" title="logoff" border="0"></a>
</center>

</div>
<div id="right">
   <div style="margin-bottom:15px">
    <script type="text/javascript" src="http://ap.lijit.com/www/delivery/fpi.js?z=283719&u=Basketsim&width=300&height=250"></script>
   </div>
   <div style="margin-bottom:15px">
    <script type="text/javascript" src="http://ap.lijit.com/www/delivery/fpi.js?z=283720&u=Basketsim&width=300&height=250"></script>
   </div>

   <div class="fb-page" data-href="https://www.facebook.com/pages/Basketsim/308116441660" data-width="300" data-height="225" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/pages/Basketsim/308116441660"><a href="https://www.facebook.com/pages/Basketsim/308116441660">Basketsim</a></blockquote></div></div>
</div>
<div id="content">