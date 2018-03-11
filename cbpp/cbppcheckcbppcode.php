<?
	////////////////////////////////////////////////////////////////////////////////
	// This script is used for checking if user has a CBPP code set					
	// Author: Florin Pandelea (aka obsy_)											
	// Last updated: 03.07.2007														
	////////////////////////////////////////////////////////////////////////////////

	$fetched_date	= date("d.m.Y H:i:s");
	$username		= $_GET['username'] ? $_GET['username'] : $_POST['username'];
	$username		= trim($username);

	$succes		= "False";
	$hascode	= "False";
	$UserID		= 0;

	if(strlen($username))
	{
		$username	= trim($username);
		$q	= "SELECT * FROM users WHERE username = '$username'";
		$r	= @mysql_query($q, $connect);
		if($r && @mysql_num_rows($r))
		{
			$succes		= "True";

			$a			= mysql_fetch_array($r);
			if(strlen(trim($a["cbpp_code"])))
			{
				$hascode	= "True";
				$UserID		= $a["userid"];
			}
		}
	}

			//xml part
$xml	= "<?xml version=\"1.0\"?>
<BasketSimData>
	<FileName>checkcbppcode.php</FileName> 
	<Version>1.0</Version> 
	<FetchedDate>$fetched_date</FetchedDate>
	<UserID>$UserID</UserID>
	<ActionSuccessful>$succes</ActionSuccessful>
	<HasCbppCode>$hascode</HasCbppCode>
</BasketSimData>";

	header("Set-Cookie: CBPPCOOKIE={$session_id}; path=/; domain={$HTTP_HOST}; expires=".date("l, d-M-Y H:i:s", time()+1800));
	header('Content-Type: text/html; charset=UTF-8');
?>