<?php
include("common.php");
checklogin();
$msg = "";
$catname = "";
$catdesc = "";
$play=$_GET["player"];
$play = trim($play);
$play = strip_tags($play);
$play = addslashes($play);
if (isset($_POST['submit'])){
$play=$_POST["player"];
$play = trim($play);
$play = strip_tags($play);
$play = addslashes($play);
}
if (isset($_POST['submit1'])){
$def=$_POST["defid"]; $def = trim($def); $def = strip_tags($def); $def = addslashes($def);
$newp=$_POST["newpric"]; $newp = trim($newp); $newp = strip_tags($newp); $newp = addslashes($newp);
$fin=$_POST["fine"]; $fin = trim($fin); $fin = strip_tags($fin); $fin = addslashes($fin);
$iha = mysql_query("SELECT * FROM `transfers` WHERE trstatus='0' AND `transferid`='$def' LIMIT 1");
while ($i = mysql_fetch_array($iha)) {
$sellingid = $i['sellingid'];
$playerck = $i['playerid'];
$currentbid = $i['currentbid'];
$ekipe = mysql_query("SELECT teamid FROM users, teams WHERE users.club = teams.teamid AND users.userid = $sellingid LIMIT 1") or die(mysql_error());
if ((mysql_num_rows($ekipe)>0) && ($newp < $currentbid)) {
$ekipa = mysql_result($ekipe,0);
mysql_query("UPDATE teams SET `curmoney` = `curmoney` - $fin - $currentbid + $newp WHERE `teamid` = '$ekipa' LIMIT 1") or die(mysql_error());
if ($fin==0) {mysql_query("INSERT INTO `messages` VALUES ('', $sellingid, 0, 0, NOW(), 'Transfer adjusted', 'Transfer price for <a href=player.php?playerid=$playerck>$playerck</a> was adjusted from $currentbid to $newp due to overpricing. No unrealistic or prearranged transfers are allowed on the market as they are unfair towards all users who play in a fair way.<br/><br/><b>To respond to this message use gamemasters form only! Your matter is being handled by $usernam.</b>');") or die(mysql_error());}
if ($fin>0) {mysql_query("INSERT INTO `messages` VALUES ('', $sellingid, 0, 0, NOW(), 'Transfer adjusted', 'Transfer price for <a href=player.php?playerid=$playerck>$playerck</a> was adjusted from $currentbid to $newp due to overpricing. Additionaly you were fined $fin for cheating. Cheating on the transfer market is a serious issue, as it is unfair towards all users who play in a fair way. Being caught cheating on several occasions will result in permanent closure of your club.<br/><br/><b>To respond to this message use gamemasters form only! Your matter is being handled by $usernam.</b>');") or die(mysql_error());}
}
//message in odvzem denarja samo ob userju, v vsakem primeru pa zapis eventa
if ($fin==0) {mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'Transfer adjusted.', 1, 0);") or die(mysql_error());}
if ($fin==100000) {mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'Transfer adjusted and fine issued.', 1, -100000);") or die(mysql_error());}
if ($fin==200000) {mysql_query("INSERT INTO events VALUES ('', $ekipa, NOW(), 'Transfer adjusted and fine issued.', 1, -200000);") or die(mysql_error());}
mysql_query("UPDATE transfers SET price = $currentbid, currentbid = $newp WHERE transferid = '$def' LIMIT 1") or die(mysql_error());
echo "<b><font color=\"green\">SUCCESS!</font></b>";
}
}
?>
<html>
<head>
<title>Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<p><a href="index.php">Main</a></p>
<h3>Here you can adjust transfers</h3>
Transfers should only be adjusted in extreme cases, if transfer is only high, it shouldn't be adjusted. If it's unreasonable, then it must be adjusted. Ongoing transfers can never be adjusted!<br/><br/><hr/>
<?php
$transferid = $_GET["transferid"];
if (is_numeric($transferid)) {$bbb='ccc';} else {
?>
<form method="post" action="<?=$PHP_SELF?>" style="margin: 0">
<b>Player ID:</b>
<input type="text" name="player" size="17" value="<?=$play?>">
<input type="submit" value="Find transfers" name="submit">
</form>
<?php
}
if (is_numeric($play)) {
$iha = mysql_query("SELECT * FROM `transfers` WHERE `sellingid`<>`bidingteam` AND `trstatus`='0' AND `playerid` ='$play'");
while ($i = mysql_fetch_array($iha)) {
$bidingname = $i['bidingname'];
$bidingteam = $i['bidingteam'];
$sellingid = $i['sellingid'];
$playerclub = $i['playerclub'];
$price = $i['price'];
$currentbid = $i['currentbid'];

if ($bidingteam==0 && $sellingid<>0) {echo "<br/>",$i['timeofsale']," - Listed by <a href=\"../club.php?clubid=",$sellingid,"\">",$playerclub,"</a> for ",$i['price']," and wasn't sold.";}
if (($bidingteam<>0 && $sellingid<>0 && $price <= $currentbid) || ($bidingteam<>0 && $sellingid<>0 && $currentbid==0)) {echo "<br/>",$i['timeofsale']," - Listed by <a href=\"../club.php?clubid=",$sellingid,"\">",$playerclub,"</a> for ",$price," and sold to <a href=\"../club.php?clubid=",$bidingteam,"\">",$bidingname,"</a> for ",$i['currentbid'],". <a href=\"transfers.php?transferid=",$i['transferid'],"&playerid=",$play,"\"><font color=\"red\"><b>adjust</b></font></a>";}
if ($bidingteam<>0 && $sellingid<>0 && $price > $currentbid && $currentbid>0) {echo "<br/>",$i['timeofsale']," - Listed by <a href=\"../club.php?clubid=",$sellingid,"\">",$playerclub,"</a> for ",$price," and sold to <a href=\"../club.php?clubid=",$bidingteam,"\">",$bidingname,"</a> for ",$i['currentbid'],". <font color=\"green\"><b>adjusted</b></font>";}
}
}

