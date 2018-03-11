<?php
$dbyear = date("Y"); $dbmonth = date("m"); $dbday = date("d");
$dbhour = date("H"); $dbmin = date("i"); $dbsec = date("s");
$now = date("Y-m-d H:i:s", mktime($dbhour,$dbmin,$dbsec,$dbmonth,$dbday,$dbyear));
require_once("check_session.php");
$nTopicId = $_GET["nTopicId"];
$nCommentId = $_GET["$nCommentId"];
if(empty($nTopicId)) {die();}
if($current_right < 2) {die();}
mysql_query("UPDATE conf_topics SET sticky = '1' WHERE topic_id = '$nTopicId' LIMIT 1") or die(mysql_error());
?>
<form name="frmForward" method="post" target="_self" action="mainconf.php">
<input type="Hidden" name="szAction" value="viewtopic">
<input type="Hidden" name="nTopicId" value="<?=$nTopicId?>">
<input type="Hidden" name="nCommentId" value="<?=$nCommentId?>">
<input type="Hidden" name="nAsReply" value="1">
</form>
<script language="JavaScript">
document.frmForward.submit();
</script>