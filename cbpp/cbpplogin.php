<?
	////////////////////////////////////////////////////////////////////////////////
	// This script is used for CBPP login 											
	// Author: Florin Pandelea (aka obsy_)											
	// Last updated: 03.07.2007														
	////////////////////////////////////////////////////////////////////////////////

	function microtime_float()
	{
	    list($usec, $sec) = explode(" ", microtime());
	    return ((float)$usec + (float)$sec);
	}
	
	$fetched_date	= date("d.m.Y H:i:s");
	$userid			= 0;
	$success		= "False";
	$session_id		= "";
	$username		= $_GET['username'] ? $_GET['username'] : $_POST['username'];
	$password		= $_GET['password'] ? $_GET['password'] : $_POST['password'];

	$username		= trim($username);
	$password		= trim($password);

	//check if current username & password is ok
	$q	= "SELECT userid FROM users WHERE username = '{$username}' AND cbpp_code = '{$password}' AND LENGTH(cbpp_code)";
	$r	= @mysql_query($q, $connect);
	if($r && @mysql_num_rows($r))
	{
		$a			= mysql_fetch_array($r);
		$userid		= $a['userid'];
		$success	= "True";

		//check if is an authorized CBPP user
		$q	= "SELECT userid FROM cbpp_users WHERE userid = '{$userid}'";

		$r	= @mysql_query($q, $connect);

		if($r && @mysql_num_rows($r))
		{
			$a	= mysql_fetch_array($r);
			$session_id	= md5($userid.microtime_float()."f837dhsgd4");

			/*
			//is time to create the BSSP session
			$q	= "INSERT INTO cbpp_sessions SET user_id = '{$userid}', session_id = '{$session_id}', session_time = '".time()."', user_agent = '{$_SERVER['HTTP_USER_AGENT']}'";
			$r	= @mysql_query($q, $connect);
			if(!$r)
			{
				$session_id		= "";
			}
			*/
		}
	}

	$xml	= "<?xml version=\"1.0\"?>
<BasketSimData>
	<FileName>login.php</FileName> 
	<Version>1.0</Version> 
	<FetchedDate>$fetched_date</FetchedDate>
	<LoginData>
		<UserID>$userid</UserID>
		<ActionSuccessful>$success</ActionSuccessful>
	</LoginData>
</BasketSimData>";

	header("Set-Cookie: CBPPCOOKIE={$session_id}; path=/; domain={$HTTP_HOST}; expires=".date("l, d-M-Y H:i:s", time()+1800));
	header('Content-Type: text/html; charset=UTF-8');
?>