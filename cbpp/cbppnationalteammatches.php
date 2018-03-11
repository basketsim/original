<?
	////////////////////////////////////////////////////////////////////////////////
	// This script is used for CBPP list of national team matches					
	// Author: Florin Pandelea (aka obsy_)											
	// Last updated: 08.07.2007														
	////////////////////////////////////////////////////////////////////////////////

	$fetched_date		       = date("d.m.Y H:i:s");
	$country			= $_GET['country'] ? $_GET['country'] : $_POST['country'];
	$lastmatchdate		= $_GET['lastmatchdate'] ? $_GET['lastmatchdate'] : $_POST['lastmatchdate'];
	$country			= trim($country);
	$lastmatchdate		= trim($lastmatchdate);

	if(strlen($country))
	{
		$q	= "SELECT countryid FROM countries WHERE country = '$country'";
		$r	= @mysql_query($q, $connect);
		if($r && @mysql_num_rows($r))
		{
			$a	= mysql_fetch_array($r);
			$countryid	= $a['countryid'];

			$sdate			= date("Y-m-d H:i:s", (time()-21*86400));
			if($lastmatchdate)
			{
				$sdate	= $lastmatchdate;
			}

			$matches_list	= "";
			$q	= "SELECT matchid FROM nt_matches WHERE home_id = '$countryid' AND time >= '$sdate'";
			$r	= @mysql_query($q, $connect);
			if(mysql_num_rows($r))
			{
				while($a = mysql_fetch_array($r))
				{
					$matches_list	.= ", ".$a['matchid'];
				}
			}

			$q	= "SELECT matchid FROM nt_matches WHERE away_id = '$countryid' AND time >= '$sdate'";
			$r	= @mysql_query($q, $connect);
			if(mysql_num_rows($r))
			{
				while($a = mysql_fetch_array($r))
				{
					$matches_list	.= ", ".$a['matchid'];
				}
			}
			if(strlen($matches_list))
			{
				$matches_list	= trim(substr($matches_list, 1));
				$q	= "SELECT * FROM nt_matches WHERE matchid IN ($matches_list) ";
				$r	= @mysql_query($q, $connect);
				$mcounter = @mysql_num_rows($r);
			//xml part
$xml	= "<?xml version=\"1.0\"?>
<BasketSimData>
	<FileName>nationalteammatches.php</FileName> 
	<Version>1.0</Version> 
	<FetchedDate>$fetched_date</FetchedDate>
	<Team>
		<TeamName>$country</TeamName>
		<MatchList Count=\"$mcounter\">";
					$counter	= 0;
					while($a = mysql_fetch_array($r))
					{
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
						
						$HomeName	= $a['home_name'];
						$AwayName	= $a['away_name'];

						$xml	.="
			<Match Index=\"$counter\">
				<MatchID>{$a['matchid']}</MatchID>
				<HomeTeam>
					<HomeTeamID>{$a['home_id']}</HomeTeamID>
					<HomeTeamName>$HomeName</HomeTeamName>
				</HomeTeam>
				<AwayTeam>
					<AwayTeamID>{$a['away_id']}</AwayTeamID>
					<AwayTeamName>$AwayName</AwayTeamName>
				</AwayTeam>
				<MatchDate>{$a['time']}</MatchDate>
				<MatchType>{$a['type']}</MatchType>
				<HomeGoals>{$a['home_score']}</HomeGoals>
				<AwayGoals>{$a['away_score']}</AwayGoals>
				<Status>$status</Status>
			</Match>";
						$counter ++;
					}

$xml	.="
		</MatchList>
	</Team>
</BasketSimData>";
			}
		}
	}

	header("Set-Cookie: CBPPCOOKIE={$session_id}; path=/; domain={$HTTP_HOST}; expires=".date("l, d-M-Y H:i:s", time()+1800));
	header('Content-Type: text/html; charset=UTF-8');
?>