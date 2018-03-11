<?php
require_once("check_session.php");
if(!isset($nTopicId) || !isset($nCommentId)){die();}
if($current_right < 2) {die();}

//reading the topic we are editing
$szQuery = "SELECT `title` FROM `conf_topics` WHERE `topic_id`='$nTopicId'";
$resQuery = mysql_query($szQuery) or die(mysql_error());
$arrQuery = mysql_fetch_array($resQuery);
$szTitle = $arrQuery["title"];
?>

If thread title is not appropriate you can change it. In case of CAPS LOCKS warn user and explain why using caps locks in thread's title isn't such a good idea. If it's a must you can close topic instead of renaming the title. On the other hand, titles that just don't look so good, but are not problematic in any way, can be kept as they are in order to avoid general confusion.<br/><br/>

<form name="frmReplyTo" method="post" target="_self" action="RenameConfirm.php">
<input type="Hidden" name="nTopicId" value="<?=$nTopicId?>">
<input type="Hidden" name="nCommentId" value="<?=$nCommentId?>">
<table width="100%" cellpadding="3" cellspacing="0" border="0">
<tr>
<td>
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="border: #ACA899 1px solid">
<tr><td width="100%" bgcolor="#E1E1E2" style="padding-left:5px;">Change thread title: <input type="text" id="szComment" name="szComment" size="60" value="<?=nl2br(strip_tags($szTitle))?>"></td><td height="20" bgcolor="#E1E1E2" valign="middle"><input type="Submit" value="Rename"></td></tr>
</table>
</td>
</tr>
</table>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i><br/><a href="javascript: history.go(-1)">Go back</a> without renaming.</i>

</form>