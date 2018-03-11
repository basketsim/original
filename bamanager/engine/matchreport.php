<?
	Class CMatchReport{
		var		$currentTag, $currentIndex;
		var		$nError;
		var		$events, $szXmlContent;
		function CMatchReport($szXmlContent)
		{	// constructor
			if(!strlen(trim($szXmlContent)))
			{
				$this->nError	= 1; // nu am primit XML-ul
			}
			else
			{
				$this->nError			= 0;
				$this->szXmlContent		= $szXmlContent;
				$this->events			= array();
				$this->currentTag		= "";
			}
		}
		
		function getReport()
		{
			return $this->events;
		}

		function parseXml()
		{
			$this->szXmlContent	= entities($this->szXmlContent);

			$xml_parser = xml_parser_create("UTF-8");

			xml_set_element_handler($xml_parser, "eventStartElementTDEvents", "eventEndElementTDEvents");
			xml_set_character_data_handler ($xml_parser, "eventDataHandlerTDEvents");

		    if (!xml_parse($xml_parser, $this->szXmlContent, 1))
			{
				//echo "Error = ".xml_error_string(xml_get_error_code($xml_parser));
				$this->nError = 2;
				return;
		    }
			xml_parser_free($xml_parser);

		}//end parseXml function
	}//end class


	function eventStartElementTDEvents($parser, $name, $atributs){ // handling startElement
		global	$objMatchReport;
		$objMatchReport->currentTag	= $name;

		if($name == "EVENT")
			$objMatchReport->currentIndex	= $atributs["INDEX"];
	}

	function eventEndElementTDEvents($parser, $name){	// handling endElement
		global	$objMatchReport;
		$objMatchReport->currentTag	= "";
		if($name == "EVENT")
			$objMatchReport->currentIndex	= "";
	}

	function eventDataHandlerTDEvents($parser, $data){
		global	$objMatchReport;
		if(strlen(trim($data)))
		{
			if(strlen($objMatchReport->currentIndex))
			{
				$objMatchReport->events[$objMatchReport->currentIndex][strtolower($objMatchReport->currentTag)] .= $data;
			}

		}//end test if there is any data
	}
?>