<?php
require_once("check_session.php"); 
$szM = $label[600];
$szQuery = "DELETE FROM conf_user_folder WHERE user_id = ".$userid." AND folder_id = '$nFolderId'";
$resQuery = mysql_query($szQuery) or die(mysql_error());
?>
<form name="frmJoin" method="post" action="mainconf.php">
<input type="Hidden" name="szMessage" value="<?=$szM?>">
</form>
<script language="JavaScript">
document.frmJoin.submit();
</script>