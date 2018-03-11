<?php
require_once("check_session.php");
	if(!isset($nTopicId) || !isset($nCommentId)){die();}
	if(!strlen(trim($szErrorMessage)))
	{
		//reading the comment we are replying to
		$resQuery = mysql_query("SELECT u_comment FROM conf_comments WHERE comment_id ='$nCommentId' LIMIT 1") or die(mysql_error());
		$arrQuery = mysql_fetch_array($resQuery);
		$szComment = $arrQuery["u_comment"];
	}
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
		if(arrayStatus[nIndex] == false)
		{
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
		if(document.selection)
		{
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
<form name="frmReplyTo" method="post" target="_self" action="./saveeditcomment.php">
<input type="Hidden" name="nTopicId" value="<?=$nTopicId?>">
<input type="Hidden" name="nCommentId" value="<?=$nCommentId?>">
<table width="100%" cellpadding="3" cellspacing="0" border="0">
<?php if(strlen(trim($szErrorMessage))){
?>
<tr><td class="error" height="20" valign="middle"><?=$szErrorMessage?></td></tr>
<tr><td height="10"></td></tr>
<?php }?>
<tr>
<td valign="top" class="labels"><?=$label[102]?></td>
</tr>
<tr>
<td>
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="border: #ACA899 1px solid">
<tr><td></td></tr>
<tr><td width="100%" bgcolor="#E1E1E2" height="5"></td></tr>
<tr>
<td width="100%" bgcolor="#E1E1E2" style="padding-left:5px;" valign="middle" height="20"><a href="javascript:insertValueAtCursor('[q]<?php echo $szCommentTo;?>[/q]');" title="<?=$label[605]?>"><img src="img/quote.jpg" border="0" align="absmiddle" alt="quote"></a>&nbsp;<a href="javascript:insertAtCursor(0);" title="<?=$label[602]?>"><img src="img/bold.jpg" border="0" align="absmiddle" alt="bold"></a>&nbsp;<a href="javascript:insertAtCursor(1);" title="<?=$label[604]?>"><img src="img/italic.jpg" border="0" align="absmiddle" alt="italic"></a>&nbsp;<a href="javascript:insertAtCursor(2);" title="<?=$label[603]?>"><img src="img/underline.jpg" border="0" align="absmiddle" alt="underline"></a>&nbsp;<a href="javascript:insertValueAtCursor('[playerid=XXX]');" class="lnk">[playerid]</a>&nbsp;<a href="javascript:insertValueAtCursor('[matchid=XXX]');" class="lnk">[matchid]</a>&nbsp;<a href="javascript:insertValueAtCursor('[teamid=XXX]');" class="lnk">[teamid]</a>&nbsp;<a href="javascript:insertValueAtCursor('[link=XXX]');" class="lnk">[link]</a>&nbsp;<a href="javascript:insertValueAtCursor('[messageid=XXX.YYY]');" class="lnk">[messageid]</a>
</td>
</tr>
<tr><td width="100%" bgcolor="#E1E1E2" height="2"></td></tr>
<tr><td width="100%" bgcolor="#E1E1E2" style="padding-left:5px;"><textarea id="szComment" name="szComment" rows="20" cols="98"><?=htmlspecialchars(stripslashes($szComment))?></textarea></td></tr>
<tr><td width="100%" bgcolor="#E1E1E2" height="5"></td></tr>
</table>
</td>
</tr>
<tr><td height="10"></td></tr>
<tr>
<td height="20" valign="middle"><input type="Submit" value="<?=$label[206]?>"></td>
</tr>
</table>
</form>