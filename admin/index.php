<?php
include_once("common.php");
checklogin();
?>
<html>
<head>
<title>Admin - basketsim</title>
</head>

<body bgcolor="#BCCDCC">
<h4 align="center"><font face="Geneva, Arial, Helvetica, sans-serif">Basketsim Admin Control Panel</font></h4>
<table width="76%" border="1" align="center" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
  <tr> 
    <td width="3%" bgcolor="#CCCCCC"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td width="97%" bgcolor="#CCCCCC"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Operations</strong></font></td>
  </tr>
<?php if ($userid==1333333333333333){?>
  <tr> 
    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><a href="new_leagues.php">Creation of new leagues</a></font></td>
  </tr>
  <tr> 
    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><a href="confirm_bots.php">Activation of bot teams</a></font></td>
  </tr>
  <tr> 
    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><a href="new_fixtures.php">Creation of match fixtures</a></font></td>
<?php }?>
  <tr> 
    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><a href="manage.php">Activate new clubs</a></font></td>
  </tr>
  <tr> 
    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><a href="zapiranje.php">Delete inactive teams</a></font></td>
  </tr>
  <tr> 
    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><a href="transfers.php">Adjust market prices</a></font></td>
  </tr>
  <tr> 
    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><a href="transfers_o.php">Check current bids</a></font></td>
  </tr>
  <tr> 
    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><a href="search.php">Search users by email</a></font></td>
  </tr>
  <tr> 
    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><a href="logins.php">Browse logins database</a></font></td>
  </tr>
  <tr> 
    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><a href="IP.php">Operate with IP addresses</a></font></td>
  </tr>
  <tr> 
    <td height="23" bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><a href="logout.php">Logout</a></font></td>
  </tr>
</table>

</body>
</html>

