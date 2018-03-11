<?
	////////////////////////////////////////////////////////////////////////////////
	// This script is used for CBPP logout 											
	// Author: Florin Pandelea (aka obsy_)											
	// Last updated: 08.05.2007														
	////////////////////////////////////////////////////////////////////////////////

	$session_id		= $_COOKIE['CBPPCOOKIE'];

	/*
	$q	= "DELETE FROM cbpp_sessions WHERE session_id = '{$session_id}'";
	$r	= @mysql_query($q, $connect);
	*/
	header("Set-Cookie: CBPPCOOKIE=");
?>