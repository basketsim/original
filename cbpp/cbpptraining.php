<?
	////////////////////////////////////////////////////////////////////////////////
	// This script is used for CBPP training 										
	// Author: Florin Pandelea (aka obsy_)											
	// Last updated: 03.07.2007														
	////////////////////////////////////////////////////////////////////////////////
	if($have_session)
	{
		$fetched_date	= date("d.m.Y H:i:s");
		$teamid	= $_GET['teamid'] ? $_GET['teamid'] : $_POST['teamid'];
		$teamid 	= trim($teamid);

		if(strlen($teamid))
		{
			$q	= "SELECT intensity, guards_t, bigmen_t FROM teams WHERE teamid = '$teamid'";
			$r	= @mysql_query($q, $connect);
			if($r && @mysql_num_rows($r))
			{
				$a		= mysql_fetch_array($r);
				$gt		= $a['guards_t'];
				$bm		= $a['bigmen_t'];
				$in		= $a['intensity'];
				$last	= '';
				$xml	= "
<?xml version=\"1.0\"?>
<BasketSimData>
	<FileName>debug.php</FileName> 
	<Version>1.0</Version> 
	<UserID>$UserID</UserID>
	<FetchedDate>$fetched_date</FetchedDate>
	<TrainingData>
		<Intensity>$in</Intensity>
		<Guards>$gt</Guards>
		<Bigmen>$bm</Bigmen>";
				$q	= "SELECT * FROM events WHERE team = '$teamid' AND description = 'Weekly training took place.' ORDER BY eventid DESC LIMIT 1";
				$r	= @mysql_query($q, $connect);
				if($r && @mysql_num_rows($r))
				{
					$a = mysql_fetch_array($r);
					$last = $a['when'];
				}
		$xml .="
		<LastTraining>$last</LastTraining>
	</TrainingData>
</BasketSimData>";
			}
		}
	}

	header("Set-Cookie: CBPPCOOKIE={$session_id}; path=/; domain={$HTTP_HOST}; expires=".date("l, d-M-Y H:i:s", time()+1800));	
	header('Content-Type: text/html; charset=UTF-8');
?>