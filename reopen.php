<?php
require_once("check_session.php");
$nTopicId = $_GET["nTopicId"];
$nCommentId = $_GET["$nCommentId"];
if(empty($nTopicId)) {die();}
if($current_right < 2) {die();}
$szQuery = "UPDATE conf_topics SET status = 1, date_deleted = '0000-00-00 00:00:00' WHERE topic_id = $nTopicId LIMIT 1";
$resQuery = mysql_query($szQuery) or die(mysql_error());
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