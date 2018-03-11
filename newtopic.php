<?php
require_once("check_session.php");
$resQuery = mysql_query("SELECT folder_id FROM conf_user_folder WHERE user_id = ".$userid." AND folder_id = '$nFolderId'") or die(mysql_error());
if(mysql_num_rows($resQuery)) {
?>
<script language="JavaScript">
	var arrayStatus = new Array(0,0,0,0);
	var arraySymbol = new Array(0,0,0,0);
	arrayStatus[0] = arrayStatus[1] = arrayStatus[2] = arrayStatus[3] = false;
	arraySymbol[0] = 'b';
	arraySymbol[1] = 'i';
	arraySymbol[2] = 'u';
	arraySymbol[3] = 'q';

	function insertAtCursor(nIndex) {
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
<form name="frmWritenew" method="post" target="_self" action="savenewtopic.php">
	<input type="Hidden" name="nFolderId" value="<?=$nFolderId?>">
	<table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#ffedbf">
	<?php if(strlen(trim($szErrorMessage))) {?><tr><td class="error"><?=$szErrorMessage?></td></tr><tr><td>&nbsp;</td></tr><?php }?>
	<tr><td class="labels" width="100%"><?=$label[209]?></td></tr>
	<tr><td><input type="Text" size="45" maxlength="100" name="szTitle" value="<?=htmlspecialchars(stripslashes($szTitle))?>"></td></tr>
	<tr><td height="5"></td></tr>
	<tr><td class="labels" width="100%"><?=$label[102]?></td></tr>
	<tr>
	<td>
	<table width="100%" border="0" cellpadding="0" cellspacing="0" style="border: #ACA899 1px solid">
	<tr><td></td></tr>
	<tr><td width="100%" bgcolor="#E1E1E2" height="5"></td></tr>
	<tr><td width="100%" bgcolor="#E1E1E2" style="padding-left:5px;" valign="middle" height="20"><a href="javascript:insertValueAtCursor('[q]<?=$szCommentTo?>[/q]');" title="quote"><img src="img/quote.jpg" border="0" align="absmiddle" alt="quote"></a>&nbsp;<a href="javascript:insertAtCursor(0);" title="bold"><img src="img/bold.jpg" border="0" align="absmiddle" alt="bold"></a>&nbsp;<a href="javascript:insertAtCursor(1);" title="italic"><img src="img/italic.jpg" border="0" align="absmiddle" alt="italic"></a>&nbsp;<a href="javascript:insertAtCursor(2);" title="underline"><img src="img/underline.jpg" border="0" align="absmiddle" alt="underline"></a>&nbsp;<a href="javascript:insertValueAtCursor('[playerid=XXX]');" class="lnk">[playerid]</a>&nbsp;<a href="javascript:insertValueAtCursor('[matchid=XXX]');" class="lnk">[matchid]</a>&nbsp;<a href="javascript:insertValueAtCursor('[teamid=XXX]');" class="lnk">[teamid]</a>&nbsp;<a href="javascript:insertValueAtCursor('[link=XXX]');" class="lnk">[link]</a>&nbsp;<a href="javascript:insertValueAtCursor('[messageid=XXX.YYY]');" class="lnk">[messageid]</a></td></tr>
	<tr><td width="100%" bgcolor="#E1E1E2" height="2"></td></tr>
	<tr><td width="100%" bgcolor="#E1E1E2" style="padding-left:5px;"><textarea id="szComment" name="szComment" rows="24" cols="100"></textarea></td></tr>
	<tr><td width="100%" bgcolor="#E1E1E2" height="5"></td></tr>
        </table>
	</td>
	</tr>
	<tr><td height="20">&nbsp;</td></tr>
	<tr><td align="left"><input type="Submit" value="<?=$label[987]?>"></td></tr>
	</table>
<?php } else {?>
	<table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#ffedbf">
	<tr><td height="40" width="90%">&nbsp;</td></tr>
	<tr><td class="error" align="center"><?=$label[551]?></td><tr>
	</table>
<?php }?>