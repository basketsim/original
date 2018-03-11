<?

	$szRecomendedUrl	= "www.basketsim.com";
	$szAgentName		= "BAM 1.1";
	$BSUSERNAME			= "bot_user";
	$BSPASSWORD			= "figulefagule";

	$xml_entities["&aacute"]	= "&amp;aacute";
	$xml_entities["&Aacute"]	= "&amp;Aacute";
	$xml_entities["&acirc"]		= "&amp;acirc";
	$xml_entities["&Acirc"]		= "&amp;Acirc";
	$xml_entities["&agrave"]	= "&amp;agrave";
	$xml_entities["&Agrave"]	= "&amp;Agrave";
	$xml_entities["&aring"]		= "&amp;aring";
	$xml_entities["&Aring"]		= "&amp;Aring";
	$xml_entities["&atilde"]	= "&amp;atilde";
	$xml_entities["&Atilde"]	= "&amp;Atilde";
	$xml_entities["&auml"]		= "&amp;auml";
	$xml_entities["&Auml"]		= "&amp;Auml";
	$xml_entities["&aelig"]		= "&amp;aelig";
	$xml_entities["&AElig"]		= "&amp;AElig";
	$xml_entities["&ccedil"]	= "&amp;ccedil";
	$xml_entities["&Ccedil"]	= "&amp;Ccedil";
	$xml_entities["&eth"]		= "&amp;eth";
	$xml_entities["&ETH"]		= "&amp;ETH";
	$xml_entities["&eacute"]	= "&amp;eacute";
	$xml_entities["&Eacute"]	= "&amp;Eacute";
	$xml_entities["&ecirc"]		= "&amp;ecirc";
	$xml_entities["&Ecirc"]		= "&amp;Ecirc";
	$xml_entities["&egrave"]	= "&amp;egrave";
	$xml_entities["&Egrave"]	= "&amp;Egrave";
	$xml_entities["&euml"]		= "&amp;euml";
	$xml_entities["&Euml"]		= "&amp;Euml";
	$xml_entities["&iacute"]	= "&amp;iacute";
	$xml_entities["&Iacute"]	= "&amp;Iacute";
	$xml_entities["&icirc"]		= "&amp;icirc";
	$xml_entities["&Icirc"]		= "&amp;Icirc";
	$xml_entities["&igrave"]	= "&amp;igrave";
	$xml_entities["&Igrave"]	= "&amp;Igrave";
	$xml_entities["&iuml"]		= "&amp;iuml";
	$xml_entities["&Iuml"]		= "&amp;Iuml";
	$xml_entities["&ntilde"]	= "&amp;ntilde";
	$xml_entities["&Ntilde"]	= "&amp;Ntilde";
	$xml_entities["&oacute"]	= "&amp;oacute";
	$xml_entities["&Oacute"]	= "&amp;Oacute";
	$xml_entities["&ocirc"]		= "&amp;ocirc";
	$xml_entities["&Ocirc"]		= "&amp;Ocirc";
	$xml_entities["&ograve"]	= "&amp;ograve";
	$xml_entities["&Ograve"]	= "&amp;Ograve";
	$xml_entities["&oslash"]	= "&amp;oslash";
	$xml_entities["&Oslash"]	= "&amp;Oslash";
	$xml_entities["&otilde"]	= "&amp;otilde";
	$xml_entities["&Otilde"]	= "&amp;Otilde";
	$xml_entities["&ouml"]		= "&amp;ouml";
	$xml_entities["&Ouml"]		= "&amp;Ouml";
	$xml_entities["&szlig"]		= "&amp;szlig";
	$xml_entities["&thorn"]		= "&amp;thorn";
	$xml_entities["&THORN"]		= "&amp;THORN";
	$xml_entities["&uacute"]	= "&amp;uacute";
	$xml_entities["&Uacute"]	= "&amp;Uacute";
	$xml_entities["&ucirc"]		= "&amp;ucirc";
	$xml_entities["&Ucirc"]		= "&amp;Ucirc";
	$xml_entities["&ugrave"]	= "&amp;ugrave";
	$xml_entities["&Ugrave"]	= "&amp;Ugrave";
	$xml_entities["&uuml"]		= "&amp;uuml";
	$xml_entities["&Uuml"]		= "&amp;Uuml";
	$xml_entities["&yacute"]	= "&amp;yacute";
	$xml_entities["&Yacute"]	= "&amp;Yacute";
	$xml_entities["&yuml"]		= "&amp;yuml";

	//////////////////////////////////////////////////////////////////////////////////////
	//	login()
	//////////////////////////////////////////////////////////////////////////////////////
	function login()
	{
		global $szCookie, $szRecomendedUrl, $szAgentName, $BSUSERNAME, $BSPASSWORD;

		$u	= $BSUSERNAME;
		$p	= $BSPASSWORD;

		$fp	= @fsockopen($szRecomendedUrl, 80, $errno, $errstr, 20);
		if(!$fp)
		{
			return "ERROR";
		}
		$szGet	 = "GET /cbpp/cbpp.php?option=login&username=$u&password=$p HTTP/1.0\r\n";
		$szGet	.= "Host: $szRecomendedUrl\r\n";
		$szGet	.= "User-Agent: $szAgentName \r\n";
		$szGet	.= "Content-Type: application/x-www-form-urlencoded\r\n";
		$szGet	.= "Connection: close\r\n\r\n";	
		$nBytes = @fputs($fp, $szGet);
		$szResponse	= "";
		while (!@feof($fp))
		{
			$szResponse .= fgets($fp, 1024);
		}

		@fclose($fp);

		if(!strstr($szResponse,"200 OK"))
		{
			return "ERROR";
		}

		if(!strstr($szResponse,"<ActionSuccessful>True</ActionSuccessful>"))
		{
			return "ERROR"; // invalid username and password
		} 

		// reading cookie from headers

		$arrTmp	= explode("\r\n",$szResponse);
		if(is_array($arrTmp))
		{
			for($i=0; $i < count($arrTmp); $i++)
			{
				if(strstr($arrTmp[$i],":"))
				{
					$arrHd	= explode(":",$arrTmp[$i]);
					if(trim(strtolower($arrHd[0])) == "set-cookie")
					{
						$nPos		= strpos($arrHd[1],";");
						$szCookie	= trim(substr($arrHd[1], 0, $nPos));
					}
				}
			}
		}
	}

	////////////////////////////////////////////////////////////////////////////////////////
	//	logout()																			
	////////////////////////////////////////////////////////////////////////////////////////
	function logout()
	{
		return getResponse("/cbpp/cbpp.php?option=logout");
	}

	////////////////////////////////////////////////////////////////////////////////////////
	//	read countries 
	////////////////////////////////////////////////////////////////////////////////////////
	function getCountries()
	{
		return getResponse("/cbpp/cbpp.php?option=countries");
	}

	////////////////////////////////////////////////////////////////////////////////////////
	//	read team matches using the team id													
	////////////////////////////////////////////////////////////////////////////////////////
	function getMatches($teamid, $date = "")
	{
		return getResponse("/cbpp/cbpp.php?option=matches&teamid=$teamid&lastmatchdate=$date");
	}

	////////////////////////////////////////////////////////////////////////////////////////
	//	read national team matches using the national team name								
	////////////////////////////////////////////////////////////////////////////////////////
	function getNationalTeamMatches($country, $date = "")
	{
		return getResponse("/cbpp/cbpp.php?option=nationalteammatches&country=$country&lastmatchdate=$date");
	}

	////////////////////////////////////////////////////////////////////////////////////////
	//	read team matches using the team id - debug version									
	////////////////////////////////////////////////////////////////////////////////////////
	function getMatchesDebug($teamid, $date = "")
	{
		return getResponse("/cbpp/cbpp.php?option=matchesdebug&teamid=$teamid&lastmatchdate=$date");
	}

	////////////////////////////////////////////////////////////////////////////////////////
	//	read match details
	////////////////////////////////////////////////////////////////////////////////////////
	function getMatchDetails($matchid)
	{
		return getResponse("/cbpp/cbpp.php?option=matchdetails&matchid=$matchid");
	}

	////////////////////////////////////////////////////////////////////////////////////////
	//	read national team match details
	////////////////////////////////////////////////////////////////////////////////////////
	function getNationalTeamMatchDetails($matchid)
	{
		return getResponse("/cbpp/cbpp.php?option=nationalteammatchdetails&matchid=$matchid");
	}

	////////////////////////////////////////////////////////////////////////////////////////
	//	read player transfer history
	////////////////////////////////////////////////////////////////////////////////////////
	function getTransferHistory($teamid, $playerid)
	{
		return getResponse("/cbpp/cbpp.php?option=transferhistory&teamid=$teamid&playerid=$playerid");
	}

	////////////////////////////////////////////////////////////////////////////////////////
	//	read match report
	////////////////////////////////////////////////////////////////////////////////////////
	function getMatchReport($matchid)
	{
		return getResponse("/cbpp/cbpp.php?option=matchreport&matchid=$matchid");
	}

	////////////////////////////////////////////////////////////////////////////////////////
	//	read national team match report
	////////////////////////////////////////////////////////////////////////////////////////
	function getNationalTeamMatchReport($matchid)
	{
		return getResponse("/cbpp/cbpp.php?option=nationalteammatchreport&matchid=$matchid");
	}

	////////////////////////////////////////////////////////////////////////////////////////
	//	read match stats
	////////////////////////////////////////////////////////////////////////////////////////
	function getMatchStats($matchid)
	{
		return getResponse("/cbpp/cbpp.php?option=matchstats&matchid=$matchid");
	}

	////////////////////////////////////////////////////////////////////////////////////////
	//	read national team match stats
	////////////////////////////////////////////////////////////////////////////////////////
	function getNationalTeamMatchStats($matchid)
	{
		return getResponse("/cbpp/cbpp.php?option=nationalteammatchstats&matchid=$matchid");
	}

	////////////////////////////////////////////////////////////////////////////////////////
	//	read team players using the team id													
	////////////////////////////////////////////////////////////////////////////////////////
	function getPlayers($teamid)
	{
		return getResponse("/cbpp/cbpp.php?option=players&teamid=$teamid");
	}

	////////////////////////////////////////////////////////////////////////////////////////
	//	read national team players															
	////////////////////////////////////////////////////////////////////////////////////////
	function getNationalTeamPlayers($country)
	{
		return getResponse("/cbpp/cbpp.php?option=nationalteamplayers&country=$country");
	}

	////////////////////////////////////////////////////////////////////////////////////////
	//	read team details info using the team id											
	////////////////////////////////////////////////////////////////////////////////////////
	function getTeamDetails($teamid)
	{
		return getResponse("/cbpp/cbpp.php?option=teamdetails&teamid=$teamid");
	}

	////////////////////////////////////////////////////////////////////////////////////////
	//	labels
	////////////////////////////////////////////////////////////////////////////////////////
	function getLabels($lang)
	{
		return getResponse("/cbpp/cbpp.php?option=labels&language=$lang");
	}
	
	////////////////////////////////////////////////////////////////////////////////////////
	//	training
	////////////////////////////////////////////////////////////////////////////////////////
	function getTraining($t)
	{
		return getResponse("/cbpp/cbpp.php?option=training&teamid=$t");
	}

	////////////////////////////////////////////////////////////////////////////////////////
	//	debug
	////////////////////////////////////////////////////////////////////////////////////////
	function debug($u)
	{
		return getResponse("/cbpp/cbpp.php?option=debug&teamid=$u&userid=$u&arenaid=$u");
	}

	////////////////////////////////////////////////////////////////////////////////////////
	//	read team details info using the user id											
	////////////////////////////////////////////////////////////////////////////////////////
	function getTeamDetailsB($userid)
	{
		return getResponse("/cbpp/cbpp.php?option=teamdetails&userid=$userid");
	}

	////////////////////////////////////////////////////////////////////////////////////////
	//	read arena details info using the arena id											
	////////////////////////////////////////////////////////////////////////////////////////
	function getArenaDetails($arenaid)
	{
		return getResponse("/cbpp/cbpp.php?option=arenadetails&arenaid=$arenaid");
	}

	////////////////////////////////////////////////////////////////////////////////////////
	//	check if a CBPP code has been set for the given $u
	////////////////////////////////////////////////////////////////////////////////////////
	function checkSecurityCode($u)
	{
		$szResponse = getResponse("/cbpp/cbpp.php?option=checkcbppcode&username=$u");
		if(strstr($szResponse,"<ActionSuccessful>True</ActionSuccessful>"))
		{
			$szResponse	= explode("<UserID>", $szResponse);
			$szResponse	= $szResponse[1];
			$szResponse	= explode("</UserID>", $szResponse);
			$UserID	= $szResponse[0];
			return $UserID;
		}
		else
		{
			return 0;
		}
	}

	////////////////////////////////////////////////////////////////////////////////////////
	//	getResponse()																		
	////////////////////////////////////////////////////////////////////////////////////////
	function getResponse($szFromPage)
	{
		global $szRecomendedUrl, $szCookie, $szAgentName;
		$fp	= @fsockopen($szRecomendedUrl, 80, $errno, $errstr, 20);
		if(!$fp)
		{
			return "ERROR";
		}
		$szGet	 = "GET $szFromPage HTTP/1.0\r\n";
		$szGet	.= "Host: $szRecomendedUrl\r\n";
		$szGet	.= "Content-Type: application/x-www-form-urlencoded\r\n";
		$szGet	.= "Accept-Encoding: gzip, deflate\r\n";
		$szGet	.= "User-Agent: $szAgentName \r\n";
		$szGet	.= "Cookie: $szCookie\r\n";
		$szGet	.= "Connection: close\r\n\r\n";	
		
		$nBytes = @fputs($fp, $szGet);
		$szResponse	= "";
		while (!@feof($fp))
		{
			$szResponse .= @fgets($fp, 1024);
		}

		@fclose($fp);
		//die($szResponse);
		if(!strstr($szResponse,"200 OK"))
		{
			return "ERROR";
		}

		$nPos	= strpos($szResponse,"<?xml");
		return substr($szResponse, $nPos);
	}
	
	//////////////////////////////////////////////////////////////////////////////////////
	//	checkSignup()
	//////////////////////////////////////////////////////////////////////////////////////
	function checkSignup($u, $p)
	{
		global $szCookie, $szRecomendedUrl, $szAgentName, $BSUSERNAME, $BSPASSWORD;

		$fp	= @fsockopen($szRecomendedUrl, 80, $errno, $errstr, 20);
		if(!$fp)
		{
			return "ERROR";
		}
		$szGet	 = "GET /cbpp/cbpp.php?option=login&username=$u&password=$p HTTP/1.0\r\n";
		$szGet	.= "Host: $szRecomendedUrl\r\n";
		$szGet	.= "User-Agent: $szAgentName \r\n";
		$szGet	.= "Content-Type: application/x-www-form-urlencoded\r\n";
		$szGet	.= "Connection: close\r\n\r\n";	
		$nBytes = @fputs($fp, $szGet);
		$szResponse	= "";
		while (!@feof($fp))
		{
			$szResponse .= fgets($fp, 1024);
		}

		@fclose($fp);

		if(!strstr($szResponse,"200 OK"))
		{
			return 1;
		}

		if(strstr($szResponse,"<ActionSuccessful>False</ActionSuccessful>"))
		{
			return 2; // invalid username and password
		}

		return 0;
	}

	///////////////////////////////////////////////////////////////////////
	//
	///////////////////////////////////////////////////////////////////////
	function skill_label($val)
	{
		$ret	= 0;
		if($val < 9)
		{
			$ret	= 0;
		}
		elseif($val >=9 && $val < 17)
		{
			$ret	= 1;
		}
		elseif($val >=17 && $val < 25)
		{
			$ret	= 2;
		}
		elseif($val >=25 && $val < 33)
		{
			$ret	= 3;
		}
		elseif($val >=33 && $val < 41)
		{
			$ret	= 4;
		}
		elseif($val >=41 && $val < 49)
		{
			$ret	= 5;
		}
		elseif($val >=49 && $val < 57)
		{
			$ret	= 6;
		}
		elseif($val >=57 && $val < 65)
		{
			$ret	= 7;
		}
		elseif($val >=65 && $val < 73)
		{
			$ret	= 8;
		}
		elseif($val >=73 && $val < 81)
		{
			$ret	= 9;
		}
		elseif($val >=81 && $val < 89)
		{
			$ret	= 10;
		}
		elseif($val >=89 && $val < 97)
		{
			$ret	= 11;
		}
		elseif($val >=97 && $val < 105)
		{
			$ret	= 12;
		}
		elseif($val >=105 && $val < 113)
		{
			$ret	= 13;
		}
		elseif($val >=113 && $val < 121)
		{
			$ret	= 14;
		}
		elseif($val >=121)
		{
			$ret	= 15;
		}
		
		return $ret;
	}

	///////////////////////////////////////////////////////////////////////
	//
	///////////////////////////////////////////////////////////////////////
	function injury_label($injury_time)
	{
		$ret	= "0";
		
		if( $injury_time > 0 && $injury_time < 1)
		{
			$ret	= "1ok";
		}
		elseif($injury_time >= 1 && $injury_time < 2)
		{
			$ret	= "1";
		}
		elseif($injury_time >=2 && $injury_time < 3)
		{
			$ret	= "2";
		}
		elseif($injury_time >=3 && $injury_time < 4)
		{
			$ret	= "3";
		}
		elseif($injury_time >=4 AND $injury_time < 5)
		{
			$ret	= "4";
		}
		elseif($injury_time >=5 AND $injury_time < 6)
		{
			$ret	= "5";
		}
		elseif($injury_time >=6 AND $injury_time < 7)
		{
			$ret	= "6";
		}
		elseif($injury_time >=7 AND $injury_time < 8)
		{
			$ret	= "7";
		}
		elseif($injury_time >=8 AND $injury_time < 9)
		{
			$ret	= "8";
		}
		elseif($injury_time >=9)
		{
			$ret	= "9";
		}
		
		return $ret;
	}

	///////////////////////////////////////////////////////////////////////
	//
	///////////////////////////////////////////////////////////////////////
	function char_label($charac)
	{
		$ret	= 0;
		
		if($charac > 3 && $charac < 7)
		{
			$ret	= 1;
		}
		elseif($charac > 6 && $charac < 11)
		{
			$ret	= 2;
		}
		elseif($charac > 10 && $charac < 14)
		{
			$ret	= 3;
		}
		elseif($charac > 13 && $charac < 17)
		{
			$ret	= 4;
		}
		elseif($charac > 16)
		{
			$ret	= 5;
		}
		return $ret;
	}
	
	///////////////////////////////////////////////////////////////////////
	//
	///////////////////////////////////////////////////////////////////////
	function star_label($val)
	{
		$ret	= 1;
		if ($val==0)
		{
			$ret	= 0;
		}
		if ($val < 70)
		{
			$ret	= 1;
		}
		elseif($val > 69 && $val < 92)
		{
			$ret = 1.5;
		}
		elseif($val > 91 && $val < 114)
		{
			$ret	= 2;
		}
		elseif($val > 113 && $val < 136)
		{
			$ret	= 2.5;
		}
		elseif($val > 135 && $val < 158)
		{
			$ret	= 3;
		}
		elseif($val > 157 && $val < 180)
		{
			$ret	= 3.5;
		}
		elseif($val > 179 && $val < 202)
		{
			$ret	= 4;
		}
		elseif($val > 201 && $val < 224)
		{
			$ret	= 4.5;
		}
		elseif($val > 223 && $val < 247)
		{
			$ret	= 5;
		}
		elseif($val > 246 && $val < 279)
		{
			$ret	= 5.5;
		}
		elseif($val > 268 && $val < 291)
		{
			$ret	= 6;
		}
		elseif($val > 290 && $val < 313)
		{
			$ret	= 6.5;
		}
		elseif($val > 312 && $val < 335)
		{
			$ret	= 7;
		}
		elseif($val > 334 && $val < 357)
		{
			$ret	= 7.5;
		}
		elseif($val > 356 && $val < 379)
		{
			$ret	= 8;
		}
		elseif($val > 378 && $val < 401)
		{
			$ret	= 8.5;
		}
		elseif($val > 400)
		{
			$ret	= 9;
		}
		
		return $ret;
	}

	///////////////////////////////////////////////////////////////////////
	//
	///////////////////////////////////////////////////////////////////////
	function valtostar($val)
	{
		$ret	= "";
		$add	= "";
		if(substr($val, -2) ==".5")
		{
			$add	= "<img src=\"PATHhalf_star.gif\" alt=\"*\" border=\"\">";
			$val	-= 0.5;
		}
		while($val > 0)
		{
			$ret	.= "<img src=\"PATHstar.gif\" alt=\"*\" border=\"\">";
			$val --;
		}
		$ret	.= $add;
		return $ret;
	}

	///////////////////////////////////////////////////////////////////////
	//
	///////////////////////////////////////////////////////////////////////
	function computeskills($uid, $country = "")
	{
		global $connect, $weights, $weights_skills, $tcolumnsdesc;
		
		$q	= "SELECT * FROM players WHERE user_id = '$uid' AND transferred = '0'";
		if(strlen($country))
		{
			$q	= "SELECT * FROM players WHERE user_id = '0' AND nationalteamplayer = '1' AND transferred = '0' AND country = '$country'";
		}
		$r	= mysql_query($q, $connect) or die("Error computing player skills (function) ! ".mysql_error());
		if(mysql_num_rows($r))
		{
			while($a = mysql_fetch_array($r))
			{
				if(is_array($weights))
				{
					reset($weights);
					while(list($w, $arr) = each($weights))
					{
						$calc	= 0; //thi sis the computed value for the $w position
						
						//check if the user manually defined weights for this position
						$q_c	= "SELECT * FROM weights WHERE user_id = '$uid' && pos = '$w'";
						$r_c	= mysql_query($q_c, $connect) or die("Error checking manually defined weights for : ".$tcolumnsdesc[$w]."! ".mysql_error());
						if(mysql_num_rows($r_c)) //user has defined weights manually
						{
							unset($arr);
							$a_c	= mysql_fetch_array($r_c);
							reset($weights_skills);
							while(list($sk, $dmy) = each($weights_skills))
							{
								$vname		= $sk."_yes";
								if($a_c[$vname] == 1) //this skill has been choosed as being weight to this positoin
								{
									if($a_c[$sk] > 0)
									{
										$arr[$sk] = ($a_c[$sk]/100).'*$_skill';
									}
								}
							}
						}
						//having the weights, is time to compute as an all
						if(is_array($arr))
						{
							reset ($arr);
							while(list($sk, $formula) = each($arr))
							{
								$_skill	= $a[$sk];
								$formula	= '$local_value = '.$formula.';';
								eval($formula);
								$calc += $local_value;
							}
						}
						//is time to update the computed value
						$qu	= "UPDATE players SET $w = '$calc' WHERE user_id = '$uid' && teamid = '{$a['teamid']}' && playerid = '{$a['playerid']}'";
						if(strlen($country))
						{
							$qu	= "UPDATE players SET $w = '$calc' WHERE playerid = '{$a['playerid']}' AND user_id = '0' AND nationalteamplayer = '1' AND transferred = '0' AND country = '$country' ";
						}
						$ru	= mysql_query($qu, $connect) or die("Error computing player skills (2p) ! ".mysql_error());
					}//end iterating all the weights
				}//end test if the $weights array has been defined
			}//end iteratng all players
		}//end test founded players
	}


	///////////////////////////////////////////////////////////////////////
	//
	///////////////////////////////////////////////////////////////////////
	function computeratings($uid, $country = "")
	{
		global $connect;

		$apos["pg"]	= 1; $apos["sg"] = 1; $apos["pf"] = 1; $apos["sf"] = 1; $apos["c"]	= 1;

		$q	= "SELECT bam_team_id FROM teams WHERE user_id = '$uid'";
		if(strlen($country))
		{
			$q	= "SELECT countryid AS bam_team_id FROM countries WHERE countryname = '$country'";
		}
		$r	= mysql_query($q, $connect) or die ("Error reading team id (compute_ratings) ! ".mysql_error());
		if(mysql_num_rows($r))
		{
			$a	= mysql_fetch_array($r);
			$teamid	= $a['bam_team_id'];

			$q	= "SELECT playerid FROM players WHERE user_id = '$uid' AND transferred = '0'";
			if(strlen($country))
			{
				$q	= "SELECT playerid FROM players WHERE user_id = '0' AND nationalteamplayer = '1' AND transferred = '0' AND country = '$country'";
			}
			
			$r	= mysql_query($q, $connect) or die("Error reading players ! ".mysql_error());
			if(mysql_num_rows($r))
			{
				unset($players);
				while($a = mysql_fetch_array($r))
				{
					$players[$a['playerid']]	= 0;
					$last[$a['playerid']]	= 999999;
					$best[$a['playerid']]	= 0;
					$average[$a['playerid']]	= 0;
					$ratings[$a['playerid']]	= 0;
				}

				//read the list of played matches by this team
				$q	= "SELECT match_id FROM umatches WHERE user_id = '$uid' AND status = 'FINISHED'";
				if(strlen($country))
				{
					$q	= "SELECT match_id FROM nt_matches WHERE (home_team_id = '$teamid' OR away_team_id = '$teamid' )  AND status = 'FINISHED'";
				}

				$r	= mysql_query($q, $connect) or die("Error reading played matches ! ".mysql_error());
				if(mysql_num_rows($r))
				{
					$mlist	= "";
					unset($matches);
					while($a = mysql_fetch_array($r))
					{
						$matches[$a['match_id']] = 1;
						$mlist	.= ",".$a['match_id'];
					}
					$mlist	= substr($mlist, 1);
					//echo $mlist;
					//count the number of matches played by each player, last, best && average stars
					reset($players);
					while(list($pid, $idx) = each($players))
					{
						$q	= "SELECT match_id FROM matchdetails WHERE match_id IN ($mlist) AND (home_team_id = '$teamid' && (home_pg_id = '$pid' OR home_sg_id = '$pid' OR home_pf_id = '$pid' OR home_sf_id = '$pid' OR home_c_id = '$pid' ) ) OR (away_team_id = '$teamid' && (away_pg_id = '$pid' OR away_sg_id = '$pid' OR away_pf_id = '$pid' OR away_sf_id = '$pid' OR away_c_id = '$pid' )) ";
						if(strlen($country))
						{
							$q	= "SELECT match_id FROM nt_matchdetails WHERE match_id IN ($mlist) AND (home_team_id = '$teamid' && (home_pg_id = '$pid' OR home_sg_id = '$pid' OR home_pf_id = '$pid' OR home_sf_id = '$pid' OR home_c_id = '$pid' ) ) OR (away_team_id = '$teamid' && (away_pg_id = '$pid' OR away_sg_id = '$pid' OR away_pf_id = '$pid' OR away_sf_id = '$pid' OR away_c_id = '$pid' )) ";
						}
						$r	= mysql_query($q, $connect) or die("Error counting played matches, player = $pid ! ".mysql_error());
						$players[$pid] = mysql_num_rows($r); //number of played matches
						
						//iterate all played matches to see hte position and the rating
						while($a = mysql_fetch_array($r))
						{
							$qm		= "SELECT * FROM matchdetails WHERE match_id = '".$a['match_id']."'";
							if(strlen($country))
							{
								$qm		= "SELECT * FROM nt_matchdetails WHERE match_id = '".$a['match_id']."'";
							}
							$rm		= mysql_query($qm, $connect) or die("Error match details, player = $pid ! ".mysql_error());
							$am		= mysql_fetch_array($rm);
							$fld	= "home";
							if($am["away_team_id"] == $teamid)
							{
								$fld	= "away";
							}
							//see the position he played on
							reset($apos);
							while(list($pos, $dummy) = each($apos))
							{
								$field	= $fld."_".$pos."_"."id";
								if($am[$field] == $pid)
								{
									$rating_field	= $fld."_".$pos."_"."rating";
									$rating_value	= $am[$rating_field];
									$ratings[$pid]	+= $rating_value;
									if($last[$pid] > $rating_value)
									{
										$last[$pid] = $rating_value;
									}
									if($best[$pid] < $rating_value)
									{
										$best[$pid] = $rating_value;
									}
									break;
								}
							}
						}

					}//end iterating all players
					
					//time to compute the average values
					reset($players);
					while(list($pid, $idx) = each($players))
					{
						$average_value = 0;
						if($players[$pid] > 0 )
						{
							$average_value = $ratings[$pid]/$players[$pid];
						}
						$average[$pid]	= $average_value;
					}

					//time to save this values
					reset($players);
					while(list($pid, $idx) = each($players))
					{
						if($players[$pid] > 0 ) //this user has played at least one match
						{
							$q	= "UPDATE players SET rating_last = '{$last[$pid]}', rating_best = '{$best[$pid]}', rating_average = '{$average[$pid]}' WHERE playerid = '$pid' AND user_id = '$uid'";
							if(strlen($country))
							{
								$q	= "UPDATE players SET rating_last = '{$last[$pid]}', rating_best = '{$best[$pid]}', rating_average = '{$average[$pid]}' WHERE playerid = '$pid' AND user_id = '0' AND nationalteamplayer = '1' AND transferred = '0' AND country = '$country'";
							
							}
							$r	= mysql_query($q, $connect) or die("Error updating ratings values, player = $pid ! ".mysql_error());
						}
					}
					//var_dump($last);var_dump($best);var_dump($average);
					//var_dump($players);
				}//played matches has been found
			}//this user has players
		}//the team has been found ni teams table
	}
	
	
	function entities($content)
	{

		global $xml_entities;
		reset($xml_entities);
		while(list($a, $b) = each($xml_entities))
		{
			$content	= str_replace($a, $b, $content);
		}
		$content = str_replace("&lsquo;", "'", $content);
		$content = str_replace("&rsquo;", "'", $content);
		$content = str_replace("&ldquo;", "\"", $content);
		$content = str_replace("&rdquo;", "\"", $content);
		
		return $content;
		
	}

	////////////////////////////////////////////////////////////////////////////////
	//
	////////////////////////////////////////////////////////////////////////////////
	function getGenerals($userid, $fields)
	{
		global $connect;

		$ret	= FALSE;
		$fields = strtolower(trim($fields));

		$q	= "SELECT $fields FROM generals WHERE user_id ='$userid'";
		$r	= @mysql_query($q, $connect);
		if($r)
		{
			if(!mysql_num_rows($r))
			{
				$q	= "INSERT INTO generals SET user_id ='$userid'";
				$r	= @mysql_query($q, $connect);
			}
			
			$q	= "SELECT $fields FROM generals WHERE user_id ='$userid'";
			$r	= @mysql_query($q, $connect);
			if($r)
			{
				$a	= mysql_fetch_array($r);
				
				$fields	= explode(",", $fields);
				for($i = 0 ; $i < count($fields) ; $i ++)
				{
					$fld	= trim($fields[$i]);
					$ret[$fld] = $a[$fld];
				}
			}
		}
		return $ret;
	}
	
	////////////////////////////////////////////////////////////////////////////////
	//
	////////////////////////////////////////////////////////////////////////////////
	function setGenerals($userid, $fields)
	{
		global $connect;

		$ret	= TRUE;
		$q	= "SELECT user_id FROM generals WHERE user_id ='$userid'";
		$r	= @mysql_query($q, $connect);
		if(!mysql_num_rows($r))
		{
			$q	= "INSERT INTO generals SET user_id ='$userid'";
			$r	= @mysql_query($q, $connect);
		}
		
		reset($fields);
		$str	= "";
		while(list($a, $b) = each($fields))
		{
			$str	.= ", $a = '$b'";
		}
		$str	= trim(substr($str, 1));
		
		$q	= "UPDATE generals SET $str WHERE user_id ='$userid'";
		$r	= @mysql_query($q, $connect);
		
		if(!$r)
		{
			$ret	= FALSE;
		}
		return $ret;
	}

	////////////////////////////////////////////////////////////////////////////////
	//
	////////////////////////////////////////////////////////////////////////////////
	function get_training($skill, $pid, $uid)
	{
		global $connect, $training_columns_reversed;
		//init
		$w1	= 0;
		$w2 	= 100;
		$ldesc	= "?";
		
		$q = "SELECT $skill FROM players WHERE playerid = '$pid' AND user_id = '$uid'";
		$r = mysql_query($q, $connect) or die("Error reading player's current skill value ! ".mysql_error());
		$a = mysql_fetch_array($r);
		$current_value = $a[$skill];
		$current_skill = skill_label($a[$skill]);
		$current_limits = skill_limits($current_skill);
		$current_limits = explode("#", $current_limits);
		$current_limits_min = $current_limits[0];
		$current_limits_max = $current_limits[1];

		$q = "SELECT SUM(training_value) AS tvalue, COUNT(playerid) AS tweeks FROM playerstraining WHERE playerid = '$pid' AND user_id = '$uid' AND training_type = '{$training_columns_reversed[$skill]}' AND $skill BETWEEN '$current_limits_min' AND '$current_limits_max' AND skill_change = '0'";
		//return $q;
		$r = mysql_query($q, $connect) or die("Error reading player's current skill value ! ".mysql_error());
		$a = mysql_fetch_array($r);
		$tvalue = $a['tvalue'] ? $a['tvalue'] : 0;
		$tweeks = $a['tweeks'];

		if($tvalue > 0)
		{
			$step = $tvalue/$tweeks;
			$weeks_needit = number_format(8/$step, 1, ".", "");
			$ldesc = $tweeks."/".$weeks_needit;
			
			$w1	= intval($tvalue*100/8);
			$w2	= 100 - $w1;
		}

		//final computation
		$ldesc1 = $ldesc2 = "";
		if($w1 > $w2)
		{
			$ldesc1 = $ldesc;
		}
		else
		{
			$ldesc2 = $ldesc;
		}
		if(strlen($ldesc1))
		{
			$ldesc1 = "&nbsp;<font color='#FFFFFF'>{$ldesc1}</font>";
		}
		if(strlen($ldesc2))
		{
			$ldesc2 = "&nbsp;<font color='#808080'>{$ldesc2}</font>";
		}
		$retvalue	= "<table cellpadding='0' cellspacing='0' width='100%' height='100%' border='0'><tr><td width='{$w1}%' height='100%' bgcolor='#008000' valign='middle'>{$ldesc1}</td><td width='{$w2}%' valign='middle'>{$ldesc2}</td></tr></table>";
		
		return $retvalue;
	}
	
	///////////////////////////////////////////////////////////////////////
	//
	///////////////////////////////////////////////////////////////////////
	function skill_limits($val)
	{
		$ret	= "0#0";
		if($val == 0)
		{
			$ret	= "0#8.99";
		}
		elseif($val == 1)
		{
			$ret	= "9#16.99";
		}
		elseif($val == 2)
		{
			$ret	= "17#24.99";
		}
		elseif($val == 3)
		{
			$ret	= "25#32.99";
		}
		elseif($val == 4)
		{
			$ret	= "33#40.99";
		}
		elseif($val == 5)
		{
			$ret	= "41#48.99";
		}
		elseif($val == 6)
		{
			$ret	= "49#56.99";
		}
		elseif($val == 7)
		{
			$ret	= "57#64.99";
		}
		elseif($val == 8)
		{
			$ret	= "65#72.99";
		}
		elseif($val == 9)
		{
			$ret	= "73#80.99";
		}
		elseif($val == 10)
		{
			$ret	= "81#88.99";
		}
		elseif($val == 11)
		{
			$ret	= "89#96.99";
		}
		elseif($val == 12)
		{
			$ret	= "97#104.99";
		}
		elseif($val == 13)
		{
			$ret	= "105#112.99";
		}
		elseif($val == 14)
		{
			$ret	= "113#120.99";
		}
		elseif($val == 15)
		{
			$ret	= "121#9999s";
		}

		return $ret;
	}

?>