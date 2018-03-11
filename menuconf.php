<?php
mb_internal_encoding("UTF-8");

// Function to calculate script execution time.
function microtime_float ()
{ 
    list ($msec, $sec) = explode(' ', microtime()); 
    $microtime = (float)$msec + (float)$sec;
    return $microtime; 
}

//get starting time.
$start = microtime_float(); 

$dbyear = date("Y"); $dbmonth = date("m"); $dbday = date("d");
$dbhour = date("H"); $dbmin = date("i"); $dbsec = date("s");
$now = date("Y-m-d H:i:s", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));

if (!$_COOKIE['userid']){die(include 'basketsim.php');}
require_once("check_session.php");

	$nFolderLimit = 30;
	$nFolderLimitLast = 50;
	$nTopicMaxLength = 20;
	
	if(!isset($szAction)) {$szAction = "allfolders";}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<TITLE>Basketsim forums</TITLE>
	<META HTTP-EQUIV="Content-Type" CONTENT="text/html; CHARSET=UTF-8">
	<LINK REL=STYLESHEET HREF="cupmanager.css" TYPE="text/css">
</head>
<script language="JavaScript">
	function topicClick(obj) {
		obj = getElement(obj);
		obj.style.fontWeight = 'normal';
	}
	function getElement(psID) { 
	   if(document.all) { 
	      return document.all[psID]; 
	   } else if(document.getElementById) { 
	      return document.getElementById(psID); 
	   } 
	   return Null; 
	} 
