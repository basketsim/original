<?
	////////////////////////////////////////////////////////////////////////////////
	// This script is used for CBPP match report									
	// Author: Florin Pandelea (aka obsy_)											
	// Last updated: 03.07.2007														
	////////////////////////////////////////////////////////////////////////////////

	$fetched_date		= date("d.m.Y H:i:s");
	$matchid			= $_GET['matchid'] ? $_GET['matchid'] : $_POST['matchid'];
	$matchid			= trim($matchid);

	if(strlen($matchid))
	{
		$q	= "SELECT * FROM matches WHERE matchid = '$matchid'";
		$r	= @mysql_query($q, $connect);
		if($r && @mysql_num_rows($r))
		{
			$a = mysql_fetch_array($r);
			$status	= "UNKNOWN";
			if(($a["crowd1"] > 0 || $a["crowd2"] > 0 || $a["crowd3"] > 0 || $a["crowd4"] > 0) && ( $a["home_score"] > 0 || $a["away_score"] > 0))
			{
				$status	= "FINISHED";
			}
			elseif(($a["crowd1"] > 0 || $a["crowd2"] > 0 || $a["crowd3"] > 0 || $a["crowd4"] > 0) && ( $a["home_score"] == 0 && $a["away_score"] == 0))
			{
				$status	= "ONGOING";
			}
			elseif( $a["crowd1"] == 0 && $a["crowd2"] == 0 && $a["crowd3"] == 0 && $a["crowd4"] == 0 && $a["home_score"] == 0 && $a["away_score"] == 0)
			{
				$status	= "UPCOMING";
			}
			//xml part
if($status == "UPCOMING")
{
$xml	= "<?xml version=\"1.0\"?>
<BasketSimData>
	<FileName>matchreport.php</FileName> 
	<Version>1.0</Version> 
	<FetchedDate>$fetched_date</FetchedDate>
	<MatchID>{$a['matchid']}</MatchID>
	<MatchType>{$a['type']}</MatchType>
	<MatchDate>{$a['time']}</MatchDate>
	<MatchSeason>{$a['season']}</MatchSeason>
	<MatchStatus>$status</MatchStatus>
</BasketSimData>";
}else{
$xml	= "<?xml version=\"1.0\"?>
<BasketSimData>
	<FileName>matchreport.php</FileName> 
	<Version>1.0</Version> 
	<FetchedDate>$fetched_date</FetchedDate>
	<MatchID>{$a['matchid']}</MatchID>
	<MatchType>{$a['type']}</MatchType>
	<MatchDate>{$a['time']}</MatchDate>
	<MatchSeason>{$a['season']}</MatchSeason>
	<MatchStatus>$status</MatchStatus>";
		$q	= "SELECT * FROM matchevents WHERE match_id = '$matchid' ORDER BY event_time, event_id";
		$r	= @mysql_query($q, $connect);
		if($r && @mysql_num_rows($r))
		{
			$xml	.= "
	<EventList Count=\"".mysql_num_rows($r)."\">";
			$counter	= 1;
			while($a = mysql_fetch_array($r))
			{
				$xml	.= "
		<Event Index=\"$counter\">
			<EventID>{$a['desc_id']}</EventID>
			<EventType>{$a['event_type']}</EventType>
			<EventTime>{$a['event_time']}</EventTime>
			<Player1ID>{$a['player1id']}</Player1ID>
			<Team1ID>{$a['team1id']}</Team1ID>
			<Player2ID>{$a['player2id']}</Player2ID>
			<Team2ID>{$a['team2id']}</Team2ID>
			<Quarter>{$a['quater']}</Quarter>
			<HomeScore>{$a['home_sc']}</HomeScore>
			<AwayScore>{$a['away_sc']}</AwayScore>
		</Event>";
				$counter ++;
			}
		}
	
	//<EventList Count=\"".mysql_num_rows($r)."\">
		
$xml	.=	"
	</EventList>
</BasketSimData>";
		}
	}
}
	header("Set-Cookie: CBPPCOOKIE={$session_id}; path=/; domain={$HTTP_HOST}; expires=".date("l, d-M-Y H:i:s", time()+1800));
	header('Content-Type: text/html; charset=UTF-8');
?>