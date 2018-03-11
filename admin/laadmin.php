<?php
if (!$_COOKIE['userid']){header("location: http://www.basketsim.com/index.php"); die();}
$kodazavstop=$_COOKIE['geslo'];
$usernum=$_COOKIE['userid'];
include_once('../inc/config.php');
$query = mysql_query("SELECT userid, username, password, langadm, country FROM users, teams WHERE users.club=teams.teamid AND userid='$usernum' LIMIT 1") or die(mysql_error());
if (!mysql_num_rows($query)){header("location: http://www.basketsim.com/index.php"); die();}
while ($r=mysql_fetch_array($query)) {
$userid=$r["userid"];
$username=$r["username"];
$password=$r["password"];
$langadm=$r["langadm"];
$country=$r["country"];
}
if ($password<>$kodazavstop){header("location: http://www.basketsim.com/index.php"); die();}
if ($langadm==0){header("location: http://www.basketsim.com/index.php"); die();}
if ($usernum==9415) {$country='Estonia';}
?>

<table align="center" border="1" cellspacing="5" cellpadding="5" width="80%">
<tr>
<td bgcolor="orange" colspan="2">
Welcome <b><?=$username?></b>. You are language administrator for <b><?=$country?></b>.
</td>
</tr>
<tr>
<td width="50%" bgcolor="lightgreen" valign="top">
The purpose of LA admin section is to add functions usable for language administrators. This is only the beginning and first feature will be to check and get the list of all names and surnames which currently represent your country in Basketsim.<br/>
<br/>
<a href="laadmin.php?action=first">Click here to display all first names.</a><br/>
<a href="laadmin.php?action=last">Click here to display all surnames.</a>
</td>
<td border="class" width="50%" bgcolor="lightgray">

<?php
$action = $_GET["action"];
if ($action=='first') {
?>
<h2>List of first names:</h2>
<?php
$izbor = mysql_query("SELECT name FROM names WHERE country='$country' ORDER BY 'name' ASC") or die(mysql_error());
$tudi = mysql_num_rows($izbor);
echo "<table width=\"100%\" cellpadding=\"1\">";
$t=0;
while ($t < $tudi) {
$ekipa = mysql_result($izbor,$t);
echo "<tr><td>",$ekipa,"</td></tr>";
$t++;
}

} elseif ($action=='last') {
?>
<h2>List of surnames:</h2>
<?php
$izbor = mysql_query("SELECT surname FROM surnames WHERE country='$country' ORDER BY 'surname' ASC") or die(mysql_error());
$tudi = mysql_num_rows($izbor);
echo "<table width=\"100%\" cellpadding=\"1\">";
$t=0;
while ($t < $tudi) {
$ekipa = mysql_result($izbor,$t);
echo "<tr><td>",$ekipa,"</td></tr>";
$t++;
}

}
?>
</td>
</tr>
</table>