<?
	////////////////////////////////////////////////////////////////////////////////
	// This script is used for CBPP list of countries								
	// Author: Florin Pandelea (aka obsy_)											
	// Last updated: 08.07.2007														
	////////////////////////////////////////////////////////////////////////////////

	$fetched_date		= date("d.m.Y H:i:s");

	$q	= "SELECT countryid, country FROM countries";
	$r	= @mysql_query($q, $connect);
	if($r && @mysql_num_rows($r))
	{
			//xml part
$xml	= "<?xml version=\"1.0\"?>
<BasketSimData>
	<FileName>countries.php</FileName> 
	<Version>1.0</Version> 
	<FetchedDate>$fetched_date</FetchedDate>
	<Countries Count=\"".mysql_num_rows($r)."\">";
	$counter = 0;
		while($a = mysql_fetch_array($r))
		{
	$xml .= "
		<Country Index=\"$counter\">
			<CountryID>{$a['countryid']}</CountryID>
			<CountryName>{$a['country']}</CountryName>
		</Country>";
						$counter ++;
		}
	$xml	.= "
	</Countries>
</BasketSimData>";
	}

	header("Set-Cookie: CBPPCOOKIE={$session_id}; path=/; domain={$HTTP_HOST}; expires=".date("l, d-M-Y H:i:s", time()+1800));
	header('Content-Type: text/html; charset=UTF-8');
?>