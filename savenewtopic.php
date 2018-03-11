<?php
$dbyear = date("Y"); $dbmonth = date("m"); $dbday = date("d"); $dbhour = date("H"); $dbmin = date("i"); $dbsec = date("s"); $now = date("Y-m-d H:i:s", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));
if(!isset($nFolderId)){die();}
require_once("check_session.php");
	$bError	= FALSE;
	if(!strlen(trim($szTitle)) || !strlen(trim($szComment))) {
		$bError = TRUE;
		$szErrorMessage	= $label[24];
	}

	if($bError)
	{
	?>
	<form name="frmReturn" method="post" target="_self" action="mainconf.php">
		<input type="Hidden" name="szAction" value="newtopic">
		<input type="Hidden" name="nFolderId" value="<?=$nFolderId?>">
		<input type="Hidden" name="szErrorMessage" value="<?=htmlspecialchars(stripslashes($szErrorMessage))?>">
		<input type="Hidden" name="szTitle" value="<?=htmlspecialchars(stripslashes($szTitle))?>">
		<input type="Hidden" name="szComment" value="<?=htmlspecialchars(stripslashes($szComment))?>">
	</form>
	<script language="JavaScript">
		document.frmReturn.submit();
	</script>
	<?php
	}
	else
	{
$szComment = addslashes($szComment);
$szComment = htmlspecialchars(stripslashes($szComment));

//spam
$alije1 = stristr($szComment,"www.ironhoop.com");
$alije2 = stristr($szTitle,"ironhoop");
if (strlen($alije1)>0 || strlen($alije2)>0) {mysql_query("INSERT INTO messages VALUES ('', 1, $userid, 0, NOW(), '$szTitle', '$szComment')") or die(mysql_error());} else {
	        $szQuery = "INSERT INTO conf_topics SET folder_id = '$nFolderId', title = '$szTitle', date_created = '$now', user_id = ".$userid.", date_last_post = '$now'";
		$resQuery = mysql_query($szQuery) or die(mysql_error());
		$nTopicId = mysql_insert_id();
		$szQuery = "INSERT INTO conf_comments SET topic_id = ".$nTopicId.", user_id = ".$userid.", u_comment = '$szComment', date_comment = '$now'";
		$resQuery = mysql_query($szQuery) or die(mysql_error());
		$nCommentId = mysql_insert_id();
		$szQuery = "REPLACE INTO conf_last_read SET user_id = ".$userid.", comment_id = '$nCommentId', topic_id = '$nTopicId', date_read = '$now'";
		$resQuery = mysql_query($szQuery) or die(mysql_error());
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