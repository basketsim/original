<?php
if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}
mysql_query("UPDATE users SET is_online = 0 WHERE password ='$koda' AND userid ='$userid' LIMIT 1");
setcookie("userid", "", time()-3600, "/", ".basketsim.com", 0);
setcookie("geslo", "", time()-3600, "/", ".basketsim.com", 0);
if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
}
header("location: index.php?n=12");
?>