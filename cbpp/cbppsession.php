<?
	////////////////////////////////////////////////////////////////////////////////
	// This script is used for CBPP  												
	// Author: Florin Pandelea (aka obsy_)											
	// Last updated: 08.05.2007														
	////////////////////////////////////////////////////////////////////////////////

	$have_session	= TRUE;
	$session_id		= $_COOKIE['CBPPCOOKIE'];
	
	if(strlen($session_id))
	{
		$have_session	= TRUE;
	}
	else
	{
		$have_session	= FALSE;
	}
	
	/*
	$q	= "SELECT * FROM cbpp_sessions WHERE session_id = '{$session_id}'";
	$r	= @mysql_query($q, $connect);
	if(!@mysql_num_rows($r))
	{
		$have_session	= FALSE;
	}
	else
	{
		$q	= "UPDATE cbpp_sessions SET session_time = ".time()." WHERE session_id = '{$session_id}'";
		$r	= @mysql_query($q, $connect);
	}
	*/
?>