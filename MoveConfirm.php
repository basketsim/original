<?php
require_once("check_session.php");
if($current_right < 2) {die();}
	if(!isset($nTopicId) || !isset($nCommentId)){die();}
	$bError	= FALSE;
	if($bError) {
	?>
	<form name="frmReturn" method="post" target="_self" action="mainconf.php">
		<input type="Hidden" name="szAction" value="replycomment">
		<input type="Hidden" name="nTopicId" value="<?=$nTopicId?>">
		<input type="Hidden" name="nCommentId" value="<?=$nCommentId?>">
		<input type="Hidden" name="szComment" value="<?=htmlspecialchars(stripslashes($szComment))?>">
	</form>
	<script language="JavaScript">
		document.frmReturn.submit();
	</script>
	<?php
	}
	else
	{
	$resQuery = mysql_query("UPDATE conf_topics SET `folder_id` ='$szComment' WHERE topic_id ='$nTopicId' LIMIT 1") or die(mysql_error());
	?>
	<form name="frmForward" method="post" target="_self" action="mainconf.php">
	<input type="Hidden" name="szAction" value="viewtopic">
	<input type="Hidden" name="nTopicId" value="<?=$nTopicId?>">
	<input type="Hidden" name="nCommentId" value="<?=$nCommentId?>">
	</form>
	<script language="JavaScript">
	document.frmForward.submit();
	</script>
	<?php }?>