<?php
include("common.php");
checklogin();
$msg = "";
$catname = "";
$catdesc = "";
$club=$_GET["club"];
$club = trim($club);
$club = strip_tags($club);
$club = addslashes($club);
if (isset($_POST['submit'])){
$club = $_POST["club"];
$club = trim($club);
$club = strip_tags($club);
$club = addslashes($club);
}
?>
<html>
<head>
<title>Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<p><a href="index.php">Main</a> | <a href="javascript: history.go(-1)">Back</a></p>

<?php if ($club){?><h3>CURRENT BIDS BY USER <a href="../club.php?clubid=<?=$club?>"><?=$club?></a></h3>
<?php
$curbid = mysql_query("SELECT playerid, playerclub, sellingid, price, currentbid FROM transfers WHERE bidingteam='$club' AND trstatus=1");
while ($c = mysql_fetch_array($curbid)) {
$playerid = $c['playerid'];
$playerclub = $c['playerclub'];
$sellingid = $c['sellingid'];
$price = $c['price'];
$currentbid = $c['currentbid'];
?>
<b>Player:</b> <a href="../player.php?playerid=<?=$playerid?>"><?=$playerid?></a> <b>Listed for:</b> <?=$price?> (<a href="../club.php?clubid=<?=$sellingid?>" target="_new"><?=stripslashes($playerclub)?></a>) <b>Current bid:</b> <?=$currentbid?><br/>
<hr/>
<?php
$ag=44;
}
}
if ($club >0 AND $ag<>44) {echo "<i>No bids</i><br/><br/>";}
?>

<h3>Enter userid (NOT teamid! You can get userid from club's URL when you check home page of the club)</h3>

<form method="post" action="<?=$PHP_SELF?>" style="margin: 0">
<b>User id:</b> <input type="text" name="club" size="10" value="<?=$club?>"> <input type="submit" value="Check current bids" name="submit">
</form>