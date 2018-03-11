<?php
/*********************************************************
		This Free Script was downloaded at			
		Free-php-Scripts.net (HelpPHP.net)			
	This script is produced under the LGPL license		
		Which is included with your download.			
	Not like you are going to read it, but it mostly	
	States that you are free to do whatever you want	
			With this script!						
		NOTE: Linkback is not required, 
	but its more of a show of appreciation to us.					
*********************************************************/
//include function file
require_once('stat_functions.php');

//Get User countery
$country = get_country();
echo "You are from: $country<br/>";

//See if flag is in flags folder
$flag_dir = 'flags/';
$image_name = strtolower(str_replace(' ','_',$country)).'.gif';
if(@is_file($flag_dir.$image_name)){
   echo '<img src="'.$flag_dir.'/'.$image_name.'"><br/>';
}

//Print our user IP
$user_ip = check_ip();
echo "Your IP is: $user_ip<br/>";

//Echo referral url
$referral = get_referal();
echo "You came from: $referral<br/>";

//Check if referral is a search engine, and what
$search_engine = is_engine();
echo "Your came from search engine: $search_engine<br/>";

//Echo user system's language (two letters or complete)
// Two letters -> 2, complete -> 1
$language_two_let = detect_language(2);
$language_name = detect_language(1);
echo "Your language is $language_two_let:$language_name<br/>";

//Get user operatings system
$operating = get_user_system();
echo "Your operating system is: $operating<br/>";

//Get User browser
$browser = get_user_browser();
echo "Your browser is called: $browser<br/>";

//Disconnect from database
disconnect_me();

/* +++++++++++++++++++++++++++++++++++++
		END FILE 
---------------------------------------*/

/*
Partner Sites:
====================

Free File Upload: 
			http://www.HotFile.us
			
Free Image Hosting: 
			http://www.MyImage.us
			
Free Games (all type of games): 
			http://www.FunTimes.us
			
Free Templates: 
			http://www.freephptemplate.com
			
PHP Skills and Tricks: 
			http://www.phptricks.com
*/

?>