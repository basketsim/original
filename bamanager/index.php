<?
	$szParam	= "";
	reset($_GET);
	if(is_array($_GET))
	{
		while(list($szVarName, $xValue) = each($_GET)){
			$szParam	.= "&".$szVarName."=".$xValue;
		}
	}
	$szLocation	= "location: ./files/index.php";
	if(strlen($szParam))
	{
		$szParam	= substr($szParam, 1);
		$szLocation	= "location: ./files/index.php?$szParam";
	}
	header($szLocation);
?>