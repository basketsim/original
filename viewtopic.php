<?php
$dbyear = date("Y"); $dbmonth = date("m"); $dbday = date("d");
$dbhour = date("H"); $dbmin = date("i"); $dbsec = date("s");
$now = date("Y-m-d H:i:s", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));

	//if it isn't set the comment_id, then I have to read from the last read comment_id
	if(!isset($nTopicId)){die();}

	//reading topic status
	$resQuery = mysql_query("SELECT status, sticky FROM conf_topics WHERE topic_id ='$nTopicId'") or die(mysql_error());
	$arrQuery = mysql_fetch_array($resQuery);
	$nTopicStatus = $arrQuery['status'];
	$stickystat = $arrQuery['sticky'];

	$szQuery = "SELECT COUNT(comment_id) AS nCount FROM conf_comments WHERE topic_id ='$nTopicId'";
	$resQuery = mysql_query($szQuery) or die(mysql_error());
	$arrQuery = mysql_fetch_array($resQuery);
	$nCount	= $arrQuery['nCount'];
	$bCommentFilter	= FALSE;
	if(!isset($nPage)){
		$nPage = 1;
		$bCommentFilter	= TRUE;
	}

	$nLimit	= 10;
	$nStartLimit = ($nPage-1)*$nLimit;

	if($nCount % $nLimit){$nAvailablePages = ($nCount-($nCount % $nLimit))/$nLimit+1;} else {$nAvailablePages = $nCount/$nLimit;}

	$nLastRedCommentId = 0;
	$szLastReadCondition = " ";
	if($bCommentFilter)
	{
		if(isset($nCommentId))
		{
			if($nAsReply == 1) {
				$szLastReadCondition = " AND comment_id >= '$nCommentId' ";
				$nLastRedCommentId = $nCommentId;
			}
			else {
				$szLastReadCondition = " AND comment_id > '$nCommentId' ";
				$nLastRedCommentId = $nCommentId;
			}
		}
		else {
			$szQueryLastRead = "SELECT comment_id FROM conf_last_read WHERE topic_id = '$nTopicId' AND user_id = ".$userid;
			$resQueryLastRead = mysql_query($szQueryLastRead) or die(mysql_error());
			if(mysql_num_rows($resQueryLastRead))
			{
			$arrQueryLastRead = mysql_fetch_array($resQueryLastRead);
			$szLastReadCondition = " AND comment_id > '".$arrQueryLastRead["comment_id"]."' ";
			$nLastRedCommentId = $arrQueryLastRead["comment_id"];
			}
		}
	}
	?>

	<?php
	if($nTopicStatus ==2 AND $stickystat ==1 AND $current_right >1)
	{
		//thread closed
		?>
		<table width="100%" cellpadding="0" cellspacing="0" border="0">
		<tr><td height="20" valign="middle"><font color="#FF0000"><strong><?=$label[541]?></strong></font></td><td><a href="mainconf.php?szAction=reopen&nTopicId=<?=$nTopicId?>&nCommentId=<?=$nLastRedCommentId?>&nAsReply=1" class="qlink"><?=$label[999]?></a>&nbsp;<a href="mainconf.php?szAction=unsticky&nTopicId=<?=$nTopicId?>&nCommentId=<?=$nLastRedCommentId?>&nAsReply=1" class="qlink"><?=$label[998]?></a></TD></tr>
		</table>
	<?php
	} elseif($nTopicStatus ==2 AND $stickystat ==0 AND $current_right ==1) {
		//thread closed - not mod
		?>
		<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#ffedbf">
		<tr><td height="20" valign="middle"><font color="#FF0000"><strong><?=$label[541]?></strong></font></TD></tr>
		</table>
	<?php
	} elseif($nTopicStatus ==2 AND $stickystat ==0 AND $current_right >1) {
		//thread closed
		?>
		<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#ffedbf">
		<tr><td height="20" valign="middle"><font color="#ff0000"><strong><?=$label[541]?></strong></font></TD><TD><a href="mainconf.php?szAction=reopen&nTopicId=<?=$nTopicId?>&nCommentId=<?=$nLastRedCommentId?>&nAsReply=1" class="qlink"><?=$label[999]?></a>&nbsp;<a href="mainconf.php?szAction=removetopic&nTopicId=<?=$nTopicId?>" class="qlink"><?=$label[996]?></a>&nbsp;<a href="mainconf.php?szAction=askstickytopic&nTopicId=<?=$nTopicId?>" class="qlink"><?=$label[997]?></a></td></tr>
		</table>

		<?php
	} elseif($nTopicStatus == 1) {
		//thread opened
		if($current_right >1) {
		?>
		<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#ffedbf">
		<tr><td height="20"><a href="mainconf.php?szAction=askclosetopic&nTopicId=<?php echo $nTopicId?>&nCommentId=<?=$nLastRedCommentId?>&nAsReply=1" class="qlink"><?=$label[993]?></a>&nbsp;<a href="mainconf.php?szAction=AskRename&nTopicId=<?=$nTopicId?>&nCommentId=<?=$nLastRedCommentId?>&nAsReply=1" class="qlink"><?=$label[994]?></a>&nbsp;<a href="mainconf.php?szAction=AskMove&nTopicId=<?=$nTopicId?>&nCommentId=<?=$nLastRedCommentId?>&nAsReply=1" class="qlink"><?=$label[995]?></a></TD><?php if($stickystat <>1){?><td><a href="mainconf.php?szAction=askstickytopic&nTopicId=<?=$nTopicId?>&nCommentId=<?=$nLastRedCommentId?>&nAsReply=1" class="qlink"><?=$label[997]?></a></td><?php } else {?><td><a href="mainconf.php?szAction=unsticky&nTopicId=<?=$nTopicId?>&nCommentId=<?=$nLastRedCommentId?>&nAsReply=1" class="qlink"><?=$label[998]?></a></TD><?php }?></tr>
		</table>
		<?php
		}
	}

	$szQuery = "SELECT *, DATE_FORMAT(date_comment, '%d.%m.%Y %H:%i') AS szDateComment FROM conf_comments WHERE topic_id ='$nTopicId' $szLastReadCondition ORDER BY comment_id ASC LIMIT $nStartLimit, $nLimit";
	$resQuery = mysql_query($szQuery) or die(mysql_error());
	$nLastViewCommentId = -1;
	while($arrQuery = mysql_fetch_array($resQuery)) {$nLastViewCommentId = $arrQuery["comment_id"];
	?>
	<table width="100%" cellpadding="2" cellspacing="0" border="0" style="border: 1px solid #0E2127">
	<tr bgcolor="<?print BGCOLOR;?>"><td width="100%" height="30">
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
			<td width="50" height="15" valign="bottom" class="labels"><font color="white" style="font-size: 11px;"><?=$langmark340?>:</font></td>
			<td width="*" valign="bottom"><?php
			$szQueryCreator = "SELECT username FROM users WHERE userid = '".$arrQuery["user_id"]."'";
			$resQueryCreator= mysql_query($szQueryCreator) or die(mysql_error());
			$arrQueryCreator = mysql_fetch_array($resQueryCreator);?><a href="club.php?clubid=<?=$arrQuery["user_id"]?>" target="_parent" class="conf"><?=$arrQueryCreator["username"]?></a><?php
			$szSupporterLink = "";
			$szQuerySupporter = "SELECT supporter FROM users WHERE userid = ".$arrQuery["user_id"];
			$resQuerySupporter = mysql_query($szQuerySupporter) or die(mysql_error());
			if(mysql_num_rows($resQuerySupporter))
			{
			$heissupp=mysql_result($resQuerySupporter,0);
			if ($heissupp==1) {$szSupporterLink = "&nbsp;<a href=\"supporter.php\" title=\"".$langmark1145."\" target='_parent'><img align=\"absbottom\" src=\"img/fairplaysup.gif\" border=\"0\" alt=\"".$langmark1145."\" width=\"13\" height=\"15\"></a>";}
			}
			echo $szSupporterLink;
			?>
			</td>
			<td width="280" valign="bottom" align="right">
			<?php
			if($arrQuery["for_comment_id"] != 0)
			{?><a href="mainconf.php?szAction=viewtopic&nTopicId=<?=$nTopicId?>&nCommentId=<?=$arrQuery["comment_id"]?>&nAsReply=1" class="conf"><?=$nTopicId?>.<?=$arrQuery["comment_id"]?></a>&nbsp;<font color="white" style="font-size: 10px;"><?=$label[528]?></font>&nbsp;<a href="./mainconf.php?szAction=viewtopic&nTopicId=<?=$nTopicId?>&nCommentId=<?=$arrQuery["for_comment_id"]?>&nAsReply=1" class="conf"><?=$nTopicId?>.<?=$arrQuery["for_comment_id"]?></a><?php
			} else {?><a href="mainconf.php?szAction=viewtopic&nTopicId=<?=$nTopicId?>&nCommentId=<?=$arrQuery["comment_id"]?>&nAsReply=1" class="conf"><?=$nTopicId?>.<?=$arrQuery["comment_id"]?></a><?php }?>
			</td>
		</tr>
		<tr>
			<td valign="middle" height="15" class="labels"><font color="white" style="font-size: 11px;"><?=$langmark348?>:</font></td>
			<td valign="middle"><?php
			if($arrQuery["for_user_id"] <> 0)
			{
				$szQueryCreator = "SELECT username FROM users WHERE userid = '".$arrQuery["for_user_id"]."'";
				$resQueryCreator= mysql_query($szQueryCreator) or die(mysql_error());
				$arrQueryCreator = mysql_fetch_array($resQueryCreator);?><a href="club.php?clubid=<?=$arrQuery["for_user_id"]?>" target="_parent" class="conf"><?=$arrQueryCreator["username"]?></a><?php
				$szSupporterLink = "";
				$szQuerySupporter = "SELECT supporter FROM users WHERE userid = ".$arrQuery["for_user_id"];
				$resQuerySupporter = mysql_query($szQuerySupporter) or die(mysql_error());
				if(mysql_num_rows($resQuerySupporter))
				{
				$heissupp=mysql_result($resQuerySupporter,0);
				if ($heissupp==1) {$szSupporterLink = "&nbsp;<a href=\"supporter.php\" title=\"".$langmark1145."\" target='_parent'><img align=\"absbottom\" src=\"img/fairplaysup.gif\" border=\"0\" alt=\"".$langmark1145."\" width=\"13\" height=\"15\"></a>";}
				}
				echo $szSupporterLink;} else {?><font color="white"><?=$label[530]?></font><?php
			}
			?>			
			</td>
			<td valign="middle" align="right"><font color="white"><em><?=$arrQuery["szDateComment"]?></em></font></td>
		</tr>
	</table>
</td></tr>
<?php
if ($arrQuery["user_id"]==$userid) {$coli='lightblue';} else {$coli='white';}
if($arrQuery["status"] == 1){?>
<tr bgcolor="<?=$coli?>"><td height="10" bgcolor="<?=$coli?>"></td></tr>
<tr bgcolor="<?=$coli?>"><td bgcolor="<?=$coli?>"><?php
//podpis in komentar
$user_podpis = '';
$podpis_od = mysql_query("SELECT signature FROM users WHERE userid = '".$arrQuery["user_id"]."'") or die(mysql_error());
if (mysql_num_rows($podpis_od)) {$user_podpis = mysql_result($podpis_od,0);}
$user_comment = strip_tags($arrQuery["u_comment"]);
print nl2br(ubbcode(strip_tags($user_comment)));
if ($user_podpis <>''){echo "<br/><br/><hr/>";
print nl2br(ubbcode(strip_tags($user_podpis)));}
?></td></tr>
<tr bgcolor="<?=$coli?>"><td height="10" bgcolor="<?=$coli?>"></td></tr>
<?php
//reading if the post was ever edited
$szQueryCheckEdit = "SELECT DATE_FORMAT(date_edit, '%d.%m.%Y %H:%i') AS szDateEdit, user_id FROM conf_comments_edit WHERE comment_id = '".$arrQuery["comment_id"]."' ORDER BY date_edit ASC";
$resQueryCheckEdit = mysql_query($szQueryCheckEdit) or die(mysql_error());
while($arrQueryCheckEdit = mysql_fetch_array($resQueryCheckEdit))
{
?>
<tr bgcolor="<?=$coli?>"><td height="15" valign="middle" bgcolor="<?=$coli?>"><em>
<?php
$szQueryCreator = "SELECT username FROM users WHERE userid = ".$arrQueryCheckEdit["user_id"];
$resQueryCreator= mysql_query($szQueryCreator) or die(mysql_error());
$arrQueryCreator = mysql_fetch_array($resQueryCreator);
echo $label[991];?>&nbsp;<a href="club.php?clubid=<?=$arrQueryCheckEdit["user_id"]?>" target="_parent" class="lnk"><?=$arrQueryCreator["username"]?></a>&nbsp;on&nbsp;<?=$arrQueryCheckEdit["szDateEdit"]?></em></td></tr>
<tr bgcolor="<?=$coli?>"><td height="5" bgcolor="<?=$coli?>"></td></tr><?php }?>
<tr bgcolor="<?=$coli?>">
	<td height="10" align="center" valign="middle" bgcolor="<?=$coli?>"><?php

echo ThumbsUp::item($arrQuery["comment_id"])->template('mini_thumbs');

	if($nTopicStatus ==1) {?><a href="mainconf.php?szAction=replycomment&nTopicId=<?=$nTopicId?>&nCommentId=<?=$arrQuery["comment_id"]?>" class="lnk"><?=$label[531]?></a><?php }
	if($nTopicStatus ==1)//thread opened - can be edited by owner or mod
		{
		if($userid == $arrQuery["user_id"] || $current_right > 1){?>&nbsp;&nbsp;<a href="mainconf.php?szAction=editcomment&nTopicId=<?=$nTopicId?>&nCommentId=<?=$arrQuery["comment_id"]?>" class="lnk"><?=$label[206]?></a>&nbsp;&nbsp;<a href="mainconf.php?szAction=deletecomment&nTopicId=<?=$nTopicId?>&nCommentId=<?=$arrQuery["comment_id"]?>" class="lnk"><?=$label[207]?></a><?php	}
		} elseif($nTopicStatus == 2)//thread closed - can be edited only by mod
		{
		if($current_right > 1){?>&nbsp;&nbsp;<a href="mainconf.php?szAction=editcomment&nTopicId=<?=$nTopicId?>&nCommentId=<?=$arrQuery["comment_id"]?>" class="lnk"><?=$label[206]?></a>&nbsp;&nbsp;<a href="mainconf.php?szAction=deletecomment&nTopicId=<?=$nTopicId?>&nCommentId=<?=$arrQuery["comment_id"]?>" class="lnk"><?=$label[207]?></a><?php
		}
		}?>
		</td>
	</tr>
	<tr bgcolor="<?=$coli?>"><td height="10" bgcolor="<?=$coli?>"></td></tr>
<?php
} elseif($arrQuery["status"] ==2) {?><tr><td height="20" valign="middle">&nbsp;<em><?=$label[539]?></em></td></tr><?php }?>
</table><table bgcolor="#ffedbf" width="100%" height="10"><tr bgcolor="#ffedbf"><td bgcolor="#ffedbf"><br/></td></tr></table>
<?php
}
if($nLastViewCommentId != -1)
{
	$szQuery = "REPLACE INTO conf_last_read SET user_id = ".$userid.", comment_id = '$nLastViewCommentId', topic_id = '$nTopicId', date_read = '$now'";
	$resQuery = mysql_query($szQuery) or die(mysql_error());
}
?>
<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#ffedbf">
<tr>
<td align="center" valign="middle" width="100%">
	<table align="center" border="0" bgcolor="#ffedbf">
		<tr>
		<?php
		if($nPage<>1) {
		?>
		<td width="16" align="center" valign="middle"><a href="mainconf.php?szAction=viewtopic&nTopicId=<?=$nTopicId?>&nPage=1" alt="<?=$label[535]?>"><img align="bottom" src="img/home.jpg" border="0" title="<?=$label[535]?>"></a></td><td width="16" align="center" valign="middle"><a href="mainconf.php?szAction=viewtopic&nTopicId=<?=$nTopicId?>&nPage=<?=($nPage-1)?>" alt="<?php echo $label[534]."&nbsp;".($nPage-1);?>"><img align="bottom" src="img/previous.jpg" border="0" title="<?=$label[534],"&nbsp;",($nPage-1)?>"></a></td>
		<?php }?><td align="center" valign="middle">&nbsp;Page <?=$nPage?>&nbsp;</td>
                <?php if($nPage<$nAvailablePages){?>
		<td width="16" align="center" valign="middle"><a href="mainconf.php?szAction=viewtopic&nTopicId=<?=$nTopicId?>&nPage=<?print ($nPage+1)?>" alt="<?=$label[534],"&nbsp;",($nPage+1)?>"><img align="bottom" src="img/next.jpg" border="0" title="<?=$label[534],"&nbsp;",($nPage+1)?>"></a></td><td width="16" align="center" valign="middle"><a href="mainconf.php?szAction=viewtopic&nTopicId=<?=$nTopicId?>&nPage=<?=$nAvailablePages?>" alt="<?=$label[536]?>"><img align="bottom" src="img/end.jpg" border="0" title="<?=$label[536]?>"></a></td>
		<?php }?>
		</tr>
	</table>
</td></tr>
<tr bgcolor="#ffedbf"><td height="10" bgcolor="#ffedbf"></td></tr>
</table>

<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#ffedbf">
<tr><td width="100%" height="20" valign="middle"><a href="mainconf.php?szAction=viewtopic&nTopicId=<?=$nTopicId?>&nCommentId=0&nAsReply=1" class="lnk"><?=$label[547]?></a></td></tr>
</table>