if (is_numeric($transferid)) {
$playerid = $_GET['playerid'];
echo "<a href=\"../transferhistory.php?playerid=",$playerid,"\" target=\"_new\"><b>LINK TO PLAYER</b></a><br/>";
$iha = mysql_query("SELECT * FROM `transfers`, players WHERE transfers.playerid=players.id AND transfers.`trstatus`='0' AND transfers.`transferid` ='$transferid'");
while ($i = mysql_fetch_array($iha)) {
$bidingname = $i['bidingname'];
$bidingteam = $i['bidingteam'];
$sellingid = $i['sellingid'];
$playerclub = $i['playerclub'];
if ($sellingid<>0) {
/*
echo "Handling: ",$i['handling'],"<br/>";
echo "Quickness: ",$i['speed'],"<br/>";
echo "Passing: ",$i['passing'],"<br/>";
echo "Dribbling: ",$i['vision'],"<br/>";
echo "Rebounds: ",$i['rebounds'],"<br/>";
echo "Positioning: ",$i['position'],"<br/>";
echo "Freethrows: ",$i['freethrow'],"<br/>";
echo "Shooting: ",$i['shooting'],"<br/>";
echo "Defense: ",$i['defense'],"<br/>";
*/

echo "<br/>Time of sale: ", $i['timeofsale'],"<br/>";
echo "Listed by: <a href=\"../club.php?clubid=",$sellingid,"\">",$playerclub,"</a><br/>";
echo "Sold to: <a href=\"../club.php?clubid=",$bidingteam,"\">",$bidingname,"</a><br/>";
echo "Price: ",$i['currentbid'],"<br/>";
echo "Workrate: ",round(($i['workrate']-1)/8),"<br/>";
}
?>
<form method="post" action="<?=$PHP_SELF?>" style="margin: 0">
<br/><b>New price:</b> <input type="text" name="newpric" size="16" value="<?=$i['currentbid']?>">
<br/><b>Punishment:</b> <select name="fine"><option>0</option><option>100000</option><option>200000</option></select>

<br/><br/>Calculate the time of sale, EV, wage, star rating and other values to determine new price.
<br/>Don't use any additional punishment when no signs of cheating are visible. Use 200k fine for bad cheating cases.
<br/>When you have all the values right confirm it - transfer will be adjusted and additional money removed from the seller's account.
<br/><input type="hidden" value="<?=$transferid?>" name="defid">
<br/><input type="submit" value="Confirm transfer adjustment" name="submit1"> <a href="javascript: history.go(-1)">Go back without adjusting</a>
</form>
<?php
}
}
?>