<?php
require_once("check_session.php");
$nTopicId = $_GET["nTopicId"];
if(empty($nTopicId)) {die();}
if($current_right < 2) {die();}

$resQuery = mysql_query("DELETE FROM conf_topics WHERE status = 2 AND topic_id = $nTopicId LIMIT 1") or die(mysql_error());
$resQuery1 = mysql_query("DELETE FROM conf_comments WHERE topic_id = $nTopicId") or die(mysql_error());
$resQuery2 = mysql_query("DELETE FROM conf_last_read WHERE topic_id = $nTopicId") or die(mysql_error());
?>
	<form name="frmForward" method="post" target="_self" action="mainconf.php">
		<input type="Hidden" name="szAction" value="viewtopic">
		<input type="Hidden" name="nTopicId" value="<?=$nTopicId?>">
	</form>
	<script language="JavaScript">
		document.frmForward.submit();
	</script>