</script>
<body bgcolor="#ffedbf">
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffedbf">
<tr bgcolor="#ffedbf"><td width="100%">[<a href="club.php?clubid=<?=$userid?>" target="_parent"><?=$langmark491?></a>] [<a href="indexconf.php" target="_parent"><?=$label[990]?></a>]<br/><br/></td></tr>
	<?php
	if($szAction == "allfolders")
	{
	$szQuery = "SELECT * FROM conf_user_folder LEFT JOIN conf_folders USING(folder_id) WHERE conf_user_folder.user_id = ".$userid." ORDER BY conf_user_folder.join_date ASC";
	$resQuery = mysql_query($szQuery) or die(mysql_error());
	if(mysql_num_rows($resQuery))
	{
		$nFolderCounter = 0;
		while($arrQuery = mysql_fetch_array($resQuery))
		{
		$nFolderCounter ++;
		?>
			<tr>
			<td>
			<table width="100%" cellpadding="0" cellspacing="0" border="0" style="border: 1px solid #0E2127" bgcolor="#ffedbf">
				<tr bgcolor="<?print BGCOLOR;?>">
					<td width="12" height="1"></td>
					<td width="180"></td>
					<td width="12"></td>
					</tr>
					</tr>
					<tr bgcolor="<?print BGCOLOR;?>"><td colspan="2" class="labels" height="15" valign="middle">&nbsp;
					<?php
					switch($arrQuery['folder_type'])
					{
					case 'A':{$szConfName = $arrQuery['folder_id'];}break;
					case 'G':{$szConfName = $arrQuery['folder_id'];}break;
					case 'N':{$szConfName = $arrQuery['folder_id'];}break;
					default :{die("Invalid folder type !");}break;
					}
					$szConfName	= trim($szConfName);
					
					if(strlen($szConfName) > 27) {$szConfName = substr($szConfName, 0, 27);}
					?>
                <font color="white"><?=$szConfName?></font>
		</td>
		<td valign="middle" align="center"><a target="mainFrame" href="leaveconference.php?nFolderId=<?=$arrQuery['folder_id']?>" title="<?=$label[522]?>"><img align="absmiddle" src="img/leave.gif" border="0" alt="<?=$label[522]?>"></a></td>
		</tr>
		<?php
		$szQueryTopic = "SELECT *, DATE_FORMAT(date_created, '%d.%m.%Y %H:%i:%s') AS szDateCreated FROM conf_topics WHERE folder_id = '".$arrQuery['folder_id']."' ORDER BY sticky DESC, date_last_post DESC";
		$resQueryTopic = mysql_query($szQueryTopic) or die(mysql_error());
		$nLastTopicId = -1; $nTopicCounter = 0;
		$nStartTopicId = $nStopTopicId = -1;
		$bShowMarkAsRead = FALSE;
			while($arrQueryTopic = mysql_fetch_array($resQueryTopic))
			{
			$szTopicName = trim($arrQueryTopic["title"]);
			if(mb_strlen($szTopicName) > $nTopicMaxLength) {$szTopicName = mb_strcut($szTopicName, 0, $nTopicMaxLength);}
			$szQueryCreator = "SELECT username FROM users WHERE userid = '".$arrQueryTopic["user_id"]."'";
        		$resQueryCreator= mysql_query($szQueryCreator) or die(mysql_error());
			$arrQueryCreator = mysql_fetch_array($resQueryCreator);
			$szAltText = trim($arrQueryTopic["title"])." (".$arrQueryCreator["username"].", ".$arrQueryTopic["szDateCreated"].")";
			//check if there are new posts to this topic, otherwise I won't show this topic
			$szQueryLastRead = "SELECT comment_id FROM conf_last_read WHERE topic_id = '".$arrQueryTopic["topic_id"]."' AND user_id = ".$userid;
			$resQueryLastRead = mysql_query($szQueryLastRead) or die(mysql_error());
			$nLastReadId = 0;
			if(mysql_num_rows($resQueryLastRead))
				{
					$arrQueryLastRead = mysql_fetch_array($resQueryLastRead);
					$nLastReadId = $arrQueryLastRead["comment_id"];
				}
	             		//counting the new posts
				$szQueryCount = "SELECT COUNT(*) AS nCount FROM conf_comments WHERE topic_id = '".$arrQueryTopic["topic_id"]."' AND comment_id > '$nLastReadId'";
				$resQueryCount = mysql_query($szQueryCount) or die(mysql_error());
				$arrQueryCount = mysql_fetch_array($resQueryCount);
				if($arrQueryCount["nCount"] > 0)
				{
				$bShowMarkAsRead = TRUE;
				$nTopicCounter ++;
				$nLastTopicId = $arrQueryTopic["topic_id"];
				if($nStartTopicId == -1)
				{$nStartTopicId = $nStopTopicId = $arrQueryTopic["topic_id"];} else {$nStartTopicId = $arrQueryTopic["topic_id"];}
				//counting all the posts
				$szQueryCountAll = "SELECT COUNT(*) AS nCount FROM conf_comments WHERE topic_id = '".$arrQueryTopic["topic_id"]."'";
				$resQueryCountAll = mysql_query($szQueryCountAll) or die(mysql_error());
				$arrQueryCountAll = mysql_fetch_array($resQueryCountAll);
				$szPostsLabel = "<font color=\"#A0A0A0\" style=\"font-size:9px;\">&nbsp;".$arrQueryCountAll["nCount"]."+".$arrQueryCount["nCount"]."</font>";
				?>
				<tr>
				<td valign="middle" align="center"><?if($arrQueryTopic["status"] == "2" AND $arrQueryTopic["sticky"] == "0"){?><img src="img/closed.gif" border="0"><?php } elseif($arrQueryTopic["status"] == "2" && $arrQueryTopic["sticky"] == "1"){?><img src="img/klicaj1.gif" border="0"><?php } elseif($arrQueryTopic["status"] == "1"){?><img src="img/blank.gif" border="0"><?php }?></td>
				<td colspan="2" height="12" valign="middle">&nbsp;<a onclick="javascript:topicClick('ANCH<?php echo $arrQueryTopic['topic_id']?>')" id="ANCH<?=$arrQueryTopic['topic_id']?>" href="mainconf.php?szAction=viewtopic&nTopicId=<?=$arrQueryTopic['topic_id']?>&nCommentId=<?=$nLastReadId?>" target="mainFrame" title="<?=$szAltText?>"><?php if($arrQueryTopic["sticky"]=="1"){echo "<font color=\"red\">";}?><?=$szTopicName?><?php if($arrQueryTopic["sticky"]=="1"){echo "</font>";}?></a><?=$szPostsLabel?></td></tr>
				<?php
				}
				if($nTopicCounter == $nFolderLimit) {break;}
			        }
			        ?>
	<tr bgcolor="#000000"><td colspan="3" height="1"></td></tr>
	<tr bgcolor="<?print CONFERENCE_COLOR?>"><td colspan="3" height="15" valign="middle">&nbsp;<a href="menuconf.php?szAction=previousmessages&nFolderId=<?=$arrQuery['folder_id']?>"><?=$label[524]?></a></td></tr>
	<?php
	if($bShowMarkAsRead)
	{?>
	<tr bgcolor="#000000"><td colspan="3" height="1"></td></tr>
	<tr bgcolor="<?print CONFERENCE_COLOR?>"><td colspan="3" height="15" valign="middle">&nbsp;<a href="menuconf.php?szAction=markasread&nFolderId=<?=$arrQuery['folder_id']?>&nStartTopicId=<?=$nStartTopicId?>&nStopTopicId=<?=$nStopTopicId?>"><?=$label[546]?></a></td></tr>
	<?php }?>
	<tr bgcolor="#000000"><td colspan="3" height="1"></td></tr> 
	<tr bgcolor="<?print CONFERENCE_COLOR?>"><td colspan="3" height="15" valign="middle">&nbsp;<a href="mainconf.php?szAction=newtopic&nFolderId=<?=$arrQuery['folder_id']?>" target="mainFrame"><?=$label[525]?></a></td></tr>
	</table>
	</td>
	</tr>
	<tr>
	<td height="20" bgcolor="#ffedbf">&nbsp;</td>
	</tr><?php
}
}
else
{
?><tr><td height="20" bgcolor="#ffedbf"><font color="#FF0000"><em><?=$label[989]?><br/><?=$label[988]?></em></font></td></tr><?php
}
} elseif($szAction == "previousmessages") {
	if(!isset($nFolderId)) {die();}
	if(!isset($nTopicId)) {
		$szQuery = "SELECT MAX(topic_id) AS nMax FROM conf_topics WHERE folder_id = '$nFolderId'";
		$resQuery = mysql_query($szQuery) or die(mysql_error());
		$arrQuery = mysql_fetch_array($resQuery);
		$nTopicId = $arrQuery["nMax"];
		$nTopicId++;
	}
	$szQuery = "SELECT * FROM conf_user_folder LEFT JOIN conf_folders USING(folder_id) WHERE conf_user_folder.user_id = ".$userid." AND conf_folders.folder_id = '$nFolderId'";
	$resQuery = mysql_query($szQuery) or die(mysql_error());
	if(mysql_num_rows($resQuery))
	{
		while($arrQuery = mysql_fetch_array($resQuery))
		{?>
			<tr>
				<td>
					<table width="100%" cellpadding="0" cellspacing="0" border="0" style="border: 1px solid #0E2127" bgcolor="#ffedbf">
					<tr bgcolor="<?print BGCOLOR;?>">
					<td width="12" height="1"></td>
					<td width="180"></td>
					<td width="12"></td>
					</tr>
					<tr bgcolor="<?print BGCOLOR;?>"><td colspan="2" class="labels" height="15" valign="middle">&nbsp;
					<?php
					switch($arrQuery['folder_type'])
					{
						case 'A':{$szConfName = $arrQuery['folder_id'];}break;
						case 'G':{$szConfName = $arrQuery['folder_id'];}break;
						case 'N':{$szConfName = $arrQuery['folder_id'];}break;
						default :{die("Invalid folder type !");}break;
					}
					$szConfName = trim($szConfName);
					if(strlen($szConfName) > 27) {$szConfName = substr($szConfName, 0, 27);}
					?><font color="white"><?=$szConfName?></font>
					</td>
					<td valign="middle" align="center"><a target="mainFrame" href="leaveconference.php?nFolderId=<?=$arrQuery['folder_id']?>" title="<?=$label[522]?>"><img align="absmiddle" src="img/leave.gif" border="0" alt="<?=$label[522]?>"></a></td>
					</tr>
<?php
$szQueryTopic = "SELECT *, DATE_FORMAT(date_created, '%d.%m.%Y %H:%i:%s') AS szDateCreated FROM conf_topics WHERE folder_id = '".$arrQuery['folder_id']."' AND topic_id < '$nTopicId' ORDER BY sticky DESC, date_last_post DESC";
$resQueryTopic = mysql_query($szQueryTopic) or die(mysql_error());
$nLastTopicId = -1; $nTopicCounter = 0;
$nStartTopicId = $nStopTopicId = -1; $bShowMarkAsRead = FALSE;
while($arrQueryTopic = mysql_fetch_array($resQueryTopic))
{
if($nStartTopicId == -1) {$nStartTopicId = $nStopTopicId = $arrQueryTopic["topic_id"];}
else {$nStartTopicId = $arrQueryTopic["topic_id"];}
$szTopicName = trim($arrQueryTopic["title"]);
if(mb_strlen($szTopicName) > $nTopicMaxLength) {$szTopicName = mb_strcut($szTopicName, 0, $nTopicMaxLength);}
$szQueryCreator = "SELECT username FROM users WHERE userid = '".$arrQueryTopic["user_id"]."'";
$resQueryCreator= mysql_query($szQueryCreator) or die(mysql_error());
$arrQueryCreator = mysql_fetch_array($resQueryCreator);

$szAltText = trim($arrQueryTopic["title"])." (".$arrQueryCreator["username"].", ".$arrQueryTopic["szDateCreated"].")";

//check if there are new posts to this topic, otherwise I won't show this topic
$szQueryLastRead = "SELECT comment_id FROM conf_last_read WHERE topic_id = '".$arrQueryTopic["topic_id"]."' AND user_id = ".$userid;
$resQueryLastRead = mysql_query($szQueryLastRead) or die(mysql_error());
$nLastReadId = 0;
if(mysql_num_rows($resQueryLastRead)) {
$arrQueryLastRead = mysql_fetch_array($resQueryLastRead);
$nLastReadId = $arrQueryLastRead["comment_id"];
}
$nWhatComment = 0;
//counting the new posts
$szQueryCount = "SELECT COUNT(*) AS nCount FROM conf_comments WHERE topic_id = '".$arrQueryTopic["topic_id"]."' AND comment_id > '$nLastReadId'";
$resQueryCount = mysql_query($szQueryCount) or die("Error counting new posts  ! ".mysql_error());
$arrQueryCount = mysql_fetch_array($resQueryCount);
					if($arrQueryCount["nCount"] >0)
					{
						$nWhatComment	= $nLastReadId;
						//$nLastTopicId	= $arrQueryTopic["topic_id"];
						$bShowMarkAsRead = TRUE;
					}
					$nLastTopicId = $arrQueryTopic["topic_id"];
					$nTopicCounter++;
					//counting all the posts
					$szQueryCountAll = "SELECT COUNT(*) AS nCount FROM conf_comments WHERE topic_id = '".$arrQueryTopic["topic_id"]."'";
					$resQueryCountAll = mysql_query($szQueryCountAll) or die(mysql_error());
					$arrQueryCountAll = mysql_fetch_array($resQueryCountAll);
					if($arrQueryCount["nCount"] > 0) {$szPostsLabel	= "<font color=\"#A0A0A0\" style=\"font-size:9px;\">&nbsp;".$arrQueryCountAll["nCount"]."+".$arrQueryCount["nCount"]."</font>";}
					else {$szPostsLabel = "<font color=\"#A0A0A0\" style=\"font-size:9px;\">&nbsp;".$arrQueryCountAll["nCount"]."</font>";}
					?>
					<tr>
					<td valign="middle" align="center"><?if($arrQueryTopic["status"] == "2" AND $arrQueryTopic["sticky"] == "0"){?><img src="img/closed.gif" border="0"><?}elseif($arrQueryTopic["status"] == "2" AND $arrQueryTopic["sticky"] == "1"){?><img src="img/klicaj1.gif" border="0"><?}elseif($arrQueryTopic["status"] == "1"){?><img src="img/blank.gif" border="0"><?php }?></td>
					<td colspan="2" height="12" valign="middle">&nbsp;<a onclick="javascript:topicClick('ANCH<?php echo $arrQueryTopic['topic_id']?>')" id="ANCH<?php echo $arrQueryTopic['topic_id']?>" href="mainconf.php?szAction=viewtopic&nTopicId=<?=$arrQueryTopic['topic_id']?>&nCommentId=<?=$nWhatComment?>" target="mainFrame" title="<?=$szAltText?>"><?php if($arrQueryTopic["sticky"]=="1"){echo "<font color=\"red\">";}?><?=$szTopicName?><?php if($arrQueryTopic["sticky"]=="1"){echo "</font>";}?></a><?=$szPostsLabel?></td></tr>
					<?php
					if($nTopicCounter == $nFolderLimitLast) {break;}
					}
					$bShowPrevious	= FALSE;
					if($nLastTopicId)
					{
					//check if there is at least one more topic at this folder
					$szQueryF = "SELECT topic_id FROM conf_topics WHERE folder_id = '".$arrQuery["folder_id"]."' AND topic_id < '$nLastTopicId' LIMIT 1";
					$resQueryF = mysql_query($szQueryF) or die(mysql_error());
					if(mysql_num_rows($resQueryF)) {$bShowPrevious	= TRUE;}
				}
				if($bShowPrevious) {
				?>
				<tr bgcolor="#000000"><td colspan="3" height="1"></td></tr>
				<tr bgcolor="<?print CONFERENCE_COLOR?>"><td colspan="3" height="15" valign="middle">&nbsp;<a href="menuconf.php?szAction=previousmessages&nFolderId=<?=$arrQuery['folder_id']?>&nTopicId=<?=$nLastTopicId?>"><?=$label[524]?></a></td></tr>
				<?php
				}
				if($bShowMarkAsRead)
				{?>
				<tr bgcolor="#000000"><td colspan="3" height="1"></td></tr>
				<tr bgcolor="<?print CONFERENCE_COLOR?>"><td colspan="3" height="15" valign="middle">&nbsp;<a href="menuconf.php?szAction=markasread&nFolderId=<?=$arrQuery['folder_id']?>&nStartTopicId=<?=$nStartTopicId?>&nStopTopicId=<?=$nStopTopicId?>"><?=$label[546]?></a></td></tr>
				<?php }?>
				<tr bgcolor="#000000"><td colspan="3" height="1"></td></tr>				
<tr bgcolor="<?print CONFERENCE_COLOR?>"><td colspan="3" height="15" valign="middle">&nbsp;<a href="mainconf.php?szAction=newtopic&nFolderId=<?=$arrQuery['folder_id']?>" target="mainFrame"><?=$label[525]?></a></td></tr>
</table>
</td>
</tr>
<tr><td height="20" bgcolor="#ffedbf">&nbsp;</td></tr>
<?php
}
}
else {?><tr><td height="20" bgcolor="#ffedbf"><font color="#FF0000"><em><?=$label[551]?></em></font></td></tr><?php
}
}

