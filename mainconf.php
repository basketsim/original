<?php
include("./thumbsup/init.php");
require_once("check_session.php");
if(!isset($szAction)) {$szAction = "confstart";}
?>
<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; CHARSET=UTF-8">
<LINK REL=STYLESHEET HREF="cupmanager.css" TYPE="text/css">
<LINK REL=STYLESHEET HREF="../thumbsup/styles.css" TYPE="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<?php echo ThumbsUp::javascript() ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60442811-1', 'auto');
  ga('send', 'pageview');

</script>

</HEAD>
<BODY bgcolor="#ffedbf">
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffedbf">
	<tr>
	<td width="100%" height="15">
	<table width="100%" height="100%" cellpadding="0" cellspacing="0" border="0" style="border: 1px solid #0E2127" bgcolor="#ffedbf">
	<tr bgcolor="<?print BGCOLOR;?>">
	<td width="100%" height="15" class="labels" valign="middle">&nbsp;<font color="white"><?php
	if(isset($nTopicId))
	{
		$resQuery = mysql_query("SELECT folder_id, title FROM conf_topics WHERE topic_id = '$nTopicId'") or die(mysql_error());
		$arrQuery = mysql_fetch_array($resQuery);
		echo "<strong>".$arrQuery["folder_id"]."&nbsp;&raquo;&nbsp;".$arrQuery["title"]."&nbsp;</strong>";
		$szKeepTopicTitle = $arrQuery["title"];
		if($szAction == "replycomment") {echo "<strong>&nbsp;&raquo;&nbsp;".$label[531]."&nbsp;</strong>";}
	} else {
if($szAction == "confstart") {echo "<strong>Basketsim ",$label[513],"&nbsp;&raquo;&nbsp;",$label[532],"</strong>";}
elseif($szAction == "newtopic")
	{
		$resQuery = mysql_query("SELECT * FROM conf_folders WHERE folder_id = '$nFolderId'") or die(mysql_error());
		$arrQuery = mysql_fetch_array($resQuery);
		switch($arrQuery['folder_type'])
		{
			case 'A':{$szConfName = $arrGlobalConferences[$arrQuery['folder_id']];}break;
			case 'G':{$szConfName = $arrGlobalConferences[$arrQuery['folder_id']];}break;
			case 'N':{
					$szQueryName = "SELECT country AS name FROM countries WHERE countryid = '".$arrQuery['item_id']."' LIMIT 1";
					$resQueryName = mysql_query($szQueryName) or die(mysql_error());
					$arrQueryName = mysql_fetch_array($resQueryName);
					$szConfName = $arrQueryName['name'];
				}break;
			default :{	die("Invalid folder type!");}break;
			}
			$szConfName = trim($szConfName);

			echo "<strong>",$nFolderId,"&nbsp;&raquo;&nbsp;",$label[525],"</strong>";
		}
	}
?>
</font>
</td></tr></table>
</td></tr>
<tr bgcolor="#ffedbf"><td height="20" bgcolor="#ffedbf">&nbsp;</td></tr>
</table>
<?php
include("$szAction.php");
?>
</body>
</html>