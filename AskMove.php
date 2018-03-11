<?php
require_once("check_session.php");
if(!isset($nTopicId) || !isset($nCommentId)){die();}
if($current_right < 2) {die();}
?>

In case when thread was posted in the wrong place you have two options, to close it, or if it's a better solution, to move it to appropriate forum. This solution apply to all but special conferences (moderators, language, national coaches).<br/><br/>

<form name="frmReplyTo" method="post" target="_self" action="MoveConfirm.php">
<input type="Hidden" name="nTopicId" value="<?=$nTopicId?>">
<input type="Hidden" name="nCommentId" value="<?=$nCommentId?>">
<table width="100%" cellpadding="3" cellspacing="0" border="0">
<tr>
<td>
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="border: #ACA899 1px solid">
<tr><td width="100%" bgcolor="#E1E1E2" style="padding-left:5px;">Move topic to forum:
<select id="szComment" name="szComment">
<?php
$resQuery = mysql_query("SELECT `folder_id` FROM `conf_folders` WHERE `folder_type` != 'A' ORDER BY `folder_type` ASC, `folder_id` ASC") or die(mysql_error());
while ($d=mysql_fetch_array($resQuery)) {
$izb = $d["folder_id"];
echo "<option value=\"",$izb,"\">",$izb,"</opzion>";
}
?>
</select>
</td><td height="20" bgcolor="#E1E1E2" valign="middle"><input type="Submit" value="Move">
</td>
</tr>
</table>
</td>
</tr>
</table>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i><br/><a href="javascript: history.go(-1)">Go back</a> without moving.</i>
</form>