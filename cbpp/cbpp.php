<?

	////////////////////////////////////////////////////////////////////////////////
	// This script is the entry point for the CBPP interface						
	// Author: Florin Pandelea (aka obsy_)											
	// Last updated: 08.05.2007														
	////////////////////////////////////////////////////////////////////////////////

	define("CBPP", "1");
	//this is a dummy function - use it for callback function for ob_start
	function dummy()
	{
		//
	}

	//avoid output buffering
	ob_start("dummy");

	require_once("./cbppconfig.php");
	require_once("./cbppmysql.php");
	require_once("./cbppgarbage.php");
	require_once("./cbppsession.php");

	if($have_session || $option == "login" || $option == "logout")
	{
		$option		= $_GET['option'] ? $_GET['option'] : $_POST['option'];
		$script		= "cbpp".strtolower($option).".php";

		if(file_exists($script))
		{
			include($script);
		}
	}
	ob_end_flush();

	@mysql_close($connect);
	
	echo $xml;
?>