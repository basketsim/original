<?php
include_once("common.php");
checklogin();
?>
<html>
<head>
<title>Admin - basketsim</title>
</head>
<body bgcolor="#BCCDCC">
<table width="75%" border="1" align="center" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
<tr> 
<td width="100%" bgcolor="#CCCCCC"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
&lt;a href=&quot;player.php?playerid=XXX&quot;&gt;NAME&lt;/a&gt;<br/>
&lt;a href=&quot;club.php?clubid=XXX&quot;&gt;NAME&lt;/a&gt;<br/>
&lt;b&gt;&lt;/b&gt; | &lt;i&gt;&lt;/i&gt; | &lt;u&gt;&lt;/u&gt;
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" style="margin: 0">
<input type="text" size="36" maxlength="32" name="title" value="Title"><br/>
<textarea style="width:95%;padding:1px;border-style:solid;border-color:darkred;background-color:#F5F5F5;" rows="50" name="message" wrap="soft"></textarea><br/>
<input type="submit" value="SUBMIT NEWS" name="submit" class="buttonreg">
</form>

</td>
</tr>
</table>
</body>
</html>