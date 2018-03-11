<?php
require_once("check_session.php");

if(!isset($nTopicId) || !isset($nCommentId)){die();}

unset($arrResponseTo);
$arrResponseTo[0] = $label[530];
	
//reading all users ever posted in this topic
$resQuery = mysql_query("SELECT conf_comments.user_id, username FROM conf_comments, users WHERE users.userid = conf_comments.user_id AND topic_id = '$nTopicId' AND comment_id <= '$nCommentId' GROUP BY conf_comments.user_id") or die(mysql_error());
while($arrQuery	= mysql_fetch_array($resQuery)) {$arrResponseTo[$arrQuery["user_id"]] = $arrQuery["username"];}

//reading the comment we are replying to
$resQuery = mysql_query("SELECT `user_id`, `u_comment` FROM `conf_comments` WHERE `comment_id` = '$nCommentId'") or die(mysql_error());
$arrQuery = mysql_fetch_array($resQuery);
$szCommentTo = $arrQuery['u_comment'];
	
if(!isset($nForUserId)) {$nForUserId = $arrQuery["user_id"];}
?>
<script language="JavaScript">
	var arrayStatus = new Array(0,0,0,0);
	var arraySymbol = new Array(0,0,0,0);
	arrayStatus[0] = arrayStatus[1] = arrayStatus[2] = arrayStatus[3] = false;
	arraySymbol[0] = 'b';
	arraySymbol[1] = 'i';
	arraySymbol[2] = 'u';
	arraySymbol[3] = 'q';

	function insertAtCursor(nIndex)
	{
		var myField, myValue;
		myValue	= "[/"+arraySymbol[nIndex]+"]";
		if(arrayStatus[nIndex] == false) {
			myValue	= "["+arraySymbol[nIndex]+"]";
			arrayStatus[nIndex] = true;
		}
		else {arrayStatus[nIndex] = false;}
		insertValueAtCursor(myValue);
	}
	
	function insertValueAtCursor(myValue)
	{
		var myField;
		myField= document.getElementById('szComment');
		document.getElementById('szComment').focus();
		if(document.selection) {
			var objRange;
			objRange = document.selection.createRange();
			objRange.text = myValue;
		}
		else if (myField.selectionStart || myField.selectionStart == '0')
		{
			var startPos = myField.selectionStart;
			var endPos   = myField.selectionEnd;
		myField.value = myField.value.substring(0, startPos) + myValue + myField.value.substring(endPos, myField.value.length);
		}
		else {myField.value += myValue;}
	}
</script>
<form name="frmReplyTo" method="post" target="_self" action="savereplycomment.php">
<input type="Hidden" name="nTopicId" value="<?=$nTopicId?>">
<input type="Hidden" name="nCommentId" value="<?=$nCommentId?>">
<table width="100%" cellpadding="3" cellspacing="0" border="0" bgcolor="#ffedbf">
<?php
if(strlen(trim($szErrorMessage))){
?>
<tr><td class="error" height="20" valign="middle"><?=stripslashes($szErrorMessage)?></td></tr>
<tr><td height="10"></td></tr><?php }?>
<tr><td width="100%" valign="middle" class="labels">Reply to</td></tr>
<tr><td valign="middle">
<select name="nForUserId">
<?php reset($arrResponseTo);
while(list($a, $b) = each($arrResponseTo)) {
?><option value="<?=$a?>" <?php if($a == $nForUserId){echo "SELECTED";}?>><?=$b?></option><?php }?>
</select></td></tr>
<tr><td valign="top" class="labels"><?=$langmark1152?></td></tr>
<tr><td height="10"></td></tr>
<tr><td height="20" valign="middle"><input type="Submit" value="<?=$label[986]?>"></td></tr>
<tr><td><table width="100%" border="0" cellpadding="0" cellspacing="0" style="border: #ACA899 1px solid">
<tr><td></td></tr>
<tr><td width="100%" bgcolor="#E1E1E2" height="5"></td></tr>
<tr>
<td width="100%" bgcolor="#E1E1E2" style="padding-left:5px;" valign="middle" height="20"><a href="javascript:insertValueAtCursor('[q]<?=prepcom($szCommentTo)?>[/q]');" title="quote"><img src="img/quote.jpg" border="0" align="absmiddle" alt="quote"></a>&nbsp;<a href="javascript:insertAtCursor(0);" title="bold"><img src="img/bold.jpg" border="0" align="absmiddle" alt="bold" title="bold"></a>&nbsp;<a href="javascript:insertAtCursor(1);" title="italic"><img src="img/italic.jpg" border="0" align="absmiddle" alt="italic"></a>&nbsp;<a href="javascript:insertAtCursor(2);" title="underline"><img src="img/underline.jpg" border="0" align="absmiddle" alt="underline" title="underline"></a>&nbsp;<a href="javascript:insertValueAtCursor('[playerid=XXX]');" class="lnk">[playerid]</a>&nbsp;<a href="javascript:insertValueAtCursor('[matchid=XXX]');" class="lnk">[matchid]</a>&nbsp;<a href="javascript:insertValueAtCursor('[teamid=XXX]');" class="lnk">[teamid]</a>&nbsp;<a href="javascript:insertValueAtCursor('[link=XXX]');" class="lnk">[link]</a>&nbsp;<a href="javascript:insertValueAtCursor('[messageid=XXX.YYY]');" class="lnk">[messageid]</a>
		</td>
		</tr>
		<tr><td width="100%" bgcolor="#E1E1E2" height="2"></td></tr>
		<tr><td width="100%" bgcolor="#E1E1E2" style="padding-left:5px;"><textarea id="szComment" name="szComment" rows="20" cols="100"></textarea></td></tr>
		<tr><td width="100%" bgcolor="#E1E1E2" height="5"></td></tr>
	</table>
</td>
</tr>
<tr><td height="10"></td></tr>
<tr><td height="15"><?=$label[992]?></td></tr>
<tr><td height="10"></td></tr>
<tr><td bgcolor="<?print CONFERENCE_COLOR?>"><br/><?=nl2br(strip_tags($szCommentTo))?><br/><br/></td></tr>
</table>
</form>