<?
	Class CTeamDetails{
		var		$currentTag;
		var		$nError, $nTeamId;
		var		$nUserId, $szLoginName, $szName, $szTeamName, $szShortTeamName, $szLeagueName, $nLeagueId, $nLeagueLevel, $szCountry, $nNationalCoach, $szNationalTeam, $szXmlContent;

		function CTeamDetails($szXmlContent){	// constructor
			if(!strlen(trim($szXmlContent))){
				$this->nError	= 1; // nu am primit XML-ul
			}else{
				$this->nError			= 0;
				$this->szXmlContent		= $szXmlContent;
				$this->nTeamId			= 0;
				$this->currentTag		= "";
				$this->nUserId			= 0;
				$this->nNationalCoach	= 0;
				$this->szLoginName		= "";
				$this->szName			= "";
				$this->szNationalTeam	= "";
				$this->szTeamName		= "";
				$this->szShortTeamName	= "";
				$this->szLeagueName		= "";
				$this->szCountry		= "";
				$this->nLeagueId		= 0;
				$this->nLeagueLevel		= 0;
				$this->currentTag		= "";
			}
		}

		function getNationalCoach()
		{
			return $this->nNationalCoach;
		}

		function getNationalTeam()
		{
			return $this->szNationalTeam;
		}
		
		function getUsername()
		{
			return $this->szLoginName;
		}

		function getTeamId(){
			return intval($this->nTeamId);
		}

		function getUserId(){
			return intval($this->nUserId);
		}

		function getTeamName(){
			return $this->szTeamName;
		}

		function getShortName(){
			return $this->szShortTeamName;
		}

		function parseXml()
		{

			$this->szXmlContent	= entities($this->szXmlContent);
			$xml_parser = xml_parser_create("UTF-8");
			xml_set_element_handler($xml_parser, "eventStartElementTD", "eventEndElementTD");
			xml_set_character_data_handler ($xml_parser, "eventDataHandlerTD");

		    if (!xml_parse($xml_parser, $this->szXmlContent, 1))
			{
				$this->nError	= 2;
				return;
		    }
			xml_parser_free($xml_parser);
		}//end parseXml function

		function getQuery(){
			$szQuery	= " bam_team_id = '".$this->nTeamId."', bam_user_id = '".$this->nUserId."', bam_login = '".addslashes($this->szLoginName)."', bam_name = '".addslashes($this->szName)."', bam_team_name = '".addslashes($this->szTeamName)."',  bam_team_short_name  = '".addslashes($this->szShortTeamName)."', bam_league_name = '".addslashes($this->szLeagueName)."', bam_league_id = '".$this->nLeagueId."',  bam_league_level = '".$this->nLeagueLevel."', bam_country = '".addslashes($this->szCountry)."'";
			return $szQuery;
		}
	}//end class


	function eventStartElementTD($parser, $name, $atributs){ // handling startElement
		global	$objTeamDetails;
		$objTeamDetails->currentTag	= $name;
	}

	function eventEndElementTD($parser, $name){	// handling endElement
		global	$objTeamDetails;
		$objTeamDetails->currentTag	= "";
	}

	function eventDataHandlerTD($parser, $data){
		global	$objTeamDetails;
		if(strlen(trim($data))){
			switch(strtoupper($objTeamDetails->currentTag)){
				case 'TEAMID'	:			$objTeamDetails->nTeamId			.= $data;	break;
				case 'USERID'	:			$objTeamDetails->nUserId			= $data;	break;
				case 'LOGINNAME':			$objTeamDetails->szLoginName		.= $data;	break;
				case 'NAME'		:			$objTeamDetails->szName				.= $data;	break;
				case 'TEAMNAME'	:			$objTeamDetails->szTeamName			.= $data;	break;
				case 'SHORTTEAMNAME':		$objTeamDetails->szShortTeamName	.= $data;	break;
				case 'LEAGUEID'	:			$objTeamDetails->nLeagueId			.= $data;	break;
				case 'LEAGUENAME':			$objTeamDetails->szLeagueName		.= $data;	break;
				case 'LEAGUELEVEL' :		$objTeamDetails->nLeagueLevel		.= $data;	break;
				case 'COUNTRYNAME' :		$objTeamDetails->szCountry			.= $data;	break;
				case 'NATIONALCOACH' :		$objTeamDetails->nNationalCoach		.= $data;	break;
				case 'NATIONALTEAM' :		$objTeamDetails->szNationalTeam		.= $data;	break;
			}
		}//end test if there is any data
	}
?>