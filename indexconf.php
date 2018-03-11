<?php
$dbyear = date("Y"); $dbmonth = date("m"); $dbday = date("d"); $dbhour = date("H"); $dbmin = date("i"); $dbsec = date("s"); $now = date("Y-m-d H:i:s", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));

if (!$_COOKIE['userid'] || !$_COOKIE['geslo']) {die(include 'basketsim.php');} else {require_once('inc/config.php');}
include '../thumbsup/init.php';

$current_right = 0;

$compare = mysql_query("SELECT `club` , `supporter` , `level` FROM `users` WHERE `password` ='$koda' AND userid ='$userid' LIMIT 1") or die(mysql_error());
if (mysql_num_rows($compare)) {
$trueclub = mysql_result($compare,0,'club');
$is_supporter = mysql_result($compare,0,'supporter');
$current_right = mysql_result($compare,0,'level');
}
else {die(include 'basketsim.php');}

reset($_POST); reset($_GET);
	if($current_right==0){
	?>
	<form name="frmBack" method="post" action="index.php?forum=no">
	<input type="Hidden" name="bBack" value="1">
	</form>
	<script language="JavaScript">
	document.frmBack.submit();
	</script>
	<?php
	}
	if(isset($nItemId))
	{
		if($nFolderType <> 'A' && $nFolderType <> 'C' && $nFolderType <> 'G' && $nFolderType <> 'L' && $nFolderType <> 'R' && $nFolderType <> 'N')
		{
		?>
		<form name="frmBack" method="post" action="index.php">
		<input type="Hidden" name="bBack" value="1">
		</form>
		<script language="JavaScript">
		document.frmBack.submit();
		</script>
		<?php
		die();
		}
		$nItemId = trim($nItemId);
		$nFolderType = trim($nFolderType);
		$nFolderId = $nFolderType.$nItemId;

		if(!isset($arrFoldersPriorities[$nFolderType]))
		{
		?>
		<form name="frmBack" method="post" action="index.php">
		<input type="Hidden" name="bBack" value="1">
		</form>
		<script language="JavaScript">
		document.frmBack.submit();
		</script>
		<?php
		die();
		}
		$szQuery = "REPLACE INTO conf_folders SET item_id = '$nItemId', folder_type = '$nFolderType',  folder_priority = '".$arrFoldersPriorities[$nFolderType]."', folder_id = '$nFolderId'";
		$resQuery = mysql_query($szQuery) or die(mysql_error());

		$szQuery = "REPLACE INTO conf_user_folder SET user_id = ".$userid.", folder_id = '$nFolderId', join_date = '$now'";
		$resQuery = mysql_query($szQuery) or die(mysql_error());
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HEAD>
<TITLE>Basketsim Forums</TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; CHARSET=UTF-8">
</HEAD>
<frameset cols="*,68%,*" frameborder="no" border="0" framespacing="0">
   <frame name="leftDummyFrame" src="inc/blank1.php" marginwidth="0" marginheight="0" scrolling="no" frameborder="no">
   <frameset rows="80px,*" frameborder="no" border="0" framespacing="0">
       <frame name="logoFrame" src="logofullconf.php?is=<?=$is_supporter?>" marginwidth="0" marginheight="0" scrolling="no" frameborder="no">
       <frameset cols="26%,2%,72%" frameborder="no" border="0" framespacing="0">
           <frame name="menuFrame" src="menuconf.php" marginwidth="0" marginheight="0" scrolling="auto" frameborder="no">
           <frame name="blankFrame" src="inc/blank1.php" marginwidth="0" marginheight="0" scrolling="no" frameborder="no">
           <frame name="mainFrame" src="mainconf.php" marginwidth="0" marginheight="0" scrolling="auto" frameborder="no">
       </frameset>
   </frameset>
   <frame name="rightDummyFrame" src="inc/blank1.php" marginwidth="0" marginheight="0" scrolling="no" frameborder="no">
</frameset>