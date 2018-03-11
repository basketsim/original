<?
	////////////////////////////////////////////////////////////////////////////////
	// This script is used for CBPP national team players							
	// Author: Florin Pandelea (aka obsy_)											
	// Last updated: 07.07.2007														
	////////////////////////////////////////////////////////////////////////////////

	$fetched_date	= date("d.m.Y H:i:s");
	$country			= $_GET['country'] ? $_GET['country'] : $_POST['country'];
	$country			= trim($country);

	if(strlen($country))
	{
		//time to read players
		$q	= "SELECT * FROM players WHERE ntplayer = '1' AND country = '$country' ";
		$r	= @mysql_query($q, $connect);
		if($r && @mysql_num_rows($r))
		{

			//xml part
$xml	= "<?xml version=\"1.0\"?>
<BasketSimData>
	<FileName>nationalteamplayers.php</FileName> 
	<Version>1.0</Version> 
	<FetchedDate>$fetched_date</FetchedDate>
	<Team>
		<Country>$country</Country>
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
			$xml	.= "			</Player>\r\n";
			$index ++;
		}
$xml		.= "		</PlayerList>
	</Team>
</BasketSimData>";
		}
	}

	header("Set-Cookie: CBPPCOOKIE={$session_id}; path=/; domain={$HTTP_HOST}; expires=".date("l, d-M-Y H:i:s", time()+1800));
	header('Content-Type: text/html; charset=UTF-8');
?>