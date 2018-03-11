<?
	////////////////////////////////////////////////////////////////////////////////
	// This script is used for CBPP teamdetails										
	// Author: Florin Pandelea (aka obsy_)											
	// Last updated: 07.07.2007														
	////////////////////////////////////////////////////////////////////////////////

	$fetched_date	= date("d.m.Y H:i:s");
	$userid			= $_GET['userid'] ? $_GET['userid'] : $_POST['userid'];
	$teamid			= $_GET['teamid'] ? $_GET['teamid'] : $_POST['teamid'];
	$teamid			= trim($teamid);
	$userid			= trim($userid);

	if(strlen($userid) || strlen($teamid))
	{
		$add	= "";
		if(strlen($userid))
		{
			$add	= " AND userid = '$userid'";
		}
		if(strlen($teamid))
		{
			$add	.= " AND club = '$teamid'";
		}
		
		$q	= "SELECT * FROM users WHERE 1 $add";
		$r	= @mysql_query($q, $connect);
		if($r && @mysql_num_rows($r))
		{
			$a				= mysql_fetch_array($r);
			$UserID			= $a["userid"];
			$TeamID			= $a["club"];
			$Loginname		= $a["username"];
			$Name			= $a["realname"];
			$NationalCoach	= $a["natcoach"];
			$NationalTeam	= $a["nt_country"];

			$q	= "SELECT * FROM teams WHERE teamid = '$TeamID' AND status = '1'";
			$r	= @mysql_query($q, $connect);
			if($r && @mysql_num_rows($r))
			{
				$a				= mysql_fetch_array($r);
				$TeamName		= $a["name"];
				$ShortTeamName	= $a["short_name"];
				$CountryName	= $a["country"];
				
				$q	= "SELECT * FROM arena WHERE teamid = '$TeamID'";
				$r	= @mysql_query($q, $connect);
				if($r && @mysql_num_rows($r))
				{
					$a				= mysql_fetch_array($r);
					$ArenaID		= $a["arenaid"];
					$ArenaName		= $a["arenaname"];

					$q	= "SELECT leagueid FROM competition WHERE teamid = '$TeamID' ORDER BY season DESC LIMIT 1";
					$r	= @mysql_query($q, $connect);
					if($r && @mysql_num_rows($r))
					{
						$a				= mysql_fetch_array($r);
						$LeagueID		= $a["leagueid"];

						$q	= "SELECT * FROM leagues WHERE leagueid = '$LeagueID'";
						$r	= @mysql_query($q, $connect);
						if($r && @mysql_num_rows($r))
						{
							$a				= mysql_fetch_array($r);
							$LeagueName		= $a["name"];
							$LeagueLevel	= $a["level"];
						}
					}

			//xml part
$xml	= "<?xml version=\"1.0\"?>
<BasketSimData>
	<FileName>teamdetails.php</FileName> 
	<Version>1.0</Version> 
	<UserID>$UserID</UserID>
	<FetchedDate>$fetched_date</FetchedDate>
	<User>
		<UserID>$UserID</UserID>
		<Loginname>$Loginname</Loginname>
		<Name>$Name</Name>
		<NationalCoach>$NationalCoach</NationalCoach>
		<NationalTeam>$NationalTeam</NationalTeam>
	</User>
	<Team>
		<TeamID>$TeamID</TeamID>
		<TeamName>$TeamName</TeamName>
		<ShortTeamName>$ShortTeamName</ShortTeamName>
		<Arena>
			<ArenaID>$ArenaID</ArenaID>
			<ArenaName>$ArenaName</ArenaName>
		</Arena>
		<Country>
			<CountryName>$CountryName</CountryName>
		</Country>
		<League>
			<LeagueID>$LeagueID</LeagueID>
			<LeagueName>$LeagueName</LeagueName>
			<LeagueLevel>$LeagueLevel</LeagueLevel>
		</League>
	</Team>
</BasketSimData>";
				}
			}
		}
	}

	header("Set-Cookie: CBPPCOOKIE={$session_id}; path=/; domain={$HTTP_HOST}; expires=".date("l, d-M-Y H:i:s", time()+1800));
	header('Content-Type: text/html; charset=UTF-8');
?>