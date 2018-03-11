<?
	////////////////////////////////////////////////////////////////////////////////
	// This script is used for CBPP match details									
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
			$HomeName	= $AwayName	= $ArenaName	= "";
			$qn	= "SELECT * FROM teams WHERE teamid = '{$a['home_id']}'";
			$rn	= @mysql_query($qn, $connect);
			if($rn && @mysql_num_rows($rn))
			{
				$an				= mysql_fetch_array($rn);
				$HomeName		= $an["name"];
			}
			$qn	= "SELECT * FROM teams WHERE teamid = '{$a['away_id']}'";
			$rn	= @mysql_query($qn, $connect);
			if($rn && @mysql_num_rows($rn))
			{
				$an				= mysql_fetch_array($rn);
				$AwayName		= $an["name"];
			}

			$qn	= "SELECT * FROM arena WHERE arenaid = '{$a['arena_id']}'";
			$rn	= @mysql_query($qn, $connect);
			if($rn && @mysql_num_rows($rn))
			{
				$an			= mysql_fetch_array($rn);
				$ArenaName	= $an["arenaname"];
			}
			//xml part
			if ($status == "UPCOMING")
			{
			$xml	= "<?xml version=\"1.0\"?>
<BasketSimData>
	<FileName>matchdetails.php</FileName> 
	<Version>1.0</Version> 
	<FetchedDate>$fetched_date</FetchedDate>
	<Match>
		<MatchID>{$a['matchid']}</MatchID>
		<MatchType>{$a['type']}</MatchType>
		<MatchDate>{$a['time']}</MatchDate>
		<MatchSeason>{$a['season']}</MatchSeason>
		<MatchStatus>$status</MatchStatus>
		<HomeTeam>
			<HomeTeamID>{$a['home_id']}</HomeTeamID> 
			<HomeTeamName>$HomeName</HomeTeamName>
		</HomeTeam>
		<AwayTeam>
			<AwayTeamID>{$a['away_id']}</AwayTeamID> 
			<AwayTeamName>$AwayName</AwayTeamName>
		</AwayTeam>
	</Match>
</BasketSimData>";
			}else{
$xml	= "<?xml version=\"1.0\"?>
<BasketSimData>
	<FileName>matchdetails.php</FileName> 
	<Version>1.0</Version> 
	<FetchedDate>$fetched_date</FetchedDate>
	<Match>
		<MatchID>{$a['matchid']}</MatchID>
		<MatchType>{$a['type']}</MatchType>
		<MatchDate>{$a['time']}</MatchDate>
		<MatchSeason>{$a['season']}</MatchSeason>
		<MatchStatus>$status</MatchStatus>
		<HomeTeam>
			<HomeTeamID>{$a['home_id']}</HomeTeamID> 
			<HomeTeamName>$HomeName</HomeTeamName>
			<HomeScore>{$a['home_score']}</HomeScore>
			<HomeDefensiveStrategy>{$a['home_def']}</HomeDefensiveStrategy>
			<HomeOffensiveStrategy>{$a['home_off']}</HomeOffensiveStrategy>";

			$name = "";
			if($a['home_pg1'] > 0)
			{
				$qn = "SELECT CONCAT(name,' ',surname) AS name FROM players WHERE id = '{$a['home_pg1']}'";
				$rn	= @mysql_query($qn, $connect);
				if($rn && @mysql_num_rows($rn))
				{
					$an		= mysql_fetch_array($rn);
					$name	= $an["name"];
				}
			}
			
			$xml .= "
			<HomePointGuardID>{$a['home_pg1']}</HomePointGuardID>
			<HomePointGuardName>$name</HomePointGuardName>";
			
			$name = "";
			if($a['home_sg1'] > 0)
			{
				$qn = "SELECT CONCAT(name,' ',surname) AS name FROM players WHERE id = '{$a['home_sg1']}'";
				$rn	= @mysql_query($qn, $connect);
				if($rn && @mysql_num_rows($rn))
				{
					$an		= mysql_fetch_array($rn);
					$name	= $an["name"];
				}
			}

			$xml .= "
			<HomeShootingGuardID>{$a['home_sg1']}</HomeShootingGuardID>
			<HomeShootingGuardName>$name</HomeShootingGuardName>";
			
			$name = "";
			if($a['home_sf1'] > 0)
			{
				$qn = "SELECT CONCAT(name,' ',surname) AS name FROM players WHERE id = '{$a['home_sf1']}'";
				$rn	= @mysql_query($qn, $connect);
				if($rn && @mysql_num_rows($rn))
				{
					$an		= mysql_fetch_array($rn);
					$name	= $an["name"];
				}
			}
			
			$xml.="
			<HomeSmallForwardID>{$a['home_sf1']}</HomeSmallForwardID>
			<HomeSmallForwardName>$name</HomeSmallForwardName>";
			
			$name = "";
			if($a['home_pf1'] > 0)
			{
				$qn = "SELECT CONCAT(name,' ',surname) AS name FROM players WHERE id = '{$a['home_pf1']}'";
				$rn	= @mysql_query($qn, $connect);
				if($rn && @mysql_num_rows($rn))
				{
					$an		= mysql_fetch_array($rn);
					$name	= $an["name"];
				}
			}

			$xml .= "
			<HomePowerForwardID>{$a['home_pf1']}</HomePowerForwardID>
			<HomePowerForwardName>$name</HomePowerForwardName>";
			
			if($a['home_c1'] > 0)
			{
				$name = "";
				$qn = "SELECT CONCAT(name,' ',surname) AS name FROM players WHERE id = '{$a['home_c1']}'";
				$rn	= @mysql_query($qn, $connect);
				if($rn && @mysql_num_rows($rn))
				{
					$an		= mysql_fetch_array($rn);
					$name	= $an["name"];
				}
			}
			
			$xml .="
			<HomeCenterID>{$a['home_c1']}</HomeCenterID>
			<HomeCenterName>$name</HomeCenterName>";
			
			$name = "";
			if($a['home_pg2'] > 0)
			{
				$qn = "SELECT CONCAT(name,' ',surname) AS name FROM players WHERE id = '{$a['home_pg2']}'";
				$rn	= @mysql_query($qn, $connect);
				if($rn && @mysql_num_rows($rn))
				{
					$an		= mysql_fetch_array($rn);
					$name	= $an["name"];
				}
			}
			
			$xml .= "
			<HomeReservePointGuardID>{$a['home_pg2']}</HomeReservePointGuardID>
			<HomeReservePointGuardName>$name</HomeReservePointGuardName>";
			
			$name = "";
			if($a['home_sg2'] > 0)
			{
				$qn = "SELECT CONCAT(name,' ',surname) AS name FROM players WHERE id = '{$a['home_sg2']}'";
				$rn	= @mysql_query($qn, $connect);
				if($rn && @mysql_num_rows($rn))
				{
					$an		= mysql_fetch_array($rn);
					$name	= $an["name"];
				}
			}

			$xml .= "
			<HomeReserveShootingGuardID>{$a['home_sg2']}</HomeReserveShootingGuardID>
			<HomeReserveShootingGuardName>$name</HomeReserveShootingGuardName>";
			
			$name = "";
			if($a['home_sf2'] > 0)
			{
				$qn = "SELECT CONCAT(name,' ',surname) AS name FROM players WHERE id = '{$a['home_sf2']}'";
				$rn	= @mysql_query($qn, $connect);
				if($rn && @mysql_num_rows($rn))
				{
					$an		= mysql_fetch_array($rn);
					$name	= $an["name"];
				}
			}
			
			$xml.="
			<HomeReserveSmallForwardID>{$a['home_sf2']}</HomeReserveSmallForwardID>
			<HomeReserveSmallForwardName>$name</HomeReserveSmallForwardName>";
			
			$name = "";
			if($a['home_pf2'] > 0)
			{
				$qn = "SELECT CONCAT(name,' ',surname) AS name FROM players WHERE id = '{$a['home_pf2']}'";
				$rn	= @mysql_query($qn, $connect);
				if($rn && @mysql_num_rows($rn))
				{
					$an		= mysql_fetch_array($rn);
					$name	= $an["name"];
				}
			}

			$xml .= "
			<HomeReservePowerForwardID>{$a['home_pf2']}</HomeReservePowerForwardID>
			<HomeReservePowerForwardName>$name</HomeReservePowerForwardName>";
			
			$name = "";
			if($a['home_c2'] > 0)
			{
				$qn = "SELECT CONCAT(name,' ',surname) AS name FROM players WHERE id = '{$a['home_c2']}'";
				$rn	= @mysql_query($qn, $connect);
				if($rn && @mysql_num_rows($rn))
				{
					$an		= mysql_fetch_array($rn);
					$name	= $an["name"];
				}
			}
			
			$xml .="
			<HomeReserveCenterID>{$a['home_c2']}</HomeReserveCenterID>
			<HomeReserveCenterName>$name</HomeReserveCenterName>";

			$xml .="
			<HomePointGuardRating>{$a['hpg_rating']}</HomePointGuardRating>
			<HomeShootingGuardRating>{$a['hsg_rating']}</HomeShootingGuardRating>
			<HomeSmallForwardRating>{$a['hsf_rating']}</HomeSmallForwardRating>
			<HomePowerForwardRating>{$a['hpf_rating']}</HomePowerForwardRating>
			<HomeCenterRating>{$a['hc_rating']}</HomeCenterRating>
		</HomeTeam>
		<AwayTeam>
			<AwayTeamID>{$a['away_id']}</AwayTeamID> 
			<AwayTeamName>$AwayName</AwayTeamName>
			<AwayScore>{$a['away_score']}</AwayScore>
			<AwayDefensiveStrategy>{$a['away_def']}</AwayDefensiveStrategy>
			<AwayOffensiveStrategy>{$a['away_off']}</AwayOffensiveStrategy>";
			
			
			$name = "";
			if($a['away_pg1'] > 0)
			{
				$qn = "SELECT CONCAT(name,' ',surname) AS name FROM players WHERE id = '{$a['away_pg1']}'";
				$rn	= @mysql_query($qn, $connect);
				if($rn && @mysql_num_rows($rn))
				{
					$an		= mysql_fetch_array($rn);
					$name	= $an["name"];
				}
			}
			
			$xml .= "
			<AwayPointGuardID>{$a['away_pg1']}</AwayPointGuardID>
			<AwayPointGuardName>$name</AwayPointGuardName>";
			
			$name = "";
			if($a['away_sg1'] > 0)
			{
				$qn = "SELECT CONCAT(name,' ',surname) AS name FROM players WHERE id = '{$a['away_sg1']}'";
				$rn	= @mysql_query($qn, $connect);
				if($rn && @mysql_num_rows($rn))
				{
					$an		= mysql_fetch_array($rn);
					$name	= $an["name"];
				}
			}

			$xml .= "
			<AwayShootingGuardID>{$a['away_sg1']}</AwayShootingGuardID>
			<AwayShootingGuardName>$name</AwayShootingGuardName>";
			
			$name = "";
			if($a['away_sf1'] > 0)
			{
				$qn = "SELECT CONCAT(name,' ',surname) AS name FROM players WHERE id = '{$a['away_sf1']}'";
				$rn	= @mysql_query($qn, $connect);
				if($rn && @mysql_num_rows($rn))
				{
					$an		= mysql_fetch_array($rn);
					$name	= $an["name"];
				}
			}
			
			$xml.="
			<AwaySmallForwardID>{$a['away_sf1']}</AwaySmallForwardID>
			<AwaySmallForwardName>$name</AwaySmallForwardName>";
			
			$name = "";
			if($a['away_pf1'] > 0)
			{
				$qn = "SELECT CONCAT(name,' ',surname) AS name FROM players WHERE id = '{$a['away_pf1']}'";
				$rn	= @mysql_query($qn, $connect);
				if($rn && @mysql_num_rows($rn))
				{
					$an		= mysql_fetch_array($rn);
					$name	= $an["name"];
				}
			}

			$xml .= "
			<AwayPowerForwardID>{$a['away_pf1']}</AwayPowerForwardID>
			<AwayPowerForwardName>$name</AwayPowerForwardName>";
			
			if($a['away_c1'] > 0)
			{
				$name = "";
				$qn = "SELECT CONCAT(name,' ',surname) AS name FROM players WHERE id = '{$a['away_c1']}'";
				$rn	= @mysql_query($qn, $connect);
				if($rn && @mysql_num_rows($rn))
				{
					$an		= mysql_fetch_array($rn);
					$name	= $an["name"];
				}
			}
			
			$xml .="
			<AwayCenterID>{$a['away_c1']}</AwayCenterID>
			<AwayCenterName>$name</AwayCenterName>";
			
			$name = "";
			if($a['away_pg2'] > 0)
			{
				$qn = "SELECT CONCAT(name,' ',surname) AS name FROM players WHERE id = '{$a['away_pg2']}'";
				$rn	= @mysql_query($qn, $connect);
				if($rn && @mysql_num_rows($rn))
				{
					$an		= mysql_fetch_array($rn);
					$name	= $an["name"];
				}
			}
			
			$xml .= "
			<AwayReservePointGuardID>{$a['away_pg2']}</AwayReservePointGuardID>
			<AwayReservePointGuardName>$name</AwayReservePointGuardName>";
			
			$name = "";
			if($a['away_sg2'] > 0)
			{
				$qn = "SELECT CONCAT(name,' ',surname) AS name FROM players WHERE id = '{$a['away_sg2']}'";
				$rn	= @mysql_query($qn, $connect);
				if($rn && @mysql_num_rows($rn))
				{
					$an		= mysql_fetch_array($rn);
					$name	= $an["name"];
				}
			}

			$xml .= "
			<AwayReserveShootingGuardID>{$a['away_sg2']}</AwayReserveShootingGuardID>
			<AwayReserveShootingGuardName>$name</AwayReserveShootingGuardName>";
			
			$name = "";
			if($a['away_sf2'] > 0)
			{
				$qn = "SELECT CONCAT(name,' ',surname) AS name FROM players WHERE id = '{$a['away_sf2']}'";
				$rn	= @mysql_query($qn, $connect);
				if($rn && @mysql_num_rows($rn))
				{
					$an		= mysql_fetch_array($rn);
					$name	= $an["name"];
				}
			}
			
			$xml.="
			<AwayReserveSmallForwardID>{$a['away_sf2']}</AwayReserveSmallForwardID>
			<AwayReserveSmallForwardName>$name</AwayReserveSmallForwardName>";
			
			$name = "";
			if($a['away_pf2'] > 0)
			{
				$qn = "SELECT CONCAT(name,' ',surname) AS name FROM players WHERE id = '{$a['away_pf2']}'";
				$rn	= @mysql_query($qn, $connect);
				if($rn && @mysql_num_rows($rn))
				{
					$an		= mysql_fetch_array($rn);
					$name	= $an["name"];
				}
			}

			$xml .= "
			<AwayReservePowerForwardID>{$a['away_pf2']}</AwayReservePowerForwardID>
			<AwayReservePowerForwardName>$name</AwayReservePowerForwardName>";
			
			$name = "";
			if($a['away_c2'] > 0)
			{
				$qn = "SELECT CONCAT(name,' ',surname) AS name FROM players WHERE id = '{$a['away_c2']}'";
				$rn	= @mysql_query($qn, $connect);
				if($rn && @mysql_num_rows($rn))
				{
					$an		= mysql_fetch_array($rn);
					$name	= $an["name"];
				}
			}

			////
			////
			////
			///////
			//////
			//////
			
			
			/*
			<AwayPointGuardID>{$a['away_pg1']}</AwayPointGuardID>
			<AwayShootingGuardID>{$a['away_sg1']}</AwayShootingGuardID>
			<AwaySmallForwardID>{$a['away_sf1']}</AwaySmallForwardID>
			<AwayPowerForwardID>{$a['away_pf1']}</AwayPowerForwardID>
			<AwayCenterID>{$a['away_c1']}</AwayCenterID>
			<AwayReservePointGuardID>{$a['away_pg2']}</AwayReservePointGuardID>
			<AwayReserveShootingGuardID>{$a['away_sg2']}</AwayReserveShootingGuardID>
			<AwayReserveSmallForwardID>{$a['away_sf2']}</AwayReserveSmallForwardID>
			<AwayReservePowerForwardID>{$a['away_pf2']}</AwayReservePowerForwardID>
			<AwayReserveCenterID>{$a['away_c2']}</AwayReserveCenterID>
			*/
			
			/////////////////
			////////////////
			///////////////
			///////
			///////
			
			$xml .="
			<AwayPointGuardRating>{$a['apg_rating']}</AwayPointGuardRating>
			<AwayShootingGuardRating>{$a['asg_rating']}</AwayShootingGuardRating>
			<AwaySmallForwardRating>{$a['asf_rating']}</AwaySmallForwardRating>
			<AwayPowerForwardRating>{$a['apf_rating']}</AwayPowerForwardRating>
			<AwayCenterRating>{$a['ac_rating']}</AwayCenterRating>
		</AwayTeam>
		<Arena>
			<ArenaID>{$a['arena_id']}</ArenaID>
			<ArenaName>$ArenaName</ArenaName>
			<CourtSide>{$a['crowd1']}</CourtSide>
			<CourtEnd>{$a['crowd2']}</CourtEnd>
			<UpperLevel>{$a['crowd3']}</UpperLevel>
			<Vip>{$a['crowd4']}</Vip>
		</Arena>
	</Match>
</BasketSimData>";
		}
		}
	}

	header("Set-Cookie: CBPPCOOKIE={$session_id}; path=/; domain={$HTTP_HOST}; expires=".date("l, d-M-Y H:i:s", time()+1800));
	header('Content-Type: text/html; charset=UTF-8');
?>