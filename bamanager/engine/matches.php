<?
	Class CMatches{
		var		$currentTag, $currentIndex;
		var		$nError;
		var		$matches, $szXmlContent;
		function CMatches($szXmlContent)
		{	// constructor
			if(!strlen(trim($szXmlContent)))
			{
				$this->nError	= 1; // nu am primit XML-ul
			}
			else
			{
				$this->nError			= 0;
				$this->szXmlContent		= $szXmlContent;
				$this->matches			= array();
				$this->currentTag		= "";
			}
		}
		
		function getMatches()
		{
			return $this->matches;
		}

		function parseXml()
		{
			$this->szXmlContent	= entities($this->szXmlContent);

			$xml_parser = xml_parser_create("UTF-8");

			xml_set_element_handler($xml_parser, "eventStartElementTDMatches", "eventEndElementTDMatches");
			xml_set_character_data_handler ($xml_parser, "eventDataHandlerTDMatches");

		    if (!xml_parse($xml_parser, $this->szXmlContent, 1))
			{
				//echo "Error = ".xml_error_string(xml_get_error_code($xml_parser));
				$this->nError = 2;
				return;
		    }
			xml_parser_free($xml_parser);

		}//end parseXml function
	}//end class


	function eventStartElementTDMatches($parser, $name, $atributs){ // handling startElement
		global	$objMatches;
		$objMatches->currentTag	= $name;

		if($name == "MATCH")
			$objMatches->currentIndex	= $atributs["INDEX"];
	}

	function eventEndElementTDMatches($parser, $name){	// handling endElement
		global	$objMatches;
		$objMatches->currentTag	= "";
		if($name == "MATCH")
			$objMatches->currentIndex	= "";
	}

	function eventDataHandlerTDMatches($parser, $data){
		global	$objMatches;
		if(strlen(trim($data)))
		{
			if(strlen($objMatches->currentIndex))
			{
				$objMatches->matches[$objMatches->currentIndex][strtolower($objMatches->currentTag)] .= $data;
			}

		}//end test if there is any data
	}
?>