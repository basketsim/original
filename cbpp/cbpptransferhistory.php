<?
	////////////////////////////////////////////////////////////////////////////////
	// This script is used for CBPP trasnferhistory									
	// Author: Florin Pandelea (aka obsy_)											
	// Last updated: 07.07.2007														
	////////////////////////////////////////////////////////////////////////////////

	$fetched_date	= date("d.m.Y H:i:s");
	$teamid			= $_GET['teamid'] ? $_GET['teamid'] : $_POST['teamid'];
	$playerid		= $_GET['playerid'] ? $_GET['playerid'] : $_POST['playerid'];
	$teamid			= trim($teamid);
	$playerid		= trim($playerid);

	$q	= "";
	if(strlen($teamid)) //this is for the club transfer histry
	{
		$q = "SELECT * FROM transfers WHERE (sellingid = '$teamid' OR bidingteam = '$teamid') AND trstatus = '0' AND currentbid > 1 ORDER BY timeofsale DESC";
	}
	elseif(strlen($playerid)) //this is for player transfer history
	{
		$q = "SELECT * FROM transfers WHERE playerid = '$playerid' AND trstatus = '0' AND currentbid != 0 ORDER BY timeofsale DESC";
	}

	if(strlen($teamid) || strlen($playerid))
	{
		$r	= @mysql_query($q, $connect);
		if($r && @mysql_num_rows($r))
		{
			//xml part
$xml	= "<?xml version=\"1.0\"?>
<BasketSimData>
	<FileName>transferhistory.php</FileName> 
	<Version>1.0</Version> 
	<FetchedDate>$fetched_date</FetchedDate>
	<Transfers Count=\"".mysql_num_rows($r)."\">";
			$counter = 0;
			while($a = mysql_fetch_array($r))
			{
				//reading player name
				$plname = "";
				$qn = "SELECT name, surname FROM players WHERE id = '{$a['playerid']}'";
				$rn = mysql_query($qn, $connect);
				if(mysql_num_rows($rn))
				{
					$an = mysql_fetch_array($rn);
					$plname = $an["name"]." ".$an["surname"];
				}
				$xml .= "
		<Transfer Index=\"{$counter}\">
			<PlayerID>{$a['playerid']}</PlayerID>
			<PlayerName>$plname</PlayerName>
			<AskingPrice>{$a['price']}</AskingPrice>
			<SellingPrice>{$a['currentbid']}</SellingPrice>
			<Position>{$a['position']}</Position>
			<SellerID>{$a['sellingid']}</SellerID>
			<SellerName>{$a['playerclub']}</SellerName>
			<BuyerID>{$a['bidingteam']}</BuyerID>
			<BuyerName>{$a['bidingname']}</BuyerName>
			<TimeOfSale>{$a['timeofsale']}</TimeOfSale>
		</Transfer>";
				$counter ++;
			}

			//xml part
$xml	.= "
	</Transfers>
</BasketSimData>";
		}
	}

	header("Set-Cookie: CBPPCOOKIE={$session_id}; path=/; domain={$HTTP_HOST}; expires=".date("l, d-M-Y H:i:s", time()+1800));
	header('Content-Type: text/html; charset=UTF-8');
?>