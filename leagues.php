<?php
$leagueid=$_GET["leagueid"];
if (!is_numeric($leagueid)) {die(include 'index.php');}

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$sezonca = $_GET["season"];
if ((!is_numeric($sezonca)) OR ($sezonca < 0) OR ($sezonca > $default_season)) {$sezonca=$default_season;}

$compare = mysql_query("SELECT club, supporter, level, lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)==1) {
$trueclub = mysql_result ($compare,0,"club");
$is_supporter = mysql_result ($compare,0,"supporter");
$levell = mysql_result ($compare,0,"level");
$lang = mysql_result ($compare,0,"lang");
}
else {die(include 'basketsim.php');}

//liga
$liga = mysql_query("SELECT leagues.leagueid, name, country, level, strength FROM leagues, competition WHERE competition.leagueid = leagues.leagueid && season ='$sezonca' && leagues.leagueid ='$leagueid' LIMIT 1");
if (mysql_num_rows($liga) < 1) {die(include 'index.php');}
while($r=mysql_fetch_array($liga))
{	
$leagueid=$r['leagueid'];
$name=$r['name'];
$country=$r['country'];
$level=$r['level'];
$strvred=$r['strength'];
}
$lowliga = mysql_query("SELECT level FROM leagues WHERE active=1 AND country ='$country' ORDER BY level DESC LIMIT 1");
$jelowliga = mysql_result($lowliga,0);

$action=$_GET['action'];
if ($action=='preview' AND $is_supporter==0) {die(include 'supporter.php');}
if ($action=='bookmark' && ($is_supporter==1 || $levell >1)) {
$already = mysql_query("SELECT * FROM bookmarks WHERE b_type =4 AND b_link ='$leagueid' AND team ='$trueclub' LIMIT 1") or die(mysql_error());
if (!mysql_num_rows($already)) {mysql_query("INSERT INTO bookmarks VALUES ('', $trueclub, '$name', $leagueid, 4, 0);") or die(mysql_error());}
header('Location: bookmarks.php');
}

if ($country=='Austria') {$countryshort='AUT';}
elseif ($country=='Bosnia') {$countryshort='BIH';}
elseif ($country=='China') {$countryshort='CHN';}
elseif ($country=='Belarus') {$countryshort='BLR';}
elseif ($country=='FYR Macedonia') {$countryshort='MKD';}
elseif ($country=='Hong Kong') {$countryshort='HKG';}
elseif ($country=='Indonesia') {$countryshort='INA';}
elseif ($country=='Ireland') {$countryshort='IRL';}
elseif ($country=='Japan') {$countryshort='JPN';}
elseif ($country=='Lithuania') {$countryshort='LTU';}
elseif ($country=='Malaysia') {$countryshort='MAS';}
elseif ($country=='Malta') {$countryshort='MLT';}
elseif ($country=='Montenegro') {$countryshort='MNE';}
elseif ($country=='Netherlands') {$countryshort='NED';}
elseif ($country=='New Zealand') {$countryshort='NZL';}
elseif ($country=='Puerto Rico') {$countryshort='PRI';}
elseif ($country=='Romania') {$countryshort='ROU';}
elseif ($country=='Switzerland') {$countryshort='SUI';}
elseif ($country=='Serbia') {$countryshort='SRB';}
elseif ($country=='Slovakia') {$countryshort='SVK';}
elseif ($country=='South Korea') {$countryshort='KOR';}
elseif ($country=='United Kingdom') {$countryshort='UK';}
else {$countryshort = strtoupper(substr($country,0,3));}

//leagueboards
$firstcheck = mysql_query("SELECT type, read_time FROM lb_user_read WHERE leagueid ='$leagueid' AND user ='$userid'") or die(mysql_error());
while ($fe = mysql_fetch_array($firstcheck)) {
$temalb = $fe["type"];
$readtime = $fe["read_time"];
$prever = mysql_query("SELECT * FROM lb_comments WHERE type ='$temalb' AND league ='$leagueid' AND time > '$readtime'");
if (mysql_num_rows($prever) >0) {$new='yes';}
}
if ($new<>'yes') {
$najprej = mysql_query("SELECT id FROM lb_comments WHERE league ='$leagueid' LIMIT 1");
if (mysql_num_rows($najprej)>0 && mysql_num_rows($firstcheck)==0) {$new='yes';}
}

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">
<h2><?=$langmark166?></h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff" width="100%">
<td class="border" colspan="2">

