<?
	////////////////////////////////////////////////////////////////////////////////
	// This script is used to connect to MySQL server and to select the database	
	// Author: Florin Pandelea (aka obsy_)											
	// Last updated: 09.05.2007														
	////////////////////////////////////////////////////////////////////////////////
	$connect	=	@mysql_connect(HOSTNAME,USER,PASSWORD);
	if(!$connect)
	{
		die();
	}

	$select		=	@mysql_select_db(DATABASE, $connect);
	if(!$select)
	{
		die();
	}
?>