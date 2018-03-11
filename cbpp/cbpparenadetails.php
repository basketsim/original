<?
	////////////////////////////////////////////////////////////////////////////////
	// This script is used for CBPP arenadetails									
	// Author: Florin Pandelea (aka obsy_)											
	// Last updated: 03.07.2007														
	////////////////////////////////////////////////////////////////////////////////

	if($have_session)
	{
		$fetched_date	= date("d.m.Y H:i:s");
		$arenaid		= $_GET['arenaid'] ? $_GET['arenaid'] : $_POST['arenaid'];
		$arenaid		= trim($arenaid);

		if(strlen($arenaid))
		{
			$q	= "SELECT * FROM arena WHERE arenaid = '$arenaid'";
			$r	= @mysql_query($q, $connect);
			if($r && @mysql_num_rows($r))
			{
				$a			= mysql_fetch_array($r);
				$ArenaID	= $a["arenaid"];
				$ArenaName	= $a["arenaname"];
				$TeamID		= $a["teamid"];
				$SeatsA		= $a["seats1"];
				$SeatsB		= $a["seats2"];
				$SeatsC		= $a["seats3"];
				$SeatsD		= $a["seats4"];

				$q	= "SELECT * FROM users WHERE club = '$TeamID'";
				$r	= @mysql_query($q, $connect);
				if($r && @mysql_num_rows($r))
				{
					$a			= mysql_fetch_array($r);
					$UserID		= $a["userid"];
					

					$q	= "SELECT * FROM teams WHERE teamid = '$TeamID'";
					$r	= @mysql_query($q, $connect);
					if($r && @mysql_num_rows($r))
					{
						$a				= mysql_fetch_array($r);
						$TeamName		= $a["name"];
						$ShortTeamName	= $a["short_name"];

				//xml part
$xml	= "<?xml version=\"1.0\"?>
<BasketSimData>
	<FileName>arenadetails.php</FileName> 
	<Version>1.0</Version> 
	<UserID>$UserID</UserID>
	<FetchedDate>$fetched_date</FetchedDate>
	<Arena>
		<ArenaID>$ArenaID</ArenaID>
		<ArenaName>$ArenaName</ArenaName>
		<Team>
			<TeamID>$TeamID</TeamID>
			<TeamName>$TeamName</TeamName>
		</Team>
		<CurrentCapacity>
			<CourtSide>$SeatsA</CourtSide>
			<CourtEnd>$SeatsB</CourtEnd>
			<UpperLevel>$SeatsC</UpperLevel>
			<Vip>$SeatsD</Vip>
		</CurrentCapacity>
	</Arena>
</BasketSimData>";
					}
				}
			}
		}
	}
	

	header("Set-Cookie: CBPPCOOKIE={$session_id}; path=/; domain={$HTTP_HOST}; expires=".date("l, d-M-Y H:i:s", time()+1800));	
	header('Content-Type: text/html; charset=UTF-8');
?>