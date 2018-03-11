<?

	////////////////////////////////////////////////////////////////////////////////////////////////////
	//																									
	// This class is designed to parse the transfer history XML file and to manage the data				
	// Florin Pandelea (aka obsy_)																		
	// Last updated 03.07.2007																			
	 ///////////////////////////////////////////////////////////////////////////////////////////////////

	Class CTransfers{
		var		$currentTag, $currentIndex;
		var		$nError;
		var		$transfers, $szXmlContent;
		function CTransfers($szXmlContent)
		{	// constructor
			if(!strlen(trim($szXmlContent)))
			{
				$this->nError	= 1; // nu am primit XML-ul
			}
			else
			{
				$this->nError			= 0;
				$this->szXmlContent		= $szXmlContent;
				$this->transfers		= array();
				$this->currentTag		= "";
			}
		}

		////////////////////////////////////////////////////////////////////////
		// return the trasnfers array
		////////////////////////////////////////////////////////////////////////
		function getTransfers()
		{
			return $this->transfers;
		}

		////////////////////////////////////////////////////////////////////////
		// parse the xml file
		////////////////////////////////////////////////////////////////////////
		function parseXml()
		{
			$this->szXmlContent	= entities($this->szXmlContent);
			
			$xml_parser = xml_parser_create("UTF-8");

			xml_set_element_handler($xml_parser, "eventStartElementTDTransfers", "eventEndElementTDTransfers");
			xml_set_character_data_handler ($xml_parser, "eventDataHandlerTDTransfers");

		    if (!xml_parse($xml_parser, $this->szXmlContent, 1))
			{
				//echo "Error = ".xml_error_string(xml_get_error_code($xml_parser));
				$this->nError = 2;
				return;
		    }
			xml_parser_free($xml_parser);
		}//end parseXml function
	}//end class


	function eventStartElementTDTransfers($parser, $name, $atributs){ // handling startElement
		global	$objTransfers;
		$objTransfers->currentTag	= $name;

		if($name == "TRANSFER")
			$objTransfers->currentIndex	= $atributs["INDEX"];
	}

	function eventEndElementTDTransfers($parser, $name){	// handling endElement
		global	$objTransfers;
		$objTransfers->currentTag	= "";
		if($name == "TRANSFER")
			$objTransfers->currentIndex	= "";
	}

	function eventDataHandlerTDTransfers($parser, $data){
		global	$objTransfers;
		if(strlen(trim($data)))
		{
			if(strlen($objTransfers->currentIndex))
			{
				$objTransfers->transfers[$objTransfers->currentIndex][strtolower($objTransfers->currentTag)] .= $data;
			}
		}//end test if there is any data
	}
?>