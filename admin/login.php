<?php
session_start();
require_once("../inc/config.php");
$msg = "";

if (isset($_POST['Submit']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];

	$result = mysql_query("SELECT * FROM admin WHERE username='$username'");
	
	if(mysql_num_rows($result)>0)
	{
		$row = mysql_fetch_array($result, MYSQL_BOTH);
		if($password == $row["password"])
		{

			$_SESSION['adminok'] = "ok";
			$_SESSION['username'] = "username";
			$_SESSION['password'] = "password";
			header("Location: index.php");

		}
		else
		{
			$msg = "Password incorrect";
		}
	}
	else
	{
		$msg = "Username incorrect";
    }

}
?>

<html>
<head>
<title>Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body>
<p align="center"><strong>Basketsim Admin Control Panel</strong></p>
<form name="form1" method="post" action="">
  <p align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Please 
    enter corrent username and password to login</font></p>
  <table width="48%" border="1" align="center" cellpadding="1" cellspacing="1" bordercolor="#000000">
    <tr bgcolor="#CCCCCC"> 
      <td colspan="2"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Login 
        here</strong></font></td>
    </tr>
    <tr> 
      <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Username</font></td>
      <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input name="username" type="text" id="username">
        </font></td>
    </tr>
    <tr> 
      <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Password</font></td>
      <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input name="password" type="password" id="password">
        </font></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Submit"></td>
    </tr>
  </table>
<p>&nbsp;</p></form>
</body>
</html>