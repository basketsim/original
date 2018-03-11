<?
	Class CTraining{
		var		$currentTag, $currentIndex;
		var		$nError;
		var		$details, $szXmlContent;
		function CTraining($szXmlContent) // constructor
		{
			if(!strlen(trim($szXmlContent)))
			{
				$this->nError	= 1; // didn't received the XML
			}
			else
			{
				$this->nError			= 0;
				$this->szXmlContent		= $szXmlContent;
				$this->details			= array();
				$this->currentTag		= "";
			}
		}
		
		function getTraining()
		{
			return $this->details;
		}

		function parseXml()
		{
			$this->szXmlContent	= entities($this->szXmlContent);
			$xml_parser = xml_parser_create("UTF-8");
			xml_set_element_handler($xml_parser, "eventStartElementTrainingDetails", "eventEndElementTrainingDetails");
			xml_set_character_data_handler ($xml_parser, "eventDataHandlerTrainingDetails");
		    if (!xml_parse($xml_parser, $this->szXmlContent, 1))
			{
				$this->nError = 2;
				return;
		    }
			xml_parser_free($xml_parser);
		}//end parseXml function
	}//end class


	function eventStartElementTrainingDetails($parser, $name, $atributs){ // handling startElement
		global	$objTrainingDetails;
		$objTrainingDetails->currentTag	= $name;
	}

	function eventEndElementTrainingDetails($parser, $name){	// handling endElement
		global	$objTrainingDetails;
		$objTrainingDetails->currentTag	= "";
	}

	function eventDataHandlerTrainingDetails($parser, $data)
	{
		global	$objTrainingDetails;
		if(strlen(trim($data)))
		{
			$objTrainingDetails->details[strtolower($objTrainingDetails->currentTag)] .= $data;
		}
	}
?>