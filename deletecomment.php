<?php
require_once("check_session.php");
	if(!isset($nTopicId) || !isset($nCommentId)){die();}
	if(!strlen(trim($szErrorMessage)))
	{
		//reading the comment
		$resQuery = mysql_query("SELECT u_comment FROM conf_comments WHERE comment_id ='$nCommentId' LIMIT 1") or die(mysql_error());
		$arrQuery = mysql_fetch_array($resQuery);
		$szComment = $arrQuery["u_comment"];
	}
?>
<form name="frmReplyTo" method="post" target="_self" action="savedeletecomment.php">
	<input type="Hidden" name="nTopicId" value="<?=$nTopicId?>">
	<input type="Hidden" name="nCommentId" value="<?=$nCommentId?>">
	<input type="Hidden" name="nAsReply" value="1">
	<input type="Hidden" name="szAction" value="viewtopic">
<table width="100%" cellpadding="3" cellspacing="0" border="0">
	<tr>
	<td width="100%" bgcolor="<?print CONFERENCE_COLOR?>"><br/><?=nl2br(ubbcode(strip_tags($szComment)))?><br/><br/></td>
	</tr>
	<tr><td height="10"></td></tr>
	<tr>
	<td height="20" valign="middle"><input type="Submit" value="<?=$label[207]?>"></form></td>
	</tr>
</table>
</form>