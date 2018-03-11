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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
<h3>Create fixtures</h3>
<p><a href="index.php">Main</a></p>
<p><?php echo $msg?></p>


<form action="create_fixtures.php" method="POST" style="margin: 0">
<table>

<tr><td width=125>Choose country:</td><td width=150>
<select name="fixtures_country">
<option value="Argentina">Argentina</option>
<option value="Belgium">Belgi&#235;</option>
<option value="Chile">Chile</option>
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
<option value="Netherlands">Nederland</option>
<option value="Poland">Polska</option>
<option value="Portugal">Portugal</option>
<option value="Romania">Rom&#226;nia</option>
<option value="Slovenia">Slovenija</option>
<option value="Serbia">Srbija</option>
<option value="USA">USA</option>
</select></td></tr>

<tr><td width=80>Choose hour for league matches:</td><td width=150>
<select name="league_hour">
<option value="1">1.00</option>
<option value="2">2.00</option>
<option value="3">3.00</option>
<option value="4">4.00</option>
<option value="5">5.00</option>
<option value="6">6.00</option>
<option value="7">7.00</option>
<option value="8">8.00</option>
<option value="9">9.00</option>
<option value="10">10.00</option>
<option value="11">11.00</option>
<option value="12">12.00</option>
<option value="13">13.00</option>
<option value="14">14.00</option>
<option value="15">15.00</option>
<option value="16">16.00</option>
<option value="17">17.00</option>
<option value="18">18.00</option>
<option value="19">19.00</option>
<option value="20">20.00</option>
<option value="21">21.00</option>
<option value="22">22.00</option>
<option value="23">23.00</option>
</select></td></tr>

<tr><td width=80>Choose hour for cup matches:</td><td width=150>
<select name="cup_hour">
<option value="1">1.00</option>
<option value="2">2.00</option>
<option value="3">3.00</option>
<option value="4">4.00</option>
<option value="5">5.00</option>
<option value="6">6.00</option>
<option value="7">7.00</option>
<option value="8">8.00</option>
<option value="9">9.00</option>
<option value="10">10.00</option>
<option value="11">11.00</option>
<option value="12">12.00</option>
<option value="13">13.00</option>
<option value="14">14.00</option>
<option value="15">15.00</option>
<option value="16">16.00</option>
<option value="17">17.00</option>
<option value="18">18.00</option>
<option value="19">19.00</option>
<option value="20">20.00</option>
<option value="21">21.00</option>
<option value="22">22.00</option>
<option value="23">23.00</option>
</select></td></tr>


<tr><td><b>Starting year:</b></td><td>
<input type="text" name="syear" size="4">
</td></tr>
<tr><td><b>Starting month (numeric):</b></td><td>
<input type="text" name="smonth" size="2">
</td></tr>
<tr><td><b>Starting day (numeric):</b></td><td>
<input type="text" name="sday" size="2">
(Must be saturday!)</td></tr>

<tr><td colspan="2">
   <INPUT type="submit" value="Create fixtures for selected league" />
</td></tr>
  </table></form>


<p></p><big><font color=red>Proposed dates:</font></big><br />
Argentina - SAT 01:00 THU 06:00<br />
Belgium - SAT 16:00 THU 21:00<br />
Chile - SAT 03:00 THU 07:00<br />
Germany - SAT 18:00 THU 22:00<br />
Estonia - SAT 12:00 THU 18:00<br />
Spain - SAT 17:00 THU 18:00<br />
France - SAT 20:00 THU 15:00<br />
Greece - SAT 16:00 THU 18:00<br />
Croatia - SAT 15:00 THU 17:00<br />
Israel - SAT 11:00 THU 15:00<br />
Italy - SAT 13:00 THU 19:00<br />
Latvia - SAT 13:00 THU 18:00<br/>
Lithuania - SAT 15:00 THU 17:00<br />
Netherlands - SAT 19:00 THU 16:00<br />
Poland - SAT 12:00 THU 19:00<br />
Portugal - SAT 21:00 THU 19:00<br />
Romania - SAT 20:00 THU 20:00<br />
Slovenia - SAT 14:00 THU 16:00<br />
Serbia - SAT 14:00 THU 17:00<br />
USA - SAT 02:00 THU 05:00<br />


</body>
</html>
