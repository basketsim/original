<?php
include_once("common.php");
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
<h3>Create new leagues</h3>
<p><a href="index.php">Main</a></p>
<p><?=$msg?></p>

<form action="create_league.php" method="POST" style="margin: 0">
<table>
<tr><td width=125>Choose country:</td><td width=150>
<select name="league_country">

<option value="Japan">Japan</option>
<option value="Belarus">Belarus</option>
<option value="Georgia">Georgia</option>
<option value="Puerto Rico">Puerto Rico</option>

<option value="Hong Kong">Hong Kong</option>
<option value="India">India</option>
<option value="Ireland">Ireland</option>
<option value="Malaysia">Malaysia</option>
<option value="Montenegro">Montenegro</option>
<option value="Peru">Peru</option>

<option value="Egypt">Egypt</option>
<option value="Indonesia">Indonesia</option>
<option value="Norway">Norway</option>
<option value="Ukraine">Ukraine</option>
<option value="South Korea">South Korea</option>
<option value="Tunisia">Tunisia</option>
<option value="Albania">Albania</option>
<option value="Argentina">Argentina</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Belgium">Belgi&#235;</option>
<option value="Bosnia">Bosna i Hercegovina</option>
<option value="Brazil">Brazil</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Canada">Canada</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Colombia">Colombia</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">&#268;esk&aacute; republika</option>
<option value="Denmark">Danmark</option>
<option value="Germany">Deutschland</option>
<option value="Estonia">Eesti</option>
<option value="Spain">Espa&#241;a</option>
<option value="France">France</option>
<option value="Greece">Hellas</option>
<option value="Croatia">Hrvatska</option>
<option value="Israel">Israel</option>
<option value="Italy">Italia</option>
<option value="Latvia">Latvija</option>
<option value="Lithuania">Lietuva</option>
<option value="FYR Macedonia">Makedonija</option>
<option value="Malta">Malta</option>
<option value="Hungary">Magyarorsz&aacute;g</option>
<option value="Mexico">Mexico</option>
<option value="New Zealand">New Zealand</option>
<option value="Netherlands">Nederland</option>
<option value="Philippines">Philippines</option>
<option value="Poland">Polska</option>
<option value="Portugal">Portugal</option>
<option value="Romania">Rom&#226;nia</option>
<option value="Russia">Rossiya</option>
<option value="Switzerland">Schweiz</option>
<option value="Slovenia">Slovenija</option>
<option value="Slovakia">Slovensko</option>
<option value="Serbia">Srbija</option>
<option value="Finland">Suomi</option>
<option value="Sweden">Sverige</option>
<option value="Thailand">Thailand</option>
<option value="Turkey">T&uuml;rkiye</option>
<option value="United Kingdom">United Kingdom</option>
<option value="Uruguay">Uruguay</option>
<option value="USA">USA</option>
<option value="Venezuela">Venezuela</option>
</select></td></tr>

<tr><td width=125>Choose level:</td><td width=150>
<select name="league_level">
<option value=1>level 1 (1 new league)</option>
<option value=2>level 2 (3 new leagues)</option>
<option value=3>level 3 (9 new leagues)</option>
<option value=4>level 4 (27 new leagues)</option>
<option value=5>level 5 (81 new leagues)</option>
<option value=6>level 6 (243 new leagues)</option>
<option value=7>level 7 (729 new leagues)</option>
</select></td></tr>

<tr><td colspan="2">
   <INPUT type="submit" value="Create new leagues" />
</td></tr>
  </table></form>


<?php

$query = "SELECT DISTINCT level, country FROM leagues ORDER BY country, level ASC";
$result = mysql_query($query);
$num=mysql_numrows($result);

echo "<br /><big><font color=red>ALREADY CREATED:</font></big><p></p>";

$i=0;
while ($i < $num) {

$country=mysql_result($result,$i,"country");
$level=mysql_result($result,$i,"level");

echo $country." - level ".$level."<br />";

$i++;
}

?> 

</body>
</html>