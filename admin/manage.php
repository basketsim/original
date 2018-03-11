<?php
include_once("common.php");
//sprememba regije
if (isset($_POST['submit999'])) {
$new_region = $_POST["new_region"];
$tid = $_POST["ajdi"];
$new_region=strip_tags($new_region);
mysql_query("UPDATE teams SET city = '$new_region' WHERE teamid=$tid LIMIT 1");
}
include("../geoip.inc");
checklogin();
$msg = "";
$catname = "";
$catdesc = "";
?>
<html>
<head>
<title>Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body>
<h3>List of teams waiting for activation</h3>
<p><a href="index.php">Main</a> | <a href="manage.php?action=how">How to activate?</a></p>
<?php
$action = $_GET["action"];
if ($action=='how') {
?>
- Teams colored blue are those who just signed for Basketsim.<br/>
- Teams colored white have some connection to new teams, so we need to determine if user have signed up with his second or third club.<br/>
- IP or password can be the same, it doesn't mean that it's cheating by default.<br/>
- If both, password and IP are the same, refuse new user and apply fine if same real name was used.<br/>
- <b>Information that we use passwords to catch cheaters must never be revealed to any user</b> as this would kill extremly good method to catch cheaters (many use various IP addresses to make multiple clubs, but they use same password all the time) - <b>methods how user was caught cheating should never be revealed, not even to non-cheating users!</b><br/>
- If same person have created numerous accounts in short period, refuse them all and ban IP if appropriate.<br/>
- All passwords are coded for the reasons of data protection. There are some passwords used by many, but it's not cheating, just generic passwords.<br/>
- Managers with extremely fake real names should be refused, same goes for insulting team and usernames.<br/>
- If actual and signup country are different, check if user have a good reason for this by examining his email address (.lv, .ee, .si etc.) and real name. If user is from small Basketsim country and is signing in a big country there are good chances that he actualy live outside his country and in such cases tend to accept him!<br/>
- If actual country is not determined or it's non-Basketsim country accept the user (he's allowed to sign in any country).<br/>
- Region is on the list for informational purpose, if you see that it's not matching the country, leave it to me!<br/>
<br/><a href="manage.php">Remove help</a><br/><br/>

<?php
}
?>
<table width="100%" border="1" cellspacing="0" cellpadding="2">
<tr width="100%"><td><b>Teamname (country)</b></td><td><b>IP from:</b></td><td>Region</td><td><b>Username [password, real name, email, last IP]</b></td><td><b>Same IP/pass</b></td><td><b>Confirm</b></td><td><b>Refuse</b></td></tr>
<tr><td colspan="7" bgcolor="lightgray"><i>Check all the info before you make decision on acceptance or refusal.</i></td></tr>
<?php
$result = mysql_query("SELECT teamid, name, city, country FROM teams WHERE status=0 ORDER BY teamid ASC");
$num=mysql_num_rows($result);
$i=0;
while ($i < $num) {
$teamid=mysql_result($result,$i,"teamid");
$name=mysql_result($result,$i,"name");
$cityreg=mysql_result($result,$i,"city");
$country=mysql_result($result,$i,"country");

$aquer = mysql_query("SELECT username, realname, password, email, lastip FROM users WHERE club=$teamid");
$usern = mysql_result($aquer,0,"username");
$ime = mysql_result($aquer,0,"realname");
$password = mysql_result($aquer,0,"password");
$email = mysql_result($aquer,0,"email");
$lastip = mysql_result($aquer,0,"lastip");

$hahacountry='';
$gi = geoip_open("../GeoIP.dat",GEOIP_STANDARD);
$hahacountry = geoip_country_name_by_addr($gi, $lastip);
geoip_close($gi);

$podvajanje=mysql_query("SELECT users.userid FROM users, teams WHERE users.club = teams.teamid AND (users.lastip='$lastip' OR (users.password='$password' AND users.password != 'd41d8cd98f00b204e9800998ecf8427e')) AND teams.status =1 AND users.club !=$teamid");
$vecjihje = mysql_num_rows($podvajanje);

echo "<tr><td bgcolor=\"lightblue\">",stripslashes($name)," (",$country,")</td><td bgcolor=\"YellowGreen\">",$hahacountry,"</td><td bgcolor=\"lightblue\">",$cityreg;

if ($userid==1) {?>
<br/><form method="post" action="<?=$PHP_SELF?>" style="margin: 0"><select name="new_region">
<?php
$rs = mysql_query("SELECT `region` FROM `regions` WHERE country LIKE '$country' ORDER BY `id` ASC, `region` ASC");
while($row = mysql_fetch_assoc($rs)) {echo "<option name=\"",$row['region'],"\">",$row['region'],"</option>";}?>
</select><input type="hidden" name="ajdi" value="<?=$teamid?>"><input type="submit" value=">" name="submit999"></form><?php
}

echo "</td><td bgcolor=\"lightblue\">",$usern," [",$password,", ",$ime,", ",$email,", ",$lastip,"]</td><td bgcolor=\"YellowGreen\">",$vecjihje,"</td><td bgcolor=\"lightgreen\"><a href=\"activate.php?teamid=",$teamid,"\">activate</a></td><td bgcolor=\"lightcoral\"><a href=\"refuse.php?teamid=".$teamid."\">refuse</a></td></tr>";

//multiji
$f=0;
while ($f < $vecjihje) {
$enmulti = mysql_result($podvajanje,$f);
$result1 = mysql_query("SELECT teams.teamid AS teamid, teams.name AS name, teams.country AS country, users.userid AS userid, users.username AS username, users.password AS password, users.realname AS realname, users.email AS email, users.lastip AS lastip FROM teams, users WHERE users.club=teams.teamid AND users.userid=$enmulti") or die(mysql_error());
$g=0;
while ($g < mysql_num_rows($result1)) {
$teamid1=mysql_result($result1,$g,"teamid");
$name1=mysql_result($result1,$g,"name");
$country1=mysql_result($result1,$g,"country");
$userckid = mysql_result($result1,$g,"userid");
$usern1 = mysql_result($result1,$g,"username");
$password1 = mysql_result($result1,$g,"password");
$ime1 = mysql_result($result1,$g,"realname");
$email1 = mysql_result($result1,$g,"email");
$lastip1 = mysql_result($result1,$g,"lastip");

$hahacountry1='';
$gi = geoip_open("../GeoIP.dat",GEOIP_STANDARD);
$hahacountry1 = geoip_country_name_by_addr($gi, $lastip1);
geoip_close($gi);

echo "<tr><td><a href=\"../club.php?clubid=",$userckid,"\" target=\"_new\">",$name1,"</a> (",$country1,")</td><td>",$hahacountry1,"</td><td>&nbsp;</td><td>",$usern1," [",$password1,", ",$ime1,", ",$email1,", ",$lastip1,"]</td><td>&nbsp;</td><td>&nbsp;</td><td><a href=\"punish.php?teamid=",$teamid1,"\">punish</a></td></tr>";
$g++;
}

$f++;
}

$i++;
}
?>
</table>
<p><a href="index.php">Main</a></p>
<?php if ($i==0) {echo "Currently all teams are activated. Good job! :-)";}?>
</body>
</html>