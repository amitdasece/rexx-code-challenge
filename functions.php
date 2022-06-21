<?php	
	
	// Function to convert timezone from Europe/Berlin to UTC
	
	function timeConverter($event_date) {
		$userTimezone = new DateTimeZone('Europe/Berlin');
 	    $utcTimezone  = new DateTimeZone('UTC');
		$date = new DateTime($event_date, $userTimezone);
		$date->setTimezone($utcTimezone);
		$output = $date->format('Y-m-d H:i:s');
		return $output;
    }

    // Function to compare version and to calculate event date according to timezone. We presume standard timezone is UTC.
    
    function versionCompare($version, $event_date)  {
        if (version_compare($version, '1.0.17+60', '<')) {
			return timeConverter($event_date);
		}else{
			return $event_date;
		}
    }
	
	// Function to test TimeZone Conversion//
	
	function testTimeZoneConvert() {
        
		$givenDate = '2022-06-21 18:46:32'; // Set your Berlin Time //
		
        $expectedDate = '2022-06-21 16:46:32'; // Set your Corrosponding UTC Time //
		
		// Checks the two TimeZone Conversion //
		
		if($expectedDate == timeConverter($givenDate)){
			return "Given Date is equal to Expected Date";
		}
		else{
			return "Given Date is not equal to Expected Date";
		}
    }
	
	// Function to test TimeZone Conversion Based on Version //

    function testVersionCompareToCalculateEventDate() {
        
		$givenDate = '2022-06-21 18:46:32'; // Set your Berlin Time //
		
        $expectedDate = '2022-06-21 16:46:32'; // Set your Corrosponding UTC Time //
		
        $version = '1.0.17+05'; // Set your Version //
		
		// Checks the two TimeZone Conversion with Version parameter //
		
		if($expectedDate == versionCompare($version,$givenDate)){
			return "Given Date is equal to Expected Date";
		}
		else{
			return "Given Date is not equal to Expected Date";
		}
    }

	
?>