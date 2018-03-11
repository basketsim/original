<?
	////////////////////////////////////////////////////////////////////////////////
	// This script is used for CBPP national team match stats						
	// Author: Florin Pandelea (aka obsy_)											
	// Last updated: 08.07.2007														
	////////////////////////////////////////////////////////////////////////////////

	$fetched_date		= date("d.m.Y H:i:s");
	$matchid			= $_GET['matchid'] ? $_GET['matchid'] : $_POST['matchid'];
	$matchid			= trim($matchid);

	if(strlen($matchid))
	{
		$q	= "SELECT * FROM nt_matches WHERE matchid = '$matchid'";
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
$xml	= "<?xml version=\"1.0\"?>
<BasketSimData>
	<FileName>nationalteammatchstats.php</FileName> 
	<Version>1.0</Version> 
	<FetchedDate>$fetched_date</FetchedDate>
	<MatchID>{$a['matchid']}</MatchID>
	<MatchType>{$a['type']}</MatchType>
	<MatchDate>{$a['time']}</MatchDate>
	<MatchSeason>{$a['season']}</MatchSeason>
	<MatchStatus>$status</MatchStatus>";
			if($status	== "FINISHED")
			{
				$q	= "SELECT * FROM nt_statistics WHERE `match` = '$matchid' ORDER BY team, player";
				$r	= @mysql_query($q, $connect);
				if($r && @mysql_num_rows($r))
				{
					$xml	.= "
	<MatchStatsList Count=\"".mysql_num_rows($r)."\">";
					$counter	= 1;
					while($a = mysql_fetch_array($r))
					{
						$xml .= "
		<Stat Index=\"$counter\">
			<PlayerID>{$a['player']}</PlayerID>
			<TeamID>{$a['team']}</TeamID>
			<Type>{$a['type']}</Type>
			<League>{$a['league']}</League>
			<Country>{$a['country']}</Country>
			<Season>{$a['season']}</Season>
			<OneScored>{$a['one_scored']}</OneScored>
			<OneTotal>{$a['one_total']}</OneTotal>
			<TwoScored>{$a['two_scored']}</TwoScored>
			<TwoTotal>{$a['two_total']}</TwoTotal>
			<ThreeScored>{$a['three_scored']}</ThreeScored>
			<ThreeTotal>{$a['three_total']}</ThreeTotal>
			<DefensiveRebounds>{$a['def_rebounds']}</DefensiveRebounds>
			<OffensiveRebounds>{$a['off_rebounds']}</OffensiveRebounds>
			<Blocks>{$a['blocks']}</Blocks>
			<Assists>{$a['assists']}</Assists>
			<Steals>{$a['steals']}</Steals>
			<Fouls>{$a['fouls']}</Fouls>
			<Turnovers>{$a['turnovers']}</Turnovers>
		</Stat>";
						$counter ++;
					}
				}
					$xml	.= "
	</MatchStatsList>";
			}
$xml	.=	"
</BasketSimData>";
		}
	}

	header("Set-Cookie: CBPPCOOKIE={$session_id}; path=/; domain={$HTTP_HOST}; expires=".date("l, d-M-Y H:i:s", time()+1800));
	header('Content-Type: text/html; charset=UTF-8');
?>