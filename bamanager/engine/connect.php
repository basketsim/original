<?
    $connect	=	mysql_connect(HOSTNAME,USER,PASSWORD) or die( "Error connecting to MySQL server ! ERROR : ".mysql_error());
	$select		=	mysql_select_db(DATABASE, $connect)or die("Error connecting to database ! Error : ".mysql_error());
?>