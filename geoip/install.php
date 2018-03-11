<?php
ini_set('memory_limit', '64M');
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

/*
First query to create table
*/
$table_creation_query = "CREATE TABLE `geo_ip` (
  `record_id` bigint(20) NOT NULL auto_increment,
  `begin_ip` varchar(25) NOT NULL default '',
  `end_ip` varchar(255) NOT NULL default '',
  `begin_num` bigint(20) NOT NULL default '0',
  `end_num` bigint(20) NOT NULL default '0',
  `iso_code` varchar(4) NOT NULL default '',
  `country_name` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`record_id`)
) COMMENT='Geo IP Table' ;";

/* 
Setup Database File Data
*/
$database_info = '<?php
/*********************************************************
		This Free Script was downloaded at			
				Free-php-Scripts.net	
	This script is produced under the GPL license		
		You can do or modify this script as you like.			
Note 1: Administrator copyright notice CAN NOT be removed					
Note 2: User front Powered by Notices can be removed ONLY
if you change the site design/look so it won\'t reflect
				www.HotFile.us looks
*********************************************************/

//Function to connect to database 
function connect_me(){
	$DB_USER =  \''.$_POST['username'].'\';
	$DB_PASSWORD = \''.$_POST['password'].'\';
	$DB_HOST =  \''.$_POST['hostname'].'\';
	$dbc = mysql_connect ($DB_HOST, $DB_USER, $DB_PASSWORD) or ($error = mysql_error());
	mysql_select_db(\''.$_POST['databasename'].'\') or $error = mysql_error();
	mysql_query("SET NAMES `utf8`") or $error = mysql_error();
	if($ERROR_REPORTING == 1){ do_error($error,2);}	
}

//Function to disconnect from it
function disconnect_me(){
	@mysql_close($dbc);
	@mysql_close();
}

?>';

//Check if installing step 1+2
if($_POST['step_id'] == 1){
	if($_POST['installf'] == 1){
		include('load_database.php');
		$error = connect_me();
	} else {
		$dbc = @mysql_connect ($_POST['hostname'], $_POST['username'], $_POST['password']) or ($error = mysql_error());
		@mysql_select_db($_POST['databasename']) or $error = mysql_error();
		if($error == NULL){
			$file = fopen('load_database.php','w');
			if($file){
				fwrite($file,$database_info);
				fclose($file);		
				$_POST['step_id'] = 2;
			} else {
				$error  = 'Unable to open load_database.php for editing. Please insure it is chmoded to 777.<br/> Do now know what CHMOD is? Visit: http://www.free-php-scripts.net/CHMOD';
				$_POST['step_id'] = 1;
			}
		}
	}
	if($error == NULL){
		$_POST['step_id'] = 2;
	} else {
		$message = 'Error while connecting to database. Error returned:<br/>'.$error;
		$_POST['step_id'] = 1;
	}
}

//Set step id
if($_POST['step_id'] == NULL){$_POST['step_id'] = 1;}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>File Hosting Script :: Setup</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body>
<?php
if($message != NULL){?>
<table width="100%"  border="0" cellpadding="5" cellspacing="0" bgcolor="#FFC1C1">
  <tr>
    <td><strong><font color="#FF0000"><?=$message;?></font></strong></td>
  </tr>
</table>
<br/>
<?php } 
if($_POST['step_id'] == 1){?>
<p><font color="#990000"><strong>Step 1:</strong></font>,</p>
<p>Did you setup file &quot;load_database.php&quot; with your database connection information?</p>
<form name="form1" method="post" action="">
  <p>
    <input name="installf" type="radio" value="1"> 
  Yes I already did that</p>
  <p>
    <input name="installf" type="radio" value="2" checked> 
  No, please do that for me, here is the information<br/>
  <?php
	$file = @fopen('load_database.php','w');
	if($file){
		@fclose($file);
		echo '<font color="#0000FF">Database File is writeable, insure that you chmoded it back to 644 after installation is complete</font>';
	} else {
		echo '<font color="#FF0000">Database File: <font color="#0000FF">incs/load_database.php</font> is not writeable; Chmoded to 777, learn how: <a href="http://www.free-php-scripts.net/CHMOD" target="_blank">http://www.free-php-scripts.net/CHMOD</a></font>';
	}
	?></p>
  <table width="100%"  border="0" cellspacing="0" cellpadding="3">
    <tr>
      <td style="border:1px solid #CCCCCC;" width="50%"><strong>Database Host Name </strong></td>
      <td style="border:1px solid #CCCCCC;" width="50%"><input name="hostname" type="text" id="hostname"></td>
    </tr>
    <tr>
      <td style="border:1px solid #CCCCCC;" width="50%"><strong>Database User Name: </strong></td>
      <td style="border:1px solid #CCCCCC;" width="50%"><input name="username" type="text" id="username"></td>
    </tr>
    <tr>
      <td style="border:1px solid #CCCCCC;" width="50%"><strong>Username Password: </strong></td>
      <td style="border:1px solid #CCCCCC;" width="50%"><input name="password" type="text" id="password"></td>
    </tr>
    <tr>
      <td style="border:1px solid #CCCCCC;" width="50%"><strong>Database Name:</strong></td>
      <td style="border:1px solid #CCCCCC;" width="50%"><input name="databasename" type="text" id="databasename"></td>
    </tr>
  </table>
  <p><font color="#990000"><strong>Step 2:</strong></font></p>
  <p>Did you download updated <a href="http://www.maxmind.com/download/geoip/database/GeoIP.dat.gz" target="_blank">MaxMind GeoIP Country CSV</a>?</p>
  <p>
    Yes I already did, and extracted the file &quot;GeoIPCountryWhois.csv&quot; into the same directory as install.php.</p>
  <p>
  No -&gt; Use the one included (might be outdated thou). </p>
  <p align="center">
    <input type="submit" name="Submit" value="Setup Database and Convert GeoIP Into it">
    <input name="step_id" type="hidden" id="step_id" value="1">
  </p>
</form>
<?php } else { ?>
<p>Please wait while processing installation: </p>
<table width="100%"  border="0" cellspacing="0" cellpadding="3">
<?php
if(!is_file('GeoIPCountryWhois.csv')){
	$mes_geo = '<font color="#FF0000">Could not find file "GeoIPCountryWhois.csv", please download <a href="http://www.maxmind.com/download/geoip/database/GeoIP.dat.gz">this file</a> and extract it to current directory and try again.</font>';
} else {
	$file = fopen('GeoIPCountryWhois.csv','r');
	if($file){
		while($cont = fread($file,1026467)){
			$cvs_data .= $cont;
		}
		fclose($file);
		$create_table = mysql_query($table_creation_query);
		$lines = explode("\n",$cvs_data);
		$queryies = array();
		foreach($lines as $line){
			$cvs_info = explode(',',$line);
			foreach($cvs_info as $sub => $is){
				$cvs_info[$sub] = str_replace('"','',$is);
			}
			array_push($queryies,"INSERT INTO `geo_ip` 
				(`begin_ip`,`end_ip`,`begin_num`,`end_num`,`iso_code`,`country_name`) VALUES
				('$cvs_info[0]','$cvs_info[1]','$cvs_info[2]','$cvs_info[3]','$cvs_info[4]','".addslashes($cvs_info[5])."')");
			
		}
		mysql_query("TRUNCATE TABLE `geo_ip`");
		foreach($queryies as $query){
			$insert_record = mysql_query($query);
		}
		$mes_geo = 'Done';
	} else {
		$mes_geo = '<font color="#FF0000">Unable to open find file "GeoIPCountryWhois.csv" for reading.</font>';
	}
}

?>
  <tr>
    <td style="border:1px solid #CCCCCC;" width="25%"><strong>Converting GeoIP into MYSQL: </strong></td>
    <td style="border:1px solid #CCCCCC;" width="75%"><strong><?=$mes_geo;?></strong></td>
  </tr>
  <tr>
    <td colspan="2" style="border:1px solid #CCCCCC;"><div align="center">
      <p align="left"><em><font color="#0066FF">Your installation is complete. Please:</font></em></p>
      <div align="left">
        <ul>
            <li><font color="#0066FF"><em>Chmod load_database.php back to 644.</em></font></li>
            <li><font color="#0066FF"><em>Insure that you run install.php on a monthly basis to insure you are up-to-date.</em></font></li>
        </ul>
      </div>
    </div></td>
  </tr>
</table>
<?php } ?>
<p>&nbsp; </p>
</body>
</html>