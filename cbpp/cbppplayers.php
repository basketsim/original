<?
	////////////////////////////////////////////////////////////////////////////////
	// This script is used for CBPP players											
	// Author: Florin Pandelea (aka obsy_)											
	// Last updated: 07.07.2007														
	////////////////////////////////////////////////////////////////////////////////

	$fetched_date	= date("d.m.Y H:i:s");
	$teamid			= $_GET['teamid'] ? $_GET['teamid'] : $_POST['teamid'];
	$teamid			= trim($teamid);

	if(strlen($teamid))
	{
		$q	= "SELECT * FROM users WHERE club = '$teamid'";
		$r	= @mysql_query($q, $connect);
		if($r && @mysql_num_rows($r))
		{
			$a			= mysql_fetch_array($r);
			$UserID		= $a["userid"];
			$TeamID		= $a["club"];

			$q	= "SELECT * FROM teams WHERE teamid = '$TeamID' AND status = '1'";
			$r	= @mysql_query($q, $connect);
			if($r && @mysql_num_rows($r))
			{
				$a				= mysql_fetch_array($r);
				$TeamName		= $a["name"];
				
				//time to read players
				$q	= "SELECT * FROM players WHERE club = '$TeamID' ";
				$r	= @mysql_query($q, $connect);
				if($r && @mysql_num_rows($r))
				{

			//xml part
$xml	= "<?xml version=\"1.0\"?>
<BasketSimData>
	<FileName>players.php</FileName> 
	<Version>1.0</Version> 
	<UserID>$UserID</UserID>
	<FetchedDate>$fetched_date</FetchedDate>
	<Team>
		<TeamID>$TeamID</TeamID>
		<TeamName>$TeamName</TeamName>
		<PlayerList Count=\"".mysql_num_rows($r)."\">\r\n";
		$index = 0;
		while ($a = mysql_fetch_array($r))
		{
			$xml	.= "			<Player Index=\"$index\">\r\n";
			$xml	.= "				<PlayerID>{$a['id']}</PlayerID>\r\n";
			$xml	.= "				<Name>{$a['name']}</Name>\r\n";
			$xml	.= "				<Surname>{$a['surname']}</Surname>\r\n";
			$xml	.= "				<Age>{$a['age']}</Age>\r\n";
			$xml	.= "				<Country>{$a['country']}</Country>\r\n";
			$xml	.= "				<Character>{$a['charac']}</Character>\r\n";
			$xml	.= "				<Height>{$a['height']}</Height>\r\n";
			$xml	.= "				<Weight>{$a['weight']}</Weight>\r\n";
			$xml	.= "				<Ballhandling>{$a['handling']}</Ballhandling>\r\n";
			$xml	.= "				<Quickness>{$a['speed']}</Quickness>\r\n";
			$xml	.= "				<Passing>{$a['passing']}</Passing>\r\n";
			$xml	.= "				<Dribbling>{$a['vision']}</Dribbling>\r\n";
			$xml	.= "				<Rebounding>{$a['rebounds']}</Rebounding>\r\n";
			$xml	.= "				<Positioning>{$a['position']}</Positioning>\r\n";
			$xml	.= "				<Shooting>{$a['shooting']}</Shooting>\r\n";
			$xml	.= "				<Freethrows>{$a['freethrow']}</Freethrows>\r\n";
			$xml	.= "				<Defense>{$a['defense']}</Defense>\r\n";
			$xml	.= "				<Workrate>{$a['workrate']}</Workrate>\r\n";
			$xml	.= "				<Experience>{$a['experience']}</Experience>\r\n";
			$xml	.= "				<Tiredness>{$a['fatigue']}</Tiredness>\r\n";
			$xml	.= "				<OnSale>{$a['isonsale']}</OnSale>\r\n";
			$xml	.= "				<Wage>{$a['wage']}</Wage>\r\n";
			$xml	.= "				<Coach>{$a['coach']}</Coach>\r\n";
			$xml	.= "				<Injury>{$a['injury']}</Injury>\r\n";
			$xml	.= "				<HasPlayed>{$a['has_played']}</HasPlayed>\r\n";
			$xml	.= "				<LastPosition>{$a['last_position']}</LastPosition>\r\n";
			$xml	.= "				<LastTraining>{$a['last_training']}</LastTraining>\r\n";
			$xml	.= "				<NationalTeamPlayer>{$a['ntplayer']}</NationalTeamPlayer>\r\n";
			$xml	.= "			</Player>\r\n";
			$index ++;
		}
$xml		.= "		</PlayerList>
	</Team>
</BasketSimData>";
				}
			}
		}
	}

	header("Set-Cookie: CBPPCOOKIE={$session_id}; path=/; domain={$HTTP_HOST}; expires=".date("l, d-M-Y H:i:s", time()+1800));
	header('Content-Type: text/html; charset=UTF-8');
?>