<table border="0" cellspacing="0" cellpadding="0"><tr><td align="left" valign="bottom">
<h3><font style="background-color:#d0e0eb;"><b><?=$name?></b></font>&nbsp;<small>(<?=$countryshort?>, <a href="leaguestrength.php" title="League strength"><?=$strvred?></a>)</small>
<?php
if ($is_supporter==1 || $levell >1){echo "<a href=\"leagues.php?leagueid=",$leagueid,"&action=bookmark\"><img src=\"img/bookmark.jpg\" alt=\"",$langmark233,"\" title=\"",$langmark233,"\" border=\"0\" width=\"20\" height=\"14\"></a>&nbsp;";}
if ($action=='fixtures'){?><a href="leagues.php?leagueid=<?=$leagueid?>"><img src="img/fix1.gif" alt="<?=$langmark176?>" title="<?=$langmark176?>" border="0"></a><?php }
if ($action<>'fixtures'){?><a href="leagues.php?leagueid=<?=$leagueid?>&action=fixtures"><img src="img/fixture.jpg" alt="<?=$langmark739?>" title="<?=$langmark739?>" border="0" height="18"></a><?php }
?>
&nbsp;<a href="leaguestats.php?leagueid=<?=$leagueid?>"><img src="img/leaguestats.gif" alt="<?=$langmark232?>" title="<?=$langmark232?>" border="0" height="18"></a>
<a href="mvp.php?league_id=<?=$leagueid?>"><img src="img/mvp.gif" alt="MVP" title="MVP" border="0" height="16"></a>
<?php if ($is_supporter==1) {?><a href="leaguehistory.php?leagueid=<?=$leagueid?>"><img src="img/history.gif" alt="History" title="History" border="0" height="16"></a><?php }?>
<?php if($new=='yes'){?></h3></td><td>&nbsp;<a href="leagueboard.php?leagueid=<?=$leagueid?>" title="Leagueboard"><font style="color:#8B0000";>unread messages</font></a>
<?php } else {
if ($is_supporter==1) {echo "&nbsp;";}?><a href="leagueboard.php?leagueid=<?=$leagueid?>"><img src="img/lb1.gif" alt="Leagueboard" title="Leagueboard" border="0" height="16"></a></h3></td><td align="right"><?php }?></td></tr></table>
<?php
//ekipe
$ligasi = mysql_query("SELECT teamid, curname, position, played, win, lose, for_, against, difference, lastpos FROM competition WHERE season='$sezonca' AND leagueid='$leagueid' ORDER BY win DESC, difference DESC, for_ DESC, position ASC LIMIT 14");
$i=0;
$id_yn=0;
while ($i < 14) {
$teamid=mysql_result($ligasi,$i,"teamid");
$curname=mysql_result($ligasi,$i,"curname");
$curpos=mysql_result($ligasi,$i,"position");
$played=mysql_result($ligasi,$i,"played");
$win=mysql_result($ligasi,$i,"win");
$lose=mysql_result($ligasi,$i,"lose");
$for=mysql_result($ligasi,$i,"for_");
$against=mysql_result($ligasi,$i,"against");
$difference=mysql_result($ligasi,$i,"difference");
$laspos=mysql_result($ligasi,$i,"lastpos");

$statusje=3; $hown='';
$jadg = mysql_query("SELECT username, userid, last_active, is_online FROM teams, users WHERE teamid=club AND club=$teamid LIMIT 1");
if (mysql_num_rows($jadg)) {
$statusje=1;
$hown=mysql_result($jadg,0,"username");
$clink=mysql_result($jadg,0,"userid");
$last_active=mysql_result($jadg,0,"last_active");
$id_yn=mysql_result($jadg,0,"is_online");
$splitdatetime_ = explode(" ", $last_active); $dbdate_ = $splitdatetime_[0]; $dbtime_ = $splitdatetime_[1];
$splitdate_ = explode("-", $dbdate_); $dbyear_ = $splitdate_[0]; $dbmonth_ = $splitdate_[1]; $dbday_ = $splitdate_[2];
$splittime_ = explode(":", $dbtime_); $dbhour_ = $splittime_[0]; $dbmin_ = $splittime_[1]; $dbsec_ = $splittime_[2];
$expireminus = date("Y-m-d H:i:s", mktime($dbhour_,$dbmin_+35,$dbsec_,$dbmonth_,$dbday_,$dbyear_));
$timenow = date("Y-m-d H:i:s");
if ($timenow > $expireminus) {$id_yn=0;}
}
else {$id_yn=0;}

$points = $win*2 + $lose;
$posi = $i+1;
if($win+$lose==0){$uspoints='-';} else {$uspoints = round(($win/($win+$lose))*100,1);}

if ($i==0){
?>
<table width="100%" cellspacing="0" cellpadding="1" border="0">
<tr>
<td width="30" colspan="2"><?php
//left, right
if ($name=="2.1" OR $name=="3.1" OR $name==="4.1" OR $name==="5.1") {$gump=$leagueid+1; echo "&nbsp;<a href=\"leagues.php?leagueid=",$gump,"\" class=\"greenhilite\" title=\"",$langmark1079,"\"><b>&raquo;</b></a>";}
elseif ($name=="3.9" OR $name=="4.27" OR $name=="5.81") {$gump=$leagueid-1; echo "&nbsp;<a href=\"leagues.php?leagueid=",$gump,"\" class=\"greenhilite\" title=\"",$langmark1078,"\"><b>&laquo;</b></a>";}
elseif ($level<>1) {$g1=$leagueid-1; $g2=$leagueid+1; echo "&nbsp;<a href=\"leagues.php?leagueid=",$g1,"\" class=\"greenhilite\" title=\"",$langmark1078,"\"><b>&laquo;</b></a> <a href=\"leagues.php?leagueid=",$g2,"\" class=\"greenhilite\" title=\"",$langmark1079,"\"><b>&raquo;</b></a>";}
?></td>
<td width="238"></td>
<td align="center"><b><span title="Won - Lost"><?=$langmark171?></span></b></td>
<?php
/*
if($country=='USA' OR $country=='Canada' OR $country=='China' OR $country=='Hong Kong' OR $country=='Mexico' OR $country=='Argentina' OR $country=='Chile' OR $country=='Brazil' OR $country=='Uruguay' OR $country=='Peru' OR $country=='Colombia' OR $country=='Venezuela' OR $country=='Australia' OR $country=='New Zealand' OR $country=='South Korea'){?>
<td align="center"><b><span title="Win percentage">%</span></b></td>
<?php }else{?>
<td align="center"><b><span title="Points"><?=$langmark174?></span></b></td>
<?php }
*/
?>
<td align="center"><b><span title="Points scored by a team">+</span></b></td>
<td align="center"><b><span title="Points scored against a team">-</span></b></td>
<td align="center"><b><span title="Point difference">+/-</span></b></td>
<td align="center" width="95"><b><span title="Team owner">Manager</span></b></td>
<td width="3">&nbsp;</td>
</tr>
<?php
}
$bla = "<a href=\"club.php?clubid=".$clink."\">";
?>
<?php if ($curpos==1 AND $played==26) {?><tr bgcolor="#d0e0eb"><?php } else {echo "<tr>";}?>
<td align="right" width="10"><span title="Team place"><?=$posi?></span></td><td align="center" width="20">
<?php if (($curpos < $laspos) AND $played>1){?><img src="img/pos_up.png" border="0"  alt="up" title="Up from <?=$laspos?>. place">
<?php } elseif (($curpos > $laspos) AND $played>1){?><img src="img/pos_down.png" border="0"  alt="down" title="Down from <?=$laspos?>. place"><?php }
else {?><img src="img/narrowa.png" border="0"  alt="==" title="No change"><?php }?>
</td>
<?php if ($statusje<>3) {
echo "<td width=\"238\">",$bla,"",stripslashes($curname),"</a>";
if ($curpos==1 AND $played==26 AND $level==1) {echo " <img src=\"img/league1.png\" height=\"15\" valign=\"bottom\" style=\"bottom: 0; padding: 0; margin: 0; border: 0; vertical-align: bottom;\">";}
if ($curpos==1 AND $played==26 AND $level==2) {echo " <img src=\"img/league2.png\" height=\"15\" valign=\"bottom\" style=\"bottom: 0; padding: 0; margin: 0; border: 0; vertical-align: bottom;\">";}
if ($curpos==1 AND $played==26 AND $level==3) {echo " <img src=\"img/league3.png\" height=\"15\" valign=\"bottom\" style=\"bottom: 0; padding: 0; margin: 0; border: 0; vertical-align: bottom;\">";}
if ($curpos==1 AND $played==26 AND $level==4) {echo " <img src=\"img/league4.png\" height=\"15\" valign=\"bottom\" style=\"bottom: 0; padding: 0; margin: 0; border: 0; vertical-align: bottom;\">";}
if ($curpos==1 AND $played==26 AND $level==5) {echo " <img src=\"img/league5.png\" height=\"15\" valign=\"bottom\" style=\"bottom: 0; padding: 0; margin: 0; border: 0; vertical-align: bottom;\">";}
echo "</td>";
} else {
echo "<td><a href=team.php?clubid=",$teamid,">",stripslashes($curname),"</a></td>";}?>
<td align="center"><b><span title="Won - Lost"><?=$win,"&nbsp;-&nbsp;",$lose?></span></b></td>
<?php
/*
if($country=='USA' OR $country=='Canada' OR $country=='China' OR $country=='Hong Kong' OR $country=='Mexico' OR $country=='Argentina' OR $country=='Chile' OR $country=='Brazil' OR $country=='Uruguay' OR $country=='Peru' OR $country=='Colombia' OR $country=='Venezuela' OR $country=='Australia' OR $country=='New Zealand' OR $country=='South Korea'){?>
<td align="center"><span title="Win percentage"><?=$uspoints?></span></td>
<?php } else {?>
<td align="center"><span title="Points"><?=$points?></span></td>
<?php }
*/
?>
<td align="center"><span title="Points scored by a team"><?=$for?></span></td>
<td align="center"><span title="Points scored against a team"><?=$against?></span></td>
<td align="center"><span title="Point difference"><?=$difference?></span></td>
<td align="center" width="95"><?=$hown?></td>
<td width="3"><?php if($id_yn==1){?><img src="img/uo2.gif" border="0"  alt="User is online" title="User is online"><?php }?> </td>
</tr>
<?php
if ($i == 0){ echo "<tr><td colspan=\"10\"><hr style=\"margin:0px\"></td></tr>";}
if ($i == 1 AND $level<>1){ echo "<tr><td colspan=\"10\"><hr style=\"margin:0px\"></td></tr>";}
if ($i == 7 AND $level<>$jelowliga){ echo "<tr><td colspan=\"10\"><hr style=\"margin:0px\"></td></tr>";}
if ($i == 10 AND $level<>$jelowliga){ echo "<tr><td colspan=\"10\"><hr style=\"margin:0px\"></td></tr>";}
$i++;
}
?>
</table>
<?php
if ($action=='fixtures' OR $action=='preview') {?>
<hr/>
<br/><i>
<?php
if ($is_supporter>0 AND $action<>'preview') {$ladd=" (<a href=\"leagues.php?leagueid=".$leagueid."&action=preview\">check</a>)";} else {$ladd='';}
if ($level==1) {echo "1st placed team is crowned as national champion<br/>1st-2nd/3rd placed teams qualify for <a href=\"intrank.php\">Champions Series</a>";} else {echo "1st placed team is promoted to higher division".$ladd;}
echo "<br/>";
if ($level<>1) {echo "2nd placed team enters playoff for promotion".$ladd."<br/>";}
if ($level<>$jelowliga) {echo "9th - 11th placed teams play relegation playoff match".$ladd."<br/>";}
if ($level<>$jelowliga) {echo "12th - 14th placed teams are relegated to lower division".$ladd;}
?>
</i>
<?php
}
?>
</td>
</tr>
<tr bgcolor="#ffffff" width="100%">
<?php
if ($action=='preview') {
?>
<td valign="top" class="border" width="100%">
<i>Below, supporters can see what changes would take place if the league was over now. Until last league round is played, none of these changes can be taken for granted and prediction can vary from round to round!</i><br/><br/>

<?php
if ($level==1) {
$iscem=$level+1;
$gh=13; $tz=10;
$ja1 = mysql_query("SELECT competition.curname AS ime, leagues.leagueid AS leagueid, leagues.name AS lname FROM competition, teams, leagues WHERE teams.teamid = competition.teamid AND competition.leagueid = leagues.leagueid AND teams.country = '$country' AND competition.position =1 AND competition.season =$default_season AND leagues.level=$iscem ORDER BY `win` DESC, `difference` DESC, `for_` DESC LIMIT 3");
while ($ja = mysql_fetch_array($ja1)) {
$imeJ = $ja[ime];
$leid = $ja[leagueid];
$lname = $ja[lname];
echo "<a href=\"leagues.php?leagueid=",$leid,"\">",$lname,"</a> ",stripslashes($imeJ)," <b>REPLACE</b> ",stripslashes(mysql_result($ligasi,$gh,'curname')),"<br/>" ;
$gh=$gh-1;
}
echo "<br/>";
$ja1 = mysql_query("SELECT competition.curname AS ime, leagues.leagueid AS leagueid, leagues.name AS lname FROM competition, teams, leagues WHERE teams.teamid = competition.teamid AND competition.leagueid = leagues.leagueid AND teams.country = '$country' AND competition.position =2 AND competition.season =$default_season AND leagues.level=$iscem ORDER BY `win` DESC, `difference` DESC, `for_` DESC LIMIT 3");
while ($ja = mysql_fetch_array($ja1)) {
$imeJ = $ja[ime];
$leid = $ja[leagueid];
$lname = $ja[lname];
echo "<a href=\"leagues.php?leagueid=",$leid,"\">",$lname,"</a> ",stripslashes($imeJ)," <b>PLAY</b> ",stripslashes(mysql_result($ligasi,$tz,'curname')),"<br/>" ;
$tz=$tz-1;
}
}
elseif ($level==$jelowliga) {
$iscem=$level-1;
$ja1 = mysql_query("SELECT competition.curname AS ime, leagues.leagueid AS leagueid, leagues.name AS lname FROM competition, teams, leagues WHERE teams.teamid = competition.teamid AND competition.leagueid = leagues.leagueid AND teams.country = '$country' AND competition.position >11 AND competition.season =$default_season AND leagues.level=$iscem ORDER BY position DESC, `win` ASC, `difference` ASC, `for_` ASC");
$ja2 = mysql_query("SELECT competition.curname AS ime, leagues.leagueid AS leagueid FROM competition, teams, leagues WHERE teams.teamid = competition.teamid AND competition.leagueid = leagues.leagueid AND teams.country = '$country' AND competition.position=1 AND competition.season =$default_season AND leagues.level=$level ORDER BY `win` DESC, `difference` DESC, `for_` DESC");
while ($ja = mysql_fetch_array($ja1) AND $na = mysql_fetch_array($ja2)) {
$imeJ = $ja[ime];
$leid = $ja[leagueid];
$lname = $ja[lname];
$imeN = $na[ime];
$ligaN = $na[leagueid];
if ($ligaN==$leagueid) {echo "<a href=\"leagues.php?leagueid=",$leid,"\">",$lname,"</a> ",stripslashes($imeJ)," <b>REPLACE</b> ",stripslashes($imeN),"<br/>" ;}
}
$ja1 = mysql_query("SELECT competition.curname AS ime, leagues.leagueid AS leagueid, leagues.name AS lname FROM competition, teams, leagues WHERE teams.teamid = competition.teamid AND competition.leagueid = leagues.leagueid AND teams.country = '$country' AND competition.position >8 AND competition.position <12 AND competition.season =$default_season AND leagues.level=$iscem ORDER BY position DESC, `win` ASC, `difference` ASC, `for_` ASC");
$ja2 = mysql_query("SELECT competition.curname AS ime, leagues.leagueid AS leagueid FROM competition, teams, leagues WHERE teams.teamid = competition.teamid AND competition.leagueid = leagues.leagueid AND teams.country = '$country' AND competition.position=2 AND competition.season =$default_season AND leagues.level=$level ORDER BY `win` DESC, `difference` DESC, `for_` DESC");
while ($ja = mysql_fetch_array($ja1) AND $na = mysql_fetch_array($ja2)) {
$imeJ = $ja[ime];
$leid = $ja[leagueid];
$lname = $ja[lname];
$imeN = $na[ime];
$ligaN = $na[leagueid];
if ($ligaN==$leagueid) {echo "<a href=\"leagues.php?leagueid=",$leid,"\">",$lname,"</a> ",stripslashes($imeJ)," <b>PLAY</b> ",stripslashes($imeN),"<br/>" ;}
}
}
else {
$iscem1=$level-1;
$iscem2=$level+1;
$ja1 = mysql_query("SELECT competition.curname AS ime, leagues.leagueid AS leagueid, leagues.name AS lname FROM competition, teams, leagues WHERE teams.teamid = competition.teamid AND competition.leagueid = leagues.leagueid AND teams.country = '$country' AND competition.position >11 AND competition.season =$default_season AND leagues.level=$iscem1 ORDER BY position DESC, `win` ASC, `difference` ASC, `for_` ASC");
$ja2 = mysql_query("SELECT competition.curname AS ime, leagues.leagueid AS leagueid FROM competition, teams, leagues WHERE teams.teamid = competition.teamid AND competition.leagueid = leagues.leagueid AND teams.country = '$country' AND competition.position=1 AND competition.season =$default_season AND leagues.level=$level ORDER BY `win` DESC, `difference` DESC, `for_` DESC");
while ($ja = mysql_fetch_array($ja1) AND $na = mysql_fetch_array($ja2)) {
$imeJ = $ja[ime];
$leid = $ja[leagueid];
$lname = $ja[lname];
$imeN = $na[ime];
$ligaN = $na[leagueid];
if ($ligaN==$leagueid) {echo "<a href=\"leagues.php?leagueid=",$leid,"\">",$lname,"</a> ",stripslashes($imeJ)," <b>REPLACE</b> ",stripslashes($imeN),"<br/>" ;}
}
$ja1 = mysql_query("SELECT competition.curname AS ime, leagues.leagueid AS leagueid, leagues.name AS lname FROM competition, teams, leagues WHERE teams.teamid = competition.teamid AND competition.leagueid = leagues.leagueid AND teams.country = '$country' AND competition.position =1 AND competition.season =$default_season AND leagues.level=$iscem2 ORDER BY `win` DESC, `difference` DESC, `for_` DESC");
$ja2 = mysql_query("SELECT competition.curname AS ime, leagues.leagueid AS leagueid FROM competition, teams, leagues WHERE teams.teamid = competition.teamid AND competition.leagueid = leagues.leagueid AND teams.country = '$country' AND competition.position>11 AND competition.season =$default_season AND leagues.level=$level ORDER BY position DESC, `win` ASC, `difference` ASC, `for_` ASC");
while ($ja = mysql_fetch_array($ja1) AND $na = mysql_fetch_array($ja2)) {
$imeJ = $ja[ime];
$leid = $ja[leagueid];
$lname = $ja[lname];
$imeN = $na[ime];
$ligaN = $na[leagueid];
if ($ligaN==$leagueid) {echo "<a href=\"leagues.php?leagueid=",$leid,"\">",$lname,"</a> ",stripslashes($imeJ)," <b>REPLACE</b> ",stripslashes($imeN),"<br/>" ;}
}
echo "<br/>";
$ja1 = mysql_query("SELECT competition.curname AS ime, leagues.leagueid AS leagueid, leagues.name AS lname FROM competition, teams, leagues WHERE teams.teamid = competition.teamid AND competition.leagueid = leagues.leagueid AND teams.country = '$country' AND competition.position >8 AND competition.position <12 AND competition.season =$default_season AND leagues.level=$iscem1 ORDER BY position DESC, `win` ASC, `difference` ASC, `for_` ASC");
$ja2 = mysql_query("SELECT competition.curname AS ime, leagues.leagueid AS leagueid FROM competition, teams, leagues WHERE teams.teamid = competition.teamid AND competition.leagueid = leagues.leagueid AND teams.country = '$country' AND competition.position=2 AND competition.season =$default_season AND leagues.level=$level ORDER BY `win` DESC, `difference` DESC, `for_` DESC");
while ($ja = mysql_fetch_array($ja1) AND $na = mysql_fetch_array($ja2)) {
$imeJ = $ja[ime];
$leid = $ja[leagueid];
$lname = $ja[lname];
$imeN = $na[ime];
$ligaN = $na[leagueid];
if ($ligaN==$leagueid) {echo "<a href=\"leagues.php?leagueid=",$leid,"\">",$lname,"</a> ",stripslashes($imeJ)," <b>PLAY</b> ",stripslashes($imeN),"<br/>" ;}
}
$ja1 = mysql_query("SELECT competition.curname AS ime, leagues.leagueid AS leagueid, leagues.name AS lname FROM competition, teams, leagues WHERE teams.teamid = competition.teamid AND competition.leagueid = leagues.leagueid AND teams.country = '$country' AND competition.position=2 AND competition.season =$default_season AND leagues.level=$iscem2 ORDER BY `win` DESC, `difference` DESC, `for_` DESC");
$ja2 = mysql_query("SELECT competition.curname AS ime, leagues.leagueid AS leagueid FROM competition, teams, leagues WHERE teams.teamid = competition.teamid AND competition.leagueid = leagues.leagueid AND teams.country = '$country' AND competition.position >8 AND competition.position <12 AND competition.season =$default_season AND leagues.level=$level ORDER BY position DESC, `win` ASC, `difference` ASC, `for_` ASC");
while ($ja = mysql_fetch_array($ja1) AND $na = mysql_fetch_array($ja2)) {
$imeJ = $ja[ime];
$leid = $ja[leagueid];
$lname = $ja[lname];
$imeN = $na[ime];
$ligaN = $na[leagueid];
if ($ligaN==$leagueid) {echo "<a href=\"leagues.php?leagueid=",$leid,"\">",$lname,"</a> ",stripslashes($imeJ)," <b>PLAY</b> ",stripslashes($imeN),"<br/>" ;}
}
}
}
elseif ($action=='fixtures') {
?>
<td valign="top" class="border" width="49%">
<b><?=$langmark740?></b><br/><br/>
<?php
$nmatches = mysql_query("SELECT matchid, home_id, home_name, away_id, away_name, home_score, away_score, time FROM matches WHERE type=1 AND season ='$sezonca' AND home_score<>0 AND lid_round ='$leagueid' ORDER BY time DESC");
$mat=mysql_num_rows($nmatches);
$m=0;
while ($m < $mat) {
$matchid=mysql_result($nmatches,$m,"matchid");
$home_id=mysql_result($nmatches,$m,"home_id");
$home_name=mysql_result($nmatches,$m,"home_name");
$away_id=mysql_result($nmatches,$m,"away_id");
$away_name=mysql_result($nmatches,$m,"away_name");
$home_score=mysql_result($nmatches,$m,"home_score");
$away_score=mysql_result($nmatches,$m,"away_score");
$tajm=mysql_result($nmatches,$m,"time");
?>
<table cellpadding="1" cellspacing="0" border="0" width="100%">
<tr>
<td align="left"><?=stripslashes($home_name)?><b>  -  </b><?=stripslashes($away_name)?></td>
<td align="right">
<?php if ($home_score+$away_score==21 && $tajm < '2009-01-11 22:30:01') {?><a href="prikaz_wo.php?matchid=<?=$matchid?>"><?php } else {?><a href="prikaz.php?matchid=<?=$matchid?>"><?php }?>
<?=$home_score,"&nbsp;:&nbsp;",$away_score?></td></tr></table>
<?php
SWITCH ($m) {
CASE 6: echo "<br/>"; break; CASE 13: echo "<br/>"; break; CASE 20: echo "<br/>"; break; CASE 27: echo "<br/>"; break;
CASE 34: echo "<br/>"; break; CASE 41: echo "<br/>"; break; CASE 48: echo "<br/>"; break; CASE 55: echo "<br/>"; break;
CASE 62: echo "<br/>"; break; CASE 69: echo "<br/>"; break; CASE 76: echo "<br/>"; break; CASE 83: echo "<br/>"; break;
CASE 90: echo "<br/>"; break; CASE 97: echo "<br/>"; break; CASE 104: echo "<br/>"; break; CASE 111: echo "<br/>"; break;
CASE 118: echo "<br/>"; break; CASE 125: echo "<br/>"; break; CASE 132: echo "<br/>"; break; CASE 139: echo "<br/>"; break;
CASE 146: echo "<br/>"; break; CASE 153: echo "<br/>"; break; CASE 160: echo "<br/>"; break; CASE 167: echo "<br/>"; break;
CASE 174: echo "<br/>"; break; CASE 181: echo "<br/>"; break; CASE 188: echo "<br/>"; break; CASE 195: echo "<br/>"; break;
}
$m++;
}
}
else {
?>
<td valign="top" class="border" width="49%">
<b><?=$langmark234?></b><br/><br/>
<?php
$lmatches = mysql_query("SELECT matchid, home_id, home_name, away_id, away_name, home_score, away_score, time FROM matches WHERE type=1 AND home_score<>0 AND lid_round=$leagueid ORDER BY time DESC LIMIT 7");
$mat=mysql_num_rows($lmatches);
$m=0;
while ($m < $mat) {
$matchid=mysql_result($lmatches,$m,"matchid");
$home_id=mysql_result($lmatches,$m,"home_id");
$home_name=mysql_result($lmatches,$m,"home_name");
$away_id=mysql_result($lmatches,$m,"away_id");
$away_name=mysql_result($lmatches,$m,"away_name");
$home_score=mysql_result($lmatches,$m,"home_score");
$away_score=mysql_result($lmatches,$m,"away_score");
$haime=mysql_result($lmatches,$m,"time");
//prikaz
?>
<table cellpadding="1" cellspacing="0" width="100%" border="0"><tr><td align="left">
<?=$home_name?><b>  -  </b><?=$away_name?></td><td align="right">
<?php if ($home_score+$away_score==21 && $haime < '2009-01-11 22:30:01') {?><a href="prikaz_wo.php?matchid=<?=$matchid?>"><?php } else {?><a href="prikaz.php?matchid=<?=$matchid?>"><?php }?>
<?=$home_score?>&nbsp;:&nbsp;<?=$away_score?>
</td></tr></table>
<?php
$m++;
}
}
?>
<?php
if ($action<>'preview') {
echo "</td><td valign=\"top\" class=\"border\" width=\"51%\"><b>",$langmark177,"</b>";
if ($action<>'fixtures') {echo "<br/><br/>"; $tpr=7;} else {echo "<br/><br/>"; $tpr=1000;}
$nmatches = mysql_query("SELECT matchid, home_id, `home_name`, away_id, `away_name`, crowd1 FROM `matches` WHERE type =1 AND home_score =0 AND lid_round ='$leagueid' ORDER BY `time` ASC LIMIT $tpr");
$mat=mysql_num_rows($nmatches);
$m=0;
while ($m < $mat) {
$matchid=mysql_result($nmatches,$m,"matchid");
$home_id=mysql_result($nmatches,$m,"home_id");
$home_name=mysql_result($nmatches,$m,"home_name");
$away_id=mysql_result($nmatches,$m,"away_id");
$away_name=mysql_result($nmatches,$m,"away_name");
$crowd1=mysql_result($nmatches,$m,"crowd1");

$result1 = mysql_query("SELECT name FROM teams WHERE teamid ='$home_id'");
while ($hometn = mysql_fetch_array($result1, MYSQL_ASSOC))
   {   foreach ($hometn as $home_named)
   {$home_named; }     } ;
$result2 = mysql_query("SELECT name FROM teams WHERE teamid ='$away_id'");
while ($awaytn = mysql_fetch_array($result2, MYSQL_ASSOC))
   {   foreach ($awaytn as $away_named)
   {$away_named; }     } ;
?>

<table cellpadding="1" cellspacing="0" border="0" width="100%">
<tr>
<td align="left"><?=stripslashes($home_named),"<b>  -  </b>",stripslashes($away_named)?></td>
<td align="right"><a href="prikaz.php?matchid=<?=$matchid?>">
<?php if ($crowd1>0) {echo "LIVE";} else {echo "0&nbsp;:&nbsp;0";}?>
</td></tr></table>
<?php
if ($tpr==1000) {
SWITCH ($m) {
CASE 6: echo "<br/>"; break; CASE 13: echo "<br/>"; break; CASE 20: echo "<br/>"; break; CASE 27: echo "<br/>"; break;
CASE 34: echo "<br/>"; break; CASE 41: echo "<br/>"; break; CASE 48: echo "<br/>"; break; CASE 55: echo "<br/>"; break;
CASE 62: echo "<br/>"; break; CASE 69: echo "<br/>"; break; CASE 76: echo "<br/>"; break; CASE 83: echo "<br/>"; break;
CASE 90: echo "<br/>"; break; CASE 97: echo "<br/>"; break; CASE 104: echo "<br/>"; break; CASE 111: echo "<br/>"; break;
CASE 118: echo "<br/>"; break; CASE 125: echo "<br/>"; break; CASE 132: echo "<br/>"; break; CASE 139: echo "<br/>"; break;
CASE 146: echo "<br/>"; break; CASE 153: echo "<br/>"; break; CASE 160: echo "<br/>"; break; CASE 167: echo "<br/>"; break;
CASE 174: echo "<br/>"; break; CASE 181: echo "<br/>"; break; CASE 188: echo "<br/>"; break; CASE 195: echo "<br/>"; break;
}
}
$m++;
}
}
elseif ($action=='fixtures' OR !$action) {
$nmatches = mysql_query("SELECT matchid, home_id, away_id, crowd1 FROM matches WHERE type=1 AND home_score=0 AND lid_round=$leagueid ORDER BY time ASC LIMIT 7");
while($m=mysql_fetch_array($nmatches))
{
$matchid=$m["matchid"];
$home_id=$m["home_id"];
$away_id=$m["away_id"];
$crowd1=$m["crowd1"];

$result1 = mysql_query("SELECT name FROM teams WHERE teamid=$home_id LIMIT 1");
while ($hometn = mysql_fetch_array($result1, MYSQL_ASSOC))
   {   foreach ($hometn as $home_named)
   {$home_named; }     } ;
$result2 = mysql_query("SELECT name FROM teams WHERE teamid=$away_id LIMIT 1");
while ($awaytn = mysql_fetch_array($result2, MYSQL_ASSOC))
   {   foreach ($awaytn as $away_named)
   {$away_named; }     } ;

if ($crowd1>0) {$dlak="LIVE";} else {$dlak="0&nbsp;:&nbsp;0";}
echo "<table cellpadding=\"1\" cellspacing=\"0\" width=\"100%\" border=\"0\"><tr><td align=\"left\">".stripslashes($home_named)."<b>  -  </b>".stripslashes($away_named)."</td><td align=\"right\"><a href=\"prikaz.php?matchid=",$matchid,"\">",$dlak,"</td></tr></table>";
}
}
if ($action<>'fixtures' and $action<>'preview') {?>
</td>
</tr>
<?php
$obvestila = mysql_query("SELECT id FROM statements WHERE league=$leagueid ORDER BY id DESC LIMIT 8");
if (!mysql_num_rows($obvestila)) {die("</td></tr></table></div></div></body></html>");}
?>
<tr bgcolor="#ffffff" width="100%">
<td valign="top" class="border" width="49%">
<b><?=$langmark235?></b><br/><br/>
<?php
$obvestila = mysql_query("SELECT * FROM statements WHERE league=$leagueid ORDER BY time DESC LIMIT 8");
$jih_je = mysql_numrows($obvestila);
if ($jih_je) {
$o=0;
while ($o < $jih_je) {
$id_pressa = mysql_result($obvestila,$o,"id");
$naslov = mysql_result($obvestila,$o,"title");
$id_avtorja = mysql_result($obvestila,$o,"user");
$ime_userja = mysql_query("SELECT username FROM users WHERE userid=$id_avtorja");
$imeavtorja = mysql_result($ime_userja,0);
echo "<a href=\"club.php?clubid=",$id_avtorja,"\" class=\"greenhilite\"><i>",$imeavtorja,"</i></a>: <a href=leagues.php?leagueid=",$leagueid,"&press=",$o,">",stripslashes($naslov),"</a><br/>";
$o++;
}
}
?>
</td>
<td class="border" width="51%">
<?php
$press = $_GET["press"];
if ($press >=0 && $press < 8)
{
$naslov1 = mysql_result($obvestila,$press,"title");
$vsebina_pressa = mysql_result($obvestila,$press,"content");
$cas_pressa = mysql_result($obvestila,$press,"time");
//cas
$splitpres = explode(" ", $cas_pressa); $tdate = $splitpres[0]; $ttime = $splitpres[1];
$splitena = explode("-", $tdate); $tyear = $splitena[0]; $tmonth = $splitena[1]; $tday = $splitena[2];
$splitdve = explode(":", $ttime); $thour = $splitdve[0]; $tmin = $splitdve[1]; $tsec = $splitdve[2];
$presadat = date("d.m.y H:i", mktime($thour,$tmin,$tsec,$tmonth,$tday,$tyear));
//avtor
$id_avtorja = mysql_result($obvestila,$press,"user");
$kater_user = mysql_query("SELECT username FROM users WHERE userid=$id_avtorja");
$imeavt = mysql_result($kater_user,0);
echo "<b>",stripslashes($naslov1),"</b><br/><br/>";
echo stripslashes($vsebina_pressa),"<br/><br/>";
echo "<i>",$presadat," ",$langmark237," ",$imeavt,"</i>";
}
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