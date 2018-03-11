<?php
/*********************************************************
		This Free Script was downloaded at			
				Free-php-Scripts.net	
	This script is produced under the GPL license		
		You can do or modify this script as you like.			
Note 1: Administrator copyright notice CAN NOT be removed					
Note 2: User front Powered by Notices can be removed ONLY
if you change the site design/look so it won't reflect
				www.HotFile.us looks
*********************************************************/

//Function to connect to database 
function connect_me(){
	$DB_USER =  'bulatov';
	$DB_PASSWORD = 'boberka117';
	$DB_HOST =  'mysql.basketsim.com';
	$dbc = mysql_connect ($DB_HOST, $DB_USER, $DB_PASSWORD) or ($error = mysql_error());
	mysql_select_db('basketsim') or $error = mysql_error();
	mysql_query("SET NAMES `utf8`") or $error = mysql_error();
	if($ERROR_REPORTING == 1){ do_error($error,2);}	
}

//Function to disconnect from it
function disconnect_me(){
	@mysql_close($dbc);
	@mysql_close();
}

?>