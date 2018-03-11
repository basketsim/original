<?
	Class CLabels{
		var		$currentTag, $currentIndex;
		var		$nError;
		var		$labels, $szXmlContent;
		function CLabels($szXmlContent)
		{	// constructor
			if(!strlen(trim($szXmlContent)))
			{
				$this->nError	= 1; // nu am primit XML-ul
			}
			else
			{
				$this->nError			= 0;
				$this->szXmlContent		= $szXmlContent;
				$this->labels			= array();
				$this->currentTag		= "";
			}
		}
		
		function getLabels()
		{
			return $this->labels;
		}

		function parseXml()
		{
			$this->szXmlContent	= entities($this->szXmlContent);

			$xml_parser = xml_parser_create("UTF-8");

			xml_set_element_handler($xml_parser, "eventStartElementTDLabels", "eventEndElementTDLabels");
			xml_set_character_data_handler ($xml_parser, "eventDataHandlerTDLabels");

		    if (!xml_parse($xml_parser, $this->szXmlContent, 1))
			{
				//echo "Error = ".xml_error_string(xml_get_error_code($xml_parser));
				$this->nError = 2;
				return;
		    }
			xml_parser_free($xml_parser);

		}//end parseXml function
	}//end class


	function eventStartElementTDLabels($parser, $name, $atributs){ // handling startElement
		global	$objLabels;
		$objLabels->currentTag	= $name;

		if($name == "LABEL")
			$objLabels->currentIndex	= $atributs["INDEX"];
	}

	function eventEndElementTDLabels($parser, $name){	// handling endElement
		global	$objLabels;
		$objLabels->currentTag	= "";
		if($name == "LABEL")
			$objLabels->currentIndex	= "";
	}

	function eventDataHandlerTDLabels($parser, $data){
		global	$objLabels;
		if(strlen(trim($data)))
		{
			if(strlen($objLabels->currentIndex))
			{
				$objLabels->labels[$objLabels->currentIndex][strtolower($objLabels->currentTag)] .= $data;
			}

		}//end test if there is any data
	}
?>