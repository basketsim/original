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

//Database file
require_once('load_database.php');
connect_me();

//Function to get user ip
function check_ip(){
	$ipParts = explode(".", $_SERVER["REMOTE_ADDR"]);
	if ($ipParts[0] == "165" && $ipParts[1] == "21") {    
    	if (getenv("HTTP_CLIENT_IP")) {
        	$ip = getenv("HTTP_CLIENT_IP");
        } elseif (getenv("HTTP_X_FORWARDED_FOR")) {
            $ip = getenv("HTTP_X_FORWARDED_FOR");
        } elseif (getenv("REMOTE_ADDR")) {
            $ip = getenv("REMOTE_ADDR");
        }
    } else {
       return $_SERVER["REMOTE_ADDR"];
   	}
   	return $ip;
}

//function to get user language
function get_language(){
	if($_SERVER["HTTP_ACCEPT_LANGUAGE"]){
		return $_SERVER["HTTP_ACCEPT_LANGUAGE"];
	} 
	if(getenv("HTTP_ACCEPT_LANGUAGE")){
		return getenv("HTTP_ACCEPT_LANGUAGE");
	}
	return NULL;
}

//function to get referral url
function get_referal(){
	if($_SERVER["HTTP_REFERER"]){
		return $_SERVER["HTTP_REFERER"];
	} 
	if(getenv("HTTP_REFERER")){
		return getenv("HTTP_REFERER");
	}
	return NULL;
}

//function to get user agents (browser,system)
function get_userinfo(){
	if($_SERVER["HTTP_USER_AGENT"]){
		return $_SERVER["HTTP_USER_AGENT"];
	} 
	if(getenv("HTTP_USER_AGENT")){
		return getenv("HTTP_USER_AGENT");
	}
	return NULL;
}

