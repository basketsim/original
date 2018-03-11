<?
	Class CMatchDetails{
		var		$currentTag, $currentIndex;
		var		$nError;
		var		$details, $szXmlContent;
		function CMatchDetails($szXmlContent)
		{	// constructor
			if(!strlen(trim($szXmlContent)))
			{
				$this->nError	= 1; // nu am primit XML-ul
			}
			else
			{
				$this->nError			= 0;
				$this->szXmlContent		= $szXmlContent;
				$this->details			= array();
				$this->currentTag		= "";
			}
		}
		
		function getMatchDetails()
		{
			return $this->details;
		}

		function parseXml()
		{
			$this->szXmlContent	= entities($this->szXmlContent);

			$xml_parser = xml_parser_create("UTF-8");

			xml_set_element_handler($xml_parser, "eventStartElementTDDetails", "eventEndElementTDDetails");
			xml_set_character_data_handler ($xml_parser, "eventDataHandlerTDDetails");

		    if (!xml_parse($xml_parser, $this->szXmlContent, 1))
			{
				//echo "Error = ".xml_error_string(xml_get_error_code($xml_parser));
				$this->nError = 2;
				return;
		    }
			xml_parser_free($xml_parser);

		}//end parseXml function
	}//end class


	function eventStartElementTDDetails($parser, $name, $atributs){ // handling startElement
		global	$objMatchDetails;
		$objMatchDetails->currentTag	= $name;
	}

	function eventEndElementTDDetails($parser, $name){	// handling endElement
		global	$objMatchDetails;
		$objMatchDetails->currentTag	= "";
	}

	function eventDataHandlerTDDetails($parser, $data)
	{
		global	$objMatchDetails;
		if(strlen(trim($data)))
		{
			$objMatchDetails->details[strtolower($objMatchDetails->currentTag)] .= $data;
		}
	}
?>