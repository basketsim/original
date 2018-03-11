<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}

$compare = mysql_query("SELECT club, signed, lang FROM `users` WHERE `password` ='$koda' AND `userid` ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)) {
$get_team = mysql_result ($compare,0,"club");
$signed = mysql_result ($compare,0,"signed");
$lang = mysql_result ($compare,0,"lang");
}
else {die(include 'basketsim.php');}

$endatum = date("Y-m-d H:i:s");
$tdatetime = explode(" ",$endatum); $ffdate = $tdatetime[0]; $fftime = $tdatetime[1];
$tdate = explode("-", $ffdate); $ffyear = $tdate[0]; $ffmonth = $tdate[1]; $ffday = $tdate[2];
$ttime = explode(":", $fftime); $ffhour = $ttime[0]; $ffmin = $ttime[1]; $ffsec = $ttime[2];
$ffdate = date("Y-m-d H:i:s", mktime($ffhour,$ffmin,$ffsec,$ffmonth-1,$ffday,$ffyear));

require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
?>

<div id="main">

<?php if ($action=='all') {?><h2><?=strtoupper($langmark496)?></h2><?php } else {?><h2><?=$langmark318?></h2><?php }?>

<table border="0" cellspacing="9" cellpadding="9" width="100%">

<tr valign="top" bgcolor="#ffffff">
<td width="100%" class="border">
<table width="100%">
&nbsp;<?php if ($action<>'all' AND $action<>'warning' AND $action<>'timezones') {?><img src="img/icons/icons_03.png" border="0" alt="List of matches" title="List of matches" width="50">
<?php } else {?><a href="matches.php"><img src="img/icons/icons_18.png" border="0" alt="List of matches" title="List of matches" width="50"></a><?php }?>
&nbsp;&nbsp;<?php if ($action<>'all') {?><a href="matches.php?action=all"><img src="img/icons/icons_19.png" border="0" alt="Archive of all matches" title="Archive of all matches" width="50"></a>
<?php } else {?><img src="img/icons/icons_05.png" border="0" alt="Archive of all matches" title="Archive of all matches" width="50"><?php }?>
&nbsp;&nbsp;<?php if ($action<>'warning') {?><a href="matches.php?action=warning"><img src="img/icons/icons_21.png" border="0" alt="Match orders warning" title="Match orders warning" width="50"></a>
<?php } else {?><img src="img/icons/icons_09.png" border="0" alt="Match orders warning" title="Match orders warning" width="50"><?php }?>
&nbsp;&nbsp;<?php if ($action<>'timezones') {?><a href="matches.php?action=timezones"><img src="img/icons/icons_22.png" border="0" alt="Check timezones time" title="Check timezones time" width="50"></a>
<?php } else {?><img src="img/icons/icons_11.png" border="0" alt="Check timezones time" title="Check timezones time" width="50"><?php }?>
&nbsp;&nbsp;<a href="showmatches.php?show=arch"><img src="img/icons/icons_20.png" border="0" alt="Matches statistics / overview" title="Matches statistics / overview" width="50"></a>

