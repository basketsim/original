<?php
//unset cookie
setcookie("userid", "", time()-3600, "/", ".basketsim.com", 0);
setcookie("geslo", "", time()-3600, "/", ".basketsim.com", 0);
setcookie("ligaa", "", time()-3600, "/", ".basketsim.com", 0);
setcookie("ligal", "", time()-3600, "/", ".basketsim.com", 0);
setcookie("ligan", "", time()-3600, "/", ".basketsim.com", 0);
setcookie("ligas", "", time()-3600, "/", ".basketsim.com", 0);
setcookie("ligap", "", time()-3600, "/", ".basketsim.com", 0);
if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
}
$user = $_POST['username'];
//if ($user<>'adiego3') {die("Basketsim is coming back soon! Thanks for your visit, please click back in your browser or backspace on your keyboard to get back to the previous page.");}
$pass = $_POST['password'];
$user=strip_tags($user);
$pass=strip_tags($pass);
$user=str_replace(" ","",$user);
$pass=str_replace(" ","",$pass);
$user=str_replace("%20","",$user);
$pass=str_replace("%20","",$pass);
$user=addslashes($user);
$pass=addslashes($pass);
$pass=md5($pass);
require_once('inc/config.php');
$results = mysql_query("SELECT userid FROM users WHERE bad_login < 10 AND password='".$pass."' AND login='".$user."' LIMIT 1");
if(mysql_num_rows($results)==1) {
$userid=mysql_result($results,0,"userid");
setcookie("userid", "$userid", time()+36000, "/", ".basketsim.com", 0);
setcookie("geslo", "$pass", time()+36000, "/", ".basketsim.com", 0);
$ip = $_SERVER['REMOTE_ADDR'];
mysql_query("UPDATE users SET lastlog=NOW(), lastip='$ip', is_online=1, last_active=NOW() WHERE userid='$userid' LIMIT 1");
mysql_query("INSERT INTO login VALUES ('', '$userid', '$ip', NOW());");
header('Location: index.php');
} else {
$results1 = mysql_query("SELECT userid, password, bad_login FROM users WHERE login='".$user."' LIMIT 1");
if (mysql_num_rows($results1)==1) {
$userid = mysql_result($results1,0,"userid");
$passcheck = mysql_result($results1,0,"password");
$bad_login = mysql_result($results1,0,"bad_login");
if ($bad_login > 9 AND $bad_login < 99) {header("Location: basketsim.php?n=2"); die();}
elseif ($bad_login > 98) {header("Location: basketsim.php?n=45"); die();}
else {mysql_query("UPDATE users SET bad_login=bad_login +1 WHERE userid=$userid");}
}
header("Location: basketsim.php?n=1");
}
?>