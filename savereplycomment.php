<?php
$dbyear = date("Y"); $dbmonth = date("m"); $dbday = date("d"); $dbhour = date("H"); $dbmin = date("i"); $dbsec = date("s"); $now = date("Y-m-d H:i:s", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));
require_once("check_session.php");

	if(!isset($nTopicId) || !isset($nCommentId)){die();}
	$bError	= FALSE;
	if(!strlen(trim($szComment))) {
		$bError = TRUE;
		$szErrorMessage	= $label[24];
	}

	if($bError)
	{
	?>
	<form name="frmReturn" method="post" target="_self" action="mainconf.php">
		<input type="Hidden" name="szAction" value="replycomment">
		<input type="Hidden" name="nTopicId" value="<?=$nTopicId?>">
		<input type="Hidden" name="nCommentId" value="<?=$nCommentId?>">
		<input type="Hidden" name="szErrorMessage" value="<?=htmlspecialchars(stripslashes($szErrorMessage))?>">
		<input type="Hidden" name="szComment" value="<?=htmlspecialchars(stripslashes($szComment))?>">
		<input type="Hidden" name="nForUserId" value="<?=$nForUserId?>">
	</form>
	<script language="JavaScript">
		document.frmReturn.submit();
	</script>
	<?php
	}
	elseif ($current_right!=0)
	{
$szComment = addslashes($szComment);
$szComment = htmlspecialchars(stripslashes($szComment));
	$szQuery = "INSERT INTO conf_comments SET topic_id = '$nTopicId', user_id = ".$userid.", for_user_id = '$nForUserId', for_comment_id = '$nCommentId', u_comment = '$szComment', date_comment = '$now'";
	$resQuery = mysql_query($szQuery) or die(mysql_error());
	$szQuery = "REPLACE INTO conf_last_read SET user_id = ".$userid.", comment_id = '$nCommentId', topic_id = '$nTopicId', date_read = '$now'";
	$resQuery = mysql_query($szQuery) or die(mysql_error());
	$szQuery = "UPDATE conf_topics SET date_last_post = '$now' WHERE topic_id = '$nTopicId'";
	$resQuery = mysql_query($szQuery) or die(mysql_error());
//reply msg
if ($nForUserId > 0 AND $nForUserId<>$userid) {
$gmah = @mysql_query("SELECT `folder_id`, `title` FROM `conf_topics` WHERE topic_id='$nTopicId' LIMIT 1");
$foldrckc = @mysql_result($gmah,0,'folder_id');
$tajtleck = @mysql_result($gmah,0,'title');
$tajtleck = addslashes($tajtleck);
@mysql_query("INSERT INTO `messages` VALUES ('', '$nForUserId', 0, 0, NOW(), 'Forum reply received', 'This is an automated message to let you know that you have received a forum reply. To read it, visit the following forum thread:<br/><br/><b>".$foldrckc."</b> > <b>".$tajtleck."</b><br/><br/><i>(This message is automatically deleted when you read it!)</i>');");
}
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
	<?php
	}
?>
