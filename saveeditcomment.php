<?php
$dbyear = date("Y"); $dbmonth = date("m"); $dbday = date("d"); $dbhour = date("H"); $dbmin = date("i"); $dbsec = date("s"); $now = date("Y-m-d H:i:s", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));
require_once("check_session.php");
	if(!isset($nTopicId) || !isset($nCommentId)){die();}
	$bError	= FALSE;
	if( !strlen(trim($szComment)))
	{
		$bError = TRUE;
		$szErrorMessage	= $label[24];
	}
	
	if($bError)
	{
	?>
	<form name="frmReturn" method="post" target="_self" action="mainconf.php">
		<input type="Hidden" name="szAction" value="editcomment">
		<input type="Hidden" name="nTopicId" value="<?=$nTopicId?>">
		<input type="Hidden" name="nCommentId" value="<?=$nCommentId?>">
		<input type="Hidden" name="szErrorMessage" value="<?=htmlspecialchars(stripslashes($szErrorMessage))?>">
		<input type="Hidden" name="szComment" value="<?=htmlspecialchars(stripslashes($szComment))?>">
	</form>
	<script language="JavaScript">
	document.frmReturn.submit();
	</script>
	<?php 
	} else {
		$szQuery = "UPDATE conf_comments SET u_comment = '$szComment' WHERE comment_id = '$nCommentId'";
		$resQuery = mysql_query($szQuery) or die(mysql_error());

		$szQuery = "INSERT INTO conf_comments_edit SET comment_id = '$nCommentId', user_id = ".$userid.", date_edit = '$now'";
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
		<?php }?>	