<?
	Class CMatchStats{
		var		$currentTag, $currentIndex;
		var		$nError;
		var		$stats, $szXmlContent;
		function CMatchStats($szXmlContent)
		{	// constructor
			if(!strlen(trim($szXmlContent)))
			{
				$this->nError	= 1; // nu am primit XML-ul
			}
			else
			{
				$this->nError			= 0;
				$this->szXmlContent		= $szXmlContent;
				$this->stats			= array();
				$this->currentTag		= "";
			}
		}

		function getStats()
		{
			return $this->stats;
		}

		function parseXml()
		{
			$this->szXmlContent	= entities($this->szXmlContent);

			$xml_parser = xml_parser_create("UTF-8");

			xml_set_element_handler($xml_parser, "eventStartElementTDStats", "eventEndElementTDStats");
			xml_set_character_data_handler ($xml_parser, "eventDataHandlerTDStats");

		    if (!xml_parse($xml_parser, $this->szXmlContent, 1))
			{
				//echo "Error = ".xml_error_string(xml_get_error_code($xml_parser));
				$this->nError = 2;
				return;
		    }
			xml_parser_free($xml_parser);

		}//end parseXml function
	}//end class


	function eventStartElementTDStats($parser, $name, $atributs){ // handling startElement
		global	$objMatchStats;
		$objMatchStats->currentTag	= $name;

		if($name == "STAT")
			$objMatchStats->currentIndex	= $atributs["INDEX"];
	}

	function eventEndElementTDStats($parser, $name){	// handling endElement
		global	$objMatchStats;
		$objMatchStats->currentTag	= "";
		if($name == "STAT")
			$objMatchStats->currentIndex	= "";
	}

	function eventDataHandlerTDStats($parser, $data){
		global	$objMatchStats;
		if(strlen(trim($data)))
		{
			if(strlen($objMatchStats->currentIndex))
			{
				$objMatchStats->stats[$objMatchStats->currentIndex][strtolower($objMatchStats->currentTag)] .= $data;
			}

		}//end test if there is any data
	}
?>