<?
	////////////////////////////////////////////////////////////////////////////////
	// This script is used for CBPP match labels description						
	// Author: Florin Pandelea (aka obsy_)											
	// Last updated: 03.07.2007														
	////////////////////////////////////////////////////////////////////////////////

	$fetched_date	= date("d.m.Y H:i:s");
	$language		= trim(strtolower($_GET['language'] ? $_GET['language'] : $_POST['language']));
	$language		= trim($language);

	if(!strlen($language))
	{
		$language	= 'english';
	}

	$q	= "SELECT * FROM descriptions WHERE LOWER(lang) = '$language' ";
	$r	= @mysql_query($q, $connect);
	if($r && mysql_num_rows($r))
	{
		$mcounter = mysql_num_rows($r);
$xml	= "<?xml version=\"1.0\"?>
<BasketSimData>
	<FileName>labels.php</FileName> 
	<Version>1.0</Version> 
	<FetchedDate>$fetched_date</FetchedDate>
	<LabelsList Count=\"$mcounter\" Language=\"$language\">";
		$counter = 1;
		while($a			= mysql_fetch_array($r))
		{
			$xml	.= "
		<Label Index=\"$counter\">
			<LabelID>{$a['descid']}</LabelID>
			<MatchEvent>{$a['matchevent']}</MatchEvent>
			<Description>{$a['description']}</Description>
		</Label>";
		$counter ++;
		}
$xml	.="
	</LabelsList>
</BasketSimData>";
	}
	
	header("Set-Cookie: CBPPCOOKIE={$session_id}; path=/; domain={$HTTP_HOST}; expires=".date("l, d-M-Y H:i:s", time()+1800));
	header('Content-Type: text/html; charset=UTF-8');
?>