//function to get user country name
function get_country(){
	$user_ip = check_ip();
	$temp = explode('.',$user_ip);
	$ipnum = 16777216*$temp[0] + 65536*$temp[1] + 256*$temp[2] + $temp[3];
	
	$get_country = mysql_fetch_array(mysql_query("SELECT `country_name` FROM `geo_ip` 
			WHERE '$ipnum' >= `begin_num` AND '$ipnum' <= `end_num`"));
	return $get_country['country_name'];
}
//function to detect user defualt language if any
function detect_language($type){
	$list = array('af', 'ar', 'bg', 'ca', 'cs', 'da', 'de', 'el', 'en', 'es', 'et', 'fi', 'fr', 'gl', 'he', 'hi', 'hr', 'hu', 
			'id', 'it', 'ja', 'ko', 'ka', 'lt', 'lv', 'ms', 'nl', 'no', 'pl', 'pt', 'ro', 'ru', 'sk', 'sl', 'sq', 'sr', 'sv', 
			'th', 'tr', 'uk', 'zh');
		
	$list_complete = array('Afrikaans', 'Arabic', 'Bulgarian', 'Catalan', 'Czech', 'Danish', 'German', 'Greek', 'English',
			 'Spanish', 'Estonian', 'Finnish', 'French', 'Galician', 'Hebrew', 'Hindi', 'Croatian', 'Hungarian', 
			'Indonesian', 'Italian', 'Japanese', 'Korean', 'Georgian', 'Lithuanian', 'Latvian', 'Malay',
			 'Dutch', 'Norwegian', 'Polish', 'Portuguese', 'Romanian', 'Russian', 'Slovak', 'Slovenian', 'Albanian', 
			 'Serbian', 'Swedish', 'Thai', 'Turkish', 'Ukrainian', 'Chinese');


	$_AL=strtolower(get_language());
	$_UA=strtolower(get_userinfo());
 
	foreach($list as $sub => $K){
		if(strpos($_AL, $K)===0) {
			if($type == 2){
				return $K;
			} else {
				return $list_complete[$sub];
			}
		}
	}
	foreach($list as $sub => $K){
		if(strpos($_AL, $K)!==false){
			if($type == 2){
				return $K;
			} else {
				return $list_complete[$sub];
			}
		}
	}
	foreach($list as $sub => $K){
		if(preg_match("/[\[\( ]{$K}[;,_\-\)]/",$_UA)){
			if($type == 2){
				return $K;
			} else {
				return $list_complete[$sub];
			}	
		}
	}
	return NULL;
}

//Function to return user operating system
function get_user_system(){
	$user_info = get_userinfo();
    if (preg_match("/windows nt 5.1/i",$user_info)) $temp = 'Windows XP';
    elseif (preg_match("/windows xp/i",$user_info)) $temp = 'Windows XP';
    elseif (preg_match("/linux/i",$user_info)) $temp = 'Linux';
    elseif (preg_match("/macintosh/i",$user_info)) $temp = 'Macintosh';
    elseif (preg_match("/win 9x 4.90/i",$user_info)) $temp = 'Windows ME';
    elseif (preg_match("/windows me/i",$user_info)) $temp = 'Windows ME';
    elseif (preg_match("/windows nt 5.0/i",$user_info)) $temp = 'Windows 2000';
    elseif (preg_match("/windows 2000/i",$user_info)) $temp = 'Windows 2000';
    elseif (preg_match("/windows nt 3.1/i",$user_info)) $temp = 'Windows 3.1';
    elseif (preg_match("/windows nt 3.5.0/i",$user_info)) $temp = 'Windows 3.5';
    elseif (preg_match("/windows nt 3.5.1/i",$user_info)) $temp = 'Windows 3.51';
    elseif (preg_match("/windows nt 4.0/i",$user_info)) $temp = 'Windows NT 4.0';
    elseif (preg_match("/windows 98/i",$user_info)) $temp = 'Windows 98';
    elseif (preg_match("/windows 95/i",$user_info)) $temp = 'Windows 95';
    elseif (preg_match("/sunos/i",$user_info)) $temp = 'Sun';
    else return NULL;

    return $temp;
} 

//Function to check borwser
function get_user_browser(){
	$user_info = get_userinfo();
	require_once('browser_list.php');
	foreach($explorers_types as $sub => $name){
		if(eregi($explorer_string[$sub],$user_info)){ return $name;break;}
	}
	return NULL;
}

//Check Search engine referral
function is_engine(){
	$url = parse_url(get_referal());
	if(eregi('google',$url['host']) && eregi('q=',$url['query'])){
		return 'Google Search'; 
	}
	if(eregi('yahoo.com',$url['host']) && eregi('q=',$url['query'])){
		return 'Yahoo Search';
	}
	if(eregi('ask.com',$url['host']) && eregi('q=',$url['query'])){
		return 'Ask Search';
	}
	if(eregi('alltheweb.com',$url['host']) && eregi('q=',$url['query'])){
		return 'All The Web Search';
	}
	if(eregi('aol.com',$url['host']) && eregi('query=',$url['query'])){
		return 'AOL Search';
	}
	if(eregi('hotbot.com',$url['host']) && eregi('query=',$url['query'])){
		return 'Hot Bot';
	}
	if(eregi('teoma.com',$url['host']) && eregi('q=',$url['query'])){
		return 'Teoma';
	}
	if(eregi('altavista.com',$url['host']) && eregi('q=',$url['query'])){
		return 'Alta Vista Search';
	}
	if(eregi('gigablast.com',$url['host']) && eregi('q=',$url['query'])){
		return 'Giga Blast';
	}
	if(eregi('looksmart.com',$url['host']) && eregi('qt=',$url['query'])){
		return 'Look Smart';
	}
	if(eregi('lycos.com',$url['host']) && eregi('query=',$url['query'])){
		return 'Lycos Search';
	}
	if(eregi('msn.com',$url['host']) && eregi('q=',$url['query'])){
		return 'MSN Search';
	}
	if(eregi('netscape.com',$url['host']) && eregi('query=',$url['query'])){
		return 'Netscape Search';
	}
	if(eregi('dmoz.org',$url['host']) && eregi('q=',$url['query'])){
		return 'DMOZ';
	}
	if(eregi('excite.com',$url['host']) && eregi('/search/web/',$url['query'])){
		return 'Excite';
	}
	if(eregi('alexa.com',$url['host']) && eregi('q=',$url['query'])){
		return 'Alexa';
	}	
	if(eregi('a9.com',$url['host']) && eregi('http://a9.com',$url['host'])){
		return 'A9';
	}		
	return NULL;
}



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