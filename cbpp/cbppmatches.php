<?
	////////////////////////////////////////////////////////////////////////////////
	// This script is used for CBPP list of matches									
	// Author: Florin Pandelea (aka obsy_)											
	// Last updated: 08.07.2007														
	////////////////////////////////////////////////////////////////////////////////

	$fetched_date		= date("d.m.Y H:i:s");
	$teamid				= $_GET['teamid'] ? $_GET['teamid'] : $_POST['teamid'];
	$lastmatchdate		= $_GET['lastmatchdate'] ? $_GET['lastmatchdate'] : $_POST['lastmatchdate'];
	$teamid				= trim($teamid);
	$lastmatchdate		= trim($lastmatchdate);

	if(strlen($teamid))
	{
		$q	= "SELECT * FROM users WHERE club = '$teamid'";
		$r	= @mysql_query($q, $connect);
		if($r && @mysql_num_rows($r))
		{
			$a			= mysql_fetch_array($r);
			$UserID		= $a["userid"];
			$TeamID		= $a["club"];
			$Loginname	= $a["username"];
			$Name		= $a["realname"];

			$q	= "SELECT * FROM teams WHERE teamid = '$TeamID' AND status = '1'";
			$r	= @mysql_query($q, $connect);
			if($r && @mysql_num_rows($r))
			{
				$a				= mysql_fetch_array($r);
				$TeamName		= $a["name"];
				$ShortTeamName	= $a["short_name"];
				$CountryName	= $a["country"];
				$sdate			= date("Y-m-d H:i:s", (time()-21*86400));
				if($lastmatchdate)
				{
					$sdate	= $lastmatchdate;
				}
				$edate			= date("Y-m-d H:i:s", (time()+51*86400));
				$matches_list	= "";
				$q	= "SELECT * FROM matches WHERE home_id = '$teamid' AND time >= '$sdate'";
				$r	= @mysql_query($q, $connect);
				if(mysql_num_rows($r))
				{
					while($a = mysql_fetch_array($r))
					{
						$matches_list	.= ", ".$a['matchid'];
					}
				}

				$q	= "SELECT * FROM matches WHERE away_id = '$teamid' AND time >= '$sdate'";
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
					$q	= "SELECT * FROM matches WHERE matchid IN ($matches_list) ";
					$r	= @mysql_query($q, $connect);
					$mcounter	= mysql_num_rows($r);
			//xml part
$xml	= "<?xml version=\"1.0\"?>
<BasketSimData>
	<FileName>matches.php</FileName> 
	<Version>1.0</Version> 
	<UserID>$UserID</UserID>
	<FetchedDate>$fetched_date</FetchedDate>
	<Team>
		<TeamID>$TeamID</TeamID>
		<TeamName>$TeamName</TeamName>
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
						
						if(!strlen($HomeName))
						{
							$qn	= "SELECT name FROM teams WHERE teamid = '{$a['home_id']}'";
							$rn	= @mysql_query($qn, $connect);
							if($rn && @mysql_num_rows($rn))
							{
								$an				= mysql_fetch_array($rn);
								$HomeName		= $an["name"];
							}
						}
						
						if(!strlen($AwayName))
						{
							$qn	= "SELECT name FROM teams WHERE teamid = '{$a['away_id']}'";
							$rn	= @mysql_query($qn, $connect);
							if($rn && @mysql_num_rows($rn))
							{
								$an				= mysql_fetch_array($rn);
								$AwayName		= $an["name"];
							}
						}

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
	}

	header("Set-Cookie: CBPPCOOKIE={$session_id}; path=/; domain={$HTTP_HOST}; expires=".date("l, d-M-Y H:i:s", time()+1800));
	header('Content-Type: text/html; charset=UTF-8');
?>