elseif($szAction == "markasread")
{
	if(!isset($nFolderId) || !isset($nStartTopicId) || !isset($nStopTopicId)) {die();}

//repaired mark as read
$resQuery = mysql_query("SELECT max(comment_id) AS nMax, conf_comments.topic_id AS topick FROM conf_topics, conf_comments WHERE conf_comments.topic_id = conf_topics.topic_id AND folder_id = '$nFolderId' GROUP BY topick") or die(mysql_error());
while ($arrQuery = mysql_fetch_array($resQuery)) {
$nLastViewCommentId = $arrQuery[nMax];
$mtopicid = $arrQuery[topick];
mysql_query("REPLACE INTO conf_last_read SET user_id =$userid, comment_id = '$nLastViewCommentId', topic_id ='$mtopicid', date_read ='$now'") or die(mysql_error());
}

	//mark as read all this folder
	$szQuery = "SELECT * FROM conf_user_folder LEFT JOIN conf_folders USING(folder_id) WHERE conf_user_folder.user_id = ".$userid." AND conf_folders.folder_id = '$nFolderId'";
	$resQuery = mysql_query($szQuery) or die(mysql_error());
	if(mysql_num_rows($resQuery))
	{
		while($arrQuery = mysql_fetch_array($resQuery))
		{
		?>
			<tr>
				<td>
					<table width="100%" cellpadding="0" cellspacing="0" border="0" style="border: 1px solid #0E2127" bgcolor="#ffedbf">
						<tr bgcolor="<?print BGCOLOR;?>">
							<td width="12" height="1"></td>
							<td width="180"></td>
							<td width="12"></td>
						</tr>
						<tr bgcolor="<?print BGCOLOR;?>">
							<td colspan="2" height="15" valign="middle" bgcolor="#ffedbf">&nbsp;
						<?php
						switch($arrQuery['folder_type'])
						{
							case 'A':{$szConfName = $arrQuery['folder_id'];}break;
							case 'G':{$szConfName = $arrQuery['folder_id'];}break;
							case 'N':{$szConfName = $arrQuery['folder_id'];}break;
							default :{die("Invalid folder type !");}break;
						}
						$szConfName = trim($szConfName);
						if(strlen($szConfName) > 27) {$szConfName = substr($szConfName, 0, 27);}
						?><strong><font color="white"><?=$szConfName?></font></strong>
						</td>
						<td valign="middle" align="center"><a target="mainFrame" href="leaveconference.php?nFolderId=<?=$arrQuery['folder_id']?>" title="<?=$label[522]?>"><img align="absmiddle" src="img/leave.gif" border="0" alt="<?=$label[522]?>"></a></td>
						</tr>
						<?php
						$szQueryTopic	= "SELECT *, DATE_FORMAT(date_created, '%d.%m.%Y %H:%i:%s') AS szDateCreated FROM conf_topics WHERE folder_id = '".$arrQuery['folder_id']."' AND topic_id BETWEEN '$nStartTopicId' AND '$nStopTopicId' ORDER BY sticky DESC, date_created DESC";
						$resQueryTopic	= mysql_query($szQueryTopic) or die(mysql_error());
						$nLastTopicId = -1; $nTopicCounter = 0;
						$nStartTopicId = $nStopTopicId	= -1;
						while($arrQueryTopic = mysql_fetch_array($resQueryTopic))
						{
							$szTopicName = trim($arrQueryTopic["title"]);
							if(mb_strlen($szTopicName) > $nTopicMaxLength) {$szTopicName = mb_strcut($szTopicName, 0, $nTopicMaxLength);}
							$szQueryCreator = "SELECT username FROM users WHERE username = '".$arrQueryTopic["user_id"]."'";
							$resQueryCreator= mysql_query($szQueryCreator) or die("Error reading topic starter name  ! ".mysql_error());
							$arrQueryCreator = mysql_fetch_array($resQueryCreator);

							$szAltText = trim($arrQueryTopic["title"])." (".$arrQueryCreator["username"].", ".$arrQueryTopic["szDateCreated"].")";

							//check if there are new posts to this topic, otherwise I won't show this topic
							$szQueryLastRead = "SELECT comment_id FROM conf_last_read WHERE topic_id = '".$arrQueryTopic["topic_id"]."' AND user_id = ".$userid;
							$resQueryLastRead = mysql_query($szQueryLastRead) or die(mysql_error());
							$nLastReadId = 0;
							if(mysql_num_rows($resQueryLastRead))
							{
								$arrQueryLastRead = mysql_fetch_array($resQueryLastRead);
								$nLastReadId = $arrQueryLastRead["comment_id"];
							}
							$nWhatComment = 0;
							//counting the new posts
							$szQueryCount = "SELECT COUNT(*) AS nCount FROM conf_comments WHERE topic_id = '".$arrQueryTopic["topic_id"]."' AND comment_id > '$nLastReadId'";
							$resQueryCount = mysql_query($szQueryCount) or die(mysql_error());
							$arrQueryCount	= mysql_fetch_array($resQueryCount);
							if($arrQueryCount["nCount"] > 0)
							{
								$nWhatComment = $nLastReadId;
								$nLastTopicId = $arrQueryTopic["topic_id"];
							}
							$nTopicCounter ++;
							//counting all the posts
							$szQueryCountAll = "SELECT COUNT(*) AS nCount FROM conf_comments WHERE topic_id = '".$arrQueryTopic["topic_id"]."'";
							$resQueryCountAll = mysql_query($szQueryCountAll) or die(mysql_error());
							$arrQueryCountAll = mysql_fetch_array($resQueryCountAll);
							if($arrQueryCount["nCount"] > 0) {$szPostsLabel	= "<font color=\"#A0A0A0\" style=\"font-size:9px;\">&nbsp;".$arrQueryCountAll["nCount"]."+".$arrQueryCount["nCount"]."</font>";}
							else {$szPostsLabel = "<font color=\"#A0A0A0\" style=\"font-size:9px;\">&nbsp;".$arrQueryCountAll["nCount"]."</font>";}
							?>
							<tr>
							<td valign="middle" align="center"><?if($arrQueryTopic["status"] == "2" AND $arrQueryTopic["sticky"] == "0"){?><img src="img/closed.gif" border="0"><?}elseif($arrQueryTopic["status"] == "2" AND $arrQueryTopic["sticky"] == "1"){?><img src="img/klicaj1.gif" border="0"><?}elseif($arrQueryTopic["status"] == "1"){?><img src="img/blank.gif" border="0"><?}?></td>
							<td colspan="2" height="12" valign="middle">&nbsp;<a onclick="javascript:topicClick('ANCH<?php echo $arrQueryTopic['topic_id']?>')" id="ANCH<?php echo $arrQueryTopic['topic_id']?>" href="mainconf.php?szAction=viewtopic&nTopicId=<?=$arrQueryTopic['topic_id']?>&nCommentId=<?=$nWhatComment?>" target="mainFrame" title="<?=$szAltText?>"><?php if($arrQueryTopic["sticky"]=="1"){echo "<font color=\"red\">";}?><?=$szTopicName?><?php if($arrQueryTopic["sticky"]=="1"){echo "</font>";}?></a><?=$szPostsLabel?></td></tr>
							<?php
							if($nTopicCounter == $nFolderLimit) {break;}
						}
						//&& ($nTopicCounter == $nFolderLimit)
						if( ($nLastTopicId != -1)  )
						{
						?>
						<tr bgcolor="#000000"><td colspan="3" height="1"></td></tr>
						<tr bgcolor="<?print CONFERENCE_COLOR?>"><td colspan="3" height="15" valign="middle">&nbsp;<a href="menuconf.php?szAction=previousmessages&nFolderId=<?=$arrQuery['folder_id']?>&nTopicId=<?=$nLastTopicId?>"><?=$label[545]?></a></td></tr>
						<?php }
						if($nTopicCounter > 0)
						{?>
						<tr bgcolor="#000000"><td colspan="3" height="1"></td></tr>
						<tr bgcolor="<?print CONFERENCE_COLOR?>"><td colspan="3" height="15" valign="middle">&nbsp;<a href="menuconf.php?szAction=markasread&nFolderId=<?=$arrQuery['folder_id']?>&nStartTopicId=<?=$nStartTopicId?>&nStopTopicId=<?=$nStopTopicId?>"><?=$label[546]?></a></td></tr>
						<?php }?>
		<tr bgcolor="#000000"><td colspan="3" height="1"></td></tr>
		<tr bgcolor="<?print CONFERENCE_COLOR?>"><td colspan="3" height="15" valign="middle">&nbsp;<a href="mainconf.php?szAction=newtopic&nFolderId=<?=$arrQuery['folder_id']?>" target="mainFrame"><?=$label[525]?></a></td></tr>
		</table>
		</td>
		</tr>
		<tr><td height="20" bgcolor="#ffedbf">&nbsp;</td></tr>
		<?php
		}
	}
	else
	{
	?><tr><td height="20" bgcolor="#ffedbf"><font color="#FF0000"><em><?=$label[989]?><br/><?=$label[988]?></em></font></td></tr><?php
	}
}

$end = microtime_float(); 

if ($userid==1131313011) {
// Print results.
echo round($end - $start, 3); 
}
?>
</table>
</body>
</html>