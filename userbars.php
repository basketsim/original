<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {include_once('inc/basic.php'); require("inc/lang/en.php");}
else {
include_once('inc/config.php');
include_once('inc/header.php');
include_once('inc/osnova.php');
$compare = mysql_query("SELECT lang FROM users WHERE password ='$koda' AND userid ='$userid'") or die(mysql_error());
if (mysql_num_rows($compare)==1) {$lang = mysql_result($compare,0);} else {$lang='en';}
require("inc/lang/".$lang.".php");
}
?>

<div id="main">
<h2><?=$langmark1117?></h2>

<table border="0" cellspacing="10" cellpadding="10" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="65%">

<img src="img/graphics/userbar2.png" border="0"><br><br>
<img src="img/graphics/userbar1.png" border="0"><br><br>
<img src="img/graphics/userbar1.gif" border="0"><br><br>
<img src="img/graphics/userbar3a.gif" border="0"><br><br>
<img src="img/graphics/userbar4a.gif" border="0"><br><br>
<img src="img/graphics/userbar5e.png" border="0"><br><br>
<img src="img/graphics/ubanner4.png" border="0"><br><br>
<img src="img/graphics/ubanner1.png" border="0"><br><br>
<img src="img/graphics/ubanner3.png" border="0"><br><br>
<img src="img/graphics/ubanner5.png" border="0"><br><br>
<img src="img/graphics/ubanner2.png" border="0"><br><br>

</td><td class="border" width="35%">

<?=$langmark1118?><br/><br/><a href="club.php?clubid=1820">GD-Longer</a><br/><a href="club.php?clubid=11927">ascaron</a>
</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>