<?php
if (isset($_POST['submit'])) {$timez = $_POST['DropDownTimezone'];}
if ($action=='timezones') {?>
<br/>
<form method="post" action="matches.php?action=timezones" style="margin: 0">
<select name="DropDownTimezone" id="DropDownTimezone" class="inputreg">
<option value="-12.0" <?php if ($timez==-12.0){echo "selected";}?>>(GMT -12:00) Eniwetok, Kwajalein</option>
<option value="-11.0" <?php if ($timez==-11.0){echo "selected";}?>>(GMT -11:00) Midway Island, Samoa</option>
<option value="-10.0" <?php if ($timez==-10.0){echo "selected";}?>>(GMT -10:00) Hawaii</option>
<option value="-9.0" <?php if ($timez==-9.0){echo "selected";}?>>(GMT -9:00) Alaska</option>
<option value="-8.0" <?php if ($timez==-8.0){echo "selected";}?>>(GMT -8:00) Pacific Time (US &amp; Canada)</option>
<option value="-7.0" <?php if ($timez==-7.0){echo "selected";}?>>(GMT -7:00) Mountain Time (US &amp; Canada)</option>
<option value="-6.0" <?php if ($timez==-6.0){echo "selected";}?>>(GMT -6:00) Central Time (US &amp; Canada), Mexico City</option>
<option value="-5.0" <?php if ($timez==-5.0){echo "selected";}?>>(GMT -5:00) Eastern Time (US &amp; Canada), Bogota, Lima</option>
<option value="-4.0" <?php if ($timez==-4.0){echo "selected";}?>>(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz</option>
<option value="-3.5" <?php if ($timez==-3.5){echo "selected";}?>>(GMT -3:30) Newfoundland</option>
<option value="-3.0" <?php if ($timez==-3.0){echo "selected";}?>>(GMT -3:00) Brazil, Buenos Aires, Georgetown</option>
<option value="-2.0" <?php if ($timez==-2.0){echo "selected";}?>>(GMT -2:00) Mid-Atlantic</option>
<option value="-1.0" <?php if ($timez==-1.0){echo "selected";}?>>(GMT -1:00 hour) Azores, Cape Verde Islands</option>
<option value="0.0" <?php if ($timez==0.0){echo "selected";}?>>(GMT) Western Europe Time, London, Lisbon, Casablanca</option>
<option value="1.0" <?php if ($timez==1.0){echo "selected";}?>>(GMT +1:00 hour) Brussels, Copenhagen, Madrid, Paris</option>
<option value="2.0" <?php if ($timez==2.0){echo "selected";}?>>(GMT +2:00) Kaliningrad, South Africa</option>
<option value="3.0" <?php if ($timez==3.0){echo "selected";}?>>(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg</option>
<option value="3.5" <?php if ($timez==3.5){echo "selected";}?>>(GMT +3:30) Tehran</option>
<option value="4.0" <?php if ($timez==4.0){echo "selected";}?>>(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi</option>
<option value="4.5" <?php if ($timez==4.5){echo "selected";}?>>(GMT +4:30) Kabul</option>
<option value="5.0" <?php if ($timez==5.0){echo "selected";}?>>(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>
<option value="5.5" <?php if ($timez==5.5){echo "selected";}?>>(GMT +5:30) Bombay, Calcutta, Madras, New Delhi</option>
<option value="6.0" <?php if ($timez==6.0){echo "selected";}?>>(GMT +6:00) Almaty, Dhaka, Colombo</option>
<option value="7.0" <?php if ($timez==7.0){echo "selected";}?>>(GMT +7:00) Bangkok, Hanoi, Jakarta</option>
<option value="8.0" <?php if ($timez==8.0){echo "selected";}?>>(GMT +8:00) Beijing, Perth, Singapore, Hong Kong</option>
<option value="9.0" <?php if ($timez==9.0){echo "selected";}?>>(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
<option value="9.5" <?php if ($timez==9.5){echo "selected";}?>>(GMT +9:30) Adelaide, Darwin</option>
<option value="10.0" <?php if ($timez==10.0){echo "selected";}?>>(GMT +10:00) Eastern Australia, Guam, Vladivostok</option>
<option value="11.0" <?php if ($timez==11.0){echo "selected";}?>>(GMT +11:00) Magadan, Solomon Islands, New Caledonia</option>
<option value="12.0" <?php if ($timez==12.0){echo "selected";}?>>(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka</option>
</select>
<input type="submit" value="&nbsp;&raquo;" name="submit" class="buttonreg">
<?php }?>
<br/>
<?php if ($action=='warning') {?><br/><hr/><font color="#A30006"><b>Orders can be set until 15 minutes before the match start!</b></font><hr/><?php }?>
<br/>
<?php
if ($action=='all') {$staretekme = "SELECT `matchid`, `home_id`, `home_name`, `away_id`, `away_name`, `crowd1`, `home_score`, `away_score`, `time`,`type`, `country`, `home_set`, `away_set`, `lid_round`, `season` FROM `matches` WHERE `time` > '$signed' AND `home_id`='$get_team' UNION SELECT `matchid`, `home_id`, `home_name`, `away_id`, `away_name`, `crowd1`, `home_score`, `away_score`, `time`, `type`, `country`, `home_set`, `away_set`, `lid_round`, `season` FROM `matches` WHERE `time` > '$signed' AND `away_id`='$get_team'";}
if ($action<>'all') {$staretekme = "SELECT `matchid`, `home_id`, `home_name`, `away_id`, `away_name`, `crowd1`, `home_score`, `away_score`, `time`,`type`, `country`, `home_set`, `away_set`, `lid_round`, `season` FROM `matches` WHERE `time` > '$ffdate' AND `home_id`='$get_team' UNION SELECT `matchid`, `home_id`, `home_name`, `away_id`, `away_name`, `crowd1`, `home_score`, `away_score`, `time`, `type`, `country`, `home_set`, `away_set`, `lid_round`, `season` FROM `matches` WHERE `time` > '$ffdate' AND `away_id`='$get_team'";}

function multisort($array, $tag=1, $limit=2000, $sort_by, $key1, $key2=NULL, $key3=NULL, $key4=NULL, $key5=NULL, $key6=NULL, $key7=NULL, $key8=NULLL, $key9=NULL, $key10=NULL, $key11=NULL, $key12=NULLL, $key13=NULL, $key14=NULL, $key15=NULL){
// sort by ?
foreach ($array as $pos =>  $val)
$tmp_array[$pos] = $val[$sort_by];
if($tag==1){
asort($tmp_array);
}else{
arsort($tmp_array);
}

$i=1;
// display however you want
foreach ($tmp_array as $pos =>  $val){
if($i<=$limit){
$return_array[$pos][$sort_by] = $array[$pos][$sort_by];
$return_array[$pos][$key1] = $array[$pos][$key1];
if (isset($key2)){
$return_array[$pos][$key2] = $array[$pos][$key2];
}
if (isset($key3)){
$return_array[$pos][$key3] = $array[$pos][$key3];
}
if (isset($key4)){
$return_array[$pos][$key4] = $array[$pos][$key4];
}
if (isset($key5)){
$return_array[$pos][$key5] = $array[$pos][$key5];
}
if (isset($key6)){
$return_array[$pos][$key6] = $array[$pos][$key6];
}
if (isset($key7)){
$return_array[$pos][$key7] = $array[$pos][$key7];
}
if (isset($key8)){
$return_array[$pos][$key8] = $array[$pos][$key8];
}
if (isset($key9)){
$return_array[$pos][$key9] = $array[$pos][$key9];
}
if (isset($key10)){
$return_array[$pos][$key10] = $array[$pos][$key10];
}
if (isset($key11)){
$return_array[$pos][$key11] = $array[$pos][$key11];
}
if (isset($key12)){
$return_array[$pos][$key12] = $array[$pos][$key12];
}
if (isset($key13)){
$return_array[$pos][$key13] = $array[$pos][$key13];
}
if (isset($key14)){
$return_array[$pos][$key14] = $array[$pos][$key14];
}
if (isset($key15)){
$return_array[$pos][$key15] = $array[$pos][$key15];
}
$i++;
}
}
return $return_array;
}

$resultev = mysql_query($staretekme);
$all_info = array();
while ($get_info = mysql_fetch_row($resultev)){
$all_info[] = $get_info;
$smoga=$smoga+1;
}

$kmn=0;
if ($smoga > 0) {
$all_info = multisort($all_info,1,2000,'8','0','1','2','3','4','5','6','7','8','9','10','11','12','13','14');
foreach($all_info as $get_info) {
$matchid=$get_info[0];
$home_id=$get_info[1];
$home_name=$get_info[2];
$away_id=$get_info[3];
$away_name=$get_info[4];
$livecrowd=$get_info[5];
$home_score=$get_info[6];
$away_score=$get_info[7];
$time=$get_info[8];
$type=$get_info[9];
$country=$get_info[10];
$home_set=$get_info[11];
$away_set=$get_info[12];
$lid_round=$get_info[13];
$pratest=$pravlink;
$pravlink=$get_info[14];
if ($kmn==0) {$zacsez=$pravlink; $kmn=99;}
$zdele = date("Y-m-d H:i:s");
if ($livecrowd > 0 AND $home_score==0 AND $zdele > $time) {$rezy = 'LIVE';} else {$rezy = $home_score."&nbsp;:&nbsp;".$away_score;}

if ($home_name=='') {$result1 = mysql_query("SELECT `name` FROM `teams` WHERE `teamid` =$home_id LIMIT 1"); $home_name = mysql_result ($result1,0,"name");}
if ($away_name=='') {$result2 = mysql_query("SELECT `name` FROM `teams` WHERE `teamid` =$away_id LIMIT 1"); $away_name = mysql_result ($result2,0,"name");}
$splitdatetime = explode(" ", $time); $dbdate = $splitdatetime[0]; $dbtime = $splitdatetime[1];
$splitdate = explode("-", $dbdate); $dbyear = $splitdate[0]; $dbmonth = $splitdate[1]; $dbday = $splitdate[2];
$splittime = explode(":", $dbtime); $dbhour = $splittime[0]; $dbmin = $splittime[1]; $dbsec = $splittime[2];
$disdate = date("d.m.Y H:i", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));
if (isset($_POST['submit'])) {
$st = explode(".", $timez);
$st1 = $st[0]; $st1=$st1-1; $st2 = $st[1];
if ($st2==5 AND $st1 <0) {$st2=-30;} elseif ($st2==5 AND $st1 >0) {$st2=30;} else {$st2=0;}
$tzdate = date("d.m.Y H:i", mktime($dbhour+$st1,$dbmin+$st2,$dbsec,$dbmonth,$dbday,$dbyear));
}
if ($action=='all' AND $pratest<>$pravlink AND $pravlink<>$zacsez) {echo "<tr><td colspan=\"6\"><hr/>SEASON ",$pravlink,"<hr/></tr>";}
?>
<tr>
<td width="94"><?=$disdate?></td>
<td width="74">
<?php
if ($type==1) {echo "<b>(<a href=\"leagues.php?leagueid=",$lid_round,"\">",$langmark175,"</a>)</b>";}
elseif ($type==2) {echo "<b>(",$langmark320,"</a>)</b>";}
elseif ($type==3) {echo "<b>(<a href=\"nationalcup.php?country=",$country,"&season=",$pravlink,"&round=",$lid_round,"\">",$langmark321,"</a>)</b>";}
elseif ($type==4) {echo "<b>(",$langmark322,")</b>";}
elseif ($type==5 && ($lid_round<>1 || $pravlink < 7)) {echo "<b>(<a href=\"fairplaycup.php?season=",$pravlink,"&round=",$lid_round,"\">",$langmark1274,"</a>)</b>";}
elseif ($type==5 && $lid_round==1 && $pravlink >6) {
$prever = mysql_query("SELECT `GROUP` FROM `fpgroups` WHERE season=$pravlink AND `ekipa`='$get_team' LIMIT 1");
$skupa = mysql_result($prever,0);
echo "<b>(<a href=\"fairplaycup.php?kgr=",$skupa,"&season=",$pravlink,"\">",$langmark1274,"</a>)</b>";}
elseif ($type==6) {echo "<b>(<a href=\"cs.php?season=".$pravlink."&round=".$lid_round."\">".$langmark1274."</a>)</b>";}
elseif ($type==7) {echo "<b>(<a href=\"cws.php?season=".$pravlink."&round=".$lid_round."\">".$langmark1274."</a>)</b>";}
elseif ($type==18) {echo "<b>(Youth)</b>";}
elseif ($type==19) {echo "<b>(<a href=\"ycwc.php?season=".$pravlink."&round=".$lid_round."\">Youth</a>)</b>";}
?>
</td><td width="300"><?=stripslashes($home_name)?><b>&nbsp;-&nbsp;</b><?=stripslashes($away_name)?></td><td width="50" align="center">
<?php if (($home_score+$away_score==21 && $time < '2009-01-11 22:30:01') || ($type==2 && $time < '2007-08-30 03:00:00')) {?>
<?php } elseif($home_score+$away_score==21 AND $time > '2009-01-11 22:30:00' AND $time < '2012-09-04 22:30:00'){?><a href="prikaz_wo.php?matchid=<?=$matchid?>">
<?php } else {$dnn=33;?><a href="prikaz.php?matchid=<?=$matchid?>"><?php }?><?=$rezy?><?php if ($dnn==33) {echo "</a>";}?></td>

<?php
if ($home_score >= $away_score AND $home_score > 0 AND $home_id == $get_team) {echo "<td><font color=\"#56704B\"><b>",$langmark735,"</b></td>";}
if ($home_score < $away_score AND $home_id == $get_team) {echo "<td><font color=\"#A30006\"><b>",$langmark736,"</b></td>";}
if ($home_score > $away_score AND $away_id == $get_team) {echo "<td><font color=\"#A30006\"><b>",$langmark736,"</b></td>";}
if ($home_score <= $away_score AND $home_score > 0 AND $away_id == $get_team) {echo "<td><font color=\"#56704B\"><b>",$langmark735,"</b></td>";}
if ($home_score == 0) {$zmaga='&nbsp;';}

echo "<td width=\"37\">";
$timenow = date("Y-m-d H:i:s");
$splitdt = explode(" ", $timenow); $bdate = $splitdt[0]; $btime = $splitdt[1];
$splitd = explode("-", $bdate); $byear = $splitd[0]; $bmonth = $splitd[1]; $bday = $splitd[2];
$splitt = explode(":", $btime); $bhour = $splitt[0]; $bmin = $splitt[1]; $bsec = $splitt[2];
$timenow = date("Y-m-d H:i:s", mktime($bhour,$bmin+15,$bsec,$bmonth,$bday,$byear));
if ($time > $timenow AND $type<18) {
echo "<a href=\"tactics.php?matchid=",$matchid,"\">",$langmark323,"</a></td><td>";
if ($get_team == $home_id AND $home_set == 1){echo "<img src=\"img/orders.gif\" alt=\"",$langmark414,"\" title=\"",$langmark414,"\">";}
if ($get_team == $away_id AND $away_set == 1){echo "<img src=\"img/orders.gif\" alt=\"",$langmark414,"\" title=\"",$langmark414,"\">";}
}
if ($time > $timenow AND $type>17) {
echo "<a href=\"tactics.php?matchid=",$matchid,"&dm=nn\">",$langmark323,"</a></td><td>";
if ($get_team == $home_id AND $home_set == 1){echo "<img src=\"img/orders.gif\" alt=\"",$langmark414,"\" title=\"",$langmark414,"\">";}
if ($get_team == $away_id AND $away_set == 1){echo "<img src=\"img/orders.gif\" alt=\"",$langmark414,"\" title=\"",$langmark414,"\">";}
}
if (is_numeric($st1) AND $action=='timezones' AND $home_score==0) {echo "</td></tr><tr><td colspan=\"7\" width=\"100%\"><font color=\"#A30006\">",$tzdate," in chosen time zone.</font>";}
echo "</td></tr>";
}
}
?>
</table>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>