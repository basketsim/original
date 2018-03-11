<?
	////////////////////////////////////////////////////////////////////////////////////////////////////
	//																									
	// This class is designed to parse the countries XML file and to manage the data					
	// Florin Pandelea (aka obsy_)																		
	// Last updated 08.07.2007																			
	 ///////////////////////////////////////////////////////////////////////////////////////////////////

	Class CCountries{
		var		$currentTag, $currentIndex;
		var		$nError;
		var		$countries, $szXmlContent;
		function CCountries($szXmlContent)
		{	// constructor
			if(!strlen(trim($szXmlContent)))
			{
				$this->nError	= 1; // nu am primit XML-ul
			}
			else
			{
				$this->nError			= 0;
				$this->szXmlContent		= $szXmlContent;
				$this->countries		= array();
				$this->currentTag		= "";
			}
		}

		////////////////////////////////////////////////////////////////////////
		//
		////////////////////////////////////////////////////////////////////////
		function getCountries()
		{
			return $this->countries;
		}

		function parseXml()
		{
			$this->szXmlContent	= entities($this->szXmlContent);
			
			$xml_parser = xml_parser_create("UTF-8");

			xml_set_element_handler($xml_parser, "eventStartElementTDCountries", "eventEndElementTDCountries");
			xml_set_character_data_handler ($xml_parser, "eventDataHandlerTDCountries");

		    if (!xml_parse($xml_parser, $this->szXmlContent, 1))
			{
				//echo "Error = ".xml_error_string(xml_get_error_code($xml_parser));
				$this->nError = 2;
				return;
		    }
			xml_parser_free($xml_parser);
			
		}//end parseXml function
	}//end class


	function eventStartElementTDCountries($parser, $name, $atributs){ // handling startElement
		global	$objCountries;
		$objCountries->currentTag	= $name;

		if($name == "COUNTRY")
			$objCountries->currentIndex	= $atributs["INDEX"];
	}

	function eventEndElementTDCountries($parser, $name){	// handling endElement
		global	$objCountries;
		$objCountries->currentTag	= "";
		if($name == "COUNTRY")
			$objCountries->currentIndex	= "";
	}

	function eventDataHandlerTDCountries($parser, $data){
		global	$objCountries;
		if(strlen(trim($data)))
		{
			if(strlen($objCountries->currentIndex))
			{
				$objCountries->countries[$objCountries->currentIndex][strtolower($objCountries->currentTag)] .= $data;
			}
		}//end test if there is any data
	}
?>