<?

	////////////////////////////////////////////////////////////////////////////////////////////////////
	//																									
	// This class is designed to parse the players XML file and to manage the data						
	// Florin Pandelea (aka obsy_)																		
	// Last updated 02.06.2007																			
	 ///////////////////////////////////////////////////////////////////////////////////////////////////

	Class CPlayers{
		var		$currentTag, $currentIndex;
		var		$nError;
		var		$players, $szXmlContent;
		function CPlayers($szXmlContent)
		{	// constructor
			if(!strlen(trim($szXmlContent)))
			{
				$this->nError	= 1; // nu am primit XML-ul
			}
			else
			{
				$this->nError			= 0;
				$this->szXmlContent		= $szXmlContent;
				$this->players			= array();
				$this->currentTag		= "";
			}
		}

		////////////////////////////////////////////////////////////////////////
		//
		////////////////////////////////////////////////////////////////////////
		function getPlayers()
		{
			return $this->players;
		}

		////////////////////////////////////////////////////////////////////////
		//
		////////////////////////////////////////////////////////////////////////
		function getPlayerByID($playerid)
		{
			$ret	= FALSE;

			if(is_array($this->players))
			{
				reset($this->players);
				while(list($idx, $player) = each($this->players))
				{
					if($player["playerid"] == $playerid)
					{
						$ret	= $player;
						break;
					}
				}
			}
			
			return $ret;
		}

		function parseXml()
		{
			$this->szXmlContent	= entities($this->szXmlContent);
			
			$xml_parser = xml_parser_create("UTF-8");

			xml_set_element_handler($xml_parser, "eventStartElementTDPlayers", "eventEndElementTDPlayers");
			xml_set_character_data_handler ($xml_parser, "eventDataHandlerTDPlayers");

		    if (!xml_parse($xml_parser, $this->szXmlContent, 1))
			{
				//echo "Error = ".xml_error_string(xml_get_error_code($xml_parser));
				$this->nError = 2;
				return;
		    }
			xml_parser_free($xml_parser);
			
			//concatenate name with surname
			reset($this->players);
			while(list($idx, $player) = each($this->players))
			{
				$this->players[$idx]["name"]	= $this->players[$idx]["name"]." ".$this->players[$idx]["surname"];
			}
			unset($main);
			reset($this->players);
			while(list($idx, $player) = each($this->players))
			{
				unset($second);
				$str	= "";
				while(list($skill, $value) = each($player))
				{
					if($skill == "character")
					{
						$skill = "characterr";
					}
					if($skill != "surname")
					{
						$second[$skill]	= $value;
					}
				}
				$main[$idx]	= $second;
			}
			$this->players = $main;
		}//end parseXml function
	}//end class


	function eventStartElementTDPlayers($parser, $name, $atributs){ // handling startElement
		global	$objPlayers;
		$objPlayers->currentTag	= $name;

		if($name == "PLAYER")
			$objPlayers->currentIndex	= $atributs["INDEX"];
	}

	function eventEndElementTDPlayers($parser, $name){	// handling endElement
		global	$objPlayers;
		$objPlayers->currentTag	= "";
		if($name == "PLAYER")
			$objPlayers->currentIndex	= "";
	}

	function eventDataHandlerTDPlayers($parser, $data){
		global	$objPlayers;
		if(strlen(trim($data)))
		{
			if(strlen($objPlayers->currentIndex))
			{
				$objPlayers->players[$objPlayers->currentIndex][strtolower($objPlayers->currentTag)] .= $data;
			}

		}//end test if there is any data
	}
?>