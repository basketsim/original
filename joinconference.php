<?php
require_once("check_session.php"); 
$dbyear = date("Y"); $dbmonth = date("m"); $dbday = date("d"); $dbhour = date("H"); $dbmin = date("i"); $dbsec = date("s"); $now = date("Y-m-d H:i:s", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));
$nFolderId = $nFolderId;

if ($nFolderId == 'Gamemasters' AND $current_right < 3) {die();}
if ($nFolderId == 'Moderators' AND $current_right < 2) {die();}
if ($nFolderId == 'Language' AND $langad <> 1) {die();}
if ($nFolderId == 'National coaches' AND $natac < 1) {die();}

$szQuery = "SELECT folder_id FROM conf_user_folder WHERE user_id = ".$userid." AND folder_id = '$nFolderId'";
$resQuery = mysql_query($szQuery) or die(mysql_error());
$szM = $label[601];
if(!mysql_num_rows($resQuery))
{
	$szQuery = "INSERT INTO conf_user_folder SET user_id = ".$userid.", folder_id = '$nFolderId', join_date = '$now'";
	$resQuery = mysql_query($szQuery) or die(mysql_error());
}
else {$szM = $label[521];}
?>
<form name="frmJoin" method="post" action="mainconf.php">
<input type="Hidden" name="szMessage" value="<?=$szM?>">
</form>
<script language="JavaScript">
document.frmJoin.submit();
</script>