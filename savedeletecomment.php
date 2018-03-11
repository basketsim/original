<?php
$dbyear = date("Y"); $dbmonth = date("m"); $dbday = date("d"); $dbhour = date("H"); $dbmin = date("i"); $dbsec = date("s"); $now = date("Y-m-d H:i:s", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));
require_once("check_session.php");
	if(!isset($nTopicId) || !isset($nCommentId)){die();}
	$resQuery = mysql_query("UPDATE conf_comments SET status = '2', deleted_by = ".$userid.", date_deleted = '$now' WHERE comment_id = '$nCommentId'") or die(mysql_error());
	?>
	<form name="frmForward" method="post" target="_self" action="mainconf.php">
		<input type="Hidden" name="szAction" value="viewtopic">
		<input type="Hidden" name="nTopicId" value="<?=$nTopicId?>">
		<input type="Hidden" name="nCommentId" value="<?=$nCommentId?>">
		<input type="Hidden" name="nAsReply" value="1">
	</form>
	<script language="JavaScript">
		document.frmForward.submit();
	</script>